<?php

require_once __DIR__ . ("/vendor/autoload.php");

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

if(isset($_SERVER["HTTP_".HTTPHeader::LINE_SIGNATURE]) ) {
$signature = $_SERVER["HTTP_" . HTTPHeader::LINE_SIGNATURE];
error_log($signature);

$events = $bot->parseEventRequest(file_get_contents('php://input'),$signature);
foreach ($events as $event) {
  // code...
  if($event->gettext()=="A"){
   $bot->replyText($event->getReplyToken(),'return-tsuchidaA');
  }
  else {
//$bot->replyText($event->getReplyToken(),'return-tsuchidaB');
//  $messageBuilder = new MultiMessageBuilder();
//  $messageBuilder->add(new ImageMessageBuilder(
$messageBuilder=new ImageMessageBuilder(
    "https://kosenjp-my.sharepoint.com/:i:/g/personal/tsuchida_toba_kosen-ac_jp/EU9o3pg6C8JFuqBrKQJF7ZcBErN7oh6EUSEQFAjKWKG64A?e=zd1vpW",
    "https://kosenjp-my.sharepoint.com/:i:/g/personal/tsuchida_toba_kosen-ac_jp/EU9o3pg6C8JFuqBrKQJF7ZcBErN7oh6EUSEQFAjKWKG64A?e=zd1vpW"
);
  //$bot->replyMessage($event->replyToken, $messageBuilder);
  $bot->replyMessage($event->getReplyToken(), $messageBuilder);
  }


}
}
/*
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
