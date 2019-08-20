<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MasterPrices Model
 *
 * @method \App\Model\Entity\MasterPrice get($primaryKey, $options = [])
 * @method \App\Model\Entity\MasterPrice newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MasterPrice[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MasterPrice|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MasterPrice patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MasterPrice[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MasterPrice findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class MasterPricesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('master_prices');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->uuid('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('title')
            ->maxLength('title', 255)
            ->allowEmpty('title');

        $validator
            ->dateTime('publish_datetime')
            ->allowEmpty('publish_datetime');

        $validator
            ->decimal('gold_bar_purchase_price')
            ->allowEmpty('gold_bar_purchase_price');

        $validator
            ->decimal('gold_bar_sales_price')
            ->allowEmpty('gold_bar_sales_price');

        $validator
            ->decimal('gold_purchase_price')
            ->allowEmpty('gold_purchase_price');

        $validator
            ->decimal('gold_sales_price')
            ->allowEmpty('gold_sales_price');

        $validator
            ->scalar('description')
            ->maxLength('description', 255)
            ->allowEmpty('description');

        return $validator;
    }
}
