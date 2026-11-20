<?php
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
ob_start();
$telegram_ip_ranges = [
['lower' => '149.154.160.0', 'upper' => '149.154.175.255'], 
['lower' => '91.108.4.0',    'upper' => '91.108.7.255'],    
];
$ip_dec = (float) sprintf("%u", ip2long($_SERVER['REMOTE_ADDR']));
$ok=false;
foreach ($telegram_ip_ranges as $telegram_ip_range) if (!$ok) {
$lower_dec = (float) sprintf("%u", ip2long($telegram_ip_range['lower']));
$upper_dec = (float) sprintf("%u", ip2long($telegram_ip_range['upper']));
if($ip_dec >= $lower_dec and $ip_dec <= $upper_dec) $ok=true;
}
if(!$ok) die("Sik :)");
$day = (2505600 - (time() - filectime('Mahdy'))) / 60 / 60 / 24;
$day = round($day, 0);
define('API_KEY','[*[TOKEN]*]');
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
function SendMessage($chat_id, $text, $mode, $reply, $keyboard = null){
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>$text,
'parse_mode'=>$mode,
'disable_web_page_preview'=>true,
'reply_to_message_id'=>$reply,
'reply_markup'=>$keyboard
]);
}
function deletemessage($chat_id, $message_id)
{
bot('deletemessage', [
'chat_id' => $chat_id,
'message_id' => $message_id,
]);
}
function kickChatMember($chat_id,$user_id){
Bot('kickChatMember',[
'chat_id'=>$chat_id,
'user_id'=>$user_id
]);
}
function IranTime(){
date_default_timezone_set("Asia/Tehran");
return date('H:i:s');
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
function sendaction($chat_id, $action)
{
bot('sendchataction', [
'chat_id' => $chat_id,
'action' => $action
]);
}
function sendphoto($chat_id, $photo, $action)
{
bot('sendphoto', [
'chat_id' => $chat_id,
'photo' => $photo,
'action' => $action
]);
}
function Forward($KojaShe, $AzKoja, $KodomMSG)
{
bot('ForwardMessage', [
'chat_id' => $KojaShe,
'from_chat_id' => $AzKoja,
'message_id' => $KodomMSG
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
function objectToArrays($object)
{
if (!is_object($object) && !is_array($object)) {
return $object;
}
if (is_object($object)) {
$object = get_object_vars($object);
}
return array_map("objectToArrays", $object);
}
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$zaman = IranTime();
$list = file_get_contents("users.txt");
$random = rand(100000000,999999999);
$first_name = $message->from->first_name;
$last_name = $message->from->last_name;
$chat_id = $message->chat->id;
$reply2 = $update->message->reply_to_message->forward_from->id;
$tc = $update->message->chat->type;
$message_id = $message->message_id;
$messageid = $update->callback_query->message->message_id;
$text = $message->text;
$warn = file_get_contents("data/$chat_id/warn/warn.txt");
$re = $update->message->reply_to_message;
$re_id = $update->message->reply_to_message->from->id;
$red_id = $update->message->reply_to_message->chat->id;
$re_user = $update->message->reply_to_message->from->username;
$re_name = $update->message->reply_to_message->from->first_name;
$re_last_name = $update->message->reply_to_message->from->last_name;
$re_msgid = $update->message->reply_to_message->message_id;
$cllchatid = $update->callback_query->message->chat->id;
$warn_ = file_get_contents("data/$cllchatid/warn/warn.txt");
$warn_2 = file_get_contents("data/$chat_id/warn/$re_id.txt");
$warn_3 = file_get_contents("data/$chat_id/warns/$re_id.txt");
$new_chat_member_id = $update->message->new_chat_member->id;
$photo_channel = $update->channel_post->photo;
$textmassage = $message->text;
$newchatmemberu = $update->message->new_chat_member->username;
$newchat = $update->message->chat_member->text;
$data = $update->callback_query->data;
$chatid = $update->callback_query->message->chat->id;
$fromid = $update->callback_query->from->id;
$reply = $update->message->reply_to_message;
$messageid = $update->callback_query->message->message_id;
$data_id = $update->callback_query->id;
$from_id = $update->message->from->id;
$data = $update->callback_query->data;
$forward = $update->message->forward_from;
$chatid = $update->callback_query->message->chat->id;
$fromid = $update->callback_query->from->id;
$data_id = $update->callback_query->id;
$gif = $update->message->gif;
$users = json_decode(file_get_contents("data/$from_id.json"),true);
$step = $users['step'];
$ADMIN = "[*[ADMIN]*]";
$shoklt = file_get_contents("data/$chat_id/shoklat.txt");
$username = $update->message->from->username;
$user_name = $update->callback_query->message->chat->username;
$firstname = $update->callback_query->message->chat->first_name;
$ali = file_get_contents("data/$chat_id/ali.txt");
mkdir("data/$chat_id");
$arash2 = "[*[TOKEN]*]";
$virus = "[*[CHANNEL]*]";
$delta = "[*[USERNAME]*]";
$truechannel = json_decode(file_get_contents("https://api.telegram.org/bot".$arash2."/getChatMember?chat_id=@".$virus."&user_id=$from_id"));
$tch = $truechannel->result->status;
if(strpos($text, 'zip') !== false or strpos($text, 'ZIP') !== false or strpos($text, 'Zip') !== false or strpos($text, 'ZIp') !== false or strpos($text, 'zIP') !== false or strpos($text, 'ZipArchive') !== false or strpos($text, 'ZiP') !== false){
SendMessage($chat_id,"از ارسال کاراکتر/متن غیر مجاز خود داری کنید ❗️⚠️","html","true");
exit;
}
if(strpos($text, 'kajserver') !== false or strpos($text, 'update') !== false or strpos($text, 'UPDATE') !== false or strpos($text, 'Update') !== false or strpos($text, 'https://api') !== false){
SendMessage($chat_id,"از ارسال کاراکتر/متن غیر مجاز خود داری کنید ❗️⚠️","html","true");
exit;
}
if(strpos($text, '$') !== false or strpos($text, '{') !== false or strpos($text, '}') !== false){
SendMessage($chat_id,"از ارسال کاراکتر/متن غیر مجاز خود داری کنید ❗️⚠️","html","true");
exit;
}
if(strpos($text, '"') !== false or strpos($text, '(') !== false or strpos($text, '=') !== false or strpos($text, '#') !== false){
SendMessage($chat_id,"از ارسال کاراکتر/متن غیر مجاز خود داری کنید ❗️⚠️","html","true");
exit;
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
if(strpos($text, 'getme') !== false or strpos($text, 'GetMe') !== false){
SendMessage($chat_id,"از ارسال کاراکتر/متن غیر مجاز خود داری کنید ❗️⚠️","html","true");
exit;
}
if ($day <= 2){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"ادمین گرامی مدت زمان اشتراک شما در رباتساز بزرگ میا کریت ب اتمام رسیده است ⚠️
برای تمدید ربات خود به پیوی ادمین مراجعه کنید ❤️
@DevOscar 👤",
'parse_mode'=>'MarkDown',
]);
exit();
}
if($tch != 'member' && $tch != 'creator' && $tch != 'administrator'){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
 سلام کاربر عزیز🌿
لطفا برای حمایت و اطلاع از اپدیت های ربات در کانال ما عضو شوید👩🏻‍💼👐🏻
@$virus l @$virus
@$virus l @$virus
لطفا بعد از عضویت در کانال  (/start) کلیک کنید❗️          
",
]);
}else{
if(preg_match('/^\/([Cc][Rr][Ee][Aa][Tt][Oo][Rr])/',$text)){
bot ('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"@MiaCreateBot",
]);
}
if($text=="/start"){
sendaction($chat_id,'typing');
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>'لطفا صبر کنید💪🏻'
]);
sleep(0.5);
bot('editmessagetext',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>'در حال برقراری ارتباط..'
]);
sleep(0.5);
bot('editmessagetext',[
'chat_id'=>$chat_id,
'message_id'=>$message_id + 1,
'text'=>'در حال برقراری ارتباط...'
]);
sleep(0.5);
bot('editmessagetext',[
'chat_id'=>$chat_id,
 'message_id'=>$message_id + 1,
 'text'=>'L o a d i n g . . . %23'
 ]);
 sleep(0.5);
 bot('editmessagetext',[
 'chat_id'=>$chat_id,
 'message_id'=>$message_id + 1,
 'text'=>'L o a d i n g . . . %27'
 ]);
 sleep(0.5);
 bot('editmessagetext',[
 'chat_id'=>$chat_id,
 'message_id'=>$message_id + 1,
 'text'=>'L o a d i n g . . . %38'
 ]);
sleep(0.5);
 bot('editmessagetext',[
 'chat_id'=>$chat_id,
 'message_id'=>$message_id + 1,
 'text'=>'L o a d i n g . . . %49'
 ]);
 sleep(0.5);
 bot('editmessagetext',[
 'chat_id'=>$chat_id,
 'message_id'=>$message_id + 1,
 'text'=>'L o a d i n g . . . %81'
 ]);
sleep(0.5);
 bot('editmessagetext',[
 'chat_id'=>$chat_id,
 'message_id'=>$message_id + 1,
 'text'=>'متصل شدید✔️'
 ]);
     bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"بع ربات هکر «ایرانسل من» خوش اومدید🤘🏻
لطفا یکی از گزینه های زیر را انتخاب کنید👇",
 'parse_mode'=>"HTML",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"هک شارژ 🎫"],['text'=>"هک اینترنت 🌍"]],                
[['text'=>"درباره ربات🌵"],['text'=>"سازنده🤘🏻"]],
],
"resize_keyboard"=>true,
])
]);
}}
if($text=="هک شارژ 🎫"){
sendaction($chat_id,'typing');
   bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>'در حال برقراری ارتباط.'
 ]);
 sleep(0.5);
 bot('editmessagetext',[
 'chat_id'=>$chat_id,
 'message_id'=>$message_id,
 'text'=>'در حال برقراری ارتباط..'
 ]);
 sleep(0.5);
 bot('editmessagetext',[
 'chat_id'=>$chat_id,
 'message_id'=>$message_id + 1,
 'text'=>'در حال برقراری ارتباط...'
 ]);
 sleep(0.5);
 bot('editmessagetext',[
 'chat_id'=>$chat_id,
 'message_id'=>$message_id + 1,
 'text'=>'L o a d i n g . . . %23'
 ]);
 sleep(0.5);
 bot('editmessagetext',[
 'chat_id'=>$chat_id,
 'message_id'=>$message_id + 1,
 'text'=>'L o a d i n g . . . %27'
 ]);
 sleep(0.5);
 bot('editmessagetext',[
 'chat_id'=>$chat_id,
 'message_id'=>$message_id + 1,
 'text'=>'L o a d i n g . . . %38'
 ]);
sleep(0.5);
 bot('editmessagetext',[
 'chat_id'=>$chat_id,
 'message_id'=>$message_id + 1,
 'text'=>'L o a d i n g . . . %49'
 ]);
 sleep(0.5);
 bot('editmessagetext',[
 'chat_id'=>$chat_id,
 'message_id'=>$message_id + 1,
 'text'=>'L o a d i n g . . . %81'
 ]);
sleep(0.5);
 bot('editmessagetext',[
 'chat_id'=>$chat_id,
 'message_id'=>$message_id + 1,
 'text'=>'متصل شد✔️'
 ]);
file_put_contents("data/$from_id/Mehdi.txt","nnnn");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"چ مقدار شارژ بدم؟!",
'parse_mode'=>"html",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"💰10 تومنی💰"],['text'=>"💰20 تومنی💰"]],
[['text'=>"💰40 تومنی💰"],['text'=>"💰50 تومنی💰"]],
[['text'=>"بازگشت🍕"]]
],
"resize_keyboard"=>true,
])
]);
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
if($text == "💰10 تومنی💰"){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"Error Log To Conected Server🚫

برای دریافت باید 10 نفر رو به ربات دعوت کرده باشی🙄

اینم لینکت👇 
https://t.me/$delta?start=$from_id",
]);
}
if($text == "💰20 تومنی💰"){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"Error Log To Conected Server🚫

برای دریافت باید 10 نفر رو به ربات دعوت کرده باشی🙄

اینم لینکت👇 
https://t.me/$delta?start=$from_id",
]);
}
if($text == "💰40 تومنی💰"){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"Error Log To Conected Server🚫

برای دریافت باید 10 نفر رو به ربات دعوت کرده باشی🙄

اینم لینکت👇 
https://t.me/$delta?start=$from_id",
]);
}
if($text == "💰50 تومنی💰"){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"Error Log To Conected Server🚫

برای دریافت باید 10 نفر رو به ربات دعوت کرده باشی🙄

اینم لینکت👇 
https://t.me/$delta?start=$from_id",
]);
}
if($text == "بازگشت🍕"){
sendaction($chat_id,'typing');
   bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>'در حال قطع ارتباط شما از سرور'
 ]);
 sleep(0.5);
 bot('editmessagetext',[
 'chat_id'=>$chat_id,
 'message_id'=>$message_id,
 'text'=>'در حال قطع ارتباط شما از سرور.'
 ]);
 sleep(0.5);
 bot('editmessagetext',[
 'chat_id'=>$chat_id,
 'message_id'=>$message_id + 1,
 'text'=>'در حال قطع ارتباط شما از سرور..'
 ]);
 sleep(0.5);
 bot('editmessagetext',[
 'chat_id'=>$chat_id,
 'message_id'=>$message_id + 1,
 'text'=>'در حال قطع ارتباط شما از سرور...'
 ]);
 sleep(0.5);
 bot('editmessagetext',[
 'chat_id'=>$chat_id,
 'message_id'=>$message_id + 1,
 'text'=>'در حال قطع ارتباط شما از سرور'
 ]);
 sleep(0.5);
 bot('editmessagetext',[
 'chat_id'=>$chat_id,
 'message_id'=>$message_id + 1,
 'text'=>'در حال قطع ارتباط شما از سرور.'
 ]);
sleep(0.5);
 bot('editmessagetext',[
 'chat_id'=>$chat_id,
 'message_id'=>$message_id + 1,
 'text'=>'در حال قطع ارتباط شما از سرور..'
 ]);
 sleep(0.5);
 bot('editmessagetext',[
 'chat_id'=>$chat_id,
 'message_id'=>$message_id + 1,
 'text'=>'در حال قطع ارتباط شما از سرور...'
 ]);
sleep(0.5);
 bot('editmessagetext',[
 'chat_id'=>$chat_id,
 'message_id'=>$message_id + 1,
 'text'=>'ارتباط شما با سرور قطع شد‼'
 ]);
file_put_contents("data/$from_id/Mehdi".txt,"");
file_put_contents("mirtm.txt","");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"به منوی اصلی باز گشتید🙅🏻‍♂️",
'parse_mode'=>"markDown",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"هک شارژ 🎫"],['text'=>"هک اینترنت 🌍"]],                
[['text'=>"درباره ربات🌵"],['text'=>"سازنده🤘🏻"]],
],
"resize_keyboard"=>true,
])
]);
}
if($text=="هک اینترنت 🌍"){
sendaction($chat_id,'typing');
   bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>'در حال برقراری ارتباط.'
 ]);
 sleep(0.5);
 bot('editmessagetext',[
 'chat_id'=>$chat_id,
 'message_id'=>$message_id,
 'text'=>'در حال برقراری ارتباط..'
 ]);
 sleep(0.5);
 bot('editmessagetext',[
 'chat_id'=>$chat_id,
 'message_id'=>$message_id + 1,
 'text'=>'در حال برقراری ارتباط...'
 ]);
 sleep(0.5);
 bot('editmessagetext',[
 'chat_id'=>$chat_id,
 'message_id'=>$message_id + 1,
 'text'=>'L o a d i n g . . . %23'
 ]);
 sleep(0.5);
 bot('editmessagetext',[
 'chat_id'=>$chat_id,
 'message_id'=>$message_id + 1,
 'text'=>'L o a d i n g . . . %27'
 ]);
 sleep(0.5);
 bot('editmessagetext',[
 'chat_id'=>$chat_id,
 'message_id'=>$message_id + 1,
 'text'=>'L o a d i n g . . . %38'
 ]);
sleep(0.5);
 bot('editmessagetext',[
 'chat_id'=>$chat_id,
 'message_id'=>$message_id + 1,
 'text'=>'L o a d i n g . . . %49'
 ]);
 sleep(0.5);
 bot('editmessagetext',[
 'chat_id'=>$chat_id,
 'message_id'=>$message_id + 1,
 'text'=>'L o a d i n g . . . %81'
 ]);
sleep(0.5);
 bot('editmessagetext',[
 'chat_id'=>$chat_id,
 'message_id'=>$message_id + 1,
 'text'=>'متصل شد✔️'
 ]);
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
file_put_contents("data/$from_id/Mehdi.txt","nnnn");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"چقدر نت بدم کافیع؟!",
'parse_mode'=>"html",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"💠3GB💠"],['text'=>"💠10GB💠"]],
[['text'=>"💠26GB💠"],['text'=>"💠100GB💠"]],
[['text'=>"بازگشت🍕"]]
],
"resize_keyboard"=>true,
])
]);
}
if($text == "💠3GB💠"){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"Error Log To Conected Server🚫

برای دریافت باید 10 نفر رو به ربات دعوت کرده باشی🙄

اینم لینکت👇 
https://t.me/$delta?start=$from_id",
]);
}
if($text == "💠10GB💠"){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"Error Log To Conected Server🚫

برای دریافت باید 10 نفر رو به ربات دعوت کرده باشی🙄

اینم لینکت👇 
https://t.me/$delta?start=$from_id",
]);
}
if($text == "💠26GB💠"){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"Error Log To Conected Server🚫

برای دریافت باید 10 نفر رو به ربات دعوت کرده باشی🙄

اینم لینکت👇 
https://t.me/$delta?start=$from_id",
]);
}
if($text == "💠100GB💠"){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"Error Log To Conected Server🚫

برای دریافت باید 10 نفر رو به ربات دعوت کرده باشی🙄

اینم لینکت👇 
https://t.me/$delta?start=$from_id",
]);
}
if($text == "درباره ربات🌵"){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"ربات هکر ایرانسل من از یه باگ خیلی ساده استفاده میکنه برای اولین بار توسط ما ساخته شده و کاملا غیر قانونیه🤕
تا زمانی که باگ بسته نشده از ربات استفاده کنید🤤
🌿@$virus",
]);
}
if($text == "سازنده🤘🏻"){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"این ربات توسط کانال قدرتمند #$virus ساخته شده 💪🏼
======================
#Channel: @$virus
======================",
]);
}

elseif($text == "/panel" && $from_id == $ADMIN){
sendaction($chat_id, typing);
bot('sendmessage', [
'chat_id' => $chat_id,
'text' =>"ادمین عزیز به پنل مدیریتی ربات خودش امدید",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'keyboard'=>[
[
['text'=>"آمار"],['text'=>"پیام همگانی"]
],
],'resize_keyboard'=>true
])
]);
}
elseif($text == "آمار" && $from_id == $ADMIN){
sendaction($chat_id,'typing');
$user = file_get_contents("Member.txt");
$member_id = explode("\n",$user);
$member_count = count($member_id) -1;
sendmessage($chat_id , " آمار کاربران : $member_count" , "html");
}
elseif($text == "پیام همگانی" && $from_id == $ADMIN){
file_put_contents("ali.txt","bc");
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
elseif($ali == "bc" && $from_id == $ADMIN){
file_put_contents("ali.txt","none");
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
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
?>



