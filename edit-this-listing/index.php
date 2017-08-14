<?php
/*
Plugin Name: Edit this listing (for Inventor listings)

Description: a widget to link to edit this listing

Version: 0.5

Author: zig
Date: 14Aug17
Author URI: http://wwww.reachmaine.com

License: GPL3

*/



	require_once(ABSPATH . 'wp-admin/includes/upgrade.php');


	/* include('hcc_functions.php'); */
    include('edit-this-listing.php');

		add_action( 'widgets_init', 'load_hcc');
		function load_hcc() {
			register_widget( 'edit_this_listing' );
		}
 ?>
