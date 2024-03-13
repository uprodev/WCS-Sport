<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

  <?php if ($video || $url_video): ?>
    <section id="videoContainer" class="block-home block-home-2 bg-secondary">
      <div id="scrollyVideo" data-video="<?= $video ? $video['url'] : $url_video ?>"></div>
    </section>
  <?php endif ?>

  <?php endif; ?>