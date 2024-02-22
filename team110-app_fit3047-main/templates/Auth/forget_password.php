<?php
/**
 * @var \App\View\AppView $this
 */

?>

<div class="container login">
    <div class="row">
        <div class="column column-50 column-offset-25">

            <div class="users form content">

                <?= $this->Form->create() ?>

                <fieldset>

                    <legend>Forget Password</legend>

                    <?= $this->Flash->render() ?>

                    <p>Enter your email address registered with our system below to reset your password: </p>

                    <?php
                    echo $this->Form->control('email', [
                        'type' => 'email',
                        'required' => true,
                        'autofocus' => true,
                        'label' => false
                    ]);
                    ?>

                </fieldset>

                <div class = "container text-center">
                <?= $this->Form->button('Send verification email', ['class' => 'button-yellow']) ?>
                <?= $this->Form->end() ?>
                </div>

                <hr class="hr-between-buttons">

                <?= $this->Html->link('Back to login', ['controller' => 'Auth', 'action' => 'login'], ['class' => 'button-yellow-outline']) ?>

            </div>
        </div>
    </div>
</div>


<style>
    .button-yellow {
        background-color: #ffbf47;
        border-color: #ffbf47;
        /* Add font styles here */
        font-size: 12px; /* Example font size */
        font-family: sans-serif; /* Example font family */
        font-weight: bold;
    }

    .button-yellow-outline {
        background-color: transparent; /* Change background color on hover */
        color: #ffbf47; /* Change text color on hover */
        /* Add font styles here */
        font-size: 12px; /* Example font size */
        font-family: sans-serif; /* Example font family */
        font-weight: bold;

    }
</style>

