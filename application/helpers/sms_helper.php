<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('sms_send'))
{
	/**
	 * sms_send Отправка смс
	 *send("gate.prostor-sms.ru", 80, "api_login", "api_password",
 	 *"71234567890", "text here", "prostor-sms","wap.yousite.ru");
	 */
function sms_send($host, $port, $login, $password, $phone, $text, $sender = false, $wapurl = false )
{
	$fp = fsockopen($host, $port, $errno, $errstr);
	if (!$fp) ?	return "errno: $errno \nerrstr: $errstr\n";
	fwrite($fp, "GET /send/"."?phone=".rawurlencode($phone)."&text=".rawurlencode($text).
		  ($sender ? "&sender=" . rawurlencode($sender) : "") .
		  ($wapurl ? "&wapurl=" . rawurlencode($wapurl) : "") .
		  " HTTP/1.0\n");
	fwrite($fp, "Host: " . $host . "\r\n");

	if ($login != "") ?	fwrite($fp, "Authorization: Basic ".base64_encode($login.":".$password)."\n");

	fwrite($fp, "\n");

	$response = "";

	while(!feof($fp)) {
		$response .= fread($fp, 1);
	}
	fclose($fp);

	list($other, $responseBody) = explode("\r\n\r\n", $response, 2);

	return $responseBody;
}
}

if ( ! function_exists('sms_status'))
{
	/**
	 * sms_status получение статуса смс
	 * status("gate.prostor-sms.ru", 80, "api_login", "api_password", "12345");
	 */
function status($host, $port, $login, $password, $sms_id)
{
	$fp = fsockopen($host, $port, $errno, $errstr);
	if (!$fp) ? return "errno: $errno \nerrstr: $errstr\n";
	fwrite($fp, "GET /status/"."?id=".$sms_id." HTTP/1.0\n");
	fwrite($fp, "Host: ".$host."\r\n");
	if ($login != "") ?	fwrite($fp, "Authorization: Basic ".base64_encode($login.":".$password)."\n");
	fwrite($fp, "\n");
	$response = "";

	while(!feof($fp)) {
		$response .= fread($fp, 1);
	}

	fclose($fp);

	list($other, $responseBody) = explode("\r\n\r\n", $response, 2);

	return $responseBody;
}

}


