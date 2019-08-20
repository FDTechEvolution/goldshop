<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CostLines Model
 *
 * @property \App\Model\Table\CostsTable|\Cake\ORM\Association\BelongsTo $Costs
 * @property \App\Model\Table\SdWeightsTable|\Cake\ORM\Association\BelongsTo $SdWeights
 *
 * @method \App\Model\Entity\CostLine get($primaryKey, $options = [])
 * @method \App\Model\Entity\CostLine newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CostLine[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CostLine|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CostLine patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CostLine[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CostLine findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CostLinesTable extends Table
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

        $this->setTable('cost_lines');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Costs', [
            'foreignKey' => 'cost_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('SdWeights', [
            'foreignKey' => 'sd_weight_id'
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
            ->decimal('amount')
            ->requirePresence('amount', 'create')
            ->notEmpty('amount');

        $validator
            ->decimal('amount2')
            ->requirePresence('amount2', 'create')
            ->notEmpty('amount2');

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
        $rules->add($rules->existsIn(['cost_id'], 'Costs'));
        $rules->add($rules->existsIn(['sd_weight_id'], 'SdWeights'));

        return $rules;
    }
}
