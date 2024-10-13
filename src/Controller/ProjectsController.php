<?php
declare(strict_types=1);


namespace App\Controller;
use Cake\ORM\TableRegistry;
/**
 * Projects Controller
 *
 * @property \App\Model\Table\ProjectsTable $Projects
 */
class ProjectsController extends AppController
{

    /*
    public function updateProjectStatus($projectId)
    {
        // Load necessary tables
        $projectsProgressTasksTable = TableRegistry::getTableLocator()->get('ProjectsProgressTasks');
        $tasksTable = TableRegistry::getTableLocator()->get('Tasks');
        $progressTable = TableRegistry::getTableLocator()->get('Progress');

        // Retrieve tasks and progress related to the project
        $projectTasks = $projectsProgressTasksTable->find()
            ->where(['project_id' => $projectId])
            ->contain(['Tasks', 'Progress'])
            ->all();

        $progressStates = [];

        // Check progress state for each task
        foreach ($projectTasks as $projectTask) {
            if (!empty($projectTask->progress)) {
                foreach ($projectTask->progress as $progress) {
                    if ($progress->new_state == 'Completed') {
                        $progressStates[$projectTask->task_id][] = 'Completed';
                    } else {
                        $progressStates[$projectTask->task_id][] = 'Not Completed';
                    }
                }
            } else {
                $progressStates[$projectTask->task_id][] = 'Waiting for updates';
            }
        }

        // Determine overall project status
        $projectStatus = 'Completed';

        foreach ($progressStates as $states) {
            if (in_array('Not Completed', $states, true)) {
                $projectStatus = 'Not Completed';
                break;
            } elseif (in_array('Waiting for updates', $states, true)) {
                $projectStatus = 'Waiting for updates';
                break;
            }
        }

        // Update project status in the database
        $projectsTable = TableRegistry::getTableLocator()->get('Projects');
        $project = $projectsTable->get($projectId);
        $project->status = $projectStatus;
    }*/


    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->Authorization->skipAuthorization();
        
        $user = $this->request->getAttribute('identity');
        $role = $user->role;
        $this->set('role', $role);
        
        $query = $this->Projects->find()->contain(['Users']);
        $projects = $this->paginate($query);
        $this->set(compact('projects'));
        
    }

    /**
     * View method
     *
     * @param string|null $id Project id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->request->getAttribute('identity');
        $role = $user->role;
        $this->set('role', $role);
        
        $this->Authorization->skipAuthorization();
        $project = $this->Projects->get($id, contain: ['Users', 'Tasks']);
        $this->set(compact('project'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {

        $project = $this->Projects->newEmptyEntity();
        $this->Authorization->authorize($project, 'add');

        $user = $this->request->getAttribute('identity');
        $userId = $user->id;
        $data=$this->request->getData();
        $data['user_id']=$userId;

        if ($this->request->is('post')) {
            $project = $this->Projects->patchEntity($project,$data);
            if ($this->Projects->save($project)) {
                $this->Flash->success(__('The project has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The project could not be saved. Please, try again.'));
        }
        $users = $this->Projects->Users->find('list',[
            'keyField'=>'id',
            'valueField'=>function($user){
                return 'User ' . $user->id .
                       ' : Name: ' . $user->name .
                       ' // Role : ' . $user->role;
            },
            'limit'=>200
        ])->all();
        $tasks = $this->Projects->Tasks->find('list', limit: 200)->all();
        $this->set(compact('project', 'users', 'tasks'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Project id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->request->getAttribute('identity');
        $userId = $user->id;
        $data=$this->request->getData();
        $data['user_id']=$userId;

        $project = $this->Projects->get($id, contain: ['Users', 'Tasks']);
        $this->Authorization->authorize($project, 'edit');
        if ($this->request->is(['patch', 'post', 'put'])) {
            $project = $this->Projects->patchEntity($project, $data);
            if ($this->Projects->save($project)) {
                $this->Flash->success(__('The project has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The project could not be saved. Please, try again.'));
        }
        $users = $this->Projects->Users->find('list',[
            'keyField'=>'id',
            'valueField'=>function($user){
                return 'User ' . $user->id .
                       ' : Name: ' . $user->name .
                       ' // Role : ' . $user->role;
            },
            'limit'=>200
        ])->all();
        $tasks = $this->Projects->Tasks->find('list', limit: 200)->all();
        $this->set(compact('project', 'users', 'tasks'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Project id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $project = $this->Projects->get($id);
        $this->Authorization->authorize($project, 'delete');
        if ($this->Projects->delete($project)) {
            $this->Flash->success(__('The project has been deleted.'));
        } else {
            $this->Flash->error(__('The project could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
