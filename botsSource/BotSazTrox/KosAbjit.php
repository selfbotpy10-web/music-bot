<?php
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
ob_start();
$token = "[*[TKN]*]";
define('API_KEY',"$token");
$Dev = "[*[ADMN]*]";
$bot_id = "[*[USRNAME]*]";
$channel = "[*[CHANEL]*]";  
$folder = "https://zeos.oghabhosting.ir/Rabit/Moshtary2/botsData/[*[USRNAME]*]"; //دامنه و اسم پوشه 
/*
بجای دامین من دامین خودتونو بزارید و بجای کلمه Folder اسم پوشه رباتساز رو بزارید و باقی رو ویرایش نکنید
*/
//-------------------------------فانکشن ها---------------------------------------------
function bot($method,$datas=[]){
 $url = "https://api.telegram.org/bot".API_KEY."/".$method;
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
$res = curl_exec($ch);
if(curl_error($ch)){
var_dump(curl_error($ch));
}else{
return json_decode($res);
}
}
function SendMessage($chat_id, $text){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>$text,
'parse_mode'=>'MarkDown']);
}
function save($filename, $data)
{
$file = fopen($filename, 'w');
fwrite($file, $data);
fclose($file);
}
function SendDocument($chat_id, $document, $caption = null){
bot('SendDocument',[
'chat_id'=>$chat_id,
'document'=>$document,
'caption'=>$caption
]);
}
function EditMessageText($chat_id,$message_id,$text,$parse_mode,$disable_web_page_preview,$keyboard){
bot('editMessagetext',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>$text,
'parse_mode'=>$parse_mode,
'disable_web_page_preview'=>$disable_web_page_preview,
'reply_markup'=>$keyboard
]);
 }
function SendPhoto($chat_id, $photo, $caption = null){
bot('SendPhoto',[
'chat_id'=>$chat_id,
'photo'=>$photo,
'caption'=>$caption
]);
}
function sendAction($chat_id, $action){
bot('sendChataction',[
'chat_id'=>$chat_id,
'action'=>$action]);
}

function deleteFolder($path){
if(is_dir($path) === true){
$files = array_diff(scandir($path), array('.', '..'));
foreach ($files as $file)
deleteFolder(realpath($path) . '/' . $file);
return rmdir($path);
}else if (is_file($path) === true)
return unlink($path);
return false;
} 
function Forward($kojashe, $azkoja, $kodommsg){
hadi('forwardmessage',[
'chat_id'=>$kojashe,
'from_chat_id'=>$azkoja,
'message_id'=>$kodommsg
]);
}
function LeaveChat($chat_id){
hadi('LeaveChat',[
'chat_id'=>$chat_id
]);
}
function memUsage($units = false){
$status = file_get_contents('/proc/' . getmypid() . '/status');
$matchArr = array();
preg_match_all('~^(VmRSS|VmSwap):\s*([0-9]+).*$~im', $status, $matchArr);
if(!isset($matchArr[2][0]) || !isset($matchArr[2][1])){
return false;
}
$size = intval($matchArr[2][0]) + intval($matchArr[2][1]);
$unit = array('KB','MB','GB','TB','PB');
if($units){
return @round($size/pow(1024,($i=floor(log($size,1024)))),0).' '.$unit[$i];
}else{
return @round($size/pow(1024,($i=floor(log($size,1024)))),0);
}
}
function getMUsage(){
$mem = memory_get_usage();
$kb = $mem / 1024;
return substr($kb, 0, -5).' KB';
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
?>
