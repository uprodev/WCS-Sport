<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

  <?php if ($post): ?>
    <section class="block-featured-article">
      <div class="container-fluid">
        <div class="row">

          <?php if (has_post_thumbnail($post->ID)): ?>
            <div class="col-md-7 col-xl-8">
              <div class="image overflow-hidden">
                <div class="img-inner">
                  <a href="<?php the_permalink() ?>">
                    <?php the_post_thumbnail('full') ?>
                  </a>
                </div>
              </div>
            </div>
          <?php endif ?>

          <div class="col-md-5 col-xl-4">
            <div class="text">
              <div class="lines-wrapper">

                <?php $terms = get_the_terms($post->ID, 'category') ?>

                <?php if ($terms): ?>
                  <?php foreach ($terms as $term): ?>
                    <div class="category"><?= $term->name ?></div>
                  <?php endforeach ?>
                <?php endif ?>
                
                <h3>
                  <a href="<?php the_permalink() ?>"><?php the_title() ?></a>
                </h3>
                <p><?= get_the_date() ?></p>
              </div>
              <div class="btn-wrap">
                <a href="<?php the_permalink() ?>" class="btn btn-primary">
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
    <?php endif ?>

    <?php endif; ?>