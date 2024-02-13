<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

  <?php if ($items): ?>
    <section class="block-testimonials block-testimonials--padding-top">
      <div class="testimonials-slider bg-gray">
        <div class="container-fluid">
          <div class="swiper">
            <div class="swiper-wrapper">

              <?php foreach ($items as $item): ?>
                <div class="swiper-slide">
                  <div class="item">
                    <figure>

                      <?php if ($item['text']): ?>
                        <blockquote class="blockquote"><?= $item['text'] ?></blockquote>
                      <?php endif ?>
                      
                      <figcaption class="blockquote-footer">

                        <?php if ($item['name']): ?>
                          <strong><?= $item['name'] ?></strong>
                        <?php endif ?>
                        
                        <?php if ($item['organization']): ?>
                          <span><?= $item['organization'] ?></span>
                        <?php endif ?>
                        
                      </figcaption>
                    </figure>
                  </div>
                </div>
              <?php endforeach ?>
              
            </div>
            <div class="swiper-pagination"></div>
          </div>
        </div>
      </div>
    </section>
  <?php endif ?>

  <?php endif; ?>