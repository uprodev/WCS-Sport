<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

  <?php if ($text): ?>
    <section class="block-text">
      <div class="container-fluid">
        <?= $text ?>
      </div>
    </section>
  <?php endif ?>

  <?php endif; ?>