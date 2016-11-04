<?php
/**
 * Created by PhpStorm.
 * User: WinTeh
 * Date: 02.11.2016
 */
class Mail{

    public function mailHTML2(){
        //http://www.spravkaweb.ru/php/sovet/mail
        $subject="Тема письма";
        $header="Content-type: text/html; charset=\"utf-8\"";
        $header.="From: Evgen <evgen@mail.ru>";
        $header.="Subject: ".$subject;
        $header.="Content-type: text/html; charset=\"utf-8\"";
        $msg="<ul><li>Сторака 1</li><li>Сторака 2</li><li>Сторака 3</li></ul></evgen@mail.ru>
";
        mail("name@mail.ru", $subject, $msg, $header);

    }

    public function mailHTML(){
//http://php5.kiev.ua/manual/ru/function.mail.html
// несколько получателей
$to  = 'aidan@example.com' . ', '; // обратите внимание на запятую
$to .= 'wez@example.com';

// тема письма
$subject = 'Birthday Reminders for August';

// текст письма
$message = '
<html>
<head>
  <title>Birthday Reminders for August</title>
</head>
<body>
  <p>Here are the birthdays upcoming in August!</p>
  <table>
    <tr>
      <th>Person</th><th>Day</th><th>Month</th><th>Year</th>
    </tr>
    <tr>
      <td>Joe</td><td>3rd</td><td>August</td><td>1970</td>
    </tr>
    <tr>
      <td>Sally</td><td>17th</td><td>August</td><td>1973</td>
    </tr>
  </table>
</body>
</html>
';

// Для отправки HTML-письма должен быть установлен заголовок Content-type
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Дополнительные заголовки
$headers .= 'To: Mary <mary@example.com>, Kelly <kelly@example.com>' . "\r\n";
$headers .= 'From: Birthday Reminder <birthday@example.com>' . "\r\n";
$headers .= 'Cc: birthdayarchive@example.com' . "\r\n";
$headers .= 'Bcc: birthdaycheck@example.com' . "\r\n";

// Отправляем
mail($to, $subject, $message, $headers);

    }

}