<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Vehicle $vehicle
 * @var string[]|\Cake\Collection\CollectionInterface $movingOrders
 */
?>
<?php
/**

@var \App\View\AppView $this
@var \App\Model\Entity\Vehicle $vehicle
@var \App\Model\Entity\Vehicle $vehicleType
@var string[]|\Cake\Collection\CollectionInterface $movingOrders
 */
?>

<div class="container-fluid  container1">
    <div class="row">
        <div class="column-responsive">
            <div class="">
                <?= $this->Form->create($vehicle) ?>
                <fieldset>
                    <legend><?= ('Edit Vehicle') ?></legend>
                    <?php
                    echo $this->Form->control('vehicle_rego');
                    echo $this->Form->control('vehicle_type', ['options' => ['UTE' => 'UTE', 'Small Box Truck' => 'Small Box Truck', 'Large Box Truck' => 'Large Box Truck', 'Dump Truck' => 'Dump Truck']]);
                    echo $this->Form->control('vehicle_model');
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

</style>
