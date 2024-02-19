<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

  <section class="block-join bg-primary">
    <div class="container-fluid">
      <div class="row align-items-center">
        <div class="col-md-6 col-lg-4">

          <?php if ($titles): ?>
            <?php foreach ($titles as $item): ?>
              <?php if ($item['title']): ?>
                <h3><?= $item['title'] ?></h3>
              <?php endif ?>
            <?php endforeach ?>
          <?php endif ?>
          
          <?php if ($link): ?>
            <div class="block-join-btn fade-up d-lg-none">
              <a href="<?= $link['url'] ?>" class="btn btn-outline-secondary"<?php if($link['target']) echo ' target="_blank"' ?>>
                <?= $link['title'] ?>
                <svg xmlns="http://www.w3.org/2000/svg" width="6" height="6" viewBox="0 0 6 6" fill="none">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M4.23503 4.96611L0 0.731074L0.731074 0L4.96611 4.23503V1.09661H6V6H1.09661L1.09661 4.96611H4.23503Z" fill="#0B0B0B" />
                </svg>
              </a>
            </div>
          <?php endif ?>

        </div>

        <?php if ($video): ?>
          <div class="col-md-6 col-lg-4">
            <div class="fade-up">
              <div class="video">
                <video src="<?= $video['url'] ?>"<?php if($image) echo ' poster="' . $image['url'] . '"' ?>></video>
              </div>
            </div>
          </div>
        <?php endif ?>

        <?php if ($link): ?>
          <div class="col-lg-4 d-none d-lg-block align-self-end">
            <div class="block-join-btn fade-up">
              <a href="<?= $link['url'] ?>" class="btn btn-outline-secondary"<?php if($link['target']) echo ' target="_blank"' ?>>
                <?= $link['title'] ?>
                <svg xmlns="http://www.w3.org/2000/svg" width="6" height="6" viewBox="0 0 6 6" fill="none">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M4.23503 4.96611L0 0.731074L0.731074 0L4.96611 4.23503V1.09661H6V6H1.09661L1.09661 4.96611H4.23503Z" fill="#0B0B0B" />
                </svg>
              </a>
            </div>
          </div>
        <?php endif ?>

      </div>
    </div>
  </section>

  <?php endif; ?>