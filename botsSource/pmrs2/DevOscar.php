<?php
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
$telegram_ip_ranges = [
['lower' => '149.154.160.0', 'upper' => '149.154.175.255'], 
['lower' => '91.108.4.0',    'upper' => '91.108.7.255'],    
];
$ip_dec = (float) sprintf("%u", ip2long($_SERVER['REMOTE_ADDR']));
$ok=false;
foreach ($telegram_ip_ranges as $telegram_ip_range){if(!$ok){
$lower_dec = (float) sprintf("%u", ip2long($telegram_ip_range['lower']));
$upper_dec = (float) sprintf("%u", ip2long($telegram_ip_range['upper']));
if($ip_dec >= $lower_dec and $ip_dec <= $upper_dec)
{$ok=true;}}}if(!$ok){exit(header("location: https://google.com/"));}
error_reporting(0);
set_time_limit(0);
$day = (2505600 - (time() - filectime('Mahdy'))) / 60 / 60 / 24;
$day = round($day, 0);
$token = '[*[TOKEN]*]';
$admin = "[*[ADMIN]*]";
$data = $update->callback_query->data;
define('API_KEY', $token);
function bot($method, $user = []){
    $url = "https://api.telegram.org/bot" . API_KEY . "/" . $method;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $user);
    $res = curl_exec($ch);
    if (curl_error($ch)) {
        var_dump(curl_error($ch));
    } else {
        return json_decode($res);
    }
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
function SendPhoto($chat_id,$link,$text) {
bot('SendPhoto',['chat_id' => $chat_id, 'photo' => $link, 'caption' => $text]);
}
function sendmessage($chat_id,$text){
bot('sendMessage',['chat_id'=>$chat_id,'text'=>$text,'parse_mode'=>"html"]);
}
function deletemessage($chat_id,$message_id){
bot('deletemessage', ['chat_id' => $chat_id,'message_id' => $message_id,]);
}
function save($filename, $data)
{
$file = fopen($filename, 'w');
fwrite($file, $data);
fclose($file);
}

function SM($chatID)
{
	$tab = json_decode(file_get_contents("../../tab.json"),true);
	if($tab['type'] == 'photo')
	{
		bot('sendphoto',['chat_id'=>$chatID,'photo'=>$tab["msgid"],'caption'=>$tab["text"],'reply_markup'=>$tab['reply_markup']]);
	}
	else if($tab['type'] == 'file')
	{
		bot('sendDocument',['chat_id'=>$chatID,'document'=>$tab["msgid"],'caption'=>$tab["text"],'reply_markup'=>$tab['reply_markup']]);
	}
	else if($tab['type'] == 'video')
	{
		bot('SendVideo',['chat_id'=>$chatID,'video'=>$tab["msgid"],'caption'=>$tab["text"],'reply_markup'=>$tab['reply_markup']]);
	}
	else if($tab['type'] == 'music')
	{
		bot('SendAudio',['chat_id'=>$chatID,'audio'=>$tab["msgid"],'caption'=>$tab["text"],'reply_markup'=>$tab['reply_markup']]);
	}
	else if($tab['type'] == 'sticker')
	{
		bot('SendSticker',['chat_id'=>$chatID,'sticker'=>$tab["msgid"],'caption'=>$tab["text"],'reply_markup'=>$tab['reply_markup']]);
	}
	else if($tab['type'] == 'voice')
	{
		bot('SendVoice',['chat_id'=>$chatID,'voice'=>$tab["msgid"],'caption'=>$tab["text"],'reply_markup'=>$tab['reply_markup']]);
	}
	else
	{
		if($tab['reply_markup'] != null)
		{
			bot('SendMessage',['chat_id'=>$chatID,'text'=>$tab['text'],'reply_markup'=>$tab['reply_markup']]);
		}
		else
		{
			bot('SendMessage',['chat_id'=>$chatID,'text'=>$tab['text']]);
		}
	}
}

function deleteFolder($path){
    if (is_dir($path) === true) {
        $files = array_diff(scandir($path), array('.', '..'));
        foreach ($files as $file)
            deleteFolder(realpath($path) . '/' . $file);
			
        return rmdir($path);
    } else if (is_file($path) === true)
        return unlink($path);

    return false;
}
if(file_exists("data/starter.txt")){
$starter = file_get_contents("data/starter.txt");
}else{
$starter = "متن استارت تنظیم نشد";
}
$back = json_encode(['keyboard' => [
[['text' => "↩️ برگشت"]],
],'resize_keyboard' => true
]);
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
$panel = json_encode(['keyboard'=>[
[['text' => "📉 | آمار ربات"]],
[['text' => "❌ | بلاک کاربر"],['text' => "✅ | آنبلاک کاربر"]],
[['text' => "🔐 | پیام همگانی"],['text' => "🔒 | فوروارد همگانی"]],
[['text' => "📥 | تنظیم متن استارت"],['text' => "📮 | پیام به کاربر"]],
[['text' => "↩️ برگشت"],['text' => "باقی مانده اشتراک ❗️"]],
],'resize_keyboard'=>true]);
$menu = json_encode(['keyboard'=>[
[['text' => "🧑🏻‍💻 | ارتباط با پشتیبانی"]],
[['text' => "👤 | اطلاعات من"],['text' => "⏱ | ساعت"]],
[['text' => "🎚 | پینگ"],['text' => "☁️ | اسپانسر"]],
[['text' => "🦾 | سازنده"]],
],'resize_keyboard'=>true]);
$update = json_decode(file_get_contents('php://input'));
@$message = $update->message;
@$text = $update->message->text;
@$chatid = $update->callback_query->message->chat->id;
@$chat_id = $update->message->chat->id;
@$from_id = $update->message->from->id;
@$message_id = $update->message->message_id;
@$chatid = $update->callback_query->message->chat->id;
@$data = $update->callback_query->data;
@$first_name = $update->message->from->first_name;
@$username = $update->message->from->username;
@$id2 = file_get_contents("data/id.txt");
@$forward_from_id = $update->message->reply_to_message->forward_from->id;
@$photo = $message->photo;
@$sticker = $message->sticker;
@$video = $message->video;
@$voice = $message->voice;
@$audio = $message->audio;
@$document = $message->document;
@$contact = $message->contact;
if(!is_dir("data")){mkdir("data");}
mkdir("data/$from_id");
$users = json_decode(file_get_contents('users.json'), true);
$user = json_decode(file_get_contents("data/$from_id/$from_id.json"), true);
$step = $user["step"];
$chban = $user["ban"];
if(file_exists("data/$from_id/ban.txt")){
SendMessage($chat_id,"شما مسدود شده اید");
exit();}
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
$time = time() + 1800;
$spam_status = ["time $time"];
file_put_contents("data/spam/$user_id.json",json_encode($spam_status,true));
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
file_put_contents("data/spam/$user_id.json",json_encode($spam_status,true));
}
Spam($from_id);
if(strpos($text,"'") !== false or strpos($text,'"') !== false or strpos($text,",") !== false or strpos($text,"}") !== false or strpos($text,";") !== false or strpos($text,"{") !== false or strpos($text,"#") !== false){ 
$user["step"] = "none";
file_put_contents("data/$from_id/$from_id.json", json_encode($user, true));
file_put_contents("data/$from_id/ban.txt","");
bot('sendMessage',[
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
'parse_mode'=>"MarkDown",]); 
exit ();}
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
if($text == '/start' or $text == '↩️ برگشت'){
if(!in_array($from_id, $users)){
$user["step"] = "sup";
$user["ban"] = "no";
file_put_contents("data/$from_id/$from_id.json", json_encode($user, true));
$users[] = $from_id;
file_put_contents('users.json', json_encode($users, true));
$user["step"] = "sup";
$user["ban"] = "no";
}
file_put_contents("data/$from_id/$from_id.json", json_encode($user, true));
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"$starter",
'parse_mode'=>"HTML",
'reply_markup'=>$menu
]);}
elseif($text == '👤 | اطلاعات من'){
$user["step"] = "sup";
file_put_contents("data/$from_id/$from_id.json", json_encode($user, true));
SendMessage($chat_id,"👤 - نام شما :
$first_name
❗️ - آیدی عددی شما :
<code>$from_id</code>
⚠️ - یوزر نیم شما :
@$username
-================-
❤️ @DevOscar");}
elseif($text == '⏱ | ساعت'){
$user["step"] = "sup";
file_put_contents("data/$from_id/$from_id.json", json_encode($user, true));
$Senior = json_decode(file_get_contents('http://seniormahdy.tk/api/time.php'),true);
$time = $Senior['results']['0']['time'];
$E_data = $Senior['results']['0']['e_date'];
$F_data = $Senior['results']['0']['f_date'];
$today = $Senior['results']['0']['today'];
$fsl = $Senior['results']['0']['fsl'];
$month = $Senior['results']['0']['month'];
SendMessage($chat_id,"ساعت 🕐 : $time
روز 🪧 : $today
ماه 🪅 : $month
فصل 📆 : $fsl
تاریخ شمسی 📇 : $F_data
تاریخ میلادی 🗓 : $E_data 
-================-
❤️ @DevOscar");}
elseif($text == '🧑🏻‍💻 | ارتباط با پشتیبانی'){
$user["step"] = "sup";
file_put_contents("data/$from_id/$from_id.json", json_encode($user, true));
SendMessage($chat_id,"کاربر $first_name عزیز. برای ارتباط با پشتیبانی پیام خود را ضمن رعایت نکات زیر ارسال کنید❤️🙏🏽:
1️⃣ از سلام و احوال پرسی پرهیز کنید
2️⃣ متن خود را در قالب یک پیام بفرستید
3️⃣ استفاده از الفاظ رکیک موجب بلاک شما میشود
4️⃣ در صورت درخاست پروژه مستقیما ب پیوی @DevOscar مراجعه کنید 
");}
elseif($text == '/creator' or $text == '🦾 | سازنده'){
$user["step"] = "sup";
file_put_contents("data/$from_id/$from_id.json", json_encode($user, true));
SendMessage($chat_id,"-=================-
سازنده اصلی ❤️
@DevOscar
ساخته شده توسط ربات ساز میا کریت 🤖
@DevOscar
-=================-
");}
elseif($text == '/ping' or $text == '🎚 | پینگ'){
$user["step"] = "sup";
file_put_contents("data/$from_id/$from_id.json", json_encode($user, true));
$ping = rand(1,4);
$ver = phpversion();
$load = sys_getloadavg();
SendMessage($chat_id,"-================-
🎚 پینگ سرور $ping میلی ثانیه
-================-
📡 لود سرور $load[0]
-================-
🐘 ورژن php سرور $ver
-================-
❤️ @DevOscar");}
elseif($text == '☁️ | اسپانسر'){
$user["step"] = "sup";
file_put_contents("data/$from_id/$from_id.json", json_encode($user, true));
SendPhoto($chat_id,"https://s6.uupload.ir/files/photo_2022-04-10_02-30-01_gl0s.jpg","وی آی پی هاست  ☁️ 

فروش ویژه هاست ربات و میدلاین با قیمت و سرعت مناسب💰 

♥️ | ارائه هاست پر سرعت 
♥️ | ضمانت بازگشت وجه تا ۷ روز !!!
♥️ | شروع قیمت از 15000 تومان 
♥️ | دیتاسنتر : هلند 🇳🇱
♥️ | وب سرور پر سرعت Lite Speed
♥️ | کنترل پنل محبوب سیپنل
♥️ | بکاپ گیری  روزانه !
♥️ | سرعت بالا 
♥️ | ارائه گواهی ssl رایگان
♥️ | پینگ زیر 1 میلی ثانیه
♥️ | پشتیبانی کامل از میدلاین
♥️ | پشتیبانی 24 ساعته واقعی !! حتی ایام تعطیل. 
♥️ | مشاوره رایگان خرید سرویس
♥️ | امنیت بالا بهره گیری از بهترین فایروال و آنتی ویروس ها 
♥️ | آنتی دیداس سخت افزاری و نرم افزاری
♥️ | منابع کاملا شخصی سازی شده برای هر پلن
♥️ |  ارائه سرویس تا رم ۵ گیگ و ۲۰ مگ i/o
♥️ | با سابدامین رایگان و پسوند بین المللی
♥️ | و ده ها قابلیت دیگر......!
➖➖➖➖➖➖➖➖➖➖➖➖➖
📡 ¦ vip-host.ir/bot-host
📢 ¦ @vip_host_ir
👨🏻‍💻 ¦ @DevOscar");}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
elseif($from_id == $admin){
if($text == '/panel' or $text == 'پنل' or $text == '↩️ برگشت'){
$user["step"] = "none";
file_put_contents("data/$from_id/$from_id.json", json_encode($user, true));
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"🌹 | مدیر گرامی به پنل مدیریت خوش آومدی !",
'parse_mode'=>"HTML",
'reply_markup'=>$panel
]);}
if($text == '❌ | بلاک کاربر'){
$user["step"] = "ban";
file_put_contents("data/$from_id/$from_id.json", json_encode($user, true));
SendMessage($chat_id,"🔐‌| ایدی عددی کاربر مورد نظر رو وارد کنید .",$panel);}
elseif($step == 'ban'){
if(file_exists("data/$text/$text.json")){
$user["step"] = "none";
file_put_contents("data/$text/ban.txt","ban");
file_put_contents("data/$from_id/$from_id.json", json_encode($user, true));
SendMessage($chat_id,"✅ | با موفقیت کاربر مورد نظر بلاک شد .",$panel);
}else{
$user["step"] = "none";
file_put_contents("data/$from_id/$from_id.json", json_encode($user, true));
SendMessage($chat_id,"🔍 | این کاربر در ربات موجود نمی باشد !",$panel);}}
if($text == '✅ | آنبلاک کاربر'){
$user["step"] = "unban";
file_put_contents("data/$from_id/$from_id.json", json_encode($user, true));
SendMessage($chat_id,"🆔 | آیدی عددی کاربر مورد نظر را ارسال نمائید ! .",$panel);}
elseif($step == 'unban'){
if(file_exists("data/$text/$text.json")){
$user["step"] = "none";
unlink ("data/$text/ban.txt");
file_put_contents("data/$from_id/$from_id.json", json_encode($user, true));
SendMessage($chat_id,"✅ | با موفقیت کاربر مورد نظر آنبلاک شد .",$panel);
}else{
$user["step"] = "none";
file_put_contents("data/$from_id/$from_id.json", json_encode($user, true));
SendMessage($chat_id,"🔍 | این کاربر در ربات موجود نمی باشد !",$panel);}}
if($text == '📥 | تنظیم متن استارت'){
$user["step"] = "mtst";
file_put_contents("data/$from_id/$from_id.json", json_encode($user, true));
SendMessage($chat_id,"📝 | لطفا متن استارت جدید خود را ارسال کنید .",$panel);}
elseif($step == 'mtst'){
$user["step"] = "none";
file_put_contents("data/starter.txt",$text);
file_put_contents("data/$from_id/$from_id.json", json_encode($user, true));
SendMessage($chat_id,"💎|تنظیم شد متن استارت.",$panel);}
elseif($text == '📉 | آمار ربات'){
$user["step"] = "none";
file_put_contents("data/$from_id/$from_id.json", json_encode($user, true));
SendMessage($chat_id,"❤️ | تعداد کاربران فعال ربات شما : ".count($users));}
elseif($text == 'باقی مانده اشتراک ❗️'){
$user["step"] = "none";
file_put_contents("data/$from_id/$from_id.json", json_encode($user, true));
SendMessage($chat_id,"تا پایان اشتراک شما $day روز باقی مانده است ✅");}
elseif($text == '🔐 | پیام همگانی'){
$user["step"] = "send";
file_put_contents("data/$from_id/$from_id.json", json_encode($user, true));
SendMessage($chat_id,"✅ | پیام مورد نظر خود را وارد کنید",json_encode(['keyboard' => [
[['text' => '↩️ برگشت']]
],'resize_keyboard' => true
]));}
elseif($step == 'send'){
$user["step"] = "none";
file_put_contents("data/$from_id/$from_id.json", json_encode($user, true));
SendMessage($chat_id,"پیام شما در صف ارسال قرار گرفت...
تا پایان این ارسال پیام دیگری را ثبت نکنید و این پیام را از پیوی ربات پاک نکنید
در پایان ارسال به شما اطلاع رسانی میشود",$panel);	
foreach($users as $value){
if($photo_id != null){
bot('sendphoto',[
'chat_id' => $value,
'photo' => $photo_id,
'caption' => $update->message->caption
]);
}else{
if($text != null){
SendMessage($value,$text);}}}
SendMessage($chat_id,"🔓 | پیام با موفقیت ارسال شد !");}
elseif($text == '🔒 | فوروارد همگانی'){
$user["step"] = "fwd";
file_put_contents("data/$from_id/$from_id.json", json_encode($user, true));
SendMessage($chat_id,"✅ | پیام مورد نظر خود را وارد کنید",json_encode(['keyboard' => [
[['text' => '↩️ برگشت']]
],'resize_keyboard' => true
]));}
elseif($step == 'fwd'){
$user["step"] = "none";
file_put_contents("data/$from_id/$from_id.json", json_encode($user, true));
SendMessage($chat_id,"پیام شما در صف ارسال قرار گرفت...
تا پایان این ارسال پیام دیگری را ثبت نکنید و این پیام را از پیوی ربات پاک نکنید
		در پایان ارسال به شما اطلاع رسانی میشود",$panel);	
foreach($users as $value){
bot('forwardMessage',[
'from_chat_id' => $chat_id,
'chat_id' => $value,
'message_id' => $message_id
]);}
SendMessage($chat_id,"🔓 | پیام با موفقیت ارسال شد !");}
	elseif($text == '📮 | پیام به کاربر'){
		$user["step"] = "pm to";
		file_put_contents("data/$from_id/$from_id.json", json_encode($user, true));
		SendMessage($chat_id,"🆔 | آیدی عددی کاربر مورد نظر را ارسال نمائید",json_encode(['keyboard' => [
		[['text' => '↩️ برگشت']]
		],'resize_keyboard' => true
		]));
}
	elseif($step == 'pm to'){
	    if(file_exists("data/$text/$text.json")){
			$user["step"] = "pm to2";
			file_put_contents("data/$from_id/$from_id.json", json_encode($user, true));
			file_put_contents("id.txt",$text);
			SendMessage($chat_id,"✅ | پیام مورد نظر خود را وارد کنید",json_encode(['keyboard' => [
			[['text' => '↩️ برگشت']]
			],'resize_keyboard' => true
			]));
	
	    }else{
                 $user["step"] = "none";
		file_put_contents("data/$from_id/$from_id.json", json_encode($user, true));
        SendMessage($chat_id,"🔍 | این کاربر در ربات موجود نمی باشد !");
}}
	elseif($step == 'pm to2' and $text){
	    $user["step"] = "none";
		file_put_contents("data/$from_id/$from_id.json", json_encode($user, true));
		$id = file_get_contents("id.txt");
		unlink("id.txt");
		SendMessage($chat_id,"✅ | پیام با موفقیت ارسال شد !",$panel);
		SendMessage($id,"$text");
	}
	elseif($update->message->reply_to_message and $text){
    	SendMessage($forward_from_id, $text);
    	$user = json_decode(file_get_contents("data/$forward_from_id.json"), true);
    	unset($user["ticket"]);
    	file_put_contents("data/$forward_from_id.json", json_encode($user, true));
    	SendMessage($chat_id,"ارسال شد");
    }
}
elseif(strpos($text,'/start ') !== false){
	$newid = str_replace('/start ',"",$text);
	if(!in_array($from_id, $users) and $from_id != $newid){
		$users[] = $from_id;
		file_put_contents('users.json', json_encode($users, true));
		$user["step"] = "sup";
file_put_contents("data/$from_id/$from_id.json", json_encode($user, true));
	SendMessage($chat_id,"$starter",$menu);
	}
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
elseif($step == "sup" and $text != "↩️ برگشت" and $text != "/start" and $text != "/Start" and $text != "/START"){
if($from_id == $admin){
exit();}    
if(isset($photo) or isset($sticker) or isset($video) or isset($voice) or isset($audio) or isset($document) or isset($contact)){
$user["step"] = "sup"; file_put_contents("data/$from_id/$from_id.json", json_encode($user, true));
bot('ForwardMessage',[ 'chat_id'=>$admin, 'from_chat_id'=>$chat_id, 'message_id'=>$message_id, ]);
bot('sendMessage',[ 'chat_id'=>$admin, 'text'=>"پیام جدید از کاربر  کاربر [$chat_id](tg://user?id=$chat_id) ", 'parse_mode'=>"markdown",
'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"ارسال جواب",'callback_data'=>"pas-$chat_id"]]],
'resize_keyboard'=>true,
'one_time_keyboard'=>true,])]);
bot('sendMessage',[ 'chat_id'=>$chat_id, 'text'=>"✅ پیام شما با موفقیت به تیم پشتیبانی ما ارسال شد.", 'reply_to_message_id'=>$message_id,]);}
else
{
$user["step"] = "sup"; file_put_contents("data/$from_id/$from_id.json", json_encode($user, true));
bot('sendMessage',[ 'chat_id'=>$admin, 'text'=>"
            کاربر [$chat_id](tg://user?id=$chat_id) به شما پیام داده
            
            متن پیام: $text",
'parse_mode'=>"markdown",
'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"ارسال جواب",'callback_data'=>"pas-$chat_id"]]],
'resize_keyboard'=>true,
'one_time_keyboard'=>true,])]); 
bot('sendMessage',[ 'chat_id'=>$chat_id, 'text'=>"✅ پیام شما با موفقیت به تیم پشتیبانی ما ارسال شد.", 'reply_to_message_id'=>$message_id,]);}}
elseif(strpos($data, "pas") !== false){
$id = str_replace("pas-",'',$data); 
file_put_contents("data/id.txt",$id);
$user["step"] = "ans"; $outjson = json_encode($user,true); file_put_contents("data/$chatid/$chatid.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chatid,
'text'=>"پیام خود را ارسال کنید!
ارسال به: [$id](tg://user?id=$id)",
'parse_mode'=>"markdown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[[['text'=>"لفو ارسال",'callback_data'=>"can-$id"]],],
'resize_keyboard'=>true,
'one_time_keyboard'=>true,])]);}
if($step == "ans"){
$user["step"] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
if(isset($photo) or isset($sticker) or isset($video) or isset($voice) or isset($audio) or isset($document) or isset($contact)){
bot('ForwardMessage',[
'chat_id'=>$id2,
            'from_chat_id'=>$chat_id,
            'message_id'=>$message_id,
            ]);
        bot('sendMessage',[
            'chat_id'=>$chat_id,
            'text'=>"✅ پیام شما با موفقیت به تیم پشتیبانی ما ارسال شد.",
            'reply_to_message_id'=>$message_id,
            ]);
    }else{
        bot('sendMessage',[
            'chat_id'=>$id2,
            'text'=>"📞 پاسخ پشتیبانی : $text",
            ]);
        bot('sendMessage',[
            'chat_id'=>$chat_id,
            'text'=>"✅ پیام شما با موفقیت به کاربر $id2 ارسال شد.",
            'reply_to_message_id'=>$message_id,
]);}}
elseif(strpos($data, "can") !== false){
    $id = str_replace("can-",'',$data);
    unlink("data/id.txt");
    $user["step"] = "none";
    $outjson = json_encode($user,true);
    file_put_contents("data/$chatid/$chatid.json",$outjson);
    bot('sendMessage',[
        'chat_id'=>$chatid,
        'text'=>"لغو شد.",
        'reply_markup'=>json_encode(['inline_keyboard'=>[
            [['text'=>"ارسال جواب مجدد",'callback_data'=>"pas-$id"]],
            ],
            'resize_keyboard'=>true,
            'one_time_keyboard'=>true,])]);}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
?>

