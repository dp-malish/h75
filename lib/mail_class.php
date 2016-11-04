<?php
/**
 * Created by PhpStorm.
 * User: WinTeh
 * Date: 02.11.2016
 */
class Mail{

    public static function confirmMail($mail,$id,$user_name,$pass,$key){
    //http://php5.kiev.ua/manual/ru/function.mail.html
        $site=$_SERVER['SERVER_NAME'];
        $subject='Подтверждение регистрации на сайте '.$site;

        $message='<html><head><title>Подтверждение регистрации</title></head><body><h3>Подтверждение регистрации!</h3>
        <p>Мы рады приветствовать Вас '.$user_name.' на нашем сайте <a href="'.Opt::PROTOCOL.$site.'/">'.$site.'</a></p>
        <p>Ваши данные для авторизации на сайте:</p>
        <table><tr><td>Логин</td><th>'.$mail.'</th></tr><tr><td>Пароль</td><th>'.$pass.'</th></tr></table>
        <p>Для подтверждения регистрации <a href="'.Opt::PROTOCOL.$site.'/?u='.$id.'&key='.$key.'&mailconfirm">перейдите по ссылке</a></p>
        </body></html>';

        // Для отправки HTML-письма должен быть установлен заголовок Content-type
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

// Дополнительные заголовки
//$headers .= 'To: Mary <mary@example.com>, Kelly <kelly@example.com>' . "\r\n";
        $headers .= 'From: '.$site.' <noreply@'.$site.'>' . "\r\n";

// Отправляем
        return mail($mail,$subject,$message,$headers);

    }

    public function mailHTML2(){//  = 'dp-malish@ya.ru'
        //http://www.spravkaweb.ru/php/sovet/mail
        $subject="Тема письма";
        $header="Content-type: text/html; charset=\"utf-8\"";
        $header.="From: Саша <dp-malish@ya.ru>";
        $header.="Subject: ".$subject;
        $header.="Content-type: text/html; charset=\"utf-8\"";
        $msg="<ul><li>Сторака 1</li><li>Сторака 2</li><li>Сторака 3</li></ul></dp-malish@ya.ru>
";
        mail("name@mail.ru", $subject, $msg, $header);

    }

    public function mailHTML(){
//http://php5.kiev.ua/manual/ru/function.mail.html
// несколько получателей
$to  = 'dp-malish@ya.ru'; // обратите внимание на запятую
//$to .= ', '.'wez@example.com';

// тема письма
$subject = 'Сам себе почтальон';

// текст письма
$message = '
<html>
<head>
  <title>Подтверждение регистрации</title>
</head>
<body>
  <p>Подтверждение регистрации!</p>
  <table>
    <tr>
      <th>Person</th><th>Day</th><th>Month</th><th>Year</th>
    </tr>
    <tr>
      <td>Sally</td><td>17th</td><td>August</td><td>1973</td>
    </tr>
  </table>
  <a href="http://siniycap.com.ua">Подтвердить почту</a>
</body>
</html>
';

// Для отправки HTML-письма должен быть установлен заголовок Content-type
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

// Дополнительные заголовки
//$headers .= 'To: Mary <mary@example.com>, Kelly <kelly@example.com>' . "\r\n";
$headers .= 'From: Магазин <noreply@example.com>' . "\r\n";
//$headers .= 'Cc: birthdayarchive@example.com' . "\r\n";
//$headers .= 'Bcc: birthdaycheck@example.com' . "\r\n";

// Отправляем
return mail($to, $subject, $message, $headers);

    }

}