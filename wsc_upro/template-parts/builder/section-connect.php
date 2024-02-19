<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

  <?php if ($connects): ?>
    <section class="block-scroll-list bg-secondary text-primary">

      <?php if ($image): ?>
        <div class="block-image">
          <?= wp_get_attachment_image($image['ID'], 'full') ?>
        </div>
      <?php endif ?>
      
      <div class="container-fluid">
        <div class="scroller">

          <?php if ($title): ?>
            <h3><?= $title ?></h3>
          <?php endif ?>

          <ul>

            <?php foreach ($connects as $item): ?>
              <li>

                <?php if ($item['city']): ?>
                  <div class="h1"><?= $item['city'] ?></div>
                <?php endif ?>
                
                <div class="text">

                  <?php if ($item['phone']): ?>
                    <p><a href="tel:<?= preg_replace('/[^0-9]/', '', $item['phone']) ?>"><?= $item['phone'] ?></a></p>
                  <?php endif ?>
                  
                  <?php if ($item['address']): ?>
                    <p><?= $item['address'] ?></p>
                  <?php endif ?>
                  
                </div>
                <div class="line"></div>
              </li>
            <?php endforeach ?>

          </ul>
        </div>
      </div>
    </section>
  <?php endif ?>

  <?php endif; ?>