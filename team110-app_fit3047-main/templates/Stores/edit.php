<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Store $store
 */
?>
<?php
/**

@var \App\View\AppView $this
@var \App\Model\Entity\Store $store
 */
?>
<div class="container-fluid  container1">
    <div class="row">
        <div class="column-responsive">
            <div class="">
                <?= $this->Form->create($store) ?>
                <fieldset>
                    <h2><?= ('Edit Store') ?></h2>
                    <?php
                    echo $this->Form->control('store_name');
                    echo $this->Form->control('store_address');
                    echo $this->Form->control('store_open');
                    echo $this->Form->control('store_close');
                    echo $this->Form->control('store_phone');
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
