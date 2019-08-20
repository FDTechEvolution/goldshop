<?php

namespace App\Controller\Component;

use Cake\Controller\Component;

class UtilComponent extends Component {

    public function convertDate($date = null) {
        if(is_null($date) || $date == ''){
            return null;
        }
        //$this->log('$date '.$date,'debug');
        $ext = explode('/', $date);
        //$this->log($ext,'debug');
        if(sizeof($ext) <3){
            return $date;
        }
        // $this->log('$date '.$ext,'debug');
        $converted = ($ext[2] - 543) . '-' . $ext[1] . '-' . $ext[0];
        //   $this->log('$converted '.$converted,'debug');
        return $converted;
    }

    public function evalmath($equation) {
        //$this->log($equation,'debug');
        $result = 0;
        // sanitize imput
        $equation = preg_replace("/[^a-z0-9+\-.*\/()%]/", "", $equation);
        // convert alphabet to $variabel 
        $equation = preg_replace("/([a-z])+/i", "\$$0", $equation);
        // convert percentages to decimal
        $equation = preg_replace("/([+-])([0-9]{1})(%)/", "*(1\$1.0\$2)", $equation);
        $equation = preg_replace("/([+-])([0-9]+)(%)/", "*(1\$1.\$2)", $equation);
        $equation = preg_replace("/([0-9]{1})(%)/", ".0\$1", $equation);
        $equation = preg_replace("/([0-9]+)(%)/", ".\$1", $equation);
        if ($equation != "") {
            $result = @eval("return " . $equation . ";");
        }
        if ($result == null) {
            throw new Exception("Unable to calculate equation");
        }
        //echo $result;
        return round($result,0);
    }

}
