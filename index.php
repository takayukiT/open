<?php
echo "Hello2";
require_once __DIR__ . ("/vendor/autoload.php");

$inputString = file_get_contents('php://input');
error_log($inputString);

$httpClient = new \LINE\LINEbot\HTTPClient\CurLHTTPClient(getenv('CHANNEL_ACCCESS_TOKEN'));
$bot = new \LINE\LINEbot($httpClient,['channelSecret'=>getenv('channel_SECRET')])
$signature = $_SERVER['HTTP_' . \LINE\LINEbot\Constant\HTTPHeader::LINE_SIGNATURE];

$events = $bot->parseEventRequest(file_get_contents('php://input'),$signature);
foreach ($events as $event) {
  // code...
  $bot->replyTextMessage($event->getReplyToken(),'TextMessage');
}


?>
