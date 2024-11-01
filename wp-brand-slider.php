<?php
/*
Plugin Name: WP Brand Logo Slider
Plugin URI: http://www.e2soft.com/blog/wp-brand-logo-slider/
Description: WP Brand Logo Slider is a wordpress plugin to display your brand logo or client logo on your WordPress website!  Use this shortcode <strong>[WPBLS-SLIDER]</strong> in the post/page" where you want to brand logo.
Version: 1.1.4
Author: Hasibul Islam Badsha
Author URI: https://www.bdtrips.com/
Copyright: 2019
License URI: license.txt
Text Domain: wpbls
*/


#######################	WP Brand Logo Slider ###############################

/**
	Register Custom Post Type.
**/
if ( ! function_exists('wpbls_post_type') ) {

// Register Custom Post Type
function wpbls_post_type() {

	$labels = array(
		'name'                  => _x( 'Brands', 'Post Type General Name', 'wpbls' ),
		'singular_name'         => _x( 'Brand', 'Post Type Singular Name', 'wpbls' ),
		'menu_name'             => __( 'Brands', 'wpbls' ),
		'name_admin_bar'        => __( 'Brand', 'wpbls' ),
		'archives'              => __( 'Brand Archives', 'wpbls' ),
		'attributes'            => __( 'Brand Attributes', 'wpbls' ),
		'parent_item_colon'     => __( 'Parent Brand:', 'wpbls' ),
		'all_items'             => __( 'All Brands', 'wpbls' ),
		'add_new_item'          => __( 'Add New Brand', 'wpbls' ),
		'add_new'               => __( 'Add New Brand', 'wpbls' ),
		'new_item'              => __( 'New Brand', 'wpbls' ),
		'edit_item'             => __( 'Edit Brand', 'wpbls' ),
		'update_item'           => __( 'Update Brand', 'wpbls' ),
		'view_item'             => __( 'View Brand', 'wpbls' ),
		'view_items'            => __( 'View Brands', 'wpbls' ),
		'search_items'          => __( 'Search Brand', 'wpbls' ),
		'not_found'             => __( 'Not found', 'wpbls' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'wpbls' ),
		'featured_image'        => __( 'Featured Image', 'wpbls' ),
		'set_featured_image'    => __( 'Set featured image', 'wpbls' ),
		'remove_featured_image' => __( 'Remove featured image', 'wpbls' ),
		'use_featured_image'    => __( 'Use as featured image', 'wpbls' ),
		'insert_into_item'      => __( 'Insert into brand', 'wpbls' ),
		'uploaded_to_this_item' => __( 'Uploaded to this brand', 'wpbls' ),
		'items_list'            => __( 'Brands list', 'wpbls' ),
		'items_list_navigation' => __( 'Brands list navigation', 'wpbls' ),
		'filter_items_list'     => __( 'Filter brands list', 'wpbls' ),
	);
	$args = array(
		'label'                 => __( 'Brand', 'wpbls' ),
		'description'           => __( 'Brand Description', 'wpbls' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'brand', $args );

}
add_action( 'init', 'wpbls_post_type', 0 );

}

/**
	Register Stylesheet and Javascript.
**/
function register_wpbls_style()
{
	wp_enqueue_script( 'wpbls-js', plugins_url('/js/jquery.flexisel.js', __FILE__), array('jquery') );
	wp_enqueue_style( 'wpbls-style', plugins_url('/css/wpbls.css', __FILE__) );
}
add_action('wp_enqueue_scripts', 'register_wpbls_style');

/**
	Register Admin Stylesheet and Javascript.
**/
function register_wpbls_admin_style()
{
	wp_enqueue_style( 'wpbls-admin', plugins_url('/css/wpbls-admin.css', __FILE__) );
	wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script( 'iris', admin_url( 'js/iris.min.js' ), array( 'jquery-ui-draggable', 'jquery-ui-slider', 'jquery-touch-punch' ), false, 1 );
	wp_enqueue_script( 'cp-active', plugins_url('/js/cp-active.js', __FILE__), array('jquery'), '', true );
}
add_action( 'admin_enqueue_scripts', 'register_wpbls_admin_style' ); 


/**
	Get post for create brand logo.
**/
function wpbls_brand_loop() 
{ 

?>

<ul id="flexiselDemo2">
  <?php
	$wpbls_order = get_option('wpbls_order');

$loop = new WP_Query( array(
    'post_type' => 'brand',
	'orderby' => 'date',
	'order' => $wpbls_order
  )
);
?>
  <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
  <li><a href="<?php the_permalink() ?>" target="_blank" rel="nofollow"><img src="<?php the_post_thumbnail_url( '150' ); ?> " /></a></li>
  <?php endwhile; wp_reset_query(); ?>
</ul>
<?php
}
/**
	Create Brand Shortcode.
**/
function wpbls_brand_loop_slider()
{
	return wpbls_brand_loop();
}
add_shortcode('WPBLS-SLIDER', 'wpbls_brand_loop');


/**
	Define brand slider style type.
**/
function wpbls_slide_script(){ 
	$wpbls_auto_play = get_option('wpbls_auto_play');
	$wpbls_visible_items = get_option('wpbls_visible_items');
	$wpbls_item_scrol = get_option('wpbls_item_scrol');
	$wpbls_puse_hover = get_option('wpbls_puse_hover');
	
?>
<script type="text/javascript">

jQuery(window).load(function() {
    jQuery("#flexiselDemo2").flexisel({
        visibleItems: <?php echo $wpbls_visible_items; ?>,
        itemsToScroll: <?php echo $wpbls_item_scrol; ?>,
        animationSpeed: 200,
        infinite: true,
        navigationTargetSelector: null,
        autoPlay: {
            enable: <?php echo $wpbls_auto_play; ?>,
            interval: 5000,
            pauseOnHover: <?php echo $wpbls_puse_hover; ?>,
        },
        responsiveBreakpoints: { 
            portrait: { 
                changePoint:480,
                visibleItems: 1,
                itemsToScroll: 1
            }, 
            landscape: { 
                changePoint:640,
                visibleItems: 2,
                itemsToScroll: 2
            },
            tablet: { 
                changePoint:768,
                visibleItems: 3,
                itemsToScroll: 3
            }
        },
        loaded: function(object) {
            console.log('Slider loaded...');
        },
        before: function(object){
            console.log('Before transition...');
        },
        after: function(object) {
            console.log('After transition...');
        },
        resize: function(object){
            console.log('After resize...');
        }
    });
});
</script>
<?php }
add_action('wp_footer', 'wpbls_slide_script');


/**
	Get all php file.
**/
foreach ( glob( plugin_dir_path( __FILE__ )."lib/*.php" ) as $php_file )
    include_once $php_file;

/**
	Redirect to plugin settings page.
**/

register_activation_hook(__FILE__, 'wpbls_plugin_activate');
add_action('admin_init', 'wpbls_plugin_redirect');

function wpbls_plugin_activate() {
    add_option('wpbls_plugin_do_activation_redirect', true);
}

function wpbls_plugin_redirect() {
    if (get_option('wpbls_plugin_do_activation_redirect', false)) {
        delete_option('wpbls_plugin_do_activation_redirect');
        if(!isset($_GET['activate-multi']))
        {
            wp_redirect("edit.php?post_type=brand&page=wp-brand-slider");
        }
    }
}