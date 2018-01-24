<?php get_header(); ?>
  <main id="main">
    <div class="container">
      <div class="row">
        <div class="col-sm-6">
          <div class="contact-info">
            <h2>Phone<span><?php the_field('phone', 'option'); ?></span></h2>
            <h4><?php the_field('hours', 'option'); ?></h4>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="contact-info">
            <h2>Email<span><?php the_field('hours', 'option'); ?></span></h2>
          </div>
        </div>
      </div>
      <article>
        <?php if(have_posts()): while(have_posts()): the_post(); ?>
          <?php the_content(); ?>
        <?php endwhile; endif; ?>
      </article>
    </div>
  </main>
<?php get_footer(); ?>