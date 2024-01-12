<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

  <section class="block-logos">
    <div class="container-fluid">
      <div class="text-center">

        <?php if ($title): ?>
          <h3><?= $title ?></h3>
        <?php endif ?>

        <?php if ($text): ?>
          <div class="fade-up fs-21">
            <?= $text ?>
          </div>
        <?php endif ?>

      </div>

      <?php if($gallery_mobile): ?>

        <div class="logos-list d-md-none fade-up">
          <ul>

            <?php foreach($gallery_mobile as $image): ?>

              <li>
                <?= wp_get_attachment_image($image['ID'], 'full') ?>
              </li>

            <?php endforeach; ?>

          </ul>
        </div>

      <?php endif; ?>

      <?php if($gallery): ?>

        <div class="logos-list d-none d-md-block fade-up">
          <ul>

            <?php foreach($gallery as $image): ?>

              <li>
                <?= wp_get_attachment_image($image['ID'], 'full') ?>
              </li>

            <?php endforeach; ?>

          </ul>
        </div>

      <?php endif; ?>

    </div>
  </section>

  <?php endif; ?>