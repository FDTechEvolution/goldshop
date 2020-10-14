<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

/**
 * Bpartners Controller
 *
 * @property \App\Model\Table\BpartnersTable $Bpartners
 *
 * @method \App\Model\Entity\Bpartner[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BpartnersController extends AppController {

    public $Branches = null;
    public $Orgs = null;
    public $Addresses = null;
    public $SavingAccounts = null;
    public $Payments = null;
    public $Pawns = null;
    public $BankAccounts = null;
    public $SavingTransactions = null;
    public $PaymentLines = null;
    public $Promotions = null;
    public $OrderLines = null;
     public $BpUsePromotions = null;

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);

        $this->Branches = TableRegistry::get('Branches');
        $this->Orgs = TableRegistry::get('Orgs');
        $this->Addresses = TableRegistry::get('Addresses');
        $this->Pawns = TableRegistry::get('Pawns');
        $this->Payments = TableRegistry::get('Payments');
        $this->BankAccounts = TableRegistry::get('BankAccounts');
        $this->SavingTransactions = TableRegistry::get('SavingTransactions');
        $this->PaymentLines = TableRegistry::get('PaymentLines');
        $this->Promotions = TableRegistry::get('Promotions');
        $this->BpUsePromotions = TableRegistry::get('BpUsePromotions');

        $this->SavingAccounts = TableRegistry::get('SavingAccounts');
        if (!$this->Authen->authen()) {
            return $this->redirect(USERPERMISSION);
        }
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index($iscustomer = 'Y') {
        $q = $this->Bpartners->find()
                ->contain(['Addresses', 'Branches'])
                ->where(['iscustomer' => $iscustomer, 'Bpartners.id !=' => '0'])
                ->order(['Bpartners.created' => 'DESC', 'Bpartners.name' => 'ASC']);
        $bpartners = $q->toArray();
        $title = 'ข้อมูลลูกค้า';
        if ($iscustomer == 'N') {
            $title = 'ข้อมูลผู้ขาย/ผู้ผลิต/ช่าง';
        }
        $this->set(compact('bpartners', 'title', 'iscustomer'));
    }

    /**
     * View method
     *
     * @param string|null $id Bpartner id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null, $isCustomer = 'Y') {
        if ($isCustomer == 'N') {
            return $this->redirect(['action' => 'vendor', $id, $isCustomer]);
        }
        $bpartner = $this->Bpartners->get($id, [
            'contain' => ['Addresses', 'Branches']
        ]);

        $pawn = $this->Pawns->find('all', [
            'conditions' => ['Pawns.bpartner_id ' => $id],
            'contain' => ['Bpartners']
        ]);

        $q = $this->Payments->find()
                ->select(['Payments.id','Payments.ispromotionused', 'Payments.created', 'Payments.amount', 'Payments.discount', 'Payments.totalamt', 'Payments.paymentdate', 'Payments.docno', 'Payments.usesavingamt', 'Payments.isexchange', 'Payments.docstatus'])
                ->contain([
                    'PaymentLines' => [
                        'fields' => ['payment_id', 'invoice_id', 'totalamount', 'isexchange', 'isoverprice'],
                        'Products' => [
                            'fields' => ['name', 'manual_weight'],
                            'Weights' => [
                                'fields' => ['value']
                            ]
                        ],
                    ],
                    'PaymentMethodLines' => [
                        'fields' => ['payment_method', 'amount', 'payment_id'],
                        'BankAccounts' => ['fields' => ['account_name']]
                    ],
                    'Seller' => [
                        'fields' => ['firstname', 'lastname']
                    ],
                    'Bpartners' => [
                        'fields' => ['name']
                    ]
                ])
                ->where(['Payments.isreceipt' => 'Y', 'Payments.type' => 'SALES','Payments.bpartner_id'=>$bpartner->id])
                ->order(['Payments.created' => 'DESC']);
        $sales = $q->toArray();


        $q = $this->Payments->find()
                ->select(['Payments.id', 'Payments.created', 'Payments.amount', 'Payments.discount', 'Payments.totalamt', 'Payments.paymentdate', 'Payments.docno', 'Payments.isexchange', 'Payments.docstatus'])
                ->contain([
                    'PaymentLines' => [
                        'fields' => ['payment_id', 'invoice_id', 'isoverprice'],
                        'Products' => [
                            'fields' => ['name', 'manual_weight'],
                            'Weights' => [
                                'fields' => ['value']
                            ]
                        ],
                    ], 'BankAccounts' => ['fields' => ['account_name']],
                    'Seller' => [
                        'fields' => ['firstname', 'lastname']
                    ],
                    'Bpartners' => [
                        'fields' => ['name']
                    ]
                ])
                ->where(['Payments.isreceipt' => 'N', 'Payments.type' => 'PURCHASE', 'Payments.bpartner_id' => $bpartner->id])
                ->order(['Payments.created' => 'DESC']);
        $purchase = $q->toArray();

        $data = $this->SavingAccounts->find('all', [
            'contain' => ['SavingTransactions'=>['Seller'], 'Branches'],
            'conditions' => ['SavingAccounts.bpartner_id' => $bpartner->id],
            
        ]);
        $savingAccount = $data->first();
        
        $q = $this->BpUsePromotions->find()
                ->contain(['UserCreated'])
                ->where(['BpUsePromotions.bpartner_id'=>$bpartner->id])
                ->order(['BpUsePromotions.usedate'=>'DESC']);
        $usePromotions = $q->toArray();
        

        $docStatusList = $this->TransactionCode->getStatusCode();


        $this->set(compact('bpartner', 'pawn', 'docStatusList', 'sales', 'purchase', 'savingAccount', 'savingTransaction','usePromotions'));
    }

    public function vendor($id = null) {
        $this->OrderLines = TableRegistry::get('OrderLines');

        $bpartner = $this->Bpartners->get($id, [
            'contain' => ['Addresses']
        ]);
        //$this->log($bpartner,'debug');

        $q = $this->OrderLines->find()
                ->contain(['Orders', 'Products'])
                ->where(['OrderLines.bpartner_id' => $bpartner->id, 'OrderLines.order_status !=' => 'PD'])
                ->order(['OrderLines.orderdate' => 'DESC']);
        $orderLines = $q->toArray();

        $q = $this->OrderLines->find()
                ->contain(['Orders', 'Products'])
                ->where(['OrderLines.bpartner_id' => $bpartner->id])
                ->order(['OrderLines.orderdate' => 'DESC']);
        $allOrderLines = $q->toArray();

        $docStatus = $this->TransactionCode->getOrderStatus();


        $this->set(compact('bpartner', 'orderLines', 'docStatus', 'allOrderLines'));
    }

    public function add($iscustomer = 'Y') {

        $title = 'ข้อมูลลูกค้า';
        if ($iscustomer == 'N') {
            $title = 'ข้อมูลผู้ขาย/ผู้ผลิต/ช่าง';
        }
        $bpartner = $this->Bpartners->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            //$this->log($data,'debug');
            //Check duplicate bp
            if ($data['taxid'] != '' && $iscustomer == 'Y') {
                $q = $this->Bpartners->findByTaxid($data['taxid']);
                $_bp = $q->first();
            } else {
                $_bp = '';
            }

            //$this->log($_bp, 'debug');
            if (is_null($_bp) || $_bp == '') {

                ///////////////Add address//////////
                $address = $this->Addresses->newEntity();

                $address = $this->Addresses->patchEntity($address, $data['address']);
                $address->createdby = $this->Authen->getAuthenUserId();


                $result = $this->Addresses->save($address);

                if ($result) {
                    $bpartner = $this->Bpartners->patchEntity($bpartner, $data);
                    if (isset($data['iscompany']) && $data['iscompany'] == 'Y') {
                        $bpartner->name = $data['name'];
                        $bpartner->title = null;
                        $bpartner->firstname = null;
                        $bpartner->lastname = null;
                    } else {
                        $bpartner->name = $data['title'] . $data['firstname'] . ' ' . $data['lastname'];
                        $bpartner->birthday = $this->Util->convertDate($data['birthday']);
                    }

                    $bpartner->org_id = $this->Core->getLocalOrgId();
                    $bpartner->createdby = $this->Authen->getAuthenUserId();

                    $bpartner->address_id = $address->id;
                    $bpartner->branch_id = $this->Core->getLocalBranchId();
                    $bpartner->iscustomer = $iscustomer;
                    $bpartner->isactive = 'Y';

                    if ($this->Bpartners->save($bpartner)) {
                        $this->Flash->success(__('บันทึกข้อมูลเรียบร้อย'));

                        return $this->redirect(['action' => 'index', $iscustomer]);
                    } else {
                        $this->log($bpartner->errors(), 'error');
                        $this->Flash->error(__('ไม่สามารถบันทึกข้อมูลได้'));
                    }
                } else {
                    $this->log($address->errors(), 'error');
                    $this->Flash->error(__('ไม่สามารถบันทึกที่อยู่ได้'));
                }
            } else {
                $this->Flash->error(__('ระบบมีข้อมูลอยู่แล้ว ไม่สามารถบันทึกซ้ำได้'));
            }
        }
        $this->set(compact('bpartner', 'title', 'iscustomer'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Bpartner id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $bpartner = $this->Bpartners->get($id, [
            'contain' => ['Addresses']
        ]);

        $title = 'ข้อมูลลูกค้า';
        if ($bpartner->iscustomer == 'N') {
            $title = 'ข้อมูลผู้ขาย/ผู้ผลิต/ช่าง';
        }


        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();
            $bpartner = $this->Bpartners->patchEntity($bpartner, $data);

            $bpartner->name = $data['title'] . $data['firstname'] . ' ' . $data['lastname'];
            
            $bpartner->modifiedby = $this->Authen->getAuthenUserId();
            $bpartner->birthday = $this->Util->convertDate($data['birthday']);

            if ($this->Bpartners->save($bpartner)) {
                $this->Flash->success(__('The bpartner has been saved.'));

                return $this->redirect(['action' => 'edit', $id]);
            }
            $this->Flash->error(__('The bpartner could not be saved. Please, try again.'));
        }
        $this->set(compact('bpartner', 'title'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Bpartner id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->Invoices = TableRegistry::get('Invoices');
        $this->Payments = TableRegistry::get('Payments');

        $this->request->allowMethod(['post', 'delete']);
        $bpartner = $this->Bpartners->get($id);

        //Check has transactions
        $q = $this->Invoices->find()
                ->where(['bpartner_id' => $bpartner->id]);
        $countHasInvoice = $q->count();

        $q = $this->Payments->find()
                ->where(['bpartner_id' => $bpartner->id]);
        $countHasPayment = $q->count();

        if ($countHasInvoice == 0 && $countHasPayment == 0) {
            if ($this->Bpartners->delete($bpartner)) {
                $this->Flash->success(__('ลบข้อมูลแล้ว'));
            } else {
                $this->Flash->error(__('ไม่สามารถลบได้ กรุณาลองอีกครั้ง'));
            }
        } else {
            $bpartner->modifiedby = $this->Authen->getAuthenUserId();
            $bpartner->isactive = 'N';
            if ($this->Bpartners->save($bpartner)) {
                $this->Flash->success(__('ทำได้เพียงปิดการใช้งาน เนื่องจากลูกค้ามีธุรกรรมในระบบ'));
            } else {
                $this->Flash->error(__('ไม่สามารถลบได้ กรุณาลองอีกครั้ง'));
            }
        }




        return $this->redirect(['action' => 'index']);
    }

    public function ajaxSearch() {
        $this->autoRender = false;
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $text = $data['search_text'];
            $q = $this->Bpartners->find()
                    ->contain(['Addresses', 'SavingAccounts'])
                    ->where(['Bpartners.iscustomer' => 'Y', 'Bpartners.id !=' => '0', 'OR' => [
                            ['Bpartners.name LIKE' => '%' . $text . '%'],
                            ['Bpartners.mobile LIKE' => '%' . $text . '%'],
                            ['Bpartners.taxid LIKE' => '%' . $text . '%']]])
                    ->order(['Bpartners.firstname' => 'ASC'])
                    ->limit(20);

            $bpartners = $q->toArray();
            echo json_encode($bpartners);
            die();
            //$this->log($bpartners, 'debug');
        }
    }

    public function ajaxsavecus() {
        $this->viewBuilder()->layout('ajax');

        $bpartner = $this->Bpartners->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $_result = $this->verifybp($data);
            if ($_result != 'ok') {
                echo $_result;
                die();
            }
            //Check duplicate bp
            $_bps = [];
            if (!is_null($data['taxid']) && $data['taxid'] != '') {
                $q = $this->Bpartners->find()
                        ->contain(['Addresses'])
                        ->where(['Bpartners.taxid' => $data['taxid']])
                        ->limit(1);
                if (sizeof($q->toArray()) > 0) {
                    $bp = $q->first();
                    echo json_encode($bp);
                    die();
                }
            }

            if (!is_null($data['firstname']) && $data['firstname'] != '') {
                $q = $this->Bpartners->find()
                        ->contain(['Addresses'])
                        ->where(['Bpartners.firstname' => $data['firstname'], 'Bpartners.lastname' => $data['lastname']])
                        ->limit(1);
                if (sizeof($q->toArray()) > 0) {
                    $bp = $q->first();
                    echo json_encode($bp);
                    die();
                }
            }

            $addressData['address_line'] = $data['address_line'];
            $addressData['subdistrict'] = $data['subdistrict'];
            $addressData['district'] = $data['district'];
            $addressData['province'] = $data['province'];
            $addressData['postalcode'] = $data['postalcode'];

            $address = $this->Addresses->newEntity();
            $address = $this->Addresses->patchEntity($address, $addressData);
            $address->createdby = $this->Authen->getAuthenUserId();

            $result = $this->Addresses->save($address);

            if ($result) {
                $bpartner = $this->Bpartners->patchEntity($bpartner, $data);

                $bpartner->name = $data['title'] . $data['firstname'] . ' ' . $data['lastname'];
                $bpartner->org_id = $this->Core->getLocalOrgId();
                $bpartner->createdby = $this->Authen->getAuthenUserId();
                $bpartner->branch_id = $this->Core->getLocalBranchId();
                $bpartner->isactive = 'Y';
                $bpartner->iscustomer = 'Y';
                if (!is_null($data['birthday']) && $data['birthday'] != '') {
                    $bpartner->birthday = $this->Util->convertDate($data['birthday']);
                }
                $bpartner->address_id = $address->id;

                if ($this->Bpartners->save($bpartner)) {

                    $q = $this->Bpartners->find()
                            ->contain(['Addresses'])
                            ->where(['Bpartners.id' => $bpartner->id])
                            ->limit(1);
                    $bp = $q->first();
                    echo json_encode($bp);
                    die();
                } else {
                    $this->log($bpartner->errors(), 'error');
                    echo 'ไม่สามารถบันทึกข้อมูลได้';
                    die();
                }
            } else {
                $this->log($address->errors(), 'error');
                echo 'ไม่สามารถบันทึกที่อยู่ได้';
                die();
            }
        }
    }

    private function verifybp($data = null) {
        if (is_null($data) || $data == '') {
            return 'ไม่พบข้อมูลที่ต้องการบันทึก';
        }
        if ($data['firstname'] == '') {
            return 'ไม่ได้ระบุชื่อจริง';
        }
        if ($data['lastname'] == '') {
            return 'ไม่ได้ระบุนามสกุล';
        }
        /*
          if ($data['taxid'] == '') {
          //return 'ไม่ได้ระบุเลขบัตรประชาชน';
          }
          if ($data['mobile'] == '') {
          //return 'ไม่ได้ระบุเบอร์โทรศัพท์';
          }
          if ($data['address_line'] == '') {
          return 'ไม่ได้ระบุที่อยู่';
          }
          if ($data['subdistrict'] == '') {
          return 'ไม่ได้ระบุตำบล';
          }
          if ($data['district'] == '') {
          return 'ไม่ได้ระบุอำเภอ';
          }
          if ($data['province'] == '') {
          return 'ไม่ได้ระบุจังหวัด';
          }
         * 
         */

        return 'ok';
    }

}
