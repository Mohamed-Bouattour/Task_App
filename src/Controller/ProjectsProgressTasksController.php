<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * ProjectsProgressTasks Controller
 *
 * @property \App\Model\Table\ProjectsProgressTasksTable $ProjectsProgressTasks
 */
class ProjectsProgressTasksController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->ProjectsProgressTasks->find()
            ->contain(['Projects', 'Tasks', 'Progress']);
        $projectsProgressTasks = $this->paginate($query);

        $this->set(compact('projectsProgressTasks'));
    }

    /**
     * View method
     *
     * @param string|null $id Projects Progress Task id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $projectsProgressTask = $this->ProjectsProgressTasks->get($id, contain: ['Projects', 'Tasks', 'Progress']);
        $this->set(compact('projectsProgressTask'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $projectsProgressTask = $this->ProjectsProgressTasks->newEmptyEntity();
        if ($this->request->is('post')) {
            $projectsProgressTask = $this->ProjectsProgressTasks->patchEntity($projectsProgressTask, $this->request->getData());
            if ($this->ProjectsProgressTasks->save($projectsProgressTask)) {
                $this->Flash->success(__('The projects progress task has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The projects progress task could not be saved. Please, try again.'));
        }
        $projects = $this->ProjectsProgressTasks->Projects->find('list', limit: 200)->all();
        $tasks = $this->ProjectsProgressTasks->Tasks->find('list', limit: 200)->all();
        $progress = $this->ProjectsProgressTasks->Progress->find('list', limit: 200)->all();
        $this->set(compact('projectsProgressTask', 'projects', 'tasks', 'progress'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Projects Progress Task id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $projectsProgressTask = $this->ProjectsProgressTasks->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $projectsProgressTask = $this->ProjectsProgressTasks->patchEntity($projectsProgressTask, $this->request->getData());
            if ($this->ProjectsProgressTasks->save($projectsProgressTask)) {
                $this->Flash->success(__('The projects progress task has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The projects progress task could not be saved. Please, try again.'));
        }
        $projects = $this->ProjectsProgressTasks->Projects->find('list', limit: 200)->all();
        $tasks = $this->ProjectsProgressTasks->Tasks->find('list', limit: 200)->all();
        $progress = $this->ProjectsProgressTasks->Progress->find('list', limit: 200)->all();
        $this->set(compact('projectsProgressTask', 'projects', 'tasks', 'progress'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Projects Progress Task id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $projectsProgressTask = $this->ProjectsProgressTasks->get($id);
        if ($this->ProjectsProgressTasks->delete($projectsProgressTask)) {
            $this->Flash->success(__('The projects progress task has been deleted.'));
        } else {
            $this->Flash->error(__('The projects progress task could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
