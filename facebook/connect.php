<?php
//include the Facebook PHP SDK
include_once 'facebook.php';

//instantiate the Facebook library with the APP ID and APP SECRET
$facebook = new Facebook(array(
	'appId' => '164454333715067',
	'secret' => 'cdd2b7385f85610a8bd3f1e76c7f9f00',
	'cookie' => true
)); 

//Get the FB UID of the currently logged in user
$user = $facebook->getUser();
echo('0');
//if the user has already allowed the application, you'll be able to get his/her FB UID
if($user) {
	//start the session if needed
	if( session_id() ) {
	
	} else {
		session_start();
	}
	
	//do stuff when already logged in
	echo('1');
	//get the user's access token
	$access_token = $facebook->getAccessToken();
	//check permissions list
	$permissions_list = $facebook->api(
		'/me/permissions',
		'GET',
		array(
			'access_token' => $access_token
		)
	);
	echo('2');
	//check if the permissions we need have been allowed by the user
	//if not then redirect them again to facebook's permissions page
	$permissions_needed = array('publish_stream', 'read_stream', 'manage_pages');
	foreach($permissions_needed as $perm) {
		if( !isset($permissions_list['data'][0][$perm]) || $permissions_list['data'][0][$perm] != 1 ) {
			$login_url_params = array(
				'scope' => 'publish_stream,read_stream,offline_access,manage_pages',
				'fbconnect' =>  1,
				'display'   =>  "page",
				'next' => 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']
			);
			$login_url = $facebook->getLoginUrl($login_url_params);
			header("Location: {$login_url}");
			exit();
		}
	}
	echo('3');
	//if the user has allowed all the permissions we need,
	//get the information about the pages that he or she managers
	$accounts = $facebook->api(
		'/me/accounts',
		'GET',
		array(
			'access_token' => $access_token
		)
	);
	
	echo('4');
	
	//save the information inside the session
	$_SESSION['access_token'] = $access_token;
	$_SESSION['accounts'] = $accounts['data'];
	//save the first page as the default active page
	$_SESSION['active'] = $accounts['data'][0];
	
	//redirect to manage.php
	header('Location: manage.php');
} else {
	echo('5');
	//if not, let's redirect to the ALLOW page so we can get access
	//Create a login URL using the Facebook library's getLoginUrl() method
	$login_url_params = array(
		'scope' => 'publish_stream,read_stream',
		'fbconnect' =>  1,
		'display'   =>  "page",
		'next' => 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']
	);
	$login_url = $facebook->getLoginUrl($login_url_params);
	
	//redirect to the login URL on facebook
	echo('login url: ' . $login_url);
	header("Location: {$login_url}");
	exit();
}

?>