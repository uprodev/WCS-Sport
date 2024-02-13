<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

  <?php if($gallery): ?>

    <section class="<?= $variable_width ? 'block-slider-variable-width' : 'block-slider-images' ?>">
      <div class="swiper">
        <div class="swiper-wrapper">

          <?php foreach($gallery as $image): ?>

            <div class="swiper-slide">
              <div class="image">
                <div class="img-fade">
                  <?= wp_get_attachment_image($image['ID'], 'full') ?>
                </div>
              </div>
            </div>

          <?php endforeach; ?>

        </div>
      </div>
    </section>

  <?php endif; ?>

  <?php endif; ?>