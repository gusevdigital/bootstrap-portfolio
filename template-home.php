<?php
/*
# ===================================================
# template-home.php
#
# Template Name: Homepage
# ===================================================
*/
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
          <h1 class="display-4"><?php _e( 'Hello, my name is Denis Gusev', 'bootstrap' ); ?></h1>
          <p class="lead">
            <?php _e( 'I make awesome websites!', 'bootstrap' ); ?>
          </p>
        </div> <!-- end jumbotron -->
      </div> <!-- end col -->
    </div> <!-- end row -->
  </div> <!-- end container -->
</section> <!-- end section -->

<!-- Filterable Portfolio -->
<section id="portfolio" class="portfolio-filterable">
  <div class="container-fluid">
    <div class="row mb-50">
      <div class="col-lg-12">
        <div class="nav nav-pills portfolio-filter">
          <span class="portfolio-title"><?php _e( 'Filter by:', 'bootstrap' ); ?></span>
          <a class="nav-link active" href="#filter-all" data-filter="*" title="Filter All"><?php _e( 'All', 'bootstrap' ); ?></a>
          <?php
            $args = array(
              'orderby' => 'name',
              'order' => 'ASC',

              'hide_empty' => true,
              /* Exclude not_categorised category */
              'exclude' => '1'
            );

            $categories = get_categories ( $args );
            foreach ($categories as $category) {
              ?>
              <a class="nav-link" href="#filter-<?php echo $category->slug; ?>" data-filter=".<?php echo $category->slug; ?>" title="Filter <?php echo $category->name; ?>"><?php echo $category->name; ?> (<?php echo $category->count; ?>)</a>
              <?php
            }
          ?>
        </div>
      </div> <!-- end col -->
    </div> <!-- end row -->
    <div class="row portfolio-items mb-50">
      <?php
        $queryArgs = array(
          /* No uncategorized */
          'cat' => '-1',
          /* Get all posts */
          'posts_per_page' => '-1'
        );
        $query = new WP_Query( $queryArgs );
      ?>
      <?php if ( $query->have_posts() ) : while( $query->have_posts() ) : $query->the_post(); ?>
        <?php if ( has_post_thumbnail() ) : ?>
          <?php
            /* Collect all post categories */
            $slugs = '';
            $currentCategories = get_the_category();

            foreach ($currentCategories as $currentCategory) {
              $slugs .= ' ' . $currentCategory -> slug;
            }
          ?>
          <figure class="col-sm-6 col-lg-4 portfolio-item<?php echo $slugs; ?>">
  					<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
              <?php the_post_thumbnail( 'portfolio-thumbnail', array( 'class' => 'img-fluid' ) ); ?>
  					</a>
  				</figure>
        <?php endif; ?>
      <?php endwhile; ?>
      <?php endif; ?>
    </div> <!-- end row -->

  </div> <!-- end container -->
</section> <!-- end section -->

<?php
  /* Load footer.php */
  get_footer();
?>
