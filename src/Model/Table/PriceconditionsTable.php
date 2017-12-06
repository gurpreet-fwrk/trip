<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Priceconditions Model
 *
 * @method \App\Model\Entity\Pricecondition get($primaryKey, $options = [])
 * @method \App\Model\Entity\Pricecondition newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Pricecondition[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Pricecondition|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Pricecondition patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Pricecondition[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Pricecondition findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PriceconditionsTable extends Table
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

        $this->setTable('priceconditions');
        $this->setDisplayField('title_en');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
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

        return $validator;
    }
}
