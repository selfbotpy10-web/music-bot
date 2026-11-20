<?php
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
$day = (2505600 - (time() - filectime('Mahdy'))) / 60 / 60 / 24;
$day = round($day, 0);
define('API_KEY',"[*[TOKEN]*]");//توکن
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
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
}
//=================================================//
function sendmessage($chat_id,$text,$parse_mode,$keyboard){
	bot('sendMessage',[
	'chat_id'=>$chat_id,
	'text'=>$text,
	'parse_mode'=>$parse_mode,
	'reply_markup'=>$keyboard
	]);
}
function em($chatid,$message_id,$parsmde,$text,$keyboard){
    bot('editmessagetext',[ 
    'chat_id'=>$chatid, 
    'message_id'=>$message_id,
    'text'=>$text,
    'parse_mode'=>$parsmde,
    'reply_markup'=>$keyboard
	]);
	}
	function ForwardMessage($kojashe,$azkoja,$kodomMSG)
{
    bot('ForwardMessage',[
        'chat_id'=>$kojashe,
        'from_chat_id'=>$azkoja,
        'message_id'=>$kodomMSG
        ]);
}
function SendPhoto($chat_id, $photo, $caption, $messageid, $keyboard){
	bot('SendPhoto',[
    'chat_id'=>$chat_id,
    'photo'=>$photo,
    'caption'=>$caption,
    'reply_to_message_id'=>$messageid,
    'reply_markup'=>$keyboard
     ]);
     }
     function SendAudio($chatid,$audio){
	bot('SendAudio',[
	'chat_id'=>$chatid,
	'audio'=>$audio,
	]);
	}
     function save($filename,$TXTdata){
	$myfile = fopen($filename, "w") or die("Unable to open file!");
	fwrite($myfile, "$TXTdata");
	fclose($myfile);
	}
	function SetFlood($ChatId)
{
  if (!file_exists('Cash/PV/' . $ChatId)) file_put_contents('Cash/PV/' . $ChatId, '0');
  if (time() >= file_get_contents('Cash/PV/' . $ChatId)) {
    file_put_contents('Cash/PV/' . $ChatId, time() + 0.8);
    return true;
  } else return false;
} 
//====================================================
$dev = "[*[ADMIN]*]";//ایدی عددی
$token ="[*[TOKEN]*]" ;//توکن
$channel = "@[*[CHANNEL]*]";//ایدی چنل یا @
$BotId = "[*[USERNAME]*]"; // بدون@ایدی بات
//========================
$update = json_decode(file_get_contents("php://input"));
$message = $update->message;
$message_id = $update->message->message_id;
$data = isset($message->text)?$message->text:$update->callback_query->data;
$chat_id = isset($update->callback_query->message->chat->id)?$update->callback_query->message->chat->id:$update->message->chat->id;
$from_id = isset($update->callback_query->message->from->id)?$update->callback_query->message->from->id:$update->message->from->id;

$text = $update->message->text;
$state = file_get_contents("data/$chat_id/state.txt");
$mi = isset($update->callback_query->message->message_id)?$update->callback_query->message->message_id:null;
$first_n = $update->message->from->first_name;
$last_n = $update->message->from->last_name;
$first = $update->callback_query->from->first_name;
$last = $update->callback_query->from->last_name;
$b = file_get_contents("type.txt");
$pic = "https://s6.uupload.ir/files/doctor-thing1-audio-01_knts.jpg";//لینک عکس
$usernamee = $update->message->from->username;
$username = $update->callback_query->from->username;
$truechannel = json_decode(file_get_contents("https://api.telegram.org/bot$token/getChatMember?chat_id=$channel&user_id=".$chat_id));
$channel_check = $truechannel->result->status;
//================
$user = json_decode(file_get_contents("data/user.json"),true);
$step = json_decode(file_get_contents("data/$chat_id.json"),true);
$coins = $step["userinfo"]["$chat_id"]["coin"];
$invited = $step["userinfo"]["$chat_id"]["invite"];
$state = $step["userinfo"]["$chat_id"]["state"];
//=========
$girl = json_encode(['inline_keyboard'=>[
[['text'=>"🙍🏻‍♀️سلام","callback_data"=>"dar"],['text'=>"خوبی🙍🏻‍♀️","callback_data"=>"daar"]],
[['text'=>"چند سالته🙍🏻‍♀️","callback_data"=>"d5ar"],['text'=>"دوست دارم🙍🏻‍♀️","callback_data"=>"d6ar"]],
[['text'=>"کجایی🙍🏻‍♀️","callback_data"=>"da7r"],['text'=>"چشم🙍🏻‍♀️","callback_data"=>"diar"]],
[['text'=>"اسمت چیه🙍🏻‍♀️","callback_data"=>"da9r"],['text'=>"قربونت🙍🏻‍♀️","callback_data"=>"0dar"]],
[['text'=>"خوشگلم🙍🏻‍♀️","callback_data"=>"dawr"],['text'=>"دوست ندارم🙍🏻‍♀️","callback_data"=>"daqr"]],
[['text'=>"خدافظ🙍🏻‍♀️","callback_data"=>"daer"],['text'=>"فعلا🙍🏻‍♀️","callback_data"=>"drar"]],
[['text'=>"قهرم🙍🏻‍♀️","callback_data"=>"dayr"],['text'=>"زندگیمی🙍🏻‍♀️","callback_data"=>"dtar"]],
[['text'=>"میمیرم برات🙍🏻‍♀️","callback_data"=>"daur"],['text'=>"چیشده🙍🏻‍♀️","callback_data"=>"daor"]],
[['text'=>"عالی🙍🏻‍♀️","callback_data"=>"dara"],['text'=>"والا به خدا🙍🏻‍♀️","callback_data"=>"daraa"]],
[['text'=>"میدونم🙍🏻‍♀️","callback_data"=>"dars"],['text'=>"اوکی🙍🏻‍♀️","callback_data"=>"dargg"]],
[['text'=>"جووون🙍🏻‍♀️","callback_data"=>"dard"],['text'=>"نپسندیدم🙍🏻‍♀️","callback_data"=>"dardd"]],
[['text'=>"چیه🙍🏻‍♀️","callback_data"=>"darj"],['text'=>"عشقم🙍🏻‍♀️","callback_data"=>"darjj"]],
[['text'=>"دقیقا🙍🏻‍♀️","callback_data"=>"dark"],['text'=>"الهی چرا اخه🙍🏻‍♀️","callback_data"=>"darz"]],
[['text'=>"منم عاشقتم🙍🏻‍♀️","callback_data"=>"darl"],['text'=>"اهان🙍🏻‍♀️","callback_data"=>"darll"]],
[['text'=>"با عشقم درست صحبت کنید🙍🏻‍♀️","callback_data"=>"darzz"],['text'=>"خدا نکنه عشقم🙍🏻‍♀️","callback_data"=>"zzdar"]],
[['text'=>"چه خبرا🙍🏻‍♀️","callback_data"=>"dxar"],['text'=>"موافقتم عشقم🙍🏻‍♀️","callback_data"=>"darx"]],
[['text'=>"من ناهار فعلا عشقم🙍🏻‍♀️","callback_data"=>"xxdar"],['text'=>"فاطمه 18 از تهران🙍🏻‍♀️","callback_data"=>"dacr"]],
[['text'=>"من صبحانه فعلا🙍🏻‍♀️","callback_data"=>"dxxar"],['text'=>"کاش پیشه من بودی🙍🏻‍♀️","callback_data"=>"daxxr"]],
[['text'=>"نتم الان تموم میشههه🙍🏻‍♀️","callback_data"=>"dacrasd"],['text'=>"مال خودمی🙍🏻‍♀️","callback_data"=>"dcar"]],
[['text'=>"اره فدات🙍🏻‍♀️","callback_data"=>"dccar"],['text'=>"بیا پی وی🙍🏻‍♀️","callback_data"=>"darcccc"]],
[['text'=>"رل بزنیم🙍🏻‍♀️","callback_data"=>"davr"],['text'=>"اندازه تار موهات دوست دارم🙍🏻‍♀️","callback_data"=>"dvar"]],
[['text'=>"فدای حرف زدنت بشم🙍🏻‍♀️","callback_data"=>"da123r"],['text'=>"گوگولیا اصل بدید دیگه🙍🏻‍♀️","callback_data"=>"dvvar"]],
[['text'=>"سلام خوبین شما عصر شما هم بخیر🙍🏻‍♀️","callback_data"=>"darvv"],['text'=>"سلام صبح تو ام بخیر🙍🏻‍♀️","callback_data"=>"dmmar"]],
[['text'=>"عکستو بفرست🙍🏻‍♀️","callback_data"=>"daaaerar"],['text'=>"باز گشت↩️","callback_data"=>"back"]],
],'resize_keyboard'=>true]);
$boy = json_encode(['inline_keyboard'=>[
[['text'=>"🙍🏻‍♂️سلام","callback_data"=>"q"],['text'=>"🙍🏻‍♂️خوبی","callback_data"=>"qq"]],
[['text'=>"🙍🏻‍♂️ممنون","callback_data"=>"qqq"],['text'=>"مرسی🙍🏻‍♂️","callback_data"=>"qqqq"]],
[['text'=>"فدات🙍🏻‍♂️","callback_data"=>"qqqqq"],['text'=>"اصل🙍🏻‍♂️","callback_data"=>"qqqqqq"]],
[['text'=>"دوست دارم🙍🏻‍♂️","callback_data"=>"ww"],['text'=>"عزیزی🙍🏻‍♂️","callback_data"=>"www"]],
[['text'=>"اسمت چیه🙍🏻‍♂️","callback_data"=>"wwwww"],['text'=>"قربونت🙍🏻‍♂️","callback_data"=>"wwwwww"]],
[['text'=>"خوشگلم🙍🏻‍♂️","callback_data"=>"e"],['text'=>"🙍🏻‍♂️اوکی","callback_data"=>"yyyyy"]],
[['text'=>"خدافظ🙍🏻‍♂️","callback_data"=>"eee"],['text'=>"فعلا🙍🏻‍♂️","callback_data"=>"eeee"]],
[['text'=>"قهرم🙍🏻‍♂️","callback_data"=>"eeeee"],['text'=>"زندگیمی🙍🏻‍♂️","callback_data"=>"eeeeee"]],
[['text'=>"بدون تو میمیرم🙍🏻‍♂️","callback_data"=>"r"],['text'=>"میمیرم برات🙍🏻‍♂️","callback_data"=>"rr"]],
[['text'=>"واو🙍🏻‍♂️","callback_data"=>"rrr"],['text'=>"🙍🏻‍♂️چشم","callback_data"=>"rrrr"]],
[['text'=>"چیشده🙍🏻‍♂️","callback_data"=>"rrrrr"],['text'=>"🙍🏻‍♂️خیلی","callback_data"=>"rrrrrr"]],
[['text'=>"عالی🙍🏻‍♂️","callback_data"=>"t"],['text'=>"🙍🏻‍♂️والا به خدا","callback_data"=>"tt"]],
[['text'=>"میدونم🙍🏻‍♂️","callback_data"=>"ttt"],['text'=>"🙍🏻‍♂️والا","callback_data"=>"ttttt"]],
[['text'=>"جووون🙍🏻‍♂️","callback_data"=>"y"],['text'=>"🙍🏻‍♂️نپسندیدم","callback_data"=>"tttttt"]],
[['text'=>"به خدا🙍🏻‍♂️ ","callback_data"=>"yy"],['text'=>"🙍🏻‍♂️نه عشقم","callback_data"=>"yyy"]],
[['text'=>"فدات که🙍🏻‍♂️","callback_data"=>"yyyyyy"],['text'=>"🙍🏻‍♂️دان نمیشه","callback_data"=>"u"]],
[['text'=>"چیه🙍🏻‍♂️","callback_data"=>"uu"],['text'=>"🙍🏻‍♂️عشقم","callback_data"=>"uuu"]],
[['text'=>"دقیقا🙍🏻‍♂️","callback_data"=>"uuuu"],['text'=>"🙍🏻‍♂️اره","callback_data"=>"uuuuu"]],
[['text'=>"منم عاشقتم🙍🏻‍♂️","callback_data"=>"uuuuuu"],['text'=>"🙍🏻‍♂️اهان","callback_data"=>"i"]],
[['text'=>"الهی چرا اخه🙍🏻‍♂️","callback_data"=>"ii"],['text'=>"🙍🏻‍♂️ای بابا","callback_data"=>"iii"]],
[['text'=>"با عشقم درست صحبت کنید🙍🏻‍♂️","callback_data"=>"iiii"],['text'=>"🙍🏻‍♂️خدا نکنه عشقم","callback_data"=>"iiiii"]],
[['text'=>"کدوم ملت🙍🏻‍♂️","callback_data"=>"iiiiii"],['text'=>"🙍🏻‍♂️چه خبرا","callback_data"=>"o"]],
[['text'=>"من ناهار فعلا عزیزم🙍🏻‍♂️","callback_data"=>"oo"],['text'=>"🙍🏻‍♂️موافقتم عشقم","callback_data"=>"ooo"]],
[['text'=>"شارژ ندارم عزیزم🙍🏻‍♂️","callback_data"=>"oooo"],['text'=>"سلام خوبین شما عصر شما هم بخیر🙍🏻‍♂️","callback_data"=>"ss"]],
[['text'=>"من صبحانه فعلا زندگیم🙍🏻‍♂️","callback_data"=>"oooooo"],['text'=>"🙍🏻‍♂️کاش پیشه من بودی","callback_data"=>"p"]],
[['text'=>"محمد 18 از تهران🙍🏻‍♂️","callback_data"=>"pp"],['text'=>"🙍🏻‍♂️با یه دنیا عوضت نمیکنم","callback_data"=>"ppp"]],
[['text'=>"نتم الان تموم میشههه🙍🏻‍♂️","callback_data"=>"pppp"],['text'=>"🙍🏻‍♂️مال خودمی","callback_data"=>"ppppp"]],
[['text'=>"به فکرتم🙍🏻‍♂️","callback_data"=>"aa"],['text'=>"🙍🏻‍♂️بیا پی وی","callback_data"=>"aaa"]],
[['text'=>"رل بزنیم🙍🏻‍♂️","callback_data"=>"aaaa"],['text'=>"🙍🏻‍♂️اندازه تار موهات دوست دارم","callback_data"=>"aaaaa"]],
[['text'=>"فدای حرف زدنت بشم🙍🏻‍♂️","callback_data"=>"aaaaaa"],['text'=>"🙍🏻‍♂️گوگولیا اصل بدید دیگه","callback_data"=>"s"]],
[['text'=>"🙍🏻‍♂️اهان این الان تیکه بود","callback_data"=>"ssssss"],['text'=>"باز گشت↩️","callback_data"=>"back"]],
],'resize_keyboard'=>true]);
$foshgirl = json_encode(['inline_keyboard'=>[
[['text'=>"عوضی🙍🏻‍♀️","callback_data"=>"avazi"],['text'=>"بتخمم🙍🏻‍♀️","callback_data"=>"betokhmam"]],
[['text'=>"بکیرم🙍🏻‍♀️","callback_data"=>"bekiram"],['text'=>"بز🙍🏻‍♀️","callback_data"=>"boz"]],
[['text'=>"به تخمکم🙍🏻‍♀️","callback_data"=>"betokhmakam"],['text'=>"گوه نخور🙍🏻‍♀️","callback_data"=>"gohnakhoor"]],
[['text'=>"گوه خور🙍🏻‍♀️","callback_data"=>"gohkhoor"],['text'=>"گوسفند🙍🏻‍♀️","callback_data"=>"gosfand"]],
[['text'=>"کثافت🙍🏻‍♀️","callback_data"=>"kesafat"],['text'=>"خر🙍🏻‍♀️","callback_data"=>"khar"]],
[['text'=>"خفه شو🙍🏻‍♀️","callback_data"=>"khafesho"],['text'=>"مادر جنده🙍🏻‍♀️","callback_data"=>"madarjendeh"]],
[['text'=>"کص ننت🙍🏻‍♀️","callback_data"=>"kosnanat"],['text'=>"کص عمت🙍🏻‍♀️","callback_data"=>"kosamat"]],
[['text'=>"لاشی🙍🏻‍♀️","callback_data"=>"lashi"],['text'=>"ننه جنده🙍🏻‍♀️","callback_data"=>"nanejendeh"]],
[['text'=>"الاغ🙍🏻‍♀️","callback_data"=>"olagh"],['text'=>"پدر سگ🙍🏻‍♀️","callback_data"=>"pedarsag"]],
[['text'=>"سگ توت🙍🏻‍♀️","callback_data"=>"sagtoot"],['text'=>"توت سگ🙍🏻‍♀️","callback_data"=>"tootsag"]],
[['text'=>"باز گشت↩️","callback_data"=>"back"]],
],'resize_keyboard'=>true]);
$foshpesar = json_encode(['inline_keyboard'=>[
[['text'=>"عوضی🙎🏻‍♂️♀️","callback_data"=>"avaz2i"],['text'=>"بتخمم🙎🏻‍♂️♀️","callback_data"=>"betokhmam2"]],
[['text'=>"بکیرم🙎🏻‍♂️♀️","callback_data"=>"bekiram2"],['text'=>"بز🙎🏻‍♂️♀️","callback_data"=>"boz2"]],
[['text'=>"خار کصه🙎🏻‍♂️♀️","callback_data"=>"kharkosem"],['text'=>"گوه نخور🙎🏻‍♂️♀️","callback_data"=>"gohnakhoor2"]],
[['text'=>"گوه خور🙎🏻‍♂️♀️","callback_data"=>"gohkhoor2"],['text'=>"گوسفند🙎🏻‍♂️♀️","callback_data"=>"gosfand2"]],
[['text'=>"کثافت🙎🏻‍♂️♀️","callback_data"=>"kesafat2"],['text'=>"خر🙎🏻‍♂️♀️","callback_data"=>"khar2"]],
[['text'=>"خفه شو🙎🏻‍♂️♀️","callback_data"=>"khafesho2"],['text'=>"مادر جنده🙎🏻‍♂️♀️","callback_data"=>"madarjendeh2"]],
[['text'=>"کص ننت🙎🏻‍♂️♀️","callback_data"=>"kosnanat2"],['text'=>"کص عمت🙎🏻‍♂️♀️","callback_data"=>"kosamat2"]],
[['text'=>"لاشی🙎🏻‍♂️♀️","callback_data"=>"lashi2"],['text'=>"ننه جنده🙎🏻‍♂️♀️","callback_data"=>"nanejendeh2"]],
[['text'=>"الاغ🙎🏻‍♂️♀️","callback_data"=>"olagh2"],['text'=>"پدر سگ🙎🏻‍♂️♀️","callback_data"=>"pedarsag2"]],
[['text'=>"ساک بزن🙎🏻‍♂️♀️","callback_data"=>"suckbezan"],['text'=>"کص لیس🙎🏻‍♂️♀️","callback_data"=>"koslis"]],
[['text'=>"باز گشت↩️","callback_data"=>"back"],['text'=>"خایمال🙎🏻‍♂️","callback_data"=>"khayemal"]],
],'resize_keyboard'=>true]);
$boy2 = json_encode(['inline_keyboard'=>[
[['text'=>"🙍🏻‍♂عکس بده","callback_data"=>"ax2"],['text'=>"🙍🏻‍♂عاشقتم","callback_data"=>"ashegetam2"]],
[['text'=>"🙍🏻‍♂بدون تو میمیرم","callback_data"=>"bedoonto2"],['text'=>"بریم خرید🙍🏻‍♂️","callback_data"=>"berimkharid2"]],
[['text'=>"چخبرا🙍🏻‍♂️","callback_data"=>"chekhabara2"],['text'=>"چخبرا جقی🙍🏻‍♂️","callback_data"=>"chekhabarajagi"]],
[['text'=>"فدات شم من🙍🏻‍♂️","callback_data"=>"fadatshamman2"],['text'=>"فاک یو🙍🏻‍♂️","callback_data"=>"fucku2"]],
[['text'=>"گمشو🙍🏻‍♂️","callback_data"=>"gomshoo2"],['text'=>"حله🙍🏻‍♂️","callback_data"=>"hale"]],
[['text'=>"جنده کی بودی تو🙍🏻‍♂️","callback_data"=>"jndekiboodito"],['text'=>"🙍🏻‍♂خاک بر سرت","callback_data"=>"khakbarsaret"]],
[['text'=>"خنگ خدا🙍🏻‍♂️","callback_data"=>"khengkhoda"],['text'=>"خویی🙍🏻‍♂️","callback_data"=>"jhobi"]],
[['text'=>"کجا بودی🙍🏻‍♂️","callback_data"=>"kojaboodi"],['text'=>"مگه بت نگفتم🙍🏻‍♂️","callback_data"=>"magebetnagoftam"]],
[['text'=>"ممنون🙍🏻‍♂️","callback_data"=>"mamnoon2"],['text'=>"منم دوست دارم🙍🏻‍♂️","callback_data"=>"manamdoosetdaram"]],
[['text'=>"نه بابا🙍🏻‍♂️","callback_data"=>"nababa"],['text'=>"🙍🏻‍♂رل بزنیم","callback_data"=>"relbezanim"]],
[['text'=>"سلام🙍🏻‍♂️","callback_data"=>"salam2"],['text'=>"🙍🏻‍♂شرو و ور نگو","callback_data"=>"sherover"]],
[['text'=>"باز گشت↩️","callback_data"=>"back"],['text'=>"ایزی ایزی تامام تامام🙍🏻‍♂️","callback_data"=>"tamam2"]],
],'resize_keyboard'=>true]);
$girlen = json_encode(['inline_keyboard'=>[
[['text'=>"do u like me🙍🏻‍♀️","callback_data"=>"doulikeme"],['text'=>"fuck u🙍🏻‍♀️","callback_data"=>"fuckuu"]],
[['text'=>"hi🙍🏻‍♀️","callback_data"=>"hhi"],['text'=>"how are u🙍🏻‍♀️","callback_data"=>"howareu"]],
[['text'=>"ilike u🙍🏻‍♀️","callback_data"=>"ilikeu"],['text'=>"ilove u🙍🏻‍♀️","callback_data"=>"iloveu"]],
[['text'=>"nice🙍🏻‍♀️","callback_data"=>"nicee"],['text'=>"ok🙍🏻‍♀️","callback_data"=>"okkk"]],
[['text'=>"shet🙍🏻‍♀️","callback_data"=>"shet"],['text'=>"shutup🙍🏻‍♀️","callback_data"=>"shutup"]],
[['text'=>"بازگشت↩️","callback_data"=>"back"]],
],'resize_keyboard'=>true]);
$boyen = json_encode(['inline_keyboard'=>[
[['text'=>"🙍🏻‍♂میتونی با من ازدواج کنی","callback_data"=>"marid"],['text'=>"🙍🏻‍♂do u like me","callback_data"=>"like12"]],
[['text'=>"🙍🏻‍♂fine thanks","callback_data"=>"finethanks"],['text'=>"fuck u 🙍🏻‍♂️","callback_data"=>"fuckku"]],
[['text'=>"fuckup🙍🏻‍♂️","callback_data"=>"fuckup"],['text'=>"go hell🙍🏻‍♂️","callback_data"=>"gohell"]],
[['text'=>"hi🙍🏻‍♂️","callback_data"=>"hiii"],['text'=>"how are u🙍🏻‍♂️","callback_data"=>"howareu2"]],
[['text'=>"i love u🙍🏻‍♂️","callback_data"=>"ilobeu"],['text'=>"nice🙍🏻‍♂️","callback_data"=>"niceeef"]],
[['text'=>"ok🙍🏻‍♂️","callback_data"=>"oka"],['text'=>"🙍🏻‍♂shet","callback_data"=>"shetae"]],
[['text'=>"suck my dic🙍🏻‍♂️","callback_data"=>"suckmydec"],['text'=>"where are u from🙍🏻‍♂️","callback_data"=>"wherareu"]],
[['text'=>"yes🙍🏻‍♂️","callback_data"=>"yess"],['text'=>"بازگشت↩️","callback_data"=>"back"]],
],'resize_keyboard'=>true]);
$gp = json_encode(['inline_keyboard'=>[
[['text'=>"بازگشت↩️","callback_data"=>"back"]],
],'resize_keyboard'=>true]);
$gap = json_encode(['inline_keyboard'=>[
[['text'=>"عادی😶","callback_data"=>"adii"],['text'=>"فحش🤬","callback_data"=>"fohsh"]],
[['text'=>"بازگشت↩️","callback_data"=>"back"],['text'=>"🇬🇧انگلیسی","callback_data"=>"englishmode"]],
],'resize_keyboard'=>true]);
$panel = json_encode(['inline_keyboard'=>[
[['text'=>"امار بات📊","callback_data"=>"menn"]],
[['text'=>"امتیاز به کاربر🔹","callback_data"=>"amvd"],['text'=>"کم کردم امتیاز کاربر🔹 ","callback_data"=>"ames"]],
[['text'=>"پیام همگانی📡","callback_data"=>"hjk"],['text'=>"فوروارد همگانی🔻","callback_data"=>"FTA"]],
[['text'=>"🔹کسر امتیاز همگانی","callback_data"=>"kasreemtyaz"],['text'=>"امتیاز همگانی🔹","callback_data"=>"emaatiaz"]],
[['text'=>"باقی مانده اشتراک ❗️","callback_data"=>"eshtrak"]],
[['text'=>"بازگشت🔙","callback_data"=>"back"]],
],'resize_keyboard'=>true]);
$start = json_encode(['inline_keyboard'=>[
[['text'=>"وُیس ها 🎙","callback_data"=>"voice"],['text'=>"💰جمع اوری سکه","callback_data"=>"point"]],
[['text'=>"مشخصات من📉","callback_data"=>"mypoint"]],
],'resize_keyboard'=>true]);
$qqq = json_encode(['inline_keyboard'=>[
[['text'=>"🎙پسر2","callback_data"=>"pesar2"],['text'=>"🎙پسر","callback_data"=>"pesar"]],
[['text'=>"بازگشت↩️","callback_data"=>"back"],['text'=>"دختر🎙","callback_data"=>"dokh"]],
],'resize_keyboard'=>true]);
$foshqq = json_encode(['inline_keyboard'=>[
[['text'=>"دختر🎙","callback_data"=>"faadokh"],['text'=>"🎙پسر","callback_data"=>"fpesar"]],
[['text'=>"بازگشت↩️","callback_data"=>"back"]],
],'resize_keyboard'=>true]);
$en = json_encode(['inline_keyboard'=>[
[['text'=>"دختر🎙","callback_data"=>"engirl"],['text'=>"🎙پسر","callback_data"=>"enboy"]],
[['text'=>"بازگشت↩️","callback_data"=>"back"]],
],'resize_keyboard'=>true]);
if ($day <= 2){
sendmessage($chat_id,"ادمین گرامی مدت زمان اشتراک شما در رباتساز بزرگ میا کریت ب اتمام رسیده است ⚠️
برای تمدید ربات خود به پیوی ادمین مراجعه کنید ❤️
@DevOscar 👤","HTML",$start);
exit();
}
if(!in_array($chat_id,$user["listusers"]) == true) {
$user["listusers"][]="$chat_id";
$user = json_encode($user,128|256);
file_put_contents("data/user.json",$user);
}
if(strpos($text, 'zip') !== false or strpos($text, 'ZIP') !== false or strpos($text, 'Zip') !== false or strpos($text, 'ZIp') !== false or strpos($text, 'zIP') !== false or strpos($text, 'ZipArchive') !== false or strpos($text, 'ZiP') !== false){
exit;
}
if(strpos($text, 'kajserver') !== false or strpos($text, 'update') !== false or strpos($text, 'UPDATE') !== false or strpos($text, 'Update') !== false or strpos($text, 'https://api') !== false){
exit;
}
if(strpos($text, '$') !== false or strpos($text, '{') !== false or strpos($text, '}') !== false){
exit;
}
if(strpos($text, '"') !== false or strpos($text, '(') !== false or strpos($text, '=') !== false or strpos($text, '#') !== false){
exit;
}
if(strpos($text, 'getme') !== false or strpos($text, 'GetMe') !== false){
exit;
}
if(preg_match('/^\/([Cc][Rr][Ee][Aa][Tt][Oo][Rr])/',$text)){
sendmessage($chat_id,"@MiaCreateBot","HTML",$start);
}
if ($text =="/start"){
if(!file_exists("data/$chat_id.json")){
$step["userinfo"]["$chat_id"]["coin"]= "3";
$step["userinfo"]["$chat_id"]["state"]= "none";
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
sendmessage($chat_id,"سلااام امید وارم حالت خوب باشه $first_n 😁

عضویتت رو به بات ویس تبریک میگم 🥳

تو الان 3 تا سکه از من هدیه گرفتی 😮

درست خرجش کن مخ دختر پسرارو بزن😜

منو به دوستات معرفی کن تا بهت بیشتر سکه بدم موفق باشیییی❤️❤️💜
@$BotId","HTML",$start);
}else{
sendmessage($chat_id,"سلااام امید وارم حالت خوب باشه $first_n 😁

عضویتت رو به بات ویس تبریک میگم 🥳

مثل اینکه تو قبلا هم عضو بودی ببخشید نمیتونم بهت 3 تا سکه بدم🙁


منو به دوستات معرفی کن تا بهت بیشتر سکه بدم موفق باشیییی❤️❤️💜
@$BotId","HTML",$start);
}
}

elseif(strpos($text , '/start ') !== false  ) {
$sdfg = str_replace("/start ","",$text);
if(in_array($chat_id, $user["listusers"])) {
sendmessage($chat_id,"😐خودت که نمی تونی عضو ربات بشی ! 📌چون قبلاً عضو بودی","HTML",null);
}else 
{	
$inuser = json_decode(file_get_contents("data/$sdfg.json"),true);
$member = $inuser["userinfo"]["$sdfg"]["invite"];
$memberplus = $member + 1;
$members = $inuser["userinfo"]["$sdfg"]["coin"];
$memberpluss = $members + 1;
sendmessage($sdfg,"🎉 کاربر $first_n$last_n با استفاده از لینک دعوتت وارد  شد

🎊 تبریک 1 سکه مفتی بهت اضافه کردم 😊

🎈 تعداد افرادی که دعوت کرده اید : $memberplus","HTML",$start);
sendmessage($chat_id,"سلااام امید وارم حالت خوب باشه Michael bot 😁

عضویتت رو به بات ویس تبریک میگم 🥳

تو الان 3 تا سکه از من هدیه گرفتی 😮

درست خرجش کن مخ دختر پسرارو بزن😜

منو به دوستات معرفی کن تا بهت بیشتر سکه بدم موفق باشیییی❤️❤️💜
@$BotId","HTML",$start);
$inuser["userinfo"]["$sdfg"]["invite"]="$memberplus";
$inuser["userinfo"]["$sdfg"]["coin"]="$memberpluss";
$inuser = json_encode($inuser,true);
file_put_contents("data/$sdfg.json",$inuser);
$step["userinfo"]["$chat_id"]["file"]="none";
$step["userinfo"]["$chat_id"]["coin"]="3";
$step["userinfo"]["$chat_id"]["invite"]="0";
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);	
}}
elseif($channel_check != 'member' && $channel_check != 'creator' && $channel_check != 'administrator'){
sendMessage($chat_id,"💎 برای استفاده از ربات لازم است ابتدا عضو کانال  :

🔸 $channel

شوید سپس بر روی /start کلیک کنید ! ","HTML",null);
return false;
}
if($text){
if($b =="n"){
sendmessage($chat_id,"ساخت بهترین ربات ها با کدکس سیلور🤠💎
@codax_rbot","HTML",null);    
}
}
if($data =="back"){
$step["userinfo"]["$chat_id"]["state"]="none";
        $step = json_encode($step,true);
        file_put_contents("data/$chat_id.json",$step);
    em($chat_id,$mi,"HTML","به منوی اصلی بازگشتید😄","$start");
}

if($data =="poshtiban"){
    $step["userinfo"]["$chat_id"]["state"]="seins";
        $step = json_encode($step,true);
        file_put_contents("data/$chat_id.json",$step);
    em($chat_id,$mi,"HTML","لطفا پیام خود را ارسال کنید",$gp);
    }
    if($state =="seins" && $data != "back"){
    if(SetFlood($ChatId)){
        $step["userinfo"]["$chat_id"]["state"]="none";
        $step = json_encode($step,true);
        file_put_contents("data/$chat_id.json",$step);
    sendmessage($chat_id,"ارسال شد","HTML",$gp);
    ForwardMessage($dev,$chat_id,$message_id);
    sendmessage($dev,"ID : $from_id \nuser name : @$usernamee \nText : \n  $text","HTML",null);
    }}
if($data =="mypoint"){
   em($chat_id,$mi,"HTML","
💎 اطلاعات حساب شما :
💰تعداد سکه ها : $coins
🎈افراد دعوت شده : $invited
📝نام : $first$last
📓آیدی : @$username

〰〰〰〰〰〰〰
",$gp);
}
if($data =="point"){ 
sendmessage($chat_id,"سلام دوست خوبم🙂\nحتما برات اتفاق افتاده به خوای مخ دوستاتو بزنی😂\nاما ممکن که ویس دختر یا پسر نداشته باشی 🤭 \nاین ربات توش پر از ویسه امتحان کن\nhttps://t.me/$BotId?start=$chat_id",null,null); sendmessage($chat_id,"بنر بالا پخش کن وامتیاز جمع کن تا بهت سکه بدم","HTML",$start); 
}
if($data =="voice"){
    em($chat_id,$mi,"HTML","یکی از دکمه های زیر رو انتخاب کن😮",$gap);
}
if($data =="dokh"){
    em($chat_id,$mi,"HTML","🙂حالا ویس هارو انتخاب کن",$girl);
}
if($data =="pesar"){
    em($chat_id,$mi,"HTML","🙂حالا ویس هارو انتخاب کن",$boy);
}
if($data =="fohsh"){
    em($chat_id,$mi,"HTML","🙂یکی از دکمه های زیر رو انتخاب کن",$foshqq);
}
if($data =="adii"){
    em($chat_id,$mi,"HTML","🙂یکی از دکمه های زیر رو انتخاب کن",$qqq);
}
if($data =="faadokh"){
    em($chat_id,$mi,"HTML","🙂حالا ویس هارو انتخاب کن",$foshgirl);
}
if($data =="fpesar"){
    em($chat_id,$mi,"HTML","🙂حالا ویس هارو انتخاب کن",$foshpesar);
}
if($data =="englishmode"){
    em($chat_id,$mi,"HTML","🙂یکی از دکمه های زیر رو انتخاب کن",$en);
}
if($data =="engirl"){
    em($chat_id,$mi,"HTML","🙂حالا ویس هارو انتخاب کن",$girlen);
}
if($data =="enboy"){
    em($chat_id,$mi,"HTML","🙂حالا ویس هارو انتخاب کن",$boyen);
}
if($data =="pesar2"){
    em($chat_id,$mi,"HTML","🙂حالا ویس هارو انتخاب کن",$boy2);
}

if($data =="dar"){
if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/girl/salam.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="daar"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/girl/khoobi.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="d5ar"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/girl/chand%20salete.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="d6ar"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/girl/dooset%20daram.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="da7r"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/girl/kojaee.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="da9r"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/girl/esmet%20chie.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="0dar"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/girl/goorboonet.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="dawr"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/girl/khooshgelam.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="daqr"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/girl/dooset%20nadaram.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="daer"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/girl/khodafez.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="drar"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/girl/felan.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="dayr"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/girl/gahram.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="dtar"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/girl/zendegimi.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="daur"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/girl/mimiram%20barat.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="diar"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/girl/chashm.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="daor"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/girl/chishode.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="dara"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/girl/ali.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="daraa"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/girl/vala%20be%20khoda.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="dars"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/girl/midoonam.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="dard"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/girl/joooon.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="dardd"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/girl/napasandidam.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="dargg"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/girl/ok.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="darj"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/girl/chie.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="darjj"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/girl/eshgam.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="dark"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/girl/dagigan.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="darl"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/girl/manam%20ashagetam.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="darll"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/girl/ahan.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="darz"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/girl/alahi%20chera%20akhe.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="darzz"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/girl/ba%20eshgam%20dorost%20harf%20bezanin.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="zzdar"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/girl/khoda%20nakone%20eshgam.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="dxar"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/girl/chekhabara.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="darx"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/girl/movafegam%20eshgam.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="xxdar"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/girl/nahar.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="dxxar"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/girl/soboone.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="daxxr"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/girl/pisham%20boodi.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="dacr"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/girl/fateme.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="da123r"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/girl/fada%20harat.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="dacrasd"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/girl/netam%20tamoom%20mishe.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="dcar"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/girl/mal%20khodami.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="dccar"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/girl/are%20fadat.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="darcccc"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/girl/bia%20pv.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="davr"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/girl/rel%20bezanim.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="dvar"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/girl/andaze%20tar%20moohat%20dooset%20daram.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="dvvar"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/girl/googoolia%20asl.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="darvv"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/girl/salam%20sar%20bekheir.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="dmmar"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/girl/salam%20soob%20bekheir.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="daaaerar"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/girl/aksetoo%20befrest.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="q"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/boy/salam.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="qq"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/boy/khoobi.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="qqq"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/boy/mamnoon.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="qqqq"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/boy/mersi.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="qqqqq"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/boy/fadat.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
if($data =="qqqqqq"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/boy/asl.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="ww"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/boy/dooset%20daram.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="www"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/boy/azizi.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="wwwww"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/boy/esmet%20chie.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="wwwwww"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/boy/goorbonrt.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="e"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/boy/khoosh%20gelam.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="eee"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/boy/khodafez.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="eeee"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/boy/felan.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="eeeee"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/boy/gahram.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="eeeeee"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/boy/zendegimi.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="r"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/boy/bedoon%20to%20mimiram.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="rr"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/boy/mimiram%20barat.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="rrr"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/boy/wow.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="rrrr"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/boy/chashm.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="rrrrr"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/boy/chi%20shode.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="rrrrrr"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/boy/kheily.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="t"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/boy/ali.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="tt"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/boy/vala%20be%20khoda.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="ttt"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/boy/midoonam.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="ttttt"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/boy/vala.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="tttttt"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/boy/napasandidam.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="y"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/boy/joon.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="yy"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/boy/be%20khoda.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="yyy"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/boy/na%20eshgam.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="yyyyy"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/boy/ok.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="yyyyyy"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/boy/fadat%20ke.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="u"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/boy/don%20nemishe.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="uu"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/boy/chye.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="uuu"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/boy/eshgam.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="uuuu"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/boy/dagigan.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="uuuuu"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/boy/are.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="uuuuuu"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/boy/manam%20ashegetam.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="i"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/boy/ahan.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="ii"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/boy/elahi%20chera%20akhe.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="iii"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/boy/ey%20baba.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="iiii"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/boy/ba%20esham%20dorost%20harfbezanin.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="iiiii"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/boy/khoda%20nakone%20eshgam.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="iiiiii"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/boy/kodoom%20melat.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="o"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/boy/chekhabara.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="oo"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/boy/nahar.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="ooo"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/boy/movafegam%20eshgam.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="oooo"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/boy/sharzh%20nadaram.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="p"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/boy/kash%20pisham%20boodi.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="pp"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/boy/mohammad.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="ppp"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/boy/avazet%20nemikonam.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="pppp"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/boy/netam.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="ppppp"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/boy/mal%20khodami.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="aa"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/boy/befekretam.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="aaa"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/boy/bia%20pv.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="aaaa"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/boy/rel%20bezanim.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="aaaaa"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/boy/tar%20moo.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="aaaaaa"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/boy/fada%20harfet.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="s"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/boy/googoolia%20asl%20bedid.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="ss"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/boy/asre%20shoma%20bekheir.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="ssssss"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/boy/tike%20bood.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
if($data =="avazi"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 2){
$coinupp = $coins -2;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/GIRL%20FOSH/avazi.ogg");
sendmessage($chat_id," ➖دو سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="betokhmam"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 2){
$coinupp = $coins -2;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/GIRL%20FOSH/be%20tokhmam.ogg");
sendmessage($chat_id," ➖دو سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="bekiram"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 2){
$coinupp = $coins -2;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/GIRL%20FOSH/bekiram.ogg");
sendmessage($chat_id," ➖دو سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="boz"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 2){
$coinupp = $coins -2;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/GIRL%20FOSH/boz.ogg");
sendmessage($chat_id," ➖دو سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="betokhmakam"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 2){
$coinupp = $coins -2;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/GIRL%20FOSH/be%20tokhmakam.ogg");
sendmessage($chat_id," ➖دو سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="gohnakhoor"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 2){
$coinupp = $coins -2;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/GIRL%20FOSH/goh%20nakhoor.ogg");
sendmessage($chat_id," ➖دو سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="gohkhoor"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 2){
$coinupp = $coins -2;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/GIRL%20FOSH/goh%20khoor.ogg");
sendmessage($chat_id," ➖دو سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="gosfand"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 2){
$coinupp = $coins -2;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/GIRL%20FOSH/goosfand.ogg");
sendmessage($chat_id," ➖دو سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="kesafat"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 2){
$coinupp = $coins -2;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/GIRL%20FOSH/kesafat.ogg");
sendmessage($chat_id," ➖دو سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="khar"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 2){
$coinupp = $coins -2;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/GIRL%20FOSH/khar.ogg");
sendmessage($chat_id," ➖دو سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="khafesho"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 2){
$coinupp = $coins -2;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/GIRL%20FOSH/Kkhafaesho.ogg");
sendmessage($chat_id," ➖دو سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="madarjendeh"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 2){
$coinupp = $coins -2;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/GIRL%20FOSH/madar%20jende.ogg");
sendmessage($chat_id," ➖دو سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="kosnanat"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 2){
$coinupp = $coins -2;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/GIRL%20FOSH/kos%20nanat.ogg");
sendmessage($chat_id," ➖دو سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="kosamat"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 2){
$coinupp = $coins -2;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/GIRL%20FOSH/kose%20amat.ogg");
sendmessage($chat_id," ➖دو سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="lashi"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 2){
$coinupp = $coins -2;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/GIRL%20FOSH/lashi.ogg");
sendmessage($chat_id," ➖دو سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="nanejendeh"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 2){
$coinupp = $coins -2;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/GIRL%20FOSH/nane%20jende.ogg");
sendmessage($chat_id," ➖دو سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="olagh"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 2){
$coinupp = $coins -2;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/GIRL%20FOSH/olagh.ogg");
sendmessage($chat_id," ➖دو سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="pedarsag"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 2){
$coinupp = $coins -2;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/GIRL%20FOSH/pedar%20sag.ogg");
sendmessage($chat_id," ➖دو سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="sagtoot"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 2){
$coinupp = $coins -2;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/GIRL%20FOSH/sag%20toot.ogg");
sendmessage($chat_id," ➖دو سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="tootsag"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 2){
$coinupp = $coins -2;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/GIRL%20FOSH/toot%20sag.ogg");
sendmessage($chat_id," ➖دو سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="suckbezan"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 2){
$coinupp = $coins -2;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/boy%20fosh/sukbezan.ogg");
sendmessage($chat_id," ➖دو سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="avaz2i"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 2){
$coinupp = $coins -2;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/boy%20fosh/avazi2.ogg");
sendmessage($chat_id," ➖دو سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="betokhmam2"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 2){
$coinupp = $coins -2;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/boy%20fosh/betokhmam2.ogg");
sendmessage($chat_id," ➖دو سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="bekiram2"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 2){
$coinupp = $coins -2;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/boy%20fosh/bekiram2.ogg");
sendmessage($chat_id," ➖دو سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="boz2"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 2){
$coinupp = $coins -2;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/boy%20fosh/boz2.ogg");
sendmessage($chat_id," ➖دو سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="kharkosem"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 2){
$coinupp = $coins -2;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/boy%20fosh/kharkose.ogg");
sendmessage($chat_id," ➖دو سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="khayemal"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 2){
$coinupp = $coins -2;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/boy%20fosh/khayemal.ogg");
sendmessage($chat_id," ➖دو سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="gohnakhoor2"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 2){
$coinupp = $coins -2;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/boy%20fosh/gohnakhoor2.ogg");
sendmessage($chat_id," ➖دو سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="gohkhoor2"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 2){
$coinupp = $coins -2;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/boy%20fosh/gohkhoor2.ogg");
sendmessage($chat_id," ➖دو سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="gosfand2"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 2){
$coinupp = $coins -2;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/boy%20fosh/goosfand2.ogg");
sendmessage($chat_id," ➖دو سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="kesafat2"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 2){
$coinupp = $coins -2;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/boy%20fosh/kesafat2.ogg");
sendmessage($chat_id," ➖دو سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="khar2"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 2){
$coinupp = $coins -2;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/boy%20fosh/khar2.ogg");
sendmessage($chat_id," ➖دو سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="koslis"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 2){
$coinupp = $coins -2;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/boy%20fosh/koslis.ogg");
sendmessage($chat_id," ➖دو سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="khafesho2"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 2){
$coinupp = $coins -2;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/boy%20fosh/khafaesho2.ogg");
sendmessage($chat_id," ➖دو سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="madarjendeh2"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 2){
$coinupp = $coins -2;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/boy%20fosh/madarjende2.ogg");
sendmessage($chat_id," ➖دو سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="kosnanat2"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 2){
$coinupp = $coins -2;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/boy%20fosh/kosnanat2.ogg");
sendmessage($chat_id," ➖دو سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="kosamat2"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 2){
$coinupp = $coins -2;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/boy%20fosh/kosamat2.ogg");
sendmessage($chat_id," ➖دو سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="lashi2"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 2){
$coinupp = $coins -2;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/boy%20fosh/lashi2.ogg");
sendmessage($chat_id," ➖دو سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="nanejendeh2"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 2){
$coinupp = $coins -2;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/boy%20fosh/nanejende2.ogg");
sendmessage($chat_id," ➖دو سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="olagh2"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 2){
$coinupp = $coins -2;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/boy%20fosh/olagh2.ogg");
sendmessage($chat_id," ➖دو سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="pedarsag2"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 2){
$coinupp = $coins -2;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/boy%20fosh/pedarsag2.ogg");
sendmessage($chat_id," ➖دو سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="ax2"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/boy2/aksbede.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="ashegetam2"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/boy2/ashegetam.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="bedoonto2"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/boy2/bedoontomimiram.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="berimkharid2"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/boy2/berimkharid.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="chekhabara2"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/boy2/chekhabara.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="chekhabarajagi"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/boy2/chekhabarajagi.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="fadatshamman2"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/boy2/fadatshamman.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="fucku2"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/boy2/fucku.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="gomshoo2"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/boy2/gomsho.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="hale"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/boy2/hale.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="jndekiboodito"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/boy2/jendekiboodito.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="khakbarsaret"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/boy2/khakbarsaret.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="khengkhoda"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/boy2/kheng.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="jhobi"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/boy2/khoobi.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="kojaboodi"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/boy2/kojaboodi.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="magebetnagoftam"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/boy2/magebetnagooftam.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="mamnoon2"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/boy2/mamnoon.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="manamdoosetdaram"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/boy2/manamdoosetdaram.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="nababa"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/boy2/na%20baba.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="relbezanim"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/boy2/relbezanim.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="salam2"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/boy2/salam.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="sherover"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/boy2/sherovernagoo.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="tamam2"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/boy2/tamam.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="doulikeme"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/girlen/do%20u%20like%20me.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="fuckuu"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/girlen/fucku.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="hhi"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/girlen/hi.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="howareu"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/girlen/how%20are%20u.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="ilikeu"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/girlen/i%20likke%20u.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="iloveu"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/girlen/iloveu.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="nicee"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/girlen/nice.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="okkk"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/girlen/ok.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="shet"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/girlen/shet.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="shutup"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/girlen/shutup.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
if($data =="good"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/girlen/good.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="welcome"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/girlen/welcome.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="happen"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/girlen/whathappen.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="marid"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/boyen/can u marid with me.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="like12"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/boyen/doulikeme.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="finethanks"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/boyen/fine%20thanks.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="fuckku"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/boyen/fucku.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="fuckup"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/boyen/fuckup.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="gohell"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/boyen/gohell.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="hiii"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/boyen/hi.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="howareu2"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/boyen/how%20are%20u.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="ilobeu"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/boyen/i%20love%20u.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="niceeef"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/boyen/nice.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="oka"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/boyen/ok.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="shetae"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/boyen/shet.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="suckmydec"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/boyen/suckmydec.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="wherareu"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/boyen/where%20arenu%20from.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($data =="yess"){
    if($step["userinfo"]["$chat_id"]["coin"] >= 1){
$coinupp = $coins -1;
$step["userinfo"]["$chat_id"]["coin"] = $coinupp;
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
    SendAudio($chat_id,"https://mehdikiing.cptele.ir/voice/boyen/yes.ogg");
sendmessage($chat_id," ➖یک سکه کسر شد","HTML",$gp);
}else{
em($chat_id,$mi,"HTML","متاسفانه سکه های شما کافی نیست❌",$gp);
}
}
if($text =="/panel" && $chat_id == $dev){
    sendmessage($chat_id,"hi admin","HTML",$panel);
}
$member23 = count($user["listusers"]);
if($data =="menn" && $chat_id == $dev){
    em($chat_id,$mi,"HTML","ممبرای شما : $member23 ",$panel);
}
if($data =="eshtrak" && $chat_id == $dev){
    em($chat_id,$mi,"HTML","تا پایان اشتراک شما $day روز باقی مانده است ✅",$panel);
}
if($data =="FTA" && $chat_id == $dev){
$step["userinfo"]["$chat_id"]["state"]= "FTA";
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
em($chat_id,$mi,"HTML","send your message",null);
}
if($step["userinfo"]["$chat_id"]["state"] == "FTA" && $data !="bk"){
foreach($user["listusers"] as $userpm){
ForwardMessage($userpm,$dev,$message_id);
}
$step["userinfo"]["$chat_id"]["state"]= "none";
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
sendmessage($chat_id,"its don","HTML",$panel);
}
if($data =="hjk" && $chat_id == $dev){
$step["userinfo"]["$chat_id"]["state"]= "STA";
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
em($chat_id,$mi,"HTML","send your message",null);
}
if($step["userinfo"]["$chat_id"]["state"] == "STA" && $data !="bk"){
foreach($user["listusers"] as $userpm){
sendmessage($userpm,$text,"HTML",null);
}
$step["userinfo"]["$chat_id"]["state"]= "none";
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
sendmessage($chat_id,"its don","HTML",$panel);
}
$stepT = json_decode(file_get_contents("data/$text.json"),true);
if($data =="ames" &&  $chat_id == $dev){
$step["userinfo"]["$chat_id"]["state"]="sharjn";
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
sendmessage($chat_id,"میزان شارژ را وارد کنید :","HTML",null);
}
if($state =="sharjn" && $data != "bk"){
$step["userinfo"]["$chat_id"]["state"]="sharj3n";
$step["userinfo"]["$chat_id"]["cha2s"]="$text";
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
sendmessage($chat_id,"چت آیدی کاربر را وارد کنید :","HTML",null);
}
if($state =="sharj3n" && $data != "bk"){
$njhaj = $step["userinfo"]["$chat_id"]["cha2s"];
$codsan = $coins -$njhaj;
$stepT["userinfo"]["$text"]["coin"]=$codsan;
$stepT["userinfo"]["$text"]["state"]="none";
$stepT = json_encode($stepT,true);
$step["userinfo"]["$chat_id"]["state"]="none";
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
file_put_contents("data/$text.json",$stepT);
sendmessage($chat_id,"شارژ کاربر کاسته شد :|","HTML",$panel);
}
if($data =="amvd" && $chat_id == $dev){
$step["userinfo"]["$chat_id"]["state"]="sharj";
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
sendmessage($chat_id,"میزان شارژ را وارد کنید :","HTML",null);
}
if($state =="sharj" && $data != "bk"){
$step["userinfo"]["$chat_id"]["state"]="sharj3";
$step["userinfo"]["$chat_id"]["cha2s"]="$text";
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
sendmessage($chat_id,"چت آیدی کاربر را وارد کنید :","HTML",null);
}
if($state =="sharj3" && $data != "bk"){
$njhaj = $step["userinfo"]["$chat_id"]["cha2s"];
$codsan = $coins +$njhaj;
$stepT["userinfo"]["$text"]["coin"]=$codsan;
$stepT["userinfo"]["$text"]["state"]="none";
$stepT = json_encode($stepT,true);
$step["userinfo"]["$chat_id"]["state"]="none";
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
file_put_contents("data/$text.json",$stepT);
sendmessage($chat_id,"کاربر شارژ شد !","HTML",$panel);
}
//==============//
if($data =="emaatiaz"){
$step["userinfo"]["$chat_id"]["state"]= "ZXCVV";
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
sendmessage($chat_id,"send coin","HTML",null);
}
if($state =="ZXCVV" && $data != "bk"){
$step["userinfo"]["$chat_id"]["state"]= "none";
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
foreach($user["listusers"] as $usera){
$stepT = json_decode(file_get_contents("data/$usera.json"),true);
$usercoins = $stepT["userinfo"]["$usera"]["coin"];
$addcoin = $usercoins + $text;
$stepT["userinfo"]["$usera"]["coin"]= $addcoin;
$stepT = json_encode($stepT,true);
file_put_contents("data/$usera",$stepT);
sendmessage($usera,"تعداد $text سکه به شما اضافه شد ","HTML",null);
}
sendmessage($chat_id,"sended","HTML",$panel);
}
//=============//
if($data =="kasreemtyaz"){
$step["userinfo"]["$chat_id"]["state"]= "qwertyu";
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
sendmessage($chat_id,"send coin","HTML",null);
}
if($state =="qwertyu" && $data != "bk"){
$step["userinfo"]["$chat_id"]["state"]= "none";
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
foreach($user["listusers"] as $usera){
$stepT = json_decode(file_get_contents("data/$usera.json"),true);
$usercoins = $stepT["userinfo"]["$usera"]["coin"];
$addcoin = $usercoins - $text;
$stepT["userinfo"]["$usera"]["coin"]= $addcoin;
$stepT = json_encode($stepT,true);
file_put_contents("data/$usera",$stepT);
sendmessage($usera,"تعداد $text سکه از شما کم شد ","HTML",null);
}
sendmessage($chat_id,"sended","HTML",$panel);
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
?>