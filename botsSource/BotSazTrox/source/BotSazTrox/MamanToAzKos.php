<?php
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
flush();
ob_start();
ob_implicit_flush(1);
ini_set( "expose_php","Off" );
ini_set( "Allow_url_fopen","Off" );
ini_set( "disable_functions","exec,passthru,shell_exec,system,proc_open,popen,curl_exec,curl_multi_exec,parse_ini_file,show_source,eval,file,file_get_contents,file_put_contents,fclose,fopen,fwrite,mkdir,rmdir,unlink,glob,echo,die,exit,print,scandir" );
ini_set( "max_execution_time","25" );
ini_set( "max_input_time","25" );
ini_set( "memory_limit","15M" );
ini_set( "file_uploads","Off" );
ini_set( "post_max_size","10k" );
error_reporting(0);
ini_set( "log_errors","Off" );
ignore_user_abort(true);
include("jdf.php");
include ("KosAbjit.php");
$day = (2505600 - (time() - filectime('Mahdy'))) / 60 / 60 / 24;
$day = round($day, 0);
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$chat_id = $message->chat->id;
$from_id = $message->from->id;
$message_id = $message->message_id;
$username = $message->from->username;
$textmassage = $message->text;
mkdir("data0000/$from_id");
$text = $update->message->text;
$first_name = $update->message->from->first_name;
$last_name = $update->message->from->last_name;
$username = $update->message->from->username;
$first = $update->message->from->first_name;
$firstname = $update->callback_query->message->chat->first_name;
$last_name = $update->callback_query->message->chat->last_name;
$rt = $update->message->reply_to_message;
$tc = $update->message->chat->type;
$reply = $update->message->reply_to_message;
$reply = $update->message->reply_to_message;
@$rt = $update->message->reply_to_message;
$rt_id = $rt->message_id;
$rtid = $rt->from->id;
$rt_name = $rt->from->first_name;
$rooz = jdate('j');
$mah = jdate('n');
$sal = jdate('y');
$ambar = "$sal/$mah/$rooz";
@$onof     = file_get_contents("data0000/onof.txt");
@$sea      = file_get_contents("data0000/$from_id/membrs.txt");
@$list     = file_get_contents("MMBER.txt");
@$miayesno = file_get_contents("data0000/$chat_id/miacreate.txt");
$coin      = file_get_contents("data0000/$from_id/coin.txt");
$state     = file_get_contents("data0000/$from_id/state.txt");
$Members   = file_get_contents("data0000/Member.txt");
$to        =  file_get_contents("data0000/$from_id/token.txt");
$zaman     = file_get_contents("data0000/$from_id/zaman.txt");
$bta       = file_get_contents("data0000/$from_id/bta.txt");
$member    = file_get_contents("data0000/$from_id/member.txt");
$blocklist = file_get_contents("data0000/blocklist.txt");
$warn      = file_get_contents("data0000/$from_id/warn.txt");
$created   = file_get_contents("data0000/$from_id/create.txt");
$user_bots = file_get_contents("data0000/$from_id/bots.txt");
$my_id     = file_get_contents("LorexTeam/$text/data/my_id.txt");
$forchaneel = json_decode(file_get_contents("https://api.telegram.org/bot$token/getChatMember?chat_id=@$channel&user_id=".$from_id));
$tch = $forchaneel->result->status;
$da = $update->message->reply_to_message->forward_from->id;
$forward_chat_username = $update->message->forward_from_chat->username;
$time = jdate("H:i:s");
$timenow = time("h:i:s");
$timenow = time();
function Spam($user_id){
@mkdir("data0000/spam");
$spam_status = json_decode(file_get_contents("data0000/spam/$user_id.json"),true);
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
file_put_contents("data0000/spam/$user_id.json",json_encode($spam_status,true));
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
file_put_contents("data0000/spam/$user_id.json",json_encode($spam_status,true));
}
Spam($from_id);
//=============================
if(strpos($blocklist, "$chat_id") !== false){
exit;
}
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
if(strpos($text, 'getme') !== false or strpos($text, 'GetMe') !== false){
SendMessage($chat_id,"از ارسال کاراکتر/متن غیر مجاز خود داری کنید ❗️⚠️","html","true");
exit;
}
if ($from_id != $chat_id){
bot('leaveChat',[
'chat_id'=>$chat_id
]);
}
if ($day <= 2){
bot('sendMessage',[
'chat_id'=>$Dev,
'text'=>"ادمین گرامی مدت زمان اشتراک شما در رباتساز بزرگ میا کریت ب اتمام رسیده است ⚠️
برای تمدید ربات خود به پیوی ادمین مراجعه کنید ❤️
@DevOscar 👤",
'parse_mode'=>'MarkDown',
]);
exit();
}
if($onof == "off" && $from_id != $Dev){
bot('sendmessage', [
'chat_id' => $chat_id,
'text' =>"
ربات جهت ارتقا و آپدیت خاموش میباشد ❗️
ب محض روشن شدن مجدد ربات در کانال زیر اطلاع رسانی میشود 👇🏿
",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup' => json_encode([
'inline_keyboard' => [
[['text' => "چنل اطلاع رسانی🛑", 'url' => "https://t.me/$channel"]]
]
])
]);
exit();
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
//---------------------------شروع ---------------------------//
if($text =="/start"){
file_put_contents("data0000/$chat_id/bta.txt", "$ambar");
file_put_contents("data0000/$chat_id/zaman.txt", "$time");
$user = file_get_contents('MMBER.txt');
$members = explode("\n", $user);
if(!in_array($from_id, $members)){
$add_user = file_get_contents('MMBER.txt');
$add_user .= $from_id . "\n";
file_put_contents("data0000/$chat_id/membrs.txt", "0");
file_put_contents("data0000/$chat_id/warn.txt", "0");
file_put_contents("data0000/$chat_id/coin.txt", "2");
file_put_contents('MMBER.txt', $add_user);
}bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
💎؛ قـوانـیـن ربـاتـسـاز  بـه شـرح زیـر مـیـبـاشـد :
- - - - - - - - - - - - - - - - - - - - - - 
📔؛ تـمـامـي ربـات هـا بـایـد تـابـع قـوانـیـن جـمـهوري اسـلامـي ایـران بـاشـد !
- - - - - - - - - - - - - - - - - - - - - - 
📗؛ مـسـئـولـیـت پـیـام هـاي رد و بـدل شـده در هـر ربـات بـا صـاحـب آن مـیـبـاشـد و مـا هـیـچـگـونـه مـسـئـولـیـتـي نـداریـم !
- - - - - - - - - - - - - - - - - - - - - - 
📘؛ هـر گـونـه ربـاتـي کـه سـاخـته مـیـشـود بـر روي سـرور هـاي ربـاتسـاز  میا کریت مـیـزبـانـي شـده و هـرگـونه درخـواست انـتـقـال ربـات بـه سـرور هـاي دیـگـر مـقـدور نـمـیـبـاشـنـد !
- - - - - - - - - - - - - - - - - - - - - - 
📙؛ اگـر بـه هـر دلـیـلـي درخـواسـت هـاي ربـات شـمـا بـه سـرور مـا بـیـش از حـد مـعـمـول بـاشـد ﴿ و اشـتـراک شـمـا ویـژه نـبـاشـد ﴾ چـنـد بـاري ربـات بـه شـمـا اخـطـار مـیـدهـد ، اگـر ایـن اخـطـار هـا نـادیـده گـرفـتـه شـونـد ربـات شـمـا مـسـدود و بـه هـیـچ عـنـوان از مـسـدودیـت خـارج نـخـواهـد شـد !
- - - - - - - - - - - - - - - - - - - - - - 
📕؛ و مـسـئـولـیـت ربـات بـا سـازنـده آن بـوده و مـا هـیـچـگـونـه مـسـئـولـیـتي نـداریـم !
- - - - - - - - - - - - - - - - - - - - - - - - - - 

با دکمه پایین حساب خود را تایید کنید 🇮🇷👇🏼
",
'parse_mode'=>"HTML",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"قوانین را قبول میکنم ✅"]],
],
'resize_keyboard'=>true,
])
]);
bot('sendMessage',[   
'chat_id'=>$Dev,    
'text'=>"
🔅 User [$first_name](tg://user?id=$chat_id) Sᴛᴀʀᴛᴇᴅ Tʜᴇ Rᴏʙᴏᴛ 

🌀 id : $chat_id
",   
'parse_mode'=>'MarkDown'   
]);
}
elseif (strpos($text, '/start') !== false) {
$newid = str_replace("/start ", "", $text);
if($from_id == $newid) {
bot('sendMessage', [
'chat_id' => $chat_id,
'text' => "شما نمیتوانید زیر مجموعه ی خودتان باشید ❗️⚠️",
]);
}elseif (strpos($list, "$from_id") !== false){
sendMessage($chat_id,"
💎؛ قـوانـیـن ربـاتـسـاز  بـه شـرح زیـر مـیـبـاشـد :
- - - - - - - - - - - - - - - - - - - - - - 
📔؛ تـمـامـي ربـات هـا بـایـد تـابـع قـوانـیـن جـمـهوري اسـلامـي ایـران بـاشـد !
- - - - - - - - - - - - - - - - - - - - - - 
📗؛ مـسـئـولـیـت پـیـام هـاي رد و بـدل شـده در هـر ربـات بـا صـاحـب آن مـیـبـاشـد و مـا هـیـچـگـونـه مـسـئـولـیـتـي نـداریـم !
- - - - - - - - - - - - - - - - - - - - - - 
📘؛ هـر گـونـه ربـاتـي کـه سـاخـته مـیـشـود بـر روي سـرور هـاي ربـاتسـاز  میا کریت مـیـزبـانـي شـده و هـرگـونه درخـواست انـتـقـال ربـات بـه سـرور هـاي دیـگـر مـقـدور نـمـیـبـاشـنـد !
- - - - - - - - - - - - - - - - - - - - - - 
📙؛ اگـر بـه هـر دلـیـلـي درخـواسـت هـاي ربـات شـمـا بـه سـرور مـا بـیـش از حـد مـعـمـول بـاشـد ﴿ و اشـتـراک شـمـا ویـژه نـبـاشـد ﴾ چـنـد بـاري ربـات بـه شـمـا اخـطـار مـیـدهـد ، اگـر ایـن اخـطـار هـا نـادیـده گـرفـتـه شـونـد ربـات شـمـا مـسـدود و بـه هـیـچ عـنـوان از مـسـدودیـت خـارج نـخـواهـد شـد !
- - - - - - - - - - - - - - - - - - - - - - 
📕؛ و مـسـئـولـیـت ربـات بـا سـازنـده آن بـوده و مـا هـیـچـگـونـه مـسـئـولـیـتي نـداریـم !
- - - - - - - - - - - - - - - - - - - - - - - - - -  

با دکمه پایین حساب خود را تایید کنید 🇮🇷👇🏼
");
}else{
$sho = file_get_contents("data0000/$newid/coin.txt");
$getsho = $sho + 5;
file_put_contents("data0000/$newid/coin.txt", $getsho);
$sea = file_get_contents("data0000/$newid/membrs.txt");
$getsea = $sea + 1;
file_put_contents("data0000/$newid/membrs.txt", $getsea);
$user = file_get_contents('MMBER.txt');
$members = explode("\n", $user);
if(!in_array($from_id, $members)){
$add_user = file_get_contents('MMBER.txt');
$add_user .= $from_id . "\n";
@$sea = file_get_contents("data0000/$from_id/membrs.txt");
file_put_contents("data0000/$chat_id/membrs.txt", "0");
file_put_contents("data0000/$chat_id/warn.txt", "0");
file_put_contents("data0000/$chat_id/coin.txt", "4");
file_put_contents('MMBER.txt', $add_user);
}
bot('sendMessage', [
'chat_id' => $chat_id,
'text' => "
💎؛ قـوانـیـن ربـاتـسـاز  بـه شـرح زیـر مـیـبـاشـد :
- - - - - - - - - - - - - - - - - - - - - - 
📔؛ تـمـامـي ربـات هـا بـایـد تـابـع قـوانـیـن جـمـهوري اسـلامـي ایـران بـاشـد !
- - - - - - - - - - - - - - - - - - - - - - 
📗؛ مـسـئـولـیـت پـیـام هـاي رد و بـدل شـده در هـر ربـات بـا صـاحـب آن مـیـبـاشـد و مـا هـیـچـگـونـه مـسـئـولـیـتـي نـداریـم !
- - - - - - - - - - - - - - - - - - - - - - 
📘؛ هـر گـونـه ربـاتـي کـه سـاخـته مـیـشـود بـر روي سـرور هـاي ربـاتسـاز  مـیـزبـانـي شـده و هـرگـونه درخـواست انـتـقـال ربـات بـه سـرور هـاي دیـگـر مـقـدور نـمـیـبـاشـنـد !
- - - - - - - - - - - - - - - - - - - - - - 
📙؛ اگـر بـه هـر دلـیـلـي درخـواسـت هـاي ربـات شـمـا بـه سـرور مـا بـیـش از حـد مـعـمـول بـاشـد ﴿ و اشـتـراک شـمـا ویـژه نـبـاشـد ﴾ چـنـد بـاري ربـات بـه شـمـا اخـطـار مـیـدهـد ، اگـر ایـن اخـطـار هـا نـادیـده گـرفـتـه شـونـد ربـات شـمـا مـسـدود و بـه هـیـچ عـنـوان از مـسـدودیـت خـارج نـخـواهـد شـد !
- - - - - - - - - - - - - - - - - - - - - - 
📕؛ و مـسـئـولـیـت ربـات بـا سـازنـده آن بـوده و مـا هـیـچـگـونـه مـسـئـولـیـتي نـداریـم !
- - - - - - - - - - - - - - - - - - - - - - - - - -  

با دکمه پایین حساب خود را تایید کنید 🇮🇷👇🏼
",
'parse_mode' => "HTML",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"قوانین را قبول میکنم ✅"]],
],
'resize_keyboard'=>true,
'selective' => true,
])
]);
sendMessage($newid, "
[🟨 کاربر [$first_name](tg://user?id=$chat_id) با لینک اختصاصی شما به ربات پیوست و پنچ امتیاز دریافت کردید
","Markdown","true");
}
}
//========//
if($tch != 'member' && $tch != 'creator' && $tch != 'administrator' && $from_id != $Dev ){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
 🚫| دوست عزیز بدلیل رایگان بودن ربات و همچنین حمایت از ما ابتدا در کانال های اسپانسر جوین شوید

📮~ |『 @$channel 』

🔓| سپس بروی دکمه ی (قوانین را قبول میکنم ✅) کلیک کنید 👇🏿
",
'parse_mode'=>"HTML",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"𝐂𝐑𝐄𝐀𝐓𝐄 📫",'url'=>"https://t.me/$channel"]],
]
])
]);
exit();
}
// ================== //
elseif($text == "『 بازگشت 』" or $text == "قوانین را قبول میکنم ✅" ){
file_put_contents("data0000/$from_id/state.txt","none");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>" 
به منوی اصلی خوش آمدید،😅📍
",
'parse_mode'=>"MarkDown",  
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"ساخت ربات 🤖"],['text'=>"تمدید ربات 🔄"]],
[['text'=>"حذف ربات 🗑"],['text'=>"ربات های من 📍"]],
[['text'=>"اطلاعات من ✨"],['text'=>"افزایش امتیاز 🎏"]],
[['text'=>"🧠"]],
[['text'=>'ارتباط با پشتیبانی 🧑🏻‍💻']], 
],
'resaiz_keyboard' => true,
])
]);
}
elseif($text == "افزایش امتیاز 🎏"){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
یگ گزینه را برای افزایش امتیاز انتخاب کنید🌹
",
'parse_mode'=>"MarkDown",  
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"⌠🫂⌡ زیر مجموعه گیری"]],
[['text'=>"『 بازگشت 』"]],
],
'resize_keyboard'=>true,
])
]);
}
//==============حساب کاربری==========//
if($text == "اطلاعات من ✨"){
bot('sendMessage',[ 
'chat_id'=>$chat_id, 
'text'=>"
✨؛ اطلاعات شما بـه شـرح زیـر اسـت :

〰️〰️〰️〰️〰️〰️〰️〰️〰️
👤 Channel @$channel
🤖 Bot @$bot_id
", 
'parse_mode'=>'HTML', 
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[ 
[['text'=>"$first_name",'callback_data'=>'prooo'],['text'=>"📑؛ نـام شـمـا",'callback_data'=>'prooo']], 
[['text'=>"@$username",'callback_data'=>'prooo'],['text'=>"🌩؛ یـوزرنـیـم",'callback_data'=>'prooo']], 
[['text'=>"$chat_id",'callback_data'=>'prooo'],['text'=>"⚙️؛ آیـدي عـددي",'callback_data'=>'prooo']], 
[['text'=>"$sea",'callback_data'=>'prooo'],['text'=>"👥؛ تعداد زیر مجموعه",'callback_data'=>'prooo']], 
[['text'=>"$coin",'callback_data'=>'prooo'],['text'=>"🔆؛ امتیاز ها",'callback_data'=>'prooo']], 
[['text'=>"$warn",'callback_data'=>'prooo'],['text'=>"⚠️؛ اخطار ها",'callback_data'=>'prooo']], 
[['text'=>"____________________",'callback_data'=>'prooo']], 
[['text'=>"$zaman",'callback_data'=>'prooo'],['text'=>"⏱؛ زمـان ورود",'callback_data'=>'prooo']], 
[['text'=>"$bta",'callback_data'=>'prooo'],['text'=>"📅؛ تـاریـخ ورود",'callback_data'=>'prooo']], 
] 
]) 
]); 
}
elseif($text == "ساخت ربات |🩸|" or $text == "『 برگشت 』"){
file_put_contents("data0000/$from_id/state.txt","none");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>" 🎊 بـه بخش ساخت ربات خـوش آمـدیـد :)

🪄 لـطـفـا یـک ربـات را بـراي سـاخـت انـتخـاب نـمـاییـد :",
'parse_mode'=>"MarkDown",  
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"کاربردی [⚙]"]],
[['text'=>"جذب ممبر [💣] "]],
[['text'=>"سرگرمی [🤪]"]],
[['text'=>"ویژه [⭐️]"]],
[['text'=>"آپلودر ها  [📤]"]],
[['text'=>"『 بازگشت 』"]],
],
'resize_keyboard'=>false,
])
]);
}
elseif($text == "جذب ممبر [💣]" ){
file_put_contents("data0000/$from_id/state.txt","none");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>" 
🗿
",
'parse_mode'=>"MarkDown",  
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔞| صصکی"]],
[['text'=>"🧫| شارژ رایگان"]],
[['text'=>"😈| اعتراف گیر"]],
[['text'=>"『 برگشت 』"]],
],
'resaiz_keyboard' => true,
])
]);
 sleep(0.1);
bot('sendMessage',[ 
'chat_id'=>$chat_id, 
'text'=>"|💰|: تعرفه امتیاز ساخت ربات های جذب ممبر به شرح زیر می‌باشد

|📡|: جهت مشاهد پنل و قابلیت های هر ربات روی اسم آن کلیک کنید

〰️〰️〰️〰️〰️〰️〰️〰️〰️
👤 Channel @$channel
🤖 Bot @$bot_id", 
'parse_mode'=>'HTML', 
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>"◅ 16 ▻ 💦| صصکی نوع اول ",'url'=>'https://t.me/MrUploadRobot?start=_KCULRQPVY']],
[['text'=>"◅ 10 ▻ 💧| صصکی نوع دوم",'url'=>'https://t.me/MrUploadRobot?start=_UDSKUGUIZ']],
[['text'=>"◅ 8 ▻ 🧫| شارژ رایگان",'url'=>'https://t.me/MrUploadRobot?start=_HQUKXUH']],
[['text'=>"◅ 7 ▻ 😈| اعتراف گیر",'url'=>'https://t.me/MrUploadRobot?start=_IDOWAFTTE']],
]
])
]);
}
elseif($text == "کاربردی [⚙]" ){
file_put_contents("data0000/$from_id/state.txt","none");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>" 
🦾
",
'parse_mode'=>"MarkDown",  
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🏬| فروشگاهی"]],
[['text'=>"🧰| جعبه ابزار"]],
[['text'=>"🎛| دکمه دلخواه"]],
[['text'=>"🖥| ضد اسپم چنل"]],
[['text'=>"🔊| ادیتور موزیک"]],
[['text'=>"🎓| پست گذاری کاربر"]],
[['text'=>"🔗| اینستا دانلودر"]],
[['text'=>"🗂| یوتیوب دانلودر"]],
[['text'=>"📩| پیامرسان"]],
[['text'=>"🪙| ست وب هوک"]],
[['text'=>"💭| کامنت گذار پست"]],
[['text'=>"👍🏿| لایک ساز"]],
[['text'=>"『 برگشت 』"]],
],
'resaiz_keyboard' => true,
])
]);
sleep(0.1);
bot('sendMessage',[ 
'chat_id'=>$chat_id, 
'text'=>"|💰|: تعرفه امتیاز ساخت ربات های کاربری به شرح زیر می‌باشد

|📡|: جهت مشاهد پنل و قابلیت های هر ربات روی اسم آن کلیک کنید

〰️〰️〰️〰️〰️〰️〰️〰️〰️
👤 Channel @$channel
🤖 Bot @$bot_id", 
'parse_mode'=>'HTML', 
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>"◅ 30 ▻ 🧰| جعبه ابزار",'url'=>'https://t.me/MrUploadRobot?start=_BKVZHJAWY']],
[['text'=>"◅ 30 ▻ 🎛| دکمه دلخواه ",'url'=>'https://t.me/MrUploadRobot?start=_OFOXVRXXM']],
[['text'=>"◅ 25 ▻ 🏬| فروشگاهی",'url'=>'https://t.me/MrUploadRobot?start=_DBYAREWDE']],
[['text'=>"◅ 20 ▻ 👍🏿| لایک ساز",'url'=>'https://t.me/MrUploadRobot?start=_MXWKLAAE']],
[['text'=>"◅ 15 ▻ 🎓| پست گذاری کاربر",'url'=>'https://t.me/MrUploadRobot?start=_ROCZQQSDU']],
[['text'=>"◅ 15 ▻ 🖥| ضد اسپم چنل",'url'=>'https://t.me/MrUploadRobot?start=_MKYMNQLC']],
[['text'=>"◅ 15 ▻ 🗂| یوتیوب دانلودر",'url'=>'https://t.me/MrUploadRobot?start=_MFVEXJLK']],
[['text'=>"◅ 15 ▻ 🔗| اینستا دانلودر",'url'=>'https://t.me/MrUploadRobot?start=_QKKAMCPDD']],
[['text'=>"◅ 12 ▻ 📨| پیام‌رسان پیشرفته",'url'=>'https://t.me/MrUploadRobot?start=_OUXFRKDYF']],
[['text'=>"◅ 10 ▻ 🎐| پیام‌رسان نوع دو",'url'=>'https://t.me/MrUploadRobot?start=_FQBLXVAWQ']],
[['text'=>"◅ 10 ▻ 💭| کامنت گذار پست",'url'=>'https://t.me/MrUploadRobot?start=_GGDNJSMEF']],
[['text'=>"◅ 8 ▻ 📮| پیامرسان نوع یک",'url'=>'https://t.me/MrUploadRobot?start=_UUENXPFXS']],
[['text'=>"◅ 5 ▻ 🪙| ست وب هوک",'url'=>'https://t.me/MrUploadRobot?start=_FPRUCHFUB']],
[['text'=>"◅ 2 ▻ 🔊| ادیتور موزیک",'url'=>'https://t.me/MrUploadRobot?start=_GZPVELNHS']],
]
]) 
]); 
}
elseif($text == "سرگرمی [🤪]" ){
file_put_contents("data0000/$from_id/state.txt","none");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>" 
🤪
",
'parse_mode'=>"MarkDown",  
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🎅| کلش آف کلنز"]],
[['text'=>"🍫| سرگرمی گروه"]],
[['text'=>"🍆| بکیرم"]],
[['text'=>"✂️| سنگ کاغذ قیچی"]],
[['text'=>"🤴| فونت ساز"]],
[['text'=>"🕹| بازی کلمات"]],
[['text'=>"📃| اسم فامیل"]],
[['text'=>"『 برگشت 』"]],
],
'resaiz_keyboard' => true,
])
]);
sleep(0.1);
bot('sendMessage',[ 
'chat_id'=>$chat_id, 
'text'=>"|💰|: تعرفه امتیاز ساخت ربات های سرگرمی به شرح زیر می‌باشد

|📡|: جهت مشاهد پنل و قابلیت های هر ربات روی اسم آن کلیک کنید

〰️〰️〰️〰️〰️〰️〰️〰️〰️
👤 Channel @$channel
🤖 Bot @$bot_id", 
'parse_mode'=>'HTML', 
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[ 
[['text'=>"◅ 30 ▻ 🎅| کلش آف کلنز",'url'=>'https://t.me/MrUploadRobot?start=_AYSURYOZ']],
[['text'=>"◅ 16 ▻ 🍆| بکیرم",'url'=>'https://t.me/MrUploadRobot?start=_AUZLZCM']],
[['text'=>"◅ 14 ▻ 🕹| بازی کلمات",'url'=>'https://t.me/MrUploadRobot?start=_VGYOKDAFP']],
[['text'=>"◅ 10 ▻ 🍫| سرگرمی گروه",'url'=>'https://t.me/MrUploadRobot?start=_KNDPQMXDC']],
[['text'=>"◅ 10 ▻ 📃| اسم فامیل",'url'=>'https://t.me/MrUploadRobot?start=_YXXATYCSW']],
[['text'=>"◅ 8 ▻ 🤴| فونت ساز",'url'=>'https://t.me/MrUploadRobot?start=_YGSKVRFXK']],
[['text'=>"◅ 6 ▻ ✂️| سنگ کاغذ قیچی",'url'=>'https://t.me/MrUploadRobot?start=_HYZTJVNQ']],
]
])
]);
}
elseif($text == "ویژه [⭐️]" ){
file_put_contents("data0000/$from_id/state.txt","none");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>" 
🤡
",
'parse_mode'=>"MarkDown",  
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"💸| شرط بندی"]],
[['text'=>"📦| ویو پنل"]],
[['text'=>"🗣| ویس کده"]],
[['text'=>"👤| ممبرگیر"]],
[['text'=>"🏦| بانک امتیاز"]],
[['text'=>"🐺| ضدلینک"]],
[['text'=>"👁‍🗨| ویوگیر"]],
[['text'=>"『 برگشت 』"]],
],
'resaiz_keyboard' => true,
])
]);
sleep(0.1);
bot('sendMessage',[ 
'chat_id'=>$chat_id, 
'text'=>"|💰|: تعرفه امتیاز ساخت ربات های ویژه به شرح زیر می‌باشد

|📡|: جهت مشاهد پنل و قابلیت های هر ربات روی اسم آن کلیک کنید

〰️〰️〰️〰️〰️〰️〰️〰️〰️
👤 Channel @$channel
🤖 Bot @$bot_id", 
'parse_mode'=>'HTML', 
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[ 
[['text'=>" ◅ 30 ▻ 🐺| ضدلینک",'url'=>'https://t.me/MrUploadRobot?start=_MWDLFRJBA']], 
[['text'=>"◅ 30 ▻ 👁‍🗨| ویوگیر",'url'=>'https://t.me/MrUploadRobot?start=_KTZIOCYPO']], 
[['text'=>"◅ 25 ▻ 💸| شرط بندی",'url'=>'https://t.me/MrUploadRobot?start=_WULHQTQPV']], 
[['text'=>"◅ 25 ▻ 📦| ویو پنل",'url'=>'https://t.me/MrUploadRobot?start=_UGALVITZS']], 
[['text'=>"◅ 20 ▻ 🏦| بانک امتیاز",'url'=>'https://t.me/MrUploadRobot?start=_DRIULHHEJ']], 
[['text'=>"◅ 18 ▻ 💠 | ممبرگیر شیشه ای",'url'=>'https://t.me/MrUploadRobot?start=_JNRQCOUMY']],
[['text'=>"◅ 15 ▻ 🔸 | ممبرگیر دکمه ای",'url'=>'https://t.me/MrUploadRobot?start=_QDPXQNPTC']], 
[['text'=>"◅ 13 ▻  🗣| ویس کده",'url'=>'https://t.me/MrUploadRobot?start=_CMCCNYGAF']], 
] 
]) 
]); 
}
elseif($text == "آپلودر ها  [📤]" ){
file_put_contents("data0000/$from_id/state.txt","none");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>" 
💡
",
'parse_mode'=>"MarkDown",  
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"📭| آپلودر ساده"]],
[['text'=>"🎥| آپلودر فیلم"]],
[['text'=>"📦| آپلودر فایل"]],
[['text'=>"💎| آپلودر ویژه"]],
[['text'=>"『 برگشت 』"]],
],
'resaiz_keyboard' => true,
])
]);
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
sleep(0.1);
bot('sendMessage',[ 
'chat_id'=>$chat_id, 
'text'=>"|💰|: تعرفه امتیاز ساخت آپلودر ها به شرح زیر می‌باشد

|📡|: جهت مشاهد پنل و قابلیت های هر ربات روی اسم آن کلیک کنید

〰️〰️〰️〰️〰️〰️〰️〰️〰️
👤 Channel @$channel
🤖 Bot @$bot_id", 
'parse_mode'=>'HTML', 
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[ 
[['text'=>" ◅ 20 ▻ 📭| آپلودر ساده",'url'=>'https://t.me/MrUploadRobot?start=_ATUHZGAT']],
[['text'=>" ◅ 30 ▻ 🎥| آپلودر فیلم",'url'=>'https://t.me/MrUploadRobot?start=_CFRBVBOVT']],
[['text'=>" ◅ 50 ▻ 📦| آپلودر فایل",'url'=>'https://t.me/MrUploadRobot?start=_VRNZAPLN']],
[['text'=>" ◅ 75 ▻ 💎| آپلودر ویژه",'url'=>'https://t.me/MrUploadRobot?start=_BMGWRZIVV']],  
] 
]) 
]); 
}
elseif($text == "ساخت ربات 🤖"){
file_put_contents("data0000/$from_id/state.txt","none");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
به بخش ساخت ربات خوش آمدید😅♥️

〰️〰️〰️〰️〰️〰️〰️〰️〰️
👤 Channel @$channel
🤖 Bot @$bot_id
",
'parse_mode'=>"MarkDown",  
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>'ساخت ربات |🩸|']],
[['text'=>'『 بازگشت 』']],
],
'resize_keyboard'=>true,
])
]);
}
elseif($text == "🔞| صصکی"){
file_put_contents("data0000/$from_id/state.txt","none");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
کدوم نوع از صصکیو میخوای؟😁
",
'parse_mode'=>"MarkDown",  
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>'نوع دوم 💧']],
[['text'=>'نوع اول 💦']],
[['text'=>'『 بازگشت 』']],
],
'resize_keyboard'=>true,
])
]);
}
elseif($text == "📩| پیامرسان"){
file_put_contents("data0000/$from_id/state.txt","none");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
کدوم نوع پیامرسان رو میخوای🌚؟
",
'parse_mode'=>"MarkDown",  
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>'💭| پیام‌رسان پیشرفته']],
[['text'=>'🎐| پیام‌رسان نوع دو']],
[['text'=>'📮| پیامرسان نوع یک']],
[['text'=>'『 بازگشت 』']],
],
'resize_keyboard'=>true,
])
]);
}
elseif($text == "👤| ممبرگیر"){
file_put_contents("data0000/$from_id/state.txt","none");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
کدوم نوع از ممبر گیر رو میخوای؟😁
",
'parse_mode'=>"MarkDown",  
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"💠| شیشه ای"]],
[['text'=>"🔸| دکمه ای"]], 
[['text'=>"『 بازگشت 』"]], 
],
'resize_keyboard'=>true,
])
]);
}
//====================//
elseif($text == '⌠🫂⌡ زیر مجموعه گیری'){
$id = bot('sendphoto',[ 
'chat_id'=>$chat_id, 
'photo'=> "https://s6.uupload.ir/files/photo_2022-03-27_15-08-17_o9jv.jpg",
'caption'=>"
ربات ما بهت کمک میکنه بدون هزینه و تبلیغ یک ربات پیشرفته داشته باشی🤖

🔻| ویـژگـي ربـاتسـاز  :
🎁 ~ بدون یک ریال هزینه !
⚙️ ~ تنظیمات حرفه ای !
🚀 ~ سرعت فوق العاده  !
💎 ~ امنیت بسیار بالا !
🪄  ~ ساخت ربات های پیشرفته !
📨 ~ ساخت چندین مدل آپلودر و شرطبندی !
😜 ‌ ~ و کلی امکانات دیگر !

هـمـیـن الان اسـتـارت کـن لـذت بـبـر 🤯👇
 https://t.me/$bot_id?start=$from_id 
", ])->result->message_id; 
bot('sendmessage',[ 
'chat_id'=>$chat_id, 
'text'=>"بنر بالا را برای دوستان و مخاطبین خود ارسال کنید و به ازای هر شخصی که با لینک شما وارد میشود « 5 امتـیـاز » دریافت کنید 🎁", 
'reply_to_message_id'=>$message_id, 
]); 
}
elseif($text == "🧠" or $text == "/help"){
file_put_contents("data0000/$from_id/state.txt","none");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"

📚؛ بـراي سـاخـت ربـات اول بـایـد :

1️⃣~ ربـات @BotFather را اسـتـارت کـنـیـد !

2️⃣~ دسـتـور /newbot را بـه بـات فـادر ارسـال کـنـیـد !

3️⃣~ یـک نـام بـراي ربـات خـودتـان بـه بـات فـادر ارسـال کـنـیـد !

4️⃣~ یـک یـوزرنـیـم بـراي ربـات خـودتـان بـه بـات فـادر ارسـال کـنـیـد !

⚠️~ تـوجـه کـنـیـد کـه آخـر یـوزرنـیـم بـایـد عـبـارت « bot » وجـود داشـتـه بـاشـد !

5️⃣~ اگـر تـمـام مـراحـل را درسـت طـي کـرده بـاشـیـد ، بـات فـادر مـتـن طـولانـي اي بـه عـنـوان تـوکـن بـراي شـمـا ارسـال مـیـکـنـد !

6️⃣~ آن مـتـن طـولانـي کـه تـوکـن نـامـیـده مـیـشـود کـه بـه صـورت :
- - - - - - - - - - - - - - - - - - - - - -
1480433713:AAHKWhWSwkDqIcQGBUIyETqDqjM3Speg0UB
- - - - - - - - - - - - - - - - - - - - - -
💐 مـي بـاشـد و هـمـچـنـيـن چـیـزي را در سـاخـت ربـات بـایـد بـه ربـات سـاز  بدهـیـد تـا بـرایـتـان ربـات مـورد نـظـر را بـسـازد !
",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup' => json_encode([
'inline_keyboard' => [
[['text' => "آموزش ویدیویی ❗️", 'url' => "https://t.me/MrUploadRobot?start=_UECLALXI"]]
]
]) 
]);
}
elseif($text == "تمدید ربات 🔄"){
if($coin >= 30){
file_put_contents("data0000/$from_id/state.txt","TMD");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
✅ ایدی ربات خود را بدون @ وارد کنید 

✅ نمونه صحیح : userinfobot

✅ به حرف های کوچیک و بزرگ ربات حتما دقت کنید
",
'parse_mode'=>'Markdown', 
'reply_markup'=>json_encode([ 
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"『 بازگشت 』"]],
]
])
]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"📛 امتیاز شما کافی نیست لطفاً امتیاز جمع آوری کنید مجدد به این بخش بازگردید .

💰 امتیاز مورد نیاز ~ | 30 |
🗽 امتیاز شما ~ | $coin |",
'parse_mode'=>'Markdown', 
]);
}
}
elseif($state =="TMD" && $text !="『 بازگشت 』"){
if($chat_id != $my_id  or  ((strlen($text) >25 ) or strpos($text, '/') or strpos($text, '#') or strpos($text, '(') or strpos($text, ')') or strpos($text, '}') or strpos($text, '{') or strpos($text, ']') or strpos($text, '[') or strpos($text, '"') !== false)){ 
bot('sendMessage',[ 
'chat_id'=>$chat_id, 
'text'=>" Error 500 ❗️⚠️
در تمدید کردن ربات شما مشکلی بوجود امده است لطفا ب پشتیبانی مراجعه کنید 🙏🏽", 
]); 
}else{
unlink("LorexTeam/$text/Mahdy");
sleep(1);
touch("LorexTeam/$text/Mahdy");
bot('sendMessage',[ 
'chat_id'=>$chat_id, 
'text'=>"✅ربات @$text با موفقیت برای 30 روز دیگر تمدید شد ", 
]);
$coin = file_get_contents("data0000/$from_id/coin.txt");
settype($coin,"integer");
$newcoin = $coin - 30;
save("data0000/$from_id/coin.txt",$newcoin);
} 
}
elseif($text == "creator" or $text == "/creator"){
file_put_contents("data0000/$from_id/state.txt","none");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
برای دیدن پروفایل مالک ربات از دکمه های زیر استفاده کنید ❤️👇🏿

〰️〰️〰️〰️〰️〰️〰️〰️〰️
👤 Channel @$channel
🤖 Bot @$bot_id
",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup' => json_encode([
'inline_keyboard' => [
[['text' => "𝐎𝐖𝐍𝐄𝐑 𝐂𝐇𝐀𝐍𝐍𝐄𝐋 👤", 'url' => "https://t.me/$channel"]],
[['text' => "𝐒𝐏𝐎𝐍𝐒𝐎𝐑 ☁️", 'url' => "https://t.me/vip_host_ir"]],
]
]) 
]);
}
//===============حساب ویژه==============//
elseif($text == "ربات های من 📍"){
if($created == "yes"){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
🛠؛ ربـات هـایـي کـه شـمـا بـا ربـاتسـاز  سـاخـتـه ایـد :
💎: ﴾ 
$user_bots ﴿ !

〰️〰️〰️〰️〰️〰️〰️〰️〰️
👤 Channel @$channel
🤖 Bot @$bot_id
",
]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"<span class= 'tg-spoiler'>❌؛ شـمـا در حـال حـاضـر ربـاتـي در ربـاتسـاز  نـسـاخـتـه ایـد !</span>",
'parse_mode'=>"HTML",
]);
}
}
//===========ممبر گیر شیشه ای=============
elseif($text == "💠| شیشه ای"){
if($coin >= 18){
file_put_contents("data0000/$from_id/state.txt","member");
bot('sendMessage',[
'chat_id'=>$chat_id,
 'text'=>"❖| آیدی #کانالت رو بدون | @ | بفرست 🩸",
'parse_mode'=>'HTML',
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"『 برگشت 』"]],
],
'resize_keyboard'=>true
])
]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
📛 امتیاز شما کافی نیست لطفاً امتیاز جمع آوری کنید مجدد به این بخش بازگردید .

💰 امتیاز مورد نیاز ~ | 18 |
🗽 امتیاز شما ~ | $coin |
",
'parse_mode'=>'HTML',
]);
}
}
elseif($state == "member" && $text !="『 برگشت 』" ){
if($text[0] == '@')$text = substr($text, 1);
if((strlen($text) >50 ) or strpos($text, '/') or strpos($text, '(') or strpos($text, ')') or strpos($text, '}') or strpos($text, '{') or strpos($text, ']') or strpos($text, '[') or strpos($text, '#') or strpos($text, '"') !== false){
bot('sendMessage',[
'chat_id' => $chat_id,
'text' => "
از ارسال کاراکتر های غیر مجاز ب ربات خودداری کنید ☝🏿
",
]);
}elseif(!preg_match('/^([a-zA-Z][a-zA-Z0-9_]{4,31}|)$/', $text)){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>'یوزرنیم ارسال شده اشتباه است ⛔️',
]);
}else{
file_put_contents("data0000/$chat_id/member.txt",$text);
file_put_contents("data0000/$from_id/state.txt","member1");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"␥| توکن #ربات رو خود را ارسال کنید 🎐",
'parse_mode'=>'Markdown', 
'reply_markup'=>json_encode([ 
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"『 برگشت 』"]],
]
])
]);
}
}
elseif($state == "member1"){
$userbot = json_decode(file_get_contents("https://api.telegram.org/bot".$text."/getme"),true);
$un = $userbot["result"]["username"];
$ok = $userbot["ok"];
if($ok != 1  or (strlen($text) >50 ) or strpos($text, '/') or strpos($text, '(') or strpos($text, ')') or strpos($text, '}') or strpos($text, '{') or strpos($text, ']') or strpos($text, '#') or strpos($text, '[') or strpos($text, '"') !== false){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
😐❌ توکن شما معتبر نمی باشد!

توکن خود را از @BotFather دریافت کنید🤦‍♂
",
]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'message_id'=>$message_id + 1,
'text'=>'لطفا صبر کنید . . . ! ! ! ❤️'
]);
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
mkdir("LorexTeam/$un");
mkdir("LorexTeam/$un/data");
mkdir("LorexTeam/$un/other");
touch("LorexTeam/$un/Mahdy");
file_put_contents("LorexTeam/$un/data/my_id.txt","$from_id");
file_put_contents("data0000/$from_id/state.txt","none");
$channel = file_get_contents("data0000/$chat_id/member.txt");
$class = file_get_contents("source/member/DevOscar.php");
$class = str_replace("[*[TOKEN]*]",$text,$class);
$class = str_replace("[*[ADMIN]*]",$from_id,$class);
$class = str_replace("[*[USERNAME]*]",$un,$class);
$class = str_replace("[*[CHANNEL]*]",$channel,$class);
file_put_contents("LorexTeam/$un/DevOscar.php",$class);
file_get_contents("https://api.telegram.org/bot".$text."/setwebhook?url=".$folder."/LorexTeam/".$un."/DevOscar.php");
file_put_contents("data0000/$from_id/create.txt","yes");
$user_b = file_get_contents("data0000/$from_id/bots.txt");
$member_b = explode("\n",$user_b);
if (!in_array($un,$member_b)){
$add_bot = file_get_contents("data0000/$from_id/bots.txt");
$add_bot .= $un."\n";
file_put_contents("data0000/$from_id/bots.txt",$add_bot);
}
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
ربات شما با موفقیت به سرور پر قدرت ما متصل شد ⚡️
",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"ورود به ربات 🚀",'url'=>"https://t.me/$un"]],
]
])
]);
$coin = file_get_contents("data0000/$from_id/coin.txt");
settype($coin,"integer");
$newcoin = $coin - 18;
save("data0000/$from_id/coin.txt",$newcoin);
}
}
//=============فروشگاهی============
elseif($text == "🏬| فروشگاهی"){
if($coin >= 25){
file_put_contents("data0000/$from_id/state.txt","Shop");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"␥| توکن #ربات رو خود را ارسال کنید 🎐",
'parse_mode'=>'HTML',
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"『 برگشت 』"]],
],
'resize_keyboard'=>true
])
]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
📛 امتیاز شما کافی نیست لطفاً امتیاز جمع آوری کنید مجدد به این بخش بازگردید .

💰 امتیاز مورد نیاز ~ | 25 |
🗽 امتیاز شما ~ | $coin |
",
'parse_mode'=>'HTML',
]);
}
}
elseif($state == "Shop"){
$userbot = json_decode(file_get_contents("https://api.telegram.org/bot".$text."/getme"),true);
$un = $userbot["result"]["username"];
$ok = $userbot["ok"];
if($ok != 1  or (strlen($text) >50 ) or strpos($text, '/') or strpos($text, '#') or strpos($text, '(') or strpos($text, ')') or strpos($text, '}') or strpos($text, '{') or strpos($text, ']') or strpos($text, '[') or strpos($text, '"') !== false){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
😐❌ توکن شما معتبر نمی باشد!

توکن خود را از @BotFather دریافت کنید🤦‍♂
",
]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'message_id'=>$message_id + 1,
'text'=>'لطفا صبر کنید . . . ! ! ! ❤️'
]);
mkdir("LorexTeam/$un");
mkdir("LorexTeam/$un/data");
mkdir("LorexTeam/$un/other");
touch("LorexTeam/$un/Mahdy");
file_put_contents("LorexTeam/$un/data/my_id.txt","$from_id");
file_put_contents("data0000/$from_id/state.txt","none");
$class = file_get_contents("source/Shop/DevOscar.php");
$class = str_replace("[*[TOKEN]*]",$text,$class);
$class = str_replace("[*[ADMIN]*]",$from_id,$class);
$class = str_replace("[*[USERNAME]*]",$un,$class);
file_put_contents("LorexTeam/$un/DevOscar.php",$class);
file_get_contents("https://api.telegram.org/bot".$text."/setwebhook?url=".$folder."/LorexTeam/".$un."/DevOscar.php");
file_put_contents("data0000/$from_id/create.txt","yes");
$user_b = file_get_contents("data0000/$from_id/bots.txt");
$member_b = explode("\n",$user_b);
if (!in_array($un,$member_b)){
$add_bot = file_get_contents("data0000/$from_id/bots.txt");
$add_bot .= $un."\n";
file_put_contents("data0000/$from_id/bots.txt",$add_bot);
}
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
ربات شما با موفقیت به سرور پر قدرت ما متصل شد ⚡️
",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"ورود به ربات 🚀",'url'=>"https://t.me/$un"]],
]
])
]);
$coin = file_get_contents("data0000/$from_id/coin.txt");
settype($coin,"integer");
$newcoin = $coin - 25;
save("data0000/$from_id/coin.txt",$newcoin);
}
}
//================دکمه====================
elseif($text == "🎛| دکمه دلخواه"){
if($coin >= 30){
file_put_contents("data0000/$from_id/state.txt","FreeButt");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"␥| توکن #ربات رو خود را ارسال کنید 🎐",
'parse_mode'=>'HTML',
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"『 برگشت 』"]],
],
'resize_keyboard'=>true
])
]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
📛 امتیاز شما کافی نیست لطفاً امتیاز جمع آوری کنید مجدد به این بخش بازگردید .
  
💰 امتیاز مورد نیاز ~ | 30 |
🗽 امتیاز شما ~ | $coin |
",
'parse_mode'=>'HTML',
]);
}
}
elseif($state == "FreeButt"){
$userbot = json_decode(file_get_contents("https://api.telegram.org/bot".$text."/getme"),true);
$un = $userbot["result"]["username"];
$ok = $userbot["ok"];
if($ok != 1  or (strlen($text) >50 ) or strpos($text, '/') or strpos($text, '(') or strpos($text, ')') or strpos($text, '}') or strpos($text, '{') or strpos($text, ']') or strpos($text, '#') or strpos($text, '[') or strpos($text, '"') !== false){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
😐❌ توکن شما معتبر نمی باشد!
  
توکن خود را از @BotFather دریافت کنید🤦‍♂
",
]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'message_id'=>$message_id + 1,
'text'=>'لطفا صبر کنید . . . ! ! ! ❤️'
]);
mkdir("LorexTeam/$un");
mkdir("LorexTeam/$un/data");
mkdir("LorexTeam/$un/Button");
mkdir("LorexTeam/$un/user");
touch("LorexTeam/$un/Mahdy");
file_put_contents("LorexTeam/$un/data/my_id.txt","$from_id");
file_put_contents("data0000/$from_id/state.txt","none");
$class = file_get_contents("source/Butt/config.php");
$class = str_replace("[*[TOKEN]*]",$text,$class);
$class = str_replace("[*[ADMIN]*]",$from_id,$class);
file_put_contents("LorexTeam/$un/config.php",$class);
copy("source/Butt/DevOscar.php","LorexTeam/$un/DevOscar.php");
copy("source/Butt/btn.json","LorexTeam/$un/btn.json");
copy("source/Butt/dev.json","LorexTeam/$un/dev.json");
file_get_contents("https://api.telegram.org/bot".$text."/setwebhook?url=".$folder."/LorexTeam/".$un."/DevOscar.php");
file_put_contents("data0000/$from_id/create.txt","yes");
$user_b = file_get_contents("data0000/$from_id/bots.txt");
$member_b = explode("\n",$user_b);
if (!in_array($un,$member_b)){
$add_bot = file_get_contents("data0000/$from_id/bots.txt");
$add_bot .= $un."\n";
file_put_contents("data0000/$from_id/bots.txt",$add_bot);
}
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
ربات شما با موفقیت به سرور پر قدرت ما متصل شد ⚡️
",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"ورود به ربات 🚀",'url'=>"https://t.me/$un"]],
]
])
]);
$coin = file_get_contents("data0000/$from_id/coin.txt");
settype($coin,"integer");
$newcoin = $coin - 30;
save("data0000/$from_id/coin.txt",$newcoin);
}
}
//====================================
elseif($text == "🧰| جعبه ابزار"){
if($coin >= 30){
file_put_contents("data0000/$from_id/state.txt","NormalTools");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"❖| آیدی #کانالت رو بدون | @ | بفرست 🩸",
'parse_mode'=>'HTML',
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"『 برگشت 』"]],
],
'resize_keyboard'=>true
])
]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
📛 امتیاز شما کافی نیست لطفاً امتیاز جمع آوری کنید مجدد به این بخش بازگردید .
  
💰 امتیاز مورد نیاز ~ | 30 |
🗽 امتیاز شما ~ | $coin |
",
'parse_mode'=>'HTML',
]);
}
}
elseif($state == "NormalTools" && $text !="『 برگشت 』" ){
if($text[0] == '@')$text = substr($text, 1);
if((strlen($text) >50 ) or strpos($text, '/') or strpos($text, '(') or strpos($text, ')') or strpos($text, '}') or strpos($text, '{') or strpos($text, ']') or strpos($text, '[') or strpos($text, '#') or strpos($text, '"') !== false){
bot('sendMessage',[
'chat_id' => $chat_id,
'text' => "
از ارسال کاراکتر های غیر مجاز ب ربات خودداری کنید ☝🏿
",
]);
}elseif(!preg_match('/^([a-zA-Z][a-zA-Z0-9_]{4,31}|)$/', $text)){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>'یوزرنیم ارسال شده اشتباه است ⛔️',
]);
}else{
file_put_contents("data0000/$chat_id/NormalTools.txt",$text);
file_put_contents("data0000/$from_id/state.txt","NormalTools1");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"␥| توکن #ربات رو خود را ارسال کنید 🎐",
'parse_mode'=>'Markdown', 
'reply_markup'=>json_encode([ 
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"『 برگشت 』"]],
]
])
]);
}
}
elseif($state == "NormalTools1"){
$userbot = json_decode(file_get_contents("https://api.telegram.org/bot".$text."/getme"),true);
$un = $userbot["result"]["username"];
$ok = $userbot["ok"];
if($ok != 1  or (strlen($text) >50 ) or strpos($text, '/') or strpos($text, '(') or strpos($text, ')') or strpos($text, '}') or strpos($text, '{') or strpos($text, ']') or strpos($text, '#') or strpos($text, '[') or strpos($text, '"') !== false){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
😐❌ توکن شما معتبر نمی باشد!
  
توکن خود را از @BotFather دریافت کنید🤦‍♂
",
]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'message_id'=>$message_id + 1,
'text'=>'لطفا صبر کنید . . . ! ! ! ❤️'
]);
mkdir("LorexTeam/$un");
mkdir("LorexTeam/$un/data");
touch("LorexTeam/$un/Mahdy");
file_put_contents("LorexTeam/$un/data/my_id.txt","$from_id");
file_put_contents("data0000/$from_id/state.txt","none");
$channel = file_get_contents("data0000/$chat_id/NormalTools.txt");
$class = file_get_contents("source/NormalTools/DevOscar.php");
$class = str_replace("[*[TOKEN]*]",$text,$class);
$class = str_replace("[*[ADMIN]*]",$from_id,$class);
$class = str_replace("[*[USERNAME]*]",$un,$class);
$class = str_replace("[*[CHANNEL]*]",$channel,$class);
file_put_contents("LorexTeam/$un/DevOscar.php",$class);
file_get_contents("https://api.telegram.org/bot".$text."/setwebhook?url=".$folder."/LorexTeam/".$un."/DevOscar.php");
file_put_contents("data0000/$from_id/create.txt","yes");
$user_b = file_get_contents("data0000/$from_id/bots.txt");
$member_b = explode("\n",$user_b);
if (!in_array($un,$member_b)){
$add_bot = file_get_contents("data0000/$from_id/bots.txt");
$add_bot .= $un."\n";
file_put_contents("data0000/$from_id/bots.txt",$add_bot);
}
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
ربات شما با موفقیت به سرور پر قدرت ما متصل شد ⚡️
",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"ورود به ربات 🚀",'url'=>"https://t.me/$un"]],
]
])
]);
$coin = file_get_contents("data0000/$from_id/coin.txt");
settype($coin,"integer");
$newcoin = $coin - 30;
save("data0000/$from_id/coin.txt",$newcoin);
}
}
//====================================
elseif($text == "🎐| پیام‌رسان نوع دو"){
if($coin >= 10){
file_put_contents("data0000/$from_id/state.txt","pmrs2");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"␥| توکن #ربات رو خود را ارسال کنید 🎐",
'parse_mode'=>'HTML',
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"『 برگشت 』"]],
],
'resize_keyboard'=>true
])
]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
📛 امتیاز شما کافی نیست لطفاً امتیاز جمع آوری کنید مجدد به این بخش بازگردید .

💰 امتیاز مورد نیاز ~ | 10 |
🗽 امتیاز شما ~ | $coin |
",
'parse_mode'=>'HTML',
]);
}
}
elseif($state == "pmrs2"){
$userbot = json_decode(file_get_contents("https://api.telegram.org/bot".$text."/getme"),true);
$un = $userbot["result"]["username"];
$ok = $userbot["ok"];
if($ok != 1  or (strlen($text) >50 ) or strpos($text, '/') or strpos($text, '#') or strpos($text, '(') or strpos($text, ')') or strpos($text, '}') or strpos($text, '{') or strpos($text, ']') or strpos($text, '[') or strpos($text, '"') !== false){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
😐❌ توکن شما معتبر نمی باشد!

توکن خود را از @BotFather دریافت کنید🤦‍♂
",
]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'message_id'=>$message_id + 1,
'text'=>'لطفا صبر کنید . . . ! ! ! ❤️'
]);
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
mkdir("LorexTeam/$un");
mkdir("LorexTeam/$un/data");
mkdir("LorexTeam/$un/other");
touch("LorexTeam/$un/Mahdy");
file_put_contents("LorexTeam/$un/data/my_id.txt","$from_id");
file_put_contents("data0000/$from_id/state.txt","none");
$class = file_get_contents("source/pmrs2/DevOscar.php");
$class = str_replace("[*[TOKEN]*]",$text,$class);
$class = str_replace("[*[ADMIN]*]",$from_id,$class);
file_put_contents("LorexTeam/$un/DevOscar.php",$class);
file_get_contents("https://api.telegram.org/bot".$text."/setwebhook?url=".$folder."/LorexTeam/".$un."/DevOscar.php");
file_put_contents("data0000/$from_id/create.txt","yes");
$user_b = file_get_contents("data0000/$from_id/bots.txt");
$pmrs2_b = explode("\n",$user_b);
if (!in_array($un,$pmrs2_b)){
$add_bot = file_get_contents("data0000/$from_id/bots.txt");
$add_bot .= $un."\n";
file_put_contents("data0000/$from_id/bots.txt",$add_bot);
}
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
ربات شما با موفقیت به سرور پر قدرت ما متصل شد ⚡️
",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"ورود به ربات 🚀",'url'=>"https://t.me/$un"]],
]
])
]);
$coin = file_get_contents("data0000/$from_id/coin.txt");
settype($coin,"integer");
$newcoin = $coin - 10;
save("data0000/$from_id/coin.txt",$newcoin);
}
}
//------------------------------------
elseif($text == "💭| پیام‌رسان پیشرفته"){
if($coin >= 12){
file_put_contents("data0000/$from_id/state.txt","SuperPm");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"␥| توکن #ربات رو خود را ارسال کنید 🎐",
'parse_mode'=>'HTML',
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"『 برگشت 』"]],
],
'resize_keyboard'=>true
])
]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
📛 امتیاز شما کافی نیست لطفاً امتیاز جمع آوری کنید مجدد به این بخش بازگردید .
  
💰 امتیاز مورد نیاز ~ | 12 |
🗽 امتیاز شما ~ | $coin |
",
'parse_mode'=>'HTML',
]);
}
}
elseif($state == "SuperPm"){
$userbot = json_decode(file_get_contents("https://api.telegram.org/bot".$text."/getme"),true);
$un = $userbot["result"]["username"];
$ok = $userbot["ok"];
if($ok != 1  or (strlen($text) >50 ) or strpos($text, '/') or strpos($text, '#') or strpos($text, '(') or strpos($text, ')') or strpos($text, '}') or strpos($text, '{') or strpos($text, ']') or strpos($text, '[') or strpos($text, '"') !== false){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
😐❌ توکن شما معتبر نمی باشد!
  
توکن خود را از @BotFather دریافت کنید🤦‍♂
",
]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'message_id'=>$message_id + 1,
'text'=>'لطفا صبر کنید . . . ! ! ! ❤️'
]);
mkdir("LorexTeam/$un");
mkdir("LorexTeam/$un/data");
touch("LorexTeam/$un/Mahdy");
file_put_contents("LorexTeam/$un/data/my_id.txt","$from_id");
file_put_contents("data0000/$from_id/state.txt","none");
$channel = file_get_contents("data0000/$chat_id/SuperPm.txt");
$class = file_get_contents("source/ProPv/DevOscar.php");
$class = str_replace("[*[TOKEN]*]",$text,$class);
$class = str_replace("[*[ADMIN]*]",$from_id,$class);
file_put_contents("LorexTeam/$un/DevOscar.php",$class);
file_get_contents("https://api.telegram.org/bot".$text."/setwebhook?url=".$folder."/LorexTeam/".$un."/DevOscar.php");
file_put_contents("data0000/$from_id/create.txt","yes");
$user_b = file_get_contents("data0000/$from_id/bots.txt");
$pmrs2_b = explode("\n",$user_b);
if (!in_array($un,$pmrs2_b)){
$add_bot = file_get_contents("data0000/$from_id/bots.txt");
$add_bot .= $un."\n";
file_put_contents("data0000/$from_id/bots.txt",$add_bot);
}
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
ربات شما با موفقیت به سرور پر قدرت ما متصل شد ⚡️
",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"ورود به ربات 🚀",'url'=>"https://t.me/$un"]],
]
])
]);
$coin = file_get_contents("data0000/$from_id/coin.txt");
settype($coin,"integer");
$newcoin = $coin - 12;
save("data0000/$from_id/coin.txt",$newcoin);
}
}
//----------------------------------------
elseif($text == "🔗| اینستا دانلودر"){
if($coin >= 15){
file_put_contents("data0000/$from_id/state.txt","InDL");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"❖| آیدی #کانالت رو بدون | @ | بفرست 🩸",
'parse_mode'=>'HTML',
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"『 برگشت 』"]],
],
'resize_keyboard'=>true
])
]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
📛 امتیاز شما کافی نیست لطفاً امتیاز جمع آوری کنید مجدد به این بخش بازگردید .

💰 امتیاز مورد نیاز ~ | 15 |
🗽 امتیاز شما ~ | $coin |
",
'parse_mode'=>'HTML',
]);
}
}
elseif($state == "InDL" && $text !="『 برگشت 』" ){
if($text[0] == '@')$text = substr($text, 1);
if((strlen($text) >50 ) or strpos($text, '/') or strpos($text, '(') or strpos($text, ')') or strpos($text, '}') or strpos($text, '{') or strpos($text, ']') or strpos($text, '[') or strpos($text, '#') or strpos($text, '"') !== false){
bot('sendMessage',[
'chat_id' => $chat_id,
'text' => "
از ارسال کاراکتر های غیر مجاز ب ربات خودداری کنید ☝🏿
",
]);
}elseif(!preg_match('/^([a-zA-Z][a-zA-Z0-9_]{4,31}|)$/', $text)){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>'یوزرنیم ارسال شده اشتباه است ⛔️',
]);
}else{
file_put_contents("data0000/$chat_id/InDL.txt",$text);
file_put_contents("data0000/$from_id/state.txt","InDL1");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"␥| توکن #ربات رو خود را ارسال کنید 🎐",
'parse_mode'=>'Markdown', 
'reply_markup'=>json_encode([ 
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"『 برگشت 』"]],
]
])
]);
}
}
elseif($state == "InDL1"){
$userbot = json_decode(file_get_contents("https://api.telegram.org/bot".$text."/getme"),true);
$un = $userbot["result"]["username"];
$ok = $userbot["ok"];
if($ok != 1  or (strlen($text) >50 ) or strpos($text, '/') or strpos($text, '#') or strpos($text, '(') or strpos($text, ')') or strpos($text, '}') or strpos($text, '{') or strpos($text, ']') or strpos($text, '[') or strpos($text, '"') !== false){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
😐❌ توکن شما معتبر نمی باشد!

توکن خود را از @BotFather دریافت کنید🤦‍♂
",
]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'message_id'=>$message_id + 1,
'text'=>'لطفا صبر کنید . . . ! ! ! ❤️'
]);
mkdir("LorexTeam/$un");
mkdir("LorexTeam/$un/data");
touch("LorexTeam/$un/Mahdy");
file_put_contents("LorexTeam/$un/data/my_id.txt","$from_id");
file_put_contents("data0000/$from_id/state.txt","none");
$channel = file_get_contents("data0000/$chat_id/InDL.txt");
$class = file_get_contents("source/InstaDL/config.php");
$class = str_replace("[*[TOKEN]*]",$text,$class);
$class = str_replace("[*[ADMIN]*]",$from_id,$class);
$class = str_replace("[*[USERNAME]*]",$un,$class);
$class = str_replace("[*[CHANNEL]*]",$channel,$class);
file_put_contents("LorexTeam/$un/config.php",$class);
copy("source/InstaDL/DevOscar.php","LorexTeam/$un/DevOscar.php");
file_put_contents("LorexTeam/$un/canal1.txt","$channel");
file_put_contents("LorexTeam/$un/canal2.txt","$channel");
file_get_contents("https://api.telegram.org/bot".$text."/setwebhook?url=".$folder."/LorexTeam/".$un."/DevOscar.php");
file_put_contents("data0000/$from_id/create.txt","yes");
$user_b = file_get_contents("data0000/$from_id/bots.txt");
$pmrs2_b = explode("\n",$user_b);
if (!in_array($un,$pmrs2_b)){
$add_bot = file_get_contents("data0000/$from_id/bots.txt");
$add_bot .= $un."\n";
file_put_contents("data0000/$from_id/bots.txt",$add_bot);
}
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
ربات شما با موفقیت به سرور پر قدرت ما متصل شد ⚡️
",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"ورود به ربات 🚀",'url'=>"https://t.me/$un"]],
]
])
]);
$coin = file_get_contents("data0000/$from_id/coin.txt");
settype($coin,"integer");
$newcoin = $coin - 15;
save("data0000/$from_id/coin.txt",$newcoin);
}
}
//-----------------------------------------
elseif($text == "🗂| یوتیوب دانلودر"){
if($coin >= 15){
file_put_contents("data0000/$from_id/state.txt","UtubeDL");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"␥| توکن #ربات رو خود را ارسال کنید 🎐",
'parse_mode'=>'HTML',
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"『 برگشت 』"]],
],
'resize_keyboard'=>true
])
]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
📛 امتیاز شما کافی نیست لطفاً امتیاز جمع آوری کنید مجدد به این بخش بازگردید .

💰 امتیاز مورد نیاز ~ | 15 |
🗽 امتیاز شما ~ | $coin |
",
'parse_mode'=>'HTML',
]);
}
}
elseif($state == "UtubeDL"){
$userbot = json_decode(file_get_contents("https://api.telegram.org/bot".$text."/getme"),true);
$un = $userbot["result"]["username"];
$ok = $userbot["ok"];
if($ok != 1  or (strlen($text) >50 ) or strpos($text, '/') or strpos($text, '#') or strpos($text, '(') or strpos($text, ')') or strpos($text, '}') or strpos($text, '{') or strpos($text, ']') or strpos($text, '[') or strpos($text, '"') !== false){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
😐❌ توکن شما معتبر نمی باشد!

توکن خود را از @BotFather دریافت کنید🤦‍♂
",
]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'message_id'=>$message_id + 1,
'text'=>'لطفا صبر کنید . . . ! ! ! ❤️'
]);
mkdir("LorexTeam/$un");
mkdir("LorexTeam/$un/data");
touch("LorexTeam/$un/Mahdy");
file_put_contents("LorexTeam/$un/data/my_id.txt","$from_id");
file_put_contents("data0000/$from_id/state.txt","none");
$class = file_get_contents("source/YoutubeDL/DevOscar.php");
$class = str_replace("[*[TOKEN]*]",$text,$class);
$class = str_replace("[*[ADMIN]*]",$from_id,$class);
$class = str_replace("[*[USERNAME]*]",$un,$class);
file_put_contents("LorexTeam/$un/DevOscar.php",$class);
copy("source/YoutubeDL/admin.php","LorexTeam/$un/admin.php");
copy("source/YoutubeDL/simple_html_dom.php","LorexTeam/$un/simple_html_dom.php");
file_get_contents("https://api.telegram.org/bot".$text."/setwebhook?url=".$folder."/LorexTeam/".$un."/DevOscar.php");
file_put_contents("data0000/$from_id/create.txt","yes");
$user_b = file_get_contents("data0000/$from_id/bots.txt");
$pmrs2_b = explode("\n",$user_b);
if (!in_array($un,$pmrs2_b)){
$add_bot = file_get_contents("data0000/$from_id/bots.txt");
$add_bot .= $un."\n";
file_put_contents("data0000/$from_id/bots.txt",$add_bot);
}
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
ربات شما با موفقیت به سرور پر قدرت ما متصل شد ⚡️
",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"ورود به ربات 🚀",'url'=>"https://t.me/$un"]],
]
])
]);
$coin = file_get_contents("data0000/$from_id/coin.txt");
settype($coin,"integer");
$newcoin = $coin - 15;
save("data0000/$from_id/coin.txt",$newcoin);
}
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
//-----------------------------------------
elseif($text == "👍🏿| لایک ساز"){
if($coin >= 20){
file_put_contents("data0000/$from_id/state.txt","LikeCR");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"␥| توکن #ربات رو خود را ارسال کنید 🎐",
'parse_mode'=>'HTML',
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"『 برگشت 』"]],
],
'resize_keyboard'=>true
])
]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
📛 امتیاز شما کافی نیست لطفاً امتیاز جمع آوری کنید مجدد به این بخش بازگردید .

💰 امتیاز مورد نیاز ~ | 20 |
🗽 امتیاز شما ~ | $coin |
",
'parse_mode'=>'HTML',
]);
}
}
elseif($state == "LikeCR"){
$userbot = json_decode(file_get_contents("https://api.telegram.org/bot".$text."/getme"),true);
$un = $userbot["result"]["username"];
$ok = $userbot["ok"];
if($ok != 1  or (strlen($text) >50 ) or strpos($text, '/') or strpos($text, '#') or strpos($text, '(') or strpos($text, ')') or strpos($text, '}') or strpos($text, '{') or strpos($text, ']') or strpos($text, '[') or strpos($text, '"') !== false){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
😐❌ توکن شما معتبر نمی باشد!

توکن خود را از @BotFather دریافت کنید🤦‍♂
",
]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'message_id'=>$message_id + 1,
'text'=>'لطفا صبر کنید . . . ! ! ! ❤️'
]);
mkdir("LorexTeam/$un");
mkdir("LorexTeam/$un/data");
touch("LorexTeam/$un/Mahdy");
file_put_contents("LorexTeam/$un/data/my_id.txt","$from_id");
file_put_contents("data0000/$from_id/state.txt","none");
$class = file_get_contents("source/LikeCR/DevOscar.php");
$class = str_replace("[*[TOKEN]*]",$text,$class);
$class = str_replace("[*[ADMIN]*]",$from_id,$class);
file_put_contents("LorexTeam/$un/DevOscar.php",$class);
file_get_contents("https://api.telegram.org/bot".$text."/setwebhook?url=".$folder."/LorexTeam/".$un."/Oscar.php");
file_put_contents("data0000/$from_id/create.txt","yes");
$user_b = file_get_contents("data0000/$from_id/bots.txt");
$pmrs2_b = explode("\n",$user_b);
if (!in_array($un,$pmrs2_b)){
$add_bot = file_get_contents("data0000/$from_id/bots.txt");
$add_bot .= $un."\n";
file_put_contents("data0000/$from_id/bots.txt",$add_bot);
}
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
ربات شما با موفقیت به سرور پر قدرت ما متصل شد ⚡️
",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"ورود به ربات 🚀",'url'=>"https://t.me/$un"]],
]
])
]);
$coin = file_get_contents("data0000/$from_id/coin.txt");
settype($coin,"integer");
$newcoin = $coin - 20;
save("data0000/$from_id/coin.txt",$newcoin);
}
}
//============= ممبر گیر دکمه ای===========
elseif($text == "🔸| دکمه ای"){
if($coin >= 15){
file_put_contents("data0000/$from_id/state.txt","qnwpq");
bot('sendMessage',[
'chat_id'=>$chat_id,
 'text'=>"❖| آیدی #کانالت رو بدون | @ | بفرست 🩸",
'parse_mode'=>'HTML',
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"『 برگشت 』"]],
],
'resize_keyboard'=>true
])
]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
📛 امتیاز شما کافی نیست لطفاً امتیاز جمع آوری کنید مجدد به این بخش بازگردید .

💰 امتیاز مورد نیاز ~ | 15 |
🗽 امتیاز شما ~ | $coin |
",
'parse_mode'=>'HTML',
]);
}
}
elseif($state == "qnwpq" && $text !="『 برگشت 』" ){
if($text[0] == '@')$text = substr($text, 1);
if((strlen($text) >50 ) or strpos($text, '/') or strpos($text, '(') or strpos($text, ')') or strpos($text, '}') or strpos($text, '{') or strpos($text, ']') or strpos($text, '[') or strpos($text, '#') or strpos($text, '"') !== false){
bot('sendMessage',[
'chat_id' => $chat_id,
'text' => "
از ارسال کاراکتر های غیر مجاز ب ربات خودداری کنید ☝🏿
",
]);
}elseif(!preg_match('/^([a-zA-Z][a-zA-Z0-9_]{4,31}|)$/', $text)){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>'یوزرنیم ارسال شده اشتباه است ⛔️',
]);
}else{
file_put_contents("data0000/$chat_id/pam.txt",$text);
file_put_contents("data0000/$chat_id/ansld.txt",$text);
file_put_contents("data0000/$from_id/state.txt","amqldla");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"␥| توکن #ربات رو خود را ارسال کنید 🎐",
'parse_mode'=>'Markdown', 
'reply_markup'=>json_encode([ 
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"『 برگشت 』"]],
]
])
]);
}
}
elseif($state == "amqldla"){
$userbot = json_decode(file_get_contents("https://api.telegram.org/bot".$text."/getme"),true);
$un = $userbot["result"]["username"];
$ok = $userbot["ok"];
if($ok != 1  or (strlen($text) >50 ) or strpos($text, '#') or strpos($text, '/') or strpos($text, '(') or strpos($text, ')') or strpos($text, '}') or strpos($text, '{') or strpos($text, ']') or strpos($text, '[') or strpos($text, '"') !== false){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
😐❌ توکن شما معتبر نمی باشد!

توکن خود را از @BotFather دریافت کنید🤦‍♂
",
]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'message_id'=>$message_id + 1,
'text'=>'لطفا صبر کنید . . . ! ! ! ❤️'
]);
mkdir("LorexTeam/$un");
mkdir("LorexTeam/$un/data");
mkdir("LorexTeam/$un/ads");
mkdir("LorexTeam/$un/ads/cont");
touch("LorexTeam/$un/Mahdy");
file_put_contents("LorexTeam/$un/data/my_id.txt","$from_id");
file_put_contents("data0000/$from_id/state.txt","none");
$ansld = file_get_contents("data0000/$from_id/ansld.txt");
$class = file_get_contents("source/memb/DevOscar.php");
$class = str_replace("[*[TOKEN]*]",$text,$class);
$class = str_replace("[*[ADMIN]*]",$from_id,$class);
$class = str_replace("[*[USERNAME]*]",$un,$class);
$class = str_replace("[*[CHANNEL]*]",$ansld,$class);
file_put_contents("LorexTeam/$un/DevOscar.php",$class);
file_get_contents("https://api.telegram.org/bot".$text."/setwebhook?url=".$folder."/LorexTeam/".$un."/DevOscar.php");
file_put_contents("data0000/$from_id/create.txt","yes");
$user_b = file_get_contents("data0000/$from_id/bots.txt");
$member_b = explode("\n",$user_b);
if (!in_array($un,$member_b)){
$add_bot = file_get_contents("data0000/$from_id/bots.txt");
$add_bot .= $un."\n";
file_put_contents("data0000/$from_id/bots.txt",$add_bot);
}
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
ربات شما با موفقیت به سرور پر قدرت ما متصل شد ⚡️
",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"ورود به ربات 🚀",'url'=>"https://t.me/$un"]],
]
])
]);
$coin = file_get_contents("data0000/$from_id/coin.txt");
settype($coin,"integer");
$newcoin = $coin - 15;
save("data0000/$from_id/coin.txt",$newcoin);
}
}
//==========آپلودر=====//
 elseif($text == "📭| آپلودر ساده"){
if($coin >= 20){
file_put_contents("data0000/$from_id/state.txt","SimpUp");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
❖| آیدی #کانالت رو بدون | @ | بفرست 🩸
",
'parse_mode'=>'HTML',
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"『 برگشت 』"]],
],
'resize_keyboard'=>true
])
]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
📛 امتیاز شما کافی نیست لطفاً امتیاز جمع آوری کنید مجدد به این بخش بازگردید .

💰 امتیاز مورد نیاز ~ | 20 |
🗽 امتیاز شما ~ | $coin |
",
'parse_mode'=>'HTML',
]);
}
}
elseif($state == "SimpUp" && $text !="『 برگشت 』" ){
if($text[0] == '@')$text = substr($text, 1);
if((strlen($text) >50 ) or strpos($text, '/') or strpos($text, '#') or strpos($text, '(') or strpos($text, ')') or strpos($text, '}') or strpos($text, '{') or strpos($text, ']') or strpos($text, '[') or strpos($text, '"') !== false){
bot('sendMessage',[
'chat_id' => $chat_id,
'text' => "
از ارسال کاراکتر های غیر مجاز ب ربات خودداری کنید ☝🏿
",
]);
}elseif(!preg_match('/^([a-zA-Z][a-zA-Z0-9_]{4,31}|)$/', $text)){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>'یوزرنیم ارسال شده اشتباه است ⛔️',
]);
}else{
file_put_contents("data0000/$chat_id/SimpUp.txt",$text);
file_put_contents("data0000/$from_id/state.txt","SimpUp1");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"␥| توکن #ربات رو خود را ارسال کنید 🎐",
'parse_mode'=>'Markdown', 
'reply_markup'=>json_encode([ 
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"『 برگشت 』"]],
]
])
]);
}
}
elseif($state == "SimpUp1"){
$userbot = json_decode(file_get_contents("https://api.telegram.org/bot".$text."/getme"),true);
$un = $userbot["result"]["username"];
$ok = $userbot["ok"];
if($ok != 1  or (strlen($text) >50 ) or strpos($text, '#') or strpos($text, '/') or strpos($text, '(') or strpos($text, ')') or strpos($text, '}') or strpos($text, '{') or strpos($text, ']') or strpos($text, '[') or strpos($text, '"') !== false){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
😐❌ توکن شما معتبر نمی باشد!

توکن خود را از @BotFather دریافت کنید🤦‍♂
",
]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'message_id'=>$message_id + 1,
'text'=>'لطفا صبر کنید . . . ! ! ! ❤️'
]);
mkdir("LorexTeam/$un");
mkdir("LorexTeam/$un/data");
touch("LorexTeam/$un/Mahdy");
file_put_contents("LorexTeam/$un/data/my_id.txt","$from_id");
file_put_contents("data0000/$from_id/state.txt","none");
$channel = file_get_contents("data0000/$chat_id/SimpUp.txt");
$class = file_get_contents("source/SimpUp/DevOscar.php");
$class = str_replace("[*[TOKEN]*]",$text,$class);
$class = str_replace("[*[CHANNEL]*]",$channel,$class);
$class = str_replace("[*[ADMIN]*]",$from_id,$class);
file_put_contents("LorexTeam/$un/DevOscar.php",$class);
file_get_contents("https://api.telegram.org/bot".$text."/setwebhook?url=".$folder."/LorexTeam/".$un."/DevOscar.php");
file_put_contents("data0000/$from_id/create.txt","yes");
$user_b = file_get_contents("data0000/$from_id/bots.txt");
$member_b = explode("\n",$user_b);
if (!in_array($un,$member_b)){
$add_bot = file_get_contents("data0000/$from_id/bots.txt");
$add_bot .= $un."\n";
file_put_contents("data0000/$from_id/bots.txt",$add_bot);
}
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
ربات شما با موفقیت به سرور پر قدرت ما متصل شد ⚡️
",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"ورود به ربات 🚀",'url'=>"https://t.me/$un"]],
]
])
]);
$coin = file_get_contents("data0000/$from_id/coin.txt");
settype($coin,"integer");
$newcoin = $coin - 20;
save("data0000/$from_id/coin.txt",$newcoin);
}
}
//-------------------------------------
elseif($text == "🎥| آپلودر فیلم"){
if($coin >= 30){
file_put_contents("data0000/$from_id/state.txt","MovieUp");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
❖| آیدی #کانالت رو بدون | @ | بفرست 🩸
",
'parse_mode'=>'HTML',
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"『 برگشت 』"]],
],
'resize_keyboard'=>true
])
]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
📛 امتیاز شما کافی نیست لطفاً امتیاز جمع آوری کنید مجدد به این بخش بازگردید .

💰 امتیاز مورد نیاز ~ | 30 |
🗽 امتیاز شما ~ | $coin |
",
'parse_mode'=>'HTML',
]);
}
}
elseif($state == "MovieUp" && $text !="『 برگشت 』" ){
if($text[0] == '@')$text = substr($text, 1);
if((strlen($text) >50 ) or strpos($text, '/') or strpos($text, '#') or strpos($text, '(') or strpos($text, ')') or strpos($text, '}') or strpos($text, '{') or strpos($text, ']') or strpos($text, '[') or strpos($text, '"') !== false){
bot('sendMessage',[
'chat_id' => $chat_id,
'text' => "
از ارسال کاراکتر های غیر مجاز ب ربات خودداری کنید ☝🏿
",
]);
}elseif(!preg_match('/^([a-zA-Z][a-zA-Z0-9_]{4,31}|)$/', $text)){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>'یوزرنیم ارسال شده اشتباه است ⛔️',
]);
}else{
file_put_contents("data0000/$chat_id/MovieUp.txt",$text);
file_put_contents("data0000/$from_id/state.txt","MovieUp1");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"␥| توکن #ربات رو خود را ارسال کنید 🎐",
'parse_mode'=>'Markdown', 
'reply_markup'=>json_encode([ 
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"『 برگشت 』"]],
]
])
]);
}
}
elseif($state == "MovieUp1"){
$userbot = json_decode(file_get_contents("https://api.telegram.org/bot".$text."/getme"),true);
$un = $userbot["result"]["username"];
$ok = $userbot["ok"];
if($ok != 1  or (strlen($text) >50 ) or strpos($text, '#') or strpos($text, '/') or strpos($text, '(') or strpos($text, ')') or strpos($text, '}') or strpos($text, '{') or strpos($text, ']') or strpos($text, '[') or strpos($text, '"') !== false){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
😐❌ توکن شما معتبر نمی باشد!

توکن خود را از @BotFather دریافت کنید🤦‍♂
",
]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'message_id'=>$message_id + 1,
'text'=>'لطفا صبر کنید . . . ! ! ! ❤️'
]);
mkdir("LorexTeam/$un");
mkdir("LorexTeam/$un/data");
touch("LorexTeam/$un/Mahdy");
file_put_contents("LorexTeam/$un/data/my_id.txt","$from_id");
file_put_contents("data0000/$from_id/state.txt","none");
$channel = file_get_contents("data0000/$chat_id/MovieUp.txt");
$class = file_get_contents("source/MovieUp/DevOscar.php");
$class = str_replace("[*[TOKEN]*]",$text,$class);
$class = str_replace("[*[CHANNEL]*]",$channel,$class);
$class = str_replace("[*[ADMIN]*]",$from_id,$class);
file_put_contents("LorexTeam/$un/DevOscar.php",$class);
file_put_contents("LorexTeam/$un/member.txt",$from_id);
file_get_contents("https://api.telegram.org/bot".$text."/setwebhook?url=".$folder."/LorexTeam/".$un."/DevOscar.php");
file_put_contents("data0000/$from_id/create.txt","yes");
$user_b = file_get_contents("data0000/$from_id/bots.txt");
$member_b = explode("\n",$user_b);
if (!in_array($un,$member_b)){
$add_bot = file_get_contents("data0000/$from_id/bots.txt");
$add_bot .= $un."\n";
file_put_contents("data0000/$from_id/bots.txt",$add_bot);
}
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
ربات شما با موفقیت به سرور پر قدرت ما متصل شد ⚡️
",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"ورود به ربات 🚀",'url'=>"https://t.me/$un"]],
]
])
]);
$coin = file_get_contents("data0000/$from_id/coin.txt");
settype($coin,"integer");
$newcoin = $coin - 30;
save("data0000/$from_id/coin.txt",$newcoin);
}
}
//--------------------------------
elseif($text == "📦| آپلودر فایل"){
if($coin >= 50){
file_put_contents("data0000/$from_id/state.txt","FileUp");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
␥| توکن #ربات رو خود را ارسال کنید 🎐
",
'parse_mode'=>'HTML',
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"『 برگشت 』"]],
],
'resize_keyboard'=>true
])
]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
📛 امتیاز شما کافی نیست لطفاً امتیاز جمع آوری کنید مجدد به این بخش بازگردید .

💰 امتیاز مورد نیاز ~ | 50 |
🗽 امتیاز شما ~ | $coin |
",
'parse_mode'=>'HTML',
]);
}
}
elseif($state == "FileUp"){
$userbot = json_decode(file_get_contents("https://api.telegram.org/bot".$text."/getme"),true);
$un = $userbot["result"]["username"];
$ok = $userbot["ok"];
if($ok != 1  or (strlen($text) >50 ) or strpos($text, '#') or strpos($text, '/') or strpos($text, '(') or strpos($text, ')') or strpos($text, '}') or strpos($text, '{') or strpos($text, ']') or strpos($text, '[') or strpos($text, '"') !== false){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
😐❌ توکن شما معتبر نمی باشد!

توکن خود را از @BotFather دریافت کنید🤦‍♂
",
]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'message_id'=>$message_id + 1,
'text'=>'لطفا صبر کنید . . . ! ! ! ❤️'
]);
mkdir("LorexTeam/$un");
mkdir("LorexTeam/$un/data");
touch("LorexTeam/$un/Mahdy");
file_put_contents("LorexTeam/$un/data/my_id.txt","$from_id");
file_put_contents("data0000/$from_id/state.txt","none");
$class = file_get_contents("source/FileUp/DevOscar.php");
$class = str_replace("[*[TOKEN]*]",$text,$class);
$class = str_replace("[*[ADMIN]*]",$from_id,$class);
file_put_contents("LorexTeam/$un/DevOscar.php",$class);
file_put_contents("LorexTeam/$un/member.txt",$from_id);
file_get_contents("https://api.telegram.org/bot".$text."/setwebhook?url=".$folder."/LorexTeam/".$un."/DevOscar.php");
file_put_contents("data0000/$from_id/create.txt","yes");
$user_b = file_get_contents("data0000/$from_id/bots.txt");
$member_b = explode("\n",$user_b);
if (!in_array($un,$member_b)){
$add_bot = file_get_contents("data0000/$from_id/bots.txt");
$add_bot .= $un."\n";
file_put_contents("data0000/$from_id/bots.txt",$add_bot);
}
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
ربات شما با موفقیت به سرور پر قدرت ما متصل شد ⚡️
",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"ورود به ربات 🚀",'url'=>"https://t.me/$un"]],
]
])
]);
$coin = file_get_contents("data0000/$from_id/coin.txt");
settype($coin,"integer");
$newcoin = $coin - 50;
save("data0000/$from_id/coin.txt",$newcoin);
}
}
//--------------------------
elseif($text == "💎| آپلودر ویژه"){
if($coin >= 75){
file_put_contents("data0000/$from_id/state.txt","SuperUp");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
␥| توکن #ربات رو خود را ارسال کنید 🎐
",
'parse_mode'=>'HTML',
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"『 برگشت 』"]],
],
'resize_keyboard'=>true
])
]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
📛 امتیاز شما کافی نیست لطفاً امتیاز جمع آوری کنید مجدد به این بخش بازگردید .

💰 امتیاز مورد نیاز ~ | 75 |
🗽 امتیاز شما ~ | $coin |
",
'parse_mode'=>'HTML',
]);
}
}
elseif($state == "SuperUp"){
$userbot = json_decode(file_get_contents("https://api.telegram.org/bot".$text."/getme"),true);
$un = $userbot["result"]["username"];
$ok = $userbot["ok"];
if($ok != 1  or (strlen($text) >50 ) or strpos($text, '#') or strpos($text, '/') or strpos($text, '(') or strpos($text, ')') or strpos($text, '}') or strpos($text, '{') or strpos($text, ']') or strpos($text, '[') or strpos($text, '"') !== false){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
😐❌ توکن شما معتبر نمی باشد!

توکن خود را از @BotFather دریافت کنید🤦‍♂
",
]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'message_id'=>$message_id + 1,
'text'=>'لطفا صبر کنید . . . ! ! ! ❤️'
]);
mkdir("LorexTeam/$un");
mkdir("LorexTeam/$un/data");
touch("LorexTeam/$un/Mahdy");
file_put_contents("LorexTeam/$un/data/my_id.txt","$from_id");
file_put_contents("data0000/$from_id/state.txt","none");
$class = file_get_contents("source/SuperUp/DevOscar.php");
$class = str_replace("[*[TOKEN]*]",$text,$class);
$class = str_replace("[*[ADMIN]*]",$from_id,$class);
file_put_contents("LorexTeam/$un/DevOscar.php",$class);
file_put_contents("LorexTeam/$un/member.txt",$from_id);
file_put_contents("LorexTeam/$un/timer.txt","10");
file_put_contents("LorexTeam/$un/start.txt","متن استارت را از پنل تنظیم کنید");
file_put_contents("LorexTeam/$un/caption.txt","متن کپشن از پنل تنظیم شود");
file_get_contents("https://api.telegram.org/bot".$text."/setwebhook?url=".$folder."/LorexTeam/".$un."/DevOscar.php");
file_put_contents("data0000/$from_id/create.txt","yes");
$user_b = file_get_contents("data0000/$from_id/bots.txt");
$member_b = explode("\n",$user_b);
if (!in_array($un,$member_b)){
$add_bot = file_get_contents("data0000/$from_id/bots.txt");
$add_bot .= $un."\n";
file_put_contents("data0000/$from_id/bots.txt",$add_bot);
}
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
ربات شما با موفقیت به سرور پر قدرت ما متصل شد ⚡️
",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"ورود به ربات 🚀",'url'=>"https://t.me/$un"]],
]
])
]);
$coin = file_get_contents("data0000/$from_id/coin.txt");
settype($coin,"integer");
$newcoin = $coin - 75;
save("data0000/$from_id/coin.txt",$newcoin);
}
}
//---------------------------
elseif($text == "🕹| بازی کلمات"){
if($coin >= 14){
file_put_contents("data0000/$from_id/state.txt","GameKala");
bot('sendMessage',[
'chat_id'=>$chat_id,
 'text'=>"
❖| آیدی #کانالت رو بدون | @ | بفرست 🩸

",
'parse_mode'=>'HTML',
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"『 برگشت 』"]],
],
'resize_keyboard'=>true
])
]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
📛 امتیاز شما کافی نیست لطفاً امتیاز جمع آوری کنید مجدد به این بخش بازگردید .

💰 امتیاز مورد نیاز ~ | 14 |
🗽 امتیاز شما ~ | $coin |
",
'parse_mode'=>'HTML',
]);
}
}
elseif($state == "GameKala" && $text !="『 برگشت 』" ){
if($text[0] == '@')$text = substr($text, 1);
if((strlen($text) >50 ) or strpos($text, '/') or strpos($text, '#') or strpos($text, '(') or strpos($text, ')') or strpos($text, '}') or strpos($text, '{') or strpos($text, ']') or strpos($text, '[') or strpos($text, '"') !== false){
bot('sendMessage',[
'chat_id' => $chat_id,
'text' => "
از ارسال کاراکتر های غیر مجاز ب ربات خودداری کنید ☝🏿
",
]);
}elseif(!preg_match('/^([a-zA-Z][a-zA-Z0-9_]{4,31}|)$/', $text)){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>'یوزرنیم ارسال شده اشتباه است ⛔️',
]);
}else{
file_put_contents("data0000/$chat_id/GameKala.txt",$text);
file_put_contents("data0000/$from_id/state.txt","GameKala1");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"␥| توکن #ربات رو خود را ارسال کنید 🎐",
'parse_mode'=>'Markdown', 
'reply_markup'=>json_encode([ 
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"『 برگشت 』"]],
]
])
]);
}
}
elseif($state == "GameKala1"){
$userbot = json_decode(file_get_contents("https://api.telegram.org/bot".$text."/getme"),true);
$un = $userbot["result"]["username"];
$ok = $userbot["ok"];
if($ok != 1  or (strlen($text) >50 ) or strpos($text, '#') or strpos($text, '/') or strpos($text, '(') or strpos($text, ')') or strpos($text, '}') or strpos($text, '{') or strpos($text, ']') or strpos($text, '[') or strpos($text, '"') !== false){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
😐❌ توکن شما معتبر نمی باشد!

توکن خود را از @BotFather دریافت کنید🤦‍♂
",
]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'message_id'=>$message_id + 1,
'text'=>'لطفا صبر کنید . . . ! ! ! ❤️'
]);
mkdir("LorexTeam/$un");
mkdir("LorexTeam/$un/data");
touch("LorexTeam/$un/Mahdy");
file_put_contents("LorexTeam/$un/data/my_id.txt","$from_id");
file_put_contents("data0000/$from_id/state.txt","none");
$channel = file_get_contents("data0000/$chat_id/GameKala.txt");
$class = file_get_contents("source/GameKala/DevOscar.php");
$class = str_replace("[*[TOKEN]*]",$text,$class);
$class = str_replace("[*[ADMIN]*]",$from_id,$class);
$class = str_replace("[*[USERNAME]*]",$un,$class);
$class = str_replace("[*[CHANNEL]*]",$channel,$class);
file_put_contents("LorexTeam/$un/DevOscar.php",$class);
copy("source/GameKala/wordlist.json","LorexTeam/$un/data/wordlist.json");
file_get_contents("https://api.telegram.org/bot".$text."/setwebhook?url=".$folder."/LorexTeam/".$un."/DevOscar.php");
file_put_contents("data0000/$from_id/create.txt","yes");
$user_b = file_get_contents("data0000/$from_id/bots.txt");
$member_b = explode("\n",$user_b);
if (!in_array($un,$member_b)){
$add_bot = file_get_contents("data0000/$from_id/bots.txt");
$add_bot .= $un."\n";
file_put_contents("data0000/$from_id/bots.txt",$add_bot);
}
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
ربات شما با موفقیت به سرور پر قدرت ما متصل شد ⚡️
",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"ورود به ربات 🚀",'url'=>"https://t.me/$un"]],
]
])
]);
$coin = file_get_contents("data0000/$from_id/coin.txt");
settype($coin,"integer");
$newcoin = $coin - 14;
save("data0000/$from_id/coin.txt",$newcoin);
}
}
//--------------------------
elseif($text == "🪙| ست وب هوک"){
if($coin >= 5){
file_put_contents("data0000/$from_id/state.txt","SetWeb");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
␥| توکن #ربات رو خود را ارسال کنید 🎐
",
'parse_mode'=>'HTML',
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"『 برگشت 』"]],
],
'resize_keyboard'=>true
])
]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
📛 امتیاز شما کافی نیست لطفاً امتیاز جمع آوری کنید مجدد به این بخش بازگردید .

💰 امتیاز مورد نیاز ~ | 5 |
🗽 امتیاز شما ~ | $coin |
",
'parse_mode'=>'HTML',
]);
}
}
elseif($state == "SetWeb"){
$userbot = json_decode(file_get_contents("https://api.telegram.org/bot".$text."/getme"),true);
$un = $userbot["result"]["username"];
$ok = $userbot["ok"];
if($ok != 1  or (strlen($text) >50 ) or strpos($text, '#') or strpos($text, '/') or strpos($text, '(') or strpos($text, ')') or strpos($text, '}') or strpos($text, '{') or strpos($text, ']') or strpos($text, '[') or strpos($text, '"') !== false){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
😐❌ توکن شما معتبر نمی باشد!

توکن خود را از @BotFather دریافت کنید🤦‍♂
",
]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'message_id'=>$message_id + 1,
'text'=>'لطفا صبر کنید . . . ! ! ! ❤️'
]);
mkdir("LorexTeam/$un");
mkdir("LorexTeam/$un/data");
touch("LorexTeam/$un/Mahdy");
file_put_contents("LorexTeam/$un/data/my_id.txt","$from_id");
file_put_contents("data0000/$from_id/state.txt","none");
$channel = file_get_contents("data0000/$chat_id/SetWeb.txt");
$class = file_get_contents("source/SetWeb/DevOscar.php");
$class = str_replace("[*[TOKEN]*]",$text,$class);
$class = str_replace("[*[ADMIN]*]",$from_id,$class);
file_put_contents("LorexTeam/$un/DevOscar.php",$class);
file_get_contents("https://api.telegram.org/bot".$text."/setwebhook?url=".$folder."/LorexTeam/".$un."/DevOscar.php");
file_put_contents("data0000/$from_id/create.txt","yes");
$user_b = file_get_contents("data0000/$from_id/bots.txt");
$member_b = explode("\n",$user_b);
if (!in_array($un,$member_b)){
$add_bot = file_get_contents("data0000/$from_id/bots.txt");
$add_bot .= $un."\n";
file_put_contents("data0000/$from_id/bots.txt",$add_bot);
}
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
ربات شما با موفقیت به سرور پر قدرت ما متصل شد ⚡️
",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"ورود به ربات 🚀",'url'=>"https://t.me/$un"]],
]
])
]);
$coin = file_get_contents("data0000/$from_id/coin.txt");
settype($coin,"integer");
$newcoin = $coin - 5;
save("data0000/$from_id/coin.txt",$newcoin);
}
}
//==================================
elseif($text == "🍆| بکیرم"){
if($coin >= 16){
file_put_contents("data0000/$from_id/state.txt","BKirm");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
❖| آیدی #کانالت رو بدون | @ | بفرست 🩸
",
'parse_mode'=>'HTML',
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"『 برگشت 』"]],
],
'resize_keyboard'=>true
])
]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
📛 امتیاز شما کافی نیست لطفاً امتیاز جمع آوری کنید مجدد به این بخش بازگردید .
  
💰 امتیاز مورد نیاز ~ | 16 |
🗽 امتیاز شما ~ | $coin |
",
'parse_mode'=>'HTML',
]);
}
}
elseif($state == "BKirm" && $text !="『 برگشت 』" ){
if($text[0] == '@')$text = substr($text, 1);
if((strlen($text) >50 ) or strpos($text, '#') or strpos($text, '/') or strpos($text, '(') or strpos($text, ')') or strpos($text, '}') or strpos($text, '{') or strpos($text, ']') or strpos($text, '[') or strpos($text, '"') !== false){
bot('sendMessage',[
'chat_id' => $chat_id,
'text' => "
از ارسال کاراکتر های غیر مجاز ب ربات خودداری کنید ☝🏿
",
]);
}elseif(!preg_match('/^([a-zA-Z][a-zA-Z0-9_]{4,31}|)$/', $text)){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>'یوزرنیم ارسال شده اشتباه است ⛔️',
]);
}else{
file_put_contents("data0000/$chat_id/BKirm.txt",$text);
file_put_contents("data0000/$from_id/state.txt","BKirm1");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"␥| توکن #ربات رو خود را ارسال کنید 🎐",
'parse_mode'=>'Markdown', 
'reply_markup'=>json_encode([ 
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"『 برگشت 』"]],
]
])
]);
}
}
elseif($state == "BKirm1"){
$userbot = json_decode(file_get_contents("https://api.telegram.org/bot".$text."/getme"),true);
$un = $userbot["result"]["username"];
$ok = $userbot["ok"];
if($ok != 1  or (strlen($text) >50 ) or strpos($text, '#') or strpos($text, '/') or strpos($text, '(') or strpos($text, ')') or strpos($text, '}') or strpos($text, '{') or strpos($text, ']') or strpos($text, '[') or strpos($text, '"') !== false){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
😐❌ توکن شما معتبر نمی باشد!
  
توکن خود را از @BotFather دریافت کنید🤦‍♂
",
]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'message_id'=>$message_id + 1,
'text'=>'لطفا صبر کنید . . . ! ! ! ❤️'
]);
mkdir("LorexTeam/$un");
mkdir("LorexTeam/$un/data");
touch("LorexTeam/$un/Mahdy");
file_put_contents("LorexTeam/$un/data/my_id.txt","$from_id");
file_put_contents("data0000/$from_id/state.txt","none");
$channel = file_get_contents("data0000/$chat_id/BKirm.txt");
$class = file_get_contents("source/BKK/DevOscar.php");
$class = str_replace("[*[TOKEN]*]",$text,$class);
$class = str_replace("[*[CHANNEL]*]",$channel,$class);
$class = str_replace("[*[ADMIN]*]",$from_id,$class);
$class = str_replace("[*[USERNAME]*]",$un,$class);
file_put_contents("LorexTeam/$un/DevOscar.php",$class);
file_get_contents("https://api.telegram.org/bot".$text."/setwebhook?url=".$folder."/LorexTeam/".$un."/DevOscar.php");
file_put_contents("data0000/$from_id/create.txt","yes");
$user_b = file_get_contents("data0000/$from_id/bots.txt");
$member_b = explode("\n",$user_b);
if (!in_array($un,$member_b)){
$add_bot = file_get_contents("data0000/$from_id/bots.txt");
$add_bot .= $un."\n";
file_put_contents("data0000/$from_id/bots.txt",$add_bot);
}
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
ربات شما با موفقیت به سرور پر قدرت ما متصل شد ⚡️
",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"ورود به ربات 🚀",'url'=>"https://t.me/$un"]],
]
])
]);
$coin = file_get_contents("data0000/$from_id/coin.txt");
settype($coin,"integer");
$newcoin = $coin - 16;
save("data0000/$from_id/coin.txt",$newcoin);
}
}
//===========اسم فامیل=============
elseif($text == "📃| اسم فامیل"){
if($coin >= 10){
file_put_contents("data0000/$from_id/state.txt","pak");
bot('sendMessage',[
'chat_id'=>$chat_id,
 'text'=>"❖| آیدی #کانالت رو بدون | @ | بفرست 🩸",
'parse_mode'=>'HTML',
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"『 برگشت 』"]],
],
'resize_keyboard'=>true
])
]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
📛 امتیاز شما کافی نیست لطفاً امتیاز جمع آوری کنید مجدد به این بخش بازگردید .

💰 امتیاز مورد نیاز ~ | 10 |
🗽 امتیاز شما ~ | $coin |
",
'parse_mode'=>'HTML',
]);
}
}
elseif($state == "pak" && $text !="『 برگشت 』" ){
if($text[0] == '@')$text = substr($text, 1);
if((strlen($text) >50 ) or strpos($text, '/') or strpos($text, '#') or strpos($text, '(') or strpos($text, ')') or strpos($text, '}') or strpos($text, '{') or strpos($text, ']') or strpos($text, '[') or strpos($text, '"') !== false){
bot('sendMessage',[
'chat_id' => $chat_id,
'text' => "
از ارسال کاراکتر های غیر مجاز ب ربات خودداری کنید ☝🏿
",
]);
}elseif(!preg_match('/^([a-zA-Z][a-zA-Z0-9_]{4,31}|)$/', $text)){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>'یوزر اشتباه است ⛔',
]);
}else{
file_put_contents("data0000/$chat_id/pak.txt",$text);
file_put_contents("data0000/$from_id/state.txt","pak1");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"␥| توکن #ربات رو خود را ارسال کنید 🎐",
'parse_mode'=>'Markdown', 
'reply_markup'=>json_encode([ 
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"『 برگشت 』"]],
]
])
]);
}
}
elseif($state == "pak1"){
$userbot = json_decode(file_get_contents("https://api.telegram.org/bot".$text."/getme"),true);
$un = $userbot["result"]["username"];
$ok = $userbot["ok"];
if($ok != 1  or (strlen($text) >50 ) or strpos($text, '#') or strpos($text, '/') or strpos($text, '(') or strpos($text, ')') or strpos($text, '}') or strpos($text, '{') or strpos($text, ']') or strpos($text, '[') or strpos($text, '"') !== false){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
😐❌ توکن شما معتبر نمی باشد!

توکن خود را از @BotFather دریافت کنید🤦‍♂
",
]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'message_id'=>$message_id + 1,
'text'=>'لطفا صبر کنید . . . ! ! ! ❤️'
]);
mkdir("LorexTeam/$un");
mkdir("LorexTeam/$un/data");
touch("LorexTeam/$un/Mahdy");
file_put_contents("LorexTeam/$un/data/my_id.txt","$from_id");
file_put_contents("data0000/$from_id/state.txt","none");
$channel = file_get_contents("data0000/$chat_id/pak.txt");
$class = file_get_contents("source/pak/DevOscar.php");
$class = str_replace("[*[TOKEN]*]",$text,$class);
$class = str_replace("[*[ADMIN]*]",$from_id,$class);
$class = str_replace("[*[USERNAME]*]",$un,$class);
$class = str_replace("[*[CHANNEL]*]",$channel,$class);
file_put_contents("LorexTeam/$un/DevOscar.php",$class);
file_get_contents("https://api.telegram.org/bot".$text."/setwebhook?url=".$folder."/LorexTeam/".$un."/DevOscar.php");
file_put_contents("data0000/$from_id/create.txt","yes");
$user_b = file_get_contents("data0000/$from_id/bots.txt");
$member_b = explode("\n",$user_b);
if (!in_array($un,$member_b)){
$add_bot = file_get_contents("data0000/$from_id/bots.txt");
$add_bot .= $un."\n";
file_put_contents("data0000/$from_id/bots.txt",$add_bot);
}
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
ربات شما با موفقیت به سرور پر قدرت ما متصل شد ⚡️
",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"ورود به ربات 🚀",'url'=>"https://t.me/$un"]],
]
])
]);
$coin = file_get_contents("data0000/$from_id/coin.txt");
settype($coin,"integer");
$newcoin = $coin - 10;
save("data0000/$from_id/coin.txt",$newcoin);
}
}
//==========ویس کده==============
elseif($text == "🗣| ویس کده"){
if($coin >= 13){
file_put_contents("data0000/$from_id/state.txt","voice");
bot('sendMessage',[
'chat_id'=>$chat_id,
 'text'=>"
❖| آیدی #کانالت رو بدون | @ | بفرست 🩸
",
'parse_mode'=>'HTML',
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"『 برگشت 』"]],
],
'resize_keyboard'=>true
])
]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
📛 امتیاز شما کافی نیست لطفاً امتیاز جمع آوری کنید مجدد به این بخش بازگردید .

💰 امتیاز مورد نیاز ~ | 13 |
🗽 امتیاز شما ~ | $coin |
",
'parse_mode'=>'HTML',
]);
}
}
elseif($state == "voice" && $text !="『 برگشت 』" ){
if($text[0] == '@')$text = substr($text, 1);
if((strlen($text) >50 ) or strpos($text, '/') or strpos($text, '(') or strpos($text, ')') or strpos($text, '}') or strpos($text, '{') or strpos($text, ']') or strpos($text, '[') or strpos($text, '#') or strpos($text, '"') !== false){
bot('sendMessage',[
'chat_id' => $chat_id,
'text' => "
از ارسال کاراکتر های غیر مجاز ب ربات خودداری کنید ☝🏿
",
]);
}elseif(!preg_match('/^([a-zA-Z][a-zA-Z0-9_]{4,31}|)$/', $text)){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>'یوزرنیم ارسال شده اشتباه است ⛔️',
]);
}else{
file_put_contents("data0000/$chat_id/voice.txt",$text);
file_put_contents("data0000/$from_id/state.txt","voice1");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"␥| توکن #ربات رو خود را ارسال کنید 🎐",
'parse_mode'=>'Markdown', 
'reply_markup'=>json_encode([ 
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"『 برگشت 』"]],
]
])
]);
}
}
elseif($state == "voice1"){
$userbot = json_decode(file_get_contents("https://api.telegram.org/bot".$text."/getme"),true);
$un = $userbot["result"]["username"];
$ok = $userbot["ok"];
if($ok != 1  or (strlen($text) >50 ) or strpos($text, '/') or strpos($text, '(') or strpos($text, '#') or strpos($text, ')') or strpos($text, '}') or strpos($text, '{') or strpos($text, ']') or strpos($text, '[') or strpos($text, '"') !== false){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
😐❌ توکن شما معتبر نمی باشد!

توکن خود را از @BotFather دریافت کنید🤦‍♂
",
]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'message_id'=>$message_id + 1,
'text'=>'لطفا صبر کنید . . . ! ! ! ❤️'
]);
mkdir("LorexTeam/$un");
mkdir("LorexTeam/$un/data");
touch("LorexTeam/$un/Mahdy");
file_put_contents("LorexTeam/$un/data/my_id.txt","$from_id");
file_put_contents("data0000/$from_id/state.txt","none");
$channel = file_get_contents("data0000/$chat_id/voice.txt");
$class = file_get_contents("source/voice/DevOscar.php");
$class = str_replace("[*[TOKEN]*]",$text,$class);
$class = str_replace("[*[ADMIN]*]",$from_id,$class);
$class = str_replace("[*[USERNAME]*]",$un,$class);
$class = str_replace("[*[CHANNEL]*]",$channel,$class);
file_put_contents("LorexTeam/$un/DevOscar.php",$class);
file_get_contents("https://api.telegram.org/bot".$text."/setwebhook?url=".$folder."/LorexTeam/".$un."/DevOscar.php");
file_put_contents("data0000/$from_id/create.txt","yes");
$user_b = file_get_contents("data0000/$from_id/bots.txt");
$member_b = explode("\n",$user_b);
if (!in_array($un,$member_b)){
$add_bot = file_get_contents("data0000/$from_id/bots.txt");
$add_bot .= $un."\n";
file_put_contents("data0000/$from_id/bots.txt",$add_bot);
}
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
ربات شما با موفقیت به سرور پر قدرت ما متصل شد ⚡️
",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"ورود به ربات 🚀",'url'=>"https://t.me/$un"]],
]
])
]);
$coin = file_get_contents("data0000/$from_id/coin.txt");
settype($coin,"integer");
$newcoin = $coin - 13;
save("data0000/$from_id/coin.txt",$newcoin);
}
}
//==========سنگ کاغذ قیچی==============
elseif($text == "✂️| سنگ کاغذ قیچی"){
if($coin >= 6){
file_put_contents("data0000/$from_id/state.txt","SngKqz");
bot('sendMessage',[
'chat_id'=>$chat_id,
 'text'=>"
❖| آیدی #کانالت رو بدون | @ | بفرست 🩸
",
'parse_mode'=>'HTML',
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"『 برگشت 』"]],
],
'resize_keyboard'=>true
])
]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
📛 امتیاز شما کافی نیست لطفاً امتیاز جمع آوری کنید مجدد به این بخش بازگردید .

💰 امتیاز مورد نیاز ~ | 6 |
🗽 امتیاز شما ~ | $coin |
",
'parse_mode'=>'HTML',
]);
}
}
elseif($state == "SngKqz" && $text != "『 برگشت 』" ){
if($text[0] == '@')$text = substr($text, 1);
if((strlen($text) >50 ) or strpos($text, '/') or strpos($text, '(') or strpos($text, ')') or strpos($text, '}') or strpos($text, '{') or strpos($text, ']') or strpos($text, '[') or strpos($text, '#') or strpos($text, '"') !== false){
bot('sendMessage',[
'chat_id' => $chat_id,
'text' => "
از ارسال کاراکتر های غیر مجاز ب ربات خودداری کنید ☝🏿
",
]);
}elseif(!preg_match('/^([a-zA-Z][a-zA-Z0-9_]{4,31}|)$/', $text)){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>'یوزرنیم ارسال شده اشتباه است ⛔️',
]);
}else{
file_put_contents("data0000/$chat_id/SngKqz.txt",$text);
file_put_contents("data0000/$from_id/state.txt","SngKqz1");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"␥| توکن #ربات رو خود را ارسال کنید 🎐",
'parse_mode'=>'Markdown', 
'reply_markup'=>json_encode([ 
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"『 برگشت 』"]],
]
])
]);
}
}
elseif($state == "SngKqz1"){
$userbot = json_decode(file_get_contents("https://api.telegram.org/bot".$text."/getme"),true);
$un = $userbot["result"]["username"];
$ok = $userbot["ok"];
if($ok != 1  or (strlen($text) >50 ) or strpos($text, '/') or strpos($text, '(') or strpos($text, '#') or strpos($text, ')') or strpos($text, '}') or strpos($text, '{') or strpos($text, ']') or strpos($text, '[') or strpos($text, '"') !== false){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
😐❌ توکن شما معتبر نمی باشد!

توکن خود را از @BotFather دریافت کنید🤦‍♂
",
]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'message_id'=>$message_id + 1,
'text'=>'لطفا صبر کنید . . . ! ! ! ❤️'
]);
mkdir("LorexTeam/$un");
mkdir("LorexTeam/$un/data");
touch("LorexTeam/$un/Mahdy");
file_put_contents("LorexTeam/$un/data/my_id.txt","$from_id");
file_put_contents("data0000/$from_id/state.txt","none");
$channel = file_get_contents("data0000/$chat_id/SngKqz.txt");
$class = file_get_contents("source/SngKqz/DevOscar.php");
$class = str_replace("[*[TOKEN]*]",$text,$class);
$class = str_replace("[*[ADMIN]*]",$from_id,$class);
$class = str_replace("[*[USERNAME]*]",$un,$class);
$class = str_replace("[*[CHANNEL]*]",$channel,$class);
file_put_contents("LorexTeam/$un/DevOscar.php",$class);
file_get_contents("https://api.telegram.org/bot".$text."/setwebhook?url=".$folder."/LorexTeam/".$un."/DevOscar.php");
file_put_contents("data0000/$from_id/create.txt","yes");
$user_b = file_get_contents("data0000/$from_id/bots.txt");
$member_b = explode("\n",$user_b);
if (!in_array($un,$member_b)){
$add_bot = file_get_contents("data0000/$from_id/bots.txt");
$add_bot .= $un."\n";
file_put_contents("data0000/$from_id/bots.txt",$add_bot);
}
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
ربات شما با موفقیت به سرور پر قدرت ما متصل شد ⚡️
",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"ورود به ربات 🚀",'url'=>"https://t.me/$un"]],
]
])
]);
$coin = file_get_contents("data0000/$from_id/coin.txt");
settype($coin,"integer");
$newcoin = $coin - 6;
save("data0000/$from_id/coin.txt",$newcoin);
}
}
//===============صصکی نوع دوم==================
elseif($text == "نوع دوم 💧"){
if($coin >= 10){
file_put_contents("data0000/$from_id/state.txt","soski");
bot('sendMessage',[
'chat_id'=>$chat_id,
 'text'=>"
 ␥| توکن #ربات رو خود را ارسال کنید 🎐

⚠️ نکته : حتما وارد پنل ربات خود شوید و چنل خودتونو از اونجا نیز تنظیم کنید
",
'parse_mode'=>'HTML',
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"『 برگشت 』"]],
],
'resize_keyboard'=>true
])
]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
📛 امتیاز شما کافی نیست لطفاً امتیاز جمع آوری کنید مجدد به این بخش بازگردید .

💰 امتیاز مورد نیاز ~ | 10 |
🗽 امتیاز شما ~ | $coin |
",
'parse_mode'=>'HTML',
]);
}
}
elseif($state == "soski"){
$userbot = json_decode(file_get_contents("https://api.telegram.org/bot".$text."/getme"),true);
$un = $userbot["result"]["username"];
$ok = $userbot["ok"];
if($ok != 1  or (strlen($text) >50 ) or strpos($text, '/') or strpos($text, '(') or strpos($text, '#') or strpos($text, ')') or strpos($text, '}') or strpos($text, '{') or strpos($text, ']') or strpos($text, '[') or strpos($text, '"') !== false){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
😐❌ توکن شما معتبر نمی باشد!

توکن خود را از @BotFather دریافت کنید🤦‍♂
",
]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'message_id'=>$message_id + 1,
'text'=>'لطفا صبر کنید . . . ! ! ! ❤️'
]);
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
mkdir("LorexTeam/$un");
mkdir("LorexTeam/$un/data");
touch("LorexTeam/$un/Mahdy");
file_put_contents("LorexTeam/$un/data/my_id.txt","$from_id");
file_put_contents("data0000/$from_id/state.txt","none");
$channel = file_get_contents("data0000/$chat_id/soski.txt");
$class = file_get_contents("source/soski/DevOscar.php");
$class = str_replace("[*[TOKEN]*]",$text,$class);
$class = str_replace("[*[ADMIN]*]",$from_id,$class);
$class = str_replace("[*[USERNAME]*]",$un,$class);
file_put_contents("LorexTeam/$un/DevOscar.php",$class);
copy("source/soski/jdf.php","LorexTeam/$un/jdf.php");
file_get_contents("https://api.telegram.org/bot".$text."/setwebhook?url=".$folder."/LorexTeam/".$un."/DevOscar.php");
file_put_contents("data0000/$from_id/create.txt","yes");
$user_b = file_get_contents("data0000/$from_id/bots.txt");
$member_b = explode("\n",$user_b);
if (!in_array($un,$member_b)){
$add_bot = file_get_contents("data0000/$from_id/bots.txt");
$add_bot .= $un."\n";
file_put_contents("data0000/$from_id/bots.txt",$add_bot);
}
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
ربات شما با موفقیت به سرور پر قدرت ما متصل شد ⚡️
",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"ورود به ربات 🚀",'url'=>"https://t.me/$un"]],
]
])
]);
$coin = file_get_contents("data0000/$from_id/coin.txt");
settype($coin,"integer");
$newcoin = $coin - 10;
save("data0000/$from_id/coin.txt",$newcoin);
}
}
//---------------------
elseif($text == "🍫| سرگرمی گروه"){
if($coin >= 10){
file_put_contents("data0000/$from_id/state.txt","sargarmi");
bot('sendMessage',[
'chat_id'=>$chat_id,
 'text'=>"
❖| آیدی #کانالت رو بدون | @ | بفرست 🩸
",
'parse_mode'=>'HTML',
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"『 برگشت 』"]],
],
'resize_keyboard'=>true
])
]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
📛 امتیاز شما کافی نیست لطفاً امتیاز جمع آوری کنید مجدد به این بخش بازگردید .

💰 امتیاز مورد نیاز ~ | 10 |
🗽 امتیاز شما ~ | $coin |
",
'parse_mode'=>'HTML',
]);
}
}
elseif($state == "sargarmi" && $text !="『 برگشت 』" ){
if($text[0] == '@')$text = substr($text, 1);
if((strlen($text) >50 ) or strpos($text, '/') or strpos($text, '(') or strpos($text, ')') or strpos($text, '}') or strpos($text, '{') or strpos($text, ']') or strpos($text, '[') or strpos($text, '#') or strpos($text, '"') !== false){
bot('sendMessage',[
'chat_id' => $chat_id,
'text' => "
از ارسال کاراکتر های غیر مجاز ب ربات خودداری کنید ☝🏿
",
]);
}elseif(!preg_match('/^([a-zA-Z][a-zA-Z0-9_]{4,31}|)$/', $text)){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>'یوزرنیم ارسال شده اشتباه است ⛔️',
]);
}else{
file_put_contents("data0000/$chat_id/sargarmi.txt",$text);
file_put_contents("data0000/$from_id/state.txt","sargarmi1");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"␥| توکن #ربات رو خود را ارسال کنید 🎐",
'parse_mode'=>'Markdown', 
'reply_markup'=>json_encode([ 
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"『 برگشت 』"]],
]
])
]);
}
}
elseif($state == "sargarmi1"){
$userbot = json_decode(file_get_contents("https://api.telegram.org/bot".$text."/getme"),true);
$un = $userbot["result"]["username"];
$ok = $userbot["ok"];
if($ok != 1){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
😐❌ توکن شما معتبر نمی باشد!

توکن خود را از @BotFather دریافت کنید🤦‍♂
",
]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'message_id'=>$message_id + 1,
'text'=>'لطفا صبر کنید . . . ! ! ! ❤️'
]);
mkdir("LorexTeam/$un");
mkdir("LorexTeam/$un/data");
touch("LorexTeam/$un/Mahdy");
file_put_contents("LorexTeam/$un/data/my_id.txt","$from_id");
file_put_contents("data0000/$from_id/state.txt","none");
$channel = file_get_contents("data0000/$chat_id/sargarmi.txt");
$class = file_get_contents("source/sargarmi/DevOscar.php");
$class = str_replace("[*[TOKEN]*]",$text,$class);
$class = str_replace("[*[ADMIN]*]",$from_id,$class);
$class = str_replace("[*[USERNAME]*]",$un,$class);
$class = str_replace("[*[CHANNEL]*]",$channel,$class);
file_put_contents("LorexTeam/$un/DevOscar.php",$class);
file_get_contents("https://api.telegram.org/bot".$text."/setwebhook?url=".$folder."/LorexTeam/".$un."/DevOscar.php");
file_put_contents("data0000/$from_id/create.txt","yes");
$user_b = file_get_contents("data0000/$from_id/bots.txt");
$member_b = explode("\n",$user_b);
if (!in_array($un,$member_b)){
$add_bot = file_get_contents("data0000/$from_id/bots.txt");
$add_bot .= $un."\n";
file_put_contents("data0000/$from_id/bots.txt",$add_bot);
}
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
ربات شما با موفقیت به سرور پر قدرت ما متصل شد ⚡️

⚠️ نکته : حتما داخل گروه ادمین بشه
",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"ورود به ربات 🚀",'url'=>"https://t.me/$un"]],
]
])
]);
$coin = file_get_contents("data0000/$from_id/coin.txt");
settype($coin,"integer");
$newcoin = $coin - 10;
save("data0000/$from_id/coin.txt",$newcoin);
}
}
//---------------------
elseif($text == "🏦| بانک امتیاز"){
if($coin >= 20){
file_put_contents("data0000/$from_id/state.txt","Bank");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
␥| توکن #ربات رو خود را ارسال کنید 🎐
",
'parse_mode'=>'HTML',
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"『 برگشت 』"]],
],
'resize_keyboard'=>true
])
]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
📛 امتیاز شما کافی نیست لطفاً امتیاز جمع آوری کنید مجدد به این بخش بازگردید .

💰 امتیاز مورد نیاز ~ | 20 |
🗽 امتیاز شما ~ | $coin |
",
'parse_mode'=>'HTML',
]);
}
}
elseif($state == "Bank"){
$userbot = json_decode(file_get_contents("https://api.telegram.org/bot".$text."/getme"),true);
$un = $userbot["result"]["username"];
$ok = $userbot["ok"];
if($ok != 1  or (strlen($text) >50 ) or strpos($text, '/') or strpos($text, '(') or strpos($text, '#') or strpos($text, ')') or strpos($text, '}') or strpos($text, '{') or strpos($text, ']') or strpos($text, '[') or strpos($text, '"') !== false){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
😐❌ توکن شما معتبر نمی باشد!

توکن خود را از @BotFather دریافت کنید🤦‍♂
",
]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'message_id'=>$message_id + 1,
'text'=>'لطفا صبر کنید . . . ! ! ! ❤️'
]);
mkdir("LorexTeam/$un");
mkdir("LorexTeam/$un/data");
touch("LorexTeam/$un/Mahdy");
file_put_contents("LorexTeam/$un/data/my_id.txt","$from_id");
file_put_contents("data0000/$from_id/state.txt","none");
$class = file_get_contents("source/Bank/DevOscar.php");
$class = str_replace("[*[TOKEN]*]",$text,$class);
$class = str_replace("[*[ADMIN]*]",$from_id,$class);
$class = str_replace("[*[USERNAME]*]",$un,$class);
file_put_contents("LorexTeam/$un/DevOscar.php",$class);
file_get_contents("https://api.telegram.org/bot".$text."/setwebhook?url=".$folder."/LorexTeam/".$un."/DevOscar.php");
file_put_contents("data0000/$from_id/create.txt","yes");
$user_b = file_get_contents("data0000/$from_id/bots.txt");
$member_b = explode("\n",$user_b);
if (!in_array($un,$member_b)){
$add_bot = file_get_contents("data0000/$from_id/bots.txt");
$add_bot .= $un."\n";
file_put_contents("data0000/$from_id/bots.txt",$add_bot);
}
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
ربات شما با موفقیت به سرور پر قدرت ما متصل شد ⚡️
",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"ورود به ربات 🚀",'url'=>"https://t.me/$un"]],
]
])
]);
$coin = file_get_contents("data0000/$from_id/coin.txt");
settype($coin,"integer");
$newcoin = $coin - 20;
save("data0000/$from_id/coin.txt",$newcoin);
}
}
//===============جنگ قبایل=================
elseif($text == "🎅| کلش آف کلنز"){
if($coin >= 30){
file_put_contents("data0000/$from_id/state.txt","Jng");
bot('sendMessage',[
'chat_id'=>$chat_id,
 'text'=>"
❖| آیدی #کانالت رو بدون | @ | بفرست 🩸 

⚠️ حتما از پنل مدیریت نیز چنل خود را تنظیم کنید
",
'parse_mode'=>'HTML',
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"『 برگشت 』"]],
],
'resize_keyboard'=>true
])
]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
📛 امتیاز شما کافی نیست لطفاً امتیاز جمع آوری کنید مجدد به این بخش بازگردید .

💰 امتیاز مورد نیاز ~ | 30 |
🗽 امتیاز شما ~ | $coin |
",
'parse_mode'=>'HTML',
]);
}
}
elseif($state == "Jng" && $text !="『 برگشت 』" ){
if($text[0] == '@')$text = substr($text, 1);
if((strlen($text) >50 ) or strpos($text, '/') or strpos($text, '(') or strpos($text, ')') or strpos($text, '}') or strpos($text, '{') or strpos($text, ']') or strpos($text, '[') or strpos($text, '#') or strpos($text, '"') !== false){
bot('sendMessage',[
'chat_id' => $chat_id,
'text' => "
از ارسال کاراکتر های غیر مجاز ب ربات خودداری کنید ☝🏿
",
]);
}elseif(!preg_match('/^([a-zA-Z][a-zA-Z0-9_]{4,31}|)$/', $text)){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>'یوزرنیم ارسال شده اشتباه است ⛔️',
]);
}else{
file_put_contents("data0000/$chat_id/Jng.txt",$text);
file_put_contents("data0000/$from_id/state.txt","Jng1");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"␥| توکن #ربات رو خود را ارسال کنید 🎐",
'parse_mode'=>'Markdown', 
'reply_markup'=>json_encode([ 
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"『 برگشت 』"]],
]
])
]);
}
}
elseif($state == "Jng1"){
$userbot = json_decode(file_get_contents("https://api.telegram.org/bot".$text."/getme"),true);
$un = $userbot["result"]["username"];
$ok = $userbot["ok"];
if($ok != 1  or (strlen($text) >50 ) or strpos($text, '/') or strpos($text, '(') or strpos($text, '#') or strpos($text, ')') or strpos($text, '}') or strpos($text, '{') or strpos($text, ']') or strpos($text, '[') or strpos($text, '"') !== false){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
😐❌ توکن شما معتبر نمی باشد!

توکن خود را از @BotFather دریافت کنید🤦‍♂
",
]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'message_id'=>$message_id + 1,
'text'=>'لطفا صبر کنید . . . ! ! ! ❤️'
]);
mkdir("LorexTeam/$un");
mkdir("LorexTeam/$un/data");
mkdir("LorexTeam/$un/clans");
mkdir("LorexTeam/$un/clans/config");
mkdir("LorexTeam/$un/codes");
mkdir("LorexTeam/$un/enemy");
mkdir("LorexTeam/$un/event");
mkdir("LorexTeam/$un/revenge");
mkdir("LorexTeam/$un/users");
touch("LorexTeam/$un/Mahdy");
file_put_contents("LorexTeam/$un/data/my_id.txt","$from_id");
file_put_contents("data0000/$from_id/state.txt","none");
$channel = file_get_contents("data0000/$chat_id/Jng.txt");
$class = file_get_contents("source/Jng/lvp.php");
$class = str_replace("[*[ADMIN]*]",$from_id,$class);
$class = str_replace("[*[USERNAME]*]",$un,$class);
$class = str_replace("[*[CHANNEL]*]",$channel,$class);
file_put_contents ("LorexTeam/$un/lvp.php","$class");
$class = file_get_contents("source/Jng/telegram.php");
$class = str_replace("[*[ADMIN]*]",$from_id,$class);
$class = str_replace("[*[USERNAME]*]",$un,$class);
$class = str_replace("[*[CHANNEL]*]",$channel,$class);
file_put_contents ("LorexTeam/$un/telegram.php","$class");
$class = file_get_contents("source/Jng/index.php");
$class = str_replace("[*[TOKEN]*]",$text,$class);
$class = str_replace("[*[ADMIN]*]",$from_id,$class);
$class = str_replace("[*[USERNAME]*]",$un,$class);
$class = str_replace("[*[CHANNEL]*]",$channel,$class);
file_put_contents("LorexTeam/$un/index.php",$class);
copy("source/Jng/blocklist.txt","LorexTeam/$un/blocklist.txt");
copy("source/Jng/eshtrak.txt","LorexTeam/$un/eshtrak.txt");
copy("source/Jng/shop.txt","LorexTeam/$un/shop.txt");
copy("source/Jng/useridclash.txt","LorexTeam/$un/useridclash.txt");
file_get_contents("https://api.telegram.org/bot".$text."/setwebhook?url=".$folder."/LorexTeam/".$un."/index.php");
file_put_contents("data0000/$from_id/create.txt","yes");
$user_b = file_get_contents("data0000/$from_id/bots.txt");
$member_b = explode("\n",$user_b);
if (!in_array($un,$member_b)){
$add_bot = file_get_contents("data0000/$from_id/bots.txt");
$add_bot .= $un."\n";
file_put_contents("data0000/$from_id/bots.txt",$add_bot);
}
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
ربات شما با موفقیت به سرور پر قدرت ما متصل شد ⚡️
",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"ورود به ربات 🔴",'url'=>"https://t.me/$un"]],
]
])
]);
$coin = file_get_contents("data0000/$from_id/coin.txt");
settype($coin,"integer");
$newcoin = $coin - 30;
save("data0000/$from_id/coin.txt",$newcoin);
}
}
//-----------------------------
elseif($text == "📦| ویو پنل"){
if($coin >= 25){
file_put_contents("data0000/$from_id/state.txt","ViewPanel");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"␥| توکن #ربات رو خود را ارسال کنید 🎐",
'parse_mode'=>'HTML',
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"『 برگشت 』"]],
],
'resize_keyboard'=>true
])
]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
📛 امتیاز شما کافی نیست لطفاً امتیاز جمع آوری کنید مجدد به این بخش بازگردید .

💰 امتیاز مورد نیاز ~ | 25 |
🗽 امتیاز شما ~ | $coin |
",
'parse_mode'=>'HTML',
]);
}
}
elseif($state == "ViewPanel"){
$userbot = json_decode(file_get_contents("https://api.telegram.org/bot".$text."/getme"),true);
$un = $userbot["result"]["username"];
$ok = $userbot["ok"];
if($ok != 1  or (strlen($text) >50 ) or strpos($text, '#') or strpos($text, '/') or strpos($text, '(') or strpos($text, ')') or strpos($text, '}') or strpos($text, '{') or strpos($text, ']') or strpos($text, '[') or strpos($text, '"') !== false){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
😐❌ توکن شما معتبر نمی باشد!

توکن خود را از @BotFather دریافت کنید🤦‍♂
",
]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'message_id'=>$message_id + 1,
'text'=>'لطفا صبر کنید . . . ! ! ! ❤️'
]);
mkdir("LorexTeam/$un");
mkdir("LorexTeam/$un/data");
touch("LorexTeam/$un/Mahdy");
file_put_contents("LorexTeam/$un/data/my_id.txt","$from_id");
file_put_contents("data0000/$from_id/state.txt","none");
$class = file_get_contents("source/ViewPanel/DevOscar.php");
$class = str_replace("[*[TOKEN]*]",$text,$class);
$class = str_replace("[*[ADMIN]*]",$from_id,$class);
$class = str_replace("[*[USERNAME]*]",$un,$class);
file_put_contents("LorexTeam/$un/DevOscar.php",$class);
file_get_contents("https://api.telegram.org/bot".$text."/setwebhook?url=".$folder."/LorexTeam/".$un."/DevOscar.php");
file_put_contents("data0000/$from_id/create.txt","yes");
$user_b = file_get_contents("data0000/$from_id/bots.txt");
$member_b = explode("\n",$user_b);
if (!in_array($un,$member_b)){
$add_bot = file_get_contents("data0000/$from_id/bots.txt");
$add_bot .= $un."\n";
file_put_contents("data0000/$from_id/bots.txt",$add_bot);
}
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
ربات شما با موفقیت به سرور پر قدرت ما متصل شد ⚡️
",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"ورود به ربات 🚀",'url'=>"https://t.me/$un"]],
]
])
]);
$coin = file_get_contents("data0000/$from_id/coin.txt");
settype($coin,"integer");
$newcoin = $coin - 25;
save("data0000/$from_id/coin.txt",$newcoin);
}
}
//===========صصکی نوع اول===============
elseif($text == "نوع اول 💦"){
if($coin >= 16){
file_put_contents("data0000/$from_id/state.txt","hal");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"␥| توکن #ربات رو خود را ارسال کنید 🎐",
'parse_mode'=>'HTML',
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"『 برگشت 』"]],
],
'resize_keyboard'=>true
])
]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
📛 امتیاز شما کافی نیست لطفاً امتیاز جمع آوری کنید مجدد به این بخش بازگردید .

💰 امتیاز مورد نیاز ~ | 16 |
🗽 امتیاز شما ~ | $coin |
",
'parse_mode'=>'HTML',
]);
}
}
elseif($state == "hal"){
$userbot = json_decode(file_get_contents("https://api.telegram.org/bot".$text."/getme"),true);
$un = $userbot["result"]["username"];
$ok = $userbot["ok"];
if($ok != 1  or (strlen($text) >50 ) or strpos($text, '#') or strpos($text, '/') or strpos($text, '(') or strpos($text, ')') or strpos($text, '}') or strpos($text, '{') or strpos($text, ']') or strpos($text, '[') or strpos($text, '"') !== false){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
😐❌ توکن شما معتبر نمی باشد!

توکن خود را از @BotFather دریافت کنید🤦‍♂
",
]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'message_id'=>$message_id + 1,
'text'=>'لطفا صبر کنید . . . ! ! ! ❤️'
]);
mkdir("LorexTeam/$un");
mkdir("LorexTeam/$un/data");
touch("LorexTeam/$un/Mahdy");
file_put_contents("LorexTeam/$un/data/my_id.txt","$from_id");
file_put_contents("data0000/$from_id/state.txt","none");
$class = file_get_contents("source/hal/DevOscar.php");
$class = str_replace("[*[TOKEN]*]",$text,$class);
$class = str_replace("[*[ADMIN]*]",$from_id,$class);
file_put_contents("LorexTeam/$un/DevOscar.php",$class);
file_get_contents("https://api.telegram.org/bot".$text."/setwebhook?url=".$folder."/LorexTeam/".$un."/DevOscar.php");
file_put_contents("data0000/$from_id/create.txt","yes");
$user_b = file_get_contents("data0000/$from_id/bots.txt");
$member_b = explode("\n",$user_b);
if (!in_array($un,$member_b)){
$add_bot = file_get_contents("data0000/$from_id/bots.txt");
$add_bot .= $un."\n";
file_put_contents("data0000/$from_id/bots.txt",$add_bot);
}
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
ربات شما با موفقیت به سرور پر قدرت ما متصل شد ⚡️
",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"ورود به ربات 🚀",'url'=>"https://t.me/$un"]],
]
])
]);
$coin = file_get_contents("data0000/$from_id/coin.txt");
settype($coin,"integer");
$newcoin = $coin - 16;
save("data0000/$from_id/coin.txt",$newcoin);
}
}
//-------------------------------
elseif($text == "💸| شرط بندی"){
if($coin >= 25){
file_put_contents("data0000/$from_id/state.txt","Shart");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"␥| توکن #ربات رو خود را ارسال کنید 🎐",
'parse_mode'=>'HTML',
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"『 برگشت 』"]],
],
'resize_keyboard'=>true
])
]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
📛 امتیاز شما کافی نیست لطفاً امتیاز جمع آوری کنید مجدد به این بخش بازگردید .

💰 امتیاز مورد نیاز ~ | 25 |
🗽 امتیاز شما ~ | $coin |
",
'parse_mode'=>'HTML',
]);
}
}
elseif($state == "Shart"){
$userbot = json_decode(file_get_contents("https://api.telegram.org/bot".$text."/getme"),true);
$un = $userbot["result"]["username"];
$ok = $userbot["ok"];
if($ok != 1  or (strlen($text) >50 ) or strpos($text, '#') or strpos($text, '/') or strpos($text, '(') or strpos($text, ')') or strpos($text, '}') or strpos($text, '{') or strpos($text, ']') or strpos($text, '[') or strpos($text, '"') !== false){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
😐❌ توکن شما معتبر نمی باشد!

توکن خود را از @BotFather دریافت کنید🤦‍♂
",
]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'message_id'=>$message_id + 1,
'text'=>'لطفا صبر کنید . . . ! ! ! ❤️'
]);
mkdir("LorexTeam/$un");
mkdir("LorexTeam/$un/data");
touch("LorexTeam/$un/Mahdy");
file_put_contents("LorexTeam/$un/data/my_id.txt","$from_id");
file_put_contents("data0000/$from_id/state.txt","none");
$channel = file_get_contents("data0000/$chat_id/Shart.txt");
$class = file_get_contents("source/Shart/DevOscar.php");
$class = str_replace("[*[TOKEN]*]",$text,$class);
$class = str_replace("[*[ADMIN]*]",$from_id,$class);
$class = str_replace("[*[USERNAME]*]",$un,$class);
file_put_contents("LorexTeam/$un/DevOscar.php",$class);
file_get_contents("https://api.telegram.org/bot".$text."/setwebhook?url=".$folder."/LorexTeam/".$un."/DevOscar.php");
file_put_contents("data0000/$from_id/create.txt","yes");
$user_b = file_get_contents("data0000/$from_id/bots.txt");
$member_b = explode("\n",$user_b);
if (!in_array($un,$member_b)){
$add_bot = file_get_contents("data0000/$from_id/bots.txt");
$add_bot .= $un."\n";
file_put_contents("data0000/$from_id/bots.txt",$add_bot);
}
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
ربات شما با موفقیت به سرور پر قدرت ما متصل شد ⚡️
",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"ورود به ربات 🚀",'url'=>"https://t.me/$un"]],
]
])
]);
$coin = file_get_contents("data0000/$from_id/coin.txt");
settype($coin,"integer");
$newcoin = $coin - 25;
save("data0000/$from_id/coin.txt",$newcoin);
}
}
//====================================
elseif($text == "🔊| ادیتور موزیک"){
if($coin >= 2){
file_put_contents("data0000/$from_id/state.txt","MusicEdit");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
␥| توکن #ربات رو خود را ارسال کنید 🎐
",
'parse_mode'=>'HTML',
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"『 برگشت 』"]],
],
'resize_keyboard'=>true
])
]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
📛 امتیاز شما کافی نیست لطفاً امتیاز جمع آوری کنید مجدد به این بخش بازگردید .
  
💰 امتیاز مورد نیاز ~ | 2 |
🗽 امتیاز شما ~ | $coin |
",
'parse_mode'=>'HTML',
]);
}
}
elseif($state == "MusicEdit"){
$userbot = json_decode(file_get_contents("https://api.telegram.org/bot".$text."/getme"),true);
$un = $userbot["result"]["username"];
$ok = $userbot["ok"];
if($ok != 1  or (strlen($text) >50 ) or strpos($text, '#') or strpos($text, '/') or strpos($text, '(') or strpos($text, ')') or strpos($text, '}') or strpos($text, '{') or strpos($text, ']') or strpos($text, '[') or strpos($text, '"') !== false){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
😐❌ توکن شما معتبر نمی باشد!
  
توکن خود را از @BotFather دریافت کنید🤦‍♂
",
]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'message_id'=>$message_id + 1,
'text'=>'لطفا صبر کنید . . . ! ! ! ❤️'
]);
mkdir("LorexTeam/$un");
mkdir("LorexTeam/$un/data");
touch("LorexTeam/$un/Mahdy");
file_put_contents("LorexTeam/$un/data/my_id.txt","$from_id");
file_put_contents("data0000/$from_id/state.txt","none");
$class = file_get_contents("source/MusicEdit/DevOscar.php");
$class = str_replace("[*[TOKEN]*]",$text,$class);
file_put_contents("LorexTeam/$un/DevOscar.php",$class);
file_get_contents("https://api.telegram.org/bot".$text."/setwebhook?url=".$folder."/LorexTeam/".$un."/DevOscar.php");
file_put_contents("data0000/$from_id/create.txt","yes");
$user_b = file_get_contents("data0000/$from_id/bots.txt");
$member_b = explode("\n",$user_b);
if (!in_array($un,$member_b)){
$add_bot = file_get_contents("data0000/$from_id/bots.txt");
$add_bot .= $un."\n";
file_put_contents("data0000/$from_id/bots.txt",$add_bot);
}
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
ربات شما با موفقیت به سرور پر قدرت ما متصل شد ⚡️
",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"ورود به ربات 🚀",'url'=>"https://t.me/$un"]],
]
])
]);
$coin = file_get_contents("data0000/$from_id/coin.txt");
settype($coin,"integer");
$newcoin = $coin - 2;
save("data0000/$from_id/coin.txt",$newcoin);
}
}
//===================================
elseif($text == "🖥| ضد اسپم چنل"){
if($coin >= 15){
file_put_contents("data0000/$from_id/state.txt","ChannelAnti");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
␥| توکن #ربات رو خود را ارسال کنید 🎐
",
'parse_mode'=>'HTML',
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"『 برگشت 』"]],
],
'resize_keyboard'=>true
])
]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
📛 امتیاز شما کافی نیست لطفاً امتیاز جمع آوری کنید مجدد به این بخش بازگردید .
  
💰 امتیاز مورد نیاز ~ | 15 |
🗽 امتیاز شما ~ | $coin |
",
'parse_mode'=>'HTML',
]);
}
}
elseif($state == "ChannelAnti"){
$userbot = json_decode(file_get_contents("https://api.telegram.org/bot".$text."/getme"),true);
$un = $userbot["result"]["username"];
$ok = $userbot["ok"];
if($ok != 1  or (strlen($text) >50 ) or strpos($text, '#') or strpos($text, '/') or strpos($text, '(') or strpos($text, ')') or strpos($text, '}') or strpos($text, '{') or strpos($text, ']') or strpos($text, '[') or strpos($text, '"') !== false){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
😐❌ توکن شما معتبر نمی باشد!
  
توکن خود را از @BotFather دریافت کنید🤦‍♂
",
]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'message_id'=>$message_id + 1,
'text'=>'لطفا صبر کنید . . . ! ! ! ❤️'
]);
mkdir("LorexTeam/$un");
mkdir("LorexTeam/$un/data");
touch("LorexTeam/$un/Mahdy");
file_put_contents("LorexTeam/$un/data/my_id.txt","$from_id");
file_put_contents("data0000/$from_id/state.txt","none");
$class = file_get_contents("source/ChannelAnti/DevOscar.php");
$class = str_replace("[*[TOKEN]*]",$text,$class);
$class = str_replace("[*[ADMIN]*]",$from_id,$class);
file_put_contents("LorexTeam/$un/DevOscar.php",$class);
file_get_contents("https://api.telegram.org/bot".$text."/setwebhook?url=".$folder."/LorexTeam/".$un."/DevOscar.php");
file_put_contents("data0000/$from_id/create.txt","yes");
$user_b = file_get_contents("data0000/$from_id/bots.txt");
$member_b = explode("\n",$user_b);
if (!in_array($un,$member_b)){
$add_bot = file_get_contents("data0000/$from_id/bots.txt");
$add_bot .= $un."\n";
file_put_contents("data0000/$from_id/bots.txt",$add_bot);
}
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
ربات شما با موفقیت به سرور پر قدرت ما متصل شد ⚡️
",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"ورود به ربات 🚀",'url'=>"https://t.me/$un"]],
]
])
]);
$coin = file_get_contents("data0000/$from_id/coin.txt");
settype($coin,"integer");
$newcoin = $coin - 15;
save("data0000/$from_id/coin.txt",$newcoin);
}
}
//----------------------------
elseif($text == "👁‍🗨| ویوگیر"){
if($coin >= 30){
file_put_contents("data0000/$from_id/state.txt","ViewGir");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
␥| توکن #ربات رو خود را ارسال کنید 🎐
",
'parse_mode'=>'HTML',
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"『 برگشت 』"]],
],
'resize_keyboard'=>true
])
]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
📛 امتیاز شما کافی نیست لطفاً امتیاز جمع آوری کنید مجدد به این بخش بازگردید .

💰 امتیاز مورد نیاز ~ | 30 |
🗽 امتیاز شما ~ | $coin |
",
'parse_mode'=>'HTML',
]);
}
}
elseif($state == "ViewGir"){
$userbot = json_decode(file_get_contents("https://api.telegram.org/bot".$text."/getme"),true);
$un = $userbot["result"]["username"];
$ok = $userbot["ok"];
if($ok != 1  or (strlen($text) >50 ) or strpos($text, '#') or strpos($text, '/') or strpos($text, '(') or strpos($text, ')') or strpos($text, '}') or strpos($text, '{') or strpos($text, ']') or strpos($text, '[') or strpos($text, '"') !== false){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
😐❌ توکن شما معتبر نمی باشد!

توکن خود را از @BotFather دریافت کنید🤦‍♂
",
]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'message_id'=>$message_id + 1,
'text'=>'لطفا صبر کنید . . . ! ! ! ❤️'
]);
mkdir("LorexTeam/$un");
mkdir("LorexTeam/$un/data");
touch("LorexTeam/$un/Mahdy");
file_put_contents("LorexTeam/$un/data/my_id.txt","$from_id");
file_put_contents("data0000/$from_id/state.txt","none");
$channel = file_get_contents("data0000/$chat_id/ViewGir.txt");
$class = file_get_contents("source/ViewGir/DevOscar.php");
$class = str_replace("[*[TOKEN]*]",$text,$class);
$class = str_replace("[*[ADMIN]*]",$from_id,$class);
$class = str_replace("[*[USERNAME]*]",$un,$class);
file_put_contents("LorexTeam/$un/DevOscar.php",$class);
file_get_contents("https://api.telegram.org/bot".$text."/setwebhook?url=".$folder."/LorexTeam/".$un."/DevOscar.php");
file_put_contents("data0000/$from_id/create.txt","yes");
$user_b = file_get_contents("data0000/$from_id/bots.txt");
$member_b = explode("\n",$user_b);
if (!in_array($un,$member_b)){
$add_bot = file_get_contents("data0000/$from_id/bots.txt");
$add_bot .= $un."\n";
file_put_contents("data0000/$from_id/bots.txt",$add_bot);
}
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
ربات شما با موفقیت به سرور پر قدرت ما متصل شد ⚡️
",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"ورود به ربات 🚀",'url'=>"https://t.me/$un"]],
]
])
]);
$coin = file_get_contents("data0000/$from_id/coin.txt");
settype($coin,"integer");
$newcoin = $coin - 30;
save("data0000/$from_id/coin.txt",$newcoin);
}
}
//---------------------------------
elseif($text == "🐺| ضدلینک"){
if($coin >= 30){
file_put_contents("data0000/$from_id/state.txt","Zdlink");
bot('sendMessage',[
'chat_id'=>$chat_id,
 'text'=>"
❖| آیدی #کانالت رو بدون | @ | بفرست 🩸
",
'parse_mode'=>'HTML',
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"『 برگشت 』"]],
],
'resize_keyboard'=>true
])
]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
📛 امتیاز شما کافی نیست لطفاً امتیاز جمع آوری کنید مجدد به این بخش بازگردید .

💰 امتیاز مورد نیاز ~ | 30 |
🗽 امتیاز شما ~ | $coin |
",
'parse_mode'=>'HTML',
]);
}
}
elseif($state == "Zdlink" && $text !="『 برگشت 』" ){
if($text[0] == '@')$text = substr($text, 1);
if((strlen($text) >50 ) or strpos($text, '/') or strpos($text, '#') or strpos($text, '(') or strpos($text, ')') or strpos($text, '}') or strpos($text, '{') or strpos($text, ']') or strpos($text, '[') or strpos($text, '"') !== false){
bot('sendMessage',[
'chat_id' => $chat_id,
'text' => "
از ارسال کاراکتر های غیر مجاز ب ربات خودداری کنید ☝🏿
",
]);
}elseif(!preg_match('/^([a-zA-Z][a-zA-Z0-9_]{4,31}|)$/', $text)){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>'یوزرنیم ارسال شده اشتباه است ⛔️',
]);
}else{
file_put_contents("data0000/$chat_id/Zdlink.txt",$text);
file_put_contents("data0000/$from_id/state.txt","Zdlink1");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"␥| توکن #ربات رو خود را ارسال کنید 🎐",
'parse_mode'=>'Markdown', 
'reply_markup'=>json_encode([ 
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"『 برگشت 』"]],
]
])
]);
}
}
elseif($state == "Zdlink1"){
$userbot = json_decode(file_get_contents("https://api.telegram.org/bot".$text."/getme"),true);
$un = $userbot["result"]["username"];
$ok = $userbot["ok"];
if($ok != 1  or (strlen($text) >50 ) or strpos($text, '#') or strpos($text, '/') or strpos($text, '(') or strpos($text, ')') or strpos($text, '}') or strpos($text, '{') or strpos($text, ']') or strpos($text, '[') or strpos($text, '"') !== false){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
😐❌ توکن شما معتبر نمی باشد!

توکن خود را از @BotFather دریافت کنید🤦‍♂
",
]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'message_id'=>$message_id + 1,
'text'=>'لطفا صبر کنید . . . ! ! ! ❤️'
]);
mkdir("LorexTeam/$un");
mkdir("LorexTeam/$un/data");
mkdir("LorexTeam/$un/other");
touch("LorexTeam/$un/Mahdy");
file_put_contents("LorexTeam/$un/data/my_id.txt","$from_id");
file_put_contents("LorexTeam/$un/data/group.txt"," ");
file_put_contents("data0000/$from_id/state.txt","none");
$channel = file_get_contents("data0000/$chat_id/Zdlink.txt");
$class = file_get_contents("source/Zdlink/DevOscar.php");
$class = str_replace("[*[TOKEN]*]",$text,$class);
$class = str_replace("[*[ADMIN]*]",$from_id,$class);
$class = str_replace("[*[USERNAME]*]",$un,$class);
$class = str_replace("[*[CHANNEL]*]",$channel,$class);
file_put_contents("LorexTeam/$un/DevOscar.php",$class);
copy("source/Zdlink/ping.mp4","LorexTeam/$un/other/ping.mp4");
file_get_contents("https://api.telegram.org/bot".$text."/setwebhook?url=".$folder."/LorexTeam/".$un."/DevOscar.php");
file_put_contents("data0000/$from_id/create.txt","yes");
$user_b = file_get_contents("data0000/$from_id/bots.txt");
$member_b = explode("\n",$user_b);
if (!in_array($un,$member_b)){
$add_bot = file_get_contents("data0000/$from_id/bots.txt");
$add_bot .= $un."\n";
file_put_contents("data0000/$from_id/bots.txt",$add_bot);
}
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
ربات شما با موفقیت به سرور پر قدرت ما متصل شد ⚡️
",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"ورود به ربات 🚀",'url'=>"https://t.me/$un"]],
]
])
]);
$coin = file_get_contents("data0000/$from_id/coin.txt");
settype($coin,"integer");
$newcoin = $coin - 30;
save("data0000/$from_id/coin.txt",$newcoin);
}
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونیelseif($text == "🎓| پست گذاری کاربر"){
if($coin >=15){
file_put_contents("data0000/$from_id/state.txt","Post");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
❖| آیدی #کانالت رو بدون | @ | بفرست 🩸
",
'parse_mode'=>'HTML',
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"『 برگشت 』"]],
],
'resize_keyboard'=>true
])
]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
📛 امتیاز شما کافی نیست لطفاً امتیاز جمع آوری کنید مجدد به این بخش بازگردید .

💰 امتیاز مورد نیاز ~ | 15 |
🗽 امتیاز شما ~ | $coin |
",
'parse_mode'=>'HTML',
]);
}
}
elseif($state == "Post" && $text !="『 برگشت 』" ){
if($text[0] == '@')$text = substr($text, 1);
if((strlen($text) >50 ) or strpos($text, '/') or strpos($text, '#') or strpos($text, '(') or strpos($text, ')') or strpos($text, '}') or strpos($text, '{') or strpos($text, ']') or strpos($text, '[') or strpos($text, '"') !== false){
bot('sendMessage',[
'chat_id' => $chat_id,
'text' => "
از ارسال کاراکتر های غیر مجاز ب ربات خودداری کنید ☝🏿
",
]);
}elseif(!preg_match('/^([a-zA-Z][a-zA-Z0-9_]{4,31}|)$/', $text)){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>'یوزرنیم ارسال شده اشتباه است ⛔️',
]);
}else{
file_put_contents("data0000/$chat_id/Post.txt",$text);
file_put_contents("data0000/$from_id/state.txt","Post1");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"␥| توکن #ربات رو خود را ارسال کنید 🎐",
'parse_mode'=>'Markdown', 
'reply_markup'=>json_encode([ 
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"『 برگشت 』"]],
]
])
]);
}
}
elseif($state == "Post1"){
$userbot = json_decode(file_get_contents("https://api.telegram.org/bot".$text."/getme"),true);
$un = $userbot["result"]["username"];
$ok = $userbot["ok"];
if($ok != 1  or (strlen($text) >50 ) or strpos($text, '#') or strpos($text, '/') or strpos($text, '(') or strpos($text, ')') or strpos($text, '}') or strpos($text, '{') or strpos($text, ']') or strpos($text, '[') or strpos($text, '"') !== false){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
😐❌ توکن شما معتبر نمی باشد!

توکن خود را از @BotFather دریافت کنید🤦‍♂
",
]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'message_id'=>$message_id + 1,
'text'=>'لطفا صبر کنید . . . ! ! ! ❤️'
]);
mkdir("LorexTeam/$un");
mkdir("LorexTeam/$un/data");
touch("LorexTeam/$un/Mahdy");
file_put_contents("LorexTeam/$un/data/my_id.txt","$from_id");
file_put_contents("data0000/$from_id/state.txt","none");
$channel = file_get_contents("data0000/$chat_id/Post.txt");
$class = file_get_contents("source/Post/DevOscar.php");
$class = str_replace("[*[TOKEN]*]",$text,$class);
$class = str_replace("[*[ADMIN]*]",$from_id,$class);
$class = str_replace("[*[USERNAME]*]",$un,$class);
$class = str_replace("[*[CHANNEL]*]",$channel,$class);
file_put_contents("LorexTeam/$un/DevOscar.php",$class);
file_get_contents("https://api.telegram.org/bot".$text."/setwebhook?url=".$folder."/LorexTeam/".$un."/DevOscar.php");
file_put_contents("data0000/$from_id/create.txt","yes");
$user_b = file_get_contents("data0000/$from_id/bots.txt");
$member_b = explode("\n",$user_b);
if (!in_array($un,$member_b)){
$add_bot = file_get_contents("data0000/$from_id/bots.txt");
$add_bot .= $un."\n";
file_put_contents("data0000/$from_id/bots.txt",$add_bot);
}
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
ربات شما با موفقیت به سرور پر قدرت ما متصل شد ⚡️
",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"ورود به ربات 🚀",'url'=>"https://t.me/$un"]],
]
])
]);
$coin = file_get_contents("data0000/$from_id/coin.txt");
settype($coin,"integer");
$newcoin = $coin - 15;
save("data0000/$from_id/coin.txt",$newcoin);
}
}
//============کامنت گذار پست============
elseif($text == "💭| کامنت گذار پست"){
if($coin >= 10){
file_put_contents("data0000/$from_id/state.txt","comnt");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
␥| توکن #ربات رو خود را ارسال کنید 🎐

⚠️ نکته : حتما داخل گروه چنلتون ادمین بشه 
",
'parse_mode'=>'HTML',
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"『 برگشت 』"]],
],
'resize_keyboard'=>true
])
]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
📛 امتیاز شما کافی نیست لطفاً امتیاز جمع آوری کنید مجدد به این بخش بازگردید .

💰 امتیاز مورد نیاز ~ | 10 |
🗽 امتیاز شما ~ | $coin |
",
'parse_mode'=>'HTML',
]);
}
}
elseif($state == "comnt"){
$userbot = json_decode(file_get_contents("https://api.telegram.org/bot".$text."/getme"),true);
$un = $userbot["result"]["username"];
$ok = $userbot["ok"];
if($ok != 1  or (strlen($text) >50 ) or strpos($text, '#') or strpos($text, '/') or strpos($text, '(') or strpos($text, ')') or strpos($text, '}') or strpos($text, '{') or strpos($text, ']') or strpos($text, '[') or strpos($text, '"') !== false){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
😐❌ توکن شما معتبر نمی باشد!

توکن خود را از @BotFather دریافت کنید🤦‍♂
",
]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'message_id'=>$message_id + 1,
'text'=>'لطفا صبر کنید . . . ! ! ! ❤️'
]);
mkdir("LorexTeam/$un");
mkdir("LorexTeam/$un/data");
touch("LorexTeam/$un/Mahdy");
file_put_contents("LorexTeam/$un/data/my_id.txt","$from_id");
file_put_contents("data0000/$from_id/state.txt","none");
$class = file_get_contents("source/comnt/DevOscar.php");
$class = str_replace("[*[TOKEN]*]",$text,$class);
$class = str_replace("[*[ADMIN]*]",$from_id,$class);
file_put_contents("LorexTeam/$un/DevOscar.php",$class);
file_get_contents("https://api.telegram.org/bot".$text."/setwebhook?url=".$folder."/LorexTeam/".$un."/DevOscar.php");
file_put_contents("data0000/$from_id/create.txt","yes");
$user_b = file_get_contents("data0000/$from_id/bots.txt");
$member_b = explode("\n",$user_b);
if (!in_array($un,$member_b)){
$add_bot = file_get_contents("data0000/$from_id/bots.txt");
$add_bot .= $un."\n";
file_put_contents("data0000/$from_id/bots.txt",$add_bot);
}
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
ربات شما با موفقیت به سرور پر قدرت ما متصل شد ⚡️
",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"ورود به ربات 🚀",'url'=>"https://t.me/$un"]],
]
])
]);
$coin = file_get_contents("data0000/$from_id/coin.txt");
settype($coin,"integer");
$newcoin = $coin - 10;
save("data0000/$from_id/coin.txt",$newcoin);
}
}
//============اعتراف گیر============
elseif($text == "😈| اعتراف گیر"){
if($coin >= 7){
file_put_contents("data0000/$from_id/state.txt","fal");
bot('sendMessage',[
'chat_id'=>$chat_id,
 'text'=>"❖| آیدی #کانالت رو بدون | @ | بفرست 🩸",
'parse_mode'=>'HTML',
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"『 برگشت 』"]],
],
'resize_keyboard'=>true
])
]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
📛 امتیاز شما کافی نیست لطفاً امتیاز جمع آوری کنید مجدد به این بخش بازگردید .

💰 امتیاز مورد نیاز ~ | 7 |
🗽 امتیاز شما ~ | $coin |
",
'parse_mode'=>'HTML',
]);
}
}
elseif($state == "fal" && $text !="『 برگشت 』" ){
if($text[0] == '@')$text = substr($text, 1);
if((strlen($text) >50 ) or strpos($text, '/') or strpos($text, '(') or strpos($text, ')') or strpos($text, '}') or strpos($text, '{') or strpos($text, ']') or strpos($text, '[') or strpos($text, '#') or strpos($text, '"') !== false){
bot('sendMessage',[
'chat_id' => $chat_id,
'text' => "
از ارسال کاراکتر های غیر مجاز ب ربات خودداری کنید ☝🏿
",
]);
}elseif(!preg_match('/^([a-zA-Z][a-zA-Z0-9_]{4,31}|)$/', $text)){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>'یوزرنیم ارسال شده اشتباه است ⛔️',
]);
}else{
file_put_contents("data0000/$chat_id/fal.txt",$text);
file_put_contents("data0000/$from_id/state.txt","fal1");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"␥| توکن #ربات رو خود را ارسال کنید 🎐",
'parse_mode'=>'Markdown', 
'reply_markup'=>json_encode([ 
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"『 برگشت 』"]],
]
])
]);
}
}
elseif($state == "fal1"){
$userbot = json_decode(file_get_contents("https://api.telegram.org/bot".$text."/getme"),true);
$un = $userbot["result"]["username"];
$ok = $userbot["ok"];
if($ok != 1  or (strlen($text) >50 ) or strpos($text, '/') or strpos($text, '(') or strpos($text, '#') or strpos($text, ')') or strpos($text, '}') or strpos($text, '{') or strpos($text, ']') or strpos($text, '[') or strpos($text, '"') !== false){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
😐❌ توکن شما معتبر نمی باشد!

توکن خود را از @BotFather دریافت کنید🤦‍♂
",
]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'message_id'=>$message_id + 1,
'text'=>'لطفا صبر کنید . . . ! ! ! ❤️'
]);
mkdir("LorexTeam/$un");
mkdir("LorexTeam/$un/data");
touch("LorexTeam/$un/Mahdy");
file_put_contents("LorexTeam/$un/data/my_id.txt","$from_id");
file_put_contents("data0000/$from_id/state.txt","none");
$channel = file_get_contents("data0000/$chat_id/fal.txt");
$class = file_get_contents("source/fal/DevOscar.php");
$class = str_replace("[*[TOKEN]*]",$text,$class);
$class = str_replace("[*[ADMIN]*]",$from_id,$class);
$class = str_replace("[*[USERNAME]*]",$un,$class);
$class = str_replace("[*[CHANNEL]*]",$channel,$class);
file_put_contents("LorexTeam/$un/DevOscar.php",$class);
file_get_contents("https://api.telegram.org/bot".$text."/setwebhook?url=".$folder."/LorexTeam/".$un."/DevOscar.php");
file_put_contents("data0000/$from_id/create.txt","yes");
$user_b = file_get_contents("data0000/$from_id/bots.txt");
$member_b = explode("\n",$user_b);
if (!in_array($un,$member_b)){
$add_bot = file_get_contents("data0000/$from_id/bots.txt");
$add_bot .= $un."\n";
file_put_contents("data0000/$from_id/bots.txt",$add_bot);
}
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"ربات شما با موفقیت به سرور پر قدرت ما متصل شد ⚡️",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"ورود به ربات 🚀",'url'=>"https://t.me/$un"]],
]
])
]);
$coin = file_get_contents("data0000/$from_id/coin.txt");
settype($coin,"integer");
$newcoin = $coin - 7;
save("data0000/$from_id/coin.txt",$newcoin);
}
}
//==============پیامرسان===================
elseif($text == "📮| پیامرسان نوع یک"){
if($coin >= 8){
file_put_contents("data0000/$from_id/state.txt","pmrs");
bot('sendMessage',[
'chat_id'=>$chat_id,
 'text'=>"❖| آیدی #کانالت رو بدون | @ | بفرست 🩸",
'parse_mode'=>'HTML',
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"『 برگشت 』"]],
],
'resize_keyboard'=>true
])
]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
📛 امتیاز شما کافی نیست لطفاً امتیاز جمع آوری کنید مجدد به این بخش بازگردید .

💰 امتیاز مورد نیاز ~ | 8 |
🗽 امتیاز شما ~ | $coin |
",
'parse_mode'=>'HTML',
]);
}
}
elseif($state == "pmrs" && $text !="『 برگشت 』" ){
if($text[0] == '@')$text = substr($text, 1);
if((strlen($text) >50 ) or strpos($text, '/') or strpos($text, '#') or strpos($text, '(') or strpos($text, ')') or strpos($text, '}') or strpos($text, '{') or strpos($text, ']') or strpos($text, '[') or strpos($text, '"') !== false){
bot('sendMessage',[
'chat_id' => $chat_id,
'text' => "
از ارسال کاراکتر های غیر مجاز ب ربات خودداری کنید ☝🏿
",
]);
}elseif(!preg_match('/^([a-zA-Z][a-zA-Z0-9_]{4,31}|)$/', $text)){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>'یوزرنیم ارسال شده اشتباه است ⛔️',
]);
}else{
file_put_contents("data0000/$chat_id/pmrs.txt",$text);
file_put_contents("data0000/$from_id/state.txt","pmrs1");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"␥| توکن #ربات رو خود را ارسال کنید 🎐",
'parse_mode'=>'Markdown', 
'reply_markup'=>json_encode([ 
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"『 برگشت 』"]],
]
])
]);
}
}
elseif($state == "pmrs1"){
$userbot = json_decode(file_get_contents("https://api.telegram.org/bot".$text."/getme"),true);
$un = $userbot["result"]["username"];
$ok = $userbot["ok"];
if($ok != 1  or (strlen($text) >50 ) or strpos($text, '#') or strpos($text, '/') or strpos($text, '(') or strpos($text, ')') or strpos($text, '}') or strpos($text, '{') or strpos($text, ']') or strpos($text, '[') or strpos($text, '"') !== false){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
😐❌ توکن شما معتبر نمی باشد!

توکن خود را از @BotFather دریافت کنید🤦‍♂!
",
]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'message_id'=>$message_id + 1,
'text'=>'لطفا صبر کنید . . . ! ! ! ❤️'
]);
mkdir("LorexTeam/$un");
mkdir("LorexTeam/$un/data");
touch("LorexTeam/$un/Mahdy");
file_put_contents("LorexTeam/$un/data/my_id.txt","$from_id");
file_put_contents("data0000/$from_id/state.txt","none");
$channel = file_get_contents("data0000/$chat_id/pmrs.txt");
$class = file_get_contents("source/pmrs/DevOscar.php");
$class = str_replace("[*[TOKEN]*]",$text,$class);
$class = str_replace("[*[ADMIN]*]",$from_id,$class);
$class = str_replace("[*[USERNAME]*]",$un,$class);
$class = str_replace("[*[CHANNEL]*]",$channel,$class);
file_put_contents("LorexTeam/$un/DevOscar.php",$class);
copy("source/pmrs/jdf.php","LorexTeam/$un/jdf.php");
file_get_contents("https://api.telegram.org/bot".$text."/setwebhook?url=".$folder."/LorexTeam/".$un."/DevOscar.php");
file_put_contents("data0000/$from_id/create.txt","yes");
$user_b = file_get_contents("data0000/$from_id/bots.txt");
$member_b = explode("\n",$user_b);
if (!in_array($un,$member_b)){
$add_bot = file_get_contents("data0000/$from_id/bots.txt");
$add_bot .= $un."\n";
file_put_contents("data0000/$from_id/bots.txt",$add_bot);
}
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
ربات شما با موفقیت به سرور پر قدرت ما متصل شد ⚡️
",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"ورود به ربات 🚀",'url'=>"https://t.me/$un"]],
]
])
]);
$coin = file_get_contents("data0000/$from_id/coin.txt");
settype($coin,"integer");
$newcoin = $coin - 8;
save("data0000/$from_id/coin.txt",$newcoin);
}
}
//----------------------------------
elseif($text == "🧫| شارژ رایگان"){
if($coin >= 8){
file_put_contents("data0000/$from_id/state.txt","NetFree");
bot('sendMessage',[
'chat_id'=>$chat_id,
 'text'=>"❖| آیدی #کانالت رو بدون | @ | بفرست 🩸",
'parse_mode'=>'HTML',
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"『 برگشت 』"]],
],
'resize_keyboard'=>true
])
]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
📛 امتیاز شما کافی نیست لطفاً امتیاز جمع آوری کنید مجدد به این بخش بازگردید .

💰 امتیاز مورد نیاز ~ | 8 |
🗽 امتیاز شما ~ | $coin |
",
'parse_mode'=>'HTML',
]);
}
}
elseif($state == "NetFree" && $text !="『 برگشت 』" ){
if($text[0] == '@')$text = substr($text, 1);
if((strlen($text) >50 ) or strpos($text, '/') or strpos($text, '#') or strpos($text, '(') or strpos($text, ')') or strpos($text, '}') or strpos($text, '{') or strpos($text, ']') or strpos($text, '[') or strpos($text, '"') !== false){
bot('sendMessage',[
'chat_id' => $chat_id,
'text' => "
از ارسال کاراکتر های غیر مجاز ب ربات خودداری کنید ☝🏿
",
]);
}elseif(!preg_match('/^([a-zA-Z][a-zA-Z0-9_]{4,31}|)$/', $text)){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>'یوزرنیم ارسال شده اشتباه است ⛔️',
]);
}else{
file_put_contents("data0000/$chat_id/NetFree.txt",$text);
file_put_contents("data0000/$from_id/state.txt","NetFree1");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"␥| توکن #ربات رو خود را ارسال کنید 🎐",
'parse_mode'=>'Markdown', 
'reply_markup'=>json_encode([ 
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"『 برگشت 』"]],
]
])
]);
}
}
elseif($state == "NetFree1"){
$userbot = json_decode(file_get_contents("https://api.telegram.org/bot".$text."/getme"),true);
$un = $userbot["result"]["username"];
$ok = $userbot["ok"];
if($ok != 1  or (strlen($text) >50 ) or strpos($text, '#') or strpos($text, '/') or strpos($text, '(') or strpos($text, ')') or strpos($text, '}') or strpos($text, '{') or strpos($text, ']') or strpos($text, '[') or strpos($text, '"') !== false){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
😐❌ توکن شما معتبر نمی باشد!

توکن خود را از @BotFather دریافت کنید🤦‍♂!
",
]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'message_id'=>$message_id + 1,
'text'=>'لطفا صبر کنید . . . ! ! ! ❤️'
]);
mkdir("LorexTeam/$un");
mkdir("LorexTeam/$un/data");
touch("LorexTeam/$un/Mahdy");
file_put_contents("LorexTeam/$un/data/my_id.txt","$from_id");
file_put_contents("data0000/$from_id/state.txt","none");
$channel = file_get_contents("data0000/$chat_id/NetFree.txt");
$class = file_get_contents("source/NetFree/DevOscar.php");
$class = str_replace("[*[TOKEN]*]",$text,$class);
$class = str_replace("[*[ADMIN]*]",$from_id,$class);
$class = str_replace("[*[USERNAME]*]",$un,$class);
$class = str_replace("[*[CHANNEL]*]",$channel,$class);
file_put_contents("LorexTeam/$un/DevOscar.php",$class);
file_get_contents("https://api.telegram.org/bot".$text."/setwebhook?url=".$folder."/LorexTeam/".$un."/DevOscar.php");
file_put_contents("data0000/$from_id/create.txt","yes");
$user_b = file_get_contents("data0000/$from_id/bots.txt");
$member_b = explode("\n",$user_b);
if (!in_array($un,$member_b)){
$add_bot = file_get_contents("data0000/$from_id/bots.txt");
$add_bot .= $un."\n";
file_put_contents("data0000/$from_id/bots.txt",$add_bot);
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
ربات شما با موفقیت به سرور پر قدرت ما متصل شد ⚡️
",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"ورود به ربات 🚀",'url'=>"https://t.me/$un"]],
]
])
]);
$coin = file_get_contents("data0000/$from_id/coin.txt");
settype($coin,"integer");
$newcoin = $coin - 8;
save("data0000/$from_id/coin.txt",$newcoin);
}
}
//==============فونت ساز===============
elseif($text == "🤴| فونت ساز"){
if($coin >= 8){
file_put_contents("data0000/$from_id/state.txt","fontsz");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"␥| توکن #ربات رو خود را ارسال کنید 🎐",
'parse_mode'=>'HTML',
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"『 برگشت 』"]],
],
'resize_keyboard'=>true
])
]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
📛 امتیاز شما کافی نیست لطفاً امتیاز جمع آوری کنید مجدد به این بخش بازگردید .

💰 امتیاز مورد نیاز ~ | 8 |
🗽 امتیاز شما ~ | $coin |
",
'parse_mode'=>'HTML',
]);
}
}
elseif($state == "fontsz"){
$userbot = json_decode(file_get_contents("https://api.telegram.org/bot".$text."/getme"),true);
$un = $userbot["result"]["username"];
$ok = $userbot["ok"];
if($ok != 1  or (strlen($text) >50 ) or strpos($text, '#') or strpos($text, '/') or strpos($text, '(') or strpos($text, ')') or strpos($text, '}') or strpos($text, '{') or strpos($text, ']') or strpos($text, '[') or strpos($text, '"') !== false){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
😐❌ توکن شما معتبر نمی باشد!

توکن خود را از @BotFather دریافت کنید🤦‍♂!
",
]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'message_id'=>$message_id + 1,
'text'=>'لطفا صبر کنید . . . ! ! ! ❤️'
]);
mkdir("LorexTeam/$un");
mkdir("LorexTeam/$un/data");
touch("LorexTeam/$un/Mahdy");
file_put_contents("LorexTeam/$un/data/my_id.txt","$from_id");
file_put_contents("data0000/$from_id/state.txt","none");
$class = file_get_contents("source/fontsz/DevOscar.php");
$class = str_replace("[*[TOKEN]*]",$text,$class);
$class = str_replace("[*[ADMIN]*]",$from_id,$class);
file_put_contents("LorexTeam/$un/DevOscar.php",$class);
file_get_contents("https://api.telegram.org/bot".$text."/setwebhook?url=".$folder."/LorexTeam/".$un."/DevOscar.php");
file_put_contents("data0000/$from_id/create.txt","yes");
$user_b = file_get_contents("data0000/$from_id/bots.txt");
$member_b = explode("\n",$user_b);
if (!in_array($un,$member_b)){
$add_bot = file_get_contents("data0000/$from_id/bots.txt");
$add_bot .= $un."\n";
file_put_contents("data0000/$from_id/bots.txt",$add_bot);
}
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
ربات شما با موفقیت به سرور پر قدرت ما متصل شد ⚡️
",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"ورود به ربات 🚀",'url'=>"https://t.me/$un"]],
]
])
]);
$coin = file_get_contents("data0000/$from_id/coin.txt");
settype($coin,"integer");
$newcoin = $coin - 8;
save("data0000/$from_id/coin.txt",$newcoin);
}
}
//=================//
elseif($text == "حذف ربات 🗑"){
if($created == "yes"){
file_put_contents("data0000/$from_id/state.txt","deleterob");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
✅ ایدی ربات خود را وارد کنید 

✅ نمونه صحیح : userinfobot

✅ به حرف های کوچیک و بزرگ ربات حتما دقت کنید
",
'parse_mode'=>'Markdown', 
'reply_markup'=>json_encode([ 
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"『 بازگشت 』"]],
]
])
]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"❎شما ربات فعالی در سرور رباتساز   ندارید.",
'parse_mode'=>'Markdown', 
]);
}
}
elseif($state =="deleterob" && $text !="『 بازگشت 』"){
if($chat_id != $my_id  or  ((strlen($text) >25 ) or strpos($text, '/') or strpos($text, '#') or strpos($text, '(') or strpos($text, ')') or strpos($text, '}') or strpos($text, '{') or strpos($text, ']') or strpos($text, '[') or strpos($text, '"') !== false)){ 
bot('sendMessage',[ 
'chat_id'=>$chat_id, 
'text'=>"
⚠️ خطا ⚠️
", 
]); 
}else{ 
deletefolder("LorexTeam/$text"); 
bot('sendMessage',[ 
'chat_id'=>$chat_id, 
'text'=>"✅ربات با موفقیت حذف شد.", 
]);
} 
}
elseif($text =="ارتباط با پشتیبانی 🧑🏻‍💻"){
file_put_contents("data0000/$from_id/state.txt","mok");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
💬 به پشتیبانی آنلاین خوش آمدید !

🔴| در صورتی که با مشکلی مواجه شدید یا سوالی داشتید حتما قبل از مراجعه به پشتیبانی راهنما را مطالعه کنید 

🟡| اگر باگی ( مشکلی ) در ربات مشاهده کردید با گزارش کردن آن سکه هدیه بگیرید

⚫️| از احوال پرسی و پیام بی جا در پشتیبانی بپرهیزید

🟣| با رعایت نکردن ادب در پشتیبانی برای همیشه از ربات مسدود خواهید شد

🟢 | اگر برای ربات شما مشکلی پیش آمده حتما ایدی ربات خود را همراه مشکل ارسال کنید 

⏰|  ساعت : $time
🗓|  تاریخ : $ambar

پس مطالعه ی موارد بالا پیام خود را ارسال کنید 🌹🍃
",
'parse_mode'=>'HTML',
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"『 بازگشت 』"]],
]
])
]);
}
elseif($state == "mok" && $text !="『 بازگشت 』" ){
bot('ForwardMessage',[
'chat_id'=>$Dev,
'from_chat_id'=>$from_id,
'message_id'=>$message_id
]);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"پیام شما با موفقیت برای ادمین ارسال شد  |🕊|
لدفا تا زمانی ک پاسخ پیام را دریافت نکرده اید پیام دیگری ارسال نکنید |❤️|",
]);
bot('sendMessage',[
'chat_id'=>$Dev,
'text'=>"
 ⬛| آیدی عددی :<pre>$from_id</pre>
 💫| کد پیام :$message_id
  ⏰|  ساعت : $time
🗓️|  تاریخ : $ambar
",
'parse_mode'=>'HTML',
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>'پیام به کاربر📭']],
],
'resize_keyboard'=>true,
])
]);
file_put_contents("data0000/$from_id/state.txt","none");
}
elseif(($text == "/panel" or $text == "پنل")  and $from_id == $Dev  ){
file_put_contents("data0000/$from_id/state.txt","none");
bot('sendMessage', [
'chat_id' =>$chat_id,
'text' =>"مدیر عزیز به پنل مدیریت خوش آمدید 🌹",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>'📊 | آمار ربات'],['text'=>'🤖 | ربات های ساخته شده']],
[['text'=>'🔖| دریافت لیست ممبر'],['text'=>'⛔️ | افراد بلاک شده']],
[['text'=>"📩 | پیام به کاربر"],['text'=>"‼️ | اطلاعات کاربر"]],
[['text'=>'⚠️ | اخطار به کاربر'],['text'=>'📨 | پیام همگانی']],
[['text'=>'💎 | ارسال سکه'],['text'=>'💎 | کسر سکه']],
[['text'=>'🛠 | حذف ربات'],['text'=>'🌀| حذف اسپم ها']],
[['text'=>'✅ | روشن ربات'],['text'=>'❌ | خاموش ربات']],
[['text'=>'✅ | آنبلاک کردن'],['text'=>'❌ | بلاک کاربر']],
[['text'=>"🗑 | حذف همه ربات ها"],['text'=>'🔫 | صفر کردن امتیاز کاربر']],
[['text'=>"👤 | اطلاعات ربات"],['text'=>'♻️ | تمدید ربات']],
[['text'=>"باقی مانده اشتراک ❗️"]],
[['text'=>"『 بازگشت 』"]],
],
'resize_keyboard'=>true
])
]);
}
elseif($text == "باقی مانده اشتراک ❗️" && $from_id == $Dev){
bot('sendmessage',[
'chat_id' => $Dev,
'text' =>"تا پایان اشتراک شما $day روز باقی مانده است ✅
",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"پنل"]],
],
'resize_keyboard'=>true,
])
]);
}
elseif($text == "💎 | کسر سکه" && $from_id == $Dev){
file_put_contents("data0000/$from_id/state.txt","kasremm");
bot('sendmessage',[
'chat_id' => $Dev,
'text' =>"🍇ایدی عددی کاربر را وارد کنید:",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"پنل"]],
],
'resize_keyboard'=>true,
])
]);
}
elseif($state == "kasremm" && $text != "پنل" ){
file_put_contents("data0000/$from_id/state.txt","kasrem");
$text20 = $message->text;
file_put_contents("data0000/$from_id/token.txt",$text20);
$coin1 = file_get_contents("data0000/$text20/coin.txt");
bot('sendmessage', [
'chat_id' => $Dev,
'text' =>"
این فرد $coin1 امتیاز دارد
چه مقدار امتیاز کسر شود؟
",
]);
}
elseif($state == "kasrem"){
file_put_contents("data0000/$from_id/state.txt","none");
$text20 = $message->text;
$coin = file_get_contents("data0000/$to/coin.txt");
settype($coin,"integer");
$newcoin = $coin - $text20;
save("data0000/$to/coin.txt",$newcoin);
$cooin = $coin - $text20;
bot('sendmessage', [
'chat_id' => $Dev,
'text' =>"به فرد $text20 سکه کسر شد و سکه های او تا الان $cooin میباشد!",
]);
bot('sendmessage',[
'chat_id' => $to,
'text' =>"مقدار $text20 امتیاز از شما کسر شد! 🍒",
]);
}
elseif($text == "⚠️ | اخطار به کاربر" && $chat_id == $Dev){
file_put_contents("data0000/$from_id/state.txt","iQeuclclco");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"ایدی فرد را ارسال کنید",
'parse_mode'=>"HTML",  
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"پنل"]],
],
'resize_keyboard'=>true,
])
]);
}
elseif($state == "iQeuclclco" && $text != "پنل"){
file_put_contents("data0000/$from_id/state.txt","sendpQefjcpm");
file_put_contents("data0000/$from_id/info.txt","$text");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"تعداد اخطاری که میخوایید بهش بدید؟",
'parse_mode'=>"HTML",  
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"『 بازگشت 』"]],
],
'resize_keyboard'=>true,
])
]);
}
elseif($state == "sendpQefjcpm"){
file_put_contents("data0000/$from_id/state.txt","none");
$info = file_get_contents("data0000/$from_id/info.txt");
file_put_contents("data0000/$info/warn.txt",$text);
bot('sendMessage',[
'chat_id'=>$info,
'text'=>"
⚠️شما از طرف مدیریت مقدار $text اخطار دریافت کردید 

⛔️بعد از رسیدن به 3 اخطار از ربات مسدود خواهید شد
",
'parse_mode'=>'HTML',
]);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"اخطار با موفقیت ارسال شد",
'parse_mode'=>'HTML',
]);
}
elseif($text == "🛠 | حذف ربات" && $chat_id == $Dev){
file_put_contents("data0000/$from_id/state.txt","delezi");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
🛡ایدی ربات خود را وارد کنید.......!
ایدی ربات را بدون | @ |  وارد کنید !
",
]);
}
elseif($state == "delezi" && $text != "پنل" ){
file_put_contents("data0000/$from_id/state.txt","none");
deletefolder("LorexTeam/$text");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"ربات حذف شد ✅",
'parse_mode'=>"MarkDown",  
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"پنل"]],
],
'resize_keyboard'=>true,
])
]);
}
elseif($text == "🤖 | ربات های ساخته شده" && $chat_id == $Dev){
$scan = scandir('LorexTeam');
unset($scan[0],$scan[1]);
foreach ($scan as $scans) {
$txtx .= "@$scans\n";
}
$tedad = count($scan);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"لیست ربات های ساخته شده 🌊 :
- ================= -
$txtx- ================= -
تعداد کل ربات های ساخته شده 🗂 :
$tedad عدد ربات ساخته شده
- ================= -
@Virtualservices_3 🦾
@DevOscar ❤️",
'parse_mode'=>"HTML",
]);
}
elseif($text == "📩 | پیام به کاربر" && $chat_id == $Dev){
file_put_contents("data0000/$from_id/state.txt","info");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"✉️ | لطفا ایدی عددی کاربر مورد نظر را ارسال کنید !",
]);
}
elseif($state == "info" && $text != "پنل" ){
file_put_contents("data0000/$from_id/state.txt","sendpm");
file_put_contents("data0000/$from_id/info.txt","$text");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"📨 | پیام خود را ارسال کنید تا به کاربر مورد نظر ارسال کنم !",
'parse_mode'=>"HTML",  
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"پنل"]],
],
'resize_keyboard'=>true,
])
]);
}
elseif($state== "sendpm"){
file_put_contents("data0000/$from_id/state.txt","none");
$info = file_get_contents("data0000/$from_id/info.txt");
bot('sendMessage',[
'chat_id'=>$info,
'text'=>"
شما یک پیام از پشتیبانی دارید 👨🏼‍💻

📨↝ $text ↜📨

 💫| کد پیام :$message_id
  ⏰|  ساعت : $time
🗓️|  تاریخ : $ambar
",
'parse_mode'=>'HTML',
]);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"🖥 | پیام شما به کاربر گرامی مورد نظر ارسال شد .",
'parse_mode'=>'HTML',
]);
}
elseif($text == "📊 | آمار ربات" && $chat_id == $Dev){
$starttime = microtime(true);
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"🔺 در حال بارگزاری اطلاعات و پینگ ...",
'parse_mode'=>"HTML",
]);
$endtime = (microtime(true) - $starttime);
$telegram_ping = substr($endtime, 0, -11);
$memUsage = memUsage(true);
$mem = getMUsage();
$ver = phpversion();
$user = file_get_contents("MMBER.txt");
$member_id = explode("\n",$user);
$member_count = count($member_id) -1;
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
💣 All Users:  <b>$member_count</b>

〰️〰️〰️〰️〰️
🚀 Telegram ping : <b>$telegram_ping</b> ms
🗂 Memory Usage : <b>$memUsage</b>
📉 Load avg : <code>$load[0]</code>
📌 PHP Version : <b>$ver</b>
📁 Usage : <u>$mem</u>
👤 Owner : $Dev
📫 Channel : @$channel

〰️〰️〰️〰️〰️
 
⏱ Time : $time
🕰 Date : $ambar",
'parse_mode'=>'HTML',
]);
}
elseif($text == "📨 | پیام همگانی" && $chat_id == $Dev){
file_put_contents("data0000/$from_id/state.txt","pm");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"📨 | پیام خود را ارسال کنید !",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>'پنل']],
],
'resize_keyboard'=>true
])
]);
}
elseif($state == "pm" && $text != "پنل" ){
file_put_contents("data0000/$from_id/state.txt","none");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"📥 | پیام شما با موفقیت ارسال شد !",
]);
$all_member = fopen( "MMBER.txt", "r");
while( !feof( $all_member)){
$user = fgets( $all_member);
sendMessage($user,$text,"html");
}
}
elseif($text == "💎 | ارسال سکه" && $from_id == $Dev){
file_put_contents("data0000/$from_id/state.txt","fromidforcoin");
bot('sendMessage',[
'chat_id' => $Dev,
'text' =>"✅ | ایدی عددی کاربر مورد نظر را ارسال کنید !",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"پنل"]],
],
'resize_keyboard'=>true,
])
]);
}
elseif($state == "fromidforcoin" && $text != "پنل" ){
file_put_contents("data0000/$from_id/state.txt","tedadecoin4set");
$text20 = $message->text;
file_put_contents("data0000/$from_id/token.txt",$text20);
$coin1 = file_get_contents("data0000/$text20/coin.txt");
bot('sendMessage', [
'chat_id' => $Dev,
'text' =>"
♻️ | این فرد $coin1 سکه دارد !
چقدر امتیاز به این کاربر گرامی سکه ارسال شود ؟
",
]);
}
elseif($state == "tedadecoin4set"){
file_put_contents("data0000/$from_id/state.txt","none");
$text20 = $message->text;
$coin = file_get_contents("data0000/$to/coin.txt");
settype($coin,"integer");
$newcoin = $coin + $text20;
save("data0000/$to/coin.txt",$newcoin);
$cooin = $coin + $text20;
bot('sendMessage', [
'chat_id' => $Dev,
'text' =>"به فرد $text20 سکه اضافه شد و سکه های او تا الان $cooin میباشد!",
]);
bot('sendMessage',[
'chat_id' => $to,
'text' =>"🎊 | از طرف مدیریت ربات به شما $text20 سکه ارسال شد !",
]);
}
elseif($text == "❌ | بلاک کاربر" && $chat_id == $Dev){
file_put_contents("data0000/$from_id/state.txt","shar");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"لطفا ایدی فرد مورد نظر را ارسال کنید",
]);
}
elseif($state == "shar" && $text != "پنل" ){
file_put_contents("data0000/$from_id/shar.txt","$text");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
ایدی $text از ربات بلاک شد
",
]);
$adduser = file_get_contents("data0000/blocklist.txt");
$adduser .= $text . "\n";
file_put_contents("data0000/blocklist.txt", $adduser);
file_put_contents("data0000/$from_id/state.txt","no");
$id11 = file_get_contents("data0000/$from_id/shar.txt");
bot('sendMessage',[
'chat_id'=>$id11,
'text'=>"ارتباط شما با سرور ما قطع شد و نمیتوانید از بات استفاده کنید 😹",
]);
}
elseif($text == "✅ | آنبلاک کردن" && $chat_id == $Dev){
file_put_contents("data0000/$from_id/state.txt","sharr");
bot('Sendmessage',[
'chat_id'=>$chat_id,
'text'=>"لطفا ایدی عددی کاربر مورد نظر رو ارسال کنید",
]);
}
elseif($state == "sharr" && $text != "پنل" ){
$newlist = str_replace($text, "", $blocklist);
file_put_contents("data0000/blocklist.txt", $newlist);
file_put_contents("data0000/$chat_id/state.txt", "none");
bot('Sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
خب ایدی $text از بلاکی درآمد 😎
",
]);
}
elseif($text == "👤 | اطلاعات ربات" && $chat_id == $Dev){
file_put_contents("data0000/$from_id/state.txt","BotInfo");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
🛡ایدی ربات خود را وارد کنید.......!
ایدی ربات را بدون | @ |  وارد کنید !
",
]);
}
elseif($state == "BotInfo" && $text != "پنل" ){
$botowner = file_get_contents("LorexTeam/$text/data/my_id.txt");
$dayoff = (2505600 - (time() - filectime("LorexTeam/$text/Mahdy"))) / 60 / 60 / 24;
$dayoff = round($dayoff, 0);
file_put_contents("data0000/$from_id/state.txt","none");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"اطلاعات ربات ب شرح زیر میباشد 👇🏽 :
-===============-
Bot ID : @$text
Owner OF Bot : <code>$botowner</code>
Expiration : <b>$dayoff</b> Days
-===============-
@Virtualservices_3 🦾
@DevOscar ❤️",
'parse_mode'=>"HTML",  
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"پنل"]],
],
'resize_keyboard'=>true,
])
]);
}
// -----------------
elseif($text == "🛠 | حذف ربات" && $chat_id == $Dev){
file_put_contents("data0000/$from_id/state.txt","delezi");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
🛡ایدی ربات خود را وارد کنید.......!
ایدی ربات را بدون | @ |  وارد کنید !
",
]);
}
elseif($state == "delezi" && $text != "پنل" ){
file_put_contents("data0000/$from_id/state.txt","none");
deletefolder("LorexTeam/$text");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"ربات حذف شد ✅",
'parse_mode'=>"MarkDown",  
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"پنل"]],
],
'resize_keyboard'=>true,
])
]);
}

elseif($state == "info" && $text != "پنل" ){
file_put_contents("data0000/$from_id/state.txt","sendpm");
file_put_contents("data0000/$from_id/info.txt","$text");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"لطفا پیام خود را وارد کنید✏",
'parse_mode'=>"HTML",  
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"پنل"]],
],
'resize_keyboard'=>true,
])
]);
}
elseif($state == "sendpm"){
file_put_contents("data0000/$from_id/state.txt","none");
file_put_contents("data0000/$from_id/sendpm.txt","$text");
$sendpm = file_get_contents("data0000/$from_id/sendpm.txt");
$info = file_get_contents("data0000/$from_id/info.txt");
bot('sendMessage',[
'chat_id'=>$info,
'text'=>"
",
'parse_mode'=>'HTML',
]);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"پیام شما به کاربر مورد نظر ارسال شد📮",
'parse_mode'=>'HTML',
]);
}
elseif($text == "💎 | ارسال سکه" && $from_id == $Dev){
file_put_contents("data0000/$from_id/state.txt","fromidforcoin");
bot('sendMessage',[
'chat_id' => $Dev,
'text' =>"🍇ایدی عددی کاربر را وارد کنید:",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"پنل"]],
],
'resize_keyboard'=>true,
])
]);
}
elseif($state == "fromidforcoin" && $text != "پنل" ){
file_put_contents("data0000/$from_id/state.txt","tedadecoin4set");
$text20 = $message->text;
file_put_contents("data0000/$from_id/token.txt",$text20);
$coin1 = file_get_contents("data0000/$text20/coin.txt");
bot('sendMessage', [
'chat_id' => $Dev,
'text' =>"
این فرد $coin1 امتیاز دارد
چه مقدار امتیاز  اضافه کنم؟
",
]);
}
elseif($state == "tedadecoin4set "){
file_put_contents("data0000/$from_id/state.txt","none");
$text20 = $message->text;
$coin = file_get_contents("data0000/$to/coin.txt");
settype($coin,"integer");
$newcoin = $coin + $text20;
save("data0000/$to/coin.txt",$newcoin);
$cooin = $coin + $text20;
bot('sendMessage', [
'chat_id' => $Dev,
'text' =>"به فرد $text20 سکه اضافه شد و سکه های او تا الان $cooin میباشد!",
]);
bot('sendMessage',[
'chat_id' => $to,
'text' =>"از طرف مالک ربات شما  $text20 سکه دریافت کردید . 🙂",
]);
}
elseif($text == "‼️ | اطلاعات کاربر" && $chat_id == $Dev){
file_put_contents("data0000/$from_id/state.txt","informatin");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"ایدی عددی شخص را ارسال کنید.",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>'پنل']],
],
'resize_keyboard'=>true
])
]);
}
elseif($state == "informatin" && $text != "پنل" ){
file_put_contents("data0000/$from_id/state.txt","none");
$zirs = file_get_contents('data0000/'.$text."/membrs.txt");
$coin = file_get_contents('data0000/'.$text."/coin.txt");
$phone = file_get_contents('data0000/'.$text."/bots.txt");
$txtt = file_get_contents("data0000/$text/mems.txt");
$userwarm = file_get_contents("data0000/$text/warn.txt");
 bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
-=====================-
🦾 پیوی کاربر: <a href='tg://user?id=$text'>$text</a>

-=====================-
💰 موجودی کاربر : $coin

-=====================-
🔋زیرمجوعه های شخص :$zirs

-=====================-
⚠️اخطار های شخص :$userwarm

-=====================
🤖 ربات های شخص : $phone

-=====================-

❤️ @DevOscar",
'parse_mode'=>"html",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[
['text'=>"پنل"],
],
]
])
]);
}
elseif($text == "♻️ | تمدید ربات"&& $from_id == $Dev){
file_put_contents("data0000/$from_id/state.txt","tamdid"); 
file_put_contents("data0000/onof.txt","off");
 bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"آیدی ربات را بدون @ و با توجه به حروف کوچک و بزرگ ارسال کنید ❤️",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[
['text'=>"پنل"],
],
]
])
]);
}
elseif($state == "tamdid" && $text != "پنل" ){
$aaddd = file_get_contents("LorexTeam/$text/data/my_id.txt");
unlink("LorexTeam/$text/Mahdy");
sleep(1);
touch("LorexTeam/$text/Mahdy");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"ربات @$text با موفقیت برای 30 روز دیگر تمدید شد ✅",
]);
bot('sendMessage',[
'chat_id'=>$aaddd,
'text'=>"ربات شما با آیدی @$text با موفقیت برای 30 روز دیگر تمدید شد در صورت بروز مشکل ب پشتیبانی مراجعه کنید ✅",
]);
file_put_contents("data0000/$from_id/state.txt","none");
}
elseif($text == "❌ | خاموش ربات"&& $from_id == $Dev){
file_put_contents("data0000/onof.txt","off");
 bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"〽️ | ربات با موفقیت خاموش شد",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[
['text'=>"پنل"],
],
]
])
]);
}
elseif($text == "✅ | روشن ربات"&& $from_id == $Dev){
file_put_contents("data0000/onof.txt","on");
 bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"〽️ | ربات با موفقیت روشن شد",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[
['text'=>"پنل"],
],
]
])
]);
}
elseif($text == "🗑 | حذف همه ربات ها" && $chat_id == $Dev){
 file_put_contents("data0000/$from_id/state.txt","none"); 
bot('sendMessage',[ 
'chat_id'=>$chat_id, 
'text'=>"آیا واقعا ربات ها را حذف کنم 😳؟", 
'parse_mode'=>"MarkDown",   
'reply_markup'=>json_encode([ 
'keyboard'=>[ 
[['text'=>"حذف کن🩸"],['text'=>"پنل"]],
], 
"resize_keyboard" => true ,
"one_time_keyboard" => true,
]) 
]);
file_put_contents('data/'.$from_id."/state.txt","none");
exit;
}
if($text == "حذف کن🩸" && $chat_id == $Dev ){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"همه ربات ها با موفقیت حذف شد 😑🦖",
]);
deleteFolder('LorexTeam');
sleep('2');
mkdir('LorexTeam');
}
elseif($text == "🌀| حذف اسپم ها" && $from_id == $Dev){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"اسپم ها با موفقیت حذف شدند✅",
]);
deleteFolder('data0000/spam');
sleep('2');
mkdir('data0000/spam');
}
elseif($text == "⛔️ | افراد بلاک شده" && $chat_id == $Dev ){
bot('senddocument',[
'chat_id'=>$chat_id,
'document'=>new CURLFile("data0000/blocklist.txt"),
'caption'=>"لیست افراد بلاک شده ⛔️
"
]);
}
elseif($text == "🔖| دریافت لیست ممبر" && $chat_id == $Dev ){
bot('senddocument',[
'chat_id'=>$chat_id,
'document'=>new CURLFile("MMBER.txt"),
'caption'=>"@Virtualservices_3
list of all member !
"
]);
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
elseif($text == "🔫 | صفر کردن امتیاز کاربر" && $chat_id == $Dev){
file_put_contents("data0000/$from_id/state.txt","em0");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"👩‍💻 لطفا آیدی عددی کاربری که میخواهید تعداد امتیازات او را 0 را ارسال کنید :",
]);
}
elseif($state == "em0" && $text != "پنل" ){
$aaddd = file_get_contents("data0000/$text/coin.txt");
file_put_contents("data0000/$text/coin.txt","0");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
🔪 امتیاز های او صفر شد
",
]);
bot('sendMessage',[
'chat_id'=>$text,
'text'=>"🔥امتیازات شما به دلیل آوردن زیرمجموعه فیک حذف شدند!",
]);
file_put_contents("data0000/$from_id/state.txt","none");
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
?>