<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SavingTransactions Model
 *
 * @property \App\Model\Table\SavingAccountsTable|\Cake\ORM\Association\BelongsTo $SavingAccounts
 * @property \App\Model\Table\OrgsTable|\Cake\ORM\Association\BelongsTo $Orgs
 * @property \App\Model\Table\BranchesTable|\Cake\ORM\Association\BelongsTo $Branches
 * @property \App\Model\Table\BankAccountsTable|\Cake\ORM\Association\BelongsTo $BankAccounts
 * @property \App\Model\Table\InvoicesTable|\Cake\ORM\Association\BelongsTo $Invoices
 *
 * @method \App\Model\Entity\SavingTransaction get($primaryKey, $options = [])
 * @method \App\Model\Entity\SavingTransaction newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\SavingTransaction[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SavingTransaction|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SavingTransaction patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SavingTransaction[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\SavingTransaction findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SavingTransactionsTable extends Table
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

        $this->setTable('saving_transactions');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('SavingAccounts', [
            'foreignKey' => 'saving_account_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Orgs', [
            'foreignKey' => 'org_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Branches', [
            'foreignKey' => 'branch_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('BankAccounts', [
            'foreignKey' => 'bank_account_id'
        ]);
        $this->belongsTo('Invoices', [
            'foreignKey' => 'invoice_id'
        ]);
        
        $this->belongsTo('Seller', [
            'className' => 'Users',
            'foreignKey' => 'seller',
            'propertyName' => 'Seller'
        ]);
         $this->belongsTo('SavingAccounts', [
            'foreignKey' => 'saving_account_id',
            'joinType' => 'INNER'
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
            ->date('docdate')
            ->requirePresence('docdate', 'create')
            ->notEmpty('docdate');

        $validator
            ->scalar('docno')
            ->maxLength('docno', 50)
            ->requirePresence('docno', 'create')
            ->notEmpty('docno');

        $validator
            ->decimal('amount')
            ->requirePresence('amount', 'create')
            ->notEmpty('amount');

        $validator
            ->scalar('isdeposit')
            ->requirePresence('isdeposit', 'create')
            ->notEmpty('isdeposit');

        $validator
            ->scalar('isactive')
            ->allowEmpty('isactive');

        $validator
            ->scalar('docstatus')
            ->maxLength('docstatus', 50)
            ->requirePresence('docstatus', 'create')
            ->notEmpty('docstatus');

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
            ->requirePresence('seller', 'create')
            ->notEmpty('seller');

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
        $rules->add($rules->existsIn(['saving_account_id'], 'SavingAccounts'));
        $rules->add($rules->existsIn(['org_id'], 'Orgs'));
        $rules->add($rules->existsIn(['branch_id'], 'Branches'));
        $rules->add($rules->existsIn(['bank_account_id'], 'BankAccounts'));
        $rules->add($rules->existsIn(['invoice_id'], 'Invoices'));

        return $rules;
    }
}
