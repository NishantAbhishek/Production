<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StorageOrder $storageOrder
 * @var User $user
 */
?>
<div class="row">
    <div class="column-responsive">
        <h3 class="tableHeading"><?= __('Full Detail Of the Storage Order') ?></h3>
        <div class="storageorders view content">
            <table>
                <tr>
                    <th><?= __('Order Id') ?></th>
                    <td><?= h($storageOrder->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $storageOrder->has('user') ? $this->Html->link($storageOrder->user->user_name, ['controller' => 'Users', 'action' => 'view', $storageOrder->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Unit No.') ?></th>
                    <td><?= $storageOrder->has('unit') ? $this->Html->link($storageOrder->unit->unit_no, ['controller' => 'Units', 'action' => 'view', $storageOrder->unit->id]) : '' ?></td>
                </tr>

                <tr>
                    <th><?= __('Duration in Month') ?></th>
                    <td><?= $this->Number->format($storageOrder->so_duration) ?></td>
                </tr>
                <tr>
                    <th><?= __('Paid Price') ?></th>
                    <td><?= $this->Number->format($storageOrder->so_price) ?></td>
                </tr>
                <tr>
                    <th><?= __('Order At') ?></th>
                    <td><?= h($storageOrder->so_order_time) ?></td>
                </tr>
                <tr>
                    <th><?= __('Start Date') ?></th>
                    <td><?= h($storageOrder->so_start) ?></td>
                </tr>
            </table>
        </div>
    </div>

    <aside class="column">
        <div class="center-nav">
            <?= $this->Html->link('Check Full Unit Details', ['controller' => 'Units', 'action' => 'view', $storageOrder->unit->id], ['class' => 'formbutton']) ?>
            <?php if ($user->user_level === 'admin'): ?>
                <?= $this->Form->postLink(__('Delete Storage Order'), ['action' => 'delete', $storageOrder->id], ['confirm' => __('Are you sure you want to delete # {0}?', $storageOrder->id), 'class' => 'formbutton']) ?>
                <?= $this->Html->link(__('List Storage Orders'), ['action' => 'index'], ['class' => 'formbutton']) ?>            <?php endif; ?>
        </div>
    </aside>
</div>
