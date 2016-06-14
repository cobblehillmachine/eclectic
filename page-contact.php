<?php get_header(); ?>
<div class="full-width desktop">
	<?php the_post_thumbnail('full'); ?>
</div>
<div class="offset-cont contact">
	<div class="main-cont">
		<div id="map-canvas"></div>
	</div>
	<div class="side-cont">
		<h3>ADDRESS</h3>
		<ul>
			<li><a target=_blank href="<?php the_field('google_map_url', 'user_2') ?>"><?php the_field('address', 'user_2'); ?></a></li>
		</ul>
<!--
		<h3>BOUTIQUE HOURS</h3>
		<?php the_field('hours', 'user_2'); ?>
-->
		<h3>PHONE</h3>
		<ul>
			<li><?php the_field('phone_number', 'user_2'); ?></li>
		</ul>
		<h3>EMAIL</h3>
		<ul>
			<li><a href="mailto:<?php the_field('email', 'user_2'); ?>"><?php the_field('email', 'user_2'); ?></a></li>
			<li><a href="mailto:<?php the_field('press_email', 'user_2'); ?>"><?php the_field('press_email', 'user_2'); ?></a></li>
		</ul>
	</div>
	<div class="form-cta">Interested in our design services? Fill out our <a href="/design#design-request-form">Design Request form</a>.</div>
</div>
<?php get_footer(); ?>
