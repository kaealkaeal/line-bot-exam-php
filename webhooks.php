<?php // callback.php

require "vendor/autoload.php";
require_once('vendor/linecorp/line-bot-sdk/line-bot-sdk-tiny/LINEBotTiny.php');

$access_token = '9s7wpqo8THjXYR5A0ToQtANCMKD3jqr2ii8FOA1Wlojj1KnVSNF+c76PZRaGjNQlUETdpltlz77xEEvg/T3pKaWmaDG7SYDoh7wcnlsyRwlWbrKGA2sSpreJxcJE7SrhJaFotOJlXb86S41i/mEiFAdB04t89/1O/w1cDnyilFU=';
$url_db = 'https://bottest-7bdff.firebaseio.com';
// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$arrayJson = json_decode($content, true);
   $arrayHeader = array();
   $arrayHeader[] = "Content-Type: application/json";
   $arrayHeader[] = "Authorization: Bearer {$access_token}";
   //รับข้อความจากผู้ใช้
   $message = $arrayJson['events'][0]['message']['text'];
   //รับ id ของผู้ใช้
   $id = $arrayJson['events'][0]['source']['userId'];
   #ตัวอย่าง Message Type "Text + Sticker"
   if($message == "สวัสดี"){
      $arrayPostData['to'] = $id;
      $arrayPostData['messages'][0]['type'] = "text";
      $arrayPostData['messages'][0]['text'] = "สวัสดีจ้าาา";
      pushMsg($arrayHeader,$arrayPostData);
   } else if($message == "เธอเป็นใคร"){
      $arrayPostData['to'] = $id;
      $arrayPostData['messages'][0]['type'] = "text";
      $arrayPostData['messages'][0]['text'] = "เราคือบอท";
      pushMsg($arrayHeader,$arrayPostData);
   } else if($message == "บอทอะไร"){
      $arrayPostData['to'] = $id;
      $arrayPostData['messages'][0]['type'] = "text";
      $arrayPostData['messages'][0]['text'] = "บอทเช็คชื่อจ้าา";
      pushMsg($arrayHeader,$arrayPostData);
   } else{
      $arrayPostData['to'] = $id;
      $arrayPostData['messages'][0]['type'] = "text";
      $arrayPostData['messages'][0]['text'] = "เราไม่เข้าใจ";
      pushMsg($arrayHeader,$arrayPostData);
   }
   function pushMsg($arrayHeader,$arrayPostData){
      $strUrl = "https://api.line.me/v2/bot/message/push";
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL,$strUrl);
      curl_setopt($ch, CURLOPT_HEADER, false);
      curl_setopt($ch, CURLOPT_POST, true);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $arrayHeader);
      curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arrayPostData));
      curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      $result = curl_exec($ch);
      curl_close ($ch);
   }
   exit;
echo "OK";
