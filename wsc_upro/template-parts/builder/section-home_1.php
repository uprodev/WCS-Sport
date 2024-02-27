<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

  <section class="block-home block-home-1 bg-secondary">
    <div class="home-parallax">

      <?php if ($gallery): ?>

        <?php 
        for ($i = 1; $i <= 3; $i++) { ?>
          <div class="layer layer-<?= $i ?>">

            <?php foreach($gallery as $index => $image): ?>

              <div id="parallax<?= $index + 1 ?>" class="parallax-item parallax-item-<?= $index + 1 ?>">
                <?= wp_get_attachment_image($image['ID'], 'full') ?>
              </div>

            <?php endforeach; ?>
            
          </div>

        <?php } ?>

      <?php endif ?>

      <?php if ($video): ?>
        <div class="layer layer-4">
          <div class="video">
            <video src="<?= $video['url'] ?>" loop autoplay playsinline muted></video>
          </div>
        </div>
      <?php endif ?>
      
    </div>
    
    <div class="block-inner">

      <?php if ($title): ?>
        <div id="headline1" class="headline-main"><?= $title ?></div>
      <?php endif ?>
      
      <?php if ($text): ?>
        <div class="text">
          <p><?= $text ?></p>
        </div>
      <?php endif ?>
      
    </div>
  </section>

  <?php endif; ?>