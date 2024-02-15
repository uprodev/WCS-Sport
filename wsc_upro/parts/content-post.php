<div class="card card-blog">
  <div class="card-header">

    <?php $terms = get_the_terms(get_the_ID(), 'category') ?>

    <?php if ($terms): ?>
      <?php foreach ($terms as $term): ?>
        <div class="category"><?= $term->name ?></div>
      <?php endforeach ?>
    <?php endif ?>
    
    <div class="title">
      <a href="<?php the_permalink() ?>"><?php the_title() ?></a>
    </div>
  </div>

  <?php if (has_post_thumbnail()): ?>
    <div class="card-img-top">
      <a href="<?php the_permalink() ?>">
        <?php the_post_thumbnail('full') ?>
      </a>

      <?php if ($field = get_field('icon')): ?>
        <span class="icon">
          <?= wp_get_attachment_image($field['ID'], 'full') ?>
        </span>
      <?php endif ?>
      
    </div>
  <?php endif ?>
  
  <div class="card-body">
    <p><?= get_the_date() ?></p>
  </div>
</div>