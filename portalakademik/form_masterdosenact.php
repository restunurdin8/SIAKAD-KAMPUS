<?php
session_start();
error_reporting(0);
include_once '../config/koneksi.php';
$page=$_GET['page'];
$act=$_GET['halaman'];

if ($page=='masterdosen' AND $act=='simpan'){
      $TanggalLahir=sprintf("%02d%02d%02d",substr($_POST['TanggalLahir'], 6,4),substr($_POST['TanggalLahir'], 0,2),substr($_POST['TanggalLahir'], 3,2));
      $Jurusan_ID = $_POST[Jurusan_ID];
      $tag=implode(',',$Jurusan_ID);           
      
      $password=hash("sha512",$_POST['password']); 
      mysql_query("INSERT INTO dosen(username,
                                    password,
                                    NIDN,nama_lengkap,Identitas_ID,TempatLahir,TanggalLahir,Jurusan_ID) 
        	                    VALUES('$_POST[username]',
                                    '$password',                                
                                    '$_POST[NIDN]','$_POST[nama_lengkap]','$_POST[ID]','$_POST[TempatLahir]','$TanggalLahir','$tag')");	  
  echo "<script>alert('Data berhasil disimpan');window.location ='media.php?page=masterdosen'</script>";
}
elseif ($page=='masterdosen' AND $act=='perbaharui'){
    $TanggalLahir=sprintf("%02d%02d%02d",substr($_POST['TanggalLahir'], 6,4),substr($_POST['TanggalLahir'], 0,2),substr($_POST['TanggalLahir'], 3,2));
    $TglBekerja=sprintf("%02d%02d%02d",substr($_POST['TglBekerja'], 6,4),substr($_POST['TglBekerja'], 0,2),substr($_POST['TglBekerja'], 3,2));
      $Jurusan_ID = $_POST[Jurusan_ID];
      $tag=implode(',',$Jurusan_ID);  
      
  if (empty($_POST[password])) {
    mysql_query("UPDATE dosen SET username  = '$_POST[username]',
                  NIDN  = '$_POST[NIDN]',
                  nama_lengkap  = '$_POST[nama_lengkap]',
                  Identitas_ID  = '$_POST[ID]',
                  Jurusan_ID  = '$tag',
                  InstitusiInduk  = '$_POST[InstitusiInduk]',
                  Homebase  = '$_POST[Homebase]',
                  TempatLahir  = '$_POST[TempatLahir]',
                  TanggalLahir  = '$TanggalLahir',
                  KTP = '$_POST[KTP]',
                  Agama = '$_POST[Agama]',
                  Alamat = '$_POST[Alamat]',
                  Email = '$_POST[Email]',
                  Telepon = '$_POST[Telepon]',
                  Handphone = '$_POST[Handphone]',
                  Kota = '$_POST[Kota]',
                  Propinsi = '$_POST[Propinsi]',
                  Negara = '$_POST[Negara]',
                  Gelar = '$_POST[Gelar]',
                  Jenjang_ID = '$_POST[Jenjang_ID]',
                  Keilmuan = '$_POST[Keilmuan]',
                  Kelamin_ID = '$_POST[Kelamin_ID]',
                  Jabatan_ID = '$_POST[Jabatan_ID]',
                  JabatanDikti_ID = '$_POST[JabatanDikti_ID]',
                  TglBekerja  = '$TglBekerja',
                  StatusDosen_ID = '$_POST[StatusDosen_ID]',                  
                  StatusKerja_ID = '$_POST[StatusKerja_ID]' 
                  WHERE ID         = '$_POST[key]'");
  }else{
    $password=hash("sha512",$_POST['password']);
    mysql_query("UPDATE dosen SET username  = '$_POST[username]',
                  password  = '$password',
                  NIDN  = '$_POST[NIDN]',
                  nama_lengkap  = '$_POST[nama_lengkap]',
                  Identitas_ID  = '$_POST[ID]',
                  Jurusan_ID  = '$tag',
                  InstitusiInduk  = '$_POST[InstitusiInduk]',
                  Homebase  = '$_POST[Homebase]',
                  TempatLahir  = '$_POST[TempatLahir]',
                  TanggalLahir  = '$TanggalLahir',
                  KTP = '$_POST[KTP]',
                  Agama = '$_POST[Agama]',
                  Alamat = '$_POST[Alamat]',
                  Email = '$_POST[Email]',
                  Telepon = '$_POST[Telepon]',
                  Handphone = '$_POST[Handphone]',
                  Kota = '$_POST[Kota]',
                  Propinsi = '$_POST[Propinsi]',
                  Negara = '$_POST[Negara]',
                  Gelar = '$_POST[Gelar]',
                  Jenjang_ID = '$_POST[Jenjang_ID]',
                  Keilmuan = '$_POST[Keilmuan]',
                  Kelamin_ID = '$_POST[Kelamin_ID]',
                  Jabatan_ID = '$_POST[Jabatan_ID]',
                  JabatanDikti_ID = '$_POST[JabatanDikti_ID]',
                  TglBekerja  = '$TglBekerja',
                  StatusDosen_ID = '$_POST[StatusDosen_ID]',                  
                  StatusKerja_ID = '$_POST[StatusKerja_ID]' 
                  WHERE ID         = '$_POST[key]'");
  }
  echo "<script>alert('Data Berhasil Diperbaharui'); window.location ='media.php?page=masterdosen&halaman=edit&key=$_POST[key]'</script>";
}
elseif ($page=='masterdosen' AND $act=='hapus'){
    mysql_query("DELETE FROM dosen WHERE ID= '$_GET[key]'");
    echo "<script>alert('Data berhasil dihapus');window.location ='media.php?page=masterdosen'</script>";
}
?>
