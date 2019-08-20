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
class WarehouseProcessComponent extends Component {

    public $components = ['Core', 'Util', 'Authen', 'DocSequent', 'ReadSqlFiles'];
    public $Payments = null;
    public $PaymentLines = null;
    public $Warehouses = null;
    public $WhProducts = null;
    public $Connection = null;
    public $Products = null;

    public function updateStockByPayment($paymentId = null, $issales = 'Y') {
        $this->PaymentLines = TableRegistry::get('PaymentLines');
        $this->Payments = TableRegistry::get('Payments');
        $this->Warehouses = TableRegistry::get('Warehouses');
        $this->WhProducts = TableRegistry::get('WhProducts');
        $this->Products = TableRegistry::get('Products');


        $q = $this->Payments->find()
                ->contain(['PaymentLines'])
                ->where(['Payments.id' => $paymentId]);
        $payments = $q->toArray();

        if (is_null($payments) || sizeof($payments) == 0) {
            return false;
        }
        $payment = $q->first();
        $paymentLines = $payment->payment_lines;
        foreach ($paymentLines as $line) {
            $q = $this->Products->find()
                    ->contain(['ProductCategories'])
                    ->where(['Products.id' => $line->product_id])
                    ->limit(1);
            $product = $q->first();
            if (!is_null($product) && $product->product_category->isstock == 'Y') {
                $q = $this->WhProducts->find()
                        ->where(['WhProducts.warehouse_id' => $payment->warehouse_id,
                    'WhProducts.product_id' => $line->product_id]);
                $whProduct = $q->first();

                if (is_null($whProduct) || $whProduct == '') {
                    $whProduct = $this->createWhProductLine($payment->warehouse_id, $line->product_id);
                }

                if ($issales == 'Y') {
                    $currentAmount = $whProduct->balance_amt;
                    $newBalance = $currentAmount - ($line->qty);
                    $whProduct->balance_amt = $newBalance;
                } else {
                    $currentAmount = $whProduct->balance_amt;
                    $newBalance = $currentAmount + ($line->qty);
                    $whProduct->balance_amt = $newBalance;
                }
                $this->WhProducts->save($whProduct);
            }
        }

        return true;
    }

    public function updateStock($warehouse_id = null, $product_id = null, $qty = 0, $isPlus = true) {
        $this->WhProducts = TableRegistry::get('WhProducts');

        $q = $this->WhProducts->find()
                ->where(['WhProducts.warehouse_id' => $warehouse_id, 'WhProducts.product_id' => $product_id]);
        $whProduct = $q->first();

        if (is_null($whProduct)) {
            $whProduct = $this->createWhProductLine($warehouse_id, $product_id, $qty);
        } else {
            $_qty = $whProduct->balance_amt;
            if ($isPlus) {
                $totalAmt = $_qty + $qty;
            } else {
                $totalAmt = $_qty - $qty;
            }

            $whProduct->balance_amt = $totalAmt;
            $whProduct->modifiedby = $this->Authen->getAuthenUserId();
            $result = $this->WhProducts->save($whProduct);
            if (!$result) {
                $this->log($whProduct->errors(), 'debug');
            }
        }
    }

    private function createWhProductLine($warehouse_id = null, $product_id = null, $qty = 0) {
        $whProduct = $this->WhProducts->newEntity();
        $whProduct->product_id = $product_id;
        $whProduct->balance_amt = $qty;
        $whProduct->createdby = $this->Authen->getAuthenUserId();
        $whProduct->warehouse_id = $warehouse_id;

        $this->WhProducts->save($whProduct);
        return $whProduct;
    }

    public function getOldItemByDaily($warehouse_id = null) {
        $this->Connection = ConnectionManager::get('default');

        $sql = $this->ReadSqlFiles->read('wh_old_item_daliy.sql');

        $results = $this->Connection->execute($sql, ['warehouse_id' => $warehouse_id])->fetchAll('assoc');
        return $results;
    }

    public function getOldItemByDate($warehouse_id = null, $date = null) {
        $this->Connection = ConnectionManager::get('default');

        $sql = $this->ReadSqlFiles->read('wh_old_item_date.sql');

        $results = $this->Connection->execute($sql, ['warehouse_id' => $warehouse_id, 'docdate' => $date])->fetchAll('assoc');

        return $results;
    }

}
