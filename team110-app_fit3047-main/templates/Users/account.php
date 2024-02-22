<!-- src/Template/Users/account.ctp -->
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

<div class="content">
    <body>
    <h2>Account Details</h2>
    <table>
        <tr>
            <th>Username:</th>
            <td><?= $user->user_name ?></td>
        </tr>
        <tr>
            <th>Email:</th>
            <td><?= $user->email ?></td>
        </tr>
        <tr>
            <th>User Type:</th>
            <td><?= $user->user_type ?></td>
        </tr>
        <tr>
            <th>Company:</th>
            <td><?= $user->user_company ?></td>
        </tr>
        <tr>
            <th>Phone Number:</th>
            <td><?= $user->user_phone ?></td>
        </tr>
    </table>

</body>
</div>
</html>



