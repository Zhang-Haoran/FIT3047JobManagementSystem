<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Customers Model
 *
 * @property \App\Model\Table\CustTypesTable|\Cake\ORM\Association\BelongsTo $CustTypes
 *
 * @method \App\Model\Entity\Customer get($primaryKey, $options = [])
 * @method \App\Model\Entity\Customer newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Customer[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Customer|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Customer|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Customer patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Customer[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Customer findOrCreate($search, callable $callback = null, $options = [])
 */
class CustomersTable extends Table
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

        $this->setTable('customers');
        $this->setDisplayField('cust_id');
        $this->setPrimaryKey('cust_id');

        $this->belongsTo('CustTypes', [
            'foreignKey' => 'cust_type_id',
            'joinType' => 'INNER'
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
            ->integer('cust_id')
            ->allowEmpty('cust_id', 'create');

        $validator
            ->scalar('cust_name')
            ->maxLength('cust_name', 255)
            ->requirePresence('cust_name', 'create')
            ->notEmpty('cust_name');

        $validator
            ->scalar('cust_contact')
            ->maxLength('cust_contact', 255)
            ->allowEmpty('cust_contact');

        $validator
            ->scalar('cust_phone')
            ->maxLength('cust_phone', 15)
            ->allowEmpty('cust_phone');

        $validator
            ->scalar('cust_mobile')
            ->maxLength('cust_mobile', 15)
            ->allowEmpty('cust_mobile');

        $validator
            ->scalar('cust_email')
            ->maxLength('cust_email', 255)
            ->allowEmpty('cust_email');

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
        $rules->add($rules->existsIn(['cust_type_id'], 'CustTypes'));

        return $rules;
    }
}
