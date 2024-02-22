<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.10.0
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Http\Exception\NotFoundException;

// move this out of the authentication area

// $this->disableAutoLayout();


$checkConnection = function (string $name) {
    $error = null;
    $connected = false;
    try {
        $connection = ConnectionManager::get($name);
        $connected = $connection->connect();
    } catch (Exception $connectionError) {
        $error = $connectionError->getMessage();
        if (method_exists($connectionError, 'getAttributes')) {
            $attributes = $connectionError->getAttributes();
            if (isset($attributes['message'])) {
                $error .= '<br />' . $attributes['message'];
            }
        }
    }

    return compact('connected', 'error');
};

if (!Configure::read('debug')) :
    throw new NotFoundException(
        'Please replace templates/Pages/home.php with your own version or re-enable debug mode.'
    );
endif;


?>

<!DOCTYPE html>
<html lang="en">
<head>

    <?= $this->Html->charset()

    ?>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <?= $this->Html->css(['default','styles','normalize.min', 'milligram.min','cake']) ?>



    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>



</head>
<body id="page-top">
<!-- Masthead-->
<header class="masthead">
    <div class="container">
        <div class="masthead-subheading"><?= h($this->ContentBlock->text('welcome-message')); ?></div>
        <a class="btn btn-primary btn-xl text-uppercase" href="<?= $this->Url->build(['controller' => 'Pages', 'action' => 'booking']) ?>">Book Now!</a>
    </div>
</header>

<!-- Services-->
<section class="page-section" id="services">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase"> Our Services</h2>
        </div>
        <div class="row text-center">
            <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-square fa-stack-2x text-primary"></i>
                            <i class="fas fa-warehouse fa-stack-1x fa-inverse"></i>
                        </span>
                <h4 class="my-3">Storage</h4>
                <p class="text-muted"><?= h($this->ContentBlock->text('storage-description')); ?></p>
            </div>
            <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-square fa-stack-2x text-primary"></i>
                            <i class="fas fa-van-shuttle fa-stack-1x fa-inverse"></i>
                        </span>
                <h4 class="my-3">Transport</h4>
                <p class="text-muted"><?= h($this->ContentBlock->text('transport-description')); ?></p>

            </div>
            <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-square fa-stack-2x text-primary"></i>
                            <i class="fas fa-trash fa-stack-1x fa-inverse"></i>
                        </span>
                <h4 class="my-3">Removal</h4>
                <p class="text-muted"><?= h($this->ContentBlock->text('removal-description')); ?></p>
            </div>
        </div>
    </div>
</section>

<!-- Pricing-->


<section class="page-section" id="pricing">
    <div class = "container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase"> Our Prices</h2>
        </div>
        <div class="row text-center">
            <div class = "col-md-6">

                <img src="https://movingeasy.u23s2110.monash-ie.me\webroot\assets\img\booking\moving.jpg" alt="Moving people" width="500" height="300"/><br>
                <h2 class = "my-3">Transport</h2>
                <p class = "text-muted">Have a rough estimate of cost.</p>
                <a class="btn btn-primary btn-xl text-uppercase" href="<?= $this->Url->build(['controller' => 'Pages', 'action' => 'pricing']) ?>">Estimate Cost!</a>
            </div>
            <div class = "col-md-6">

                <img src="https://movingeasy.u23s2110.monash-ie.me\webroot\assets/img/booking/A3-1.jpg" alt="Moving people" width="500" height="300"  /><br>

                <h2 class = "my-3">Storage</h2>
                <p class = "text-muted">Checkout Various Sizes and Units.</p>
                <a class="btn btn-primary btn-xl text-uppercase" href="<?= $this->Url->build(['controller' => 'StorageOrders', 'action' => 'selectunit']) ?>">Checkout Units!</a>

            </div>
        </div>
    </div>
</section>

<!-- Reviews -->
<div class="container-m">
    <div class="text-center">
        <h2 class="section-heading text-uppercase">Reviews</h2>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="card"> <i class="fa fa-quote-left u-color"></i>
                <p><?= h($this->ContentBlock->text('review-1')); ?></p>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="user-about"> <span class="font-weight-bold d-block">Alex Smith</span> <span class="u-color">Designer | Developer</span>
                        <div class="d-flex flex-row mt-1"> <i class="fa fa-star u-color"></i> <i class="fa fa-star u-color"></i> <i class="fa fa-star-o u-color"></i> <i class="fa fa-star-o u-color"></i> <i class="fa fa-star-o u-color"></i> </div>
                    </div>
                    <div class="user-image"> <img src="https://i.imgur.com/UUW3zLx.jpg" class="rounded-circle" width="70"> </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card"> <i class="fa fa-quote-left u-color"></i>
                <p><?= h($this->ContentBlock->text('review-2')); ?></p>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="user-about"> <span class="font-weight-bold d-block">Sophia T.</span> <span class="u-color">Designer | Architect</span>
                        <div class="d-flex flex-row mt-1"> <i class="fa fa-star u-color"></i> <i class="fa fa-star u-color"></i> <i class="fa fa-star u-color"></i> <i class="fa fa-star-o u-color"></i> <i class="fa fa-star-o u-color"></i> </div>
                    </div>
                    <div class="user-image"> <img src="https://i.imgur.com/o5uMfKo.jpg" class="rounded-circle" width="70"> </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card"> <i class="fa fa-quote-left u-color"></i>
                <p><?= h($this->ContentBlock->text('review-3')); ?></p>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="user-about"> <span class="font-weight-bold d-block">Mike Vincent</span> <span class="u-color">Designer | Developer</span>
                        <div class="d-flex flex-row mt-1"> <i class="fa fa-star u-color"></i> <i class="fa fa-star u-color"></i> <i class="fa fa-star u-color"></i> <i class="fa fa-star u-color"></i> <i class="fa fa-star-o u-color"></i> </div>
                    </div>
                    <div class="user-image"> <img src="https://i.imgur.com/At1IG6H.png" class="rounded-circle" width="70"> </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/scripts.js"></script>
</body>
</html>

