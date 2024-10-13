<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Tasks Controller
 *
 * @property \App\Model\Table\TasksTable $Tasks
 */
class TasksController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $user = $this->request->getAttribute('identity');
        $role = $user->role;
        $this->set('role', $role);
        
        $this->Authorization->skipAuthorization();
        
        $query = $this->Tasks->find()
            ->contain(['Users']);
        $tasks = $this->paginate($query);

        $this->set(compact('tasks'));
    }

    /**
     * View method
     *
     * @param string|null $id Task id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->Authorization->skipAuthorization();
        
        $user = $this->request->getAttribute('identity');
        $role = $user->role;
        $this->set('role', $role);

        $task = $this->Tasks->get($id, contain: ['Users', 'Projects', 'Progress']);
        $this->set(compact('task'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $task = $this->Tasks->newEmptyEntity();

        $user = $this->request->getAttribute('identity');
        $userId = $user->id;
        $data=$this->request->getData();
        $data['user_id']=$userId;

        $this->Authorization->authorize($task, 'add');
        if ($this->request->is('post')) {
            $task = $this->Tasks->patchEntity($task, $data);
            if ($this->Tasks->save($task)) {
                $this->Flash->success(__('The task has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The task could not be saved. Please, try again.'));
        }
        $users = $this->Tasks->Users->find('list', limit: 200)->all();
        $projects = $this->Tasks->Projects->find('list', limit: 200)->all();
        $this->set(compact('task', 'users', 'projects'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Task id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->request->getAttribute('identity');
        $userId = $user->id;
        $data=$this->request->getData();
        $data['user_id']=$userId;

        $task = $this->Tasks->get($id, contain: ['Projects']);
        $this->Authorization->authorize($task, 'edit');
        if ($this->request->is(['patch', 'post', 'put'])) {
            $task = $this->Tasks->patchEntity($task,$data);
            if ($this->Tasks->save($task)) {
                $this->Flash->success(__('The task has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The task could not be saved. Please, try again.'));
        }
        $users = $this->Tasks->Users->find('list', limit: 200)->all();
        $projects = $this->Tasks->Projects->find('list', limit: 200)->all();
        $this->set(compact('task', 'users', 'projects'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Task id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $task = $this->Tasks->get($id);
        $this->Authorization->authorize($task, 'delete');
        if ($this->Tasks->delete($task)) {
            $this->Flash->success(__('The task has been deleted.'));
        } else {
            $this->Flash->error(__('The task could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
