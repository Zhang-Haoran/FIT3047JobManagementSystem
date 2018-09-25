<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Jobs Controller
 *
 * @property \App\Model\Table\JobsTable $Jobs
 *
 * @method \App\Model\Entity\Job[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class JobsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $jobs = $this->Jobs->find('all')->contain(['Sites', 'EventTypes', 'Customers', 'Employees']);
        $this->set(compact('jobs'));
    }

    /**
     * View method
     *
     * @param string|null $id Job id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $job = $this->Jobs->get($id, [
            'contain' => ['Sites', 'EventTypes', 'Customers', 'Employees', 'AccessorieLines', 'Images', 'StockLines']
        ]);

        $this->set('job', $job);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $job = $this->Jobs->newEntity();
        if ($this->request->is('post')) {
            $job = $this->Jobs->patchEntity($job, $this->request->getData());
            if ($this->Jobs->save($job)) {
                $this->Flash->success(__('The job has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The job could not be saved. Please, try again.'));
        }
        $sites = $this->Jobs->Sites->find('list', ['limit' => 200]);
        $eventTypes = $this->Jobs->EventTypes->find('list', ['limit' => 200]);
        $customers = $this->Jobs->Customers->find('list', ['limit' => 200]);
        $employees = $this->Jobs->Employees->find('list', ['limit' => 200]);
        $this->set(compact('job', 'sites', 'eventTypes', 'customers', 'employees'));
        $this->set('statusOptions', array('Started' => 'Started', 'Confirmed' => 'Confirmed', 'Quote' => 'Quote', 'Completed' => 'Completed'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Job id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $job = $this->Jobs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $job = $this->Jobs->patchEntity($job, $this->request->getData());
            if ($this->Jobs->save($job)) {
                $this->Flash->success(__('The job has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The job could not be saved. Please, try again.'));
        }
        $sites = $this->Jobs->Sites->find('list', ['limit' => 200]);
        $eventTypes = $this->Jobs->EventTypes->find('list', ['limit' => 200]);
        $customers = $this->Jobs->Customers->find('list', ['limit' => 200]);
        $employees = $this->Jobs->Employees->find('list', ['limit' => 200]);
        $this->set(compact('job', 'sites', 'eventTypes', 'customers', 'employees'));
        $this->set('statusOptions', array('Started' => 'Started', 'Confirmed' => 'Confirmed', 'Quote' => 'Quote', 'Completed' => 'Completed'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Job id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $job = $this->Jobs->get($id);
        if ($this->Jobs->delete($job)) {
            $this->Flash->success(__('The job has been deleted.'));
        } else {
            $this->Flash->error(__('The job could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
