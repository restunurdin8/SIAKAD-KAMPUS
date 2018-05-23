<?php
session_start();
include_once '../config/koneksi.php';
$page=$_GET['page'];
$act=$_GET['halaman'];

if ($page=='jadwalkuliah' AND $act=='simpan'){
        
      mysql_query("INSERT INTO jadwal(Tahun_ID,Identitas_ID,Jurusan_ID,Program_ID,Kode_Mtk,Ruang_ID,Kelas,Dosen_ID,Hari,Jam_Mulai,Jam_Selesai) 
      VALUES('$_POST[Tahun_ID]','$_POST[ID]','$_POST[prodi]','$_POST[prog]','$_POST[Kode_Mtk]','$_POST[Ruang_ID]','$_POST[Kelas]','$_POST[Dosen_ID]',
      '$_POST[Hari]','$_POST[Jam_Mulai]','$_POST[Jam_Selesai]')"); 
  
echo "<script>alert('Data Berhasil Disimpan'); window.location ='media.php?page=jadwalkuliah&halaman=cari&Tahun_ID=$_POST[Tahun_ID]&ID=$_POST[ID]&prodi=$_POST[prodi]&prog=$_POST[prog]'</script>";
}
elseif ($page=='jadwalkuliah' AND $act=='perbaharui'){

    mysql_query("UPDATE jadwal SET Tahun_ID  = '$_POST[Tahun_ID]',
                  Identitas_ID  = '$_POST[ID]',
                  Jurusan_ID  = '$_POST[prodi]',
                  Program_ID  = '$_POST[prog]',
                  Kode_Mtk  = '$_POST[Kode_Mtk]',
                  Ruang_ID  = '$_POST[Ruang_ID]',
                  Kelas  = '$_POST[Kelas]',
                  Dosen_ID='$_POST[Dosen_ID]',
                  Hari  = '$_POST[Hari]',
                  Jam_Mulai  = '$_POST[Jam_Mulai]',
                  Jam_Selesai  = '$_POST[Jam_Selesai]'
                  WHERE Jadwal_ID         = '$_POST[key]'");
  echo "<script>alert('Data Berhasil Diperbaharui'); window.location ='media.php?page=jadwalkuliah&halaman=cari&Tahun_ID=$_POST[Tahun_ID]&ID=$_POST[ID]&prodi=$_POST[prodi]&prog=$_POST[prog]'</script>";
}
elseif ($page=='jadwalkuliah' AND $act=='hapus'){
    mysql_query("DELETE FROM jadwal  WHERE Jadwal_ID= '$_GET[key]'");
  echo "<script>alert('Data Berhasil Dihapus'); window.location ='media.php?page=jadwalkuliah&halaman=cari&Tahun_ID=$_GET[Tahun_ID]&ID=$_GET[ID]&prodi=$_GET[prodi]&prog=$_GET[prog]'</script>";
}
?>
