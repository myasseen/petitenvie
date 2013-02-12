<?php
/*
 Plugin Name: EM_CustomNewsLetter_Subscription
 */
?>
<?php  
function fn_display_subscriptionArea()
{
	$output = '';	
	$output .= '<div class="clsDIV_subscribe_parent">'.
			'<label>Join our community</label>'.
			'<input id="txtSubscribe" type="text" class="clstxtSubscribe"/>'.
			'<label id="elabel"></label>'.
			'<input id="btnSubscribe" type="button" value="Submit" class="clsAcrVote"/>'.
			'</div>';
	
	return $output;	
}

/*
 *Load the JS files. After enqueuing, this uses add_action wp_enque_scripts
*/
function register_js_file_for_subscription(){
	//nonce is used for security precaution
	$subs_nonce = wp_create_nonce('subscription_submit_nonce');
	wp_enqueue_script('subsJSAJAXfile',WP_PLUGIN_URL.'/wpNL-SignUp/customSignUp.js',array('jquery'));
	//use localize scripts for loading data that might be needed
	wp_localize_script('subsJSAJAXfile', 'subsAjax', array('ajaxurl' => admin_url('admin-ajax.php'), 'subs_nonce' => $subs_nonce));
}

//This is used to initiate the DB action for what ever plugin wants to do
function fn_save_subs_in_DB()
	{
		$request   = array(
				'apikey' => '841164ce2c0b688e04a2f36d91ec0ede-us6',
				'id' => 'ca66a59aa0',
				'email_address' => 'Ampu1@gampu.com',
				'double_optin' => FALSE,
				'merge_vars' => array(
						'OPTIN_TIME' => date('Y-M-D H:i:s')
				)
		);
		$result = wp_remote_post(
				'http://'.substr('841164ce2c0b688e04a2f36d91ec0ede-us6',-3).'.api.mailchimp.com/1.3/?output=php&method=listSubscribe',
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