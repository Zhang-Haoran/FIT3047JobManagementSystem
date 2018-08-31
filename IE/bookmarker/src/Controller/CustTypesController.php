<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CustTypes Controller
 *
 * @property \App\Model\Table\CustTypesTable $CustTypes
 *
 * @method \App\Model\Entity\CustType[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CustTypesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $custTypes = $this->paginate($this->CustTypes);

        $this->set(compact('custTypes'));
    }

    /**
     * View method
     *
     * @param string|null $id Cust Type id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $custType = $this->CustTypes->get($id, [
            'contain' => []
        ]);

        $this->set('custType', $custType);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $custType = $this->CustTypes->newEntity();
        if ($this->request->is('post')) {
            $custType = $this->CustTypes->patchEntity($custType, $this->request->getData());
            if ($this->CustTypes->save($custType)) {
                $this->Flash->success(__('The cust type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cust type could not be saved. Please, try again.'));
        }
        $this->set(compact('custType'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Cust Type id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $custType = $this->CustTypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $custType = $this->CustTypes->patchEntity($custType, $this->request->getData());
            if ($this->CustTypes->save($custType)) {
                $this->Flash->success(__('The cust type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cust type could not be saved. Please, try again.'));
        }
        $this->set(compact('custType'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Cust Type id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $custType = $this->CustTypes->get($id);
        if ($this->CustTypes->delete($custType)) {
            $this->Flash->success(__('The cust type has been deleted.'));
        } else {
            $this->Flash->error(__('The cust type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
