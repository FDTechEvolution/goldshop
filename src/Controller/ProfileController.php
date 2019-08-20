<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
/**
 * Profile Controller
 *
 *
 * @method \App\Model\Entity\Profile[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProfileController extends AppController {

    public $Users = null;

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);

        if (!$this->Authen->authen()) {
            return $this->redirect(USERPERMISSION);
        }
        $this->Users = TableRegistry::get('Users');
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
        $user_id = $this->request->session()->read('Auth.User.id');
        if(!isset($user_id) || is_null($user_id) || $user_id ==''){
            return $this->redirect(DEFAULT_HOME_URL);
        }
        
        $q = $this->Users->find()
                ->contain(['Roles'])
                ->where(['Users.id'=>$user_id]);
        $user = $q->first();
        
        $this->set(compact('user'));
    }

}
