<?php
/**
 * @package WordPress
 * @subpackage themename
 */

////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////// START CUSTOM FUNCTIONS ////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////












// removes admin bar on wordpress home
add_filter( 'show_admin_bar', '__return_false' );

// Add Favicon //
function diww_favicon() {
	echo '<link rel="shortcut icon" type="image/x-icon" href="' . get_site_url() . '/favicon.ico" />';
}
add_action('wp_head', 'diww_favicon');
add_action('admin_head', 'diww_favicon');

// pulls in logo for wp admin
function my_login_logo() { ?>
  <style type="text/css">
      body.login div#login h1 a {
          background-image: url(<?php echo get_bloginfo( 'template_directory' ) ?>/assets/images/eclectic_logo.png);
          background-size:contain;
          width: auto;
          height: 90px;
      }
  </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );

// ENQUEUE CSS, LESS, & SCSS STYLESHEETS
function add_style_sheets() {
	if( !is_admin() ) {
		wp_enqueue_style( 'reset', get_template_directory_uri().'/style.css', 'screen'  );
		wp_enqueue_style( 'font-awesome', '//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css', 'screen');
		wp_enqueue_style( 'fancybox', get_template_directory_uri().'/assets/css/jquery.fancybox.css', 'screen' );
		wp_enqueue_style( 'flexslider', get_template_directory_uri().'/assets/css/flexslider.css', 'screen' );
		wp_enqueue_style( 'main_css', get_template_directory_uri().'/assets/css/style.css', 'screen' );
// 		wp_enqueue_style( 'main_less', get_template_directory_uri().'/assets/css/style.less', 'screen' );
	}
}
add_action('wp_enqueue_scripts', 'add_style_sheets');

// ENQUEUE JAVASCRIPT FILES
// function add_javascript() {
// 	if( !is_admin() ) {
// 		wp_enqueue_script( 'jquery' , '//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js' );
// 		wp_enqueue_script( 'genericJS' , get_template_directory_uri().'/assets/js/general.js' );
// 	}
// }
// add_action('wp_enqueue_scripts', 'add_javascript');

/**
 *
 * TAKE GLOBAL DESCRIPTION OUT OF HEADER.PHP AND GENERATE IT FROM A FUNCTION
 *
 */
function site_global_description()
{
	global $page, $paged;
	wp_title( '|', true, 'right' );
	bloginfo( 'name' );
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
	{
		echo " | $site_description";
	}
}


/**
 * REMOVE UNWANTED CAPITAL <P> TAGS
 */
remove_filter( 'the_content', 'capital_P_dangit' );
remove_filter( 'the_title', 'capital_P_dangit' );
remove_filter( 'comment_text', 'capital_P_dangit' );


/**
 * REGISTER NAV MENUS FOR HEADER FOOTER AND UTILITY
 */
register_nav_menus( array(
	'primary' => __( 'Primary Menu', 'themename' ),
	'footer' => __( 'Footer Menu', 'themename' ),
	'utility' => __( 'Utility Menu', 'themename' )
) );


/** 
 * DEFAULT COMMENTS & RSS LINKS IN HEAD
 */
add_theme_support( 'automatic-feed-links' );


/**
 * THEME SUPPORTS THUMBNAILS
 */
add_theme_support( 'post-thumbnails' );


/**
 *	THEME SUPPORTS EDITOR STYLES
 */
add_editor_style("/css/layout-style.css");


/**
 *	ADD TINY IMAGE SIZE FOR ACF FIELDS, BETTER USABILITY
 */
add_image_size( 'mini-thumbnail', 50, 50 );


/**
 *	REPLACE THE HOWDY
 */
function admin_bar_replace_howdy($wp_admin_bar) 
{
    $account = $wp_admin_bar->get_node('my-account');
    $replace = str_replace('Howdy,', 'Welcome,', $account->title);            
    $wp_admin_bar->add_node(array('id' => 'my-account', 'title' => $replace));
}
add_filter('admin_bar_menu', 'admin_bar_replace_howdy', 25);


/**
 * REGISTER SIDEBARS
 */


// custom post type
add_action( 'init', 'create_post_type' );
function create_post_type() {

	$args1 = array(
		'labels' => array(
			'name' => __( 'Designers' ),
			'singular_name' => __( 'Designer' )
		),
		'public' => true,
		'menu_icon' => 'dashicons-admin-users',
		'rewrite' => array('with_front' => false, 'slug' => 'designers'),
		'supports' => array( 'title', 'editor', 'thumbnail' )
	);
  	register_post_type( 'Designers', $args1);

  	$args2 = array(
		'labels' => array(
			'name' => __( 'Services' ),
			'singular_name' => __( 'Service' )
		),
		'public' => true,
		'menu_icon' => 'dashicons-admin-appearance',
		'rewrite' => array('with_front' => false, 'slug' => 'services'),
		'supports' => array( 'title', 'editor')
	);
  	register_post_type( 'Services', $args2);

  	$args3 = array(
		'labels' => array(
			'name' => __( 'Portfolio Projects' ),
			'singular_name' => __( 'Portfolio Project' )
		),
		'public' => true,
		'taxonomies' => array('category'),
		'menu_icon' => 'dashicons-format-gallery',
		'has_archive' => true,
		'rewrite' => array('with_front' => false, 'slug' => 'portfolio-projects'),
		'supports' => array( 'title', 'editor', 'thumbnail')
	);
  	register_post_type( 'Portfolio Projects', $args3);

  	$args4 = array(
		'labels' => array(
			'name' => __( 'Press Posts' ),
			'singular_name' => __( 'Press Post' )
		),
		'public' => true,
		'taxonomies' => array('category'),
		'menu_icon' => 'dashicons-star-empty',
		'has_archive' => true,
		'rewrite' => array('with_front' => false, 'slug' => 'press-posts'),
		'supports' => array( 'title')
	);
  	register_post_type( 'Press Posts', $args4);

  	flush_rewrite_rules();
}

// WOOCOMMERCE

add_filter( 'woocommerce_page_title', 'woo_shop_page_title');

function woo_shop_page_title( $page_title ) {
    if( 'Shop' == $page_title) {
		return "Designer's Picks";
	}
}

//remove default CSS
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

//designer's picks on shop page
add_action( 'pre_get_posts', 'custom_pre_get_posts_query' );

function custom_pre_get_posts_query( $q ) {

	if ( ! $q->is_main_query() ) return;
	if ( ! $q->is_post_type_archive() ) return;
	
	if ( ! is_admin() && is_shop() ) {


		$q->set('orderby','date');
		$q->set('order','DESC');
		$q->set('paged', false);

	}
	remove_action( 'pre_get_posts', 'custom_pre_get_posts_query' );
}

// function custom_pre_get_posts_query( $q ) {

// 	if ( ! $q->is_main_query() ) return;
// 	if ( ! $q->is_post_type_archive() ) return;
	
// 	if ( ! is_admin() && is_shop() ) {


// 		$q->set( 'meta_query', array(array(
// 			'key' => '_featured',
// 			'value' => 'yes',
// 			'operator' => 'IN'
// 		)));

// 	}
// 	remove_action( 'pre_get_posts', 'custom_pre_get_posts_query' );
// }


// 12 products per page
add_filter( 'loop_shop_per_page', create_function( '$cols', 'return 12;' ), 20 );


//single product page reorganization
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50);

// remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15);
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);

//customizing checkout fields
add_filter("woocommerce_checkout_fields", "order_fields");

function order_fields($fields) {
	$fields['billing']['billing_first_name']['class'][3] = 'third first';
	$fields['billing']['billing_last_name']['class'][3] = 'third';
	$fields['billing']['billing_address_1']['class'][3] = 'half first';
	$fields['billing']['billing_address_2']['class'][3] = 'half last';
	$fields['billing']['billing_city']['class'][3] = 'third first';
	$fields['billing']['billing_state']['class'][3] = 'third ';
	$fields['billing']['billing_postcode']['class'][3] = 'third last';
	$fields['billing']['billing_country']['class'][3] = 'third first';
	$fields['billing']['billing_phone']['class'][3] = 'third';
	$fields['billing']['billing_email']['class'][3] = 'third first email';

	$fields['shipping']['shipping_first_name']['class'][3] = 'third first';
	$fields['shipping']['shipping_last_name']['class'][3] = 'third';
	$fields['shipping']['shipping_address_1']['class'][3] = 'half first';
	$fields['shipping']['shipping_address_2']['class'][3] = 'half last';
	$fields['shipping']['shipping_city']['class'][3] = 'third first';
	$fields['shipping']['shipping_state']['class'][3] = 'third ';
	$fields['shipping']['shipping_postcode']['class'][3] = 'third last';
	$fields['shipping']['shipping_country']['class'][3] = 'third first';
	$fields['order']['order_comments']['class'][3] = 'two-thirds';

	$fields['billing']['billing_state']['options'] = array(
  'option_1' => 'Option 1 text',
  'option_2' => 'Option 2 text'
);

	$fields['billing']['billing_city']['label'] = $fields['shipping']['shipping_city']['label'] = 'City';
	$fields['billing']['billing_city']['placeholder'] = $fields['shipping']['shipping_city']['placeholder'] = '';

	$fields['billing']['billing_address_1']['label'] = $fields['shipping']['shipping_address_1']['label'] = 'Street Address';
	$fields['billing']['billing_address_1']['placeholder'] = $fields['shipping']['shipping_address_1']['placeholder'] = '';

	$fields['billing']['billing_address_2']['label'] = $fields['shipping']['shipping_address_2']['label'] = 'Street Address 2';
	$fields['billing']['billing_address_2']['placeholder'] = $fields['shipping']['shipping_address_2']['placeholder'] = '';
	$fields['billing']['billing_address_2']['required'] = $fields['shipping']['shipping_address_2']['required'] = false;
	
	$fields['billing']['billing_postcode']['label'] = $fields['shipping']['shipping_postcode']['label'] = 'Postal Code';
	$fields['billing']['billing_postcode']['placeholder'] = $fields['shipping']['shipping_postcode']['placeholder'] = '';
	$fields['billing']['billing_postcode']['clear'] = $fields['shipping']['shipping_postcode']['clear'] = false;

	$fields['billing']['billing_phone']['clear'] = false;



	$billing = array(
		"billing_first_name",
		"billing_last_name",
		"billing_address_1",
		"billing_address_2",
		"billing_city",
		"billing_state",
		"billing_postcode",
		"billing_country",
		"billing_phone",
		"billing_email"

	);

	$shipping = array(
		"shipping_first_name",
		"shipping_last_name",
		"shipping_address_1",
		"shipping_address_2",
		"shipping_city",
		"shipping_state",
		"shipping_postcode",
		"shipping_country"
	);

	foreach( $billing as $field )
	{
		$billing_fields[$field] = $fields["billing"][$field];
	}

	foreach( $shipping as $field )
	{
		$shipping_fields[$field] = $fields["shipping"][$field];
	}

	$fields["billing"] = $billing_fields;
	$fields["shipping"] = $shipping_fields;

	return $fields;

}


function my_post_queries( $query ) {
	// do not alter the query on wp-admin pages and only alter it if it's the main query
	if (!is_admin() && $query->is_main_query()){

		if(is_category()){

			$query->set('paged', get_query_var('paged'));
			$query->set('posts_per_page', 3);
		}

	}
}
add_action( 'pre_get_posts', 'my_post_queries' );


//disable reviews for products
add_filter( 'woocommerce_product_tabs', 'wcs_woo_remove_reviews_tab', 98 );
function wcs_woo_remove_reviews_tab($tabs) {
	unset($tabs['reviews']);
	return $tabs;
}

//View all in Woocommerce Pagination
add_filter('loop_shop_per_page', 'wg_view_all_products', 20);
 
function wg_view_all_products($cols){
	if (isset($_GET['view'])) {
		if($_GET['view'] === 'all'){
        	return '999';
    	} else {
        	return '15';
    	}
	}
    
}

//adding cateagory descripton to category page if exists
add_action( 'woocommerce_after_subcategory_title', 'my_add_cat_description', 12);

function my_add_cat_description ($category) {
	$cat_id=$category->term_id;
	$prod_term=get_term($cat_id,'product_cat');
	$description=$prod_term->description;
	echo '<div class="shop_cat_desc">'.$description.'</div>';
}




add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}






















