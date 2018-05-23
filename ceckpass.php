<?php
session_start();
error_reporting(0);
include "config/koneksi.php";

function anti_injection($data){
  $filter = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  return $filter;
}

$username = anti_injection($_POST['username']);
$password = anti_injection(hash("sha512",$_POST['password']));


// pastikan username dan password adalah berupa huruf atau angka.
if (!ctype_alnum($username) OR !ctype_alnum($password)){
	 header('location:index.php');
}
else{
  $id_level= $_REQUEST['id_level'];
  if ($id_level==1) $tbl = 'admin';
 	elseif ($id_level==2) $tbl = 'dosen';
	elseif ($id_level==3) $tbl = 'akademik';
	elseif ($id_level==4) $tbl = 'mahasiswa';
	else header('location:index.php');
$login=mysql_query("SELECT * FROM $tbl WHERE username='$username' AND password='$password'");
$ketemu=mysql_num_rows($login);
$data=mysql_fetch_array($login);

if ($ketemu > 0){

  $_SESSION['username'] = $data['username'];
  $_SESSION['nama'] = $data['nama_lengkap'];
  $_SESSION['password'] = $data['password'];
  $_SESSION['id_level'] = $data['id_level'];
  $_SESSION['tabel'] = $tbl;  
  echo "<script>alert('Login Anda Sukses'); window.location = 'portalakademik/media.php?page=home'</script>";
}
else{
  echo "<script>alert('Maaf..!! password atau username anda tidak diketahui'); window.location = 'index.php'</script>";
}
}
?>