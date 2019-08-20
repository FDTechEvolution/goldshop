<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\ORM\TableRegistry;

/**
 * Description of Utils
 *
 * @author sakorn.s
 */
class OrderProcessComponent extends Component {

    public $components = ['Core', 'Util', 'Authen', 'DocSequent'];
    public $Orders = null;
    public $OrderLines = null;
    public $SalesDocumentCode = 'SO';

    public function createDraft($docdate = null, $duedate = null, $issale = 'Y', $bpartner_id = null, $seller = null) {
        $this->Orders = TableRegistry::get('Orders');

        $order = $this->Orders->newEntity();

        $order->org_id = $this->Core->getLocalOrgId();
        $order->branch_id = $this->Core->getLocalBranchId();
        $order->isactive = 'N';
        $order->docdate = $this->Util->convertDate($docdate);
        $order->duedate = $this->Util->convertDate($duedate);

        //$docNo = $this->DocSequent->getLatestAndSave($this->SalesDocumentCode);
        $docNo = '_temp';
        $order->docno = $docNo;
        $order->docstatus = 'DR';
        $order->bpartner_id = $bpartner_id;
        $order->netamt = 0;
        $order->vatamt = 0;
        $order->totalamt = 0;
        $order->totalpaid = 0;
        $order->ispaid = 'N';
        $order->isprocessed = 'N';
        $order->issale = $issale;
        $order->createdby = $this->Authen->getAuthenUserId();
        $order->seller = $seller;
        $order->iscompletepaid = 'N';
        $order->isreceived = 'N';

        $this->Orders->save($order);
        return $order;
    }

    public function createLine($order_id = null, $product_id = null, $qty = 0, $price = 0, $img = null) {
        $this->OrderLines = TableRegistry::get('OrderLines');
        $line = $this->OrderLines->newEntity();

        $totalAmount = $qty * $price;

        $line->order_id = $order_id;
        $line->product_id = $product_id;

        $q = $this->OrderLines->find()
                ->where(['OrderLines.order_id' => $order_id]);

        $seq = $q->count() + 1;
        $line->seq = $seq;
        $line->netamt = $totalAmount;
        $line->totalamt = $totalAmount;
        $line->createdby = $this->Authen->getAuthenUserId();
        $line->qty = $qty;
        $line->image_id = $img;
        
        if($this->OrderLines->save($line)){
           return $totalAmount; 
        }else{
            $this->log($line->errors(), 'debug');
        }
        
    }

    public function completed($order_id = null, $totalAmount = 0, $totalPaid = 0) {

        $this->Orders = TableRegistry::get('Orders');

        $order = $this->Orders->get($order_id);

        $order->isactive = 'Y';
        $docNo = $this->DocSequent->getLatestAndSave($this->SalesDocumentCode);
        $order->docno = $docNo;
        $order->docstatus = 'OD';
        $order->isprocessed = 'Y';
        $order->netamt = $totalAmount;
        $order->vatamt = 0;
        $order->totalamt = $totalAmount;
        $order->totalpaid = $totalPaid;

        if ($totalPaid > 0) {
            $order->ispaid = 'Y';
        }

        if ($totalPaid >= $totalAmount) {
            $order->iscompletepaid = 'Y';
        }

        $this->Orders->save($order);

        return $order;
    }

    public function paidAndReceipt($order_id = null) {
        $this->Orders = TableRegistry::get('Orders');

        $order = $this->Orders->get($order_id);
        $order->iscompletepaid = 'Y';
        $order->isreceived = 'Y';
        $order->ispaid = 'Y';
        $order->docstatus = 'CO';
        if(!$this->Orders->save($order)){
            $this->log($order->errors(),'debug');
        }
    }

}
