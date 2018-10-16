<?php


$access_token = '+uVGQBeHCl8s7Kl5ecyUTA9q78Of2hiz5fQX5++O9pDdrMRspTjWC+Kc+f4Qi1oC3MLueTPcfSt9JpgZtekQP87g/zaKxic9TaNp9yK3ab1uaR+e/t5/F3TYq3xDQg/hxa6SUpNH0uQaKvJ4WLwhFwdB04t89/1O/w1cDnyilFU=';

$userId = 'U92e74f8ce3595165ba396dbef155629a';

$url = 'https://api.line.me/v2/bot/profile/'.$userId;

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;

