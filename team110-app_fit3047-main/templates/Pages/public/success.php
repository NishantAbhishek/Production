<?php

use Cake\ORM\TableRegistry;

$order_id = $this->request->getQuery('order_id');
$order_type = $this->request->getQuery('order_type');
$quote = $this->request->getQuery('quote');
$user_id = $this->request->getQuery('user_id');


$invoicesTable = TableRegistry::getTableLocator()->get('Invoices');

// Generate Invoice
$data = [
    'reference' => $order_id,
    'reference_type' => $order_type,
    'invoice_amount' => $quote,
    'user_id' => $user_id
];
$result = $invoicesTable->createInvoice($data);

$invoiceId = null;
if ($result instanceof \App\Model\Entity\Invoice) {
    // Invoice was successfully created
    $invoiceId = $result->id; // Here's where you get the ID
    echo 'Invoice successfully generated with ID: ' . $invoiceId;

} else {
    // Handle the error
    echo 'There was an error generating the invoice.';
}


?>



<!DOCTYPE html>
<html>
<head>
  <title>Thanks for your order!</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <section>
    <p>
      We appreciate your business! If you have any questions, please email
      <a href="mailto:orders@example.com">orders@example.com</a>.
    </p>
  </section>
</body>
</html>
