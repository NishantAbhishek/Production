<?php
use ContentBlocks\View\Helper\ContentBlockHelper;
/**
 * @var \App\Model\Entity\ContactForm $contactForm
 */
?>

<div class="text-center">
    <h1 class="section-heading text-uppercase" style="margin-top: 32px; font-size: 36px"><b>Contact Us</b></h1>
</div>

<div class="container-fluid" style="margin-top: 32px" >
    <div class="row" >

        <!-- Contact Form -->
        <div class="col-md-8 container1" style="width: 800px;">
            <?= $this->Form->create($contactForm) ?>
            <fieldset>
                <legend style=" margin-bottom: 16px"><?= __('Have a question? Leave a message below') ?><br></legend>
                <div style="margin-left: 32px; margin-right: 32px; margin-top: 10px">
                    <?php
                    echo $this->Form->control('contact_name', ['class' => 'form-control', 'label' => 'Your Name', 'style' => 'margin-bottom: 16px']);
                    echo $this->Form->control('contact_email', ['class' => 'form-control', 'label' => 'Email', 'style' => 'margin-bottom: 16px']);
                    echo $this->Form->control('contact_phone', ['class' => 'form-control', 'label' => 'Phone', 'style' => 'margin-bottom: 16px']);
                    echo $this->Form->control('contact_msg', ['class' => 'form-control', 'label' => 'Message', 'style' => 'font-size: 16px; height: 120px;', 'rows' => 20, 'placeholder' => 'Details on what you are moving']);
                    ?>
                </div>

            </fieldset>

            <div class="container text-center" style="margin-top: 16px">
                <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary', 'style' => 'font-size: 18px;', ]) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>

        <!-- Contact Information -->
        <div class="col-md-4 container1" style="width: 400px;">
            <h2><div style="font-weight: bold">Get in touch directly? </div></h2>
            <h3>Here's how you can reach us</h3>
            <h3><div style="font-weight: bold">Phone Number: </div>
                <div style="font-size: smaller"><?= h($this->ContentBlock->text('company-phone')); ?><br></div></h3>
            <h3><div style="font-weight: bold">Email: </div>
                <div style="font-size: smaller"><?= h($this->ContentBlock->text('company-email')); ?>br></div></h3>
            <h3><div style="font-weight: bold">Head Office Address: </div>
                <div style="font-size: smaller"><?= nl2br($this->ContentBlock->text('company-headquarter')); ?></div></h3>
            <h3><div style="font-weight: bold">Storage Store 1: </div>
                <div style="font-size: smaller"><?= h($this->ContentBlock->text('store-2-address')); ?></div></h3>
            <h3><div style="font-weight: bold">Storage Store 2: </div>
                <div style="font-size: smaller"><?= h($this->ContentBlock->text('store-1-address')); ?></div></h3>

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
        margin: 5px auto;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .container1 h3 {
        margin: 10px 0; /* 10px top and bottom, 0px left and right */
    }
</style>
