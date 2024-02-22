<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Event\EventInterface;
use Cake\I18n\Time;



/**
 * MovingOrdersStaffs Controller
 *
 * @property \App\Model\Table\MovingOrdersStaffsTable $MovingOrdersStaffs
 * @method \App\Model\Entity\MovingOrdersStaff[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MovingOrdersStaffsController extends AppController
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
        $this->paginate = [
            'contain' => ['Staffs', 'MovingOrders'],
        ];
        $movingOrdersStaffs = $this->paginate($this->MovingOrdersStaffs);

        $this->set(compact('movingOrdersStaffs'));
    }

    /**
     * View method
     *
     * @param string|null $id Moving Orders Staff id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $movingOrdersStaff = $this->MovingOrdersStaffs->get($id, [
            'contain' => ['Staffs', 'MovingOrders'],
        ]);

        $this->set(compact('movingOrdersStaff'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $movingOrdersStaff = $this->MovingOrdersStaffs->newEmptyEntity();
        if ($this->request->is('post')) {
            $movingOrdersStaff = $this->MovingOrdersStaffs->patchEntity($movingOrdersStaff, $this->request->getData());
            if ($this->MovingOrdersStaffs->save($movingOrdersStaff)) {
                $this->Flash->success(__('Booking confirmed for Moving Service.')); // k

                return $this->redirect(['controller' => 'pages', 'action' => 'bookingconfirmation']); // k
            }
            $this->Flash->error(__('The moving orders staff could not be saved. Please, try again.'));
        }
        $staffs = $this->MovingOrdersStaffs->Staffs->find('list', ['limit' => 200])->all();
        $movingOrders = $this->MovingOrdersStaffs->MovingOrders->find('list', ['limit' => 200])->all();
        $this->set(compact('movingOrdersStaff', 'staffs', 'movingOrders'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Moving Orders Staff id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $movingOrdersStaff = $this->MovingOrdersStaffs->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $movingOrdersStaff = $this->MovingOrdersStaffs->patchEntity($movingOrdersStaff, $this->request->getData());
            if ($this->MovingOrdersStaffs->save($movingOrdersStaff)) {
                $this->Flash->success(__('The moving orders staff has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The moving orders staff could not be saved. Please, try again.'));
        }
        $staffs = $this->MovingOrdersStaffs->Staffs->find('list', ['limit' => 200])->all();
        $movingOrders = $this->MovingOrdersStaffs->MovingOrders->find('list', ['limit' => 200])->all();
        $this->set(compact('movingOrdersStaff', 'staffs', 'movingOrders'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Moving Orders Staff id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $movingOrdersStaff = $this->MovingOrdersStaffs->get($id);
        if ($this->MovingOrdersStaffs->delete($movingOrdersStaff)) {
            $this->Flash->success(__('The moving orders staff has been deleted.'));
        } else {
            $this->Flash->error(__('The moving orders staff could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function checkAvailability()
    {
        // Load the MovingOrdersStaffs and Staff models
        $this->loadModel('MovingOrdersStaffs');
        $this->loadModel('Staffs');

        // Fetch all staff ids
        $allStaffIds = $this->Staffs->find('list', [
            'keyField' => 'id',
            'valueField' => 'id',
        ])->toArray();

        // Initialize the availability array
        $staffAvailability = [];

        // Check the availability for the next 14 days
        for ($i = 0; $i < 14; $i++) {
            // Define the time mark for the current day
            $timeMark = new Time('now + ' . $i . ' days');

            // Fetch all moving orders staff and their associated moving orders for the current day
            $movingOrdersStaffs = $this->MovingOrdersStaffs->find('all', [
                'contain' => ['MovingOrders'],
                'conditions' => [
                    'OR' => [
                        'MovingOrders.mo_start_time <=' => $timeMark,
                        'MovingOrders.mo_end_time >=' => $timeMark,
                    ],
                ],
            ]);

            // Initialize the list of staff ids for the current day
            $staffIds = [];

            // Loop through the moving orders staff and append the staff ids to the list
            foreach ($movingOrdersStaffs as $movingOrdersStaff) {
                $staffIds[] = $movingOrdersStaff->staff_id;
            }

            // Compare the list of staff ids for the current day to the total list of staff ids and set the availability
            $staffAvailability[$timeMark->i18nFormat('yyyy-MM-dd')] = array_diff($allStaffIds, $staffIds);
        }

        // Set the staff availability variable to be available in the view
        $this->set(compact('staffAvailability'));

        // Render the check_availability.php view
        $this->render('check_availability.php');
    }

}
