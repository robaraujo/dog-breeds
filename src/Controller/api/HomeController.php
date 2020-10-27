<?php
namespace App\Controller\Api;
use App\Controller\Api\AppController;

class HomeController extends AppController
{
	public $uses = ['DogBreeds', 'DogPositions'];

	public function initialize()
	{
		parent::initialize();
		$this->Auth->allow(['index']);
	}

	public function index()
	{
		$this->loadModel('DogBreeds');
		$this->loadModel('DogPositions');

		$positions = $this->DogPositions->find('all', ['contain' => ['DogBreeds', 'Users']]);
		$breeds = $this->DogBreeds->find('all');
		
		$this->set(compact('positions', 'breeds', 'user'));
	}
}