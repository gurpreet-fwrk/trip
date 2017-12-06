<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Trip Entity
 *
 * @property int $id
 * @property int $location_id
 * @property int $transportation_id
 * @property string $title
 * @property string $summary
 * @property string $images
 * @property string $meetinpoint_location
 * @property int $meetingpoint_id
 * @property int $meetingpointtype_id
 * @property string $schedule
 * @property string $faq1
 * @property string $faq2
 * @property int $tripfeature_id
 * @property string $extra_expense
 * @property int $travellers
 * @property int $child_price
 * @property string $extracondition_id
 * @property string $operating_days
 * @property int $request_photographer
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Location $location
 * @property \App\Model\Entity\Transportation $transportation
 * @property \App\Model\Entity\Meetingpoint $meetingpoint
 * @property \App\Model\Entity\Meetingpointtype $meetingpointtype
 * @property \App\Model\Entity\Tripfeature $tripfeature
 * @property \App\Model\Entity\Extracondition $extracondition
 * @property \App\Model\Entity\Tripactivity[] $tripactivities
 * @property \App\Model\Entity\Triplocation[] $triplocations
 * @property \App\Model\Entity\Tripprice[] $tripprices
 */
class Trip extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'location_id' => true,
        'user_id' => true,
        'transportation_id' => true,
        'transportationvehicle_id' => true,
        'title_en' => true,
        'title_ar' => true,
        'summary_en' => true,
        'summary_ar' => true,
        'meetinpoint_location' => true,
        'meetingpoint_id' => true,
        'meetingpointtype_id' => true,
        'schedule' => true,
        'faq1' => true,
        'faq2' => true,
        'tripfeature_id' => true,
        'extra_expense' => true,
        'travellers' => true,
        'child_price' => true,
        'extracondition_id' => true,
        'operating_days' => true,
        'request_photographer' => true,
        'created' => true,
        'modified' => true,
        'location' => true,
        'transportation' => true,
        'meetingpoint' => true,
        'meetingpointtype' => true,
        'tripfeature' => true,
        'extracondition' => true,
        'tripactivities' => true,
        'triplocations' => true,
        'tripprices' => true
    ];
}
