<?php
session_start();
error_reporting(0);
include_once '../config/koneksi.php';
$page=$_GET['page'];
$act=$_GET['halaman'];

if ($page=='akademikkrs' AND $act=='simpankrs'){
      $jumMK = $_POST['jumMK'];
      for($i=1; $i < $jumMK; ++$i){    
            $Jadwal_ID = $_POST['Jadwal_ID'.$i];
            $Kode_Mtk = $_POST['Kode_Mtk'.$i];
            $SKS = $_POST['SKS'.$i];
        if ((!empty($Jadwal_ID))&&(!empty($Kode_Mtk)))
        {             
              mysql_query("INSERT INTO krs(NIM,
                                    Tahun_ID,
                                    Jadwal_ID,Kode_mtk,SKS) 
        	                    VALUES('$_POST[NIM]',
                                    '$_POST[Tahun_ID]',                                
                                    '$Jadwal_ID','$Kode_Mtk','$SKS')");	  
              echo "<script>alert('Data berhasil disimpan');window.location ='media.php?page=akademikkrs&halaman=lihatkrs&NIM=$_POST[NIM]&Tahun_ID=$_POST[Tahun_ID]&ID=$_POST[ID]&prodi=$_POST[prodi]&prog=$_POST[prog]&Angkatan=$_POST[Angkatan]'</script>";
        }
      }
echo "<script>alert('Data gagal disimpan');window.location ='media.php?page=akademikkrs&halaman=lihatkrs&NIM=$_POST[NIM]&Tahun_ID=$_POST[Tahun_ID]&ID=$_POST[ID]&prodi=$_POST[prodi]&prog=$_POST[prog]&Angkatan=$_POST[Angkatan]'</script>";
}
elseif ($page=='akademikkrs' AND $act=='hapuskrs'){
    mysql_query("DELETE FROM krs WHERE KRS_ID= '$_POST[KRS_ID]'");
    echo "<script>alert('Data berhasil dihapus');window.location ='media.php?page=akademikkrs&halaman=lihatkrs&NIM=$_POST[NIM]&Tahun_ID=$_POST[Tahun_ID]&ID=$_POST[ID]&prodi=$_POST[prodi]&prog=$_POST[prog]&Angkatan=$_POST[Angkatan]'</script>";
}
?>
