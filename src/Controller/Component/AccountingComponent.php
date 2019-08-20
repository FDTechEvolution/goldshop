<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;
use Cake\Datasource\ConnectionManager;

/**
 * Description of Utils
 *
 * @author sakorn.s
 */
class AccountingComponent extends Component {

    public $Connection = null;
    public $components = ['Core', 'Util', 'ReadSqlFiles'];
    public $CloseDays = null;

    public function journal($startDate = null, $endDate = null, $branchId = null) {
        $this->Connection = ConnectionManager::get('default');

        $newData = [];
        $masterCode = [
            'SUBMIT' => 'ยอดยกมา',
            'SALES' => 'ขาย',
            'PAWN_RETURN' => 'ไถ่ถอน',
            'PAWN_INTEREST' => 'ต่อดอกเบี้ย',
            'SAVING' => 'เงินออม',
            'DEPOSIT' => 'เงินมัดจำ',
            'PURCHASE' => 'ซื้อเข้า',
            'PAWN' => 'จำนำ',
            'TRAN' => 'เงินโอน',
            'USESAVING' => 'ใช้เงินออม'
        ];

        //Group date
        $sqlDate = 'select paymentdate '
                . 'from payments '
                . 'where payments.paymentdate >= DATE("' . $startDate . '") and payments.paymentdate <= DATE("' . $endDate . '") '
                . 'and payments.branch_id = :branch_id '
                . ' group by payments.paymentdate';

        $resultDate = $this->Connection->execute($sqlDate, ['branch_id' => $branchId])->fetchAll('assoc');
        foreach ($resultDate as $date) {
            $balanceFwAmt = $this->getBalanceForward($date['paymentdate']);
            $fw = ['title' => 'ยอดยกมา', 'amount' => $balanceFwAmt, 'type' => 'SUBMIT'];
            //$dataArr['SUBMIT']['rows'] = $_arr;
            //$dataArr['SUBMIT']['total'] = $balanceFwAmt;

            $sql = $this->ReadSqlFiles->read('journal_acc.sql');
            $result = $this->Connection->execute($sql, ['branch_id' => $branchId,'paymentdate' => $date['paymentdate']])->fetchAll('assoc');
            $totalReceiptAmt = $balanceFwAmt;
            $totalPaidAmt = 0;
            $totalReceiptTransfer = 0;
            $totalPaidTransfer = 0;

            $_arr = ['L' => [], 'R' => [],'LT'=>[],'RT'=>[], 'total_receipt_amt' => 0, 'total_paid_amt' => 0];
            array_push($_arr['L'], $fw);
            $typeL = '';
            $typeR = '';
            foreach ($result as $item) {
                //$item['title'] = isset($masterCode[$item['type']]) ? ($masterCode[$item['type']].' '.$item['title']) : $item['title'];
                $typeTitle = isset($masterCode[$item['type']]) ? $masterCode[$item['type']] : '';
                $_title = $item['title'];

                if ($item['grouptype'] == 'normal') {
                    $item['title'] = $typeTitle;
                    if ($item['isreceipt'] == 'Y') {
                        array_push($_arr['L'], $item);
                        $totalReceiptAmt += (float) $item['amount'];
                    } else {
                        array_push($_arr['R'], $item);
                        $totalPaidAmt += (float) $item['amount'];
                    }
                } elseif ($item['grouptype'] == 'transfer') {
                    if ($item['isreceipt'] == 'Y') {
                        $item['title'] = sprintf('%s [โอนเข้า %s] ', $typeTitle, $item['bank_code']);
                        array_push($_arr['LT'], $item);
                        $totalReceiptTransfer += (float) $item['amount'];
                    } else {
                        $item['title'] = sprintf('%s [โอนจาก %s]', $typeTitle, $item['bank_code']);

                        $item['amount'] = ((float) $item['amount']);
                        array_push($_arr['RT'], $item);
                        $totalPaidTransfer += (float) $item['amount'];
                    }
                } elseif ($item['grouptype'] == 'USESAVING') {
                    if ($item['isreceipt'] == 'Y') {
                        
                    } else {
                        $item['title'] = sprintf('%s [%s]', $typeTitle, $_title);
                        array_push($_arr['R'], $item);
                        $totalPaidAmt += (float) $item['amount'];
                    }
                } elseif ($item['grouptype'] == 'income') {
                    if ($item['isreceipt'] == 'Y') {
                        $item['title'] = sprintf('%s', $_title);
                        array_push($_arr['L'], $item);
                        $totalReceiptAmt += (float) $item['amount'];
                        if ($item['payment_method'] == 'TRAN') {
                            $item['title'] = sprintf('%s [โอนเข้า %s]', $_title, $item['bank_code']);
                            $item['amount'] = ((float) $item['amount']);
                            array_push($_arr['LT'], $item);
                            $totalReceiptTransfer += (float) $item['amount'];
                        }
                    } else {
                        $item['title'] = sprintf('%s', $_title);
                        array_push($_arr['R'], $item);
                        $totalPaidAmt += (float) $item['amount'];
                        
                        if ($item['payment_method'] == 'TRAN') {
                            $item['title'] = sprintf('%s [โอนจาก %s]', $_title, $item['bank_code']);
                            $item['amount'] = ((float) $item['amount']);
                            array_push($_arr['RT'], $item);
                            $totalPaidTransfer += (float) $item['amount'];
                        }
                    }
                }else{
                    $item['title'] = $typeTitle;
                    if ($item['isreceipt'] == 'Y') {
                        array_push($_arr['L'], $item);
                        $totalReceiptAmt += (float) $item['amount'];
                    } else {
                        array_push($_arr['R'], $item);
                        $totalPaidAmt += (float) $item['amount'];
                    }
                }

                
            }
            $_arr['total_receipt_amt'] = (float)$totalReceiptAmt;
            $_arr['total_paid_amt'] = (float)$totalPaidAmt;
            $_arr['total_receipt_tran_amt'] = (float)$totalReceiptTransfer;
            $_arr['total_paid_tran_amt'] = (float)$totalPaidTransfer;
            $_arr['total_cash_receipt'] = $_arr['total_receipt_amt']-$_arr['total_receipt_tran_amt'];
            $_arr['total_cash_paid'] = $_arr['total_paid_amt']-$_arr['total_paid_tran_amt'];
            $_arr['grand_total'] = $_arr['total_cash_receipt']-$_arr['total_cash_paid'];
            
            $_arr['date'] = $date['paymentdate'];
            array_push($newData, $_arr);
        }

        return $newData;
    }

    public function _journal($startDate = null, $endDate = null, $branchId = null) {
        //$this->log($startDate,'debug');
        //$this->log($endDate,'debug');
        //$this->log($branchId,'debug');

        $this->Connection = ConnectionManager::get('default');

        $newData = [];
        $master = [
            'SUBMIT' => ['title' => 'ยอดยกมา', 'code' => 'SUBMIT', 'rows' => [], 'iscredit' => 'N'],
            'SALES' => ['title' => 'ขาย', 'code' => 'SALES', 'rows' => [], 'iscredit' => 'N'],
            'PAWN_RETURN' => ['title' => 'ไถ่ถอน', 'code' => 'PAWN_RETURN', 'rows' => [], 'iscredit' => 'N'],
            'PAWN_INTEREST' => ['title' => 'ต่อดอกเบี้ย', 'code' => 'PAWN_INTEREST', 'rows' => [], 'iscredit' => 'N'],
            'SAVING' => ['title' => 'เงินออม', 'code' => 'SAVING', 'rows' => [], 'iscredit' => 'N'],
            'DEPOSIT' => ['title' => 'เงินมัดจำ', 'code' => 'DEPOSIT', 'rows' => [], 'iscredit' => 'N'],
            //'REVENUE' => ['title' => 'รายรับอื่น ๆ', 'code' => 'REVENUE', 'rows' => [], 'iscredit' => 'N'],
            'PURCHASE' => ['title' => 'ซื้อเข้า', 'code' => 'PURCHASE', 'rows' => [], 'iscredit' => 'Y'],
            'PAWN' => ['title' => 'จำนำ', 'code' => 'PAWN', 'rows' => [], 'iscredit' => 'Y'],
            'TRAN' => ['title' => 'เงินโอน', 'code' => 'TRAN', 'row' => [], 'iscredit' => 'Y', 'total' => 0],
                //'EXPEND' => ['title' => 'รายจ่ายอื่น ๆ', 'code' => 'EXPEND', 'rows' => [], 'iscredit' => 'Y'],
        ];

        //Group date
        $sqlDate = 'select paymentdate '
                . 'from payments '
                . 'where payments.paymentdate >= DATE("' . $startDate . '") and payments.paymentdate <= DATE("' . $endDate . '") '
                . 'and payments.branch_id = :branch_id '
                . ' group by payments.paymentdate';

        $resultDate = $this->Connection->execute($sqlDate, ['branch_id' => $branchId])->fetchAll('assoc');
        //$this->log($resultDate,'debug');

        foreach ($resultDate as $date) {
            $dataArr = $master;
            $balanceFwAmt = $this->getBalanceForward($date['paymentdate']);
            $_arr = [
                ['title' => 'ยอดยกมา', 'total' => $balanceFwAmt, 'iscredit' => 'N']
            ];
            $dataArr['SUBMIT']['rows'] = $_arr;
            $dataArr['SUBMIT']['total'] = $balanceFwAmt;

            $sql = 'select '
                    . 'sum(pml.amount) as amount,'
                    . 'p.type,p.isreceipt,p.paymentdate '
                    . 'from '
                    . 'payments p '
                    . 'join payment_method_lines pml on p.id = pml.payment_id '
                    . 'join bank_accounts ba on pml.bank_account_id = ba.id '
                    . 'left join banks on ba.bank_id = banks.id '
                    . 'where '
                    . 'p.paymentdate = DATE("' . $date['paymentdate'] . '") '
                    //. 'and p.id not in (select payment_id from payment_lines where isexchange="Y") '
                    . 'and p.branch_id = :branch_id '
                    . 'and p.type !="REVENUE" '
                    . 'and p.docstatus="CO" '
                    . 'and p.type !="EXPEND" '
                    . 'group by p.type,p.isreceipt,p.paymentdate order by p.paymentdate ASC,p.type ASC ';
            //$this->log($sql, 'debug');

            $result = $this->Connection->execute($sql, ['branch_id' => $branchId])->fetchAll('assoc');
            //$this->log($result, 'debug');
            $t_type = '';
            $totalReceiptAmt = $balanceFwAmt;
            $totalPaidAmt = 0;

            foreach ($result as $item) {
                $type = $item['type'];
                //$paymentMethod = $item['payment_method'];
                $isreceipt = $item['isreceipt'];

                $dataArr[$type]['total'] = $item['amount'];
                $dataArr[$type]['isreceipt'] = $item['isreceipt'];
                if ($isreceipt == 'Y') {
                    $totalReceiptAmt += $item['amount'];
                } else {
                    $totalPaidAmt += $item['amount'];
                }
            }

            //Get transfer only
            $sqlTransfer = 'select '
                    . 'COALESCE(sum(pml.amount),0) as amount '
                    . 'from '
                    . 'payments p '
                    . 'join payment_method_lines pml on p.id = pml.payment_id '
                    . 'join bank_accounts ba on pml.bank_account_id = ba.id '
                    . 'left join banks on ba.bank_id = banks.id '
                    . 'where '
                    . 'p.paymentdate = DATE("' . $date['paymentdate'] . '") '
                    . 'and p.branch_id = :branch_id '
                    . 'and p.type !="REVENUE" '
                    . 'and p.type !="EXPEND" '
                    . 'and p.docstatus="CO" '
                    . 'and pml.payment_method ="TRAN" ';
            //$this->log($sqlTransfer,'debug');
            $result = $this->Connection->execute($sqlTransfer, ['branch_id' => $branchId])->fetchAll('assoc');
            $transferAmt = 0;
            foreach ($result as $item) {
                $transferAmt += $item['amount'];
            }
            $totalPaidAmt += $transferAmt;
            $dataArr['TRAN']['total'] = $transferAmt;

            //Get income
            $sqlIncome = 'select '
                    . 'sum(pml.amount) as amount,p.type,p.isreceipt,p.paymentdate,inc.name as incomename '
                    . 'from '
                    . 'payments p '
                    . 'join payment_lines pl on p.id = pl.payment_id '
                    . 'join income_types inc on pl.income_type_id = inc.id '
                    . 'join payment_method_lines pml on p.id = pml.payment_id '
                    . 'where '
                    . 'p.paymentdate = DATE("' . $date['paymentdate'] . '") '
                    . 'and (p.type ="REVENUE" OR p.type ="EXPEND") '
                    . 'and p.docstatus="CO" '
                    . 'and p.branch_id = :branch_id '
                    . 'group by p.type,p.isreceipt,p.paymentdate,inc.name order by p.type DESC,inc.name ASC';
            $result = $this->Connection->execute($sqlIncome, ['branch_id' => $branchId])->fetchAll('assoc');
            foreach ($result as $index => $item) {
                $type = $item['type'];
                //$paymentMethod = $item['payment_method'];
                $isreceipt = $item['isreceipt'];

                $dataArr[$type . $index]['total'] = $item['amount'];
                $dataArr[$type . $index]['isreceipt'] = $item['isreceipt'];
                $dataArr[$type . $index]['title'] = $item['incomename'];
                $dataArr[$type . $index]['code'] = $type . $index;
                if ($isreceipt == 'Y') {
                    $dataArr[$type . $index]['iscredit'] = 'N';
                    $totalReceiptAmt += $item['amount'];
                } else {
                    $dataArr[$type . $index]['iscredit'] = 'Y';
                    $totalPaidAmt += $item['amount'];
                }
            }

            //Getuse saving
            $sqlUseSaving = 'select '
                    . 'sum(p.usesavingamt) as amount,p.type,p.isreceipt,p.paymentdate,bp.name as bpname '
                    . 'from '
                    . 'payments p '
                    . 'join bpartners bp on p.bpartner_id = bp.id '
                    . 'where '
                    . 'p.paymentdate = DATE("' . $date['paymentdate'] . '") '
                    . 'and p.type ="SALES" '
                    . 'and p.usesavingamt > 0 '
                    . 'and p.docstatus="CO" '
                    . 'and p.branch_id = :branch_id '
                    . 'group by p.type,p.isreceipt,p.paymentdate order by p.type DESC';
            $result = $this->Connection->execute($sqlUseSaving, ['branch_id' => $branchId])->fetchAll('assoc');
            foreach ($result as $index => $item) {
                $type = $item['type'];
                $isreceipt = $item['isreceipt'];

                $dataArr[$type . $index]['total'] = $item['amount'];
                $dataArr[$type . $index]['isreceipt'] = $item['isreceipt'];
                $dataArr[$type . $index]['title'] = $item['bpname'] . ' ใช้เงินออม';
                $dataArr[$type . $index]['code'] = $type . $index;

                $dataArr[$type . $index]['iscredit'] = 'Y';
                $totalPaidAmt += $item['amount'];
            }

            array_push($newData, ['date' => $date['paymentdate'], 'payment_types' => $dataArr, 'total_receipt_amt' => $totalReceiptAmt, 'total_paid_amt' => $totalPaidAmt]);
        }

        //$this->log($newData,'debug');
        return $newData;
    }

    private function getBalanceForward($currentDate = null) {
        $this->CloseDays = TableRegistry::get('CloseDays');

        $q = $this->CloseDays->find()
                ->where(['close_date <' => $currentDate])
                ->order(['close_date' => 'DESC'])
                ->limit(1);
        $closeDay = $q->first();
        if (is_null($closeDay)) {
            return 0;
        } else {
            return $closeDay->actual_manual_amt;
        }
    }

    /*

      private function getBalanceForward($currentDate = null) {
      $this->Connection = ConnectionManager::get('default');
      //$currentDate = $this->Util->convertDate($currentDate);

      $sql = 'select '
      . 'sum(payment_method_lines.amount) as amount  '
      . 'from '
      . 'payments '
      . 'join payment_method_lines on payments.id = payment_method_lines.payment_id '
      . 'where '
      . 'payments.paymentdate < DATE("' . $currentDate . '") '
      . 'and payments.type !="REVENUE" '
      . 'and payments.type !="EXPEND" '
      . 'and payment_method_lines.payment_method ="CASH" '
      . 'and payments.isreceipt ="Y"';
      $result = $this->Connection->execute($sql, [])->fetchAll('assoc');
      //$this->log($result,'debug');

      return $result[0]['amount'];
      }
     * 
     */
}
