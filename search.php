<?php
/**
 * The template for displaying search results pages
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

<?php if(isset($_GET['search-type'])) {
	$type = $_GET['search-type'];
	if($type == 'product') {
		load_template(TEMPLATEPATH . '/product-search.php');
	} elseif($type == 'post') {
		load_template(TEMPLATEPATH . '/post-search.php');
	}
} ?>

<?php get_footer(); ?>
