<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Transportationvehicles Model
 *
 * @property \App\Model\Table\TransportationsTable|\Cake\ORM\Association\BelongsTo $Transportations
 *
 * @method \App\Model\Entity\Transportationvehicle get($primaryKey, $options = [])
 * @method \App\Model\Entity\Transportationvehicle newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Transportationvehicle[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Transportationvehicle|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Transportationvehicle patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Transportationvehicle[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Transportationvehicle findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class TransportationvehiclesTable extends Table
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

        $this->setTable('transportationvehicles');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Transportations', [
            'foreignKey' => 'transportation_id',
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
            ->allowEmpty('title');

        $validator
            ->allowEmpty('icon');

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
        $rules->add($rules->existsIn(['transportation_id'], 'Transportations'));

        return $rules;
    }
}
