<!DOCTYPE html>
<html <?php language_attributes() ?> style="scroll-behavior: unset !important">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <?php wp_head(); ?>

  <?php the_field('head_script_h', 'option') ?>

</head>

<?php /*require dirname(__FILE__) . '/inc/api.php'*/ ?>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>

  <?php the_field('body_script_h', 'option') ?>
  
  <div class="global-wrapper<?php if(is_front_page()) echo ' global-wrapper-home' ?>">
    <div class="header">
      <div class="container-fluid d-flex justify-content-between">

        <?php if ($field = get_field('logo_h', 'option')): ?>
          <a href="<?= get_home_url() ?>" class="site-logo">
            <?= wp_get_attachment_image($field['ID'], 'full', false, array('class' => 'img-svg')) ?>
          </a>
        <?php endif ?>
        
        <nav class="navigation-main">
          <div class="inner">

            <?php wp_nav_menu( array(
              'theme_location'  => 'header',
              'container'       => '',
              'items_wrap'      => '<ul>%3$s</ul>'
            )); ?>

            <?php if ($field = get_field('link_h', 'option')): ?>
              <a href="<?= $field['url'] ?>" class="btn btn-primary btn-sm"<?php if($field['target']) echo ' target="_blank"' ?>>
                <span class="btn-label-wrap">
                  <span class="btn-label" data-text="<?= $field['title'] ?>"><?= $field['title'] ?></span>
                </span>
              </a>
            <?php endif ?>
            
          </div>
        </nav>

        <button class="navbar-toggler"><span class="navbar-toggler-icon"></span></button>
      </div>
    </div>
    
    <main class="content">

      <?php if (is_front_page()): ?>
        <div class="bg-secondary">
          <?php endif ?>