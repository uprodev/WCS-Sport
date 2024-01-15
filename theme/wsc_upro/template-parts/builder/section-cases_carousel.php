<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

  <?php if($cases): ?>

    <section class="block-cases-carousel">
      <div class="container-fluid pe-0">
        <div class="swiper">
          <div class="swiper-wrapper">

            <?php foreach($cases as $index => $post): 

              global $post;
              setup_postdata($post); ?>

              <div class="swiper-slide">
                <div class="card-case<?php if($index == 0) echo ' card-case--featured' ?>">

                  <?php if (($field = get_field('card_image')) && $index == 0): ?>
                    <div class="card-image">
                      <div class="img-fade">
                        <?= wp_get_attachment_image($field['ID'], 'full') ?>
                      </div>
                    </div>
                  <?php endif ?>
                  
                  <div class="card-main">

                    <?php if ($field = get_field('logo')): ?>
                      <div class="card-logo">
                        <?= wp_get_attachment_image($field['ID'], 'full') ?>
                      </div>
                    <?php endif ?>
                    
                    <?php if ($field = get_field('card_title')): ?>
                      <a href="<?php the_permalink() ?>" class="card-title"><?= $field ?></a>
                    <?php endif ?>
                    
                    <?php if (get_the_excerpt()): ?>
                      <?php the_excerpt() ?>
                    <?php endif ?>
                    
                    <a href="<?php the_permalink() ?>" class="btn btn-outline-secondary">
                      <?php _e('READ MORE', 'WSC') ?>
                      <svg xmlns="http://www.w3.org/2000/svg" width="6" height="6" viewBox="0 0 6 6" fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M4.23503 4.96611L0 0.731074L0.731074 0L4.96611 4.23503V1.09661H6V6H1.09661L1.09661 4.96611H4.23503Z" fill="#0B0B0B" />
                      </svg>
                    </a>
                  </div>
                </div>
              </div>

            <?php endforeach; ?>

            <?php wp_reset_postdata(); ?>

          </div>
        </div>
      </div>
    </section>

  <?php endif; ?>

  <?php endif; ?>