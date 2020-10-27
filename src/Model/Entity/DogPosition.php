<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * DogPosition Entity
 *
 * @property int $id
 * @property string $name
 * @property int $dog_breed_id
 * @property int|null $user_id
 * @property float $latitude
 * @property float $longitude
 * @property \Cake\I18n\FrozenTime $saw_at
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\DogBreed $dog_breed
 * @property \App\Model\Entity\User $user
 */
class DogPosition extends Entity
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
        'name' => true,
        'dog_breed_id' => true,
        'user_id' => true,
        'latitude' => true,
        'longitude' => true,
        'saw_at' => true,
        'created' => true,
        'modified' => true,
        'dog_breed' => true,
        'user' => true,
    ];
}
