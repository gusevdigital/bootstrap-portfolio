<?php
/*
# ===================================================
# index.php
#
# The main template file.
# ===================================================
*/

/* Load header.php */
get_header();
?>

<section id="intro">
  <div class="container text-center">
    <div class="row">
      <div class="col-lg-12">
        <div class="jumbotron py-100 pt-lg-200">
          <h1 class="display-4"><?php _e( 'This is blog', 'bootstrap' ); ?></h1>
          <p class="lead">
            My thoughts on and off the web!
            <?php _e( 'My thought on and off the web!', 'bootstrap' ); ?>
          </p>
        </div> <!-- end jumbotron -->
      </div> <!-- end col -->
    </div> <!-- end row -->
  </div> <!-- end container -->
</section> <!-- end section -->
<section id="blog-posts">
  <div class="container-fluid mb-50">
    <div class="row">
      <aside class="col-lg-3 offset-lg-1 sidebar order-lg-2">
        sidebar here
        <!-- <div class="widget">
          <h2>About Me</h2>
          <div class="media">
            <img class="mr-3 rounded-circle" src="https://images.unsplash.com/photo-1503023345310-bd7c1de61c7d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=80&h=80&q=80" alt="Denis Gusev">
            <div class="media-body">
              <h5 class="mt-0">Denis Gusev</h5>
              I'm an awesome Digital Marketing Specialist with a huge portfolio and experience behind my back.
            </div>
          </div>
        </div>
        <div class="widget">
          <h2>Recent Posts</h2>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">
              <a href="#" class="link">Recent Post 1</a>
            </li>
            <li class="list-group-item">
              <a href="#" class="link">Recent Post 2</a>
            </li>
            <li class="list-group-item">
              <a href="#" class="link">Recent Post 3</a>
            </li>
            <li class="list-group-item">
              <a href="#" class="link">Recent Post 4</a>
            </li>
          </ul>
        </div> -->
      </aside>
      <div class="col-lg-8 posts order-lg-1">
        <div class="row">
          <?php if ( have_posts() ) : while( have_posts() ) : the_post(); ?>
              <?php get_template_part( 'content', get_post_format() ); ?>
          <?php endwhile; ?>

          <?php else : ?>
            <?php get_template_part( 'content', 'none' ); ?>
          <?php endif; ?>

          <?php
            /* Load numbered pagination */
            bootstrap_numbered_pagination();
          ?>
        </div>
      </div>
    </div> <!-- end row -->
  </div> <!-- end container-fluid -->
</section> <!-- end section -->

<?php
  /* Load footer.php */
  get_footer();
?>
