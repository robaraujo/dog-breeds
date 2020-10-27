<?php
use Migrations\AbstractSeed;

/**
 * DogPositions seed.
 */
class DogPositionsSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Bob',
                'dog_breed_id' => 1,
                'user_id' => null,
                'latitude' => -30.0112,
                'longitude' => -51.1561
            ],
            [
                'name' => 'Mel',
                'dog_breed_id' => 2,
                'user_id' => 1,
                'latitude' => -30.2112,
                'longitude' => -51.2561
            ],
            [
                'name' => 'Mia',
                'dog_breed_id' => 3,
                'user_id' => 1,
                'latitude' => -30.1112,
                'longitude' => -51.1561
            ],
            [
                'name' => 'Escobar',
                'dog_breed_id' => 4,
                'user_id' => 1,
                'latitude' => -30.2112,
                'longitude' => -51.1561
            ],
            [
                'name' => 'Macio',
                'dog_breed_id' => 5,
                'user_id' => null,
                'latitude' => -30.3112,
                'longitude' => -51.1561
            ],
            [
                'name' => 'Mica',
                'dog_breed_id' => 6,
                'user_id' => null,
                'latitude' => -30.4112,
                'longitude' => -51.1561
            ],
            [
                'name' => 'Luna',
                'dog_breed_id' => 7,
                'user_id' => null,
                'latitude' => -30.5112,
                'longitude' => -51.1561
            ],
            [
                'name' => 'Iron',
                'dog_breed_id' => 8,
                'user_id' => null,
                'latitude' => -30.6112,
                'longitude' => -51.1561
            ],
            [
                'name' => 'Sherek',
                'dog_breed_id' => 9,
                'user_id' => null,
                'latitude' => -30.7112,
                'longitude' => -51.1561
            ],
            [
                'name' => 'Lobo',
                'dog_breed_id' => 10,
                'user_id' => null,
                'latitude' => -30.8112,
                'longitude' => -51.1561
            ],
            [
                'name' => 'Wolf',
                'dog_breed_id' => 11,
                'user_id' => null,
                'latitude' => -30.9112,
                'longitude' => -51.1561
            ],
            [
                'name' => 'Simba',
                'dog_breed_id' => 12,
                'user_id' => null,
                'latitude' => -30.0112,
                'longitude' => -51.2561
            ],
            [
                'name' => 'Escobar',
                'dog_breed_id' => 13,
                'user_id' => null,
                'latitude' => -30.0112,
                'longitude' => -51.3561
            ],
            [
                'name' => 'Pumba',
                'dog_breed_id' => 14,
                'user_id' => null,
                'latitude' => -30.0112,
                'longitude' => -51.4561
            ],
            [
                'name' => 'Geremias',
                'dog_breed_id' => 15,
                'user_id' => null,
                'latitude' => -30.0112,
                'longitude' => -51.5561
            ]
        ];

        $table = $this->table('dog_positions');
        $table->insert($data)->save();
    }
}
