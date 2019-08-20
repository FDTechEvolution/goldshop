<?php

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

    public $Roles = null;

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->Roles = TableRegistry::get('Roles');
        //$this->Security->requireSecure();
        
        $id = $this->request->session()->read('Auth.User.role_id');
        if (!is_null($id)) {
            $qrole = $this->Roles->get($id, [
            ]);
            $role=$qrole->name;
            $this->set(compact('role'));
        }

//        }
    }

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize() {
        parent::initialize();
        $this->loadComponent('UploadImage');
        $this->loadComponent('Util');
        $this->loadComponent('Pawn');
        $this->loadComponent('Authen');
        $this->loadComponent('Core');
        $this->loadComponent('TransactionCode');
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('Auth', [
            'loginAction' => [
                'controller' => 'login',
                'action' => 'index'
            ],
            'loginRedirect' => ['controller' => 'home', 'action' => 'index'],
            'logoutRedirect' => [
                'controller' => 'login',
                'action' => 'index'
            ],
            'authenticate' => [
                'Form' => [
                    'fields' => ['username' => 'username', 'password' => 'password']
                ]
            ],
            'storage' => 'Session'
        ]);
        //  $this->authen();
        //$this->Auth->config('checkAuthIn', 'Controller.initialize');
        /*
         * Enable the following components for recommended CakePHP security settings.
         * see https://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');
        //$this->loadComponent('Csrf');
        //$this->loadComponent('Security', ['blackHoleCallback' => 'forceSSL']);
    }

    public function forceSSL() {
        return $this->redirect('https://' . env('SERVER_NAME') . $this->request->here);
    }

    

}
