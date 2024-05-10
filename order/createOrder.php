<?php
function addToCart($userId, $productId, $quantity)
{
    // Read the existing orders from the orders.csv file
    $ordersFile = 'db/orders.csv';
    $orders = array_map('str_getcsv', file($ordersFile));

    // Get the new order ID by incrementing the last order ID
    $orderId = count($orders) + 1;

    // Create the new order data
    $newOrder = [
        'order_id' => $orderId,
        'user_id' => $userId,
        'product_id' => $productId,
        'quantity' => $quantity,
        'order_date' => date('Y-m-d')
    ];

    // Add the new order to the existing orders
    $orders[] = $newOrder;

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

    // Return a success message
    return "Order placed successfully!";
}

// Example usage
$userId = 1; // Replace with the actual user ID
$productId = 123; // Replace with the actual product ID
$quantity = 2; // Replace with the actual quantity

$result = addToCart($userId, $productId, $quantity);
echo $result;
?>