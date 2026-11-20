<?php
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
ob_start('ob_gzhandler');
$ttti = time();
$day = (2505600 - (time() - filectime('Mahdy'))) / 60 / 60 / 24;
$day = round($day, 0);
error_reporting(0);
define('API_KEY','[*[TOKEN]*]');
date_default_timezone_set('Asia/Tehran');
$telegram_ip_ranges = [
['lower' => '149.154.160.0', 'upper' => '149.154.175.255'],
['lower' => '91.108.4.0',    'upper' => '91.108.7.255'],
];
$ip_dec = (float) sprintf("%u", ip2long($_SERVER['REMOTE_ADDR']));
$ok=false;
foreach ($telegram_ip_ranges as $telegram_ip_range) if (!$ok) {
$lower_dec = (float) sprintf("%u", ip2long($telegram_ip_range['lower']));
$upper_dec = (float) sprintf("%u", ip2long($telegram_ip_range['upper']));
if ($ip_dec >= $lower_dec and $ip_dec <= $upper_dec) $ok=true;
}
if (!$ok) die("sik");
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
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
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
$sudo = ['[*[ADMIN]*]','1100991740'];
$ADMIN = array("[*[ADMIN]*]","1100991740");
$admin = "[*[ADMIN]*]";
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
if(file_exists("bar1.txt")){
$bar1 = file_get_contents("bar1.txt");
}else{
$bar1 = "💣 بازی انفجار";
}
if(file_exists("ro1.txt")){
$ro1 = file_get_contents("ro1.txt");
}else{
$ro1 = "🎗 تنظیم نشده";
}
if(file_exists("ro2.txt")){
$ro2 = file_get_contents("ro2.txt");
}else{
$ro2 = "🔱 تنظیم نشده";
}
if(file_exists("ro3.txt")){
$ro3 = file_get_contents("ro3.txt");
}else{
$ro3 = "♻️ برداشت موجودی";
}
if(file_exists("bar2.txt")){
$bar2 = file_get_contents("bar2.txt");
}else{
$bar2 = "🔮 تشخیص عدد";
}
if(file_exists("bar3.txt")){
$bar3 = file_get_contents("bar3.txt");
}else{
$bar3 = "🔢 مونتی";
}
if(file_exists("bar4.txt")){
$bar4 = file_get_contents("bar4.txt");
}else{
$bar4 = "🃏 21";
}
if(file_exists("bar5.txt")){
$bar5 = file_get_contents("bar5.txt");
}else{
$bar5 = "🎱 رولت";
}
if(file_exists("bar6.txt")){
$bar6 = file_get_contents("bar6.txt");
}else{
$bar6 = "🤑 پوپ";
}
if(file_exists("dok2.txt")){
$dok2 = file_get_contents("dok2.txt");
}else{
$dok2 = "🔐 حساب کاربری";
}
if(file_exists("dok3.txt")){
$dok3 = file_get_contents("dok3.txt");
}else{
$dok3 = "🚫شارژ حساب";
}
if(file_exists("dok4.txt")){
$dok4 = file_get_contents("dok4.txt");
}else{
$dok4 = "💣 شروع شرطبندی";
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
if(file_exists("mrsinzaips.txt")){
$mrsinzaips = file_get_contents("mrsinzaips.txt");
}else{
$mrsinzaips = "➕ افزایش موجودی";
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
$dok13 = "↗️ انتقال";
}
if(file_exists("dok0.txt")){
$dok0 = file_get_contents("dok0.txt");
}else{
$dok0 = "🔍 پیگیری پشتیبانی ☎️";
}
if(file_exists("dok44.txt")){
$dok44 = file_get_contents("dok44.txt");
}else{
$dok44 = "👨🏻‍💻پشتیبانی";
}
if(file_exists("line11.txt") or file_exists("line12.txt") or file_exists("line13.txt") or file_exists("line14.txt") or file_exists("line21.txt") or file_exists("line22.txt") or file_exists("line23.txt") or file_exists("line24.txt")
 or file_exists("line32.txt") or file_exists("line32.txt") or file_exists("line33.txt") or file_exists("line34.txt") or file_exists("line41.txt")
  or file_exists("line42.txt") or file_exists("line43.txt") or file_exists("line44.txt") or file_exists("line51.txt") or file_exists("line52.txt")
   or file_exists("line53.txt") or file_exists("line54.txt") or file_exists("line61.txt") or file_exists("line62.txt") or file_exists("line63.txt") or file_exists("line64.txt")){
$line11 = file_get_contents("line11.txt");
$line11 = str_replace('DOK1',$dok1,$line11);
$line11 = str_replace('DOK2',$dok2,$line11);
$line11 = str_replace('DOK3',$dok3,$line11);
$line11 = str_replace('DOK4',$dok4,$line11);
$line11 = str_replace('DOK5',$kosnanat1234,$line11);
$line11 = str_replace('DOK6',$mrsinzaips,$line11);
$line11 = str_replace('DOKSA',$ro3,$line11);
$line11 = str_replace('DOK8',$dok8,$line11);
$line11 = str_replace('DOCK',$dok12,$line11);
$line11 = str_replace('DOKEN',$dok13,$line11);
$line11 = str_replace('DOK0',$dok0,$line11);
}else{
$line11 = "$dok4";
}
if(file_exists("line11.txt") or file_exists("line12.txt") or file_exists("line13.txt") or file_exists("line14.txt") or file_exists("line21.txt") or file_exists("line22.txt") or file_exists("line23.txt") or file_exists("line24.txt")
 or file_exists("line32.txt") or file_exists("line32.txt") or file_exists("line33.txt") or file_exists("line34.txt") or file_exists("line41.txt")
  or file_exists("line42.txt") or file_exists("line43.txt") or file_exists("line44.txt") or file_exists("line51.txt") or file_exists("line52.txt")
   or file_exists("line53.txt") or file_exists("line54.txt") or file_exists("line61.txt") or file_exists("line62.txt") or file_exists("line63.txt") or file_exists("line64.txt")){
$line12 = file_get_contents("line12.txt");
$line12 = str_replace('DOK1',$dok1,$line12);
$line12 = str_replace('DOK2',$dok2,$line12);
$line12 = str_replace('DOK3',$dok3,$line12);
$line12 = str_replace('DOK4',$dok4,$line12);
$line12 = str_replace('DOK5',$kosnanat1234,$line12);
$line12 = str_replace('DOK6',$mrsinzaips,$line12);
$line12 = str_replace('DOKSA',$ro3,$line12);
$line12 = str_replace('DOK8',$dok8,$line12);
$line12 = str_replace('DOCK',$dok12,$line12);
$line12 = str_replace('DOKEN',$dok13,$line12);
$line12 = str_replace('DOK0',$dok0,$line12);
}else{
$line12 = "";
}
if(file_exists("line11.txt") or file_exists("line12.txt") or file_exists("line13.txt") or file_exists("line14.txt") or file_exists("line21.txt") or file_exists("line22.txt") or file_exists("line23.txt") or file_exists("line24.txt")
 or file_exists("line32.txt") or file_exists("line32.txt") or file_exists("line33.txt") or file_exists("line34.txt") or file_exists("line41.txt")
  or file_exists("line42.txt") or file_exists("line43.txt") or file_exists("line44.txt") or file_exists("line51.txt") or file_exists("line52.txt")
   or file_exists("line53.txt") or file_exists("line54.txt") or file_exists("line61.txt") or file_exists("line62.txt") or file_exists("line63.txt") or file_exists("line64.txt")){
$line13 = file_get_contents("line13.txt");
$line13 = str_replace('DOK1',$dok1,$line13);
$line13 = str_replace('DOK2',$dok2,$line13);
$line13 = str_replace('DOK3',$dok3,$line13);
$line13 = str_replace('DOK4',$dok4,$line13);
$line13 = str_replace('DOK5',$kosnanat1234,$line13);
$line13 = str_replace('DOK6',$mrsinzaips,$line13);
$line13 = str_replace('DOKSA',$ro3,$line13);
$line13 = str_replace('DOK8',$dok8,$line13);
$line13 = str_replace('DOCK',$dok12,$line13);
$line13 = str_replace('DOKEN',$dok13,$line13);
$line13 = str_replace('DOK0',$dok0,$line13);
}else{
$line13 = "";
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
if(file_exists("line11.txt") or file_exists("line12.txt") or file_exists("line13.txt") or file_exists("line14.txt") or file_exists("line21.txt") or file_exists("line22.txt") or file_exists("line23.txt") or file_exists("line24.txt")
 or file_exists("line32.txt") or file_exists("line32.txt") or file_exists("line33.txt") or file_exists("line34.txt") or file_exists("line41.txt")
  or file_exists("line42.txt") or file_exists("line43.txt") or file_exists("line44.txt") or file_exists("line51.txt") or file_exists("line52.txt")
   or file_exists("line53.txt") or file_exists("line54.txt") or file_exists("line61.txt") or file_exists("line62.txt") or file_exists("line63.txt") or file_exists("line64.txt")){
$line14 = file_get_contents("line14.txt");
$line14 = str_replace('DOK1',$dok1,$line14);
$line14 = str_replace('DOK2',$dok2,$line14);
$line14 = str_replace('DOK3',$dok3,$line14);
$line14 = str_replace('DOK4',$dok4,$line14);
$line14 = str_replace('DOK5',$kosnanat1234,$line14);
$line14 = str_replace('DOK6',$mrsinzaips,$line14);
$line14 = str_replace('DOKSA',$ro3,$line14);
$line14 = str_replace('DOK8',$dok8,$line14);
$line14 = str_replace('DOCK',$dok12,$line14);
$line14 = str_replace('DOKEN',$dok13,$line14);
$line14 = str_replace('DOK0',$dok0,$line14);
}else{
$line14 = "";
}
if(file_exists("line11.txt") or file_exists("line12.txt") or file_exists("line13.txt") or file_exists("line14.txt") or file_exists("line21.txt") or file_exists("line22.txt") or file_exists("line23.txt") or file_exists("line24.txt")
 or file_exists("line32.txt") or file_exists("line32.txt") or file_exists("line33.txt") or file_exists("line34.txt") or file_exists("line41.txt")
  or file_exists("line42.txt") or file_exists("line43.txt") or file_exists("line44.txt") or file_exists("line51.txt") or file_exists("line52.txt")
   or file_exists("line53.txt") or file_exists("line54.txt") or file_exists("line61.txt") or file_exists("line62.txt") or file_exists("line63.txt") or file_exists("line64.txt")){
$line21 = file_get_contents("line21.txt");
$line21 = str_replace('DOK1',$dok1,$line21);
$line21 = str_replace('DOK2',$dok2,$line21);
$line21 = str_replace('DOK3',$dok3,$line21);
$line21 = str_replace('DOK4',$dok4,$line21);
$line21 = str_replace('DOK5',$kosnanat1234,$line21);
$line21 = str_replace('DOK6',$mrsinzaips,$line21);
$line21 = str_replace('DOKSA',$ro3,$line21);
$line21 = str_replace('DOK8',$dok8,$line21);
$line21 = str_replace('DOCK',$dok12,$line21);
$line21 = str_replace('DOKEN',$dok13,$line21);
$line21 = str_replace('DOK0',$dok0,$line21);
}else{
$line21 = "$dok13";
}
if(file_exists("line11.txt") or file_exists("line12.txt") or file_exists("line13.txt") or file_exists("line14.txt") or file_exists("line21.txt") or file_exists("line22.txt") or file_exists("line23.txt") or file_exists("line24.txt")
 or file_exists("line32.txt") or file_exists("line32.txt") or file_exists("line33.txt") or file_exists("line34.txt") or file_exists("line41.txt")
  or file_exists("line42.txt") or file_exists("line43.txt") or file_exists("line44.txt") or file_exists("line51.txt") or file_exists("line52.txt")
   or file_exists("line53.txt") or file_exists("line54.txt") or file_exists("line61.txt") or file_exists("line62.txt") or file_exists("line63.txt") or file_exists("line64.txt")){
$line22 = file_get_contents("line22.txt");
$line22 = str_replace('DOK1',$dok1,$line22);
$line22 = str_replace('DOK2',$dok2,$line22);
$line22 = str_replace('DOK3',$dok3,$line22);
$line22 = str_replace('DOK4',$dok4,$line22);
$line22 = str_replace('DOK5',$kosnanat1234,$line22);
$line22 = str_replace('DOK6',$mrsinzaips,$line22);
$line22 = str_replace('DOKSA',$ro3,$line22);
$line22 = str_replace('DOK8',$dok8,$line22);
$line22 = str_replace('DOCK',$dok12,$line22);
$line22 = str_replace('DOKEN',$dok13,$line22);
$line22 = str_replace('DOK0',$dok0,$line22);
}else{
$line22 = "$dok2";
}
if(file_exists("line11.txt") or file_exists("line12.txt") or file_exists("line13.txt") or file_exists("line14.txt") or file_exists("line21.txt") or file_exists("line22.txt") or file_exists("line23.txt") or file_exists("line24.txt")
 or file_exists("line32.txt") or file_exists("line32.txt") or file_exists("line33.txt") or file_exists("line34.txt") or file_exists("line41.txt")
  or file_exists("line42.txt") or file_exists("line43.txt") or file_exists("line44.txt") or file_exists("line51.txt") or file_exists("line52.txt")
   or file_exists("line53.txt") or file_exists("line54.txt") or file_exists("line61.txt") or file_exists("line62.txt") or file_exists("line63.txt") or file_exists("line64.txt")){
$line23 = file_get_contents("line23.txt");
$line23 = str_replace('DOK1',$dok1,$line23);
$line23 = str_replace('DOK2',$dok2,$line23);
$line23 = str_replace('DOK3',$dok3,$line23);
$line23 = str_replace('DOK4',$dok4,$line23);
$line23 = str_replace('DOK5',$kosnanat1234,$line23);
$line23 = str_replace('DOK6',$mrsinzaips,$line23);
$line23 = str_replace('DOKSA',$ro3,$line23);
$line23 = str_replace('DOK8',$dok8,$line23);
$line23 = str_replace('DOCK',$dok12,$line23);
$line23 = str_replace('DOKEN',$dok13,$line23);
$line23 = str_replace('DOK0',$dok0,$line23);
}else{
$line23 = "";
}
if(file_exists("line11.txt") or file_exists("line12.txt") or file_exists("line13.txt") or file_exists("line14.txt") or file_exists("line21.txt") or file_exists("line22.txt") or file_exists("line23.txt") or file_exists("line24.txt")
 or file_exists("line32.txt") or file_exists("line32.txt") or file_exists("line33.txt") or file_exists("line34.txt") or file_exists("line41.txt")
  or file_exists("line42.txt") or file_exists("line43.txt") or file_exists("line44.txt") or file_exists("line51.txt") or file_exists("line52.txt")
   or file_exists("line53.txt") or file_exists("line54.txt") or file_exists("line61.txt") or file_exists("line62.txt") or file_exists("line63.txt") or file_exists("line64.txt")){
$line24 = file_get_contents("line24.txt");
$line24 = str_replace('DOK1',$dok1,$line24);
$line24 = str_replace('DOK2',$dok2,$line24);
$line24 = str_replace('DOK3',$dok3,$line24);
$line24 = str_replace('DOK4',$dok4,$line24);
$line24 = str_replace('DOK5',$kosnanat1234,$line24);
$line24 = str_replace('DOK6',$mrsinzaips,$line24);
$line24 = str_replace('DOKSA',$ro3,$line24);
$line24 = str_replace('DOK8',$dok8,$line24);
$line24 = str_replace('DOCK',$dok12,$line24);
$line24 = str_replace('DOKEN',$dok13,$line24);
$line24 = str_replace('DOK0',$dok0,$line24);
}else{
$line24 = "";
}
if(file_exists("line11.txt") or file_exists("line12.txt") or file_exists("line13.txt") or file_exists("line14.txt") or file_exists("line21.txt") or file_exists("line22.txt") or file_exists("line23.txt") or file_exists("line24.txt")
 or file_exists("line32.txt") or file_exists("line32.txt") or file_exists("line33.txt") or file_exists("line34.txt") or file_exists("line41.txt")
  or file_exists("line42.txt") or file_exists("line43.txt") or file_exists("line44.txt") or file_exists("line51.txt") or file_exists("line52.txt")
   or file_exists("line53.txt") or file_exists("line54.txt") or file_exists("line61.txt") or file_exists("line62.txt") or file_exists("line63.txt") or file_exists("line64.txt")){
$line31 = file_get_contents("line31.txt");
$line31 = str_replace('DOK1',$dok1,$line31);
$line31 = str_replace('DOK2',$dok2,$line31);
$line31 = str_replace('DOK3',$dok3,$line31);
$line31 = str_replace('DOK4',$dok4,$line31);
$line31 = str_replace('DOK5',$kosnanat1234,$line31);
$line31 = str_replace('DOK6',$mrsinzaips,$line31);
$line31 = str_replace('DOKSA',$ro3,$line31);
$line31 = str_replace('DOK8',$dok8,$line31);
$line31 = str_replace('DOCK',$dok12,$line31);
$line31 = str_replace('DOKEN',$dok13,$line31);
$line31 = str_replace('DOK0',$dok0,$line31);
}else{
$line31 = "$dok3";
}
if(file_exists("line11.txt") or file_exists("line12.txt") or file_exists("line13.txt") or file_exists("line14.txt") or file_exists("line21.txt") or file_exists("line22.txt") or file_exists("line23.txt") or file_exists("line24.txt")
 or file_exists("line32.txt") or file_exists("line32.txt") or file_exists("line33.txt") or file_exists("line34.txt") or file_exists("line41.txt")
  or file_exists("line42.txt") or file_exists("line43.txt") or file_exists("line44.txt") or file_exists("line51.txt") or file_exists("line52.txt")
   or file_exists("line53.txt") or file_exists("line54.txt") or file_exists("line61.txt") or file_exists("line62.txt") or file_exists("line63.txt") or file_exists("line64.txt")){
$line32 = file_get_contents("line32.txt");
$line32 = str_replace('DOK1',$dok1,$line32);
$line32 = str_replace('DOK2',$dok2,$line32);
$line32 = str_replace('DOK3',$dok3,$line32);
$line32 = str_replace('DOK4',$dok4,$line32);
$line32 = str_replace('DOK5',$kosnanat1234,$line32);
$line32 = str_replace('DOK6',$mrsinzaips,$line32);
$line32 = str_replace('DOKSA',$ro3,$line32);
$line32 = str_replace('DOK8',$dok8,$line32);
$line32 = str_replace('DOCK',$dok12,$line32);
$line32 = str_replace('DOKEN',$dok13,$line32);
$line32 = str_replace('DOK0',$dok0,$line32);
}else{
$line32 = "$mrsinzaips";
}
if(file_exists("line11.txt") or file_exists("line12.txt") or file_exists("line13.txt") or file_exists("line14.txt") or file_exists("line21.txt") or file_exists("line22.txt") or file_exists("line23.txt") or file_exists("line24.txt")
 or file_exists("line32.txt") or file_exists("line32.txt") or file_exists("line33.txt") or file_exists("line34.txt") or file_exists("line41.txt")
  or file_exists("line42.txt") or file_exists("line43.txt") or file_exists("line44.txt") or file_exists("line51.txt") or file_exists("line52.txt")
   or file_exists("line53.txt") or file_exists("line54.txt") or file_exists("line61.txt") or file_exists("line62.txt") or file_exists("line63.txt") or file_exists("line64.txt")){
$line33 = file_get_contents("line33.txt");
$line33 = str_replace('DOK1',$dok1,$line33);
$line33 = str_replace('DOK2',$dok2,$line33);
$line33 = str_replace('DOK3',$dok3,$line33);
$line33 = str_replace('DOK4',$dok4,$line33);
$line33 = str_replace('DOK5',$kosnanat1234,$line33);
$line33 = str_replace('DOK6',$mrsinzaips,$line33);
$line33 = str_replace('DOKSA',$ro3,$line33);
$line33 = str_replace('DOK8',$dok8,$line33);
$line33 = str_replace('DOCK',$dok12,$line33);
$line33 = str_replace('DOKEN',$dok13,$line33);
$line33 = str_replace('DOK0',$dok0,$line33);
}else{
$line33 = "";
}
if(file_exists("line11.txt") or file_exists("line12.txt") or file_exists("line13.txt") or file_exists("line14.txt") or file_exists("line21.txt") or file_exists("line22.txt") or file_exists("line23.txt") or file_exists("line24.txt")
 or file_exists("line32.txt") or file_exists("line32.txt") or file_exists("line33.txt") or file_exists("line34.txt") or file_exists("line41.txt")
  or file_exists("line42.txt") or file_exists("line43.txt") or file_exists("line44.txt") or file_exists("line51.txt") or file_exists("line52.txt")
   or file_exists("line53.txt") or file_exists("line54.txt") or file_exists("line61.txt") or file_exists("line62.txt") or file_exists("line63.txt") or file_exists("line64.txt")){
$line34 = file_get_contents("line34.txt");
$line34 = str_replace('DOK1',$dok1,$line34);
$line34 = str_replace('DOK2',$dok2,$line34);
$line34 = str_replace('DOK3',$dok3,$line34);
$line34 = str_replace('DOK4',$dok4,$line34);
$line34 = str_replace('DOK5',$kosnanat1234,$line34);
$line34 = str_replace('DOK6',$mrsinzaips,$line34);
$line34 = str_replace('DOKSA',$ro3,$line34);
$line34 = str_replace('DOK8',$dok8,$line34);
$line34 = str_replace('DOCK',$dok12,$line34);
$line34 = str_replace('DOKEN',$dok13,$line34);
$line34 = str_replace('DOK0',$dok0,$line34);
}else{
$line34 = "";
}
if(file_exists("line11.txt") or file_exists("line12.txt") or file_exists("line13.txt") or file_exists("line14.txt") or file_exists("line21.txt") or file_exists("line22.txt") or file_exists("line23.txt") or file_exists("line24.txt")
 or file_exists("line32.txt") or file_exists("line32.txt") or file_exists("line33.txt") or file_exists("line34.txt") or file_exists("line41.txt")
  or file_exists("line42.txt") or file_exists("line43.txt") or file_exists("line44.txt") or file_exists("line51.txt") or file_exists("line52.txt")
   or file_exists("line53.txt") or file_exists("line54.txt") or file_exists("line61.txt") or file_exists("line62.txt") or file_exists("line63.txt") or file_exists("line64.txt")){
$line41 = file_get_contents("line41.txt");
$line41 = str_replace('DOK1',$dok1,$line41);
$line41 = str_replace('DOK2',$dok2,$line41);
$line41 = str_replace('DOK3',$dok3,$line41);
$line41 = str_replace('DOK4',$dok4,$line41);
$line41 = str_replace('DOK5',$kosnanat1234,$line41);
$line41 = str_replace('DOK6',$mrsinzaips,$line41);
$line41 = str_replace('DOKSA',$ro3,$line41);
$line41 = str_replace('DOK8',$dok8,$line41);
$line41 = str_replace('DOCK',$dok12,$line41);
$line41 = str_replace('DOKEN',$dok13,$line41);
$line41 = str_replace('DOK0',$dok0,$line41);
}else{
$line41 = "$dok12";
}
if(file_exists("line11.txt") or file_exists("line12.txt") or file_exists("line13.txt") or file_exists("line14.txt") or file_exists("line21.txt") or file_exists("line22.txt") or file_exists("line23.txt") or file_exists("line24.txt")
 or file_exists("line32.txt") or file_exists("line32.txt") or file_exists("line33.txt") or file_exists("line34.txt") or file_exists("line41.txt")
  or file_exists("line42.txt") or file_exists("line43.txt") or file_exists("line44.txt") or file_exists("line51.txt") or file_exists("line52.txt")
   or file_exists("line53.txt") or file_exists("line54.txt") or file_exists("line61.txt") or file_exists("line62.txt") or file_exists("line63.txt") or file_exists("line64.txt")){
$line42 = file_get_contents("line42.txt");
$line42 = str_replace('DOK1',$dok1,$line42);
$line42 = str_replace('DOK2',$dok2,$line42);
$line42 = str_replace('DOK3',$dok3,$line42);
$line42 = str_replace('DOK4',$dok4,$line42);
$line42 = str_replace('DOK5',$kosnanat1234,$line42);
$line42 = str_replace('DOK6',$mrsinzaips,$line42);
$line42 = str_replace('DOKSA',$ro3,$line42);
$line42 = str_replace('DOK8',$dok8,$line42);
$line42 = str_replace('DOCK',$dok12,$line42);
$line42 = str_replace('DOKEN',$dok13,$line42);
$line42 = str_replace('DOK0',$dok0,$line42);
}else{
$line42 = "$ro3";
}
if(file_exists("line11.txt") or file_exists("line12.txt") or file_exists("line13.txt") or file_exists("line14.txt") or file_exists("line21.txt") or file_exists("line22.txt") or file_exists("line23.txt") or file_exists("line24.txt")
 or file_exists("line32.txt") or file_exists("line32.txt") or file_exists("line33.txt") or file_exists("line34.txt") or file_exists("line41.txt")
  or file_exists("line42.txt") or file_exists("line43.txt") or file_exists("line44.txt") or file_exists("line51.txt") or file_exists("line52.txt")
   or file_exists("line53.txt") or file_exists("line54.txt") or file_exists("line61.txt") or file_exists("line62.txt") or file_exists("line63.txt") or file_exists("line64.txt")){
$line43 = file_get_contents("line43.txt");
$line43 = str_replace('DOK1',$dok1,$line43);
$line43 = str_replace('DOK2',$dok2,$line43);
$line43 = str_replace('DOK3',$dok3,$line43);
$line43 = str_replace('DOK4',$dok4,$line43);
$line43 = str_replace('DOK5',$kosnanat1234,$line43);
$line43 = str_replace('DOK6',$mrsinzaips,$line43);
$line43 = str_replace('DOKSA',$ro3,$line43);
$line43 = str_replace('DOK8',$dok8,$line43);
$line43 = str_replace('DOCK',$dok12,$line43);
$line43 = str_replace('DOKEN',$dok13,$line43);
$line43 = str_replace('DOK0',$dok0,$line43);
}else{
$line43 = "";
}
if(file_exists("line11.txt") or file_exists("line12.txt") or file_exists("line13.txt") or file_exists("line14.txt") or file_exists("line21.txt") or file_exists("line22.txt") or file_exists("line23.txt") or file_exists("line24.txt")
 or file_exists("line32.txt") or file_exists("line32.txt") or file_exists("line33.txt") or file_exists("line34.txt") or file_exists("line41.txt")
  or file_exists("line42.txt") or file_exists("line43.txt") or file_exists("line44.txt") or file_exists("line51.txt") or file_exists("line52.txt")
   or file_exists("line53.txt") or file_exists("line54.txt") or file_exists("line61.txt") or file_exists("line62.txt") or file_exists("line63.txt") or file_exists("line64.txt")){
$line44 = file_get_contents("line44.txt");
$line44 = str_replace('DOK1',$dok1,$line44);
$line44 = str_replace('DOK2',$dok2,$line44);
$line44 = str_replace('DOK3',$dok3,$line44);
$line44 = str_replace('DOK4',$dok4,$line44);
$line44 = str_replace('DOK5',$kosnanat1234,$line44);
$line44 = str_replace('DOK6',$mrsinzaips,$line44);
$line44 = str_replace('DOKSA',$ro3,$line44);
$line44 = str_replace('DOK8',$dok8,$line44);
$line44 = str_replace('DOCK',$dok12,$line44);
$line44 = str_replace('DOKEN',$dok13,$line44);
$line44 = str_replace('DOK0',$dok0,$line44);
}else{
$line44 = "";
}
if(file_exists("line11.txt") or file_exists("line12.txt") or file_exists("line13.txt") or file_exists("line14.txt") or file_exists("line21.txt") or file_exists("line22.txt") or file_exists("line23.txt") or file_exists("line24.txt")
 or file_exists("line32.txt") or file_exists("line32.txt") or file_exists("line33.txt") or file_exists("line34.txt") or file_exists("line41.txt")
  or file_exists("line42.txt") or file_exists("line43.txt") or file_exists("line44.txt") or file_exists("line51.txt") or file_exists("line52.txt")
   or file_exists("line53.txt") or file_exists("line54.txt") or file_exists("line61.txt") or file_exists("line62.txt") or file_exists("line63.txt") or file_exists("line64.txt")){
$line51 = file_get_contents("line51.txt");
$line51 = str_replace('DOK1',$dok1,$line51);
$line51 = str_replace('DOK2',$dok2,$line51);
$line51 = str_replace('DOK3',$dok3,$line51);
$line51 = str_replace('DOK4',$dok4,$line51);
$line51 = str_replace('DOK5',$kosnanat1234,$line51);
$line51 = str_replace('DOK6',$mrsinzaips,$line51);
$line51 = str_replace('DOKSA',$ro3,$line51);
$line51 = str_replace('DOK8',$dok8,$line51);
$line51 = str_replace('DOCK',$dok12,$line51);
$line51 = str_replace('DOKEN',$dok13,$line51);
$line51 = str_replace('DOK0',$dok0,$line51);
}else{
$line51 = "$dok0";
}
if(file_exists("line11.txt") or file_exists("line12.txt") or file_exists("line13.txt") or file_exists("line14.txt") or file_exists("line21.txt") or file_exists("line22.txt") or file_exists("line23.txt") or file_exists("line24.txt")
 or file_exists("line32.txt") or file_exists("line32.txt") or file_exists("line33.txt") or file_exists("line34.txt") or file_exists("line41.txt")
  or file_exists("line42.txt") or file_exists("line43.txt") or file_exists("line44.txt") or file_exists("line51.txt") or file_exists("line52.txt")
   or file_exists("line53.txt") or file_exists("line54.txt") or file_exists("line61.txt") or file_exists("line62.txt") or file_exists("line63.txt") or file_exists("line64.txt")){
$line52 = file_get_contents("line52.txt");
$line52 = str_replace('DOK1',$dok1,$line52);
$line52 = str_replace('DOK2',$dok2,$line52);
$line52 = str_replace('DOK3',$dok3,$line52);
$line52 = str_replace('DOK4',$dok4,$line52);
$line52 = str_replace('DOK5',$kosnanat1234,$line52);
$line52 = str_replace('DOK6',$mrsinzaips,$line52);
$line52 = str_replace('DOKSA',$ro3,$line52);
$line52 = str_replace('DOK8',$dok8,$line52);
$line52 = str_replace('DOCK',$dok12,$line52);
$line52 = str_replace('DOKEN',$dok13,$line52);
$line52 = str_replace('DOK0',$dok0,$line52);
}else{
$line52 = "";
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
if(file_exists("line11.txt") or file_exists("line12.txt") or file_exists("line13.txt") or file_exists("line14.txt") or file_exists("line21.txt") or file_exists("line22.txt") or file_exists("line23.txt") or file_exists("line24.txt")
 or file_exists("line32.txt") or file_exists("line32.txt") or file_exists("line33.txt") or file_exists("line34.txt") or file_exists("line41.txt")
  or file_exists("line42.txt") or file_exists("line43.txt") or file_exists("line44.txt") or file_exists("line51.txt") or file_exists("line52.txt")
   or file_exists("line53.txt") or file_exists("line54.txt") or file_exists("line61.txt") or file_exists("line62.txt") or file_exists("line63.txt") or file_exists("line64.txt")){
$line53 = file_get_contents("line53.txt");
$line53 = str_replace('DOK1',$dok1,$line53);
$line53 = str_replace('DOK2',$dok2,$line53);
$line53 = str_replace('DOK3',$dok3,$line53);
$line53 = str_replace('DOK4',$dok4,$line53);
$line53 = str_replace('DOK5',$kosnanat1234,$line53);
$line53 = str_replace('DOK6',$mrsinzaips,$line53);
$line53 = str_replace('DOKSA',$ro3,$line53);
$line53 = str_replace('DOK8',$dok8,$line53);
$line53 = str_replace('DOCK',$dok12,$line53);
$line53 = str_replace('DOKEN',$dok13,$line53);
$line53 = str_replace('DOK0',$dok0,$line53);
}else{
$line53 = "";
}
if(file_exists("line11.txt") or file_exists("line12.txt") or file_exists("line13.txt") or file_exists("line14.txt") or file_exists("line21.txt") or file_exists("line22.txt") or file_exists("line23.txt") or file_exists("line24.txt")
 or file_exists("line32.txt") or file_exists("line32.txt") or file_exists("line33.txt") or file_exists("line34.txt") or file_exists("line41.txt")
  or file_exists("line42.txt") or file_exists("line43.txt") or file_exists("line44.txt") or file_exists("line51.txt") or file_exists("line52.txt")
   or file_exists("line53.txt") or file_exists("line54.txt") or file_exists("line61.txt") or file_exists("line62.txt") or file_exists("line63.txt") or file_exists("line64.txt")){
$line54 = file_get_contents("line54.txt");
$line54 = str_replace('DOK1',$dok1,$line54);
$line54 = str_replace('DOK2',$dok2,$line54);
$line54 = str_replace('DOK3',$dok3,$line54);
$line54 = str_replace('DOK4',$dok4,$line54);
$line54 = str_replace('DOK5',$kosnanat1234,$line54);
$line54 = str_replace('DOK6',$mrsinzaips,$line54);
$line54 = str_replace('DOKSA',$ro3,$line54);
$line54 = str_replace('DOK8',$dok8,$line54);
$line54 = str_replace('DOCK',$dok12,$line54);
$line54 = str_replace('DOKEN',$dok13,$line54);
$line54 = str_replace('DOK0',$dok0,$line54);
}else{
$line54 = "";
}
if(file_exists("line11.txt") or file_exists("line12.txt") or file_exists("line13.txt") or file_exists("line14.txt") or file_exists("line21.txt") or file_exists("line22.txt") or file_exists("line23.txt") or file_exists("line24.txt")
 or file_exists("line32.txt") or file_exists("line32.txt") or file_exists("line33.txt") or file_exists("line34.txt") or file_exists("line41.txt")
  or file_exists("line42.txt") or file_exists("line43.txt") or file_exists("line44.txt") or file_exists("line51.txt") or file_exists("line52.txt")
   or file_exists("line53.txt") or file_exists("line54.txt") or file_exists("line61.txt") or file_exists("line62.txt") or file_exists("line63.txt") or file_exists("line64.txt")){
$line61 = file_get_contents("line61.txt");
$line61 = str_replace('DOK1',$dok1,$line61);
$line61 = str_replace('DOK2',$dok2,$line61);
$line61 = str_replace('DOK3',$dok3,$line61);
$line61 = str_replace('DOK4',$dok4,$line61);
$line61 = str_replace('DOK5',$kosnanat1234,$line61);
$line61 = str_replace('DOK6',$mrsinzaips,$line61);
$line61 = str_replace('DOKSA',$ro3,$line61);
$line61 = str_replace('DOK8',$dok8,$line61);
$line61 = str_replace('DOCK',$dok12,$line61);
$line61 = str_replace('DOKEN',$dok13,$line61);
$line61 = str_replace('DOK0',$dok0,$line61);
}else{
$line61 = "";
}
if(file_exists("line11.txt") or file_exists("line12.txt") or file_exists("line13.txt") or file_exists("line14.txt") or file_exists("line21.txt") or file_exists("line22.txt") or file_exists("line23.txt") or file_exists("line24.txt")
 or file_exists("line32.txt") or file_exists("line32.txt") or file_exists("line33.txt") or file_exists("line34.txt") or file_exists("line41.txt")
  or file_exists("line42.txt") or file_exists("line43.txt") or file_exists("line44.txt") or file_exists("line51.txt") or file_exists("line52.txt")
   or file_exists("line53.txt") or file_exists("line54.txt") or file_exists("line61.txt") or file_exists("line62.txt") or file_exists("line63.txt") or file_exists("line64.txt")){
$line62 = file_get_contents("line62.txt");
$line62 = str_replace('DOK1',$dok1,$line62);
$line62 = str_replace('DOK2',$dok2,$line62);
$line62 = str_replace('DOK3',$dok3,$line62);
$line62 = str_replace('DOK4',$dok4,$line62);
$line62 = str_replace('DOK5',$kosnanat1234,$line62);
$line62 = str_replace('DOK6',$mrsinzaips,$line62);
$line62 = str_replace('DOKSA',$ro3,$line62);
$line62 = str_replace('DOK8',$dok8,$line62);
$line62 = str_replace('DOCK',$dok12,$line62);
$line62 = str_replace('DOKEN',$dok13,$line62);
$line62 = str_replace('DOK0',$dok0,$line62);
}else{
$line62 = "";
}
if(file_exists("line11.txt") or file_exists("line12.txt") or file_exists("line13.txt") or file_exists("line14.txt") or file_exists("line21.txt") or file_exists("line22.txt") or file_exists("line23.txt") or file_exists("line24.txt")
 or file_exists("line32.txt") or file_exists("line32.txt") or file_exists("line33.txt") or file_exists("line34.txt") or file_exists("line41.txt")
  or file_exists("line42.txt") or file_exists("line43.txt") or file_exists("line44.txt") or file_exists("line51.txt") or file_exists("line52.txt")
   or file_exists("line53.txt") or file_exists("line54.txt") or file_exists("line61.txt") or file_exists("line62.txt") or file_exists("line63.txt") or file_exists("line64.txt")){
$line63 = file_get_contents("line63.txt");
$line63 = str_replace('DOK1',$dok1,$line63);
$line63 = str_replace('DOK2',$dok2,$line63);
$line63 = str_replace('DOK3',$dok3,$line63);
$line63 = str_replace('DOK4',$dok4,$line63);
$line63 = str_replace('DOK5',$kosnanat1234,$line63);
$line63 = str_replace('DOK6',$mrsinzaips,$line63);
$line63 = str_replace('DOKSA',$ro3,$line63);
$line63 = str_replace('DOK8',$dok8,$line63);
$line63 = str_replace('DOCK',$dok12,$line63);
$line63 = str_replace('DOKEN',$dok13,$line63);
$line63 = str_replace('DOK0',$dok0,$line63);
}else{
$line63 = "";
}
if(file_exists("line11.txt") or file_exists("line12.txt") or file_exists("line13.txt") or file_exists("line14.txt") or file_exists("line21.txt") or file_exists("line22.txt") or file_exists("line23.txt") or file_exists("line24.txt")
 or file_exists("line32.txt") or file_exists("line32.txt") or file_exists("line33.txt") or file_exists("line34.txt") or file_exists("line41.txt")
  or file_exists("line42.txt") or file_exists("line43.txt") or file_exists("line44.txt") or file_exists("line51.txt") or file_exists("line52.txt")
   or file_exists("line53.txt") or file_exists("line54.txt") or file_exists("line61.txt") or file_exists("line62.txt") or file_exists("line63.txt") or file_exists("line64.txt")){
$line64 = file_get_contents("line64.txt");
$line64 = str_replace('DOK1',$dok1,$line64);
$line64 = str_replace('DOK2',$dok2,$line64);
$line64 = str_replace('DOK3',$dok3,$line64);
$line64 = str_replace('DOK4',$dok4,$line64);
$line64 = str_replace('DOK5',$kosnanat1234,$line64);
$line64 = str_replace('DOK6',$mrsinzaips,$line64);
$line64 = str_replace('DOKSA',$ro3,$line64);
$line64 = str_replace('DOK8',$dok8,$line64);
$line64 = str_replace('DOCK',$dok12,$line64);
$line64 = str_replace('DOKEN',$dok13,$line64);
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
$ghavanin = "متن شارژ حساب تنظیم نشده است";
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
$sef = "متن ثبت شرطبندی تنظیم نشده است";
}
if(file_exists("data/sabt.txt")){
$sabt = file_get_contents("data/sabt.txt");
$sabt = str_replace('NAME',$first2,$sabt);
}else{
$sabt = "متن ایدی دهی تنظیم نشده است";
}
if(file_exists("data/dok78.txt")){
$dok78 = file_get_contents("data/dok78.txt");
}else{
$dok78 = "👥زیرمجموعه";
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
شارژ حساب: DOK3
ثبت شرط: DOK4
افزایش موجودی: DOK6
راهنما: DOK8
کدهدیه: DOCK
برداشت موجودی: DOKSA
انتقال الماس: DOKEN
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
if(file_exists("data/ozvname6.txt")){
$ozvname6 = file_get_contents("data/ozvname6.txt");
$ozvname6 = str_replace('NAME',$first2,$ozvname6);
}else{
$ozvname6 = "تنظیم نشده";
}
if(file_exists("data/ozvname4.txt")){
$ozvname4 = file_get_contents("data/ozvname4.txt");
$ozvname4 = str_replace('NAME',$first2,$ozvname4);
}else{
$ozvname4 = "تنظیم نشده";
}
if(file_exists("data/ozvname5.txt")){
$ozvname5 = file_get_contents("data/ozvname5.txt");
$ozvname5 = str_replace('NAME',$first2,$ozvname5);
}else{
$ozvname5 = "تنظیم نشده";
}
if(file_exists("data/ozvname3.txt")){
$ozvname3 = file_get_contents("data/ozvname3.txt");
$ozvname3 = str_replace('NAME',$first2,$ozvname3);
}else{
$ozvname3 = "تنظیم نشده";
}
if(file_exists("data/ozvname2.txt")){
$ozvname2 = file_get_contents("data/ozvname2.txt");
$ozvname2 = str_replace('NAME',$first2,$ozvname2);
}else{
$ozvname2 = "تنظیم نشده";
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

🔷$invitecoin $almasbot به موجودی شما اضافه شد🔷";
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
$sef = "متن ثبت شرط تنظیم نشده";
}
if(file_exists("data/dok999.txt")){
$dok999 = file_get_contents("data/dok999.txt");
}else{
$dok999 = "⛓دریافت موجودی";
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
$sefoff = "متن خاموشی ثبت شرط تنظیم نشده است";
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
if(file_exists("data/dokchannel2.txt")){
$dokchannel2 = file_get_contents("data/dokchannel2.txt");
$dokchannel2 = str_replace('NAME',$first,$dokchannel2);
$dokchannel2 = str_replace('LAST',$last,$dokchannel2);
$dokchannel2 = str_replace('USER',$username,$dokchannel2);
$dokchannel2 = str_replace('ID',$from_id,$dokchannel2);
}else{
$dokchannel2 = "متن دریافت $almasbot تنظیم نشده است";
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
$chor = file_get_contents("data/ch.txt");
$channels = json_decode(file_get_contents("https://api.telegram.org/bot$token/getChatMember?chat_id=@$chor&user_id=".$from_id or $chatid));
$to = $channels->result->status;
$reply = $update->message->reply_to_message->forward_from->id;
$sefareshbardash = json_encode(['keyboard'=>[
[['text'=>"$bar1"]],
[['text'=>"$bar3"],['text'=>"$bar4"],['text'=>"$bar2"]],
[['text'=>"$bar5"],['text'=>"$bar6"]],
[['text'=>"$backsinza"]],
],'resize_keyboard'=>true]);
$montis = json_encode(['keyboard'=>[
[['text'=>"کمتر از 50"],['text'=>"بیشتر از 50"]],
[['text'=>"$backsinza"]],
],'resize_keyboard'=>true]);
$roletse = json_encode(['keyboard'=>[
[['text'=>"🎱 پیشبینی عدد دقیق"]],
[['text'=>"🎱 پیشبینی عدد 13 الی 36"],['text'=>"🎱 پیشبینی عدد 0 الی 12"]],
[['text'=>"$backsinza"]],
],'resize_keyboard'=>true]);
$button_manage = json_encode(['keyboard'=>[
[['text'=>"🚫بلاک و آنبلاک✅"]],
[['text'=>"آمار ربات 📈"],['text'=>"ارسال پیام 📨"],['text'=>"بخش تنظیمات ⚙️"]],
[['text'=>"کد هدیه 🎉"],['text'=>"مبادلات 🏦"],['text'=>"💣 تنظیم شرط"]],
[['text'=>"تنظیم متن 💬"],['text'=>"چیدمان 🌐"],['text'=>"دکمه ها 🔰"]],
[['text'=>"ادمین ها 👤"],['text'=>"تنظیم فروشگاه🛒"],['text'=>"تنظیم زیرمجموعه 🎉"]],
[['text'=>"باقی مانده اشتراک ❗️"]],
[['text'=>"تنظیم کانال 🆔"],['text'=>"🔙 برگشت به ربات"]],
],'resize_keyboard'=>true]);
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$menu1 = json_encode(['keyboard'=>[
[['text'=>"$line11"],['text'=>"$line12"],['text'=>"$line13"],['text'=>"$line14"]],
[['text'=>"$line21"],['text'=>"$line22"],['text'=>"$line23"],['text'=>"$line24"]],
[['text'=>"$line31"],['text'=>"$line32"],['text'=>"$line33"],['text'=>"$line34"]],
[['text'=>"$line41"],['text'=>"$line42"],['text'=>"$line43"],['text'=>"$line44"]],
[['text'=>"$line51"],['text'=>"$line52"],['text'=>"$line53"],['text'=>"$line54"]],
[['text'=>"$line61"],['text'=>"$line62"],['text'=>"$line63"],['text'=>"$line64"]],
[['text'=>"👤ادمین"]],
],'resize_keyboard'=>true]);
}else{
$menu1 = json_encode(['keyboard'=>[
[['text'=>"$line11"],['text'=>"$line12"],['text'=>"$line13"],['text'=>"$line14"]],
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

$poop1 = json_encode(['inline_keyboard'=>[
[['text'=>"1️⃣",'callback_data'=>"bakhtish"],['text'=>"2️⃣",'callback_data'=>"bakhi"],['text'=>"3️⃣",'callback_data'=>"bakht"],['text'=>"4️⃣",'callback_data'=>"bordk"]],
],'resize_keyboard'=>true]);

$poop2 = json_encode(['inline_keyboard'=>[
[['text'=>"1️⃣",'callback_data'=>"bakhtish"],['text'=>"2️⃣",'callback_data'=>"bordk"],['text'=>"3️⃣",'callback_data'=>"bakhi"],['text'=>"4️⃣",'callback_data'=>"bakht"]],
],'resize_keyboard'=>true]);

$poop3 = json_encode(['inline_keyboard'=>[
[['text'=>"1️⃣",'callback_data'=>"bakhi"],['text'=>"2️⃣",'callback_data'=>"bordesh"],['text'=>"3️⃣",'callback_data'=>"bakhtish"],['text'=>"4️⃣",'callback_data'=>"bakht"]],
],'resize_keyboard'=>true]);

$poop4 = json_encode(['inline_keyboard'=>[
[['text'=>"1️⃣",'callback_data'=>"bakht"],['text'=>"2️⃣",'callback_data'=>"bakhi"],['text'=>"3️⃣",'callback_data'=>"bordesh"],['text'=>"4️⃣",'callback_data'=>"bakhtish"]],
],'resize_keyboard'=>true]);
$poop5 = json_encode(['inline_keyboard'=>[
[['text'=>"1️⃣",'callback_data'=>"bakhi"],['text'=>"2️⃣",'callback_data'=>"bakht"],['text'=>"3️⃣",'callback_data'=>"bordesh"],['text'=>"4️⃣",'callback_data'=>"bordk"]],
],'resize_keyboard'=>true]);
$poop6 = json_encode(['inline_keyboard'=>[
[['text'=>"1️⃣",'callback_data'=>"bordesh"],['text'=>"2️⃣",'callback_data'=>"bakhi"],['text'=>"3️⃣",'callback_data'=>"bakhtish"],['text'=>"4️⃣",'callback_data'=>"bakht"]],
],'resize_keyboard'=>true]);
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
if ($day <= 2){
SendMessage($chat_id,"ادمین گرامی مدت زمان اشتراک شما در رباتساز بزرگ میا کریت ب اتمام رسیده است ⚠️
برای تمدید ربات خود به پیوی ادمین مراجعه کنید ❤️
@DevOscar 👤",null);
exit();
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
bot ('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"@MiaCreateBot",
]);
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
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

if(isset($message->photo)){
if(isset($update->message->forward_from) or isset($update->message->forward_from_chat)){
exit();
}}
	if(isset($message->video)){
			if(isset($update->message->forward_from) or isset($update->message->forward_from_chat)){
exit();
}}
	if(isset($message->voice)){
			if(isset($update->message->forward_from) or isset($update->message->forward_from_chat)){
			exit();
}}
	if(isset($message->audio)){
exit();
}
	if(isset($message->sticker)){
exit();
}
	if(isset($message->document)){
exit();
}
if($text == "/creator" and $tc == 'private'){
	$creator = file_get_contents("../../creator.txt");
	SendMessage($chat_id,$creator);
}
elseif($text == "$dok0" and $tc == 'private'){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"☎️ به بخش پشتیبانی ربات خوش امدید جهت ورود به پشتیبانی کلیک نمایید.",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"$dok44", 'callback_data'=> 'poshteam']],
]
])
]);
}
elseif($text == "$mrsinzaips" and $tc == 'private'){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"👇🏻 یکی از بخش های زیر را جهت افزایش موجودی انتخاب کنید

💰 موجودی حساب شما : $coin $almasbot

⬆️ با دعوت دوستان خود به ربات با لینک اختصاصی خود میتوانید به ازای هر نفر $invitecoin $almasbot موجودی دریافت کنید",
'parse_mode'=>'Markdown', 
'reply_markup'=>json_encode([ 
'resize_keyboard'=>true,
            'keyboard'=>[
[['text'=>"$dok6"],['text'=>"$dok5"]],
[['text'=>"$backsinza"]],
]
])
]);
}
elseif($text == "$ro3" and $tc == 'private'){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"❓ چه نوع رباتی را جهت برداشت میخواید انتخاب نمایید؟",
'parse_mode'=>'Markdown', 
'reply_markup'=>json_encode([ 
'resize_keyboard'=>true,
            'keyboard'=>[
[['text'=>"$ro2"],['text'=>"$ro1"]],
[['text'=>"$backsinza"]],
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
elseif($text == "$bar5" and $tc == 'private'){
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
💰 گزینه مورد نظر خود را جهت شرطبندی انتخاب نمایید.
",
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$roletse
]);
}
}
elseif($text == "$bar3" and $tc == 'private'){
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
🔢 گزینه مورد نظر خود را پیشبینی کنید:
",
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$montis
]);
}
}
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
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$sefareshbardash
]);
}
}
if($text == "بیشتر از 50" and $tc == 'private'){
$datas["step"] = "montiup50";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("data/$chat_id/noerobotmorednazar.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"💰مقدار موجودی که میخواید شرط ببندید را ارسال نمایید.",
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
	if ($step == "montiup50" and $text != "$backsinza") {
    if(preg_match("/^(-){0,1}([0-9]+)(,[0-9][0-9][0-9])*([.][0-9]){0,1}([0-9]*)$/",$text)){
        file_put_contents("data/$chat_id/meghdarsharmonti.txt",$text);
        $meghdarsharmonti = file_get_contents("data/$from_id/meghdarsharmonti.txt");
        $coinshomahastesh = $datas["coin"];
    if ($text >= $coinshomahastesh) {
        bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"🚫 موجودی شما متاسفانه کافی نیست.",
]); 
exit();
}
    $nak = rand(00,99);
    file_put_contents("data/$from_id/zariboftadeshode.txt","$nak");
    $zariboftadeshode = file_get_contents("data/$from_id/zariboftadeshode.txt");
    $zarivdahomeshe = file_get_contents("data/$from_id/zaribsadomsh.txt");
$tedadtarkhastishes = file_get_contents("data/$from_id/tedadtarkhastishes.txt");
$zaribnahayee = "$zariboftadeshode";
if($zaribnahayee >= 50){
    $datas["step"] = "none";
$datas12345612 = json_decode(file_get_contents("data/$chat_id/$chat_id.json"),true);
$invite122 = $datas12345612["coin"];
settype($invite122,"integer");
$mojodibarandehshodeshe = $text * 2;
$newmojbet = $invite122 + $text;
$datas12345612["coin"] = $newmojbet;
$outjson = json_encode($datas12345612,true);
file_put_contents("data/$chat_id/$chat_id.json",$outjson);
bot('sendMessage', [
'chat_id' => $chat_id,
'text' => "✅ شما برنده شدید.

🔢 عدد خروجی این دست : $zaribnahayee
🔘 نوع انتخابی شما : بیشتر از 50
🎖 مبلغ شرط : $text
🔆 سود شما : $mojodibarandehshodeshe

🎗 سود خالص : $text
",

            ]);
}
            else{
    $mojsaveshodesh = json_decode(file_get_contents("data/$from_id/$from_id.json"),true);
$mojoditarafshart = $mojsaveshodesh["coin"];
$mojjazizesh = $mojoditarafshart - $text;
$mojsaveshodesh["coin"] = $mojjazizesh;
$outjson = json_encode($mojsaveshodesh,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
		SendMessage($chat_id,"🚫 متاسفانه شما باختید دوست عزیز.

🔢 عدد خروجی این دست : $zaribnahayee
🔘 نوع انتخابی شما : بیشتر از 50
🎖 مبلغ شرط : $text

⭕️ مقدار باخت : $text");
	}
}}
if($text == "کمتر از 50" and $tc == 'private'){
$datas["step"] = "montikam50montikam50";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("data/$chat_id/noerobotmorednazar.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"💰مقدار موجودی که میخواید شرط ببندید را ارسال نمایید.",
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
	if ($step == "montikam50montikam50" and $text != "$backsinza") {
    if(preg_match("/^(-){0,1}([0-9]+)(,[0-9][0-9][0-9])*([.][0-9]){0,1}([0-9]*)$/",$text)){
        file_put_contents("data/$chat_id/meghdarsharmonti.txt",$text);
        $meghdarsharmonti = file_get_contents("data/$from_id/meghdarsharmonti.txt");
        $coinshomahastesh = $datas["coin"];
    if ($text >= $coinshomahastesh) {
        bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"🚫 موجودی شما متاسفانه کافی نیست.",
]); 
exit();
}
    $nak = rand(00,99);
    file_put_contents("data/$from_id/zariboftadeshode.txt","$nak");
    $zariboftadeshode = file_get_contents("data/$from_id/zariboftadeshode.txt");
    $zarivdahomeshe = file_get_contents("data/$from_id/zaribsadomsh.txt");
$tedadtarkhastishes = file_get_contents("data/$from_id/tedadtarkhastishes.txt");
$zaribnahayee = "$zariboftadeshode";
if(50 >= $zaribnahayee){
    $datas["step"] = "none";
$datas12345612 = json_decode(file_get_contents("data/$chat_id/$chat_id.json"),true);
$invite122 = $datas12345612["coin"];
settype($invite122,"integer");
$mojodibarandehshodeshe = $text * 2;
$newmojbet = $invite122 + $text;
$datas12345612["coin"] = $newmojbet;
$outjson = json_encode($datas12345612,true);
file_put_contents("data/$chat_id/$chat_id.json",$outjson);
bot('sendMessage', [
'chat_id' => $chat_id,
'text' => "✅ شما برنده شدید.

🔢 عدد خروجی این دست : $zaribnahayee
🔘 نوع انتخابی شما : کمتر از 50
🎖 مبلغ شرط : $text
🔆 سود شما : $mojodibarandehshodeshe

🎗 سود خالص : $text
",

            ]);
}
            else{
    $mojsaveshodesh = json_decode(file_get_contents("data/$from_id/$from_id.json"),true);
$mojoditarafshart = $mojsaveshodesh["coin"];
$mojjazizesh = $mojoditarafshart - $text;
$mojsaveshodesh["coin"] = $mojjazizesh;
$outjson = json_encode($mojsaveshodesh,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
		SendMessage($chat_id,"🚫 متاسفانه شما باختید دوست عزیز.

🔢 عدد خروجی این دست : $zaribnahayee
🔘 نوع انتخابی شما : کمتر از 50
🎖 مبلغ شرط : $text

⭕️ مقدار باخت : $text");
	}
}}
if($text == "🎱 پیشبینی عدد دقیق" and $tc == 'private'){
$datas["step"] = "roletdaghigh";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("data/$chat_id/noerobotmorednazar.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"💰مقدار موجودی که میخواید شرط ببندید را ارسال نمایید.",
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
	if ($step == "roletdaghigh" and $text != "$backsinza") {
    if(preg_match("/^(-){0,1}([0-9]+)(,[0-9][0-9][0-9])*([.][0-9]){0,1}([0-9]*)$/",$text)){
        file_put_contents("data/$chat_id/meghdarsharmonti.txt",$text);
        $meghdarsharmonti = file_get_contents("data/$from_id/meghdarsharmonti.txt");
        $coinshomahastesh = $datas["coin"];
    if ($text >= $coinshomahastesh) {
        bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"🚫 موجودی شما متاسفانه کافی نیست.",
]); 
exit();
}
    $nak = rand(00,36);
    file_put_contents("data/$from_id/zariboftadeshode.txt","$nak");
    $zariboftadeshode = file_get_contents("data/$from_id/zariboftadeshode.txt");
    $zarivdahomeshe = file_get_contents("data/$from_id/zaribsadomsh.txt");
$tedadtarkhastishes = file_get_contents("data/$from_id/tedadtarkhastishes.txt");
$zaribnahayee = "$zariboftadeshode";
if($text == $zaribnahayee){
    $datas["step"] = "none";
$datas12345612 = json_decode(file_get_contents("data/$chat_id/$chat_id.json"),true);
$invite122 = $datas12345612["coin"];
settype($invite122,"integer");
$mojodibarandehshodeshe = $text * 10;
$newmojbet = $invite122 + $mojodibarandehshodeshe;
$datas12345612["coin"] = $newmojbet;
$outjson = json_encode($datas12345612,true);
file_put_contents("data/$chat_id/$chat_id.json",$outjson);
bot('sendMessage', [
'chat_id' => $chat_id,
'text' => "✅ شما برنده شدید دوست عزیز.

🔱 عدد خارج شده از این دست : $zaribnahayee

💥 نوع انتخابی شما : پیشبینی عدد دقیق

💰 مبلغ شرط : $text

🎊سود شما از این دست : $mojodibarandehshodeshe

💎سود خالص این دستتون : $mojodibarandehshodeshe
",

            ]);
}
            else{
    $mojsaveshodesh = json_decode(file_get_contents("data/$from_id/$from_id.json"),true);
$mojoditarafshart = $mojsaveshodesh["coin"];
$mojjazizesh = $mojoditarafshart - $text;
$mojsaveshodesh["coin"] = $mojjazizesh;
$outjson = json_encode($mojsaveshodesh,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
		SendMessage($chat_id,"🚫 متاسفانه باختی عزیزم.

⭕️ عدد خارج شده از این دست : $zaribnahayee

‼️ نوع انتخابی شما : تشخیص عدد دقیق

💰 مبلغ شرط : $text

❌ مقدار مبلغ باخته شده : $text");
	}
}}
if($text == "🎱 پیشبینی عدد 0 الی 12" and $tc == 'private'){
$datas["step"] = "rolet012";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("data/$chat_id/noerobotmorednazar.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"💰مقدار موجودی که میخواید شرط ببندید را ارسال نمایید.",
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
	if ($step == "rolet012" and $text != "$backsinza") {
    if(preg_match("/^(-){0,1}([0-9]+)(,[0-9][0-9][0-9])*([.][0-9]){0,1}([0-9]*)$/",$text)){
        file_put_contents("data/$chat_id/meghdarsharmonti.txt",$text);
        $meghdarsharmonti = file_get_contents("data/$from_id/meghdarsharmonti.txt");
        $coinshomahastesh = $datas["coin"];
    if ($text >= $coinshomahastesh) {
        bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"🚫 موجودی شما متاسفانه کافی نیست.",
]); 
exit();
}
    $nak = rand(00,36);
    file_put_contents("data/$from_id/zariboftadeshode.txt","$nak");
    $zariboftadeshode = file_get_contents("data/$from_id/zariboftadeshode.txt");
    $zarivdahomeshe = file_get_contents("data/$from_id/zaribsadomsh.txt");
$tedadtarkhastishes = file_get_contents("data/$from_id/tedadtarkhastishes.txt");
$zaribnahayee = "$zariboftadeshode";
if(12 >= $zaribnahayee){
    $datas["step"] = "none";
$datas12345612 = json_decode(file_get_contents("data/$chat_id/$chat_id.json"),true);
$invite122 = $datas12345612["coin"];
settype($invite122,"integer");
$mojodibarandehshodeshe = $text * 2;
$newmojbet = $invite122 + $text;
$datas12345612["coin"] = $newmojbet;
$outjson = json_encode($datas12345612,true);
file_put_contents("data/$chat_id/$chat_id.json",$outjson);
bot('sendMessage', [
'chat_id' => $chat_id,
'text' => "✅ شما برنده شدید دوست عزیز.

🔱 عدد خارج شده از این دست : $zaribnahayee

💥 نوع انتخابی شما : عدد بین 0 تا 12

💰 مبلغ شرط : $text

🎊سود شما از این دست : $mojodibarandehshodeshe

💎سود خالص این دستتون : $text
",

            ]);
}
            else{
    $mojsaveshodesh = json_decode(file_get_contents("data/$from_id/$from_id.json"),true);
$mojoditarafshart = $mojsaveshodesh["coin"];
$mojjazizesh = $mojoditarafshart - $text;
$mojsaveshodesh["coin"] = $mojjazizesh;
$outjson = json_encode($mojsaveshodesh,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
		SendMessage($chat_id,"🚫 متاسفانه باختی عزیزم.

⭕️ عدد خارج شده از این دست : $zaribnahayee

⏳ نوع انتخابی شما : عدد بین 0 الی 12

💰 مبلغ شرط : $text

❌ مقدار مبلغ باخته شده : $text");
	}
}}
if($text == "🎱 پیشبینی عدد 13 الی 36" and $tc == 'private'){
$datas["step"] = "rolet1336";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("data/$chat_id/noerobotmorednazar.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"💰مقدار موجودی که میخواید شرط ببندید را ارسال نمایید.",
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
	if ($step == "rolet1336" and $text != "$backsinza") {
    if(preg_match("/^(-){0,1}([0-9]+)(,[0-9][0-9][0-9])*([.][0-9]){0,1}([0-9]*)$/",$text)){
        file_put_contents("data/$chat_id/meghdarsharmonti.txt",$text);
        $meghdarsharmonti = file_get_contents("data/$from_id/meghdarsharmonti.txt");
        $coinshomahastesh = $datas["coin"];
    if ($text >= $coinshomahastesh) {
        bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"🚫 موجودی شما متاسفانه کافی نیست.",
]); 
exit();
}
    $nak = rand(00,36);
    file_put_contents("data/$from_id/zariboftadeshode.txt","$nak");
    $zariboftadeshode = file_get_contents("data/$from_id/zariboftadeshode.txt");
    $zarivdahomeshe = file_get_contents("data/$from_id/zaribsadomsh.txt");
$tedadtarkhastishes = file_get_contents("data/$from_id/tedadtarkhastishes.txt");
$zaribnahayee = "$zariboftadeshode";
if($zaribnahayee >= 13){
    $datas["step"] = "none";
$datas12345612 = json_decode(file_get_contents("data/$chat_id/$chat_id.json"),true);
$invite122 = $datas12345612["coin"];
settype($invite122,"integer");
$mojodibarandehshodeshe = $text * 2;
$newmojbet = $invite122 + $text;
$datas12345612["coin"] = $newmojbet;
$outjson = json_encode($datas12345612,true);
file_put_contents("data/$chat_id/$chat_id.json",$outjson);
bot('sendMessage', [
'chat_id' => $chat_id,
'text' => "✅ شما برنده شدید دوست عزیز.

🔱 عدد خارج شده از این دست : $zaribnahayee

💥 نوع انتخابی شما : عدد بین 13 تا 36

💰 مبلغ شرط : $text

🎊سود شما از این دست : $mojodibarandehshodeshe

💎سود خالص این دستتون : $text
",

            ]);
}
            else{
    $mojsaveshodesh = json_decode(file_get_contents("data/$from_id/$from_id.json"),true);
$mojoditarafshart = $mojsaveshodesh["coin"];
$mojjazizesh = $mojoditarafshart - $text;
$mojsaveshodesh["coin"] = $mojjazizesh;
$outjson = json_encode($mojsaveshodesh,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
		SendMessage($chat_id,"🚫 متاسفانه باختی عزیزم.

⭕️ عدد خارج شده از این دست : $zaribnahayee

⏳ نوع انتخابی شما : عدد بین 13 الی 36

💰 مبلغ شرط : $text

❌ مقدار مبلغ باخته شده : $text");
	}
}}
if($text == "$bar2" and $tc == 'private'){
$datas["step"] = "movings76556209";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("data/$chat_id/noerobotmorednazar.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"💰 مبلغ خود را وارد نمایید.",
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
if($step == "movings76556209" and $text != "/start" and $text != "$backsinza" and $text != "$chat_id" and $tc == 'private'){ 
if(preg_match("/^(-){0,1}([0-9]+)(,[0-9][0-9][0-9])*([.][0-9]){0,1}([0-9]*)$/",$text)){
 $textkarbarikon = (abs($text));
 file_put_contents("data/$chat_id/tedadtarkhastishes.txt",$text);
        file_put_contents("data/$chatid/sabtkasr.txt",$mmbrsabt22);
file_put_contents("data/$chatid/$chatid.json",$outjson);
        $datas1 = json_decode(file_get_contents("data/$chatid/$chatid.json"),true);
        
        
        $coinshomahastesh = $datas["coin"];
    if ($coinshomahastesh >= $text) {
$datas["step"] = "sbtadd";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
		SendMessage($chat_id,"🔢 بنظرت عدد روی چند میوفته ؟
❇️ توجه یک عدد بین 0 تا 6 بگید.");
        unlink("data/codesx/$text.txt");
	}else{
		SendMessage($chat_id,"❌ موجودی حساب شما برای این مقدار کافی نیست.");
	}
}}
if($text == "$bar1" and $tc == 'private'){
$datas["step"] = "sabtshartesh";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("data/$chat_id/noerobotmorednazar.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"💰 مبلغ شرط را ارسال نمایید لطفا.",
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
if($step == "sabtshartesh" and $text != "/start" and $text != "$backsinza" and $text != "$chat_id" and $tc == 'private'){ 
    if(preg_match("/^(-){0,1}([0-9]+)(,[0-9][0-9][0-9])*([.][0-9]){0,1}([0-9]*)$/",$text)){
 $textkarbarikon = (abs($text));
 file_put_contents("data/$chat_id/tedadtarkhastishes.txt",$text);
        file_put_contents("data/$chatid/sabtkasr.txt",$mmbrsabt11);
file_put_contents("data/$chatid/$chatid.json",$outjson);
        $datas1 = json_decode(file_get_contents("data/$chatid/$chatid.json"),true);
        
        
        $coinshomahastesh = $datas["coin"];
$coinniazs = $textkarbarikon * $mmbrsabt11;
    if ($coinshomahastesh >= $textkarbarikon) {
$datas["step"] = "seen2";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
		SendMessage($chat_id,"💣 ضریب خود را ارسال نمایید.");
        unlink("data/codesx/$text.txt");
	}else{
		SendMessage($chat_id,"❌ موجودی حساب شما برای این مقدار کافی نیست.");
	}
}}
if ($step == "seen2" and $text != "$backsinza") {
    if(preg_match("/^(-){0,1}([0-9]+)(,[0-9][0-9][0-9])*([.][0-9]){0,1}([0-9]*)$/",$text)){
        if($text >= 00.99 && $text <= 99.99){
    $gift = [0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0 , 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0 , 1 , 2 ,2 ,2 ,2 ,2 ,2 ,2 ,2 , 3 , 3, 3, 4, 4 , 3 , 2, 5, 7 , 9 , 10]; 
        $zaribavaki = $gift[array_rand($gift)];
    $nak = rand(1,2);
    file_put_contents("data/$from_id/zariboftadeshode.txt","$zaribavaki");
    $zariboftadeshode = file_get_contents("data/$from_id/zariboftadeshode.txt");
    $zaribsadomsh = rand(00,99);
    file_put_contents("data/$from_id/zaribsadomsh.txt","$zaribsadomsh");
    $zarivdahomeshe = file_get_contents("data/$from_id/zaribsadomsh.txt");
$tedadtarkhastishes = file_get_contents("data/$from_id/tedadtarkhastishes.txt");
$zaribnahayee = "$zariboftadeshode.$zarivdahomeshe";
if($zaribnahayee >= $text){
    
    $datas["step"] = "none";
$datas12345612 = json_decode(file_get_contents("data/$chat_id/$chat_id.json"),true);
$invite122 = $datas12345612["coin"];
settype($invite122,"integer");
$mojbordeshode = $tedadtarkhastishes * $text;
$mojbordaslis = $mojbordeshode - $tedadtarkhastishes;
$newmojbet = $invite122 + $mojbordaslis;
$datas12345612["coin"] = $newmojbet;
$outjson = json_encode($datas12345612,true);
file_put_contents("data/$chat_id/$chat_id.json",$outjson);
bot('sendMessage', [
'chat_id' => $chat_id,
'text' => "✅ شما با موفقیت برنده شدید.

💣 ضریب این دست : $zaribnahayee
📍ضریب انتخابی شما : $text
💰 مبلغ شرط :  $tedadtarkhastishes
💡مبلغ برنده شده شما : $mojbordeshode

🔆مقدار سود خالص این دست : $mojbordaslis
",

            ]);
}
            else{
    $mojsaveshodesh = json_decode(file_get_contents("data/$from_id/$from_id.json"),true);
$mojoditarafshart = $mojsaveshodesh["coin"];
$mojjazizesh = $mojoditarafshart - $tedadtarkhastishes;
$mojsaveshodesh["coin"] = $mojjazizesh;
$outjson = json_encode($mojsaveshodesh,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
		SendMessage($chat_id,"❌ متاسفانه شما باختید.

💣 ضریب این دست : $zaribnahayee
💡ضریب انتخابی شما : $text

💰 مبلغ باخته شده : $tedadtarkhastishes");
	}
}}}
if ($step == "sbtadd" and $text != "$backsinza") {
    if(preg_match("/^(-){0,1}([0-6]+)(,[0-6][0-6][0-6])*([.][0-6]){0,6}([0-6]*)$/",$text)){
    $nak = rand(0,6);
    file_put_contents("data/$from_id/zariboftadeshode.txt","$nak");
    $zariboftadeshode = file_get_contents("data/$from_id/zariboftadeshode.txt");
    $zarivdahomeshe = file_get_contents("data/$from_id/zaribsadomsh.txt");
$tedadtarkhastishes = file_get_contents("data/$from_id/tedadtarkhastishes.txt");
$zaribnahayee = "$zariboftadeshode";
if($zaribnahayee == $text){
    $datas["step"] = "none";
$datas12345612 = json_decode(file_get_contents("data/$chat_id/$chat_id.json"),true);
$invite122 = $datas12345612["coin"];
settype($invite122,"integer");
$mojbordeshode = $tedadtarkhastishes * 2;
$newmojbet = $invite122 + $tedadtarkhastishes;
$datas12345612["coin"] = $newmojbet;
$outjson = json_encode($datas12345612,true);
file_put_contents("data/$chat_id/$chat_id.json",$outjson);
bot('sendMessage', [
'chat_id' => $chat_id,
'text' => "✅ شما برنده شدید دوست عزیز.

💎 عدد خروجی این دست : $zaribnahayee
🔮 عدد پیشبینی شما : $text
💰مبلغ شرط : $tedadtarkhastishes
💡 مبلغ برنده شده شما : $mojbordeshode

💸 سود خالص این دست : $tedadtarkhastishes
",

            ]);
}
            else{
    $mojsaveshodesh = json_decode(file_get_contents("data/$from_id/$from_id.json"),true);
$mojoditarafshart = $mojsaveshodesh["coin"];
$mojjazizesh = $mojoditarafshart - $tedadtarkhastishes;
$mojsaveshodesh["coin"] = $mojjazizesh;
$outjson = json_encode($mojsaveshodesh,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
		SendMessage($chat_id,"❌ شما متاسفانه باختید.

💎 عدد خروجی این دست : $zaribnahayee
🔮 عدد پیشبینی شما : $text
💰مبلغ شرط : $tedadtarkhastishes
⭕️مبلغ باخت : $tedadtarkhastishes");
	}
}}
if($text == "$bar6" and $tc == 'private'){
$datas["step"] = "pooppols";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("data/$chat_id/noerobotmorednazar.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"💰 مبلغ خود را وارد نمایید.",
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
if ($step == "pooppols" and $text != "$backsinza") {
    $datas["step"] = "bazishoroshodshokhobase";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
    if(preg_match("/^(-){0,9}([0-9]+)(,[0-9][0-9][0-9])*([.][0-9]){0,9}([0-9]*)$/",$text)){
        $kosnago21 = [$poop1,$poop2,$poop3,$poop4,$poop5,$poop6]; 
        $sexsishodke = $kosnago21[array_rand($kosnago21)];
        $coinshomahastesh = $datas["coin"];
    if ($coinshomahastesh >= $text) {
        file_put_contents("data/$from_id/meghdarbazish.txt",$text);
        $mojal = json_decode(file_get_contents("data/$from_id/$from_id.json"),true);
$mojoditarafshart = $mojal["coin"];
$mojkos = $mojoditarafshart - $text;
$mojal["coin"] = $mojkos;
$outjson = json_encode($mojal,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
        
        file_put_contents("data/$from_id/bazi21kartaval.txt",$sexsishodke);
        $varaghavalesh = file_get_contents("data/$from_id/bazi21kartaval.txt");
bot('sendMessage', [
'chat_id' => $chat_id,
'text' => "
🎊 لطفا یکی از جعبه ها رو انتخاب نمایید و رو انتخاب خود دقت نمایید دوست عزیز.


",
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$sexsishodke
            ]);
}
        else{
		SendMessage($chat_id,"🚫 موجودی شما نا کافیست.");
		$datas["step"] = "none";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
	}
    }
}
elseif($data == "bordesh"){
    $chat_id = $update->callback_query->message->chat->id;
    $from_id = $update->callback_query->message->chat->id;
    $datas1["step"] = "free";
$outjson = json_encode($datas1,true);
file_put_contents("data/$chatid/$chatid.json",$outjson);
$varaghavalesh = file_get_contents("data/$from_id/meghdarbazish.txt");
$bordefuelesh = $varaghavalesh * 2;
$mojal = json_decode(file_get_contents("data/$from_id/$from_id.json"),true);
$mojoditarafshart = $mojal["coin"];
$mojkos = $mojoditarafshart + $varaghavalesh;
$mojal["coin"] = $mojkos;
$outjson = json_encode($mojal,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('deletemessage', [
'chat_id' => $chatid,
'message_id' => $message_id2,
]);
bot('sendMessage', [
'chat_id' => $chat_id,
'text' => "✅ شما با موفقیت برنده شدید دوست عزیز.

🤑 جعبه ای که شما انتخاب کردید پوپ بود.

💰 مبلغ شرط بسته شما : $varaghavalesh

🔥 کل سود شما : $bordefuelesh

💥 سود خالص این دست : $varaghavalesh",
'parse_mode'=>'MarkDown',
          'reply_markup'=>$menu1
            ]);
}
elseif($data == "bordk"){
    $chat_id = $update->callback_query->message->chat->id;
    $from_id = $update->callback_query->message->chat->id;
    $datas1["step"] = "free";
$outjson = json_encode($datas1,true);
file_put_contents("data/$chatid/$chatid.json",$outjson);
$varaghavalesh = file_get_contents("data/$from_id/meghdarbazish.txt");
$bordefuelesh = $varaghavalesh * 2;
$mojal = json_decode(file_get_contents("data/$from_id/$from_id.json"),true);
$mojoditarafshart = $mojal["coin"];
$mojkos = $mojoditarafshart + $varaghavalesh;
$mojal["coin"] = $mojkos;
$outjson = json_encode($mojal,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('deletemessage', [
'chat_id' => $chatid,
'message_id' => $message_id2,
]);
bot('sendMessage', [
'chat_id' => $chat_id,
'text' => "✅ شما با موفقیت برنده شدید دوست عزیز.

🤑 جعبه ای که شما انتخاب کردید پوپ بود.

💰 مبلغ شرط بسته شما : $varaghavalesh

🔥 کل سود شما : $bordefuelesh

💥 سود خالص این دست : $varaghavalesh",
'parse_mode'=>'MarkDown',
          'reply_markup'=>$menu1
            ]);
}

//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
elseif($data == "bakht"){
    $chat_id = $update->callback_query->message->chat->id;
    $from_id = $update->callback_query->message->chat->id;
    $datas1["step"] = "free";
$outjson = json_encode($datas1,true);
file_put_contents("data/$chatid/$chatid.json",$outjson);
$varaghavalesh = file_get_contents("data/$from_id/meghdarbazish.txt");
$bordefuelesh = $varaghavalesh * 2;
$mojal = json_decode(file_get_contents("data/$from_id/$from_id.json"),true);
$mojoditarafshart = $mojal["coin"];
$mojkos = $mojoditarafshart - $varaghavalesh;
$mojal["coin"] = $mojkos;
$outjson = json_encode($mojal,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('deletemessage', [
'chat_id' => $chatid,
'message_id' => $message_id2,
]);
bot('sendMessage', [
'chat_id' => $chat_id,
'text' => "❌ شما باختید متاسفانه.

⭕️ جعبه ای که باز کردید در ان پوپ نبود.

💰 مبلغ شرط بسته شما : $varaghavalesh

🔴 مقدار باخت شما : $varaghavalesh",
'parse_mode'=>'MarkDown',
          'reply_markup'=>$menu1
            ]);
}
elseif($data == "bakhtish"){
    $chat_id = $update->callback_query->message->chat->id;
    $from_id = $update->callback_query->message->chat->id;
    $datas1["step"] = "free";
$outjson = json_encode($datas1,true);
file_put_contents("data/$chatid/$chatid.json",$outjson);
$varaghavalesh = file_get_contents("data/$from_id/meghdarbazish.txt");
$bordefuelesh = $varaghavalesh * 2;
$mojal = json_decode(file_get_contents("data/$from_id/$from_id.json"),true);
$mojoditarafshart = $mojal["coin"];
$mojkos = $mojoditarafshart - $varaghavalesh;
$mojal["coin"] = $mojkos;
$outjson = json_encode($mojal,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('deletemessage', [
'chat_id' => $chatid,
'message_id' => $message_id2,
]);
bot('sendMessage', [
'chat_id' => $chat_id,
'text' => "❌ شما باختید متاسفانه.

⭕️ جعبه ای که باز کردید در ان پوپ نبود.

💰 مبلغ شرط بسته شما : $varaghavalesh

🔴 مقدار باخت شما : $varaghavalesh",
'parse_mode'=>'MarkDown',
          'reply_markup'=>$menu1
            ]);
}
elseif($data == "bakhi"){
    $chat_id = $update->callback_query->message->chat->id;
    $from_id = $update->callback_query->message->chat->id;
    $datas1["step"] = "free";
$outjson = json_encode($datas1,true);
file_put_contents("data/$chatid/$chatid.json",$outjson);
$varaghavalesh = file_get_contents("data/$from_id/meghdarbazish.txt");
$bordefuelesh = $varaghavalesh * 2;
$mojal = json_decode(file_get_contents("data/$from_id/$from_id.json"),true);
$mojoditarafshart = $mojal["coin"];
$mojkos = $mojoditarafshart - $varaghavalesh;
$mojal["coin"] = $mojkos;
$outjson = json_encode($mojal,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('deletemessage', [
'chat_id' => $chatid,
'message_id' => $message_id2,
]);
bot('sendMessage', [
'chat_id' => $chat_id,
'text' => "❌ شما باختید متاسفانه.

⭕️ جعبه ای که باز کردید در ان پوپ نبود.

💰 مبلغ شرط بسته شما : $varaghavalesh

🔴 مقدار باخت شما : $varaghavalesh",
'parse_mode'=>'MarkDown',
          'reply_markup'=>$menu1
            ]);
}
if($text == "$bar4" and $tc == 'private'){
$datas["step"] = "kos21s";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("data/$chat_id/noerobotmorednazar.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"💰 مبلغ خود را وارد نمایید.",
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
if ($step == "kos21s" and $text != "$backsinza") {
    $datas["step"] = "bazishoroshodshokhobase";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
    if(preg_match("/^(-){0,9}([0-9]+)(,[0-9][0-9][0-9])*([.][0-9]){0,9}([0-9]*)$/",$text)){
        $kosnago21 = [2 , 3 , 4, 6, 7, 8 , 9 , 10, 11]; 
        $sexsishodke = $kosnago21[array_rand($kosnago21)];
        $coinshomahastesh = $datas["coin"];
    if ($coinshomahastesh >= $text) {
        file_put_contents("data/$from_id/meghdarbazish.txt",$text);
        $mojal = json_decode(file_get_contents("data/$from_id/$from_id.json"),true);
$mojoditarafshart = $mojal["coin"];
$mojkos = $mojoditarafshart - $text;
$mojal["coin"] = $mojkos;
$outjson = json_encode($mojal,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
        
        file_put_contents("data/$from_id/bazi21kartaval.txt",$sexsishodke);
        $varaghavalesh = file_get_contents("data/$from_id/bazi21kartaval.txt");
bot('sendMessage', [
'chat_id' => $chat_id,
'text' => "
🃏 کارت که برای شما افتاد : $varaghavalesh
",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🃏 دریافت کارت"],['text'=>"🏦 بانکدار بازی"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
            ]);
}
        else{
		SendMessage($chat_id,"🚫 موجودی شما نا کافیست.");
		$datas["step"] = "none";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
	}
    }
}
if($text == "🃏 دریافت کارت" and $step == "bazishoroshodshokhobase"){
    $datas["step"] = "kart2bekesh";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
$kosnago21 = [2 , 3 , 4, 6, 7, 8 , 9 , 10, 11]; 
        $sexsishodke = $kosnago21[array_rand($kosnago21)];
        $varaghavalesh = file_get_contents("data/$from_id/bazi21kartaval.txt");
        file_put_contents("data/$from_id/kartghablish.txt",$varaghavalesh);
        $kartghadimish = file_get_contents("data/$from_id/kartghablish.txt");
unlink("data/$from_id/bazi21kartaval.txt");
        file_put_contents("data/$from_id/bazi21kartaval.txt",$sexsishodke);
        $karjadidesh = file_get_contents("data/$from_id/bazi21kartaval.txt");
        $kartalanmajmo = $kartghadimish + $karjadidesh;
        file_put_contents("data/$from_id/mojodialaneinbazikon.txt",$kartalanmajmo);
        if (21 >= $kartalanmajmo) {
bot('sendMessage', [
'chat_id' => $chat_id,
'text' => "
♠️ کارت بازی که برای شما از دسته ورق ها بیرون آمد: $kartalanmajmo
",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"♥️ دریافت کارت جدید"],['text'=>"🏦 بانکدار بازی"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])

            ]);
}
        else{
            $mojodishartbaste = file_get_contents("data/$from_id/meghdarbazish.txt");
		SendMessage($chat_id,"🚫 متاسفانه جمع کارت های شما بالای 21 شد و شما باختید.

⭕️ مجموع کارت های شما : $kartalanmajmo

❌ مقدار موجودی باخته شده : $mojodishartbaste");
		$datas["step"] = "none";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
	}}
if($text == "♥️ دریافت کارت جدید" and $step == "kart2bekesh"){
$kosnago21 = [2 , 3 , 4, 6, 7, 8 , 9 , 10, 11]; 
        $sexsishodke = $kosnago21[array_rand($kosnago21)];
        $kartghadimish = file_get_contents("data/$from_id/mojodialaneinbazikon.txt");
unlink("data/$from_id/bazi21kartaval.txt");
        file_put_contents("data/$from_id/bazi21kartaval.txt",$sexsishodke);
        $karjadidesh = file_get_contents("data/$from_id/bazi21kartaval.txt");
        $kartalanmajmo = $kartghadimish + $karjadidesh;
        file_put_contents("data/$from_id/mojodialaneinbazikon.txt",$kartalanmajmo);
        if (21 >= $kartalanmajmo) {
bot('sendMessage', [
'chat_id' => $chat_id,
'text' => "
♣️ مجموع کارت هایی که برای شما از دسته کارت ها بیرون امده است = $kartalanmajmo
",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"♥️ دریافت کارت جدید"],['text'=>"🏦 بانکدار بازی"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])

            ]);
}
        else{
            $mojodishartbaste = file_get_contents("data/$from_id/meghdarbazish.txt");
		SendMessage($chat_id,"🚫 متاسفانه جمع کارت های شما بالای 21 شد و شما باختید.

⭕️ مجموع کارت های شما : $kartalanmajmo

❌ مقدار موجودی باخته شده : $mojodishartbaste");
		$datas["step"] = "none";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
	}}
if($text == "🏦 بانکدار بازی"){
    if($step == "bazishoroshodshokhobase" or $step == "kart2bekesh" or $step ==  "kos21s"){
        $datas["step"] = "none";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
$kosnago21 = [17 , 18 , 19, 20, 21]; 
        $sexsishodke = $kosnago21[array_rand($kosnago21)];
file_put_contents("data/$from_id/bankdaredge.txt",$sexsishodke);
$bankdarast = file_get_contents("data/$from_id/bankdaredge.txt");
$kartdarafbazibanj = file_get_contents("data/$from_id/mojodialaneinbazikon.txt");
$mojodishartbaste = file_get_contents("data/$from_id/meghdarbazish.txt");
$mojbord = $mojodishartbaste * 2;
        if ($kartdarafbazibanj >= $bankdarast) {
            $mojal = json_decode(file_get_contents("data/$from_id/$from_id.json"),true);
$mojoditarafshart = $mojal["coin"];
$mojkos = $mojoditarafshart + $mojodishartbaste;
$mojal["coin"] = $mojkos;
$outjson = json_encode($mojal,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage', [
'chat_id' => $chat_id,
'text' => "
✅ شما برنده شدید.

🔰 مجموعه کارت های شما : $kartdarafbazibanj

❗️ مجموعه کارت بانکدار بازی : $bankdarast

💰 مقدار موجودی شرط بسته : $mojodishartbaste

💎 مقدار موجودی برنده شده : $mojbord
",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"$backsinza"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
            ]);
            exit();
}
        else{
            $mojodishartbaste = file_get_contents("data/$from_id/meghdarbazish.txt");
		SendMessage($chat_id,"🚫 متاسفانه جمع کارت های شما کمتر از یا برابر با کارت بانکدار بود.

🅱️ مجموع کارت بانکدار : $bankdarast

⭕️ مجموع کارت های شما : $kartdarafbazibanj

❌ مقدار موجودی باخته شده : $mojodishartbaste"
);
		$datas["step"] = "none";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
		exit();
	}}}
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
if($text == "$ro2" and $tc == 'private'){
$datas["step"] = "bardasht2";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("data/$chat_id/noerobotmorednazar.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"♻️ مقدار موجودی جهت برداشت را ارسال نمایید.",
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
if($step == "bardasht2" and $text != "/start" and $text != "$backsinza" and $text != "$chat_id" and $tc == 'private'){ 
    if(preg_match("/^(-){0,1}([0-9]+)(,[0-9][0-9][0-9])*([.][0-9]){0,1}([0-9]*)$/",$text)){
 $textkarbarikon = (abs($text));
 file_put_contents("data/$chat_id/tedadtarkhastishes.txt",$text);
        file_put_contents("data/$chatid/sabtkasr.txt",$mmbrsabt11);
file_put_contents("data/$chatid/$chatid.json",$outjson);
        $datas1 = json_decode(file_get_contents("data/$chatid/$chatid.json"),true);
        
        
        $coinshomahastesh = $datas["coin"];
$coinniazs = $textkarbarikon * $mmbrsabt11;
    if ($coinshomahastesh >= $text) {
$datas["step"] = "none";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
		SendMessage($chat_id,"✅ برداشت شما با موفقیت انجام شد..");
		SendMessage($admin,"✅ برداشت جدیدی از ربات انجام شد.

💎 نوع ربات : $ro2

💰مقدار موجودی برداشت شده: $text

👤 عددی کاربر: $chat_id.");
        unlink("data/codesx/$text.txt");
	}else{
		SendMessage($chat_id,"❌ موجودی حساب شما برای این مقدار کافی نیست.");
	}
}}
if($text == "$ro1" and $tc == 'private'){
$datas["step"] = "bardasht1";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("data/$chat_id/noerobotmorednazar.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"♻️ مقدار موجودی جهت برداشت را ارسال نمایید.",
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
if($step == "bardasht1" and $text != "/start" and $text != "$backsinza" and $text != "$chat_id" and $tc == 'private'){ 
    if(preg_match("/^(-){0,1}([0-9]+)(,[0-9][0-9][0-9])*([.][0-9]){0,1}([0-9]*)$/",$text)){
 $textkarbarikon = (abs($text));
 file_put_contents("data/$chat_id/tedadtarkhastishes.txt",$text);
        file_put_contents("data/$chatid/sabtkasr.txt",$mmbrsabt11);
file_put_contents("data/$chatid/$chatid.json",$outjson);
        $datas1 = json_decode(file_get_contents("data/$chatid/$chatid.json"),true);
        
        
        $coinshomahastesh = $datas["coin"];
$coinniazs = $textkarbarikon * $mmbrsabt11;
    if ($coinshomahastesh >= $text) {
$datas["step"] = "none";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
		SendMessage($chat_id,"✅ برداشت شما با موفقیت انجام شد..");
		SendMessage($admin,"✅ برداشت جدیدی از ربات انجام شد.

💎 نوع ربات : $ro1

💰مقدار موجودی برداشت شده: $text

👤 عددی کاربر: $chat_id.");
        unlink("data/codesx/$text.txt");
	}else{
		SendMessage($chat_id,"❌ موجودی حساب شما برای این مقدار کافی نیست.");
	}
}}
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
elseif($text == "ارسال پیام 📨" and $tc == 'private'){
if ($chat_id == $admin){
$alluser = file_get_contents("data/ozvs.txt");
$alaki = explode("\n",$alluser);
$allusers = count($alaki);
$done = file_get_contents("data/done.txt");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>" ارسال پیام 📨

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

elseif($text == "💣 تنظیم شرط" and $tc == 'private'){	
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$alluser = file_get_contents("data/ozvs.txt");
$alaki = explode("\n",$alluser);
$allusers = count($alaki);
$done = file_get_contents("data/done.txt");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
📍یک گزینه را انتخاب نمایید📍
",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
            [['text'=>"🔱بخش ثبت شرط🔱", 'callback_data'=> 'kosnanatkomidacjw']],
    [['text'=>"👤نام پلن ها", 'callback_data'=> 'sinzanos']],
    [['text'=>"$bar1", 'callback_data'=> 'ozvname1']],
        [['text'=>"$bar2", 'callback_data'=> 'ozvname2']],
            [['text'=>"$bar3", 'callback_data'=> 'ozvname3']],
            [['text'=>"$bar4", 'callback_data'=> 'ozvname4']],
            [['text'=>"$bar5", 'callback_data'=> 'ozvname5']],
            [['text'=>"$bar6", 'callback_data'=> 'ozvname6']],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($text == "تنظیم فروشگاه🛒" and $tc == 'private'){
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
'inline_keyboard'=>[
    [['text'=>"🗂نام پلن ها",'callback_data'=> 'nonesickbyhaha'],['text'=>"🛒تنظیم قیمت ها",'callback_data'=> 'nonesickbyhaha']],
    [['text'=>"$mshopname1",'callback_data'=> 'm1shop'],['text'=>"$shopf1",'callback_data'=> 'g1shop']],
    [['text'=>"$mshopname2",'callback_data'=> 'm2shop'],['text'=>"$shopf2",'callback_data'=> 'g2shop']],
    [['text'=>"$mshopname3",'callback_data'=> 'm3shop'],['text'=>"$shopf3",'callback_data'=> 'g3shop']],
    [['text'=>"$mshopname4",'callback_data'=> 'm4shop'],['text'=>"$shopf4",'callback_data'=> 'g4shop']],
    [['text'=>"$mshopname5",'callback_data'=> 'm5shop'],['text'=>"$shopf5",'callback_data'=> 'g5shop']],
    [['text'=>"$mshopname6",'callback_data'=> 'm6shop'],['text'=>"$shopf6",'callback_data'=> 'g6shop']],
    [['text'=>"🛍لینک درگاه🛍",'callback_data'=> 'linkdaroz']],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($text == "تنظیم متن 💬" and $tc == 'private'){
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
    $alluser = file_get_contents("data/ozvs.txt");
$alaki = explode("\n",$alluser);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
🎈جهت ادامه یکی از دکمه شیشه ای کلیک نمایید🎈
",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
    [['text'=>"💎تنظیم متن قسمت بت زدن💎", 'callback_data'=> 'sinzanos']],
    [['text'=>"👤متن بت", 'callback_data'=> 'mtsefmt']],
        [['text'=>"📞تنظیم متن پشتیبانی☎️", 'callback_data'=> 'sinzanos']],
        [['text'=>"👨🏻‍💻متن پشتیبانی", 'callback_data'=> 'mtpomt'],['text'=>"🖲پیغام دریافت", 'callback_data'=> 'mtpimt']],
                [['text'=>"🤖 تنظیم متن ربات 🤖️", 'callback_data'=> 'sinzanos']],
                        [['text'=>"❌متن شارژ حساب", 'callback_data'=> 'mtghmt'],['text'=>"📚متن راهنما", 'callback_data'=> 'mtramt']],
                        [['text'=>"🎉متن کد هدیه", 'callback_data'=> 'mtcomt'],['text'=>"🔱متن جوین", 'callback_data'=> 'mtjomt']],
                                [['text'=>"☑️متن استارت", 'callback_data'=> 'mtesmt']],
                                        [['text'=>"🗃متن فروشگاه", 'callback_data'=> 'mtfomt'],['text'=>"📂متن پروفایل", 'callback_data'=> 'mthemt']],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($text == "مبادلات 🏦" and $tc == 'private'){
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
    $alluser = file_get_contents("data/ozvs.txt");
$alaki = explode("\n",$alluser);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
♦️گزینه مورد نظر خود را انتخاب نمایید♦️
",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
    [['text'=>"💰تنظیم ارز ربات💰️",'callback_data'=> 'sinzbrofuck']],
    [['text'=>"$almasbot", 'callback_data'=> 'namearz'],['text'=>"✅نام ارز️",'callback_data'=> 'sinzbrofuck']],
    [['text'=>"$almasboticon", 'callback_data'=> 'iconarz'],['text'=>"♣️ایکون ارز️",'callback_data'=> 'sinzbrosuck']],
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
elseif($text == "تنظیم زیرمجموعه 🎉" and $tc == 'private'){
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
    $alluser = file_get_contents("data/ozvs.txt");
$alaki = explode("\n",$alluser);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
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
elseif($text == "بخش تنظیمات ⚙️" and $tc == 'private'){	
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$alluser = file_get_contents("data/ozvs.txt");
$alaki = explode("\n",$alluser);
$allusers = count($alaki);
$done = file_get_contents("data/done.txt");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"✅گزینه مورد نظر خود را جهت تنظیم انتخاب نمایید.
",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
            [['text'=>"💡متن خاموشی ربات💡️️️", 'callback_data'=> 'mtkhambotur']],
    [['text'=>"🔊روشن کردن", 'callback_data'=> 'roshbotur'],['text'=>"🔇خاموش کردن️",'callback_data'=> 'khambotur']],
        [['text'=>"💡متن خاموشی ربات💡️️️", 'callback_data'=> 'mtkhambotur']],
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
elseif($text == "چیدمان 🌐" and $tc == 'private'){
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
'inline_keyboard'=>[
[['text'=>"1: $line11", 'callback_data'=> 'line11s'],['text'=>"2: $line12️",'callback_data'=> 'line12s'],['text'=>"3: $line13", 'callback_data'=> 'linesi'],['text'=>"4: $line14",'callback_data'=> 'line14s']],
[['text'=>"5: $line21", 'callback_data'=> 'line21s'],['text'=>"6: $line22️",'callback_data'=> 'line22s'],['text'=>"7: $line23", 'callback_data'=> 'line23s'],['text'=>"8: $line24",'callback_data'=> 'line24s']],
[['text'=>"9: $line31", 'callback_data'=> 'line31s'],['text'=>"10: $line32️",'callback_data'=> 'line32s'],['text'=>"11: $line33", 'callback_data'=> 'line33s'],['text'=>"12: $line34",'callback_data'=> 'line34s']],
[['text'=>"13: $line41", 'callback_data'=> 'line41s'],['text'=>"14: $line42️",'callback_data'=> 'line42s'],['text'=>"15: $line43", 'callback_data'=> 'line43s'],['text'=>"16: $line44",'callback_data'=> 'line44s']],
[['text'=>"17: $line51", 'callback_data'=> 'line51s'],['text'=>"18: $line52️",'callback_data'=> 'line52s'],['text'=>"19: $line53", 'callback_data'=> 'line53s'],['text'=>"20: $line54",'callback_data'=> 'line54s']],
[['text'=>"21: $line61", 'callback_data'=> 'line61s'],['text'=>"22: $line62️",'callback_data'=> 'line62s'],['text'=>"23: $line63", 'callback_data'=> 'line63s'],['text'=>"24: $line64",'callback_data'=> 'line64s']],
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
elseif($text == "تنظیم کانال 🆔" and $tc == 'private'){
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"قصد تنظیم کدام کانال را دارید؟

⚠️توجه⚠️
1️⃣پس از تنظیم کانال ها حتما متن جوین را تنظیم کنید .
2️⃣ربات ادمین هر دو کانال باشه .
",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
    [['text'=>"🎁کانال کد هدیه🎁", 'callback_data'=> 'chacodehed']],
    [['text'=>"⚙️کانال اطلاع رسانی", 'callback_data'=> 'chaetela']],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($text == "راهنما 🆘" and $tc == 'private'){
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"🚫 این ربات کاملا برای خود شماست و هیچ ارتباطی با اکوا کریت ندارد!
⭕️ هر گونه کلاهبرداری ..... باعث مسدودیت ربات شما میشود.
",
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$button_manage
]); 
}}
elseif($text == "باقی مانده اشتراک ❗️" and $tc == 'private'){	
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "none";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"تا پایان اشتراک شما $day روز باقی مانده است ✅",
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
elseif($text == "آمار ربات 📈" and $tc == 'private'){
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"آمار ربات 📈

👤کاربران:تعداد کاربرانی که ربات شما رو استارت کردند.

💌گزینه مورد نظر را انتخاب نمایید💌
",
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$amardok
]); 
}}
elseif($text == "ادمین ها 👤" and $tc == 'private'){	
if ($chat_id == $admin){
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
elseif($text == "ادمین ها 👤" and $tc == 'private'){	
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
elseif($text == "دکمه ها 🔰" and $tc == 'private'){	
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$alluser = file_get_contents("data/ozvs.txt");
$alaki = explode("\n",$alluser);
$allusers = count($alaki);
$done = file_get_contents("data/done.txt");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
💎به بخش تنظیم دکمه های ربات خوش اومدید💎

✅جهت تنظیم هر دکمه ای روی ان کلیک کنید و سپس تنظیم کنید.
📞درصورت درخواست حذف دکمه بهتر است نام تمام دکمه ها را درست کنید و دکمه هایی که نمیخواید کار کنند یک اسم بسیار زیاد و گنگ بزنید و وقتی میخواید نمایش داده شود در قسمت چیدمان ربات تنظیم کنید.

🎁یک بخش را انتخاب نمایید🎁
",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
    [['text'=>"دکمه بازگشت", 'callback_data'=> "backbut"],['text'=>"$dok0",'callback_data'=> 'pigsef']],
    [['text'=>"$mrsinzaips",'callback_data'=> 'mrsinzais']],
    [['text'=>"$dok2", 'callback_data'=> 'heska'],['text'=>"$dok6",'callback_data'=> 'zirshe']],
    [['text'=>"$dok4", 'callback_data'=> 'sefshe'],['text'=>"$dok3",'callback_data'=> 'ghavshe']],
    [['text'=>"$dok5", 'callback_data'=> 'forshe'],['text'=>"$dok8",'callback_data'=> 'rahshe']],
    [['text'=>"$dok13", 'callback_data'=> 'enshe'],['text'=>"$dok12",'callback_data'=> 'codeshe']],
    [['text'=>"$dok44", 'callback_data'=> 'poshshe'],['text'=>"",'callback_data'=> 'bardok']],
    [['text'=>"تنظیم بخش برداشت", 'callback_data'=> 'none']],
    [['text'=>"$ro3", 'callback_data'=> 'ro3s']],
    [['text'=>"$ro2", 'callback_data'=> 'ro2s'],['text'=>"$ro1",'callback_data'=> 'ro1s']],
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
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
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
elseif($data == "barshe"){
    $chat_id = $update->callback_query->message->chat->id;
    $from_id = $update->callback_query->message->chat->id;
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "starttext679119";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"نام جدید دکمه  دارای $almasbot را ارسال نمایید

نام فعلی : $dok997",
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
elseif($step == "starttext679119" and $text != "🔝ورود به پنل مدیریت🔝" and $tc == 'private' and $tc == 'private'){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("data/dok997.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"با موفقیت تنظیم شد

نام جدید : $text",
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$button_manage
]); 
}
}
elseif($data == "sabsheb"){
    $chat_id = $update->callback_query->message->chat->id;
    $from_id = $update->callback_query->message->chat->id;
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "starttext679112";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"نام جدید دکمه  دریافت موجودی را ارسال نمایید

نام فعلی : $dok999",
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
elseif($step == "starttext679112" and $text != "🔝ورود به پنل مدیریت🔝" and $tc == 'private' and $tc == 'private'){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("data/dok999.txt",$text);
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
elseif($data == "mrsinzais"){
    $chat_id = $update->callback_query->message->chat->id;
    $from_id = $update->callback_query->message->chat->id;
  if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
    $datas["step"] = "mrstarter66";
    $outjson = json_encode($datas,true);
    file_put_contents("data/$from_id/$from_id.json",$outjson);
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"دکمه افزایش موجودی را ارسال کنید
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
elseif($step == "mrstarter66" and $text != "🔝ورود به پنل مدیریت🔝" and $tc == 'private'){
  $datas["step"] = "none";
  $outjson = json_encode($datas,true);
  file_put_contents("data/$from_id/$from_id.json",$outjson);
  if($text == '0'){
    unlink("mrsinzaips.txt");
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
    file_put_contents("mrsinzaips.txt",$text);
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
unlink("dok0.txt");
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
file_put_contents("dok0.txt",$text);
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
'text'=>"دکمه ثبت شرط جدید را ارسال کنید
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
'text'=>"دکمه ثبت شرط جدید با موفقیت حذف شد.",
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
elseif($data == "line11s"){
        $chat_id = $update->callback_query->message->chat->id;
    $from_id = $update->callback_query->message->chat->id;
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
elseif($data == "line12s"){
    $chat_id = $update->callback_query->message->chat->id;
    $from_id = $update->callback_query->message->chat->id;
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
elseif($data == "linesi"){
    $chat_id = $update->callback_query->message->chat->id;
    $from_id = $update->callback_query->message->chat->id;
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
elseif($data == "line14s"){
    $chat_id = $update->callback_query->message->chat->id;
    $from_id = $update->callback_query->message->chat->id;
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
    $datas["step"] = "line14by";
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
elseif($step == "line14by" and $text != "🔝ورود به پنل مدیریت🔝" and $tc == 'private'){
  $datas["step"] = "none";
  $outjson = json_encode($datas,true);
  file_put_contents("data/$from_id/$from_id.json",$outjson);
  if($text == '0'){
    unlink("line14.txt");
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"دکمه لاین 4 موفقیت حذف شد.",
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
    file_put_contents("line14.txt",$text);
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>" $text تنظیم شد.",
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$button_manage
]);
  }
}
elseif($data == "line21s"){
    $chat_id = $update->callback_query->message->chat->id;
    $from_id = $update->callback_query->message->chat->id;
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
elseif($data == "line22s"){
    $chat_id = $update->callback_query->message->chat->id;
    $from_id = $update->callback_query->message->chat->id;
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
elseif($data == "line23s"){
    $chat_id = $update->callback_query->message->chat->id;
    $from_id = $update->callback_query->message->chat->id;
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
elseif($data == "line24s"){
    $chat_id = $update->callback_query->message->chat->id;
    $from_id = $update->callback_query->message->chat->id;
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
elseif($data == "line31s"){
    $chat_id = $update->callback_query->message->chat->id;
    $from_id = $update->callback_query->message->chat->id;
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

elseif($data == "line32s"){
    $chat_id = $update->callback_query->message->chat->id;
    $from_id = $update->callback_query->message->chat->id;
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
elseif($data == "line33s"){
    $chat_id = $update->callback_query->message->chat->id;
    $from_id = $update->callback_query->message->chat->id;
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
elseif($data == "line34s"){
    $chat_id = $update->callback_query->message->chat->id;
    $from_id = $update->callback_query->message->chat->id;
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
elseif($data == "line41s"){
    $chat_id = $update->callback_query->message->chat->id;
    $from_id = $update->callback_query->message->chat->id;
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
elseif($data == "line42s"){
    $chat_id = $update->callback_query->message->chat->id;
    $from_id = $update->callback_query->message->chat->id;
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


elseif($data == "line43s"){
    $chat_id = $update->callback_query->message->chat->id;
    $from_id = $update->callback_query->message->chat->id;
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
elseif($data == "line44s"){
    $chat_id = $update->callback_query->message->chat->id;
    $from_id = $update->callback_query->message->chat->id;
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
elseif($data == "line51s"){
    $chat_id = $update->callback_query->message->chat->id;
    $from_id = $update->callback_query->message->chat->id;
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
elseif($data == "line52s"){
    $chat_id = $update->callback_query->message->chat->id;
    $from_id = $update->callback_query->message->chat->id;
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
elseif($data == "line53s"){
    $chat_id = $update->callback_query->message->chat->id;
    $from_id = $update->callback_query->message->chat->id;
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
elseif($data == "line54s"){
    $chat_id = $update->callback_query->message->chat->id;
    $from_id = $update->callback_query->message->chat->id;
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
elseif($data == "line61s"){
    $chat_id = $update->callback_query->message->chat->id;
    $from_id = $update->callback_query->message->chat->id;
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
elseif($data == "line62s"){
    $chat_id = $update->callback_query->message->chat->id;
    $from_id = $update->callback_query->message->chat->id;
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
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
elseif($data == "line63s"){
    $chat_id = $update->callback_query->message->chat->id;
    $from_id = $update->callback_query->message->chat->id;
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
elseif($data == "line64s"){
    $chat_id = $update->callback_query->message->chat->id;
    $from_id = $update->callback_query->message->chat->id;
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
'text'=>"دکمه ثبت شرط را ارسال کنید
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
'text'=>"دکمه ثبت شرط با موفقیت حذف شد.",
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
'text'=>"دکمه شارژ حساب را ارسال کنید
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
'text'=>"دکمه شارژ حساب با موفقیت حذف شد.",
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
elseif($data == "ro3s"){
    $chat_id = $update->callback_query->message->chat->id;
    $from_id = $update->callback_query->message->chat->id;
  if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
    $datas["step"] = "ro3e";
    $outjson = json_encode($datas,true);
    file_put_contents("data/$from_id/$from_id.json",$outjson);
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"نام دکمه برداشت موجودی را ارسال نمایید.",
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
elseif($step == "ro3e" and $text != "🔝ورود به پنل مدیریت🔝" and $tc == 'private'){
  $datas["step"] = "none";
  $outjson = json_encode($datas,true);
  file_put_contents("data/$from_id/$from_id.json",$outjson);
  if($text == '0'){
    unlink("ro3s.txt");
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"برداشت موجودی تنظیم شد",
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
    file_put_contents("ro3.txt",$text);
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>" $text تنظیم شد.",
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$button_manage
]);
  }
}
elseif($data == "ro1s"){
    $chat_id = $update->callback_query->message->chat->id;
    $from_id = $update->callback_query->message->chat->id;
  if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
    $datas["step"] = "ro1e";
    $outjson = json_encode($datas,true);
    file_put_contents("data/$from_id/$from_id.json",$outjson);
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"نام دکمه برداشت موجودی را ارسال نمایید.",
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
elseif($step == "ro1e" and $text != "🔝ورود به پنل مدیریت🔝" and $tc == 'private'){
  $datas["step"] = "none";
  $outjson = json_encode($datas,true);
  file_put_contents("data/$from_id/$from_id.json",$outjson);
  if($text == '0'){
    unlink("ro1s.txt");
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"برداشت موجودی تنظیم شد",
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
    file_put_contents("ro1.txt",$text);
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>" $text تنظیم شد.",
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$button_manage
]);
  }
}
elseif($data == "ro2s"){
    $chat_id = $update->callback_query->message->chat->id;
    $from_id = $update->callback_query->message->chat->id;
  if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
    $datas["step"] = "ro2e";
    $outjson = json_encode($datas,true);
    file_put_contents("data/$from_id/$from_id.json",$outjson);
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"نام دکمه برداشت موجودی را ارسال نمایید.",
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
elseif($step == "ro2e" and $text != "🔝ورود به پنل مدیریت🔝" and $tc == 'private'){
  $datas["step"] = "none";
  $outjson = json_encode($datas,true);
  file_put_contents("data/$from_id/$from_id.json",$outjson);
  if($text == '0'){
    unlink("ro2s.txt");
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"برداشت موجودی تنظیم شد",
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
    file_put_contents("ro2.txt",$text);
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>" $text تنظیم شد.",
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
'text'=>"میزان موجودی پلان اول را ارسال نمایید

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
elseif($data == "m1shop"){
    $chat_id = $update->callback_query->message->chat->id;
    $from_id = $update->callback_query->message->chat->id;	
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
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$button_manage
]); 
}}
elseif($data == "m2shop"){
    $chat_id = $update->callback_query->message->chat->id;
    $from_id = $update->callback_query->message->chat->id;	
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
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$button_manage
]); 
}}
elseif($data == "m3shop"){
    $chat_id = $update->callback_query->message->chat->id;
    $from_id = $update->callback_query->message->chat->id;	
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
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$button_manage
]); 
}}
elseif($data == "m4shop"){
    $chat_id = $update->callback_query->message->chat->id;
    $from_id = $update->callback_query->message->chat->id;	
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
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$button_manage
]); 
}}
elseif($data == "m5shop"){
    $chat_id = $update->callback_query->message->chat->id;
    $from_id = $update->callback_query->message->chat->id;	
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
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$button_manage
]); 
}}
elseif($data == "m6shop"){
    $chat_id = $update->callback_query->message->chat->id;
    $from_id = $update->callback_query->message->chat->id;	
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
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$button_manage
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
'text'=>"قفل کانال روی کانال تنظیم شد.",
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
'text'=>"کانال کد هدیه (  ) تنظیم شد .

لطفا ربات را ادمین کانال ( ) کنید .
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
elseif($text == "کد هدیه 🎉" and $tc == 'private'){	
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
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
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
if ($chat_id == $admin) {
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
elseif($data == "ozvname6"){
$chat_id = $update->callback_query->message->chat->id;
    $from_id = $update->callback_query->message->chat->id;
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "ozvname6";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"لطفاً نام بخش ثبت شرط پلن 6 را ارسال کنید 🙏🏻
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
elseif($step == "ozvname6" and $text != "🔝ورود به پنل مدیریت🔝" and $tc == 'private'){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("bar6.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"تنظیم شد!",
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$button_manage
]); 
}}
elseif($data == "ozvname5"){
$chat_id = $update->callback_query->message->chat->id;
    $from_id = $update->callback_query->message->chat->id;
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "ozvname5";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"لطفاً نام بخش ثبت شرط پلن 5 را ارسال کنید 🙏🏻
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
elseif($step == "ozvname5" and $text != "🔝ورود به پنل مدیریت🔝" and $tc == 'private'){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("bar5.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"تنظیم شد!",
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$button_manage
]); 
}}
elseif($data == "ozvname4"){
$chat_id = $update->callback_query->message->chat->id;
    $from_id = $update->callback_query->message->chat->id;
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "ozvname4";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"لطفاً نام بخش ثبت شرط پلن 4 را ارسال کنید 🙏🏻
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
elseif($step == "ozvname4" and $text != "🔝ورود به پنل مدیریت🔝" and $tc == 'private'){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("bar4.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"تنظیم شد!",
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$button_manage
]); 
}}
elseif($data == "ozvnam"){
$chat_id = $update->callback_query->message->chat->id;
    $from_id = $update->callback_query->message->chat->id;
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "ozvnam";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"نام این بازی را ارسال نمایید
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
elseif($step == "ozvnam" and $text != "🔝ورود به پنل مدیریت🔝" and $tc == 'private'){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("bar4.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"تنظیم شد!",
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$button_manage
]); 
}}
elseif($data == "ozvname3"){
$chat_id = $update->callback_query->message->chat->id;
    $from_id = $update->callback_query->message->chat->id;
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "ozvname3";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"نام این بازی را ارسال نمایید
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
elseif($step == "ozvname3" and $text != "🔝ورود به پنل مدیریت🔝" and $tc == 'private'){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("bar3.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"تنظیم شد!",
'parse_mode'=>'MarkDown',
        	'reply_markup'=>$button_manage
]); 
}}
elseif($data == "ozvname2"){
$chat_id = $update->callback_query->message->chat->id;
    $from_id = $update->callback_query->message->chat->id;
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "ozvname2";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"لطفاً نام بخش ثبت شرط پلن 2 را ارسال کنید 🙏🏻
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
elseif($step == "ozvname2" and $text != "🔝ورود به پنل مدیریت🔝" and $tc == 'private'){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("bar2.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"تنظیم شد!",
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
'text'=>"لطفاً نام بخش ثبت شرط پلن 1 را ارسال کنید 🙏🏻
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
file_put_contents("bar1.txt",$text);
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
$datas["step"] = "mdok8";
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
elseif($step == "mdok8" and $text != "🔝ورود به پنل مدیریت🔝" and $tc == 'private'){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3 or $chat_id == $admin4 or $chat_id == $admin5) {
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("data/mdok8.txt",$text);
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
'text'=>"⭕️متن شارژ حساب را ارسال کنید :",
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
'text'=>"⭕️متن خاموشی ثبت شرط را ارسال کنید :",
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
'text'=>"⭕️متن ثبت شرط را ارسال کنید :",
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
elseif($data == "g6shop"){
    $chat_id = $update->callback_query->message->chat->id;
    $from_id = $update->callback_query->message->chat->id;	
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
elseif($data == "g5shop"){
    $chat_id = $update->callback_query->message->chat->id;
    $from_id = $update->callback_query->message->chat->id;	
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
elseif($data == "g4shop"){
    $chat_id = $update->callback_query->message->chat->id;
    $from_id = $update->callback_query->message->chat->id;		
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
elseif($data == "g3shop"){
    $chat_id = $update->callback_query->message->chat->id;
    $from_id = $update->callback_query->message->chat->id;	
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
elseif($data == "g2shop"){
    $chat_id = $update->callback_query->message->chat->id;
    $from_id = $update->callback_query->message->chat->id;	
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
elseif($data == "g1shop"){
    $chat_id = $update->callback_query->message->chat->id;
    $from_id = $update->callback_query->message->chat->id;	
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
elseif($data == "linkdaroz"){
    $chat_id = $update->callback_query->message->chat->id;
    $from_id = $update->callback_query->message->chat->id;
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
if ($chat_id == $admin) {
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
if ($chat_id == $admin) {
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
if ($chat_id == $admin) {
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
if ($chat_id == $admin) {
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
