<?php
session_start();
include_once '../config/koneksi.php';
$page=$_GET['page'];
$act=$_GET['halaman'];

if ($page=='adminakademik' AND $act=='simpan'){
  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $nama_file   = $_FILES['fupload']['name'];   	  
  $ukuran_file = $_FILES['fupload']['size'];

  $password=hash("sha512",$_POST['password']);  
        $cek=mysql_num_rows(mysql_query("SELECT * FROM akademik  WHERE username='$_POST[username]'"));
        if ($cek > 0){
          echo "<script>alert('Data ditolak karena duplikasi'); window.location ='media.php?page=adminakademik'</script>";
        }
        else{
        
            if ($ukuran_file > $_POST['ukuran_maks_file']){
              echo "<script>alert('Upload Gagal !!! Ukuran file $nama_file : $ukuran_file bytes, Ukuran file tidak boleh besar dari(50 Kb)'); window.location = 'media.php?page=adminakademik'</script>";
            }else{
              move_uploaded_file($lokasi_file,"foto_akademik/$nama_file");                
              mysql_query("INSERT INTO akademik(Identitas_ID,Jurusan_ID,username,password,nama_lengkap,keterangan,email,telepon,alamat,foto) 
              VALUES('$_POST[ID]','$_POST[prodi]','$_POST[username]','$password','$_POST[nama_lengkap]','$_POST[keterangan]','$_POST[email]','$_POST[telepon]','$_POST[alamat]','$nama_file')"); 
            }
        }
echo "<script>alert('Data Berhasil Disimpan'); window.location ='media.php?page=adminakademik'</script>";
}
elseif ($page=='adminakademik' AND $act=='perbaharui'){
  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $nama_file   = $_FILES['fupload']['name'];   	  
  $ukuran_file = $_FILES['fupload']['size'];

  // Apabila gambar tidak diganti
  if (empty($lokasi_file)){
    if (empty($_POST['password'])) {
        mysql_query("UPDATE akademik SET 
              Identitas_ID = '$_POST[ID]',
              Jurusan_ID = '$_POST[prodi]',
              username = '$_POST[username]',
              nama_lengkap = '$_POST[nama_lengkap]',
              keterangan = '$_POST[keterangan]',
              email = '$_POST[email]',
              telepon = '$_POST[telepon]',
              alamat = '$_POST[alamat]'
              WHERE ID   = '$_POST[key]'");
    }else{
        $password=hash("sha512",$_POST['password']);
        mysql_query("UPDATE akademik SET 
              Identitas_ID = '$_POST[ID]',
              Jurusan_ID = '$_POST[prodi]',
              username = '$_POST[username]',
              password = '$password',
              nama_lengkap = '$_POST[nama_lengkap]',
              keterangan = '$_POST[keterangan]',
              email = '$_POST[email]',
              telepon = '$_POST[telepon]',
              alamat = '$_POST[alamat]'
              WHERE ID   = '$_POST[key]'");    
    }
  }else{
    if ($ukuran_file > $_POST['ukuran_maks_file']){
      echo "<script>alert('Upload Gagal !!! Ukuran file $nama_file : $ukuran_file bytes, Ukuran file tidak boleh besar dari(50 Kb)'); window.location = 'media.php?page=adminakademik'</script>";
    }else{
      move_uploaded_file($lokasi_file,"foto_akademik/$nama_file");
      if (empty($_POST['password'])) {
          mysql_query("UPDATE akademik SET 
                Identitas_ID = '$_POST[ID]',
                Jurusan_ID = '$_POST[prodi]',
                username = '$_POST[username]',
                nama_lengkap = '$_POST[nama_lengkap]',
                keterangan = '$_POST[keterangan]',
                email = '$_POST[email]',
                telepon = '$_POST[telepon]',
                alamat = '$_POST[alamat]',
                foto='$nama_file'
                WHERE ID   = '$_POST[key]'");
      }else{
          $password=hash("sha512",$_POST['password']);
          mysql_query("UPDATE akademik SET 
                Identitas_ID = '$_POST[ID]',
                Jurusan_ID = '$_POST[prodi]',
                username = '$_POST[username]',
                password = '$password',
                nama_lengkap = '$_POST[nama_lengkap]',
                keterangan = '$_POST[keterangan]',
                email = '$_POST[email]',
                telepon = '$_POST[telepon]',
                alamat = '$_POST[alamat]',
                foto='$nama_file'  
                WHERE ID   = '$_POST[key]'");    
      }
    }
  }
  echo "<script>alert('Data Berhasil Diperbaharui'); window.location ='media.php?page=adminakademik'</script>";
}
elseif ($page=='adminakademik' AND $act=='hapus'){
    mysql_query("DELETE FROM akademik  WHERE ID= '$_GET[key]'");
  echo "<script>alert('Data Berhasil Dihapus'); window.location ='media.php?page=adminakademik'</script>";
}
?>
