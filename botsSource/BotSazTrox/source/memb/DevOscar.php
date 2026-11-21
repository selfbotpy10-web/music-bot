<?php
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
if (!$ok) die("destroyerhost");
$day = (2505600 - (time() - filectime('Mahdy'))) / 60 / 60 / 24;
$day = round($day, 0);
define('API_KEY','[*[TOKEN]*]');
date_default_timezone_set('Asia/Tehran');
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
function SendPhoto($chat_id, $link, $text) {
bot('SendPhoto', [
'chat_id' => $chat_id, 
'photo' => $link, 
'caption' => $text
]) ;
}
function sendmessage($chat_id, $text){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>$text,
'parse_mode'=>"html"
]);
}
function save($filename, $data)
{
$file = fopen($filename, 'w');
fwrite($file, $data);
fclose($file);
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
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
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$chat_id = $message->chat->id;
$text = $message->text;
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
$sudo = ['[*[ADMIN]*]','1100991740'];
$admin = "[*[ADMIN]*]";
$channel = "@[*[CHANNEL]*]";
$token = "[*[TOKEN]*]";
$timech = "60";
$blocklist = file_get_contents("data/blocklist.txt");
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
$ads = $datas["ads"];
$invcoin = $datas["invcoin"];
$date = date("Y-F-d");
if(file_exists("data/admin1.txt")){
$admin1 = file_get_contents("data/admin1.txt");
}else{
$admin1 = "[*[ADMIN]*]";
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
mkdir("data");
mkdir("ads");
if(strpos($text,"'") !== false or strpos($text,'"') !== false or strpos($text,"}") !== false or strpos($text,"{") !== false or strpos($text,")'") !== false or strpos($text,"(") !== false or strpos($text,",") !== false){ 
file_put_contents("data/$from_id/state.txt","none");
file_put_contents("data/$from_id/step.txt","none");
$list = file_get_contents('data/blocklist.txt');
$addus= $from_id . "\n";
file_put_contents("data/blocklist.txt", $addus);
$addus= $from_id . "\n";
  bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"
 به دلیل ارسال کلمه ، حروف ممنوعه از ربات بلاک شدید 🌹
 ",
 'parse_mode'=>"HTML",
  'reply_to_message_id'=>$message_id,
  ]); 
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
 'parse_mode'=>"MarkDown",
  ]); 
 }
elseif(strpos($blocklist, "$from_id") !== false ){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
شما به خاطر رعایت نکردن قوانین از ربات مسدود شدید. ❌

لطفا پیام ارسال نکنید.⚠️
",
'reply_markup'=>json_encode([
'remove_keyboard'=>true,
])
]);
exit();
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
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
if(file_exists("data/joinmcoin.txt")){
$joinmcoin = file_get_contents("data/joinmcoin.txt");
}else{
$joinmcoin = "10";
}
if(file_exists("data/mhiperm.txt")){
$mhiperm = file_get_contents("data/mhiperm.txt");
}else{
$mhiperm = "👤ممبر بگیر👤
👤ممبر بگیر👤
👤ممبر بگیر👤
👤ممبر بگیر👤
👤ممبر بگیر👤
👤ممبر بگیر👤
👤ممبر بگیر👤
👤ممبر بگیر👤
👤ممبر بگیر👤
👤ممبر بگیر👤
👤ممبر بگیر👤
👤ممبر بگیر👤
👤ممبر بگیر👤
👤ممبر بگیر👤
👤ممبر بگیر👤
👤ممبر بگیر👤
👤ممبر بگیر👤
👤ممبر بگیر👤
👤ممبر بگیر👤
👤ممبر بگیر👤
👤ممبر بگیر👤
👤ممبر بگیر👤
👤ممبر بگیر👤
👤ممبر بگیر👤
👤ممبر بگیر👤
👤ممبر بگیر👤
👤ممبر بگیر👤
👤ممبر بگیر👤
👤ممبر بگیر👤
👤ممبر بگیر👤
👤ممبر بگیر👤
👤ممبر بگیر👤
👤ممبر بگیر👤
👤ممبر بگیر👤
👤ممبر بگیر👤
👤ممبر بگیر👤
👤ممبر بگیر👤
👤ممبر بگیر👤
👤ممبر بگیر👤
👤ممبر بگیر👤
👤ممبر بگیر👤
👤ممبر بگیر👤";
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
$almasgett = "متن دریافت الماس رایگان تنظیم نشده است";
}
////////////////----///////////////
if(file_exists("data/ghavanin.txt")){
$ghavanin = file_get_contents("data/ghavanin.txt");
$ghavanin = str_replace('NAME',$first2,$ghavanin);
}else{
$ghavanin = "متن قوانین تنظیم نشده است";
}
///////////////-------///////
if(file_exists("data/invitecoin.txt")){
$invitecoin = file_get_contents("data/invitecoin.txt");
$invitecoin = str_replace('NAME',$first2,$invitecoin);
}else{
$invitecoin = "10";
}
///////////------//////////-----------////////
if(file_exists("data/mmbrsabt1.txt")){
$mmbrsabt1 = file_get_contents("data/mmbrsabt1.txt");
}else{
$mmbrsabt1 = "10";
}
///////////------//////////-----------////////
if(file_exists("data/mmbrsabt11.txt")){
$mmbrsabt11 = file_get_contents("data/mmbrsabt11.txt");
}else{
$mmbrsabt11 = "10";
}
///////////------//////////-----------////////
if(file_exists("data/mmbrsabt2.txt")){
$mmbrsabt2 = file_get_contents("data/mmbrsabt2.txt");
}else{
$mmbrsabt2 = "20";
}
///////////------//////////-----------////////
if(file_exists("data/mmbrsabt22.txt")){
$mmbrsabt22 = file_get_contents("data/mmbrsabt22.txt");
}else{
$mmbrsabt22 = "20";
}
///////////------//////////-----------////////
if(file_exists("data/mmbrsabt3.txt")){
$mmbrsabt3 = file_get_contents("data/mmbrsabt3.txt");
}else{
$mmbrsabt3 = "45";
}
///////////------//////////-----------////////
if(file_exists("data/mmbrsabt33.txt")){
$mmbrsabt33 = file_get_contents("data/mmbrsabt33.txt");
}else{
$mmbrsabt33 = "45";
}
///////////------//////////-----------////////
if(file_exists("data/mmbrsabt4.txt")){
$mmbrsabt4 = file_get_contents("data/mmbrsabt4.txt");
}else{
$mmbrsabt4 = "80";
}
///////////------//////////-----------////////
if(file_exists("data/mmbrsabt44.txt")){
$mmbrsabt44 = file_get_contents("data/mmbrsabt44.txt");
}else{
$mmbrsabt44 = "80";
}
///////////------//////////-----------////////
if(file_exists("data/mmbrsabt5.txt")){
$mmbrsabt5 = file_get_contents("data/mmbrsabt5.txt");
}else{
$mmbrsabt5 = "130";
}
///////////------//////////-----------////////
if(file_exists("data/mmbrsabt55.txt")){
$mmbrsabt55 = file_get_contents("data/mmbrsabt55.txt");
}else{
$mmbrsabt55 = "130";
}
///////////------//////////-----------////////
if(file_exists("data/mmbrsabt6.txt")){
$mmbrsabt6 = file_get_contents("data/mmbrsabt6.txt");
}else{
$mmbrsabt6 = "240";
}
///////////------//////////-----------////////
if(file_exists("data/mmbrsabt66.txt")){
$mmbrsabt66 = file_get_contents("data/mmbrsabt66.txt");
}else{
$mmbrsabt66 = "240";
}
///////////------//////////-----------////////
if(file_exists("data/mshopname1.txt")){
$mshopname1 = file_get_contents("data/mshopname1.txt");
}else{
$mshopname1 = "💎 50 الماس  | 2000 تومان 💵";
}
///////////------//////////-----------////////
if(file_exists("data/mshopname2.txt")){
$mshopname2 = file_get_contents("data/mshopname2.txt");
}else{
$mshopname2 = "💎 100 الماس  | 4000 تومان 💵";
}
///////////------//////////-----------////////
if(file_exists("data/mshopname3.txt")){
$mshopname3 = file_get_contents("data/mshopname3.txt");
}else{
$mshopname3 = "💎 200 الماس  | 8000 تومان 💵";
}
///////////------//////////-----------////////
if(file_exists("data/mshopname4.txt")){
$mshopname4 = file_get_contents("data/mshopname4.txt");
}else{
$mshopname4 = "💎 500 الماس  | 20000 تومان 💵";
}
///////////------//////////-----------////////
if(file_exists("data/mshopname5.txt")){
$mshopname5 = file_get_contents("data/mshopname5.txt");
}else{
$mshopname5 = "💎 1000 الماس  | 35000 تومان 💵";
}
///////////------//////////-----------////////
if(file_exists("data/mshopname6.txt")){
$mshopname6 = file_get_contents("data/mshopname6.txt");
}else{
$mshopname6 = "💎 2000 الماس  | 60000 تومان 💵";
}
///////////------//////////-----------////////
if(file_exists("data/mshoplink.txt")){
$mshoplink = file_get_contents("data/mshoplink.txt");
}else{
$mshoplink = "https://t.me/[ADMINID]";
}
///////////------//////////-----------////////
if(file_exists("data/dok1.txt")){
$dok1 = file_get_contents("data/dok1.txt");
}else{
$dok1 = "💎 دریافت الماس رایگان 💎";
}
///////////------//////////-----------////////
if(file_exists("data/dok2.txt")){
$dok2 = file_get_contents("data/dok2.txt");
}else{
$dok2 = "🖥  حساب کاربری";
}
///////////------//////////-----------////////
if(file_exists("data/dok3.txt")){
$dok3 = file_get_contents("data/dok3.txt");
}else{
$dok3 = "🚫قوانین🚫";
}
///////////------//////////-----------////////
if(file_exists("data/dok4.txt")){
$dok4 = file_get_contents("data/dok4.txt");
}else{
$dok4 = "👤سفارش ممبر";
}
///////////------//////////-----------////////
if(file_exists("data/dok5.txt")){
$dok5 = file_get_contents("data/dok5.txt");
}else{
$dok5 = "فروشگاه🛒";
}
///////////------//////////-----------////////
if(file_exists("data/dok6.txt")){
$dok6 = file_get_contents("data/dok6.txt");
}else{
$dok6 = "👥 زیر مجموعه گیری";
}
///////////------//////////-----------////////
if(file_exists("data/dok7.txt")){
$dok7 = file_get_contents("data/dok7.txt");
}else{
$dok7 = "برترین ها🏆";
}
///////////------//////////-----------////////
if(file_exists("data/dok8.txt")){
$dok8 = file_get_contents("data/dok8.txt");
}else{
$dok8 = "";
}
///////////------//////////-----------////////
if(file_exists("data/dok12.txt")){
$dok12 = file_get_contents("data/dok12.txt");
}else{
$dok12 = "🎁 کد هدیه";
}
///////////------//////////-----------////////
if(file_exists("data/dok13.txt")){
$dok13 = file_get_contents("data/dok13.txt");
}else{
$dok13 = "💳 بانک انتقال";
}
///////////------//////////-----------////////
if(file_exists("data/dokc1.txt")){
$dokc1 = file_get_contents("data/dokc1.txt");
}else{
$dokc1 = "👥ورود به کانال👥";
}
///////////------//////////-----------////////
if(file_exists("data/dokc2.txt")){
$dokc2 = file_get_contents("data/dokc2.txt");
}else{
$dokc2 = "عضو شدم ✅";
}
///////////------//////////-----------////////
if(file_exists("data/dokc3.txt")){
$dokc3 = file_get_contents("data/dokc3.txt");
}else{
$dokc3 = "";
}
///////////------//////////-----------////////
if(file_exists("data/dokc4.txt")){
$dokc4 = file_get_contents("data/dokc4.txt");
}else{
$dokc4 = "";
}
///////////------//////////-----------////////
if(file_exists("data/dokc5.txt")){
$dokc5 = file_get_contents("data/dokc5.txt");
}else{
$dokc5 = "";
}
///////////------//////////-----------////////
if(file_exists("data/dokc6.txt")){
$dokc6 = file_get_contents("data/dokc6.txt");
}else{
$dokc6 = "👈👈ورود به ربات ممبرگیر👉👉";
}
///////////------//////////-----------////////
if(file_exists("data/dokday.txt")){
$dokday = file_get_contents("data/dokday.txt");
}else{
$dokday = "الماس روزانه💎";
}
///////////------//////////-----------////////
if(file_exists("data/mdaily.txt")){
$mdaily = file_get_contents("data/mdaily.txt");
}else{
$mdaily = "5";
}
///////////------//////////-----------////////
if(file_exists("data/dokchannel.txt")){
$dokchannel = file_get_contents("data/dokchannel.txt");
}else{
$dokchannel = "عضویت در کانال👤";
}
///////////------//////////-----------////////
if(file_exists("data/dokchannel2.txt")){
$dokchannel2 = file_get_contents("data/dokchannel2.txt");
$dokchannel2 = str_replace('NAME',$first,$dokchannel2);
$dokchannel2 = str_replace('LAST',$last,$dokchannel2);
$dokchannel2 = str_replace('USER',$username,$dokchannel2);
$dokchannel2 = str_replace('ID',$from_id,$dokchannel2);
}else{
$dokchannel2 = "متن جمع آوری در کانال تنظیم نشده است";
}
///////////------//////////-----------////////
if(file_exists("data/piclink.txt")){
$piclink = file_get_contents("data/piclink.txt");
}else{
$piclink = "http://s2.picofile.com/file/8372103468/member_icon_8_jpg.png️";
}
///////////------//////////-----------////////
if(file_exists("data/shoptext.txt")){
$shoptext = file_get_contents("data/shoptext.txt");
$shoptext = str_replace('NAME',$first,$shoptext);
$shoptext = str_replace('LAST',$last,$shoptext);
$idbot = "[*[USERNAME]*]";
$shoptext = str_replace('ID',$chat_id,$shoptext);
}else{
$shoptext = "متن فروشگاه تنظیم نشده است";
}
$sup = "https://t.me/[*[CHANNEL]*]";
$dar = "درگاه پرداخت";
$chads = "[*[CHANNEL]*]";
$chor = file_get_contents("data/ch.txt");
$channels = json_decode(file_get_contents("https://api.telegram.org/bot[*[TOKEN]*]/getChatMember?chat_id=@$chor&user_id=".$from_id or $chatid));
$to = $channels->result->status;
$reply = $update->message->reply_to_message->forward_from->id;
if(!empty($from_id) and $text == $dok4){
$hhhh = explode("\n",file_get_contents("data/$from_id/channels.txt"));
foreach($hhhh as $chaaa){
     if( $chaaa != "" and $chaaa != "raf" and $text == $dok4){
 $channels5555 = json_decode(file_get_contents("https://api.telegram.org/bot[*[TOKEN]*]/getChatMember?chat_id=$chaaa&user_id=$from_id"));
 $tod5555 = $channels5555->result->status;
 if($tod5555 != 'member' && $tod5555 != 'creator' && $tod5555 != 'administrator' and $text == $dok4){
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
دو الماس از شما کسر شد"
]);
}
}
}
}
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
if(strpos($text == "/start") !== false  && $text !=="/start"){
$id=str_replace("/start ","",$text);
$amar=file_get_contents("data/ozvs.txt");
$exp=explode("\n",$amar);
if(!in_array($from_id,$exp) && $from_id != $id){
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
'text'=>"☑️🎊یک نفر با لینک شما وارد ربات شد

🎈$invitecoin الماس به حساب شما واریز شد و از هم اکنون $porsant الماس بابت عضویت کاربر در هر کانال به شما تعلق میگیرد
",
'parse_mode'=>"HTML",
]);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"$starttext
",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"$dok1"]],
[['text'=>"$dok2"],['text'=>"$dok3"],['text'=>"$dok4"]],
[['text'=>"$dok5"],['text'=>"$dok6"]],
[['text'=>"$dok7"],['text'=>"$dok8"]],
[['text'=>"$dok12"],['text'=>"$dok13"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"$invitecoin الماس به شما اضافه شد☑️",
'reply_to_message_id'=>$message_id,
]);
}
}
if(preg_match('/^\/([Cc][Rr][Ee][Aa][Tt][Oo][Rr])/',$text)){
bot ('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"@MiaCreateBot",
]);
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
if($text == "/start" or $text == "/start"){
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"$starttext
",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"$dok1"]],
[['text'=>"$dok2"],['text'=>"$dok3"],['text'=>"$dok4"]],
[['text'=>"$dok5"],['text'=>"$dok6"]],
[['text'=>"$dok7"],['text'=>"$dok8"]],
[['text'=>"$dok12"],['text'=>"$dok13"]],
[['text'=>"💎مدیریت💎"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}else{
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"$starttext
",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"$dok1"]],
[['text'=>"$dok2"],['text'=>"$dok3"],['text'=>"$dok4"]],
[['text'=>"$dok5"],['text'=>"$dok6"]],
[['text'=>"$dok7"],['text'=>"$dok8"]],
[['text'=>"$dok12"],['text'=>"$dok13"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($text == "باقی مانده اشتراک ❗️"){
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
تا پایان اشتراک شما $day روز باقی مانده است ✅
",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
]); 
}}
if($text == "بازگشت" or $text == "بازگشت"){
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"$starttext
",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"$dok1"]],
[['text'=>"$dok2"],['text'=>"$dok3"],['text'=>"$dok4"]],
[['text'=>"$dok5"],['text'=>"$dok6"]],
[['text'=>"$dok7"],['text'=>"$dok8"]],
[['text'=>"$dok12"],['text'=>"$dok13"]],
[['text'=>"💎مدیریت💎"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}else{
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"$starttext
",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"$dok1"]],
[['text'=>"$dok2"],['text'=>"$dok3"],['text'=>"$dok4"]],
[['text'=>"$dok5"],['text'=>"$dok6"]],
[['text'=>"$dok7"],['text'=>"$dok8"]],
[['text'=>"$dok12"],['text'=>"$dok13"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
//===hmdemon===//
if($text == "$dok7"){
$truechannel = json_decode(file_get_contents("https://api.telegram.org/bot$token/getChatMember?chat_id=$channel&user_id=$chat_id"));
$tch25 = $truechannel->result->status;
if($tch25 != 'member' && $tch25 != 'creator' && $tch25 != 'administrator'){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"⚠️ جهت ادامه کار نیاز است در کانال  عضو شوید.

1⃣ @[*[CHANNEL]*]

👈🏻 بعد از عضویت مجددا /start را ارسال نمایید.",
'disable_web_page_preview' => true,
'parse_mode'=>"HTML",
]);
}else{
SendMessage("$chat_id","⏳کمی صبر کنید");
$views = getRanks("inv");
$user_view_1 = $views[0]['user'];
$mojodi_view_1 = $views[0]['coins'];
$user_view_2 = $views[1]['user'];
$mojodi_view_2 = $views[1]['coins'];
$user_view_3 = $views[2]['user'];
$mojodi_view_3 = $views[2]['coins'];
$user_view_4 = $views[3]['user'];
$mojodi_view_4 = $views[3]['coins'];
$user_view_5 = $views[4]['user'];
$mojodi_view_5 = $views[4]['coins'];
$user_view_6 = $views[5]['user'];
$mojodi_view_6 = $views[5]['coins'];
$user_view_7 = $views[6]['user'];
$mojodi_view_7 = $views[6]['coins'];
$user_view_8 = $views[7]['user'];
$mojodi_view_8 = $views[7]['coins'];
$user_view_9 = $views[8]['user'];
$mojodi_view_9 = $views[8]['coins'];
$user_view_10 = $views[9]['user'];
$mojodi_view_10 = $views[9]['coins'];
SendMessage("$chat_id","👥برترین های زیرمجموعه گیری👥
🏆┄┅🅣🄾🅟┅┄🏆
🎖نفر اول : $user_view_1
📊 امتیاز:$mojodi_view_1
┄┅┄┅┄┄┅┄┅┄┄┅┄┅┄
🎖نفر دوم : $user_view_2
📊 امتیاز:$mojodi_view_2
┄┅┄┅┄┄┅┄┅┄┄┅┄┅┄
🎖نفر سوم : $user_view_3
📊 امتیاز:$mojodi_view_3
┄┅┄┅┄┄┅┄┅┄┄┅┄┅┄
🎖نفر چهارم : $user_view_4
📊 امتیاز:$mojodi_view_4
┄┅┄┅┄┄┅┄┅┄┄┅┄┅┄
🎖نفر پنجم : $user_view_5
📊 امتیاز:$mojodi_view_5
┄┅┄┅┄┄┅┄┅┄┄┅┄┅┄
🎖نفر ششم : $user_view_6
📊 امتیاز:$mojodi_view_6
┄┅┄┅┄┄┅┄┅┄┄┅┄┅┄
🎖نفر هفتم : $user_view_7
📊 امتیاز:$mojodi_view_7
┄┅┄┅┄┄┅┄┅┄┄┅┄┅┄
🎖نفر هشتم : $user_view_8
📊 امتیاز:$mojodi_view_8
┄┅┄┅┄┄┅┄┅┄┄┅┄┅┄
🎖نفر ششم : $user_view_9
📊 امتیاز:$mojodi_view_9
┄┅┄┅┄┄┅┄┅┄┄┅┄┅┄
🎖نفر دهم : $user_view_10
📊 امتیاز:$mojodi_view_10
┄┅┄┅┄┄┅┄┅┄┄┅┄┅┄
🆔 @[*[CHANNEL]*]");}}
//----------------------------
if($text == "$dok1"){
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"$almasgett",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"$dokchannel"],['text'=>"$dokday"]],
[['text'=>"بازگشت"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}
//----------------------------
if($text == "$dokchannel"){
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"$dokchannel2",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text' => "️💎ورود به کانال و دریافت الماس💎", 'url' => "https://t.me/$chads"]
],
]
])
]);
}
if($text == "$dok3"){
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"$ghavanin",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"$dok1"]],
[['text'=>"$dok2"],['text'=>"$dok3"],['text'=>"$dok4"]],
[['text'=>"$dok5"],['text'=>"$dok6"]],
[['text'=>"$dok7"],['text'=>"$dok8"]],
[['text'=>"$dok12"],['text'=>"$dok13"]],
[['text'=>"💎مدیریت💎"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"$ghavanin",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"$dok1"]],
[['text'=>"$dok2"],['text'=>"$dok3"],['text'=>"$dok4"]],
[['text'=>"$dok5"],['text'=>"$dok6"]],
[['text'=>"$dok7"],['text'=>"$dok8"]],
[['text'=>"$dok12"],['text'=>"$dok13"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($text == "$dokday"){
$lasttime = file_get_contents("data/$from_id/time.txt");
if($date == $lasttime){
$lasttime = file_get_contents("data/$from_id/time.txt");
SendMessage($chat_id,"❌شما امتیاز امروز خود را دریافت کرده اید");
}else{
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
$datas = json_decode(file_get_contents("data/$from_id/$from_id.json"),true);
$inv = $datas["coin"];
$newin = $inv + $mdaily;
$datas["coin"] = "$newin";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("data/$from_id/time.txt",$date);
SendMessage($chat_id,"😻🎊تبریک😻🎊
تعداد $mdaily الماس روزانه به حساب شما اضافه شد");
}}
if($text == "$dok8"){
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
تعداد سفارشات اخیر شما : $sefaresh
┄┅┄┅┄┄┅┄┅┄┄┅┄┅┄
جهت مشاهده جزئیات سفارش خود و یا لغو آن به کانال ما مراجعه فرمایید
@$chads
",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"$dok1"]],
[['text'=>"$dok2"],['text'=>"$dok3"],['text'=>"$dok4"]],
[['text'=>"$dok5"],['text'=>"$dok6"]],
[['text'=>"$dok7"],['text'=>"$dok8"]],
[['text'=>"$dok12"],['text'=>"$dok13"]],
[['text'=>"💎مدیریت💎"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
تعداد سفارشات اخیر شما : $sefaresh
┄┅┄┅┄┄┅┄┅┄┄┅┄┅┄
جهت مشاهده جزئیات سفارش خود و یا لغو آن به کانال ما مراجعه فرمایید
@$chads
",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"$dok1"]],
[['text'=>"$dok2"],['text'=>"$dok3"],['text'=>"$dok4"]],
[['text'=>"$dok5"],['text'=>"$dok6"]],
[['text'=>"$dok7"],['text'=>"$dok8"]],
[['text'=>"$dok12"],['text'=>"$dok13"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
if($text == "$dok5"){
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
if($text == "$dok4"){
$truechannel = json_decode(file_get_contents("https://api.telegram.org/bot$token/getChatMember?chat_id=$channel&user_id=$chat_id"));
$tch25 = $truechannel->result->status;
if($tch25 != 'member' && $tch25 != 'creator' && $tch25 != 'administrator'){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"⚠️ جهت ادامه کار نیاز است در کانال  عضو شوید.

1⃣ @[*[CHANNEL]*]

👈🏻 بعد از عضویت مجددا /start را ارسال نمایید.",
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
👥تعداد ممبر درخواستی را انتخاب نمایید
",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text' => "$mmbrsabt1 عضو👤|💎$mmbrsabt11 الماس", 'callback_data' => "seen$mmbrsabt1"]],[['text' => "$mmbrsabt2 عضو👤|💎$mmbrsabt22 الماس", 'callback_data' => "seen$mmbrsabt2"]
                    ],
[
['text' => "$mmbrsabt3 عضو👤|💎$mmbrsabt33 الماس", 'callback_data' => "seen$mmbrsabt3"]],[['text' => "$mmbrsabt4 عضو👤|💎$mmbrsabt44 الماس", 'callback_data' => "seen$mmbrsabt4"]
                    ],
                    [
['text' => "$mmbrsabt5 عضو👤|💎$mmbrsabt55 الماس", 'callback_data' => "seen$mmbrsabt5"]],
                    [
['text' => "$mmbrsabt6 عضو👤|💎$mmbrsabt66 الماس", 'callback_data' => "seen$mmbrsabt6"]],
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
            bot('editmessagetext', [
                'chat_id' => $chatid,
                'message_id' => $message_id2,
                'text' => "✅جهت دریافت ممبر باید ابتدا ربات را ادمین کانال مورد نظر کنید سپس آیدی کانال را ارسال نمایید

👈نمونه : @durov

📌درصورتی که مشکلی در ادمین کردن ربات دارید دستور زیر را ارسال نمایید
/help",
                        
            ]);
        } else {
             bot('editmessagetext', [
                'chat_id' => $chatid,
                'message_id' => $message_id2,
                'text' => "تعداد الماس های شما جهت سفارش کافی نیست💢",
                'reply_markup' => json_encode([
                 "resize_keyboard"=>true,'one_time_keyboard' => true,
                'inline_keyboard' => [
                            [
            ['text' => "خرید ️الماس", 'callback_data' => "buycoin"]
                            ],
                        ]
                    ])
            ]);
        }
    } if ($data == "seen$mmbrsabt4") {
$datas1["ted"] = "$mmbrsabt4";
$outjson = json_encode($datas1,true);
file_put_contents("data/$chatid/sabtkasr.txt",$mmbrsabt44);
file_put_contents("data/$chatid/$chatid.json",$outjson);
        $datas1 = json_decode(file_get_contents("data/$chatid/$chatid.json"),true);
        $in = $datas1["coin"];
        if ($in >= "$mmbrsabt44") {
            $datas1["step"] = "seen2";
$outjson = json_encode($datas1,true);
file_put_contents("data/$chatid/$chatid.json",$outjson);
            bot('editmessagetext', [
                'chat_id' => $chatid,
                'message_id' => $message_id2,
                'text' => "✅جهت دریافت ممبر باید ابتدا ربات را ادمین کانال مورد نظر کنید سپس آیدی کانال را ارسال نمایید

👈نمونه : durov",
 ]);
        } else {
             bot('editmessagetext', [
                'chat_id' => $chatid,
                'message_id' => $message_id2,
                'text' => "تعداد الماس های شما جهت سفارش کافی نیست💢",
                'reply_markup' => json_encode([
                 "resize_keyboard"=>true,'one_time_keyboard' => true,
                'inline_keyboard' => [
                            [
            ['text' => "خرید ️الماس", 'callback_data' => "buycoin"]
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
            bot('editmessagetext', [
                'chat_id' => $chatid,
                'message_id' => $message_id2,
                'text' => "✅جهت دریافت ممبر باید ابتدا ربات را ادمین کانال مورد نظر کنید سپس آیدی کانال را ارسال نمایید

👈نمونه : durov",
 ]);
        } else {
             bot('editmessagetext', [
                'chat_id' => $chatid,
                'message_id' => $message_id2,
                'text' => "تعداد الماس های شما جهت سفارش کافی نیست💢",
                'reply_markup' => json_encode([
                 "resize_keyboard"=>true,'one_time_keyboard' => true,
                'inline_keyboard' => [
                            [
            ['text' => "خرید ️الماس", 'callback_data' => "buycoin"]
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
            bot('editmessagetext', [
                'chat_id' => $chatid,
                'message_id' => $message_id2,
                'text' => "✅جهت دریافت ممبر باید ابتدا ربات را ادمین کانال مورد نظر کنید سپس آیدی کانال را ارسال نمایید

👈نمونه : durov",
 ]);
        } else {
             bot('editmessagetext', [
                'chat_id' => $chatid,
                'message_id' => $message_id2,
                'text' => "تعداد الماس های شما جهت سفارش کافی نیست💢",
                'reply_markup' => json_encode([
                 "resize_keyboard"=>true,'one_time_keyboard' => true,
                'inline_keyboard' => [
                            [
            ['text' => "خرید ️الماس", 'callback_data' => "buycoin"]
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
            bot('editmessagetext', [
                'chat_id' => $chatid,
                'message_id' => $message_id2,
                'text' => "✅جهت دریافت ممبر باید ابتدا ربات را ادمین کانال مورد نظر کنید سپس آیدی کانال را ارسال نمایید

👈نمونه : durov",
 ]);
        } else {
             bot('editmessagetext', [
                'chat_id' => $chatid,
                'message_id' => $message_id2,
                'text' => "تعداد الماس های شما جهت سفارش کافی نیست💢",
                'reply_markup' => json_encode([
                 "resize_keyboard"=>true,'one_time_keyboard' => true,
                'inline_keyboard' => [
                            [
            ['text' => "خرید ️الماس", 'callback_data' => "buycoin"]
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
            bot('editmessagetext', [
                'chat_id' => $chatid,
                'message_id' => $message_id2,
                'text' => "✅جهت دریافت ممبر باید ابتدا ربات را ادمین کانال مورد نظر کنید سپس آیدی کانال را ارسال نمایید

👈نمونه : durov",
            ]);
        } else {
             bot('editmessagetext', [
                'chat_id' => $chatid,
                'message_id' => $message_id2,
                'text' => "تعداد الماس های شما جهت سفارش کافی نیست💢",
                'reply_markup' => json_encode([
                 "resize_keyboard"=>true,'one_time_keyboard' => true,
                'inline_keyboard' => [
                            [
            ['text' => "خرید ️الماس", 'callback_data' => "buycoin"]
                            ],
                        ]
                    ])
            ]);
        }
    } if ($data == "seen$mmbrsabt6") {
$datas1["ted"] = "$mmbrsabt6";
$outjson = json_encode($datas1,true);
file_put_contents("data/$chatid/sabtkasr.txt",$mmbrsabt66);
file_put_contents("data/$chatid/$chatid.json",$outjson);
        $datas1 = json_decode(file_get_contents("data/$chatid/$chatid.json"),true);
        $in = $datas1["coin"];
        if ($in >= "$mmbrsabt66") {
$datas1["step"] = "seen2";
$outjson = json_encode($datas1,true);
file_put_contents("data/$chatid/$chatid.json",$outjson);
            bot('editmessagetext', [
                'chat_id' => $chatid,
                'message_id' => $message_id2,
                'text' => "✅جهت دریافت ممبر باید ابتدا ربات را ادمین کانال مورد نظر کنید سپس آیدی کانال را ارسال نمایید

👈نمونه : durov",
            ]);
        } else {
             bot('editmessagetext', [
                'chat_id' => $chatid,
                'message_id' => $message_id2,
                'text' => "تعداد الماس های شما جهت سفارش کافی نیست💢",
                'reply_markup' => json_encode([
                 "resize_keyboard"=>true,'one_time_keyboard' => true,
                'inline_keyboard' => [
                            [
            ['text' => "خرید ️الماس", 'callback_data' => "buycoin"]
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
                'text' => "تعداد الماس های شما جهت سفارش کافی نیست💢",
                'reply_markup' => json_encode([
                 "resize_keyboard"=>true,'one_time_keyboard' => true,
                'inline_keyboard' => [
                            [
            ['text' => "خرید الماس", 'callback_data' => "buycoin"]
                            ],
                        ]
                    ])
            ]);
        } else {
            $datas1["step"] = "seen2";
$outjson54522 = json_encode($datas1,true);
file_put_contents("data/$chatid/$chatid.json",$outjson54522);
            bot('editmessagetext', [
                'chat_id' => $chatid,
                'message_id' => $message_id2,
                'text' => "✅جهت دریافت ممبر باید ابتدا ربات را ادمین کانال مورد نظر کنید سپس آیدی کانال را ارسال نمایید

👈نمونه : @durov

📌درصورتی که مشکلی در ادمین کردن ربات دارید دستور زیر را ارسال نمایید
/help",
          ]);
        }
    }
if ($step == "seen2") {
$channels255 = json_decode(file_get_contents("https://api.telegram.org/bot[*[TOKEN]*]/getChatMember?chat_id=@$text&user_id=$chat_id"));
$channels2553 = json_decode(file_get_contents("https://api.telegram.org/bot[*[TOKEN]*]/getChat?chat_id=@$text"));
$tod = $channels255->result->status;
$descch1 = $channels2553->result->title;
$descch2 = $channels2553->result->username;
$descch3 = $channels2553->result->id;
$descch4 = $channels2553->result->description;
if(!file_exists("ads/cont/$descch2.txt")){
if($tod == 'member' or $tod == 'creator' or $tod == 'administrator'){
$post_id = bot('SendPhoto', [
'chat_id' =>"@$chads", 
'photo' =>"$piclink",
'caption' => "‼️نام کانال : [$descch1]

📝توضیحات کانال: [$descch4]    
             

🆔[@$descch2]
💎جهت دریافت الماس ابتدا $dokc1 را بزنید و پس از عضویت $dokc2 را انتخاب کنید",
'parse_mode' => "MarkDown",
'reply_markup' => json_encode([
'inline_keyboard' => [
[
["text" => "$dokc1","url" => "https://t.me/$descch2"],["text" => "$dokc2", 'callback_data' => "getcoin-$descch2"],["text" => "$dokc3", 'callback_data' => "cancel-$descch2"]
],
[
["text" => "$dokc4", 'callback_data' => "pay-$descch2"],["text" => "$dokc5", 'callback_data' => "goz-$descch2"]
],
[
["text" => "$dokc6", 'url' => "https://t.me/[*[USERNAME]*]"]
],
]
])
])->result->message_id;
$al = $datas["ted"];
$sabtkasr = file_get_contents("data/$chat_id/sabtkasr.txt");
$getsho = $coin - $sabtkasr;
$datas["coin"] = "$getsho";
$nu = $sefaresh + 1;
$datas["sefaresh"] = "$nu";
$outjson845 = json_encode($datas,true);
file_put_contents("data/$chat_id/$chat_id.json",$outjson845);
file_put_contents("ads/postid/$descch2.txt", $post_id);
file_put_contents("ads/cont/$descch2.txt",$al);
file_put_contents("ads/admin/$descch2.txt",$chat_id);
file_put_contents("ads/seen/$descch2.txt","0");
file_put_contents("ads/user/$descch2.txt","");
$datas["step"] = "free";
$outjson9415 = json_encode($datas,true);
file_put_contents("data/$chat_id/$chat_id.json",$outjson9415);
$done = file_get_contents("data/done.txt");
$addre = $done + 1;
file_put_contents("data/done.txt", $addre);
bot('sendMessage', [
'chat_id' => $chat_id,
'text' => "✅کانال @$descch2 با موفقیت در کانال ممبرگیر ثبت شد

",
            ]);
        } else {
$datas["step"] = "free";
$outjson45 = json_encode($datas,true);
file_put_contents("data/$chat_id/$chat_id.json",$outjson45);
bot('sendMessage', [
'chat_id' => $chat_id,
'text' => "❌ربات در کانال شما ادمین نمی باشد

لطفا ابتدا ربات را در کانال خود ادمین کنید و سپس مجدد تلاش نمایید",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"$dok1"]],
[['text'=>"$dok2"],['text'=>"$dok3"],['text'=>"$dok4"]],
[['text'=>"$dok5"],['text'=>"$dok6"]],
[['text'=>"$dok7"],['text'=>"$dok8"]],
[['text'=>"$dok12"],['text'=>"$dok13"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]);
}
} else {
$datas["step"] = "free";
$outjson453 = json_encode($datas,true);
file_put_contents("data/$chat_id/$chat_id.json",$outjson453);
bot('sendMessage', [
'chat_id' => $chat_id,
'text' => "🔍 | شما 1 سفارش ممبر برای چنل :$descch2 دارید .❗️
➖➖➖➖➖
☑️ | لطفا کمی صبر کنید تا سفارش ممبر شما به اتمام برسد !",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"$dok1"]],
[['text'=>"$dok2"],['text'=>"$dok3"],['text'=>"$dok4"]],
[['text'=>"$dok5"],['text'=>"$dok6"]],
[['text'=>"$dok7"],['text'=>"$dok8"]],
[['text'=>"$dok12"],['text'=>"$dok13"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]);
}
}
if (strpos($data, "getcoin-") !== false) {
$newd = str_replace("getcoin-",'',$data);
$fromm_id = $update->callback_query->from->id;
@$ue = file_get_contents("ads/user/$newd.txt");
@$se = file_get_contents("ads/seen/$newd.txt");
$get = bot('getChatMember',[
'chat_id'=>'@'.$newd,
'user_id'=>$fromm_id
]);
if($get->result->status == 'administrator' or $get->result->status == 'creator'){
	bot('answercallbackquery', [
'callback_query_id' => $update->callback_query->id,
'text' => "💢 شما نمیتوانید از سفارش خود الماس دریافت نمایید",
'show_alert' => false
]);
die();
}else{
if (strpos($ue, "$fromm_id") !== false) {
bot('answercallbackquery', [
'callback_query_id' => $update->callback_query->id,
'text' => "❌ شما قبلا از این سفارش الماس گرفته اید",
'show_alert' => false
]);
} else {
// برسی ادمین بودن ربات
$channels23 = json_decode(file_get_contents("https://api.telegram.org/bot[*[TOKEN]*]/getChatMember?chat_id=@$newd&user_id=[BOTCHID]"));
$tod3 = $channels23->result->status;
if($tod3 != 'administrator'){
$end = file_get_contents("ads/seen/$newd.txt");
$ad = file_get_contents("ads/admin/$newd.txt");
$co = file_get_contents("ads/cont/$newd.txt");
$te = file_get_contents("ads/time/$newd.txt");
$de = file_get_contents("ads/date/$newd.txt");
bot('sendMessage', [
'chat_id' => $ad,
'text'=>"❎سفارش شما لغو شد❎
❌💢شما ربات را از ادمین بودن کانال خود خارج کرده اید

آیدی کانال✍🏻 : @$newd
تعداد ممبر درخواستی👥 : $co
تعداد ممبر های دریافتی👤 : $co",
'parse_mode' =>"html",
]);
@$don = file_get_contents("data/done.txt");
$getdon = $don + 1;
file_put_contents("data/done.txt", $getdon);
@$enn = file_get_contents("data/enf.txt");
$getenf = $enn + 1;
file_put_contents("data/enf.txt", $getenf);
$post_id = file_get_contents("ads/postid/$newd.txt");
$de = $newd + 1;
bot('deletemessage', [
'chat_id' =>"@$chads",
'message_id' => $post_id
]);
unlink("ads/seen/$newd.txt");
unlink("ads/admin/$newd.txt");
unlink("ads/cont/$newd.txt");
unlink("ads/time/$newd.txt");
unlink("ads/user/$newd.txt");
unlink("ads/date/$newd.txt");
unlink("ads/postid/$newd.txt");
die();
}
// برسی ادمین بودن ربات
$channels23 = json_decode(file_get_contents("https://api.telegram.org/bot[*[TOKEN]*]/getChatMember?chat_id=@$newd&user_id=".$fromm_id));
$tod3 = $channels23->result->status;
$channels231 = json_decode(file_get_contents("https://api.telegram.org/bot[*[TOKEN]*]/getChatMember?chat_id=@[*[CHANNEL]*]&user_id=".$fromm_id));
$tod31 = $channels231->result->status;
if($tod3 == 'member' or $tod3 == 'creator' or $tod3 == 'administrator'){
if($tod31 == 'member' or $tod31 == 'creator' or $tod31 == 'administrator'){
$user = file_get_contents("ads/user/$newd.txt");
$members = explode("\n", $user);
if (!in_array($fromm_id, $members)) {
$add_user = file_get_contents("ads/user/$newd.txt");
$add_user .= $fromm_id . "\n";
file_put_contents("ads/user/$newd.txt", $add_user);
}
$getse = $se + 1;
file_put_contents("ads/seen/$newd.txt", $getse);
$datas3165 = json_decode(file_get_contents("data/$fromm_id/$fromm_id.json"),true);
$coin2 = $datas3165["coin"];
$getsho = $coin2 + $coinamount;
$datas3165["coin"] = "$getsho";
$outjson75241 = json_encode($datas3165,true);
file_put_contents("data/$fromm_id/$fromm_id.json",$outjson75241);
$datas366 = json_decode(file_get_contents("data/$fromm_id/$fromm_id.json"),true);
$coin22 = $datas366["ads"];
$getsho22 = $coin22 + 1;
$datas366["ads"] = "$getsho22";
$outjson7525 = json_encode($datas366,true);
file_put_contents("data/$fromm_id/$fromm_id.json",$outjson7525);
$coing = $datas3165["coin"];
$myfile2 = fopen("data/$fromm_id/channels.txt", "a") or die("Unable to open file!");
fwrite($myfile2, "@$newd\n");
fclose($myfile2);
$sub = $datas3165["sub"];
if($sub != null){
	$subdata552 = json_decode(file_get_contents("data/$sub/$sub.json"),true);
$invcoin = $subdata552["invcoin"];
$inv = $subdata552["coin"];
$newinv= $inv + $porsant;
$newinvcoin= $invcoin + $porsant;
if($datas3651['dafeee'] == 'first'){
		$tiksh = $subdata552['coin'];
		$ziiii = $tiksh +$invitecoin;
		$subdata552["coin"] = "$ziiii";
		bot('sendMessage',[
		'chat_id'=>$sub,
		'text'=>"تبریک🎊
یکی از زیرمجموعه های شما اولین عضویت خود را در یک کانال انجام داد✅",
		]);
		$datas3651["dafeee"] = "$newinv";
		$outjson = json_encode($datas3651,true);
		file_put_contents("data/$fromm_id/$fromm_id.json",$outjson);
		}
$subdata552["coin"] = "$newinv";
$subdata552["invcoin"] = "$newinvcoin";
$outjson = json_encode($subdata552,true);
file_put_contents("data/$sub/$sub.json",$outjson);
}
bot('answercallbackquery', [
'callback_query_id' => $update->callback_query->id,
'text' => "شما یک الماس گرفتید💎 موجودی جدید : $coing",
'show_alert' => false
]);
}else{
bot('answercallbackquery', [
'callback_query_id' => $update->callback_query->id,
'text' => "✅ | برای دریافت الماس در چنل ممبر گیر عضو شید",
'show_alert' => false
]);
}
}else{
bot('answercallbackquery', [
'callback_query_id' => $update->callback_query->id,
'text' => "❌ | شما هنوز در کانال مورد نظر عضو نشده اید",
'show_alert' => true
]);
}
$end = file_get_contents("ads/seen/$newd.txt");
$ad = file_get_contents("ads/admin/$newd.txt");
$co = file_get_contents("ads/cont/$newd.txt");
$te = file_get_contents("ads/time/$newd.txt");
$de = file_get_contents("ads/date/$newd.txt");
if ($end >= $co) {
bot('sendMessage', [
'chat_id' => $ad,
'text' => "سفارش شما به پایان رسید✅

آیدی کانال📣 : @$newd
تعداد ممبر درخواستی شما👥 : $co
تعداد ممبر های دریافتی شما👤 : $co",
'parse_mode' =>"html",
]);
@$don = file_get_contents("data/done.txt");
$getdon = $don + 1;
file_put_contents("data/done.txt", $getdon);
@$enn = file_get_contents("data/enf.txt");
$getenf = $enn + 1;
file_put_contents("data/enf.txt", $getenf);
$post_id = file_get_contents("ads/postid/$newd.txt");
$de = $newd + 1;
bot('deletemessage', [
'chat_id' =>"@$chads",
'message_id' => $post_id
]);
unlink("ads/seen/$newd.txt");
unlink("ads/admin/$newd.txt");
unlink("ads/cont/$newd.txt");
unlink("ads/time/$newd.txt");
unlink("ads/user/$newd.txt");
unlink("ads/date/$newd.txt");
unlink("ads/postid/$newd.txt");
}
}
}
}
if (strpos($data, "cancel-") !== false) {
$newd = str_replace("cancel-",'',$data);
$fromm_id = $update->callback_query->from->id;
$end = file_get_contents("ads/seen/$newd.txt");
$ad = file_get_contents("ads/admin/$newd.txt");
$co = file_get_contents("ads/cont/$newd.txt");
$te = file_get_contents("ads/time/$newd.txt");
$de = file_get_contents("ads/date/$newd.txt");
if ($fromm_id == $ad or $fromm_id == $admin) {
$rcoin = $co - $end;
$datas3 = json_decode(file_get_contents("data/$ad/$ad.json"),true);
$coin2 = $datas3["coin"];
$getsho = $coin2 + $rcoin;
$datas3["coin"] = "$getsho";
$outjson = json_encode($datas3,true);
file_put_contents("data/$ad/$ad.json",$outjson);
bot('answercallbackquery', [
'callback_query_id' => $update->callback_query->id,
'text' => "سفارش شما لغو شد و $rcoin سکه باقی مانده شما پس داده شد",
'show_alert' => false
]);
bot('sendMessage', [
'chat_id' => $ad,
'text' => "❌ دوست عزیز سفارش ممبر گیر شما توسط ادمین لغو شد و الماس های باقی مانده شما برگشت داده شد . 
➖➖➖➖
🔚 تعداد الماس برگشت داده شده : $rcoin
➖➖➖➖
@[*[CHANNEL]*]",
'parse_mode' => "html"
]);
@$enn = file_get_contents("data/enf.txt");
$getenf = $enn + 1;
file_put_contents("data/enf.txt", $getenf);
$newd = str_replace("cancel-",'',$data);
$post_id = file_get_contents("ads/postid/$newd.txt");
bot('deletemessage', [
'chat_id' =>"@$chads",
'message_id' =>$post_id
]);
unlink("ads/seen/$newd.txt");
unlink("ads/admin/$newd.txt");
unlink("ads/cont/$newd.txt");
unlink("ads/time/$newd.txt");
unlink("ads/user/$newd.txt");
unlink("ads/date/$newd.txt");
unlink("ads/postid/$newd.txt");
}else{
bot('answercallbackquery', [
'callback_query_id' => $update->callback_query->id,
'text' => "🔍 این سفارش متعلق به شما کاربر گرامی نیست",
'show_alert' => false
]);
}
}
if (strpos($data, "goz-") !== false) {
$newd = str_replace("goz-",'',$data);
$fromm_id = $update->callback_query->from->id;
$end = file_get_contents("ads/seen/$newd.txt");
$ad = file_get_contents("ads/admin/$newd.txt");
$co = file_get_contents("ads/cont/$newd.txt");
$te = file_get_contents("ads/time/$newd.txt");
$de = file_get_contents("ads/date/$newd.txt");
$po = file_get_contents("ads/postid/$newd.txt");
if ($fromm_id != $ad) {
bot('answercallbackquery', [
'callback_query_id' => $update->callback_query->id,
'text' => "📥گزارش شما با موفقیت ثبت شد",
'show_alert' => false
]);
bot('sendmessage',[
'chat_id'=>$admin1,
'text'=>"🔱 ادمین گرامی
پست زیر👇
 https://t.me/[*[CHANNEL]*]/$po
توسط کاربر زیر گزارش شده است👇
$fromm_id
┄┅┄┅┄┄┅┄┅┄┄┅┄┅┄
اطلاعات پست💡

پیوی سفارش دهنده ممبر👇
[$ad](tg://user?id=$ad)
پیوی گزارش کننده👇
[$fromm_id](tg://user?id=$fromm_id)
تعداد ممبر سفارش داده شده👤👇
$co
تعداد ممبر دریافتی💌👇
$end
┄┅┄┅┄┄┅┄┅┄┄┅┄┅┄",
'parse_mode'=>'Markdown', 
'reply_markup'=>json_encode([ 
'resize_keyboard'=>true,
            'keyboard'=>[
                [
                ['text'=>"بازگشت"],
                ]
              ],
])
]);
bot('sendmessage',[
'chat_id'=>$admin2,
'text'=>"🔱 ادمین گرامی
پست زیر👇
 https://t.me/[*[CHANNEL]*]/$po
توسط کاربر زیر گزارش شده است👇
$fromm_id
┄┅┄┅┄┄┅┄┅┄┄┅┄┅┄
اطلاعات پست💡

پیوی سفارش دهنده ممبر👇
[$ad](tg://user?id=$ad)
پیوی گزارش کننده👇
[$fromm_id](tg://user?id=$fromm_id)
تعداد ممبر سفارش داده شده👤👇
$co
تعداد ممبر دریافتی💌👇
$end
┄┅┄┅┄┄┅┄┅┄┄┅┄┅┄",
'parse_mode'=>'Markdown', 
'reply_markup'=>json_encode([ 
'resize_keyboard'=>true,
            'keyboard'=>[
                [
                ['text'=>"بازگشت"],
                ]
              ],
])
]);
bot('sendmessage',[
'chat_id'=>$admin3,
'text'=>"🔱 ادمین گرامی
پست زیر👇
 https://t.me/[*[CHANNEL]*]/$po
توسط کاربر زیر گزارش شده است👇
$fromm_id
┄┅┄┅┄┄┅┄┅┄┄┅┄┅┄
اطلاعات پست💡

پیوی سفارش دهنده ممبر👇
[$ad](tg://user?id=$ad)
پیوی گزارش کننده👇
[$fromm_id](tg://user?id=$fromm_id)
تعداد ممبر سفارش داده شده👤👇
$co
تعداد ممبر دریافتی💌👇
$end
┄┅┄┅┄┄┅┄┅┄┄┅┄┅┄",
'parse_mode'=>'Markdown', 
'reply_markup'=>json_encode([ 
'resize_keyboard'=>true,
            'keyboard'=>[
                [
                ['text'=>"بازگشت"],
                ]
              ],
])
]);
}else{
bot('answercallbackquery', [
'callback_query_id' => $update->callback_query->id,
'text' => "⭕️کاربر گرامی شما نمیتوانید سفارش خود را گزارش کنید",
'show_alert' => false
]);
}
}
if (strpos($data, "pay-") !== false) {
$newd = str_replace("pay-",'',$data);
$fromm_id = $update->callback_query->from->id;
$end = file_get_contents("ads/seen/$newd.txt");
$ad = file_get_contents("ads/admin/$newd.txt");
$co = file_get_contents("ads/cont/$newd.txt");
$te = file_get_contents("ads/time/$newd.txt");
$de = file_get_contents("ads/date/$newd.txt");
if ($fromm_id == $ad or $fromm_id == $admin) {
bot('answercallbackquery', [
'callback_query_id' => $update->callback_query->id,
'text' => "اطلاعات سفارش شما به شرح زیر است📇
تعداد ممبر سفارش داده شده 🛍: $co
تعداد ممبر دریافتی 👥: $end
با تشکر",
'show_alert' => true
]);
}else{
bot('answercallbackquery', [
'callback_query_id' => $update->callback_query->id,
'text' => "🔍 این سفارش متعلق به شما کاربر گرامی نیست",
'show_alert' => false
]);
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
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"$dok1"]],
[['text'=>"$dok2"],['text'=>"$dok3"],['text'=>"$dok4"]],
[['text'=>"$dok5"],['text'=>"$dok6"]],
[['text'=>"$dok7"],['text'=>"$dok8"]],
[['text'=>"$dok12"],['text'=>"$dok13"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]);
}
//===سورس جم ممب ===//
//===اپن شد در تیم : @[ADMINID] ===//
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
elseif($text == "$dok12"){	
mkdir("data/codes");
$datas["step"] = "mgiftcode";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"🎁 کد هدیه مورد نظر خود را وارد کنید",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"بازگشت"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}
if($step == "mgiftcode" && $text != "بازگشت"){ 
      if(file_exists("data/codes/$text.txt")){
        $pricegift = file_get_contents("data/codes/$text.txt");
        $datas = json_decode(file_get_contents("data/$chat_id/$chat_id.json"),true);
        $inv = $datas["coin"];
        $newin = $inv + $pricegift;
        $datas["coin"] = "$newin";
        $outjson = json_encode($datas,true);
        file_put_contents("data/$chat_id/$chat_id.json",$outjson);
		SendMessage($chat_id,"☑️💌🎊 کد ارسالی شما صحیح بود

$pricegift الماس به حساب شما واریز شد");
        unlink("data/codes/$text.txt");
        $datas1["step"] = "free";
bot('sendMessage', [
'chat_id' =>"@[*[CHANNEL]*]",
'text' => "🔅☑️کد با موفقیت استفاده شد

🔅 🎈 🔅 🎈 🔅
✍🏻کد : $text
🕴🏻دریافت کننده : $chat_id
🔅 🎈 🔅 🎈 🔅

@[*[USERNAME]*]",
]);
	}else{
		SendMessage($chat_id,"❌کد ارسالی نامعتبر و یا استفاده شده می باشد");
	}
}
/////////////////////////
elseif($text == "$dok13"){	
$datas["step"] = "movegeme";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"🕴🏻آیدی عددی شخص دریافت کننده الماس را ارسال نمایید",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"/start"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}
if($step == "movegeme" && $text != "/start"){ 
      if(file_exists("data/$text/")){
        file_put_contents("data/$chat_id/movemem.txt",$text);
$datas["step"] = "movegeme2";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
		SendMessage($chat_id,"💎میزان الماس را جهت انتقال به شناسه $text ارسال نمایید");
        unlink("data/codes/$text.txt");
	}else{
		SendMessage($chat_id,"❌این کاربر عضو ربات نمی باشد");
	}
}
if($step == "movegeme2" && $text != "/start"){ 
        $datas = json_decode(file_get_contents("data/$from_id/$from_id.json"),true);
        $inv = $datas["coin"];
    if ($inv >= $text) {
    if ($text >= 10) {
        $movemem = file_get_contents("data/$from_id/movemem.txt");
        $datas = json_decode(file_get_contents("data/$from_id/$from_id.json"),true);
        $inv = $datas["coin"];
        $newin = $inv - $text;
        $datas["coin"] = "$newin";
        $outjson = json_encode($datas,true);
        file_put_contents("data/$from_id/$from_id.json",$outjson);
        $datas212 = json_decode(file_get_contents("data/$movemem/$movemem.json"),true);
        $inv212 = $datas212["coin"];
        $newin212 = $inv212 + $text;
        $datas212["coin"] = "$newin212";
        $outjson = json_encode($datas212,true);
        file_put_contents("data/$movemem/$movemem.json",$outjson);
		SendMessage($chat_id,"🔅با موفقیت $text الماس به شناسه کاربری $movemem منتقل گردید");
		SendMessage($movemem,"💌🔅کاربر گرامی

کاربر با شناسه $chat_id میزان $text الماس به حساب شما منتقل کرد");
$datas["step"] = "none";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
	}else{
		SendMessage($chat_id,"❌حداقل الماس قابل انتقال 10 الماس می باشد");
	}
	}else{
		SendMessage($chat_id,"❌الماس شما کافی نمی باشد");
	}
}
//////////////////////////////////
if($text=="$dok6"){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"🎈 به قسمت زیرمجموعه گیری خوش آمدید
┄┅┄┅┄┄┅┄┅┄┄┅┄┅┄
🎊 با ورود کاربر توسط لینک شما میتوانید از $invitecoin الماس فوری پس از ورود زیر مجموعه و $porsant الماس پوسانت عضویت کاربر برای هر کانال بهره مند گردید",
'parse_mode'=>'Markdown', 
'reply_markup'=>json_encode([ 
'resize_keyboard'=>true,
            'keyboard'=>[
[['text'=>'🎆بنر عکس دار🎆'],['text'=>'💥بنر هایپر لینک💥']],
[['text'=>'/start']]
              ],
])
]);
}
if($text=="💥بنر هایپر لینک💥"){
$datas1["step"] = "free";
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"[$mhiperm](https://t.me/[*[USERNAME]*]?start=$chat_id)",
'parse_mode'=>'Markdown', 
'reply_markup'=>json_encode([ 
'resize_keyboard'=>true,
            'keyboard'=>[
                [
                ['text'=>"/start"],
                ]
              ],
])
]);
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
if($text=="🎆بنر عکس دار🎆"){
    bot('sendphoto',[
    'photo'=>"$piclink",
    'chat_id'=>$chat_id,
    'caption'=>"$zirtext
",
'parse_mode'=>'html',

    ]);
}
//===hmdemon===//
if($text == "$dok2"){
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
'text'=>"💡 اطلاعات حساب $chat_id

تعداد الماس 💎: $coin
تعداد عضویت 👥: $ads
تعداد زیر مجموعه👤 : $inv
تعداد اخطار🔴 : $warn
پورسانت الماس🔵 : $invcoin
🆔 @[*[CHANNEL]*]",
'parse_mode'=>"html",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[

],
]
])
]); 
}
//----------------------------------------------------------------------
elseif($text == "مدیریت" or $text == "💎مدیریت💎" or $text == "/panel"){
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"سلام مدیر گرامی به پنل خوش آمدید!",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"📈آمار ربات📉"],['text'=>"🕴🏻پیام به کاربر🕴🏻"]],
[['text'=>"پیام همگانی🚀"],['text'=>"فروارد همگانی🔱"]],
[['text'=>"اهدای الماس🎁"],['text'=>"کسر الماس〽️"]],
[['text'=>"اخطار به کاربر💢"],['text'=>"حذف اخطار💢️"]],
[['text'=>"تنظیم متن و الماس⚙"],['text'=>"⚙تنظیم دکمه"]],
[['text'=>"تنظیم فروشگاه🛒"],['text'=>"🎆تنظیم عکس"]],
[['text'=>"👤تنظیم سفارشات ممبر👤"],['text'=>"📋مدیریت ادمین ها📋"]],
[['text'=>"/start"],['text'=>"🎁ساخت کد هدیه🎁"]],
[['text'=>"باقی مانده اشتراک ❗️"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}
}
//----------------------------------------------------------------------
elseif($text == "📈آمار ربات📉"){	
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
$alluser = file_get_contents("data/ozvs.txt");
$alaki = explode("\n",$alluser);
$allusers = count($alaki);
$done = file_get_contents("data/done.txt");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"تعداد کاربران ربات شما: $allusers
تبلیغات انجام شده : $done
",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"📈آمار ربات📉"],['text'=>"🕴🏻پیام به کاربر🕴🏻"]],
[['text'=>"پیام همگانی🚀"],['text'=>"فروارد همگانی🔱"]],
[['text'=>"اهدای الماس🎁"],['text'=>"کسر الماس〽️"]],
[['text'=>"اخطار به کاربر💢"],['text'=>"حذف اخطار💢️"]],
[['text'=>"تنظیم متن و الماس⚙"],['text'=>"⚙تنظیم دکمه"]],
[['text'=>"تنظیم فروشگاه🛒"],['text'=>"🎆تنظیم عکس"]],
[['text'=>"👤تنظیم سفارشات ممبر👤"],['text'=>"📋مدیریت ادمین ها📋"]],
[['text'=>"/start"],['text'=>"🎁ساخت کد هدیه🎁"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
///////////////----------------////////////
elseif($text == "تنظیم متن و الماس⚙"){	
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
$alluser = file_get_contents("data/ozvs.txt");
$alaki = explode("\n",$alluser);
$allusers = count($alaki);
$done = file_get_contents("data/done.txt");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"به قسمت تنظیم متن و الماس خوش آمدید
",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"تنظیم پورسانت زیرمجموعه"]],
[['text'=>"تنظیم الماس زیرمجموعه گیری"]],
[['text'=>"تنظیم الماس عضویت"],['text'=>"تنظیم متن بنر هایپر"]],
[['text'=>"تنظیم متن بنر عکسدار"],['text'=>"تنظیم متن استارت"]],
[['text'=>"تنظیم متن فروشگاه"],['text'=>"تنظیم متن قوانین"]],
[['text'=>"تنظیم متن دریافت الماس رایگان"]],
[['text'=>"تنظیم متن جمع آوری در کانال"]],
[['text'=>"تنظیم الماس ورودی"],['text'=>"تنظیم الماس روزانه"]],
[['text'=>"/panel"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
//----------------------------------------------------------------------
elseif($text == "تنظیم فروشگاه🛒"){	
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
$alluser = file_get_contents("data/ozvs.txt");
$alaki = explode("\n",$alluser);
$allusers = count($alaki);
$done = file_get_contents("data/done.txt");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"به قسمت تنظیم فروشگاه خوش آمدید

در این قسمت میتوانید نام محصولات و لینک متصل به آن را مدیریت نمایید",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"نام محصول دوم"],['text'=>"نام محصول اول"]],
[['text'=>"نام محصول چهارم"],['text'=>"نام محصول سوم"]],
[['text'=>"نام محصول ششم"],['text'=>"نام محصول پنجم"]],
[['text'=>"نصب درگاه پرداخت"]],
[['text'=>"/panel"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
//----------------------------------------------------------------------
elseif($text == "👤تنظیم سفارشات ممبر👤"){	
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
$alluser = file_get_contents("data/ozvs.txt");
$alaki = explode("\n",$alluser);
$allusers = count($alaki);
$done = file_get_contents("data/done.txt");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"به قسمت تنظیم سفارشات ممبر خوش آمدید

در این قسمت میتوانید میزان های سفارش ممبر را به دلخواه خود تغییر دهید",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"تعداد عضویت 2"],['text'=>"تعداد عضویت 1"]],
[['text'=>"تعداد عضویت 4"],['text'=>"تعداد عضویت 3"]],
[['text'=>"تعداد عضویت 6"],['text'=>"تعداد عضویت 5"]],
[['text'=>"تعداد الماس 2"],['text'=>"تعداد الماس 1"]],
[['text'=>"تعداد الماس 4"],['text'=>"تعداد الماس 3"]],
[['text'=>"تعداد الماس 6"],['text'=>"تعداد الماس 5"]],
[['text'=>"/panel"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($text == "📋مدیریت ادمین ها📋"){	
if ($chat_id == $admin) {
$alluser = file_get_contents("data/ozvs.txt");
$alaki = explode("\n",$alluser);
$allusers = count($alaki);
$done = file_get_contents("data/done.txt");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"به پنل مدیریت ادمین ها خوش آمدید
در این قسمت میتوانید ادمین های دوم و سوم را مدیریت نمایید",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"ادمین سوم"],['text'=>"ادمین دوم"]],
[['text'=>"/panel"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"❌این بخش فقط توسط ادمین اصلی ربات قابل استفاده می باشد",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"/start"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]);     
}}
elseif($text == "📋مدیریت ادمین ها📋"){	
if ($chat_id == $admin2 or $chat_id == $admin3) {
$alluser = file_get_contents("data/ozvs.txt");
$alaki = explode("\n",$alluser);
$allusers = count($alaki);
$done = file_get_contents("data/done.txt");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"❌این بخش فقط توسط ادمین اصلی ربات قابل استفاده می باشد",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"/panel"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
//----------------------------------------------------------------------
elseif($text == "⚙تنظیم دکمه"){	
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
$alluser = file_get_contents("data/ozvs.txt");
$alaki = explode("\n",$alluser);
$allusers = count($alaki);
$done = file_get_contents("data/done.txt");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"به قسمت تنظیم متن و الماس خوش آمدید
",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"دریافت الماس رایگان"]],
[['text'=>"پروفایل"],['text'=>"قوانین"],['text'=>"سفارش ممبر"]],
[['text'=>"فروشگاه"],['text'=>"زیر مجموعه گیری"]],
[['text'=>"برترین ها"],['text'=>"پیگیری سفارشات"]],
[['text'=>"کد هدیه"],['text'=>"انتقال الماس"]],
[['text'=>"جمع آوری در کانال"],['text'=>"الماس روزانه"]],
[['text'=>"⚙تنظیم دکمه کانال"]],
[['text'=>"/panel"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
//----------------------------------------------------------------------
elseif($text == "⚙تنظیم دکمه کانال"){	
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
$alluser = file_get_contents("data/ozvs.txt");
$alaki = explode("\n",$alluser);
$allusers = count($alaki);
$done = file_get_contents("data/done.txt");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"به قسمت تنظیم متن و الماس خوش آمدید
",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"$dokc1"]],
[['text'=>"$dokc2"],['text'=>"$dokc3"]],
[['text'=>"$dokc4"],['text'=>"$dokc5"]],
[['text'=>"$dokc6"]],
[['text'=>"/panel"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
//----------------------------------------------------------------------
elseif($text == "🎆تنظیم عکس"){	
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
$datas["step"] = "starttext688";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"لینک عکس جدید را ارسال نمایید

مثال : [http://s2.picofile.com/file/8372103468/member_icon_8_jpg.png]

توجه : لینک عکس ارسالی شما بر روی قسمت های زیر مجموعه گیری و عکس سفارش های ارسال شده به کانال تنظیم خواهد شد ",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"بازگشت"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($step == "starttext688" && $text != "/start"){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("data/piclink.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"با موفقیت تنظیم شد

لینک جدید : $text",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"📈آمار ربات📉"],['text'=>"🕴🏻پیام به کاربر🕴🏻"]],
[['text'=>"پیام همگانی🚀"],['text'=>"فروارد همگانی🔱"]],
[['text'=>"اهدای الماس🎁"],['text'=>"کسر الماس〽️"]],
[['text'=>"اخطار به کاربر💢"],['text'=>"حذف اخطار💢️"]],
[['text'=>"تنظیم متن و الماس⚙"],['text'=>"⚙تنظیم دکمه"]],
[['text'=>"تنظیم فروشگاه🛒"],['text'=>"🎆تنظیم عکس"]],
[['text'=>"👤تنظیم سفارشات ممبر👤"],['text'=>"📋مدیریت ادمین ها📋"]],
[['text'=>"/start"],['text'=>"🎁ساخت کد هدیه🎁"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
////////////////---------------////////////////////////////////////////////////
elseif($text == "$dokc6"){	
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
$datas["step"] = "starttext680";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"نام جدید ورود به ربات را ارسال نمایید

نام فعلی : $dokc6",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"/start"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($step == "starttext680" && $text != "/start"){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("data/dokc6.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"با موفقیت تنظیم شد

نام جدید : $text",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"📈آمار ربات📉"],['text'=>"🕴??پیام به کاربر🕴🏻"]],
[['text'=>"پیام همگانی🚀"],['text'=>"فروارد همگانی🔱"]],
[['text'=>"اهدای الماس🎁"],['text'=>"کسر الماس〽️"]],
[['text'=>"اخطار به کاربر💢"],['text'=>"حذف اخطار💢️"]],
[['text'=>"تنظیم متن و الماس⚙"],['text'=>"⚙تنظیم دکمه"]],
[['text'=>"تنظیم فروشگاه🛒"],['text'=>"🎆تنظیم عکس"]],
[['text'=>"👤تنظیم سفارشات ممبر👤"],['text'=>"📋مدیریت ادمین ها📋"]],
[['text'=>"/start"],['text'=>"🎁ساخت کد هدیه🎁"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
////////////////---------------////////////////////////////////////////////////
elseif($text == "$dokc5"){	
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
$datas["step"] = "starttext679";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"نام جدید دکمه گزارش تخلف را ارسال نمایید

نام فعلی : $dokc5",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"/start"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($step == "starttext679" && $text != "/start"){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("data/dokc5.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"با موفقیت تنظیم شد

نام جدید : $text",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"📈آمار ربات📉"],['text'=>"🕴🏻پیام به کاربر🕴🏻"]],
[['text'=>"پیام همگانی🚀"],['text'=>"فروارد همگانی🔱"]],
[['text'=>"اهدای الماس🎁"],['text'=>"کسر الماس〽️"]],
[['text'=>"اخطار به کاربر💢"],['text'=>"حذف اخطار💢️"]],
[['text'=>"تنظیم متن و الماس⚙"],['text'=>"⚙تنظیم دکمه"]],
[['text'=>"تنظیم فروشگاه🛒"],['text'=>"🎆تنظیم عکس"]],
[['text'=>"👤تنظیم سفارشات ممبر👤"],['text'=>"📋مدیریت ادمین ها📋"]],
[['text'=>"/start"],['text'=>"🎁ساخت کد هدیه🎁"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
////////////////---------------////////////////////////////////////////////////
elseif($text == "$dokc4"){	
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
$datas["step"] = "starttext678";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"نام جدید دکمه پیگیری سفارش را ارسال نمایید

نام فعلی : $dokc4",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"/start"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($step == "starttext678" && $text != "/start"){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("data/dokc4.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"با موفقیت تنظیم شد

نام جدید : $text",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"📈آمار ربات📉"],['text'=>"🕴🏻پیام به کاربر🕴🏻"]],
[['text'=>"پیام همگانی🚀"],['text'=>"فروارد همگانی🔱"]],
[['text'=>"اهدای الماس🎁"],['text'=>"کسر الماس〽️"]],
[['text'=>"اخطار به کاربر💢"],['text'=>"حذف اخطار💢️"]],
[['text'=>"تنظیم متن و الماس⚙"],['text'=>"⚙تنظیم دکمه"]],
[['text'=>"تنظیم فروشگاه🛒"],['text'=>"🎆تنظیم عکس"]],
[['text'=>"👤تنظیم سفارشات ممبر👤"],['text'=>"📋مدیریت ادمین ها📋"]],
[['text'=>"/start"],['text'=>"🎁ساخت کد هدیه🎁"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
elseif($text == "$dokc3"){	
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
$datas["step"] = "starttext677";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"نام جدید دکمه لغو سفارش را ارسال نمایید

نام فعلی : $dokc3",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"/start"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($step == "starttext677" && $text != "/start"){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("data/dokc3.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"با موفقیت تنظیم شد

نام جدید : $text",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"📈آمار ربات📉"],['text'=>"🕴🏻پیام به کاربر🕴🏻"]],
[['text'=>"پیام همگانی🚀"],['text'=>"فروارد همگانی🔱"]],
[['text'=>"اهدای الماس🎁"],['text'=>"کسر الماس〽️"]],
[['text'=>"اخطار به کاربر💢"],['text'=>"حذف اخطار💢️"]],
[['text'=>"تنظیم متن و الماس⚙"],['text'=>"⚙تنظیم دکمه"]],
[['text'=>"تنظیم فروشگاه🛒"],['text'=>"🎆تنظیم عکس"]],
[['text'=>"👤تنظیم سفارشات ممبر👤"],['text'=>"📋مدیریت ادمین ها📋"]],
[['text'=>"/start"],['text'=>"🎁ساخت کد هدیه🎁"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
////////////////---------------////////////////////////////////////////////////
elseif($text == "$dokc2"){	
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
$datas["step"] = "starttext676";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"نام جدید دکمه دریافت الماس را ارسال نمایید

نام فعلی : $dokc2",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"/start"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($step == "starttext676" && $text != "/start"){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("data/dokc2.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"با موفقیت تنظیم شد

نام جدید : $text",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"📈آمار ربات📉"],['text'=>"🕴🏻پیام به کاربر🕴🏻"]],
[['text'=>"پیام همگانی🚀"],['text'=>"فروارد همگانی🔱"]],
[['text'=>"اهدای الماس🎁"],['text'=>"کسر الماس〽️"]],
[['text'=>"اخطار به کاربر💢"],['text'=>"حذف اخطار💢️"]],
[['text'=>"تنظیم متن و الماس⚙"],['text'=>"⚙تنظیم دکمه"]],
[['text'=>"تنظیم فروشگاه🛒"],['text'=>"🎆تنظیم عکس"]],
[['text'=>"👤تنظیم سفارشات ممبر👤"],['text'=>"📋مدیریت ادمین ها📋"]],
[['text'=>"/start"],['text'=>"🎁ساخت کد هدیه🎁"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
////////////////---------------////////////////////////////////////////////////
elseif($text == "ادمین دوم"){	
if ($chat_id == $admin) {
$datas["step"] = "adminman2";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"آیدی عددی ادمین جدید را ارسال نمایید
ادمین فعلی : $admin2",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"/start"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($step == "adminman2" && $text != "/start"){ 
if ($chat_id == $admin) {
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("data/admin2.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"با موفقیت تنظیم شد

ادمین جدید : $text",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"ادمین سوم"],['text'=>"ادمین دوم"]],
[['text'=>"/panel"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
////////////////---------------////////////////////////////////////////////////
elseif($text == "ادمین سوم"){	
if ($chat_id == $admin) {
$datas["step"] = "adminman3";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"آیدی عددی ادمین جدید را ارسال نمایید
ادمین فعلی : $admin3",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"/start"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($step == "adminman3" && $text != "/start"){ 
if ($chat_id == $admin) {
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("data/admin3.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"با موفقیت تنظیم شد

ادمین جدید : $text",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"ادمین سوم"],['text'=>"ادمین دوم"]],
[['text'=>"/panel"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
////////////////---------------////////////////////////////////////////////////
elseif($text == "$dokc1"){	
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
$datas["step"] = "starttext675";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"نام جدید دکمه عضویت در کانال را ارسال نمایید

نام فعلی : $dokc1",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"/start"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($step == "starttext675" && $text != "/start"){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("data/dokc1.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"با موفقیت تنظیم شد

نام جدید : $text",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"📈آمار ربات📉"],['text'=>"🕴🏻پیام به کاربر🕴🏻"]],
[['text'=>"پیام همگانی🚀"],['text'=>"فروارد همگانی🔱"]],
[['text'=>"اهدای الماس🎁"],['text'=>"کسر الماس〽️"]],
[['text'=>"اخطار به کاربر💢"],['text'=>"حذف اخطار💢️"]],
[['text'=>"تنظیم متن و الماس⚙"],['text'=>"⚙تنظیم دکمه"]],
[['text'=>"تنظیم فروشگاه🛒"],['text'=>"🎆تنظیم عکس"]],
[['text'=>"👤تنظیم سفارشات ممبر👤"],['text'=>"📋مدیریت ادمین ها📋"]],
[['text'=>"/start"],['text'=>"🎁ساخت کد هدیه🎁"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
////////////////---------------////////////////////////////////////////////////
elseif($text == "پیگیری سفارشات"){	
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
$datas["step"] = "starttext673";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"نام جدید دکمه پیگیری سفارشات را ارسال نمایید

نام فعلی : $dok8",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"/start"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($step == "starttext673" && $text != "/start"){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("data/dok8.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"با موفقیت تنظیم شد

نام جدید : $text",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"📈آمار ربات📉"],['text'=>"🕴🏻پیام به کاربر🕴🏻"]],
[['text'=>"پیام همگانی🚀"],['text'=>"فروارد همگانی🔱"]],
[['text'=>"اهدای الماس🎁"],['text'=>"کسر الماس〽️"]],
[['text'=>"اخطار به کاربر💢"],['text'=>"حذف اخطار💢️"]],
[['text'=>"تنظیم متن و الماس⚙"],['text'=>"⚙تنظیم دکمه"]],
[['text'=>"تنظیم فروشگاه🛒"],['text'=>"🎆تنظیم عکس"]],
[['text'=>"👤تنظیم سفارشات ممبر👤"],['text'=>"📋مدیریت ادمین ها📋"]],
[['text'=>"/start"],['text'=>"🎁ساخت کد هدیه🎁"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
////////////////---------------////////////////////////////////////////////////
elseif($text == "برترین ها"){	
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
$datas["step"] = "starttext672";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"نام جدید دکمه برترین ها را ارسال نمایید

نام فعلی : $dok7",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"/start"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($step == "starttext672" && $text != "/start"){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("data/dok7.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"با موفقیت تنظیم شد

نام جدید : $text",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"📈آمار ربات📉"],['text'=>"🕴🏻پیام به کاربر🕴🏻"]],
[['text'=>"پیام همگانی🚀"],['text'=>"فروارد همگانی🔱"]],
[['text'=>"اهدای الماس🎁"],['text'=>"کسر الماس〽️"]],
[['text'=>"اخطار به کاربر💢"],['text'=>"حذف اخطار💢️"]],
[['text'=>"تنظیم متن و الماس⚙"],['text'=>"⚙تنظیم دکمه"]],
[['text'=>"تنظیم فروشگاه🛒"],['text'=>"🎆تنظیم عکس"]],
[['text'=>"👤تنظیم سفارشات ممبر👤"],['text'=>"📋مدیریت ادمین ها📋"]],
[['text'=>"/start"],['text'=>"🎁ساخت کد هدیه🎁"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
////////////////---------------////////////////////////////////////////////////
elseif($text == "زیر مجموعه گیری"){	
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
$datas["step"] = "starttext671";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"نام جدید دکمه زیر مجموعه گیری را ارسال نمایید

نام فعلی : $dok6",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"/start"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($step == "starttext671" && $text != "/start"){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("data/dok6.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"با موفقیت تنظیم شد

نام جدید : $text",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"📈آمار ربات📉"],['text'=>"🕴🏻پیام به کاربر🕴🏻"]],
[['text'=>"پیام همگانی🚀"],['text'=>"فروارد همگانی🔱"]],
[['text'=>"اهدای الماس🎁"],['text'=>"کسر الماس〽️"]],
[['text'=>"اخطار به کاربر💢"],['text'=>"حذف اخطار💢️"]],
[['text'=>"تنظیم متن و الماس⚙"],['text'=>"⚙تنظیم دکمه"]],
[['text'=>"تنظیم فروشگاه🛒"],['text'=>"🎆تنظیم عکس"]],
[['text'=>"👤تنظیم سفارشات ممبر👤"],['text'=>"📋مدیریت ادمین ها📋"]],
[['text'=>"/start"],['text'=>"🎁ساخت کد هدیه🎁"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
////////////////---------------////////////////////////////////////////////////
elseif($text == "فروشگاه"){	
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
$datas["step"] = "starttext670";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"نام جدید دکمه فروشگاه را ارسال نمایید

نام فعلی : $dok5",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"/start"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($step == "starttext670" && $text != "/start"){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("data/dok5.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"با موفقیت تنظیم شد

نام جدید : $text",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"📈آمار ربات📉"],['text'=>"🕴🏻پیام به کاربر🕴🏻"]],
[['text'=>"پیام همگانی🚀"],['text'=>"فروارد همگانی🔱"]],
[['text'=>"اهدای الماس🎁"],['text'=>"کسر الماس〽️"]],
[['text'=>"اخطار به کاربر💢"],['text'=>"حذف اخطار💢️"]],
[['text'=>"تنظیم متن و الماس⚙"],['text'=>"⚙تنظیم دکمه"]],
[['text'=>"تنظیم فروشگاه🛒"],['text'=>"🎆تنظیم عکس"]],
[['text'=>"👤تنظیم سفارشات ممبر👤"],['text'=>"📋مدیریت ادمین ها📋"]],
[['text'=>"/start"],['text'=>"🎁ساخت کد هدیه🎁"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
////////////////---------------////////////////////////////////////////////////
elseif($text == "سفارش ممبر"){	
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
$datas["step"] = "starttext669";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"نام جدید دکمه سفارش ممبر را ارسال نمایید

نام فعلی : $dok4",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"/start"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($step == "starttext669" && $text != "/start"){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("data/dok4.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"با موفقیت تنظیم شد

نام جدید : $text",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"📈آمار ربات📉"],['text'=>"🕴🏻پیام به کاربر🕴🏻"]],
[['text'=>"پیام همگانی🚀"],['text'=>"فروارد همگانی🔱"]],
[['text'=>"اهدای الماس🎁"],['text'=>"کسر الماس〽️"]],
[['text'=>"اخطار به کاربر💢"],['text'=>"حذف اخطار💢️"]],
[['text'=>"تنظیم متن و الماس⚙"],['text'=>"⚙تنظیم دکمه"]],
[['text'=>"تنظیم فروشگاه🛒"],['text'=>"🎆تنظیم عکس"]],
[['text'=>"👤تنظیم سفارشات ممبر👤"],['text'=>"📋مدیریت ادمین ها📋"]],
[['text'=>"/start"],['text'=>"🎁ساخت کد هدیه🎁"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
////////////////---------------////////////////////////////////////////////////
elseif($text == "قوانین"){	
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
$datas["step"] = "starttext668";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"نام جدید دکمه قوانین را ارسال نمایید

نام فعلی : $dok3",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"/start"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($step == "starttext668" && $text != "/start"){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("data/dok3.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"با موفقیت تنظیم شد

نام جدید : $text",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"📈آمار ربات📉"],['text'=>"🕴🏻پیام به کاربر🕴🏻"]],
[['text'=>"پیام همگانی🚀"],['text'=>"فروارد همگانی🔱"]],
[['text'=>"اهدای الماس🎁"],['text'=>"کسر الماس〽️"]],
[['text'=>"اخطار به کاربر💢"],['text'=>"حذف اخطار💢️"]],
[['text'=>"تنظیم متن و الماس⚙"],['text'=>"⚙تنظیم دکمه"]],
[['text'=>"تنظیم فروشگاه🛒"],['text'=>"🎆تنظیم عکس"]],
[['text'=>"👤تنظیم سفارشات ممبر👤"],['text'=>"📋مدیریت ادمین ها📋"]],
[['text'=>"/start"],['text'=>"🎁ساخت کد هدیه🎁"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
////////////////---------------////////////////////////////////////////////////
elseif($text == "پروفایل"){	
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
$datas["step"] = "starttext667";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"نام جدید دکمه پروفایل را ارسال نمایید

نام فعلی : $dok2",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"/start"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($step == "starttext667" && $text != "/start"){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("data/dok2.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"با موفقیت تنظیم شد

نام جدید : $text",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"📈آمار ربات📉"],['text'=>"🕴🏻پیام به کاربر🕴🏻"]],
[['text'=>"پیام همگانی🚀"],['text'=>"فروارد همگانی🔱"]],
[['text'=>"اهدای الماس🎁"],['text'=>"کسر الماس〽️"]],
[['text'=>"اخطار به کاربر💢"],['text'=>"حذف اخطار💢️"]],
[['text'=>"تنظیم متن و الماس⚙"],['text'=>"⚙تنظیم دکمه"]],
[['text'=>"تنظیم فروشگاه🛒"],['text'=>"🎆تنظیم عکس"]],
[['text'=>"👤تنظیم سفارشات ممبر👤"],['text'=>"📋مدیریت ادمین ها📋"]],
[['text'=>"/start"],['text'=>"🎁ساخت کد هدیه🎁"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
////////////////---------------////////////////////////////////////////////////
elseif($text == "دریافت الماس رایگان"){	
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
$datas["step"] = "starttext666";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"نام جدید دکمه دریافت الماس رایگان را ارسال نمایید

نام فعلی : $dok1",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"/start"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($step == "starttext666" && $text != "/start"){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("data/dok1.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"با موفقیت تنظیم شد

نام جدید : $text",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"📈آمار ربات📉"],['text'=>"🕴🏻پیام به کاربر🕴🏻"]],
[['text'=>"پیام همگانی🚀"],['text'=>"فروارد همگانی🔱"]],
[['text'=>"اهدای الماس🎁"],['text'=>"کسر الماس〽️"]],
[['text'=>"اخطار به کاربر💢"],['text'=>"حذف اخطار💢️"]],
[['text'=>"تنظیم متن و الماس⚙"],['text'=>"⚙تنظیم دکمه"]],
[['text'=>"تنظیم فروشگاه🛒"],['text'=>"🎆تنظیم عکس"]],
[['text'=>"👤تنظیم سفارشات ممبر👤"],['text'=>"📋مدیریت ادمین ها📋"]],
[['text'=>"/start"],['text'=>"🎁ساخت کد هدیه🎁"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
////////////////---------------////////////////////////////////////////////////
elseif($text == "کد هدیه"){	
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
$datas["step"] = "starttextgif1";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"نام جدید دکمه *کد هدیه* را ارسال نمایید

نام فعلی : $dok12",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"/start"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($step == "starttextgif1" && $text != "/start"){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("data/dok12.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"با موفقیت تنظیم شد

نام جدید : $text",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"دریافت الماس رایگان"]],
[['text'=>"پروفایل"],['text'=>"قوانین"],['text'=>"سفارش ممبر"]],
[['text'=>"فروشگاه"],['text'=>"زیر مجموعه گیری"]],
[['text'=>"برترین ها"],['text'=>"پیگیری سفارشات"]],
[['text'=>"کد هدیه"],['text'=>"انتقال الماس"]],
[['text'=>"جمع آوری در کانال"],['text'=>"الماس روزانه"]],
[['text'=>"⚙تنظیم دکمه کانال"]],
[['text'=>"/panel"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
////////////////---------------////////////////////////////////////////////////
elseif($text == "جمع آوری در کانال"){	
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
$datas["step"] = "starttextchanneldok";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"نام جدید دکمه *جمع آوری در کانال* را ارسال نمایید

نام فعلی : $dokchannel",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"/start"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($step == "starttextchanneldok" && $text != "/start"){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("data/dokchannel.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"با موفقیت تنظیم شد

نام جدید : $text",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"دریافت الماس رایگان"]],
[['text'=>"پروفایل"],['text'=>"قوانین"],['text'=>"سفارش ممبر"]],
[['text'=>"فروشگاه"],['text'=>"زیر مجموعه گیری"]],
[['text'=>"برترین ها"],['text'=>"پیگیری سفارشات"]],
[['text'=>"کد هدیه"],['text'=>"انتقال الماس"]],
[['text'=>"جمع آوری در کانال"],['text'=>"الماس روزانه"]],
[['text'=>"⚙تنظیم دکمه کانال"]],
[['text'=>"/panel"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
////////////////---------------////////////////////////////////////////////////
elseif($text == "الماس روزانه"){	
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
$datas["step"] = "starttextdokdaily";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"نام جدید دکمه *الماس روزانه* را ارسال نمایید

نام فعلی : $dokday",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"/start"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($step == "starttextdokdaily" && $text != "/start"){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("data/dokday.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"با موفقیت تنظیم شد

نام جدید : $text",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"دریافت الماس رایگان"]],
[['text'=>"پروفایل"],['text'=>"قوانین"],['text'=>"سفارش ممبر"]],
[['text'=>"فروشگاه"],['text'=>"زیر مجموعه گیری"]],
[['text'=>"برترین ها"],['text'=>"پیگیری سفارشات"]],
[['text'=>"کد هدیه"],['text'=>"انتقال الماس"]],
[['text'=>"جمع آوری در کانال"],['text'=>"الماس روزانه"]],
[['text'=>"⚙تنظیم دکمه کانال"]],
[['text'=>"/panel"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
////////////////---------------////////////////////////////////////////////////
elseif($text == "انتقال الماس"){	
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
$datas["step"] = "starttextgif125";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"نام جدید دکمه *انتقال الماس* را ارسال نمایید

نام فعلی : $dok13",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"/start"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($step == "starttextgif125" && $text != "/start"){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("data/dok13.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"با موفقیت تنظیم شد

نام جدید : $text",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"دریافت الماس رایگان"]],
[['text'=>"پروفایل"],['text'=>"قوانین"],['text'=>"سفارش ممبر"]],
[['text'=>"فروشگاه"],['text'=>"زیر مجموعه گیری"]],
[['text'=>"برترین ها"],['text'=>"پیگیری سفارشات"]],
[['text'=>"کد هدیه"],['text'=>"انتقال الماس"]],
[['text'=>"جمع آوری در کانال"],['text'=>"الماس روزانه"]],
[['text'=>"⚙تنظیم دکمه کانال"]],
[['text'=>"/panel"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
elseif($text == "تنظیم متن جمع آوری در کانال"){	
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
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
[['text'=>"/start"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($step == "starttext117chann" && $text != "/start"){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("data/dokchannel2.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"تنظیم شد!",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"📈آمار ربات📉"],['text'=>"🕴🏻پیام به کاربر🕴🏻"]],
[['text'=>"پیام همگانی🚀"],['text'=>"فروارد همگانی🔱"]],
[['text'=>"اهدای الماس🎁"],['text'=>"کسر الماس〽️"]],
[['text'=>"اخطار به کاربر💢"],['text'=>"حذف اخطار💢️"]],
[['text'=>"تنظیم متن و الماس⚙"],['text'=>"⚙تنظیم دکمه"]],
[['text'=>"تنظیم فروشگاه🛒"],['text'=>"🎆تنظیم عکس"]],
[['text'=>"👤تنظیم سفارشات ممبر👤"],['text'=>"📋مدیریت ادمین ها📋"]],
[['text'=>"/start"],['text'=>"🎁ساخت کد هدیه🎁"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($text == "تنظیم متن دریافت الماس رایگان"){	
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
$datas["step"] = "starttext117DAR";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"متن جمع دریافت الماس  را ارسال کنید
به جای نام NAME
به جای یوزرنیم @USER
و به جای نام خانوادگی LAST
و به جای آیدی عددی ID

را در متن قرار دهید تا جایگزین شود!",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"/start"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($step == "starttext117DAR" && $text != "/start"){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("data/almasgett.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"تنظیم شد!",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"📈آمار ربات📉"],['text'=>"🕴🏻پیام به کاربر🕴🏻"]],
[['text'=>"پیام همگانی🚀"],['text'=>"فروارد همگانی🔱"]],
[['text'=>"اهدای الماس🎁"],['text'=>"کسر الماس〽️"]],
[['text'=>"اخطار به کاربر💢"],['text'=>"حذف اخطار💢️"]],
[['text'=>"تنظیم متن و الماس⚙"],['text'=>"⚙تنظیم دکمه"]],
[['text'=>"تنظیم فروشگاه🛒"],['text'=>"🎆تنظیم عکس"]],
[['text'=>"👤تنظیم سفارشات ممبر??"],['text'=>"📋مدیریت ادمین ها📋"]],
[['text'=>"/start"],['text'=>"🎁ساخت کد هدیه🎁"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($text == "تنظیم پورسانت زیرمجموعه"){	
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
$datas["step"] = "starttext11";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"تعداد الماس دریافتی برای پورسانت عضویت کانال زیرمجموعه برای هر سفارش را با حروف انگلیسی وارد نمایید
مثال : 0.2",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"/start"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($step == "starttext11" && $text != "/start"){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("data/porsant.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"تنظیم شد!",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"📈آمار ربات📉"],['text'=>"🕴🏻پیام به کاربر🕴🏻"]],
[['text'=>"پیام همگانی🚀"],['text'=>"فروارد همگانی🔱"]],
[['text'=>"اهدای الماس🎁"],['text'=>"کسر الماس〽️"]],
[['text'=>"اخطار به کاربر💢"],['text'=>"حذف اخطار💢️"]],
[['text'=>"تنظیم متن و الماس⚙"],['text'=>"⚙تنظیم دکمه"]],
[['text'=>"تنظیم فروشگاه🛒"],['text'=>"🎆تنظیم عکس"]],
[['text'=>"👤تنظیم سفارشات ممبر👤"],['text'=>"📋مدیریت ادمین ها📋"]],
[['text'=>"/start"],['text'=>"🎁ساخت کد هدیه🎁"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
//////---////----///------------/----/---/-/-/-/-----//////////////////
elseif($text == "تنظیم الماس عضویت"){	
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
$datas["step"] = "starttext22";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"تعداد الماس دریافتی برای عضویت در هر کانال را با حروف انگلیسی وارد نمایید
مثال : 1",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"/start"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($step == "starttext22" && $text != "/start"){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("data/coinamount.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"تنظیم شد!",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"📈آمار ربات📉"],['text'=>"🕴🏻پیام به کاربر🕴🏻"]],
[['text'=>"پیام همگانی🚀"],['text'=>"فروارد همگانی🔱"]],
[['text'=>"اهدای الماس🎁"],['text'=>"کسر الماس〽️"]],
[['text'=>"اخطار به کاربر💢"],['text'=>"حذف اخطار💢️"]],
[['text'=>"تنظیم متن و الماس⚙"],['text'=>"⚙تنظیم دکمه"]],
[['text'=>"تنظیم فروشگاه🛒"],['text'=>"🎆تنظیم عکس"]],
[['text'=>"👤تنظیم سفارشات ممبر👤"],['text'=>"📋مدیریت ادمین ها📋"]],
[['text'=>"/start"],['text'=>"🎁ساخت کد هدیه🎁"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
//////////------////////////////////////-------------------/////////////
elseif($text == "تنظیم الماس ورودی"){	
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
$datas["step"] = "starttextjoi1";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"تعداد الماس دریافتی در صورت ورود به ربات را با حروف انگلیسی وارد نمایید
میزان فعلی : $joinmcoin",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"/start"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($step == "starttextjoi1" && $text != "/start"){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("data/joinmcoin.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"با موفقیت ثبت شد

میزان جدید : $text",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"📈آمار ربات📉"],['text'=>"🕴🏻پیام به کاربر🕴🏻"]],
[['text'=>"پیام همگانی🚀"],['text'=>"فروارد همگانی🔱"]],
[['text'=>"اهدای الماس🎁"],['text'=>"کسر الماس〽️"]],
[['text'=>"اخطار به کاربر💢"],['text'=>"حذف اخطار💢️"]],
[['text'=>"تنظیم متن و الماس⚙"],['text'=>"⚙تنظیم دکمه"]],
[['text'=>"تنظیم فروشگاه🛒"],['text'=>"🎆تنظیم عکس"]],
[['text'=>"👤تنظیم سفارشات ممبر👤"],['text'=>"📋مدیریت ادمین ها📋"]],
[['text'=>"/start"],['text'=>"🎁ساخت کد هدیه🎁"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
//////////////////////////////////
elseif($text == "تنظیم الماس روزانه"){	
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
$datas["step"] = "starttextmdaily";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"تعداد الماس روزانه را با حروف انگلیسی وارد نمایید
میزان فعلی : $mdaily",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"/start"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($step == "starttextmdaily" && $text != "/start"){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("data/mdaily.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"با موفقیت ثبت شد

میزان جدید : $text",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"📈آمار ربات📉"],['text'=>"🕴🏻پیام به کاربر🕴🏻"]],
[['text'=>"پیام همگانی🚀"],['text'=>"فروارد همگانی🔱"]],
[['text'=>"اهدای الماس🎁"],['text'=>"کسر الماس〽️"]],
[['text'=>"اخطار به کاربر💢"],['text'=>"حذف اخطار💢️"]],
[['text'=>"تنظیم متن و الماس⚙"],['text'=>"⚙تنظیم دکمه"]],
[['text'=>"تنظیم فروشگاه🛒"],['text'=>"🎆تنظیم عکس"]],
[['text'=>"👤تنظیم سفارشات ممبر👤"],['text'=>"📋مدیریت ادمین ها📋"]],
[['text'=>"/start"],['text'=>"🎁ساخت کد هدیه🎁"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
//////////////////////////////////
elseif($text == "تنظیم متن استارت"){	
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
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
[['text'=>"/start"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($step == "starttext" && $text != "/start"){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("data/starttext.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"تنظیم شد!",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"📈آمار ربات📉"],['text'=>"🕴🏻پیام به کاربر🕴🏻"]],
[['text'=>"پیام همگانی🚀"],['text'=>"فروارد همگانی🔱"]],
[['text'=>"اهدای الماس🎁"],['text'=>"کسر الماس〽️"]],
[['text'=>"اخطار به کاربر💢"],['text'=>"حذف اخطار💢️"]],
[['text'=>"تنظیم متن و الماس⚙"],['text'=>"⚙تنظیم دکمه"]],
[['text'=>"تنظیم فروشگاه🛒"],['text'=>"🎆تنظیم عکس"]],
[['text'=>"👤تنظیم سفارشات ممبر👤"],['text'=>"📋مدیریت ادمین ها📋"]],
[['text'=>"/start"],['text'=>"🎁ساخت کد هدیه🎁"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
//----------------------------------------------------------------------
elseif($text == "تعداد عضویت 1"){	
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
$datas["step"] = "psefatesh1";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"میزان عضویت ممبر پلان اول را ارسال نمایید

میزان فعلی : $mmbrsabt1",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"/panel"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($step == "psefatesh1" && $text != "/panel"){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("data/mmbrsabt1.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"با موفقیت ثبت شد

میزان جدید : $text",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"تعداد عضویت 2"],['text'=>"تعداد عضویت 1"]],
[['text'=>"تعداد عضویت 4"],['text'=>"تعداد عضویت 3"]],
[['text'=>"تعداد عضویت 6"],['text'=>"تعداد عضویت 5"]],
[['text'=>"تعداد الماس 2"],['text'=>"تعداد الماس 1"]],
[['text'=>"تعداد الماس 4"],['text'=>"تعداد الماس 3"]],
[['text'=>"تعداد الماس 6"],['text'=>"تعداد الماس 5"]],
[['text'=>"/panel"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
//----------------------------------------------------------------------
elseif($text == "تعداد عضویت 2"){	
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
$datas["step"] = "psefatesh2";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"میزان عضویت ممبر پلان دوم را ارسال نمایید

میزان فعلی : $mmbrsabt2",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"/panel"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($step == "psefatesh2" && $text != "/panel"){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("data/mmbrsabt2.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"با موفقیت ثبت شد

میزان جدید : $text",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"تعداد عضویت 2"],['text'=>"تعداد عضویت 1"]],
[['text'=>"تعداد عضویت 4"],['text'=>"تعداد عضویت 3"]],
[['text'=>"تعداد عضویت 6"],['text'=>"تعداد عضویت 5"]],
[['text'=>"تعداد الماس 2"],['text'=>"تعداد الماس 1"]],
[['text'=>"تعداد الماس 4"],['text'=>"تعداد الماس 3"]],
[['text'=>"تعداد الماس 6"],['text'=>"تعداد الماس 5"]],
[['text'=>"/panel"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
//----------------------------------------------------------------------
elseif($text == "تعداد عضویت 3"){	
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
$datas["step"] = "psefatesh3";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"میزان عضویت ممبر پلان سوم را ارسال نمایید

میزان فعلی : $mmbrsabt3",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"/panel"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($step == "psefatesh3" && $text != "/panel"){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("data/mmbrsabt3.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"با موفقیت ثبت شد

میزان جدید : $text",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"تعداد عضویت 2"],['text'=>"تعداد عضویت 1"]],
[['text'=>"تعداد عضویت 4"],['text'=>"تعداد عضویت 3"]],
[['text'=>"تعداد عضویت 6"],['text'=>"تعداد عضویت 5"]],
[['text'=>"تعداد الماس 2"],['text'=>"تعداد الماس 1"]],
[['text'=>"تعداد الماس 4"],['text'=>"تعداد الماس 3"]],
[['text'=>"تعداد الماس 6"],['text'=>"تعداد الماس 5"]],
[['text'=>"/panel"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
//----------------------------------------------------------------------
elseif($text == "تعداد عضویت 4"){	
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
$datas["step"] = "psefatesh4";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"میزان عضویت ممبر پلان چهارم را ارسال نمایید

میزان فعلی : $mmbrsabt4",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"/panel"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($step == "psefatesh4" && $text != "/panel"){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("data/mmbrsabt4.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"با موفقیت ثبت شد

میزان جدید : $text",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"تعداد عضویت 2"],['text'=>"تعداد عضویت 1"]],
[['text'=>"تعداد عضویت 4"],['text'=>"تعداد عضویت 3"]],
[['text'=>"تعداد عضویت 6"],['text'=>"تعداد عضویت 5"]],
[['text'=>"تعداد الماس 2"],['text'=>"تعداد الماس 1"]],
[['text'=>"تعداد الماس 4"],['text'=>"تعداد الماس 3"]],
[['text'=>"تعداد الماس 6"],['text'=>"تعداد الماس 5"]],
[['text'=>"/panel"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
//----------------------------------------------------------------------
elseif($text == "تعداد عضویت 5"){	
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
$datas["step"] = "psefatesh5";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"میزان عضویت ممبر پلان پنجم را ارسال نمایید

میزان فعلی : $mmbrsabt5",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"/panel"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($step == "psefatesh5" && $text != "/panel"){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("data/mmbrsabt5.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"با موفقیت ثبت شد

میزان جدید : $text",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"تعداد عضویت 2"],['text'=>"تعداد عضویت 1"]],
[['text'=>"تعداد عضویت 4"],['text'=>"تعداد عضویت 3"]],
[['text'=>"تعداد عضویت 6"],['text'=>"تعداد عضویت 5"]],
[['text'=>"تعداد الماس 2"],['text'=>"تعداد الماس 1"]],
[['text'=>"تعداد الماس 4"],['text'=>"تعداد الماس 3"]],
[['text'=>"تعداد الماس 6"],['text'=>"تعداد الماس 5"]],
[['text'=>"/panel"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
//----------------------------------------------------------------------
elseif($text == "تعداد عضویت 6"){	
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
$datas["step"] = "psefatesh6";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"میزان عضویت ممبر پلان ششم را ارسال نمایید

میزان فعلی : $mmbrsabt6",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"/panel"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($step == "psefatesh6" && $text != "/panel"){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("data/mmbrsabt6.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"با موفقیت ثبت شد

میزان جدید : $text",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"تعداد عضویت 2"],['text'=>"تعداد عضویت 1"]],
[['text'=>"تعداد عضویت 4"],['text'=>"تعداد عضویت 3"]],
[['text'=>"تعداد عضویت 6"],['text'=>"تعداد عضویت 5"]],
[['text'=>"تعداد الماس 2"],['text'=>"تعداد الماس 1"]],
[['text'=>"تعداد الماس 4"],['text'=>"تعداد الماس 3"]],
[['text'=>"تعداد الماس 6"],['text'=>"تعداد الماس 5"]],
[['text'=>"/panel"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
//----------------------------------------------------------------------
elseif($text == "تعداد الماس 1"){	
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
$datas["step"] = "psefatesh11";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"میزان الماس لازم برای سفارش ممبر پلان 1 را ارسال نمایید

میزان فعلی : $mmbrsabt11",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"/panel"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($step == "psefatesh11" && $text != "/panel"){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("data/mmbrsabt11.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"با موفقیت ثبت شد

میزان جدید : $text",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"تعداد عضویت 2"],['text'=>"تعداد عضویت 1"]],
[['text'=>"تعداد عضویت 4"],['text'=>"تعداد عضویت 3"]],
[['text'=>"تعداد عضویت 6"],['text'=>"تعداد عضویت 5"]],
[['text'=>"تعداد الماس 2"],['text'=>"تعداد الماس 1"]],
[['text'=>"تعداد الماس 4"],['text'=>"تعداد الماس 3"]],
[['text'=>"تعداد الماس 6"],['text'=>"تعداد الماس 5"]],
[['text'=>"/panel"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
//----------------------------------------------------------------------
elseif($text == "تعداد الماس 2"){	
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
$datas["step"] = "psefatesh22";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"میزان الماس لازم برای سفارش ممبر پلان 2 را ارسال نمایید

میزان فعلی : $mmbrsabt22",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"/panel"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($step == "psefatesh22" && $text != "/panel"){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("data/mmbrsabt22.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"با موفقیت ثبت شد

میزان جدید : $text",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"تعداد عضویت 2"],['text'=>"تعداد عضویت 1"]],
[['text'=>"تعداد عضویت 4"],['text'=>"تعداد عضویت 3"]],
[['text'=>"تعداد عضویت 6"],['text'=>"تعداد عضویت 5"]],
[['text'=>"تعداد الماس 2"],['text'=>"تعداد الماس 1"]],
[['text'=>"تعداد الماس 4"],['text'=>"تعداد الماس 3"]],
[['text'=>"تعداد الماس 6"],['text'=>"تعداد الماس 5"]],
[['text'=>"/panel"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
//----------------------------------------------------------------------
elseif($text == "تعداد الماس 3"){	
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
$datas["step"] = "psefatesh33";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"میزان الماس لازم برای سفارش ممبر پلان 3 را ارسال نمایید

میزان فعلی : $mmbrsabt33",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"/panel"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($step == "psefatesh33" && $text != "/panel"){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("data/mmbrsabt33.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"با موفقیت ثبت شد

میزان جدید : $text",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"تعداد عضویت 2"],['text'=>"تعداد عضویت 1"]],
[['text'=>"تعداد عضویت 4"],['text'=>"تعداد عضویت 3"]],
[['text'=>"تعداد عضویت 6"],['text'=>"تعداد عضویت 5"]],
[['text'=>"تعداد الماس 2"],['text'=>"تعداد الماس 1"]],
[['text'=>"تعداد الماس 4"],['text'=>"تعداد الماس 3"]],
[['text'=>"تعداد الماس 6"],['text'=>"تعداد الماس 5"]],
[['text'=>"/panel"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
//----------------------------------------------------------------------
elseif($text == "تعداد الماس 4"){	
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
$datas["step"] = "psefatesh44";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"میزان الماس لازم برای سفارش ممبر پلان 4 را ارسال نمایید

میزان فعلی : $mmbrsabt44",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"/panel"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($step == "psefatesh44" && $text != "/panel"){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("data/mmbrsabt44.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"با موفقیت ثبت شد

میزان جدید : $text",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"تعداد عضویت 2"],['text'=>"تعداد عضویت 1"]],
[['text'=>"تعداد عضویت 4"],['text'=>"تعداد عضویت 3"]],
[['text'=>"تعداد عضویت 6"],['text'=>"تعداد عضویت 5"]],
[['text'=>"تعداد الماس 2"],['text'=>"تعداد الماس 1"]],
[['text'=>"تعداد الماس 4"],['text'=>"تعداد الماس 3"]],
[['text'=>"تعداد الماس 6"],['text'=>"تعداد الماس 5"]],
[['text'=>"/panel"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
//----------------------------------------------------------------------
elseif($text == "تعداد الماس 5"){	
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
$datas["step"] = "psefatesh55";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"میزان الماس لازم برای سفارش ممبر پلان 5 را ارسال نمایید

میزان فعلی : $mmbrsabt55",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"/panel"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($step == "psefatesh55" && $text != "/panel"){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("data/mmbrsabt55.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"با موفقیت ثبت شد

میزان جدید : $text",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"تعداد عضویت 2"],['text'=>"تعداد عضویت 1"]],
[['text'=>"تعداد عضویت 4"],['text'=>"تعداد عضویت 3"]],
[['text'=>"تعداد عضویت 6"],['text'=>"تعداد عضویت 5"]],
[['text'=>"تعداد الماس 2"],['text'=>"تعداد الماس 1"]],
[['text'=>"تعداد الماس 4"],['text'=>"تعداد الماس 3"]],
[['text'=>"تعداد الماس 6"],['text'=>"تعداد الماس 5"]],
[['text'=>"/panel"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
//----------------------------------------------------------------------
elseif($text == "تعداد الماس 6"){	
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
$datas["step"] = "psefatesh66";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"میزان الماس لازم برای سفارش ممبر پلان 6 را ارسال نمایید

میزان فعلی : $mmbrsabt66",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"/panel"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($step == "psefatesh66" && $text != "/panel"){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("data/mmbrsabt66.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"با موفقیت ثبت شد

میزان جدید : $text",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"تعداد عضویت 2"],['text'=>"تعداد عضویت 1"]],
[['text'=>"تعداد عضویت 4"],['text'=>"تعداد عضویت 3"]],
[['text'=>"تعداد عضویت 6"],['text'=>"تعداد عضویت 5"]],
[['text'=>"تعداد الماس 2"],['text'=>"تعداد الماس 1"]],
[['text'=>"تعداد الماس 4"],['text'=>"تعداد الماس 3"]],
[['text'=>"تعداد الماس 6"],['text'=>"تعداد الماس 5"]],
[['text'=>"/panel"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
//----------------------------------------------------------------------
elseif($text == "نام محصول اول"){	
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
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
[['text'=>"/panel"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($step == "mshopnam1" && $text != "/panel"){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
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
[['text'=>"نصب درگاه پرداخت"]],
[['text'=>"/panel"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
elseif($text == "نام محصول دوم"){	
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
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
[['text'=>"/panel"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($step == "mshopnam2" && $text != "/panel"){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
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
[['text'=>"نصب درگاه پرداخت"]],
[['text'=>"/panel"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
//----------------------------------------------------------------------
elseif($text == "نام محصول سوم"){	
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
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
[['text'=>"/panel"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($step == "mshopnam3" && $text != "/panel"){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
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
[['text'=>"نصب درگاه پرداخت"]],
[['text'=>"/panel"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
//----------------------------------------------------------------------
elseif($text == "نام محصول چهارم"){	
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
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
[['text'=>"/panel"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($step == "mshopnam4" && $text != "/panel"){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
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
[['text'=>"نصب درگاه پرداخت"]],
[['text'=>"/panel"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
//----------------------------------------------------------------------
elseif($text == "نام محصول پنجم"){	
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
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
[['text'=>"/panel"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($step == "mshopnam5" && $text != "/panel"){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
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
[['text'=>"نصب درگاه پرداخت"]],
[['text'=>"/panel"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
//----------------------------------------------------------------------
elseif($text == "نام محصول ششم"){	
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
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
[['text'=>"/panel"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($step == "mshopnam6" && $text != "/panel"){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
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
[['text'=>"نصب درگاه پرداخت"]],
[['text'=>"/panel"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
//----------------------------------------------------------------------
elseif($text == "نصب درگاه پرداخت"){	
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
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
[['text'=>"/panel"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($step == "mshopnam7" && $text != "/panel"){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("data/mshoplink.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"با موفقیت ثبت شد

لینک جدید : [$text]",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"نام محصول دوم"],['text'=>"نام محصول اول"]],
[['text'=>"نام محصول چهارم"],['text'=>"نام محصول سوم"]],
[['text'=>"نام محصول ششم"],['text'=>"نام محصول پنجم"]],
[['text'=>"نصب درگاه پرداخت"]],
[['text'=>"/panel"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
//----------------------------------------------------------------------
elseif($text == "اخطار به کاربر💢"){	
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
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
[['text'=>"/start"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($step == "getid" && $text != "/start"){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
if(file_exists("data/$text/$text.json")){
$datas["step"] = "sendwarn";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("data/id.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"چند اخطار به کاربر داده شود؟!",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"/start"]],
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
[['text'=>"/start"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}}
elseif($step == "sendwarn" && $text != "/start"){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
if(is_numeric($text)){
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
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"📈آمار ربات📉"],['text'=>"🕴🏻پیام به کاربر🕴🏻"]],
[['text'=>"پیام همگانی🚀"],['text'=>"فروارد همگانی🔱"]],
[['text'=>"اهدای الماس🎁"],['text'=>"کسر الماس〽️"]],
[['text'=>"اخطار به کاربر💢"],['text'=>"حذف اخطار💢️"]],
[['text'=>"تنظیم متن و الماس⚙"],['text'=>"⚙تنظیم دکمه"]],
[['text'=>"تنظیم فروشگاه🛒"],['text'=>"🎆تنظیم عکس"]],
[['text'=>"👤تنظیم سفارشات ممبر👤"],['text'=>"📋مدیریت ادمین ها📋"]],
[['text'=>"/start"],['text'=>"🎁ساخت کد هدیه🎁"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"لطفا عدد ارسال کنید!",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"/start"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}}
//////////----------------/////////////////////////////////////////
elseif($text == "اهدای الماس🎁"){	
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
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
[['text'=>"/start"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($step == "getid2" && $text != "/start"){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
if(file_exists("data/$text/$text.json")){
$datas["step"] = "sendcoin2";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("data/id.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"چند الماس به کاربر داده شود؟!",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"/start"]],
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
[['text'=>"/start"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}}
elseif($step == "sendcoin2" && $text != "/start"){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
if(is_numeric($text)){
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
'text'=>"از طرف مدیریت به شما *$text* الماس داده شد!",
'parse_mode'=>"MarkDown",
]); 
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"*$text* الماس به *$id* ارسال گردید",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"📈آمار ربات📉"],['text'=>"🕴🏻پیام به کاربر🕴🏻"]],
[['text'=>"پیام همگانی🚀"],['text'=>"فروارد همگانی🔱"]],
[['text'=>"اهدای الماس🎁"],['text'=>"کسر الماس〽️"]],
[['text'=>"اخطار به کاربر💢"],['text'=>"حذف اخطار💢️"]],
[['text'=>"تنظیم متن و الماس⚙"],['text'=>"⚙تنظیم دکمه"]],
[['text'=>"تنظیم فروشگاه🛒"],['text'=>"🎆تنظیم عکس"]],
[['text'=>"👤تنظیم سفارشات ممبر👤"],['text'=>"📋مدیریت ادمین ها📋"]],
[['text'=>"/start"],['text'=>"🎁ساخت کد هدیه🎁"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"لطفا عدد ارسال کنید!",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"/start"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}}
//----------------------------------------------------------------------
elseif($text == "🎁ساخت کد هدیه🎁"){	
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
$datas["step"] = "getid2gg";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"کد هدیه جدید را ارسال نمایید",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"/start"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($step == "getid2gg" && $text != "/start"){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
$datas["step"] = "sendcoin2gg";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("newgiftm.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"این کد شامل چند الماس باشد؟",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"/start"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
elseif($step == "sendcoin2gg" && $text != "/start"){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
if(is_numeric($text)){
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
$newgiftm = file_get_contents("newgiftm.txt");
file_put_contents("data/codes/$newgiftm.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"کد *$newgiftm* به ارزش *$text* الماس با موفقیت ساخته شد",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"📈آمار ربات📉"],['text'=>"🕴🏻پیام به کاربر🕴🏻"]],
[['text'=>"پیام همگانی🚀"],['text'=>"فروارد همگانی🔱"]],
[['text'=>"اهدای الماس🎁"],['text'=>"کسر الماس〽️"]],
[['text'=>"اخطار به کاربر💢"],['text'=>"حذف اخطار💢️"]],
[['text'=>"تنظیم متن و الماس⚙"],['text'=>"⚙تنظیم دکمه"]],
[['text'=>"تنظیم فروشگاه🛒"],['text'=>"🎆تنظیم عکس"]],
[['text'=>"👤تنظیم سفارشات ممبر👤"],['text'=>"📋مدیریت ادمین ها📋"]],
[['text'=>"/start"],['text'=>"🎁ساخت کد هدیه🎁"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
bot('sendMessage', [
'chat_id' =>"@[*[CHANNEL]*]",
'text' => "💌🎊کد هدیه جدید ساخته شد

🔅 🎈 🔅 🎈 🔅
✍🏻کد : $newgiftm
💎الماس : $text
🔅 🎈 🔅 🎈 🔅

@[*[USERNAME]*]",
]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"لطفا عدد ارسال کنید!",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"/start"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}}
//----------------------------------------------------------------------
elseif($text == "حذف اخطار💢️"){	
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
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
[['text'=>"/start"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($step == "getids" && $text != "/start"){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
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
[['text'=>"/start"]],
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
[['text'=>"/start"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}}
elseif($step == "sendwarns" && $text != "/start"){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
if(is_numeric($text)){
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
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"📈آمار ربات📉"],['text'=>"🕴🏻پیام به کاربر🕴🏻"]],
[['text'=>"پیام همگانی🚀"],['text'=>"فروارد همگانی🔱"]],
[['text'=>"اهدای الماس🎁"],['text'=>"کسر الماس〽️"]],
[['text'=>"اخطار به کاربر💢"],['text'=>"حذف اخطار💢️"]],
[['text'=>"تنظیم متن و الماس⚙"],['text'=>"⚙تنظیم دکمه"]],
[['text'=>"تنظیم فروشگاه🛒"],['text'=>"🎆تنظیم عکس"]],
[['text'=>"👤تنظیم سفارشات ممبر👤"],['text'=>"📋مدیریت ادمین ها📋"]],
[['text'=>"/start"],['text'=>"🎁ساخت کد هدیه🎁"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"لطفا عدد ارسال کنید!",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"/start"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}}
////////////------------//////////////////////////////////////////////////
elseif($text == "کسر الماس〽️"){	
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
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
[['text'=>"/start"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($step == "getids2" && $text != "/start"){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
if(file_exists("data/$text/$text.json")){
$datas["step"] = "sendcoins2";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("data/id.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"چند الماس از کاربر کسر شود؟!",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"/start"]],
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
[['text'=>"/start"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}}
elseif($step == "sendcoins2" && $text != "/start"){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
if(is_numeric($text)){
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
'text'=>"از طرف مدیریت از شما *$text* الماس کسر گردید!",
'parse_mode'=>"MarkDown",
]); 
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"*$text* الماس از *$id* کسر گردید",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"📈آمار ربات📉"],['text'=>"🕴🏻پیام به کاربر🕴🏻"]],
[['text'=>"پیام همگانی🚀"],['text'=>"فروارد همگانی🔱"]],
[['text'=>"اهدای الماس🎁"],['text'=>"کسر الماس〽️"]],
[['text'=>"اخطار به کاربر💢"],['text'=>"حذف اخطار💢️"]],
[['text'=>"تنظیم متن و الماس⚙"],['text'=>"⚙تنظیم دکمه"]],
[['text'=>"تنظیم فروشگاه🛒"],['text'=>"🎆تنظیم عکس"]],
[['text'=>"👤تنظیم سفارشات ممبر👤"],['text'=>"📋مدیریت ادمین ها📋"]],
[['text'=>"/start"],['text'=>"🎁ساخت کد هدیه🎁"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"لطفا عدد ارسال کنید!",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"/start"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}}
//////////----------------/////////////////////////////////////////
elseif($text == "🕴🏻پیام به کاربر🕴🏻"){	
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
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
[['text'=>"/start"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($step == "getid2000" && $text != "/start"){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
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
[['text'=>"/start"]],
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
[['text'=>"/start"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}}
elseif($step == "sendcoin2000" && $text != "/start"){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
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
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"📈آمار ربات📉"],['text'=>"🕴🏻پیام به کاربر🕴🏻"]],
[['text'=>"پیام همگانی🚀"],['text'=>"فروارد همگانی🔱"]],
[['text'=>"اهدای الماس🎁"],['text'=>"کسر الماس〽️"]],
[['text'=>"اخطار به کاربر💢"],['text'=>"حذف اخطار💢️"]],
[['text'=>"تنظیم متن و الماس⚙"],['text'=>"⚙تنظیم دکمه"]],
[['text'=>"تنظیم فروشگاه🛒"],['text'=>"🎆تنظیم عکس"]],
[['text'=>"👤تنظیم سفارشات ممبر👤"],['text'=>"📋مدیریت ادمین ها📋"]],
[['text'=>"/start"],['text'=>"🎁ساخت کد هدیه🎁"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
////////////----/////////////////////////////////////////////////
//----------------------------------------------------------------------
elseif($text == "تنظیم متن قوانین"){	
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
$datas["step"] = "zirtext21";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"متن قوانین را ارسال کنید",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"/start"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($step == "zirtext21" && $text != "/start"){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("data/ghavanin.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"تنظیم شد!",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"📈آمار ربات📉"],['text'=>"🕴🏻پیام به کاربر🕴🏻"]],
[['text'=>"پیام همگانی🚀"],['text'=>"فروارد همگانی🔱"]],
[['text'=>"اهدای الماس🎁"],['text'=>"کسر الماس〽️"]],
[['text'=>"اخطار به کاربر💢"],['text'=>"حذف اخطار💢️"]],
[['text'=>"تنظیم متن و الماس⚙"],['text'=>"⚙تنظیم دکمه"]],
[['text'=>"تنظیم فروشگاه🛒"],['text'=>"🎆تنظیم عکس"]],
[['text'=>"👤تنظیم سفارشات ممبر👤"],['text'=>"📋مدیریت ادمین ها📋"]],
[['text'=>"/start"],['text'=>"🎁ساخت کد هدیه🎁"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
/////----///////////-----------//////////--------////////////------------------------
elseif($text == "تنظیم متن فروشگاه"){	
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
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
[['text'=>"/start"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($step == "zirtext2" && $text != "/start"){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("data/shoptext.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"تنظیم شد!",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"📈آمار ربات📉"],['text'=>"🕴🏻پیام به کاربر🕴🏻"]],
[['text'=>"پیام همگانی🚀"],['text'=>"فروارد همگانی🔱"]],
[['text'=>"اهدای الماس🎁"],['text'=>"کسر الماس〽️"]],
[['text'=>"اخطار به کاربر💢"],['text'=>"حذف اخطار💢️"]],
[['text'=>"تنظیم متن و الماس⚙"],['text'=>"⚙تنظیم دکمه"]],
[['text'=>"تنظیم فروشگاه🛒"],['text'=>"🎆تنظیم عکس"]],
[['text'=>"👤تنظیم سفارشات ممبر👤"],['text'=>"📋مدیریت ادمین ها📋"]],
[['text'=>"/start"],['text'=>"🎁ساخت کد هدیه🎁"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
/////////////////------////////////
elseif($text == "تنظیم الماس زیرمجموعه گیری"){	
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
$datas["step"] = "zirtext24";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"الماس زیرمجموعه گیری را وارد نمایید
مثال : 10",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"/start"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($step == "zirtext24" && $text != "/start"){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("data/invitecoin.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"تنظیم شد!",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"📈آمار ربات📉"],['text'=>"🕴🏻پیام به کاربر🕴🏻"]],
[['text'=>"پیام همگانی🚀"],['text'=>"فروارد همگانی🔱"]],
[['text'=>"اهدای الماس🎁"],['text'=>"کسر الماس〽️"]],
[['text'=>"اخطار به کاربر💢"],['text'=>"حذف اخطار💢️"]],
[['text'=>"تنظیم متن و الماس⚙"],['text'=>"⚙تنظیم دکمه"]],
[['text'=>"تنظیم فروشگاه🛒"],['text'=>"🎆تنظیم عکس"]],
[['text'=>"👤تنظیم سفارشات ممبر👤"],['text'=>"📋مدیریت ادمین ها📋"]],
[['text'=>"/start"],['text'=>"🎁ساخت کد هدیه🎁"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
///////////////////////////////////////////---//////
elseif($text == "تنظیم متن بنر عکسدار"){	
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
$datas["step"] = "zirtext";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"متن زیرمجموعه گیری را ارسال کنید
به جای نام NAME
به جای لینک LINK
و به جای نام خانوادگی LAST
و به جای آیدی عددی ID

را در متن قرار دهید تا جایگزین شود!",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"/start"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($step == "zirtext" && $text != "/start"){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("data/zirtext.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"تنظیم شد!",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"📈آمار ربات📉"],['text'=>"🕴🏻پیام به کاربر🕴🏻"]],
[['text'=>"پیام همگانی🚀"],['text'=>"فروارد همگانی🔱"]],
[['text'=>"اهدای الماس🎁"],['text'=>"کسر الماس〽️"]],
[['text'=>"اخطار به کاربر💢"],['text'=>"حذف اخطار💢️"]],
[['text'=>"تنظیم متن و الماس⚙"],['text'=>"⚙تنظیم دکمه"]],
[['text'=>"تنظیم فروشگاه🛒"],['text'=>"🎆تنظیم عکس"]],
[['text'=>"👤تنظیم سفارشات ممبر👤"],['text'=>"📋مدیریت ادمین ها📋"]],
[['text'=>"/start"],['text'=>"🎁ساخت کد هدیه🎁"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
//----------------------------------------------------------------------
elseif($text == "تنظیم متن بنر هایپر"){	
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
$datas["step"] = "mhiperm1";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"متن جدید بنر هایپر لینک را ارسال نمایید",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"/start"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($step == "mhiperm1" && $text != "/start"){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("data/mhiperm.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"با موفقیت ثبت شد!",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"📈آمار ربات📉"],['text'=>"🕴🏻پیام به کاربر🕴🏻"]],
[['text'=>"پیام همگانی🚀"],['text'=>"فروارد همگانی🔱"]],
[['text'=>"اهدای الماس🎁"],['text'=>"کسر الماس〽️"]],
[['text'=>"اخطار به کاربر💢"],['text'=>"حذف اخطار💢️"]],
[['text'=>"تنظیم متن و الماس⚙"],['text'=>"⚙تنظیم دکمه"]],
[['text'=>"تنظیم فروشگاه🛒"],['text'=>"🎆تنظیم عکس"]],
[['text'=>"👤تنظیم سفارشات ممبر👤"],['text'=>"📋مدیریت ادمین ها📋"]],
[['text'=>"/start"],['text'=>"🎁ساخت کد هدیه🎁"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
//----------------------------------------------------------------------
elseif($text == "پیام همگانی🚀"){	
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
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
[['text'=>"/start"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($step == "send2all" && $text != "/start"){ 
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
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
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"📈آمار ربات📉"],['text'=>"🕴🏻پیام به کاربر🕴🏻"]],
[['text'=>"پیام همگانی🚀"],['text'=>"فروارد همگانی🔱"]],
[['text'=>"اهدای الماس🎁"],['text'=>"کسر الماس〽️"]],
[['text'=>"اخطار به کاربر💢"],['text'=>"حذف اخطار💢️"]],
[['text'=>"تنظیم متن و الماس⚙"],['text'=>"⚙تنظیم دکمه"]],
[['text'=>"تنظیم فروشگاه🛒"],['text'=>"🎆تنظیم عکس"]],
[['text'=>"👤تنظیم سفارشات ممبر👤"],['text'=>"📋مدیریت ادمین ها📋"]],
[['text'=>"/start"],['text'=>"🎁ساخت کد هدیه🎁"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
//----------------------------------------------------------------------
elseif($text == "فروارد همگانی🔱"){
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
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
[['text'=>"/start"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif($text != "/start" && $step == "f2all"){
if ($chat_id == $admin or $chat_id == $admin2 or $chat_id == $admin3) {
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
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"📈آمار ربات📉"],['text'=>"🕴🏻پیام به کاربر🕴🏻"]],
[['text'=>"پیام همگانی🚀"],['text'=>"فروارد همگانی🔱"]],
[['text'=>"اهدای الماس🎁"],['text'=>"کسر الماس〽️"]],
[['text'=>"اخطار به کاربر💢"],['text'=>"حذف اخطار💢️"]],
[['text'=>"تنظیم متن و الماس⚙"],['text'=>"⚙تنظیم دکمه"]],
[['text'=>"تنظیم فروشگاه🛒"],['text'=>"🎆تنظیم عکس"]],
[['text'=>"👤تنظیم سفارشات ممبر👤"],['text'=>"📋مدیریت ادمین ها📋"]],
[['text'=>"/start"],['text'=>"🎁ساخت کد هدیه🎁"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی?>
