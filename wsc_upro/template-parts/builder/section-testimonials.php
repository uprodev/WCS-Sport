<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

  <section class="block-testimonials">
    <div class="container-fluid">
      <div class="text-center">

        <?php if ($title): ?>
          <h3><?= $title ?></h3>
        <?php endif ?>
        
        <?php if ($text): ?>
          <div class="fade-up-overflow fs-21">
            <?= $text ?>
          </div>
        <?php endif ?>
        
      </div>
      
      <?php if ($main): ?>
        <div class="testimonial testimonial--video">
          <div class="row">
            <div class="col-md-6">

              <?php if ($main['video']): ?>
                <div class="video-wrapper">
                  <div class="video img-fade">
                    <video src="<?= $main['video']['url'] ?>" muted autoplay playsinline>></video>
                  </div>
                  <div class="video-controls">
                    <button class="video-replay"></button>
                    <button class="video-play"></button>
                    <button class="video-sound"></button>
                  </div>
                </div>
              <?php endif ?>

            </div>
            <div class="col-md-6">

              <?php if ($main['text']): ?>
                <div class="testimonial-text fade-up">
                  <figure>
                    <blockquote class="blockquote">
                      <?= $main['text'] ?>
                    </blockquote>

                    <?php if ($main['name'] || $main['organization']): ?>
                      <figcaption class="blockquote-footer">

                        <?php if ($main['name']): ?>
                          <strong><?= $main['name'] ?></strong>
                        <?php endif ?>

                        <?php if ($main['organization']): ?>
                          <span><?= $main['organization'] ?></span>
                        <?php endif ?>

                      </figcaption>
                    <?php endif ?>

                  </figure>
                </div>
              <?php endif ?>

            </div>
          </div>
        </div>
      <?php endif ?>
    </div>

    <?php if ($items): ?>
      <div class="testimonials-slider bg-primary">
        <div class="container-fluid">
          <div class="swiper fade-up">
            <div class="swiper-wrapper">

              <?php foreach ($items as $item): ?>
                <?php if ($item['text']): ?>
                  <div class="swiper-slide">
                    <div class="item">
                      <figure>
                        <blockquote class="blockquote">
                          <?= $item['text'] ?>
                        </blockquote>
                        
                        <?php if ($item['name'] || $item['organization']): ?>
                          <figcaption class="blockquote-footer">

                            <?php if ($item['name']): ?>
                              <strong><?= $item['name'] ?></strong>
                            <?php endif ?>

                            <?php if ($item['organization']): ?>
                              <span><?= $item['organization'] ?></span>
                            <?php endif ?>

                          </figcaption>
                        <?php endif ?>

                      </figure>
                    </div>
                  </div>
                <?php endif ?>
              <?php endforeach ?>
              
            </div>
            <div class="swiper-pagination"></div>
          </div>
        </div>
      </div>
    <?php endif ?>
    
  </section>

  <?php endif; ?>