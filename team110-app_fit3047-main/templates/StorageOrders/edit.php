<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StorageOrder $storageOrder
 * @var string[]|\Cake\Collection\CollectionInterface $users
 * @var string[]|\Cake\Collection\CollectionInterface $units
 * @var string[]|\Cake\Collection\CollectionInterface $staffs
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $storageOrder->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $storageOrder->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Storage Orders'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="storageOrders form content">
            <?= $this->Form->create($storageOrder) ?>
            <fieldset>
                <legend><?= __('Edit Storage Order') ?></legend>
                <?php
                    echo $this->Form->control('so_order_time');
                    echo $this->Form->control('so_update');
                    echo $this->Form->control('so_start');
                    echo $this->Form->control('so_duration');
                    echo $this->Form->control('so_price');
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('unit_id', ['options' => $units]);
                    echo $this->Form->control('staff_id', ['options' => $staffs]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
