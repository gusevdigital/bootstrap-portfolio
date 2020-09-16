<?php
/*
# ===================================================
# index.php
#
# The main template file.
# ===================================================
*/

/* -------------------------------------------------- */
/* 1. CONSTANTS */
/* -------------------------------------------------- */
define ('THEMEROOT', get_stylesheet_directory_uri() );
// get_stylesheet_directory_uri returns the url of style.css
define ( 'IMAGES', THEMEROOT . '/img' );
define ( 'JS', THEMEROOT . '/js' );



/* -------------------------------------------------- */
/* 2. THEME SETUP */
/* -------------------------------------------------- */
if ( ! function_exists('bootstrap_theme_setup') ) {
  function bootstrap_theme_setup() {
    /* Make the theme available for translation */
    $lang_dir = THEMEROOT . 'languages';
    load_theme_textdomain ( 'bootstrap', $lang_dir );

    /* Add support for automatic feed links */
    add_theme_support( 'automatic-feed-links' );

    /* Add support for post thumgnails */
    add_theme_support ( 'post_thumbnails' );

    /* Register nav menu */
    register_nav_menus( array(
      'main-menu' => __( 'Main Menu', 'bootstrap' )
    ) );
  }

  add_action( 'after_setup_theme', 'bootstrap_theme_setup' );
}


?>
