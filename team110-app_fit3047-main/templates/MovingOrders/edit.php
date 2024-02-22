<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MovingOrder $movingOrder
 * @var string[]|\Cake\Collection\CollectionInterface $users
 * @var string[]|\Cake\Collection\CollectionInterface $staffs
 * @var string[]|\Cake\Collection\CollectionInterface $vehicles
 */
?>


<!-- Include Select2 CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Include Select2 JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<div class="row">
    <h3 class="heading"><?= __('Assign Staff and Vechicles') ?></h3>
    <div class="column-responsive">
        <div class="movingOrders form content">

            <table id="orderTable">
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= h($movingOrder->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Detail') ?></th>
                    <td><?= h($movingOrder->mo_detail) ?></td>
                </tr>
                <tr>
                    <th><?= __('Pickup') ?></th>
                    <td><?= h($movingOrder->mo_pickup) ?></td>
                </tr>
                <tr>
                    <th><?= __('Dropoff') ?></th>
                    <td><?= h($movingOrder->mo_dropoff) ?></td>
                </tr>
            </table>


            <?= $this->Form->create($movingOrder) ?>
            <fieldset>
                <?= $this->Form->create($movingOrder) ?>
                <fieldset>

<!--                    --><?php //echo $this->Form->control('mo_quote',[ 'label' => 'Price', 'id' => 'mo_quote']); ?>


                    <?= $this->Form->control('staffs._ids', [
                        'label' => 'Search Staff Name',
                        'options' => $staffs,
                        'class' => 'select', // Add the custom class
                        'multiple' => true,
                    ]) ?>


                    <?= $this->Form->control('vehicles._ids', [
                        'label' => 'Search Vehicle',
                        'options' => $vehicles,
                        'class' => 'form-control custom-select', // Add the custom class
                        'multiple' => true,
                    ]) ?>

                </fieldset>
                <aside class="column">
                    <div class="center-nav">
                        <?= $this->Form->button(__('Submit'), ['class' => 'formbutton']) ?>
                    </div>
                </aside>

                <?= $this->Form->end() ?>
            </fieldset>

        </div>
    </div>
    <aside class="column">
        <div class="center-nav">
            <?= $this->Html->link(__('List Moving Orders'), ['action' => 'index'], ['class' => 'formbutton']) ?>
        </div>
    </aside>

</div>


<script>
    $(document).ready(function() {
        // Initialize Select2 for the multi-select dropdown
        $('select').select2();
    });
</script>

<style>
    .error {
        border: 1px solid red;
        outline: 2px solid red;
    }
</style>


<script>
    document.addEventListener("DOMContentLoaded", function () {
        const inputField = document.getElementById("mo_quote");

        inputField.addEventListener("input", function () {
            const inputValue = this.value.trim();

            if (/^\d{3}$/.test(inputValue)) {
                // Input is a 3-digit numeric value
                this.classList.remove("error");
            } else {
                // Input does not match the desired format
                this.classList.add("error");
            }
        });

        // Prevent form submission if the input is invalid
        const form = document.querySelector("form");
        form.addEventListener("submit", function (event) {
            const inputField = document.getElementById("mo_quote");
            const inputValue = inputField.value.trim();

            if (!/^\d{3}$/.test(inputValue)) {
                event.preventDefault(); // Prevent form submission
                inputField.classList.add("error");
            }
        });
    });

</script>

