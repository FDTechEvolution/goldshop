<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;
use Cake\Datasource\ConnectionManager;

/**
 * ServicePromotions Controller
 *
 *
 * @method \App\Model\Entity\ServicePromotion[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ServicePromotionsController extends AppController {

    public $Connection = null;
    public $BpUsePromotions = null;
    public $Promotions = null;

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->Auth->allow();
        $this->viewBuilder()->layout('json');
        $this->BpUsePromotions = TableRegistry::get('BpUsePromotions');
        $this->Promotions = TableRegistry::get('Promotions');
        $this->Connection = ConnectionManager::get('default');
        $this->loadComponent('ReadSqlFiles');
    }

    public function getMatchPromotion() {
        $bpartner_id = $this->request->getQuery('bpartner_id');
        $data = ['promotion' => [], 'status' => '404', 'title' => ''];
        if (!is_null($bpartner_id)) {
            $q = $this->Promotions->find()
                    ->where(['Promotions.isactive' => 'Y']);
            $promotions = $q->toArray();

            if (sizeof($promotions) > 0) {
                $sql = $this->ReadSqlFiles->read('sales_count_qty.sql');
                $result = $this->Connection->execute($sql, ['bpartner_id' => $bpartner_id])->fetchAll('assoc');
                //$this->log($result,'debug');
                $qty = (int) $result[0]['qty'];
                foreach ($promotions as $promotion) {
                    if ($qty >= $promotion->value) {
                        $data['promotion'] = $promotion;
                        $data['current_value'] = $qty;
                        $data['status'] = '200';
                        $data['title'] = sprintf('ข้อมูลการซื้อตรงกับโปรโมชั่น %s', $promotion->name);
                        $data['qty'] = $qty;
                    }
                }
            }
        }

        $json = json_encode($data);
        $this->set(compact('json'));
    }

}
