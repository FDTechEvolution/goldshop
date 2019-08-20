<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * GoldPriceLines Model
 *
 * @property \App\Model\Table\GoldPricesTable|\Cake\ORM\Association\BelongsTo $GoldPrices
 * @property \App\Model\Table\SdWeightsTable|\Cake\ORM\Association\BelongsTo $SdWeights
 *
 * @method \App\Model\Entity\GoldPriceLine get($primaryKey, $options = [])
 * @method \App\Model\Entity\GoldPriceLine newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\GoldPriceLine[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\GoldPriceLine|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\GoldPriceLine patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\GoldPriceLine[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\GoldPriceLine findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class GoldPriceLinesTable extends Table
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

        $this->setTable('gold_price_lines');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('GoldPrices', [
            'foreignKey' => 'gold_price_id',
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
            ->decimal('sales_price')
            ->requirePresence('sales_price', 'create')
            ->notEmpty('sales_price');

        $validator
            ->decimal('purchase_price')
            ->requirePresence('purchase_price', 'create')
            ->notEmpty('purchase_price');

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
        $rules->add($rules->existsIn(['gold_price_id'], 'GoldPrices'));
        $rules->add($rules->existsIn(['sd_weight_id'], 'SdWeights'));

        return $rules;
    }
}
