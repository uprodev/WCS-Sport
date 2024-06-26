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

            <div class="swiper-slide">
              <a href="<?php the_permalink($post->ID) ?>"<?php if(has_post_thumbnail($post->ID)) echo ' style="background-image: url(' . get_the_post_thumbnail_url($post->ID, 'full') . ')"' ?>>
                <div class="item">

                  <?php if ($field = get_field('title', $post->ID)): ?>
                    <div class="slide-title"><?= $field ?></div>
                  <?php endif ?>

                </div>
              </a>
            </div>

            <?php 
          endforeach;
          wp_reset_postdata(); 
          ?>

        </div>
        <div class="swiper-controls">
          <ul>

            <?php 
            foreach($cases as $index => $post): 
              global $post;
              setup_postdata($post); 
              ?>

              <li data-slide="<?= $index ?>"><?= mb_strtolower(get_the_title($post->ID)) ?></li>

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
      <div class="swiper-inner-wrapper">
        <div class="swiper swiper-inner">
          <div class="swiper-wrapper">

            <?php 
            foreach(array_reverse($cases) as $post): 
              global $post;
              setup_postdata($post); 
              ?>

              <div class="swiper-slide">

                <?php if ($field = get_field('image', $post->ID)): ?>
                  <figure>
                    <a href="<?php the_permalink($post->ID) ?>"><?= wp_get_attachment_image($field['ID'], 'full') ?></a>
                  </figure>
                <?php endif ?>

              </div>

              <?php 
            endforeach;
            wp_reset_postdata(); 
            ?>

          </div>
        </div>
      </div>
      <div class="swiper-pagination"></div>
    </section>

  <?php endif; ?>

  <?php endif; ?>