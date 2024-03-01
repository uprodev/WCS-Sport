<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

  <?php if ($post_): ?>
    <section class="block-featured-article">
      <div class="container-fluid">
        <div class="row">

          <?php if (has_post_thumbnail($post_->ID)): ?>
            <div class="col-md-7 col-xl-8">
              <div class="image overflow-hidden">
                <div class="img-inner">
                  <a href="<?php the_permalink($post_->ID) ?>">
                    <?= get_the_post_thumbnail($post_->ID, 'full') ?>
                  </a>
                </div>
              </div>
            </div>
          <?php endif ?>

          <div class="col-md-5 col-xl-4">
            <div class="text">
              <div class="lines-wrapper">

                <?php $terms = get_the_terms($post_->ID, 'category') ?>

                <?php if ($terms): ?>
                  <?php foreach ($terms as $term): ?>
                    <div class="category"><?= $term->name ?></div>
                  <?php endforeach ?>
                <?php endif ?>
                
                <a href="<?php the_permalink($post_->ID) ?>" class="h3"><?= get_the_title($post_->ID) ?></a>
                <p><?= get_the_date('', $post_->ID) ?></p>
              </div>
              <div class="btn-wrap">
                <a href="<?php the_permalink($post_->ID) ?>" class="btn btn-primary">
                  <span class="btn-label-wrap">
                    <span class="btn-label" data-text="<?= mb_strtoupper(__('Read more', 'WSC')) ?>">
                      <?= mb_strtoupper(__('Read more', 'WSC')) ?></span>
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
          </div>
        </div>
      </section>
    <?php wp_reset_postdata(); ?>
    <?php endif ?>

    <?php endif; ?>