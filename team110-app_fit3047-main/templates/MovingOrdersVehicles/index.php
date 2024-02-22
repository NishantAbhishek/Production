<?php
///**
// * @var \App\View\AppView $this
// * @var iterable<\App\Model\Entity\MovingOrdersVehicle> $movingOrdersVehicles
// */
//?>
<!--<div class="movingOrdersVehicles index content">-->
<!--    --><?php //= $this->Html->link(__('New Moving Orders Vehicle'), ['action' => 'add'], ['class' => 'button float-right']) ?>
<!--    <h3>--><?php //= __('Moving Orders Vehicles') ?><!--</h3>-->
<!--    <div class="table-responsive">-->
<!--        <table>-->
<!--            <thead>-->
<!--                <tr>-->
<!--                    <th>--><?php //= $this->Paginator->sort('id') ?><!--</th>-->
<!--                    <th>--><?php //= $this->Paginator->sort('mo_vehicle_status') ?><!--</th>-->
<!--                    <th>--><?php //= $this->Paginator->sort('mo_vehicle_update') ?><!--</th>-->
<!--                    <th>--><?php //= $this->Paginator->sort('vehicle_id') ?><!--</th>-->
<!--                    <th>--><?php //= $this->Paginator->sort('moving_order_id') ?><!--</th>-->
<!--                    <th class="actions">--><?php //= __('Actions') ?><!--</th>-->
<!--                </tr>-->
<!--            </thead>-->
<!--            <tbody>-->
<!--                --><?php //foreach ($movingOrdersVehicles as $movingOrdersVehicle): ?>
<!--                <tr>-->
<!--                    <td>--><?php //= h($movingOrdersVehicle->id) ?><!--</td>-->
<!--                    <td>--><?php //= h($movingOrdersVehicle->mo_vehicle_status) ?><!--</td>-->
<!--                    <td>--><?php //= h($movingOrdersVehicle->mo_vehicle_update) ?><!--</td>-->
<!--                    <td>--><?php //= $movingOrdersVehicle->has('vehicle') ? $this->Html->link($movingOrdersVehicle->vehicle->id, ['controller' => 'Vehicles', 'action' => 'view', $movingOrdersVehicle->vehicle->id]) : '' ?><!--</td>-->
<!--                    <td>--><?php //= $movingOrdersVehicle->has('moving_order') ? $this->Html->link($movingOrdersVehicle->moving_order->id, ['controller' => 'MovingOrders', 'action' => 'view', $movingOrdersVehicle->moving_order->id]) : '' ?><!--</td>-->
<!--                    <td class="actions">-->
<!--                        --><?php //= $this->Html->link(__('View'), ['action' => 'view', $movingOrdersVehicle->id]) ?>
<!--                        --><?php //= $this->Html->link(__('Edit'), ['action' => 'edit', $movingOrdersVehicle->id]) ?>
<!--                        --><?php //= $this->Form->postLink(__('Delete'), ['action' => 'delete', $movingOrdersVehicle->id], ['confirm' => __('Are you sure you want to delete # {0}?', $movingOrdersVehicle->id)]) ?>
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
 * @var iterable<\App\Model\Entity\MovingOrdersVehicle> $movingOrdersVehicles
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

<div class="movingOrdersVehicles index content">
    <?= $this->Html->link(__('New Moving Orders Vehicle'), ['action' => 'add'], ['class' => 'buttonform2 float-right']) ?>
    <h3><?= __('Moving Orders Vehicles') ?></h3>
    <div class="table-responsive">
        <table id="orderTable">
            <thead>
            <tr>
                <th><?= $this->Paginator->sort('mo_vehicle_status') ?></th>
                <th><?= $this->Paginator->sort('mo_vehicle_update') ?></th>
                <th><?= $this->Paginator->sort('vehicle_id') ?></th>
                <th><?= $this->Paginator->sort('moving_order_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($movingOrdersVehicles as $movingOrdersVehicle): ?>
                <tr>
                    <td><?= h($movingOrdersVehicle->mo_vehicle_status) ?></td>
                    <td><?= h($movingOrdersVehicle->mo_vehicle_update) ?></td>
                    <td><?= $movingOrdersVehicle->has('vehicle') ? $this->Html->link($movingOrdersVehicle->vehicle->vehicle_model, ['controller' => 'Vehicles', 'action' => 'view', $movingOrdersVehicle->vehicle->id]) : '' ?></td>
                    <td><?= $movingOrdersVehicle->has('moving_order') ? $this->Html->link($movingOrdersVehicle->moving_order->mo_detail, ['controller' => 'MovingOrders', 'action' => 'view', $movingOrdersVehicle->moving_order->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $movingOrdersVehicle->id],['class' => 'formbutton']) ?>
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

