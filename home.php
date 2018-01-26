<?php get_header(); ?>
<main id="main">
  <div class="container">
    <div class="row">
      <div class="col-sm-8">
        <div id="posts">
        <?php
          $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
          $ppp = 4;
          $book_reports = new WP_Query(array(
            'post_type' => 'post',
            'post_status' => 'publish',
            'posts_per_page' => $ppp,
            'paged' => $paged
          )); 

          if($book_reports->have_posts()): 
            $max_page = $book_reports->max_num_pages; ?>
            <div id="p<?php echo $paged; ?>" class="page">
            <?php if($paged == $max_page){ echo '<span class="lastpage"></span>'; } ?>
            <?php while($book_reports->have_posts()): $book_reports->the_post(); ?>
              <article class="post">
                <h3 class="post-date">Posted on <?php echo get_the_date('F j, Y'); ?></h3>
                <h2 class="post-title"><?php the_title(); ?></h2>
                <?php the_content(); ?>
              </article>
            <?php endwhile; ?>
            </div>
        <?php endif; ?>
        </div><!-- #posts -->
        <a href="#" class="load-more">Load More</a>
      </div>
      <div class="col-sm-4">
        <?php get_sidebar(); ?>
      </div>
    </div>
  </div>
</main>
<?php get_footer(); ?>