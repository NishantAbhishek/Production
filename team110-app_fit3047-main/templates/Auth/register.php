<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>

<div class="container register">
    <div class="users form content">

        <?= $this->Form->create($user, ['onsubmit' => 'return validatePassword();']) ?>

        <fieldset>
            <legend>Register new user</legend>

            <?= $this->Flash->render() ?>

            <?= $this->Form->control('email'); ?>

            <div class="row">
                <?= $this->Form->control('user_name', [
                    'label' => 'Full Name',
                    'pattern' => '^[a-zA-Z_-]{6,}$',
                    'title' => 'Username must be at least 6 characters long and can only contain letters, _ and -',
                    'templateVars' => ['container_class' => 'column']
                ]); ?>
                <?= $this->Form->control('user_phone', ['label' => 'Phone Number', 'templateVars' => ['container_class' => 'column']]); ?>
            </div>

            <div class="row">
                <?php
                echo $this->Form->control('password', [
                    'id' => 'password',
                    'value' => '',  // Ensure password is not sent back to the client side
                    'pattern' => '(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}',
                    'title' => 'Password must be at least 8 characters long, and contain at least one uppercase letter, one lowercase letter, one number, and one special character.',
                    'templateVars' => ['container_class' => 'column']
                ]);
                // Validate password by repeating it
                echo $this->Form->control('password_confirm', [
                    'id' => 'password-confirm',
                    'type' => 'password',
                    'value' => '',  // Ensure password is not sent back to the client side
                    'label' => 'Retype Password',
                    'templateVars' => ['container_class' => 'column']
                ]);
                ?>
            </div>

        </fieldset>

        <div class="container text-center">
            <?= $this->Form->button('REGISTER', ['class' => 'button-yellow'] ) ?>
        </div>

        <?= $this->Html->link('BACK TO LOGIN', ['controller' => 'Auth', 'action' => 'login'], ['class' => 'button-yellow-outline']) ?>

        <?= $this->Form->end() ?>
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

<script>
    function validatePassword() {
        var password = document.getElementById("password").value;
        var confirmPassword = document.getElementById("password-confirm").value;

        if (password !== confirmPassword) {
            alert("Passwords do not match.");
            return false;
        }

        return true;
    }
</script>
