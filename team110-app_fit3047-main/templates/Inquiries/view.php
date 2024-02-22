<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Inquiry $inquiry
 * @var User $user
 */
?>
<div class="row">
    <h3 class="tableHeading"><?= __('Full Detail Of the Inquiry') ?></h3>

    <div class="view content">
        <div>
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= h($inquiry->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Inquiry Detail') ?></th>
                    <td><?= h($inquiry->inquiry_detail) ?></td>
                </tr>
                <tr>
                    <th><?= __('Inquiry Pickup') ?></th>
                    <td><?= h($inquiry->inquiry_pickup) ?></td>
                </tr>
                <tr>
                    <th><?= __('Inquiry Dropoff') ?></th>
                    <td><?= h($inquiry->inquiry_dropoff) ?></td>
                </tr>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $inquiry->has('user') ? $this->Html->link($inquiry->user->id, ['controller' => 'Users', 'action' => 'view', $inquiry->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Inquiry Quote') ?></th>
                    <td><?= $inquiry->inquiry_quote === null ? '' : $this->Number->format($inquiry->inquiry_quote) ?></td>
                </tr>
                <tr>
                    <th><?= __('Inquiry Vehicle') ?></th>
                    <td><?= $inquiry->inquiry_vehicle === null ? '' : $this->Number->format($inquiry->inquiry_vehicle) ?></td>
                </tr>
                <tr>
                    <th><?= __('Inquiry Staff') ?></th>
                    <td><?= $inquiry->inquiry_staff === null ? '' : $this->Number->format($inquiry->inquiry_staff) ?></td>
                </tr>
                <tr>
                    <th><?= __('Inquiry Order Time') ?></th>
                    <td><?= h($inquiry->inquiry_order_time) ?></td>
                </tr>
                <tr>
                    <th><?= __('Inquiry Update') ?></th>
                    <td><?= h($inquiry->inquiry_update) ?></td>
                </tr>
                <tr>
                    <th><?= __('Inquiry Start Time') ?></th>
                    <td><?= h($inquiry->inquiry_start_time) ?></td>
                </tr>
                <tr>
                    <th><?= __('Inquiry End Time') ?></th>
                    <td><?= h($inquiry->inquiry_end_time) ?></td>
                </tr>
                <tr>
                    <th><?= __('Inquiry Reviewed') ?></th>
                    <td><?= $inquiry->inquiry_reviewed ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Inquiry Confirmed') ?></th>
                    <td><?= $inquiry->inquiry_confirmed ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
        </div>
        <aside class="column">
            <div class="center-nav">

                <?php if ($user->user_level === 'admin'): ?>
                    <?= $this->Html->link(__('Verify Inquiry'), ['action' => 'edit', $inquiry->id], ['class' => 'formbutton']) ?>
                <?php endif; ?>

                <?= $this->Form->postLink(__('Delete Inquiry'), ['action' => 'delete', $inquiry->id], ['confirm' => __('Are you sure you want to delete # {0}?', $inquiry->id), 'class' => 'formbutton']) ?>
                <?= $this->Html->link(__('List Inquiries'), ['action' => 'index'],  ['class' => 'formbutton']) ?>
                <?= $this->Html->link(__('Confirm Inquiry'), ['action' => 'confirm', $inquiry->id], [
                    'class' => 'formbutton',
                ]) ?>
            </div>
        </aside>
    </div>
</div>
