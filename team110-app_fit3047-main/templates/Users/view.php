<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Users'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New User'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="users view content">
            <h3><?= h($user->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= h($user->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('User Name') ?></th>
                    <td><?= h($user->user_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($user->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Nonce') ?></th>
                    <td><?= h($user->nonce) ?></td>
                </tr>
                <tr>
                    <th><?= __('User Phone') ?></th>
                    <td><?= h($user->user_phone) ?></td>
                </tr>
                <tr>
                    <th><?= __('User Type') ?></th>
                    <td><?= h($user->user_type) ?></td>
                </tr>
                <tr>
                    <th><?= __('User Level') ?></th>
                    <td><?= h($user->user_level) ?></td>
                </tr>
                <tr>
                    <th><?= __('User Company') ?></th>
                    <td><?= h($user->user_company) ?></td>
                </tr>
                <tr>
                    <th><?= __('Nonce Expiry') ?></th>
                    <td><?= h($user->nonce_expiry) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Moving Orders') ?></h4>
                <?php if (!empty($user->moving_orders)) : ?>
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
                        <?php foreach ($user->moving_orders as $movingOrders) : ?>
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
                            <td class="actions">
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
            <div class="related">
                <h4><?= __('Related Storage Orders') ?></h4>
                <?php if (!empty($user->storage_orders)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('So Order Time') ?></th>
                            <th><?= __('So Update') ?></th>
                            <th><?= __('So Start') ?></th>
                            <th><?= __('So Duration') ?></th>
                            <th><?= __('So Price') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Unit Id') ?></th>
                            <th><?= __('Staff Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($user->storage_orders as $storageOrders) : ?>
                        <tr>
                            <td><?= h($storageOrders->id) ?></td>
                            <td><?= h($storageOrders->so_order_time) ?></td>
                            <td><?= h($storageOrders->so_update) ?></td>
                            <td><?= h($storageOrders->so_start) ?></td>
                            <td><?= h($storageOrders->so_duration) ?></td>
                            <td><?= h($storageOrders->so_price) ?></td>
                            <td><?= h($storageOrders->user_id) ?></td>
                            <td><?= h($storageOrders->unit_id) ?></td>
                            <td><?= h($storageOrders->staff_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'StorageOrders', 'action' => 'view', $storageOrders->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'StorageOrders', 'action' => 'edit', $storageOrders->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'StorageOrders', 'action' => 'delete', $storageOrders->id], ['confirm' => __('Are you sure you want to delete # {0}?', $storageOrders->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
