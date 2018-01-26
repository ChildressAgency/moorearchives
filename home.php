<?php get_header(); ?>
<main id="main">
  <div class="container">
    <div class="row">
      <div class="col-sm-8">
        <?php echo do_shortcode('[ajax_load_more post_type="post" container_type="div" scroll="false"]'); ?>
      </div>
      <div class="col-sm-4">
        <?php get_sidebar(); ?>
      </div>
    </div>
  </div>
</main>
<?php get_footer(); ?>