<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\I18n\Date;
use Cake\I18n\Number;

/**
 * CloseDays Controller
 *
 * @property \App\Model\Table\CloseDaysTable $CloseDays
 *
 * @method \App\Model\Entity\CloseDay[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CloseDaysController extends AppController {

    public $Payments = null;
    public $CloseDayLines = null;

    public function beforeFilter(Event $event) {
        $this->Payments = TableRegistry::get('Payments');
        $this->CloseDayLines = TableRegistry::get('CloseDayLines');
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {

        if ($this->request->is('post')) {
            $postData = $this->request->getData();
            $amount = $postData['actual_manual_amt'];
            //$totalReceiptAmt = $postData['total_receipt_amt'];
            // = $postData['total_paid_amt'];
            $closeDate = $postData['close_date'];
            $closeDayId = $postData['close_day_id'];



            $closeDay = $this->CloseDays->get($closeDayId);
            $this->loadComponent('Accounting');
            $acc = $this->Accounting->journal($closeDate, $closeDate, $closeDay->branch_id);
            //$this->log($closeDay,'debug');

            if ($closeDay->status == 'CO' || sizeof($acc) == 0) {
                return $this->redirect(['action' => 'index']);
            }
            $acc = $acc[0];

            $closeDay->close_date = $closeDate;
            $closeDay->actual_amt = (float) $acc['grand_total'];
            $closeDay->actual_manual_amt = $amount;
            $closeDay->receipt_amt = (float) $acc['total_receipt_amt'];
            $closeDay->paid_amt = (float) $acc['total_paid_amt'];
            $closeDay->paid_cash_amt = (float) $acc['total_cash_paid'];
            $closeDay->receipt_cash_amt = (float) $acc['total_cash_receipt'];
            $closeDay->transfer_receipt_amt = (float) $acc['total_receipt_tran_amt'];
            $closeDay->transfer_paid_amt = (float) $acc['total_paid_tran_amt'];
            $closeDay->status = 'CO';
            $closeDay->modifiedby = $this->Authen->getAuthenUserId();

            if ($this->CloseDays->save($closeDay)) {
                $seq = 1;
                foreach ($acc['L'] as $index => $type) {
                    //$this->log($type, 'debug');
                    $line = $this->CloseDayLines->newEntity();
                    $line->close_day_id = $closeDay->id;
                    $line->acc_name = $type['type'];
                    $line['debit_amt'] = $type['amount'];
                    $line['credit_amt'] = 0;
                    $line->description = $type['title'];
                    $line->seq = $seq;
                    $this->CloseDayLines->save($line);
                    $seq++;
                }
                foreach ($acc['LT'] as $index => $type) {
                    $line = $this->CloseDayLines->newEntity();
                    $line->close_day_id = $closeDay->id;
                    $line->acc_name = $type['type'];
                    $line->debit_amt = $type['amount'];
                    $line->credit_amt = 0;
                    $line->payment_method = $type['payment_method'];
                    $line->description = $type['title'];
                    $line->seq = $seq;
                    $this->CloseDayLines->save($line);
                    $seq++;
                }

                foreach ($acc['R'] as $index => $type) {
                    //$this->log($type, 'debug');
                    $line = $this->CloseDayLines->newEntity();
                    $line->close_day_id = $closeDay->id;
                    $line->acc_name = $type['type'];
                    $line['debit_amt'] = 0;
                    $line['credit_amt'] = $type['amount'];
                    $line->description = $type['title'];
                    $line->seq = $seq;
                    $this->CloseDayLines->save($line);
                    $seq++;
                }


                foreach ($acc['RT'] as $index => $type) {
                    $line = $this->CloseDayLines->newEntity();
                    $line->close_day_id = $closeDay->id;
                    $line->acc_name = $type['type'];
                    $line->debit_amt = 0;
                    $line->credit_amt = $type['amount'];
                    $line->payment_method = $type['payment_method'];
                    $line->description = $type['title'];
                    $line->seq = $seq;
                    $this->CloseDayLines->save($line);
                    $seq++;
                }
            } else {
                $this->Flash->error(__('ไม่สามารถบันทึกได้'));
            }

            $this->sendCloseDayToLineMsg($closeDay->id);
            return $this->redirect(['action' => 'index']);
        } else {
            $branchId = $this->Core->getLocalBranchId();
            $todayDate = new Date();
            $q = $this->CloseDays->find()
                    ->contain(['UserModified'])
                    ->where(['CloseDays.branch_id' => $branchId])
                    ->order(['CloseDays.close_date' => 'DESC']);
            $closeDays = $q->toArray();
            $closeDayFirst = $q->first();
            
            //allow to close
            $q = $this->CloseDays->find()
                    ->where(['CloseDays.status'=>'DR'])
                    ->order(['CloseDays.close_date'=>'ASC'])
                    ->limit(1);
            $allowToCloseDay = $q->first();

            if (sizeof($closeDays) == 0 || (!is_null($closeDayFirst) && (strtotime($closeDayFirst) < strtotime($todayDate) ))) {
                $wheres = ['Payments.branch_id' => $branchId];
                if (!is_null($closeDayFirst)) {
                    array_push($wheres, ['paymentdate > ' => $closeDayFirst->close_date]);
                }
                $q = $this->Payments->find()
                        ->where($wheres)
                        ->group(['paymentdate'])
                        ->order(['paymentdate' => 'ASC']);
                $paymentDates = $q->toArray();

                foreach ($paymentDates as $item) {
                    $closeDay = $this->CloseDays->newEntity();
                    $closeDay->close_date = $item->paymentdate;
                    $closeDay->actual_amt = 0;
                    $closeDay->actual_manual_amt = 0;

                    $closeDay->status = 'DR';
                    $closeDay->branch_id = $branchId;

                    if (!$this->CloseDays->save($closeDay)) {
                        //$this->log();
                    }
                }

                $q = $this->CloseDays->find()
                        ->contain(['UserModified'])
                        ->where(['CloseDays.branch_id' => $branchId])
                        ->order(['CloseDays.close_date' => 'DESC']);
                $closeDays = $q->toArray();
            }
            $branchName = $this->Core->getLocalBranchName();
            $this->set(compact('closeDays', 'branchName','allowToCloseDay'));
        }
    }

    /**
     * View method
     *
     * @param string|null $id Close Day id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $closeDay = $this->CloseDays->get($id, [
            'contain' => []
        ]);

        $this->set('closeDay', $closeDay);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $closeDay = $this->CloseDays->newEntity();
        if ($this->request->is('post')) {
            $closeDay = $this->CloseDays->patchEntity($closeDay, $this->request->getData());
            if ($this->CloseDays->save($closeDay)) {
                $this->Flash->success(__('The close day has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The close day could not be saved. Please, try again.'));
        }
        $this->set(compact('closeDay'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Close Day id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $closeDay = $this->CloseDays->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $closeDay = $this->CloseDays->patchEntity($closeDay, $this->request->getData());
            if ($this->CloseDays->save($closeDay)) {
                $this->Flash->success(__('The close day has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The close day could not be saved. Please, try again.'));
        }
        $this->set(compact('closeDay'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Close Day id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $closeDay = $this->CloseDays->get($id);
        if ($this->CloseDays->delete($closeDay)) {
            $this->Flash->success(__('The close day has been deleted.'));
        } else {
            $this->Flash->error(__('The close day could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    private function sendCloseDayToLineMsg($close_day_id) {
        $this->loadComponent('LineMessage');
        $closeDay = $this->CloseDays->get($close_day_id, [
            'contain' => ['CloseDayLines' => ['sort' => ['CloseDayLines.seq' => 'ASC']], 'Branches']
        ]);

        $str = 'ปิดบัญชีวันที่ ' . $closeDay->close_date->i18nFormat(DATE_FORMATE, null, TH_DATE) . ' สาขา' . $closeDay->branch->name;
        $paymentMethod = '';
        foreach ($closeDay->close_day_lines as $index => $line) {
            if ($paymentMethod !=(is_null($line->payment_method) ? '' : $line->payment_method) && $index != 1) {
                $str = $str . chr(10);
            }
            $str = $str . chr(10) . $line->description . ' ' . (Number::format($line->debit_amt + $line->credit_amt));
            $paymentMethod = is_null($line->payment_method) ? '' : $line->payment_method;
        }
        $str = $str . chr(10) . chr(10) . '------------------------';
        $str = $str . chr(10) . 'รวมรายรับทั้งหมด ' . (Number::format($closeDay->receipt_amt));
        $str = $str . chr(10) . 'รวมรายจ่ายทั้งหมด ' . (Number::format($closeDay->paid_amt));
        $str = $str . chr(10) . 'รายรับเงินสด ' . (Number::format($closeDay->receipt_cash_amt));
        $str = $str . chr(10) . 'รายจ่ายเงินสด ' . (Number::format($closeDay->paid_cash_amt));
        $str = $str . chr(10) . 'Grand Total ' . (Number::format($closeDay->actual_amt));
        $str = $str . chr(10) . 'ยอดเงินนับจริง ' . (Number::format($closeDay->actual_manual_amt));

        $data = array(
            'message' => $str
        );

        $this->LineMessage->sendMsg($data);
        //$this->log($closeDay,'debug');
    }

}
