<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\I18n\Date;
use Cake\Network\Email\Email;

/**
 * WhProducts Controller
 *
 * @property \App\Model\Table\WhProductsTable $WhProducts
 *
 * @method \App\Model\Entity\WhProduct[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MailController extends AppController {

    public $Pawns = null;
    public $Bpartners = null;

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        Date::setToStringFormat('YYYY-MM-dd');
        $this->Pawns = TableRegistry::get('Pawns');
        $this->Bpartners = TableRegistry::get('Bpartners');

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



        ///////////////////////////////
        $date = new Date();
        $date->modify('+2 days');

        $pawns = $this->Pawns->find('all', [
            'conditions' => ['expiredate ' => $date],
            'contain' => ['Bpartners']
        ]);
        //      $this->log($pawns->toArray(),'debug');
        $this->set(compact('pawns', 'date'));
        $this->set('_serialize', ['pawns']);

        $email = new Email('default');
        $email->from(['me@example.com' => 'My Site'])
                ->template('index', 'default')
                ->to('contact@fdtech.co.th')
                ->viewVars(['pawns' => $pawns, 'date' => $date])
                ->emailFormat('html')
                ->subject('About')
                ->send('My message');
    }

}
