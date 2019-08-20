<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Branches Model
 *
 * @property \App\Model\Table\OrgsTable|\Cake\ORM\Association\BelongsTo $Orgs
 * @property \App\Model\Table\AddressesTable|\Cake\ORM\Association\BelongsTo $Addresses
 * @property \App\Model\Table\BankAccountsTable|\Cake\ORM\Association\HasMany $BankAccounts
 * @property \App\Model\Table\BpartnersTable|\Cake\ORM\Association\HasMany $Bpartners
 * @property |\Cake\ORM\Association\HasMany $GoodsTransactions
 * @property \App\Model\Table\InvoicesTable|\Cake\ORM\Association\HasMany $Invoices
 * @property \App\Model\Table\OrdersTable|\Cake\ORM\Association\HasMany $Orders
 * @property |\Cake\ORM\Association\HasMany $Pawns
 * @property \App\Model\Table\PaymentsTable|\Cake\ORM\Association\HasMany $Payments
 * @property \App\Model\Table\SavingAccountsTable|\Cake\ORM\Association\HasMany $SavingAccounts
 * @property \App\Model\Table\SavingTransactionsTable|\Cake\ORM\Association\HasMany $SavingTransactions
 * @property \App\Model\Table\SequentNumbersTable|\Cake\ORM\Association\HasMany $SequentNumbers
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\HasMany $Users
 * @property \App\Model\Table\WarehousesTable|\Cake\ORM\Association\HasMany $Warehouses
 *
 * @method \App\Model\Entity\Branch get($primaryKey, $options = [])
 * @method \App\Model\Entity\Branch newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Branch[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Branch|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Branch patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Branch[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Branch findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class BranchesTable extends Table
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

        $this->setTable('branches');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Orgs', [
            'foreignKey' => 'org_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Addresses', [
            'foreignKey' => 'address_id'
        ]);
        $this->hasMany('BankAccounts', [
            'foreignKey' => 'branch_id'
        ]);
        $this->hasMany('Bpartners', [
            'foreignKey' => 'branch_id'
        ]);
        $this->hasMany('GoodsTransactions', [
            'foreignKey' => 'branch_id'
        ]);
        $this->hasMany('Invoices', [
            'foreignKey' => 'branch_id'
        ]);
        $this->hasMany('Orders', [
            'foreignKey' => 'branch_id'
        ]);
        $this->hasMany('Pawns', [
            'foreignKey' => 'branch_id'
        ]);
        $this->hasMany('Payments', [
            'foreignKey' => 'branch_id'
        ]);
        $this->hasMany('SavingAccounts', [
            'foreignKey' => 'branch_id'
        ]);
        $this->hasMany('SavingTransactions', [
            'foreignKey' => 'branch_id'
        ]);
        $this->hasMany('SequentNumbers', [
            'foreignKey' => 'branch_id'
        ]);
        $this->hasMany('Users', [
            'foreignKey' => 'branch_id'
        ]);
        $this->hasMany('Warehouses', [
            'foreignKey' => 'branch_id'
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
            ->scalar('name')
            ->maxLength('name', 100)
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->scalar('code')
            ->maxLength('code', 50)
            ->allowEmpty('code');

        $validator
            ->scalar('isheadquarters')
            ->allowEmpty('isheadquarters');

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
        $rules->add($rules->existsIn(['org_id'], 'Orgs'));
        $rules->add($rules->existsIn(['address_id'], 'Addresses'));

        return $rules;
    }
}
