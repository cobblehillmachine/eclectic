<?php
/**
 * @package WordPress
 * @subpackage Eclectic
 */
?>

		</div> <!-- ENDS MAIN CONTAINER -->

		<footer class="">
			<div class="footer-top">
				<div class="phone-number">
					<?php the_field('address_display_text', 'user_2'); ?>
				</div>
				<div class="address">
					<a target=_blank href="mailto:sidney@eclecticcharleston.com">sidney@eclecticcharleston.com</a>
				</div>
				<div class="social">
					<a target=_blank href="<?php the_field('facebook_link', 'user_2') ?>"><i class="fa fa-facebook"></i></a>
					<a target=_blank href="<?php the_field('instagram_link', 'user_2') ?>"><i class="fa fa-instagram"></i></a>
					<a target=_blank href="<?php the_field('twitter_link', 'user_2') ?>"><i class="fa fa-twitter"></i></a>
					<a target=_blank href="<?php the_field('pinterest_link', 'user_2') ?>"><i class="fa fa-pinterest"></i></a>
					<a target=_blank href="mailto:<?php the_field('email', 'user_2') ?>"><i class="fa fa-envelope"></i></a>
				</div>
			</div>
			<div class="footer-bottom">
				<?php wp_nav_menu(array('menu' => 'Footer Menu')) ?>
				<!-- Begin MailChimp Signup Form -->

					<form action="//eclecticcharleston.us10.list-manage.com/subscribe/post?u=bbe4633b2d33af3e7a55a9f09&amp;id=718ce57317" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>

						<input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL" placeholder="Enter Email Here...">
						<input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button">
						<div id="mce-responses" class="clear">
							<div class="response" id="mce-error-response" style="display:none"></div>
							<div class="response" id="mce-success-response" style="display:none"></div>
						</div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
					    <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_bbe4633b2d33af3e7a55a9f09_718ce57317" tabindex="-1" value=""></div>
					    

					</form>

					<script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
					<!--End mc_embed_signup-->
				<div class="cobble-hill">
					<a href="http://cobblehilldigital.com">Site by Cobble Hill</a>
				</div>
			</div>
		</footer>


		<?php wp_footer(); ?>
	</div> <!-- ENDS BODY WRAPPER -->
</body>
</html>