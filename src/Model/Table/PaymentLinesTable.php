<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PaymentLines Model
 *
 * @property \App\Model\Table\PaymentsTable|\Cake\ORM\Association\BelongsTo $Payments
 * @property \App\Model\Table\InvoicesTable|\Cake\ORM\Association\BelongsTo $Invoices
 * @property \App\Model\Table\IncomeTypesTable|\Cake\ORM\Association\BelongsTo $IncomeTypes
 * @property \App\Model\Table\OrdersTable|\Cake\ORM\Association\BelongsTo $Orders
 * @property \App\Model\Table\PawnsTable|\Cake\ORM\Association\BelongsTo $Pawns
 * @property \App\Model\Table\SavingAccountsTable|\Cake\ORM\Association\BelongsTo $SavingAccounts
 * @property \App\Model\Table\ProductsTable|\Cake\ORM\Association\BelongsTo $Products
 *
 * @method \App\Model\Entity\PaymentLine get($primaryKey, $options = [])
 * @method \App\Model\Entity\PaymentLine newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PaymentLine[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PaymentLine|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PaymentLine patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PaymentLine[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PaymentLine findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PaymentLinesTable extends Table
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

        $this->setTable('payment_lines');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Payments', [
            'foreignKey' => 'payment_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Invoices', [
            'foreignKey' => 'invoice_id'
        ]);
        $this->belongsTo('IncomeTypes', [
            'foreignKey' => 'income_type_id'
        ]);
        $this->belongsTo('Orders', [
            'foreignKey' => 'order_id'
        ]);
        $this->belongsTo('Pawns', [
            'foreignKey' => 'pawn_id'
        ]);
        $this->belongsTo('SavingAccounts', [
            'foreignKey' => 'saving_account_id'
        ]);
        $this->belongsTo('Products', [
            'foreignKey' => 'product_id'
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
            ->decimal('amount')
            ->allowEmpty('amount');

        $validator
            ->decimal('qty')
            ->allowEmpty('qty');

        $validator
            ->decimal('totalamount')
            ->allowEmpty('totalamount');

        $validator
            ->scalar('isexchange')
            ->allowEmpty('isexchange');

        $validator
            ->scalar('isdispose')
            ->allowEmpty('isdispose');

        $validator
            ->scalar('isoverprice')
            ->allowEmpty('isoverprice');

        $validator
            ->decimal('exchangamt')
            ->allowEmpty('exchangamt');

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
        $rules->add($rules->existsIn(['invoice_id'], 'Invoices'));
        $rules->add($rules->existsIn(['income_type_id'], 'IncomeTypes'));
        $rules->add($rules->existsIn(['order_id'], 'Orders'));
        $rules->add($rules->existsIn(['pawn_id'], 'Pawns'));
        $rules->add($rules->existsIn(['saving_account_id'], 'SavingAccounts'));
        $rules->add($rules->existsIn(['product_id'], 'Products'));

        return $rules;
    }
}
