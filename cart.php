<? require 'config.php' ?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/cart.css">
    <title>Крошка</title>
</head>

<body>
    <div class="modal">
        <form class="popup">
            <img src="resources/close.svg" alt="Закрыть" title="Закрыть" class="popup__close">
            <div class="order-block__field">
                <div class="order-block__input-name">Площадь в м²</div>
                <input type="text" class="order-block__input order-block__input_square" placeholder="50">
            </div>
            <div class="order-block__field">
                <div class="order-block__input-name">Толщина в мм</div>
                <input type="text" class="order-block__input order-block__input_thickness" placeholder="10">
            </div>
            <div class="order-block__field">
                <input type="submit" class="btn order-block__btn" value="Редактировать">
            </div>
        </form>
    </div>
    <header class="header">
        <div class="container">
            <div class="header__inner">
                <img src="resources/logo-black.svg" alt="Логотип" class="logo">
                <nav class="header-nav">
                    <a href="/" class="header-nav__link">Главная</a>
                    <a href="/#contacts" class="header-nav__link">Контакты</a>
                    <a href="/info.html" class="header-nav__link">Покупателям</a>
                    <a href="catalog.php" class="header-nav__link">Каталог</a>
                    <a href="#" class="header-nav__link">Корзина</a>
                </nav>
                <div class="burger-icon">
                    <div class="burger-icon__line"></div>   
                </div>
            </div>
        </div>
    </header>
    <main>
        <section class="cart">
            <div class="container">
                <h2 class="section__title section__title_center">Корзина</h2>
                <div class="cart__inner">
                    <div class="cart-block">

                    </div>
                    <div class="total-block-wrapper">
                        <form method="post" class="total-block">
                            <div class="total-block__details">
                                <div class="total-block__count"></div>
                                <div class="total-block__add-line">
                                    <input type="checkbox" name="line" id="line" class="total-block__line-checkbox">
                                    <label for="line">Добавить покраску линии разметки (Цена договорная)</label>
                                </div>
                            </div>
                            <div class="total-block-total">
                                <div class="total-block-total__name">Итого</div>
                                <div class="total-block-total__value"></div>
                            </div>
                            <a href="order.php" class="btn total-block__btn">Перейти к оформлению</a>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <footer class="footer">
            <div class="container">
                <div class="footer__inner">
                    <img src="resources/logo-white.svg" alt="Логотип" class="logo footer__logo">
                    <div class="footer-columns">
                        <div class="footer-column">
                            <div class="footer-column__title">Разделы</div>
                            <ul class="footer-column__items">
                                <li class="footer-column__item">
                                    <a href="#" class="footer-column__link">Главная</a>
                                </li>
                                <li class="footer-column__item">
                                    <a href="#" class="footer-column__link">Каталог</a>
                                </li>
                                <li class="footer-column__item">
                                    <a href="#" class="footer-column__link">Корзина</a>
                                </li>
                            </ul>
                        </div>
                        <div class="footer-column">
                            <div class="footer-column__title">Контакты</div>
                            <ul class="footer-column__items">
                                <li class="footer-column__item">
                                    <a href="tel:+79998887766" class="footer-column__link">+7 (999) 888-77-66</a>
                                </li>
                                <li class="footer-column__item">
                                    <a href="mailto:email@gmail.com" class="footer-column__link">email@gmail.com</a>
                                </li>
                            </ul>
                        </div>
                        <div class="footer-column">
                            <div class="footer-column__title">Соц. сети</div>
                            <ul class="footer-column__items">
                                <li class="footer-column__item">
                                    <a target="_blank" href="https://vk.com/rezinovoyepokrytiye102rus" class="footer-column__link footer-column__link-social footer-column__link-social_vk">ВКонтакте</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </main>
    <script src="js/modal-popup.js"></script>
    <script src="js/cart.js"></script>
    <script src="js/burger.js"></script>
</body>

</html>