<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\ORM\TableRegistry;
use Cake\I18n\Date;

/**
 * Description of Utils
 *
 * @author sakorn.s
 */
class GoodsTransactionComponent extends Component {

    public $components = ['Core', 'Util', 'Authen', 'DocSequent', 'WarehouseProcess'];
    public $GoodsTransactions = null;
    public $GoodsLines = null;

    public function getSaveDraft($docdate, $type, $from_warehouse = null, $to_warehouse = null, $seller = null) {
        $this->GoodsTransactions = TableRegistry::get('GoodsTransactions');
        $goodsTran = $this->GoodsTransactions->newEntity();
        $this->log($docdate,'debug');
        $goodsTran->docno = '_temp';
        $goodsTran->docdate = $this->Util->convertDate($docdate);
        $goodsTran->type = $type;
        $goodsTran->status = 'DR';
        $goodsTran->branch_id = $this->Core->getLocalBranchId();
        $goodsTran->createdby = $this->Authen->getAuthenUserId();
        $goodsTran->seller = $seller;
        $goodsTran->from_warehouse = $from_warehouse;
        $goodsTran->to_warehouse = $to_warehouse;
        if ($this->GoodsTransactions->save($goodsTran)) {
            return $goodsTran;
        } else {
            $this->log($goodsTran->errors(), 'debug');
            return null;
        }
    }

    public function createLine($goods_transaction_id, $product_id, $qty = 0, $description = null, $seq = 0) {
        $this->GoodsLines = TableRegistry::get('GoodsLines');
        $line = $this->GoodsLines->newEntity();

        $line->seq = $seq;
        $line->product_id = $product_id;
        $line->qty = $qty;
        $line->description = $description;
        $line->createdby = $this->Authen->getAuthenUserId();
        $line->goods_transaction_id = $goods_transaction_id;

        if (!$this->GoodsLines->save($line)) {
            $this->log($line->errors(), 'debug');
        }
    }

    public function complete($goods_transaction_id) {
        $this->GoodsTransactions = TableRegistry::get('GoodsTransactions');
        $goodsTran = $this->GoodsTransactions->get($goods_transaction_id, ['contain' => ['GoodsLines']]);
        $goodsTran->status = 'CO';

        $docNo = $this->DocSequent->getLatestAndSave($this->DocumentCodeMovement);
        $goodsTran->docno = $docNo;
        $this->GoodsTransactions->save($goodsTran);

        foreach ($goodsTran->goods_lines as $line) {
            if (!is_null($goodsTran->from_warehouse)) {
                $this->WarehouseProcess->updateStock($goodsTran->from_warehouse, $line->product_id, $line->qty, false);
                
            }

            if (!is_null($goodsTran->to_warehouse)) {
                //Update to warehouse
                $this->WarehouseProcess->updateStock($goodsTran->to_warehouse, $line->product_id, $line->qty);
                
            }
        }
    }
    
    public function getLineSeq($goods_trnasaction_id) {
        $this->GoodsLines = TableRegistry::get('GoodsLines');
        $q = $this->GoodsLines->find()
                ->where(['GoodsLines.goods_transaction_id' => $goods_trnasaction_id]);
        $seq = $q->count();

        return $seq + 1;
    }

}
