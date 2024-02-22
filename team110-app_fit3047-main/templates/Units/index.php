<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Unit> $units
 */
?>
<div class="units index content">
    <?= $this->Html->link(__('New Unit'), ['action' => 'add'],  ['class' => 'buttonform2 float-right']) ?>
    <h3><?= __('Units') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('unit_no') ?></th>
                    <th><?= $this->Paginator->sort('unit_area') ?></th>
                    <th><?= $this->Paginator->sort('unit_type') ?></th>
                    <th><?= $this->Paginator->sort('unit_price') ?></th>
                    <th><?= $this->Paginator->sort('unit_desc') ?></th>
                    <th><?= $this->Paginator->sort('unit_avail') ?></th>
                    <th><?= $this->Paginator->sort('store_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($units as $unit): ?>
                <tr>
                    <td><?= h($unit->unit_no) ?></td>
                    <td><?= $this->Number->format($unit->unit_area) ?></td>
                    <td><?= h($unit->unit_type) ?></td>
                    <td><?= $this->Number->format($unit->unit_price) ?></td>
                    <td><?= h($unit->unit_desc) ?></td>
                    <td><?= h($unit->unit_avail) ?></td>
                    <td><?= $unit->has('store') ? $this->Html->link($unit->store->id, ['controller' => 'Stores', 'action' => 'view', $unit->store->id]) : '' ?></td>
                    <td>
                        <?= $this->Html->link(__('View'), ['action' => 'view', $unit->id],['class'=>'formbutton']) ?>
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
