 <?php
 //Add scripts
  function fbl_add_scripts(){
  	// Add Main CSS
  	wp_enqueue_style('fbp-main-style', plugins_url().'/fbpost/css/style.css');
   //Add Main JS
  	wp_enqueue_script('fbp-main-script', plugins_url().'/fbpost/js/main.js'); 

  	

  }

  add_action('wp_enqueue_scripts', 'fbp_add_scripts');