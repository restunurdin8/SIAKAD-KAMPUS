<?php
session_start();
include_once '../config/koneksi.php';
$page=$_GET['page'];
$act=$_GET['halaman'];

if ($page=='mastermatakuliah' AND $act=='simpan'){
        
      mysql_query("INSERT INTO matakuliah(Identitas_ID,Jurusan_ID,Kurikulum_ID,Kode_mtk,Nama_matakuliah,Nama_english,Semester,SKS,KelompokMtk_ID,JenisMTK_ID,JenisKurikulum_ID,Penanggungjawab) 
      VALUES('$_POST[ID]','$_POST[prodi]','$_POST[Kurikulum_ID]','$_POST[Kode_mtk]','$_POST[Nama_matakuliah]','$_POST[Nama_english]','$_POST[Semester]',
      '$_POST[SKS]','$_POST[KelompokMtk_ID]','$_POST[JenisMTK_ID]','$_POST[JenisKurikulum_ID]','$_POST[Penanggungjawab]')"); 
  
echo "<script>alert('Data Berhasil Disimpan'); window.location ='media.php?page=mastermatakuliah&halaman=cari&ID=$_POST[ID]&prodi=$_POST[prodi]&Kurikulum_ID=$_POST[Kurikulum_ID]'</script>";
}
elseif ($page=='mastermatakuliah' AND $act=='perbaharui'){

    mysql_query("UPDATE matakuliah SET Identitas_ID  = '$_POST[ID]',
                  Jurusan_ID  = '$_POST[prodi]',
                  Kurikulum_ID  = '$_POST[Kurikulum_ID]',
                  Kode_mtk  = '$_POST[Kode_mtk]',
                  Nama_matakuliah  = '$_POST[Nama_matakuliah]',
                  Nama_english  = '$_POST[Nama_english]',
                  Semester='$_POST[Semester]',
                  SKS  = '$_POST[SKS]',
                  KelompokMtk_ID  = '$_POST[KelompokMtk_ID]',
                  JenisMTK_ID  = '$_POST[JenisMTK_ID]',
                  JenisKurikulum_ID  = '$_POST[JenisKurikulum_ID]',
                  StatusMtk_ID  = '$_POST[StatusMtk_ID]',
                  Penanggungjawab  = '$_POST[Penanggungjawab]'
                  WHERE Matakuliah_ID         = '$_POST[key]'");
  echo "<script>alert('Data Berhasil Diperbaharui'); window.location ='media.php?page=mastermatakuliah&halaman=cari&ID=$_POST[ID]&prodi=$_POST[prodi]&Kurikulum_ID=$_POST[Kurikulum_ID]'</script>";
}
elseif ($page=='mastermatakuliah' AND $act=='hapus'){
    mysql_query("DELETE FROM matakuliah  WHERE Matakuliah_ID= '$_GET[key]'");
  echo "<script>alert('Data Berhasil Dihapus'); window.location ='media.php?page=mastermatakuliah&halaman=cari&ID=$_GET[ID]&prodi=$_GET[prodi]&Kurikulum_ID=$_GET[Kurikulum_ID]'</script>";
}
elseif ($page=='mastermatakuliah' AND $act=='simpankurikulum'){
        
      mysql_query("INSERT INTO kurikulum(Identitas_ID,Jurusan_ID,Kode,Nama) 
      VALUES('$_POST[ID]','$_POST[prodi]','$_POST[Kode]','$_POST[Nama]')"); 
  
echo "<script>alert('Data Berhasil Disimpan'); window.location ='media.php?page=mastermatakuliah&halaman=kurikulum&ID=$_POST[ID]&prodi=$_POST[prodi]&Kurikulum_ID=$_POST[Kurikulum_ID]'</script>";
}
elseif ($page=='mastermatakuliah' AND $act=='perbaharuikurikulum'){

    mysql_query("UPDATE kurikulum SET Identitas_ID  = '$_POST[ID]',
                  Jurusan_ID  = '$_POST[prodi]',
                  Kode  = '$_POST[Kode]',
                  Nama  = '$_POST[Nama]',
                  Aktif  = '$_POST[Aktif]'
                  WHERE Kurikulum_ID  = '$_POST[key]'");
  echo "<script>alert('Data Berhasil Diperbaharui'); window.location ='media.php?page=mastermatakuliah&halaman=kurikulum&ID=$_POST[ID]&prodi=$_POST[prodi]&Kurikulum_ID=$_POST[Kurikulum_ID]'</script>";
}
elseif ($page=='mastermatakuliah' AND $act=='hapuskurikulum'){
    mysql_query("UPDATE kurikulum SET Aktif  = 'N' WHERE Kurikulum_ID  = '$_GET[key]'");
  echo "<script>alert('Data Berhasil Dihapus'); window.location ='media.php?page=mastermatakuliah&halaman=kurikulum&ID=$_GET[ID]&prodi=$_GET[prodi]&Kurikulum_ID=$_GET[key]'</script>";
}

?>
