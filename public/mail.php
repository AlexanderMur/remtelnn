<?php
/* проверка данных */
if (isset($_POST['name'])) {$name = $_POST['name'];}
if (isset($_POST['phone'])) {$phone = $_POST['phone'];}
if (isset($_POST['email'])) {$email = $_POST['email'];}
if (isset($_POST['address'])) {$address = $_POST['address'];}

$name = stripslashes($name);
$name = htmlspecialchars($name);
$email = stripslashes($email);
$email = htmlspecialchars($email);
$phone = stripslashes($phone);
$phone = htmlspecialchars($phone);
$address = stripslashes($address);
$address = htmlspecialchars($address);


/* UTM */
if (isset($_POST['utm_medium'])) {$utm_medium = $_POST['utm_medium'];}
if (isset($_POST['utm_source'])) {$utm_source = $_POST['utm_source'];}
if (isset($_POST['utm_campaign'])) {$utm_campaign = $_POST['utm_campaign'];}
if (isset($_POST['block'])) {$block = $_POST['block'];}
if (isset($_POST['utm_term'])) {$utm_term = $_POST['utm_term'];}
if (isset($_POST['utm_content'])) {$utm_content = $_POST['utm_content'];}
if (isset($_POST['position'])) {$position = $_POST['position'];}
if (isset($_POST['keyword'])) {$keyword = $_POST['keyword'];}
if (isset($_POST['action'])) {$action = $_POST['action'];}

$utm_medium = stripslashes($utm_medium);
$utm_medium = htmlspecialchars($utm_medium);
$utm_source = stripslashes($utm_source);
$utm_source = htmlspecialchars($utm_source);
$utm_campaign = stripslashes($utm_campaign);
$utm_campaign = htmlspecialchars($utm_campaign);
$utm_term = stripslashes($utm_term);
$utm_term = htmlspecialchars($utm_term);
$utm_content = stripslashes($utm_content);
$utm_content = htmlspecialchars($utm_content);
$block = stripslashes($block);
$block = htmlspecialchars($block);
$keyword = stripslashes($keyword);
$keyword = htmlspecialchars($keyword);
$position = stripslashes($position);
$position = htmlspecialchars($position);
/*$action = stripslashes($action);
$action = htmlspecialchars($action);
*/

/* UTM */
/* проверка данных */


$subject='Заявка с REMTEL';
$site = 'remtelnn';
/* тело письма */
$msg=
    '
<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=320, target-densitydpi=device-dpi">
<style type="text/css">
/* Mobile-specific Styles */
@media only screen and (max-width: 600px) { 
table[class=w0], td[class=w0] { width: 0 !important; }
table[class=w10], td[class=w10], img[class=w10] { width:10px !important; }
table[class=w15], td[class=w15], img[class=w15] { width:5px !important; }
table[class=w30], td[class=w30], img[class=w30] { width:10px !important; }
table[class=w60], td[class=w60], img[class=w60] { width:10px !important; }
table[class=w125], td[class=w125], img[class=w125] { width:80px !important; }
table[class=w130], td[class=w130], img[class=w130] { width:55px !important; }
table[class=w140], td[class=w140], img[class=w140] { width:90px !important; }
table[class=w160], td[class=w160], img[class=w160] { width:180px !important; }
table[class=w170], td[class=w170], img[class=w170] { width:100px !important; }
table[class=w180], td[class=w180], img[class=w180] { width:80px !important; }
table[class=w195], td[class=w195], img[class=w195] { width:80px !important; }
table[class=w220], td[class=w220], img[class=w220] { width:80px !important; }
table[class=w240], td[class=w240], img[class=w240] { width:180px !important; }
table[class=w255], td[class=w255], img[class=w255] { width:185px !important; }
table[class=w275], td[class=w275], img[class=w275] { width:135px !important; }
table[class=w280], td[class=w280], img[class=w280] { width:135px !important; }
table[class=w300], td[class=w300], img[class=w300] { width:140px !important; }
table[class=w325], td[class=w325], img[class=w325] { width:95px !important; }
table[class=w360], td[class=w360], img[class=w360] { width:140px !important; }
table[class=w410], td[class=w410], img[class=w410] { width:180px !important; }
table[class=w470], td[class=w470], img[class=w470] { width:200px !important; }
table[class=w580], td[class=w580], img[class=w580] { width:280px !important; }
table[class=w640], td[class=w640], img[class=w640] { width:300px !important; }
table[class*=hide], td[class*=hide], img[class*=hide], p[class*=hide], span[class*=hide] 
{ display:none !important; }
table[class=h0], td[class=h0] { height: 0 !important; }
p[class=footer-content-left] { text-align: center !important; }
#headline p { font-size: 30px !important; }
.article-content, #left-sidebar{ -webkit-text-size-adjust: 90% !important; -ms-text-size-adjust: 90% !important; }
.header-content, .footer-content-left {-webkit-text-size-adjust: 80% !important; -ms-text-size-adjust: 80% !important;}
img { height: auto; line-height: 100%;}
 } 

body { background-color: #ececec; margin: 0; padding: 0; }
img { outline: none; text-decoration: none; display: block;}
br, strong br, b br, em br, i br { line-height:100%; }
h1, h2, h3, h4, h5, h6 { line-height: 100% !important; -webkit-font-smoothing: antialiased; }
h1 a, h2 a, h3 a, h4 a, h5 a, h6 a { color: blue !important; }
h1 a:active, h2 a:active,  h3 a:active, h4 a:active, h5 a:active, h6 a:active { color: red !important; }
h1 a:visited, h2 a:visited,  h3 a:visited, h4 a:visited, h5 a:visited, h6 a:visited { color: purple !important; }
table td, table tr { border-collapse: collapse; }
.yshortcuts, .yshortcuts a, .yshortcuts a:link,.yshortcuts a:visited, .yshortcuts a:hover, .yshortcuts a span {
color: black; text-decoration: none !important; border-bottom: none !important; background: none !important;
}   
code {
  white-space: normal;
  word-break: break-all;
}
#background-table { background-color: #ececec; }

#top-bar { border-radius:6px 6px 0px 0px; -moz-border-radius: 6px 6px 0px 0px; 
-webkit-border-radius:6px 6px 0px 0px; -webkit-font-smoothing: antialiased; 
background-color: #4b4044; color: #72a6a6; }
#top-bar a { font-weight: bold; color: #72a6a6; text-decoration: none;}
#footer { border-radius:0px 0px 6px 6px; -moz-border-radius: 0px 0px 6px 6px; 
-webkit-border-radius:0px 0px 6px 6px; -webkit-font-smoothing: antialiased; }

body, td { font-family: HelveticaNeue, sans-serif; }
.header-content, .footer-content-left, .footer-content-right { 
    -webkit-text-size-adjust: none; -ms-text-size-adjust: none; }

.header-content { font-size: 12px; color: #72a6a6; }
.header-content a { font-weight: bold; color: #72a6a6; text-decoration: none; }
#headline p { color: #72a6a6; font-family: \'Helvetica Neue\', Arial, Helvetica, 
Geneva, sans-serif; font-size: 36px; text-align: center; margin-top:0px; margin-bottom:30px; }
#headline p a { color: #72a6a6; text-decoration: none; }
.article-title { font-size: 18px; line-height:24px; color: #d9653b; font-weight:bold; 
    margin-top:0px; margin-bottom:18px; font-family: HelveticaNeue, sans-serif; }
.article-title a { color: #d9653b; text-decoration: none; }
.article-title.with-meta {margin-bottom: 0;}
.article-meta { font-size: 13px; line-height: 20px; color: #ccc; font-weight: bold; margin-top: 0;}
.article-content { font-size: 13px; line-height: 18px; color: #444444; margin-top: 0px; 
    margin-bottom: 18px; font-family: HelveticaNeue, sans-serif; }
.article-content a { color: #7f8c4f; font-weight:bold; text-decoration:none; }
.article-content img { max-width: 100% }
.article-content ol, .article-content ul { margin-top:0px; margin-bottom:18px; margin-left:19px; padding:0; }
.article-content li { font-size: 13px; line-height: 18px; color: #444444; }
.article-content li a { color: #7f8c4f; text-decoration:underline; }
.article-content p {margin-bottom: 15px;}
.footer-content-left { font-size: 12px; line-height: 15px; color: #000; margin-top: 0px; margin-bottom: 15px; }
.footer-content-left a { color: #000; font-weight: bold; text-decoration: none; }
.footer-content-right { font-size: 11px; line-height: 16px; color: #000; margin-top: 0px; margin-bottom: 15px; }
.footer-content-right a { color: #000; font-weight: bold; text-decoration: none; }
#footer { background-color: #d5e9e7; color: #000; }
#footer a { color: #000; text-decoration: none; font-weight: bold; }
#permission-reminder { white-space: normal; }
#street-address { color: #000; white-space: normal; }
</style>
<!--[if gte mso 9]>
<style _tmplitem="820" >
.article-content ol, .article-content ul {
   margin: 0 0 0 24px;
   padding: 0;
   list-style-position: inside;
}
</style>
<![endif]--></head><body><table width="100%" cellpadding="0" cellspacing="0" border="0" id="background-table">
    <tbody><tr>
        <td align="center" bgcolor="#ececec">
            <table class="w640" style="margin:0 10px;" width="640" cellpadding="0" cellspacing="0" border="0">
                <tbody><tr><td class="w640" width="640" height="20"></td></tr>
                <tr>
                <td id="header" class="w640" width="640" align="center" bgcolor="#d5e9e7">
    
    <table class="w640" width="640" cellpadding="0" cellspacing="0" border="0">
        <tbody><tr><td class="w30" width="30"></td><td class="w580" width="580" height="30"></td><td class="w30" width="30"></td></tr>
        <tr>
            <td class="w30" width="30"></td>
            <td class="w580" width="580">
                <div align="center" id="headline">
                    <p>
                        <strong><singleline label="Title">'.$subject.'  |  '.$site.'</singleline></strong>
                    </p>
                </div>
            </td>
            <td class="w30" width="30"></td>
        </tr>
    </tbody></table>
    
    
</td>
                </tr>
                <tr id="simple-content-row"><td class="w640" width="640" bgcolor="#ffffff">
    <table class="w640" width="640" cellpadding="0" cellspacing="0" border="0">
        <tbody><tr>
            <td class="w30" width="30"></td>
            <td class="w580" width="580">
                <repeater>                  
                    <layout label="Text only">
                        <table class="w580" width="580" cellpadding="0" cellspacing="0" border="0">
                            <tbody><tr>
                                <td class="w580" width="580">
                                    <p align="left" class="article-title"><singleline label="Title"><b>Контактные данные:</b></singleline></p>
                                    <div align="left" class="article-content">
                                            <multiline label="Description"><b>Имя:</b> '.$name.'</multiline><br>
                                            <multiline label="Description"><b>Телефон:</b> '.$phone.'</multiline><br>
                                    </div>
                                </td>
                            </tr>
                        </tbody></table>
                    </layout>           
                </repeater>
            </td>
            <td class="w30" width="30"></td>
        </tr>
    </tbody></table>
</td></tr>
            </tbody></table>
        </td>
    </tr>
</tbody></table></body></html>  
';
/* тело письма */

/* тело письма автоответ клиенту */
/*$return_msg='Спасибо за обращение в компанию ***<br>Ваша заявка принята!'*/

$return_msg='Здравствуйте '.$name.'! <br>
Вы оставили заявку на консультацию по улучшению клиентского сервиса. <br>
Наши специалисты свяжутся с Вами в ближайшее время.';
/* тело письма автоответ клиенту */



$to  = 'iremtelnn@gmail.com';

$headers  = "Content-type: text/html;charset=utf-8\r\n";
$headers .= "From: Сайт REMTEL <info@remtelnn.ru>\r\n";
$headers .= "Reply-To: info@remtelnn.ru\r\n";
$subject  = 'Заявка с REMTEL'; // тема письма

mail($to, $subject, $msg, $headers);







$errors=array(//Массив ошибок
301=>'Moved permanently',
400=>'Bad request',
401=>'Unauthorized',
403=>'Forbidden',
404=>'Not found',
500=>'Internal server error',
502=>'Bad gateway',
503=>'Service unavailable'
);
$flogs=fopen("logs.txt","a");//Файл логов
$user=array(
'USER_LOGIN'=>'iremtelnn@gmail.com',
'USER_HASH'=>'1bf0e5607bc853d51888c09203ff24f1c4ec8a52'
); 

#Формируем ссылки для запросов
$subdomain = 'iremtelnn';
$auth_link = 'https://'.$subdomain.'.amocrm.ru/private/api/auth.php?type=json';
$account_link = 'https://'.$subdomain.'.amocrm.ru/private/api/v2/json/accounts/current';
$contacts_link = 'https://'.$subdomain.'.amocrm.ru/private/api/v2/json/contacts/set';
$tasks_link = 'https://'.$subdomain.'.amocrm.ru/private/api/v2/json/tasks/set';
$leads_link = 'https://'.$subdomain.'.amocrm.ru/private/api/v2/json/leads/set';
$leads_last_id = 'https://'.$subdomain.'.amocrm.ru/private/api/v2/json/contacts/links?limit_ro..';

#Авторизация
$curl=curl_init();
curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
curl_setopt($curl,CURLOPT_USERAGENT,'amoCRM-API-client/1.0');
curl_setopt($curl,CURLOPT_URL,$auth_link);
curl_setopt($curl,CURLOPT_CUSTOMREQUEST,'POST');
curl_setopt($curl,CURLOPT_POSTFIELDS,json_encode($user));
curl_setopt($curl,CURLOPT_HTTPHEADER,array('Content-Type: application/json'));
curl_setopt($curl,CURLOPT_HEADER,false);
curl_setopt($curl,CURLOPT_COOKIEFILE,dirname(__FILE__).'/cookie.txt'); #PHP>5.3.6 dirname(__FILE__) -> __DIR__
curl_setopt($curl,CURLOPT_COOKIEJAR,dirname(__FILE__).'/cookie.txt'); #PHP>5.3.6 dirname(__FILE__) -> __DIR__
curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,0);
curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,0);

$out = curl_exec($curl);
$code = curl_getinfo($curl,CURLINFO_HTTP_CODE);
curl_close($curl);

//var_dump($out);
//var_dump($code);

if($code!=200 && $code!=204){//проверяем удалось ли выполнить запрос
if(isset($errors[$code])){//ошибка известна
fwrite($flogs,date("d-m-Y H:i:s")." Ошибка авторизации в amoCRM (".$code." ".$errors[$code].")\n");
}else{
fwrite($flogs,date("d-m-Y H:i:s")." Ошибка авторизации в amoCRM (".$code.")\n");
}
}elseif(preg_match('|"auth":true|',$out)){

#Аккаунт
$curl=curl_init();
curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
curl_setopt($curl,CURLOPT_USERAGENT,'amoCRM-API-client/1.0');
curl_setopt($curl,CURLOPT_URL,$account_link);
curl_setopt($curl,CURLOPT_HEADER,false);
curl_setopt($curl,CURLOPT_COOKIEFILE,dirname(__FILE__).'/cookie.txt'); #PHP>5.3.6 dirname(__FILE__) -> __DIR__
curl_setopt($curl,CURLOPT_COOKIEJAR,dirname(__FILE__).'/cookie.txt'); #PHP>5.3.6 dirname(__FILE__) -> __DIR__
curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,0);
curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,0);

$response = curl_exec($curl);
$code = curl_getinfo($curl,CURLINFO_HTTP_CODE);
curl_close($curl);

$response = json_decode($response,1);
$response = $response['response'];
$custom_fields = $response['account']['custom_fields']['contacts'];



if(!isset($_POST['name'])) {
$_POST['name'] = "Лид с сайта (remtel)";
} 

if($_POST['name']!='')
$add['request']['contacts']['add'][0]['name']=$_POST['name'];
if($_POST['company']!='')
$add['request']['contacts']['add'][0]['company_name']=$_POST['company'];

// #выбор этой сделки
// $curl=curl_init();
// curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
// curl_setopt($curl,CURLOPT_USERAGENT,'amoCRM-API-client/1.0');
// curl_setopt($curl,CURLOPT_URL,$leads_last_id);
// curl_setopt($curl,CURLOPT_HEADER,false);
// curl_setopt($curl,CURLOPT_COOKIEFILE,dirname(__FILE__).'/cookie.txt'); #PHP>5.3.6 dirname(__FILE__) -> __DIR__
// curl_setopt($curl,CURLOPT_COOKIEJAR,dirname(__FILE__).'/cookie.txt'); #PHP>5.3.6 dirname(__FILE__) -> __DIR__
// curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,0);
// curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,0);

// $response = curl_exec($curl);
// $code =
// 10.11.15    
curl_getinfo($curl,CURLINFO_HTTP_CODE);
// curl_close($curl);

// $response = json_decode($response,1);
// $response = $response['response'];
// $leads_last_id_row = $response['links']['lead_id']; 

foreach($custom_fields as $field){
if($field['name']=='city'&&$_POST['city']!='')
$add['request']['contacts']['add'][0]['custom_fields'][]=array('id'=>$field['id'],'values'=>array(array('value'=>$_POST['city'])));
if($field['name']=='from_site')
$add['request']['contacts']['add'][0]['custom_fields'][]=array('id'=>$field['id'],'values'=>array(array('value'=>$_SERVER['HTTP_HOST'])));
if($field['name']=='keyword'&&$_POST['keyword']!='')
$add['request']['contacts']['add'][0]['custom_fields'][]=array('id'=>$field['id'],'values'=>array(array('value'=>$_POST['keyword'])));
if($field['name']=='utm_medium'&&$_POST['utm_medium']!='')
$add['request']['contacts']['add'][0]['custom_fields'][]=array('id'=>$field['id'],'values'=>array(array('value'=>$_POST['utm_medium'])));
if($field['name']=='utm_source'&&$_POST['utm_source']!='')
$add['request']['contacts']['add'][0]['custom_fields'][]=array('id'=>$field['id'],'values'=>array(array('value'=>$_POST['utm_source'])));
if($field['name']=='utm_campaign'&&$_POST['utm_campaign']!='')
$add['request']['contacts']['add'][0]['custom_fields'][]=array('id'=>$field['id'],'values'=>array(array('value'=>$_POST['utm_campaign'])));
if($field['name']=='utm_term'&&$_POST['utm_term']!='')
$add['request']['contacts']['add'][0]['custom_fields'][]=array('id'=>$field['id'],'values'=>array(array('value'=>$_POST['utm_term'])));
if($field['name']=='utm_content'&&$_POST['utm_content']!='')
$add['request']['contacts']['add'][0]['custom_fields'][]=array('id'=>$field['id'],'values'=>array(array('value'=>$_POST['utm_content'])));
if($field['name']=='block'&&$_POST['block']!='')
$add['request']['contacts']['add'][0]['custom_fields'][]=array('id'=>$field['id'],'values'=>array(array('value'=>$_POST['block'])));
if($field['name']=='referer')
$add['request']['contacts']['add'][0]['custom_fields'][]=array('id'=>$field['id'],'values'=>array(array('value'=>strpos($_SERVER["HTTP_REFERER"],'?')?substr($_SERVER["HTTP_REFERER"],0,strpos($_SERVER["HTTP_REFERER"],'?')):$_SERVER["HTTP_REFERER"])));
if($field['code']=='PHONE'&&$_POST['phone']!='')
$add['request']['contacts']['add'][0]['custom_fields'][]=array('id'=>$field['id'],'values'=>array(array('value'=>$_POST['phone'],'enum'=>'MOB')));
if($field['code']=='EMAIL'&&$_POST['email']!='')
$add['request']['contacts']['add'][0]['custom_fields'][]=array('id'=>$field['id'],'values'=>array(array('value'=>$_POST['email'],'enum'=>'WORK'))); 
}

#Контакт
$curl=curl_init();
curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
curl_setopt($curl,CURLOPT_USERAGENT,'amoCRM-API-client/1.0');
curl_setopt($curl,CURLOPT_URL,$contacts_link);
curl_setopt($curl,CURLOPT_CUSTOMREQUEST,'POST');
curl_setopt($curl,CURLOPT_POSTFIELDS,json_encode($add));
curl_setopt($curl,CURLOPT_HTTPHEADER,array('Content-Type: application/json'));
curl_setopt($curl,CURLOPT_HEADER,false);
curl_setopt($curl,CURLOPT_COOKIEFILE,dirname(__FILE__).'/cookie.txt'); #PHP>5.3.6 dirname(__FILE__) -> __DIR__
curl_setopt($curl,CURLOPT_COOKIEJAR,dirname(__FILE__).'/cookie.txt'); #PHP>5.3.6 dirname(__FILE__) -> __DIR__
curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,0);
curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,0);

$response = curl_exec($curl);
$code = curl_getinfo($curl,CURLINFO_HTTP_CODE);
curl_close($curl);

$response = json_decode($response,1);
//var_dump($response);
//var_dump($code);
unset($add);

if($code!=200 && $code!=204){
if(isset($errors[$code]))
fwrite($flogs,date("d-m-Y H:i:s")." Не удалось добавить контакт в amoCRM (".$code." ".$errors[$code].")\n");
else 
fwrite($flogs,date("d-m-Y H:i:s")." Не удалось добавить контакт в amoCRM
(".$code.")\n");
}else{
$user_id = $response['response']['contacts']['add'][0]['id'];
$add['request']['tasks']['add'][0]['element_id']=$user_id;
$add['request']['tasks']['add'][0]['element_type']=1;
$add['request']['tasks']['add'][0]['task_type']=4;
$add['request']['tasks']['add'][0]['text']="Позвонить клиенту ".$_POST["name"]." (".$_POST['phone'].")";
$add['request']['tasks']['add'][0]['complete_till']=time()+60*1;
//$add['request']['tasks']['add'][0]['linked_leads_id']=$leads_last_id_row;
$add['request']['tasks']['add'][0]['linked_leads_id']=1;

#Задача
$curl=curl_init();
curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
curl_setopt($curl,CURLOPT_USERAGENT,'amoCRM-API-client/1.0');
curl_setopt($curl,CURLOPT_URL,$tasks_link);
curl_setopt($curl,CURLOPT_CUSTOMREQUEST,'POST');
curl_setopt($curl,CURLOPT_POSTFIELDS,json_encode($add));
curl_setopt($curl,CURLOPT_HTTPHEADER,array('Content-Type: application/json'));
curl_setopt($curl,CURLOPT_HEADER,false);
curl_setopt($curl,CURLOPT_COOKIEFILE,dirname(__FILE__).'/cookie.txt'); #PHP>5.3.6 dirname(__FILE__) -> __DIR__
curl_setopt($curl,CURLOPT_COOKIEJAR,dirname(__FILE__).'/cookie.txt'); #PHP>5.3.6 dirname(__FILE__) -> __DIR__
curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,0);
curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,0);

$response = curl_exec($curl);
$code = curl_getinfo($curl,CURLINFO_HTTP_CODE);
curl_close($curl);

$response = json_decode($response,1);
//var_dump($response);
//var_dump($code);
unset($add);

if($code!=200 && $code!=204){
if(isset($errors[$code]))
fwrite($flogs,date("d-m-Y H:i:s")." Не удалось добавить задачу в amoCRM (".$code." ".$errors[$code].")\n");
else 
fwrite($flogs,date("d-m-Y H:i:s")." Не удалось добавить задачу в amoCRM (".$code.")\n");
}

}

if($code!=200 && $code!=204){
if(isset($errors[$code]))
fwrite($flogs,date("d-m-Y H:i:s")." Не удалось добавить контакт в amoCRM (".$code." ".$errors[$code].")\n");
else 
fwrite($flogs,date("d-m-Y H:i:s")." Не удалось добавить контакт в amoCRM (".$code.")\n");
}else{
$user_id = $response['response']['contacts']['add'][0]['id'];
$add['request']['leads']['add'][0]['tags']="xxxxxxxxxxxxx";
//$add['request']['leads']['add'][0]['element_id']=$user_id;
$add['request']['leads']['add'][0]['name']="Сделка ".$_POST["name"]." (".$_POST['phone'].")";
$add['request']['leads']['add'][0]['date_create']=time()+60*1;
$add['request']['leads']['add'][0]['status_id']=1;
$add['request']['leads']['add'][0]['responsible_user_id']=1;
$add['request']['leads']['add'][0]['custom_fields'][]=array('id'=>'530014','values'=>$_COOKIE['roistat_visit']); 
//print_r($_COOKIE['roistat_visit']);

#Сделки
$curl=curl_init();
curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
curl_setopt($curl,CURLOPT_USERAGENT,'amoCRM-API-client/1.0');
curl_setopt($curl,CURLOPT_URL,$leads_link);
curl_setopt($curl,CURLOPT_CUSTOMREQUEST,'POST');
curl_setopt($curl,CURLOPT_POSTFIELDS,json_encode($add));
curl_setopt($curl,CURLOPT_HTTPHEADER,array('Content-Type: application/json'));
curl_setopt($curl,CURLOPT_HEADER,false);
curl_setopt($curl,CURLOPT_COOKIEFILE,dirname(__FILE__).'/cookie.txt'); #PHP>5.3.6 dirname(__FILE__) -> __DIR__
curl_setopt($curl,CURLOPT_COOKIEJAR,dirname(__FILE__).'/cookie.txt'); #PHP>5.3.6 dirname(__FILE__) -> __DIR__
curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,0);
curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,0);

$response = curl_exec($curl);
$code = curl_getinfo($curl,CURLINFO_HTTP_CODE);
curl_close($curl);

$response = json_decode($response,1);
//var_dump($response);
//var_dump($code);
unset($add);

if($code!=200 && $code!=204){
if(isset($errors[$code]))
fwrite($flogs,date("d-m-Y H:i:s")." Не удалось добавить задачу в amoCRM (".$code." ".$errors[$code].")\n");
else 
fwrite($flogs,date("d-m-Y
H:i:s")." Не удалось добавить задачу в amoCRM (".$code.")\n");
}

} 

}
?>
