<?php
session_start();
include_once '../config/koneksi.php';
$page=$_GET['page'];
$act=$_GET['halaman'];

if ($page=='masterprogram' AND $act=='simpan'){

        $cek=mysql_num_rows(mysql_query("SELECT * FROM program  WHERE Program_ID='$_POST[Program_ID]'"));
        if ($cek > 0){
          echo "<script>alert('Data ditolak karena duplikasi'); window.location ='media.php?page=masterprogram'</script>";
        }
        else{        
      mysql_query("INSERT INTO program(Identitas_ID,Program_ID,nama_program) 
      VALUES('$_POST[Identitas_ID]','$_POST[Program_ID]','$_POST[nama_program]')"); 
   }
echo "<script>alert('Data Berhasil Disimpan'); window.location ='media.php?page=masterprogram'</script>";
}
elseif ($page=='masterprogram' AND $act=='ubah'){

    mysql_query("UPDATE program SET Identitas_ID  = '$_POST[Identitas_ID]',
                  Program_ID  = '$_POST[Program_ID]',
                  nama_program  = '$_POST[nama_program]'
                  WHERE ID         = '$_POST[key]'");
  echo "<script>alert('Data Berhasil Diperbaharui'); window.location ='media.php?page=masterprogram'</script>";
}
elseif ($page=='masterprogram' AND $act=='hapus'){
    mysql_query("DELETE FROM program  WHERE ID= '$_POST[key]'");
  echo "<script>alert('Data Berhasil Dihapus'); window.location ='media.php?page=masterprogram'</script>";
}
?>
