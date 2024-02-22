<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Vehicle $vehicle
 */
?>
<div class="row">

    <div class="column-responsive column-80">
        <div class="vehicles view content">
            <h3>Vechicle Details.</h3>
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= h($vehicle->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Vehicle Rego') ?></th>
                    <td><?= h($vehicle->vehicle_rego) ?></td>
                </tr>
                <tr>
                    <th><?= __('Vehicle Type') ?></th>
                    <td><?= h($vehicle->vehicle_type) ?></td>
                </tr>
                <tr>
                    <th><?= __('Vehicle Model') ?></th>
                    <td><?= h($vehicle->vehicle_model) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Moving Orders') ?></h4>
                <?php if (!empty($vehicle->moving_orders)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Mo Order Time') ?></th>
                            <th><?= __('Mo Update') ?></th>
                            <th><?= __('Mo Detail') ?></th>
                            <th><?= __('Mo Pickup') ?></th>
                            <th><?= __('Mo Dropoff') ?></th>
                            <th><?= __('Mo Start Time') ?></th>
                            <th><?= __('Mo End Time') ?></th>
                            <th><?= __('Mo Quote') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($vehicle->moving_orders as $movingOrders) : ?>
                        <tr>
                            <td><?= h($movingOrders->id) ?></td>
                            <td><?= h($movingOrders->mo_order_time) ?></td>
                            <td><?= h($movingOrders->mo_update) ?></td>
                            <td><?= h($movingOrders->mo_detail) ?></td>
                            <td><?= h($movingOrders->mo_pickup) ?></td>
                            <td><?= h($movingOrders->mo_dropoff) ?></td>
                            <td><?= h($movingOrders->mo_start_time) ?></td>
                            <td><?= h($movingOrders->mo_end_time) ?></td>
                            <td><?= h($movingOrders->mo_quote) ?></td>
                            <td><?= h($movingOrders->user_id) ?></td>
                            <td>
                                <?= $this->Html->link(__('View'), ['controller' => 'MovingOrders', 'action' => 'view', $movingOrders->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'MovingOrders', 'action' => 'edit', $movingOrders->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'MovingOrders', 'action' => 'delete', $movingOrders->id], ['confirm' => __('Are you sure you want to delete # {0}?', $movingOrders->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <aside class="column">
        <div class="center-nav">
            <?= $this->Html->link(__('Edit Vehicle'), ['action' => 'edit', $vehicle->id], ['class' => 'formbutton']) ?>
            <?= $this->Form->postLink(__('Delete Vehicle'), ['action' => 'delete', $vehicle->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vehicle->id), 'class' => 'formbutton']) ?>
            <?= $this->Html->link(__('List Vehicles'), ['action' => 'index'], ['class' => 'formbutton']) ?>
        </div>
    </aside>
</div>
