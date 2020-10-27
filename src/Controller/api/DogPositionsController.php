<?php
namespace App\Controller\Api;
use App\Controller\Api\AppController;

class DogPositionsController extends AppController
{

	public function initialize()
	{
		parent::initialize();
		$this->Auth->allow(['index', 'add']);
	}

	public function index()
	{
		$positions = $this->getAll();
		$this->set(compact('positions'));
	}

	 /**
	 * Add method
	 *
	 * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
	 */
	public function add()
	{
		$user = $this->Auth->identify();

		$dogPosition = $this->DogPositions->newEntity();
		$dogPosition = $this->DogPositions->patchEntity($dogPosition, $this->request->getData());
		
		if ($user) {
			$dogPosition['user_id'] = $user['id'];
		}
		
		if (!$this->DogPositions->save($dogPosition)) {

			debug($dogPosition->getErrors()); die();
			$this->response->statusCode(401);
			$this->set(["message" => "The dog position could not be saved. Please, try again."]);		
		} else {
			$positions = $this->getAll();
			$this->set(compact('positions', 'user'));
		}
	}

	private function getAll() {
		return $this->DogPositions->find('all', ['contain' => ['DogBreeds', 'Users']]);
	}
}