<?php if(is_post_type_archive('our_work')):

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
  <?php $i++; ?>

<?php else: ?>

  <article class="post">
    <h3 class="post-date">Posted on <?php echo get_the_date('F j, Y'); ?></h3>
    <h2 class="post-title"><?php the_title(); ?></h2>
    <?php the_content(); ?>
  </article>
  
<?php endif; ?>