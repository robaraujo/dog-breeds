<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * DogBreeds Controller
 *
 *
 * @method \App\Model\Entity\DogBreed[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DogBreedsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $dogBreeds = $this->paginate($this->DogBreeds);

        $this->set(compact('dogBreeds'));
    }

    /**
     * View method
     *
     * @param string|null $id Dog Breed id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $dogBreed = $this->DogBreeds->get($id, [
            'contain' => [],
        ]);

        $this->set('dogBreed', $dogBreed);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $dogBreed = $this->DogBreeds->newEntity();
        if ($this->request->is('post')) {
            $dogBreed = $this->DogBreeds->patchEntity($dogBreed, $this->request->getData());
            if ($this->DogBreeds->save($dogBreed)) {
                $this->Flash->success(__('The dog breed has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The dog breed could not be saved. Please, try again.'));
        }
        $this->set(compact('dogBreed'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Dog Breed id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $dogBreed = $this->DogBreeds->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $dogBreed = $this->DogBreeds->patchEntity($dogBreed, $this->request->getData());
            if ($this->DogBreeds->save($dogBreed)) {
                $this->Flash->success(__('The dog breed has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The dog breed could not be saved. Please, try again.'));
        }
        $this->set(compact('dogBreed'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Dog Breed id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $dogBreed = $this->DogBreeds->get($id);
        if ($this->DogBreeds->delete($dogBreed)) {
            $this->Flash->success(__('The dog breed has been deleted.'));
        } else {
            $this->Flash->error(__('The dog breed could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
