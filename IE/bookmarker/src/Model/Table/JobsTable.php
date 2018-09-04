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
 * @property \App\Model\Table\MaterialsTable|\Cake\ORM\Association\BelongsToMany $Materials
 * @property \App\Model\Table\StocksTable|\Cake\ORM\Association\BelongsToMany $Stocks
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
        $this->setDisplayField('job_id');
        $this->setPrimaryKey('job_id');

        $this->belongsTo('Sites', [
            'foreignKey' => 'site_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('EventTypes', [
            'foreignKey' => 'event_type_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Customers', [
            'foreignKey' => 'cust_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Employees', [
            'foreignKey' => 'emp_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsToMany('Materials', [
            'foreignKey' => 'job_id',
            'targetForeignKey' => 'material_id',
            'joinTable' => 'jobs_materials'
        ]);
        $this->belongsToMany('Stocks', [
            'foreignKey' => 'job_id',
            'targetForeignKey' => 'stock_id',
            'joinTable' => 'jobs_stocks'
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
            ->integer('job_id')
            ->allowEmpty('job_id', 'create');

        $validator
            ->scalar('job_name')
            ->maxLength('job_name', 255)
            ->requirePresence('job_name', 'create')
            ->notEmpty('job_name');

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
            ->date('booked_date')
            ->requirePresence('booked_date', 'create')
            ->notEmpty('booked_date');

        $validator
            ->numeric('price')
            ->greaterThanOrEqual('price', 0)
            ->allowEmpty('price');

        $validator
            ->numeric('deposit')
            ->greaterThanOrEqual('deposit', 0)
            ->allowEmpty('deposit');

        $validator
            ->scalar('order_detail')
            ->allowEmpty('order_detail');

        $validator
            ->time('e_arrival_time')
            ->allowEmpty('e_arrival_time');

        $validator
            ->time('e_setup_time')
            ->allowEmpty('e_setup_time');

        $validator
            ->time('e_pickup_time')
            ->allowEmpty('e_pickup_time');

        $validator
            ->date('e_pickup_date')
            ->allowEmpty('e_pickup_date');

        $validator
            ->scalar('additional_note')
            ->allowEmpty('additional_note');

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
        $rules->add($rules->existsIn(['cust_id'], 'Customers'));
        $rules->add($rules->existsIn(['emp_id'], 'Employees'));

        return $rules;
    }
}
