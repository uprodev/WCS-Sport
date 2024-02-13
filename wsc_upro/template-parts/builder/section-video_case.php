<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

  <?php if ($video): ?>
    <section class="block-case-video bg-primary">
      <video src="<?= $video['url'] ?>" playsinline muted></video>
    </section>
  <?php endif ?>

  <?php endif; ?>