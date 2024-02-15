<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

  <section class="page-header-career<?php if($is_background) echo ' bg-primary' ?>">
    <div class="container-fluid">
      <div class="row align-items-center justify-content-between">
        <div class="col-md-6 col-xl-5">

          <?php if ($title): ?>
            <h2><?= $title ?></h2>
          <?php endif ?>

          <?php 
          $args = [
            'object_type' => ['career']
          ];
          $taxonomies = get_taxonomies($args);
          ?>

        </div>
        <div class="col-md-6 col-xl-5 col-xxl-6">

          <?php if ($text): ?>
            <div class="fade-up"><?= $text ?></div>
          <?php endif ?>

        </div>
      </div>

      <?php if ($taxonomies): ?>
        <div class="tags fade-up">

          <?php foreach ($taxonomies as $taxonomy): ?>

            <?php $terms = wp_get_object_terms(get_the_ID(), $taxonomy) ?>

            <?php if ($terms): ?>
              <?php foreach ($terms as $term): ?>
                <span><?= $term->name ?></span>
              <?php endforeach ?>
            <?php endif ?>

          <?php endforeach ?>

        </div>
      <?php endif ?>

    </div>
  </section>

  <?php endif; ?>