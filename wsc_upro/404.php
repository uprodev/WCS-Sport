<?php get_header(); ?>

<section class="block-thank">
    <div class="container-fluid text-center">

      <?php if ($field = get_field('text_404', 'option')): ?>
        <div class="lines-wrapper"><?= $field ?></div>
      <?php endif ?>
      
      <?php if ($field = get_field('link_404', 'option')): ?>
        <a href="<?= $field['url'] ?>" class="btn btn-primary"<?php if($field['target']) echo ' target="_blank"' ?>>
          <span class="btn-label-wrap">
            <span class="btn-label" data-text="<?= $field['title'] ?>"><?= $field['title'] ?></span>
          </span>
          <span class="btn-arrow">
            <span class="btn-arrow-inner">
              <svg xmlns="http://www.w3.org/2000/svg" width="6" height="6" viewBox="0 0 6 6" fill="none">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M4.23503 4.96611L0 0.731074L0.731074 0L4.96611 4.23503V1.09661H6V6H1.09661L1.09661 4.96611H4.23503Z" fill="#0B0B0B" />
              </svg>
            </span>
            <span class="btn-arrow-inner">
              <svg xmlns="http://www.w3.org/2000/svg" width="6" height="6" viewBox="0 0 6 6" fill="none">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M4.23503 4.96611L0 0.731074L0.731074 0L4.96611 4.23503V1.09661H6V6H1.09661L1.09661 4.96611H4.23503Z" fill="#0B0B0B" />
              </svg>
            </span>
          </span>
        </a>
      <?php endif ?>

    </div>
  </section>
	
<?php get_footer(); ?>