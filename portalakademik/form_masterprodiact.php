<?php
session_start();
include_once '../config/koneksi.php';
$page=$_GET['page'];
$act=$_GET['halaman'];

if ($page=='masterprodi' AND $act=='simpan'){
    $TglMulai=sprintf("%02d%02d%02d",substr($_POST['TglMulai'], 6,4),substr($_POST['TglMulai'], 0,2),substr($_POST['TglMulai'], 3,2));

        $cek=mysql_num_rows(mysql_query("SELECT * FROM jurusan  WHERE Jurusan_ID='$_POST[Jurusan_ID]'"));
        if ($cek > 0){
          echo "<script>alert('Data ditolak karena duplikasi'); window.location ='media.php?page=masterprodi'</script>";
        }
        else{        
      mysql_query("INSERT INTO jurusan(Identitas_ID,Jurusan_ID,nama_jurusan,jenjang,Akreditasi) 
      VALUES('$_POST[Identitas_ID]','$_POST[Jurusan_ID]','$_POST[nama_jurusan]','$_POST[jenjang]','$_POST[Akreditasi]')"); 
   }
echo "<script>alert('Data Berhasil Disimpan'); window.location ='media.php?page=masterprodi'</script>";
}
elseif ($page=='masterprodi' AND $act=='ubah'){

    mysql_query("UPDATE jurusan SET Identitas_ID  = '$_POST[Identitas_ID]',
                  Jurusan_ID  = '$_POST[Jurusan_ID]',
                  nama_jurusan  = '$_POST[nama_jurusan]',
                  jenjang  = '$_POST[jenjang]',
                  Akreditasi  = '$_POST[Akreditasi]'
                  WHERE ID         = '$_POST[key]'");
  echo "<script>alert('Data Berhasil Diperbaharui'); window.location ='media.php?page=masterprodi'</script>";
}
elseif ($page=='masterprodi' AND $act=='hapus'){
    mysql_query("DELETE FROM jurusan  WHERE ID= '$_POST[key]'");
  echo "<script>alert('Data Berhasil Dihapus'); window.location ='media.php?page=masterprodi'</script>";
}
?>
