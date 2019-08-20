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
class BpartnerComponent extends Component {
   

    public $Bpartners = null;
    
    public function createCustomer($data = null,$address = null){
        
    }
    
    public function getGuestCustomer(){
        $this->Bpartners = TableRegistry::get('Bpartners');
        
        $bp = null;
        
        $q = $this->Bpartners->find()
                ->where(['Bpartners.id'=>'0']);
        $bp = $q->first();
        
        if(is_null($bp) || $bp ==''){
            $bp = $this->Bpartners->newEntity();
            $bp->id = '0';
            $bp->code = '0';
            $bp->title = '-';
            $bp->name = 'ลูกค้าหน้าร้าน';
            $bp->firstname = '';
            $bp->lastname = '';
            $bp->iscustomer = 'Y';
            $bp->isactive = 'Y';
            $bp->org_id = '0';
            $bp->branch_id = '0';
            $bp->createdby = '0';
            $this->Bpartners->save($bp);
        }
        
        return $bp;
    }

}
