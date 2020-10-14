<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * GoodsLines Model
 *
 * @property \App\Model\Table\ProductsTable|\Cake\ORM\Association\BelongsTo $Products
 * @property \App\Model\Table\GoodsTransactionsTable|\Cake\ORM\Association\BelongsTo $GoodsTransactions
 * @property |\Cake\ORM\Association\BelongsTo $Orders
 *
 * @method \App\Model\Entity\GoodsLine get($primaryKey, $options = [])
 * @method \App\Model\Entity\GoodsLine newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\GoodsLine[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\GoodsLine|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\GoodsLine patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\GoodsLine[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\GoodsLine findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class GoodsLinesTable extends Table
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

        $this->setTable('goods_lines');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Products', [
            'foreignKey' => 'product_id'
        ]);
        $this->belongsTo('GoodsTransactions', [
            'foreignKey' => 'goods_transaction_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Orders', [
            'foreignKey' => 'order_id'
        ]);
        
        $this->belongsTo('UserCreated', [
            'className' => 'Users',
            'foreignKey' => 'createdby',
            'propertyName' => 'UserCreated'
        ]);

        $this->belongsTo('UserModified', [
            'className' => 'Users',
            'foreignKey' => 'modifiedby',
            'propertyName' => 'UserModified'
        ]);
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
            ->integer('seq')
            ->requirePresence('seq', 'create')
            ->notEmpty('seq');

        $validator
            ->integer('qty')
            ->requirePresence('qty', 'create')
            ->notEmpty('qty');

        $validator
            ->scalar('description')
            ->maxLength('description', 255)
            ->allowEmpty('description');

        $validator
            ->uuid('createdby')
            ->requirePresence('createdby', 'create')
            ->notEmpty('createdby');

        $validator
            ->uuid('modifiedby')
            ->allowEmpty('modifiedby');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['product_id'], 'Products'));
        $rules->add($rules->existsIn(['goods_transaction_id'], 'GoodsTransactions'));
        $rules->add($rules->existsIn(['order_id'], 'Orders'));

        return $rules;
    }
}
