<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

  <?php if ($items): ?>
    <section class="block-outcome">
      <div class="container-fluid">
        <ul>

          <?php foreach ($items as $item): ?>
            <li>
              <div class="item">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="text lines-wrapper">

                      <?php if ($item['title']): ?>
                        <h4><?= $item['title'] ?></h4>
                      <?php endif ?>
                      
                      <?php if ($item['text']): ?>
                        <?= $item['text'] ?>
                      <?php endif ?>
                      
                      <?php if ($item['icon']): ?>
                        <div class="icon">
                          <?= wp_get_attachment_image($item['icon']['ID'], 'full') ?>
                        </div>
                      <?php endif ?>
                      
                    </div>
                  </div>
                  <div class="col-lg-6">

                    <?php if ($item['image'] || $item['image_mobile']): ?>
                      <div class="image">
                        <picture>
                          <source srcset="<?= $item['image']['url'] ?: $item['image_mobile']['url'] ?>" media="(min-width: 768px)" />
                            <?= wp_get_attachment_image($item['image_mobile']['ID'] ?: $item['image']['ID'], 'full') ?>
                          </picture>
                        </div>
                      <?php endif ?>

                    </div>
                  </div>
                </div>
              </li>
            <?php endforeach ?>

          </ul>
        </div>
      </section>
    <?php endif ?>

    <?php endif; ?>