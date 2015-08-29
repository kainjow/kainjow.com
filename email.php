<?php

$errmsg = null;
$success = false;
$name = isset($_POST['name']) ? trim($_POST['name']) : '';
$email = isset($_POST['email']) ? trim($_POST['email']) : '';
$subject = isset($_POST['subject']) ? trim($_POST['subject']) : '';
$msg = isset($_POST['message']) ? trim($_POST['message']) : '';
$recaptcha_response = isset($_POST['g-recaptcha-response']) ? $_POST['g-recaptcha-response'] : '';
if (isset($_POST['submit'])) {
	if (empty($name) || empty($subject) || empty($msg)) {
		$errmsg = 'Please fill out all fields.';
	} else if (filter_var($email, FILTER_VALIDATE_EMAIL) === FALSE) {
		$errmsg = 'Email address is invalid.';
	} else {
		require('config.php');
		$data = array(
			'secret' => KAIN_RECAPTCHA_SECRET,
			'response' => $recaptcha_response,
			'remoteip' => $_SERVER['REMOTE_ADDR'],
		);
		$ch = curl_init('https://www.google.com/recaptcha/api/siteverify');
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$response = curl_exec($ch);
		$json = json_decode($response, true);
		if (!isset($json['success']) || !$json['success']) {
			$errmsg = 'reCAPTCHA failed.';
		} else {
			$body = sprintf("From kainjow.com:\n\nName: %s\n\n%s", $name, $msg);
			$success = mail(KAIN_EMAIL, $subject, $body, 'From: ' . $email);
			if (!$success) {
				$errmsg = 'Failed to send email.';
			}
		}
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>kainjow - Email</title>
	<style type="text/css">
	body {
		margin: 0;
		padding: 10px;
	}
	#body {
		width: 650px;
		font-family: sans-serif;
		font-size: 10pt;
		margin: 0 auto;
	}
	#header {
		width: 100%;
		height: 100px;
		background-color: black;
		background-image: url(images/kainjow.png);
		background-position: center;
		background-repeat: no-repeat;
	}
	a {
		color: #0060ff;
		text-decoration: none;
	}
	a:hover {
		text-decoration: underline;
	}
	.errmsg {
		color: red;
		font-weight: bold;
	}
	</style>
	<script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>

<div id="body">

<div id="header"></div>

<?php
if ($errmsg) {
	echo "<p class='errmsg'>$errmsg</p>\n";
} else if ($success) {
	echo "<p>Email sent.</p>\n";
}
if (!$success) {
?>
<form action="email.php" method="post">
<p>Name<br/><input type="text" name="name" value="<?php echo $name; ?>" /></p>
<p>Email<br/><input type="text" name="email" value="<?php echo $email; ?>" /></p>
<p>Subject<br/><input type="text" name="subject" value="<?php echo $subject; ?>" /></p>
<p>Message<br/><textarea name="message" cols="50" rows="12"><?php echo $msg; ?></textarea></p>
<div class="g-recaptcha" data-sitekey="6LeDpgsTAAAAAIDB6i38JErvO3vtvpBtbHouIO-1"></div>
<p><input type="submit" name="submit" value="Send" /></p>
</form>
<?php
}
?>

</div>

</body>
</html>
