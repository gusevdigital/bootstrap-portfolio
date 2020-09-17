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
/* 3. ADD BOOTSTRAP CLASSES TO MENU */
/* -------------------------------------------------- */
// Add class to A element of .primary-menu
function bootstrap_primary_menu_anchor_class($item_output, $item, $depth, $args) {
    $item_output = preg_replace('/<a /', '<a class="nav-link" ', $item_output, 1);
    return $item_output;
}
add_filter('walker_nav_menu_start_el', 'bootstrap_primary_menu_anchor_class', 10, 4);

// Add class to LI element of .primary-menu
function bootstrap_primary_menu_li_class($objects, $args) {
    foreach($objects as $key => $item) {
      $objects[$key]->classes[] = 'nav-item';
    }
    return $objects;
}
add_filter('wp_nav_menu_objects', 'bootstrap_primary_menu_li_class', 10, 2);

// Add active class to current-page-menu-items
add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);

function special_nav_class ($classes, $item) {
  if (in_array('current-menu-item', $classes) ){
    $classes[] = 'active ';
  }
  return $classes;
}



/* -------------------------------------------------- */
/* 4. GET POST META */
/* -------------------------------------------------- */
if ( ! function_exists( 'bootstrap_post_meta' ) ) {
  function bootstrap_post_meta() {
    if ( get_post_type() === 'post' ) {
      /* Post author */
      echo '<p class="post-meta">';
      _e( 'by', 'bootstrap' );
      printf (' <a href="%1$s" rel="author" class="link">%2$s</a> ', esc_url( get_author_posts_url( get_the_author_meta( 'ID'))), get_the_author() );
      _e( 'on', 'bootstrap' );
      echo ' <span>' . get_the_date() . '</span></p>';
    }
  }
}



/* -------------------------------------------------- */
/* 5. NUMBERED PADINATION */
/* -------------------------------------------------- */
if ( ! function_exists( 'bootstrap_numbered_pagination' ) ) {
  function bootstrap_numbered_pagination() {

    /* Have custom markup for pagination, so define some arguements first */
    $args = array (
      /* Don't need previous or next links */
      'prev_next' => false,
      /* There are more type: list and playing (jsut strings of number) */
      /* Use array if need to go through each one with custom markup */
      'type' => 'array',
      'before_page_number' => '<span class="page-link">',
      'after_page_number' => '</span>'
    );

    /* paginate_links() - wordpress function */
    echo '<div class="col-12"><nav aria-label="Page navigation example">';
    $pagination = paginate_links( $args );
    if ( is_array( $pagination ) ) {
      echo '<ul class="pagination">';
      foreach ($pagination as $page) {
        /* find where the word "current" is located in the array of pages */
        if ( strpos( $page, 'current' ) ) {
          echo '<li class="page-item active">' . $page  . '</li>';
        } else {
          echo '<li class="page-item">'.  $page  . '</li>';
        }
      }
      echo '</ul>';
    }
    echo '</nav></div>';
  }
}



/* -------------------------------------------------- */
/* 6. REGISTER WIDGET AREA */
/* -------------------------------------------------- */
if ( ! function_exists( 'bootstrap_widget_init' ) ) {
  function bootstrap_widget_init() {
    /* Check if current version of WordPress supports sidebar */
    if ( function_exists( 'register_sidebar' ) ) {
      register_sidebar( array(
        'name' => __( 'Main Widget Area', 'bootstrap' ),
        'id' => 'main-sidebar',
        'description' => __( 'Appears in the blog pages', 'bootstrap' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div><!-- end widget -->',
        'before_title' => '<h2>',
        'after_title' => '</h2>'
      ));
    }
  }
  add_action ( 'widgets_init', 'bootstrap_widget_init' );
}



/* -------------------------------------------------- */
/* 7. SCRIPTS */
/* -------------------------------------------------- */
if ( ! function_exists( 'bootstrap_scripts' ) ) {
  function bootstrap_scripts() {
    /* Register scripts. */
    /* wp_register_script( string $handle, string|bool $src, string[] $deps = array(), string|bool|null $ver = false, bool $in_footer = false ) */
    wp_register_script ( 'bootstrap-js', THEMEROOT . '/bower_components/bootstrap/dist/js/bootstrap.min.js', array( 'jquery' ), false, true);
    wp_register_script ( 'isotope-js', THEMEROOT . '/bower_components/isotope-layout/dist/isotope.pkgd.min.js', array( 'jquery' ), false, true);
    wp_register_script ( 'main-js', JS . '/main.js', false, false, true);

    /* Load the custom scripts */
    wp_enqueue_script ( 'bootstrap-js' );
    wp_enqueue_script ( 'isotope-js' );
    wp_enqueue_script ( 'main-js' );

    /* Load the stylesheets. */
    wp_enqueue_style( 'bootstrap-css', THEMEROOT . '/bower_components/bootstrap/dist/css/bootstrap.min.css' );
    wp_enqueue_style( 'theme-css', THEMEROOT . '/css/theme.min.css' );
  }
  add_action ( 'wp_enqueue_scripts', 'bootstrap_scripts' );
}


?>
