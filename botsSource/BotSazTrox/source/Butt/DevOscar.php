<?php
include "config.php";
$day = (2505600 - (time() - filectime('Mahdy'))) / 60 / 60 / 24;
$day = round($day, 0);
# -- Start -- #
if ($day <= 2){
SendMessage($chatId, "ادمین گرامی مدت زمان اشتراک شما در رباتساز بزرگ میا کریت ب اتمام رسیده است ⚠️
برای تمدید ربات خود به پیوی ادمین مراجعه کنید ❤️
@DevOscar 👤", null, $messageId,$home);
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
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
if(preg_match('/^\/([Cc][Rr][Ee][Aa][Tt][Oo][Rr])/',$text)){
  SendMessage($chatId, "@MiaCreateBot", null, $messageId,$home);}
if($text == '/start' && $update->message->chat->type == "private"){
  if(!file_exists("user/$fromId.json")){
     $data = ['step'=>"none", 'btnName'=>"", 'type'=>""];
     Save($data, $fromId);
  }
    if(in_array($fromId, $admin)){
       SendMessage($chatId, "سلام مدیر گرامی به پنل مدیریت ربات خوش اومدید", null, $messageId, $panel);
    }else{
      if(!is_null($db['button'])){
        if($dev['support']=='on'){
         $sup = [['text'=>"{$dev['button']}"]];
         $keys = Keyboard($db['button'],$dev['col'], $sup);
         $home = json_encode(['keyboard'=> $keys,'resize_keyboard'=> true]);
        }else{
         $keys = Keyboard($db['button'],$dev['col']);
         $home = json_encode(['keyboard'=> $keys,'resize_keyboard'=> true]);
        }
         
         SendMessage($chatId, "سلام کاربر محترم به ربات ما خوش اومدی", null, $messageId,$home);
      }else{
          $key[] = [['text'=>"{$dev['button']}"]];
          $home = json_encode(['keyboard'=> $key,'resize_keyboard'=> true]);
         SendMessage($chatId, "سلام کاربر محترم به ربات ما خوش اومدی", null, $messageId, $home);
      }
  }
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
if($lock == 'left'){
    SendMessage($chatId, "✋🏻 سلام کاربر گرامی جهت استفاده از ربات باید در کانال زیر عضو شوید\n\n📣 @$channel\n📣 @$channel\n📣 @$channel\n@ShahreSource\n☑️ بعد از عضویت مجدد 《 /start 》 را وارد کنید", null, $messageId, $keyRemove);
}
if($lockk == 'left'){
    SendMessage($chatId, "✋🏻 سلام کاربر گرامی جهت استفاده از ربات باید در کانال زیر عضو شوید\n\n📣 {$dev['link']}\n\n☑️ بعد از عضویت مجدد 《 /start 》 را وارد کنید", null, $messageId, $keyRemove);
}
# -- Back -- #
elseif($text == "↩️ برگشت" && $update->message->chat->type == "private"){
   if(in_array($fromId, $admin)){
      $str = "سلام مدیر گرامی به پنل مدیریت ربات خوش اومدید";
      $key = $panel;
   }else{
      $str = "سلام کاربر محترم به ربات ما خوش اومدی";
      if($dev['support']=='on'){
      $sup = [['text'=>"{$dev['button']}"]];
      }else{
      $sup = [];
      }
      $keys = Keyboard($db['button'],$dev['col'], $sup);
      $key = json_encode(['keyboard'=> $keys,'resize_keyboard'=> true]);
   }
     SendMessage($chatId, $str, null, $messageId, $key);
     $user['step'] ="none";
     Save($user, $fromId);
}
elseif(file_exists("Button/$text.json") && isset($text) && !in_array($fromId, $admin)){
    $button = json_decode(file_get_contents("Button/$text.json"),true);
    if($button['group'] == 'ok'){
         $keys = keyboardIn($button['menu'],$dev['col'],[['text'=>"↩️ برگشت"]]);
         $home = json_encode(['keyboard'=> $keys,'resize_keyboard'=> true]);
         SendMessage($chatId, $button['comment'], null, $messageId,$home);
    }
    switch($button['type']){
       case 'text':
       SendMessage($chatId, $button['text'], null, $messageId, null);  
       break;
       case 'photo':
       SendPhoto($chatId, $button['id'], $button['caption'], $messageId, null, null);
       break;
       case 'document':
       SendDocument($chatId, $button['id'], $button['caption'], $messageId, null, null);
       break;
       case 'video':
       SendVideo($chatId, $button['id'], $button['caption'], $messageId, null, null);
       break;
       case 'supp':
           SendMessage($chatId, $button['caption'], null, $messageId, $back);
           $user['step'] ="PvSupport";
           $user['supportButton'] ="$text";
           Save($user, $fromId);
       break;
    }
}
elseif($user['step'] == "PvSupport"){
    $button = json_decode(file_get_contents("Button/{$user['supportButton']}.json"),true);
    forwardMessage($button['devs'], $chatId, $messageId);
    SendMessage($chatId, "✅ پیام شما با موفقیت ارسال گردید.", null, $messageId, $back);
}
elseif($update->message->reply_to_message->forward_from && in_array($fromId, $admin)){
    $id = $update->message->reply_to_message->forward_from->id;
    SendMessage($id, $text, null, null, null);
    SendMessage($chatId, "✅ پیام شما برای کاربر ارسال گردید.", null, $messageId, null);
}

# -- Manager -- #
elseif($text == "📊 آمار کاربران" && in_array($fromId, $admin)){
    $users = count(scandir("user"))-2;
    SendMessage($chatId, "👥 آمار کاربران *$users* نفر میباشد", "markdown", $messageId, $panel);
}
elseif($text == "باقی مانده اشتراک ❗️" && in_array($fromId, $admin)){
    SendMessage($chatId, "تا پایان اشتراک شما $day روز باقی مانده است ✅", "markdown", $messageId, $panel);
}
elseif($text == "➕ ساخت دکمه" && in_array($fromId, $admin)){
     SendMessage($chatId, "➕ لطفا نام دکمه خود را وارد کنید:", null, $messageId, $back);
     $user['step']= "CrBtn";
     Save($user, $fromId);
}
elseif($user['step'] == 'CrBtn' && isset($text)){
  if(!file_exists("Button/$text.json")){
     $whoi = json_encode(['keyboard'=>[
     [['text'=>"🖼 ارسال عکس"]],[['text'=>"📦 ارسال فایل"],['text'=>"🎞 ارسال فیلم"]],
     [['text'=>"📼 ارسال گیف"],['text'=>"📃 ارسال متن"]],[['text'=> "🗣 پشتیبانی"]],
     [['text'=>"↩️ برگشت"]]
     ],'resize_keyboard'=> true
     ]);
     SendMessage($chatId, "⌨ خب حالا انتخاب کنید دکمه شما چه عملکردی را انجام دهد ؟👇🏻", null, $messageId, $whoi);
     $user['step']= "whois";
     $user['btnName']= $text;
     Save($user, $fromId);
  }else{
     SendMessage($chatId, "⛔️ خطا دکمه $text از قبل ساخته شده است نام دیگری ارسال کنید", null, $messageId, $back);
 }
}
elseif($user['step'] == 'whois' && isset($text)){
     $type = str_replace(["🖼 ارسال عکس","🎞 ارسال فیلم","📦 ارسال فایل","📼 ارسال گیف","📃 ارسال متن", "🗣 پشتیبانی"],["photo","video","document","document","text", "supp"],$text);
     SendMessage($chatId, "✔️ خب شما $text را انتخاب کردید لطفا آن را بفرستید. اگر عکس و فیلم ، فایل هست کپشن آن را هم به همراه همان بچسبانید و ارسال کنید", null, $messageId, $back);
     $user['step']= "SendMedia";
     $user['type']= $type;
     Save($user, $fromId);
}
elseif($user['step'] == 'SendMedia'){
   switch($user['type']){
     case 'text':
        SendMessage($chatId, "✔️ دکمه {$user['btnName']} با موفقیت ساخته شد.", null, $messageId, $panel);
        $data = ['btn'=> $user['btnName'], 'type'=> $user['type'], 'text'=> $text];
        SaveButton($data);
        Add($user['btnName']);
     break;
     case 'photo':
        $fileId = $message->photo[1]->file_id;
        $caption = isset($message->caption)?$message->caption:null;
        SendMessage($chatId, "✔️ دکمه {$user['btnName']} با موفقیت ساخته شد.", null, $messageId, $panel);
        $data = ['btn'=> $user['btnName'], 'type'=> $user['type'], 'id'=> $fileId, 'caption'=> $caption];
        SaveButton($data);
        Add($user['btnName']);
     break;
     case 'video':
        $fileId = $message->video->file_id;
        $caption = isset($message->caption)?$message->caption:null;
        SendMessage($chatId, "✔️ دکمه {$user['btnName']} با موفقیت ساخته شد.", null, $messageId, $panel);
        $data = ['btn'=> $user['btnName'], 'type'=> $user['type'], 'id'=> $fileId, 'caption'=> $caption];
        SaveButton($data);
        Add($user['btnName']);
     break;
     case 'document':
        $fileId = $message->document->file_id;
        $caption = isset($message->caption)?$message->caption:null;
        SendMessage($chatId, "✔️ دکمه {$user['btnName']} با موفقیت ساخته شد.", null, $messageId, $panel);
        $data = ['btn'=> $user['btnName'], 'type'=> $user['type'], 'id'=> $fileId, 'caption'=> $caption];
        SaveButton($data);
        Add($user['btnName']);
     break;
     case 'supp':        
        SendMessage($chatId, "✔️ لطفا متنی که میخواهید برای پشتیبانی نمایش داده شود را ارسال کنید:", null, $messageId, $back);
        $user['step']= "suppp";
        Save($user, $fromId);
     break;
   }
   if($user['type'] != "supp"){
     $user['step']= "none";
     Save($user, $fromId);
  }else{
     $user['step']= "suppp";
     Save($user, $fromId);
  }
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
elseif($user['step'] == "suppp"){
     SendMessage($chatId, "✔️ دکمه {$user['btnName']} با موفقیت ساخته شد.", null, $messageId, $panel);
     $data = ['btn'=> $user['btnName'], 'type'=> $user['type'], 'caption'=> $text, 'devs'=> $fromId];
     SaveButton($data);
     Add($user['btnName']);
     $user['step']= "none";
     Save($user, $fromId);
}
elseif($text == "🔃 تغیرات" && in_array($fromId, $admin)){
      SendMessage($chatId, "➕ لطفا نام دکمه ای که میخواهید به آن زیر مجموعه اضافه کنید را ارسال کنید", null, $messageId, $back);
      $user['step']= "convert";
      Save($user, $fromId);
}
elseif($user['step'] == 'convert'){
   $bt = json_decode(file_get_contents("Button/$text.json"),true);
   if($bt['group'] != 'ok'){
      SendMessage($chatId, "✅ لطفا متنی که میخواهید با زدن دکمه نمایش داده شود را ارسال کنید", null, $messageId, $back);
      $data = ['btn'=> $text, 'comment'=> "", 'menu'=>[], 'group'=>'ok'];
      file_put_contents("Button/$text.json", json_encode($data,128|256));
   }else{
      SendMessage($chatId, "✅ لطفا متنی که میخواهید با زدن دکمه نمایش داده شود را ارسال کنید", null, $messageId, $back);
  }
      $user['step']= "Comment";
      $user['com']= "ok";
      $user['NBtnG']= $text;
      Save($user, $fromId);
}
elseif($text == "🎛 ساخت زیرمجموعه" && in_array($fromId, $admin)){
     SendMessage($chatId, "⬆️ لطفا نام دکمه اصلی را وارد کنید", null, $messageId, $back);
     $user['step']= "BtnGroup";
     Save($user, $fromId);
}
elseif($user['step'] == "BtnGroup" && isset($text)){
  if(!file_exists("Button/$text.json")){
     SendMessage($chatId, "✅ لطفا متنی که میخواهید با زدن دکمه نمایش داده شود را ارسال کنید", null, $messageId, $back);
     $user['step']= "Comment";
     $user['NBtnG']= $text;
     Save($user, $fromId);
 }else{
     SendMessage($chatId, "⛔️ خطا دکمه $text از قبل ساخته شده است نام دیگری ارسال کنید", null, $messageId, $back);
 }
}
elseif($user['step'] == "Comment" && isset($text)){  
    SendMessage($chatId, "⬇️ حالا نام دکمه زیر منو را ارسال کنید", null, $messageId, $back);
     $user['step']= "BtnZir";
     $user['comment']= $text;
     Save($user, $fromId);
     
     if($user['com'] =='ok'){
     $bt = json_decode(file_get_contents("Button/{$user['NBtnG']}.json"),true);
     $bt['comment'] = $text;
     file_put_contents("Button/{$user['NBtnG']}.json", json_encode($bt,128|256));
     }
}
elseif($user['step'] == "BtnZir" && isset($text)){
  if(!file_exists("Button/$text.json")){
     SendMessage($chatId, "🔄 خب حالا عملکرد دکمه $text را از منوی زیر انتخاب کنید", null, $messageId, $whois);
     $user['step']= "BtnZirWhois";
     $user['ZirN']= $text;
     Save($user, $fromId);
   }else{
     SendMessage($chatId, "⛔️ خطا دکمه $text از قبل ساخته شده است نام دیگری ارسال کنید", null, $messageId, $back);
 }
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
elseif($user['step'] == 'BtnZirWhois' && isset($text)){
     $type = str_replace(["🖼 ارسال عکس","🎞 ارسال فیلم","📦 ارسال فایل","📼 ارسال گیف","📃 ارسال متن", "🗣 پشتیبانی"],["photo","video","document","document","text", "supp"],$text);
     SendMessage($chatId, "✔️ خب شما $text را انتخاب کردید لطفا آن را بفرستید. اگر عکس و فیلم ، فایل هست کپشن آن را هم به همراه همان بچسبانید و ارسال کنید", null, $messageId, $back);
     $user['step']= "ZirMedia";
     $user['type']= $type;
     Save($user, $fromId);
}
elseif($user['step'] == 'ZirMedia'){
   switch($user['type']){
     case 'text':
        SendMessage($chatId, "✔️ دکمه {$user['ZirN']} با موفقیت ساخته شد.\n☑️ اگر قصد زیر مجموعه دیگری در دکمه {$user['NBtnG']} دارید نام دکمه را ارسال کنید وگرنه دکمه برگشت را بزنید", null, $messageId, $back);
        $data = ['btn'=> $user['ZirN'], 'type'=> $user['type'], 'text'=> $text];
        $dataa = ['btn'=> $user['NBtnG'],  'comment'=> $user['comment'],'menu'=>[], 'group'=>'ok'];
       
       if(file_exists("Button/{$user['NBtnG']}.json")){
           $boot = json_decode(file_get_contents("Button/{$user['NBtnG']}.json"),true);
           array_push($boot['menu'], $user['ZirN']);
           file_put_contents("Button/{$user['NBtnG']}.json", json_encode($boot,128|256));
       }else{
           SaveMenu($user['ZirN'],$dataa);
           Add($user['NBtnG']);
     }
        SaveButton($data);
        
     break;
     case 'photo':
        $fileId = $message->photo[1]->file_id;
        $caption = isset($message->caption)?$message->caption:null;
        SendMessage($chatId, "✔️ دکمه {$user['ZirN']} با موفقیت ساخته شد.\n☑️ اگر قصد زیر مجموعه دیگری در دکمه {$user['NBtnG']} دارید نام دکمه را ارسال کنید وگرنه دکمه برگشت را بزنید", null, $messageId, $back);
        $data = ['btn'=> $user['ZirN'], 'type'=> $user['type'], 'id'=> $fileId, 'caption'=> $caption];
        $dataa = ['btn'=> $user['NBtnG'],  'comment'=> $user['comment'],'menu'=>[], 'group'=>'ok'];
        if(file_exists("Button/{$user['NBtnG']}.json")){
           $boot = json_decode(file_get_contents("Button/{$user['NBtnG']}.json"),true);
           array_push($boot['menu'], $user['ZirN']);
           file_put_contents("Button/{$user['NBtnG']}.json", json_encode($boot,128|256));
       }else{
           SaveMenu($user['ZirN'],$dataa);
           Add($user['NBtnG']);
     }
        SaveButton($data);
     break;
     case 'video':
        $fileId = $message->video->file_id;
        $caption = isset($message->caption)?$message->caption:null;
        SendMessage($chatId, "✔️ دکمه {$user['ZirN']} با موفقیت ساخته شد.\n☑️ اگر قصد زیر مجموعه دیگری در دکمه {$user['NBtnG']} دارید نام دکمه را ارسال کنید وگرنه دکمه برگشت را بزنید", null, $messageId, $back);
        $data = ['btn'=> $user['ZirN'], 'type'=> $user['type'], 'id'=> $fileId, 'caption'=> $caption];
        $dataa = ['btn'=> $user['NBtnG'],  'comment'=> $user['comment'],'menu'=>[], 'group'=>'ok'];
        if(file_exists("Button/{$user['NBtnG']}.json")){
           $boot = json_decode(file_get_contents("Button/{$user['NBtnG']}.json"),true);
           array_push($boot['menu'], $user['ZirN']);
           file_put_contents("Button/{$user['NBtnG']}.json", json_encode($boot,128|256));
       }else{
           SaveMenu($user['ZirN'],$dataa);
           Add($user['NBtnG']);
     }
        SaveButton($data);
     break;
     case 'document':
        $fileId = $message->document->file_id;
        $caption = isset($message->caption)?$message->caption:null;
        SendMessage($chatId, "✔️ دکمه {$user['ZirN']} با موفقیت ساخته شد.\n☑️ اگر قصد زیر مجموعه دیگری در دکمه {$user['NBtnG']} دارید نام دکمه را ارسال کنید وگرنه دکمه برگشت را بزنید", null, $messageId, $back);
        $data = ['btn'=> $user['ZirN'],'type'=> $user['type'], 'id'=> $fileId, 'caption'=> $caption];
        $dataa = ['btn'=> $user['NBtnG'],  'comment'=> $user['comment'],'menu'=>[], 'group'=>'ok'];
        if(file_exists("Button/{$user['NBtnG']}.json")){
           $boot = json_decode(file_get_contents("Button/{$user['NBtnG']}.json"),true);
           array_push($boot['menu'], $user['ZirN']);
           file_put_contents("Button/{$user['NBtnG']}.json", json_encode($boot,128|256));
       }else{
           SaveMenu($user['ZirN'],$dataa);
           Add($user['NBtnG']);
     }
        SaveButton($data);
     break;
     case 'supp':        
        SendMessage($chatId, "✔️ لطفا متنی که میخواهید برای پشتیبانی نمایش داده شود را ارسال کنید:", null, $messageId, $back);
        $user['step']= "xporr";
        Save($user, $fromId);
     break;
   }
   if($user['type'] != "supp"){
     $user['step']= "BtnZir";
     $user['com']= "off";   
     Save($user, $fromId);
   }else{
     $user['step']= "xporr";
     $user['com']= "off";   
     Save($user, $fromId);
   }
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
elseif($user['step'] == "xporr"){
     SendMessage($chatId, "✔️ دکمه {$user['ZirN']} با موفقیت ساخته شد.", null, $messageId, $panel);
     $data = ['btn'=> $user['ZirN'], 'type'=> $user['type'], 'caption'=> $text, 'devs'=> $fromId];
     $dataa = ['btn'=> $user['NBtnG'],  'comment'=> $user['comment'],'menu'=>[], 'group'=>'ok'];
        if(file_exists("Button/{$user['NBtnG']}.json")){
           $boot = json_decode(file_get_contents("Button/{$user['NBtnG']}.json"),true);
           array_push($boot['menu'], $user['ZirN']);
           file_put_contents("Button/{$user['NBtnG']}.json", json_encode($boot,128|256));
       }else{
           SaveMenu($user['ZirN'],$dataa);
           Add($user['NBtnG']);
     }
        SaveButton($data);    
        $user['step']= "none";
     Save($user, $fromId);
}
elseif($text == "➖ حذف دکمه" && in_array($fromId, $admin)){
     SendMessage($chatId, "⌨ لطفا نام دکمه مورد نظر را ارسال فرمایید", null, $messageId, $back);
     $user['step']= "DelSingel";
     Save($user, $fromId);
}
elseif($user['step'] == "DelSingel"){
    if(file_exists("Button/$text.json")){
      $butt = json_decode(file_get_contents("Button/$text.json"),true);
      if($butt['group'] != 'ok'){
       SendMessage($chatId, "✅ دکمه $text با موفقیت حذف گردید", null, $messageId, $panel);
       $key = array_search($text, $db['button']);
       unset($db['button'][$key]);
       $db['button'] = array_values($db['button']);
       file_put_contents("btn.json", json_encode($db,128|256));
       unlink("Button/$text.json");
       $user['step']= "none";
       Save($user, $fromId);
     }else{
       SendMessage($chatId, "📶 این دکمه داری زیر مجموعه میباشد برای حذف کلی آن از بخش حذف زیر مجموعه استفاده کنید", null, $messageId, $back);
     }
    }else{
       SendMessage($chatId, "⛔️ خطا دکمه ای با نام‌ $text یافت نشد", null, $messageId, $back);
  }
}
elseif(preg_match('/^\/col\s+(\d+)/i',$text,$m) && in_array($fromId, $admin)){
    $column = $m[1];
  if($column >= 1){
    SendMessage($chatId, "✅ با موفقیت تعداد سطر ها به $column تغیر یافت", null, $messageId, null);
    $dev['col'] = $column;
    file_put_contents("dev.json", json_encode($dev,128|256));
  }else{  
  SendMessage($chatId, "⛔️ لطفا مقداری بیشتر از 1 وارد کنید", null, $messageId, null);
 }
}
elseif($text == "➖ حذف زیرمجموعه" && in_array($fromId, $admin)){
     SendMessage($chatId, "⌨ لطفا نام دکمه مورد نظر را ارسال فرمایید", null, $messageId, $back);
     $user['step']= "DelGpAll";
     Save($user, $fromId);
}
elseif($user['step'] == 'DelGpAll' && isset($text)){
    if(file_exists("Button/$text.json")){
      $butt = json_decode(file_get_contents("Button/$text.json"),true);
      if($butt['group'] == 'ok'){
        $key = [['text'=>"↩️ برگشت"],['text'=>"○>> {$butt['btn']}"]];
        $keys = keyboardSelect($butt['menu'], 1, $key);
        $delete = json_encode(['keyboard'=> $keys,'resize_keyboard'=> true]);
        SendMessage($chatId, "👇🏻 دکمه ای که میخواهید حذف کنید را از لیست انتخاب کنید", null, $messageId, $delete);
        $user['step']= "SelectKey";
        $user['big']= $butt['btn'];
        Save($user, $fromId);
      }else{
       SendMessage($chatId, "⛔️ این دکمه یک زیر مجموعه نمیباشد", null, $messageId, $back);
    }
   }else{
     SendMessage($chatId, "🚫 چنین دکمه ای یافت نشد !", null, $messageId, $back);
  }
}
elseif($user['step'] == "SelectKey" && isset($text)){
   $ex = explode("#-> ", $text)[1];
   $ex1 = explode("○>> ", $text)[1];
   $butt = json_decode(file_get_contents("Button/{$user['big']}.json"),true);
   if(strpos($text, "○>> ") !==false){
      SendMessage($chatId, "✅ زیرمجموعه $ex1 با موفقیت حذف شد", null, $messageId, $panel);
     $key = array_search($ex1, $db['button']);
     unset($db['button'][$key]);
     $db['button'] = array_values($db['button']);
     file_put_contents("btn.json", json_encode($db,128|256));
     foreach($butt['menu'] as $value){
       unlink("Button/$value.json");
     }
     unlink("Button/$ex1.json");
   }else{
      SendMessage($chatId, "✅ دکمه $ex با موفقیت حذف گردید", null, $messageId, $panel);
     $key = array_search($ex, $butt['menu']);
     unset($butt['menu'][$key]);
     $butt['menu'] = array_values($butt['menu']);
     file_put_contents("Button/{$user['big']}.json", json_encode($butt,128|256));
     unlink("Button/$ex.json");
   }
    $user['step']= "none";        
    Save($user, $fromId);
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
elseif($text == "📩 فروارد" && in_array($fromId, $admin)){
    SendMessage($chatId, "-> لطفا پیام خود را ارسال یا از جایی فروارد کنید :)", null, $messageId, $back);
    $user['step']= "fwd";        
    Save($user, $fromId);
}
elseif($user['step'] == 'fwd'){
    foreach(scandir("user") as $key => $value){
        $dir = pathinfo($value, PATHINFO_FILENAME);
        forwardMessage($dir, $chatId, $messageId);
    }
    SendMessage($chatId, "پیام برای همه ارسال گردید", null, $messageId, $panel);
    $user['step']= "none";        
    Save($user, $fromId);
}
elseif($text == "📩 پیام" && in_array($fromId, $admin)){
    SendMessage($chatId, "-> لطفا پیام خود را ارسال کنید فقط متن", null, $messageId, $back);
    $user['step']= "pms";        
    Save($user, $fromId);
}
elseif($user['step'] == 'pms' && isset($text)){
    foreach(scandir("user") as $key => $value){
        $dir = pathinfo($value, PATHINFO_FILENAME);
        SendMessage($dir, $text, null, null, null);
    }
    SendMessage($chatId, "پیام برای همه ارسال گردید", null, $messageId, $panel);
    $user['step']= "none";        
    Save($user, $fromId);
}
elseif(preg_match('/^\/logs\s+?(on|off)$/i',$text,$m) && in_array($fromId, $admin)){
     $lock = strtolower($m[1]);
     $on = str_replace(['on','off'],['روشن','خاموش'],$lock);
     SendMessage($chatId, "✅ مسابقات با موفقیت $on شد", null, $messageId, null);
     $dev['support'] = $lock;
     file_put_contents("dev.json", json_encode($dev,128|256));
}
elseif(preg_match('/^\/lock\s+(\-\d+)\s+(.*)/i',$text, $m) && in_array($fromId, $admin)){
     SendMessage($chatId, "کانال دوم با موفقیت روی ربات قفل شد", null, $messageId, null);
     $dev['id'] = $m[1];
     $dev['link'] = $m[2];
     file_put_contents("dev.json", json_encode($dev,128|256));
}
elseif(preg_match('/^\/channel\s+(.*)/',$text, $m) && in_array($fromId, $admin)){
     SendMessage($chatId, "کانال اول با موفقیت روی ربات قفل شد", null, $messageId, null);
     $dev['ch'] = $m[1];
     file_put_contents("dev.json", json_encode($dev,128|256));
}
# -----
elseif(preg_match('/^\/but\s+(.*)/i',$text, $m) && in_array($fromId, $admin)){
     $but = $m[1];
     SendMessage($chatId, "نام دکمه : $but شد و با موفقیت تغیر یافت", null, $messageId, null);
     $dev['button'] = $but;
     file_put_contents("dev.json", json_encode($dev,128|256));
}
# -----
elseif(preg_match('/^\/rules/si',$text, $m) && in_array($fromId, $admin)){
    $rules = substr($text, 7);
    SendMessage($chatId, "قوانین با موفقیت تغیر یافت.", null, $messageId, null);
     $dev['rules'] = $rules;
     file_put_contents("dev.json", json_encode($dev,128|256));
}
# -----
elseif(preg_match('/^\/tab/si',$text, $m) && in_array($fromId, $admin)){
    $tab = substr($text, 5);
    SendMessage($chatId, "بخش دوم با موفقیت تغیر یافت.", null, $messageId, null);
     $dev['abouts'] = $tab;
     file_put_contents("dev.json", json_encode($dev,128|256));
}
//ارتقا دهنده دیباگ کننده سورس @DevOscar
//اولین چنل اوپن کننده @Virtualservices_3
//بی ناموسی منبع پاک کنی با افتخار به سعید افکونی
?>