<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PawnTransactions Model
 *
 * @property \App\Model\Table\PawnsTable|\Cake\ORM\Association\BelongsTo $Pawns
 *
 * @method \App\Model\Entity\PawnTransaction get($primaryKey, $options = [])
 * @method \App\Model\Entity\PawnTransaction newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PawnTransaction[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PawnTransaction|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PawnTransaction patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PawnTransaction[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PawnTransaction findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PawnTransactionsTable extends Table
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

        $this->setTable('pawn_transactions');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Pawns', [
            'foreignKey' => 'pawn_id',
            'joinType' => 'INNER'
        ]);
        
        $this->belongsTo('Seller', [
            'className' => 'Users',
            'foreignKey' => 'seller',
            'propertyName' => 'Seller'
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
    public function validationDefault(Validator $validator)
    {
        $validator
            ->uuid('id')
            ->allowEmpty('id', 'create');

        $validator
            ->date('transaction_date')
            ->requirePresence('transaction_date', 'create')
            ->notEmpty('transaction_date');

        $validator
            ->scalar('type')
            ->maxLength('type', 100)
            ->allowEmpty('type');

        $validator
            ->scalar('description')
            ->allowEmpty('description');

        $validator
            ->decimal('amount')
            ->allowEmpty('amount');

        $validator
            ->uuid('seller')
            ->allowEmpty('seller');

        $validator
            ->uuid('createdby')
            ->allowEmpty('createdby');

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
        $rules->add($rules->existsIn(['pawn_id'], 'Pawns'));

        return $rules;
    }
}
