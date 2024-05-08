<div class="card card-blog">
  <div class="card-header lines-wrapper">

    <?php $terms = get_the_terms(get_the_ID(), 'category') ?>

    <?php if ($terms): ?>
      <?php foreach ($terms as $term): ?>
        <div class="category"><?= $term->name ?></div>
      <?php endforeach ?>
    <?php endif ?>
    
    <a href="<?php the_permalink() ?>" class="title"><?php the_title() ?></a>
  </div>

  <?php if (($field = get_field('card_image')) || has_post_thumbnail()): ?>
  <?php $thumbnail_size = 'large' ?>
  <div class="card-img-top">
    <a href="<?php the_permalink() ?>">
      <?= $field ? wp_get_attachment_image($field['ID'], $thumbnail_size) : get_the_post_thumbnail(get_the_ID(), $thumbnail_size) ?>
    </a>

    <?php if ($field = get_field('icon')): ?>
      <span class="icon">
        <?= wp_get_attachment_image($field['ID'], 'full') ?>
      </span>
    <?php endif ?>
    
  </div>
<?php endif ?>

<div class="card-body lines-wrapper">
  <p><?= get_the_date() ?></p>
</div>
</div>