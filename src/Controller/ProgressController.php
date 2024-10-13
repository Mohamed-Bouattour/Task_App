<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Progress Controller
 *
 * @property \App\Model\Table\ProgressTable $Progress
 */
class ProgressController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $user = $this->request->getAttribute('identity');
        $role = $user->role; // Assurez-vous que 'role' est un champ de votre table 'users'
        // Passez le rôle à la vue
        $this->set('role', $role);
        
        $this->Authorization->skipAuthorization();
        $query = $this->Progress->find()
            ->contain(['Tasks', 'Users']);
        $progress = $this->paginate($query);

        $this->set(compact('progress'));
    }

    /**
     * View method
     *
     * @param string|null $id Progres id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->Authorization->skipAuthorization();
        $progres = $this->Progress->get($id, contain: ['Tasks', 'Users']);
        $this->set(compact('progres'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->request->getAttribute('identity');
        $userId = $user->id;
        $data=$this->request->getData();
        $data['user_id']=$userId;

        $progres = $this->Progress->newEmptyEntity();
        $this->Authorization->authorize($progres, 'add');
        if ($this->request->is('post')) {
            $progres = $this->Progress->patchEntity($progres,$data);
            if ($this->Progress->save($progres)) {
                $this->Flash->success(__('The progres has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The progres could not be saved. Please, try again.'));
        }
        $tasks = $this->Progress->Tasks->find('list', limit: 200)->all();
        $users = $this->Progress->Users->find('list', limit: 200)->all();
        $this->set(compact('progres', 'tasks', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Progres id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->request->getAttribute('identity');
        $userId = $user->id;
        $data=$this->request->getData();
        $data['user_id']=$userId;

        $progres = $this->Progress->get($id, contain: []);
        $this->Authorization->authorize($progres, 'edit');
        if ($this->request->is(['patch', 'post', 'put'])) {
            $progres = $this->Progress->patchEntity($progres,$data);
            if ($this->Progress->save($progres)) {
                $this->Flash->success(__('The progress has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The progres could not be saved. Please, try again.'));
        }
        $tasks = $this->Progress->Tasks->find('list', limit: 200)->all();
        $users = $this->Progress->Users->find('list', limit: 200)->all();
        $this->set(compact('progres', 'tasks', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Progres id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $progres = $this->Progress->get($id);
        $this->Authorization->authorize($progres, 'delete');
        if ($this->Progress->delete($progres)) {
            $this->Flash->success(__('The progres has been deleted.'));
        } else {
            $this->Flash->error(__('The progres could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
