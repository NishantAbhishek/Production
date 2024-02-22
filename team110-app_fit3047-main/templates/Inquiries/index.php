<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Inquiry> $inquiries
 * @var User $user
 */

echo $this->Html->css('//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css', ['block' => true]);
echo $this->Html->script('//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js', ['block' => true]);


?>

<style>
    input[type='search'], select {
        width: auto;
        height: auto;
    }

    label {
        font-size: 1em;
    }

</style>


<div class="inquiries index content">

    <?php if ($user->user_level === 'admin'): ?>
        <?= $this->Html->link(__('Book A New Inquiry'), ['action' => 'add'], ['class' => 'buttonform2 float-right']) ?>
    <?php endif; ?>


    <div class="table-responsive">
        <h3 class="tableHeading"><?= __('Inquiry') ?></h3>
        <div class="table-responsive">
            <table id="orderTable">
                <thead>
                <tr>
                    <th><?= $this->Paginator->sort('inquiry_order_time') ?></th>
                    <th><?= $this->Paginator->sort('inquiry_detail') ?></th>
                    <th><?= $this->Paginator->sort('inquiry_pickup') ?></th>
                    <th><?= $this->Paginator->sort('inquiry_dropoff') ?></th>
                    <th><?= $this->Paginator->sort('inquiry_start_time') ?></th>
                    <th><?= $this->Paginator->sort('inquiry_reviewed') ?></th>
                    <th><?= $this->Paginator->sort('inquiry_confirmed') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($inquiries as $inquiry): ?>
                    <tr>
                        <td><?= h($inquiry->inquiry_order_time) ?></td>
                        <td><?= h($inquiry->inquiry_detail) ?></td>
                        <td><?= h($inquiry->inquiry_pickup) ?></td>
                        <td><?= h($inquiry->inquiry_dropoff) ?></td>
                        <td><?= h($inquiry->inquiry_start_time) ?></td>
                        <td><?= ($inquiry->inquiry_reviewed == 1) ? 'Yes' : 'No' ?></td>
                        <td><?= ($inquiry->inquiry_confirmed == 1) ? 'Yes' : 'No' ?></td>
                        <td>
                            <?= $this->Html->link(__('Inquiry Details'), ['action' => 'view', $inquiry->id], ['class' => 'formbutton']) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
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
    $(document).ready(function () {
        $('#orderTable').DataTable();
    });
</script>
<style>
    /* Add this CSS to limit the table's width and make it scroll horizontally */
    .table-responsive {
        max-width: 100%;
        overflow-x: auto;
    }

    /* Optionally, you can style the DataTables search input and select elements */
    .dataTables_filter input,
    .dataTables_length select {
        width: auto;
        height: auto;
        display: inline-block;
    }

    /* Optionally, you can adjust the label font size */
    label {
        font-size: 1em;
    }
</style>
