<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Store $store
 * @var \App\Model\Entity\User $user
 */
?>
<div class="row">
    <div class="column-responsive">
        <div class="stores view content">
            <h3 class="tableHeading"><?= __('Store Details') ?></h3>
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= h($store->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Store Name') ?></th>
                    <td><?= h($store->store_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Store Address') ?></th>
                    <td><?= h($store->store_address) ?></td>
                </tr>
                <tr>
                    <th><?= __('Store Phone') ?></th>
                    <td><?= h($store->store_phone) ?></td>
                </tr>
                <tr>
                    <th><?= __('Store Open') ?></th>
                    <td><?= h($store->store_open) ?></td>
                </tr>
                <tr>
                    <th><?= __('Store Close') ?></th>
                    <td><?= h($store->store_close) ?></td>
                </tr>
            </table>

            <?php if ($user->user_level === 'admin'): ?>
                <aside class="column">
                    <div class="center-nav">
                        <?= $this->Html->link(__('Modify Store'), ['action' => 'edit', $store->id], ['class' => 'formbutton']) ?>
                        <?= $this->Form->postLink(__('Delete Store'), ['action' => 'delete', $store->id], ['confirm' => __('Are you sure you want to delete # {0}?', $store->id), 'class' => 'formbutton']) ?>
                        <?= $this->Html->link(__('List Stores'), ['action' => 'index'], ['class' => 'formbutton']) ?>
                    </div>
                </aside>
            <?php endif; ?>


        </div>
    </div>


</div>

<?php if ($user->user_level === 'admin'): ?>
    <div class="row">
        <div class="column-responsive">
            <div class="stores view content">
                <div class="related">
                    <h3 class="tableHeading"><?= __('Units in this Storage') ?></h3>
                    <?php if (!empty($store->units)) : ?>
                        <div class="table-responsive">
                            <table>
                                <tr>
                                    <th><?= __('Id') ?></th>
                                    <th><?= __('Unit Number') ?></th>
                                    <th><?= __('Unit Space') ?></th>
                                    <th><?= __('Unit Type') ?></th>
                                    <th><?= __('Unit Price') ?></th>
                                    <th><?= __('Store Id') ?></th>
                                    <th class="actions"><?= __('Actions') ?></th>
                                </tr>
                                <?php foreach ($store->units as $units) : ?>
                                    <tr>
                                        <td><?= h($units->id) ?></td>
                                        <td><?= h($units->unit_number) ?></td>
                                        <td><?= h($units->unit_space) ?></td>
                                        <td><?= h($units->unit_type) ?></td>
                                        <td><?= h($units->unit_price) ?></td>
                                        <td><?= h($units->store_id) ?></td>
                                        <td>
                                            <?= $this->Html->link(__('View'), ['controller' => 'Units', 'action' => 'view', $units->id],['class'=>'formbutton']) ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </table>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

