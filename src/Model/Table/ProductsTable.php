<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Products Model
 *
 * @property \App\Model\Table\ProductCategoriesTable|\Cake\ORM\Association\BelongsTo $ProductCategories
 * @property \App\Model\Table\ProductSubCategoriesTable|\Cake\ORM\Association\BelongsTo $ProductSubCategories
 * @property \App\Model\Table\OrgsTable|\Cake\ORM\Association\BelongsTo $Orgs
 * @property \App\Model\Table\SizesTable|\Cake\ORM\Association\BelongsTo $Sizes
 * @property \App\Model\Table\WeightsTable|\Cake\ORM\Association\BelongsTo $Weights
 * @property \App\Model\Table\DesignsTable|\Cake\ORM\Association\BelongsTo $Designs
 * @property \App\Model\Table\ImagesTable|\Cake\ORM\Association\BelongsTo $Images
 * @property \App\Model\Table\GoodsLinesTable|\Cake\ORM\Association\HasMany $GoodsLines
 * @property \App\Model\Table\InvoiceLinesTable|\Cake\ORM\Association\HasMany $InvoiceLines
 * @property \App\Model\Table\OrderLinesTable|\Cake\ORM\Association\HasMany $OrderLines
 * @property \App\Model\Table\PawnLinesTable|\Cake\ORM\Association\HasMany $PawnLines
 * @property |\Cake\ORM\Association\HasMany $PaymentLines
 * @property \App\Model\Table\ProductImagesTable|\Cake\ORM\Association\HasMany $ProductImages
 * @property \App\Model\Table\WhProductsTable|\Cake\ORM\Association\HasMany $WhProducts
 *
 * @method \App\Model\Entity\Product get($primaryKey, $options = [])
 * @method \App\Model\Entity\Product newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Product[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Product|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Product patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Product[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Product findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ProductsTable extends Table
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

        $this->setTable('products');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('ProductCategories', [
            'foreignKey' => 'product_category_id'
        ]);
        $this->belongsTo('ProductSubCategories', [
            'foreignKey' => 'product_sub_category_id'
        ]);
        $this->belongsTo('Orgs', [
            'foreignKey' => 'org_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Sizes', [
            'foreignKey' => 'size_id'
        ]);
        $this->belongsTo('Weights', [
            'foreignKey' => 'weight_id'
        ]);
        $this->belongsTo('Designs', [
            'foreignKey' => 'design_id'
        ]);
        $this->belongsTo('Images', [
            'foreignKey' => 'image_id'
        ]);
        $this->hasMany('GoodsLines', [
            'foreignKey' => 'product_id'
        ]);
        $this->hasMany('InvoiceLines', [
            'foreignKey' => 'product_id'
        ]);
        $this->hasMany('OrderLines', [
            'foreignKey' => 'product_id'
        ]);
        $this->hasMany('PawnLines', [
            'foreignKey' => 'product_id'
        ]);
        $this->hasMany('PaymentLines', [
            'foreignKey' => 'product_id'
        ]);
        $this->hasMany('ProductImages', [
            'foreignKey' => 'product_id'
        ]);
        $this->hasMany('WhProducts', [
            'foreignKey' => 'product_id'
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
            ->scalar('code')
            ->maxLength('code', 50)
            ->requirePresence('code', 'create')
            ->notEmpty('code');

        $validator
            ->scalar('unittype')
            ->maxLength('unittype', 50)
            ->allowEmpty('unittype');

        $validator
            ->decimal('cost')
            ->requirePresence('cost', 'create')
            ->notEmpty('cost');

        $validator
            ->decimal('actual_price')
            ->requirePresence('actual_price', 'create')
            ->notEmpty('actual_price');

        $validator
            ->scalar('description')
            ->allowEmpty('description');

        $validator
            ->scalar('isactive')
            ->requirePresence('isactive', 'create')
            ->notEmpty('isactive');

        $validator
            ->uuid('createdby')
            ->requirePresence('createdby', 'create')
            ->notEmpty('createdby');

        $validator
            ->dateTime('midified')
            ->allowEmpty('midified');

        $validator
            ->uuid('modifiedby')
            ->allowEmpty('modifiedby');

        $validator
            ->decimal('percent')
            ->allowEmpty('percent');

        $validator
            ->decimal('manual_weight')
            ->allowEmpty('manual_weight');

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
        $rules->add($rules->existsIn(['product_category_id'], 'ProductCategories'));
        $rules->add($rules->existsIn(['product_sub_category_id'], 'ProductSubCategories'));
        $rules->add($rules->existsIn(['org_id'], 'Orgs'));
        $rules->add($rules->existsIn(['size_id'], 'Sizes'));
        $rules->add($rules->existsIn(['weight_id'], 'Weights'));
        $rules->add($rules->existsIn(['design_id'], 'Designs'));
        $rules->add($rules->existsIn(['image_id'], 'Images'));

        return $rules;
    }
}
