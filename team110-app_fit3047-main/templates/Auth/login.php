<?php
/**
 * @var \App\View\AppView $this
 */

use Cake\Core\Configure;

$debug = Configure::read('debug');


?>

<div class="container login">
    <div class="row">
        <div class="column column-50 column-offset-25">
            <div class="users form content">

                <?= $this->Form->create() ?>

                <fieldset>

                    <legend>Login</legend>

                    <?= $this->Flash->render() ?>

                    <?php

                    echo $this->Form->control('email', [
                        'type' => 'email',
                        'required' => true,
                        'autofocus' => true,
                        'placeholder' => $debug ? "test@example.com" : ""
                    ]);

                    echo $this->Form->control('password', [
                        'type' => 'password',
                        'required' => true,
                        'placeholder' => $debug ? 'password' : ''
                    ]);
                    ?>

                </fieldset>


                <div class="container text-center">
                    <?= $this->Form->button('LOGIN', ['class' => 'button-yellow']) ?>
                    <br><br>

                    <?= $this->Html->link('FORGOT PASSWORD?', ['controller' => 'Auth', 'action' => 'forgetPassword'], ['class' => 'button-yellow-outline']) ?>
                    <?= $this->Form->end() ?>

                    <hr class="hr-between-buttons">

                    <div class="row">
                        <div class="col-6">
                            <?= $this->Html->link('REGISTER', ['controller' => 'Auth', 'action' => 'register'], ['class' => 'button-yellow-outline']) ?>
                        </div>
                        <div class="col-6">
                            <?= $this->Html->link('GO TO HOMEPAGE', '/', ['class' => 'button-yellow-outline']) ?>
                        </div>
                    </div>
                </div>
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
