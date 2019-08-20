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
class InvoiceProcessComponent extends Component {

    public $components = ['Core','Util','Authen','DocSequent'];
    public $Invoices = null;
    public $InvoiceLines = null;
    public $SalesDocumentCode = 'IV';

    public function createDraft($docdate = null, $issale = 'Y', $paymentMethod = 'CASH', $bpartner_id = null,$seller=null,$isexchange = 'N',$order_id=null,$discount =0,$usesavingamt = 0) {
        
        $this->Invoices = TableRegistry::get('Invoices');

        $invoice = $this->Invoices->newEntity();
//$this->log($docdate,'debug');
        $invoice->org_id = $this->Core->getLocalOrgId();
        $invoice->branch_id = $this->Core->getLocalBranchId();
        $invoice->isactive = 'N';
        $invoice->docdate = $this->Util->convertDate($docdate);

        //$docNo = $this->DocSequent->getLatestAndSave($this->SalesDocumentCode);
        $docNo = '_temp';
        $invoice->docno = $docNo;
        $invoice->docstatus = 'DR';
        $invoice->bpartner_id = $bpartner_id;
        $invoice->netamt = 0;
        $invoice->vatamt = 0;
        $invoice->totalamt = 0;
        $invoice->totalpaid = 0;
        $invoice->ispaid = 'N';
        $invoice->issale = $issale;
        $invoice->createdby = $this->Authen->getAuthenUserId();
        $invoice->paymentmethod = $paymentMethod;
        $invoice->seller = $seller;
        $invoice->isexchange = $isexchange;
        $invoice->order_id = $order_id;
        $invoice->discount = $discount;
        $invoice->usesavingamt = $usesavingamt;

        if(!$this->Invoices->save($invoice)){
            $this->log($invoice->errors(),'debug');
        }

        return $invoice;
    }

    public function createInvoiceLine($invoice_id = null, $product_id = null, $qty = 0, $price = 0,$warehouse_id=null,$invoiceExchangeId = null,$glitem_id=null,$description = null,$isExchange = 'N') {
        $this->InvoiceLines = TableRegistry::get('InvoiceLines');
        $line = $this->InvoiceLines->newEntity();

        $totalAmount = $qty * $price;

        $line->invoice_id = $invoice_id;
        $line->product_id = $product_id;

        $q = $this->InvoiceLines->find()
                ->where(['InvoiceLines.invoice_id' => $invoice_id]);
        $seq = $q->count() + 1;
        $line->seq = $seq;
        $line->netamt = $totalAmount;
        $line->totalamt = $totalAmount;
        $line->createdby = $this->Authen->getAuthenUserId();
        $line->qty = $qty;
        $line->price = $price;
        $line->warehouse_id = $warehouse_id;
        $line->invoice_exchange = $invoiceExchangeId;
        $line->isexchange = $isExchange;
        $line->glitem_id = $glitem_id;
        $line->description = $description;
        
        $this->InvoiceLines->save($line);
        return $totalAmount;
    }

    public function completeInvoice($invoice_id = null, $totalAmount = 0, $totalPaid = 0,$usesavingamt = 0) {
        
        $this->Invoices = TableRegistry::get('Invoices');

        $invoice = $this->Invoices->get($invoice_id);

        $invoice->isactive = 'Y';
        $docNo = $this->DocSequent->getLatestAndSave($this->SalesDocumentCode);
        $invoice->docno = $docNo;
        $invoice->docstatus = 'CO';
        $invoice->netamt = $totalAmount;
        $invoice->vatamt = 0;
        $invoice->totalamt = $totalAmount;
        $invoice->totalpaid = $totalPaid;
        $invoice->ispaid = 'Y';
        $invoice->usesavingamt = $usesavingamt;

        $this->Invoices->save($invoice);
        
        return $invoice;
    }

}
