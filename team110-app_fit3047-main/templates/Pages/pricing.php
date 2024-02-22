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
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
        }
        form {
            margin: 20px auto;
            max-width: 500px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="number"], select {
            width: 100%;
            padding: 5px;
            margin-bottom: 10px;
        }
        .form-container {
            background-color: #f2f2fc;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
<div class="row">
    <div class="col-lg-4">
        <div class="team-member">
            <img class="mx-auto rounded-circle" src="/assignment1/assets/img/pricing/distance.webp" alt="...">
            <h4>Distance</h4>
            <p class="text-muted">AUD 20/KM</p>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="team-member">
            <img class="mx-auto rounded-circle" src="/assignment1/assets/img/pricing/weight.jpg" alt="...">
            <h4>Weight Of the Items</h4>
            <p class="text-muted">AUD 40/KG</p>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="team-member">
            <img class="mx-auto rounded-circle" src="/assignment1/assets/img/pricing/time.jpeg" alt="...">
            <h4>Express service</h4>
            <p class="text-muted">AUD 200 Extra express</p>

        </div>
    </div>
</div>


<div class="form-container">
    <form id="calculator-form">
        <h3>Live Calculate the price.</h3>
        <label for="distance">Distance (km):</label>
        <input type="number" id="distance" name="distance" required>
        <br>
        <label for="weight">Weight of Items (kg):</label>
        <input type="number" id="weight" name="weight" required>
        <br>
        <label for="time">Service type:</label>
        <select id="time" name="time" required>
            <option value="day">Normal</option>
            <option value="night">Express (extra $200)</option>
        </select>
        <br>
        <button type="button" id="calculate-button">Calculate Price</button>
    </form>
</div>

<div id="result"></div>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const calculatorForm = document.getElementById("calculator-form");
        const calculateButton = document.getElementById("calculate-button");
        const resultDiv = document.getElementById("result");

        calculateButton.addEventListener("click", function () {
            const distance = parseFloat(document.getElementById("distance").value);
            const weight = parseFloat(document.getElementById("weight").value);
            const time = document.getElementById("time").value;

            if (isNaN(distance) || isNaN(weight)) {
                resultDiv.innerHTML = "Please enter valid numbers for distance and weight.";
            } else {
                // Calculate the price
                const basePrice = calculateBasePrice(distance, weight);
                const timePrice = time === "night" ? 200 : 0; // $200 extra for nighttime

                const totalPrice = basePrice + timePrice;

                resultDiv.innerHTML = `Estimated Price: $${totalPrice.toFixed(2)}`;
            }
        });

        function calculateBasePrice(distance, weight) {
            const pricePerKm = 20; // $20 per km
            const pricePerKg = 40; // $40 per kg

            const distanceCost = distance * pricePerKm;
            const weightCost = weight * pricePerKg;

            return distanceCost + weightCost;
        }
    });
</script>

</body>
