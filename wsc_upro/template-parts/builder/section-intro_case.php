<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

  <section class="block-case-intro">
    <div class="container-fluid">

      <?php if ($image): ?>
        <div class="d-md-none">
          <div class="image">
            <?= wp_get_attachment_image($image['ID'], 'full') ?>
          </div>
        </div>
      <?php endif ?>

      <div class="block-header lines-wrapper">

        <?php if ($title): ?>
          <h3><?= $title ?></h3>
        <?php endif ?>

        <?php if ($text_1): ?>
          <?= $text_1 ?>
        <?php endif ?>

      </div>
      
      <div class="row justify-content-between">

        <?php if ($image): ?>
          <div class="col-md-6 col-lg-5 d-none d-md-block">
            <div class="image">
              <?= wp_get_attachment_image($image['ID'], 'full') ?>
            </div>
          </div>
        <?php endif ?>
        
        <?php if ($text_2): ?>
          <div class="col-md-6">
            <div class="text lines-wrapper"><?= $text_2 ?></div>
          </div>
        <?php endif ?>
        
      </div>
    </div>
  </section>

  <?php endif; ?>