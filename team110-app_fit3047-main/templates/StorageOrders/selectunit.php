<?php
/**
 * @var \App\View\AppView $this
 * @var array $units
 */
?>
<!DOCTYPE html>
<html>
<head>
    <title>Unit Selection</title>
    <style>
        body {
            text-align: center;
        }

        .unit-selection {
            display: inline-block;
            margin: 10px;
            padding: 10px;
            border: 1px solid #ccc; /* Add a border */
        }

        .unit-details {
            max-width: 300px;
            text-align: center; /* Center-align unit details */
        }

        .unit-image {
            width: 200px;
            height: 200px;
            border: 1px solid #000;
        }

        /* Define the styles for the custom button */
        .custom-button {
            padding: 10px 20px; /* Adjust padding as needed */
            background-color: #007bff; /* Button background color */
            color: #fff; /* Button text color */
            border: none; /* Remove button border */
            border-radius: 5px; /* Add rounded corners */
            cursor: pointer; /* Show pointer cursor on hover */
        }

        /* Define hover effect */
        .custom-button:hover {
            background-color: #0056b3; /* Darker background color on hover */
        }


    </style>
</head>
<body>
<?php if (empty($units)): ?>
    <p>Sorry, currently we don't have units available.</p>
<?php else: ?>
    <h2>Select a Storage Unit</h2>
    <?php foreach ($units as $unit): ?>
        <div class="unit-selection">
            <div class="unit-details">
                <?php
                // Define an array to map unit types to image filenames
                $unitTypeToImage = [
                    'Small' => 'small.png',
                    'Locker' => 'small.png',
                    'Medium' => 'medium.png',
                    'Large' => 'large.png',
                    'X-Large' => 'extraLarge.png',
                ];

                // Get the image filename based on the unit type
                $imageFilename = $unitTypeToImage[$unit['unit_type']] ?? 'default.jpg';
                ?>
                <img class="unit-image" src="/MovingEasy/team110-app_fit3047/webroot/assets/img/storagesize/<?= $imageFilename ?>" alt="Unit Image">
                <h4><?php echo h($unit['unit_type']); ?></h4>
                <p class="unit-info"><?php echo h($unit['unit_desc']); ?></p>
                <p class="unit-info">Space: <?php echo h($unit['unit_area']); ?> sqm</p>
                <p class="unit-info">Price: <?php echo h($unit['unit_price']);?> AUD/Month</p>
            </div>

            <?php
            echo $this->Form->create(null, [
                'url' => [
                    'controller' => 'StorageOrders',
                    'action' => 'add',
                    '?' => [
                        'unitType' => $unit['unit_type'],
                        'unitSpace' => $unit['unit_area'],
                        'unitPrice' => $unit['unit_price'],
                        'unitId' => $unit['id']
                    ],
                ],
            ]);
            echo $this->Form->hidden('unit_id', ['value' => $unit['id']]);
            echo $this->Form->submit('Book this unit', ['class' => 'formbutton']);
            echo $this->Form->end();
            ?>
        </div>
    <?php endforeach; ?>
<?php endif; ?>

<!-- Include any additional content, scripts, or footer elements as needed -->
</body>
</html>
