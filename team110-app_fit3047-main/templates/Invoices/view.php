<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Invoice $invoice
 */
?>
<div class="row">
    <div class="column-responsive">
        <div class="invoices view content">
            <h3>Invoice Details</h3>
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= h($invoice->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Linked Order') ?></th>
                    <td>
                        <?php
                        $controller = '';
                        switch ($invoice->reference_type) {
                            case 'MovingOrder':
                                $controller = 'MovingOrders';
                                break;
                            case 'StorageOrder':
                                $controller = 'StorageOrders';
                                break;
                            default:
                                break;
                        }
                        echo $this->Html->link($invoice->reference, ['controller' => $controller, 'action' => 'view', $invoice->reference]);
                        ?>
                    </td>
                </tr>
                <tr>
                    <th><?= __('Order Type') ?></th>
                    <td><?= h($invoice->reference_type) ?></td>
                </tr>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $invoice->has('user') ? $this->Html->link($invoice->user->user_name, ['controller' => 'Users', 'action' => 'view', $invoice->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Amount (AUD)') ?></th>
                    <td><?= $invoice->invoice_amount === null ? '' : $this->Number->format($invoice->invoice_amount) ?></td>
                </tr>
                <tr>
                    <th><?= __('Invoice Date') ?></th>
                    <td><?= h($invoice->invoice_date) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
