<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

  <section class="block-filter">
    <div class="container-fluid">
      <form action="#" id="filter_posts">

        <?php if ($categories): ?>
          <div class="filter-list">
            <ul>
              <li>
                <input type="radio" name="category" data-url="<?= get_permalink() ?>" value="<?php /*echo implode(',', wp_list_pluck($categories, 'term_id'))*/ ?>" id="category-all" checked />
                <label for="category-all"><?= mb_strtoupper(__('All', 'WSC')) ?></label>
              </li>

              <?php foreach ($categories as $term): ?>
                <li>
                  <input type="radio" name="category" data-url="<?= get_term_link($term->term_id) ?>" value="<?= $term->term_id ?>" id="category-<?= $term->term_id ?>" />
                  <label for="category-<?= $term->term_id ?>"><?= mb_strtoupper($term->name) ?></label>
                </li>
              <?php endforeach ?>
              
            </ul>
          </div>
        <?php endif ?>
        
        <div class="sort">
          <div class="dropdown">
            <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"><?= mb_strtoupper(__('Sort By', 'WSC')) ?></button>
            <div class="dropdown-menu">
              <ul>
                <li>
                  <input type="radio" name="sort" value="DESC" id="sort1" />
                  <label for="sort1"><?= mb_strtoupper(__('Newest', 'WSC')) ?></label>
                </li>
                <li>
                  <input type="radio" name="sort" value="ASC" id="sort2" />
                  <label for="sort2"><?= mb_strtoupper(__('Oldest', 'WSC')) ?></label>
                </li>
              </ul>
              <button class="dropdown-toggle-inner" type="button" data-bs-toggle="dropdown" aria-expanded="false"><?= mb_strtoupper(__('cancel', 'WSC')) ?></button>
            </div>
          </div>
        </div>
        <input type="hidden" name="action" value="filter_posts">
      </form>
    </div>
  </section>

  <?php 
  $args = array(
    'post_type' => 'post', 
    'posts_per_page' => 6,
    'post_status' => 'publish',
    //'ignore_sticky_posts' => true,
  //  'suppress_filters' => true,
    'paged' => get_query_var('paged') > 0 ? get_query_var('paged')  : 1
  );

  /*if($categories){
    $args['cat'] = wp_list_pluck($categories, 'term_id');
  }*/
  
  $wp_query = new WP_Query($args);
  if($wp_query->have_posts()): 
    ?>

    <section class="block-cards-list">
      <div class="container-fluid" id="response_posts">
        <div class="row posts">

          <?php while ($wp_query->have_posts()): $wp_query->the_post(); ?>

           <div class="col-md-6 col-lg-4">

            <?php get_template_part('parts/content', 'post') ?>

          </div>

        <?php endwhile; ?>

      </div>

      <?php if ( $wp_query->max_num_pages > 1 ) { ?>
        <script> var this_page = 1; </script>

        <div class="lds-dual-ring">
          <lottie-player id="loader" class="lottie" loop src="<?= get_stylesheet_directory_uri() ?>/json/loader.json" width="100" height="100"></lottie-player>
        </div>
        <div class="btn-wrapper text-center more_posts">
          <a href="#" class="btn btn-primary btn-sm" data-param-posts='<?php echo serialize($wp_query->query_vars); ?>' data-max-pages='<?php echo $wp_query->max_num_pages; ?>'>
            <span class="btn-label-wrap">
              <span class="btn-label" data-text="<?php _e('More Posts', 'WSC') ?>"><?php _e('More Posts', 'WSC') ?></span>
            </span>
            <span class="btn-arrow">
              <span class="btn-arrow-inner">
                <svg xmlns="http://www.w3.org/2000/svg" width="6" height="6" viewBox="0 0 6 6" fill="none">
                  <path fill-rule="evenodd" clip-rule="evenodd"
                  d="M4.23503 4.96611L0 0.731074L0.731074 0L4.96611 4.23503V1.09661H6V6H1.09661L1.09661 4.96611H4.23503Z"
                  fill="#0B0B0B" />
                </svg>
              </span>
              <span class="btn-arrow-inner">
                <svg xmlns="http://www.w3.org/2000/svg" width="6" height="6" viewBox="0 0 6 6" fill="none">
                  <path fill-rule="evenodd" clip-rule="evenodd"
                  d="M4.23503 4.96611L0 0.731074L0.731074 0L4.96611 4.23503V1.09661H6V6H1.09661L1.09661 4.96611H4.23503Z"
                  fill="#0B0B0B" />
                </svg>
              </span>
            </span>
          </a>
        </div>
      <?php } ?>

    </div>
  </section>

  <?php 
endif;
wp_reset_query(); 
?>

<?php endif; ?>