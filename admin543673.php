<?php
require 'config.php';

if (isset($_POST['delete-order'])) {
    $sql = "DELETE FROM orders WHERE user_phone = $_POST[phone]";
    query($sql);
    header("Location: http://$_SERVER[SERVER_NAME]/admin543673.php");
}
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/admin.css">
    <title>Крошка админка</title>
</head>

<body>
    <h1 class="admin-title">Админ-панель</h1>
    <div class="admin-orders-block">
        <?php
        $sql = "SELECT * FROM orders";
        $phones = [];
        $order_rows = [];
        $result = query($sql);
        // Конвертирование из mysql в php
        while ($order_row = mysqli_fetch_assoc($result)) :
            array_push($order_rows, $order_row);
        endwhile;
        // Расфасовка продуктов по заказам
        foreach ($order_rows as $order_row1) {
            if (!in_array($order_row1['phone'], $phones)) {
                $actual_phone = $order_row1['phone'];
                $global_price = 0;
        ?>
                <div class="admin-order">
                    <div class="admin-order-header">
                        <div class="admin-order-header__left">
                            <div class="admin-order-header__fullname"><?= $order_row1['user_name'].' '.$order_row1['user_surname'].' '.$order_row1['user_patronymic']?></div>
                            <div class="admin-order-header__address"><?= $order_row1['user_address'] ?></div>
                            <div class="admin-order-header__phone"><?= $order_row1['user_phone'] ?></div>
                            <div class="admin-order-header__comment">Комментарий: <?= $order_row1['user_comment'] ?></div>
                        </div>
                        <form method="post" class="admin-order-header__actions">
                            <svg class="admin-order-header__arrow" width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <mask id="mask0_101_7" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="25" height="25">
                                    <rect x="0.234894" y="24.4607" width="24" height="24" transform="rotate(-90 0.234894 24.4607)" fill="#D9D9D9" />
                                </mask>
                                <g mask="url(#mask0_101_7)">
                                    <path d="M21.3349 9.33568L12.9349 17.7607C12.8349 17.8607 12.7266 17.9315 12.6099 17.9732C12.4932 18.0148 12.3682 18.0357 12.2349 18.0357C12.1016 18.0357 11.9766 18.0148 11.8599 17.9732C11.7432 17.9315 11.6349 17.8607 11.5349 17.7607L3.10989 9.33568C2.87655 9.10234 2.75989 8.81068 2.75989 8.46068C2.75989 8.11068 2.88489 7.81067 3.13489 7.56067C3.38489 7.31067 3.67655 7.18567 4.00989 7.18567C4.34322 7.18567 4.63489 7.31067 4.88489 7.56067L12.2349 14.9107L19.5849 7.56067C19.8182 7.32734 20.1057 7.21068 20.4474 7.21068C20.7891 7.21068 21.0849 7.33568 21.3349 7.58568C21.5849 7.83568 21.7099 8.12734 21.7099 8.46068C21.7099 8.79401 21.5849 9.08568 21.3349 9.33568Z" fill="black" />
                                </g>
                            </svg>
                            <input type="hidden" name="phone" value="<?= $order_row1['user_phone'] ?>">
                            <input class="admin-order__delete" type="submit" name="delete-order" value="Удалить">
                        </form>

                    </div>
                    <div class="admin-order-main">
                        <?
                        foreach ($order_rows as $order_row2) {
                            if ($order_row2['phone'] == $actual_phone) {
                                $sql = "SELECT * FROM products WHERE id = $order_row2[product_id]";
                                $product = mysqli_fetch_assoc(query($sql));
                                $product['price1'] = (int)$product['price1'];
                                $product['price2'] = (int)$product['price2'];
                                $product['price3'] = (int)$product['price3'];
                                if ($product['square'] < 50) $product['price'] = $product['price1'];
                                else if ($product['square'] < 100 && $product['square'] >= 50) $product['price'] = $product['price2'];
                                else if ($product['square'] < 200 && $product['square'] >= 100) $product['price'] = $product['price3'];
                                else $product['price'] = false;
                        ?>
                                <div class="admin-product">
                                    <div class="media admin-product__media">
                                        <img src="img/products/<?= $product['picture'] ?>" class="media__pict admin-product__pict">
                                    </div>
                                    <div class="admin-product__info">
                                        <div class="admin-product__name"><?= $product['name'] ?> <?= $product['color'] ?></div>
                                        <div class="admin-product__square"><?= $order_row2['product_square'] ?> м2</div>
                                        <div class="admin-product__thickness"> <?= $order_row2['product_thickness'] ?> мм</div>
                                        <div class="admin-product__price">
                                            <?
                                            if ($product) {
                                                echo $product['price'] * $order_row2['product_square'] . ' Р';
                                                $global_price += $product['price'] * $order_row2['product_square'];
                                            } else echo 'Договорная';
                                            ?>
                                        </div>
                                    </div>
                                </div>
                        <?
                            }
                        }
                        array_push($phones, $actual_phone);
                        ?>
                    </div>
                    <div class="admin-order-global-price">
                <?
                echo 'Итого: <span class="bold">' . $global_price . ' Р</span>';
            }
        }
                ?>
                    </div>
                </div>
    </div>
    <script src="js/admin.js"></script>
</body>

</html>