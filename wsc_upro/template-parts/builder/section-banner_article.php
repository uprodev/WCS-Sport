<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

  <section class="block-banner-article">
    <div class="container-fluid">
      <div class="row align-items-end flex-md-row-reverse">
        <div class="col-md-7 col-xl-8 d-md-flex justify-content-end">

          <?php if (has_post_thumbnail()): ?>
            <div class="image bg-secondary overflow-hidden">
              <div class="img-inner">
                <?php the_post_thumbnail('full') ?>
              </div>
            </div>
          <?php endif ?>
          
        </div>
        <div class="col-md-5 col-xl-4">
          <div class="text">
            <div class="lines-wrapper">

              <?php $terms = get_the_terms(get_the_ID(), 'category') ?>

              <?php if ($terms): ?>
                <?php foreach ($terms as $term): ?>
                  <div class="category"><?= mb_strtoupper($term->name) ?></div>
                <?php endforeach ?>
              <?php endif ?>
              
              <h1 class="h3"><?php the_title() ?></h1>
              <p><?= get_the_date() ?></p>
            </div>
            <div class="btn-wrap">
              <a href="#" class="btn btn-outline-secondary" data-id="copyUrl">
                <?php _e('Share this article', 'WSC') ?>
                <svg xmlns="http://www.w3.org/2000/svg" width="6" height="6" viewBox="0 0 6 6" fill="none">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M4.23503 4.96611L0 0.731074L0.731074 0L4.96611 4.23503V1.09661H6V6H1.09661L1.09661 4.96611H4.23503Z" fill="#0B0B0B" />
                </svg>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php endif; ?>