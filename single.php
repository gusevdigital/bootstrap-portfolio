<?php
/*
# ===================================================
# single.php
#
# The single post template file.
# ===================================================
*/

/* Load header.php */
get_header();
?>


<?php if ( have_posts() ) : while( have_posts() ) : the_post(); ?>
  <section id="intro">
    <div class="container-fluid text-center">
      <div class="row">
        <div class="col-lg-12">
          <div class="jumbotron py-100 pt-lg-200">
            <h1 class="display-4"><?php the_title(); ?></h1>
          </div> <!-- end jumbotron -->
          <div class="jumbotron pb-50">
            <?php if ( has_post_thumbnail () ) : ?>
              <?php the_post_thumbnail( 'full', array( 'class' => 'img-fluid mx-auto d-block' ) ); ?>
            <?php endif; ?>
          </div> <!-- end jumbotron -->
        </div> <!-- end col -->
      </div> <!-- end row -->
    </div> <!-- end container -->
  </section> <!-- end section -->
  <div class="single-post container-fluid">
    <div class="row">
      <div class="col-lg-8 offset-lg-2">
        <article class="post-excerpt">
          <header class="pb-50">
            <?php
              bootstrap_post_meta();
            ?>
          </header>
          <?php the_content(); ?>
        </article> <!-- end post article -->
      </div> <!-- end col -->
    </div> <!-- end row -->
  </div> <!-- end single-post container -->
<?php endwhile; ?>

<?php else : ?>
  <?php _e( 'Oops, it seems there is nothing here.', 'bootstrap' ); ?>
<?php endif; ?>


<?php
  /* Load footer.php */
  get_footer();
?>
