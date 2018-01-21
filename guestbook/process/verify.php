<?php
  require_once('recaptchalib.php');
  $privatekey = "6LfKGeESAAAAADxuAnyJbu8lT5UtxPdpF5Fj04Wd";
  $resp = recaptcha_check_answer ($privatekey,
                                $_SERVER["REMOTE_ADDR"],
                                $_POST["recaptcha_challenge_field"],
                                $_POST["recaptcha_response_field"]);

  if (!$resp->is_valid) {
    // What happens when the CAPTCHA was entered incorrectly
    die ("The reCAPTCHA wasn't entered correctly. Go back and try it again." .
         "(reCAPTCHA said: " . $resp->error . ")");
  } else {
    // Your code here to handle a successful verification

	$error = false;
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
	}
}
?>