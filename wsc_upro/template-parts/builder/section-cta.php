<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

  <section class="block-cta block-cta--type<?= $type ?>">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-8">

          <?php if ($title): ?>
            <h3><?= $title ?></h3>
          <?php endif ?>
          
          <?php if ($text): ?>
            <div class="fade-up-overflow me-3 me-md-0">
              <?= $text ?>
            </div>
          <?php endif ?>
          
        </div>
        <div class="col-md-4 text-md-end">

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

        </div>
      </div>
    </div>
  </section>

  <?php endif; ?>