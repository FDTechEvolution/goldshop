<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * IncomeTypes Model
 *
 * @property \App\Model\Table\PaymentLinesTable|\Cake\ORM\Association\HasMany $PaymentLines
 *
 * @method \App\Model\Entity\IncomeType get($primaryKey, $options = [])
 * @method \App\Model\Entity\IncomeType newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\IncomeType[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\IncomeType|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\IncomeType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\IncomeType[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\IncomeType findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class IncomeTypesTable extends Table
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

        $this->setTable('income_types');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('PaymentLines', [
            'foreignKey' => 'income_type_id'
        ]);
        $this->belongsTo('UserCreated', [
            'className' => 'Users',
            'foreignKey' => 'createdby',
            'propertyName' => 'UserCreated'
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
            ->scalar('isexpend')
            ->allowEmpty('isexpend');

        $validator
            ->scalar('isrevenue')
            ->allowEmpty('isrevenue');

        $validator
            ->scalar('isactive')
            ->allowEmpty('isactive');

        $validator
            ->uuid('createdby')
            ->allowEmpty('createdby');

        return $validator;
    }
}
