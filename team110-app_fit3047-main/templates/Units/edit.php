<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Unit $unit
 * @var string[]|\Cake\Collection\CollectionInterface $stores
 */
?>
<div class="row">

    <div class="container-fluid  container1">
        <div class="row">
            <div class="column-responsive">
                <div class="">
                    <?= $this->Form->create($unit) ?>
                    <fieldset>
                        <h2><?= ('Edit Unit') ?></h2>
                        <?php
                        echo $this->Form->control('unit_no');
                        echo $this->Form->control('unit_area');
                        echo $this->Form->control('unit_type', ['options' => ['Locker' => 'Locker', 'Small' => 'Small', 'Medium' => 'Medium', 'Large' => 'Large', 'Other' => 'Other']]);
                        echo $this->Form->control('unit_price');
                        echo $this->Form->control('unit_desc');
                        echo $this->Form->control('unit_avail');
                        echo $this->Form->control('store_id', ['options' => $stores]);
                        ?>
                    </fieldset>
                    <div class="container text-right">
                        <?= $this->Form->button(('Submit'), ['class' => 'btn btn-primary']) ?>
                        <?= $this->Form->end() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>


        .container1 {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            margin: 25px auto;
            max-width: 700px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-control {
            font-size: 13px; /* Adjust the font size to your preference /
            height: 100px; / Adjust the height to your preference */
            width: 100%;
        }

        .title {
            font-size: 20px;
            align-content: center;
            width: 100%;
        }

    </style>
