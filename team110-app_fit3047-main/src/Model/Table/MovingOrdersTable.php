<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MovingOrders Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\StaffsTable&\Cake\ORM\Association\BelongsToMany $Staffs
 * @property \App\Model\Table\VehiclesTable&\Cake\ORM\Association\BelongsToMany $Vehicles
 *
 * @method \App\Model\Entity\MovingOrder newEmptyEntity()
 * @method \App\Model\Entity\MovingOrder newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\MovingOrder[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MovingOrder get($primaryKey, $options = [])
 * @method \App\Model\Entity\MovingOrder findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\MovingOrder patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MovingOrder[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\MovingOrder|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MovingOrder saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MovingOrder[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\MovingOrder[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\MovingOrder[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\MovingOrder[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class MovingOrdersTable extends Table
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

        $this->setTable('moving_orders');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsToMany('Staffs', [
            'foreignKey' => 'moving_order_id',
            'targetForeignKey' => 'staff_id',
            'joinTable' => 'moving_orders_staffs',
        ]);
        $this->belongsToMany('Vehicles', [
            'foreignKey' => 'moving_order_id',
            'targetForeignKey' => 'vehicle_id',
            'joinTable' => 'moving_orders_vehicles',
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
            ->dateTime('mo_order_time')
            ->notEmptyDateTime('mo_order_time');

        $validator
            ->dateTime('mo_update')
            ->notEmptyDateTime('mo_update');

        $validator
            ->scalar('mo_detail')
            ->maxLength('mo_detail', 512)
            ->requirePresence('mo_detail', 'create')
            ->notEmptyString('mo_detail');

        $validator
            ->scalar('mo_pickup')
            ->maxLength('mo_pickup', 128)
            ->requirePresence('mo_pickup', 'create')
            ->notEmptyString('mo_pickup');

        $validator
            ->scalar('mo_dropoff')
            ->maxLength('mo_dropoff', 128)
            ->allowEmptyString('mo_dropoff');

        $validator
            ->dateTime('mo_start_time')
            ->allowEmptyDateTime('mo_start_time');


        $validator
            ->dateTime('mo_end_time')
            ->allowEmptyDateTime('mo_end_time');

        $validator
            ->decimal('mo_quote')
            ->allowEmptyString('mo_quote');

        $validator
            ->uuid('user_id')
            ->notEmptyString('user_id');

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

        return $rules;
    }
}
