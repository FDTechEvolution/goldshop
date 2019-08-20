<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CloseDays Model
 *
 * @property \App\Model\Table\BranchesTable|\Cake\ORM\Association\BelongsTo $Branches
 * @property \App\Model\Table\CloseDayLinesTable|\Cake\ORM\Association\HasMany $CloseDayLines
 *
 * @method \App\Model\Entity\CloseDay get($primaryKey, $options = [])
 * @method \App\Model\Entity\CloseDay newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CloseDay[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CloseDay|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CloseDay patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CloseDay[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CloseDay findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CloseDaysTable extends Table
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

        $this->setTable('close_days');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Branches', [
            'foreignKey' => 'branch_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('CloseDayLines', [
            'foreignKey' => 'close_day_id'
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
            ->date('close_date')
            ->requirePresence('close_date', 'create')
            ->notEmpty('close_date');

        $validator
            ->decimal('actual_amt')
            ->allowEmpty('actual_amt');

        $validator
            ->decimal('actual_manual_amt')
            ->allowEmpty('actual_manual_amt');

        $validator
            ->decimal('receipt_amt')
            ->allowEmpty('receipt_amt');

        $validator
            ->decimal('paid_amt')
            ->allowEmpty('paid_amt');

        $validator
            ->decimal('paid_cash_amt')
            ->allowEmpty('paid_cash_amt');

        $validator
            ->decimal('receipt_cash_amt')
            ->allowEmpty('receipt_cash_amt');

        $validator
            ->decimal('transfer_receipt_amt')
            ->allowEmpty('transfer_receipt_amt');

        $validator
            ->decimal('transfer_paid_amt')
            ->allowEmpty('transfer_paid_amt');

        $validator
            ->uuid('createdby')
            ->allowEmpty('createdby');

        $validator
            ->uuid('modifiedby')
            ->allowEmpty('modifiedby');

        $validator
            ->scalar('status')
            ->maxLength('status', 45)
            ->allowEmpty('status');

        $validator
            ->scalar('description')
            ->allowEmpty('description');

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
