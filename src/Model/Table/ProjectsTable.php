<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Projects Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\TasksTable&\Cake\ORM\Association\BelongsToMany $Tasks
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsToMany $Users
 *
 * @method \App\Model\Entity\Project newEmptyEntity()
 * @method \App\Model\Entity\Project newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Project> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Project get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Project findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Project patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Project> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Project|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Project saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Project>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Project>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Project>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Project> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Project>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Project>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Project>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Project> deleteManyOrFail(iterable $entities, array $options = [])
 */
class ProjectsTable extends Table
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

        //utilise
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
        
        $this->setTable('projects');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsToMany('Tasks', [
            'foreignKey' => 'project_id',
            'targetForeignKey' => 'task_id',
            'joinTable' => 'projects_tasks',
        ]);

        
        $this->belongsToMany('Users', [
            'foreignKey' => 'project_id',
            'targetForeignKey' => 'user_id',
            'joinTable' => 'projects_users',
        ]);
        
        
        $this->hasMany('ProjectsProgressTasks', [
            'foreignKey' => 'project_id',
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
            ->scalar('name')
            ->maxLength('name', 50)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->integer('user_id')
            ->notEmptyString('user_id');

        $validator
            ->date('start_date')
            ->requirePresence('start_date', 'create')
            ->notEmptyDate('start_date');

        $validator
            ->date('end_date')
            ->requirePresence('end_date', 'create')
            ->notEmptyDate('end_date');

        $validator
            ->scalar('status')
            ->maxLength('status', 50)
            //->requirePresence('status', 'create')
            ->allowEmptyString('status');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'), ['errorField' => 'user_id']);

        return $rules;
    }
}
