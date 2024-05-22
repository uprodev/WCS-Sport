<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

  <section class="block-blog-article">
    <div class="container-fluid">

      <?php if (has_excerpt()): ?>
        <div class="article-intro lines-wrapper">
          <?php the_excerpt() ?>
        </div>
      <?php endif ?>

      <div class="row">
        <div class="col-md-5 col-xxl-6 d-none d-md-block">
          <div class="article-details">

            <?php 
            $terms = wp_get_object_terms(get_the_ID(), 'category');
            if ($terms) $image_id = in_array(77, wp_list_pluck($terms, 'term_id')) ? 400 : 25647;
            ?>

            <?php if ($image_id = $image ? $image['ID'] : $image_id): ?>
              <div class="image">
                <?= wp_get_attachment_image($image_id, 'full') ?>
              </div>
            <?php endif ?>

            <div class="lines-wrapper">
              <p><strong><?php the_title() ?></strong></p>
              <p><?= get_the_date() ?></p>
            </div>
            <a data-id="copyUrl" href="#" class="btn btn-outline-secondary">
              <span class="btn-label-wrap">
                <span class="btn-label" data-text="<?php _e('Share this article', 'WSC') ?>"><?php _e('Share this article', 'WSC') ?></span>
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
        <div class="col-md-7 col-xxl-6 ps-xxl-2">
          <div class="article-main">
            <?php the_content() ?>            
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php endif; ?>