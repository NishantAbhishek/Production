<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Event\EventInterface; // Import the EventInterface class from CakePHP


/**
 * Stores Controller
 *
 * @property \App\Model\Table\StoresTable $Stores
 * @method \App\Model\Entity\Store[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class StoresController extends AppController
{
    public function beforeFilter(EventInterface $event)
    {
        parent::beforeFilter($event);

        if (!$this->Authentication->getResult()->isValid()) {

            return $this->redirect(['controller' => 'Auth', 'action' => 'login']);
        }
        $user = $this->request->getAttribute('identity');
        $userRole = $user->user_level;
//        if ($userRole != 'admin') {
//
//            $this->Flash->error('Access denied. You must be an admin to access this page.');
//            return $this->redirect(['controller' => 'Pages', 'action' => 'home']);
//        }
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $stores = $this->paginate($this->Stores);

        $this->set(compact('stores'));
    }



    /**
     * View method
     *
     * @param string|null $id Store id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->request->getAttribute('identity');

        $store = $this->Stores->get($id, [
            'contain' => ['Units'],
        ]);

        $this->set(compact('store','user'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $store = $this->Stores->newEmptyEntity();
        if ($this->request->is('post')) {
            $store = $this->Stores->patchEntity($store, $this->request->getData());
            if ($this->Stores->save($store)) {
                $this->Flash->success(__('The store has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The store could not be saved. Please, try again.'));
        }
        $this->set(compact('store'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Store id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $store = $this->Stores->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $store = $this->Stores->patchEntity($store, $this->request->getData());
            if ($this->Stores->save($store)) {
                $this->Flash->success(__('The store has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The store could not be saved. Please, try again.'));
        }
        $this->set(compact('store'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Store id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $store = $this->Stores->get($id);
        if ($this->Stores->delete($store)) {
            $this->Flash->success(__('The store has been deleted.'));
        } else {
            $this->Flash->error(__('The store could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
