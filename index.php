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
          <!--
          <div class="col-lg-6 post">
            <a href="#" class="img-modal" title="Some really cool article">
              <img class="img-fluid" src="https://images.unsplash.com/photo-1470071459604-3b5ec3a7fe05?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=800&h=600&q=80" />
            </a>
            <article class="post-excerpt">
              <header>
                <a href="#">
                  <h3>
                    Hello World
                  </h3>
                </a>
                <p class="post-meta">
                  by <a href="#" class="link">Denis Gusev</a> on <span>14.09.2020</span>
                </p>
              </header>
              <p>
                "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
              </p>
            </article>
          </div>
          <div class="col-lg-6 post">
            <a href="#" class="img-modal" title="Some really cool article">
              <img class="img-fluid" src="https://images.unsplash.com/photo-1447752875215-b2761acb3c5d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=800&h=600&q=80" />
            </a>
            <article class="post-excerpt">
              <header>
                <a href="#">
                  <h3>
                    Hello World
                  </h3>
                </a>
                <p class="post-meta">
                  by <a href="#" class="link">Denis Gusev</a> on <span>14.09.2020</span>
                </p>
              </header>
              <p>
                "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
              </p>
            </article>
          </div>
          <div class="col-lg-6 post">
            <a href="#" class="img-modal" title="Some really cool article">
              <img class="img-fluid" src="https://images.unsplash.com/photo-1474524955719-b9f87c50ce47?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=800&h=600&q=80" />
            </a>
            <article class="post-excerpt">
              <header>
                <a href="#">
                  <h3>
                    Hello World
                  </h3>
                </a>
                <p class="post-meta">
                  by <a href="#" class="link">Denis Gusev</a> on <span>14.09.2020</span>
                </p>
              </header>
              <p>
                "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
              </p>
            </article>
          </div>
          <div class="col-lg-6 post">
            <a href="#" class="img-modal" title="Some really cool article">
              <img class="img-fluid" src="https://images.unsplash.com/photo-1482192505345-5655af888cc4?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=800&h=600&q=80" />
            </a>
            <article class="post-excerpt">
              <header>
                <a href="#">
                  <h3>
                    Hello World
                  </h3>
                </a>
                <p class="post-meta">
                  by <a href="#" class="link">Denis Gusev</a> on <span>14.09.2020</span>
                </p>
              </header>
              <p>
                "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
              </p>
            </article>
          </div>

          <div class="col-12">
            <ul class="nav nav-pills">
              <li role="presentation" class="active">
                <a href="#">1</a>
              </li>
              <li role="presentation">
                <a href="#">2</a>
              </li>
              <li role="presentation">
                <a href="#">3</a>
              </li>
            </ul>
          </div>

-->

        </div>
      </div>
    </div>
  </div>
</section>
