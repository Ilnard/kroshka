<?php
require '../config.php';

$cart_products = json_decode(file_get_contents("php://input"), true);
$products = [];
foreach($cart_products as $cart_product) {
    $sql = "SELECT * FROM products WHERE id = $cart_product[id]";
    $result = mysqli_fetch_assoc(query($sql));
    $cart_product = array_merge($cart_product, $result);
    $cart_product['price1'] = (int)$cart_product['price1'];
    $cart_product['price2'] = (int)$cart_product['price2'];
    $cart_product['price3'] = (int)$cart_product['price3'];
    if ($cart_product['square'] < 50) $cart_product['price'] = $cart_product['price1'];
    else if ($cart_product['square'] < 100 && $cart_product['square'] >= 50) $cart_product['price'] = $cart_product['price2'];
    else if ($cart_product['square'] < 200 && $cart_product['square'] >= 100) $cart_product['price'] = $cart_product['price3'];
    else $cart_product['price'] = false;
    array_push($products, $cart_product);
}
echo json_encode($products);