<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \App\Model\Table\RolesTable|\Cake\ORM\Association\BelongsTo $Roles
 * @property |\Cake\ORM\Association\BelongsTo $Orgs
 * @property |\Cake\ORM\Association\BelongsTo $Branches
 * @property \App\Model\Table\SystemUsagesTable|\Cake\ORM\Association\HasMany $SystemUsages
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table {

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config) {
        parent::initialize($config);

        $this->setTable('users');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Roles', [
            'foreignKey' => 'role_id'
        ]);
        $this->belongsTo('Orgs', [
            'foreignKey' => 'org_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Branches', [
            'foreignKey' => 'branch_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('SystemUsages', [
            'foreignKey' => 'user_id'
        ]);
        
        $this->belongsTo('UserCreated', [
            'className' => 'Users',
            'foreignKey' => 'createdby',
            'propertyName' => 'UserCreated'
        ]);

        $this->belongsTo('UserModified', [
            'className' => 'Users',
            'foreignKey' => 'modifiedby',
            'propertyName' => 'UserModified'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator) {
        $validator
                ->uuid('id')
                ->allowEmpty('id', 'create');

        $validator
                ->scalar('title')
                ->maxLength('title', 10)
                ->requirePresence('title', 'create')
                ->notEmpty('title');

        $validator
                ->scalar('firstname')
                ->maxLength('firstname', 50)
                ->requirePresence('firstname', 'create')
                ->notEmpty('firstname');

        $validator
                ->scalar('lastname')
                ->maxLength('lastname', 50)
                ->requirePresence('lastname', 'create')
                ->notEmpty('lastname');

        $validator
                ->scalar('mobileno')
                ->maxLength('mobileno', 10)
                ->requirePresence('mobileno', 'create')
                ->notEmpty('mobileno');

        $validator
                ->scalar('cardno')
                ->maxLength('cardno', 13)
                ->requirePresence('cardno', 'create')
                ->notEmpty('cardno');

        $validator
                ->email('email')
                ->allowEmpty('email');

        $validator
                ->date('birthday')
                ->allowEmpty('birthday');

        $validator
                ->date('startdate')
                ->allowEmpty('startdate');

        $validator
                ->scalar('password')
                ->maxLength('password', 100)
                ->requirePresence('password', 'create')
                ->notEmpty('password');

        $validator
                ->scalar('username')
                ->maxLength('username', 50)
                ->requirePresence('username', 'create')
                ->notEmpty('username');

        $validator
                ->scalar('isactive')
                ->requirePresence('isactive', 'create')
                ->allowEmpty('isactive');

        $validator
                ->scalar('position')
                ->maxLength('position', 100)
                ->allowEmpty('position');

        $validator
                ->scalar('createdby')
                ->maxLength('createdby', 100)
                ->requirePresence('createdby', 'create')
                ->notEmpty('createdby');

        $validator
                ->scalar('modifiedby')
                ->maxLength('modifiedby', 100)
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
    public function buildRules(RulesChecker $rules) {
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->isUnique(['username']));
        $rules->add($rules->existsIn(['role_id'], 'Roles'));
        $rules->add($rules->existsIn(['org_id'], 'Orgs'));
        $rules->add($rules->existsIn(['branch_id'], 'Branches'));

        return $rules;
    }

}
