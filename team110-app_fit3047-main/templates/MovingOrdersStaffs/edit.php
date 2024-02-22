<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MovingOrdersStaff $movingOrdersStaff
 * @var string[]|\Cake\Collection\CollectionInterface $staffs
 * @var string[]|\Cake\Collection\CollectionInterface $movingOrders
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Modify Job Status') ?></h4>
        </div>
    </aside>
    <div class="column-responsive">
        <div class="movingOrdersStaffs form content">
            <?= $this->Form->create($movingOrdersStaff) ?>
            <fieldset>
                <?php
                echo $this->Foram->control('mo_staff_status', [
                    'label' => 'Job By Current Staff',
                    'options' => [
                        'assigned' => 'Assigned',
                        'working' => 'Working',
                        'finished' => 'Finished',
                    ]
                ]);
                echo $this->Form->control('mo_staff_update',['label'=>'Updating At']);
                ?>
            </fieldset>
            <aside class="column">
                <div class="center-nav">
                    <?= $this->Form->button(__('Submit'), ['class' => 'formbutton']) ?>
                </div>
            </aside>
            <?= $this->Form->end() ?>
        </div>
    </div>
    <aside class="column">
        <div class="center-nav">
            <?= $this->Html->link(__('List Other Staffs Orders'), ['action' => 'index'], ['class' => 'formbutton']) ?>
        </div>
    </aside>

</div>
