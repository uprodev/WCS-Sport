<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

  <section class="page-header-full-width">
    <div class="container-fluid">

      <?php if ($title): ?>
        <h2><?= $title ?></h2>
      <?php endif ?>

      <div class="row align-items-end flex-md-row-reverse">
        <div class="col-md-4">

          <?php if ($link): ?>
            <div class="text-end fade-up">
              <a href="<?= $link['url'] ?>" class="btn btn-primary btn-rounded"<?php if($link['target']) echo ' target="_blank"' ?>>
                <span class="btn-text"><?= $link['title'] ?></span>
                <svg xmlns="http://www.w3.org/2000/svg" width="6" height="6" viewBox="0 0 6 6" fill="none">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M4.23503 4.96611L0 0.731074L0.731074 0L4.96611 4.23503V1.09661H6V6H1.09661L1.09661 4.96611H4.23503Z" fill="#0B0B0B" />
                </svg>
              </a>
            </div>
          <?php endif ?>

        </div>
        <div class="col-md-8">
          <div class="text fade-up">

            <?php if ($label): ?>
              <p>
                <small><strong><?= $label ?></strong></small>
              </p>
            <?php endif ?>

            <?php if ($text): ?>
              <?= $text ?>
            <?php endif ?>

          </div>
        </div>
      </div>
    </div>
  </section>

  <?php endif; ?>