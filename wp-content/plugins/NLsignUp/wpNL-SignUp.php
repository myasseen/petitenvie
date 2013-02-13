<?php
/*
 Plugin Name: EM_CustomNewsLetter_Subscription
 */
?>
<?php  
function fn_display_subscriptionArea()
{
	
	$output = '';	
	$output .= '<div class="NLwrapper">'.
			'<div class="clsDIV_subscribe_parent">'.
			'<label style="margin:5px;">Newsletter Signup</label>&nbsp;'.
			'<input id="txtSubscribe" type="text" class="clstxtSubscribe" value="email@domain.com"/>&nbsp;'.
			'<img title="Loading" alt="Loading" src="'.get_bloginfo('url').'/wp-content/plugins/NLsignUp/images/ajax-loader.gif" class="loadingimage" style="visibility: hidden; display: none;"/>'.
			'<input id="btnSubscribe" type="button" value="Join"/>'.
			'<span id="btnCancelSubscription"></span>'.
			'</div>'.
			'<div class="theLabel" style="margin-left: 9em"><label id="elabel"></label>&nbsp;</div>'.
			'</div>';
	
	return $output;	
}

/*
 *Load the JS files. After enqueuing, this uses add_action wp_enque_scripts
*/
function register_js_file_for_subscription(){
	//nonce is used for security precaution
	$subs_nonce = wp_create_nonce('subscription_submit_nonce');
	wp_enqueue_script('subsJSAJAXfile',WP_PLUGIN_URL.'/NLsignUp/customSignUp.js',array('jquery'));
	//use localize scripts for loading data that might be needed
	wp_localize_script('subsJSAJAXfile', 'subsAjax', array('ajaxurl' => admin_url('admin-ajax.php'), 'subs_nonce' => $subs_nonce));
}

function register_style_for_subscription(){
	wp_register_style('subs_style', WP_PLUGIN_URL.'/NLsignUp/customSignUp.css');
	wp_enqueue_style('subs_style');
}
add_action('wp_enqueue_scripts', 'register_style_for_subscription');


//This is used to initiate the DB action for what ever plugin wants to do
function fn_save_subs_in_DB()
	{
		
		$nonce = $_POST['wpnl_nonce'];
		
		if(!wp_verify_nonce($nonce, 'subscription_submit_nonce'))
			wp_die('Don\'t Cheat!');
		
		$emailID = $_POST['emailid'];
		
		
		$request   = array(
				'apikey' => 'a988abaac79b6eb0d97a7c58190ee112-us6',
				'id' => 'ac38aab224',
				'email_address' => $emailID,
				'double_optin' => FALSE,
				'merge_vars' => array(
						'OPTIN_TIME' => date('Y-M-D H:i:s')
				)
		);
		$result = wp_remote_post(
				'http://'.substr('a988abaac79b6eb0d97a7c58190ee112-us6',-3).'.api.mailchimp.com/1.3/?output=php&method=listSubscribe',
				array( 'body' => json_encode($request))
		);
	}
	
	//add the JS file
	add_action( 'wp_enqueue_scripts', 'register_js_file_for_subscription');
	//add the save vote action
	//admin-ajax.php takes care of associating the wp_ajax action with the action mentioned in the JS
	add_action( 'wp_ajax_nopriv_save_subs_in_DB', 'fn_save_subs_in_DB');
	add_action( 'wp_ajax_save_subs_in_DB', 'fn_save_subs_in_DB' );

?>