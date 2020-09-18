<?php
/**
 * widget-recent-projects.php
 *
 * Plugin Name: Bootstrap_Widget_Recent_Projects
 * Plugin URI: http://gusevdigital.com
 * Description: A widget that display the thumbnails of recent projects.
 * Version: 1.0
 * Author: Denis Gusev
 * Author URI: http://gusevdigital.com
*/

class Bootstrap_Widget_Recent_Projects extends WP_Widget {
  /* Widget name, description, class name. */
  /* Initialize the widget. */
  public function __construct() {
    parent::__construct(
      /* id */
      'bootstrap-recent-projects',
      /* title */
      __( 'Bootstrap Recent Projects', 'bootstrap' ),
      array(
        'classname' => 'recent-projects',
        'description' => __( 'A custom widget that displays the 6 most recent projects', 'bootstrap' )
      )
    );
  }

  /* Generate the back-end layout for the widget. */
  /* Check this layout out on the Widgets page */
  public function form( $instance ) {
      /* Defaults */
      $defaults = array(
        'title' => 'Recent Projects'
      );

      $instance = wp_parse_args ( (array) $instance, $defaults );?>
      <p>
        <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title', 'bootstrap' ); ?></label>
        <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>">
      </p>

      <?php
  }

  /* Process the widget's values */
  /* Initialized when you save the widget */
  public function update( $new_instance, $old_instance ) {
    $instance = $old_instance;

    /* Update values */
  //  $instance[ 'title' ] = strip_tags( stripslashes( $new_instance[ 'title' ] ) ;
    $instance['title'] = ( !empty( $new_instance['title'] ) ) ? strip_tags( stripslashes( $new_instance['title'] ) ) : '';

    return $instance;
  }

  /* Output the content of the widget */
  public function widget( $args, $instance ) {
    extract( $args );

    $title = apply_filters( 'widget_title', $instance['title'] );

    /* Display the markup before the widget */
    echo $before_widget;

    if ( $title ) {
      echo $before_title . $title . $after_title;
    }

    /* Create the custom query and get the most recent 6 projecets. */
    $queryArgs = array(
      'orderby' => 'date',
      'posts_per_page' => 6
    );
    $query = new WP_Query( $queryArgs );

    if ( $query->have_posts() ) : ?>
      <div class="row recent-projects">
        <?php while ( $query->have_posts() ) : $query->the_post(); ?>
          <div class="col-6 col-lg-4">
            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
              <?php the_post_thumbnail( 'large', array( 'class' => 'img-fluid rounded shadow-sm' ) ); ?>
            </a>
          </div>
        <?php endwhile; ?>
      </div>
    <?php endif;

    echo $after_widget;
  }
}


/* Register the widget and load it */
if( class_exists('Bootstrap_Widget_Recent_Projects') ) {
  function register_bootstrap_widget_recent_projects() {
    register_widget( "Bootstrap_Widget_Recent_Projects" );
  }
  add_action( 'widgets_init', 'register_bootstrap_widget_recent_projects' );
}
?>
