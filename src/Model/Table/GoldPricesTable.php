<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * GoldPrices Model
 *
 * @property \App\Model\Table\BranchesTable|\Cake\ORM\Association\BelongsTo $Branches
 * @property \App\Model\Table\MasterPricesTable|\Cake\ORM\Association\BelongsTo $MasterPrices
 * @property \App\Model\Table\GoldPriceLinesTable|\Cake\ORM\Association\HasMany $GoldPriceLines
 *
 * @method \App\Model\Entity\GoldPrice get($primaryKey, $options = [])
 * @method \App\Model\Entity\GoldPrice newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\GoldPrice[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\GoldPrice|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\GoldPrice patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\GoldPrice[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\GoldPrice findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class GoldPricesTable extends Table
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

        $this->setTable('gold_prices');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Branches', [
            'foreignKey' => 'branch_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('MasterPrices', [
            'foreignKey' => 'master_price_id'
        ]);
        $this->hasMany('GoldPriceLines', [
            'foreignKey' => 'gold_price_id'
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
            ->date('pricedate')
            ->requirePresence('pricedate', 'create')
            ->notEmpty('pricedate');

        $validator
            ->uuid('createdby')
            ->allowEmpty('createdby');

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
        $rules->add($rules->existsIn(['master_price_id'], 'MasterPrices'));

        return $rules;
    }
}
