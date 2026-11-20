<?php
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
error_reporting(0);
$day = (2505600 - (time() - filectime('Mahdy'))) / 60 / 60 / 24;
$day = round($day, 0);
define('API_KEY',"[*[TOKEN]*]");
function Cristal_Team($method,$datas=[]){
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
function SendMessage($chatid,$text,$parsmde,$disable_web_page_preview,$keyboard){
Cristal_Team('sendMessage',[
'chat_id'=>$chatid,
'text'=>$text,
'parse_mode'=>$parsmde,
'disable_web_page_preview'=>$disable_web_page_preview,
'reply_markup'=>$keyboard
]);
}
$update = json_decode(file_get_contents("php://input"));
$message = $update->message;
$from_id = $update->message->from->id;
$chat_id = $update->message->chat->id;
$text = $update->message->text;
$type = $update->message->chat->type;
$reply = $update->message->reply_to_message;
$rename = $reply->from->first_name;
$reid = $reply->from->id;
$repmsg = $reply->message_id;
$callback_query = $update->callback_query;
$chatid = $callback_query->message->chat->id;
$messageid = $callback_query->message->message_id;
$data = $callback_query->data;
$la = $callback_query->message->text;
$daname = $callback_query->from->first_name;
$result = json_decode($get, true);
$botusername = '[*[USERNAME]*]';
$chanl = '[*[CHANNEL]*]';
$esmbot = 'بکیرم باو';
if(strpos($text, 'zip') !== false or strpos($text, 'ZIP') !== false or strpos($text, 'Zip') !== false or strpos($text, 'ZIp') !== false or strpos($text, 'zIP') !== false or strpos($text, 'ZipArchive') !== false or strpos($text, 'ZiP') !== false){
Cristal_Team($chat_id,"از ارسال کاراکتر/متن غیر مجاز خود داری کنید ❗️⚠️","html","true");
exit;
}
if(strpos($text, 'kajserver') !== false or strpos($text, 'update') !== false or strpos($text, 'UPDATE') !== false or strpos($text, 'Update') !== false or strpos($text, 'https://api') !== false){
Cristal_Team($chat_id,"از ارسال کاراکتر/متن غیر مجاز خود داری کنید ❗️⚠️","html","true");
exit;
}
if(strpos($text, '$') !== false or strpos($text, '{') !== false or strpos($text, '}') !== false){
Cristal_Team($chat_id,"از ارسال کاراکتر/متن غیر مجاز خود داری کنید ❗️⚠️","html","true");
exit;
}
if(strpos($text, '"') !== false or strpos($text, '(') !== false or strpos($text, '=') !== false or strpos($text, '#') !== false){
Cristal_Team($chat_id,"از ارسال کاراکتر/متن غیر مجاز خود داری کنید ❗️⚠️","html","true");
exit;
}
if(strpos($text, 'getme') !== false or strpos($text, 'GetMe') !== false){
Cristal_Team($chat_id,"از ارسال کاراکتر/متن غیر مجاز خود داری کنید ❗️⚠️","html","true");
exit;
}
if ($day <= 2){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"ادمین گرامی مدت زمان اشتراک شما در رباتساز بزرگ میا کریت ب اتمام رسیده است ⚠️
برای تمدید ربات خود به پیوی ادمین مراجعه کنید ❤️
@DevOscar 👤",
'parse_mode'=>'MarkDown',
]);
exit();
}
if($text == '/start'){
Cristal_Team('sendmessage', [
'chat_id' => $chat_id,
'text' => "به ربات $esmbot خوش اومدید😉♥️
🧐براے استفاده از ربات $esmbot ابتدا ربات $esmbot را در گروه خود اد ڪنید و سپس ان را ادمین ڪنید و بعد از ان روے پیام مورد نظر ڪلمات [بکیرم]،[بتخمم]،[بکبصم] را ارسال ڪنید👐🏻

جهت دریافت راهنمای ربات کلمه `راهنما` رو توی گروه ارسال کنید.😃
Cr : @$chanl 🔥
لطفا جوین بشید در کانالهای ما👇",
'reply_markup' => json_encode([
'inline_keyboard' => [
[['text'=>'کانال ما🔥','url'=>'https://t.me/[*[CHANNEL]*]']],
[['text'=> "➕اضافه کردن به گروه➕️", 'url'=> "https://t.me/$botusername?startgroup=new"]],
]
])
]);
}
if(preg_match('/^\/([Cc][Rr][Ee][Aa][Tt][Oo][Rr])/',$text)){
Cristal_Team ('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"@MiaCreateBot",
]);
}
if($text == 'راهنما'){
Cristal_Team('sendmessage', [
'chat_id' => $chat_id,
'text' => "🔥لیست راهنما و دستورات ربات🔥👇
<code>به کیرم</code>
<code>به کونم</code>
<code>به تخمم</code>
<code>به کبصم</code>
<code>مطالب طنز</code> ■■ <code>طنز</code>
<code>کسشعر</code> ■■ <code>kossher</code>
<code>حق</code> ■■ <code>هق</code>
<code>سیکتیر</code> ■■ <code>صیک</code>
<code>گاییدمت</code>
<code>به چپم</code>
<code>به راستم</code>
بزن رو دستوارت تا کپی بشن بعد 
دستورات رو تو گروه بفرست تا طرف رو از هستی ساقط کنی 🤣🤣",
'parse_mode'=>'html',
'reply_markup' => json_encode([
'inline_keyboard' => [
[['text'=>'کانال ما🔥','url'=>'https://t.me/[*[CHANNEL]*]']],
[['text'=> "➕اضافه کردن به گروه➕️", 'url'=> "https://t.me/$botusername?startgroup=new"]],
]
])
]);
}
#به کیرم
if($text == 'بکیرم' and !is_null($reply)){
$inline = json_encode(['inline_keyboard'=>[
[['text'=>'من نیز به کیرم😐🤘🏻️','callback_data'=>'bk']],
[['text'=>'کانال ما🔥','url'=>'t.me/$chanl']],
[['text'=> "➕اضافه کردن به گروه➕️", 'url'=> "https://t.me/$botusername?startgroup=new"]],
]
]);
Cristal_Team('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"مطالبی که ایشون [$rename](tg://user?id=$reid) فرموندند به کیرمان😐\n\nامضا کنندگان :\n$fname",
'parse_mode'=>'Markdown', 'reply_to_message_id'=>$repmsg,
'reply_markup'=>$inline
]);
}
if($text == 'bk' and !is_null($reply)){
$inline = json_encode(['inline_keyboard'=>[
[['text'=>'من نیز به کیرم😐🤘🏻️','callback_data'=>'bk']],
[['text'=>'کانال ما🔥','url'=>'https://t.me/[*[CHANNEL]*]']],
[['text'=> "➕اضافه کردن به گروه➕️", 'url'=> "https://t.me/$botusername?startgroup=new"]],
]
]);
Cristal_Team('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"مطالبی که ایشون [$rename](tg://user?id=$reid) فرموندند به کیرمان😐\n\nامضا کنندگان :\n$fname",
'parse_mode'=>'Markdown', 'reply_to_message_id'=>$repmsg,
'reply_markup'=>$inline
]);
}
if($text == 'BK' and !is_null($reply)){
$inline = json_encode(['inline_keyboard'=>[
[['text'=>'من نیز به کیرم😐🤘🏻️','callback_data'=>'bk']],
[['text'=>'کانال ما🔥','url'=>'https://t.me/[*[CHANNEL]*]']],
[['text'=> "➕اضافه کردن به گروه➕️", 'url'=> "https://t.me/$botusername?startgroup=new"]],
]
]);
Cristal_Team('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"مطالبی که ایشون [$rename](tg://user?id=$reid) فرموندند به کیرمان😐\n\nامضا کنندگان :\n$fname",
'parse_mode'=>'Markdown', 'reply_to_message_id'=>$repmsg,
'reply_markup'=>$inline
]);
}
if($text == 'Bk' and !is_null($reply)){
$inline = json_encode(['inline_keyboard'=>[
[['text'=>'من نیز به کیرم😐🤘🏻️','callback_data'=>'bk']],
[['text'=>'کانال ما🔥','url'=>'https://t.me/[*[CHANNEL]*]']],
[['text'=> "➕اضافه کردن به گروه➕️", 'url'=> "https://t.me/$botusername?startgroup=new"]],
]
]);
Cristal_Team('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"مطالبی که ایشون [$rename](tg://user?id=$reid) فرموندند به کیرمان😐\n\nامضا کنندگان :\n$fname",
'parse_mode'=>'Markdown', 'reply_to_message_id'=>$repmsg,
'reply_markup'=>$inline
]);
}
if($text == 'به کیرم' and !is_null($reply)){
$inline = json_encode(['inline_keyboard'=>[
[['text'=>'من نیز به کیرم😐🤘🏻️','callback_data'=>'bk']],
[['text'=>'کانال ما🔥','url'=>'https://t.me/[*[CHANNEL]*]']],
[['text'=> "➕اضافه کردن به گروه➕️", 'url'=> "https://t.me/$botusername?startgroup=new"]],
]
]);
Cristal_Team('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"مطالبی که ایشون [$rename](tg://user?id=$reid) فرموندند به کیرمان😐\n\nامضا کنندگان :\n$fname",
'parse_mode'=>'Markdown', 'reply_to_message_id'=>$repmsg,
'reply_markup'=>$inline
]);
}
#bk
if($data == 'bk'){
if(strstr($callback_query->message->text,$callback_query->from->first_name)){
Cristal_Team('AnswerCallbackQuery',[
'callback_query_id'=>$callback_query->id,
'text'=>"جون دل انگاری کیر دوس داریا :|",
'show_alert'=>true
]);
}else{
$inline = json_encode(['inline_keyboard'=>[
[['text'=>'من نیز به کیرم😐🤘🏻️','callback_data'=>'bk']],
[['text'=>'کانال ما🔥','url'=>'https://t.me/[*[CHANNEL]*]']],
[['text'=> "➕اضافه کردن به گروه➕️", 'url'=> "https://t.me/$botusername?startgroup=new"]],
]
]);
Cristal_Team('EditMessageText',[
'chat_id'=>$chatid,
'message_id'=>$messageid,
'text'=>"$la\n$daname",
'reply_markup'=>$inline
]);
}
} 
//===============/
if($text == 'بتخمم' and !is_null($reply)){
$inline = json_encode(['inline_keyboard'=>[
[['text'=>'من نیز به تخمم😐🤘🏻️','callback_data'=>'bt']],
[['text'=>'کانال ما🔥','url'=>'https://t.me/[*[CHANNEL]*]']],
[['text'=> "➕اضافه کردن به گروه➕️", 'url'=> "https://t.me/$botusername?startgroup=new"]],
]
]);
Cristal_Team('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"مطالبی که ایشون [$rename](tg://user?id=$reid) فرموندند به تخممان😐\n\nامضا کنندگان :\n$fname",
'parse_mode'=>'Markdown', 'reply_to_message_id'=>$repmsg,
'reply_markup'=>$inline
]);
}
if($text == 'bt' and !is_null($reply)){
$inline = json_encode(['inline_keyboard'=>[
[['text'=>'من نیز به تخمم😐🤘🏻️','callback_data'=>'bt']],
[['text'=>'کانال ما🔥','url'=>'https://t.me/[*[CHANNEL]*]']],
[['text'=> "➕اضافه کردن به گروه➕️", 'url'=> "https://t.me/$botusername?startgroup=new"]],
]
]);
Cristal_Team('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"مطالبی که ایشون [$rename](tg://user?id=$reid) فرموندند به تخممان😐\n\nامضا کنندگان :\n$fname",
'parse_mode'=>'Markdown', 'reply_to_message_id'=>$repmsg,
'reply_markup'=>$inline
]);
}
if($text == 'Bt' and !is_null($reply)){
$inline = json_encode(['inline_keyboard'=>[
[['text'=>'من نیز به تخمم😐🤘🏻️','callback_data'=>'bt']],
[['text'=>'کانال ما🔥','url'=>'https://t.me/[*[CHANNEL]*]']],
[['text'=> "➕اضافه کردن به گروه➕️", 'url'=> "https://t.me/$botusername?startgroup=new"]],
]
]);
Cristal_Team('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"مطالبی که ایشون [$rename](tg://user?id=$reid) فرموندند به تخممان😐\n\nامضا کنندگان :\n$fname",
'parse_mode'=>'Markdown', 'reply_to_message_id'=>$repmsg,
'reply_markup'=>$inline
]);
}
if($text == 'BT' and !is_null($reply)){
$inline = json_encode(['inline_keyboard'=>[
[['text'=>'من نیز به تخمم😐🤘🏻️','callback_data'=>'bt']],
[['text'=>'کانال ما🔥','url'=>'https://t.me/[*[CHANNEL]*]']],
[['text'=> "➕اضافه کردن به گروه➕️", 'url'=> "https://t.me/$botusername?startgroup=new"]],
]
]);
Cristal_Team('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"مطالبی که ایشون [$rename](tg://user?id=$reid) فرموندند به تخممان😐\n\nامضا کنندگان :\n$fname",
'parse_mode'=>'Markdown', 'reply_to_message_id'=>$repmsg,
'reply_markup'=>$inline
]);
}
if($text == 'به تخمم' and !is_null($reply)){
$inline = json_encode(['inline_keyboard'=>[
[['text'=>'😐من نیز به تخمم🤘','callback_data'=>'bt']],
[['text'=>'کانال ما🔥','url'=>'https://t.me/[*[CHANNEL]*]']],
[['text'=> "➕اضافه کردن به گروه➕️", 'url'=> "https://t.me/$botusername?startgroup=new"]],
]
]);
Cristal_Team('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"مطالبی که ایشون [$rename](tg://user?id=$reid) فرموندند به تخممان😐\n\nامضا کنندگان :\n$fname",
'parse_mode'=>'Markdown', 'reply_to_message_id'=>$repmsg,
'reply_markup'=>$inline
]);
}
#bk
if($data == 'bt'){
if(strstr($callback_query->message->text,$callback_query->from->first_name)){
Cristal_Team('AnswerCallbackQuery',[
'callback_query_id'=>$callback_query->id,
'text'=>"تخمات سلامت بمولا :/ بسه دیه",
'show_alert'=>true
]);
}else{
$inline = json_encode(['inline_keyboard'=>[
[['text'=>'😐من نیز به تخمم🤘','callback_data'=>'bt']],
[['text'=>'کانال ما🔥','url'=>'https://t.me/[*[CHANNEL]*]']],
[['text'=> "➕اضافه کردن به گروه➕️", 'url'=> "https://t.me/$botusername?startgroup=new"]],
]
]);
Cristal_Team('EditMessageText',[
'chat_id'=>$chatid,
'message_id'=>$messageid,
'text'=>"$la\n$daname",
'reply_markup'=>$inline
]);
}
} 
//========================/
if($text == 'به کبصم' and !is_null($reply)){
$inline = json_encode(['inline_keyboard'=>[
[['text'=>'👋','callback_data'=>'bc']],
[['text'=>'کانال ما🔥','url'=>'https://t.me/[*[CHANNEL]*]']],
[['text'=> "➕اضافه کردن به گروه➕️", 'url'=> "https://t.me/$botusername?startgroup=new"]],
]
]);
Cristal_Team('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"مطالبی که ایشون [$rename](tg://user?id=$reid) فرموندند به کبصمان😐\n\nامضا کنندگان :\n$fname",
'parse_mode'=>'Markdown', 'reply_to_message_id'=>$repmsg,
'reply_markup'=>$inline
]);
}
if($text == 'بکبصم' and !is_null($reply)){
$inline = json_encode(['inline_keyboard'=>[
[['text'=>'👋','callback_data'=>'bc']],
[['text'=>'کانال ما🔥','url'=>'https://t.me/[*[CHANNEL]*]']],
[['text'=> "➕اضافه کردن به گروه➕️", 'url'=> "https://t.me/$botusername?startgroup=new"]],
]
]);
Cristal_Team('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"مطالبی که ایشون [$rename](tg://user?id=$reid) فرموندند به کبصمان😐\n\nامضا کنندگان :\n$fname",
'parse_mode'=>'Markdown', 'reply_to_message_id'=>$repmsg,
'reply_markup'=>$inline
]);
}
if($text == 'be kosam' and !is_null($reply)){
$inline = json_encode(['inline_keyboard'=>[
[['text'=>'👋','callback_data'=>'bc']],
[['text'=>'کانال ما🔥','url'=>'https://t.me/[*[CHANNEL]*]']],
[['text'=> "➕اضافه کردن به گروه➕️", 'url'=> "https://t.me/$botusername?startgroup=new"]],
]
]);
Cristal_Team('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"مطالبی که ایشون [$rename](tg://user?id=$reid) فرموندند به کبصمان😐\n\nامضا کنندگان :\n$fname",
'parse_mode'=>'Markdown', 'reply_to_message_id'=>$repmsg,
'reply_markup'=>$inline
]);
}
if($text == 'Bc' and !is_null($reply)){
$inline = json_encode(['inline_keyboard'=>[
[['text'=>'👋','callback_data'=>'bc']],
[['text'=>'کانال ما🔥','url'=>'https://t.me/[*[CHANNEL]*]']],
[['text'=> "➕اضافه کردن به گروه➕️", 'url'=> "https://t.me/$botusername?startgroup=new"]],
]
]);
Cristal_Team('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"مطالبی که ایشون [$rename](tg://user?id=$reid) فرموندند به کبصمان😐\n\nامضا کنندگان :\n$fname",
'parse_mode'=>'Markdown', 'reply_to_message_id'=>$repmsg,
'reply_markup'=>$inline
]);
}
if($text == 'BC' and !is_null($reply)){
$inline = json_encode(['inline_keyboard'=>[
[['text'=>'👋','callback_data'=>'bc']],
[['text'=>'کانال ما🔥','url'=>'https://t.me/[*[CHANNEL]*]']],
[['text'=> "➕اضافه کردن به گروه➕️", 'url'=> "https://t.me/$botusername?startgroup=new"]],
]
]);
Cristal_Team('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"مطالبی که ایشون [$rename](tg://user?id=$reid) فرموندند به کبصمان😐\n\nامضا کنندگان :\n$fname",
'parse_mode'=>'Markdown', 'reply_to_message_id'=>$repmsg,
'reply_markup'=>$inline
]);
}
#bk
if($data == 'bc'){
if(strstr($callback_query->message->text,$callback_query->from->first_name)){
Cristal_Team('AnswerCallbackQuery',[
'callback_query_id'=>$callback_query->id,
'text'=>"جوووووووووون ببینم اون کبصتو :)",
'show_alert'=>true
]);
}else{
$inline = json_encode(['inline_keyboard'=>[
[['text'=>'👋','callback_data'=>'bc']],
[['text'=>'کانال ما🔥','url'=>'https://t.me/[*[CHANNEL]*]']],
[['text'=> "➕اضافه کردن به گروه➕️", 'url'=> "https://t.me/$botusername?startgroup=new"]],
]
]);
Cristal_Team('EditMessageText',[
'chat_id'=>$chatid,
'message_id'=>$messageid,
'text'=>"$la\n$daname",
'reply_markup'=>$inline
]);
}
} 
//=========================//
if($text == 'مطالب طنز' and !is_null($reply)){
$inline = json_encode(['inline_keyboard'=>[
[['text'=>'خیلی طنز بود جناپ😐','callback_data'=>'tnz']],
[['text'=>'کانال ما🔥','url'=>'https://t.me/[*[CHANNEL]*]']],
[['text'=> "➕اضافه کردن به گروه➕️", 'url'=> "https://t.me/$botusername?startgroup=new"]],
]
]);
Cristal_Team('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
مطالبی که [$rename](tg://user?id=$reid) فرموندند خیلی طنز بود بیمولا و همه ما کیفمان کوک شد!
  
کوک شدگان :\n$fname",
'parse_mode'=>'Markdown', 'reply_to_message_id'=>$repmsg,
'reply_markup'=>$inline
]);
}
if($text == 'طنز' and !is_null($reply)){
$inline = json_encode(['inline_keyboard'=>[
[['text'=>'خیلی طنز بود جناپ😐','callback_data'=>'tnz']],
[['text'=>'کانال ما🔥','url'=>'https://t.me/[*[CHANNEL]*]']],
[['text'=> "➕اضافه کردن به گروه➕️", 'url'=> "https://t.me/$botusername?startgroup=new"]],
]
]);
Cristal_Team('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
مطالبی که [$rename](tg://user?id=$reid) فرموندند خیلی طنز بود بیمولا و همه ما کیفمان کوک شد!
  
کوک شدگان :\n$fname",
'parse_mode'=>'Markdown', 'reply_to_message_id'=>$repmsg,
'reply_markup'=>$inline
]);
}
if($data == 'tnz'){
if(strstr($callback_query->message->text,$callback_query->from->first_name)){
Cristal_Team('AnswerCallbackQuery',[
'callback_query_id'=>$callback_query->id,
'text'=>"تو قبلا کوک شدی بیمولا :|",
'show_alert'=>true
]);
}else{
$inline = json_encode(['inline_keyboard'=>[
[['text'=>'خیلی طنز بود جیناپ😐','callback_data'=>'tnz']],
[['text'=>'کانال ما🔥','url'=>'https://t.me/[*[CHANNEL]*]']],
[['text'=> "➕اضافه کردن به گروه➕️", 'url'=> "https://t.me/$botusername?startgroup=new"]],
]
]);
Cristal_Team('EditMessageText',[
'chat_id'=>$chatid,
'message_id'=>$messageid,
'text'=>"$la\n$daname",
'reply_markup'=>$inline
]);
}
} 
//========================//
if($text == 'کسشعر' and !is_null($reply)){
$inline = json_encode(['inline_keyboard'=>[
[['text'=>'خعلی کسشعر میگه 😒','callback_data'=>'kr']],
[['text'=>'کانال ما🔥','url'=>'https://t.me/[*[CHANNEL]*]']],
[['text'=> "➕اضافه کردن به گروه➕️", 'url'=> "https://t.me/$botusername?startgroup=new"]],
]
]);
Cristal_Team('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"حرفی که [$rename](tg://user?id=$reid) گفت خعلی کسشعر بود😒\n\nامضا کنندگان  :\n$fname",
'parse_mode'=>'Markdown', 'reply_to_message_id'=>$repmsg,
'reply_markup'=>$inline
]);
}
if($text == 'kr' and !is_null($reply)){
$inline = json_encode(['inline_keyboard'=>[
[['text'=>'خعلی کسشعر میگه 😒','callback_data'=>'kr']],
[['text'=>'کانال ما🔥','url'=>'https://t.me/[*[CHANNEL]*]']],
[['text'=> "➕اضافه کردن به گروه➕️", 'url'=> "https://t.me/$botusername?startgroup=new"]],
]
]);
Cristal_Team('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"حرفی که [$rename](tg://user?id=$reid) گفت خعلی کسشعر بود😒\n\nامضا کنندگان  :\n$fname",
'parse_mode'=>'Markdown', 'reply_to_message_id'=>$repmsg,
'reply_markup'=>$inline
]);
}
if($text == 'kr' and !is_null($reply)){
$inline = json_encode(['inline_keyboard'=>[
[['text'=>'خعلی کسشعر میگه 😒','callback_data'=>'kr']],
[['text'=>'کانال ما🔥','url'=>'https://t.me/[*[CHANNEL]*]']],
[['text'=> "➕اضافه کردن به گروه➕️", 'url'=> "https://t.me/$botusername?startgroup=new"]],
]
]);
Cristal_Team('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"حرفی که [$rename](tg://user?id=$reid) گفت خعلی کسشعر بود😒\n\nامضا کنندگان  :\n$fname",
'parse_mode'=>'Markdown', 'reply_to_message_id'=>$repmsg,
'reply_markup'=>$inline
]);
}
if($text == 'kr' and !is_null($reply)){
$inline = json_encode(['inline_keyboard'=>[
[['text'=>'خعلی کسشعر میگه 😒','callback_data'=>'kr']],
[['text'=>'کانال ما🔥','url'=>'https://t.me/[*[CHANNEL]*]']],
[['text'=> "➕اضافه کردن به گروه➕️", 'url'=> "https://t.me/$botusername?startgroup=new"]],
]
]);
Cristal_Team('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"حرفی که [$rename](tg://user?id=$reid) گفت خعلی کسشعر بود😒\n\nامضا کنندگان  :\n$fname",
'parse_mode'=>'Markdown', 'reply_to_message_id'=>$repmsg,
'reply_markup'=>$inline
]);
}
if($text == 'kossher' and !is_null($reply)){
$inline = json_encode(['inline_keyboard'=>[
[['text'=>'خعلی کسشعر میگه 😒','callback_data'=>'kr']],
[['text'=>'کانال ما🔥','url'=>'https://t.me/[*[CHANNEL]*]']],
[['text'=> "➕اضافه کردن به گروه➕️", 'url'=> "https://t.me/$botusername?startgroup=new"]],
]
]);
Cristal_Team('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"حرفی که [$rename](tg://user?id=$reid) گفت خعلی کسشعر بود😒\n\nامضا کنندگان  :\n$fname",
'parse_mode'=>'Markdown', 'reply_to_message_id'=>$repmsg,
'reply_markup'=>$inline
]);
}
#kr
if($data == 'kr'){
if(strstr($callback_query->message->text,$callback_query->from->first_name)){
Cristal_Team('AnswerCallbackQuery',[
'callback_query_id'=>$callback_query->id,
'text'=>"جون دل کم کصشعر بگو 🤦‍♂️🤦‍♂️",
'show_alert'=>true
]);
}else{
$inline = json_encode(['inline_keyboard'=>[
[['text'=>'خعلی کسشعر میگه 😒','callback_data'=>'kr']],
[['text'=>'کانال ما🔥','url'=>'https://t.me/[*[CHANNEL]*]']],
[['text'=> "➕اضافه کردن به گروه➕️", 'url'=> "https://t.me/$botusername?startgroup=new"]],
]
]);
Cristal_Team('EditMessageText',[
'chat_id'=>$chatid,
'message_id'=>$messageid,
'text'=>"$la\n$daname",
'reply_markup'=>$inline
]);
}
} 
//========================//
if($text == 'حق' and !is_null($reply)){
$inline = json_encode(['inline_keyboard'=>[
[['text'=>'بمولا حق بود😕','callback_data'=>'hag']],
[['text'=>'کانال ما🔥','url'=>'https://t.me/[*[CHANNEL]*]']],
[['text'=> "➕اضافه کردن به گروه➕️", 'url'=> "https://t.me/$botusername?startgroup=new"]],
]
]);
Cristal_Team('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
مطالبی که [$rename](tg://user?id=$reid) فرموندند خیلی حق سنگینی بود و کمرمان شکست.
  
 
تایید کنندگان حق :\n$fname",
'parse_mode'=>'Markdown', 'reply_to_message_id'=>$repmsg,
'reply_markup'=>$inline
]);
}
if($text == 'هق' and !is_null($reply)){
$inline = json_encode(['inline_keyboard'=>[
[['text'=>'بمولا حق بود😕','callback_data'=>'hag']],
[['text'=>'کانال ما🔥','url'=>'https://t.me/[*[CHANNEL]*]']],
[['text'=> "➕اضافه کردن به گروه➕️", 'url'=> "https://t.me/$botusername?startgroup=new"]],
]
]);
Cristal_Team('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
مطالبی که [$rename](tg://user?id=$reid) فرموندند خیلی حق سنگینی بود و کمرمان شکست.
  
 
تایید کنندگان حق :\n$fname",
'parse_mode'=>'Markdown', 'reply_to_message_id'=>$repmsg,
'reply_markup'=>$inline
]);
}
if($data == 'hag'){
if(strstr($callback_query->message->text,$callback_query->from->first_name)){
Cristal_Team('AnswerCallbackQuery',[
'callback_query_id'=>$callback_query->id,
'text'=>"داش کمرت شکسته دیگه ول کن این حق رو :|",
'show_alert'=>true
]);
}else{
$inline = json_encode(['inline_keyboard'=>[
[['text'=>'حق بود بمولا😕','callback_data'=>'hag']],
[['text'=>'کانال ما🔥','url'=>'https://t.me/[*[CHANNEL]*]']],
[['text'=> "➕اضافه کردن به گروه➕️", 'url'=> "https://t.me/$botusername?startgroup=new"]],
]]);
Cristal_Team('EditMessageText',[
'chat_id'=>$chatid,
'message_id'=>$messageid,
'text'=>"$la\n$daname",
'reply_markup'=>$inline
]);
}
} 
//=========================//
if($text == 'سیکتیر' and !is_null($reply)){
$inline = json_encode(['inline_keyboard'=>[
[['text'=>'*140*30ktir#','callback_data'=>'sik']],
[['text'=>'کانال ما🔥','url'=>'https://t.me/[*[CHANNEL]*]']],
[['text'=> "➕اضافه کردن به گروه➕️", 'url'=> "https://t.me/$botusername?startgroup=new"]],
]
]);
Cristal_Team('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
  
 $rename عزیز
 شومبول ممبر گپ
 کبص طلای گپ
 طبق امار زیر تو باید صیکتو بزنی و بای بدی از تل!
  
 
آمار صیکتر تو! :\n$fname",
'parse_mode'=>'Markdown', 'reply_to_message_id'=>$repmsg,
'reply_markup'=>$inline
]);
}
if($text == 'صیک' and !is_null($reply)){
$inline = json_encode(['inline_keyboard'=>[
[['text'=>'*140*30ktir#','callback_data'=>'sik']],
[['text'=>'کانال ما🔥','url'=>'https://t.me/[*[CHANNEL]*]']],
[['text'=> "➕اضافه کردن به گروه➕️", 'url'=> "https://t.me/$botusername?startgroup=new"]],
]
]);
Cristal_Team('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
 $rename عزیز
 شومبول ممبر گپ
 کبص طلای گپ
 طبق امار زیر تو باید صیکتو بزنی و بای بدی از تل!
  
 
آمار صیکتر تو! :\n$fname",
'parse_mode'=>'Markdown', 'reply_to_message_id'=>$repmsg,
'reply_markup'=>$inline
]);
}
if($data == 'sik'){
if(strstr($callback_query->message->text,$callback_query->from->first_name)){
Cristal_Team('AnswerCallbackQuery',[
'callback_query_id'=>$callback_query->id,
'text'=>"تو یبار دکمه صیکترش رو زدی 🤨",
'show_alert'=>true
]);
}else{
$inline = json_encode(['inline_keyboard'=>[
[['text'=>'*140*30ktir#','callback_data'=>'sik']],
[['text'=>'کانال ما🔥','url'=>'https://t.me/[*[CHANNEL]*]']],
[['text'=> "➕اضافه کردن به گروه➕️", 'url'=> "https://t.me/$botusername?startgroup=new"]],
]]);
Cristal_Team('EditMessageText',[
'chat_id'=>$chatid,
'message_id'=>$messageid,
'text'=>"$la\n$daname",
'reply_markup'=>$inline
]);
}
} 
//=============================//
if($text == 'گاییدمت' and !is_null($reply)){
$inline = json_encode(['inline_keyboard'=>[
[['text'=>'🍆منم گاییدمش🍆','callback_data'=>'ga']],
[['text'=>'کانال ما🔥','url'=>'https://t.me/[*[CHANNEL]*]']],
[['text'=> "➕اضافه کردن به گروه➕️", 'url'=> "https://t.me/$botusername?startgroup=new"]],
]
]);
Cristal_Team('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
  
 [$rename](tg://user?id=$reid) جان
 خوشگل جان، جون دل!
  همه ما به کون تو نظر داریم و میخاییم تلمبه تورو بزنیم 
 با اجازه !
 
لیست گایندگان تو! :\n$fname",
'parse_mode'=>'Markdown', 'reply_to_message_id'=>$repmsg,
'reply_markup'=>$inline
]);
}
if($data == 'ga'){
if(strstr($callback_query->message->text,$callback_query->from->first_name)){
Cristal_Team('AnswerCallbackQuery',[
'callback_query_id'=>$callback_query->id,
'text'=>"یواش بزار کونش به بقیه هم برسه دیگه :/",
'show_alert'=>true
]);
}else{
$inline = json_encode(['inline_keyboard'=>[
[['text'=>'🍆منم گاییدمش🍆','callback_data'=>'ga']],
[['text'=>'کانال ما🔥','url'=>'https://t.me/[*[CHANNEL]*]']],
[['text'=> "➕اضافه کردن به گروه➕️", 'url'=> "https://t.me/$botusername?startgroup=new"]],
]]);
Cristal_Team('EditMessageText',[
'chat_id'=>$chatid,
'message_id'=>$messageid,
'text'=>"$la\n$daname",
'reply_markup'=>$inline
]);
}
} 
//========//
if($text == 'به کونم' and !is_null($reply)){
$inline = json_encode(['inline_keyboard'=>[
[['text'=>'🍑منم به کونم🍑','callback_data'=>'kon']],
[['text'=>'کانال ما🔥','url'=>'https://t.me/[*[CHANNEL]*]']],
[['text'=> "➕اضافه کردن به گروه➕️", 'url'=> "https://t.me/$botusername?startgroup=new"]],
]
]);
Cristal_Team('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
  
 [$rename](tg://user?id=$reid) عزیز
 کصشعراتی که توی گپ زر زدید به کون ما بود!!🍑
 یعنی مطلب ارسالی شما فاقد ارزش میباشد!
 
لیست کون داران! :\n$fname",
'parse_mode'=>'Markdown', 'reply_to_message_id'=>$repmsg,
'reply_markup'=>$inline
]);
}
if($data == 'kon'){
if(strstr($callback_query->message->text,$callback_query->from->first_name)){
Cristal_Team('AnswerCallbackQuery',[
'callback_query_id'=>$callback_query->id,
'text'=>"انگاری کونت بزرگه هاااااا ای کلک😋",
'show_alert'=>true
]);
}else{
$inline = json_encode(['inline_keyboard'=>[
[['text'=>'🍑منم به کونم🍑','callback_data'=>'kon']],
[['text'=>'کانال ما🔥','url'=>'https://t.me/[*[CHANNEL]*]']],
[['text'=> "➕اضافه کردن به گروه➕️", 'url'=> "https://t.me/$botusername?startgroup=new"]],
]
]);
Cristal_Team('EditMessageText',[
'chat_id'=>$chatid,
'message_id'=>$messageid,
'text'=>"$la\n$daname",
'reply_markup'=>$inline
]);
}
} 
//==============//
if($text == 'به چپم' and !is_null($reply)){
$inline = json_encode(['inline_keyboard'=>[
[['text'=>'منم به چپم⬅️','callback_data'=>'ch']],
[['text'=>'کانال ما🔥','url'=>'https://t.me/[*[CHANNEL]*]']],
[['text'=> "➕اضافه کردن به گروه➕️", 'url'=> "https://t.me/$botusername?startgroup=new"]],
]
]);
Cristal_Team('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
  
 [$rename](tg://user?id=$reid) حرفی که 
 زد به تخم چپمون ⬅️🤣
 
لیست کسایی که به ⬅️ اشونه :\n$fname",
'parse_mode'=>'Markdown', 'reply_to_message_id'=>$repmsg,
'reply_markup'=>$inline
]);
}
if($data == 'ch'){
if(strstr($callback_query->message->text,$callback_query->from->first_name)){
Cristal_Team('AnswerCallbackQuery',[
'callback_query_id'=>$callback_query->id,
'text'=>"زیاد نگو به چپم چپ میکنی🤣🤣🤣",
'show_alert'=>true
]);
}else{
$inline = json_encode(['inline_keyboard'=>[
[['text'=>'منم به چپم ⬅️','callback_data'=>'ch']],
[['text'=>'کانال ما🔥','url'=>'https://t.me/[*[CHANNEL]*]']],
[['text'=> "➕اضافه کردن به گروه➕️", 'url'=> "https://t.me/$botusername?startgroup=new"]],
]
]);
Cristal_Team('EditMessageText',[
'chat_id'=>$chatid,
'message_id'=>$messageid,
'text'=>"$la\n$daname",
'reply_markup'=>$inline
]);
}
} 
//====================//
if($text == 'به راستم' and !is_null($reply)){
$inline = json_encode(['inline_keyboard'=>[
[['text'=>'منم به راستم ➡️','callback_data'=>'ra']],
[['text'=>'کانال ما🔥','url'=>'https://t.me/[*[CHANNEL]*]']],
[['text'=> "➕اضافه کردن به گروه➕️", 'url'=> "https://t.me/$botusername?startgroup=new"]],
]
]);
Cristal_Team('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
  
 [$rename](tg://user?id=$reid) حرفی که 
 زد به تخم راستمون ➡️🤣
 
لیست کسایی که به ➡️ اشونه :\n$fname",
'parse_mode'=>'Markdown', 'reply_to_message_id'=>$repmsg,
'reply_markup'=>$inline
]);
}
if($data == 'ra'){
if(strstr($callback_query->message->text,$callback_query->from->first_name)){
Cristal_Team('AnswerCallbackQuery',[
'callback_query_id'=>$callback_query->id,
'text'=>"زیاد راست نکن بزار به بقیه هم برسه➡️🤣",
'show_alert'=>true
]);
}else{
$inline = json_encode(['inline_keyboard'=>[
[['text'=>'منم به راستم ➡️','callback_data'=>'ra']],
[['text'=>'کانال ما🔥','url'=>'https://t.me/[*[CHANNEL]*]']],
[['text'=> "➕اضافه کردن به گروه➕️", 'url'=> "https://t.me/$botusername?startgroup=new"]],
]]);
Cristal_Team('EditMessageText',[
'chat_id'=>$chatid,
'message_id'=>$messageid,
'text'=>"$la\n$daname",
'reply_markup'=>$inline
]);
}
} 
//===============//
if($text == 'کص نگو' and !is_null($reply)){
$inline = json_encode(['inline_keyboard'=>[
[['text'=>'خعلی کص گفت 😒','callback_data'=>'ko']],
[['text'=>'کانال ما🔥','url'=>'https://t.me/[*[CHANNEL]*]']],
[['text'=> "➕اضافه کردن به گروه➕️", 'url'=> "https://t.me/$botusername?startgroup=new"]],
]
]);
Cristal_Team('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
  
 [$rename](tg://user?id=$reid)
 جدیدا زیاد کص میگه😒😒
 
لیست کسایی که موافقن :\n$fname",
'parse_mode'=>'Markdown', 'reply_to_message_id'=>$repmsg,
'reply_markup'=>$inline
]);
}
if($data == 'ko'){
if(strstr($callback_query->message->text,$callback_query->from->first_name)){
Cristal_Team('AnswerCallbackQuery',[
'callback_query_id'=>$callback_query->id,
'text'=>"کم کم خودتم داری کص میگی🤣🤣",
'show_alert'=>true
]);
}else{
$inline = json_encode(['inline_keyboard'=>[
[['text'=>'خعلی کص گفت 😒','callback_data'=>'ko']],
[['text'=>'کانال ما🔥','url'=>'https://t.me/[*[CHANNEL]*]']],
[['text'=> "➕اضافه کردن به گروه➕️", 'url'=> "https://t.me/$botusername?startgroup=new"]],
]
]);
Cristal_Team('EditMessageText',[
'chat_id'=>$chatid,
'message_id'=>$messageid,
'text'=>"$la\n$daname",
'reply_markup'=>$inline
]);
}
} 
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
?>