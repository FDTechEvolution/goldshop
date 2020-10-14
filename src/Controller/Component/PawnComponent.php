<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\ORM\TableRegistry;
use Cake\I18n\Date;
use Cake\I18n\Time;
use Cake\I18n\Number;
use Cake\Validation\Validator;

/**
 * Description of Utils
 *
 * @author sakorn.s
 */
class PawnComponent extends Component {

    public $Products = null;
    public $Pawns = null;
    public $PawnTransactions = null;
    public $components = ['Core', 'Util', 'Authen', 'DocSequent'];
    public $PAWN_EXTEND_STATUS = 'RN';

    public function pawnTransactionType() {
        return ['NEW' => 'รับจำนำใหม่', 'RN' => 'ต่อดอก','RF'=>'ไถ่ถอน'];
    }

    public function createDraft($data) {
        $this->Pawns = TableRegistry::get('Pawns');
        $pawn = $this->Pawns->newEntity();
        $pawn = $this->Pawns->patchEntity($pawn, $data);

        $pawn->bpartner_id = $data['bpartner_id'];
        $pawn->branch_id = $this->Core->getLocalBranchId();
        $pawn->warehouse_id = $data['warehouse'];
        $pawn->org_id = $this->Core->getLocalOrgId();
        $pawn->cratedby = $this->Authen->getAuthenUserId();
        $pawn->docdate = $this->Util->convertDate($data['date']);
        $pawn->startdate = $this->Util->convertDate($data['date']);
        $pawn->expiredate = $this->Util->convertDate($data['expiredate']);
        $pawn->status = 'DR';
        
        $rate = floatval(str_replace('%', '', $data['type']));
        $pawn->rate = $rate;

        $time = Time::now();
        $strLog = sprintf('<strong>#%s ทำรายการใหม่#</strong><br/>', $time->i18nFormat(DATE_TIME_FORMATE, null, TH_DATE));
        $strLog = $strLog . sprintf('- ระยะเวลา %s - %s เงินต้น %s บาท<br/>', $data['date'], $data['expiredate'], Number::format($data['totalmoney']));
        /*
          $text = 'วันที่ ' . $data['date'] . ' : ทำรายการใหม่ <br>' .
          'วันที่ ' . $data['expiredate'] . ' : สิ้นอายุ <br>' .
          ' เงินต้น  ' . $data['totalmoney'] . '<br><hr>';
         * 
         */
        $pawn->log_history = $strLog;

        if ($this->Pawns->save($pawn)) {
            return $pawn;
        } else {
            $this->log($data, 'debug');
            $this->log($pawn->errors(), 'debug');

            return false;
        }
    }
    
   

    public function createPawnTransaction($pawn, $amount = 0, $type = 'NEW', $rate = 3, $interestAmt = 0, $startDate, $endDate, $seller = null, $description = null, $paymentId = null,$discount =0) {
        $this->PawnTransactions = TableRegistry::get('PawnTransactions');

        $rate = floatval(str_replace('%', '', $rate));

        $pawntransaction = $this->PawnTransactions->newEntity();
        $pawntransaction->pawn_id = $pawn->id;
        $pawntransaction->transaction_date = $pawn->created;
        $pawntransaction->type = $type;
        $pawntransaction->amount = $amount;
        $pawntransaction->seller = $seller;
        $pawntransaction->rate = $rate;
        $pawntransaction->interestamt = $interestAmt;
        $pawntransaction->start_date = $startDate;
        $pawntransaction->end_date = $endDate;
        $pawntransaction->createdby = $this->Authen->getAuthenUserId();
        $pawntransaction->description = $description;
        $pawntransaction->payment_id = $paymentId;
        $pawntransaction->discount = $discount;


        $pawntransaction = $this->PawnTransactions->save($pawntransaction);

        if (!$pawntransaction) {
            $this->log($pawntransaction->errors(), 'debug');
        }
        return $pawntransaction;
    }

    public function verifyProduct($name = null, $product_category_id = null, $percent = null, $design_id = null, $weight = 0, $price = 0) {
        $this->Products = TableRegistry::get('Products');
        $product = $this->Products->newEntity();
        $product->name = $name;

        $product->code = '_temp';
        $product->standard_price = 0;
        $product->actual_price = $price;
        $product->isactive = 'Y';
        $product->manual_weight = $weight;
        $product->product_category_id = $product_category_id;
        $product->createdby = $this->Authen->getAuthenUserId();
        $product->org_id = $this->Core->getLocalOrgId();
        $product->design_id = $design_id;
        $product->percent = $percent;

        $result = $this->Products->save($product);
        if (!$result) {
            $this->log($product->errors(), 'debug');
        }
        return $product;
    }

    public function calinterestrate($type = 3, $dayDiff = 0) {
        $rate = $type;

        if ($type == 3) {
            if ($dayDiff <= 5) {
                $rate = 0.5;
            } else if ($dayDiff <= 10) {
                $rate = 1;
            } else if ($dayDiff <= 15) {
                $rate = 1.5;
            } else if ($dayDiff <= 20) {
                $rate = 2;
            } else if ($dayDiff <= 25) {
                $rate = 2.5;
            }
        } else {
            if ($dayDiff <= 5) {
                $rate = 0.5;
            } else if ($dayDiff <= 15) {
                $rate = 1;
            }
        }
        return $rate;
    }

    /*
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
     * 
     */

    public function getPawnRate() {
        $rates = ['3' => '3%', '2.5' => '2.5%', '2' => '2%', '1.75' => '1.75%', '1.5' => '1.5%'];
        return $rates;
    }

    public function getTotalMonthBetweenDate($startDate, $endDate) {

        //$this->log(($startDate), 'debug');
        //$this->log(($endDate), 'debug');
        if (gettype($startDate) != 'object') {
            $startDate = new Date($startDate);
        }
        if (gettype($endDate) != 'object') {
            $endDate = new Date($endDate);
        }

        $totalMonth = 0;
       
        if ($startDate->year < $endDate->year) {
            $totalMonth = (12 - $startDate->month) + $endDate->month;
        } else {
            $totalMonth = $endDate->month - $startDate->month;
        }
        if($startDate->day > $endDate->day){
            $totalMonth--;
        }
       
       
        $this->log($totalMonth, 'debug');
        return $totalMonth;
    }

    public function getCalInterestRate($amount = 0, $rate = 3, $startDate = null, $endDate = null) {
        $amount = floatval($amount);
        $rate = floatval($rate);

        $monthAmt = $this->getTotalMonthBetweenDate($startDate, $endDate);
        return ($amount * ($rate / 100)) * $monthAmt;
    }

}
