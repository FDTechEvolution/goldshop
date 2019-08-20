<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\I18n\Date;
/**
 * Income Controller
 *
 *
 * @method \App\Model\Entity\Income[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class IncomeController extends AppController {

    public $Payments = null;
    public $Users = null;
    public $IncomeTypes = null;
    public $BankAccounts = null;

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);

        if (!$this->Authen->authen()) {
            return $this->redirect(USERPERMISSION);
        }
        $this->Payments = TableRegistry::get('Payments');
        $this->Users = TableRegistry::get('Users');
        $this->BankAccounts = TableRegistry::get('BankAccounts');
        $this->IncomeTypes = TableRegistry::get('IncomeTypes');

        $this->loadComponent('IncomeProcess');

    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
        $todayDate = new Date();
        $income = $this->Payments->newEntity();
        
        if ($this->request->is(['post'])) {
            $postData = $this->request->getData();
            $this->log($postData,'debug');
            $bankAccountId = null;
            $income_type_id = $postData['income_type_id'];
            if(!isset($postData['income_type_id']) || $postData['income_type_id'] ==''){
                $income_type_id = $this->manageIncomeType($postData['income_type'],$postData['isexpend']);
            }

            $isExpend = $postData['isexpend'];
            if($isExpend =='Y'){
                //getSaveExpend($docdate = null,$payment_method = null,$income_type_id = null, $bank_account_id = null,$seller = null, $amount = 0,$description = null)
                $this->IncomeProcess->getSaveExpend($postData['docdate'], $postData['payment_method'],
                        $income_type_id,$postData['bank_account_id'],$postData['seller'],
                        $postData['amount'],$postData['description']);
            }else{
                $this->IncomeProcess->getSaveRevenue($postData['docdate'], $postData['payment_method'],
                        $income_type_id,$postData['bank_account_id'],$postData['seller'],
                        $postData['amount'],$postData['description']);
            }

            $this->Flash->success(__('บันทึกเรียบร้อยแล้ว'));
            return $this->redirect(['action' => 'index']);
        }
        
        $wording = 'รายรับ รายจ่ายประจำวันที่ '.$todayDate->i18nFormat(DATE_FORMATE, null, TH_DATE);;

        $q = $this->Payments->find()
                ->contain(['PaymentLines'=>['IncomeTypes'],'Branches','BankAccounts'])
                ->where(['OR'=>[['Payments.type'=>'EXPEND'],['Payments.type'=>'REVENUE']],'Payments.paymentdate' => $todayDate])
                ->order(['Payments.paymentdate'=>'DESC','Payments.created'=>'DESC']);
        $incomes = $q->toArray();

       //Get seller
        $sellerList = $this->Core->getSellerList();

        $incomeTypeExpendList = $this->getIncomeTypeList('Y');
        $incomeTypeExpendList = json_encode($incomeTypeExpendList);

        $incomeTypeRevenueList = $this->getIncomeTypeList('N');
        $incomeTypeRevenueList = json_encode($incomeTypeRevenueList);

        //Get bank account
        $bankAccountList = $this->getBankAccountList('BACC');


        $this->set(compact('income','wording','incomes','isreceipt','title','sellerList','incomeTypeExpendList','incomeTypeRevenueList','bankAccountList'));
    }

    private function manageIncomeType($name = null,$isexpend='Y'){
        $incomeType =  $this->IncomeTypes->newEntity();
        $incomeType->name = $name;
        $incomeType->isexpend = $isexpend;
        $incomeType->createdby = $this->Authen->getAuthenUserId();

        $this->IncomeTypes->save($incomeType);

        return $incomeType->id;

    }

    public function void(){
        //$this->viewBuilder()->layout('json');
        $id = $this->request->getQuery('id');
        if(!is_null($id)){
            $this->IncomeProcess->void($id);
            $this->Flash->success(__('ยกเลิกแล้ว'));
        }else{
            $this->Flash->error(__('ไม่สามารถยกเลิกได้'));
        }
        return $this->redirect(['action' => 'index']);
    }
    
    public function view($id = null) {
        $income = $this->Income->get($id, [
            'contain' => []
        ]);





    }



    /**
     * Edit method
     *
     * @param string|null $id Income id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $income = $this->Income->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $income = $this->Income->patchEntity($income, $this->request->getData());
            if ($this->Income->save($income)) {
                $this->Flash->success(__('The income has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The income could not be saved. Please, try again.'));
        }
        $this->set(compact('income'));
    }

    private function getBankAccountList($type = null) {

        $q = $this->BankAccounts->find()
                ->contain(['Banks'])
                ->where([
                    'type' => $type,
                    'org_id' => $this->Core->getLocalOrgId(),
                    'OR' => [['branch_id' => '0'], ['branch_id' => $this->Core->getLocalBranchId()]]
                ])
                ->order(['account_name' => 'ASC']);
        $bankAccounts = $q->toArray();

        $list = [];
        foreach ($bankAccounts as $item) {
            //array_push($list, [$item['id']=>$item['firstname'].'  '.$item['lastname']]);
            $list[$item->id] = $item->bank->name . ' ' . $item->account_name.' '.$item->accountno;
        }
        return $list;
    }

    private function getIncomeTypeList($isexpend = 'Y'){
        $this->IncomeTypes = TableRegistry::get('IncomeTypes');
        $q = $this->IncomeTypes->find()
                ->select(['name','id'])
                //->where(['isexpend'=>$isexpend])
                ->where(['name !='=>''])
                ->order(['name'=>'ASC']);
        $incomeTypes = $q->toArray();

        return $incomeTypes;
    }

}
