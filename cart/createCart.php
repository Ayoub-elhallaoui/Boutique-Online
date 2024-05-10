<?php
function addToCart($userId, $productId, $quantity)
{
    // Read the existing cart items from the carts.csv file
    $cartsFile = 'db/carts.csv';
    $carts = array_map('str_getcsv', file($cartsFile));

    // Get the new cart ID by incrementing the last cart ID
    $cartId = count($carts) + 1;

    // Create the new cart item data
    $newCartItem = [
        'cart_id' => $cartId,
        'user_id' => $userId,
        'product_id' => $productId,
        'quantity' => $quantity,
        'added_on' => date('Y-m-d')
    ];

    // Add the new cart item to the existing cart items
    $carts[] = $newCartItem;

    // Convert the cart items array back to CSV format
    $csvData = array_map(function($row) {
        return implode(',', array_map('str_getcsv', array_fill(0, count($row), $row)));
    }, $carts);

    // Write the updated cart items to the carts.csv file
    $file = fopen($cartsFile, 'w');
    foreach ($csvData as $line) {
        fputcsv($file, str_getcsv($line));
    }
    fclose($file);

    // Return a success message
    return "Item added to cart successfully!";
}

// Example usage
$userId = 1; // Replace with the actual user ID
$productId = 123; // Replace with the actual product ID
$quantity = 2; // Replace with the actual quantity

$result = addToCart($userId, $productId, $quantity);
echo $result;
?>