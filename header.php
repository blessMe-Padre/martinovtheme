<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>888 | <?php the_title(); ?></title>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <h1 class="visually-hidden">Торговый дом</h1>
    <div class="page-wrapper">

        <header class="header">
            <div class="container">
                <div class="header__wrapper">
                    <div class="header__left-block">
                        <a href="/">
                            <img class="header__logo"
                                src="<?php echo get_template_directory_uri() ?>/img/header-logo.svg" width="91"
                                height="49" alt="logo">
                        </a>
                        <nav>
                            <ul class="header__nav">
                                <li><a href="/">О нас</a></li>
                                <li><a href="#">Доставка и оплата</a></li>
                                <li><a href="#">Оптовые продажи</a></li>
                                <li><a href="#">Контакты</a></li>
                            </ul>
                        </nav>
                    </div>

                    <div class="header__right-block">
                        <div class="header__address">
                            <img src="<?php echo get_template_directory_uri() ?>/img/icons/pin.svg" width="16"
                                height="19" alt="pin">
                            <p>г. Находка, ул. Малиновского, 19а</p>
                        </div>
                        <div class="header__phone flex items-center gap-3">
                            <img src="<?php echo get_template_directory_uri() ?>/img/icons/phone.svg" width="20"
                                height="20" alt="phone">
                            <a href="tel:+79999999999">+ 7 (999) 999-99-99</a>
                        </div>
                        <a href="#" class="social-icon">
                            <img src="<?php echo get_template_directory_uri() ?>/img/icons/whatsapp.svg" width="16"
                                height="16" alt="whatsapp">
                        </a>
                    </div>

                </div>
                <div class="header__footer">
                    <button class="button menu-button">
                        <img class="menu-button-img-catalog"
                            src="<?php echo get_template_directory_uri() ?>/img/icons/catalog.svg" width="15"
                            height="15" alt="close">
                        <img class="menu-button-img-close"
                            src="<?php echo get_template_directory_uri() ?>/img/icons/close.svg" width="15" height="15"
                            alt="close">
                        <span class="menu-button-desktop">Каталог</span>
                        <span class="menu-button-mobile">Меню</span>
                    </button>

                    <div class="search-form">
                        <p>Поиск по товарам...</p>
                    </div>

                    <div class="header__callback"><a href="#">Обратная связь</a></div>
                    <div class="header__account-wrapper">
                        <div class="header__cart-button header-button">
                            <svg width="19" height="15" viewBox="0 0 19 15" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M15.0358 4.69395L12.5358 0.527285C12.4497 0.386929 12.3116 0.286251 12.1516 0.247135C11.9916 0.208019 11.8227 0.233626 11.6815 0.31839C11.5403 0.403155 11.4383 0.540225 11.3976 0.699808C11.3569 0.85939 11.3808 1.02859 11.4642 1.17062L13.9642 5.33729C14.0503 5.47764 14.1884 5.57832 14.3484 5.61743C14.5083 5.65655 14.6773 5.63094 14.8185 5.54618C14.9597 5.46141 15.0617 5.32434 15.1024 5.16476C15.1431 5.00518 15.1192 4.83598 15.0358 4.69395ZM5.03583 5.33729L7.53583 1.17062C7.61919 1.02859 7.64313 0.85939 7.60243 0.699808C7.56174 0.540225 7.4597 0.403155 7.3185 0.31839C7.1773 0.233626 7.00834 0.208019 6.84837 0.247135C6.68839 0.286251 6.55032 0.386929 6.46416 0.527285L3.96416 4.69395C3.8808 4.83598 3.85686 5.00518 3.89756 5.16476C3.93825 5.32434 4.04029 5.46141 4.18149 5.54618C4.32269 5.63094 4.49164 5.65655 4.65162 5.61743C4.8116 5.57832 4.94967 5.47764 5.03583 5.33729Z" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M17.6166 5.11646C17.6313 5.02705 17.6263 4.93553 17.602 4.84825C17.5777 4.76096 17.5348 4.68 17.4761 4.61096C17.4175 4.54191 17.3445 4.48645 17.2623 4.44841C17.1801 4.41036 17.0906 4.39065 17 4.39062H1.99998C1.90938 4.39065 1.81988 4.41036 1.73766 4.44841C1.65544 4.48645 1.58247 4.54191 1.52382 4.61096C1.46516 4.68 1.42221 4.76096 1.39795 4.84825C1.37369 4.93553 1.36869 5.02705 1.38331 5.11646L2.65414 12.8856C2.74192 13.4222 3.01758 13.91 3.43189 14.262C3.84619 14.614 4.37215 14.8073 4.91581 14.8073H14.0841C14.6278 14.8073 15.1538 14.614 15.5681 14.262C15.9824 13.91 16.258 13.4222 16.3458 12.8856L17.6166 5.11646ZM8.87498 7.93229V11.2656C8.87498 11.4314 8.94083 11.5904 9.05804 11.7076C9.17525 11.8248 9.33422 11.8906 9.49998 11.8906C9.66574 11.8906 9.82471 11.8248 9.94192 11.7076C10.0591 11.5904 10.125 11.4314 10.125 11.2656V7.93229C10.125 7.76653 10.0591 7.60756 9.94192 7.49035C9.82471 7.37314 9.66574 7.30729 9.49998 7.30729C9.33422 7.30729 9.17525 7.37314 9.05804 7.49035C8.94083 7.60756 8.87498 7.76653 8.87498 7.93229ZM12.2083 7.93229V11.2656C12.2083 11.4314 12.2742 11.5904 12.3914 11.7076C12.5086 11.8248 12.6676 11.8906 12.8333 11.8906C12.9991 11.8906 13.158 11.8248 13.2753 11.7076C13.3925 11.5904 13.4583 11.4314 13.4583 11.2656V7.93229C13.4583 7.76653 13.3925 7.60756 13.2753 7.49035C13.158 7.37314 12.9991 7.30729 12.8333 7.30729C12.6676 7.30729 12.5086 7.37314 12.3914 7.49035C12.2742 7.60756 12.2083 7.76653 12.2083 7.93229ZM5.54164 7.93229V11.2656C5.54164 11.4314 5.60749 11.5904 5.7247 11.7076C5.84191 11.8248 6.00088 11.8906 6.16664 11.8906C6.3324 11.8906 6.49137 11.8248 6.60858 11.7076C6.72579 11.5904 6.79164 11.4314 6.79164 11.2656V7.93229C6.79164 7.76653 6.72579 7.60756 6.60858 7.49035C6.49137 7.37314 6.3324 7.30729 6.16664 7.30729C6.00088 7.30729 5.84191 7.37314 5.7247 7.49035C5.60749 7.60756 5.54164 7.76653 5.54164 7.93229Z" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M17.8333 4.39062H1.16666C1.0009 4.39062 0.841925 4.45647 0.724715 4.57368C0.607505 4.69089 0.541656 4.84986 0.541656 5.01562C0.541656 5.18139 0.607505 5.34036 0.724715 5.45757C0.841925 5.57478 1.0009 5.64062 1.16666 5.64062H17.8333C17.9991 5.64062 18.1581 5.57478 18.2753 5.45757C18.3925 5.34036 18.4583 5.18139 18.4583 5.01562C18.4583 4.84986 18.3925 4.69089 18.2753 4.57368C18.1581 4.45647 17.9991 4.39062 17.8333 4.39062Z" />
                            </svg>
                        </div>
                        <div class="header__user-button header-button">
                            <svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_2002_2445)">
                                    <path
                                        d="M8.5 0.515625C6.17378 0.515625 4.28125 2.40816 4.28125 4.73438C4.28125 7.06059 6.17378 8.95312 8.5 8.95312C10.8262 8.95312 12.7188 7.06059 12.7188 4.73438C12.7188 2.40816 10.8262 0.515625 8.5 0.515625ZM13.7489 11.7092C12.5939 10.5365 11.0628 9.89062 9.4375 9.89062H7.5625C5.93725 9.89062 4.40606 10.5365 3.25106 11.7092C2.10172 12.8762 1.46875 14.4167 1.46875 16.0469C1.46875 16.3057 1.67862 16.5156 1.9375 16.5156H15.0625C15.3214 16.5156 15.5312 16.3057 15.5312 16.0469C15.5312 14.4167 14.8983 12.8762 13.7489 11.7092Z" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_2002_2445">
                                        <rect width="16" height="16" fill="white" transform="translate(0.5 0.515625)" />
                                    </clipPath>
                                </defs>
                            </svg>

                        </div>
                    </div>

                    <!-- mini-cart popup -->
                    <div class="header__minicart-popup">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem perspiciatis velit sunt vero
                        ducimus
                        exercitationem, expedita rerum similique ratione quae?
                    </div>

                    <!-- popup menu -->
                    <div class="header__popup-menu">
                        <nav>
                            <ul class="header__catalog-menu">
                                <li>
                                    <a href="#">Вся парфюмерия</a>
                                    <ul class="submenu">
                                        <li>Диффузоры</li>
                                        <li><a href="/">7SENS</a></li>
                                        <li><a href="/">Atmosphera</a></li>
                                        <li><a href="/">Banka_home</a></li>
                                        <li><a href="/">Culti Milano</a></li>
                                        <li><a href="/">Dr. Vranjes Firenze</a></li>
                                        <li><a href="/">Lemongrass House</a></li>
                                        <li>Рефиллы</li>
                                        <li><a href="/">7SENS</a></li>
                                        <li><a href="/">Atmosphera</a></li>
                                        <li><a href="/">Banka_home</a></li>
                                        <li><a href="/">Culti Milano</a></li>
                                        <li><a href="/">Dr. Vranjes Firenze</a></li>
                                        <li><a href="/">Lemongrass House</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Мужчинам</a>
                                    <ul class="submenu">
                                        <li><a href="/">7SENS</a></li>
                                        <li><a href="/">Atmosphera</a></li>
                                        <li><a href="/">Banka_home</a></li>
                                        <li><a href="/">Culti Milano</a></li>
                                        <li><a href="/">Dr. Vranjes Firenze</a></li>
                                        <li><a href="/">Lemongrass House</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Женщинам</a>
                                    <ul class="submenu">
                                        <li><a href="/">7SENS1</a></li>
                                        <li><a href="/">Atmosphera1</a></li>
                                        <li><a href="/">Banka_home1</a></li>
                                        <li><a href="/">Culti Milano1</a></li>
                                        <li><a href="/">Dr. Vranjes Firenze1</a></li>
                                        <li><a href="/">Lemongrass House1</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Унисекс</a>
                                    <ul class="submenu">
                                        <li><a href="/">7SENS2</a></li>
                                        <li><a href="/">Atmosphera2</a></li>
                                        <li><a href="/">Banka_home2</a></li>
                                        <li><a href="/">Culti Milano2</a></li>
                                        <li><a href="/">Dr. Vranjes Firenze2</a></li>
                                        <li><a href="/">Lemongrass House2</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Диффузоры</a>
                                    <ul class="submenu">
                                        <li><a href="/">7SENS3</a></li>
                                        <li><a href="/">Atmosphera3</a></li>
                                        <li><a href="/">Banka_home3</a></li>
                                        <li><a href="/">Culti Milano3</a></li>
                                        <li><a href="/">Dr. Vranjes Firenze3</a></li>
                                        <li><a href="/">Lemongrass House3</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Рефиллы</a>
                                    <ul class="submenu">
                                        <li><a href="/">7SENS4</a></li>
                                        <li><a href="/">Atmosphera4</a></li>
                                        <li><a href="/">Banka_home4</a></li>
                                        <li><a href="/">Culti Milano4</a></li>
                                        <li><a href="/">Dr. Vranjes Firenze4</a></li>
                                        <li><a href="/">Lemongrass House4</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>

                </div>
        </header>