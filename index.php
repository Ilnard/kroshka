<? require 'config.php' ?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link rel="stylesheet" href="css/style.css">
    <title>Крошка</title>
</head>

<body>
    <header class="header">
        <div class="container">
            <div class="header__inner">
                <img src="resources/logo-black.svg" alt="Логотип" class="logo">
                <nav class="header-nav">
                    <a href="/" class="header-nav__link">Главная</a>
                    <a href="/#contacts" class="header-nav__link">Контакты</a>
                    <a href="/info.html" class="header-nav__link">Покупателям</a>
                    <a href="catalog.php" class="header-nav__link">Каталог</a>
                    <a href="cart.php" class="header-nav__link">Корзина</a>
                </nav>
                <div class="burger-icon">
                    <div class="burger-icon__line"></div>
                </div>
            </div>
        </div>
    </header>
    <main>
        <section class="welcome">
            <div class="container">
                <div class="welcome__inner">
                    <div class="welcome__text-block">
                        <h1 class="welcome__title"><span class="bold">Резиновое покрытие</span><br>SBR и EPDM</h1>
                        <a href="catalog.php" class="btn welcome__btn">В каталог</a>
                    </div>
                </div>
            </div>
        </section>
        <section class="color-section">
            <div class="container">
                <div class="color-section__inner">
                    <div class="color-section__media">
                        <svg class="color-section__graphic" viewBox="0 0 637 463" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="235.714" width="78.5715" height="471.429" rx="39.2857" transform="rotate(30 235.714 0)" fill="#252DFF" />
                            <rect x="372.857" width="78.5715" height="471.429" rx="39.2857" transform="rotate(30 372.857 0)" fill="#FF8A00" />
                            <rect x="510" width="78.5715" height="314.286" rx="39.2857" transform="rotate(30 510 0)" fill="#14FF00" />
                            <rect x="330.857" y="303.286" width="78.5715" height="139.059" rx="39.2857" transform="rotate(30 330.857 303.286)" fill="#FFF500" />
                            <rect x="568.572" y="136.714" width="78.5715" height="314.286" rx="39.2857" transform="rotate(30 568.572 136.714)" fill="#FF0000" />
                        </svg>

                    </div>
                    <div class="color-section__content">
                        <h2 class="section__title color-section__title">Большой<br>выбор<br>цветов</h2>
                        <div class="color-section__descr">Не ограничивай себя в выборе расцветки покрытия</div>
                    </div>
                </div>
            </div>
        </section>
        <section class="select-section">
            <div class="container">
                <div class="select-section__inner">
                    <h2 class="section__title select-section__title">Узнай, что нужно<br>именно тебе</h2>
                    <div class="select-section__block">
                        <div class="select-section-item" style="background: url('img/select/epdm.jpg'), rgba(0, 0, 0, 0.5);">
                            <div class="select-section-item__title">EPDM</div>
                            <div class="select-section-item__descr">
                                EPDM является одной из инновационных разработок в области материалов, разработанных на базе эластомеров. Говоря более простым и понятным языком, это синтетичный каучук, имеющий довольно широкое применение благодаря тому, что является высококачественным материалом, получившим мировое признание.<br>
                                <br>
                                Преимущества:<br>
                                <ol>
                                    <li>Гранулы EPDM не содержат токсических веществ.</li>
                                    <li>Около четверти состава EPDM занимает натуральный каучук.</li>
                                    <li>Эластичность и мягкость резиновой крошки EPDM позволяет ей быть более прочной и долговечной, в отличие от SBR крошки.</li>
                                    <li>По сроку эксплуатации каучук EPDM превышает SBR в 5-6 раз.</li>
                                </ol>
                            </div>
                        </div>
                        <div class="select-section-item" style="background: url('img/select/sbr.jpg'), rgba(0, 0, 0, 0.5);">
                            <div class="select-section-item__title">SBR</div>
                            <div class="select-section-item__descr">
                                SBR – это вторичный материал из отработанных покрышек. На заводе его сначала измельчают механическим способом, а затем отделяют от металлического корда и текстильных волокон. Резиновая крошка от производителя сделана из грузовых автомобильных шин<br>
                                <br>
                                Преимущества:<br>
                                <ol>
                                    <li>Для монтажа покрытий из резиновой крошки не нужно много специального оборудования. Мастера при необходимости легко заменят деформированный участок на новый, поэтому ремонт не станет проблемой.</li>
                                    <li>Если правильно установить покрытие из резиновой крошки и регулярно за ним ухаживать, оно прослужит от 5 до 10 лет.</li>
                                    <li>Производство резиновой крошки и сам материал не вредят окружающей среде. Он не содержит токсичных веществ и не является источником запахов.</li>
                                    <li>Покрытие из резиновой крошки не скользит, обеспечивает хорошее сцепление с обувью.</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="price">
            <div class="container">
                <div class="price__inner">
                    <h2 class="section__title price__title">Прайс</h2>
                    <div class="price-table">
                        <div class="price-table__row price-table__title">
                            <div class="price-table__column price-table__square">Площадь</div>
                            <div class="price-table__column price-table__sbr-black">SBR черный</div>
                            <div class="price-table__column price-table__sbr-color">SBR цветной</div>
                            <div class="price-table__column price-table__epdm">EPDM</div>
                        </div>
                        <div class="price-table__line"></div>
                        <div class="price-table__row">
                            <div class="price-table__column price-table__square">до 50 м²</div>
                            <div class="price-table__column price-table__sbr-black">1800 ₽</div>
                            <div class="price-table__column price-table__sbr-color">2800 ₽</div>
                            <div class="price-table__column price-table__epdm">2800 ₽</div>
                        </div>
                        <div class="price-table__line"></div>
                        <div class="price-table__row">
                            <div class="price-table__column price-table__square">50-100 м²</div>
                            <div class="price-table__column price-table__sbr-black">1700 ₽</div>
                            <div class="price-table__column price-table__sbr-color">2700 ₽</div>
                            <div class="price-table__column price-table__epdm">2700 ₽</div>
                        </div>
                        <div class="price-table__line"></div>
                        <div class="price-table__row">
                            <div class="price-table__column price-table__square">100-200 м²</div>
                            <div class="price-table__column price-table__sbr-black">1500 ₽</div>
                            <div class="price-table__column price-table__sbr-color">2500 ₽</div>
                            <div class="price-table__column price-table__epdm">2500 ₽</div>
                        </div>
                        <div class="price-table__line"></div>
                        <div class="price-table__row">
                            <div class="price-table__column price-table__square">от 200 м²</div>
                            <div class="price-table__column price-table__sbr-black">Договорная</div>
                            <div class="price-table__column price-table__sbr-color">Договорная</div>
                            <div class="price-table__column price-table__epdm">Договорная</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="works">
            <div class="container">
                <h2 class="section__title">Наши работы</h2>
                <div class="works__inner">
                    <div class="swiper">
                        <div class="swiper-wrapper">
                            <?php
                            $sql = "SELECT * FROM slider";
                            $result = query($sql);
                            while ($slide = mysqli_fetch_assoc($result)) :
                            ?>
                                <div class="swiper-slide">
                                    <div class="media swiper-slide__media">
                                        <img src="img/works/<?= $slide['picture'] ?>" alt="Фото результата" class="media__pict media__pict_cover works__work-photo">
                                    </div>
                                    <div class="swiper-slide__name"><?= $slide['text'] ?></div>
                                </div>
                            <? endwhile; ?>
                        </div>
                        <div class="swiper-pagination"></div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                    </div>
                </div>
            </div>
        </section>
    </main>
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
                        <div class="footer-column__title" id="contacts">Контакты</div>
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
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="js/script.js"></script>
    <script src="js/burger.js"></script>
</body>

</html>