<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

  <?php if($items_): ?>
    <section class="block-cards-slider-cases">
      <div class="container-fluid">
        <div class="cards-slider-text">

          <?php if ($title): ?>
            <div class="lines-wrapper">
              <h2><?= $title ?></h2>
            </div>
          <?php endif ?>
          
          <div class="cards-slider-controls">
            <div class="swiper-button-prev">
              <svg width="36" height="34" viewBox="0 0 36 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M11.2755 26.2462L2 16.9707L11.2401 7.73061" stroke="#0B0B0B" stroke-width="2" />
                <path d="M35.9414 16.9707L2.09647 16.9707" stroke="#0B0B0B" stroke-width="2" />
              </svg>
            </div>
            <div class="swiper-button-next">
              <svg width="37" height="34" viewBox="0 0 37 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M25.6073 7.69521L34.8828 16.9707L25.6427 26.2108" stroke="#0B0B0B" stroke-width="2" />
                <path d="M0.941406 16.9707L34.7863 16.9707" stroke="#0B0B0B" stroke-width="2" />
              </svg>
            </div>
          </div>
        </div>
        <div class="cards-slider">
          <div class="swiper">
            <div class="swiper-wrapper">

              <?php foreach($items_ as $item): ?>
                <div class="swiper-slide">
                  <div class="card-case">

                    <?php if ($field = get_field('card_image', $item['case']->ID)): ?>
                      <div class="card-image">
                        <div class="img-fade">
                          <?= wp_get_attachment_image($field['ID'], 'full') ?>
                        </div>
                      </div>
                    <?php endif ?>

                    <div class="card-main">

                      <?php if (get_field('logo', $item['case']->ID) || get_field('logo_mobile', $item['case']->ID)): ?>
                      <div class="card-logo">
                        <picture>
                          <source srcset="<?= get_field('logo', $item['case']->ID)['url'] ?: get_field('logo_mobile', $item['case']->ID)['url'] ?>" media="(min-width: 768px)" />
                            <?= wp_get_attachment_image(get_field('logo_mobile', $item['case']->ID)['ID'] ?: get_field('logo', $item['case']->ID)['ID'], 'full') ?>
                          </picture>
                        </div>
                      <?php endif ?>

                      <?php if ($field = get_field('card_title', $item['case']->ID)): ?>
                        <a href="<?php the_permalink($item['case']->ID) ?>" class="card-title"><?= $field ?></a>
                      <?php endif ?>

                      <?php if (has_excerpt($item['case']->ID)): ?>
                        <p><?= get_the_excerpt($item['case']->ID) ?></p>
                      <?php endif ?>

                      <a href="<?php the_permalink($item['case']->ID) ?>" class="btn btn-outline-secondary">
                        <span class="btn-label-wrap">
                          <span class="btn-label" data-text="<?php _e('READ MORE', 'WSC') ?>"><?php _e('READ MORE', 'WSC') ?></span>
                        </span>
                        <span class="btn-arrow">
                          <span class="btn-arrow-inner">
                            <svg xmlns="http://www.w3.org/2000/svg" width="6" height="6" viewBox="0 0 6 6" fill="none">
                              <path fill-rule="evenodd" clip-rule="evenodd" d="M4.23503 4.96611L0 0.731074L0.731074 0L4.96611 4.23503V1.09661H6V6H1.09661L1.09661 4.96611H4.23503Z" fill="#0B0B0B" />
                            </svg>
                          </span>
                          <span class="btn-arrow-inner">
                            <svg xmlns="http://www.w3.org/2000/svg" width="6" height="6" viewBox="0 0 6 6" fill="none">
                              <path fill-rule="evenodd" clip-rule="evenodd" d="M4.23503 4.96611L0 0.731074L0.731074 0L4.96611 4.23503V1.09661H6V6H1.09661L1.09661 4.96611H4.23503Z" fill="#0B0B0B" />
                            </svg>
                          </span>
                        </span>
                      </a>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>

            </div>
          </div>
          <div class="swiper-pagination"></div>
        </div>
      </div>
    </section>
  <?php endif; ?>

  <?php endif; ?>