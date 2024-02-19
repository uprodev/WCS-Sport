<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

  <?php if ($title || $text): ?>
    <section class="page-header-text page-header-text--clients">
      <div class="container-fluid">

        <?php if ($title): ?>
          <h1 class="not-animated"><?= $title ?></h1>
        <?php endif ?>
        
        <?php if ($text): ?>
          <div class="fade-up-overflow">
            <?= $text ?>
          </div>
        <?php endif ?>
        
      </div>
    </section>
  <?php endif ?>
  
  <?php endif; ?>