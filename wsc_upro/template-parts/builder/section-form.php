<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

  <section class="block-contact-form block-contact-form--type1">
    <div class="container-fluid">
      <div class="row justify-content-between">
        <div class="col-md-6 col-lg-4">
          <div class="form-description fade-up">
            
            <?php if ($title): ?>
              <h3><?= $title ?></h3>
            <?php endif ?>

            <?php if ($text): ?>
              <?= $text ?>
            <?php endif ?>

          </div>
        </div>

        <?php if ($form): ?>
          <div class="col-md-6 col-lg-8 col-xxl-7">
            <?= do_shortcode('[contact-form-7 id="' . $form . '"]') ?>
          </div>
        <?php endif ?>

      </div>
    </div>
  </section>

  <?php endif; ?>