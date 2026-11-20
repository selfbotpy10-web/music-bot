<?php 
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
ob_start();
$load = sys_getloadavg();
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
$day = (2505600 - (time() - filectime('Mahdy'))) / 60 / 60 / 24;
$day = round($day, 0);
if(!$ok) die("sik golam :)");
$API_KEY = '[*[TOKEN]*]';
$admin= "[*[ADMIN]*]";
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
function SendMessage($chat_id, $text, $mode, $reply, $keyboard = null){
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>$text,
'parse_mode'=>$mode,
'reply_to_message_id'=>$reply,
'reply_markup'=>$keyboard
]);
}
function save($filename, $data)
{
$file = fopen($filename, 'w');
fwrite($file, $data);
fclose($file);
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
$update = json_decode(file_get_contents('php://input'));
$setchnl = file_get_contents("Dade/setchannel.txt");
$mych = file_get_contents("Dade/channelset.txt");
$message = $update->message;
$message_id = $update->message->id;
$from_id = $message->from->id;
$lock = file_get_contents("Dade/channel.txt");
$save = file_get_contents("data/$chat_id/save.txt");
$Channel = $mych;
$contact = $update->channel_post->contact;
$stick = file_get_contents("Dade/stick.txt");
$video = file_get_contents("Dade/video.txt");
$lockch = file_get_contents("Dade/locking.txt");
$add = file_get_contents("Dade/aadmin.txt");
$addm = file_get_contents("Dade/admin.txt");
$file = file_get_contents("Dade/file.txt");
$num = file_get_contents("Dade/num.txt");
$video_msg = file_get_contents("Dade/video_msg.txt");
$texts = file_get_contents("Dade/text.txt");
$fwd = file_get_contents("Dade/fwd.txt");
$chat_id = $message->chat->id;
$lex = $update->message->forward_from->id;
$lexo = $update->message->forward_from_chat->id;
$lexot = $update->message->forward_from_chat->username;
$lexos = $update->message->forward_from_chat->title;
$floooood = file_get_contents("data/setflood.txt");
$max_flood = file_get_contents("data/mizanspam.txt");
$file_channel = $update->channel_post->document;
$lockchn = $update->channel_post;
$text = $message->text;
$no = file_get_contents("Dade/co.txt");
$gifs = file_get_contents("Dade/gifs.txt");
$author_signature=$update->channel_post->author_signature;
$datass=file_get_contents('https://api.telegram.org/bot'.$API_KEY.'/getChatAdministrators?chat_id='.$mych);
$datal = json_decode($datass,true);
foreach($datal['result'] as $user){
if($user['user']['first_name'] == $author_signature){
$id = $user['user']['id'];}}
$un = file_get_contents("Dade/del.txt");
$en_text = file_get_contents("Dade/$chat_id/tarjomeh.txt");
$reply = $update->message->reply_to_message;
$tc = $update->message->chat->type;
$spams = file_get_contents("data/lockspam.txt");
$first_name = $update->message->from->first_name;
$username = $update->message->username;
$sticker_channel=$update->channel_post->sticker;
$gif_channel=$update->channel_post->animation;
$video_note_channel=$update->channel_post->video_note;
$forward_channel=$update->channel_post->forward_signature;
$video_channel=$update->channel_post->video;
$reply = $update->message->reply_to_message;
$photo_channel = $update->channel_post->photo;
$chatid=$update->callback_query->message->chat->id;
$messageid=$update->callback_query->message->message_id;
$data=$update->callback_query->data;
$OKL = file_get_contents("Dade/coj.txt");
$pol = file_get_contents("member.txt");
$DD = file_get_contents("Dade/spamingg.txt");
mkdir("Dade");
mkdir("data");
mkdir("data/users");
mkdir("check");
$channel_id=$update->channel_post->chat->id;
$text_channel=$update->channel_post->text;
$channel_message_id=$update->channel_post->message_id;
$channelmessage_id=$update->channel_post->reply_to_message->message_id;
$data=$update->callback_query->data;
$fromid = $update->callback_query->from->id;
if($channel_id != $mych) {
bot('LeaveChat', [
'chat_id'=>$channel_id, 
]);}
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
]);
exit();
}
if($text == "/start" && $from_id == $admin) {
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"سلام دوست عزیز به ربات مدیریت کانال خوش آمدید
لطفا دکمه مورد نظر را انتخاب کنید",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"مدیریت کانال🚸",'callback_data'=>"help"]],
[['text'=>"باقی مانده اشتراک ❗️",'callback_data'=>"eshtrak"]]
],
])
]);
}
if(preg_match('/^\/([Cc][Rr][Ee][Aa][Tt][Oo][Rr])/',$text)){
bot ('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"@MiaCreateBot",
]);
}
if($data=='back' && $fromid == $admin){
bot('editmessagetext',[
'chat_id'=>$chatid,
'message_id'=>$messageid,
'text'=>"سلام دوست عزیز به ربات مدیریت کانال خوش آمدید
لطفا دکمه مورد نظر را انتخاب کنید",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"مدیریت کانال🚸",'callback_data'=>"help"]],
[['text'=>"باقی مانده اشتراک ❗️",'callback_data'=>"eshtrak"]]
],
])
]);
}
if($data == 'help' && $fromid == $admin) {
unlink("Dade/setchannel.txt");
unlink("Dade/admin.txt");
unlink("Dade/del.txt");
bot('editmessagetext',[
'chat_id'=>$chatid,
'message_id'=>$messageid,
'text'=>"کانال $no را توسط کیبورد زیر مدیریت کنید",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"🔐 تنظیمات قفلی",'callback_data'=>"addm"]],
[['text'=>"🗃 تنظیمات اسپم",'callback_data'=>"setspam"]],
[['text'=>"⚙ تنظیمات ادمین ها",'callback_data'=>"addo"]],
[['text'=>"🗑 حذف پیام ها",'callback_data'=>"delmsg"]],
[['text'=>"✅تنظیمات کانال",'callback_data'=>"wol"]], 
[['text'=>"↩️ برگشت",'callback_data'=>"back"]]    	
],
])
]);
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
if($data == 'eshtrak' && $fromid == $admin) {
bot('editmessagetext',[
'chat_id'=>$chatid,
'message_id'=>$messageid,
'text'=>"تا پایان اشتراک شما $day روز باقی مانده است ✅", 
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"مدیریت کانال🚸",'callback_data'=>"help"]],
[['text'=>"باقی مانده اشتراک ❗️",'callback_data'=>"eshtrak"]]
],
])
]);} 
if($data == 'delmsg' && $fromid == $admin) {
bot('editmessagetext',[
'chat_id'=>$chatid,
'message_id'=>$messageid,
'text'=>"دکمه مورد نظر را انتخاب کنید", 
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"حذف 10 پیام🗑",'callback_data'=>"dell"]],
[['text'=>"↩️برگشت",'callback_data'=>"help"]] 
],
])
]);} 
if($data == 'dell' && $fromid == $admin) {
bot('editmessagetext',[
'chat_id'=>$chatid,
'message_id'=>$messageid,
'text'=>"در کانال روی یکی از پست ها ریپلی کنید و کلمه 
حذف
را ارسال کنید 
سپس اون پست و 9 پست بالاترش پاک خواهند شد😃",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"↩️برگشت",'callback_data'=>"help"]] 
],
])
]);
}
if($update->channel_post->reply_to_message && $text_channel == "حذف")
if($id == $admin){
bot('deleteMessage', [
'chat_id'=>$mych, 
'message_id'=>$channel_message_id, 
]);
bot('deleteMessage', [
'chat_id'=>$mych, 
'message_id'=>$channelmessage_id, 
]);
bot('deleteMessage', [
'chat_id'=>$mych, 
'message_id'=>$channelmessage_id-1, 
]);
bot('deleteMessage', [
'chat_id'=>$mych, 
'message_id'=>$channelmessage_id-2, 
]);
bot('deleteMessage', [
'chat_id'=>$mych, 
'message_id'=>$channelmessage_id-3, 
]);
bot('deleteMessage', [
'chat_id'=>$mych, 
'message_id'=>$channelmessage_id-4, 
]);
bot('deleteMessage', [
'chat_id'=>$mych, 
'message_id'=>$channelmessage_id-5, 
]);
bot('deleteMessage', [
'chat_id'=>$mych, 
'message_id'=>$channelmessage_id-6, 
]);
bot('deleteMessage', [
'chat_id'=>$mych, 
'message_id'=>$channelmessage_id-7, 
]);
bot('deleteMessage', [
'chat_id'=>$mych, 
'message_id'=>$channelmessage_id-8, 
]);
bot('deleteMessage', [
'chat_id'=>$mych, 
'message_id'=>$channelmessage_id-9, 
]);
}
if($data == 'setspam' && $fromid == $admin) {
bot('editmessagetext',[
'chat_id'=>$chatid,
'message_id'=>$messageid,
'text'=>"تنظیمات کانال $no
 ✅ به معنای قفل بودن  اسپم در کانال است
❌به معنی آزاد بودن اسپم در کانال است",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"اسپم [$spams]",'callback_data'=>"null"]],
[['text'=>"بازکردن اسپم❌",'callback_data'=>"unspam"],['text'=>"قفل اسپم✅",'callback_data'=>"lockspam"]],
[['text'=>"🔽تعداد ارسال پیام در 1 دقیقه🔽",'callback_data'=>"null"]],
[['text'=>"تنظیم اسپم➕",'callback_data'=>"setspaming"]],
[['text'=>"آپدیت♻️",'callback_data'=>"setspamd"]],
[['text'=>"↩️برگشت",'callback_data'=>"help"]] 
],
])
]);
}
if($data=='setspaming' && $fromid == $admin){
bot('editmessagetext', [
'chat_id'=>$chatid,
'message_id'=>$messageid, 
'text'=>"لطفا میزان مورد نظر خود را در کیبورد زیر  بنویسید ، زمانی که مقدار مورد نظر کامل شد دکمه ی تایید را بزنید
اسپم فعلی : [$max_flood]
بعد از هربار زدن روی هر عدد، یکبار روی آپدیت کلیک کنید تا اسپم براتون بروز بشه", 
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"1",'callback_data'=>"1"],['text'=>"2",'callback_data'=>"2"],['text'=>"3",'callback_data'=>"3"]],
[['text'=>"4",'callback_data'=>"4"],['text'=>"5",'callback_data'=>"5"],['text'=>"6",'callback_data'=>"6"]],
[['text'=>"7",'callback_data'=>"7"],['text'=>"8",'callback_data'=>"8"],['text'=>"9",'callback_data'=>"9"]],
[['text'=>"آپدیت♻️",'callback_data'=>"setspaming"],['text'=>"10",'callback_data'=>"10"],['text'=>"↩️برگشت",'callback_data'=>"setspam"]],
],
])
]);
}
if($fromid == $admin) {
if($data == '1' or $data == '2' or $data == '3' or $data == '4' or $data == '5' or $data == '6' or $data == '7' or $data == '8' or $data == '9' or $data == '10'){
save("data/mizanspam.txt","$data");
bot('editmessagetext', [
'chat_id'=>$chatid,
'message_id'=>$messageid, 
'text'=>"لطفا میزان مورد نظر خود را در کیبورد زیر  بنویسید ، زمانی که مقدار مورد نظر کامل شد دکمه ی تایید را بزنید
اسپم فعلی : [$max_flood]
بعد از هربار زدن روی هر عدد، یکبار روی آپدیت کلیک کنید تا اسپم براتون بروز بشه", 
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"1",'callback_data'=>"1"],['text'=>"2",'callback_data'=>"2"],['text'=>"3",'callback_data'=>"3"]],
[['text'=>"4",'callback_data'=>"4"],['text'=>"5",'callback_data'=>"5"],['text'=>"6",'callback_data'=>"6"]],
[['text'=>"7",'callback_data'=>"7"],['text'=>"8",'callback_data'=>"8"],['text'=>"9",'callback_data'=>"9"]],
[['text'=>"آپدیت♻️",'callback_data'=>"setspaming"],['text'=>"10",'callback_data'=>"10"],['text'=>"↩️برگشت",'callback_data'=>"setspam"]],
],
])
]);
bot('answercallbackquery', [
'callback_query_id'=>$update->callback_query->id,
'text'=>"میزان اسپم در کانال $data تنظیم شد✅", 
]);
}} 
if($data == 'setspamd' && $fromid == $admin) {
bot('editmessagetext',[
'chat_id'=>$chatid,
'message_id'=>$messageid,
'text'=>"تنظیمات کانال $no
 ✅ به معنای قفل بودن  اسپم در کانال است
❌به معنی آزاد بودن اسپم در کانال است",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"اسپم [$spams]",'callback_data'=>"null"]],
[['text'=>"بازکردن اسپم❌",'callback_data'=>"unspam"],['text'=>"قفل اسپم✅",'callback_data'=>"lockspam"]],
[['text'=>"🔽تعداد ارسال پیام در 1 دقیقه🔽",'callback_data'=>"null"]],
[['text'=>"تنظیم اسپم➕",'callback_data'=>"setspaming"]],
[['text'=>"آپدیت♻️",'callback_data'=>"setspamd"]],
[['text'=>"↩️برگشت",'callback_data'=>"help"]]    	
],
])
]);
bot('answercallbackquery', [
'callback_query_id'=>$update->callback_query->id,
'text'=>"وضعیت قفل اسپم آپدیت شد✅", 
]);
}
if($data=='unspam' && $fromid == $admin) {
file_put_contents("data/lockspam.txt","❌");
bot('answercallbackquery', [
'callback_query_id'=>$update->callback_query->id,
'text'=>"قفل اسپم در کانال غیر فعال شد", 
]);
}
if($data=='lockspam' && $fromid == $admin) {
file_put_contents("data/lockspam.txt","✅");
bot('answercallbackquery', [
'callback_query_id'=>$update->callback_query->id,
'text'=>"قفل اسپم در کانال فعال شد", 
]);
}
if($data == 'wol' && $fromid == $admin) {
bot('editmessagetext',[
'chat_id'=>$chatid,
'message_id'=>$messageid,
'text'=>"لطفا دکمه مورد نظر خود را انتخاب نمایید",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"✅تنظیم کردن کانال",'callback_data'=>"wo"],['text'=>"کانال فعلی❓",'callback_data'=>"Linux"]],
[['text'=>"↩️برگشت",'callback_data'=>"help"]]    	
],
])
]);
}
if($data=='wo' && $fromid == $admin) {
 file_put_contents("Dade/setchannel.txt","set");
 bot('editmessagetext', [
 'chat_id'=>$chatid, 
'message_id'=>$messageid,
 'text'=>"لطفا یک پیام، از کانال مورد نظر خود به اینجا فوروارد کنید",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"↩️برگشت",'callback_data'=>"help"]]
],
])
]);
sleep(10);
bot('deleteMessage', [
'chat_id'=>$chatid, 
'message_id'=>$messageid, 
]);
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
elseif($setchnl == "set" && $update->message->forward_from_chat) {
if($data != 'help' && $from_id == $admin){
file_put_contents("Dade/setchannel.txt","none");
save("Dade/channelset.txt","$lexo");
save("Dade/co.txt","$lexos");
save("Dade/coj.txt","@$lexot");
bot('sendmessage', [
'chat_id'=>$chat_id, 
'text'=>"کانال :
@$lexot
$lexos
 $lexo
 تنظیم شد✅",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"↩️برگشت",'callback_data'=>"help"]]
],
])
]);
}
}
elseif($setchnl == "set" && !$update->message->forward_from_chat) {
if($data != 'help' && $from_id == $admin){
 file_put_contents("Dade/setchannel.txt","none");
 bot('sendmessage', [
 'chat_id'=>$chat_id, 
 'text'=>"لطفاً فقط فوروارد کنید!",
 'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"↩️برگشت",'callback_data'=>"help"]]
],
])
]);
sleep(10);
bot('deleteMessage', [
'chat_id'=>$chat_id, 
'message_id'=>$message_id, 
]);
}
}
if($data=='Linux' && $fromid == $admin) {
bot('editmessagetext', [
'chat_id'=>$chatid, 
'message_id'=>$messageid,
'text'=>"کانال تنظیم شده : 
$OKL
<code>$no</code>
<code>$mych</code>",
'parse_mode'=>html,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"↩️برگشت",'callback_data'=>"help"]]
],
])
]);
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
//------L------O------C------K------//
if($data=='addm' && $fromid == $admin){
bot('editmessagetext',[
'chat_id'=>$chatid,
'message_id'=>$messageid,
'text'=>"
تنظیمات کانال $no
  ✅ به معنای قفل بودن و حذف شدن آن در کانال است
❌ به معنی آزاد بودن و حذف نشدن در کانال است",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"قفل کانال [$lockch]",'callback_data'=>"null"]],
[['text'=>"بازکردن کانال❌",'callback_data'=>"unch"],['text'=>"قفل کانال✅",'callback_data'=>"lockch"]],
[['text'=>"قفل گیف [$gifs]",'callback_data'=>"null"]],
[['text'=>"بازکردن گیف❌",'callback_data'=>"ungif"],['text'=>"قفل گیف✅",'callback_data'=>"lockgif"]],
[['text'=>"قفل شماره [$num]",'callback_data'=>"null"]],
[['text'=>"بازکردن شماره❌",'callback_data'=>"unnum"],['text'=>"قفل شماره✅",'callback_data'=>"locknum"]],
[['text'=>"قفل فوروارد [$fwd]",'callback_data'=>"null"]],
[['text'=>"بازکردن فوروارد❌",'callback_data'=>"unfwd"],['text'=>"قفل فوروارد✅",'callback_data'=>"lockfwd"]],
[['text'=>"قفل ویدیو مسیج [$video_msg]",'callback_data'=>"null"]],
[['text'=>"بازکردن ویدیو مسیج❌",'callback_data'=>"unvideomsg"],['text'=>"قفل ویدیو مسیج✅",'callback_data'=>"lockvideomsg"]],
[['text'=>"قفل استیکر [$stick]",'callback_data'=>"null"]],
[['text'=>"بازکردن استیکر❌",'callback_data'=>"unstick"],['text'=>"قفل استیکر✅",'callback_data'=>"lockstick"]],
[['text'=>"قفل متن [$texts]",'callback_data'=>"null"]],
[['text'=>"بازکردن متن❌",'callback_data'=>"untext"],['text'=>"قفل متن✅",'callback_data'=>"locktext"]],
[['text'=>"قفل عکس [$add]",'callback_data'=>"null"]],
[['text'=>"بازکردن عکس❌",'callback_data'=>"unphoto"],['text'=>"قفل عکس✅",'callback_data'=>"lockphoto"]],
[['text'=>"قفل فیلم [$video]",'callback_data'=>"null"]],
[['text'=>"بازکردن فیلم❌",'callback_data'=>"unvoi"],['text'=>"قفل فیلم✅",'callback_data'=>"lockvoi"]],
[['text'=>"قفل فایل [$file]",'callback_data'=>"null"]],
[['text'=>"بازکردن فایل❌",'callback_data'=>"unfile"],['text'=>"قفل فایل✅",'callback_data'=>"lockfile"]],
[['text'=>"آپدیت♻️",'callback_data'=>"update"]],
[['text'=>"↩️برگشت",'callback_data'=>"help"]]
],
])
]);
}
if($data=='update' && $fromid == $admin){
bot('editmessagetext',[
'chat_id'=>$chatid,
'message_id'=>$messageid,
'text'=>"
تنظیمات قفل ها
  ✅ به معنای قفل بودن و حذف شدن آن در کانال است
❌ به معنی آزاد بودن و حذف نشدن در کانال است",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"قفل کانال [$lockch]",'callback_data'=>"null"]],
[['text'=>"بازکردن کانال❌",'callback_data'=>"unch"],['text'=>"قفل کانال✅",'callback_data'=>"lockch"]],
[['text'=>"قفل گیف [$gifs]",'callback_data'=>"null"]],
[['text'=>"بازکردن گیف❌",'callback_data'=>"ungif"],['text'=>"قفل گیف✅",'callback_data'=>"lockgif"]],
[['text'=>"قفل شماره [$num]",'callback_data'=>"null"]],
[['text'=>"بازکردن شماره❌",'callback_data'=>"unnum"],['text'=>"قفل شماره✅",'callback_data'=>"locknum"]],
[['text'=>"قفل فوروارد [$fwd]",'callback_data'=>"null"]],
[['text'=>"بازکردن فوروارد❌",'callback_data'=>"unfwd"],['text'=>"قفل فوروارد✅",'callback_data'=>"lockfwd"]],
[['text'=>"قفل ویدیو مسیج [$video_msg]",'callback_data'=>"null"]],
[['text'=>"بازکردن ویدیو مسیج❌",'callback_data'=>"unvideomsg"],['text'=>"قفل ویدیو مسیج✅",'callback_data'=>"lockvideomsg"]],
[['text'=>"قفل استیکر [$stick]",'callback_data'=>"null"]],
[['text'=>"بازکردن استیکر❌",'callback_data'=>"unstick"],['text'=>"قفل استیکر✅",'callback_data'=>"lockstick"]],
[['text'=>"قفل متن [$texts]",'callback_data'=>"null"]],
[['text'=>"بازکردن متن❌",'callback_data'=>"untext"],['text'=>"قفل متن✅",'callback_data'=>"locktext"]],
[['text'=>"قفل عکس [$add]",'callback_data'=>"null"]],
[['text'=>"بازکردن عکس❌",'callback_data'=>"unphoto"],['text'=>"قفل عکس✅",'callback_data'=>"lockphoto"]],
[['text'=>"قفل فیلم [$video]",'callback_data'=>"null"]],
[['text'=>"بازکردن فیلم❌",'callback_data'=>"unvoi"],['text'=>"قفل فیلم✅",'callback_data'=>"lockvoi"]],
[['text'=>"قفل فایل [$file]",'callback_data'=>"null"]],
[['text'=>"بازکردن فایل❌",'callback_data'=>"unfile"],['text'=>"قفل فایل✅",'callback_data'=>"lockfile"]],
[['text'=>"آپدیت♻️",'callback_data'=>"update"]],
[['text'=>"↩️برگشت",'callback_data'=>"help"]]
],
])
]);
bot('answercallbackquery', [
'callback_query_id'=>$update->callback_query->id, 
'text'=>"وضعیت قفل ها طبق وضعیت فعلی آپدیت شد✅", 
]);
}
if($data=='lockfile' && $fromid == $admin) {
file_put_contents("Dade/file.txt","✅");
bot('answercallbackquery', [
'callback_query_id'=>$update->callback_query->id, 
'text'=>"قفل فایل با موفقیت فعال شد✅", 
]);
}
if($data=='unfile' && $fromid == $admin) {
file_put_contents("Dade/file.txt","❌");
bot('answercallbackquery', [
'callback_query_id'=>$update->callback_query->id, 
'text'=>"قفل فایل با موفقیت غیرفعال شد❌", 
]);
}
if($data=='lockvoi' && $fromid == $admin) {
file_put_contents("Dade/video.txt","✅");
bot('answercallbackquery', [
'callback_query_id'=>$update->callback_query->id, 
'text'=>"قفل فیلم با موفقیت فعال شد✅", 
]);
}
if($data=='unvoi' && $fromid == $admin) {
file_put_contents("Dade/video.txt","❌");
bot('answercallbackquery', [
'callback_query_id'=>$update->callback_query->id, 
'text'=>"قفل فیلم با موفقیت غیرفعال شد❌", 
]);
}
if($data=='lockphoto' && $fromid == $admin) {
file_put_contents("Dade/aadmin.txt","✅");
bot('answercallbackquery', [
'callback_query_id'=>$update->callback_query->id, 
'text'=>"قفل عکس با موفقیت فعال شد✅", 
]);
}
if($data=='unphoto' && $fromid == $admin) {
file_put_contents("Dade/aadmin.txt","❌");
bot('answercallbackquery', [
'callback_query_id'=>$update->callback_query->id, 
'text'=>"قفل عکس با موفقیت غیرفعال شد❌", 
]);
}
if($data=='locktext' && $fromid == $admin) {
file_put_contents("Dade/text.txt","✅");
bot('answercallbackquery', [
'callback_query_id'=>$update->callback_query->id, 
'text'=>"قفل متن با موفقیت فعال شد✅", 
]);
}
if($data=='untext' && $fromid == $admin) {
file_put_contents("Dade/text.txt","❌");
bot('answercallbackquery', [
'callback_query_id'=>$update->callback_query->id, 
'text'=>"قفل متن با موفقیت غیرفعال شد❌", 
]);
}
if($data=='lockvideomsg' && $fromid == $admin) {
file_put_contents("Dade/video_msg.txt","✅");
bot('answercallbackquery', [
'callback_query_id'=>$update->callback_query->id, 
'text'=>"قفل ویدیو مسیج با موفقیت فعال شد✅", 
]);
}
if($data=='unvideomsg' && $fromid == $admin) {
file_put_contents("Dade/video_msg.txt","❌");
bot('answercallbackquery', [
'callback_query_id'=>$update->callback_query->id, 
'text'=>"قفل ویدیو مسیج با موفقیت غیرفعال شد❌", 
]);
}
if($data=='lockfwd' && $fromid == $admin) {
file_put_contents("Dade/fwd.txt","✅");
bot('answercallbackquery', [
'callback_query_id'=>$update->callback_query->id, 
'text'=>"قفل فوروارد با موفقیت فعال شد✅", 
]);
}
if($data=='unfwd' && $fromid == $admin) {
file_put_contents("Dade/fwd.txt","❌");
bot('answercallbackquery', [
'callback_query_id'=>$update->callback_query->id, 
'text'=>"قفل فوروارد با موفقیت غیرفعال شد❌", 
]);
}
if($data=='locknum' && $fromid == $admin) {
file_put_contents("Dade/num.txt","✅");
bot('answercallbackquery', [
'callback_query_id'=>$update->callback_query->id, 
'text'=>"قفل شماره با موفقیت فعال شد✅", 
]);
}
if($data=='unnum' && $fromid == $admin) {
file_put_contents("Dade/num.txt","❌");
bot('answercallbackquery', [
'callback_query_id'=>$update->callback_query->id, 
'text'=>"قفل شماره با موفقیت غیرفعال شد❌", 
]);
}
if($data=='lockgif' && $fromid == $admin) {
file_put_contents("Dade/gifs.txt","✅");
bot('answercallbackquery', [
'callback_query_id'=>$update->callback_query->id, 
'text'=>"قفل گیف با موفقیت فعال شد✅", 
]);
}
if($data=='ungif' && $fromid == $admin) {
file_put_contents("Dade/gifs.txt","❌");
bot('answercallbackquery', [
'callback_query_id'=>$update->callback_query->id, 
'text'=>"قفل گیف با موفقیت غیرفعال شد❌", 
]);
}
if($data=='lockstick' && $fromid == $admin) {
file_put_contents("Dade/stick.txt","✅");
bot('answercallbackquery', [
'callback_query_id'=>$update->callback_query->id, 
'text'=>"قفل استیکر با موفقیت فعال شد✅", 
]);
}
if($data=='unstick' && $fromid == $admin) {
file_put_contents("Dade/stick.txt","❌");
bot('answercallbackquery', [
'callback_query_id'=>$update->callback_query->id, 
'text'=>"قفل استیکر با موفقیت غیرفعال شد❌", 
]);
}
if($data=='lockch' && $fromid == $admin) {
file_put_contents("Dade/locking.txt","✅");
bot('answercallbackquery', [
'callback_query_id'=>$update->callback_query->id, 
'text'=>"قفل کانال با موفقیت فعال شد✅", 
]);
}
if($data=='unch' && $fromid == $admin) {
file_put_contents("Dade/locking.txt","❌");
bot('answercallbackquery', [
'callback_query_id'=>$update->callback_query->id, 
'text'=>"قفل کانال با موفقیت غیرفعال شد❌", 
]);
}
elseif($lockch == "✅" && $lockchn) {
bot('deleteMessage', [
'chat_id'=>$Channel, 
'message_id'=>$channel_message_id,
]);
}	
elseif($gifs == "✅" && $gif_channel) {
bot('deleteMessage', [
'chat_id'=>$Channel, 
'message_id'=>$channel_message_id,
]);
}	
elseif($num == "✅" && $contact) {
bot('deleteMessage', [
'chat_id'=>$Channel, 
'message_id'=>$channel_message_id,
]);
}	
elseif($fwd == "✅" && $forward_channel) {
bot('deleteMessage', [
'chat_id'=>$Channel, 
'message_id'=>$channel_message_id,
]);
}	
elseif($video_msg == "✅" && $video_note_channel) {
bot('deleteMessage', [
'chat_id'=>$Channel, 
'message_id'=>$channel_message_id,
]);
}	
elseif($stick == "✅" && $sticker_channel) {
bot('deleteMessage', [
'chat_id'=>$Channel, 
'message_id'=>$channel_message_id,
]);
}				
elseif($add == "✅" && $photo_channel) {
bot('deleteMessage', [
'chat_id'=>$Channel, 
'message_id'=>$channel_message_id,
]);
}	
elseif($texts == "✅" && $text_channel) {
bot('deleteMessage', [
'chat_id'=>$Channel, 
'message_id'=>$channel_message_id,
]);
}	
elseif($video == "✅" && $video_channel) {
bot('deleteMessage', [
'chat_id'=>$Channel, 
'message_id'=>$channel_message_id,
]);
}	
elseif($file == "✅" && $file_channel) {
bot('deleteMessage', [
'chat_id'=>$Channel, 
'message_id'=>$channel_message_id,
]);
}	
if($data=='addo' && $fromid == $admin){
bot('editmessagetext',[
'chat_id'=>$chatid,
'message_id'=>$messageid,
'text'=>"دکمه مورد نظر خود را انتخاب نمایید",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"افزودن ادمین❇️",'callback_data'=>"add"],['text'=>"حذف ادمین⛔",'callback_data'=>"deladd"]],
[['text'=>"↩️برگشت",'callback_data'=>"help"]]
],
])
]);
}
if($data=='add' && $fromid == $admin){
file_put_contents("Dade/admin.txt","administrator");
bot('editmessagetext',[
'chat_id'=>$chatid,
'message_id'=>$messageid,
'text'=>"پیامی از کاربر مورد نظر فوروارد کنید.",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"↩️برگشت",'callback_data'=>"help"]]
],
])
]);
sleep(10);
bot('deleteMessage', [
'chat_id'=>$chatid, 
'message_id'=>$messageid, 
]);
}
elseif($addm == "administrator" && $update->message->forward_from){
if($data != 'help' && $from_id == $admin){
file_put_contents("Dade/admin.txt","none");
bot('promoteChatMember', [
'chat_id'=>$mych,
'user_id'=>$update->message->forward_from->id,
'can_post_messages'=>true,
]);
bot('sendmessage', [
'chat_id'=>$chat_id, 
'text'=>"کاربر : <a href='tg://user?id=$lex'>$lex</a>
با موفقیت ادمین کانال شد✅",
'parse_mode'=>'HTML',
]);
}}
elseif($addm == "administrator" && !$update->message->forward_from){
if($data != 'help' && $from_id == $admin){
bot('sendmessage', [
'chat_id'=>$chat_id, 
'text'=>"لطفاً فقط فوروارد کنید!",
]);
sleep(10);
bot('deleteMessage', [
'chat_id'=>$chat_id, 
'message_id'=>$message_id, 
]);
}}
if($data=='deladd' && $fromid == $admin){
file_put_contents("Dade/admin.txt","deladministrator");
bot('editmessagetext',[
'chat_id'=>$chatid,
'message_id'=>$messageid,
'text'=>"پیامی از کاربر مورد نظر فوروارد کنید.",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"↩️برگشت",'callback_data'=>"help"]]
],
])
]);
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
sleep(10);
bot('deleteMessage', [
'chat_id'=>$chatid, 
'message_id'=>$messageid, 
]);
}
elseif($addm == "deladministrator" && $update->message->forward_from){
if($data != 'help' && $from_id == $admin){
file_put_contents("Dade/admin.txt","none");
bot('promoteChatMember', [
'chat_id'=>$mych,
'user_id'=>$update->message->forward_from->id,
'can_post_messages'=>false,
]);
bot('sendmessage', [
'chat_id'=>$chat_id, 
'text'=>"کاربر : <a href='tg://user?id=$lex'>$lex</a>
با موفقیت از ادمینی برکنار شد✅",
'parse_mode'=>'HTML',
]);
}}
elseif($addm == "deladministrator" && !$update->message->forward_from){
if($data != 'help' && $from_id == $admin){
bot('sendmessage', [
'chat_id'=>$chat_id, 
'text'=>"لطفاً فقط فوروارد کنید!",
]);
sleep(10);
bot('deleteMessage', [
'chat_id'=>$chat_id, 
'message_id'=>$message_id, 
]);
}}
$timing = date("1i");
$timing = str_replace("am","",$timing);
$timing = str_replace("pm","",$timing);
$metti_khan = file_get_contents("check/$timing-$id.txt");
$timing_spam = $metti_khan+1;
file_put_contents("check/$timing-$id.txt","$timing_spam");
$metti_khan2 = file_get_contents("check/$timing-$id.txt");
if($channel_id == $mych) {
if($spams == "✅"){
if($id != $admin){
if($update->channel_post && $metti_khan2 >= $max_flood){
if($max_flood == 1){
$promoteChatMember=bot('promoteChatMember',[
'chat_id'=>$mych,
'user_id'=>$id,
'can_change_info'=>false,
'can_post_messages'=>false,
'can_edit_messages'=>false,
'can_delete_messages'=>false,
'can_invite_users'=>false,
'can_restrict_members'=>false,
'can_pin_messages'=>false,
'can_promote_members'=>false,	
]);
if($promoteChatMember->ok =='true'){
bot('deleteMessage', [
'chat_id'=>$mych, 
'message_id'=>$channel_message_id, 
]);
for($G=$metti_khan2; $G <= $max_flood; $G++ ){
bot('deleteMessage', [
'chat_id'=>$mych, 
'message_id'=>$channel_message_id, 
]);
save("Dade/adagin.txt","$id");
bot('sendmessage',[
'chat_id'=>$id,
'text'=>"کاربر : [$author_signature](tg://user?id=$id) به دلیل اسپم در کانال عزل شدید!", 
'parse_mode'=>markdown, 
]);
bot('sendmessage',[
'chat_id'=>$admin,
'text'=>"ادمین گرامی 
 کاربر [$author_signature](tg://user?id=$id) به دلیل اسپم کردن در کانال محدود شد",
'parse_mode'=>markdown, 
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"⛔️ حذف از کانال",'callback_data'=>"sicch"],['text'=>"✅ بازگردانی",'callback_data'=>"agadd"]],
],
])
]);
}}else{  
bot('sendmessage',[
'chat_id'=>$admin,
'text'=>"خطایی رخ داده! 
من نمیتونم کاربر : [$author_signature](tg://user?id=$id) را از ادمینی خارج کنم! 
دلایل ممکن : 
من دسترسی به افزودن ادمین ندارم❌
من اونو ادمین نکردم❌",
'parse_mode'=>markdown, 
]);
}}}}}} 
if($channel_id == $mych) {
if($spams == "✅"){
if($id != $admin){
if($update->channel_post && $metti_khan2 >= $max_flood){
if($max_flood == 2){
$promoteChatMember=bot('promoteChatMember',[
'chat_id'=>$mych,
'user_id'=>$id,
'can_change_info'=>false,
'can_post_messages'=>false,
'can_edit_messages'=>false,
'can_delete_messages'=>false,
'can_invite_users'=>false,
'can_restrict_members'=>false,
'can_pin_messages'=>false,
'can_promote_members'=>false,	
]);
if($promoteChatMember->ok =='true'){
bot('deleteMessage', [
'chat_id'=>$mych, 
'message_id'=>$channel_message_id, 
]);
bot('deleteMessage', [
'chat_id'=>$mych, 
'message_id'=>$channel_message_id-1, 
]);
for($G=$metti_khan2; $G <= $max_flood; $G++ ){
bot('deleteMessage', [
'chat_id'=>$mych, 
'message_id'=>$channel_message_id, 
]);
save("Dade/adagin.txt","$id");
bot('sendmessage',[
'chat_id'=>$id,
'text'=>"کاربر : [$author_signature](tg://user?id=$id) به دلیل اسپم در کانال عزل شدید!", 
'parse_mode'=>markdown, 
]);
bot('sendmessage',[
'chat_id'=>$admin,
'text'=>"ادمین گرامی 
 کاربر [$author_signature](tg://user?id=$id) به دلیل اسپم کردن در کانال محدود شد",
'parse_mode'=>markdown, 
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"⛔️ حذف از کانال",'callback_data'=>"sicch"],['text'=>"✅ بازگردانی",'callback_data'=>"agadd"]],
],
])
]);
}}else{  
bot('sendmessage',[
'chat_id'=>$admin,
'text'=>"خطایی رخ داده! 
من نمیتونم کاربر : [$author_signature](tg://user?id=$id) را از ادمینی خارج کنم! 
دلایل ممکن : 
من دسترسی به افزودن ادمین ندارم❌
من اونو ادمین نکردم❌",
'parse_mode'=>markdown, 
]);
}}}}} }
if($channel_id == $mych) {
if($spams == "✅"){
if($id != $admin){
if($update->channel_post && $metti_khan2 >= $max_flood){
if($max_flood == 3){
$promoteChatMember=bot('promoteChatMember',[
'chat_id'=>$mych,
'user_id'=>$id,
'can_change_info'=>false,
'can_post_messages'=>false,
'can_edit_messages'=>false,
'can_delete_messages'=>false,
'can_invite_users'=>false,
'can_restrict_members'=>false,
'can_pin_messages'=>false,
'can_promote_members'=>false,	
]);
if($promoteChatMember->ok =='true'){
bot('deleteMessage', [
'chat_id'=>$mych, 
'message_id'=>$channel_message_id, 
]);
bot('deleteMessage', [
'chat_id'=>$mych, 
'message_id'=>$channel_message_id-1, 
]);
bot('deleteMessage', [
'chat_id'=>$mych, 
'message_id'=>$channel_message_id-2, 
]);
for($G=$metti_khan2; $G <= $max_flood; $G++ ){
bot('deleteMessage', [
'chat_id'=>$mych, 
'message_id'=>$channel_message_id, 
]);
save("Dade/adagin.txt","$id");
bot('sendmessage',[
'chat_id'=>$id,
'text'=>"کاربر : [$author_signature](tg://user?id=$id) به دلیل اسپم در کانال عزل شدید!", 
'parse_mode'=>markdown, 
]);
bot('sendmessage',[
'chat_id'=>$admin,
'text'=>"ادمین گرامی 
 کاربر [$author_signature](tg://user?id=$id) به دلیل اسپم کردن در کانال محدود شد",
'parse_mode'=>markdown, 
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"⛔️ حذف از کانال",'callback_data'=>"sicch"],['text'=>"✅ بازگردانی",'callback_data'=>"agadd"]],
],
])
]);
}}else{  
bot('sendmessage',[
'chat_id'=>$admin,
'text'=>"خطایی رخ داده! 
من نمیتونم کاربر : [$author_signature](tg://user?id=$id) را از ادمینی خارج کنم! 
دلایل ممکن : 
من دسترسی به افزودن ادمین ندارم❌
من اونو ادمین نکردم❌",
'parse_mode'=>markdown, 
]);
}}}}} }if($spams == "✅"){
if($spams == "✅"){
if($id != $admin){
if($update->channel_post && $metti_khan2 >= $max_flood){
if($max_flood == 4){
$promoteChatMember=bot('promoteChatMember',[
'chat_id'=>$mych,
'user_id'=>$id,
'can_change_info'=>false,
'can_post_messages'=>false,
'can_edit_messages'=>false,
'can_delete_messages'=>false,
'can_invite_users'=>false,
'can_restrict_members'=>false,
'can_pin_messages'=>false,
'can_promote_members'=>false,	
]);
if($promoteChatMember->ok =='true'){
bot('deleteMessage', [
'chat_id'=>$mych, 
'message_id'=>$channel_message_id, 
]);
bot('deleteMessage', [
'chat_id'=>$mych, 
'message_id'=>$channel_message_id-1, 
]);
bot('deleteMessage', [
'chat_id'=>$mych, 
'message_id'=>$channel_message_id-2, 
]);
bot('deleteMessage', [
'chat_id'=>$mych, 
'message_id'=>$channel_message_id-3, 
]);
for($G=$metti_khan2; $G <= $max_flood; $G++ ){
bot('deleteMessage', [
'chat_id'=>$mych, 
'message_id'=>$channel_message_id, 
]);
save("Dade/adagin.txt","$id");
bot('sendmessage',[
'chat_id'=>$id,
'text'=>"کاربر : [$author_signature](tg://user?id=$id) به دلیل اسپم در کانال عزل شدید!", 
'parse_mode'=>markdown, 
]);
bot('sendmessage',[
'chat_id'=>$admin,
'text'=>"ادمین گرامی 
 کاربر [$author_signature](tg://user?id=$id) به دلیل اسپم کردن در کانال محدود شد",
'parse_mode'=>markdown, 
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"⛔️ حذف از کانال",'callback_data'=>"sicch"],['text'=>"✅ بازگردانی",'callback_data'=>"agadd"]],
],
])
]);
}} else{  
bot('sendmessage',[
'chat_id'=>$admin,
'text'=>"خطایی رخ داده! 
من نمیتونم کاربر : [$author_signature](tg://user?id=$id) را از ادمینی خارج کنم! 
دلایل ممکن : 
من دسترسی به افزودن ادمین ندارم❌
من اونو ادمین نکردم❌",
'parse_mode'=>markdown, 
]);
}}}}} }if($channel_id == $mych) {
if($spams == "✅"){
if($id != $admin){
if($update->channel_post && $metti_khan2 >= $max_flood){
if($max_flood == 5){
$promoteChatMember=bot('promoteChatMember',[
'chat_id'=>$mych,
'user_id'=>$id,
'can_change_info'=>false,
'can_post_messages'=>false,
'can_edit_messages'=>false,
'can_delete_messages'=>false,
'can_invite_users'=>false,
'can_restrict_members'=>false,
'can_pin_messages'=>false,
'can_promote_members'=>false,	
]);
if($promoteChatMember->ok =='true'){
bot('deleteMessage', [
'chat_id'=>$mych, 
'message_id'=>$channel_message_id, 
]);
bot('deleteMessage', [
'chat_id'=>$mych, 
'message_id'=>$channel_message_id-1, 
]);
bot('deleteMessage', [
'chat_id'=>$mych, 
'message_id'=>$channel_message_id-2, 
]);
bot('deleteMessage', [
'chat_id'=>$mych, 
'message_id'=>$channel_message_id-3, 
]);
bot('deleteMessage', [
'chat_id'=>$mych, 
'message_id'=>$channel_message_id-4, 
]);
for($G=$metti_khan2; $G <= $max_flood; $G++ ){
bot('deleteMessage', [
'chat_id'=>$mych, 
'message_id'=>$channel_message_id, 
]);
save("Dade/adagin.txt","$id");
bot('sendmessage',[
'chat_id'=>$id,
'text'=>"کاربر : [$author_signature](tg://user?id=$id) به دلیل اسپم در کانال عزل شدید!", 
'parse_mode'=>markdown, 
]);
bot('sendmessage',[
'chat_id'=>$admin,
'text'=>"ادمین گرامی 
 کاربر [$author_signature](tg://user?id=$id) به دلیل اسپم کردن در کانال محدود شد",
'parse_mode'=>markdown, 
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"⛔️ حذف از کانال",'callback_data'=>"sicch"],['text'=>"✅ بازگردانی",'callback_data'=>"agadd"]],
],
])
]);
}} else{  
bot('sendmessage',[
'chat_id'=>$admin,
'text'=>"خطایی رخ داده! 
من نمیتونم کاربر : [$author_signature](tg://user?id=$id) را از ادمینی خارج کنم! 
دلایل ممکن : 
من دسترسی به افزودن ادمین ندارم❌
من اونو ادمین نکردم❌",
'parse_mode'=>markdown, 
]);
}}}}} }if($channel_id == $mych) {
if($spams == "✅"){
if($id != $admin){
if($update->channel_post && $metti_khan2 >= $max_flood){
if($max_flood == 6){
$promoteChatMember=bot('promoteChatMember',[
'chat_id'=>$mych,
'user_id'=>$id,
'can_change_info'=>false,
'can_post_messages'=>false,
'can_edit_messages'=>false,
'can_delete_messages'=>false,
'can_invite_users'=>false,
'can_restrict_members'=>false,
'can_pin_messages'=>false,
'can_promote_members'=>false,	
]);
if($promoteChatMember->ok =='true'){
bot('deleteMessage', [
'chat_id'=>$mych, 
'message_id'=>$channel_message_id, 
]);
bot('deleteMessage', [
'chat_id'=>$mych, 
'message_id'=>$channel_message_id-1, 
]);
bot('deleteMessage', [
'chat_id'=>$mych, 
'message_id'=>$channel_message_id-2, 
]);
bot('deleteMessage', [
'chat_id'=>$mych, 
'message_id'=>$channel_message_id-3, 
]);
bot('deleteMessage', [
'chat_id'=>$mych, 
'message_id'=>$channel_message_id-4, 
]);
bot('deleteMessage', [
'chat_id'=>$mych, 
'message_id'=>$channel_message_id-5, 
]);
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
for($G=$metti_khan2; $G <= $max_flood; $G++ ){
bot('deleteMessage', [
'chat_id'=>$mych, 
'message_id'=>$channel_message_id, 
]);
save("Dade/adagin.txt","$id");
bot('sendmessage',[
'chat_id'=>$id,
'text'=>"کاربر : [$author_signature](tg://user?id=$id) به دلیل اسپم در کانال عزل شدید!", 
'parse_mode'=>markdown, 
]);
bot('sendmessage',[
'chat_id'=>$admin,
'text'=>"ادمین گرامی 
 کاربر [$author_signature](tg://user?id=$id) به دلیل اسپم کردن در کانال محدود شد",
'parse_mode'=>markdown, 
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"⛔️ حذف از کانال",'callback_data'=>"sicch"],['text'=>"✅ بازگردانی",'callback_data'=>"agadd"]],
],
])
]);
}} else{  
bot('sendmessage',[
'chat_id'=>$admin,
'text'=>"خطایی رخ داده! 
من نمیتونم کاربر : [$author_signature](tg://user?id=$id) را از ادمینی خارج کنم! 
دلایل ممکن : 
من دسترسی به افزودن ادمین ندارم❌
من اونو ادمین نکردم❌",
'parse_mode'=>markdown, 
]);
}}}}} }if($channel_id == $mych) {
if($spams == "✅"){
if($id != $admin){
if($update->channel_post && $metti_khan2 >= $max_flood){
if($max_flood == 7){
$promoteChatMember=bot('promoteChatMember',[
'chat_id'=>$mych,
'user_id'=>$id,
'can_change_info'=>false,
'can_post_messages'=>false,
'can_edit_messages'=>false,
'can_delete_messages'=>false,
'can_invite_users'=>false,
'can_restrict_members'=>false,
'can_pin_messages'=>false,
'can_promote_members'=>false,	
]);
if($promoteChatMember->ok =='true'){
bot('deleteMessage', [
'chat_id'=>$mych, 
'message_id'=>$channel_message_id, 
]);
bot('deleteMessage', [
'chat_id'=>$mych, 
'message_id'=>$channel_message_id-1, 
]);
bot('deleteMessage', [
'chat_id'=>$mych, 
'message_id'=>$channel_message_id-2, 
]);
bot('deleteMessage', [
'chat_id'=>$mych, 
'message_id'=>$channel_message_id-3, 
]);
bot('deleteMessage', [
'chat_id'=>$mych, 
'message_id'=>$channel_message_id-4, 
]);
bot('deleteMessage', [
'chat_id'=>$mych, 
'message_id'=>$channel_message_id-5, 
]);
bot('deleteMessage', [
'chat_id'=>$mych, 
'message_id'=>$channel_message_id-6, 
]);
for($G=$metti_khan2; $G <= $max_flood; $G++ ){
bot('deleteMessage', [
'chat_id'=>$mych, 
'message_id'=>$channel_message_id, 
]);
save("Dade/adagin.txt","$id");
bot('sendmessage',[
'chat_id'=>$id,
'text'=>"کاربر : [$author_signature](tg://user?id=$id) به دلیل اسپم در کانال عزل شدید!", 
'parse_mode'=>markdown, 
]);
bot('sendmessage',[
'chat_id'=>$admin,
'text'=>"ادمین گرامی 
 کاربر [$author_signature](tg://user?id=$id) به دلیل اسپم کردن در کانال محدود شد",
'parse_mode'=>markdown, 
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"⛔️ حذف از کانال",'callback_data'=>"sicch"],['text'=>"✅ بازگردانی",'callback_data'=>"agadd"]],
],
])
]);
}} else{  
bot('sendmessage',[
'chat_id'=>$admin,
'text'=>"خطایی رخ داده! 
من نمیتونم کاربر : [$author_signature](tg://user?id=$id) را از ادمینی خارج کنم! 
دلایل ممکن : 
من دسترسی به افزودن ادمین ندارم❌
من اونو ادمین نکردم❌",
'parse_mode'=>markdown, 
]);
}}}}} }if($channel_id == $mych) {
if($spams == "✅"){
if($id != $admin){
if($update->channel_post && $metti_khan2 >= $max_flood){
if($max_flood == 8){
$promoteChatMember=bot('promoteChatMember',[
'chat_id'=>$mych,
'user_id'=>$id,
'can_change_info'=>false,
'can_post_messages'=>false,
'can_edit_messages'=>false,
'can_delete_messages'=>false,
'can_invite_users'=>false,
'can_restrict_members'=>false,
'can_pin_messages'=>false,
'can_promote_members'=>false,	
]);
if($promoteChatMember->ok =='true'){
bot('deleteMessage', [
'chat_id'=>$mych, 
'message_id'=>$channel_message_id, 
]);
bot('deleteMessage', [
'chat_id'=>$mych, 
'message_id'=>$channel_message_id-1, 
]);
bot('deleteMessage', [
'chat_id'=>$mych, 
'message_id'=>$channel_message_id-2, 
]);
bot('deleteMessage', [
'chat_id'=>$mych, 
'message_id'=>$channel_message_id-3, 
]);
bot('deleteMessage', [
'chat_id'=>$mych, 
'message_id'=>$channel_message_id-4, 
]);
bot('deleteMessage', [
'chat_id'=>$mych, 
'message_id'=>$channel_message_id-5, 
]);
bot('deleteMessage', [
'chat_id'=>$mych, 
'message_id'=>$channel_message_id-6, 
]);
bot('deleteMessage', [
'chat_id'=>$mych, 
'message_id'=>$channel_message_id-7, 
]);
for($G=$metti_khan2; $G <= $max_flood; $G++ ){
bot('deleteMessage', [
'chat_id'=>$mych, 
'message_id'=>$channel_message_id, 
]);
  save("Dade/adagin.txt","$id");
bot('sendmessage',[
'chat_id'=>$id,
'text'=>"کاربر : [$author_signature](tg://user?id=$id) به دلیل اسپم در کانال عزل شدید!", 
'parse_mode'=>markdown, 
]);
bot('sendmessage',[
'chat_id'=>$admin,
'text'=>"ادمین گرامی 
 کاربر [$author_signature](tg://user?id=$id) به دلیل اسپم کردن در کانال محدود شد",
'parse_mode'=>markdown, 
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"⛔️ حذف از کانال",'callback_data'=>"sicch"],['text'=>"✅ بازگردانی",'callback_data'=>"agadd"]],
],
])
]);
}} else{  
bot('sendmessage',[
'chat_id'=>$admin,
'text'=>"خطایی رخ داده! 
من نمیتونم کاربر : [$author_signature](tg://user?id=$id) را از ادمینی خارج کنم! 
دلایل ممکن : 
من دسترسی به افزودن ادمین ندارم❌
من اونو ادمین نکردم❌",
'parse_mode'=>markdown, 
]);
}}}}} }if($channel_id == $mych) {
if($spams == "✅"){
if($id != $admin){
if($update->channel_post && $metti_khan2 >= $max_flood){
if($max_flood == 9){
$promoteChatMember=bot('promoteChatMember',[
'chat_id'=>$mych,
'user_id'=>$id,
'can_change_info'=>false,
'can_post_messages'=>false,
'can_edit_messages'=>false,
'can_delete_messages'=>false,
'can_invite_users'=>false,
'can_restrict_members'=>false,
'can_pin_messages'=>false,
'can_promote_members'=>false,	
]);
if($promoteChatMember->ok =='true'){
bot('deleteMessage', [
'chat_id'=>$mych, 
'message_id'=>$channel_message_id, 
]);
bot('deleteMessage', [
'chat_id'=>$mych, 
'message_id'=>$channel_message_id-1, 
]);
bot('deleteMessage', [
'chat_id'=>$mych, 
'message_id'=>$channel_message_id-2, 
]);
bot('deleteMessage', [
'chat_id'=>$mych, 
'message_id'=>$channel_message_id-3, 
]);
bot('deleteMessage', [
'chat_id'=>$mych, 
'message_id'=>$channel_message_id-4, 
]);
bot('deleteMessage', [
'chat_id'=>$mych, 
'message_id'=>$channel_message_id-5, 
]);
bot('deleteMessage', [
'chat_id'=>$mych, 
'message_id'=>$channel_message_id-6, 
]);
bot('deleteMessage', [
'chat_id'=>$mych, 
'message_id'=>$channel_message_id-7, 
]);
bot('deleteMessage', [
'chat_id'=>$mych, 
'message_id'=>$channel_message_id-8, 
]);
for($G=$metti_khan2; $G <= $max_flood; $G++ ){
bot('deleteMessage', [
'chat_id'=>$mych, 
'message_id'=>$channel_message_id, 
]);
save("Dade/adagin.txt","$id");
bot('sendmessage',[
'chat_id'=>$id,
'text'=>"کاربر : [$author_signature](tg://user?id=$id) به دلیل اسپم در کانال عزل شدید!", 
'parse_mode'=>markdown, 
]);
bot('sendmessage',[
'chat_id'=>$admin,
'text'=>"ادمین گرامی 
 کاربر [$author_signature](tg://user?id=$id) به دلیل اسپم کردن در کانال محدود شد",
'parse_mode'=>markdown, 
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"⛔️ حذف از کانال",'callback_data'=>"sicch"],['text'=>"✅ بازگردانی",'callback_data'=>"agadd"]],
],
])
]);
}} else{  
bot('sendmessage',[
'chat_id'=>$admin,
'text'=>"خطایی رخ داده! 
من نمیتونم کاربر : [$author_signature](tg://user?id=$id) را از ادمینی خارج کنم! 
دلایل ممکن : 
من دسترسی به افزودن ادمین ندارم❌
من اونو ادمین نکردم❌",
'parse_mode'=>markdown, 
]);
}}}}} }if($channel_id == $mych) {
if($spams == "✅"){
if($id != $admin){
if($update->channel_post && $metti_khan2 >= $max_flood){
if($max_flood == 10){
$promoteChatMember=bot('promoteChatMember',[
'chat_id'=>$mych,
'user_id'=>$id,
'can_change_info'=>false,
'can_post_messages'=>false,
'can_edit_messages'=>false,
'can_delete_messages'=>false,
'can_invite_users'=>false,
'can_restrict_members'=>false,
'can_pin_messages'=>false,
'can_promote_members'=>false,	
]);
if($promoteChatMember->ok =='true'){
bot('deleteMessage', [
'chat_id'=>$mych, 
'message_id'=>$channel_message_id, 
]);
bot('deleteMessage', [
'chat_id'=>$mych, 
'message_id'=>$channel_message_id-1, 
]);
bot('deleteMessage', [
'chat_id'=>$mych, 
'message_id'=>$channel_message_id-2, 
]);
bot('deleteMessage', [
'chat_id'=>$mych, 
'message_id'=>$channel_message_id-3, 
]);
bot('deleteMessage', [
'chat_id'=>$mych, 
'message_id'=>$channel_message_id-4, 
]);
bot('deleteMessage', [
'chat_id'=>$mych, 
'message_id'=>$channel_message_id-5, 
]);
bot('deleteMessage', [
'chat_id'=>$mych, 
'message_id'=>$channel_message_id-6, 
]);
bot('deleteMessage', [
'chat_id'=>$mych, 
'message_id'=>$channel_message_id-7, 
]);
bot('deleteMessage', [
'chat_id'=>$mych, 
'message_id'=>$channel_message_id-8, 
]);
bot('deleteMessage', [
'chat_id'=>$mych, 
'message_id'=>$channel_message_id-9, 
]);
for($G=$metti_khan2; $G <= $max_flood; $G++ ){
bot('deleteMessage', [
'chat_id'=>$mych, 
'message_id'=>$channel_message_id, 
]);
save("Dade/adagin.txt","$id");
bot('sendmessage',[
'chat_id'=>$id,
'text'=>"کاربر : [$author_signature](tg://user?id=$id) به دلیل اسپم در کانال عزل شدید!", 
'parse_mode'=>markdown, 
]);
bot('sendmessage',[
'chat_id'=>$admin,
'text'=>"ادمین گرامی 
 کاربر [$author_signature](tg://user?id=$id) به دلیل اسپم کردن در کانال محدود شد",
'parse_mode'=>markdown, 
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"⛔️ حذف از کانال",'callback_data'=>"sicch"],['text'=>"✅ بازگردانی",'callback_data'=>"agadd"]],
],
])
]);
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
}} else{  
bot('sendmessage',[
'chat_id'=>$admin,
'text'=>"خطایی رخ داده! 
من نمیتونم کاربر : [$author_signature](tg://user?id=$id) را از ادمینی خارج کنم! 
دلایل ممکن : 
من دسترسی به افزودن ادمین ندارم❌
من اونو ادمین نکردم❌",
'parse_mode'=>markdown, 
]);
}}}}} }
$Lordam = file_get_contents("Dade/adagin.txt");
if($data=='agadd') {
bot('promoteChatMember', [
'chat_id'=>$mych,
'user_id'=>$Lordam,
'can_post_messages'=>true, 
]);
bot('answercallbackquery', [
'callback_query_id'=>$update->callback_query->id, 
'text'=>"با موفقیت ادمین شد✅",
]);
bot('deleteMessage', [
'chat_id'=>$chatid, 
'message_id'=>$messageid, 
]);
}
$Lordam = file_get_contents("Dade/adagin.txt");
if($data=='sicch') {
bot('KickChatMember', [
'chat_id'=>$mych,
'user_id'=>$Lordam,
]);
bot('answercallbackquery', [
'callback_query_id'=>$update->callback_query->id, 
'text'=>"کاربر از کانال اخراج شد⛔",
]);
bot('deleteMessage', [
'chat_id'=>$chatid, 
'message_id'=>$messageid, 
]);
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
?>
