<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Jobs Model
 *
 * @property \App\Model\Table\SitesTable|\Cake\ORM\Association\BelongsTo $Sites
 * @property \App\Model\Table\EventTypesTable|\Cake\ORM\Association\BelongsTo $EventTypes
 * @property \App\Model\Table\CustomersTable|\Cake\ORM\Association\BelongsTo $Customers
 * @property \App\Model\Table\EmployeesTable|\Cake\ORM\Association\BelongsTo $Employees
 * @property \App\Model\Table\ContactsTable|\Cake\ORM\Association\HasMany $Contacts
 * @property \App\Model\Table\ImagesTable|\Cake\ORM\Association\HasMany $Images
 *
 * @method \App\Model\Entity\Job get($primaryKey, $options = [])
 * @method \App\Model\Entity\Job newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Job[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Job|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Job|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Job patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Job[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Job findOrCreate($search, callable $callback = null, $options = [])
 */
class JobsTable extends Table
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

        $this->setTable('jobs');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Sites', [
            'foreignKey' => 'site_id'
        ]);
        $this->belongsTo('EventTypes', [
            'foreignKey' => 'event_type_id'
        ]);
        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Employees', [
            'foreignKey' => 'employee_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Contacts', [
            'foreignKey' => 'job_id'
        ]);
        $this->hasMany('Images', [
            'foreignKey' => 'job_id'
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
                'rule' => array('custom','/^[a-zA-Z 0-9]*$/'),
                'message' => 'Name should contain character only'
            ]);

        $validator
            ->scalar('job_status')
            ->maxLength('job_status', 45)
            ->requirePresence('job_status', 'create')
            ->notEmpty('job_status');

        $validator
            ->date('job_date')
            ->requirePresence('job_date', 'create')
            ->notEmpty('job_date');

        $validator
            ->dateTime('booked_date')
            ->allowEmpty('booked_date');

        $validator
            ->numeric('price','price should be number')
            ->maxLength('price',13)
            ->greaterThanOrEqual('price', 0)
            ->allowEmpty('price');

        $validator
            ->numeric('deposit','deposit should be number')
            ->maxLength('deposit',13)
            ->greaterThanOrEqual('deposit', 0)
            ->allowEmpty('deposit');

        $validator
            ->scalar('order_detail')
            ->allowEmpty('order_detail');

        $validator
            ->dateTime('e_arrival_time')
            ->allowEmpty('e_arrival_time');

        $validator
            ->dateTime('e_setup_time')
            ->allowEmpty('e_setup_time');

        $validator
            ->dateTime('e_pickup_time')
            ->allowEmpty('e_pickup_time');

        $validator
            ->scalar('additional_note')
            ->allowEmpty('additional_note');

        $validator
            ->scalar('edited_by')
            ->maxLength('edited_by', 255)
            ->allowEmpty('edited_by');

        $validator
            ->dateTime('last_changed')
            ->allowEmpty('last_changed');

        $validator
            ->scalar('Invoice')
            ->maxLength('Invoice', 45)
            ->allowEmpty('Invoice');

        $validator
            ->scalar('job_order')
            ->maxLength('job_order', 45)
            ->allowEmpty('job_order');

        $validator
            ->scalar('quote')
            ->maxLength('quote', 45)
            ->allowEmpty('quote');

        $validator
            ->scalar('token')
            ->maxLength('token', 13)
            ->allowEmpty('token');

        $validator
            ->dateTime('timeout')
            ->allowEmpty('timeout');

        $validator
            ->boolean('is_deleted')
            ->allowEmpty('is_deleted');

        $validator
            ->scalar('arrive_note')
            ->allowEmpty('arrive_note');

        $validator
            ->scalar('setup_note')
            ->allowEmpty('setup_note');

        $validator
            ->scalar('pickup_note')
            ->allowEmpty('pickup_note');

        $validator
            ->boolean('is_pickup')
            ->allowEmpty('is_pickup');

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
        $rules->add($rules->existsIn(['site_id'], 'Sites'));
        $rules->add($rules->existsIn(['event_type_id'], 'EventTypes'));
        $rules->add($rules->existsIn(['customer_id'], 'Customers'));
        $rules->add($rules->existsIn(['employee_id'], 'Employees'));

        return $rules;
    }
}
