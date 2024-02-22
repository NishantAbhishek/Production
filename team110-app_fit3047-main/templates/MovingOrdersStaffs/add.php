<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MovingOrder $movingOrder
 * @var \Cake\Collection\CollectionInterface|string[] $users
 * @var \Cake\Collection\CollectionInterface|string[] $staffs
 * @var \Cake\Collection\CollectionInterface|string[] $vehicles
 */


?>
<br>
<div class="container-fluid  container1">
    <div class="row">


        <div class="column-responsive">
            <div class="">
                <?= $this->Form->create($movingOrder) ?>
                <fieldset>
                    <br>
                    <div class = "container text-center">
                        <h1><b>New Moving Booking</b></h1>
                    </div>
                    <?php
                    // Set the user_id field to the generated value
                    //                    echo $this->Form->control('user_id', ['type' => 'text', 'value' => $users->first(), 'class' => 'form-control', 'label' => 'Full Name', 'readonly'=> true]);
                    echo $this->Form->control('user_id', ['options' => $users, 'class' => 'form-control', 'label' => 'Full Name', 'readonly'=> true,'style'=>'height: 40px']);

                    //                    echo $this->Form->control('user_id', [
                    //                        'options' => $users,
                    //                        'class' => 'form-control',
                    //                        'label' => 'Full Name',
                    //                        'default' => key($users[0]) // Select the first option by default
                    //                    ]);

                    ?><br>


            </div>
            <?php //echo $this->Form->control('mo_order_time', ['class' => 'form-control']); ?>

            <?php //echo $this->Form->control('mo_update', ['class' => 'form-control']); ?>
            <?php echo $this->Form->control('mo_pickup', ['class' => 'form-control', 'label' => 'Pick up location']); ?>
            <br>
            <?php echo $this->Form->control('mo_dropoff', ['class' => 'form-control', 'label' => 'Drop off location']); ?>
            <br>
            <?php echo $this->Form->control('mo_start_time', ['empty' => true, 'class' => 'form-control','label' => 'Start Date']); ?>
            <br><?php echo $this->Form->control('mo_detail', ['class' => 'form-control', 'label' => 'Moving details', 'rows' => 20, 'placeholder' => 'Details on what you are moving']); ?>
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
</div>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">


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
