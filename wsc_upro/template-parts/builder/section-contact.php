<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

  <section class="block-contact-form">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6 col-lg-4">

          <?php if ($title): ?>
            <h2><?= $title ?></h2>
          <?php endif ?>

          <?php if ($emails): ?>
            <dl>

              <?php foreach ($emails as $item): ?>

                <?php if ($item['title']): ?>
                  <dt class="fade-up"><?= $item['title'] ?></dt>
                <?php endif ?>

                <?php if ($item['email']): ?>
                  <dd class="fade-up"><a href="mailto:<?= $item['email'] ?>" class="link-underline-primary link-underline-opacity-0 link-underline-opacity-100-hover"><?= $item['email'] ?></a></dd>
                <?php endif ?>

              <?php endforeach ?>

            </dl>
          <?php endif ?>

        </div>

        <?php if ($form || $hubspot_form): ?>
          <div class="col-md-6 col-lg-8 col-xl-7">
            <?php if ($is_hubspot && $hubspot_form): ?>
              <?= $hubspot_form ?>
            <?php elseif(!$is_hubspot && $form): ?>
              <?= do_shortcode('[contact-form-7 id="' . $form . '"]') ?>
            <?php endif ?>
          </div>
        <?php endif ?>
        
      </div>
    </div>
  </section>

  <?php endif; ?>