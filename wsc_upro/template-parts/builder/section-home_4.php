<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

  <section class="block-home block-home-4 bg-secondary">
    <div class="block-inner bg-secondary">
      <div class="section-horizontal">
        <div class="slide1">

          <?php if ($text): ?>
            <?= $text ?>
          <?php endif ?>

          <div class="d-flex position-relative">

            <?php if ($link): ?>
              <a href="<?= $link['url'] ?>" class="btn btn-primary"<?php if($link['target']) echo ' target="_blank"' ?>>
                <span class="btn-label-wrap">
                  <span class="btn-label" data-text="<?= $link['title'] ?>"><?= $link['title'] ?></span>
                </span>
                <span class="btn-arrow">
                  <span class="btn-arrow-inner">
                    <svg xmlns="http://www.w3.org/2000/svg" width="6" height="6" viewBox="0 0 6 6" fill="none">
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M4.23503 4.96611L0 0.731074L0.731074 0L4.96611 4.23503V1.09661H6V6H1.09661L1.09661 4.96611H4.23503Z" fill="#0B0B0B" />
                    </svg>
                  </span>
                  <span class="btn-arrow-inner">
                    <svg xmlns="http://www.w3.org/2000/svg" width="6" height="6" viewBox="0 0 6 6" fill="none">
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M4.23503 4.96611L0 0.731074L0.731074 0L4.96611 4.23503V1.09661H6V6H1.09661L1.09661 4.96611H4.23503Z" fill="#0B0B0B" />
                    </svg>
                  </span>
                </span>
              </a>
            <?php endif ?>
            
            <?php if ($video || $url_video): ?>
              <div class="video-arrow">
                <video src="<?= $video ? $video['url'] : $url_video ?>" playsinline muted loop autoplay></video>
              </div>
            <?php endif ?>
            
          </div>
        </div>

        <?php if ($items): ?>

          <div class="d-md-flex">

            <?php foreach ($items as $index => $item): ?>
              <div class="slide<?= $index + 2 ?>">
                <div class="card-home">
                  <div class="card-body">

                    <?php if ($item['title']): ?>
                      <div class="card-title"><?= $item['title'] ?></div>
                    <?php endif ?>

                    <?php 
                    $is_icon = $item['icon_type'] == 'Icon' && $item['icon'];
                    $is_lottie = $item['icon_type'] == 'Lottie' && $item['lottie'];
                    ?>

                    <?php if ($is_icon || $is_lottie): ?>
                      <div class="card-icon">

                        <?php if ($is_icon): ?>
                          <?= wp_get_attachment_image($item['icon']['ID'], 'full') ?>
                        <?php endif ?>
                        
                        <?php if ($is_lottie): ?>
                          <lottie-player class="lottie" loop src="<?= get_stylesheet_directory_uri() ?>/json/<?= $item['lottie'] ?>"></lottie-player>
                        <?php endif ?>
                        

                      </div>
                    <?php endif ?>

                    <?php if ($item['text']): ?>
                      <?= $item['text'] ?>
                    <?php endif ?>

                    <div class="card-footer">

                      <?php if ($item['name']): ?>
                        <strong><?= $item['name'] ?></strong>
                      <?php endif ?>

                      <?php if ($item['logo']): ?>
                        <div class="card-logo">
                          <?= wp_get_attachment_image($item['logo']['ID'], 'full') ?>
                        </div>
                      <?php endif ?>

                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach ?>

          </div>
          
        <?php endif ?>
        
        <div class="slide<?= $items ? count($items) + 2 : 2 ?>">
          <div class="circle"></div>
          <div class="wrapper">
            <div class="slide-text"><?= $final_text ?></div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php endif; ?>