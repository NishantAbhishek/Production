<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Event\EventInterface; // Import the EventInterface class from CakePHP




/**
 * Staffs Controller
 *
 * @property \App\Model\Table\StaffsTable $Staffs
 * @method \App\Model\Entity\Staff[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class StaffsController extends AppController
{

    public function beforeFilter(EventInterface $event)
    {
        parent::beforeFilter($event);

        if (!$this->Authentication->getResult()->isValid()) {

            return $this->redirect(['controller' => 'Auth', 'action' => 'login']);
        }

        $user = $this->request->getAttribute('identity');
        $userRole = $user->user_level;
        if ($userRole != 'admin') {

            $this->Flash->error('Access denied. You must be an admin to access this page.');
            return $this->redirect(['controller' => 'Pages', 'action' => 'home']);
        }
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $staffs = $this->paginate($this->Staffs);

        $this->set(compact('staffs'));
    }



    /**
     * View method
     *
     * @param string|null $id Staff id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $staff = $this->Staffs->get($id, [
            'contain' => ['MovingOrders', 'StorageOrders'],
        ]);

        $this->set(compact('staff'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $staff = $this->Staffs->newEmptyEntity();
        if ($this->request->is('post')) {
            $staff = $this->Staffs->patchEntity($staff, $this->request->getData());
            if ($this->Staffs->save($staff)) {
                $this->Flash->success(__('The staff has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The staff could not be saved. Please, try again.'));
        }
        $movingOrders = $this->Staffs->MovingOrders->find('list', ['limit' => 200])->all();
        $this->set(compact('staff', 'movingOrders'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Staff id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $staff = $this->Staffs->get($id, [
            'contain' => ['MovingOrders'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $staff = $this->Staffs->patchEntity($staff, $this->request->getData());
            if ($this->Staffs->save($staff)) {
                $this->Flash->success(__('The staff has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The staff could not be saved. Please, try again.'));
        }
        $movingOrders = $this->Staffs->MovingOrders->find('list', ['limit' => 200])->all();
        $this->set(compact('staff', 'movingOrders'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Staff id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $staff = $this->Staffs->get($id);
        if ($this->Staffs->delete($staff)) {
            $this->Flash->success(__('The staff has been deleted.'));
        } else {
            $this->Flash->error(__('The staff could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
