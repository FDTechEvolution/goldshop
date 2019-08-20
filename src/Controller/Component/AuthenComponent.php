<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controller\Component;

use Cake\Controller\Component;

/**
 * Description of Utils
 *
 * @author sakorn.s
 */
class AuthenComponent extends Component {

    public function authen() {
        $control = strtolower($this->request->params['controller']);
        $action = strtolower($this->request->params['action']);
        //$this->log($control,'debug');
        //$this->log($action,'debug');
        
        if ($this->authenPublicFunction($control, $action)) {
            return true;
        }

        if ((is_null($this->request->session()->read('Auth.User')))) {
            return false;
        } else {

            $Permissions = $this->request->session()->read('rolePermissions');
            //$this->log($Permissions,'debug');
            if (in_array($control, $Permissions['controller'])) {

                $actionArr = $Permissions['actions'][$control];
                //$this->log($actionArr, 'debug');

                if ($action == 'displaypermission' || $action == 'logout') {

                    return true;
                } elseif (in_array($action, $actionArr)) {

                    return true;
                } else {

                    return false;
                }
            } else {

                return false;
            }
        }
    }

    public function getAuthenUserId() {
        $user_id = $this->request->session()->read('Auth.User.id');
        if (is_null($user_id) || $user_id == '') {
            $user_id = '0';
        }
        return $user_id;
    }

    private function authenPublicFunction($control, $action) {

       
        $allows = [
            'systemusages' => ['verifysession'],
            'login' => ['index','verifyclient'],
            'logout' => ['index'],
            'pawns' => ['ajaxsearch'],
            'users' => ['displaypermission'],
            'scmanagements' => [],
            'bpartners'=>['ajaxsavecus','ajaxsearch'],
            'goodsmovement'=>['whproduct'],
            'goodslines'=>['import'],
            'goldprices'=>['ajaxgettodayprice','ajaxgetgoldprice','ajaxupdatedayprice'],
            'products'=>['getproductoptionjson','getdetailjsonorder','getdetailjson'],
            'services'=>[],
            'purchaseorders'=>['getdetailjson','ajaxsaveorder'],
            'savingaccounts'=>['ajaxgetsavingaccount','ajaxvalidationsavingwithcard'],
            'servicepayments'=>[],
            'promotions'=>['verifybppromotion','usepromotion']
        ];
       // $this->log($control,'debug');

        if ((isset($allows[$control]) == true) && (in_array($action, $allows[$control]) || sizeof($allows[$control]) == 0)) {

            return true;
        } else {
            
            return false;
            //return $this->redirect(['controller' => 'login', 'action' => 'index']);
        }
    }

}
