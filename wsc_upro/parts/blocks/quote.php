<?php if ($field = get_field('quote')): ?>
  <div class="quote-wrapper">
    <div class="inner">
      <div class="container-fluid">
        <div class="row justify-content-end">
          <div class="col-md-9">
            <figure>
              <blockquote class="blockquote lines-wrapper">
                <p><?= $field ?></p>
              </blockquote>

              <?php if (get_field('name') || get_field('organization')): ?>
              <figcaption class="blockquote-footer">

                <?php if ($name = get_field('name')): ?>
                  <strong><?= $name ?></strong>
                <?php endif ?>
                
                <?php if ($organization = get_field('organization')): ?>
                  <span><?= $organization ?></span>
                <?php endif ?>
                
              </figcaption>
            <?php endif ?>
            
          </figure>
        </div>
      </div>
    </div>
  </div>
</div>
<?php endif ?>