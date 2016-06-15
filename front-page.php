<?php get_header(); ?>
<div class="header-image full-width clickable">
	<?php 
	if( have_rows('slider') ): ?>
	<div class="border-left"></div>
	<div class="flexslider homepage">
		<ul class="slides">
		<?php while( have_rows('slider') ): the_row(); 
			$image = get_sub_field('slider_image');
			$text = get_sub_field('slider_text');
			$link = get_sub_field('cta_link'); ?>
			<li>
				<img src="<?php echo $image ?>">
				<?php if ($text) { ?>
					<div class="slider-text">
						<?php echo $text ?>
						<a href="<?php echo $link ?>">
							<div class="button">Shop now</div>
						</a>
					</div>
				<?php } ?>
			</li>
		<?php endwhile; ?>
		</ul>
	</div>
	<div class="border-right"></div>
	<?php endif; ?>
</div>

<div class="instagram center">
	<h3>follow us on instagram <a href="https://www.instagram.com/eclecticcharleston/" target=_blank>@eclecticcharleston</a></h3>
	<div id="instafeed">
	
	</div>
</div>

<div class="splash-signup">
	<span class="close">X</span>
	<h2>Help Us Help You!</h2>
	<div class="pre-signup">
		<p>Join our mailing list and receive a 10% discount code to shop online at Eclectic.</p>
		<!-- Begin MailChimp Signup Form -->
			<form action="//eclecticcharleston.us10.list-manage.com/subscribe/post?u=bbe4633b2d33af3e7a55a9f09&amp;id=60f15146c9" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
				<input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
				<div id="mce-responses" class="clear">
					<div class="response" id="mce-error-response" style="display:none"></div>
					<div class="response" id="mce-success-response" style="display:none"></div>
				</div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
			    <div style="position: absolute; left: -5000px;"><input type="text" name="b_bbe4633b2d33af3e7a55a9f09_60f15146c9" tabindex="-1" value=""></div>
			    <input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button">
			</form>
		<script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';fnames[4]='MMERGE4';ftypes[4]='text';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
		<!--End mc_embed_signup-->
	</div>
</div>
<?php get_footer(); ?>