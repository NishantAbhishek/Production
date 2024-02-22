<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MovingOrdersVehicles Model
 *
 * @property \App\Model\Table\VehiclesTable&\Cake\ORM\Association\BelongsTo $Vehicles
 * @property \App\Model\Table\MovingOrdersTable&\Cake\ORM\Association\BelongsTo $MovingOrders
 *
 * @method \App\Model\Entity\MovingOrdersVehicle newEmptyEntity()
 * @method \App\Model\Entity\MovingOrdersVehicle newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\MovingOrdersVehicle[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MovingOrdersVehicle get($primaryKey, $options = [])
 * @method \App\Model\Entity\MovingOrdersVehicle findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\MovingOrdersVehicle patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MovingOrdersVehicle[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\MovingOrdersVehicle|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MovingOrdersVehicle saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MovingOrdersVehicle[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\MovingOrdersVehicle[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\MovingOrdersVehicle[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\MovingOrdersVehicle[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class MovingOrdersVehiclesTable extends Table
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

        $this->setTable('moving_orders_vehicles');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Vehicles', [
            'foreignKey' => 'vehicle_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('MovingOrders', [
            'foreignKey' => 'moving_order_id',
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
            ->scalar('mo_vehicle_status')
            ->allowEmptyString('mo_vehicle_status');

        $validator
            ->dateTime('mo_vehicle_update')
            ->notEmptyDateTime('mo_vehicle_update');

        $validator
            ->uuid('vehicle_id')
            ->notEmptyString('vehicle_id');

        $validator
            ->uuid('moving_order_id')
            ->notEmptyString('moving_order_id');

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
        $rules->add($rules->existsIn('vehicle_id', 'Vehicles'), ['errorField' => 'vehicle_id']);
        $rules->add($rules->existsIn('moving_order_id', 'MovingOrders'), ['errorField' => 'moving_order_id']);

        return $rules;
    }
}
