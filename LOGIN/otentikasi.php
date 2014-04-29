<?php
include('config.php');
 
//data yang diambil dari form login
$username = $_POST['username'];
$password = $_POST['password'];
 
//untuk mencegah sql injection (trik hacking mengedit isi dari variabel get yang ada di url untuk melakukan penetrasi kedalam database)
//kita gunakan mysql_real_escape_string
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);
 
//cek data yang dikirim, apakah kosong atau tidak
if (empty($username) && empty($password)) {
    //jika username dan password kosong
    header('location:login.php?error=1');
    break;
} else if (empty($username)) {
    //jika username saja yang kosong
    header('location:login.php?error=2');
    break;
} else if (empty($password)) {
    //jika password saja yang kosong
    //redirect ke halaman index
    header('location:login.php?error=3');
    break;
}
 
$q = mysql_query("select * from user where username='$username' and password='$password'");
 
if (mysql_num_rows($q) == 1) {
    //jika username dan password sudah terdaftar di database
    header('location:index.php');
} else {
    //jika username ataupun password tidak terdaftar di database
    header('location:login.php?error=4');
}
?>
