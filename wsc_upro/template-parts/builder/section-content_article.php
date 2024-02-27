<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

  <section class="block-blog-article">
    <div class="container-fluid">

      <?php if (get_the_excerpt()): ?>
        <div class="article-intro lines-wrapper">
          <?php the_excerpt() ?>
        </div>
      <?php endif ?>

      <div class="row">
        <div class="col-md-5 col-xxl-6 d-none d-md-block">
          <div class="article-details">

            <?php if ($image): ?>
              <div class="image">
                <?= wp_get_attachment_image($image['ID'], 'full') ?>
              </div>
            <?php endif ?>

            <div class="lines-wrapper">
              <p><strong><?php the_title() ?></strong></p>
              <p><?= get_the_date() ?></p>
            </div>
            <a data-id="copyUrl" href="#" class="btn btn-outline-secondary">
              <?php _e('Share this article', 'WSC') ?>
              <svg xmlns="http://www.w3.org/2000/svg" width="6" height="6" viewBox="0 0 6 6" fill="none">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M4.23503 1.03389L0 5.26893L0.731074 6L4.96611 1.76497V4.90339H6V4.76837e-07H1.09661L1.09661 1.03389H4.23503Z" fill="#0B0B0B" />
              </svg>
            </a>
          </div>
        </div>
        <div class="col-md-7 col-xxl-6 ps-xxl-2">
          <div class="article-main">
            <?php the_content() ?>            
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php endif; ?>