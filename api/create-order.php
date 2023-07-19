<?php
require '../config.php';
$response = true;

$data = json_decode(file_get_contents("php://input"), true);
$cart_products = $data['cartProducts'];
$cart_line = $data['cartLine'];
$user = $data['user'];
foreach($cart_products as $product) {
    $sql = "INSERT INTO orders VALUES (null, $product[id], $product[square], $product[thickness], '$user[name]', '$user[surname]', '$user[patronymic]', '$user[address]', '$user[phone]', '$user[comment]')";
    if (!query($sql)) $response = false;
}
$sql = "SELECT product_id FROM orders WHERE product_id = 0 AND user_phone = '$user[phone]'";
if (mysqli_num_rows(query($sql)) != 0) $have_line = true;
else $have_line = false;
if ($have_line) {
    if (!$cart_line) {
        $sql = "DELETE FROM orders WHERE product_id = 0 AND user_phone = '$user[phone]'";
        query($sql);
    }
}
else {
    $sql = "INSERT INTO orders VALUES (null, 0, 0, 0, '$user[name]', '$user[surname]', '$user[patronymic]', '$user[address]', '$user[phone]', '$user[comment]')";
    query($sql);
}
echo json_encode($response);