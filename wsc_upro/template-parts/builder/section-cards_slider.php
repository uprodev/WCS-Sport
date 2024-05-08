<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

  <?php if ($items): ?>
    <section class="block-cards-slider">
      <div class="container-fluid">
        <div class="cards-slider-text">

          <?php if ($title): ?>
            <div class="lines-wrapper">
              <h2><?= $title ?></h2>
            </div>
          <?php endif ?>

          <div class="cards-slider-controls">
            <div class="swiper-button-prev">
              <svg width="36" height="34" viewBox="0 0 36 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M11.2755 26.2462L2 16.9707L11.2401 7.73061" stroke="#0B0B0B" stroke-width="2" />
                <path d="M35.9414 16.9707L2.09647 16.9707" stroke="#0B0B0B" stroke-width="2" />
              </svg>
            </div>
            <div class="swiper-button-next">
              <svg width="37" height="34" viewBox="0 0 37 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M25.6073 7.69521L34.8828 16.9707L25.6427 26.2108" stroke="#0B0B0B" stroke-width="2" />
                <path d="M0.941406 16.9707L34.7863 16.9707" stroke="#0B0B0B" stroke-width="2" />
              </svg>
            </div>
          </div>
        </div>
        <div class="cards-slider">
          <div class="swiper">
            <div class="swiper-wrapper">

              <?php foreach ($items as $item): ?>
                <div class="swiper-slide">
                  <div class="card">

                    <?php if ($item['title']): ?>
                      <div class="card-header">
                        <h3><?= $item['title'] ?></h3>
                      </div>
                    <?php endif ?>
                    
                    <?php if ($item['image'] || $item['video']): ?>
                      <div class="card-visual">
                        <div class="inner">

                          <?php if ($item['image']): ?>
                            <?= wp_get_attachment_image($item['image']['ID'], 'full') ?>
                          <?php endif ?>

                          <?php if ($item['video']): ?>
                            <video src="<?= $item['video']['url'] ?>" loop autoplay playsinline muted></video>
                          <?php endif ?>

                        </div>
                      </div>
                    <?php endif ?>
                    
                    <?php if ($item['text']): ?>
                      <div class="card-text"><?= $item['text'] ?></div>
                    <?php endif ?>
                    
                  </div>
                </div>
              <?php endforeach ?>

            </div>
          </div>
          <div class="swiper-pagination"></div>
        </div>
      </div>
    </section>
  <?php endif ?>

  <?php endif; ?>