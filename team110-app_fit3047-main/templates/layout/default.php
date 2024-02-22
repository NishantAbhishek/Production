<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
if ( $this->Identity->isLoggedIn()) {
    $user = $this->request->getAttribute('identity');
    $userRole = $user->user_level;
}
else {
    $userRole = '';
}

use ContentBlocks\View\Helper\ContentBlockHelper;

?>
<!DOCTYPE html>
<html>

<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $this->fetch('title') ?>
    </title>


    <!--    --><?php //= $this->Html->css(['default','styles','normalize.min', 'milligram.min','cake']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

    <script type="text/javascript" src="Scripts/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="Scripts/bootstrap.min.js"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" ></link>

    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" >
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>

    <?= $this->Html->css(['bootstrap.min','cake','default','milligram.min','normalize.min']) ?>

</head>
<body id="page-top" class="wrapper">
<!-- Navigation Section-->
<div class="wrapper">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top nav-link:hover " id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="<?= $this->Url->build('/')?>" style="color: #ffbf47;"><?= h($this->ContentBlock->text('website-title')); ?></a>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link" href="<?= $this->Url->build(['controller' => 'Pages', 'action' => '#services']) ?>">Services</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?= $this->Url->build(['controller' => 'Pages', 'action' => '#pricing']) ?>">Pricing</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?= $this->Url->build(['controller' => 'MovingOrdersVehicles', 'action' => 'checkCombinedAvailability']) ?>">Availability</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?= $this->Url->build(['controller' => 'ContactForms', 'action' => 'add']) ?>">Contact Us</a></li>
<!--                        <li class="nav-item"><a class="nav-link" href="--><?php //= $this->Url->build(['controller' => 'Auth', 'action' => 'login']) ?><!--">Admin</a></li>-->

                        <?php if ($userRole == 'admin' && $this->Identity->isLoggedIn()): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= $this->Url->build([
                                    'controller' => 'Auth',
                                    'action' => 'login',
                                    '?' => ['redirect' => '/admin/admin-home']
                                ]) ?>">
                                    Admin
                                </a>
                            </li>
                        <?php endif; ?>

                        <li class="nav-item"><a class="nav-link" href="<?= $this->Url->build(['controller' => 'pages', 'action' => 'booking']) ?>">Book Now</a></li>

                        <?php if ($userRole != 'admin' && $this->Identity->isLoggedIn()): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= $this->Url->build([
                                    'controller' => 'Auth',
                                    'action' => 'login',
                                    '?' => ['redirect' => '/users/dashboard']
                                ]) ?>">
                                    <i class="fas fa-user"></i>
                                    Dashboard
                                </a>
                            </li>
                        <?php endif; ?>


                        <?php if ($this->Identity->isLoggedIn()): ?>
                            <li class="nav-item">
                                <?= $this->Html->link('Logout', ['controller' => 'Auth', 'action' => 'logout'], ['class' => 'nav-link btn btn-outline-primary']) ?>
                            </li>
                        <?php else: ?>
                            <li class="nav-item">
                                <?= $this->Html->link('Login', ['controller' => 'Auth', 'action' => 'login'], ['class' => 'nav-link btn btn-outline-primary']) ?>
                            </li>
                        <?php endif; ?>



                    </ul>
                </div>
            </div>

    </nav>
    <main class="main mainContentMargin">
        <div>
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
    </main>
</div>
<body id="page-top" class="wrapper">

</body>

<!-- Footer -->
<footer class="foot text-center">
    <div class="container">
        <div class="row">
            <!-- Footer Location-->
            <div class="col-lg-4 mb-5 mb-lg-0">
                <h4 class="text-uppercase mb-4 " style="color: #ffffff">Our HeadQuarter</h4>
                <p class="lead mb-0">
                    <?= nl2br($this->ContentBlock->text('company-headquarter')) ?>
                </p>
            </div>
            <!-- Footer Social Icons-->
            <div class="col-lg-4 mb-5 mb-lg-0">
                <h4 class="text-uppercase mb-4"  style="color: #ffffff">Around the Web</h4>
                <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-facebook-f"></i></a>
                <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-twitter"></i></a>
                <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-linkedin-in"></i></a>
                <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-dribbble"></i></a>
            </div>
            <!-- Footer About Text-->
            <div class="col-lg-4">
                <h4 class="text-uppercase mb-4" style="color: #ffffff">About <?= h($this->ContentBlock->text('website-title')); ?></h4>
                <p class="lead mb-0">
                    <?= h($this->ContentBlock->text('city-running-in')); ?>
                    <a class="nav-link" href="<?= $this->Url->build(['controller' => 'ContactForms', 'action' => 'add']) ?>"><b>Contact Us.</b></a>
                    .
                </p>
            </div>
        </div>
        <div>
            <div class="container"><small><?= h($this->ContentBlock->text('website-copyright-text')); ?></small></div>
        </div>
    </div>
    <?= $this->fetch('script') ?>
</footer>


<!-- Admin login -->
<div class="portfolio-modal modal fade" id="adminPopUP" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="modal-body">
                            <!-- Project details-->
                            <h2 class="text-uppercase">Admin Login</h2>
                            <p class="item-intro text-muted">Please add you Credentials</p>
                            <body>
                            <main id="main-holder">
                                <form id="login-form">
                                    <input type="text" name="username" id="username-field" class="login-form-field" placeholder="Username">
                                    <input type="password" name="password" id="password-field" class="login-form-field" placeholder="Password">
                                    <p class="formbutton" id="login-form-submit">Submit</p>
                                </form>
                            </main>
                            </body>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    window.addEventListener("DOMContentLoaded", (event) => {
        const loginForm = document.getElementById("login-form");
        const loginButton = document.getElementById("login-form-submit");
        const loginErrorMsg = document.getElementById("login-error-msg");

        loginButton.addEventListener("click", (e) => {
            const username = loginForm.username.value;
            const password = loginForm.password.value;
            console.log("reached here")
            if (username === "admin" && password === "password") {
                window.location.href = "http://localhost/assignment1/pages/admin-home"
                alert("You have successfully logged in.");
            } else {
                alert("You Login has Failed");
            }
        })
    });
</script>

</body>
</html>
<style>
    .navbar-light .navbar-nav .nav-link:hover {
        color: #ffbf47; /* Set the text color for links on hover to yellow */
    }
    .logo-image{
        width: 46px;
        height: 46px;
        border-radius: 50%;
        overflow: hidden;
        margin-top: -6px;
    }
</style>
