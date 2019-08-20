<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SdWeights Model
 *
 * @property \App\Model\Table\CostLinesTable|\Cake\ORM\Association\HasMany $CostLines
 * @property \App\Model\Table\GoldPriceLinesTable|\Cake\ORM\Association\HasMany $GoldPriceLines
 * @property \App\Model\Table\WeightsTable|\Cake\ORM\Association\HasMany $Weights
 *
 * @method \App\Model\Entity\SdWeight get($primaryKey, $options = [])
 * @method \App\Model\Entity\SdWeight newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\SdWeight[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SdWeight|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SdWeight patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SdWeight[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\SdWeight findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SdWeightsTable extends Table
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

        $this->setTable('sd_weights');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('CostLines', [
            'foreignKey' => 'sd_weight_id'
        ]);
        $this->hasMany('GoldPriceLines', [
            'foreignKey' => 'sd_weight_id'
        ]);
        $this->hasMany('Weights', [
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
            ->scalar('name')
            ->maxLength('name', 100)
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->scalar('code')
            ->maxLength('code', 45)
            ->requirePresence('code', 'create')
            ->notEmpty('code');

        $validator
            ->integer('seq')
            ->allowEmpty('seq');

        $validator
            ->scalar('formula')
            ->maxLength('formula', 255)
            ->allowEmpty('formula');

        $validator
            ->scalar('isdisplay')
            ->allowEmpty('isdisplay');

        return $validator;
    }
}
