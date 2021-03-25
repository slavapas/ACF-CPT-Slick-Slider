<?php

function theme_name_scripts()
{
    // ======= CSS======    
    wp_enqueue_style('css-slick-theme', get_template_directory_uri() . '/assets/css/slick-theme.css');
    wp_enqueue_style('css-slickslider', get_template_directory_uri() . '/assets/css/slick.css');
    wp_enqueue_style('css-slickslider-theme', get_template_directory_uri() . '/assets/css/slick-theme.css');
    // css default 
    wp_enqueue_style('css-mystyle', get_stylesheet_uri());

    // ====== JS =========    
    // wp_deregister_script('jquery');
    // wp_register_script('jquery', get_template_directory_uri() . '/assets/js/jquery-3.2.1.min.js', [], null, true);
    // wp_enqueue_script('jquery');
    wp_enqueue_script('js-slickslider', get_template_directory_uri() . '/assets/js/slick.min.js', ['jquery'], NULL, true);
    wp_enqueue_script('js-myscript', get_template_directory_uri() . '/assets/js/myscript.js', ['js-slickslider'], NULL, true);


    // wp_enqueue_script( 'script-name', get_template_directory_uri() . '/js/$examplejs', array($DEPENDENCY), '1.0.0', $TRUE_or_FAULSE );
}

// правильный способ подключить стили и скрипты
add_action('wp_enqueue_scripts', 'theme_name_scripts');


add_theme_support('post-thumbnails');
// add image size
add_image_size('slides', 1200, 700, true);
