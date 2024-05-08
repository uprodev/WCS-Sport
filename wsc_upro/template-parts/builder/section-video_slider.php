<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

  <?php if ($items): ?>
    <section class="block-video-slider bg-secondary">
      <div class="container-fluid">
        <div class="video-slider">
          <div class="swiper-pagination-list">
            <ul></ul>
          </div>

          <div class="swiper">
            <div class="swiper-wrapper">

              <?php foreach ($items as $item): ?>
                <div class="swiper-slide" data-title="<?= $item['title'] ?>">
                  <div class="row">
                    <div class="col-video">

                      <?php if ($item['video']): ?>
                        <div class="video-wrapper">
                          <video src="<?= $item['video']['url'] ?>" muted playsinline></video>
                        </div>
                      <?php endif ?>
                      
                    </div>
                    <div class="col-text">

                      <?php if ($item['text']): ?>
                        <div class="text"><?= $item['text'] ?></div>
                      <?php endif ?>
                      
                    </div>
                  </div>
                </div>
              <?php endforeach ?>

            </div>
          </div>

          <div class="swiper-controls">
            <div class="inner">
              <div class="video-controls">
                <button class="btn-video-play"></button>
              </div>
              <div class="swiper-button-prev">
                <svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M11.2442 19.2579L1.96875 9.98242L11.2088 0.742329" stroke="#E5FF00" stroke-width="2" />
                </svg>
              </div>
              <div class="swiper-pagination"></div>
              <div class="swiper-button-next">
                <svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M9.7245 0.742086L19 10.0176L9.75991 19.2577" stroke="#E5FF00" stroke-width="2" />
                </svg>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  <?php endif ?>

  <?php endif; ?>