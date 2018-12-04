<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Images Controller
 *
 * @property \App\Model\Table\ImagesTable $Images
 *
 * @method \App\Model\Entity\Image[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ImagesController extends AppController
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

        $images = $this->Images->find('all')->contain(['Jobs']);

        $this->set(compact('images'));
    }

    /**
     * View method
     *
     * @param string|null $id Image id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        if($this->Auth->user('access_level')=='3'){
            $this->Flash->set(__('You have no authorization to access this page as a field staff'));
            return $this->redirect($this->Auth->redirectUrl());
        }

        $image = $this->Images->get($id, [
            'contain' => ['Jobs']
        ]);

        $this->set('image', $image);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($jobId = null)
    {
        if ($this->Auth->user('access_level') == '3') {
            $this->Flash->set(__('You have no authorization to access this page as a field staff'));
            return $this->redirect($this->Auth->redirectUrl());
        }

        $image = $this->Images->newEntity();
        if ($this->request->is('post')) {

            $imageName = $this->request->getData()['path']['name'];

            $ext = substr(strtolower(strrchr($imageName, '.')), 1);
            $arr_ext = array('jpg', 'png', 'jpeg', 'gif');
            if (in_array($ext, $arr_ext)) {


                $imageTep = $this->request->getData()['path']['tmp_name'];


                $image = $this->Images->patchEntity($image, $this->request->getData());
                $this->loadModel('Jobs');

                $dir = '/img' . $imageName;
                $image->description = $imageName;
                $image->path = $dir;
                $image->job_id = $jobId;

                if (move_uploaded_file($imageTep, WWW_ROOT . $dir)) {
                    $this->Images->save($image);
                    $this->Flash->success(__('The image has been saved.'));

                    return $this->redirect(['controller' => 'jobs', 'action' => 'view', $jobId]);
                } else {
                    $this->Flash->error(__('The image could not be saved. Please, try again.'));
                }
                return $this->redirect(['controller' => 'jobs', 'action' => 'view', $jobId]);
            } else {
                $this->Flash->error(__('the format of image is not correct'));
            }
        }
        $jobs = $this->Images->Jobs->find('list', ['limit' => 200]);
        $this->set(compact('image', 'jobs'));
    }
    /**
     * Edit method
     *
     * @param string|null $id Image id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        if($this->Auth->user('access_level')=='3'){
            $this->Flash->set(__('You have no authorization to access this page as a field staff'));
            return $this->redirect($this->Auth->redirectUrl());
        }

        $image = $this->Images->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $image = $this->Images->patchEntity($image, $this->request->getData());
            if ($this->Images->save($image)) {
                $this->Flash->success(__('The image has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The image could not be saved. Please, try again.'));
        }
        $jobs = $this->Images->Jobs->find('list', ['limit' => 200]);
        $this->set(compact('image', 'jobs'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Image id.
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
        $image = $this->Images->get($id);
        if ($this->Images->delete($image)) {
            $this->Flash->success(__('The image has been deleted.'));
        } else {
            $this->Flash->error(__('The image could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }


}
