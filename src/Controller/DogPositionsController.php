<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * DogPositions Controller
 *
 * @property \App\Model\Table\DogPositionsTable $DogPositions
 *
 * @method \App\Model\Entity\DogPosition[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DogPositionsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['DogBreeds', 'Users'],
        ];
        $dogPositions = $this->paginate($this->DogPositions);

        $this->set(compact('dogPositions'));
    }

    /**
     * View method
     *
     * @param string|null $id Dog Position id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $dogPosition = $this->DogPositions->get($id, [
            'contain' => ['DogBreeds', 'Users'],
        ]);

        $this->set('dogPosition', $dogPosition);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $dogPosition = $this->DogPositions->newEntity();
        if ($this->request->is('post')) {
            $dogPosition = $this->DogPositions->patchEntity($dogPosition, $this->request->getData());
            if ($this->DogPositions->save($dogPosition)) {
                $this->Flash->success(__('The dog position has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The dog position could not be saved. Please, try again.'));
        }
        $dogBreeds = $this->DogPositions->DogBreeds->find('list', ['limit' => 200]);
        $users = $this->DogPositions->Users->find('list', ['limit' => 200]);
        $this->set(compact('dogPosition', 'dogBreeds', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Dog Position id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $dogPosition = $this->DogPositions->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $dogPosition = $this->DogPositions->patchEntity($dogPosition, $this->request->getData());
            if ($this->DogPositions->save($dogPosition)) {
                $this->Flash->success(__('The dog position has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The dog position could not be saved. Please, try again.'));
        }
        $dogBreeds = $this->DogPositions->DogBreeds->find('list', ['limit' => 200]);
        $users = $this->DogPositions->Users->find('list', ['limit' => 200]);
        $this->set(compact('dogPosition', 'dogBreeds', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Dog Position id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $dogPosition = $this->DogPositions->get($id);
        if ($this->DogPositions->delete($dogPosition)) {
            $this->Flash->success(__('The dog position has been deleted.'));
        } else {
            $this->Flash->error(__('The dog position could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
