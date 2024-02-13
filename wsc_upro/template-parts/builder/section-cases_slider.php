<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

  <?php if($cases): ?>

    <section class="block-cases-slider bg-secondary">
      <div class="swiper swiper-outer">
        <div class="swiper-wrapper">

          <?php 
          foreach($cases as $post): 
            global $post;
            setup_postdata($post); 
            ?>

            <div class="swiper-slide"<?php if(has_post_thumbnail()) echo ' style="background-image: url(' . get_the_post_thumbnail_url($post->ID, 'full') . ')"' ?>>
              <div class="item">

                <?php if ($field = get_field('title')): ?>
                  <h2><?= $field ?></h2>
                <?php endif ?>
                
              </div>
            </div>

            <?php 
          endforeach;
          wp_reset_postdata(); 
          ?>

        </div>
        <div class="swiper-pagination"></div>
        <div class="swiper-controls">
          <ul>

            <?php 
            foreach($cases as $index => $post): 
              global $post;
              setup_postdata($post); 
              ?>

              <li>
                <a href="<?php the_permalink($post->ID) ?>"><?= mb_strtolower(get_the_title()) ?> </a>
              </li>

              <?php 
            endforeach;
            wp_reset_postdata(); 
            ?>

          </ul>
          <div class="active-arrow">
            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="14" viewBox="0 0 15 14" fill="none">
              <path d="M15 14V5.6875L0 0L7.71429 14H15Z" fill="#E5FF00" />
            </svg>
          </div>
        </div>
      </div>
      <div class="swiper swiper-inner">
        <div class="swiper-wrapper">

          <?php 
          foreach($cases as $post): 
            global $post;
            setup_postdata($post); 
            ?>

            <?php if ($field = get_field('image')): ?>
              <div class="swiper-slide">
                <figure>
                  <?= wp_get_attachment_image($field['ID'], 'full') ?>
                </figure>
              </div>
            <?php endif ?>

            <?php 
          endforeach;
          wp_reset_postdata(); 
          ?>

        </div>
      </div>
    </section>

  <?php endif; ?>

  <?php endif; ?>