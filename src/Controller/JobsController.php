<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;

/**
 * Jobs Controller
 *
 * @property \App\Model\Table\JobsTable $Jobs
 *
 * @method \App\Model\Entity\Job[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class JobsController extends AppController
{
    public function initialize()
    {
        parent::initialize();
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        if($this->Auth->user('access_level') =='1' ) {
            $jobs = $this->Jobs->find('all')
                ->contain(['Sites', 'EventTypes', 'Customers', 'Employees']);
        }else{
            $jobs = $this->Jobs->find('all')
                ->where(['jobs.is_deleted >' => '0'])
                ->contain(['Sites', 'EventTypes', 'Customers', 'Employees']);
        }
        $session = $this->getRequest()->getSession();
        $name = $session->read('Auth.User.access_level');
        $this->set('name', $name);


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
            'contain' => ['Sites', 'EventTypes', 'Customers', 'Employees', 'Images']
        ]);
        if($job->is_deleted == '1' && $this->Auth->user('access_level') !='1' ) {
            $this->Flash->set(__('You have no authorization to access this page as a field staff'));
            $this->redirect($this->Auth->redirectUrl());
        }


        $this->loadModel('Sites');
        $site = $this->Sites->get($job->site_id);

        $this->set('site', $site);
        $this->set('job', $job);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {   if($this->Auth->user('access_level')=='3'){
        $this->Flash->set(__('You have no authorization to access this page as a field staff'));
        return $this->redirect($this->Auth->redirectUrl());
    }

        $job = $this->Jobs->newEntity();
        if ($this->request->is('post')) {
            $job = $this->Jobs->patchEntity($job, $this->request->getData(),[
                'associated' => [
                    'customers'
                ]
            ]);
            $job->last_changed = Time::now();
            $this->loadModel('Employees');
            $staff = $this->Employees->get($this->Auth->user('id'));
            $job->edited_by = $staff->full_name;
            $job->employee_id = $this->Auth->user('id');

            if ($this->Jobs->save($job)) {
                $this->Flash->success(__('The job has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The job could not be saved. Please, try again.'));

        }
        $sites = $this->Jobs->Sites->find('list', [
            'keyField' => 'id',
            'valueField' => function ($site) {
                return $site->get('label');
            }
        ]);
        $eventTypes = $this->Jobs->EventTypes->find('list');
        $customers = $this->Jobs->Customers->find('list');
        $employees = $this->Jobs->Employees->find('list');
        $this->loadModel('Contacts');
        $contacts = $this->Contacts->find('list');
        $this->loadModel('CustTypes');
        $custTypes = $this->CustTypes->find('list');
        $this->set(compact('job', 'sites', 'eventTypes', 'customers', 'employees','custTypes','contacts'));
        $this->set('statusOptions', array('Quote' => 'Quote', 'Order'=>'Order', 'Ready'=>'Ready', 'Completed'=>'Completed', 'Invoice'=>'Invoice', 'Paid'=>'Paid'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Job id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {   if($this->Auth->user('access_level')=='3'){
        $this->Flash->set(__('You have no authorization to access this page as a field staff'));
        return $this->redirect($this->Auth->redirectUrl());
    }

        $job = $this->Jobs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $job = $this->Jobs->patchEntity($job, $this->request->getData());
            $job->last_changed = Time::now();
            $this->loadModel('Employees');
            $staff = $this->Employees->get($this->Auth->user('id'));
            $job->edited_by = $staff->full_name;

            if ($this->Jobs->save($job)) {
                $this->Flash->success(__('The job has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The job could not be saved. Please, try again.'));
        }
        $sites = $this->Jobs->Sites->find('list');
        $eventTypes = $this->Jobs->EventTypes->find('list');
        $customers = $this->Jobs->Customers->find('list');
        $employees = $this->Jobs->Employees->find('list');
        $this->loadModel('CustTypes');
        $custTypes = $this->CustTypes->find('list');
        $this->set(compact('job', 'sites', 'eventTypes', 'customers', 'employees', 'custTypes'));
        $this->set('statusOptions', array('Quote' => 'Quote', 'Order'=>'Order', 'Ready'=>'Ready', 'Completed'=>'Completed', 'Invoice'=>'Invoice', 'Paid'=>'Paid'));
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
        if($this->Auth->user('access_level')=='3'){
            $this->Flash->set(__('You have no authorization to access this page as a field staff'));
            return $this->redirect($this->Auth->redirectUrl());
        }

        $this->request->allowMethod(['get', 'delete']);

        $job = $this->Jobs->get($id);

        $job->last_changed = Time::now();
        $this->loadModel('Employees');
        $staff = $this->Employees->get($this->Auth->user('id'));
        $job->edited_by = $staff->full_name;

        if ($this->Jobs->save($job)) {
            $this->Flash->success(__('The job has been deleted.'));
            return $this->redirect(['action' => 'index']);
        }
        $this->Flash->error(__('The job could not be deleted. Please, try again.'));

        return $this->redirect(['action' => 'index']);
    }


}
