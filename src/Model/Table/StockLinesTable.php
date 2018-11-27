<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Stocklines Model
 *
 * @property \App\Model\Table\StocksTable|\Cake\ORM\Association\BelongsTo $Stocks
 * @property \App\Model\Table\JobsTable|\Cake\ORM\Association\BelongsTo $Jobs
 *
 * @method \App\Model\Entity\Stockline get($primaryKey, $options = [])
 * @method \App\Model\Entity\Stockline newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Stockline[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Stockline|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Stockline|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Stockline patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Stockline[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Stockline findOrCreate($search, callable $callback = null, $options = [])
 */
class StocklinesTable extends Table
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

        $this->setTable('stock_lines');
        $this->setDisplayField('stock_id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Stocks', [
            'foreignKey' => 'stock_id',
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
            ->integer('stock_num')
            ->allowEmpty('stock_num');

        $validator
            ->boolean('loaded')
            ->allowEmpty('loaded');

        $validator
            ->integer('unit')
            ->allowEmpty('unit');

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
        $rules->add($rules->existsIn(['stock_id'], 'Stocks'));
        $rules->add($rules->existsIn(['jobs_id'], 'Jobs'));

        return $rules;
    }
}
