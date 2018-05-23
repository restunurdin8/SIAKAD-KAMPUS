<?php
session_start();
include_once '../config/koneksi.php';
$page=$_GET['page'];
$act=$_GET['halaman'];

if ($page=='masterinstitusi' AND $act=='simpan'){
    $TglMulai=sprintf("%02d%02d%02d",substr($_POST['TglMulai'], 6,4),substr($_POST['TglMulai'], 0,2),substr($_POST['TglMulai'], 3,2));

        $cek=mysql_num_rows(mysql_query("SELECT * FROM identitas  WHERE Identitas_ID='$_POST[Identitas_ID]'"));
        if ($cek > 0){
          echo "<script>alert('Data ditolak karena duplikasi'); window.location ='media.php?page=masterinstitusi'</script>";
        }
        else{        
      mysql_query("INSERT INTO identitas(Identitas_ID,KodeHukum,Nama_Identitas,TglMulai,Alamat1) 
      VALUES('$_POST[Identitas_ID]','$_POST[KodeHukum]','$_POST[Nama_Identitas]','$TglMulai','$_POST[Alamat1]')"); 
   }
echo "<script>alert('Data Berhasil Disimpan'); window.location ='media.php?page=masterinstitusi'</script>";
}
elseif ($page=='masterinstitusi' AND $act=='perbaharui'){
    $TglMulai=sprintf("%02d%02d%02d",substr($_POST['TglMulai'], 6,4),substr($_POST['TglMulai'], 0,2),substr($_POST['TglMulai'], 3,2));


    mysql_query("UPDATE identitas SET Identitas_ID  = '$_POST[Identitas_ID]',
                  KodeHukum  = '$_POST[KodeHukum]',
                  Nama_Identitas  = '$_POST[Nama_Identitas]',
                  TglMulai  = '$TglMulai',
                  Alamat1  = '$_POST[Alamat1]'
                  WHERE ID         = '$_POST[key]'");
  echo "<script>alert('Data Berhasil Diperbaharui'); window.location ='media.php?page=masterinstitusi'</script>";
}
elseif ($page=='masterinstitusi' AND $act=='hapus'){
    mysql_query("DELETE FROM identitas  WHERE ID= '$_POST[key]'");
  echo "<script>alert('Data Berhasil Dihapus'); window.location ='media.php?page=masterinstitusi'</script>";
}
?>
