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
        if($this->Auth->user('access_level')=='3'){
            $this->Flash->set(__('You have no authorization to access this page as a field staff'));
            return $this->redirect($this->Auth->redirectUrl());
        }

        $custTypes = $this->CustTypes->find('all');

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
        if($this->Auth->user('access_level')=='3'){
            $this->Flash->set(__('You have no authorization to access this page as a field staff'));
            return $this->redirect($this->Auth->redirectUrl());
        }

        $custType = $this->CustTypes->get($id, [
            'contain' => ['Customers']
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
        if($this->Auth->user('access_level')=='3'){
            $this->Flash->set(__('You have no authorization to access this page as a field staff'));
            return $this->redirect($this->Auth->redirectUrl());
        }

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


    public function CustTypesAdd()
    {
        if ($this->Auth->user('access_level') == '3') {
            $message = ['error' => 'You have no authorization to access this page as a field staff'];
        } else {
            //If user has right to add customer type
            $custType = $this->CustTypes->newEntity();
            if ($this->request->is('post')) {
                $custType = $this->CustTypes->patchEntity($custType, $this->request->getData());
                $save = $this->CustTypes->save($custType);
                if ($save) {
                    $message = ['id' => $save->id, 'name' => $save->name, 'error' => false];
                } else {
                    $message = ['error' => 'Cannot save Customer Type'];
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
//        $custType = $this->CustTypes->newEntity();
//        if ($this->request->is('post')) {
//            $custType = $this->CustTypes->patchEntity($custType, $this->request->getData());
//            if ($this->CustTypes->save($custType)) {
//                $this->Flash->success(__('The cust type has been saved.'));
//
//                return $this->redirect(['action' => 'index']);
//            }
//            $this->Flash->error(__('The cust type could not be saved. Please, try again.'));
//        }
//        $this->set(compact('custType'));
//    }
//





    /**
     * Edit method
     *
     * @param string|null $id Cust Type id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        if($this->Auth->user('access_level')=='3'){
            $this->Flash->set(__('You have no authorization to access this page as a field staff'));
            return $this->redirect($this->Auth->redirectUrl());
        }

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
        if($this->Auth->user('access_level')=='3'){
            $this->Flash->set(__('You have no authorization to access this page as a field staff'));
            return $this->redirect($this->Auth->redirectUrl());
        }

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
