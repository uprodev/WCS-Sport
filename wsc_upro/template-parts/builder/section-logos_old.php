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

      <?php if($gallery): ?>

        <div class="logos-list">
          <ul>

            <?php foreach($gallery as $index => $image): ?>

              <?php if ($index == 0 || $index % 3 == 0): ?>
                <li>
                  <div class="logo-inner">
                  <?php endif ?>

                  <span<?php if($index < 9) echo ' class="logo-item"' ?>>
                    <?= wp_get_attachment_image($image['ID'], 'full') ?>
                  </span>

                  <?php if (($index + 1) % 3 == 0 || $index == count($gallery) - 1): ?>
                </div>
              </li>
            <?php endif ?>


          <?php endforeach; ?>

        </ul>
      </div>

    <?php endif; ?>

  </div>
</section>

<?php endif; ?>