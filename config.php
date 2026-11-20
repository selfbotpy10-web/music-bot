<?php
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
ob_start();
$botToken = getenv('BOT_TOKEN');
if (!$botToken) {
    http_response_code(500);
    exit('BOT_TOKEN is not configured');
}
define('API_KEY', $botToken); //توکن قرار دهید
$Dev = 59010771;
$channel = "robozalaxy";  //ایدی چنل
$botuser = "Robozybot"; //یوزرنیم بات
$folder = "https://test/Rat/Mosary2"; // دامنه و ادرس فایل
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
function SendPhoto($chat_id, $photo, $caption = null){
bot('SendPhoto',[
'chat_id'=>$chat_id,
'photo'=>$photo,
'caption'=>$caption
]);
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
bot('forwardmessage',[
'chat_id'=>$kojashe,
'from_chat_id'=>$azkoja,
'message_id'=>$kodommsg
]);
}
function LeaveChat($chat_id){
bot('LeaveChat',[
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
function Spam($user_id){
@mkdir("usersData/spam");
$spam_status = json_decode(file_get_contents("usersData/spam/$user_id.json"),true);
if($spam_status != null){
if(mb_strpos($spam_status[0],"time") !== false){
if(str_replace("time ",null,$spam_status[0]) >= time())
exit(false);
else
$spam_status = [1,time()+2];
}
elseif(time() < $spam_status[1]){
if($spam_status[0]+1 > 3){
$time = time() + 1800;
$spam_status = ["time $time"];
file_put_contents("usersData/spam/$user_id.json",json_encode($spam_status,true));
bot('sendMessage',[
'chat_id'=>$user_id,
'text'=>"➖➖➖➖➖➖➖➖➖➖
⚠️ به علت ارسال پیام مکرر 30 دقیقه مسدود شدید

❗️ لطفا آهسته تر با ربات کار کنید 
➖➖➖➖➖➖➖➖➖➖",
]);
exit(false);
}else{
$spam_status = [$spam_status[0]+1,$spam_status[1]];
}}else{
$spam_status = [1,time()+2];
}}else{
$spam_status = [1,time()+2];
}
file_put_contents("usersData/spam/$user_id.json",json_encode($spam_status,true));
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
?>
