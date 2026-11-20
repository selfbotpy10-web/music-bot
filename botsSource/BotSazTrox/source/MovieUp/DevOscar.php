<?php
$day = (2505600 - (time() - filectime('Mahdy'))) / 60 / 60 / 24;
$day = round($day, 0);
$config = ['admin' => [1100991740],'channel' => "[*[CHANNEL]*]",'channel2' => "[*[CHANNEL]*]",'channel3' => "[*[CHANNEL]*]"];
define('API_KEY',"[*[TOKEN]*]");
function bot($method,$datas=[]){
$url = "https://api.telegram.org/bot".API_KEY."/".$method;
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_POSTFIELDS,http_build_query($datas));
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
function RandomString() {
$characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
$randstring = null;
for ($i = 0; $i < 9; $i++) {
$randstring .= $characters[
rand(0, strlen($characters))
];
}
return $randstring;
}
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$message_id = $message->message_id;
$text = $message->text;
$chat_id = $message->chat->id;
$from_id = $message->from->id;
$back = $update->callback_query->data;
$messageid = $update->callback_query->message->message_id;
$chatid = $update->callback_query->message->chat->id;
$Dev = [*[ADMIN]*];
if(strpos($text, "/start _") !== false) {
$joinok = str_replace("/start _", null, $text);
}
if(!is_dir("member")){
mkdir("member");
}
if(!is_dir("member/$from_id")){
mkdir("member/$from_id");
}
if(!is_dir("settings")){
mkdir("settings");
}
if(!is_dir("uploader")){
mkdir("uploader");
}
if(!file_exists('settings/power.txt')){
file_put_contents('settings/power.txt', 'on');
}
if(!file_exists('settings/step.txt')){
file_put_contents('settings/step.txt', 'none');
}
if(!file_exists('settings/countuploadfile.txt')){
file_put_contents('settings/countuploadfile.txt', '0');
}
if(!file_exists('settings/data.txt')){
file_put_contents('settings/data.txt', 'none');
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
if(!file_exists('settings/roko.txt')){
file_put_contents('settings/roko.txt', 'none');
}
if(!file_exists('settings/channel1.txt')){
file_put_contents('settings/channel1.txt', "{$config['channel']}");
}
if(!file_exists('settings/channel2.txt')){
file_put_contents('settings/channel2.txt', "{$config['channel2']}");
}
if(!file_exists('settings/channel3.txt')){
file_put_contents('settings/channel3.txt', "{$config['channel3']}");
}
$user = file_get_contents("member.txt");
$power = file_get_contents("settings/power.txt");
$channnnel1 = file_get_contents('settings/channel1.txt');
$channnnel2 = file_get_contents('settings/channel2.txt');
$channnnel3 = file_get_contents('settings/channel3.txt');
$roko = file_get_contents("settings/roko.txt");
$data = file_get_contents("settings/data.txt");
$scan = file_get_contents("settings/countuploadfile.txt");
$step = file_get_contents("settings/step.txt");
$join_r = json_decode(file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=@$channnnel1&user_id=$from_id"));
$join_e = $join_r->result->status;
$join_y = json_decode(file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=@$channnnel2&user_id=$from_id"));
$join_z = $join_y->result->status;
$usernamebot = json_decode(file_get_contents('https://api.telegram.org/bot'.API_KEY.'/getMe'))->result->username;
$menu_remove = json_encode(['KeyboardRemove'=>[
],'remove_keyboard'=>true]);
if (in_array($from_id, $config['admin'])) {
$menu = json_encode(['keyboard'=>[
[['text' => "اپلود ویدیو 🎥"],['text' => "حذف فایل ❌"]],
[['text' => "ارسال پست به چنل 📡"]],
[['text' => "امار 📊"]],
[['text' => "خاموش کردن ربات 📵"],['text' => "روشن کردن ربات 💡"]],
[['text' => "پیام همگانی 🌍"]],
], 'resize_keyboard' => true
]);
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
}elseif ($from_id == $Dev) {
$menu = json_encode(['keyboard'=>[
[['text' => "اپلود ویدیو 🎥"],['text' => "حذف فایل ❌"]],
[['text' => "تنظیم کانال دوم 2️⃣"],['text' => "تنظیم کانال اول 1️⃣"]],
[['text' => "تنظیم کانال سوم 3⃣"]],
[['text' => "ارسال پست به چنل 📡"]],
[['text' => "امار 📊"]],
[['text' => "خاموش کردن ربات 📵"],['text' => "روشن کردن ربات 💡"]],
[['text' => "پیام همگانی 🌍"]],
[['text' => "باقی مانده اشتراک ❗️"]],
], 'resize_keyboard' => true
]);
}else{
$menu = json_encode(['keyboard'=>[
[['text' => "راهنما ❓"]],
], 'resize_keyboard' => true
]);
}
if ($day <= 2){
bot('sendmessage',[
'chat_id'=>[*[ADMIN]*],
'text'=>"ادمین گرامی مدت زمان اشتراک شما در رباتساز بزرگ میا کریت ب اتمام رسیده است ⚠️
برای تمدید ربات خود به پیوی ادمین مراجعه کنید ❤️
@DevOscar 👤",
'parse_mode'=>'MarkDown',
'reply_markup'=>$menu
]);
exit();
}
if($power == "off" && !in_array($from_id,$config['admin']) && $from_id !== $Dev){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
ربات بنابه دلایلی خاموش میباشد لطفا صبور باشید!
",
'parse_mode'=>'html',
'reply_markup'=>$menu_remove
]);
exit();
}
if(isset($message)){
$txt = file_get_contents('member.txt');
$membersid= explode("\n",$txt);
if (!in_array($from_id,$membersid)){
$file2 = fopen("member.txt", "a") or die("Unable to open file!");
fwrite($file2, "$from_id\n");
fclose($file2);
}
}
if($back == "back"){
file_put_contents("settings/step.txt", "none");
file_put_contents("settings/data.txt", "none");
file_put_contents("settings/roko.txt", "none");
bot('editMessagetext',[
'chat_id'=>$chatid,
'message_id'=>$messageid,
'text' =>"
با موفقیت برگشتی (:
",
'parse_mode'=>'html',
]);
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
if($join_e != 'member'  &&  $join_e != 'creator' && $join_e != 'administrator' or $from_id != $Dev){
 bot('sendmessage',[
'chat_id'=>$from_id,
'text'=>" 
سلام خدمت شما کاربر گرامی ❤️
جهت حمایت از ما ابتدا در کانال های زیر عضو شوید 👇🏼
و سپس به ربات برگشته و [ /start ] را بزنید 🔥
➖〰️〰️〰️〰️〰️➖
Hello dear user ❤️
To support us, first subscribe to the following channels 👇🏼
And then hit [ /start ] 🔥
",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"Subscribe to the channel | عضویت در کانال",'url'=>"https://t.me/$channnnel1"]],
[['text'=>"عضویت در کانال دوم | Subscribe to the second channel",'url'=>"https://t.me/$channnnel2"]],
[['text'=>"عضو شدم",'url'=>"t.me/$usernamebot?start=_$joinok"]]
],
])
]);
}elseif($join_z != 'member'  &&  $join_z != 'creator' && $join_z != 'administrator'){
 bot('sendmessage',[
'chat_id'=>$from_id,
'text'=>" 
سلام خدمت شما کاربر گرامی ❤️
جهت حمایت از ما ابتدا در کانال های زیر عضو شوید 👇🏼
و سپس به ربات برگشته و [ /start ] را بزنید 🔥
➖〰️〰️〰️〰️〰️➖
Hello dear user ❤️
To support us, first subscribe to the following channels 👇🏼
And then hit [ /start ] 🔥
",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"Subscribe to the channel | عضویت در کانال",'url'=>"https://t.me/$channnnel1"]],
[['text'=>"عضویت در کانال دوم | Subscribe to the second channel",'url'=>"https://t.me/$channnnel2"]],
[['text'=>"عضو شدم",'url'=>"t.me/$usernamebot?start=_$joinok"]]
],
])
]);
}else{
if($text == "/start" or $text =="/start _"){
if (in_array($from_id, $config['admin']) or $from_id == $Dev){
bot('sendmessage', [
'chat_id' => $chat_id,
'text' => "
ادمین جونم خوش اومدی ❤

➖〰〰〰〰〰〰〰〰〰➖
📎 کانالایی ک الان ربات بهشون وصله :

🔐 کانالای قفل شده: 
@$channnnel1
@$channnnel2

🎥 کانال فیلما: 
@$channnnel3
",
'reply_to_message_id' => $message_id,
'parse_mode' => "html",
'reply_markup' => $menu
]);
}else{
bot('sendmessage', [
'chat_id' => $chat_id,
'text' => "
سلام عشقم🖖🏻

به ربات اپلود فایل خوش اومدی 😻

برای دیدن فیلما کافیه بری تو چنل @$channel_3 و روی دکمه دانلود کامل فیلم بزنی ✊🏿

➖〰〰〰〰〰〰〰〰➖

🎩 کانال های تلگرامی ما :
@$channnnel1
@$channnnel2
",
'reply_to_message_id' => $message_id,
'parse_mode' => "html",
'reply_markup' => $menu
]);
}
}
if($text == "راهنما ❓"){
bot('sendmessage',[
'chat_id' => $chat_id,
'text' => "
〰️〰️➖➖➖➖〰️〰️

راهنمای دانلود فیلمها⚠️:

شما برید داخل چنل ( @$channnnel3 ) پست موردنظر را پیداکنید و دکمه دانلود کامل این فیلم را بزنید و تمام به همین سادگی✅.

ساخته شده توسط : @DevOscar
〰️〰️➖➖➖➖〰️〰️
"
]);
}
/*if(preg_match('/^\/([Cc][Rr][Ee][Aa][Tt][Oo][Rr])/',$text)){
bot ('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"@DevOscar",
]);
}
*/
if(strpos($text, "/start _") !== false and $text !="/start _") {
$idfile = str_replace("/start _", null, $text);
$abc = json_decode(file_get_contents("uploader/$idfile.json"));
$method = $abc->file;
bot('send'.$abc->file, [
'chat_id' => $chat_id,
"$method" => $abc->file_id,
'caption' => "
🤖 @$usernamebot
",
'reply_to_message_id' => $message_id,
'parse_mode' => "html",
]);
bot('sendmessage', [
'chat_id' => $chat_id,
'text' => "
فایل بالا تا 15 ثانیه دیگر پاک میشود
آنرا برای پیام های ذخیره شده خود ارسال کنید
",
'parse_mode' => "html",
]);
sleep(15);
bot('deletemessage', [
'chat_id'=>$chat_id,
'message_id'=>$message_id +1,
]);
bot('deletemessage', [
'chat_id'=>$chat_id,
'message_id'=>$message_id +2,
]);
bot('sendmessage', [
'chat_id' => $chat_id,
'text' => "
حذف شد
",
'parse_mode' => "html",
]);
}
}
if (in_array($from_id, $config['admin']) or $from_id == $Dev){
if($text == "اپلود ویدیو 🎥"){
file_put_contents("settings/step.txt", 'uploadvideo');
bot('sendmessage', [
'chat_id' =>$chat_id,
'text' =>"
لطفا فیلم را بفرستید یا میتوانید آنرا فوروارد کنید 🔁
",
'reply_to_message_id' => $message_id,
'parse_mode'=>'html',
'reply_markup' => $admin_back
]);
}
elseif ($step == "uploadvideo"){
file_put_contents("settings/step.txt", 'none');
if(isset($message->video)){
$adirmon = $scan+1;
file_put_contents('settings/countuploadfile.txt', $adirmon);
$file = $bebe->file_id;
$file_id = $message->video->file_id;
$code = RandomString();
bot('sendvideo', [
'chat_id' => $chat_id,
'video' => $file_id,
'caption' => "
فایل شما با موفقیت داخل دیتابیس ذخیره شده ✅

شناسه فایل شما 📳 : <code>$code</code>

لینک اشتراک گذاری فایل ♻️ :

https://t.me/{$usernamebot}?start=_$code
",
'reply_to_message_id' => $message_id,
'parse_mode' => "html",
'reply_markup' => $menu
]);
file_put_contents("uploader/$code.json","{'code':'$code','file_id':'$file_id','file':'video'}");
$file = "uploader/$code.json";
file_put_contents($file,str_replace("'",'"',file_get_contents($file)));
}else{
bot('sendmessage', [
'chat_id' =>$chat_id,
'text' => "خطا این فایل ویدیو نیست ❌",
'reply_to_message_id' => $message_id,
'parse_mode'=>'html',
'reply_markup' => $menu
]);
}
}
if($text == "حذف فایل ❌"){
file_put_contents("settings/step.txt", 'delvideo');
bot('sendmessage', [
'chat_id' =>$chat_id,
'text' => "لطفا شناسه فایل را بفرستید 📳",
'reply_to_message_id' => $message_id,
'parse_mode'=>'html',
]);
}
elseif ($step == "delvideo"){
file_put_contents("settings/step.txt", "none");
if(file_exists("uploader/$text.json")){
unlink("uploader/$text.json");
$adirmon = $scan-1;
file_put_contents('settings/countuploadfile.txt', $adirmon);
bot('sendmessage', [
'chat_id' =>$chat_id,
'text' => "با موفقیت فایل $text حذف شد!",
'reply_to_message_id' => $message_id,
'parse_mode' => "html",
'reply_markup' => $menu
]);
}else{
bot('sendmessage', [
'chat_id' =>$chat_id,
'text' => "خطا شناسه فایل معتبر نمیباشد ❗️",
'reply_to_message_id' => $message_id,
'parse_mode' => "html",
'reply_markup' => $menu
]);
}
}
if($text == "ارسال پست به چنل 📡"){
file_put_contents("settings/step.txt", 'sendmecode');
bot('sendmessage', [
'chat_id' =>$chat_id,
'text' => "لطفا کپشن پست را بفرستید 📖",
'reply_to_message_id' => $message_id,
'parse_mode'=>'html',
]);
}
if($step == "sendmecode"){
if(isset($message->text)){
file_put_contents("settings/step.txt", 'sendpostchannel');  
file_put_contents("settings/data.txt", $text);
bot('sendmessage', [
'chat_id' =>$chat_id,
'text' => "لطفا شناسه فایل را بفرستید 📳",
'reply_to_message_id' => $message_id,
'parse_mode'=>'html',
]);
}else{
file_put_contents("settings/step.txt", 'none');
bot('sendmessage', [
'chat_id' =>$chat_id,
'text' => "خطا این متن نیست ❗️❌",
'reply_to_message_id' => $message_id,
'parse_mode'=>'html',
'reply_markup' => $menu
]);
}
}
elseif($step == "sendpostchannel"){
file_put_contents("settings/step.txt", 'sendpicch');
file_put_contents("settings/roko.txt", $text);
bot('sendmessage', [
'chat_id' =>$chat_id,
'text' => "لطفا عکس را بفرستید 🏞",
'reply_to_message_id' => $message_id,
'parse_mode'=>'html',
]);
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
elseif($step == "sendpicch"){
file_put_contents("settings/step.txt", 'none');
file_put_contents("settings/roko.txt", 'none');
file_put_contents("settings/data.txt", 'none');
if(isset($message->photo)){
$photo = $message->photo;
$file_id = $photo[count($photo)-1]->file_id;
bot('sendphoto', [
'chat_id' =>"@$channnnel3",
'photo' => $file_id,
'caption' => "
{$data}
➖〰️〰️〰️〰️➖
🆔 @$channel_1
🆔 @$usernamebot
",
'parse_mode' => "html",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'📥 دانلود کامل فیلم', 'url'=>"https://t.me/{$usernamebot}?start=_{$roko}"]],
],
'resize_keyboard'=>true,
])
]);
bot('sendmessage', [
'chat_id' =>$chat_id,
'text' => "با موفقیت ارسال شد ✅",
'reply_to_message_id' => $message_id,
'parse_mode'=>'html',
'reply_markup' => $menu
]); 
}else{
bot('sendmessage', [
'chat_id' =>$chat_id,
'text' => "خطا این عکس نیست ❗️",
'reply_to_message_id' => $message_id,
'parse_mode'=>'html',
'reply_markup' => $menu
]);  
}
}
if($text == "روشن کردن ربات 💡"){
if($power != "on"){
file_put_contents("settings/power.txt","on");
bot('sendmessage', [
'chat_id' =>$chat_id,
'text' =>"ربات با موفقیت روشن شد و کاربران میتوانند از ربات استفاده کنند 😍",
'reply_to_message_id' => $message_id,
'parse_mode'=>'html',
]);
}else{
bot('sendmessage', [
'chat_id' =>$chat_id,
'text' =>"ربات از قبل روشن بود ☹",
'reply_to_message_id' => $message_id,
'parse_mode'=>'html',
]);
}
}
if($text == "خاموش کردن ربات 📵"){
if($power != "off"){
file_put_contents("settings/power.txt", "off");
bot('sendmessage', [
'chat_id' =>$chat_id,
'text' =>"ربات با موفقیت خاموش شد و اکنون فقط ادمین ها میتوانند از ربات استفادع کنند ❗️",
'reply_to_message_id' => $message_id,
'parse_mode'=>'html',
]);
}else{
bot('sendmessage', [
'chat_id' =>$chat_id,
'text' =>"ربات از قبل خاموش بود ☹",
'reply_to_message_id' => $message_id,
'parse_mode'=>'html',
]);
}
}
if ($text == "امار 📊") {
$member_id = explode("\n",$user);
$member_count = count($member_id)-1;
bot('sendmessage', [
'chat_id' => $chat_id,
'text' => "
آمار ربات تا ب این لحظه 📊:

➖〰〰〰〰〰〰〰〰〰➖

اعضای ربات $member_count نفر 👤

تعداد $scan فایل تا اکنون آپلود شده است 🦾

➖〰〰〰〰〰〰〰〰〰➖

🆔 @$usernamebot
",
'reply_to_message_id' => $message_id,
'parse_mode' => "html",
]);
}
if($text == "باقی مانده اشتراک ❗️"){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"تا پایان اشتراک شما $day روز باقی مانده است ✅",
'parse_mode'=>'MarkDown',
'reply_markup'=>$menu
]); 
}
if($text == "پیام همگانی 🌍"){
file_put_contents("settings/step.txt", "sendall");
bot('sendmessage', [
'chat_id' =>$chat_id,
'text' =>"
لطفا پیام خود را جهت  ارسال به همه کاربران ربات ارسال کنید
در صورت تمایل ب لغو عملیات از دکمه پایین استفاده نمایید👇
",
'reply_to_message_id' => $message_id,
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'🔙', 'callback_data'=>"back"]],
],
'resize_keyboard'=>true,
])
]);
}
elseif ($step == "sendall"){
file_put_contents("settings/step.txt", "none");
$all_member = fopen( "member.txt", 'r');
while( !feof( $all_member)) {
$user = fgets( $all_member);
$id = json_decode(file_get_contents("https://api.telegram.org/bot".API_KEY."/getChat?chat_id=".$user));
$user2 = $id->result->id;
if($user2 != null){
if($text != null){
bot('sendMessage', [
'chat_id' =>$user,
'text' =>$text,
'parse_mode' =>"html",
'disable_web_page_preview' =>"true"
]);
}
if($photo_id != null){
bot('sendphoto',[
'chat_id'=>$user,
'photo'=>$photo_id,
'caption'=>$caption
]);
}
}
}
}
}
if ($from_id == $Dev){
if($text == "تنظیم کانال اول 1️⃣"){
file_put_contents("settings/step.txt", "setch1");
bot('sendmessage', [
'chat_id' =>$chat_id,
'text' =>"لطفا ایدی کانال اول را بدون @ بفرستید ❗️ 

ایدی فعلی کانال اول 📡 : $channel_1
در صورت تمایل به لغو عملیات از دکمه پایین استفاده نمایید 👇 ",
'reply_to_message_id' => $message_id,
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'🔙', 'callback_data'=>"back"]],
],
'resize_keyboard'=>true,
])
]);
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
elseif ($step == "setch1"){
file_put_contents("settings/step.txt", "none");
file_put_contents('settings/channel-1.txt', "$text");
bot('sendmessage', [
'chat_id' =>$chat_id,
'text' =>"
ایدی کانال اول با موفقیت به $text تغیر یافت ✅
",
'reply_to_message_id' => $message_id,
'parse_mode'=>'html',
]);
}
if($text == "تنظیم کانال دوم 2️⃣"){
file_put_contents("settings/step.txt", "setch2");
bot('sendmessage', [
'chat_id' =>$chat_id,
'text' =>"لطفا ایدی کانال دوم را بدون @ بفرستید ❗️

ایدی فعلی کانال دوم 📡 : $channel_2
در صورت تمایل ب لغو عملیات از دکمه پایین استفاده نمایید 👇",
'reply_to_message_id' => $message_id,
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'🔙', 'callback_data'=>"back"]],
],
'resize_keyboard'=>true,
])
]);
}
elseif ($step == "setch2"){
file_put_contents("settings/step.txt", "none");
file_put_contents('settings/channel-2.txt', "$text");
bot('sendmessage', [
'chat_id' =>$chat_id,
'text' =>"
کانال دوم با  موفقیت به $text تغیر یافت ✅
",
'reply_to_message_id' => $message_id,
'parse_mode'=>'html',

]);
}
if($text == "تنظیم کانال سوم 3⃣"){
file_put_contents("settings/step.txt", "setch3");
bot('sendmessage', [
'chat_id' =>$chat_id,
'text' =>"لطفا ایدی کانال سوم را بدون @ بفرستید ❗️

ایدی فعلی کانال سوم : $channel_3
دقت کنید ک کانال سوم همان کانال فیلمها میباشد⚠️
در صورت تمایل ب لغو عملیات از دکمه پایین استفاده نمایید 👇",
'reply_to_message_id' => $message_id,
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'🔙', 'callback_data'=>"back"]],
],
'resize_keyboard'=>true,
])
]);
}
elseif ($step == "setch3"){
file_put_contents("settings/step.txt", "none");
file_put_contents('settings/channel-3.txt', "$text");
bot('sendmessage', [
'chat_id' =>$chat_id,
'text' =>"
کانال سوم با  موفقیت به $text تغیر یافت ✅
",
'reply_to_message_id' => $message_id,
'parse_mode'=>'html',
]);
}
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی?>
