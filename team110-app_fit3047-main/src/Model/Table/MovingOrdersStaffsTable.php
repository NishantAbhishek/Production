<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MovingOrdersStaffs Model
 *
 * @property \App\Model\Table\StaffsTable&\Cake\ORM\Association\BelongsTo $Staffs
 * @property \App\Model\Table\MovingOrdersTable&\Cake\ORM\Association\BelongsTo $MovingOrders
 *
 * @method \App\Model\Entity\MovingOrdersStaff newEmptyEntity()
 * @method \App\Model\Entity\MovingOrdersStaff newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\MovingOrdersStaff[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MovingOrdersStaff get($primaryKey, $options = [])
 * @method \App\Model\Entity\MovingOrdersStaff findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\MovingOrdersStaff patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MovingOrdersStaff[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\MovingOrdersStaff|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MovingOrdersStaff saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MovingOrdersStaff[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\MovingOrdersStaff[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\MovingOrdersStaff[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\MovingOrdersStaff[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class MovingOrdersStaffsTable extends Table
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

        $this->setTable('moving_orders_staffs');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Staffs', [
            'foreignKey' => 'staff_id',
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
            ->scalar('mo_staff_status')
            ->allowEmptyString('mo_staff_status');

        $validator
            ->dateTime('mo_staff_update')
            ->notEmptyDateTime('mo_staff_update');

        $validator
            ->uuid('staff_id')
            ->notEmptyString('staff_id');

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
        $rules->add($rules->existsIn('staff_id', 'Staffs'), ['errorField' => 'staff_id']);
        $rules->add($rules->existsIn('moving_order_id', 'MovingOrders'), ['errorField' => 'moving_order_id']);

        return $rules;
    }
}
