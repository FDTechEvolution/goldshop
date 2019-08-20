<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Warehouses Model
 *
 * @property \App\Model\Table\OrgsTable|\Cake\ORM\Association\BelongsTo $Orgs
 * @property \App\Model\Table\BranchesTable|\Cake\ORM\Association\BelongsTo $Branches
 * @property \App\Model\Table\InvoiceLinesTable|\Cake\ORM\Association\HasMany $InvoiceLines
 * @property \App\Model\Table\PawnsTable|\Cake\ORM\Association\HasMany $Pawns
 * @property \App\Model\Table\StorageBinsTable|\Cake\ORM\Association\HasMany $StorageBins
 * @property \App\Model\Table\WhProductsTable|\Cake\ORM\Association\HasMany $WhProducts
 *
 * @method \App\Model\Entity\Warehouse get($primaryKey, $options = [])
 * @method \App\Model\Entity\Warehouse newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Warehouse[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Warehouse|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Warehouse patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Warehouse[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Warehouse findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class WarehousesTable extends Table {

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config) {
        parent::initialize($config);

        $this->setTable('warehouses');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Orgs', [
            'foreignKey' => 'org_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Branches', [
            'foreignKey' => 'branch_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('InvoiceLines', [
            'foreignKey' => 'warehouse_id'
        ]);
        $this->hasMany('Pawns', [
            'foreignKey' => 'warehouse_id'
        ]);
        $this->hasMany('StorageBins', [
            'foreignKey' => 'warehouse_id'
        ]);
        $this->hasMany('WhProducts', [
            'foreignKey' => 'warehouse_id'
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
    public function validationDefault(Validator $validator) {
        $validator
                ->uuid('id')
                ->allowEmpty('id', 'create');

        $validator
                ->scalar('name')
                ->maxLength('name', 100)
                ->requirePresence('name', 'create')
                ->notEmpty('name');

        $validator
                ->scalar('isactive')
                ->allowEmpty('isactive');

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

        $validator
                ->scalar('ismain')
                ->allowEmpty('ismain');

        $validator
                ->scalar('issales')
                ->allowEmpty('issales');

        $validator
                ->scalar('ispurchase')
                ->allowEmpty('ispurchase');

        $validator
                ->scalar('ispawn')
                ->allowEmpty('ispawn');

        $validator
                ->scalar('islock')
                ->allowEmpty('islock');

        $validator
                ->scalar('type')
                ->maxLength('type', 45)
                ->allowEmpty('type');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules) {
        $rules->add($rules->existsIn(['org_id'], 'Orgs'));
        $rules->add($rules->existsIn(['branch_id'], 'Branches'));

        return $rules;
    }

}
