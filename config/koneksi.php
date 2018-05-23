<?php
$server = "localhost";
$username = "u6189264_sfo";
$password = "yanyan1989";
$database = "u6189264_sisfo";

// Koneksi dan memilih database di server
$pdo=new PDO('mysql:host=localhost;dbname=u6189264_sisfo;charset=utf8','u6189264_sfo','yanyan1989');
$con = mysql_connect($server,$username,$password) or die();
mysql_select_db($database) or die();
mysql_set_charset('utf8',$con);



?>
