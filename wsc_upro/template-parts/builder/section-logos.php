<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

  <section class="block-logos<?php if($title || $text) echo ' block-logos--text' ?>">
    <div class="container-fluid">

      <?php if ($title || $text): ?>
        <div class="text-center">

          <?php if ($title): ?>
            <h3><?= $title ?></h3>
          <?php endif ?>

          <?php if ($text): ?>
            <div class="fade-up fs-21">
              <?= $text ?>
            </div>
          <?php endif ?>

        </div>
      <?php endif ?>

      <?php if ($items): ?>
        <div class="d-none d-md-block">
          <div class="logos-list">
            <ul>

              <?php foreach ($items as $item): ?>

                <?php if($item['gallery']): ?>

                  <li>
                    <div class="logo-inner">

                      <?php foreach($item['gallery'] as $image): ?>

                        <span>
                          <?= wp_get_attachment_image($image['ID'], 'full') ?>
                        </span>

                      <?php endforeach; ?>

                    </div>
                  </li>

                <?php endif; ?>

              <?php endforeach ?>

            </ul>
          </div>
        </div>
      <?php endif ?>

      <?php if ($items_mobile): ?>
        <div class="d-md-none">
          <div class="logos-list">
            <ul>

              <?php foreach ($items_mobile as $item): ?>

                <?php if($item['gallery']): ?>

                  <li>
                    <div class="logo-inner">

                      <?php foreach($item['gallery'] as $image): ?>

                        <span>
                          <?= wp_get_attachment_image($image['ID'], 'full') ?>
                        </span>

                      <?php endforeach; ?>

                    </div>
                  </li>

                <?php endif; ?>

              <?php endforeach ?>

            </ul>
          </div>
        </div>
      <?php endif ?>

    </div>
  </section>

  <?php endif; ?>