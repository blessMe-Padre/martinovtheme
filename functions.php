<?php

// правильный способ подключить стили и скрипты темы
add_action('wp_enqueue_scripts', 'theme_add_scripts');


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

    wp_enqueue_script_module('main', get_theme_file_uri('/main.js'));
}


if (class_exists('WooCommerce')) {
    require_once(get_template_directory() . '/woocommerse.php');
}
