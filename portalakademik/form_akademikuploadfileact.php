<?php
session_start();
error_reporting(0);
include_once '../config/koneksi.php';
$page=$_GET['page'];
$act=$_GET['halaman'];

if ($page=='50f9e899-0d4d-4b7b-a518-fb18bc430926' AND $act=='simpan'){
     
      $lokasi_file = $_FILES['fupload']['tmp_name'];

    $title = $_REQUEST['Judul'] ? htmlspecialchars($_REQUEST['Judul']) : 'Belum ada judul File Ini';
        $filename = basename($_FILES['fupload']['name']);
      	$uploadfile = $dir_gambar .$filename;
        move_uploaded_file($lokasi_file,"bahan/$filename");
          $tg=mysql_query("SELECT DATE_FORMAT (now(), '%Y-%m-%d %H:%i:%s') as tgl from error group by tgl");
          $vtg=mysql_fetch_array($tg);
 
              $query = mysql_query("INSERT INTO fileupload(Nama_File,File,Level_ID,TglInput)
              VALUES('$_POST[Judul]','$filename','1','$vtg[tgl]')");							   
           					
				

echo "<script>window.location ='media.php?page=50f9e899-0d4d-4b7b-a518-fb18bc430926'</script>";
}

elseif ($page=='50f9e899-0d4d-4b7b-a518-fb18bc430926' AND $act=='hapus'){
    mysql_query("DELETE FROM fileupload  WHERE File_ID= '$_POST[File_ID]'");
      unlink("/bahan/$_POST[FileN]");
  echo "<script>window.location ='media.php?page=50f9e899-0d4d-4b7b-a518-fb18bc430926'</script>";
}
?>
