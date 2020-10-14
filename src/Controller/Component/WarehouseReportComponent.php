<?php

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;
use Cake\Datasource\ConnectionManager;
use Cake\I18n\Date;

/**
 * WarehouseReport component
 */
class WarehouseReportComponent extends Component {

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];
    public $Connection = null;
    public $components = ['Core', 'Util', 'Authen', 'DocSequent', 'ReadSqlFiles'];

    private function headColumn($warehouse_id = null) {
        $this->Connection = ConnectionManager::get('default');

        $sql = $this->ReadSqlFiles->read('report_wh_column.sql');
        $result = $this->Connection->execute($sql, ['warehouse_id' => $warehouse_id])->fetchAll('assoc');

        $this->log($result,'debug');
        $datas = [
            'column_qty' => 0,
            'rows' => []
        ];

        $pCat = '';
        $columnQty = 0;

        $rows = [];

        foreach ($result as $index => $item) {
            $_code = is_null($item['code']) ? '/' : $item['code'];
            if ($pCat == $item['label']) {

                $rows[$item['id']]['codes'][$_code] = [
                    'code' => $_code,
                    'name'=> sprintf('%s(%sg)',$_code,$item['value']),
                    'id' => $item['sd_weight_id'],
                    'gr' => 0,
                    'stock_before' => 0,
                    'stock' => 0,
                    'final_stock' => 0,
                    'sales' => 0,
                    'sales_before' => 0
                ];
            } else {
                $rows[$item['id']] = [
                    'name' => $item['label'],
                    'codes' => [
                        $_code => [
                            'code' => $_code,
                            'name'=> sprintf('%s(%sg)',$_code,$item['value']),
                            'id' => $item['sd_weight_id'],
                            'gr' => 0,
                            'stock_before' => 0,
                            'stock' => 0,
                            'final_stock' => 0,
                            'sales' => 0,
                            'sales_before' => 0
                        ]
                    ]
                ];
            }
            $pCat = $item['label'];
        }
        $datas['rows'] = $rows;

        foreach ($datas['rows'] as $item) {
            if ($columnQty < sizeof($item['codes'])) {
                $columnQty = sizeof($item['codes']);
            }
        }
        $datas['column_qty'] = $columnQty;

        return $datas;
    }

    private function receipt($warehouse_id = null, $startDate = null, $endDate = null) {
        $this->Connection = ConnectionManager::get('default');

        $heades = $this->headColumn($warehouse_id);

        $sql = $this->ReadSqlFiles->read('report_wh_gr_stock.sql');
        $results = $this->Connection->execute($sql, ['warehouse_id' => $warehouse_id, 'startdate' => $startDate, 'enddate' => $endDate])->fetchAll('assoc');
        //$this->log($results,'debug');
        $receiptDatas = [];
        $firstDate = '';

        //Loop date
        $sDate = new Date($startDate);
        do {
            $_startDate = $sDate->format('Y-m-d');
            if ($firstDate == '') {
                $firstDate = $_startDate;
            }
            $receiptDatas[$_startDate] = [
                'startdate' => $startDate,
                'enddate' => $endDate,
                'docdate' => $_startDate,
                'column_qty' => $heades['column_qty'],
                'rows' => $heades['rows']
            ];
            $sDate->modify('+1 day');
        } while ($_startDate != $endDate);
       // $this->log($receiptDatas,'debug');

        foreach ($results as $index => $item) {
            $_code = is_null($item['code']) ? '/' : $item['code'];
            $receiptDatas[$item['docdate']]['rows'][$item['product_category_id']]['codes'][$_code]['gr'] = (int) $item['totalqty'];


/*
            $receiptDatas[$item['docdate']] = [
                'startdate' => $startDate,
                'enddate' => $endDate,
                'docdate' => $item['docdate'],
                'column_qty' => $heades['column_qty'],
                'rows' => $heades['rows']
            ];
 * 
 */
        }



        //Before stock
        $sql = $this->ReadSqlFiles->read('report_wh_gr_stock_before.sql');
        $results = $this->Connection->execute($sql, ['warehouse_id' => $warehouse_id, 'startdate' => $startDate])->fetchAll('assoc');
        //$this->log($results,'debug');
        foreach ($results as $index => $item) {
            $_code = is_null($item['code']) ? '/' : $item['code'];
            $receiptDatas[$firstDate]['rows'][$item['product_category_id']]['codes'][$_code]['stock_before'] = (int) $item['totalqty'];
        }



        //Sales
        $sql = $this->ReadSqlFiles->read('report_wh_sales.sql');
        $results = $this->Connection->execute($sql, ['warehouse_id' => $warehouse_id, 'startdate' => $startDate, 'enddate' => $endDate])->fetchAll('assoc');

        foreach ($results as $index => $item) {
            $_code = is_null($item['code']) ? '/' : $item['code'];

            $receiptDatas[$item['paymentdate']]['rows'][$item['product_category_id']]['codes'][$_code]['sales'] = (int) $item['totalqty'];
        }



        //Sales before
        $sql = $this->ReadSqlFiles->read('report_wh_sales_before.sql');
        $results = $this->Connection->execute($sql, ['warehouse_id' => $warehouse_id, 'startdate' => $startDate])->fetchAll('assoc');

        foreach ($results as $index => $item) {
            $_code = is_null($item['code']) ? '/' : $item['code'];
            $receiptDatas[$firstDate]['rows'][$item['product_category_id']]['codes'][$_code]['sales_before'] = (int) $item['totalqty'];
        }

        $this->log($receiptDatas,'debug');
        //Final calculate
        $previousDate = '';
        $_receiptDatas = $receiptDatas;
        foreach ($_receiptDatas as $docdate => $item) {
            foreach ($item['rows'] as $pCat => $row) {
                $this->log($row['name'],'debug');
                foreach ($row['codes'] as $keyCode => $code) {
                    if ($previousDate == '') {
                        $receiptDatas[$docdate]['rows'][$pCat]['codes'][$keyCode]['stock'] = $code['stock_before'] - $code['sales_before'];
                        $receiptDatas[$docdate]['rows'][$pCat]['codes'][$keyCode]['final_stock'] = $code['gr']+($code['stock_before'] - $code['sales_before']) - $code['sales'];
                    } else {
                        $prevStock = $receiptDatas[$previousDate]['rows'][$pCat]['codes'][$keyCode]['final_stock'];

                        $receiptDatas[$docdate]['rows'][$pCat]['codes'][$keyCode]['stock'] = $prevStock;
                        $receiptDatas[$docdate]['rows'][$pCat]['codes'][$keyCode]['final_stock'] = ($prevStock + $code['gr']) - $code['sales'];
                    }
                }
            }

            $previousDate = $docdate;
        }




        return $receiptDatas;
    }

    public function getData($warehouse_id = null, $startDate = null, $endDate = null) {

        $results = $this->receipt($warehouse_id, $startDate, $endDate);




        return $results;
    }

}
