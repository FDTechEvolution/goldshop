<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;


class PosController extends AppController {

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        
        if (!$this->Authen->authen()) {
            return $this->redirect(USERPERMISSION);
        }

    }

    public function index() {
       //debug($this->Cookie->read('rolePermissions'));
    }
}
