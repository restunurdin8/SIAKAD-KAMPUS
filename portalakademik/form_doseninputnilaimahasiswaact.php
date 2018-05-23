<?php
session_start();
error_reporting(0);
include_once '../config/koneksi.php';
$page=$_GET['page'];
$act=$_GET['halaman'];

if ($page=='doseninputnilaimhsw' AND $act=='simpan'){
   $size = count($_POST['grade']);     
    $i = 0;
    while ($i < $size) {
    $grade= $_POST['grade'][$i];
    $KRS_ID = $_POST['KRS_ID'][$i];
    
    $query = $pdo->prepare("SELECT * FROM nilai WHERE Identitas_ID = :ID AND Jurusan_ID=:prodi AND grade='$grade'");
    $query->bindParam(':ID', $_POST['ID']);
    $query->bindParam(':prodi', $_POST['prodi']); 
    $query->execute();
    $r=$query->fetch(PDO::FETCH_OBJ);  
     

    $query = $pdo->prepare("UPDATE krs SET GradeNilai  =:1,BobotNilai  =:2 WHERE KRS_ID = :3");
          $data = array(
          ':1' => $grade,
          ':2' => $r->bobot,
          ':3' => $KRS_ID 
          );
          $query->execute($data);

    ++$i;
    } 

echo "<script>alert('Data berhasil disimpan');window.location ='media.php?page=doseninputnilaimhsw&halaman=inputnilai&Tahun_ID=$_POST[Tahun_ID]&prog=$_POST[prog]&Jadwal_ID=$_POST[Jadwal_ID]'</script>";
}
?>
