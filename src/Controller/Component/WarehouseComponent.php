<?php

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;
use Cake\Datasource\ConnectionManager;
use Cake\I18n\Date;

/**
 * Warehouse component
 */
class WarehouseComponent extends Component {

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];
    public $Connection = null;
    public $Products = NULL;
    public $components = ['Core', 'Util', 'Authen', 'DocSequent', 'ReadSqlFiles'];

    public function getTypeList() {
        return [
            'SALES' => 'สต๊อคหน้าร้าน',
            'PURCHASE' => 'ทองเก่า',
            'PAWN' => 'สต๊อคจำนำ',
        ];
    }

   

}
