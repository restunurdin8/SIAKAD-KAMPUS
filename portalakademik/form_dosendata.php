<?php 
$sql = $pdo->prepare('SELECT * FROM dosen WHERE username = :id');
$sql->bindParam(':id', $_SESSION['username']);
$sql->execute();
$r=$sql->fetch(PDO::FETCH_OBJ);
 
switch($_GET['halaman']){

  default:
  ?>
  <div class="col-md-10">
    <div class="col-lg-12">                                                                              
        <div class="panel panel-primary bootstrap-admin-no-table-panel">                                                    
            <div class="panel-heading">
                <div class="text-muted bootstrap-admin-box-title" style="color:white;">Dosen | Data Dosen</div>
            </div>
      <?php
      $TanggalLahir=sprintf("%02d/%02d/%02d",substr($r->TanggalLahir, 5,2),substr($r->TanggalLahir, 8,2),substr($r->TanggalLahir, 0,4));
      echo"  <div class='bootstrap-admin-no-table-panel-content bootstrap-admin-panel-content collapse in'>
                 <form class='form-horizontal' method='post' action=?page=dosendata&halaman=perbaharui enctype='multipart/form-data'>
                 <input type=hidden value='$r->ID' name=key>
                   <input type='hidden' name='ukuran_maks_file' value='50000'>
                   <fieldset>
                      <legend>Set Data Pribadi Dosen</legend>";
                 echo"<div class='form-group'>
                          <label class='col-lg-2 control-label' for='typeahead' style='font-size:13px;'>Nama</label>
                          <div class='col-lg-10'>
                              <input name='nama_lengkap' value='$r->nama_lengkap' style='width:290px; height:25px;' type='text' class='form-control col-md-6' id='typeahead' data-provide='typeahead' data-items='4'>
                          </div>
                      </div>
                      <div class='form-group'>
                          <label class='col-lg-2 control-label' for='typeahead' style='font-size:13px;'>Gelar</label>
                          <div class='col-lg-10'>
                              <input name='Gelar' value='$r->Gelar' style='width:190px; height:25px;' type='text' class='form-control col-md-6' id='typeahead' data-provide='typeahead' data-items='4'>
                          </div>
                      </div>
                      <div class='form-group'>
                          <label class='col-lg-2 control-label' for='typeahead' style='font-size:13px;'>Password</label>
                          <div class='col-lg-10'>
                              <input name='password' style='width:190px; height:25px;' type='text' class='form-control col-md-6' id='typeahead' data-provide='typeahead' data-items='4'> * ) Kosongkan bila tidak diganti
                          </div>
                      </div>
                      <div class='form-group'>
                          <label class='col-lg-2 control-label' for='typeahead' style='font-size:13px;'>Tempat/ Tgl Lahir</label>
                          <div class='col-lg-10'>
                              <input name='TempatLahir' value='$r->TempatLahir' style='width:290px; height:25px;' type='text' class='form-control col-md-6' id='typeahead' data-provide='typeahead' data-items='4'>
                              <label style='font-size:13px;'>&nbsp;</label>
                              <input style='width:150px; height:25px;' type='text' class='form-control datepicker' id='date01' name='TanggalLahir' value='$TanggalLahir'>                          
                          </div>
                      </div>
                      <div class='form-group'>
                          <label class='col-lg-2 control-label' for='typeahead' style='font-size:13px;'>Foto</label>
                          <div class='col-lg-10'>
                              <input type=file name='fupload' size=40>                          
                          </div>
                        </div>
 
                       <button type='submit' class='btn btn-sm btn-primary'>Simpan Data</button>
                      <button type='reset' class='btn btn-sm btn-default'>Batal</button>
                   </fieldset>
                 </form>
               </div>";
               ?>
            </div>
          </div>
    </div>    
  <?php    
  break;
  
  case"perbaharui";
  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $nama_file   = $_FILES['fupload']['name'];   	  
  $ukuran_file = $_FILES['fupload']['size'];

  $TanggalLahir=sprintf("%02d%02d%02d",substr($_POST['TanggalLahir'], 6,4),substr($_POST['TanggalLahir'], 0,2),substr($_POST['TanggalLahir'], 3,2));

  if (empty($lokasi_file)){
    if (empty($_POST['password'])) {
    $query = $pdo->prepare("UPDATE dosen SET nama_lengkap  = :1,Gelar  = :2,TempatLahir  = :3,TanggalLahir  = :4 WHERE ID = :5");
          $data = array(
          ':1' => $_POST['nama_lengkap'],
          ':2' => $_POST['Gelar'],
          ':3' => $_POST['TempatLahir'],
          ':4' => $TanggalLahir,
          ':5' => $_POST['key']
          );
          $query->execute($data);
    }else{
    $password=hash("sha512",$_POST['password']);
    $query = $pdo->prepare("UPDATE dosen SET password=:1,nama_lengkap  = :2,Gelar  = :3,TempatLahir  = :4,TanggalLahir  = :5 WHERE ID = :6");
          $data = array(
          ':1' => $password,
          ':2' => $_POST['nama_lengkap'],
          ':3' => $_POST['Gelar'],
          ':4' => $_POST['TempatLahir'],
          ':5' => $TanggalLahir,
          ':6' => $_POST['key']
          );
          $query->execute($data);    
    }
  }else{
    if ($ukuran_file > $_POST['ukuran_maks_file']){
      echo "<script>alert('Upload Gagal !!! Ukuran file $nama_file : $ukuran_file bytes, Ukuran file tidak boleh besar dari(50 Kb)'); window.location = 'media.php?page=dosendata'</script>";
    }else{
      move_uploaded_file($lokasi_file,"foto_dosen/$nama_file");
      if (empty($_POST['password'])) {
    $query = $pdo->prepare("UPDATE dosen SET nama_lengkap  = :1,Gelar  = :2,TempatLahir  = :3,TanggalLahir  = :4,foto  = :5 WHERE ID = :6");
          $data = array(
          ':1' => $_POST['nama_lengkap'],
          ':2' => $_POST['Gelar'],
          ':3' => $_POST['TempatLahir'],
          ':4' => $TanggalLahir,
          ':5' => $nama_file,
          ':6' => $_POST['key']
          );
          $query->execute($data);
      }else{
      $password=hash("sha512",$_POST['password']);
      $query = $pdo->prepare("UPDATE dosen SET password=:1,nama_lengkap  = :2,Gelar  = :3,TempatLahir  = :4,TanggalLahir  = :5,foto  = :6 WHERE ID = :7");
          $data = array(
          ':1' => $password,
          ':2' => $_POST['nama_lengkap'],
          ':3' => $_POST['Gelar'],
          ':4' => $_POST['TempatLahir'],
          ':5' => $TanggalLahir,
          ':6' => $nama_file,
          ':7' => $_POST['key']
          );
          $query->execute($data);   
      }
    }
  }
  echo "<script>alert('Data Berhasil Diperbaharui'); window.location ='media.php?page=dosendata'</script>";   
  break;
  }
?>
