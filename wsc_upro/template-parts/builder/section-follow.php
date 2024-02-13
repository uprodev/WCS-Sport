<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

  <section class="block-careers-share bg-secondary text-white">
    <div class="container-fluid">
      <div class="wrapper">

        <?php if ($image): ?>
          <div class="careers-share-image fade-up">
            <?= wp_get_attachment_image($image['ID'], 'full') ?>
          </div>
        <?php endif ?>

        <div class="careers-share-text">

          <?php if ($text): ?>
            <div class="fade-up"><?= $text ?></div>
          <?php endif ?>

          <?php if ($title): ?>
            <h2><?= $title ?></h2>
          <?php endif ?>

          <?php if ($links): ?>
            <div class="fade-up socials">

              <?php foreach ($links as $item): ?>
                <?php if ($item['icon']): ?>
                  <a href="<?= $item['url'] ?>" target="_blank">
                    <?= wp_get_attachment_image($item['icon']['ID'], 'full') ?>
                  </a>
                <?php endif ?>
              <?php endforeach ?>
              
            </div>
          <?php endif ?>

        </div>
      </div>
    </div>
  </section>

  <?php endif; ?>