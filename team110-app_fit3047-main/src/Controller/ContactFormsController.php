<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Event\EventInterface;

/**
 * ContactForms Controller
 *
 * @property \App\Model\Table\ContactFormsTable $ContactForms
 * @method \App\Model\Entity\ContactForm[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ContactFormsController extends AppController
{

    public function initialize(): void {
        parent::initialize();

        // By default, CakePHP will (sensibly) default to preventing users from accessing any actions on a controller.
        // These actions, however, are typically required for users who have not yet logged in.
        $this->Authentication->allowUnauthenticated(['add']);

        // CakePHP loads the model with the same name as the controller by default.
        // Since we don't have an Auth model, we'll need to load "Users" model when starting the controller manually.
        //$this->Users = $this->fetchTable('Users');
    }
    public function beforeFilter(EventInterface $event)
    {
        parent::beforeFilter($event);


        if ($this->request->getParam('action') === 'add') {
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
        $contactForms = $this->paginate($this->ContactForms);

        $this->set(compact('contactForms'));
    }

    /**
     * View method
     *
     * @param string|null $id Contact Form id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $contactForm = $this->ContactForms->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('contactForm'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $contactForm = $this->ContactForms->newEmptyEntity();
        if ($this->request->is('post')) {
            $contactForm = $this->ContactForms->patchEntity($contactForm, $this->request->getData());
            if ($this->ContactForms->save($contactForm)) {
                $this->Flash->success(__('The contact form has been saved.'));

                return $this->redirect(['action' => '../Pages/home']);
            }
            $this->Flash->error(__('The contact form could not be saved. Please, try again.'));
        }
        $this->set(compact('contactForm'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Contact Form id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $contactForm = $this->ContactForms->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $contactForm = $this->ContactForms->patchEntity($contactForm, $this->request->getData());
            if ($this->ContactForms->save($contactForm)) {
                $this->Flash->success(__('The contact form has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The contact form could not be saved. Please, try again.'));
        }
        $this->set(compact('contactForm'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Contact Form id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $contactForm = $this->ContactForms->get($id);
        if ($this->ContactForms->delete($contactForm)) {
            $this->Flash->success(__('The contact form has been deleted.'));
        } else {
            $this->Flash->error(__('The contact form could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
