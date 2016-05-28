<?php

	// MailChimp settings
	$APIKey = 'db9ca5c64f88200ebfc4aa70866ac3dc-us7';
	$listID = 'aeb4861f46';

	$email   = $_POST['email'];

	require_once('inc/MCAPI.class.php');

	$api = new MCAPI($APIKey);
	$list_id = $listID;

	if($api->listSubscribe($list_id, $email) === true) {
		$sendstatus = 1;
		$message = 'Success! Check your email to confirm sign up.';
	} else {
		$sendstatus = 0;
		$message = $api->errorMessage;
	}

	$result = array(
		'sendstatus' => $sendstatus,
		'message' => $message
	);

	echo json_encode($result);

?>