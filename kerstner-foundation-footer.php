<?php
/*
	Plugin Name: Kerstner Foundation Footer
	Plugin URI: http://wordpress.org/extend/plugins/kerstner-foundation-footer/
	Description: This plugin is <strong>MANDATORY</strong> and <strong>MUST BE ACTIVATED</strong> to continue to receive free web hosting from Kerstner.org. <strong>DO NOT MODIFY</strong> or <strong>DISABLE</strong>. 
	Author: Kerstner Foundation
	Version: 4.1.1
	Author URI: http://kerstner.org/
	Text Domain: kerstner-org-footer
	License: GPL2
*/

/*  
	Copyright 2009-2013  Kerstner Foundation  (email : info@kerstner.org)
*/

if ( !class_exists( 'KerstnerFoundationFooter' ) ) {

class KerstnerFoundationFooter {
	// Constructor
	function KerstnerFoundationFooter() {
		// Initialise plugin
		add_action( 'init', array( &$this, 'init' ) );
		
		add_action( 'wp_footer', array( &$this, 'wp_footer' ) );
		
	}
	
	// Initialise plugin
	function init() {
		load_plugin_textdomain( 'kerstner-org-footer', false, dirname( plugin_basename ( __FILE__ ) ).'/lang' );
	}
	
	// Display Kerstner.org footer
	function wp_footer() {
		$CurrentFooterHTML = file_get_contents('https://api.kerstner.org/footer/?uip=' . $_SERVER['REMOTE_ADDR'] . '&w=' . urlencode(get_bloginfo('name')) . '&dop=' . urlencode(get_permalink()) . '&rp=' . urlencode(wp_get_referer()));
		if ( $CurrentFooterHTML != '' ) {
			echo $CurrentFooterHTML, "\n";
		}
	}
}

$wp_custom_headers_and_footers = new KerstnerFoundationFooter();

} /* END */

?>