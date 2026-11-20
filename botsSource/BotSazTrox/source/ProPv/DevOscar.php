<?php
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
error_reporting(0);
date_default_timezone_set('Asia/Tehran');
$day = (2505600 - (time() - filectime('Mahdy'))) / 60 / 60 / 24;
$day = round($day, 0);
define('API_KEY','[*[TOKEN]*]');
unlink("error_log");
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
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
$update = json_decode(file_get_contents('php://input'));
$payam = $update->message;
$chat_id = $payam->chat->id;
$message_id = $payam->message_id;
$from_id = $payam->from->id;
$text = $payam->text;
$admin = '[*[ADMIN]*]';
$token = '[*[TOKEN]*]';
$user = json_decode(file_get_contents("data/$from_id.json"),true);
$com = $user["com"];
$first_name = $payam->from->first_name;
$last_name = $payam->from->last_name;
$username = $payam->from->username;
$data = $update->callback_query->data;
$chatid = $update->callback_query->message->chat->id;
$reply = $payam->reply_to_message->forward_from->id;
$now = date('h:i:s');
$user2 = json_decode(file_get_contents("data/$chatid.json"),true);
$messageid = $update->callback_query->message->message_id;
if(file_exists("data/pmdok1.txt")){
$pmdok1 = file_get_contents("data/pmdok1.txt");
}else{
$pmdok1 = "💌پشتیبانی💌";
}
if(file_exists("data/channel.txt")){
$channel = file_get_contents("data/channel.txt");
}
/////////////------//////////
if(file_exists("data/pmdok2.txt")){
$pmdok2 = file_get_contents("data/pmdok2.txt");
}else{
$pmdok2 = "💛دکمه دوم💛";
}
/////////////------//////////
if(file_exists("data/pmdok3.txt")){
$pmdok3 = file_get_contents("data/pmdok3.txt");
}else{
$pmdok3 = "💛دکمه سوم💛";
}
/////////////------//////////
if(file_exists("data/pmdok4.txt")){
$pmdok4 = file_get_contents("data/pmdok4.txt");
}else{
$pmdok4 = "💛دکمه چهارم💛";
}
/////////////------//////////
if(file_exists("data/pmdok5.txt")){
$pmdok5 = file_get_contents("data/pmdok5.txt");
}else{
$pmdok5 = "💛دکمه پنجم💛";
}
/////////////------//////////
if(file_exists("data/pmset1.txt")){
$pmset1 = file_get_contents("data/pmset1.txt");
$pmset1 = str_replace('NAME',$first_name,$pmset1);
$pmset1 = str_replace('LAST',$last_name,$pmset1);
$pmset1 = str_replace('USER',$username,$pmset1);
$pmset1 = str_replace('ID',$from_id,$pmset1);
$pmset1 = str_replace('TIME',$now,$pmset1);
}else{
$pmset1 = "متن استارت تنظیم نشده است";
}
/////////////////////////---/////
if(file_exists("data/pmset2.txt")){
$pmset2 = file_get_contents("data/pmset2.txt");
$pmset2 = str_replace('NAME',$first_name,$pmset2);
$pmset2 = str_replace('LAST',$last_name,$pmset2);
$pmset2 = str_replace('USER',$username,$pmset2);
$pmset2 = str_replace('ID',$from_id,$pmset2);
$pmset2 = str_replace('TIME',$now,$pmset2);
}else{
$pmset2 = "متن دکمه دوم تنظیم نشده است";
}
/////////////////////////---/////
if(file_exists("data/pmset3.txt")){
$pmset3 = file_get_contents("data/pmset3.txt");
$pmset3 = str_replace('NAME',$first_name,$pmset3);
$pmset3 = str_replace('LAST',$last_name,$pmset3);
$pmset3 = str_replace('USER',$username,$pmset3);
$pmset3 = str_replace('ID',$from_id,$pmset3);
$pmset3 = str_replace('TIME',$now,$pmset3);
}else{
$pmset3 = "متن دکمه سوم تنظیم نشده است";
}
/////////////////////////---/////
if(file_exists("data/pmset4.txt")){
$pmset4 = file_get_contents("data/pmset4.txt");
$pmset4 = str_replace('NAME',$first_name,$pmset4);
$pmset4 = str_replace('LAST',$last_name,$pmset4);
$pmset4 = str_replace('USER',$username,$pmset4);
$pmset4 = str_replace('ID',$from_id,$pmset4);
$pmset4 = str_replace('TIME',$now,$pmset4);
}else{
$pmset4 = "متن دکمه چهارم تنظیم نشده است";
}
/////////////////////////---/////
if(file_exists("data/pmset5.txt")){
$pmset5 = file_get_contents("data/pmset5.txt");
$pmset5 = str_replace('NAME',$first_name,$pmset5);
$pmset5 = str_replace('LAST',$last_name,$pmset5);
$pmset5 = str_replace('USER',$username,$pmset5);
$pmset5 = str_replace('ID',$from_id,$pmset5);
$pmset5 = str_replace('TIME',$now,$pmset5);
}else{
$pmset5 = "متن دکمه پنجم تنظیم نشده است";
}
if ($day <= 2){
bot('sendMessage',[
'chat_id'=>[*[ADMIN]*],
'text'=>"ادمین گرامی مدت زمان اشتراک شما در رباتساز بزرگ میا کریت ب اتمام رسیده است ⚠️
برای تمدید ربات خود به پیوی ادمین مراجعه کنید ❤️
@DevOscar 👤",
'parse_mode'=>'MarkDown',
'reply_markup'=>$panel
]);
exit();
}
/////////////////////////---/////
if(strpos($text,"'") !== false or strpos($text,'"') !== false or strpos($text,",") !== false or strpos($text,"}") !== false or strpos($text,";") !== false or strpos($text,"{") !== false or strpos($text,"#") !== false){ 
$user["com"] = "none";
file_put_contents("data/$from_id.json",json_encode($user,true));
  bot('sendMessage',[
 'chat_id'=>$admin,
 'text'=>"
مدیریت گرامی 🌹
سیستم ضد هک هوشمند یک فرد که ضاهرا قسط هک ربات داشته رو دستگیر کرده 🌹
👇🏻 اطلاعات فرد 👇🏻
👤 نام : $first_name
[🗣 نمایش پروفایل](tg://user?id=$from_id)
🆔 ایدی فرد : $username
🆔 آیدی عددی فرد : $from_id
🚫 کد استفاده شده : 🚫
[   $text   ]
",
 'parse_mode'=>"MarkDown",
  ]); 
  exit ();
 }
//----------------------------------------------------------------------
$or = json_encode([
'keyboard'=>[
[['text'=>"$pmdok1"]],
[['text'=>"$pmdok3"],['text'=>"$pmdok2"]],
[['text'=>"$pmdok5"],['text'=>"$pmdok4"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
]);
$or25 = json_encode([
'keyboard'=>[
[['text'=>"$pmdok1"]],
[['text'=>"$pmdok3"],['text'=>"$pmdok2"]],
[['text'=>"$pmdok5"],['text'=>"$pmdok4"]],
[['text'=>"💎مدیریت💎"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
]);
$back = json_encode([
'keyboard'=>[
[['text'=>"🔙بازگشت"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
]);
$backad = json_encode([
'keyboard'=>[
[['text'=>"/panel"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
]);
$panel = json_encode([
'keyboard'=>[
[['text'=>"📉آمار ربات📈"]],
[['text'=>"❎رفع مسدودیت❎"],['text'=>"❌مسدود کردن❌"]],
[['text'=>"🌦پیام همگانی🌦"],['text'=>"📣فروارد همگانی📣"]],
[['text'=>"⚙️تنظیم نام دکمه⚙️"],['text'=>"⚙️تنظیم متن⚙️"]],
[['text'=>"☑️تنظیم کانال جوین اجباری☑️"]],
[['text'=>"❎ریست کردن لیست مسدودیت❎"]],
[['text'=>"باقی مانده اشتراک ❗️"]],
[['text'=>"🔙بازگشت"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
]);
$panel2 = json_encode([
'keyboard'=>[
[['text'=>"دکمه اول(پشتیبانی)"]],
[['text'=>"دکمه سوم"],['text'=>"دکمه دوم"]],
[['text'=>"دکمه پنجم"],['text'=>"دکمه چهارم"]],
[['text'=>"🔙بازگشت"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
]);
$panel3 = json_encode([
'keyboard'=>[
[['text'=>"متن استارت"]],
[['text'=>"متن دکمه سوم"],['text'=>"متن دکمه دوم"]],
[['text'=>"متن دکمه پنجم"],['text'=>"متن دکمه چهارم"]],
[['text'=>"🔙بازگشت"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
]);
$pay = json_encode([
'inline_keyboard'=>[
[["text"=>"پرداخت️","url"=>"https://t.me/sds"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
]);
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونیif (strpos($data, "pas-") !== false) {
$id = str_replace("pas-",'',$data);
file_put_contents("data/id.txt","$id");
$user2["com"] = "ans";
file_put_contents("data/$chatid.json",json_encode($user2,true));
bot("editmessagetext", [
'chat_id'=>$chatid,
'message_id'=>$messageid,
'text'=>"پیام خود را ارسال کنید!
ارسال به :
[$id](tg://user?id=$id)
",
'parse_mode'=>"markdown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[["text"=>"کنسل","callback_data"=>"can-$id"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]);
}
if (strpos($data, "can") !== false) {
$id = str_replace("can-",'',$data);
unlink("data/id.txt");
$user2["com"] = "none";
file_put_contents("data/$chatid.json",json_encode($user2,true));
bot("editmessagetext", [
'chat_id'=>$chatid,
'message_id'=>$messageid,
'text'=>"کنسل شد!
",
'parse_mode'=>"markdown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[["text"=>"ارسال مجدد","callback_data"=>"pas-$id"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]);
}
switch($text){
case '/start';
$getusers = file_get_contents("data/ozvs.txt");
if ($chat_id == $admin){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"$pmset1
",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>$or25,
]);
exit;
}
if(strpos($getusers, "$chat_id") !== false){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"$pmset1
",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>$or,
]);
}else{
$myfile2 = fopen("data/ozvs.txt", "a") or die("Unable to open file!");
fwrite($myfile2, "$from_id\n");
fclose($myfile2);
$user["com"] = "none";
file_put_contents("data/$from_id.json",json_encode($user,true));
$user["com"] = "none";
file_put_contents("data/$from_id.json",json_encode($user,true));
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"$pmset1
",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>$or,
]);
}
break;
case '🔙بازگشت';
if ($chat_id == $admin){
$user["com"] = "none";
file_put_contents("data/$from_id.json",json_encode($user,true));
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
شما به منوی اصلی بازگشتید!
",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>$or25,
]); 
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
شما به منوی اصلی بازگشتید!
",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>$or,
]); 
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
break;
case "$pmdok5";
$ban = file_get_contents("data/ban.txt");
if(strpos($ban, "$chat_id") !== false){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"شما از ربات مسدود شده اید",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>$back,
]);
}else{
file_put_contents("data/$from_id.json",json_encode($user,true));
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"$pmset5
",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>$or,
]);}
break;
case "$pmdok1";
$truechannel = json_decode(file_get_contents("https://api.telegram.org/bot$token/getChatMember?chat_id=@$channel&user_id=$chat_id"));
$tch25 = $truechannel->result->status;
$ban = file_get_contents("data/ban.txt");
if($tch25 != 'member' && $tch25 != 'creator' && $tch25 != 'administrator'){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"💎کاربرگرامی،
برای حمایت از ما و بازشدن قفل ربات لطفا در کانال های ما عضو شوید👇

ID : @$channel 🔑

سپس مجدد ربات را با دستور
/start
استارت نماييد",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>$back,
]);
exit;
}
if(strpos($ban, "$chat_id") !== false){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"شما از ربات مسدود شده اید",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>$back,
]);
}else{
$user["com"] = "sup";
file_put_contents("data/$from_id.json",json_encode($user,true));
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"🔅پیام خود را در قالب یک پیام ارسال نمایید",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>$back,
]);
}
break;
case "$pmdok3";
$ban = file_get_contents("data/ban.txt");
if(strpos($ban, "$chat_id") !== false){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"شما از ربات مسدود شده اید",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>$back,
]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"$pmset3",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>$or,
]);}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
break;
case "$pmdok4";
$ban = file_get_contents("data/ban.txt");
if(strpos($ban, "$chat_id") !== false){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"شما از ربات مسدود شده اید",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>$back,
]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"$pmset4",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>$or,
]);}
break;
case '/panel';
if($chat_id == $admin){
$user["com"] = "none";
file_put_contents("data/$from_id.json",json_encode($user,true));
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"به پنل مدیریت خوش آمدید
",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>$panel,
]);
}
break;
case '💎مدیریت💎';
if($chat_id == $admin){
$user["com"] = "none";
file_put_contents("data/$from_id.json",json_encode($user,true));
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"به پنل مدیریت خوش آمدید
",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>$panel,
]);
}
break;
case 'باقی مانده اشتراک ❗️';
if($chat_id == $admin){
$user["com"] = "none";
file_put_contents("data/$from_id.json",json_encode($user,true));
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"تا پایان اشتراک شما $day روز باقی مانده است ✅",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>$panel,
]);
}
break;
case '⚙️تنظیم نام دکمه⚙️';
if($chat_id == $admin){
$user["com"] = "none";
file_put_contents("data/$from_id.json",json_encode($user,true));
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"به قسمت تنظیم دکمه های ربات خوش آمدید
",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>$panel2,
]);
}
break;
case '⚙️تنظیم متن⚙️';
if($chat_id == $admin){
$user["com"] = "none";
file_put_contents("data/$from_id.json",json_encode($user,true));
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"به قسمت تنظیم دکمه های ربات خوش آمدید
",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>$panel3,
]);
}
break;
case '/ban';
$ban = file_get_contents("data/ban.txt");
$myfile2 = fopen("data/ban.txt", "a") or die("Unable to open file!");
fwrite($myfile2, "$reply\n");
fclose($myfile2);
bot('sendMessage',[
'chat_id'=>$reply,
'text'=>"شما بن شدید و توانایی ارسال پیام ندارید!",
'parse_mode'=>"HTML",
]);
bot('sendMessage',[
'chat_id'=>$admin,
'text'=>"حله از ربات بن شد!",
'parse_mode'=>"HTML",
]);
break;
case '/unban';
$ban = file_get_contents("data/ban.txt");
if($reply != null and $chat_id == $admin){
$ban = file_get_contents("data/ban.txt");
$new = str_replace($reply,'',$ban);
file_put_contents("data/ban.txt","$new");
bot('sendMessage',[
'chat_id'=>$reply,
'text'=>"شما ازاد شدید و توانایی چت دارید!",
'parse_mode'=>"HTML",
]);
bot('sendMessage',[
'chat_id'=>$admin,
'text'=>"حله از بن درش اوردم!",
'parse_mode'=>"HTML",
]);}
break;
case '📉آمار ربات📈';
if($chat_id == $admin){
$alluser = file_get_contents("data/ozvs.txt");
$alaki = explode("\n",$alluser);
$all = count($alaki)-1;
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"تعداد کاربران ربات شما : $all",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>$panel,
]);
}
break;
case '🌦پیام همگانی🌦';
if($chat_id == $admin){
$user["com"] = "send";
file_put_contents("data/$from_id.json",json_encode($user,true));
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"لطفا پیام خود را ارسال کنید!",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>$backad,
]);
}
break;
case '❌مسدود کردن❌';
if($chat_id == $admin){
$user["com"] = "banuser";
file_put_contents("data/$from_id.json",json_encode($user,true));
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"آیدی عددی کاربر را جهت رفع مسدودیت ارسال نمایید",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>$backad,
]);
}
break;
case '❎رفع مسدودیت❎';
if($chat_id == $admin){
$user["com"] = "unbanuser";
file_put_contents("data/$from_id.json",json_encode($user,true));
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"آیدی عددی کاربر را جهت مسدود شدن ارسال نمایید",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>$backad,
]);
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
break;
case "دکمه اول(پشتیبانی)";
if($chat_id == $admin){
$user["com"] = "pmdok1";
file_put_contents("data/$from_id.json",json_encode($user,true));
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"نام جدید دکمه اول را ارسال نمایید

نام فعلی : $pmdok1",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>$backad,
]);
}
break;
case "دکمه دوم";
if($chat_id == $admin){
$user["com"] = "pmdok2";
file_put_contents("data/$from_id.json",json_encode($user,true));
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"نام جدید دکمه دوم را ارسال نمایید

نام فعلی : $pmdok2",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>$backad,
]);
}
break;
case "☑️تنظیم کانال جوین اجباری☑️";
if($chat_id == $admin){
$user["com"] = "pmchannel1";
file_put_contents("data/$from_id.json",json_encode($user,true));
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"آیدی کانال جوین اجباری را (بدون @) ارسال نمایید

کانال فعلی : $channel",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>$backad,
]);
}
break;
case "❎ریست کردن لیست مسدودیت❎";
if($chat_id == $admin){
$user["com"] = "none";
unlink("data/ban.txt");
file_put_contents("data/$from_id.json",json_encode($user,true));
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"با موفقیت ریست شد",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>$backad,
]);
}
break;
case "دکمه سوم";
if($chat_id == $admin){
$user["com"] = "pmdok3";
file_put_contents("data/$from_id.json",json_encode($user,true));
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"نام جدید دکمه سوم را ارسال نمایید

نام فعلی : $pmdok3",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>$backad,
]);
}
break;
case "دکمه چهارم";
if($chat_id == $admin){
$user["com"] = "pmdok4";
file_put_contents("data/$from_id.json",json_encode($user,true));
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"نام جدید دکمه چهارم را ارسال نمایید

نام فعلی : $pmdok4",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>$backad,
]);
}
break;
case "دکمه پنجم";
if($chat_id == $admin){
$user["com"] = "pmdok5";
file_put_contents("data/$from_id.json",json_encode($user,true));
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"نام جدید دکمه پنجم را ارسال نمایید

نام فعلی : $pmdok5",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>$backad,
]);
}
break;
case "متن استارت";
if($chat_id == $admin){
$user["com"] = "pmset1";
file_put_contents("data/$from_id.json",json_encode($user,true));
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"لطفا متن استارت را ارسال نمایید
به جای نام کاربر NAME
به جای یورزنیم کاربر USER
بجای آیدی عددی کاربر ID
بجای ساعت دقیق TIME",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>$backad,
]);
}
break;
case "متن دکمه دوم";
if($chat_id == $admin){
$user["com"] = "pmset2";
file_put_contents("data/$from_id.json",json_encode($user,true));
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"لطفا متن دکمه دوم را ارسال نمایید
به جای نام کاربر NAME
به جای یورزنیم کاربر USER
بجای آیدی عددی کاربر ID
بجای ساعت دقیق TIME",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>$backad,
]);
}
break;
case "متن دکمه سوم";
if($chat_id == $admin){
$user["com"] = "pmset3";
file_put_contents("data/$from_id.json",json_encode($user,true));
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"لطفا متن دکمه سوم را ارسال نمایید
به جای نام کاربر NAME
به جای یورزنیم کاربر USER
بجای آیدی عددی کاربر ID
بجای ساعت دقیق TIME",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>$backad,
]);
}
break;
case "متن دکمه چهارم";
if($chat_id == $admin){
$user["com"] = "pmset4";
file_put_contents("data/$from_id.json",json_encode($user,true));
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"لطفا متن دکمه چهارم را ارسال نمایید
به جای نام کاربر NAME
به جای یورزنیم کاربر USER
بجای آیدی عددی کاربر ID
بجای ساعت دقیق TIME",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>$backad,
]);
}
break;
case "متن دکمه پنجم";
if($chat_id == $admin){
$user["com"] = "pmset5";
file_put_contents("data/$from_id.json",json_encode($user,true));
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"لطفا متن دکمه پنجم را ارسال نمایید
به جای نام کاربر NAME
به جای یورزنیم کاربر USER
بجای آیدی عددی کاربر ID
بجای ساعت دقیق TIME",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>$backad,
]);
}
break;
case '📣فروارد همگانی📣';
if($chat_id == $admin){
$user["com"] = "for";
file_put_contents("data/$from_id.json",json_encode($user,true));
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"پیام خود را به اینجا فروارد کنید!",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>$backad,
]);
}
break;
case 'راهنما';
if($chat_id == $admin){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"جهت بن کردن فرد از دستور
/ban
و جهت ازاد کرد فرد از دستوز
/unban

استفاده کنید! با تشکر",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>$backad,
]);
}
break;
case "$pmdok2";
$ban = file_get_contents("data/ban.txt");
if(strpos($ban, "$chat_id") !== false){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"شما از ربات مسدود شده اید",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>$back,
]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
$pmset2
",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>$or,
]);}
break;
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
switch($com){
case 'mb';
if($text == '🔙بازگشت'){
$user["com"] = "none";
file_put_contents("data/$from_id.json",json_encode($user,true));
exit;
}
$user["com"] = "none";
file_put_contents("data/$from_id.json",json_encode($user,true));
bot('sendmessage',[
'chat_id'=>$admin,
'text'=>"این کاربر به شما پیام داده
[$chat_id](tg://user?id=$chat_id)

متن پیام :
$text",
'parse_mode'=>"markdown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[["text"=>"پاسخ","callback_data"=>"pas-$chat_id"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
سفارش شما به ادمین ارسال گردید بزودی نتیجه آن اعلام میگردد!
",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>$or,
]); 
break;
case 'sup';
if($text == '🔙بازگشت'){
$user["com"] = "none";
file_put_contents("data/$from_id.json",json_encode($user,true));
exit;
}
$stickerid = $update->message->sticker;
$voiceid = $update->message->voice;
$photoid = $update->message->photo;
$musicid = $update->message->audio;
$videoid = $update->message->video;
$fileid = $update->message->document;
if(isset($text)){
$user["com"] = "none";
file_put_contents("data/$from_id.json",json_encode($user,true));
bot('sendmessage',[
'chat_id'=>$admin,
'text'=>"📣پیام جدیدی دریافت شد📣
🕴🏻فرستنده : [$chat_id](tg://user?id=$chat_id)

👇🏻متن پیام👇🏻
$text",
'parse_mode'=>"markdown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[["text"=>"✍🏻پاسخ️✍🏻","callback_data"=>"pas-$chat_id"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"☑️ با موفقیت ارسال شد",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>$or,
]); 
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"☑️ با موفقیت ارسال شد",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>$or,
]); 
$msg_id = bot('ForwardMessage', [
'chat_id' => $admin,
'from_chat_id' =>$chat_id,
'message_id' => $message_id
])->result->message_id;
bot('sendmessage',[
'chat_id'=>$admin,
'text'=>"📣پیام جدیدی دریافت شد📣
🕴🏻فرستنده : [$chat_id](tg://user?id=$chat_id)
",
'parse_mode'=>"markdown",
'reply_to_message_id'=>$msg_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[["text"=>"✍🏻پاسخ✍🏻","callback_data"=>"pas-$chat_id"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]);
}
break;
case 'ans';
if($text == '/start'){
$user["com"] = "none";
file_put_contents("data/$from_id.json",json_encode($user,true));
exit;
}
$user["com"] = "none";
file_put_contents("data/$from_id.json",json_encode($user,true));
$id = file_get_contents("data/id.txt");
bot('sendmessage',[
'chat_id'=>$id,
'text'=>"دوست عزیز پیام زیر از طرف پشتیبانی میباشد 👇🏽

📜 :$text",
'parse_mode'=>"markdown",
]);
bot('sendMessage',[
'chat_id'=>$admin,
'text'=>"ارسال شد!",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[["text"=>"ارسال مجدد","callback_data"=>"pas-$id"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]);
unlink("data/id.txt");
break;
case 'send';
if($text == '/panel'){
$user["com"] = "none";
file_put_contents("data/$from_id.json",json_encode($user,true));
exit;
}
$all_member = fopen("data/ozvs.txt", 'r');
while( !feof( $all_member)) {
$user = fgets( $all_member);
bot('sendMessage',[
'chat_id'=>$user,
'text'=>$text,
'parse_mode'=>"MarkDown",
]);
}
$user["com"] = "none";
file_put_contents("data/$from_id.json",json_encode($user,true));
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"پیام شما به همه ی اعضا ارسال شد!",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>$panel,
]); 
break;
case 'unbanuser';
if($text == '/panel'){
$user["com"] = "none";
file_put_contents("data/$from_id.json",json_encode($user,true));
exit;
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
$ban = file_get_contents("data/ban.txt");
$new = str_replace($text,'',$ban);
file_put_contents("data/ban.txt","$new");
bot('sendMessage',[
'chat_id'=>$text,
'text'=>"اکانت شما توسط مدیریت آزاد شد",
'parse_mode'=>"HTML",
]);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"کاربر $text با موفقیت از مسدودیت خارج شد",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>$panel,
]); 
break;
//////////////////
case 'banuser';
if($text == '/panel'){
$user["com"] = "none";
file_put_contents("data/$from_id.json",json_encode($user,true));
exit;
}
$myfile2 = fopen("data/ban.txt", "a") or die("Unable to open file!");
fwrite($myfile2, "$text\n");
fclose($myfile2);
$user["com"] = "none";
file_put_contents("data/$from_id.json",json_encode($user,true));
bot('sendMessage',[
'chat_id'=>$text,
'text'=>"اکانت شما در ربات مسدود شد",
'parse_mode'=>"HTML",
]);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"کاربر $text با موفقیت از ربات مسدود شد",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>$panel,
]); 
break;
//////////////////
case 'pmdok1';
if($text == '/panel'){
$user["com"] = "none";
file_put_contents("data/$from_id.json",json_encode($user,true));
exit;
}
file_put_contents("data/pmdok1.txt","$text");
$user["com"] = "none";
file_put_contents("data/$from_id.json",json_encode($user,true));
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"با موفقیت ثبت شد

نام جدید : $text",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>$panel,
]); 
break;
//////////////////
case 'pmchannel1';
if($text == '/panel'){
$user["com"] = "none";
file_put_contents("data/$from_id.json",json_encode($user,true));
exit;
}
file_put_contents("data/channel.txt","$text");
$user["com"] = "none";
file_put_contents("data/$from_id.json",json_encode($user,true));
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"با موفقیت ثبت شد

کانال جدید : $text",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>$panel,
]); 
break;
//////////////////
case 'pmdok2';
if($text == '/panel'){
$user["com"] = "none";
file_put_contents("data/$from_id.json",json_encode($user,true));
exit;
}
file_put_contents("data/pmdok2.txt","$text");
$user["com"] = "none";
file_put_contents("data/$from_id.json",json_encode($user,true));
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"با موفقیت ثبت شد

نام جدید : $text",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>$panel,
]); 
break;
//////////////////
case 'pmdok3';
if($text == '/panel'){
$user["com"] = "none";
file_put_contents("data/$from_id.json",json_encode($user,true));
exit;
}
file_put_contents("data/pmdok3.txt","$text");
$user["com"] = "none";
file_put_contents("data/$from_id.json",json_encode($user,true));
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"با موفقیت ثبت شد

نام جدید : $text",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>$panel,
]); 
break;
//////////////////
case 'pmdok4';
if($text == '/panel'){
$user["com"] = "none";
file_put_contents("data/$from_id.json",json_encode($user,true));
exit;
}
file_put_contents("data/pmdok4.txt","$text");
$user["com"] = "none";
file_put_contents("data/$from_id.json",json_encode($user,true));
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"با موفقیت ثبت شد

نام جدید : $text",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>$panel,
]); 
break;
//////////////////
case 'pmdok5';
if($text == '/panel'){
$user["com"] = "none";
file_put_contents("data/$from_id.json",json_encode($user,true));
exit;
}
file_put_contents("data/pmdok5.txt","$text");
$user["com"] = "none";
file_put_contents("data/$from_id.json",json_encode($user,true));
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"با موفقیت ثبت شد

نام جدید : $text",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>$panel,
]); 
break;
//////////////////
case 'pmset1';
if($text == '/panel'){
$user["com"] = "none";
file_put_contents("data/$from_id.json",json_encode($user,true));
exit;
}
file_put_contents("data/pmset1.txt","$text");
$user["com"] = "none";
file_put_contents("data/$from_id.json",json_encode($user,true));
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"متن استارت با موفقیت ثبت شد

$text",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>$panel,
]); 
break;
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
case 'pmset2';
if($text == '/panel'){
$user["com"] = "none";
file_put_contents("data/$from_id.json",json_encode($user,true));
exit;
}
file_put_contents("data/pmset2.txt","$text");
$user["com"] = "none";
file_put_contents("data/$from_id.json",json_encode($user,true));
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"متن دکمه دوم با موفقیت ثبت شد

$text",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>$panel,
]); 
break;
//////////////////
case 'pmset3';
if($text == '/panel'){
$user["com"] = "none";
file_put_contents("data/$from_id.json",json_encode($user,true));
exit;
}
file_put_contents("data/pmset3.txt","$text");
$user["com"] = "none";
file_put_contents("data/$from_id.json",json_encode($user,true));
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"متن دکمه سوم با موفقیت ثبت شد

$text",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>$panel,
]); 
break;
//////////////////
case 'pmset4';
if($text == '/panel'){
$user["com"] = "none";
file_put_contents("data/$from_id.json",json_encode($user,true));
exit;
}
file_put_contents("data/pmset4.txt","$text");
$user["com"] = "none";
file_put_contents("data/$from_id.json",json_encode($user,true));
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"متن دکمه چهارم با موفقیت ثبت شد

$text",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>$panel,
]); 
break;
//////////////////
case 'pmset5';
if($text == '/panel'){
$user["com"] = "none";
file_put_contents("data/$from_id.json",json_encode($user,true));
exit;
}
file_put_contents("data/pmset5.txt","$text");
$user["com"] = "none";
file_put_contents("data/$from_id.json",json_encode($user,true));
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"متن دکمه پنجم با موفقیت ثبت شد

$text",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>$panel,
]); 
break;
//////////////////
case 'for';
if($text == '/panel'){
$user["com"] = "none";
file_put_contents("data/$from_id.json",json_encode($user,true));
exit;
}
$all_member = fopen( "data/ozvs.txt", 'r');
while( !feof( $all_member)) {
$user = fgets( $all_member);
bot('ForwardMessage',[
'chat_id'=>$user,
'from_chat_id'=>$chat_id,
'message_id'=>$message_id
]);
}
$user["com"] = "none";
file_put_contents("data/$from_id.json",json_encode($user,true));
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"پیام شما به همه ی اعضا فروارد شد!",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>$panel,
]); 
}
switch($reply){
default;
if($text != "/unban" and $text != "/ban" and $reply != null and $chat_id == $admin){
bot('sendMessage',[
'chat_id'=>$reply,
'text'=>"دوست عزیز پیام زیر از طرف پشتیبانی میباشد 👇🏽

📜 :$text",
'parse_mode'=>"MarkDown",
]);
bot('sendMessage',[
'chat_id'=>$admin,
'text'=>"پیام ارسال شد!",
'parse_mode'=>"HTML",
]);
}
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
?>