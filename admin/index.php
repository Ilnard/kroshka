<?php
require '../config.php';
session_start();
if (isset($_SESSION['admin'])) header("Location: http://$_SERVER[SERVER_NAME]/admin/orders.php");
else {
    if (isset($_POST['send'])) {
        $sql = "SELECT password FROM `admin-data`";
        $result = query($sql);
        $password = mysqli_fetch_assoc($result)['password'];
        if ($password == $_POST['password']) {
            $_SESSION['admin'] = true;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админка</title>
</head>
<body>
    <form method="post">
        <input type="password" name="password">
        <input type="submit" value="Отправить" name="send">
    </form>
</body>
</html>