<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class Wishlist extends Entity
{

    protected $_accessible = [
        'user_id'   =>  true,
        'trip_id'   =>  true
    ];
}
