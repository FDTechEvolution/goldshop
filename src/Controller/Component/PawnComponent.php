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
class PawnComponent extends Component {

    public function calinterestrate($type = null, $date = null) {
        if ($type == '3%') {

            $result = $date / 30;


            $ext = explode(".", $result);
            $interrestlate = $ext[0] * 0.03;
            $date = $date % 30;

            if ($date <= 30 && $date >= 26) {
                $interrestlate += 0.03;
            } else if ($date <= 25 && $date >= 21) {
                $interrestlate += 0.025;
            } else if ($date <= 20 && $date >= 16) {
                $interrestlate += 0.02;
            } else if ($date <= 15 && $date >= 11) {
                $interrestlate += 0.015;
            } else if ($date <= 10 && $date >= 6) {
                $interrestlate += 0.01;
            } else if ($date <= 5 && $date >= 1) {
                $interrestlate += 0.005;
            }

            return $interrestlate;
        } else if ($type == '2.5%') {

            $result = $date / 30;


            $ext = explode(".", $result);
            $interrestlate = $ext[0] * 0.025;
            $date = $date % 30;

            if ($date <= 30 && $date >= 16) {
                $interrestlate += 0.025;
            } else if ($date <= 15 && $date >= 6) {
                $interrestlate += 0.01;
            } else if ($date <= 5 && $date >= 1) {
                $interrestlate += 0.005;
            }

            return $interrestlate;
        } else if ($type == '2%') {

            $result = $date / 30;


            $ext = explode(".", $result);
            $interrestlate = $ext[0] * 0.02;
            $date = $date % 30;

            if ($date <= 30 && $date >= 16) {
                $interrestlate += 0.02;
            } else if ($date <= 15 && $date >= 6) {
                $interrestlate += 0.01;
            } else if ($date <= 5 && $date >= 1) {
                $interrestlate += 0.005;
            }

            return $interrestlate;
        } else if ($type == '1.75%') {

            $result = $date / 30;

            // if ($result != 0) {
            $ext = explode(".", $result);
            $interrestlate = $ext[0] * 0.0175;
            $date = $date % 30;

            if ($date <= 30 && $date >= 16) {
                $interrestlate += 0.0175;
            } else if ($date <= 15 && $date >= 6) {
                $interrestlate += 0.01;
            } else if ($date <= 5 && $date >= 1) {
                $interrestlate += 0.005;
            }
//            } else {
//                $interrestlate = 0.0175;
//            }
            return $interrestlate;
        } else {

            $result = $date / 30;


            $ext = explode(".", $result);
            $interrestlate = $ext[0] * 0.015;
            $date = $date % 30;

            if ($date <= 30 && $date >= 16) {
                $interrestlate += 0.015;
            } else if ($date <= 15 && $date >= 6) {
                $interrestlate += 0.01;
            } else if ($date <= 5 && $date >= 1) {
                $interrestlate += 0.005;
            }
        }
        return $interrestlate;
    }

}
