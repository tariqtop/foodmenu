<?php 
/*
Plugin Name: Food Menu
Plugin URI : http://plugins.tariqxpress.com/food-menu
Version: 1.1
Author: Tariq
Author URI: http://tariqxpress.com
Description: Food Menu plugin for food listing. It's light weight and responsive plugin for WordPress. 
*/

// Don't allow direct file access
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

// Food Menu Scripts
function foodmenujsscript() {
    wp_enqueue_script( 'foolightbx-js', plugins_url( '/js/jquery.fancybox.pack.js', __FILE__ ), array(), false, true);
    wp_enqueue_script( 'bootstp-js', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', array(), false, true);
    wp_enqueue_script( 'foodmenu-js', plugins_url( '/js/foodmenu.js', __FILE__ ), array(), false, true);
}
add_action('wp_enqueue_scripts','foodmenujsscript');

// Food Menu CSS
function foomenuscript() {
    wp_enqueue_style( 'fmlight-css', plugins_url( '/css/jquery.fancybox.css', __FILE__ ), array(), false );
    wp_enqueue_style( 'botstp-css', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css', array(), false );
    wp_enqueue_style( 'afontaw-css', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', array(), false );
    wp_enqueue_style( 'foodmenu-css', plugins_url( '/css/foodmenu.css', __FILE__ ), array(), false );
}
add_action('wp_enqueue_scripts','foomenuscript');

// Food menu Post type
function foodmenupsot(){
	register_post_type('foodmenup',array(
		'labels' => array(
			'name' => 'Food Menu',
			'singular_name' => 'All Menu',
			'add_new' => 'Add New Menu',
			'edit_item' => 'Edit Menu',
			'new_item' => 'Add New Menu'
		),
		'menu_icon' =>'dashicons-list-view',
		'supports' => array('title','editor','revisions'),
		'public' => true,
		'has_archive' => true		
	));
}
add_action('init','foodmenupsot');

// Register Taxnomy 
function foodmenucate(){
	register_taxonomy('restaurant','foodmenup', array(
		'labels' =>array(
			'name' => 'Restaurants',
			'singular_name' => 'Restaurant',
			'all_items' => 'All Restaurants',
			'edit_item' => 'Edit Restaurant',
			'add_new_item' => 'Add New Restaurant',
			'new_item_name' => 'Add New Restaurant Name',
		),
		'rewrite' => array( 'slug' => 'restaurants' ),
		'hierarchical' => true,
	));
}
add_action('init','foodmenucate');


// Shortcode menu [food-menu]
function foomenulist( $atts ){
	extract(shortcode_atts( array(
		'rest' => ''
	), $atts ));
ob_start(); 
?>
<?php 
	$foomenpst = new WP_Query(array(
		'post_type' => 'foodmenup',
		'posts_per_page' => -1,
		'restaurant' => $rest,
	));
?>
<?php while( $foomenpst->have_posts() ) : $foomenpst->the_post(); 
$opmenudt = get_post_meta( get_the_ID(), 'demo_list_item', true );
?>
<div class="foodmparep">
<div class="foomenucont container">
	<div class="fdposttp">
	<?php if ( function_exists( 'get_option_tree') ) : if( get_option_tree( 'alignselect') ) : if( get_option_tree( 'sectlecolor') )  ?>    
		<h2 class="fgrouphd" style="text-align:<?php $sectlaln = get_option_tree( 'alignselect', '', 'true' ); ?>; color:<?php $sectlaln = get_option_tree( 'sectlecolor', '', 'true' ); ?>"><?php the_title(); ?></h2>
	<?php else : ?>
		<h2 class="fgrouphd"><?php the_title(); ?></h2>
	<?php endif; endif; ?>

	<?php $thecontent = get_the_content();
	if( !empty( $thecontent ) ) : ?>
		<div class="fdcontp">
			<?php the_content(); ?>	
		</div>
	<?php endif; ?>
	</div>

	<div class="fdgorup">
		<?php if( !empty($opmenudt) ) :  ?>
			<?php foreach( $opmenudt as $mnfdata  ) : ?>
				<div class="singfdpro">
					<div class="fddetails">
						<?php if( empty( $mnfdata['fdprodimg'] ) ) : ?>
						<div class="txtfdprt noimgful">
						<?php else : ?>
						<div class="txtfdprt">
						<?php endif; ?>
						<div class="fdtitle">
						<?php if ( function_exists( 'get_option_tree') ) : if( get_option_tree( 'proprccolor') )  ?> 
						   	<h3 style="color:<?php $sectlaln = get_option_tree( 'proprccolor', '', 'true' ); ?>">
						<?php else : ?>
							<h3>
						<?php endif; ?>

							<?php if( !empty($mnfdata['title'])){
									echo $mnfdata['title'];
								} ?> <span> 
								<?php if( !empty($mnfdata['fdproprc'])){
									echo '$'.$mnfdata['fdproprc'];
								} ?></span>
							</h3>
						</div>
						<div class="fdprpr">
							<?php if ( function_exists( 'get_option_tree') ) : if( get_option_tree( 'prodetlscolor') )  ?> 
							   	<p style="color:<?php $sectlaln = get_option_tree( 'prodetlscolor', '', 'true' ); ?>">
							<?php else : ?>
								<p>
							<?php endif; ?>
								<?php if( !empty($mnfdata['fdprodtls'])){
								echo $mnfdata['fdprodtls'];
							} ?></p>
						</div>
						</div>
						<?php if( !empty( $mnfdata['fdprodimg'] ) ) : ?>
						<div class="tximgp">
							<a class="fancybox" rel="fd<?php echo get_the_ID(); ?>" title="<?php if( !empty($mnfdata['title'])){
								echo $mnfdata['title'];
							} ?>  <?php if( !empty($mnfdata['fdproprc'])){
								echo '$'.$mnfdata['fdproprc'];
							} ?>" href="<?php echo $mnfdata['fdprodimg']; ?>">
								<img src="<?php echo $mnfdata['fdprodimg']; ?>" alt="Product">
							</a>
							</div>
						<?php endif; ?>
					</div>
				</div>
			<?php endforeach; ?>
		<?php endif; ?>
	</div>
</div>
</div>
<?php endwhile; ?>
<?php
$foomenu = ob_get_clean();
return $foomenu;
}
add_shortcode('food-menu','foomenulist');

/*==========================================
 Social coding
=============================================*/
function socialiconlisd(){
	register_post_type('sociallst',array(
		'labels' => array(
			'name' => 'Social icons',
			'singular_name' => 'Social icon',
			'add_new' => 'Add New icon',
			'edit_item' => 'Edit icon',
			'new_item' => 'Add New icon'
		),
		'menu_icon' =>'dashicons-share',
		'supports' => array('title','revisions'),
		'public' => true,
		'has_archive' => true		
	));
}
add_action('init','socialiconlisd');

// Footer address shortcode [social-icon]
function footer_adressprt( $atts ){
	extract( shortcode_atts(array(
		'id' => '1',
		'align' => '',
		'top'	=> '0'
	), $atts) );
ob_start();
?>
	<?php 
		$socilsts = new WP_Query(array(
			'post_type' => 'sociallst',
		));
	?>
	<?php if( $socilsts->have_posts() ) : ?>
	<div id="<?php echo "soclisti".$id ?>" class="socialiconlst" style="float:<?php echo $align ?>;padding-top:<?php echo $top ?>">
		<div class="socialilist">
			<?php while( $socilsts->have_posts() ) : $socilsts->the_post(); 
			$iadresicone = get_post_meta( get_the_ID(), 'soclistlist', true );
			$iadresicon = get_post_meta( get_the_ID(), 'iadresicon', true );
			$soalrym = sizeof($iadresicone);
			?>
			<?php if( !empty($iadresicone) ) :  ?>
				<?php if( $soalrym == 1) : ?>		
				<ul class="onesocialiconp lispfse">	
				<?php foreach( $iadresicone as $sodatab  ) : ?>
					<li>
					<a target="blank" href="<?php echo $sodatab['fslitpst']; ?>"><i class="fa fa-<?php echo $iadresicon; ?>"></i></a>	
					</li>
				<?php endforeach; ?>
				</ul>
				<?php else : ?>
				<div class="onemorocialiconp lispfse">
				<a class="mainiconso<?php echo $id.$iadresicon; ?>" href="javascript:void(0)"><i class="fa fa-<?php echo $iadresicon; ?>"></i></a>
				<ul class="listps lisi<?php echo $id.$iadresicon; ?>">
				<div class="mspnlistq">
				<div class="colox clo<?php echo $id.$iadresicon; ?>">X</div>
				<?php foreach( $iadresicone as $sodatab  ) : ?>
					<li class="sinso<?php echo $iadresicon; ?>">
					<a href="<?php echo $sodatab['fslitpst']; ?>" target="blank"><i class="fa fa-<?php echo $iadresicon; ?>"></i> <span><?php the_title(); ?> <?php echo $sodatab['title']; ?></span></a>	
					</li>
				<?php endforeach; ?>
				</div>
				</ul>
				</div>
<script>
(function($){
	$(document).ready(function(){
		$(".lisi<?php echo $id.$iadresicon; ?>").appendTo("body");
		$(".lisi<?php echo $id.$iadresicon; ?>").css({
		'left': '0',
		'position': 'fixed',
		'top': '0',
		'z-index': '99999999999',
		'display' : 'none'
		});	

		$(".mainiconso<?php echo $id.$iadresicon; ?>").click(function(){
			$(".lisi<?php echo $id.$iadresicon; ?>").toggle();	
		});

		$(".clo<?php echo $id.$iadresicon; ?>").click(function(){
			$(".lisi<?php echo $id.$iadresicon; ?>").toggle();
		});

	});
})(jQuery);
</script>

				<?php endif; ?>
			<?php endif; ?>

			<?php endwhile; ?>
		</div>
	</div>

	<?php endif; ?>

<?php
$foowdg = ob_get_clean();
return $foowdg;
}
add_shortcode('social-icon','footer_adressprt');

// Theme option and Meta box add in theme
add_filter('ot_show_pages','__return_false');
add_filter('ot_show_new_layout','__return_false');
//add_filter('ot_theme_mode','__return_true');
include_once('fmoptions/ot-loader.php');
include_once('fmoptions/meta-boxes.php');
include_once('fmoptions/theme-options.php');