<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Pawns Model
 *
 * @property \App\Model\Table\OrgsTable|\Cake\ORM\Association\BelongsTo $Orgs
 * @property \App\Model\Table\BranchesTable|\Cake\ORM\Association\BelongsTo $Branches
 * @property \App\Model\Table\BpartnersTable|\Cake\ORM\Association\BelongsTo $Bpartners
 * @property \App\Model\Table\BankAccountsTable|\Cake\ORM\Association\BelongsTo $BankAccounts
 * @property \App\Model\Table\WarehousesTable|\Cake\ORM\Association\BelongsTo $Warehouses
 * @property \App\Model\Table\PawnLinesTable|\Cake\ORM\Association\HasMany $PawnLines
 * @property \App\Model\Table\PawnTransactionsTable|\Cake\ORM\Association\HasMany $PawnTransactions
 * @property \App\Model\Table\PaymentLinesTable|\Cake\ORM\Association\HasMany $PaymentLines
 *
 * @method \App\Model\Entity\Pawn get($primaryKey, $options = [])
 * @method \App\Model\Entity\Pawn newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Pawn[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Pawn|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Pawn patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Pawn[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Pawn findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PawnsTable extends Table
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

        $this->setTable('pawns');
        $this->setDisplayField('id');
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
        $this->belongsTo('Bpartners', [
            'foreignKey' => 'bpartner_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('BankAccounts', [
            'foreignKey' => 'bank_account_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Warehouses', [
            'foreignKey' => 'warehouse_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('PawnLines', [
            'foreignKey' => 'pawn_id'
        ]);
        $this->hasMany('PawnTransactions', [
            'foreignKey' => 'pawn_id'
        ]);
        $this->hasMany('PaymentLines', [
            'foreignKey' => 'pawn_id'
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
            ->maxLength('docno', 100)
            ->requirePresence('docno', 'create')
            ->notEmpty('docno');

        $validator
            ->date('startdate')
            ->allowEmpty('startdate');

        $validator
            ->date('expiredate')
            ->requirePresence('expiredate', 'create')
            ->notEmpty('expiredate');

        $validator
            ->date('returndate')
            ->allowEmpty('returndate');

        $validator
            ->scalar('status')
            ->maxLength('status', 45)
            ->requirePresence('status', 'create')
            ->notEmpty('status');

        $validator
            ->scalar('description')
            ->maxLength('description', 255)
            ->allowEmpty('description');

        $validator
            ->uuid('cratedby')
            ->requirePresence('cratedby', 'create')
            ->notEmpty('cratedby');

        $validator
            ->uuid('modifiedby')
            ->allowEmpty('modifiedby');

        $validator
            ->decimal('totalmoney')
            ->requirePresence('totalmoney', 'create')
            ->notEmpty('totalmoney');

        $validator
            ->decimal('rate')
            ->requirePresence('rate', 'create')
            ->notEmpty('rate');

        $validator
            ->scalar('type')
            ->maxLength('type', 5)
            ->requirePresence('type', 'create')
            ->notEmpty('type');

        $validator
            ->decimal('interrestrate')
            ->requirePresence('interrestrate', 'create')
            ->notEmpty('interrestrate');

        $validator
            ->scalar('log_history')
            ->allowEmpty('log_history');

        $validator
            ->uuid('seller')
            ->requirePresence('seller', 'create')
            ->notEmpty('seller');

        $validator
            ->scalar('isoverprice')
            ->allowEmpty('isoverprice');

        $validator
            ->scalar('isactive')
            ->allowEmpty('isactive');

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
        $rules->add($rules->existsIn(['branch_id'], 'Branches'));
        $rules->add($rules->existsIn(['bpartner_id'], 'Bpartners'));
        $rules->add($rules->existsIn(['bank_account_id'], 'BankAccounts'));
        $rules->add($rules->existsIn(['warehouse_id'], 'Warehouses'));

        return $rules;
    }
}
