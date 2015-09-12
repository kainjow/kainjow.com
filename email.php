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
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>kainjow - Email</title>	
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
	<style type="text/css">
	.errmsg {
		color: red;
		font-weight: bold;
	}
	</style>
	<script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>

<div class="container">
		
	<div class="logo">
	<a href="/"><img class="img-responsive center-block" src="images/kainjow.png" alt="kainjow"></a>
	</div>
	
	<div class="margintop">		
	<?php
	if ($errmsg) {
		echo "<div class='alert alert-danger'><p>$errmsg</p></div>\n";
	} else if ($success) {
		echo "<div class='alert alert-success'><p>Email sent.</p></div>\n";
	}
	?>
	<div class="alert alert-warning text-center"><p>
		<a href="http://kainjow.tumblr.com/post/128933657269/bootchamp-and-el-capitan" class="alert-link">Import information about BootChamp and OS X El Capitan</a>
	</p></div>
	<?php if (!$success): ?>
	<form action="email.php" method="post">
	<div class="form-group">
		<label for="name">Name</label>
		<input id="name" class="form-control" type="text" name="name" value="<?php echo $name; ?>" />
	</div>
	<div class="form-group">
		<label for="email">Email</label>
		<input id="email" class="form-control" type="email" name="email" value="<?php echo $email; ?>" />
	</div>
	<div class="form-group">
		<label for="subject">Subject</label>
		<input id="subject" class="form-control" type="text" name="subject" value="<?php echo $subject; ?>" />
	</div>
	<div class="form-group">
		<label for="message">Message</label>
		<textarea id="message" class="form-control" name="message" rows="3"><?php echo $msg; ?></textarea>
	</div>
	<div class="g-recaptcha form-group" data-sitekey="6LeDpgsTAAAAAIDB6i38JErvO3vtvpBtbHouIO-1"></div>
	<div class="form-group">
	<input class="btn btn-primary" type="submit" name="submit" value="Send">
	</div>
	</form>
	<?php endif ?>
	</div>
	
	<div>
	<p class="footer text-center margintop">
		<a href="/downloads/archives/">Download Archives</a> | <a href="donate.php">Donate</a><br>
		Copyright <?= date('Y'); ?> Kevin Wojniak
	</p>
	</div>

</div>
	
</body>
</html>
