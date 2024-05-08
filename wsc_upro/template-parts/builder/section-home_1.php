<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

  <lottie-player id="scrollToExplore" class="lottie" loop src="<?= get_stylesheet_directory_uri() ?>/json/preloader2.json"></lottie-player>
  
  <?php //if (!isset($_COOKIE['is_first_time'])): ?>

    <?php 
    $is_video_desktop = ($video || $url_video) ? ($video ? $video['url'] : $url_video) : ($video_mobile ? $video_mobile['url'] : $url_video_mobile);
    $is_video_mobile = ($video_mobile || $url_video_mobile) ? ($video_mobile ? $video_mobile['url'] : $url_video_mobile) : ($video ? $video['url'] : $url_video);
    ?>

    <section class="block-home block-home-1 bg-secondary">
      <h1><?php the_title() ?></h1>
      <div class="block-inner">
        <div class="video">
          <video class="part1" data-desktop="<?= $is_video_desktop ?>" data-mobile="<?= $is_video_mobile ?>" muted playsinline></video>
        </div>
      </div>
    </section>
  <?php // endif ?>

  <?php endif; ?>