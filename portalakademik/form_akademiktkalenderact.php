<?php
session_start();
include_once '../config/koneksi.php';
$page=$_GET['page'];
$act=$_GET['halaman'];

if ($page=='kalenderakademik' AND $act=='simpan'){
    $krsm=sprintf("%02d%02d%02d",substr($_POST['TglKRSMulai'], 6,4),substr($_POST['TglKRSMulai'], 0,2),substr($_POST['TglKRSMulai'], 3,2));
    $krss=sprintf("%02d%02d%02d",substr($_POST['TglKRSSelesai'], 6,4),substr($_POST['TglKRSSelesai'], 0,2),substr($_POST['TglKRSSelesai'], 3,2));
    $khsc=sprintf("%02d%02d%02d",substr($_POST['TglCetakKHS'], 6,4),substr($_POST['TglCetakKHS'], 0,2),substr($_POST['TglCetakKHS'], 3,2));
    $utsm=sprintf("%02d%02d%02d",substr($_POST['TglUTSMulai'], 6,4),substr($_POST['TglUTSMulai'], 0,2),substr($_POST['TglUTSMulai'], 3,2));
    $utss=sprintf("%02d%02d%02d",substr($_POST['TglUTSSelesai'], 6,4),substr($_POST['TglUTSSelesai'], 0,2),substr($_POST['TglUTSSelesai'], 3,2));
    $uasm=sprintf("%02d%02d%02d",substr($_POST['TglUASMulai'], 6,4),substr($_POST['TglUASMulai'], 0,2),substr($_POST['TglUASMulai'], 3,2));
    $uass=sprintf("%02d%02d%02d",substr($_POST['TglUASSelesai'], 6,4),substr($_POST['TglUASSelesai'], 0,2),substr($_POST['TglUASSelesai'], 3,2));
    $nilaim=sprintf("%02d%02d%02d",substr($_POST['TglNilaiMulai'], 6,4),substr($_POST['TglNilaiMulai'], 0,2),substr($_POST['TglNilaiMulai'], 3,2));
    $nilais=sprintf("%02d%02d%02d",substr($_POST['TglNilaiSelesai'], 6,4),substr($_POST['TglNilaiSelesai'], 0,2),substr($_POST['TglNilaiSelesai'], 3,2));

        $cek=mysql_num_rows(mysql_query("SELECT * FROM tahun  WHERE Tahun_ID='$_POST[Tahun_ID]' AND Identitas_ID='$_POST[ID]' AND Jurusan_ID='$_POST[prodi]' AND Program_ID='$_POST[prog]'"));
        if ($cek > 0){
          echo "<script>alert('Data ditolak karena duplikasi'); window.location ='media.php?page=kalenderakademik'</script>";
        }
        else{        
      mysql_query("INSERT INTO tahun(Tahun_ID,Identitas_ID,Jurusan_ID,Program_ID,Nama,TglKRSMulai,TglKRSSelesai,TglCetakKHS,TglUTSMulai,TglUTSSelesai,TglUASMulai,TglUASSelesai,TglNilaiMulai,TglNilaiSelesai) 
      VALUES('$_POST[Tahun_ID]','$_POST[ID]','$_POST[prodi]','$_POST[prog]','$_POST[Nama]','$krsm','$krss','$khsc',
      '$utsm','$utss','$uasm','$uass','$nilaim','$nilais')"); 
   }
echo "<script>alert('Data Berhasil Disimpan'); window.location ='media.php?page=kalenderakademik&halaman=cari&ID=$_POST[ID]&prodi=$_POST[prodi]&prog=$_POST[prog]'</script>";
}
elseif ($page=='kalenderakademik' AND $act=='perbaharui'){
    $krsm=sprintf("%02d%02d%02d",substr($_POST['TglKRSMulai'], 6,4),substr($_POST['TglKRSMulai'], 0,2),substr($_POST['TglKRSMulai'], 3,2));
    $krss=sprintf("%02d%02d%02d",substr($_POST['TglKRSSelesai'], 6,4),substr($_POST['TglKRSSelesai'], 0,2),substr($_POST['TglKRSSelesai'], 3,2));
    $khsc=sprintf("%02d%02d%02d",substr($_POST['TglCetakKHS'], 6,4),substr($_POST['TglCetakKHS'], 0,2),substr($_POST['TglCetakKHS'], 3,2));
    $utsm=sprintf("%02d%02d%02d",substr($_POST['TglUTSMulai'], 6,4),substr($_POST['TglUTSMulai'], 0,2),substr($_POST['TglUTSMulai'], 3,2));
    $utss=sprintf("%02d%02d%02d",substr($_POST['TglUTSSelesai'], 6,4),substr($_POST['TglUTSSelesai'], 0,2),substr($_POST['TglUTSSelesai'], 3,2));
    $uasm=sprintf("%02d%02d%02d",substr($_POST['TglUASMulai'], 6,4),substr($_POST['TglUASMulai'], 0,2),substr($_POST['TglUASMulai'], 3,2));
    $uass=sprintf("%02d%02d%02d",substr($_POST['TglUASSelesai'], 6,4),substr($_POST['TglUASSelesai'], 0,2),substr($_POST['TglUASSelesai'], 3,2));
    $nilaim=sprintf("%02d%02d%02d",substr($_POST['TglNilaiMulai'], 6,4),substr($_POST['TglNilaiMulai'], 0,2),substr($_POST['TglNilaiMulai'], 3,2));
    $nilais=sprintf("%02d%02d%02d",substr($_POST['TglNilaiSelesai'], 6,4),substr($_POST['TglNilaiSelesai'], 0,2),substr($_POST['TglNilaiSelesai'], 3,2));

    mysql_query("UPDATE tahun SET Tahun_ID  = '$_POST[Tahun_ID]',
                  Identitas_ID  = '$_POST[ID]',
                  Jurusan_ID  = '$_POST[prodi]',
                  Program_ID  = '$_POST[prog]',
                  Nama  = '$_POST[Nama]',
                  TglKRSMulai  = '$krsm',
                  TglKRSSelesai  = '$krss',
                  TglCetakKHS='$khsc',
                  TglUTSMulai  = '$utsm',
                  TglUTSSelesai  = '$utss',
                  TglUASMulai  = '$uasm',
                  TglUASSelesai  = '$uass',
                  TglNilaiMulai  = '$nilaim',
                  TglNilaiSelesai  = '$nilais'
                  WHERE ID         = '$_POST[key]'");
  echo "<script>alert('Data Berhasil Diperbaharui'); window.location ='media.php?page=kalenderakademik&halaman=cari&ID=$_POST[ID]&prodi=$_POST[prodi]&prog=$_POST[prog]'</script>";
}
elseif ($page=='kalenderakademik' AND $act=='hapus'){
    mysql_query("DELETE FROM tahun  WHERE ID= '$_GET[key]'");
  echo "<script>alert('Data Berhasil Dihapus'); window.location ='media.php?page=kalenderakademik&halaman=cari&ID=$_GET[ID]&prodi=$_GET[prodi]&prog=$_GET[prog]'</script>";
}
?>
