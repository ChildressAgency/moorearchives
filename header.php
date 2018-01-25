<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="">

  <meta http-equiv="cache-control" content="public">
  <meta http-equiv="cache-control" content="private">

  <title><?php wp_title(' | ', 'echo', 'right'); ?><?php bloginfo('name'); ?></title>

  <?php wp_head(); ?>
  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body <?php body_class(); ?>>
  <div class="masthead">
    <div class="container">
      <?php get_template_part('partials/social', 'content'); ?>
      <a href="#" class="header-logo">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo.png" class="img-responsive center-block" alt="Moore Archives Logo" />
      </a>
      <p class="hours-phone"><?php the_field('hours', 'option'); ?> &bull; <?php the_field('phone', 'option'); ?></p>
    </div>
  </div>
  <nav id="header-nav">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="expanded" aria-controls="navbar">
          <span class="sr-only"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>
      <?php 
        $header_nav_args = array(
          'theme_location' => 'header-nav',
          'menu' => '',
          'container' => 'div',
          'container_class' => 'navbar-collapse collapse',
          'container_id' => 'navbar',
          'menu_class' => 'nav navbar-nav',
          'menu_id' => '',
          'echo' => true,
          'fallback_cb' => 'moorearchives_header_fallback_menu',
          'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
          'depth' => 2,
          'walker' => new wp_bootstrap_navwalker()
        );
        wp_nav_menu($header_nav_args); ?>

    </div>
  </nav>

  <?php if(is_front_page()): ?>
    <div class="hero hp-hero">
      <div class="container">
        <div class="row">
          <div class="col-sm-6">
            <div class="hero-caption">
              <h1><?php the_field('hero_caption_title'); ?></h1>
              <p><?php the_field('hero_caption'); ?></p>
              <a href="<?php the_field('hero_button'); ?>" class="btn-main"><?php the_field('hero_button_text'); ?></a>
            </div>
          </div>
          <div class="col-sm-6">
            <img src="<?php the_field('hero_image'); ?>" class="img-responsive center-block" alt="" />
          </div>
        </div>
      </div>
    </div>
  <?php else: ?>
    <div class="hero">
      <div class="container">
        <h1><?php echo is_singular('our_work') ? 'Our Work' : get_the_title(); ?></h1>
      </div>
    </div>
  <?php endif; ?>