<?php
session_start();
error_reporting(0);
include_once '../config/koneksi.php';
$page=$_GET['page'];
$act=$_GET['halaman'];

if ($page=='mastermahasiswa' AND $act=='simpan'){
      $TanggalLahir=sprintf("%02d%02d%02d",substr($_POST['TanggalLahir'], 6,4),substr($_POST['TanggalLahir'], 0,2),substr($_POST['TanggalLahir'], 3,2));          
      
      $password=hash("sha512",$_POST['password']); 
      mysql_query("INSERT INTO mahasiswa (NIM,
        Identitas_ID,
        Jurusan_ID,
        Program_ID,
        Nama,
        username,
        password,
        Angkatan,
        Kurikulum_ID,
        StatusAwal_ID,
        PenasehatAkademik,
        Kelamin,
        TempatLahir,
        TanggalLahir,
        Agama,
        StatusSipil,
        Alamat)VALUES
        ('$_POST[NIM]','$_POST[ID]','$_POST[prodi]','$_POST[prog]','$_POST[Nama]','$_POST[username]','$password','$_POST[Angkatan]',
        '$_POST[Kurikulum_ID]','$_POST[StatusAwal_ID]','$_POST[PenasehatAkademik]','$_POST[Kelamin]','$_POST[TempatLahir]','$TanggalLahir','$_POST[Agama]',
        '$_POST[StatusSipil]','$_POST[Alamat]')");	  
  echo "<script>alert('Data berhasil disimpan');window.location ='media.php?page=mastermahasiswa'</script>";
}
elseif ($page=='mastermahasiswa' AND $act=='perbaharui'){
    $TanggalLahir=sprintf("%02d%02d%02d",substr($_POST['TanggalLahir'], 6,4),substr($_POST['TanggalLahir'], 0,2),substr($_POST['TanggalLahir'], 3,2));
  
      
  if (empty($_POST['password'])) {
    mysql_query("UPDATE mahasiswa SET NIM  = '$_POST[NIM]',
                  Identitas_ID  = '$_POST[ID]',
                  Jurusan_ID  = '$_POST[prodi]',
                  Program_ID  = '$_POST[prog]',
                  Nama  = '$_POST[Nama]',
                  username  = '$_POST[username]',
                  Angkatan  = '$_POST[Angkatan]',
                  Kurikulum_ID  = '$_POST[Kurikulum_ID]',
                  StatusAwal_ID='$_POST[StatusAwal_ID]',
                  StatusMhsw_ID='$_POST[StatusMhsw_ID]',
                  PenasehatAkademik='$_POST[PenasehatAkademik]',
                  Kelamin='$_POST[Kelamin]',                
                  WargaNegara='$_POST[WargaNegara]',
                  Kebangsaan='$_POST[Kebangsaan]',
                  TempatLahir='$_POST[TempatLahir]',
                  TanggalLahir='$TanggalLahir',
                  Agama='$_POST[Agama]',
                  StatusSipil='$_POST[StatusSipil]',
                  Alamat='$_POST[Alamat]',
                  Kota='$_POST[Kota]',
                  RT='$_POST[RT]',
                  RW='$_POST[RW]',
                  KodePos='$_POST[KodePos]',
                  Propinsi='$_POST[Propinsi]',
                  Negara='$_POST[Negara]',
                  Telepon='$_POST[Telepon]',
                  Handphone='$_POST[Handphone]',                  
                  Email='$_POST[Email]',                  
                  AlamatAsal='$_POST[AlamatAsal]',
                  KotaAsal='$_POST[KotaAsal]',
                  RTAsal='$_POST[RTAsal]',
                  RWAsal='$_POST[RWAsal]',
                  KodePosAsal='$_POST[KodePosAsal]',
                  PropinsiAsal='$_POST[PropinsiAsal]',
                  NegaraAsal='$_POST[NegaraAsal]',
                  NamaAyah='$_POST[NamaAyah]',
                  AgamaAyah='$_POST[AgamaAyah]',
                  PendidikanAyah='$_POST[PendidikanAyah]',
                  PekerjaanAyah='$_POST[PekerjaanAyah]',
                  HidupAyah='$_POST[HidupAyah]',
                  NamaIbu='$_POST[NamaIbu]',
                  AgamaIbu='$_POST[AgamaIbu]',
                  PendidikanIbu='$_POST[PendidikanIbu]',                  
                  PekerjaanIbu='$_POST[PekerjaanIbu]',
                  HidupIbu='$_POST[HidupIbu]',                                                      
                  AlamatOrtu='$_POST[AlamatOrtu]',
                  KotaOrtu='$_POST[KotaOrtu]',
                  KodePosOrtu='$_POST[KodePosOrtu]',
                  PropinsiOrtu='$_POST[PropinsiOrtu]',
                  NegaraOrtu='$_POST[NegaraOrtu]',
                  TeleponOrtu='$_POST[TeleponOrtu]',
                  HandphoneOrtu='$_POST[HandphoneOrtu]',
                  EmailOrtu='$_POST[EmailOrtu]',
                  AsalSekolah='$_POST[AsalSekolah]',
                  JenisSekolah='$_POST[JenisSekolah]',
                  JurusanSekolah_ID='$_POST[JurusanSekolah_ID]',
                  NilaiSekolah='$_POST[NilaiSekolah]',
                  TahunLulus='$_POST[TahunLulus]' 
                  WHERE ID         = '$_POST[key]'");
  }else{
    $password=hash("sha512",$_POST['password']);
    mysql_query("UPDATE mahasiswa SET NIM  = '$_POST[NIM]',
                  Identitas_ID  = '$_POST[ID]',
                  Jurusan_ID  = '$_POST[prodi]',
                  Program_ID  = '$_POST[prog]',
                  Nama  = '$_POST[Nama]',
                  username  = '$_POST[username]',
                  password='$password',
                  Angkatan  = '$_POST[Angkatan]',
                  Kurikulum_ID  = '$_POST[Kurikulum_ID]',
                  StatusAwal_ID='$_POST[StatusAwal_ID]',
                  StatusMhsw_ID='$_POST[StatusMhsw_ID]',
                  PenasehatAkademik='$_POST[PenasehatAkademik]',
                  Kelamin='$_POST[Kelamin]',                
                  WargaNegara='$_POST[WargaNegara]',
                  Kebangsaan='$_POST[Kebangsaan]',
                  TempatLahir='$_POST[TempatLahir]',
                  TanggalLahir='$TanggalLahir',
                  Agama='$_POST[Agama]',
                  StatusSipil='$_POST[StatusSipil]',
                  Alamat='$_POST[Alamat]',
                  Kota='$_POST[Kota]',
                  RT='$_POST[RT]',
                  RW='$_POST[RW]',
                  KodePos='$_POST[KodePos]',
                  Propinsi='$_POST[Propinsi]',
                  Negara='$_POST[Negara]',
                  Telepon='$_POST[Telepon]',
                  Handphone='$_POST[Handphone]',                  
                  Email='$_POST[Email]',                  
                  AlamatAsal='$_POST[AlamatAsal]',
                  KotaAsal='$_POST[KotaAsal]',
                  RTAsal='$_POST[RTAsal]',
                  RWAsal='$_POST[RWAsal]',
                  KodePosAsal='$_POST[KodePosAsal]',
                  PropinsiAsal='$_POST[PropinsiAsal]',
                  NegaraAsal='$_POST[NegaraAsal]',
                  NamaAyah='$_POST[NamaAyah]',
                  AgamaAyah='$_POST[AgamaAyah]',
                  PendidikanAyah='$_POST[PendidikanAyah]',
                  PekerjaanAyah='$_POST[PekerjaanAyah]',
                  HidupAyah='$_POST[HidupAyah]',
                  NamaIbu='$_POST[NamaIbu]',
                  AgamaIbu='$_POST[AgamaIbu]',
                  PendidikanIbu='$_POST[PendidikanIbu]',                  
                  PekerjaanIbu='$_POST[PekerjaanIbu]',
                  HidupIbu='$_POST[HidupIbu]',                                                      
                  AlamatOrtu='$_POST[AlamatOrtu]',
                  KotaOrtu='$_POST[KotaOrtu]',
                  KodePosOrtu='$_POST[KodePosOrtu]',
                  PropinsiOrtu='$_POST[PropinsiOrtu]',
                  NegaraOrtu='$_POST[NegaraOrtu]',
                  TeleponOrtu='$_POST[TeleponOrtu]',
                  HandphoneOrtu='$_POST[HandphoneOrtu]',
                  EmailOrtu='$_POST[EmailOrtu]',
                  AsalSekolah='$_POST[AsalSekolah]',
                  JenisSekolah='$_POST[JenisSekolah]',
                  JurusanSekolah_ID='$_POST[JurusanSekolah_ID]',
                  NilaiSekolah='$_POST[NilaiSekolah]',
                  TahunLulus='$_POST[TahunLulus]' 
                  WHERE ID         = '$_POST[key]'");
  }
  echo "<script>alert('Data Berhasil Diperbaharui'); window.location ='media.php?page=mastermahasiswa'</script>";
}
elseif ($page=='mastermahasiswa' AND $act=='hapus'){
    mysql_query("DELETE FROM mahasiswa WHERE ID= '$_GET[key]'");
    echo "<script>alert('Data berhasil dihapus');window.location ='media.php?page=mastermahasiswa'</script>";
}
?>
