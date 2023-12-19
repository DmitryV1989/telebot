<?
error_reporting(E_ALL ^ E_NOTICE);
ini_set('display_errors', 1);

require_once($_SERVER['DOCUMENT_ROOT']."/function.php");

$token = "6491448361:AAGN_usLJITJeAgM5x1B6hQ2GmKhLvN2eyw"; // токен бота
$chat_id = 1813005781; // id чата, в который будут отправляться сообщения (указан мой id)

p("Токен бота: "."$token");
p("id чата: "."$chat_id");

# message

/*
$data = file_get_contents('php://input');
$data = json_decode($data, true);

file_put_contents($_SERVER['DOCUMENT_ROOT'].'/message.txt', p($data, true));

if (!empty($data['message']['text'])) {
	$text = $data['message']['text'];
	p($text) ;
}
*/

# Photo

if (!empty($data['message']['photo'])) {
	$photo = array_pop($data['message']['photo']);
	
	$ch = curl_init('https://api.telegram.org/bot' . $token . '/getFile');  
	curl_setopt($ch, CURLOPT_POST, 1);  
	curl_setopt($ch, CURLOPT_POSTFIELDS, [
		'file_id' => $photo['file_id']
	]);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_HEADER, false);
	$res = curl_exec($ch);
	curl_close($ch);
	
	$res = json_decode($res, true);
	if ($res['ok']) {
		$src  = 'https://api.telegram.org/file/bot' . $token . '/' . $res['result']['file_path'];
		$dest = $_SERVER['DOCUMENT_ROOT'] . '/' . time() . '-' . basename($src);
		copy($src, $dest);
	}
}