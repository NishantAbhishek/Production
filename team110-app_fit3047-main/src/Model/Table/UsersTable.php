<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \App\Model\Table\MovingOrdersTable&\Cake\ORM\Association\HasMany $MovingOrders
 * @property \App\Model\Table\StorageOrdersTable&\Cake\ORM\Association\HasMany $StorageOrders
 * @property \App\Model\Table\InquiriesTable&\Cake\ORM\Association\HasMany $Inquiries
 * @property \App\Model\Table\InvoicesTable&\Cake\ORM\Association\HasMany $Invoices

 *
 * @method \App\Model\Entity\User newEmptyEntity()
 * @method \App\Model\Entity\User newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\User|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class UsersTable extends Table
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

        $this->setTable('users');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('CanAuthenticate');

        $this->hasMany('MovingOrders', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('StorageOrders', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('Inquiries', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('Invoices', [
            'foreignKey' => 'user_id',
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
            ->scalar('user_name')
            ->maxLength('user_name', 64)
            ->requirePresence('user_name', 'create')
            ->notEmptyString('user_name');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmptyString('email')
            ->add('email', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('password')
            ->maxLength('password', 64)
            ->requirePresence('password', 'create')
            ->notEmptyString('password');

        $validator
            ->scalar('nonce')
            ->maxLength('nonce', 255)
            ->allowEmptyString('nonce');

        $validator
            ->dateTime('nonce_expiry')
            ->allowEmptyDateTime('nonce_expiry');

        $validator
            ->scalar('user_phone')
            ->maxLength('user_phone', 10)
            ->requirePresence('user_phone', 'create')
            ->notEmptyString('user_phone')
            ->add('user_phone', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('user_type')
            ->notEmptyString('user_type');

        $validator
            ->scalar('user_level')
            ->notEmptyString('user_level');

        $validator
            ->scalar('user_company')
            ->maxLength('user_company', 32)
            ->allowEmptyString('user_company');

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
        $rules->add($rules->isUnique(['email']), ['errorField' => 'email']);
        $rules->add($rules->isUnique(['user_phone']), ['errorField' => 'user_phone']);

        return $rules;
    }
}
