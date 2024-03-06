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

                <?php if ($image['type'] == 'image'): ?>
                  <?= wp_get_attachment_image($image['ID'], 'full') ?>
                <?php endif ?>
                
                <?php if ($image['type'] == 'video'): ?>
                  <video src="<?= $image['url'] ?>" playsinline loop muted autoplay></video>
                <?php endif ?>
                
              </div>

            <?php endforeach; ?>
            
          </div>

        <?php } ?>

      <?php endif ?>

      <?php if ($video || $url_video): ?>
        <div class="layer layer-4">
          <div class="video">
            <video src="<?= $video ? $video['url'] : $url_video ?>" loop autoplay playsinline muted></video>
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