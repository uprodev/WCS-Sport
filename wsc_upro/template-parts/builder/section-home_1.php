<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

  <?php if ($video || $url_video): ?>
    <section class="block-home block-home-1 bg-secondary">
      <div class="block-inner">
        <div class="video">
          <video class="part1" src="<?= $video ? $video['url'] : $url_video ?>" muted playsinline></video>
        </div>
      </div>
    </section>
  <?php endif ?>

  <?php endif; ?>