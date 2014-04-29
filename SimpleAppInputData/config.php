<?php
//host yang akan digunakan
//tidak perlu dirubah
$host = 'localhost';
 
//username untuk login ke host
$user = 'root';
 
//jika menggunakan LAPTOP sendiri sebagai host,
//secara default password dikosongkan
$pass = '';
 
//isikan nama database sesuai database oke!
//yang telah dibuat tadi
$dbname = 'belajar';
 
//untuk mengubungkan ke host
$connect = mysql_connect($host, $user, $pass) or die(mysql_error());
 
//untuk memilih database mana yang akan digunakan
$dbselect = mysql_select_db($dbname);
?>
