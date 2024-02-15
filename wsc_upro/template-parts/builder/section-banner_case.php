<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

  <?php $is_video = $video && $type == 'Video' ?>

  <section class="page-header-case<?php if($is_video) echo ' video-wrapper' ?>">
    <div class="block-inner bg-secondary">

      <?php if ($image || $video): ?>
        <div class="media">
          <div class="img-fade">

            <?php if ($image && $type == 'Image'): ?>
              <?= wp_get_attachment_image($image['ID'], 'full') ?>
            <?php endif ?>
            
            <?php if ($is_video): ?>
              <video src="<?= $video['url'] ?>" muted autoplay playsinline></video>
            <?php endif ?>
            
          </div>
        </div>
      <?php endif ?>

      <?php if ($text || $is_video): ?>
        <div class="text">
          <div class="container-fluid">

            <?php if ($text): ?>
              <h1<?php if($is_video) echo ' class="not-animated"' ?>><?= $text ?></h1>
            <?php endif ?>

            <?php if ($is_video): ?>
              <div class="video-controls">
                <button class="video-replay"></button>
                <button class="video-play"></button>
                <button class="video-sound"></button>
              </div>
            <?php endif ?>

            <!-- <a href="#" class="btn-watch"><?= mb_strtoupper(__('Watch now', 'WSC')) ?></a> -->
          </div>
        </div>
      <?php endif ?>

    </div>
  </section>

  <?php endif; ?>