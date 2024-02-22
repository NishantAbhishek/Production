<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\StorageOrder> $storageOrders
 */
?>

<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\MovingOrder> $movingOrders
 */

echo $this->Html->css('//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css',['block'=>true]);
echo $this->Html->script('//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js',['block'=>true]);


?>

<style>
    input[type='search'],select{
        width: auto;
        height: auto;
    }

    label{
        font-size: 1em;
    }

</style>


<div class="storageOrders index content">
    <h3 class="tableHeading"><?= __('Storage Orders') ?></h3>
    <div class="table">
        <table id="orderTable">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('User') ?></th>

                    <th><?= $this->Paginator->sort('Start Date') ?></th>
                    <th><?= $this->Paginator->sort('Duration') ?></th>
                    <th><?= $this->Paginator->sort('Total Price') ?></th>
                    <th><?= $this->Paginator->sort('Unit No.') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($storageOrders as $storageOrder): ?>
                <tr>
                    <td><?= $storageOrder->has('user') ? $this->Html->link($storageOrder->user->user_name, ['controller' => 'Users', 'action' => 'view', $storageOrder->user->id]) : '' ?></td>
                    <td><?= h($storageOrder->so_start) ?></td>
                    <td><?= $this->Number->format($storageOrder->so_duration) ?></td>
                    <td><?= $this->Number->format($storageOrder->so_price) ?></td>
                    <td><?= $storageOrder->has('unit') ? $this->Html->link($storageOrder->unit->unit_no, ['controller' => 'Units', 'action' => 'view', $storageOrder->unit->id]) : '' ?></td>
                    <td>
                        <?= $this->Html->link(__('Order Details'), ['action' => 'view', $storageOrder->id],['class' => 'formbutton']) ?>
                    <td>
                    </td>
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


<script>
    $(document).ready(function (){
        $('#orderTable').DataTable();
    });
</script>
