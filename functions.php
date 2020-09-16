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
    /* Use filter to apply thumbnails only to chosen post types */
    add_theme_support( 'post-thumbnails', apply_filters( 'pagelines_post-thumbnails', array('post') ) );

    /* Register nav menu */
    register_nav_menus( array(
      'main-menu' => __( 'Main Menu', 'bootstrap' )
    ) );
  }

  add_action( 'after_setup_theme', 'bootstrap_theme_setup' );
}



/* -------------------------------------------------- */
/* 3. GET POST META */
/* -------------------------------------------------- */
if ( ! function_exists( 'bootstrap_post_meta' ) ) {
  function bootstrap_post_meta() {
    if ( get_post_type() === 'post' ) {
      /* Post author */
      echo '<p class="post-meta">';
      _e( 'by', 'bootstrap' );
      printf (' <a href="%1$s" rel="athor">%2$s</a> ', esc_url( get_author_posts_url( get_the_author_meta( 'ID'))), get_the_author() );
      _e( 'on', 'bootstrap' );
      echo ' <span>' . get_the_date() . '</span></p>';
    }
  }
}



/* -------------------------------------------------- */
/* 3. NUMBERED PADINATION */
/* -------------------------------------------------- */
if ( ! function_exists( 'bootstrap_numbered_pagination' ) ) {
  function bootstrap_numbered_pagination() {

    /* Have custom markup for pagination, so define some arguements first */
    $args = array (
      /* Don't need previous or next links */
      'prev_next' => false,
      /* There are more type: list and playing (jsut strings of number) */
      /* Use array if need to go through each one with custom markup */
      'type' => 'array'
    );

    /* paginate_links() - wordpress function */
    echo '<div class="col-12"><nav aria-label="Page navigation example">';
    $pagination = paginate_links( $args );

    if ( is_array( $pagination ) ) {
      echo '<ul class="pagination">';
      foreach ($pagination as $page) {
        /* find where the word "current" is located in the array of pages */
        if ( strpos( $page, 'current' ) ) {
          echo '<li class="page-item active"><a class="page-link" href="#">' . $page . '</a></li>';
        } else {
          echo '<li class="page-item"><a class="page-link" href="#">'. $page . '</a></li>';
        }
      }
      echo '</ul>';
    }
    echo '</nav></div>';
  }
}

?>
