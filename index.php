<html>
	<head>
		<title>PROJECT-TUBES1</title>
		<meta charset="utf-8" />
		<!--[if IE]><meta http-equiv="ImageToolbar" content="False" /><![endif]-->
		<meta name="description" content="dibuat untuk memenuhi salah satu tugas layanan web" />
		<meta name="keywords" content="tugas besar 1 kelas c" />
		<meta name="author" content="Hilman Septian, Budi Permana, Hendra Hendrawan, Gilang Agtian" />
		<meta name="viewport" content="width=960" />	
	</head>
<style>
body
{
background-image:url('background.jpg');
background-repeat:no-repeat;
margin-right:80px;
}
</style>
<style>
a:link {color:##191970;}    
a:visited {color:#00008B;} 
a:hover {color:#00008B;}   
a:active {color:#4B0082;}  
</style>

    <meta charset="utf-8" />
    <link rel="stylesheet" href="jquery-ui.css" />
    <script src="jquery-1.8.3.js"></script>
    <script src="jquery-ui.js"></script>
    <link rel="stylesheet" href="style.css" />
    <script>
    $(function() {
        $( "#menu" ).menu();
    });
    </script>
    <style>
    .ui-menu { width: 150px; }
</style>
</head>
<body>
<table align='center' width='900' border='0'>
   <tr>
       	<td colspan='2' height='200' align='center' valign='midlle' background="header.png"></td>
   </tr>
   <tr bgcolor='#1E90FF'>
  <td colspan='2' bgcolor="#1E90FF"><p align='center'>
   <font color="white"><b>TUGAS BESAR 1 LAYANAN WEB</b></font>
 </tr>
   <tr height='400'>
     	<td wight='250' valign='top' bgcolor='#E6E6FA'>
       	<h3>Menu</h3>
       <table>
            <tr>
				<td>
				<ul id="menu">
					
					<a href="index.php">Home</a>
					<li>
						<a href="#">Perkuliahan</a>
							<ul>
								<li><a href="?chapter=1">Universitas Siliwangi</a></li>							
							</ul>
					</li>
					<li>
						<a href="#">News</a>
					<ul>
					<li>
						<a href="?chapter=2">Detik.com</a>
					</li>
					<li>
						<a href="?chapter=3">Ilmu Komputer</a>
					</ul>
					</li>
					<li><a href="#">Anggota</a>
						<ul>
							<li><a href="https://github.com/hilmanseptian">Hilman septian</a></li>
							<li><a href="https://github.com/budi103">Budi Permana</a></li>
							<li><a href="https://github.com/gilang121">Gilang Agtian</a></li>
							<li><a href="https://github.com/hendra024">Hendra Hendrawan</a></li>
						</ul>
					</li>
				</ul>
				</td>
			</tr>
        	</tr>
       </table>
    </td>
    <td width='650' valign='top' bgcolor="#ffffff">
           <?php
			 $chapter=isset($_GET['chapter'])?($_GET['chapter']):'';
			 switch ($chapter){
			 case 1 :
			 		include 'unsil.php';
					break;				
			 case 2 :
			  		include 'detikcom.php';
					break;
			 case 3 :
			  		include 'ilmukomp.php';
					break;				
			 }
			 if (!$chapter){
			 include 'home.php';
			 }
			  ?>     
    </td>
  </tr>
 <tr bgcolor='#1E90FF'>
  <td colspan='2' bgcolor="#1E90FF"><p align='center'>
   	<font color="white" size=2>
   	Powered by Universitas Siliwangi (UNSIL)</br></font>
   	<font color="white" size=3><b>Designed by Hilman, Budi, Hendra, Gilang</b></font>
   	<font color="white" size=2><br>Copyright &copy;2014</br></td></font>
 </tr>
 </body> 
</html>
