<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * ThaiCards Controller
 *
 *
 * @method \App\Model\Entity\ThaiCard[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ThaiCardsController extends AppController {

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->viewBuilder()->layout('blank_v2');
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
        
    }

    public function uploadImage() {
        $this->viewBuilder()->layout('ajax');

        // new filename
        $filename = 'pic_' . date('YmdHis') . '.png';
        /*
          $this->log($this->request->getData(), 'debug');
          $url = '';
          if (move_uploaded_file($_FILES['webcam']['tmp_name'], 'img/uploads/id/' . $filename)) {
          $url = WWW_ROOT . 'img/uploads/id/' . $filename;
          }


         */


        $img = $_POST['imgBase64'];
        $img = str_replace('data:image/png;base64,', '', $img);
        $img = str_replace(' ', '+', $img);
        $data = base64_decode($img);
        $file = WWW_ROOT . 'img/uploads/id/' . $filename;
        $success = file_put_contents($file, $data);
        //print $success ? $file : 'Unable to save the file.';

        $data = ['url' => SITE_URL . 'img/uploads/id/' . $filename,'msg'=>$success];
        $json = json_encode($data);

        $this->set(compact('json'));
    }

}
