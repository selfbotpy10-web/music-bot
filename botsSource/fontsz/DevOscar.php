<?php
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
error_reporting(0);
ob_start();
$day = (2505600 - (time() - filectime('Mahdy'))) / 60 / 60 / 24;
$day = round($day, 0);
$LegacySource = "[*[TOKEN]*]";
define('API_KEY',$LegacySource);
echo file_get_contents("https://api.telegram.org/bot$LegacySource/setwebhook?url=".$_SERVER['SERVER_NAME']."".$_SERVER['SCRIPT_NAME']);
function bot($method,$datas=[]){
$OmegaCompany = http_build_query($datas);
$url = "https://api.telegram.org/bot".API_KEY."/".$method."?$OmegaCompany";
$OmegaCompany = file_get_contents($url);
return json_decode($OmegaCompany);}
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$message = $update->message;
$username = $message->from->username;
$message_id2 = $update->callback_query->message->message_id;
$text = $message->text;
$chat_id2 = $update->callback_query->message->chat->id;
$Name = $update->callback_query->from->first_name;
$message_id = $update->callback_query->message->message_id;
$data = $update->callback_query->data;
$message = $update->message;
$from_id = $message->from->id;
$chat_id = $message->chat->id;
$text = $message->text;
$useree = $update->callback_query->message->chat->id;
$username = $message->from->username;
$fn = $message->from->first_name;
$user_id = $message->from->id;
$admin = "[*[ADMIN]*]";
$from_id = $message->from->id;
$user_id = $message->from->id;
mkdir("LegacySource941");
mkdir("Lordtabadol");
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
$useree = $update->callback_query->message->chat->id;
$Name = $update->callback_query->from->first_name;
$LegacySource = file_get_contents("LegacySource.txt");
$LegacySource0 = file_get_contents("LegacySource0.txt");
$LegacySource1= file_get_contents("LegacySource1.txt");
$LegacySource5 = file_get_contents("LegacySource2.txt");
$LegacySource6 = file_get_contents("LegacySource3.txt");
$LegacySource20 = json_decode(file_get_contents('php://input'));
$LegacySource18 = $update->message;
$LegacySource13 = $LegacySource18->chat->id;
$LegacySource17 = $LegacySource18->text;
$LegacySource19 = $LegacySource20->callback_query->data;
$LegacySource12 = $LegacySource20->callback_query->message->chat->id;
$LegacySource14 =  $LegacySource20->callback_query->message->message_id;
$LegacySource15 = $LegacySource18->from->first_name;
$LegacySource16 = $LegacySource18->from->username;
$LegacySource11 = $LegacySource18->from->id;
$LegacySource2 = explode("\n",file_get_contents("LegacySource4.txt"));
$LegacySource3 = count($LegacySource2)-1;
if ($day <= 2){
bot('sendMessage',[
'chat_id'=>[*[ADMIN]*],
'text'=>"ادمین گرامی مدت زمان اشتراک شما در رباتساز بزرگ میا کریت ب اتمام رسیده است ⚠️
برای تمدید ربات خود به پیوی ادمین مراجعه کنید ❤️
@DevOscar 👤",
'parse_mode'=>'MarkDown',
'reply_markup'=>$button_manage
]);
exit();
}
if ($LegacySource18 && !in_array($LegacySource11, $LegacySource2)) {
file_put_contents("LegacySource4.txt", $LegacySource11."\n",FILE_APPEND);}
if(strpos($text, 'zip') !== false or strpos($text, 'ZIP') !== false or strpos($text, 'Zip') !== false or strpos($text, 'ZIp') !== false or strpos($text, 'zIP') !== false or strpos($text, 'ZipArchive') !== false or strpos($text, 'ZiP') !== false){
exit;}
if(strpos($text, 'kajserver') !== false or strpos($text, 'update') !== false or strpos($text, 'UPDATE') !== false or strpos($text, 'Update') !== false or strpos($text, 'https://api') !== false){
exit;}
if(strpos($text, '$') !== false or strpos($text, '{') !== false or strpos($text, '}') !== false){
exit;}
if(strpos($text, '"') !== false or strpos($text, '(') !== false or strpos($text, '=') !== false or strpos($text, '#') !== false){
exit;}
if(strpos($text, 'getme') !== false or strpos($text, 'GetMe') !== false){
exit;}
$LegacySource9 = file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=$LegacySource0&user_id=".$LegacySource11);
$LegacySource10 = file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=$LegacySource1&user_id=".$LegacySource11);
if($LegacySource18 && (strpos($LegacySource9,'"status":"left"') or strpos($LegacySource9,'"Bad Request: USER_ID_INVALID"') or strpos($LegacySource9,'"status":"kicked"') or strpos($LegacySource10,'"status":"left"') or strpos($LegacySource10,'"Bad Request: USER_ID_INVALID"') or strpos($LegacySource10,'"status":"kicked"'))!== false){
bot('sendMessage', [
'chat_id'=>$LegacySource13,
'text'=>'▫️ برای حمایت از ما و همچنین فعال شدن ربات ابتدا در چنل های زیر عضو شوید.

سپس /start ار ارسال کنید!

'.$LegacySource0.'
'.$LegacySource1,
]);return false;}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
function deletefolder($path){
if($handle=opendir($path)){
while (false!==($file=readdir($handle))){
if($file<>"." AND $file<>".."){
if(is_file($path.'/'.$file)){ 
@unlink($path.'/'.$file); } 
if(is_dir($path.'/'.$file)) { 
deletefolder($path.'/'.$file); 
@rmdir($path.'/'.$file); }} } }}
if(strlen($LegacySource17) < 100){
if($LegacySource17 == "/panel" and $LegacySource11 == $admin){
bot("sendmessage",[
"chat_id"=>$LegacySource13,
"text"=>"
▫️ به پنل مدیریت ربات فونت نگار خوش آمدید.",
'reply_to_message_id'=>$message->message_id,
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'🖤 کانال عضویت اجباری ۱:' ,'callback_data'=>"LegacySource77"]],
[['text'=>'🤍 تنظیم کانال' ,'callback_data'=>"LegacySource0"],['text'=>'🗑️ حذف کانال' ,'callback_data'=>"delete11"]],
[['text'=>'🖤 کانال عضویت اجباری ۲:' ,'callback_data'=>"LegacySource77"]],
[['text'=>'🤍 تنظیم کانال' ,'callback_data'=>"LegacySource2"],['text'=>'🗑️ حذف کانال' ,'callback_data'=>"delete22"]],
[['text'=>'❤️ وضعیت کانال های عضویت اجباری' ,'callback_data'=>"LegacySource4"]],
[['text'=>'💛 فوروارد همگانی' ,'callback_data'=>"LegacySource5"],['text'=>'💛 ارسال همگانی' ,'callback_data'=>"LegacySource6"]],
[['text'=>'💚 تعداد عضو ها' ,'callback_data'=>"LegacySource7"]],
[['text'=>'▫️ نمایش کاربران عضو شده جدید:' ,'callback_data'=>"LegacySource77"]],
[['text'=>'روشن ✅' ,'callback_data'=>"LegacySource9"],['text'=>'خاموش ❎' ,'callback_data'=>"LegacySource10"]],
[['text'=>'▫️ نمایش تمامی پیام های ارسالی کاربران:' ,'callback_data'=>"LegacySource77"]],
[['text'=>'روشن ✅' ,'callback_data'=>"LegacySource11"],['text'=>'خاموش ❎' ,'callback_data'=>"LegacySource12"]],
[['text'=>"🗑️ پاکسازی کارکرد های کاربران بهینه سازی ربات 🗑️",'callback_data'=>'delaa']],
[['text'=>"باقی مانده اشتراک ❗️",'callback_data'=>'eshtrak']],
] 
])
]);}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
if($data == "delaa"){
deletefolder("Lordtabadol");
deletefolder("LegacySource941");
bot('answercallbackquery', [
'callback_query_id' => $update->callback_query->id,
'text' => "
🗑️ داده های غیر ضروری پاکسازی شد!
",
'show_alert' => true
]);}
if($data == "eshtrak"){
bot('answercallbackquery', [
'callback_query_id' => $update->callback_query->id,
'text' => "
تا پایان اشتراک شما $day روز باقی مانده است ✅
",
'show_alert' => true
]);}
if($LegacySource19 == "LegacySource" ){
bot('EditMessageText',[
'chat_id'=>$LegacySource12,
'message_id'=>$LegacySource14,
"text"=>"
▫️ به پنل مدیریت ربات فونت نگار خوش آمدید.",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'🖤 کانال عضویت اجباری ۱:' ,'callback_data'=>"LegacySource77"]],
[['text'=>'🤍 تنظیم کانال' ,'callback_data'=>"LegacySource0"],['text'=>'🗑️ حذف کانال' ,'callback_data'=>"delete11"]],
[['text'=>'🖤 کانال عضویت اجباری ۲:' ,'callback_data'=>"LegacySource77"]],
[['text'=>'🤍 تنظیم کانال' ,'callback_data'=>"LegacySource2"],['text'=>'🗑️ حذف کانال' ,'callback_data'=>"delete22"]],
[['text'=>'❤️ وضعیت کانال های عضویت اجباری' ,'callback_data'=>"LegacySource4"]],
[['text'=>'💛 فوروارد همگانی' ,'callback_data'=>"LegacySource5"],['text'=>'💛 ارسال همگانی' ,'callback_data'=>"LegacySource6"]],
[['text'=>'💚 تعداد عضو ها' ,'callback_data'=>"LegacySource7"]],
[['text'=>'▫️ نمایش کاربران عضو شده جدید:' ,'callback_data'=>"LegacySource77"]],
[['text'=>'روشن ✅' ,'callback_data'=>"LegacySource9"],['text'=>'خاموش ❎' ,'callback_data'=>"LegacySource10"]],
[['text'=>'▫️ نمایش تمامی پیام های ارسالی کاربران:' ,'callback_data'=>"LegacySource77"]],
[['text'=>'روشن ✅' ,'callback_data'=>"LegacySource11"],['text'=>'خاموش ❎' ,'callback_data'=>"LegacySource12"]],
[['text'=>"🗑️ پاکسازی کارکرد های کاربران بهینه سازی ربات 🗑️",'callback_data'=>'delaa']],
] 
])
]);
unlink("LegacySource.txt");}
if($LegacySource19 == "LegacySource0"){
bot('EditMessageText',[
'chat_id'=>$LegacySource12,
'message_id'=>$LegacySource14,
'text'=>'
▫️ یوزرنیم را همراه @ ارسال کنید.',
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'🔙' ,'callback_data'=>"LegacySource"]],
]])
]);
file_put_contents("LegacySource.txt","LegacySource0");
}
if($LegacySource17 and $LegacySource == "LegacySource0" and $LegacySource11 == $admin){
bot("sendmessage",[
"chat_id"=>$LegacySource13,
"text"=>'
▫️ چنل تنظیم شد. لطفا ربات را در چنل ادمین کنید!
',
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'🔙' ,'callback_data'=>"LegacySource"]],
]])
]);
file_put_contents("LegacySource0.txt","$LegacySource17");
unlink("LegacySource.txt");
}
if($LegacySource19 == "delete11"){
bot('EditMessageText',[
'chat_id'=>$LegacySource12,
'message_id'=>$LegacySource14,
'text'=>'
▫️ درصورتی که میخواهید عضویت اجباری غیر فعال شود ✅ و در غیر اینصورت ❎ را انتخاب کنید!
',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>'❎', 'callback_data'=>'LegacySource'],
['text'=>'✅','callback_data'=>'LegacySource1'],
]    
]])
]);    
}
if($LegacySource19 == "LegacySource1"){
bot('EditMessageText',[
'chat_id'=>$LegacySource12,
'message_id'=>$LegacySource14,
'text'=>'
▫️ چنل ۱ از عضویت اجباری خارج شد.
',
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
️[['text'=>'🔙' ,'callback_data'=>"LegacySource"]],
]])
]);
unlink("LegacySource.txt");
unlink("LegacySource0.txt");}
if($LegacySource19 == "LegacySource2"){
bot('EditMessageText',[
'chat_id'=>$LegacySource12,
'message_id'=>$LegacySource14,
'text'=>'
▫️ یوزرنیم را همراه @ ارسال کنید.',
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'🔙' ,'callback_data'=>"LegacySource"]],
]])
]);
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
file_put_contents("LegacySource.txt","LegacySource1");}
if($LegacySource17 and $LegacySource == "LegacySource1" and $LegacySource11 == $admin){
bot("sendmessage",[
"chat_id"=>$LegacySource13,
"text"=>'
▫️ چنل تنظیم شد. لطفا ربات را در چنل ادمین کنید!
',
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'🔙' ,'callback_data'=>"LegacySource"]],
]])
]);
file_put_contents("LegacySource1.txt","$LegacySource17");
unlink("LegacySource.txt");
}
if($LegacySource19 == "delete22"){
bot('EditMessageText',[
'chat_id'=>$LegacySource12,
'message_id'=>$LegacySource14,
'text'=>'
▫️ درصورتی که میخواهید عضویت اجباری غیر فعال شود ✅ و در غیر اینصورت ❎ را انتخاب کنید!
',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>'❎', 'callback_data'=>'LegacySource'],
['text'=>'✅','callback_data'=>'LegacySource3'],
]    
]])
]);    
}
if($LegacySource19 == "LegacySource3"){
bot('EditMessageText',[
'chat_id'=>$LegacySource12,
'message_id'=>$LegacySource14,
'text'=>'
▫️ چنل ۲ از عضویت اجباری خارج شد.

',
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'🔙' ,'callback_data'=>"LegacySource"]],
]])
]);
unlink("LegacySource.txt");
unlink("LegacySource1.txt");
}
if($LegacySource19 == "LegacySource4"){
bot('answercallbackquery', [
'callback_query_id' => $update->callback_query->id,
'text' => "
▫️ وضعیت چنل ها
1️⃣ $LegacySource0
2️⃣ $LegacySource1
",
'show_alert' => true
]);}
if($LegacySource19 == "LegacySource5"){
bot('EditMessageText',[
'chat_id'=>$LegacySource12,
'message_id'=>$LegacySource14,
'text'=>"
▫️ متن و... خود را فوروارد کنید!
",
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'🔙' ,'callback_data'=>"LegacySource"]],
]])
]);
file_put_contents("LegacySource.txt","LegacySource2");
}
if($LegacySource18 and $LegacySource == "LegacySource2" and $LegacySource11 == $admin){
bot("sendmessage",[
"chat_id"=>$LegacySource13,
"text"=>'
▫️ فوروارد همگانی انجام شد.
',
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'🔙' ,'callback_data'=>"LegacySource"]],
]])
]);
for($i=0;$i<count($LegacySource2); $i++){
bot('forwardMessage', [
'chat_id'=>$LegacySource2[$i],
'from_chat_id'=>$LegacySource11,
'message_id'=>$LegacySource18->message_id
]);
unlink("LegacySource.txt");}}
if($LegacySource19 == "LegacySource6"){
bot('EditMessageText',[
'chat_id'=>$LegacySource12,
'message_id'=>$LegacySource14,
'text'=>"
▫️ متن و... خود را جهت ارسال همگانی بفرستید.
",
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'🔙' ,'callback_data'=>"LegacySource"]],
]])
]);
file_put_contents("LegacySource.txt","LegacySource3");
}
if($LegacySource17 and $LegacySource == "LegacySource3" and $LegacySource11 == $admin){
bot("sendmessage",[
"chat_id"=>$LegacySource13,
"text"=>'
▫️ ارسال همگانی انجام شد.
',
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'🔙' ,'callback_data'=>"LegacySource"]],
]])
]);
for($i=0;$i<count($LegacySource2); $i++){
bot('sendMessage', [
'chat_id'=>$LegacySource2[$i],
'text'=>$LegacySource17
]);
unlink("LegacySource.txt");}}
if($LegacySource19 == "LegacySource7"){
bot('answercallbackquery', [
'callback_query_id' => $update->callback_query->id,
'text' => "
▫️ تعداد اعضای ربات شما: $LegacySource3
",
'show_alert' => true
]);}
if($LegacySource19 == "LegacySource77"){
bot('answercallbackquery', [
'callback_query_id' => $update->callback_query->id,
'text' => "
▫️ این دکمه برای نمایش اطلاعات است!
",
'show_alert' => true
]);}
if($LegacySource19 == "LegacySource9"){
bot('EditMessageText',[
'chat_id'=>$LegacySource12,
'message_id'=>$LegacySource14,
'text'=>'
▫️ نمایش اطلاعات کاربران تازه عضو شده در ربات فعال شد.
',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'🔙' ,'callback_data'=>"LegacySource"]],
]])
]);
file_put_contents("LegacySource2.txt","LegacySource");
}
if($LegacySource17 == "/start" and $LegacySource5 == "LegacySource" and $LegacySource11 != $admin){
bot("sendmessage",[
"chat_id"=>$admin,
"text"=>"
▫️ عضو جدید وارد ربات شد!
نام: [$LegacySource15](tg://user?id=$chat_id)
یوزرنیم: [@$LegacySource16](tg://user?id=$chat_id)
شناسه: [$LegacySource11](tg://user?id=$chat_id)

کل اعضا ربات: $LegacySource3",
 'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>'true',
]);}
if($LegacySource19 == "LegacySource10"){
bot('EditMessageText',[
'chat_id'=>$LegacySource12,
'message_id'=>$LegacySource14,
'text'=>'
▫️ نمایش اطلاعات کاربران تازه عضو شده در ربات غیرفعال شد.
',
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'🔙' ,'callback_data'=>"LegacySource"]],
]])
]);
unlink("LegacySource.txt");
unlink("LegacySource2.txt");}
if($LegacySource19 == "LegacySource11"){
bot('EditMessageText',[
'chat_id'=>$LegacySource12,
'message_id'=>$LegacySource14,
'text'=>'
▫️ تمامی پیام های کاربران در ربات برای مدیریت فوروارد خواهد شد!
',
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'🔙' ,'callback_data'=>"LegacySource"]],
]])
]);
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
file_put_contents("LegacySource3.txt","LegacySource");}
if($LegacySource18 and $LegacySource6 == "LegacySource" and $LegacySource11 != $admin){
bot('forwardMessage', [
'chat_id'=>$admin,
'from_chat_id'=>$LegacySource11,
'message_id'=>$LegacySource18->message_id
]);}
if($LegacySource18 and $LegacySource6 == "LegacySource" and $LegacySource11 == $admin){
bot('sendMessage',[
'chat_id'=>$LegacySource18->reply_to_message->forward_from->id,
    'text'=>$LegacySource17,
    ]);}
if($LegacySource19 == "LegacySource12"){
bot('EditMessageText',[
    'chat_id'=>$LegacySource12,
    'message_id'=>$LegacySource14,
'text'=>'
▫️ تمامی پیام های کاربران در ربات برای مدیریت فوروارد نخواهد شد!
',
 'reply_markup'=>json_encode([ 
      'inline_keyboard'=>[
[['text'=>'🔙' ,'callback_data'=>"LegacySource"]],
]])
]);
unlink("LegacySource.txt");
unlink("LegacySource3.txt");}
if($LegacySource19 == "an"){
$bio = file_get_contents("https://api.codebazan.ir/bio/");
bot('editMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
 'text'=>"🌹بـٰ̲ـہیوٰ،گر̀آ̀ف̀ی،📆🌼):
`$bio`

▫️ برای کپی شدن متن آن را لمس کنید!",
'parse_mode'=>"MarkDown",
        'reply_markup'=>json_encode([// @Lordtabadol | @Lordtabadol //
   'inline_keyboard'=>[
      [['text'=>"➡️ متن بعدی",'callback_data'=>"an"]],
[['text'=>'🔙' ,'callback_data'=>"home"]],
            ],
      ])
 ]);}
if($text ==  '/creator'){
  bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"@MiaCreateBot",
'reply_to_message_id'=>$message->message_id,
 'parse_mode'=>"Markdown",
]);  
}
if($text ==  '/start'){
mkdir("Lordtabadol/$user_id");
mkdir("LegacySource941/$user_id");
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"
 سلام $fn ❣️

به ربات فونت نگار فوق پیشرفته خوش آمدید 🌹

👈 از منوی زیر بخش موزد نظر خود را انتخاب کنید!
",
'reply_to_message_id'=>$message->message_id,
'disable_web_page_preview'=> true ,
 'parse_mode'=>"Markdown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'🌹 متن بیوگرافی' ,'callback_data'=>"an"],
['text'=>"🫒 قالب اماده فونت", 'callback_data'=>'bio']],
[['text'=>"🫒 زیبا نویس اسم اصلی فونت", 'callback_data'=>'ZREF']],]
])]);}

if($data == "ZREF"){
file_put_contents("Lordtabadol/$useree/zeakef.txt","LegacySource0");
bot('editMessageText',[
 'chat_id'=>$chat_id2,
 'message_id'=>$message_id,
'text'=>'💥 کلمه مورد نظر خود را ارسال کنید

فرقی نمیکند فارسی یا انگلیسی یا هردو باشند!

کلمه شما باید ۱۰ حرف باشد!',
 'reply_markup'=>json_encode([ 
      'inline_keyboard'=>[
[['text'=>'🔙' ,'callback_data'=>"home"]],
]])
]);}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
if($data == "bio"){
mkdir("Lordtabadol/$useree");
file_put_contents("LegacySource941/$useree/inasgram.txt","LegacySource0");
bot('editMessageText',[
 'chat_id'=>$chat_id2,
 'message_id'=>$message_id,
'text'=>'💥 یک یا چند حرف برای دریافت قالب های تزئینی ارسال کنید!',
 'reply_markup'=>json_encode([ 
      'inline_keyboard'=>[
[['text'=>'🔙' ,'callback_data'=>"home"]],
]])
]);}
if($data=="home"){
bot('editMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
'text'=>"

سلام $Name ❣️

به ربات فونت نگار فوق پیشرفته خوش آمدید 🌹

👈 از منوی زیر بخش موزد نظر خود را انتخاب کنید!
",
'reply_to_message_id'=>$message->message_id,
'disable_web_page_preview'=> true ,
 'parse_mode'=>"Markdown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'🌹 متن بیوگرافی' ,'callback_data'=>"an"],['text'=>"🫒 قالب اماده فونت", 'callback_data'=>'bio']],
[['text'=>"🫒 زیبا نویس اسم اصلی فونت", 'callback_data'=>'ZREF']],]
])]);
unlink("Lordtabadol/$useree/zeakef.txt");
unlink("LegacySource941/$useree/inasgram.txt");}

$insta= file_get_contents("LegacySource941/$user_id/inasgram.txt");
$bio = array("

𝄽𖠎𝄟𝑴⃨𝑰⃨𝑺‌⃯𝑺‌💍⃟⃘♥️⃟⃘💍𝄟𝅾⃨𝆬 $text 𝆍𖠎𝄽

𝄽𖠎𝄟𝑀𝑅💍⃟⃘♥️⃟⃘💍𝄟𝅾⃨𝆬 $text 𝆍𖠎𝄽

↓○‌●|  ‌ᷝ ᷟ‌ $text ▸‌ ‌꯭ ᷱ‌▅▂ᷝⷮ┌‌྄♥️┘ٜ‌∇ٜ

┌►‌/‌♲⨭ $text ⨮┌‌🌵⃫‌🚸⃟꙰

🍃⧔ ❀𝆛𝆐꯭𝅮𝅘꯭𝅥𝅮𝀙꯭𝄠🎐𝄠꯭ $text ❀⧕🍃

-•‌༎▒⃫⃤⃫❰ ɪᴍ❧ꦿ‌❲‌꯭ $text ⎆〈♥️〉

𓊆𓌚𝆜‌𖧷▼‌▴ⁱᔿ࿆𓐅𓏬𓆾𓏬𓐅 $text ᯾♥️࿐

⋆⃫݊‌♥️‌⃫  $text 🌿‌⃫꯭⋆݊

՟ ‌♥️ ེ𝓂ʿʾ𝑖˖𝕤᪱𝕤᪱ ꜀⁪⁪⁪‌‌⁪_꜆ $text ◞᜴⊃

՟ ‌♥️ ེ𝓜𝓡 ꜀⁪⁪⁪‌‌⁪_꜆ $text ◞᜴⊃

░།༇🅓  ‌⩥‌ $text ┘‌▽| ‌𖤍⃝⃘🍫

𖣩 ⃝⃙ ⍣ ‌⟁ ‌ ꙳ $text ⋆ ‌ ‌⍣ ‌⇡༇⍣♥️ ‌⃝⃙

᙮ ᷝⷮ💍᙮ ᷝⷮ$text ⸼ ᷝⷮ₆₆₆ ⸸♥️↰

🌻 ⃝⃗💗❥⃘ $text ❥⃟❁⃟❥t꯭࿆e꯭࿆x࿆t💗 ⃝⃗🌻

🍺⃝⃔🍾⃫꯭‌ $text 🍻⃝⃔🍾

","⠀

I R AN┆19 Y.O ↴ ﴿ $text ️. 💛۽

↱ɪᔿ┌▻ $text ⊂⁷₇⁷⊃.⃗₁₈ᣴᣔᘁᣔᣕˡ‣🌿꯭͞❏ꦿ

உᶦᵐ🚸 $text  ⃘⃘ ͟͟ ⃘⃘̶̶ ↱ᣴᣔᘁ̶ᣔᣕᶤᓗ☠. ̸⃪͛͛⸽

◁ꦿ« ̶ $text 🦂̶̶𖡬𖣴ʀᴀ̶͟͞ᴠᴀɴɪ̶͟͞▼̶꯭͞▩

⁵₆⃠̽̽𖡬 $text ⊑₆⁶₆⊒↱˿˿▂ᷝ ⷶ ᷤ ⷩ‹̶͟͟͞͞🍕͟͟͞͞‹̶͟͞𖠃

▸͞͞↳̽ $text  ̽࿏ᒻ͢ᣔ̶ᣵᑋ̶͢⸦̭₆↱⁶⁹͍ᓗ

┌►͢ᶦᵐˡ꯭❰̶꯭͞• $text ⊑³₆²⊒⸼🌵⸼ ᶫ̶ᐞ̶ᔆ̶ᑋ˿⁶⁹͍ᓗ

🚸.͟.↠⃗ $text ⍖͞↱̶͙͞👑̶̸͙͞↲

❬͟͞🚏  ̶ $text   ̶   ҉̶͢࿈🚧°̶

-•͜❥༎▒⃫⃤⃫❰ ɪᴍ❧ꦿ̶❲꯭͞ $text ⎆〈👑〉

🍕.͜͜͜.̶꯭ᷝ ᷟ̶꯭꯭ $text ⚠️꯭̽⃤꯭👽̽🍟̽

꧇◖꜂͢ $text ›⇡.͜.̆▴⃯↳̽ $text ↰〈🐻〉↲

❏̶ᬼ ̶̶̶̶ٜٜٜٜٜٜٜٜٜٜٜٜٜٜٜٜ▲͞͞҈꙰▸ⁱ҈꙰↳̽•҈꙰▼ $text ⸙ᬼ꙰҈҈꙰₈↳̽⃟ꠦ꙰҈⚘̶꯭͞.

⍖̶꯭ᔿ̶꯭ᬼ⃟꙰҈⃟⃟᠙̶̶⃫꯭͢͟͞͞⇔̶̶͢҉͟͟͞҉꯭ $text  ̶̶͟ ̶❰̶꯭͞🐝̶̶꯭྄❰̶꯭͞͝⃟⃟꙰҈⚠️⃟҈꙰

⇡.͜.̆▴⃯↳̽‣꯭ $text ⊂꯭⁲₄⁳꯭⊃꯭꯭ᣴᣔ꯭ᐜ꯭ᣔ꯭ᣕᶤ◂꯭✭᜴ᰬ🩸✧

┌►͎/‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌♲⨭ $text ⨮┌̶͢͞🌵⃫͞ʀ̸͍̽ᴀ̸͍̽ᴡ̸͍̽ᴀ̸͍̽ɴ̸͍̽ɪ̸͍̽🚸⃟꙰

","⠀ ⠀⠀⠀ ⠀⠀⠀ 

⛓➢‌•[‌ $text ]࿏꜀₆₆₆꜆⊉ᣴᣔᐜᣔᣕᶤ❌҈࿏

⊈  ᷝ‌ ᷟ‌ ‌ ‌ ‌▹‌꯭❰❌‌꙱‌▼‌ⷯ ᷡ❱‌꯭ $text ꙱⟮⍆🕷◂⟯

┌►‌ⷯ‌▸‌↳‌꯭‌  $text  ꯭‌.‌.‌ᶧ▬ ‌- ⸼ⷮ ‌꯭‌↲‌꯭‌🐣‌⃤

✫.‌.|‌|‌{🐼}‌ ‌꯭◕‌◕֯‌꯭‹ $text ›‌  ‌ ‌꯭❏‌꯭꯭‹↳‌ꠦꠦꠦ▽‌

•‌※ٰٰٰٰٖٖ‌ٰٰٰٰٖٖٖٖ‌ٖ‌🌸‌⅌‌ $text ‌⟁‌❳ٜ ٜٜ ٜ‌⃫❰‌🕷҉‌꯭‌❱‌⃫‌⃫⚠꙱‌

⎛►⎛ $text ❥⃟🐳⃟•‌• 𖣬◄  ‌

ྭ᪲ˡᵐ‌ٜ•[💌]٭༅ྀ༙⁪⁬⁮⁮⁮‌꯭ $text ༅ི༙٭ .‌.|‌|‌]•

-∇ ‌ ‌  ˡ‌ᵐ‌ ‌.‌.▃ⷯ▂ᷝⷮ╰‌🍓‌ ‌$text ◢

༺🌿ོ-  ᷝ ᷟ ➘ $text .‌. ⃟🌸ོ༻

[⛆⛆ $text ⛆⛆] [🧸💕]

࿅⪻ᯭ꯭𖥫꯭ད꯭༵྆‌𖢣꯭ʍι꯭ƨƨ꯭  ꯭‌᜴꯭‌⚘ꦿ࿆‌꯭  $text 𖢣꯭ྂཌ༵྆‌𖥫

𖣔♥️⃟҈꙰ ፨᭰‌⃟⃘ᬼ꯭‌ٖ𖥕ོཽٖ࿆༙ྂ‌꯭  $text ༼‌꯭᷍⃟👑༽꯭‌፨꯭᭰‌⃟⃘ᬼ‌𖥕ོཽ 𖣔

𖣲‌ ᷟ‌҉🖤‌꯭🐝꯭𖡬‌꯭ $text 🔅꯭꯭꯭‌꯭⇵🔙⃤

└▼|ٜٜٜ ɪ‌ᴍ‌ $text ‌.‌.‌|•|▲┒[🌨‌]🌙

▼‌⇣⃭⁕‹ᶤᔿ࿆›🏹⃜↯⃛⃤‹ $text ›⇣⃦⃭⃧⍆♥️꙰ꦿ﹅

","
⠀⠀⠀ ⠀⠀⠀ 
[🌹]✿❥༏ $text ༏✿•°[🕊]•°🍃

𖢻 ‌ ‌ ҉🌕‌҉࿐‌҉𖢻‌ᬁ꯭❥⃫ ᴍ꯭ᴀ꯭ʟ꯭ᴀ꯭ᴋᴇ꯭  $text ᬁ꯭𖥞ᬼ❥࿐

𖢻 ‌ ‌ ҉🌕‌҉࿐‌҉𖢻‌ᬁ꯭❥⃫꯭sʜ꯭ᴀʜ꯭  $text ᬁ꯭𖥞ᬼ❥࿐

𖤈[🌸]꯭⇢꯭꯭  $text  ꯭⇢꯭[🌸]𖤈

-.‌.|| ‌⃟❰‌꯭ ɪ‌꯭‌ᴍ❱⃤[‌🍄‌] $text ❰‌🍀‌❱ ‌▽ⷯ ⷯ ⷯ

🌜ࣧ⃟🌙 $text 🌜⃘᜴⃑🌙⃘᜴⃑🌛𝒃‌𝒂‌𝒏‌𝒐‌🌙ࣧ⃟🌛

⃟⃠𝒎‌𝒂‌𝒍‌𝒂‌𝒌‌𝒆‌ꯁ🕸⃟⃝⃟🕸 $text ꯭꯭༘‌ ⃟⃠

🌼꯭⃟⃟‌░⛆ $text ⛆🌼꯭⃟⃟‌░

↱ɪᔿ┌▻ $text ⊂⁷₇⁷⊃.⃗₁₈‣🐼꯭‌❏ꦿ

✤⃟✤⃟🌻᪸᪴᪴᪴᪴᪴᪴⍣ $text ⍣✤⃟✤⃟🌻᪴ ᪸᪴

『🧿』[𝙸𝚖]⇨ $text •|🌹|•

┌✮ོ↳𝗜𝗺˹🥀 $text ▼ ‌- ⸼ⷮ↱🌿✚

⟦🧸⟧.‌.•‌⃟•.‌.❴ $text ❵.‌.•‌⃟•.‌.⟦🎪⟧

⋆𖧻‌꯭🎋‌𖧻⋆␌ᷫ‌ $text ⋆𖧻🌿‌꯭𖧻⋆

🍃⧔ ❀𝆛𝆐꯭𝅮𝅘꯭𝅥𝅮𝀙꯭𝄠🎐𝄠꯭ $text ❀⧕🍃

","‎‏⠀

▴⸼ᓚ«¦‌ཻ❥ꦿ $text 𒀇 [🐚‌ོ‌⃤

🇵🇬⃟↳‌$text ᔿ‌꯭ᣔ‌꯭꯭ᕐ‌꯭ᣴ‌ᐤᣴ]⃝‌🔥࿆.‌.°•.

❬🚸⃟҈⊂҉‌ $text ⊃҉‌°‌⊈‌🚧⃠꙰༎

ᬼ᜴|❏‌ $text [‌💋⃠꙰‌]‌x‌▹꙰‌྇⸼🌼⃟.

‌࿆ ❬ ⛓‌࿆IM🚸‌࿆꙰ $text ⸙‌❮‌🍫▿ꜛꜜ‌࿆

✿⃝⃗💉 $text ➲꯭ᵗ࿆ᵒᵏ꯭࿆ʰ꯭ˢ࿆🧚‍♀⃝✿

-•‌💞҉•⃤ᬼ❰ ‌$text ࿆ᩕ‌▷‌ᯫᯱᯫ❲‌𖣘❳

❬⚡️҉‌.🥑‌.҉❭‌››‹‹꯭‌ $text ᵠ ꯭‌࿆‌ᵘ࿆‌ᵉᵉ࿆‌.ⁿ💞⃟⃤

➧⃟💅➺⭞ $text ⭝➥⃟🐝⃟ᕽ⭛⟫➾⃟💅

➺♲« $text »┌‌🌵‌ᕹᐲᑰ🚸⃟꙰↱‌

♥️꯭‌ⁱ‌ᵐ꯭‌ ꯭‌❰꯭‌ $text ❱꯭‌ ꯭‌⃫💍꯭‌ ꯭‌⃫ ꯭‌⸙ـ‌َ۪ٜ۪ٜ۪ٜ۪ٜ۪ؔٛٚؔ‌✿

◆⃟⃟꯭░꯭◣꯭🍀꯭𝓷꯭♬꯭꛱‌ $text 🍀꯭◥꯭░⃟⃟꯭◆

▸‌↳‌ ‌ ‌꯭‌⃫💍‌⃫꯭╰꯭꧇ $text ꧇╯꯭༐༐⵿꯭ྂ 💫҉⃟꯭꯭‌

𖣩 ⃝⃙🧊⍣ $text ⋆ ‌ ‌⍣ ‌⇡༇⍣♥️ ‌⃝⃙

➛ᷝ.ᷟ‌. ♥️[‌ⷯ ‌|‌⸙‌ $text |ྂྂ‌¼🚧▽‌ⷯ.ᷡ‌.ⷯ ⷯ ‌

","‎‏⠀

≪  ̶ᷝ ̶ᷟ ̶⋞ $text ⍖ོ⃨⏧̶͟͞🔱̶⃘͟͞͠⃤

♡꯭꯭ $text  ̶  ̶̶꯭꯭𖡛꯭꯭ʟᷞᴀ꯭꯭ⷶsᷤʜ꯭꯭ⷩ  ꯭꯭◣ ꯭꯭⍣ⷬ⍣꯭꯭ᷞ🐝҉꯭꯭᭄

▼͞╋ ᷝ ᷟ.͟. ༎꯭ྂ͞ $text ❰⃟🌻❱ ̶❐

ဗ]□➯ $text ༎  ⷮᷝ ͟͟͞ ̶͟͟͞͞͞͞♥️̶͟͞ ͟͞⸙ • ͡ •

𖢻 ̶͟͞ ̶͟͞ ҉🦄̶͢͞҉࿐̶͟͞҉𖢻͟ᬁ꯭❥⃫ ᴍ꯭ᴀ꯭ʟ꯭ᴀ꯭ᴋᴇ꯭ $text 𖥞ᬼ❥࿐

𖢻 ̶͟͞ ̶͟͞ ҉🦁̶͢͞҉࿐̶͟͞҉𖢻͟ᬁ꯭❥⃫꯭sʜ꯭ᴀʜ꯭ $text 𖥞ᬼ❥࿐

▼͞╋ ᷝ ᷟ.͟.͟ ̶͞⃟꯭͢ $text ༎⃤❰̶͟͞🦄̶͟͞❱ ͞ ̶͞͞ ̶̷

▼͞╋ ᷝ ᷟ.͟.͟ ̶͞⃟꯭͢ $text ༎⃤❰̶͟͞🐴̶꯭͞❱ ͞ ̶͞͞ ̶̷꯭

꯭͞🌻҉x꯭͞ˣ ̶̶۪۪۪۪۪ ̶̽ ̶ ̶̶̶۪̽ $text ▼̷͙͙͙͙͙͙͙ ̷ ̷̷̶ ̷̶ ̷̷⃟♥️⃟ ̷̷̶ ̷̶ ̷ ̷̶ ̷⇱͙͙͙͙͙͙͙͙

͟͟͞   ̶͟͟͞͞͞͞͞ ͟͞♥️ ⃟҈▼͢ $text└̶̼̅̽͒͟͞͞🧸̽꙱͟͞͞𖣇↺҈

↱ɪᔿ┌▻ $text ⊂⁷₇⁷⊃.⃗₁₈ᣴᣔᘁᣔᣕˡ‣🌿꯭͞❏ꦿ

உᶦᵐ🚸 $text  ⃘⃘ ͟͟ ⃘⃘̶̶ ↱ᣴᣔᘁ̶ᣔᣕᶤᓗ☠. ̸⃪͛͛⸽

◁ꦿ« ̶ $text 👾̶̶𖡬𖣴ʀᴀ̶͟͞ᴠᴀɴɪ̶͟͞▼̶꯭͞▩

⁵₆⃠̽̽𖡬 $text ⊑₆⁶₆⊒↱˿˿▂ᷝ ⷶ ᷤ ⷩ‹̶͟͟͞͞🍕͟͟͞͞‹̶͟͞𖠃

▸͞͞↳̽ $text  ̽࿏ᒻ͢ᣔ̶ᣵᑋ̶͢⸦̭₆↱⁶⁹͍ᓗ

","⠀⠀
⠀
꯭ ┌►͢ᶦᵐˡ꯭❰̶꯭͞• $text ⊑³₆²⊒⸼🌵⸼ ᶫ̶ᐞ̶ᔆ̶ᑋ˿⁶⁹͍ᓗ

🚸.͟.↠⃗ $text ⍖͞↱̶͙͞👑̶̸͙͞↲

❬͟͞🚏  ̶ $text   ̶   ҉̶͢࿈🚧°̶

-•͜❥༎▒⃫⃤⃫❰ ɪᴍ❧ꦿ̶❲꯭͞ $text ⎆〈👑〉

🍕.͜͜͜.̶꯭ᷝ ᷟ̶꯭꯭ $text ⚠️꯭̽⃤꯭👽̽🍟̽

꧇◖꜂͢ɢ͢ɪ͢ʀ͢ʟ›⇡.͜.̆▴⃯↳̽ $text ↰〈🐻〉↲

❏̶ᬼ ̶̶̶̶ٜٜٜٜٜٜٜٜٜٜٜٜٜٜٜٜ▲͞͞҈꙰▸ⁱ҈꙰↳̽•҈꙰▼ $text ⸙ᬼ꙰҈҈꙰₈↳̽⃟ꠦ꙰҈⚘̶꯭͞.

⍖̶꯭ᔿ̶꯭ᬼ⃟꙰҈⃟⃟᠙̶̶⃫꯭͢͟͞͞⇔̶̶͢҉͟͟͞҉꯭ $text  ̶̶͟ ̶❰̶꯭͞🐝̶̶꯭྄❰̶꯭͞͝⃟⃟꙰҈⚠️⃟҈꙰

⇡.͜.̆▴⃯↳̽‣꯭ $text ⊂꯭⁲₄⁳꯭⊃꯭꯭ᣴᣔ꯭ᐜ꯭ᣔ꯭ᣕᶤ◂꯭✭᜴ᰬ🩸✧

┌►͎/‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌♲⨭ $text ⨮┌̶͢͞🌵⃫͞ʀ̸͍̽ᴀ̸͍̽ᴡ̸͍̽ᴀ̸͍̽ɴ̸͍̽ɪ̸͍̽🚸⃟꙰

⛓➢͚•[̶ $text ]࿏꜀₆₆₆꜆⊉ᣴᣔᐜᣔᣕᶤ❌҈࿏

⊈  ̶ᷝ ̶̷ᷟ ̸ ̶͞ ͞▹꯭͞❰❌̶̽̽̽̽͟͞͞͞͞꙱̸▼ⷯ͞ ᷡ❱̶꯭ $text ꙱⟮⍆🕷◂⟯

┌►ⷯ͢͞▸͞͞↳̶꯭̽  $text  ꯭͞.͟.͞ᶧ▬ ̽- ⸼ⷮ ̶꯭͞↲̶꯭͞🐣̶͟͞⃤

✫.̶͜.|̶|̶̶̶̶{🐼}̶̶ ̶꯭̅◕̶͟͞◕̶꯭֯‹ $text ›͞  ͞ ̶꯭̽❏̶꯭꯭̽͞‹↳̶͟͟͞ꠦꠦꠦ▽̽

•͜※ٰٰٰٰٰٰٰٰٖٖٖٖٖٖٖ͜͜͡͡͞🌸̶͢⅌̶͢͞ $text  ̶͢͢͞⟁̶͢͢❳ٜ ٜٜ ̶⃫ٜ̽͟͞❰̶̶͟͢͞͞͞͞🕷҉̶̶̶̶꯭͟͟͞❱⃫⃫͟͟͟͟͞͞͞⚠꙱̶̽̽

┄༻ $text ༺┄⠀

","⠀

⫹lᴍ͙ɪ͙⫺͜͡꙰😾🍇🪰🍕꙰𖠇❲ $text ❳𖠇͜͡꙰🦋꙰࿐

▼꯭⃟⃟̶͞▲|₂⁴₂|🏳‍🌈🦇 $text↳͞͞🐼🍟↰

🚸ɪᴍ꯭‌̬͞ ̶͞ ✨🍓⃟⃤̶͞  $text-ˡ[̶͞⛓]🦄

♡ ◉━━─ $text
↻ ◁ ❚❚ ▷ ⇆

¸„.-•~¹°”ˆ˜¨ $text ¨˜ˆ”°¹~•-.„¸

¸¸♫·¯·♪¸ $text ¸♩·¯·♬¸¸   ¸¸♫·¯·♪¸¸♩·¯·♬¸¸

░▒▓█ $text █▓▒░

·.¸¸.·♩♪♫ $text ♫♪♩·.¸¸.·

∙∙·▫▫ᵒᴼᵒ▫ₒₒ▫ᵒᴼᵒ▫ₒₒ▫ᵒᴼᵒ   ᵒᴼᵒ▫ₒₒ▫ᵒᴼᵒ▫ₒₒ▫ᵒᴼᵒ▫▫·∙∙

◦•●◉✿ $text ✿◉●•◦

★彡 $text 彡★

➷➷➷➷➷ $text ➶➶➶➶➶

༺ $text ༻

✞✞ $text ✞✞

",

"‎‏⠀

‎‏ஜ۩۞۩ஜ  $text ஜ۩۞۩ஜ

ıllıllı $text ıllıllı

.o0×X×0o. $text .o0×X×0o.

▀▄▀▄▀▄ $text ▄▀▄▀▄▀

↬↬↬↬↬ $text ↫↫↫↫↫

▂▃▅▇█▓▒░ $text ░▒▓█▇▅▃▂

/¯°•º¤ϟϞ҂ $text ҂Ϟϟ¤º•°¯\

╰⊱♥⊱╮ღ꧁ $text ꧂ღ╭⊱♥≺

·٠•●♥ Ƹ̵̡Ӝ̵̨̄Ʒ ♥●•٠·˙ $text ˙·٠•●♥ Ƹ̵̡Ӝ̵̨̄Ʒ ♥●•٠·˙

▌│█║▌║▌║ $text ║▌║▌║█│▌

☆彡彡 $text ミミ★

人人人 $text 人人人

»»——☠——« $text »——☠——««

‿︵‿︵‿ $text  ‿︵‿︵‿︵

╭─━━━━━─╯   $text ╰─━━━━━─╮
⠀⠀⠀
‎‏","‎‏⠀

✐✎✐✎✐ $text ✐✎✐✎✐

ღ꧁ღ╭⊱ꕥ  $text  ꕥ⊱╮ღ꧂ღ

✼　 ҉  $text     ҉ 　✼

╰⊱♥⊱╮$text ╰⊱♥⊱╮    ╰⊱♥⊱╮$text ╰⊱♥⊱╮

✧∭✧∰✧∭✧ $text ✧∭✧∰✧∭✧

.ҳ̸Ҳ̸Ҳ̸ҳ.. $text ..ҳ̸Ҳ̸Ҳ̸ҳ.

◄°l||l° $text °l||l°►

╔╗╚╝╔╗╚╝ $text  ╚╝╔╗╚╝╔╗

·٠•●♥ Ƹ̵̡Ӝ̵̨̄Ʒ ♥●•٠·˙ $text ˙·٠•●♥ Ƹ̵̡Ӝ̵̨̄Ʒ ♥●•٠·˙

.--ღஐƸ̵̡Ӝ̵̨̄Ʒஐღ--. $text .--ღஐƸ̵̡Ӝ̵̨̄Ʒஐღ--.

ᐠ⸜ˎ_ˏ⸝^⸜ˎ_ˏ⸝^⸜ˎ $text ˏ⸝^⸜ˎ_ˏ⸝^⸜ˎ_ˏ⸝ᐟ

*◄থৣ $text 💖থৣ►

▀▄▀▄▀▄   🎀 $text 🎀  ▄▀▄▀▄▀

*´¯*.¸¸.*´¯*   🎀 $text 🎀   *¯´*.¸¸.*¯´*

๑۞๑,¸¸,ø¤º°°๑۩   🎀 $text 🎀   ۩๑°°º¤ø,¸¸,๑۞๑
",

"
𖢖⃟𖢖༎ ᵏ̶꯭ུᶦ꯭ ̶ུ𖣦꯭⃟|❰꯭♥️꯭❱|꯭⃟𖣦ⁿ̶꯭ུᵍ̶ུ༎𖢖⃟𖢖

𖢖⃟𖢖༎ᵠ̶꯭ུᵘ̶꯭ུ𖣦꯭⃟|❰꯭♥️꯭ⷷ❱|꯭⃟𖣦꯭ᵉ̶ུⁿ̶̶꯭ུ༎𖢖⃟𖢖

🌚 ̽- ⸼ⷮ↱ $text ᘭ⋆‌‌‌₍⃘͜࿄⃘᪼̑̆̂͜₎⋆ᘪ◖🧡⃟◗  ⋄

᭄◣꯭🌿꯭꯭ྂྂ ˡᵐ➘̶ $text 🌸꯭ྂ◢᭄

•▼⊂🧿⸼ᶤᴹ.͟👾• $text .̽̄͟🧿⊃
 
|͢ᵐ͢ᶦˢ͢ˢ $text ★⟦🌸⟧ .̶͜.|̶|̶̶̶̶

ℳ꯭᭄ⅈ꯭᭄꯭Ꮥ꯭᭄꯭Ꮥ♥️❖ᬼ།།ྃ $text །࿆།ྃ❖ᬼ

-.͜.❰͟🍭❱ ᷨ͢⃟ .̻͟. $text ࿐͜͡༎̶꯭͞🍓̶͟͞ ̶꯭͟͞⃤̶͟͞༎

🎌 ⃝⃘⚘⃓⵿⁌ᷟ⁍⵿⵿ⷶ⁌ᷝ⁍⵿ⷶ⁌ᷜ⁍⵿ⷷ❈⃟🎌⃟꯭$text 🎌 ⃝⃘⚘⃓

⃟⚜ʰ̶ᵗ̶̶ᵖ̶꯭ᵖ̶ˢ̶🌈⃤$text 🚸⃟↠.̶͟.

❰꯭᳑❰‌꯭᳑👑꯭‌❱꯭᳑❱‌᳑⇡꯭⎈꯭↱‌꯭꯭‌ $text ❱ᮣࣹ◁‌👑꯭ཻ֑‌⇲꯭

𖣔⃞⃘⃭͜͡𖣔̶꯭͞ $text ❪꯭🌟̶ུ࿆͎͎͞❫⛓ᮡ̸̶꯭͞ᆨ̶͞

▼͜͞͡❌ ⃫꯭♱꯭ $text 🚧̶̶꯭꯭͞.ⷯ͞❰̶꯭͞͞͞҉͟͞ ̶ⷯ͟͟͞҉❌

⟦͢🌿̶꯭̅͟⟧꯭ $text ༎̤ྂ̈͜͡🔅͜͡༎ྂ⟦🌵̶͢͞⟧

",

"

𒌍꯭ɪᴍ꯭.𝅯.𝅰.꯭𝅱.𝅲.꯭𝅱.𝅰.𝅯.𝅮.꯭.𝄞͡ $text 𝄞ꠋꠋꠋꠋꠋꠋꠋꠋꠋꠋꠋꠋꠋꠋꠋꠋ

🌼⃟⃩▒꯭𝓂꯭ʿʾ𝑖꯭˖𝕤᪱𝕤꯭᪱ 𓐬꯭⋆꯭꯭꯭ٜ🦋꯭꯭꯭⋆꯭ٜ𓐬꯭  $text ▒⃟⃩🌸

݊⊛꯭𖥫‌꯭➤†̲ꜛ͢ꜜ ͢ $text ⿻▸᙮ ⸼ ᷝⷮ⅛ ﹝⸸﹞↵

🍃𝆬𓋜𝅽𝄒𝆀𝆬𝆇𝆔𓐭ᬉྃ $text ᬉ‌ྃ𓐭𝄒𝆬𝆩𝅽𝆇𓋜🍃

◌ $text  ̶̶◌𖡬⊰ꦿⷮ⊰ꦿⷶ⊰ꦿᷡ⊰ꦿⷩ⊰ꦿⷶⷶ⸦⃫⃫̶̶꯭꯭͞͞👑⃫⃫̶̶꯭꯭͞͞⸧̶̶

🌼⃝⃭ᘝ༐༐ྂᎷ༐༐ྂᴀʟᴀᴋᴇ«➫»❥ $text  ̶ⷶᘜ⃝⃭🌼

✿⃝⃗💉꯭◌꯭ᷟ𝆔◌꯭ⷶ𝆔◌꯭ᷞ𝆔◌꯭ⷶ𝆔◌꯭ᷜ𝆔◌꯭ⷷ➲꯭➤꯭ $text ࿆🧚‍♀⃝⃗✿

𓀡𝓁ْ𝓂ْ۪ 𝄽𝓉𝒶ْ̥𝓀 𝄟🕷⃟⃘🕸⃟⃘🕷𝄟𝅾𝆬𝒷۪𝑜۪۠𝓎𓀡

  👑⸨̍̎᷍𐙤ˡ͢ᵐ𐙣꯭➪꯭ $text .꯭𝅯.𝅰.꯭𝅱.𝅲.꯭𝅱.𝅰.𝅯.𝅮.꯭ 𝐵꯭𝑂꯭𝑌꯭ ⸩࿆̎̎👑

՟ ‌♥️ ེ𝓂ʿʾ𝑖˖𝕤᪱𝕤᪱ ꜀⁪⁪⁪‌‌⁪_꜆ $text ◞᜴⊃

𖡛͢🌺꯭།།༾ ꯭ $text  ꯭𖡛꯭ؖ͢🌺།།

🍃⃘⃗⃖⃟✩❖꯭⍣꯭ $text ⍣꯭❖🍃⃘⃗⃖⃟✩

𓊆𓌚𝆜͜𖧷▼͜▴ⁱᔿ࿆𓐅𓏬𓆾𓏬𓐅 $text ᯾♥️࿐

⋆⃫̶݊͟͞♥️̶⃫͟͞𓈈⃘𐇽ⷩ $text 🌿̶⃫꯭͟͞⋆݊

𝄈𝄕𝄄꙳👑ٜٜ‌ᮢ‌꙰↳𐇽𝐢‌𐇽𝐦‌⇡▴⃯┌ $text ┘⃧⁌⃟⏨𝆋℡⁍

ྭ᪲  ‌ˡᵐ‌ٜ•[💌]٭༅ྀ༙⁪⁬⁮⁮⁮‌꯭ $text ༅ི༙٭ .‌.|‌|‌]•

⇲⃟⃤ᬼ↹ ꯭ ⃘ ⃘ ⃘꯭࿆ᷝ ⃘ ⃘꯭࿆ᷟ 🥀⃟ᬼ  $text  ᬼ⃟🍂

┣꯭𝆭𓂙꯭ 𓂙꯭ $text 𝆺𝅥𝆫͟͞👑̶⃫͟͞͞

",
);
$bior = array_rand($bio, 1);
if($text && file_get_contents("LegacySource941/$user_id/inasgram.txt")=="LegacySource0"){
bot('sendMessage',[
'chat_id'=>$chat_id,
 'parse_mode'=>"Markdown",
'text'=>"`$bio[$bior]`",
 'reply_markup'=>json_encode([ 
      'inline_keyboard'=>[
[['text'=>'▫️ قالب بعدی' ,'callback_data'=>"bio"]],
[['text'=>'🔙' ,'callback_data'=>"home"]],
]])
]);
unlink("LegacySource941/$user_id/inasgram.txt");}
if($text != '/start' and $text !='/panel' and  file_get_contents("Lordtabadol/$user_id/zeakef.txt") =='LegacySource0'){
  $items = ['، 🍕💕#','❥⁽🍿₎ٰ⇣ᴗ̈
','.⏳🧡:)','،🗞❤️#!','،🗞❤️#!
','، 🌼🖇"⌗
','««🍟🌿','،🌼🖤) ء','،🥀💛) ء','،📆🌼) ء','(⏰💛ء','،"(🥀💔"ء','،"(✨✊🏽"ء','،♥️🌿) ء','،"(💛🔐 ء','!،🙂💔 ء','،💤🌿،!','،🔐🌸)','،🕸💛،','،!👀💚،','،💆🏼💛) ء
','!🥀🎼 ، ⇣','!🥀🎼 ، ⇣','،!👅🌸) ء','،! 🚜💕 ⇣','،"(🔐💜 ء','،"(🔐💜 ء','⇡ ،💗🎧 ٰء
',];
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
  $_smile = array_rand($items,1);
  $smile = $items[$_smile];
   $count = count($text);
   $A = $text;
$A = str_replace('a','🅐',$A); 
$A = str_replace("b","🅑",$A); 
$A = str_replace("c","🅒",$A); 
$A = str_replace("d","🅓",$A); 
$A = str_replace("e","🅔",$A); 
$A = str_replace("f","🅕",$A); 
$A = str_replace("g","🅖",$A); 
$A = str_replace("h","🅗",$A); 
$A = str_replace("i","🅘",$A); 
$A = str_replace("j","🅙",$A); 
$A = str_replace("k","🅚",$A); 
$A = str_replace("l","🅛",$A); 
$A = str_replace("m","🅜",$A); 
$A = str_replace("n","🅝",$A); 
$A = str_replace("o","🅞",$A); 
$A = str_replace("p","🅟",$A); 
$A = str_replace("q","🅠",$A); 
$A = str_replace("r","🅡",$A); 
$A = str_replace("s","🅢",$A); 
$A = str_replace("t","🅣",$A); 
$A = str_replace("u"," 🅤",$A); 
$A = str_replace("v","🅥",$A); 
$A = str_replace("w","🅦",$A); 
$A = str_replace("x","🅧",$A); 
$A = str_replace("y","🅨",$A); 
$A = str_replace("z","🅩",$A); 
$A = str_replace('ض','ضً',$A); 
$A = str_replace('ص','صً',$A); 
$A = str_replace('ث','ثہ',$A); 
$A = str_replace('ق','قہً',$A); 
$A = str_replace('ف','فُہ',$A); 
$A = str_replace('غ','غہ',$A); 
$A = str_replace('ع','عہُ',$A); 
$A = str_replace('ه','ه',$A); 
$A = str_replace('خ','خہ',$A); 
$A = str_replace('ح','حہ',$A); 
$A = str_replace('ج','جہ',$A); 
$A = str_replace('ش','شہ',$A); 
$A = str_replace('س','سہ',$A); 
$A = str_replace('ي','يہ',$A); 
$A = str_replace('ب',' ٻً',$A);
$A = str_replace('ل','لہ',$A); 
$A = str_replace('ا',' ٳ',$A); 
$A = str_replace('ت','تہ',$A); 
$A = str_replace('ن','نٍ',$A); 
$A = str_replace('ك','كُہ',$A); 
$A = str_replace('م','مْ',$A); 
$A = str_replace('ة','ةً',$A); 
$A = str_replace('ء','ء',$A);
$A = str_replace('ظ','ظً',$A); 
$A = str_replace('ط','طہ',$A); 
 $A = str_replace('ذ','ذً',$A); 
$A = str_replace('د','دِ',$A); 
$A = str_replace('ز','زً',$A); 
$A = str_replace('ر','ڒٍ',$A); 
$A = str_replace('و','وٌ',$A); 
 $A = str_replace('ى','ىّ',$A);
bot('sendMessage',[ 
'chat_id'=>$chat_id, 
'text'=>$A."".$smile
   ]);
   }
if($text != '/start' and $text !='/panel' and  file_get_contents("Lordtabadol/$user_id/zeakef.txt") =='LegacySource0'){
  $items = ['، 🍕💕#','❥⁽🍿₎ٰ⇣ᴗ̈
','.⏳🧡:)','،🗞❤️#!','،🗞❤️#!
','، 🌼🖇"⌗
','««🍟🌿','،🌼🖤) ء','،🥀💛) ء','،📆🌼) ء','(⏰💛ء','،"(🥀💔"ء','،"(✨✊🏽"ء','،♥️🌿) ء','،"(💛🔐 ء','!،🙂💔 ء','،💤🌿،!','،🔐🌸)','،🕸💛،','،!👀💚،','،💆🏼💛) ء
','!🥀🎼 ، ⇣','!🥀🎼 ، ⇣','،!👅🌸) ء','،! 🚜💕 ⇣','،"(🔐💜 ء','،"(🔐💜 ء','⇡ ،💗🎧 ٰء
',];
  $_smile = array_rand($items,1);
  $smile = $items[$_smile];
   $count = count($text);
   $A = $text;
$A = str_replace('a','𝗔',$A); 
$A = str_replace("b","𝗕",$A); 
$A = str_replace("c","𝗖",$A); 
$A = str_replace("d","𝗗",$A); 
$A = str_replace("e","𝗘",$A); 
$A = str_replace("f","𝗙",$A); 
$A = str_replace("g","𝗚",$A); 
$A = str_replace("h","𝗛",$A); 
$A = str_replace("i","𝗜",$A); 
$A = str_replace("j","𝗝",$A); 
$A = str_replace("k","𝗞",$A); 
$A = str_replace("l","𝗟",$A); 
$A = str_replace("m","𝗠",$A); 
$A = str_replace("n","𝗡",$A); 
$A = str_replace("o","𝗢",$A); 
$A = str_replace("p","𝗣",$A); 
$A = str_replace("q","𝗤",$A); 
$A = str_replace("r","𝗥",$A); 
$A = str_replace("s","𝗦",$A); 
$A = str_replace("t","𝗧",$A); 
$A = str_replace("u","𝗨",$A); 
$A = str_replace("v","𝗩",$A); 
$A = str_replace("w","𝗪",$A); 
$A = str_replace("x","𝗫",$A); 
$A = str_replace("y","𝗬",$A); 
$A = str_replace("z","𝗭",$A); 
$A = str_replace('ض','ضـٰ̲ـہ',$A); 
$A = str_replace('ص','صـٰ̲ـہ',$A); 
$A = str_replace('ث','ثـٰ̲ـہ',$A); 
$A = str_replace('ق','قـٰ̲ـہ',$A); 
$A = str_replace('ف','فـٰ̲ـہ',$A); 
$A = str_replace('غ','غـٰ̲ـہ',$A); 
$A = str_replace('ع','عـٰ̲ـہ',$A); 
$A = str_replace('ه','هـٰ̲ـہ',$A); 
$A = str_replace('خ','خـٰ̲ـہ',$A); 
$A = str_replace('ح','حـٰ̲ـہ',$A); 
$A = str_replace('ج','جـٰ̲ـہ',$A); 
$A = str_replace('ش','شـٰ̲ـہ',$A); 
$A = str_replace('س','سـٰ̲ـہ',$A); 
$A = str_replace('ي','يـٰ̲ـہ',$A); 
$A = str_replace('ب','بـٰ̲ـہ',$A);
$A = str_replace('ل','لـٰ̲ـہ',$A); 
$A = str_replace('ا','اٰ',$A); 
$A = str_replace('ت','تـٰ̲ـہ',$A); 
$A = str_replace('ن','نـٰ̲ـہ',$A); 
$A = str_replace('م','مـٰ̲ـہ',$A); 
$A = str_replace('ك','كـٰ̲ـہ',$A); 
$A = str_replace('ة','ةً',$A); 
$A = str_replace('ء','ء',$A); 
$A = str_replace('ظ','ظـٰ̲ـہ',$A); 
$A = str_replace('ط','طـٰ̲ـہ',$A); 
$A = str_replace('ذ','ذٰ',$A); 
$A = str_replace('د','دٰ',$A); 
$A = str_replace('ز','زٰ',$A); 
$A = str_replace('ر','رٰ',$A); 
$A = str_replace('و','وٰ',$A); 
$A = str_replace('ى','ىَ',$A); 
bot('sendMessage',[ 
'chat_id'=>$chat_id, 
'text'=>$A."".$smile
   ]);
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
if($text != '/start' and $text !='/panel' and  file_get_contents("Lordtabadol/$user_id/zeakef.txt") =='LegacySource0'){
  $items = ['، 🍕💕#','❥⁽🍿₎ٰ⇣ᴗ̈
','.⏳🧡:)','،🗞❤️#!','،🗞❤️#!
','، 🌼🖇"⌗
','««🍟🌿','،🌼🖤) ء','،🥀💛) ء','،📆🌼) ء','(⏰💛ء','،"(🥀💔"ء','،"(✨✊🏽"ء','،♥️🌿) ء','،"(💛🔐 ء','!،🙂💔 ء','،💤🌿،!','،🔐🌸)','،🕸💛،','،!👀💚،','،💆🏼💛) ء
','!🥀🎼 ، ⇣','!🥀🎼 ، ⇣','،!👅🌸) ء','،! 🚜💕 ⇣','،"(🔐💜 ء','،"(🔐💜 ء','⇡ ،💗🎧 ٰء
',];
  $_smile = array_rand($items,1);
  $smile = $items[$_smile];
   $count = count($text);
$A = str_replace('a','🅰',$text); 
$A = str_replace('b','🅱',$A); 
$A = str_replace('c','🅲',$A); 
$A = str_replace('d','🅳',$A); 
$A = str_replace('e','🅴',$A); 
$A = str_replace('f','🅵',$A); 
$A = str_replace('g','🅶',$A); 
$A = str_replace('h','🅷',$A); 
$A = str_replace('i','🅸',$A); 
$A = str_replace('j','🅹',$A); 
$A = str_replace('k','🅺',$A); 
$A = str_replace('l','🅻',$A); 
$A = str_replace('m','🅼',$A); 
$A = str_replace('n','🅽',$A); 
$A = str_replace('o','🅾',$A); 
$A = str_replace('p','🅿',$A); 
$A = str_replace('q','🆀',$A); 
$A = str_replace('r','🆁',$A); 
$A = str_replace('s','🆂',$A); 
$A = str_replace('t','🆃',$A); 
$A = str_replace('u',' 🆄',$A); 
$A = str_replace('v','🆅',$A); 
$A = str_replace('w','🆆',$A); 
$A = str_replace('x','🆇',$A); 
$A = str_replace('y','🆈',$A); 
$A = str_replace('z','🆉',$A); 
$A = str_replace('ض','ضـ๋͜‏ـﮧ ',$A); 
$A = str_replace('ص','صـ๋͜‏ـﮧ',$A); 
$A = str_replace('ث','ثـ๋͜‏ـﮧ',$A); 
$A = str_replace('ق','قـ๋͜‏ـﮧ',$A); 
$A = str_replace('ف','ف͒ـ๋͜‏ـﮧ',$A); 
$A = str_replace('غ','غـ๋͜‏ـﮧ',$A); 
$A = str_replace('ع','عـ๋͜‏ـﮧ',$A); 
$A = str_replace('ه','ۿۿہ',$A); 
$A = str_replace('خ','خ̐ـ๋͜‏ـﮧ ',$A); 
$A = str_replace('ح','حـ๋͜‏ـﮧ ',$A); 
$A = str_replace('ج','جـ๋͜‏ـﮧ ',$A); 
$A = str_replace('ش','شـ๋͜‏ـﮧ ',$A); 
$A = str_replace('س','سـ๋͜‏ـﮧ',$A); 
$A = str_replace('ي',' يـ๋͜‏ـﮧ',$A); 
$A = str_replace('ب','  بـ๋͜‏ـﮧ',$A);
$A = str_replace('ل',' لـ๋͜‏ـﮧ',$A); 
$A = str_replace('ا','آ',$A); 
$A = str_replace('ت','  تـ๋͜‏ـﮧ',$A); 
$A = str_replace('ن','نـ๋͜‏ـﮧ',$A); 
$A = str_replace('م','مـ๋͜‏ـﮧ',$A); 
$A = str_replace('ك','ڪـ๋͜‏ـﮧ',$A); 
$A = str_replace('ة','ةً',$A); 
$A = str_replace('ء','ء',$A); 
$A = str_replace('ظ','ظـ๋͜‏ـﮧ',$A);
$A = str_replace('ط','طـ๋͜‏ـﮧ',$A); 
 $A = str_replace('ذ','ذِ',$A); 
$A = str_replace('د','دٰ',$A); 
$A = str_replace('ز','زً',$A); 
$A = str_replace('ر','ر',$A); 
$A = str_replace('و','ﯛ̲୭',$A); 
 $A = str_replace('ى','ىٰ',$A);
bot('sendMessage',[ 
'chat_id'=>$chat_id, 
'text'=>$A."".$smile
   ]);
   }

if($text != '/start' and $text !='/panel' and  file_get_contents("Lordtabadol/$user_id/zeakef.txt") =='LegacySource0'){
  $items = ['، 🍕💕#','❥⁽🍿₎ٰ⇣ᴗ̈
','.⏳🧡:)','،🗞❤️#!','،🗞❤️#!
','، 🌼🖇"⌗
','««🍟🌿','،🌼🖤) ء','،🥀💛) ء','،📆🌼) ء','(⏰💛ء','،"(🥀💔"ء','،"(✨✊🏽"ء','،♥️🌿) ء','،"(💛🔐 ء','!،🙂💔 ء','،💤🌿،!','،🔐🌸)','،🕸💛،','،!👀💚،','،💆🏼💛) ء
','!🥀🎼 ، ⇣','!🥀🎼 ، ⇣','،!👅🌸) ء','،! 🚜💕 ⇣','،"(🔐💜 ء','،"(🔐💜 ء','⇡ ،💗🎧 ٰء
',];
  $_smile = array_rand($items,1);
  $smile = $items[$_smile];
   $count = count($text);
$A = str_replace('a','̶a̶',$text); 
$A = str_replace('b','b̶',$A); 
$A = str_replace('c','c̶',$A); 
$A = str_replace('d','d̶',$A); 
$A = str_replace('e','e̶',$A); 
$A = str_replace('f','f̶',$A); 
$A = str_replace('g','g̶',$A); 
$A = str_replace('h','h̶',$A); 
$A = str_replace('i','i̶',$A); 
$A = str_replace('j','j̶',$A); 
$A = str_replace('k','k̶',$A); 
$A = str_replace('l','l̶',$A); 
$A = str_replace('m','m̶',$A); 
$A = str_replace('n','n̶',$A); 
$A = str_replace('o','o̶',$A); 
$A = str_replace('p','p̶',$A); 
$A = str_replace('q','q̶',$A); 
$A = str_replace('r','r̶',$A); 
$A = str_replace('s','s̶',$A); 
$A = str_replace('t','t̶',$A); 
$A = str_replace('u','ᵘ̶ ',$A); 
$A = str_replace('v','v̶',$A); 
$A = str_replace('w','w̶',$A); 
$A = str_replace('x','x̶',$A); 
$A = str_replace('y','y̶',$A); 
$A = str_replace('z','z̶',$A); 
$A = str_replace('ض','ضۜہٰٰ',$A); 
$A = str_replace('ص','صۛہٰٰ',$A); 
$A = str_replace('ث','ثہٰٰ',$A); 
$A = str_replace('ق','قྀ̲ہٰٰٰ',$A); 
$A = str_replace('ف','ف͒ہٰٰ',$A); 
$A = str_replace('غ','غہٰٰ',$A); 
$A = str_replace('ع','ۤ؏ـ',$A); 
$A = str_replace('ه','ھہ',$A); 
$A = str_replace('خ','خٰ̐ہ',$A); 
$A = str_replace('ح','حہٰٰ',$A); 
$A = str_replace('ج','جْۧ ',$A); 
$A = str_replace('ش','شِٰہٰٰ',$A); 
$A = str_replace('س','سٰٰٓ',$A); 
$A = str_replace('ي','يِٰہ',$A); 
$A = str_replace('ب','بّہ',$A);
$A = str_replace('ل','ل',$A); 
$A = str_replace('ا','آ',$A); 
$A = str_replace('ت',' تَہَٰ',$A); 
$A = str_replace('ن','نَِٰہ',$A); 
$A = str_replace('ك','ڪٰྀہٰٰٖ',$A); 
$A = str_replace('م','مـ',$A); 
$A = str_replace('ة','ةً',$A); 
$A = str_replace('ء','ء',$A); 
$A = str_replace('ظ','ظۗـہٰٰ',$A); 
$A = str_replace('ط','طۨہٰٰ',$A); 
 $A = str_replace('ذ','ذِ',$A); 
$A = str_replace('د','دُ',$A); 
$A = str_replace('ز','ژ',$A); 
$A = str_replace('ر','رٰ',$A); 
$A = str_replace('و','وً',$A); 
 $A = str_replace('ى','ى',$A);
bot('sendMessage',[ 
'chat_id'=>$chat_id, 
'text'=>$A."".$smile
   ]);
   }
if($text != '/start' and $text !='/panel' and  file_get_contents("Lordtabadol/$user_id/zeakef.txt") =='LegacySource0'){
  $items = ['، 🍕💕#','❥⁽🍿₎ٰ⇣ᴗ̈
','.⏳🧡:)','،🗞❤️#!','،🗞❤️#!
','، 🌼🖇"⌗
','««🍟🌿','،🌼🖤) ء','،🥀💛) ء','،📆🌼) ء','(⏰💛ء','،"(🥀💔"ء','،"(✨✊🏽"ء','،♥️🌿) ء','،"(💛🔐 ء','!،🙂💔 ء','،💤🌿،!','،🔐🌸)','،🕸💛،','،!👀💚،','،💆🏼💛) ء
','!🥀🎼 ، ⇣','!🥀🎼 ، ⇣','،!👅🌸) ء','،! 🚜💕 ⇣','،"(🔐💜 ء','،"(🔐💜 ء','⇡ ،💗🎧 ٰء
',];
  $_smile = array_rand($items,1);
  $smile = $items[$_smile];
   $count = count($text);
   $A = $text; 
$A = str_replace('a','⧼α⧽',$A); 
$A = str_replace('b','⧼в⧽',$A); 
$A = str_replace('c','⧼c⧽',$A); 
$A = str_replace('d','⧼ɒ⧽',$A); 
$A = str_replace('e','⧼є⧽',$A); 
$A = str_replace('f','⧼f⧽',$A); 
$A = str_replace('g','⧼ɢ⧽',$A); 
$A = str_replace('h','⧼н⧽',$A); 
$A = str_replace('i','⧼ɪ⧽',$A); 
$A = str_replace('j','⧼ᴊ⧽',$A); 
$A = str_replace('k','⧼ĸ⧽',$A); 
$A = str_replace('l','⧼ℓ⧽',$A); 
$A = str_replace('m','⧼м⧽',$A); 
$A = str_replace('n','⧼и⧽',$A); 
$A = str_replace('o','⧼σ⧽',$A); 
$A = str_replace('p','⧼ρ⧽',$A); 
$A = str_replace('q','⧼q⧽',$A); 
$A = str_replace('r','⧼я⧽',$A); 
$A = str_replace('s','⧼s⧽',$A); 
$A = str_replace('t','⧼τ⧽',$A); 
$A = str_replace('u','⧼υ⧽',$A); 
$A = str_replace('v','⧼v⧽',$A); 
$A = str_replace('w','⧼ω⧽',$A); 
$A = str_replace('x','⧼x⧽',$A); 
$A = str_replace('y','⧼y⧽',$A); 
$A = str_replace('z','⧼z⧽',$A); 
$A = str_replace('ض','ضـٰ๋۪͜ﮧٰ',$A); 
$A = str_replace('ص','صـٌٍ๋ۤ͜ﮧْ',$A); 
$A = str_replace('ث','ث̲ꫭـﮧ',$A); 
$A = str_replace('ق','قٰٰྀ̲ـِٰ̲ﮧْ',$A); 
$A = str_replace('ف','',$A); 
$A = str_replace('غ','فـٌٍ๋ۤ͜ﮧ',$A); 
$A = str_replace('ع','غـّٰ̐ہٰٰ',$A); 
$A = str_replace('ه','ٰ̲ھہ',$A); 
$A = str_replace('خ','خ̲ﮧ',$A); 
$A = str_replace('ح','ح̲ꪳـﮧ',$A); 
$A = str_replace('ج','ج̲ꪸـﮧ',$A); 
$A = str_replace('ش','ش̲ꪾـﮧ',$A); 
$A = str_replace('س','سـ̷ٰٰﮧْ',$A); 
$A = str_replace('ي','يـِٰ̲ﮧ',$A); 
$A = str_replace('ب','ب̲ꪰـﮧ',$A);
$A = str_replace('ل','لٍُـّٰ̐ہ',$A); 
$A = str_replace('ا',' ཻا ',$A); 
$A = str_replace('ت','تـٰۧﮧ',$A); 
$A = str_replace('ن','نٰ̲̐ـﮧْ',$A); 
$A = str_replace('م','مٰٰྀ̲ـِٰ̲ﮧْ',$A); 
$A = str_replace('ك','كـِّﮧْٰٖ',$A); 
$A = str_replace('ة','ةً',$A); 
$A = str_replace('ء','ء',$A); 
$A = str_replace('ظ','ظَـ๋͜ﮧْ',$A); 
$A = str_replace('ط','ط̲꫁ـﮧ',$A); 
 $A = str_replace('ذ','ذٖ',$A); 
$A = str_replace('د','دُ',$A); 
$A = str_replace('ز','ژٰ',$A); 
$A = str_replace('ر','',$A); 
$A = str_replace('و','ﯛ૭',$A); 
 $A = str_replace('ى','ىِ',$A); 
bot('sendMessage',[ 
'chat_id'=>$chat_id, 
'text'=>$A."".$smile
   ]);
   }
if($text != '/start' and $text !='/panel' and  file_get_contents("Lordtabadol/$user_id/zeakef.txt") =='LegacySource0'){
  $items = ['، 🍕💕#','❥⁽🍿₎ٰ⇣ᴗ̈
','.⏳🧡:)','،🗞❤️#!','،🗞❤️#!
','، 🌼🖇"⌗
','««🍟🌿','،🌼🖤) ء','،🥀💛) ء','،📆🌼) ء','(⏰💛ء','،"(🥀💔"ء','،"(✨✊🏽"ء','،♥️🌿) ء','،"(💛🔐 ء','!،🙂💔 ء','،💤🌿،!','،🔐🌸)','،🕸💛،','،!👀💚،','،💆🏼💛) ء
','!🥀🎼 ، ⇣','!🥀🎼 ، ⇣','،!👅🌸) ء','،! 🚜💕 ⇣','،"(🔐💜 ء','،"(🔐💜 ء','⇡ ،💗🎧 ٰء
',];
  $_smile = array_rand($items,1);
  $smile = $items[$_smile];
   $count = count($text);
$A = str_replace('ض', 'ضِـٰٚـِْ✮ِـٰٚـِْ', $text);
   $A = str_replace('ص', 'صِـٰٚـِْ✮ِـٰٚـِْ', $A);
   $A = str_replace('ث', 'ثِـٰٚـِْ✮ِـٰٚـِْ', $A);
   $A = str_replace('ق', 'قِـٰٚـِْ✮ِـٰٚـِْ', $A);
   $A = str_replace('ف', 'فِ͒ـٰٚـِْ✮ِـٰٚـِْ', $A);
   $A = str_replace('غ', 'غِـٰٚـِْ✮ِـٰٚـِْ', $A);
   $A = str_replace('ع', 'عِـٰٚـِْ✮ِـٰٚـِْ', $A);
   $A = str_replace('خ', 'خِ̐ـٰٚـِْ✮ِـٰٚـِْ', $A);
   $A = str_replace('ح', 'حِـٰٚـِْ✮ِـٰٚـِْ', $A);
   $A = str_replace('ج', 'جِـٰٚـِْ✮ِـٰٚـِْ', $A);
   $A = str_replace('ش', 'شِـٰٚـِْ✮ِـٰٚـِْ', $A);
   $A = str_replace('س', 'سِـٰٚـِْ✮ِـٰٚـِْ', $A);
   $A = str_replace('ي', 'يِـٰٚـِْ✮ِـٰٚـِْ', $A);
   $A = str_replace('ب', 'بِـٰٚـِْ✮ِـٰٚـِْ', $A);
   $A = str_replace('ل', 'لِـٰٚـِْ✮ِـٰٚـِْ', $A);
   $A = str_replace('ا', 'آ', $A);
   $A = str_replace('ت', 'تِـٰٚـِْ✮ِـٰٚـِْ', $A);
   $A = str_replace('ن', 'نِـٰٚـِْ✮ِـٰٚـِْ', $A);
   $A = str_replace('م', 'مِـٰٚـِْ✮ِـٰٚـِْ', $A);
   $A = str_replace('ك', 'ڪِـٰٚـِْ✮ِـٰٚـِْ', $A);
   $A = str_replace('ط', 'طِـٰٚـِْ✮ِـٰٚـِْ', $A);
   $A = str_replace('ذ', 'ذِـٰٚـِْ✮ِـٰٚـِْ', $A);
   $A = str_replace('ظ', 'ظِـٰٚـِْ✮ِـٰٚـِْ', $A);
   $A = str_replace('ء', 'ء', $A);
   $A = str_replace('ؤ', 'ؤ', $A);
   $A = str_replace('ر', 'ر', $A);
   $A = str_replace('ى', 'ى', $A);
   $A = str_replace('ز', 'ز', $A);
   $A = str_replace('ظ', 'ظِـٰٚـِْ✮ِـٰٚـِْ', $A);
   $A = str_replace('و', 'ﯛ̲୭', $A);
   $A = str_replace("ه", "ۿۿہ", $A);
   $A = str_replace('a',"ᵃ",$A);
$A = str_replace("b","ᵇ",$A);
$A = str_replace("c","ᶜ",$A);
$A = str_replace("d","ᵈ",$A);
$A = str_replace("e","ᵉ",$A);
$A = str_replace("f","ᶠ",$A);
$A = str_replace("g","ᵍ",$A);
$A = str_replace("h","ʰ",$A);
$A = str_replace("i","ᶤ",$A);
$A = str_replace("j","ʲ",$A);
$A = str_replace("k","ᵏ",$A);
$A = str_replace("l","ˡ",$A);
$A = str_replace("m","ᵐ",$A);
$A = str_replace("n","ᶰ",$A);
$A = str_replace("o","ᵒ",$A);
$A = str_replace("p","ᵖ",$A);
$A = str_replace("q","ᵠ",$A);
$A = str_replace("r","ʳ",$A);
$A = str_replace("s","ˢ",$A);
$A = str_replace("t","ᵗ",$A);
$A = str_replace("u","ᵘ",$A);
$A = str_replace("v","ᵛ",$A);
$A = str_replace("w","ʷ",$A);
$A = str_replace("x","ˣ",$A);
$A = str_replace("y","ʸ",$A);
$A = str_replace("z","ᶻ",$A);

   bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>$A." ".$smile
   ]);
}
   if($text != '/start' and $text !='/panel' and  file_get_contents("Lordtabadol/$user_id/zeakef.txt") =='LegacySource0'){
  $items = ['، 🍕💕#','❥⁽🍿₎ٰ⇣ᴗ̈
','.⏳🧡:)','،🗞❤️#!','،🗞❤️#!
','، 🌼🖇"⌗
','««🍟🌿','،🌼🖤) ء','،🥀💛) ء','،📆🌼) ء','(⏰💛ء','،"(🥀💔"ء','،"(✨✊🏽"ء','،♥️🌿) ء','،"(💛🔐 ء','!،🙂💔 ء','،💤🌿،!','،🔐🌸)','،🕸💛،','،!👀💚،','،💆🏼💛) ء
','!🥀🎼 ، ⇣','!🥀🎼 ، ⇣','،!👅🌸) ء','،! 🚜💕 ⇣','،"(🔐💜 ء','،"(🔐💜 ء','⇡ ،💗🎧 ٰء
',];
  $_smile = array_rand($items,1);
  $smile = $items[$_smile];
   $count = count($text);
$A = $text;
   $A = str_replace('ض', 'ض͜ــ๋͜ـ', $A);
   $A = str_replace('ص', 'ص͜ــ๋͜ـ', $A);
   $A = str_replace('ث', 'ث͜ــ๋͜ـ͜ــ๋͜ـ', $A);
   $A = str_replace('ق', 'ق͜ــ๋͜ـ', $A);
   $A = str_replace('ف', 'ف͒͜ــ๋͜ـ', $A);
   $A = str_replace('غ', 'غ͜ــ๋͜ـ', $A);
   $A = str_replace('ع', 'ع͜ــ๋͜ـ', $A);
   $A = str_replace('خ', 'خ̐͜ــ๋͜ـ', $A);
   $A = str_replace('ح', 'ح͜ــ๋͜ـ', $A);
   $A = str_replace('ج', 'ج͜ــ๋͜ـ', $A);
   $A = str_replace('ش', 'ش͜ــ๋͜ـ', $A);
   $A = str_replace('س', 'س͜ــ๋͜ـ', $A);
   $A = str_replace('ي', 'ي͜ــ๋͜ـ', $A);
   $A = str_replace('ب', 'ب͜ــ๋͜ـ', $A);
   $A = str_replace('ل', 'ل͜ــ๋͜ـ', $A);
   $A = str_replace('ا', 'آ', $A);
   $A = str_replace('ت', 'ت͜ــ๋͜ـ', $A);
   $A = str_replace('ن', 'ن͜ــ๋͜ـ', $A);
   $A = str_replace('م', 'م͜ــ๋͜ـ', $A);
   $A = str_replace('ك', 'ڪ͜ــ๋͜ـ', $A);
   $A = str_replace('ط', 'ط͜ــ๋͜ـ', $A);
   $A = str_replace('ظ', 'ظ͜ــ๋͜ـ', $A);
   $A = str_replace('ء', 'ء', $A);
   $A = str_replace('ؤ', 'ؤ', $A);
   $A = str_replace('ر', 'ر', $A);
   $A = str_replace('ى', 'ى', $A);
   $A = str_replace('ز', 'ز', $A);
   $A = str_replace('ظ', 'ظــ๋͜ـ', $A);
   $A = str_replace('و', 'ﯛ̲୭', $A);
   $A = str_replace("ه", "ۿۿہ", $A);
   $A = str_replace('q', 'Θ' , $A);
  	 $A = str_replace('w', 'ẁ' , $A);
	 $A = str_replace('e', 'ë' , $A);
  	 $A = str_replace('r', 'я' , $A);
	 $A = str_replace('t', 'ť' , $A);
  	 $A = str_replace('y', 'y' , $A);
	 $A = str_replace('u', 'ע' , $A);
  	 $A = str_replace('i', 'į' , $A);
	 $A = str_replace('o', 'ð' , $A);
  	 $A = str_replace('p', 'ρ' , $A);
	 $A = str_replace('a', 'à' , $A);
  	 $A = str_replace('s', 'ś' , $A);
	 $A = str_replace('d', 'ď' , $A);
  	 $A = str_replace('f', '∫' , $A);
	 $A = str_replace('g', 'ĝ' , $A);
  	 $A = str_replace('h', 'ŋ' , $A);
	 $A = str_replace('j', 'Ј' , $A);
  	 $A = str_replace('k', 'қ' , $A);
	 $A = str_replace('l', 'Ŀ' , $A);
  	 $A = str_replace('z', 'ź' , $A);
	 $A = str_replace('x', 'א' , $A);
  	 $A = str_replace('c', 'ć' , $A);
	 $A = str_replace('v', 'V' , $A);
  	 $A = str_replace('b', 'Ђ' , $A);
  	 $A = str_replace('n', 'ŋ' , $A);
	 $A = str_replace('m', 'm' , $A);
   bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>$A." ".$smile
   ]);
}

   if($text != '/start' and $text !='/panel' and  file_get_contents("Lordtabadol/$user_id/zeakef.txt") =='LegacySource0'){
  $items = ['، 🍕💕#','❥⁽🍿₎ٰ⇣ᴗ̈
','.⏳🧡:)','،🗞❤️#!','،🗞❤️#!
','، 🌼🖇"⌗
','««🍟🌿','،🌼🖤) ء','،🥀💛) ء','،📆🌼) ء','(⏰💛ء','،"(🥀💔"ء','،"(✨✊🏽"ء','،♥️🌿) ء','،"(💛🔐 ء','!،🙂💔 ء','،💤🌿،!','،🔐🌸)','،🕸💛،','،!👀💚،','،💆🏼💛) ء
','!🥀🎼 ، ⇣','!🥀🎼 ، ⇣','،!👅🌸) ء','،! 🚜💕 ⇣','،"(🔐💜 ء','،"(🔐💜 ء','⇡ ،💗🎧 ٰء
',];
  $_smile = array_rand($items,1);
  $smile = $items[$_smile];
   $count = count($text);
   $A = $text;
   $A = str_replace('ض', 'ضِـೋـ', $A);
   $A = str_replace('ص', 'صِـೋـ', $A);
   $A = str_replace('ث', 'ثِـೋـ', $A);
   $A = str_replace('ق', 'قِـೋـ', $A);
   $A = str_replace('ف', 'فِ͒ـೋـ', $A);
   $A = str_replace('غ', 'غِـೋـ', $A);
   $A = str_replace('ع', 'عِـೋـ', $A);
   $A = str_replace('خ', 'خِ̐ـೋـ', $A);
   $A = str_replace('ح', 'حِـೋـ', $A);
   $A = str_replace('ج', 'جِـೋـ', $A);
   $A = str_replace('ش', 'شِـೋـ', $A);
   $A = str_replace('س', 'سِـೋـ', $A);
   $A = str_replace('ي', 'يِـೋـ', $A);
   $A = str_replace('ب', 'بِـೋـ', $A);
   $A = str_replace('ل', 'لِـೋـ', $A);
   $A = str_replace('ا', 'آ', $A);
   $A = str_replace('ت', 'تِـೋـ', $A);
   $A = str_replace('ن', 'نِـೋـ', $A);
   $A = str_replace('م', 'مِـೋـ', $A);
   $A = str_replace('ك', 'ڪِـೋـ', $A);
   $A = str_replace('ط', 'طِـೋـ', $A);
   $A = str_replace('ظ', 'ظِـೋـ', $A);
  $A = str_replace('ء', 'ء', $A);
   $A = str_replace('ؤ', 'ؤ', $A);
   $A = str_replace('ر', 'ر', $A);
   $A = str_replace('ى', 'ى', $A);
   $A = str_replace('ز', 'ز', $A);
   $A = str_replace('و', 'ﯛ̲୭', $A);
   $A = str_replace("ه", "ۿۿہ", $A);
   $A = str_replace('q', 'Ҩ' , $A);
  	 $A = str_replace('w', 'Щ' , $A);
	 $A = str_replace('e', 'Є' , $A);
  	 $A = str_replace('r', 'R' , $A);
	 $A = str_replace('t', 'ƚ' , $A);
  	 $A = str_replace('y', '￥' , $A);
	 $A = str_replace('u', 'Ц' , $A);
  	 $A = str_replace('i', 'Ī' , $A);
	 $A = str_replace('o', 'Ø' , $A);
  	 $A = str_replace('p', 'P' , $A);
	 $A = str_replace('a', 'Â' , $A);
  	 $A = str_replace('s', '$' , $A);
	 $A = str_replace('d', 'Ð' , $A);
  	 $A = str_replace('f', 'Ŧ' , $A);
	 $A = str_replace('g', 'Ǥ' , $A);
  	 $A = str_replace('h', 'Ħ' , $A);
	 $A = str_replace('j', 'ʖ' , $A);
  	 $A = str_replace('k', 'Қ' , $A);
	 $A = str_replace('l', 'Ŀ' , $A);
  	 $A = str_replace('z', 'Ẕ' , $A);
	 $A = str_replace('x', 'X' , $A);
  	 $A = str_replace('c', 'Ĉ' , $A);
	 $A = str_replace('v', 'V' , $A);
  	 $A = str_replace('b', 'ß' , $A);
  	 $A = str_replace('n', 'И' , $A);
	 $A = str_replace('m', 'ⴅ' , $A);
   bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>$A." ".$smile
   ]);
}

 if($text != '/start' and $text !='/panel'   and  file_get_contents("Lordtabadol/$user_id/zeakef.txt") =='LegacySource0'){
  $items = ['، 🍕💕#','❥⁽🍿₎ٰ⇣ᴗ̈
','.⏳🧡:)','،🗞❤️#!','،🗞❤️#!
','، 🌼🖇"⌗
','««🍟🌿','،🌼🖤) ء','،🥀💛) ء','،📆🌼) ء','(⏰💛ء','،"(🥀💔"ء','،"(✨✊🏽"ء','،♥️🌿) ء','،"(💛🔐 ء','!،🙂💔 ء','،💤🌿،!','،🔐🌸)','،🕸💛،','،!👀💚،','،💆🏼💛) ء
','!🥀🎼 ، ⇣','!🥀🎼 ، ⇣','،!👅🌸) ء','،! 🚜💕 ⇣','،"(🔐💜 ء','،"(🔐💜 ء','⇡ ،💗🎧 ٰء
',];
  $_smile = array_rand($items,1);
  $smile = $items[$_smile];
   $count = count($text);
   $A = $text;
   $A = str_replace('ض', 'ضـ๋͜‏ـ', $text);
   $A = str_replace('ص', 'صـ๋͜‏ـ', $A);
   $A = str_replace('ث', 'ثـ๋͜‏ـ', $A);
   $A = str_replace('ق', 'قـ๋͜‏ـ', $A);
   $A = str_replace('ف', 'ف͒ـ๋͜‏ـ', $A);
   $A = str_replace('غ', 'غـ๋͜‏ـ', $A);
   $A = str_replace('ع', 'عـ๋͜‏ـ', $A);
   $A = str_replace('خ', 'خ̐ـ๋͜‏ـ', $A);
   $A = str_replace('ح', 'حـ๋͜‏ـ', $A);
   $A = str_replace('ج', 'جـ๋͜‏ـ', $A);
   $A = str_replace('ش', 'شـ๋͜‏ـ', $A);
   $A = str_replace('س', 'سـ๋͜‏ـ', $A);
   $A = str_replace('ي', 'يـ๋͜‏ـ', $A);
   $A = str_replace('ب', 'بـ๋͜‏ـ', $A);
   $A = str_replace('ل', 'لـ๋͜‏ـ', $A);
   $A = str_replace('ا', 'آ', $A);
   $A = str_replace('ت', 'تـ๋͜‏ـ', $A);
   $A = str_replace('ن', 'نـ๋͜‏ـ', $A);
   $A = str_replace('م', 'مـ๋͜‏ـ', $A);
   $A = str_replace('ك', 'ڪـ๋͜‏ـ', $A);
   $A = str_replace('ط', 'طـ๋͜‏ـ', $A);
   $A = str_replace('ظ', 'ظـ๋͜‏ـ', $A);
   $A = str_replace('ء', 'ء', $A);
   $A = str_replace('ؤ', 'ؤ', $A);
   $A = str_replace('ر', 'ر', $A);
   $A = str_replace('ى', 'ى', $A);
   $A = str_replace('ز', 'ز', $A);
   $A = str_replace('و', 'ﯛ̲୭', $A);
   $A = str_replace("ه", "ۿۿہ", $A);
   
   $A= str_replace('q', '•🇶', $A);
   $A= str_replace('w', '•🇼', $A);
   $A= str_replace('e', '•🇪', $A);
   $A= str_replace('r', '•🇷', $A);
   $A= str_replace('t', '•🇹', $A);
   $A= str_replace('y', '•🇾', $A);
   $A= str_replace('u', '•🇻', $A);
   $A= str_replace('i', '•🇮', $A);
   $A= str_replace('o', '•🇴', $A);
   $A= str_replace('p', '•🇵', $A);
   $A= str_replace('a', '•🇦', $A);
   $A= str_replace('s', '•🇸', $A);
   $A= str_replace('d', '•🇩', $A);
   $A= str_replace('f', '•🇫', $A);
   $A= str_replace('g', '•🇬', $A);
   $A= str_replace('h', '•🇭', $A);
   $A= str_replace('j', '•🇯', $A);
   $A= str_replace('k', '•🇰', $A);
   $A= str_replace('l', '•🇱', $A);
   $A= str_replace('z', '•🇿', $A);
   $A= str_replace('x', '•🇽', $A);
   $A= str_replace('c', '•🇨', $A);
   $A= str_replace('v', '•🇺', $A);
   $A= str_replace('b', '•🇧', $A);
   $A= str_replace('n', '•🇳', $A);
   $A= str_replace('m', '•🇲', $A);
   bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>$A." ".$smile
   ]);
}
   if($text != '/start' and $text !='/panel'   and  file_get_contents("Lordtabadol/$user_id/zeakef.txt") =='LegacySource0'){
  $items = ['، 🍕💕#','❥⁽🍿₎ٰ⇣ᴗ̈
','.⏳🧡:)','،🗞❤️#!','،🗞❤️#!
','، 🌼🖇"⌗
','««🍟🌿','،🌼🖤) ء','،🥀💛) ء','،📆🌼) ء','(⏰💛ء','،"(🥀💔"ء','،"(✨✊🏽"ء','،♥️🌿) ء','،"(💛🔐 ء','!،🙂💔 ء','،💤🌿،!','،🔐🌸)','،🕸💛،','،!👀💚،','،💆🏼💛) ء
','!🥀🎼 ، ⇣','!🥀🎼 ، ⇣','،!👅🌸) ء','،! 🚜💕 ⇣','،"(🔐💜 ء','،"(🔐💜 ء','⇡ ،💗🎧 ٰء
',];
  $_smile = array_rand($items,1);
  $smile = $items[$_smile];
   $count = count($text);
   $A = $text;
   $A = str_replace('ض', 'ضِٰـِۢ', $A);
   $A = str_replace('ص', 'صِٰـِۢ', $A);
   $A = str_replace('ث', 'ثِٰـِۢ', $A);
   $A = str_replace('ق', 'قِٰـِۢ', $A);
   $A = str_replace('ف', 'فِٰ͒ـِۢ', $A);
   $A = str_replace('غ', 'غِٰـِۢ', $A);
   $A = str_replace('ع', 'عِٰـِۢ', $A);
   $A = str_replace('خ', 'خِٰ̐ـِۢ', $A);
   $A = str_replace('ح', 'حِٰـِۢ', $A);
   $A = str_replace('ج', 'جِٰـِۢ', $A);
   $A = str_replace('ش', 'شِٰـِۢ', $A);
   $A = str_replace('س', 'سِٰـِۢ', $A);
   $A = str_replace('ي', 'يِٰـِۢ', $A);
   $A = str_replace('ب', 'بِٰـِۢ', $A);
   $A = str_replace('ل', 'لِٰـِۢ', $A);
   $A = str_replace('ا', 'آ', $A);
   $A = str_replace('ت', 'تِٰـِۢ', $A);
   $A = str_replace('ن', 'نِٰـِۢ', $A);
   $A = str_replace('م', 'مِٰـِۢ', $A);
   $A = str_replace('ك', 'ڪِٰـِۢ', $A);
   $A = str_replace('ط', 'طِٰـِۢ', $A);
   $A = str_replace('ظ', 'ظِٰـِۢ', $A);
   $A = str_replace('ء', 'ء', $A);
   $A = str_replace('ؤ', 'ؤ', $A);
   $A = str_replace('ر', 'ر', $A);
   $A = str_replace('ى', 'ى', $A);
   $A = str_replace('ز', 'ز', $A);
   $A = str_replace('و', 'ﯛ̲୭', $A);
   $A = str_replace("ه", "ۿۿہ", $A);
   
   $A = str_replace('q', 'Ⴓ' , $A);
     $A = str_replace('w', 'ᗯ' , $A);
	 $A = str_replace('e', 'ᕮ' , $A);
     $A = str_replace('r', 'ᖇ' , $A);
	 $A = str_replace('t', 'ͳ' , $A);
 	$A = str_replace('y', 'ϒ' , $A);
	 $A = str_replace('u', 'ᘮ' , $A);
	 $A = str_replace('i', 'ᓰ' , $A);
	 $A = str_replace('o', '〇' , $A);
	 $A = str_replace('p', 'ᖘ' , $A);
	 $A = str_replace('a', 'ᗩ' , $A);
	 $A = str_replace('s', 'ᔕ' , $A);
	 $A = str_replace('d', 'ᗪ' , $A);
	 $A = str_replace('f', 'Բ' , $A);
	 $A = str_replace('g', 'ᘐ' , $A);
	 $A = str_replace('h', 'ᕼ' , $A);
	 $A = str_replace('j', 'ᒎ' , $A);
	 $A = str_replace('k', 'Ḱ' , $A);
	 $A = str_replace('l', 'ᒪ' , $A);
	 $A = str_replace('z', 'Ꙁ' , $A);
	 $A = str_replace('x', 'Ꮖ' , $A);
	 $A = str_replace('c', 'ᑕ' , $A);
	 $A = str_replace('v', 'ᐯ' , $A);
	 $A = str_replace('b', 'ᙖ' , $A);
	 $A = str_replace('n', 'ᘉ' , $A);
	 $A = str_replace('m', 'ᙢ' , $A);

   bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>$A." ".$smile
   ]);
}
   if($text != '/start' and $text !='/panel'   and  file_get_contents("Lordtabadol/$user_id/zeakef.txt") =='LegacySource0'){
  $items = ['، 🍕💕#','❥⁽🍿₎ٰ⇣ᴗ̈
','.⏳🧡:)','،🗞❤️#!','،🗞❤️#!
','، 🌼🖇"⌗
','««🍟🌿','،🌼🖤) ء','،🥀💛) ء','،📆🌼) ء','(⏰💛ء','،"(🥀💔"ء','،"(✨✊🏽"ء','،♥️🌿) ء','،"(💛🔐 ء','!،🙂💔 ء','،💤🌿،!','،🔐🌸)','،🕸💛،','،!👀💚،','،💆🏼💛) ء
','!🥀🎼 ، ⇣','!🥀🎼 ، ⇣','،!👅🌸) ء','،! 🚜💕 ⇣','،"(🔐💜 ء','،"(🔐💜 ء','⇡ ،💗🎧 ٰء
',];
  $_smile = array_rand($items,1);
  $smile = $items[$_smile];
   $count = count($text);
   $A = $text;
   $A = str_replace('ض', 'ض֠ــۢ͜ـٰ̲ـ', $A);
   $A = str_replace('ص', 'ص֠ــۢ͜ـٰ̲ـ', $A);
   $A = str_replace('ث', 'ث֠ــۢ͜ـٰ̲ـ', $A);
   $A = str_replace('ق', 'ق֠ــۢ͜ـٰ̲ـ', $A);
   $A = str_replace('ف', 'ف͒֠ــۢ͜ـٰ̲ـ', $A);
   $A = str_replace('غ', 'غ֠ــۢ͜ـٰ̲ـ', $A);
   $A = str_replace('ع', 'ع֠ــۢ͜ـٰ̲ـ', $A);
   $A = str_replace('خ', 'خ̐֠ــۢ͜ـٰ̲ـ', $A);
   $A = str_replace('ح', 'ح֠ــۢ͜ـٰ̲ـ', $A);
   $A = str_replace('ج', 'ج֠ــۢ͜ـٰ̲ـ', $A);
   $A = str_replace('ش', 'ش֠ــۢ͜ـٰ̲ـ', $A);
   $A = str_replace('س', 'س֠ــۢ͜ـٰ̲ـ', $A);
   $A = str_replace('ي', 'ي֠ــۢ͜ـٰ̲ـ', $A);
   $A = str_replace('ب', 'ب֠ــۢ͜ـٰ̲ـ', $A);
   $A = str_replace('ل', 'ل֠ــۢ͜ـٰ̲ـ', $A);
   $A = str_replace('ا', 'آ', $A);
   $A = str_replace('ت', 'ت֠ــۢ͜ـٰ̲ـ', $A);
   $A = str_replace('ن', 'ن֠ــۢ͜ـٰ̲ـ', $A);
   $A = str_replace('م', 'م֠ــۢ͜ـٰ̲ـ', $A);
   $A = str_replace('ك', 'ڪ֠ــۢ͜ـٰ̲ـ', $A);
   $A = str_replace('ط', 'ط֠ــۢ͜ـٰ̲ـ', $A);
   $A = str_replace('ظ', 'ظ֠ــۢ͜ـٰ̲ـ', $A);
  $A = str_replace('ء', 'ء', $A);
   $A = str_replace('ؤ', 'ؤ', $A);
   $A = str_replace('ر', 'ر', $A);
   $A = str_replace('ى', 'ى', $A);
   $A = str_replace('ز', 'ز', $A);
   $A = str_replace('و', 'ﯛ̲୭', $A);
   $A = str_replace("ه", "໋۠هہؚ", $A);
   $A = str_replace('q', 'q' , $A);
  	 $A = str_replace('w', 'ω' , $A);
	 $A = str_replace('e', 'ε' , $A);
  	 $A = str_replace('r', 'я' , $A);
	 $A = str_replace('t', 'т' , $A);
  	 $A = str_replace('y', 'ү' , $A);
	 $A = str_replace('u', 'υ' , $A);
  	 $A = str_replace('i', 'ι' , $A);
	 $A = str_replace('o', 'σ' , $A);
  	 $A = str_replace('p', 'ρ' , $A);
	 $A = str_replace('a', 'α' , $A);
  	 $A = str_replace('s', 's' , $A);
	 $A = str_replace('d', '∂' , $A);
  	 $A = str_replace('f', 'ғ' , $A);
	 $A = str_replace('g', 'g' , $A);
  	 $A = str_replace('h', 'н' , $A);
	 $A = str_replace('j', 'נ' , $A);
  	 $A = str_replace('k', 'к' , $A);
	 $A = str_replace('l', 'ℓ' , $A);
  	 $A = str_replace('z', 'z' , $A);
	 $A = str_replace('x', 'x' , $A);
  	 $A = str_replace('c', 'c' , $A);
	 $A = str_replace('v', 'v' , $A);
  	 $A = str_replace('b', 'в' , $A);
  	 $A = str_replace('n', 'η' , $A);
	 $A = str_replace('m', 'м' , $A);
   
   bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>$A." ".$smile
   ]);
}
   if($text != '/start' and $text !='/panel'   and  file_get_contents("Lordtabadol/$user_id/zeakef.txt") =='LegacySource0'){
  $items = ['، 🍕💕#','❥⁽🍿₎ٰ⇣ᴗ̈
','.⏳🧡:)','،🗞❤️#!','،🗞❤️#!
','، 🌼🖇"⌗
','««🍟🌿','،🌼??) ء','،🥀💛) ء','،📆🌼) ء','(⏰💛ء','،"(🥀💔"ء','،"(✨✊🏽"ء','،♥️🌿) ء','،"(💛🔐 ء','!،🙂💔 ء','،💤🌿،!','،🔐🌸)','،🕸💛،','،!👀💚،','،💆🏼💛) ء
','!🥀🎼 ، ⇣','!🥀🎼 ، ⇣','،!👅🌸) ء','،! 🚜💕 ⇣','،"(🔐💜 ء','،"(🔐💜 ء','⇡ ،💗🎧 ٰء
',];
  $_smile = array_rand($items,1);
  $smile = $items[$_smile];
   $count = count($text);
   $A = $text;
   $A = str_replace('ض', 'ضِٰـۛৣـ', $A);
   $A = str_replace('ص', 'صِٰـۛৣـ', $A);
   $A = str_replace('ث', 'ثِٰـۛৣـ', $A);
   $A = str_replace('ق', 'قِٰـۛৣـ', $A);
   $A = str_replace('ف', 'فِٰ͒ـۛৣـ', $A);
   $A = str_replace('غ', 'غِٰـۛৣـ', $A);
   $A = str_replace('ع', 'عِٰـۛৣـ', $A);
   $A = str_replace('خ', 'خِٰ̐ـۛৣـ', $A);
   $A = str_replace('ح', 'حِٰـۛৣـ', $A);
   $A = str_replace('ج', 'جِٰـۛৣـ', $A);
   $A = str_replace('ش', 'شِٰـۛৣـ', $A);
   $A = str_replace('س', 'سِٰـۛৣـ', $A);
   $A = str_replace('ي', 'يِٰـۛৣـ', $A);
   $A = str_replace('ب', 'بِٰـۛৣـ', $A);
   $A = str_replace('ل', 'لِٰـۛৣـ', $A);
   $A = str_replace('ا', 'آ', $A);
   $A = str_replace('ت', 'تِٰـۛৣـ', $A);
   $A = str_replace('ن', 'نِٰـۛৣـ', $A);
   $A = str_replace('م', 'مِٰـۛৣـ', $A);
   $A = str_replace('ك', 'ڪِٰـۛৣـ', $A);
   $A = str_replace('ط', 'طِٰـۛৣـ', $A);
   $A = str_replace('ظ', 'ظِٰـۛৣـ', $A);
  $A = str_replace('ء', 'ء', $A);
   $A = str_replace('ؤ', 'ؤ', $A);
   $A = str_replace('ر', 'ر', $A);
   $A = str_replace('ى', 'ى', $A);
   $A = str_replace('ز', 'ز', $A);
   $A = str_replace('و', 'ﯛ̲୭', $A);
   $A = str_replace("ه", "໋۠هہؚ", $A);


   $A = str_replace('q', 'Ｑ' , $A);
  	 $A = str_replace('w', 'Ｗ' , $A);
	 $A = str_replace('e', 'Ｅ' , $A);
  	 $A = str_replace('r', 'Ｒ' , $A);
	 $A = str_replace('t', 'Ｔ' , $A);
  	 $A = str_replace('y', 'Ｙ' , $A);
	 $A = str_replace('u', 'Ｕ' , $A);
  	 $A = str_replace('i', 'Ｉ' , $A);
	 $A = str_replace('o', 'Ｏ' , $A);
  	 $A = str_replace('p', 'Ｐ' , $A);
	 $A = str_replace('a', 'Ａ' , $A);
  	 $A = str_replace('s', 'Ｓ' , $A);
	 $A = str_replace('d', 'Ｄ' , $A);
  	 $A = str_replace('f', 'Բ' , $A);
	 $A = str_replace('g', 'Ｇ' , $A);
  	 $A = str_replace('h', 'Ｈ' , $A);
	 $A = str_replace('j', 'Ｊ' , $A);
  	 $A = str_replace('k', 'Ｋ' , $A);
	 $A = str_replace('l', 'Ｌ' , $A);
  	 $A = str_replace('z', 'Ｚ' , $A);
	 $A = str_replace('x', 'Ｘ' , $A);
  	 $A = str_replace('c', 'С' , $A);
	 $A = str_replace('v', 'Ｖ' , $A);
  	 $A = str_replace('b', 'Ｂ' , $A);
  	 $A = str_replace('n', 'Ｎ' , $A);
	 $A = str_replace('m', 'Ⅿ' , $A);
   // @Lordtabadol | @Lordtabadol //
   bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>$A." ".$smile
   ]);
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
   if($text != '/start' and $text !='/panel'   and  file_get_contents("Lordtabadol/$user_id/zeakef.txt") =='LegacySource0'){
  $items = ['، 🍕💕#','❥⁽🍿₎ٰ⇣ᴗ̈
','.⏳🧡:)','،🗞❤️#!','،🗞❤️#!
','، 🌼🖇"⌗
','««🍟🌿','،🌼🖤) ء','،🥀💛) ء','،📆🌼) ء','(⏰💛ء','،"(🥀💔"ء','،"(✨✊🏽"ء','،♥️🌿) ء','،"(💛🔐 ء','!،🙂💔 ء','،💤🌿،!','،🔐🌸)','،🕸💛،','،!👀💚،','،💆🏼💛) ء
','!🥀🎼 ، ⇣','!🥀🎼 ، ⇣','،!👅🌸) ء','،! 🚜💕 ⇣','،"(🔐💜 ء','،"(🔐💜 ء','⇡ ،💗🎧 ٰء
',];
  $_smile = array_rand($items,1);
  $smile = $items[$_smile];
   $count = count($text);
   $A = $text;
   $A = str_replace('ض', 'ضـۘ❈ـۘ', $A);
   $A = str_replace('ص', 'صـۘ❈ـۘ', $A);
   $A = str_replace('ث', 'ثـۘ❈ـۘ', $A);
   $A = str_replace('ق', 'قـۘ❈ـۘ', $A);
   $A = str_replace('ف', 'ف͒ـۘ❈ـۘ', $A);
   $A = str_replace('غ', 'غـۘ❈ـۘ', $A);
   $A = str_replace('ع', 'عـۘ❈ـۘ', $A);
   $A = str_replace('خ', 'خ̐ـۘ❈ـۘ', $A);
   $A = str_replace('ح', 'حـۘ❈ـۘ', $A);
   $A = str_replace('ج', 'جـۘ❈ـۘ', $A);
   $A = str_replace('ش', 'شـۘ❈ـۘ', $A);
   $A = str_replace('س', 'سـۘ❈ـۘ', $A);
   $A = str_replace('ي', 'يـۘ❈ـۘ', $A);
   $A = str_replace('ب', 'بـۘ❈ـۘ', $A);
   $A = str_replace('ل', 'لـۘ❈ـۘ', $A);
   $A = str_replace('ا', 'آ', $A);
   $A = str_replace('ت', 'تـۘ❈ـۘ', $A);
   $A = str_replace('ن', 'نـۘ❈ـۘ', $A);
   $A = str_replace('م', 'م', $A);
   $A = str_replace('ك', 'ڪـۘ❈ـۘ', $A);
   $A = str_replace('ط', 'طـۘ❈ـۘ', $A);
   $A = str_replace('ظ', 'ظـۘ❈ـۘ', $A);
  $A = str_replace('ء', 'ء', $A);
   $A = str_replace('ؤ', 'ؤ', $A);
   $A = str_replace('ر', 'ر', $A);
   $A = str_replace('ى', 'ى', $A);
   $A = str_replace('ز', 'ز', $A);
   $A = str_replace('و', 'ﯛ̲୭', $A);
   $A = str_replace("ه", "໋۠هہؚ", $A);
   
   $A = str_replace('q', 'Ҩ' , $A);
  	 $A = str_replace('w', 'Ɯ' , $A);
	 $A = str_replace('e', 'Ɛ' , $A);
  	 $A = str_replace('r', '尺' , $A);
	 $A = str_replace('t', 'Ť' , $A);
  	 $A = str_replace('y', 'Ϥ' , $A);
	 $A = str_replace('u', 'Ц' , $A);
  	 $A = str_replace('i', 'ɪ' , $A);
	 $A = str_replace('o', 'Ø' , $A);
  	 $A = str_replace('p', 'þ' , $A);
	 $A = str_replace('a', 'Λ' , $A);
  	 $A = str_replace('s', 'ら' , $A);
	 $A = str_replace('d', 'Ð' , $A);
  	 $A = str_replace('f', 'F' , $A);
	 $A = str_replace('g', 'Ɠ' , $A);
  	 $A = str_replace('h', 'н' , $A);
	 $A = str_replace('j', 'ﾌ' , $A);
  	 $A = str_replace('k', 'Қ' , $A);
	 $A = str_replace('l', 'Ł' , $A);
  	 $A = str_replace('z', 'Ẕ' , $A);
	 $A = str_replace('x', 'χ' , $A);
  	 $A = str_replace('c', 'ㄈ' , $A);
	 $A = str_replace('v', 'Ɣ' , $A);
  	 $A = str_replace('b', 'Ϧ' , $A);
  	 $A = str_replace('n', 'Л' , $A);
	 $A = str_replace('m', '௱' , $A);
   
   bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>$A." ".$smile
   ]);
}

if($text != '/start' and $text !='/panel'   and  file_get_contents("Lordtabadol/$user_id/zeakef.txt") =='LegacySource0'){
  $items = ['، 🍕💕#','❥⁽🍿₎ٰ⇣ᴗ̈
','.⏳🧡:)','،🗞❤️#!','،🗞❤️#!
','، 🌼🖇"⌗
','««🍟🌿','،🌼🖤) ء','،🥀💛) ء','،📆🌼) ء','(⏰💛ء','،"(🥀💔"ء','،"(✨✊🏽"ء','،♥️🌿) ء','،"(💛🔐 ء','!،🙂💔 ء','،💤🌿،!','،🔐🌸)','،🕸💛،','،!👀💚،','،💆🏼💛) ء
','!🥀🎼 ، ⇣','!🥀🎼 ، ⇣','،!👅🌸) ء','،! 🚜💕 ⇣','،"(🔐💜 ء','،"(🔐💜 ء','⇡ ،💗🎧 ٰء
',];
  $_smile = array_rand($items,1);
  $smile = $items[$_smile];
   $count = count($text);
$OmegaCompany = str_replace('ا','ٱ',$text); 
$OmegaCompany = str_replace('ب','ﺑ',$OmegaCompany); 
$OmegaCompany = str_replace('ت','ﺗ̲ ',$OmegaCompany); 
$OmegaCompany = str_replace('ث','ثّـ',$OmegaCompany); 
$OmegaCompany = str_replace('ج','جّـ',$OmegaCompany); 
$OmegaCompany = str_replace('ح','ﺣّ͠ـ',$OmegaCompany); 
$OmegaCompany = str_replace('خ','ﺣ͠ ',$OmegaCompany); 
$OmegaCompany = str_replace('د','د',$OmegaCompany); 
$OmegaCompany = str_replace('ذ','ذّ',$OmegaCompany); 
$OmegaCompany = str_replace('ر','ر',$OmegaCompany); 
$OmegaCompany = str_replace('ز','زْ',$OmegaCompany); 
$OmegaCompany = str_replace('س','ﺳ̭͠ ',$OmegaCompany); 
$OmegaCompany = str_replace('ش','ﺷ͠ ',$OmegaCompany);  
$OmegaCompany = str_replace('ص','ڝـ',$OmegaCompany); 
$OmegaCompany = str_replace('ض','ڞـ',$OmegaCompany); 
$OmegaCompany = str_replace('ط','ط',$OmegaCompany); 
$OmegaCompany = str_replace('ظ','ظـ',$OmegaCompany); 
$OmegaCompany = str_replace('ع','ﻋ̝̚',$OmegaCompany); 
$OmegaCompany = str_replace('غ','ﻏ̣̐',$OmegaCompany); 
$OmegaCompany = str_replace('ف','ﻓ̲̣̐ ',$OmegaCompany); 
$OmegaCompany = str_replace('ق','ﻗ̮ـ̃',$OmegaCompany); 
$OmegaCompany = str_replace('ك','ڪْ',$OmegaCompany); 
$OmegaCompany = str_replace('ل','لْـ',$OmegaCompany);
$OmegaCompany = str_replace('م','م',$OmegaCompany); 
$OmegaCompany = str_replace('ن','ﻧـ',$OmegaCompany);  
$OmegaCompany = str_replace('ه','ھَہّ',$OmegaCompany); 
$OmegaCompany = str_replace('و','ۅ',$OmegaCompany); 
$OmegaCompany = str_replace('ي','ي',$OmegaCompany);

$OmegaCompany = str_replace('q', 'Ⴓ' , $OmegaCompany);
  	 $OmegaCompany = str_replace('w', 'Ш' , $OmegaCompany);
	 $OmegaCompany = str_replace('e', 'Σ' , $OmegaCompany);
  	 $OmegaCompany = str_replace('r', 'Γ' , $OmegaCompany);
	 $OmegaCompany = str_replace('t', 'Ƭ' , $OmegaCompany);
  	 $OmegaCompany = str_replace('y', 'Ψ' , $OmegaCompany);
	 $OmegaCompany = str_replace('u', 'Ʊ' , $OmegaCompany);
  	 $OmegaCompany = str_replace('i', 'I' , $OmegaCompany);
	 $OmegaCompany = str_replace('o', 'Θ' , $OmegaCompany);
  	 $OmegaCompany = str_replace('p', 'Ƥ' , $OmegaCompany);
	 $OmegaCompany = str_replace('a', 'Δ' , $OmegaCompany);
  	 $OmegaCompany = str_replace('s', 'Ѕ' , $OmegaCompany);
	 $OmegaCompany = str_replace('d', 'D' , $OmegaCompany);
  	 $OmegaCompany = str_replace('f', 'F' , $OmegaCompany);
	 $OmegaCompany = str_replace('g', 'G' , $OmegaCompany);
  	 $OmegaCompany = str_replace('h', 'H' , $OmegaCompany);
	 $OmegaCompany = str_replace('j', 'J' , $OmegaCompany);
  	 $OmegaCompany = str_replace('k', 'Ƙ' , $OmegaCompany);
	 $OmegaCompany = str_replace('l', 'L' , $OmegaCompany);
  	 $OmegaCompany = str_replace('z', 'Z' , $OmegaCompany);
	 $OmegaCompany = str_replace('x', 'Ж' , $OmegaCompany);
  	 $OmegaCompany = str_replace('c', 'C' , $OmegaCompany);
	 $OmegaCompany = str_replace('v', 'Ʋ' , $OmegaCompany);
  	 $OmegaCompany = str_replace('b', 'Ɓ' , $OmegaCompany);
  	 $OmegaCompany = str_replace('n', '∏' , $OmegaCompany);
	 $OmegaCompany = str_replace('m', 'Μ' , $OmegaCompany);

bot('sendMessage',[ 
'chat_id'=>$chat_id, 
'text'=>$OmegaCompany."".$smile
   ]);}
   if($text != '/start' and $text !='/panel'   and  file_get_contents("Lordtabadol/$user_id/zeakef.txt") =='LegacySource0'){
  $items = ['، 🍕💕#','❥⁽🍿₎ٰ⇣ᴗ̈
','.⏳🧡:)','،🗞❤️#!','،🗞❤️#!
','، 🌼🖇"⌗
','««🍟🌿','،🌼🖤) ء','،🥀💛) ء','،📆🌼) ء','(⏰💛ء','،"(🥀💔"ء','،"(✨✊🏽"ء','،♥️🌿) ء','،"(💛🔐 ء','!،🙂💔 ء','،💤🌿،!','،🔐🌸)','،🕸💛،','،!👀💚،','،💆🏼💛) ء
','!🥀🎼 ، ⇣','!🥀?? ، ⇣','،!👅🌸) ء','،! 🚜💕 ⇣','،"(🔐💜 ء','،"(🔐💜 ء','⇡ ،💗🎧 ٰء
',];
  $_smile = array_rand($items,1);
  $smile = $items[$_smile];
   $count = count($text);
$OmegaCompany = $text; 
$OmegaCompany = str_replace('ا','ٱ',$OmegaCompany); 
$OmegaCompany = str_replace('ب','ب',$OmegaCompany); 
$OmegaCompany = str_replace('ت','ت',$OmegaCompany);
$OmegaCompany = str_replace('ث','ث',$OmegaCompany); 
$OmegaCompany = str_replace('ج','جۚ ּ',$OmegaCompany);  
$OmegaCompany = str_replace('ح','حۡ',$OmegaCompany); 
$OmegaCompany = str_replace('خ','خۡ',$OmegaCompany); 
$OmegaCompany = str_replace('د','د',$OmegaCompany); 
$OmegaCompany = str_replace('ذ','ذ',$OmegaCompany); 
$OmegaCompany = str_replace('ر','ر',$OmegaCompany); 
$OmegaCompany = str_replace('ز','ز',$OmegaCompany); 
$OmegaCompany = str_replace('س','سۜ',$OmegaCompany); 
$OmegaCompany = str_replace('ش','ش',$OmegaCompany); 
$OmegaCompany = str_replace('ص','ص',$OmegaCompany); 
$OmegaCompany = str_replace('ض','ض',$OmegaCompany); 
$OmegaCompany = str_replace('ط','ط',$OmegaCompany); 
$OmegaCompany = str_replace('ظ','ظ',$OmegaCompany); 
$OmegaCompany = str_replace('ع','ع',$OmegaCompany); 
$OmegaCompany = str_replace('غ','غ',$OmegaCompany); 
$OmegaCompany = str_replace('ف','ف',$OmegaCompany); 
$OmegaCompany = str_replace('ق','ق',$OmegaCompany); 
$OmegaCompany = str_replace('ك','ك',$OmegaCompany); 
$OmegaCompany = str_replace('ل','ل',$OmegaCompany);
$OmegaCompany = str_replace('م','مۘ',$OmegaCompany); 
$OmegaCompany = str_replace('ن','نۨــہ',$OmegaCompany);  
$OmegaCompany = str_replace('ه','هۂَ',$OmegaCompany); 
$OmegaCompany = str_replace('ٰو','و',$OmegaCompany); 
$OmegaCompany = str_replace('ي','يۧ',$OmegaCompany);
// @L ordta badol | @Lord taba dol //
$OmegaCompany = str_replace('q', 'Q' , $OmegaCompany);
  	 $OmegaCompany = str_replace('w', 'Щ' , $OmegaCompany);
	 $OmegaCompany = str_replace('e', '乇' , $OmegaCompany);
  	 $OmegaCompany = str_replace('r', '尺' , $OmegaCompany);
	 $OmegaCompany = str_replace('t', 'ｲ' , $OmegaCompany);
  	 $OmegaCompany = str_replace('y', 'ﾘ' , $OmegaCompany);
	 $OmegaCompany = str_replace('u', 'Ц' , $OmegaCompany);
  	 $OmegaCompany = str_replace('i', 'ﾉ' , $OmegaCompany);
	 $OmegaCompany = str_replace('o', 'Ծ' , $OmegaCompany);
  	 $OmegaCompany = str_replace('p', 'ｱ' , $OmegaCompany);
	 $OmegaCompany = str_replace('a', 'ﾑ' , $OmegaCompany);
  	 $OmegaCompany = str_replace('s', '丂' , $OmegaCompany);
	 $OmegaCompany = str_replace('d', 'Ð' , $OmegaCompany);
  	 $OmegaCompany = str_replace('f', 'ｷ' , $OmegaCompany);
	 $OmegaCompany = str_replace('g', 'Ǥ' , $OmegaCompany);
  	 $OmegaCompany = str_replace('h', 'ん' , $OmegaCompany);
	 $OmegaCompany = str_replace('j', 'ﾌ' , $OmegaCompany);
  	 $OmegaCompany = str_replace('k', 'ズ' , $OmegaCompany);
	 $OmegaCompany = str_replace('l', 'ﾚ' , $OmegaCompany);
  	 $OmegaCompany = str_replace('z', '乙' , $OmegaCompany);
	 $OmegaCompany = str_replace('x', 'ﾒ' , $OmegaCompany);
  	 $OmegaCompany = str_replace('c', 'ζ' , $OmegaCompany);
	 $OmegaCompany = str_replace('v', 'Џ' , $OmegaCompany);
  	 $OmegaCompany = str_replace('b', '乃' , $OmegaCompany);
  	 $OmegaCompany = str_replace('n', '刀' , $OmegaCompany);
	 $OmegaCompany = str_replace('m', 'ᄊ' , $OmegaCompany);
/*
🌟‌ اوپن شده در چنل های
💚 @OmegaCompany
💚 @LegacySource
💚 @CodexTem

➖ نوشته شده توسط: @Lordtabadol
منبع بپاکی یعنی ریدی رو کفن زنده و مرده مادرت 😑
*/

bot('sendMessage',[ 
'chat_id'=>$chat_id, 
'text'=>$OmegaCompany."".$smile
   ]);}
   if($text != '/start' and $text !='/panel'   and  file_get_contents("Lordtabadol/$user_id/zeakef.txt") =='LegacySource0'){
  $items = ['، 🍕💕#','❥⁽🍿₎ٰ⇣ᴗ̈
','.⏳🧡:)','،🗞❤️#!','،🗞❤️#!
','، 🌼🖇"⌗
','««🍟🌿','،🌼🖤) ء','،🥀💛) ء','،📆🌼) ء','(⏰💛ء','،"(🥀💔"ء','،"(✨✊🏽"ء','،♥️🌿) ء','،"(💛🔐 ء','!،🙂💔 ء','،💤🌿،!','،🔐🌸)','،🕸💛،','،!👀💚،','،💆🏼💛) ء
','!🥀🎼 ، ⇣','!🥀🎼 ، ⇣','،!👅🌸) ء','،! 🚜💕 ⇣','،"(🔐💜 ء','،"(🔐💜 ء','⇡ ،💗🎧 ٰء
',];
  $_smile = array_rand($items,1);
  $smile = $items[$_smile];
   $count = count($text);
$OmegaCompany = $text; 
$OmegaCompany = str_replace('ا','ٱ',$OmegaCompany); 
$OmegaCompany = str_replace('ب','بّـ',$OmegaCompany); 
$OmegaCompany = str_replace('ت','ﭥ',$OmegaCompany);
$OmegaCompany = str_replace('ث','ث',$OmegaCompany); 
$OmegaCompany = str_replace('ج','چ',$OmegaCompany);  
$OmegaCompany = str_replace('ح','פ',$OmegaCompany); 
$OmegaCompany = str_replace('خ','ڂ',$OmegaCompany); 
$OmegaCompany = str_replace('د','د',$OmegaCompany); 
$OmegaCompany = str_replace('ذ','ذ',$OmegaCompany); 
$OmegaCompany = str_replace('ر','ر',$OmegaCompany); 
$OmegaCompany = str_replace('ز','ز',$OmegaCompany); 
$OmegaCompany = str_replace('س','س',$OmegaCompany); 
$OmegaCompany = str_replace('ش','ش',$OmegaCompany); 
$OmegaCompany = str_replace('ص','ص',$OmegaCompany); 
$OmegaCompany = str_replace('ض','ضَّ',$OmegaCompany); 
$OmegaCompany = str_replace('ط','ط',$OmegaCompany); 
$OmegaCompany = str_replace('ظ','ظ',$OmegaCompany); 
$OmegaCompany = str_replace('ع','عّ',$OmegaCompany); 
$OmegaCompany = str_replace('غ','غَ ',$OmegaCompany); 
$OmegaCompany = str_replace('ف','ف̲ ',$OmegaCompany); 
$OmegaCompany = str_replace('ق','ق',$OmegaCompany); 
$OmegaCompany = str_replace('ك','ڪْ',$OmegaCompany); 
$OmegaCompany = str_replace('ل','ﻟ̣̣',$OmegaCompany);
$OmegaCompany = str_replace('م','م',$OmegaCompany); 
$OmegaCompany = str_replace('ن','ن',$OmegaCompany);  
$OmegaCompany = str_replace('ه','ه',$OmegaCompany); 
$OmegaCompany = str_replace('و','و',$OmegaCompany); 
$OmegaCompany = str_replace('ي','ي',$OmegaCompany);

$OmegaCompany = str_replace('a', 'Á', $OmegaCompany);
$OmegaCompany = str_replace('b', 'ß', $OmegaCompany);
$OmegaCompany = str_replace('c', 'Č', $OmegaCompany);
$OmegaCompany = str_replace('d', 'Ď', $OmegaCompany);
$OmegaCompany = str_replace('e', 'Ĕ', $OmegaCompany);
$OmegaCompany = str_replace('f', 'Ŧ', $OmegaCompany);
$OmegaCompany = str_replace('g', 'Ğ', $OmegaCompany);
$OmegaCompany = str_replace('h', 'Ĥ', $OmegaCompany);
$OmegaCompany = str_replace('i', 'Ĩ', $OmegaCompany);
$OmegaCompany = str_replace('j', 'Ĵ', $OmegaCompany);
$OmegaCompany = str_replace('k', 'Ķ', $OmegaCompany);
$OmegaCompany = str_replace('l', 'Ĺ', $OmegaCompany);
$OmegaCompany = str_replace('m', 'M', $OmegaCompany);
$OmegaCompany = str_replace('n', 'Ń', $OmegaCompany);
$OmegaCompany = str_replace('o', 'Ő', $OmegaCompany);
$OmegaCompany = str_replace('p', 'P', $OmegaCompany);
$OmegaCompany = str_replace('q', 'Q', $OmegaCompany);
$OmegaCompany = str_replace('r', 'Ŕ', $OmegaCompany);
$OmegaCompany = str_replace('s', 'Ś', $OmegaCompany);
$OmegaCompany = str_replace('t', 'Ť', $OmegaCompany);
$OmegaCompany = str_replace('u', 'Ú', $OmegaCompany);
$OmegaCompany = str_replace('v', 'V', $OmegaCompany);
$OmegaCompany = str_replace('w', 'Ŵ', $OmegaCompany);
$OmegaCompany = str_replace('x', 'Ж', $OmegaCompany);
$OmegaCompany = str_replace('y', 'Ŷ', $OmegaCompany);
$OmegaCompany = str_replace('z', 'Ź', $OmegaCompany);

bot('sendMessage',[ 
'chat_id'=>$chat_id, 
'text'=>$OmegaCompany."".$smile
   ]);}
if($text != '/start' and $text !='/panel'   and  file_get_contents("Lordtabadol/$user_id/zeakef.txt") =='LegacySource0'){
  $items = ['، 🍕💕#','❥⁽🍿₎ٰ⇣ᴗ̈
','.⏳🧡:)','،🗞❤️#!','،🗞❤️#!
','، 🌼🖇"⌗
','««🍟🌿','،🌼🖤) ء','،🥀💛) ء','،📆🌼) ء','(⏰💛ء','،"(🥀💔"ء','،"(✨✊🏽"ء','،♥️🌿) ء','،"(💛🔐 ء','!،🙂💔 ء','،💤🌿،!','،??🌸)','،🕸💛،','،!👀💚،','،💆🏼💛) ء
','!🥀🎼 ، ⇣','!🥀🎼 ، ⇣','،!👅🌸) ء','،! 🚜💕 ⇣','،"(🔐💜 ء','،"(🔐💜 ء','⇡ ،💗🎧 ٰء
',];
  $_smile = array_rand($items,1);
  $smile = $items[$_smile];
   $count = count($text);
$OmegaCompany = $text; 
$OmegaCompany = str_replace('ا','ٱ',$OmegaCompany); 
$OmegaCompany = str_replace('ب','بِ',$OmegaCompany); 
$OmegaCompany = str_replace('ت','ت̲',$OmegaCompany);
$OmegaCompany = str_replace('ث','ثْ',$OmegaCompany); 
$OmegaCompany = str_replace('ج','چ',$OmegaCompany);  
$OmegaCompany = str_replace('ح','ح',$OmegaCompany); 
$OmegaCompany = str_replace('خ','خ',$OmegaCompany); 
$OmegaCompany = str_replace('د','دّ',$OmegaCompany); 
$OmegaCompany = str_replace('ذ','ذّ',$OmegaCompany); 
$OmegaCompany = str_replace('ر','رّ',$OmegaCompany); 
$OmegaCompany = str_replace('ز','زَ',$OmegaCompany); 
$OmegaCompany = str_replace('س','ﺳ̲ ',$OmegaCompany); 
$OmegaCompany = str_replace('ش','ﺷ̲ ',$OmegaCompany); 
$OmegaCompany = str_replace('ص','صـ',$OmegaCompany); 
$OmegaCompany = str_replace('ض','ضَ',$OmegaCompany); 
$OmegaCompany = str_replace('ط','طً',$OmegaCompany); 
$OmegaCompany = str_replace('ظ','ظـ',$OmegaCompany); 
$OmegaCompany = str_replace('ع','ﻋ',$OmegaCompany); 
$OmegaCompany = str_replace('غ','ﻏ̣̐ ',$OmegaCompany); 
$OmegaCompany = str_replace('ف','قّـ',$OmegaCompany); 
$OmegaCompany = str_replace('ق','قّـ',$OmegaCompany); 
$OmegaCompany = str_replace('ك','ڪ',$OmegaCompany); 
$OmegaCompany = str_replace('ل','ڵـ',$OmegaCompany);
$OmegaCompany = str_replace('م','ـمـ',$OmegaCompany); 
$OmegaCompany = str_replace('ن','ﻧ̲ ـ',$OmegaCompany);  
$OmegaCompany = str_replace('ه','ﮬ̲̌ﮧ',$OmegaCompany); 
$OmegaCompany = str_replace('و','و',$OmegaCompany); 
$OmegaCompany = str_replace('ي','ي',$OmegaCompany);

$OmegaCompany = str_replace('q', 'ҩ' , $OmegaCompany);
  	 $OmegaCompany = str_replace('w', 'ω' , $OmegaCompany);
	 $OmegaCompany = str_replace('e', '૯' , $OmegaCompany);
  	 $OmegaCompany = str_replace('r', 'Ր' , $OmegaCompany);
	 $OmegaCompany = str_replace('t', '੮' , $OmegaCompany);
  	 $OmegaCompany = str_replace('y', 'ע' , $OmegaCompany);
	 $OmegaCompany = str_replace('u', 'υ' , $OmegaCompany);
  	 $OmegaCompany = str_replace('i', 'ɿ' , $OmegaCompany);
	 $OmegaCompany = str_replace('o', '૦' , $OmegaCompany);
  	 $OmegaCompany = str_replace('p', 'ƿ' , $OmegaCompany);
	 $OmegaCompany = str_replace('a', 'ค' , $OmegaCompany);
  	 $OmegaCompany = str_replace('s', 'ς' , $OmegaCompany);
	 $OmegaCompany = str_replace('d', 'ძ' , $OmegaCompany);
  	 $OmegaCompany = str_replace('f', 'Բ' , $OmegaCompany);
	 $OmegaCompany = str_replace('g', '૭' , $OmegaCompany);
  	 $OmegaCompany = str_replace('h', 'Һ' , $OmegaCompany);
	 $OmegaCompany = str_replace('j', 'ʆ' , $OmegaCompany);
  	 $OmegaCompany = str_replace('k', 'қ' , $OmegaCompany);
	 $OmegaCompany = str_replace('l', 'Ն' , $OmegaCompany);
  	 $OmegaCompany = str_replace('z', 'ઽ' , $OmegaCompany);
	 $OmegaCompany = str_replace('x', '૪' , $OmegaCompany);
  	 $OmegaCompany = str_replace('c', '८' , $OmegaCompany);
	 $OmegaCompany = str_replace('v', '౮' , $OmegaCompany);
  	 $OmegaCompany = str_replace('b', 'ც' , $OmegaCompany);
  	 $OmegaCompany = str_replace('n', 'Ո' , $OmegaCompany);
	 $OmegaCompany = str_replace('m', 'ɱ' , $OmegaCompany);

bot('sendMessage',[ 
'chat_id'=>$chat_id, 
'text'=>$OmegaCompany."".$smile
   ]);}
   if($text != '/start' and $text !='/panel'   and  file_get_contents("Lordtabadol/$user_id/zeakef.txt") =='LegacySource0'){
  $items = ['، 🍕💕#','❥⁽🍿₎ٰ⇣ᴗ̈
','.⏳🧡:)','،🗞❤️#!','،🗞❤️#!
','، 🌼🖇"⌗
','««🍟🌿','،🌼🖤) ء','،🥀💛) ء','،📆🌼) ء','(⏰💛ء','،"(🥀💔"ء','،"(✨✊🏽"ء','،♥️🌿) ء','،"(💛🔐 ء','!،🙂💔 ء','،💤🌿،!','،🔐🌸)','،🕸💛،','،!👀💚،','،💆🏼💛) ء
','!🥀🎼 ، ⇣','!🥀🎼 ، ⇣','،!👅🌸) ء','،! 🚜💕 ⇣','،"(🔐💜 ء','،"(🔐💜 ء','⇡ ،💗🎧 ٰء
',];
  $_smile = array_rand($items,1);
  $smile = $items[$_smile];
   $count = count($text);
$OmegaCompany = $text; 
$OmegaCompany = str_replace('ا','ٱ',$OmegaCompany); 
$OmegaCompany = str_replace('ب','بّـ',$OmegaCompany); 
$OmegaCompany = str_replace('ت','ت̲ ',$OmegaCompany);
$OmegaCompany = str_replace('ث','ثّـ',$OmegaCompany); 
$OmegaCompany = str_replace('ج','ﺟ',$OmegaCompany);  
$OmegaCompany = str_replace('ح','ﺣّ͠ـ',$OmegaCompany); 
$OmegaCompany = str_replace('خ','ﺣ͠ ',$OmegaCompany); 
$OmegaCompany = str_replace('د','دّ',$OmegaCompany); 
$OmegaCompany = str_replace('ذ','دّ',$OmegaCompany); 
$OmegaCompany = str_replace('ر','ڔ',$OmegaCompany); 
$OmegaCompany = str_replace('ز','زْ',$OmegaCompany); 
$OmegaCompany = str_replace('س','سُ',$OmegaCompany); 
$OmegaCompany = str_replace('ش','ﺷ͠ ',$OmegaCompany); 
$OmegaCompany = str_replace('ص','ﺼ',$OmegaCompany); 
$OmegaCompany = str_replace('ض','ضَّ',$OmegaCompany); 
$OmegaCompany = str_replace('ط','طً',$OmegaCompany); 
$OmegaCompany = str_replace('ظ','ظـ',$OmegaCompany); 
$OmegaCompany = str_replace('ع','عـ',$OmegaCompany); 
$OmegaCompany = str_replace('غ','غَ',$OmegaCompany); 
$OmegaCompany = str_replace('ف','ﻓ̲',$OmegaCompany); 
$OmegaCompany = str_replace('ق','ﻗ̮ـ̃',$OmegaCompany); 
$OmegaCompany = str_replace('ك','ﮖ',$OmegaCompany); 
$OmegaCompany = str_replace('ل','ﻟ̲ ',$OmegaCompany);
$OmegaCompany = str_replace('م','ﻣ̲',$OmegaCompany); 
$OmegaCompany = str_replace('ن','ﻧ̲',$OmegaCompany);  
$OmegaCompany = str_replace('ه','ﮬ̲̌ﮧ',$OmegaCompany); 
$OmegaCompany = str_replace('و','ﯚ',$OmegaCompany); 
$OmegaCompany = str_replace('ي','يَ',$OmegaCompany);
/*
🌟‌ اوپن شده در چنل های
💚 @OmegaCompany
💚 @LegacySource
💚 @CodexTem

➖ نوشته شده توسط: @Lordtabadol
منبع بپاکی یعنی ریدی رو کفن زنده و مرده مادرت 😑
*/
// @Lordtabadol | @Lordtabadol //
$OmegaCompany = str_replace('q', 'Ꝙ' ,$OmegaCompany);
  	 $OmegaCompany = str_replace('w', 'Ѡ' ,$OmegaCompany);
	 $OmegaCompany = str_replace('e', 'Ɛ' ,$OmegaCompany);
  	 $OmegaCompany = str_replace('r', 'Ɽ' ,$OmegaCompany);
	 $OmegaCompany = str_replace('t', 'Ͳ' ,$OmegaCompany);
  	 $OmegaCompany = str_replace('y', 'Ỿ' ,$OmegaCompany);
	 $OmegaCompany = str_replace('u', 'Ʊ' ,$OmegaCompany);
  	 $OmegaCompany = str_replace('i', 'ị' ,$OmegaCompany);
	 $OmegaCompany = str_replace('o', 'Ỗ' ,$OmegaCompany);
  	 $OmegaCompany = str_replace('p', 'Ꝓ' ,$OmegaCompany);
	 $OmegaCompany = str_replace('a', 'Λ' ,$OmegaCompany);
  	 $OmegaCompany = str_replace('s', 'Ṥ' ,$OmegaCompany);
	 $OmegaCompany = str_replace('d', 'δ' ,$OmegaCompany);
  	 $OmegaCompany = str_replace('f', 'Բ' ,$OmegaCompany);
	 $OmegaCompany = str_replace('g', '₲' ,$OmegaCompany);
  	 $OmegaCompany = str_replace('h', 'Ḩ' ,$OmegaCompany);
	 $OmegaCompany = str_replace('j', 'Ĵ' ,$OmegaCompany);
  	 $OmegaCompany = str_replace('k', 'Ҡ' ,$OmegaCompany);
	 $OmegaCompany = str_replace('l', 'Ⱡ' ,$OmegaCompany);
  	 $OmegaCompany = str_replace('z', 'Ꙃ' ,$OmegaCompany);
	 $OmegaCompany = str_replace('x', 'Ӿ' ,$OmegaCompany);
  	 $OmegaCompany = str_replace('c', 'Ƈ' ,$OmegaCompany);
	 $OmegaCompany = str_replace('v', 'Ѵ' ,$OmegaCompany);
  	 $OmegaCompany = str_replace('b', 'ß' ,$OmegaCompany);
  	 $OmegaCompany = str_replace('n', 'ⴂ' ,$OmegaCompany);
	 $OmegaCompany = str_replace('m', 'ⴅ' ,$OmegaCompany);

bot('sendMessage',[ 
'chat_id'=>$chat_id, 
'text'=>$OmegaCompany."".$smile
   ]);
}
   if($text != '/start' and $text !='/panel'   and  file_get_contents("Lordtabadol/$user_id/zeakef.txt") =='LegacySource0'){
  $items = ['، 🍕💕#','❥⁽🍿₎ٰ⇣ᴗ̈
','.⏳🧡:)','،🗞❤️#!','،🗞❤️#!
','، 🌼🖇"⌗
','««🍟🌿','،🌼🖤) ء','،🥀💛) ء','،📆🌼) ء','(⏰💛ء','،"(🥀💔"ء','،"(✨✊🏽"ء','،♥️🌿) ء','،"(💛🔐 ء','!،🙂💔 ء','،💤🌿،!','،🔐🌸)','،🕸💛،','،!👀💚،','،💆🏼💛) ء
','!🥀🎼 ، ⇣','!🥀🎼 ، ⇣','،!👅🌸) ء','،! 🚜💕 ⇣','،"(🔐💜 ء','،"(🔐💜 ء','⇡ ،💗🎧 ٰء
',];
  $_smile = array_rand($items,1);
  $smile = $items[$_smile];
   $count = count($text);
$OmegaCompany = $text; 
$OmegaCompany = str_replace('ا','ٱ',$OmegaCompany); 
$OmegaCompany = str_replace('ب','ﭜ',$OmegaCompany); 
$OmegaCompany = str_replace('ج','چ',$OmegaCompany); 
$OmegaCompany = str_replace('ث','ﭦ',$OmegaCompany); 
$OmegaCompany = str_replace('ت','ﭠ',$OmegaCompany); 
$OmegaCompany = str_replace('ح','ڂ',$OmegaCompany); 
$OmegaCompany = str_replace('خ','خ',$OmegaCompany); 
$OmegaCompany = str_replace('د','ﮃ',$OmegaCompany); 
$OmegaCompany = str_replace('ذ','ڎ',$OmegaCompany); 
$OmegaCompany = str_replace('ر','ر',$OmegaCompany); 
$OmegaCompany = str_replace('ز','ژ',$OmegaCompany); 
$OmegaCompany = str_replace('س','ﺳ̭͠ ',$OmegaCompany); 
$OmegaCompany = str_replace('ش','شَ',$OmegaCompany); 
$OmegaCompany = str_replace('ص','ڝ',$OmegaCompany); 
$OmegaCompany = str_replace('ض','ڞ',$OmegaCompany); 
$OmegaCompany = str_replace('ط','ط',$OmegaCompany); 
$OmegaCompany = str_replace('ظ','ڟ',$OmegaCompany); 
$OmegaCompany = str_replace('ع','؏',$OmegaCompany); 
$OmegaCompany = str_replace('غ','ﻏ̐ ',$OmegaCompany); 
$OmegaCompany = str_replace('ف','ڤ',$OmegaCompany); 
$OmegaCompany = str_replace('ق','ڦ',$OmegaCompany); 
$OmegaCompany = str_replace('ك','ڳ',$OmegaCompany); 
$OmegaCompany = str_replace('ل','لَ',$OmegaCompany);
$OmegaCompany = str_replace('م','م',$OmegaCompany); 
$OmegaCompany = str_replace('ن','ڻ',$OmegaCompany);  
$OmegaCompany = str_replace('ه','هـﮧ',$OmegaCompany); 
$OmegaCompany = str_replace('و','و',$OmegaCompany); 
$OmegaCompany = str_replace('ي','يِّ',$OmegaCompany); 

$OmegaCompany = str_replace('q', 'Ǫ' , $OmegaCompany);
  	 $OmegaCompany = str_replace('w', 'Ш' , $OmegaCompany);
	 $OmegaCompany = str_replace('e', 'Ξ' , $OmegaCompany);
  	 $OmegaCompany = str_replace('r', 'Я' , $OmegaCompany);
	 $OmegaCompany = str_replace('t', '₮' , $OmegaCompany);
  	 $OmegaCompany = str_replace('y', 'Џ' , $OmegaCompany);
	 $OmegaCompany = str_replace('u', 'Ǚ' , $OmegaCompany);
  	 $OmegaCompany = str_replace('i', 'ł' , $OmegaCompany);
	 $OmegaCompany = str_replace('o', 'Ф' , $OmegaCompany);
  	 $OmegaCompany = str_replace('p', 'ק' , $OmegaCompany);
	 $OmegaCompany = str_replace('a', 'Λ' , $OmegaCompany);
  	 $OmegaCompany = str_replace('s', 'Ŝ' , $OmegaCompany);
	 $OmegaCompany = str_replace('d', 'Ð' , $OmegaCompany);
  	 $OmegaCompany = str_replace('f', 'Ŧ' , $OmegaCompany);
	 $OmegaCompany = str_replace('g', '₲' , $OmegaCompany);
  	 $OmegaCompany = str_replace('h', 'Ḧ' , $OmegaCompany);
	 $OmegaCompany = str_replace('j', 'J' , $OmegaCompany);
  	 $OmegaCompany = str_replace('k', 'К' , $OmegaCompany);
	 $OmegaCompany = str_replace('l', 'Ł' , $OmegaCompany);
  	 $OmegaCompany = str_replace('z', 'Ꙃ' , $OmegaCompany);
	 $OmegaCompany = str_replace('x', 'Ж' , $OmegaCompany);
  	 $OmegaCompany = str_replace('c', 'Ͼ' , $OmegaCompany);
	 $OmegaCompany = str_replace('v', 'Ṽ' , $OmegaCompany);
  	 $OmegaCompany = str_replace('b', 'Б' , $OmegaCompany);
  	 $OmegaCompany = str_replace('n', 'Л' , $OmegaCompany);
	 $OmegaCompany = str_replace('m', 'Ɱ' , $OmegaCompany);
// @Lor dtab adol | @Lor dta badol //
bot('sendMessage',[ 
'chat_id'=>$chat_id, 
'text'=>$OmegaCompany."".$smile
   ]);
   }
   if($text != '/start' and $text !='/panel'   and  file_get_contents("Lordtabadol/$user_id/zeakef.txt") =='LegacySource0'){
  $items = ['، 🍕💕#','❥⁽🍿₎ٰ⇣ᴗ̈
','.⏳🧡:)','،🗞❤️#!','،🗞❤️#!
','، 🌼🖇"⌗
','««🍟🌿','،🌼🖤) ء','،🥀💛) ء','،📆🌼) ء','(⏰💛ء','،"(🥀💔"ء','،"(✨✊🏽"ء','،♥️🌿) ء','،"(💛🔐 ء','!،🙂💔 ء','،💤🌿،!','،🔐🌸)','،🕸💛،','،!👀💚،','،💆🏼💛) ء
','!🥀🎼 ، ⇣','!🥀🎼 ، ⇣','،!👅🌸) ء','،! 🚜💕 ⇣','،"(🔐💜 ء','،"(🔐💜 ء','⇡ ،💗🎧 ٰء
',];
  $_smile = array_rand($items,1);
  $smile = $items[$_smile];
   $count = count($text);
$OmegaCompany = str_replace('ا','آ̀',$text); 
$OmegaCompany = str_replace('ب','ب',$OmegaCompany); 
$OmegaCompany = str_replace('ت','ت',$OmegaCompany);
$OmegaCompany = str_replace('ث','ث',$OmegaCompany); 
$OmegaCompany = str_replace('ج','ج',$OmegaCompany);  
$OmegaCompany = str_replace('ح','ح̀',$OmegaCompany); 
$OmegaCompany = str_replace('خ','خ',$OmegaCompany); 
$OmegaCompany = str_replace('د','د̀',$OmegaCompany); 
$OmegaCompany = str_replace('ذ','ذ̀',$OmegaCompany); 
$OmegaCompany = str_replace('ر','ر̀',$OmegaCompany); 
$OmegaCompany = str_replace('ز','ز',$OmegaCompany); 
$OmegaCompany = str_replace('س','س̀́',$OmegaCompany); 
$OmegaCompany = str_replace('ش','ش̀́',$OmegaCompany); 
$OmegaCompany = str_replace('ص','ص̀́',$OmegaCompany); 
$OmegaCompany = str_replace('ض','ض',$OmegaCompany); 
$OmegaCompany = str_replace('ط','ط̀́',$OmegaCompany); 
$OmegaCompany = str_replace('ظ','ظ̀́',$OmegaCompany); 
$OmegaCompany = str_replace('ع','ع̀́',$OmegaCompany); 
$OmegaCompany = str_replace('غ','غ',$OmegaCompany); 
$OmegaCompany = str_replace('ف','ف̀',$OmegaCompany); 
$OmegaCompany = str_replace('ق','ق̀',$OmegaCompany); 
$OmegaCompany = str_replace('ك','ك',$OmegaCompany); 
$OmegaCompany = str_replace('ل','ل',$OmegaCompany);
$OmegaCompany = str_replace('م','م̀',$OmegaCompany); 
$OmegaCompany = str_replace('ن','ن̀',$OmegaCompany);  
$OmegaCompany = str_replace('ه','ه̀',$OmegaCompany); 
$OmegaCompany = str_replace('و','و',$OmegaCompany); 
$OmegaCompany = str_replace('ي','ي',$OmegaCompany);

$OmegaCompany = str_replace('a', 'ⓐ', $OmegaCompany);
$OmegaCompany = str_replace('b', 'ⓑ', $OmegaCompany);
$OmegaCompany = str_replace('c', '©', $OmegaCompany);
$OmegaCompany = str_replace('d', 'ⓓ', $OmegaCompany);
$OmegaCompany = str_replace('e', 'ⓔ', $OmegaCompany);
$OmegaCompany = str_replace('f', 'ⓕ', $OmegaCompany);
$OmegaCompany = str_replace('g', 'ⓖ', $OmegaCompany);
$OmegaCompany = str_replace('h', 'ⓗ', $OmegaCompany);
$OmegaCompany = str_replace('i', 'ⓘ', $OmegaCompany);
$OmegaCompany = str_replace('j', 'ⓙ', $OmegaCompany);
$OmegaCompany = str_replace('k', 'ⓚ', $OmegaCompany);
$OmegaCompany = str_replace('l', 'ⓛ', $OmegaCompany);
$OmegaCompany = str_replace('m', 'ⓜ', $OmegaCompany);
$OmegaCompany = str_replace('n', 'ⓝ', $OmegaCompany);
$OmegaCompany = str_replace('o', 'ⓞ', $OmegaCompany);
$OmegaCompany = str_replace('p', 'ⓟ', $OmegaCompany);
$OmegaCompany = str_replace('q', 'ⓠ', $OmegaCompany);
$OmegaCompany = str_replace('r', 'ⓡ', $OmegaCompany);
$OmegaCompany = str_replace('s', 'ⓢ', $OmegaCompany);
$OmegaCompany = str_replace('t', 'ⓣ', $OmegaCompany);
$OmegaCompany = str_replace('u', 'ⓤ', $OmegaCompany);
$OmegaCompany = str_replace('v', 'ⓥ', $OmegaCompany);
$OmegaCompany = str_replace('w', 'ⓦ', $OmegaCompany);
$OmegaCompany = str_replace('x', 'ⓧ', $OmegaCompany);
$OmegaCompany = str_replace('y', 'ⓨ', $OmegaCompany);
$OmegaCompany = str_replace('z', 'ⓩ', $OmegaCompany);

bot('sendMessage',[ 
'chat_id'=>$chat_id, 
'text'=>$OmegaCompany."".$smile
   ]);
}

if($text != '/start' and $text !='/panel'   and  file_get_contents("Lordtabadol/$user_id/zeakef.txt") =='LegacySource0'){
  $items = ['، 🍕💕#','❥⁽🍿₎ٰ⇣ᴗ̈
','.⏳🧡:)','،🗞❤️#!','،🗞❤️#!
','، 🌼🖇"⌗
','««🍟🌿','،🌼🖤) ء','،🥀💛) ء','،📆🌼) ء','(⏰💛ء','،"(🥀💔"ء','،"(✨✊🏽"ء','،♥️🌿) ء','،"(💛🔐 ء','!،🙂💔 ء','،💤🌿،!','،🔐🌸)','،🕸💛،','،!👀💚،','،💆🏼💛) ء
','!🥀🎼 ، ⇣','!🥀🎼 ، ⇣','،!👅🌸) ء','،! 🚜💕 ⇣','،"(🔐💜 ء','،"(🔐💜 ء','⇡ ،💗🎧 ٰء
',];
  $_smile = array_rand($items,1);
  $smile = $items[$_smile];
   $count = count($text);
   $OmegaCompany = $text;
$OmegaCompany = str_replace('a','⎛α⎞',$OmegaCompany); 
$OmegaCompany = str_replace('b','⎛в⎞',$OmegaCompany); 
$OmegaCompany = str_replace('c','⎛c⎞',$OmegaCompany); 
$OmegaCompany = str_replace('d','⎛ɒ⎞',$OmegaCompany); 
$OmegaCompany = str_replace('e','⎛є⎞',$OmegaCompany); 
$OmegaCompany = str_replace('f','⎛f⎞',$OmegaCompany); 
$OmegaCompany = str_replace('g','⎛ɢ⎞',$OmegaCompany); 
$OmegaCompany = str_replace('h','⎛н⎞',$OmegaCompany); 
$OmegaCompany = str_replace('i','⎛ɪ⎞',$OmegaCompany); 
$OmegaCompany = str_replace('j','⎛ᴊ⎞',$OmegaCompany); 
$OmegaCompany = str_replace('s','⎛ĸ⎞',$OmegaCompany); 
$OmegaCompany = str_replace('l','⎛ℓ⎞',$OmegaCompany); 
$OmegaCompany = str_replace('m','⎛м⎞',$OmegaCompany); 
$OmegaCompany = str_replace('n','⎛и⎞',$OmegaCompany); 
$OmegaCompany = str_replace('o','⎛σ⎞',$OmegaCompany); 
$OmegaCompany = str_replace('p','⎛ρ⎞',$OmegaCompany); 
$OmegaCompany = str_replace('q','⎛q⎞',$OmegaCompany); 
$OmegaCompany = str_replace('r','⎛я⎞',$OmegaCompany); 
$OmegaCompany = str_replace('f','⎛s⎞',$OmegaCompany); 
$OmegaCompany = str_replace('t','⎛τ⎞ ',$OmegaCompany); 
$OmegaCompany = str_replace('u','⎛υ⎞ ',$OmegaCompany); 
$OmegaCompany = str_replace('v','⎛v⎞',$OmegaCompany); 
$OmegaCompany = str_replace('w','⎛ω⎞',$OmegaCompany); 
$OmegaCompany = str_replace('x','⎛x⎞',$OmegaCompany); 
$OmegaCompany = str_replace('y','⎛y⎞',$OmegaCompany); 
$OmegaCompany = str_replace('z','⎛z⎞',$OmegaCompany); 
 /*
🌟‌ اوپن شده در چنل های
💚 @OmegaCompany
💚 @LegacySource
💚 @CodexTem

➖ نوشته شده توسط: @Lordtabadol
منبع بپاکی یعنی ریدی رو کفن زنده و مرده مادرت 😑
*/

$OmegaCompany = str_replace('ض','ضِٰـﮧِۢ',$OmegaCompany); 
$OmegaCompany = str_replace('ص','صِٰـﮧِۢ',$OmegaCompany); 
$OmegaCompany = str_replace('ث','ثِٰـﮧِۢ',$OmegaCompany); 
$OmegaCompany = str_replace('ق','قِٰـﮧِۢ',$OmegaCompany); 
$OmegaCompany = str_replace('ف','فِٰ͒ـِﮧۢ',$OmegaCompany); 
$OmegaCompany = str_replace('غ','غِٰـﮧِۢ',$OmegaCompany); 
$OmegaCompany = str_replace('ع','عِٰـﮧِۢ',$OmegaCompany); 
$OmegaCompany = str_replace('ه','ۿۿہ',$OmegaCompany); 
$OmegaCompany = str_replace('خ','خِٰ̐ـﮧِۢ',$OmegaCompany); 
$OmegaCompany = str_replace('ح','حِٰـﮧِۢ',$OmegaCompany); 
$OmegaCompany = str_replace('ج','جِٰـﮧِۢ',$OmegaCompany); 
$OmegaCompany = str_replace('ش','شِٰـﮧِۢ',$OmegaCompany); 
$OmegaCompany = str_replace('س','سِٰـﮧِۢ',$OmegaCompany); 
$OmegaCompany = str_replace('ي','يِٰـﮧِۢ',$OmegaCompany); 
$OmegaCompany = str_replace('ب','بِٰـِﮧۢ',$OmegaCompany);
$OmegaCompany = str_replace('ل','لِٰـِﮧۢ',$OmegaCompany); 
$OmegaCompany = str_replace('ا','آ',$OmegaCompany); 
$OmegaCompany = str_replace('ت','تِٰـﮧِۢ',$OmegaCompany); 
$OmegaCompany = str_replace('ن','نِٰـﮧِۢ',$OmegaCompany); 
$OmegaCompany = str_replace('م','مِٰـﮧِۢ',$OmegaCompany); 
$OmegaCompany = str_replace('ك','ڪِٰـﮧِۢ',$OmegaCompany); 
$OmegaCompany = str_replace('ة','ةً',$OmegaCompany); 
$OmegaCompany = str_replace('ء','ء',$OmegaCompany); 
$OmegaCompany = str_replace('ظ','ظِٰـﮧِۢ',$OmegaCompany); 
$OmegaCompany = str_replace('ط','طِٰـﮧِۢ',$OmegaCompany); 
 $OmegaCompany = str_replace('ذ','ذٰ',$OmegaCompany); 
$OmegaCompany = str_replace('د','د',$OmegaCompany); 
$OmegaCompany = str_replace('ز','ژ',$OmegaCompany); 
$OmegaCompany = str_replace('ر','رٰ',$OmegaCompany); 
$OmegaCompany = str_replace('و','ﯛ̲୭',$OmegaCompany); 
 $OmegaCompany = str_replace('ى','ىٍ',$OmegaCompany);
bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>$OmegaCompany."".$smile
   ]);
}

if($text != '/start' and $text !='/panel'   and  file_get_contents("Lordtabadol/$user_id/zeakef.txt") =='LegacySource0'){
  $ss = [' •🌱💚﴿ֆ ❥', '🍿﴿ֆ ❥', '• 🌸💸 ❥˓  ', '🖤🌞﴿ֆ', ' • 🐼🌿﴾ֆ', ' •🙊💙﴿ֆ ❥', '-💁🏼‍♂️✨﴿ֆ ❥ ', '•|• 〄💖‘',
                        ' ⚡️🌞 •|•℡', '- ⁽🙆‍♂️✨₎ֆ', '❥┇💁🏼‍♂️🔥“', '💜💭℡ֆ', '-┆💙🙋🏼‍♂️♕', '- ⁽🙆🏻🍿₎ֆ',
                        '“̯ 🐼💗 |℡', '⁞ 🐝🍷', '┋⁽❥̚͢₎ 🐣💗', '•|• ✨🌸‘', '  ֆ 💭💔ۦ', 'ֆ 💛💭ۦ', 'ֆ ⚡️🔱ۦ',
                        '℡ᴖ̈💜✨⋮', '⋮⁽🌔☄️₎ۦ˛', '⁞❉💥┋♩', ' ⁞✦⁽☻🔥₎“ٰۦ', '℡ ̇₎ ✨🐯⇣✦', '⁞♩⁽🌞🌩₎⇣✿',
                        'ۦٰ‏┋❥ ͢˓🦁💛ۦ‏', '⚡️♛ֆ₎', '♛⇣🐰☄️₎✦', '⁾⇣✿💖┊❥', ' ₎✿💥😈 ⁞“❥', '😴🌸✿⇣', '❥┊⁽ ℡🦁🌸'];
  $zz = array_rand($ss,1);
  $meme = $ss[$zz];
   $count = count($text); // @Lordtabadol | @Lordtabadol //
$LegacySource = str_replace('a','ᗩ',$text);
$LegacySource = str_replace("b","ᗷ",$LegacySource);
$LegacySource = str_replace("c","ᑕ",$LegacySource);
$LegacySource = str_replace("d","ᗪ",$LegacySource);
$LegacySource = str_replace("e","E",$LegacySource);
$LegacySource = str_replace("E","E",$LegacySource);
$LegacySource = str_replace("g","G",$LegacySource);
$LegacySource = str_replace("h","ᕼ",$LegacySource);
$LegacySource = str_replace("i","I",$LegacySource);
$LegacySource = str_replace("j","ᒍ",$LegacySource);
$LegacySource = str_replace("k","K",$LegacySource);
$LegacySource = str_replace("l","ᒪ",$LegacySource);
$LegacySource = str_replace("m","ᗰ",$LegacySource);
$LegacySource = str_replace("n","ᑎ",$LegacySource);
$LegacySource = str_replace("o","O",$LegacySource);
$LegacySource = str_replace("p","ᑭ",$LegacySource);
$LegacySource = str_replace("q","ᑫ",$LegacySource);
$LegacySource = str_replace("r","ᖇ",$LegacySource);
$LegacySource = str_replace("s","ᔕ",$LegacySource);
$LegacySource = str_replace("t","T",$LegacySource);
$LegacySource = str_replace("u","ᑌ",$LegacySource);
$LegacySource = str_replace("v","ᐯ",$LegacySource);
$LegacySource = str_replace("w","ᗯ",$LegacySource);
$LegacySource = str_replace("x","᙭",$LegacySource);
$LegacySource = str_replace("y","Y",$LegacySource);
$LegacySource = str_replace("z","ᘔ",$LegacySource);

$LegacySource = str_replace('ض','᎗ᘞ̇',$LegacySource); 
$LegacySource = str_replace('ص','᎗ᘗ',$LegacySource); 
$LegacySource = str_replace('ث','᎗̇̈ɹ',$LegacySource); 
$LegacySource = str_replace('ق','ᓆ',$LegacySource); 
$LegacySource = str_replace('ف','ᓅ',$LegacySource); 
$LegacySource = str_replace('غ','᎗ჺ',$LegacySource); 
$LegacySource = str_replace('ع','᎗ϛ',$LegacySource); 
$LegacySource = str_replace('ه','᎗බ',$LegacySource); 
$LegacySource = str_replace('خ','ᓘ',$LegacySource); 
$LegacySource = str_replace('ح','ᓗ',$LegacySource); 
$LegacySource = str_replace('ج','ᓗฺ',$LegacySource); 
$LegacySource = str_replace('ش','᎗ɹ̇̈ɹɹ',$LegacySource); 
$LegacySource = str_replace('س','᎗ɹɹɹ',$LegacySource); 
$LegacySource = str_replace('ي','᎗̤ɹ',$LegacySource); 
$LegacySource = str_replace('ب','᎗̣ɹ',$LegacySource);
$LegacySource = str_replace('ل','⅃',$LegacySource); 
$LegacySource = str_replace('ا','Ȋ',$LegacySource); 
$LegacySource = str_replace('ت','᎗̈ɹ',$LegacySource); 
$LegacySource = str_replace('ن','᎗̇ɹ',$LegacySource); 
$LegacySource = str_replace('ܭ','ك',$LegacySource); 
$LegacySource = str_replace('م','ᓄ',$LegacySource); 
$LegacySource = str_replace('ة','᎗Ꭷ',$LegacySource); 
$LegacySource = str_replace('ء','ء',$LegacySource); 
$LegacySource = str_replace('ظ','᎗̇Ь',$LegacySource); 
$LegacySource = str_replace('ط','᎗Ь',$LegacySource); 
 $LegacySource = str_replace('ذ','̇ↄ',$LegacySource); 
$LegacySource = str_replace('د','ↄ',$LegacySource); 
$LegacySource = str_replace('ز','j',$LegacySource); 
$LegacySource = str_replace('ر','ȷ',$LegacySource); 
$LegacySource = str_replace('و','g',$LegacySource); 
 $LegacySource = str_replace('ى','ʟɾʅ',$LegacySource);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>$LegacySource."".$meme
]);}

if($text != '/start' and $text !='/panel'   and  file_get_contents("Lordtabadol/$user_id/zeakef.txt") =='LegacySource0'){
  $ss = [' •🌱💚﴿ֆ ❥', '🍿﴿ֆ ❥', '• 🌸💸 ❥˓  ', '🖤🌞﴿ֆ', ' • 🐼🌿﴾ֆ', ' •🙊💙﴿ֆ ❥', '-💁🏼‍♂️✨﴿ֆ ❥ ', '•|• 〄💖‘',
                        ' ⚡️🌞 •|•℡', '- ⁽🙆‍♂️✨₎ֆ', '❥┇💁🏼‍♂️🔥“', '💜💭℡ֆ', '-┆💙🙋🏼‍♂️♕', '- ⁽🙆🏻🍿₎ֆ',
                        '“̯ 🐼💗 |℡', '⁞ 🐝🍷', '┋⁽❥̚͢₎ 🐣💗', '•|• ✨🌸‘', '  ֆ 💭💔ۦ', 'ֆ 💛💭ۦ', 'ֆ ⚡️🔱ۦ',
                        '℡ᴖ̈💜✨⋮', '⋮⁽🌔☄️₎ۦ˛', '⁞❉💥┋♩', ' ⁞✦⁽☻🔥₎“ٰۦ', '℡ ̇₎ ✨🐯⇣✦', '⁞♩⁽🌞🌩₎⇣✿',
                        'ۦٰ‏┋❥ ͢˓🦁💛ۦ‏', '⚡️♛ֆ₎', '♛⇣🐰☄️₎✦', '⁾⇣✿💖┊❥', ' ₎✿💥😈 ⁞“❥', '😴🌸✿⇣', '❥┊⁽ ℡🦁🌸'];
  $zz = array_rand($ss,1);
  $meme = $ss[$zz];
   $count = count($text); // @Lordtabadol | @Lordtabadol //
$LegacySource = str_replace('a','Ꭿ',$text);
$LegacySource = str_replace("b","Ᏸ",$LegacySource);
$LegacySource = str_replace("c","Ꮸ",$LegacySource);
$LegacySource = str_replace("d","Ꮷ",$LegacySource);
$LegacySource = str_replace("e","Ꮛ",$LegacySource);
$LegacySource = str_replace("f","Ꭶ",$LegacySource);
$LegacySource = str_replace("g","Ᏻ",$LegacySource);
$LegacySource = str_replace("h","Ᏺ",$LegacySource);
$LegacySource = str_replace("i","Ꭸ",$LegacySource);
$LegacySource = str_replace("j","Ꮰ",$LegacySource);
$LegacySource = str_replace("k","Ꮵ",$LegacySource);
$LegacySource = str_replace("l","Ꮭ",$LegacySource);
$LegacySource = str_replace("m","ᗰ",$LegacySource);
$LegacySource = str_replace("n","Ꮑ",$LegacySource);
$LegacySource = str_replace("o","Ꭷ",$LegacySource);
$LegacySource = str_replace("p","Ꭾ",$LegacySource);
$LegacySource = str_replace("q","Ꮕ",$LegacySource);
$LegacySource = str_replace("r","ᖇ",$LegacySource);
$LegacySource = str_replace("s","Ꮥ",$LegacySource);
$LegacySource = str_replace("t","Ꮱ",$LegacySource);
$LegacySource = str_replace("u","Ꮼ",$LegacySource);
$LegacySource = str_replace("v","Ꮙ",$LegacySource);
$LegacySource = str_replace("w","Ꮗ",$LegacySource);
$LegacySource = str_replace("x","Ꮂ",$LegacySource);
$LegacySource = str_replace("y","Ꮍ",$LegacySource);
$LegacySource = str_replace("z","ᔓ",$LegacySource);
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی              
$LegacySource = str_replace('ض','ضٰہٰٖ',$LegacySource);
$LegacySource = str_replace('ص','صٰہٰٖ',$LegacySource);
$LegacySource = str_replace('ث','ثٰہٰٖ',$LegacySource);
$LegacySource = str_replace('ق','قٰہٰٖ',$LegacySource);
$LegacySource = str_replace('ف','فٰہٰٖ',$LegacySource);
$LegacySource = str_replace('غ','غٰہٰٖ',$LegacySource);
$LegacySource = str_replace('ع','عٰہٰٖ',$LegacySource);
$LegacySource = str_replace('ه','هٰہٰٖ',$LegacySource);
$LegacySource = str_replace('خ','خٰہٰٖ',$LegacySource);
$LegacySource = str_replace('ح','حٰہٰٖ',$LegacySource);
$LegacySource = str_replace('ج','جٰہٰٖ',$LegacySource);
$LegacySource = str_replace('ش','شٰہٰٖ',$LegacySource);
$LegacySource = str_replace('س','سٰہٰٖ',$LegacySource);
$LegacySource = str_replace('ي','يٰہٰٖ',$LegacySource);
$LegacySource = str_replace('ب','بٰہٰٖ',$LegacySource);
$LegacySource = str_replace('ل','لہٰٖ',$LegacySource);
$LegacySource = str_replace('ا','اٰ',$LegacySource);
$LegacySource = str_replace('ت','تٰہٰٖ',$LegacySource);
$LegacySource = str_replace('ن','نٰہٰٖ',$LegacySource);
$LegacySource = str_replace('م','مٰہٰٖ',$LegacySource);
$LegacySource = str_replace('ك','كٰہٰٖ',$LegacySource);
$LegacySource = str_replace('ة','ةً',$LegacySource);
$LegacySource = str_replace('ء','ء',$LegacySource);
$LegacySource = str_replace('ظ','ظٰہٰٖ',$LegacySource);
$LegacySource = str_replace('ط','طٰہٰٖ',$LegacySource);
$LegacySource = str_replace('ذ','ذٖ',$LegacySource);
$LegacySource = str_replace('د','دٰ',$LegacySource);
$LegacySource = str_replace('ز','زٖ',$LegacySource);
$LegacySource = str_replace('ر','رٰ',$LegacySource);
$LegacySource = str_replace('و','وٰ',$LegacySource);
$LegacySource = str_replace('ى','ى',$LegacySource);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>$LegacySource."".$meme
]);}
// L ordt ab adol | L ordt ab adol //
if($text != '/start' and $text !='/panel'   and  file_get_contents("Lordtabadol/$user_id/zeakef.txt") =='LegacySource0'){
  $ss = [' •🌱💚﴿ֆ ❥', '🍿﴿ֆ ❥', '• 🌸💸 ❥˓  ', '🖤🌞﴿ֆ', ' • 🐼🌿﴾ֆ', ' •🙊💙﴿ֆ ❥', '-💁🏼‍♂️✨﴿ֆ ❥ ', '•|• 〄💖‘',
                        ' ⚡️🌞 •|•℡', '- ⁽🙆‍♂️✨₎ֆ', '❥┇💁🏼‍♂️🔥“', '💜💭℡ֆ', '-┆💙🙋🏼‍♂️♕', '- ⁽🙆🏻🍿₎ֆ',
                        '“̯ 🐼💗 |℡', '⁞ 🐝🍷', '┋⁽❥̚͢₎ 🐣💗', '•|• ✨🌸‘', '  ֆ 💭💔ۦ', 'ֆ 💛💭ۦ', 'ֆ ⚡️🔱ۦ',
                        '℡ᴖ̈💜✨⋮', '⋮⁽🌔☄️₎ۦ˛', '⁞❉💥┋♩', ' ⁞✦⁽☻🔥₎“ٰۦ', '℡ ̇₎ ✨🐯⇣✦', '⁞♩⁽🌞🌩₎⇣✿',
                        'ۦٰ‏┋❥ ͢˓🦁💛ۦ‏', '⚡️♛ֆ₎', '♛⇣🐰☄️₎✦', '⁾⇣✿💖┊❥', ' ₎✿💥😈 ⁞“❥', '😴🌸✿⇣', '❥┊⁽ ℡🦁🌸'];
  $zz = array_rand($ss,1);
  $meme = $ss[$zz];
   $count = count($text); 
$LegacySource = str_replace('a',"ᵃ",$text);
$LegacySource = str_replace("b","ᵇ",$LegacySource);
$LegacySource = str_replace("c","ᶜ",$LegacySource);
$LegacySource = str_replace("d","ᵈ",$LegacySource);
$LegacySource = str_replace("e","ᵉ",$LegacySource);
$LegacySource = str_replace("f","ᶠ",$LegacySource);
$LegacySource = str_replace("g","ᵍ",$LegacySource);
$LegacySource = str_replace("h","ʰ",$LegacySource);
$LegacySource = str_replace("i","ᶤ",$LegacySource);
$LegacySource = str_replace("j","ʲ",$LegacySource);
$LegacySource = str_replace("k","ᵏ",$LegacySource);
$LegacySource = str_replace("l","ˡ",$LegacySource);
$LegacySource = str_replace("m","ᵐ",$LegacySource);
$LegacySource = str_replace("n","ᶰ",$LegacySource);
$LegacySource = str_replace("o","ᵒ",$LegacySource);
$LegacySource = str_replace("p","ᵖ",$LegacySource);
$LegacySource = str_replace("q","ᵠ",$LegacySource);
$LegacySource = str_replace("r","ʳ",$LegacySource);
$LegacySource = str_replace("s","ˢ",$LegacySource);
$LegacySource = str_replace("t","ᵗ",$LegacySource);
$LegacySource = str_replace("u","ᵘ",$LegacySource);
$LegacySource = str_replace("v","ᵛ",$LegacySource);
$LegacySource = str_replace("w","ʷ",$LegacySource);
$LegacySource = str_replace("x","ˣ",$LegacySource);
$LegacySource = str_replace("y","ʸ",$LegacySource);
$LegacySource = str_replace("z","ᶻ",$LegacySource);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>$LegacySource."".$meme
]);}
/*
🌟‌ اوپن شده در چنل های
💚 @OmegaCompany
💚 @LegacySource
💚 @CodexTem

➖ نوشته شده توسط: @Lordtabadol
منبع بپاکی یعنی ریدی رو کفن زنده و مرده مادرت 😑
*/

if($text != '/start' and $text !='/panel'   and  file_get_contents("Lordtabadol/$user_id/zeakef.txt") =='LegacySource0'){
  $ss = [' •🌱💚﴿ֆ ❥', '🍿﴿ֆ ❥', '• 🌸💸 ❥˓  ', '🖤🌞﴿ֆ', ' • 🐼🌿﴾ֆ', ' •🙊💙﴿ֆ ❥', '-💁🏼‍♂️✨﴿ֆ ❥ ', '•|• 〄💖‘',
                        ' ⚡️🌞 •|•℡', '- ⁽🙆‍♂️✨₎ֆ', '❥┇💁🏼‍♂️🔥“', '💜💭℡ֆ', '-┆💙🙋🏼‍♂️♕', '- ⁽🙆🏻🍿₎ֆ',
                        '“̯ 🐼💗 |℡', '⁞ 🐝🍷', '┋⁽❥̚͢₎ 🐣💗', '•|• ✨🌸‘', '  ֆ 💭💔ۦ', 'ֆ 💛💭ۦ', 'ֆ ⚡️🔱ۦ',
                        '℡ᴖ̈💜✨⋮', '⋮⁽🌔☄️₎ۦ˛', '⁞❉💥┋♩', ' ⁞✦⁽☻🔥₎“ٰۦ', '℡ ̇₎ ✨🐯⇣✦', '⁞♩⁽🌞🌩₎⇣✿',
                        'ۦٰ‏┋❥ ͢˓🦁💛ۦ‏', '⚡️♛ֆ₎', '♛⇣🐰☄️₎✦', '⁾⇣✿💖┊❥', ' ₎✿💥😈 ⁞“❥', '😴🌸✿⇣', '❥┊⁽ ℡🦁🌸'];
  $zz = array_rand($ss,1);
  $meme = $ss[$zz];
   $count = count($text); 
$LegacySource = str_replace('a','Ａ',$text);
$LegacySource = str_replace("b","Ｂ",$LegacySource);
$LegacySource = str_replace("c","Ｃ",$LegacySource);
$LegacySource = str_replace("d","Ｄ",$LegacySource);
$LegacySource = str_replace("e","Ｅ",$LegacySource);
$LegacySource = str_replace("E","Ｆ",$LegacySource);
$LegacySource = str_replace("g","Ｇ",$LegacySource);
$LegacySource = str_replace("h","Ｈ",$LegacySource);
$LegacySource = str_replace("i","Ｉ",$LegacySource);
$LegacySource = str_replace("j","Ｊ",$LegacySource);
$LegacySource = str_replace("k","Ｋ",$LegacySource);
$LegacySource = str_replace("l","Ｌ",$LegacySource);
$LegacySource = str_replace("m","Ｍ",$LegacySource);
$LegacySource = str_replace("n","Ｎ",$LegacySource);
$LegacySource = str_replace("o","Ｏ",$LegacySource);
$LegacySource = str_replace("p","Ｐ",$LegacySource);
$LegacySource = str_replace("q","Ｑ",$LegacySource);
$LegacySource = str_replace("r","Ｒ",$LegacySource);
$LegacySource = str_replace("s","Ｓ",$LegacySource);
$LegacySource = str_replace("t","Ｔ",$LegacySource);
$LegacySource = str_replace("u","U",$LegacySource);
$LegacySource = str_replace("v","Ｖ",$LegacySource);
$LegacySource = str_replace("w","Ｗ",$LegacySource);
$LegacySource = str_replace("x","Ｘ",$LegacySource);
$LegacySource = str_replace("y","Ｙ",$LegacySource);
$LegacySource = str_replace("z","Ｚ",$LegacySource);
// @Lordtabadol | @Lordtabadol //
$LegacySource = str_replace('ع','عٰہٰٖ',$LegacySource); 
$LegacySource = str_replace('ض','ضٰہٰٖ ',$LegacySource); 
$LegacySource = str_replace('ص','صٰہٰٖ',$LegacySource); 
$LegacySource = str_replace('ث','ثٰہٰٖ',$LegacySource); 
$LegacySource = str_replace('ق','قٰہٰٖ',$LegacySource); 
$LegacySource = str_replace('ف','فٰہٰٖ',$LegacySource); 
$LegacySource = str_replace('غ','غٰہٰٖ',$LegacySource); 
$LegacySource = str_replace('ه','هٰہٰٖ',$LegacySource); 
$LegacySource = str_replace('خ','خٰہٰٖ',$LegacySource); 
$LegacySource = str_replace('ح','حٰہٰٖ',$LegacySource); 
$LegacySource = str_replace('ج','جٰہٰٖ',$LegacySource); 
$LegacySource = str_replace('ش','شٰہٰٖ',$LegacySource); 
$LegacySource = str_replace('س','سٰہٰٖ',$LegacySource); 
$LegacySource = str_replace('ب','بٰہٰٖ',$LegacySource); 
$LegacySource = str_replace('ي','يٰہٰٖ',$LegacySource);
$LegacySource = str_replace('ل','لہٰٖ',$LegacySource); 
$LegacySource = str_replace('ا','اٰ',$LegacySource); 
$LegacySource = str_replace('ت','تٰہٰٖ',$LegacySource); 
$LegacySource = str_replace('ن','نٰہٰٖ',$LegacySource); 
$LegacySource = str_replace('م','مٰہٰٖ',$LegacySource); 
$LegacySource = str_replace('ك','كٰہٰٖ',$LegacySource); 
$LegacySource = str_replace('ة','ةً',$LegacySource); 
$LegacySource = str_replace('ظ','ظٰہٰٖ',$LegacySource); 
$LegacySource = str_replace('ء','ءِ',$LegacySource); 
$LegacySource = str_replace('ذ','ذٖ',$LegacySource); 
$LegacySource = str_replace('ط','طٰہٰٖ',$LegacySource); 
$LegacySource = str_replace('د','دٰ',$LegacySource); 
$LegacySource = str_replace('ز','زٰ',$LegacySource); 
$LegacySource = str_replace('ر','رٰ',$LegacySource); 
$LegacySource = str_replace('و','وَٰ',$LegacySource); 
$LegacySource = str_replace('ى','ىٰ',$LegacySource); 
 
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>$LegacySource."".$meme
]);}

if($text != '/start' and $text !='/panel'   and  file_get_contents("Lordtabadol/$user_id/zeakef.txt") =='LegacySource0'){
  $ss = [' •🌱💚﴿ֆ ❥', '🍿﴿ֆ ❥', '• 🌸💸 ❥˓  ', '🖤🌞﴿ֆ', ' • 🐼🌿﴾ֆ', ' •🙊💙﴿ֆ ❥', '-💁🏼‍♂️✨﴿ֆ ❥ ', '•|• 〄💖‘',
                        ' ⚡️🌞 •|•℡', '- ⁽🙆‍♂️✨₎ֆ', '❥┇💁🏼‍♂️🔥“', '💜💭℡ֆ', '-┆💙🙋🏼‍♂️♕', '- ⁽🙆🏻🍿₎ֆ',
                        '“̯ 🐼💗 |℡', '⁞ 🐝🍷', '┋⁽❥̚͢₎ 🐣💗', '•|• ✨🌸‘', '  ֆ 💭💔ۦ', 'ֆ 💛💭ۦ', 'ֆ ⚡️🔱ۦ',
                        '℡ᴖ̈💜✨⋮', '⋮⁽🌔☄️₎ۦ˛', '⁞❉💥┋♩', ' ⁞✦⁽☻🔥₎“ٰۦ', '℡ ̇₎ ✨🐯⇣✦', '⁞♩⁽🌞🌩₎⇣✿',
                        'ۦٰ‏┋❥ ͢˓🦁💛ۦ‏', '⚡️♛ֆ₎', '♛⇣🐰☄️₎✦', '⁾⇣✿💖┊❥', ' ₎✿💥😈 ⁞“❥', '😴🌸✿⇣', '❥┊⁽ ℡🦁🌸'];
  $zz = array_rand($ss,1);
  $meme = $ss[$zz];
   $count = count($text); 
$LegacySource = str_replace('a','𝗔',$text); 
$LegacySource = str_replace("b","𝗕",$LegacySource); 
$LegacySource = str_replace("c","𝗖",$LegacySource); 
$LegacySource = str_replace("d","𝗗",$LegacySource); 
$LegacySource = str_replace("e","𝗘",$LegacySource); 
$LegacySource = str_replace("f","𝗙",$LegacySource); 
$LegacySource = str_replace("g","𝗚",$LegacySource); 
$LegacySource = str_replace("h","𝗛",$LegacySource); 
$LegacySource = str_replace("i","𝗜",$LegacySource); 
$LegacySource = str_replace("j","𝗝",$LegacySource); 
$LegacySource = str_replace("k","𝗞",$LegacySource); 
$LegacySource = str_replace("l","𝗟",$LegacySource); 
$LegacySource = str_replace("m","𝗠",$LegacySource); 
$LegacySource = str_replace("n","𝗡",$LegacySource); 
$LegacySource = str_replace("o","𝗢",$LegacySource); 
$LegacySource = str_replace("p","𝗣",$LegacySource); 
$LegacySource = str_replace("q","𝗤",$LegacySource); 
$LegacySource = str_replace("r","𝗥",$LegacySource); 
$LegacySource = str_replace("s","𝗦",$LegacySource); 
$LegacySource = str_replace("t","𝗧",$LegacySource); 
$LegacySource = str_replace("u","𝗨",$LegacySource); 
$LegacySource = str_replace("v","𝗩",$LegacySource); 
$LegacySource = str_replace("w","𝗪",$LegacySource); 
$LegacySource = str_replace("x","𝗫",$LegacySource); 
$LegacySource = str_replace("y","𝗬",$LegacySource); 
$LegacySource = str_replace("z","𝗭",$LegacySource); 
                    // @Lordtabadol | @Lordtabadol //
$LegacySource = str_replace('ض','ضـٰ̲ـہ',$LegacySource); 
$LegacySource = str_replace('ص','صـٰ̲ـہ',$LegacySource); 
$LegacySource = str_replace('ث','ثـٰ̲ـہ',$LegacySource); 
$LegacySource = str_replace('ق','قـٰ̲ـہ',$LegacySource); 
$LegacySource = str_replace('ف','فـٰ̲ـہ',$LegacySource); 
$LegacySource = str_replace('غ','غـٰ̲ـہ',$LegacySource); 
$LegacySource = str_replace('ع','عـٰ̲ـہ',$LegacySource); 
$LegacySource = str_replace('ه','هـٰ̲ـہ',$LegacySource); 
$LegacySource = str_replace('خ','خـٰ̲ـہ',$LegacySource); 
$LegacySource = str_replace('ح','حـٰ̲ـہ',$LegacySource); 
$LegacySource = str_replace('ج','جـٰ̲ـہ',$LegacySource); 
$LegacySource = str_replace('ش','شـٰ̲ـہ',$LegacySource); 
$LegacySource = str_replace('س','سـٰ̲ـہ',$LegacySource); 
$LegacySource = str_replace('ي','يـٰ̲ـہ',$LegacySource); 
$LegacySource = str_replace('ب','بـٰ̲ـہ',$LegacySource);
$LegacySource = str_replace('ل','لـٰ̲ـہ',$LegacySource); 
$LegacySource = str_replace('ا','اٰ',$LegacySource); 
$LegacySource = str_replace('ت','تـٰ̲ـہ',$LegacySource); 
$LegacySource = str_replace('ن','نـٰ̲ـہ',$LegacySource); 
$LegacySource = str_replace('م','مـٰ̲ـہ',$LegacySource); 
$LegacySource = str_replace('ك','كـٰ̲ـہ',$LegacySource); 
$LegacySource = str_replace('ة','ةً',$LegacySource); 
$LegacySource = str_replace('ء','ء',$LegacySource); 
$LegacySource = str_replace('ظ','ظـٰ̲ـہ',$LegacySource); 
$LegacySource = str_replace('ط','طـٰ̲ـہ',$LegacySource); 
$LegacySource = str_replace('ذ','ذٰ',$LegacySource); 
$LegacySource = str_replace('د','دٰ',$LegacySource); 
$LegacySource = str_replace('ز','زٰ',$LegacySource); 
$LegacySource = str_replace('ر','رٰ',$LegacySource); 
$LegacySource = str_replace('و','وٰ',$LegacySource); 
$LegacySource = str_replace('ى','ىَ',$LegacySource); 

bot('sendMessage',[ 
'chat_id'=>$chat_id, 
'text'=>$LegacySource."".$meme
]);}


if($text != '/start' and $text !='/panel'   and  file_get_contents("Lordtabadol/$user_id/zeakef.txt") =='LegacySource0'){
  $ss = [' •🌱💚﴿ֆ ❥', '🍿﴿ֆ ❥', '• 🌸💸 ❥˓  ', '🖤🌞﴿ֆ', ' • 🐼🌿﴾ֆ', ' •🙊💙﴿ֆ ❥', '-💁🏼‍♂️✨﴿ֆ ❥ ', '•|• 〄💖‘',
                        ' ⚡️🌞 •|•℡', '- ⁽🙆‍♂️✨₎ֆ', '❥┇💁🏼‍♂️🔥“', '💜💭℡ֆ', '-┆💙🙋🏼‍♂️♕', '- ⁽🙆🏻🍿₎ֆ',
                        '“̯ 🐼💗 |℡', '⁞ 🐝🍷', '┋⁽❥̚͢₎ 🐣💗', '•|• ✨🌸‘', '  ֆ 💭💔ۦ', 'ֆ 💛💭ۦ', 'ֆ ⚡️🔱ۦ',
                        '℡ᴖ̈💜✨⋮', '⋮⁽🌔☄️₎ۦ˛', '⁞❉💥┋♩', ' ⁞✦⁽☻🔥₎“ٰۦ', '℡ ̇₎ ✨🐯⇣✦', '⁞♩⁽🌞🌩₎⇣✿',
                        'ۦٰ‏┋❥ ͢˓🦁💛ۦ‏', '⚡️♛ֆ₎', '♛⇣🐰☄️₎✦', '⁾⇣✿💖┊❥', ' ₎✿💥😈 ⁞“❥', '😴🌸✿⇣', '❥┊⁽ ℡🦁🌸'];
  $zz = array_rand($ss,1);
  $meme = $ss[$zz];
   $count = count($text); 
$LegacySource = str_replace('a','⧼α⧽',$text); 
$LegacySource = str_replace('b','⧼в⧽',$LegacySource); 
$LegacySource = str_replace('c','⧼c⧽',$LegacySource); 
$LegacySource = str_replace('d','⧼ɒ⧽',$LegacySource); 
$LegacySource = str_replace('e','⧼є⧽',$LegacySource); 
$LegacySource = str_replace('f','⧼f⧽',$LegacySource); 
$LegacySource = str_replace('g','⧼ɢ⧽',$LegacySource); 
$LegacySource = str_replace('h','⧼н⧽',$LegacySource); 
$LegacySource = str_replace('i','⧼ɪ⧽',$LegacySource); 
$LegacySource = str_replace('j','⧼ᴊ⧽',$LegacySource); 
$LegacySource = str_replace('k','⧼ĸ⧽',$LegacySource); 
$LegacySource = str_replace('l','⧼ℓ⧽',$LegacySource); 
$LegacySource = str_replace('m','⧼м⧽',$LegacySource); 
$LegacySource = str_replace('n','⧼и⧽',$LegacySource); 
$LegacySource = str_replace('o','⧼σ⧽',$LegacySource); 
$LegacySource = str_replace('p','⧼ρ⧽',$LegacySource); 
$LegacySource = str_replace('q','⧼q⧽',$LegacySource); 
$LegacySource = str_replace('r','⧼я⧽',$LegacySource); 
$LegacySource = str_replace('s','⧼s⧽',$LegacySource); 
$LegacySource = str_replace('t','⧼τ⧽',$LegacySource); 
$LegacySource = str_replace('u','⧼υ⧽',$LegacySource); 
$LegacySource = str_replace('v','⧼v⧽',$LegacySource); 
$LegacySource = str_replace('w','⧼ω⧽',$LegacySource); 
$LegacySource = str_replace('x','⧼x⧽',$LegacySource); 
$LegacySource = str_replace('y','⧼y⧽',$LegacySource); 
$LegacySource = str_replace('z','⧼z⧽',$LegacySource); 
// Lordtabadol | Lordtabadol //
$LegacySource = str_replace('ض','ضـٰ๋۪͜ﮧٰ',$LegacySource); 
$LegacySource = str_replace('ص','صـٌٍ๋ۤ͜ﮧْ',$LegacySource); 
$LegacySource = str_replace('ث','ث̲ꫭـﮧ',$LegacySource); 
$LegacySource = str_replace('ق','قٰٰྀ̲ـِٰ̲ﮧْ',$LegacySource); 
$LegacySource = str_replace('ف','',$LegacySource); 
$LegacySource = str_replace('غ','فـٌٍ๋ۤ͜ﮧ',$LegacySource); 
$LegacySource = str_replace('ع','غـّٰ̐ہٰٰ',$LegacySource); 
$LegacySource = str_replace('ه','ٰ̲ھہ',$LegacySource); 
$LegacySource = str_replace('خ','خ̲ﮧ',$LegacySource); 
$LegacySource = str_replace('ح','ح̲ꪳـﮧ',$LegacySource); 
$LegacySource = str_replace('ج','ج̲ꪸـﮧ',$LegacySource); 
$LegacySource = str_replace('ش','ش̲ꪾـﮧ',$LegacySource); 
$LegacySource = str_replace('س','سـ̷ٰٰﮧْ',$LegacySource); 
$LegacySource = str_replace('ي','يـِٰ̲ﮧ',$LegacySource); 
$LegacySource = str_replace('ب','ب̲ꪰـﮧ',$LegacySource);
$LegacySource = str_replace('ل','لٍُـّٰ̐ہ',$LegacySource); 
$LegacySource = str_replace('ا',' ཻا ',$LegacySource); 
$LegacySource = str_replace('ت','تـٰۧﮧ',$LegacySource); 
$LegacySource = str_replace('ن','نٰ̲̐ـﮧْ',$LegacySource); 
$LegacySource = str_replace('م','مٰٰྀ̲ـِٰ̲ﮧْ',$LegacySource); 
$LegacySource = str_replace('ك','كـِّﮧْٰٖ',$LegacySource); 
$LegacySource = str_replace('ة','ةً',$LegacySource); 
$LegacySource = str_replace('ء','ء',$LegacySource); 
$LegacySource = str_replace('ظ','ظَـ๋͜ﮧْ',$LegacySource); 
$LegacySource = str_replace('ط','ط̲꫁ـﮧ',$LegacySource); 
 $LegacySource = str_replace('ذ','ذٖ',$LegacySource); 
$LegacySource = str_replace('د','دُ',$LegacySource); 
$LegacySource = str_replace('ز','ژٰ',$LegacySource); 
$LegacySource = str_replace('ر','',$LegacySource); 
$LegacySource = str_replace('و','ﯛ૭',$LegacySource); 
 $LegacySource = str_replace('ى','ىِ',$LegacySource); 
/*
🌟‌ اوپن شده در چنل های
💚 @OmegaCompany
💚 @LegacySource
💚 @CodexTem

➖ نوشته شده توسط: @Lordtabadol
منبع بپاکی یعنی ریدی رو کفن زنده و مرده مادرت 😑
*/

bot('sendMessage',[ 
'chat_id'=>$chat_id, 
'text'=>$LegacySource."".$meme
]);}


if($text != '/start' and $text !='/panel'   and  file_get_contents("Lordtabadol/$user_id/zeakef.txt") =='LegacySource0'){
  $ss = [' •🌱💚﴿ֆ ❥', '🍿﴿ֆ ❥', '• 🌸💸 ❥˓  ', '🖤🌞﴿ֆ', ' • 🐼🌿﴾ֆ', ' •🙊💙﴿ֆ ❥', '-💁🏼‍♂️✨﴿ֆ ❥ ', '•|• 〄💖‘',
                        ' ⚡️🌞 •|•℡', '- ⁽🙆‍♂️✨₎ֆ', '❥┇💁🏼‍♂️🔥“', '💜💭℡ֆ', '-┆💙🙋🏼‍♂️♕', '- ⁽🙆🏻🍿₎ֆ',
                        '“̯ 🐼💗 |℡', '⁞ 🐝🍷', '┋⁽❥̚͢₎ 🐣💗', '•|• ✨🌸‘', '  ֆ 💭💔ۦ', 'ֆ 💛💭ۦ', 'ֆ ⚡️🔱ۦ',
                        '℡ᴖ̈💜✨⋮', '⋮⁽🌔☄️₎ۦ˛', '⁞❉💥┋♩', ' ⁞✦⁽☻🔥₎“ٰۦ', '℡ ̇₎ ✨🐯⇣✦', '⁞♩⁽🌞🌩₎⇣✿',
                        'ۦٰ‏┋❥ ͢˓🦁💛ۦ‏', '⚡️♛ֆ₎', '♛⇣🐰☄️₎✦', '⁾⇣✿💖┊❥', ' ₎✿💥😈 ⁞“❥', '😴🌸✿⇣', '❥┊⁽ ℡🦁🌸'];
  $zz = array_rand($ss,1);
  $meme = $ss[$zz];
   $count = count($text); 
$LegacySource = str_replace('a','🅰',$text); 
$LegacySource = str_replace('b','🅱',$LegacySource); 
$LegacySource = str_replace('c','🅲',$LegacySource); 
$LegacySource = str_replace('d','🅳',$LegacySource); 
$LegacySource = str_replace('e','🅴',$LegacySource); 
$LegacySource = str_replace('f','🅵',$LegacySource); 
$LegacySource = str_replace('g','🅶',$LegacySource); 
$LegacySource = str_replace('h','🅷',$LegacySource); 
$LegacySource = str_replace('i','🅸',$LegacySource); 
$LegacySource = str_replace('j','🅹',$LegacySource); 
$LegacySource = str_replace('k','🅺',$LegacySource); 
$LegacySource = str_replace('l','🅻',$LegacySource); 
$LegacySource = str_replace('m','🅼',$LegacySource); 
$LegacySource = str_replace('n','🅽',$LegacySource); 
$LegacySource = str_replace('o','🅾',$LegacySource); 
$LegacySource = str_replace('p','🅿',$LegacySource); 
$LegacySource = str_replace('q','🆀',$LegacySource); 
$LegacySource = str_replace('r','🆁',$LegacySource); 
$LegacySource = str_replace('s','🆂',$LegacySource); 
$LegacySource = str_replace('t','🆃',$LegacySource); 
$LegacySource = str_replace('u',' 🆄',$LegacySource); 
$LegacySource = str_replace('v','🆅',$LegacySource); 
$LegacySource = str_replace('w','🆆',$LegacySource); 
$LegacySource = str_replace('x','🆇',$LegacySource); 
$LegacySource = str_replace('y','🆈',$LegacySource); 
$LegacySource = str_replace('z','🆉',$LegacySource); 
// Lo r dtab ad ol | L o rdtab ad ol //
$LegacySource = str_replace('ض','ضـ๋͜‏ـﮧ ',$LegacySource); 
$LegacySource = str_replace('ص','صـ๋͜‏ـﮧ',$LegacySource); 
$LegacySource = str_replace('ث','ثـ๋͜‏ـﮧ',$LegacySource); 
$LegacySource = str_replace('ق','قـ๋͜‏ـﮧ',$LegacySource); 
$LegacySource = str_replace('ف','ف͒ـ๋͜‏ـﮧ',$LegacySource); 
$LegacySource = str_replace('غ','غـ๋͜‏ـﮧ',$LegacySource); 
$LegacySource = str_replace('ع','عـ๋͜‏ـﮧ',$LegacySource); 
$LegacySource = str_replace('ه','ۿۿہ',$LegacySource); 
$LegacySource = str_replace('خ','خ̐ـ๋͜‏ـﮧ ',$LegacySource); 
$LegacySource = str_replace('ح','حـ๋͜‏ـﮧ ',$LegacySource); 
$LegacySource = str_replace('ج','جـ๋͜‏ـﮧ ',$LegacySource); 
$LegacySource = str_replace('ش','شـ๋͜‏ـﮧ ',$LegacySource); 
$LegacySource = str_replace('س','سـ๋͜‏ـﮧ',$LegacySource); 
$LegacySource = str_replace('ي',' يـ๋͜‏ـﮧ',$LegacySource); 
$LegacySource = str_replace('ب','  بـ๋͜‏ـﮧ',$LegacySource);
$LegacySource = str_replace('ل',' لـ๋͜‏ـﮧ',$LegacySource); 
$LegacySource = str_replace('ا','آ',$LegacySource); 
$LegacySource = str_replace('ت','  تـ๋͜‏ـﮧ',$LegacySource); 
$LegacySource = str_replace('ن','نـ๋͜‏ـﮧ',$LegacySource); 
$LegacySource = str_replace('م','مـ๋͜‏ـﮧ',$LegacySource); 
$LegacySource = str_replace('ك','ڪـ๋͜‏ـﮧ',$LegacySource); 
$LegacySource = str_replace('ة','ةً',$LegacySource); 
$LegacySource = str_replace('ء','ء',$LegacySource); 
$LegacySource = str_replace('ظ','ظـ๋͜‏ـﮧ',$LegacySource); 
$LegacySource = str_replace('ط','طـ๋͜‏ـﮧ',$LegacySource); 
 $LegacySource = str_replace('ذ','ذِ',$LegacySource); 
$LegacySource = str_replace('د','دٰ',$LegacySource); 
$LegacySource = str_replace('ز','زً',$LegacySource); 
$LegacySource = str_replace('ر','ر',$LegacySource); 
$LegacySource = str_replace('و','ﯛ̲୭',$LegacySource); 
 $LegacySource = str_replace('ى','ىٰ',$LegacySource);
bot('sendMessage',[ 
'chat_id'=>$chat_id, 
'text'=>$LegacySource."".$meme
]);}
// @Lordtabadol | @Lordtabadol //
if($text != '/start' and $text !='/panel'   and  file_get_contents("Lordtabadol/$user_id/zeakef.txt") =='LegacySource0'){
  $ss = [' •🌱💚﴿ֆ ❥', '🍿﴿ֆ ❥', '• 🌸💸 ❥˓  ', '🖤🌞﴿ֆ', ' • 🐼🌿﴾ֆ', ' •🙊💙﴿ֆ ❥', '-💁🏼‍♂️✨﴿ֆ ❥ ', '•|• 〄💖‘',
                        ' ⚡️🌞 •|•℡', '- ⁽🙆‍♂️✨₎ֆ', '❥┇💁🏼‍♂️🔥“', '💜💭℡ֆ', '-┆💙🙋🏼‍♂️♕', '- ⁽🙆🏻🍿₎ֆ',
                        '“̯ 🐼💗 |℡', '⁞ 🐝🍷', '┋⁽❥̚͢₎ 🐣💗', '•|• ✨🌸‘', '  ֆ 💭💔ۦ', 'ֆ 💛💭ۦ', 'ֆ ⚡️🔱ۦ',
                        '℡ᴖ̈💜✨⋮', '⋮⁽🌔☄️₎ۦ˛', '⁞❉💥┋♩', ' ⁞✦⁽☻🔥₎“ٰۦ', '℡ ̇₎ ✨🐯⇣✦', '⁞♩⁽🌞🌩₎⇣✿',
                        'ۦٰ‏┋❥ ͢˓🦁💛ۦ‏', '⚡️♛ֆ₎', '♛⇣🐰☄️₎✦', '⁾⇣✿💖┊❥', ' ₎✿💥😈 ⁞“❥', '😴🌸✿⇣', '❥┊⁽ ℡🦁🌸'];
  $zz = array_rand($ss,1);
  $meme = $ss[$zz];
   $count = count($text); 
$LegacySource = str_replace('a','⎛α⎞',$text); 
$LegacySource = str_replace('b','⎛в⎞',$LegacySource); 
$LegacySource = str_replace('c','⎛c⎞',$LegacySource); 
$LegacySource = str_replace('d','⎛ɒ⎞',$LegacySource); 
$LegacySource = str_replace('e','⎛є⎞',$LegacySource); 
$LegacySource = str_replace('f','⎛f⎞',$LegacySource); 
$LegacySource = str_replace('g','⎛ɢ⎞',$LegacySource); 
$LegacySource = str_replace('h','⎛н⎞',$LegacySource); 
$LegacySource = str_replace('i','⎛ɪ⎞',$LegacySource); 
$LegacySource = str_replace('j','⎛ᴊ⎞',$LegacySource); 
$LegacySource = str_replace('k','⎛ĸ⎞',$LegacySource); 
$LegacySource = str_replace('l','⎛ℓ⎞',$LegacySource); 
$LegacySource = str_replace('m','⎛м⎞',$LegacySource); 
$LegacySource = str_replace('n','⎛и⎞',$LegacySource); 
$LegacySource = str_replace('o','⎛σ⎞',$LegacySource); 
$LegacySource = str_replace('p','⎛ρ⎞',$LegacySource); 
$LegacySource = str_replace('q','⎛q⎞',$LegacySource); 
$LegacySource = str_replace('r','⎛я⎞',$LegacySource); 
$LegacySource = str_replace('s','⎛s⎞',$LegacySource); 
$LegacySource = str_replace('t','⎛τ⎞ ',$LegacySource); 
$LegacySource = str_replace('u','⎛υ⎞ ',$LegacySource); 
$LegacySource = str_replace('v','⎛v⎞',$LegacySource); 
$LegacySource = str_replace('w','⎛ω⎞',$LegacySource); 
$LegacySource = str_replace('x','⎛x⎞',$LegacySource); 
$LegacySource = str_replace('y','⎛y⎞',$LegacySource); 
$LegacySource = str_replace('z','⎛z⎞',$LegacySource); 
 
$LegacySource = str_replace('ض','ضِٰـﮧِۢ',$LegacySource); 
$LegacySource = str_replace('ص','صِٰـﮧِۢ',$LegacySource); 
$LegacySource = str_replace('ث','ثِٰـﮧِۢ',$LegacySource); 
$LegacySource = str_replace('ق','قِٰـﮧِۢ',$LegacySource); 
$LegacySource = str_replace('ف','فِٰ͒ـِﮧۢ',$LegacySource); 
$LegacySource = str_replace('غ','غِٰـﮧِۢ',$LegacySource); 
$LegacySource = str_replace('ع','عِٰـﮧِۢ',$LegacySource); 
$LegacySource = str_replace('ه','ۿۿہ',$LegacySource); 
$LegacySource = str_replace('خ','خِٰ̐ـﮧِۢ',$LegacySource); 
$LegacySource = str_replace('ح','حِٰـﮧِۢ',$LegacySource); 
$LegacySource = str_replace('ج','جِٰـﮧِۢ',$LegacySource); 
$LegacySource = str_replace('ش','شِٰـﮧِۢ',$LegacySource); 
$LegacySource = str_replace('س','سِٰـﮧِۢ',$LegacySource); 
$LegacySource = str_replace('ي','يِٰـﮧِۢ',$LegacySource); 
$LegacySource = str_replace('ب','بِٰـِﮧۢ',$LegacySource);
$LegacySource = str_replace('ل','لِٰـِﮧۢ',$LegacySource); 
$LegacySource = str_replace('ا','آ',$LegacySource); 
$LegacySource = str_replace('ت','تِٰـﮧِۢ',$LegacySource); 
$LegacySource = str_replace('ن','نِٰـﮧِۢ',$LegacySource); 
$LegacySource = str_replace('م','مِٰـﮧِۢ',$LegacySource); 
$LegacySource = str_replace('ك','ڪِٰـﮧِۢ',$LegacySource); 
$LegacySource = str_replace('ة','ةً',$LegacySource); 
$LegacySource = str_replace('ء','ء',$LegacySource); 
$LegacySource = str_replace('ظ','ظِٰـﮧِۢ',$LegacySource); 
$LegacySource = str_replace('ط','طِٰـﮧِۢ',$LegacySource); 
 $LegacySource = str_replace('ذ','ذٰ',$LegacySource); 
$LegacySource = str_replace('د','د',$LegacySource); 
$LegacySource = str_replace('ز','ژ',$LegacySource); 
$LegacySource = str_replace('ر','رٰ',$LegacySource); 
$LegacySource = str_replace('و','ﯛ̲୭',$LegacySource); 
 $LegacySource = str_replace('ى','ىٍ',$LegacySource);
bot('sendMessage',[ 
'chat_id'=>$chat_id, 
'text'=>$LegacySource."".$meme
]);}


if($text != '/start' and $text !='/panel'   and  file_get_contents("Lordtabadol/$user_id/zeakef.txt") =='LegacySource0'){
  $ss = [' •🌱💚﴿ֆ ❥', '🍿﴿ֆ ❥', '• 🌸💸 ❥˓  ', '🖤🌞﴿ֆ', ' • 🐼🌿﴾ֆ', ' •🙊💙﴿ֆ ❥', '-💁🏼‍♂️✨﴿ֆ ❥ ', '•|• 〄💖‘',
                        ' ⚡️🌞 •|•℡', '- ⁽🙆‍♂️✨₎ֆ', '❥┇💁🏼‍♂️🔥“', '💜💭℡ֆ', '-┆💙🙋🏼‍♂️♕', '- ⁽🙆🏻🍿₎ֆ',
                        '“̯ 🐼💗 |℡', '⁞ 🐝🍷', '┋⁽❥̚͢₎ 🐣💗', '•|• ✨🌸‘', '  ֆ 💭💔ۦ', 'ֆ 💛💭ۦ', 'ֆ ⚡️🔱ۦ',
                        '℡ᴖ̈💜✨⋮', '⋮⁽🌔☄️₎ۦ˛', '⁞❉💥┋♩', ' ⁞✦⁽☻🔥₎“ٰۦ', '℡ ̇₎ ✨🐯⇣✦', '⁞♩⁽🌞🌩₎⇣✿',
                        'ۦٰ‏┋❥ ͢˓🦁💛ۦ‏', '⚡️♛ֆ₎', '♛⇣🐰☄️₎✦', '⁾⇣✿💖┊❥', ' ₎✿💥😈 ⁞“❥', '😴🌸✿⇣', '❥┊⁽ ℡🦁🌸'];
  $zz = array_rand($ss,1);
  $meme = $ss[$zz];
   $count = count($text); 
$LegacySource = str_replace('a','̶a̶',$text); 
$LegacySource = str_replace('b','b̶',$LegacySource); 
$LegacySource = str_replace('c','c̶',$LegacySource); 
$LegacySource = str_replace('d','d̶',$LegacySource); 
$LegacySource = str_replace('e','e̶',$LegacySource); 
$LegacySource = str_replace('f','f̶',$LegacySource); 
$LegacySource = str_replace('g','g̶',$LegacySource); 
$LegacySource = str_replace('h','h̶',$LegacySource); 
$LegacySource = str_replace('i','i̶',$LegacySource); 
$LegacySource = str_replace('j','j̶',$LegacySource); 
$LegacySource = str_replace('k','k̶',$LegacySource); 
$LegacySource = str_replace('l','l̶',$LegacySource); 
$LegacySource = str_replace('m','m̶',$LegacySource); 
$LegacySource = str_replace('n','n̶',$LegacySource); 
$LegacySource = str_replace('o','o̶',$LegacySource); 
$LegacySource = str_replace('p','p̶',$LegacySource); 
$LegacySource = str_replace('q','q̶',$LegacySource); 
$LegacySource = str_replace('r','r̶',$LegacySource); 
$LegacySource = str_replace('s','s̶',$LegacySource); 
$LegacySource = str_replace('t','t̶',$LegacySource); 
$LegacySource = str_replace('u','ᵘ̶ ',$LegacySource); 
$LegacySource = str_replace('v','v̶',$LegacySource); 
$LegacySource = str_replace('w','w̶',$LegacySource); 
$LegacySource = str_replace('x','x̶',$LegacySource); 
$LegacySource = str_replace('y','y̶',$LegacySource); 
$LegacySource = str_replace('z','z̶',$LegacySource); 
// @Lordtabadol | @Lordtabadol //
 $LegacySource = str_replace('ض','ضۜہٰٰ',$LegacySource); 
$LegacySource = str_replace('ص','صۛہٰٰ',$LegacySource); 
$LegacySource = str_replace('ث','ثہٰٰ',$LegacySource); 
$LegacySource = str_replace('ق','قྀ̲ہٰٰٰ',$LegacySource); 
$LegacySource = str_replace('ف','ف͒ہٰٰ',$LegacySource); 
$LegacySource = str_replace('غ','غہٰٰ',$LegacySource); 
$LegacySource = str_replace('ع','ۤ؏ـ',$LegacySource); 
$LegacySource = str_replace('ه','ھہ',$LegacySource); 
$LegacySource = str_replace('خ','خٰ̐ہ',$LegacySource); 
$LegacySource = str_replace('ح','حہٰٰ',$LegacySource); 
$LegacySource = str_replace('ج','جْۧ ',$LegacySource); 
$LegacySource = str_replace('ش','شِٰہٰٰ',$LegacySource); 
$LegacySource = str_replace('س','سٰٰٓ',$LegacySource); 
$LegacySource = str_replace('ي','يِٰہ',$LegacySource); 
$LegacySource = str_replace('ب','بّہ',$LegacySource);
$LegacySource = str_replace('ل','ل',$LegacySource); 
$LegacySource = str_replace('ا','آ',$LegacySource); 
$LegacySource = str_replace('ت',' تَہَٰ',$LegacySource); 
$LegacySource = str_replace('ن','نَِٰہ',$LegacySource); 
$LegacySource = str_replace('ك','ڪٰྀہٰٰٖ',$LegacySource); 
$LegacySource = str_replace('م','مـ',$LegacySource); 
$LegacySource = str_replace('ة','ةً',$LegacySource); 
$LegacySource = str_replace('ء','ء',$LegacySource); 
$LegacySource = str_replace('ظ','ظۗـہٰٰ',$LegacySource); 
$LegacySource = str_replace('ط','طۨہٰٰ',$LegacySource); 
 $LegacySource = str_replace('ذ','ذِ',$LegacySource); 
$LegacySource = str_replace('د','دُ',$LegacySource); 
$LegacySource = str_replace('ز','ژ',$LegacySource); 
$LegacySource = str_replace('ر','رٰ',$LegacySource); 
$LegacySource = str_replace('و','وً',$LegacySource); 
 $LegacySource = str_replace('ى','ى',$LegacySource);
bot('sendMessage',[ 
'chat_id'=>$chat_id, 
'text'=>$LegacySource."".$meme
]);}
/*
🌟‌ اوپن شده در چنل های
💚 @OmegaCompany
💚 @LegacySource
💚 @CodexTem

➖ نوشته شده توسط: @Lordtabadol
منبع بپاکی یعنی ریدی رو کفن زنده و مرده مادرت 😑
*/

if($text != '/start' and $text !='/panel'   and  file_get_contents("Lordtabadol/$user_id/zeakef.txt") =='LegacySource0'){
  $ss = [' •🌱💚﴿ֆ ❥', '🍿﴿ֆ ❥', '• 🌸💸 ❥˓  ', '🖤🌞﴿ֆ', ' • 🐼🌿﴾ֆ', ' •🙊💙﴿ֆ ❥', '-💁🏼‍♂️✨﴿ֆ ❥ ', '•|• 〄💖‘',
                        ' ⚡️🌞 •|•℡', '- ⁽🙆‍♂️✨₎ֆ', '❥┇💁🏼‍♂️🔥“', '💜💭℡ֆ', '-┆💙🙋🏼‍♂️♕', '- ⁽🙆🏻🍿₎ֆ',
                        '“̯ 🐼💗 |℡', '⁞ 🐝🍷', '┋⁽❥̚͢₎ 🐣💗', '•|• ✨🌸‘', '  ֆ 💭💔ۦ', 'ֆ 💛💭ۦ', 'ֆ ⚡️🔱ۦ',
                        '℡ᴖ̈💜✨⋮', '⋮⁽🌔☄️₎ۦ˛', '⁞❉💥┋♩', ' ⁞✦⁽☻🔥₎“ٰۦ', '℡ ̇₎ ✨🐯⇣✦', '⁞♩⁽🌞🌩₎⇣✿',
                        'ۦٰ‏┋❥ ͢˓🦁💛ۦ‏', '⚡️♛ֆ₎', '♛⇣🐰☄️₎✦', '⁾⇣✿💖┊❥', ' ₎✿💥😈 ⁞“❥', '😴🌸✿⇣', '❥┊⁽ ℡🦁🌸'];
  $zz = array_rand($ss,1);
  $meme = $ss[$zz];
   $count = count($text); 
$LegacySource = str_replace('a','🅐',$text); 
$LegacySource = str_replace("b","🅑",$LegacySource); 
$LegacySource = str_replace("c","🅒",$LegacySource); 
$LegacySource = str_replace("d","🅓",$LegacySource); 
$LegacySource = str_replace("e","🅔",$LegacySource); 
$LegacySource = str_replace("f","🅕",$LegacySource); 
$LegacySource = str_replace("g","🅖",$LegacySource); 
$LegacySource = str_replace("h","🅗",$LegacySource); 
$LegacySource = str_replace("i","🅘",$LegacySource); 
$LegacySource = str_replace("j","🅙",$LegacySource); 
$LegacySource = str_replace("k","🅚",$LegacySource); 
$LegacySource = str_replace("l","🅛",$LegacySource); 
$LegacySource = str_replace("m","🅜",$LegacySource); 
$LegacySource = str_replace("n","🅝",$LegacySource); 
$LegacySource = str_replace("o","🅞",$LegacySource); 
$LegacySource = str_replace("p","🅟",$LegacySource); 
$LegacySource = str_replace("q","🅠",$LegacySource); 
$LegacySource = str_replace("r","🅡",$LegacySource); 
$LegacySource = str_replace("s","🅢",$LegacySource); 
$LegacySource = str_replace("t","🅣",$LegacySource); 
$LegacySource = str_replace("u"," 🅤",$LegacySource); 
$LegacySource = str_replace("v","🅥",$LegacySource); 
$LegacySource = str_replace("w","🅦",$LegacySource); 
$LegacySource = str_replace("x","🅧",$LegacySource); 
$LegacySource = str_replace("y","🅨",$LegacySource); 
$LegacySource = str_replace("z","🅩",$LegacySource); 
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
$LegacySource = str_replace('ض','ضً',$LegacySource); 
$LegacySource = str_replace('ص','صً',$LegacySource); 
$LegacySource = str_replace('ث','ثہ',$LegacySource); 
$LegacySource = str_replace('ق','قہً',$LegacySource); 
$LegacySource = str_replace('ف','فُہ',$LegacySource); 
$LegacySource = str_replace('غ','غہ',$LegacySource); 
$LegacySource = str_replace('ع','عہُ',$LegacySource); 
$LegacySource = str_replace('ه','ه',$LegacySource); 
$LegacySource = str_replace('خ','خہ',$LegacySource); 
$LegacySource = str_replace('ح','حہ',$LegacySource); 
$LegacySource = str_replace('ج','جہ',$LegacySource); 
$LegacySource = str_replace('ش','شہ',$LegacySource); 
$LegacySource = str_replace('س','سہ',$LegacySource); 
$LegacySource = str_replace('ي','يہ',$LegacySource); 
$LegacySource = str_replace('ب',' ٻً',$LegacySource);
$LegacySource = str_replace('ل','لہ',$LegacySource); 
$LegacySource = str_replace('ا',' ٳ',$LegacySource); 
$LegacySource = str_replace('ت','تہ',$LegacySource); 
$LegacySource = str_replace('ن','نٍ',$LegacySource); 
$LegacySource = str_replace('ك','كُہ',$LegacySource); 
$LegacySource = str_replace('م','مْ',$LegacySource); 
$LegacySource = str_replace('ة','ةً',$LegacySource); 
$LegacySource = str_replace('ء','ء',$LegacySource); 
$LegacySource = str_replace('ظ','ظً',$LegacySource); 
$LegacySource = str_replace('ط','طہ',$LegacySource); 
 $LegacySource = str_replace('ذ','ذً',$LegacySource); 
$LegacySource = str_replace('د','دِ',$LegacySource); 
$LegacySource = str_replace('ز','زً',$LegacySource); 
$LegacySource = str_replace('ر','ڒٍ',$LegacySource); 
$LegacySource = str_replace('و','وٌ',$LegacySource); 
 $LegacySource = str_replace('ى','ىّ',$LegacySource);
bot('sendMessage',[ 
'chat_id'=>$chat_id, 
'text'=>$LegacySource."".$meme
]);}
if($text != '/start' and $text !='/panel'   and  file_get_contents("Lordtabadol/$user_id/zeakef.txt") =='LegacySource0'){
// @Lor dtaba dol | @Lor dtabadol //
  $ss = [' •🌱💚﴿ֆ ❥', '🍿﴿ֆ ❥', '• 🌸💸 ❥˓  ', '🖤🌞﴿ֆ', ' • 🐼??﴾ֆ', ' •🙊💙﴿ֆ ❥', '-💁🏼‍♂️✨﴿ֆ ❥ ', '•|• 〄💖‘',
                        ' ⚡️🌞 •|•℡', '- ⁽🙆‍♂️✨₎ֆ', '❥┇💁🏼‍♂️🔥“', '💜💭℡ֆ', '-┆💙🙋🏼‍♂️♕', '- ⁽🙆🏻🍿₎ֆ',
                        '“̯ 🐼💗 |℡', '⁞ 🐝🍷', '┋⁽❥̚͢₎ 🐣💗', '•|• ✨🌸‘', '  ֆ 💭💔ۦ', 'ֆ 💛💭ۦ', 'ֆ ⚡️🔱ۦ',
                        '℡ᴖ̈💜✨⋮', '⋮⁽🌔☄️₎ۦ˛', '⁞❉💥┋♩', ' ⁞✦⁽☻🔥₎“ٰۦ', '℡ ̇₎ ✨🐯⇣✦', '⁞♩⁽🌞🌩₎⇣✿',
                        'ۦٰ‏┋❥ ͢˓🦁💛ۦ‏', '⚡️♛ֆ₎', '♛⇣🐰☄️₎✦', '⁾⇣✿💖┊❥', ' ₎✿💥😈 ⁞“❥', '😴🌸✿⇣', '❥┊⁽ ℡🦁🌸'];
  $zz = array_rand($ss,1);
  $meme = $ss[$zz];
   $count = count($text); 
$LegacySource = str_replace('a','⎛α⎞',$text); 
$LegacySource = str_replace('b','⎛в⎞',$LegacySource); 
$LegacySource = str_replace('c','⎛c⎞',$LegacySource); 
$LegacySource = str_replace('d','⎛ɒ⎞',$LegacySource); 
$LegacySource = str_replace('e','⎛є⎞',$LegacySource); 
$LegacySource = str_replace('f','⎛f⎞',$LegacySource); 
$LegacySource = str_replace('g','⎛ɢ⎞',$LegacySource); 
$LegacySource = str_replace('h','⎛н⎞',$LegacySource); 
$LegacySource = str_replace('i','⎛ɪ⎞',$LegacySource); 
$LegacySource = str_replace('j','⎛ᴊ⎞',$LegacySource); 
$LegacySource = str_replace('k','⎛ĸ⎞',$LegacySource); 
$LegacySource = str_replace('l','⎛ℓ⎞',$LegacySource); 
$LegacySource = str_replace('m','⎛м⎞',$LegacySource); 
$LegacySource = str_replace('n','⎛и⎞',$LegacySource); 
$LegacySource = str_replace('o','⎛σ⎞',$LegacySource); 
$LegacySource = str_replace('p','⎛ρ⎞',$LegacySource); 
$LegacySource = str_replace('q','⎛q⎞',$LegacySource); 
$LegacySource = str_replace('r','⎛я⎞',$LegacySource); 
$LegacySource = str_replace('s','⎛s⎞',$LegacySource); 
$LegacySource = str_replace('t','⎛τ⎞ ',$LegacySource); 
$LegacySource = str_replace('u','⎛υ⎞ ',$LegacySource); 
$LegacySource = str_replace('v','⎛v⎞',$LegacySource); 
$LegacySource = str_replace('w','⎛ω⎞',$LegacySource); 
$LegacySource = str_replace('x','⎛x⎞',$LegacySource); 
$LegacySource = str_replace('y','⎛y⎞',$LegacySource); 
$LegacySource = str_replace('z','⎛z⎞',$LegacySource); 
$LegacySource = str_replace('ض','ضِٰـﮧِۢ',$LegacySource); 
$LegacySource = str_replace('ص','صِٰـﮧِۢ',$LegacySource); 
$LegacySource = str_replace('ث','ثِٰـﮧِۢ',$LegacySource); 
$LegacySource = str_replace('ق','قِٰـﮧِۢ',$LegacySource); 
$LegacySource = str_replace('ف','فِٰ͒ـِﮧۢ',$LegacySource); 
$LegacySource = str_replace('غ','غِٰـﮧِۢ',$LegacySource); 
$LegacySource = str_replace('ع','عِٰـﮧِۢ',$LegacySource); 
$LegacySource = str_replace('ه','ۿۿہ',$LegacySource); 
$LegacySource = str_replace('خ','خِٰ̐ـﮧِۢ',$LegacySource); 
$LegacySource = str_replace('ح','حِٰـﮧِۢ',$LegacySource); 
$LegacySource = str_replace('ج','جِٰـﮧِۢ',$LegacySource); 
$LegacySource = str_replace('ش','شِٰـﮧِۢ',$LegacySource); 
$LegacySource = str_replace('س','سِٰـﮧِۢ',$LegacySource); 
$LegacySource = str_replace('ي','يِٰـﮧِۢ',$LegacySource); 
$LegacySource = str_replace('ب','بِٰـِﮧۢ',$LegacySource);
$LegacySource = str_replace('ل','لِٰـِﮧۢ',$LegacySource); 
$LegacySource = str_replace('ا','آ',$LegacySource); 
$LegacySource = str_replace('ت','تِٰـﮧِۢ',$LegacySource); 
$LegacySource = str_replace('ن','نِٰـﮧِۢ',$LegacySource); 
$LegacySource = str_replace('م','مِٰـﮧِۢ',$LegacySource); 
$LegacySource = str_replace('ك','ڪِٰـﮧِۢ',$LegacySource); 
$LegacySource = str_replace('ة','ةً',$LegacySource); 
$LegacySource = str_replace('ء','ء',$LegacySource); 
$LegacySource = str_replace('ظ','ظِٰـﮧِۢ',$LegacySource); 
$LegacySource = str_replace('ط','طِٰـﮧِۢ',$LegacySource); 
 $LegacySource = str_replace('ذ','ذٰ',$LegacySource); 
$LegacySource = str_replace('د','د',$LegacySource); 
$LegacySource = str_replace('ز','ژ',$LegacySource); 
$LegacySource = str_replace('ر','رٰ',$LegacySource); 
$LegacySource = str_replace('و','ﯛ̲୭',$LegacySource); 
 $LegacySource = str_replace('ى','ىٍ',$LegacySource);
bot('sendMessage',[ 
'chat_id'=>$chat_id, 
'parse_mode'=>"Markdown",
'text'=>$LegacySource."".$meme 
]);
bot('sendMessage',[ 
'chat_id'=>$chat_id, 
"text"=>'▫️ فونت شما اماده شد!',
 'reply_markup'=>json_encode([ 
      'inline_keyboard'=>[
[['text'=>'🔙' ,'callback_data'=>"home"]],]])
]);}}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
?>