<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

  <section class="block-home block-home-3 bg-white">
    <div class="block-inner bg-light">
      <div class="container-fluid">

        <?php if ($number): ?>
          <div class="number home-animated-text"><?= $number ?></div>
        <?php endif ?>

        <?php if ($text): ?>
          <?= $text ?>
        <?php endif ?>

        <?php if($gallery_mobile): ?>

          <div class="d-md-none fade-up-wrapper">
            <div class="logos-list">
              <ul>

                <?php foreach($gallery_mobile as $image): ?>

                  <li>
                    
                    <?php if ($image['type'] == 'image'): ?>
                      <?= wp_get_attachment_image($image['ID'], 'full') ?>
                    <?php endif ?>
                    
                    <?php if ($image['type'] == 'video'): ?>
                      <video src="<?= $image['url'] ?>" playsinline loop muted autoplay></video>
                    <?php endif ?>
                    
                  </li>

                <?php endforeach; ?>

              </ul>
            </div>
          </div>

        <?php endif; ?>

        <?php if($gallery): ?>

          <div class="d-none d-md-block fade-up-wrapper">
            <div class="logos-list">
              <ul>>

                <?php foreach($gallery as $image): ?>

                  <li>
                    
                    <?php if ($image['type'] == 'image'): ?>
                      <?= wp_get_attachment_image($image['ID'], 'full') ?>
                    <?php endif ?>
                    
                    <?php if ($image['type'] == 'video'): ?>
                      <video src="<?= $image['url'] ?>" playsinline loop muted autoplay></video>
                    <?php endif ?>
                    
                  </li>

                <?php endforeach; ?>

              </ul>
            </div>
          </div>

        <?php endif; ?>

        <?php if ($link): ?>
          <div class="text-center">
            <a href="<?= $link['url'] ?>" class="btn btn-outline-secondary"<?php if($link['target']) echo ' target="_blank"' ?>>
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
          </div>
        <?php endif ?>

      </div>
    </div>
  </section>

  <?php endif; ?>