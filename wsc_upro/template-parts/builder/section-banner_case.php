<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

  <?php $is_video = ($video || $video_mobile || $video_url || $video_url_mobile) && $type == 'Video' ?>

  <section class="page-header-case<?php if($is_video) echo ' video-wrapper' ?>">

    <?php if ($is_video): ?>
      <lottie-player id="scrollToExplore" class="lottie" loop src="<?= get_stylesheet_directory_uri() ?>/json/preloader2.json"></lottie-player>
    <?php endif ?>
    
    <div class="block-inner bg-secondary">

      <?php if ($image || $video || $video_mobile || $video_url || $video_url_mobile): ?>
        <div class="media">

          <?php if ($video || $video_mobile || $video_url || $video_url_mobile): ?>
            <div class="img-fade">
            <?php endif ?>

            <?php if ($image && $type == 'Image'): ?>
              <?= wp_get_attachment_image($image['ID'], 'full') ?>
            <?php endif ?>
            
            <?php if ($is_video): ?>

              <?php 
              $is_video_desktop = $video_url ?: ($video ? $video['url'] : '');
              $is_video_mobile = $video_url_mobile ?: ($video_url ?: ($video_mobile ? $video_mobile['url'] : $video['url']));
              ?>
              
              <video class="case-video"<?php if($poster) echo ' poster="' . $poster['url'] . '"' ?> data-desktop="<?= $is_video_desktop ?>" data-mobile="<?= $is_video_mobile ?>" muted playsinline></video>
              
            <?php endif ?>

            <?php if ($video || $video_mobile || $video_url || $video_url_mobile): ?>
            </div>
          <?php endif ?>

        </div>
      <?php endif ?>

      <?php if ($text || $video || $video_mobile): ?>
        <div class="text">
          <div class="container-fluid">

            <?php if ($text): ?>
              <div class="lines-wrapper">
                <h1<?php if($is_video) echo ' class="not-animated"' ?>><?= $text ?></h1>
              </div>
            <?php endif ?>

            <?php if ($video || $video_mobile): ?>
              <div class="video-controls">
                <button class="video-replay"></button>
                <button class="video-play"></button>
                <button class="video-sound"></button>
              </div>
            <?php endif ?>

          </div>
        </div>
      <?php endif ?>

    </div>
  </section>

  <?php endif; ?>