<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Contacts Controller
 *
 * @property \App\Model\Table\ContactsTable $Contacts
 *
 * @method \App\Model\Entity\Contact[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ContactsController extends AppController
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

        $contacts = $this->Contacts->find('all')->contain(['Jobs']);

        $this->set(compact('contacts'));
    }

    /**
     * View method
     *
     * @param string|null $id Contact id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        if($this->Auth->user('access_level')=='3'){
            $this->Flash->set(__('You have no authorization to access this page as a field staff'));
            return $this->redirect($this->Auth->redirectUrl());
        }

        $contact = $this->Contacts->get($id, [
            'contain' => ['Jobs']
        ]);

        $this->set('contact', $contact);
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

        $contact = $this->Contacts->newEntity();
        if ($this->request->is('post')) {
            $contact = $this->Contacts->patchEntity($contact, $this->request->getData());
            if ($this->Contacts->save($contact)) {
                $this->Flash->success(__('The contact has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The contact could not be saved. Please, try again.'));
        }
        $jobs = $this->Contacts->Jobs->find('list', ['limit' => 200]);
        $this->set(compact('contact', 'jobs'));
    }

    public function jobAdd()

    {
        if ($this->Auth->user('access_level') == '3') {
            $message = ['error' => 'You have no authorization to access this page as a field staff'];
        } else {
            //If user has right to add eventtype
            $contacts = $this->Contacts->newEntity();
            if ($this->request->is('post')) {
                $contacts = $this->Contacts->patchEntity($contacts, $this->request->getData());
                $save = $this->Contacts->save($contacts);
                if ($save) {
                    $message = ['id' => $save->id, 'firstname' => $save->fname, 'lastname' => $save->lname, 'phone' => $save->phone, 'email' => $save->email,
                        'role' => $save->role,  'street' => $save->street, 'suburb' => $save->suburb, 'surburb' => $save->suburb, 'city' => $save->city,
                        'postcode' => $save->postcode, 'error' => false];
                } else {
                    $message = ['error' => 'Cannot save Contacts'];
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



//    {
//        if($this->Auth->user('access_level')=='3'){
//            $this->Flash->set(__('You have no authorization to access this page as a field staff'));
//            return $this->redirect($this->Auth->redirectUrl());
//        }
//
//        $contacts = $this->Contacts->newEntity();
//        if ($this->request->is('post')) {
//            $contacts = $this->Contacts->patchEntity($contacts, $this->request->getData());
//            if ($this->Contacts->save($contacts)) {
//                $this->Flash->success(__('The contact has been saved.'));
//
//                return $this->redirect($this->referer());
//            }
//            $this->Flash->error(__('The contact could not be saved. Please, try again.'));
//        }
//
//        $this->set(compact('contacts'));
//    }

    /**
     * Edit method
     *
     * @param string|null $id Contact id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        if($this->Auth->user('access_level')=='3'){
            $this->Flash->set(__('You have no authorization to access this page as a field staff'));
            return $this->redirect($this->Auth->redirectUrl());
        }

        $contact = $this->Contacts->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $contact = $this->Contacts->patchEntity($contact, $this->request->getData());
            if ($this->Contacts->save($contact)) {
                $this->Flash->success(__('The contact has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The contact could not be saved. Please, try again.'));
        }
        $jobs = $this->Contacts->Jobs->find('list', ['limit' => 200]);
        $this->set(compact('contact', 'jobs'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Contact id.
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
        $contact = $this->Contacts->get($id);
        if ($this->Contacts->delete($contact)) {
            $this->Flash->success(__('The contact has been deleted.'));
        } else {
            $this->Flash->error(__('The contact could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
