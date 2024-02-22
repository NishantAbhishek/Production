
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StorageOrder $storageOrder
 * @var \Cake\Collection\CollectionInterface|string[] $users
 * @var string $unitType
 * @var string $unitSpace
 * @var string $unitPrice
 * @var string $unitId
 * @var \Cake\Collection\CollectionInterface|string[] $staffs
 * @var \Cake\Collection\CollectionInterface|string[] $units
 *
 */
?>

<br>
<div class="container-fluid  container1">
    <div class="row">
        <div class="column-responsive">
            <div>
                <?= $this->Form->create($storageOrder) ?>
                <fieldset>
                    <b>
                        <legend><?= __('New Storage Booking') ?></legend>
                    </b>
                    <?php echo $this->Form->control('user_id', ['options' => $users, 'class' => 'form-control', 'label' => 'Full Name', 'readonly'=> true,'style'=>'height: 40px']);?><br>

<!--                    --><?php //echo $this->Form->control('user_id', ['type' => 'text', 'value' => $users->first(), 'class' => 'form-control', 'label' => 'Full Name', 'readonly'=> true]);?><!--<br>-->
                    <?php echo $this->Form->control('unit_type', ['type' => 'text', 'value' => $unitType, 'class' => 'form-control', 'label' => 'Storage Type', 'readonly' => true]);?><br>

                    <?php echo $this->Form->hidden('submitted_from_add', ['value' => true]); ?> <!-- Add this line -->

                    <?php echo $this->Form->control('price_per_month', [
                        'readonly' => true,
                        'value' => $unitPrice,
                        'label' => 'Cost Per Month'
                    ])?>

                    <?php echo $this->Form->control('so_price', [
                        'readonly' => true,
                        'label' => 'Total Price',
                        'id' => 'so_price'
                    ])?>

                    <?php echo $this->Form->control('unit_id', [
                        'readonly' => true,
                        'value' => $units->first(),
                        'type' => 'hidden',
                    ])?>

<!--                    --><?php //echo $this->Form->control('staff_id', [
//                        'readonly' => true,
//                        'value' => $staffs->first(),
//                        'type' => 'hidden',
//                    ])?>

                    <?php echo $this->Form->control('so_start', ['class' => 'form-control','label'=>'Storage Start Date']);?><br>
                    <?php echo $this->Form->control('so_duration', ['class' => 'form-control', 'label' => 'Duration in Month', 'id' => 'so_duration']);?><br>

                </fieldset>
                <br>
                <div class="container text-right">
                    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary']) ?>
<!--                    <a class="btn btn-primary btn-xl text-uppercase" href="--><?php //= $this->Url->build([
//                        'controller' => 'Pages',
//                        'action' => 'public/linkStripe',
//                        '?' => [
//                            'order_id' => $unitId,
//                            'quote' => $unitPrice,
//                        ]
//                    ]) ?><!--">Pay Now!</a>-->
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
        height: 40px; /* Adjust the height to your preference */
        width: 100%;
    }

    .title{
        font-size: 20px;
        align-content: center;
        width: 100%;
    }
</style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<script>
    $(document).ready(function() {
        // Function to calculate and set the total price
        function calculateTotalPrice() {
            // Get the values of so_duration and unitPrice
            var so_duration = parseInt($('#so_duration').val());
            var unitPrice = parseFloat('<?php echo $unitPrice; ?>'); // Use PHP to set the initial unitPrice value

            // Calculate the total price
            var totalPrice = so_duration * unitPrice;

            // Set the value of the so_price input
            $('#so_price').val(totalPrice.toFixed(2)); // Round to two decimal places and set as the value
        }

        // Call the calculateTotalPrice function when so_duration changes
        $('#so_duration').on('change', calculateTotalPrice);

        // Initial calculation when the page loads
        calculateTotalPrice();
    });
</script>





