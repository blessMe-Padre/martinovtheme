<footer class="footer">
    <div class="container">

        <div class="footer__wrapper">
            <div class="footer__item">
                <img src="<?php echo get_template_directory_uri() ?>/img/footer__logo.svg" width="166" height="89"
                    alt="image">
            </div>

            <div class="footer__item">
                <h3>Клиентам</h3>
                <ul>
                    <li><a href="#">О нас</a></li>
                    <li><a href="#">Доставка и оплата</a></li>
                    <li><a href="#">Оптовые продажи</a></li>
                    <li><a href="#">Обратная связь</a></li>
                    <li><a href="#">Помощь</a></li>
                    <li><a href="#">Контакты</a></li>
                </ul>
            </div>

            <div class="footer__item">
                <h3>Каталог</h3>
                <ul>
                    <li><a href="#">Акции</a></li>
                    <li><a href="#">Диффузоры</a></li>
                    <li><a href="#">Рефиллы</a></li>
                </ul>
            </div>

            <div class="footer__item">
                <h3>Контакты</h3>
                <div class="flex items-center gap-3 contacts__header-item">
                    <div class="social-icon">
                        <img src="<?php echo get_template_directory_uri() ?>/img/icons/pin-white.svg" width="20"
                            height="20" alt="pin">
                    </div>
                    <p class="contacts__text text-wrap">г. Находка, ул. ​Малиновского, 19а</p>
                </div>

                <div class="flex items-center gap-3 contacts__header-item">
                    <div class="social-icon">
                        <img src="<?php echo get_template_directory_uri() ?>/img/icons/clock.svg" width="20" height="20"
                            alt="pin">
                    </div>
                    <div>
                        <p class="contacts__slim-text">Пн-пт: 10:00—19:00</p>
                        <p class="contacts__slim-text">Сб-вс: 10:00—18:00</p>
                    </div>
                </div>

                <div class="flex items-center gap-3 contacts__header-item">
                    <div class="social-icon">
                        <img src="<?php echo get_template_directory_uri() ?>/img/icons/phone-white.svg" width="20"
                            height="20" alt="pin">
                    </div>
                    <a class="contacts__text" href="tel:+79999999999">+ 7 (999) 999-99-99</a>
                </div>

                <div class="flex items-center gap-3 contacts__header-item">
                    <div class="social-icon">
                        <img src="<?php echo get_template_directory_uri() ?>/img/icons/whatsapp-white.svg" width="20"
                            height="20" alt="pin">
                    </div>
                    <div>
                        <a class="contacts__slim-text" href="https://wa.me/+79999999999">Написать на WhatsApp</a>
                    </div>
                </div>
            </div>


        </div>

        <div class="footer__footer">
            <div class="footer__footer-item">
                <p>© <span class="data-span"></span> «Торговый дом 888»</p>
                <p><a href="#">Политика конфиденциальности</a></p>
                <p><a href="#">Политика обработки персональных данных</a></p>
                <p><a href="#">Договор оферты</a></p>
            </div>
            <img src="<?php echo get_template_directory_uri() ?>/img/icons/logos.svg" width="168" height="55" alt="">
        </div>
    </div>
</footer>

</div>

<?php wp_footer(); ?>
</body>

</html>