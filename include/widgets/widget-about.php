<?php
/**
 * widget-about.php
 *
 * Plugin Name: Bootstrap_Widget_About
 * Plugin URI: http://gusevdigital.com
 * Description: A widget that displays "about" block.
 * Version: 1.0
 * Author: Denis Gusev
 * Author URI: http://gusevdigital.com
*/

class Bootstrap_Widget_About extends WP_Widget {


   public function scripts( ) {
     wp_enqueue_script( 'media-upload' );
     wp_enqueue_media();
     wp_enqueue_script('our_admin', JS . '/admin.js', array('jquery'));
   }

  /* Widget name, description, class name. */
  /* Initialize the widget. */
  public function __construct() {

    // Add Widget scripts
     add_action('admin_enqueue_scripts', array($this, 'scripts'));

    parent::__construct(
      /* id */
      'bootstrap-about',
      /* title */
      __( 'Bootstrap About', 'bootstrap' ),
      array(
        'classname' => 'bootstrap-about',
        'description' => __( 'A widget that displays "about" block.', 'bootstrap' )
      )
    );
  }

  /* Generate the back-end layout for the widget. */
  /* Check this layout out on the Widgets page */
  public function form( $instance ) {
      /* Defaults */
      $defaults = array(
        'title' => 'About Me',
        'image' => '',
        'name' => 'Your Name',
        'desc' => 'I’m an awesome Digital Marketing Specialist with a huge portfolio and experience behind my back.'
      );

      $instance = wp_parse_args ( (array) $instance, $defaults );?>
      <p>
        <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'bootstrap' ); ?></label>
        <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>">
      </p>
      <p>
        <label for="<?php echo $this->get_field_id( 'image' ); ?>"><?php _e( 'Image:', 'bootstrap' ); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'image' ); ?>" name="<?php echo $this->get_field_name( 'image' ); ?>" type="text" value="<?php echo esc_url( $instance['image'] ); ?>" />
        <button class="upload_image_button button button-primary"><?php _e( 'Upload Image', 'bootstrap' ); ?></button>
     </p>
     <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'name' ) ); ?>"><?php echo esc_html__( 'Name:', 'bootstrap' ); ?></label>
        <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'name' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'name' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['name'] ); ?>">
    </p>
    <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'desc' ) ); ?>"><?php echo esc_html__( 'Text:', 'bootstrap' ); ?></label>
        <textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'desc' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'desc' ) ); ?>" type="text" cols="30" rows="10"><?php echo esc_attr( $instance['desc'] ); ?></textarea>
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
    $instance['image'] = ( !empty( $new_instance['image'] ) ) ? strip_tags( stripslashes( $new_instance['image'] ) ) : '';
    $instance['name'] = ( !empty( $new_instance['name'] ) ) ? strip_tags( stripslashes( $new_instance['name'] ) ) : '';
    $instance['desc'] = ( !empty( $new_instance['desc'] ) ) ? strip_tags( stripslashes( $new_instance['desc'] ) ) : '';

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
    ?>
    <div class="media">
      <img class="mr-3 rounded-circle" src="<?php echo $instance[ 'image' ]; ?>" alt="<?php echo $instance[ 'name' ]; ?>">
      <div class="media-body">
        <h5 class="mt-0"><?php echo $instance[ 'name' ]; ?></h5>
        <?php echo $instance[ 'desc' ]; ?>
      </div>
    </div>
    <?php

    echo $after_widget;
  }
}


/* Register the widget and load it */
if( class_exists('Bootstrap_Widget_About') ) {
  function register_bootstrap_widget_about() {
    register_widget( "Bootstrap_Widget_About" );
  }
  add_action( 'widgets_init', 'register_bootstrap_widget_about' );
}
?>
