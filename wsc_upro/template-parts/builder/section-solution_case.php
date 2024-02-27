<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

  <section class="block-headline-text-case bg-light">
    <div class="container-fluid">
      <div class="row justify-content-between">
        <div class="col-lg-4 lines-wrapper">

          <?php if ($title): ?>
            <h4><?= $title ?></h4>
          <?php endif ?>
          
        </div>
        <div class="col-lg-6">

          <?php if ($text): ?>
            <div class="text lines-wrapper"><?= $text ?></div>
          <?php endif ?>
          
        </div>
      </div>
    </div>
  </section>

  <?php endif; ?>