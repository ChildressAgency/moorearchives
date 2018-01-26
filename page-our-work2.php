<?php get_header(); ?>
  <main id="main">
    <div class="container">
      <?php 
          $featured_project_id = get_field('featured_project');

          if($featured_project_id){
            $featured_project_args = array(
              'post_type' => 'our_work',
              'p' => $featured_project_id
            );
          }
          else{
            $featured_project_args = array(
              'post_type' => 'our_work',
              'posts_per_page' => 1,
              'post_status' => 'publish'
            );
          }

          $featured_project = new WP_Query($featured_project_args);

          if($featured_project->have_posts()): while($featured_project->have_posts()): $featured_project->the_post(); 
            $featured_project_id = get_the_ID(); ?>
            <article>
              <div class="row">
                <div class="col-sm-6">
                  <h2 class="work-section-title">Featured</h2>
                  <div class="featured-work-summary">
                    <h2><?php the_title(); ?></h2>
                    <hr />
                    <?php the_excerpt(); ?>
                    <h3><?php echo get_the_date('F j, Y'); ?></h3>
                    <a href="<?php the_permalink(); ?>" class="btn-main">View Project</a>
                  </div>
                </div>
                <div class="col-sm-6">
                  <?php the_post_thumbnail('full', array('class' => 'img-responsive center-block')); ?>
                </div>
              </div>
            </article>
        <?php endwhile; endif; wp_reset_postdata(); ?>

      <section id="pastWork">
        <h2 class="work-section-title">Past Work</h2>
        <?php
          $terms = get_terms('work_categories');
          if(!empty($terms) && !is_wp_error($terms)): ?>
            <nav id="work-nav">
              <ul class="nav navbar-nav">
                <li class="active">
                  <a href="<?php echo home_url('our-work'); ?>">All</a>
                </li>
                <?php foreach($terms as $term): ?>
                  <li><a href="<?php esc_url(get_term_link($term)); ?>"><?php echo $term->name; ?></a></li>
                <?php endforeach; ?>
              </ul>
            </nav>
        <?php endif; ?>

        <div class="row past-works">
          <?php $i=0; ?>
          <?php echo do_shortcode('[ajax_load_more post_type="our_work" posts_per_page="6" container_type="div" scroll="false" post__not_in="' . $featured_project_id . '"]'); ?>
        </div>

      </div>
    </section>
  </main>
<?php get_footer(); ?>