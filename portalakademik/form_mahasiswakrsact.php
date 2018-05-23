<?php
session_start();
error_reporting(0);
include_once '../config/koneksi.php';
$page=$_GET['page'];
$act=$_GET['halaman'];

if ($page=='mahasiswakrs' AND $act=='simpankrs'){
      $jumMK = $_POST['jumMK'];
      for($i=1; $i < $jumMK; ++$i){    
            $Jadwal_ID = $_POST['Jadwal_ID'.$i];
            $Kode_Mtk = $_POST['Kode_Mtk'.$i];
            $SKS = $_POST['SKS'.$i];
        if ((!empty($Jadwal_ID))&&(!empty($Kode_Mtk)))
        {             
          $query = $pdo->prepare("INSERT INTO krs(NIM,Tahun_ID,Jadwal_ID,Kode_mtk,SKS)values (:1,:2,:3,:4,:5)");
          $data = array(
          ':1' => $_POST['NIM'],
          ':2' => $_POST['Tahun_ID'],
          ':3' => $Jadwal_ID,
          ':4' => $Kode_Mtk,
          ':5' => $SKS         
          );
          $query->execute($data);
  
              echo "<script>alert('Data berhasil disimpan');window.location ='media.php?page=mahasiswakrs&halaman=lihatkrs&NIM=$_POST[NIM]&Tahun_ID=$_POST[Tahun_ID]&prog=$_POST[prog]&Angkatan=$_POST[Angkatan]'</script>";
        }
      }
echo "<script>alert('Data gagal disimpan');window.location ='media.php?page=mahasiswakrs&halaman=lihatkrs&NIM=$_POST[NIM]&Tahun_ID=$_POST[Tahun_ID]&prog=$_POST[prog]&Angkatan=$_POST[Angkatan]'</script>";
}
elseif ($page=='mahasiswakrs' AND $act=='hapuskrs'){
    $query = $pdo->prepare('DELETE FROM krs WHERE KRS_ID = :id');
    $query->bindParam(':id', $_POST['KRS_ID'], PDO::PARAM_INT);
    $query->execute();

    echo "<script>alert('Data berhasil dihapus');window.location ='media.php?page=mahasiswakrs&halaman=lihatkrs&NIM=$_POST[NIM]&Tahun_ID=$_POST[Tahun_ID]&prog=$_POST[prog]&Angkatan=$_POST[Angkatan]'</script>";
}
?>
