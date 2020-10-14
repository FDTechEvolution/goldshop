<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * BankAccountTransactions Model
 *
 * @property \App\Model\Table\PaymentsTable|\Cake\ORM\Association\BelongsTo $Payments
 * @property \App\Model\Table\BankAccountsTable|\Cake\ORM\Association\BelongsTo $BankAccounts
 * @property \App\Model\Table\PaymentMethodLinesTable|\Cake\ORM\Association\BelongsTo $PaymentMethodLines
 *
 * @method \App\Model\Entity\BankAccountTransaction get($primaryKey, $options = [])
 * @method \App\Model\Entity\BankAccountTransaction newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\BankAccountTransaction[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\BankAccountTransaction|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\BankAccountTransaction patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\BankAccountTransaction[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\BankAccountTransaction findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class BankAccountTransactionsTable extends Table
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

        $this->setTable('bank_account_transactions');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Payments', [
            'foreignKey' => 'payment_id'
        ]);
        $this->belongsTo('BankAccounts', [
            'foreignKey' => 'bank_account_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('PaymentMethodLines', [
            'foreignKey' => 'payment_method_line_id',
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
            ->scalar('type')
            ->maxLength('type', 45)
            ->requirePresence('type', 'create')
            ->notEmpty('type');

        $validator
            ->decimal('amount')
            ->requirePresence('amount', 'create')
            ->notEmpty('amount');

        $validator
            ->uuid('createdby')
            ->allowEmpty('createdby');

        $validator
            ->uuid('modifiedby')
            ->allowEmpty('modifiedby');

        $validator
            ->scalar('description')
            ->maxLength('description', 255)
            ->allowEmpty('description');

        $validator
            ->decimal('debit')
            ->requirePresence('debit', 'create')
            ->notEmpty('debit');

        $validator
            ->decimal('credit')
            ->requirePresence('credit', 'create')
            ->notEmpty('credit');

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
        $rules->add($rules->existsIn(['payment_id'], 'Payments'));
        $rules->add($rules->existsIn(['bank_account_id'], 'BankAccounts'));
        $rules->add($rules->existsIn(['payment_method_line_id'], 'PaymentMethodLines'));

        return $rules;
    }
}
