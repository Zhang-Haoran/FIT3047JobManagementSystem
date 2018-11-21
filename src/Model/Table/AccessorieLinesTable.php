<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AccessorieLines Model
 *
 * @property \App\Model\Table\AccessoriesTable|\Cake\ORM\Association\BelongsTo $Accessories
 * @property \App\Model\Table\JobsTable|\Cake\ORM\Association\BelongsTo $Jobs
 *
 * @method \App\Model\Entity\AccessorieLine get($primaryKey, $options = [])
 * @method \App\Model\Entity\AccessorieLine newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AccessorieLine[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AccessorieLine|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AccessorieLine|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AccessorieLine patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AccessorieLine[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AccessorieLine findOrCreate($search, callable $callback = null, $options = [])
 */
class AccessorieLinesTable extends Table
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

        $this->setTable('accessorie_lines');
        $this->setDisplayField('accessorie_id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Accessories', [
            'foreignKey' => 'accessories_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Jobs', [
            'foreignKey' => 'jobs_id',
            'joinType' => 'INNER'
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
            ->integer('accs_in')
            ->allowEmpty('accs_in');

        $validator
            ->integer('accs_out')
            ->allowEmpty('accs_out');

        $validator
            ->boolean('loaded')
            ->allowEmpty('loaded');

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
        $rules->add($rules->existsIn(['accessories_id'], 'Accessories'));
        $rules->add($rules->existsIn(['jobs_id'], 'Jobs'));

        return $rules;
    }
}
