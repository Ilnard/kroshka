<?php
require '../config.php';

session_start();
if (!isset($_SESSION['admin'])) header("Location: http://$_SERVER[SERVER_NAME]/admin/");

if (isset($_POST['edit'])) {
    $file = $_FILES['picture'];
    $filename = $file['name'];
    $uploadPath = '../img/works/' . $filename;

    $slide_text = $_POST['text'];
    $slide_id = $_POST['id'];

    // Перемещение файла в указанную папку
    if (move_uploaded_file($file['tmp_name'], $uploadPath)) {
        $sql = "UPDATE slider SET picture = '$filename', text = '$slide_text' WHERE id = $slide_id";
    } else {
        $sql = "UPDATE slider SET text = '$slide_text' WHERE id = $slide_id";
    }
    query($sql);
    header("Location: http://$_SERVER[SERVER_NAME]/admin/slider.php");
}
if (isset($_POST['delete'])) {
    $sql = "DELETE FROM slider WHERE id = $_POST[id]";
    query($sql);
    header("Location: http://$_SERVER[SERVER_NAME]/admin/slider.php");
}
if (isset($_POST['add'])) {
    $file = $_FILES['picture'];
    $filename = $file['name'];
    $uploadPath = '../img/works/' . $filename;

    $slide_text = $_POST['text'];
    if (move_uploaded_file($file['tmp_name'], $uploadPath)) {
        $sql = "INSERT INTO slider VALUES (null, '$filename', '$slide_text')";
        query($sql);
    } else {
        echo 'Ошибка';
    }
    header("Location: http://$_SERVER[SERVER_NAME]/admin/slider.php");
}
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin-slider.css">
    <title>Крошка слайдер</title>
</head>

<body>
    <header>
        <nav>
            <a class="header__link" href="/admin/orders.php">Заказы</a>
            <a class="header__link" href="/admin/slider.php">Слайдер</a>
            <a class="header__link" href="/admin/catalog.php">Каталог</a>
        </nav>
    </header>
    <h1 class="admin-title">Админ-панель | Слайдер</h1>
    <h2>Добавить слайд</h2>
    <form method="post" enctype="multipart/form-data" class="admin-add-slide">
        <input type="text" name="text" placeholder="Наименование">
        <input type="file" name="picture">
        <input type="submit" value="Добавить" name="add">
    </form>
    <h2>Слайды</h2>
    <div class="admin-slider">
        <?php
        $sql = "SELECT * FROM slider";
        $result = query($sql);
        while ($slide = mysqli_fetch_assoc($result)) :
        ?>
            <form method="post" enctype="multipart/form-data" class="admin-slide">
                <div class="media admin-slide__media">
                    <img src="../img/works/<?= $slide['picture'] ?>" alt="" class="media__pict">
                </div>
                <input type="text" name="text" value="<?= $slide['text'] ?>">
                <input type="file" name="picture">
                <input type="hidden" name="id" value="<?= $slide['id'] ?>">
                <div class="admin-slide__actions">
                    <input type="submit" name="edit" value="Сохранить">
                    <input type="submit" name="delete" value="Удалить">
                </div>
            </form>
        <? endwhile; ?>
    </div>
    <script src="js/admin.js"></script>
</body>

</html>