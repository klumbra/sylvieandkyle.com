<?php
$error = false;
require_once('recaptchalib.php'); // reCAPTCHA Library
$pubkey = "6LfKGeESAAAAACOF0p-DhzogR4NJD0s3ig1LQQiU"; // Public API Key
$privkey = "6LfKGeESAAAAADxuAnyJbu8lT5UtxPdpF5Fj04Wd"; // Private API Key
if ($_POST['doVerify']) {
  $verify = recaptcha_check_answer($privkey, $_SERVER['REMOTE_ADDR'], $_POST['recaptcha_challenge_field'], $_POST['recaptcha_response_field']);
  if ($verify->is_valid) {
			
	if (isset($_POST['posting_user'])) {
	$postUser = trim($_POST['posting_user']);
	$postMessage = trim($_POST['posting_message']);
	
	if (($postUser != '') AND ($postMessage != '')) {
		$postingUser = $postUser;
		
		$postingTime = time();
		$postedMessage = $postMessage;
	
		$fileHandle = fopen($dataFile, 'a');
		if (!fputcsv($fileHandle,array($postingUser,$postingTime, $postedMessage))) {
			$error = 'Could not write to file, try again.';
		}
		fclose($fileHandle);
	
		// Delete post data so that fields do no populate again
		unset($_POST);
	} else {
		$error = 'Name and message are required!';
	}
	};
		  }
		  else {
			# Enter Failure Code
			$error = 'You did not enter the correct words.  Please try again.';
		  }
		}
