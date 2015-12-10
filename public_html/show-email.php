<?php

require dirname(__DIR__) . '/config.php';
require dirname(__DIR__) . '/vendor/autoload.php';

$errmsg = false;
$success = false;
$recaptcha_response = isset($_GET['g-recaptcha-response']) ? $_GET['g-recaptcha-response'] : '';
// Use cURL because the default post uses file_get_contents() which is not allowed on current host
$recaptcha = new \ReCaptcha\ReCaptcha(KAIN_RECAPTCHA_SECRET, new \ReCaptcha\RequestMethod\CurlPost());
$resp = $recaptcha->verify($recaptcha_response, $_SERVER['REMOTE_ADDR']);
if ($resp->isSuccess()) {
	$arr = array('email' => KAIN_EMAIL);
} else {
	$arr = array('error' => sprintf('reCAPTCHA error: %s', implode(',', $resp->getErrorCodes())));
}
echo json_encode($arr);
