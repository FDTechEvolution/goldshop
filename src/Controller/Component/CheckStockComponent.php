<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;
/**
 * CheckStock component
 */
class CheckStockComponent extends Component
{

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];
     public $Connection = null;
    public $Products = NULL;
    public $components = ['Core', 'Util', 'Authen', 'DocSequent', 'ReadSqlFiles'];


    public function byProductCode($productCode = null, $warehouseId = null) {
        $this->Products = TableRegistry::get('Products');
        $product = $this->Products->find()
                ->where(['code' => $productCode])
                ->first();
        
        if(is_null($product)){
             $data = [
                 'msg'=>'ไม่พบสินค้ารายการสินค้าในระบบ',
                 'product_code'=>$productCode,
                 'warehouse_id'=>$warehouseId
                 ];
             return $data;
        }

        $productId = $product->id;
        return $this->check($productId, $warehouseId);
    }
    
    public function byProductId($productId = null, $warehouseId = null){
        return $this->check($productId,$warehouseId);
    }
    
    
    
    /**********
     * 
     * 
     * 
     */
    
    private function check($productId = null, $warehouseId = null) {
        if (is_null($productId) || is_null($warehouseId)) {
            return NULL;
        }
        $data = [
            'ishasstock' => false,
            'msg' => '',
            'balance_amt' => 0,
            'product_id' => $productId,
            'product_code' => '',
            'warehouse_id' => $warehouseId
        ];

        $this->Connection = ConnectionManager::get('default');
        $sql = $this->ReadSqlFiles->read('wh_check_stock.sql');
        $result = $this->Connection->execute($sql, ['product_id' => $productId, 'warehouse_id' => $warehouseId])->fetchAll('assoc');
        if (sizeof($result) > 0) {
            $result = $result[0];
            if ($result['balance_amt'] > 0) {
                return [
                    'ishasstock' => true,
                    'msg' => '',
                    'balance_amt' => $result['balance_amt'],
                    'product_id' => $result['product_id'],
                    'product_code' => $result['code'],
                    'warehouse_id' => $result['warehouse_id']
                ];
            } else {
                $data['msg'] = 'จำนวนสินค้าไม่เพียงพอ';
            }
        } else {
            $data['msg'] = 'ไม่พบสินค้าในคลังสินค้า';
        }


        return $data;
    }
}
