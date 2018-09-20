<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * StockLines Controller
 *
 * @property \App\Model\Table\StockLinesTable $StockLines
 *
 * @method \App\Model\Entity\StockLine[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class StockLinesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Stocks', 'Jobs']
        ];
        $stockLines = $this->paginate($this->StockLines);

        $this->set(compact('stockLines'));
    }

    /**
     * View method
     *
     * @param string|null $id Stock Line id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $stockLine = $this->StockLines->get($id, [
            'contain' => ['Stocks', 'Jobs']
        ]);

        $this->set('stockLine', $stockLine);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $stockLine = $this->StockLines->newEntity();
        if ($this->request->is('post')) {
            $stockLine = $this->StockLines->patchEntity($stockLine, $this->request->getData());
            if ($this->StockLines->save($stockLine)) {
                $this->Flash->success(__('The stock line has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The stock line could not be saved. Please, try again.'));
        }
        $stocks = $this->StockLines->Stocks->find('list', ['limit' => 200]);
        $jobs = $this->StockLines->Jobs->find('list', ['limit' => 200]);
        $this->set(compact('stockLine', 'stocks', 'jobs'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Stock Line id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $stockLine = $this->StockLines->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $stockLine = $this->StockLines->patchEntity($stockLine, $this->request->getData());
            if ($this->StockLines->save($stockLine)) {
                $this->Flash->success(__('The stock line has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The stock line could not be saved. Please, try again.'));
        }
        $stocks = $this->StockLines->Stocks->find('list', ['limit' => 200]);
        $jobs = $this->StockLines->Jobs->find('list', ['limit' => 200]);
        $this->set(compact('stockLine', 'stocks', 'jobs'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Stock Line id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $stockLine = $this->StockLines->get($id);
        if ($this->StockLines->delete($stockLine)) {
            $this->Flash->success(__('The stock line has been deleted.'));
        } else {
            $this->Flash->error(__('The stock line could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
