<?php
session_start();
error_reporting(0);
include_once '../config/koneksi.php';
$page=$_GET['page'];
$act=$_GET['halaman'];

if ($page=='baakademikmastermahasiswa' AND $act=='simpan'){
      $TanggalLahir=sprintf("%02d%02d%02d",substr($_POST['TanggalLahir'], 6,4),substr($_POST['TanggalLahir'], 0,2),substr($_POST['TanggalLahir'], 3,2));          
      $password=hash("sha512",$_POST['password']);
      
      $query = $pdo->prepare("INSERT INTO mahasiswa (NIM,Identitas_ID,Jurusan_ID,Program_ID,Nama,username,password,Angkatan,Kurikulum_ID,StatusAwal_ID,PenasehatAkademik,Kelamin,TempatLahir,TanggalLahir,Agama,StatusSipil,Alamat)
          values (:1,:2,:3,:4,:5,:6,:7,:8,:9,:10,:11,:12,:13,:14,:15,:16,:17)");
          $data = array(
          ':1' => $_POST['NIM'],
          ':2' => $_POST['ID'],
          ':3' => $_POST['prodi'],
          ':4' => $_POST['prog'],
          ':5' => $_POST['Nama'],
          ':6' => $_POST['username'],
          ':7' => $password,
          ':8' => $_POST['Angkatan'],
          ':9' => $_POST['Kurikulum_ID'],
          ':10' => $_POST['StatusAwal_ID'],
          ':11' => $_POST['PenasehatAkademik'],        
          ':12' => $_POST['Kelamin'],
          ':13' => $_POST['TempatLahir'],
          ':14' => $TanggalLahir,
          ':15' => $_POST['Agama'],
          ':16' => $_POST['StatusSipil'],
          ':17' => $_POST['Alamat']
          );
      $query->execute($data);  
  
  echo "<script>alert('Data berhasil disimpan');window.location ='media.php?page=baakademikmastermahasiswa'</script>";
}
elseif ($page=='baakademikmastermahasiswa' AND $act=='perbaharui'){
    $TanggalLahir=sprintf("%02d%02d%02d",substr($_POST['TanggalLahir'], 6,4),substr($_POST['TanggalLahir'], 0,2),substr($_POST['TanggalLahir'], 3,2));
  
      
  if (empty($_POST[password])) {
    $query = $pdo->prepare("UPDATE mahasiswa SET NIM  = :1,Program_ID  = :2,Nama  = :3,username  = :4,Angkatan  =:5,Kurikulum_ID  = :6,StatusAwal_ID=:7,StatusMhsw_ID=:8,PenasehatAkademik=:9,Kelamin=:10,WargaNegara=:11,Kebangsaan=:12,TempatLahir=:13,TanggalLahir=:14,Agama=:15,StatusSipil=:16,Alamat=:17,Kota=:18,RT=:19,RW=:20,KodePos=:21,Propinsi=:22,Negara=:23,
                            Telepon=:24,Handphone=:25,Email=:26,AlamatAsal=:27,KotaAsal=:28,RTAsal=:29,RWAsal=:30,KodePosAsal=:31,PropinsiAsal=:32,NegaraAsal=:33,
                            NamaAyah=:34,AgamaAyah=:35,PendidikanAyah=:36,PekerjaanAyah=:37,HidupAyah=:38,NamaIbu=:39,AgamaIbu=:40,PendidikanIbu=:41,PekerjaanIbu=:42,
                            HidupIbu=:43,AlamatOrtu=:44,KotaOrtu=:45,KodePosOrtu=:46,PropinsiOrtu=:47,NegaraOrtu=:48,TeleponOrtu=:49,
                            HandphoneOrtu=:50,EmailOrtu=:51,AsalSekolah=:52,JenisSekolah=:53,JurusanSekolah_ID=:54,NilaiSekolah=:55,TahunLulus=:56 WHERE ID = :57");
          $data = array(
          ':1' => $_POST['NIM'],
          ':2' => $_POST['prog'],
          ':3' => $_POST['Nama'],
          ':4' => $_POST['username'],
          ':5' => $_POST['Angkatan'],
          ':6' => $_POST['Kurikulum_ID'],
          ':7' => $_POST['StatusAwal_ID'],
          ':8' => $_POST['StatusMhsw_ID'],
          ':9' => $_POST['PenasehatAkademik'],
          ':10' => $_POST['Kelamin'], 
          ':11' => $_POST['WargaNegara'],
          ':12' => $_POST['Kebangsaan'],
          ':13' => $_POST['TempatLahir'],
          ':14' => $TanggalLahir,
          ':15' => $_POST['Agama'],
          ':16' => $_POST['StatusSipil'],
          ':17' => $_POST['Alamat'],
          ':18' => $_POST['Kota'],
          ':19' => $_POST['RT'],
          ':20' => $_POST['RW'],
          ':21' => $_POST['KodePos'],
          ':22' => $_POST['Propinsi'],
          ':23' => $_POST['Negara'],
          ':24' => $_POST['Telepon'],
          ':25' => $_POST['Handphone'],
          ':26' => $_POST['Email'],
          ':27' => $_POST['AlamatAsal'],
          ':28' => $_POST['KotaAsal'],
          ':29' => $_POST['RTAsal'],
          ':30' => $_POST['RWAsal'],
          ':31' => $_POST['KodePosAsal'],
          ':32' => $_POST['PropinsiAsal'],
          ':33' => $_POST['NegaraAsal'],
          ':34' => $_POST['NamaAyah'],
          ':35' => $_POST['AgamaAyah'],
          ':36' => $_POST['PendidikanAyah'],
          ':37' => $_POST['PekerjaanAyah'],
          ':38' => $_POST['HidupAyah'], 
          ':39' => $_POST['NamaIbu'], 
          ':40' => $_POST['AgamaIbu'], 
          ':41' => $_POST['PendidikanIbu'], 
          ':42' => $_POST['PekerjaanIbu'], 
          ':43' => $_POST['HidupIbu'], 
          ':44' => $_POST['AlamatOrtu'], 
          ':45' => $_POST['KotaOrtu'], 
          ':46' => $_POST['KodePosOrtu'],
          ':47' => $_POST['PropinsiOrtu'],
          ':48' => $_POST['NegaraOrtu'], 
          ':49' => $_POST['TeleponOrtu'],
          ':50' => $_POST['HandphoneOrtu'],
          ':51' => $_POST['EmailOrtu'],
          ':52' => $_POST['AsalSekolah'],
          ':53' => $_POST['JenisSekolah'],
          ':54' => $_POST['NilaiSekolah'],
          ':55' => $_POST['JurusanSekolah_ID'],
          ':56' => $_POST['TahunLulus'],
          ':57' => $_POST['key']
          );
          $query->execute($data);

  }else{
    $password=hash("sha512",$_POST['password']);
    $query = $pdo->prepare("UPDATE mahasiswa SET NIM  = :1,Program_ID  = :2,Nama  = :3,username  = :4,password  = :58,Angkatan  =:5,Kurikulum_ID  = :6,StatusAwal_ID=:7,StatusMhsw_ID=:8,PenasehatAkademik=:9,Kelamin=:10,WargaNegara=:11,Kebangsaan=:12,TempatLahir=:13,TanggalLahir=:14,Agama=:15,StatusSipil=:16,Alamat=:17,Kota=:18,RT=:19,RW=:20,KodePos=:21,Propinsi=:22,Negara=:23,
                            Telepon=:24,Handphone=:25,Email=:26,AlamatAsal=:27,KotaAsal=:28,RTAsal=:29,RWAsal=:30,KodePosAsal=:31,PropinsiAsal=:32,NegaraAsal=:33,
                            NamaAyah=:34,AgamaAyah=:35,PendidikanAyah=:36,PekerjaanAyah=:37,HidupAyah=:38,NamaIbu=:39,AgamaIbu=:40,PendidikanIbu=:41,PekerjaanIbu=:42,
                            HidupIbu=:43,AlamatOrtu=:44,KotaOrtu=:45,KodePosOrtu=:46,PropinsiOrtu=:47,NegaraOrtu=:48,TeleponOrtu=:49,
                            HandphoneOrtu=:50,EmailOrtu=:51,AsalSekolah=:52,JenisSekolah=:53,JurusanSekolah_ID=:54,NilaiSekolah=:55,TahunLulus=:56 WHERE ID =:57");
          $data = array(
          ':1' => $_POST['NIM'],
          ':2' => $_POST['prog'],
          ':3' => $_POST['Nama'],
          ':4' => $_POST['username'],
          ':58' =>$password,
          ':5' => $_POST['Angkatan'],
          ':6' => $_POST['Kurikulum_ID'],
          ':7' => $_POST['StatusAwal_ID'],
          ':8' => $_POST['StatusMhsw_ID'],
          ':9' => $_POST['PenasehatAkademik'],
          ':10' => $_POST['Kelamin'], 
          ':11' => $_POST['WargaNegara'],
          ':12' => $_POST['Kebangsaan'],
          ':13' => $_POST['TempatLahir'],
          ':14' => $TanggalLahir,
          ':15' => $_POST['Agama'],
          ':16' => $_POST['StatusSipil'],
          ':17' => $_POST['Alamat'],
          ':18' => $_POST['Kota'],
          ':19' => $_POST['RT'],
          ':20' => $_POST['RW'],
          ':21' => $_POST['KodePos'],
          ':22' => $_POST['Propinsi'],
          ':23' => $_POST['Negara'],
          ':24' => $_POST['Telepon'],
          ':25' => $_POST['Handphone'],
          ':26' => $_POST['Email'],
          ':27' => $_POST['AlamatAsal'],
          ':28' => $_POST['KotaAsal'],
          ':29' => $_POST['RTAsal'],
          ':30' => $_POST['RWAsal'],
          ':31' => $_POST['KodePosAsal'],
          ':32' => $_POST['PropinsiAsal'],
          ':33' => $_POST['NegaraAsal'],
          ':34' => $_POST['NamaAyah'],
          ':35' => $_POST['AgamaAyah'],
          ':36' => $_POST['PendidikanAyah'],
          ':37' => $_POST['PekerjaanAyah'],
          ':38' => $_POST['HidupAyah'], 
          ':39' => $_POST['NamaIbu'], 
          ':40' => $_POST['AgamaIbu'], 
          ':41' => $_POST['PendidikanIbu'], 
          ':42' => $_POST['PekerjaanIbu'], 
          ':43' => $_POST['HidupIbu'], 
          ':44' => $_POST['AlamatOrtu'], 
          ':45' => $_POST['KotaOrtu'], 
          ':46' => $_POST['KodePosOrtu'],
          ':47' => $_POST['PropinsiOrtu'],
          ':48' => $_POST['NegaraOrtu'], 
          ':49' => $_POST['TeleponOrtu'],
          ':50' => $_POST['HandphoneOrtu'],
          ':51' => $_POST['EmailOrtu'],
          ':52' => $_POST['AsalSekolah'],
          ':53' => $_POST['JenisSekolah'],
          ':54' => $_POST['NilaiSekolah'],
          ':55' => $_POST['JurusanSekolah_ID'],
          ':56' => $_POST['TahunLulus'],
          ':57' => $_POST['key']
          );
          $query->execute($data);
  }
  echo "<script>alert('Data Berhasil Diperbaharui'); window.location ='media.php?page=baakademikmastermahasiswa'</script>";
}
elseif ($page=='baakademikmastermahasiswa' AND $act=='hapus'){
    $query = $pdo->prepare('DELETE FROM mahasiswa WHERE ID = :id');
    $query->bindParam(':id', $_GET['key'], PDO::PARAM_INT);
    $query->execute();

    echo "<script>alert('Data berhasil dihapus');window.location ='media.php?page=baakademikmastermahasiswa'</script>";
}
?>
