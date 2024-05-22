<?php 
//if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

  <?php 
  $is_video_desktop = ($video || $url_video) ? ($video ? $video['url'] : $url_video) : ($video_mobile ? $video_mobile['url'] : $url_video_mobile);
  $is_video_mobile = ($video_mobile || $url_video_mobile) ? ($video_mobile ? $video_mobile['url'] : $url_video_mobile) : ($video ? $video['url'] : $url_video);
  ?>

  <?php if ($height): ?>
    <style type="text/css">
      .block-home-20 {
        height: <?= $height ?>vh;
      }
    </style>
  <?php endif ?>

  <section id="videoContainer" class="block-home block-home-2 bg-secondary">
    <?php
    
 if (wp_is_mobile())
    //  echo do_shortcode('[rev_slider alias="slider-6"][/rev_slider]');
      echo do_shortcode('[rev_slider alias="slider-4"][/rev_slider]');
  else
   echo do_shortcode('[rev_slider alias="slider-1"][/rev_slider]');
    
    ?>
    
    
  </section>

  <?php // endif; ?>