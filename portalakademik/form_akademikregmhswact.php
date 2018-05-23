<?php
session_start();
include_once '../config/koneksi.php';
$page=$_GET['page'];
$act=$_GET['halaman'];

if ($page=='registrasiulangmhsw' AND $act=='konfirmasi'){
      $tgl_sekarang = date("Ymd");  
      $cek=mysql_num_rows(mysql_query("SELECT * FROM regmhs  WHERE Tahun='$_POST[Tahun_ID]' AND NIM='$_POST[NIM]'"));
      if ($cek > 0){
          echo "<script>alert('Data Sudah Ada Pada Tahun ini'); window.location ='media.php?page=registrasiulangmhsw&halaman=cari&Tahun_ID=$_POST[Tahun_ID]&ID=$_POST[ID]&prodi=$_POST[prodi]&prog=$_POST[prog]&Angkatan=$_POST[Angkatan]'</script>";
        }
      else{
      mysql_query("INSERT INTO regmhs(Tahun,Identitas_ID,Jurusan_ID,NIM,tgl_reg,aktif) 
      VALUES('$_POST[Tahun_ID]','$_POST[ID]','$_POST[prodi]','$_POST[NIM]','$tgl_sekarang','Y')"); 
     }
echo "<script>window.location ='media.php?page=registrasiulangmhsw&halaman=cari&Tahun_ID=$_POST[Tahun_ID]&ID=$_POST[ID]&prodi=$_POST[prodi]&prog=$_POST[prog]&Angkatan=$_POST[Angkatan]'</script>";
}
elseif ($page=='registrasiulangmhsw' AND $act=='hapus'){
  if ($_GET['key']==''){
  echo "<script>alert('Data tidak ada'); window.location ='media.php?page=registrasiulangmhsw&halaman=cari&Tahun_ID=$_GET[Tahun_ID]&ID=$_GET[ID]&prodi=$_GET[prodi]&prog=$_GET[prog]&Angkatan=$_GET[Angkatan]'</script>";  
  }else{
    mysql_query("DELETE FROM regmhs  WHERE ID_Reg= '$_GET[key]'");
  echo "<script>alert('Data Berhasil Dihapus'); window.location ='media.php?page=registrasiulangmhsw&halaman=cari&Tahun_ID=$_GET[Tahun_ID]&ID=$_GET[ID]&prodi=$_GET[prodi]&prog=$_GET[prog]&Angkatan=$_GET[Angkatan]'</script>";
  }
}
?>
