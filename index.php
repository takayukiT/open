<?php

DEFINE("ACCESS_TOKEN","FzoQyhCyuSQkvV2wjVRy9q552mygfFb8mNvQD8duXewvrL9Qss8PAV23HOe4icrcpN4LpwzpaY2uLlx9twkhn7xhN/ntkvnp+etRLrAxyib9nhzbPYgPsdyWEI00R/OsyMS8PTT7Np0Gty1UxGQjHQdB04t89/1O/w1cDnyilFU=");
DEFINE("SECRET_TOKEN","77bdb3e28350efc68ddc6e184e09688f");

require_once __DIR__ . ("/vendor/autoload.php");
//use \LINE\LINEbot\Constant\HTTPHeader;
//use \LINE\LINEbot\HTTPClient\CurlHTTPClient;

use LINE\LINEBot;
use LINE\LINEBot\HTTPClient\CurlHTTPClient;
use LINE\LINEBot\MessageBuilder\ImageMessageBuilder;
use LINE\LINEBot\MessageBuilder\MultiMessageBuilder;
use LINE\LINEBot\Constant\HTTPHeader;

echo "Hello2";

$inputString = file_get_contents('php://input');
error_log($inputString);

$channelSecret = '77bdb3e28350efc68ddc6e184e09688f';
$channelToken  = 'FzoQyhCyuSQkvV2wjVRy9q552mygfFb8mNvQD8duXewvrL9Qss8PAV23HOe4icrcpN4LpwzpaY2uLlx9twkhn7xhN/ntkvnp+etRLrAxyib9nhzbPYgPsdyWEI00R/OsyMS8PTT7Np0Gty1UxGQjHQdB04t89/1O/w1cDnyilFU=';

$bot = new LINEBot(new CurlHTTPClient($channelToken), [
    'channelSecret' => $channelSecret
]);




//$httpClinet = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('FzoQyhCyuSQkvV2wjVRy9q552mygfFb8mNvQD8duXewvrL9Qss8PAV23HOe4icrcpN4LpwzpaY2uLlx9twkhn7xhN/ntkvnp+etRLrAxyib9nhzbPYgPsdyWEI00R/OsyMS8PTT7Np0Gty1UxGQjHQdB04t89/1O/w1cDnyilFU=');
//$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => '77bdb3e28350efc68ddc6e184e09688f']);
//$bot->parseEventRequest

if(isset($_SERVER["HTTP_".HTTPHeader::LINE_SIGNATURE]) ) {
$signature = $_SERVER["HTTP_" . HTTPHeader::LINE_SIGNATURE];
error_log($signature);
//$events = $bot->parseEventRequest(file_get_contents())
$events = $bot->parseEventRequest(file_get_contents('php://input'),$signature);
foreach ($events as $event) {
  // code...
  $bot->replyTextMessage($event->getReplyToken(),'TextMessage');
//replyTextMessage($bot, $event->getReplyToken(),'TextMessgage');
}
}
/*$bot = new \LINE\LINEbot($httpClient,['channelSecret'=>getenv('channel_SECRET')]);
$signature = $_SERVER['HTTP_'.HTTPHeader::LINE_SIGNATURE];

$events = $bot->parseEventRequest(file_get_contents('php://input'),$signature);
foreach ($events as $event) {
  // code...
//  $bot->replyTextMessage($event->getReplyToken(),'TextMessage');
replyTextMessage($bot, $event->getReplyToken(),'TextMessgage');
}

function replyTextMessage($bot, $replyToken, $text){
  $response = $bot->replyMessage($replyToken,new \LINE\LINEbot
  \MessageBuilder\TextMessageBuilder($text));
  if(!$response->isSucceeded()){
    error_log('Failed '. $response->getHTTPStatus . ' '
  . $response->getRawBody());
  }
}
*/

?>
