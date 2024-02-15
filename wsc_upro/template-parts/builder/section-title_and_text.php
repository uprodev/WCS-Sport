<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

  <?php if ($title || $text): ?>
    <section class="page-header-two-col">
      <div class="container-fluid">
        <div class="row align-items-end">

          <?php if ($title): ?>
            <div class="col-lg-8">
              <h1><?= $title ?></h1>
            </div>
          <?php endif ?>
          
          <?php if ($text): ?>
            <div class="col-lg-4">
              <div class="fade-up"><?= $text ?></div>
            </div>
          <?php endif ?>
          
        </div>
      </div>
    </section>
  <?php endif ?>
  
  <?php endif; ?>