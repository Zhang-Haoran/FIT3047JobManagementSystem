<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MaterialLines Model
 *
 * @property \App\Model\Table\MaterialsTable|\Cake\ORM\Association\BelongsTo $Materials
 * @property \App\Model\Table\JobsTable|\Cake\ORM\Association\BelongsTo $Jobs
 *
 * @method \App\Model\Entity\MaterialLine get($primaryKey, $options = [])
 * @method \App\Model\Entity\MaterialLine newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MaterialLine[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MaterialLine|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MaterialLine|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MaterialLine patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MaterialLine[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MaterialLine findOrCreate($search, callable $callback = null, $options = [])
 */
class MaterialLinesTable extends Table
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

        $this->setTable('material_lines');
        $this->setDisplayField('material_id');
        $this->setPrimaryKey(['material_id', 'job_id']);

        $this->belongsTo('Materials', [
            'foreignKey' => 'material_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Jobs', [
            'foreignKey' => 'job_id',
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
            ->integer('mat_in')
            ->requirePresence('mat_in', 'create')
            ->notEmpty('mat_in');

        $validator
            ->integer('mat_out')
            ->allowEmpty('mat_out');

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
        $rules->add($rules->existsIn(['material_id'], 'Materials'));
        $rules->add($rules->existsIn(['job_id'], 'Jobs'));

        return $rules;
    }
}
