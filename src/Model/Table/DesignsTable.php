<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Designs Model
 *
 * @property \App\Model\Table\ProductCategoriesTable|\Cake\ORM\Association\BelongsTo $ProductCategories
 * @property \App\Model\Table\ImagesTable|\Cake\ORM\Association\BelongsTo $Images
 * @property \App\Model\Table\ProductsTable|\Cake\ORM\Association\HasMany $Products
 *
 * @method \App\Model\Entity\Design get($primaryKey, $options = [])
 * @method \App\Model\Entity\Design newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Design[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Design|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Design patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Design[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Design findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class DesignsTable extends Table
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

        $this->setTable('designs');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('ProductCategories', [
            'foreignKey' => 'product_category_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Images', [
            'foreignKey' => 'image_id'
        ]);
        $this->hasMany('Products', [
            'foreignKey' => 'design_id'
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
            ->maxLength('name', 45)
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
            ->allowEmpty('createdby');

        $validator
            ->uuid('modifiedby')
            ->allowEmpty('modifiedby');

        $validator
            ->scalar('label')
            ->maxLength('label', 45)
            ->allowEmpty('label');

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
        $rules->add($rules->existsIn(['image_id'], 'Images'));

        return $rules;
    }
}
