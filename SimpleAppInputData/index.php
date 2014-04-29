<html>
<head>
<title>Belajar PHP</title>
</head>
 
<body>
<h1>Form Input Data</h1>

<?php
if (!empty($_GET['message']) && $_GET['message'] == 'success') {
    echo '<h3>Berhasil menambah data!</h3>';
}
?>
 
<form name="input_data" action="insert.php" method="post">
<table border="0" cellpadding="5" cellspacing="0">
    <tbody>
        <tr>
            <td>Username</td>
            <td>:</td>
            <td><input type="text" name="username" maxlength="20" required="required" /></td>
        </tr>
        <tr>
            <td>Password</td>
            <td>:</td>
            <td><input type="password" name="password" maxlength="20" required="required" /></td>
        </tr>
        <tr>
            <td>Fullname</td>
            <td>:</td>
            <td><input type="text" name="fullname" maxlength="100" required="required" /></td>
        </tr>
        <tr>
            <td>Email</td>
            <td>:</td>
            <td><input type="email" name="email" required="required" /></td>
        </tr>
        <tr>
            <td>Agama</td>
            <td>:</td>
            <td><input type="text" name="agama" required="required" /></td>
        </tr>
        <tr>
            <td>Nomor HP</td>
            <td>:</td>
            <td><input type="text" name="no_hp" maxlength="14" required="required" /></td>
        </tr>
        <tr>
            <td align="right" colspan="3"><input type="submit" name="submit" value="Simpan" /></td>
        </tr>
    </tbody>
</table>
</form>
</body>
</html>
