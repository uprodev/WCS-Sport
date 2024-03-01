<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

  <?php if ($title || $text): ?>
    <section class="page-header-text <?= $is_contact ? 'page-header-text--contact' : 'page-header-text--clients' ?>">
      <div class="container-fluid">
        <div class="lines-wrapper">

          <?php if ($title): ?>
            <h1><?= $title ?></h1>
          <?php endif ?>
          
          <?php if ($text): ?>
            <?= $text ?>
          <?php endif ?>
          
        </div>
      </div>
    </section>
  <?php endif ?>
  
  <?php endif; ?>