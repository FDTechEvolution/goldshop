<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;
use Cake\Datasource\ConnectionManager;
use Cake\I18n\Date;
/**
 * Login Controller
 *
 *
 * @method \App\Model\Entity\Login[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ReportsController extends AppController {

    public $Branches = null;
    public $Orgs = null;
    public $Pawns = null;
    public $Bpartners = null;
    public $Users = null;
    public $SavingAccounts = null;
    public $Invoices = null;
    public $Payments = null;
    public $PawnLines = null;
    public $Products = null;
    public $SavingTransactions = null;
    public $WhProducts = null;
    public $Connection = null;
    public $Warehouses = null;
    public $PawnTransactions = null;
    public $Orders = null;
    public $GoodsTransactions = null;
    public $CloseDays = null;

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->Pawns = TableRegistry::get('Pawns');
        $this->SavingAccounts = TableRegistry::get('SavingAccounts');
        $this->Bpartners = TableRegistry::get('Bpartners');
        $this->Users = TableRegistry::get('Users');
        $this->Branches = TableRegistry::get('Branches');
        $this->Orgs = TableRegistry::get('Orgs');
        $this->Invoices = TableRegistry::get('Invoices');
        $this->Payments = TableRegistry::get('Payments');
        $this->PawnLines = TableRegistry::get('PawnLines');
        $this->Products = TableRegistry::get('Products');
        $this->SavingTransactions = TableRegistry::get('SavingTransactions');
        Time::setToStringFormat('YYYY-MM-dd HH:mm:ss');
        $action = strtolower($this->request->params['action']);

        if ($action != 'index' && $action != 'logout') {
            if (!$this->Authen->authen()) {
                return $this->redirect(USERPERMISSION);
            }
        }

        $this->loadComponent('Accounting');

        $this->Connection = ConnectionManager::get('default');
    }

    public function index() {
        $type = ['income' => 'รายรับ', 'expense' => 'รายจ่าย', 'pawn' => 'รายชื่อลูกค้าจำนำ', 'saving' => 'ลูกค้าออมเงิน', 'sale' => 'สรุปยอดขายแต่ละวัน', 'emp' => 'ยอดขายของพนักงาน', 'stock' => 'รายการสินค้าคงเหลือ'];
        $month = ["1" => "มกราคม", "2" => "กุมภาพันธ์", "3" => "มีนาคม", "4" => "เมษายน", "5" => "พฤษภาคม", "6" => "มิถุนายน", "7" => "กรกฎาคม", "8" => "สิงหาคม", "9" => "กันยายน", "10" => "ตุลาคม", "11" => "พฤศจิกายน", "12" => "ธันวาคม"];

//        $date = new date();
//        $makeyear = $date->format('Y') + 543;
//        $year = [];
//        for ($i = 0; $i < 10; $i++) {
//            $year[$makeyear] = $makeyear;
//            $makeyear--;
//        }
//        $this->set(compact('type', 'month', 'year'));
//        $datas = [];
//
//        $this->log($year, 'debug');
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            if ($data['type'] == 'pawn') {


                if ($data['dm'] == 'day') {
                    $date = $this->Util->convertDate($data['date']);

                    return $this->redirect(['action' => 'pawnreport', $date, '-', '-']);
                } else {
                    $ds = '1/' . $data['month'] . '/' . $data['year'];
                    $de = '31/' . $data['month'] . '/' . $data['year'];
                    $datestart = $this->Util->convertDate($ds);
                    $dateend = $this->Util->convertDate($de);

                    return $this->redirect(['action' => 'pawnreport', '-', $datestart, $dateend]);
                }
            } else if ($data['type'] == 'saving') {
                return $this->redirect(['action' => 'savingreport']);
            } else if ($data['type'] == 'emp') {

                if ($data['dm'] == 'day') {
                    $date = $this->Util->convertDate($data['date']);

                    return $this->redirect(['action' => 'salereport', $date, '-', '-']);
                } else {
                    $ds = '1/' . $data['month'] . '/' . $data['year'];
                    $de = '31/' . $data['month'] . '/' . $data['year'];
                    $datestart = $this->Util->convertDate($ds);
                    $dateend = $this->Util->convertDate($de);

                    return $this->redirect(['action' => 'salereport', '-', $datestart, $dateend]);
                }
            }
        }

        $stats = $this->getStatData();
        $this->set('stats', json_encode($stats));
    }

    public function income() {
        $this->CloseDays = TableRegistry::get('CloseDays');
        $newData = null;
        if ($this->request->is('post')) {
            $postData = $this->request->getData();
            $startDate = $postData['start_date'];
            $endDate = $postData['end_date'];
            $branchId = $postData['branch_id'];

            $newStartDate = new Date($this->Util->convertDate($startDate));
            $newEndDate = new Date($this->Util->convertDate($endDate));

            $q = $this->CloseDays->find()
                    ->contain(['CloseDayLines'])
                    ->where(['CloseDays.close_date >='=>$newStartDate,'CloseDays.close_date <='=>$newEndDate,'CloseDays.status'=>'CO'])
                    ->order(['CloseDays.close_date' => 'ASC']);
            $incomes = $q->toArray();
            //$this->log($incomes,'debug');
            //$newData = $this->Accounting->journal($startDate, $endDate, $branchId);
        }
        $branches = $this->Branches->find('list', ['conditions' => ['id !=' => '0']]);
        $this->set(compact('branches', 'incomes', 'startDate', 'endDate'));

        $this->set('pageTitle', 'รายงานรายรับ-รายจ่าย');
    }

    public function pawnreport() {
        $pawns = null;
        $reportSubTitle = '';

        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $startDate = $data['start_date'];
            $endDate = $data['end_date'];
            $branchId = $data['branch_id'];

            $sql = '';
            if ((is_null($startDate) || $startDate == '') && (is_null($endDate) || $endDate == '')) {
                $reportSubTitle = 'รายงานจำนำคงค้างในระบบทั้งหมด';
                $sql = 'select pawns.totalmoney,pawns.docno,pawns.created,bpartners.name as bpname,users.firstname,products.name as product_name,pawn_lines.weight '
                        . 'from pawn_lines '
                        . 'join products on pawn_lines.product_id = products.id '
                        . 'join product_categories on products.product_category_id = product_categories.id '
                        . 'join pawns on pawn_lines.pawn_id = pawns.id '
                        . 'join bpartners on pawns.bpartner_id = bpartners.id '
                        . 'join users on pawns.seller = users.id '
                        . 'where product_categories.type = :type and pawns.branch_id = :branch_id '
                        . 'and pawns.status = "CO" order by pawns.docno ASC,pawns.created ASC';
            } else {
                $reportSubTitle = 'รายงานรับจำนำ';


                $sql = 'select pawns.totalmoney,pawns.docno,pawns.created,bpartners.name as bpname,users.firstname,products.name as product_name,pawn_lines.weight '
                        . 'from pawn_lines '
                        . 'join products on pawn_lines.product_id = products.id '
                        . 'join product_categories on products.product_category_id = product_categories.id '
                        . 'join pawns on pawn_lines.pawn_id = pawns.id '
                        . 'join bpartners on pawns.bpartner_id = bpartners.id '
                        . 'join users on pawns.seller = users.id '
                        . 'where product_categories.type = :type and pawns.branch_id = :branch_id '
                        . 'and pawns.docdate >= :start_date and pawns.docdate <= :end_date '
                        . 'order by pawns.docno ASC,pawns.created ASC';
            }

            $poductTypes = $this->TransactionCode->getProductType();
            $pawnArr = [];
            //$pawns = $poductTypes;
            foreach ($poductTypes as $type) {
                $pawns = [];
                $code = $type['code'];
                $result = [];
                if ((is_null($startDate) || $startDate == '') && (is_null($endDate) || $endDate == '')) {
                    $result = $this->Connection->execute($sql, ['type' => $code, 'branch_id' => $branchId])
                            ->fetchAll('assoc');
                } else {
                    $_startDate = $this->Util->convertDate($startDate);
                    $_startDate = new Time($_startDate . '0:0:0');

                    $_endDate = $this->Util->convertDate($endDate);
                    $_endDate = new Time($_endDate . '24:0:0');
                    $result = $this->Connection->execute($sql, ['type' => $code, 'branch_id' => $branchId, 'start_date' => $_startDate, 'end_date' => $_endDate])
                            ->fetchAll('assoc');
                }

                $pawns['code'] = $type['code'];
                $pawns['title'] = $type['title'];
                $pawns['pawns'] = $result;
                array_push($pawnArr, $pawns);
            }

            //re-calculate
            $weightTotalAmt = 0;
            $totalAmt = 0;
            for ($i = 0; $i < sizeof($pawnArr); $i++) {
                $weightamt = 0;
                $amt = 0;
                for ($j = 0; $j < sizeof($pawnArr[$i]['pawns']); $j++) {
                    $weightamt = $weightamt + $pawnArr[$i]['pawns'][$j]['weight'];
                    $_created = $pawnArr[$i]['pawns'][$j]['created'];
                    $pawnArr[$i]['pawns'][$j]['created'] = new Time($_created);
                    $amt = $amt + $pawnArr[$i]['pawns'][$j]['totalmoney'];
                }
                $pawnArr[$i]['weightamt'] = $weightamt;
                $pawnArr[$i]['totalAmt'] = $amt;
                $weightTotalAmt = $weightTotalAmt + $weightamt;
                $totalAmt = $totalAmt + $amt;
            }

            $pawnArr['weightTotalAmt'] = $weightTotalAmt;
            $pawnArr['totalAmt'] = $totalAmt;
        }

        $branches = $this->Branches->find('list', ['conditions' => ['id !=' => '0']]);
        $this->set(compact('pawnArr', 'branches', 'reportSubTitle', 'startDate', 'endDate'));
        $this->set('pageTitle', 'รายงานจำนำ');
    }

    public function savingreport() {
        $dataArr = null;
        $startDate = '';
        $endDate = '';
        $isAllAccount = 'N';

        if ($this->request->is('post')) {

            $postData = $this->request->getData();
            $startDate = $postData['start_date'];
            $endDate = $postData['end_date'];
            $branchId = $postData['branch_id'];

            if ((is_null($startDate) || $startDate == '') && (is_null($endDate) || $endDate == '')) {
                $q = $this->SavingAccounts->find()
                        ->contain(['Bpartners'])
                        ->where(['SavingAccounts.branch_id' => $branchId, 'SavingAccounts.balanceamt >' => 0])
                        ->order(['SavingAccounts.registerdate' => 'DESC']);
                $dataArr = $q->toArray();
                $isAllAccount = 'Y';
            } else {
                $datest = new Time($this->Util->convertDate($startDate) . '0:0:0');
                $dateed = new Time($this->Util->convertDate($endDate) . '24:0:0');

                $dataArr = $this->SavingTransactions->find('all', [
                    'contain' => ['Seller', 'Orgs', 'Branches', 'SavingAccounts' => ['Bpartners']],
                    'conditions' => ['SavingTransactions.created >=' => $datest, 'SavingTransactions.created <=' => $dateed, 'SavingTransactions.branch_id' => $branchId],
                    'order' => ['SavingTransactions.created asc']
                ]);
            }



            //$this->log($dataArr->toArray(), 'debug');
        }
        $branches = $this->Branches->find('list', ['conditions' => ['id !=' => '0']]);
        $this->set(compact('dataArr', 'branches', 'startDate', 'endDate', 'isAllAccount'));
    }

    public function transaction() {
        $dataArr = null;
        if ($this->request->is('post')) {
            $postData = $this->request->getData();
            $_startDate = $postData['start_date'];
            $_endDate = $postData['end_date'];
            $this->set('startDate', $_startDate);
            $this->set('endDate', $_endDate);


            $startDate = $this->Util->convertDate($_startDate);
            $endDate = $this->Util->convertDate($_endDate);

            $branchId = $postData['branch_id'];
            $branch = $this->Branches->get($branchId);
            $title = sprintf("สาขา%s ตั้งแต่วันที่ %s ถึง %s", $branch->name, $startDate, $endDate);
            $this->set('title', $title);

            $_Reports = isset($postData['report']) ? $postData['report'] : [];

            if (in_array('sales', $_Reports)) {
                $q = $this->Payments->find()
                        ->contain(['Seller', 'PaymentLines' => ['Products'], 'PaymentMethodLines' => ['BankAccounts']])
                        ->where([
                            'Payments.isreceipt' => 'Y',
                            'Payments.type' => 'SALES',
                            'Payments.docno !=' => '_temp',
                            'Payments.docstatus' => 'CO',
                            'Payments.paymentdate >=' => $startDate,
                            'Payments.paymentdate <=' => $endDate,
                            'Payments.branch_id' => $branchId
                        ])
                        ->order(['Payments.created' => 'DESC']);
                $result = $q->toArray();
                $this->set('sales', $result);
            }

            if (in_array('purchase', $_Reports)) {
                $q = $this->Payments->find()
                        ->contain(['Seller', 'PaymentLines' => ['Products'], 'PaymentMethodLines' => ['BankAccounts']])
                        ->where([
                            'Payments.isreceipt' => 'N',
                            'Payments.type' => 'PURCHASE',
                            'Payments.docno !=' => '_temp',
                            'Payments.docstatus' => 'CO',
                            'Payments.paymentdate >=' => $startDate,
                            'Payments.paymentdate <=' => $endDate,
                            'Payments.branch_id' => $branchId
                        ])
                        ->order(['Payments.created' => 'DESC']);
                $result = $q->toArray();
                $this->set('purchase', $result);
            }

            if (in_array('pawn', $_Reports)) {
                $this->PawnTransactions = TableRegistry::get('PawnTransactions');
                $q = $this->PawnTransactions->find()
                        ->contain(['Pawns' => ['PawnLines' => ['Products'], 'Seller', 'Bpartners']])
                        ->where([
                            'PawnTransactions.type' => 'NEW',
                            'Pawns.docno !=' => '_temp',
                            'Pawns.status' => 'CO',
                            'Pawns.docdate >=' => $startDate,
                            'Pawns.docdate <=' => $endDate,
                            'Pawns.branch_id' => $branchId
                        ])
                        ->order(['PawnTransactions.created' => 'ASC']);
                $result = $q->toArray();
                $this->set('pawns', $result);
            }

            if (in_array('pawn_interest', $_Reports)) {
                $this->PawnTransactions = TableRegistry::get('PawnTransactions');
                $q = $this->PawnTransactions->find()
                        ->contain(['Pawns' => ['PawnLines' => ['Products'], 'Seller', 'Bpartners']])
                        ->where([
                            'PawnTransactions.type' => 'RN',
                            'Pawns.docno !=' => '_temp',
                            'Pawns.status' => 'CO',
                            'Pawns.docdate >=' => $startDate,
                            'Pawns.docdate <=' => $endDate,
                            'Pawns.branch_id' => $branchId
                        ])
                        ->order(['PawnTransactions.created' => 'ASC']);
                $result = $q->toArray();
                $this->set('pawnInterests', $result);
            }

            if (in_array('pawn_return', $_Reports)) {
                $this->PawnTransactions = TableRegistry::get('PawnTransactions');
                $q = $this->PawnTransactions->find()
                        ->contain(['Pawns' => ['PawnLines' => ['Products'], 'Seller', 'Bpartners']])
                        ->where([
                            'PawnTransactions.type' => 'RF',
                            'Pawns.docno !=' => '_temp',
                            'Pawns.status' => 'CO',
                            'Pawns.docdate >=' => $startDate,
                            'Pawns.docdate <=' => $endDate,
                            'Pawns.branch_id' => $branchId
                        ])
                        ->order(['PawnTransactions.created' => 'ASC']);
                $result = $q->toArray();
                $this->set('pawnReturns', $result);
            }

            if (in_array('order', $_Reports)) {
                $this->Orders = TableRegistry::get('Orders');
                $q = $this->Orders->find()
                        ->select(['Orders.id', 'Orders.totalamt', 'Orders.totalpaid', 'Orders.duedate', 'Orders.docno', 'Orders.isreceived', 'Orders.created'])
                        ->contain([
                            'PaymentLines' => [
                                'fields' => ['payment_id', 'order_id'],
                                'Payments' => [
                                    'fields' => ['payment_method'],
                                    'BankAccounts' => [
                                        'fields' => ['account_name']
                                    ]]
                            ],
                            'OrderLines' => [
                                'fields' => ['id', 'order_id', 'totalamt'],
                                'Products' => [
                                    'fields' => ['name']
                                ],
                                'sort' => ['OrderLines.seq' => 'ASC']
                            ],
                            'Seller' => [
                                'fields' => ['firstname', 'lastname']
                            ],
                            'Bpartners' => [
                                'fields' => ['name']
                            ]
                        ])
                        ->where([
                            'Orders.docno !=' => '_temp',
                            'Orders.branch_id' => $branchId,
                            'Orders.docdate >=' => $startDate,
                            'Orders.docdate <=' => $endDate,
                            'Orders.docstatus' => 'CO'
                        ])
                        ->order(['Orders.isreceived' => 'DESC', 'Orders.duedate' => 'ASC']);

                $result = $q->toArray();
                $this->set('orders', $result);
            }


            if (in_array('saving', $_Reports)) {
                //$this->PawnTransactions = TableRegistry::get('PawnTransactions');
                $q = $this->SavingTransactions->find()
                        ->contain(['SavingAccounts', 'BankAccounts', 'Seller'])
                        ->where([
                            'SavingTransactions.branch_id' => $branchId,
                            'SavingTransactions.docdate >=' => $startDate,
                            'SavingTransactions.docdate <=' => $endDate
                        ])
                        ->order(['SavingTransactions.created' => 'ASC']);
                $result = $q->toArray();
                $this->set('savingTransactions', $result);
            }

            if (in_array('broken', $_Reports)) {
                $this->GoodsTransactions = TableRegistry::get('GoodsTransactions');
                $q = $this->GoodsTransactions->find()
                        ->contain(['GoodsLines' => ['Products'], 'Seller'])
                        ->where([
                            'GoodsTransactions.type' => 'BK',
                            'GoodsTransactions.docdate >=' => $startDate,
                            'GoodsTransactions.docdate <=' => $endDate,
                            'GoodsTransactions.branch_id' => $branchId
                        ])
                        ->order(['GoodsTransactions.created' => 'ASC']);
                $result = $q->toArray();
                $this->set('brokens', $result);
            }
        }

        $paymentMethods = $this->TransactionCode->getPaymentMethod('list');
        $branches = $this->Branches->find('list', ['conditions' => ['id !=' => '0']]);
        $this->set(compact('branches', 'dataArr', 'paymentMethods'));

        $this->set('pageTitle', 'Transaction Report');
    }

    public function seller() {
        
    }

    public function order() {
        if ($this->request->is('post')) {
            $this->Orders = TableRegistry::get('Orders');
            $postData = $this->request->getData();
            $startDate = $postData['start_date'];
            $endDate = $postData['end_date'];
            $_startDate = $this->Util->convertDate($startDate);
            $_endDate = $this->Util->convertDate($endDate);
            $branchId = $postData['branch_id'];

            $q = $this->Orders->find()
                    ->contain(['OrderLines' => ['Products', 'Bpartners']])
                    ->where(['Orders.isordered' => 'Y'])
                    ->order(['Orders.docdate' => 'ASC']);
            $orders = $q->toArray();

            $this->set(compact('orders', 'startDate', 'endDate'));
        }

        $branches = $this->Branches->find('list', ['conditions' => ['id !=' => '0']]);
        $this->set(compact('branches'));
        $this->set('pageTitle', 'รายการสั่งทำ');
    }

    public function warehouse() {
        $this->Warehouses = TableRegistry::get('Warehouses');

        $warehouseArr = null;
        $branch = null;
        $date = null;

        if ($this->request->is('post')) {
            $this->WhProducts = TableRegistry::get('WhProducts');

            $postData = $this->request->getData();
            $this->log($postData, 'debug');
            $branchId = $postData['branch_id'];
            $warehouse_id = $postData['warehouse_id'];

            $where = ['Warehouses.branch_id' => $branchId];
            if ($warehouse_id != null && $warehouse_id != '') {
                array_push($where, ['Warehouses.id' => $warehouse_id]);
            }

            $q = $this->Warehouses->find()
                    ->contain(['WhProducts' => ['Products', 'sort' => ['Products.name' => 'ASC']], 'Branches'])
                    ->where($where)
                    ->order([]);
            $warehouseArr = $q->toArray();

            $branch = $this->Branches->get($branchId);
            $date = Time::now();
        }

        $branches = $this->Branches->find('list', ['conditions' => ['id !=' => '0']]);
        $warehouses = $this->Warehouses->find('list', []);
        $this->set(compact('branches', 'warehouses', 'warehouseArr', 'branch', 'date'));
    }

    private function getStatData() {
        $first_day_of_the_week = 'Monday';
        $start_of_the_week = strtotime("Last $first_day_of_the_week");
        if (strtolower(date('l')) === strtolower($first_day_of_the_week)) {
            $start_of_the_week = strtotime('today');
        }
        $end_of_the_week = $start_of_the_week + (60 * 60 * 24 * 7) - 1;
        $date_format = 'd/m/Y';

        $salesData = [
            ['y' => date($date_format, $start_of_the_week), 'a' => 0, 'b' => 0, 'c' => 0],
            ['y' => date($date_format, $start_of_the_week + ((60 * 60 * 24 * 2) - 1)), 'a' => 0, 'b' => 0, 'c' => 0],
            ['y' => date($date_format, $start_of_the_week + ((60 * 60 * 24 * 3) - 1)), 'a' => 0, 'b' => 0, 'c' => 0],
            ['y' => date($date_format, $start_of_the_week + ((60 * 60 * 24 * 4) - 1)), 'a' => 0, 'b' => 0, 'c' => 0],
            ['y' => date($date_format, $start_of_the_week + ((60 * 60 * 24 * 5) - 1)), 'a' => 0, 'b' => 0, 'c' => 0],
            ['y' => date($date_format, $start_of_the_week + ((60 * 60 * 24 * 6) - 1)), 'a' => 0, 'b' => 0, 'c' => 0],
            ['y' => date($date_format, $end_of_the_week), 'a' => 0, 'b' => 0, 'c' => 0]
        ];


        //Get Sales from payment
        $this->Payments = TableRegistry::get('Payments');
        $q = $this->Payments->find()
                ->where([
            'Payments.paymentdate >=' => $start_of_the_week,
            'Payments.paymentdate <=' => $end_of_the_week,
            'Payments.isreceipt' => 'Y',
            'Payments.docstatus' => 'CO',
            //'Payments.branch_id' => $this->Core->getLocalBranchId()
        ]);
        $q->select([
                    'totalamt' => $q->func()->sum('amount'),
                    'paymentdate'
                ])
                ->group(['paymentdate']);

        $payments = $q->toArray();
        foreach ($payments as $payment) {
            //$_date = $payment->paymentdate->i18nFormat('dd/MM/yyyy');
            $_dayNum = date('w', strtotime($payment->paymentdate)) - 1;
            //$this->log($_date,'debug');
            //$this->log($_dayNum,'debug');
            $salesData[$_dayNum]['a'] = $payment->totalamt;
            //$this->log($salesData,'debug');
        }
        //End Sales payment
        
        //Get Sales from payment
        $this->Payments = TableRegistry::get('Payments');
        $q = $this->Payments->find()
                ->where([
            'Payments.paymentdate >=' => $start_of_the_week,
            'Payments.paymentdate <=' => $end_of_the_week,
            'Payments.isreceipt' => 'N',
            'Payments.docstatus' => 'CO',
            //'Payments.branch_id' => $this->Core->getLocalBranchId()
        ]);
        $q->select([
                    'totalamt' => $q->func()->sum('amount'),
                    'paymentdate'
                ])
                ->group(['paymentdate']);

        $payments = $q->toArray();
        foreach ($payments as $payment) {
            //$_date = $payment->paymentdate->i18nFormat('dd/MM/yyyy');
            $_dayNum = date('w', strtotime($payment->paymentdate)) - 1;
            //$this->log($_date,'debug');
            //$this->log($_dayNum,'debug');
            $salesData[$_dayNum]['b'] = $payment->totalamt;
            //$this->log($salesData,'debug');
        }
        //End Sales payment



        return $salesData;
    }

}
