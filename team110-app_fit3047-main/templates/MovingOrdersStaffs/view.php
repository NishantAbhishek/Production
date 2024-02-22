<?php
///**
// * @var \App\View\AppView $this
// * @var \App\Model\Entity\MovingOrdersStaff $movingOrdersStaff
// */
//?>
<!--<div class="row">-->
<!--    <aside class="column">-->
<!--        <div class="side-nav">-->
<!--            <h4 class="heading">--><?php //= __('Actions') ?><!--</h4>-->
<!--            --><?php //= $this->Html->link(__('Edit Moving Orders Staff'), ['action' => 'edit', $movingOrdersStaff->id], ['class' => 'side-nav-item']) ?>
<!--            --><?php //= $this->Form->postLink(__('Delete Moving Orders Staff'), ['action' => 'delete', $movingOrdersStaff->id], ['confirm' => __('Are you sure you want to delete # {0}?', $movingOrdersStaff->id), 'class' => 'side-nav-item']) ?>
<!--            --><?php //= $this->Html->link(__('List Moving Orders Staffs'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
<!--            --><?php //= $this->Html->link(__('New Moving Orders Staff'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
<!--        </div>-->
<!--    </aside>-->
<!--    <div class="column-responsive column-80">-->
<!--        <div class="movingOrdersStaffs view content">-->
<!--            <h3>--><?php //= h($movingOrdersStaff->id) ?><!--</h3>-->
<!--            <table>-->
<!--                <tr>-->
<!--                    <th>--><?php //= __('Id') ?><!--</th>-->
<!--                    <td>--><?php //= h($movingOrdersStaff->id) ?><!--</td>-->
<!--                </tr>-->
<!--                <tr>-->
<!--                    <th>--><?php //= __('Mo Staff Status') ?><!--</th>-->
<!--                    <td>--><?php //= h($movingOrdersStaff->mo_staff_status) ?><!--</td>-->
<!--                </tr>-->
<!--                <tr>-->
<!--                    <th>--><?php //= __('Staff') ?><!--</th>-->
<!--                    <td>--><?php //= $movingOrdersStaff->has('staff') ? $this->Html->link($movingOrdersStaff->staff->id, ['controller' => 'Staffs', 'action' => 'view', $movingOrdersStaff->staff->id]) : '' ?><!--</td>-->
<!--                </tr>-->
<!--                <tr>-->
<!--                    <th>--><?php //= __('Moving Order') ?><!--</th>-->
<!--                    <td>--><?php //= $movingOrdersStaff->has('moving_order') ? $this->Html->link($movingOrdersStaff->moving_order->id, ['controller' => 'MovingOrders', 'action' => 'view', $movingOrdersStaff->moving_order->id]) : '' ?><!--</td>-->
<!--                </tr>-->
<!--                <tr>-->
<!--                    <th>--><?php //= __('Mo Staff Update') ?><!--</th>-->
<!--                    <td>--><?php //= h($movingOrdersStaff->mo_staff_update) ?><!--</td>-->
<!--                </tr>-->
<!--            </table>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MovingOrdersStaff $movingOrdersStaff
 *
 */

?>
<div class="row">
    <div class="column-responsive">
        <h3 class="tableHeading"><?= __('Order Assigned To Staff') ?></h3>
        <div class="movingOrdersStaffs view content">
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= h($movingOrdersStaff->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Staff Status') ?></th>
                    <td><?= h($movingOrdersStaff->mo_staff_status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Assigned Staff') ?></th>
                    <td><?= $movingOrdersStaff->has('staff') ? $this->Html->link($movingOrdersStaff->staff->staff_name, ['controller' => 'Staffs', 'action' => 'view', $movingOrdersStaff->staff->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Details') ?></th>
                    <td><?= $movingOrdersStaff->has('moving_order') ? $this->Html->link($movingOrdersStaff->moving_order->mo_detail, ['controller' => 'MovingOrders', 'action' => 'view', $movingOrdersStaff->moving_order->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Staff Update') ?></th>
                    <td><?= h($movingOrdersStaff->mo_staff_update) ?></td>
                </tr>
            </table>
        </div>
    </div>
    <aside class="column">
        <div class="center-nav">
            <?= $this->Html->link(__('Update this order'), ['action' => 'edit', $movingOrdersStaff->id], ['class' => 'formbutton']) ?>
            <?= $this->Form->postLink(__('Unassign This Order From Me'), ['action' => 'delete', $movingOrdersStaff->id], ['confirm' => __('Are you sure you want get assigned # {0}?', $movingOrdersStaff->id), 'class' => 'formbutton']) ?>
            <?= $this->Html->link(__('Check Other Assigned Order'), ['action' => 'index'],['class' => 'formbutton']) ?>
        </div>
    </aside>
</div>

<script>
    $(document).ready(function (){
        $('#orderTable').DataTable();
    });
</script>
