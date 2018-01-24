<?php get_header(); ?>
  <main id="main">
    <div class="container">
      <?php if(have_posts()): ?>
        <article>
          <?php while(have_posts()): the_post(); ?>
            <?php the_content(); ?>
          <?php endwhile; ?>
        </article>
      <?php endif; ?>
      <?php if(have_rows('services')): ?>
        <div class="row">
          <?php $i=0; while(have_rows('services')): the_row(); 
            if($i%2==0){ echo '<div class="clearfix"></div>'; } ?>
            <div class="col-sm-6">
              <div class="service-card" style="background-image:url(<?php the_sub_field('service_icon'); ?>); <?php the_sub_field('service_icon_css'); ?>">
                <h2><?php the_sub_field('service_name'); ?></h2>
                <?php if(get_sub_field('service_subtitle')): ?>
                  <h3><?php the_sub_field('service_subtitle'); ?></h3>
                <?php endif; ?>
                <?php the_sub_field('service_description'); ?>
              </div>
            </div>
          <?php $i++; endwhile; ?>
        </div>
      <?php endif; ?>
    </div>
  </main>
  <section id="aic">
    <div class="container">
      <div class="row">
        <div class="col-sm-6">
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/aic-logo.png" class="img-responsive center-block" alt="" />
        </div>
        <div class="col-sm-6">
          <?php the_field('aic_section_content'); ?>
        </div>
      </div>
    </div>
  </section>
<?php get_footer(); ?>