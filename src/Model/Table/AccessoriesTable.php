<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Accessories Model
 *
 * @method \App\Model\Entity\Accessory get($primaryKey, $options = [])
 * @method \App\Model\Entity\Accessory newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Accessory[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Accessory|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Accessory|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Accessory patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Accessory[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Accessory findOrCreate($search, callable $callback = null, $options = [])
 */
class AccessoriesTable extends Table
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

        $this->setTable('accessories');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');
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
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmpty('name')
           ;

        $validator
            ->boolean('is_deleted')
            ->allowEmpty('is_deleted');

        return $validator;
    }
}
