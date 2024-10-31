<?php

// правильный способ подключить стили и скрипты темы
add_action('wp_enqueue_scripts', 'theme_add_scripts');

// подключение и настройка меню через админку
add_action('after_setup_theme', 'add_menu');

function theme_add_scripts()
{
    // подключаем стили
    wp_enqueue_style('baguetteBox-css', get_template_directory_uri() . '/vendor/baguetteBox.min.css');

    // подключаем основной файл стилей темы
    wp_enqueue_style('style', get_stylesheet_uri(), '', '1.0.3');

    //---------------------------------------------------------------------------------------------------------------------------------------------
    wp_enqueue_script('baguetteBox', get_template_directory_uri() .
        '/vendor/baguettebox.js', false, null, 'footer');

    wp_enqueue_script('swiper', get_template_directory_uri() .
        '/vendor/swiper-bundle.min.js', false, null, 'footer');

    wp_enqueue_script('smoothscroll', get_template_directory_uri() .
        '/vendor/smoothscroll.js', false, null, 'footer');

    wp_enqueue_script('get', get_theme_file_uri('/get.js'));
    wp_enqueue_script_module('main', get_theme_file_uri('/main.js'));
}

// функция для добавления меню
function add_menu()
{
    register_nav_menu('brands', 'меню брендов на странице архивов');
}


if (class_exists('WooCommerce')) {
    require_once(get_template_directory() . '/woocommerse.php');
}

if (class_exists('WooCommerce')) {
    require_once(get_template_directory() . '/woocommerse-functions/filters.php');
}
