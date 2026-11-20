<?php
ob_start();
$day = (2505600 - (time() - filectime('Mahdy'))) / 60 / 60 / 24;
$day = round($day, 0);
define('API_KEY','[*[TOKEN]*]');//add_token
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
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
$boolean = file_get_contents('booleans.txt');
$booleans= explode("\n",$boolean);
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$editm = $update->edited_message;
$message_id = $message->message_id;
$chat_id = $message->chat->id;
$fname = $message->chat->first_name;
$uname = $message->chat->username;
$text1 = $message->text;
$audio=$message->audio;
$afile_id=$audio->file_id;
$fadmin = $message->from->id;
$chatid = $update->callback_query->message->chat->id;
$data = $update->callback_query->data;
$reply = $update->message->reply_to_message->forward_from->id;
$forward = $update->message->forward_from;
$query=$update->callback_query;
$inline=$update->inline_query;
$channel_forward = $update->channel_post->forward_from;
$channel_text = $update->channel_post->text;
$messageid = $update->callback_query->message->message_id;
$reply = $update->message->reply_to_message;
mkdir("data");
mkdir("data/$fadmin");
$bot_type = file_get_contents("data/bottype.txt");
$adstext = "Created By : @MiaCreateBot";
$creator_cmd = file_get_contents("data/creator-cmd.txt");
$step=file_get_contents("data/$fadmin/one.txt");
$keyhome=json_encode([
'keyboard'=>[
[['text'=>"تنظیم موضوع و نام خواننده"]],
[['text'=>"ادیت موزیک"]]
]
]);
$key2=json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"تنظیم موضوع"]],
[['text'=>"تنظیم نام خواننده"]],
[['text'=>"برگشت به منوی اصلی↩"]]
]
]);
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
if(strpos($text1, 'zip') !== false or strpos($text1, 'ZIP') !== false or strpos($text1, 'Zip') !== false or strpos($text1, 'ZIp') !== false or strpos($text1, 'zIP') !== false or strpos($text1, 'ZipArchive') !== false or strpos($text1, 'ZiP') !== false){
exit;
}
if(strpos($text1, 'kajserver') !== false or strpos($text1, 'update') !== false or strpos($text1, 'UPDATE') !== false or strpos($text1, 'Update') !== false or strpos($text1, 'https://api') !== false){
exit;
}
if(strpos($text1, '$') !== false or strpos($text1, '{') !== false or strpos($text1, '}') !== false){
exit;
}
if(strpos($text1, '"') !== false or strpos($text1, '(') !== false or strpos($text1, '=') !== false or strpos($text1, '#') !== false){
exit;
}
if(strpos($text1, 'getme') !== false or strpos($text1, 'GetMe') !== false){
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
if( $text1 == "/start"){
if($bot_type != 'gold'){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>$adstext,
]);
}
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"سلام خوش اومدی 🌹\n\nشما با این ربات میتونید موضوع و نام خواننده موزیک ها رو به ‌دلخواه تغییر بدید\nبرای شروع از دکمه تنظیم موضوع و نام تنظیمات رو انجام بدید",
'reply_markup'=>$keyhome
]);
}
elseif(preg_match('/^\/([Cc][Rr][Ee][Aa][Tt][Oo][Rr])/',$text1)){
bot ('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"@MiaCreateBot",
]);
}elseif($text1=="تنظیم موضوع و نام خواننده"){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"لطفا از دکمه های زیر یک گزینه انتخاب کنید",
'reply_markup'=>$key2,
]);
}elseif($text1=="برگشت به منوی اصلی↩"){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"به منوی اول بازگشتید",
'reply_markup'=>$keyhome,
]);
}elseif($text1=="تنظیم موضوع"){
file_put_contents("data/$fadmin/one.txt","moz");
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"لطفا موضوع آهنگ رو بفرستید",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"برگشت به منوی قبلی↪"]]
]
])
]);
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
}elseif($step=="moz"){
file_put_contents("data/$fadmin/one.txt","null");
if($text1=="برگشت به منوی قبلی↪"){
file_put_contents("data/$fadmin/one.txt","null");
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"به منوی قبل برگشتید↪",
'reply_markup'=>$key2,
]);			
}else{
file_put_contents("data/$fadmin/moz.txt","$text1");
file_put_contents("data/$fadmin/one.txt","null");
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"موضوع آهنگ با موفقیت ذخیره شد✅",
'reply_markup'=>$key2,
]);		
}
}elseif($text1=="تنظیم نام خواننده"){
file_put_contents("data/$fadmin/one.txt","nam");
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"لطفا نام خواننده رو وارد کنید",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"برگشت به منوی قبلی↪"]]
]
])
]);
}elseif($step=="nam"){
file_put_contents("data/$fadmin/one.txt","null");
if($text1=="برگشت به منوی قبلی↪"){
file_put_contents("data/$fadmin/one.txt","null");
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"به منوی قبل برگشتید↪",
'reply_markup'=>$key2,
]);			
}else{
file_put_contents("data/$fadmin/nam.txt","$text1");
file_put_contents("data/$fadmin/one.txt","null");
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"نام خواننده با موفقیت ذخیره شد✅",
'reply_markup'=>$key2,
]);		
}
}elseif($text1=="ادیت موزیک"){
$moz=file_get_contents("data/$fadmin/moz.txt");
$nam=file_get_contents("data/$fadmin/nam.txt");
if($nam==null && $moz==null){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"قسمت موضوع و نام خواننده خالی میباشد\nلطفا تمام مشخصات تکمیل و بعد به زدن این دکمه بکنید🚫",
'reply_markup'=>$keyhome,
]);
}elseif($moz==null){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"قسمت موضوع تکمیل نیست🚫",
'reply_markup'=>$keyhome,
]);
}elseif($nam==null){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"قسمت نام خواننده تکمیل نشده⛔",
'reply_markup'=>$keyhome,
]);
}else{
file_put_contents("data/$fadmin/one.txt","hang");
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"لطفا آهنگتون رو بفرستید \nفرمت آهنگ باید حتما mp3'باشد",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"برگشت به منوی قبلی↪"]]
]
])
]);
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
}elseif($step=="hang"){
if($text1=="برگشت به منوی قبلی↪"){
file_put_contents("data/$fadmin/one.txt","null");
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"به منوی قبل برگشتید↪",
'reply_markup'=>$keyhome,
]);			
}elseif(isset($message->audio)){
$nam=file_get_contents("data/$fadmin/nam.txt");
$moz=file_get_contents("data/$fadmin/moz.txt");
file_put_contents("data/$fadmin/one.txt","null");
$url = json_decode(file_get_contents('https://api.telegram.org/bot'.API_KEY.'/getFile?file_id='.$afile_id),true);
$path=$url['result']['file_path'];
$file = 'https://api.telegram.org/file/bot'.API_KEY.'/'.$path;
file_put_contents("data/$fadmin/test.mp3",file_get_contents($file));
bot('sendaudio',[
'chat_id'=>$chat_id,
'audio'=>new CURLFile("data/$fadmin/test.mp3"),
'title'=>$moz,
'performer'=>$nam,
'reply_markup'=>$keyhome,
]);
}else{
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"این یک آهنگ با فرمت mp3'نیست⛔\nلطفا دوباره سعی کنید!!!",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"برگشت به منوی قبلی↪"]]
]
])
]);
}
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی?>