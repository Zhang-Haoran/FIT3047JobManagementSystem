<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * AccessorieLines Controller
 *
 * @property \App\Model\Table\AccessorieLinesTable $AccessorieLines
 *
 * @method \App\Model\Entity\AccessorieLine[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AccessorieLinesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        if($this->Auth->user('access_level')=='3'){
            $this->Flash->set(__('You have no authorization to access this page as a field staff'));
            return $this->redirect($this->Auth->redirectUrl());
        }
        $accessorieLines = $this->AccessorieLines->find('all')->contain(['Accessories', 'Jobs']);

        $this->set(compact('accessorieLines'));
    }

    /**
     * View method
     *
     * @param string|null $id Accessorie Line id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        if($this->Auth->user('access_level')=='3'){
            $this->Flash->set(__('You have no authorization to access this page as a field staff'));
            return $this->redirect($this->Auth->redirectUrl());
        }
        $accessorieLine = $this->AccessorieLines->get($id, [
            'contain' => ['Accessories', 'Jobs']
        ]);

        $this->set('accessorieLine', $accessorieLine);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        if($this->Auth->user('access_level')=='3'){
            $this->Flash->set(__('You have no authorization to access this page as a field staff'));
            return $this->redirect($this->Auth->redirectUrl());
        }
        $accessorieLine = $this->AccessorieLines->newEntity();
        if ($this->request->is('post')) {
            $accessorieLine = $this->AccessorieLines->patchEntity($accessorieLine, $this->request->getData());
            if ($this->AccessorieLines->save($accessorieLine)) {
                $this->Flash->success(__('The accessorie line has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The accessorie line could not be saved. Please, try again.'));
        }
        $accessories = $this->AccessorieLines->Accessories->find('list', ['limit' => 200]);
        $jobs = $this->AccessorieLines->Jobs->find('list', ['limit' => 200]);
        $this->set(compact('accessorieLine', 'accessories', 'jobs'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Accessorie Line id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        if($this->Auth->user('access_level')=='3'){
            $this->Flash->set(__('You have no authorization to access this page as a field staff'));
            return $this->redirect($this->Auth->redirectUrl());
        }
        $accessorieLine = $this->AccessorieLines->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $accessorieLine = $this->AccessorieLines->patchEntity($accessorieLine, $this->request->getData());
            if ($this->AccessorieLines->save($accessorieLine)) {
                $this->Flash->success(__('The accessorie line has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The accessorie line could not be saved. Please, try again.'));
        }
        $accessories = $this->AccessorieLines->Accessories->find('list', ['limit' => 200]);
        $jobs = $this->AccessorieLines->Jobs->find('list', ['limit' => 200]);
        $this->set(compact('accessorieLine', 'accessories', 'jobs'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Accessorie Line id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        if($this->Auth->user('access_level')=='3'){
            $this->Flash->set(__('You have no authorization to access this page as a field staff'));
            return $this->redirect($this->Auth->redirectUrl());
        }
        $this->request->allowMethod(['post', 'delete']);
        $accessorieLine = $this->AccessorieLines->get($id);
        if ($this->AccessorieLines->delete($accessorieLine)) {
            $this->Flash->success(__('The accessorie line has been deleted.'));
        } else {
            $this->Flash->error(__('The accessorie line could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
