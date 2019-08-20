<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * OrderLines Model
 *
 * @property \App\Model\Table\OrdersTable|\Cake\ORM\Association\BelongsTo $Orders
 * @property \App\Model\Table\ProductsTable|\Cake\ORM\Association\BelongsTo $Products
 * @property \App\Model\Table\ImagesTable|\Cake\ORM\Association\BelongsTo $Images
 * @property \App\Model\Table\BpartnersTable|\Cake\ORM\Association\BelongsTo $Bpartners
 *
 * @method \App\Model\Entity\OrderLine get($primaryKey, $options = [])
 * @method \App\Model\Entity\OrderLine newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\OrderLine[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\OrderLine|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\OrderLine patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\OrderLine[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\OrderLine findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class OrderLinesTable extends Table
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

        $this->setTable('order_lines');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Orders', [
            'foreignKey' => 'order_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Products', [
            'foreignKey' => 'product_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Images', [
            'foreignKey' => 'image_id'
        ]);
        $this->belongsTo('Bpartners', [
            'foreignKey' => 'bpartner_id'
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
            ->decimal('netamt')
            ->requirePresence('netamt', 'create')
            ->notEmpty('netamt');

        $validator
            ->decimal('vatamt')
            ->allowEmpty('vatamt');

        $validator
            ->decimal('totalamt')
            ->requirePresence('totalamt', 'create')
            ->notEmpty('totalamt');

        $validator
            ->scalar('description')
            ->allowEmpty('description');

        $validator
            ->uuid('createdby')
            ->requirePresence('createdby', 'create')
            ->notEmpty('createdby');

        $validator
            ->uuid('modifiedby')
            ->allowEmpty('modifiedby');

        $validator
            ->integer('qty')
            ->allowEmpty('qty');

        $validator
            ->date('orderdate')
            ->allowEmpty('orderdate');

        $validator
            ->decimal('order_price')
            ->allowEmpty('order_price');

        $validator
            ->scalar('order_status')
            ->maxLength('order_status', 45)
            ->allowEmpty('order_status');

        $validator
            ->scalar('order_history')
            ->allowEmpty('order_history');

        $validator
            ->scalar('order_ispaid')
            ->allowEmpty('order_ispaid');

        $validator
            ->dateTime('order_paiddate')
            ->allowEmpty('order_paiddate');

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
        $rules->add($rules->existsIn(['order_id'], 'Orders'));
        $rules->add($rules->existsIn(['product_id'], 'Products'));
        $rules->add($rules->existsIn(['image_id'], 'Images'));
        $rules->add($rules->existsIn(['bpartner_id'], 'Bpartners'));

        return $rules;
    }
}
