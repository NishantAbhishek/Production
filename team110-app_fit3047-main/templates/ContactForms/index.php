<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\ContactForm> $contactForms
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

<div class="contactForms index content">
    <h3><?= __('Contact Forms') ?></h3>
    <div class="table-responsive">
        <table id="orderTable">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('contact_name') ?></th>
                    <th><?= $this->Paginator->sort('contact_email') ?></th>
                    <th><?= $this->Paginator->sort('contact_phone') ?></th>
                    <th><?= $this->Paginator->sort('contact_replied') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($contactForms as $contactForm): ?>
                <tr>
                    <td><?= h($contactForm->contact_name) ?></td>
                    <td><?= h($contactForm->contact_email) ?></td>
                    <td><?= h($contactForm->contact_phone) ?></td>
                    <td><?= ($contactForm->contact_replied == 1) ? 'yes' : 'no'; ?></td>
                    <td>
                        <?= $this->Html->link(__('View'), ['action' => 'view', $contactForm->id],['class'=>'formbutton']) ?>
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
