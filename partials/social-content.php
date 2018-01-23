<div class="social">
  <?php if(get_field('facebook', 'option')): ?>
    <a href="<?php the_field('facebook', 'option'); ?>" class="fa-stack" target="_blank">
      <i class="fa fa-circle fa-stack-2x"></i>
      <i class="fa fa-facebook fa-stack-1x"></i>
    </a>
  <?php endif; if(get_field('twitter', 'option')): ?>
    <a href="<?php the_field('twitter', 'option'); ?>" class="fa-stack" target="_blank">
      <i class="fa fa-circle fa-stack-2x"></i>
      <i class="fa fa-twitter fa-stack-1x"></i>
    </a>
  <?php endif; if(get_field('tumblr', 'option')): ?>
    <a href="<?php the_field('tumblr', 'option'); ?>" class="fa-stack" target="_blank">
      <i class="fa fa-circle fa-stack-2x"></i>
      <i class="fa fa-tumblr fa-stack-1x"></i>
    </a>
  <?php endif; if(get_field('instagram', 'option')): ?>
    <a href="<?php the_field('instagram', 'option'); ?>" class="fa-stack" target="_blank">
      <i class="fa fa-circle fa-stack-2x"></i>
      <i class="fa fa-instagram fa-stack-1x"></i>
    </a>
  <?php endif; if(get_field('linkedin', 'option')): ?>
    <a href="<?php the_field('linkedin', 'option'); ?>" class="fa-stack" target="_blank">
      <i class="fa fa-circle fa-stack-2x"></i>
      <i class="fa fa-linkedin fa-stack-1x"></i>
    </a>
  <?php endif; if(get_field('twitch', 'option')): ?>
    <a href="<?php the_field('twitch', 'option'); ?>" class="fa-stack" target="_blank">
      <i class="fa fa-circle fa-stack-2x"></i>
      <i class="fa fa-twitch fa-stack-1x"></i>
    </a>
  <?php endif; ?>
</div>
