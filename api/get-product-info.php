<?php
require '../config.php';

$id = json_decode(file_get_contents("php://input"), true)['id'];
$sql = "SELECT * FROM products WHERE id = $id";
$product = mysqli_fetch_assoc(query($sql));
echo json_encode($product);