<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

class ServiceProductCategoriesController extends AppController {

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->Auth->allow();
        $this->viewBuilder()->layout('json');
    }

    public function getCategory() {
        $this->loadComponent('Product');
        $productCats = $this->Product->getProductCategorWithDesignList();
        $json = json_encode($productCats);

        $this->set(compact('json'));
    }

}
