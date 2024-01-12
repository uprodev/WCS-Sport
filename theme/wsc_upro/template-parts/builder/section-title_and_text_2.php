<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

  <?php if ($title || $text): ?>
    <section class="page-header-text">
      <div class="container-fluid">

        <?php if ($title): ?>
          <h1><?= $title ?></h1>
        <?php endif ?>
        
        <?php if ($text): ?>
          <div class="fade-up">
            <?= $text ?>
          </div>
        <?php endif ?>
        
      </div>
    </section>
  <?php endif ?>
  
  <?php endif; ?>