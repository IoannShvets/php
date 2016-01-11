<?php 
require 'connect.php';

$ip_adress = $_SERVER['REMOTE_ADDR']; // узнаем IP

echo $_SERVER['HTTP_USER_AGENT'] . "\n\n";
$browser = get_browser(null, true);
print_r($browser);

$name = trim($_REQUEST['name']); // считываем данные с поля

$insert_sql = "INSERT INTO guestbook (ip_adress, browser, name)" . "VALUES('{$ip_adress}', "$_SERVER['HTTP_USER_AGENT']" , '{$name}');"; 
mysql_query($insert_sql);  // загружаем в базу данныъ

echo "Ip, Browser, Name added to table"; // сообщение об успешной доставке
?>
