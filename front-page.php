<?php get_header(); ?>
  <main id="main">
    <div class="container">
      <article>
        <?php if(have_posts()): while(have_posts()): the_post(); ?>
          <?php the_content(); ?>
        <?php endwhile; endif; ?>
        <a href="<?php echo home_url('services'); ?>" class="btn-main">View Our Services</a>
      </article>
    </div>
  </main>
<?php get_footer(); ?>