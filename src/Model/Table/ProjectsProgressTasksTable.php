<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ProjectsProgressTasks Model
 *
 * @property \App\Model\Table\ProjectsTable&\Cake\ORM\Association\BelongsTo $Projects
 * @property \App\Model\Table\TasksTable&\Cake\ORM\Association\BelongsTo $Tasks
 * @property \App\Model\Table\ProgressTable&\Cake\ORM\Association\BelongsTo $Progress
 *
 * @method \App\Model\Entity\ProjectsProgressTask newEmptyEntity()
 * @method \App\Model\Entity\ProjectsProgressTask newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\ProjectsProgressTask> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ProjectsProgressTask get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\ProjectsProgressTask findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\ProjectsProgressTask patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\ProjectsProgressTask> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\ProjectsProgressTask|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\ProjectsProgressTask saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\ProjectsProgressTask>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ProjectsProgressTask>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\ProjectsProgressTask>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ProjectsProgressTask> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\ProjectsProgressTask>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ProjectsProgressTask>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\ProjectsProgressTask>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ProjectsProgressTask> deleteManyOrFail(iterable $entities, array $options = [])
 */
class ProjectsProgressTasksTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('projects_progress_tasks');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Projects', [
            'foreignKey' => 'project_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Tasks', [
            'foreignKey' => 'task_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Progress', [
            'foreignKey' => 'progres_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('project_id')
            ->notEmptyString('project_id');

        $validator
            ->integer('task_id')
            ->notEmptyString('task_id');

        $validator
            ->integer('progres_id')
            ->allowEmptyString('progres_id');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['project_id'], 'Projects'), ['errorField' => 'project_id']);
        $rules->add($rules->existsIn(['task_id'], 'Tasks'), ['errorField' => 'task_id']);
        $rules->add($rules->existsIn(['progres_id'], 'Progress'), ['errorField' => 'progres_id']);

        return $rules;
    }
}
