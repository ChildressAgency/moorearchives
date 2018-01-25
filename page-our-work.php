<?php get_header(); ?>
  <main id="main">
    <div class="container">
      <?php 
        if(get_field('featured_project')): 
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

      <section id="pastWork" class="past-works">
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
                  <li><a href="<?php esc_url(get_term_link($term); ?>"><?php echo $term->name; ?></a></li>
                <?php endforeach; ?>
              </ul>
            </nav>
        <?php endif; ?>

        <?php
          $projects = new WP_Query(array(
            'post_type' => 'our_work',
            'post_status' => 'publish',
            'post__not_in' => array($featured_project_id);
          ));

          if($projects->have_posts()): ?>
            <div class="row">
              <?php $i=0; while($projects->have_posts()): $projects->the_post();
                if($i%2==0){ echo '<div class="clearfix"></div>'; } 
                $project_featured_img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full', true);
                $project_featured_img_url = $project_featured_img[0];
                $project_featured_img_x_pos = get_field('featured_image_horizontal_position');
                $project_featured_img_y_pos = get_field('featured_image_vertical_position'); ?>

                <div class="col-sm-6">
                  <div class="past-work past-work-card">
                    <div class="past-work-img" style="background-image:url(<?php echo $project_featured_img_url; ?>); background_position:<?php echo $project_featured_img_x_pos . ' ' . $project_featured_img_y_pos; ?>;"></div>
                    <h2>
                      <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h2>
                    <h4 class="work-date"><?php echo get_the_date('F j, Y'); ?></h4>
                  </div>
                </div>
              <?php $i++; endwhile; ?>
            </div>
        <?php endif; wp_reset_postdata(); ?>
        <a href="#" class="load-more"></a>
      </div>
    </section>
  </main>
<?php get_footer(); ?>