<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

  <section class="block-case-result bg-primary<?php if($is_image_on_the_right) echo ' block-case-result--img-right' ?>">
    <div class="container-fluid">
      <div class="row justify-content-between">
        <div class="col-md-6">

          <?php if ($image): ?>
            <div class="image">
              <?= wp_get_attachment_image($image['ID'], 'full') ?>
            </div>
          <?php endif ?>
          
        </div>
        <div class="col-md-6">
          <div class="text">

            <?php if ($title): ?>
              <h3><?= $title ?></h3>
            <?php endif ?>

            <?php if ($items): ?>
              <ul class="fade-up-wrapper">

                <?php foreach ($items as $item): ?>
                  <li>

                    <?php if ($item['title']): ?>
                      <strong><?= $item['title'] ?></strong>
                    <?php endif ?>

                    <?php if ($item['text']): ?>
                      <span><?= $item['text'] ?></span>
                    <?php endif ?>

                  </li>
                <?php endforeach ?>

              </ul>
            <?php endif ?>

            <?php if ($text): ?>
              <div class="fade-up"><?= $text ?></div>
            <?php endif ?>
            
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php endif; ?>