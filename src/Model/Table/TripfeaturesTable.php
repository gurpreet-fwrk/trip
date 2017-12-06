<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Tripfeatures Model
 *
 * @method \App\Model\Entity\Tripfeature get($primaryKey, $options = [])
 * @method \App\Model\Entity\Tripfeature newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Tripfeature[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Tripfeature|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Tripfeature patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Tripfeature[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Tripfeature findOrCreate($search, callable $callback = null, $options = [])
 */
class TripfeaturesTable extends Table
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

        $this->setTable('tripfeatures');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');
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
            ->dateTime('date_added')
            ->requirePresence('date_added', 'create')
            ->notEmpty('date_added');

        $validator
            ->dateTime('date_modified')
            ->requirePresence('date_modified', 'create')
            ->notEmpty('date_modified');

        return $validator;
    }
}
