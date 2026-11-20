<?php
error_reporting(false);
$day = (2505600 - (time() - filectime('Mahdy'))) / 60 / 60 / 24;
$day = round($day, 0);
mkdir("data");
$channel = file_get_contents("channel.txt");
$channel2 = file_get_contents("channel2.txt");
$channel3 = file_get_contents("channel3.txt");
$channel4 = file_get_contents("channel4.txt");
$config = ['admin' => [[*[ADMIN]*]],'channel' => "$channel",'channel2' => "$channel2",'channel3' => "$channel3",'channel4' => "$channel4"];
define('API_KEY','[*[TOKEN]*]');
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
$first_name = $message->from->first_name;
$last_name = $message->from->last_name;
$username = $message->from->username;
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
if(!file_exists('settings/yzi.txt')){
file_put_contents('settings/yzi.txt', 'none');
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
$step = file_get_contents("settings/step.txt");
$scan = file_get_contents("settings/countuploadfile.txt");
$data = file_get_contents("settings/data.txt");
$yzi = file_get_contents("settings/yzi.txt");
$typerse  = file_get_contents("data/type.txt");
$user = file_get_contents("member.txt");
$power = file_get_contents("settings/power.txt");
$join_r = json_decode(file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=@{$config['channel']}&user_id=$from_id"));
$join_e = $join_r->result->status;
$join_b = json_decode(file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=@{$config['channel2']}&user_id=$from_id"));
$join_m = $join_b->result->status;
$join_c = json_decode(file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=@{$config['channel3']}&user_id=$from_id"));
$join_t = $join_c->result->status;
$join_i = json_decode(file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=@{$config['channel4']}&user_id=$from_id"));
$join_n = $join_i->result->status;
$usernamebot = json_decode(file_get_contents('https://api.telegram.org/bot'.API_KEY.'/getMe'))->result->username;
$menu_remove = json_encode(['KeyboardRemove'=>[
],'remove_keyboard'=>true]);
if (in_array($from_id, $config['admin'])) {
$menu = json_encode(['keyboard'=>[
[['text' => "فیلم 🎬"],['text' => "فایل 🗄"]],
[['text' => "استیکر 💫"],['text' => "صوت 🔉"]],
[['text' => "عکس 🌇"]],
[['text' => "🗑️"]],
[['text' => "ارسال در کانال 📤"]],
[['text' => "آمار ربات 🙍🏻‍♂️"]],
[['text' => "خاموش کردن ❌"],['text' => "روشن کردن ✅"]],
[['text' => "پیام همگانی 📮"],['text' => "بخش چنل ها 🔗"]],
[['text' => "باقی مانده اشتراک ❗️"]],
], 'resize_keyboard' => true
]);
$channelset = json_encode(['keyboard'=>[
[['text' => "جوین اجباری [2]"],['text' => "جوین اجباری [1]"]],
[['text' => "جوین اجباری [4]"],['text' =>"جوین اجباری [3]" ]],
[['text' => "بخش حذف 🗑"]],
[['text' => "🔙 بازگشت"]],
],
]);
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
$delchannel = json_encode(['keyboard'=>[
[['text' => "حذف چنل [2]"],['text' => "حذف چنل [1]"]],
[['text' => "حذف چنل [4]"],['text' => "حذف چنل [3]"]],
[['text' => "🔙 بازگشت"]]
],
]);
$admin_back = json_encode(['keyboard'=>[
[['text' => "🔙 بازگشت"]],
], 'resize_keyboard' => true
]);
$amar = json_encode(['keyboard'=>[
[['text' => "فایل های آپلود شده 🗄"]],
[['text' => "🔙 بازگشت"]],
], 'resize_keyboard' => true
]);
$amar2 = json_encode(['keyboard'=>[
[['text' => "آمار ربات 🙍🏻‍♂️"]],
[['text' => "🔙 بازگشت"]],
], 'resize_keyboard' => true
]);
}else{
$menu = json_encode([
'KeyboardRemove' => [],
'remove_keyboard' => true
]);
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
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
if($power == "off" && !in_array($from_id,$config['admin'])){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
در حال حاضر ربات خاموش می‌باشد.
",
'parse_mode'=>'html',
'reply_markup'=>$menu_remove
]);
exit();
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
if(isset($message)){
$txt = file_get_contents('member.txt');
$membersid= explode("\n",$txt);
if (!in_array($from_id,$membersid)){
$file2 = fopen("member.txt", "a") or die("Unable to open file!");
fwrite($file2, "$from_id\n");
fclose($file2);
}
}
if($text == "🔙 بازگشت"){
file_put_contents("settings/step.txt", "none");
file_put_contents("settings/data.txt", "none");
file_put_contents("settings/yzi.txt", "none");
bot('sendmessage', [
'chat_id' =>$chat_id,
'text' =>"
🙂🥀
",
'reply_to_message_id' => $message_id,
'parse_mode'=>'html',
'reply_markup' => $menu
]);
}
if(preg_match('/^\/([Cc][Rr][Ee][Aa][Tt][Oo][Rr])/',$text)){
bot ('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"@MiaCreateBot",
]);
}
if(file_exists("channel.txt") and file_exists("channel2.txt") and file_exists("channel3.txt") and file_exists("channel4.txt")){
if($join_e != 'member'  &&  $join_e != 'creator' && $join_e != 'administrator' or $join_m != 'member'  &&  $join_m != 'creator' && $join_m != 'administrator' or $join_t != 'member'  &&  $join_t != 'creator' && $join_t != 'administrator' or $join_n != 'member'  &&  $join_n != 'creator' && $join_n != 'administrator'){
 bot('sendmessage',[
'chat_id'=>$from_id,
'text'=>" 
خوش آمدید $first_name عزیز 💚
برای استفاده ربات ابتدا در کانال های زیر عضو شوید
",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"▫️ عضویت در کانال ▫️",'url'=>"t.me/{$config['channel']}"]],
[['text'=>"▫️ عضویت در کانال ▫️",'url'=>"t.me/{$config['channel2']}"]],
[['text'=>"▫️ عضویت در کانال ▫️",'url'=>"t.me/{$config['channel3']}"]],
[['text'=>"▫️ عضویت در کانال ▫️",'url'=>"t.me/{$config['channel4']}"]],
[['text'=>"عضو شدم",'url'=>"t.me/$usernamebot?start=_$joinok"]],
],
])
]);
exit();
}}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
if(file_exists("channel.txt") and file_exists("channel2.txt") and file_exists("channel3.txt") and !file_exists("channel4.txt")){
if($join_e != 'member'  &&  $join_e != 'creator' && $join_e != 'administrator' or $join_m != 'member'  &&  $join_m != 'creator' && $join_m != 'administrator' or $join_t != 'member'  &&  $join_t != 'creator' && $join_t != 'administrator'){
 bot('sendmessage',[
'chat_id'=>$from_id,
'text'=>" 
خوش آمدید $first_name عزیز 💚
برای استفاده ربات ابتدا در کانال های زیر عضو شوید
",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"▫️ عضویت در کانال ▫️",'url'=>"t.me/{$config['channel']}"]],
[['text'=>"▫️ عضویت در کانال ▫️",'url'=>"t.me/{$config['channel2']}"]],
[['text'=>"▫️ عضویت در کانال ▫️",'url'=>"t.me/{$config['channel3']}"]],
[['text'=>"عضو شدم",'url'=>"t.me/$usernamebot?start=_$joinok"]],
],
])
]);
exit();
}}
if(file_exists("channel.txt") and file_exists("channel2.txt") and !file_exists("channel3.txt") and !file_exists("channel4.txt")){
if($join_e != 'member'  &&  $join_e != 'creator' && $join_e != 'administrator' or $join_m != 'member'  &&  $join_m != 'creator' && $join_m != 'administrator'){
 bot('sendmessage',[
'chat_id'=>$from_id,
'text'=>" 
خوش آمدید $first_name عزیز 💚
برای استفاده ربات ابتدا در کانال های زیر عضو شوید
",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"▫️ عضویت در کانال ▫️",'url'=>"t.me/{$config['channel']}"]],
[['text'=>"▫️ عضویت در کانال ▫️",'url'=>"t.me/{$config['channel2']}"]],
[['text'=>"عضو شدم",'url'=>"t.me/$usernamebot?start=_$joinok"]],
],
])
]);
exit();
}}
if(file_exists("channel.txt") and !file_exists("channel2.txt") and !file_exists("channel3.txt") and !file_exists("channel4.txt")){
if($join_e != 'member'  &&  $join_e != 'creator' && $join_e != 'administrator'){
 bot('sendmessage',[
'chat_id'=>$from_id,
'text'=>" 
خوش آمدید $first_name عزیز 💚
برای استفاده ربات ابتدا در کانال های زیر عضو شوید
",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"▫️ عضویت در کانال ▫️",'url'=>"t.me/{$config['channel']}"]],
[['text'=>"عضو شدم",'url'=>"t.me/$usernamebot?start=_$joinok"]],
],
])
]);
exit();
}}
if($text == "/start" or $text =="/start _"){
mkdir("data/$from_id");
if (in_array($from_id, $config['admin'])){
bot('sendmessage', [
'chat_id' => $chat_id,
'text' => "
شما ادمین شناسایی شدید !
خوش آمدید 💚
",
'reply_to_message_id' => $message_id,
'parse_mode' => "html",
'reply_markup' => $menu
]);
bot('sendmessage', [
'chat_id' => $chat_id,
'text' => "
- Fname: $first_name\n- Username: @$username\n- User id: <code>$from_id</code>
",
'parse_mode' => "html",
'reply_markup' => $menu
]);
}else{
bot('sendmessage', [
'chat_id' => $chat_id,
'text' => "
خوش آمدید $first_name عزیز 💚
",
'reply_to_message_id' => $message_id,
'parse_mode' => "html",
'reply_markup' => $menu
]);
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
}
if(strpos($text, "/start _") !== false and $text !="/start _") {
mkdir("data/$from_id");
$idfile = str_replace("/start _", null, $text);
$abc = json_decode(file_get_contents("uploader/$idfile.json"));
$method = $abc->file;
bot('send'.$abc->file, [
'chat_id' => $chat_id,
"$method" => $abc->file_id,
'caption' => "
🆔 @{$config['channel']}
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
if (in_array($from_id, $config['admin'])){
if($text == "فیلم 🎬"){
file_put_contents("settings/step.txt", 'uploadvideo');
bot('sendmessage', [
'chat_id' =>$chat_id,
'text' =>"
لطفا فیلم را بفرستید
",
'reply_to_message_id' => $message_id,
'parse_mode'=>'html',
'reply_markup' => $admin_back
]);
}
elseif ($step == "uploadvideo" && $text != "🔙 بازگشت" && $text != "/start"){
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
فایل فایل شما با موفقیت در دیتابیس ذخیره شد ! 💚
📮شناسه: <code>$code</code>
🔗لینک:
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
'text' => "خطا این فایل ویدیو نیست !",
'reply_to_message_id' => $message_id,
'parse_mode'=>'html',
'reply_markup' => $menu
]);
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
}
if($text == "فایل 🗄"){
file_put_contents("settings/step.txt", 'uploadfile');
bot('sendmessage', [
'chat_id' =>$chat_id,
'text' =>"
لطفا فایل را بفرستید
",
'reply_to_message_id' => $message_id,
'parse_mode'=>'html',
'reply_markup' => $admin_back
]);
}
elseif ($step == "uploadfile" && $text != "🔙 بازگشت" && $text != "/start"){
file_put_contents("settings/step.txt", 'none');
if(isset($message->document)){
$adirmon = $scan+1;
file_put_contents('settings/countuploadfile.txt', $adirmon);
$file = $bebe->file_id;
$file_id = $message->document->file_id;
$code = RandomString();
bot('senddocument', [
'chat_id' => $chat_id,
'document' => $file_id,
'caption' => "
فایل فایل شما با موفقیت در دیتابیس ذخیره شد ! 💚
📮شناسه: <code>$code</code>
🔗لینک:
https://t.me/{$usernamebot}?start=_$code
",
'reply_to_message_id' => $message_id,
'parse_mode' => "html",
'reply_markup' => $menu
]);
file_put_contents("uploader/$code.json","{'code':'$code','file_id':'$file_id','file':'document'}");
$file = "uploader/$code.json";
file_put_contents($file,str_replace("'",'"',file_get_contents($file)));
}else{
bot('sendmessage', [
'chat_id' =>$chat_id,
'text' => "خطا این فایل نیست !",
'reply_to_message_id' => $message_id,
'parse_mode'=>'html',
'reply_markup' => $menu
]);
}
}
if($text == "عکس 🌇"){
file_put_contents("settings/step.txt", 'uploadphoto');
bot('sendmessage', [
'chat_id' =>$chat_id,
'text' =>"
لطفا عکس را بفرستید
",
'reply_to_message_id' => $message_id,
'parse_mode'=>'html',
'reply_markup' => $admin_back
]);
}
elseif ($step == "uploadphoto" && $text != "🔙 بازگشت" && $text != "/start"){
file_put_contents("settings/step.txt", 'none');
if(isset($message->photo)){
$adirmon = $scan+1;
file_put_contents('settings/countuploadfile.txt', $adirmon);
$photo = $message->photo;
$file_id = $photo[count($photo)-1]->file_id;
$code = RandomString();
bot('sendphoto', [
'chat_id' => $chat_id,
'photo' => $file_id,
'caption' => "
فایل فایل شما با موفقیت در دیتابیس ذخیره شد ! 💚
📮شناسه: <code>$code</code>
🔗لینک:
https://t.me/{$usernamebot}?start=_$code
",
'reply_to_message_id' => $message_id,
'parse_mode' => "html",
'reply_markup' => $menu
]);
file_put_contents("uploader/$code.json","{'code':'$code','file_id':'$file_id','file':'photo'}");
$file = "uploader/$code.json";
file_put_contents($file,str_replace("'",'"',file_get_contents($file)));
}else{
bot('sendmessage', [
'chat_id' =>$chat_id,
'text' => "خطا این عکس نیست !",
'reply_to_message_id' => $message_id,
'parse_mode'=>'html',
'reply_markup' => $menu
]);
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
}
if($text == "استیکر 💫"){
file_put_contents("settings/step.txt", 'uploadsticker');
bot('sendmessage', [
'chat_id' =>$chat_id,
'text' =>"
لطفا استیکر را بفرستید
",
'reply_to_message_id' => $message_id,
'parse_mode'=>'html',
'reply_markup' => $admin_back
]);
}
elseif ($step == "uploadsticker" && $text != "🔙 بازگشت" && $text != "/start"){
file_put_contents("settings/step.txt", 'none');
if(isset($message->sticker)){
$adirmon = $scan+1;
file_put_contents('settings/countuploadfile.txt', $adirmon);
$file = $bebe->file_id;
$file_id = $message->sticker->file_id;
$code = RandomString();
bot('sendsticker', [
'chat_id' => $chat_id,
'sticker' => $file_id,
'reply_to_message_id' => $message_id,
'parse_mode' => "html",
'reply_markup' => $menu
]);
bot('sendmessage',[
'chat_id' => $chat_id,
'text' => "
فایل فایل شما با موفقیت در دیتابیس ذخیره شد ! 💚
📮شناسه: <code>$code</code>
🔗لینک:
https://t.me/{$usernamebot}?start=_$code
",
'parse_mode' => "html"
]);
file_put_contents("uploader/$code.json","{'code':'$code','file_id':'$file_id','file':'sticker'}");
$file = "uploader/$code.json";
file_put_contents($file,str_replace("'",'"',file_get_contents($file)));
}else{
bot('sendmessage', [
'chat_id' =>$chat_id,
'text' => "خطا این فایل استیکر نیست !",
'reply_to_message_id' => $message_id,
'parse_mode'=>'html',
'reply_markup' => $menu
]);
}
}
if($text == "صوت 🔉"){
file_put_contents("settings/step.txt", 'uploadaudio');
bot('sendmessage', [
'chat_id' =>$chat_id,
'text' =>"
لطفا فایل صوتی را بفرستید
",
'reply_to_message_id' => $message_id,
'parse_mode'=>'html',
'reply_markup' => $admin_back
]);
}
elseif ($step == "uploadaudio" && $text != "🔙 بازگشت" && $text != "/start"){
file_put_contents("settings/step.txt", 'none');
if(isset($message->audio)){
$adirmon = $scan+1;
file_put_contents('settings/countuploadfile.txt', $adirmon);
$file = $bebe->file_id;
$file_id = $message->audio->file_id;
$code = RandomString();
bot('sendaudio', [
'chat_id' => $chat_id,
'audio' => $file_id,
'caption' => "
فایل فایل شما با موفقیت در دیتابیس ذخیره شد ! 💚
📮شناسه: <code>$code</code>
🔗لینک:
https://t.me/{$usernamebot}?start=_$code
",
'reply_to_message_id' => $message_id,
'parse_mode' => "html",
'reply_markup' => $menu
]);
file_put_contents("uploader/$code.json","{'code':'$code','file_id':'$file_id','file':'audio'}");
$file = "uploader/$code.json";
file_put_contents($file,str_replace("'",'"',file_get_contents($file)));
}else{
bot('sendmessage', [
'chat_id' =>$chat_id,
'text' => "خطا این فایل صوتی نیست !",
'reply_to_message_id' => $message_id,
'parse_mode'=>'html',
'reply_markup' => $menu
]);
}
}
if($text == "🗑️"){
file_put_contents("settings/step.txt", 'delvideo');
bot('sendmessage', [
'chat_id' =>$chat_id,
'text' => "لطفا شناسه فایل را بفرستید",
'reply_to_message_id' => $message_id,
'parse_mode'=>'html',
'reply_markup' => $admin_back
]);
}
if($text == "باقی مانده اشتراک ❗️"){
bot('sendmessage', [
'chat_id' =>$chat_id,
'text' => "تا پایان اشتراک شما $day روز باقی مانده است ✅",
'reply_to_message_id' => $message_id,
'parse_mode'=>'html',
'reply_markup' => $menu
]);
}
elseif ($step == "delvideo" && $text != "🔙 بازگشت" && $text != "/start"){
file_put_contents("settings/step.txt", "none");
if(file_exists("uploader/$text.json")){
unlink("uploader/$text.json");
$adirmon = $scan-1;
file_put_contents('settings/countuploadfile.txt', $adirmon);
bot('sendmessage', [
'chat_id' =>$chat_id,
'text' => "با موفقیت فایل $text حذف شد !",
'reply_to_message_id' => $message_id,
'parse_mode' => "html",
'reply_markup' => $menu
]);
}else{
bot('sendmessage', [
'chat_id' =>$chat_id,
'text' => "خطا شناسه فایل معتبر نمیباشد !",
'reply_to_message_id' => $message_id,
'parse_mode' => "html",
'reply_markup' => $menu
]);
}
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
if($text == "بخش چنل ها 🔗"){
bot('sendmessage',[
'chat_id' => $chat_id,
'text' => "انتخاب کنید ! 🙂🥀",
'reply_to_message_id' => $message_id,
'parse_mode' => "html",
'reply_markup' => $channelset]);
}

if($text == "بخش حذف 🗑"){
bot('sendmessage',[
'chat_id' => $chat_id,
'text' => "انتخاب کنید ! 🙂🥀",
'reply_to_message_id' => $message_id,
'parse_mode' => "html",
'reply_markup' => $delchannel]);
}
if($text == "جوین اجباری [1]"){
file_put_contents("settings/step.txt", 'setchannel1');
bot('sendmessage', [
'chat_id' =>$chat_id,
'text' => "لطفا ای دی کانال بدون @ ارسال کنید",
'reply_to_message_id' => $message_id,
'parse_mode'=>'html',
'reply_markup' => $admin_back
]);
}
elseif ($step == "setchannel1" && $text != "🔙 بازگشت" && $text != "/start"){
file_put_contents("settings/step.txt", 'none');
file_put_contents("channel.txt", "$text");
bot('sendmessage', [
'chat_id' =>$chat_id,
'text' => "کانال @$text تنظیم شد",
'reply_to_message_id' => $message_id,
'parse_mode'=>'html',
'reply_markup' => $menu
]);
}
if($text == "جوین اجباری [2]"){
file_put_contents("settings/step.txt", 'setchannel2');
bot('sendmessage', [
'chat_id' =>$chat_id,
'text' => "لطفا ای دی کانال بدون @ ارسال کنید",
'reply_to_message_id' => $message_id,
'parse_mode'=>'html',
'reply_markup' => $admin_back
]);
}
elseif ($step == "setchannel2" && $text != "🔙 بازگشت" && $text != "/start"){
file_put_contents("settings/step.txt", 'none');
file_put_contents("channel2.txt", "$text");
bot('sendmessage', [
'chat_id' =>$chat_id,
'text' => "کانال @$text تنظیم شد",
'reply_to_message_id' => $message_id,
'parse_mode'=>'html',
'reply_markup' => $menu
]);
}
if($text == "جوین اجباری [3]"){
file_put_contents("settings/step.txt", 'setchannel3');
bot('sendmessage', [
'chat_id' =>$chat_id,
'text' => "لطفا ای دی کانال بدون @ ارسال کنید",
'reply_to_message_id' => $message_id,
'parse_mode'=>'html',
'reply_markup' => $admin_back
]);
}
elseif ($step == "setchannel3" && $text != "🔙 بازگشت" && $text != "/start"){
file_put_contents("settings/step.txt", 'none');
file_put_contents("channel3.txt", "$text");
bot('sendmessage', [
'chat_id' =>$chat_id,
'text' => "کانال @$text تنظیم شد",
'reply_to_message_id' => $message_id,
'parse_mode'=>'html',
'reply_markup' => $menu
]);
}
if($text == "جوین اجباری [4]"){
file_put_contents("settings/step.txt", 'setchannel4');
bot('sendmessage', [
'chat_id' =>$chat_id,
'text' => "لطفا ای دی کانال بدون @ ارسال کنید",
'reply_to_message_id' => $message_id,
'parse_mode'=>'html',
'reply_markup' => $admin_back
]);
}
elseif ($step == "setchannel4" && $text != "🔙 بازگشت" && $text != "/start"){
file_put_contents("settings/step.txt", 'none');
file_put_contents("channel4.txt", "$text");
bot('sendmessage', [
'chat_id' =>$chat_id,
'text' => "کانال @$text تنظیم شد",
'reply_to_message_id' => $message_id,
'parse_mode'=>'html',
'reply_markup' => $menu
]);
}
if($text == "حذف چنل [1]"){
file_put_contents("settings/step.txt", 'delchannel1');
bot('sendmessage',[
'chat_id' => $chat_id,
'text' => "اگه اطمینان داری بنویس( آره ) و ارسال کن !",
'reply_to_message_id' => $message_id,
'parse_mode' => "html",
'reply_markup' => $admin_back]);
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
elseif($step == "delchannel1" and $text == "آره" and file_exists("channel.txt")){
unlink("channel.txt");
bot('sendmessage',[
'chat_id' => $chat_id,
'text' => "با موفقیت حذف شد !",
'reply_to_message_id' => $message_id,
'parse_mode' => "html",
'reply_markup' => $menu]);
}
if($text == "حذف چنل [2]"){
file_put_contents("settings/step.txt", 'delchannel2');
bot('sendmessage',[
'chat_id' => $chat_id,
'text' => "اگه اطمینان داری بنویس( آره ) و ارسال کن !",
'reply_to_message_id' => $message_id,
'parse_mode' => "html",
'reply_markup' => $admin_back]);
}
elseif($step == "delchannel2" and $text == "آره" and file_exists("channel2.txt")){
unlink("channel2.txt");
bot('sendmessage',[
'chat_id' => $chat_id,
'text' => "با موفقیت حذف شد !",
'reply_to_message_id' => $message_id,
'parse_mode' => "html",
'reply_markup' => $menu]);
}
if($text == "حذف چنل [3]"){
file_put_contents("settings/step.txt", 'delchannel3');
bot('sendmessage',[
'chat_id' => $chat_id,
'text' => "اگه اطمینان داری بنویس( آره ) و ارسال کن !",
'reply_to_message_id' => $message_id,
'parse_mode' => "html",
'reply_markup' => $admin_back]);
}
elseif($step == "delchannel3" and $text == "آره" and file_exists("channel3.txt")){
unlink("channel3.txt");
bot('sendmessage',[
'chat_id' => $chat_id,
'text' => "با موفقیت حذف شد !",
'reply_to_message_id' => $message_id,
'parse_mode' => "html",
'reply_markup' => $menu]);
}
if($text == "حذف چنل [4]"){
file_put_contents("settings/step.txt", 'delchannel4');
bot('sendmessage',[
'chat_id' => $chat_id,
'text' => "اگه اطمینان داری بنویس( آره ) و ارسال کن !",
'reply_to_message_id' => $message_id,
'parse_mode' => "html",
'reply_markup' => $admin_back]);
}
elseif($step == "delchannel4" and $text == "آره" and file_exists("channel4.txt")){
unlink("channel4.txt");
bot('sendmessage',[
'chat_id' => $chat_id,
'text' => "با موفقیت حذف شد !",
'reply_to_message_id' => $message_id,
'parse_mode' => "html",
'reply_markup' => $menu]);
}
if($text == "ارسال در کانال 📤"){
file_put_contents("settings/step.txt", 'sendmecode');
bot('sendmessage', [
'chat_id' =>$chat_id,
'text' => "لطفا کپشن پست را بفرستید",
'reply_to_message_id' => $message_id,
'parse_mode'=>'html',
'reply_markup' => $admin_back
]);
}
if($step == "sendmecode" && $text != "🔙 بازگشت" && $text != "/start"){
if(isset($message->text)){
file_put_contents("settings/step.txt", 'sendpostchannel');  
file_put_contents("settings/data.txt", $text);
bot('sendmessage', [
'chat_id' =>$chat_id,
'text' => "لطفا کد پست را بفرستید",
'reply_to_message_id' => $message_id,
'parse_mode'=>'html',
]);
}else{
file_put_contents("settings/step.txt", 'none');
bot('sendmessage', [
'chat_id' =>$chat_id,
'text' => "خطا این متن نیست !",
'reply_to_message_id' => $message_id,
'parse_mode'=>'html',
'reply_markup' => $menu
]);
}
}
elseif($step == "sendpostchannel"){
file_put_contents("settings/step.txt", 'sendpicch');
file_put_contents("settings/yzi.txt", $text);
bot('sendmessage', [
'chat_id' =>$chat_id,
'text' => "لطفا عکس را بفرستید",
'reply_to_message_id' => $message_id,
'parse_mode'=>'html',
]);
}
elseif($step == "sendpicch"){
file_put_contents("settings/step.txt", 'none');
file_put_contents("settings/yzi.txt", 'none');
file_put_contents("settings/data.txt", 'none');
if(isset($message->photo)){
$photo = $message->photo;
$file_id = $photo[count($photo)-1]->file_id;
bot('sendphoto', [
'chat_id' =>"@".$config['channel'],
'photo' => $file_id,
'caption' => "
$data
---------
برای دریافت فایل روی دکمه زیر کلیک کنید !
",
'parse_mode' => "html",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'DownLoad Full 💦', 'url'=>"https://t.me/{$usernamebot}?start=_{$yzi}"]],
],
'resize_keyboard'=>true,
])
]);
bot('sendmessage', [
'chat_id' =>$chat_id,
'text' => "ارسال شد !",
'reply_to_message_id' => $message_id,
'parse_mode'=>'html',
'reply_markup' => $menu
]); 
}else{
bot('sendmessage', [
'chat_id' =>$chat_id,
'text' => "خطا این عکس نیست !",
'reply_to_message_id' => $message_id,
'parse_mode'=>'html',
'reply_markup' => $menu
]);  
}
}
if($text == "روشن کردن ✅"){
if($power != "on"){
file_put_contents("settings/power.txt","on");
bot('sendmessage', [
'chat_id' =>$chat_id,
'text' =>"ربات روشن شد ! ✅",
'reply_to_message_id' => $message_id,
'parse_mode'=>'html',
]);
}else{
bot('sendmessage', [
'chat_id' =>$chat_id,
'text' =>"ربات از قبل روشن بود ! ✅",
'reply_to_message_id' => $message_id,
'parse_mode'=>'html',
]);
}
}
if($text == "خاموش کردن ❌"){
if($power != "off"){
file_put_contents("settings/power.txt", "off");
bot('sendmessage', [
'chat_id' =>$chat_id,
'text' =>"ربات خاموش شد ! ❌",
'reply_to_message_id' => $message_id,
'parse_mode'=>'html',
]);
}else{
bot('sendmessage', [
'chat_id' =>$chat_id,
'text' =>"ربات از قبل خاموش بود ! ❌",
'reply_to_message_id' => $message_id,
'parse_mode'=>'html',
]);
}
}
if ($text == "آمار ربات 🙍🏻‍♂️") {
$member_id = explode("\n",$user);
$member_count = count($member_id)-1;
bot('sendmessage', [
'chat_id' => $chat_id,
'text' => "
🙍🏻‍♂️ آمار کاربران ربات: $member_count
",
'reply_to_message_id' => $message_id,
'parse_mode' => "html",
'reply_markup' => $amar
]);
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
if($text == "فایل های آپلود شده 🗄"){
bot('sendmessage',[
'chat_id' => $chat_id,
'text' => "
🗂️ آمار فایل های آپلود شده: $scan",
'reply_to_message_id' => $message_id,
'parse_mode' => "html",
'reply_markup' => $amar2]);
}
if($text == "پیام همگانی 📮"){
file_put_contents("settings/step.txt", "sendall");
bot('sendmessage', [
'chat_id' =>$chat_id,
'text' =>"
لطفا پیام خود را ارسال کنید:
",
'reply_to_message_id' => $message_id,
'parse_mode'=>'html',
'reply_markup' => $admin_back
]);
}
elseif ($step == "sendall" && $text != "🔙 بازگشت" &&$text != "/start"){
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
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی?>