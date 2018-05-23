<?php
session_start();
include_once '../config/koneksi.php';
$page=$_GET['page'];
$act=$_GET['halaman'];

if ($page=='masterruangan' AND $act=='simpan'){

        $cek=mysql_num_rows(mysql_query("SELECT * FROM ruang  WHERE Ruang_ID='$_POST[Ruang_ID]'"));
        if ($cek > 0){
          echo "<script>alert('Data ditolak karena duplikasi'); window.location ='media.php?page=masterruangan'</script>";
        }
        else{        
      mysql_query("INSERT INTO ruang(Ruang_ID,Nama,Kampus_ID,Lantai,Kapasitas) 
      VALUES('$_POST[Ruang_ID]','$_POST[Nama]','$_POST[Kampus_ID]','$_POST[Lantai]','$_POST[Kapasitas]')"); 
   }
echo "<script>alert('Data Berhasil Disimpan'); window.location ='media.php?page=masterruangan'</script>";
}
elseif ($page=='masterruangan' AND $act=='ubah'){

    mysql_query("UPDATE ruang SET Ruang_ID  = '$_POST[Ruang_ID]',
                  Nama  = '$_POST[Nama]',
                  Kampus_ID  = '$_POST[Kampus_ID]',
                  Lantai  = '$_POST[Lantai]',
                  Kapasitas  = '$_POST[Kapasitas]'
                  WHERE ID         = '$_POST[key]'");
  echo "<script>alert('Data Berhasil Diperbaharui'); window.location ='media.php?page=masterruangan'</script>";
}
elseif ($page=='masterruangan' AND $act=='hapus'){
    mysql_query("DELETE FROM ruang  WHERE ID= '$_POST[key]'");
  echo "<script>alert('Data Berhasil Dihapus'); window.location ='media.php?page=masterruangan'</script>";
}
?>
