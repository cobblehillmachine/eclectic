<?php get_header(); ?>

<div class="toolbar shop filter">
	<li class="mobile-nav-header">Categories</li>
	<ul class="shop-menu">
	<?php $productCategories = get_terms('product_cat', array('hide_empty' => 0,  'parent' =>0 )); 
	foreach($productCategories as $productCategory) : ?>
		<li class="category">
			<a class="topcategory" href="<?php echo get_term_link( $productCategory->slug, $productCategory->taxonomy ); ?>"><?php echo $productCategory->name; ?></a>
			<?php $subcategories = get_categories(array( 'hierarchical' => 1,'show_option_none' => '','hide_empty' => 0,'parent' => $productCategory->term_id,'taxonomy' => 'product_cat', 'orderby' => 'name', 'order' => 'ASC'));
				if ($subcategories) { ?>
					<ul class="sub-menu">
						<li class="subcategory mobile"><a href="<?php echo get_term_link( $productCategory->slug, $productCategory->taxonomy ); ?>">View All</a></li>
						<?php foreach ($subcategories as $subcategory): ?>
							<li class="subcategory"><a href="<?php echo get_term_link( $subcategory->slug, $subcategory->taxonomy );?>"><?php echo $subcategory->name;?></a></li>
						<?php endforeach; ?>
				  
				
				</ul>
			<?php } ?>
		</li>
	<?php endforeach; ?>
	</ul>
</div>


<?php if (is_shop()) { ?>
<div class="shop-page header desktop">
	<?php echo get_the_post_thumbnail( 7, 'full'); ?>
</div>
<?php } ?>

<div class="shop-wrapper">
	<?php if (is_shop()) { ?>
		<div class="page-title">
		
			<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
				<input type="search" class="search-field" placeholder="Search Shop" value="<?php echo get_search_query(); ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label', 'twentysixteen' ); ?>" />
				<input type="hidden" name="search-type" value="product" />
				<button type="submit" class="search-submit"><i class="fa fa-search"></i></button>
			</form>
			<h3>Enjoy $10 Flat Rate Shipping For A Limited Time<hr></h3>
		</div>
	<?php } else if (is_single()) { ?>
		<h3 class="shipping-banner float">Enjoy $10 Flat Rate Shipping For A Limited Time</h3>
	<?php } else { ?>
		<h3 class="shipping-banner">Enjoy $10 Flat Rate Shipping For A Limited Time</h3>
		<div class="page-title">
			
			<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
				<input type="search" class="search-field" placeholder="Search Shop" value="<?php echo get_search_query(); ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label', 'twentysixteen' ); ?>" />
				<input type="hidden" name="search-type" value="product" />
				<button type="submit" class="search-submit"><i class="fa fa-search"></i></button>
			</form>
			
			<h3>
			<?php  if (is_search()) {
				printf( __( 'Search Results for: %s', 'twentysixteen' ), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?>
				<hr>
			<?php } else if (is_archive()) {	
				if (single_cat_title( '', true )) {
					echo single_cat_title( '', true );
				} else {
					echo woocommerce_page_title();
				} ?>
				 <hr>
			<?php } ?>
			</h3>
			
		</div>
	<?php } ?>



