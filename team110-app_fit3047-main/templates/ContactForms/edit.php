<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ContactForm $contactForm
 */
?>
<?php
/**

@var \App\View\AppView $this
@var \App\Model\Entity\ContactForm $contactForm
 */
?>

<div class="container-fluid  container1">
    <div class="row">
        <div class="column-responsive">
            <div class="">
                <?= $this->Form->create($contactForm) ?>
                <fieldset>
                    <h2><?= ('Edit Contact Form') ?></h2>
                    <?php
                    echo $this->Form->control('contact_msg');
                    echo $this->Form->control('contact_replied');
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
