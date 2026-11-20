<?php
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
$ttti = time();
error_reporting(0);
$day = (2505600 - (time() - filectime('Mahdy'))) / 60 / 60 / 24;
$day = round($day, 0);
define('API_KEY','[*[TOKEN]*]');
date_default_timezone_set('Asia/Tehran');
//-----------------------------------------------------------------------------------------
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
if (!$ok) die("sik");
//-----------------------------------------------------------------------------------------------
//functions
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
function SM($chatID)
{
	$tab = json_decode(file_get_contents("../../lib/Jsons/tab.json"),true);
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
function SendPhoto($chat_id,$link,$text) {
bot('SendPhoto',['chat_id' => $chat_id, 'photo' => $link, 'caption' => $text]);
}
function sendmessage($chat_id,$text){
bot('sendMessage',['chat_id'=>$chat_id,'text'=>$text,'parse_mode'=>"html"]);
}
function getChatstats($chat_id,$token) {
  $url = 'https://api.telegram.org/bot'.$token.'/getChatAdministrators?chat_id=@'.$chat_id;
  $result = file_get_contents($url);
  $result = json_decode ($result);
  $result = $result->ok;
  return $result;
}
function getRanks($file){
   $users = scandir('data/');
   $users = array_diff($users,[".",".."]);
   $coins =[];
   foreach($users as $user){
    $coin = json_decode(file_get_contents('data/'.$user.'/'.$user.'.json'),true)["$file"];
    $coins[$user] = $coin;
}
   arsort($coins);
   foreach($coins as $key => $user){
   $list[] = array('user'=>$key,'coins'=>$coins[$key]);
   } 
   return $list;
}
function deletemessage($chat_id,$message_id){
bot('deletemessage', ['chat_id' => $chat_id,'message_id' => $message_id,]);
}
function gcmc($chat_id,$token) {
  $url = 'https://api.telegram.org/bot'.$token.'/getChatMembersCount?chat_id='.$chat_id;
  $result = file_get_contents($url);
  $result = json_decode ($result);
  $result = $result->result;
  return $result;
}
//Variables
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$chat_id = $message->chat->id;
$text = $message->text;
$tc = $message->chat->type;
$message_id = $message->message_id;
$first_name = $message->from->first_name;
$from_id = $message->from->id;
$first = $message->from->first_name;
$last = $message->from->last_name;
$username = $message->from->username;
$first2 = $update->callback_query->message->chat->first_name;
$last2 = $update->callback_query->message->chat->last_name;
$chatid = $update->callback_query->message->chat->id;
$data = $update->callback_query->data;
$message_id2 = $update->callback_query->message->message_id;
$photo = $message->photo;
$mem = bot('getChatMembersCount',['chat_id'=>''.$text])->result;
$sudo = ['[*[ADMIN]*]','[*[ADMIN]*]','[*[ADMIN]*]'];
$ADMIN = array("[*[ADMIN]*]","[*[ADMIN]*]");
$admin = "[*[ADMIN]*]"; //نایدی عددی ادمی
$channel = file_get_contents("channel.txt"); 
$channelcode = file_get_contents("channelcode.txt"); 
$token = "[*[TOKEN]*]";
$Support = file_get_contents("Support.txt");
@$staroff = file_get_contents("staroff.txt");
@$bankboton = file_get_contents("bankboton.txt");
@$viewbot = file_get_contents("viewbot.txt");
@$botoff = file_get_contents("botoff.txt");
$dokc6 = file_get_contents("dokc6.txt");
$dokc5 = file_get_contents("dokc5.txt");
$dokc1 = file_get_contents("dokc1.txt");
$dokc3 = file_get_contents("dokc3.txt");
$dokc2 = file_get_contents("dokc2.txt");
$menu1 = file_get_contents("menu1.txt");
$dok278 = file_get_contents("dok278.txt");
$message_id2 = $update->callback_query->message->message_id;
$timech = "60";
if (!file_exists("data/$from_id/$from_id.json")){mkdir("data/$from_id");}
$datas = json_decode(file_get_contents("data/$from_id/$from_id.json"),true);
$datas1 = json_decode(file_get_contents("data/$chatid/$chatid.json"),true);
$coin1 = $datas1["coin"];
$step = $datas["step"];
$inv = $datas["inv"];
$coin = $datas["coin"];
$type = $datas["type"];
$sefaresh = $datas["sefaresh"];
$warn = $datas["warn"];
$timeee = $ttti - 60;
if(is_file("time") or file_get_contents("time") <= $timeee){
	file_put_contents("time",$ttti);
}
if($warn >= 3){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"📍 شما سه اخطار دریافت کردید و از ربات مسدود شدید",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id
]); exit();}

$ads = $datas["ads"];
$invcoin = $datas["invcoin"];
$date = date("Y-F-d");
if(file_exists("dok2.txt")){
$dok2 = file_get_contents("dok2.txt");
}else{
$dok2 = "🔐حساب کاربری";
}
if(file_exists("dok3.txt")){
$dok3 = file_get_contents("dok3.txt");
}else{
$dok3 = "🚫قوانین";
}
if(file_exists("dok4.txt")){
$dok4 = file_get_contents("dok4.txt");
}else{
$dok4 = "✅ثبت سفارش";
}
if(file_exists("dok5.txt")){
$dok5 = file_get_contents("dok5.txt");
}else{
$dok5 = "🛍فروشگاه";
}
if(file_exists("dok6.txt")){
$dok6 = file_get_contents("dok6.txt");
}else{
$dok6 = "👥زیرمجموعه گیری";
}
if(file_exists("dok8.txt")){
$dok8 = file_get_contents("dok8.txt");
}else{
$dok8 = "❓راهنما";
}
if(file_exists("dok12.txt")){
$dok12 = file_get_contents("dok12.txt");
}else{
$dok12 = "🎁کد هدیه";
}
if(file_exists("dok13.txt")){
$dok13 = file_get_contents("dok13.txt");
}else{
$dok13 = "📤انتقال الماس";
}
if(file_exists("dok0.txt")){
$dok0 = file_get_contents("dok0.txt");
}else{
$dok0 = "📈پیگیری";
}
if(file_exists("dok44.txt")){
$dok44 = file_get_contents("dok44.txt");
}else{
$dok44 = "👨🏻‍💻پشتیبانی";
}
if(file_exists("line11.txt")){
$line11 = file_get_contents("line11.txt");
$line11 = str_replace('DOK2',$dok2,$line11);
$line11 = str_replace('DOK3',$dok3,$line11);
$line11 = str_replace('DOK4',$dok4,$line11);
$line11 = str_replace('DOK5',$dok5,$line11);
$line11 = str_replace('DOK6',$dok6,$line11);
$line11 = str_replace('DOK01',$dok01,$line11);
$line11 = str_replace('DOK8',$dok8,$line11);
$line11 = str_replace('DOK12',$dok12,$line11);
$line11 = str_replace('DOK13',$dok13,$line11);
$line11 = str_replace('DOK0',$dok0,$line11);
}else{
$line11 = "";
}
if(file_exists("line12.txt")){
$line12 = file_get_contents("line12.txt");
$line12 = str_replace('DOK2',$dok2,$line12);
$line12 = str_replace('DOK3',$dok3,$line12);
$line12 = str_replace('DOK4',$dok4,$line12);
$line12 = str_replace('DOK5',$dok5,$line12);
$line12 = str_replace('DOK6',$dok6,$line12);
$line12 = str_replace('DOK01',$dok01,$line12);
$line12 = str_replace('DOK8',$dok8,$line12);
$line12 = str_replace('DOK12',$dok12,$line12);
$line12 = str_replace('DOK13',$dok13,$line12);
$line12 = str_replace('DOK0',$dok0,$line12);
}else{
$line12 = "";
}
if(file_exists("line13.txt")){
$line13 = file_get_contents("line13.txt");
$line13 = str_replace('DOK2',$dok2,$line13);
$line13 = str_replace('DOK3',$dok3,$line13);
$line13 = str_replace('DOK4',$dok4,$line13);
$line13 = str_replace('DOK5',$dok5,$line13);
$line13 = str_replace('DOK6',$dok6,$line13);
$line13 = str_replace('DOK01',$dok01,$line13);
$line13 = str_replace('DOK8',$dok8,$line13);
$line13 = str_replace('DOK12',$dok12,$line13);
$line13 = str_replace('DOK13',$dok13,$line13);
$line13 = str_replace('DOK0',$dok0,$line13);
}else{
$line13 = "";
}
if(file_exists("line21.txt")){
$line21 = file_get_contents("line21.txt");
$line21 = str_replace('DOK2',$dok2,$line21);
$line21 = str_replace('DOK3',$dok3,$line21);
$line21 = str_replace('DOK4',$dok4,$line21);
$line21 = str_replace('DOK5',$dok5,$line21);
$line21 = str_replace('DOK6',$dok6,$line21);
$line21 = str_replace('DOK01',$dok01,$line21);
$line21 = str_replace('DOK8',$dok8,$line21);
$line21 = str_replace('DOK12',$dok12,$line21);
$line21 = str_replace('DOK13',$dok13,$line21);
$line21 = str_replace('DOK0',$dok0,$line21);
}else{
$line21 = "";
}
if(file_exists("line22.txt")){
$line22 = file_get_contents("line22.txt");
$line22 = str_replace('DOK2',$dok2,$line22);
$line22 = str_replace('DOK3',$dok3,$line22);
$line22 = str_replace('DOK4',$dok4,$line22);
$line22 = str_replace('DOK5',$dok5,$line22);
$line22 = str_replace('DOK6',$dok6,$line22);
$line22 = str_replace('DOK01',$dok01,$line22);
$line22 = str_replace('DOK8',$dok8,$line22);
$line22 = str_replace('DOK12',$dok12,$line22);
$line22 = str_replace('DOK13',$dok13,$line22);
$line22 = str_replace('DOK0',$dok0,$line22);
}else{
$line22 = "";
}
if(file_exists("line23.txt")){
$line23 = file_get_contents("line23.txt");
$line23 = str_replace('DOK1',$dok1,$line23);
$line23 = str_replace('DOK2',$dok2,$line23);
$line23 = str_replace('DOK3',$dok3,$line23);
$line23 = str_replace('DOK4',$dok4,$line23);
$line23 = str_replace('DOK5',$dok5,$line23);
$line23 = str_replace('DOK6',$dok6,$line23);
$line23 = str_replace('DOK01',$dok01,$line23);
$line23 = str_replace('DOK8',$dok8,$line23);
$line23 = str_replace('DOK12',$dok12,$line23);
$line23 = str_replace('DOK13',$dok13,$line23);
$line23 = str_replace('DOK0',$dok0,$line23);
}else{
$line23 = "";
}
if(file_exists("line24.txt")){
$line24 = file_get_contents("line24.txt");
$line24 = str_replace('DOK1',$dok1,$line24);
$line24 = str_replace('DOK2',$dok2,$line24);
$line24 = str_replace('DOK3',$dok3,$line24);
$line24 = str_replace('DOK4',$dok4,$line24);
$line24 = str_replace('DOK5',$dok5,$line24);
$line24 = str_replace('DOK6',$dok6,$line24);
$line24 = str_replace('DOK01',$dok01,$line24);
$line24 = str_replace('DOK8',$dok8,$line24);
$line24 = str_replace('DOK12',$dok12,$line24);
$line24 = str_replace('DOK13',$dok13,$line24);
$line24 = str_replace('DOK0',$dok0,$line24);
}else{
$line24 = "";
}
if(file_exists("line31.txt")){
$line31 = file_get_contents("line31.txt");
$line31 = str_replace('DOK1',$dok1,$line31);
$line31 = str_replace('DOK2',$dok2,$line31);
$line31 = str_replace('DOK3',$dok3,$line31);
$line31 = str_replace('DOK4',$dok4,$line31);
$line31 = str_replace('DOK5',$dok5,$line31);
$line31 = str_replace('DOK6',$dok6,$line31);
$line31 = str_replace('DOK01',$dok01,$line31);
$line31 = str_replace('DOK8',$dok8,$line31);
$line31 = str_replace('DOK12',$dok12,$line31);
$line31 = str_replace('DOK13',$dok13,$line31);
$line31 = str_replace('DOK0',$dok0,$line31);
}else{
$line31 = "";
}
if(file_exists("line32.txt")){
$line32 = file_get_contents("line32.txt");
$line32 = str_replace('DOK1',$dok1,$line32);
$line32 = str_replace('DOK2',$dok2,$line32);
$line32 = str_replace('DOK3',$dok3,$line32);
$line32 = str_replace('DOK4',$dok4,$line32);
$line32 = str_replace('DOK5',$dok5,$line32);
$line32 = str_replace('DOK6',$dok6,$line32);
$line32 = str_replace('DOK01',$dok01,$line32);
$line32 = str_replace('DOK8',$dok8,$line32);
$line32 = str_replace('DOK12',$dok12,$line32);
$line32 = str_replace('DOK13',$dok13,$line32);
$line32 = str_replace('DOK0',$dok0,$line32);
}else{
$line32 = "";
}
if(file_exists("line33.txt")){
$line33 = file_get_contents("line33.txt");
$line33 = str_replace('DOK1',$dok1,$line33);
$line33 = str_replace('DOK2',$dok2,$line33);
$line33 = str_replace('DOK3',$dok3,$line33);
$line33 = str_replace('DOK4',$dok4,$line33);
$line33 = str_replace('DOK5',$dok5,$line33);
$line33 = str_replace('DOK6',$dok6,$line33);
$line33 = str_replace('DOK01',$dok01,$line33);
$line33 = str_replace('DOK8',$dok8,$line33);
$line33 = str_replace('DOK12',$dok12,$line33);
$line33 = str_replace('DOK13',$dok13,$line33);
$line33 = str_replace('DOK0',$dok0,$line33);
}else{
$line33 = "";
}
if(file_exists("line34.txt")){
$line34 = file_get_contents("line34.txt");
$line34 = str_replace('DOK1',$dok1,$line34);
$line34 = str_replace('DOK2',$dok2,$line34);
$line34 = str_replace('DOK3',$dok3,$line34);
$line34 = str_replace('DOK4',$dok4,$line34);
$line34 = str_replace('DOK5',$dok5,$line34);
$line34 = str_replace('DOK6',$dok6,$line34);
$line34 = str_replace('DOK01',$dok01,$line34);
$line34 = str_replace('DOK8',$dok8,$line34);
$line34 = str_replace('DOK12',$dok12,$line34);
$line34 = str_replace('DOK13',$dok13,$line34);
$line34 = str_replace('DOK0',$dok0,$line34);
}else{
$line34 = "";
}
if(file_exists("line41.txt")){
$line41 = file_get_contents("line41.txt");
$line41 = str_replace('DOK1',$dok1,$line41);
$line41 = str_replace('DOK2',$dok2,$line41);
$line41 = str_replace('DOK3',$dok3,$line41);
$line41 = str_replace('DOK4',$dok4,$line41);
$line41 = str_replace('DOK5',$dok5,$line41);
$line41 = str_replace('DOK6',$dok6,$line41);
$line41 = str_replace('DOK01',$dok01,$line41);
$line41 = str_replace('DOK8',$dok8,$line41);
$line41 = str_replace('DOK12',$dok12,$line41);
$line41 = str_replace('DOK13',$dok13,$line41);
$line41 = str_replace('DOK0',$dok0,$line41);
}else{
$line41 = "";
}
if(file_exists("line42.txt")){
$line42 = file_get_contents("line42.txt");
$line42 = str_replace('DOK1',$dok1,$line42);
$line42 = str_replace('DOK2',$dok2,$line42);
$line42 = str_replace('DOK3',$dok3,$line42);
$line42 = str_replace('DOK4',$dok4,$line42);
$line42 = str_replace('DOK5',$dok5,$line42);
$line42 = str_replace('DOK6',$dok6,$line42);
$line42 = str_replace('DOK01',$dok01,$line42);
$line42 = str_replace('DOK8',$dok8,$line42);
$line42 = str_replace('DOK12',$dok12,$line42);
$line42 = str_replace('DOK13',$dok13,$line42);
$line42 = str_replace('DOK0',$dok0,$line42);
}else{
$line42 = "";
}
if(file_exists("line43.txt")){
$line43 = file_get_contents("line43.txt");
$line43 = str_replace('DOK1',$dok1,$line43);
$line43 = str_replace('DOK2',$dok2,$line43);
$line43 = str_replace('DOK3',$dok3,$line43);
$line43 = str_replace('DOK4',$dok4,$line43);
$line43 = str_replace('DOK5',$dok5,$line43);
$line43 = str_replace('DOK6',$dok6,$line43);
$line43 = str_replace('DOK01',$dok01,$line43);
$line43 = str_replace('DOK8',$dok8,$line43);
$line43 = str_replace('DOK12',$dok12,$line43);
$line43 = str_replace('DOK13',$dok13,$line43);
$line43 = str_replace('DOK0',$dok0,$line43);
}else{
$line43 = "";
}
if(file_exists("line44.txt")){
$line44 = file_get_contents("line44.txt");
$line44 = str_replace('DOK1',$dok1,$line44);
$line44 = str_replace('DOK2',$dok2,$line44);
$line44 = str_replace('DOK3',$dok3,$line44);
$line44 = str_replace('DOK4',$dok4,$line44);
$line44 = str_replace('DOK5',$dok5,$line44);
$line44 = str_replace('DOK6',$dok6,$line44);
$line44 = str_replace('DOK01',$dok01,$line44);
$line44 = str_replace('DOK8',$dok8,$line44);
$line44 = str_replace('DOK12',$dok12,$line44);
$line44 = str_replace('DOK13',$dok13,$line44);
$line44 = str_replace('DOK0',$dok0,$line44);
}else{
$line44 = "";
}
if(file_exists("line51.txt")){
$line51 = file_get_contents("line51.txt");
$line51 = str_replace('DOK1',$dok1,$line51);
$line51 = str_replace('DOK2',$dok2,$line51);
$line51 = str_replace('DOK3',$dok3,$line51);
$line51 = str_replace('DOK4',$dok4,$line51);
$line51 = str_replace('DOK5',$dok5,$line51);
$line51 = str_replace('DOK6',$dok6,$line51);
$line51 = str_replace('DOK01',$dok01,$line51);
$line51 = str_replace('DOK8',$dok8,$line51);
$line51 = str_replace('DOK12',$dok12,$line51);
$line51 = str_replace('DOK13',$dok13,$line51);
$line51 = str_replace('DOK0',$dok0,$line51);
}else{
$line51 = "";
}
if(file_exists("line52.txt")){
$line52 = file_get_contents("line52.txt");
$line52 = str_replace('DOK1',$dok1,$line52);
$line52 = str_replace('DOK2',$dok2,$line52);
$line52 = str_replace('DOK3',$dok3,$line52);
$line52 = str_replace('DOK4',$dok4,$line52);
$line52 = str_replace('DOK5',$dok5,$line52);
$line52 = str_replace('DOK6',$dok6,$line52);
$line52 = str_replace('DOK01',$dok01,$line52);
$line52 = str_replace('DOK8',$dok8,$line52);
$line52 = str_replace('DOK12',$dok12,$line52);
$line52 = str_replace('DOK13',$dok13,$line52);
$line52 = str_replace('DOK0',$dok0,$line52);
}else{
$line52 = "";
}
if(file_exists("line53.txt")){
$line53 = file_get_contents("line53.txt");
$line53 = str_replace('DOK1',$dok1,$line53);
$line53 = str_replace('DOK2',$dok2,$line53);
$line53 = str_replace('DOK3',$dok3,$line53);
$line53 = str_replace('DOK4',$dok4,$line53);
$line53 = str_replace('DOK5',$dok5,$line53);
$line53 = str_replace('DOK6',$dok6,$line53);
$line53 = str_replace('DOK01',$dok01,$line53);
$line53 = str_replace('DOK8',$dok8,$line53);
$line53 = str_replace('DOK12',$dok12,$line53);
$line53 = str_replace('DOK13',$dok13,$line53);
$line53 = str_replace('DOK0',$dok0,$line53);
}else{
$line53 = "";
}
if(file_exists("line54.txt")){
$line54 = file_get_contents("line54.txt");
$line54 = str_replace('DOK1',$dok1,$line54);
$line54 = str_replace('DOK2',$dok2,$line54);
$line54 = str_replace('DOK3',$dok3,$line54);
$line54 = str_replace('DOK4',$dok4,$line54);
$line54 = str_replace('DOK5',$dok5,$line54);
$line54 = str_replace('DOK6',$dok6,$line54);
$line54 = str_replace('DOK01',$dok01,$line54);
$line54 = str_replace('DOK8',$dok8,$line54);
$line54 = str_replace('DOK12',$dok12,$line54);
$line54 = str_replace('DOK13',$dok13,$line54);
$line54 = str_replace('DOK0',$dok0,$line54);
}else{
$line54 = "";
}
if(file_exists("line61.txt")){
$line61 = file_get_contents("line61.txt");
$line61 = str_replace('DOK1',$dok1,$line61);
$line61 = str_replace('DOK2',$dok2,$line61);
$line61 = str_replace('DOK3',$dok3,$line61);
$line61 = str_replace('DOK4',$dok4,$line61);
$line61 = str_replace('DOK5',$dok5,$line61);
$line61 = str_replace('DOK6',$dok6,$line61);
$line61 = str_replace('DOK01',$dok01,$line61);
$line61 = str_replace('DOK8',$dok8,$line61);
$line61 = str_replace('DOK12',$dok12,$line61);
$line61 = str_replace('DOK13',$dok13,$line61);
$line61 = str_replace('DOK0',$dok0,$line61);
}else{
$line61 = "";
}
if(file_exists("line62.txt")){
$line62 = file_get_contents("line62.txt");
$line62 = str_replace('DOK1',$dok1,$line62);
$line62 = str_replace('DOK2',$dok2,$line62);
$line62 = str_replace('DOK3',$dok3,$line62);
$line62 = str_replace('DOK4',$dok4,$line62);
$line62 = str_replace('DOK5',$dok5,$line62);
$line62 = str_replace('DOK6',$dok6,$line62);
$line62 = str_replace('DOK01',$dok01,$line62);
$line62 = str_replace('DOK8',$dok8,$line62);
$line62 = str_replace('DOK12',$dok12,$line62);
$line62 = str_replace('DOK13',$dok13,$line62);
$line62 = str_replace('DOK0',$dok0,$line62);
}else{
$line62 = "";
}
if(file_exists("line63.txt")){
$line63 = file_get_contents("line63.txt");
$line63 = str_replace('DOK1',$dok1,$line63);
$line63 = str_replace('DOK2',$dok2,$line63);
$line63 = str_replace('DOK3',$dok3,$line63);
$line63 = str_replace('DOK4',$dok4,$line63);
$line63 = str_replace('DOK5',$dok5,$line63);
$line63 = str_replace('DOK6',$dok6,$line63);
$line63 = str_replace('DOK01',$dok01,$line63);
$line63 = str_replace('DOK8',$dok8,$line63);
$line63 = str_replace('DOK12',$dok12,$line63);
$line63 = str_replace('DOK13',$dok13,$line63);
$line63 = str_replace('DOK0',$dok0,$line63);
}else{
$line63 = "";
}
if(file_exists("line64.txt")){
$line64 = file_get_contents("line64.txt");
$line64 = str_replace('DOK1',$dok1,$line64);
$line64 = str_replace('DOK2',$dok2,$line64);
$line64 = str_replace('DOK3',$dok3,$line64);
$line64 = str_replace('DOK4',$dok4,$line64);
$line64 = str_replace('DOK5',$dok5,$line64);
$line64 = str_replace('DOK6',$dok6,$line64);
$line64 = str_replace('DOK01',$dok01,$line64);
$line64 = str_replace('DOK8',$dok8,$line64);
$line64 = str_replace('DOK12',$dok12,$line64);
$line64 = str_replace('DOK13',$dok13,$line64);
$line64 = str_replace('DOK0',$dok0,$line64);
}else{
$line64 = "";
}
if(file_exists("data/admin2.txt")){
$admin2 = file_get_contents("data/admin2.txt");
}else{
$admin2 = "[*[ADMIN]*]";
}
if(file_exists("data/admin3.txt")){
$admin3 = file_get_contents("data/admin3.txt");
}else{
$admin3 = "[*[ADMIN]*]";
}
if(file_exists("data/admin4.txt")){
$admin4 = file_get_contents("data/admin4.txt");
}else{
$admin4 = "[*[ADMIN]*]";
}
if(file_exists("data/admin5.txt")){
$admin5 = file_get_contents("data/admin5.txt");
}else{
$admin5 = "[*[ADMIN]*]";
}
if(file_exists("data/starttext.txt")){
$starttext = file_get_contents("data/starttext.txt");
$starttext = str_replace('NAME',$first,$starttext);
$starttext = str_replace('LAST',$last,$starttext);
$starttext = str_replace('USER',$username,$starttext);
$starttext = str_replace('ID',$from_id,$starttext);
}else{
$starttext = "متن استارت تنظیم نشده است";
}
if(file_exists("data/coinamount.txt")){
$coinamount = file_get_contents("data/coinamount.txt");
$coinamount = str_replace('NAME',$first,$coinamount);
}else{
$coinamount = "1";
}
if(file_exists("data/porsant.txt")){
$porsant = file_get_contents("data/porsant.txt");
$porsant = str_replace('NAME',$first,$porsant);
}else{
$porsant = "0.2";
}
if(file_exists("data/typepost.txt")){
$typepost = file_get_contents("data/typepost.txt");
}else{
$typepost = file_put_contents("data/typepost.txt","1");
}
if(file_exists("data/joinmcoin.txt")){
$joinmcoin = file_get_contents("data/joinmcoin.txt");
}else{
$joinmcoin = "10";
}
if(file_exists("data/zirtext.txt")){
$idbot = "[*[USERNAME]*]";
$zirtext = file_get_contents("data/zirtext.txt");
$zirtext = str_replace('NAME',$first,$zirtext);
$zirtext = str_replace('LAST',$last,$zirtext);
$zirtext = str_replace('LINK',"https://t.me/$idbot?start=$chat_id",$zirtext);
$zirtext = str_replace('ID',$chat_id,$zirtext);
}else{
$zirtext = "متن زیرمجموعه گیری تنظیم نشده است";
}
if(file_exists("data/almasgett.txt")){
$almasgett = file_get_contents("data/almasgett.txt");
$almasgett = str_replace('NAME',$first,$almasgett);
$almasgett = str_replace('LAST',$last,$almasgett);
$almasgett = str_replace('ID',$chat_id,$almasgett);
}else{
$almasgett = "تنظیم نشده";
}
if(file_exists("data/ghavanin.txt")){
$ghavanin = file_get_contents("data/ghavanin.txt");
$ghavanin = str_replace('NAME',$first2,$ghavanin);
}else{
$ghavanin = "متن قوانین تنظیم نشده است";
}
if(file_exists("data/botofftext.txt")){
$botofftext = file_get_contents("data/botofftext.txt");
$botofftext = str_replace('NAME',$first2,$ghavanin);
}else{
$botofftext = "متن خاموشی ربات تنظیم نشده است";
}
if(file_exists("data/sef.txt")){
$sef = file_get_contents("data/sef.txt");
$sef = str_replace('NAME',$first2,$sef);
}else{
$sef = "متن سفارش تنظیم نشده است";
}
if(file_exists("data/sabt.txt")){
$sabt = file_get_contents("data/sabt.txt");
$sabt = str_replace('NAME',$first2,$sabt);
}else{
$sabt = "متن ایدی دهی تنظیم نشده است";
}
if(file_exists("data/shoplink1.txt")){
$shoplink1 = file_get_contents("data/shoplink1.txt");
$shoplink1 = str_replace('NAME',$first2,$shoplink1);
}else{
$shoplink1 = "";
}
if(file_exists("data/shopf6.txt")){
$shopf6 = file_get_contents("data/shopf6.txt");
$shopf6 = str_replace('NAME',$first2,$shopf6);
}else{
$shopf6 = "200000";
}
if(file_exists("data/shopf5.txt")){
$shopf5 = file_get_contents("data/shopf5.txt");
$shopf5 = str_replace('NAME',$first2,$shopf5);
}else{
$shopf5 = "150000";
}
if(file_exists("data/shopf4.txt")){
$shopf4 = file_get_contents("data/shopf4.txt");
$shopf4 = str_replace('NAME',$first2,$shopf4);
}else{
$shopf4 = "100000";
}
if(file_exists("data/shopf3.txt")){
$shopf3 = file_get_contents("data/shopf3.txt");
$shopf3 = str_replace('NAME',$first2,$shopf3);
}else{
$shopf3 = "50000";
}
if(file_exists("data/shopf2.txt")){
$shopf2 = file_get_contents("data/shopf2.txt");
$shopf2 = str_replace('NAME',$first2,$shopf2);
}else{
$shopf2 = "30000";
}
if(file_exists("data/textlines.txt")){
$textlines = file_get_contents("data/textlines.txt");
}else{
$textlines = "⌨️کدام دکمه را در اینجا قرار دهم؟

حساب کاربری: DOK2
قوانین: DOK3
ثبت سفارش: DOK4
فروشگاه: DOK5
زیرمجموعه گیری: DOK6
راهنما: DOK8
کدهدیه: DOK12
انتقال الماس: DOK13
پیگیری ها: DOK0

✅هر دکمه ای که میخواید قرار دهید را بفرستید به بزرگی و کوچیکی و عدد ان دقت نمایید.
♦️جهت حذف ان هم 0 را ارسال نمایید.";
}
if(file_exists("data/shopf1.txt")){
$shopf1 = file_get_contents("data/shopf1.txt");
$shopf1 = str_replace('NAME',$first2,$shopf1);
}else{
$shopf1 = "10000";
}
if(file_exists("data/chdok/amardokme1.txt")){
$amardokme1 = file_get_contents("data/chdok/amardokme1.txt");
}else{
$amardokme1 = "$amardokme";
}
if(file_exists("data/ozvname.txt")){
$ozvname = file_get_contents("data/ozvname.txt");
$ozvname = str_replace('NAME',$first2,$ozvname);
}else{
$ozvname = "تنظیم نشده";
}
if(file_exists("data/zirmatntext.txt")){
$zirmatntext = file_get_contents("data/zirmatntext.txt");
$zirmatntext = str_replace('NAME',$first2,$zirmatntext);
}else{
$zirmatntext = "یک شخصی توسط لینک شما وارد ربات شد.

🔷$invitecoin $almasbot به موجودی شما اضافه شد🔷

🔺و با هر عضویت کاربر در چنل ها $porsant $almasbot برایت ارسال میشود🔻";
}
if(file_exists("data/vipjoin.txt")){
$vipjoin = file_get_contents("data/vipjoin.txt");
$vipjoin = str_replace('NAME',$first2,$vipjoin);
}else{
$vipjoin = "متن جوین اجباری تنظیم نشده است!!";
}
if(file_exists("data/invitecoin.txt")){
$invitecoin = file_get_contents("data/invitecoin.txt");
$invitecoin = str_replace('NAME',$first2,$invitecoin);
}else{
$invitecoin = "تنظیم نشده";
}
if(file_exists("data/mmbrsabt1.txt")){
$mmbrsabt1 = file_get_contents("data/mmbrsabt1.txt");
$mmbrsabt1 = str_replace('NAME',$first2,$mmbrsabt1);
}else{
$mmbrsabt1 = "تنظیم نشده";
}
if(file_exists("data/mmbrsabt11.txt")){
$mmbrsabt11 = file_get_contents("data/mmbrsabt11.txt");
$mmbrsabt11 = str_replace('NAME',$first2,$mmbrsabt11);
}else{
$mmbrsabt11 = "تنظیم نشده";
}
if(file_exists("data/mshopname1.txt")){
$mshopname1 = file_get_contents("data/mshopname1.txt");
}else{
$mshopname1 = "💰 50 سکه  | 2000 تومان 💵";
}
if(file_exists("data/mshopname2.txt")){
$mshopname2 = file_get_contents("data/mshopname2.txt");
}else{
$mshopname2 = "💰 100 سکه  | 4000 تومان 💵";
}
if(file_exists("data/mshopname3.txt")){
$mshopname3 = file_get_contents("data/mshopname3.txt");
}else{
$mshopname3 = "💰 200 سکه  | 8000 تومان 💵";
}
if(file_exists("data/mshopname4.txt")){
$mshopname4 = file_get_contents("data/mshopname4.txt");
}else{
$mshopname4 = "💰 500 سکه  | 20000 تومان 💵";
}
if(file_exists("data/mshopname5.txt")){
$mshopname5 = file_get_contents("data/mshopname5.txt");
}else{
$mshopname5 = "💰 1000 سکه  | 35000 تومان 💵";
}
if(file_exists("data/mshopname6.txt")){
$mshopname6 = file_get_contents("data/mshopname6.txt");
}else{
$mshopname6 = "💰 2000 سکه  | 60000 تومان 💵";
}
if(file_exists("data/mshoplink.txt")){
$mshoplink = file_get_contents("data/mshoplink.txt");
}else{
$mshoplink = "https://t.me/none";
}
if(file_exists("data/sef.txt")){
$sef = file_get_contents("data/sef.txt");
}else{
$sef = "متن سفارش تنظیم نشده";
}
if(file_exists("data/piposh.txt")){
$piposh = file_get_contents("data/piposh.txt");
}else{
$piposh = "پیغام شما دریافت شد✅

تا زمان دریافت پاسخ شکیبا باشید🙏🏻";
}
if(file_exists("data/backsinza.txt")){
$backsinza = file_get_contents("data/backsinza.txt");
}else{
$backsinza = "🔙برگشت";
}
if(file_exists("data/bankno.txt")){
$bankno = file_get_contents("data/bankno.txt");
}else{
$bankno = "متن انتقال تنظیم نشده است";
}
if(file_exists("data/sefoff.txt")){
$sefoff = file_get_contents("data/sefoff.txt");
}else{
$sefoff = "متن خاموشی سفارش تنظیم نشده است";
}
if(file_exists("data/botsta.txt")){
$botsta = file_get_contents("data/botsta.txt");
}else{
$botsta = "متن خاموشی ربات تنظیم نشده است";
}
if(file_exists("data/botbankoff.txt")){
$botbankoff = file_get_contents("data/botbankoff.txt");
}else{
$botbankoff = "متن خاموشی انتقال تنظیم نشده است";
}
if(file_exists("data/mdok8.txt")){
$mdok8 = file_get_contents("data/mdok8.txt");
}else{
$mdok8 = "متن راهنما تنظیم نشده است";
}
if(file_exists("data/mtposhtiban.txt")){
$mtposhtiban = file_get_contents("data/mtposhtiban.txt");
}else{
$mtposhtiban = "متن پشتیبانی تنظیم نشده است";
}
if(file_exists("data/codebazi.txt")){
$codebazi = file_get_contents("data/codebazi.txt");
}else{
$codebazi = "متن کد هدیه تنظیم نشده است";
}
if(file_exists("data/bankriz.txt")){
$bankriz = file_get_contents("data/bankriz.txt");
}else{
$bankriz = "10";
}
if(file_exists("data/bankbig.txt")){
$bankbig = file_get_contents("data/bankbig.txt");
}else{
$bankbig = "1000";
}
if(file_exists("data/dok997.txt")){
$dok997 = file_get_contents("data/dok997.txt");
}else{
$dok997 = "$almasboticonدارای $almasbot";
}
if(file_exists("data/almasbot.txt")){
$almasbot = file_get_contents("data/almasbot.txt");
}else{
$almasbot = "الماس";
}
if(file_exists("data/almasboticon.txt")){
$almasboticon = file_get_contents("data/almasboticon.txt");
}else{
$almasboticon = "💎";
}
if(file_exists("data/dokc4.txt")){
$dokc4 = file_get_contents("data/dokc4.txt");
}else{
$dokc4 = "📈پیگیری سفارش📉";
}
if(file_exists("data/dok2a.txt")){
$dok2a = file_get_contents("data/dok2a.txt");
$dok2a = str_replace('NAME',$first,$dok2a);
$dok2a = str_replace('LAST',$last,$dok2a);
$dok2a = str_replace('USER',$username,$dok2a);
$dok2a = str_replace('ID',$from_id,$dok2a);
$dok2a = str_replace('GEM',$coin,$dok2a);
$dok2a = str_replace('TARIKH',$date,$dok2a);
$dok2a = str_replace('INV',$inv,$dok2a);
$dok2a = str_replace('OZV',$ads,$dok2a);
$dok2a = str_replace('SEF',$sefaresh,$dok2a);
$dok2a = str_replace('POR',$invcoin,$dok2a);
$dok2a = str_replace('banakh',$warn,$dok2a);
}else{
$dok2a = "متن حساب کاربری تنظیم نشده";
}
if(file_exists("data/piclink.txt")){
$piclink = file_get_contents("data/piclink.txt");
}else{
$piclink = "http://s2.picofile.com/file/8372103468/member_icon_8_jpg.png️";
}
if(file_exists("data/shoptext.txt")){
$shoptext = file_get_contents("data/shoptext.txt");
$shoptext = str_replace('NAME',$first,$shoptext);
$shoptext = str_replace('LAST',$last,$shoptext);
$idbot = "[*[USERNAME]*]";
$shoptext = str_replace('ID',$chat_id,$shoptext);
}else{
$shoptext = "متن فروشگاه تنظیم نشده است";
}
$sup = "https://t.me/$Support";
$chads = file_get_contents("cht.txt"); //آیدی کانال تبلیغات بدون @
$chor = file_get_contents("data/ch.txt");
$channels = json_decode(file_get_contents("https://api.telegram.org/bot$token/getChatMember?chat_id=@$chor&user_id=".$from_id or $chatid));
$to = $channels->result->status;
$reply = $update->message->reply_to_message->forward_from->id;
$button_manage = json_encode(['keyboard'=>[
[['text'=>"🚫بلاک و آنبلاک✅"]],
[['text'=>"🖥آمار ربات"],['text'=>"📨پیام همگانی"],['text'=>"👤ادمین ها"]],
[['text'=>"📋تنظیم متن"],['text'=>"⌨️چیدمان ربات"],['text'=>"📍دکمه ها"]],
[['text'=>"📤وضعیت سفارش"],['text'=>"📌ثبت سفارش"]],
[['text'=>"💳تنظیمات انتقال"],['text'=>"⛓تنظیمات ربات"],['text'=>"🏦مبادلات ارز"]],
[['text'=>"🎁ساخت کد هدیه"],['text'=>"💸ارز ربات"],['text'=>"💠زیرمجموعه گیری"]],
[['text'=>"🛍فروشگاه"],['text'=>"🆔تنظیم کانال"],['text'=>"🔆راهنما"]],
[['text'=>"🔙 برگشت به ربات"],['text'=>"باقی مانده اشتراک ❗️"]],
],'resize_keyboard'=>true]);
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$menu1 = json_encode(['keyboard'=>[
[['text'=>"$line11"],['text'=>"$line12"],['text'=>"$line13"]],
[['text'=>"$line21"],['text'=>"$line22"],['text'=>"$line23"],['text'=>"$line24"]],
[['text'=>"$line31"],['text'=>"$line32"],['text'=>"$line33"],['text'=>"$line34"]],
[['text'=>"$line41"],['text'=>"$line42"],['text'=>"$line43"],['text'=>"$line44"]],
[['text'=>"$line51"],['text'=>"$line52"],['text'=>"$line53"],['text'=>"$line54"]],
[['text'=>"$line61"],['text'=>"$line62"],['text'=>"$line63"],['text'=>"$line64"]],
[['text'=>"👤ادمین"]],
],'resize_keyboard'=>true]);
}else{
$menu1 = json_encode(['keyboard'=>[
[['text'=>"$line11"],['text'=>"$line12"],['text'=>"$line13"]],
[['text'=>"$line21"],['text'=>"$line22"],['text'=>"$line23"],['text'=>"$line24"]],
[['text'=>"$line31"],['text'=>"$line32"],['text'=>"$line33"],['text'=>"$line34"]],
[['text'=>"$line41"],['text'=>"$line42"],['text'=>"$line43"],['text'=>"$line44"]],
[['text'=>"$line51"],['text'=>"$line52"],['text'=>"$line53"],['text'=>"$line54"]],
[['text'=>"$line61"],['text'=>"$line62"],['text'=>"$line63"],['text'=>"$line64"]],
],'resize_keyboard'=>true]);
}
$amardok = json_encode(['inline_keyboard'=>[
[['text'=>"👤کاربران",'callback_data'=>"karboti"]],
],'resize_keyboard'=>true]);
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

if(!empty($from_id) and $text == $dok4 and $tc == 'private'){
$hhhh = explode("\n",file_get_contents("data/$from_id/channels.txt"));
foreach($hhhh as $chaaa){
     if( $chaaa != "" and $chaaa != "raf" and $text == $dok4){
 $channels5555 = json_decode(file_get_contents("https://api.telegram.org/bot$token/getChatMember?chat_id=$chaaa&user_id=$from_id"));
 $tod5555 = $channels5555->result->status;
 if($tod5555 != 'member' and $tod5555 != 'creator' and $tod5555 != 'administrator' and $text == $dok4){
   $foiii = file_get_contents("data/$from_id/channels.txt");
   $str = str_replace("$chaaa","raf",$foiii);
   file_put_contents("data/$from_id/channels.txt","$str");
   $hjvhvh = str_replace("@","T.me/",$chaaa);
$newin = $coin -2;
$datas["coin"] = "$newin";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
  bot('sendMessage',[
  'chat_id'=>$chat_id,
  'text'=>"💢به دلیل ترک کانال زیر 
$hjvhvh
دو $almasbot از شما کسر شد"
]);
}
}
}
}

if(in_array($from_id, $list['ban'])){
SendMessage($chat_id,"
شما از این ربات مسدود شده اید ❌
",null);
exit();
}else{
function Spam($from_id){
@mkdir("data/spam");
$spam_status = json_decode(file_get_contents("data/spam/$from_id.json"),true);
if($spam_status != null){
if(mb_strpos($spam_status[0],"time") !== false){
if(str_replace("time ",null,$spam_status[0]) >= time())
exit(false);
else
$spam_status = [1,time()+2];
}
elseif(time() < $spam_status[1]){
if($spam_status[0]+1 > 3){
$time = time() + 30;
$spam_status = ["time $time"];
file_put_contents("data/spam/$from_id.json",json_encode($spam_status,true));
bot('SendMessage',[
 'chat_id'=> "[*[ADMIN]*]",
 'text'=>"#گزارش 

مدیرگرامی کاربر با آیدی عددی ( $from_id ) به ربات اسپم زد⚠️

و به مدت 30 ثانیه در ربات مسدود شد⚠️
",
 'parse_mode'=>"HTML",
   ]);
bot('SendMessage',[
'chat_id'=>$from_id,
'text'=>"⚠️کمی آهسته تر از ربات استفاده کنید ⚠️

شما به دلیل اسپم به ربات به مدت 30 ثانیه در ربات بلاک شدید❌

لطفاً پس از گذشت 30 ثانیه ربات را دوباره ( /start ) کنید✅"
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
file_put_contents("data/spam/$from_id.json",json_encode($spam_status,true));
}
}
Spam($from_id);
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
if(strpos($text == "/start") !== false  and $text !=="/start" and $tc == 'private'){
        if($staroff == "off" && !in_array($from_id,$ADMIN)){
bot('sendmessage',[
  'chat_id'=>$chat_id,
  'text'=>"$botsta",
        'parse_mode'=>'MarkDown',
          'reply_markup'=>$menu1
  ]);
    exit();
}
$id=str_replace("/start ","",$text);
$amar=file_get_contents("data/ozvs.txt");
$exp=explode("\n",$amar);
if(!in_array($from_id,$exp) and $from_id != $id){
if(!is_file("VIP")){
	SM($chat_id);
}

$myfile2 = fopen("data/ozvs.txt", "a") or die("Unable to open file!");
$datas = json_decode(file_get_contents("data/$from_id/$from_id.json"),true);
fwrite($myfile2, "$from_id\n");
fclose($myfile2);
$datas["step"] = "free";
$datas["type"] = "empty";
$datas["inv"] = "0";
$datas["coin"] = "$joinmcoin";
$datas["warn"] = "0";
$datas["ads"] = "0";
$datas["sub"] = "$id";
$datas["invcoin"] = "0";
$datas["panel"] = "free";
$datas["timepanel"] = "null";
$datas['dafeee'] = "first";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
$datas12 = json_decode(file_get_contents("data/$id/$id.json"),true);
$invite1 = $datas12["inv"];
settype($invite1,"integer");
$newinvite = $invite1 + 1;
$datas12["inv"] = $newinvite;
$outjson = json_encode($datas12,true);
file_put_contents("data/$id/$id.json",$outjson);
$datas1234 = json_decode(file_get_contents("data/$id/$id.json"),true);
$invite122 = $datas1234["coin"];
settype($invite122,"integer");
$newinvite664 = $invite122 + $invitecoin;
$datas1234["coin"] = $newinvite664;
$outjson = json_encode($datas1234,true);
file_put_contents("data/$id/$id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$id,
'text'=>"$zirmatntext",
'parse_mode'=>"HTML",
]);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"$starttext
",
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$menu1
]); 
}
}
if (!file_exists("data/$from_id/$from_id.json")) {
$myfile2 = fopen("data/ozvs.txt", "a") or die("Unable to open file!");
fwrite($myfile2, "$from_id\n");
fclose($myfile2);
$datas["step"] = "free";
$datas["type"] = "empty";
$datas["inv"] = "0";
$datas["coin"] = "$joinmcoin";
$datas["warn"] = "0";
$datas["ads"] = "0";
$datas["invcoin"] = "0";
$datas["panel"] = "free";
$datas["timepanel"] = "null";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
}
if($text == "/start" and $tc == 'private'){
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
if(!is_file("VIP")){
	SM($chat_id);
}
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"$starttext
",
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$menu1
	]);
	}
	else{
if(!is_file("VIP")){
	SM($chat_id);
}
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"$starttext
",
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$menu1
]); 
}}
if(isset($from_id)){
$truechannel = json_decode(file_get_contents("https://api.telegram.org/bot$token/getChatMember?chat_id=$channel&user_id=$from_id"));
}
else
{
$fromm_id = $update->callback_query->from->id;
$truechannel = json_decode(file_get_contents("https://api.telegram.org/bot$token/getChatMember?chat_id=$channel&user_id=$fromm_id"));
}
$tch25 = $truechannel->result->status;
if($tch25 != 'member' and $tch25 != 'creator' and $tch25 != 'administrator' and is_file("channel.txt") and $chat_id != $admin){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"$vipjoin
",
'disable_web_page_preview' => true,
'parse_mode'=>"HTML",
]);
exit();
}
if($text == "$backsinza" or $text == "$backsinza" and $tc == 'private'){
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"$starttext
",
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$menu1
]); 
}else{
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"$starttext
",
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$menu1
]); 
}}
if($text == "/creator" and $tc == 'private'){
	$creator = file_get_contents("../../creator.txt");
	SendMessage($chat_id,$creator);
}
elseif($text == "$dok0" and $tc == 'private'){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"✅به بخش پشتیبانی ربات خوش اومدید.

👨🏻‍💻:کافیست بر روی دکمه پشتیبانی کلیک کنید و پیام خود را ارسال کنید.

⭐️گزینه مورد نظر خود را انتخاب نمایید.",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"$dok44", 'callback_data'=> 'poshteam']],
]
])
]);
}
if($text == "$dok3" and $tc == 'private'){
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"$ghavanin",
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$menu1
]); 
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"$ghavanin",
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$menu1
]); 
}}
if($text == "$dok8" and $tc == 'private'){
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"$mdok8",
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$menu1
]); 
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"$mdok8",
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$menu1
]); 
}}
elseif($text == "$dok4" and $tc == 'private'){
    if($viewbot == "off" && !in_array($from_id,$ADMIN)){
bot('sendmessage',[
  'chat_id'=>$chat_id,
  'text'=>"$sefoff",
        'parse_mode'=>'MarkDown',
          'reply_markup'=>$menu1
  ]);
    exit();
}
$truechannel = json_decode(file_get_contents("https://api.telegram.org/bot$token/getChatMember?chat_id=$channel&user_id=$chat_id"));
$tch25 = $truechannel->result->status;
if($tch25 != 'member' and $tch25 != 'creator' and $tch25 != 'administrator' and is_file("channel.txt") and $chat_id != $admin){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"$vipjoin",
'disable_web_page_preview' => true,
'parse_mode'=>"HTML",
]);
}else{
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
$sef
",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text' => "$ozvname", 'callback_data' => "seen$mmbrsabt1"]],
                    ],


])
]);
}
}
if ($data == "seen$mmbrsabt3") {
$datas1 = json_decode(file_get_contents("data/$chatid/$chatid.json"),true);
$datas1["ted"] = "$mmbrsabt3";
$outjson = json_encode($datas1,true);
file_put_contents("data/$chatid/sabtkasr.txt",$mmbrsabt33);
file_put_contents("data/$chatid/$chatid.json",$outjson);
$in = $datas1["coin"];
if ($in >= "$mmbrsabt33") {
$datas1["step"] = "seen2";
$outjson = json_encode($datas1,true);
file_put_contents("data/$chatid/$chatid.json",$outjson);
deletemessage($chatid, $message_id2);
bot('sendMessage', [
'chat_id' => $chatid,
'text' => "$sabt",
'parse_mode'=>"HTML",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"$backsinza"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]);
        } else {
             bot('editmessagetext', [
                'chat_id' => $chatid,
                'message_id' => $message_id2,
                'text' => "موجودی شما جهت سفارش این پلن کافی نیست❌",
                'reply_markup' => json_encode([
                 "resize_keyboard"=>true,'one_time_keyboard' => true,
                'inline_keyboard' => [
                            [
            ['text' => "⁉️چگونه موجودی خود را در ربات افزایش دهیم؟", 'callback_data' => "grup"]
                            ],
                        ]
                    ])
            ]);
        }
    } if ($data == "seen$mmbrsabt78") {
$datas1["ted"] = "$mmbrsabt78";
$outjson = json_encode($datas1,true);
file_put_contents("data/$chatid/sabtkasr.txt",$mmbrsabt44);
file_put_contents("data/$chatid/$chatid.json",$outjson);
        $datas1 = json_decode(file_get_contents("data/$chatid/$chatid.json"),true);
        $in = $datas1["coin"];
        if ($in >= "$mmbrsabt44") {
            $datas1["step"] = "seen2";
$outjson = json_encode($datas1,true);
file_put_contents("data/$chatid/$chatid.json",$outjson);
deletemessage($chatid, $message_id2);
bot('sendMessage', [
'chat_id' => $chatid,
'text' => "$sabt",
'parse_mode'=>"HTML",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"$backsinza"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]);
        } else {
             bot('editmessagetext', [
                'chat_id' => $chatid,
                'message_id' => $message_id2,
                'text' => "موجودی شما جهت سفارش این پلن کافی نیست❌",
                'reply_markup' => json_encode([
                 "resize_keyboard"=>true,'one_time_keyboard' => true,
                'inline_keyboard' => [
                            [
            ['text' => "⁉️چگونه موجودی خود را در ربات افزایش دهیم؟", 'callback_data' => "grup"]
                            ],
                        ]
                    ])
            ]);
        }
    } if ($data == "seen$mmbrsabt2") {
$datas1["ted"] = "$mmbrsabt2";
$outjson = json_encode($datas1,true);
file_put_contents("data/$chatid/sabtkasr.txt",$mmbrsabt22);
file_put_contents("data/$chatid/$chatid.json",$outjson);
        $datas1 = json_decode(file_get_contents("data/$chatid/$chatid.json"),true);
        $in = $datas1["coin"];
        if ($in >= "$mmbrsabt22") {
            $datas1["step"] = "seen2";
$outjson = json_encode($datas1,true);
file_put_contents("data/$chatid/$chatid.json",$outjson);
deletemessage($chatid, $message_id2);
bot('sendMessage', [
'chat_id' => $chatid,
'text' => "$sabt",
'parse_mode'=>"HTML",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"$backsinza"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]);
        } else {
             bot('editmessagetext', [
                'chat_id' => $chatid,
                'message_id' => $message_id2,
                'text' => "موجودی شما جهت سفارش این پلن کافی نیست❌",
                'reply_markup' => json_encode([
                 "resize_keyboard"=>true,'one_time_keyboard' => true,
                'inline_keyboard' => [
                            [
            ['text' => "⁉️چگونه موجودی خود را در ربات افزایش دهیم؟", 'callback_data' => "grup"]
                            ],
                        ]
                    ])
            ]);
        }
    } if ($data == "seen210") {
$datas1["ted"] = "210";
$outjson = json_encode($datas1,true);
file_put_contents("data/$chatid/$chatid.json",$outjson);
        $datas1 = json_decode(file_get_contents("data/$chatid/$chatid.json"),true);
        $in = $datas1["coin"];
        if ($in >= "210") {
            $datas1["step"] = "seen2";
$outjson = json_encode($datas1,true);
file_put_contents("data/$chatid/$chatid.json",$outjson);
deletemessage($chatid, $message_id2);
bot('sendMessage', [
'chat_id' => $chatid,
'text' => "$sabt",
'parse_mode'=>"HTML",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"$backsinza"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]);
        } else {
             bot('editmessagetext', [
                'chat_id' => $chatid,
                'message_id' => $message_id2,
                'text' => "موجودی شما جهت سفارش این پلن کافی نیست❌",
                'reply_markup' => json_encode([
                 "resize_keyboard"=>true,'one_time_keyboard' => true,
                'inline_keyboard' => [
                            [
            ['text' => "⁉️چگونه موجودی خود را در ربات افزایش دهیم؟", 'callback_data' => "grup"]
                            ],
                        ]
                    ])
            ]);
        }
    } if ($data == "seen$mmbrsabt1") {
$datas1["ted"] = "$mmbrsabt1";
$outjson = json_encode($datas1,true);
file_put_contents("data/$chatid/sabtkasr.txt",$mmbrsabt11);
file_put_contents("data/$chatid/$chatid.json",$outjson);
        $datas1 = json_decode(file_get_contents("data/$chatid/$chatid.json"),true);
        $in = $datas1["coin"];
        if ($in >= "$mmbrsabt11") {
            $datas1["step"] = "seen2";
$outjson = json_encode($datas1,true);
file_put_contents("data/$chatid/$chatid.json",$outjson);
deletemessage($chatid, $message_id2);
bot('sendMessage', [
'chat_id' => $chatid,
'text' => "$sabt",
'parse_mode'=>"HTML",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"$backsinza"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]);
        } else {
             bot('editmessagetext', [
                'chat_id' => $chatid,
                'message_id' => $message_id2,
                'text' => "موجودی شما جهت سفارش این پلن کافی نیست❌",
                'reply_markup' => json_encode([
                 "resize_keyboard"=>true,'one_time_keyboard' => true,
                'inline_keyboard' => [
                            [
            ['text' => "⁉️چگونه موجودی خود را در ربات افزایش دهیم؟", 'callback_data' => "grup"]
                            ],
                        ]
                    ])
            ]);
        }
    } if ($data == "seen$mmbrsabt5") {
$datas1["ted"] = "$mmbrsabt5";
$outjson = json_encode($datas1,true);
file_put_contents("data/$chatid/sabtkasr.txt",$mmbrsabt55);
file_put_contents("data/$chatid/$chatid.json",$outjson);
        $datas1 = json_decode(file_get_contents("data/$chatid/$chatid.json"),true);
        $in = $datas1["coin"];
        if ($in >= "$mmbrsabt55") {
$datas1["step"] = "seen2";
$outjson = json_encode($datas1,true);
file_put_contents("data/$chatid/$chatid.json",$outjson);
deletemessage($chatid, $message_id2);
bot('sendMessage', [
'chat_id' => $chatid,
'text' => "$sabt",
'parse_mode'=>"HTML",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"$backsinza"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]);
        } else {
             bot('editmessagetext', [
                'chat_id' => $chatid,
                'message_id' => $message_id2,
                'text' => "موجودی شما جهت سفارش این پلن کافی نیست❌",
                'reply_markup' => json_encode([
                 "resize_keyboard"=>true,'one_time_keyboard' => true,
                'inline_keyboard' => [
                            [
            ['text' => "⁉️چگونه موجودی خود را در ربات افزایش دهیم؟", 'callback_data' => "grup"]
                            ],
                        ]
                    ])
            ]);
        }
    } if ($data == "seen$mmbrsabt6") {
$datas1["ted"] = "$mmbrsabt6";
$outjson = json_encode($datas1,true);
file_put_contents("data/$chatid/sabtkasr.txt",$mmbrsabt98);
file_put_contents("data/$chatid/$chatid.json",$outjson);
        $datas1 = json_decode(file_get_contents("data/$chatid/$chatid.json"),true);
        $in = $datas1["coin"];
        if ($in >= "$mmbrsabt98") {
$datas1["step"] = "seen2";
$outjson = json_encode($datas1,true);
file_put_contents("data/$chatid/$chatid.json",$outjson);
deletemessage($chatid, $message_id2);
bot('sendMessage', [
'chat_id' => $chatid,
'text' => "$sabt",
'parse_mode'=>"HTML",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"$backsinza"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]);
        } else {
             bot('editmessagetext', [
                'chat_id' => $chatid,
                'message_id' => $message_id2,
                'text' => "موجودی شما جهت سفارش این پلن کافی نیست❌",
                'reply_markup' => json_encode([
                 "resize_keyboard"=>true,'one_time_keyboard' => true,
                'inline_keyboard' => [
                            [
            ['text' => "⁉️چگونه موجودی خود را در ربات افزایش دهیم؟", 'callback_data' => "grup"]
                            ],
                        ]
                    ])
            ]);
        }
    } if ($data == "seen300") {
$datas1["ted"] = "200";
$outjson = json_encode($datas1,true);
file_put_contents("data/$chatid/$chatid.json",$outjson);
        $datas1 = json_decode(file_get_contents("data/$chatid/$chatid.json"),true);
        $in = $datas1["coin"];
        if ($in >399) {
             bot('editmessagetext', [
                'chat_id' => $chatid,
                'message_id' => $message_id2,
                'text' => "موجودی شما جهت سفارش این پلن کافی نیست❌",
                'reply_markup' => json_encode([
                 "resize_keyboard"=>true,'one_time_keyboard' => true,
                'inline_keyboard' => [
                            [
            ['text' => "⁉️چگونه موجودی خود را در ربات افزایش دهیم؟", 'callback_data' => "grup"]
                            ],
                        ]
                    ])
            ]);
        } else {
            $datas1["step"] = "seen2";
$outjson54522 = json_encode($datas1,true);
file_put_contents("data/$chatid/$chatid.json",$outjson54522);
deletemessage($chatid, $message_id2);
bot('sendMessage', [
'chat_id' => $chatid,
'text' => "$sabt",
'parse_mode'=>"HTML",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"$backsinza"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]);
        }
    }
if ($step == "seen2" and $text != "$backsinza") {
    $al = $datas["ted"];
$sabtkasr = file_get_contents("data/$chat_id/sabtkasr.txt");
$getsho = $coin - $sabtkasr;
$datas["coin"] = "$getsho";
    $outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
    file_put_contents("spam/$from_id.txt",file_get_contents("spam/$from_id.txt") + 1);
    if(file_get_contents("spam/$from_id.txt") <= 1){
      file_put_contents("data/$from_id/com.txt", "none");
    file_put_contents("data/$from_id/coin.txt", $getsho);
sleep(0.5);
bot('ForwardMessage', [
'chat_id' => "@$chads",
'from_chat_id' => $chat_id,
'message_id' => $message_id
]);
$countvw = file_get_contents("data/channels/countvw.txt");
  bot('sendmessage', ['chat_id' => $chat_id, 'text' => "☑️سفارش بازدید شما ثبت شد و پیام تکمیل سفارش هم به زودی برای شما ارسال میشود.

🚀سرعت تکمیل: متوسط
💎هزینه سفارش: $sabtkasr الماس
👁‍🗨تعداد بازدید: $al",
]);
sleep(1);
 bot('sendmessage', ['chat_id' => $chat_id, 'text' => "👈مدتی صبر کنید تا سفارش شما تکمیل شود #توجه کنید که ربات تا پایان ارسال پیام تکمیل قادر به پاسخ گویی به دستورات #نیست.
 ",
]);
sleep(10);
 bot('sendmessage', ['chat_id' => $chat_id, 'text' => "✅سفارش شما تکمیل شد.

💎هزینه سفارش: $sabtkasr الماس
👁‍🗨تعداد بازدید: $al

• چنان ک فکر میکنید سین ها به پست شما ارسال نشده است به پشتیبانی مراجعه کنید.",
'parse_mode' => 'MarkDown',
'reply_markup' => json_encode(['resize_keyboard' => true, 
'keyboard' =>[[['text' => "$backsinza"]]]])]);
file_put_contents("data/sofs.txt", $sofs);
file_put_contents("spam/$from_id.txt",0);
}
}
if($data == "home"){
$datas1["step"] = "free";
$outjson = json_encode($datas1,true);
file_put_contents("data/$chatid/$chatid.json",$outjson);
bot('editmessagetext', [
'chat_id' => $chatid,
'message_id' => $message_id2,
'text' => "عملیات لغو شد××
شما به منوی اصلی برگشتید🏛
لطفا یک گزینه را انتخاب کنید:)",
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$menu1
]);
}
if($text == "$dok5" and $tc == 'private'){
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
$shoptext
",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text' => "$mshopname1", 'url' => "$mshoplink/$shopf1"],['text' => "$mshopname2", 'url' => "$mshoplink/$shopf2"]],
[['text' => "$mshopname3", 'url' => "$mshoplink/$shopf3"],['text' => "$mshopname4", 'url' => "$mshoplink/$shopf4"]],
[['text' => "$mshopname5", 'url' => "$mshoplink/$shopf5"],['text' => "$mshopname6", 'url' => "$mshoplink/$shopf6"]],
]
])
]);
}
if($text=="$dok6" and $tc == 'private'){
    bot('sendphoto',[
    'photo'=>"$piclink",
    'chat_id'=>$chat_id,
    'caption'=>"$zirtext
",
'parse_mode'=>'html',

    ]);
}


if($data == "buycoin"){
$datas1["step"] = "free";
$outjson = json_encode($datas1,true);
file_put_contents("data/$chatid/$chatid.json",$outjson);
bot('editmessagetext', [
'chat_id' => $chatid,
'message_id' => $message_id2,
'text'=>"
$shoptext
",
'parse_mode'=>"HTML",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text' => "$mshopname1", 'url' => "$mshoplink"]
                    ],
                    [
['text' => "$mshopname2", 'url' => "$mshoplink"]
                    ],
                    [
['text' => "$mshopname3", 'url' => "$mshoplink"]
                    ],
                    [
['text' => "$mshopname4", 'url' => "$mshoplink"]
                    ],
[
['text' => "$mshopname5", 'url' => "$mshoplink"]
],
[
['text' => "$mshopname6", 'url' => "$mshoplink"]
],
]
])
]);
}
elseif($text == "$dok12" and $tc == 'private'){
mkdir("data/codesx");
$datas["step"] = "mgiftcode";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"$codebazi",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"$backsinza"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}
if($step == "mgiftcode" and $text != "$backsinza" and $tc == 'private'){ 
      if(file_exists("data/codesx/$text.txt")){
        $pricegift = file_get_contents("data/codesx/$text.txt");
        $datas = json_decode(file_get_contents("data/$chat_id/$chat_id.json"),true);
        $inv = $datas["coin"];
        $newin = $inv + $pricegift;
        $datas["coin"] = "$newin";
        $outjson = json_encode($datas,true);
        file_put_contents("data/$chat_id/$chat_id.json",$outjson);
		SendMessage($chat_id,"کد ارسالی شما صحیح بود و مقدار $pricegift به حساب شما افزوده شد✅");
        unlink("data/codesx/$text.txt");
        $datas1["step"] = "free";
bot('sendMessage', [
'chat_id' =>"$channelcode",
'text' => "کد هدیه با موفقیت استفاده شد✅
==========================================
🔢کد استفاده شده : $text
👤کاربر استفاده کننده : $chat_id
========================================== 
کد ( $text ) منقضی و دیگر قابل استفاده نخواهد بود⚠️
🤖 @[*[USERNAME]*]",
]);
	}else{
		SendMessage($chat_id,"❌کد ارسالی نامعتبر و یا استفاده شده می باشد");
	}
}
elseif($data == "poshteam"){
    $chat_id = $update->callback_query->message->chat->id;
    $from_id = $update->callback_query->message->chat->id;
$datas["step"] = "support";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"$mtposhtiban",
'parse_mode'=>'Markdown', 
'reply_markup'=>json_encode([ 
'resize_keyboard'=>true,
            'keyboard'=>[
                [
                ['text'=>"$backsinza"],
                ]
              ],
])
]);
}
if($step == "support" && $text != "$backsinza"){ 
$datas["step"] = "support";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('ForwardMessage',[
'chat_id'=>$admin,
'from_chat_id'=>$chat_id,
'message_id'=>$message_id
]);
SendMessage($admin,"👆🏻عددی کاربر پیام بالا: $chat_id

✅جهت پاسخ دهی وارد بخش پیام به کاربر شوید و سپس عددی شخص را وارد نمایید و پیام خود را ارسال کنید.");
SendMessage($chat_id,"پیغام شما دریافت شد✅

تا زمان دریافت پاسخ شکیبا باشید🙏🏻");
}
elseif($s2da != "" && $from_id == $admin){
bot('sendmessage',[
'chat_id'=>$s2da,
 'text'=>"✅پاسخ تیم پشتیبانی
 
$text",
'parse_mode'=>'MarkDown',
]);
bot('sendmessage',[
 'chat_id'=>$chat_id,
 'text'=>"پاسخ با موفقیت به $s2da ارسال شد",
'parse_mode'=>'MarkDown',
 ]);
}
elseif($text == "$dok13" and $tc == 'private'){
    if($bankboton == "off" && !in_array($from_id,$ADMIN)){
bot('sendmessage',[
  'chat_id'=>$chat_id,
  'text'=>"$botbankoff",
        'parse_mode'=>'MarkDown',
          'reply_markup'=>$menu1
  ]);
    exit();
}
$datas["step"] = "movegeme";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
      if ($text = $chat_id) {
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"$bankno",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"$backsinza"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
if($step == "movegeme" and $text != "/start" and $text != "$backsinza" and $text != "$chat_id" and $tc == 'private'){ 
      if(file_exists("data/$text/")){
        file_put_contents("data/$chat_id/movemem.txt",$text);
$datas["step"] = "movegeme2";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
		SendMessage($chat_id,"چه تعداد $almasbot میخواهید به کاربر ( $text ) انتقال دهید؟ 

👈🏼حداقل مقدار مجاز انتقال  $bankriz $almasbot میباشد 
✅حداکثر انتقال مجاز برای شما : $bankbig
$almasboticon موجودی شما : $coin");
        unlink("data/codesx/$text.txt");
	}else{
		SendMessage($chat_id,"این کاربر تاکنون از ربات ما استفاده نکرده و امکان انتقال $almasbot به این کاربر فراهم نیست!");
	}
}
if($step == "movegeme2" and $text != "/start" and $text != "$backsinza" and $tc == 'private'){ 
    if(preg_match("/^(-){0,1}([0-9]+)(,[0-9][0-9][0-9])*([.][0-9]){0,1}([0-9]*)$/",$text)){
$datas = json_decode(file_get_contents("data/$from_id/$from_id.json"),true);
        
        
        $coin11 = (abs($text));
        
        
        
        $inv = $datas["coin"];
    if ($inv >= $coin11) {
  if($text >= $coin11 && $coin11 >= $bankriz && $coin11 <= $bankbig){
        $movemem = file_get_contents("data/$from_id/movemem.txt");
        $datas = json_decode(file_get_contents("data/$from_id/$from_id.json"),true);
        $inv = $datas["coin"];
        $newin = $inv - $coin11;
        $datas["coin"] = "$newin";
        $outjson = json_encode($datas,true);
        file_put_contents("data/$from_id/$from_id.json",$outjson);
        $datas212 = json_decode(file_get_contents("data/$movemem/$movemem.json"),true);
        $inv212 = $datas212["coin"];
        $newin212 = $inv212 + $coin11;
        $datas212["coin"] = "$newin212";
        $outjson = json_encode($datas212,true);
        file_put_contents("data/$movemem/$movemem.json",$outjson);
        
        

        
        
		SendMessage($chat_id,"✅با موفقیت $coin11 موجودی به کاربری $movemem انتقال یافت.");
				bot('SendMessage',[
 'chat_id'=>"[*[ADMIN]*]",
 'text'=>"#گزارش_انتقال

کاربر با آیدی عددی ( $chat_id )  مقدار ( $coin11 ) $almasbot به کاربر ( $movemem ) منتقل کرد✅
",
 'parse_mode'=>"HTML",
   ]);
		SendMessage($movemem,"💎کاربر گرامی ,

شما مقدار $coin11 از کاربر $chat_id $almasbot دریافت کردید✅");
$datas["step"] = "none";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
	}else{
		SendMessage($chat_id,"✅لطفا عدد را بین بازه حداقل و حداکثر ارسال نمایید❌");
	}
    }else{
		SendMessage($chat_id,"لطفا عدد وارد کنید");
	}
	}else{
		SendMessage($chat_id,"⛔️$almasbot شما جهت انتقال کافی نیست");
	}
}
if($text == "$dok2" and $tc == 'private'){
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
$step = $datas["step"];
$inv = $datas["inv"];
$coin = $datas["coin"];
$type = $datas["type"];
$sefaresh = $datas["sefaresh"];
$warn = $datas["warn"];
$ads = $datas["ads"];
$invcoin = $datas["invcoin"];
bot('sendMessage',[
'chat_id'=>$chat_id,
 'text'=>"
 $dok2a
",
'parse_mode'=>'HTML',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"",'url' => "https://t.me/"]],
]
])
]);
}
elseif($text == "مدیریت" or $text == "🔝ورود به پنل مدیریت🔝" or $text == "/panel" or $text == "ادمین" or $text == "مدیر" or $text == "👤ادمین" or $text == "panel" and $tc == 'private'){
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);

bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"💎مدیر عزیز به پنل مدیریت رباتت خوش اومدی.️",
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$button_manage
]); 
}
}
elseif($text == "باقی مانده اشتراک ❗️" and $tc == 'private'){
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
تا پایان اشتراک شما $day روز باقی مانده است ✅
",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
]); 
}}
elseif($data == "karboti"){
    $chat_id = $update->callback_query->message->chat->id;
    $from_id = $update->callback_query->message->chat->id;
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$alluser = file_get_contents("data/ozvs.txt");
$alaki = explode("\n",$alluser);
$allusers = count($alaki) - 2;
$done = file_get_contents("data/done.txt");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
👤تعداد ممبر های ربات :  $allusers
",
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$amardok
]); 
}}

elseif($data == "axsef"){
    $chat_id = $update->callback_query->message->chat->id;
    $from_id = $update->callback_query->message->chat->id;
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
    file_put_contents("data/typepost.txt",1);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
✅نوع تبلیغ به صورت عکس دار تنظیم شد
",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
	'reply_markup'=>$button_manage
]); 
}}
elseif($data == "matensef"){
    $chat_id = $update->callback_query->message->chat->id;
    $from_id = $update->callback_query->message->chat->id;
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
    file_put_contents("data/typepost.txt",0);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
✅نوع تبلیغ به صورت متنی تنظیم شد
",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
	'reply_markup'=>$button_manage
]); 
}}
elseif($data == "listtabligh"){
    $chat_id = $update->callback_query->message->chat->id;
    $from_id = $update->callback_query->message->chat->id;
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
    $alluser = file_get_contents("data/ozvs.txt");
$alaki = explode("\n",$alluser);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
⚠️به دستور مدیریت رباتساز این بخش تا اطلاع ثانوی غیرفعال است⚠️
",
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$amardok
]); 
}}
elseif($text == "📨پیام همگانی" and $tc == 'private'){
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
    $alluser = file_get_contents("data/ozvs.txt");
$alaki = explode("\n",$alluser);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
📨پیام همگانی

🔔پیام به کاربر🔔:عددی شخص را میدهید و پیام خود را ارسال میکنید و پیام شما فقط برای اون شخص ارسال میشود.
📣فروارد همگانی:پیام شما بصورت فروارد برای همه کاربران رباتتون ارسال میشود.
📢پیام همگانی: پیام شما بصورت عادی برای همه کاربران رباتتون ارسال میشود.

🗯جهت کارکرد بر روی یکی از دکمه های شیشه ای کلیک نمایید🗯
",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
            [['text'=>"🔔پیام به کاربر🔔", 'callback_data'=> 'pmkar']],
    [['text'=>"📢پیام همگانی", 'callback_data'=> 'pmhamg'],['text'=>"📣فروارد همگانی", 'callback_data'=> 'forhamg']],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($text == "📌ثبت سفارش" and $tc == 'private'){	
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$alluser = file_get_contents("data/ozvs.txt");
$alaki = explode("\n",$alluser);
$allusers = count($alaki);
$done = file_get_contents("data/done.txt");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"👤به بخش تنظیم ثبت سفارش ربات خوش اومدید.

💡نام پلن ها: نام دکمه های شیشه ای که وقتی بر روی ثبت سفارش نشان داده میشود.

💰موجودی نیاز: تعداد موجودی جهت ثبت سفارش ان پلن

📍یک گزینه را انتخاب نمایید📍
",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
    [['text'=>"👤نام پلن ها", 'callback_data'=> 'sinzanos'],['text'=>"🔍تعداد بازدید️",'callback_data'=> 'sinzanos'],['text'=>"💎$almasbot نیاز️",'callback_data'=> 'sinzanos']],
    [['text'=>"$ozvname", 'callback_data'=> 'ozvname1'],['text'=>"$mmbrsabt1", 'callback_data'=> 'ozvte1'],['text'=>"$mmbrsabt11", 'callback_data'=> 'almasni1']],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($text == "🛍فروشگاه" and $tc == 'private'){
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
    $alluser = file_get_contents("data/ozvs.txt");
$alaki = explode("\n",$alluser);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
لطفاً گزینه مورد نظر خود را انتخاب کنید :
",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
    [['text'=>"💸تنظیم متن پلن ها"]],
[['text'=>"🔐تنظیم لینک درگاه"],['text'=>"💳تنظیم قیمت پلن ها"]],
[['text'=>"🔙بازگشت به منو"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($text == "📋تنظیم متن" and $tc == 'private'){
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
    $alluser = file_get_contents("data/ozvs.txt");
$alaki = explode("\n",$alluser);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
🗒به قسمت تنظیم متن ربات خوش اومدید.

👤متن سفارش:وقتی رو دکمه سفارش میزنند پیام بالا دکمه شیشه ای
🆔دریافت ایدی: وقتی شخص میخواهد ایدی کانال خود را جهت ثبت بدهد و باید حتما با @ باشد
👨🏻‍💻متن پشتیبانی: موقع ای که شخص بر روی دکمه پشتیبانی میزند
🖲پیغام دریافت: موفع ای که شخص پیام خود را ارسال کرد
❌متن قوانین:وقتی شخص بر روی دکمه قوانین کلیک میکند
📚متن راهنما: وقتی شخص بر روی دکمه راهنما کلیک میکند.
🎉متن کد هدیه: وقتی شخص بر روی دکمه کد هدیه کلیک میکند.
🔱متن جوین: وقتی شخص بر روی کانال اطلاع رسانی و کد هدیه عضو نمیباشد و باید خودتون ایدی را درج کنید.
☑️متن استارت: وقتی شخص ربات را استارت کرد.
💎متن دریافت الماس: وقتی شخص دکمه دریافت الماس کلیک میکند و متن بالای دکمه های شیشه ای ظاهر میشود.
🗃متن فروشگاه: وقتی شخص بر روی دکمه فروشگاه کلیک میکند و متن بالای دکمه شیشه ای ظاهر میشود.
📂متن پروفایل: وقتی شخص بر روی دکمه پروفایل کلیک میکند.

🎈جهت ادامه یکی از دکمه شیشه ای کلیک نمایید🎈
",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
    [['text'=>"💎تنظیم متن قسمت سفارش💎", 'callback_data'=> 'sinzanos']],
    [['text'=>"👤متن سفارش", 'callback_data'=> 'mtsefmt'],['text'=>"🆔دریافت ایدی", 'callback_data'=> 'mtidmt']],
        [['text'=>"📞تنظیم متن پشتیبانی☎️", 'callback_data'=> 'sinzanos']],
        [['text'=>"👨🏻‍💻متن پشتیبانی", 'callback_data'=> 'mtpomt'],['text'=>"🖲پیغام دریافت", 'callback_data'=> 'mtpimt']],
                [['text'=>"🤖 تنظیم متن ربات 🤖️", 'callback_data'=> 'sinzanos']],
                        [['text'=>"❌متن قوانین", 'callback_data'=> 'mtghmt'],['text'=>"📚متن راهنما", 'callback_data'=> 'mtramt']],
                        [['text'=>"🎉متن کد هدیه", 'callback_data'=> 'mtcomt'],['text'=>"🔱متن جوین", 'callback_data'=> 'mtjomt']],
                                [['text'=>"☑️متن استارت", 'callback_data'=> 'mtesmt'],['text'=>"💎متن دریافت الماس", 'callback_data'=> 'mtalmt']],
                                        [['text'=>"🗃متن فروشگاه", 'callback_data'=> 'mtfomt'],['text'=>"📂متن پروفایل", 'callback_data'=> 'mthemt']],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($text == "🏦مبادلات ارز" and $tc == 'private'){
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
    $alluser = file_get_contents("data/ozvs.txt");
$alaki = explode("\n",$alluser);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
🔄مبادلات

💎اهدا: افزایش موجودی یک شخص.
❌کسر: کسر موجودی یک شخص.
✅اهدا همگانی: اهدا موجودی به همه کاربران ربات
🚫کسر همگانی: کسر موجودی از همه کاربران ربات
💡پورسانت اولیه: موجودی کاربر موقع استارت.

♦️گزینه مورد نظر خود را انتخاب نمایید♦️
",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
    [['text'=>"💰 بخش اهدا و کسر بصورت شخصی💎", 'callback_data'=> 'sinzanos']],
    [['text'=>"❌کسر", 'callback_data'=> 'ksralmasi'],['text'=>"💎اهدا", 'callback_data'=> 'ehalmasi']],
        [['text'=>"💰 بخش اهدا و کسر بصورت همگانی💎", 'callback_data'=> 'sinzanos']],
        [['text'=>"❌کسر همگانی", 'callback_data'=> 'hamksr'],['text'=>"💎اهدا همگانی", 'callback_data'=> 'hamersal']],
                [['text'=>"🎁تنظیمات پورسانت ربات🎁", 'callback_data'=> 'sinzanos']],
                        [['text'=>"💡پورسانت اولیه", 'callback_data'=> 'poravali']],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($text == "💠زیرمجموعه گیری" and $tc == 'private'){
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
    $alluser = file_get_contents("data/ozvs.txt");
$alaki = explode("\n",$alluser);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"📤به بخش تنظیم زیرمجموعه خوش اومدید.

📇تنظیم متن: متن بنر زیر عکس زیر مجموعه
🖼تنظیم عکس: عکس زیر مجموعه گیری
🎉زیرمجموعه: تنظیم موجودی زیر مجموعه با اولین استارت ربات
🌟تنظیم متن زیرمجموعه: پیام اطلاع رسانی به کاربری که شخصی را دعوت کرده است.

✨جهت تنظیم یکی از دکمه ها را انتخاب نمایید✨
",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
    [['text'=>"🔵تنظیمات زیر مجموعه🔵", 'callback_data'=> 'sinzanos']],
    [['text'=>"📇متن زیرمجموعه", 'callback_data'=> 'mtzirtxt'],['text'=>"🖼تنظیم عکس", 'callback_data'=> 'axsbaners']],
        [['text'=>"💰تنظیم مقدار ارز دهی💎", 'callback_data'=> 'sinzanos']],
        [['text'=>"🎉زیرمجموعه", 'callback_data'=> 'alzirtxt']],
                [['text'=>"🌟تنظیم متن زیرمجموعه🌟", 'callback_data'=> 'mtzirrtxt']],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($text == "💳تنظیمات انتقال" and $tc == 'private'){	
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$alluser = file_get_contents("data/ozvs.txt");
$alaki = explode("\n",$alluser);
$allusers = count($alaki);
$done = file_get_contents("data/done.txt");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
💳تنظیم بخش انتقال ربات

📈حداقل انتقال: کمتر از ان عدد نمیتوانند انتقال انجام دهند.
📥حداکثر انتقال:بیشتر از ان عدد نتوانند انتقال انجام دهند.
🔄متن انتقال:وقتی شخص بر روی دکمه انتقال کلیک میکنند.
📬متن خاموشی:وقتی بخش انتقال را خاموش میکنید.
💤خاموش شدن: بخش انتقال از دسترس خارج شود.
🌐روشن کردن:بخش انتقال در دسترس قرار گیرد.

♻️جهت تنظیم بر روی دکمه شیشه ای کلیک نمایید♻️
",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
        [['text'=>"🏧حداقل و حداکثر انتقال🏧", 'callback_data'=> 'sinzambaba']],
    [['text'=>"$bankriz", 'callback_data'=> 'hadent'],['text'=>"📈حداقل انتقال️",'callback_data'=> 'sinzambaba']],
    [['text'=>"$bankbig",'callback_data'=> 'hakent'],['text'=>"📥حداکثر انتقال️",'callback_data'=> 'sinzambaba']],
            [['text'=>"🎉متن های قابل تنظیم🎁", 'callback_data'=> 'sinzambaba']],
    [['text'=>"📬متن خاموشی️️", 'callback_data'=> 'matkha'],['text'=>"🔄متن انتقال️",'callback_data'=> 'matent']],
                [['text'=>"🟥خاموش روشن انتقال⬛️", 'callback_data'=> 'sinzambaba']],
        [['text'=>"🌐روشن شدن️️️", 'callback_data'=> 'roshent'],['text'=>"💤خاموش شدن",'callback_data'=> 'khament']],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($text == "📤وضعیت سفارش" and $tc == 'private'){	
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$alluser = file_get_contents("data/ozvs.txt");
$alaki = explode("\n",$alluser);
$allusers = count($alaki);
$done = file_get_contents("data/done.txt");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
📤وضعیت سفارش

✅روشن شدن: روشن شدن بخش ثبت سفارش
📛خاموش شدن: خاموش کردن بخش سفارش
💬متن خاموشی سفارش:متنی که وقتی ثبت سفارش خاموش است

📣جهت تنظیم بر روی یکی از دکمه شیشه ای کلیک نمایید📣
",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
    [['text'=>"✅روشن شدن", 'callback_data'=> 'roshsef'],['text'=>"📛خاموش شدن️",'callback_data'=> 'khamsef']],
    [['text'=>"💬متن خاموشی سفارش️️", 'callback_data'=> 'matkham']],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($text == "⛓تنظیمات ربات" and $tc == 'private'){	
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$alluser = file_get_contents("data/ozvs.txt");
$alaki = explode("\n",$alluser);
$allusers = count($alaki);
$done = file_get_contents("data/done.txt");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
⛓تنظیمات ربات شما

💡متن خاموشی ربات:وقتی که ربات را خاموش میکنید.
🔊روشن کردن: روشن کردن ربات خود.
🔇خاموش کردن: خاموش کردن ربات خود.

🔘جهت تنظیم بر روی یک دکمه شیشه ای کلیک نمایید🔘
",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
    [['text'=>"🔊روشن کردن", 'callback_data'=> 'roshbotur'],['text'=>"🔇خاموش کردن️",'callback_data'=> 'khambotur']],
        [['text'=>"💡متن خاموشی ربات💡️️️", 'callback_data'=> 'mtkhambotur']],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($text == "⌨️چیدمان ربات" and $tc == 'private'){
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
    $alluser = file_get_contents("data/ozvs.txt");
$alaki = explode("\n",$alluser);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
لطفاً گزینه مورد نظر خود را انتخاب کنید :
",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"لاین1️⃣"],['text'=>"لاین2️⃣"],['text'=>"لاین3️⃣️"]],
[['text'=>"♠️لاین1"],['text'=>"♥️لاین2"],['text'=>"♣️لاین3"],['text'=>"♦️لاین4"]],
[['text'=>"🟦لاین1"],['text'=>"⬛️لاین2"],['text'=>"🟥لاین3"],['text'=>"⬜️لاین4"]],
[['text'=>"💎لاین1"],['text'=>"💰لاین2"],['text'=>"💳لاین3"],['text'=>"💸لاین4"]],
[['text'=>"🎈لاین1"],['text'=>"🎊لاین2"],['text'=>"🎁لاین3"],['text'=>"🎉لاین4"]],
[['text'=>"⚡️لاین1"],['text'=>"✨لاین2"],['text'=>"🌟لاین3"],['text'=>"⭐️لاین4"]],
[['text'=>"🔙بازگشت به منو"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($text == "💳تنظیم قیمت پلن ها" and $tc == 'private'){
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
    $alluser = file_get_contents("data/ozvs.txt");
$alaki = explode("\n",$alluser);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
لطفاً گزینه مورد نظر خود را انتخاب کنید :
",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"فروشگاه پلن 1"],['text'=>"فروشگاه پلن 2"]],
[['text'=>"فروشگاه پلن 3"]
,['text'=>"فروشگاه پلن 4"]
],[['text'=>"فروشگاه پلن 5"],['text'=>"فروشگاه پلن 6"]],
[['text'=>"🔙بازگشت به منو"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($text == "🔙 برگشت به ربات" and $tc == 'private'){
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
    $alluser = file_get_contents("data/ozvs.txt");
$alaki = explode("\n",$alluser);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"مدیر گرامی به منی اصلی ربات خوش آمدید !

جهت ورود دوباره به پنل در ربات دستور /panel را ارسال کنید
",
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$menu1
]); 
}}
elseif($text == "🚫بلاک و آنبلاک✅" and $tc == 'private'){
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
    $alluser = file_get_contents("data/ozvs.txt");
$alaki = explode("\n",$alluser);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
🚫بلاک و آنبلاک✅

⛔️جهت بلاک کردن کاربر عددی شخص را وارد نمایید و عدد 3 را وارد نمایید و تعداد پایین تر از ان اخطار میشود.
✅جهت انبلاک کردن تعداد اخطاری که شخص دادید را کسر نمایید.

❗️جهت کارکرد یکی از دکمه شیشه ای های زیر را انتخاب نمایید❕
",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
            [['text'=>"⛔️بخش بلاک و انبلاک✅", 'callback_data'=> 'sinznopebrosokey']],
    [['text'=>"✅انبلاک کردن", 'callback_data'=> 'blockinfo'],['text'=>"⛔️بلاک کردن", 'callback_data'=> 'unblockinfo']],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($text == "🔙بازگشت به منو" and $tc == 'private'){
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
مدیر گرامی شما با موفقیت به منو بازگشتید :
",
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$button_manage
]); 
}}
elseif($text == "🆔تنظیم کانال" and $tc == 'private'){
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"قصد تنظیم کدام کانال را دارید؟

⚠️توجه⚠️
1️⃣پس از تنظیم کانال ها حتما متن جوین را تنظیم کنید .
2️⃣ربات ادمین هر سه کانال باشه .
",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
    [['text'=>"🎁کانال کد هدیه🎁", 'callback_data'=> 'chacodehed']],
    [['text'=>"⚙️کانال اطلاع رسانی", 'callback_data'=> 'chaetela'],['text'=>"🎈کانال تبلیغات", 'callback_data'=> 'chatabli']],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($text == "🔆راهنما" and $tc == 'private'){
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
راهنما / Help❗️

1️⃣جهت پاسخ به پیغام های پشتیبانی دستور /javab را ارسال کنید .
2️⃣جهت پایان دادن به سفارشات بر روی دکمه { $dok278 } کلیک کنید.
3️⃣جهت دریافت اطلاعات سفارش و سفارش دهنده بر روی دکمه 🚫گزارش🚫 در زیر تبلیغات کلیک کنید.

مابقی دستورات و کلمات واضح هست اگر باز هم سوالی داشتید به پشتیبانی ربات اطلاع بدید تا پاسخ خود را دریافت کنید ...

",
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$button_manage
]); 
}}
elseif($text == "🖥آمار ربات" and $tc == 'private'){
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"🖥آمار ربات

👤کاربران:تعداد کاربرانی که ربات شما رو استارت کردند.
📈تبلیغات: تعداد تبلیغات پایان یافته در بخش سفارش.

💌گزینه مورد نظر را انتخاب نمایید💌
",
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$amardok
]); 
}}
elseif($text == "📈آمار ربات📉" and $tc == 'private'){
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$alluser = file_get_contents("data/ozvs.txt");
$alaki = explode("\n",$alluser);
$allusers = count($alaki) - 2;
$done = file_get_contents("data/done.txt");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"تعداد کاربران ربات شما: $allusers
تبلیغات انجام شده : $done
",
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$button_manage
]); 
}}

elseif($text == "💸تنظیم متن پلن ها" and $tc == 'private'){	
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$alluser = file_get_contents("data/ozvs.txt");
$alaki = explode("\n",$alluser);
$allusers = count($alaki);
$done = file_get_contents("data/done.txt");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"به قسمت تنظیم فروشگاه خوش آمدید

در این قسمت میتوانید نام محصولات را مدیریت کنید",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"نام محصول دوم"],['text'=>"نام محصول اول"]],
[['text'=>"نام محصول چهارم"],['text'=>"نام محصول سوم"]],
[['text'=>"نام محصول ششم"],['text'=>"نام محصول پنجم"]],
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($text == "👤ادمین ها" and $tc == 'private'){	
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$alluser = file_get_contents("data/ozvs.txt");
$alaki = explode("\n",$alluser);
$allusers = count($alaki);
$done = file_get_contents("data/done.txt");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"📌به بخش تنظیم ادمین خوش امدید.

👤در این قسمت میتوانید 4 ادمین به ربات اضافه نمایید.

💡جهت تنظیم رو دکمه های شیشه ای کلیک نمایید💡
",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
    [['text'=>"👤ادمین اول", 'callback_data'=> 'admin13'],['text'=>"👤ادمین دوم️",'callback_data'=> 'admin14']],
        [['text'=>"👤ادمین سوم", 'callback_data'=> 'admin15'],['text'=>"👤ادمین چهارم️",'callback_data'=> 'admin16']]
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"شما اجازه ورود به این بخش را ندارید!",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"$backsinza"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]);     
}}
elseif($text == "👤ادمین ها" and $tc == 'private'){	
if ($chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$alluser = file_get_contents("data/ozvs.txt");
$alaki = explode("\n",$alluser);
$allusers = count($alaki);
$done = file_get_contents("data/done.txt");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"شما اجازه ورود به این بخش را ندارید!",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($text == "📍دکمه ها" and $tc == 'private'){	
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$alluser = file_get_contents("data/ozvs.txt");
$alaki = explode("\n",$alluser);
$allusers = count($alaki);
$done = file_get_contents("data/done.txt");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
💎به بخش تنظیم دکمه های ربات خوش اومدید💎

✅جهت تنظیم خر دکمه ای روی ان کلیک کنید و سپس تنظیم کنید.
📞درصورت درخواست حذف دکمه بهتر است نام تمام دکمه ها را درست کنید و دکمه هایی که نمیخواید کار کنند یک اسم بسیار زیاد و گنگ بزنید و وقتی میخواید نمایش داده شود در قسمت چیدمان ربات تنظیم کنید.

🎁یک بخش را انتخاب نمایید🎁
",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
    [['text'=>"دکمه بازگشت", 'callback_data'=> "backbut"],['text'=>"$dok0",'callback_data'=> 'pihdok']],
    [['text'=>"$dok2", 'callback_data'=> 'heska'],['text'=>"$dok6",'callback_data'=> 'zirshe']],
    [['text'=>"$dok4", 'callback_data'=> 'sefshe'],['text'=>"$dok3",'callback_data'=> 'ghavshe']],
    [['text'=>"$dok5", 'callback_data'=> 'forshe'],['text'=>"$dok8",'callback_data'=> 'rahshe']],
    [['text'=>"$dok13", 'callback_data'=> 'enshe'],['text'=>"$dok12",'callback_data'=> 'codeshe']],
    [['text'=>"$dok44", 'callback_data'=> 'poshshe']],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($data == "axsbaners"){
    $chat_id = $update->callback_query->message->chat->id;
    $from_id = $update->callback_query->message->chat->id;
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "starttext688";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"عکس مورد نظر را ارسال کنید :",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔙بازگشت به منو"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($step == "starttext688" and $text != "🔝ورود به پنل مدیریت🔝" and $tc == 'private' and $text != "$backsinza" and $tc == 'private'){
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
	$filephoto = $update->message->photo;
	$photo = $filephoto[count($filephoto)-1]->file_id;
	if(isset($photo)){
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("data/piclink.txt",$photo);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"با موفقیت تنظیم شد",
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$button_manage
]); 
	}else{
		bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"عکس ارسالی نامعتبر است❗️",
'parse_mode'=>"MarkDown"
]); 
	}
}}
elseif($data == "botshe"){
    $chat_id = $update->callback_query->message->chat->id;
    $from_id = $update->callback_query->message->chat->id;
  if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
    $datas["step"] = "starterboysno";
    $outjson = json_encode($datas,true);
    file_put_contents("data/$from_id/$from_id.json",$outjson);
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"دکمه لینک ربات  را ارسال کنید
جهت حذف دکمه 0 را ارسال کنید.",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
  }
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
elseif($step == "starterboysno" and $text != "🔝ورود به پنل مدیریت🔝" and $tc == 'private'){
  $datas["step"] = "none";
  $outjson = json_encode($datas,true);
  file_put_contents("data/$from_id/$from_id.json",$outjson);
  if($text == '0'){
    unlink("dokc6.txt");
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"دکمه لینک ربات با موفقیت حذف شد.",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
  }
  else{
    file_put_contents("dokc6.txt",$text);
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>" $text تنظیم شد.",
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$button_manage
]);
  }
}

elseif($data == "gozshe"){
    $chat_id = $update->callback_query->message->chat->id;
    $from_id = $update->callback_query->message->chat->id;
	if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
		$datas["step"] = "ozvsinzrtamr";
		$outjson = json_encode($datas,true);
		file_put_contents("data/$from_id/$from_id.json",$outjson);
		bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"دکمه گزارش را ارسال کنید
جهت حذف دکمه 0 را ارسال کنید.",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}
}

elseif($step == "ozvsinzrtamr" and $text != "🔝ورود به پنل مدیریت🔝" and $tc == 'private'){
	$datas["step"] = "none";
	$outjson = json_encode($datas,true);
	file_put_contents("data/$from_id/$from_id.json",$outjson);
	if($text == '0'){
		unlink("dokc5.txt");
		bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"دکمه گزارش  با موفقیت حذف شد.",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
	}
	else{
		file_put_contents("dokc5.txt",$text);
		bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>" $text تنظیم شد.",
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$button_manage
]);
	}
}
elseif($data == "zirsheb"){
    $chat_id = $update->callback_query->message->chat->id;
    $from_id = $update->callback_query->message->chat->id;
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "starttext67911";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"نام جدید دکمه  زیرمجموعه را ارسال نمایید

نام فعلی : $dok78",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}
}
elseif($step == "starttext67911" and $text != "🔝ورود به پنل مدیریت🔝" and $tc == 'private' and $tc == 'private'){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("data/dok78.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"با موفقیت تنظیم شد

نام جدید : $text",
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$button_manage
]); 
}
}
elseif($data == "admin14"){
    $chat_id = $update->callback_query->message->chat->id;
    $from_id = $update->callback_query->message->chat->id;
if ($chat_id == $admin) {
$datas["step"] = "adminman2";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"آیدی عددی ادمین جدید را ارسال نمایید:",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}
}
elseif($step == "adminman2" and $text != "🔝ورود به پنل مدیریت🔝" and $tc == 'private' and $tc == 'private'){ 
if ($chat_id == $admin) {
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("data/admin2.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"با موفقیت تنظیم شد

ادمین جدید : $text",
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$button_manage
]); 
}
}
elseif($data == "admin13"){
    $chat_id = $update->callback_query->message->chat->id;
    $from_id = $update->callback_query->message->chat->id;
if ($chat_id == $admin) {
$datas["step"] = "adminman3";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"آیدی عددی ادمین جدید را ارسال نمایید:",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}
}
elseif($step == "adminman3" and $text != "🔝ورود به پنل مدیریت🔝" and $tc == 'private' and $tc == 'private'){ 
if ($chat_id == $admin) {
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("data/admin3.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"با موفقیت تنظیم شد

ادمین جدید : $text",
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$button_manage
]); 
}
}
elseif($data == "admin15"){
    $chat_id = $update->callback_query->message->chat->id;
    $from_id = $update->callback_query->message->chat->id;
if ($chat_id == $admin) {
$datas["step"] = "adminman5";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"آیدی عددی ادمین جدید را ارسال نمایید:",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}
}
elseif($step == "adminman5" and $text != "🔝ورود به پنل مدیریت🔝" and $tc == 'private' and $tc == 'private'){ 
if ($chat_id == $admin) {
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("data/admin5.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"با موفقیت تنظیم شد

ادمین جدید : $text",
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$button_manage
]); 
}
}
elseif($data == "admin16"){
    $chat_id = $update->callback_query->message->chat->id;
    $from_id = $update->callback_query->message->chat->id;
if ($chat_id == $admin) {
$datas["step"] = "adminman6";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"آیدی عددی ادمین جدید را ارسال نمایید:",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}
}
elseif($step == "adminman6" and $text != "🔝ورود به پنل مدیریت🔝" and $tc == 'private' and $tc == 'private'){ 
if ($chat_id == $admin) {
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("data/admin6.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"با موفقیت تنظیم شد

ادمین جدید : $text",
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$button_manage
]); 
}
}
elseif($data == "rahshe"){
    $chat_id = $update->callback_query->message->chat->id;
    $from_id = $update->callback_query->message->chat->id;
  if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
    $datas["step"] = "fuckmrsinzam";
    $outjson = json_encode($datas,true);
    file_put_contents("data/$from_id/$from_id.json",$outjson);
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"دکمه راهنما را ارسال کنید
جهت حذف دکمه 0 را ارسال کنید.",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}
}
elseif($step == "fuckmrsinzam" and $text != "🔝ورود به پنل مدیریت🔝" and $tc == 'private'){
  $datas["step"] = "none";
  $outjson = json_encode($datas,true);
  file_put_contents("data/$from_id/$from_id.json",$outjson);
  if($text == '0'){
    unlink("dok8.txt");
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"دکمه راهنما با موفقیت حذف شد.",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}
else{
    file_put_contents("dok8.txt",$text);
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>" $text تنظیم شد.",
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$button_manage
]);
}
}
elseif($data == "zirshe"){
    $chat_id = $update->callback_query->message->chat->id;
    $from_id = $update->callback_query->message->chat->id;
  if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
    $datas["step"] = "starttext668098";
    $outjson = json_encode($datas,true);
    file_put_contents("data/$from_id/$from_id.json",$outjson);
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"دکمه زیرمجموعه گیری را ارسال کنید
جهت حذف دکمه 0 را ارسال کنید.",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}
}
elseif($step == "starttext668098" and $text != "🔝ورود به پنل مدیریت🔝" and $tc == 'private'){
  $datas["step"] = "none";
  $outjson = json_encode($datas,true);
  file_put_contents("data/$from_id/$from_id.json",$outjson);
  if($text == '0'){
    unlink("dok6.txt");
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"دکمه زیرمجموعه گیری با موفقیت حذف شد.",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}
else
{
    file_put_contents("dok6.txt",$text);
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>" $text تنظیم شد.",
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$button_manage
]);
}
}
elseif($data == "forshe"){
$chat_id = $update->callback_query->message->chat->id;
$from_id = $update->callback_query->message->chat->id;
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "starttext661";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"دکمه فروشگاه  را ارسال کنید
جهت حذف دکمه 0 را ارسال کنید.",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}
}
elseif($step == "starttext661" and $text != "🔝ورود به پنل مدیریت🔝" and $tc == 'private'){
  $datas["step"] = "none";
  $outjson = json_encode($datas,true);
  file_put_contents("data/$from_id/$from_id.json",$outjson);
  if($text == '0'){
    unlink("dok5.txt");
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"دکمه فروشگاه با موفقیت حذف شد.",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}
else
{
file_put_contents("dok5.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>" $text تنظیم شد.",
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$button_manage
]);
}
}
elseif($data == "poshshe"){
$chat_id = $update->callback_query->message->chat->id;
$from_id = $update->callback_query->message->chat->id;
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "mrsinzado";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"دکمه پشتیبانی را ارسال کنید
جهت حذف دکمه 0 را ارسال کنید.",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}
}
elseif($step == "mrsinzado" and $text != "🔝ورود به پنل مدیریت🔝" and $tc == 'private'){
$datas["step"] = "none";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
if($text == '0'){
unlink("dok44.txt");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"دکمه پشتیبانی با موفقیت حذف شد.",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}
else
{
file_put_contents("dok44.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>" $text تنظیم شد.",
'parse_mode'=>'MarkDown',
'reply_markup'=>$button_manage
]);
}
}
elseif($data == "pigsef"){
$chat_id = $update->callback_query->message->chat->id;
$from_id = $update->callback_query->message->chat->id;
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "mrsinzado547";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"دکمه پیگیری را ارسال کنید
جهت حذف دکمه 0 را ارسال کنید.",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}
}
elseif($step == "mrsinzado547" and $text != "🔝ورود به پنل مدیریت🔝" and $tc == 'private'){
$datas["step"] = "none";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
if($text == '0'){
unlink("dok547.txt");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"دکمه پیگیری با موفقیت حذف شد.",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}
else
{
file_put_contents("dok547.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>" $text تنظیم شد.",
'parse_mode'=>'MarkDown',
'reply_markup'=>$button_manage
]);
}
}
elseif($data == "takmiloz"){
$chat_id = $update->callback_query->message->chat->id;
$from_id = $update->callback_query->message->chat->id;
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "mrsinzado278";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"دکمه سفارش بازدید جدید را ارسال کنید
جهت حذف دکمه 0 را ارسال کنید.",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}
}
elseif($step == "mrsinzado278" and $text != "🔝ورود به پنل مدیریت🔝" and $tc == 'private'){
$datas["step"] = "none";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
if($text == '0'){
unlink("dok278.txt");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"دکمه سفارش بازدید جدید با موفقیت حذف شد.",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}
else
{
file_put_contents("dok278.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>" $text تنظیم شد.",
'parse_mode'=>'MarkDown',
'reply_markup'=>$button_manage
]);
}
}
elseif($text == "لاین1️⃣" and $tc == 'private'){
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "line11by";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"$textlines",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}
}
elseif($step == "line11by" and $text != "🔝ورود به پنل مدیریت🔝" and $tc == 'private'){
$datas["step"] = "none";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
if($text == '0'){
unlink("line11.txt");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"دکمه لاین1️⃣ با موفقیت حذف شد.",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}
else{
file_put_contents("line11.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>" $text تنظیم شد.",
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$button_manage
]);
}
}
elseif($text == "لاین2️⃣" and $tc == 'private'){
  if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
    $datas["step"] = "line12by";
    $outjson = json_encode($datas,true);
    file_put_contents("data/$from_id/$from_id.json",$outjson);
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"$textlines",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}
}
elseif($step == "line12by" and $text != "🔝ورود به پنل مدیریت🔝" and $tc == 'private'){
  $datas["step"] = "none";
  $outjson = json_encode($datas,true);
  file_put_contents("data/$from_id/$from_id.json",$outjson);
  if($text == '0'){
    unlink("line12.txt");
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"دکمه لاین2️⃣ با موفقیت حذف شد.",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}
else
{
file_put_contents("line12.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>" $text تنظیم شد.",
'parse_mode'=>'MarkDown',
'reply_markup'=>$button_manage
]);
}
}
elseif($text == "لاین3️⃣️" and $tc == 'private'){
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
    $datas["step"] = "line13by";
    $outjson = json_encode($datas,true);
    file_put_contents("data/$from_id/$from_id.json",$outjson);
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"$textlines",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
  }
}
elseif($step == "line13by" and $text != "🔝ورود به پنل مدیریت🔝" and $tc == 'private'){
  $datas["step"] = "none";
  $outjson = json_encode($datas,true);
  file_put_contents("data/$from_id/$from_id.json",$outjson);
  if($text == '0'){
    unlink("line13.txt");
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"دکمه لاین3️⃣ با موفقیت حذف شد.",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
  }
  else{
    file_put_contents("line13.txt",$text);
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>" $text تنظیم شد.",
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$button_manage
]);
  }
}
elseif($text == "♠️لاین1" and $tc == 'private'){
  if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
    $datas["step"] = "line21by";
    $outjson = json_encode($datas,true);
    file_put_contents("data/$from_id/$from_id.json",$outjson);
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"$textlines",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
  }
}
elseif($step == "line21by" and $text != "🔝ورود به پنل مدیریت🔝" and $tc == 'private'){
$datas["step"] = "none";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
if($text == '0'){
unlink("line21.txt");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"دکمه ♠️لاین1 با موفقیت حذف شد.",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}
else
{
file_put_contents("line21.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>" $text تنظیم شد.",
'parse_mode'=>'MarkDown',
'reply_markup'=>$button_manage
]);
}
}
elseif($text == "♥️لاین2" and $tc == 'private'){
 if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "line22by";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"$textlines",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}
}
elseif($step == "line22by" and $text != "🔝ورود به پنل مدیریت🔝" and $tc == 'private'){
$datas["step"] = "none";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
if($text == '0'){
unlink("line22.txt");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"دکمه ♥️لاین2 با موفقیت حذف شد.",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
  }
  else{
    file_put_contents("line22.txt",$text);
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>" $text تنظیم شد.",
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$button_manage
]);
  }
}
elseif($text == "♣️لاین3" and $tc == 'private'){
  if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
    $datas["step"] = "line23by";
    $outjson = json_encode($datas,true);
    file_put_contents("data/$from_id/$from_id.json",$outjson);
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"$textlines",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
  }
}
elseif($step == "line23by" and $text != "🔝ورود به پنل مدیریت🔝" and $tc == 'private'){
  $datas["step"] = "none";
  $outjson = json_encode($datas,true);
  file_put_contents("data/$from_id/$from_id.json",$outjson);
  if($text == '0'){
    unlink("line23.txt");
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"دکمه ♣️لاین3 با موفقیت حذف شد.",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
  }
  else{
    file_put_contents("line23.txt",$text);
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>" $text تنظیم شد.",
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$button_manage
]);
  }
}
elseif($text == "♦️لاین4" and $tc == 'private'){
  if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
    $datas["step"] = "line24by";
    $outjson = json_encode($datas,true);
    file_put_contents("data/$from_id/$from_id.json",$outjson);
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"$textlines",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
  }
}
elseif($step == "line24by" and $text != "🔝ورود به پنل مدیریت🔝" and $tc == 'private'){
  $datas["step"] = "none";
  $outjson = json_encode($datas,true);
  file_put_contents("data/$from_id/$from_id.json",$outjson);
  if($text == '0'){
    unlink("line24.txt");
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"دکمه ♦️لاین4 با موفقیت حذف شد.",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
  }
  else{
    file_put_contents("line24.txt",$text);
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>" $text تنظیم شد.",
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$button_manage
]);
  }
}
elseif($text == "🟦لاین1" and $tc == 'private'){
  if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
    $datas["step"] = "line31by";
    $outjson = json_encode($datas,true);
    file_put_contents("data/$from_id/$from_id.json",$outjson);
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"$textlines",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
  }
}
elseif($step == "line31by" and $text != "🔝ورود به پنل مدیریت🔝" and $tc == 'private'){
  $datas["step"] = "none";
  $outjson = json_encode($datas,true);
  file_put_contents("data/$from_id/$from_id.json",$outjson);
  if($text == '0'){
    unlink("line31.txt");
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"دکمه 🟦لاین1 با موفقیت حذف شد.",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
  }
  else{
    file_put_contents("line31.txt",$text);
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>" $text تنظیم شد.",
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$button_manage
]);
  }
}

elseif($text == "⬛️لاین2" and $tc == 'private'){
  if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
    $datas["step"] = "line32by";
    $outjson = json_encode($datas,true);
    file_put_contents("data/$from_id/$from_id.json",$outjson);
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"$textlines",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
  }
}
elseif($step == "line32by" and $text != "🔝ورود به پنل مدیریت🔝" and $tc == 'private'){
  $datas["step"] = "none";
  $outjson = json_encode($datas,true);
  file_put_contents("data/$from_id/$from_id.json",$outjson);
  if($text == '0'){
    unlink("line32.txt");
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"دکمه ⬛️لاین2 با موفقیت حذف شد.",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
  }
  else{
    file_put_contents("line32.txt",$text);
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>" $text تنظیم شد.",
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$button_manage
]);
  }
}
elseif($text == "🟥لاین3" and $tc == 'private'){
  if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
    $datas["step"] = "line33by";
    $outjson = json_encode($datas,true);
    file_put_contents("data/$from_id/$from_id.json",$outjson);
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"$textlines",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
  }
}
elseif($step == "line33by" and $text != "🔝ورود به پنل مدیریت🔝" and $tc == 'private'){
  $datas["step"] = "none";
  $outjson = json_encode($datas,true);
  file_put_contents("data/$from_id/$from_id.json",$outjson);
  if($text == '0'){
    unlink("line33.txt");
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"دکمه 🟥لاین3 با موفقیت حذف شد.",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
  }
  else{
    file_put_contents("line33.txt",$text);
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>" $text تنظیم شد.",
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$button_manage
]);
  }
}
elseif($text == "⬜️لاین4" and $tc == 'private'){
  if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
    $datas["step"] = "line34by";
    $outjson = json_encode($datas,true);
    file_put_contents("data/$from_id/$from_id.json",$outjson);
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"$textlines",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
  }
}
elseif($step == "line34by" and $text != "🔝ورود به پنل مدیریت🔝" and $tc == 'private'){
  $datas["step"] = "none";
  $outjson = json_encode($datas,true);
  file_put_contents("data/$from_id/$from_id.json",$outjson);
  if($text == '0'){
    unlink("line34.txt");
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"دکمه ⬜️لاین4 با موفقیت حذف شد.",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
  }
  else{
    file_put_contents("line34.txt",$text);
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>" $text تنظیم شد.",
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$button_manage
]);
  }
}
elseif($text == "💎لاین1" and $tc == 'private'){
  if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
    $datas["step"] = "line41by";
    $outjson = json_encode($datas,true);
    file_put_contents("data/$from_id/$from_id.json",$outjson);
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"$textlines",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
  }
}
elseif($step == "line41by" and $text != "🔝ورود به پنل مدیریت🔝" and $tc == 'private'){
  $datas["step"] = "none";
  $outjson = json_encode($datas,true);
  file_put_contents("data/$from_id/$from_id.json",$outjson);
  if($text == '0'){
    unlink("line41.txt");
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"دکمه 💎لاین1 با موفقیت حذف شد.",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
  }
  else{
    file_put_contents("line41.txt",$text);
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>" $text تنظیم شد.",
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$button_manage
]);
  }
}
elseif($text == "💰لاین2" and $tc == 'private'){
  if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
    $datas["step"] = "line42by";
    $outjson = json_encode($datas,true);
    file_put_contents("data/$from_id/$from_id.json",$outjson);
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"$textlines",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
  }
}
elseif($step == "line42by" and $text != "🔝ورود به پنل مدیریت🔝" and $tc == 'private'){
  $datas["step"] = "none";
  $outjson = json_encode($datas,true);
  file_put_contents("data/$from_id/$from_id.json",$outjson);
  if($text == '0'){
    unlink("line42.txt");
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"دکمه 💰لاین2 با موفقیت حذف شد.",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
  }
  else{
    file_put_contents("line42.txt",$text);
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>" $text تنظیم شد.",
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$button_manage
]);
  }
}


elseif($text == "💳لاین3" and $tc == 'private'){
  if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
    $datas["step"] = "line43by";
    $outjson = json_encode($datas,true);
    file_put_contents("data/$from_id/$from_id.json",$outjson);
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"$textlines",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
  }
}
elseif($step == "line43by" and $text != "🔝ورود به پنل مدیریت🔝" and $tc == 'private'){
  $datas["step"] = "none";
  $outjson = json_encode($datas,true);
  file_put_contents("data/$from_id/$from_id.json",$outjson);
  if($text == '0'){
    unlink("line43.txt");
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"دکمه 💳لاین3 با موفقیت حذف شد.",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
  }
  else{
    file_put_contents("line43.txt",$text);
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>" $text تنظیم شد.",
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$button_manage
]);
  }
}
elseif($text == "💸لاین4" and $tc == 'private'){
  if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
    $datas["step"] = "line44by";
    $outjson = json_encode($datas,true);
    file_put_contents("data/$from_id/$from_id.json",$outjson);
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"$textlines",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
  }
}
elseif($step == "line44by" and $text != "🔝ورود به پنل مدیریت🔝" and $tc == 'private'){
  $datas["step"] = "none";
  $outjson = json_encode($datas,true);
  file_put_contents("data/$from_id/$from_id.json",$outjson);
  if($text == '0'){
    unlink("line44.txt");
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"دکمه 💸لاین4 با موفقیت حذف شد.",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
  }
  else{
    file_put_contents("line44.txt",$text);
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>" $text تنظیم شد.",
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$button_manage
]);
  }
}
elseif($text == "🎈لاین1" and $tc == 'private'){
  if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
    $datas["step"] = "line51by";
    $outjson = json_encode($datas,true);
    file_put_contents("data/$from_id/$from_id.json",$outjson);
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"$textlines",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
  }
}
elseif($step == "line51by" and $text != "🔝ورود به پنل مدیریت🔝" and $tc == 'private'){
  $datas["step"] = "none";
  $outjson = json_encode($datas,true);
  file_put_contents("data/$from_id/$from_id.json",$outjson);
  if($text == '0'){
    unlink("line51.txt");
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"دکمه 🎈لاین1 با موفقیت حذف شد.",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
  }
  else{
    file_put_contents("line51.txt",$text);
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>" $text تنظیم شد.",
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$button_manage
]);
  }
}
elseif($text == "🎊لاین2" and $tc == 'private'){
  if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
    $datas["step"] = "line52by";
    $outjson = json_encode($datas,true);
    file_put_contents("data/$from_id/$from_id.json",$outjson);
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"$textlines",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
  }
}
elseif($step == "line52by" and $text != "🔝ورود به پنل مدیریت🔝" and $tc == 'private'){
  $datas["step"] = "none";
  $outjson = json_encode($datas,true);
  file_put_contents("data/$from_id/$from_id.json",$outjson);
  if($text == '0'){
    unlink("line52.txt");
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"دکمه 🎊لاین2 با موفقیت حذف شد.",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
  }
  else{
    file_put_contents("line52.txt",$text);
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>" $text تنظیم شد.",
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$button_manage
]);
  }
}
elseif($text == "🎁لاین3" and $tc == 'private'){
  if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
    $datas["step"] = "line53by";
    $outjson = json_encode($datas,true);
    file_put_contents("data/$from_id/$from_id.json",$outjson);
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"$textlines",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
  }
}
elseif($step == "line53by" and $text != "🔝ورود به پنل مدیریت🔝" and $tc == 'private'){
  $datas["step"] = "none";
  $outjson = json_encode($datas,true);
  file_put_contents("data/$from_id/$from_id.json",$outjson);
  if($text == '0'){
    unlink("line53.txt");
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"دکمه 🎁لاین3 با موفقیت حذف شد.",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
  }
  else{
    file_put_contents("line53.txt",$text);
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>" $text تنظیم شد.",
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$button_manage
]);
  }
}
elseif($text == "🎉لاین4" and $tc == 'private'){
  if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
    $datas["step"] = "line54by";
    $outjson = json_encode($datas,true);
    file_put_contents("data/$from_id/$from_id.json",$outjson);
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"$textlines",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
  }
}
elseif($step == "line54by" and $text != "🔝ورود به پنل مدیریت🔝" and $tc == 'private'){
  $datas["step"] = "none";
  $outjson = json_encode($datas,true);
  file_put_contents("data/$from_id/$from_id.json",$outjson);
  if($text == '0'){
    unlink("line54.txt");
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"دکمه 🎉لاین4 با موفقیت حذف شد.",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
  }
  else{
    file_put_contents("line54.txt",$text);
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>" $text تنظیم شد.",
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$button_manage
]);
  }
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
elseif($text == "⚡️لاین1" and $tc == 'private'){
  if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
    $datas["step"] = "line61by";
    $outjson = json_encode($datas,true);
    file_put_contents("data/$from_id/$from_id.json",$outjson);
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"$textlines",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
  }
}
elseif($step == "line61by" and $text != "🔝ورود به پنل مدیریت🔝" and $tc == 'private'){
  $datas["step"] = "none";
  $outjson = json_encode($datas,true);
  file_put_contents("data/$from_id/$from_id.json",$outjson);
  if($text == '0'){
    unlink("line61.txt");
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"دکمه ⚡️لاین1 با موفقیت حذف شد.",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
  }
  else{
    file_put_contents("line61.txt",$text);
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>" $text تنظیم شد.",
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$button_manage
]);
  }
}
elseif($text == "✨لاین2" and $tc == 'private'){
  if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
    $datas["step"] = "line62by";
    $outjson = json_encode($datas,true);
    file_put_contents("data/$from_id/$from_id.json",$outjson);
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"$textlines",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
  }
}
elseif($step == "line62by" and $text != "🔝ورود به پنل مدیریت🔝" and $tc == 'private'){
  $datas["step"] = "none";
  $outjson = json_encode($datas,true);
  file_put_contents("data/$from_id/$from_id.json",$outjson);
  if($text == '0'){
    unlink("line62.txt");
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"دکمه ✨لاین2 با موفقیت حذف شد.",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
  }
  else{
    file_put_contents("line62.txt",$text);
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>" $text تنظیم شد.",
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$button_manage
]);
  }
}
elseif($text == "🌟لاین3" and $tc == 'private'){
  if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
    $datas["step"] = "line63by";
    $outjson = json_encode($datas,true);
    file_put_contents("data/$from_id/$from_id.json",$outjson);
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"$textlines",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
  }
}
elseif($step == "line63by" and $text != "🔝ورود به پنل مدیریت🔝" and $tc == 'private'){
  $datas["step"] = "none";
  $outjson = json_encode($datas,true);
  file_put_contents("data/$from_id/$from_id.json",$outjson);
  if($text == '0'){
    unlink("line63.txt");
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"دکمه🌟لاین3 با موفقیت حذف شد.",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
  }
  else{
    file_put_contents("line63.txt",$text);
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>" $text تنظیم شد.",
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$button_manage
]);
  }
}
elseif($text == "⭐️لاین4" and $tc == 'private'){
  if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
    $datas["step"] = "line64by";
    $outjson = json_encode($datas,true);
    file_put_contents("data/$from_id/$from_id.json",$outjson);
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"$textlines",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
  }
}
elseif($step == "line64by" and $text != "🔝ورود به پنل مدیریت🔝" and $tc == 'private'){
  $datas["step"] = "none";
  $outjson = json_encode($datas,true);
  file_put_contents("data/$from_id/$from_id.json",$outjson);
  if($text == '0'){
    unlink("line64.txt");
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"دکمه⭐️لاین4 با موفقیت حذف شد.",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
  }
  else{
    file_put_contents("line64.txt",$text);
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>" $text تنظیم شد.",
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$button_manage
]);
  }
}
elseif($data == "roshsef"){
    $chat_id = $update->callback_query->message->chat->id;
    $from_id = $update->callback_query->message->chat->id;
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
if($viewbot != "on"){
file_put_contents("viewbot.txt","on");
        bot('sendmessage', [
                'chat_id' =>$chat_id,
                'text' =>"ثبت سفارش روشن شد",
        'reply_to_message_id' => $message_id,
               'parse_mode'=>'html',
  ]);
}else{
        bot('sendmessage', [
                'chat_id' =>$chat_id,
                'text' =>"ربات از قبل روشن بود...",
        'reply_to_message_id' => $message_id,
               'parse_mode'=>'html',
  ]);
}}}
elseif($data == "khamsef"){
    $chat_id = $update->callback_query->message->chat->id;
    $from_id = $update->callback_query->message->chat->id;
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
if($viewbot != "off"){
file_put_contents("viewbot.txt","off");
        bot('sendmessage', [
                'chat_id' =>$chat_id,
                'text' =>"ثبت سفارش غیر فعال شد",
        'reply_to_message_id' => $message_id,
               'parse_mode'=>'html',
  ]);
}else{
        bot('sendmessage', [
                'chat_id' =>$chat_id,
                'text' =>"ربات از قبل خاموش بود...",
        'reply_to_message_id' => $message_id,
               'parse_mode'=>'html',
  ]);
}}}
elseif($data == "roshent"){
    $chat_id = $update->callback_query->message->chat->id;
    $from_id = $update->callback_query->message->chat->id;
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
if($bankboton != "on"){
file_put_contents("bankboton.txt","on");
        bot('sendmessage', [
                'chat_id' =>$chat_id,
                'text' =>"بخش انتقال روشن شد",
        'reply_to_message_id' => $message_id,
               'parse_mode'=>'html',
  ]);
}else{
        bot('sendmessage', [
                'chat_id' =>$chat_id,
                'text' =>"ربات از قبل روشن بود...",
        'reply_to_message_id' => $message_id,
               'parse_mode'=>'html',
  ]);
}}}
elseif($data == "khament"){
    $chat_id = $update->callback_query->message->chat->id;
    $from_id = $update->callback_query->message->chat->id;
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
if($bankboton != "off"){
file_put_contents("bankboton.txt","off");
        bot('sendmessage', [
                'chat_id' =>$chat_id,
                'text' =>"بخش انتقال غیر فعال شد",
        'reply_to_message_id' => $message_id,
               'parse_mode'=>'html',
  ]);
}else{
        bot('sendmessage', [
                'chat_id' =>$chat_id,
                'text' =>"ربات از قبل خاموش بود...",
        'reply_to_message_id' => $message_id,
               'parse_mode'=>'html',
  ]);
}}}
elseif($data == "roshbotur"){
    $chat_id = $update->callback_query->message->chat->id;
    $from_id = $update->callback_query->message->chat->id;
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
if($staroff != "on"){
file_put_contents("staroff.txt","on");
        bot('sendmessage', [
                'chat_id' =>$chat_id,
                'text' =>"بخش فعالیت ربات روشن شد",
        'reply_to_message_id' => $message_id,
               'parse_mode'=>'html',
  ]);
}else{
        bot('sendmessage', [
                'chat_id' =>$chat_id,
                'text' =>"ربات از قبل روشن بود...",
        'reply_to_message_id' => $message_id,
               'parse_mode'=>'html',
  ]);
}}}
elseif($data == "khambotur"){
    $chat_id = $update->callback_query->message->chat->id;
    $from_id = $update->callback_query->message->chat->id;
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
if($staroff != "off"){
file_put_contents("staroff.txt","off");
        bot('sendmessage', [
                'chat_id' =>$chat_id,
                'text' =>"بخش فعالیت ربات غیر فعال شد",
        'reply_to_message_id' => $message_id,
               'parse_mode'=>'html',
  ]);
}else{
        bot('sendmessage', [
                'chat_id' =>$chat_id,
                'text' =>"ربات از قبل خاموش بود...",
        'reply_to_message_id' => $message_id,
               'parse_mode'=>'html',
  ]);
}}}
elseif($data == "sefshe"){
    $chat_id = $update->callback_query->message->chat->id;
    $from_id = $update->callback_query->message->chat->id;
	if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
		$datas["step"] = "starttext66836";
		$outjson = json_encode($datas,true);
		file_put_contents("data/$from_id/$from_id.json",$outjson);
		bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"دکمه سفارش بازدید را ارسال کنید
جهت حذف دکمه 0 را ارسال کنید.",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
	}
}
elseif($step == "starttext66836" and $text != "🔝ورود به پنل مدیریت🔝" and $tc == 'private'){
	$datas["step"] = "none";
	$outjson = json_encode($datas,true);
	file_put_contents("data/$from_id/$from_id.json",$outjson);
	if($text == '0'){
		unlink("dok4.txt");
		bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"دکمه سفارش با موفقیت حذف شد.",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
	}
	else{
		file_put_contents("dok4.txt",$text);
		bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>" $text تنظیم شد.",
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$button_manage
]);
	}
}
elseif($data == "ghavshe"){
    $chat_id = $update->callback_query->message->chat->id;
    $from_id = $update->callback_query->message->chat->id;
	if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
		$datas["step"] = "starttext668";
		$outjson = json_encode($datas,true);
		file_put_contents("data/$from_id/$from_id.json",$outjson);
		bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"دکمه قوانین را ارسال کنید
جهت حذف دکمه 0 را ارسال کنید.",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
	}
}
elseif($step == "starttext668" and $text != "🔝ورود به پنل مدیریت🔝" and $tc == 'private'){
	$datas["step"] = "none";
	$outjson = json_encode($datas,true);
	file_put_contents("data/$from_id/$from_id.json",$outjson);
	if($text == '0'){
		unlink("dok3.txt");
		bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"دکمه قوانین با موفقیت حذف شد.",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
	}
	else{
		file_put_contents("dok3.txt",$text);
		bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>" $text تنظیم شد.",
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$button_manage
]);
	}
}
elseif($data == "darshe"){
    $chat_id = $update->callback_query->message->chat->id;
    $from_id = $update->callback_query->message->chat->id;
	if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
		$datas["step"] = "startmrsinza";
		$outjson = json_encode($datas,true);
		file_put_contents("data/$from_id/$from_id.json",$outjson);
		bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"دکمه دریافت $almasbot را ارسال کنید
جهت حذف دکمه 0 را ارسال کنید.",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
	}
}
elseif($step == "startmrsinza" and $text != "🔝ورود به پنل مدیریت🔝" and $tc == 'private'){
	$datas["step"] = "none";
	$outjson = json_encode($datas,true);
	file_put_contents("data/$from_id/$from_id.json",$outjson);
	if($text == '0'){
		unlink("dokc2.txt");
		bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"دکمه دریافت $almasbot با موفقیت حذف شد.",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
	}
	else{
		file_put_contents("dokc2.txt",$text);
		bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>" $text تنظیم شد.",
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$button_manage
]);
	}
}
elseif($data == "heska"){
    $chat_id = $update->callback_query->message->chat->id;
    $from_id = $update->callback_query->message->chat->id;
	if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
		$datas["step"] = "starttext669245";
		$outjson = json_encode($datas,true);
		file_put_contents("data/$from_id/$from_id.json",$outjson);
		bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"دکمه حساب کاربری را ارسال کنید
جهت حذف دکمه 0 را ارسال کنید.",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
	}
}
elseif($step == "starttext669245" and $text != "🔝ورود به پنل مدیریت🔝" and $tc == 'private'){
	$datas["step"] = "none";
	$outjson = json_encode($datas,true);
	file_put_contents("data/$from_id/$from_id.json",$outjson);
	if($text == '0'){
		unlink("dok2.txt");
		bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"دکمه حساب کاربری با موفقیت حذف شد.",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
	}
	else{
		file_put_contents("dok2.txt",$text);
		bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>" $text تنظیم شد.",
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$button_manage
]);
	}
}
elseif($data == "codeshe"){
    $chat_id = $update->callback_query->message->chat->id;
    $from_id = $update->callback_query->message->chat->id;
  if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
    $datas["step"] = "mrsinza1";
    $outjson = json_encode($datas,true);
    file_put_contents("data/$from_id/$from_id.json",$outjson);
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"دکمه کد هدیه را ارسال کنید
جهت حذف دکمه 0 را ارسال کنید.",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
  }
}
elseif($step == "mrsinza1" and $text != "🔝ورود به پنل مدیریت🔝" and $tc == 'private'){
  $datas["step"] = "none";
  $outjson = json_encode($datas,true);
  file_put_contents("data/$from_id/$from_id.json",$outjson);
  if($text == '0'){
    unlink("dok12.txt");
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"دکمه کد هدیه با موفقیت حذف شد.",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
  }
  else{
    file_put_contents("dok12.txt",$text);
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>" $text تنظیم شد.",
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$button_manage
]);
  }
}
elseif($data == "enshe"){
    $chat_id = $update->callback_query->message->chat->id;
    $from_id = $update->callback_query->message->chat->id;
  if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
    $datas["step"] = "mrsinza12";
    $outjson = json_encode($datas,true);
    file_put_contents("data/$from_id/$from_id.json",$outjson);
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"دکمه انتقال $almasbot را ارسال کنید
جهت حذف دکمه 0 را ارسال کنید.",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
  }
}
elseif($step == "mrsinza12" and $text != "🔝ورود به پنل مدیریت🔝" and $tc == 'private'){
  $datas["step"] = "none";
  $outjson = json_encode($datas,true);
  file_put_contents("data/$from_id/$from_id.json",$outjson);
  if($text == '0'){
    unlink("dok13.txt");
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"دکمه انتقال $almasbot با موفقیت حذف شد.",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
  }
  else{
    file_put_contents("dok13.txt",$text);
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>" $text تنظیم شد.",
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$button_manage
]);
  }
}
elseif($data == "chatabli"){
    $chat_id = $update->callback_query->message->chat->id;
    $from_id = $update->callback_query->message->chat->id;
  if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
    $datas["step"] = "mrsinzacht";
    $outjson = json_encode($datas,true);
    file_put_contents("data/$from_id/$from_id.json",$outjson);
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"ایدی کانال تبلیغات را بدون @ ارسال نمایید درصورت حذف هم عدد 0 را ارسال نمایید",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
  }
}
elseif($step == "mrsinzacht" and $text != "🔝ورود به پنل مدیریت🔝" and $tc == 'private'){
  $datas["step"] = "none";
  $outjson = json_encode($datas,true);
  file_put_contents("data/$from_id/$from_id.json",$outjson);
  if($text == '0'){
    unlink("cht.txt");
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"چنل تبلیغات حذف شد.",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
  }
  else{
    file_put_contents("cht.txt",$text);
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>" @$text تنظیم شد.",
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$button_manage
]);
  }
}
elseif($data == "mtalmt"){
    $chat_id = $update->callback_query->message->chat->id;
    $from_id = $update->callback_query->message->chat->id;
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "starttext117chann";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"متن جمع آوری در کانال را ارسال کنید
به جای نام NAME
به جای یوزرنیم @USER
و به جای نام خانوادگی LAST
و به جای آیدی عددی ID

را در متن قرار دهید تا جایگزین شود!",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($step == "starttext117chann" and $text != "🔝ورود به پنل مدیریت🔝" and $tc == 'private' and $tc == 'private'){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("data/dokchannel2.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"تنظیم شد!",
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$button_manage
]); 
}}
elseif($data == "poravali"){
    $chat_id = $update->callback_query->message->chat->id;
    $from_id = $update->callback_query->message->chat->id;
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "starttextjoi1";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"تعداد $almasbot  در صورت ورود به ربات را با حروف انگلیسی وارد نمایید
میزان فعلی : $joinmcoin",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($step == "starttextjoi1" and $text != "🔝ورود به پنل مدیریت🔝" and $tc == 'private' and $tc == 'private'){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("data/joinmcoin.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"با موفقیت ثبت شد

میزان جدید : $text",
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$button_manage
]); 
}}
elseif($data == "mtesmt"){
    $chat_id = $update->callback_query->message->chat->id;
    $from_id = $update->callback_query->message->chat->id;
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "starttext";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"متن استارت را ارسال کنید
به جای نام NAME
به جای یوزرنیم @USER
و به جای نام خانوادگی LAST
و به جای آیدی عددی ID

را در متن قرار دهید تا جایگزین شود!",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($step == "starttext" and $text != "🔝ورود به پنل مدیریت🔝" and $tc == 'private' and $tc == 'private'){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("data/starttext.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"تنظیم شد!",
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$button_manage
]); 
}}
elseif($data == "ozvte1"){
    $chat_id = $update->callback_query->message->chat->id;
    $from_id = $update->callback_query->message->chat->id;
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "psefatesh1";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"میزان بازدید  پلان اول را ارسال نمایید

میزان فعلی : $mmbrsabt1",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($step == "psefatesh1" and $text != "🔝ورود به پنل مدیریت🔝" and $tc == 'private' and $tc == 'private'){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("data/mmbrsabt1.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"با موفقیت ثبت شد

میزان جدید : $text",
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$button_manage
]); 
}}
elseif($data == "almasni1"){
$chat_id = $update->callback_query->message->chat->id;
    $from_id = $update->callback_query->message->chat->id;
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "psefatesh11";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"میزان $almasbot لازم برای سفارش بازدید پلان 1 را ارسال نمایید

میزان فعلی : $mmbrsabt11",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($step == "psefatesh11" and $text != "🔝ورود به پنل مدیریت🔝" and $tc == 'private' and $tc == 'private'){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("data/mmbrsabt11.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"با موفقیت ثبت شد

میزان جدید : $text",
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$button_manage
]); 
}}
elseif($text == "نام محصول اول" and $tc == 'private'){	
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "mshopnam1";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"نام جدید محصول اول فروشگاه را ارسال نمایید

نام فعلی : $mshopname1",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($step == "mshopnam1" and $text != "🔝ورود به پنل مدیریت🔝" and $tc == 'private' and $tc == 'private'){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("data/mshopname1.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"با موفقیت ثبت شد

نام جدید : $text",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"نام محصول دوم"],['text'=>"نام محصول اول"]],
[['text'=>"نام محصول چهارم"],['text'=>"نام محصول سوم"]],
[['text'=>"نام محصول ششم"],['text'=>"نام محصول پنجم"]],
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($text == "نام محصول دوم" and $tc == 'private'){	
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "mshopnam2";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"نام جدید محصول دوم فروشگاه را ارسال نمایید

نام فعلی : $mshopname2",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($step == "mshopnam2" and $text != "🔝ورود به پنل مدیریت🔝" and $tc == 'private' and $tc == 'private'){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("data/mshopname2.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"با موفقیت ثبت شد

نام جدید : $text",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"نام محصول دوم"],['text'=>"نام محصول اول"]],
[['text'=>"نام محصول چهارم"],['text'=>"نام محصول سوم"]],
[['text'=>"نام محصول ششم"],['text'=>"نام محصول پنجم"]],
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($text == "نام محصول سوم" and $tc == 'private'){	
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "mshopnam3";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"نام جدید محصول سوم فروشگاه را ارسال نمایید

نام فعلی : $mshopname3",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($step == "mshopnam3" and $text != "🔝ورود به پنل مدیریت🔝" and $tc == 'private' and $tc == 'private'){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("data/mshopname3.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"با موفقیت ثبت شد

نام جدید : $text",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"نام محصول دوم"],['text'=>"نام محصول اول"]],
[['text'=>"نام محصول چهارم"],['text'=>"نام محصول سوم"]],
[['text'=>"نام محصول ششم"],['text'=>"نام محصول پنجم"]],
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($text == "نام محصول چهارم" and $tc == 'private'){	
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "mshopnam4";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"نام جدید محصول چهارم فروشگاه را ارسال نمایید

نام فعلی : $mshopname4",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($step == "mshopnam4" and $text != "🔝ورود به پنل مدیریت🔝" and $tc == 'private' and $tc == 'private'){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("data/mshopname4.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"با موفقیت ثبت شد

نام جدید : $text",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"نام محصول دوم"],['text'=>"نام محصول اول"]],
[['text'=>"نام محصول چهارم"],['text'=>"نام محصول سوم"]],
[['text'=>"نام محصول ششم"],['text'=>"نام محصول پنجم"]],
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($text == "نام محصول پنجم" and $tc == 'private'){	
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "mshopnam5";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"نام جدید محصول پنجم فروشگاه را ارسال نمایید

نام فعلی : $mshopname5",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($step == "mshopnam5" and $text != "🔝ورود به پنل مدیریت🔝" and $tc == 'private' and $tc == 'private'){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("data/mshopname5.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"با موفقیت ثبت شد

نام جدید : $text",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"نام محصول دوم"],['text'=>"نام محصول اول"]],
[['text'=>"نام محصول چهارم"],['text'=>"نام محصول سوم"]],
[['text'=>"نام محصول ششم"],['text'=>"نام محصول پنجم"]],
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($text == "نام محصول ششم" and $tc == 'private'){	
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "mshopnam6";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"نام جدید محصول ششم فروشگاه را ارسال نمایید

نام فعلی : $mshopname6",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($step == "mshopnam6" and $text != "🔝ورود به پنل مدیریت🔝" and $tc == 'private' and $tc == 'private'){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("data/mshopname6.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"با موفقیت ثبت شد

نام جدید : $text",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"نام محصول دوم"],['text'=>"نام محصول اول"]],
[['text'=>"نام محصول چهارم"],['text'=>"نام محصول سوم"]],
[['text'=>"نام محصول ششم"],['text'=>"نام محصول پنجم"]],
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($data == "chaetela"){
    $chat_id = $update->callback_query->message->chat->id;
    $from_id = $update->callback_query->message->chat->id;
	if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
		$datas["step"] = "getchannel";
		$outjson = json_encode($datas,true);
		file_put_contents("data/$from_id/$from_id.json",$outjson);
		bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"جهت تنظیم کانال اطلاع رسانی به قوانین زیر توجه کنید :
1️⃣ابتدا ربات را ادمین کنید.
2️⃣سپس آیدی کانال را به همراه @ ارسال کنید .
3️⃣پس از تنظیم حتماً متن جوین اجباری را تنظیم کنید تا اختلالی در ربات به وجود نیاد.
4️⃣در صورتی که میخواهید قفل را از روی این چنل بردارید عدد 0 را ارسال کنید.",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
	}
}
elseif($step == "getchannel" and $text != "🔝ورود به پنل مدیریت🔝" and $tc == 'private'){
	$datas["step"] = "none";
	$outjson = json_encode($datas,true);
	file_put_contents("data/$from_id/$from_id.json",$outjson);
	if($text == '0'){
		unlink("channel.txt");
		bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"قفل کانال با موفقیت حذف شد.",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
	}
	else{
		file_put_contents("channel.txt",$text);
		bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"قفل کانال روی کانال $text تنظیم شد.",
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$button_manage
]);
	}
}
elseif($data == "chacodehed"){
    $chat_id = $update->callback_query->message->chat->id;
    $from_id = $update->callback_query->message->chat->id;
	if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
		$datas["step"] = "xcode";
		$outjson = json_encode($datas,true);
		file_put_contents("data/$from_id/$from_id.json",$outjson);
		bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"جهت تنظیم کانال کد هدیه به قوانین زیر توجه کنید :
1️⃣ابتدا ربات را ادمین کنید.
2️⃣سپس آیدی کانال را به همراه @ ارسال کنید .
3️⃣پس از تنظیم حتماً متن جوین اجباری را تنظیم کنید تا اختلالی در ربات به وجود نیاد.
4️⃣در صورتی که میخواهید قفل را از روی این چنل بردارید عدد 0 را ارسال کنید.",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
	}
}
elseif($step == "xcode" and $text != "🔝ورود به پنل مدیریت🔝" and $tc == 'private'){
	$datas["step"] = "none";
	$outjson = json_encode($datas,true);
	file_put_contents("data/$from_id/$from_id.json",$outjson);
	if($text == '0'){
		unlink("channelcode.txt");
		bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"قفل کانال با موفقیت حذف شد.",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
	}
	else{
		file_put_contents("channelcode.txt",$text);
		bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"کانال کد هدیه ( $text ) تنظیم شد .

لطفا ربات را ادمین کانال ( $text ) کنید .
لطفاً متن جوین اجباری را تنظیم کنید .",
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$button_manage
]);
	}
}
elseif($data == "unblockinfo"){
    $chat_id = $update->callback_query->message->chat->id;
    $from_id = $update->callback_query->message->chat->id;
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "getid";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"آیدی عددی فرد را ارسال کنید!",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
if($step == "getid" and $text != "🔝ورود به پنل مدیریت🔝" and $tc == 'private'){
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
if(file_exists("data/$text/$text.json")){
$datas["step"] = "sendwarn";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("data/id.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"راهنما ❗️

شما میتوانید به فرد اخطار دهید و سپس آن را بلاک کنید ❗️
➖➖➖➖➖➖➖➖➖➖➖➖➖
1 اخطار = هشدار❗️
2 اخطار = هشدار❗️
3 اخطار = بلاک از ربات❗️
➖➖➖➖➖➖➖➖➖➖➖➖➖
در صورتی که قصد دارید کاربر مورد نظر بلاک شود عدد 3 را ارسال کنید ❗️",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"همچین کاربری در ربات وجود ندارد
آیدی عددی درست ارسال کنید!",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($step == "sendwarn" and $text != "🔝ورود به پنل مدیریت🔝" and $tc == 'private' and $tc == 'private'){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {

$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
$id = file_get_contents("data/id.txt");
$datas = json_decode(file_get_contents("data/$id/$id.json"),true);
$inv = $datas["warn"];
$newin = $inv + $text;
$datas["warn"] = "$newin";
$outjson = json_encode($datas,true);
file_put_contents("data/$id/$id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$id,
'text'=>"💢از طرف مدیریت به شما *$text* اخطار داده شد!",
'parse_mode'=>"MarkDown",
]); 
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"*$text* اخطار به *$id* داده شد",
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$button_manage
]); 
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"لطفا عدد ارسال کنید!",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($data == "ehalmasi"){
    $chat_id = $update->callback_query->message->chat->id;
    $from_id = $update->callback_query->message->chat->id;
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "getid2";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"آیدی عددی فرد را ارسال کنید!",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
if($step == "getid2" and $text != "🔝ورود به پنل مدیریت🔝" and $tc == 'private' and $tc == 'private'){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
if(file_exists("data/$text/$text.json")){
$datas["step"] = "sendcoin2";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("data/id.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"چند $almasbot به کاربر داده شود؟!",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"همچین کاربری در ربات وجود ندارد
آیدی عددی درست ارسال کنید!",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($step == "sendcoin2" and $text != "🔝ورود به پنل مدیریت🔝" and $tc == 'private'){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
$id = file_get_contents("data/id.txt");
$datas = json_decode(file_get_contents("data/$id/$id.json"),true);
$inv = $datas["coin"];
$newin = $inv + $text;
$datas["coin"] = "$newin";
$outjson = json_encode($datas,true);
file_put_contents("data/$id/$id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$id,
'text'=>"از طرف مدیریت به شما *$text* $almasbot داده شد!",
'parse_mode'=>"MarkDown",
]); 
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"*$text* $almasbot به *$id* ارسال گردید",
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$button_manage
]); 
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"لطفا عدد ارسال کنید!",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($text == "🎁ساخت کد هدیه" and $tc == 'private'){	
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "getid2gg";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"کد هدیه جدید را ارسال کنید : 

⚠️توجه داشته باشید که کانال کد هدیه را تنظیم کرده باشید⚠️",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
elseif($step == "getid2gg" and $text != "🔝ورود به پنل مدیریت🔝" and $tc == 'private'){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "sendcoin2gg";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("newgiftm.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"تعداد $almasbot این کد را ارسال کنید :",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($step == "sendcoin2gg" and $text != "🔝ورود به پنل مدیریت🔝" and $tc == 'private'){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
$newgiftm = file_get_contents("newgiftm.txt");
file_put_contents("data/codesx/$newgiftm.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"کد هدیه جدید ساخته شد ✅

کد مورد نظر  : *$newgiftm* 
تعداد $almasbot  : *$text*",
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$button_manage
]); 
bot('sendMessage', [
'chat_id' =>"$channelcode",
'text' => "
کد هدیه جدیدی ساخته شد✅
==========================================
🔢کد مورد نظر : $newgiftm
$almasboticonتعداد $almasbot : $text
========================================== 
هم اکنون وارد ربات شوید و با زدن کد برنده ( $text ) $almasbot شوید🤩
🤖 @[*[USERNAME]*]
",
]);
}}
elseif($data == "blockinfo"){
    $chat_id = $update->callback_query->message->chat->id;
    $from_id = $update->callback_query->message->chat->id;
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "getids";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"آیدی عددی فرد را ارسال کنید!",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
if($step == "getids" and $text != "🔝ورود به پنل مدیریت🔝" and $tc == 'private'){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
if(file_exists("data/$text/$text.json")){
$datas["step"] = "sendwarns";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("data/id.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"چند اخطار از کاربر کسر شود؟!",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"همچین کاربری در ربات وجود ندارد
آیدی عددی درست ارسال کنید!",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($step == "sendwarns" and $text != "🔝ورود به پنل مدیریت🔝" and $tc == 'private'){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
$id = file_get_contents("data/id.txt");
$datas = json_decode(file_get_contents("data/$id/$id.json"),true);
$inv = $datas["warn"];
$newin = $inv - $text;
$datas["warn"] = "$newin";
$outjson = json_encode($datas,true);
file_put_contents("data/$id/$id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$id,
'text'=>"☑️از طرف مدیریت از شما *$text* اخطار کسر گردید!",
'parse_mode'=>"MarkDown",
]); 
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"*$text* اخطار از *$id* کسر گردید",
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$button_manage
]); 
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"لطفا عدد ارسال کنید!",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($data == "ksralmasi"){
    $chat_id = $update->callback_query->message->chat->id;
    $from_id = $update->callback_query->message->chat->id;
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "getids2";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"آیدی عددی فرد را ارسال کنید!",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
if($step == "getids2" and $text != "🔝ورود به پنل مدیریت🔝" and $tc == 'private'){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
if(file_exists("data/$text/$text.json")){
$datas["step"] = "sendcoins2";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("data/id.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"چند $almasbot از کاربر کسر شود؟!",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"همچین کاربری در ربات وجود ندارد
آیدی عددی درست ارسال کنید!",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($step == "sendcoins2" and $text != "🔝ورود به پنل مدیریت🔝" and $tc == 'private'){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
$id = file_get_contents("data/id.txt");
$datas = json_decode(file_get_contents("data/$id/$id.json"),true);
$inv = $datas["coin"];
$newin = $inv - $text;
$datas["coin"] = "$newin";
$outjson = json_encode($datas,true);
file_put_contents("data/$id/$id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$id,
'text'=>"از طرف مدیریت از شما *$text* $almasbot کسر گردید!",
'parse_mode'=>"MarkDown",
]); 
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"*$text* $almasbot از *$id* کسر گردید",
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$button_manage
]); 
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"لطفا عدد ارسال کنید!",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($text == "/javab" and $tc == 'private'){	
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "getid20001";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"لطفاً کد پاسخگویی را ارسال کنید :",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($step == "getid20001" and $text != "🔝ورود به پنل مدیریت🔝" and $tc == 'private'){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
if(file_exists("data/$text/$text.json")){
$datas["step"] = "sendcoin20001";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("data/id.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"پاسخ را ارسال کنید :",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"چنین کاربری به پشتیبانی پیغامی ارسال نکرده است!!",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}}
elseif($step == "sendcoin20001" and $text != "🔝ورود به پنل مدیریت🔝" and $tc == 'private'){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
$id = file_get_contents("data/id.txt");
$datas = json_decode(file_get_contents("data/$id/$id.json"),true);
$inv = $datas["coin"];
$newin = $inv + $text;
$datas["coin"] = "$newin";
$outjson = json_encode($datas,true);
file_put_contents("data/$id/$id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$id,
'text'=>"شما یک پیغام از پشتیبانی دارید ✅
➖➖➖➖➖➖➖➖➖➖➖➖➖➖➖
پاسخ سوال شما : 
$text

➖➖➖➖➖➖➖➖➖➖➖➖➖➖➖",
'parse_mode'=>"MarkDown",
]); 
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"پاسخ شما با موفقیت به کد پاسخگویی ( $id ) ارسال شد ✅

پاسخ شما به پیغام ( $id )👇🏻

$text",
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$button_manage
]); 
}}
elseif($data == "pmkar"){
    $chat_id = $update->callback_query->message->chat->id;
    $from_id = $update->callback_query->message->chat->id;
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "getid2000";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"آیدی عددی دریافت کننده ی پیام را ارسال نمایید",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($step == "getid2000" and $text != "🔝ورود به پنل مدیریت🔝" and $tc == 'private'){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
if(file_exists("data/$text/$text.json")){
$datas["step"] = "sendcoin2000";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("data/id.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"متن ارسالی به کاربر مورد نظر را ارسال نمایید",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"همچین کاربری در ربات وجود ندارد
آیدی عددی درست ارسال کنید!",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}}
elseif($step == "sendcoin2000" and $text != "🔝ورود به پنل مدیریت🔝" and $tc == 'private'){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
$id = file_get_contents("data/id.txt");
$datas = json_decode(file_get_contents("data/$id/$id.json"),true);
$inv = $datas["coin"];
$newin = $inv + $text;
$datas["coin"] = "$newin";
$outjson = json_encode($datas,true);
file_put_contents("data/$id/$id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$id,
'text'=>"💢یک پیام از طرف مدیریت دریافت کرده اید
----------------------
$text",
'parse_mode'=>"MarkDown",
]); 
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"با موفقیت به $id ارسال گردید

متن پیام
------------------------
$text",
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$button_manage
]); 
}}
elseif($data == "ozvname1"){
$chat_id = $update->callback_query->message->chat->id;
    $from_id = $update->callback_query->message->chat->id;
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "ozvname";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"لطفاً نام بخش سفارش پلن 1 را ارسال کنید 🙏🏻

نمونه = سفارش 25 بازدید👤
",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($step == "ozvname" and $text != "🔝ورود به پنل مدیریت🔝" and $tc == 'private'){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("data/ozvname.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"تنظیم شد!",
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$button_manage
]); 
}}
elseif($data == "mtramt"){
    $chat_id = $update->callback_query->message->chat->id;
    $from_id = $update->callback_query->message->chat->id;
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "mtdok8";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>" متن دکمه $dok8 را ارسال کنید :
",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($step == "mtdok8" and $text != "🔝ورود به پنل مدیریت🔝" and $tc == 'private'){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("data/mtdok8.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"تنظیم شد!",
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$button_manage
]); 
}}
elseif($data == "mthemt"){
    $chat_id = $update->callback_query->message->chat->id;
    $from_id = $update->callback_query->message->chat->id;
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "dok2a";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"شما الان میتونید متن حساب کاربری رو ادیت بزنید,به بزرگ بودن یا نبودن کلمات حتما دقت کنید.
➖➖➖➖➖➖
اسم کاربر👈 NAME
فامیل کاربر👈 LAST
یوزرنیم کاربر 👈 USER
نمایش تاریخ 👈 TARIKH
تعداد زیرمجموعه 👈 INV
تعداد سفارشات 👈 SEF
آیدی عددی کاربر 👈 ID
موجودی کاربر  👈 GEM
➖➖➖➖➖➖
جهت انصراف از تنظیم از دکمه ذیل استفاده نمایید ✅
",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($step == "dok2a" and $text != "🔝ورود به پنل مدیریت🔝" and $tc == 'private'){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("data/dok2a.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"تنظیم شد!",
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$button_manage
]); 
}}
elseif($data == "mtjomt"){
    $chat_id = $update->callback_query->message->chat->id;
    $from_id = $update->callback_query->message->chat->id;
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "vipjoin";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"متن جوین اجباری را ارسال کنید :

توجه⚠️
آیدی کانال های شما در متن جوین به طور خودکار ثبت نخواهد شد !

لطفاً آیدی کانال های خود را هم در متن بنویسید!",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($step == "vipjoin" and $text != "🔝ورود به پنل مدیریت🔝" and $tc == 'private'){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("data/vipjoin.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"تنظیم شد!",
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$button_manage
]); 
}}
elseif($data == "mtzirrtxt"){
    $chat_id = $update->callback_query->message->chat->id;
    $from_id = $update->callback_query->message->chat->id;
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "vipjointxt";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"👤تنظیم متن زیر مجموعه

✅متن زیر مجموعه خود را ارسال نمایید.",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($step == "vipjointxt" and $text != "🔝ورود به پنل مدیریت🔝" and $tc == 'private'){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("data/zirmatntext.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"تنظیم شد!",
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$button_manage
]); 
}}
elseif($data == "mtghmt"){
    $chat_id = $update->callback_query->message->chat->id;
    $from_id = $update->callback_query->message->chat->id;
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "zirtext21";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"⭕️متن قوانین را ارسال کنید :",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($step == "zirtext21" and $text != "🔝ورود به پنل مدیریت🔝" and $tc == 'private'){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("data/ghavanin.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"تنظیم شد!",
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$button_manage
]); 
}}
elseif($data == "backbut"){
    $chat_id = $update->callback_query->message->chat->id;
    $from_id = $update->callback_query->message->chat->id;
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "sinzback";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"⭕دکمه برگشت  را ارسال کنید :",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($step == "sinzback" and $text != "🔝ورود به پنل مدیریت🔝" and $tc == 'private'){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("data/backsinza.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"تنظیم شد!",
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$button_manage
]); 
}}
elseif($text == "💸ارز ربات" and $tc == 'private'){	
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$alluser = file_get_contents("data/ozvs.txt");
$alaki = explode("\n",$alluser);
$allusers = count($alaki);
$done = file_get_contents("data/done.txt");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
💸ارز ربات

✅نام ارز: اسم ارز ربات شما
♣️نام ایکون ارز:استیکری که برای ارز میزارید.

💎جهت تنظیم بر روی دکمه شیشه ای کلیک نمایید💎
",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
    [['text'=>"💰تنظیم ارز ربات💰️",'callback_data'=> 'sinzbrofuck']],
    [['text'=>"$almasbot", 'callback_data'=> 'namearz'],['text'=>"✅نام ارز️",'callback_data'=> 'sinzbrofuck']],
    [['text'=>"$almasboticon", 'callback_data'=> 'iconarz'],['text'=>"♣️ایکون ارز️",'callback_data'=> 'sinzbrosuck']],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($data == "namearz"){
    $chat_id = $update->callback_query->message->chat->id;
    $from_id = $update->callback_query->message->chat->id;
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "almasbotis";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"⭕️واحد موجودی ربات را ارسال کنید :",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($step == "almasbotis" and $text != "🔝ورود به پنل مدیریت🔝" and $tc == 'private'){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("data/almasbot.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"تنظیم شد!",
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$button_manage
]); 
}}
elseif($data == "iconarz"){
    $chat_id = $update->callback_query->message->chat->id;
    $from_id = $update->callback_query->message->chat->id;
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "almasbotisicon";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"⭕️واحد موجودی ربات را ارسال کنید :",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($step == "almasbotisicon" and $text != "🔝ورود به پنل مدیریت🔝" and $tc == 'private'){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("data/almasboticon.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"تنظیم شد!",
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$button_manage
]); 
}}
elseif($data == "mtpomt"){
    $chat_id = $update->callback_query->message->chat->id;
    $from_id = $update->callback_query->message->chat->id;
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "zirtext2134";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"⭕️متن پشتیبانی را ارسال کنید :",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($step == "zirtext2134" and $text != "🔝ورود به پنل مدیریت🔝" and $tc == 'private'){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("data/mtposhtiban.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"تنظیم شد!",
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$button_manage
]); 
}}
elseif($data == "mtpimt"){
    $chat_id = $update->callback_query->message->chat->id;
    $from_id = $update->callback_query->message->chat->id;
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "zirtext2134piposh";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"⭕️متن پیغام دریافت شده پشتیبانی را ارسال کنید :",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($step == "zirtext2134piposh" and $text != "🔝ورود به پنل مدیریت🔝" and $tc == 'private'){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("data/piposh.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"تنظیم شد!",
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$button_manage
]); 
}}
elseif($data == "mtcomt"){
    $chat_id = $update->callback_query->message->chat->id;
    $from_id = $update->callback_query->message->chat->id;
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "zirtext2134189";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"⭕️متن کد هدیه را ارسال کنید :",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($step == "zirtext2134189" and $text != "🔝ورود به پنل مدیریت🔝" and $tc == 'private'){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("data/codebazi.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"تنظیم شد!",
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$button_manage
]); 
}}
elseif($data == "matent"){
    $chat_id = $update->callback_query->message->chat->id;
    $from_id = $update->callback_query->message->chat->id;
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "zirtext213456";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"⭕️متن انتقال را ارسال کنید :",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($step == "zirtext213456" and $text != "🔝ورود به پنل مدیریت🔝" and $tc == 'private'){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("data/bankno.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"تنظیم شد!",
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$button_manage
]); 
}}
elseif($data == "matkham"){
    $chat_id = $update->callback_query->message->chat->id;
    $from_id = $update->callback_query->message->chat->id;
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "zirtext21345626";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"⭕️متن خاموشی سفارش را ارسال کنید :",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($step == "zirtext21345626" and $text != "🔝ورود به پنل مدیریت🔝" and $tc == 'private'){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("data/sefoff.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"تنظیم شد!",
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$button_manage
]); 
}}
elseif($data == "mtkhambotur"){
    $chat_id = $update->callback_query->message->chat->id;
    $from_id = $update->callback_query->message->chat->id;
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "zirtext21345626796";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"⭕️متن خاموشی ربات را ارسال کنید :",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($step == "zirtext21345626796" and $text != "🔝ورود به پنل مدیریت🔝" and $tc == 'private'){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("data/botsta.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"تنظیم شد!",
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$button_manage
]); 
}}
elseif($data == "matkha"){
    $chat_id = $update->callback_query->message->chat->id;
    $from_id = $update->callback_query->message->chat->id;
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "banktextoffno";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"⭕️متن خاموشی انتقال را ارسال کنید :",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($step == "banktextoffno" and $text != "🔝ورود به پنل مدیریت🔝" and $tc == 'private'){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("data/botbankoff.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"تنظیم شد!",
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$button_manage
]); 
}}
elseif($data == "mtsefmt"){
    $chat_id = $update->callback_query->message->chat->id;
    $from_id = $update->callback_query->message->chat->id;	
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "zirtext225";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"⭕️متن سفارش را ارسال کنید :",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($step == "zirtext225" and $text != "🔝ورود به پنل مدیریت🔝" and $tc == 'private'){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("data/sef.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"تنظیم شد!",
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$button_manage
]); 
}}
elseif($data == "mtidmt"){
    $chat_id = $update->callback_query->message->chat->id;
    $from_id = $update->callback_query->message->chat->id;
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "zirtext22532";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"⭕️متن ایدی گیری برای سفارش را ارسال کنید :",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($step == "zirtext22532" and $text != "🔝ورود به پنل مدیریت🔝" and $tc == 'private'){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("data/sabt.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"تنظیم شد!",
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$button_manage
]); 
}}
elseif($text == "فروشگاه پلن 6" and $tc == 'private'){	
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "shopf6";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"قیمت پلن ششم را ارسال کنید :",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($step == "shopf6" and $text != "🔝ورود به پنل مدیریت🔝" and $tc == 'private'){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("data/shopf6.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"تنظیم شد!",
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$button_manage
]); 
}}
elseif($text == "فروشگاه پلن 5" and $tc == 'private'){	
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "shopf5";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"قیمت پلن پنجم را ارسال کنید :",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
elseif($step == "shopf5" and $text != "🔝ورود به پنل مدیریت🔝" and $tc == 'private'){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("data/shopf5.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"تنظیم شد!",
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$button_manage
]); 
}}
elseif($text == "فروشگاه پلن 4" and $tc == 'private'){	
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "shopf4";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"قیمت پلن چهارم را ارسال کنید :",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($step == "shopf4" and $text != "🔝ورود به پنل مدیریت🔝" and $tc == 'private'){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("data/shopf4.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"تنظیم شد!",
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$button_manage
]); 
}}
elseif($text == "فروشگاه پلن 3" and $tc == 'private'){	
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "shopf3";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"قیمت پلن سوم را ارسال کنید :",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($step == "shopf3" and $text != "🔝ورود به پنل مدیریت🔝" and $tc == 'private'){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("data/shopf3.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"تنظیم شد!",
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$button_manage
]); 
}}
elseif($text == "فروشگاه پلن 2" and $tc == 'private'){	
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "shopf2";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"قیمت پلن دوم را ارسال کنید :",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($step == "shopf2" and $text != "🔝ورود به پنل مدیریت🔝" and $tc == 'private'){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("data/shopf2.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"تنظیم شد!",
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$button_manage
]); 
}}
elseif($text == "فروشگاه پلن 1" and $tc == 'private'){	
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "shopf1";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"قیمت پلن اول را ارسال کنید :",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($step == "shopf1" and $text != "🔝ورود به پنل مدیریت🔝" and $tc == 'private'){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("data/shopf1.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"تنظیم شد!",
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$button_manage
]); 
}}
elseif($data == "mtfomt"){
    $chat_id = $update->callback_query->message->chat->id;
    $from_id = $update->callback_query->message->chat->id;
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "zirtext2";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"متن فروشگاه را ارسال کنید

به جای نام NAME
و به جای نام خانوادگی LAST
و به جای آیدی عددی ID",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($step == "zirtext2" and $text != "🔝ورود به پنل مدیریت🔝" and $tc == 'private'){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("data/shoptext.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"تنظیم شد!",
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$button_manage
]); 
}}
elseif($text == "🔐تنظیم لینک درگاه" and $tc == 'private'){	
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "mshopnam7";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>" لطفا لینک جدید متصل به فروشگاه را به همراه https:// ارسال نمایید

لینک فعلی : [$mshoplink]",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($step == "mshopnam7" and $text != "🔝ورود به پنل مدیریت🔝" and $tc == 'private' and $tc == 'private'){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("data/mshoplink.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"با موفقیت ثبت شد

لینک جدید : [$text]",
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$button_manage
]); 
}}
elseif($data == "alzirtxt"){
    $chat_id = $update->callback_query->message->chat->id;
    $from_id = $update->callback_query->message->chat->id;
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "zirtext24";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"$almasbot زیرمجموعه گیری را وارد نمایید
مثال : 10",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($step == "zirtext24" and $text != "🔝ورود به پنل مدیریت🔝" and $tc == 'private'){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("data/invitecoin.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"تنظیم شد!",
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$button_manage
]); 
}}
elseif($data == "hadent"){
    $chat_id = $update->callback_query->message->chat->id;
    $from_id = $update->callback_query->message->chat->id;
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "zirtext24298856389";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"حداقل میزان انتقال را وارد نمایید
مثال : 10",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($step == "zirtext24298856389" and $text != "🔝ورود به پنل مدیریت🔝" and $tc == 'private'){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("data/bankriz.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"تنظیم شد!",
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$button_manage
]); 
}}
elseif($data == "hakent"){
    $chat_id = $update->callback_query->message->chat->id;
    $from_id = $update->callback_query->message->chat->id;
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "zirtext24298856";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"حداکثر میزان انتقال را وارد نمایید
مثال : 10",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($step == "zirtext24298856" and $text != "🔝ورود به پنل مدیریت🔝" and $tc == 'private'){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("data/bankbig.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"تنظیم شد!",
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$button_manage
]); 
}}
elseif($data == "mtzirtxt"){
    $chat_id = $update->callback_query->message->chat->id;
    $from_id = $update->callback_query->message->chat->id;
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "zirtext";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
متن بنر را ارسال کنید :

⚠️توجه⚠️
در آخر متن خود عبارت LINK را تایپ کنید تا لینک شما در زیر بنر قرار گیرد ✅
",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($step == "zirtext" and $text != "🔝ورود به پنل مدیریت🔝" and $tc == 'private'){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("data/zirtext.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"تنظیم شد!",
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$button_manage
]); 
}}
elseif($data == "pmhamg"){
    $chat_id = $update->callback_query->message->chat->id;
    $from_id = $update->callback_query->message->chat->id;
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "send2all";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"پیام خود رو بفرست",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}

elseif($step == "send2all" and $text != "🔝ورود به پنل مدیریت🔝" and $tc == 'private'){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
$all_member = fopen( "data/ozvs.txt", 'r');
while( !feof( $all_member)) {
$user = fgets( $all_member);
bot('sendMessage',[
'chat_id'=>$user,
'text'=>$text,
'parse_mode'=>"MarkDown",
]);
}
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"پیام به همه ارسال شد",
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$button_manage
]); 
}}
elseif($data == "forhamg"){
    $chat_id = $update->callback_query->message->chat->id;
    $from_id = $update->callback_query->message->chat->id;
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "f2all";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"پیام خودت رو فور بده اینجا",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}
    
}
elseif($text != "🔝ورود به پنل مدیریت🔝" and $step == "f2all" and $tc == 'private'){
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
$all_member = fopen( "data/ozvs.txt", 'r');
while( !feof( $all_member)) {
$user = fgets( $all_member);
bot('ForwardMessage',[
'chat_id'=>$user,
'from_chat_id'=>$chat_id,
'message_id'=>$message_id
]);
}    
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"فروارد همگانی به همه اعضای ربات فروارد شد",
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$button_manage
]);
}}
elseif($data == "hamersal"){
    $chat_id = $update->callback_query->message->chat->id;
    $from_id = $update->callback_query->message->chat->id;
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "sekhame";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"$almasboticonتعداد $almasbot را جهت اهدای همگانی ارسال کنید :",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}
}
elseif($text != "🔝ورود به پنل مدیریت🔝" and $step == "sekhame" and $tc == 'private'){
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "none";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"در حال فرستادن $text $almasbot برای همه اعضا",
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$button_manage
]); 
$all_member = file_get_contents("data/ozvs.txt");
$ex = explode("\n",$all_member);
$cplug = count($ex) - 2;
for($n=0; $n<=$cplug; $n++) {
$user = $ex[$n];
$gfgfgfgf = json_decode(file_get_contents("data/$user/$user.json"),true);
$inv = $gfgfgfgf["coin"];
$newin = $inv + $text;
$gfgfgfgf["coin"] = "$newin";
$fvdsfvdsfv = json_encode($gfgfgfgf,true);
file_put_contents("data/$user/$user.json",$fvdsfvdsfv);
bot('sendMessage',[
'chat_id'=>$user,
'text'=>"",
'parse_mode'=>"html"
]); 
}
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"تعداد $text $almasbot با موفقیت برای همه اعضا ارسال شد.

⚠️توجه⚠️

توسط ربات هیچ پیغامی برای کاربران ارسال نمیشود .
و اطلاع رسانی به کاربران بر عهده خود شماست ....
",
'parse_mode'=>"html"
]);
}
}

elseif($data == "hamksr"){
    $chat_id = $update->callback_query->message->chat->id;
    $from_id = $update->callback_query->message->chat->id;
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "sekhamenot";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"$almasboticonتعداد $almasbot را جهت کسر ارسال کنید :",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔝ورود به پنل مدیریت🔝"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}
}
elseif($text != "🔝ورود به پنل مدیریت🔝" and $step == "sekhamenot" and $tc == 'private'){
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "none";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"در حال کم شدن   $text $almasbot از همه اعضا",
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$button_manage
]); 
$all_member = file_get_contents("data/ozvs.txt");
$ex = explode("\n",$all_member);
$cplug = count($ex) - 2;
for($n=0; $n<=$cplug; $n++) {
$user = $ex[$n];
$gfgfgfgf = json_decode(file_get_contents("data/$user/$user.json"),true);
$inv = $gfgfgfgf["coin"];
$newin = $inv - $text;
$gfgfgfgf["coin"] = "$newin";
$fvdsfvdsfv = json_encode($gfgfgfgf,true);
file_put_contents("data/$user/$user.json",$fvdsfvdsfv);
bot('sendMessage',[
'chat_id'=>$user,
'text'=>"",
'parse_mode'=>"html"
]); 
}
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"مقدار $text از تمامی کاربران کسر شد❌

⚠️توجه توسط ربات هیچ پیغامی به کاربران ارسال نمیشود و اطلاع رسانی ان بر عهده شماست⚠️",
'parse_mode'=>"html"
]);
}
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
?>