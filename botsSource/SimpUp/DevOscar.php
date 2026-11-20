<?php
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
$telegram_ip_ranges = [['lower' => '149.154.160.0', 'upper' => '149.154.175.255'],['lower' => '91.108.4.0','upper' => '91.108.7.255']];
$ip_dec = (float) sprintf('%u', ip2long($_SERVER['REMOTE_ADDR']));$ok=false;
foreach ($telegram_ip_ranges as $telegram_ip_range) if (!$ok) {
$lower_dec = (float) sprintf('%u', ip2long($telegram_ip_range['lower']));
$upper_dec = (float) sprintf('%u', ip2long($telegram_ip_range['upper']));
if ($ip_dec >= $lower_dec and $ip_dec <= $upper_dec) $ok=true; }
if (!$ok) die("Hmm, I don't trust you... (#roko|@roko_tm)");
$day = (2505600 - (time() - filectime('Mahdy'))) / 60 / 60 / 24;
$day = round($day, 0);
$config = ['admin' => [[*[ADMIN]*]],'channel' => "[*[CHANNEL]*]"];
define('API_KEY',"[*[TOKEN]*]");
function bot($method,$datas=[]){
$url = "https://api.telegram.org/bot".API_KEY."/".$method;
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_POSTFIELDS,http_build_query($datas));
$res = curl_exec($ch);
if(curl_error($ch)){
var_dump(curl_error($ch));
}else{
return json_decode($res);
}
}
function RandomString() {
$characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
$randstring = null;
for ($i = 0; $i < 9; $i++) {
$randstring .= $characters[
rand(0, strlen($characters))
];
}
return $randstring;
}
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$message_id = $message->message_id;
$text = $message->text;
$chat_id = $message->chat->id;
$from_id = $message->from->id;
if(!is_dir("member")){
mkdir("member");
}
if(!is_dir("member/$from_id")){
mkdir("member/$from_id");
}
if(!is_dir("settings")){
mkdir("settings");
}
if(!is_dir("uploader")){
mkdir("uploader");
}
if(!file_exists('settings/step.txt')){
file_put_contents('settings/step.txt', 'none');
}
if(!file_exists('settings/power.txt')){
file_put_contents('settings/power.txt', 'on');
}
if(!file_exists('settings/data.txt')){
file_put_contents('settings/data.txt', 'none');
}
if(!file_exists('settings/countuploadfile.txt')){
file_put_contents('settings/countuploadfile.txt', '0');
}
if(!file_exists('settings/roko.txt')){
file_put_contents('settings/roko.txt', 'none');
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
$user = file_get_contents("member.txt");
$power = file_get_contents("settings/power.txt");
$step = file_get_contents("settings/step.txt");
$scan = file_get_contents("settings/countuploadfile.txt");
$data = file_get_contents("settings/data.txt");
$roko = file_get_contents("settings/roko.txt");
$join_r = json_decode(file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=@{$config['channel']}&user_id=$from_id"));
$join_e = $join_r->result->status;
$usernamebot = json_decode(file_get_contents('https://api.telegram.org/bot'.API_KEY.'/getMe'))->result->username;
$menu_remove = json_encode(['KeyboardRemove'=>[
],'remove_keyboard'=>true]);
if (in_array($from_id, $config['admin'])) {
$menu = json_encode(['keyboard'=>[
[['text' => "اپلود ویدیو"],['text' => "حذف فایل"]],
[['text' => "ارسال پست به چنل"]],
[['text' => "امار"]],
[['text' => "خاموش"],['text' => "روشن"]],
[['text' => "پیام همگانی"]],
], 'resize_keyboard' => true
]);
$admin_back = json_encode(['keyboard'=>[
[['text' => "🔙"]],
], 'resize_keyboard' => true
]);
}else{
$menu = json_encode(['keyboard'=>[
[['text' => "راهنما"]],
], 'resize_keyboard' => true
]);
}
if($power == "off" && !in_array($from_id,$config['admin'])){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
ربات بنابه دلایلی خاموش میباشد لطفا صبور باشید!
",
'parse_mode'=>'html',
'reply_markup'=>$menu_remove
]);
exit();
}
if(isset($message)){
$txt = file_get_contents('member.txt');
$membersid= explode("\n",$txt);
if (!in_array($from_id,$membersid)){
$file2 = fopen("member.txt", "a") or die("Unable to open file!");
fwrite($file2, "$from_id\n");
fclose($file2);
}
}
if($text == "🔙"){
file_put_contents("settings/step.txt", "none");
file_put_contents("settings/data.txt", "none");
file_put_contents("settings/roko.txt", "none");
bot('sendmessage', [
'chat_id' =>$chat_id,
'text' =>"
با موفقیت برگشتی (:
",
'reply_to_message_id' => $message_id,
'parse_mode'=>'html',
'reply_markup' => $menu
]);
}
if ($day <= 2){
bot('sendmessage',[
'chat_id'=>[*[ADMIN]*],
'text'=>"ادمین گرامی مدت زمان اشتراک شما در رباتساز بزرگ میا کریت ب اتمام رسیده است ⚠️
برای تمدید ربات خود به پیوی ادمین مراجعه کنید ❤️
@DevOscar 👤",
'parse_mode'=>'MarkDown',
]);
exit();
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
if($join_e != 'member'  &&  $join_e != 'creator' && $join_e != 'administrator'){
 bot('sendmessage',[
'chat_id'=>$from_id,
'text'=>" 
سلام خدمت شما کاربر گرامی 
جهت حمایت از ما لطفاً در کانال های زیر عضو شوید
و سپس [ /start ] را بزنید
➖〰️〰️〰️〰️〰️➖
Hello dear user
To support us, please subscribe to the following channels
And then hit [ /start ]
",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"Subscribe to the channel | عضویت در کانال",'url'=>"t.me/{$config['channel']}"]]
],
])
]);
}else{
if($text == "/start" or $text =="/start _"){
if (in_array($from_id, $config['admin'])){
bot('sendmessage', [
'chat_id' => $chat_id,
'text' => "
خوش اومدی ادمین
➖〰️〰️〰️〰️➖
🎩 کانال های تلگرامی ما :
@{$config['channel']}
",
'reply_to_message_id' => $message_id,
'parse_mode' => "html",
'reply_markup' => $menu
]);
}else{
bot('sendmessage', [
'chat_id' => $chat_id,
'text' => "
🎩 کانال های تلگرامی ما :
@{$config['channel']}
",
'reply_to_message_id' => $message_id,
'parse_mode' => "html",
'reply_markup' => $menu
]);
}
}
if($text == "راهنما"){
bot('sendmessage',[
'chat_id' => $chat_id,
'text' => "
ساخته شده توسط 
@MrCreateRoobot
〰️〰️➖➖➖➖〰️〰️
راهنما!:
شما برید داخل چنل ( @{$config['channel']} ) پست موردنظر را پیداکنید و دکمه دانلود کامل این فیلم را بزنید و تمام.):
"
]);
}
if(preg_match('/^\/([Cc][Rr][Ee][Aa][Tt][Oo][Rr])/',$text)){
bot ('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"@MiaCreateBot",
]);
}
if(strpos($text, "/start _") !== false and $text !="/start _") {
$idfile = str_replace("/start _", null, $text);
$abc = json_decode(file_get_contents("uploader/$idfile.json"));
$method = $abc->file;
bot('send'.$abc->file, [
'chat_id' => $chat_id,
"$method" => $abc->file_id,
'caption' => "
🆔 @{$config['channel']}
🤖 @$usernamebot
",
'reply_to_message_id' => $message_id,
'parse_mode' => "html",
]);
}
}
if (in_array($from_id, $config['admin'])){
if($text == "اپلود ویدیو"){
file_put_contents("settings/step.txt", 'uploadvideo');
bot('sendmessage', [
'chat_id' =>$chat_id,
'text' =>"
لطفا فیلم را بفرستید
",
'reply_to_message_id' => $message_id,
'parse_mode'=>'html',
'reply_markup' => $admin_back
]);
}
elseif ($step == "uploadvideo"){
file_put_contents("settings/step.txt", 'none');
if(isset($message->video)){
$adirmon = $scan+1;
file_put_contents('settings/countuploadfile.txt', $adirmon);
$file = $bebe->file_id;
$file_id = $message->video->file_id;
$code = RandomString();
bot('sendvideo', [
'chat_id' => $chat_id,
'video' => $file_id,
'caption' => "
فایل شما با موفقیت داخل دیتابیس ذخیره شده
شناسه فایل شما: $code
لینک اشتراک گذاری فایل :
https://t.me/{$usernamebot}?start=_$code
",
'reply_to_message_id' => $message_id,
'parse_mode' => "html",
'reply_markup' => $menu
]);
file_put_contents("uploader/$code.json","{'code':'$code','file_id':'$file_id','file':'video'}");
$file = "uploader/$code.json";
file_put_contents($file,str_replace("'",'"',file_get_contents($file)));
}else{
bot('sendmessage', [
'chat_id' =>$chat_id,
'text' => "خطا این فایل ویدیو نیست!",
'reply_to_message_id' => $message_id,
'parse_mode'=>'html',
'reply_markup' => $menu
]);
}
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
if($text == "حذف فایل"){
file_put_contents("settings/step.txt", 'delvideo');
bot('sendmessage', [
'chat_id' =>$chat_id,
'text' => "لطفا شناسه فایل را بفرستید",
'reply_to_message_id' => $message_id,
'parse_mode'=>'html',
]);
}
elseif ($step == "delvideo"){
file_put_contents("settings/step.txt", "none");
if(file_exists("uploader/$text.json")){
unlink("uploader/$text.json");
$adirmon = $scan-1;
file_put_contents('settings/countuploadfile.txt', $adirmon);
bot('sendmessage', [
'chat_id' =>$chat_id,
'text' => "با موفقیت فایل $text حذف شد!",
'reply_to_message_id' => $message_id,
'parse_mode' => "html",
'reply_markup' => $menu
]);
}else{
bot('sendmessage', [
'chat_id' =>$chat_id,
'text' => "خطا شناسه فایل معتبر نمیباشد.",
'reply_to_message_id' => $message_id,
'parse_mode' => "html",
'reply_markup' => $menu
]);
}
}
if($text == "ارسال پست به چنل"){
file_put_contents("settings/step.txt", 'sendmecode');
bot('sendmessage', [
'chat_id' =>$chat_id,
'text' => "لطفا کپشن پست را بفرستید",
'reply_to_message_id' => $message_id,
'parse_mode'=>'html',
]);
}
if($step == "sendmecode"){
if(isset($message->text)){
file_put_contents("settings/step.txt", 'sendpostchannel');  
file_put_contents("settings/data.txt", $text);
bot('sendmessage', [
'chat_id' =>$chat_id,
'text' => "لطفا کد پست را بفرستید",
'reply_to_message_id' => $message_id,
'parse_mode'=>'html',
]);
}else{
file_put_contents("settings/step.txt", 'none');
bot('sendmessage', [
'chat_id' =>$chat_id,
'text' => "خطا این متن نیست!!",
'reply_to_message_id' => $message_id,
'parse_mode'=>'html',
'reply_markup' => $menu
]);
}
}
elseif($step == "sendpostchannel"){
file_put_contents("settings/step.txt", 'sendpicch');
file_put_contents("settings/roko.txt", $text);
bot('sendmessage', [
'chat_id' =>$chat_id,
'text' => "لطفا عکس را بفرستید",
'reply_to_message_id' => $message_id,
'parse_mode'=>'html',
]);
}
elseif($step == "sendpicch"){
file_put_contents("settings/step.txt", 'none');
file_put_contents("settings/roko.txt", 'none');
file_put_contents("settings/data.txt", 'none');
if(isset($message->photo)){
$photo = $message->photo;
$file_id = $photo[count($photo)-1]->file_id;
bot('sendphoto', [
'chat_id' =>"@".$config['channel'],
'photo' => $file_id,
'caption' => "
{$data}
➖〰️〰️〰️〰️➖
🆔 @{$config['channel']}
🆔 @$usernamebot
",
'parse_mode' => "html",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'📥 دانلود کامل فیلم', 'url'=>"https://t.me/{$usernamebot}?start=_{$roko}"]],
],
'resize_keyboard'=>true,
])
]);
bot('sendmessage', [
'chat_id' =>$chat_id,
'text' => "با موفقیت ارسال شد (:!",
'reply_to_message_id' => $message_id,
'parse_mode'=>'html',
'reply_markup' => $menu
]); 
}else{
bot('sendmessage', [
'chat_id' =>$chat_id,
'text' => "خطا این عکس نیست!",
'reply_to_message_id' => $message_id,
'parse_mode'=>'html',
'reply_markup' => $menu
]);  
}
}
if($text == "روشن"){
if($power != "on"){
file_put_contents("settings/power.txt","on");
bot('sendmessage', [
'chat_id' =>$chat_id,
'text' =>"ربات روشن شد :(",
'reply_to_message_id' => $message_id,
'parse_mode'=>'html',
]);
}else{
bot('sendmessage', [
'chat_id' =>$chat_id,
'text' =>"ربات از قبل روشن بود!️",
'reply_to_message_id' => $message_id,
'parse_mode'=>'html',
]);
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
}
if($text == "خاموش"){
if($power != "off"){
file_put_contents("settings/power.txt", "off");
bot('sendmessage', [
'chat_id' =>$chat_id,
'text' =>"ربات خاموش شد :) ",
'reply_to_message_id' => $message_id,
'parse_mode'=>'html',
]);
}else{
bot('sendmessage', [
'chat_id' =>$chat_id,
'text' =>"ربات از قبل خاموش بود!️",
'reply_to_message_id' => $message_id,
'parse_mode'=>'html',
]);
}
}
if ($text == "امار") {
$member_id = explode("\n",$user);
$member_count = count($member_id)-1;
bot('sendmessage', [
'chat_id' => $chat_id,
'text' => "
امار ربات : $member_count
امار فایل های اپلود شده : $scan
",
'reply_to_message_id' => $message_id,
'parse_mode' => "html",
]);
}
if($text == "پیام همگانی"){
file_put_contents("settings/step.txt", "sendall");
bot('sendmessage', [
'chat_id' =>$chat_id,
'text' =>"
لطفا پیام خود را ارسال کنید:
",
'reply_to_message_id' => $message_id,
'parse_mode'=>'html',
'reply_markup' => $admin_back
]);
}
elseif ($step == "sendall"){
file_put_contents("settings/step.txt", "none");
$all_member = fopen( "member.txt", 'r');
while( !feof( $all_member)) {
$user = fgets( $all_member);
$id = json_decode(file_get_contents("https://api.telegram.org/bot".API_KEY."/getChat?chat_id=".$user));
$user2 = $id->result->id;
if($user2 != null){
if($text != null){
bot('sendMessage', [
'chat_id' =>$user,
'text' =>$text,
'parse_mode' =>"html",
'disable_web_page_preview' =>"true"
]);
}
if($photo_id != null){
bot('sendphoto',[
'chat_id'=>$user,
'photo'=>$photo_id,
'caption'=>$caption
]);
}
}
}
}
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
?>