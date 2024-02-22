<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MovingOrdersVehicle $movingOrdersVehicle
 * @var string[]|\Cake\Collection\CollectionInterface $vehicles
 * @var string[]|\Cake\Collection\CollectionInterface $movingOrders
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $movingOrdersVehicle->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $movingOrdersVehicle->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Moving Orders Vehicles'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="movingOrdersVehicles form content">
            <?= $this->Form->create($movingOrdersVehicle) ?>
            <fieldset>
                <legend><?= __('Edit Moving Orders Vehicle') ?></legend>
                <?php
                    echo $this->Form->control('mo_vehicle_status');
                    echo $this->Form->control('mo_vehicle_update');
                    echo $this->Form->control('vehicle_id', ['options' => $vehicles]);
                    echo $this->Form->control('moving_order_id', ['options' => $movingOrders]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
