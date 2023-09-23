<?php
$token = '6302724012:AAGgfHzFai2NgiXymhtPUujAoHtnGzCkG7Q';
$website = 'https://api.telegram.org/'.$token;

$input = file_get_contents('php://input');
$ubdate = json_decode($input, TRUE);

$chatId = $update['message']['chat']['Id'];
$message = $ubdate['message']['text'];

switch($message) {
    case '/start':
        $response = 'Me has iniciado';
        sendMessage($chatId, $response);
        break;
        case '/info':
            $response = 'Hi! Soy @ccapprovedbot';
            sendMessage($chatId, $response);
            break;
        default:
            $response = 'No te he entendido';
            sendMessage($chatId, $response);
            break;
    } 

    function sendMessage($chatId, $response) {
        $url = $GLOBALS['website'].'/sendMessage?chat_id='.$chatId.'&parse_mode=HTML&text='.urlencode($response);
        file_get_contents($url);
    }
?>