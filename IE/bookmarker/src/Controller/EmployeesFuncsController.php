<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * EmployeesFuncs Controller
 *
 * @property \App\Model\Table\EmployeesFuncsTable $EmployeesFuncs
 *
 * @method \App\Model\Entity\EmployeesFunc[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EmployeesFuncsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Funcs', 'Employees']
        ];
        $employeesFuncs = $this->paginate($this->EmployeesFuncs);

        $this->set(compact('employeesFuncs'));
    }

    /**
     * View method
     *
     * @param string|null $id Employees Func id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $employeesFunc = $this->EmployeesFuncs->get($id, [
            'contain' => ['Funcs', 'Employees']
        ]);

        $this->set('employeesFunc', $employeesFunc);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $employeesFunc = $this->EmployeesFuncs->newEntity();
        if ($this->request->is('post')) {
            $employeesFunc = $this->EmployeesFuncs->patchEntity($employeesFunc, $this->request->getData());
            if ($this->EmployeesFuncs->save($employeesFunc)) {
                $this->Flash->success(__('The employees func has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The employees func could not be saved. Please, try again.'));
        }
        $funcs = $this->EmployeesFuncs->Funcs->find('list', ['limit' => 200]);
        $employees = $this->EmployeesFuncs->Employees->find('list', ['limit' => 200]);
        $this->set(compact('employeesFunc', 'funcs', 'employees'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Employees Func id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $employeesFunc = $this->EmployeesFuncs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $employeesFunc = $this->EmployeesFuncs->patchEntity($employeesFunc, $this->request->getData());
            if ($this->EmployeesFuncs->save($employeesFunc)) {
                $this->Flash->success(__('The employees func has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The employees func could not be saved. Please, try again.'));
        }
        $funcs = $this->EmployeesFuncs->Funcs->find('list', ['limit' => 200]);
        $employees = $this->EmployeesFuncs->Employees->find('list', ['limit' => 200]);
        $this->set(compact('employeesFunc', 'funcs', 'employees'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Employees Func id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $employeesFunc = $this->EmployeesFuncs->get($id);
        if ($this->EmployeesFuncs->delete($employeesFunc)) {
            $this->Flash->success(__('The employees func has been deleted.'));
        } else {
            $this->Flash->error(__('The employees func could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
