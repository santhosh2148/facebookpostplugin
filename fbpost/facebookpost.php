<?php
/*
Plugin Name: Facebook Post
Description: Display Facebook Post button 
Version: 1.0.0
Author : Santhosh Kumar Gummadi
*/

//Exit if accessed directly
if(!defined('ABSPATH')) {
	exit;
}

//Load Scripts
require_once(plugin_dir_path(__FILE__).'/includes/facebookpost-scripts.php'); 

//Load Class
require_once(plugin_dir_path(__FILE__).'/includes/facebookpost-class.php');  

//Register Widget
function register_facebookpost(){
	register_widget('Facebook_Post_Widget');
}

//Hook in function
add_action('widgets_init', 'register_facebookpost');