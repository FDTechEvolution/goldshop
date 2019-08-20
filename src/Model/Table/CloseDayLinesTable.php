<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CloseDayLines Model
 *
 * @property \App\Model\Table\CloseDaysTable|\Cake\ORM\Association\BelongsTo $CloseDays
 *
 * @method \App\Model\Entity\CloseDayLine get($primaryKey, $options = [])
 * @method \App\Model\Entity\CloseDayLine newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CloseDayLine[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CloseDayLine|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CloseDayLine patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CloseDayLine[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CloseDayLine findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CloseDayLinesTable extends Table
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

        $this->setTable('close_day_lines');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('CloseDays', [
            'foreignKey' => 'close_day_id'
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
            ->scalar('acc_name')
            ->maxLength('acc_name', 100)
            ->allowEmpty('acc_name');

        $validator
            ->decimal('debit_amt')
            ->allowEmpty('debit_amt');

        $validator
            ->decimal('credit_amt')
            ->allowEmpty('credit_amt');

        $validator
            ->scalar('description')
            ->maxLength('description', 255)
            ->allowEmpty('description');

        $validator
            ->scalar('payment_method')
            ->maxLength('payment_method', 100)
            ->allowEmpty('payment_method');

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
        $rules->add($rules->existsIn(['close_day_id'], 'CloseDays'));

        return $rules;
    }
}
