<?php
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
date_default_timezone_set('Asia/Tehran');
$time = date('H:i');
error_reporting(0);
$day = (2505600 - (time() - filectime('Mahdy'))) / 60 / 60 / 24;
$day = round($day, 0);
define('API_KEY','[*[TOKEN]*]');
ini_set("log_errors","off");
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
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$chat_id = $message->chat->id;
$message_id = $message->message_id;
$from_id = $message->from->id;
$textmessage = $message->text;
$first_name = $message->from->first_name;
$last_name = $message->from->last_name;
$username = $message->from->username;
$bottag = "[*[USERNAME]*]";
$admin = "[*[ADMIN]*]";
$channel_id = "[*[CHANNEL]*]";
$user = json_decode(file_get_contents("data/$from_id.json"),true);
$step = $user["step"];
$tc = $update->message->chat->type;
$new_chat_member = $message->new_chat_member;
$new_chat_member_id = $new_chat_member->id;
$new_chat_member_first_name = $new_chat_member->first_name;
$new_chat_member_last_name = $new_chat_member->last_name;
$new_chat_member_username = $new_chat_member->username;
$suchi = file_get_contents("data/$chat_id/setnt.txt");
function sendphoto($chat_id, $photo, $captionl){
bot('sendphoto',[
'chat_id'=>$chat_id,
'photo'=>$photo,
'caption'=>$caption,
]);
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
function save($filename, $data)
{
$file = fopen($filename, 'w');
fwrite($file, $data);
fclose($file);
}
function objectToArrays( $object ) {
if( !is_object( $object ) && !is_array( $object ) )
{
return $object;
}
if( is_object( $object ) )
{
$object = get_object_vars( $object );
}
return array_map( "objectToArrays", $object );
}
function DeleteFolder($path){
if($handle=opendir($path)){
while (false!==($file=readdir($handle))){
if($file<>"." AND $file<>".."){
if(is_file($path.'/'.$file)){ 
@unlink($path.'/'.$file);} 
if(is_dir($path.'/'.$file)) { 
deletefolder($path.'/'.$file); 
@rmdir($path.'/'.$file); 
}
}
}
}
}
function sendaction($chat_id, $action){
bot('sendchataction',[
'chat_id'=>$chat_id,
'action'=>$action
]);
}
if($time == '00:00'){
$botd = [
"﷽ 00:00 ﷽",
"﴾ 00:00 ﴿",
"ッ 00:00 ッ",
"↯ 00:00 ↯",
"↻{ 00:00 }↻",
"| 00:00 |",
"➣ 00:00 ➣",
"∞ 00:00 ∞",
"〇 00:00 〇",
"♡ 00:00 ♡",
"♥ 00:00 ♥",
"■ ⁰⁰:⁰⁰ ■",
"♢ ⁰⁰:⁰⁰ ♢",
];
$r00 = $botd[rand(0, count($botd)-1)];
Deletefolder("data/spam");
rmdir("data/spam");
bot('sendMessage',[
'chat_id' =>"@$channel_id",
'text' => "$r00",
'parse_mode'=>"HTML",
]);
}
if ($day <= 2){
bot('sendMessage',[
'chat_id'=>[*[ADMIN]*],
'text'=>"ادمین گرامی مدت زمان اشتراک شما در رباتساز بزرگ میا کریت ب اتمام رسیده است ⚠️
برای تمدید ربات خود به پیوی ادمین مراجعه کنید ❤️
@DevOscar 👤",
'parse_mode'=>'MarkDown',
]);
exit();
}
if($time == '20:00'){
bot('sendMessage',[
'chat_id'=>"@$channel_id",
'text'=>"🌚 شًَبًّ هًُمًَهٍٍ اٌَعٍَضُْاٍْ بًْخَّیًٍرُِ 🌚",
'parse_mode'=>"HTML",
]); 
}
if($time == '14:00'){
bot('sendMessage',[
'chat_id'=>"@$channel_id",
'text'=>"🌞 ظّّهُُرِّ هٌُمَّهُّ اَّعٍّضٌَاُُ بًّخٌِیٍَرًّ 🌞",
'parse_mode'=>"HTML",
]); 
}
if($time == '07:00'){
bot('sendMessage',[
'chat_id'=>"@$channel_id",
'text'=>"🌤 صِْبِْحٍّ هٌِمًٍهٌُ اًّعَّضٍَاٍْ بَّخُُیَّرٌْ 🌤",
'parse_mode'=>"HTML",
]); 
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
if(strpos($textmessage, 'zip') !== false or strpos($textmessage, 'ZIP') !== false or strpos($textmessage, 'Zip') !== false or strpos($textmessage, 'ZIp') !== false or strpos($textmessage, 'zIP') !== false or strpos($textmessage, 'ZipArchive') !== false or strpos($textmessage, 'ZiP') !== false){
exit;
}
if(strpos($textmessage, 'kajserver') !== false or strpos($textmessage, 'update') !== false or strpos($textmessage, 'UPDATE') !== false or strpos($textmessage, 'Update') !== false or strpos($textmessage, 'https://api') !== false){
exit;
}
if(strpos($textmessage, '$') !== false or strpos($textmessage, '{') !== false or strpos($textmessage, '}') !== false){
exit;
}
if(strpos($textmessage, '"') !== false or strpos($textmessage, '(') !== false or strpos($textmessage, '=') !== false or strpos($textmessage, '#') !== false){
exit;
}
if(strpos($textmessage, 'getme') !== false or strpos($textmessage, 'GetMe') !== false){
exit;
}
if(strpos($textmessage,"/start") !== false  && $textmessage !=="/start"){
$id=str_replace("/start ","",$textmessage);
$amar=file_get_contents("data/members.txt");
$exp=explode("\n",$amar);
if(!in_array($from_id,$exp) && $from_id != $id){
$myfile2 = fopen("data/members.txt", "a") or die("Unable to open file!");
fwrite($myfile2, "$from_id\n");
fclose($myfile2);
$user["step"] = "none";
$user["invite"] = "0";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
$user1 = json_decode(file_get_contents("data/$id.json"),true);
$invite = $user1["invite"];
settype($invite,"integer");
$newinvite = $invite + 1;
$user1["invite"] = $newinvite;
$outjson = json_encode($user1,true);
file_put_contents("data/$id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$id,
'text'=>"✅ یک فرد از طریق لینک مخصوص شما به ربات پیوست !",
'parse_mode'=>"HTML",
]);						
}
}
if(preg_match('/^\/([Cc][Rr][Ee][Aa][Tt][Oo][Rr])/',$textmessage)){
bot ('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"@MiaCreateBot",
]);
}
if (!file_exists("data/$from_id.json")) {
$myfile2 = fopen("data/members.txt", "a") or die("Unable to open file!");
fwrite($myfile2, "$from_id\n");
fclose($myfile2);
$user["step"] = "none";
$user["invite"] = "0";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
}
if($textmessage == "‌Hqysisha81735yav" ){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"Fuck You!",
'parse_mode'=>"HTML",
]); 
}else{
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
$time = time() + 1000;
$spam_status = ["time $time"];
file_put_contents("data/spam/$user_id.json",json_encode($spam_status,true));
bot('SendMessage',[
'chat_id'=>$user_id,
'text'=>"😐جهت جلوگیری از اسپم شما به مدت 1000 ثانیه از ربات بلاک شدید."
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
if($textmessage == "/start" && $tc == "private" or $textmessage == "Back | برگشت" && $tc == "private"){
$user["step"] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
 bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"
به ربات سرگرمی ما خوش آمدید 🤠

✅ راستی میتونی با من حرف هم بزنی!
😄 برو بخش دستورات تا با دستوراتم اشنا بشی!
منو ببر توی گروهت🤠

دستورات ربات : /dast
راهنما : /help

➖➖➖➖➖➖➖➖➖➖➖
<b>• یکی از دکمه های زیر را انتخاب کنید .</b>

📣 کانال ما : @[*[CHANNEL]*]

",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"📋 دستورات ربات"],['text'=>"🍿 راهنمای ربات"]],
],
"resize_keyboard"=>true,
])
]); 
}
elseif($textmessage == "/help" or $textmessage == "راهنما" or $textmessage == "🍿 راهنمای ربات" ){
sendaction($chat_id,'typing');
bot('sendMessage',[
 'chat_id'=>$chat_id,
'text'=>"
راهنمای ربات سرگرمی گروه 🍻🍓
➖➖➖➖➖➖➖➖➖➖
<code> این ربات پیشرفته دارای هوش مصنوعیه و قابلیت سرگرم کردن شما و اعضای گروهتون رو داره!
چون این ربات کلی حرف بلده و میتونه باهاتون حرف بزنه
ولی خوب نمیتونید باهاش بحث کنید و یا درباره یه موضوع حرف بزنید.
و بعضی از حرفارو هم تشخیص نمیده و نمیفهمه!
😶 این ربات پیشرفته هر روز درحال آپدیته و قابلیت های جدید بهش اضافه میشه!
برید بخش دستورات میتونید امکاناتش رو ببینید :)
این ربات خوب مناسب گروهه یه سرگرمی مناسب و خوب برای گروه
این رباتو ببرید توی گروهاتون و ازش لذت ببرید!</code>
➖➖➖➖➖➖➖➖➖➖➖
از طریق دکمه زیر ربات رو به گروهتون ببرید⇩
",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"✅ افزودن به یک گروه", 'url'=>"https://t.me/$bottag?startgroup=new"]],
]
])
]); 
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
elseif(strpos($textmessage,"/photo") !== false){
$textmessage = explode(" ",$textmessage);
$textt = $textmessage['1'];
bot('sendphoto', [
'chat_id' => $chat_id,
'photo'=>"https://assets.imgix.net/examples/clouds.jpg?blur=150&w=500&h=500&fit=crop&txt=$textt&txtsize=100&txtclr=ff2e4357&txtalign=middle,center&txtfont=Futura%20Condensed%20Medium&mono=ff6598cc",
'caption'=>"☝️ لوگوی شما با نام $textt ساخته شد✅",
'reply_to_message_id'=>$message_id,
]);
}
if($textmessage == "/dast" or $textmessage == "دستورات" or $textmessage == "📋 دستورات ربات"){
sendaction($chat_id,'typing');
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
◾️ دستورات ربات سرگرمی ◾️

در وارد کردن دستورات از + استفاده نکنید وگرنه جوابی دریافت نمیکنید..
 علامت | فقط برای جدا سازی فارسی و انگلیسی است برای مثال نحوه درست نمایش پروفایل ( من ) و یا (me)

+ من | me
🔺 نمایش پروفایل شما 

+ زمان | time
🔺 نمایش زمان دقیق بصورت فارسے

+ ربات | bot
🔺  اطلاع از آنلاینی ربات

+  پینگ | ping
🔺 دریافت پینگ و اطلاعات سرور

+ شاخ | text
🔺 دریافت متن شاخ مخصوص بیو

+ حدیث | hadith
🔺 دریافت حدیث از امامان

+ فال | fal
🔺 دریافت فال بصورت تصویری

➖➖➖➖
+ /photo name
ساخت لوگو با نام شما بجای name اسم موردنظرتونو بزارید 😄

+ /Blue name
بزرگ و آبی کردن متن بجای name اسم موردنظرتونو بزارید 😄

+ /Little name
کوچک کردن و زیباسازی متن، بجای name اسم موردنظرتونو بزارید 😄

+ /Dayer name
برای دایره ای کردن متن ها و زیباسازی بجای name اسم موردنظرتونو بزارید😄
➖➖➖➖
قابلیت های دیگه در دست ساخته :)
راستی این ربات دارای هوش مصنوعی هست و باهاتون صحبت هم میکنه !
😢 البته نمی تونه همه حرف هاتونو بفهمه !

😶 در وارد کردن دستورات حروف کوچک بزرگ دقت شود!
➖➖➖➖➖➖➖➖➖➖➖
از طریق دکمه زیر ربات رو به گروهتون ببرید⇩
",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"✅ افزودن به یک گروه", 'url'=>"https://t.me/$bottag?startgroup=new"]],
]
])
]); 
}
elseif($textmessage == "شاخ" or $textmessage == "text"){
$sha = file_get_contents("https://unknow.1xhost.info/Api/bio/bio.php");
 if( !$sha ){ $sha = "گت هاست از سمت سرور بسه است"; }
bot('sendMessage',[
 'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text' => "$sha",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
]);  
}
elseif($textmessage == "حدیث" or $textmessage == "hadith"){
$ha = file_get_contents("https://unknow.1xhost.info/Api/ha/hadith.php");
if( !$ha ){ $ha = "گت هاست از سمت سرور بسه است"; }
bot('sendMessage',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text' => "$ha",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
]);  
}
elseif($textmessage == "فال" or $textmessage == "fal"){
$add = "http://www.beytoote.com/images/Hafez/".rand(1,149).".gif";
bot('sendphoto', [
'chat_id' => $chat_id,
'photo'=>$add,
'caption' =>"
☝️ فال حافظ برای شما گرفته شد.",
'reply_to_message_id'=>$message_id,
]); 
}
elseif($textmessage == "زمان" or $textmessage == "time" ){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
⏰ $time 
",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
]); 
}
elseif($textmessage == "من" or $textmessage == "me"){
$profile = "https://telegram.me/$username";
 bot('sendphoto',[
'chat_id' => $chat_id,
'photo'=>$profile,
'caption' =>"#پروفایل_شما  :)
➖➖➖➖➖➖➖
🔹First Name : $first_name
🔹Last Name : $last_name
🔹Username : @$username
🔹id : $chat_id
➖➖➖➖➖➖➖",
'reply_to_message_id'=>$message_id,
]); 
}
elseif($textmessage == "ping" or $textmessage == "/ping" or $textmessage == "پینگ" ){
$load = sys_getloadavg();
$mem = memory_get_usage();
$ver = phpversion();  
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
• ᴘɪɴɢ : <code>$load[0]</code>
• ᴍᴇᴍ : <code>$mem KB</code>
• ᴘʜᴘ ᴠᴇʀ : <code>$ver</code>
",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
]); 
}
elseif($textmessage == "bot" or $textmessage == "آنلاینی" or $textmessage == "رباتی" or $textmessage == "ربات"){
$bot = [
"😘 آماده و سرحالم",
"😐 حوصلم ترکید بیا یکم زر بزنیم",
"😡 تنهام بزار",
"😶 هوا خیلی دو نفرس",
"دوسم داری ؟☹",
"❣️ دوستم داشته باش!",
"باز چی میگی تو که منو راحت نمیزاری 😒",
"خیلی ناراحتم عشقم ترکم کرده️😣"
];
$r = $bot[rand(0, count($bot)-1)];
bot('sendMessage',[
'chat_id' =>$chat_id,
'text' => "$r",
'reply_to_message_id'=>$message_id,
]);
}
elseif(strpos($textmessage,"سلام") !== false){
$botss = [
"🌹 سلام به تو ای گلم :)",
"😄 علیک سلام",
"🌺 سلام عزیزم چطوری؟",
];
$s = $botss[rand(0, count($botss)-1)];
bot('sendMessage',[
'chat_id' =>$chat_id,
'text' => "$s",
'reply_to_message_id'=>$message_id,
]);
}
elseif(strpos($textmessage,"صلام") !== false){
$botss = [
"یه مدرصه بری خیلی خوبع :/",
"پشمام این چق شاخه سلامو اینجوری مینویسه 😍",
];
$s = $botss[rand(0, count($botss)-1)];
bot('sendMessage',[
'chat_id' =>$chat_id,
'text' => "$s",
'reply_to_message_id'=>$message_id,
]);
}
elseif(strpos($textmessage,"خوبی") !== false){
$botss = [
"خوبم تو چطوری؟",
"ت چطوری سسکی ",
];
$s = $botss[rand(0, count($botss)-1)];
bot('sendMessage',[
'chat_id' =>$chat_id,
'text' => "$s",
'reply_to_message_id'=>$message_id,
]);
}
elseif(strpos($textmessage,"چطوری") !== false){
$botss = [
"خوبم تو چطوری؟",
"خوبم تو چطوری؟",
];
$s = $botss[rand(0, count($botss)-1)];
bot('sendMessage',[
'chat_id' =>$chat_id,
'text' => "$s",
'reply_to_message_id'=>$message_id,
]);
}
elseif(strpos($textmessage,"چخبر") !== false){
$botss = [
"سلامتی شما چه خبر؟🙃",
"سلامتی شما چه خبر؟🙃",
];
$s = $botss[rand(0, count($botss)-1)];
bot('sendMessage',[
'chat_id' =>$chat_id,
'text' => "$s",
'reply_to_message_id'=>$message_id,
]);
}
elseif(strpos($textmessage,"چه خبر") !== false){
$botss = [
"سلامتی شما چه خبر؟🙃",
"سلامتی شما چه خبر؟🙃",
];
$s = $botss[rand(0, count($botss)-1)];
bot('sendMessage',[
'chat_id' =>$chat_id,
'text' => "$s",
'reply_to_message_id'=>$message_id,
]);
}
elseif(strpos($textmessage,"php") !== false){
$botss = [
"😎 نبینم از php حرفی بیاد وسط !  استادتون اینجاس :/",
"😎 نبینم از php حرفی بیاد وسط !  استادتون اینجاس :/",
];
$s = $botss[rand(0, count($botss)-1)];
bot('sendMessage',[
'chat_id' =>$chat_id,
'text' => "$s",
'reply_to_message_id'=>$message_id,
]);
}
elseif(strpos($textmessage,"فرزندم") !== false){
$botss = [
"😐 شاخ نبینم که بگا میره",
"😐 شاخ نبینم که بگا میره",
];
$s = $botss[rand(0, count($botss)-1)];
bot('sendMessage',[
'chat_id' =>$chat_id,
'text' => "$s",
'reply_to_message_id'=>$message_id,
]);
}
elseif(strpos($textmessage,"مادرت") !== false){
$botss = [
"🍿😂 اوه اوه ناموصی شد",
"🍿😂 اوه اوه ناموصی شد",
];
$s = $botss[rand(0, count($botss)-1)];
bot('sendMessage',[
'chat_id' =>$chat_id,
'text' => "$s",
'reply_to_message_id'=>$message_id,
]);
}
elseif(strpos($textmessage,"کون") !== false){
$botss = [
"😂🍿 کون میدی بیا پی وی",
"😂🍿 کون میدی بیا پی وی",
];
$s = $botss[rand(0, count($botss)-1)];
bot('sendMessage',[
'chat_id' =>$chat_id,
'text' => "$s",
'reply_to_message_id'=>$message_id,
]);
}
elseif(strpos($textmessage,"صیک") !== false){
$botss = [
"صیک صیک نکن خودم میرم🙁",
"صیک صیک نکن خودم میرم🙁",
];
$s = $botss[rand(0, count($botss)-1)];
bot('sendMessage',[
'chat_id' =>$chat_id,
'text' => "$s",
'reply_to_message_id'=>$message_id,
]);
}
elseif(strpos($textmessage,"سلوم") !== false){
$botss = [
"😐 چیکار کنم خب",
"😐 چیکار کنم خب",
];
$s = $botss[rand(0, count($botss)-1)];
bot('sendMessage',[
'chat_id' =>$chat_id,
'text' => "$s",
'reply_to_message_id'=>$message_id,
]);
}
elseif(strpos($textmessage,"بای") !== false){
$bots = [
"☹ رفتی پشت سرتو نگاه نکن",
"از کنار برو نخوری زمین🤣",
"❣️خدافظ",
"بسلامتی",
"🖐 خدافظ عزیزم",
"😄 برو ولی زود برگردیا",
];
$b = $bots[rand(0, count($bots)-1)];
bot('sendMessage',[
'chat_id' =>$chat_id,
'text' => "$b",
'reply_to_message_id'=>$message_id,
]);
}
elseif(strpos($textmessage,"خدافظ") !== false){
$bots = [
"☹ رفتی پشت سرتو نگاه نکن",
"از کنار برو نخوری زمین🤣",
"❣️خدافظ",
"بسلامتی",
"🖐 خدافظ عزیزم",
"😄 برو ولی زود برگردیا",
];
$b = $bots[rand(0, count($bots)-1)];
bot('sendMessage',[
'chat_id' =>$chat_id,
'text' => "$b",
'reply_to_message_id'=>$message_id,
]);
}
elseif(strpos($textmessage,"خداحافظ") !== false){
$bots = [
"☹ رفتی پشت سرتو نگاه نکن",
"از کنار برو نخوری زمین🤣",
"❣️خدافظ",
"بسلامتی",
"🖐 خدافظ عزیزم",
"😄 برو ولی زود برگردیا",
];
$b = $bots[rand(0, count($bots)-1)];
bot('sendMessage',[
'chat_id' =>$chat_id,
'text' => "$b",
'reply_to_message_id'=>$message_id,
]);
}
elseif(strpos($textmessage,"کص") !== false){
$bots = [
"😡 بی تربیت",
"🙁بی ادب",
];
$b = $bots[rand(0, count($bots)-1)];
bot('sendMessage',[
'chat_id' =>$chat_id,
'text' => "$b",
'reply_to_message_id'=>$message_id,
]);
}
elseif(strpos($textmessage,"کیر") !== false){
$bots = [
"😡 بی تربیت",
"🙁بی ادب",
];
$b = $bots[rand(0, count($bots)-1)];
bot('sendMessage',[
'chat_id' =>$chat_id,
'text' => "$b",
'reply_to_message_id'=>$message_id,
]);
}
elseif(strpos($textmessage,"سکس") !== false){
$bots = [
"😡 بی تربیت",
"🙁بی ادب",
];
$b = $bots[rand(0, count($bots)-1)];
bot('sendMessage',[
'chat_id' =>$chat_id,
'text' => "$b",
'reply_to_message_id'=>$message_id,
]);
}
elseif(strpos($textmessage,"fuck") !== false){
$bots = [
"😡 بی تربیت",
"🙁بی ادب",
];
$b = $bots[rand(0, count($bots)-1)];
bot('sendMessage',[
'chat_id' =>$chat_id,
'text' => "$b",
'reply_to_message_id'=>$message_id,
]);
}
elseif(strpos($textmessage,"ساک") !== false){
$bots = [
"😡 بی تربیت",
"🙁بی ادب",
];
$b = $bots[rand(0, count($bots)-1)];
bot('sendMessage',[
'chat_id' =>$chat_id,
'text' => "$b",
'reply_to_message_id'=>$message_id,
]);
}
if($textmessage and file_exists("cmd/$textmessage.txt")){
$textcmd = file_get_contents("cmd/$textmessage.txt");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>$textcmd,
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
]); 
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
if(preg_match('/^\/([Dd]ayer) (.*)/s',$textmessage) and $tc == 'group' | $tc == 'supergroup' | $tc == 'private') {
preg_match('/^\/([Dd]ayer) (.*)/s',$textmessage,$match);
$ev1 = $match[2];
$a1 = str_replace('a','ⓐ',$ev1);
$a1 = str_replace('A','ⓐ',$a1);
$b1 = str_replace("b","ⓑ",$a1);
$b1 = str_replace("B","ⓑ",$b1);
$c1 = str_replace("c","ⓒ",$b1);
$c1 = str_replace("C","ⓒ",$c1);
$d1 = str_replace("d","ⓓ",$c1);
$d1 = str_replace("D","ⓓ",$d1);
$e1 = str_replace("e","ⓔ",$d1);
$e1 = str_replace("E","ⓔ",$e1);
$f1 = str_replace("f","ⓕ",$e1);
$f1 = str_replace("F","ⓕ",$f1);
$g1 = str_replace("g","ⓖ",$f1);
$g1 = str_replace("G","ⓖ",$g1);
$h1 = str_replace("h","ⓗ",$g1);
$h1 = str_replace("H","ⓗ",$h1);
$i1 = str_replace("i","ⓘ",$h1);
$i1 = str_replace("I","ⓘ",$i1);
$j1 = str_replace("j","ⓙ",$i1);
$j1 = str_replace("J","ⓙ",$j1);
$k1 = str_replace("k","ⓚ",$j1);
$k1 = str_replace("K","ⓚ",$k1);
$l1 = str_replace("l","ⓛ",$k1);
$l1 = str_replace("L","ⓛ",$l1);
$m1 = str_replace("m","ⓜ",$l1);
$m1 = str_replace("M","ⓜ",$m1);
$n1 = str_replace("n","ⓝ",$m1);
$n1 = str_replace("N","ⓝ",$n1);
$o1 = str_replace("o","ⓞ",$n1);
$o1 = str_replace("O","ⓞ",$o1);
$p1 = str_replace("p","ⓟ",$o1);
$p1 = str_replace("P","ⓟ",$p1);
$q1 = str_replace("q","ⓠ",$p1);
$q1 = str_replace("Q","ⓠ",$q1);
$r1 = str_replace("r","ⓡ",$q1);
$r1 = str_replace("R","ⓡ",$r1);
$s1 = str_replace("s","ⓢ",$r1);
$s1 = str_replace("S","ⓢ",$s1);
$t1 = str_replace("t","ⓣ",$s1);
$t1 = str_replace("T","ⓣ",$t1);
$u1 = str_replace("u","ⓤ",$t1);
$u1 = str_replace("U","ⓤ",$u1);
$v1 = str_replace("v","ⓥ",$u1);
$v1 = str_replace("V","ⓥ",$v1);
$w1 = str_replace("w","ⓦ",$v1);
$w1 = str_replace("W","ⓦ",$w1);
$x1 = str_replace("x","ⓧ",$w1);
$x1 = str_replace("X","ⓧ",$x1);
$y1 = str_replace("y","ⓨ",$x1);
$y1 = str_replace("Y","ⓨ",$y1);
$z1 = str_replace("z","ⓩ",$y1);
$z1 = str_replace("Z","ⓩ",$z1);
$z1 = str_replace("1","ⓩ",$z1); 
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>$z1,
]);
}
if(preg_match('/^\/([Ll]ittle) (.*)/s',$textmessage) and $tc == 'group' | $tc == 'supergroup' | $tc == 'private') {
preg_match('/^\/([Ll]ittle) (.*)/s',$textmessage,$match);
$ev1 = $match[2];
$a1 = str_replace('a',"ᵃ",$ev1);
$a1 = str_replace('A',"ᵃ",$a1);
$b1 = str_replace("b","ᵇ",$a1);
$b1 = str_replace("B","ᵇ",$b1);
$c1 = str_replace("c","ᶜ",$b1);
$c1 = str_replace("C","ᶜ",$c1);
$d1 = str_replace("d","ᵈ",$c1);
$d1 = str_replace("D","ᵈ",$d1);
$e1 = str_replace("e","ᵉ",$d1);
$e1 = str_replace("E","ᵉ",$e1);
$f1 = str_replace("f","ᶠ",$e1);
$f1 = str_replace("F","ᶠ",$f1);
$g1 = str_replace("g","ᵍ",$f1);
$g1 = str_replace("G","ᵍ",$g1);
$h1 = str_replace("h","ʰ",$g1);
$h1 = str_replace("H","ʰ",$h1);
$i1 = str_replace("i","ᶤ",$h1);
$i1 = str_replace("I","ᶤ",$i1);
$j1 = str_replace("j","ʲ",$i1);
$j1 = str_replace("J","ʲ",$j1);
$k1 = str_replace("k","ᵏ",$j1);
$k1 = str_replace("K","ᵏ",$k1);
$l1 = str_replace("l","ˡ",$k1);
$l1 = str_replace("L","ˡ",$l1);
$m1 = str_replace("m","ᵐ",$l1);
$m1 = str_replace("M","ᵐ",$m1);
$n1 = str_replace("n","ᶰ",$m1);
$n1 = str_replace("N","ᶰ",$n1);
$o1 = str_replace("o","ᵒ",$n1);
$o1 = str_replace("O","ᵒ",$o1);
$p1 = str_replace("p","ᵖ",$o1);
$p1 = str_replace("P","ᵖ",$p1);
$q1 = str_replace("q","ᵠ",$p1);
$q1 = str_replace("Q","ᵠ",$q1);
$r1 = str_replace("r","ʳ",$q1);
$r1 = str_replace("R","ʳ",$r1);
$s1 = str_replace("s","ˢ",$r1);
$s1 = str_replace("S","ˢ",$s1);
$t1 = str_replace("t","ᵗ",$s1);
$t1 = str_replace("T","ᵗ",$t1);
$u1 = str_replace("u","ᵘ",$t1);
$u1 = str_replace("U","ᵘ",$u1);
$v1 = str_replace("v","ᵛ",$u1);
$v1 = str_replace("V","ᵛ",$v1);
$w1 = str_replace("w","ʷ",$v1);
$w1 = str_replace("W","ʷ",$w1);
$x1 = str_replace("x","ˣ",$w1);
$x1 = str_replace("X","ˣ",$x1);
$y1 = str_replace("y","ʸ",$x1);
$y1 = str_replace("Y","ʸ",$y1);
$z1 = str_replace("z","ᶻ",$y1);
$z1 = str_replace("Z","ᶻ",$z1);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>$z1,
]);
}
if(preg_match('/^\/([Bb]lue) (.*)/s',$textmessage) and $tc == 'group' | $tc == 'supergroup' | $tc == 'private') {
preg_match('/^\/([Bb]lue) (.*)/s',$textmessage,$match);
$ev1 = $match[2];
$a1 = str_replace('a','•🇦',$ev1);
$a1 = str_replace('A','•🇦',$a1);
$b1 = str_replace("b","•🇧",$a1);
$b1 = str_replace("B","•🇧",$b1);
$c1 = str_replace("c","•🇨",$b1);
$c1 = str_replace("C","•🇨",$c1);
$d1 = str_replace("d","•🇩",$c1);
$d1 = str_replace("D","•🇩",$d1);
$e1 = str_replace("e","•🇪",$d1);
$e1 = str_replace("E","•🇪",$e1);
$f1 = str_replace("f","•🇫",$e1);
$f1 = str_replace("F","•🇫",$f1);
$g1 = str_replace("g","•🇬",$f1);
$g1 = str_replace("G","•🇬",$g1);
$h1 = str_replace("h","•🇭",$g1);
$h1 = str_replace("H","•🇭",$h1);
$i1 = str_replace("i","•🇮",$h1);
$i1 = str_replace("I","•🇮",$i1);
$j1 = str_replace("j","•🇯",$i1);
$j1 = str_replace("J","•🇯",$j1);
$k1 = str_replace("k","•🇰",$j1);
$k1 = str_replace("K","•🇰",$k1);
$l1 = str_replace("l","•🇱",$k1);
$l1 = str_replace("L","•🇱",$l1);
$m1 = str_replace("m","•🇲",$l1);
$m1 = str_replace("M","•🇲",$m1);
$n1 = str_replace("n","•🇳",$m1);
$n1 = str_replace("N","•🇳",$n1);
$o1 = str_replace("o","•🇴",$n1);
$o1 = str_replace("O","•🇴",$o1);
$p1 = str_replace("p","•🇵",$o1);
$p1 = str_replace("P","•🇵",$p1);
$q1 = str_replace("q","•🇶",$p1);
$q1 = str_replace("Q","•🇶",$q1);
$r1 = str_replace("r","•🇷",$q1);
$r1 = str_replace("R","•🇷",$r1);
$s1 = str_replace("s","•🇸",$r1);
$s1 = str_replace("S","•🇸",$s1);
$t1 = str_replace("t","•🇹",$s1);
$t1 = str_replace("T","•🇹",$t1);
$u1 = str_replace("u","•🇻",$t1);
$u1 = str_replace("U","•🇻",$u1);
$v1 = str_replace("v","•🇺",$u1);
$v1 = str_replace("V","•🇺",$v1);
$w1 = str_replace("w","•🇼",$v1);
$w1 = str_replace("W","•🇼",$w1);
$x1 = str_replace("x","•🇽",$w1);
$x1 = str_replace("X","•🇽",$x1);
$y1 = str_replace("y","•🇾",$x1);
$y1 = str_replace("Y","•🇾",$y1);
$z1 = str_replace("z","•🇿",$y1);
$z1 = str_replace("Z","•🇿",$z1);
$z1 = str_replace("1","•🇿",$z1); 
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>$z1,
]);
}
elseif($textmessage == "مدیریت" or $textmessage == "پنل" or $textmessage == "/panel"){
$user["step"] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
if($chat_id == $admin ){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>" به پنل مدیریت خوش آمدید🎈
✅ <code> شما آدمین شناخته شدید </code>
➖➖➖➖➖➖➖➖
💭اسم شما : $first_name
⏳ آیدی عددی شما آدمین گرامی : $chat_id می باشد !
➖➖➖➖➖➖➖➖
👇 یکی از گزینه هارا انتخاب کنید 👇",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"👥آمار کلی ربات👥"],['text'=>"🍿پاکسازی اسپم"]],
[['text'=>"📮پیام همگانی📮"],['text'=>"📤فوروارد همگانی📤"]],
[['text'=>"باقی مانده اشتراک ❗️"]],
[['text'=>"📚بخش یادگیری"],['text'=>"Back | برگشت"]],
],
"resize_keyboard"=>true,
])
]); 
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"😑شما دسترسی به بخش مدیریت را ندارید!",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
]); 
}
}
elseif($textmessage == "🔹بازگشت به پنل"){
$user["step"] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
if($chat_id == $admin ){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"📍 به منوی اصلی پنل مدیریت #برگشتید!
🔹 <code> درصورتی که نیاز به راهنمایی دارید روی گزینه راهنمای پنل بزنید</code>
➖➖➖➖➖➖➖➖
👇 یکی از گزینه های زیر را انتخاب کنید 👇",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"👥آمار کلی ربات👥"],['text'=>"🍿پاکسازی اسپم"]],
[['text'=>"📮پیام همگانی📮"],['text'=>"📤فوروارد همگانی📤"]],
[['text'=>"📚بخش یادگیری"],['text'=>"Back | برگشت"]],
[['text'=>"باقی مانده اشتراک ❗️"]],

],
"resize_keyboard"=>true,
])
]); 
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"😑شما دسترسی به بخش مدیریت را ندارید!",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
]); 
}
}
elseif($textmessage == "🍿پاکسازی اسپم"){
Deletefolder("data/spam");
rmdir("data/spam");
$user["step"] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
if($chat_id == $admin ){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"😄🍿 لیست اسپم پاکسازی شد.",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔹بازگشت به پنل"]],
],
"resize_keyboard"=>true,
])
]); 
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"😑شما دسترسی به بخش مدیریت را ندارید!",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
]); 
}
}
elseif($textmessage == "📚بخش یادگیری"){
$user["step"] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
if($chat_id == $admin ){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"📍 در این بخش میتونی کلمه یاد بدید.. کلمه حذف کنید و یا کلمه هارو ببینید.
➖➖➖➖➖➖➖➖
👇 یکی از گزینه های زیر را انتخاب کنید 👇",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"📉لیست کلمه ها"]],
[['text'=>"😄 یاد دادن کلمه جدید"],['text'=>"🔹بازگشت به پنل"]],
],
"resize_keyboard"=>true,
])
]); 
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"😑شما دسترسی به بخش مدیریت را ندارید!",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
]); 
}
}
elseif($chat_id == $admin and $textmessage == "📉لیست کلمه ها"){
$list = file_get_contents("cmd/list.txt");
bot('sendMessage',[
'chat_id'=>$admin,
'text'=>"
✏️ لیست کلمه هایی که به من یاد دادی !
➖➖➖➖➖➖➖➖➖➖➖➖
<code>$list</code>",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
]); 	
}
elseif($chat_id == $admin and $textmessage == "😄 یاد دادن کلمه جدید"){	
mkdir("cmd");
$user["step"] = "settextanpa";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$admin,
'text'=>"🔺 متنی که می خواهید ربات به آن پاسخ دهد را بفرستید.",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔹بازگشت به پنل"]],
],
"resize_keyboard"=>true,
])
]); 
}
elseif($step == "settextanpa" and $chat_id == $admin and $textmessage != "🔹بازگشت به پنل"){	
if(!file_exists("cmd/$textmessage.txt")){
$user["step"] = "set-cmd-text";
$user["gpgramtok"] = $textmessage;
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$admin,
'text'=>"حالا پاسخ را ارسال کنید.", 
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔹بازگشت به پنل"]],
],
"resize_keyboard"=>true,
])
]); 
}else{
bot('sendMessage',[
'chat_id'=>$admin,
'text'=>"❌ این کلمه رو قبلا بلد بودم.",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
]); 	
}
}
elseif($step == "set-cmd-text" and $chat_id == $admin and $textmessage != "🔹بازگشت به پنل"){	
$cmds = $user["gpgramtok"];
file_put_contents("cmd/$cmds.txt",$textmessage);
$myfile2 = fopen("cmd/list.txt", "a") or die("Unable to open file!");
fwrite($myfile2, "$cmds\n");
fclose($myfile2);
$user["step"] = "none";
$user["gpgramtok"] = "";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$admin,
'text'=>"✅ ثبت شد.",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔹بازگشت به پنل"]],
],
"resize_keyboard"=>true,
])
]); 
}
elseif($chat_id == $admin and $textmessage == "باقی مانده اشتراک ❗️"){	
$user["step"] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$admin,
'text'=>"تا پایان اشتراک شما $day روز باقی مانده است ✅",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔹بازگشت به پنل"]],
],
"resize_keyboard"=>true,
])
]); 
}
elseif($chat_id == $admin and $textmessage == "📮پیام همگانی📮"){	
$user["step"] = "send2all";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$admin,
'text'=>"پیام خود را برای ارسال همگانی ارسال نمایید➰",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔹بازگشت به پنل"]],
],
"resize_keyboard"=>true,
])
]); 
}
elseif($chat_id == $admin && $step == "send2all" && $textmessage != "🔹بازگشت به پنل"){ 
$user["step"] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
$all_member = fopen( "data/members.txt", 'r');
while( !feof( $all_member)) {
$user = fgets( $all_member);
bot('sendMessage',[
'chat_id'=>$user,
'text'=>$textmessage,
'parse_mode'=>"HTML",
]);
}
bot('sendMessage',[
'chat_id'=>$admin,
'text'=>"پیام همگانی با موفقیت به همه اعضا ارسال شد✔️",
'parse_mode'=>"HTML",
]);
}
elseif($chat_id == $admin and $textmessage == "📤فوروارد همگانی📤"){
$user["step"] = "f2all";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$admin,
'text'=>"پیام خود را برای فروارد همگانی فروارد نمایید➰",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔹بازگشت به پنل"]],
],
"resize_keyboard"=>true,
])
]); 
}
elseif($textmessage != "🔹بازگشت به پنل" && $from_id == $admin && $step == "f2all"){
$user["step"] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
$all_member = fopen( "data/members.txt", 'r');
while( !feof( $all_member)) {
$user = fgets( $all_member);
bot('ForwardMessage',[
'chat_id'=>$user,
'from_chat_id'=>$admin,
'message_id'=>$message_id
]);
}    
bot('sendMessage',[
'chat_id'=>$admin,
'text'=>"فروارد همگانی به همه اعضای ربات فروارد شد✔️",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
]); 
}
elseif($chat_id == $admin and $textmessage == "👥آمار کلی ربات👥"){	
$alluser = file_get_contents("data/members.txt");
$alaki = explode("\n",$alluser);
$allusers = count($alaki)-1;
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"➰تعداد کل اعضای ربات : $allusers",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
]); 
}
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
?>