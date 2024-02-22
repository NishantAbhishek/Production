<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ContactForms Model
 *
 * @method \App\Model\Entity\ContactForm newEmptyEntity()
 * @method \App\Model\Entity\ContactForm newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\ContactForm[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ContactForm get($primaryKey, $options = [])
 * @method \App\Model\Entity\ContactForm findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\ContactForm patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ContactForm[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\ContactForm|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ContactForm saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ContactForm[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ContactForm[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\ContactForm[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ContactForm[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ContactFormsTable extends Table
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

        $this->setTable('contact_forms');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
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
            ->scalar('contact_name')
            ->maxLength('contact_name', 32)
            ->requirePresence('contact_name', 'create')
            ->notEmptyString('contact_name');

        $validator
            ->scalar('contact_email')
            ->maxLength('contact_email', 254)
            ->requirePresence('contact_email', 'create')
            ->notEmptyString('contact_email');

        $validator
            ->scalar('contact_phone')
            ->maxLength('contact_phone', 10)
            ->requirePresence('contact_phone', 'create')
            ->notEmptyString('contact_phone');

        $validator
            ->scalar('contact_msg')
            ->requirePresence('contact_msg', 'create')
            ->notEmptyString('contact_msg');

        $validator
            ->boolean('contact_replied')
            ->allowEmptyString('contact_replied');

        return $validator;
    }
}
