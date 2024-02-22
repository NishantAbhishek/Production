<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Unit $unit
 * @var \App\Model\Entity\User $user
 */
?>
<div class="row">
    <div class="column-responsive">
        <div class="units view content">
            <h3 class="tableHeading"><?= __('Full Details Of Assigned Units And Stores.') ?></h3>
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= h($unit->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Unit No') ?></th>
                    <td><?= h($unit->unit_no) ?></td>
                </tr>
                <tr>
                    <th><?= __('Type') ?></th>
                    <td><?= h($unit->unit_type) ?></td>
                </tr>
                <tr>
                    <th><?= __('Description') ?></th>
                    <td><?= h($unit->unit_desc) ?></td>
                </tr>
                <tr>
                    <th><?= __('Store Name') ?></th>
                    <td><?= $unit->has('store') ? $this->Html->link($unit->store->store_name, ['controller' => 'Stores', 'action' => 'view', $unit->store->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Area') ?></th>
                    <td><?= $this->Number->format($unit->unit_area) ?></td>
                </tr>
                <tr>
                    <th><?= __('Price/Month') ?></th>
                    <td><?= $this->Number->format($unit->unit_price) ?></td>
                </tr>
            </table>
        </div>
    </div>

    <aside class="column">
        <div class="center-nav">
            <?php if ($user->user_level === 'customer'): ?>
                <?= $unit->has('store') ? $this->Html->link('Storage Details', ['controller' => 'Stores', 'action' => 'view', $unit->store->id],['class' => 'formbutton']) : '' ?>
            <?php endif; ?>

            <?php if ($user->user_level === 'admin'): ?>
                <?= $this->Html->link(__('List Units'), ['action' => 'index'], ['class' => 'formbutton']) ?>
                <?= $this->Html->link(__('Modify Unit'), ['action' => 'edit', $unit->id], ['class' => 'formbutton']) ?>
                <?= $this->Form->postLink(__('Delete Unit'), ['action' => 'delete', $unit->id], ['confirm' => __('Are you sure you want to delete # {0}?', $unit->id), 'class' => 'formbutton']) ?>

            <?php endif; ?>
        </div>
    </aside>

</div>
