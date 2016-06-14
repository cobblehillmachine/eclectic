<?php
/**
 * @package WordPress
 * @subpackage themename
 */

get_header(); ?>

<div class="primary">
  <section class="page error404 not-found">
    <div class="page-content">
      <p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for.', 'themename' ); ?>
      </p>
    </div>
  </section>
</div>

<?php get_footer(); ?>
