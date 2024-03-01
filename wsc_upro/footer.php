<?php if (is_front_page()): ?>
</div>
<?php endif ?>

</main>
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