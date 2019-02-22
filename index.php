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
/*$messageBuilder=new ImageMessageBuilder(
    "https://kosenjp-my.sharepoint.com/:i:/g/personal/tsuchida_toba_kosen-ac_jp/EWqdgG77ZCtLqLwldvNPeM4Bb68DYlax5jq-6UYPfSop4A?e=HaTfBb",
    "https://kosenjp-my.sharepoint.com/:i:/g/personal/tsuchida_toba_kosen-ac_jp/EWqdgG77ZCtLqLwldvNPeM4Bb68DYlax5jq-6UYPfSop4A?e=HaTfBb"
);
  //$bot->replyMessage($event->replyToken, $messageBuilder);
  $bot->replyMessage($event->getReplyToken(), $messageBuilder);*/

  $receive = json_decode($inputString, true);

  $event = $receive['events'][0];
  $reply_token  = $event['replyToken'];

  $headers = array('Content-Type: application/json',
                   'Authorization: Bearer ' . $accessToken);

//  $message = 【ここが送信するオブジェクトにより異なります】

  $message = array('type'               => 'image',
                   'originalContentUrl' => 'https://kosenjp-my.sharepoint.com/:i:/g/personal/tsuchida_toba_kosen-ac_jp/EWqdgG77ZCtLqLwldvNPeM4Bb68DYlax5jq-6UYPfSop4A?e=HaTfBb',
                   'previewImageUrl'    => 'https://kosenjp-my.sharepoint.com/:i:/g/personal/tsuchida_toba_kosen-ac_jp/EWqdgG77ZCtLqLwldvNPeM4Bb68DYlax5jq-6UYPfSop4A?e=HaTfBb');

  $body = json_encode(array('replyToken' => $reply_token,
                            'messages'   => array($message)));
  $options = array(CURLOPT_URL            => 'https://api.line.me/v2/bot/message/reply',
                   CURLOPT_CUSTOMREQUEST  => 'POST',
                   CURLOPT_RETURNTRANSFER => true,
                   CURLOPT_HTTPHEADER     => $headers,
                   CURLOPT_POSTFIELDS     => $body);

  $curl = curl_init();
  curl_setopt_array($curl, $options);
  curl_exec($curl);
  curl_close($curl);

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
