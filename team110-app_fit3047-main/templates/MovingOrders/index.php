<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\MovingOrder> $movingOrders
 * @var User $user
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

<div class="movingOrders index content">
    <?php if ($user->user_level === 'admin'): ?>
        <?= $this->Html->link(__('Create New Moving Order'), ['action' => 'add'], ['class' => 'buttonform2 float-right']) ?>
    <?php endif; ?>


    <div class="table-responsive">
        <h3 class="tableHeading"><?= __('Customers Moving Orders') ?></h3>

        <table id="orderTable">
            <thead>
            <tr>
                <th><?= h('Time') ?></th>
                <th><?= h('Update') ?></th>
                <th><?= h('Details') ?></th>
                <th><?= h('Pick Up') ?></th>
                <th><?= h('DropOff') ?></th>
                <th><?= h('Start Time') ?></th>
                <th><?= h('End Time') ?></th>
                <th><?=h('Quote') ?></th>
                <th><?= h('User Name') ?></th>
                <th class="actions"><?= __('Details') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($movingOrders as $movingOrder): ?>
                <tr>
                    <td><?= h($movingOrder->mo_order_time) ?></td>
                    <td><?= h($movingOrder->mo_update) ?></td>
                    <td><?= h($movingOrder->mo_detail) ?></td>
                    <td><?= h($movingOrder->mo_pickup) ?></td>
                    <td><?= h($movingOrder->mo_dropoff) ?></td>
                    <td><?= h($movingOrder->mo_start_time) ?></td>
                    <td><?= h($movingOrder->mo_end_time) ?></td>
                    <td><?= $movingOrder->mo_quote === null ? '' : $this->Number->format($movingOrder->mo_quote) ?></td>
                    <td><?= $movingOrder->has('user') ? $this->Html->link($movingOrder->user->user_name, ['controller' => 'Users', 'action' => 'view', $movingOrder->user->id]) : '' ?></td>
                    <td>
                        <?= $this->Html->link(__('Order Detail'), ['action' => 'view', $movingOrder->id],['class' => 'formbutton']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>


</div>


<script>
    $(document).ready(function (){
        $('#orderTable').DataTable();
    });
</script>
