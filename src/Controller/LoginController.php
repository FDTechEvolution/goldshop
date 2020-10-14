<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

/**
 * Login Controller
 *
 *
 * @method \App\Model\Entity\Login[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LoginController extends AppController {

    public $RoleAccesses = null;
    public $Roles = null;
    public $Actions = null;
    public $Controllers = null;
    public $Users = null;
    public $SystemUsages = null;

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->RoleAccesses = TableRegistry::get('RoleAccesses');
        $this->Roles = TableRegistry::get('Roles');
        $this->Actions = TableRegistry::get('Actions');
        $this->Controllers = TableRegistry::get('Controllers');
        $this->Users = TableRegistry::get('Users');
        $this->SystemUsages = TableRegistry::get('SystemUsages');


        $action = strtolower($this->request->params['action']);

        if ($action != 'index' && $action != 'logout') {
            if (!$this->Authen->authen()) {
                return $this->redirect(USERPERMISSION);
            }
        }
    }

    public function index() {
        $this->viewBuilder()->layout('blank_v1');

        //Check if already login
        if (!(is_null($this->request->session()->read('Auth.User')))) {
            return $this->redirect(DEFAULT_HOME_URL);
        }


        if ($this->request->is('post')) {
            $loginData = $this->request->getData();

            $screen=[
                'width'=>$loginData['screen_width'],
                'height'=>$loginData['screen_height'],
                'is_mobile'=>$loginData['is_mobile']
            ];
            //Set screen session
            $this->request->session()->write('screen.', $screen);

            $user = $this->Auth->identify();

            if ($user) {
                $user = $this->Users->get($user['id'], ['contain' => ['Roles']]);
                $this->Auth->setUser($user);

                $query = $this->RoleAccesses->find('all', [
                    'contain' => ['Actions' => ['Controllers']],
                    'conditions' => ['role_id' => $user['role_id']]
                ]);
                //$this->log($this->request->session()->read('Auth.User'),'debug');

                $rolePermissions = $query->toArray();

                $rolePermissions = $this->makePermissionArr($rolePermissions);

                $this->request->session()->write('rolePermissions', $rolePermissions);

                //$this->Flash->success(__('Login สำเร็จ'));

                $golbal = $this->Core->verifyBranch($user);
                //$this->Core->getSaveClientDetail($user->id);
                //return $this->redirect(DEFAULT_HOME_URL);
                //return $this->redirect(['action' => 'verifyclient', $user->id]);

                $this->Cookie->write('Global',$golbal);
                $this->Cookie->write('user', $user);
                $this->Cookie->write('rolePermissions', $rolePermissions);
                $this->Cookie->write('remember_me_cookie',true);
                $this->Cookie->write('screen',$screen);
                //$this->Cookie->write('remember_me_cookie', $this->request->data['User'], true, '1 weeks');


                return $this->redirect(DEFAULT_HOME_URL);
            } else {
                $this->Flash->defaultError(__('ชื่อผู้ใช้งานหรือรหัสผ่านไม่ถูกต้อง'));
                return $this->redirect(['controller' => 'login']);
            }
        }
    }

    public function verifyclient($user_id = null) {
        if ($this->request->is('post')) {
            $data = $this->request->getData();

            $systemUse = $this->SystemUsages->newEntity();
            $systemUse->user_id = $user_id;
            $systemUse->ipaddress = $data['ip'];
            $systemUse->isactive = 'Y';
            $description = $data['address'] . '[ ' . $data['lat'] . ',' . $data['long'] . ']';
            $systemUse->description = $description;
            $result = $this->SystemUsages->save($systemUse);
            if ($result) {
                $this->request->session()->write('SystemUsages.id', $systemUse->id);
                //return $systemUse->id;
                return $this->redirect(DEFAULT_HOME_URL);
            }
        }
    }

    private function makePermissionArr($rolePermissions = null) {
        if (is_null($rolePermissions)) {
            return null;
        }

        $newArr = [];
        $newActionArr = [];
        foreach ($rolePermissions as $value) {

            $controllerKey = $value['action']['controller']['value'];
            $p = array_search($controllerKey, $newArr);
            if ($p === false) {
                array_push($newArr, $controllerKey);
                $newActionArr[$controllerKey] = [$value['action']['value']];
                //array_push($newActionArr[$controllerKey],$value['action']['value'] );
            } else {
                array_push($newActionArr[$controllerKey], $value['action']['value']);
            }
        }

        $rolePermissions = [
            'controller' => $newArr,
            'actions' => $newActionArr
        ];
        return $rolePermissions;
    }

    private function startsWith($haystack, $needle) {
        $length = strlen($needle);
        return (substr($haystack, 0, $length) === $needle);
    }

    private function endsWith($haystack, $needle) {
        $length = strlen($needle);
        if ($length == 0) {
            return true;
        }
    }

}
