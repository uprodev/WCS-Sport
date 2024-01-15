<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

  <section class="page-header-career">
    <div class="page-header-top">
      <div class="container-fluid">
        <div class="row align-items-end">
          <div class="col-lg-4 col-xxl-6">

            <?php if ($title): ?>
              <h2><?= $title ?></h2>
            <?php endif ?>

            <?php 
            $args = [
              'object_type' => ['career']
            ];
            $taxonomies = get_taxonomies($args);
            ?>

            <?php if ($taxonomies): ?>
              <div class="tags d-lg-none fade-up">

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
          <div class="col-lg-8 col-xxl-6 d-none d-lg-block">

            <?php if ($text): ?>
              <div class="lead fade-up-wrapper"><?= $text ?></div>
            <?php endif ?>
            
          </div>
        </div>
      </div>
    </div>
    <div class="page-header-bottom">
      <div class="container-fluid">

        <?php if ($text): ?>
          <div class="d-lg-none">
            <div class="lead fade-up-wrapper"><?= $text ?></div>
          </div>
        <?php endif ?>

        <?php if ($taxonomies): ?>
          <div class="d-none d-lg-block">
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
          </div>
        <?php endif ?>
        
      </div>
    </div>
  </section>

  <?php endif; ?>