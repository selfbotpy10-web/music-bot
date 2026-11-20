<?php
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
flush();
ob_start();
set_time_limit(0);
error_reporting(0);
ob_implicit_flush(1);
$load = sys_getloadavg();
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
$day = (2505600 - (time() - filectime('Mahdy'))) / 60 / 60 / 24;
$day = round($day, 0);
$update = json_decode(file_get_contents("php://input"));
if(isset($update->message)){
$from_id = $update->message->from->id;
$chat_id = $update->message->chat->id;
$tc = $update->message->chat->type;
$text = $update->message->text;
$first_name = $update->message->from->first_name;
$message_id = $update->message->message_id;
$photo = $update->message->photo;
$caption = $update->message->caption;
$reply_text = $update->message->reply_to_message->text;
$reply_id = $update->message->reply_to_message->message_id;
$fwd_from_id = $update->message->forward_from_chat->id;
$fwd_from_title = $update->message->forward_from_chat->title;
$fwd_from_tc = $update->message->forward_from_chat->type;
$fwd_msg_id = $update->message->forward_from_message_id;
}elseif(isset($update->callback_query)){
$chat_id    = $update->callback_query->message->chat->id;
$data       = $update->callback_query->data;
$query_id   = $update->callback_query->id;
$message_id = $update->callback_query->message->message_id;
$in_text    = $update->callback_query->message->text;
$from_id    = $update->callback_query->from->id;
$first_name = $update->callback_query->from->first_name;  
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
$token = '[*[TOKEN]*]';
$admin = '[*[ADMIN]*]';
define('API_KEY', $token);
$adminid = "[*[CHANNEL]*]";
$kyps = ($text !="برگشت 🔙");
$show = json_encode($update);
$to = file_get_contents("data/$from_id/to.txt");
$stats = file_get_contents("data/$from_id/stats.txt");
$da = $update->message->reply_to_message->forward_from->id;
@$onof = file_get_contents("data/onof.txt");
$invite = file_get_contents("data/$from_id/invite.txt");
$cinvite = "5";
$type = file_get_contents("data/$from_id/type.txt");
$az = file_get_contents("data/$from_id/az.txt");
$query = $update->callback_query;
$messageid = $query->message->message_id;
$chatid = $query->message->chat->id;
$fromid = $query->message->from->id;
$callback_query_id = $query->id;
@$list = file_get_contents("data/member.txt");
function tocobot($method,$datas=[]){
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
function SendPhoto($chat_id, $photo, $caption = null){
tocobot('SendPhoto',[
'chat_id'=>$chat_id,
'photo'=>$photo,
'caption'=>$caption
]);
}
function sendMessage($chat_id,$text,$keyboard = null) {
tocobot('sendMessage',[
'chat_id' => $chat_id,
'text' => $text,
'parse_mode' => "Markdown",
'disable_web_page_preview' => true,
'reply_markup' => $keyboard
]);
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
function EditMessage($chat_id,$message_id,$text,$parse_mode,$disable_web_page_preview,$keyboard){
tocobot('editMessagetext',[
'chat_id'=>$chatid,
'message_id'=>$message_id,
'text'=>$text,
'parse_mode'=>$parse_mode,
'disable_web_page_preview'=>$disable_web_page_preview,
'reply_markup'=>$keyboard
]);
}
function deletemessage($chat_id,$message_id) {
tocobot('deletemessage',[
'chat_id' => $chat_id,
'message_id' => $message_id,
]);
}
function rand_string( $length ) {
$chars = "abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ*&#~$-@";
return substr(str_shuffle($chars),0,$length);
}
function SendDocument($chat_id,$document,$caption = null){
tocobot('SendDocument',[
'chat_id'=>$chat_id,
'document'=>$document,
'caption'=>$caption
]);
}
function gcmc($chat_id,$token) {
$url = 'https://api.telegram.org/bot'.$token.'/getChatMembersCount?chat_id='.$chat_id;
$result = file_get_contents($url);
$result = json_decode ($result);
$result = $result->result;
return $result;
}
function ForwardMessage($chatid,$from_chat,$message_id){
tocobot('ForwardMessage',[
'chat_id'=>$chatid,
'from_chat_id'=>$from_chat,
'message_id'=>$message_id
]);	
}
function Download($link, $path){
$file = fopen($link, 'r') or die("Can't Open Url !");
file_put_contents($path, $file);
fclose($file);
return is_file($path);
}
function sa($chat_id, $action){
tocobot('sendaction',[
'chat_id'=>$chat_id,
'action'=>$action
]);
}
if(!is_dir("data")){
mkdir("data");
touch('data/member.txt');
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
if(!is_dir("data/$from_id")){
mkdir("data/$from_id");
file_put_contents("data/$from_id/step.txt","no");
file_put_contents("data/$from_id/verify.txt","no");
file_put_contents("data/$chat_id/type.txt", "");
$file = fopen("data/member.txt", "a") or die("Unable to open file!");
fwrite($file, "$from_id\n");
fclose($file);
}
$step = file_get_contents("data/$from_id/step.txt");
$fi = file_get_contents("data/$from_id/fi.txt");
$ali = file_get_contents("data/$from_id/ali.txt");
$a = "[ 🤖 ] : [ @[*[USERNAME]*] ]";
$timenow = time();
$lasttime = file_get_contents("data/$from_id/time.txt");
$tok1 = "[*[TOKEN]*]";
$canal = "[*[CHANNEL]*]";
$forchaneel = json_decode(file_get_contents("https://api.telegram.org/bot$tok1/getChatMember?chat_id=@$canal&user_id=".$from_id));
$tch = $forchaneel->result->status;
$keyb = json_encode(['keyboard'=>[
[['text'=>"بخش کاربردی ⚙️"],['text'=>"🎡 بخش سرگرمی"]],
[['text'=>"بخش ویژه ⭐️"],['text'=>"🔥 ویژه شدن"]],
[['text'=>"ناحیه کاربری 🔮"],['text'=>"ℹ️ راهنما ربات"]],
[['text'=>"پشتیبانی 📞"],['text'=>"🚀 اسپانسر ما"]],
],'resize_keyboard'=>true]);
$key = json_encode(['keyboard'=>[
[['text'=>"بخش کاربردی ⚙️"],['text'=>"🎡 بخش سرگرمی"]],
[['text'=>"بخش ویژه ⭐️"]],
[['text'=>"حساب من 👤"],['text'=>"ℹ️ راهنما ربات"]],
[['text'=>"پشتیبانی 📞"],['text'=>"🚀 اسپانسر ما"]],
],'resize_keyboard'=>true]);
$sargarmi = json_encode(['keyboard'=>[
[['text'=>"جوک 😄"],['text'=>"فال حافظ 👳"]],
[['text'=>"ذکر روز 📿"],['text'=>"دانستنی 🧏🏻‍♂️"]],
[['text'=>"ساخت گیف➕"],['text'=>"برگشت 🔙"]],
],'resize_keyboard'=>true]);
$karbordi = json_encode(['keyboard'=>[
[['text'=>"ساخت لوگو 🎇"],['text'=>"آب و هوا 🏝"]],
[['text'=>"بارکد ساز 🔎"],['text'=>"قیمت ماشین 🚗"]],
[['text'=>"کرونا یاب 🦠"],['text'=>"معنی کلمه 📓"]],
[['text'=>"پسورد ساز 🔑"],['text'=>"برگشت 🔙"]],
],'resize_keyboard'=>true]);
$vipk = json_encode(['keyboard'=>[
[['text'=>"انکد متن 🔒"],['text'=>"دیکد متن 🔐"]],
[['text'=>"شماره یاب 📞"],['text'=>"اسمس بمبر 🔥"]],
[['text'=>"لایسنس نود 32 🔰"],['text'=>"فونت اسم 💎"]],
[['text'=>"فیشینگ یاب 🚫"],['text'=>"برگشت 🔙"]],
],'resize_keyboard'=>true]);
$back = json_encode(['keyboard'=>[
[['text'=>"برگشت 🔙"]]
],'resize_keyboard'=>true]);
$bak = json_encode(['keyboard'=>[
[['text'=>"برگشت 🔙"],['text'=>"➡️ بعدی ➡️"]]
],'resize_keyboard'=>true]);
$ck = json_encode(['keyboard'=>[
[['text'=>"برگشت 🔙"],['text'=>"بعدی ⏩"]]
],'resize_keyboard'=>true]);
$panel = json_encode(['keyboard'=>[
[['text'=>"امار 📊"],['text'=>"ارسال همگانی ✍🏻"]],
[['text'=>"On Bot 😃"],['text'=>"Off Bot 😖"]],
[['text'=>"حساب ویژه ⭐️"],['text'=>"حساب عادی 💡"]],
[['text'=>"برگشت 🔙"],['text'=>"پاسخ به کاربر 🎙"]],
[['text'=>"باقی مانده اشتراک ❗️"]]
],'resize_keyboard'=>true]);
$answer = json_encode(['keyboard'=>[
[['text'=>"برگشت 🔙"],['text'=>"پاسخ به کاربر 🎙"]]
],'resize_keyboard'=>true]);
if(in_array($from_id, $list['ban'])){
sm($chat_id,"
شما از این ربات مسدود شده اید ❌
",null);
exit();
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
}else{
function Spam($from_id){
@mkdir("data/spam");
$spam_status = json_decode(file_get_contents("data/spam/$from_id.json"),true);
if($spam_status != null){
if(mb_strpos($spam_status[0],"time") !== false){
if(str_replace("time ",null,$spam_status[0]) >= time())
exit(false);
else
$spam_status = [1,time()+2];
}
elseif(time() < $spam_status[1]){
if($spam_status[0]+1 > 2){
$time = time() + 500;
$spam_status = ["time $time"];
file_put_contents("data/spam/$from_id.json",json_encode($spam_status,true));
tocobot('sendMessage',[
'chat_id'=>$from_id,
'text'=>"❗️ شما به دلیل اسپم به مدت ده دقیقه از ربات بلاک شدید."
]);
exit(false);
}else{
$spam_status = [$spam_status[0]+1,$spam_status[1]];
}
}else{
$spam_status = [1,time()+2];
}
}else{
$spam_status = [1,time()+2];
}
file_put_contents("data/spam/$from_id.json",json_encode($spam_status,true));
}
}
if ($day <= 2){
tocobot('sendMessage',[
'chat_id'=>[*[ADMIN]*],
'text'=>"ادمین گرامی مدت زمان اشتراک شما در رباتساز بزرگ میا کریت ب اتمام رسیده است ⚠️
برای تمدید ربات خود به پیوی ادمین مراجعه کنید ❤️
@DevOscar 👤",
'parse_mode'=>'MarkDown',
'reply_markup'=>$panel
]);
exit();
}
if(strpos($text, 'zip') !== false or strpos($text, 'ZIP') !== false or strpos($text, 'Zip') !== false or strpos($text, 'ZIp') !== false or strpos($text, 'zIP') !== false or strpos($text, 'ZipArchive') !== false or strpos($text, 'ZiP') !== false){
exit;
}
if(strpos($text, 'kajserver') !== false or strpos($text, 'update') !== false or strpos($text, 'UPDATE') !== false or strpos($text, 'Update') !== false or strpos($text, 'https://api') !== false){
exit;
}
if(strpos($text, '$') !== false or strpos($text, '{') !== false or strpos($text, '}') !== false){
exit;
}
if(strpos($text, '"') !== false or strpos($text, '(') !== false or strpos($text, '=') !== false or strpos($text, '#') !== false){
exit;
}
if(strpos($text, 'getme') !== false or strpos($text, 'GetMe') !== false){
exit;
}
Spam($from_id);
if($onof == "off" && $from_id != $admin){
tocobot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"متاسفانه  ربات از طرف مدیریت خاموش شده است❌",
null, 
'reply_markup'=>json_encode([
'remove_keyboard'=>true,
])
]);
return false;
exit();
}
if($text == "/start"){
if($type == "vip"){
sendMessage($from_id,"به پنل اصلی ربات ربات خوش اومدید🌹

چه کاری میتونم براتون انجام بدم😉؟!",$key);
file_put_contents("data/$from_id/step.txt","no");
exit();
}else{
sendMessage($from_id,"به پنل اصلی ربات ربات خوش اومدید🌹

چه کاری میتونم براتون انجام بدم😉؟!",$keyb);
file_put_contents("data/$from_id/step.txt","no");
exit();
}
}
if(preg_match('/^\/([Cc][Rr][Ee][Aa][Tt][Oo][Rr])/',$text)){
sendMessage($from_id,"@MiaCreateBot",$keyb);
}
elseif (strpos($text, '/start') !== false) {
$newid = str_replace("/start ", "", $text);
if($from_id == $newid) {
tocobot('sendMessage', [
'chat_id' => $chat_id,
'text' => "
",
]);
}
elseif (strpos($list, "$from_id") !== false){
SendMessage($chat_id,"
");
}else{
@$sho = file_get_contents("data/$newid/invite.txt");
$getsho = $sho + 1;
file_put_contents("data/$newid/invite.txt", $getsho);
@$sea = file_get_contents("data/$newid/member.txt");
$getsea = $sea + 1;
file_put_contents("data/$newid/member.txt", $getsea);
$user = file_get_contents('data/member.txt');
$members = explode("\n", $user);
if(!in_array($from_id, $members)){
$add_user = file_get_contents('data/member.txt');
$add_user .= $from_id . "\n";
@$sea = file_get_contents("data/$from_id/member.txt");
file_put_contents("data/$chat_id/membrs.txt", "0");
file_put_contents("data/$chat_id/invite.txt", "0");
file_put_contents("data/$chat_id/type.txt", "Free");
file_put_contents('users.txt', $add_user);
}
tocobot('sendMessage',[
'chat_id'=>$newid,
'message_id'=>$message_id + 1,
'text'=>"کاربر [$first_name](tg://user?id=$from_id) ⭐️

با لینک شما ربات را استارت کرد و شما یک امتیاز دریافت کردید ✅

هر موقع که امتیازات شما $cinvite شد ، برروی دکمه [ 🔥 ویژه شدن ] کلیک کنید که حسابتان ویژه شود 😷",
]);
tocobot('sendMessage',[
'chat_id'=>$chat_id,
 'message_id'=>$message_id + 1,
'text'=>"باسلام کاربر عزیز 🙃

به ربات ما خوش آمدید اینجا میتونی کارهای زیادی انجام بدی ✅

از منو زیر انتخاب کنید 👇",
'parse_mode'=>'MarkDown',  
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"بخش کاربردی ⚙️"],['text'=>"🎡 بخش سرگرمی"]],
[['text'=>"بخش ویژه ⭐️"],['text'=>"🔥 ویژه شدن"]],
[['text'=>"ناحیه کاربری 🔮"],['text'=>"ℹ️ راهنما ربات"]],
[['text'=>"پشتیبانی 📞"],['text'=>"🚀 اسپانسر ما"]],
],
'resize_keyboard'=>true,
])
]);
}
}
if($tch != 'member' && $tch != 'creator' && $tch != 'administrator'){
 tocobot('sendMessage',[
'chat_id'=>$chat_id,
 'message_id'=>$message_id + 1,
'text'=>"
بدلیل کیفیت بالای ربات و رایگان بودن آن ، ابتدا باید در کانال زیر عضو شوید ✅

⭐️ @$canal

💡 بعد از عضویت بر روی /start کلیک نمایید .
",
'parse_mode'=>"HTML",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"/start"]],
],
'resize_keyboard'=>true,
])
]);
exit();
}
if($text == "برگشت 🔙"){
if($type == "vip"){
sendMessage($from_id,"⬅️ به منوی اصلی بازگشتیم چه کاری میتونم براتون انجام بدم؟",$key);
file_put_contents("data/$from_id/step.txt","no");
exit();
}else{
sendMessage($from_id,"⬅️ به منوی اصلی بازگشتیم چه کاری میتونم براتون انجام بدم؟",$keyb);
file_put_contents("data/$from_id/step.txt","no");
exit();
}
}
elseif($text == "بخش کاربردی ⚙️"){
sendMessage($from_id,"
ℹ️ به بخش کاربردی خوش اومدید 

 از منوی زیر انتخاب کنید : 

$a",$karbordi);
}
elseif($text == "🎡 بخش سرگرمی"){
sendMessage($from_id,"
ℹ️ به بخش سرگرمی خوش اومدید 

 از منوی زیر انتخاب کنید : 

$a",$sargarmi);
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
elseif($text == "بخش ویژه ⭐️"){
if($type == "vip"){
file_put_contents("data/$from_id/step.txt","none");
tocobot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"ℹ️ به بخش ویژه خوش اومدید 

 از منوی زیر انتخاب کنید : ",
'parse_mode'=>'MarkDown',  
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"انکد متن 🔒"],['text'=>"دیکد متن 🔐"]],
[['text'=>"اسمس بمبر 🔥"],['text'=>"کال بمبر 📞"]],
[['text'=>"لایسنس نود 32 🔰"],['text'=>"فونت اسم 💎"]],
[['text'=>"فیشینگ یاب 📟"],['text'=>"شماره یاب 🔢"]],
[['text'=>"برگشت 🔙"]],
],
'resize_keyboard'=>true,
])
]);
}else{
tocobot('sendMessage',[ 
'chat_id'=>$chat_id,'text'=>"حساب شما در کاسپین پرو ویژه نمیباشد ❌

امکانات بخش ویژه و شرایط ویژه شدن ، در بخش [ ℹ️ راهنما ربات ] قابل نمایش است .",'parse_mode'=>"HTML",
]);
}
}
if($text == "🔥 ویژه شدن" and $type == "Free"){
$invite = file_get_contents("data/$from_id/invite.txt");
settype($invite,"integer");
if($invite >= 5){
$newcoin = $invite - 5;
file_put_contents("data/$from_id/invite.txt",$newcoin);
file_put_contents("data/$from_id/type.txt","vip");
file_put_contents("data/$from_id/step.txt","none");
tocobot('sendmessage', [
'chat_id' => $chat_id,
'text' =>"
تبریک🌷 !!
کاربر عزیز شما امتیاز خواسته شده برای حساب VIP رو جمع کرده اید ، و حساب شما با موفقیت ویژه شد ✅
",
]);
}else{
file_put_contents("data/$from_id/step.txt","none");
tocobot('sendmessage',[
'chat_id' => $chat_id,
'text' =>"
🤕 متاسفانه امتیاز شما جهت VIP شدن در کاسپین پرو کافی نمیباشد.
💎 ابتدا امتیاز خود را به [ $cinvite ] برسانید، سپس اقدام به ویژه شدن کنید.
",
]);
}
}
elseif($text == "ذکر روز 📿"){
$zekr = file_get_contents("http://api.codebazan.ir/zekr");
sendMessage($from_id,"

|📿| ذکر امروز :

📿 $zekr 📿

$a",$back);
}
elseif($text == "پسورد ساز 🔑"){
$random = rand_string(11);
tocobot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"

🔒 پسورد قوی شما : 

`$random`

$a",
'parse_mode'=>'MarkDown',  
]);
}
elseif($text == "جوک 😄" or $text == "➡️ بعدی ➡️"){
$hais = file_get_contents("http://api.codebazan.ir/jok/");
sendMessage($from_id,"

$hais

$a",$bak);
}
elseif($text == "خرید امتیاز 🛍"){
sendMessage($from_id,"
❗️ فعلا امکان خرید امتیاز وجود ندارد .

$a",$back);
}
elseif($text == "دانستنی 🧏🏻‍♂️" or $text == "بعدی ⏩"){
$danestani = file_get_contents("http://api.codebazan.ir/danestani/");
sendMessage($from_id,"

$danestani

$a",$ck);
}
elseif($text == "فایل ساز 📁"){
file_put_contents("data/$from_id/ali.txt","fi1");
tocobot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"خب ✅

الان باید فرمت فایل ارسال کنی❗️

🔮 مثال : test.txt یا test1.php",
'parse_mode'=>'MarkDown',  
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"برگشت 🔙"]],
],
'resize_keyboard'=>true,
])
]);
}
elseif($ali == "fi1" && $kyps){
file_put_contents("data/$from_id/ali.txt","fi2");
file_put_contents("data/$from_id/fi.txt",$text);
tocobot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"خب حالا متنی که میخوای توی فایل قرار بدم رو بفرست 🖖",
]);
}
elseif($ali == "fi2" && $kyps){
file_put_contents("data/$from_id/ali.txt","no");
file_put_contents("data/$from_id/fi.txt",$text);
tocobot('senddocument',[
'chat_id'=>$chat_id,
'document'=>new CURLFile("$fi"),
]);
}
elseif($text == "فال حافظ 👳"){
$adj = "https://andiphp.ir/gahi/hafez.png";
tocobot('sendphoto',[
'photo'=>$adj,
'chat_id'=>$chat_id,
'caption'=>"
1 - *ابتدا نیت کنید*
• برای این کار چشم ها را بسته و با تمرکز کامل نیت می کنیم.

2 - *متن زیر را بخوانید*
ای حافظ شیرازی، بر من نظر اندازی، من طالب یک فالم، تو کاشف هر رازی، قسمت میدم به قرآنی که در سینه داری، قسمت میدهم به شاخه نباتت، که عیان سازی بر من هر چه که پنهان است


• سپس برای گرفتن فال روی دکمه زیر کلیک کنید •",
'parse_mode'=>'MarkDown',  
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"دریافت فال من ✅",'callback_data'=>"fall"]],
],
'resize_keyboard'=>true,
])
]);
}
elseif($data == "fall"){
$add = "http://www.beytoote.com/images/Hafez/".rand(1,149).".gif";
tocobot('SendPhoto', [
'chat_id' => $chat_id,
'photo'=>$add,
'caption' =>"
✅فال شما
$a
 ",
'reply_to_message_id'=>$message_id,
]);
}
elseif($text == "🚀 اسپانسر ما"){
sendMessage($from_id,"اسپانسر پرسرعت و مورد اعتماد ما ☁️ : 

❇️ : @vip_host_ir
🌐 : vip-host.ir",$back);
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
elseif($text == "ساخت لوگو 🎇"){
file_put_contents("data/$from_id/step.txt","logo");
tocobot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"🌀لطفا اسم خود را به انگلیسی وارد کنید 
توجه داشته باشید بعضی از اسم ها در وب سرویس وجود ندارد.",
'parse_mode'=>'MarkDown',  
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"برگشت 🔙"]],
],
'resize_keyboard'=>true,
])
]);
}
elseif($step == "logo" && $kyps){
file_put_contents("data/$from_id/step.txt","none");
$logoo = "https://api.codebazan.ir/ephoto/writeText?output=image&effect=create-online-black-and-white-layer-logo-69.html&text=$text"."";
tocobot('SendPhoto', [
'chat_id' => $chat_id,
'photo'=>$logoo,
'caption' =>"
 لوگوی شما ساخته شد ✅️

$a",
'parse_mode'=>'html',
]);
}
elseif($text == "ساخت گیف➕"){
file_put_contents("data/$from_id/step.txt","cgif");
tocobot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"🌀لطفا اسم خود را به انگلیسی وارد کنید 
تا برای شما 3 نوع گیف ساخته شود 😊✅",
'parse_mode'=>'MarkDown',  
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"برگشت 🔙"]],
],
'resize_keyboard'=>true,
])
]);
}
elseif($step == "cgif" && $kyps){
file_put_contents("data/$from_id/step.txt","none");
$ljo = file_get_contents("https://api.codebazan.ir/image/?type=gif&text=$text"."");
$gi1 = json_decode($ljo,true);
$link1 = $gi1["giflink6"];
$link2 = $gi1["giflink5"];
$link3 = $gi1["giflink1"];
tocobot('SendDocument', [
'chat_id' => $chat_id,
'document'=>$link1,
'caption' =>"
$a",
'parse_mode'=>'html',
]);
tocobot('SendDocument', [
'chat_id' => $chat_id,
'document'=>$link2,
'caption' =>$a,
'parse_mode'=>'html',
]);
tocobot('SendDocument', [
'chat_id' => $chat_id,
'document'=>$link3,
'caption' =>$a,
'parse_mode'=>'html',
]);
}
elseif($text == "انکد متن 🔒"){
if($type == "vip"){
file_put_contents("data/$from_id/step.txt","textencode");
tocobot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"متن خود را ارسال کنید تا بصورت آنکد (رمزنگاری) در بیارم⚒
برای رمزگشایی رمز از بخش دیکد استفاده کن⚙️

🔥 نوع انکد : *base64_encode* ✅",
'reply_to_message_id'=>$message_id,
'parse_mode'=>'MarkDown',  
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"برگشت 🔙"]],
],
'resize_keyboard'=>true,
])
]);
}else{
tocobot('sendMessage',[ 
'chat_id'=>$chat_id,'text'=>"حساب شما در کاسپین ویژه نمیباشد ❌",'parse_mode'=>"HTML",
]);
}}
elseif($step == "textencode"){
file_put_contents("data/$from_id/step.txt","none");
$encode = base64_encode($text);
tocobot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"$encode",
'reply_to_message_id'=>$message_id,
'parse_mode'=>"MarkDown",
]);
}
elseif($text == "دیکد متن 🔐"){
if($type == "vip"){
file_put_contents("data/$from_id/step.txt","textdecode");
tocobot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"متن خود را ارسال کنید تا دیکد (رمزگشایی) کنم⚒
برای رمزنگاری رمز از بخش آنکد استفاده کن⚙️

🔥 نوع دیکد : *base64_decode* ✅",
'reply_to_message_id'=>$message_id,
'parse_mode'=>'MarkDown',  
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"برگشت 🔙"]],
],
'resize_keyboard'=>true,
])
]);
}else{
tocobot('sendMessage',[ 
'chat_id'=>$chat_id,'text'=>"حساب شما در کاسپین ویژه نمیباشد ❌",'parse_mode'=>"HTML",
]);
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
}
elseif($step == "textdecode"){
file_put_contents("data/$from_id/step.txt","none");
$decode = base64_decode($text);
tocobot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"$decode",
'reply_to_message_id'=>$message_id,
'parse_mode'=>"MarkDown",
]);
}
elseif($text == "بارکد ساز 🔎"){
file_put_contents("data/$from_id/step.txt","locgo");
tocobot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"🌀لطفا متن خود را به انگلیسی وارد کنید 
توجه داشته از فاصله استفاده نکنید ❗️",
'parse_mode'=>'MarkDown',  
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"برگشت 🔙"]],
],
'resize_keyboard'=>true,
])
]);
}
elseif($step == "locgo" && $kyps){
file_put_contents("data/$from_id/step.txt","none");
$logovo = "https://api.codebazan.ir/qr/?size=500x500&text=$text"."";
tocobot('SendPhoto', [
'chat_id' => $chat_id,
'photo'=>$logovo,
'caption' =>"
 ✅️
$a",
'parse_mode'=>'html',
]);
}
elseif($text == "فیشینگ یاب 📟"){
file_put_contents("data/$from_id/step.txt","fish");
tocobot('sendMessage', [
'chat_id' =>$chat_id,
'text' => "*لینک خود را برای من ارسال کنید تا آن را تست کنم ببینم فیش هست یا نه . . ! :)*

`(لینک شما حتما باید با www یا Http یا https شروع شود)`

🌱 مثال :
https://test.ir",
'parse_mode'=>'MarkDown',  
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"برگشت 🔙"]],
],
'resize_keyboard'=>true,
])
]);
}
elseif($step == "fish" && $text != "برگشت 🔙"){
if(preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$text)) {
$linkfile = fopen("data/link.txt", "a") or die("Unable to open file!");
fwrite($linkfile, "$text\n");
fclose($linkfile);
$lll = file_get_contents("https://api.codebazan.ir/fishinfo/index.php?link=$text"."");
$gi = json_decode($lll,true);
$fish = $gi["t"];
tocobot('sendMessage', [
'chat_id' => $chat_id,
'message_id' => $message_id + 1,
'text' => "✅ لینک شما با موفقیت تست شد !
        
⭐️ نتیجه : $fish

➖➖➖➖➖➖➖➖➖
└*Robot* : @[*[USERNAME]*]",
'parse_mode'=>'MarkDown',  
]);
file_put_contents("data/$from_id/step.txt","none");
}else{
sendMessage($from_id, "فرمت لینک ارسالی صحیح نمی باشد !");
}
}
elseif($text == "اسمس بمبر 🔥"){
if($type == "vip"){
file_put_contents("data/$from_id/step.txt","none");
tocobot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"این بخش ب زودی فعال خواهد شد 😍🙏🏽",
'parse_mode'=>'MarkDown',  
'reply_markup'=>json_encode([
'keyboard'=>[
    [['text'=>"برگشت 🔙"]],
],
'resize_keyboard'=>true,
])
]);
}}
elseif($text == "کال بمبر 📞"){
if($type == "vip"){
file_put_contents("data/$from_id/step.txt","none");
tocobot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"این بخش ب زودی فعال خواهد شد 😍🙏🏽",
'parse_mode'=>'MarkDown',  
'reply_markup'=>json_encode([
'keyboard'=>[
    [['text'=>"برگشت 🔙"]],
],
'resize_keyboard'=>true,
])
]);
}}
elseif($text == "شماره یاب 🔢"){
file_put_contents("data/$from_id/step.txt","num");
tocobot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"لطفا آیدی عددی کاربر مورد نظر را وارد کنید تا شماره اون رو ارسال کنم 🙃✅",
'parse_mode'=>'MarkDown',  
'reply_markup'=>json_encode([
'keyboard'=>[
    [['text'=>"برگشت 🔙"]],
],
'resize_keyboard'=>true,
])
]);
}
elseif($step == "num" && $kyps){
$ry = json_decode(file_get_contents("https://meysam72.tk/api/finder.php?id=$text"),true);
$ohs = $ry["Result"]["phone"];
if($ry['ok']==true){
tocobot('sendMessage', [
'chat_id' => $chat_id,
'text' =>"تبریک 💛

شماره کاربر موردنظر با موفقیت یافت شد ✅

📞 Number : `+$ohs`
🆔 UserID : `$text`
$a",
'parse_mode'=>'markdown',
]);
}else{
sendMessage($from_id, "شماره کاربر *$text* در سامانه شکار موجود نیست ❌");
}
}
elseif($text == "💎 دعوت دوستان"){
	tocobot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
⭐️ *ربـات هـمـه کـاره کاسـپین پـرو* 


قابلیت ارسال اسمس بمبر🔥
شماره یاب سریع 📞
ساخت گیف 📁
قیمت های انواع ماشین 🚗
بارکد ساز⚗️
لایسنس نود 32✅
فونت اسم 💎
کرونا یاب 🟢
ساخت لوگو 🎩
دریافت رمز قوی 🔒
انکدر و دیکدر 💡

و.. ده ها امکانات دیگر فقط در یک ربات 😱

https://t.me/[*[USERNAME]*]?start=$chat_id
",
'parse_mode'=>'MarkDown',  
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"برگشت 🔙"]],
],
'resize_keyboard'=>true,
])
]);
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
tocobot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
⭐️ دوست عزیز ، لطفا بنری که ارسال شد را برای مخاطبین ، گروه ها و کانال هایتان بفرستید تا سکه رایگان دریافت کنید.
💰 *به ازای هر یک نفر که با لینک دعوت شما عضو کاسپین پرو شود ، یک سکه به حسابتان لحاظ می شود.*
💎 سکه مورد نیاز برای ویژه شدن : $cinvite ",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"📞 پشتیبانی",'url'=>"https://t.me/[*[USERNAME]*]"]],
]
])
]);
}
elseif($text == "ℹ️ راهنما ربات"){
tocobot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
⭐️ *بخش ویژه شامل* : 

اسمس بمبر 🔥
شماره یاب 📞
فیشینگ یاب ❌
لایسنس نود 32 🔒
فونت اسم 🎩 ( بیش از 50 نوع )
کال بمبر 🎛 ( بسیار سریع و پیشرفته )
انکد و دیکد متن 😍 

و امکانات دیگر که بزودی اضافه خواهد شد ✅

➖ ➖ ➖ ➖ ➖ ➖ ➖ ➖

💎 *شرایط ویژه شدن* :

برای ویژه شدن ( *فعلا* ) فقط *5* امتیاز نیاز هست و در صورت گرفتن هر زیرمجموعه یک امتیاز به شما لحاظ میگردد .

💰 امتیاز بخش سکه روزانه : *0.5* سکه میباشد ✅

پس از گرفتن *5* زیرمجموعه برروی دکمه [ 🔥 ویژه شدن ] کلیک کنید تا حسابتان ویژه شود و بتوانید از [ بخش ویژه ⭐️ ] استفاده کنید❗️

$a
",
'parse_mode'=>'MarkDown',  
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"برگشت 🔙"]],
],
'resize_keyboard'=>true,
])
]);
}
elseif($text == "ناحیه کاربری 🔮"){
tocobot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
🎩 به بخش ناحیه کاربری خوش اومدید !

💎 از منوی زیر انتخاب کنید : ",
'parse_mode'=>'MarkDown',  
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"حساب من 👤"],['text'=>"💎 دعوت دوستان"]],
[['text'=>"سکه روزانه 💰"]],
[['text'=>"خرید امتیاز 🛍"],['text'=>"برگشت 🔙"]],
],
'resize_keyboard'=>true,
])
]);
}
elseif($text == "سکه روزانه 💰"){
if($timenow < $lasttime){
SendMessage($chat_id,"▫️شما امتیاز مربوط به امروز خود را دریافت کرده اید !");
}else{
$andi = "0.5";
file_put_contents("data/$from_id/invite.txt", $invite + $andi);
file_put_contents("data/$from_id/time.txt", $timenow + 86400);
SendMessage($chat_id,"▫️تبریک ، $andi امتیاز به شما تعلق گرفت !");
}}
elseif($text == "حساب من 👤"){
if($type == "vip"){
tocobot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
👤 اطلاعات حساب شما به شرح زیر است : 

نام : *$first_name* 🌷
آیدی عددی : *$chat_id*

نوع حساب شما : ویژه میباشد ✅ 
",
'parse_mode'=>'MarkDown',  
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"برگشت 🔙"]],
],
'resize_keyboard'=>true,
])
]);
}else{
tocobot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
👤 اطلاعات حساب شما به شرح زیر است : 

👨‍💼 نام : *$first_name* 🌷
🆔 آیدی عددی : *$chat_id*


⭐️ امتیاز شما : *$invite*
امتیاز برای ویژه شدن : *$cinvite*
ℹ️ نوع حساب شما : *ویژه نیست* ❌
",
'parse_mode'=>'MarkDown',  
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"حساب من 👤"],['text'=>"💎 دعوت دوستان"]],
[['text'=>"سکه روزانه 💰"]],
[['text'=>"خرید امتیاز 🛍"],['text'=>"برگشت 🔙"]],
],
'resize_keyboard'=>true,
])
]);
}
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
elseif($text == "آب و هوا 🏝"){
tocobot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
〽️ برای دریافت آب و هوا شهر مورد نظر مانند مثال زیر عمل کنید : 

/wh نام شهر

🔸 مثال : 

/wh tehran 
",
'parse_mode'=>'MarkDown',  
'reply_markup'=>json_encode([
'keyboard'=>[
    [['text'=>"برگشت 🔙"]],
],
'resize_keyboard'=>true,
])
]);
}
if(preg_match('/^(wh) (.*)/s', $text, $m)){
$que = $m[2];
$url5 = json_decode(file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=".$que."&appid=eedbc05ba060c787ab0614cad1f2e12b&units=metric"),true);
$city = $url5["name"];
$deg = $url5["main"]["temp"];
$type1 = $url5["weather"][0]["main"];
if($type1 == "Clear"){
$tpp = 'آفتابی☀';
file_put_contents("data/$from_id/type.txt","$tpp");
}
elseif($type1 == "Clouds"){
$tpp = 'ابری ☁☁';
file_put_contents("data/$from_id/type.txt","$tpp");
}
elseif($type1 == "Rain"){
$tpp = 'بارانی ☔';
file_put_contents("data/$from_id/type.txt","$tpp");
}
elseif($type1 == "Thunderstorm"){
$tpp = 'طوفانی 🌊';
file_put_contents("data/$from_id/type.txt","$tpp");
}
elseif($type1 == "Mist"){
$tpp = 'مه 💨';
file_put_contents("data/$from_id/type.txt","$tpp");
}
if($city != ''){
$ziro = file_get_contents("data/$from_id/type.txt");
$txt = "دمای شهر $city هم اکنون $deg درجه سانتی گراد می باشد

شرایط فعلی آب و هوا: $ziro";
unlink("data/$from_id/type.txt");
}else{
$txt = "⚠️ مکان شهر مورد نظر شما يافت نشد ⚠️";
}
sendMessage($from_id,"$txt\n\n$a");
}
elseif($text == "فونت اسم 💎"){
if($type == "vip"){
tocobot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
〽️ برای دریافت فونت اسم خود مانند مثال زیر ارسال کنید :

fnt esm 
",
'parse_mode'=>'MarkDown',  
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"برگشت 🔙"]],
],
'resize_keyboard'=>true,
])
]);
}else{
tocobot('sendMessage',[ 
'chat_id'=>$chat_id,'text'=>"حساب شما در کاسپین ویژه نمیباشد ❌",'parse_mode'=>"HTML",
]);
}
}
if(preg_match('/^(fnt) (.*)/s', $text, $mtch)){
$matn = strtoupper("$mtch[2]");
$Eng = ['Q','W','E','R','T','Y','U','I','O','P','A','S','D','F','G','H','J','K','L','Z','X','C','V','B','N','M'];
$Font_0 = ['𝐐','𝐖','𝐄','𝐑','𝐓','𝐘','𝐔','𝐈','𝐎','𝐏','𝐀','𝐒','𝐃','𝐅','𝐆','𝐇','𝐉','𝐊','𝐋','𝐙','𝐗','𝐂','𝐕','𝐁','𝐍','𝐌'];
$Font_1 = ['𝑸','𝑾','𝑬','𝑹','𝑻','𝒀','𝑼','𝑰','𝑶','𝑷','𝑨','𝑺','𝑫','𝑭','𝑮','𝑯','𝑱','𝑲','𝑳','𝒁','𝑿','𝑪','𝑽','𝑩','𝑵','𝑴'];
$Font_2 = ['𝑄','𝑊','𝐸','𝑅','𝑇','𝑌','𝑈','𝐼','𝑂','𝑃','𝐴','𝑆','𝐷','𝐹','𝐺','𝐻','𝐽','𝐾','𝐿','𝑍','𝑋','𝐶','𝑉','𝐵','𝑁','𝑀'];
$Font_3 = ['𝗤','𝗪','𝗘','𝗥','𝗧','𝗬','𝗨','𝗜','𝗢','𝗣','𝗔','𝗦','𝗗','𝗙','𝗚','𝗛','𝗝','𝗞','𝗟','𝗭','𝗫','𝗖','𝗩','𝗕','𝗡','𝗠'];
$Font_4 = ['𝖰','𝖶','𝖤','𝖱','𝖳','𝖸','𝖴','𝖨','𝖮','𝖯','𝖠','𝖲','𝖣','𝖥','𝖦','𝖧','𝖩','𝖪','𝖫','𝖹','𝖷','𝖢','𝖵','𝖡','𝖭','𝖬'];
$Font_5 = ['𝕼','𝖂','𝕰','𝕽','𝕵','𝚼','𝖀','𝕿','𝕺','𝕻','𝕬','𝕾','𝕯','𝕱','𝕲','𝕳','𝕴','𝕶','𝕷','𝖅','𝖃','𝕮','𝖁','𝕭','𝕹','𝕸'];
$Font_6 = ['𝔔','𝔚','𝔈','ℜ','𝔍','ϒ','𝔘','𝔗','𝔒','𝔓','𝔄','𝔖','𝔇','𝔉','𝔊','ℌ','ℑ','𝔎','𝔏','ℨ','𝔛','ℭ','𝔙','𝔅','𝔑','𝔐'];
$Font_7 = ['𝙌','𝙒','𝙀','𝙍','𝙏','𝙔','𝙐','𝙄','𝙊','𝙋','𝘼','𝙎','𝘿','𝙁','𝙂','𝙃','𝙅','𝙆','𝙇','𝙕','𝙓','𝘾','𝙑','𝘽','𝙉','𝙈'];
$Font_8 = ['𝘘','𝘞','𝘌','𝘙','𝘛','𝘠','𝘜','𝘐','𝘖','𝘗','𝘈','𝘚','𝘋','𝘍','𝘎','𝘏','𝘑','𝘒','𝘓','𝘡','𝘟','𝘊','𝘝','𝘉','𝘕','𝘔'];
$Font_9 = ['Q̶̶','W̶̶','E̶̶','R̶̶','T̶̶','Y̶̶','U̶̶','I̶̶','O̶̶','P̶̶','A̶̶','S̶̶','D̶̶','F̶̶','G̶̶','H̶̶','J̶̶','K̶̶','L̶̶','Z̶̶','X̶̶','C̶̶','V̶̶','B̶̶','N̶̶','M̶̶'];
$Font_10 = ['Q̷̷','W̷̷','E̷̷','R̷̷','T̷̷','Y̷̷','U̷̷','I̷̷','O̷̷','P̷̷','A̷̷','S̷̷','D̷̷','F̷̷','G̷̷','H̷̷','J̷̷','K̷̷','L̷̷','Z̷̷','X̷̷','C̷̷','V̷̷','B̷̷','N̷̷','M̷̷'];
$Font_11 = ['Q͟͟','W͟͟','E͟͟','R͟͟','T͟͟','Y͟͟','U͟͟','I͟͟','O͟͟','P͟͟','A͟͟','S͟͟','D͟͟','F͟͟','G͟͟','H͟͟','J͟͟','K͟͟','L͟͟','Z͟͟','X͟͟','C͟͟','V͟͟','B͟͟','N͟͟','M͟͟'];
$Font_12 = ['Q͇͇','W͇͇','E͇͇','R͇͇','T͇͇','Y͇͇','U͇͇','I͇͇','O͇͇','P͇͇','A͇͇','S͇͇','D͇͇','F͇͇','G͇͇','H͇͇','J͇͇','K͇͇','L͇͇','Z͇͇','X͇͇','C͇͇','V͇͇','B͇͇','N͇͇','M͇͇'];
$Font_13 = ['Q̤̤','W̤̤','E̤̤','R̤̤','T̤̤','Y̤̤','Ṳ̤','I̤̤','O̤̤','P̤̤','A̤̤','S̤̤','D̤̤','F̤̤','G̤̤','H̤̤','J̤̤','K̤̤','L̤̤','Z̤̤','X̤̤','C̤̤','V̤̤','B̤̤','N̤̤','M̤̤'];
$Font_14 = ['Q̰̰','W̰̰','Ḛ̰','R̰̰','T̰̰','Y̰̰','Ṵ̰','Ḭ̰','O̰̰','P̰̰','A̰̰','S̰̰','D̰̰','F̰̰','G̰̰','H̰̰','J̰̰','K̰̰','L̰̰','Z̰̰','X̰̰','C̰̰','V̰̰','B̰̰','N̰̰','M̰̰'];
$Font_15 = ['디','山','乇','尺','亇','丫','凵','工','口','ㄗ','闩','丂','刀','下','彑','⼶','亅','片','乚','乙','乂','亡','ム','乃','力','从'];
$Font_16= ['ዓ','ሠ','ይ','ዩ','ፐ','ሃ','ሀ','ፗ','ዐ','የ','ል','ና','ሏ','ፑ','ፘ','ዘ','ጋ','ኸ','ረ','ጓ','ጰ','ር','ህ','ፎ','በ','ጠ'];
$Font_17= ['Ꭷ','Ꮃ','Ꭼ','Ꮢ','Ꭲ','Ꭹ','Ꮜ','Ꮖ','Ꮻ','Ꮲ','Ꭺ','Ꮪ','Ꭰ','Ꮀ','Ꮐ','Ꮋ','Ꭻ','Ꮶ','Ꮮ','Ꮓ','Ꮱ','Ꮯ','Ꮩ','Ᏼ','N','Ꮇ'];
$Font_18= ['Ǫ','Ѡ','Σ','Ʀ','Ϯ','Ƴ','Ʋ','Ϊ','Ѳ','Ƥ','Ѧ','Ƽ','Δ','Ӻ','Ǥ','ⴼ','Ɉ','Ҟ','Ɫ','Ⱬ','Ӽ','Ҁ','Ѵ','Ɓ','Ɲ','ᛖ'];
$Font_19= ['ꐎ','ꅐ','ꂅ','ꉸ','ꉢ','ꌦ','ꏵ','ꀤ','ꏿ','ꉣ','ꁲ','ꌗ','ꅓ','ꊰ','ꁅ','ꍬ','ꀭ','ꂪ','꒒','ꏣ','ꉧ','ꊐ','ꏝ','ꃃ','ꊮ','ꂵ'];
$Font_20= ['ᘯ','ᗯ','ᕮ','ᖇ','ᙢ','ᖻ','ᑌ','ᖗ','ᗝ','ᑭ','ᗩ','ᔕ','ᗪ','ᖴ','ᘜ','ᕼ','ᒍ','ᖉ','ᒐ','ᘔ','᙭','ᑕ','ᕓ','ᗷ','ᘉ','ᗰ'];
$Font_21= ['ᑫ','ᗯ','ᗴ','ᖇ','Ꭲ','Ꭹ','ᑌ','Ꮖ','ᝪ','ᑭ','ᗩ','ᔑ','ᗞ','ᖴ','Ꮐ','ᕼ','ᒍ','Ꮶ','Ꮮ','Ꮓ','᙭','ᑕ','ᐯ','ᗷ','ᑎ','ᗰ'];
$Font_22= ['ℚ','Ꮤ','℮','ℜ','Ƭ','Ꮍ','Ʋ','Ꮠ','Ꮎ','⅌','Ꭿ','Ꮥ','ⅅ','ℱ','Ꮹ','ℋ','ℐ','Ӄ','ℒ','ℤ','ℵ','ℭ','Ꮙ','Ᏸ','ℕ','ℳ'];
$Font_23= ['Ԛ','ᚠ','ᛊ','ᚱ','ᛠ','ᚴ','ᛘ','ᛨ','θ','ᚹ','ᚣ','ᛢ','ᚦ','ᚫ','ᛩ','ᚻ','ᛇ','ᛕ','ᚳ','Z','ᚷ','ᛈ','ᛉ','ᛒ','ᚺ','ᚥ'];
$Font_24= ['𝓠','𝓦','𝓔','𝓡','𝓣','𝓨','𝓤','𝓘','𝓞','𝓟','𝓐','𝓢','𝓓','𝓕','𝓖','𝓗','𝓙','𝓚','𝓛','𝓩','𝓧','𝓒','𝓥','𝓑','𝓝','𝓜'];
$Font_25= ['𝒬','𝒲','ℰ','ℛ','𝒯','𝒴','𝒰','ℐ','𝒪','𝒫','𝒜','𝒮','𝒟','ℱ','𝒢','ℋ','𝒥','𝒦','ℒ','𝒵','𝒳','𝒞','𝒱','ℬ','𝒩','ℳ'];
$Font_26= ['ℚ','𝕎','𝔼','ℝ','𝕋','𝕐','𝕌','𝕀','𝕆','ℙ','𝔸','𝕊','𝔻','𝔽','𝔾','ℍ','𝕁','𝕂','𝕃','ℤ','𝕏','ℂ','𝕍','𝔹','ℕ','𝕄'];
$Font_27= ['Ｑ','Ｗ','Ｅ','Ｒ','Ｔ','Ｙ','Ｕ','Ｉ','Ｏ','Ｐ','Ａ','Ｓ','Ｄ','Ｆ','Ｇ','Ｈ','Ｊ','Ｋ','Ｌ','Ｚ','Ｘ','Ｃ','Ｖ','Ｂ','Ｎ','Ｍ'];
$Font_28= ['ǫ','ᴡ','ᴇ','ʀ','ᴛ','ʏ','ᴜ','ɪ','ᴏ','ᴘ','ᴀ','s','ᴅ','ғ','ɢ','ʜ','ᴊ','ᴋ','ʟ','ᴢ','x','ᴄ','ᴠ','ʙ','ɴ','ᴍ'];
$Font_29= ['𝚀','𝚆','𝙴','𝚁','𝚃','𝚈','𝚄','𝙸','𝙾','𝙿','𝙰','𝚂','𝙳','𝙵','𝙶','𝙷','𝙹','𝙺','𝙻','𝚉','𝚇','𝙲','𝚅','𝙱','𝙽','𝙼'];
$Font_30= ['ᵟ','ᵂ','ᴱ','ᴿ','ᵀ','ᵞ','ᵁ','ᴵ','ᴼ','ᴾ','ᴬ','ˢ','ᴰ','ᶠ','ᴳ','ᴴ','ᴶ','ᴷ','ᴸ','ᶻ','ˣ','ᶜ','ⱽ','ᴮ','ᴺ','ᴹ'];
$Font_31= ['Ⓠ','Ⓦ','Ⓔ','Ⓡ','Ⓣ','Ⓨ','Ⓤ','Ⓘ','Ⓞ','Ⓟ','Ⓐ','Ⓢ','Ⓓ','Ⓕ','Ⓖ','Ⓗ','Ⓙ','Ⓚ','Ⓛ','Ⓩ','Ⓧ','Ⓒ','Ⓥ','Ⓑ','Ⓝ','Ⓜ️'];
$Font_32= ['🅀','🅆','🄴','🅁','🅃','🅈','🅄','🄸','🄾','🄿','🄰','🅂','🄳','🄵','🄶','🄷','🄹','🄺','🄻','🅉','🅇','🄲','🅅','🄱','🄽','🄼'];
$Font_33= ['🅠','🅦','🅔','🅡','🅣','🅨','🅤','🅘','🅞','🅟','🅐','🅢','🅓','🅕','🅖','🅗','🅙','🅚','🅛','🅩 ','🅧','🅒','🅥','🅑','🅝','🅜'];
$Font_34= ['🆀','🆆','🅴','🆁','🆃','🆈','🆄','🅸','🅾️','🅿️','🅰️','🆂','🅳','🅵','🅶','🅷','🅹','🅺','🅻','🆉','🆇','🅲','🆅','🅱️','🅽','🅼'];
$Font_35= ['🇶 ','🇼 ','🇪 ','🇷 ','🇹 ','🇾 ','🇺 ','🇮 ','🇴 ','🇵 ','🇦 ','🇸 ','🇩 ','🇫 ','🇬 ','🇭 ','🇯 ','🇰 ','🇱 ','🇿 ','🇽 ','🇨 ','🇻 ','🇧 ','🇳 ','🇲 '];
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
$nn = str_replace($Eng,$Font_0,$matn);
$a = str_replace($Eng,$Font_1,$matn);
$b = str_replace($Eng,$Font_2,$matn);
$c = trim(str_replace($Eng,$Font_3,$matn));
$d = str_replace($Eng,$Font_4,$matn);
$e = str_replace($Eng,$Font_5,$matn);
$f = str_replace($Eng,$Font_6,$matn);
$g = str_replace($Eng,$Font_7,$matn);
$h = str_replace($Eng,$Font_8,$matn);
$i = str_replace($Eng,$Font_9,$matn);
$j = str_replace($Eng,$Font_10,$matn);
$k = str_replace($Eng,$Font_11,$matn);
$l = str_replace($Eng,$Font_12,$matn);
$m = str_replace($Eng,$Font_13,$matn);
$n = str_replace($Eng,$Font_14,$matn);
$o = str_replace($Eng,$Font_15,$matn);
$p= str_replace($Eng,$Font_16,$matn);
$q= str_replace($Eng,$Font_17,$matn);
$r= str_replace($Eng,$Font_18,$matn);
$s= str_replace($Eng,$Font_19,$matn);
$t= str_replace($Eng,$Font_20,$matn);
$u= str_replace($Eng,$Font_21,$matn);
$v= str_replace($Eng,$Font_22,$matn);
$w= str_replace($Eng,$Font_23,$matn);
$x= str_replace($Eng,$Font_24,$matn);
$y= str_replace($Eng,$Font_25,$matn);
$z= str_replace($Eng,$Font_26,$matn);
$aa= str_replace($Eng,$Font_27,$matn);
$ac= str_replace($Eng,$Font_28,$matn);
$ad= str_replace($Eng,$Font_29,$matn);
$af= str_replace($Eng,$Font_30,$matn);
$ag= str_replace($Eng,$Font_31,$matn);
$ah= str_replace($Eng,$Font_32,$matn);
$am= str_replace($Eng,$Font_33,$matn);
$as= str_replace($Eng,$Font_34,$matn);
$pol= str_replace($Eng,$Font_35,$matn);
tocobot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
`$nn`
`$a`
`$b`
`$c`
`$d`
`$e`
`$f`
`$g`
`$h`
`$i`
`$j`
`$k`
`$l`
`$m`
`$n`
`$o`
`$p`
`$q`
`$r`
`$s`
`$t`
`$u`
`$v`
`$w`
`$x`
`$y`
`$z`
`$aa`
`$ac`
`$ad`
`$af`
`$ag`
`$ah`
`$am`
`$as`
`$pol`

فونت شما با اسم $mtch[2] آماده شد کاربر $first_name عزیز😊
",
'parse_mode'=>'MarkDown',  
'reply_markup'=>json_encode([
'keyboard'=>[
    [['text'=>"برگشت 🔙"]],
],
'resize_keyboard'=>true,
])
]);
}
elseif($text == "کرونا یاب 🦠"){
sendMessage($from_id,"✍🏻لطفا نام کشور را  به انگلیسی بنویسید .
مانند : iran
اگر کشوری دوکلمه ای بود لطفا از (+) جای فاصله استفاده کنید مانند : United+States",$back);
file_put_contents("data/$from_id/step.txt","crona");
}
elseif($step == "crona" && $kyps){
sendMessage($from_id,"ربات درحال برسی میباشد لطفا صبر کنید.🔎");
$crona = file_get_contents("https://api.codebazan.ir/corona/?type=country&country=$text");
$cronaz = json_decode($crona,true);
if ($crona == "null") {}else{
$last_updated = $cronaz["result"]["last_updated"];
$country = $cronaz["result"]["country"];
$cases = $cronaz["result"]["cases"];
$deaths = $cronaz["result"]["deaths"];
$recovered = $cronaz["result"]["recovered"];
deletemessage($from_id,$message_id + 1);
sendMessage($from_id,"

♾ کشور تارگت :   $country

🌀تعداد مبتلایان :   $cases

🚼 تعداد افراد فوت شده :  $deaths

🛂تعداد افراد بهبود یافته :  $recovered

🆙 آخرین اپدیت :
$last_updated

درصورت خالی بودن یعنی یا اطلاعات را بد وارد کردید یا ان کشور در وبسرویس وجود ندارد.

$a
",$back);
}
}
elseif($text == "قیمت ماشین 🚗"){
$car = json_decode(file_get_contents("https://api.codebazan.ir/car-price/"),true);
$name1 = $car["Result"]['0']["name"];
$moshakhasat1 = $car["Result"]['0']["moshakhasat"];
$karkhane1 = $car["Result"]['0']["karkhane"];
$bazar1 = $car["Result"]['0']["bazar"];
$name2 = $car["Result"]['1']["name"];
$moshakhasat2 = $car["Result"]['1']["moshakhasat"];
$karkhane2 = $car["Result"]['1']["karkhane"];
$bazar2 = $car["Result"]['1']["bazar"];
$name3 = $car["Result"]['10']["name"];
$moshakhasat3 = $car["Result"]['10']["moshakhasat"];
$karkhane3 = $car["Result"]['10']["karkhane"];
$bazar3 = $car["Result"]['10']["bazar"];
$name4 = $car["Result"]['12']["name"];
$moshakhasat4 = $car["Result"]['12']["moshakhasat"];
$karkhane4 = $car["Result"]['12']["karkhane"];
$bazar4 = $car["Result"]['12']["bazar"];
$name5 = $car["Result"]['15']["name"];
$moshakhasat5 = $car["Result"]['15']["moshakhasat"];
$karkhane5 = $car["Result"]['15']["karkhane"];
$bazar5 = $car["Result"]['15']["bazar"];
$name6 = $car["Result"]['26']["name"];
$moshakhasat6 = $car["Result"]['26']["moshakhasat"];
$karkhane6 = $car["Result"]['26']["karkhane"];
$bazar6 = $car["Result"]['26']["bazar"];
$name7 = $car["Result"]['35']["name"];
$moshakhasat7 = $car["Result"]['35']["moshakhasat"];
$karkhane7 = $car["Result"]['35']["karkhane"];
$bazar7 = $car["Result"]['35']["bazar"];
sendMessage($from_id,"قیمت ماشین
نام ماشین : $name1
مشخصات : $moshakhasat1
قیمت کارخانه : $karkhane1
قیمت در بازار : $bazar1
➖➖➖➖➖➖➖➖➖
نام ماشین :$name2 
مشخصات : $moshakhasat2
قیمت کارخانه :$karkhane2 
قیمت در بازار :$bazar2 
➖➖➖➖➖➖➖➖➖
نام ماشین :$name3 
مشخصات : $moshakhasat3
قیمت کارخانه : $karkhane3
قیمت در بازار : $bazar3
➖➖➖➖➖➖➖➖➖
نام ماشین : $name4
مشخصات :  $moshakhasat4
قیمت کارخانه :$karkhane4 
قیمت در بازار :$bazar4 
➖➖➖➖➖➖➖➖➖
نام ماشین : $name5
مشخصات : $moshakhasat5
قیمت کارخانه :$karkhane5 
قیمت در بازار :$bazar5 
➖➖➖➖➖➖➖➖➖
نام ماشین :$name6 
مشخصات : $moshakhasat6
قیمت کارخانه : $karkhane6
قیمت در بازار :$bazar6 
➖➖➖➖➖➖➖➖➖
نام ماشین : $name7
مشخصات : $moshakhasat7
قیمت کارخانه :$karkhane7
قیمت در بازار : $bazar7
➖➖➖➖➖➖➖➖➖
موفق باشید .
",$back);
}
elseif($text == "لایسنس نود 32 🔰"){
if($type == "vip"){
$api1 = file_get_contents("https://andi.speedmizban.ir/Anti-Virus/lisence.php");
$api = json_decode($api1,true);
$a1 = $api["Results"]["ANTIVIRUS"]["key1"]["0"];
$a2 = $api["Results"]["ANTIVIRUS"]["key2"]["0"];
$a3 = $api["Results"]["ANTIVIRUS"]["key3"]["0"];
$a4 = $api["Results"]["INTERNET SECURITY"]["key1"]["0"];
$a5 = $api["Results"]["INTERNET SECURITY"]["key2"]["0"];
$a6 = $api["Results"]["INTERNET SECURITY"]["key3"]["0"];
$a7 = $api["Results"]["MOBILE SECURITY"]["key1"]["0"];
$a8 = $api["Results"]["MOBILE SECURITY"]["key2"]["0"];
$a9 = $api["Results"]["MOBILE SECURITY"]["key3"]["0"];
tocobot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
🔱 لایسنس فعال و ۳۰ روزه آنتی ویروس نود ۳۲ : 

🔑 ANTIVIRUS :
$a1
$a2
$a3
➖➖➖➖➖➖
🔑 INTERNET SECURITY :
$a4
$a5
$a6
➖➖➖➖➖➖
🔑 MOBILE SECURITY :
$a7
$a8
$a9
➖➖➖➖➖➖

$a",
'parse_mode'=>'MarkDown',  
]);
}else{
tocobot('sendMessage',[ 
'chat_id'=>$chat_id,'text'=>"حساب شما در ربات ویژه نمیباشد ❌",'parse_mode'=>"HTML",
]);
}
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
elseif($text == "معنی کلمه 📓"){
sendMessage($from_id,"🏷 لطفا کلمه ی مورد نظر را به فارسی وارد کنید.
مانند : تبر",$back);
file_put_contents("data/$from_id/step.txt","means");
}
elseif($step == "means" && $kyps){
sendMessage($from_id,"ربات درحال برسی میباشد لطفا صبر کنید.🔎");
$mean = file_get_contents("https://api.codebazan.ir/vajehyab/?text=$text");
$means = json_decode($mean,true);
$kalame = $means['result']['fa'];
$finglish = $means['result']['en'];
$english = $means['result']['dic'];
$mani = $means['result']['mani'];
$Fmoein = $means['result']['Fmoein'];
$Fdehkhoda = $means['result']['Fdehkhoda'];
$motaradefmotezad = $means['result']['motaradefmotezad'];
tocobot('sendMessage',[
    'chat_id'=>$chat_id,
    'text'=>"
📄 کلمه ی شما : $kalame
📜 فینگلیش کلمه : $finglish
📃 نام کلمه به انگلیسی : $english
----------------------
📙مترادف و متضاد :
$motaradefmotezad
----------------------
📓کاربرد و معنی : 
$mani
----------------------
📚 معنی کلمه در لغت نامه ی دکتر معین :  
$Fmoein
----------------------
📖 معنی کلمه در لغت نامه ی دهخدا :
$Fdehkhoda
----------------------
موفق باشید🌹
",
'parse_mode'=>'html',
'reply_markup'=>$back
]);
deletemessage($from_id,$message_id + 1);
}
if($text == "پشتیبانی 📞"){
    sendMessage($from_id,"
✅ آیدی پشتیبانی جهت ارتباط : @[*[CHANNEL]*] ",$back);
    file_put_contents("data/$from_id/step.txt","no");
}    
if($text == "/panel" && $chat_id == $admin){
sendMessage($from_id,'به پنل مدیریت خوش اومدین چیکار میتونم براتون انجام بدم؟',$panel);
}
if($text == "امار 📊" && $chat_id == $admin){
$user = file_get_contents("data/member.txt");
$user_id = explode("\n", $user);
$user_count = count($user_id) -1;
sendMessage($admin,"♻️   امار ربات شما :    ( $user_count)",$panel);
}
if($text == "باقی مانده اشتراک ❗️" && $chat_id == $admin){
tocobot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"تا پایان اشتراک شما $day روز باقی مانده است ✅",
'parse_mode'=>'MarkDown',
'reply_markup'=>$panel
]); 
}
if($text == "ارسال همگانی ✍🏻" && $chat_id == $admin) {
file_put_contents("data/$from_id/step.txt", "send2all");
tocobot('sendMessage',[
'chat_id' => $admin,
'text' => "پیامتون رو در قالب متن بفرستید تا اون رو برای تمام ممبر ها ارسال کنم !",
'parse_mpde' => "Markdown",
'reply_markup' => $panel,
]);
}
if($step == "send2all" && $kyps) {
file_put_contents("data/$from_id/step.txt", "none");
tocobot('sendMessage', [
'chat_id' => $from_id,
'text' => "ربات درحال ارسال پیام شما به تمام اعضا میباشد
بعد از ارسال پیام همگانی ، اتمام کار رو بهت اعلام میکنم :)
لطفا تا پایان عملیات دستوری ارسال نکنید !"
]);
$all_member = fopen( "data/member.txt", "r");
while( !feof( $all_member)) {
$user = fgets( $all_member);
tocobot('sendMessage',[
'chat_id' => $user,
'text' => $text,
'parse_mode' => "Markdown"
]);
}
sleep('3.3');
tocobot('sendMessage', [
'chat_id' => $from_id,
'text' => "عملیات ارسال پیام همگانی با موفقیت به پایان رسید
پیام شما به تمامی اعضای ربات ارسال شد"
]);
}    
elseif($text == "On Bot 😃"){
file_put_contents("data/onof.txt","on");
 tocobot('sendMessage',[
'chat_id'=>$admin,
'text'=>"ربات هم اکنون در دسترس قرار گرفت ✅",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"برگشت 🔙"],
],
]
])
]);
}
elseif($text == "حساب ویژه ⭐️" && $from_id == $admin){
file_put_contents("data/$from_id/step.txt","viphes");
tocobot('sendmessage',[
'chat_id' => $admin,
'text' =>"🍇ایدی عددی کاربر را وارد کنید:",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"برگشت 🔙"]],
],
'resize_keyboard'=>true,
])
]);
}
elseif($step == "viphes" && $text !="برگشت 🔙" ){
file_put_contents("data/$from_id/step.txt","none");
file_put_contents("data/$text/type.txt","vip");
tocobot('sendmessage', [
'chat_id' => $admin,
'text' =>"
🔒 حساب کاربری موردنظر با موفقیت ویژه شد ✅
",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'keyboard'=>[

[['text'=>"برگشت 🔙"]],
],
'resize_keyboard'=>true
])
]);
}
elseif($text == "حساب عادی 💡" && $from_id == $admin){
file_put_contents("data/$from_id/step.txt","freehes");
tocobot('sendmessage',[
'chat_id' => $admin,
'text' =>"🍇ایدی عددی کاربر را وارد کنید:",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"برگشت 🔙"]],
],
'resize_keyboard'=>true,
])
]);
}
elseif($step == "freehes" && $text !="برگشت 🔙" ){
file_put_contents("data/$from_id/step.txt","none");
file_put_contents("data/$text/type.txt","Free");
tocobot('sendmessage', [
'chat_id' => $admin,
'text' =>"
🔒 حساب کاربری موردنظر با موفقیت عادی شد ✅
",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'keyboard'=>[

[['text'=>"برگشت 🔙"]],
],
'resize_keyboard'=>true
])
]);
}
elseif($text == "سند کوین 🙃" && $from_id == $admin){
file_put_contents("data/$from_id/step.txt","fromidforcoin");
tocobot('sendmessage',[
'chat_id' => $admin,
'text' =>"🍇ایدی عددی کاربر را وارد کنید:",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"برگشت 🔙"]],
],
'resize_keyboard'=>true,
])
]);
}
elseif($step == "fromidforcoin" && $text !="برگشت 🔙" ){
file_put_contents("data/$from_id/step.txt","tedadecoin4set");
$text = $message->text;
file_put_contents("data/$from_id/to.txt",$text);
$coin1 = file_get_contents("data/$text/invite.txt");
tocobot('sendmessage', [
'chat_id' => $admin,
'text' =>"
این فرد $coin1 امتیاز دارد
چه مقدار امتیاز  اضافه کنم؟
",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'keyboard'=>[

[['text'=>"برگشت 🔙"]],
],
'resize_keyboard'=>true
])
]);
}
elseif($step == "tedadecoin4set" && $text != "برگشت 🔙"){
file_put_contents("data/$from_id/step.txt","none");
$text = $message->text;
$invite = file_get_contents("data/$to/invite.txt");
settype($invite,"integer");
$newcoin = $invite + $text;
file_put_contents("data/$to/invite.txt",$newcoin);
$cooin = $invite + $text;
tocobot('sendmessage', [
'chat_id' => $admin,
'text' =>"به فرد $text سکه اضافه شد و سکه های او تا الان $cooin میباشد!",
]);
tocobot('sendmessage',[
'chat_id' =>$to,
'text' =>"
🔴 مژده 🔴

از طرف #مدیریت مقدار $text امتیاز به شما اضافه گردید.",
]);
}
elseif($text == "Off Bot 😖" && $chat_id == "$admin"){
file_put_contents("data/onof.txt","off");
 tocobot('sendMessage',[
'chat_id'=>$admin,
'text'=>"ربات با موفقیت از دسترس کاربران خارج شد🚫",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"برگشت 🔙"]],
]
])
]);
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
?>