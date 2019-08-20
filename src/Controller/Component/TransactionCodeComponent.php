<?php

namespace App\Controller\Component;

use Cake\Controller\Component;

class TransactionCodeComponent extends Component {
    
    public function getOrderStatus(){
        $status = [
            'DR'=>'','ฉบับร่าง','OD'=>'กำลังสั่งซื้อ','OM'=>'กำลังสั่งทำ','WT'=>'รอลูกค้ารับของ','CO'=>'รับของแล้ว','PD'=>'จ่ายเงินแล้ว','RC'=>'รับของแล้ว','VO'=>'ยกเลิก'
        ];
        
        return $status;
    }
    
    public function promotionType(){
        $data = ['UNIT'=>'จำนวนเส้น/ชิ้น','PRICE'=>'มูลคารวมสินค้า'];
        return $data;
    }
  
    public function getDocumentCodes($type = null) {
        $data = [];
        if (is_null($type)) {
            $data = [
                'PW' => ['code' => 'PW', 'name' => 'ใบจำนำ'],
                'SO' => ['code' => 'SO', 'name' => 'ใบสั่งซื้อ'],
                'IV' => ['code' => 'IV', 'name' => 'ใบแจ้งหนี้'],
                'AR' => ['code' => 'AR', 'name' => 'ใบเสร็จรับเงิน'],
                'AP' => ['code' => 'AP', 'name' => 'ใบจ่ายเงิน'],
                'DP' => ['code' => 'DP', 'name' => 'ใบฝากเงิน'],
                'WD' => ['code' => 'WD', 'name' => 'ใบถอนเงิน'],
                'GR' => ['code' => 'GR', 'name' => 'ใบรับสินค้า'],
                'MM' => ['code' => 'MM', 'name' => 'ใบย้ายสินค้า'],
                'RF' => ['code' => 'RF', 'name' => 'ใบไถ่ถอน'],
                'BK' => ['code' => 'BK', 'name' => 'แจ้งชำรุด']
            ];
        } else {
            $data = ['PW' => 'ใบจำนำ', 'SO' => 'ใบสั่งซื้อ', 'IV' => 'ใบแจ้งหนี้', 'AR' => 'ใบเสร็จรับเงิน',
                'AP' => 'ใบจ่ายเงิน', 'DP' => 'ใบฝากเงิน', 'WD' => 'ใบถอนเงิน', 'GR' => 'ใบรับสินค้า',
                'MM' => 'ใบย้ายสินค้า', 'RF' => 'ใบไถ่ถอน', 'BK' => 'แจ้งชำรุด'];
        }
        return $data;
    }

    public function getStatusCode($type = null) {
        /*
         * DR = Draft
         * CO = Complete
         * VO = Void
         */
        $data = [];
        if (is_null($type)) {
            $data = [
                'DR' => ['code' => 'DR', 'name' => 'ฉบับร่าง'],
                'CO' => ['code' => 'CO', 'name' => 'เสร็จสมบูรณ์'],
                'RF' => ['code' => 'RF', 'name' => 'ไถ่ถอน'],
                'VO' => ['code' => 'VO', 'name' => 'ยกเลิกแล้ว'],
                'WT' => ['code' => 'WT', 'name' => 'กำลังดำเนินการ/รออนุมัติ'],
                'RC' =>['code'=>'RC','name'=>'รับแล้ว'],
                'PC' =>['code'=>'PC','name'=>'กำลังดำเนินการ'],
                'EXPIRE'=>['code'=>'EXPIRE','name'=>'หมดอายุ/หลุดจำนำ']
            ];
        } elseif ($type == 'list') {
            $data = ['DR' => 'ฉบับร่าง', 'CO' => 'เสร็จแล้ว', 'VO' => 'ยกเลิกแล้ว', 'RF' => 'ไถ่ถอน', 
                'WT' => 'กำลังดำเนินการ/รออนุมัติ','RC'=>'รับแล้ว','PC'=>'กำลังดำเนินการ','EXPIRE'=>'หมดอายุ/หลุดจำนำ'];
        }
        return $data;
    }

    public function getBankTypes($type = null) {
        $data = [];
        if (is_null($type)) {
            $data = [
                'BACC' => [
                    'code' => 'BACC', 'title' => 'บัญชีธนาคาร'
                ],
                'CASH' => [
                    'code' => 'CASH', 'title' => 'เงินสด'
                ],
                'CREDIT' => [
                    'code' => 'CREDIT', 'title' => 'บัตรเครดิต'
                ]
            ];
        } elseif ($type == 'list') {
            $data = ['BACC' => 'บัญชีธนาคาร', 'CASH' => 'เงินสด', 'CREDIT' => 'บัตรเครดิต'];
        }

        return $data;
    }

    public function getBankAccountType() {
        $data = ['เงินฝากออมทรัพย์' => 'เงินฝากออมทรัพย์', 'เงินฝากประจำ' => 'เงินฝากประจำ', 'เงินฝากกระแสรายวัน' => 'เงินฝากกระแสรายวัน', 'เงินสดในมือ/หน้าร้าน' => 'เงินสดในมือ/หน้าร้าน'];

        return $data;
    }

    public function getUnitType() {
        $data = ['เส้น' => 'เส้น', 'วง' => 'วง', 'ครั้ง' => 'ครั้ง', 'ปี' => 'ปี', 'อัน' => 'อัน', 'สาย' => 'สาย'];
        return $data;
    }

    public function getProductType($type = null) {
        $data = [];
        if (is_null($type)) {
            $data = [
                'GOLD' => ['code' => 'GOLD', 'title' => 'ทอง'],
                'SILVER' => ['code' => 'SILVER', 'title' => 'เงิน'],
                'DIMOND' => ['code' => 'DIMOND', 'title' => 'เพชร'],
                'S' => ['code' => 'S', 'title' => 'บริการ'],
            ];
        } elseif ($type == 'list') {
            $data = ['GOLD' => 'ทอง', 'SILVER' => 'เงิน', 'DIMOND' => 'เพชร', 'S' => 'บริการ'];
        }

        return $data;
    }

    public function getPaymentMethod($type = null) {
        $data = [];
        if (is_null($type)) {
            $data = [
                'CASH' => ['code' => 'CASH', 'name' => 'เงินสด'],
                'TRAN' => ['code' => 'TRAN', 'name' => 'โอนเงินผ่านธนาคาร'],
                'CRED' => ['code' => 'CRED', 'name' => 'บัตรเครดิต']
            ];
        } else {
            $data = ['CASH' => 'เงินสด', 'TRAN' => 'โอนเงินผ่านธนาคาร', 'CRED' => 'บัตรเครดิต'];
        }
        return $data;
    }

    public function getPaymentType() {
        $data = ['SALES' => 'ขายสินค้า', 'PURCHASE' => 'รับซื้อ', 'DEPOSIT' => 'เงินมัดจำ','PAWN'=>'จำนำ', 
            'EXPEND' => 'รายจ่าย', 'REVENUE' => 'รายรับ','GR'=>'รับสินค้าเข้า','TO'=>'นำจ่าย','BK'=>'สินค้าชำรุด','SAVING'=>'เงินออม','PX'=>'หลุดจำนำ'];
        return $data;
    }
    
    public function getCostType(){
        $data = ['NORMAL'=>'ค่ากำเหน็จ','PAWN'=>'ราคารับจำนำ'];
        return $data;
    }

}
