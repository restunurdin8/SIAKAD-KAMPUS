<?php
session_start();
include_once '../config/koneksi.php';
$page=$_GET['page'];
$act=$_GET['halaman'];

if ($page=='baakademikmastermatakuliah' AND $act=='simpan'){

      $query = $pdo->prepare("INSERT INTO matakuliah(Identitas_ID,Jurusan_ID,Kurikulum_ID,Kode_mtk,Nama_matakuliah,Nama_english,Semester,SKS,KelompokMtk_ID,JenisMTK_ID,JenisKurikulum_ID,Penanggungjawab)
          values (:1,:2,:3,:4,:5,:6,:7,:8,:9,:10,:11,:12)");
          $data = array(
          ':1' => $_POST['ID'],
          ':2' => $_POST['prodi'],
          ':3' => $_POST['Kurikulum_ID'],
          ':4' => $_POST['Kode_mtk'],
          ':5' => $_POST['Nama_matakuliah'],
          ':6' => $_POST['Nama_english'],
          ':7' => $_POST['Semester'],
          ':8' => $_POST['SKS'],
          ':9' => $_POST['KelompokMtk_ID'],
          ':10' => $_POST['JenisMTK_ID'],
          ':11' => $_POST['JenisKurikulum_ID'],        
          ':12' => $_POST['Penanggungjawab']
          );
      $query->execute($data);         
  
echo "<script>alert('Data Berhasil Disimpan'); window.location ='media.php?page=baakademikmastermatakuliah&halaman=cari&Kurikulum_ID=$_POST[Kurikulum_ID]'</script>";
}
elseif ($page=='baakademikmastermatakuliah' AND $act=='simpankurikulum'){

      $query = $pdo->prepare("INSERT INTO kurikulum(Identitas_ID,Jurusan_ID,Kode,Nama)
          values (:1,:2,:3,:4)");
          $data = array(
          ':1' => $_POST['ID'],
          ':2' => $_POST['prodi'],
          ':3' => $_POST['Kode'],
          ':4' => $_POST['Nama']
          );
      $query->execute($data);         
  
echo "<script>window.location ='media.php?page=baakademikmastermatakuliah&halaman=daftarkurikulum'</script>";
}
elseif ($page=='baakademikmastermatakuliah' AND $act=='perbaharuikurikulum'){

    $query = $pdo->prepare("UPDATE kurikulum SET
                  Kode  =:1,
                  Nama  =:2
                  WHERE Kurikulum_ID  =:3");
          $data = array(
          ':1' => $_POST['Kode'],
          ':2' => $_POST['Nama'],
          ':3' => $_POST['key']
          );
          $query->execute($data);

  echo "<script>window.location ='media.php?page=baakademikmastermatakuliah&halaman=daftarkurikulum'</script>";
}

elseif ($page=='baakademikmastermatakuliah' AND $act=='hapuskurikulum'){
    $query = $pdo->prepare('DELETE FROM kurikulum WHERE Kurikulum_ID = :id');
    $query->bindParam(':id', $_GET['key'], PDO::PARAM_INT);
    $query->execute();

echo "<script>window.location ='media.php?page=baakademikmastermatakuliah&halaman=daftarkurikulum'</script>";
}
elseif ($page=='baakademikmastermatakuliah' AND $act=='perbaharui'){

    $query = $pdo->prepare("UPDATE matakuliah SET
                  Kurikulum_ID  =:1,
                  Kode_mtk  =:2,
                  Nama_matakuliah  =:3,
                  Nama_english  =:4,
                  Semester=:5,
                  SKS  =:6,
                  KelompokMtk_ID  =:7,
                  JenisMTK_ID  =:8,
                  JenisKurikulum_ID  =:9,
                  StatusMtk_ID  =:10,
                  Penanggungjawab  = :11
                  WHERE Matakuliah_ID  =:12");
          $data = array(
          ':1' => $_POST['Kurikulum_ID'],
          ':2' => $_POST['Kode_mtk'],
          ':3' => $_POST['Nama_matakuliah'],
          ':4' => $_POST['Nama_english'],
          ':5' => $_POST['Semester'],
          ':6' => $_POST['SKS'],
          ':7' => $_POST['KelompokMtk_ID'],
          ':8' => $_POST['JenisMTK_ID'],
          ':9' => $_POST['JenisKurikulum_ID'],
          ':10' => $_POST['StatusMtk_ID'], 
          ':11' => $_POST['Penanggungjawab'],
          ':12' => $_POST['key']
          );
          $query->execute($data);

  echo "<script>alert('Data Berhasil Diperbaharui'); window.location ='media.php?page=baakademikmastermatakuliah&halaman=cari&Kurikulum_ID=$_POST[Kurikulum_ID]'</script>";
}
elseif ($page=='baakademikmastermatakuliah' AND $act=='hapus'){
    $query = $pdo->prepare('DELETE FROM matakuliah WHERE Matakuliah_ID = :id');
    $query->bindParam(':id', $_GET['key'], PDO::PARAM_INT);
    $query->execute();

  echo "<script>alert('Data Berhasil Dihapus'); window.location ='media.php?page=baakademikmastermatakuliah&halaman=cari&Kurikulum_ID=$_GET[Kurikulum_ID]'</script>";
}

?>
