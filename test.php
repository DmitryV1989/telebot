<?
require_once($_SERVER['DOCUMENT_ROOT']."/function.php");
// print_r($_SERVER['DOCUMENT_ROOT']."/function.php");

/*
# базовые настройки

// настраиваем вывод сообщений об ошибках 
ini_set('error_reporting', E_All);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
*/

// https://api.telegram.org/bot6491448361:AAGN_usLJITJeAgM5x1B6hQ2GmKhLvN2eyw/getUpdates

$token = "6491448361:AAGN_usLJITJeAgM5x1B6hQ2GmKhLvN2eyw"; // токен бота
$chat_id = 1813005781; // id чата, в который будут отправляться сообщения (указан мой id)
/*
$txtMsg = "Текстовое сообщение"; // текст сообщения
$txtMsg = urlencode($txtMsg); // кодируем строку для отправки её get-запросом

$urlQuery = "https://api.telegram.org/bot" . $token . "/sendMessage?chat_id=" . $chat_id . "&text=" . $txtMsg; // передаём ссылку на телеграмм-бот с вышеуказанным сообщением. sendMessage - метод отправки запросов

// p($urlQuery);

$result = file_get_contents($urlQuery); // передаём сообщение с помощью функции
*/

/*
$txtMsg = "test2";
$getQuery = [
	"chat_id"=>1813005781, // id чата 
	"text"=>"$txtMsg", // отправляемое сообщение
	"parse_mode"=>"html"
	// "reply_to_message_id"=>20 // пересылка ранее отправленного сообщения. Не работает с удалёнными сообщениями!
];
$ch = curl_init("https://api.telegram.org/bot".$token."/sendMessage?".http_build_query($getQuery));

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_HEADER, false);

$result = curl_exec($ch);
curl_close($ch);
 
$json = json_decode($result, true); 
p($json);
// p($json['result']['chat']['username']);
// отправка сообщений в группу
*/

# удаление сообщений
/*
$getQuery = [
	"chat_id"=>1813005781,
	"message_id"=> 22
];
$ch = curl_init("https://api.telegram.org/bot".$token."/deleteMessage?".http_build_query($getQuery));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_HEADER, false);

$result = curl_exec($ch);
curl_close($ch);

p($result);
*/

# отправка в чат кнопок и клавиатуры
/*
$getQuery = [
	"chat_id"=>1813005781,
	"text"=>"Сообщение с кнопками",
	"reply_markup"=>json_encode([ // перекодируем массив в json
		"inline_keyboard"=>[ // кнопки которые прикреплены к сообщению (inline_keyboard)
			[
				[
					"text"=>"Button 1", // текст кнопки
					"callback_data"=>"test1", // строка, возвращаемая при нажатии на кнопку
				],
				[
					"text"=>"Button 2",
					"callback_data"=>"test2",
				],
			],
						[
				[
					"text"=>"Button 1", // текст кнопки
					"callback_data"=>"test1", // строка, возвращаемая при нажатии на кнопку
				],
				[
					"text"=>"Button 2",
					"callback_data"=>"test2",
				],
								[
					"text"=>"Button 3",
					"callback_data"=>"test3",
				],
			],
		]
	])
];

$ch = curl_init("https://api.telegram.org/bot".$token."/sendMessage?".http_build_query($getQuery));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_HEADER, false);

$result = curl_exec($ch);
curl_close($ch);
$result =json_decode($result);
p($result->result->reply_markup->inline_keyboard[0][0]->text);
p($result);
// p($result->ok);
// p($result)
*/


/*
$getQuery = [
	"chat_id"=>1813005781,
	"text"=>"Сообщение с клавиатурой",
	"reply_markup"=>json_encode([
		"keyboard"=>[
			[
				[
					"text"=>"Тестовая кнопка 1",
					"url"=>"YOUR BUTTON UR",
				],
								[
					"text"=>"Тестовая кнопка 2",
					"url"=>"YOUR BUTTON UR",
				]
			]
		],
		"one_time_keyboard" => TRUE, // клавиатура скроется после использования (т.е. после нажатия на кнопку)
    	"resize_keyboard" => TRUE, // растягиваем клавиатуру на весь экран
	])
];

$ch = curl_init("https://api.telegram.org/bot".$token."/sendMessage?".http_build_query($getQuery));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_HEADER, false);

$result = curl_exec($ch);
curl_close($ch);
p($result);
*/

# Отправка изображений
/*
$arrayQuery = [	
	'chat_id'=>$chat_id,
	'caption'=>'Проверка работы', // текст сообщения к изображению (подпись изображения)
	'photo'=>curl_file_create($_SERVER['DOCUMENT_ROOT'].'/stone2.png', 'image/png', 'stone2.png') // формируем массив данных для отправки фото
];
// p($arrayQuery);
// die;
$ch = curl_init("https://api.telegram.org/bot" . $token . "/sendPhoto");
curl_setopt($ch, CURLOPT_POST, 1); // будут отправлять POST (а не GET) запросы
curl_setopt($ch, CURLOPT_POSTFIELDS, $arrayQuery); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_HEADER, false);
$result = curl_exec($ch);
curl_close($ch);
p(json_decode($result));
*/

# отправка файлов

/*
$arrayQuery = [
	'chat_id'=>$chat_id,
	'caption'=>'проверка работы',
	'document'=>curl_file_create($_SERVER['DOCUMENT_ROOT'] . '/cat.png', 'image/png', 'cat.png')
];
$ch = curl_init("https://api.telegram.org/bot" . $token . "/sendDocument");
curl_setopt($ch, CURLOPT_POST, 1); // будут отправлять POST (а не GET) запросы
curl_setopt($ch, CURLOPT_POSTFIELDS, $arrayQuery); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_HEADER, false);
$result = curl_exec($ch);
curl_close($ch);
p($result);
*/

/*
$getQuery = [
     "url" => "https://barri.p-host.in/index.php",
];
$ch = curl_init("https://api.telegram.org/bot". $token ."/setWebhook?" . http_build_query($getQuery));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_HEADER, false);

$resultQuery = curl_exec($ch);
curl_close($ch);

echo $resultQuery;
*/


$data = file_get_contents('php//input');


function writeLogFile($string, $clear = false){
    $log_file_name = $_SERVER['DOCUMENT_ROOT']."/message.txt";
    if($clear == false) {
	$now = date("Y-m-d H:i:s");
	file_put_contents($log_file_name, $now." ".print_r($string, true)."\r\n", FILE_APPEND);
    }
    else {
	file_put_contents($log_file_name, '');
        file_put_contents($log_file_name, $now." ".print_r($string, true)."\r\n", FILE_APPEND);
    }
}

$data = file_get_contents('php//input');
$data = json_decode($data, true);
writeLogFile($data, true);

p(file_get_contents($_SERVER['DOCUMENT_ROOT']."/message.txt"));