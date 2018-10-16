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
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Jobs', [
            'foreignKey' => 'jobs_id'
        ]);
        $this->belongsTo('Sites', [
            'foreignKey' => 'sites_id'
        ]);
        $this->belongsTo('Customers', [
            'foreignKey' => 'customers_id'
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
                'rule' => array('custom','/^[ a-zA-Z]*$/'),
                'message' => 'Name should contain character only'
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
                'message' => 'Your phone format is not valid'
            ]);

        $validator
            ->email('email')
            ->allowEmpty('email')
            ->add('email','validEmail',[
                'rule' => 'email',
                'message' => 'Your e-mail format is not valid'
            ]);

        $validator
            ->scalar('role')
            ->maxLength('role', 255)
            ->allowEmpty('role')
            ->add('role','characterOnly',[
                'rule' => array('custom','/^[a-zA-Z]*$/'),
                'message' => 'Name should contain character only'
            ]);

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
        $rules->add($rules->existsIn(['jobs_id'], 'Jobs'));
        $rules->add($rules->existsIn(['sites_id'], 'Sites'));
        $rules->add($rules->existsIn(['customers_id'], 'Customers'));

        return $rules;
    }
}
