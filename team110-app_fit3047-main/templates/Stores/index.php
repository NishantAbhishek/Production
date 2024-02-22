<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Store> $stores
 */
?>
<div class="stores index content">
    <?= $this->Html->link(__('New Store'), ['action' => 'add'], ['class' => 'buttonform2 float-right']) ?>
    <h3><?= __('Stores') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('store_name') ?></th>
                    <th><?= $this->Paginator->sort('store_address') ?></th>
                    <th><?= $this->Paginator->sort('store_open') ?></th>
                    <th><?= $this->Paginator->sort('store_close') ?></th>
                    <th><?= $this->Paginator->sort('store_phone') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($stores as $store): ?>
                <tr>
                    <td><?= h($store->store_name) ?></td>
                    <td><?= h($store->store_address) ?></td>
                    <td><?= h($store->store_open) ?></td>
                    <td><?= h($store->store_close) ?></td>
                    <td><?= h($store->store_phone) ?></td>
                    <td>
                        <?= $this->Html->link(__('View'), ['action' => 'view', $store->id],['class'=>'formbutton']) ?>
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
