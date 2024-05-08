<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

  <section class="block-home block-home-5 bg-secondary">
    <div class="block-inner bg-secondary">
      <div class="container-fluid">

        <?php if ($slogan): ?>
          <div class="slogan"><?= $slogan ?></div>
        <?php endif ?>
        
        <?php if ($subtitle): ?>
          <div class="block-subtitle"><?= $subtitle ?></div>
        <?php endif ?>

        <?php if ($title): ?>
          <div class="block-title"><?= $title ?></div>
        <?php endif ?>

        <div class="d-md-flex justify-content-between align-items-end">

          <?php if ($link): ?>
            <a href="<?= $link['url'] ?>" class="btn btn-primary"<?php if($link['target']) echo ' target="_blank"' ?>>
              <span class="btn-label-wrap">
                <span class="btn-label" data-text="<?= $link['title'] ?>"><?= $link['title'] ?></span>
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
          <?php endif ?>
          
          <?php if ($image): ?>
            <div class="arrow">
              <?= wp_get_attachment_image($image['ID'], 'full') ?>
            </div>
          <?php endif ?>
          
        </div>
      </div>
    </div>
  </section>

  <?php endif; ?>