<?php

DEFINE("ACCESS_TOKEN","FzoQyhCyuSQkvV2wjVRy9q552mygfFb8mNvQD8duXewvrL9Qss8PAV23HOe4icrcpN4LpwzpaY2uLlx9twkhn7xhN/ntkvnp+etRLrAxyib9nhzbPYgPsdyWEI00R/OsyMS8PTT7Np0Gty1UxGQjHQdB04t89/1O/w1cDnyilFU=");
//DEFINE("SECRET_TOKEN","ここにシークレットトークン");

require_once __DIR__ . ("/vendor/autoload.php");
use \LINE\LINEbot\Constant\HTTPHeader;
use \LINE\LINEbot\HTTPClient\CurlHTTPClient;

echo "Hello2";


$inputString = file_get_contents('php://input');
error_log($inputString);

//$httpClient = new \LINE\LINEbot\HTTPClient\CurLHTTPClient(getenv
//$httpClient = new CurLHTTPClient(getenv('CHANNEL_ACCCESS_TOKEN'));
//$httpClient = new CurlHTTPClient(ACCESS_TOKEN);

$httpClinet = new \LINE\LINEBot\HTTPClient\CurlHTTPClient(ACCESS_TOKEN);

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
