<?php
ob_start();
flush();
$telegram_ip_ranges = [
    ['lower' => '149.154.160.0', 'upper' => '149.154.175.255'], 
    ['lower' => '91.108.4.0',    'upper' => '91.108.7.255'],    
];

$ip_dec = (float) sprintf("%u", ip2long($_SERVER['REMOTE_ADDR']));
$ok = false;

foreach ($telegram_ip_ranges as $telegram_ip_range) {
    if (!$ok) {
        $lower_dec = (float) sprintf("%u", ip2long($telegram_ip_range['lower']));
        $upper_dec = (float) sprintf("%u", ip2long($telegram_ip_range['upper']));
        if ($ip_dec >= $lower_dec and $ip_dec <= $upper_dec) {
            $ok = true;
        }
    }
}

if (!$ok) {
    die("Sik");
}
ob_implicit_flush(1);
ini_set("expose_php", "Off");
ini_set("Allow_url_fopen", "Off");
ini_set("disable_functions", "exec,passthru,shell_exec,system,proc_open,popen,curl_exec,curl_multi_exec,parse_ini_file,show_source,eval,file,file_get_contents,file_put_contents,fclose,fopen,fwrite,mkdir,rmdir,unlink,glob,echo,die,exit,print,scandir");
ini_set("max_execution_time", "25");
ini_set("max_input_time", "25");
ini_set("memory_limit", "15M");
ini_set("file_uploads", "Off");
ini_set("post_max_size", "10k");
error_reporting(0);
ini_set("log_errors", "Off");
ignore_user_abort(true);

require_once 'jdf.php';
require_once 'config.php';
// =============Dont touch=============== //
$update     = json_decode(file_get_contents('php://input'));
$chat_id    = $update->message->chat->id;
$from_id    = $update->message->from->id;
$message_id = $update->message->message_id;
$username   = $update->message->from->username ? : 'بدون یوزر نیم';
$text       = $update->message->text;
$first_name = $update->message->from->first_name;
$last_name  = $update->message->from->last_name ? : 'none';
// =============Dont touch=============== //
$time       = jdate("H:i:s");
$rooz       = jdate('j');
$mah        = jdate('n');
$sal        = jdate('y');
$ambar      = "$sal/$mah/$rooz";
// =============Dont touch=============== //
mkdir("usersData/$from_id");
$onof       = file_get_contents("settings/onof.txt");
$channel11  = file_get_contents("settings/chnnl11.txt");
$channel22  = file_get_contents("settings/chnnl22.txt");
$refral     = file_get_contents("settings/refral.txt");
$list       = file_get_contents("MMBER.txt");
$Members    = file_get_contents("usersData/Member.txt");
$blocklist  = file_get_contents("usersData/blocklist.txt");
$sea        = file_get_contents("usersData/$from_id/membrs.txt") ? : NULL;
$coin       = file_get_contents("usersData/$from_id/coin.txt") ? : '0';
$state      = file_get_contents("usersData/$from_id/state.txt") ? : NULL;
$member     = file_get_contents("usersData/$from_id/member.txt") ? : NULL;
$created    = file_get_contents("usersData/$from_id/create.txt") ? : 'no';
$forchaneel = json_decode(file_get_contents("https://api.telegram.org/bot" . API_KEY . "/getChatMember?chat_id=@$channel11&user_id=" . $from_id));
$tch        = $forchaneel->result->status;
$forchaneel2= json_decode(file_get_contents("https://api.telegram.org/bot" . API_KEY . "/getChatMember?chat_id=@$channel22&user_id=" . $from_id));
$tch2       = $forchaneel->result->status;
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
// =============Dont touch=============== //
Spam($from_id);
// =============Dont touch=============== //
if (strpos($blocklist, "$chat_id") !== false) exit(false);
if (strpos($text, 'zip') !== false or strpos($text, 'ZIP') !== false or strpos($text, 'Zip') !== false or strpos($text, 'ZIp') !== false or strpos($text, 'zIP') !== false or strpos($text, 'ZipArchive') !== false or strpos($text, 'ZiP') !== false)
{
    SendMessage($chat_id, "از ارسال کاراکتر/متن غیر مجاز خود داری کنید ❗️⚠️", "html", "true");
    exit(false);
}
if (strpos($text, 'kajserver') !== false or strpos($text, 'update') !== false or strpos($text, 'UPDATE') !== false or strpos($text, 'Update') !== false or strpos($text, 'https://api') !== false)
{
    SendMessage($chat_id, "از ارسال کاراکتر/متن غیر مجاز خود داری کنید ❗️⚠️", "html", "true");
    exit(false);
}
if (strpos($text, '$') !== false or strpos($text, '{') !== false or strpos($text, '}') !== false)
{
    SendMessage($chat_id, "از ارسال کاراکتر/متن غیر مجاز خود داری کنید ❗️⚠️", "html", "true");
    exit(false);
}
if (strpos($text, '"') !== false or strpos($text, '%') !== false or strpos($text, '(') !== false or strpos($text, '=') !== false or strpos($text, '#') !== false)
{
    SendMessage($chat_id, "از ارسال کاراکتر/متن غیر مجاز خود داری کنید ❗️⚠️", "html", "true");
    exit(false);
}
if (strpos($text, 'getme') !== false or strpos($text, 'GetMe') !== false)
{
    SendMessage($chat_id, "از ارسال کاراکتر/متن غیر مجاز خود داری کنید ❗️⚠️", "html", "true");
    exit(false);
}
if ($from_id != $chat_id)
{
    bot('leaveChat', ['chat_id' => $chat_id]);
}
if ($onof === "off" && $chat_id != $Dev)
{
    bot('sendmessage', ['chat_id' => $chat_id, 'text' => "⚠️ ربات جهت ارتقا و آپدیت خاموش میباشد  
ب محض روشن شدن مجدد ربات در کانال زیر اطلاع رسانی میشود", 'parse_mode' => "MarkDown", 'reply_to_message_id' => $message_id, 'reply_markup' => json_encode(['inline_keyboard' => [[['text' => "🛑 چنل اطلاع رسانی 🛑", 'url' => "https://t.me/$channel"]]]]) ]);
    exit(false);
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
//---------------------------شروع ---------------------------//
if (preg_match('/(php:\/\/input|eval|getme|Token|sql|json|_GET|zip|base64|file_put_contents|system|exec|#|file|>|&|\'|}|{|\\(|!|\\$|function|update|https:\/\/api|\\.|\\|;|\\*|\\^|,)/i', $text)) {
    // اضافه کردن آیدی کاربر به فایل بلاک
    file_put_contents("usersData/blocklist.txt", $from_id . "\n", FILE_APPEND);

    bot('sendMessage', [
        'chat_id' => $chat_id,
        'text' => "دوست عزیز ربات به دلیل جلوگیری از از حملات کد های مخرب ما شما رو مسدود کردیم لطفا از کد های حساس جلو گیری کنید .
🙏 : @$botuser",
        'parse_mode' => "HTML",
        'reply_to_message_id' => $message_id,
    ]);

    bot('sendMessage', [
        'chat_id' => $Dev,
        'text' => "😈 رئیس، این کاربر به ربات کد مخرب ارسال کرد:
👤 پروفایل:

📍 آیدی عددی: $from_id
📍 یوزرنیم: @$username
📍 کدی که ارسال کرد: 
$text",
    ]);
    exit();
}
// بررسی اینکه آیا ادمین به ربات وارد شده است یا نه

if ($text === "/start")
{
    $user = file_get_contents('MMBER.txt');
    $members = explode("\n", $user);
    if (!in_array($from_id, $members))
    {
        file_put_contents("usersData/$chat_id/bta.txt", "$ambar");
        file_put_contents("usersData/$chat_id/zaman.txt", "$time");
        $add_user = file_get_contents('MMBER.txt');
        $add_user .= $from_id . "\n";
        file_put_contents("usersData/$chat_id/membrs.txt", "0");
        file_put_contents("usersData/$chat_id/warn.txt", "0");
        file_put_contents("usersData/$chat_id/coin.txt", "2");
        file_put_contents('MMBER.txt', $add_user);
    }
    bot('sendMessage', ['chat_id' => $chat_id, 'text' => "💎؛ قـوانـیـن ربـاتـسـاز  بـه شـرح زیـر مـیـبـاشـد :
- - - - - - - - - - - - - - - - - - - - - - - - - - - - - 
📔؛ تـمـامـي ربـات هـا موظف به رعایت مسائل اخلاقی میباشند !
- - - - - - - - - - - - - - - - - - - - - - - - - - - - -
📗؛ مـسـئـولـیـت پـیـام هـاي رد و بـدل شـده در هـر ربـات بـا صـاحـب آن مـیـبـاشـد و مـا هـیـچـگـونـه مـسـئـولـیـتـي نـداریـم !
- - - - - - - - - - - - - - - - - - - - - - - - - - - - -
📘؛ هـر گـونـه ربـاتـي کـه سـاخـته مـیـشـود بـر روي سـرور هـاي ربـاتسـاز  گلکسی مـیـزبـانـي شـده و هـرگـونه درخـواست انـتـقـال ربـات بـه سـرور هـاي دیـگـر مـقـدور نـمـیـبـاشـنـد !
- - - - - - - - - - - - - - - - - - - - - - - - - - - - -
📙؛ اگـر بـه هـر دلـیـلـي درخـواسـت هـاي ربـات شـمـا بـه سـرور مـا بـیـش از حـد مـعـمـول بـاشـد ﴿ و اشـتـراک شـمـا ویـژه نـبـاشـد ﴾ چـنـد بـاري ربـات بـه شـمـا اخـطـار مـیـدهـد ، اگـر ایـن اخـطـار هـا نـادیـده گـرفـتـه شـونـد ربـات شـمـا مـسـدود و بـه هـیـچ عـنـوان از مـسـدودیـت خـارج نـخـواهـد شـد !
- - - - - - - - - - - - - - - - - - - - - - - - - - - - -
📕؛ و مـسـئـولـیـت ربـات بـا سـازنـده آن بـوده و مـا هـیـچـگـونـه مـسـئـولـیـتي نـداریـم !
- - - - - - - - - - - - - - - - - - - - - - - - - - - - -

با دکمه پایین حساب خود را تایید کنید 🇮🇷👇🏼", 'parse_mode' => "HTML", 'reply_markup' => json_encode(['keyboard' => [[['text' => "قوانین را قبول میکنم ✅"]], ], 'resize_keyboard' => true, ]) ]);
    bot('sendMessage', ['chat_id' => $Dev, 'text' => "🔅 User [$first_name](tg://user?id=$chat_id) Sᴛᴀʀᴛᴇᴅ Tʜᴇ Rᴏʙᴏᴛ 

🌀 id : `$chat_id`", 'parse_mode' => 'MarkDown']);
}
elseif (strpos($text, '/start') !== false)
{
    $newid = str_replace("/start ", "", $text);
    if ($from_id === $newid) bot('sendMessage', ['chat_id' => $chat_id, 'text' => "شما نمیتوانید زیر مجموعه ی خودتان باشید ❗️⚠️", ]);
    elseif (strpos($list, "$from_id") !== false)
    {
        sendMessage($chat_id, "💎؛ قـوانـیـن ربـاتـسـاز  بـه شـرح زیـر مـیـبـاشـد :
- - - - - - - - - - - - - - - - - - - - - - - - - - - - -
📔؛ تـمـامـي ربـات هـا موظف به رعایت مسائل اخلاقی میباشند !
- - - - - - - - - - - - - - - - - - - - - - - - - - - - -
📗؛ مـسـئـولـیـت پـیـام هـاي رد و بـدل شـده در هـر ربـات بـا صـاحـب آن مـیـبـاشـد و مـا هـیـچـگـونـه مـسـئـولـیـتـي نـداریـم !
- - - - - - - - - - - - - - - - - - - - - - - - - - - - -
📘؛ هـر گـونـه ربـاتـي کـه سـاخـته مـیـشـود بـر روي سـرور هـاي ربـاتسـاز  گلکسی مـیـزبـانـي شـده و هـرگـونه درخـواست انـتـقـال ربـات بـه سـرور هـاي دیـگـر مـقـدور نـمـیـبـاشـنـد !
- - - - - - - - - - - - - - - - - - - - - - - - - - - - - 
📙؛ اگـر بـه هـر دلـیـلـي درخـواسـت هـاي ربـات شـمـا بـه سـرور مـا بـیـش از حـد مـعـمـول بـاشـد ﴿ و اشـتـراک شـمـا ویـژه نـبـاشـد ﴾ چـنـد بـاري ربـات بـه شـمـا اخـطـار مـیـدهـد ، اگـر ایـن اخـطـار هـا نـادیـده گـرفـتـه شـونـد ربـات شـمـا مـسـدود و بـه هـیـچ عـنـوان از مـسـدودیـت خـارج نـخـواهـد شـد !
- - - - - - - - - - - - - - - - - - - - - - - - - - - - -
📕؛ و مـسـئـولـیـت ربـات بـا سـازنـده آن بـوده و مـا هـیـچـگـونـه مـسـئـولـیـتي نـداریـم !
- - - - - - - - - - - - - - - - - - - - - - - - - - - - - 

با دکمه پایین حساب خود را تایید کنید 🇮🇷👇🏼");
    }
    else
    {
        $sho = file_get_contents("usersData/$newid/coin.txt");
        $getsho = $sho + $refral;
        file_put_contents("usersData/$newid/coin.txt", $getsho);
        $sea = file_get_contents("usersData/$newid/membrs.txt");
        $getsea = $sea + 1;
        file_put_contents("usersData/$newid/membrs.txt", $getsea);
        $user = file_get_contents('MMBER.txt');
        $members = explode("\n", $user);
        if (!in_array($from_id, $members))
        {
            $add_user = file_get_contents('MMBER.txt');
            $add_user .= $from_id . "\n";
            @$sea = file_get_contents("usersData/$from_id/membrs.txt");
            file_put_contents("usersData/$chat_id/membrs.txt", "0");
            file_put_contents("usersData/$chat_id/warn.txt", "0");
            file_put_contents("usersData/$chat_id/coin.txt", "4");
            file_put_contents('MMBER.txt', $add_user);
        }
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "💎؛ قـوانـیـن ربـاتـسـاز  بـه شـرح زیـر مـیـبـاشـد :
- - - - - - - - - - - - - - - - - - - - - - - - - - - - -
📔؛ تـمـامـي ربـات هـا موظف به رعایت مسائل اخلاقی میباشند !
- - - - - - - - - - - - - - - - - - - - - - - - - - - - -
📗؛ مـسـئـولـیـت پـیـام هـاي رد و بـدل شـده در هـر ربـات بـا صـاحـب آن مـیـبـاشـد و مـا هـیـچـگـونـه مـسـئـولـیـتـي نـداریـم !
- - - - - - - - - - - - - - - - - - - - - - - - - - - - - 
📘؛ هـر گـونـه ربـاتـي کـه سـاخـته مـیـشـود بـر روي سـرور هـاي ربـاتسـاز  مـیـزبـانـي شـده و هـرگـونه درخـواست انـتـقـال ربـات بـه سـرور هـاي دیـگـر مـقـدور نـمـیـبـاشـنـد !
- - - - - - - - - - - - - - - - - - - - - - - - - - - - -
📙؛ اگـر بـه هـر دلـیـلـي درخـواسـت هـاي ربـات شـمـا بـه سـرور مـا بـیـش از حـد مـعـمـول بـاشـد ﴿ و اشـتـراک شـمـا ویـژه نـبـاشـد ﴾ چـنـد بـاري ربـات بـه شـمـا اخـطـار مـیـدهـد ، اگـر ایـن اخـطـار هـا نـادیـده گـرفـتـه شـونـد ربـات شـمـا مـسـدود و بـه هـیـچ عـنـوان از مـسـدودیـت خـارج نـخـواهـد شـد !
- - - - - - - - - - - - - - - - - - - - - - - - - - - - -
📕؛ و مـسـئـولـیـت ربـات بـا سـازنـده آن بـوده و مـا هـیـچـگـونـه مـسـئـولـیـتي نـداریـم !
- - - - - - - - - - - - - - - - - - - - - - - - - - - - -

با دکمه پایین حساب خود را تایید کنید 🇮🇷👇🏼", 'parse_mode' => "HTML", 'reply_markup' => json_encode(['keyboard' => [[['text' => "قوانین را قبول میکنم ✅"]], ], 'resize_keyboard' => true, 'selective' => true, ]) ]);
        sendMessage($newid, "🟨 کاربر [$first_name](tg://user?id=$chat_id) با لینک اختصاصی شما به ربات پیوست و $refral امتیاز دریافت کردید", "Markdown", "true");
    }
}
if (($tch != 'member' && $tch != 'creator' && $tch != 'administrator' or $tch2 != 'member' && $tch2 != 'creator' && $tch2 != 'administrator') && $from_id != $Dev && file_exists("settings/JOIN.txt"))
{
    bot('sendMessage', ['chat_id' => $chat_id, 'text' => "🚫| دوست عزیز بدلیل رایگان بودن ربات و همچنین حمایت از ما ابتدا در کانال های اسپانسر جوین شوید

🔖~ |『 @galaxyshop_Service 』
🔖~ |『 @$channel11 』
✅~ |『 @$channel22 』

🔓| سپس بروی دکمه ی (قوانین را قبول میکنم ✅) کلیک کنید 👇🏿", 'parse_mode' => "HTML", 'reply_markup' => json_encode(['inline_keyboard' => [[['text' => "کانال اول 1️⃣", 'url' => "https://t.me/$channel11"],['text' => "کانال دوم 2️⃣", 'url' => "https://t.me/$channel22"]], ]]) ]);
    exit();
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
elseif ($text === "『 بازگشت 』" or $text === "قوانین را قبول میکنم ✅")
{
    file_put_contents("usersData/$from_id/state.txt", "none");
    bot('sendMessage', ['chat_id' => $chat_id, 'text' => " به منوی اصلی خوش آمدید،😅📍", 'parse_mode' => "MarkDown", 'reply_markup' => json_encode(['keyboard' => [[['text' => "ساخت ربات |🩸|"],['text' => "دریافت نمایندگی |🧞‍♂️|"]], [['text' => "حذف ربات |🗑|"], ['text' => "ربات های من |🤖|"], ['text' => "آپدیت ربات |♻️️|️️"]], [['text' => "اطلاعات من |👤|"], ['text' => "تمدید ربات |⏳|"], ['text' => "افزایش امتیاز |➕|"]], [['text' => "راهنما  |📚|"],['text' => 'پشتیبانی |🧑🏻‍💻|']], ], 'resaiz_keyboard' => true, ]) ]);
}
elseif ($text === "افزایش امتیاز |➕|")
{
    bot('sendMessage', ['chat_id' => $chat_id, 'text' => "یگ گزینه را برای افزایش امتیاز انتخاب کنید🌹", 'parse_mode' => "MarkDown", 'reply_markup' => json_encode(['keyboard' => [[['text' => "⌠🫂⌡ زیر مجموعه گیری"]], [['text' => "⌠💰⌡ خرید سکه"]], [['text' => "『 بازگشت 』"]], ], 'resize_keyboard' => true, ]) ]);
}
elseif (trim($text) === "آپدیت ربات |♻️️|️️") {
    // شرط اصلاح‌شده برای بررسی اسپیس‌های اضافی
    // تست با حذف ایموجی
    bot('sendMessage', ['chat_id' => $chat_id, 'text' => "🗂", 'parse_mode' => "MarkDown", 'reply_markup' => json_encode(['keyboard' => [[['text' => "آپدیت ربات ساز گلکسی 🦾"]], [['text' => "『 بازگشت 』"]], ], 'resaiz_keyboard' => true, ]) ]);
    sleep(0.1);
    bot('sendMessage', ['chat_id' => $chat_id, 'text' => "|💰|: تعرفه امتیاز آپدیت ربات ها به شرح زیر می‌باشد

┈┅┅━┃🤍┃━┅┅┈
👤 Channel @$channel
🤖 Bot @$botuser", 'parse_mode' => 'HTML', 'reply_markup' => json_encode(['inline_keyboard' => [[['text' => " ◅ 20 ▻ آپدیت ربات ساز گلکسی 🦾", 'url' => $idbot]], ]]) ]);
}
elseif ($text === "آپدیت ربات ساز گلکسی 🦾")
{
	$miayesno = file_get_contents("usersData/$chat_id/miacreate.txt") ? : 'no';
    if ($coin >= 20 and $miayesno === "yes")
    {
        file_put_contents("usersData/$from_id/state.txt", "upBotSazTrox");
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "⚜ آیدی چنل خود را مجدد جهت آپدیت بدون @ ارسال کنید 

⁉️ اگر قصد تغییر چنل قفل را دارید آیدی چنل جدید را بدون @ ارسال کنید  ", 'parse_mode' => 'HTML', 'reply_markup' => json_encode(['keyboard' => [[['text' => "『 برگشت 』"]], ], 'resize_keyboard' => true]) ]);
    }
    elseif ($miayesno != "yes")
    {
        file_put_contents("usersData/$from_id/state.txt", "none");
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "شما هنوز رباتسازی نساخته اید !!!!! 🥲💔", 'parse_mode' => 'HTML', ]);
    } else bot('sendMessage', ['chat_id' => $chat_id, 'text' => "📛 امتیاز شما کافی نیست لطفاً امتیاز جمع آوری کنید مجدد به این بخش بازگردید .

💰 امتیاز مورد نیاز ~ | 20 |
🗽 امتیاز شما ~ | $coin |", 'parse_mode' => 'HTML', ]);
}
elseif ($text === "اطلاعات من |👤|")
{
	$warn = file_get_contents("usersData/$from_id/warn.txt") ? : '0';
	$zaman = file_get_contents("usersData/$from_id/zaman.txt");
	$bta = file_get_contents("usersData/$from_id/bta.txt");
    bot('sendMessage', ['chat_id' => $chat_id, 'text' => "📇؛ اطلاعات شما بـه شـرح زیـر اسـت :

┈┅┅━┃🤍┃━┅┅┈
👤 Channel @$channel
🤖 Bot @$botuser", 'parse_mode' => 'HTML', 'reply_markup' => json_encode(['inline_keyboard' => [[['text' => "┈┅┅━┃❤️┃━┅┅┈", 'callback_data' => 'prooo']], [['text' => "$first_name", 'callback_data' => 'prooo'], ['text' => "📑؛ نـام شـمـا", 'callback_data' => 'prooo']], [['text' => "@$username", 'callback_data' => 'prooo'], ['text' => "🌩؛ یـوزرنـیـم", 'callback_data' => 'prooo']], [['text' => "$chat_id", 'callback_data' => 'prooo'], ['text' => "⚙️؛ آیـدي عـددي", 'callback_data' => 'prooo']], [['text' => "┈┅┅━┃❤️┃━┅┅┈", 'callback_data' => 'prooo']], [['text' => "$sea", 'callback_data' => 'prooo'], ['text' => "👥؛ تعداد زیر مجموعه", 'callback_data' => 'prooo']], [['text' => "$coin", 'callback_data' => 'prooo'], ['text' => "🔆؛ امتیاز ها", 'callback_data' => 'prooo']], [['text' => "$warn", 'callback_data' => 'prooo'], ['text' => "⚠️؛ اخطار ها", 'callback_data' => 'prooo']], [['text' => "┈┅┅━┃❤️┃━┅┅┈", 'callback_data' => 'prooo']], [['text' => "$zaman", 'callback_data' => 'prooo'], ['text' => "⏱؛ زمـان ورود", 'callback_data' => 'prooo']], [['text' => "$bta", 'callback_data' => 'prooo'], ['text' => "📅؛ تـاریـخ ورود", 'callback_data' => 'prooo']], [['text' => "┈┅┅━┃❤️┃━┅┅┈", 'callback_data' => 'prooo']], [['text' => "🔗؛ اشتراک گذاری آیدی عددی", 'url' => "https://telegram.me/share/url?url=$chat_id"]], ]]) ]);
}
elseif ($text === "ساخت ربات |🩸|" or $text === "『 برگشت 』")
{
    file_put_contents("usersData/$from_id/state.txt", "none");
    bot('sendMessage', ['chat_id' => $chat_id, 'text' => " 🎊 بـه بخش ساخت ربات خـوش آمـدیـد :)

🪄 لـطـفـا یـک ربـات را بـراي سـاخـت انـتخـاب نـمـاییـد :", 'parse_mode' => "MarkDown", 'reply_markup' => json_encode(['keyboard' => [[['text' => "کاربردی [⚙]"], ['text' => "ویژه [⭐️]"]], [['text' => "جذب ممبر [💣] "], ['text' => "آپلودر ها  [📤]"]], [['text' => "سرگرمی [🤪]"], ['text' => "『 بازگشت 』"]], ], 'resize_keyboard' => false, ]) ]);
}
elseif ($text === "جذب ممبر [💣]")
{
    file_put_contents("usersData/$from_id/state.txt", "none");
    bot('sendMessage', ['chat_id' => $chat_id, 'text' => "🗿", 'parse_mode' => "MarkDown", 'reply_markup' => json_encode(['keyboard' => [[['text' => "🔞| صصکی"]], [['text' => "🧫| شارژ رایگان"]], [['text' => "😈| اعتراف گیر"]], [['text' => "『 برگشت 』"]], ], 'resaiz_keyboard' => true, ]) ]);
    sleep(0.1);
    bot('sendMessage', ['chat_id' => $chat_id, 'text' => "|💰|: تعرفه امتیاز ساخت ربات های جذب ممبر به شرح زیر می‌باشد


┈┅┅━┃❤️┃━┅┅┈
👤 Channel @$channel
🤖 Bot @$botuser", 'parse_mode' => 'HTML', 'reply_markup' => json_encode(['inline_keyboard' => [[['text' => "◅ 20 ▻ 💦| صصکی نوع اول ", 'callback_data' => 'mahdyking']], [['text' => "◅ 15 ▻ 💧| صصکی نوع دوم", 'callback_data' => 'UDSKUGUIZ']], [['text' => "◅ 8 ▻ 🧫| شارژ رایگان", 'callback_data' => 'HQUKXUH']], [['text' => "◅ 4 ▻ 😈| اعتراف گیر", 'callback_data' => 'IDOWAFTTE']], ]]) ]);
}
elseif ($text === "کاربردی [⚙]")
{
    file_put_contents("usersData/$from_id/state.txt", "none");
    bot('sendMessage', ['chat_id' => $chat_id, 'text' => "🦾", 'parse_mode' => "MarkDown", 'reply_markup' => json_encode(['keyboard' => [[['text' => "🏬| فروشگاهی"], ['text' => "🧰| جعبه ابزار"]], [['text' => "🎛| دکمه دلخواه"], ['text' => "🖥| ضد اسپم چنل"]], [['text' => "🔊| ادیتور موزیک"], ['text' => "🎓| پست گذاری کاربر"]], [['text' => "📩| پیامرسان"], ['text' => "🪙| ست وب هوک"]], [['text' => "💭| کامنت گذار پست"], ['text' => "👍🏿| لایک ساز"]], [['text' => "『 برگشت 』"]], ], 'resaiz_keyboard' => true, ]) ]);
    sleep(0.1);
    bot('sendMessage', ['chat_id' => $chat_id, 'text' => "|💰|: تعرفه امتیاز ساخت ربات های کاربری به شرح زیر می‌باشد


┈┅┅━┃❤️┃━┅┅┈
👤 Channel @$channel
🤖 Bot @$botuser", 'parse_mode' => 'HTML', 'reply_markup' => json_encode(['inline_keyboard' => [[['text' => "◅ 30 ▻ 🧰| جعبه ابزار", 'callback_data' => 'BKVZHJAWY']], [['text' => "◅ 30 ▻ 🎛| دکمه دلخواه ", 'callback_data' => 'OFOXVRXXM']], [['text' => "◅ 25 ▻ 🏬| فروشگاهی", 'callback_data' => 'DBYAREWDE']], [['text' => "◅ 20 ▻ 👍🏿| لایک ساز", 'callback_data' => 'MXWKLAAE']], [['text' => "◅ 15 ▻ 🎓| پست گذاری کاربر", 'callback_data' => 'ROCZQQSDU']], [['text' => "◅ 15 ▻ 🖥| ضد اسپم چنل", 'callback_data' => 'MKYMNQLC']], [['text' => "◅ 15 ▻ 📨| پیام‌رسان پیشرفته", 'callback_data' => 'OUXFRKDYF']], [['text' => "◅ 10 ▻ 🎐| پیام‌رسان نوع دو", 'callback_data' => 'FQBLXVAWQ']], [['text' => "◅ 10 ▻ 💭| کامنت گذار پست", 'callback_data' => 'GGDNJSMEF']], [['text' => "◅ 8 ▻ 📮| پیامرسان نوع یک", 'callback_data' => 'UUENXPFXS']], [['text' => "◅ 5 ▻ 🪙| ست وب هوک", 'callback_data' => 'FPRUCHFUB']], [['text' => "◅ 2 ▻ 🔊| ادیتور موزیک", 'callback_data' => 'GZPVELNHS']], ]]) ]);
}
elseif ($text === "سرگرمی [🤪]")
{
    file_put_contents("usersData/$from_id/state.txt", "none");
    bot('sendMessage', ['chat_id' => $chat_id, 'text' => "🤪", 'parse_mode' => "MarkDown", 'reply_markup' => json_encode(['keyboard' => [[['text' => "🎅| کلش آف کلنز"], ['text' => "🍫| سرگرمی گروه"]], [['text' => "🍆| بکیرم"], ['text' => "✂️| سنگ کاغذ قیچی"]], [['text' => "🤴| فونت ساز"], ['text' => "🕹| بازی کلمات"]], [['text' => "📃| اسم فامیل"], ['text' => "『 برگشت 』"]], ], 'resaiz_keyboard' => true, ]) ]);
    sleep(0.1);
    bot('sendMessage', ['chat_id' => $chat_id, 'text' => "|💰|: تعرفه امتیاز ساخت ربات های سرگرمی به شرح زیر می‌باشد


┈┅┅━┃❤️┃━┅┅┈
👤 Channel @$channel
🤖 Bot @$botuser", 'parse_mode' => 'HTML', 'reply_markup' => json_encode(['inline_keyboard' => [[['text' => "◅ 30 ▻ 🎅| کلش آف کلنز", 'callback_data' => 'AYSURYOZ']], [['text' => "◅ 16 ▻ 🍆| بکیرم", 'callback_data' => 'AUZLZCM']], [['text' => "◅ 14 ▻ 🕹| بازی کلمات", 'callback_data' => 'VGYOKDAFP']], [['text' => "◅ 14 ▻ 🍫| سرگرمی گروه", 'callback_data' => 'KNDPQMXDC']], [['text' => "◅ 12 ▻ 🤴| فونت ساز", 'callback_data' => 'YGSKVRFXK']], [['text' => "◅ 10 ▻ 📃| اسم فامیل", 'callback_data' => 'YXXATYCSW']], [['text' => "◅ 6 ▻ ✂️| سنگ کاغذ قیچی", 'callback_data' => 'HYZTJVNQ']], ]]) ]);
}
elseif ($text === "دریافت نمایندگی |🧞‍♂️|")
{
    file_put_contents("usersData/$from_id/state.txt", "none");
    bot('sendMessage', ['chat_id' => $chat_id, 'text' => "🤩", 'parse_mode' => "MarkDown", 'reply_markup' => json_encode(['keyboard' => [[['text' => "ربات ساز فوق پیشرفته گلکسی 🦾"]], [['text' => "『 برگشت 』"]], ], 'resaiz_keyboard' => true, ]) ]);
    sleep(0.1);
    bot('sendMessage', ['chat_id' => $chat_id, 'text' => "|💰|: تعرفه ساخت رباتساز به شرح زیر میباشد


┈┅┅━┃❤️┃━┅┅┈
👤 Channel @$channel
🤖 Bot @$botuser", 'parse_mode' => 'HTML', 'reply_markup' => json_encode(['inline_keyboard' => [[['text' => "◅ 250 ▻ ربات ساز فوق پیشرفته گلکسی 🦾", 'callback_data' => 'TAZPHORYQ']], ]]) ]);
}
elseif ($text === "ویژه [⭐️]")
{
    file_put_contents("usersData/$from_id/state.txt", "none");
    bot('sendMessage', ['chat_id' => $chat_id, 'text' => "🤡", 'parse_mode' => "MarkDown", 'reply_markup' => json_encode(['keyboard' => [[['text' => "💸| شرط بندی"], ['text' => "📦| ویو پنل"]], [['text' => "🗣| ویس کده"], ['text' => "👤| ممبرگیر"]], [['text' => "🏦| بانک امتیاز"], ['text' => "🐺| ضدلینک"]], [['text' => "👁‍🗨| ویوگیر"], ['text' => "『 برگشت 』"]], [], ], 'resaiz_keyboard' => true, ]) ]);
    sleep(0.1);
    bot('sendMessage', ['chat_id' => $chat_id, 'text' => "|💰|: تعرفه امتیاز ساخت ربات های ویژه به شرح زیر می‌باشد


┈┅┅━┃❤️┃━┅┅┈
👤 Channel @$channel
🤖 Bot @$botuser", 'parse_mode' => 'HTML', 'reply_markup' => json_encode(['inline_keyboard' => [[['text' => "◅ 30 ▻ 🐺| ضدلینک", 'callback_data' => 'MWDLFRJBA']], [['text' => "◅ 30 ▻ 👁‍🗨| ویوگیر", 'callback_data' => 'KTZIOCYPO']], [['text' => "◅ 30 ▻ 💸| شرط بندی", 'callback_data' => 'WULHQTQPV']], [['text' => "◅ 25 ▻ 📦| ویو پنل", 'callback_data' => 'UGALVITZS']], [['text' => "◅ 20 ▻ 🏦| بانک امتیاز", 'callback_data' => 'DRIULHHEJ']], [['text' => "◅ 18 ▻ 💠| ممبرگیر شیشه ای", 'callback_data' => 'JNRQCOUMY']], [['text' => "◅ 15 ▻ 🔸| ممبرگیر دکمه ای", 'callback_data' => 'QDPXQNPTC']], [['text' => "◅ 15 ▻ 🗣| ویس کده", 'callback_data' => 'CMCCNYGAF']], ]]) ]);
}
elseif ($text === "آپلودر ها  [📤]")
{
    file_put_contents("usersData/$from_id/state.txt", "none");
    bot('sendMessage', ['chat_id' => $chat_id, 'text' => "💡", 'parse_mode' => "MarkDown", 'reply_markup' => json_encode(['keyboard' => [[['text' => "📭| آپلودر ساده"]], [['text' => "🎥| آپلودر فیلم"]], [['text' => "📦| آپلودر فایل"]], [['text' => "『 برگشت 』"]], ], 'resaiz_keyboard' => true, ]) ]);
    sleep(0.1);
    bot('sendMessage', ['chat_id' => $chat_id, 'text' => "|💰|: تعرفه امتیاز ساخت آپلودر ها به شرح زیر می‌باشد


┈┅┅━┃❤️┃━┅┅┈
👤 Channel @$channel
🤖 Bot @$botuser", 'parse_mode' => 'HTML', 'reply_markup' => json_encode(['inline_keyboard' => [[['text' => "◅ 20 ▻ 📭| آپلودر ساده", 'callback_data' => 'ATUHZGAT']], [['text' => "◅ 30 ▻ 🎥| آپلودر فیلم", 'callback_data' => 'CFRBVBOVT']], [['text' => "◅ 50 ▻ 📦| آپلودر فایل", 'callback_data' => 'VRNZAPLN']], ]]) ]);
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
elseif ($text === "ساخت ربات 🤖")
{
    file_put_contents("usersData/$from_id/state.txt", "none");
    bot('sendMessage', ['chat_id' => $chat_id, 'text' => "به بخش ساخت ربات خوش آمدید😅♥️

┈┅┅━┃🖤┃━┅┅┈
👤 Channel @$channel
🤖 Bot @$botuser", 'parse_mode' => "MarkDown", 'reply_markup' => json_encode(['keyboard' => [[['text' => 'ساخت ربات |🩸|'], ['text' => 'ساخت ربات ساز |🧞‍♂|']], [['text' => '『 بازگشت 』']], ], 'resize_keyboard' => true, ]) ]);
}
elseif ($text === "🔞| صصکی")
{
    file_put_contents("usersData/$from_id/state.txt", "none");
    bot('sendMessage', ['chat_id' => $chat_id, 'text' => "کدوم نوع از صصکیو میخوای؟😁", 'parse_mode' => "MarkDown", 'reply_markup' => json_encode(['keyboard' => [[['text' => 'نوع دوم 💧']], [['text' => 'نوع اول 💦']], [['text' => '『 برگشت 』']], ], 'resize_keyboard' => true, ]) ]);
}
elseif ($text === "📩| پیامرسان")
{
    file_put_contents("usersData/$from_id/state.txt", "none");
    bot('sendMessage', ['chat_id' => $chat_id, 'text' => "کدوم نوع پیامرسان رو میخوای🌚؟", 'parse_mode' => "MarkDown", 'reply_markup' => json_encode(['keyboard' => [[['text' => '💭| پیام‌رسان پیشرفته']], [['text' => '🎐| پیام‌رسان نوع دو']], [['text' => '📮| پیامرسان نوع یک']], [['text' => '『 برگشت 』']], ], 'resize_keyboard' => true, ]) ]);
}
elseif ($text === "👤| ممبرگیر")
{
    file_put_contents("usersData/$from_id/state.txt", "none");
    bot('sendMessage', ['chat_id' => $chat_id, 'text' => "کدوم نوع از ممبر گیر رو میخوای؟😁", 'parse_mode' => "MarkDown", 'reply_markup' => json_encode(['keyboard' => [[['text' => "💠| شیشه ای"]], [['text' => "🔸| دکمه ای"]], [['text' => "『 برگشت 』"]], ], 'resize_keyboard' => true, ]) ]);
}
elseif ($text === '⌠🫂⌡ زیر مجموعه گیری')
{
    $id = bot('sendphoto', ['chat_id' => $chat_id, 'photo' => "https://s8.uupload.ir/files/photo_2024-12-28_05-30-15_90wp.jpg", 'caption' => "گلکسی بهت کمک میکنه بدون هزینه و تبلیغ یک و بدون نیاز به کد نویسی و هاست و سرور ربات پیشرفته داشته باشی🤖

🔻| ویـژگـي ربـاتسـاز  :
🎁 ~ بدون یک ریال هزینه !
⚙️ ~ تنظیمات حرفه ای !
🚀 ~ سرعت فوق العاده  !
💎 ~ امنیت بسیار بالا !
🪄  ~ ساخت ربات های پیشرفته !
📨 ~ ساخت چندین مدل آپلودر و شرطبندی !
😜 ‌ ~ و کلی امکانات دیگر !

هـمـیـن الان اسـتـارت کـن لـذت بـبـر 🤯👇
https://t.me/$botuser?start=$from_id ", ])->result->message_id;
    bot('sendmessage', ['chat_id' => $chat_id, 'text' => "بنر بالا را برای دوستان و مخاطبین خود ارسال کنید و به ازای هر شخصی که با لینک شما وارد میشود « $refral امتـیـاز » دریافت کنید 🎁", 'reply_to_message_id' => $id, ]);
}
elseif ($text === "راهنما  |📚|" or $text === "/help")
{
    file_put_contents("usersData/$from_id/state.txt", "none");
    bot('sendMessage', ['chat_id' => $chat_id, 'text' => "📚؛ بـراي سـاخـت ربـات اول بـایـد :

1️⃣~ ربـات @BotFather را اسـتـارت کـنـیـد !

2️⃣~ دسـتـور /newbot را بـه بـات فـادر ارسـال کـنـیـد !

3️⃣~ یـک نـام بـراي ربـات خـودتـان بـه بـات فـادر ارسـال کـنـیـد !

4️⃣~ یـک یـوزرنـیـم بـراي ربـات خـودتـان بـه بـات فـادر ارسـال کـنـیـد !

⚠️~ تـوجـه کـنـیـد کـه آخـر یـوزرنـیـم بـایـد عـبـارت « bot » وجـود داشـتـه بـاشـد !

5️⃣~ اگـر تـمـام مـراحـل را درسـت طـي کـرده بـاشـیـد ، بـات فـادر مـتـن طـولانـي اي بـه عـنـوان تـوکـن بـراي شـمـا ارسـال مـیـکـنـد !

6️⃣~ آن مـتـن طـولانـي کـه تـوکـن نـامـیـده مـیـشـود کـه بـه صـورت :
- - - - - - - - - - - - - - - - - - - - - - - - - - -
1480433713:AAHKWhWSwkDqIcQGBUIyETqDqjM3Speg0UB
- - - - - - - - - - - - - - - - - - - - - - - - - - -
💐 مـي بـاشـد و هـمـچـنـيـن چـیـزي را در سـاخـت ربـات بـایـد بـه ربـات سـاز  بدهـیـد تـا بـرایـتـان ربـات مـورد نـظـر را بـسـازد !", 'parse_mode' => "HTML", 'reply_to_message_id' => $message_id, 'reply_markup' => json_encode(['inline_keyboard' => [[['text' => "آموزش ویدیویی ❗️", 'url' => "https://t.me/HajAmirOwner"]]]]) ]);
}
elseif ($text === "creator" or $text === "/creator")
{
    file_put_contents("usersData/$from_id/state.txt", "none");
    bot('sendMessage', ['chat_id' => $chat_id, 'text' => "برای دیدن پروفایل مالک ربات از دکمه های زیر استفاده کنید ❤️👇🏿

┈┅┅━┃🤍┃━┅┅┈
👤 Channel @Virtualservices_3
🤖 Bot @Virtualservices_3", 'parse_mode' => "HTML", 'reply_to_message_id' => $message_id, 'reply_markup' => json_encode(['inline_keyboard' => [[['text' => "𝐎𝐖𝐍𝐄𝐑 𝐂𝐇𝐀𝐍𝐍𝐄𝐋 👤", 'url' => "https://t.me/Virtualservices_3"]], [['text' => "𝐎𝐖𝐍𝐄𝐑 𝐀𝐂𝐂𝐎𝐔𝐍𝐓 📮", 'url' => "https://t.me/HajAmirOwner"]], [['text' => "𝐒𝐔𝐏𝐏𝐎𝐑𝐓 𝐑𝐎𝐁𝐎𝐓 🤖", 'url' => "https://t.me/DevOscar"]], [['text' => "┈┅┅━┃🤍┃━┅┅┈", 'callback_data' => "prooo"]], [['text' => "𝐒𝐏𝐎𝐍𝐒𝐎𝐑 ☁️", 'url' => "https://t.me/vip_host_ir"]], ]]) ]);
}
elseif ($text === "⌠💰⌡ خرید سکه" or $text === "/Buy" or $text === "/buy")
{
    file_put_contents("usersData/$from_id/state.txt", "none");
    bot('sendMessage', ['chat_id' => $chat_id, 'text' => "روش پرداخت خود را انتخاب کنید ♥️👇🏿

⚠️ قبل از واریز وجه از طریق درگاه با ادمین هماهنگ کنید
  
┈┅┅━┃💚┃━┅┅┈
👤 Channel @$channel
🤖 Bot @$botuser", 'parse_mode' => "HTML", 'reply_to_message_id' => $message_id, 'reply_markup' => json_encode(['inline_keyboard' => [[['text' => "کارت به کارت 💳", 'url' => "https://t.me/HajAmirOwner"]], [['text' => "نیت 🔋", 'url' => "https://t.me/HajAmirOwner"]], [['text' => "اکانت مجازی 💎", 'url' => "https://t.me/HajAmirOwner"]], ]]) ]);
}
elseif ($text == "ربات های من |🤖|")
{
    if ($created == "yes")
    {
		$user_bots  = file_get_contents("usersData/$from_id/bots.txt");
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "🛠؛ ربـات هـایـي کـه شـمـا بـا ربـاتسـاز  سـاخـتـه ایـد :
💎: ﴾ 
$user_bots ﴿ !

┈┅┅━┃❤️┃━┅┅┈
👤 Channel @$channel
🤖 Bot @$botuser", ]);
    } else bot('sendMessage', ['chat_id' => $chat_id, 'text' => "؛ شـمـا در حـال حـاضـر ربـاتـي در ربـاتسـاز  نـسـاخـتـه ایـد", 'parse_mode' => "HTML", ]);
}
elseif ($text === "ربات ساز فوق پیشرفته گلکسی 🦾")
{
    if ($coin >= 250)
    {
        file_put_contents("usersData/$from_id/state.txt", "BotSazTrox");
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "❖| آیدی #کانالت رو بدون | @ | بفرست 🩸", 'parse_mode' => 'HTML', 'reply_markup' => json_encode(['keyboard' => [[['text' => "『 برگشت 』"]], ], 'resize_keyboard' => true]) ]);
    } else bot('sendMessage', ['chat_id' => $chat_id, 'text' => "📛 امتیاز شما کافی نیست لطفاً امتیاز جمع آوری کنید مجدد به این بخش بازگردید .

💰 امتیاز مورد نیاز ~ | 250 |
🗽 امتیاز شما ~ | $coin |", 'parse_mode' => 'HTML', ]);
}
elseif ($text === "💠| شیشه ای")
{
    if ($coin >= 18)
    {
        file_put_contents("usersData/$from_id/state.txt", "member");
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "❖| آیدی #کانالت رو بدون | @ | بفرست 🩸", 'parse_mode' => 'HTML', 'reply_markup' => json_encode(['keyboard' => [[['text' => "『 برگشت 』"]], ], 'resize_keyboard' => true]) ]);
    } else bot('sendMessage', ['chat_id' => $chat_id, 'text' => "📛 امتیاز شما کافی نیست لطفاً امتیاز جمع آوری کنید مجدد به این بخش بازگردید .

💰 امتیاز مورد نیاز ~ | 18 |
🗽 امتیاز شما ~ | $coin |", 'parse_mode' => 'HTML', ]);
}
elseif ($text === "🏬| فروشگاهی")
{
    if ($coin >= 25)
    {
        file_put_contents("usersData/$from_id/state.txt", "Shop");
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "␥| توکن #ربات رو خود را ارسال کنید 🎐", 'parse_mode' => 'HTML', 'reply_markup' => json_encode(['keyboard' => [[['text' => "『 برگشت 』"]], ], 'resize_keyboard' => true]) ]);
    } else bot('sendMessage', ['chat_id' => $chat_id, 'text' => "📛 امتیاز شما کافی نیست لطفاً امتیاز جمع آوری کنید مجدد به این بخش بازگردید .

💰 امتیاز مورد نیاز ~ | 25 |
🗽 امتیاز شما ~ | $coin |", 'parse_mode' => 'HTML', ]);
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
elseif ($text === "🎛| دکمه دلخواه")
{
    if ($coin >= 30)
    {
        file_put_contents("usersData/$from_id/state.txt", "FreeButt");
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "␥| توکن #ربات رو خود را ارسال کنید 🎐", 'parse_mode' => 'HTML', 'reply_markup' => json_encode(['keyboard' => [[['text' => "『 برگشت 』"]], ], 'resize_keyboard' => true]) ]);
    } else bot('sendMessage', ['chat_id' => $chat_id, 'text' => "📛 امتیاز شما کافی نیست لطفاً امتیاز جمع آوری کنید مجدد به این بخش بازگردید .
  
💰 امتیاز مورد نیاز ~ | 30 |
🗽 امتیاز شما ~ | $coin |", 'parse_mode' => 'HTML', ]);
}
elseif ($text === "🧰| جعبه ابزار")
{
    if ($coin >= 30)
    {
        file_put_contents("usersData/$from_id/state.txt", "NormalTools");
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "❖| آیدی #کانالت رو بدون | @ | بفرست 🩸", 'parse_mode' => 'HTML', 'reply_markup' => json_encode(['keyboard' => [[['text' => "『 برگشت 』"]], ], 'resize_keyboard' => true]) ]);
    } else bot('sendMessage', ['chat_id' => $chat_id, 'text' => "📛 امتیاز شما کافی نیست لطفاً امتیاز جمع آوری کنید مجدد به این بخش بازگردید .
  
💰 امتیاز مورد نیاز ~ | 30 |
🗽 امتیاز شما ~ | $coin |", 'parse_mode' => 'HTML', ]);
}
elseif ($text === "🎐| پیام‌رسان نوع دو")
{
    if ($coin >= 10)
    {
        file_put_contents("usersData/$from_id/state.txt", "pmrs2");
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "␥| توکن #ربات رو خود را ارسال کنید 🎐", 'parse_mode' => 'HTML', 'reply_markup' => json_encode(['keyboard' => [[['text' => "『 برگشت 』"]], ], 'resize_keyboard' => true]) ]);
    } else bot('sendMessage', ['chat_id' => $chat_id, 'text' => "📛 امتیاز شما کافی نیست لطفاً امتیاز جمع آوری کنید مجدد به این بخش بازگردید .

💰 امتیاز مورد نیاز ~ | 10 |
🗽 امتیاز شما ~ | $coin |", 'parse_mode' => 'HTML', ]);
}
elseif ($text === "💭| پیام‌رسان پیشرفته")
{
    if ($coin >= 15)
    {
        file_put_contents("usersData/$from_id/state.txt", "SuperPm");
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "␥| توکن #ربات رو خود را ارسال کنید 🎐", 'parse_mode' => 'HTML', 'reply_markup' => json_encode(['keyboard' => [[['text' => "『 برگشت 』"]], ], 'resize_keyboard' => true]) ]);
    } else bot('sendMessage', ['chat_id' => $chat_id, 'text' => "📛 امتیاز شما کافی نیست لطفاً امتیاز جمع آوری کنید مجدد به این بخش بازگردید .
  
💰 امتیاز مورد نیاز ~ | 15 |
🗽 امتیاز شما ~ | $coin |", 'parse_mode' => 'HTML', ]);
}
elseif ($text === "👍🏿| لایک ساز")
{
    if ($coin >= 20)
    {
        file_put_contents("usersData/$from_id/state.txt", "LikeCR");
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "␥| توکن #ربات رو خود را ارسال کنید 🎐", 'parse_mode' => 'HTML', 'reply_markup' => json_encode(['keyboard' => [[['text' => "『 برگشت 』"]], ], 'resize_keyboard' => true]) ]);
    } else bot('sendMessage', ['chat_id' => $chat_id, 'text' => "
📛 امتیاز شما کافی نیست لطفاً امتیاز جمع آوری کنید مجدد به این بخش بازگردید .

💰 امتیاز مورد نیاز ~ | 20 |
🗽 امتیاز شما ~ | $coin |", 'parse_mode' => 'HTML', ]);
}
elseif ($text === "🔸| دکمه ای")
{
    if ($coin >= 15)
    {
        file_put_contents("usersData/$from_id/state.txt", "qnwpq");
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "❖| آیدی #کانالت رو بدون | @ | بفرست 🩸", 'parse_mode' => 'HTML', 'reply_markup' => json_encode(['keyboard' => [[['text' => "『 برگشت 』"]], ], 'resize_keyboard' => true]) ]);
    } else bot('sendMessage', ['chat_id' => $chat_id, 'text' => "📛 امتیاز شما کافی نیست لطفاً امتیاز جمع آوری کنید مجدد به این بخش بازگردید .

💰 امتیاز مورد نیاز ~ | 15 |
🗽 امتیاز شما ~ | $coin |", 'parse_mode' => 'HTML', ]);
}
elseif ($text === "📭| آپلودر ساده")
{
    if ($coin >= 20)
    {
        file_put_contents("usersData/$from_id/state.txt", "SimpUp");
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "❖| آیدی #کانالت رو بدون | @ | بفرست 🩸", 'parse_mode' => 'HTML', 'reply_markup' => json_encode(['keyboard' => [[['text' => "『 برگشت 』"]], ], 'resize_keyboard' => true]) ]);
    }
    else
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "📛 امتیاز شما کافی نیست لطفاً امتیاز جمع آوری کنید مجدد به این بخش بازگردید .

💰 امتیاز مورد نیاز ~ | 20 |
🗽 امتیاز شما ~ | $coin |", 'parse_mode' => 'HTML', ]);
}
elseif ($text === "🎥| آپلودر فیلم")
{
    if ($coin >= 30)
    {
        file_put_contents("usersData/$from_id/state.txt", "MovieUp");
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "❖| آیدی #کانالت رو بدون | @ | بفرست 🩸", 'parse_mode' => 'HTML', 'reply_markup' => json_encode(['keyboard' => [[['text' => "『 برگشت 』"]], ], 'resize_keyboard' => true]) ]);
    } else bot('sendMessage', ['chat_id' => $chat_id, 'text' => "📛 امتیاز شما کافی نیست لطفاً امتیاز جمع آوری کنید مجدد به این بخش بازگردید .

💰 امتیاز مورد نیاز ~ | 30 |
🗽 امتیاز شما ~ | $coin |", 'parse_mode' => 'HTML', ]);
}
elseif ($text === "📦| آپلودر فایل")
{
    if ($coin >= 50)
    {
        file_put_contents("usersData/$from_id/state.txt", "FileUp");
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "␥| توکن #ربات رو خود را ارسال کنید 🎐", 'parse_mode' => 'HTML', 'reply_markup' => json_encode(['keyboard' => [[['text' => "『 برگشت 』"]], ], 'resize_keyboard' => true]) ]);
    } else bot('sendMessage', ['chat_id' => $chat_id, 'text' => "📛 امتیاز شما کافی نیست لطفاً امتیاز جمع آوری کنید مجدد به این بخش بازگردید .

💰 امتیاز مورد نیاز ~ | 50 |
🗽 امتیاز شما ~ | $coin |", 'parse_mode' => 'HTML', ]);
}
elseif ($text === "🕹| بازی کلمات")
{
    if ($coin >= 14)
    {
        file_put_contents("usersData/$from_id/state.txt", "GameKala");
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "❖| آیدی #کانالت رو بدون | @ | بفرست 🩸", 'parse_mode' => 'HTML', 'reply_markup' => json_encode(['keyboard' => [[['text' => "『 برگشت 』"]], ], 'resize_keyboard' => true]) ]);
    } else bot('sendMessage', ['chat_id' => $chat_id, 'text' => "📛 امتیاز شما کافی نیست لطفاً امتیاز جمع آوری کنید مجدد به این بخش بازگردید .

💰 امتیاز مورد نیاز ~ | 14 |
🗽 امتیاز شما ~ | $coin |", 'parse_mode' => 'HTML', ]);
}
elseif ($text === "🪙| ست وب هوک")
{
    if ($coin >= 5)
    {
        file_put_contents("usersData/$from_id/state.txt", "SetWeb");
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "␥| توکن #ربات رو خود را ارسال کنید 🎐", 'parse_mode' => 'HTML', 'reply_markup' => json_encode(['keyboard' => [[['text' => "『 برگشت 』"]], ], 'resize_keyboard' => true]) ]);
    } else bot('sendMessage', ['chat_id' => $chat_id, 'text' => "📛 امتیاز شما کافی نیست لطفاً امتیاز جمع آوری کنید مجدد به این بخش بازگردید .

💰 امتیاز مورد نیاز ~ | 5 |
🗽 امتیاز شما ~ | $coin |", 'parse_mode' => 'HTML', ]);
}
elseif ($text === "🍆| بکیرم")
{
    if ($coin >= 16)
    {
        file_put_contents("usersData/$from_id/state.txt", "BKirm");
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "❖| آیدی #کانالت رو بدون | @ | بفرست 🩸", 'parse_mode' => 'HTML', 'reply_markup' => json_encode(['keyboard' => [[['text' => "『 برگشت 』"]], ], 'resize_keyboard' => true]) ]);
    } else bot('sendMessage', ['chat_id' => $chat_id, 'text' => "📛 امتیاز شما کافی نیست لطفاً امتیاز جمع آوری کنید مجدد به این بخش بازگردید .
  
💰 امتیاز مورد نیاز ~ | 16 |
🗽 امتیاز شما ~ | $coin |", 'parse_mode' => 'HTML', ]);
}
elseif ($text === "📃| اسم فامیل")
{
    if ($coin >= 10)
    {
        file_put_contents("usersData/$from_id/state.txt", "pak");
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "❖| آیدی #کانالت رو بدون | @ | بفرست 🩸", 'parse_mode' => 'HTML', 'reply_markup' => json_encode(['keyboard' => [[['text' => "『 برگشت 』"]], ], 'resize_keyboard' => true]) ]);
    } else bot('sendMessage', ['chat_id' => $chat_id, 'text' => "📛 امتیاز شما کافی نیست لطفاً امتیاز جمع آوری کنید مجدد به این بخش بازگردید .

💰 امتیاز مورد نیاز ~ | 10 |
🗽 امتیاز شما ~ | $coin |", 'parse_mode' => 'HTML', ]);
}
elseif ($text === "🗣| ویس کده")
{
    if ($coin >= 15)
    {
        file_put_contents("usersData/$from_id/state.txt", "voice");
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "❖| آیدی #کانالت رو بدون | @ | بفرست 🩸", 'parse_mode' => 'HTML', 'reply_markup' => json_encode(['keyboard' => [[['text' => "『 برگشت 』"]], ], 'resize_keyboard' => true]) ]);
    } else bot('sendMessage', ['chat_id' => $chat_id, 'text' => "📛 امتیاز شما کافی نیست لطفاً امتیاز جمع آوری کنید مجدد به این بخش بازگردید .

💰 امتیاز مورد نیاز ~ | 15 |
🗽 امتیاز شما ~ | $coin |", 'parse_mode' => 'HTML', ]);
}
elseif ($text === "✂️| سنگ کاغذ قیچی")
{
    if ($coin >= 6)
    {
        file_put_contents("usersData/$from_id/state.txt", "SngKqz");
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "❖| آیدی #کانالت رو بدون | @ | بفرست 🩸", 'parse_mode' => 'HTML', 'reply_markup' => json_encode(['keyboard' => [[['text' => "『 برگشت 』"]], ], 'resize_keyboard' => true]) ]);
    } else bot('sendMessage', ['chat_id' => $chat_id, 'text' => "📛 امتیاز شما کافی نیست لطفاً امتیاز جمع آوری کنید مجدد به این بخش بازگردید .

💰 امتیاز مورد نیاز ~ | 6 |
🗽 امتیاز شما ~ | $coin |", 'parse_mode' => 'HTML', ]);
}
elseif ($text === "نوع دوم 💧")
{
    if ($coin >= 15)
    {
        file_put_contents("usersData/$from_id/state.txt", "soski");
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "
 ␥| توکن #ربات رو خود را ارسال کنید 🎐

⚠️ نکته : حتما وارد پنل ربات خود شوید و چنل خودتونو از اونجا نیز تنظیم کنید
", 'parse_mode' => 'HTML', 'reply_markup' => json_encode(['keyboard' => [[['text' => "『 برگشت 』"]], ], 'resize_keyboard' => true]) ]);
    } else bot('sendMessage', ['chat_id' => $chat_id, 'text' => "📛 امتیاز شما کافی نیست لطفاً امتیاز جمع آوری کنید مجدد به این بخش بازگردید .

💰 امتیاز مورد نیاز ~ | 15 |
🗽 امتیاز شما ~ | $coin |", 'parse_mode' => 'HTML', ]);
}
elseif ($text === "🍫| سرگرمی گروه")
{
    if ($coin >= 10)
    {
        file_put_contents("usersData/$from_id/state.txt", "sargarmi");
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "❖| آیدی #کانالت رو بدون | @ | بفرست 🩸", 'parse_mode' => 'HTML', 'reply_markup' => json_encode(['keyboard' => [[['text' => "『 برگشت 』"]], ], 'resize_keyboard' => true]) ]);
    } else bot('sendMessage', ['chat_id' => $chat_id, 'text' => "📛 امتیاز شما کافی نیست لطفاً امتیاز جمع آوری کنید مجدد به این بخش بازگردید .

💰 امتیاز مورد نیاز ~ | 10 |
🗽 امتیاز شما ~ | $coin |", 'parse_mode' => 'HTML', ]);
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
elseif ($text === "🏦| بانک امتیاز")
{
    if ($coin >= 20)
    {
        file_put_contents("usersData/$from_id/state.txt", "Bank");
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "␥| توکن #ربات رو خود را ارسال کنید 🎐", 'parse_mode' => 'HTML', 'reply_markup' => json_encode(['keyboard' => [[['text' => "『 برگشت 』"]], ], 'resize_keyboard' => true]) ]);
    } else bot('sendMessage', ['chat_id' => $chat_id, 'text' => "📛 امتیاز شما کافی نیست لطفاً امتیاز جمع آوری کنید مجدد به این بخش بازگردید .

💰 امتیاز مورد نیاز ~ | 20 |
🗽 امتیاز شما ~ | $coin |", 'parse_mode' => 'HTML', ]);
}
elseif ($text === "🎅| کلش آف کلنز")
{
    if ($coin >= 30)
    {
        file_put_contents("usersData/$from_id/state.txt", "Jng");
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "❖| آیدی #کانالت رو بدون | @ | بفرست 🩸 

⚠️ حتما از پنل مدیریت نیز چنل خود را تنظیم کنید", 'parse_mode' => 'HTML', 'reply_markup' => json_encode(['keyboard' => [[['text' => "『 برگشت 』"]], ], 'resize_keyboard' => true]) ]);
    } else bot('sendMessage', ['chat_id' => $chat_id, 'text' => "📛 امتیاز شما کافی نیست لطفاً امتیاز جمع آوری کنید مجدد به این بخش بازگردید .

💰 امتیاز مورد نیاز ~ | 30 |
🗽 امتیاز شما ~ | $coin |", 'parse_mode' => 'HTML', ]);
}
elseif ($text === "📦| ویو پنل")
{
    if ($coin >= 25)
    {
        file_put_contents("usersData/$from_id/state.txt", "ViewPanel");
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "␥| توکن #ربات رو خود را ارسال کنید 🎐", 'parse_mode' => 'HTML', 'reply_markup' => json_encode(['keyboard' => [[['text' => "『 برگشت 』"]], ], 'resize_keyboard' => true]) ]);
    } else bot('sendMessage', ['chat_id' => $chat_id, 'text' => "📛 امتیاز شما کافی نیست لطفاً امتیاز جمع آوری کنید مجدد به این بخش بازگردید .

💰 امتیاز مورد نیاز ~ | 25 |
🗽 امتیاز شما ~ | $coin |", 'parse_mode' => 'HTML', ]);

}
elseif ($text === "نوع اول 💦")
{
    if ($coin >= 20)
    {
        file_put_contents("usersData/$from_id/state.txt", "hal");
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "␥| توکن #ربات رو خود را ارسال کنید 🎐", 'parse_mode' => 'HTML', 'reply_markup' => json_encode(['keyboard' => [[['text' => "『 برگشت 』"]], ], 'resize_keyboard' => true]) ]);
    } else bot('sendMessage', ['chat_id' => $chat_id, 'text' => "📛 امتیاز شما کافی نیست لطفاً امتیاز جمع آوری کنید مجدد به این بخش بازگردید .

💰 امتیاز مورد نیاز ~ | 20 |
🗽 امتیاز شما ~ | $coin |", 'parse_mode' => 'HTML', ]);
}
elseif ($text === "💸| شرط بندی")
{
    if ($coin >= 25)
    {
        file_put_contents("usersData/$from_id/state.txt", "Shart");
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "␥| توکن #ربات رو خود را ارسال کنید 🎐", 'parse_mode' => 'HTML', 'reply_markup' => json_encode(['keyboard' => [[['text' => "『 برگشت 』"]], ], 'resize_keyboard' => true]) ]);
    } else bot('sendMessage', ['chat_id' => $chat_id, 'text' => "📛 امتیاز شما کافی نیست لطفاً امتیاز جمع آوری کنید مجدد به این بخش بازگردید .

💰 امتیاز مورد نیاز ~ | 25 |
🗽 امتیاز شما ~ | $coin |", 'parse_mode' => 'HTML', ]);
}
elseif ($text === "🔊| ادیتور موزیک")
{
    if ($coin >= 2)
    {
        file_put_contents("usersData/$from_id/state.txt", "MusicEdit");
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "␥| توکن #ربات رو خود را ارسال کنید 🎐", 'parse_mode' => 'HTML', 'reply_markup' => json_encode(['keyboard' => [[['text' => "『 برگشت 』"]], ], 'resize_keyboard' => true]) ]);
    } else  bot('sendMessage', ['chat_id' => $chat_id, 'text' => "📛 امتیاز شما کافی نیست لطفاً امتیاز جمع آوری کنید مجدد به این بخش بازگردید .
  
💰 امتیاز مورد نیاز ~ | 2 |
🗽 امتیاز شما ~ | $coin |", 'parse_mode' => 'HTML', ]);
}
elseif ($text === "🖥| ضد اسپم چنل")
{
    if ($coin >= 15)
    {
        file_put_contents("usersData/$from_id/state.txt", "ChannelAnti");
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "␥| توکن #ربات رو خود را ارسال کنید 🎐", 'parse_mode' => 'HTML', 'reply_markup' => json_encode(['keyboard' => [[['text' => "『 برگشت 』"]], ], 'resize_keyboard' => true]) ]);
    } else bot('sendMessage', ['chat_id' => $chat_id, 'text' => "📛 امتیاز شما کافی نیست لطفاً امتیاز جمع آوری کنید مجدد به این بخش بازگردید .
  
💰 امتیاز مورد نیاز ~ | 15 |
🗽 امتیاز شما ~ | $coin |", 'parse_mode' => 'HTML', ]);
}
elseif ($text === "👁‍🗨| ویوگیر")
{
    if ($coin >= 30)
    {
        file_put_contents("usersData/$from_id/state.txt", "ViewGir");
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "␥| توکن #ربات رو خود را ارسال کنید 🎐", 'parse_mode' => 'HTML', 'reply_markup' => json_encode(['keyboard' => [[['text' => "『 برگشت 』"]], ], 'resize_keyboard' => true]) ]);
    } else bot('sendMessage', ['chat_id' => $chat_id, 'text' => "📛 امتیاز شما کافی نیست لطفاً امتیاز جمع آوری کنید مجدد به این بخش بازگردید .

💰 امتیاز مورد نیاز ~ | 30 |
🗽 امتیاز شما ~ | $coin |", 'parse_mode' => 'HTML', ]);
}
elseif ($text === "🐺| ضدلینک")
{
    if ($coin >= 30)
    {
        file_put_contents("usersData/$from_id/state.txt", "Zdlink");
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "❖| آیدی #کانالت رو بدون | @ | بفرست 🩸", 'parse_mode' => 'HTML', 'reply_markup' => json_encode(['keyboard' => [[['text' => "『 برگشت 』"]], ], 'resize_keyboard' => true]) ]);
    } else bot('sendMessage', ['chat_id' => $chat_id, 'text' => "📛 امتیاز شما کافی نیست لطفاً امتیاز جمع آوری کنید مجدد به این بخش بازگردید .

💰 امتیاز مورد نیاز ~ | 30 |
🗽 امتیاز شما ~ | $coin |", 'parse_mode' => 'HTML', ]);
}
elseif ($text === "🎓| پست گذاری کاربر")
{
    if ($coin >= 15)
    {
        file_put_contents("usersData/$from_id/state.txt", "Post");
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "❖| آیدی #کانالت رو بدون | @ | بفرست 🩸", 'parse_mode' => 'HTML', 'reply_markup' => json_encode(['keyboard' => [[['text' => "『 برگشت 』"]], ], 'resize_keyboard' => true]) ]);
    } else bot('sendMessage', ['chat_id' => $chat_id, 'text' => "📛 امتیاز شما کافی نیست لطفاً امتیاز جمع آوری کنید مجدد به این بخش بازگردید .

💰 امتیاز مورد نیاز ~ | 15 |
🗽 امتیاز شما ~ | $coin |", 'parse_mode' => 'HTML', ]);
}
elseif ($text === "💭| کامنت گذار پست")
{
    if ($coin >= 10)
    {
        file_put_contents("usersData/$from_id/state.txt", "comnt");
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "␥| توکن #ربات رو خود را ارسال کنید 🎐

⚠️ نکته : حتما داخل گروه چنلتون ادمین بشه ", 'parse_mode' => 'HTML', 'reply_markup' => json_encode(['keyboard' => [[['text' => "『 برگشت 』"]], ], 'resize_keyboard' => true]) ]);
    } else bot('sendMessage', ['chat_id' => $chat_id, 'text' => "📛 امتیاز شما کافی نیست لطفاً امتیاز جمع آوری کنید مجدد به این بخش بازگردید .

💰 امتیاز مورد نیاز ~ | 10 |
🗽 امتیاز شما ~ | $coin |", 'parse_mode' => 'HTML', ]);
}
elseif ($text === "😈| اعتراف گیر")
{
    if ($coin >= 4)
    {
        file_put_contents("usersData/$from_id/state.txt", "fal");
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "❖| آیدی #کانالت رو بدون | @ | بفرست 🩸", 'parse_mode' => 'HTML', 'reply_markup' => json_encode(['keyboard' => [[['text' => "『 برگشت 』"]], ], 'resize_keyboard' => true]) ]);
    } else bot('sendMessage', ['chat_id' => $chat_id, 'text' => "📛 امتیاز شما کافی نیست لطفاً امتیاز جمع آوری کنید مجدد به این بخش بازگردید .

💰 امتیاز مورد نیاز ~ | 4 |
🗽 امتیاز شما ~ | $coin |", 'parse_mode' => 'HTML', ]);
}
elseif ($text === "📮| پیامرسان نوع یک")
{
    if ($coin >= 8)
    {
        file_put_contents("usersData/$from_id/state.txt", "pmrs");
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "❖| آیدی #کانالت رو بدون | @ | بفرست 🩸", 'parse_mode' => 'HTML', 'reply_markup' => json_encode(['keyboard' => [[['text' => "『 برگشت 』"]], ], 'resize_keyboard' => true]) ]);
    } else bot('sendMessage', ['chat_id' => $chat_id, 'text' => "📛 امتیاز شما کافی نیست لطفاً امتیاز جمع آوری کنید مجدد به این بخش بازگردید .

💰 امتیاز مورد نیاز ~ | 8 |
🗽 امتیاز شما ~ | $coin |", 'parse_mode' => 'HTML', ]);
}
elseif ($text === "🧫| شارژ رایگان")
{
    if ($coin >= 8)
    {
        file_put_contents("usersData/$from_id/state.txt", "NetFree");
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "❖| آیدی #کانالت رو بدون | @ | بفرست 🩸", 'parse_mode' => 'HTML', 'reply_markup' => json_encode(['keyboard' => [[['text' => "『 برگشت 』"]], ], 'resize_keyboard' => true]) ]);
    } else bot('sendMessage', ['chat_id' => $chat_id, 'text' => "📛 امتیاز شما کافی نیست لطفاً امتیاز جمع آوری کنید مجدد به این بخش بازگردید .

💰 امتیاز مورد نیاز ~ | 8 |
🗽 امتیاز شما ~ | $coin |", 'parse_mode' => 'HTML', ]);
}
elseif ($text === "🤴| فونت ساز")
{
    if ($coin >= 12)
    {
        file_put_contents("usersData/$from_id/state.txt", "fontsz");
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "␥| توکن #ربات رو خود را ارسال کنید 🎐", 'parse_mode' => 'HTML', 'reply_markup' => json_encode(['keyboard' => [[['text' => "『 برگشت 』"]], ], 'resize_keyboard' => true]) ]);
    } else bot('sendMessage', ['chat_id' => $chat_id, 'text' => "📛 امتیاز شما کافی نیست لطفاً امتیاز جمع آوری کنید مجدد به این بخش بازگردید .

💰 امتیاز مورد نیاز ~ | 12 |
🗽 امتیاز شما ~ | $coin |", 'parse_mode' => 'HTML', ]);
}
elseif ($text === "تمدید ربات |⏳|") {
    
    file_put_contents("usersData/$from_id/state.txt", "Check4Tmdid");

    bot('sendMessage', [
        'chat_id' => $chat_id, 
        'text' => "|💰|: تعرفه امتیاز آپدیت ربات ها به شرح زیر می‌باشد

┈┅┅━┃🤍┃━┅┅┈
👤 Channel @$channel",
        'parse_mode' => 'HTML', 
        'reply_markup' => json_encode([
            'inline_keyboard' => [
                [['text' => "◅ 15 ▻ 🧰| جعبه ابزار", 'url' => $idbot]],
                [['text' => "◅ 20 ▻ 🎛| دکمه دلخواه", 'url' => $idbot]],
                [['text' => "◅ 15 ▻ 🏬| فروشگاهی", 'url' => $idbot]], 
                [['text' => "◅ 10 ▻ 👍🏿| لایک ساز", 'url' => $idbot]],
                [['text' => "◅ 5 ▻ 🎓| پست گذاری کاربر", 'url' => $idbot]],
                [['text' => "◅ 10 ▻ 🖥| ضد اسپم چنل", 'url' => $idbot]],
                [['text' => "◅ 5 ▻ 📨| پیام‌رسان پیشرفته", 'url' => $idbot]],
                [['text' => "◅ 7 ▻ 🎐| پیام‌رسان نوع دو", 'url' => $idbot]],
                [['text' => "◅ 8 ▻ 💭| کامنت گذار پست", 'url' => $idbot]],
                [['text' => "◅ 5 ▻ 📮| پیامرسان نوع یک", 'url' => $idbot]],
                [['text' => "◅ 4 ▻ 🪙| ست وب هوک", 'url' => $idbot]],
                [['text' => "◅ 0 ▻ 🔊| ادیتور موزیک", 'url' => $idbot]],
            ],
        ]),
    ]);

    // ارسال پیام دوم برای درخواست وارد کردن آیدی ربات
    bot('sendMessage', [
        'chat_id' => $chat_id, 
        'text' => "✅ ایدی ربات خود را بدون @ وارد کنید 

✅ نمونه صحیح : TalegramBot

✅ به حرف‌های کوچیک و بزرگ ربات حتما دقت کنید", 
        'parse_mode' => 'Markdown', 
        'reply_markup' => json_encode([
            'resize_keyboard' => true, 
            'keyboard' => [
                [['text' => "『 بازگشت 』"]]
            ],
        ]),
    ]);
}
elseif ($text === "حذف ربات |🗑|")
{
    if ($created === "yes")
    {
        file_put_contents("usersData/$from_id/state.txt", "deleterob");
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "✅ ایدی ربات خود را وارد کنید 

✅ نمونه صحیح : TalegramBot

✅ به حرف های کوچیک و بزرگ ربات حتما دقت کنید", 'parse_mode' => 'Markdown', 'reply_markup' => json_encode(['resize_keyboard' => true, 'keyboard' => [[['text' => "『 بازگشت 』"]], ]]) ]);
    } else bot('sendMessage', ['chat_id' => $chat_id, 'text' => "❎شما ربات فعالی در سرور رباتساز   ندارید.", 'parse_mode' => 'Markdown', ]);
}
elseif ($text === "پشتیبانی |🧑🏻‍💻|")
{
    file_put_contents("usersData/$from_id/state.txt", "mok");
    bot('sendMessage', ['chat_id' => $chat_id, 'text' => "💬 به پشتیبانی آنلاین خوش آمدید !

🔴| در صورتی که با مشکلی مواجه شدید یا سوالی داشتید حتما قبل از مراجعه به پشتیبانی راهنما را مطالعه کنید 

🟡| اگر باگی ( مشکلی ) در ربات مشاهده کردید با گزارش کردن آن سکه هدیه بگیرید

⚫️| از احوال پرسی و پیام بی جا در پشتیبانی بپرهیزید

🟣| با رعایت نکردن ادب در پشتیبانی برای همیشه از ربات مسدود خواهید شد

🟢 | اگر برای ربات شما مشکلی پیش آمده حتما ایدی ربات خود را همراه مشکل ارسال کنید 

⏰|  ساعت : $time
🗓|  تاریخ : $ambar

پس مطالعه ی موارد بالا پیام خود را ارسال کنید 🌹🍃", 'parse_mode' => 'HTML', 'reply_markup' => json_encode(['resize_keyboard' => true, 'keyboard' => [[['text' => "『 بازگشت 』"]], ]]) ]);
}
if (($text === "/panel" or $text === "پنل") && $from_id === $Dev) {
    // بررسی وضعیت احراز هویت
    if (file_get_contents("usersData/$from_id/auth.txt") !== "authenticated") {
        // اگر کاربر احراز هویت نشده باشد، درخواست رمز عبور می‌شود
        file_put_contents("usersData/$from_id/state.txt", "awaiting_password");
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "🔑 لطفاً رمز عبور ادمین را وارد کنید:",
        ]);
        exit();
    } else {
        // اگر کاربر احراز هویت شده باشد، پیام خوش آمد گویی با کیبورد ارسال می‌شود
        file_put_contents("usersData/$from_id/state.txt", "none");
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "مدیر عزیز به پنل مدیریت خوش آمدید 🌹",
            'parse_mode' => 'html',
            'reply_markup' => json_encode([
                'keyboard' => [
                    [['text' => '⚙️ | تنظیمات'], ['text' => '📈 | آمار']],
                    [['text' => '✉️ | ارسال پیام'], ['text' => '🚮 | مدیریت ممبر']],
                    [['text' => '🛠 | حذف و تمدید'], ['text' => '『 بازگشت 』']],
                ],
                'resize_keyboard' => true
            ])
        ]);
    }
}

// بررسی رمز عبور وارد شده
if (file_get_contents("usersData/$from_id/state.txt") === "awaiting_password") {
    if ($text === "Mohammad123") {  // رمز عبور ادمین
        // اگر رمز صحیح بود، وضعیت احراز هویت ذخیره می‌شود
        file_put_contents("usersData/$from_id/auth.txt", "authenticated");
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "✅ ورود موفقیت‌آمیز بود دوباره دستور /panel بفرس.",
        ]);
    } else {
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "⛔️ رمز عبور اشتباه است.",
        ]);
    }
    exit();
}
elseif ($text === "🛠 | حذف و تمدید" && $from_id === $Dev)
{
    bot('sendmessage', ['chat_id' => $Dev, 'text' => "به منوی حذف و تمدید خوش آمدید 🤍👇🏽", 'parse_mode' => "MarkDown", 'reply_markup' => json_encode(['keyboard' => [[['text' => '🛠 | حذف ربات'], ['text' => "🗑 | حذف همه ربات ها"]], [['text' => '♻️ | تمدید ربات'], ['text' => "پنل"]], ], 'resize_keyboard' => true, ]) ]);
}
elseif ($text === "⚙️ | تنظیمات" && $from_id === $Dev)
{
    bot('sendmessage', ['chat_id' => $Dev, 'text' => "به منوی تنظیمات خوش آمدید 🤍👇🏽", 'parse_mode' => "MarkDown", 'reply_markup' => json_encode(['keyboard' => [[['text' => '✅ | روشن ربات'], ['text' => '❌ | خاموش ربات']], [['text' => '📢 | تنظیم کانال اول'], ['text' => '📢 | تنظیم کانال دوم']], [['text' => '🔓 | خاموش جویین'], ['text' => '🔐 | روشن  جویین ']], [['text' => '💎 | تنظیم سکه زیرمجموعه'], ['text' => "پنل"]], ], 'resize_keyboard' => true, ]) ]);
}
elseif ($text === "📈 | آمار" && $from_id === $Dev)
{
    bot('sendmessage', ['chat_id' => $Dev, 'text' => "به منوی آمار خوش آمدید 🤍👇🏽", 'parse_mode' => "MarkDown", 'reply_markup' => json_encode(['keyboard' => [[['text' => '📊 | آمار ربات'], ['text' => '🤖 | ربات های ساخته شده']], [['text' => '🔖| دریافت لیست ممبر'], ['text' => '⛔️ | افراد بلاک شده']], [['text' => "👤 | اطلاعات ربات"], ['text' => "‼️ | اطلاعات کاربر"]], [['text' => "☢️ | اطلاعات ربات ساز"], ['text' => "پنل"]], ], 'resize_keyboard' => true, ]) ]);
}
elseif ($text === "✉️ | ارسال پیام" && $from_id === $Dev)
{
    bot('sendmessage', ['chat_id' => $Dev, 'text' => "به منوی ارسال پیام خوش آمدید 🤍👇🏽", 'parse_mode' => "MarkDown", 'reply_markup' => json_encode(['keyboard' => [[['text' => "📩 | پیام به کاربر"], ['text' => '📨 | پیام همگانی']], [['text' => "پنل"]], ], 'resize_keyboard' => true, ]) ]);
}
elseif ($text === "🚮 | مدیریت ممبر" && $from_id === $Dev)
{
    bot('sendmessage', ['chat_id' => $Dev, 'text' => "به منوی مدیریت ممبر خوش آمدید 🤍👇🏽", 'parse_mode' => "MarkDown", 'reply_markup' => json_encode(['keyboard' => [[['text' => '⚠️ | اخطار به کاربر'], ['text' => '🔫 | صفر کردن امتیاز کاربر']], [['text' => '💎 | ارسال سکه'], ['text' => '💎 | کسر سکه']], [['text' => '✅ | آنبلاک کردن'], ['text' => '❌ | بلاک کاربر']], [['text' => '🌀| حذف اسپم ها'], ['text' => "🎊 | سکه همگانی"]], [['text' => 'پنل']], ], 'resize_keyboard' => true, ]) ]);
}
elseif ($text === "💎 | تنظیم سکه زیرمجموعه" && $from_id === $Dev)
{
    file_put_contents("usersData/$from_id/state.txt", "setref");
    bot('sendmessage', ['chat_id' => $Dev, 'text' => "برای وارد کردن مقدار سکه از کیبورد زیر استفاده کنید👇🏽", 'parse_mode' => "MarkDown", 'reply_markup' => json_encode(['keyboard' => [[['text' => "0"]], [['text' => "1"], ['text' => "2"], ['text' => "3"], ['text' => "4"], ['text' => "5"]], [['text' => "6"], ['text' => "7"], ['text' => "8"], ['text' => "9"], ['text' => "10"]], [['text' => "11"], ['text' => "12"], ['text' => "13"], ['text' => "14"], ['text' => "15"]], [['text' => "16"], ['text' => "17"], ['text' => "18"], ['text' => "19"], ['text' => "20"]], [['text' => "پنل"]], ], 'resize_keyboard' => true, ]) ]);
}
elseif ($text === "💎 | کسر سکه" && $from_id == $Dev)
{
    file_put_contents("usersData/$from_id/state.txt", "kasremm");
    bot('sendmessage', ['chat_id' => $Dev, 'text' => "🍇ایدی عددی کاربر را وارد کنید:", 'parse_mode' => "MarkDown", 'reply_markup' => json_encode(['keyboard' => [[['text' => "پنل"]], ], 'resize_keyboard' => true, ]) ]);
}
elseif ($text === "⚠️ | اخطار به کاربر" && $chat_id === $Dev)
{
    file_put_contents("usersData/$from_id/state.txt", "iQeuclclco");
    bot('sendMessage', ['chat_id' => $chat_id, 'text' => "ایدی فرد را ارسال کنید", 'parse_mode' => "HTML", 'reply_markup' => json_encode(['keyboard' => [[['text' => "پنل"]], ], 'resize_keyboard' => true, ]) ]);
}
elseif ($text === "🛠 | حذف ربات" && $chat_id === $Dev)
{
    file_put_contents("usersData/$from_id/state.txt", "delezi");
    bot('sendMessage', ['chat_id' => $chat_id, 'text' => "🛡ایدی ربات خود را وارد کنید.......!
ایدی ربات را بدون | @ |  وارد کنید !", ]);
}
elseif ($text === "📢 | تنظیم کانال اول" && $from_id === $Dev)
{
    file_put_contents("usersData/$from_id/state.txt", "setchanel1");
    bot('sendMessage', ['chat_id' => $Dev, 'text' => "آیدی کانال را بدون @ ارسال کنید 👇🏽
توجه کنید قبل از ارسال ربات را ادمین کانال کنید و در ارسال آیدی هم دقت کنید ⚠️", 'parse_mode' => "MarkDown", 'reply_markup' => json_encode(['keyboard' => [[['text' => "پنل"]], ], 'resize_keyboard' => true, ]) ]);
}
elseif ($text === "📢 | تنظیم کانال دوم" && $from_id === $Dev)
{
    file_put_contents("usersData/$from_id/state.txt", "setchanel2");
    bot('sendMessage', ['chat_id' => $Dev, 'text' => "آیدی کانال را بدون @ ارسال کنید 👇🏽
توجه کنید قبل از ارسال ربات را ادمین کانال کنید و در ارسال آیدی هم دقت کنید ⚠️", 'parse_mode' => "MarkDown", 'reply_markup' => json_encode(['keyboard' => [[['text' => "پنل"]], ], 'resize_keyboard' => true, ]) ]);
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
elseif ($text === "🤖 | ربات های ساخته شده" && $chat_id === $Dev)
{
    $scan = scandir('botsData');
    unset($scan[0], $scan[1]);
    foreach ($scan as $scans)
    {
        $txtx .= "@$scans\n";
    }
    $tedad = count($scan);
    bot('sendMessage', ['chat_id' => $chat_id, 'text' => "لیست ربات های ساخته شده 🌊 :
- ================= -
$txtx- ================= -
تعداد کل ربات های ساخته شده 🗂 :
$tedad عدد ربات ساخته شده
- ================= -
@$channel 🦾
@$botuser ❤️", 'parse_mode' => "HTML", ]);
}
elseif ($text === "📩 | پیام به کاربر" && $chat_id === $Dev)
{
    file_put_contents("usersData/$from_id/state.txt", "info");
    bot('sendMessage', ['chat_id' => $chat_id, 'text' => "✉️ | لطفا ایدی عددی کاربر مورد نظر را ارسال کنید !", ]);
}
elseif ($text === "📊 | آمار ربات" && $chat_id === $Dev)
{
    $starttime = microtime(true);
    bot('sendmessage', ['chat_id' => $chat_id, 'text' => "🔺 در حال بارگزاری اطلاعات و پینگ ...", 'parse_mode' => "HTML", ]);
    $endtime = (microtime(true) - $starttime);
    $telegram_ping = substr($endtime, 0, -11);
    $memUsage = memUsage(true);
    $domain = $_SERVER['SERVER_NAME'];
    $mem = getMUsage();
    $ver = phpversion();
    $user = file_get_contents("MMBER.txt");
    $member_id = explode("\n", $user);
    $member_count = count($member_id) - 1;
	$load       = sys_getloadavg();
    bot('sendMessage', ['chat_id' => $chat_id, 'text' => "💣 All Users:  <b>$member_count</b>

〰️〰️〰️〰️〰️
🚀 Telegram ping : <b>$telegram_ping</b> ms

🗂 Memory Usage : <b>$memUsage</b>

📉 Load avg : <code>$load[0]</code>

📌 PHP Version : <b>$ver</b>

📁 Usage : <u>$mem</u>

💻 Power : <b>$onof</b>

🌐 Domain : $domain

👤 Bot : @$botuser

📫 Channel : @$channel

〰️〰️〰️〰️〰️
 
⏱ Time : $time
🕰 Date : $ambar", 'parse_mode' => 'HTML', ]);
}
elseif ($text === "📨 | پیام همگانی" && $chat_id === $Dev)
{
    file_put_contents("usersData/$from_id/state.txt", "pm");
    bot('sendMessage', ['chat_id' => $chat_id, 'text' => "📨 | پیام خود را ارسال کنید !", 'parse_mode' => 'html', 'reply_markup' => json_encode(['keyboard' => [[['text' => 'پنل']], ], 'resize_keyboard' => true]) ]);
}
elseif ($text === "💎 | ارسال سکه" && $from_id === $Dev)
{
    file_put_contents("usersData/$from_id/state.txt", "fromidforcoin");
    bot('sendMessage', ['chat_id' => $Dev, 'text' => "✅ | ایدی عددی کاربر مورد نظر را ارسال کنید !", 'parse_mode' => "MarkDown", 'reply_markup' => json_encode(['keyboard' => [[['text' => "پنل"]], ], 'resize_keyboard' => true, ]) ]);
}
elseif ($text === "❌ | بلاک کاربر" && $chat_id === $Dev)
{
    file_put_contents("usersData/$from_id/state.txt", "shar");
    bot('sendMessage', ['chat_id' => $chat_id, 'text' => "لطفا ایدی فرد مورد نظر را ارسال کنید", ]);
}
elseif ($text === "✅ | آنبلاک کردن" && $chat_id === $Dev)
{
    file_put_contents("usersData/$from_id/state.txt", "sharr");
    bot('Sendmessage', ['chat_id' => $chat_id, 'text' => "لطفا ایدی عددی کاربر مورد نظر رو ارسال کنید", ]);
}
elseif ($text === "🔓 | خاموش جویین" && $chat_id === $Dev)
{
    file_put_contents("usersData/$from_id/state.txt", "BotInfo");
    unlink("settings/JOIN.txt");
    bot('sendMessage', ['chat_id' => $chat_id, 'text' => "جویین اجباری با موفقیت خاموش شد و از این پس ممبر ها بدون نیاز ب جویین شدن میتوانند با ربات کار کنند ✅", ]);
}
elseif ($text === "🔐 | روشن  جویین" && $chat_id === $Dev)
{
    file_put_contents("settings/JOIN.txt", "Kobs");
    bot('sendMessage', ['chat_id' => $chat_id, 'text' => "جویین اجباری با موفقیت روشن شد و از این پس ممبر ها برای کار با ربات باید حتما داخل کانال های @$channel11 و @$channel22 جویین شوند ✅", ]);
}
elseif ($text === "☢️ | اطلاعات ربات ساز" && $chat_id === $Dev)
{
    file_put_contents("usersData/$from_id/state.txt", "BotCrInfo");
    bot('sendMessage', ['chat_id' => $chat_id, 'text' => "🛡ایدی ربات خود را وارد کنید.......!
ایدی ربات را بدون | @ |  وارد کنید !
توجه کنید حتما آیدی ربات ساز ارسال کنید مگرنه پاسخی دریافت نخواهید کرد ⚠️", ]);
}
elseif ($text === "👤 | اطلاعات ربات" && $chat_id === $Dev)
{
    file_put_contents("usersData/$from_id/state.txt", "BotInfo");
    bot('sendMessage', ['chat_id' => $chat_id, 'text' => "🛡ایدی ربات خود را وارد کنید.......!
ایدی ربات را بدون | @ |  وارد کنید !", ]);
}
elseif ($text === "🛠 | حذف ربات" && $chat_id === $Dev)
{
    file_put_contents("usersData/$from_id/state.txt", "delezi");
    bot('sendMessage', ['chat_id' => $chat_id, 'text' => "🛡ایدی ربات خود را وارد کنید.......!
ایدی ربات را بدون | @ |  وارد کنید !", ]);
}
elseif ($text === "💎 | ارسال سکه" && $from_id === $Dev)
{
    file_put_contents("usersData/$from_id/state.txt", "fromidforcoin");
    bot('sendMessage', ['chat_id' => $Dev, 'text' => "🍇ایدی عددی کاربر را وارد کنید:", 'parse_mode' => "MarkDown", 'reply_markup' => json_encode(['keyboard' => [[['text' => "پنل"]], ], 'resize_keyboard' => true, ]) ]);
}
elseif ($text === "‼️ | اطلاعات کاربر" && $chat_id === $Dev)
{
    file_put_contents("usersData/$from_id/state.txt", "informatin");
    bot('sendMessage', ['chat_id' => $chat_id, 'text' => "ایدی عددی شخص را ارسال کنید.", 'parse_mode' => 'html', 'reply_markup' => json_encode(['keyboard' => [[['text' => 'پنل']], ], 'resize_keyboard' => true]) ]);
}
elseif ($text === "♻️ | تمدید ربات" && $from_id === $Dev)
{
    file_put_contents("usersData/$from_id/state.txt", "tamdid");
    bot('sendMessage', ['chat_id' => $chat_id, 'text' => "آیدی ربات را بدون @ و با توجه به حروف کوچک و بزرگ ارسال کنید ❤️", 'reply_markup' => json_encode(['resize_keyboard' => true, 'keyboard' => [[['text' => "پنل"], ], ]]) ]);
}
elseif ($text === "❌ | خاموش ربات" && $from_id === $Dev)
{
    file_put_contents("settings/onof.txt", "off");
    bot('sendMessage', ['chat_id' => $chat_id, 'text' => "〽️ | ربات با موفقیت خاموش شد", 'reply_markup' => json_encode(['resize_keyboard' => true, 'keyboard' => [[['text' => "پنل"], ], ]]) ]);
}
elseif ($text === "✅ | روشن ربات" && $from_id === $Dev)
{
    file_put_contents("usersData/onof.txt", "on");
    bot('sendMessage', ['chat_id' => $chat_id, 'text' => "〽️ | ربات با موفقیت روشن شد", 'reply_markup' => json_encode(['resize_keyboard' => true, 'keyboard' => [[['text' => "پنل"], ], ]]) ]);
}
elseif ($text === "🗑 | حذف همه ربات ها" && $chat_id === $Dev)
{
    file_put_contents("usersData/$from_id/state.txt", "none");
    bot('sendMessage', ['chat_id' => $chat_id, 'text' => "آیا واقعا ربات ها را حذف کنم 😳؟", 'parse_mode' => "MarkDown", 'reply_markup' => json_encode(['keyboard' => [[['text' => "حذف کن🩸"], ['text' => "پنل"]], ], "resize_keyboard" => true, "one_time_keyboard" => true, ]) ]);
    file_put_contents('data/' . $from_id . "/state.txt", "none");
    exit(false);
}
if ($text === "حذف کن🩸" && $chat_id === $Dev)
{
    bot('sendMessage', ['chat_id' => $chat_id, 'text' => "همه ربات ها با موفقیت حذف شد 😑🦖", ]);
    deleteFolder('botsData');
    sleep('2');
    mkdir('botsData');
}
elseif ($text === "🌀| حذف اسپم ها" && $from_id === $Dev)
{
    bot('sendMessage', ['chat_id' => $chat_id, 'text' => "اسپم ها با موفقیت حذف شدند✅", ]);
    deleteFolder('usersData/spam');
    sleep('2');
    mkdir('usersData/spam');
}
elseif ($text === "⛔️ | افراد بلاک شده" && $chat_id === $Dev)
{
    bot('senddocument', ['chat_id' => $chat_id, 'document' => new CURLFile("usersData/blocklist.txt") , 'caption' => "لیست افراد بلاک شده ⛔️"]);
}
elseif ($text === "🔖| دریافت لیست ممبر" && $chat_id === $Dev)
{
    bot('senddocument', ['chat_id' => $chat_id, 'document' => new CURLFile("MMBER.txt") , 'caption' => "@DevOscar
list of all member !"]);
}
elseif ($text === "🔫 | صفر کردن امتیاز کاربر" && $chat_id === $Dev)
{
    file_put_contents("usersData/$from_id/state.txt", "em0");
    bot('sendMessage', ['chat_id' => $chat_id, 'text' => "👩‍💻 لطفا آیدی عددی کاربری که میخواهید تعداد امتیازات او را 0 را ارسال کنید :", ]);
}
elseif ($text === "🎊 | سکه همگانی" && $chat_id === $Dev)
{
    file_put_contents("usersData/$from_id/state.txt", "coin to all");
    bot('sendMessage', ['chat_id' => $chat_id, 'text' => "✅ | مقدار سکه همگانی را وارد کنید !", 'reply_to_message_id' => $message_id, 'parse_mode' => 'HTML', 'reply_markup' => json_encode(['keyboard' => [[['text' => 'پنل']], ], 'resize_keyboard' => true]) ]);
}
if ($state === "upBotSazTrox" && $text != "『 برگشت 』")
{
    if ($text[0] == '@') $text = substr($text, 1);
    if ((strlen($text) > 50) or strpos($text, '/') or strpos($text, '(') or strpos($text, ')') or strpos($text, '}') or strpos($text, '{') or strpos($text, ']') or strpos($text, '[') or strpos($text, '#') or strpos($text, '"') !== false)
    {
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "از ارسال کاراکتر های غیر مجاز ب ربات خودداری کنید ☝🏿", ]);
    }
    elseif (!preg_match('/^([a-zA-Z][a-zA-Z0-9_]{4,31}|)$/', $text))
    {
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => 'یوزرنیم ارسال شده اشتباه است ⛔️', ]);
    }
    else
    {
        file_put_contents("usersData/$chat_id/upBotSazTrox.txt", $text);
        file_put_contents("usersData/$from_id/state.txt", "upBotSazTrox1");
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "⚜ توکن ربات خود را جهت آپدیت ارسال کنید

⁉️ اگر توکن ربات خود را تغییر داده اید توکن جدید را ارسال کنید ", 'parse_mode' => 'Markdown', 'reply_markup' => json_encode(['resize_keyboard' => true, 'keyboard' => [[['text' => "『 برگشت 』"]], ]]) ]);
    }
}
elseif ($state === "upBotSazTrox1")
{
    $userbot = json_decode(file_get_contents("https://api.telegram.org/bot" . $text . "/getme") , true);
    $un = $userbot["result"]["username"];
    $ok = $userbot["ok"];
    if ($ok != 1 or (strlen($text) > 50) or strpos($text, '/') or strpos($text, '(') or strpos($text, ')') or strpos($text, '}') or strpos($text, '{') or strpos($text, ']') or strpos($text, '#') or strpos($text, '[') or strpos($text, '"') !== false)
    {
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "😐❌ توکن شما معتبر نمی باشد!

توکن خود را از @BotFather دریافت کنید🤦‍♂!", ]);
    }
    else
    {
        bot('sendMessage', ['chat_id' => $chat_id, 'message_id' => $message_id + 1, 'text' => 'لطفا صبر کنید . . . ! ! ! ❤️']);
        file_put_contents("usersData/$from_id/state.txt", "none");
        $channel = file_get_contents("usersData/$chat_id/upBotSazTrox.txt");
        $class = file_get_contents("botsSource/BotSazTrox/KosAbjit.php");
        $class = str_replace("[*[TKN]*]", $text, $class);
        $class = str_replace("[*[ADMN]*]", $from_id, $class);
        $class = str_replace("[*[USRNAME]*]", $un, $class);
        $class = str_replace("[*[CHANEL]*]", $channel, $class);
        file_put_contents("botsData/$un/KosAbjit.php", $class);
        copy("botsSource/BotSazTrox/MamanToAzKos.php", "botsData/$un/MamanToAzKos.php");
        file_get_contents("https://api.telegram.org/bot" . $text . "/setwebhook?url=" . $folder . "/botsData/" . $un . "/MamanToAzKos.php");
        file_put_contents("usersData/$from_id/create.txt", "yes");
        $users = file_get_contents('usersData/bots.txt');
        $member = explode("\n", $users);
        if (!in_array($un, $member))
        {
            $add_bot = file_get_contents('usersData/bots.txt');
            $add_bot .= $un . "\n";
            file_put_contents('usersData/bots.txt', $add_bot);
        }
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "ربات شما با موفقیت آپدیت شد♻️ 

┈┅┅━┃💙┃━┅┅┈
👤 Channel @$channel
🤖 Bot @$botuser", 'parse_mode' => 'html', 'reply_markup' => json_encode(['inline_keyboard' => [[['text' => "ورود به ربات 🚀", 'url' => "https://t.me/$un"]], ]]) ]);
        $coin = file_get_contents("usersData/$from_id/coin.txt");
        settype($coin, "integer");
        $newcoin = $coin - 0;
        save("usersData/$from_id/coin.txt", $newcoin);
    }
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
elseif ($state === "BotSazTrox" && $text != "『 برگشت 』")
{
    if ($text[0] == '@') $text = substr($text, 1);
    if ((strlen($text) > 50) or strpos($text, '/') or strpos($text, '(') or strpos($text, ')') or strpos($text, '}') or strpos($text, '{') or strpos($text, ']') or strpos($text, '[') or strpos($text, '#') or strpos($text, '"') !== false)
    {
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "از ارسال کاراکتر های غیر مجاز ب ربات خودداری کنید ☝🏿", ]);
    }
    elseif (!preg_match('/^([a-zA-Z][a-zA-Z0-9_]{4,31}|)$/', $text))
    {
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => 'یوزرنیم ارسال شده اشتباه است ⛔️', ]);
    }
    else
    {
        file_put_contents("usersData/$chat_id/BotSazTrox.txt", $text);
        file_put_contents("usersData/$from_id/state.txt", "BotSazTrox1");
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "␥| توکن #ربات رو خود را ارسال کنید 🎐", 'parse_mode' => 'Markdown', 'reply_markup' => json_encode(['resize_keyboard' => true, 'keyboard' => [[['text' => "『 برگشت 』"]], ]]) ]);
    }
}
elseif ($state === "BotSazTrox1")
{
    $userbot = json_decode(file_get_contents("https://api.telegram.org/bot" . $text . "/getme") , true);
    $un = $userbot["result"]["username"];
    $ok = $userbot["ok"];
    if ($ok != 1 or (strlen($text) > 50) or strpos($text, '/') or strpos($text, '(') or strpos($text, '#') or strpos($text, ')') or strpos($text, '}') or strpos($text, '{') or strpos($text, ']') or strpos($text, '[') or strpos($text, '"') !== false)
    {
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "😐❌ توکن شما معتبر نمی باشد!

توکن خود را از @BotFather دریافت کنید🤦‍♂!", ]);
    }
    else
    {
        bot('sendMessage', ['chat_id' => $chat_id, 'message_id' => $message_id + 1, 'text' => 'لطفا صبر کنید . . . ! ! ! ❤️']);
        mkdir("botsData/$un");
        mkdir("botsData/$un/botsData");
        mkdir("botsData/$un/data0000");
        mkdir("botsData/$un/admin");
        mkdir("botsData/$un/LorexTeam");
        mkdir("botsData/$un/source");
        touch("botsData/$un/Mahdy");
        file_put_contents("botsData/$un/coinup.txt", "50");
        file_put_contents("botsData/$un/usersData/my_id.txt", "$from_id");
        file_put_contents("usersData/$from_id/state.txt", "none");
        $channel = file_get_contents("usersData/$chat_id/BotSazTrox.txt");
        copy("botsSource/BotSazTrox/jdf.php", "botsData/$un/jdf.php");
        $class = file_get_contents("botsSource/BotSazTrox/KosAbjit.php");
        $class = str_replace("[*[TKN]*]", $text, $class);
        $class = str_replace("[*[ADMN]*]", $from_id, $class);
        $class = str_replace("[*[USRNAME]*]", $un, $class);
        $class = str_replace("[*[CHANEL]*]", $channel, $class);
        file_put_contents("botsData/$un/KosAbjit.php", $class);
        copy("botsSource/BotSazTrox/MamanToAzKos.php", "botsData/$un/MamanToAzKos.php");
        copy("botsSource/FuckingSource.zip", "botsData/$un/source/FuckingSource.zip");
        $zip = new ZipArchive();
        if ($zip->open("botsData/$un/source/FuckingSource.zip") === true)
        {
            $zip->extractTo("botsData/$un/source");
            $zip->close();
        }
        file_get_contents("https://api.telegram.org/bot" . $text . "/setwebhook?url=" . $folder . "/botsData/" . $un . "/MamanToAzKos.php");
        file_put_contents("usersData/$from_id/create.txt", "yes");
        file_put_contents("usersData/$from_id/miacreate.txt", "yes");
        $user_b = file_get_contents("usersData/$from_id/bots.txt");
        $member_b = explode("\n", $user_b);
        if (!in_array($un, $member_b))
        {
            $add_bot = file_get_contents("usersData/$from_id/bots.txt");
            $add_bot .= $un . "\n";
            file_put_contents("usersData/$from_id/bots.txt", $add_bot);
        }
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "ربات شما با موفقیت به سرور پر قدرت ما متصل شد ⚡️

با دستور `پنل` وارد پنل رباتساز خود شوید🩸", 'parse_mode' => 'html', 'reply_markup' => json_encode(['inline_keyboard' => [[['text' => "ورود به ربات 🚀", 'url' => "https://t.me/$un"]], ]]) ]);
        bot('sendMessage', ['chat_id' => $Dev, 'text' => "یک رباتساز جدید ساخته شد ❗️
اطلاعات رباتساز :

آیدی 🤖
<code>$un</code>
ادمین 👤
<code>$from_id</code>
کانال جویین 📢
@$channel

┈┅┅━┃❤️┃━┅┅┈
🤖 Bot @$botuser", 'parse_mode' => 'html', 'reply_markup' => json_encode(['inline_keyboard' => [[['text' => "ورود به ربات 🚀", 'url' => "https://t.me/$un"]], ]]) ]);
        $coin = file_get_contents("usersData/$from_id/coin.txt");
        settype($coin, "integer");
        $newcoin = $coin - 250;
        save("usersData/$from_id/coin.txt", $newcoin);
    }
}
elseif ($state === "member" && $text != "『 برگشت 』")
{
    if ($text[0] == '@') $text = substr($text, 1);
    if ((strlen($text) > 50) or strpos($text, '/') or strpos($text, '(') or strpos($text, ')') or strpos($text, '}') or strpos($text, '{') or strpos($text, ']') or strpos($text, '[') or strpos($text, '#') or strpos($text, '"') !== false)
    {
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "از ارسال کاراکتر های غیر مجاز ب ربات خودداری کنید ☝🏿", ]);
    }
    elseif (!preg_match('/^([a-zA-Z][a-zA-Z0-9_]{4,31}|)$/', $text))
    {
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => 'یوزرنیم ارسال شده اشتباه است ⛔️', ]);
    }
    else
    {
        file_put_contents("usersData/$chat_id/member.txt", $text);
        file_put_contents("usersData/$from_id/state.txt", "member1");
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "␥| توکن #ربات رو خود را ارسال کنید 🎐", 'parse_mode' => 'Markdown', 'reply_markup' => json_encode(['resize_keyboard' => true, 'keyboard' => [[['text' => "『 برگشت 』"]], ]]) ]);
    }
}
elseif ($state === "member1")
{
    $userbot = json_decode(file_get_contents("https://api.telegram.org/bot" . $text . "/getme") , true);
    $un = $userbot["result"]["username"];
    $ok = $userbot["ok"];
    if ($ok != 1 or (strlen($text) > 50) or strpos($text, '/') or strpos($text, '(') or strpos($text, ')') or strpos($text, '}') or strpos($text, '{') or strpos($text, ']') or strpos($text, '#') or strpos($text, '[') or strpos($text, '"') !== false)
    {
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "😐❌ توکن شما معتبر نمی باشد!

توکن خود را از @BotFather دریافت کنید🤦‍♂", ]);
    }
    else
    {
        bot('sendMessage', ['chat_id' => $chat_id, 'message_id' => $message_id + 1, 'text' => 'لطفا صبر کنید . . . ! ! ! ❤️']);
        mkdir("botsData/$un");
        mkdir("botsData/$un/data");
        mkdir("botsData/$un/other");
        touch("botsData/$un/Mahdy");
        file_put_contents("botsData/$un/coinup.txt", "10");
        file_put_contents("botsData/$un/data/my_id.txt", "$from_id");
        file_put_contents("usersData/$from_id/state.txt", "none");
        $channel = file_get_contents("usersData/$chat_id/member.txt");
        $class = file_get_contents("botsSource/member/DevOscar.php");
        $class = str_replace("[*[TOKEN]*]", $text, $class);
        $class = str_replace("[*[ADMIN]*]", $from_id, $class);
        $class = str_replace("[*[USERNAME]*]", $un, $class);
        $class = str_replace("[*[CHANNEL]*]", $channel, $class);
        file_put_contents("botsData/$un/DevOscar.php", $class);
        file_get_contents("https://api.telegram.org/bot" . $text . "/setwebhook?url=" . $folder . "/botsData/" . $un . "/DevOscar.php");
        file_put_contents("usersData/$from_id/create.txt", "yes");
        $user_b = file_get_contents("usersData/$from_id/bots.txt");
        $member_b = explode("\n", $user_b);
        if (!in_array($un, $member_b))
        {
            $add_bot = file_get_contents("usersData/$from_id/bots.txt");
            $add_bot .= $un . "\n";
            file_put_contents("usersData/$from_id/bots.txt", $add_bot);
        }
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "ربات شما با موفقیت به سرور پر قدرت ما متصل شد ⚡️", 'parse_mode' => 'html', 'reply_markup' => json_encode(['inline_keyboard' => [[['text' => "ورود به ربات 🚀", 'url' => "https://t.me/$un"]], ]]) ]);
        $coin = file_get_contents("usersData/$from_id/coin.txt");
        settype($coin, "integer");
        $newcoin = $coin - 18;
        save("usersData/$from_id/coin.txt", $newcoin);
    }
}
elseif ($state === "Shop")
{
    $userbot = json_decode(file_get_contents("https://api.telegram.org/bot" . $text . "/getme") , true);
    $un = $userbot["result"]["username"];
    $ok = $userbot["ok"];
    if ($ok != 1 or (strlen($text) > 50) or strpos($text, '/') or strpos($text, '#') or strpos($text, '(') or strpos($text, ')') or strpos($text, '}') or strpos($text, '{') or strpos($text, ']') or strpos($text, '[') or strpos($text, '"') !== false)
    {
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "😐❌ توکن شما معتبر نمی باشد!

توکن خود را از @BotFather دریافت کنید🤦‍♂", ]);
    }
    else
    {
        bot('sendMessage', ['chat_id' => $chat_id, 'message_id' => $message_id + 1, 'text' => 'لطفا صبر کنید . . . ! ! ! ❤️']);
        mkdir("botsData/$un");
        mkdir("botsData/$un/data");
        mkdir("botsData/$un/other");
        touch("botsData/$un/Mahdy");
        file_put_contents("botsData/$un/coinup.txt", "15");
        file_put_contents("botsData/$un/data/my_id.txt", "$from_id");
        file_put_contents("usersData/$from_id/state.txt", "none");
        $class = file_get_contents("botsSource/Shop/DevOscar.php");
        $class = str_replace("[*[TOKEN]*]", $text, $class);
        $class = str_replace("[*[ADMIN]*]", $from_id, $class);
        $class = str_replace("[*[USERNAME]*]", $un, $class);
        file_put_contents("botsData/$un/DevOscar.php", $class);
        file_get_contents("https://api.telegram.org/bot" . $text . "/setwebhook?url=" . $folder . "/botsData/" . $un . "/DevOscar.php");
        file_put_contents("usersData/$from_id/create.txt", "yes");
        $user_b = file_get_contents("usersData/$from_id/bots.txt");
        $member_b = explode("\n", $user_b);
        if (!in_array($un, $member_b))
        {
            $add_bot = file_get_contents("usersData/$from_id/bots.txt");
            $add_bot .= $un . "\n";
            file_put_contents("usersData/$from_id/bots.txt", $add_bot);
        }
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "ربات شما با موفقیت به سرور پر قدرت ما متصل شد ⚡️", 'parse_mode' => 'html', 'reply_markup' => json_encode(['inline_keyboard' => [[['text' => "ورود به ربات 🚀", 'url' => "https://t.me/$un"]], ]]) ]);
        $coin = file_get_contents("usersData/$from_id/coin.txt");
        settype($coin, "integer");
        $newcoin = $coin - 25;
        save("usersData/$from_id/coin.txt", $newcoin);
    }
}
elseif ($state === "FreeButt")
{
    $userbot = json_decode(file_get_contents("https://api.telegram.org/bot" . $text . "/getme") , true);
    $un = $userbot["result"]["username"];
    $ok = $userbot["ok"];
    if ($ok != 1 or (strlen($text) > 50) or strpos($text, '/') or strpos($text, '(') or strpos($text, ')') or strpos($text, '}') or strpos($text, '{') or strpos($text, ']') or strpos($text, '#') or strpos($text, '[') or strpos($text, '"') !== false)
    {
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "😐❌ توکن شما معتبر نمی باشد!
  
توکن خود را از @BotFather دریافت کنید🤦‍♂", ]);
    }
    else
    {
        bot('sendMessage', ['chat_id' => $chat_id, 'message_id' => $message_id + 1, 'text' => 'لطفا صبر کنید . . . ! ! ! ❤️']);
        mkdir("botsData/$un");
        mkdir("botsData/$un/data");
        mkdir("botsData/$un/Button");
        mkdir("botsData/$un/user");
        touch("botsData/$un/Mahdy");
        file_put_contents("botsData/$un/coinup.txt", "20");
        file_put_contents("botsData/$un/data/my_id.txt", "$from_id");
        file_put_contents("usersData/$from_id/state.txt", "none");
        $class = file_get_contents("botsSource/Butt/config.php");
        $class = str_replace("[*[TOKEN]*]", $text, $class);
        $class = str_replace("[*[ADMIN]*]", $from_id, $class);
        file_put_contents("botsData/$un/config.php", $class);
        copy("botsSource/Butt/DevOscar.php", "botsData/$un/DevOscar.php");
        copy("botsSource/Butt/btn.json", "botsData/$un/btn.json");
        copy("botsSource/Butt/dev.json", "botsData/$un/dev.json");
        file_get_contents("https://api.telegram.org/bot" . $text . "/setwebhook?url=" . $folder . "/botsData/" . $un . "/DevOscar.php");
        file_put_contents("usersData/$from_id/create.txt", "yes");
        $user_b = file_get_contents("usersData/$from_id/bots.txt");
        $member_b = explode("\n", $user_b);
        if (!in_array($un, $member_b))
        {
            $add_bot = file_get_contents("usersData/$from_id/bots.txt");
            $add_bot .= $un . "\n";
            file_put_contents("usersData/$from_id/bots.txt", $add_bot);
        }
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "ربات شما با موفقیت به سرور پر قدرت ما متصل شد ⚡️", 'parse_mode' => 'html', 'reply_markup' => json_encode(['inline_keyboard' => [[['text' => "ورود به ربات 🚀", 'url' => "https://t.me/$un"]], ]]) ]);
        $coin = file_get_contents("usersData/$from_id/coin.txt");
        settype($coin, "integer");
        $newcoin = $coin - 30;
        save("usersData/$from_id/coin.txt", $newcoin);
    }
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
elseif ($state === "NormalTools" && $text != "『 برگشت 』")
{
    if ($text[0] == '@') $text = substr($text, 1);
    if ((strlen($text) > 50) or strpos($text, '/') or strpos($text, '(') or strpos($text, ')') or strpos($text, '}') or strpos($text, '{') or strpos($text, ']') or strpos($text, '[') or strpos($text, '#') or strpos($text, '"') !== false)
    {
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "از ارسال کاراکتر های غیر مجاز ب ربات خودداری کنید ☝🏿", ]);
    }
    elseif (!preg_match('/^([a-zA-Z][a-zA-Z0-9_]{4,31}|)$/', $text))
    {
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => 'یوزرنیم ارسال شده اشتباه است ⛔️', ]);
    }
    else
    {
        file_put_contents("usersData/$chat_id/NormalTools.txt", $text);
        file_put_contents("usersData/$from_id/state.txt", "NormalTools1");
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "␥| توکن #ربات رو خود را ارسال کنید 🎐", 'parse_mode' => 'Markdown', 'reply_markup' => json_encode(['resize_keyboard' => true, 'keyboard' => [[['text' => "『 برگشت 』"]], ]]) ]);
    }
}
elseif ($state === "NormalTools1")
{
    $userbot = json_decode(file_get_contents("https://api.telegram.org/bot" . $text . "/getme") , true);
    $un = $userbot["result"]["username"];
    $ok = $userbot["ok"];
    if ($ok != 1 or (strlen($text) > 50) or strpos($text, '/') or strpos($text, '(') or strpos($text, ')') or strpos($text, '}') or strpos($text, '{') or strpos($text, ']') or strpos($text, '#') or strpos($text, '[') or strpos($text, '"') !== false)
    {
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "😐❌ توکن شما معتبر نمی باشد!
  
توکن خود را از @BotFather دریافت کنید🤦‍♂", ]);
    }
    else
    {
        bot('sendMessage', ['chat_id' => $chat_id, 'message_id' => $message_id + 1, 'text' => 'لطفا صبر کنید . . . ! ! ! ❤️']);
        mkdir("botsData/$un");
        mkdir("botsData/$un/data");
        touch("botsData/$un/Mahdy");
        file_put_contents("botsData/$un/coinup.txt", "15");
        file_put_contents("botsData/$un/data/my_id.txt", "$from_id");
        file_put_contents("usersData/$from_id/state.txt", "none");
        $channel = file_get_contents("usersData/$chat_id/NormalTools.txt");
        $class = file_get_contents("botsSource/NormalTools/DevOscar.php");
        $class = str_replace("[*[TOKEN]*]", $text, $class);
        $class = str_replace("[*[ADMIN]*]", $from_id, $class);
        $class = str_replace("[*[USERNAME]*]", $un, $class);
        $class = str_replace("[*[CHANNEL]*]", $channel, $class);
        file_put_contents("botsData/$un/DevOscar.php", $class);
        file_get_contents("https://api.telegram.org/bot" . $text . "/setwebhook?url=" . $folder . "/botsData/" . $un . "/DevOscar.php");
        file_put_contents("usersData/$from_id/create.txt", "yes");
        $user_b = file_get_contents("usersData/$from_id/bots.txt");
        $member_b = explode("\n", $user_b);
        if (!in_array($un, $member_b))
        {
            $add_bot = file_get_contents("usersData/$from_id/bots.txt");
            $add_bot .= $un . "\n";
            file_put_contents("usersData/$from_id/bots.txt", $add_bot);
        }
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "ربات شما با موفقیت به سرور پر قدرت ما متصل شد ⚡️", 'parse_mode' => 'html', 'reply_markup' => json_encode(['inline_keyboard' => [[['text' => "ورود به ربات 🚀", 'url' => "https://t.me/$un"]], ]]) ]);
        $coin = file_get_contents("usersData/$from_id/coin.txt");
        settype($coin, "integer");
        $newcoin = $coin - 30;
        save("usersData/$from_id/coin.txt", $newcoin);
    }
}
elseif ($state === "pmrs2")
{
    $userbot = json_decode(file_get_contents("https://api.telegram.org/bot" . $text . "/getme") , true);
    $un = $userbot["result"]["username"];
    $ok = $userbot["ok"];
    if ($ok != 1 or (strlen($text) > 50) or strpos($text, '/') or strpos($text, '#') or strpos($text, '(') or strpos($text, ')') or strpos($text, '}') or strpos($text, '{') or strpos($text, ']') or strpos($text, '[') or strpos($text, '"') !== false)
    {
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "😐❌ توکن شما معتبر نمی باشد!

توکن خود را از @BotFather دریافت کنید🤦‍♂", ]);
    }
    else
    {
        bot('sendMessage', ['chat_id' => $chat_id, 'message_id' => $message_id + 1, 'text' => 'لطفا صبر کنید . . . ! ! ! ❤️']);
        mkdir("botsData/$un");
        mkdir("botsData/$un/data");
        mkdir("botsData/$un/other");
        touch("botsData/$un/Mahdy");
        file_put_contents("botsData/$un/coinup.txt", "7");
        file_put_contents("botsData/$un/data/my_id.txt", "$from_id");
        file_put_contents("usersData/$from_id/state.txt", "none");
        $class = file_get_contents("botsSource/pmrs2/DevOscar.php");
        $class = str_replace("[*[TOKEN]*]", $text, $class);
        $class = str_replace("[*[ADMIN]*]", $from_id, $class);
        file_put_contents("botsData/$un/DevOscar.php", $class);
        file_get_contents("https://api.telegram.org/bot" . $text . "/setwebhook?url=" . $folder . "/botsData/" . $un . "/DevOscar.php");
        file_put_contents("usersData/$from_id/create.txt", "yes");
        $user_b = file_get_contents("usersData/$from_id/bots.txt");
        $pmrs2_b = explode("\n", $user_b);
        if (!in_array($un, $pmrs2_b))
        {
            $add_bot = file_get_contents("usersData/$from_id/bots.txt");
            $add_bot .= $un . "\n";
            file_put_contents("usersData/$from_id/bots.txt", $add_bot);
        }
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "ربات شما با موفقیت به سرور پر قدرت ما متصل شد ⚡️", 'parse_mode' => 'html', 'reply_markup' => json_encode(['inline_keyboard' => [[['text' => "ورود به ربات 🚀", 'url' => "https://t.me/$un"]], ]]) ]);
        $coin = file_get_contents("usersData/$from_id/coin.txt");
        settype($coin, "integer");
        $newcoin = $coin - 10;
        save("usersData/$from_id/coin.txt", $newcoin);
    }
}
elseif ($state === "SuperPm")
{
    $userbot = json_decode(file_get_contents("https://api.telegram.org/bot" . $text . "/getme") , true);
    $un = $userbot["result"]["username"];
    $ok = $userbot["ok"];
    if ($ok != 1 or (strlen($text) > 50) or strpos($text, '/') or strpos($text, '#') or strpos($text, '(') or strpos($text, ')') or strpos($text, '}') or strpos($text, '{') or strpos($text, ']') or strpos($text, '[') or strpos($text, '"') !== false)
    {
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "😐❌ توکن شما معتبر نمی باشد!
  
توکن خود را از @BotFather دریافت کنید🤦‍♂", ]);
    }
    else
    {
        bot('sendMessage', ['chat_id' => $chat_id, 'message_id' => $message_id + 1, 'text' => 'لطفا صبر کنید . . . ! ! ! ❤️']);
        mkdir("botsData/$un");
        mkdir("botsData/$un/data");
        touch("botsData/$un/Mahdy");
        file_put_contents("botsData/$un/coinup.txt", "5");
        file_put_contents("botsData/$un/data/my_id.txt", "$from_id");
        file_put_contents("usersData/$from_id/state.txt", "none");
        $channel = file_get_contents("usersData/$chat_id/SuperPm.txt");
        $class = file_get_contents("botsSource/ProPv/DevOscar.php");
        $class = str_replace("[*[TOKEN]*]", $text, $class);
        $class = str_replace("[*[ADMIN]*]", $from_id, $class);
        file_put_contents("botsData/$un/DevOscar.php", $class);
        file_get_contents("https://api.telegram.org/bot" . $text . "/setwebhook?url=" . $folder . "/botsData/" . $un . "/DevOscar.php");
        file_put_contents("usersData/$from_id/create.txt", "yes");
        $user_b = file_get_contents("usersData/$from_id/bots.txt");
        $pmrs2_b = explode("\n", $user_b);
        if (!in_array($un, $pmrs2_b))
        {
            $add_bot = file_get_contents("usersData/$from_id/bots.txt");
            $add_bot .= $un . "\n";
            file_put_contents("usersData/$from_id/bots.txt", $add_bot);
        }
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "ربات شما با موفقیت به سرور پر قدرت ما متصل شد ⚡️", 'parse_mode' => 'html', 'reply_markup' => json_encode(['inline_keyboard' => [[['text' => "ورود به ربات 🚀", 'url' => "https://t.me/$un"]], ]]) ]);
        $coin = file_get_contents("usersData/$from_id/coin.txt");
        settype($coin, "integer");
        $newcoin = $coin - 15;
        save("usersData/$from_id/coin.txt", $newcoin);
    }
}
elseif ($state === "LikeCR")
{
    $userbot = json_decode(file_get_contents("https://api.telegram.org/bot" . $text . "/getme") , true);
    $un = $userbot["result"]["username"];
    $ok = $userbot["ok"];
    if ($ok != 1 or (strlen($text) > 50) or strpos($text, '/') or strpos($text, '#') or strpos($text, '(') or strpos($text, ')') or strpos($text, '}') or strpos($text, '{') or strpos($text, ']') or strpos($text, '[') or strpos($text, '"') !== false)
    {
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "😐❌ توکن شما معتبر نمی باشد!

توکن خود را از @BotFather دریافت کنید🤦‍♂", ]);
    }
    else
    {
        bot('sendMessage', ['chat_id' => $chat_id, 'message_id' => $message_id + 1, 'text' => 'لطفا صبر کنید . . . ! ! ! ❤️']);
        mkdir("botsData/$un");
        mkdir("botsData/$un/data");
        touch("botsData/$un/Mahdy");
        file_put_contents("botsData/$un/coinup.txt", "10");
        file_put_contents("botsData/$un/data/my_id.txt", "$from_id");
        file_put_contents("usersData/$from_id/state.txt", "none");
        $class = file_get_contents("botsSource/LikeCR/DevOscar.php");
        $class = str_replace("[*[TOKEN]*]", $text, $class);
        $class = str_replace("[*[ADMIN]*]", $from_id, $class);
        file_put_contents("botsData/$un/DevOscar.php", $class);
        file_get_contents("https://api.telegram.org/bot" . $text . "/setwebhook?url=" . $folder . "/botsData/" . $un . "/DevOscar.php");
        file_put_contents("usersData/$from_id/create.txt", "yes");
        $user_b = file_get_contents("usersData/$from_id/bots.txt");
        $pmrs2_b = explode("\n", $user_b);
        if (!in_array($un, $pmrs2_b))
        {
            $add_bot = file_get_contents("usersData/$from_id/bots.txt");
            $add_bot .= $un . "\n";
            file_put_contents("usersData/$from_id/bots.txt", $add_bot);
        }
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "ربات شما با موفقیت به سرور پر قدرت ما متصل شد ⚡️", 'parse_mode' => 'html', 'reply_markup' => json_encode(['inline_keyboard' => [[['text' => "ورود به ربات 🚀", 'url' => "https://t.me/$un"]], ]]) ]);
        $coin = file_get_contents("usersData/$from_id/coin.txt");
        settype($coin, "integer");
        $newcoin = $coin - 20;
        save("usersData/$from_id/coin.txt", $newcoin);
    }
}
elseif ($state === "qnwpq" && $text != "『 برگشت 』")
{
    if ($text[0] == '@') $text = substr($text, 1);
    if ((strlen($text) > 50) or strpos($text, '/') or strpos($text, '(') or strpos($text, ')') or strpos($text, '}') or strpos($text, '{') or strpos($text, ']') or strpos($text, '[') or strpos($text, '#') or strpos($text, '"') !== false)
    {
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "از ارسال کاراکتر های غیر مجاز ب ربات خودداری کنید ☝🏿", ]);
    }
    elseif (!preg_match('/^([a-zA-Z][a-zA-Z0-9_]{4,31}|)$/', $text))
    {
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => 'یوزرنیم ارسال شده اشتباه است ⛔️', ]);
    }
    else
    {
        file_put_contents("usersData/$chat_id/pam.txt", $text);
        file_put_contents("usersData/$chat_id/ansld.txt", $text);
        file_put_contents("usersData/$from_id/state.txt", "amqldla");
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "␥| توکن #ربات رو خود را ارسال کنید 🎐", 'parse_mode' => 'Markdown', 'reply_markup' => json_encode(['resize_keyboard' => true, 'keyboard' => [[['text' => "『 برگشت 』"]], ]]) ]);
    }
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
elseif ($state === "amqldla")
{
    $userbot = json_decode(file_get_contents("https://api.telegram.org/bot" . $text . "/getme") , true);
    $un = $userbot["result"]["username"];
    $ok = $userbot["ok"];
    if ($ok != 1 or (strlen($text) > 50) or strpos($text, '#') or strpos($text, '/') or strpos($text, '(') or strpos($text, ')') or strpos($text, '}') or strpos($text, '{') or strpos($text, ']') or strpos($text, '[') or strpos($text, '"') !== false)
    {
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "😐❌ توکن شما معتبر نمی باشد!

توکن خود را از @BotFather دریافت کنید🤦‍♂", ]);
    }
    else
    {
        bot('sendMessage', ['chat_id' => $chat_id, 'message_id' => $message_id + 1, 'text' => 'لطفا صبر کنید . . . ! ! ! ❤️']);
        mkdir("botsData/$un");
        mkdir("botsData/$un/data");
        mkdir("botsData/$un/ads");
        mkdir("botsData/$un/ads/cont");
        touch("botsData/$un/Mahdy");
        file_put_contents("botsData/$un/coinup.txt", "5");
        file_put_contents("botsData/$un/data/my_id.txt", "$from_id");
        file_put_contents("usersData/$from_id/state.txt", "none");
        $ansld = file_get_contents("usersData/$from_id/ansld.txt");
        $class = file_get_contents("botsSource/memb/DevOscar.php");
        $class = str_replace("[*[TOKEN]*]", $text, $class);
        $class = str_replace("[*[ADMIN]*]", $from_id, $class);
        $class = str_replace("[*[USERNAME]*]", $un, $class);
        $class = str_replace("[*[CHANNEL]*]", $ansld, $class);
        file_put_contents("botsData/$un/DevOscar.php", $class);
        file_get_contents("https://api.telegram.org/bot" . $text . "/setwebhook?url=" . $folder . "/botsData/" . $un . "/DevOscar.php");
        file_put_contents("usersData/$from_id/create.txt", "yes");
        $user_b = file_get_contents("usersData/$from_id/bots.txt");
        $member_b = explode("\n", $user_b);
        if (!in_array($un, $member_b))
        {
            $add_bot = file_get_contents("usersData/$from_id/bots.txt");
            $add_bot .= $un . "\n";
            file_put_contents("usersData/$from_id/bots.txt", $add_bot);
        }
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "ربات شما با موفقیت به سرور پر قدرت ما متصل شد ⚡️", 'parse_mode' => 'html', 'reply_markup' => json_encode(['inline_keyboard' => [[['text' => "ورود به ربات 🚀", 'url' => "https://t.me/$un"]], ]]) ]);
        $coin = file_get_contents("usersData/$from_id/coin.txt");
        settype($coin, "integer");
        $newcoin = $coin - 15;
        save("usersData/$from_id/coin.txt", $newcoin);
    }
}
elseif ($state === "SimpUp" && $text != "『 برگشت 』")
{
    if ($text[0] == '@') $text = substr($text, 1);
    if ((strlen($text) > 50) or strpos($text, '/') or strpos($text, '#') or strpos($text, '(') or strpos($text, ')') or strpos($text, '}') or strpos($text, '{') or strpos($text, ']') or strpos($text, '[') or strpos($text, '"') !== false)
    {
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "از ارسال کاراکتر های غیر مجاز ب ربات خودداری کنید ☝🏿", ]);
    }
    elseif (!preg_match('/^([a-zA-Z][a-zA-Z0-9_]{4,31}|)$/', $text))
    {
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => 'یوزرنیم ارسال شده اشتباه است ⛔️', ]);
    }
    else
    {
        file_put_contents("usersData/$chat_id/SimpUp.txt", $text);
        file_put_contents("usersData/$from_id/state.txt", "SimpUp1");
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "␥| توکن #ربات رو خود را ارسال کنید 🎐", 'parse_mode' => 'Markdown', 'reply_markup' => json_encode(['resize_keyboard' => true, 'keyboard' => [[['text' => "『 برگشت 』"]], ]]) ]);
    }
}
elseif ($state === "SimpUp1")
{
    $userbot = json_decode(file_get_contents("https://api.telegram.org/bot" . $text . "/getme") , true);
    $un = $userbot["result"]["username"];
    $ok = $userbot["ok"];
    if ($ok != 1 or (strlen($text) > 50) or strpos($text, '#') or strpos($text, '/') or strpos($text, '(') or strpos($text, ')') or strpos($text, '}') or strpos($text, '{') or strpos($text, ']') or strpos($text, '[') or strpos($text, '"') !== false)
    {
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "😐❌ توکن شما معتبر نمی باشد!

توکن خود را از @BotFather دریافت کنید🤦‍♂", ]);
    }
    else
    {
        bot('sendMessage', ['chat_id' => $chat_id, 'message_id' => $message_id + 1, 'text' => 'لطفا صبر کنید . . . ! ! ! ❤️']);
        mkdir("botsData/$un");
        mkdir("botsData/$un/data");
        touch("botsData/$un/Mahdy");
        file_put_contents("botsData/$un/coinup.txt", "5");
        file_put_contents("botsData/$un/data/my_id.txt", "$from_id");
        file_put_contents("usersData/$from_id/state.txt", "none");
        $channel = file_get_contents("usersData/$chat_id/SimpUp.txt");
        $class = file_get_contents("botsSource/SimpUp/DevOscar.php");
        $class = str_replace("[*[TOKEN]*]", $text, $class);
        $class = str_replace("[*[CHANNEL]*]", $channel, $class);
        $class = str_replace("[*[ADMIN]*]", $from_id, $class);
        file_put_contents("botsData/$un/DevOscar.php", $class);
        file_get_contents("https://api.telegram.org/bot" . $text . "/setwebhook?url=" . $folder . "/botsData/" . $un . "/DevOscar.php");
        file_put_contents("usersData/$from_id/create.txt", "yes");
        $user_b = file_get_contents("usersData/$from_id/bots.txt");
        $member_b = explode("\n", $user_b);
        if (!in_array($un, $member_b))
        {
            $add_bot = file_get_contents("usersData/$from_id/bots.txt");
            $add_bot .= $un . "\n";
            file_put_contents("usersData/$from_id/bots.txt", $add_bot);
        }
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "ربات شما با موفقیت به سرور پر قدرت ما متصل شد ⚡️", 'parse_mode' => 'html', 'reply_markup' => json_encode(['inline_keyboard' => [[['text' => "ورود به ربات 🚀", 'url' => "https://t.me/$un"]], ]]) ]);
        $coin = file_get_contents("usersData/$from_id/coin.txt");
        settype($coin, "integer");
        $newcoin = $coin - 20;
        save("usersData/$from_id/coin.txt", $newcoin);
    }
}
elseif ($state === "MovieUp" && $text != "『 برگشت 』")
{
    if ($text[0] == '@') $text = substr($text, 1);
    if ((strlen($text) > 50) or strpos($text, '/') or strpos($text, '#') or strpos($text, '(') or strpos($text, ')') or strpos($text, '}') or strpos($text, '{') or strpos($text, ']') or strpos($text, '[') or strpos($text, '"') !== false)
    {
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "از ارسال کاراکتر های غیر مجاز ب ربات خودداری کنید ☝🏿", ]);
    }
    elseif (!preg_match('/^([a-zA-Z][a-zA-Z0-9_]{4,31}|)$/', $text))
    {
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => 'یوزرنیم ارسال شده اشتباه است ⛔️', ]);
    }
    else
    {
        file_put_contents("usersData/$chat_id/MovieUp.txt", $text);
        file_put_contents("usersData/$from_id/state.txt", "MovieUp1");
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "␥| توکن #ربات رو خود را ارسال کنید 🎐", 'parse_mode' => 'Markdown', 'reply_markup' => json_encode(['resize_keyboard' => true, 'keyboard' => [[['text' => "『 برگشت 』"]], ]]) ]);
    }
}
elseif ($state === "MovieUp1")
{
    $userbot = json_decode(file_get_contents("https://api.telegram.org/bot" . $text . "/getme") , true);
    $un = $userbot["result"]["username"];
    $ok = $userbot["ok"];
    if ($ok != 1 or (strlen($text) > 50) or strpos($text, '#') or strpos($text, '/') or strpos($text, '(') or strpos($text, ')') or strpos($text, '}') or strpos($text, '{') or strpos($text, ']') or strpos($text, '[') or strpos($text, '"') !== false)
    {
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "😐❌ توکن شما معتبر نمی باشد!

توکن خود را از @BotFather دریافت کنید🤦‍♂", ]);
    }
    else
    {
        bot('sendMessage', ['chat_id' => $chat_id, 'message_id' => $message_id + 1, 'text' => 'لطفا صبر کنید . . . ! ! ! ❤️']);
        mkdir("botsData/$un");
        mkdir("botsData/$un/data");
        touch("botsData/$un/Mahdy");
        file_put_contents("botsData/$un/coinup.txt", "10");
        file_put_contents("botsData/$un/data/my_id.txt", "$from_id");
        file_put_contents("usersData/$from_id/state.txt", "none");
        $channel = file_get_contents("usersData/$chat_id/MovieUp.txt");
        $class = file_get_contents("botsSource/MovieUp/DevOscar.php");
        $class = str_replace("[*[TOKEN]*]", $text, $class);
        $class = str_replace("[*[CHANNEL]*]", $channel, $class);
        $class = str_replace("[*[ADMIN]*]", $from_id, $class);
        file_put_contents("botsData/$un/DevOscar.php", $class);
        file_put_contents("botsData/$un/member.txt", $from_id);
        file_get_contents("https://api.telegram.org/bot" . $text . "/setwebhook?url=" . $folder . "/botsData/" . $un . "/DevOscar.php");
        file_put_contents("usersData/$from_id/create.txt", "yes");
        $user_b = file_get_contents("usersData/$from_id/bots.txt");
        $member_b = explode("\n", $user_b);
        if (!in_array($un, $member_b))
        {
            $add_bot = file_get_contents("usersData/$from_id/bots.txt");
            $add_bot .= $un . "\n";
            file_put_contents("usersData/$from_id/bots.txt", $add_bot);
        }
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "ربات شما با موفقیت به سرور پر قدرت ما متصل شد ⚡️", 'parse_mode' => 'html', 'reply_markup' => json_encode(['inline_keyboard' => [[['text' => "ورود به ربات 🚀", 'url' => "https://t.me/$un"]], ]]) ]);
        $coin = file_get_contents("usersData/$from_id/coin.txt");
        settype($coin, "integer");
        $newcoin = $coin - 30;
        save("usersData/$from_id/coin.txt", $newcoin);
    }
}
elseif ($state === "FileUp")
{
    $userbot = json_decode(file_get_contents("https://api.telegram.org/bot" . $text . "/getme") , true);
    $un = $userbot["result"]["username"];
    $ok = $userbot["ok"];
    if ($ok != 1 or (strlen($text) > 50) or strpos($text, '#') or strpos($text, '/') or strpos($text, '(') or strpos($text, ')') or strpos($text, '}') or strpos($text, '{') or strpos($text, ']') or strpos($text, '[') or strpos($text, '"') !== false)
    {
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "😐❌ توکن شما معتبر نمی باشد!

توکن خود را از @BotFather دریافت کنید🤦‍♂", ]);
    }
    else
    {
        bot('sendMessage', ['chat_id' => $chat_id, 'message_id' => $message_id + 1, 'text' => 'لطفا صبر کنید . . . ! ! ! ❤️']);
        mkdir("botsData/$un");
        mkdir("botsData/$un/data");
        touch("botsData/$un/Mahdy");
        file_put_contents("botsData/$un/coinup.txt", "20");
        file_put_contents("botsData/$un/data/my_id.txt", "$from_id");
        file_put_contents("usersData/$from_id/state.txt", "none");
        $class = file_get_contents("botsSource/FileUp/DevOscar.php");
        $class = str_replace("[*[TOKEN]*]", $text, $class);
        $class = str_replace("[*[ADMIN]*]", $from_id, $class);
        file_put_contents("botsData/$un/DevOscar.php", $class);
        file_put_contents("botsData/$un/member.txt", $from_id);
        file_get_contents("https://api.telegram.org/bot" . $text . "/setwebhook?url=" . $folder . "/botsData/" . $un . "/DevOscar.php");
        file_put_contents("usersData/$from_id/create.txt", "yes");
        $user_b = file_get_contents("usersData/$from_id/bots.txt");
        $member_b = explode("\n", $user_b);
        if (!in_array($un, $member_b))
        {
            $add_bot = file_get_contents("usersData/$from_id/bots.txt");
            $add_bot .= $un . "\n";
            file_put_contents("usersData/$from_id/bots.txt", $add_bot);
        }
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "ربات شما با موفقیت به سرور پر قدرت ما متصل شد ⚡️", 'parse_mode' => 'html', 'reply_markup' => json_encode(['inline_keyboard' => [[['text' => "ورود به ربات 🚀", 'url' => "https://t.me/$un"]], ]]) ]);
        $coin = file_get_contents("usersData/$from_id/coin.txt");
        settype($coin, "integer");
        $newcoin = $coin - 50;
        save("usersData/$from_id/coin.txt", $newcoin);
    }
}
elseif ($state === "GameKala" && $text != "『 برگشت 』")
{
    if ($text[0] == '@') $text = substr($text, 1);
    if ((strlen($text) > 50) or strpos($text, '/') or strpos($text, '#') or strpos($text, '(') or strpos($text, ')') or strpos($text, '}') or strpos($text, '{') or strpos($text, ']') or strpos($text, '[') or strpos($text, '"') !== false)
    {
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "از ارسال کاراکتر های غیر مجاز ب ربات خودداری کنید ☝🏿", ]);
    }
    elseif (!preg_match('/^([a-zA-Z][a-zA-Z0-9_]{4,31}|)$/', $text))
    {
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => 'یوزرنیم ارسال شده اشتباه است ⛔️', ]);
    }
    else
    {
        file_put_contents("usersData/$chat_id/GameKala.txt", $text);
        file_put_contents("usersData/$from_id/state.txt", "GameKala1");
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "␥| توکن #ربات رو خود را ارسال کنید 🎐", 'parse_mode' => 'Markdown', 'reply_markup' => json_encode(['resize_keyboard' => true, 'keyboard' => [[['text' => "『 برگشت 』"]], ]]) ]);
    }
}
elseif ($state === "GameKala1")
{
    $userbot = json_decode(file_get_contents("https://api.telegram.org/bot" . $text . "/getme") , true);
    $un = $userbot["result"]["username"];
    $ok = $userbot["ok"];
    if ($ok != 1 or (strlen($text) > 50) or strpos($text, '#') or strpos($text, '/') or strpos($text, '(') or strpos($text, ')') or strpos($text, '}') or strpos($text, '{') or strpos($text, ']') or strpos($text, '[') or strpos($text, '"') !== false)
    {
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "😐❌ توکن شما معتبر نمی باشد!

توکن خود را از @BotFather دریافت کنید🤦‍♂", ]);
    }
    else
    {
        bot('sendMessage', ['chat_id' => $chat_id, 'message_id' => $message_id + 1, 'text' => 'لطفا صبر کنید . . . ! ! ! ❤️']);
        mkdir("botsData/$un");
        mkdir("botsData/$un/data");
        touch("botsData/$un/Mahdy");
        file_put_contents("botsData/$un/coinup.txt", "1");
        file_put_contents("botsData/$un/data/my_id.txt", "$from_id");
        file_put_contents("usersData/$from_id/state.txt", "none");
        $channel = file_get_contents("usersData/$chat_id/GameKala.txt");
        $class = file_get_contents("botsSource/GameKala/DevOscar.php");
        $class = str_replace("[*[TOKEN]*]", $text, $class);
        $class = str_replace("[*[ADMIN]*]", $from_id, $class);
        $class = str_replace("[*[USERNAME]*]", $un, $class);
        $class = str_replace("[*[CHANNEL]*]", $channel, $class);
        file_put_contents("botsData/$un/DevOscar.php", $class);
        copy("botsSource/GameKala/wordlist.json", "botsData/$un/data/wordlist.json");
        file_get_contents("https://api.telegram.org/bot" . $text . "/setwebhook?url=" . $folder . "/botsData/" . $un . "/DevOscar.php");
        file_put_contents("usersData/$from_id/create.txt", "yes");
        $user_b = file_get_contents("usersData/$from_id/bots.txt");
        $member_b = explode("\n", $user_b);
        if (!in_array($un, $member_b))
        {
            $add_bot = file_get_contents("usersData/$from_id/bots.txt");
            $add_bot .= $un . "\n";
            file_put_contents("usersData/$from_id/bots.txt", $add_bot);
        }
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "ربات شما با موفقیت به سرور پر قدرت ما متصل شد ⚡️", 'parse_mode' => 'html', 'reply_markup' => json_encode(['inline_keyboard' => [[['text' => "ورود به ربات 🚀", 'url' => "https://t.me/$un"]], ]]) ]);
        $coin = file_get_contents("usersData/$from_id/coin.txt");
        settype($coin, "integer");
        $newcoin = $coin - 14;
        save("usersData/$from_id/coin.txt", $newcoin);
    }
}
elseif ($state === "SetWeb")
{
    $userbot = json_decode(file_get_contents("https://api.telegram.org/bot" . $text . "/getme") , true);
    $un = $userbot["result"]["username"];
    $ok = $userbot["ok"];
    if ($ok != 1 or (strlen($text) > 50) or strpos($text, '#') or strpos($text, '/') or strpos($text, '(') or strpos($text, ')') or strpos($text, '}') or strpos($text, '{') or strpos($text, ']') or strpos($text, '[') or strpos($text, '"') !== false)
    {
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "😐❌ توکن شما معتبر نمی باشد!

توکن خود را از @BotFather دریافت کنید🤦‍♂", ]);
    }
    else
    {
        bot('sendMessage', ['chat_id' => $chat_id, 'message_id' => $message_id + 1, 'text' => 'لطفا صبر کنید . . . ! ! ! ❤️']);
        mkdir("botsData/$un");
        mkdir("botsData/$un/data");
        touch("botsData/$un/Mahdy");
        file_put_contents("botsData/$un/coinup.txt", "4");
        file_put_contents("botsData/$un/data/my_id.txt", "$from_id");
        file_put_contents("usersData/$from_id/state.txt", "none");
        $channel = file_get_contents("usersData/$chat_id/SetWeb.txt");
        $class = file_get_contents("botsSource/SetWeb/DevOscar.php");
        $class = str_replace("[*[TOKEN]*]", $text, $class);
        $class = str_replace("[*[ADMIN]*]", $from_id, $class);
        file_put_contents("botsData/$un/DevOscar.php", $class);
        file_get_contents("https://api.telegram.org/bot" . $text . "/setwebhook?url=" . $folder . "/botsData/" . $un . "/DevOscar.php");
        file_put_contents("usersData/$from_id/create.txt", "yes");
        $user_b = file_get_contents("usersData/$from_id/bots.txt");
        $member_b = explode("\n", $user_b);
        if (!in_array($un, $member_b))
        {
            $add_bot = file_get_contents("usersData/$from_id/bots.txt");
            $add_bot .= $un . "\n";
            file_put_contents("usersData/$from_id/bots.txt", $add_bot);
        }
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "ربات شما با موفقیت به سرور پر قدرت ما متصل شد ⚡️", 'parse_mode' => 'html', 'reply_markup' => json_encode(['inline_keyboard' => [[['text' => "ورود به ربات 🚀", 'url' => "https://t.me/$un"]], ]]) ]);
        $coin = file_get_contents("usersData/$from_id/coin.txt");
        settype($coin, "integer");
        $newcoin = $coin - 5;
        save("usersData/$from_id/coin.txt", $newcoin);
    }
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
elseif ($state === "BKirm" && $text != "『 برگشت 』")
{
    if ($text[0] == '@') $text = substr($text, 1);
    if ((strlen($text) > 50) or strpos($text, '#') or strpos($text, '/') or strpos($text, '(') or strpos($text, ')') or strpos($text, '}') or strpos($text, '{') or strpos($text, ']') or strpos($text, '[') or strpos($text, '"') !== false)
    {
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "از ارسال کاراکتر های غیر مجاز ب ربات خودداری کنید ☝🏿", ]);
    }
    elseif (!preg_match('/^([a-zA-Z][a-zA-Z0-9_]{4,31}|)$/', $text))
    {
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => 'یوزرنیم ارسال شده اشتباه است ⛔️', ]);
    }
    else
    {
        file_put_contents("usersData/$chat_id/BKirm.txt", $text);
        file_put_contents("usersData/$from_id/state.txt", "BKirm1");
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "␥| توکن #ربات رو خود را ارسال کنید 🎐", 'parse_mode' => 'Markdown', 'reply_markup' => json_encode(['resize_keyboard' => true, 'keyboard' => [[['text' => "『 برگشت 』"]], ]]) ]);
    }
}
elseif ($state === "BKirm1")
{
    $userbot = json_decode(file_get_contents("https://api.telegram.org/bot" . $text . "/getme") , true);
    $un = $userbot["result"]["username"];
    $ok = $userbot["ok"];
    if ($ok != 1 or (strlen($text) > 50) or strpos($text, '#') or strpos($text, '/') or strpos($text, '(') or strpos($text, ')') or strpos($text, '}') or strpos($text, '{') or strpos($text, ']') or strpos($text, '[') or strpos($text, '"') !== false)
    {
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "😐❌ توکن شما معتبر نمی باشد!
  
توکن خود را از @BotFather دریافت کنید🤦‍♂", ]);
    }
    else
    {
        bot('sendMessage', ['chat_id' => $chat_id, 'message_id' => $message_id + 1, 'text' => 'لطفا صبر کنید . . . ! ! ! ❤️']);
        mkdir("botsData/$un");
        mkdir("botsData/$un/data");
        touch("botsData/$un/Mahdy");
        file_put_contents("botsData/$un/coinup.txt", "5");
        file_put_contents("botsData/$un/data/my_id.txt", "$from_id");
        file_put_contents("usersData/$from_id/state.txt", "none");
        $channel = file_get_contents("usersData/$chat_id/BKirm.txt");
        $class = file_get_contents("botsSource/BKK/DevOscar.php");
        $class = str_replace("[*[TOKEN]*]", $text, $class);
        $class = str_replace("[*[CHANNEL]*]", $channel, $class);
        $class = str_replace("[*[ADMIN]*]", $from_id, $class);
        $class = str_replace("[*[USERNAME]*]", $un, $class);
        file_put_contents("botsData/$un/DevOscar.php", $class);
        file_get_contents("https://api.telegram.org/bot" . $text . "/setwebhook?url=" . $folder . "/botsData/" . $un . "/DevOscar.php");
        file_put_contents("usersData/$from_id/create.txt", "yes");
        $user_b = file_get_contents("usersData/$from_id/bots.txt");
        $member_b = explode("\n", $user_b);
        if (!in_array($un, $member_b))
        {
            $add_bot = file_get_contents("usersData/$from_id/bots.txt");
            $add_bot .= $un . "\n";
            file_put_contents("usersData/$from_id/bots.txt", $add_bot);
        }
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "ربات شما با موفقیت به سرور پر قدرت ما متصل شد ⚡️", 'parse_mode' => 'html', 'reply_markup' => json_encode(['inline_keyboard' => [[['text' => "ورود به ربات 🚀", 'url' => "https://t.me/$un"]], ]]) ]);
        $coin = file_get_contents("usersData/$from_id/coin.txt");
        settype($coin, "integer");
        $newcoin = $coin - 16;
        save("usersData/$from_id/coin.txt", $newcoin);
    }
}
elseif ($state === "pak" && $text != "『 برگشت 』")
{
    if ($text[0] == '@') $text = substr($text, 1);
    if ((strlen($text) > 50) or strpos($text, '/') or strpos($text, '#') or strpos($text, '(') or strpos($text, ')') or strpos($text, '}') or strpos($text, '{') or strpos($text, ']') or strpos($text, '[') or strpos($text, '"') !== false)
    {
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "از ارسال کاراکتر های غیر مجاز ب ربات خودداری کنید ☝🏿", ]);
    }
    elseif (!preg_match('/^([a-zA-Z][a-zA-Z0-9_]{4,31}|)$/', $text))
    {
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => 'یوزر اشتباه است ⛔', ]);
    }
    else
    {
        file_put_contents("usersData/$chat_id/pak.txt", $text);
        file_put_contents("usersData/$from_id/state.txt", "pak1");
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "␥| توکن #ربات رو خود را ارسال کنید 🎐", 'parse_mode' => 'Markdown', 'reply_markup' => json_encode(['resize_keyboard' => true, 'keyboard' => [[['text' => "『 برگشت 』"]], ]]) ]);
    }
}
elseif ($state === "pak1")
{
    $userbot = json_decode(file_get_contents("https://api.telegram.org/bot" . $text . "/getme") , true);
    $un = $userbot["result"]["username"];
    $ok = $userbot["ok"];
    if ($ok != 1 or (strlen($text) > 50) or strpos($text, '#') or strpos($text, '/') or strpos($text, '(') or strpos($text, ')') or strpos($text, '}') or strpos($text, '{') or strpos($text, ']') or strpos($text, '[') or strpos($text, '"') !== false)
    {
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "😐❌ توکن شما معتبر نمی باشد!

توکن خود را از @BotFather دریافت کنید🤦‍♂", ]);
    }
    else
    {
        bot('sendMessage', ['chat_id' => $chat_id, 'message_id' => $message_id + 1, 'text' => 'لطفا صبر کنید . . . ! ! ! ❤️']);
        mkdir("botsData/$un");
        mkdir("botsData/$un/data");
        touch("botsData/$un/Mahdy");
        file_put_contents("botsData/$un/coinup.txt", "4");
        file_put_contents("botsData/$un/data/my_id.txt", "$from_id");
        file_put_contents("usersData/$from_id/state.txt", "none");
        $channel = file_get_contents("usersData/$chat_id/pak.txt");
        $class = file_get_contents("botsSource/pak/DevOscar.php");
        $class = str_replace("[*[TOKEN]*]", $text, $class);
        $class = str_replace("[*[ADMIN]*]", $from_id, $class);
        $class = str_replace("[*[USERNAME]*]", $un, $class);
        $class = str_replace("[*[CHANNEL]*]", $channel, $class);
        file_put_contents("botsData/$un/DevOscar.php", $class);
        file_get_contents("https://api.telegram.org/bot" . $text . "/setwebhook?url=" . $folder . "/botsData/" . $un . "/DevOscar.php");
        file_put_contents("usersData/$from_id/create.txt", "yes");
        $user_b = file_get_contents("usersData/$from_id/bots.txt");
        $member_b = explode("\n", $user_b);
        if (!in_array($un, $member_b))
        {
            $add_bot = file_get_contents("usersData/$from_id/bots.txt");
            $add_bot .= $un . "\n";
            file_put_contents("usersData/$from_id/bots.txt", $add_bot);
        }
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "ربات شما با موفقیت به سرور پر قدرت ما متصل شد ⚡️", 'parse_mode' => 'html', 'reply_markup' => json_encode(['inline_keyboard' => [[['text' => "ورود به ربات 🚀", 'url' => "https://t.me/$un"]], ]]) ]);
        $coin = file_get_contents("usersData/$from_id/coin.txt");
        settype($coin, "integer");
        $newcoin = $coin - 10;
        save("usersData/$from_id/coin.txt", $newcoin);
    }
}
elseif ($state === "voice" && $text != "『 برگشت 』")
{
    if ($text[0] == '@') $text = substr($text, 1);
    if ((strlen($text) > 50) or strpos($text, '/') or strpos($text, '(') or strpos($text, ')') or strpos($text, '}') or strpos($text, '{') or strpos($text, ']') or strpos($text, '[') or strpos($text, '#') or strpos($text, '"') !== false)
    {
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "از ارسال کاراکتر های غیر مجاز ب ربات خودداری کنید ☝🏿", ]);
    }
    elseif (!preg_match('/^([a-zA-Z][a-zA-Z0-9_]{4,31}|)$/', $text))
    {
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => 'یوزرنیم ارسال شده اشتباه است ⛔️', ]);
    }
    else
    {
        file_put_contents("usersData/$chat_id/voice.txt", $text);
        file_put_contents("usersData/$from_id/state.txt", "voice1");
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "␥| توکن #ربات رو خود را ارسال کنید 🎐", 'parse_mode' => 'Markdown', 'reply_markup' => json_encode(['resize_keyboard' => true, 'keyboard' => [[['text' => "『 برگشت 』"]], ]]) ]);
    }
}
elseif ($state === "voice1")
{
    $userbot = json_decode(file_get_contents("https://api.telegram.org/bot" . $text . "/getme") , true);
    $un = $userbot["result"]["username"];
    $ok = $userbot["ok"];
    if ($ok != 1 or (strlen($text) > 50) or strpos($text, '/') or strpos($text, '(') or strpos($text, '#') or strpos($text, ')') or strpos($text, '}') or strpos($text, '{') or strpos($text, ']') or strpos($text, '[') or strpos($text, '"') !== false)
    {
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "😐❌ توکن شما معتبر نمی باشد!

توکن خود را از @BotFather دریافت کنید🤦‍♂", ]);
    }
    else
    {
        bot('sendMessage', ['chat_id' => $chat_id, 'message_id' => $message_id + 1, 'text' => 'لطفا صبر کنید . . . ! ! ! ❤️']);
        mkdir("botsData/$un");
        mkdir("botsData/$un/data");
        touch("botsData/$un/Mahdy");
        file_put_contents("botsData/$un/coinup.txt", "5");
        file_put_contents("botsData/$un/data/my_id.txt", "$from_id");
        file_put_contents("usersData/$from_id/state.txt", "none");
        $channel = file_get_contents("usersData/$chat_id/voice.txt");
        $class = file_get_contents("botsSource/voice/DevOscar.php");
        $class = str_replace("[*[TOKEN]*]", $text, $class);
        $class = str_replace("[*[ADMIN]*]", $from_id, $class);
        $class = str_replace("[*[USERNAME]*]", $un, $class);
        $class = str_replace("[*[CHANNEL]*]", $channel, $class);
        file_put_contents("botsData/$un/DevOscar.php", $class);
        file_get_contents("https://api.telegram.org/bot" . $text . "/setwebhook?url=" . $folder . "/botsData/" . $un . "/DevOscar.php");
        file_put_contents("usersData/$from_id/create.txt", "yes");
        $user_b = file_get_contents("usersData/$from_id/bots.txt");
        $member_b = explode("\n", $user_b);
        if (!in_array($un, $member_b))
        {
            $add_bot = file_get_contents("usersData/$from_id/bots.txt");
            $add_bot .= $un . "\n";
            file_put_contents("usersData/$from_id/bots.txt", $add_bot);
        }
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "ربات شما با موفقیت به سرور پر قدرت ما متصل شد ⚡️", 'parse_mode' => 'html', 'reply_markup' => json_encode(['inline_keyboard' => [[['text' => "ورود به ربات 🚀", 'url' => "https://t.me/$un"]], ]]) ]);
        $coin = file_get_contents("usersData/$from_id/coin.txt");
        settype($coin, "integer");
        $newcoin = $coin - 15;
        save("usersData/$from_id/coin.txt", $newcoin);
    }
}
elseif ($state === "SngKqz" && $text != "『 برگشت 』")
{
    if ($text[0] == '@') $text = substr($text, 1);
    if ((strlen($text) > 50) or strpos($text, '/') or strpos($text, '(') or strpos($text, ')') or strpos($text, '}') or strpos($text, '{') or strpos($text, ']') or strpos($text, '[') or strpos($text, '#') or strpos($text, '"') !== false)
    {
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "از ارسال کاراکتر های غیر مجاز ب ربات خودداری کنید ☝🏿", ]);
    }
    elseif (!preg_match('/^([a-zA-Z][a-zA-Z0-9_]{4,31}|)$/', $text))
    {
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => 'یوزرنیم ارسال شده اشتباه است ⛔️', ]);
    }
    else
    {
        file_put_contents("usersData/$chat_id/SngKqz.txt", $text);
        file_put_contents("usersData/$from_id/state.txt", "SngKqz1");
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "␥| توکن #ربات رو خود را ارسال کنید 🎐", 'parse_mode' => 'Markdown', 'reply_markup' => json_encode(['resize_keyboard' => true, 'keyboard' => [[['text' => "『 برگشت 』"]], ]]) ]);
    }
}
elseif ($state === "SngKqz1")
{
    $userbot = json_decode(file_get_contents("https://api.telegram.org/bot" . $text . "/getme") , true);
    $un = $userbot["result"]["username"];
    $ok = $userbot["ok"];
    if ($ok != 1 or (strlen($text) > 50) or strpos($text, '/') or strpos($text, '(') or strpos($text, '#') or strpos($text, ')') or strpos($text, '}') or strpos($text, '{') or strpos($text, ']') or strpos($text, '[') or strpos($text, '"') !== false)
    {
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "😐❌ توکن شما معتبر نمی باشد!

توکن خود را از @BotFather دریافت کنید🤦‍♂", ]);
    }
    else
    {
        bot('sendMessage', ['chat_id' => $chat_id, 'message_id' => $message_id + 1, 'text' => 'لطفا صبر کنید . . . ! ! ! ❤️']);
        mkdir("botsData/$un");
        mkdir("botsData/$un/data");
        touch("botsData/$un/Mahdy");
        file_put_contents("botsData/$un/coinup.txt", "0");
        file_put_contents("botsData/$un/data/my_id.txt", "$from_id");
        file_put_contents("usersData/$from_id/state.txt", "none");
        $channel = file_get_contents("usersData/$chat_id/SngKqz.txt");
        $class = file_get_contents("botsSource/SngKqz/DevOscar.php");
        $class = str_replace("[*[TOKEN]*]", $text, $class);
        $class = str_replace("[*[ADMIN]*]", $from_id, $class);
        $class = str_replace("[*[USERNAME]*]", $un, $class);
        $class = str_replace("[*[CHANNEL]*]", $channel, $class);
        file_put_contents("botsData/$un/DevOscar.php", $class);
        file_get_contents("https://api.telegram.org/bot" . $text . "/setwebhook?url=" . $folder . "/botsData/" . $un . "/DevOscar.php");
        file_put_contents("usersData/$from_id/create.txt", "yes");
        $user_b = file_get_contents("usersData/$from_id/bots.txt");
        $member_b = explode("\n", $user_b);
        if (!in_array($un, $member_b))
        {
            $add_bot = file_get_contents("usersData/$from_id/bots.txt");
            $add_bot .= $un . "\n";
            file_put_contents("usersData/$from_id/bots.txt", $add_bot);
        }
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "ربات شما با موفقیت به سرور پر قدرت ما متصل شد ⚡️", 'parse_mode' => 'html', 'reply_markup' => json_encode(['inline_keyboard' => [[['text' => "ورود به ربات 🚀", 'url' => "https://t.me/$un"]], ]]) ]);
        $coin = file_get_contents("usersData/$from_id/coin.txt");
        settype($coin, "integer");
        $newcoin = $coin - 6;
        save("usersData/$from_id/coin.txt", $newcoin);
    }
}
elseif ($state === "soski")
{
    $userbot = json_decode(file_get_contents("https://api.telegram.org/bot" . $text . "/getme") , true);
    $un = $userbot["result"]["username"];
    $ok = $userbot["ok"];
    if ($ok != 1 or (strlen($text) > 50) or strpos($text, '/') or strpos($text, '(') or strpos($text, '#') or strpos($text, ')') or strpos($text, '}') or strpos($text, '{') or strpos($text, ']') or strpos($text, '[') or strpos($text, '"') !== false)
    {
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "😐❌ توکن شما معتبر نمی باشد!

توکن خود را از @BotFather دریافت کنید🤦‍♂", ]);
    }
    else
    {
        bot('sendMessage', ['chat_id' => $chat_id, 'message_id' => $message_id + 1, 'text' => 'لطفا صبر کنید . . . ! ! ! ❤️']);
        mkdir("botsData/$un");
        mkdir("botsData/$un/data");
        touch("botsData/$un/Mahdy");
        file_put_contents("botsData/$un/coinup.txt", "5");
        file_put_contents("botsData/$un/data/my_id.txt", "$from_id");
        file_put_contents("usersData/$from_id/state.txt", "none");
        $channel = file_get_contents("usersData/$chat_id/soski.txt");
        $class = file_get_contents("botsSource/soski/DevOscar.php");
        $class = str_replace("[*[TOKEN]*]", $text, $class);
        $class = str_replace("[*[ADMIN]*]", $from_id, $class);
        $class = str_replace("[*[USERNAME]*]", $un, $class);
        file_put_contents("botsData/$un/DevOscar.php", $class);
        copy("botsSource/soski/jdf.php", "botsData/$un/jdf.php");
        file_get_contents("https://api.telegram.org/bot" . $text . "/setwebhook?url=" . $folder . "/botsData/" . $un . "/DevOscar.php");
        file_put_contents("usersData/$from_id/create.txt", "yes");
        $user_b = file_get_contents("usersData/$from_id/bots.txt");
        $member_b = explode("\n", $user_b);
        if (!in_array($un, $member_b))
        {
            $add_bot = file_get_contents("usersData/$from_id/bots.txt");
            $add_bot .= $un . "\n";
            file_put_contents("usersData/$from_id/bots.txt", $add_bot);
        }
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "ربات شما با موفقیت به سرور پر قدرت ما متصل شد ⚡️", 'parse_mode' => 'html', 'reply_markup' => json_encode(['inline_keyboard' => [[['text' => "ورود به ربات 🚀", 'url' => "https://t.me/$un"]], ]]) ]);
        $coin = file_get_contents("usersData/$from_id/coin.txt");
        settype($coin, "integer");
        $newcoin = $coin - 15;
        save("usersData/$from_id/coin.txt", $newcoin);
    }
}
elseif ($state === "sargarmi" && $text != "『 برگشت 』")
{
    if ($text[0] == '@') $text = substr($text, 1);
    if ((strlen($text) > 50) or strpos($text, '/') or strpos($text, '(') or strpos($text, ')') or strpos($text, '}') or strpos($text, '{') or strpos($text, ']') or strpos($text, '[') or strpos($text, '#') or strpos($text, '"') !== false)
    {
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "از ارسال کاراکتر های غیر مجاز ب ربات خودداری کنید ☝🏿", ]);
    }
    elseif (!preg_match('/^([a-zA-Z][a-zA-Z0-9_]{4,31}|)$/', $text))
    {
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => 'یوزرنیم ارسال شده اشتباه است ⛔️', ]);
    }
    else
    {
        file_put_contents("usersData/$chat_id/sargarmi.txt", $text);
        file_put_contents("usersData/$from_id/state.txt", "sargarmi1");
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "␥| توکن #ربات رو خود را ارسال کنید 🎐", 'parse_mode' => 'Markdown', 'reply_markup' => json_encode(['resize_keyboard' => true, 'keyboard' => [[['text' => "『 برگشت 』"]], ]]) ]);
    }
}
elseif ($state === "sargarmi1")
{
    $userbot = json_decode(file_get_contents("https://api.telegram.org/bot" . $text . "/getme") , true);
    $un = $userbot["result"]["username"];
    $ok = $userbot["ok"];
    if ($ok != 1)
    {
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "😐❌ توکن شما معتبر نمی باشد!

توکن خود را از @BotFather دریافت کنید🤦‍♂", ]);
    }
    else
    {
        bot('sendMessage', ['chat_id' => $chat_id, 'message_id' => $message_id + 1, 'text' => 'لطفا صبر کنید . . . ! ! ! ❤️']);
        mkdir("botsData/$un");
        mkdir("botsData/$un/data");
        touch("botsData/$un/Mahdy");
        file_put_contents("botsData/$un/coinup.txt", "2");
        file_put_contents("botsData/$un/data/my_id.txt", "$from_id");
        file_put_contents("usersData/$from_id/state.txt", "none");
        $channel = file_get_contents("usersData/$chat_id/sargarmi.txt");
        $class = file_get_contents("botsSource/sargarmi/DevOscar.php");
        $class = str_replace("[*[TOKEN]*]", $text, $class);
        $class = str_replace("[*[ADMIN]*]", $from_id, $class);
        $class = str_replace("[*[USERNAME]*]", $un, $class);
        $class = str_replace("[*[CHANNEL]*]", $channel, $class);
        file_put_contents("botsData/$un/DevOscar.php", $class);
        file_get_contents("https://api.telegram.org/bot" . $text . "/setwebhook?url=" . $folder . "/botsData/" . $un . "/DevOscar.php");
        file_put_contents("usersData/$from_id/create.txt", "yes");
        $user_b = file_get_contents("usersData/$from_id/bots.txt");
        $member_b = explode("\n", $user_b);
        if (!in_array($un, $member_b))
        {
            $add_bot = file_get_contents("usersData/$from_id/bots.txt");
            $add_bot .= $un . "\n";
            file_put_contents("usersData/$from_id/bots.txt", $add_bot);
        }
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "ربات شما با موفقیت به سرور پر قدرت ما متصل شد ⚡️

⚠️ نکته : حتما داخل گروه ادمین بشه", 'parse_mode' => 'html', 'reply_markup' => json_encode(['inline_keyboard' => [[['text' => "ورود به ربات 🚀", 'url' => "https://t.me/$un"]], ]]) ]);
        $coin = file_get_contents("usersData/$from_id/coin.txt");
        settype($coin, "integer");
        $newcoin = $coin - 10;
        save("usersData/$from_id/coin.txt", $newcoin);
    }
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
elseif ($state === "Bank")
{
    $userbot = json_decode(file_get_contents("https://api.telegram.org/bot" . $text . "/getme") , true);
    $un = $userbot["result"]["username"];
    $ok = $userbot["ok"];
    if ($ok != 1 or (strlen($text) > 50) or strpos($text, '/') or strpos($text, '(') or strpos($text, '#') or strpos($text, ')') or strpos($text, '}') or strpos($text, '{') or strpos($text, ']') or strpos($text, '[') or strpos($text, '"') !== false)
    {
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "😐❌ توکن شما معتبر نمی باشد!

توکن خود را از @BotFather دریافت کنید🤦‍♂", ]);
    }
    else
    {
        bot('sendMessage', ['chat_id' => $chat_id, 'message_id' => $message_id + 1, 'text' => 'لطفا صبر کنید . . . ! ! ! ❤️']);
        mkdir("botsData/$un");
        mkdir("botsData/$un/data");
        touch("botsData/$un/Mahdy");
        file_put_contents("botsData/$un/coinup.txt", "10");
        file_put_contents("botsData/$un/data/my_id.txt", "$from_id");
        file_put_contents("usersData/$from_id/state.txt", "none");
        $class = file_get_contents("botsSource/Bank/DevOscar.php");
        $class = str_replace("[*[TOKEN]*]", $text, $class);
        $class = str_replace("[*[ADMIN]*]", $from_id, $class);
        $class = str_replace("[*[USERNAME]*]", $un, $class);
        file_put_contents("botsData/$un/DevOscar.php", $class);
        file_get_contents("https://api.telegram.org/bot" . $text . "/setwebhook?url=" . $folder . "/botsData/" . $un . "/DevOscar.php");
        file_put_contents("usersData/$from_id/create.txt", "yes");
        $user_b = file_get_contents("usersData/$from_id/bots.txt");
        $member_b = explode("\n", $user_b);
        if (!in_array($un, $member_b))
        {
            $add_bot = file_get_contents("usersData/$from_id/bots.txt");
            $add_bot .= $un . "\n";
            file_put_contents("usersData/$from_id/bots.txt", $add_bot);
        }
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "ربات شما با موفقیت به سرور پر قدرت ما متصل شد ⚡️", 'parse_mode' => 'html', 'reply_markup' => json_encode(['inline_keyboard' => [[['text' => "ورود به ربات 🚀", 'url' => "https://t.me/$un"]], ]]) ]);
        $coin = file_get_contents("usersData/$from_id/coin.txt");
        settype($coin, "integer");
        $newcoin = $coin - 20;
        save("usersData/$from_id/coin.txt", $newcoin);
    }
}
elseif ($state === "Jng" && $text != "『 برگشت 』")
{
    if ($text[0] == '@') $text = substr($text, 1);
    if ((strlen($text) > 50) or strpos($text, '/') or strpos($text, '(') or strpos($text, ')') or strpos($text, '}') or strpos($text, '{') or strpos($text, ']') or strpos($text, '[') or strpos($text, '#') or strpos($text, '"') !== false)
    {
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "از ارسال کاراکتر های غیر مجاز ب ربات خودداری کنید ☝🏿", ]);
    }
    elseif (!preg_match('/^([a-zA-Z][a-zA-Z0-9_]{4,31}|)$/', $text))
    {
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => 'یوزرنیم ارسال شده اشتباه است ⛔️', ]);
    }
    else
    {
        file_put_contents("usersData/$chat_id/Jng.txt", $text);
        file_put_contents("usersData/$from_id/state.txt", "Jng1");
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "␥| توکن #ربات رو خود را ارسال کنید 🎐", 'parse_mode' => 'Markdown', 'reply_markup' => json_encode(['resize_keyboard' => true, 'keyboard' => [[['text' => "『 برگشت 』"]], ]]) ]);
    }
}
elseif ($state === "Jng1")
{
    $userbot = json_decode(file_get_contents("https://api.telegram.org/bot" . $text . "/getme") , true);
    $un = $userbot["result"]["username"];
    $ok = $userbot["ok"];
    if ($ok != 1 or (strlen($text) > 50) or strpos($text, '/') or strpos($text, '(') or strpos($text, '#') or strpos($text, ')') or strpos($text, '}') or strpos($text, '{') or strpos($text, ']') or strpos($text, '[') or strpos($text, '"') !== false)
    {
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "😐❌ توکن شما معتبر نمی باشد!

توکن خود را از @BotFather دریافت کنید🤦‍♂", ]);
    }
    else
    {
        bot('sendMessage', ['chat_id' => $chat_id, 'message_id' => $message_id + 1, 'text' => 'لطفا صبر کنید . . . ! ! ! ❤️']);
        mkdir("botsData/$un");
        mkdir("botsData/$un/data");
        mkdir("botsData/$un/clans");
        mkdir("botsData/$un/clans/config");
        mkdir("botsData/$un/codes");
        mkdir("botsData/$un/enemy");
        mkdir("botsData/$un/event");
        mkdir("botsData/$un/revenge");
        mkdir("botsData/$un/users");
        touch("botsData/$un/Mahdy");
        file_put_contents("botsData/$un/coinup.txt", "20");
        file_put_contents("botsData/$un/data/my_id.txt", "$from_id");
        file_put_contents("usersData/$from_id/state.txt", "none");
        $channel = file_get_contents("usersData/$chat_id/Jng.txt");
        $class = file_get_contents("botsSource/Jng/lvp.php");
        $class = str_replace("[*[ADMIN]*]", $from_id, $class);
        $class = str_replace("[*[USERNAME]*]", $un, $class);
        $class = str_replace("[*[CHANNEL]*]", $channel, $class);
        file_put_contents("botsData/$un/lvp.php", "$class");
        $class = file_get_contents("botsSource/Jng/telegram.php");
        $class = str_replace("[*[ADMIN]*]", $from_id, $class);
        $class = str_replace("[*[USERNAME]*]", $un, $class);
        $class = str_replace("[*[CHANNEL]*]", $channel, $class);
        file_put_contents("botsData/$un/telegram.php", "$class");
        $class = file_get_contents("botsSource/Jng/index.php");
        $class = str_replace("[*[TOKEN]*]", $text, $class);
        $class = str_replace("[*[ADMIN]*]", $from_id, $class);
        $class = str_replace("[*[USERNAME]*]", $un, $class);
        $class = str_replace("[*[CHANNEL]*]", $channel, $class);
        file_put_contents("botsData/$un/index.php", $class);
        copy("botsSource/Jng/blocklist.txt", "botsData/$un/blocklist.txt");
        copy("botsSource/Jng/eshtrak.txt", "botsData/$un/eshtrak.txt");
        copy("botsSource/Jng/shop.txt", "botsData/$un/shop.txt");
        copy("botsSource/Jng/useridclash.txt", "botsData/$un/useridclash.txt");
        file_get_contents("https://api.telegram.org/bot" . $text . "/setwebhook?url=" . $folder . "/botsData/" . $un . "/index.php");
        file_put_contents("usersData/$from_id/create.txt", "yes");
        $user_b = file_get_contents("usersData/$from_id/bots.txt");
        $member_b = explode("\n", $user_b);
        if (!in_array($un, $member_b))
        {
            $add_bot = file_get_contents("usersData/$from_id/bots.txt");
            $add_bot .= $un . "\n";
            file_put_contents("usersData/$from_id/bots.txt", $add_bot);
        }
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "ربات شما با موفقیت به سرور پر قدرت ما متصل شد ⚡️", 'parse_mode' => 'html', 'reply_markup' => json_encode(['inline_keyboard' => [[['text' => "ورود به ربات 🔴", 'url' => "https://t.me/$un"]], ]]) ]);
        $coin = file_get_contents("usersData/$from_id/coin.txt");
        settype($coin, "integer");
        $newcoin = $coin - 30;
        save("usersData/$from_id/coin.txt", $newcoin);
    }
}
elseif ($state === "ViewPanel")
{
    $userbot = json_decode(file_get_contents("https://api.telegram.org/bot" . $text . "/getme") , true);
    $un = $userbot["result"]["username"];
    $ok = $userbot["ok"];
    if ($ok != 1 or (strlen($text) > 50) or strpos($text, '#') or strpos($text, '/') or strpos($text, '(') or strpos($text, ')') or strpos($text, '}') or strpos($text, '{') or strpos($text, ']') or strpos($text, '[') or strpos($text, '"') !== false)
    {
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "😐❌ توکن شما معتبر نمی باشد!

توکن خود را از @BotFather دریافت کنید🤦‍♂", ]);
    }
    else
    {
        bot('sendMessage', ['chat_id' => $chat_id, 'message_id' => $message_id + 1, 'text' => 'لطفا صبر کنید . . . ! ! ! ❤️']);
        mkdir("botsData/$un");
        mkdir("botsData/$un/data");
        touch("botsData/$un/Mahdy");
        file_put_contents("botsData/$un/coinup.txt", "10");
        file_put_contents("botsData/$un/data/my_id.txt", "$from_id");
        file_put_contents("usersData/$from_id/state.txt", "none");
        $class = file_get_contents("botsSource/ViewPanel/DevOscar.php");
        $class = str_replace("[*[TOKEN]*]", $text, $class);
        $class = str_replace("[*[ADMIN]*]", $from_id, $class);
        $class = str_replace("[*[USERNAME]*]", $un, $class);
        file_put_contents("botsData/$un/DevOscar.php", $class);
        file_get_contents("https://api.telegram.org/bot" . $text . "/setwebhook?url=" . $folder . "/botsData/" . $un . "/DevOscar.php");
        file_put_contents("usersData/$from_id/create.txt", "yes");
        $user_b = file_get_contents("usersData/$from_id/bots.txt");
        $member_b = explode("\n", $user_b);
        if (!in_array($un, $member_b))
        {
            $add_bot = file_get_contents("usersData/$from_id/bots.txt");
            $add_bot .= $un . "\n";
            file_put_contents("usersData/$from_id/bots.txt", $add_bot);
        }
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "ربات شما با موفقیت به سرور پر قدرت ما متصل شد ⚡️", 'parse_mode' => 'html', 'reply_markup' => json_encode(['inline_keyboard' => [[['text' => "ورود به ربات 🚀", 'url' => "https://t.me/$un"]], ]]) ]);
        $coin = file_get_contents("usersData/$from_id/coin.txt");
        settype($coin, "integer");
        $newcoin = $coin - 25;
        save("usersData/$from_id/coin.txt", $newcoin);
    }
}
elseif ($state === "hal")
{
    $userbot = json_decode(file_get_contents("https://api.telegram.org/bot" . $text . "/getme") , true);
    $un = $userbot["result"]["username"];
    $ok = $userbot["ok"];
    if ($ok != 1 or (strlen($text) > 50) or strpos($text, '#') or strpos($text, '/') or strpos($text, '(') or strpos($text, ')') or strpos($text, '}') or strpos($text, '{') or strpos($text, ']') or strpos($text, '[') or strpos($text, '"') !== false)
    {
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "😐❌ توکن شما معتبر نمی باشد!

توکن خود را از @BotFather دریافت کنید🤦‍♂", ]);
    }
    else
    {
        bot('sendMessage', ['chat_id' => $chat_id, 'message_id' => $message_id + 1, 'text' => 'لطفا صبر کنید . . . ! ! ! ❤️']);
        mkdir("botsData/$un");
        mkdir("botsData/$un/data");
        touch("botsData/$un/Mahdy");
        file_put_contents("botsData/$un/coinup.txt", "10");
        file_put_contents("botsData/$un/data/my_id.txt", "$from_id");
        file_put_contents("usersData/$from_id/state.txt", "none");
        $class = file_get_contents("botsSource/hal/DevOscar.php");
        $class = str_replace("[*[TOKEN]*]", $text, $class);
        $class = str_replace("[*[ADMIN]*]", $from_id, $class);
        file_put_contents("botsData/$un/DevOscar.php", $class);
        file_get_contents("https://api.telegram.org/bot" . $text . "/setwebhook?url=" . $folder . "/botsData/" . $un . "/DevOscar.php");
        file_put_contents("usersData/$from_id/create.txt", "yes");
        $user_b = file_get_contents("usersData/$from_id/bots.txt");
        $member_b = explode("\n", $user_b);
        if (!in_array($un, $member_b))
        {
            $add_bot = file_get_contents("usersData/$from_id/bots.txt");
            $add_bot .= $un . "\n";
            file_put_contents("usersData/$from_id/bots.txt", $add_bot);
        }
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "ربات شما با موفقیت به سرور پر قدرت ما متصل شد ⚡️", 'parse_mode' => 'html', 'reply_markup' => json_encode(['inline_keyboard' => [[['text' => "ورود به ربات 🚀", 'url' => "https://t.me/$un"]], ]]) ]);
        $coin = file_get_contents("usersData/$from_id/coin.txt");
        settype($coin, "integer");
        $newcoin = $coin - 20;
        save("usersData/$from_id/coin.txt", $newcoin);
    }
}
elseif ($state === "Shart")
{
    $userbot = json_decode(file_get_contents("https://api.telegram.org/bot" . $text . "/getme") , true);
    $un = $userbot["result"]["username"];
    $ok = $userbot["ok"];
    if ($ok != 1 or (strlen($text) > 50) or strpos($text, '#') or strpos($text, '/') or strpos($text, '(') or strpos($text, ')') or strpos($text, '}') or strpos($text, '{') or strpos($text, ']') or strpos($text, '[') or strpos($text, '"') !== false)
    {
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "😐❌ توکن شما معتبر نمی باشد!

توکن خود را از @BotFather دریافت کنید🤦‍♂", ]);
    }
    else
    {
        bot('sendMessage', ['chat_id' => $chat_id, 'message_id' => $message_id + 1, 'text' => 'لطفا صبر کنید . . . ! ! ! ❤️']);
        mkdir("botsData/$un");
        mkdir("botsData/$un/data");
        touch("botsData/$un/Mahdy");
        file_put_contents("botsData/$un/coinup.txt", "10");
        file_put_contents("botsData/$un/data/my_id.txt", "$from_id");
        file_put_contents("usersData/$from_id/state.txt", "none");
        $channel = file_get_contents("usersData/$chat_id/Shart.txt");
        $class = file_get_contents("botsSource/Shart/DevOscar.php");
        $class = str_replace("[*[TOKEN]*]", $text, $class);
        $class = str_replace("[*[ADMIN]*]", $from_id, $class);
        $class = str_replace("[*[USERNAME]*]", $un, $class);
        file_put_contents("botsData/$un/DevOscar.php", $class);
        file_get_contents("https://api.telegram.org/bot" . $text . "/setwebhook?url=" . $folder . "/botsData/" . $un . "/DevOscar.php");
        file_put_contents("usersData/$from_id/create.txt", "yes");
        $user_b = file_get_contents("usersData/$from_id/bots.txt");
        $member_b = explode("\n", $user_b);
        if (!in_array($un, $member_b))
        {
            $add_bot = file_get_contents("usersData/$from_id/bots.txt");
            $add_bot .= $un . "\n";
            file_put_contents("usersData/$from_id/bots.txt", $add_bot);
        }
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "ربات شما با موفقیت به سرور پر قدرت ما متصل شد ⚡️", 'parse_mode' => 'html', 'reply_markup' => json_encode(['inline_keyboard' => [[['text' => "ورود به ربات 🚀", 'url' => "https://t.me/$un"]], ]]) ]);
        $coin = file_get_contents("usersData/$from_id/coin.txt");
        settype($coin, "integer");
        $newcoin = $coin - 25;
        save("usersData/$from_id/coin.txt", $newcoin);
    }
}
elseif ($state === "MusicEdit")
{
    $userbot = json_decode(file_get_contents("https://api.telegram.org/bot" . $text . "/getme") , true);
    $un = $userbot["result"]["username"];
    $ok = $userbot["ok"];
    if ($ok != 1 or (strlen($text) > 50) or strpos($text, '#') or strpos($text, '/') or strpos($text, '(') or strpos($text, ')') or strpos($text, '}') or strpos($text, '{') or strpos($text, ']') or strpos($text, '[') or strpos($text, '"') !== false)
    {
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "😐❌ توکن شما معتبر نمی باشد!
  
توکن خود را از @BotFather دریافت کنید🤦‍♂", ]);
    }
    else
    {
        bot('sendMessage', ['chat_id' => $chat_id, 'message_id' => $message_id + 1, 'text' => 'لطفا صبر کنید . . . ! ! ! ❤️']);
        mkdir("botsData/$un");
        mkdir("botsData/$un/data");
        touch("botsData/$un/Mahdy");
        file_put_contents("botsData/$un/data/my_id.txt", "$from_id");
        file_put_contents("usersData/$from_id/state.txt", "none");
        $class = file_get_contents("botsSource/MusicEdit/DevOscar.php");
        $class = str_replace("[*[TOKEN]*]", $text, $class);
        file_put_contents("botsData/$un/DevOscar.php", $class);
        file_get_contents("https://api.telegram.org/bot" . $text . "/setwebhook?url=" . $folder . "/botsData/" . $un . "/DevOscar.php");
        file_put_contents("usersData/$from_id/create.txt", "yes");
        $user_b = file_get_contents("usersData/$from_id/bots.txt");
        $member_b = explode("\n", $user_b);
        if (!in_array($un, $member_b))
        {
            $add_bot = file_get_contents("usersData/$from_id/bots.txt");
            $add_bot .= $un . "\n";
            file_put_contents("usersData/$from_id/bots.txt", $add_bot);
        }
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "ربات شما با موفقیت به سرور پر قدرت ما متصل شد ⚡️", 'parse_mode' => 'html', 'reply_markup' => json_encode(['inline_keyboard' => [[['text' => "ورود به ربات 🚀", 'url' => "https://t.me/$un"]], ]]) ]);
        $coin = file_get_contents("usersData/$from_id/coin.txt");
        settype($coin, "integer");
        $newcoin = $coin - 2;
        save("usersData/$from_id/coin.txt", $newcoin);
    }
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
elseif ($state === "ChannelAnti")
{
    $userbot = json_decode(file_get_contents("https://api.telegram.org/bot" . $text . "/getme") , true);
    $un = $userbot["result"]["username"];
    $ok = $userbot["ok"];
    if ($ok != 1 or (strlen($text) > 50) or strpos($text, '#') or strpos($text, '/') or strpos($text, '(') or strpos($text, ')') or strpos($text, '}') or strpos($text, '{') or strpos($text, ']') or strpos($text, '[') or strpos($text, '"') !== false)
    {
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "😐❌ توکن شما معتبر نمی باشد!
  
توکن خود را از @BotFather دریافت کنید🤦‍♂", ]);
    }
    else
    {
        bot('sendMessage', ['chat_id' => $chat_id, 'message_id' => $message_id + 1, 'text' => 'لطفا صبر کنید . . . ! ! ! ❤️']);
        mkdir("botsData/$un");
        mkdir("botsData/$un/data");
        touch("botsData/$un/Mahdy");
        file_put_contents("botsData/$un/coinup.txt", "10");
        file_put_contents("botsData/$un/data/my_id.txt", "$from_id");
        file_put_contents("usersData/$from_id/state.txt", "none");
        $class = file_get_contents("botsSource/ChannelAnti/DevOscar.php");
        $class = str_replace("[*[TOKEN]*]", $text, $class);
        $class = str_replace("[*[ADMIN]*]", $from_id, $class);
        file_put_contents("botsData/$un/DevOscar.php", $class);
        file_get_contents("https://api.telegram.org/bot" . $text . "/setwebhook?url=" . $folder . "/botsData/" . $un . "/DevOscar.php");
        file_put_contents("usersData/$from_id/create.txt", "yes");
        $user_b = file_get_contents("usersData/$from_id/bots.txt");
        $member_b = explode("\n", $user_b);
        if (!in_array($un, $member_b))
        {
            $add_bot = file_get_contents("usersData/$from_id/bots.txt");
            $add_bot .= $un . "\n";
            file_put_contents("usersData/$from_id/bots.txt", $add_bot);
        }
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "ربات شما با موفقیت به سرور پر قدرت ما متصل شد ⚡️", 'parse_mode' => 'html', 'reply_markup' => json_encode(['inline_keyboard' => [[['text' => "ورود به ربات 🚀", 'url' => "https://t.me/$un"]], ]]) ]);
        $coin = file_get_contents("usersData/$from_id/coin.txt");
        settype($coin, "integer");
        $newcoin = $coin - 15;
        save("usersData/$from_id/coin.txt", $newcoin);
    }
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
elseif ($state === "ViewGir")
{
    $userbot = json_decode(file_get_contents("https://api.telegram.org/bot" . $text . "/getme") , true);
    $un = $userbot["result"]["username"];
    $ok = $userbot["ok"];
    if ($ok != 1 or (strlen($text) > 50) or strpos($text, '#') or strpos($text, '/') or strpos($text, '(') or strpos($text, ')') or strpos($text, '}') or strpos($text, '{') or strpos($text, ']') or strpos($text, '[') or strpos($text, '"') !== false)
    {
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "😐❌ توکن شما معتبر نمی باشد!

توکن خود را از @BotFather دریافت کنید🤦‍♂", ]);
    }
    else
    {
        bot('sendMessage', ['chat_id' => $chat_id, 'message_id' => $message_id + 1, 'text' => 'لطفا صبر کنید . . . ! ! ! ❤️']);
        mkdir("botsData/$un");
        mkdir("botsData/$un/data");
        touch("botsData/$un/Mahdy");
        file_put_contents("botsData/$un/coinup.txt", "17");
        file_put_contents("botsData/$un/data/my_id.txt", "$from_id");
        file_put_contents("usersData/$from_id/state.txt", "none");
        $channel = file_get_contents("usersData/$chat_id/ViewGir.txt");
        $class = file_get_contents("botsSource/ViewGir/DevOscar.php");
        $class = str_replace("[*[TOKEN]*]", $text, $class);
        $class = str_replace("[*[ADMIN]*]", $from_id, $class);
        $class = str_replace("[*[USERNAME]*]", $un, $class);
        file_put_contents("botsData/$un/DevOscar.php", $class);
        file_get_contents("https://api.telegram.org/bot" . $text . "/setwebhook?url=" . $folder . "/botsData/" . $un . "/DevOscar.php");
        file_put_contents("usersData/$from_id/create.txt", "yes");
        $user_b = file_get_contents("usersData/$from_id/bots.txt");
        $member_b = explode("\n", $user_b);
        if (!in_array($un, $member_b))
        {
            $add_bot = file_get_contents("usersData/$from_id/bots.txt");
            $add_bot .= $un . "\n";
            file_put_contents("usersData/$from_id/bots.txt", $add_bot);
        }
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "ربات شما با موفقیت به سرور پر قدرت ما متصل شد ⚡️", 'parse_mode' => 'html', 'reply_markup' => json_encode(['inline_keyboard' => [[['text' => "ورود به ربات 🚀", 'url' => "https://t.me/$un"]], ]]) ]);
        $coin = file_get_contents("usersData/$from_id/coin.txt");
        settype($coin, "integer");
        $newcoin = $coin - 30;
        save("usersData/$from_id/coin.txt", $newcoin);
    }
}
elseif ($state === "Zdlink" && $text != "『 برگشت 』")
{
    if ($text[0] == '@') $text = substr($text, 1);
    if ((strlen($text) > 50) or strpos($text, '/') or strpos($text, '#') or strpos($text, '(') or strpos($text, ')') or strpos($text, '}') or strpos($text, '{') or strpos($text, ']') or strpos($text, '[') or strpos($text, '"') !== false)
    {
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "از ارسال کاراکتر های غیر مجاز ب ربات خودداری کنید ☝🏿", ]);
    }
    elseif (!preg_match('/^([a-zA-Z][a-zA-Z0-9_]{4,31}|)$/', $text))
    {
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => 'یوزرنیم ارسال شده اشتباه است ⛔️', ]);
    }
    else
    {
        file_put_contents("usersData/$chat_id/Zdlink.txt", $text);
        file_put_contents("usersData/$from_id/state.txt", "Zdlink1");
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "␥| توکن #ربات رو خود را ارسال کنید 🎐", 'parse_mode' => 'Markdown', 'reply_markup' => json_encode(['resize_keyboard' => true, 'keyboard' => [[['text' => "『 برگشت 』"]], ]]) ]);
    }
}
elseif ($state === "Zdlink1")
{
    $userbot = json_decode(file_get_contents("https://api.telegram.org/bot" . $text . "/getme") , true);
    $un = $userbot["result"]["username"];
    $ok = $userbot["ok"];
    if ($ok != 1 or (strlen($text) > 50) or strpos($text, '#') or strpos($text, '/') or strpos($text, '(') or strpos($text, ')') or strpos($text, '}') or strpos($text, '{') or strpos($text, ']') or strpos($text, '[') or strpos($text, '"') !== false)
    {
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "😐❌ توکن شما معتبر نمی باشد!

توکن خود را از @BotFather دریافت کنید🤦‍♂", ]);
    }
    else
    {
        bot('sendMessage', ['chat_id' => $chat_id, 'message_id' => $message_id + 1, 'text' => 'لطفا صبر کنید . . . ! ! ! ❤️']);
        mkdir("botsData/$un");
        mkdir("botsData/$un/data");
        mkdir("botsData/$un/other");
        touch("botsData/$un/Mahdy");
        file_put_contents("botsData/$un/coinup.txt", "14");
        file_put_contents("botsData/$un/data/my_id.txt", "$from_id");
        file_put_contents("botsData/$un/data/group.txt", " ");
        file_put_contents("usersData/$from_id/state.txt", "none");
        $channel = file_get_contents("usersData/$chat_id/Zdlink.txt");
        $class = file_get_contents("botsSource/Zdlink/DevOscar.php");
        $class = str_replace("[*[TOKEN]*]", $text, $class);
        $class = str_replace("[*[ADMIN]*]", $from_id, $class);
        $class = str_replace("[*[USERNAME]*]", $un, $class);
        $class = str_replace("[*[CHANNEL]*]", $channel, $class);
        file_put_contents("botsData/$un/DevOscar.php", $class);
        copy("botsSource/Zdlink/ping.mp4", "botsData/$un/other/ping.mp4");
        file_get_contents("https://api.telegram.org/bot" . $text . "/setwebhook?url=" . $folder . "/botsData/" . $un . "/DevOscar.php");
        file_put_contents("usersData/$from_id/create.txt", "yes");
        $user_b = file_get_contents("usersData/$from_id/bots.txt");
        $member_b = explode("\n", $user_b);
        if (!in_array($un, $member_b))
        {
            $add_bot = file_get_contents("usersData/$from_id/bots.txt");
            $add_bot .= $un . "\n";
            file_put_contents("usersData/$from_id/bots.txt", $add_bot);
        }
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "ربات شما با موفقیت به سرور پر قدرت ما متصل شد ⚡️", 'parse_mode' => 'html', 'reply_markup' => json_encode(['inline_keyboard' => [[['text' => "ورود به ربات 🚀", 'url' => "https://t.me/$un"]], ]]) ]);
        $coin = file_get_contents("usersData/$from_id/coin.txt");
        settype($coin, "integer");
        $newcoin = $coin - 30;
        save("usersData/$from_id/coin.txt", $newcoin);
    }
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
elseif ($state === "Post" && $text != "『 برگشت 』")
{
    if ($text[0] == '@') $text = substr($text, 1);
    if ((strlen($text) > 50) or strpos($text, '/') or strpos($text, '#') or strpos($text, '(') or strpos($text, ')') or strpos($text, '}') or strpos($text, '{') or strpos($text, ']') or strpos($text, '[') or strpos($text, '"') !== false)
    {
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "از ارسال کاراکتر های غیر مجاز ب ربات خودداری کنید ☝🏿", ]);
    }
    elseif (!preg_match('/^([a-zA-Z][a-zA-Z0-9_]{4,31}|)$/', $text))
    {
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => 'یوزرنیم ارسال شده اشتباه است ⛔️', ]);
    }
    else
    {
        file_put_contents("usersData/$chat_id/Post.txt", $text);
        file_put_contents("usersData/$from_id/state.txt", "Post1");
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "␥| توکن #ربات رو خود را ارسال کنید 🎐", 'parse_mode' => 'Markdown', 'reply_markup' => json_encode(['resize_keyboard' => true, 'keyboard' => [[['text' => "『 برگشت 』"]], ]]) ]);
    }
}
elseif ($state === "Post1")
{
    $userbot = json_decode(file_get_contents("https://api.telegram.org/bot" . $text . "/getme") , true);
    $un = $userbot["result"]["username"];
    $ok = $userbot["ok"];
    if ($ok != 1 or (strlen($text) > 50) or strpos($text, '#') or strpos($text, '/') or strpos($text, '(') or strpos($text, ')') or strpos($text, '}') or strpos($text, '{') or strpos($text, ']') or strpos($text, '[') or strpos($text, '"') !== false)
    {
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "😐❌ توکن شما معتبر نمی باشد!

توکن خود را از @BotFather دریافت کنید🤦‍♂", ]);
    }
    else
    {
        bot('sendMessage', ['chat_id' => $chat_id, 'message_id' => $message_id + 1, 'text' => 'لطفا صبر کنید . . . ! ! ! ❤️']);
        mkdir("botsData/$un");
        mkdir("botsData/$un/data");
        touch("botsData/$un/Mahdy");
        file_put_contents("botsData/$un/coinup.txt", "5");
        file_put_contents("botsData/$un/data/my_id.txt", "$from_id");
        file_put_contents("usersData/$from_id/state.txt", "none");
        $channel = file_get_contents("usersData/$chat_id/Post.txt");
        $class = file_get_contents("botsSource/Post/DevOscar.php");
        $class = str_replace("[*[TOKEN]*]", $text, $class);
        $class = str_replace("[*[ADMIN]*]", $from_id, $class);
        $class = str_replace("[*[USERNAME]*]", $un, $class);
        $class = str_replace("[*[CHANNEL]*]", $channel, $class);
        file_put_contents("botsData/$un/DevOscar.php", $class);
        file_get_contents("https://api.telegram.org/bot" . $text . "/setwebhook?url=" . $folder . "/botsData/" . $un . "/DevOscar.php");
        file_put_contents("usersData/$from_id/create.txt", "yes");
        $user_b = file_get_contents("usersData/$from_id/bots.txt");
        $member_b = explode("\n", $user_b);
        if (!in_array($un, $member_b))
        {
            $add_bot = file_get_contents("usersData/$from_id/bots.txt");
            $add_bot .= $un . "\n";
            file_put_contents("usersData/$from_id/bots.txt", $add_bot);
        }
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "ربات شما با موفقیت به سرور پر قدرت ما متصل شد ⚡️", 'parse_mode' => 'html', 'reply_markup' => json_encode(['inline_keyboard' => [[['text' => "ورود به ربات 🚀", 'url' => "https://t.me/$un"]], ]]) ]);
        $coin = file_get_contents("usersData/$from_id/coin.txt");
        settype($coin, "integer");
        $newcoin = $coin - 15;
        save("usersData/$from_id/coin.txt", $newcoin);
    }
}
elseif ($state === "comnt")
{
    $userbot = json_decode(file_get_contents("https://api.telegram.org/bot" . $text . "/getme") , true);
    $un = $userbot["result"]["username"];
    $ok = $userbot["ok"];
    if ($ok != 1 or (strlen($text) > 50) or strpos($text, '#') or strpos($text, '/') or strpos($text, '(') or strpos($text, ')') or strpos($text, '}') or strpos($text, '{') or strpos($text, ']') or strpos($text, '[') or strpos($text, '"') !== false)
    {
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "😐❌ توکن شما معتبر نمی باشد!

توکن خود را از @BotFather دریافت کنید🤦‍♂", ]);
    }
    else
    {
        bot('sendMessage', ['chat_id' => $chat_id, 'message_id' => $message_id + 1, 'text' => 'لطفا صبر کنید . . . ! ! ! ❤️']);
        mkdir("botsData/$un");
        mkdir("botsData/$un/data");
        touch("botsData/$un/Mahdy");
        file_put_contents("botsData/$un/data/start.txt", "ادمین گرامی متن استارت را از پنل ست کنید 🙏🏽
برای ورود ب پنل ادمین کلمه پنل را ارسال کنید  ❤️");
        file_put_contents("botsData/$un/coinup.txt", "8");
        file_put_contents("botsData/$un/data/my_id.txt", "$from_id");
        file_put_contents("usersData/$from_id/state.txt", "none");
        $class = file_get_contents("botsSource/comnt/DevOscar.php");
        $class = str_replace("[*[TOKEN]*]", $text, $class);
        $class = str_replace("[*[ADMIN]*]", $from_id, $class);
        file_put_contents("botsData/$un/DevOscar.php", $class);
        file_get_contents("https://api.telegram.org/bot" . $text . "/setwebhook?url=" . $folder . "/botsData/" . $un . "/DevOscar.php");
        file_put_contents("usersData/$from_id/create.txt", "yes");
        $user_b = file_get_contents("usersData/$from_id/bots.txt");
        $member_b = explode("\n", $user_b);
        if (!in_array($un, $member_b))
        {
            $add_bot = file_get_contents("usersData/$from_id/bots.txt");
            $add_bot .= $un . "\n";
            file_put_contents("usersData/$from_id/bots.txt", $add_bot);
        }
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "ربات شما با موفقیت به سرور پر قدرت ما متصل شد ⚡️", 'parse_mode' => 'html', 'reply_markup' => json_encode(['inline_keyboard' => [[['text' => "ورود به ربات 🚀", 'url' => "https://t.me/$un"]], ]]) ]);
        $coin = file_get_contents("usersData/$from_id/coin.txt");
        settype($coin, "integer");
        $newcoin = $coin - 10;
        save("usersData/$from_id/coin.txt", $newcoin);
    }
}
elseif ($state === "fal" && $text != "『 برگشت 』")
{
    if ($text[0] == '@') $text = substr($text, 1);
    if ((strlen($text) > 50) or strpos($text, '/') or strpos($text, '(') or strpos($text, ')') or strpos($text, '}') or strpos($text, '{') or strpos($text, ']') or strpos($text, '[') or strpos($text, '#') or strpos($text, '"') !== false)
    {
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "از ارسال کاراکتر های غیر مجاز ب ربات خودداری کنید ☝🏿", ]);
    }
    elseif (!preg_match('/^([a-zA-Z][a-zA-Z0-9_]{4,31}|)$/', $text))
    {
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => 'یوزرنیم ارسال شده اشتباه است ⛔️', ]);
    }
    else
    {
        file_put_contents("usersData/$chat_id/fal.txt", $text);
        file_put_contents("usersData/$from_id/state.txt", "fal1");
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "␥| توکن #ربات رو خود را ارسال کنید 🎐", 'parse_mode' => 'Markdown', 'reply_markup' => json_encode(['resize_keyboard' => true, 'keyboard' => [[['text' => "『 برگشت 』"]], ]]) ]);
    }
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
elseif ($state === "fal1")
{
    $userbot = json_decode(file_get_contents("https://api.telegram.org/bot" . $text . "/getme") , true);
    $un = $userbot["result"]["username"];
    $ok = $userbot["ok"];
    if ($ok != 1 or (strlen($text) > 50) or strpos($text, '/') or strpos($text, '(') or strpos($text, '#') or strpos($text, ')') or strpos($text, '}') or strpos($text, '{') or strpos($text, ']') or strpos($text, '[') or strpos($text, '"') !== false)
    {
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "😐❌ توکن شما معتبر نمی باشد!

توکن خود را از @BotFather دریافت کنید🤦‍♂", ]);
    }
    else
    {
        bot('sendMessage', ['chat_id' => $chat_id, 'message_id' => $message_id + 1, 'text' => 'لطفا صبر کنید . . . ! ! ! ❤️']);
        mkdir("botsData/$un");
        mkdir("botsData/$un/data");
        touch("botsData/$un/Mahdy");
        file_put_contents("botsData/$un/coinup.txt", "0");
        file_put_contents("botsData/$un/data/my_id.txt", "$from_id");
        file_put_contents("usersData/$from_id/state.txt", "none");
        $channel = file_get_contents("usersData/$chat_id/fal.txt");
        $class = file_get_contents("botsSource/fal/DevOscar.php");
        $class = str_replace("[*[TOKEN]*]", $text, $class);
        $class = str_replace("[*[ADMIN]*]", $from_id, $class);
        $class = str_replace("[*[USERNAME]*]", $un, $class);
        $class = str_replace("[*[CHANNEL]*]", $channel, $class);
        file_put_contents("botsData/$un/DevOscar.php", $class);
        file_get_contents("https://api.telegram.org/bot" . $text . "/setwebhook?url=" . $folder . "/botsData/" . $un . "/DevOscar.php");
        file_put_contents("usersData/$from_id/create.txt", "yes");
        $user_b = file_get_contents("usersData/$from_id/bots.txt");
        $member_b = explode("\n", $user_b);
        if (!in_array($un, $member_b))
        {
            $add_bot = file_get_contents("usersData/$from_id/bots.txt");
            $add_bot .= $un . "\n";
            file_put_contents("usersData/$from_id/bots.txt", $add_bot);
        }
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "ربات شما با موفقیت به سرور پر قدرت ما متصل شد ⚡️", 'parse_mode' => 'html', 'reply_markup' => json_encode(['inline_keyboard' => [[['text' => "ورود به ربات 🚀", 'url' => "https://t.me/$un"]], ]]) ]);
        $coin = file_get_contents("usersData/$from_id/coin.txt");
        settype($coin, "integer");
        $newcoin = $coin - 4;
        save("usersData/$from_id/coin.txt", $newcoin);
    }
}
elseif ($state === "pmrs" && $text != "『 برگشت 』")
{
    if ($text[0] == '@') $text = substr($text, 1);
    if ((strlen($text) > 50) or strpos($text, '/') or strpos($text, '#') or strpos($text, '(') or strpos($text, ')') or strpos($text, '}') or strpos($text, '{') or strpos($text, ']') or strpos($text, '[') or strpos($text, '"') !== false)
    {
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "از ارسال کاراکتر های غیر مجاز ب ربات خودداری کنید ☝🏿", ]);
    }
    elseif (!preg_match('/^([a-zA-Z][a-zA-Z0-9_]{4,31}|)$/', $text))
    {
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => 'یوزرنیم ارسال شده اشتباه است ⛔️', ]);
    }
    else
    {
        file_put_contents("usersData/$chat_id/pmrs.txt", $text);
        file_put_contents("usersData/$from_id/state.txt", "pmrs1");
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "␥| توکن #ربات رو خود را ارسال کنید 🎐", 'parse_mode' => 'Markdown', 'reply_markup' => json_encode(['resize_keyboard' => true, 'keyboard' => [[['text' => "『 برگشت 』"]], ]]) ]);
    }
}
elseif ($state === "pmrs1")
{
    $userbot = json_decode(file_get_contents("https://api.telegram.org/bot" . $text . "/getme") , true);
    $un = $userbot["result"]["username"];
    $ok = $userbot["ok"];
    if ($ok != 1 or (strlen($text) > 50) or strpos($text, '#') or strpos($text, '/') or strpos($text, '(') or strpos($text, ')') or strpos($text, '}') or strpos($text, '{') or strpos($text, ']') or strpos($text, '[') or strpos($text, '"') !== false)
    {
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "😐❌ توکن شما معتبر نمی باشد!

توکن خود را از @BotFather دریافت کنید🤦‍♂!", ]);
    }
    else
    {
        bot('sendMessage', ['chat_id' => $chat_id, 'message_id' => $message_id + 1, 'text' => 'لطفا صبر کنید . . . ! ! ! ❤️']);
        mkdir("botsData/$un");
        mkdir("botsData/$un/data");
        touch("botsData/$un/Mahdy");
        file_put_contents("botsData/$un/coinup.txt", "5");
        file_put_contents("botsData/$un/data/my_id.txt", "$from_id");
        file_put_contents("usersData/$from_id/state.txt", "none");
        $channel = file_get_contents("usersData/$chat_id/pmrs.txt");
        $class = file_get_contents("botsSource/pmrs/DevOscar.php");
        $class = str_replace("[*[TOKEN]*]", $text, $class);
        $class = str_replace("[*[ADMIN]*]", $from_id, $class);
        $class = str_replace("[*[USERNAME]*]", $un, $class);
        $class = str_replace("[*[CHANNEL]*]", $channel, $class);
        file_put_contents("botsData/$un/DevOscar.php", $class);
        copy("botsSource/pmrs/jdf.php", "botsData/$un/jdf.php");
        file_get_contents("https://api.telegram.org/bot" . $text . "/setwebhook?url=" . $folder . "/botsData/" . $un . "/DevOscar.php");
        file_put_contents("usersData/$from_id/create.txt", "yes");
        $user_b = file_get_contents("usersData/$from_id/bots.txt");
        $member_b = explode("\n", $user_b);
        if (!in_array($un, $member_b))
        {
            $add_bot = file_get_contents("usersData/$from_id/bots.txt");
            $add_bot .= $un . "\n";
            file_put_contents("usersData/$from_id/bots.txt", $add_bot);
        }
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "ربات شما با موفقیت به سرور پر قدرت ما متصل شد ⚡️", 'parse_mode' => 'html', 'reply_markup' => json_encode(['inline_keyboard' => [[['text' => "ورود به ربات 🚀", 'url' => "https://t.me/$un"]], ]]) ]);
        $coin = file_get_contents("usersData/$from_id/coin.txt");
        settype($coin, "integer");
        $newcoin = $coin - 8;
        save("usersData/$from_id/coin.txt", $newcoin);
    }
}
elseif ($state === "NetFree" && $text != "『 برگشت 』")
{
    if ($text[0] == '@') $text = substr($text, 1);
    if ((strlen($text) > 50) or strpos($text, '/') or strpos($text, '#') or strpos($text, '(') or strpos($text, ')') or strpos($text, '}') or strpos($text, '{') or strpos($text, ']') or strpos($text, '[') or strpos($text, '"') !== false)
    {
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "از ارسال کاراکتر های غیر مجاز ب ربات خودداری کنید ☝🏿", ]);
    }
    elseif (!preg_match('/^([a-zA-Z][a-zA-Z0-9_]{4,31}|)$/', $text))
    {
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => 'یوزرنیم ارسال شده اشتباه است ⛔️', ]);
    }
    else
    {
        file_put_contents("usersData/$chat_id/NetFree.txt", $text);
        file_put_contents("usersData/$from_id/state.txt", "NetFree1");
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "␥| توکن #ربات رو خود را ارسال کنید 🎐", 'parse_mode' => 'Markdown', 'reply_markup' => json_encode(['resize_keyboard' => true, 'keyboard' => [[['text' => "『 برگشت 』"]], ]]) ]);
    }
}
elseif ($state === "NetFree1")
{
    $userbot = json_decode(file_get_contents("https://api.telegram.org/bot" . $text . "/getme") , true);
    $un = $userbot["result"]["username"];
    $ok = $userbot["ok"];
    if ($ok != 1 or (strlen($text) > 50) or strpos($text, '#') or strpos($text, '/') or strpos($text, '(') or strpos($text, ')') or strpos($text, '}') or strpos($text, '{') or strpos($text, ']') or strpos($text, '[') or strpos($text, '"') !== false)
    {
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "😐❌ توکن شما معتبر نمی باشد!

توکن خود را از @BotFather دریافت کنید🤦‍♂!", ]);
    }
    else
    {
        bot('sendMessage', ['chat_id' => $chat_id, 'message_id' => $message_id + 1, 'text' => 'لطفا صبر کنید . . . ! ! ! ❤️']);
        mkdir("botsData/$un");
        mkdir("botsData/$un/data");
        touch("botsData/$un/Mahdy");
        file_put_contents("botsData/$un/coinup.txt", "2");
        file_put_contents("botsData/$un/data/my_id.txt", "$from_id");
        file_put_contents("usersData/$from_id/state.txt", "none");
        $channel = file_get_contents("usersData/$chat_id/NetFree.txt");
        $class = file_get_contents("botsSource/NetFree/DevOscar.php");
        $class = str_replace("[*[TOKEN]*]", $text, $class);
        $class = str_replace("[*[ADMIN]*]", $from_id, $class);
        $class = str_replace("[*[USERNAME]*]", $un, $class);
        $class = str_replace("[*[CHANNEL]*]", $channel, $class);
        file_put_contents("botsData/$un/DevOscar.php", $class);
        file_get_contents("https://api.telegram.org/bot" . $text . "/setwebhook?url=" . $folder . "/botsData/" . $un . "/DevOscar.php");
        file_put_contents("usersData/$from_id/create.txt", "yes");
        $user_b = file_get_contents("usersData/$from_id/bots.txt");
        $member_b = explode("\n", $user_b);
        if (!in_array($un, $member_b))
        {
            $add_bot = file_get_contents("usersData/$from_id/bots.txt");
            $add_bot .= $un . "\n";
            file_put_contents("usersData/$from_id/bots.txt", $add_bot);
        }
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "ربات شما با موفقیت به سرور پر قدرت ما متصل شد ⚡️", 'parse_mode' => 'html', 'reply_markup' => json_encode(['inline_keyboard' => [[['text' => "ورود به ربات 🚀", 'url' => "https://t.me/$un"]], ]]) ]);
        $coin = file_get_contents("usersData/$from_id/coin.txt");
        settype($coin, "integer");
        $newcoin = $coin - 8;
        save("usersData/$from_id/coin.txt", $newcoin);
    }
}
elseif ($state === "fontsz")
{
    $userbot = json_decode(file_get_contents("https://api.telegram.org/bot" . $text . "/getme") , true);
    $un = $userbot["result"]["username"];
    $ok = $userbot["ok"];
    if ($ok != 1 or (strlen($text) > 50) or strpos($text, '#') or strpos($text, '/') or strpos($text, '(') or strpos($text, ')') or strpos($text, '}') or strpos($text, '{') or strpos($text, ']') or strpos($text, '[') or strpos($text, '"') !== false)
    {
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "😐❌ توکن شما معتبر نمی باشد!

توکن خود را از @BotFather دریافت کنید🤦‍♂!", ]);
    }
    else
    {
        bot('sendMessage', ['chat_id' => $chat_id, 'message_id' => $message_id + 1, 'text' => 'لطفا صبر کنید . . . ! ! ! ❤️']);
        mkdir("botsData/$un");
        mkdir("botsData/$un/data");
        touch("botsData/$un/Mahdy");
        file_put_contents("botsData/$un/coinup.txt", "4");
        file_put_contents("botsData/$un/data/my_id.txt", "$from_id");
        file_put_contents("usersData/$from_id/state.txt", "none");
        $class = file_get_contents("botsSource/fontsz/DevOscar.php");
        $class = str_replace("[*[TOKEN]*]", $text, $class);
        $class = str_replace("[*[ADMIN]*]", $from_id, $class);
        file_put_contents("botsData/$un/DevOscar.php", $class);
        file_get_contents("https://api.telegram.org/bot" . $text . "/setwebhook?url=" . $folder . "/botsData/" . $un . "/DevOscar.php");
        file_put_contents("usersData/$from_id/create.txt", "yes");
        $user_b = file_get_contents("usersData/$from_id/bots.txt");
        $member_b = explode("\n", $user_b);
        if (!in_array($un, $member_b))
        {
            $add_bot = file_get_contents("usersData/$from_id/bots.txt");
            $add_bot .= $un . "\n";
            file_put_contents("usersData/$from_id/bots.txt", $add_bot);
        }
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "ربات شما با موفقیت به سرور پر قدرت ما متصل شد ⚡️", 'parse_mode' => 'html', 'reply_markup' => json_encode(['inline_keyboard' => [[['text' => "ورود به ربات 🚀", 'url' => "https://t.me/$un"]], ]]) ]);
        $coin = file_get_contents("usersData/$from_id/coin.txt");
        settype($coin, "integer");
        $newcoin = $coin - 12;
        save("usersData/$from_id/coin.txt", $newcoin);
    }
}
elseif ($state === "Check4Tmdid" && $text != "『 بازگشت 』")
{
	$upcion = file_get_contents("botsData/$text/coinup.txt");
	$my_id = file_get_contents("botsData/$text/data/my_id.txt");
    if ($chat_id != $my_id or ((strlen($text) > 25) or strpos($text, '/') or strpos($text, '#') or strpos($text, '(') or strpos($text, ')') or strpos($text, '}') or strpos($text, '{') or strpos($text, ']') or strpos($text, '[') or strpos($text, '"') !== false))
    {
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "❗️               Error 403               ⚠️
❌             Forbidden            ❌", ]);
        exit(false);
        file_put_contents("usersData/$from_id/state.txt", "none");
    }
    file_put_contents("usersData/$from_id/tmdid.txt", "$text");
    if ($coin >= $upcion)
    {
        $tamdid = file_get_contents("usersData/$from_id/tmdid.txt");
        unlink("botsData/$tamdid/Mahdy");
        sleep(1);
        touch("botsData/$tamdid/Mahdy");
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "✅ربات @$text با موفقیت برای 30 روز دیگر تمدید شد ", ]);
        $coin = file_get_contents("usersData/$from_id/coin.txt");
        settype($coin, "integer");
        $newcoin = $coin - $upcion;
        save("usersData/$from_id/coin.txt", $newcoin);
    }
    else
    {
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "📛 امتیاز شما کافی نیست لطفاً امتیاز جمع آوری کنید مجدد به این بخش بازگردید .

💰 امتیاز مورد نیاز ~ | $upcion |
🗽 امتیاز شما ~ | $coin |", 'parse_mode' => 'Markdown', ]);
    }
}
elseif ($state === "deleterob" && $text != "『 بازگشت 』")
{
	$my_id = file_get_contents("botsData/$text/data/my_id.txt");
    if ($chat_id != $my_id or ((strlen($text) > 25) or strpos($text, '/') or strpos($text, '#') or strpos($text, '(') or strpos($text, ')') or strpos($text, '}') or strpos($text, '{') or strpos($text, ']') or strpos($text, '[') or strpos($text, '"') !== false))
    {
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "❗️               Error 403               ⚠️
❌             Forbidden            ❌", ]);
    }
    else
    {
        deletefolder("botsData/$text");
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "✅ربات با موفقیت حذف شد.", ]);
    }
}
elseif ($state === "setref" && $text != "پنل")
{
    file_put_contents("usersData/$from_id/state.txt", "none");
    file_put_contents("settings/refral.txt", $text);
    bot('sendmessage', ['chat_id' => $Dev, 'text' => "با موفقیت ست شد و از این پس کاربران با هر دعوت مقدار $text سکه دریافت میکنند ✅", ]);
}
elseif ($state === "kasremm" && $text != "پنل")
{
    file_put_contents("usersData/$from_id/state.txt", "kasrem");
    file_put_contents("usersData/$from_id/token.txt", $text);
    $coin1 = file_get_contents("usersData/$text/coin.txt");
    bot('sendmessage', ['chat_id' => $Dev, 'text' => "این فرد $coin1 امتیاز دارد
چه مقدار امتیاز کسر شود؟", ]);
}
elseif ($state === "kasrem")
{
	$to = file_get_contents("usersData/$from_id/token.txt") ? : NULL;
    file_put_contents("usersData/$from_id/state.txt", "none");
    $coin = file_get_contents("usersData/$to/coin.txt");
    settype($coin, "integer");
    $newcoin = $coin - $text;
    save("usersData/$to/coin.txt", $newcoin);
    $cooin = $coin - $text;
    bot('sendmessage', ['chat_id' => $Dev, 'text' => "به فرد $text سکه کسر شد و سکه های او تا الان $cooin میباشد!", ]);
    bot('sendmessage', ['chat_id' => $to, 'text' => "مقدار $text امتیاز از شما کسر شد! 🍒", ]);
}
elseif ($state === "iQeuclclco" && $text != "پنل")
{
    file_put_contents("usersData/$from_id/state.txt", "sendpQefjcpm");
    file_put_contents("usersData/$from_id/info.txt", "$text");
    bot('sendMessage', ['chat_id' => $chat_id, 'text' => "تعداد اخطاری که میخوایید بهش بدید؟", 'parse_mode' => "HTML", 'reply_markup' => json_encode(['keyboard' => [[['text' => "『 بازگشت 』"]], ], 'resize_keyboard' => true, ]) ]);
}
elseif ($state === "sendpQefjcpm")
{
    file_put_contents("usersData/$from_id/state.txt", "none");
    $info = file_get_contents("usersData/$from_id/info.txt");
    file_put_contents("usersData/$info/warn.txt", $text);
    bot('sendMessage', ['chat_id' => $info, 'text' => "⚠️شما از طرف مدیریت مقدار $text اخطار دریافت کردید 

⛔️بعد از رسیدن به 3 اخطار از ربات مسدود خواهید شد", 'parse_mode' => 'HTML', ]);
    bot('sendMessage', ['chat_id' => $chat_id, 'text' => "اخطار با موفقیت ارسال شد", 'parse_mode' => 'HTML', ]);
}
elseif ($state === "delezi" && $text != "پنل")
{
    file_put_contents("usersData/$from_id/state.txt", "none");
    deletefolder("botsData/$text");
    bot('sendMessage', ['chat_id' => $chat_id, 'text' => "ربات حذف شد ✅", 'parse_mode' => "MarkDown", 'reply_markup' => json_encode(['keyboard' => [[['text' => "پنل"]], ], 'resize_keyboard' => true, ]) ]);
}
elseif ($state === "setchanel1" && $text != "پنل")
{
    file_put_contents("usersData/$from_id/state.txt", "none");
    file_put_contents("settings/chnnl11.txt", $text);
    bot('sendMessage', ['chat_id' => $Dev, 'text' => "کانال @$text با موفقیت ب عنوان جویین اجباری ست شد ✅", ]);
}
elseif ($state === "setchanel2" && $text != "پنل")
{
    file_put_contents("usersData/$from_id/state.txt", "none");
    file_put_contents("settings/chnnl22.txt", $text);
    bot('sendMessage', ['chat_id' => $Dev, 'text' => "کانال @$text با موفقیت ب عنوان جویین اجباری ست شد ✅", ]);
}
elseif ($state === "info" && $text != "پنل")
{
    file_put_contents("usersData/$from_id/state.txt", "sendpm");
    file_put_contents("usersData/$from_id/info.txt", "$text");
    bot('sendMessage', ['chat_id' => $chat_id, 'text' => "📨 | پیام خود را ارسال کنید تا به کاربر مورد نظر ارسال کنم !", 'parse_mode' => "HTML", 'reply_markup' => json_encode(['keyboard' => [[['text' => "پنل"]], ], 'resize_keyboard' => true, ]) ]);
}
elseif ($state === "sendpm")
{
    file_put_contents("usersData/$from_id/state.txt", "none");
    $info = file_get_contents("usersData/$from_id/info.txt");
    bot('sendMessage', ['chat_id' => $info, 'text' => "شما یک پیام از پشتیبانی دارید 👨🏼‍💻

📨↝ $text ↜📨

💫| کد پیام :$message_id
⏰ |  ساعت : $time
🗓 |  تاریخ : $ambar", 'parse_mode' => 'HTML', ]);
    bot('sendMessage', ['chat_id' => $chat_id, 'text' => "🖥 | پیام شما به کاربر گرامی مورد نظر ارسال شد .", 'parse_mode' => 'HTML', ]);
}
elseif ($state === "pm" && $text != "پنل")
{
    file_put_contents("usersData/$from_id/state.txt", "none");
    bot('sendMessage', ['chat_id' => $chat_id, 'text' => "📥 | پیام شما با موفقیت ارسال شد !", ]);
    $all_member = fopen("MMBER.txt", "r");
    while (!feof($all_member))
    {
        $user = fgets($all_member);
        sendMessage($user, $text, "html");
    }
}
elseif ($state === "fromidforcoin" && $text != "پنل")
{
    file_put_contents("usersData/$from_id/state.txt", "tedadecoin4set");
    file_put_contents("usersData/$from_id/token.txt", $text);
    $coin1 = file_get_contents("usersData/$text/coin.txt");
    bot('sendMessage', ['chat_id' => $Dev, 'text' => "♻️ | این فرد $coin1 سکه دارد !
چقدر امتیاز به این کاربر گرامی سکه ارسال شود ؟", ]);
}
elseif ($state === "tedadecoin4set")
{
	$to = file_get_contents("usersData/$from_id/token.txt") ? : NULL;
    file_put_contents("usersData/$from_id/state.txt", "none");
    $coin = file_get_contents("usersData/$to/coin.txt");
    settype($coin, "integer");
    $newcoin = $coin + $text;
    save("usersData/$to/coin.txt", $newcoin);
    $cooin = $coin + $text;
    bot('sendMessage', ['chat_id' => $Dev, 'text' => "به فرد $text سکه اضافه شد و سکه های او تا الان $cooin میباشد!", ]);
    bot('sendMessage', ['chat_id' => $to, 'text' => "🎊 | از طرف مدیریت ربات به شما $text سکه ارسال شد !", ]);
}
elseif ($state === "shar" && $text != "پنل")
{
    file_put_contents("usersData/$from_id/shar.txt", "$text");
    bot('sendMessage', ['chat_id' => $chat_id, 'text' => "ایدی $text از ربات بلاک شد", ]);
    $adduser = file_get_contents("usersData/blocklist.txt");
    $adduser .= $text . "\n";
    file_put_contents("usersData/blocklist.txt", $adduser);
    file_put_contents("usersData/$from_id/state.txt", "no");
    $id11 = file_get_contents("usersData/$from_id/shar.txt");
    bot('sendMessage', ['chat_id' => $id11, 'text' => "ارتباط شما با سرور ما قطع شد و نمیتوانید از بات استفاده کنید 😹", ]);
}
elseif ($state === "sharr" && $text != "پنل")
{
    $newlist = str_replace($text, "", $blocklist);
    file_put_contents("usersData/blocklist.txt", $newlist);
    file_put_contents("usersData/$chat_id/state.txt", "none");
    bot('Sendmessage', ['chat_id' => $chat_id, 'text' => "خب ایدی $text از بلاکی درآمد 😎", ]);
}
elseif ($state === "BotCrInfo" && $text != "پنل")
{
    file_put_contents("usersData/$from_id/state.txt", "none");
    $dayoffCr = (2505600 - (time() - filectime("botsData/$text/Mahdy"))) / 60 / 60 / 24;
    $dayoffCr = round($dayoffCr, 0);
    $userCr = file_get_contents("botsData/$text/MMBER.txt");
    $member_idCr = explode("\n", $userCr);
    $member_countCr = count($member_idCr);
    $botownerCr = file_get_contents("botsData/$text/usersData/my_id.txt");
    $scanCr = scandir("botsData/$text/botsData");
    unset($scanCr[0], $scanCr[1]);
    foreach ($scanCr as $scansCr)
    {
        $txtxCr .= "@$scansCr\n";
    }
    $tedadCr = count($scanCr);
    bot('sendMessage', ['chat_id' => $chat_id, 'text' => "Bots Created ID:
$txtxCr-===============-", ]);
    bot('sendMessage', ['chat_id' => $chat_id, 'text' => "اطلاعات ربات ساز ب شرح زیر میباشد 👇🏽 :
-===============-
Bot ID : @$text
Owner OF Bot : <code>$botownerCr</code>
Expiration : <b>$dayoffCr</b> Days
All Users : <b>$member_countCr</b>
Bots Created : $tedadCr
-===============-
@$channel 🤖
@$botuser 👤", 'parse_mode' => "HTML", 'reply_markup' => json_encode(['keyboard' => [[['text' => "پنل"]], ], 'resize_keyboard' => true, ]) ]);
}
elseif ($state === "BotInfo" && $text != "پنل")
{
    $botowner = file_get_contents("botsData/$text/data/my_id.txt");
    $dayoff = (2505600 - (time() - filectime("botsData/$text/Mahdy"))) / 60 / 60 / 24;
    $dayoff = round($dayoff, 0);
    file_put_contents("usersData/$from_id/state.txt", "none");
    bot('sendMessage', ['chat_id' => $chat_id, 'text' => "اطلاعات ربات ب شرح زیر میباشد 👇🏽 :
-===============-
Bot ID : @$text
Owner OF Bot : <code>$botowner</code>
Expiration : <b>$dayoff</b> Days
-===============-
@$channel 🤖
@$botuser 👤", 'parse_mode' => "HTML", 'reply_markup' => json_encode(['keyboard' => [[['text' => "پنل"]], ], 'resize_keyboard' => true, ]) ]);
}
elseif ($state === "mok" && $text != "『 بازگشت 』")
{
    bot('ForwardMessage', ['chat_id' => $Dev, 'from_chat_id' => $from_id, 'message_id' => $message_id]);
    bot('sendMessage', ['chat_id' => $chat_id, 'text' => "پیام شما با موفقیت برای ادمین ارسال شد  |🕊|
لدفا تا زمانی ک پاسخ پیام را دریافت نکرده اید پیام دیگری ارسال نکنید |❤️|", ]);
    bot('sendMessage', ['chat_id' => $Dev, 'text' => "⬛| آیدی عددی :<pre>$from_id</pre>
💫| کد پیام :$message_id
⏰|  ساعت : $time
🗓️|  تاریخ : $ambar", 'parse_mode' => 'HTML', 'reply_markup' => json_encode(['keyboard' => [[['text' => '📩 | پیام به کاربر']], ], 'resize_keyboard' => true, ]) ]);
    file_put_contents("usersData/$from_id/state.txt", "none");
}
elseif ($state === "delezi" && $text != "پنل")
{
    file_put_contents("usersData/$from_id/state.txt", "none");
    deletefolder("botsData/$text");
    bot('sendMessage', ['chat_id' => $chat_id, 'text' => "ربات حذف شد ✅", 'parse_mode' => "MarkDown", 'reply_markup' => json_encode(['keyboard' => [[['text' => "پنل"]], ], 'resize_keyboard' => true, ]) ]);
}
elseif ($state === "info" && $text != "پنل")
{
    file_put_contents("usersData/$from_id/state.txt", "sendpm");
    file_put_contents("usersData/$from_id/info.txt", "$text");
    bot('sendMessage', ['chat_id' => $chat_id, 'text' => "لطفا پیام خود را وارد کنید✏", 'parse_mode' => "HTML", 'reply_markup' => json_encode(['keyboard' => [[['text' => "پنل"]], ], 'resize_keyboard' => true, ]) ]);
}
elseif ($state === "sendpm")
{
    file_put_contents("usersData/$from_id/state.txt", "none");
    file_put_contents("usersData/$from_id/sendpm.txt", "$text");
    $sendpm = file_get_contents("usersData/$from_id/sendpm.txt");
    $info = file_get_contents("usersData/$from_id/info.txt");
    bot('sendMessage', ['chat_id' => $info, 'text' => $text, 'parse_mode' => 'HTML', ]);
    bot('sendMessage', ['chat_id' => $chat_id, 'text' => "پیام شما به کاربر مورد نظر ارسال شد📮", 'parse_mode' => 'HTML', ]);
}
elseif ($state === "fromidforcoin" && $text != "پنل")
{
    file_put_contents("usersData/$from_id/state.txt", "tedadecoin4set");
    file_put_contents("usersData/$from_id/token.txt", $text);
    $coin1 = file_get_contents("usersData/$text/coin.txt");
    bot('sendMessage', ['chat_id' => $Dev, 'text' => "این فرد $coin1 امتیاز دارد
چه مقدار امتیاز  اضافه کنم؟", ]);
}
elseif ($state === "tedadecoin4set")
{
	$to = file_get_contents("usersData/$from_id/token.txt") ? : NULL;
    file_put_contents("usersData/$from_id/state.txt", "none");
    $coin = file_get_contents("usersData/$to/coin.txt");
    settype($coin, "integer");
    $newcoin = $coin + $text;
    save("usersData/$to/coin.txt", $newcoin);
    $cooin = $coin + $text;
    bot('sendMessage', ['chat_id' => $Dev, 'text' => "به فرد $text سکه اضافه شد و سکه های او تا الان $cooin میباشد!", ]);
    bot('sendMessage', ['chat_id' => $to, 'text' => "از طرف مالک ربات شما  $text سکه دریافت کردید . 🙂", ]);
}
elseif ($state === "informatin" && $text != "پنل")
{
    file_put_contents("usersData/$from_id/state.txt", "none");
    $zirs = file_get_contents('usersData/' . $text . "/membrs.txt");
    $coin = file_get_contents('usersData/' . $text . "/coin.txt");
    $phone = file_get_contents('usersData/' . $text . "/bots.txt");
    $txtt = file_get_contents("usersData/$text/mems.txt");
    $userwarm = file_get_contents("usersData/$text/warn.txt");
    bot('sendMessage', ['chat_id' => $chat_id, 'text' => "-=====================-
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

❤️ @$channel", 'parse_mode' => "html", 'reply_markup' => json_encode(['resize_keyboard' => true, 'keyboard' => [[['text' => "پنل"], ], ]]) ]);
}
elseif ($state === "em0" && $text != "پنل")
{
    $aaddd = file_get_contents("usersData/$text/coin.txt");
    file_put_contents("usersData/$text/coin.txt", "0");
    bot('sendMessage', ['chat_id' => $chat_id, 'text' => "🔪 امتیاز های او صفر شد", ]);
    bot('sendMessage', ['chat_id' => $text, 'text' => "کاربر گرامی سکه های شما به دلیل راعایت نکردن قوانین رباتساز صفر شد ❌", ]);
    file_put_contents("usersData/$from_id/state.txt", "none");
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
elseif ($state === "coin to all 2" && $text != "پنل")
{
    if ($text === "خیر")
    {
        unlink("usersData/$from_id/wait.txt");
        file_put_contents("usersData/$from_id/state.txt", 'none');
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "✅ با موفقیت لغو شد !", 'reply_to_message_id' => $message_id, 'parse_mode' => 'HTML', 'reply_markup' => json_encode(['keyboard' => [[['text' => 'پنل']], ], 'resize_keyboard' => true]) ]);
    }
    elseif ($text === "بله")
    {
		$wait = file_get_contents("usersData/$from_id/wait.txt") ? : NULL;
        $Member = explode("\n", $list);
        $count = count($Member) - 2;
        file_put_contents("usersData/$from_id/state.txt", 'none');
        for ($z = 0;$z <= $count;$z++)
        {
            $user = $Member[$z];
            if ($user != "\n" && $user != " ")
            {
                $id = json_decode(file_get_contents("https://api.telegram.org/bot" . API_KEY . "/getChat?chat_id=" . $user));
                $user2 = $id->result->id;
                if ($user2 != null)
                {
                    $coin = file_get_contents("usersData/$user/coin.txt");
                    file_put_contents("usersData/$user/coin.txt", $coin + $wait);
                    bot('sendMessage', ['chat_id' => $user, 'text' => "سلام دوست عزیز ❤️
✅ به دلیل حمایت شما به شما $wait سکه داده شده !", 'parse_mode' => 'html']);
                }
            }
        }
        unlink("usersData/$from_id/wait.txt");
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "✅ با موفقیت به تمام اعضا مقدار $wait سکه ارسال شد !", 'reply_to_message_id' => $message_id, 'parse_mode' => 'HTML', 'reply_markup' => json_encode(['keyboard' => [[['text' => 'پنل']], ], 'resize_keyboard' => true]) ]);
    }
    else
    {
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "💢 لطفا فقط از کیبورد زیر انتخاب کنید :", 'reply_to_message_id' => $message_id, 'parse_mode' => 'HTML', 'reply_markup' => json_encode(['keyboard' => [[['text' => 'پنل']], [['text' => "خیر"], ['text' => "بله"]], ], 'resize_keyboard' => true]) ]);
    }
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
elseif ($state === "tamdid" && $text != "پنل")
{
    $aaddd = file_get_contents("botsData/$text/data/my_id.txt");
    unlink("botsData/$text/Mahdy");
    sleep(1);
    touch("botsData/$text/");
    bot('sendMessage', ['chat_id' => $chat_id, 'text' => "ربات @$text با موفقیت برای 30 روز دیگر تمدید شد ✅", ]);
    bot('sendMessage', ['chat_id' => $aaddd, 'text' => "ربات شما با آیدی @$text با موفقیت برای 30 روز دیگر تمدید شد در صورت بروز مشکل ب پشتیبانی مراجعه کنید ✅", ]);
    file_put_contents("usersData/$from_id/state.txt", "none");
}
elseif ($state === "coin to all" && $text != "پنل")
{
    if (preg_match('/^([0-9])/', $text))
    {
        file_put_contents("usersData/$from_id/wait.txt", $text);
        file_put_contents("usersData/$from_id/state.txt", "coin to all 2");
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "⁉️ آیا ارسال $text سکه به تمام کاربران ربات را تایید میکنید ؟

بله یا خیر؟", 'reply_to_message_id' => $message_id, 'parse_mode' => 'HTML', 'reply_markup' => json_encode(['keyboard' => [[['text' => 'پنل']], [['text' => "خیر"], ['text' => "بله"]], ], 'resize_keyboard' => true]) ]);
    } else bot('sendMessage', ['chat_id' => $chat_id, 'text' => "⚠️ ورودی نامعتبر است !
👈🏻 لطفا فقط عدد ارسال کنید :", 'reply_to_message_id' => $message_id, 'parse_mode' => 'HTML', 'reply_markup' => json_encode(['keyboard' => [[['text' => 'پنل']], ], 'resize_keyboard' => true]) ]);
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
?>