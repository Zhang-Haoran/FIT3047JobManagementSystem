<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Contacts Model
 *
 * @property \App\Model\Table\JobsTable|\Cake\ORM\Association\BelongsTo $Jobs
 * @property \App\Model\Table\SitesTable|\Cake\ORM\Association\BelongsTo $Sites
 * @property \App\Model\Table\CustomersTable|\Cake\ORM\Association\BelongsTo $Customers
 *
 * @method \App\Model\Entity\Contact get($primaryKey, $options = [])
 * @method \App\Model\Entity\Contact newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Contact[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Contact|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Contact|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Contact patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Contact[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Contact findOrCreate($search, callable $callback = null, $options = [])
 */
class ContactsTable extends Table
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

        $this->setTable('contacts');
        $this->setDisplayField('fname');
        $this->setPrimaryKey('id');

        $this->belongsTo('Jobs', [
            'foreignKey' => 'job_id'
        ]);
        $this->belongsTo('Sites', [
            'foreignKey' => 'site_id'
        ]);
        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id'
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
            ->maxLength('fname', 255)
            ->requirePresence('fname', 'create')
            ->notEmpty('fname')
            ->add('fname','characterOnly',[
        'rule' => array('custom','/^[a-zA-Z ]*$/'),
        'message' => 'Your name should contain [a-z/A-Z] only'
    ]);



        $validator
            ->scalar('lname')
            ->maxLength('lname', 255)
            ->requirePresence('lname', 'create')
            ->notEmpty('lname')
            ->add('lname','characterOnly',[
                'rule' => array('custom','/^[a-zA-Z ]*$/'),
                'message' => 'Your name should contain [a-zA-Z ] only'
            ]);

        $validator
            ->scalar('phone')
            ->maxLength('phone', 15)
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
            ->requirePresence('email', 'create')
            ->notEmpty('email')
            ->add('email', 'unique', ['rule' => 'validateUnique', 'provider' => 'table'])
            ->add('email','validEmail',[
                'rule' => 'email',
                'message' => 'Your e-mail format should be like example@example.com'
            ]);

        $validator
            ->scalar('role')
            ->maxLength('role', 255)
            ->allowEmpty('role')
            ->add('role','characterOnly',[
                'rule' => array('custom','/^[a-zA-Z 0-9]*$/'),
                'message' => 'Role should contain [a-z/A-Z/0-9] only'
            ]);

        $validator
            ->boolean('is_deleted')
            ->allowEmpty('is_deleted');

        $validator
            ->scalar('street')
            ->maxLength('street', 255)
            ->allowEmpty('street')
            ->add('street','characterOnly',[
                'rule' => array('custom','/^[a-zA-Z 0-9]*$/'),
                'message' => 'Address should contain [a-z/A-Z/0-9] only'
            ]);

        $validator
            ->scalar('suburb')
            ->maxLength('suburb', 255)
            ->allowEmpty('suburb')
            ->add('name','characterOnly',[
                'rule' => array('custom','/^[a-zA-Z 0-9]*$/'),
                'message' => 'Suburb should contain [a-z/A-Z/0-9] only'
            ]);

        $validator
            ->scalar('city')
            ->maxLength('city', 255)
            ->allowEmpty('city')
            ->add('city','characterOnly',[
                'rule' => array('custom','/^[a-zA-Z 0-9]*$/'),
                'message' => 'City should contain [a-z/A-Z/0-9] only'
            ]);

        $validator
            ->scalar('postcode')
            ->maxLength('postcode', 5)
            ->allowEmpty('postcode')
            ->numeric('postcode','Postcode should be number');

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
        $rules->add($rules->existsIn(['job_id'], 'Jobs'));
        $rules->add($rules->existsIn(['site_id'], 'Sites'));
        $rules->add($rules->existsIn(['customer_id'], 'Customers'));

        return $rules;
    }
}
