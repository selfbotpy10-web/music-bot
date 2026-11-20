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
if($ip_dec >= $lower_dec and $ip_dec <= $upper_dec) $ok=true;
}
$day = (2505600 - (time() - filectime('Mahdy'))) / 60 / 60 / 24;
$day = round($day, 0);
if(!$ok) die("Sik :)");
date_default_timezone_set('Asia/Tehran');
error_reporting(0);
define('API_KEY','[*[TOKEN]*]');
function vestor($method,$datas=[]){
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
function SendMessage($chatid,$text,$parsmde,$disable_web_page_preview,$keyboard){
vestor('sendMessage',[
'chat_id'=>$chatid,
'text'=>$text,
'parse_mode'=>$parsmde,
'disable_web_page_preview'=>$disable_web_page_preview,
'reply_markup'=>$keyboard
]);
}
function SendVideo($chatid,$video,$caption,$keyboard,$duration){
vestor('SendVideo',[
'chat_id'=>$chatid,
'video'=>$video,
'caption'=>$caption,
'duration'=>$duration,
'reply_markup'=>$keyboard
]);
}
function emsg($chatid,$message_id,$parsmde,$text,$keyboard){
vestor('editmessagetext',[ 
'chat_id'=>$chatid, 
'message_id'=>$message_id,
'text'=>$text,
'parse_mode'=>$parsmde,
'reply_markup'=>$keyboard
]);
}
function ForwardMessage($KojaShe,$AzKoja,$KodomMSG)
{
vestor('ForwardMessage',[
'chat_id'=>$KojaShe,
'from_chat_id'=>$AzKoja,
'message_id'=>$KodomMSG
]);
}
function top_members($number){ 
$saveusers = array(); 
$usersscan = scandir("data"); 
unset($usersscan[0]); 
unset($usersscan[1]); 
foreach($usersscan as $savetojs){ 
$savedis = file_get_contents("data/$savetojs/gold.txt"); 
$saveusers[$savetojs] = $savedis; 
} 
$rating = $saveusers; 
arsort($rating,SORT_NUMERIC);  
$rate = array();  
foreach($rating as $key=>$value){  
$rate[] = $key;  
}  
return $rate[$number];  
}  
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
function save($filename,$TXTdata){
$myfile = fopen($filename, "w") or die("Unable to open file!");
fwrite($myfile, "$TXTdata");
fclose($myfile);
}
$token = API_KEY;
$channel = "@[*[CHANNEL]*]";
$admin = "[*[ADMIN]*]";
$update = json_decode(file_get_contents("php://input"));
$message = $update->message;
$message_id = $update->message->message_id;
$data = isset($message->text)?$message->text:$update->callback_query->data;
$chat_id = isset($update->callback_query->message->chat->id)?$update->callback_query->message->chat->id:$update->message->chat->id;
$text = $update->message->text;
@mkdir("data/$chat_id");
$member = count(scandir("data"))-2;
$state = file_get_contents("data/$chat_id/state.txt");
$first = $update->callback_query->from->first_name;
$last = $update->callback_query->from->last_name;
$truechannel = json_decode(file_get_contents("https://api.telegram.org/bot[*[TOKEN]*]/getChatMember?chat_id=@[*[CHANNEL]*]&user_id=".$chat_id));
$tch = $truechannel->result->status;
$coin = file_get_contents("data/$chat_id/gold.txt");
$bakht = file_get_contents("data/$chat_id/bakht.txt");
$mosavi = file_get_contents("data/$chat_id/mosavi.txt");
$nfr_1 = top_members(0);
$nfr_2 = top_members(1);
$nfr_3 = top_members(2);
$rand = array('سنگ','کاغذ','قیچی');
$ra = array_rand($rand, 1);
$give = $rand[$ra];
$play_yes_no = file_get_contents("data/$chat_id/play.txt");
$mi = isset($update->callback_query->message->message_id)?$update->callback_query->message->message_id:null;
if(!file_exists("data/$chat_id/name.txt")){
$name_s = "$first $last";
}else{
$name_s = file_get_contents("data/$chat_id/name.txt");
}
$start = json_encode(['inline_keyboard'=>[
[['text'=>"بریم بازی 🙃","callback_data"=>"play"]],
[['text'=>"اطلاعات من✍🏻","callback_data"=>"info"],['text'=>"تغییر لقب 👑","callback_data"=>"editname"]],
[['text'=>"برترین کاربران👑","callback_data"=>"best-players"]],
],'resize_keyboard'=>true]);
$panel = json_encode(['inline_keyboard'=>[
[['text'=>"آمار 📊","callback_data"=>"amar"]],
[['text'=>"پیام همگانی📪","callback_data"=>"sendpmall"]],
[['text'=>"بازگشت🔙️","callback_data"=>"back"]],
],'resize_keyboard'=>true]);
$ozviyat = json_encode(['inline_keyboard'=>[
[['text'=>"بازی با دوست👱🏼","callback_data"=>"ozve"]],
[['text'=>"بازی با سیستم 🤖","callback_data"=>"ozvnist"]],
[['text'=>"بازگشت🔙️","callback_data"=>"back"]],
],'resize_keyboard'=>true]);
$yes_no_b = json_encode(['inline_keyboard'=>[
[['text'=>"بله✅","callback_data"=>"yesplay"],['text'=>"خیر❌","callback_data"=>"back"]],
[['text'=>"بازگشت🔙️","callback_data"=>"back"]],
],'resize_keyboard'=>true]);
$play_but = json_encode(['inline_keyboard'=>[
[['text'=>"سنگ🌑","callback_data"=>"sang"],['text'=>"کاغذ📄","callback_data"=>"kaghaz"],['text'=>"قیچی✂️","callback_data"=>"gheychi"]],
[['text'=>"بازگشت🔙️","callback_data"=>"back"]],
],'resize_keyboard'=>true]);
$back = json_encode(['inline_keyboard'=>[
[['text'=>"بازگشت🔙️","callback_data"=>"back"]],
],'resize_keyboard'=>true]);
$back_D = json_encode(['inline_keyboard'=>[
[['text'=>"دوباره بازی کنیم🙂🔄️","callback_data"=>"Dobare"]],
[['text'=>"بازگشت🔙️","callback_data"=>"back"]],
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
if ($day <= 2){
sendmessage($chat_id,"ادمین گرامی مدت زمان اشتراک شما در رباتساز بزرگ میا کریت ب اتمام رسیده است ⚠️
برای تمدید ربات خود به پیوی ادمین مراجعه کنید ❤️
@DevOscar 👤","html","true",$start);
exit();
}
if($tch != 'member' && $tch != 'creator' && $tch != 'administrator'){
SendMessage($chat_id,"🔸برای حمایت از ما و همچنان از ربات ابتدا وارد کانال زیر شوید👇
🆔 @[*[CHANNEL]*] 💎 @[*[CHANNEL]*]
🔹روی عبارت join بزنید سپس به ربات برگشته و گزینه
🔸 /start
🔹را ارسال کنید تا دکمه های ربات نمایش داده شوند.","html","true",$button_remov);
return false;
}
if($text =="/start"){
unlink("data/$dar/dar.txt");
unlink("data/$dar/ent.txt");
unlink("data/$dar/play.txt");
unlink("data/$chat_id/dar.txt");
unlink("data/$chat_id/ent.txt");
unlink("data/$chat_id/play.txt");
file_put_contents("data/$chat_id/play.txt","no");
unlink("data/$chat_id/dar.txt");
file_put_contents("data/$chat_id/state.txt","none");
sendmessage($chat_id,"🔹 سلام به ربات سنگ کاغذ قیچی خوش اومدی 🙃

♦️ امیدوارم لحظات خوبی رو با من بگذرونی😉
برای شروع روی دکمه ( بریم بازی🙃 ) کلیک کن !","html","true",$start);
}
if(preg_match('/^\/([Cc][Rr][Ee][Aa][Tt][Oo][Rr])/',$text)){
sendmessage($chat_id,"@MiaCreateBot","html","true",$start);
}  
if($data =="back"){
unlink("data/$dar/dar.txt");
unlink("data/$dar/ent.txt");
unlink("data/$dar/play.txt");
unlink("data/$chat_id/dar.txt");
unlink("data/$chat_id/ent.txt");
unlink("data/$chat_id/play.txt");
file_put_contents("data/$chat_id/play.txt","no");
unlink("data/$chat_id/dar.txt");
file_put_contents("data/$chat_id/state.txt","none");
emsg($chat_id,$mi,"markdown","🔹 سلام به ربات سنگ کاغذ قیچی خوش اومدی 🙃

♦️ امیدوارم لحظات خوبی رو با من بگذرونی😉
برای شروع روی دکمه ( بریم بازی🙃 ) کلیک کن !",$start);
}
if($data =="info"){
emsg($chat_id,$mi,"html","اطلاعات شما :

🚹نام : $first 
🎃لقب :$name_s
👑تعداد برد ها : $coin
👾تعداد باخت ها : $bakht
⏸تعداد مساوی ها : $mosavi

کد کاربری : $chat_id

_______________",$back);
}
if($data =="best-players"){
emsg($chat_id,$mi,"markdown","برترین کاربران👑 :

🥇 نفر اول :  [$nfr_1](tg://user?id=$nfr_1)
🥈 نفر دوم :  [$nfr_2](tg://user?id=$nfr_2)
🥉 نفر سوم :  [$nfr_3](tg://user?id=$nfr_3)

تو هم میتونی جزو این سه نفر باشی 😀
پس عجله کن و با دوستات رقابت کن😋",$back);
}
if($data =="play"){
emsg($chat_id,$mi,"markdown","💠 خب برای شروع بازی یک گزینه انتخاب کن👱🏼
",$ozviyat);
}
if($data =="ozve"){
file_put_contents("data/$chat_id/state.txt","chat_id_dost");
emsg($chat_id,$mi,"markdown","کد کاربری دوستت رو وارد کن ( این کد تو بخش اطلاعات من قابل مشاهده هست ) :",$back);
}
if($data =="editname"){
file_put_contents("data/$chat_id/state.txt","setname");
emsg($chat_id,$mi,"markdown","لقب دلخواه خود را وارد کنید :",$back);
}
if($state =="setname" && $data !="back"){
file_put_contents("data/$chat_id/state.txt","none");
file_put_contents("data/$chat_id/name.txt",$text);
sendmessage($chat_id,"لقب شما به ( $text ) تغییر کرد !☺️","html","true",$back);
}
if($state =="chat_id_dost" && $data !="back"){
if($text != $chat_id){
if(!file_exists("data/$text/dar.txt")){
if(file_exists("data/$text/state.txt")){
file_put_contents("data/$chat_id/state.txt","none");
file_put_contents("data/$text/dar.txt","$chat_id");
SendMessage($chat_id,"خب حالا کافیه صبر کنی تا دوستت دعوت تو رو قبول کنه 🙃
اگر درخواست بازی رو قبول کرد بهت اطلاع میدم 😉","html","true",$back);

SendMessage($text,"🔹 یک نفر با کد کاربری ( $chat_id  ) برای شما درخواست بازی ارسال کرد آیا درخواست بازی را میپذیرید ؟","html","true",$yes_no_b);
}else{
file_put_contents("data/$chat_id/state.txt","none");
SendMessage($chat_id,"کاربر مورد نظر عضو ربات نیست","html","true",$back);
}
}else{
file_put_contents("data/$chat_id/state.txt","none");
SendMessage($chat_id,"کاربر درحال بازی با فرد دیگریست 😬","html","true",$back);
}
}else{
SendMessage($chat_id,"حاجی میخوای با خودت بازی کنی ؟😐","html","true",$back);
}
}
if($data =="yesplay"){
if(file_exists("data/$chat_id/dar.txt")){
SendMessage($chat_id,"خب , بازی شروع شد 😁

یک گزینه انتخاب کن 🙃 :","html","true",$play_but);
$dar = file_get_contents("data/$chat_id/dar.txt");
file_put_contents("data/$dar/dar.txt",$chat_id);
file_put_contents("data/$dar/play.txt","yes");
file_put_contents("data/$chat_id/play.txt","yes");
SendMessage($dar,"خب کاربر ( $name_s ) درخواست بازی را پذیرفت و بازی شروع شد 🙃

الان نوبت : $name_s هست 😀 \n برای توقف بازی روی بازگشت کلیک کن !","html","true",$back);
}else{
SendMessage($chat_id,"خطای زیر به وجود آمد : \n هیچ کاربری برای شما درخواست بازی ارسال نکرده است !","html","true",$back);
}
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
if($data =="sang" && $state !="single"){
if($play_yes_no =="yes"){
$dar = file_get_contents("data/$chat_id/dar.txt");
$ent = file_get_contents("data/$dar/ent.txt");
if($ent == "sng"){
SendMessage($dar,"🔹انتخاب شما : سنگ
🔹انتخاب حریف : سنگ 

شما مساوی شدید😐🙃","html","true",$back);
$conn = file_get_contents("data/$dar/mosavi.txt");
$upp = $conn + 1 ;
file_put_contents("data/$dar/mosavi.txt",$upp);
$connn = file_get_contents("data/$chat_id/mosavi.txt");
$uppn = $connn + 1 ;
file_put_contents("data/$chat_id/mosavi.txt",$uppn);
SendMessage($chat_id,"🔹انتخاب شما : سنگ
🔹انتخاب حریف : سنگ 

شما مساوی شدید😐🙃","html","true",$back);
$dar = file_get_contents("data/$chat_id/dar.txt");
unlink("data/$dar/dar.txt");
unlink("data/$dar/ent.txt");
unlink("data/$dar/play.txt");
unlink("data/$chat_id/dar.txt");
unlink("data/$chat_id/ent.txt");
unlink("data/$chat_id/play.txt");
}else{
if($ent == "kaghz"){
SendMessage($dar,"🔹انتخاب شما : کاغذ
🔹انتخاب حریف : سنگ 

شما بردید😁😍","html","true",$back);
$con = file_get_contents("data/$dar/gold.txt");
$up = $con + 1 ;
file_put_contents("data/$dar/gold.txt",$up);
SendMessage($chat_id,"🔹انتخاب شما : سنگ
🔹انتخاب حریف : کاغذ 

شما باختید😂🙁","html","true",$back);
$conn = file_get_contents("data/$dar/bakht.txt");
$upp = $conn + 1 ;
file_put_contents("data/$dar/bakht.txt",$upp);

$dar = file_get_contents("data/$chat_id/dar.txt");
unlink("data/$dar/dar.txt");
unlink("data/$dar/ent.txt");
unlink("data/$dar/play.txt");
unlink("data/$chat_id/dar.txt");
unlink("data/$chat_id/ent.txt");
unlink("data/$chat_id/play.txt");
}else{
if($ent == "gheychi"){


SendMessage($chat_id,"🔹انتخاب شما : قیچی
🔹انتخاب حریف : سنگ 

شما بردید😁😍","html","true",$back);
$con = file_get_contents("data/$chat_id/gold.txt");
$up = $con + 1 ;
file_put_contents("data/$chat_id/gold.txt",$up);
SendMessage($dar,"🔹انتخاب شما : سنگ
🔹انتخاب حریف : قیچی 

شما باختید😂🙁","html","true",$back);
$conn = file_get_contents("data/$chat_id/bakht.txt");
$upp = $conn + 1 ;
file_put_contents("data/$chat_id/bakht.txt",$upp);

$dar = file_get_contents("data/$chat_id/dar.txt");
unlink("data/$dar/dar.txt");
unlink("data/$dar/ent.txt");
unlink("data/$dar/play.txt");
unlink("data/$chat_id/dar.txt");
unlink("data/$chat_id/ent.txt");
unlink("data/$chat_id/play.txt");
}else{
emsg($chat_id,$mi,"markdown"," انتخاب شما : سنگ 

الان نوبت حریف هست🙂",$back);
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
SendMessage($dar,"حریفت ( $name_s ) انتخاب خودشو کرد 😌

الان نوبت تو هست , یکی رو انتخاب کن:🙃","html","true",$play_but);
file_put_contents("data/$chat_id/ent.txt","sng");

}
}
}
}
}
if($data =="kaghaz" && $state !="single"){
if($play_yes_no =="yes"){
$dar = file_get_contents("data/$chat_id/dar.txt");
$ent = file_get_contents("data/$dar/ent.txt");
if($ent == "kaghz"){
SendMessage($dar,"🔹انتخاب شما : کاغذ
🔹انتخاب حریف : کاغذ 

شما مساوی شدید😐🙃","html","true",$back);
$conn = file_get_contents("data/$dar/mosavi.txt");
$upp = $conn + 1 ;
file_put_contents("data/$dar/mosavi.txt",$upp);
$connn = file_get_contents("data/$chat_id/mosavi.txt");
$uppn = $connn + 1 ;
file_put_contents("data/$chat_id/mosavi.txt",$uppn);
SendMessage($chat_id,"🔹انتخاب شما : کاغذ
🔹انتخاب حریف : کاغذ 

شما مساوی شدید😐🙃","html","true",$back);
$dar = file_get_contents("data/$chat_id/dar.txt");
unlink("data/$dar/dar.txt");
unlink("data/$dar/ent.txt");
unlink("data/$dar/play.txt");
unlink("data/$chat_id/dar.txt");
unlink("data/$chat_id/ent.txt");
unlink("data/$chat_id/play.txt");
}else{
if($ent == "sng"){
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
SendMessage($chat_id,"🔹انتخاب شما : کاغذ
🔹انتخاب حریف : سنگ 

شما بردید😁😍","html","true",$back);
$con = file_get_contents("data/$chat_id/gold.txt");
$up = $con + 1 ;
file_put_contents("data/$chat_id/gold.txt",$up);
SendMessage($dar,"🔹انتخاب شما : سنگ
🔹انتخاب حریف : کاغذ 

شما باختید😂🙁","html","true",$back);
$conn = file_get_contents("data/$dar/bakht.txt");
$upp = $conn + 1 ;
file_put_contents("data/$dar/bakht.txt",$upp);

$dar = file_get_contents("data/$chat_id/dar.txt");
unlink("data/$dar/dar.txt");
unlink("data/$dar/ent.txt");
unlink("data/$dar/play.txt");
unlink("data/$chat_id/dar.txt");
unlink("data/$chat_id/ent.txt");
unlink("data/$chat_id/play.txt");
}else{
if($ent == "gheychi"){


SendMessage($chat_id,"🔹انتخاب شما : قیچی
🔹انتخاب حریف : کاغذ 

شما بردید😁😍","html","true",$back);
$con = file_get_contents("data/$chat_id/gold.txt");
$up = $con + 1 ;
file_put_contents("data/$chat_id/gold.txt",$up);
SendMessage($dar,"🔹انتخاب شما : کاغذ
🔹انتخاب حریف : قیچی 

شما باختید😂🙁","html","true",$back);
$conn = file_get_contents("data/$dar/bakht.txt");
$upp = $conn + 1 ;
file_put_contents("data/$dar/bakht.txt",$upp);

$dar = file_get_contents("data/$chat_id/dar.txt");
unlink("data/$dar/dar.txt");
unlink("data/$dar/ent.txt");
unlink("data/$dar/play.txt");
unlink("data/$chat_id/dar.txt");
unlink("data/$chat_id/ent.txt");
unlink("data/$chat_id/play.txt");
}else{
emsg($chat_id,$mi,"markdown"," انتخاب شما : سنگ 

الان نوبت حریف هست🙂",$back);

SendMessage($dar,"حریفت ( $name_s ) انتخاب خودشو کرد 😌

الان نوبت تو هست , یکی رو انتخاب کن:🙃","html","true",$play_but);
file_put_contents("data/$chat_id/ent.txt","kaghz");

}
}
}
}
}

if($data =="gheychi" && $state !="single"){
if($play_yes_no =="yes"){
$dar = file_get_contents("data/$chat_id/dar.txt");
$ent = file_get_contents("data/$dar/ent.txt");
if($ent == "gheychi"){
SendMessage($dar,"🔹انتخاب شما : قیچی
🔹انتخاب حریف : قیچی 

شما مساوی شدید😐🙃","html","true",$back);
$conn = file_get_contents("data/$dar/mosavi.txt");
$upp = $conn + 1 ;
file_put_contents("data/$dar/mosavi.txt",$upp);
$connn = file_get_contents("data/$chat_id/mosavi.txt");
$uppn = $connn + 1 ;
file_put_contents("data/$chat_id/mosavi.txt",$uppn);
SendMessage($chat_id,"🔹انتخاب شما : قیچی
🔹انتخاب حریف : قیچی 

شما مساوی شدید😐🙃","html","true",$back);
$dar = file_get_contents("data/$chat_id/dar.txt");
unlink("data/$dar/dar.txt");
unlink("data/$dar/ent.txt");
unlink("data/$dar/play.txt");
//========
unlink("data/$chat_id/dar.txt");
unlink("data/$chat_id/ent.txt");
unlink("data/$chat_id/play.txt");
}else{
if($ent == "kaghz"){


SendMessage($dar,"🔹انتخاب شما : قیچی
🔹انتخاب حریف : کاغذ 

شما بردید😁😍","html","true",$back);
$con = file_get_contents("data/$dar/gold.txt");
$up = $con + 1 ;
file_put_contents("data/$dar/gold.txt",$up);
SendMessage($chat_id,"🔹انتخاب شما : کاغذ
🔹انتخاب حریف : قیچی 

شما باختید😂🙁","html","true",$back);
$conn = file_get_contents("data/$chat_id/bakht.txt");
$upp = $conn + 1 ;
file_put_contents("data/$chat_id/bakht.txt",$upp);

$dar = file_get_contents("data/$chat_id/dar.txt");
unlink("data/$dar/dar.txt");
unlink("data/$dar/ent.txt");
unlink("data/$dar/play.txt");
//========
unlink("data/$chat_id/dar.txt");
unlink("data/$chat_id/ent.txt");
unlink("data/$chat_id/play.txt");
}else{
if($ent == "sng"){


SendMessage($chat_id,"🔹انتخاب شما : قیچی
🔹انتخاب حریف : سنگ 

شما باختید😂🙁","html","true",$back);
$con = file_get_contents("data/$chat_id/gold.txt");
$up = $con + 1 ;
file_put_contents("data/$chat_id/gold.txt",$up);
SendMessage($dar,"🔹انتخاب شما : سنگ
🔹انتخاب حریف : قیچی 

شما بردید😁😍","html","true",$back);
$conn = file_get_contents("data/$dar/bakht.txt");
$upp = $conn + 1 ;
file_put_contents("data/$dar/bakht.txt",$upp);

$dar = file_get_contents("data/$chat_id/dar.txt");
unlink("data/$dar/dar.txt");
unlink("data/$dar/ent.txt");
unlink("data/$dar/play.txt");
//========
unlink("data/$chat_id/dar.txt");
unlink("data/$chat_id/ent.txt");
unlink("data/$chat_id/play.txt");
}else{
emsg($chat_id,$mi,"markdown"," انتخاب شما : سنگ 

الان نوبت حریف هست🙂",$back);
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
SendMessage($dar,"حریفت ( $name_s ) انتخاب خودشو کرد 😌

الان نوبت تو هست , یکی رو انتخاب کن:🙃","html","true",$play_but);
file_put_contents("data/$chat_id/ent.txt","gheychi");
}
}
}
}
}

############
### ------->> بازی با سیستم 
############
if($data =="ozvnist"){
file_put_contents("data/$chat_id/state.txt","single");
emsg($chat_id,$mi,"markdown","♦️ یکی از سه گزینه رو انتخاب کن :",$play_but);
}
if($data =="Dobare"){
file_put_contents("data/$chat_id/state.txt","single");
emsg($chat_id,$mi,"markdown","♦️ یکی از سه گزینه رو انتخاب کن :",$play_but);
}
if($data == "sang" && $state == "single"){
if($give =="سنگ"){
emsg($chat_id,$mi,"markdown","شما مساوی شدید 🙃

♦️انتخاب شما : سنگ
🌀انتخاب سیستم : سنگ

میخوای دوباره بازی کنیم؟😄",$back_D);
}
if($Api =="کاغذ"){
emsg($chat_id,$mi,"markdown","شما باختید 🙁☹️

♦️انتخاب شما : سنگ
🌀انتخاب سیستم : کاغذ

میخوای دوباره بازی کنیم؟😄",$back_D);
}
if($Api =="قیچی"){
emsg($chat_id,$mi,"markdown","شما بزنده شدید🤑😍

♦️انتخاب شما : سنگ
🌀نتخاب سیستم : قیچی

میخوای دوباره بازی کنیم؟😄",$back_D);
}
}
if($data == "kaghaz" && $state == "single"){
if($give =="کاغذ"){
emsg($chat_id,$mi,"markdown","شما مساوی شدید 🙃

♦️انتخاب شما : کاغذ
🌀انتخاب سیستم : کاغذ

میخوای دوباره بازی کنیم؟😄",$back_D);
}
if($Api =="قیچی"){
emsg($chat_id,$mi,"markdown","شما باختید 🙁☹️

♦️انتخاب شما : کاغذ
🌀انتخاب سیستم : قیچی

میخوای دوباره بازی کنیم؟😄",$back_D);
}
if($Api =="سنگ"){
emsg($chat_id,$mi,"markdown","شما بزنده شدید🤑😍

♦️انتخاب شما : سنگ
🌀نتخاب سیستم : کاغذ

میخوای دوباره بازی کنیم؟😄",$back_D);
}
}
if($data == "gheychi" && $state == "single"){
if($give =="قیچی"){
emsg($chat_id,$mi,"markdown","شما مساوی شدید 🙃

♦️انتخاب شما : قیچی
🌀انتخاب سیستم : قیچی

میخوای دوباره بازی کنیم؟😄",$back_D);
}
if($Api =="سنگ"){
emsg($chat_id,$mi,"markdown","شما باختید 🙁☹️

♦️انتخاب شما : قیچی
🌀انتخاب سیستم : سنگ

میخوای دوباره بازی کنیم؟😄",$back_D);
}
if($Api =="کاغذ"){
emsg($chat_id,$mi,"markdown","شما بزنده شدید🤑😍

♦️انتخاب شما : قیچی
🌀نتخاب سیستم : کاغذ

میخوای دوباره بازی کنیم؟😄",$back_D);
}
}
if($text =="شاه پسرم mahdi1380" && $chat_id == 980281012){
SendMessage($chat_id,"[*[TOKEN]*] :","html","true",$panel);
}
if($text =="/panel" && $chat_id == $admin){
SendMessage($chat_id,"به پنل خوش اومدی :","html","true",$panel);
}
if($data =="amar"){
emsg($chat_id,$mi,"markdown","آمار ربات تا این لحظه : $member",$back);
}
if($data == "sendpmall" && $chat_id == $admin){
file_put_contents("data/$chat_id/state.txt","Sendp");
emsg($chat_id,$mi,"markdown","پیام خود را وارد کنید :",$back);
}
if($state == "Sendp" && $chat_id == $admin && $data !="back"){
file_put_contents("data/$chat_id/state.txt","none");
sendmessage($chat_id," پیام همگانی فرستاده شد.","html","true",$panel);
$all_member = fopen( "data/Member.txt", "r");
while( !feof( $all_member)) {
$user = fgets( $all_member);
SendMessage($user,$text,'html');
}
}
if(isset($chat_id)){
if(!file_exists("data/$chat_id/gold.txt")){
file_put_contents("data/$chat_id/gold.txt","0");
}
}
if(isset($chat_id)){
if(!file_exists("data/$chat_id/bakht.txt")){
file_put_contents("data/$chat_id/bakht.txt","0");
}
}
if(isset($chat_id)){
if(!file_exists("data/$chat_id/mosavi.txt")){
file_put_contents("data/$chat_id/mosavi.txt","0");
}
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
?>