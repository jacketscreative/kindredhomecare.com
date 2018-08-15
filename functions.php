<?php 

add_action( 'wp_enqueue_scripts', 'salient_child_enqueue_styles');
function salient_child_enqueue_styles() {
	
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css', array('font-awesome'));

    if ( is_rtl() ) 
   		wp_enqueue_style(  'salient-rtl',  get_template_directory_uri(). '/rtl.css', array(), '1', 'screen' );
}

add_filter( 'gform_submit_button_7', '__return_false' );

function gform_signature_height( $init_options ) {
    $init_options['SignHeight'] = 70;
    return $init_options;
}

add_filter( 'gform_signature_init_options', 'gform_signature_height' );

?>