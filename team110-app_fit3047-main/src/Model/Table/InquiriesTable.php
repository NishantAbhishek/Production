<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Inquiries Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Inquiry newEmptyEntity()
 * @method \App\Model\Entity\Inquiry newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Inquiry[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Inquiry get($primaryKey, $options = [])
 * @method \App\Model\Entity\Inquiry findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Inquiry patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Inquiry[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Inquiry|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Inquiry saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Inquiry[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Inquiry[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Inquiry[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Inquiry[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class InquiriesTable extends Table
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

        $this->setTable('inquiries');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
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
            ->dateTime('inquiry_order_time')
            ->notEmptyDateTime('inquiry_order_time');

        $validator
            ->dateTime('inquiry_update')
            ->notEmptyDateTime('inquiry_update');

        $validator
            ->scalar('inquiry_detail')
            ->maxLength('inquiry_detail', 512)
            ->requirePresence('inquiry_detail', 'create')
            ->notEmptyString('inquiry_detail');

        $validator
            ->scalar('inquiry_pickup')
            ->maxLength('inquiry_pickup', 128)
            ->requirePresence('inquiry_pickup', 'create')
            ->notEmptyString('inquiry_pickup');

        $validator
            ->scalar('inquiry_dropoff')
            ->maxLength('inquiry_dropoff', 128)
            ->allowEmptyString('inquiry_dropoff');

        $validator
            ->dateTime('inquiry_start_time')
            ->allowEmptyDateTime('inquiry_start_time');

        $validator
            ->dateTime('inquiry_end_time')
            ->allowEmptyDateTime('inquiry_end_time');

        $validator
            ->decimal('inquiry_quote')
            ->allowEmptyString('inquiry_quote');

        $validator
            ->integer('inquiry_vehicle')
            ->allowEmptyString('inquiry_vehicle');

        $validator
            ->integer('inquiry_staff')
            ->allowEmptyString('inquiry_staff');

        $validator
            ->boolean('inquiry_reviewed')
            ->allowEmptyString('inquiry_reviewed');

        $validator
            ->boolean('inquiry_confirmed')
            ->allowEmptyString('inquiry_confirmed');

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
