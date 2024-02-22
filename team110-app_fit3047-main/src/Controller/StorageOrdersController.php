<?php

declare(strict_types=1);

namespace App\Controller;
use Cake\Event\EventInterface; // Import the EventInterface class from CakePHP
use Cake\Datasource\ConnectionManager; // Add this line at the top of your Controller file

/**
 * StorageOrders Controller
 *
 * @property \App\Model\Table\StorageOrdersTable $StorageOrders
 * @method \App\Model\Entity\StorageOrder[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class StorageOrdersController extends AppController
{

    public function beforeFilter(EventInterface $event)
    {
        parent::beforeFilter($event);

        if ($this->request->getParam('action') === 'add') {
            return;
        }

        if (!$this->Authentication->getResult()->isValid()) {

            return $this->redirect(['controller' => 'Auth', 'action' => 'login']);
        }
//
//
//
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

                $this->paginate = [
                    'contain' => ['Users', 'Units', 'Staffs'],
                ];
                $storageOrders = $this->paginate($this->StorageOrders);
                $this->set(compact('storageOrders','user'));


            }else{
                $loggedInUserId = $user->id;
                $this->paginate = [
                    'contain' => ['Users'],
                    'conditions' => ['StorageOrders.user_id' => $loggedInUserId], // Filter inquiries by user ID
                ];
                $storageOrders = $this->paginate($this->StorageOrders);
                $this->set(compact('storageOrders','user'));
            }
        }


    }

    /**
     * View method
     *
     * @param string|null $id Storage Order id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->request->getAttribute('identity');

        $storageOrder = $this->StorageOrders->get($id, [
            'contain' => ['Users', 'Units', 'Staffs'],
        ]);
        $this->set(compact('storageOrder','user'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function selectunit()
    {
        $connection = ConnectionManager::get('default');

        $sql = "SELECT unit_type, id,unit_no,unit_area,unit_price,store_id,unit_desc
            FROM units
            WHERE id NOT IN (
                SELECT unit_id
                FROM storage_orders
            ) AND unit_avail
            GROUP BY unit_type";

        $units = $connection->execute($sql)->fetchAll('assoc');

        $this->set(compact('units'));

    }

    public function add()
    {
        $unitType = $this->request->getQuery('unitType');
        $unitSpace = $this->request->getQuery('unitSpace');
        $unitPrice = $this->request->getQuery('unitPrice');
        $unitId = $this->request->getQuery('unitId');

        $storageOrder = $this->StorageOrders->newEmptyEntity();


        if ($this->request->is('post') && $this->request->getData('submitted_from_add')) {
            $storageOrder = $this->StorageOrders->patchEntity($storageOrder, $this->request->getData());
            if ($this->StorageOrders->save($storageOrder)) {
//                $this->Flash->success(__('The storage order has been saved.'));
//                return $this->redirect(['action' => 'index']);
                return $this->redirect([
                    'controller' => 'Pages',
                    'action' => 'public/linkStripe',
                    '?' => [
                        'order_id' =>$storageOrder->id,
                        'order_type' => 'StorageOrder',
                        'quote' => $storageOrder->so_price,
                        'user_id' => $storageOrder ->user_id
                    ]
                ]);
            }
            $this->Flash->error(__('The storage order could not be saved. Please, try again.'));
        }


        $user = $this->request->getAttribute('identity');
        $users = $this->StorageOrders->Users->find('list', [
            'conditions' => ['id' => $user->id],
            'keyField' => 'id',
            'valueField' => 'user_name',
            'limit' => 1
        ])->all();

        if ($unitId !== null) {
            $units = $this->StorageOrders->Units->find('list', [
                'conditions' => ['id' => $unitId],
                'limit' => 200
            ])->all();
        } else {
            // Handle the case where $unitId is not provided or is null
            $units = $this->StorageOrders->Units->find('list', ['limit' => 200])->all();
        }

        $staffs = $this->StorageOrders->Staffs->find('list', ['limit' => 200])->all();
        $this->set(compact('units','storageOrder', 'users', 'staffs', 'unitType', 'unitSpace', 'unitPrice','unitId'));
    }






    /**
     * Edit method
     *
     * @param string|null $id Storage Order id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $storageOrder = $this->StorageOrders->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $storageOrder = $this->StorageOrders->patchEntity($storageOrder, $this->request->getData());
            if ($this->StorageOrders->save($storageOrder)) {
                $this->Flash->success(__('The storage order has been saved.'));

            }
            $this->Flash->error(__('The storage order could not be saved. Please, try again.'));
        }
        $users = $this->StorageOrders->Users->find('list', ['limit' => 200])->all();
        $units = $this->StorageOrders->Units->find('list', ['limit' => 200])->all();
        $staffs = $this->StorageOrders->Staffs->find('list', ['limit' => 200])->all();
        $this->set(compact('storageOrder', 'users', 'units', 'staffs'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Storage Order id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $storageOrder = $this->StorageOrders->get($id);
        if ($this->StorageOrders->delete($storageOrder)) {
            $this->Flash->success(__('The storage order has been deleted.'));
        } else {
            $this->Flash->error(__('The storage order could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
