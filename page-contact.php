<?php get_header(); ?>

<div class="contact wide-cont">
	<div class="table">
		<div class="table-cell">
			<img src="<?php the_field('picture') ?>">
		</div>
		<div class="table-cell">
			<div class="gray">
				<div class="content">
					<h2>Let's Connect</h2>
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
			</div>
			<div class="form-cta">
				<div class="content">
					Interested in our design services? Fill out our <a href="/design#design-request-form">Design Request form</a>.
				</div>
			</div>
		</div>
	</div>
</div>

	
	
</div>
<?php get_footer(); ?>
