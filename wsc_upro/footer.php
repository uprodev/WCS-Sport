<?php if (is_front_page()): ?>
</div>
<?php endif ?>

</main>

<?php if (is_singular('post') || is_page(19)): ?>
  <button type="button" class="scroll-to-top">
    <svg width="8" height="8" viewBox="0 0 8 8" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path fill-rule="evenodd" clip-rule="evenodd" d="M4.32847 1.97916L4.32847 7.9684H3.29458L3.29458 1.97916L1.07538 4.19836L0.344304 3.46729L3.81152 7.10078e-05L7.27874 3.46729L6.54767 4.19836L4.32847 1.97916Z" fill="#0B0B0B" />
    </svg>
  </button>
<?php endif ?>

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

        <?php if(have_rows('links_f', 'option')): ?>

          <ul>

            <?php while(have_rows('links_f', 'option')): the_row() ?>

              <?php if ($field = get_sub_field('link')): ?>
                <li<?php if(get_row_index() == count(get_field('links_f', 'option'))) echo ' class="acc"' ?>>
                  <a href="<?= $field['url'] ?>"<?php if($field['target']) echo ' target="_blank"' ?>><?= $field['title'] ?></a>
                </li>
              <?php endif ?>

            <?php endwhile ?>

          </ul>

        <?php endif ?>
        
      </nav>

      <div>
        <!-- Accessibility Code for "wsc-sports.com" -->
        <script>
/*

Want to customize your button? visit our documentation page:

https://login.equalweb.com/custom-button.taf

*/
          window.interdeal = {
            "sitekey": "79cb74224328a0deaeb03961230d1e54",
            "Position": "left",
            "domains": {
              "js": "https://cdn.equalweb.com/",
              "acc": "https://access.equalweb.com/"
            },
            "Menulang": "EN",
            "btnStyle": {
              "vPosition": [
                "80%",
                "20%"
                ],
              "scale": [
                "0.6",
                "0.6"
                ],
              "color": {
                "main": "#1a1a1a",
                "second": "#ffffff"
              },
              "icon": {
                "type": 1,
                "shape": "circle"
              }
            }
          };
          (function(doc, head, body){
            var coreCall             = doc.createElement('script');
            coreCall.src             = interdeal.domains.js + 'core/4.6.10/accessibility.js';
            coreCall.defer           = true;
            coreCall.integrity       = 'sha512-YxhVaPiQod/CzOAJfJGAvDUZwFnOTWC43rUispL33FBWCOyWe/JSqlx2Zk9rw8RZsFYyw+xXVkTQY8NsHxx/QA==';
            coreCall.crossOrigin     = 'anonymous';
            coreCall.setAttribute('data-cfasync', true );
            body? body.appendChild(coreCall) : head.appendChild(coreCall);
          })(document, document.head, document.body);
        </script>
      </div>

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