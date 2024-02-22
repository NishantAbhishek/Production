<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Units Controller
 *
 * @property \App\Model\Table\UnitsTable $Units
 * @method \App\Model\Entity\Unit[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UnitsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Stores'],
        ];
        $units = $this->paginate($this->Units);

        $this->set(compact('units'));
    }

    /**
     * View method
     *
     * @param string|null $id Unit id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->request->getAttribute('identity');
        $unit = $this->Units->get($id, [
            'contain' => ['Stores', 'StorageOrders'],
        ]);

        $this->set(compact('unit','user'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $unit = $this->Units->newEmptyEntity();
        if ($this->request->is('post')) {
            $unit = $this->Units->patchEntity($unit, $this->request->getData());
            if ($this->Units->save($unit)) {
                $this->Flash->success(__('The unit has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The unit could not be saved. Please, try again.'));
        }
        $stores = $this->Units->Stores->find('list', ['limit' => 200])->all();
        $this->set(compact('unit', 'stores'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Unit id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $unit = $this->Units->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $unit = $this->Units->patchEntity($unit, $this->request->getData());
            if ($this->Units->save($unit)) {
                $this->Flash->success(__('The unit has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The unit could not be saved. Please, try again.'));
        }
        $stores = $this->Units->Stores->find('list', ['limit' => 200])->all();
        $this->set(compact('unit', 'stores'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Unit id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $unit = $this->Units->get($id);
        if ($this->Units->delete($unit)) {
            $this->Flash->success(__('The unit has been deleted.'));
        } else {
            $this->Flash->error(__('The unit could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
