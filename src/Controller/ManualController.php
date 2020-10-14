<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

/**
 * Manual Controller
 *
 *
 * @method \App\Model\Entity\Manual[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ManualController extends AppController {

    public $Pawns = null;
    public $PawnTransactions = null;
    public $GoodsTransactions = null;
    public $PawnLines = null;
    public $WhProducts = null;
    public $Products = null;

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->Auth->allow();
        $this->viewBuilder()->layout('json');
        $this->Pawns = TableRegistry::get('Pawns');
        $this->GoodsTransactions = TableRegistry::get('GoodsTransactions');
        $this->PawnTransactions = TableRegistry::get('PawnTransactions');
        $this->PawnLines = TableRegistry::get('PawnLines');
        $this->WhProducts = TableRegistry::get('WhProducts');

        $this->Products = TableRegistry::get('Products');
        $this->loadComponent('WarehouseProcess');
        $this->loadComponent('Pawn');
        $this->loadComponent('Product');

        $this->autoRender = false;
    }

    public function index() {
        /*
          $pawnTransactions = $this->PawnTransactions->find()
          ->contain(['Pawns'])
          ->where(['PawnTransactions.type'=>'NEW'])
          ->toArray();

          foreach ($pawnTransactions as $iten){
          $iten->rate = str_replace('%', '',  $iten['pawn']['type']);
          $iten->start_date = $iten['pawn']['docdate'];
          $iten->end_date = $iten['pawn']['expiredate'];

          $interAmt = $this->Pawn->getCalInterestRate($iten['pawn']['totalmoney'],$iten->rate,$iten->start_date,$iten->end_date);
          $iten->interestamt = $interAmt;

          $this->PawnTransactions->save($iten);
          }
         * 
         */
    }

    public function setProduct() {
        $products = $this->Products->find()->where(['isactive' => 'Y'])->toArray();
        $dupProducts = [];
        $doneProducts = [];
        foreach ($products as $product) {
            $productName = $this->Product->generateName($product['product_category_id'], $product['size_id'], $product['weight_id'], $product['design_id'], $product['percent'], $product['manual_weight']);

            if ($this->Product->isDuplicate($product['id'], $productName)) {
                array_push($dupProducts, ['id' => $product['id'], 'name' => $productName]);
            } else {
                $product->name = $productName;
                $this->Products->save($product);
                array_push($doneProducts, ['id' => $product['id'], 'name' => $productName]);
            }
        }

        $this->log($dupProducts, 'debug');
        //$this->log($doneProducts, 'debug');
    }

    public function import() {
        $goods = $this->GoodsTransactions->find()
                ->contain(['GoodsLines'])
                ->where(['type' => 'GR', 'status' => 'CO'])
                ->toArray();

        foreach ($goods as $g) {
            foreach ($g['goods_lines'] as $line) {
                $this->WarehouseProcess->updateStock($g['to_warehouse'], $line['product_id'], $line['qty'], true);
            }
        }
    }

    public function updatestock() {
        $pawns = $this->Pawns->find()
                ->contain(['PawnLines' => ['Products']])
                ->where(['Pawns.warehouse_id' => '896ef960-c134-4f07-8dc1-fbdda72a8197', 'status !=' => 'VO'])
                ->toArray();
        foreach ($pawns as $pawn) {
            foreach ($pawn['pawn_lines'] as $line) {


                $product = $line['product'];
                $_pawn = $pawn;

                //echo sprintf('%s %s', $product['name'], $line['weight']);
                //clear from old stock
                $this->WarehouseProcess->updateStock($pawn['warehouse_id'], $line['product_id'], 1, false);

                //New stock
                $product = $this->Pawn->verifyProduct($product['name'], $product['product_category_id'], $product['percent'], null, $line['weight'], 0);
                //debug($product);



                $line = $this->PawnLines->get($line['id']);
                $line->product_id = $product['id'];
                $this->PawnLines->save($line);
                $this->WarehouseProcess->updateStock($_pawn['warehouse_id'], $line['product_id'], 1, true);

                // echo '--------------------------';
            }
        }
    }

    public function movepawn() {
        //ทองเก่า   0fc330c9-54a3-41e8-b88d-e3107186aefc
        //จำนำ     896ef960-c134-4f07-8dc1-fbdda72a8197

        $pawns = $this->Pawns->find()
                ->contain(['PawnLines' => ['Products']])
                ->where(['Pawns.warehouse_id' => '0fc330c9-54a3-41e8-b88d-e3107186aefc', 'status !=' => 'VO'])
                ->toArray();


        foreach ($pawns as $pawn) {

            //echo sprintf('%s', $pawn['docno']);

            foreach ($pawn['pawn_lines'] as $line) {


                $product = $line['product'];
                $_pawn = $pawn;

                //echo sprintf('%s %s', $product['name'], $line['weight']);
                //clear from old stock
                $this->WarehouseProcess->updateStock($pawn['warehouse_id'], $line['product_id'], 1, false);


                $_pawn->warehouse_id = '896ef960-c134-4f07-8dc1-fbdda72a8197';
                $_pawn = $this->Pawns->save($_pawn);

                //New stock
                $product = $this->Pawn->verifyProduct($product['name'], $product['product_category_id'], $product['percent'], null, $line['weight'], 0);
                //debug($product);



                $line = $this->PawnLines->get($line['id']);
                $line->product_id = $product['id'];
                $this->PawnLines->save($line);
                $this->WarehouseProcess->updateStock($_pawn['warehouse_id'], $line['product_id'], 1, true);

                // echo '--------------------------';
            }
        }
    }

    public function removewh() {
        $wh = $this->WhProducts->find()
                ->where(['balance_amt <' => 1])
                ->toArray();
        foreach ($wh as $item) {
            $this->WhProducts->delete($item);
        }
    }

    public function updatePawnDate() {
        $pawns = $this->Pawns->find()->contain(['PawnTransactions' => ['conditions' => ['PawnTransactions.type !=' => 'VO'], 'sort' => ['created' => 'ASC']]])->toArray();
        foreach ($pawns as $pawn) {
            $tran = $pawn['pawn_transactions'][0];

            $pawn['docdate'] = $tran['start_date'];

            $lastTran = $pawn['pawn_transactions'][sizeof($pawn['pawn_transactions']) - 1];
            $this->log($lastTran, 'debug');
            if ($lastTran['type'] == 'RN') {
                $pawn['startdate'] = $lastTran['end_date'];
            }
            if ($lastTran['type'] == 'NEW') {
                $pawn['startdate'] = $lastTran['start_date'];
            }

            $this->Pawns->save($pawn);
        }
    }

}
