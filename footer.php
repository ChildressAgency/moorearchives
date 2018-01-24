  <section id="nhpaQuote">
    <div class="container">
      <?php if(get_field('quote')): ?>
        <?php the_field('quote'); ?>
        <cite>- <?php the_field('quote_author'); ?></cite>
      <?php else: ?>
        <?php the_field('quote', 'option'); ?>
        <cite>- <?php the_field('quote_author', 'option'); ?></cite>
      <?php endif; ?>
    </div>
  </section>
  <?php if(is_front_page()): ?>
    <section id="feeds">
      <div class="container-fluid container-sm-height">
        <div class="row row-sm-height">
          <div id="instagram" class="col-sm-6 col-sm-height">
            <div class="feed">
              <i class="fa fa-instagram"></i>
              <?php echo do_shortcode('[instagram_feed]'); ?>
              <div class="feed-nav">
                <a href="<?php the_field('instagram', 'option'); ?>">Go To Instagram</a>
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/arrows-icon.png" class="img-responsive center-block" alt="" />
                <a href="<?php the_field('instagram', 'option'); ?>">View Gallery</a>
              </div>
            </div>
          </div>
          <div id="twitch" class="col-sm-6 col-sm-height">
            <div class="feed">
              <i class="fa fa-twitch"></i>
              <?php echo do_shortcode('[twitch_feed]'); ?>
              <div class="feed-nav">
                <a href="<?php the_field('twitch', 'option'); ?>">Go To Twitch</a>
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/arrows-icon.png" class="img-responsive center-block" alt="" />
                <a href="<?php the_field('twitch', 'option'); ?>">View More Videos</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <?php 
      $our_work_page = get_page_by_path('our-work');
      $our_work_page_id = $our_work_page->ID;
      $featured_project_id = get_field('featured_project', $our_work_page_id);

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

      if($featured_project->have_posts()): ?>
        <section id="latestProjects">
          <div class="container">
            <h2>Latest Projects</h2>
            <div class="row">
              <div class="col-sm-6">
                <?php while($featured_project->have_posts()): $featured_project->the_post(); 
                  $featured_project_featured_img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full', true);
                  $featured_project_featured_img_url = $featured_project_featured_image[0];
                  $featured_project_id = get_the_ID(); ?>

                  <a href="<?php the_permalink(); ?>" class="featured-project" style="background-image:url(<?php echo $featured_project_featured_img_url; ?>);">
                    <div class="featured-project-caption">
                      <h3><?php the_title(); ?></h3>
                      <hr />
                      <?php the_excerpt(); ?>
                      <p class="project-date"><?php echo get_the_date('F j, Y'); ?></p>
                    </div>
                    <div class="overlay"></div>
                  </a>
                <?php endwhile; $featured_project->reset_postdata(); ?>
              </div>
              <div class="col-sm-6">
                <?php $projects = new WP_Query(array(
                  'post_type' => 'our_work',
                  'posts_per_page' => 3,
                  'post_status' => 'publish',
                  'post__not_in' => array($featured_project_id)
                ));

                if($projects->have_posts()): ?>
                  <ul class="list-unstyled project-list">
                    <?php while($projects->have_posts()): $projects->the_post();
                      $project_featured_img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full', true);
                      $project_featured_img_url = $project_featured_img[0]; 
                      $project_featured_img_x_pos = get_field('featured_image_horizontal_position'); 
                      $project_featured_img_y_pos = get_field('featured_image_vertical_position'); ?>

                      <li>
                        <a href="<?php the_permalink(); ?>" style="background-image:url(<?php echo $project_featured_img_url; ?>); background-position:<?php echo $project_featured_img_x_pos . ' ' . $project_featured_img_y_pos; ?>;">
                          <div class="project-caption">
                            <h3><?php the_title(); ?></h3>
                            <p class="project-date"><?php echo get_the_date('F j, Y'); ?></p>
                          </div>
                          <div class="overlay"></div>
                        </a>
                      </li>

                    <?php endwhile; $projects->reset_postdata(); ?>
                  </ul>
                <?php endif; ?>
                <a href="<?php echo home_url('our-work'); ?>" class="btn-main">View All Projects</a>
              </div>
            </div>
          </div>
        </section>
  <?php endif; ?>

  <section id="contactLocation">
    <div class="container-fluid container-sm-height">
      <div class="row row-sm-height">
        <div id="chat" class="col-sm-6 col-sm-height">
          <div class="contact-location">
            <i class="fa fa-comment"></i>
            <?php the_field('lets_chat_section', 'option'); ?>
            <a href="<?php echo home_url('contact'); ?>" class="btn-main">Go To form</a>
          </div>
        </div>
        <?php if(is_front_page()): ?>
          <div id="contact" class="col-sm-6 col-sm-height">
            <div class="contact-location">
              <i class="fa fa-map-marker"></i>
              <h2>Serving Virginia, Maryland, and Washington D.C.</h2>
            </div>
          </div>
        <?php else: ?>
          <div id="nextPage" class="col-sm-6 col-sm-height">
            <div class="contact-location">
              <h2><?php the_field('next_page_text'); ?></h2>
              <a href="<?php the_field('next_page_link'); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/right-arrow.png" class="img-responsive center-block" alt="" /></a>
            </div>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </section>
  <footer>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-2">
          <img src="images/logo-icon.png" class="img-responsive center-block" alt="" />
        </div>
        <div class="col-sm-8">
          <p class="footer-contact-info"><?php the_field('hours', 'option'); ?> &bull; <?php the_field('phone', 'option'); ?> &bull; <?php the_field('email', 'option'); ?></p>
          <?php 
            $footer_nav_args = array(
              'theme_location' => 'footer-nav',
              'menu' => '',
              'container' => 'div',
              'container_class' => '',
              'container_id' => 'footer-nav',
              'menu_class' => 'nav navbar-nav',
              'menu_id' => '',
              'echo' => true,
              'fallback_cb' => 'moorearchives_footer_fallback_menu',
              'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
              'depth' => 1
            );
            wp_nav_menu($footer_nav_args); ?>
            
          <p class="footnote"><?php the_field('footnote', 'option'); ?></p>
        </div>
        <div class="col-sm-2">
          <?php get_template_part('partials/social', 'content'); ?>
        </div>
      </div>
      <p class="copyright">&copy;<?php echo date('Y'); ?> Moore Archives</p>
      <p class="copyright">website created by <a href="https://childressagency.com" target="_blank">The Childress Agency</a></p>
    </div>
  </footer>
  <?php wp_footer(); ?>
</body>

</html>