<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Staff> $staffs
 */
?>
<div class="staffs index content">
    <?= $this->Html->link(__('New Staff'), ['action' => 'add'], ['class' => 'buttonform2 float-right']) ?>
    <h3><?= __('Staffs') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('staff_name') ?></th>
                    <th><?= $this->Paginator->sort('staff_phone') ?></th>
                    <th><?= $this->Paginator->sort('staff_email') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($staffs as $staff): ?>
                <tr>
                    <td><?= h($staff->staff_name) ?></td>
                    <td><?= h($staff->staff_phone) ?></td>
                    <td><?= h($staff->staff_email) ?></td>
                    <td>
                        <?= $this->Html->link(__('View'), ['action' => 'view', $staff->id],['class'=>'formbutton']) ?>
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
