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

    // If the order is found, display the edit form
    if ($orderIndex !== null) {
        $order = $orders[$orderIndex];
        $userId = $order[1];
        $orderDate = $order[2];
        $totalAmount = $order[3];
        $shippingAddress = $order[4];
    }
} else {
    // If the order ID is not provided, redirect to the orders list
    header("Location: orders.php");
    exit;
}

// Handle the form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $updatedUserId = $_POST['user_id'];
    $updatedOrderDate = $_POST['order_date'];
    $updatedTotalAmount = $_POST['total_amount'];
    $updatedShippingAddress = $_POST['shipping_address'];

    // Update the order in the orders array
    $orders[$orderIndex] = [
        $orderId,
        $updatedUserId,
        $updatedOrderDate,
        $updatedTotalAmount,
        $updatedShippingAddress
    ];

    // Convert the orders array back to CSV format
    $csvData = array_map(function($row) {
        return implode(',', array_map('str_getcsv', array_fill(0, count($row), $row)));
    }, $orders);

    // Write the updated orders to the orders.csv file
    $file = fopen($ordersFile, 'w');
    foreach ($csvData as $line) {
        fputcsv($file, str_getcsv($line));
    }
    fclose($file);

    // Redirect to the orders list after successful update
    header("Location: orders.php");
    exit;
}
?>