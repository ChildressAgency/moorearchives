  <section id="contactLocation">
    <div class="container-fluid container-sm-height">
      <div class="row row-sm-height">
        <div id="chat" class="col-sm-6 col-sm-height">
          <div class="contact-location">
            <i class="fa fa-comment"></i>
            <h2>Let's Chat.</h2>
            <p>Follow the link below to reach our about your archival needs. After filling out the form, we will have a better understanding of how best to serve you.</p>
            <a href="#" class="btn-main">Go To form</a>
          </div>
        </div>
        <div id="contact" class="col-sm-6 col-sm-height">
          <div class="contact-location">
            <i class="fa fa-map-marker"></i>
            <h2>Serving Virginia, Maryland, and Washington D.C.</h2>
          </div>
        </div>
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