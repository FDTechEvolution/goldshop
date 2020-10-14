<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controller\Component;

use Cake\Controller\Component;

/**
 * Description of Utils
 *
 * @author sakorn.s
 */
class GoldComponent extends Component {

    public function getGoldPercent(){
        $data = [
            '96.5'=>'96.5%',
            '58.5'=>'58.5%',
            '75'=>'75%',
            '90'=>'90%',
            
            '99'=>'99%',
            '40'=>'40%',
            '925'=>'925',
            '-'=>'-%'
            
        ];
        
        return $data;
    }

}
