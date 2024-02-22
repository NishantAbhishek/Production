<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\MovingOrdersVehicle> $movingOrdersVehicles
 */
?>

<h1>Moving Orders Vehicles</h1>

<p>Availability for the next 14 days:</p>

<table border="1">
    <tr>
        <th>Date</th>
        <th>Availability</th>
    </tr>
    <?php foreach ($availability as $date => $vehicleIds): ?>
        <tr>
            <td><?= $date ?></td>
            <td><?= empty($vehicleIds) ? 'Not Available' : 'Available' ?></td>
        </tr>
    <?php endforeach; ?>
</table>
