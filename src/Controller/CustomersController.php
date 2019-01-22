<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Customers Controller
 *
 * @property \App\Model\Table\CustomersTable $Customers
 *
 * @method \App\Model\Entity\Customer[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CustomersController extends AppController
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

        $customers = $this->Customers->find('all')->contain(['CustTypes']);

        $this->set(compact('customers'));
    }

    /**
     * View method
     *
     * @param string|null $id Customer id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        if($this->Auth->user('access_level')=='3'){
            $this->Flash->set(__('You have no authorization to access this page as a field staff'));
            return $this->redirect($this->Auth->redirectUrl());
        }

        $customer = $this->Customers->get($id, [
            'contain' => ['CustTypes', 'Jobs']
        ]);

        $this->set('customer', $customer);
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

        $customer = $this->Customers->newEntity();
        if ($this->request->is('post')) {
            $customer = $this->Customers->patchEntity($customer, $this->request->getData());
            if ($this->Customers->save($customer)) {
                $this->Flash->success(__('The customer has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The customer could not be saved. Please, try again.'));
        }
        $custTypes = $this->Customers->CustTypes->find('list', ['limit' => 200]);
        $this->set(compact('customer', 'custTypes'));
    }

    public function CustAdd()

    {
        if ($this->Auth->user('access_level') == '3') {
            $message = ['error' => 'You have no authorization to access this page as a field staff'];
        } else {
            //If user has right to add customer
            $customer = $this->Customers->newEntity();
            if ($this->request->is('post')) {
                $customer = $this->Customers->patchEntity($customer, $this->request->getData());
                $save = $this->Customers->save($customer);
                if ($save) {
                    $message = ['id' => $save->id, 'name' => $save->name, 'is_business' => $save->is_business, 'error' => false];
                } else {
                    $message = ['error' => 'Cannot save Customer'];
                }
            } else {
                $message = ['error' => 'Invalid request, must be POST'];
            }
        }
        $this->set([
            'message' => $message,
            '_serialize' => 'message',
        ]);
        $this->RequestHandler->renderAs($this, 'json');
    }




    public function jobView($id = null)
    {
        if ($this->Auth->user('access_level') == '3') {
            $message = ['error' => 'You have no authorization to access this page as a field staff'];
        } else {
            //If user has right to add eventtype
            if ($this->request->is('get')) {
                $message = $this->Customers->get($id);
                $message['error'] = false;
            } else {
                $message = ['error' => 'Invalid request, must be GET'];
            }
        }
        $this->set([
            'message' => $message,
            '_serialize' => 'message',
        ]);
        $this->RequestHandler->renderAs($this, 'json');
    }



//    {
//        if($this->Auth->user('access_level')=='3'){
//            $this->Flash->set(__('You have no authorization to access this page as a field staff'));
//            return $this->redirect($this->Auth->redirectUrl());
//        }
//
//        $customer = $this->Customers->newEntity();
//        if ($this->request->is('post')) {
//            $customer = $this->Customers->patchEntity($customer, $this->request->getData());
//            if ($this->Customers->save($customer)) {
//                $this->Flash->success(__('The customer has been saved.'));
//
//                return $this->redirect($this->referer());
//            }
//            $this->Flash->error(__('The customer could not be saved. Please, try again.'));
//        }
//        $custTypes = $this->Customers->CustTypes->find('list');
//        $this->set(compact('customer', 'custTypes'));
//    }

    /**
     * Edit method
     *
     * @param string|null $id Customer id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        if($this->Auth->user('access_level')=='3'){
            $this->Flash->set(__('You have no authorization to access this page as a field staff'));
            return $this->redirect($this->Auth->redirectUrl());
        }

        $customer = $this->Customers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $customer = $this->Customers->patchEntity($customer, $this->request->getData());
            if ($this->Customers->save($customer)) {
                $this->Flash->success(__('The customer has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The customer could not be saved. Please, try again.'));
        }
        $custTypes = $this->Customers->CustTypes->find('list', ['limit' => 200]);
        $this->set(compact('customer', 'custTypes'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Customer id.
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
        $customer = $this->Customers->get($id);
        if ($this->Customers->delete($customer)) {
            $this->Flash->success(__('The customer has been deleted.'));
        } else {
            $this->Flash->error(__('The customer could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
