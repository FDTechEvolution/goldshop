<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ProductCategories Model
 *
 * @property \App\Model\Table\OrgsTable|\Cake\ORM\Association\BelongsTo $Orgs
 * @property \App\Model\Table\DesignsTable|\Cake\ORM\Association\HasMany $Designs
 * @property \App\Model\Table\ProductSubCategoriesTable|\Cake\ORM\Association\HasMany $ProductSubCategories
 * @property \App\Model\Table\ProductsTable|\Cake\ORM\Association\HasMany $Products
 * @property \App\Model\Table\SizesTable|\Cake\ORM\Association\HasMany $Sizes
 * @property \App\Model\Table\WeightsTable|\Cake\ORM\Association\HasMany $Weights
 *
 * @method \App\Model\Entity\ProductCategory get($primaryKey, $options = [])
 * @method \App\Model\Entity\ProductCategory newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ProductCategory[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ProductCategory|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProductCategory patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ProductCategory[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ProductCategory findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ProductCategoriesTable extends Table
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

        $this->setTable('product_categories');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Orgs', [
            'foreignKey' => 'org_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Designs', [
            'foreignKey' => 'product_category_id'
        ]);
        $this->hasMany('ProductSubCategories', [
            'foreignKey' => 'product_category_id'
        ]);
        $this->hasMany('Products', [
            'foreignKey' => 'product_category_id'
        ]);
        $this->hasMany('Sizes', [
            'foreignKey' => 'product_category_id'
        ]);
        $this->hasMany('Weights', [
            'foreignKey' => 'product_category_id'
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
            ->maxLength('name', 50)
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->scalar('isactive')
            ->allowEmpty('isactive');

        $validator
            ->scalar('description')
            ->maxLength('description', 255)
            ->allowEmpty('description');

        $validator
            ->uuid('createdby')
            ->requirePresence('createdby', 'create')
            ->notEmpty('createdby');

        $validator
            ->uuid('modifiedby')
            ->allowEmpty('modifiedby');

        $validator
            ->scalar('code')
            ->maxLength('code', 5)
            ->requirePresence('code', 'create')
            ->notEmpty('code');

        $validator
            ->scalar('isdefault')
            ->allowEmpty('isdefault');

        $validator
            ->scalar('type')
            ->maxLength('type', 100)
            ->allowEmpty('type');

        $validator
            ->scalar('isstock')
            ->allowEmpty('isstock');

        $validator
            ->scalar('unittype')
            ->maxLength('unittype', 100)
            ->allowEmpty('unittype');

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

        return $rules;
    }
}
