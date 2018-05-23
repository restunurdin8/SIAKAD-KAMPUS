<?php
session_start();
include_once '../config/koneksi.php';
$page=$_GET['page'];
$act=$_GET['halaman'];

if ($page=='adminadministrator' AND $act=='simpan'){
  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $nama_file   = $_FILES['fupload']['name'];   	  
  $ukuran_file = $_FILES['fupload']['size'];

  $password=hash("sha512",$_POST['password']);  
        $cek=mysql_num_rows(mysql_query("SELECT * FROM admin  WHERE username='$_POST[username]'"));
        if ($cek > 0){
          echo "<script>alert('Data ditolak karena duplikasi'); window.location ='media.php?page=adminadministrator'</script>";
        }
        else{
        
            if ($ukuran_file > $_POST['ukuran_maks_file']){
              echo "<script>alert('Upload Gagal !!! Ukuran file $nama_file : $ukuran_file bytes, Ukuran file tidak boleh besar dari(50 Kb)'); window.location = 'media.php?page=adminadministrator'</script>";
            }else{
              move_uploaded_file($lokasi_file,"foto_admin/$nama_file");                
              mysql_query("INSERT INTO admin(username,password,keterangan,nama_lengkap,email,telepon,foto) 
              VALUES('$_POST[username]','$password','$_POST[keterangan]','$_POST[nama_lengkap]','$_POST[email]','$_POST[telepon]','$nama_file')"); 
            }
        }
echo "<script>alert('Data Berhasil Disimpan'); window.location ='media.php?page=adminadministrator'</script>";
}
elseif ($page=='adminadministrator' AND $act=='perbaharui'){
  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $nama_file   = $_FILES['fupload']['name'];   	  
  $ukuran_file = $_FILES['fupload']['size'];

  if (empty($lokasi_file)){
    if (empty($_POST['password'])) {
        mysql_query("UPDATE admin SET 
              username = '$_POST[username]',
              keterangan = '$_POST[keterangan]',
              nama_lengkap = '$_POST[nama_lengkap]',
              email = '$_POST[email]',
              telepon = '$_POST[telepon]'
              WHERE ID   = '$_POST[key]'");
    }else{
        $password=hash("sha512",$_POST['password']);
        mysql_query("UPDATE admin SET 
              username = '$_POST[username]',
              password = '$password',
              keterangan = '$_POST[keterangan]',
              nama_lengkap = '$_POST[nama_lengkap]',
              email = '$_POST[email]',
              telepon = '$_POST[telepon]'
              WHERE ID   = '$_POST[key]'");    
    }
  }else{
    if ($ukuran_file > $_POST['ukuran_maks_file']){
      echo "<script>alert('Upload Gagal !!! Ukuran file $nama_file : $ukuran_file bytes, Ukuran file tidak boleh besar dari(50 Kb)'); window.location = 'media.php?page=adminadministrator'</script>";
    }else{
      move_uploaded_file($lokasi_file,"foto_admin/$nama_file");
      if (empty($_POST['password'])) {
          mysql_query("UPDATE admin SET 
                username = '$_POST[username]',
                keterangan = '$_POST[keterangan]',
                nama_lengkap = '$_POST[nama_lengkap]',
                email = '$_POST[email]',
                telepon = '$_POST[telepon]',
                foto='$nama_file'
                WHERE ID   = '$_POST[key]'");
      }else{
          $password=hash("sha512",$_POST['password']);
          mysql_query("UPDATE admin SET 
                username = '$_POST[username]',
                password = '$password',
                keterangan = '$_POST[keterangan]',
                nama_lengkap = '$_POST[nama_lengkap]',
                email = '$_POST[email]',
                telepon = '$_POST[telepon]',
                foto='$nama_file'  
                WHERE ID   = '$_POST[key]'");    
      }
    }
  }
  echo "<script>alert('Data Berhasil Diperbaharui'); window.location ='media.php?page=adminadministrator'</script>";
}
elseif ($page=='adminadministrator' AND $act=='hapus'){
    mysql_query("DELETE FROM admin  WHERE ID= '$_GET[key]'");
  echo "<script>alert('Data Berhasil Dihapus'); window.location ='media.php?page=adminadministrator'</script>";
}
?>
