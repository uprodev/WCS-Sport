<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

  <?php if ($items): ?>
    <section class="block-awards">
      <div class="container-fluid">
        <div class="block-inner">

          <?php if ($title): ?>
            <h4><?= $title ?></h4>
          <?php endif ?>

          <div class="swiper">
            <div class="swiper-wrapper">

              <?php foreach ($items as $item): ?>

                <?php if($item['gallery']): ?>

                  <div class="swiper-slide">
                    <div class="inner">

                      <?php foreach($item['gallery'] as $image): ?>

                        <div class="image">
                          <?= wp_get_attachment_image($image['ID'], 'full') ?>
                        </div>

                      <?php endforeach; ?>

                    </div>
                  </div>

                <?php endif; ?>

              <?php endforeach ?>

            </div>
          </div>
        </div>
      </div>
    </section>
  <?php endif ?>

  <?php endif; ?>