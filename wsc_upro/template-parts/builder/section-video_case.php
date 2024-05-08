<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

  <?php 
  $is_video = $type == 'Video' && ($video || $video_mobile);
  $is_image = $type == 'Image' && $image;
  ?>

  <?php if ($is_video || $is_image): ?>
    <section class="block-case-video bg-primary">

      <?php if ($is_image): ?>
        <?= wp_get_attachment_image($image['ID'], 'full') ?>
      <?php else: ?>
        <div class="video-wrapper">
          <video data-desktop="<?= $video ? $video['url'] : '' ?>" data-mobile="<?= $video_mobile ? $video_mobile['url'] : '' ?>" playsinline muted></video>
          <div class="overlay">
            <div class="container-fluid">
              <div class="video-controls">
                <button class="video-replay"></button>
                <button class="video-play"></button>
                <button class="video-sound"></button>
              </div>
            </div>
          </div>
        </div>
      <?php endif ?>

    </section>
  <?php endif ?>

  <?php endif; ?>