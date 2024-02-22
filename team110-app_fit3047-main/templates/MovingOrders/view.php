<?php
///**
// * @var \App\View\AppView $this
// * @var \App\Model\Entity\MovingOrder $movingOrder
// */
//?>
<?php
/**
 * @var string $status
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MovingOrder $movingOrder
 * @var User $user
 */
?>
<div class="row">
    <div class="column-responsive">
        <h3 class="tableHeading"><?= __('Full Detail Of the Moving Order') ?></h3>

        <div class="movingOrders view content">
            <table id="orderTable">
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= h($movingOrder->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Detail') ?></th>
                    <td><?= h($movingOrder->mo_detail) ?></td>
                </tr>
                <tr>
                    <th><?= __('Job Status.') ?></th>
                    <td><?= h($status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Pickup') ?></th>
                    <td><?= h($movingOrder->mo_pickup) ?></td>
                </tr>
                <tr>
                    <th><?= __('Dropoff') ?></th>
                    <td><?= h($movingOrder->mo_dropoff) ?></td>
                </tr>

                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $movingOrder->has('user') ? $this->Html->link($movingOrder->user->user_name, ['controller' => 'Users', 'action' => 'view', $movingOrder->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Quote') ?></th>
                    <td><?= $movingOrder->mo_quote === null ? '' : $this->Number->format($movingOrder->mo_quote) ?></td>
                </tr>
                <tr>
                    <th><?= __('Order Time') ?></th>
                    <td><?= h($movingOrder->mo_order_time) ?></td>
                </tr>
                <tr>
                    <th><?= __('Update') ?></th>
                    <td><?= h($movingOrder->mo_update) ?></td>
                </tr>
                <tr>
                    <th><?= __('Start Time') ?></th>
                    <td><?= h($movingOrder->mo_start_time) ?></td>
                </tr>
                <tr>
                    <th><?= __('End Time') ?></th>
                    <td><?= h($movingOrder->mo_end_time) ?></td>
                </tr>
            </table>




        </div>
    </div>

    <aside class="column">
        <div class="center-nav">
            <?php if ($user->user_level === 'admin'): ?>
                <?= $this->Html->link(__('Assign or Unssign Staff'), ['action' => 'edit', $movingOrder->id], ['class' => 'formbutton']) ?>
                <?= $this->Form->postLink(__('Delete Moving Order'), ['action' => 'delete', $movingOrder->id], ['confirm' => __('Are you sure you want to delete # {0}?', $movingOrder->id), 'class' => 'formbutton']) ?>
                <?= $this->Html->link(__('List Moving Orders'), ['action' => 'index'],  ['class' => 'formbutton']) ?>
                <?= $this->Html->link(__('New Moving Order'), ['action' => 'add'],['class' => 'formbutton']) ?>
            <?php endif; ?>
        </div>
    </aside>
</div>


<script>
    $(document).ready(function (){
        $('#orderTable').DataTable();
    });
</script>
