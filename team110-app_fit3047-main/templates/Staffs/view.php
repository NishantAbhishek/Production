<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Staff $staff
 */
?>
<div class="row">
    <div class="column-responsive">
        <div class="staffs view content">
            <h3>Staff Orders</h3>
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= h($staff->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Staff Name') ?></th>
                    <td><?= h($staff->staff_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Staff Phone') ?></th>
                    <td><?= h($staff->staff_phone) ?></td>
                </tr>
                <tr>
                    <th><?= __('Staff Email') ?></th>
                    <td><?= h($staff->staff_email) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Assigned Moving Orders') ?></h4>
                <?php if (!empty($staff->moving_orders)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Order Time') ?></th>
                            <th><?= __('Update') ?></th>
                            <th><?= __('Detail') ?></th>
                            <th><?= __('Pickup') ?></th>
                            <th><?= __('Dropoff') ?></th>
                            <th><?= __('Start Time') ?></th>
                            <th><?= __('End Time') ?></th>
                            <th><?= __('Quote') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($staff->moving_orders as $movingOrders) : ?>
                        <tr>
                            <td><?= h($movingOrders->mo_order_time) ?></td>
                            <td><?= h($movingOrders->mo_update) ?></td>
                            <td><?= h($movingOrders->mo_detail) ?></td>
                            <td><?= h($movingOrders->mo_pickup) ?></td>
                            <td><?= h($movingOrders->mo_dropoff) ?></td>
                            <td><?= h($movingOrders->mo_start_time) ?></td>
                            <td><?= h($movingOrders->mo_end_time) ?></td>
                            <td><?= h($movingOrders->mo_quote) ?></td>
                            <td>
                                <?= $this->Html->link(__('View'), ['controller' => 'MovingOrders', 'action' => 'view', $movingOrders->id],['class'=>'formbutton']) ?>
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
            <?= $this->Html->link(__('Modify Staff'), ['action' => 'edit', $staff->id],['class'=>'formbutton']) ?>
            <?= $this->Form->postLink(__('Delete Staff'), ['action' => 'delete', $staff->id], ['confirm' => __('Are you sure you want to delete # {0}?', $staff->id), 'class' => 'formbutton']) ?>
            <?= $this->Html->link(__('List Staffs'), ['action' => 'index'], ['class' => 'formbutton']) ?>
            <?= $this->Html->link(__('New Staff'), ['action' => 'add'], ['class' => 'formbutton']) ?>
        </div>
    </aside>
</div>
