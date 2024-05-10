<?php
// Check if the order ID is provided in the URL
if (isset($_GET['order_id'])) {
    $orderId = $_GET['order_id'];

    // Read the existing orders from the orders.csv file
    $ordersFile = 'db/orders.csv';
    $orders = array_map('str_getcsv', file($ordersFile));

    // Find the order with the given order ID
    $orderIndex = null;
    foreach ($orders as $index => $order) {
        if ($order[0] == $orderId) {
            $orderIndex = $index;
            break;
        }
    }

    // If the order is found, remove it from the orders array
    if ($orderIndex !== null) {
        unset($orders[$orderIndex]);

        // Convert the orders array back to CSV format
        $csvData = array_map(function($row) {
            return implode(',', array_map('str_getcsv', array_fill(0, count($row), $row)));
        }, array_values($orders));

        // Write the updated orders to the orders.csv file
        $file = fopen($ordersFile, 'w');
        foreach ($csvData as $line) {
            fputcsv($file, str_getcsv($line));
        }
        fclose($file);

        // Redirect to the orders list after successful deletion
        header("Location: viewOrders.php");
        exit;
    } else {
        // If the order is not found, display an error message
        $errorMessage = "Order not found.";
    }
} else {
    // If the order ID is not provided, redirect to the orders list
    header("Location: viewOrders.php");
    exit;
}
?>
