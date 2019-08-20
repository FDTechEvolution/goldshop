<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * BankAccounts Model
 *
 * @property \App\Model\Table\BanksTable|\Cake\ORM\Association\BelongsTo $Banks
 * @property \App\Model\Table\OrgsTable|\Cake\ORM\Association\BelongsTo $Orgs
 * @property \App\Model\Table\BranchesTable|\Cake\ORM\Association\BelongsTo $Branches
 * @property \App\Model\Table\PawnsTable|\Cake\ORM\Association\HasMany $Pawns
 * @property \App\Model\Table\PaymentsTable|\Cake\ORM\Association\HasMany $Payments
 * @property \App\Model\Table\SavingTransactionsTable|\Cake\ORM\Association\HasMany $SavingTransactions
 *
 * @method \App\Model\Entity\BankAccount get($primaryKey, $options = [])
 * @method \App\Model\Entity\BankAccount newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\BankAccount[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\BankAccount|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\BankAccount patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\BankAccount[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\BankAccount findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class BankAccountsTable extends Table
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

        $this->setTable('bank_accounts');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Banks', [
            'foreignKey' => 'bank_id'
        ]);
        $this->belongsTo('Orgs', [
            'foreignKey' => 'org_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Branches', [
            'foreignKey' => 'branch_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Pawns', [
            'foreignKey' => 'bank_account_id'
        ]);
        $this->hasMany('Payments', [
            'foreignKey' => 'bank_account_id'
        ]);
        $this->hasMany('SavingTransactions', [
            'foreignKey' => 'bank_account_id'
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
            ->decimal('total_balance')
            ->requirePresence('total_balance', 'create')
            ->notEmpty('total_balance');

        $validator
            ->scalar('account_name')
            ->maxLength('account_name', 100)
            ->requirePresence('account_name', 'create')
            ->notEmpty('account_name');

        $validator
            ->scalar('account_type')
            ->maxLength('account_type', 100)
            ->allowEmpty('account_type');

        $validator
            ->scalar('accountno')
            ->maxLength('accountno', 10)
            ->allowEmpty('accountno');

        $validator
            ->scalar('bank_office')
            ->maxLength('bank_office', 100)
            ->allowEmpty('bank_office');

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
            ->scalar('type')
            ->maxLength('type', 50)
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
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['bank_id'], 'Banks'));
        $rules->add($rules->existsIn(['org_id'], 'Orgs'));
        $rules->add($rules->existsIn(['branch_id'], 'Branches'));

        return $rules;
    }
}
