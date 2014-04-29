<?php
//panggil dari file config.php untuk menghubung ke server
include('config.php');
 
//tangkap data dari form
$username = $_POST['username'];
$password = $_POST['password'];
$fullname = $_POST['fullname'];
$email = $_POST['email'];
$agama = $_POST['agama'];
$no_hp = $_POST['no_hp'];
 
//simpan data ke database
$query = mysql_query("insert into user values('', '$username', '$password', '$email', '$fullname', '$agama', '$no_hp')") or die(mysql_error());
 
if ($query) {
    header('location:index.php?message=success');
}
?>
