<?php
session_start();
error_reporting(0);
include_once '../config/koneksi.php';
$page=$_GET['page'];
$act=$_GET['halaman'];

if ($page=='1f56234e-4361-4706-bb5a-91d3101bbdb6' AND $act=='simpan'){
     
      $lokasi_file = $_FILES['fupload']['tmp_name'];

    $title = $_REQUEST['Judul'] ? htmlspecialchars($_REQUEST['Judul']) : 'Belum ada judul File Ini';
        $filename = basename($_FILES['fupload']['name']);
      	$uploadfile = $dir_gambar .$filename;
        move_uploaded_file($lokasi_file,"bahan/$filename");
          $tg=mysql_query("SELECT DATE_FORMAT (now(), '%Y-%m-%d %H:%i:%s') as tgl from error group by tgl");
          $vtg=mysql_fetch_array($tg);
 
              $query = mysql_query("INSERT INTO fileupload(Nama_File,File,Level_ID,Uplouder,TglInput)
              VALUES('$_POST[Judul]','$filename','2','$_POST[uploader]','$vtg[tgl]')");							   
           					
				

echo "<script>window.location ='media.php?page=1f56234e-4361-4706-bb5a-91d3101bbdb6'</script>";
}

elseif ($page=='1f56234e-4361-4706-bb5a-91d3101bbdb6' AND $act=='hapus'){
    mysql_query("DELETE FROM fileupload  WHERE File_ID= '$_POST[File_ID]'");
      unlink("/bahan/$_POST[FileN]");
  echo "<script>window.location ='media.php?page=1f56234e-4361-4706-bb5a-91d3101bbdb6'</script>";
}
?>
