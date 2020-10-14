<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\I18n\Date;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;

/**
 * Imports Controller
 *
 *
 * @method \App\Model\Entity\Import[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ImportsController extends AppController {

    public $Bpartners = null;
    public $Warehouses = null;
    public $PawnLines = null;
    public $Pawns = null;
    public $ProductCategories = null;
    public $components = ['Core', 'Util', 'Authen', 'DocSequent', 'TransactionCode', 'Json', 'Product'];

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);

        //$this->Auth->allow();
        $this->loadComponent('Excel');
        $this->loadComponent('MakePayment');

        $this->PawnLines = TableRegistry::get('PawnLines');
        $this->Pawns = TableRegistry::get('Pawns');
    }

    private function read($file) {
        $defaultPath = WWW_ROOT . 'files' . DS . 'uploads';
        $dir = new Folder($defaultPath, true, 0755);
        $fullPath = $defaultPath . DS . $file['name'];
        $excelData = [];


        if (move_uploaded_file($file['tmp_name'], $fullPath)) {

            $excelData = $this->Excel->readToArray($fullPath);


            $file = new File($fullPath, false, 0755);
            $file->delete();
        }

        return $excelData;
    }

    public function pawn() {
        if ($this->request->is(['POST'])) {
            $this->loadComponent('Pawn');

            $iscorrect = true;
            $result = [];

            $postData = $this->request->getData();

            $file = $postData['excelfile'];
            $excelData = $this->read($file);
            //$this->log($files, 'debug');
            $excelData = $excelData['sheets'][0]['rows'];
            unset($excelData[0]);
            $pawns = [];
            foreach ($excelData as $row) {
                if (is_null($row[1]) || $row[1] == '') {
                    continue;
                }
                
                $price = floatval(str_replace(',','', $row[12]));

                if (isset($pawns[$row[1]])) {
                    $l = [
                        'product_category_name' => $row[9],
                        'percent' => $row[10],
                        'weight' => $row[11],
                        'price' => $price,
                    ];
                    $_l = $pawns[$row[1]]['lines'];
                    array_push($_l, $l);
                    $pawns[$row[1]]['lines'] = $_l;
                } else {
                    $pawns[$row[1]] = [
                        'docno' => $row[1],
                        'name' => $row[3],
                        'mobile' => $row[4],
                        'address' => $row[5],
                        'date' => $row[6],
                        'expiredate' => $row[7],
                        'type' => $row[8],
                        'amount' => $price,
                        'description' => $row[13],
                        'totalmoney' => $price,
                        'bank_account_id' => 'c5f8493d-fce1-40c5-89ca-0b9ef1966557',
                        'interrestrate' => 0,
                        'seller' => '8ca8709c-1f7f-415d-b9c8-a718ac401b0e',
                        'lines' => [
                            [
                                //'product_name' => sprintf('%s %s %sg', $row[9], $row[10], $row[11]),
                                'product_category_name' => $row[9],
                                'percent' => $row[10],
                                'weight' => $row[11],
                                'price' => $price
                            ]
                        ]
                    ];
                }
            }

            //Warehouse
            $this->Warehouses = TableRegistry::get('Warehouses');
            $this->ProductCategories = TableRegistry::get('ProductCategories');
            $warehouse = $this->Warehouses->find()
                    ->where(['type' => 'PAWN', 'branch_id' => $this->Core->getLocalBranchId()])
                    ->first();

            //Verify
            $_pawns = $pawns;
            foreach ($_pawns as $index => $data) {
                $this->Bpartners = TableRegistry::get('Bpartners');
                $fullname = explode(' ', $data['name']);
                $firstname = $fullname[0];
                $lastname = isset($fullname[1]) ? $fullname[1] : '';
                $bpartner = $this->Bpartners->find()
                        ->where(['firstname' => $firstname, 'lastname' => $lastname, 'iscustomer' => 'Y', 'isactive' => 'Y'])
                        ->first();
                if (is_null($bpartner)) {
                    $bpartner = $this->Bpartners->newEntity();
                    $bpartner->name = $data['name'];
                    $bpartner->firstname = $firstname;
                    $bpartner->lastname = $lastname;
                    $bpartner->mobile = $data['mobile'];
                    $bpartner->iscustomer = 'Y';
                    $bpartner->isactive = 'Y';
                    $bpartner->branch_id = $this->Core->getLocalBranchId();
                    $bpartner->org_id = $this->Core->getLocalOrgId();
                    $bpartner->createdby = $this->Authen->getAuthenUserId();
                    $bpartner = $this->Bpartners->save($bpartner);
                }

                $pawns[$index]['bpartner_id'] = $bpartner->id;
                $pawns[$index]['warehouse'] = '7fc1b6aa-5a0f-4cb2-a622-82c15dd6187a';

                //Lines
                foreach ($data['lines'] as $index2 => $line) {
                    $productCategory = $this->ProductCategories->find()
                            ->where(['name' => $line['product_category_name']])
                            ->first();
                    if (!is_null($productCategory)) {
                        $pawns[$index]['lines'][$index2]['product_category_id'] = $productCategory->id;
                        $product_name = $this->Product->generateName($productCategory->id, null, null, null, $line['percent'], $line['weight']);

                        $pawns[$index]['lines'][$index2]['product_name'] = $product_name;
                    }else{
                        array_push($result,['msg'=>'ไม่พบประเภท','data'=>$line['product_category_name']]);
                        $iscorrect = false;
                    }
                }
            }


            if ($iscorrect) {


                foreach ($pawns as $data) {

                    $pawn = $this->Pawn->createDraft($data);
                    if ($pawn) {
                        $isOverPrice = 'N';
                        $totalAmout = 0;
                        foreach ($data['lines'] as $index => $line) {

                            $product = $this->Pawn->verifyProduct($line['product_name'], $line['product_category_id'], $line['percent'], null, $line['weight'], 0);

                            $price = $line['price'];
                            $totalAmout += floatval($price);


                            $pawnLine = $this->PawnLines->newEntity();
                            $pawnLine['pawn_id'] = $pawn->id;
                            $pawnLine['seq'] = $index + 1;
                            $pawnLine['product_id'] = $product->id;
                            //$pawnLine['description'] = $data['des'][$index];
                            $pawnLine['amount'] = $price;
                            $pawnLine['weight'] = $line['weight'];
                            $pawnLine['createdby'] = $this->Authen->getAuthenUserId();

                            //$img_id = $this->UploadImage->uploadpawnimage($data['img'][$index]);
                            //$pawnLine['image_id'] = $img_id['image_id'];
                            if (!$this->PawnLines->save($pawnLine)) {
                                $this->log($pawnLine->errors(), 'debug');
                            }
                        }


                        $startDate = $this->Util->convertDate($data['date']);
                        $endDate = $this->Util->convertDate($data['expiredate']);
                        $rateType = str_replace('%', '', $data['type']);
                        //$interestamt = $this->Pawn->getCalInterestRate($totalAmout, $rateType, $pawn->docdate, $pawn->expiredate);
                        $interestamt = 0;

                        $pawn->totalmoney = $totalAmout;
                        $pawn->type = $rateType;
                        $pawn->status = 'CO';


                        if ($isOverPrice == 'Y') {
                            $pawn->isoverprice = $isOverPrice;
                        }

                        $pawn = $this->Pawns->save($pawn);

                        $payment = $this->getSavePayment($data['bank_account_id'], $data['date'], 'CASH', $pawn->bpartner_id, $pawn->id, $data['totalmoney'], 'N', 'PAWN', $data['seller']);
                        $pawntransaction = $this->Pawn->createPawnTransaction($pawn, $data['totalmoney'], 'NEW', $rateType, $interestamt, $startDate, $endDate, $data['seller'], null, $payment['id']);
                    } else {
                        
                    }
                }
            }






            $result = [
                'result'=>$result,
                'pawns' => $pawns,
                'data' => $excelData
            ];

            $this->set(compact('result'));
        }
    }

    private function getSavePayment($bankAccountId = null, $docdate = null, $payment_method = null, $bp_id = null, $pawn_id = null, $amt = null, $isreceipt = 'N', $paymentType = null, $seller = null) {
        //Payment
        //getSaveDraft($paymentDate = null,$paymentMethod = null, $bankAccountId = null, $bpartnerId = null, $isReceipt = 'Y',$warehouseId = null, $type = null,$seller= null)
        $payment = $this->MakePayment->getSaveDraft($docdate, $payment_method, $bankAccountId, $bp_id, $isreceipt, null, $paymentType, $seller);
        //Payment Line
        //getSavePaymentLine($payment_id = null,$seq = 1, $description = null, $order_id = null,$pawn_id = null,$saving_account_id=null,$productId = null,$amount =0,$qty=1,$isExchange = 'N')
        $this->MakePayment->getSavePaymentLine($payment->id, 1, null, null, null, null, null, $amt, 1);
        //completedPayment($payment = null,$documentCode = null,$amount =0,$discount = 0,$usesavingamt = 0,$totalAmount = 0)


        $this->MakePayment->completedPayment($payment, ($isreceipt == 'Y' ? 'AR' : 'AP'), $amt, 0, 0, $amt);

        return $payment;
    }

}
