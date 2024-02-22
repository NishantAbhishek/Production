<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Inquiry $inquiry
 * @var string[]|\Cake\Collection\CollectionInterface $users
 */
?>
<div class="row">

    <div class="column-responsive">
        <div class="inquiries form content">
            <?= $this->Form->create($inquiry) ?>
            <fieldset>
                <h3 class="heading"><?= __('Verify Inquiries') ?></h3>
                <?php
                    echo $this->Form->control('inquiry_order_time');
                    echo $this->Form->control('inquiry_update');
                    echo $this->Form->control('inquiry_detail');
                    echo $this->Form->control('inquiry_pickup');
                    echo $this->Form->control('inquiry_dropoff');
                    echo $this->Form->control('inquiry_start_time', ['empty' => true]);
                    echo $this->Form->control('inquiry_end_time', ['empty' => true]);
                    echo $this->Form->control('inquiry_quote');
                    echo $this->Form->control('inquiry_vehicle');
                    echo $this->Form->control('inquiry_staff');
                    echo $this->Form->control('inquiry_reviewed');
                    echo $this->Form->control('inquiry_confirmed');
                    echo $this->Form->control('user_id', ['options' => $users]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
        <aside class="column">
            <div class="center-nav">
                <?= $this->Form->postLink(
                    __('Delete'),
                    ['action' => 'delete', $inquiry->id],
                    ['confirm' => __('Are you sure you want to delete # {0}?', $inquiry->id), 'class' => 'formbutton']
                ) ?>
                <?= $this->Html->link(__('List Inquiries'), ['action' => 'index'], ['class' => 'formbutton']) ?>
            </div>
        </aside>
    </div>
</div>
