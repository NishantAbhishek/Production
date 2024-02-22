<!DOCTYPE html>
<html lang="en">

<div class="sidebar fixed">
    <a class="nav-link" href="javascript:void(0);" data-url="<?= $this->Url->build([
        'controller' => 'Users',
        'action' => 'account'
    ]) ?>" id="loadAccount"> My Account </a>
    <a class="nav-link" href="javascript:void(0);" data-url="<?= $this->Url->build([
        'controller' => 'Inquiries',
        '?' => ['redirect' => '/index']
    ]) ?>" id="loadInquiry">Moving Order Inquiries </a>
    <a class="nav-link" href="javascript:void(0);" data-url="<?= $this->Url->build([
        'controller' => 'StorageOrders',
        '?' => ['redirect' => '/index']
    ]) ?>" id="loadStorageOrder">Check Storage Orders</a>
    <a class="nav-link" href="javascript:void(0);" data-url="<?= $this->Url->build([
        'controller' => 'MovingOrders',
        '?' => ['redirect' => '/index']
    ]) ?>" id="loadMovingOrder">Check Moving Orders</a>
    <a class="nav-link" href="javascript:void(0);" data-url="<?= $this->Url->build([
        'controller' => 'Invoices',
        '?' => ['redirect' => '/index']
    ]) ?>" id="loadInvoices">Invoices</a>
</div>
<div class="data">
</div>


<script>
    $(document).ready(function () {
        var accountUrl = $('#loadAccount').data('url');
        $('.data').load(accountUrl, function (response, status) {
            if (status === "error") {
                alert('Failed to load account data.');
            }
        });
        $('#loadAccount').click(function () {
            var url = $(this).data('url');
            $('.data').load(url, function (response, status) {
                if (status === "error") {
                    alert('Failed to load account data.');
                }
            });
        });
        $('#loadInquiry').click(function () {
            var url = $(this).data('url');
            $('.data').load(url, function (response, status) {
                if (status === "error") {
                    alert('Failed to load orders data.');
                }
            });
        });
        $('#loadStorageOrder').click(function () {
            var url = $(this).data('url');
            $('.data').load(url, function (response, status) {
                if (status === "error") {
                    alert('Failed to load orders data.');
                }
            });
        });
        $('#loadMovingOrder').click(function () {
            var url = $(this).data('url');
            $('.data').load(url, function (response, status) {
                if (status === "error") {
                    alert('Failed to load orders data.');
                }
            });
        });
        $('#loadInvoices').click(function () {
            var url = $(this).data('url');
            $('.data').load(url, function (response, status) {
                if (status === "error") {
                    alert('Failed to load orders data.');
                }
            });
        });
    });
</script>


</body>
<style>
    /* The side navigation menu */
    .sidebar {
        margin-top: 20px;
        margin-right: 40px;
        padding: 0;
        width: 200px;
        background-color: #f1f1f1;
        position: fixed;
        height: 50%;
        overflow: auto;
    }

    /* Sidebar links */
    .sidebar a {
        display: block;
        color: black;
        padding: 16px;
        text-decoration: none;
    }

    /* Active/current link */
    .sidebar a.active {
        background-color: #ebc034;
        color: white;
    }

    /* Links on mouse-over */
    .sidebar a:hover:not(.active) {
        background-color: #fffcfc;
        color: black;
    }


    div.data {
        margin-left: 200px;
        padding-left: 0px;
        padding-top: 20px;
        padding-bottom: 100px;
    }


</style>
</html>

