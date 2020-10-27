<?php
namespace App\Controller\Api;
use App\Controller\Api\AppController;
use Cake\Network\Exception\UnauthorizedException;
use Cake\Utility\Security;
use Firebase\JWT\JWT;

class UsersController extends AppController
{

	public function initialize()
	{
		parent::initialize();
		$this->Auth->allow(['login', 'register']);
	}

	public function login()
	{
		$user = $this->Auth->identify();
		if (!$user) {
			throw new UnauthorizedException('Invalid email or password');
		}
		
		$this->_setJwt($user);
	}

	public function register()
	{
		$user = $this->Users->newEntity();	
		$user = $this->Users->patchEntity($user, $this->request->getData());
		$user['role'] = 'user';

		if ($this->Users->findByUsername($user['username'])->first()) {
			$this->response->statusCode(409);
			$this->set(["message" => "Username already exists."]);
		} else if (!$this->Users->save($user)) {
			$this->response->statusCode(401);
			$this->set(["message" => "Internal error, try later."]);
		} else {
			$this->_setJwt($user);
		}
	}

	private function _setJwt($user) {
		$this->set([
			'user' => $user,
			'token' => JWT::encode(
				[
					'sub' => $user['id'],
					'exp' =>  time() + 604800,
					'role' => $user['role']
				], Security::salt()
			),
			'_serialize' => ['success', 'data']
		]);
	}
}