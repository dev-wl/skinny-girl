<?php 

	function register_my_menus()
	{
		register_nav_menus(array('menu' => 'header-menu1'));
	}

	if (function_exists('register_nav_menus'))
	{
	     add_action( 'init', 'register_my_menus' );
	}

/**
 * Register our sidebars and widgetized areas.
 *
 */
function arphabet_widgets_init() {

  register_sidebar( array(
    'name'          => 'Footer sidebar',
    'id'            => 'footer_1',
    'before_widget' => '<div>',
    'after_widget'  => '</div>',
  ) );

}
add_action( 'widgets_init', 'arphabet_widgets_init' );


add_theme_support( 'post-thumbnails' );

function trim_excerpt($text) {
  $text = rtrim($text, '[...]');
  return str_replace('[&hellip', ' <a href="' . get_permalink($post->ID) . '">Read More </a>', $text);
}
add_filter('get_the_excerpt', 'trim_excerpt');

update_option('sitge','http://girls.dev.wonderslab.com');

add_action('wpcf7_before_send_mail', 'save_form' );

function save_form( $wpcf7 ) {
	
   global $wpdb;
 
   /*
    Note: since version 3.9 Contact Form 7 has removed $wpcf7->posted_data
    and now we use an API to get the posted data.
   */
 
   $submission = WPCF7_Submission::get_instance();
 
   if ( $submission ) {
 
       $submited = array();
       $submited['title'] = $wpcf7->title();
       $submited['posted_data'] = $submission->get_posted_data();
 
    }
 		
  	$wpdb->insert( $wpdb->prefix . 'tps_forms', array( 
      	'email' => $submited['posted_data']['your-email'],
      	'fname' => $submited['posted_data']['your-fname'],
        'lname' => $submited['posted_data']['your-lname'],
        'subj' => $submited['posted_data']['your-subject'],
      	'message' => $submited['posted_data']['your-message'],
      	'date_add' => @date('Y-m-d H:i:s')
		));
}

function remove_editor_menu() {
  remove_action('admin_menu', '_add_themes_utility_last', 101);
}
add_action('_admin_menu', 'remove_editor_menu', 1);

?>
