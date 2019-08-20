<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Smartcards Model
 *
 * @method \App\Model\Entity\Smartcard get($primaryKey, $options = [])
 * @method \App\Model\Entity\Smartcard newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Smartcard[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Smartcard|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Smartcard patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Smartcard[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Smartcard findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SmartcardsTable extends Table
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

        $this->setTable('smartcards');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
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
            ->scalar('ip')
            ->maxLength('ip', 45)
            ->requirePresence('ip', 'create')
            ->notEmpty('ip');

        $validator
            ->scalar('title')
            ->maxLength('title', 45)
            ->allowEmpty('title');

        $validator
            ->scalar('firstname')
            ->maxLength('firstname', 100)
            ->allowEmpty('firstname');

        $validator
            ->scalar('lastname')
            ->maxLength('lastname', 100)
            ->allowEmpty('lastname');

        $validator
            ->scalar('gender')
            ->maxLength('gender', 45)
            ->allowEmpty('gender');

        $validator
            ->scalar('cardno')
            ->maxLength('cardno', 45)
            ->allowEmpty('cardno');

        $validator
            ->scalar('full_address')
            ->maxLength('full_address', 100)
            ->allowEmpty('full_address');

        $validator
            ->scalar('description')
            ->maxLength('description', 255)
            ->allowEmpty('description');

        $validator
            ->scalar('houseno')
            ->maxLength('houseno', 45)
            ->allowEmpty('houseno');

        $validator
            ->scalar('moo')
            ->maxLength('moo', 45)
            ->allowEmpty('moo');

        $validator
            ->scalar('sub_district')
            ->maxLength('sub_district', 100)
            ->allowEmpty('sub_district');

        $validator
            ->scalar('district')
            ->maxLength('district', 100)
            ->allowEmpty('district');

        $validator
            ->scalar('province')
            ->maxLength('province', 100)
            ->allowEmpty('province');

        $validator
            ->scalar('birthday')
            ->maxLength('birthday', 45)
            ->allowEmpty('birthday');

        $validator
            ->scalar('address_line')
            ->maxLength('address_line', 255)
            ->allowEmpty('address_line');

        return $validator;
    }
}
