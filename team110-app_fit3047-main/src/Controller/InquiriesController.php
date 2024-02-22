<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\ORM\TableRegistry;


/**
 * Inquiries Controller
 *
 * @property \App\Model\Table\InquiriesTable $Inquiries
 * @method \App\Model\Entity\Inquiry[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class InquiriesController extends AppController
{
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
                    'contain' => ['Users'],
                ];
                $inquiries = $this->paginate($this->Inquiries);
                $this->set(compact('inquiries','user'));
            }else{
                $loggedInUserId = $user->id;

                // Configure pagination to include associated Users and filter by user ID
                $this->paginate = [
                    'contain' => ['Users'],
                    'conditions' => ['Inquiries.user_id' => $loggedInUserId], // Filter inquiries by user ID
                ];
                $inquiries = $this->paginate($this->Inquiries);
                $this->set(compact('inquiries','user'));
            }
        }else{
        }
    }

    /**
     * View method
     *
     * @param string|null $id Inquiry id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $inquiry = $this->Inquiries->get($id, [
            'contain' => ['Users'],
        ]);

        $user = $this->request->getAttribute('identity');

        // Set both the $inquiry and $user variables to be available in the view
        $this->set(compact('inquiry', 'user'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $inquiry = $this->Inquiries->newEmptyEntity();

        $passedDate = $this->request->getQuery('date');
        if ($passedDate) {
            $formattedDate = date("Y-m-d H:i:s", strtotime($passedDate)); // Convert it to the database datetime format
            $inquiry->inquiry_start_time = $formattedDate;
        }

        if ($this->request->is('post')) {
            $inquiry = $this->Inquiries->patchEntity($inquiry, $this->request->getData());
            if ($this->Inquiries->save($inquiry)) {
                $this->Flash->success(__('The inquiry has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The inquiry could not be saved. Please, try again.'));
        }
        $user = $this->request->getAttribute('identity');
        $users = $this->Inquiries->Users->find('list', [
            'conditions' => ['id' => $user->id],
            'keyField' => 'id',
            'valueField' => 'user_name',
            'limit' => 1
        ])->all();
       // $users = $this->Inquiries->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('inquiry', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Inquiry id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $inquiry = $this->Inquiries->get($id, [
            'contain' => [],
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $inquiry = $this->Inquiries->patchEntity($inquiry, $this->request->getData());
            if ($this->Inquiries->save($inquiry)) {
                $this->Flash->success(__('The inquiry has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The inquiry could not be saved. Please, try again.'));
        }
        $users = $this->Inquiries->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('inquiry', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Inquiry id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $inquiry = $this->Inquiries->get($id);
        if ($this->Inquiries->delete($inquiry)) {
            $this->Flash->success(__('The inquiry has been deleted.'));
        } else {
            $this->Flash->error(__('The inquiry could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function confirm($id = null) {
        debug("Nishabt");
        $this->log("__________");

        $inquiry = $this->Inquiries->get($id, [
            'contain' => ['Users'],
        ]);

        if ($inquiry->inquiry_confirmed) {
            $this->Flash->success(__('The inquiry has already been confirmed.'));
        }

        if (!$inquiry->inquiry_reviewed) {
            $this->Flash->error(__('This inquiry needs to get reviewed.'));
        }

        $this->set(compact('inquiry'));
        if ($this->request->is('post')) {
            // Retrieve the inquiry data from the Inquiries table
            $inquiry = $this->Inquiries->get($id);



            $dataToInsert = [
                'id' => $inquiry->id,
                'mo_order_time' => new \Cake\I18n\Time(),
                'mo_update' => new \Cake\I18n\Time(),
                'mo_detail' => $inquiry->inquiry_detail,
                'mo_pickup' => $inquiry->inquiry_pickup,
                'mo_dropoff' => $inquiry->inquiry_dropoff,
                'mo_start_time' => $inquiry->inquiry_start_time,
                'mo_end_time' => $inquiry->inquiry_end_time,
                'mo_quote' => $inquiry->inquiry_quote,
                'user_id' => $inquiry->user_id,
            ];

            // Get the MovingOrders table using TableRegistry
            $movingOrdersTable = TableRegistry::getTableLocator()->get('MovingOrders');

            // Create a new entity for the moving_orders table

            if($inquiry->inquiry_reviewed && !$inquiry->inquiry_confirmed){
                $order = $movingOrdersTable->newEntity($dataToInsert);

                if ($movingOrdersTable->save($order)) {
                    $inquiry->inquiry_confirmed = true;

                    debug($inquiry);
                    if ($this->Inquiries->save($inquiry)) {
                        return $this->redirect([
                            'controller' => 'Pages',
                            'action' => 'public/linkStripe',
                            '?' => [
                                'order_id' =>$order->id,
                                'order_type' => 'MovingOrder',
                                'quote' => $inquiry->inquiry_quote,
                                'user_id' => $inquiry->user_id
                            ]
                        ]);
                    } else {
                        $this->Flash->error(__('The inquiry could not be confirmed. Please try again.'));
                    }
                    debug($inquiry);
                }else{
                    $this->Flash->error(__('Either it has been confirmed or not being reviewd yet.'));
                }
            }
            return $this->redirect(['action' => 'index']);
        }
    }


}
