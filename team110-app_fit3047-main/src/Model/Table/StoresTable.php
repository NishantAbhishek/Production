<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Stores Model
 *
 * @property \App\Model\Table\UnitsTable&\Cake\ORM\Association\HasMany $Units
 *
 * @method \App\Model\Entity\Store newEmptyEntity()
 * @method \App\Model\Entity\Store newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Store[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Store get($primaryKey, $options = [])
 * @method \App\Model\Entity\Store findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Store patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Store[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Store|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Store saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Store[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Store[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Store[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Store[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class StoresTable extends Table
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

        $this->setTable('stores');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('Units', [
            'foreignKey' => 'store_id',
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
            ->scalar('store_name')
            ->maxLength('store_name', 32)
            ->requirePresence('store_name', 'create')
            ->notEmptyString('store_name');

        $validator
            ->scalar('store_address')
            ->maxLength('store_address', 128)
            ->requirePresence('store_address', 'create')
            ->notEmptyString('store_address');

        $validator
            ->time('store_open')
            ->requirePresence('store_open', 'create')
            ->notEmptyTime('store_open');

        $validator
            ->time('store_close')
            ->requirePresence('store_close', 'create')
            ->notEmptyTime('store_close');

        $validator
            ->scalar('store_phone')
            ->maxLength('store_phone', 10)
            ->requirePresence('store_phone', 'create')
            ->notEmptyString('store_phone');

        return $validator;
    }
}
