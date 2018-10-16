<?php



require "vendor/autoload.php";

$access_token = '+uVGQBeHCl8s7Kl5ecyUTA9q78Of2hiz5fQX5++O9pDdrMRspTjWC+Kc+f4Qi1oC3MLueTPcfSt9JpgZtekQP87g/zaKxic9TaNp9yK3ab1uaR+e/t5/F3TYq3xDQg/hxa6SUpNH0uQaKvJ4WLwhFwdB04t89/1O/w1cDnyilFU=';

$channelSecret = '82fdafeaf4d24ddf26c1e52026be9586';

$pushID = 'U92e74f8ce3595165ba396dbef155629a';

$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);

$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('hello world');
$response = $bot->pushMessage($pushID, $textMessageBuilder);

echo $response->getHTTPStatus() . ' ' . $response->getRawBody();







