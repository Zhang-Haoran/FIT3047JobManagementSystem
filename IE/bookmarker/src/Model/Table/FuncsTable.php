<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Funcs Model
 *
 * @property \App\Model\Table\EmployeesTable|\Cake\ORM\Association\BelongsToMany $Employees
 *
 * @method \App\Model\Entity\Func get($primaryKey, $options = [])
 * @method \App\Model\Entity\Func newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Func[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Func|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Func|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Func patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Func[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Func findOrCreate($search, callable $callback = null, $options = [])
 */
class FuncsTable extends Table
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

        $this->setTable('funcs');
        $this->setDisplayField('func_id');
        $this->setPrimaryKey('func_id');

        $this->belongsToMany('Employees', [
            'foreignKey' => 'func_id',
            'targetForeignKey' => 'employee_id',
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
            ->integer('func_id')
            ->allowEmpty('func_id', 'create');

        $validator
            ->scalar('func_name')
            ->maxLength('func_name', 255)
            ->requirePresence('func_name', 'create')
            ->notEmpty('func_name');

        return $validator;
    }
}
