<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * EmployeesFuncs Model
 *
 * @property \App\Model\Table\FuncsTable|\Cake\ORM\Association\BelongsTo $Funcs
 * @property \App\Model\Table\EmployeesTable|\Cake\ORM\Association\BelongsTo $Employees
 *
 * @method \App\Model\Entity\EmployeesFunc get($primaryKey, $options = [])
 * @method \App\Model\Entity\EmployeesFunc newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\EmployeesFunc[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\EmployeesFunc|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\EmployeesFunc|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\EmployeesFunc patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\EmployeesFunc[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\EmployeesFunc findOrCreate($search, callable $callback = null, $options = [])
 */
class EmployeesFuncsTable extends Table
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

        $this->setTable('employees_funcs');
        $this->setDisplayField('func_id');
        $this->setPrimaryKey(['func_id', 'employee_id']);

        $this->belongsTo('Funcs', [
            'foreignKey' => 'func_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Employees', [
            'foreignKey' => 'employee_id',
            'joinType' => 'INNER'
        ]);
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
        $rules->add($rules->existsIn(['func_id'], 'Funcs'));
        $rules->add($rules->existsIn(['employee_id'], 'Employees'));

        return $rules;
    }
}
