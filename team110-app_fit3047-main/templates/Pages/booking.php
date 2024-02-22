
<!DOCTYPE html>
<html>

<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <?= $this->Html->meta('icon') ?>
    <?= $this->fetch('title') ?>
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <?= $this->Html->css(['styles','default','normalize.min', 'milligram.min','cake','styles']) ?>


    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>



<style>
    .custom-container {
        max-width: 1200px; /* Adjust the maximum width as needed */
        padding: 20px; /* Add some padding to create space between content and the border */

    }
    .custom-button {
        width: 500px;
    }
</style>

<br>
<div class="container">
    <h1 class="h1">
        <b>Book Our Services</b> <br>
    </h1>
    <h3>
        Select the service you need today!
    </h3>
</div>
<br>

<div class="container">
    <body>

    <div class="row">
        <div class="col-6">
            <div class="container custom-container text-center">
                <h3>Moving Services</h3>

                <img src="/Assigment1/webroot/assets/img/booking/moving.jpg" alt="Moving people" width="500" height="300"/><br>

                <a href="<?= $this->Url->build(['controller' => 'MovingOrdersVehicles', 'action' => 'checkCombinedAvailability']) ?>"
                   class="btn btn-outline-dark custom-button">Book Moving Services</a>
            </div>
        </div>

        <div class="col-6">
            <div class="container custom-container text-center">
                <h3>Storage Services</h3>


                <img src="/Assigment1/webroot/assets/img/booking/A3-1.jpg" alt="Moving people" width="500" height="300"  /><br>

                <a href="<?= $this->Url->build(['controller' => 'StorageOrders', 'action' => 'selectunit']) ?>"
                   class="btn btn-outline-dark custom-button">Book Storage Services</a>
            </div>
        </div>
    </div>
</div>


</body>
</div>

<br>

</html>
