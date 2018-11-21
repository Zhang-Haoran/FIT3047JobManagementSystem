<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Employees Model
 *
 * @property \App\Model\Table\JobsTable|\Cake\ORM\Association\HasMany $Jobs
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
        $this->setDisplayField('fname');
        $this->setPrimaryKey('id');

        $this->hasMany('Jobs', [
            'foreignKey' => 'employee_id'
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
            ->scalar('fname')
            ->maxLength('fname', 255,'First name can not be too long')
            ->requirePresence('fname', 'create')
            ->notEmpty('fname','First name can not be empty')
            ->add('fname','characterOnly',[
                'rule' => array('custom','/^[a-zA-Z ]*$/'),
                'message' => 'Your name should contain [a-zA-Z ] only'
            ]);

        $validator
            ->scalar('lname')
            ->maxLength('lname', 255,'Last name can not be too long')
            ->requirePresence('lname', 'create')
            ->notEmpty('lname','Last name can not be empty')
            ->add('lname','characterOnly',[
                'rule' => array('custom','/^[a-zA-Z ]*$/'),
                'message' => 'Your name should contain [a-zA-Z ] only'
            ]);

        $validator
            ->scalar('password')
            ->maxLength('password', 255,'Password can not be too long')
            ->requirePresence('password', 'create')
            ->notEmpty('password','Password can not be empty')
            ->add('password','minLength',[
                'rule' => ['minLength', 6],
                'message' => 'Your password should have at least 6 characters'
            ]);

            //add password match feature, to make sure user don't type unexpected password.
            $validator
                ->sameAs('confirmed_password','password','Password match failed');


        $validator
            ->scalar('phone')
            ->maxLength('phone', 15,'Phone number cannot be longer than 15 numbers long')
            ->allowEmpty('phone');
            $australianMobile = '/^(0|\+61)4\d{8}$/';
            $validator
            ->add('phone', 'custom', [
                'rule' => function ($value, $context) use ($australianMobile) {
                // remove spaces to make the regex simpler
                $check = preg_replace('/\s/', '', $value);

                // checks for either of these styles
                // +61412 345 678 or 0412 345 678
                $found = preg_match($australianMobile, $check);
                return boolval($found);
            },
            'message' => 'Your phone format should be like +61412 345 678 or 0412 345 678'
        ]);


        $validator
            ->email('email')
            ->maxLength('email', 255,'Email address can not be too long')
            ->allowEmpty('email')
            ->add('email','validEmail',[
                'rule' => 'email',
                'message' => 'Your e-mail format should be like example@example.com'
            ]);


        $validator
            ->integer('access_level')
            ->requirePresence('access_level', 'create')
            ->notEmpty('access_level')
            ->numeric('access_level')
            ->add('access_level','1-3',[
                'rule' => array('custom','/^[1-3]*$/'),
                'message' => 'Your access level should be 1-3 '
            ]);


        $validator
            ->scalar('token')
            ->maxLength('token', 13)
            ->requirePresence('token', 'create')
            ->allowEmpty('token');

        $validator
            ->dateTime('timeout')
            ->allowEmpty('timeout');

        $validator
            ->boolean('is_deleted')
            ->allowEmpty('is_deleted');

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
        $rules->add($rules->isUnique(['email']));

        return $rules;
    }
}
