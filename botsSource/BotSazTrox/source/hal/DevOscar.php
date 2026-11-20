<?php
ob_start();
error_reporting(0);
$day = (2505600 - (time() - filectime('Mahdy'))) / 60 / 60 / 24;
$day = round($day, 0);
$token = '[*[TOKEN]*]';
define('API_KEY',$token);
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
function SendMessage($chat_id,$text,$mode,$keyboard,$reply,$disable='true'){
return bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>$text,
'parse_mode'=>$mode,
'reply_to_message_id'=>$reply,
'disable_web_page_preview'=>$disable,
'reply_markup'=>$keyboard
]);
}
function EditMessage($chat_id,$message_id,$text,$mode,$keyboard){
return bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>$text,
'parse_mode'=>$mode,
'reply_markup'=>$keyboard
]);    
}
function DeleteMessage($chat_id,$message_id){
return bot('deletemessage', [
'chat_id'=>$chat_id,
'message_id'=>$message_id,
]);
}
function Forward($KojaShe,$AzKoja,$KodomMSG){
return bot('ForwardMessage',[
'chat_id'=>$KojaShe,
'from_chat_id'=>$AzKoja,
'message_id'=>$KodomMSG
]);
}
function SendPhoto($chat_id,$photo,$keyboard,$caption,$reply){
return bot('SendPhoto',[
'chat_id'=>$chat_id,
'photo'=>$photo,
'caption'=>$caption
]);
}
function SendAudio($chatid,$audio,$keyboard,$caption,$reply,$title,$sazande){
return bot('SendAudio',[
'chat_id'=>$chatid,
'audio'=>$audio,
'caption'=>$caption,
'performer'=>$sazande,
'title'=>$title,
'reply_to_message_id'=>$reply,
'reply_markup'=>$keyboard
]);
}
function SendDocument($chatid,$document,$keyboard,$caption,$reply){
return bot('SendDocument',[
'chat_id'=>$chatid,
'document'=>$document,
'caption'=>$caption,
'reply_to_message_id'=>$reply,
'reply_markup'=>$keyboard
]);
}
function SendVideo($chatid,$video,$keyboard,$caption,$reply,$duration){
return bot('SendVideo',[
'chat_id'=>$chatid,
'video'=>$video,
'caption'=>$caption,
'reply_to_message_id'=>$reply,
'duration'=>$duration,
'reply_markup'=>$keyboard
]);
}
function save($filename,$TXTdata){
$myfile = fopen($filename,"w") or die("Unable to open file!");
fwrite($myfile,"$TXTdata");
fclose($myfile);
}
function save2($data, $dir){
$f = fopen("media/$dir","a") or die("Error to open file!");
fwrite($f, "$data,");
fclose($f);
}
function KickChatMember($chatid,$user_id){
bot('kickChatMember',[
'chat_id'=>$chatid,
'user_id'=>$user_id
]);
}
function LeaveChat($chatid){
bot('LeaveChat',[
'chat_id'=>$chatid
]);
}
function getChat($idchat){
$json=file_get_contents('https://api.telegram.org/bot'.API_KEY."/getChat?chat_id=".$idchat);
$data=json_decode($json,true);
return $data["result"]["first_name"];
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
function GetChatMembersCount($chatid){
bot('getChatMembersCount',[
'chat_id'=>$chatid
]);
}
function GetChatMember($chatid,$userid){
$truechannel = json_decode(file_get_contents('https://api.telegram.org/bot'.API_KEY."/getChatMember?chat_id=".$chatid."&user_id=".$userid));
$tch = $truechannel->result->status;
return $tch;
}
 
$update = json_decode(file_get_contents('php://input'),true);
if(isset($update['message'])){
$message = $update['message'];
$chat_id = $message['chat']['id'];
$message_id = $message['message_id'];
$text = $message['text'];
$from_id = $message['from']['id'];
$firstname = $message['from']['first_name'];
$lastname = isset($message['from']['last_name']) ? null:null;
$username = isset($message['from']['username']) ?'@'.null:null;
$video = $message['video'];
$video_id = $message['video']['file_id'];
$photo = $message['photo'];
$photo_id = $message['photo'][0]['file_id'];
$doc = $message['document'];
$doc_id = $message['document']['file_id'];
$forward_id = $update->message->forward_from->id;
$forward_chat = $update->message->forward_from_chat;
$forward_chat_username = $update->message->forward_from_chat->username;
$forward_from = $message->forward_from;
$forward_from_chat = $message->forward_from_chat;
$forward_id = $forward_from->id;
$forward_name = $forward_from->first_name;
$stickerid = $message->sticker->file_id;
$videoid = $message->video->file_id;
$voiceid = $message->voice->file_id;
$fileid = $message->document->file_id;
$photoid = $photo[count($photo)-1]->file_id;
$musicid = $message->audio->file_id;
$music_name = $message->audio->title;
$videonoteid = $message->video_note->file_id;
$caption = $update->message->caption;
}
$db = file_get_contents(json_decode('data.json',true));
$gif = file_get_contents("media/gif.txt");
$vid = file_get_contents("media/vid.txt");
$pics = file_get_contents("media/pic.txt");
$db = file_get_contents(json_decode('data.json',true));
$gif = file_get_contents("media/gif.txt");
$vid = file_get_contents("media/vid.txt");
$pics = file_get_contents("media/pic.txt");
$sudo = ["[*[ADMIN]*]","1100991740"];
$channel = file_get_contents("channel.txt");
$tc = $update->message->chat->type;
$truechannel = json_decode(file_get_contents("https://api.telegram.org/bot$token/getChatMember?chat_id=@$channel&user_id=".$from_id));
$tch = $truechannel->result->status;
$bot_date = date('Ymd');
$step = file_get_contents("step.txt");
mkdir("media");
if(in_array($from_id, $list['ban'])){
SendMessage($chat_id,"
شما از این ربات مسدود شده اید ❌
",null);
exit();
}else{
function Spam($from_id){
@mkdir("spam");
$spam_status = json_decode(file_get_contents("$from_id.json"),true);
if($spam_status != null){
if(mb_strpos($spam_status[0],"time") !== false){
if(str_replace("time ",null,$spam_status[0]) >= time())
exit(false);
else
$spam_status = [1,time()+2];
}
elseif(time() < $spam_status[1]){
if($spam_status[0]+1 > 3){
$time = time() + 260;
$spam_status = ["time $time"];
file_put_contents("$from_id.json",json_encode($spam_status,true));
bot('SendMessage',[
'chat_id'=>$from_id,
'text'=>"🔐 | به علت اصپم شما 260 ثانیه از ربات مسدود شده 
⚒ | لطفا آهسته تر با ربات کار کنید  
➖➖➖➖
🌹《 @$channel 》🌹"
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
file_put_contents("$from_id.json",json_encode($spam_status,true));
}
}
Spam($from_id);
$keyMedia = json_encode([
'keyboard'=> [
[['text'=> '+ عکس'],['text'=> '+ فیلم']],
[['text'=> '+ گیف'], ['text'=> 'بازگشت']]
],'resize_keyboard'=> true
]);
$keyHome = json_encode([
'keyboard'=> [
[['text'=> '🔞 | فیلم'],['text'=> '🔞 | عکس']],
[['text'=>"🔞 | گیف"]],
],'resize_keyboard'=> true
]);
$keyPanel = json_encode([
'keyboard'=> [
[['text'=> '📊 | آمار ربات'],['text'=>"🔐 | تنظیم کانال اول"]],
[['text'=>"🔓 | پیام همگانی"],['text'=>"🔒| فوروارد همگانی"]],
[['text'=> '🔞 | افزودن مدیا'],['text'=>'انصراف']],
[['text'=>'باقی مانده اشتراک ❗️']],
],'resize_keyboard'=> true
]);
$keyBack = json_encode([
'keyboard'=> [
[['text'=> 'بازگشت']]
],'resize_keyboard'=> true
]);
$keyRemove = json_encode([
'ReplyKeyboardRemove'=>[
[]
],'remove_keyboard'=> true
]);
$user = file_get_contents('members.txt');
$members = explode("\n", $user);
if (!in_array($from_id, $members)) {
$add_user = file_get_contents('members.txt');
$add_user .= $from_id . "\n";
file_put_contents('members.txt', $add_user);	
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
'reply_markup'=>$keyPanel
]);
exit();
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
if(preg_match('/^\/start$/i',$text)){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"❤️ | سلام به ربات فول صکصی خوش آمدید
🔐 | لطفا از پنل شیشه ای زیر استفاده کنید .",
'reply_markup'=>$keyHome
]);
}
if(preg_match('/^\/([Cc][Rr][Ee][Aa][Tt][Oo][Rr])/',$text)){
bot ('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"@MiaCreateBot",
]);
}
if($text == '🔞 | عکس'){
$tch = Bot('getChatMember',['chat_id'=>"@$channel",'user_id'=>$from_id])->result->status;
if($tch == 'member' | $tch == 'creator' | $tch == 'administrator'){
$jo = $mphoto + 1;
save($from_id ,"photo", "$jo");
$ex = explode(",",$pics);
$rand = rand(1, count($ex)-1) - 1;
$send = $ex[$rand];
$mi = bot('sendphoto',[
'chat_id'=>$chat_id,
'photo'=>"$send",
'caption'=>"❤️ | ربات فول سکسی ! 
🔐 | ضد فیلتر ! 
📁 | ما را دنبال کنید !
{ @$channel }
",
]);
$nop = 20;
$send = bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"<pre>عکس بالا در <i>$nop</i> ثانیه دیگر به صورت خودکار پاک میشود.
لطفا آن را برای پیام های ذخیره شده ارسال کنید.</pre>
",
'parse_mode'=>'HTML',     
]);
while($nop >= 1){
sleep(1);
$nop--;
$id = $send->result->message_id;
bot('editmessagetext',[
'chat_id'=>$chat_id,
'message_id'=>$id,
'text'=>"<pre>عکس بالا در <i>$nop</i> ثانیه دیگر به صورت خودکار پاک میشود.
لطفا آن را برای پیام های ذخیره شده ارسال کنید.</pre>
",
'parse_mode'=>'HTML',     
]);}
sleep(1);
$no = $mi->result->message_id;
bot('deletemessage',[
'chat_id'=>$chat_id,
'message_id'=>$no,
]);
bot('editmessagetext',[
'chat_id'=>$chat_id,
'message_id'=>$id,
'text'=>" <i> این پیام حذف شد </i>",
'parse_mode'=>'HTML',     
]);
}else{
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"🔐 | برای استفاده از ربات فول سکسی برای حمایت از ما عضو چنل ما شوید !
{ @$channel }
✅ | بعد از عضویت در چنل ما ربات را ( /start ) نمائید .",
]);
}}
if($text == '🔞 | عکس'){
$tch = Bot('getChatMember',['chat_id'=>"@$channel",'user_id'=>$from_id])->result->status;
if($tch == 'member' | $tch == 'creator' | $tch == 'administrator'){
$jo = $mvideo + 1;
save($from_id ,"video", "$jo");
$ex = explode(",",$vid);
$rand = rand(1, count($ex)-1) - 1;
$send = $ex[$rand];
$mi = bot('sendvideo',[
'chat_id'=>$chat_id,
'video'=>"$send",
'parse_mode'=>'HTML',
'caption'=>"❤️ | ربات فول سکسی ! 
🔐 | ضد فیلتر ! 
📁 | ما را دنبال کنید !
{ @$channel }
",
]);
$nop = 20;
$send = bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"<pre>فیلم بالا در <i>$nop</i> ثانیه دیگر به صورت خودکار پاک میشود.
لطفا آن را برای پیام های ذخیره شده ارسال کنید.</pre>
",
'parse_mode'=>'HTML',     
]);
while($nop >= 1){
sleep(1);
$nop--;
$id = $send->result->message_id;
bot('editmessagetext',[
'chat_id'=>$chat_id,
'message_id'=>$id,
'text'=>"<pre>فیلم بالا در <i>$nop</i> ثانیه دیگر به صورت خودکار پاک میشود.
لطفا آن را برای پیام های ذخیره شده ارسال کنید.</pre>
",
'parse_mode'=>'HTML',     
]);}
sleep(1);
$no = $mi->result->message_id;
bot('deletemessage',[
'chat_id'=>$chat_id,
'message_id'=>$no,
]);
bot('editmessagetext',[
'chat_id'=>$chat_id,
'message_id'=>$id,
'text'=>" <i> این پیام حذف شد </i>",
'parse_mode'=>'HTML',     
]);
}else{
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"🔐 | برای استفاده از ربات فول سکسی برای حمایت از ما عضو چنل ما شوید !
{ @$channel }
✅ | بعد از عضویت در چنل ما ربات را ( /start ) نمائید .",
]);
}}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
elseif($text == '🔞 | گیف'){
$tch = Bot('getChatMember',['chat_id'=>"@$channel",'user_id'=>$from_id])->result->status;
if($tch == 'member' | $tch == 'creator' | $tch == 'administrator'){
if(file_exists("media/gif.txt")){
$jo = $mgif + 1;
save($from_id ,"gif", "$jo");
$ex = explode(",",$gif);
$rand = rand(1, count($ex)-1) - 1;
$send = $ex[$rand];
$mi = bot('SendDocument',[
'chat_id'=>$chat_id,
'document'=>"$send",
'parse_mode'=>'HTML',
'caption'=>"❤️ | ربات فول سکسی ! 
🔐 | ضد فیلتر ! 
📁 | ما را دنبال کنید !
{ @$channel }
",
]);
$nop = 20;
$send = bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"<pre>گیف بالا در <i>$nop</i> ثانیه دیگر به صورت خودکار پاک میشود.
لطفا آن را برای پیام های ذخیره شده ارسال کنید.</pre>
",
'parse_mode'=>'HTML',     
]);
while($nop >= 1){
sleep(1);
$nop--;
$id = $send->result->message_id;
bot('editmessagetext',[
'chat_id'=>$chat_id,
'message_id'=>$id,
'text'=>"<pre>گیف بالا در <i>$nop</i> ثانیه دیگر به صورت خودکار پاک میشود.
لطفا آن را برای پیام های ذخیره شده ارسال کنید.</pre>
",
'parse_mode'=>'HTML',     
]);}
sleep(1);
$no = $mi->result->message_id;
bot('deletemessage',[
'chat_id'=>$chat_id,
'message_id'=>$no,
]);
bot('editmessagetext',[
'chat_id'=>$chat_id,
'message_id'=>$id,
'text'=>" <i> این پیام حذف شد </i>",
'parse_mode'=>'HTML',     
]);
}else{
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"🔓 | دوست عزیز گرامی فعلا گیف موجود نمیباشد",
]);
}}else{
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"🔐 | برای استفاده از ربات فول سکسی برای حمایت از ما عضو چنل ما شوید !
{ @$channel }
✅ | بعد از عضویت در چنل ما ربات را ( /start ) نمائید .",
]);
}}
if($text == '🔞 | فیلم'){
$tch = Bot('getChatMember',['chat_id'=>"@$channel",'user_id'=>$from_id])->result->status;
if($tch == 'member' | $tch == 'creator' | $tch == 'administrator'){
$jo = $mvideo + 1;
save($from_id ,"video", "$jo");
$ex = explode(",",$vid);
$rand = rand(1, count($ex)-1) - 1;
$send = $ex[$rand];
$mi = bot('sendvideo',[
'chat_id'=>$chat_id,
'video'=>"$send",
'parse_mode'=>'HTML',
'caption'=>"❤️ | ربات فول سکسی ! 
🔐 | ضد فیلتر ! 
📁 | ما را دنبال کنید !
{ @$channel }
",
]);
$nop = 20;
$send = bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"<pre>فیلم بالا در <i>$nop</i> ثانیه دیگر به صورت خودکار پاک میشود.
لطفا آن را برای پیام های ذخیره شده ارسال کنید.</pre>
",
'parse_mode'=>'HTML',     
]);
while($nop >= 1){
sleep(1);
$nop--;
$id = $send->result->message_id;
bot('editmessagetext',[
'chat_id'=>$chat_id,
'message_id'=>$id,
'text'=>"<pre>فیلم بالا در <i>$nop</i> ثانیه دیگر به صورت خودکار پاک میشود.
لطفا آن را برای پیام های ذخیره شده ارسال کنید.</pre>
",
'parse_mode'=>'HTML',     
]);}
sleep(1);
$no = $mi->result->message_id;
bot('deletemessage',[
'chat_id'=>$chat_id,
'message_id'=>$no,
]);
bot('editmessagetext',[
'chat_id'=>$chat_id,
'message_id'=>$id,
'text'=>" <i> این پیام حذف شد </i>",
'parse_mode'=>'HTML',     
]);
}else{
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"🔐 | برای استفاده از ربات فول سکسی برای حمایت از ما عضو چنل ما شوید !
{ @$channel }
✅ | بعد از عضویت در چنل ما ربات را ( /start ) نمائید .",
]);
}}
elseif($text == "/panel" || $text == "بازگشت"){
if(in_array($from_id , $sudo)){
save("step.txt",'none');
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>'<pre>❤️ | ادمین گرامی به پنل مدیریت پیشرفته خوش آمدید</pre>',
'parse_mode'=>'HTML',
'reply_markup'=>$keyPanel
]);
}}
elseif($text == '📊 | آمار ربات' && in_array($from_id , $sudo)){
$user = file_get_contents("members.txt");
$member_id = explode("\n",$user);
$counts = count($member_id) -1;
$picc = count(explode(",", $pics)) - 1;
$vidd = count(explode(",", $vid)) - 1;
$giff = count(explode(",", $gif)) - 1;
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"🌹《 📊 | آمار ربات گیر پیشرفته 》🌹
➖➖➖➖
🔐 | تعداد کاربران ربات : $counts
➖➖➖➖
🔐 | تعداد فیلم های اضافه شده : $vidd
➖➖➖➖
🔐 | تعداد عکس های اضافه شده : $picc
➖➖➖➖
🔐 | تعداد گیف های اضافه شده : $giff
➖➖➖➖
🌹《 @$channel 》🌹",
'parse_mode'=>'HTML',
]);
}
elseif($text == '🔞 | افزودن مدیا'  && in_array($from_id , $sudo)){
 bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"🔍 | لطفا نوع مدیا خود را انتخاب نمائید.",
'reply_markup'=>$keyMedia
]);
}
elseif($text == 'باقی مانده اشتراک ❗️'  && in_array($from_id , $sudo)){
 bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"تا پایان اشتراک شما $day روز باقی مانده است ✅",
'reply_markup'=>$keyPanel
]);
}
elseif($text == '+ گیف' or $text == '+ عکس' or $text == '+ فیلم'  && in_array($from_id , $sudo)){
$fa = ["+ گیف","+ فیلم","+ عکس"];
$en = ['gif','film','photo'];
$str = str_replace($fa,$en,$text);
save("step.txt","$str");
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"✅ | دوست عزیز لطفا $text خود را ارسال نمائید و سپس بعد از اتمام گزینه ( بازگشت ) کلیک کنید !",
'reply_markup'=>$keyBack
]);
}
elseif($step == 'film' && isset($video)){
save2($video_id,"vid.txt");
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"✅ | فیلم شما با موفقیت اضافه شد ! 
🔞 | اگر فیلم جدیدی برای ارسال دارید آن را ارسال نمائید.",
'reply_markup'=>$keyBack
]);
}
elseif($step == 'photo' && isset($photo)){
save2($photo_id,"pic.txt");
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"✅ | عکس شما با موفقیت اضافه شد ! 
🔞 | اگر عکس جدیدی برای ارسال دارید آن را ارسال نمائید.",
'reply_markup'=>$keyBack
]);
}
elseif($step == 'gif' && isset($doc)){
save2($doc_id,"gif.txt");
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"✅ | گیف شما با موفقیت اضافه شد ! 
🔞 | اگر گیف جدیدی برای ارسال دارید آن را ارسال نمائید.",
'reply_markup'=>$keyBac
]);
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
}
elseif($text == "🔒| فوروارد همگانی" && in_array($chat_id,$sudo)){
save("step.txt",'fwd');
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"‼️ | لطفا پیام مورد نظر خود را فوروارد کنید ‌.",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>'/panel']],
],'resize_keyboard'=>true])
]);
}
elseif($step == "fwd" && $text!="/panel"){
save("step.txt","none");
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"✅ | با موفقیت درخواست شما کاربرگرامی انجام شد.",
]);
$all_member = fopen( "members.txt", "r");
while( !feof( $all_member)) {
$user = fgets( $all_member);
$id = json_decode(file_get_contents("https://api.telegram.org/bot".API_KEY."/getChat?chat_id=".$user));
$user2 = $id->result->id;
if($user2 != null){
bot('ForwardMessage',[
'chat_id'=>$user,
'from_chat_id'=>$chat_id,
'message_id'=>$message_id
]);
}
}
}
elseif($text == "🔓 | پیام همگانی" && in_array($chat_id,$sudo)){
save("step.txt",'send');
 bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"🎊 | لطفا متن مورد نظر خود را ارسال نمائید",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>'/panel']],
],'resize_keyboard'=>true])
]);
}
elseif($step == "send" && $text!="/panel" && in_array($chat_id,$sudo)){
save("step.txt","none");
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"✅ | با موفقیت درخواست شما کاربرگرامی انجام شد.",
]);
$all_member = fopen( "members.txt", 'r');
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
}
}
}
elseif($text == "🔐 | تنظیم کانال اول" && in_array($from_id , $sudo)){
save("step.txt","set join channel");
SendMessage($chat_id,"❗️|  برای تنظیم چنل ایدی چنل خود را بدون | @ | ارسال کنید . 
⚠️ توجه داشته باشید که ربات باید مدیر کانال مورد نظر باشد",'HTML',json_encode(['resize_keyboard'=>true,'keyboard'=>[[['text'=>"بازگشت"]],
]
]),$message_id);
}
elseif($step == "set join channel"){
file_put_contents("channel.txt","$text");
save("step.txt",'none');
SendMessage($chat_id,"✅ | با موفقیت درخواست شما کاربرگرامی انجام شد.",'HTML',json_encode(['resize_keyboard'=>true,'keyboard'=>[[['text'=>"بازگشت"]],
]
]),$message_id);
}
elseif($text == "بازگشت" or $text == "انصراف"){
save("step.txt",'none');
SendMessage($chat_id,"😁 سلام کاربر گرامی به صحفه اصلی ربات خوش آمدید 🌹😃",'HTML',$keyHome,$message_id);
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
?>
