<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * MaterialLines Controller
 *
 * @property \App\Model\Table\MaterialLinesTable $MaterialLines
 *
 * @method \App\Model\Entity\MaterialLine[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MaterialLinesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Materials', 'Jobs']
        ];
        $materialLines = $this->paginate($this->MaterialLines);

        $this->set(compact('materialLines'));
    }

    /**
     * View method
     *
     * @param string|null $id Material Line id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $materialLine = $this->MaterialLines->get($id, [
            'contain' => ['Materials', 'Jobs']
        ]);

        $this->set('materialLine', $materialLine);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $materialLine = $this->MaterialLines->newEntity();
        if ($this->request->is('post')) {
            $materialLine = $this->MaterialLines->patchEntity($materialLine, $this->request->getData());
            if ($this->MaterialLines->save($materialLine)) {
                $this->Flash->success(__('The material line has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The material line could not be saved. Please, try again.'));
        }
        $materials = $this->MaterialLines->Materials->find('list', ['limit' => 200]);
        $jobs = $this->MaterialLines->Jobs->find('list', ['limit' => 200]);
        $this->set(compact('materialLine', 'materials', 'jobs'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Material Line id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $materialLine = $this->MaterialLines->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $materialLine = $this->MaterialLines->patchEntity($materialLine, $this->request->getData());
            if ($this->MaterialLines->save($materialLine)) {
                $this->Flash->success(__('The material line has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The material line could not be saved. Please, try again.'));
        }
        $materials = $this->MaterialLines->Materials->find('list', ['limit' => 200]);
        $jobs = $this->MaterialLines->Jobs->find('list', ['limit' => 200]);
        $this->set(compact('materialLine', 'materials', 'jobs'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Material Line id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $materialLine = $this->MaterialLines->get($id);
        if ($this->MaterialLines->delete($materialLine)) {
            $this->Flash->success(__('The material line has been deleted.'));
        } else {
            $this->Flash->error(__('The material line could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
