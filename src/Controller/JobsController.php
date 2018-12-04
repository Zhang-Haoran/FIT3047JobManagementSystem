<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;
use Cake\ORM\TableRegistry;

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

        $jobs = $this->Jobs->find('all')
            ->contain(['Sites', 'EventTypes', 'Customers', 'Employees']);
        $this->set(compact('jobs'));
        $session = $this->getRequest()->getSession();
        $name = $session->read('Auth.User.access_level');
        $this->set('name', $name);

        if($this->Auth->user('access_level')=='3'){
            $this->render('fieldstaffdashboard');
        }
        elseif($this->Auth->user('access_level')=='2'){
            $this->render('officestaffdashboard');
        }
        elseif($this->Auth->user('access_level')=='1'){
            $this->render('admindashboard');
        }


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

        $customers = $this->Jobs->Customers->find('all', [
            'contain' => ['CustTypes'],
            'keyField' => 'id',
            'valueField' => function ($customer) {
                return $customer->get('label');
            }
        ]);
        $employees = $this->Jobs->Employees->find('list');
        $this->loadModel('Contacts');
        $contacts = $this->Contacts->find('list', [
            'keyField' => 'id',
            'valueField' => function ($contact) {
                return $contact->get('label');
            }
        ]);
        $this->loadModel('CustTypes');
        $CustTypes = $this->CustTypes->find('list');
        $this->set(compact('job', 'sites', 'eventTypes', 'customers', 'employees','CustTypes','contacts'));
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
    {
        if ($this->Auth->user('access_level') == '3') {
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
                $date1 = $this->Jobs->get($id)->e_arrival_time;
                $date2 = $this->Jobs->get($id)->e_setup_time;
                if (strtotime($date1)<= strtotime($date2)){

                    $this->Flash->success(__('The job has been saved.'));
                    return $this->redirect(['action' => 'index']);
                }elseif(strtotime($date1)> strtotime($date2)){
                    $this->Flash->error(__('The expected setup time should be after arrival time. Please, try again.'));
                }
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
        $customers = $this->Jobs->Customers->find('all', [
            'contain' => ['CustTypes'],
            'keyField' => 'id',
            'valueField' => function ($customer) {
                return $customer->get('label');
            }
        ]);
        $employees = $this->Jobs->Employees->find('list');
        $this->loadModel('CustTypes');
        $custTypes = $this->CustTypes->find('list');
        $this->loadModel('Contacts');
        $contacts = $this->Contacts->find('list');
        $this->set(compact('job', 'sites', 'eventTypes', 'customers', 'employees', 'custTypes','contacts'));
        $status = $this->Jobs->get($id)->job_status;
        if ($status == 'Quote'){
            $this->set('statusOptions', array('Quote' => 'Quote', 'Order'=>'Order'));
        }
        elseif ($status == 'Order'){
            $this->set('statusOptions', array('Order'=>'Order', 'Ready'=>'Ready'));
        }
        elseif ($status == 'Ready'){
            $this->set('statusOptions', array('Ready'=>'Ready', 'Completed'=>'Completed'));
        }
        elseif ($status == 'Completed'){
            $this->set('statusOptions', array('Completed'=>'Completed', 'Invoice'=>'Invoice'));
        }
        else{
            $this->set('statusOptions', array('Invoice'=>'Invoice', 'Paid'=>'Paid'));
        }
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
        $job->is_deleted = '1';


        if ($this->Jobs->save($job)) {
            $this->Flash->success(__('The job has been deleted.'));
            return $this->redirect(['action' => 'index']);
        }
        $this->Flash->error(__('The job could not be deleted. Please, try again.'));

        return $this->redirect(['action' => 'index']);
    }

    public function addpickup()
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

        $customers = $this->Jobs->Customers->find('all', [
            'contain' => ['CustTypes'],
            'keyField' => 'id',
            'valueField' => function ($customer) {
                return $customer->get('label');
            }
        ]);
        $employees = $this->Jobs->Employees->find('list');
        $this->loadModel('Contacts');
        $contacts = $this->Contacts->find('list', [
            'keyField' => 'id',
            'valueField' => function ($contact) {
                return $contact->get('label');
            }
        ]);
        $this->loadModel('CustTypes');
        $CustTypes = $this->CustTypes->find('list');
        $this->set(compact('job', 'sites', 'eventTypes', 'customers', 'employees','CustTypes','contacts'));
        $this->set('statusOptions', array('Quote' => 'Quote', 'Order'=>'Order', 'Ready'=>'Ready', 'Completed'=>'Completed', 'Invoice'=>'Invoice', 'Paid'=>'Paid'));
    }

    public function undelete($id = null)
    {
        if($this->Auth->user('access_level')!='1'){
            $this->Flash->set(__('You have no authorization to access this page as a field staff'));
            return $this->redirect($this->Auth->redirectUrl());
        }

        $this->request->allowMethod(['get', 'delete']);

        $job = $this->Jobs->get($id);

        $job->last_changed = Time::now();
        $this->loadModel('Employees');
        $staff = $this->Employees->get($this->Auth->user('id'));
        $job->edited_by = $staff->full_name;
        $job->is_deleted = '0';


        if ($this->Jobs->save($job)) {
            $this->Flash->success(__('The job has been undeleted.'));
            return $this->redirect(['action' => 'index']);
        }
        $this->Flash->error(__('The job could not be undeleted. Please, try again.'));

        return $this->redirect(['action' => 'index']);

    }






    public function editpickup($id = null){
        if ($this->Auth->user('access_level') == '3') {
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
        $sites = $this->Jobs->Sites->find('list', [
            'keyField' => 'id',
            'valueField' => function ($site) {
                return $site->get('label');
            }
        ]);
        $eventTypes = $this->Jobs->EventTypes->find('list');
        $customers = $this->Jobs->Customers->find('all', [
            'contain' => ['CustTypes'],
            'keyField' => 'id',
            'valueField' => function ($customer) {
                return $customer->get('label');
            }
        ]);
        $employees = $this->Jobs->Employees->find('list');
        $this->loadModel('CustTypes');
        $custTypes = $this->CustTypes->find('list');
        $this->loadModel('Contacts');
        $contacts = $this->Contacts->find('list');
        $this->set(compact('job', 'sites', 'eventTypes', 'customers', 'employees', 'custTypes','contacts'));
        $status = $this->Jobs->get($id)->job_status;
        if ($status == 'Quote'){
            $this->set('statusOptions', array('Quote' => 'Quote', 'Order'=>'Order'));
        }
        elseif ($status == 'Order'){
            $this->set('statusOptions', array('Order'=>'Order', 'Ready'=>'Ready'));
        }
        elseif ($status == 'Ready'){
            $this->set('statusOptions', array('Ready'=>'Ready', 'Completed'=>'Completed'));
        }
        elseif ($status == 'Completed'){
            $this->set('statusOptions', array('Completed'=>'Completed', 'Invoice'=>'Invoice'));
        }
        else{
            $this->set('statusOptions', array('Invoice'=>'Invoice', 'Paid'=>'Paid'));
        }
    }

    public function viewpickup($id = null)
    {
        $job = $this->Jobs->get($id, [
            'contain' => ['Sites', 'EventTypes', 'Customers', 'Employees', 'Images']
        ]);

        $this->set('job', $job);
    }

    public function orderview($id = null)
    {
        $job = $this->Jobs->get($id, [
            'contain' => ['Sites', 'EventTypes', 'Customers', 'Employees', 'Images','Contacts']
        ]);

        $this->loadModel('Sites');
        $site = $this->Sites->get($job->site_id);

        $this->set('site', $site);
        $this->set('job', $job);
    }
    public function exportJobData(){
        $datatbp = '<table cellspacing="2" cellpadding="5" style="border: 2px;text-align: center;" border="1",width="60%">';

        $datatbp .='<tr>

                       <th style="text-align: center">Job Name</th>
                       <th style="text-align: center">Status</th>
                       <th style="text-align: center">Job Date</th>
                       <th style="text-align: center">Booked Date</th>
                       <th style="text-align: center">Price</th>
                       <th style="text-align: center">Deposit</th>
                       <th style="text-align: center">Expected arrival time</th>

                    </tr>';

        $contents = $this->Jobs->find('all')->toArray();
        foreach ($contents as $content){
            $jobName = $content['name'];
            $jobStatus = $content['job_status'];
            $jobDate = $content['job_date'];
            $bookedDate = $content['booked_date'];
            $price = $content['price'];
            $deposit = $content['deposit'];
            $exArrivalTime = $content['e_arrival_time'];

            $datatbp .='<tr>

                       <td style="text-align: center">'. $jobName.'</td>
                       <td style="text-align: center">'. $jobStatus.'</td>
                       <td style="text-align: center">'. $jobDate.'</td>
                       <td style="text-align: center">'. $bookedDate.'</td>
                       <td style="text-align: center">'. $price.'</td>
                       <td style="text-align: center">'. $deposit.'</td>
                       <td style="text-align: center">'. $exArrivalTime.'</td>

                    </tr>';
        }
        $datatbp .="</table>";
        header('Content-Type: application/force-download');
        header('Content-disposition: attachment; filename= jobs.xls');
        header("Pragma: ");
        header("Cache-Control: ");
        echo $datatbp;
        die;
    }

}
