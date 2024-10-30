<?php
/*
Template Name: Главная страница
*/
get_header();
?>
<main>
  <div class="w-0 min-w-[100%] relative">
    <div class="hero-swiper swiper">
      <div class="hero-wrapper swiper-wrapper justify-stretch">

        <div class="swiper-slide h-auto">
          <div class="container">
            <div class="hero__description">
              <p class="hero__description-title"><span>Экслюзивная</span><br>парфюмерия<br>
                и косметика</p>
              <div class="hero__decor"></div>
              <p class="hero__description-text">от известных мировых брендов</p>
              <a href="" class="anim-button _anim-button">В КАТАЛОГ</a>
            </div>
          </div>
          <picture>
            <source srcset="<?php echo get_template_directory_uri() ?>/img/slides/image-1.webp"
              media="(min-width: 550px)" />
            <img class="hero__img" src="<?php echo get_template_directory_uri() ?>/img/slides/image-1-sm.webp"
              width="100%" height="600" alt="image">
          </picture>
        </div>
        <div class="swiper-slide h-auto">
          <div class="container">
            <div class="hero__description">
              <p class="hero__description-title"><span>Экслюзивная</span><br>парфюмерия<br>
                и косметика</p>
              <div class="hero__decor"></div>
              <p class="hero__description-text">от известных мировых брендов</p>
              <a href="" class="anim-button _anim-button">В КАТАЛОГ</a>
            </div>
          </div>
          <picture>
            <source srcset="<?php echo get_template_directory_uri() ?>/img/slides/image-1.webp"
              media="(min-width: 550px)" />
            <img class="hero__img" src="<?php echo get_template_directory_uri() ?>/img/slides/image-1-sm.webp"
              width="100%" height="600" alt="image">
          </picture>
        </div>
        <div class="swiper-slide h-auto">
          <div class="container">
            <div class="hero__description">
              <p class="hero__description-title"><span>Экслюзивная</span><br>парфюмерия<br>
                и косметика</p>
              <div class="hero__decor"></div>
              <p class="hero__description-text">от известных мировых брендов</p>
              <a href="" class="anim-button _anim-button">В КАТАЛОГ</a>
            </div>
          </div>
          <picture>
            <source srcset="<?php echo get_template_directory_uri() ?>/img/slides/image-1.webp"
              media="(min-width: 550px)" />
            <img class="hero__img" src="<?php echo get_template_directory_uri() ?>/img/slides/image-1-sm.webp"
              width="100%" height="600" alt="image">
          </picture>
        </div>

      </div>
      <div class="swiper-button-wrapper swiper-button-wrapper--hero">
        <!-- <div class="swiper-button-prev"></div> -->
        <div class="swiper-pagination"></div>
        <!-- <div class="swiper-button-next"></div> -->
      </div>
    </div>
  </div>

  <section class="action-links-section" data-scroll>
    <div class="container">
      <ul class="action-links-section__list">
        <li>
          <a href="#" class="action-links-section__item">
            <img src="<?php echo get_template_directory_uri() ?>/img/actions/image-1.png" width="480" height="342"
              alt="image">
            <p>Акции</p>
          </a>
        </li>
        <li>
          <a href="#" class="action-links-section__item">
            <img src="<?php echo get_template_directory_uri() ?>/img/actions/image-2.png" width="480" height="342"
              alt="image">
            <p>Диффузоры</p>
          </a>
        </li>
        <li>
          <a href="#" class="action-links-section__item">
            <img src="<?php echo get_template_directory_uri() ?>/img/actions/image-3.png" width="480" height="342"
              alt="image">
            <p>Рефиллы</p>
          </a>
        </li>
      </ul>
    </div>
  </section>

  <section class="category-section relative" data-scroll>
    <div class="container">

      <div class="category-section__header">
        <h2 class="title">Новинки</h2>
        <div class="swiper-button-wrapper">
          <div class="swiper-button-prev swiper-button-prev-new"></div>
          <div class="swiper-button-next swiper-button-next-new"></div>
        </div>
      </div>

      <div class="w-0 min-w-[100%] relative">
        <div class="category-section-swiper swiper">
          <ul class="hero-wrapper swiper-wrapper justify-stretch">
            <!-- 1 -->
            <li class="swiper-slide h-auto">
              <div class="card">
                <div>
                  <div class="card__sale">-20%</div>
                  <a href="#">
                    <div class="image-wrapper">
                      <img src="<?php echo get_template_directory_uri() ?>/img/product/image-1.jpg" width="345"
                        height="432" alt="product">
                    </div>
                  </a>
                  <div class="card__inner">
                    <p>DURANCE</p>
                    <p>250 мл</p>
                  </div>
                  <h3 class="card__title">Рефилл DURANCE "Hazelnut cookie" Ореховое печенье
                    с шоколадом</h3>
                </div>
                <div class="card__footer">
                  <p class="card__price"><span>2 999</span> ₽</p>
                  <a href="#" class="button">Купить</a>
                </div>
              </div>
            </li>
            <!-- 2 -->
            <li class="swiper-slide h-auto">
              <div class="card">
                <div>
                  <div class="card__sale">-90%</div>
                  <a href="#">
                    <div class="image-wrapper">
                      <img src="<?php echo get_template_directory_uri() ?>/img/product/image-2.jpg" width="345"
                        height="432" alt="product">
                    </div>
                  </a>
                  <div class="card__inner">
                    <p>CHIARA Firenze</p>
                    <p>250 мл</p>
                  </div>
                  <h3 class="card__title">Наполнитель для ароматического диффузора "TUSCIA" Вековая смола...</h3>
                </div>
                <div class="card__footer">
                  <p class="card__price"><span>3 490</span> ₽</p>
                  <a href="#" class="button">Купить</a>
                </div>
              </div>
            </li>
            <!-- 3 -->
            <li class="swiper-slide h-auto">
              <div class="card">
                <div>
                  <a href="#">
                    <div class="image-wrapper">
                      <img src="<?php echo get_template_directory_uri() ?>/img/product/image-3.jpg" width="345"
                        height="432" alt="product">
                    </div>
                  </a>
                  <div class="card__inner">
                    <p>Culti Milano</p>
                    <p>250 мл</p>
                  </div>
                  <h3 class="card__title">Рефилл для заправки диффузора CULTI Quercea 1000 мл.</h3>
                </div>
                <div class="card__footer">
                  <p class="card__price"><span>13 490</span> ₽</p>
                  <a href="#" class="button">Купить</a>
                </div>
              </div>
            </li>
            <!-- 4 -->
            <li class="swiper-slide h-auto">
              <div class="card">
                <div>
                  <a href="#">
                    <div class="image-wrapper">
                      <img src="<?php echo get_template_directory_uri() ?>/img/product/image-4.jpg" width="345"
                        height="432" alt="product">
                    </div>
                  </a>
                  <div class="card__inner">
                    <p>Voluspa</p>
                    <p>250 мл</p>
                  </div>
                  <h3 class="card__title">Ароматический диффузор
                    100 мл PANJORE LYCHEE "Панжерское личи"</h3>
                </div>
                <div class="card__footer">
                  <p class="card__price"><span>4 490</span> ₽</p>
                  <a href="#" class="button">Купить</a>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </div>
      <!-- /container -->
    </div>
  </section>

  <section class="category-section relative" data-scroll>
    <div class="container">

      <div class="category-section__header">
        <h2 class="title">популярное</h2>
        <div class="swiper-button-wrapper">
          <div class="swiper-button-prev swiper-button-prev-popular"></div>
          <div class="swiper-button-next swiper-button-next-popular"></div>
        </div>
      </div>

      <div class="w-0 min-w-[100%] relative">
        <div class="popular-section-swiper swiper">
          <ul class="hero-wrapper swiper-wrapper justify-stretch">
            <!-- 1 -->
            <li class="swiper-slide h-auto">
              <div class="card">
                <div>
                  <div class="card__sale">-20%</div>
                  <a href="#">
                    <div class="image-wrapper">
                      <img src="<?php echo get_template_directory_uri() ?>/img/product/image-1.jpg" width="345"
                        height="432" alt="product">
                    </div>
                  </a>
                  <div class="card__inner">
                    <p>DURANCE</p>
                    <p>250 мл</p>
                  </div>
                  <h3 class="card__title">Рефилл DURANCE "Hazelnut cookie" Ореховое печенье
                    с шоколадом</h3>
                </div>
                <div class="card__footer">
                  <p class="card__price"><span>2 999</span> ₽</p>
                  <a href="#" class="button">Купить</a>
                </div>
              </div>
            </li>
            <!-- 2 -->
            <li class="swiper-slide h-auto">
              <div class="card">
                <div>
                  <div class="card__sale">-90%</div>
                  <a href="#">
                    <div class="image-wrapper">
                      <img src="<?php echo get_template_directory_uri() ?>/img/product/image-2.jpg" width="345"
                        height="432" alt="product">
                    </div>
                  </a>
                  <div class="card__inner">
                    <p>CHIARA Firenze</p>
                    <p>250 мл</p>
                  </div>
                  <h3 class="card__title">Наполнитель для ароматического диффузора "TUSCIA" Вековая смола...</h3>
                </div>
                <div class="card__footer">
                  <p class="card__price"><span>3 490</span> ₽</p>
                  <a href="#" class="button">Купить</a>
                </div>
              </div>
            </li>
            <!-- 3 -->
            <li class="swiper-slide h-auto">
              <div class="card">
                <div>
                  <a href="#">
                    <div class="image-wrapper">
                      <img src="<?php echo get_template_directory_uri() ?>/img/product/image-3.jpg" width="345"
                        height="432" alt="product">
                    </div>
                  </a>
                  <div class="card__inner">
                    <p>Culti Milano</p>
                    <p>250 мл</p>
                  </div>
                  <h3 class="card__title">Рефилл для заправки диффузора CULTI Quercea 1000 мл.</h3>
                </div>
                <div class="card__footer">
                  <p class="card__price"><span>13 490</span> ₽</p>
                  <a href="#" class="button">Купить</a>
                </div>
              </div>
            </li>
            <!-- 4 -->
            <li class="swiper-slide h-auto">
              <div class="card">
                <div>
                  <a href="#">
                    <div class="image-wrapper">
                      <img src="<?php echo get_template_directory_uri() ?>/img/product/image-4.jpg" width="345"
                        height="432" alt="product">
                    </div>
                  </a>
                  <div class="card__inner">
                    <p>Voluspa</p>
                    <p>250 мл</p>
                  </div>
                  <h3 class="card__title">Ароматический диффузор
                    100 мл PANJORE LYCHEE "Панжерское личи"</h3>
                </div>
                <div class="card__footer">
                  <p class="card__price"><span>4 490</span> ₽</p>
                  <a href="#" class="button">Купить</a>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </div>
      <!-- /container -->
    </div>
  </section>

  <section class="category-section relative" data-scroll>
    <div class="container">

      <div class="category-section__header">
        <h2 class="title">Бренды</h2>
        <div class="swiper-button-wrapper">
          <div class="swiper-button-prev swiper-button-prev-brands"></div>
          <div class="swiper-button-next swiper-button-next-brands"></div>
        </div>
      </div>

      <div class="w-0 min-w-[100%] relative">
        <div class="brands-section-swiper swiper">
          <ul class="brands-wrapper swiper-wrapper justify-stretch">
            <!-- 1 -->
            <li class="swiper-slide h-auto">
              <a href="">
                <img src="<?php echo get_template_directory_uri() ?>/img/brands/image-1.png" width="177" height="177"
                  alt="image">
                <div class="brands-mask">Atmosphera</div>
              </a>
            </li>
            <!-- 2 -->
            <li class="swiper-slide h-auto">
              <a href="">
                <img src="<?php echo get_template_directory_uri() ?>/img/brands/image-1.png" width="177" height="177"
                  alt="image">
                <div class="brands-mask">Atmosphera</div>
              </a>
            </li>
            <!-- 3 -->
            <li class="swiper-slide h-auto">
              <a href="">
                <img src="<?php echo get_template_directory_uri() ?>/img/brands/image-1.png" width="177" height="177"
                  alt="image">
                <div class="brands-mask">Atmosphera</div>
              </a>
            </li>
            <!-- 4 -->
            <li class="swiper-slide h-auto">
              <a href="">
                <img src="<?php echo get_template_directory_uri() ?>/img/brands/image-1.png" width="177" height="177"
                  alt="image">
                <div class="brands-mask">Atmosphera</div>
              </a>
            </li>
            <!-- 5 -->
            <li class="swiper-slide h-auto">
              <a href="">
                <img src="<?php echo get_template_directory_uri() ?>/img/brands/image-1.png" width="177" height="177"
                  alt="image">
                <div class="brands-mask">Atmosphera</div>
              </a>
            </li>
            <!-- 6 -->
            <li class="swiper-slide h-auto">
              <a href="">
                <img src="<?php echo get_template_directory_uri() ?>/img/brands/image-1.png" width="177" height="177"
                  alt="image">
                <div class="brands-mask">Atmosphera</div>
              </a>
            </li>
          </ul>
        </div>
      </div>
      <!-- /container -->
    </div>
  </section>

  <section class="info" data-scroll>
    <div class="container">
      <h2 class="info__title">Торговый <span>дом 888</span></h2>
      <div class="border-left-block"></div>
      <p class="info__text">
        <strong>Мы предлагаем широкий ассортимент</strong> эксклюзивной парфюмерии и косметики от лучших мировых
        брендов.
        <strong>Наша миссия</strong> - помочь каждому найти свой уникальный аромат и стиль, который подчеркнет
        индивидуальность
        и характер. В нашем магазине представлены ароматы для мужчин, женщин и детей, а также широкий выбор
        косметических средств для ухода за кожей и волосами.
      </p>
      <a class="anim-button _anim-button" href="#">узнать подробнее</a>
    </div>
  </section>

  <section class="contacts" data-scroll>
    <div class="container">
      <h2 class="title title--mb">Контакты</h2>
      <div class="contacts__header">

        <div class="flex items-center gap-3 contacts__header-item">
          <div class="social-icon">
            <img src="<?php echo get_template_directory_uri() ?>/img/icons/pin-white.svg" width="20" height="20"
              alt="pin">
          </div>
          <p class="contacts__text">г. Находка, ул. ​Малиновского, 19а</p>
        </div>

        <div class="flex items-center gap-3 contacts__header-item">
          <div class="social-icon">
            <img src="<?php echo get_template_directory_uri() ?>/img/icons/phone-white.svg" width="20" height="20"
              alt="pin">
          </div>
          <a class="contacts__text" href="tel:+79999999999">+ 7 (999) 999-99-99</a>
        </div>

        <div class="flex items-center gap-3 contacts__header-item">
          <div class="social-icon">
            <img src="<?php echo get_template_directory_uri() ?>/img/icons/clock.svg" width="20" height="20" alt="pin">
          </div>
          <div>
            <p class="contacts__slim-text">Пн-пт: 10:00—19:00</p>
            <p class="contacts__slim-text">Сб-вс: 10:00—18:00</p>
          </div>
        </div>

        <div class="flex items-center gap-3 contacts__header-item">
          <div class="social-icon">
            <img src="<?php echo get_template_directory_uri() ?>/img/icons/whatsapp-white.svg" width="20" height="20"
              alt="pin">
          </div>
          <div>
            <a class="contacts__slim-text" href="https://wa.me/+79999999999">Написать на WhatsApp</a>
          </div>
        </div>

      </div>

      <div class="contact__map">
        <iframe
          src="https://yandex.ru/map-widget/v1/?ll=132.901462%2C42.835641&mode=search&ol=geo&ouri=ymapsbm1%3A%2F%2Fgeo%3Fdata%3DCgoxNDg5MzA5MTEwEmbQoNC-0YHRgdC40Y8sINCf0YDQuNC80L7RgNGB0LrQuNC5INC60YDQsNC5LCDQndCw0YXQvtC00LrQsCwg0YPQu9C40YbQsCDQnNCw0LvQuNC90L7QstGB0LrQvtCz0L4sIDE50JAiCg3G5gRDFbNXK0I%2C&z=17.05"
          width="100%" height="600" allowfullscreen="true"></iframe>
      </div>
    </div>
  </section>

</main>

<?php get_footer(); ?>