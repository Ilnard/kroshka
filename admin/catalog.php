<?php
require '../config.php';

session_start();
if (!isset($_SESSION['admin'])) header("Location: http://$_SERVER[SERVER_NAME]/admin/");

if (isset($_POST['edit'])) {
    $file = $_FILES['picture'];
    $filename = $file['name'];
    $uploadPath = '../img/products/' . $filename;

    // Перемещение файла в указанную папку
    if (move_uploaded_file($file['tmp_name'], $uploadPath)) {
        $sql = "UPDATE products SET name = '$_POST[name]', color = '$_POST[color]', price1 = $_POST[price1], price2 = $_POST[price2], price3 = $_POST[price3], picture = '$filename' WHERE id = $_POST[id]";
    } else {
        $sql = "UPDATE products SET name = '$_POST[name]', color = '$_POST[color]', price1 = $_POST[price1], price2 = $_POST[price2], price3 = $_POST[price3] WHERE id = $_POST[id]";
    }
    query($sql);
    header("Location: http://$_SERVER[SERVER_NAME]/admin/catalog.php");
}
if (isset($_POST['delete'])) {
    $sql = "DELETE FROM products WHERE id = $_POST[id]";
    query($sql);
    header("Location: http://$_SERVER[SERVER_NAME]/admin/catalog.php");
}
if (isset($_POST['add'])) {
    $file = $_FILES['picture'];
    $filename = $file['name'];
    $uploadPath = '../img/products/' . $filename;

    if (move_uploaded_file($file['tmp_name'], $uploadPath)) {
        $sql = "INSERT INTO products VALUES (null, '$_POST[name]', $_POST[price1], $_POST[price2], $_POST[price3], '$_POST[color]', '$filename')";
        query($sql);
    } else {
        echo 'Ошибка';
    }
    header("Location: http://$_SERVER[SERVER_NAME]/admin/catalog.php");
}
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin-catalog.css">
    <title>Крошка каталог</title>
</head>

<body>
    <header>
        <nav>
            <a class="header__link" href="/admin/orders.php">Заказы</a>
            <a class="header__link" href="/admin/slider.php">Слайдер</a>
            <a class="header__link" href="/admin/catalog.php">Каталог</a>
        </nav>
    </header>
    <h1 class="admin-title">Админ-панель | Каталог</h1>
    <h2>Добавить товар</h2>
    <form method="post" enctype="multipart/form-data" class="admin-add-slide">
        <input type="text" name="name" placeholder="Наименование" required>
        <input type="text" name="color" placeholder="Цвет" required>
        <input type="text" name="price1" placeholder="Цена <50" required>
        <input type="text" name="price2" placeholder="Цена 50-100" required>
        <input type="text" name="price3" placeholder="Цена 100-200" required>
        <input type="file" name="picture" required>
        <input type="submit" value="Добавить" name="add">
    </form>
    <h2>Каталог</h2>
    <div class="admin-products">
        <?php
        $sql = "SELECT * FROM products";
        $result = query($sql);
        while ($product = mysqli_fetch_assoc($result)) :
        ?>
            <form method="post" enctype="multipart/form-data" class="admin-product">
                <div class="media admin-product__media">
                    <img src="../img/products/<?= $product['picture'] ?>" alt="" class="media__pict">
                </div>
                <input type="text" name="name" value="<?= $product['name'] ?>" placeholder="Наименование">
                <input type="text" name="color" value="<?= $product['color'] ?>" placeholder="Цвет">
                <input type="text" name="price1" value="<?= $product['price1'] ?>" placeholder="Цена <50">
                <input type="text" name="price2" value="<?= $product['price2'] ?>" placeholder="Цена 50-100">
                <input type="text" name="price3" value="<?= $product['price3'] ?>" placeholder="Цена 100-200">
                <input type="file" name="picture">
                <input type="hidden" name="id" value="<?= $product['id'] ?>">
                <div class="admin-product__actions">
                    <input type="submit" name="edit" value="Сохранить">
                    <input type="submit" name="delete" value="Удалить">
                </div>
            </form>
        <? endwhile; ?>
    </div>
    <script src="js/admin.js"></script>
</body>

</html>