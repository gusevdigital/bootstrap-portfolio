<?php
/*
# ===================================================
# content.php
#
# The default template for displaying content.
# ===================================================
*/
?>
<div id="post-<?php the_ID(); ?>" <?php post_class( 'post col-md-6'); ?>>
  <?php if ( has_post_thumbnail () ) : ?>
    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="post-thumbnail">
      <?php the_post_thumbnail( 'full', array( 'class' => 'img-responsive' ) ); ?>
      <img class="img-fluid" src="https://images.unsplash.com/photo-1470071459604-3b5ec3a7fe05?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=800&h=600&q=80" />
    </a>
  <?php endif; ?>
  <article class="post-excerpt">
    <header>
      <?php
        /* Display the title in a link */
        echo '<a href="' . get_the_permalink() .'"><h3>' .get_the_title() . '</h3></a>';
      ?>
      <p class="post-meta">
        by <a href="#" class="link">Denis Gusev</a> on <span>14.09.2020</span>
      </p>
    </header>
    <p>
      "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
    </p>
  </article>
</div>
