<?php
session_start();
include_once '../config/koneksi.php';
$page=$_GET['page'];
$act=$_GET['halaman'];

if ($page=='baakademikjadwal' AND $act=='simpan'){
          $query = $pdo->prepare("INSERT INTO jadwal(Tahun_ID,Identitas_ID,Jurusan_ID,Program_ID,Kode_Mtk,Ruang_ID,Kelas,Dosen_ID,Hari,Jam_Mulai,Jam_Selesai)
          values (:1,:2,:3,:4,:5,:6,:7,:8,:9,:10,:11)");
          $data = array(
          ':1' => $_POST['Tahun_ID'],
          ':2' => $_POST['ID'],
          ':3' => $_POST['prodi'],
          ':4' => $_POST['prog'],
          ':5' => $_POST['Kode_Mtk'],
          ':6' => $_POST['Ruang_ID'],
          ':7' => $_POST['Kelas'],
          ':8' => $_POST['Dosen_ID'],
          ':9' => $_POST['Hari'],
          ':10' => $_POST['Jam_Mulai'],
          ':11' => $_POST['Jam_Selesai']        
          );
          $query->execute($data); 

echo "<script>alert('Data Berhasil Disimpan'); window.location ='media.php?page=baakademikjadwal&halaman=cari&Tahun_ID=$_POST[Tahun_ID]&prog=$_POST[prog]'</script>";
}
elseif ($page=='baakademikjadwal' AND $act=='perbaharui'){
    $query = $pdo->prepare("UPDATE jadwal SET Tahun_ID  =:1,
                  Program_ID  = :2,
                  Kode_Mtk  = :3,
                  Ruang_ID  = :4,
                  Kelas  = :5,
                  Dosen_ID=:6,
                  Hari  = :7,
                  Jam_Mulai  =:8,
                  Jam_Selesai  = :9
                  WHERE Jadwal_ID = :10");
          $data = array(
          ':1' => $_POST['Tahun_ID'],
          ':2' => $_POST['prog'],
          ':3' => $_POST['Kode_Mtk'],
          ':4' => $_POST['Ruang_ID'],
          ':5' => $_POST['Kelas'],
          ':6' => $_POST['Dosen_ID'],
          ':7' => $_POST['Hari'],
          ':8' => $_POST['Jam_Mulai'],
          ':9' => $_POST['Jam_Selesai'],
          ':10' => $_POST['key'] 
          );
          $query->execute($data);

  echo "<script>alert('Data Berhasil Diperbaharui'); window.location ='media.php?page=baakademikjadwal&halaman=cari&Tahun_ID=$_POST[Tahun_ID]&prog=$_POST[prog]'</script>";
}
elseif ($page=='baakademikjadwal' AND $act=='hapus'){
    $query = $pdo->prepare('DELETE FROM jadwal WHERE Jadwal_ID = :id');
    $query->bindParam(':id', $_GET['key'], PDO::PARAM_INT);
    $query->execute();
  echo "<script>alert('Data Berhasil Dihapus'); window.location ='media.php?page=baakademikjadwal&halaman=cari&Tahun_ID=$_GET[Tahun_ID]&prog=$_GET[prog]'</script>";
}
?>
