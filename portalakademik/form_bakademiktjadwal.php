<?php
$sql = $pdo->prepare('SELECT * FROM akademik WHERE username = :id');
$sql->bindParam(':id', $_SESSION['username']);
$sql->execute();
$data=$sql->fetch(PDO::FETCH_OBJ);

switch($_GET['halaman']){
     
  default:    
  ?>             
    <div class="col-md-10"> 
        <div class="col-lg-12">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <div class="text-muted bootstrap-admin-box-title" style="color:white;">Akademik | Jadwal Perkuliahan</div>
            </div>
              <div class="bootstrap-admin-panel-content">                   
                <form method="post" action="?page=baakademikjadwal&halaman=cari">
                  <table class="table table-striped" style="font-size:13px;">
  
                    <?php
                   echo"  <tr><td>Program</td><td>
                            <select name='prog'>
                              <option value=0 selected>- Pilih Program -</option>";
                               $sql=$pdo->query("SELECT * FROM program");
                               while($r=$sql->fetch(PDO::FETCH_OBJ)){ 
                                  echo "<option value=".$r->ID.">".$r->Program_ID." -- ".$r->nama_program."</option>";
                              }  
                      echo "</select> 
                     <tr><td>Tahun</td><td> &nbsp; <input name='Tahun_ID' style='width:80px; height:25px;' type='text' class='form-control col-md-6' id='typeahead' autocomplete='off' data-provide='typeahead' data-items='4'>
                      <button class='btn btn-xs btn-primary' type='submit'><i class='glyphicon glyphicon-search'></i> Cari Data</button></td></tr>";
                   ?>
  
  
                  </table> <br />
                </form>
                 <?php
     echo"<form method='post' action='?page=baakademikjadwal&halaman=tambahjadwal'> 
          <table class='table table-striped' style='font-size:13px;''>
            <button class='btn btn-xs btn-success' type='submit'><i class='glyphicon glyphicon-plus'></i> Tambah Jadwal Perkuliahan</button>                    
          </table></form><br />";
        ?>   
          <body class="bootstrap-admin-with-small-navbar">
              <table  class="table table-hover" id="example" style="font-size:12px;">
                  <thead>
                    <tr style="background-color:#3e8bda; color:white;">
                      <th>No</th><th>#</th><th>#</th><th>Tahun</th><th>Matakuliah</th>
                      <th>Hari</th><th>Jam</th><th>Kelas</th><th>Ruang</th><th>Dosen</th>                    
                    </tr>
                  </thead>
                <tbody>
             </table>
            </div>
          </div>
        </div>
      </div>
  </body>
  </html>

  <?php
  break;
     
  case"cari":   
  ?>
    <div class="col-md-10"> 
        <div class="col-lg-12">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <div class="text-muted bootstrap-admin-box-title" style="color:white;">Akademik | Jadwal Perkuliahan</div>
            </div>
              <div class="bootstrap-admin-panel-content">                   
                <form method="post" action="?page=baakademikjadwal&halaman=cari">
                  <table class="table table-striped" style="font-size:13px;">
                  <?php  
                 echo"  <tr><td>Program</td><td>
                          <select name='prog'>
                            <option value=0 selected>- Pilih Program -</option>";
                            $sql=$pdo->query("SELECT * FROM program");
                            while($r=$sql->fetch(PDO::FETCH_OBJ)){ 
                               if (("".$r->ID."")==($_REQUEST[prog])){
                                  echo "<option value=".$r->ID." selected>".$r->Program_ID." -- ".$r->nama_program."</option>";
                              }else{
                                  echo "<option value=".$r->ID.">".$r->Program_ID." -- ".$r->nama_program."</option>";                           
                              }
                            }
                      echo "</select></td></tr>";
                   echo"  <tr><td>Tahun</td><td> &nbsp; <input name='Tahun_ID' value='$_REQUEST[Tahun_ID]' style='width:80px; height:25px;' type='text' class='form-control col-md-6' id='typeahead' autocomplete='off' data-provide='typeahead' data-items='4'>
                   <button class='btn btn-xs btn-primary' type='submit'><i class='glyphicon glyphicon-search'></i> Cari Data</button>";
                 ?>

                 </tbody>
                </table> <br />
              </form>
                <?php
     echo"<form method='post' action='?page=baakademikjadwal&halaman=tambahjadwal'> 
          <table class='table table-striped' style='font-size:13px;''>
            <button class='btn btn-xs btn-success' type='submit'><i class='glyphicon glyphicon-plus'></i> Tambah Jadwal Perkuliahan</button>                    
          </table></form><br />";
        ?>
          <body class="bootstrap-admin-with-small-navbar">
              <table  class="table table-hover" id="example" style="font-size:12px;">
                  <thead>
                    <tr style="background-color:#3e8bda; color:white;">
                      <th>No</th><th>#</th><th>#</th><th>Tahun</th><th>Matakuliah</th>
                      <th>Hari</th><th>Jam</th><th>Kelas</th><th>Ruang</th><th>Dosen</th>                    
                    </tr>
                  </thead>
                <tbody>
            <?php
            $sql = $pdo->prepare("SELECT a.Jadwal_ID,a.Tahun_ID,b.Kode_mtk,b.Nama_matakuliah,a.Hari,a.Jam_Mulai,a.Jam_Selesai,a.Kelas,c.nama_lengkap,d.Nama 
                                 FROM jadwal a JOIN matakuliah b JOIN dosen c JOIN ruang d
                                 WHERE a.Kode_Mtk=b.Kode_mtk AND a.Identitas_ID=b.Identitas_ID AND a.Jurusan_ID=b.Jurusan_ID AND
                                       a.Dosen_ID=c.ID AND a.Ruang_ID=d.ID AND a.Tahun_ID='$_REQUEST[Tahun_ID]' AND a.Identitas_ID=:ID AND a.Jurusan_ID=:Jurusan_ID AND 
                                       a.Program_ID='$_REQUEST[prog]' ORDER BY a.Hari");
            $sql->bindParam(':ID', $data->Identitas_ID, PDO::PARAM_INT); 
            $sql->bindParam(':Jurusan_ID', $data->Jurusan_ID, PDO::PARAM_INT);
            $sql->execute();
            while($r=$sql->fetch(PDO::FETCH_OBJ)){

            $no++;
            echo"  <tr class='odd gradeX'><td>$no</td>
                     <td width=10 align=center><a class=t href=\"form_bakademiktjadwalact.php.php?page=baakademikjadwal&halaman=hapus&key=$r->Jadwal_ID&Tahun_ID=$r->Tahun_ID&ID=$data->Identitas_ID&prodi=$data->Jurusan_ID&prog=$_REQUEST[prog]\"
                      onClick=\"return confirm('Apakah Anda benar-benar akan menghapus jadwal ini ?')\"><img src=../images/del.png></a></td>
                     <td width=10><a class=t href=?page=baakademikjadwal&halaman=edit&key=$r->Jadwal_ID><img src=../images/edit.png></a></td>
                     <td>$r->Tahun_ID</td>
                     <td>$r->Kode_mtk - $r->Nama_matakuliah</td>
                     <td>$r->Hari</td>
                     <td>$r->Jam_Mulai - $r->Jam_Selesai</td>
                     <td>$r->Kelas</td>
                     <td>$r->Nama</td>
                     <td>$r->nama_lengkap</td>
                    </tr>";
            }
            ?>
              </table>
          </div>
        </div>
      </div>
  <?php                                                                                
  break;  
  
  case "tambahjadwal":
  ?>
  <div class="col-md-10">
    <div class="col-lg-12">                                                                              
        <div class="panel panel-primary bootstrap-admin-no-table-panel">                                                    
            <div class="panel-heading">
                <div class="text-muted bootstrap-admin-box-title" style="color:white;">Tambah Jadwal Perkuliahan</div>
            </div>
      <?php
      echo"  <div class='bootstrap-admin-no-table-panel-content bootstrap-admin-panel-content collapse in'>
                 <form class='form-horizontal' method='post' action='form_bakademiktjadwalact.php?page=baakademikjadwal&halaman=simpan'>
                 <input name='ID' type=hidden value='$data->Identitas_ID'>
                 <input name='prodi' type=hidden value='$data->Jurusan_ID'>
                   <fieldset>
                      <legend>Set Kaldender</legend>
                      <div class='form-group'>
                          <label class='col-lg-2 control-label' for='typeahead' style='font-size:13px;'>Tahun</label>
                          <div class='col-lg-10'>
                              <input name='Tahun_ID' style='width:80px; height:25px;' type='text' class='form-control col-md-6' id='typeahead' autocomplete='off' data-provide='typeahead' data-items='4'>
                          </div>
                      </div>";
                 echo"<div class='form-group'>                     
                       <label class='col-lg-2 control-label' for='select02' style='font-size:13px;'>Program</label>
                         <div class='col-lg-10'>
                          <select id='select03' class='selectize-select' style='width: 350px' name='prog'>
                            <option value=0 selected>- Pilih Program -</option>";
                               $sql=$pdo->query("SELECT * FROM program");
                               while($r=$sql->fetch(PDO::FETCH_OBJ)){ 
                                  echo "<option value=".$r->ID.">".$r->Program_ID." -- ".$r->nama_program."</option>";
                              }
                            echo "</select></div></div>";
                 echo"<div class='form-group'>                     
                       <label class='col-lg-2 control-label' for='select02' style='font-size:13px;'>Matakuliah</label>
                         <div class='col-lg-10'>
                          <select id='select01' class='selectize-select' style='width: 450px;' name='Kode_Mtk'>
                            <option value=0 selected>- Pilih Matakuliah -</option>";
                            $sql=$pdo->query("SELECT Semester,Kode_mtk,Nama_matakuliah,SKS FROM matakuliah 
                                                 WHERE StatusMtk_ID='A' AND JenisMTK_ID!='D' AND Jurusan_ID='$data->Jurusan_ID' ORDER BY Semester asc");
                             while($r=$sql->fetch(PDO::FETCH_OBJ)){
                                echo "<option value=".$r->Kode_mtk.">".$r->Semester." -- ".$r->Kode_mtk." -- ".$r->Nama_matakuliah." -- ".$r->SKS."</option>";
                            }
                            echo "</select></div></div>";
                 echo"<div class='form-group'>                     
                       <label class='col-lg-2 control-label' for='select02' style='font-size:13px;'>Hari</label>
                         <div class='col-lg-10'>
                          <select id='select01' class='selectize-select' style='width: 350px;' name='Hari'>
                            <option value=0 selected>- Pilih Hari -</option>";
                            $sql=$pdo->query("SELECT * FROM hari ORDER BY id");
                            while($r=$sql->fetch(PDO::FETCH_OBJ)){
                                echo "<option value=".$r->hari.">".$r->id." -- ".$r->hari."</option>";
                            }
                            echo "</select></div></div>";
                 echo"<div class='form-group'>
                          <label class='col-lg-2 control-label' for='typeahead' style='font-size:13px;'>Jam Kuliah</label>
                          <div class='col-lg-10'>
                              <input name='Jam_Mulai' value=00:00 style='width:80px; height:25px;' type='text' class='form-control col-md-6' id='typeahead' data-provide='typeahead' data-items='4'>
                              <input name='Jam_Selesai' value=00:00 style='width:80px; height:25px;' type='text' class='form-control col-md-6' id='typeahead' data-provide='typeahead' data-items='4'>
                          </div>
                      </div>";
                 echo"<div class='form-group'>
                          <label class='col-lg-2 control-label' for='typeahead' style='font-size:13px;'>Nama Kelas</label>
                          <div class='col-lg-10'>
                              <input name='Kelas' style='width:80px; height:25px;' type='text' class='form-control col-md-6' id='typeahead' data-provide='typeahead' data-items='4'>
                          </div>
                      </div>";
                 echo"<div class='form-group'>                     
                       <label class='col-lg-2 control-label' for='select02' style='font-size:13px;'>Ruang</label>
                         <div class='col-lg-10'>
                          <select id='select01' class='selectize-select' style='width: 250px;' name='Ruang_ID'>
                            <option value=0 selected>- Pilih Ruang -</option>";
                            $sql=$pdo->query("SELECT * FROM ruang");
                            while($r=$sql->fetch(PDO::FETCH_OBJ)){
                                echo "<option value=".$r->ID.">".$r->Ruang_ID." -- ".$r->Nama."</option>";
                            }
                            echo "</select></div></div>";
                 echo"<div class='form-group'>                     
                       <label class='col-lg-2 control-label' for='select02' style='font-size:13px;'>Dosen Pengampu</label>
                         <div class='col-lg-10'>
                          <select id='select01' class='selectize-select' style='width: 250px;' name='Dosen_ID'>
                            <option value=0 selected>- Pilih Dosen -</option>";
                            $sql=$pdo->query("SELECT * FROM dosen ORDER BY NIDN");
                            while($r=$sql->fetch(PDO::FETCH_OBJ)){
                                echo "<option value=".$r->ID.">".$r->NIDN." -- ".$r->nama_lengkap."</option>";
                            }
                            echo "</select></div></div>";
                          
                 echo"
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
  

  case "edit":
  $sql = $pdo->prepare('SELECT * FROM jadwal WHERE Jadwal_ID= :id');
  $sql->bindParam(':id', $_GET['key'], PDO::PARAM_INT);
  $sql->execute();
  $r=$sql->fetch();

  echo"
  <div class='col-md-10'>
    <div class='col-lg-12'>                                                                              
        <div class='panel panel-primary bootstrap-admin-no-table-panel'>                                                    
            <div class='panel-heading'>
                <div class='text-muted bootstrap-admin-box-title' style='color:white;'>Perbaharui Jadwal Perkuliahan</div>
            </div>
            <div class='bootstrap-admin-no-table-panel-content bootstrap-admin-panel-content collapse in'>
                 <form class='form-horizontal' method='post' action='form_bakademiktjadwalact.php?page=baakademikjadwal&halaman=perbaharui'>
                 <input type=hidden value='$r[Jadwal_ID]' name=key>
                   <fieldset>
                      <legend>Set Kaldender</legend>
                 <div class='form-group'>
                          <label class='col-lg-2 control-label' for='typeahead' style='font-size:13px;'>Tahun</label>
                          <div class='col-lg-10'>
                              <input name='Tahun_ID' value='$r[Tahun_ID]' style='width:80px; height:25px;' type='text' class='form-control col-md-6' id='typeahead' autocomplete='off' data-provide='typeahead' data-items='4'>
                          </div>
                      </div>";
                 echo"<div class='form-group'>                     
                       <label class='col-lg-2 control-label' for='select02' style='font-size:13px;'>Program</label>
                         <div class='col-lg-10'>
                          <select id='select03' class='selectize-select' style='width: 350px' name='prog'>
                            <option value=0 selected>- Pilih Program -</option>";
                            $sql=$pdo->query("SELECT * FROM program");
                            while($w=$sql->fetch(PDO::FETCH_OBJ)){ 
                               if (("".$w->ID."")==($r[Program_ID])){
                                  echo "<option value=".$w->ID." selected>".$w->Program_ID." -- ".$w->nama_program."</option>";
                              }else{
                                  echo "<option value=".$w->ID.">".$w->Program_ID." -- ".$w->nama_program."</option>";                           
                              }
                            }
                    echo "</select></div></div>";
                 echo"<div class='form-group'>                     
                       <label class='col-lg-2 control-label' for='select02' style='font-size:13px;'>Matakuliah</label>
                         <div class='col-lg-10'>
                          <select id='select01' class='selectize-select' style='width: 350px;' name='Kode_Mtk'>
                            <option value=0 selected>- Pilih Matakuliah -</option>";
                            $sql=$pdo->query("SELECT Kode_mtk,Nama_matakuliah,SKS FROM matakuliah 
                                                 WHERE StatusMtk_ID='A' AND JenisMTK_ID!='D' ORDER BY Nama_matakuliah");
                            while($w=$sql->fetch(PDO::FETCH_OBJ)){ 
                               if (("".$w->Kode_mtk."")==($r[Kode_Mtk])){
                                  echo "<option value=".$w->Kode_mtk." selected>".$w->Kode_mtk." -- ".$w->Nama_matakuliah." -- ".$w->SKS."</option>";
                              }else{
                                  echo "<option value=".$w->Kode_mtk.">".$w->Kode_mtk." -- ".$w->Nama_matakuliah." -- ".$w->SKS."</option>";                           
                              }
                            }
                            echo "</select></div></div>";
                 echo"<div class='form-group'>                     
                       <label class='col-lg-2 control-label' for='select02' style='font-size:13px;'>Hari</label>
                         <div class='col-lg-10'>
                          <select id='select01' class='selectize-select' style='width: 350px;' name='Hari'>
                            <option value=0 selected>- Pilih Hari -</option>";
                            $sql=$pdo->query("SELECT * FROM hari ORDER BY id");
                            while($w=$sql->fetch(PDO::FETCH_OBJ)){ 
                               if (("".$w->hari."")==($r[Hari])){
                                  echo "<option value=".$w->hari." selected>".$w->id." -- ".$w->hari."</option>";
                              }else{
                                  echo "<option value=".$w->hari.">".$w->id." -- ".$w->hari."</option>";                           
                              }
                            }
                            echo "</select></div></div>";
                 echo"<div class='form-group'>
                          <label class='col-lg-2 control-label' for='typeahead' style='font-size:13px;'>Jam Kuliah</label>
                          <div class='col-lg-10'>
                              <input name='Jam_Mulai' value='$r[Jam_Mulai]' style='width:80px; height:25px;' type='text' class='form-control col-md-6' id='typeahead' data-provide='typeahead' data-items='4'>
                              <input name='Jam_Selesai' value='$r[Jam_Selesai]' style='width:80px; height:25px;' type='text' class='form-control col-md-6' id='typeahead' data-provide='typeahead' data-items='4'>
                          </div>
                      </div>";
                 echo"<div class='form-group'>
                          <label class='col-lg-2 control-label' for='typeahead' style='font-size:13px;'>Nama Kelas</label>
                          <div class='col-lg-10'>
                              <input name='Kelas' value='$r[Kelas]' style='width:80px; height:25px;' type='text' class='form-control col-md-6' id='typeahead' data-provide='typeahead' data-items='4'>
                          </div>
                      </div>";
                 echo"<div class='form-group'>                     
                       <label class='col-lg-2 control-label' for='select02' style='font-size:13px;'>Ruang</label>
                         <div class='col-lg-10'>
                          <select id='select01' class='selectize-select' style='width: 250px;' name='Ruang_ID'>
                            <option value=0 selected>- Pilih Ruang -</option>";
                            $sql=$pdo->query("SELECT * FROM ruang");
                            while($w=$sql->fetch(PDO::FETCH_OBJ)){ 
                               if (("".$w->ID."")==($r[Ruang_ID])){
                                  echo "<option value=".$w->ID." selected>".$w->Ruang_ID." -- ".$w->Nama."</option>";
                              }else{
                                  echo "<option value=".$w->ID.">".$w->Ruang_ID." -- ".$w->Nama."</option>";                           
                              }
                            }
                            echo "</select></div></div>";
                 echo"<div class='form-group'>                     
                       <label class='col-lg-2 control-label' for='select02' style='font-size:13px;'>Dosen Pengampu</label>
                         <div class='col-lg-10'>
                          <select id='select01' class='selectize-select' style='width: 250px;' name='Dosen_ID'>
                            <option value=0 selected>- Pilih Dosen -</option>";
                            $sql=$pdo->query("SELECT * FROM dosen ORDER BY NIDN");
                            while($w=$sql->fetch(PDO::FETCH_OBJ)){ 
                               if (("".$w->ID."")==($r[Dosen_ID])){
                                  echo "<option value=".$w->ID." selected>".$w->NIDN." -- ".$w->nama_lengkap."</option>";
                              }else{
                                  echo "<option value=".$w->ID.">".$w->NIDN." -- ".$w->nama_lengkap."</option>";                           
                              }
                            }
                            echo "</select></div></div>";         
                    echo"
                      <button type='submit' class='btn btn-sm btn-primary'>Perbaharui Data</button>
                      <button type='reset' class='btn btn-sm btn-default'>Batal</button>";
                      ?>
                   </fieldset>
                 </form>
                 </form>
               </div>
            </div>
          </div>
    </div>    
  <?php
  break;
}
?>
