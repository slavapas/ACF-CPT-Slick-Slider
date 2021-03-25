"# slick-slider" 

Main files where the code is
- functions.php
- templates_parts/slickslider.php
- page.php
- myscript.js

Plugins to be installed
- CPT UI
- ACF Pro

functions.php
===============


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



slickslider.php
=================

<?php

// WP_Query arguments
$args = array(
  'post_type' => array('slider'),
);
$myposts = get_posts($args); ?>

<?php foreach ($myposts as $post) : setup_postdata($post); ?>
  <section class="dev-slider-wrppr">
    <div class="dev-slider-row">
      <div class="slider-for">
        <?php if (have_rows('slider_content')) : ?>
          <?php while (have_rows('slider_content')) : the_row(); ?>
            <?php
            $slideimage = get_sub_field('slider_image');
            $slidetitle = get_sub_field('slider_title');
            $slidebodycopy = get_sub_field('slider_body_copy'); ?>
            <div class="slick-container">
              <h4 class="info-title text-center"><?php echo $slidetitle; ?></h4>
              <p class="description"><?php echo $slidebodycopy; ?></p>
              <img src="<?php echo $slideimage['url']; ?>" alt="<?php echo $slideimage['alt']; ?>" />
            </div>
          <?php endwhile; ?>
        <?php endif; ?>
      </div>
  </section>
<?php endforeach; ?>





page.php
================

<?php get_header(); ?>
<?php get_template_part('template-parts/slickslider'); ?>
<?php get_footer(); ?>





myscript.js
================

jQuery(document).ready(function(){
  jQuery('.slider-for').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    dots: true,
    arrows: true,
    autoplay: true
    
  });
});


