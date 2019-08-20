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
class CoreComponent extends Component {

    public $Users = null;
    public $BankAccounts = null;
    public $SystemUsages = null;
    public $Branches = null;
    public $Warehouses = null;

    public function verifyBranch($user = null) {
        if (is_null($user['branch_id']) || $user['branch_id'] == '') {
            return;
        }
        $this->Branches = TableRegistry::get('Branches');
        $org_id = $user['org_id'];
        $branch_id = $user['branch_id'];
        $use_branch_id = $branch_id;
        $branchName = '';
        $isMultipleBranch = 'N';
        //$this->log($use_branch_id, 'debug');
        if ($branch_id == '0') {
            $use_branch_id = '0';
            $isMultipleBranch = 'Y';


            $q = $this->Branches->find()
                    ->where(['Branches.org_id' => $org_id, 'Branches.id !=' => $use_branch_id])
                    ->order(['Branches.name' => 'ASC']);
            $branch = $q->first();
            // $this->log($branch,'debug');
            if (sizeof($q->toArray()) > 0) {
                $use_branch_id = $branch->id;
                $branchName = $branch->name;
            } else {
                $branch = $this->Branches->get($branch_id);
            }


            $branchName = $branch->name;
        } else {
            $branch = $this->Branches->get($branch_id);
            $branchName = $branch->name;
        }

        $this->request->session()->write('Global.org_id', $org_id);
        $this->request->session()->write('Global.ismultiple_branch', $isMultipleBranch);
        $this->request->session()->write('Global.branch_id', $use_branch_id);
        $this->request->session()->write('Global.branchName', $branchName);

        $this->log($this->request->session()->read('Global'), 'debug');
    }

    public function getSaveClientDetail($user_id = null, $data = null) {
        if (is_null($user_id) || $user_id == '') {
            return null;
        }
        $this->SystemUsages = TableRegistry::get('SystemUsages');

        /*
          $json = file_get_contents("http://freegeoip.net/json/");
          $data = json_decode($json, true);
         * 
         */

        $systemUse = $this->SystemUsages->newEntity();
        $systemUse->user_id = $user_id;
        $systemUse->ipaddress = $data['ip'];
        $systemUse->isactive = 'Y';
        $description = $data['country_name'] . ', ' . $data['region_name'] . '[ ' . $data['latitude'] . ',' . $data['longitude'] . ']';
        $systemUse->description = $description;
        $result = $this->SystemUsages->save($systemUse);
        if ($result) {
            $this->request->session()->write('SystemUsages.id', $systemUse->id);
            return $systemUse->id;
        }
        return null;
    }

    public function getLocalBranchId() {
        return $this->request->session()->read('Global.branch_id');
    }

    public function getLocalBranchName() {
        return $this->request->session()->read('Global.branchName');
    }

    public function getLocalOrgId() {
        return $this->request->session()->read('Global.org_id');
    }

    public function isMultipleBranch() {
        if ($this->request->session()->read('Global.ismultiple_branch') == 'Y') {
            return true;
        } else {
            return false;
        }
    }

    public function getSellerList() {
        $this->Users = TableRegistry::get('Users');

        $q = $this->Users->find()
                ->select(['id', 'firstname', 'lastname'])
                ->where(['OR' => [['Users.branch_id' => $this->getLocalBranchId()], ['Users.branch_id' => '0']], 'Users.id !=' => '0'])
                ->order(['Users.firstname' => 'ASC']);
        $sellers = $q->toArray();

        $list = [];
        foreach ($sellers as $item) {
            //array_push($list, [$item['id']=>$item['firstname'].'  '.$item['lastname']]);
            $list[$item['id']] = $item['firstname'] . '  ' . $item['lastname'];
        }
        return $list;
    }

    public function getBankAccountList($bankType = null) {

        $this->BankAccounts = TableRegistry::get('BankAccounts');

        $q = $this->BankAccounts->find()
                ->contain(['Banks'])
                ->where([
                    'type' => $bankType,
                    'org_id' => $this->getLocalOrgId(),
                    'OR' => [['branch_id' => '0'], ['branch_id' => $this->getLocalBranchId()]]
                ])
                ->order(['account_name' => 'ASC']);
        $bankAccounts = $q->toArray();

        $list = [];
        foreach ($bankAccounts as $item) {
            //array_push($list, [$item['id']=>$item['firstname'].'  '.$item['lastname']]);
            $list[$item->id] = ($item->has('bank') ? $item->bank->name . ' ' : '' ) . $item->account_name . ' ' . (($item->accountno != null) ? $item->accountno : '');
        }
        //$this->log($list,'debug');
        return $list;
    }

    public function getBankList() {
        $this->BankAccounts = TableRegistry::get('BankAccounts');

        $q = $this->BankAccounts->find()
                ->select(['BankAccounts.account_name', 'BankAccounts.accountno', 'BankAccounts.id'])
                ->contain(['Banks' => ['fields' => ['name']]])
                ->where([
                    'org_id' => $this->getLocalOrgId(),
                    'OR' => [['branch_id' => '0'], ['branch_id' => $this->getLocalBranchId()]]
                ])
                ->order(['account_name' => 'ASC']);
        $bankAccounts = $q->toArray();

        $list = [];
        foreach ($bankAccounts as $item) {
            //array_push($list, [$item['id']=>$item['firstname'].'  '.$item['lastname']]);
            $list[$item->id] = ($item->has('bank') ? $item->bank->name . ' ' : '' ) . $item->account_name . ' ' . (($item->accountno != null) ? $item->accountno : '');
        }
        //$this->log($list,'debug');
        return $list;
    }

    public function getBanktype($id = null) {
        $this->BankAccounts = TableRegistry::get('BankAccounts');


        $q = $this->BankAccounts->get($id, [
            'contain' => []
        ]);
        return $q->type;
    }

    public function getWarehouseList($where = null, $isExceptBranch = false, $type = 'list') {
        $this->Warehouses = TableRegistry::get('Warehouses');

        $wheres = ['org_id' => $this->getLocalOrgId(), 'isactive' => 'Y'];
        if ($isExceptBranch == false) {
            array_push($wheres, ['branch_id' => $this->getLocalBranchId()]);
        }
        if (!is_null($where) && $where != '') {
            array_push($wheres, $where);
        }
        
        $q = '';
        if ($type == 'list') {
            $q = $this->Warehouses->find('list', [
                'keyField' => 'id',
                'valueField' => 'name',
                'conditions' => $wheres
            ]);
        } else {
            $q = $this->Warehouses->find('all', [
                'conditions' => $wheres
            ]);
        }

        $warehouseList = $q->toArray();

        return $warehouseList;
    }

}
