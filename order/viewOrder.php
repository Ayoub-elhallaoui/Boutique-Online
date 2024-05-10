<?php
// Read the existing orders from the orders.csv file
$ordersFile = 'db/orders.csv';
$orders = array_map('str_getcsv', file($ordersFile));
?>