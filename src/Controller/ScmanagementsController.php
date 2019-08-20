<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Scmanagements Controller
 *
 *
 * @method \App\Model\Entity\Scmanagement[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ScmanagementsController extends AppController {
    
    
    public function savecard(){
        //$this->viewBuilder()->layout('clean');
        $this->loadModel('Smartcards');
        $this->autoRender = false;
        //$this->log('hi','debug');
        
        $idCard = $this->request->query('id');
        $fullThName = $this->request->query('fullname');
        $address = $this->request->query('address');
        $gender = $this->request->query('gender');
        $ip = $this->request->query('ip');
        $birthday = $this->request->query('birthday');
        $data = [
            'id_card'=>$idCard,
            'full_thai_name'=>$fullThName,
            'address'=>$address,
            'gender'=>$gender,
            'ip'=>$ip,
            'birthday'=>$birthday
        ];
        //$this->log($data,'debug');

        $q = $this->Smartcards->find()
            ->where(['Smartcards.ip'=>$data['ip']]);
        $smartcard = $q->first();

        


        if(is_null($smartcard) || sizeof($smartcard) ==0){
            $data = $this->fillterData($data);
            $smartcard = $this->Smartcards->newEntity();
            $smartcard->ip = $data['ip'];
            $smartcard->title = $data['name']['title'];
            $smartcard->firstname = $data['name']['firstname'];
            $smartcard->lastname = $data['name']['lastname'];

            $smartcard->gender = $data['gender'];
            $smartcard->cardno = $data['cardno'];
            $smartcard->full_address = $address;
            $smartcard->birthday = $data['birthday'];

            /*
            $smartcard->houseno = $data['address']['houseno'];
            $smartcard->moo = $data['address']['moo'];
             * 
             */
            $smartcard->address_line = $data['address']['address_line'];
            $smartcard->sub_district = $data['address']['sub-district'];
            $smartcard->district = $data['address']['district'];
            $smartcard->province = $data['address']['province'];

            $result = $this->Smartcards->save($smartcard);
            if(!$result){
                $this->log($smartcard->errors(), 'debug');
            }

        }


        //$this->log($data,'debug');
    }

    public function getcard(){
        $this->autoRender = false;
        
        $data['status'] = 'ok';
        $data['cardno'] = '1570800042933';
        $json = json_encode($data);
        print_r($json);
        return;
        
        
        $json = ['status'=>'error'];

        $this->loadModel('SystemUsages');
        $system_id = $this->request->session()->read('SystemUsages.id');

        if(is_null($system_id) || $system_id ==''){
            $json = json_encode($json);
            print_r($json);
            return null;
        }

        $q = $this->SystemUsages->find()
            ->where(['SystemUsages.id'=>$system_id]);
        $system = $q->first();
        $this->log('Get Card','debug');
        $this->log($system,'debug');
        if(is_null($system) || sizeof($system)==0){
            $json = json_encode($json);
            print_r($json);
            return null;
        }


        $ip = $system->ipaddress;
        $this->loadModel('Smartcards');
        $q = $this->Smartcards->find()
            ->where(['Smartcards.ip'=>$ip]);

        $data = $q->first();
        $this->log($data,'debug');
        if(is_null($data) || sizeof($data)==0){
            $json = json_encode($json);
            print_r($json);
            return null;
        }

        $data['status'] = 'ok';
        $json = json_encode($data);
        $this->Smartcards->delete($data);
        print_r($json);
    }


    private function fillterData($dataArr){
        /*$dataArr = [
            'id_card' => '1570800042933',
    'full_thai_name' => 'นาย_สาคร__แสงแก้ว',
    'address' => '63/1_หมู่ที่4____ตำบลหนองหาร_อำเภอสันทราย_จังหวัดเชียงใหม่',
    'gender' => 'M',
    'ip' => '183.89.186.143'
        ];*/


        $data = [];
        //Filter name
        $_names = array_filter(explode("_",$dataArr['full_thai_name']),'strlen');
        $_names = array_values($_names);
        $title = isset($_names[0])?$_names[0]:'คุณ';
        $title = $dataArr['gender']=='F'?$this->verifyFemaleTitle($title):$title;
        $names = [
            'title'=>$title,
            'firstname'=>isset($_names[1])?$_names[1]:'',
            'lastname'=>isset($_names[2])?$_names[2]:''
        ];

        //Address
        $_address = array_filter(explode("_",$dataArr['address']),'strlen');
        $_address = array_values($_address);
        /*
        $address = [
            'houseno'=>isset($_address[0])?$_address[0]:'',
            'moo'=>isset($_address[1])?$_address[1]:'',
            'sub-district'=>isset($_address[2])?$_address[2]:'',
            'district'=>isset($_address[3])?$_address[3]:'',
            'province'=>isset($_address[4])?$_address[4]:''
        ];
         * 
         */
        $address = [];
        $address_line = '';
        $count = 1;
        foreach ($_address as $item){
            if($count == sizeof($_address)){
                $address['province'] = str_replace('จังหวัด', '', $item);
            }elseif($count == (sizeof($_address)-1)){
                $address['district'] = str_replace('อำเภอ', '', $item);
            }elseif($count == (sizeof($_address)-2)){
                $address['sub-district'] = str_replace('ตำบล', '', $item);
            }else{
                $address_line  = $address_line.' '.$item;
            }
            $count++;
        }
        $address['address_line'] = $address_line;


        $data['name']= $names;   
        $data['address']= $address;  
        $data['cardno']= $dataArr['id_card']; 
        $data['gender']= $dataArr['gender']; 
        $data['birthday']= $dataArr['birthday']; 
        $data['ip']= $dataArr['ip'];        
        $this->log($data,'debug');
        return $data;
    }
    
    private function verifyFemaleTitle($title=null){
        if($title =='น.ส.'){
            $title = 'นางสาว';
        }elseif($title =='นาง'){
            $title = 'นาง';
        }else{
            $title = 'คุณ';
        }
        
        return $title;
        
    }

   


}
