<?php
ob_start();
$load = sys_getloadavg();
include("jdf.php");
$day = (2505600 - (time() - filectime('Mahdy'))) / 60 / 60 / 24;
$day = round($day, 0);
define('API_KEY',"[*[TOKEN]*]");
$token = "[*[TOKEN]*]";
$token2 = "[*[TOKEN]*]";
$Dev = "[*[ADMIN]*]"; 
$admin = "[*[ADMIN]*]";
$admin1 = "[*[ADMIN]*]";
$channel = "[*[CHANNEL]*]";
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
function hup($method,$datas=[]){
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
hup('sendMessage',[
'chat_id'=>$chat_id,
'text'=>$text,
'parse_mode'=>'MarkDown']);
}
function save($filename, $data){
$file = fopen($filename, 'w');
fwrite($file, $data);
fclose($file);
}
function SendDocument($chat_id, $document, $caption = null){
hup('SendDocument',[
'chat_id'=>$chat_id,
'document'=>$document,
'caption'=>$caption
]);
}
function EditMessageText($chat_id,$message_id,$text,$parse_mode,$disable_web_page_preview,$keyboard){
hup('editMessagetext',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>$text,
'parse_mode'=>$parse_mode,
'disable_web_page_preview'=>$disable_web_page_preview,
'reply_markup'=>$keyboard
]);
 }
function SendPhoto($chat_id, $photo, $caption = null){
hup('SendPhoto',[
'chat_id'=>$chat_id,
'photo'=>$photo,
'caption'=>$caption
]);
}
function sendAction($chat_id, $action){
hup('sendChataction',[
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
function GetChat($chat_id){
hadi('GetChat',[
'chat_id'=>$chat_id
]);
}
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$chat_id = $message->chat->id;
$from_id = $message->from->id;
$username = $message->from->username;
mkdir("data/$from_id");
$message_id = $update->message->message_id;
$text1 = $update->message->text;
$text = $update->message->text;
$text3 = $update->message->text;
$first_name = $update->message->from->first_name;
$last_name = $update->message->from->last_name;
$username = $update->message->from->username;
$rt = $update->message->reply_to_message;
$tc = $update->message->chat->type;
$reply = $update->message->reply_to_message;
$reply = $update->message->reply_to_message;
$coin = file_get_contents("data/$from_id/coin.txt");
$bot = file_get_contents("data/$from_id/step.txt");
$wait = file_get_contents("data/$from_id/wait.txt");
$allcoin = file_get_contents("data/$from_id/allcoin.txt");
@$onof = file_get_contents("data/onof.txt");
@$onfofn = file_get_contents("data/onfofn.txt");
@$list = file_get_contents("users.txt");
@$sea = file_get_contents("data/$from_id/membrs.txt");
$step = file_get_contents("data/$from_id/step.txt");
$state = file_get_contents("data/$from_id/state.txt");
$Members = file_get_contents("data/Member.txt");
$type = file_get_contents("data/$from_id/type.txt");
$url =  file_get_contents("data/$from_id/url.txt");
$flist =  file_get_contents("data/$from_id/flist.txt");
$addres =  file_get_contents("data/$from_id/addres.txt");
$nfile =  file_get_contents("data/$from_id/namefile.txt");
$fcode =  file_get_contents("data/$from_id/fcode.txt");
$fup =  file_get_contents("data/$from_id/fup.txt");
$forchaneel = json_decode(file_get_contents("https://api.telegram.org/bot$token/getChatMember?chat_id=@$channel&user_id=".$from_id));
$tch = $forchaneel->result->status;
$forchaneel1 = json_decode(file_get_contents("https://api.telegram.org/bot$token/getChatMember?chat_id=@$channel&user_id=".$from_id));
$tch1 = $forchaneel1->result->status;
$hadi = file_get_contents("data/$from_id/hadi.txt");
$file=file_get_contents("data/$from_id/file.txt");
@$command = file_get_contents("data/$chat_id/com.txt");
@$amir = file_get_contents("data/$chat_id/amir.txt");
@$list = file_get_contents("users.txt");
@$sea = file_get_contents("data/$from_id/membrs.txt");
$members = file_get_contents('Member.txt');
$memlist = explode("\n", $members);
$member = file_get_contents("data/$from_id/member.txt");
$hadi = file_get_contents("data/$from_id/hadi.txt");
$man = file_get_contents("data/$from_id/man.txt");
$blocklist = file_get_contents("data/blocklist.txt");
$da = $update->message->reply_to_message->forward_from->id;
$forward_chat_username = $update->message->forward_from_chat->username;
$time = jdate("H:i:s");
$timenow = time("h:i:s");
$timenow = time();
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
$time = time() + 60;
$spam_status = ["time $time"];
file_put_contents("data/spam/$user_id.json",json_encode($spam_status,true));
hup('SendMessage',[
'chat_id'=>$user_id,
'text'=>"
به دلیل اسپم ربات 60 ثانیه از ربات بلاک شدید !
",
]);
exit(false);
}else{
$spam_status = [$spam_status[0]+1,$spam_status[1]];
}}else{
$spam_status = [1,time()+2];
}}else{
$spam_status = [1,time()+2];
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
file_put_contents("data/spam/$user_id.json",json_encode($spam_status,true));
}
Spam($from_id);
if ($day <= 2){
hup('sendMessage',[
'chat_id'=>[*[ADMIN]*],
'text'=>"ادمین گرامی مدت زمان اشتراک شما در رباتساز بزرگ میا کریت ب اتمام رسیده است ⚠️
برای تمدید ربات خود به پیوی ادمین مراجعه کنید ❤️
@DevOscar 👤",
'parse_mode'=>'MarkDown',
]);
exit();
}
if(strpos($text,"'") !== false or strpos($text,'"') !== false or strpos($text,"}") !== false or strpos($text,"{") !== false or strpos($text,")'") !== false or strpos($text,"(") !== false or strpos($text,",") !== false){ 
file_put_contents("data/$from_id/state.txt","none");
file_put_contents("data/$from_id/step.txt","none");
$list = file_get_contents('data/blocklist.txt');
$addus= $from_id . "\n";
file_put_contents("data/blocklist.txt", $addus);
$addus= $from_id . "\n";
hup('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
 به دلیل ارسال کلمه ، حروف ممنوعه از ربات بلاک شدید 🌹",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
]); 
hup('sendMessage',[
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
}
elseif(strpos($blocklist, "$from_id") !== false ){
hup('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
شما به خاطر رعایت نکردن قوانین از ربات مسدود شدید. ❌

لطفا پیام ارسال نکنید.⚠️
",
'reply_markup'=>json_encode([
'remove_keyboard'=>true,
])
]);
exit();
}
function checkS($src){
$r = "";
function test($src, $t){
$r = "";
$e = explode($t, strtolower($src));
$line = count(explode("\n", $e[0]));
unset($e[0]);
foreach($e as $q){
$r .= "\nهشدار! خط: $line\nنوع: $t\nخط کد: ".explode("\n", $src)[$line-1]."\n";
$line += count(explode("\n", $q))-1;
}
return $r;
}
function test2($src, $t, $aaa){
$r = "";
$e = explode($t, strtolower($src));
$line = count(explode("\n", $e[0]));
unset($e[0]);
foreach($e as $q){
$b = true;
foreach($aaa as $aa){
if(substr($q, 0, strlen($aa))==$aa){
$b = false;
}
}
if($b===true){
$r .= "\nهشدار! خط: $line\nنوع: $t\nخط کد: ".explode("\n", $src)[$line-1]."\n";
}
$line += count(explode("\n", $q))-1;
}
return $r;
}
$r = "";
$all = ["eval", "include", "unlink", "request", "mkdir", "rmdir", "scandir", "exec", "file(", "__FILE__", "__DIR__", '$_SERVER'];
foreach($all as $a)
$r .= test($src, $a);
$r .= test2($src, "file_get_contents", ["('data", '("data']);
$r .= test2($src, "file_put_contents", ["('data", '("data']);
return $r;
}
if(preg_match('/^\/([Cc][Rr][Ee][Aa][Tt][Oo][Rr])/',$text1)){
hup('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"@MiaCreateBot",
]);
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
if($text1=="/start"){
$user = file_get_contents('users.txt');
$members = explode("\n", $user);
if(!in_array($from_id, $members)){
$add_user = file_get_contents('users.txt');
$add_user .= $from_id . "\n";
file_put_contents("data/$chat_id/membrs.txt", "0");
file_put_contents("data/$chat_id/coin.txt", "5");
file_put_contents("data/$chat_id/type.txt", "Free");
file_put_contents('users.txt', $add_user);
}
file_put_contents("data/$chat_id/hadi.txt", "no");
hup('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
سلام $first_name عزیز 🌹
",
'parse_mode'=>"HTML",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>'👨🏻‍💻 ارتباط با پشتیبانی آنلاین']],
[['text'=>'⚒ امکانات '],['text'=>'🩸 کانال ما']],
[['text'=>'درخواست پشتیبانی فوری ⚠️']],
],
'resize_keyboard'=>true,
])
]);
}
elseif (strpos($text, '/start') !== false) {
$newid = str_replace("/start ", "", $text);
if($from_id == $newid) {
hup('sendMessage', [
'chat_id' => $chat_id,
'text' => "
متوجه نمیشم چی میگی
",
]);
} 
elseif (strpos($list, "$from_id") !== false){
SendMessage($chat_id,"
متوجه نمیشم چی میگی
");
}else{
@$sho = file_get_contents("data/$newid/coin.txt");
$getsho = $sho + 1;
file_put_contents("data/$newid/coin.txt", $getsho);
@$sea = file_get_contents("data/$newid/membrs.txt");
$getsea = $sea + 1;
file_put_contents("data/$newid/membrs.txt", $getsea);
$user = file_get_contents('users.txt');
$members = explode("\n", $user);
if(!in_array($from_id, $members)){
$add_user = file_get_contents('users.txt');
$add_user .= $from_id . "\n";
@$sea = file_get_contents("data/$from_id/membrs.txt");
file_put_contents("data/$chat_id/membrs.txt", "0");
file_put_contents("data/$chat_id/coin.txt", "5");
file_put_contents("data/$chat_id/type.txt", "Free");
file_put_contents('users.txt', $add_user);
}
file_put_contents("data/$chat_id/hadi.txt", "No");
sendmessage($chat_id, "
شما با دعوت [کاربر](tg://user?id=$newid)عضو ربات ما شدید.⭐️
","Markdown","true");
hup('sendmessage', [
'chat_id' => $chat_id,
'text' => "
سلام $first_name عزیز 🌹
",
'parse_mode' => "HTML",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>'👨🏻‍💻 ارتباط با پشتیبانی آنلاین']],
[['text'=>'⚒ امکانات '],['text'=>'🩸 کانال ما']],
[['text'=>'درخواست پشتیبانی فوری ⚠️']],
],
'resize_keyboard'=>true,
])
]);
SendMessage($newid, "چی میگی :|","Markdown","true");
}
}
if($onof == "off" && $from_id != $Dev){
SendMessage($chat_id,"اوه⚠️
ربات درحال استراحته", null, $message_id, $remove);   
 return false;
}
elseif($tch != 'member' && $tch != 'creator' && $tch != 'administrator' or $tch1 != 'member' && $tch1 != 'creator' && $tch1 != 'administrator'){
hup('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
📌 جهت استفاده از خدمات ربات لطفا در کانال ما عضو شوید 🌹
@$channel | @$channel
@$channel | @$channel
لطفا بعد از عضویت در کانال ها (/start) کلیک کنید❗️
",
'parse_mode'=>"HTML",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"چنل ما🍫",'url'=>"https://t.me/$channel"]],
]
])
]);
}
elseif($text1 == "🩸 کانال ما"){
file_put_contents("data/$from_id/step.txt","mychannel");
hup('Sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
https://t.me/$channel ",
]);
}
elseif($text1 =="👨🏻‍💻 ارتباط با پشتیبانی آنلاین"){
$rere=file_get_contents("data/onfofn.txt");
if($rere=='onf'){
hup('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
👨‍💻به بخش پشتیبانی خوش آمدید👨‍💻

😉ما منتظر نظرات، انتقادات و پیشنهادات شما هستیم!

📝 پیام خودتون رو بصورت متنی و کوتاه، بدون سلام و احوال پرسی ارسال کنید تا سریعتر به پیامتان پاسخ داده شود:
",
'parse_mode'=>'HTML',
  'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"🔙"]],
]
])
]);
file_put_contents("data/$from_id/state.txt","mok");
}else{
hup('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
پشتیبانی توسط مدیر خاموش شده است😿
",
'parse_mode'=>'HTML',
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"🔙"]],
]
])
]);
}
}
elseif($state == "mok" && $text !="🔙" && $text !="/start" ){
hup('forwardmessage',[
'chat_id'=>$admin,
'from_chat_id'=>$from_id,
'message_id'=>$message_id
]);
hup('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
 ✅ پیامتان به دست #مدیریت ربات رسید..
 
 •  لطفا صبور باشید بزودی پاسخ به شما ارسال می شود..
 ",
]);
hup('sendMessage',[
'chat_id'=>$admin,
'text'=>"
👨‍💼#مدیریت
📨ادمین یه پیام داری📨
------------------------------------
$text1
$message_id
------------------------------------
<pre>$from_id</pre>
ایدی : $username
نام : $first_name
ایدی عددی : $from_id
------------------------------------
👨‍💼مشخصات کاربری شخص☝️
",
'parse_mode'=>'HTML',
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔙"]],
],
'resize_keyboard'=>true,
])
]);
file_put_contents("data/$from_id/state.txt","none");
}
elseif($da != "" && $from_id == $admin){
hup('sendMessage',[
'chat_id'=>$da,
'text'=>"
📨 پیامی جدید از #مدیریت ربات 📨
 - - - - - - - - - - - - - - - - - - - - - - - - -
 $text
  - - - - - - - - - - - - - - - - - - - - - - - - -
👨‍💼برای پاسخ دادن به پشتیبانی مراجعه کنید
",
'parse_mode'=>'MarkDown',
]);
hup('sendMessage',[
'chat_id'=>$admin,
'text'=>"
پیام شما با موفقیت به دست ایشان رسید✅
 ",
'parse_mode'=>'MarkDown',
]);
}
function rand_string( $length ) {
$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
return substr(str_shuffle($chars),0,$length);
}
$hadi =  rand_string(15);
if($text == '👨🏻‍🎤 ساخت پسورد'){
hup('sendmessage', [
'chat_id' => $chat_id,
'text' => "
پسورد قدرتمند شما:
$hadi",
]);
}
elseif($text1 == "🔙"){
file_put_contents("data/$from_id/state.txt","none");
hup('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"📌 به منوی اصلی برگشتیم 🌹",
'parse_mode'=>"MarkDown",  
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>'👨🏻‍💻 ارتباط با پشتیبانی آنلاین']],
[['text'=>'⚒ امکانات '],['text'=>'🩸 کانال ما']],
[['text'=>'درخواست پشتیبانی فوری ⚠️']],
],
'resize_keyboard'=>true,
])
]);
}
elseif($text1 == "⚒ امکانات"){
file_put_contents("data/$from_id/step.txt","none");
hup('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"به بخش دیگر امکانات خوش اومدی",
'parse_mode'=>"MarkDown",  
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"👨🏻‍🎤 ساخت پسورد"]],
[['text'=>"🧛🏻 فال حافظ 🧛🏻"],['text'=>"💌فونت اسمی"]],
[['text'=>"درشت کردن نوشته ✏️"],['text'=>"کج کردن نوشته ✏️"]],
[['text'=>"کد کردن نوشته ✏️"]],
[['text'=>"🔙"]],
],
'resize_keyboard'=>true,
])
]);
}
elseif($text1 == '🧛🏻 فال حافظ 🧛🏻'){
 $pic = "http://www.beytoote.com/images/Hafez/".rand(1,149).".gif";
 SendPhoto($chat_id,$pic,"■ با ذکر صلوات و فاحته ای جهت شادی روح 'حافظ شیرازی' فال تان را بخوانید.");
}
elseif ($text1 == '💌فونت اسمی') {
hup('sendMessage',[
'chat_id'=> $chat_id,
'text' => "🧟‍♀️ برای دریافت فونت اسم خود کافیست متن زیر را بنویسید
font myname
جای myname متن مورد نظر رو بنویسید 👌🏻
مثال 👇🏻
font Ho3win
مثال 👆🏻"
]);
}
if(preg_match('/^(font) (.*)/s', $text, $mtch)){
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
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی$nn = str_replace($Eng,$Font_0,$matn);
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
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
hup('sendmessage',[
'chat_id'=>$chat_id,
'text' => "
$nn
$a
$b
$c
$d
$e
$f
$g
$h
$i
$j
$k
$l
$m
$n
$o
$p
$q
$r
$s
$t
$u
$v
$w
$x
$y
$z
$aa
$ac
$ad
$af
$ag
$ah
$am
$as
$pol

🔝🔛🔝
فونت شما آماده شد : $mtch[2] ♥️
برای کپی کردن فونت مورد نظر خود رو آن ضربه بزنید تا کپی شود.
" ,
'parse_mode'=>'MarkDown',
]);
}
elseif($text1=="درشت کردن نوشته ✏️"){
file_put_contents("data/$from_id/file.txt","bold");
hup('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"متن خود را بفرستید :",
'parse_mode'=>'HTML',
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔙"]],
],
'resize_keyboard'=>true
])
]);
}
elseif($file=="bold" && $text !="🔙" && $text !="/start" ){
file_put_contents("data/$from_id/file.txt","none");
hup('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"*$text*",
'parse_mode'=>'MarkDown',
]);
}
elseif($text1=="کج کردن نوشته ✏️"){
file_put_contents("data/$from_id/file.txt","italic");
hup('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"متن خود را بفرستید :",
'parse_mode'=>'HTML',
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔙"]],
],
'resize_keyboard'=>true
])
]);
}
elseif($file=="italic" && $text !="🔙" && $text !="/start" ){
file_put_contents("data/$from_id/file.txt","none");
hup('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"_ $text _",
'parse_mode'=>'MarkDown',
]);
}
elseif($text1=="کد کردن نوشته ✏️"){
file_put_contents("data/$from_id/file.txt","code");
hup('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"متن خود را بفرستید :",
'parse_mode'=>'HTML',
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔙"]],
],
'resize_keyboard'=>true
])
]);
}
elseif($file=="code" && $text !="🔙" && $text !="/start" ){
file_put_contents("data/$from_id/file.txt","none");
hup('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"`$text`",
'parse_mode'=>'MarkDown',
]);
}
elseif($text1 == "درخواست پشتیبانی فوری ⚠️"){
file_put_contents("data/$from_id/state.txt","none");
hup('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"درخواست ارسال شد",
'parse_mode'=>"MarkDown", 
]);
hup('sendMessage',[
'chat_id'=>$admin,
'text'=>"
👨‍💼#مدیریت
یک نفر با اطلاعات زیر درخواست پشتیبانی آنلاین کرد :
ایدی : $username
اسم : $first_name
ایدی عددی : $from_id
",
'parse_mode'=>'HTML',
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔙"]],
],
'resize_keyboard'=>true,
])
]);
file_put_contents("data/$from_id/state.txt","none");
}
elseif($text1 == "پنل" or $text1 == "پنل مدیریت" or $text1 == "/panel" or $text1 == "مدیریت" ){
if($from_id == $admin){
hup('sendmessage', [
'chat_id' =>$chat_id,
'text' =>"مدیر عزیز به پنل مدیریت خوش آمدید 🌹",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"👥 آمار ربات من 👥"]],
[['text'=>"آنبلاک کردن فرد ⚗️"],['text'=>"بلاک کردن فرد🩸"]],
[['text'=>"پیام به کاربر 📩"],['text'=>"ارسال به همه🚀"]],
[['text'=>"ربات |On| 🤖"],['text'=>"ربات |Off| 🚫"]],
[['text'=>"پشتیبانی |On| 🧑🏻‍💻"],['text'=>"پشتیبانی |Off| 🥀"]],
[['text'=>"باقی مانده اشتراک ❗️"]],
[['text'=>"🔙"]],
],
'resize_keyboard'=>true
])
]);
}else{
SendMessage($chat_id,"
متوجه نمیشم چی میگی !
","HTML");
}
}
elseif($text1 == "آنبلاک کردن فرد ⚗️" && $chat_id == $Dev){
file_put_contents("data/$from_id/step.txt","sharr");
hup('Sendmessage',[
'chat_id'=>$chat_id,
'text'=>"لطفا ایدی عددی کاربر مورد نظر رو ارسال کنید",
]);
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
elseif($text1 == "باقی مانده اشتراک ❗️" && $chat_id == $Dev){
hup('Sendmessage',[
'chat_id'=>$chat_id,
'text'=>"تا پایان اشتراک شما $day روز باقی مانده است ✅",
]);
}
elseif($step == "sharr" && $text !="🔙" ){
$newlist = str_replace($text, "", $blocklist);
file_put_contents("data/blocklist.txt", $newlist);
file_put_contents("data/$chat_id/step.txt", "No");
hup('Sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
خب ایدی $text از بلاکی درآمد 😎
",
]);
}
elseif($text1 == "بلاک کردن فرد🩸" && $chat_id == $Dev){
file_put_contents("data/$from_id/step.txt","shar");
hup('Sendmessage',[
'chat_id'=>$chat_id,
'text'=>"لطفا ایدی فرد مورد نظر را ارسال کنید",
]);
}
elseif($step == "shar" && $text !="🔙" ){
file_put_contents("data/$from_id/shar.txt","$text");
hup('Sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
ایدی $text از ربات بلاک شد
",
]);
$adduser = file_get_contents("data/blocklist.txt");
$adduser .= $text . "\n";
file_put_contents("data/blocklist.txt", $adduser);
file_put_contents("data/$from_id/step.txt","no");
$id11 = file_get_contents("data/$from_id/shar.txt");
hup('Sendmessage',[
'chat_id'=>$id11,
'text'=>"ارتباط شما با سرور ما قطع شد و نمیتوانید از بات استفاده کنید 😹",
]);
}
elseif($text1 == "پیام به کاربر 📩" && $chat_id == $Dev){
file_put_contents("data/$from_id/state.txt","info");
hup('Sendmessage',[
'chat_id'=>$chat_id,
'text'=>"لطفا شناسه کاربر را وارد کنید??",
]);
}
elseif($state == "info" && $text !="🔙" ){
file_put_contents("data/$from_id/state.txt","sendpm");
file_put_contents("data/$from_id/info.txt","$text");
hup('Sendmessage',[
'chat_id'=>$chat_id,
'text'=>"لطفا پیام خود را وارد کنید✏",
'parse_mode'=>"HTML",  
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔙"]],
],
'resize_keyboard'=>true,
])
]);
}
elseif($state== "sendpm"){
file_put_contents("data/$from_id/state.txt","none");
file_put_contents("data/$from_id/sendpm.txt","$text");
$sendpm = file_get_contents("data/$from_id/sendpm.txt");
$info = file_get_contents("data/$from_id/info.txt");
hup('Sendmessage',[
'chat_id'=>$info,
'text'=>"
سرورم شما یک پیام از پشتیبانی دارید ♥️
💌:$sendpm
",
'parse_mode'=>'HTML',
]);
hup('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"پیام شما به کاربر مورد نظر ارسال شد📮",
'parse_mode'=>'HTML',
]);
}
elseif($text1 == "👥 آمار ربات من 👥" && $chat_id == $admin){
$user = file_get_contents("users.txt");
$member_id = explode("\n",$user);
$member_count = count($member_id) -1;
sendmessage($chat_id , "
👀 آمار ربات شما : |  $member_count |
" , "html");
}
elseif($text1 == "ارسال به همه🚀" && $chat_id == $admin){
file_put_contents("data/$from_id/step.txt","pm");
hup('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"📬پیام خود را ارسال کنید !!!",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>'/panel']],
],
'resize_keyboard'=>true
])
]);
}
elseif($step == "pm" && $text !="🔙" ){
file_put_contents("data/$from_id/step.txt","none");
hup('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"پیام شما فرستاده شد 💫",
]);
$all_member = fopen( "users.txt", "r");
while( !feof( $all_member)){
$user = fgets( $all_member);
SendMessage($user,$text1,"html");
}
}
elseif($text == "پشتیبانی |On| 🧑🏻‍💻" && $from_id == $admin){
file_put_contents("data/onfofn.txt","onf");
hup('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
📮پشتیبانی با موفقیت در دسترس قرار گرفت.
 ",
'parse_mode'=>"HTML",
]);
}
elseif($text == "پشتیبانی |Off| 🥀" && $from_id == $admin){
file_put_contents("data/onfofn.txt","ofn");
hup('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
📮پشتیبانی با موفقیت از دسترس خارج شد.
 ",
'parse_mode'=>"HTML",
]);
}
elseif($text1 == "ربات |On| 🤖"&& $from_id == $Dev){
file_put_contents("data/onof.txt","on");
 hup('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"ربات هم اکنون در دسترس قرار گرفت ✅",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[
['text'=>"/panel"],
],
]
])
]);
}
elseif($text1 == "ربات |Off| 🚫"&& $from_id == $Dev){
file_put_contents("data/onof.txt","off");
 hup('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"ربات با موفقیت از دسترس کاربران خارج شد🚫",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[
['text'=>"/panel"],
],
]
])
]);
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
?>
