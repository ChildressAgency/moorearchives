<?php get_header(); ?>
<main id="main">
  <div class="container">
    <div class="row">
      <div class="col-sm-8">
        <?php //echo do_shortcode('[ajax_load_more pause="true" scroll="false"]'); ?>
        <?php if(have_posts()): while(have_posts()): the_post(); ?>
          <article class="post">
            <h3 class="post-date">Posted on <?php echo get_the_date('F j, Y'); ?></h3>
            <h2 class="post-title"><?php the_title(); ?></h2>
            <?php the_content(); ?>
          </article>
          <?php endwhile; endif; ?>
      </div>
      <div class="col-sm-4">
        <?php get_sidebar(); ?>
      </div>
    </div>
  </div>
</main>
<?php get_footer(); ?>