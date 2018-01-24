<?php get_header(); ?>
  <main id="main">
    <div class="container">
      <div class="go-back">
        <?php 
          $referrer = filter_var($_SERVER['HTTP_REFERER'], FILTER_VALIDATE_URL);
          if(!empty($referrer)){
            echo '<a href="' . $referrer . '" class="btn-main">Back</a>'; 
          }
          else{
            echo '<a href="javascript:history.go(-1)" class="btn-main">Back</a>';
          }
        ?>
      </div>
      <article>
        <?php if(have_posts()): while(have_posts()): the_post(); ?>
          <h2><?php the_title(); ?></h2>
          <h4><?php echo get_the_date('F j, Y'); ?></h4>
          <hr />
          <?php the_content(); ?>
        <nav id="single-nav">
          <ul class="pager">
            <li class="previous"><?php previous_post_link('%link', 'Previous', TRUE); ?></li>
            <li class="next"><?php next_post_link('%link', 'Next', TRUE); ?></li>
          </ul>
        </nav>
      </article>
    </div>
  </main>
<?php get_footer(); ?>