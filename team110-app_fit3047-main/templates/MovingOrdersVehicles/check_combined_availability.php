<!-- src/Template/MovingOrdersVehicles/check_combined_availability.ctp -->
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
<!--css stuff, should be merged into the default css somehow-->
<style>
    .disabled-btn {
        background-color: #5f5f5f;
        color: white;
        border: none;
        padding: 5px 10px;
        cursor: not-allowed;
    }

    .book-btn {
        background-color: #0d6efd;
        color: white;
        text-decoration: none;
        padding: 5px 10px;
        display: inline-block;
        border: none;
        cursor: pointer;
    }

    .book-btn:hover {
        background-color: #123363;
    }
</style>

<h1>Moving Schedule Availability</h1>

<p>Availability for the next 14 days:</p>

<table>
    <thead>
    <tr>
        <th>Date</th>
        <th>Vehicle Availability</th>
        <th>Staff Availability</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($combinedAvailability as $date => $availability): ?>
        <tr>
            <td><?= $date ?></td>
            <td><?= empty($availability['vehicleAvailability']) ? 'Not Available' : 'Available' ?></td>
            <td><?= empty($availability['staffAvailability']) ? 'Not Available' : 'Available' ?></td>
            <td>
                <?php
                if(empty($availability['vehicleAvailability']) || empty($availability['staffAvailability'])):
                    ?>
                    <button class="disabled-btn" disabled>unavailable</button>
                <?php
                else:
                    ?>
                    <a href="<?= $this->Url->build(['controller' => 'Inquiries', 'action' => 'add', 'date' => $date]) ?>" class="book-btn">Book Now</a>
                <?php
                endif;
                ?>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
