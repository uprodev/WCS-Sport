<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

  <?php /*get_comeet()*/ ?>

  <section class="block-careers-filter bg-primary">
    <div class="row">
      <div class="col-md-6">
        <div class="careers-filter">

          <?php if ($icon): ?>
            <figure>
              <?php if (pathinfo($icon['url'])['extension'] == 'svg'): ?>
                <img src="<?= $icon['url'] ?>" alt="<?= $icon['alt'] ?>">
              <?php else: ?>
                <?= wp_get_attachment_image($icon['ID'], 'full') ?>
              <?php endif ?>
            </figure>
          <?php endif ?>

          <?= $title ?>

          <form action="#">
            <div class="hstack gap-2 gap-xl-4">

              <?php 
              $taxonomies = ['location', 'department'];

              foreach ($taxonomies as $taxonomy) {
                $terms = get_terms( [
                  'taxonomy' => $taxonomy,
                  'hide_empty' => false,
                ] );

                if ($terms) { ?>

                  <div class="field">
                    <select class="<?= $taxonomy . 's' ?>">
                      <option value=""><?= __('All', 'WSC') . ' ' . ucfirst($taxonomy) . 's' ?></option>

                      <?php foreach ($terms as $term): ?>
                        <option value="<?= $term->term_id ?>"><?= $term->name ?></option>
                      <?php endforeach ?>

                    </select>
                  </div>

                  <?php 
                }
              } 
              ?>


            </div>
          </form>
        </div>
      </div>
      <div class="col-md-6">

        <?php if($gallery): ?>

          <div class="swiper">
            <div class="swiper-wrapper">

              <?php foreach($gallery as $image): ?>

                <div class="swiper-slide">
                  <div class="image">
                    <?= wp_get_attachment_image($image['ID'], 'full') ?>
                  </div>
                </div>

              <?php endforeach; ?>

            </div>
          </div>

        <?php endif; ?>

      </div>
    </div>
  </section>
  <section class="block-careers-list">
    <div class="container-fluid">

      <?php 
      $taxonomy = 'location';
      $terms = get_terms( [
        'taxonomy' => $taxonomy,
      ] ); 
      ?>

      <?php if ($terms): ?>
        <div class="list" id="response_jobs">

          <?php foreach ($terms as $term): ?>
            <h3><?= mb_strtoupper($term->name) ?></h3>

            <?php 
            $args = array(
              'post_type' => 'career', 
              'posts_per_page' => -1, 
              'tax_query' => array(
                array(
                  'taxonomy' => $taxonomy,
                  'field'    => 'id',
                  'terms'    => $term->term_id
                )
              ),
              'paged' => get_query_var('paged')
            );
            $wp_query = new WP_Query($args);
            if($wp_query->have_posts()): 
              ?>

              <ul>

                <?php while ($wp_query->have_posts()): $wp_query->the_post(); ?>

                  <?php get_template_part('parts/content', 'job') ?>

                <?php endwhile; ?>

              </ul>

              <?php 
            endif;
            wp_reset_query(); 
            ?>

          <?php endforeach ?>
          
        </div>
      <?php endif ?>
      
    </div>
  </section>

  <?php endif; ?>