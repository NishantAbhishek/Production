<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Event\EventInterface;
use Cake\ORM\TableRegistry;

// Import the EventInterface class from CakePHP


// Import the EventInterface class from CakePHP


/**
 * MovingOrders Controller
 *
 * @property \App\Model\Table\MovingOrdersTable $MovingOrders
 * @method \App\Model\Entity\MovingOrder[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MovingOrdersController extends AppController
{

    public function beforeFilter(EventInterface $event)
    {
        parent::beforeFilter($event);

        if ($this->request->getAttribute('action') == 'add') {
            return;
        }

        if (!$this->Authentication->getResult()->isValid()) {

            return $this->redirect(['controller' => 'Auth', 'action' => 'login']);
        }
//        $user = $this->request->getAttribute('identity');
//        $userRole = $user->user_level;
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
        $user = $this->request->getAttribute('identity');
        if($user){
            if($user->user_level == 'admin'){
                $movingOrders = $this->MovingOrders->find()->contain('Users');
                $this->set(compact('movingOrders','user'));
            }else{
                $loggedInUserId = $user->id;

                $this->paginate = [
                    'contain' => ['Users'],
                    'conditions' => ['MovingOrders.user_id' => $loggedInUserId], // Filter inquiries by user ID
                ];
                $movingOrders = $this->paginate($this->MovingOrders);
                $this->set(compact('movingOrders','user'));
            }
        }

    }

    /**
     * View method
     *
     * @param string|null $id Moving Order id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->request->getAttribute('identity');

        $movingOrder = $this->MovingOrders->get($id, [
            'contain' => ['Users', 'Staffs', 'Vehicles'],
        ]);
        $status = $this->calculateStatus($id);

        $this->set(compact('movingOrder','user','status'));

    }

    public function calculateStatus($movingOrderId)
    {
        // Load the MovingOrdersStaffs table
        $movingOrdersStaffsTable = TableRegistry::getTableLocator()->get('MovingOrdersStaffs');

        $workingStaffCount = $movingOrdersStaffsTable
            ->find()
            ->where(['moving_order_id' => $movingOrderId, 'mo_staff_status' => 'working'])
            ->count();

        if ($workingStaffCount > 0) {
            return 'Working';
        }

        $finishedStaffCount = $movingOrdersStaffsTable
            ->find()
            ->where(['moving_order_id' => $movingOrderId, 'mo_staff_status' => 'finished'])
            ->count();

        if ($finishedStaffCount > 0) {
            return 'Finished';
        }

        return 'Assigned'; // Default status
    }
    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($date = null)
    {
        $movingOrder = $this->MovingOrders->newEmptyEntity();


        if ($date) {
            // Convert the date to the desired format if needed
            $this->set('passedDate', $date);
        }


        if ($this->request->is('post')) {
            $movingOrder = $this->MovingOrders->patchEntity($movingOrder, $this->request->getData());
            if ($this->MovingOrders->save($movingOrder)) {
                $this->Flash->success(__('Moving booking has been submitted. We will let you know when it has been confirmed.'));

                return $this->redirect(['controller' => 'pages', 'action' => 'bookingconfirmation']);
            }
            $this->Flash->error(__('The moving order could not be saved. Please, try again.'));
        }

        $user = $this->request->getAttribute('identity');

        $users = $this->MovingOrders->Users->find('list', [
            'conditions' => ['id' => $user->id],
            'keyField' => 'id',
            'valueField' => 'user_name',
            'limit' => 1
        ])->all();

        $staffs = $this->MovingOrders->Staffs->find('list', ['limit' => 200])->all();
        $vehicles = $this->MovingOrders->Vehicles->find('list', ['limit' => 200])->all();
        $this->set(compact('movingOrder', 'users', 'staffs', 'vehicles'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Moving Order id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $movingOrder = $this->MovingOrders->get($id, [
            'contain' => ['Staffs', 'Vehicles'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $movingOrder = $this->MovingOrders->patchEntity($movingOrder, $this->request->getData());
            if ($this->MovingOrders->save($movingOrder)) {
                $this->Flash->success(__('The moving order has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The moving order could not be saved. Please, try again.'));
        }
        $users = $this->MovingOrders->Users->find('list', ['limit' => 200])->all();
//        $staffs = $this->MovingOrders->Users->find('list', ['limit' => 200])->all();
        $staffs = $this->MovingOrders->Staffs->find('list', [
            'keyField' => 'id', // Use 'id' as the key
            'valueField' => function ($staff) {
                return $staff->staff_name . ' (' . $staff->staff_email . ', ID: ' . $staff->id . ')';
            }, // Combine 'staff_name', 'email', and 'id' in the desired order
            'limit' => 200,
        ])->toArray();

        $vehicles = $this->MovingOrders->Vehicles->find('list', [
            'keyField' => 'id', // Use 'id' as the key
            'valueField' => function ($vehicle) {
                return $vehicle->vehicle_model . ' (ID: ' . $vehicle->id . ', Rego: ' . $vehicle->vehicle_rego . ')';
            }, // Combine 'vehicle_model', 'id', and 'vehicle_rego'
            'limit' => 200,
        ])->toArray();


        $this->set(compact('movingOrder', 'users', 'staffs', 'vehicles'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Moving Order id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $movingOrder = $this->MovingOrders->get($id);
        if ($this->MovingOrders->delete($movingOrder)) {
            $this->Flash->success(__('The moving order has been deleted.'));
        } else {
            $this->Flash->error(__('The moving order could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }


}
