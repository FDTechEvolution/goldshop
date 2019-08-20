<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Addresses Model
 *
 * @property \App\Model\Table\BpartnersTable|\Cake\ORM\Association\HasMany $Bpartners
 * @property \App\Model\Table\BranchesTable|\Cake\ORM\Association\HasMany $Branches
 *
 * @method \App\Model\Entity\Address get($primaryKey, $options = [])
 * @method \App\Model\Entity\Address newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Address[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Address|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Address patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Address[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Address findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AddressesTable extends Table
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

        $this->setTable('addresses');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Bpartners', [
            'foreignKey' => 'address_id'
        ]);
        $this->hasMany('Branches', [
            'foreignKey' => 'address_id'
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
            ->scalar('address_line')
            ->maxLength('address_line', 255)
            ->allowEmpty('address_line');

        $validator
            ->scalar('houseno')
            ->maxLength('houseno', 10)
            ->allowEmpty('houseno');

        $validator
            ->scalar('villageno')
            ->maxLength('villageno', 10)
            ->allowEmpty('villageno');

        $validator
            ->scalar('villagename')
            ->maxLength('villagename', 255)
            ->allowEmpty('villagename');

        $validator
            ->scalar('subdistrict')
            ->maxLength('subdistrict', 255)
            ->allowEmpty('subdistrict');

        $validator
            ->scalar('district')
            ->maxLength('district', 255)
            ->allowEmpty('district');

        $validator
            ->scalar('postalcode')
            ->maxLength('postalcode', 5)
            ->allowEmpty('postalcode');

        $validator
            ->scalar('description')
            ->maxLength('description', 255)
            ->allowEmpty('description');

        $validator
            ->scalar('createdby')
            ->maxLength('createdby', 100)
            ->allowEmpty('createdby');

        $validator
            ->scalar('modifiedby')
            ->maxLength('modifiedby', 100)
            ->allowEmpty('modifiedby');

        $validator
            ->scalar('province')
            ->maxLength('province', 100)
            ->allowEmpty('province');

        return $validator;
    }
}
