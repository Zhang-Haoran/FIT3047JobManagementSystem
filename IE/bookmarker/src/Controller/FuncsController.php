<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Funcs Controller
 *
 * @property \App\Model\Table\FuncsTable $Funcs
 *
 * @method \App\Model\Entity\Func[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FuncsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $funcs = $this->paginate($this->Funcs);

        $this->set(compact('funcs'));
    }

    /**
     * View method
     *
     * @param string|null $id Func id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $func = $this->Funcs->get($id, [
            'contain' => ['Employees']
        ]);

        $this->set('func', $func);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $func = $this->Funcs->newEntity();
        if ($this->request->is('post')) {
            $func = $this->Funcs->patchEntity($func, $this->request->getData());
            if ($this->Funcs->save($func)) {
                $this->Flash->success(__('The func has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The func could not be saved. Please, try again.'));
        }
        $employees = $this->Funcs->Employees->find('list', ['limit' => 200]);
        $this->set(compact('func', 'employees'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Func id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $func = $this->Funcs->get($id, [
            'contain' => ['Employees']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $func = $this->Funcs->patchEntity($func, $this->request->getData());
            if ($this->Funcs->save($func)) {
                $this->Flash->success(__('The func has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The func could not be saved. Please, try again.'));
        }
        $employees = $this->Funcs->Employees->find('list', ['limit' => 200]);
        $this->set(compact('func', 'employees'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Func id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $func = $this->Funcs->get($id);
        if ($this->Funcs->delete($func)) {
            $this->Flash->success(__('The func has been deleted.'));
        } else {
            $this->Flash->error(__('The func could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
