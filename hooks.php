<?
require_once($_SERVER['DOCUMENT_ROOT']."/function.php");

$token = "6491448361:AAGN_usLJITJeAgM5x1B6hQ2GmKhLvN2eyw"; // токен бота
$chat_id = 1813005781; // id чата, в который будут отправляться сообщения (указан мой id)

$getQuery = [
	'url'=>'https://telebot.loc/index.php',
];
$ch = curl_init("https://api.telegram.org/bot" . $token . "/setWebhook?" . http_build_query($getQuery));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_HEADER, false);

$result = curl_exec($ch);
curl_close($ch);
p($result);
