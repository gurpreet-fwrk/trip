<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Trips Model
 *
 * @property \App\Model\Table\LocationsTable|\Cake\ORM\Association\BelongsTo $Locations
 * @property \App\Model\Table\TransportationsTable|\Cake\ORM\Association\BelongsTo $Transportations
 * @property \App\Model\Table\MeetingpointsTable|\Cake\ORM\Association\BelongsTo $Meetingpoints
 * @property \App\Model\Table\MeetingpointtypesTable|\Cake\ORM\Association\BelongsTo $Meetingpointtypes
 * @property \App\Model\Table\TripfeaturesTable|\Cake\ORM\Association\BelongsTo $Tripfeatures
 * @property \App\Model\Table\ExtraconditionsTable|\Cake\ORM\Association\BelongsTo $Extraconditions
 * @property \App\Model\Table\TripactivitiesTable|\Cake\ORM\Association\HasMany $Tripactivities
 * @property \App\Model\Table\TriplocationsTable|\Cake\ORM\Association\HasMany $Triplocations
 * @property \App\Model\Table\TrippricesTable|\Cake\ORM\Association\HasMany $Tripprices
 *
 * @method \App\Model\Entity\Trip get($primaryKey, $options = [])
 * @method \App\Model\Entity\Trip newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Trip[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Trip|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Trip patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Trip[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Trip findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class TripsTable extends Table
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

        $this->setTable('trips');
        $this->setDisplayField('title_en');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Locations', [
            'foreignKey' => 'location_id'
        ]);
        $this->belongsTo('Transportations', [
            'foreignKey' => 'transportation_id'
        ]);
        $this->belongsTo('Meetingpoints', [
            'foreignKey' => 'meetingpoint_id'
        ]);
        $this->belongsTo('Meetingpointtypes', [
            'foreignKey' => 'meetingpointtype_id'
        ]);
        $this->belongsTo('Tripfeatures', [
            'foreignKey' => 'tripfeature_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Extraconditions', [
            'foreignKey' => 'extracondition_id'
        ]);
        $this->hasMany('Tripactivities', [
            'foreignKey' => 'trip_id'
        ]);
        $this->hasMany('Triplocations', [
            'foreignKey' => 'trip_id'
        ]);
        $this->hasMany('Tripprices', [
            'foreignKey' => 'trip_id'
        ]);

        $this->hasMany('Activities', [
            'foreignKey' => 'activity_id'
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
        $rules->add($rules->existsIn(['location_id'], 'Locations'));
        $rules->add($rules->existsIn(['transportation_id'], 'Transportations'));
        $rules->add($rules->existsIn(['meetingpoint_id'], 'Meetingpoints'));
        $rules->add($rules->existsIn(['meetingpointtype_id'], 'Meetingpointtypes'));
        $rules->add($rules->existsIn(['tripfeature_id'], 'Tripfeatures'));
        $rules->add($rules->existsIn(['extracondition_id'], 'Extraconditions'));

        return $rules;
    }
}
