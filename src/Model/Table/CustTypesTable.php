<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CustTypes Model
 *
 * @property \App\Model\Table\CustomersTable|\Cake\ORM\Association\HasMany $Customers
 *
 * @method \App\Model\Entity\CustType get($primaryKey, $options = [])
 * @method \App\Model\Entity\CustType newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CustType[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CustType|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CustType|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CustType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CustType[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CustType findOrCreate($search, callable $callback = null, $options = [])
 */
class CustTypesTable extends Table
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

        $this->setTable('cust_types');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Customers', [
            'foreignKey' => 'cust_type_id'
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
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmpty('name')
            ->add('name','characterOnly',[
                'rule' => array('custom','/^[a-zA-Z ]*$/'),
                'message' => 'Name should contain character only'
            ]);

        $validator
            ->boolean('is_deleted')
            ->allowEmpty('is_deleted');

        return $validator;
    }
}
