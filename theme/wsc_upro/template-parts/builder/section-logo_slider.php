<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

  <?php if ($items): ?>
    <section class="block-slider-content">
      <div class="container-fluid">
        <div class="swiper">
          <div class="swiper-wrapper">

            <?php foreach ($items as $item): ?>
              <div class="swiper-slide">

                <?php if ($item['image']): ?>
                  <div class="image">
                    <?= wp_get_attachment_image($item['image']['ID'], 'full') ?>
                  </div>
                <?php endif ?>
                
                <?php if ($item['text']): ?>
                  <?= $item['text'] ?>
                <?php endif ?>
                
              </div>
            <?php endforeach ?>

          </div>
          <div class="swiper-pagination"></div>
        </div>
      </div>
    </section>
  <?php endif ?>

  <?php endif; ?>