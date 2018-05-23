<?php
session_start();
include_once '../config/koneksi.php';
$page=$_GET['page'];
$act=$_GET['halaman'];

if ($page=='baakademikkalender' AND $act=='simpan'){
    $krsm=sprintf("%02d%02d%02d",substr($_POST['TglKRSMulai'], 6,4),substr($_POST['TglKRSMulai'], 0,2),substr($_POST['TglKRSMulai'], 3,2));
    $krss=sprintf("%02d%02d%02d",substr($_POST['TglKRSSelesai'], 6,4),substr($_POST['TglKRSSelesai'], 0,2),substr($_POST['TglKRSSelesai'], 3,2));
    $khsc=sprintf("%02d%02d%02d",substr($_POST['TglCetakKHS'], 6,4),substr($_POST['TglCetakKHS'], 0,2),substr($_POST['TglCetakKHS'], 3,2));
    $utsm=sprintf("%02d%02d%02d",substr($_POST['TglUTSMulai'], 6,4),substr($_POST['TglUTSMulai'], 0,2),substr($_POST['TglUTSMulai'], 3,2));
    $utss=sprintf("%02d%02d%02d",substr($_POST['TglUTSSelesai'], 6,4),substr($_POST['TglUTSSelesai'], 0,2),substr($_POST['TglUTSSelesai'], 3,2));
    $uasm=sprintf("%02d%02d%02d",substr($_POST['TglUASMulai'], 6,4),substr($_POST['TglUASMulai'], 0,2),substr($_POST['TglUASMulai'], 3,2));
    $uass=sprintf("%02d%02d%02d",substr($_POST['TglUASSelesai'], 6,4),substr($_POST['TglUASSelesai'], 0,2),substr($_POST['TglUASSelesai'], 3,2));
    $nilaim=sprintf("%02d%02d%02d",substr($_POST['TglNilaiMulai'], 6,4),substr($_POST['TglNilaiMulai'], 0,2),substr($_POST['TglNilaiMulai'], 3,2));
    $nilais=sprintf("%02d%02d%02d",substr($_POST['TglNilaiSelesai'], 6,4),substr($_POST['TglNilaiSelesai'], 0,2),substr($_POST['TglNilaiSelesai'], 3,2));

        $cek = $pdo->prepare("SELECT * FROM tahun  WHERE Tahun_ID='$_POST[Tahun_ID]' AND Identitas_ID='$_POST[ID]' AND Jurusan_ID='$_POST[prodi]' AND Program_ID='$_POST[prog]'");
        $cek->execute();
        if ($cek->fetchColumn() > 0){
          echo "<script>alert('Data ditolak karena duplikasi'); window.location ='media.php?page=baakademikkalender'</script>";
        }else{
          $query = $pdo->prepare("INSERT INTO tahun(Tahun_ID,Identitas_ID,Jurusan_ID,Program_ID,Nama,TglKRSMulai,TglKRSSelesai,TglCetakKHS,TglUTSMulai,TglUTSSelesai,TglUASMulai,TglUASSelesai,TglNilaiMulai,TglNilaiSelesai)
          values (:1,:2,:3,:4,:5,:6,:7,:8,:9,:10,:11,:12,:13,:14)");
          $data = array(
          ':1' => $_POST['Tahun_ID'],
          ':2' => $_POST['ID'],
          ':3' => $_POST['prodi'],
          ':4' => $_POST['prog'],
          ':5' => $_POST['Nama'],
          ':6' => $krsm,
          ':7' => $krss,
          ':8' => $khsc,
          ':9' => $utsm,
          ':10' => $utss,
          ':11' => $uasm,
          ':12' => $uass,
          ':13' => $nilaim,
          ':14' => $nilais          
          );
          $query->execute($data);
        }
echo "<script>alert('Data Berhasil Disimpan'); window.location ='media.php?page=baakademikkalender&halaman=cari&ID=$_POST[ID]&prodi=$_POST[prodi]&prog=$_POST[prog]'</script>";
}
elseif ($page=='baakademikkalender' AND $act=='perbaharui'){
    $krsm=sprintf("%02d%02d%02d",substr($_POST['TglKRSMulai'], 6,4),substr($_POST['TglKRSMulai'], 0,2),substr($_POST['TglKRSMulai'], 3,2));
    $krss=sprintf("%02d%02d%02d",substr($_POST['TglKRSSelesai'], 6,4),substr($_POST['TglKRSSelesai'], 0,2),substr($_POST['TglKRSSelesai'], 3,2));
    $khsc=sprintf("%02d%02d%02d",substr($_POST['TglCetakKHS'], 6,4),substr($_POST['TglCetakKHS'], 0,2),substr($_POST['TglCetakKHS'], 3,2));
    $utsm=sprintf("%02d%02d%02d",substr($_POST['TglUTSMulai'], 6,4),substr($_POST['TglUTSMulai'], 0,2),substr($_POST['TglUTSMulai'], 3,2));
    $utss=sprintf("%02d%02d%02d",substr($_POST['TglUTSSelesai'], 6,4),substr($_POST['TglUTSSelesai'], 0,2),substr($_POST['TglUTSSelesai'], 3,2));
    $uasm=sprintf("%02d%02d%02d",substr($_POST['TglUASMulai'], 6,4),substr($_POST['TglUASMulai'], 0,2),substr($_POST['TglUASMulai'], 3,2));
    $uass=sprintf("%02d%02d%02d",substr($_POST['TglUASSelesai'], 6,4),substr($_POST['TglUASSelesai'], 0,2),substr($_POST['TglUASSelesai'], 3,2));
    $nilaim=sprintf("%02d%02d%02d",substr($_POST['TglNilaiMulai'], 6,4),substr($_POST['TglNilaiMulai'], 0,2),substr($_POST['TglNilaiMulai'], 3,2));
    $nilais=sprintf("%02d%02d%02d",substr($_POST['TglNilaiSelesai'], 6,4),substr($_POST['TglNilaiSelesai'], 0,2),substr($_POST['TglNilaiSelesai'], 3,2));

    $query = $pdo->prepare("UPDATE tahun SET Tahun_ID  =:1,Program_ID  =:4,Nama  =:5,TglKRSMulai  =:6,TglKRSSelesai  =:7,TglCetakKHS =:8,
    TglUTSMulai  =:9,TglUTSSelesai  =:10,TglUASMulai  =:11,TglUASSelesai  =:12,TglNilaiMulai  =:13,TglNilaiSelesai  =:14
    WHERE ID = :15");
          $data = array(
          ':1' => $_POST['Tahun_ID'],
          ':4' => $_POST['prog'],
          ':5' => $_POST['Nama'],
          ':6' => $krsm,
          ':7' => $krss,
          ':8' => $khsc,
          ':9' => $utsm,
          ':10' => $utss,
          ':11' => $uasm,
          ':12' => $uass,
          ':13' => $nilaim,
          ':14' => $nilais,          
          ':15' => $_POST['key'] 
          );
          $query->execute($data);
  echo "<script>alert('Data Berhasil Diperbaharui'); window.location ='media.php?page=baakademikkalender&halaman=cari&ID=$_POST[ID]&prodi=$_POST[prodi]&prog=$_POST[prog]'</script>";
}
elseif ($page=='baakademikkalender' AND $act=='hapus'){
    $query = $pdo->prepare('DELETE FROM tahun WHERE ID = :id');
    $query->bindParam(':id', $_GET['key'], PDO::PARAM_INT);
    $query->execute();
  echo "<script>alert('Data Berhasil Dihapus'); window.location ='media.php?page=baakademikkalender&halaman=cari&prog=$_GET[prog]'</script>";
}
?>
