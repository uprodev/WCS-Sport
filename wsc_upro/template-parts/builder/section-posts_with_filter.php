<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

  <section class="block-filter">
    <div class="container-fluid">
      <form action="#">

        <?php if ($categories): ?>
          <div class="filter-list">
            <ul>
              <li>
                <input type="radio" name="category" id="category-all" checked />
                <label for="category-all"><?= mb_strtoupper(__('All', 'WSC')) ?></label>
              </li>

              <?php foreach ($categories as $term): ?>
                <li>
                  <input type="radio" name="category" value="<?= $term->term_id ?>" id="category-<?= $term->term_id ?>" />
                  <label for="category-<?= $term->term_id ?>"><?= mb_strtoupper($term->name) ?></label>
                </li>
              <?php endforeach ?>
              
            </ul>
          </div>
        <?php endif ?>
        
        <div class="sort">
          <select>
            <option value="DESC" selected><?= mb_strtoupper(__('Latest', 'WSC')) ?></option>
            <option value="ASC"><?= mb_strtoupper(__('Oldest', 'WSC')) ?></option>
          </select>
        </div>
      </form>
    </div>
  </section>

  <?php 
  $args = array(
    'post_type' => 'post', 
    'posts_per_page' => -1,
    'paged' => get_query_var('paged')
  );
  $wp_query = new WP_Query($args);
  if($wp_query->have_posts()): 
    ?>

    <section class="block-cards-list">
      <div class="container-fluid">
        <div class="row" id="response_posts">

          <?php while ($wp_query->have_posts()): $wp_query->the_post(); ?>

           <div class="col-md-6 col-lg-4 fade-up">

            <?php get_template_part('parts/content', 'post') ?>

          </div>

        <?php endwhile; ?>

      </div>
      
      <!-- <div class="pagination">
        <a href="#" class="page-prev btn btn-secondary">
          <svg xmlns="http://www.w3.org/2000/svg" width="6" height="6" viewBox="0 0 6 6" fill="none">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M1.76497 4.96611L6 0.731074L5.26893 0L1.03389 4.23503V1.09661H4.76837e-07V6H4.90339L4.90339 4.96611H1.76497Z" fill="#E3E3E7" />
          </svg>
          prev
        </a>
        <select class="form-select">
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
        </select>
        <a href="#" class="page-next btn btn-secondary">
          next
          <svg xmlns="http://www.w3.org/2000/svg" width="6" height="6" viewBox="0 0 6 6" fill="none">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M4.23503 4.96611L0 0.731074L0.731074 0L4.96611 4.23503V1.09661H6V6H1.09661L1.09661 4.96611H4.23503Z" fill="#E3E3E7" />
          </svg>
        </a>
      </div> -->
    </div>
  </section>

  <?php 
endif;
wp_reset_query(); 
?>

<?php endif; ?>