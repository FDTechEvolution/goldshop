<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * StorageBins Model
 *
 * @property \App\Model\Table\WarehousesTable|\Cake\ORM\Association\BelongsTo $Warehouses
 *
 * @method \App\Model\Entity\StorageBin get($primaryKey, $options = [])
 * @method \App\Model\Entity\StorageBin newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\StorageBin[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\StorageBin|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\StorageBin patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\StorageBin[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\StorageBin findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class StorageBinsTable extends Table
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

        $this->setTable('storage_bins');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Warehouses', [
            'foreignKey' => 'warehouse_id',
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
            ->scalar('name')
            ->maxLength('name', 50)
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->scalar('isdefault')
            ->requirePresence('isdefault', 'create')
            ->notEmpty('isdefault');

        $validator
            ->integer('seq')
            ->allowEmpty('seq');

        $validator
            ->scalar('description')
            ->maxLength('description', 255)
            ->allowEmpty('description');

        $validator
            ->scalar('isactive')
            ->allowEmpty('isactive');

        $validator
            ->uuid('createdby')
            ->requirePresence('createdby', 'create')
            ->notEmpty('createdby');

        $validator
            ->uuid('modifiedby')
            ->allowEmpty('modifiedby');

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
        $rules->add($rules->existsIn(['warehouse_id'], 'Warehouses'));

        return $rules;
    }
}
