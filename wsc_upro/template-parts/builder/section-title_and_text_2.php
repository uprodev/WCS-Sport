<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

  <?php if ($title || $text): ?>
    <section class="page-header-text page-header-text--<?= mb_strtolower(get_the_title()) ?>">
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