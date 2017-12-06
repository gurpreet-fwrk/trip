<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Tripgallery Model
 *
 * @property \App\Model\Table\TripsTable|\Cake\ORM\Association\BelongsTo $Trips
 *
 * @method \App\Model\Entity\Tripgallery get($primaryKey, $options = [])
 * @method \App\Model\Entity\Tripgallery newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Tripgallery[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Tripgallery|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Tripgallery patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Tripgallery[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Tripgallery findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class TripgalleryTable extends Table
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

        $this->setTable('tripgallery');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Trips', [
            'foreignKey' => 'trip_id'
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
            ->allowEmpty('file');

       

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
        $rules->add($rules->existsIn(['trip_id'], 'Trips'));

        return $rules;
    }
}
