<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Glitems Model
 *
 * @property \App\Model\Table\InvoiceLinesTable|\Cake\ORM\Association\HasMany $InvoiceLines
 *
 * @method \App\Model\Entity\Glitem get($primaryKey, $options = [])
 * @method \App\Model\Entity\Glitem newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Glitem[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Glitem|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Glitem patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Glitem[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Glitem findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class GlitemsTable extends Table
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

        $this->setTable('glitems');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('InvoiceLines', [
            'foreignKey' => 'glitem_id'
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
            ->allowEmpty('name');

        $validator
            ->scalar('code')
            ->maxLength('code', 45)
            ->allowEmpty('code');

        return $validator;
    }
}
