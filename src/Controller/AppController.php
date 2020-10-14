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
    public $Menus = [
        'normal' => [
            ['type' => 'S', 'text' => '<i class="ti-home"></i><span> หน้าหลัก</span>', 'url' => ['controller' => 'home']],
            ['type' => 'S', 'text' => '<i class="ion-ios7-keypad"></i><span> POS</span>', 'url' => ['controller' => 'pos']],
            ['type' => 'S', 'text' => '<i class="ion-ios7-keypad"></i><span> ปิดบัญชีรายวัน</span>', 'url' => ['controller' => 'close-days']],
            ['type' => 'M', 'text' => '<i class="fa fa-users"></i> <span> พันธมิตรทางธุรกิจ</span>', 'url' => 'javascript:void(0);',
                'sub' => [
                    ['text' => 'ลูกค้า', 'url' => ['controller' => 'bpartners', 'action' => 'index', 'Y']],
                    ['text' => 'ผู้ขาย', 'url' => ['controller' => 'bpartners', 'action' => 'index', 'N']],
                ]
            ],
        ],
        'admin1' => [
            ['type' => 'M', 'text' => '<i class="ti-package"></i> <span>คลังสินค้า</span>', 'url' => 'javascript:void(0);',
                'sub' => [
                    ['text' => 'คลังสินค้า', 'url' => ['controller' => 'warehouses']],
                    ['text' => 'นำเข้าสินค้า', 'url' => ['controller' => 'goods-receipts']],
                    ['text' => 'ย้ายสินค้า', 'url' => ['controller' => 'goods-movement']],
                    ['text' => 'รับสินค้า', 'url' => ['controller' => 'goods-movement', 'action' => 'approve-list']]
                ]
            ],
            ['type' => 'M', 'text' => '<i class="mdi mdi-cart-outline"></i> <span>สินค้า</span>', 'url' => 'javascript:void(0);',
                'sub' => [
                    ['text' => 'ประเภทสินค้า', 'url' => ['controller' => 'product-categories']],
                    ['text' => 'รายการสินค้า', 'url' => ['controller' => 'products']],
                    ['text' => 'ปริ้น QRCode', 'url' => ['controller' => 'products', 'action' => 'print-qrcode']],
                    ['text' => 'น้ำหนักทอง', 'url' => ['controller' => 'weights']],
                ]
            ],
            ['type' => 'M', 'text' => '<i class="ti-money"></i> <span>ราคา</span>', 'url' => 'javascript:void(0);',
                'sub' => [
                    ['text' => 'ราคาทองประจำวัน', 'url' => ['controller' => 'gold-prices']],
                    ['text' => 'ตั้งค่ากำเหน็จ', 'url' => ['controller' => 'cost-settings', 'action' => 'view']],
                    ['text' => 'ตั้งค่าราคาจำนำ', 'url' => ['controller' => 'cost-settings', 'action' => 'view', 'pawn']],
                    ['text' => 'โปรโมชั่น', 'url' => ['controller' => 'promotions']],
                ]
            ],
        ],
        'admin2' => [
            ['type' => 'M', 'text' => '<i class="mdi mdi-settings"></i> <span>ตั้งค่าอื่นๆ</span>', 'url' => 'javascript:void(0);',
                'sub' => [
                    ['text' => 'ผู้ใช้งานระบบ', 'url' => ['controller' => 'users']],
                    ['text' => 'หมายเลขเอกสาร', 'url' => ['controller' => 'sequent-numbers']],
                    ['text' => 'บริษัท', 'url' => ['controller' => 'orgs']],
                    ['text' => 'สาขา', 'url' => ['controller' => 'branches']],
                    ['text' => 'บัญชีธนาคาร', 'url' => ['controller' => 'bank-accounts']],
                    ['text' => 'การตั้งค่าทางบัญชี', 'url' => ['controller' => 'account-settings']],
                    ['text' => 'ประเภทรายรัย/รายจ่าย', 'url' => ['controller' => 'income-types']],
                ]
            ],
            ['type' => 'M', 'text' => '<i class="ti-printer"></i> <span>รายงาน</span>', 'url' => 'javascript:void(0);',
                'sub' => [
                    ['text' => 'สถิติ', 'url' => ['controller' => 'reports']],
                    ['text' => 'สรุปรายรับ-รายจ่ายประจำวัน', 'url' => ['controller' => 'reports', 'action' => 'income']],
                    ['text' => 'Transaction Reports', 'url' => ['controller' => 'reports', 'action' => 'transaction']],
                    ['text' => 'รายงานลูกค้าจำนำ', 'url' => ['controller' => 'reports', 'action' => 'pawnreport']],
                    ['text' => 'รายงานออมเงิน', 'url' => ['controller' => 'reports', 'action' => 'savingreport']],
                    ['text' => 'รายการสินค้าคงเหลือ', 'url' => ['controller' => 'reports', 'action' => 'warehousev2']],
                    ['text' => 'รายงานการสั่งทำ', 'url' => ['controller' => 'reports', 'action' => 'order']],
                ]
            ],
        ]
    ];

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->Roles = TableRegistry::get('Roles');
        //$this->Security->requireSecure();

        if ($this->Cookie->read('remember_me_cookie')) {
            $user = $this->Cookie->read('user');
            $this->Auth->setUser($user);

            $rolePermissions = $this->Cookie->read('rolePermissions');
            $this->request->session()->write('rolePermissions', $rolePermissions);

            $screen = $this->Cookie->read('screen');
            $this->request->session()->write('screen', $screen);

            
            $golbal = $this->Cookie->read('Global');
            $this->request->session()->write('Global', $golbal);
            
        }

        $id = $this->request->session()->read('Auth.User.role_id');
        if (!is_null($id)) {
            $qrole = $this->Roles->get($id, [
            ]);
            $role = $qrole->name;
            $this->set(compact('role'));
        }
        $menus = $this->Menus;
        $this->set(compact('menus'));

        $this->manageLayout();
    }

    private function manageLayout() {
        $screenSize = $this->request->session()->read('screen');
        if(!isset($screenSize['width'])){
            return false;
        }
        

        if (isset($screenSize) && $screenSize != null && $screenSize != '') {
            //$this->log($screenSize, 'debug');
            if ($screenSize['width'] <= 950) {
                $this->viewBuilder()->layout('mobile');
            }
        }

        if ($screenSize['is_mobile'] == 'Y') {
            $this->viewBuilder()->layout('mobile');
        }
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
        $this->loadComponent('Cookie');
        $this->loadComponent('Json');
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

}
