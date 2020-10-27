<?php
namespace App\Controller\Api;
use App\Controller\Api\AppController;

class DogBreedsController extends AppController
{

	public function initialize()
	{
		parent::initialize();
		$this->Auth->allow(['index']);
	}

	public function index()
	{
		$breeds = $this->DogBreeds->find('all');
		$this->set(compact('breeds'));
	}
}