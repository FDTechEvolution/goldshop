<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Bpartners Model
 *
 * @property \App\Model\Table\OrgsTable|\Cake\ORM\Association\BelongsTo $Orgs
 * @property \App\Model\Table\BranchesTable|\Cake\ORM\Association\BelongsTo $Branches
 * @property \App\Model\Table\AddressesTable|\Cake\ORM\Association\BelongsTo $Addresses
 * @property \App\Model\Table\InvoicesTable|\Cake\ORM\Association\HasMany $Invoices
 * @property \App\Model\Table\OrderLinesTable|\Cake\ORM\Association\HasMany $OrderLines
 * @property \App\Model\Table\OrdersTable|\Cake\ORM\Association\HasMany $Orders
 * @property \App\Model\Table\PawnsTable|\Cake\ORM\Association\HasMany $Pawns
 * @property \App\Model\Table\PaymentsTable|\Cake\ORM\Association\HasMany $Payments
 * @property \App\Model\Table\SavingAccountsTable|\Cake\ORM\Association\HasMany $SavingAccounts
 *
 * @method \App\Model\Entity\Bpartner get($primaryKey, $options = [])
 * @method \App\Model\Entity\Bpartner newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Bpartner[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Bpartner|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Bpartner patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Bpartner[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Bpartner findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class BpartnersTable extends Table {

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config) {
        parent::initialize($config);

        $this->setTable('bpartners');
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
        $this->belongsTo('Addresses', [
            'foreignKey' => 'address_id'
        ]);
        $this->hasMany('Invoices', [
            'foreignKey' => 'bpartner_id'
        ]);
        $this->hasMany('OrderLines', [
            'foreignKey' => 'bpartner_id'
        ]);
        $this->hasMany('Orders', [
            'foreignKey' => 'bpartner_id'
        ]);
        $this->hasMany('Pawns', [
            'foreignKey' => 'bpartner_id'
        ]);
        $this->hasMany('Payments', [
            'foreignKey' => 'bpartner_id'
        ]);
        $this->hasMany('SavingAccounts', [
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
    public function validationDefault(Validator $validator) {
        $validator
                ->uuid('id')
                ->allowEmpty('id', 'create');

        $validator
                ->scalar('code')
                ->maxLength('code', 45)
                ->allowEmpty('code');

        $validator
                ->scalar('name')
                ->maxLength('name', 255)
                ->allowEmpty('name');

        $validator
                ->scalar('title')
                ->maxLength('title', 50)
                ->allowEmpty('title');

        $validator
                ->scalar('firstname')
                ->maxLength('firstname', 100)
                ->allowEmpty('firstname');

        $validator
                ->scalar('lastname')
                ->maxLength('lastname', 100)
                ->allowEmpty('lastname');

        $validator
                ->scalar('iscustomer')
                ->requirePresence('iscustomer', 'create')
                ->notEmpty('iscustomer');

        $validator
                ->scalar('isactive')
                ->requirePresence('isactive', 'create')
                ->notEmpty('isactive');

        $validator
                ->scalar('taxid')
                ->maxLength('taxid', 13)
                ->allowEmpty('taxid');

        $validator
                ->date('birthday')
                ->allowEmpty('birthday');

        $validator
                ->scalar('religion')
                ->maxLength('religion', 50)
                ->allowEmpty('religion');

        $validator
                ->uuid('createdby')
                ->requirePresence('createdby', 'create')
                ->notEmpty('createdby');

        $validator
                ->dateTime('midified')
                ->allowEmpty('midified');

        $validator
                ->uuid('modifiedby')
                ->allowEmpty('modifiedby');

        $validator
                ->scalar('description')
                ->allowEmpty('description');

        $validator
                ->scalar('phone')
                ->maxLength('phone', 50)
                ->allowEmpty('phone');

        $validator
                ->scalar('mobile')
                ->maxLength('mobile', 50)
                ->allowEmpty('mobile');

        $validator
                ->email('email')
                ->allowEmpty('email');

        $validator
                ->scalar('iscompany')
                ->allowEmpty('iscompany');

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
        //$rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['org_id'], 'Orgs'));
        $rules->add($rules->existsIn(['branch_id'], 'Branches'));
        $rules->add($rules->existsIn(['address_id'], 'Addresses'));

        return $rules;
    }

}
