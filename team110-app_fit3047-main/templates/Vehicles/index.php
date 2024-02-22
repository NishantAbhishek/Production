<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Vehicle> $vehicles
 */
?>
<div class="vehicles index content">
    <?= $this->Html->link(__('New Vehicle'), ['action' => 'add'], ['class' => 'buttonform2 float-right']) ?>
    <h3><?= __('Vehicles') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('vehicle_rego') ?></th>
                    <th><?= $this->Paginator->sort('vehicle_type') ?></th>
                    <th><?= $this->Paginator->sort('vehicle_model') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($vehicles as $vehicle): ?>
                <tr>
                    <td><?= h($vehicle->id) ?></td>
                    <td><?= h($vehicle->vehicle_rego) ?></td>
                    <td><?= h($vehicle->vehicle_type) ?></td>
                    <td><?= h($vehicle->vehicle_model) ?></td>
                    <td>
                        <?= $this->Html->link(__('View'), ['action' => 'view', $vehicle->id],['class'=>'formbutton']) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
