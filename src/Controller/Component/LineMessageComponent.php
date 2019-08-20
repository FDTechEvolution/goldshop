<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;
use Cake\Datasource\ConnectionManager;

/**
 * Description of Utils
 *
 * @author sakorn.s
 */
class LineMessageComponent extends Component {
    
    public $API_URL = 'https://notify-api.line.me/api/notify';
    public $TokenGroupTest = 'LefKjlwA5eyvbU926BL4qDTiJSeRezKpBM601Qj4mre';
    public $DefaultMethod = 'POST';
    

    public function test() {

        $data = array(
            'message' => 'สวัสดี  dd'.chr(10).'hi',
            //'stickerPackageId' => '1',
            //'stickerId' => '14'
        );
        $this->sendMsg($data);

    }

    public function sendMsg($data) {

        $fields_string = '';

        foreach ($data as $key => $value) {
            $fields_string .= $key . '=' . $value . '&';
        }
        rtrim($fields_string, '&');

        $method = $this->DefaultMethod;
        $curl = curl_init();
        switch ($method) {
            case "POST":
                curl_setopt($curl, CURLOPT_POST, count($data));
                curl_setopt($curl, CURLOPT_POSTFIELDS, $fields_string);
                //curl_setopt($curl, CURLOPT_POST, 1);
                //debug($fields_string);
                //curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                break;
            case "PUT":
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
                if ($data)
                    curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
                break;
            default:
                if ($data)
                    $url = sprintf("%s?%s", $url, http_build_query($data));
        }
        // OPTIONS:
        curl_setopt($curl, CURLOPT_URL, $this->API_URL);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'Authorization: Bearer '.$this->TokenGroupTest,
            'Content-Type: application/x-www-form-urlencoded',
        ));
//curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
//curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
// EXECUTE:
        $result = curl_exec($curl);
        if (!$result) {
            die("Connection Failure");
        }
        curl_close($curl);
        return $result;
    }

}
