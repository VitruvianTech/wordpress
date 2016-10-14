<?php
/**
 * Plugin Name: Team  Builder
 * Version: 1.0
 * Description:  Team Builder is most flexible WordPress plugin available to create and manage your Team page with drag and drop feature.
 * Author: wpshopmart
 * Author URI: http://www.wpshopmart.com
 * Plugin URI: http://www.wpshopmart.com
 */

if ( ! defined( 'ABSPATH' ) ) exit; 
 /**
 * DEFINE PATHS
 */
define("wpshopmart_team_b_directory_url", plugin_dir_url(__FILE__));
define("wpshopmart_team_b_text_domain", "wpsm_team_b");

require_once("ink/install.php");

function wpsm_team_b_default_data() {
	
	$Settings_Array = serialize( array(
				"team_mb_name_clr" 	 => "#000000",
				"team_mb_pos_clr" => "#000000",
				"team_mb_desc_clr" => "#000000",
				"team_mb_social_icon_clr"   => "#4f4f4f",
				"team_mb_social_icon_clr_bg"   => "#e5e5e5",
				"team_mb_name_ft_size"   => 18,
				"team_mb_pos_ft_size"   => 14,
				"team_mb_desc_ft_size"   => 14,
				"font_family"   => "Open Sans",
				"team_layout"   => 4,
				"custom_css"   => "",
				"team_mb_wrap_bg_clr"   => "#ffffff",
				"design"   => 1,
		) );

	add_option('Team_B_default_Settings', $Settings_Array);
}
register_activation_hook( __FILE__, 'wpsm_team_b_default_data' );

/**
 * CPT CLASS
 */
 
require_once("ink/admin/menu.php");

/**
 * SHORTCODE
 */
 
 require_once("template/shortcode.php");

function get_team( $req ) {
	return unserialize(get_post_meta( 5, 'wpsm_team_b_data', true ));
}

add_action( 'rest_api_init', function () {
	register_rest_route( 'team/v1', '/members', array(
		'methods' => 'GET',
		'callback' => 'get_team',
	) );
} );
?>