<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * StorageOrders Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\UnitsTable&\Cake\ORM\Association\BelongsTo $Units
 * @property \App\Model\Table\StaffsTable&\Cake\ORM\Association\BelongsTo $Staffs
 *
 * @method \App\Model\Entity\StorageOrder newEmptyEntity()
 * @method \App\Model\Entity\StorageOrder newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\StorageOrder[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\StorageOrder get($primaryKey, $options = [])
 * @method \App\Model\Entity\StorageOrder findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\StorageOrder patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\StorageOrder[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\StorageOrder|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\StorageOrder saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\StorageOrder[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\StorageOrder[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\StorageOrder[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\StorageOrder[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class StorageOrdersTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('storage_orders');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Units', [
            'foreignKey' => 'unit_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Staffs', [
            'foreignKey' => 'staff_id',
            'joinType' => 'INNER',
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
            ->dateTime('so_order_time')
            ->notEmptyDateTime('so_order_time');

        $validator
            ->dateTime('so_update')
            ->notEmptyDateTime('so_update');

        $validator
            ->date('so_start')
            ->requirePresence('so_start', 'create')
            ->notEmptyDate('so_start');

        $validator
            ->integer('so_duration')
            ->notEmptyString('so_duration');

        $validator
            ->decimal('so_price')
            ->requirePresence('so_price', 'create')
            ->notEmptyString('so_price');

        $validator
            ->uuid('user_id')
            ->notEmptyString('user_id');

        $validator
            ->uuid('unit_id')
            ->notEmptyString('unit_id');

        $validator
            ->uuid('staff_id')
            ->notEmptyString('staff_id');

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
        $rules->add($rules->existsIn('user_id', 'Users'), ['errorField' => 'user_id']);
        $rules->add($rules->existsIn('unit_id', 'Units'), ['errorField' => 'unit_id']);
        $rules->add($rules->existsIn('staff_id', 'Staffs'), ['errorField' => 'staff_id']);

        return $rules;
    }
}
