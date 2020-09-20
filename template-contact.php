<?php
/*
# ===================================================
# template-contact.php
#
# Template Name: Contact
# ===================================================
*/
?>

<?php
  $errors = array();
  $isError = false;

  $errorName = __( 'Please enter your name', 'bootstrap' );
  $errorEmail = __( 'Please enter your email', 'bootstrap' );
  $errorMessage = __( 'Please enter your message', 'bootstrap' );

  /* Get the posted values and validate them */
  if ( isset( $_POST[ 'is-submitted' ] ) ) {
    $name = $_POST[ 'cName' ];
    $email = $_POST[ 'cEmail' ];
    $message = $_POST[ 'cMessage' ];

    /* Check the name */
    if ( ! bootstrap_validate_length( $name, 2 ) ) {
      $isError = true;
      $errors[ 'errorName' ] = $errorName;
    }

    /* Check email */
    if ( ! is_email( $email ) ) {
      $isError = true;
      $errors[ 'errorEmail' ] = $errorEmail;
    }

    /* Check the message */
    if ( ! bootstrap_validate_length( $message, 2 ) ) {
      $isError = true;
      $errors[ 'errorMessage' ] = $errorMessage;
    }

    if (! $isError ) {
      /* Get admin email */
      $emailReceiver = get_option( 'admin_email' );

      $emailSubject = sprintf( __( 'You have been contacted by %s', 'bootstrap' ), $name );
      $emailBody = sprintf( __( 'You have been contacted by %s. Their message is:', 'bootstrap' ), $name ) . PHP_EOL . PHP_EOL;
      $emailBody .= $message . PHP_EOL . PHP_EOL;
      $emailBody .= sprintf( __( 'You can contact %1$s via email at %2$s', 'bootstrap' ), $name, $email ) .PHP_EOL . PHP_EOL;

      $emailHeaders[] = "Reply-To: $email" . PHP_EOL;

      $emailIsSent = wp_mail ( $emailReceiver, $emailSubject, $emailBody, $emailHeaders );
    }
  }
?>

<?php
/* Load header.php */
get_header();
?>
<section id="intro">
  <div class="container text-center">
    <div class="row">
      <div class="col-lg-12">
        <div class="jumbotron py-100 pt-lg-200">
          <h1 class="display-4"> <?php _e( 'Thanks for getting in touch', 'bootstrap' ); ?></h1>
          <p class="lead">
            <?php _e( 'I can\'t wait to hear from you!', 'bootstrap' ); ?>
          </p>
        </div>
      </div>
    </div>
  </div>
</section>
<section>
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-6 offset-lg-3">
        <?php if ( isset( $emailIsSent ) && $emailIsSent ) : ?>
          <div class="alert alert-success" role="alert">
            <?php _e( 'Your message has been successfully sent, thank you!', 'bootstrap' ); ?>
          </div> <!-- end alert -->
        <?php else : ?>
          <p>
            <?php _e( 'I\'m so happy you decided to contact me! I\'ll get back to you in a business day!', 'bootstrap' ); ?>
          </p>
          <?php if ( isset( $emailIsSent) && ! $emailIsSent) : ?>
            <div class="alert alert-danger" role="alert">
              <?php _e( 'Sorry, it seems there was a problem with sending your email.', 'bootstrap' ); ?>
            </div> <!-- end alert -->
          <?php elseif ( isset( $isError ) && $isError ) : ?>
            <div class="alert alert-danger" role="alert">
              <?php _e( 'Sorry, it seems there was an error.', 'bootstrap' ); ?>
            </div> <!-- end alert -->
          <?php endif; ?>
          <form class="contact-form" action="<?php the_permalink(); ?>" method="post" novalidate>
            <div class="form-group">
              <label for="contact-name"><?php _e( 'Your name *', 'bootstrap' ); ?></label>
              <input type="text" name="cName" class="form-control<?php if( isset( $errors[ 'errorName' ] ) ) echo ' is-invalid';?>" id="contact-name" placeholder="<?php _e( 'Enter your name', 'bootstrap' ); ?>" value="<?php if ( isset( $_POST[ 'cName' ] ) ) echo $_POST[ 'cName' ]; ?>" />
              <?php if( isset( $errors[ 'errorName' ] ) ) : ?>
                <div class="invalid-feedback">
                  <?php echo $errors[ 'errorName' ]; ?>
                </div>
              <?php endif; ?>
            </div> <!-- end form-group -->
            <div class="form-group">
              <label for="contactEmail"><?php _e( 'Your Email *', 'bootstrap' ); ?></label>
              <input type="email" name="cEmail" class="form-control<?php if( isset( $errors[ 'errorEmail' ] ) ) echo ' is-invalid'; ?>" id="contactEmail" placeholder="<?php _e( 'Enter your email', 'bootstrap' ); ?>" value="<?php if ( isset( $_POST[ 'cEmail' ] ) ) echo $_POST[ 'cEmail' ]; ?>"/>
              <?php if( isset( $errors[ 'errorEmail' ] ) ) : ?>
                <div class="invalid-feedback">
                  <?php echo $errors[ 'errorEmail' ]; ?>
                </div>
              <?php endif; ?>
            </div>
            <div class="form-group">
              <label for="contactMessage"><?php _e( 'Your message *', 'bootstrap' ); ?></label>
              <textarea name="cMessage" class="form-control<?php if ( isset( $errors[ 'errorMessage' ] ) ) echo ' is-invalid'; ?>" id="contactMessage" rows="3"><?php if ( isset( $_POST[ 'cMessage' ] ) ) echo $_POST[ 'cMessage' ]; ?></textarea>
              <?php if( isset( $errors[ 'errorMessage' ] ) ) : ?>
                <div class="invalid-feedback">
                  <?php echo $errors[ 'errorMessage' ]; ?>
                </div>
              <?php endif; ?>
            </div>
            <input type="hidden" name="is-submitted" id="is-submitted" value="true" />
            <button type="submit" class="btn btn-primary text-white"><?php _e( 'Submit', 'bootstrap' ); ?></button>
          </form> <!-- end form -->
        <?php endif; ?>
      </div> <!-- end col -->
    </div> <!-- end row -->
  </div> <!-- end container -->
</section> <!-- end section -->

<?php
  /* Load footer.php */
  get_footer();
?>
