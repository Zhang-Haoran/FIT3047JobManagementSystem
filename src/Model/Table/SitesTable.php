<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Sites Model
 *
 * @property \App\Model\Table\JobsTable|\Cake\ORM\Association\HasMany $Jobs
 *
 * @method \App\Model\Entity\Site get($primaryKey, $options = [])
 * @method \App\Model\Entity\Site newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Site[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Site|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Site|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Site patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Site[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Site findOrCreate($search, callable $callback = null, $options = [])
 */
class SitesTable extends Table
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

        $this->setTable('sites');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Jobs', [
            'foreignKey' => 'site_id'
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
            ->maxLength('name', 255,'Site name can not be too long')
            ->requirePresence('name', 'create')
            ->notEmpty('name','Site name can not be empty');

        $validator
            ->scalar('address')
            ->maxLength('address', 255,'Address can not be too long')
            ->requirePresence('address', 'create')
            ->notEmpty('address','Address can not be empty');

        $validator
            ->scalar('suburb')
            ->maxLength('suburb', 255,'Suburb can not be too long')
            ->requirePresence('suburb', 'create')
            ->notEmpty('suburb','Suburb van not be empty')
            ->add('suburb','characterOnly',[
                'rule' => array('custom','/^[a-zA-Z]*$/'),
                'message' => 'Suburb should contain character only'
            ]);

        $validator
            ->scalar('postcode')
            ->maxLength('postcode', 5,'Postcode can not be too long')
            ->requirePresence('postcode', 'create')
            ->notEmpty('postcode','Postcode can not be empty')
            ->numeric('postcode','Postcode must be number');

        $validator
            ->boolean('is_deleted')
            ->allowEmpty('is_deleted');

        return $validator;
    }
}
