<?php
use Migrations\AbstractSeed;

/**
 * DogBreeds seed.
 */
class DogBreedsSeed extends AbstractSeed
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
                'name' => 'Labrador Retriever',
                'size' => 'big',
                'image' => 'https://lyka-challenge.s3.amazonaws.com/Labrador+Retriever.jpeg',
            ],
            [
                'name' => 'German Shepherd',
                'size' => 'big',
                'image' => 'https://lyka-challenge.s3.amazonaws.com/German+Shepherd.jpg',
            ],
            [
                'name' => 'Golden Retriever',
                'size' => 'big',
                'image' => 'https://lyka-challenge.s3.amazonaws.com/Golden+Retriever.jpg',
            ],
            [
                'name' => 'French Bulldog',
                'size' => 'small',
                'image' => 'https://lyka-challenge.s3.amazonaws.com/French+Bulldog.jpeg',
            ],
            [
                'name' => 'Bulldog',
                'size' => 'medium',
                'image' => 'https://lyka-challenge.s3.amazonaws.com/Bulldog.jpg',
            ],
            [
                'name' => 'Poodle',
                'size' => 'medium',
                'image' => 'https://lyka-challenge.s3.amazonaws.com/Poodle.jpg',
            ],
            [
                'name' => 'Beagle',
                'size' => 'small',
                'image' => 'https://lyka-challenge.s3.amazonaws.com/Beagle.jpeg',
            ],
            [
                'name' => 'Rottweiler',
                'size' => 'big',
                'image' => 'https://lyka-challenge.s3.amazonaws.com/Rottweiler.jpeg',
            ],
            [
                'name' => 'Pointer',
                'size' => 'big',
                'image' => 'https://lyka-challenge.s3.amazonaws.com/Pointer.jpg',
            ],
            [
                'name' => 'Pembroke Welsh Corgi',
                'size' => 'small',
                'image' => 'https://lyka-challenge.s3.amazonaws.com/Pembroke+Welsh+Corgi.jpg',
            ],
            [
                'name' => 'Dachshund',
                'size' => 'small',
                'image' => 'https://lyka-challenge.s3.amazonaws.com/Dachshund.jpg',
            ],
            [
                'name' => 'Yorkshire Terrier',
                'size' => 'small',
                'image' => 'https://lyka-challenge.s3.amazonaws.com/Yorkshire+Terrier.jpeg',
            ],
            [
                'name' => 'Australian Shepherd',
                'size' => 'big',
                'image' => 'https://lyka-challenge.s3.amazonaws.com/Australian+Shepherd.jpg',
            ],
            [
                'name' => 'Boxer',
                'size' => 'big',
                'image' => 'https://lyka-challenge.s3.amazonaws.com/Boxer.jpg',
            ],
            [
                'name' => 'Siberian Huskie',
                'size' => 'big',
                'image' => 'https://lyka-challenge.s3.amazonaws.com/Siberian+Huskie.jpg',
            ],
        ];

        $table = $this->table('dog_breeds');
        $table->insert($data)->save();
    }
}
