<?php
session_start();
error_reporting(0);
include_once '../config/koneksi.php';
$page=$_GET['page'];
$act=$_GET['halaman'];

if ($page=='akademikinputnilaimhs' AND $act=='simpan'){
   $size = count($_POST['grade']);     
    $i = 0;
    while ($i < $size) {
    $grade= $_POST['grade'][$i];
    $KRS_ID = $_POST['KRS_ID'][$i];
    $query=mysql_query("SELECT * FROM nilai WHERE Identitas_ID='$_POST[ID]' AND Jurusan_ID='$_POST[prodi]' AND grade='$grade'");
    $r=mysql_fetch_array($query);   
     
    $query = "UPDATE krs SET GradeNilai= '$grade',BobotNilai = '$r[bobot]' WHERE KRS_ID='$KRS_ID'";
    mysql_query($query) or die ();
    ++$i;
    } 

echo "<script>alert('Data berhasil disimpan');window.location ='media.php?page=akademikinputnilaimhs&halaman=lihat&Tahun_ID=$_POST[Tahun_ID]&ID=$_POST[ID]&prodi=$_POST[prodi]&prog=$_POST[prog]&Jadwal_ID=$_POST[Jadwal_ID]'</script>";
}
?>
