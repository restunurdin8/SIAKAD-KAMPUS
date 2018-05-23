<?php
session_start();
include_once '../config/koneksi.php';
$page=$_GET['page'];
$act=$_GET['halaman'];

if ($page=='masterkampus' AND $act=='simpan'){

        $cek=mysql_num_rows(mysql_query("SELECT * FROM kampus  WHERE Kampus_ID='$_POST[Kampus_ID]'"));
        if ($cek > 0){
          echo "<script>alert('Data ditolak karena duplikasi'); window.location ='media.php?page=masterkampus'</script>";
        }
        else{        
      mysql_query("INSERT INTO kampus(Identitas_ID,Kampus_ID,Nama,Alamat) 
      VALUES('$_POST[Identitas_ID]','$_POST[Kampus_ID]','$_POST[Nama]','$_POST[Alamat]')"); 
   }
echo "<script>alert('Data Berhasil Disimpan'); window.location ='media.php?page=masterkampus'</script>";
}
elseif ($page=='masterkampus' AND $act=='ubah'){

    mysql_query("UPDATE kampus SET Identitas_ID  = '$_POST[Identitas_ID]',
                  Kampus_ID  = '$_POST[Kampus_ID]',
                  Nama  = '$_POST[Nama]',
                  Alamat  = '$_POST[Alamat]'
                  WHERE ID         = '$_POST[key]'");
  echo "<script>alert('Data Berhasil Diperbaharui'); window.location ='media.php?page=masterkampus'</script>";
}
elseif ($page=='masterkampus' AND $act=='hapus'){
    mysql_query("DELETE FROM kampus  WHERE ID= '$_POST[key]'");
  echo "<script>alert('Data Berhasil Dihapus'); window.location ='media.php?page=masterkampus'</script>";
}
?>
