<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

  <section class="block-home block-home-2 bg-secondary">
    <div class="block-inner">
      <div class="wrapper">

        <?php if ($items): ?>

          <?php foreach ($items as $index => $item): ?>

            <?php if ($item['texts']): ?>
              <div class="text<?= $index + 1 ?>">

                <?php foreach ($item['texts'] as $item_2): ?>

                  <?php if ($item_2['text']): ?>
                    <div class="text-line text-line-<?= $item_2['number'] ?>"><?= $item_2['text'] ?></div>
                  <?php endif ?>

                <?php endforeach ?>

              </div>
            <?php endif ?>

          <?php endforeach ?>

        <?php endif ?>

        <div class="video-block">

          <?php if ($video_text): ?>
            <div class="video-text"><?= $video_text ?></div>
          <?php endif ?>
          
          <?php if ($video || $url_video): ?>
            <div class="video-wrapper">
              <div class="video">
                <div class="video-inner">
                  <video src="<?= $video ? $video['url'] : $url_video ?>" playsinline muted></video>
                </div>
              </div>
            </div>
          <?php endif ?>
          
        </div>

        <?php if($gallery): ?>

          <div class="boxes">

            <?php foreach($gallery as $index => $image): ?>

              <div class="box box<?= $index + 1 ?>">
                
                <?php if ($image['type'] == 'image'): ?>
                  <?= wp_get_attachment_image($image['ID'], 'full') ?>
                <?php endif ?>
                
                <?php if ($image['type'] == 'video'): ?>
                  <video src="<?= $image['url'] ?>" playsinline loop muted autoplay></video>
                <?php endif ?>
                
              </div>

            <?php endforeach; ?>

          </div>

        <?php endif; ?>

      </div>
    </div>
  </section>

  <?php endif; ?>