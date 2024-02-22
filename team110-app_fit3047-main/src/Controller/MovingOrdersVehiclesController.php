<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\I18n\Time;
use Cake\Event\EventInterface; // Import the EventInterface class from CakePHP



/**
 * MovingOrdersVehicles Controller
 *
 * @property \App\Model\Table\MovingOrdersVehiclesTable $MovingOrdersVehicles
 * @method \App\Model\Entity\MovingOrdersVehicle[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MovingOrdersVehiclesController extends AppController
{
    public function initialize(): void {
        parent::initialize();

        // By default, CakePHP will (sensibly) default to preventing users from accessing any actions on a controller.
        // These actions, however, are typically required for users who have not yet logged in.
        $this->Authentication->allowUnauthenticated(['checkCombinedAvailability']);
        // CakePHP loads the model with the same name as the controller by default.
        // Since we don't have an Auth model, we'll need to load "Users" model when starting the controller manually.
        //$this->Users = $this->fetchTable('Users');
    }

    public function beforeFilter(EventInterface $event)
    {
        parent::beforeFilter($event);

        if ($this->request->getParam('action') == 'checkCombinedAvailability') {
            return;
        }

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
            'contain' => ['Vehicles', 'MovingOrders'],
        ];
        $movingOrdersVehicles = $this->paginate($this->MovingOrdersVehicles);

        $this->set(compact('movingOrdersVehicles'));
    }

    /**
     * View method
     *
     * @param string|null $id Moving Orders Vehicle id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $movingOrdersVehicle = $this->MovingOrdersVehicles->get($id, [
            'contain' => ['Vehicles', 'MovingOrders'],
        ]);

        $this->set(compact('movingOrdersVehicle'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {

        $movingOrdersVehicle = $this->MovingOrdersVehicles->newEmptyEntity();
        if ($this->request->is('post')) {
            $movingOrdersVehicle = $this->MovingOrdersVehicles->patchEntity($movingOrdersVehicle, $this->request->getData());
            if ($this->MovingOrdersVehicles->save($movingOrdersVehicle)) {
                $this->Flash->success(__('The moving orders vehicle has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The moving orders vehicle could not be saved. Please, try again.'));
        }
        $vehicles = $this->MovingOrdersVehicles->Vehicles->find('list', ['limit' => 200])->all();
        $movingOrders = $this->MovingOrdersVehicles->MovingOrders->find('list', ['limit' => 200])->all();
        $this->set(compact('movingOrdersVehicle', 'vehicles', 'movingOrders'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Moving Orders Vehicle id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $movingOrdersVehicle = $this->MovingOrdersVehicles->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $movingOrdersVehicle = $this->MovingOrdersVehicles->patchEntity($movingOrdersVehicle, $this->request->getData());
            if ($this->MovingOrdersVehicles->save($movingOrdersVehicle)) {
                $this->Flash->success(__('The moving orders vehicle has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The moving orders vehicle could not be saved. Please, try again.'));
        }
        $vehicles = $this->MovingOrdersVehicles->Vehicles->find('list', ['limit' => 200])->all();
        $movingOrders = $this->MovingOrdersVehicles->MovingOrders->find('list', ['limit' => 200])->all();
        $this->set(compact('movingOrdersVehicle', 'vehicles', 'movingOrders'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Moving Orders Vehicle id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $movingOrdersVehicle = $this->MovingOrdersVehicles->get($id);
        if ($this->MovingOrdersVehicles->delete($movingOrdersVehicle)) {
            $this->Flash->success(__('The moving orders vehicle has been deleted.'));
        } else {
            $this->Flash->error(__('The moving orders vehicle could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }


    public function availability()
    {
        $this->loadModel('MovingOrdersVehicles');
        $this->loadModel('Vehicles');

        // Fetch all vehicle ids
        $allVehicleIds = $this->Vehicles->find('list', [
            'keyField' => 'id',
            'valueField' => 'id',
        ])->toArray();

        $availability = [];

        // Check the availability for the next 14 days
        for ($i = 0; $i < 14; $i++) {
            // Def the time mark for the current day
            $timeMark = new Time('now + ' . $i . ' days');// new Time('2023-09-02 00:00:00');

            // Fetch all mo vehicles and their associated moving orders for the given day
            $movingOrdersVehicles = $this->MovingOrdersVehicles->find('all', [
                'contain' => ['MovingOrders'],
                'conditions' => [
                    'OR' => [
                        'MovingOrders.mo_start_time <=' => $timeMark,
                        'MovingOrders.mo_end_time >=' => $timeMark,
                    ],
                ],
            ]);

            $vehicleIds = [];

            // Loop through the moving orders vehicles and append the vehicle ids to the list
            foreach ($movingOrdersVehicles as $movingOrdersVehicle) {
                $vehicleIds[] = $movingOrdersVehicle->vehicle_id;
            }

            // Compare the list of vehicle ids for the current day to the total list of vehicle ids and set the availability
            $availability[$timeMark->i18nFormat('yyyy-MM-dd')] = array_diff($allVehicleIds, $vehicleIds);
        }

        // Set the availability variable to be available in the view
        $this->set(compact('availability'));

        // Render the check_availability.php view
        $this->render('check_availability.php');
    }



    public function checkCombinedAvailability()
    {
        // Load the MovingOrdersVehicles, MovingOrdersStaffs, Vehicles, and Staff models
        $this->loadModel('MovingOrdersVehicles');
        $this->loadModel('MovingOrdersStaffs');
        $this->loadModel('Vehicles');
        $this->loadModel('Staffs');

        // Fetch all vehicle and staff ids
        $allVehicleIds = $this->Vehicles->find('list', [
            'keyField' => 'id',
            'valueField' => 'vehicle_rego',
        ])->toArray();
        $allStaffIds = $this->Staffs->find('list', [
            'keyField' => 'id',
            'valueField' => 'staff_name',
        ])->toArray();

//        print_r($allVehicleIds);
//        print_r($allStaffIds);
        // Initialize the availability array
        $combinedAvailability = [];

        // Check the availability for the next 14 days
        for ($i = 0; $i < 14; $i++) {

            // Define the time mark for the current day
            $timeMark = new Time('now + ' . $i . ' days');

            // Fetch all moving orders vehicles and staff and their associated moving orders for the current day
            $movingOrdersVehicles = $this->MovingOrdersVehicles->find('all', [
                'contain' => ['MovingOrders'],
                'conditions' => [
                    'AND' => [
                        'MovingOrders.mo_start_time <=' => $timeMark,
                        'MovingOrders.mo_end_time >=' => $timeMark,
                    ],
                ],
            ]);
//            print_r($movingOrdersVehicles) ;
            $movingOrdersStaffs = $this->MovingOrdersStaffs->find('all', [
                'contain' => ['MovingOrders'],
                'conditions' => [
                    'AND' => [
                        'MovingOrders.mo_start_time <=' => $timeMark,
                        'MovingOrders.mo_end_time >=' => $timeMark,
                    ],
                ],
            ]);

            // Initialize the list of vehicle and staff ids for the current day
            $vehicleIds = [];
            $staffIds = [];

            // Loop through the moving orders vehicles and staff and append the vehicle and staff ids to the list
            foreach ($movingOrdersVehicles as $movingOrdersVehicle) {
                $vehicleIds[] = $movingOrdersVehicle->vehicle_id;
            }
            foreach ($movingOrdersStaffs as $movingOrdersStaff) {
                $staffIds[] = $movingOrdersStaff->staff_id;
            }

            // Compare the list of vehicle and staff ids for the current day to the total list of vehicle and staff ids and set the availability
            $combinedAvailability[$timeMark->i18nFormat('yyyy-MM-dd')] = [
                'vehicleAvailability' => array_diff($allVehicleIds, $vehicleIds),
                'staffAvailability' => array_diff($allStaffIds, $staffIds),
            ];

        }

        // Set the combined availability variable to be available in the view
        $this->set(compact('combinedAvailability'));
        $this->set(compact('vehicleIds'));


        // Render the check_combined_availability view
        $this->render('check_combined_availability');
    }

}
