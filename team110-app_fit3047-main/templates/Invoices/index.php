<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Invoice> $invoices
 *
 *
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

<div class="invoices index content">
    <div class="table-responsive">
        <h3 class="tableHeading"><?= __('Invoices') ?></h3>
        <table id="table">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('Invoice Type') ?></th>
                    <th><?= $this->Paginator->sort('Amount (AUD)') ?></th>
                    <th><?= $this->Paginator->sort('invoice_date') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($invoices as $invoice): ?>
                <tr>
                    <td><?= h($invoice->reference_type) ?></td>
                    <td><?= $invoice->invoice_amount === null ? '' : $this->Number->format($invoice->invoice_amount) ?></td>
                    <td><?= h($invoice->invoice_date) ?></td>
                    <td><?= $invoice->has('user') ? $this->Html->link($invoice->user->user_name, ['controller' => 'Users', 'action' => 'view', $invoice->user->id]) : '' ?></td>
                    <td>
                        <?= $this->Html->link(__('View'), ['action' => 'view', $invoice->id], ['class' => 'formbutton']) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>


<script>
    $(document).ready(function (){
        $('#table').DataTable();
    });
</script>
