<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Inquiry $inquiry
 * @var \Cake\Collection\CollectionInterface|string[] $users
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
                <?= $this->Form->create($inquiry) ?>
                <fieldset>
                    <br>
                    <div class = "container text-center">
                        <h3><b>New Moving Inquiry</b></h3>
                    </div>
                    <?php
                    echo $this->Form->control('user_id', ['options' => $users, 'class' => 'form-control', 'label' => 'Full Name', 'readonly'=> true,'style'=>'height: 40px']);
                    ?><br>


            </div>
            <?php //echo $this->Form->control('mo_order_time', ['class' => 'form-control']); ?>

            <?php //echo $this->Form->control('mo_update', ['class' => 'form-control']); ?>

            <?php echo $this->Form->control('inquiry_pickup', ['class' => 'form-control', 'label' => 'Pick up location']); ?>
            <br>
            <?php echo $this->Form->control('inquiry_dropoff', ['class' => 'form-control', 'label' => 'Drop off location']); ?>
            <br>
            <?php // $defaultDate = isset($passedDate) ? date("Y-m-d\TH:i", strtotime($passedDate)) : null; // Convert the passed date to the format required by datetime-local input type
            echo $this->Form->control('inquiry_start_time', [
                'id' => 'inquiry-start-time',
                'type' => 'datetime-local',
                'step' => 3600, // 3600 seconds = 1 hour
                'empty' => true,
                'class' => 'form-control',
                'label' => 'Start Date'
            ]); ?>
            <br><?php echo $this->Form->control('inquiry_detail', ['class' => 'form-control', 'label' => 'Moving details', 'rows' => 20, 'placeholder' => 'Details on what you are moving']); ?>
            <br>
            <?php //echo $this->Form->control('mo_end_time', ['empty' => true, 'class' => 'form-control']);?>
            <?php //echo $this->Form->control('mo_quote', ['class' => 'form-control']); ?>
            <?php //echo $this->Form->control('user_id', ['options' => $users, 'class' => 'form-control']);?>
            <?php //echo $this->Form->control('user_id', ['class' => 'form-control']);?>
            <?php //echo $this->Form->control('staffs.staff_name', ['options' => $staffs, 'class' => 'form-control']);?>
            <?php //echo $this->Form->control('vehicles._ids', ['options' => $vehicles, 'class' => 'form-control']);?>

            </fieldset>

            <div class="container text-right">
                <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary']) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('inquiry-start-time').addEventListener('change', function() {
        var dateValue = this.value;
        if(dateValue) {
            var date = new Date(dateValue);
            date.setMinutes(0);
            date.setSeconds(0);
            this.value = date.toISOString().slice(0,16); // Get only the date and hour, without seconds or milliseconds
        }
    });
</script>


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
