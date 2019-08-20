<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SequentNumbers Model
 *
 * @property \App\Model\Table\OrgsTable|\Cake\ORM\Association\BelongsTo $Orgs
 * @property \App\Model\Table\BranchesTable|\Cake\ORM\Association\BelongsTo $Branches
 *
 * @method \App\Model\Entity\SequentNumber get($primaryKey, $options = [])
 * @method \App\Model\Entity\SequentNumber newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\SequentNumber[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SequentNumber|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SequentNumber patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SequentNumber[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\SequentNumber findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SequentNumbersTable extends Table
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

        $this->setTable('sequent_numbers');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Orgs', [
            'foreignKey' => 'org_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Branches', [
            'foreignKey' => 'branch_id',
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
            ->scalar('doccode')
            ->maxLength('doccode', 3)
            ->requirePresence('doccode', 'create')
            ->notEmpty('doccode');

        $validator
            ->scalar('prefix')
            ->maxLength('prefix', 5)
            ->allowEmpty('prefix');

        $validator
            ->scalar('suffix')
            ->maxLength('suffix', 5)
            ->allowEmpty('suffix');

        $validator
            ->integer('start_no')
            ->requirePresence('start_no', 'create')
            ->notEmpty('start_no');

        $validator
            ->integer('current_no')
            ->allowEmpty('current_no');

        $validator
            ->integer('running_length')
            ->requirePresence('running_length', 'create')
            ->notEmpty('running_length');

        $validator
            ->scalar('current_sequent')
            ->maxLength('current_sequent', 100)
            ->allowEmpty('current_sequent');

        $validator
            ->scalar('description')
            ->maxLength('description', 255)
            ->allowEmpty('description');

        $validator
            ->uuid('createdby')
            ->allowEmpty('createdby');

        $validator
            ->uuid('modifiedby')
            ->allowEmpty('modifiedby');

        $validator
            ->scalar('isactive')
            ->allowEmpty('isactive');

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
        $rules->add($rules->existsIn(['org_id'], 'Orgs'));
        $rules->add($rules->existsIn(['branch_id'], 'Branches'));

        return $rules;
    }
}
