<?php
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
flush();
ob_start();
set_time_limit(0);
error_reporting(0);
ob_implicit_flush(1);
$telegram_ip_ranges = [
['lower' => '149.154.160.0', 'upper' => '149.154.175.255'], // literally 149.154.160.0/20
['lower' => '91.108.4.0',    'upper' => '91.108.7.255'],    // literally 91.108.4.0/22
];

$ip_dec = (float) sprintf("%u", ip2long($_SERVER['REMOTE_ADDR']));
$ok=false;

foreach ($telegram_ip_ranges as $telegram_ip_range) if (!$ok) {
    // Make sure the IP is valid.
    $lower_dec = (float) sprintf("%u", ip2long($telegram_ip_range['lower']));
    $upper_dec = (float) sprintf("%u", ip2long($telegram_ip_range['upper']));
    if ($ip_dec >= $lower_dec and $ip_dec <= $upper_dec) $ok=true;
}
if (!$ok) die("No spam 🙃");

include("config.php");
include("jdf.php");
###<<// Plug \\>>###

include 'Plug/Functions.php';
include 'Plug/Buttons.php';
###<<// Variables \\>>###

$up = json_decode(file_get_contents('php://input'));
$time = jdate("H:i:s");
$date = jdate("Y:m:d");
$message = $up->message;
$msg = $message->text;
$callback_query = $up->callback_query;
$data = $callback_query->data;
if(isset($message))
{
	$chatID = $message->chat->id;
	$msg_id = $message->message_id;
	$userID = $message->from->id;
	$first_name = $message->from->first_name;
	$username = $message->from->username;
	$Tc = $message->chat->type;
}
if(isset($callback_query))
{
	$data_id = $callback_query->id;
	$chatID = $callback_query->message->chat->id;
	$inline_keyboard = $callback_query->message->reply_markup->inline_keyboard;
	$userID = $callback_query->from->id;
	$first_name = $callback_query->from->first_name;
	$username = $callback_query->from->username;
	$Tc = $callback_query->message->chat->type;
	$msg_id = $callback_query->message->message_id;
}
if($channel != null or $channel != '')
{
	$Join = GCM("@$channel",$userID);
}
else
{
	$Join = 'member';
}
if($channel2 != null or $channel2 != '')
{
	$Join2 = GCM("@$channel2",$userID);
}
else
{
	$Join2 = 'member';
}
if(in_array($chatID,$Dev))
{
	$Button_Home = $Button_Admins_Home;
}



if(isset($userID) and is_file("base/$userID.json"))
{
	$user = json_decode(file_get_contents("base/$userID.json"),true);
	$step = $user['step'];
	$Points = $user['Points'];
	$User = $user['User'];
	$create = $user['create'];
}
if(is_file("list.json"))
{
	$list = json_decode(file_get_contents("list.json"),true);
	$ban = $list['ban'];
}

###<<// Codes \\>>###

$time1 = time();
$time2 = $time1 + 1;
if($user['spam'] > 10 and $user['spamtime'] <= $time1)
{
 $user['spam'] = 0;
 $user['spamtime'] = $time1 + 600;
 saveJson("base/$userID.json",$user);
 SA($chatID,'typing');
 SM($chatID,"❌ شما به دلیل اسپم زدن ده دقیقه از ربات بلاک شدین.",'html',$msg_id);
 exit();
}
if($user['time'] == $time1 or $user['time'] == $time2)
{
 $spam = $user['spam'];
 $user['spam'] = $spam + 1;
 saveJson("base/$userID.json",$user);
 exit();
}
else
{
 $user['spam'] = 0;
}
if($user['spamtime'] >= $time1)
{
 exit();
}
if(isset($chatID) and $Tc == 'private')
{
 $user['time'] = $time1;
}
if(in_array($userID,$ban))
{
 SA($chatID,'typing');
 SM($chatID,"اکانت شما به دلیل اسپم زدن مسدود شده❌\nدر صورتی که فکر میکنید اشتباهی شده با آیدی زیر در تماس باشید👇🏻👇🏻\n\n🆔 : @$Support",'html',$msg_id);
 exit();
}

if(isset($user['start']) and ($Join == 'member' or $Join == 'creator' or $Join == 'administrator') and ($Join2 == 'member' or $Join2 == 'creator' or $Join2 == 'administrator') and $Tc == 'private')
{
	$start = $user['start'];
	SA($start,'typing');
	$ustart = json_decode(file_get_contents("base/$start.json"),true);
	$Pointsplus = $ustart['Points'] + $Subdivision_Points;
	$ustart['Points'] = $Pointsplus;
	saveJson("base/$start.json",$ustart);
	$nemebot = GMN();
	SM($start,"❇️تبریک!!!\n یک کاربر با لینک فعالسازی شما عضو رباتساز $nemebot شد و $Subdivision_Points امتیاز به شما اضافه شد",'html');
	unset($user['start']);
	saveJson("base/$userID.json",$user);
}
if($msg == '/start' and $Tc == 'private')
{
	SA($chatID,'typing');
	$userbot = GMUN();
	$nemebot = GMN();
	SM($chatID,"سلام  $first_name 🤩👋\n \nورود شمارا به رباتساز حرفه ای تروکس
 خوشآمد میگویم❤️‍🔥 \n  
                     --- --- --- --- --- --- --- --- --- --- --- ---
#کیفیت⚜ #امنیت🔐 #سرعت 🚀
                     --- --- --- --- --- --- --- --- --- --- --- --- \n  \n زمان ورود ⏱⇠  「 $time 」\n تاریخ ورود 🗓⇠  「 $date 」",'html',$msg_id,$Button_Home);
	if(!is_file("base/$userID.json"))
	{
		$user['step'] = 'none';
		$user['Points'] = 0;
		$user['create'] = 0;
	}
	else
	{
		$user['step'] = 'none';
	}
	saveJson("base/$userID.json",$user);
}
else if(strpos($msg , '/start ') !== false and $Tc == 'private')
{
	$userbot = GMUN();
	$nemebot = GMN();
	if(!is_file("base/$userID.json"))
	{
		SA($chatID,'typing');
		SM($chatID,"سلام  $first_name 🤩👋\n \nورود شمارا به رباتساز حرفه ای تروکس
 خوشآمد میگویم❤️‍🔥 \n  
                     --- --- --- --- --- --- --- --- --- --- --- ---
#کیفیت⚜ #امنیت🔐 #سرعت 🚀
                     --- --- --- --- --- --- --- --- --- --- --- --- \n  \n زمان ورود ⏱⇠  「 $time 」\n تاریخ ورود 🗓⇠  「 $date 」",'html',$msg_id,$Button_Home);
		$user['step'] = 'none';
		$user['Points'] = 0;
		$user['create'] = 0;
		$start = str_replace("/start ",null,$msg);
		if(is_file("base/$start.json"))
		{
			if(($Join != 'member' and $Join != 'creator' and $Join != 'administrator') or ($Join2 != 'member' and $Join2 != 'creator' and $Join2 != 'administrator'))
			{
				$user['start'] = $start;
			}
			else
			{
				SA($start,'typing');
				$ustart = json_decode(file_get_contents("base/$start.json"),true);
				$Pointsplus = $ustart['Points'] + $Subdivision_Points;
				$ustart['Points'] = $Pointsplus;
				saveJson("base/$start.json",$ustart);
				$nemebot = GMN();
				SM($start,"🎉 یک نفر از طریق لینک شما وارد شد و  $Subdivision_Points امتیاز دریافت کردید.",'html');
			}
		}
	}
	else
	{
		$user['step'] = 'none';
		SA($chatID,'typing');
		SM($chatID,"سلام  $first_name 🤩👋\n \nورود شمارا به رباتساز حرفه ای تروکس
 خوشآمد میگویم❤️‍🔥 \n  
                     --- --- --- --- --- --- --- --- --- --- --- ---
#کیفیت⚜ #امنیت🔐 #سرعت 🚀
                     --- --- --- --- --- --- --- --- --- --- --- --- \n  \n زمان ورود ⏱⇠  「 $time 」\n تاریخ ورود 🗓⇠  「 $date 」",'html',$msg_id,$Button_Home);
	}
	saveJson("base/$userID.json",$user);
}
else if($Join != 'member' and $Join != 'creator' and $Join != 'administrator' and $Tc == 'private')
{
	if($Join2 != 'member' and $Join2 != 'creator' and $Join2 != 'administrator')
	{
		SA($chatID,'typing');
		$nemebot = GMN();
		SM($chatID,"👨‍✈️| دوست عزیز بدلیل رایگان بودن ربات و همچنین حمایت از ما ابتدا در کانال های اسپانسر جوین شوید\n \n💫~ |『 @$channel 』\n \n🔓| بعد از « عضویت » بروی دکمه زیر کلیک کنید 👇",'html',$msg_id, $Button_Join);
	}
	else
	{
		SA($chatID,'typing');
		$nemebot = GMN();
		SM($chatID,"👨‍✈️| دوست عزیز بدلیل رایگان بودن ربات و همچنین حمایت از ما ابتدا در کانال های اسپانسر جوین شوید\n \n💫~ |『 @$channel 』\n \n🔓| بعد از « عضویت » بروی دکمه زیر کلیک کنید 👇",'html',$msg_id,$Button_Join);
	}
}
else if($Join2 != 'member' and $Join2 != 'creator' and $Join2 != 'administrator')
{
	SA($chatID,'typing');
	$nemebot = GMN();
	SM($chatID,"👨‍✈️| دوست عزیز بدلیل رایگان بودن ربات و همچنین حمایت از ما ابتدا در کانال های اسپانسر جوین شوید\n \n💫~ |『 @$channel 』\n \n🔓| بعد از « عضویت » بروی دکمه زیر کلیک کنید 👇",'html',$msg_id,$Button_Join);
}
else if($msg == '-『 بازگشت 』-' and $Tc == 'private')
{
	SA($chatID,'typing');
	$user['step'] = 'none';
	SM($chatID,"✅به منوی اصلی بازگشتید",'html',$msg_id,$Button_Home);
	saveJson("base/$userID.json",$user);
}
else if($msg == 'برگشت 🔙' and $Tc == 'private')
{
	if($step == 'CrEsm' or $step == 'Crmem' or $step == 'Crpv' or $step == 'Crzds' or $step == 'Crtele' or $step == 'Crchat' or $step == 'Crzdl' or $step == 'Crbaner')
	{
		SA($chatID,'typing');
		$user['step'] = 'Cr';
		SM($chatID,"گزینه مورد نظر را انتخاب کنید",'html',$msg_id,$Button_Create);
		saveJson("base/$userID.json",$user);
	}
	else if($step == 'UpRoBot2')
	{
		if(!isset($user['RoBots'][0]))
		{
			$user['step'] = 'none';
			SA($chatID,'typing');
			SM($chatID,"❌ شما رباتی نساخته اید.",'html',$msg_id,$Button_Home);
		}
		else
		{
			SA($chatID,'typing');
			$user['step'] = 'UpRoBot';
			foreach($user['RoBots'] as $bots)
			{
				$button[] = [['text'=>$bots]];
			}
			$button[] = [['text'=>'-『 بازگشت 』-']];
			$Button_UpRoBot = json_encode(['keyboard'=>$button,'resize_keyboard'=>true]);
			SM($chatID,"🤖 ربات مد نظرتونو انتخاب کنین.",'html',$msg_id,$Button_UpRoBot);
		}
	}
	else if(in_array($chatID,$Dev))
	{
		SA($chatID,'typing');
		$user['step'] = 'none';
		SM($chatID,"👨🏻‍🔧 قربان به پنل مدیریت برگشتیم.\n📍 لطفا گزینه مورد نظر را انتخاب کنید.",'html',$msg_id,$Button_Admins_Panel);
	}
	saveJson("base/$userID.json",$user);
}
else if($msg == '🎁' and $Tc == 'private')
{
	SA($chatID,'typing');
	$user['step'] = 'code';
	SM($chatID,"خب دوست عزیز لطفا کد هدیه رو وارد کنید.",'html',$msg_id,$Button_Back);
	saveJson("base/$userID.json",$user);
}
else if($step == 'code' and $Tc == 'private')
{
	SA($chatID,'typing');
	if(is_file("$msg.txt"))
	{
		$GetPoints = file_get_contents("$msg.txt");
		unlink("$msg.txt");
		$user['Points'] = $Points + $GetPoints;
		$user['step'] = 'none';
		$userbot = GMUN();
		SM($chatID,"کد صحیح بود و مقدار $GetPoints امتیاز به حساب شما واریز شد.",'html',$msg_id,$Button_Home);
		SM("@$channel","✅کد رایگان امتیازی در تاریخ $date و در ساعت $time استفاده شد.

💢توسط : [$userID](tg://user?id=$userID)
📥امتیاز دریافتی : $GetPoints
",'MarkDown',@$channel,$Button_Ho3win);
	}
	else
	{
		SM($chatID,"کد مورد نظر اشتباه است یا استفاده شده.",'html',$msg_id);
	}
	saveJson("base/$userID.json",$user);
}
else if($msg == 'حذف ربات 📛' and $Tc == 'private')
{
	if(!isset($user['RoBots'][0]))
	{
		SA($chatID,'typing');
		SM($chatID,"❌ شما رباتی نساخته اید.",'html');
	}
	else
	{
		SA($chatID,'typing');
		$user['step'] = 'DelBot';
		foreach($user['RoBots'] as $bots)
		{
			$button[] = [['text'=>$bots]];
		}
		$button[] = [['text'=>'-『 بازگشت 』-']];
		$Button_BotDel = json_encode(['keyboard'=>$button,'resize_keyboard'=>true]);
		SM($chatID,"🤖 ربات مد نظرتونو انتخاب کنین.",'html',$msg_id,$Button_BotDel);
	}
	saveJson("base/$userID.json",$user);
}
else if($step == 'DelBot' and $Tc == 'private')
{
	if(in_array($msg,$user['RoBots']))
	{
		$msg = str_replace('@',null,$msg);
		SA($chatID,'typing');
		$user['step'] = 'DelBot2';
		$user['DelBot'] = $msg;
		SM($chatID,"🤡 آیا از حذف ربات @$msg مطمئن هستید؟",'html',null,$Button_Safe);
	}
	else
	{
		SA($chatID,'typing');
		SM($chatID,"🚧 لطفا از دکمه های زیر استفاده کنید.",'html');
	}
	saveJson("base/$userID.json",$user);
}
else if($step == 'DelBot2' and $Tc == 'private')
{
	if($data == "Yes")
	{
		DLM($chatID, $msg_id);
		$DelBot = $user['DelBot'];
		SA($chatID,'typing');
		$user['step'] = 'none';
		if(!is_file("RoBots/$DelBot/VIP"))
		{
			$user['create'] = $create - 1;
		}
		$key = array_search("@$DelBot",$user['RoBots']);
		unset($user['RoBots'][$key]);
		$user['RoBots'] = array_values($user['RoBots']);
		$base = json_decode(file_get_contents("base.json"),true);
		$token = $base['tokensandadmins']["$DelBot"]['token'];
		file_get_contents("https://api.telegram.org/bot$token/setwebhook");
		unset($base['tokensandadmins']["$DelBot"]);
		saveJson("base.json",$base);
		$access = json_decode(file_get_contents("access.json"),true);
		$key = array_search("@$DelBot",$access['RoBots']);
		unset($access['RoBots'][$key]);
		$access['RoBots'] = array_values($access['RoBots']);
		saveJson("access.json",$access);
		DL_Folder("RoBots/$DelBot");
		SA($chatID,'typing');
		SM($chatID,"☠️ ربات مورد نظر شما با موفقیت حذف شد.",'html',null,$Button_Home);
	}
	else if($data == "No")
	{
		DLM($chatID, $msg_id);
		SA($chatID,'typing');
		$user['step'] = 'none';
		SM($chatID,"🚏 عملیات حذف ربات با موفقیت لغو شد.",'html',null,$Button_Home);
	}
	saveJson("base/$userID.json",$user);
}

else if($msg == '🔃' and $Tc == 'private')
{
	$user['step'] = 'transfer';
	SA($chatID,'typing');
	SM($chatID,"🆔 برای انتقال امتیاز نیاز به شناسه عددی شخص مورد نظر هست لطفا شناسه را وارد کنید.",'html',$msg_id,$Button_Back);
	saveJson("base/$userID.json",$user);
}
else if($step == 'transfer' and $Tc == 'private')
{
	$ok = GCMB($msg);
	if($ok == true)
	{
		SA($chatID,'typing');
		$user['step'] = 'transfer2';
		$user['User'] = $msg;
		SM($chatID,"✅ خب حالا تعداد امتیازی که میخواهید به کاربر انتقال داده شود را با عدد لاتین وارد کنید. 🔢",'html',$msg_id,$Button_Back2);
	}
	else
	{
		SA($chatID,'typing');
		SM($chatID,"❌ این کاربر عضو ربات نیست قربان",'MarkDown',$msg_id);
	}
	saveJson("base/$userID.json",$user);
}
else if($step == 'transfer2' and $Tc == 'private')
{
	SA($chatID,'typing');
	if($msg <= $Points)
	{
		if($msg >= 1)
		{
			$user['Points'] = $Points - $msg;
			$user['step'] = 'none';
			$userget = json_decode(file_get_contents("base/$User.json"),true);
			$Pointsplus = $userget['Points'] + $msg;
			$userget['Points'] = $Pointsplus;
			saveJson("base/$User.json",$userget);
			SM($chatID,"✅ خب حالا تعداد امتیازی که میخواهید به کاربر انتقال داده شود را با عدد لاتین وارد کنید. 🔢",'html',$msg_id,$Button_Home);
		}
		else
		{
			SM($chatID,"1️⃣ لطفا عددی بزرگتر از 1 وارد کنید.",'MarkDown',$msg_id);
		}
	}
	else
	{
		SM($chatID,"👨‍✈️ موجودی شما برای این انتقال کافی نیست.",'MarkDown',$msg_id);
	}
	saveJson("base/$userID.json",$user);
}
else if($msg == 'آپدیت ربات ♻️' and $Tc == 'private')
{
	if(!isset($user['RoBots'][0]))
	{
		SA($chatID,'typing');
		SM($chatID,"❌ شما رباتی نساخته اید.",'html');
	}
	else
	{
		SA($chatID,'typing');
		$user['step'] = 'UpRoBot';
		foreach($user['RoBots'] as $bots)
		{
			$button[] = [['text'=>$bots]];
		}
		$button[] = [['text'=>'-『 بازگشت 』-']];
		$Button_UpRoBot = json_encode(['keyboard'=>$button,'resize_keyboard'=>true]);
		SM($chatID,"🤖 ربات مد نظرتونو انتخاب کنین.",'html',$msg_id,$Button_UpRoBot);
	}
	saveJson("base/$userID.json",$user);
}
else if($step == 'UpRoBot' and $Tc == 'private')
{
	if(in_array($msg,$user['RoBots']))
	{
		$msg = str_replace('@',null,$msg);
		SA($chatID,'typing');
		$user['step'] = 'UpRoBot2';
		$user['UP Bot'] = $msg;
		SM($chatID,"🔑 اگر در ربات @Botfather توکن رباتتونو عوض کردین اینجا توکن جدید رو بفرستین در غیر این صورت عدد 0 را وارد کنید.",'html',$msg_id,$Button_Back2);
	}
	else
	{
		SA($chatID,'typing');
		SM($chatID,"🚧 لطفا از دکمه های زیر استفاده کنید.",'html');
	}
	saveJson("base/$userID.json",$user);
}
else if($step == 'UpRoBot2' and $Tc == 'private')
{
	if($msg == '0')
	{
		$UP_Bot = $user['UP Bot'];
		$base = json_decode(file_get_contents("base.json"),true);
		$kind_of = $base['tokensandadmins']["$UP_Bot"]['kind of'];
		if($kind_of == 'Esm')
		{
			SA($chatID,'typing');
			$user['step'] = 'none';
			$base = json_decode(file_get_contents("base.json"),true);
			$token = $base['tokensandadmins']["$UP_Bot"]['token'];
			saveJson("base.json",$base);
			$config = file_get_contents("src/Family/config.php");
			$config = str_replace("[*[TOKEN]*]",$token,$config);
			$config = str_replace("[*[ADMIN]*]",$userID,$config);
			$config = str_replace("[*[USERNAME]*]",$UP_Bot,$config);
			Save("RoBots/$UP_Bot/config.php",$config);
			copy('src/Family/bot.php',"RoBots/$UP_Bot/bot.php");
			copy('src/Family/send.php',"RoBots/$UP_Bot/send.php");
			copy('src/Family/wordlist.json',"RoBots/$UP_Bot/data/wordlist.json");
			file_get_contents("https://api.telegram.org/bot$token/setwebhook?url=$URL/RoBots/$UP_Bot/bot.php");
			$userbot = GMUN();
			$nemebot = GMN();
			$textbot = "🤖ربات شما با موفقیت به سرور پرسرعت🚀 ربات ساز $nemebot\n @$userbot\nبروزرسانی شد♻️\nجهت شروع ربات /start را ارسال کنید.";
			file_get_contents("http://api.telegram.org/bot$token/sendMessage?chat_id=$chatID&text=$textbot");
			SA($chatID,'typing');
			SM($chatID,"ربات شما با موفقیت آپدیت شد♻️\nبرای رفتن به پنل مدیریت در ربات دستور /panel را ارسال کنید✔️\n😎جهت ورود به ربات خود کلیک کنید👇",'html',null,json_encode(['inline_keyboard'=>[[['text'=>"🚀ورود به ربات🚀",'url'=>"https://t.me/$UP_Bot"]],]]));
			SA($chatID,'typing');
			SM($chatID,"✅به منوی اصلی بازگشتید.",'html',null,$Button_Home);
		}
		else if($kind_of == 'mem')
		{
		

			SA($chatID,'typing');
			$user['step'] = 'none';
			$base = json_decode(file_get_contents("base.json"),true);
			$token = $base['tokensandadmins']["$UP_Bot"]['token'];
			$resultb = GUNB($token);
			$id_bot = $resultb["result"]["id"];
			saveJson("base.json",$base);
			$index = file_get_contents("src/mem/index.php");
			$index = str_replace("[*[TOKEN]*]",$token,$index);
			$index = str_replace("[*[ADMIN]*]",$userID,$index);
			$index = str_replace("[*[IDBOT]*]",$id_bot,$index);
			$index = str_replace("[*[USERNAME]*]",$UP_Bot,$index);
			Save("RoBots/$UP_Bot/index.php",$index);
			$send = file_get_contents("src/mem/send.php");
			$send = str_replace("[*[TOKEN]*]",$token,$send);
			Save("RoBots/$UP_Bot/send.php",$send);
			file_get_contents("https://api.telegram.org/bot$token/setwebhook?url=$URL/RoBots/$UP_Bot/index.php");
			$userbot = GMUN();
			$nemebot = GMN();
			$textbot = "🤖ربات شما با موفقیت به سرور پرسرعت🚀 ربات ساز $nemebot\n @$userbot\nبروزرسانی شد♻️\nجهت شروع ربات /start را ارسال کنید.";
			file_get_contents("http://api.telegram.org/bot$token/sendMessage?chat_id=$chatID&text=$textbot");
			SA($chatID,'typing');
			SM($chatID,"ربات شما با موفقیت آپدیت شد♻️\nبرای رفتن به پنل مدیریت در ربات دستور /panel را ارسال کنید✔️\n😎جهت ورود به ربات خود کلیک کنید👇",'html',null,json_encode(['inline_keyboard'=>[[['text'=>"🚀ورود به ربات🚀",'url'=>"https://t.me/$UP_Bot"]],]]));
			SA($chatID,'typing');
			SM($chatID,"✅به منوی اصلی بازگشتید.",'html',null,$Button_Home);
		}
		else if($kind_of == 'zds')
		{
			SA($chatID,'typing');
			$user['step'] = 'none';
			$base = json_decode(file_get_contents("base.json"),true);
			$token = $base['tokensandadmins']["$UP_Bot"]['token'];
			saveJson("base.json",$base);
			$index = file_get_contents("src/zds/index.php");
			$index = str_replace("[*[TOKEN]*]",$token,$index);
			$index = str_replace("[*[ADMIN]*]",$userID,$index);
			Save("RoBots/$UP_Bot/index.php",$index);
			file_get_contents("https://api.telegram.org/bot$token/setwebhook?url=$URL/RoBots/$UP_Bot/index.php");
			$userbot = GMUN();
			$nemebot = GMN();
			$textbot = "🤖ربات شما با موفقیت به سرور پرسرعت🚀 ربات ساز $nemebot\n @$userbot\nبروزرسانی شد♻️\nجهت شروع ربات /start را ارسال کنید.";
			file_get_contents("http://api.telegram.org/bot$token/sendMessage?chat_id=$chatID&text=$textbot");
			SA($chatID,'typing');
			SM($chatID,"ربات شما با موفقیت آپدیت شد♻️\nبرای رفتن به پنل مدیریت در ربات دستور /panel را ارسال کنید✔️\n😎جهت ورود به ربات خود کلیک کنید👇",'html',null,json_encode(['inline_keyboard'=>[[['text'=>"🚀ورود به ربات🚀",'url'=>"https://t.me/$UP_Bot"]],]]));
			SA($chatID,'typing');
			SM($chatID,"✅به منوی اصلی بازگشتید",'html',null,$Button_Home);
		}
		else if($kind_of == 'pv')
		{
			SA($chatID,'typing');
			$user['step'] = 'none';
			$token = $base['tokensandadmins']["$UP_Bot"]['token'];
			$config = file_get_contents("src/pv/config.php");
			$config = str_replace("[*[TOKEN]*]",$token,$config);
			$config = str_replace("[*[ADMIN]*]",$userID,$config);
			Save("RoBots/$UP_Bot/config.php",$config);
			copy('src/pv/index.php',"RoBots/$UP_Bot/index.php");
			$handler = file_get_contents("src/pv/handler.php");
			$handler = str_replace("[*[CrToken]*]",$Tok,$handler);
			$handler = str_replace("[*[CrCh]*]",$channel,$handler);
			Save("RoBots/$UP_Bot/handler.php",$handler);
			$send = file_get_contents("src/pv/send.php");
			$send = str_replace("[*[TOKEN]*]",$token,$send);
			Save("RoBots/$UP_Bot/send.php",$send);
			copy('src/pv/send.php',"RoBots/$UP_Bot/send.php");
			file_get_contents("https://api.telegram.org/bot$token/setwebhook?url=$URL/RoBots/$UP_Bot/index.php");
			$userbot = GMUN();
			$nemebot = GMN();
			$textbot = "🤖ربات شما با موفقیت به سرور پرسرعت🚀 ربات ساز $nemebot\n @$userbot\nبروزرسانی شد♻️\nجهت شروع ربات /start را ارسال کنید.";
			file_get_contents("http://api.telegram.org/bot$token/sendMessage?chat_id=$chatID&text=$textbot");
			SA($chatID,'typing');
			SM($chatID,"ربات شما با موفقیت آپدیت شد♻️\nبرای رفتن به پنل مدیریت در ربات دستور /panel را ارسال کنید✔️\n😎جهت ورود به ربات خود کلیک کنید👇",'html',null,json_encode(['inline_keyboard'=>[[['text'=>"🚀ورود به ربات🚀",'url'=>"https://t.me/$UP_Bot"]],]]));
			SA($chatID,'typing');
			SM($chatID,"✅به منوی اصلی بازگشتید",'html',null,$Button_Home);
		}
		else if($kind_of == 'tele')
		{
			SA($chatID,'typing');
			$user['step'] = 'none';
			$token = $base['tokensandadmins']["$UP_Bot"]['token'];
			$index = file_get_contents("src/tele/index.php");
			$index = str_replace("[*[TOKEN]*]",$token,$index);
			$index = str_replace("[*[ADMIN]*]",$userID,$index);
			Save("RoBots/$UP_Bot/index.php",$index);
			$send = file_get_contents("src/tele/send.php");
			$send = str_replace("[*[TOKEN]*]",$token,$send);
			Save("RoBots/$UP_Bot/send.php",$send);
			file_get_contents("https://api.telegram.org/bot$token/setwebhook?url=$URL/RoBots/$UP_Bot/index.php");
			$userbot = GMUN();
			$nemebot = GMN();
			$textbot = "🤖ربات شما با موفقیت به سرور پرسرعت🚀 ربات ساز $nemebot\n @$userbot\nبروزرسانی شد♻️\nجهت شروع ربات /start را ارسال کنید.";
			file_get_contents("http://api.telegram.org/bot$token/sendMessage?chat_id=$chatID&text=$textbot");
			SA($chatID,'typing');
			SM($chatID,"ربات شما با موفقیت آپدیت شد♻️\nبرای رفتن به پنل مدیریت در ربات دستور /panel را ارسال کنید✔️\n😎جهت ورود به ربات خود کلیک کنید👇",'html',null,json_encode(['inline_keyboard'=>[[['text'=>"🚀ورود به ربات🚀",'url'=>"https://t.me/$UP_Bot"]],]]));
			SA($chatID,'typing');
			SM($chatID,"✅به منوی اصلی بازگشتید",'html',null,$Button_Home);
		}
		else if($kind_of == 'chat')
		{
			SA($chatID,'typing');
			$user['step'] = 'none';
			$token = $base['tokensandadmins']["$UP_Bot"]['token'];
			$index = file_get_contents("src/chat/index.php");
			$index = str_replace("[*[TOKEN]*]",$token,$index);
			$index = str_replace("[*[USERNAME]*]",$UP_Bot,$index);
			$index = str_replace("[*[ADMIN]*]",$userID,$index);
			Save("RoBots/$UP_Bot/index.php",$index);
			$send = file_get_contents("src/chat/send.php");
			$send = str_replace("[*[TOKEN]*]",$token,$send);
			Save("RoBots/$UP_Bot/send.php",$send);
			copy('src/chat/jdf.php',"RoBots/$UP_Bot/jdf.php");
			file_get_contents("https://api.telegram.org/bot$token/setwebhook?url=$URL/RoBots/$UP_Bot/index.php");
			$userbot = GMUN();
			$nemebot = GMN();
			$textbot = "🤖ربات شما با موفقیت به سرور پرسرعت🚀 ربات ساز $nemebot\n @$userbot\nبروزرسانی شد♻️\nجهت شروع ربات /start را ارسال کنید.";
			file_get_contents("http://api.telegram.org/bot$token/sendMessage?chat_id=$chatID&text=$textbot");
			SA($chatID,'typing');
			SM($chatID,"ربات شما با موفقیت آپدیت شد♻️\nبرای رفتن به پنل مدیریت در ربات دستور /panel را ارسال کنید✔️\n😎جهت ورود به ربات خود کلیک کنید👇",'html',null,json_encode(['inline_keyboard'=>[[['text'=>"🚀ورود به ربات🚀",'url'=>"https://t.me/$UP_Bot"]],]]));
			SA($chatID,'typing');
			SM($chatID,"✅به منوی اصلی بازگشتید",'html',null,$Button_Home);
		}
		else if($kind_of == 'zdl')
		{
			SA($chatID,'typing');
			$user['step'] = 'none';
			$token = $base['tokensandadmins']["$UP_Bot"]['token'];
			$index = file_get_contents("src/zdl/index.php");
			$index = str_replace("[*[TOKEN]*]",$token,$index);
			$index = str_replace("[*[USERNAME]*]",$UP_Bot,$index);
			$index = str_replace("[*[ADMIN]*]",$userID,$index);
			Save("RoBots/$UP_Bot/index.php",$index);
			$send = file_get_contents("src/zdl/send.php");
			$send = str_replace("[*[TOKEN]*]",$token,$send);
			Save("RoBots/$UP_Bot/send.php",$send);
			copy('src/zdl/file.php',"RoBots/$UP_Bot/file.php");
			copy('src/zdl/script.php',"RoBots/$UP_Bot/script.php");
			copy('src/zdl/Creator.php',"RoBots/$UP_Bot/other/Creator.php");
			copy('src/zdl/Developer.php',"RoBots/$UP_Bot/other/Developer.php");
			copy('src/zdl/Fun.php',"RoBots/$UP_Bot/other/Fun.php");
			copy('src/zdl/MsgCheck.php',"RoBots/$UP_Bot/other/MsgCheck.php");
			copy('src/zdl/Private.php',"RoBots/$UP_Bot/other/Private.php");
			copy('src/zdl/SuperGroup.php',"RoBots/$UP_Bot/other/SuperGroup.php");
			file_get_contents("https://api.telegram.org/bot$token/setwebhook?url=$URL/RoBots/$UP_Bot/index.php");
			$userbot = GMUN();
			$nemebot = GMN();
			$textbot = "🤖ربات شما با موفقیت به سرور پرسرعت🚀 ربات ساز $nemebot\n @$userbot\nبروزرسانی شد♻️\nجهت شروع ربات /start را ارسال کنید.";
			file_get_contents("http://api.telegram.org/bot$token/sendMessage?chat_id=$chatID&text=$textbot");
			SA($chatID,'typing');
			SM($chatID,"ربات شما با موفقیت آپدیت شد♻️\nبرای رفتن به پنل مدیریت در ربات دستور /panel را ارسال کنید✔️\n😎جهت ورود به ربات خود کلیک کنید👇",'html',null,json_encode(['inline_keyboard'=>[[['text'=>"🚀ورود به ربات🚀",'url'=>"https://t.me/$UP_Bot"]],]]));
			SA($chatID,'typing');
			SM($chatID,"✅به منوی اصلی بازگشتید",'html',null,$Button_Home);
		}
		else if($kind_of == 'baner')
		{
			SA($chatID,'typing');
			$user['step'] = 'none';
			$token = $base['tokensandadmins']["$UP_Bot"]['token'];
			$index = file_get_contents("src/baner/index.php");
			$index = str_replace("[*[TOKEN]*]",$token,$index);
			$index = str_replace("[*[ADMIN]*]",$userID,$index);
			Save("RoBots/$UP_Bot/index.php",$index);
			$send = file_get_contents("src/baner/send.php");
			$send = str_replace("[*[TOKEN]*]",$token,$send);
			Save("RoBots/$UP_Bot/send.php",$send);
			$arrayfile = array_diff(scandir("src/baner"),['.','..','index.php','send.php']);
			foreach($arrayfile as $file)
			{
				copy("src/baner/$file","RoBots/$UP_Bot/$file");
			}
			file_get_contents("https://api.telegram.org/bot$token/setwebhook?url=$URL/RoBots/$UP_Bot/index.php");
			$userbot = GMUN();
			$nemebot = GMN();
			$textbot = "🤖ربات شما با موفقیت به سرور پرسرعت🚀 ربات ساز $nemebot\n @$userbot\nبروزرسانی شد♻️\nجهت شروع ربات /start را ارسال کنید.";
			file_get_contents("http://api.telegram.org/bot$token/sendMessage?chat_id=$chatID&text=$textbot");
			SA($chatID,'typing');
			SM($chatID,"ربات شما با موفقیت آپدیت شد♻️\nبرای رفتن به پنل مدیریت در ربات دستور /panel را ارسال کنید✔️\n😎جهت ورود به ربات خود کلیک کنید👇",'html',null,json_encode(['inline_keyboard'=>[[['text'=>"🚀ورود به ربات🚀",'url'=>"https://t.me/$UP_Bot"]],]]));
			SA($chatID,'typing');
			SM($chatID,"✅به منوی اصلی بازگشتید",'html',null,$Button_Home);
		}
		saveJson("base/$userID.json",$user);
	}
	else
	{
		if(isset($up->message->forward_from) and $up->message->forward_from->id == 308623057)
		{
			if(strpos($msg,'Use this token to access the HTTP API:') !== false)
			{
				$rep = explode("\n",$msg)[3];
				$token = $rep;
			}
			else if(strpos($msg,'Here is the token for bot') !== false)
			{
				$rep = explode("\n",$msg)[2];
				$token = $rep;
			}
			else if(strpos($msg,'Token for the bot') !== false)
			{
				$rep = explode("\n",$msg)[2];
				$token = $rep;
			}
		}
		else
		{
			$token = $msg;
		}
		$resultb = GUNB($token);
		$username_bot = $resultb["result"]["username"];
		$id_bot = $resultb["result"]["id"];
		$first_bot = $resultb["result"]["first_name"];
		$ok = $resultb["ok"];
		if($ok != 1 or strpos($token , 'json ') !== false)
		{
			SA($chatID,'typing');
			SM($chatID,"توکن نامعتبر است!\n\n مجدد اقدام به ساخت ربات کنید و یک\n\n توکن صحیح را وارد کنید",'html',$msg_id);
		}
		else
		{
			$UP_Bot = $user['UP Bot'];
			$base = json_decode(file_get_contents("base.json"),true);
			$kind_of = $base['tokensandadmins']["$UP_Bot"]['kind of'];
			if($kind_of == 'Esm')
			{
				SA($chatID,'typing');
				$user['step'] = 'none';
				$base = json_decode(file_get_contents("base.json"),true);
				$base['tokensandadmins']["$UP_Bot"]['token'] = $token;
				saveJson("base.json",$base);
				$config = file_get_contents("src/Family/config.php");
				$config = str_replace("[*[TOKEN]*]",$token,$config);
				$config = str_replace("[*[ADMIN]*]",$userID,$config);
				$config = str_replace("[*[USERNAME]*]",$UP_Bot,$config);
				Save("RoBots/$UP_Bot/config.php",$config);
				copy('src/Family/bot.php',"RoBots/$UP_Bot/bot.php");
				copy('src/Family/wordlist.json',"RoBots/$UP_Bot/data/wordlist.json");
				copy('src/Family/send.php',"RoBots/$UP_Bot/send.php");
				Save("RoBots/$UP_Bot/index.php",null);
				file_get_contents("https://api.telegram.org/bot$token/setwebhook?url=$URL/RoBots/$UP_Bot/bot.php");
				$userbot = GMUN();
				$nemebot = GMN();
				$textbot = "🤖ربات شما با موفقیت به سرور پرسرعت🚀 ربات ساز $nemebot\n @$userbot\nبروزرسانی شد♻️\nجهت شروع ربات /start را ارسال کنید.";
				file_get_contents("http://api.telegram.org/bot$token/sendMessage?chat_id=$chatID&text=$textbot");
				file_get_contents("https://api.telegram.org/bot$token/setwebhook?url=$URL/RoBots/$UP_Bot/bot.php");
				SA($chatID,'typing');
				SM($chatID,"ربات شما با موفقیت آپدیت شد♻️\nبرای رفتن به پنل مدیریت در ربات دستور /panel را ارسال کنید✔️\n😎جهت ورود به ربات خود کلیک کنید👇",'html',null,json_encode(['inline_keyboard'=>[[['text'=>"🚀ورود به ربات🚀",'url'=>"https://t.me/$UP_Bot"]],]]));
				SA($chatID,'typing');
				SM($chatID,"✅به منوی اصلی بازگشتید",'html',null,$Button_Home);
			}
			else if($kind_of == 'mem')
			{
				SA($chatID,'typing');
				$user['step'] = 'none';
				$index = file_get_contents("src/mem/index.php");
				$index = str_replace("[*[TOKEN]*]",$token,$index);
				$index = str_replace("[*[ADMIN]*]",$userID,$index);
				$index = str_replace("[*[IDBOT]*]",$id_bot,$index);
				$index = str_replace("[*[USERNAME]*]",$UP_Bot,$index);
				Save("RoBots/$UP_Bot/index.php",$index);
				$send = file_get_contents("src/mem/send.php");
				$send = str_replace("[*[TOKEN]*]",$token,$send);
				Save("RoBots/$UP_Bot/send.php",$send);
				file_get_contents("https://api.telegram.org/bot$token/setwebhook?url=$URL/RoBots/$UP_Bot/index.php");
				$userbot = GMUN();
				$nemebot = GMN();
				$textbot = "🤖ربات شما با موفقیت به سرور پرسرعت🚀 ربات ساز $nemebot\n @$userbot\nبروزرسانی شد♻️\nجهت شروع ربات /start را ارسال کنید.";
				file_get_contents("http://api.telegram.org/bot$token/sendMessage?chat_id=$chatID&text=$textbot");
				SA($chatID,'typing');
				SM($chatID,"ربات شما با موفقیت آپدیت شد♻️\nبرای رفتن به پنل مدیریت در ربات دستور /panel را ارسال کنید✔️\n😎جهت ورود به ربات خود کلیک کنید👇",'html',null,json_encode(['inline_keyboard'=>[[['text'=>"🚀ورود به ربات🚀",'url'=>"https://t.me/$UP_Bot"]],]]));
				SA($chatID,'typing');
				SM($chatID,"✅به منوی اصلی بازگشتید",'html',null,$Button_Home);
			}
			else if($kind_of == 'zds')
			{
				SA($chatID,'typing');
				$user['step'] = 'none';
				$index = file_get_contents("src/mem/index.php");
				$index = str_replace("[*[TOKEN]*]",$token,$index);
				$index = str_replace("[*[ADMIN]*]",$userID,$index);
				Save("RoBots/$UP_Bot/index.php",$index);
				file_get_contents("https://api.telegram.org/bot$token/setwebhook?url=$URL/RoBots/$UP_Bot/index.php");
				$userbot = GMUN();
				$nemebot = GMN();
				$textbot = "🤖ربات شما با موفقیت به سرور پرسرعت🚀 ربات ساز $nemebot\n @$userbot\nبروزرسانی شد♻️\nجهت شروع ربات /start را ارسال کنید.";
				file_get_contents("http://api.telegram.org/bot$token/sendMessage?chat_id=$chatID&text=$textbot");
				SA($chatID,'typing');
				SM($chatID,"ربات شما با موفقیت آپدیت شد♻️\nبرای رفتن به پنل مدیریت در ربات دستور /panel را ارسال کنید✔️\n😎جهت ورود به ربات خود کلیک کنید👇",'html',null,json_encode(['inline_keyboard'=>[[['text'=>"🚀ورود به ربات🚀",'url'=>"https://t.me/$UP_Bot"]],]]));
				SA($chatID,'typing');
				SM($chatID,"✅به منوی اصلی بازگشتید",'html',null,$Button_Home);
			}
			else if($kind_of == 'pv')
			{
				SA($chatID,'typing');
				$user['step'] = 'none';
				$config = file_get_contents("src/pv/config.php");
				$config = str_replace("[*[TOKEN]*]",$token,$config);
				$config = str_replace("[*[ADMIN]*]",$userID,$config);
				Save("RoBots/$UP_Bot/config.php",$config);
				copy('src/pv/index.php',"RoBots/$UP_Bot/index.php");
				$handler = file_get_contents("src/pv/handler.php");
				$handler = str_replace("[*[CrToken]*]",$Tok,$handler);
				$handler = str_replace("[*[CrCh]*]",$channel,$handler);
				Save("RoBots/$UP_Bot/handler.php",$handler);
				$send = file_get_contents("src/pv/send.php");
				$send = str_replace("[*[TOKEN]*]",$token,$send);
				Save("RoBots/$UP_Bot/send.php",$send);
				file_get_contents("https://api.telegram.org/bot$token/setwebhook?url=$URL/RoBots/$UP_Bot/index.php");
				$userbot = GMUN();
				$nemebot = GMN();
				$textbot = "🤖ربات شما با موفقیت به سرور پرسرعت🚀 ربات ساز $nemebot\n @$userbot\nبروزرسانی شد♻️\nجهت شروع ربات /start را ارسال کنید.";
				file_get_contents("http://api.telegram.org/bot$token/sendMessage?chat_id=$chatID&text=$textbot");
				SA($chatID,'typing');
				SM($chatID,"ربات شما با موفقیت آپدیت شد♻️\nبرای رفتن به پنل مدیریت در ربات دستور /panel را ارسال کنید✔️\n😎جهت ورود به ربات خود کلیک کنید👇",'html',null,json_encode(['inline_keyboard'=>[[['text'=>"🚀ورود به ربات🚀",'url'=>"https://t.me/$UP_Bot"]],]]));
				SA($chatID,'typing');
				SM($chatID,"✅به منوی اصلی بازگشتید",'html',null,$Button_Home);
			}
			else if($kind_of == 'tele')
			{
				SA($chatID,'typing');
				$user['step'] = 'none';
				$index = file_get_contents("src/tele/index.php");
				$index = str_replace("[*[TOKEN]*]",$token,$index);
				$index = str_replace("[*[ADMIN]*]",$userID,$index);
				Save("RoBots/$UP_Bot/index.php",$index);
				$send = file_get_contents("src/tele/send.php");
				$send = str_replace("[*[TOKEN]*]",$token,$send);
				Save("RoBots/$UP_Bot/send.php",$send);
				file_get_contents("https://api.telegram.org/bot$token/setwebhook?url=$URL/RoBots/$UP_Bot/index.php");
				$userbot = GMUN();
				$nemebot = GMN();
				$textbot = "🤖ربات شما با موفقیت به سرور پرسرعت🚀 ربات ساز $nemebot\n @$userbot\nبروزرسانی شد♻️\nجهت شروع ربات /start را ارسال کنید.";
				file_get_contents("http://api.telegram.org/bot$token/sendMessage?chat_id=$chatID&text=$textbot");
				SA($chatID,'typing');
				SM($chatID,"ربات شما با موفقیت آپدیت شد♻️\nبرای رفتن به پنل مدیریت در ربات دستور /panel را ارسال کنید✔️\n😎جهت ورود به ربات خود کلیک کنید👇",'html',null,json_encode(['inline_keyboard'=>[[['text'=>"🚀ورود به ربات🚀",'url'=>"https://t.me/$UP_Bot"]],]]));
				SA($chatID,'typing');
				SM($chatID,"✅به منوی اصلی بازگشتید",'html',null,$Button_Home);
			}
			else if($kind_of == 'chat')
			{
				SA($chatID,'typing');
				$user['step'] = 'none';
				$index = file_get_contents("src/chat/index.php");
				$index = str_replace("[*[TOKEN]*]",$token,$index);
				$index = str_replace("[*[USERNAME]*]",$UP_Bot,$index);
				$index = str_replace("[*[ADMIN]*]",$userID,$index);
				Save("RoBots/$UP_Bot/index.php",$index);
				$send = file_get_contents("src/chat/send.php");
				$send = str_replace("[*[TOKEN]*]",$token,$send);
				Save("RoBots/$UP_Bot/send.php",$send);
				copy('src/chat/jdf.php',"RoBots/$UP_Bot/jdf.php");
				file_get_contents("https://api.telegram.org/bot$token/setwebhook?url=$URL/RoBots/$UP_Bot/index.php");
				$userbot = GMUN();
				$nemebot = GMN();
				$textbot = "🤖ربات شما با موفقیت به سرور پرسرعت🚀 ربات ساز $nemebot\n @$userbot\nبروزرسانی شد♻️\nجهت شروع ربات /start را ارسال کنید.";
				file_get_contents("http://api.telegram.org/bot$token/sendMessage?chat_id=$chatID&text=$textbot");
				SA($chatID,'typing');
				SM($chatID,"ربات شما با موفقیت آپدیت شد♻️\nبرای رفتن به پنل مدیریت در ربات دستور /panel را ارسال کنید✔️\n😎جهت ورود به ربات خود کلیک کنید👇",'html',null,json_encode(['inline_keyboard'=>[[['text'=>"🚀ورود به ربات🚀",'url'=>"https://t.me/$UP_Bot"]],]]));
				SA($chatID,'typing');
				SM($chatID,"✅به منوی اصلی بازگشتید",'html',null,$Button_Home);
			}
			else if($kind_of == 'zdl')
			{
				SA($chatID,'typing');
				$user['step'] = 'none';
				$index = file_get_contents("src/zdl/index.php");
				$index = str_replace("[*[TOKEN]*]",$token,$index);
				$index = str_replace("[*[USERNAME]*]",$UP_Bot,$index);
				$index = str_replace("[*[ADMIN]*]",$userID,$index);
				Save("RoBots/$UP_Bot/index.php",$index);
				$send = file_get_contents("src/zdl/send.php");
				$send = str_replace("[*[TOKEN]*]",$token,$send);
				Save("RoBots/$UP_Bot/send.php",$send);
				copy('src/zdl/file.php',"RoBots/$UP_Bot/file.php");
				copy('src/zdl/script.php',"RoBots/$UP_Bot/script.php");
				copy('src/zdl/Creator.php',"RoBots/$UP_Bot/other/Creator.php");
				copy('src/zdl/Developer.php',"RoBots/$UP_Bot/other/Developer.php");
				copy('src/zdl/Fun.php',"RoBots/$UP_Bot/other/Fun.php");
				copy('src/zdl/MsgCheck.php',"RoBots/$UP_Bot/other/MsgCheck.php");
				copy('src/zdl/Private.php',"RoBots/$UP_Bot/other/Private.php");
				copy('src/zdl/SuperGroup.php',"RoBots/$UP_Bot/other/SuperGroup.php");
				file_get_contents("https://api.telegram.org/bot$token/setwebhook?url=$URL/RoBots/$UP_Bot/index.php");
				$userbot = GMUN();
				$nemebot = GMN();
				$textbot = "🤖ربات شما با موفقیت به سرور پرسرعت🚀 ربات ساز $nemebot\n @$userbot\nبروزرسانی شد♻️\nجهت شروع ربات /start را ارسال کنید.";
				file_get_contents("http://api.telegram.org/bot$token/sendMessage?chat_id=$chatID&text=$textbot");
				SA($chatID,'typing');
				SM($chatID,"ربات شما با موفقیت آپدیت شد♻️\nبرای رفتن به پنل مدیریت در ربات دستور /panel را ارسال کنید✔️\n😎جهت ورود به ربات خود کلیک کنید👇",'html',null,json_encode(['inline_keyboard'=>[[['text'=>"🚀ورود به ربات🚀",'url'=>"https://t.me/$UP_Bot"]],]]));
				SA($chatID,'typing');
				SM($chatID,"✅به منوی اصلی بازگشتید",'html',null,$Button_Home);
			}
			else if($kind_of == 'baner')
			{
				SA($chatID,'typing');
				$user['step'] = 'none';
				$index = file_get_contents("src/baner/index.php");
				$index = str_replace("[*[TOKEN]*]",$token,$index);
				$index = str_replace("[*[ADMIN]*]",$userID,$index);
				Save("RoBots/$UP_Bot/index.php",$index);
				$send = file_get_contents("src/baner/send.php");
				$send = str_replace("[*[TOKEN]*]",$token,$send);
				Save("RoBots/$UP_Bot/send.php",$send);
				$arrayfile = array_diff(scandir("src/baner"),['.','..','index.php','send.php']);
				foreach($arrayfile as $file)
				{
					copy("src/baner/$file","RoBots/$UP_Bot/$file");
				}
				file_get_contents("https://api.telegram.org/bot$token/setwebhook?url=$URL/RoBots/$UP_Bot/index.php");
				$userbot = GMUN();
				$nemebot = GMN();
				$textbot = "🤖ربات شما با موفقیت به سرور پرسرعت🚀 ربات ساز $nemebot\n @$userbot\nبروزرسانی شد♻️\nجهت شروع ربات /start را ارسال کنید.";
				file_get_contents("http://api.telegram.org/bot$token/sendMessage?chat_id=$chatID&text=$textbot");
				SA($chatID,'typing');
				SM($chatID,"ربات شما با موفقیت آپدیت شد♻️\nبرای رفتن به پنل مدیریت در ربات دستور /panel را ارسال کنید✔️\n😎جهت ورود به ربات خود کلیک کنید👇",'html',null,json_encode(['inline_keyboard'=>[[['text'=>"🚀ورود به ربات🚀",'url'=>"https://t.me/$UP_Bot"]],]]));
				SA($chatID,'typing');
				SM($chatID,"✅به منوی اصلی بازگشتید",'html',null,$Button_Home);
			}
			saveJson("base/$userID.json",$user);
		}
	}
}



else if($msg == 'ساخت ربات ➕' and $Tc == 'private')
{
	SA($chatID,'typing');
	$user['step'] = 'Cr';
	SM($chatID,"گزینه مورد نظر را انتخاب کنید",'html',$msg_id,$Button_Create);
	saveJson("base/$userID.json",$user);
}
else if($msg == '👩‍👧‍👦 اسم فامیل' and $step == 'Cr' and $Tc == 'private')
{
	SA($chatID,'typing');
	$user['step'] = 'CrEsm';
	SM($chatID,"خوش اومدی 🌹\n\n ✅ برای ساخت ربات اسم فامیل؛ توکن ربات خود را از ( @BotFather ) ارسال کنید\n\n ✅ اگر مشکلی در توکن دارید به بخش راهنما در منوی اصلی یا کانال ربات ساز مراجعه کنید",'html',null,$Button_Back2);
	saveJson("base/$userID.json",$user);
}
else if($step == 'CrEsm' and $Tc == 'private')
{
	if(isset($up->message->forward_from) and $up->message->forward_from->id == 308623057)
	{
		if(strpos($msg,'Use this token to access the HTTP API:') !== false)
		{
			$rep = explode("\n",$msg)[3];
			$token = $rep;
		}
		else if(strpos($msg,'Here is the token for bot') !== false)
		{
			$rep = explode("\n",$msg)[2];
			$token = $rep;
		}
		else if(strpos($msg,'Token for the bot') !== false)
		{
			$rep = explode("\n",$msg)[2];
			$token = $rep;
		}
	}
	else
	{
		$token = $msg;
	}
	$resultb = GUNB($token);
	$username_bot = $resultb["result"]["username"];
	$id_bot = $resultb["result"]["id"];
	$first_bot = $resultb["result"]["first_name"];
	$ok = $resultb["ok"];
	if($ok != 1 or strpos($token , 'json ') !== false)
	{
		SA($chatID,'typing');
		SM($chatID,"توکن نامعتبر است!\n\n مجدد اقدام به ساخت ربات کنید و یک\n\n توکن صحیح را وارد کنید",'html',$msg_id);
	}
	else
	{
		if($username == null)
		{
			$username = $first;
		}
		else
		{
			$username = "@".$username;
		}
		if(!is_dir("RoBots/$username_bot"))
		{
			if($create < $Num_Cr)
			{
				$user['step'] = 'none';
				$user['create'] = $create + 1;
				$user['RoBots'][] = "@$username_bot";
				mkdir("RoBots/$username_bot");
				mkdir("RoBots/$username_bot/data");
				$base = json_decode(file_get_contents("base.json"),true);
				$base['tokensandadmins']["$username_bot"]['token'] = $token;
				$base['tokensandadmins']["$username_bot"]['admin'] = $userID;
				$base['tokensandadmins']["$username_bot"]['kind of'] = 'Esm';
				saveJson("base.json",$base);
				$config = file_get_contents("src/Family/config.php");
				$config = str_replace("[*[TOKEN]*]",$token,$config);
				$config = str_replace("[*[ADMIN]*]",$userID,$config);
				$config = str_replace("[*[USERNAME]*]",$username_bot,$config);
				Save("RoBots/$username_bot/config.php",$config);
				copy('src/Family/bot.php',"RoBots/$username_bot/bot.php");
				copy('src/Family/send.php',"RoBots/$username_bot/send.php");
				copy('src/Family/wordlist.json',"RoBots/$username_bot/data/wordlist.json");
				Save("RoBots/$username_bot/index.php",null);
				$userbot = GMUN();
				$nemebot = GMN();
				$textbot = "🤖ربات شما با موفقیت به سرور پرسرعت🚀 ربات ساز $nemebot\n @$userbot\nمتصل شد♻️\nجهت شروع ربات /start را ارسال کنید.";
				file_get_contents("http://api.telegram.org/bot$token/sendMessage?chat_id=$chatID&text=$textbot");
				file_get_contents("https://api.telegram.org/bot$token/setwebhook?url=$URL/RoBots/$username_bot/bot.php");
				SA($chatID,'typing');
				SM($chatID,"ربات شما با موفقیت ساخته شد💎\nبرای رفتن به پنل مدیریت در ربات دستور /panel را ارسال کنید✔️\n😎جهت ورود به ربات خود کلیک کنید👇",'html',null,json_encode(['inline_keyboard'=>[[['text'=>"🚀ورود به ربات🚀",'url'=>"https://t.me/$username_bot"]],]]));
				SA($chatID,'typing');
				SM($chatID,"✅به منوی اصلی بازگشتید",'html',null,$Button_Home);
				$access = json_decode(file_get_contents("access.json"),true);
				$access['RoBots'][] = "@$username_bot";
				saveJson("access.json",$access);
			}
			else
			{
				SA($chatID,'typing');
				SM($chatID,"❌ تعداد ربات های ویژه نشده شما به $Num_Cr رسیده.\n📤 برای ساخت ربات بیشتر یکی از رباتهایتان را حذف کنید.",'html');
			}
		}
		else
		{
			SA($chatID,'typing');
			SM($chatID,"این ربات در رباتساز ما ساخته شده لطفا توکن یک ربات دیگر را ارسال کنید یا این ربات رو از رباتساز ما حذف کنید.",'html',$msg_id);
		}
	}
	saveJson("base/$userID.json",$user);
}
else if($msg == '👤 ممبرگیر' and $step == 'Cr' and $Tc == 'private')
{
	SA($chatID,'typing');
	$user['step'] = 'Crmem';
	SM($chatID,"خوش اومدی 🌹\n\n ✅ برای ساخت ربات ممبرگیر؛ توکن ربات خود را از ( @BotFather ) ارسال کنید\n\n ✅ اگر مشکلی در توکن دارید به بخش راهنما در منوی اصلی یا کانال ربات ساز مراجعه کنید",'html',null,$Button_Back2);
	saveJson("base/$userID.json",$user);
}
else if($step == 'Crmem' and $Tc == 'private')
{
	if(isset($up->message->forward_from) and $up->message->forward_from->id == 308623057)
	{
		if(strpos($msg,'Use this token to access the HTTP API:') !== false)
		{
			$rep = explode("\n",$msg)[3];
			$token = $rep;
		}
		else if(strpos($msg,'Here is the token for bot') !== false)
		{
			$rep = explode("\n",$msg)[2];
			$token = $rep;
		}
		else if(strpos($msg,'Token for the bot') !== false)
		{
			$rep = explode("\n",$msg)[2];
			$token = $rep;
		}
	}
	else
	{
		$token = $msg;
	}
	$resultb = GUNB($token);
	$username_bot = $resultb["result"]["username"];
	$id_bot = $resultb["result"]["id"];
	$first_bot = $resultb["result"]["first_name"];
	$ok = $resultb["ok"];
	if($ok != 1 or strpos($token , 'json ') !== false)
	{
		SA($chatID,'typing');
		SM($chatID,"توکن نامعتبر است!\n\n مجدد اقدام به ساخت ربات کنید و یک\n\n توکن صحیح را وارد کنید",'html',$msg_id);
	}
	else
	{
		if($username == null)
		{
			$username = $first;
		}
		else
		{
			$username = "@".$username;
		}
		if(!is_dir("RoBots/$username_bot"))
		{
			if($create < $Num_Cr)
			{
				$user['step'] = 'none';
				$user['create'] = $create + 1;
				$user['RoBots'][] = "@$username_bot";
				mkdir("RoBots/$username_bot");
				mkdir("RoBots/$username_bot/data");
				mkdir("RoBots/$username_bot/ads");
				mkdir("RoBots/$username_bot/ads/admin");
				mkdir("RoBots/$username_bot/ads/cont");
				mkdir("RoBots/$username_bot/ads/date");
				mkdir("RoBots/$username_bot/ads/postid");
				mkdir("RoBots/$username_bot/ads/seen");
				mkdir("RoBots/$username_bot/ads/time");
				mkdir("RoBots/$username_bot/ads/user");
				$base = json_decode(file_get_contents("base.json"),true);
				$base['tokensandadmins']["$username_bot"]['token'] = $token;
				$base['tokensandadmins']["$username_bot"]['admin'] = $userID;
				$base['tokensandadmins']["$username_bot"]['kind of'] = 'mem';
				saveJson("base.json",$base);
				$index = file_get_contents("src/mem/index.php");
				$index = str_replace("[*[TOKEN]*]",$token,$index);
				$index = str_replace("[*[ADMIN]*]",$userID,$index);
				$index = str_replace("[*[IDBOT]*]",$id_bot,$index);
				$index = str_replace("[*[USERNAME]*]",$username_bot,$index);
				Save("RoBots/$username_bot/index.php",$index);
				$send = file_get_contents("src/mem/send.php");
				$send = str_replace("[*[TOKEN]*]",$token,$send);
				Save("RoBots/$username_bot/send.php",$send);
				Save("Support.txt",'none');
				$userbot = GMUN();
				$nemebot = GMN();
				$textbot = "🤖ربات شما با موفقیت به سرور پرسرعت🚀 ربات ساز $nemebot\n @$userbot\nمتصل شد♻️\nجهت شروع ربات /start را ارسال کنید.";
				file_get_contents("http://api.telegram.org/bot$token/sendMessage?chat_id=$chatID&text=$textbot");
				file_get_contents("https://api.telegram.org/bot$token/setwebhook?url=$URL/RoBots/$username_bot/index.php");
				SA($chatID,'typing');
				SM($chatID,"ربات شما با موفقیت ساخته شد💎\nبرای رفتن به پنل مدیریت در ربات دستور /panel را ارسال کنید✔️\n😎جهت ورود به ربات خود کلیک کنید👇",'html',null,json_encode(['inline_keyboard'=>[[['text'=>"🚀ورود به ربات🚀",'url'=>"https://t.me/$username_bot"]],]]));
				SA($chatID,'typing');
				SM($chatID,"✅به منوی اصلی بازگشتید",'html',null,$Button_Home);
				$access = json_decode(file_get_contents("access.json"),true);
				$access['RoBots'][] = "@$username_bot";
				saveJson("access.json",$access);
			}
			else
			{
				SA($chatID,'typing');
				SM($chatID,"❌ تعداد ربات های ویژه نشده شما به $Num_Cr رسیده.\n📤 برای ساخت ربات بیشتر یکی از رباتهایتان را حذف کنید.",'html');
			}
		}
		else
		{
			SA($chatID,'typing');
			SM($chatID,"این ربات در رباتساز ما ساخته شده لطفا توکن یک ربات دیگر را ارسال کنید یا این ربات رو از رباتساز ما حذف کنید.",'html',$msg_id);
		}
	}
	saveJson("base/$userID.json",$user);
}
else if($msg == 'ضد اسپم⛔️' and $step == 'Cr' and $Tc == 'private')
{
	SA($chatID,'typing');
	$user['step'] = 'Crzds';
	SM($chatID,"خوش اومدی 🌹\n\n ✅ برای ساخت ربات ضداسپم؛ توکن ربات خود را از ( @BotFather ) ارسال کنید\n\n ✅ اگر مشکلی در توکن دارید به بخش راهنما در منوی اصلی یا کانال ربات ساز مراجعه کنید",'html',null,$Button_Back2);
	saveJson("base/$userID.json",$user);
}
else if($step == 'Crzds' and $Tc == 'private')
{
	if(isset($up->message->forward_from) and $up->message->forward_from->id == 308623057)
	{
		if(strpos($msg,'Use this token to access the HTTP API:') !== false)
		{
			$rep = explode("\n",$msg)[3];
			$token = $rep;
		}
		else if(strpos($msg,'Here is the token for bot') !== false)
		{
			$rep = explode("\n",$msg)[2];
			$token = $rep;
		}
		else if(strpos($msg,'Token for the bot') !== false)
		{
			$rep = explode("\n",$msg)[2];
			$token = $rep;
		}
	}
	else
	{
		$token = $msg;
	}
	$resultb = GUNB($token);
	$username_bot = $resultb["result"]["username"];
	$id_bot = $resultb["result"]["id"];
	$first_bot = $resultb["result"]["first_name"];
	$ok = $resultb["ok"];
	if($ok != 1 or strpos($token , 'json ') !== false)
	{
		SA($chatID,'typing');
		SM($chatID,"توکن نامعتبر است!\n\n مجدد اقدام به ساخت ربات کنید و یک\n\n توکن صحیح را وارد کنید",'html',$msg_id);
	}
	else
	{
		if($username == null)
		{
			$username = $first;
		}
		else
		{
			$username = "@".$username;
		}
		if(!is_dir("RoBots/$username_bot"))
		{
			if($create < $Num_Cr)
			{
				$user['step'] = 'none';
				$user['create'] = $create + 1;
				$user['RoBots'][] = "@$username_bot";
				mkdir("RoBots/$username_bot");
				$base = json_decode(file_get_contents("base.json"),true);
				$base['tokensandadmins']["$username_bot"]['token'] = $token;
				$base['tokensandadmins']["$username_bot"]['admin'] = $userID;
				$base['tokensandadmins']["$username_bot"]['kind of'] = 'zds';
				saveJson("base.json",$base);
				$index = file_get_contents("src/zds/index.php");
				$index = str_replace("[*[TOKEN]*]",$token,$index);
				$index = str_replace("[*[ADMIN]*]",$userID,$index);
				Save("RoBots/$username_bot/index.php",$index);
				$userbot = GMUN();
				$nemebot = GMN();
				$textbot = "🤖ربات شما با موفقیت به سرور پرسرعت🚀 ربات ساز $nemebot\n @$userbot\nمتصل شد♻️\nجهت شروع ربات /start را ارسال کنید.";
				file_get_contents("http://api.telegram.org/bot$token/sendMessage?chat_id=$chatID&text=$textbot");
				file_get_contents("https://api.telegram.org/bot$token/setwebhook?url=$URL/RoBots/$username_bot/index.php");
				SA($chatID,'typing');
				SM($chatID,"ربات شما با موفقیت ساخته شد💎\nبرای رفتن به پنل مدیریت در ربات دستور /panel را ارسال کنید✔️\n😎جهت ورود به ربات خود کلیک کنید👇",'html',null,json_encode(['inline_keyboard'=>[[['text'=>"🚀ورود به ربات🚀",'url'=>"https://t.me/$username_bot"]],]]));
				SA($chatID,'typing');
				SM($chatID,"✅به منوی اصلی بازگشتید",'html',null,$Button_Home);
				$access = json_decode(file_get_contents("access.json"),true);
				$access['RoBots'][] = "@$username_bot";
				saveJson("access.json",$access);
			}
			else
			{
				SA($chatID,'typing');
				SM($chatID,"❌ تعداد ربات های ویژه نشده شما به $Num_Cr رسیده.\n📤 برای ساخت ربات بیشتر یکی از رباتهایتان را حذف کنید.",'html');
			}
		}
		else
		{
			SA($chatID,'typing');
			SM($chatID,"این ربات در رباتساز ما ساخته شده لطفا توکن یک ربات دیگر را ارسال کنید یا این ربات رو از رباتساز ما حذف کنید.",'html',$msg_id);
		}
	}
	saveJson("base/$userID.json",$user);
}

else if($msg == '👤 پیام رسان' and $step == 'Cr' and $Tc == 'private')
{
 SA($chatID,'typing');
 $user['step'] = 'Crpv';
 SM($chatID,"خوش اومدی 🌹\n\n ✅ برای ساخت ربات پیام رسان؛ توکن ربات خود را از ( @BotFather ) ارسال کنید\n\n ✅ اگر مشکلی در توکن دارید به بخش راهنما در منوی اصلی یا کانال ربات ساز مراجعه کنید",'html',null,$Button_Back2);
 saveJson("base/$userID.json",$user);
}
else if($step == 'Crpv' and $Tc == 'private')
{
 if(isset($up->message->forward_from) and $up->message->forward_from->id == 308623057)
 {
  if(strpos($msg,'Use this token to access the HTTP API:') !== false)
  {
   $rep = explode("\n",$msg)[3];
   $token = $rep;
  }
  else if(strpos($msg,'Here is the token for bot') !== false)
  {
   $rep = explode("\n",$msg)[2];
   $token = $rep;
  }
  else if(strpos($msg,'Token for the bot') !== false)
  {
   $rep = explode("\n",$msg)[2];
   $token = $rep;
  }
 }
 else
 {
  $token = $msg;
 }
 $resultb = GUNB($token);
 $username_bot = $resultb["result"]["username"];
 $id_bot = $resultb["result"]["id"];
 $first_bot = $resultb["result"]["first_name"];
 $ok = $resultb["ok"];
 if($ok != 1 or strpos($token , 'json ') !== false)
 {
  SA($chatID,'typing');
  SM($chatID,"توکن نامعتبر است!\n\n مجدد اقدام به ساخت ربات کنید و یک\n\n توکن صحیح را وارد کنید",'html',$msg_id);
 }
 else
 {
  if($username == null)
  {
   $username = $first;
  }
  else
  {
   $username = "@".$username;
  }
  if(!is_dir("RoBots/$username_bot"))
  {
   if($create < $Num_Cr)
   {
    $user['step'] = 'none';
    $user['create'] = $create + 1;
    $user['RoBots'][] = "@$username_bot";
    mkdir("RoBots/$username_bot");
    mkdir("RoBots/$username_bot/data");
    $base = json_decode(file_get_contents("base.json"),true);
    $base['tokensandadmins']["$username_bot"]['token'] = $token;
    $base['tokensandadmins']["$username_bot"]['admin'] = $userID;
    $base['tokensandadmins']["$username_bot"]['kind of'] = 'pv';
    saveJson("base.json",$base);
    $config = file_get_contents("src/pv/config.php");
    $config = str_replace("[*[TOKEN]*]",$token,$config);
    $config = str_replace("[*[ADMIN]*]",$userID,$config);
    Save("RoBots/$username_bot/config.php",$config);
    copy('src/pv/index.php',"RoBots/$username_bot/index.php");
    $handler = file_get_contents("src/pv/handler.php");
    $handler = str_replace("[*[CrToken]*]",$Tok,$handler);
    $handler = str_replace("[*[CrCh]*]",$channel,$handler);
    Save("RoBots/$username_bot/handler.php",$handler);
    $send = file_get_contents("src/pv/send.php");
    $send = str_replace("[*[TOKEN]*]",$token,$send);
    Save("RoBots/$username_bot/send.php",$send);
    $userbot = GMUN();
    $nemebot = GMN();
    $textbot = "🤖ربات شما با موفقیت به سرور پرسرعت🚀 ربات ساز $nemebot\n @$userbot\nمتصل شد♻️\nجهت شروع ربات /start را ارسال کنید.";
    file_get_contents("http://api.telegram.org/bot$token/sendMessage?chat_id=$chatID&text=$textbot");
    file_get_contents("https://api.telegram.org/bot$token/setwebhook?url=$URL/RoBots/$username_bot/index.php");
    SA($chatID,'typing');
    SM($chatID,"ربات شما با موفقیت ساخته شد💎\nبرای رفتن به پنل مدیریت در ربات دستور /panel را ارسال کنید✔️\n😎جهت ورود به ربات خود کلیک کنید👇",'html',null,json_encode(['inline_keyboard'=>[[['text'=>"🚀ورود به ربات🚀",'url'=>"https://t.me/$username_bot"]],]]));
    SA($chatID,'typing');
    SM($chatID,"✅به منوی اصلی بازگشتید",'html',null,$Button_Home);
    $access = json_decode(file_get_contents("access.json"),true);
    $access['RoBots'][] = "@$username_bot";
    saveJson("access.json",$access);
   }
   else
   {
    SA($chatID,'typing');
    SM($chatID,"❌ تعداد ربات های ویژه نشده شما به $Num_Cr رسیده.\n📤 برای ساخت ربات بیشتر یکی از رباتهایتان را حذف کنید.",'html');
   }
  }
  else
  {
   SA($chatID,'typing');
   SM($chatID,"این ربات در رباتساز ما ساخته شده لطفا توکن یک ربات دیگر را ارسال کنید یا این ربات رو از رباتساز ما حذف کنید.",'html',$msg_id);
  }
 }
 saveJson("base/$userID.json",$user);
}

else if($msg == '📞 دریافت شماره' and $step == 'Cr' and $Tc == 'private')
{
	SA($chatID,'typing');
	$user['step'] = 'Crtele';
	SM($chatID,"خوش اومدی 🌹\n\n ✅ برای ساخت ربات دریافت شماره؛ توکن ربات خود را از ( @BotFather ) ارسال کنید\n\n ✅ اگر مشکلی در توکن دارید به بخش راهنما در منوی اصلی یا کانال ربات ساز مراجعه کنید",'html',null,$Button_Back2);
	saveJson("base/$userID.json",$user);
}
else if($step == 'Crtele' and $Tc == 'private')
{
	if(isset($up->message->forward_from) and $up->message->forward_from->id == 308623057)
	{
		if(strpos($msg,'Use this token to access the HTTP API:') !== false)
		{
			$rep = explode("\n",$msg)[3];
			$token = $rep;
		}
		else if(strpos($msg,'Here is the token for bot') !== false)
		{
			$rep = explode("\n",$msg)[2];
			$token = $rep;
		}
		else if(strpos($msg,'Token for the bot') !== false)
		{
			$rep = explode("\n",$msg)[2];
			$token = $rep;
		}
	}
	else
	{
		$token = $msg;
	}
	$resultb = GUNB($token);
	$username_bot = $resultb["result"]["username"];
	$id_bot = $resultb["result"]["id"];
	$first_bot = $resultb["result"]["first_name"];
	$ok = $resultb["ok"];
	if($ok != 1 or strpos($token , 'json ') !== false)
	{
		SA($chatID,'typing');
		SM($chatID,"توکن نامعتبر است!\n\n مجدد اقدام به ساخت ربات کنید و یک\n\n توکن صحیح را وارد کنید",'html',$msg_id);
	}
	else
	{
		if($username == null)
		{
			$username = $first;
		}
		else
		{
			$username = "@".$username;
		}
		if(!is_dir("RoBots/$username_bot"))
		{
			if($create < $Num_Cr)
			{
				$user['step'] = 'none';
				$user['create'] = $create + 1;
				$user['RoBots'][] = "@$username_bot";
				mkdir("RoBots/$username_bot");
				$base = json_decode(file_get_contents("base.json"),true);
				$base['tokensandadmins']["$username_bot"]['token'] = $token;
				$base['tokensandadmins']["$username_bot"]['admin'] = $userID;
				$base['tokensandadmins']["$username_bot"]['kind of'] = 'tele';
				saveJson("base.json",$base);
				$index = file_get_contents("src/tele/index.php");
				$index = str_replace("[*[TOKEN]*]",$token,$index);
				$index = str_replace("[*[ADMIN]*]",$userID,$index);
				Save("RoBots/$username_bot/index.php",$index);
				$send = file_get_contents("src/tele/send.php");
				$send = str_replace("[*[TOKEN]*]",$token,$send);
				Save("RoBots/$username_bot/send.php",$send);
				$userbot = GMUN();
				$nemebot = GMN();
				$textbot = "🤖ربات شما با موفقیت به سرور پرسرعت🚀 ربات ساز $nemebot\n @$userbot\nمتصل شد♻️\nجهت شروع ربات /start را ارسال کنید.";
				file_get_contents("http://api.telegram.org/bot$token/sendMessage?chat_id=$chatID&text=$textbot");
				file_get_contents("https://api.telegram.org/bot$token/setwebhook?url=$URL/RoBots/$username_bot/index.php");
				SA($chatID,'typing');
				SM($chatID,"ربات شما با موفقیت ساخته شد💎\nبرای رفتن به پنل مدیریت در ربات دستور /panel را ارسال کنید✔️\n😎جهت ورود به ربات خود کلیک کنید👇",'html',null,json_encode(['inline_keyboard'=>[[['text'=>"🚀ورود به ربات🚀",'url'=>"https://t.me/$username_bot"]],]]));
				SA($chatID,'typing');
				SM($chatID,"✅به منوی اصلی بازگشتید",'html',null,$Button_Home);
				$access = json_decode(file_get_contents("access.json"),true);
				$access['RoBots'][] = "@$username_bot";
				saveJson("access.json",$access);
			}
			else
			{
				SA($chatID,'typing');
				SM($chatID,"❌ تعداد ربات های ویژه نشده شما به $Num_Cr رسیده.\n📤 برای ساخت ربات بیشتر یکی از رباتهایتان را حذف کنید.",'html');
			}
		}
		else
		{
			SA($chatID,'typing');
			SM($chatID,"این ربات در رباتساز ما ساخته شده لطفا توکن یک ربات دیگر را ارسال کنید یا این ربات رو از رباتساز ما حذف کنید.",'html',$msg_id);
		}
	}
	saveJson("base/$userID.json",$user);
}



else if($msg == '💬 چت ناشناس' and $step == 'Cr' and $Tc == 'private')
{
	SA($chatID,'typing');
	$user['step'] = 'Crchat';
	SM($chatID,"خوش اومدی 🌹\n\n ✅ برای ساخت ربات چت ناشناس؛ توکن ربات خود را از ( @BotFather ) ارسال کنید\n\n ✅ اگر مشکلی در توکن دارید به بخش راهنما در منوی اصلی یا کانال ربات ساز مراجعه کنید",'html',null,$Button_Back2);
	saveJson("base/$userID.json",$user);
}
else if($step == 'Crchat' and $Tc == 'private')
{
	if(isset($up->message->forward_from) and $up->message->forward_from->id == 308623057)
	{
		if(strpos($msg,'Use this token to access the HTTP API:') !== false)
		{
			$rep = explode("\n",$msg)[3];
			$token = $rep;
		}
		else if(strpos($msg,'Here is the token for bot') !== false)
		{
			$rep = explode("\n",$msg)[2];
			$token = $rep;
		}
		else if(strpos($msg,'Token for the bot') !== false)
		{
			$rep = explode("\n",$msg)[2];
			$token = $rep;
		}
	}
	else
	{
		$token = $msg;
	}
	$resultb = GUNB($token);
	$username_bot = $resultb["result"]["username"];
	$id_bot = $resultb["result"]["id"];
	$first_bot = $resultb["result"]["first_name"];
	$ok = $resultb["ok"];
	if($ok != 1 or strpos($token , 'json ') !== false)
	{
		SA($chatID,'typing');
		SM($chatID,"توکن نامعتبر است!\n\n مجدد اقدام به ساخت ربات کنید و یک\n\n توکن صحیح را وارد کنید",'html',$msg_id);
	}
	else
	{
	
//------------------------------ 

		if($username == null)
		{
			$username = $first;
		}
		else
		{
			$username = "@".$username;
		}
		if(!is_dir("RoBots/$username_bot"))
		{
			if($create < $Num_Cr)
			{
				$user['step'] = 'none';
				$user['create'] = $create + 1;
				$user['RoBots'][] = "@$username_bot";
				mkdir("RoBots/$username_bot");
				mkdir("RoBots/$username_bot/data");
				$base = json_decode(file_get_contents("base.json"),true);
				$base['tokensandadmins']["$username_bot"]['token'] = $token;
				$base['tokensandadmins']["$username_bot"]['admin'] = $userID;
				$base['tokensandadmins']["$username_bot"]['kind of'] = 'chat';
				saveJson("base.json",$base);
				$index = file_get_contents("src/chat/index.php");
				$index = str_replace("[*[TOKEN]*]",$token,$index);
				$index = str_replace("[*[USERNAME]*]",$username_bot,$index);
				$index = str_replace("[*[ADMIN]*]",$userID,$index);
				Save("RoBots/$username_bot/index.php",$index);
				$send = file_get_contents("src/chat/send.php");
				$send = str_replace("[*[TOKEN]*]",$token,$send);
				Save("RoBots/$username_bot/send.php",$send);
				copy('src/chat/jdf.php',"RoBots/$username_bot/jdf.php");
				$userbot = GMUN();
				$nemebot = GMN();
				$textbot = "🤖ربات شما با موفقیت به سرور پرسرعت🚀 ربات ساز $nemebot\n @$userbot\nمتصل شد♻️\nجهت شروع ربات /start را ارسال کنید.";
				file_get_contents("http://api.telegram.org/bot$token/sendMessage?chat_id=$chatID&text=$textbot");
				file_get_contents("https://api.telegram.org/bot$token/setwebhook?url=$URL/RoBots/$username_bot/index.php");
				SA($chatID,'typing');
				SM($chatID,"ربات شما با موفقیت ساخته شد💎\nبرای رفتن به پنل مدیریت در ربات دستور /panel را ارسال کنید✔️\n😎جهت ورود به ربات خود کلیک کنید👇",'html',null,json_encode(['inline_keyboard'=>[[['text'=>"🚀ورود به ربات🚀",'url'=>"https://t.me/$username_bot"]],]]));
				SA($chatID,'typing');
				SM($chatID,"✅به منوی اصلی بازگشتید",'html',null,$Button_Home);
				$access = json_decode(file_get_contents("access.json"),true);
				$access['RoBots'][] = "@$username_bot";
				saveJson("access.json",$access);
			}
			else
			{
				SA($chatID,'typing');
				SM($chatID,"❌ تعداد ربات های ویژه نشده شما به $Num_Cr رسیده.\n📤 برای ساخت ربات بیشتر یکی از رباتهایتان را حذف کنید.",'html');
			}
		}
		else
		{
			SA($chatID,'typing');
			SM($chatID,"این ربات در رباتساز ما ساخته شده لطفا توکن یک ربات دیگر را ارسال کنید یا این ربات رو از رباتساز ما حذف کنید.",'html',$msg_id);
		}
	}
	saveJson("base/$userID.json",$user);
}

else if($msg == '❌ ضدلینک' and $step == 'Cr' and $Tc == 'private')
{
	SA($chatID,'typing');
	$user['step'] = 'Crzdl';
	SM($chatID,"خوش اومدی 🌹\n\n ✅ برای ساخت ربات ضدلینک؛ توکن ربات خود را از ( @BotFather ) ارسال کنید\n\n ✅ اگر مشکلی در توکن دارید به بخش راهنما در منوی اصلی یا کانال ربات ساز مراجعه کنید",'html',null,$Button_Back2);
	saveJson("base/$userID.json",$user);
}
else if($step == 'Crzdl' and $Tc == 'private')
{
	if(isset($up->message->forward_from) and $up->message->forward_from->id == 308623057)
	{
		if(strpos($msg,'Use this token to access the HTTP API:') !== false)
		{
			$rep = explode("\n",$msg)[3];
			$token = $rep;
		}
		else if(strpos($msg,'Here is the token for bot') !== false)
		{
			$rep = explode("\n",$msg)[2];
			$token = $rep;
		}
		else if(strpos($msg,'Token for the bot') !== false)
		{
			$rep = explode("\n",$msg)[2];
			$token = $rep;
		}
	}
	else
	{
		$token = $msg;
	}
	$resultb = GUNB($token);
	$username_bot = $resultb["result"]["username"];
	$id_bot = $resultb["result"]["id"];
	$first_bot = $resultb["result"]["first_name"];
	$ok = $resultb["ok"];
	if($ok != 1 or strpos($token , 'json ') !== false)
	{
		SA($chatID,'typing');
		SM($chatID,"توکن نامعتبر است!\n\n مجدد اقدام به ساخت ربات کنید و یک\n\n توکن صحیح را وارد کنید",'html',$msg_id);
	}
	else
	{
		if($username == null)
		{
			$username = $first;
		}
		else
		{
			$username = "@".$username;
		}
		if(!is_dir("RoBots/$username_bot"))
		{
			if($create < $Num_Cr)
			{
				$user['step'] = 'none';
				$user['create'] = $create + 1;
				$user['RoBots'][] = "@$username_bot";
				mkdir("RoBots/$username_bot");
				mkdir("RoBots/$username_bot/data");
				mkdir("RoBots/$username_bot/other");
				$base = json_decode(file_get_contents("base.json"),true);
				$base['tokensandadmins']["$username_bot"]['token'] = $token;
				$base['tokensandadmins']["$username_bot"]['admin'] = $userID;
				$base['tokensandadmins']["$username_bot"]['kind of'] = 'zdl';
				saveJson("base.json",$base);
				$index = file_get_contents("src/zdl/index.php");
				$index = str_replace("[*[TOKEN]*]",$token,$index);
				$index = str_replace("[*[USERNAME]*]",$username_bot,$index);
				$index = str_replace("[*[ADMIN]*]",$userID,$index);
				Save("RoBots/$username_bot/index.php",$index);
				$send = file_get_contents("src/zdl/send.php");
				$send = str_replace("[*[TOKEN]*]",$token,$send);
				Save("RoBots/$username_bot/send.php",$send);
				copy('src/zdl/file.php',"RoBots/$username_bot/file.php");
				copy('src/zdl/script.php',"RoBots/$username_bot/script.php");
				copy('src/zdl/Creator.php',"RoBots/$username_bot/other/Creator.php");
				copy('src/zdl/Developer.php',"RoBots/$username_bot/other/Developer.php");
				copy('src/zdl/Fun.php',"RoBots/$username_bot/other/Fun.php");
				copy('src/zdl/MsgCheck.php',"RoBots/$username_bot/other/MsgCheck.php");
				copy('src/zdl/Private.php',"RoBots/$username_bot/other/Private.php");
				copy('src/zdl/SuperGroup.php',"RoBots/$username_bot/other/SuperGroup.php");
				$userbot = GMUN();
				$nemebot = GMN();
				$textbot = "🤖ربات شما با موفقیت به سرور پرسرعت🚀 ربات ساز $nemebot\n @$userbot\nمتصل شد♻️\nجهت شروع ربات /start را ارسال کنید.";
				file_get_contents("http://api.telegram.org/bot$token/sendMessage?chat_id=$chatID&text=$textbot");
				file_get_contents("https://api.telegram.org/bot$token/setwebhook?url=$URL/RoBots/$username_bot/index.php");
				SA($chatID,'typing');
				SM($chatID,"ربات شما با موفقیت ساخته شد💎\nبرای رفتن به پنل مدیریت در ربات دستور /panel را ارسال کنید✔️\n😎جهت ورود به ربات خود کلیک کنید👇",'html',null,json_encode(['inline_keyboard'=>[[['text'=>"🚀ورود به ربات🚀",'url'=>"https://t.me/$username_bot"]],]]));
				SA($chatID,'typing');
				SM($chatID,"✅به منوی اصلی بازگشتید",'html',null,$Button_Home);
				$access = json_decode(file_get_contents("access.json"),true);
				$access['RoBots'][] = "@$username_bot";
				saveJson("access.json",$access);
			}
			else
			{
				SA($chatID,'typing');
				SM($chatID,"❌ تعداد ربات های ویژه نشده شما به $Num_Cr رسیده.\n📤 برای ساخت ربات بیشتر یکی از رباتهایتان را حذف کنید.",'html');
			}
		}
		else
		{
			SA($chatID,'typing');
			SM($chatID,"این ربات در رباتساز ما ساخته شده لطفا توکن یک ربات دیگر را ارسال کنید یا این ربات رو از رباتساز ما حذف کنید.",'html',$msg_id);
		}
	}
	saveJson("base/$userID.json",$user);
}
else if($msg == '📜 بنر دهی' and $step == 'Cr' and $Tc == 'private')
{
	SA($chatID,'typing');
	$user['step'] = 'Crbaner';
	SM($chatID,"خوش اومدی 🌹\n\n ✅ برای ساخت ربات بنردهی؛ توکن ربات خود را از ( @BotFather ) ارسال کنید\n\n ✅ اگر مشکلی در توکن دارید به بخش راهنما در منوی اصلی یا کانال ربات ساز مراجعه کنید",'html',null,$Button_Back2);
	saveJson("base/$userID.json",$user);
}
else if($step == 'Crbaner' and $Tc == 'private')
{
	if(isset($up->message->forward_from) and $up->message->forward_from->id == 308623057)
	{
		if(strpos($msg,'Use this token to access the HTTP API:') !== false)
		{
			$rep = explode("\n",$msg)[3];
			$token = $rep;
		}
		else if(strpos($msg,'Here is the token for bot') !== false)
		{
			$rep = explode("\n",$msg)[2];
			$token = $rep;
		}
		else if(strpos($msg,'Token for the bot') !== false)
		{
			$rep = explode("\n",$msg)[2];
			$token = $rep;
		}
	}
	else
	{
		$token = $msg;
	}
	$resultb = GUNB($token);
	$username_bot = $resultb["result"]["username"];
	$id_bot = $resultb["result"]["id"];
	$first_bot = $resultb["result"]["first_name"];
	$ok = $resultb["ok"];
	if($ok != 1 or strpos($token , 'json ') !== false)
	{
		SA($chatID,'typing');
		SM($chatID,"توکن نامعتبر است!\n\n مجدد اقدام به ساخت ربات کنید و یک\n\n توکن صحیح را وارد کنید",'html',$msg_id);
	}
	else
	{
		if($username == null)
		{
			$username = $first;
		}
		else
		{
			$username = "@".$username;
		}
		if(!is_dir("RoBots/$username_bot"))
		{
			if($create < $Num_Cr)
			{
				$user['step'] = 'none';
				$user['create'] = $create + 1;
				$user['RoBots'][] = "@$username_bot";
				mkdir("RoBots/$username_bot");
				mkdir("RoBots/$username_bot/data");
				$base = json_decode(file_get_contents("base.json"),true);
				$base['tokensandadmins']["$username_bot"]['token'] = $token;
				$base['tokensandadmins']["$username_bot"]['admin'] = $userID;
				$base['tokensandadmins']["$username_bot"]['kind of'] = 'baner';
				saveJson("base.json",$base);
				$index = file_get_contents("src/baner/index.php");
				$index = str_replace("[*[TOKEN]*]",$token,$index);
				$index = str_replace("[*[ADMIN]*]",$userID,$index);
				Save("RoBots/$username_bot/index.php",$index);
				$send = file_get_contents("src/baner/send.php");
				$send = str_replace("[*[TOKEN]*]",$token,$send);
				Save("RoBots/$username_bot/send.php",$send);
				$arrayfile = array_diff(scandir("src/baner"),['.','..','index.php','send.php']);
				foreach($arrayfile as $file)
				{
					copy("src/baner/$file","RoBots/$username_bot/$file");
				}
				$userbot = GMUN();
				$nemebot = GMN();
				$textbot = "🤖ربات شما با موفقیت به سرور پرسرعت🚀 ربات ساز $nemebot\n @$userbot\nمتصل شد♻️\nجهت شروع ربات /start را ارسال کنید.";
				file_get_contents("http://api.telegram.org/bot$token/sendMessage?chat_id=$chatID&text=$textbot");
				file_get_contents("https://api.telegram.org/bot$token/setwebhook?url=$URL/RoBots/$username_bot/index.php");
				SA($chatID,'typing');
				SM($chatID,"ربات شما با موفقیت ساخته شد💎\nبرای رفتن به پنل مدیریت در ربات دستور /panel را ارسال کنید✔️\n😎جهت ورود به ربات خود کلیک کنید👇",'html',null,json_encode(['inline_keyboard'=>[[['text'=>"🚀ورود به ربات🚀",'url'=>"https://t.me/$username_bot"]],]]));
				SA($chatID,'typing');
				SM($chatID,"✅به منوی اصلی بازگشتید",'html',null,$Button_Home);
				$access = json_decode(file_get_contents("access.json"),true);
				$access['RoBots'][] = "@$username_bot";
				saveJson("access.json",$access);
			}
			else
			{
				SA($chatID,'typing');
				SM($chatID,"❌ تعداد ربات های ویژه نشده شما به $Num_Cr رسیده.\n📤 برای ساخت ربات بیشتر یکی از رباتهایتان را حذف کنید.",'html');
			}
		}
		else
		{
			SA($chatID,'typing');
			SM($chatID,"این ربات در رباتساز ما ساخته شده لطفا توکن یک ربات دیگر را ارسال کنید یا این ربات رو از رباتساز ما حذف کنید.",'html',$msg_id);
		}
	}
	saveJson("base/$userID.json",$user);
}
else if($msg == 'حساب ویژه 🌟' and $Tc == 'private')
{
	SA($chatID,'typing');
	SM($chatID,"✳️ گزینه مورد نظر را انتخاب نمائید.",'html',null,$Button_Special_free_account);
}
else if($msg == 'ویژه کردن ربات ❤️‍🔥' and $Tc == 'private')
{
	if(isset($user['RoBots'][0])){
		$user['step'] = 'VIP';
		SA($chatID,'typing');
		foreach($user['RoBots'] as $bots)
		{
			$str = str_replace('@',null,$bots);
			if(!is_file("RoBots/$str/VIP"))
			{
				$button[] = [['text'=>$bots]];
			}
		}
		$button[] = [['text'=>'-『 بازگشت 』-']];
		$Button_VIP = json_encode(['keyboard'=>$button,'resize_keyboard'=>true]);
		SM($chatID,"🤖 ربات مد نظرتونو انتخاب کنین.",'html',$msg_id,$Button_VIP);
	}
	else
	{
		SA($chatID,'typing');
		SM($chatID,"❌ شما ربات ویژه نشده ای ندارید.",'html',$msg_id);
	}
	saveJson("base/$userID.json",$user);
}
else if($step == 'VIP' and $Tc == 'private')
{
	$str = str_replace('@',null,$msg);
	if(in_array($msg,$user['RoBots']))
	{
		$msg = str_replace('@',null,$msg);
		SA($chatID,'typing');
		$base = json_decode(file_get_contents("base.json"),true);
		$kind_of = $base['tokensandadmins']["$msg"]['kind of'];
		if(!is_file("RoBots/$msg/VIP"))
		{
			if($kind_of == 'Esm')
			{
				if($Points >= $Esm_points)
				{
					$user['Points'] = $Points - $Esm_points;
					$user['create'] = $create - 1;
					$user['step'] = 'none';
					file_put_contents("RoBots/$msg/VIP",null);
					SM($chatID,"با موفقیت ویژه شد",'html',$msg_id,$Button_Home);
				}
				else
				{
					SM($chatID,"❌ امتیاز شما برای ویژه کردن این ربات کافی نیست.\n🧮 امتیاز مورد نیاز : $Esm_points\n📌 امتیاز شما : $Points",'html');
				}
			}
			else if($kind_of == 'mem')
			{
				if($Points >= $mem_points)
				{
					$user['Points'] = $Points - $mem_points;
					$user['create'] = $create - 1;
					$user['step'] = 'none';
					file_put_contents("RoBots/$msg/VIP",null);
					SM($chatID,"با موفقیت ویژه شد",'html',$msg_id,$Button_Home);
				}
				else
				{
					SM($chatID,"❌ امتیاز شما برای ویژه کردن این ربات کافی نیست.\n🧮 امتیاز مورد نیاز : $mem_points\n📌 امتیاز شما : $Points",'html');
				}
			}
			else if($kind_of == 'zds')
			{
				if($Points >= $zds_points)
				{
					$user['Points'] = $Points - $zds_points;
					$user['create'] = $create - 1;
					$user['step'] = 'none';
					file_put_contents("RoBots/$msg/VIP",null);
					SM($chatID,"با موفقیت ویژه شد",'html',$msg_id,$Button_Home);
				}
				else
				{
					SM($chatID,"❌ امتیاز شما برای ویژه کردن این ربات کافی نیست.\n🧮 امتیاز مورد نیاز : $zds_points\n📌 امتیاز شما : $Points",'html');
				}
			}
			else if($kind_of == 'pv')
			{
				if($Points >= $pv_points)
				{
					$user['Points'] = $Points - $pv_points;
					$user['create'] = $create - 1;
					$user['step'] = 'none';
					file_put_contents("RoBots/$msg/VIP",null);
					SM($chatID,"با موفقیت ویژه شد",'html',$msg_id,$Button_Home);
				}
				else
				{
					SM($chatID,"❌ امتیاز شما برای ویژه کردن این ربات کافی نیست.\n🧮 امتیاز مورد نیاز : $pv_points\n📌 امتیاز شما : $Points",'html');
				}
			}
			else if($kind_of == 'tele')
			{
				if($Points >= $tele_points)
				{
					$user['Points'] = $Points - $tele_points;
					$user['create'] = $create - 1;
					$user['step'] = 'none';
					file_put_contents("RoBots/$msg/VIP",null);
					SM($chatID,"با موفقیت ویژه شد",'html',$msg_id,$Button_Home);
				}
				else
				{
					SM($chatID,"❌ امتیاز شما برای ویژه کردن این ربات کافی نیست.\n🧮 امتیاز مورد نیاز : $tele_points\n📌 امتیاز شما : $Points",'html');
				}
			}
			else if($kind_of == 'chat')
			{
				if($Points >= $chat_points)
				{
					$user['Points'] = $Points - $chat_points;
					$user['create'] = $create - 1;
					$user['step'] = 'none';
					file_put_contents("RoBots/$msg/VIP",null);
					SM($chatID,"با موفقیت ویژه شد",'html',$msg_id,$Button_Home);
				}
				else
				{
					SM($chatID,"❌ امتیاز شما برای ویژه کردن این ربات کافی نیست.\n🧮 امتیاز مورد نیاز : $chat_points\n📌 امتیاز شما : $Points",'html');
				}
			}
			else if($kind_of == 'zdl')
			{
				if($Points >= $zdl_points)
				{
					$user['Points'] = $Points - $zdl_points;
					$user['create'] = $create - 1;
					$user['step'] = 'none';
					file_put_contents("RoBots/$msg/VIP",null);
					SM($chatID,"با موفقیت ویژه شد",'html',$msg_id,$Button_Home);
				}
				else
				{
					SM($chatID,"❌ امتیاز شما برای ویژه کردن این ربات کافی نیست.\n🧮 امتیاز مورد نیاز : $zdl_points\n📌 امتیاز شما : $Points",'html');
				}
			}
			else if($kind_of == 'baner')
			{
				if($Points >= $baner_points)
				{
					$user['Points'] = $Points - $baner_points;
					$user['create'] = $create - 1;
					$user['step'] = 'none';
					file_put_contents("RoBots/$msg/VIP",null);
					SM($chatID,"با موفقیت ویژه شد",'html',$msg_id,$Button_Home);
				}
				else
				{
					SM($chatID,"❌ امتیاز شما برای ویژه کردن این ربات کافی نیست.\n🧮 امتیاز مورد نیاز : $baner_points\n📌 امتیاز شما : $Points",'html');
				}
			}
		}
		else
		{
			SM($chatID,"🚧 لطفا از دکمه های زیر استفاده کنید.",'html');
		}
	}
	else
	{
		SA($chatID,'typing');
		SM($chatID,"🚧 لطفا از دکمه های زیر استفاده کنید.",'html');
	}
	saveJson("base/$userID.json",$user);
}

else if($msg == 'وضعیت سرور 📊' and $Tc == 'private')
{
	SA($chatID,'typing');
	$ping = sys_getloadavg()[2];
	$Scan = scandir('base');
	$Scan = array_diff($Scan, ['.','..']);
	$members = 0;
	foreach($Scan as $Value)
	{
		if(is_file("base/$Value"))
		{
			$members++;
		}
	}
	$Scan = scandir('RoBots');
	$Scan = array_diff($Scan, ['.','..']);
	$bots = 0;
	foreach($Scan as $Value)
	{
		if(is_dir("RoBots/$Value"))
		{
			$bots++;
			if(is_file("RoBots/$Value/VIP"))
			{
				$botsVIP++;
			}
		}
	}
	
	$ram = round(memory_get_usage() / 1024 / 1024,2);
	SM($chatID,"📊 اطـلاعـات ربـاتـسـاز تروکس و سـرور ربـات :",'html',null,json_encode(['inline_keyboard'=>[
[['text'=>"「 $ping ᴍs」",'callback_data'=>"a"],['text'=>"پینگ سرور 🐉⇠",'callback_data'=>"b"]],
[['text'=>"「 $ram ᴍʙ 」",'callback_data'=>"a"],['text'=>"مقدار رم مصرفی 🌀⇠",'callback_data'=>"b"]],
[['text'=>"「 $members 」",'callback_data'=>"a"],['text'=>"تعداد اعضا 👥⇠",'callback_data'=>"b"]],
[['text'=>"「 $bots 」",'callback_data'=>"a"],['text'=>"تعداد رباتها 🤖 ⇠",'callback_data'=>"b"]],


]]));
}



else if($msg == 'امتیازات من ⚜' and $Tc == 'private')
{
	SA($chatID,'typing');
	SM($chatID,"امتیازات شما : $Points  🎊",'html',$mid,$Button_How);
}
else if($msg == 'لینک زیر مجموعه گیری 🔖' and $Tc == 'private')
{
	$userbot = GMUN();
	SA($chatID,'upload_photo');
	$mid = Sph($chatID,new CURLFile('photo.jpg'),"تروکس بهت کمک میکنه بدون هزینه و تبلیغ یک ربات پیشرفته داشته باشی.🤖 \n \n🔻| ویـژگـي ربـاتسـاز تروکس : \n🎁~ بدون یک ریال هزینه ! \n⚙~ تنظیمات حرفه ای ! \n🚀~ سرعت فوق العاده  ! \n💎~ امنیت بسیار بالا ! \n🪄 ~ ساخت ربات های پیشرفته ! \n😜‌ ~ و کلی امکانات دیگر ! \n \nهـمـیـن الان اسـتـارت کـن لـذت بـبـر 🤩👇\n http://t.me/$userbot?start=$userID",$Mode)['result']['message_id'];
	SA($chatID,'typing');
	SM($chatID,"دوست عزیز بنر بالا را با #مخاطبین و #گروه های خود به اشتراک بگذارید و پس از وارد شد هر فرد با لینک شما یک امتیاز دریافت میکنید 🎈",'Html',$mid);


}
else if($msg == '🎥' and $Tc == 'private')
{
	SA($chatID,'typing');
	$userbot = GMUN();
	SM($chatID,"https://t.me/LorexTeam/17455",'html',$msg_id,$Button_Back);
}

else if($msg == '🛎️' and $Tc == 'private')
{
	SA($chatID,'typing');
	$userbot = GMUN();
	SM($chatID,"تبلیغات در ربات ساز تروکس پذیرفته میشود جهت هماهنگی به سازنده پیام ارسال کنید 👨‍💻",'html',$msg_id,$Button_Ho3win);
}


else if($msg == '👨‍✈️' and $Tc == 'private')
{
	SA($chatID,'typing');
	$user['step'] = 'takhlof';
	$nemebot = GMN();
	SM($chatID,"➰ لطفا نام کاربری ربات(آیدی) که با ربات ساز $nemebot ساخته شده و تخلف کرده است را بفرستید.➰",'html',$msg_id,$Button_Back);
	saveJson("base/$userID.json",$user);
}
else if($step == 'takhlof' and $Tc == 'private')
{
	if(preg_match('/^(@)(.*)([Bb][Oo][Tt])/s',$msg))
	{
		SA($gp_reports,'typing');
		SA($chatID,'typing');
		$user['step'] = 'none';
		$nemebot = GMN();
		SM($gp_reports,"گزارش تخلف ⬇",'html');
		FM($gp_reports,$chatID,$msg_id);
		SM($chatID,"🖌 گزارش شما ثبت شد و به زودی از طرف پشتیبانی ربات ساز $nemebot پیگیری خواهد شد.\nبا تشکر از شما🥀",'html',$msg_id,$Button_Back);
		saveJson("base/$userID.json",$user);
	}
	else
	{
		SA($chatID,'typing');
		SM($chatID,"⭕️ خطا !!!\n⭕️ دقت کنین یوزرنیم ربات با @ شروع شده و با کلمه (bot) پایان میابد",'html',$msg_id,$Button_Back);
	}
}
else if($msg == '⚖️' and $Tc == 'private')
{
	SA($chatID,'typing');
	SM($chatID,"💯قوانین ساخت ربات:\n\n🔹 همه مطالب باید تابع قوانین جمهوری اسلامی ایران باشد.\n🔹 رعایت ادب و احترام به کاربران.\n🔹 ساخت هرگونه ربات در ضمیمه +18 خلاف قوانین ربات میباشد و در صورت مشاهده ربات مورد نظر مسدود و همچنین مدیر ربات از تمامی ربات ها بلاک میشود.\n🔹 مسئولیت پیام های رد و بدل شده در هر ربات با مدیر آن میباشد و ما هیچگونه مسئولیتی نداریم.\n🔹 در صورت مشاهده استفاده از قابلیت های ربات در جهات منفی به شدت برخورد میشود.\n🔹 اگر به هر دلیلی درخواست های ربات شما به سرور ما بیش از حد معمول باشد (و حساب ربات ویژه نباشد) چند باری به شما اخطار داده میشود اگر این اخطار ها نادیده گرفته شوند ربات شما مسدود و به هیچ عنوان از محدودیت خارج نمیشود.\n🔹 بعد از پرداخت مبلغ جهت ویژه کردن رباتتان وجه به هیچ عنوان باز نمیگردد مگر اینکه ربات شما مشکل داشته باشد.",'html',$msg_id,$Button_Back);
}

else if($msg == 'خرید امتیاز 🛒' and $Tc == 'private')
{
	SA($chatID,'typing');
	SM($chatID,"روش پرداخت خود را انتخاب کنید 🎐",'html',$msg_id,$Button_kharid);
}

else if($msg == 'نیتروسین 💰' and $Tc == 'private')
{
	SA($chatID,'typing');
	SM($chatID,"🖲 قیمت هر امتیاز برابر با 300 نیت می‌باشد\n🛑 کاربری جهت انتقال 308623057\n📤 پس از انتقال ، پیام انتقال را از طریق دکمه ارسال مدارک به بنده ارسال کنید",'html',$msg_id,$Button_Nit);
}

else if($msg == 'پول 💸' and $Tc == 'private')
{
	SA($chatID,'typing');
	SM($chatID,"🖲 قیمت هر 10 امیتاز برابر با 800 تومان می‌باشد \n \n🏧 شماره کارت \n6037-9981-2489-7066 \n \n 📥 پس از انتقال وجه رسید خود را از طریق دکمه ارسال مدارک به بنده ارسال کنید تا تایید شوید 
⚠️ برای احراز کارت و جلوگیری از ارسال پول فیشینگ حتما باید از طریق دکمه ارسال مدارک عکس از کارت مبدا به پیوی بنده ارسال کنید",'html',$msg_id,$Button_Pol);
}

else if($msg == 'شارژ 💎' and $Tc == 'private')
{
	SA($chatID,'typing');
	SM($chatID,"🖲 قیمت هر 10 امیتاز برابر با 1000 تومان می‌باشد\n \n🟡ایرانسل 09020661173 \n🔵همراه اول 09101945230 \n \n📛پس از انتقال اگر با خط خود انتقال دادید شماره خود در غیر این صورت حتما اسکرین شات را از طریق دکمه ارسال مدارک به بنده ارسال کنید",'html',$msg_id,$Button_Sharj);
}

else if($msg == 'ارتباط با پشتیبانی 🕊️' and $Tc == 'private')
{
	SA($chatID,'typing');
	$user['step'] = 'Support';
	SM($chatID,"✉️ متن پیام خود را با رعایت موارد زیر ارسال نمایید:\n\n1⃣ سوال، پیام، انتقاد و پیشنهادهای خود را درون یک پیام واحد نوشته و ارسال نمایید. (از جواب دادن به مواردی که در چند پیام جداگانه ارسال می شود معذوریم)\n2⃣ تا زمان دریافت پاسخ صبور باشید و از پرسش مجدد خودداری کنید.",'html',$msg_id,$Button_Back);
	saveJson("base/$userID.json",$user);
}
else if($step == 'Support' and $Tc == 'private')
{
	if(!isset($up->message->forward_from) and !isset($up->message->forward_from_chat))
	{
		$filephoto = $up->message->photo;
		$photo = $filephoto[count($filephoto)-1]->file_id;
		$file = $up->message->document->file_id;
		$video = $up->message->video->file_id;
		$music = $up->message->audio->file_id;
		$voice = $up->message->voice->file_id;
		$sticker = $up->message->sticker->file_id;
		$caption = $up->message->caption;
		if(isset($msg))
		{
			$m_id = SM($gp_reports,"$msg",'html')['result']['message_id'];
		}
		else if(isset($photo))
		{
			$m_id = Sph($gp_reports,$photo,$caption,'html')['result']['message_id'];
		}
		else if(isset($file))
		{
			$m_id = SFile($gp_reports,$file,$caption)['result']['message_id'];
		}
		else if(isset($video))
		{
			$m_id = SendVideo($gp_reports,$video,$caption)['result']['message_id'];
		}
		else if(isset($music))
		{
			$m_id = SMusic($gp_reports,$music,$caption)['result']['message_id'];
		}
		else if(isset($voice))
		{
			$m_id = SendVoice($gp_reports,$voice,$caption)['result']['message_id'];
		}
		else if(isset($sticker))
		{
			$m_id = SendSticker($gp_reports,$sticker,$caption)['result']['message_id'];
		}
		$m_id = SM($gp_reports,"[پیوی کاربر](tg://user?id=$userID)\nبرای پاسخ این پیام را ریپلای کرده و پاسختان را ارسال کنید🗣",'MarkDown',$m_id)['result']['message_id'];
		$Support = ['ID' => $userID, 'msg' => $msg_id];
		saveJson("Support/$m_id.json",$Support);
		SA($chatID,'typing');
		SM($chatID,"✅ پیام شما با موفقیت دریافت شد!\nلطفا تا زمان دریافت پاسخ صبور باشید، بزودی واحد پشتیبانی به آن پاسخ خواهند داد.",'html');
	}
}
else if(isset($up->message) and $chatID == $gp_reports and isset($up->message->reply_to_message->message_id))
{
	$filephoto = $up->message->photo;
	$photo = $filephoto[count($filephoto)-1]->file_id;
	$file = $up->message->document->file_id;
	$video = $up->message->video->file_id;
	$music = $up->message->audio->file_id;
	$voice = $up->message->voice->file_id;
	$sticker = $up->message->sticker->file_id;
	$caption = $up->message->caption;
	$ID = $up->message->reply_to_message->message_id;
	if(is_file("Support/$ID.json"))
	{
		$Support = json_decode(file_get_contents("Support/$ID.json"),true);
		$userID = $Support['ID'];
		$msg_idd = $Support['msg'];
		if($msg == 'ban' or $msg == '/ban' or $msg == '!ban' or $msg == 'بن' or $msg == 'بلاک' or $msg == 'مسدود')
		{
			SA($userID,'typing');
			SA($chatID,'typing');
			$list['ban'][] = $userID;
			saveJson("list.json",$list);
			SM($userID,"کاربر گرامی🔰

شما به علت اسپم زدن به این ربات از ربات بلاک شدید❗️",'html',$msg_idd);
			SM($chatID,"کاربر [$userID ](tg://user?id=$userID) با موفقیت مسدود شد🙆🏻‍♂️",'MarkDown',$msg_id);
			unlink("Support/$ID.json");
		}
		else
		{
		    
		
		    
			if(isset($msg))
			{
				SA($userID,'typing');
				SM($userID,$msg,'html',$msg_idd);
			}
			else if(isset($photo))
			{
				Sph($userID,$photo,$caption,'html');
			}
			else if(isset($file))
			{
				SFile($userID,$file,$caption);
			}
			else if(isset($video))
			{
				SendVideo($userID,$video,$caption);
			}
			else if(isset($music))
			{
				SMusic($userID,$music,$caption);
			}
			else if(isset($voice))
			{
				SendVoice($userID,$voice,$caption);
			}
			else if(isset($sticker))
			{
				SendSticker($userID,$sticker,$caption);
			}
			SA($chatID,'typing');
			SM($chatID,"پیام با موفقیت ارسال شد💚",'html',$msg_id);
			unlink("Support/$ID.json");
		}
	}
}
else if($data == 'join' and $Tc = 'private')
{
	if(($Join == 'member' or $Join == 'creator' or $Join == 'administrator') and ($Join2 == 'member' or $Join2 == 'creator' or $Join2 == 'administrator'))
	{
		DLM($chatID,$msg_id);
		SA($chatID,'typing');
		SM($chatID,"☑️ عضویت شما تایید شد . به منوی اصلی ربات خوش آمدید",'MarkDown',null,$Button_Home);
	}
	else
	{
		if($Join2 != 'member' and $Join2 != 'creator' and $Join2 != 'administrator')
		{
			ACQ($data_id,"❌ هنوز داخل کانال های @$channel و @$channel2 عضو نیستید",true);
		}
		else
		{
			ACQ($data_id,"❌ هنوز داخل کانال @$channel عضو نیستید",true);
		}
	}
}
else if($data == 'DMEsm' and $step == 'Cr' and $Tc = 'private')
{
	SA($chatID,'typing');
	$user['step'] = 'DMEsm';
	DLM($chatID, $msg_id);
	SM($chatID,"خوش اومدی 🌹\n\n ✅ برای ساخت ربات اسم فامیل؛ توکن ربات خود را از ( @BotFather ) ارسال کنید\n\n ✅ اگر مشکلی در توکن دارید به بخش راهنما در منوی اصلی یا کانال ربات ساز مراجعه کنید",'html',null,$Button_Back2);
	saveJson("base/$userID.json",$user);
}
else if($data == 'How')
{
	SA($chatID,'typing');
	SM($chatID,"روش اول  خرید امتیاز 🛒  \n توضیحات : در این روش شما با سه روش #نیتروسین #پول #شارژ میتوانید حساب خود را شارژ کنید ⚜ \n \n  ----- ---- --- ---- ---- ----- ----- ---- ----- ----- \n \n روش دوم جمع آوری امتیاز 🏷️ \nتوضیحات : در این روش شما با گرفتن لینک زیر مجموعه گیری خود و به اشتراک گذاشتن آن در #گروه ها و #مخاطبین پس از وارد شدن هر فرد در ربات با لینک شما یک امتیاز دریافت میکنید",'MarkDown');
}

###<<// Admins panel \\>>###
else if($msg == '🙍‍♂️ مدیریت' and $Tc == 'private' and in_array($chatID,$Dev))
{
	SA($chatID,'typing');
	$user['step'] = 'none';
	SM($chatID,"📚 به پنل مدیریت ربات خوش اومدین قربان.\n📍 یکی از موارد زیر را انتخاب کنید",'html',$msg_id,$Button_Admins_Panel);
	saveJson("base/$userID.json",$user);
}
else if($msg == '📜 مشخصات کاربر' and $Tc == 'private' and in_array($chatID,$Dev))
{
	SA($chatID,'typing');
	$user['step'] = 'User Profile';
	SM($chatID,"🆔 قربان من برای ارسال مشخصات کاربر به شما نیاز به شناسه عددی کاربر مورد نظر دارم.\n📍 لطفا شناسه را برایم بفرستید.",'html',$msg_id,$Button_Back2);
	saveJson("base/$userID.json",$user);
}
else if($step == 'User Profile' and $Tc == 'private')
{
	$ok = GCMB($msg);
	if($ok == true)
	{
		SA($chatID,'typing');
		$user['step'] = 'none';
		$data = json_decode(file_get_contents("base/$msg.json"),true);
		$Points = $data['Points'];
		$name = GCN($msg);
		$last_name = GCLN($msg);
		$username = GCUN($msg);
		if($username != null)
		{
			$username = "@$username";
		}
		else
		{
			$username = 'نداره‼️';
		}
		if($last_name == null)
		{
			$last_name = 'نداره‼️';
		}
		if($name == null)
		{
			$name = 'نداره‼️';
		}
		SA($chatID,'typing');
		SM($chatID,"📜 مشخصات کاربر مورد نظر خدمت شما\n\n🀄️ نام : $name\n👨‍👨‍👦‍👦 نام خانوادگی : $last_name\n©️ یوزرنیم کاربر : $username\n🔑 پیوی کاربر : [$msg](tg://user?id=$msg)\n🆔 شناسه عددی : $msg\n🎁 امتیاز : $Points",'MarkDown',$msg_id,$Button_Admins_Panel);
		$Profile = GP($msg);
		if($Profile != null)
		{
			SA($chatID,'upload_photo');
			Sph($chatID,$Profile,'🖼 تصویر پروفایل کاربر مورد نظر هم اینه قربان.','MarkDown',json_encode(['inline_keyboard'=>[[['text'=>"🌅 دریافت ده عکس آخر پروفایل 🏞",'callback_data'=>"Profile-$msg"]],]]));
		}
	}
	else
	{
		SA($chatID,'typing');
		SM($chatID,"❌ این کاربر عضو ربات نیست قربان",'MarkDown',$msg_id);
	}
	saveJson("base/$userID.json",$user);
}
else if(strpos($data,'Profile-') !== false)
{
	$id = str_replace('Profile-',null,$data);
	$Media_Group = GPAll($id,0);
	SA($chatID,'upload_photo');
	SMG($chatID,$Media_Group,$msg_id);
}
else if($msg == '📊 وضعیت ربات' and $Tc == 'private' and in_array($chatID,$Dev))
{
	SA($chatID,'typing');
	$ping = sys_getloadavg()[2];
	$Scan = scandir('base');
	$Scan = array_diff($Scan, ['.','..']);
	$members = 0;
	foreach($Scan as $Value)
	{
		if(is_file("base/$Value"))
		{
			$members++;
		}
	}
	$Scan = scandir('RoBots');
	$Scan = array_diff($Scan, ['.','..']);
	$bots = 0;
	$botsVIP = 0;
	foreach($Scan as $Value)
	{
		if(is_dir("RoBots/$Value"))
		{
			$bots++;
			if(is_file("RoBots/$Value/VIP"))
			{
				$botsVIP++;
			}
		}
	}
	
	

	$NIP = $bots - $botsVIP;
	$ram = round(memory_get_usage() / 1024 / 1024,2);
	SM($chatID,"⏱ پینگ سرور : $ping\n👥 تعداد اعضا : $members\n🤖 تعداد رباتها : $bots\n🗃 مقدار رم در حال استفاده : $ram مگابایت\nتعداد ربات ویژه : $botsVIP\nتعداد ربات غیر ویژه : $NIP",'html',$msg_id);
}
else if($msg == '🛡 تنظیم متن کریتور' and $Tc == 'private' and in_array($chatID,$Dev))
{
	SA($chatID,'typing');
	$user['step'] = 'SetCreator';
	SM($chatID,"🛠 لطفا متن کریتور رو برام بفرستین.",'html',$msg_id,$Button_Back2);
	saveJson("base/$userID.json",$user);
}
else if(strpos($step,'SetCreator') !== false and $Tc == 'private' and isset($msg))
{
	SA($chatID,'typing');
	$user['step'] = 'none';
	Save("creator.txt",$msg);
	SM($chatID,"⚙️ متن کریتور با موفقیت تنظیم شد.",'html',$msg_id,$Button_Admins_Panel);
	saveJson("base/$userID.json",$user);
}
else if($msg == '📤 افزایش امتیاز کاربر' and $Tc == 'private' and in_array($chatID,$Dev))
{
	SA($chatID,'typing');
	$user['step'] = 'Increase points';
	SM($chatID,"👮🏻‍♀️ قربان من برای اضافه کردن امتیاز از کاربر نیاز به شناسه عددی کاربر دارم لطفا شناسه کاربر مورد نظر را ارسال کنید.",'html',$msg_id,$Button_Back2);
	saveJson("base/$userID.json",$user);
}
else if(strpos($step,'Increase points') !== false and $Tc == 'private')
{
	if($step == 'Increase points')
	{
		$ok = GCMB($msg);
		if($ok == true)
		{
			SA($chatID,'typing');
			$user['step'] = 'Increase points+';
			$user['User'] = $msg;
			saveJson("base/$userID.json",$user);
			SM($chatID,"✅ خب حالا تعداد امتیازی که میخواهید به کاربر اضافه شود را با عدد لاتین وارد کنید. 🔢",'html',$msg_id);
		}
		else
		{
			SA($chatID,'typing');
			SM($chatID,"❌ این کاربر عضو ربات نیست قربان",'MarkDown',$msg_id);
		}
	}
	else
	{
		if(is_numeric($msg))
		{
			SA($chatID,'typing');
			$msg = round($msg,0);
			$user['step'] = 'none';
			saveJson("base/$userID.json",$user);
			$select_user = json_decode(file_get_contents("base/$User.json"),true);
			$Pointsplus = $select_user['Points'] + $msg;
			$select_user['Points'] = $Pointsplus;
			saveJson("base/$User.json",$select_user);
			SM($chatID,"✅ مقدار $msg امتیاز به کاربر $User مورد نظر اضافه شد.",'html',$msg_id,$Button_Admins_Panel);
			SM($User,"✅ مقدار $msg امتیاز از مدیریت ربات به حساب کاربری شما واریز شد.",'html');
		}
	}
}
else if($msg == 'ست وبهوک' and $Tc == 'private' and in_array($chatID,$Dev))
{
	SA($chatID,'typing');
	$user['step'] = 'webhook';
	SM($chatID,"قربان آیا از ست وبهوک کردن مجدد همه ربات ها مطمئن هستید؟!",'html',$msg_id,$Button_Safe);
	saveJson("base/$userID.json",$user);
}
else if($step == 'webhook' and $Tc == 'private' and in_array($chatID,$Dev) and isset($data))
{
	$user['step'] = 'none';
	if($data == 'Yes')
	{
		SA($chatID,'typing');
		DLM($chatID, $msg_id);
		SM($chatID,"در حال انجام ست وبهوک پس از پایان اطلاع میدم بهتون",'html',$msg_id,$Button_Admins_Panel);
		file_put_contents("webhook",0);
	}
	else
	{
		SA($chatID,'typing');
		DLM($chatID, $msg_id);
		SM($chatID,"عملیات با موفقیت لغو شد.",'html',$msg_id,$Button_Admins_Panel);
	}
	saveJson("base/$userID.json",$user);
}
else if($msg == '📥 کاهش امتیاز کاربر' and $Tc == 'private' and in_array($chatID,$Dev))
{
	SA($chatID,'typing');
	$user['step'] = 'Reduce points';
	SM($chatID,"👮🏻‍♀️ قربان من برای کم کردن امتیاز از کاربر نیاز به شناسه عددی کاربر دارم لطفا شناسه کاربر مورد نظر را ارسال کنید.",'html',$msg_id,$Button_Back2);
	saveJson("base/$userID.json",$user);
}
else if(strpos($step,'Reduce points') !== false and $Tc == 'private')
{
	if($step == 'Reduce points')
	{
		$ok = GCMB($msg);
		if($ok == true)
		{
			SA($chatID,'typing');
			$user['step'] = 'Reduce points-';
			$user['User'] = $msg;
			saveJson("base/$userID.json",$user);
			SM($chatID,"✅ خب حالا تعداد امتیازی که میخواهید از کاربر کم شود را با عدد لاتین وارد کنید. 🔢",'html',$msg_id);
		}
		else
		{
			SA($chatID,'typing');
			SM($chatID,"❌ این کاربر عضو ربات نیست قربان",'MarkDown',$msg_id);
		}
	}
	else
	{
		if(is_numeric($msg))
		{
			SA($chatID,'typing');
			$msg = round($msg,0);
			$user['step'] = 'none';
			saveJson("base/$userID.json",$user);
			$select_user = json_decode(file_get_contents("base/$User.json"),true);
			$Pointsminus = $select_user['Points'] - $msg;
			$select_user['Points'] = $Pointsminus;
			saveJson("base/$User.json",$select_user);
			SM($chatID,"✅ مقدار $msg امتیاز از کاربر $User مورد نظر کم شد.",'html',$msg_id,$Button_Admins_Panel);
			SM($User,"⭕️ مدیریت ربات مقدار $msg امتیاز از حساب شما کم کرد.",'html');
		}
	}
}
else if($msg == '⛔️ بلاک' and $Tc == 'private' and in_array($chatID,$Dev))
{
	SA($chatID,'typing');
	$user['step'] = 'ban';
	SM($chatID,"🆔 خب شناسه کاربر مورد نظر را ارسال کنید.",'html',$msg_id,$Button_Back2);
	saveJson("base/$userID.json",$user);
}
else if($step == 'ban' and $Tc == 'private')
{
	$ok = GCMB($msg);
	if($ok == true)
	{
		if(!in_array($msg,$ban))
		{
			$user['step'] = 'none';
			SA($chatID,'typing');
			$list['ban'][] = $msg;
			saveJson("list.json",$list);
			SM($chatID,"❌ کاربر [$msg](tg://user?id=$msg) با موفقیت بلاک شد.",'MarkDown',$msg_id);
			SM($msg,"❌ حساب شما توسط مدیریت ربات مسدود شد.",'MarkDown');
		}
		else
		{
			SA($chatID,'typing');
			SM($chatID,"⛔️ این کاربر از قبل بلاک بود.",'MarkDown',$msg_id);
		}
	}
	else
	{
		SA($chatID,'typing');
		SM($chatID,"❌ این کاربر عضو ربات نیست قربان",'MarkDown',$msg_id);
	}
	saveJson("base/$userID.json",$user);
}
else if($msg == '🅰️ آنبلاک' and $Tc == 'private' and in_array($chatID,$Dev))
{
	SA($chatID,'typing');
	$user['step'] = 'unban';
	SM($chatID,"🆔 خب شناسه کاربر مورد نظر را ارسال کنید.",'html',$msg_id,$Button_Back2);
	saveJson("base/$userID.json",$user);
}
else if($step == 'unban' and $Tc == 'private')
{
	$ok = GCMB($msg);
	if($ok == true)
	{
		if(in_array($msg,$ban))
		{
			$user['step'] = 'none';
			$key = array_search($msg,$ban);
			unset($list['ban'][$key]);
			$list['ban'] = array_values($list['ban']);
			saveJson("list.json",$list);
			SA($chatID,'typing');
			SM($chatID,"❌ کاربر [$msg](tg://user?id=$msg) با موفقیت بلاک شد.",'MarkDown',$msg_id);
			SM($msg,"✅ مسدودیت شما در ربات رفع شد و میتوانید از ربات استفاده کنید.",'MarkDown');
		}
		else
		{
			SA($chatID,'typing');
			SM($chatID,"🔓 این کاربر اصلا بلاک نیست.",'MarkDown',$msg_id);
		}
	}
	else
	{
		SA($chatID,'typing');
		SM($chatID,"❌ این کاربر عضو ربات نیست قربان",'MarkDown',$msg_id);
	}
	saveJson("base/$userID.json",$user);
}
else if($msg == '🛑 لیست افراد بلاک' and $Tc == 'private' and in_array($chatID,$Dev))
{
	SA($chatID,'typing');
	$text = "لیست افراد بلاک شده :\n\n";
	foreach($ban as $listban)
	{
		$text .= "[$listban](tg://user?id=$listban)\n";
	}
	if($text != "لیست افراد بلاک شده :\n\n")
	{
		SM($chatID,$text,'MarkDown',$msg_id);
	}
	else
	{
		SM($chatID,"لیست افراد بلاک شده خالیست",'MarkDown',$msg_id);
	}
}
else if($msg == '📍 آخرین استفاده کنندگان' and $Tc == 'private' and in_array($chatID,$Dev))
{
	$Scan = scandir('base');
	$Scan = array_diff($Scan, ['.','..']);
	$i = 1;
	$text = "لیست افرادی که در 5 دقیقه اخیر از ربات استفاده کردن \n\n";
	foreach($Scan as $Value)
	{
		$id = str_replace(".json",null,$Value);
		$select_user = json_decode(file_get_contents("base/$Value"),true);
		$time = time();
		$time5zone = 5*60;
		$last_time = $time - $time5zone;
		if($select_user['time'] >= $last_time)
		{
			$time = $select_user['time'];
			$time2 = time();
			$timezone = $time2 - $time;
			$min = $timezone / 60;
			$min = floor($min);
			$mmm = $min * 60;
			$sec = $timezone - $mmm;
			if($i <= 20)
			{
				$text .= "[$id](tg://user?id=$id) : $min دقیقه و $sec ثانیه پیش \n";
			}
			$i++;
		}
	}
	SA($chatID,'typing');
	SM($chatID,$text,'MarkDown',$msg_id);
}
else if($msg == '💌 فرستادن به همه' and $Tc == 'private' and in_array($chatID,$Dev))
{
	SA($chatID,'typing');
	$user['step'] = 'sendtoall';
	SM($chatID,"📍 پیام خود را در هر قالبی برام بفرستید.",'html',$msg_id,$Button_Back2);
	saveJson("base/$userID.json",$user);
	$sendall = ['step' => 'none', 'text' => '', 'msgid' => '', 'user' => '0', 'chat' => ''];
	saveJson("sendall.json",$sendall);
}
else if($msg == 'تنظیم تبلیغ ربات ها' and $Tc == 'private' and in_array($chatID,$Dev))
{
	SA($chatID,'typing');
	$user['step'] = 'tabtoall';
	SM($chatID,"📍 پیام خود را در هر قالبی برام بفرستید.",'html',$msg_id,$Button_Back2);
	saveJson("base/$userID.json",$user);
	$tab = ['step' => 'none', 'type' => 'none', 'text' => ''];
	saveJson("tab.json",$tab);
}
else if($msg == '🔡 کد رایگان' and $Tc == 'private' and in_array($chatID,$Dev))
{
	SA($chatID,'typing');
	$user['step'] = 'CodeFree';
	SM($chatID,"📶 خب حالا کد مورد نظر رو وارد کنید.",'html',$msg_id,$Button_Back2);
	saveJson("base/$userID.json",$user);
}
else if($step == 'CodeFree' and $Tc == 'private')
{
	SA($chatID,'typing');
	$user['step'] = 'CodeFree+';
	$user['code'] = $msg;
	SM($chatID,"🔢 خب حالا تعداد امتیاز را وارد کنید.",'html',$msg_id,$Button_Back2);
	saveJson("base/$userID.json",$user);
}
else if($step == 'CodeFree+' and $Tc == 'private')
{
	SA($chatID,'typing');
	$user['step'] = 'none';
	SM($chatID,"✅ کد با موفقیت ساخته شد.",'html',$msg_id,$Button_Admins_Panel);
	Save($user['code'].'.txt',$msg);
	$userbot = GMUN();
	SM("@$channel","🎁کد رایگان امتیازی در تاریخ $date  و در ساعت $time ساخته شد.


🔅کد رایگان : <code>{$user['code']}</code>
💰تعداد امتیاز : <code>$msg</code>

❗️برای استفاده از کد رایگان وارد رباتساز شوید و دکمه کد هدیه را بزنید، سپس کد رایگان رو ارسال کنید تا تعداد امتیاز رایگان رو دریافت کنید.


🆔 @$channel
🆔 @$userbot",'html');
	saveJson("base/$userID.json",$user);
}
else if($msg == 'پیام همگانی ب ربات ها' and $Tc == 'private' and in_array($chatID,$Dev))
{
	SA($chatID,'typing');
	$user['step'] = 'sendtoallbots';
	SM($chatID,"📍 پیام خود را در هر قالبی برام بفرستید.",'html',$msg_id,$Button_Back2);
	saveJson("base/$userID.json",$user);
}
else if($step == 'sendtoallbots' and $Tc == 'private')
{
	$filephoto = $up->message->photo;
	$photo = $filephoto[count($filephoto)-1]->file_id;
	$file = $up->message->document->file_id;
	$video = $up->message->video->file_id;
	$music = $up->message->audio->file_id;
	$voice = $up->message->voice->file_id;
	$sticker = $up->message->sticker->file_id;
	$caption = $up->message->caption;
	$user['step'] = 'none';
	$sendall = json_decode(file_get_contents("sendall2.json"),true);
	if(isset($photo))
	{
		$sendall['type'] = 'photo';
		$msgid = Sph("@$channeltab",$photo,'00','html')['result']['message_id'];
	}
	else if(isset($file))
	{
		$sendall['type'] = 'file';
		$msgid = SFile("@$channeltab",$file,'00')['result']['message_id'];
	}
	else if(isset($video))
	{
		$sendall['type'] = 'video';
		$msgid = SendVideo("@$channeltab",$video,'00')['result']['message_id'];
	}
	else if(isset($music))
	{
		$sendall['type'] = 'music';
		$msgid = SMusic("@$channeltab",$music,'00')['result']['message_id'];
	}
	else if(isset($voice))
	{
		$sendall['type'] = 'voice';
		$msgid = SendVoice("@$channeltab",$voice,'00')['result']['message_id'];
	}
	else if(isset($sticker))
	{
		$sendall['type'] = 'sticker';
		$msgid = SendSticker("@$channeltab",$sticker)['result']['message_id'];
	}
	else
	{
		$sendall['type'] = 'text';
	}
	$sendall['text'] = "$msg$caption";
	if(!isset($msg))
	{
		$sendall['msgid'] = "https://t.me/$channeltab/$msgid";
	}
	saveJson("sendall2.json",$sendall);	
	$user['step'] = 'sendtoallbots2';
	SA($chatID,'typing');
	SM($chatID,"یکی از دهک ها رو انتخاب کنید.",'html',$msg_id,$Button_dahak);
	saveJson("base/$userID.json",$user);
}
else if($step == 'sendtoallbots2' and $Tc == 'private')
{
	SA($chatID,'typing');
	if(in_array($msg,array(1,2,3,4,5)))
	{
		$dahak = dahak($msg);
		$ctx = stream_context_create(array('http'=>array('timeout' => 1.2,)));
		$base = json_decode(file_get_contents("base.json"),true);
		$sendall = json_decode(file_get_contents("sendall2.json"),true);
		$text = $sendall['text'];
		$type = $sendall['type'];
		$msgid = $sendall['msgid'];
		SM($chatID,"خب ارسال اطلاعات پیام برای ربات ها شروع شد.",'html',$msg_id,$Button_Admins_Panel);
		foreach($dahak as $username_bot)
		{
			if(is_dir("RoBots/$username_bot"))
			{
				file_get_contents("$URL/RoBots/$username_bot/send.php?step=sendtoall&type=$type&text=$text&msgid=$msgid",false,$ctx);
				SM($chatID,"@$username_bot",'html',$msg_id);
			}
		}
		$user['step'] = 'none';
		SM($chatID,"اطلاعات پیام برای همه ربات های دهک $msg رسال شد.",'html',$msg_id);
	}
	else
	{
		SA($chatID,'typing');
		SM($chatID,"لطفا از دکمه ها استفاده کنید.",'html',$msg_id);
	}
	saveJson("base/$userID.json",$user);
}
else if($msg == '📭 فوروارد به همه' and $Tc == 'private' and in_array($chatID,$Dev))
{
	SA($chatID,'typing');
	$user['step'] = 'fortoall';
	SM($chatID,"📍 لطفا پیام خود را فوروارد کنید.\n📌 پیام فوروارد شده میتواند از شخص یا کانال باشد.",'html',$msg_id,$Button_Back2);
	saveJson("base/$userID.json",$user);
	$sendall = ['step' => 'none', 'text' => '', 'msgid' => '', 'user' => '0', 'chat' => ''];
	saveJson("sendall.json",$sendall);
}
else if($step == 'tabtoall' and $Tc == 'private')
{
	$filephoto = $up->message->photo;
	$photo = $filephoto[count($filephoto)-1]->file_id;
	$file = $up->message->document->file_id;
	$video = $up->message->video->file_id;
	$music = $up->message->audio->file_id;
	$voice = $up->message->voice->file_id;
	$sticker = $up->message->sticker->file_id;
	$caption = $up->message->caption;
	$reply_markup = $up->message->reply_markup;
	SA($chatID,'typing');
	$user['step'] = 'none';
	if(isset($photo))
	{
		$tab['type'] = 'photo';
	}
	else if(isset($file))
	{
		$tab['type'] = 'file';
	}
	else if(isset($video))
	{
		$tab['type'] = 'video';
	}
	else if(isset($music))
	{
		$tab['type'] = 'music';
	}
	else if(isset($voice))
	{
		$tab['type'] = 'voice';
	}
	else if(isset($sticker))
	{
		$tab['type'] = 'sticker';
	}
	if(!isset($msg))
	{
		$msgid = FM("@$channeltab",$chatID,$msg_id)['result']['message_id'];
		$tab['msgid'] = "https://t.me/$channeltab/$msgid";
	}
	if(isset($reply_markup))
	{
		$reply_markup = json_encode($reply_markup,448);
		$tab['reply_markup'] = $reply_markup;
	}
	$tab['text'] = "$msg$caption";
	saveJson("tab.json",$tab);
	SM($chatID,"🧮 با موفقیت تنظیم شد.",'html',$msg_id,$Button_Admins_Panel);
	saveJson("base/$userID.json",$user);
}
else if($step == 'sendtoall' and $Tc == 'private')
{
	$filephoto = $up->message->photo;
	$photo = $filephoto[count($filephoto)-1]->file_id;
	$file = $up->message->document->file_id;
	$video = $up->message->video->file_id;
	$music = $up->message->audio->file_id;
	$voice = $up->message->voice->file_id;
	$sticker = $up->message->sticker->file_id;
	$caption = $up->message->caption;
	SA($chatID,'typing');
	SM($chatID,"پیام شما با موفقیت برای ارسال همگانی تنظیم شد  ✔️",'MarkDown',$msg_id,$Button_Admins_Panel);
	$user['step'] = 'none';
	saveJson("base/$userID.json",$user);
	$sendall = json_decode(file_get_contents("sendall.json"),true);
	if(isset($photo))
	{
		$sendall['type'] = 'photo';
	}
	else if(isset($file))
	{
		$sendall['type'] = 'file';
	}
	else if(isset($video))
	{
		$sendall['type'] = 'video';
	}
	else if(isset($music))
	{
		$sendall['type'] = 'music';
	}
	else if(isset($voice))
	{
		$sendall['type'] = 'voice';
	}
	else if(isset($sticker))
	{
		$sendall['type'] = 'sticker';
	}
	$sendall['step'] = 'sendall';
	$sendall['text'] = "$msg$caption";
	$sendall['msgid'] = "$sticker$voice$music$video$file$photo";
	$sendall['user'] = '0';
	$sendall['userID'] = $userID;
	saveJson("sendall.json",$sendall);	
}
else if($step == 'fortoall' and $Tc == 'private')
{
	SA($chatID,'typing');
	SM($chatID,"پیام شما با موفقیت به عنوان فوروارد همگانی تنظیم شد ✔️",'MarkDown',$msg_id,$Button_Admins_Panel);
	$user['step'] = 'none';
	saveJson("base/$userID.json",$user);
	$sendall = json_decode(file_get_contents("sendall.json"),true);
	$sendall['step'] = 'forall';
	$sendall['text'] = null;
	$sendall['chat'] = $chatID;
	$sendall['msgid'] = "$msg_id";
	$sendall['user'] = '0';
	$sendall['userID'] = $userID;
	saveJson("sendall.json",$sendall);
}
else
{
	SA($chatID,'typing');
	SM($chatID,"متاسفانه متوجه نمیشم چی میگی!!!",'MarkDown',$msg_id);
}


if(is_file(error_log))
	unlink(error_log);
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
?>