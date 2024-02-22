<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Staff $staff
 * @var string[]|\Cake\Collection\CollectionInterface $movingOrders
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

<div class="container-fluid  container1">
    <div class="row">
        <div class="column-responsive">
            <div class="">
                <?= $this->Form->create($staff) ?>
                <fieldset>
                    <?php
                    echo $this->Form->control('staff_name');
                    echo $this->Form->control('staff_phone');
                    echo $this->Form->control('staff_email');
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
