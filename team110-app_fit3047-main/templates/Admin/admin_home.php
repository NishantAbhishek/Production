<!DOCTYPE html>
<html lang="en">
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <?= $this->Html->meta('icon') ?>
    <?= $this->fetch('title') ?>
    <!-- Favicon-->
    <?= $this->Html->css('/assets/favicon.ico') ?>
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
<body>
<!-- Masthead-->
<header class="masthead">
    <div class="container">
        <div class="masthead-subheading">Admin Controls</div>
    </div>
</header>
<!-- Controls-->
<section class="page-section bg-light">
    <div class="container">
        <!-- Section 1: Manage Inquiries -->
        <div class="card border-primary mb-3 bg-card-1">
            <div class="card-body">
                <h2 class="section-heading text-center mb-4">Inquiries and Invoices</h2>
                <div class="row justify-content-center">
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <div class="card-body text-center">
                                <h4 class="my-3">Moving Order Inquiries</h4>
                                <a href="<?= $this->Url->build(['controller' => 'Inquiries', 'action' => 'index']) ?>"
                                   class="btn btn-primary">Inquiries</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <div class="card-body text-center">
                                <h4 class="my-3">Invoices</h4>
                                <a href="<?= $this->Url->build(['controller' => 'Invoices', 'action' => 'index']) ?>"
                                   class="btn btn-primary">Invoices</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <div class="card-body text-center">
                                <h4 class="my-3">Customer Messages</h4>
                                <a href="<?= $this->Url->build(['controller' => 'ContactForms', 'action' => 'index']) ?>"
                                   class="btn btn-primary">Messages</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Section 2: Manage Orders -->
        <div class="card border-primary mb-3 bg-card-2">
            <div class="card-body">
                <h2 class="section-heading text-center mb-4">Customer Bookings</h2>
                <div class="row justify-content-center">
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <div class="card-body text-center">
                                <h4 class="my-3">Moving Orders Booking</h4>
                                <a href="<?= $this->Url->build(['controller' => 'MovingOrders', 'action' => 'index']) ?>" class="btn btn-primary">Moving Orders</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <div class="card-body text-center">
                                <h4 class="my-3">Storage Booking</h4>
                                <a href="<?= $this->Url->build(['controller' => 'StorageOrders', 'action' => 'index']) ?>" class="btn btn-primary">Storage Orders</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section 3: Update Order Status -->
        <div class="card border-primary mb-3 bg-card-3">
            <div class="card-body">
                <h2 class="section-heading text-center mb-4">Update Job Status.</h2>
                <div class="row justify-content-center">
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <div class="card-body text-center">
                                <h4 class="my-3">Assigned Staffs</h4>
                                <a href="<?= $this->Url->build(['controller' => 'MovingOrdersStaffs', 'action' => 'index']) ?>" class="btn btn-primary">Assigned Staffs</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section 4: Add New Vehicles, Staff, Stores, and Units -->
        <div class="card border-primary mb-3 bg-card-4">
            <div class="card-body">
                <h2 class="section-heading text-center mb-4">Add New Vehicles, Staff, Stores, and Units</h2>
                <div class="row justify-content-center">
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <div class="card-body text-center">
                                <h4 class="my-3">Add Staffs And Vehicles</h4>
                                <a href="<?= $this->Url->build(['controller' => 'Staffs', 'action' => 'index']) ?>" class="btn btn-primary">Add Staff</a>
                                <a href="<?= $this->Url->build(['controller' => 'Vehicles', 'action' => 'index']) ?>" class="btn btn-primary">Add Transport</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <div class="card-body text-center">
                                <h4 class="my-3">Add Stores and Units</h4>
                                <a href="<?= $this->Url->build(['controller' => 'Stores', 'action' => 'index']) ?>" class="btn btn-primary">Add Stores</a>
                                <a href="<?= $this->Url->build(['controller' => 'Units', 'action' => 'index']) ?>" class="btn btn-primary">Add Storage Units</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card border-primary mb-3 bg-card-5">
            <div class="card-body">
                <h2 class="section-heading text-center mb-4">Content Management System For Website.</h2>
                <div class="row justify-content-center">
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <div class="card-body text-center">
                                <h4 class="my-3">Manage Website Content</h4>
                                <?= $this->Html->link('Manage Content', ['plugin' => 'ContentBlocks', 'controller' => 'ContentBlocks', 'action' => 'index'], ['class' => 'btn btn-primary']) ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div>
</section>

<style>
    /* Bluish background for cards */
    .bg-card-1 {
        background-color: #f3f6c5; /* Use your preferred bluish color */
        color: #fff; /* Text color for better contrast */
    }

    /* Greyish background for cards */
    .bg-card-2 {
        background-color: #f5f5f5; /* Use your preferred greyish color */
        color: #fff; /* Text color for better contrast */
    }
    .bg-card-3 {
        background-color: #cffafa; /* Use your preferred greyish color */
        color: #fff; /* Text color for better contrast */
    }
    .bg-card-4 {
        background-color: #d7f6d0; /* Use your preferred greyish color */
        color: #fff; /* Text color for better contrast */
    }
    .bg-card-4 {
        background-color: #c8cfff; /* Use your preferred greyish color */
        color: #fff; /* Text color for better contrast */
    }
</style>

</body>
