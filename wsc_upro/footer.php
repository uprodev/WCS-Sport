<?php if (is_front_page()): ?>
</div>
<?php endif ?>

</main>

<button type="button" class="scroll-to-top">
  <svg width="8" height="8" viewBox="0 0 8 8" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path fill-rule="evenodd" clip-rule="evenodd" d="M4.32847 1.97916L4.32847 7.9684H3.29458L3.29458 1.97916L1.07538 4.19836L0.344304 3.46729L3.81152 7.10078e-05L7.27874 3.46729L6.54767 4.19836L4.32847 1.97916Z" fill="#0B0B0B" />
  </svg>
</button>

<footer class="footer bg-primary">
  <div class="container-fluid">

    <?php if ($field = get_field('text_f', 'option')): ?>
      <div class="footer-headline"><?= $field ?></div>
      <div class="footer-icon"><img src="<?= get_stylesheet_directory_uri() ?>/images/arrow-footer.svg" alt="" /></div>
    <?php endif ?>

    <div class="d-flex justify-content-between">
      <nav class="footer-nav">

        <?php wp_nav_menu( array(
          'theme_location'  => 'footer',
          'container'       => '',
          'items_wrap'      => '<ul>%3$s</ul>'
        )); ?>

        <?php if ($field = get_field('copyright_f', 'option')): ?>
          <p><?= $field ?></p>
        <?php endif ?>
        
      </nav>

      <?php if(have_rows('socials_f', 'option')): ?>

        <nav class="footer-socials">
          <ul>

            <?php while(have_rows('socials_f', 'option')): the_row() ?>

              <?php if ($field = get_sub_field('link')): ?>
                <li>
                  <a href="<?= $field['url'] ?>"<?php if($field['target']) echo ' target="_blank"' ?>><?= $field['title'] ?></a>
                </li>
              <?php endif ?>

            <?php endwhile ?>

          </ul>
        </nav>

      <?php endif ?>

    </div>
  </div>
</footer>
</div>

<?php wp_footer(); ?>

</body>
</html>