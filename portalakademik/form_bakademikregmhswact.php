<?php
session_start();
include_once '../config/koneksi.php';
$page=$_GET['page'];
$act=$_GET['halaman'];

if ($page=='baakademikregulang' AND $act=='konfirmasi'){
      $tgl_sekarang = date("Ymd");  
      $cek = $pdo->prepare("SELECT * FROM regmhs  WHERE Tahun='$_POST[Tahun_ID]' AND NIM='$_POST[NIM]'");
      $cek->execute();
      if ($cek->fetchColumn() > 0){
          echo "<script>alert('Data Sudah Ada Pada Tahun ini'); window.location ='media.php?page=baakademikregulang&halaman=cari&Tahun_ID=$_POST[Tahun_ID]&prog=$_POST[prog]&Angkatan=$_POST[Angkatan]'</script>";
        }
      else{
          $query = $pdo->prepare("INSERT INTO regmhs(Tahun,Identitas_ID,Jurusan_ID,NIM,tgl_reg,aktif)
          values (:1,:2,:3,:4,:5,:6)");
          $data = array(
          ':1' => $_POST['Tahun_ID'],
          ':2' => $_POST['ID'],
          ':3' => $_POST['prodi'],
          ':4' => $_POST['NIM'],
          ':5' => $tgl_sekarang,
          ':6' => 'Y'          
          );
          $query->execute($data);
     }
echo "<script>window.location ='media.php?page=baakademikregulang&halaman=cari&Tahun_ID=$_POST[Tahun_ID]&prog=$_POST[prog]&Angkatan=$_POST[Angkatan]'</script>";
}
elseif ($page=='baakademikregulang' AND $act=='hapus'){
  if ($_GET['key']==''){
  echo "<script>alert('Data tidak ada'); window.location ='media.php?page=baakademikregulang&halaman=cari&Tahun_ID=$_GET[Tahun_ID]&prog=$_GET[prog]&Angkatan=$_GET[Angkatan]'</script>";  
  }else{
    $query = $pdo->prepare('DELETE FROM regmhs WHERE ID_Reg = :id');
    $query->bindParam(':id', $_GET['key'], PDO::PARAM_INT);
    $query->execute();
  echo "<script>alert('Data Berhasil Dihapus'); window.location ='media.php?page=baakademikregulang&halaman=cari&Tahun_ID=$_GET[Tahun_ID]&prog=$_GET[prog]&Angkatan=$_GET[Angkatan]'</script>";
  }
}
?>
