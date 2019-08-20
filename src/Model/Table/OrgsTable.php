<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Orgs Model
 *
 * @property \App\Model\Table\BankAccountsTable|\Cake\ORM\Association\HasMany $BankAccounts
 * @property \App\Model\Table\BpartnersTable|\Cake\ORM\Association\HasMany $Bpartners
 * @property \App\Model\Table\BranchsTable|\Cake\ORM\Association\HasMany $Branchs
 * @property \App\Model\Table\ImagesTable|\Cake\ORM\Association\HasMany $Images
 * @property \App\Model\Table\InvoicesTable|\Cake\ORM\Association\HasMany $Invoices
 * @property \App\Model\Table\ProductsTable|\Cake\ORM\Association\HasMany $Products
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\HasMany $Users
 * @property \App\Model\Table\WarehousesTable|\Cake\ORM\Association\HasMany $Warehouses
 *
 * @method \App\Model\Entity\Org get($primaryKey, $options = [])
 * @method \App\Model\Entity\Org newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Org[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Org|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Org patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Org[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Org findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class OrgsTable extends Table
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

        $this->setTable('orgs');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('BankAccounts', [
            'foreignKey' => 'org_id'
        ]);
        $this->hasMany('Bpartners', [
            'foreignKey' => 'org_id'
        ]);
        $this->hasMany('Branchs', [
            'foreignKey' => 'org_id'
        ]);
        $this->hasMany('Images', [
            'foreignKey' => 'org_id'
        ]);
        $this->hasMany('Invoices', [
            'foreignKey' => 'org_id'
        ]);
        $this->hasMany('Products', [
            'foreignKey' => 'org_id'
        ]);
        $this->hasMany('Users', [
            'foreignKey' => 'org_id'
        ]);
        $this->hasMany('Warehouses', [
            'foreignKey' => 'org_id'
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
            ->scalar('name')
            ->maxLength('name', 100)
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->scalar('code')
            ->maxLength('code', 50)
            ->allowEmpty('code');

        $validator
            ->scalar('taxid')
            ->maxLength('taxid', 13)
            ->allowEmpty('taxid');

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

        $validator
            ->scalar('description')
            ->maxLength('description', 45)
            ->allowEmpty('description');

        return $validator;
    }
}
