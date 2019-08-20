<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SerialNumbers Model
 *
 * @property \App\Model\Table\WhProductsTable|\Cake\ORM\Association\BelongsTo $WhProducts
 *
 * @method \App\Model\Entity\SerialNumber get($primaryKey, $options = [])
 * @method \App\Model\Entity\SerialNumber newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\SerialNumber[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SerialNumber|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SerialNumber patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SerialNumber[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\SerialNumber findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SerialNumbersTable extends Table
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

        $this->setTable('serial_numbers');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('WhProducts', [
            'foreignKey' => 'wh_product_id',
            'joinType' => 'INNER'
        ]);
        
        $this->belongsTo('UserCreated', [
            'className' => 'Users',
            'foreignKey' => 'createdby',
            'propertyName'=>'UserCreated'
        ]);
        
        $this->belongsTo('UserModified', [
            'className' => 'Users',
            'foreignKey' => 'modifiedby',
            'propertyName'=>'UserModified'
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
            ->scalar('code')
            ->maxLength('code', 50)
            ->requirePresence('code', 'create')
            ->notEmpty('code');

        $validator
            ->scalar('isprinted')
            ->requirePresence('isprinted', 'create')
            ->notEmpty('isprinted');

        $validator
            ->dateTime('printeddate')
            ->allowEmpty('printeddate');

        $validator
            ->scalar('issales')
            ->requirePresence('issales', 'create')
            ->notEmpty('issales');

        $validator
            ->scalar('isactive')
            ->requirePresence('isactive', 'create')
            ->notEmpty('isactive');

        $validator
            ->uuid('createdby')
            ->requirePresence('createdby', 'create')
            ->notEmpty('createdby');

        $validator
            ->uuid('modifiedby')
            ->allowEmpty('modifiedby');

        $validator
            ->scalar('description')
            ->maxLength('description', 255)
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
        $rules->add($rules->existsIn(['wh_product_id'], 'WhProducts'));

        return $rules;
    }
}
