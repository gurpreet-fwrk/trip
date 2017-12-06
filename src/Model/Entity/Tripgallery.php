<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Tripgallery Entity
 *
 * @property int $id
 * @property int $trip_id
 * @property string $file
 * @property string $format
 * @property string $type
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Trip $trip
 */
class Tripgallery extends Entity
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
        '*' => true,
        'id' => false
    ];
}
