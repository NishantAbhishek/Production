<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Unit $unit
 * @var \Cake\Collection\CollectionInterface|string[] $stores
 */
?>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <?= $this->Html->meta('icon') ?>
    <?= $this->fetch('title') ?>
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <?= $this->Html->css(['styles','default','normalize.min', 'milligram.min','cake','styles']) ?>


    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<br>
<div class="container-fluid  container1">
    <div class="row">
        <div class="column-responsive">
            <div class="">
                <?= $this->Form->create($unit) ?>
                <fieldset>
                    <div class = "container text-center">
                        <h3><b>Add Unit</b></h3>
                    </div>
                    <?php
                    echo $this->Form->control('store_id', ['options' => $stores]);
                    echo $this->Form->control('unit_no');
                    echo $this->Form->control('unit_area');
                    echo $this->Form->control('unit_type', ['options' => ['Locker' => 'Locker', 'Small' => 'Small', 'Medium' => 'Medium', 'Large' => 'Large', 'Other' => 'Other']]);                    echo $this->Form->control('unit_price');
                    echo $this->Form->control('unit_desc');
                    echo $this->Form->control('unit_avail');
                    ?>
                    <div class="container text-right">
                        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary']) ?>
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
        font-size: 13px; /* Adjust the font size to your preference */
        height: 100px; /* Adjust the height to your preference */
        width: 100%;
    }
    .title{
        font-size: 20px;
        align-content: center;
        width: 100%;
    }

</style>
