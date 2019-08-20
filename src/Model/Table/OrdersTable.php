<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Orders Model
 *
 * @property \App\Model\Table\OrgsTable|\Cake\ORM\Association\BelongsTo $Orgs
 * @property \App\Model\Table\BranchesTable|\Cake\ORM\Association\BelongsTo $Branches
 * @property \App\Model\Table\BpartnersTable|\Cake\ORM\Association\BelongsTo $Bpartners
 * @property \App\Model\Table\InvoicesTable|\Cake\ORM\Association\HasMany $Invoices
 * @property \App\Model\Table\OrderLinesTable|\Cake\ORM\Association\HasMany $OrderLines
 * @property \App\Model\Table\PaymentLinesTable|\Cake\ORM\Association\HasMany $PaymentLines
 *
 * @method \App\Model\Entity\Order get($primaryKey, $options = [])
 * @method \App\Model\Entity\Order newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Order[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Order|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Order patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Order[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Order findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class OrdersTable extends Table
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

        $this->setTable('orders');
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
        $this->belongsTo('Bpartners', [
            'foreignKey' => 'bpartner_id'
        ]);
        $this->hasMany('Invoices', [
            'foreignKey' => 'order_id'
        ]);
        $this->hasMany('OrderLines', [
            'foreignKey' => 'order_id'
        ]);
        $this->hasMany('PaymentLines', [
            'foreignKey' => 'order_id'
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
            ->scalar('isactive')
            ->allowEmpty('isactive');

        $validator
            ->date('docdate')
            ->requirePresence('docdate', 'create')
            ->notEmpty('docdate');

        $validator
            ->date('duedate')
            ->allowEmpty('duedate');

        $validator
            ->scalar('docno')
            ->maxLength('docno', 45)
            ->requirePresence('docno', 'create')
            ->notEmpty('docno');

        $validator
            ->scalar('docstatus')
            ->maxLength('docstatus', 45)
            ->requirePresence('docstatus', 'create')
            ->notEmpty('docstatus');

        $validator
            ->decimal('netamt')
            ->requirePresence('netamt', 'create')
            ->notEmpty('netamt');

        $validator
            ->decimal('vatamt')
            ->requirePresence('vatamt', 'create')
            ->notEmpty('vatamt');

        $validator
            ->decimal('totalamt')
            ->allowEmpty('totalamt');

        $validator
            ->decimal('totalpaid')
            ->requirePresence('totalpaid', 'create')
            ->notEmpty('totalpaid');

        $validator
            ->scalar('ispaid')
            ->allowEmpty('ispaid');

        $validator
            ->scalar('issale')
            ->requirePresence('issale', 'create')
            ->notEmpty('issale');

        $validator
            ->scalar('isprocessed')
            ->requirePresence('isprocessed', 'create')
            ->notEmpty('isprocessed');

        $validator
            ->uuid('createdby')
            ->requirePresence('createdby', 'create')
            ->notEmpty('createdby');

        $validator
            ->uuid('modifiedby')
            ->allowEmpty('modifiedby');

        $validator
            ->uuid('seller')
            ->allowEmpty('seller');

        $validator
            ->scalar('iscompletepaid')
            ->requirePresence('iscompletepaid', 'create')
            ->notEmpty('iscompletepaid');

        $validator
            ->scalar('isreceived')
            ->allowEmpty('isreceived');

        $validator
            ->scalar('isordered')
            ->allowEmpty('isordered');

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
        $rules->add($rules->existsIn(['bpartner_id'], 'Bpartners'));

        return $rules;
    }
}
