<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

  <section class="block-headline-text block-headline-text--blog">
    <div class="container-fluid">
      <div class="row justify-content-between align-items-xxl-end">

        <?php if ($title): ?>
          <div class="col-lg-6">
            <h1><?= $title ?></h1>
          </div>
        <?php endif ?>
        
        <?php if ($text): ?>
          <div class="col-lg-4 px-xl-2">
            <div class="fade-up-wrapper">
              <?= $text ?>
            </div>
          </div>
        <?php endif ?>
        
      </div>
    </div>
  </section>

  <?php endif; ?>