<?php

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;
use Cake\Datasource\ConnectionManager;


/**
 * JsonData component
 */
class JsonDataComponent extends Component {

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];
    public $Path = ROOT . DS . 'webroot' . DS . 'json' . DS;
    public $components = ['Core', 'Util', 'Authen', 'ReadSqlFiles','Json'];
    public $Connection = null;

    
    private function createWarehouseProduct($subDirec,$warehouseId = null){
        $this->Connection = ConnectionManager::get('default');
        $sql = $this->ReadSqlFiles->read('wh_product.sql');
        $result = $this->Connection->execute($sql, ['warehouse_id' => $warehouseId])->fetchAll('assoc');
        
        $number = $this->Util->getRunningNumberFromDateTime();
        $fileName = 'wh_product_'.$number.'.json';
        $this->Json->write($fileName,$subDirec,$result);
    }
    
    public function getWarehouseProduct($warehouseId = null){
        $subDirec = 'warehouse_product'.DS.$warehouseId;
        
        $jsonData = $this->Json->readLatestByFolder($subDirec);
        if(is_null($jsonData)){
            $this->createWarehouseProduct($subDirec, $warehouseId);
            $jsonData = $this->Json->readLatestByFolder($subDirec);
        }
        
        return $jsonData;
        
    }
}
