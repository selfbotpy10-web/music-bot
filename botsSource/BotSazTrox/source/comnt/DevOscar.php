<?php
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
ob_start();
$load = sys_getloadavg();
error_reporting(0);
ini_set( "log_errors","Off" );
$day = (2505600 - (time() - filectime('Mahdy'))) / 60 / 60 / 24;
$day = round($day, 0);
//
$Dev = [*[ADMIN]*]; // ایدی عددی ادمین
$Meti = "https://t.me/Ekip_GanGe/1983"; // ادرس کامنت عکس
$Mahdiphp = "https://t.me/Ekip_GanGe/1992"; // ادرس کامنت استیکر
$Metiym = "https://t.me/Ekip_GanGe/1993"; // ادرس کامنت گیف
mkdir("data");
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
//
define('API_KEY',"[*[TOKEN]*]"); // توکن بات
function meti($method,$datas=[]){
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
meti('sendMessage',[
'chat_id'=>$chat_id,
'text'=>$text,
'parse_mode'=>'MarkDown']);
}
function save($filename, $data){
$file = fopen($filename, 'w');
fwrite($file, $data);
fclose($file);
}
function EditMessageText($chat_id,$message_id,$text,$parse_mode,$disable_web_page_preview,$keyboard){
meti('editMessagetext',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>$text,
'parse_mode'=>$parse_mode,
'disable_web_page_preview'=>$disable_web_page_preview,
'reply_markup'=>$keyboard
]);
 }
function sendAction($chat_id, $action){
meti('sendChataction',[
'chat_id'=>$chat_id,
'action'=>$action]);
}
function ForwardMessage($chat_id, $from_chat, $message_id){
meti('ForwardMessage',[
	'chat_id'=>$chat_id,
	'from_chat_id'=>$from_chat,
	'message_id'=>$message_id
	]);
}
function GetChat($chat_id){
meti('GetChat',[
'chat_id'=>$chat_id
]);
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
$usernamebot = json_decode(file_get_contents('https://api.telegram.org/bot'.API_KEY.'/getMe'))->result->username;
$panel = json_encode(['inline_keyboard'=>[
[['text'=>"تنظیم متون ➕",'callback_data'=>"cobs"]],
[['text'=>"گیف",'callback_data'=>"cccc"],['text'=>"✅",'callback_data'=>"gifon"],['text'=>"❌",'callback_data'=>"gifoff"]],
[['text'=>"پنج گیف",'callback_data'=>"cccc"],['text'=>"✅",'callback_data'=>"gif5on"],['text'=>"❌",'callback_data'=>"gif5off"]],
[['text'=>"تکست",'callback_data'=>"cccc"],['text'=>"✅",'callback_data'=>"texton"],['text'=>"❌",'callback_data'=>"textoff"]],
[['text'=>"ده تکست",'callback_data'=>"cccc"],['text'=>"✅",'callback_data'=>"text10on"],['text'=>"❌",'callback_data'=>"text10off"]],
[['text'=>"عکس",'callback_data'=>"cccc"],['text'=>"✅",'callback_data'=>"photoon"],['text'=>"❌",'callback_data'=>"photooff"]],
[['text'=>"پنج عکس",'callback_data'=>"cccc"],['text'=>"✅",'callback_data'=>"photo5on"],['text'=>"❌",'callback_data'=>"photo5off"]],
[['text'=>"استیکر",'callback_data'=>"cccc"],['text'=>"✅",'callback_data'=>"stikon"],['text'=>"❌",'callback_data'=>"stikoff"]],
[['text'=>"دو استیکر",'callback_data'=>"cccc"],['text'=>"✅",'callback_data'=>"stik2on"],['text'=>"❌",'callback_data'=>"stik2off"]],
[['text'=>"شمارش",'callback_data'=>"cccc"],['text'=>"✅",'callback_data'=>"shon"],['text'=>"❌",'callback_data'=>"shoff"]],
[['text'=>"مختلف",'callback_data'=>"cccc"],['text'=>"✅",'callback_data'=>"mokon"],['text'=>"❌",'callback_data'=>"mokoff"]],
[['text'=>"باقی مانده اشتراک ❗️",'callback_data'=>"eshtrak"]],
[['text'=>"بازگشت",'callback_data'=>"backas"]],
],'resize_keyboard'=>true]);
//
$start = json_encode(['inline_keyboard'=>[
[['text'=>"اضافه کردن ربات به گروه",'url'=>"http://t.me/$usernamebot?startgroup=new"],['text'=>"سازنده ربات",'url'=>'https://t.me/LrixeNumberbot?start=[*[ADMIN]*]']],
],'resize_keyboard'=>true]);
//
$backos = json_encode(['inline_keyboard'=>[
[['text'=>"بازگشت",'callback_data'=>"back"]],
],'resize_keyboard'=>true]);
//
$sss = json_encode(['inline_keyboard'=>[
[['text'=>"تنظیم متن کامنت تکست ✔",'callback_data'=>"txcm"],['text'=>"تنظیم متن استارت ✔",'callback_data'=>"mod"]],
[['text'=>"تنظیم کپشن گیف ✔",'callback_data'=>"cap"],['text'=>"تنظیم کپشن عکس ✔",'callback_data'=>"cm"]],
[['text'=>"بازگشت",'callback_data'=>"back"]],
],'resize_keyboard'=>true]);
//=============متغیرها=============//
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$contact = $message->contact;
$contactid = $contact->user_id;
$callback_query = $update->callback_query;
$data = $update->callback_query->data;
$inline_query = $update->inline_query;
$callback_query_id = $query->id;
$chatidd = $update->message->chat->id;
$fromidd = $update->message->from->id;
$gold = file_get_contents("data/gold.txt");
$gif = file_get_contents("data/gif.txt");
$gif5 = file_get_contents("data/gif5.txt");
$photo = file_get_contents("data/photo.txt");
$photo5 = file_get_contents("data/photo5.txt");
$textt = file_get_contents("data/textt.txt");
$text10 = file_get_contents("data/text10.txt");
$sh = file_get_contents("data/sh.txt");
$stik = file_get_contents("data/stik.txt");
$stik2 = file_get_contents("data/stik2.txt");
$mok = file_get_contents("data/mok.txt");
$for = file_get_contents("data/for.txt");
$Noom = file_get_contents("data/start.txt");
$cp = file_get_contents("data/cp.txt");
$cap = file_get_contents("data/cap.txt");
$cm = file_get_contents("data/cm.txt");
$textgo = file_get_contents("data/textgo.txt");
$txt24 = "/start";
$query_id = $inline_query->id;
$contactnum = $contact->phone_number;
$chat_id = $message->chat->id ?? $callback_query->message->chat->id;
$from_id = $message->from->id ?? $callback_query->from->id;
$fromid = $update->callback_query->from->id;
$chatid = $update->callback_query->message->chat->id;
$message_id = $update->message->message_id;
$message_id2 = $update->callback_query->message->message_id;
$username = $update->message->from->username;
$message_id = $update->message->message_id;
$text1 = $update->message->text;
$text = $update->message->text;
$rt = $update->message->reply_to_message;
$tc = $update->message->chat->type;
$reply = $update->message->reply_to_message;
$reply = $update->message->reply_to_message;
$contact = $message->contact;
$da = $update->message->reply_to_message->forward_from->id;
$forward_chat_username = $update->message->forward_from_chat->username;
$remove = json_encode(['KeyboardRemove'=>[],'remove_keyboard'=>true]);
//
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
function Spam($user_id){
@mkdir("data/spam");
$spam_status = json_decode(file_get_contents("data/spam/$user_id.json"),true);
if($spam_status != null){
if(mb_strpos($spam_status[0],"time") !== false){
if(str_replace("time ",null,$spam_status[0]) >= time())
exit(false);
else
$spam_status = [1,time()+2];
}
elseif(time() < $spam_status[1]){
if($spam_status[0]+1 > 3){
$time = time() + 10;
$spam_status = ["time $time"];
file_put_contents("data/spam/$user_id.json",json_encode($spam_status,true));
meti('SendMessage',[
'chat_id'=>$user_id,
'text'=>"جهت جلوگیری از اسپم به بات شما به مدت 10 ثانیه از ربات بلاک شدید."
]);
exit(false);
}else{
$spam_status = [$spam_status[0]+1,$spam_status[1]];
}}else{
$spam_status = [1,time()+2];
}}else{
$spam_status = [1,time()+2];
}
file_put_contents("data/spam/$user_id.json",json_encode($spam_status,true));
}
Spam($from_id);
if ($day <= 2){
meti('SendMessage',[
'chat_id'=>[*[ADMIN]*],
'text'=>"ادمین گرامی مدت زمان اشتراک شما در رباتساز بزرگ میا کریت ب اتمام رسیده است ⚠️
برای تمدید ربات خود به پیوی ادمین مراجعه کنید ❤️
@DevOscar 👤",
'parse_mode'=>'MarkDown',
'reply_markup'=>$panel
]);
exit();
}
    //--start--//
if( $text == "/start"){
meti('sendmessage', [
'chat_id' =>$chat_id,
'text' =>$txt24,
'reply_markup'=>json_encode([
'remove_keyboard'=>true,
])
]);
meti('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
$Noom
",
'reply_markup'=>$start,
]);}
//--panel--//           
elseif($from_id == $Dev){        
if( $text == "پنل"){
file_put_contents("data/gold.txt","ست نشده!");
unlink('data/cp.txt');
meti('deletemessage', ['chat_id' => $chat_id, 'message_id' => $message_id, ]);
meti('sendMessage',[
'chat_id'=>$chat_id,
'message_id'=>$message_id2,
'text'=>"
انتخاب کن ادمین جووونم 🥺

🔻 راهنما ادمین

🔸 اگه میبینی یه بار زدی رو دکمه ذخیره نکرد دومین بار بزن تا اطلاعات رو ذخیره کنه و همان دکمه کار کند.

💥 نوع کامنت : $gold
",
'parse_mode'=>'html',
'reply_markup'=>$panel,
]);}
elseif($data == "cobs"){
meti('editmessagetext',[
'chat_id'=>$chatid,
'message_id'=>$message_id2,
'text'=>"
به منوی تنظیم متن های ربات خوش اومدی ♥️
انتخاب کن ✔️
",
'reply_markup'=>$sss,
]);}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
elseif($data == "eshtrak"){
meti('editmessagetext',[
'chat_id'=>$chatid,
'message_id'=>$message_id2,
'text'=>"تا پایان اشتراک شما $day روز باقی مانده است ✅",
'reply_markup'=>$panel,
]);}
elseif($data == "mod"){
file_put_contents("data/cp.txt","start");
meti('editmessagetext',[
'chat_id'=>$chatid,
'message_id'=>$message_id2,
'text'=>"
متن استارتو بنویس تا تنظیم کنم !
",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"بازگشت",'callback_data'=>"back"]],
],])]);}
if(isset($text) and $cp == "start" and $data !== "back"){
file_put_contents("data/cp.txt","none");
file_put_contents("data/start.txt","$text");
meti('sendmessage',[
'chat_id'=>$chat_id,
'message_id'=>$message_id2,
'text'=>"تنظیم شد.",
'parse_mode'=>'html',
]);}
elseif($data == "cap"){
file_put_contents("data/cp.txt","cpi");
meti('editmessagetext',[
'chat_id'=>$chatid,
'message_id'=>$message_id2,
'text'=>"
متنتو بنویس عشقم تا کپشن گیف رو تنظیم کنم!
",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"بازگشت",'callback_data'=>"back"]],
],])]);}
if(isset($text) and $cp == "cpi" and $data !== "back"){
file_put_contents("data/cp.txt","none");
file_put_contents("data/cap.txt","$text");
meti('sendmessage',[
'chat_id'=>$chat_id,
'message_id'=>$message_id2,
'text'=>"تنظیم شد.",
'parse_mode'=>'html',
]);}
elseif($data == "cm"){
file_put_contents("data/cp.txt","cm");
meti('editmessagetext',[
'chat_id'=>$chatid,
'message_id'=>$message_id2,
'text'=>"
متنتو بنویس عشقم تا کپشن عکس رو تنظیم کنیم!
",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"بازگشت",'callback_data'=>"back"]],
],])]);}
if(isset($text) and $cp == "cm" and $data !== "back"){
file_put_contents("data/cp.txt","none");
file_put_contents("data/cm.txt","$text");
meti('sendmessage',[
'chat_id'=>$chat_id,
'message_id'=>$message_id2,
'text'=>"تنظیم شد.",
'parse_mode'=>'html',
]);}
elseif($data == "txcm"){
file_put_contents("data/cp.txt","com");
meti('editmessagetext',[
'chat_id'=>$chatid,
'message_id'=>$message_id2,
'text'=>"
متنتو بنویس عشقم تا متن کامنت گیر تکست رو تنظیم کنم!
",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"بازگشت",'callback_data'=>"back"]],
],])]);}
if(isset($text) and $cp == "com" and $data !== "back"){
file_put_contents("data/cp.txt","none");
file_put_contents("data/textgo.txt","$text");
meti('sendmessage',[
'chat_id'=>$chat_id,
'message_id'=>$message_id2,
'text'=>"تنظیم شد.",
'parse_mode'=>'html',
]);}
//---back--//
elseif($data == "back"){
unlink('data/cp.txt');
meti('editmessagetext',[
'chat_id'=>$chatid,
'message_id'=>$message_id2,
'text'=>"
انتخاب کن ادمین جووونم 🥺

🔻 راهنما ادمین

🔸 اگه میبینی یه بار زدی رو دکمه ذخیره نکرد دومین بار بزن تا اطلاعات رو ذخیره کنه و همان دکمه کار کند.

💥 نوع کامنت : $gold
", 
'parse_mode'=>"MarkDown",   
'reply_markup'=>$panel,
]);
}
elseif($data == "backas"){ 
meti('editmessagetext',[
'chat_id'=>$chatid,
'message_id'=>$message_id2,
'text'=>"
به ربات کامنت گیر پیشرفته متی ولف خوش آمدید. 😄❤️‍🩹

❗️ راهنما :
🔸 ربات را در گروه اد و مدیر کنید و ربات بعد عضو شدن زیر پست های شما کامنت اول را میگیرد.

✅ ورژن سورس :  v2
", 
'parse_mode'=>"MarkDown",   
'reply_markup'=>$start,
]);}
//
elseif($data == "foron"){
file_put_contents("data/gold.txt","فوروارد");
file_put_contents("data/for.txt","✅");
meti('answercallbackquery', [
'callback_query_id'=>$update->callback_query->id, 
'text'=>"✅ با موفقیت نوع کامنت گیر $gold فعال شد.",
]);
meti('editmessagetext',[
'chat_id'=>$chatid,
'message_id'=>$message_id2,
'text'=>"
انتخاب کن ادمین جووونم 🥺

🔻 راهنما ادمین

🔸 اگه میبینی یه بار زدی رو دکمه ذخیره نکرد دومین بار بزن تا اطلاعات رو ذخیره کنه و همان دکمه کار کند.

💥 نوع کامنت : $gold
",
'reply_markup'=>$panel,
]);}
elseif($data=='foroff'){
file_put_contents("data/for.txt","❌");
unlink('data/gold.txt');
meti('answercallbackquery', [
'callback_query_id'=>$update->callback_query->id, 
'text'=>"❌ با موفقیت نوع کامنت گیر $gold غیر فعال شد.", 
]);
meti('editmessagetext',[
'chat_id'=>$chatid,
'message_id'=>$message_id2,
'text'=>"
انتخاب کن ادمین جووونم 🥺

🔻 راهنما ادمین

🔸 اگه میبینی یه بار زدی رو دکمه ذخیره نکرد دومین بار بزن تا اطلاعات رو ذخیره کنه و همان دکمه کار کند.

💥 نوع کامنت : $gold
",
'reply_markup'=>$panel,
]);}
elseif($data == "gifon"){
file_put_contents("data/gold.txt","گیف");
file_put_contents("data/gif.txt","✅");
meti('answercallbackquery', [
'callback_query_id'=>$update->callback_query->id, 
'text'=>"✅ با موفقیت نوع کامنت گیر $gold فعال شد.",
]);
meti('editmessagetext',[
'chat_id'=>$chatid,
'message_id'=>$message_id2,
'text'=>"
انتخاب کن ادمین جووونم 🥺

🔻 راهنما ادمین

🔸 اگه میبینی یه بار زدی رو دکمه ذخیره نکرد دومین بار بزن تا اطلاعات رو ذخیره کنه و همان دکمه کار کند.

💥 نوع کامنت : $gold
",
'reply_markup'=>$panel,
]);}
elseif($data=='gifoff'){
file_put_contents("data/gif.txt","❌");
unlink('data/gold.txt');
meti('answercallbackquery', [
'callback_query_id'=>$update->callback_query->id, 
'text'=>"❌ با موفقیت نوع کامنت گیر $gold غیر فعال شد.", 
]);
meti('editmessagetext',[
'chat_id'=>$chatid,
'message_id'=>$message_id2,
'text'=>"
انتخاب کن ادمین جووونم 🥺

🔻 راهنما ادمین

🔸 اگه میبینی یه بار زدی رو دکمه ذخیره نکرد دومین بار بزن تا اطلاعات رو ذخیره کنه و همان دکمه کار کند.

💥 نوع کامنت : $gold
",
'reply_markup'=>$panel,
]);}
elseif($data == "gif5on"){
file_put_contents("data/gold.txt","پنج گیف");
file_put_contents("data/gif5.txt","✅");
meti('answercallbackquery', [
'callback_query_id'=>$update->callback_query->id, 
'text'=>"✅ با موفقیت نوع کامنت گیر $gold فعال شد.",
]);
meti('editmessagetext',[
'chat_id'=>$chatid,
'message_id'=>$message_id2,
'text'=>"
انتخاب کن ادمین جووونم 🥺

🔻 راهنما ادمین

🔸 اگه میبینی یه بار زدی رو دکمه ذخیره نکرد دومین بار بزن تا اطلاعات رو ذخیره کنه و همان دکمه کار کند.

💥 نوع کامنت : $gold
",
'reply_markup'=>$panel,
]);}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
elseif($data=='gif5off'){
file_put_contents("data/gif5.txt","❌");
unlink('data/gold.txt');
meti('answercallbackquery', [
'callback_query_id'=>$update->callback_query->id, 
'text'=>"❌ با موفقیت نوع کامنت گیر $gold غیر فعال شد.", 
]);
meti('editmessagetext',[
'chat_id'=>$chatid,
'message_id'=>$message_id2,
'text'=>"
انتخاب کن ادمین جووونم 🥺

🔻 راهنما ادمین

🔸 اگه میبینی یه بار زدی رو دکمه ذخیره نکرد دومین بار بزن تا اطلاعات رو ذخیره کنه و همان دکمه کار کند.

💥 نوع کامنت : $gold
",
'reply_markup'=>$panel,
]);}
elseif($data == "text10on"){
file_put_contents("data/gold.txt","ده تکست");
file_put_contents("data/text10.txt","✅");
meti('answercallbackquery', [
'callback_query_id'=>$update->callback_query->id, 
'text'=>"✅ با موفقیت نوع کامنت گیر $gold فعال شد.",
]);
meti('editmessagetext',[
'chat_id'=>$chatid,
'message_id'=>$message_id2,
'text'=>"
انتخاب کن ادمین جووونم 🥺

🔻 راهنما ادمین

🔸 اگه میبینی یه بار زدی رو دکمه ذخیره نکرد دومین بار بزن تا اطلاعات رو ذخیره کنه و همان دکمه کار کند.

💥 نوع کامنت : $gold
",
'reply_markup'=>$panel,
]);}
elseif($data=='text10off'){
file_put_contents("data/text10.txt","❌");
unlink('data/gold.txt');
meti('answercallbackquery', [
'callback_query_id'=>$update->callback_query->id, 
'text'=>"❌ با موفقیت نوع کامنت گیر $gold غیر فعال شد.", 
]);
meti('editmessagetext',[
'chat_id'=>$chatid,
'message_id'=>$message_id2,
'text'=>"
انتخاب کن ادمین جووونم 🥺

🔻 راهنما ادمین

🔸 اگه میبینی یه بار زدی رو دکمه ذخیره نکرد دومین بار بزن تا اطلاعات رو ذخیره کنه و همان دکمه کار کند.

💥 نوع کامنت : $gold
",
'reply_markup'=>$panel,
]);}
elseif($data == "texton"){
file_put_contents("data/gold.txt","تکست");
file_put_contents("data/textt.txt","✅");
meti('answercallbackquery', [
'callback_query_id'=>$update->callback_query->id, 
'text'=>"✅ با موفقیت نوع کامنت گیر $gold فعال شد.",
]);
meti('editmessagetext',[
'chat_id'=>$chatid,
'message_id'=>$message_id2,
'text'=>"
انتخاب کن ادمین جووونم 🥺

🔻 راهنما ادمین

🔸 اگه میبینی یه بار زدی رو دکمه ذخیره نکرد دومین بار بزن تا اطلاعات رو ذخیره کنه و همان دکمه کار کند.

💥 نوع کامنت : $gold
",
'reply_markup'=>$panel,
]);}
elseif($data=='textoff'){
file_put_contents("data/textt.txt","❌");
unlink('data/gold.txt');
meti('answercallbackquery', [
'callback_query_id'=>$update->callback_query->id, 
'text'=>"❌ با موفقیت نوع کامنت گیر $gold غیر فعال شد.", 
]);
meti('editmessagetext',[
'chat_id'=>$chatid,
'message_id'=>$message_id2,
'text'=>"
انتخاب کن ادمین جووونم 🥺

🔻 راهنما ادمین

🔸 اگه میبینی یه بار زدی رو دکمه ذخیره نکرد دومین بار بزن تا اطلاعات رو ذخیره کنه و همان دکمه کار کند.
@Metiym | نویسنده سورس

💥 نوع کامنت : $gold
",
'reply_markup'=>$panel,
]);}
elseif($data == "photoon"){
file_put_contents("data/gold.txt","عکس");
file_put_contents("data/photo.txt","✅");
meti('answercallbackquery', [
'callback_query_id'=>$update->callback_query->id, 
'text'=>"✅ با موفقیت نوع کامنت گیر $gold فعال شد.",
]);
meti('editmessagetext',[
'chat_id'=>$chatid,
'message_id'=>$message_id2,
'text'=>"
انتخاب کن ادمین جووونم 🥺

🔻 راهنما ادمین

🔸 اگه میبینی یه بار زدی رو دکمه ذخیره نکرد دومین بار بزن تا اطلاعات رو ذخیره کنه و همان دکمه کار کند.

💥 نوع کامنت : $gold
",
'reply_markup'=>$panel,
]);}
elseif($data=='photooff'){
file_put_contents("data/photo.txt","❌");
unlink('data/gold.txt');
meti('answercallbackquery', [
'callback_query_id'=>$update->callback_query->id, 
'text'=>"❌ با موفقیت نوع کامنت گیر $gold غیر فعال شد.", 
]);
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
meti('editmessagetext',[
'chat_id'=>$chatid,
'message_id'=>$message_id2,
'text'=>"
انتخاب کن ادمین جووونم 🥺

🔻 راهنما ادمین

🔸 اگه میبینی یه بار زدی رو دکمه ذخیره نکرد دومین بار بزن تا اطلاعات رو ذخیره کنه و همان دکمه کار کند.

💥 نوع کامنت : $gold
",
'reply_markup'=>$panel,
]);}
elseif($data == "photo5on"){
file_put_contents("data/gold.txt","پنج عکس");
file_put_contents("data/photo5.txt","✅");
meti('answercallbackquery', [
'callback_query_id'=>$update->callback_query->id, 
'text'=>"✅ با موفقیت نوع کامنت گیر $gold فعال شد.",
]);
meti('editmessagetext',[
'chat_id'=>$chatid,
'message_id'=>$message_id2,
'text'=>"
انتخاب کن ادمین جووونم 🥺

🔻 راهنما ادمین

🔸 اگه میبینی یه بار زدی رو دکمه ذخیره نکرد دومین بار بزن تا اطلاعات رو ذخیره کنه و همان دکمه کار کند.

💥 نوع کامنت : $gold
",
'reply_markup'=>$panel,
]);}
elseif($data=='photo5off'){
file_put_contents("data/photo5.txt","❌");
unlink('data/gold.txt');
meti('answercallbackquery', [
'callback_query_id'=>$update->callback_query->id, 
'text'=>"❌ با موفقیت نوع کامنت گیر $gold غیر فعال شد.", 
]);
meti('editmessagetext',[
'chat_id'=>$chatid,
'message_id'=>$message_id2,
'text'=>"
انتخاب کن ادمین جووونم 🥺

🔻 راهنما ادمین

🔸 اگه میبینی یه بار زدی رو دکمه ذخیره نکرد دومین بار بزن تا اطلاعات رو ذخیره کنه و همان دکمه کار کند.

💥 نوع کامنت : $gold
",
'reply_markup'=>$panel,
]);}
//
elseif($data == "stikon"){
file_put_contents("data/gold.txt","استیکر");
file_put_contents("data/stik.txt","✅");
meti('answercallbackquery', [
'callback_query_id'=>$update->callback_query->id, 
'text'=>"✅ با موفقیت نوع کامنت گیر $gold فعال شد.",
]);
meti('editmessagetext',[
'chat_id'=>$chatid,
'message_id'=>$message_id2,
'text'=>"
انتخاب کن ادمین جووونم 🥺

🔻 راهنما ادمین

🔸 اگه میبینی یه بار زدی رو دکمه ذخیره نکرد دومین بار بزن تا اطلاعات رو ذخیره کنه و همان دکمه کار کند.

💥 نوع کامنت : $gold
",
'reply_markup'=>$panel,
]);}
elseif($data=='stikoff'){
file_put_contents("data/stik.txt","❌");
unlink('data/gold.txt');
meti('answercallbackquery', [
'callback_query_id'=>$update->callback_query->id, 
'text'=>"❌ با موفقیت نوع کامنت گیر $gold غیر فعال شد.", 
]);
meti('editmessagetext',[
'chat_id'=>$chatid,
'message_id'=>$message_id2,
'text'=>"
انتخاب کن ادمین جووونم 🥺

🔻 راهنما ادمین

🔸 اگه میبینی یه بار زدی رو دکمه ذخیره نکرد دومین بار بزن تا اطلاعات رو ذخیره کنه و همان دکمه کار کند.

💥 نوع کامنت : $gold
",
'reply_markup'=>$panel,
]);}
elseif($data == "stik2on"){
file_put_contents("data/gold.txt","دو استیکر");
file_put_contents("data/stik2.txt","✅");
meti('answercallbackquery', [
'callback_query_id'=>$update->callback_query->id, 
'text'=>"✅ با موفقیت نوع کامنت گیر $gold فعال شد.",
]);
meti('editmessagetext',[
'chat_id'=>$chatid,
'message_id'=>$message_id2,
'text'=>"
انتخاب کن ادمین جووونم 🥺

🔻 راهنما ادمین

🔸 اگه میبینی یه بار زدی رو دکمه ذخیره نکرد دومین بار بزن تا اطلاعات رو ذخیره کنه و همان دکمه کار کند.

💥 نوع کامنت : $gold
",
'reply_markup'=>$panel,
]);}
elseif($data=='stik2off'){
file_put_contents("data/stik2.txt","❌");
unlink('data/gold.txt');
meti('answercallbackquery', [
'callback_query_id'=>$update->callback_query->id, 
'text'=>"❌ با موفقیت نوع کامنت گیر $gold غیر فعال شد.", 
]);
meti('editmessagetext',[
'chat_id'=>$chatid,
'message_id'=>$message_id2,
'text'=>"
انتخاب کن ادمین جووونم 🥺

🔻 راهنما ادمین

🔸 اگه میبینی یه بار زدی رو دکمه ذخیره نکرد دومین بار بزن تا اطلاعات رو ذخیره کنه و همان دکمه کار کند.

💥 نوع کامنت : $gold
",
'reply_markup'=>$panel,
]);}
elseif($data == "shon"){
file_put_contents("data/gold.txt","شمارش");
file_put_contents("data/sh.txt","✅");
meti('answercallbackquery', [
'callback_query_id'=>$update->callback_query->id, 
'text'=>"✅ با موفقیت نوع کامنت گیر $gold فعال شد.",
]);
meti('editmessagetext',[
'chat_id'=>$chatid,
'message_id'=>$message_id2,
'text'=>"
انتخاب کن ادمین جووونم 🥺

🔻 راهنما ادمین

🔸 اگه میبینی یه بار زدی رو دکمه ذخیره نکرد دومین بار بزن تا اطلاعات رو ذخیره کنه و همان دکمه کار کند.

💥 نوع کامنت : $gold
",
'reply_markup'=>$panel,
]);}
elseif($data=='shoff'){
file_put_contents("data/sh.txt","❌");
unlink('data/gold.txt');
meti('answercallbackquery', [
'callback_query_id'=>$update->callback_query->id, 
'text'=>"❌ با موفقیت نوع کامنت گیر $gold غیر فعال شد.", 
]);
meti('editmessagetext',[
'chat_id'=>$chatid,
'message_id'=>$message_id2,
'text'=>"
انتخاب کن ادمین جووونم 🥺

🔻 راهنما ادمین

🔸 اگه میبینی یه بار زدی رو دکمه ذخیره نکرد دومین بار بزن تا اطلاعات رو ذخیره کنه و همان دکمه کار کند.
@Metiym | نویسنده سورس

💥 نوع کامنت : $gold
",
'reply_markup'=>$panel,
]);}
elseif($data == "mokon"){
file_put_contents("data/gold.txt","مختلف");
file_put_contents("data/mok.txt","✅");
meti('answercallbackquery', [
'callback_query_id'=>$update->callback_query->id, 
'text'=>"✅ با موفقیت نوع کامنت گیر $gold فعال شد.",
]);
meti('editmessagetext',[
'chat_id'=>$chatid,
'message_id'=>$message_id2,
'text'=>"
انتخاب کن ادمین جووونم 🥺

🔻 راهنما ادمین

🔸 اگه میبینی یه بار زدی رو دکمه ذخیره نکرد دومین بار بزن تا اطلاعات رو ذخیره کنه و همان دکمه کار کند.

💥 نوع کامنت : $gold
",
'reply_markup'=>$panel,
]);}
elseif($data=='mokoff'){
file_put_contents("data/mok.txt","❌");
unlink('data/gold.txt');
meti('answercallbackquery', [
'callback_query_id'=>$update->callback_query->id, 
'text'=>"❌ با موفقیت نوع کامنت گیر $gold غیر فعال شد.", 
]);
meti('editmessagetext',[
'chat_id'=>$chatid,
'message_id'=>$message_id2,
'text'=>"
انتخاب کن ادمین جووونم 🥺

🔻 راهنما ادمین

🔸 اگه میبینی یه بار زدی رو دکمه ذخیره نکرد دومین بار بزن تا اطلاعات رو ذخیره کنه و همان دکمه کار کند.

💥 نوع کامنت : $gold
",
'reply_markup'=>$panel,
]);}}
if ($from_id == 777000){
if( $gold == "تکست"){
meti('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"$textgo",
'reply_to_message_id'=>$update->message->message_id,
'reply_markup'=>$start,
]);
}}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
if ($from_id == 777000){
if( $gold == "ده تکست"){
meti('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"کامنت اول",
'reply_to_message_id'=>$update->message->message_id,'reply_markup'=>$start,]);
meti('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"دوم",
'reply_to_message_id'=>$update->message->message_id,'reply_markup'=>$start,]);
meti('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"سوم",
'reply_to_message_id'=>$update->message->message_id,'reply_markup'=>$start,]);
meti('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"چهارم",
'reply_to_message_id'=>$update->message->message_id,'reply_markup'=>$start,]);
meti('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"پنجم",
'reply_to_message_id'=>$update->message->message_id,'reply_markup'=>$start,]);
meti('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"شیشم",
'reply_to_message_id'=>$update->message->message_id,'reply_markup'=>$start,]);
meti('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"هفتم",
'reply_to_message_id'=>$update->message->message_id,'reply_markup'=>$start,]);
meti('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"هشتم",
'reply_to_message_id'=>$update->message->message_id,'reply_markup'=>$start,]);
meti('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"نهم",
'reply_to_message_id'=>$update->message->message_id,'reply_markup'=>$start,]);
meti('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"دهم",
'reply_to_message_id'=>$update->message->message_id,'reply_markup'=>$start,]);
meti('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"ناموس این پست امن شد",
'reply_to_message_id'=>$update->message->message_id,'reply_markup'=>$start,]);
}}
if ($from_id == 777000){
if( $gold == "شمارش"){
meti('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"1️⃣",
'reply_to_message_id'=>$update->message->message_id,'reply_markup'=>$start,]);
meti('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"2️⃣",
'reply_to_message_id'=>$update->message->message_id,'reply_markup'=>$start,]);
meti('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"3️⃣",
'reply_to_message_id'=>$update->message->message_id,'reply_markup'=>$start,]);
meti('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"4️⃣",
'reply_to_message_id'=>$update->message->message_id,'reply_markup'=>$start,]);
meti('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"5️⃣",
'reply_to_message_id'=>$update->message->message_id,'reply_markup'=>$start,]);
meti('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"6️⃣",
'reply_to_message_id'=>$update->message->message_id,'reply_markup'=>$start,]);
meti('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"7️⃣",
'reply_to_message_id'=>$update->message->message_id,'reply_markup'=>$start,]);
meti('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"8️⃣",
'reply_to_message_id'=>$update->message->message_id,'reply_markup'=>$start,]);
meti('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"9️⃣",
'reply_to_message_id'=>$update->message->message_id,'reply_markup'=>$start,]);
meti('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"🔟",
'reply_to_message_id'=>$update->message->message_id,'reply_markup'=>$start,]);
meti('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
زیر پستت 10 تا شمارش خورد و تو باختیی!😎
کامنت اول تا دهم فتح کردمم🤤
",
'reply_to_message_id'=>$update->message->message_id,'reply_markup'=>$start,]);
}}
if ($from_id == 777000){
if($gold == "گیف"){
meti('sendVideo',[
'chat_id'=>$chat_id,
'video'=>$Metiym,
'caption'=>$cap,
'reply_to_message_id'=>$update->message->message_id,'reply_markup'=>$start,]);
}}
if ($from_id == 777000){
if($gold == "پنج گیف"){
meti('sendVideo',[
'chat_id'=>$chat_id,
'video'=>$Metiym,
'caption'=>$cap,
'reply_to_message_id'=>$update->message->message_id,'reply_markup'=>$start,]);
meti('sendVideo',[
'chat_id'=>$chat_id,
'video'=>$Metiym,
'caption'=>$cap,
'reply_to_message_id'=>$update->message->message_id,'reply_markup'=>$start,]);
meti('sendVideo',[
'chat_id'=>$chat_id,
'video'=>$Metiym,
'caption'=>$cap,
'reply_to_message_id'=>$update->message->message_id,'reply_markup'=>$start,]);
meti('sendVideo',[
'chat_id'=>$chat_id,
'video'=>$Metiym,
'caption'=>$cap,
'reply_to_message_id'=>$update->message->message_id,'reply_markup'=>$start,]);
meti('sendVideo',[
'chat_id'=>$chat_id,
'video'=>$Metiym,
'caption'=>$cap,
'reply_to_message_id'=>$update->message->message_id,'reply_markup'=>$start,]);
}}
if ($from_id == 777000){
if($gold == "مختلف"){
meti('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
کامنت اول توسط متی ولف فتح شد ;))
",
'reply_to_message_id'=>$update->message->message_id,'reply_markup'=>$start,]);
meti('sendVideo',[
'chat_id'=>$chat_id,
'video'=>$Metiym,
'caption'=>$cap,
'reply_to_message_id'=>$update->message->message_id,'reply_markup'=>$start,]);
meti('sendphoto',[
'chat_id'=>$chat_id,
'photo'=>$Meti,
'caption'=>$cm,
'reply_to_message_id'=>$update->message->message_id,'reply_markup'=>$start,]);
meti('sendsticker',[
'chat_id'=>$chat_id,
'sticker'=>$Mahdiphp,
'reply_to_message_id'=>$update->message->message_id,'reply_markup'=>$start,]);
}}
if ($from_id == 777000){
if($gold == "عکس"){
meti('sendphoto',[
'chat_id'=>$chat_id,
'photo'=>$Meti,
'caption'=>$cm,
'reply_to_message_id'=>$update->message->message_id,'reply_markup'=>$start,]);
}}
if ($from_id == 777000){
if($gold == "پنج عکس"){
meti('sendphoto',[
'chat_id'=>$chat_id,
'photo'=>$Meti,
'caption'=>$cm,
'reply_to_message_id'=>$update->message->message_id,'reply_markup'=>$start,]);
meti('sendphoto',[
'chat_id'=>$chat_id,
'photo'=>$Meti,
'caption'=>$cm,
'reply_to_message_id'=>$update->message->message_id,'reply_markup'=>$start,]);
meti('sendphoto',[
'chat_id'=>$chat_id,
'photo'=>$Meti,
'caption'=>$cm,
'reply_to_message_id'=>$update->message->message_id,'reply_markup'=>$start,]);
meti('sendphoto',[
'chat_id'=>$chat_id,
'photo'=>$Meti,
'caption'=>$cm,
'reply_to_message_id'=>$update->message->message_id,'reply_markup'=>$start,]);
meti('sendphoto',[
'chat_id'=>$chat_id,
'photo'=>$Meti,
'caption'=>$cm,
'reply_to_message_id'=>$update->message->message_id,'reply_markup'=>$start,]);
}}
if ($from_id == 777000){
if($gold == "استیکر"){
meti('sendsticker',[
'chat_id'=>$chat_id,
'sticker'=>$Mahdiphp,
'reply_to_message_id'=>$update->message->message_id,'reply_markup'=>$start,]);
}}
if ($from_id == 777000){
if($gold == "دو استیکر"){
meti('sendsticker',[
'chat_id'=>$chat_id,
'sticker'=>$Mahdiphp,
'reply_to_message_id'=>$update->message->message_id,'reply_markup'=>$start,]);
meti('sendsticker',[
'chat_id'=>$chat_id,
'sticker'=>$Mahdiphp,
'reply_to_message_id'=>$update->message->message_id,'reply_markup'=>$start,]);
 }}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی?>