<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Employees Model
 *
 * @property \App\Model\Table\FuncsTable|\Cake\ORM\Association\BelongsToMany $Funcs
 *
 * @method \App\Model\Entity\Employee get($primaryKey, $options = [])
 * @method \App\Model\Entity\Employee newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Employee[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Employee|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Employee|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Employee patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Employee[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Employee findOrCreate($search, callable $callback = null, $options = [])
 */
class EmployeesTable extends Table
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

        $this->setTable('employees');
        $this->setDisplayField('employee_id');
        $this->setPrimaryKey('employee_id');

        $this->belongsToMany('Funcs', [
            'foreignKey' => 'employee_id',
            'targetForeignKey' => 'func_id',
            'joinTable' => 'employees_funcs'
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
            ->integer('employee_id')
            ->allowEmpty('employee_id', 'create');

        $validator
            ->scalar('emp_fname')
            ->maxLength('emp_fname', 255)
            ->requirePresence('emp_fname', 'create')
            ->notEmpty('emp_fname');

        $validator
            ->scalar('emp_lname')
            ->maxLength('emp_lname', 255)
            ->requirePresence('emp_lname', 'create')
            ->notEmpty('emp_lname');

        $validator
            ->scalar('emp_username')
            ->maxLength('emp_username', 255)
            ->requirePresence('emp_username', 'create')
            ->notEmpty('emp_username');

        $validator
            ->scalar('emp_password')
            ->maxLength('emp_password', 255)
            ->requirePresence('emp_password', 'create')
            ->notEmpty('emp_password');

        $validator
            ->scalar('emp_phone')
            ->maxLength('emp_phone', 15)
            ->allowEmpty('emp_phone');

        $validator
            ->scalar('emp_email')
            ->maxLength('emp_email', 255)
            ->allowEmpty('emp_email');

        return $validator;
    }
}
