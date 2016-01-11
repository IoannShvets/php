<?php 
require 'connect.php';

$ip_adress = $_SERVER['REMOTE_ADDR']; // узнаем IP

$browser = get_browser(null, true); // узнаем браузер

$name = trim($_REQUEST['name']); // считываем данные с поля name

$insert_sql = "INSERT INTO guestbook (ip, browser, name)" . "VALUES('$ip_adress', '$browser', '$name');";
mysql_query($insert_sql); // загружаем в базу 

echo "Ip, Browser, Name added to table";
?>
