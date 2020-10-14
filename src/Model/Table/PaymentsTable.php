<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Payments Model
 *
 * @property \App\Model\Table\BankAccountsTable|\Cake\ORM\Association\BelongsTo $BankAccounts
 * @property \App\Model\Table\OrgsTable|\Cake\ORM\Association\BelongsTo $Orgs
 * @property \App\Model\Table\BranchesTable|\Cake\ORM\Association\BelongsTo $Branches
 * @property \App\Model\Table\BpartnersTable|\Cake\ORM\Association\BelongsTo $Bpartners
 * @property \App\Model\Table\WarehousesTable|\Cake\ORM\Association\BelongsTo $Warehouses
 * @property \App\Model\Table\PaymentLinesTable|\Cake\ORM\Association\HasMany $PaymentLines
 * @property \App\Model\Table\PaymentMethodLinesTable|\Cake\ORM\Association\HasMany $PaymentMethodLines
 *
 * @method \App\Model\Entity\Payment get($primaryKey, $options = [])
 * @method \App\Model\Entity\Payment newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Payment[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Payment|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Payment patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Payment[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Payment findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PaymentsTable extends Table {

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config) {
        parent::initialize($config);

        $this->setTable('payments');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('BankAccounts', [
            'foreignKey' => 'bank_account_id'
        ]);
        $this->belongsTo('Orgs', [
            'foreignKey' => 'org_id'
        ]);
        $this->belongsTo('Branches', [
            'foreignKey' => 'branch_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Bpartners', [
            'foreignKey' => 'bpartner_id'
        ]);
        $this->belongsTo('Warehouses', [
            'foreignKey' => 'warehouse_id'
        ]);
        $this->hasMany('PaymentLines', [
            'foreignKey' => 'payment_id',
            'dependent' => true,
            'cascadeCallbacks' => true,
        ]);
        $this->hasMany('PaymentMethodLines', [
            'foreignKey' => 'payment_id',
            'dependent' => true,
            'cascadeCallbacks' => true,
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

        $this->belongsTo('Seller', [
            'className' => 'Users',
            'foreignKey' => 'seller',
            'propertyName' => 'Seller'
        ]);

        $this->belongsTo('PaymentRef', [
            'className' => 'Payments',
            'foreignKey' => 'payment_ref',
            'propertyName' => 'PaymentRef'
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
                ->date('paymentdate')
                ->requirePresence('paymentdate', 'create')
                ->notEmpty('paymentdate');

        $validator
                ->scalar('docno')
                ->maxLength('docno', 50)
                ->requirePresence('docno', 'create')
                ->notEmpty('docno');

        $validator
                ->scalar('payment_method')
                ->maxLength('payment_method', 50)
                ->allowEmpty('payment_method');

        $validator
                ->scalar('isactive')
                ->allowEmpty('isactive');

        $validator
                ->scalar('isreceipt')
                ->requirePresence('isreceipt', 'create')
                ->notEmpty('isreceipt');

        $validator
                ->scalar('ispartial')
                ->requirePresence('ispartial', 'create')
                ->notEmpty('ispartial');

        $validator
                ->scalar('isprocessed')
                ->allowEmpty('isprocessed');

        $validator
                ->decimal('netamt')
                ->requirePresence('netamt', 'create')
                ->notEmpty('netamt');

        $validator
                ->decimal('vatamt')
                ->requirePresence('vatamt', 'create')
                ->notEmpty('vatamt');

        $validator
                ->decimal('totalamt')
                ->requirePresence('totalamt', 'create')
                ->notEmpty('totalamt');

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
                ->uuid('seller')
                ->allowEmpty('seller');

        $validator
                ->scalar('type')
                ->maxLength('type', 45)
                ->allowEmpty('type');

        $validator
                ->decimal('amount')
                ->requirePresence('amount', 'create')
                ->notEmpty('amount');

        $validator
                ->scalar('docstatus')
                ->maxLength('docstatus', 45)
                ->requirePresence('docstatus', 'create')
                ->notEmpty('docstatus');

        $validator
                ->decimal('outstandingamt')
                ->allowEmpty('outstandingamt');

        $validator
                ->decimal('discount')
                ->allowEmpty('discount');

        $validator
                ->decimal('usesavingamt')
                ->allowEmpty('usesavingamt');

        $validator
                ->scalar('isexchange')
                ->allowEmpty('isexchange');

        $validator
                ->uuid('payment_ref')
                ->allowEmpty('payment_ref');

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
        $rules->add($rules->existsIn(['bank_account_id'], 'BankAccounts'));
        $rules->add($rules->existsIn(['org_id'], 'Orgs'));
        $rules->add($rules->existsIn(['branch_id'], 'Branches'));
        $rules->add($rules->existsIn(['bpartner_id'], 'Bpartners'));
        $rules->add($rules->existsIn(['warehouse_id'], 'Warehouses'));

        return $rules;
    }

}
