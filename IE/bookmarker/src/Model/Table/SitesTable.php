<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Sites Model
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
        $this->setDisplayField('site_id');
        $this->setPrimaryKey('site_id');
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
            ->integer('site_id')
            ->allowEmpty('site_id', 'create');

        $validator
            ->scalar('site_name')
            ->maxLength('site_name', 255)
            ->requirePresence('site_name', 'create')
            ->notEmpty('site_name');

        $validator
            ->scalar('site_address')
            ->maxLength('site_address', 255)
            ->requirePresence('site_address', 'create')
            ->notEmpty('site_address');

        $validator
            ->scalar('site_suburb')
            ->maxLength('site_suburb', 255)
            ->requirePresence('site_suburb', 'create')
            ->notEmpty('site_suburb');

        $validator
            ->scalar('site_postcode')
            ->maxLength('site_postcode', 5)
            ->requirePresence('site_postcode', 'create')
            ->notEmpty('site_postcode');

        $validator
            ->scalar('site_melways')
            ->maxLength('site_melways', 255)
            ->allowEmpty('site_melways');

        $validator
            ->scalar('site_contact')
            ->maxLength('site_contact', 255)
            ->allowEmpty('site_contact');

        $validator
            ->scalar('site_mobile')
            ->maxLength('site_mobile', 15)
            ->allowEmpty('site_mobile');

        return $validator;
    }
}
