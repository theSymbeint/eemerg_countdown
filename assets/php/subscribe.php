<?php

	if(isset($_POST['email'])) {

		$email = $_POST['email'];

		// MailChimp 
		$APIKey = '6982acda2dae6530cb348d88e3607322-us7';
		$listID = '21b0d896b1';

		require_once('inc/MCAPI.class.php');

		$api = new MCAPI($APIKey);
		
		$list_id = $listID;

		if($api->listSubscribe($list_id, $email, '') === true) {

			$formstatus = 1;
			$message = 'Success! Check your email to confirm sign up.';

		} else {

			$formstatus = 0;
			$message = 'Error: ' . $api->errorMessage;

		}

		$result = array(
			"formstatus" => $formstatus,
			"message" => $message
		);
		
		echo json_encode($result);
		
	}

?>