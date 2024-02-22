<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MovingOrdersVehicle $movingOrdersVehicle
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Moving Orders Vehicle'), ['action' => 'edit', $movingOrdersVehicle->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Moving Orders Vehicle'), ['action' => 'delete', $movingOrdersVehicle->id], ['confirm' => __('Are you sure you want to delete # {0}?', $movingOrdersVehicle->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Moving Orders Vehicles'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Moving Orders Vehicle'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="movingOrdersVehicles view content">
            <h3><?= h($movingOrdersVehicle->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= h($movingOrdersVehicle->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Mo Vehicle Status') ?></th>
                    <td><?= h($movingOrdersVehicle->mo_vehicle_status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Vehicle') ?></th>
                    <td><?= $movingOrdersVehicle->has('vehicle') ? $this->Html->link($movingOrdersVehicle->vehicle->id, ['controller' => 'Vehicles', 'action' => 'view', $movingOrdersVehicle->vehicle->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Moving Order') ?></th>
                    <td><?= $movingOrdersVehicle->has('moving_order') ? $this->Html->link($movingOrdersVehicle->moving_order->id, ['controller' => 'MovingOrders', 'action' => 'view', $movingOrdersVehicle->moving_order->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Mo Vehicle Update') ?></th>
                    <td><?= h($movingOrdersVehicle->mo_vehicle_update) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
