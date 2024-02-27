<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

  <?php 
  $posts_per_page = 3;
  $post_id = get_the_ID();
  ?>

  <section class="block-cards-list">

    <?php if ($title): ?>
      <div class="container-fluid container-fluid--wide">
        <div class="row">
          <div class="col-lg-6 col-xl-4 col-xxl-6 lines-wrapper">
            <h3><?= $title ?></h3>
          </div>
        </div>
      </div>
    <?php endif ?>

    <div class="container-fluid">
      <div class="row">

        <?php 
        $posts_count = $posts ? count($posts) : 0;
        if($posts): 
          ?>

          <?php foreach($posts as $post): 
            global $post;
            setup_postdata($post); ?>

            <div class="col-md-6 col-lg-4">

              <?php get_template_part('parts/content', 'post') ?>
              
            </div>

          <?php endforeach; ?>
          <?php wp_reset_postdata(); ?>

        <?php endif; ?>

        <?php 
        $tag_posts_count = 0;
        if ($posts_count < $posts_per_page):

          $args = array(
            'post_type' => 'post', 
            'posts_per_page' => $posts_per_page - $posts_count,
            'post__not_in' => array($post_id),
            'tag__in' => wp_list_pluck(wp_get_object_terms($post_id, 'post_tag'), 'term_id') ?: [0],
            'paged' => get_query_var('paged')
          );
          $wp_query = new WP_Query($args);
          $tag_posts_count = $wp_query->have_posts() ? $wp_query->found_posts : 0;
          if($wp_query->have_posts()): 
            ?>

            <?php while ($wp_query->have_posts()): $wp_query->the_post(); ?>

              <div class="col-md-6 col-lg-4 fade-up">

                <?php get_template_part('parts/content', 'post') ?>

              </div>

            <?php endwhile; ?>

            <?php 
          endif;
          wp_reset_query(); 
          ?>

        <?php endif; ?>

        <?php 
        if ($posts_count + $tag_posts_count < $posts_per_page):

          $args = array(
            'post_type' => 'post', 
            'posts_per_page' => $posts_per_page - $posts_count - $tag_posts_count,
            'post__not_in' => array($post_id),
            'cat' => wp_list_pluck(wp_get_object_terms($post_id, 'category'), 'term_id') ?: [0],
            'paged' => get_query_var('paged')
          );
          $wp_query = new WP_Query($args);
          if($wp_query->have_posts()): 
            ?>

            <?php while ($wp_query->have_posts()): $wp_query->the_post(); ?>
              
              <div class="col-md-6 col-lg-4 fade-up">

                <?php get_template_part('parts/content', 'post') ?>

              </div>

            <?php endwhile; ?>

            <?php 
          endif;
          wp_reset_query(); 
          ?>

        <?php endif; ?>

      </div>
    </div>

  </section>

  <?php endif; ?>