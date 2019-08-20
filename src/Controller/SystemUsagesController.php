<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * SystemUsages Controller
 *
 * @property \App\Model\Table\SystemUsagesTable $SystemUsages
 *
 * @method \App\Model\Entity\SystemUsage[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SystemUsagesController extends AppController {

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);

        if (!$this->Authen->authen()) {

            return $this->redirect(USERPERMISSION);
        }
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $systemUsages = $this->paginate($this->SystemUsages);

        $this->set(compact('systemUsages'));
    }

    /**
     * View method
     *
     * @param string|null $id System Usage id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $systemUsage = $this->SystemUsages->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('systemUsage', $systemUsage);
    }

    public function updateLastOnline() {
        $this->autoRender = false;
        if ($this->request->is('post')) {
            $data = $this->request->getData();

            $user = $this->request->session()->read('Auth.User');
            $id = $this->request->session()->read('SystemUsages.id');

            $q = $this->SystemUsages->find()
                    ->where(['SystemUsages.id' => $id, 'SystemUsages.isactive' => 'Y']);
            $systems = $q->toArray();
            $system = $q->first();
            if (is_null($system) || sizeof($systems) == 0) {
                
            } else {
                $system->isactive = 'Y';
                $this->SystemUsages->save($system);
                $this->request->session()->write('Auth.User', $user);
                $this->request->session()->write('SystemUsages.id', $system->id);
            }
        }
        echo 'not update!';
    }

    public function verifysession() {

        $this->autoRender = false;
        $str = '';
        $user = $this->request->session()->read('Auth.User');
        $id = $this->request->session()->read('SystemUsages.id');


        if (is_null($user)) {
            if (!is_null($id)) {
                $q = $this->SystemUsages->find()
                        ->where(['SystemUsages.id' => $id, 'SystemUsages.isactive' => 'Y']);
                $systems = $q->toArray();

                if (sizeof($systems) > 0) {
                    foreach ($systems as $system) {
                        $system->isactive = 'N';
                        $this->SystemUsages->save($system);
                    }
                }
            }

            $this->request->session()->destroy();
            $str = 'timeout';
        } else {
            $str = 'ok';
        }
        echo $str;
        die();
    }

}
