<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Stocks Model
 *
 * @property \App\Model\Table\AccessoriesTable|\Cake\ORM\Association\BelongsTo $Accessories
 * @property \App\Model\Table\StockLinesTable|\Cake\ORM\Association\HasMany $StockLines
 *
 * @method \App\Model\Entity\Stock get($primaryKey, $options = [])
 * @method \App\Model\Entity\Stock newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Stock[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Stock|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Stock|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Stock patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Stock[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Stock findOrCreate($search, callable $callback = null, $options = [])
 */
class StocksTable extends Table
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

        $this->setTable('stocks');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Accessories', [
            'foreignKey' => 'accessorie_id'
        ]);
        $this->hasMany('StockLines', [
            'foreignKey' => 'stock_id'
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
                'rule' => array('custom','/^[a-zA-Z 0-9]*$/'),
                'message' => 'Name should contain [a-zA-Z 0-9] only'
            ]);

        $validator
            ->numeric('rent_value')
            ->greaterThanOrEqual('rent_value', 0)
            ->allowEmpty('rent_value')
            ->numeric('rent_value','rent value should be numeric')
            ->greaterThanOrEqual('rent_value',0);


        $validator
            ->integer('min_accs')
            ->allowEmpty('min_accs')
            ->numeric('min_accs','minimum accessory should be numeric')
            ->greaterThanOrEqual('min_accs',0);

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
        $rules->add($rules->existsIn(['accessorie_id'], 'Accessories'));

        return $rules;
    }
}
