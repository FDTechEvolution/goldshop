<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * GoodsTransactions Model
 *
 * @property \App\Model\Table\BranchesTable|\Cake\ORM\Association\BelongsTo $Branches
 * @property \App\Model\Table\GoodsLinesTable|\Cake\ORM\Association\HasMany $GoodsLines
 *
 * @method \App\Model\Entity\GoodsTransaction get($primaryKey, $options = [])
 * @method \App\Model\Entity\GoodsTransaction newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\GoodsTransaction[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\GoodsTransaction|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\GoodsTransaction patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\GoodsTransaction[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\GoodsTransaction findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class GoodsTransactionsTable extends Table
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

        $this->setTable('goods_transactions');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Branches', [
            'foreignKey' => 'branch_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('GoodsLines', [
            'foreignKey' => 'goods_transaction_id'
        ]);
        
        $this->belongsTo('UserCreated', [
            'className' => 'Users',
            'foreignKey' => 'createdby',
            'propertyName'=>'UserCreated'
        ]);
        
        $this->belongsTo('UserModified', [
            'className' => 'Users',
            'foreignKey' => 'modifiedby',
            'propertyName'=>'UserModified'
        ]);
        $this->belongsTo('ToWarehouse', [
            'className' => 'Warehouses',
            'foreignKey' => 'to_warehouse',
            'propertyName'=>'ToWarehouse'
        ]);
        
        $this->belongsTo('FromWarehouse', [
            'className' => 'Warehouses',
            'foreignKey' => 'from_warehouse',
            'propertyName'=>'FromWarehouse'
        ]);
        
        $this->belongsTo('Seller', [
            'className' => 'Users',
            'foreignKey' => 'seller',
            'propertyName' => 'Seller'
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
            ->scalar('docno')
            ->maxLength('docno', 50)
            ->requirePresence('docno', 'create')
            ->notEmpty('docno');

        $validator
            ->date('docdate')
            ->requirePresence('docdate', 'create')
            ->notEmpty('docdate');

        $validator
            ->scalar('type')
            ->maxLength('type', 45)
            ->requirePresence('type', 'create')
            ->notEmpty('type');

        $validator
            ->scalar('description')
            ->maxLength('description', 255)
            ->allowEmpty('description');

        $validator
            ->scalar('status')
            ->maxLength('status', 45)
            ->requirePresence('status', 'create')
            ->notEmpty('status');

        $validator
            ->uuid('createdby')
            ->requirePresence('createdby', 'create')
            ->notEmpty('createdby');

        $validator
            ->uuid('modifiedby')
            ->allowEmpty('modifiedby');

        $validator
            ->uuid('from_warehouse')
            ->allowEmpty('from_warehouse');

        $validator
            ->uuid('to_warehouse')
            ->allowEmpty('to_warehouse');

        $validator
            ->uuid('seller')
            ->allowEmpty('seller');

        $validator
            ->scalar('isdispose')
            ->allowEmpty('isdispose');

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
        $rules->add($rules->existsIn(['branch_id'], 'Branches'));

        return $rules;
    }
}
