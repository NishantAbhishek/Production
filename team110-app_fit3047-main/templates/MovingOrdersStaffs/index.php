<?php
///**
// * @var \App\View\AppView $this
// * @var iterable<\App\Model\Entity\MovingOrdersStaff> $movingOrdersStaffs
// */
//?>
<!--<div class="movingOrdersStaffs index content">-->
<!--    --><?php //= $this->Html->link(__('New Moving Orders Staff'), ['action' => 'add'], ['class' => 'button float-right']) ?>
<!--    <h3>--><?php //= __('Moving Orders Staffs') ?><!--</h3>-->
<!--    <div class="table-responsive">-->
<!--        <table>-->
<!--            <thead>-->
<!--                <tr>-->
<!--                    <th>--><?php //= $this->Paginator->sort('id') ?><!--</th>-->
<!--                    <th>--><?php //= $this->Paginator->sort('mo_staff_status') ?><!--</th>-->
<!--                    <th>--><?php //= $this->Paginator->sort('mo_staff_update') ?><!--</th>-->
<!--                    <th>--><?php //= $this->Paginator->sort('staff_id') ?><!--</th>-->
<!--                    <th>--><?php //= $this->Paginator->sort('moving_order_id') ?><!--</th>-->
<!--                    <th class="actions">--><?php //= __('Actions') ?><!--</th>-->
<!--                </tr>-->
<!--            </thead>-->
<!--            <tbody>-->
<!--                --><?php //foreach ($movingOrdersStaffs as $movingOrdersStaff): ?>
<!--                <tr>-->
<!--                    <td>--><?php //= h($movingOrdersStaff->id) ?><!--</td>-->
<!--                    <td>--><?php //= h($movingOrdersStaff->mo_staff_status) ?><!--</td>-->
<!--                    <td>--><?php //= h($movingOrdersStaff->mo_staff_update) ?><!--</td>-->
<!--                    <td>--><?php //= $movingOrdersStaff->has('staff') ? $this->Html->link($movingOrdersStaff->staff->id, ['controller' => 'Staffs', 'action' => 'view', $movingOrdersStaff->staff->id]) : '' ?><!--</td>-->
<!--                    <td>--><?php //= $movingOrdersStaff->has('moving_order') ? $this->Html->link($movingOrdersStaff->moving_order->id, ['controller' => 'MovingOrders', 'action' => 'view', $movingOrdersStaff->moving_order->id]) : '' ?><!--</td>-->
<!--                    <td class="actions">-->
<!--                        --><?php //= $this->Html->link(__('View'), ['action' => 'view', $movingOrdersStaff->id]) ?>
<!--                        --><?php //= $this->Html->link(__('Edit'), ['action' => 'edit', $movingOrdersStaff->id]) ?>
<!--                        --><?php //= $this->Form->postLink(__('Delete'), ['action' => 'delete', $movingOrdersStaff->id], ['confirm' => __('Are you sure you want to delete # {0}?', $movingOrdersStaff->id)]) ?>
<!--                    </td>-->
<!--                </tr>-->
<!--                --><?php //endforeach; ?>
<!--            </tbody>-->
<!--        </table>-->
<!--    </div>-->
<!--    <div class="paginator">-->
<!--        <ul class="pagination">-->
<!--            --><?php //= $this->Paginator->first('<< ' . __('first')) ?>
<!--            --><?php //= $this->Paginator->prev('< ' . __('previous')) ?>
<!--            --><?php //= $this->Paginator->numbers() ?>
<!--            --><?php //= $this->Paginator->next(__('next') . ' >') ?>
<!--            --><?php //= $this->Paginator->last(__('last') . ' >>') ?>
<!--        </ul>-->
<!--        <p>--><?php //= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?><!--</p>-->
<!--    </div>-->
<!--</div>-->

<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\MovingOrdersStaff> $movingOrdersStaffs
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
<div class="movingOrdersStaffs index content">
    <div class="table-responsive">
        <h3 class="tableHeading"><?= __('Order Assigned To Staff List') ?></h3>

        <table id="orderTable">
            <thead>
            <tr>
                <th><?= $this->Paginator->sort('Order ID') ?></th>
                <th><?= $this->Paginator->sort('Status') ?></th>
                <th><?= $this->Paginator->sort('Staff Update') ?></th>
                <th><?= $this->Paginator->sort('Staff') ?></th>
                <th><?= $this->Paginator->sort('Order') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($movingOrdersStaffs as $movingOrdersStaff): ?>
                <tr>
                    <td><?= h($movingOrdersStaff->moving_order->id) ?></td>
                    <td><?= h($movingOrdersStaff->mo_staff_status) ?></td>
                    <td><?= h($movingOrdersStaff->mo_staff_update) ?></td>
                    <td><?= $movingOrdersStaff->has('staff') ? $this->Html->link($movingOrdersStaff->staff->staff_name, ['controller' => 'Staffs', 'action' => 'view', $movingOrdersStaff->staff->id]) : '' ?></td>
                    <td><?= $movingOrdersStaff->has('moving_order') ? $this->Html->link($movingOrdersStaff->moving_order->mo_detail, ['controller' => 'MovingOrders', 'action' => 'view', $movingOrdersStaff->moving_order->id]) : '' ?></td>
                    <td>
                        <?= $this->Html->link(__('View'), ['action' => 'view', $movingOrdersStaff->id],['class' => 'formbutton']) ?>
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
