<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

  <?php if ($title || $text): ?>
    <section class="block-headline-text gradient">
      <div class="container-fluid">
        <div class="row justify-content-between align-items-end">

          <?php if ($title): ?>
            <div class="col-lg-6">
              <h3><?= $title ?></h3>
            </div>
          <?php endif ?>
          
          <?php if ($text): ?>
            <div class="col-lg-4">
              <div class="fade-up-wrapper"><?= $text ?></div>
            </div>
          <?php endif ?>
          
        </div>
      </div>
    </section>
  <?php endif ?>

  <?php endif; ?>