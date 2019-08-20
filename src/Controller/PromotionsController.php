<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;

/**
 * Promotions Controller
 *
 * @property \App\Model\Table\PromotionsTable $Promotions
 *
 * @method \App\Model\Entity\Promotion[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PromotionsController extends AppController {

    public $BpUsePromotions = null;
    public $Payments = null;

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);

        if (!$this->Authen->authen()) {
            return $this->redirect(USERPERMISSION);
        }
        $this->BpUsePromotions = TableRegistry::get('BpUsePromotions');
        $this->Payments = TableRegistry::get('Payments');
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
        $promotions = $this->paginate($this->Promotions);
        $type = $this->TransactionCode->promotionType();
        $this->set(compact('promotions', 'type'));
    }

    /**
     * View method
     *
     * @param string|null $id Promotion id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $promotion = $this->Promotions->get($id, [
            'contain' => []
        ]);

        $this->set('promotion', $promotion);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $promotion = $this->Promotions->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $promotion = $this->Promotions->patchEntity($promotion, $data);
            $promotion->createdby = $this->Authen->getAuthenUserId();

            if ($this->Promotions->save($promotion)) {
                $this->Flash->success(__('The promotion has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->log($promotion->errors(), 'debug');
            $this->Flash->error(__('The promotion could not be saved. Please, try again.'));
        }
        $type = $this->TransactionCode->promotionType();
        $this->set(compact('promotion', 'type'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Promotion id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $promotion = $this->Promotions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $promotion = $this->Promotions->patchEntity($promotion, $this->request->getData());
            if ($this->Promotions->save($promotion)) {
                $this->Flash->success(__('The promotion has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The promotion could not be saved. Please, try again.'));
        }

        $type = $this->TransactionCode->promotionType();
        $this->set(compact('promotion', 'type'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Promotion id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $promotion = $this->Promotions->get($id);
        if ($this->Promotions->delete($promotion)) {
            $this->Flash->success(__('The promotion has been deleted.'));
        } else {
            $this->Flash->error(__('The promotion could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function verifyBpPromotion($bpartner_id = null) {
        // $this->viewBuilder()->layout('clean');
        $this->set(compact('bpartner_id'));
    }

    public function usePromotion($bpartner_id) {
        $postData = $this->request->getData();
        $this->log($postData, 'debug');
        $promotion_id = $postData['promotion_id'];

        $countPaymentUpdate = 0;
        foreach ($postData['payment_id'] as $payment_id) {
            $q = $this->Payments->find()
                    ->contain(['PaymentLines'])
                    ->where(['Payments.id' => $payment_id]);
            $payment = $q->first();
            if (!is_null($payment)) {
                foreach ($payment->payment_lines as $line) {
                    $countPaymentUpdate += $line->qty;
                }

                $payment->ispromotionused = 'Y';
                $this->Payments->save($payment);
            }
        }

        if ($countPaymentUpdate > 0) {
            $promotion = $this->Promotions->get($promotion_id);
            $time = Time::now();

            $usePromotion = $this->BpUsePromotions->newEntity();
            $usePromotion->bpartner_id = $bpartner_id;
            $usePromotion->branch_id = $this->Core->getLocalBranchId();
            $usePromotion->promotion_id = $promotion_id;
            $usePromotion->value = $countPaymentUpdate;
            $usePromotion->usedate = $time;
            $usePromotion->description = sprintf('%s, จำนวนครั้ง/ชิ้น ของลูกค้า %s', $promotion->name, $countPaymentUpdate);
            $usePromotion->createdby = $this->Authen->getAuthenUserId();

            if($this->BpUsePromotions->save($usePromotion)){
                $this->Flash->success('บันทึกการใช้งานโปรโมชั่นแล้ว');
            }else{
                $this->log($usePromotion->errors(),'debug');
                $this->Flash->error('มีปัญหาในการบันทึกการใช้งานโปรโมชั่น');
            }
            
        }

        return $this->redirect(['controller' => 'bpartners', 'action' => 'view', $bpartner_id, 'Y']);
    }

}
