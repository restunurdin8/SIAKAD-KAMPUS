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
              <div class="text-muted bootstrap-admin-box-title" style="color:white;">Akademik | Kalender Akademik</div>
            </div>
              <div class="bootstrap-admin-panel-content">                   
                <form method="post" action="?page=baakademikkalender&halaman=cari">
                  <table class="table table-striped" style="font-size:13px;">
  
                    <?php
                   echo"  <tr><td>Program</td><td> :
                            <select name='prog'>
                              <option value=0 selected>- Pilih Program -</option>";
                               $sql=$pdo->query("SELECT * FROM program");
                               while($r=$sql->fetch(PDO::FETCH_OBJ)){ 
                                  echo "<option value=".$r->ID.">".$r->Program_ID." -- ".$r->nama_program."</option>";
                              }  
                      echo "</select> 
                      <button class='btn btn-xs btn-primary' type='submit'><i class='glyphicon glyphicon-search'></i> Cari Data</button></td></tr>";
                   ?>
  
  
                  </table> 
                </form><br />
                <?php
     echo"<form method='post' action='?page=baakademikkalender&halaman=tambahtahun'> 
          <table class='table table-striped' style='font-size:13px;''>
            <button class='btn btn-xs btn-success' type='submit'><i class='glyphicon glyphicon-plus'></i> Tambah Kalender Akademik</button>                    
          </table></form><br />";
        ?>  
          <body class="bootstrap-admin-with-small-navbar">
              <table  class="table table-hover" id="example" style="font-size:12px;">
                  <thead>
                    <tr style="background-color:#3e8bda; color:white;">
                      <th>No</th><th>Del</th><th>Edi</th><th>Tahun</th><th>Tgl KRS</th>
                      <th>Tgl UTS</th><th>Tgl UAS</th><th>Akhir Penilaian</th><th>KHS Cetak</th>                    
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
              <div class="text-muted bootstrap-admin-box-title" style="color:white;">Akademik | Kalender Akademik</div>
            </div>
              <div class="bootstrap-admin-panel-content">                   
                <form method="post" action="?page=baakademikkalender&halaman=cari">
                  <table class="table table-striped" style="font-size:13px;">
                  <?php  
                 echo"  <tr><td>Program</td><td> :
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
                      echo "</select> <button class='btn btn-xs btn-primary' type='submit'><i class='glyphicon glyphicon-search'></i> Cari Data</button></td></tr>";
                 ?>

                 </tbody>
                </table>
              </form><br />
                <?php
     echo"<form method='post' action='?page=baakademikkalender&halaman=tambahtahun'> 
          <table class='table table-striped' style='font-size:13px;''>
            <button class='btn btn-xs btn-success' type='submit'><i class='glyphicon glyphicon-plus'></i> Tambah Kalender Akademik</button>                    
          </table></form><br />";
        ?>
          <body class="bootstrap-admin-with-small-navbar">
              <table  class="table table-hover" id="example" style="font-size:12px;">
                  <thead>
                    <tr style="background-color:#3e8bda; color:white;">
                      <th>No</th><th>Del</th><th>Edi</th><th>Tahun</th><th>Tgl KRS</th>
                      <th>Tgl UTS</th><th>Tgl UAS</th><th>Akhir Penilaian</th><th>KHS Cetak</th>                    
                    </tr>
                  </thead>
                <tbody>
            <?php
            $sql = $pdo->prepare("SELECT * FROM tahun WHERE Identitas_ID = :ID AND Jurusan_ID=:Jurusan_ID AND Program_ID=$_REQUEST[prog]");
            $sql->bindParam(':ID', $data->Identitas_ID, PDO::PARAM_INT); 
            $sql->bindParam(':Jurusan_ID', $data->Jurusan_ID, PDO::PARAM_INT);
            $sql->execute();
            while($r=$sql->fetch(PDO::FETCH_OBJ)){

          	$tgl1 = tgl_indo($r->TglKRSMulai);
          	$tgl2 = tgl_indo($r->TglKRSSelesai);
          	$tgl3 = tgl_indo($r->TglCetakKHS);                 	
          	$tgl4 = tgl_indo($r->TglUTSMulai);
          	$tgl5 = tgl_indo($r->TglUTSSelesai);
          	$tgl6 = tgl_indo($r->TglUASMulai);
          	$tgl7 = tgl_indo($r->TglUASSelesai);
          	$tgl8 = tgl_indo($r->TglNilaiMulai);
          	$tgl9 = tgl_indo($r->TglNilaiSelesai);
            $no++;
            echo"  <tr class='odd gradeX'><td>$no</td>
                     <td width=10 align=center><a class=t href=\"form_bakademiktkalenderact.php?page=baakademikkalender&halaman=hapus&key=$r->ID&ID=$r->Identitas_ID&prodi=$r->Jurusan_ID&prog=$r->Program_ID\"
                      onClick=\"return confirm('Apakah Anda benar-benar akan menghapus Tahun $r->Tahun_ID Prodi $r->Jurusan_ID ?')\"><img src=../images/del.png></a></td>
                     <td width=10><a class=t href=?page=baakademikkalender&halaman=edit&ID=$r->ID><img src=../images/edit.png></a></td>
                     <td>$r->Tahun_ID</td>
                     <td>$tgl1 / $tgl2</td>
                     <td>$tgl3 / $tgl4</td>
                     <td>$tgl5 / $tgl6</td>
                     <td>$tgl7 / $tgl8</td>
                     <td>$tgl9</td>
                    </tr>";
            }
            ?>
              </table>
          </div>
        </div>
      </div>
  <?php                                                                                
  break;  
  
  case "tambahtahun":
  ?>
  <div class="col-md-10">
    <div class="col-lg-12">                                                                              
        <div class="panel panel-primary bootstrap-admin-no-table-panel">                                                    
            <div class="panel-heading">
                <div class="text-muted bootstrap-admin-box-title" style="color:white;">Konfigurasi Kalender Akademik</div>
            </div>
            <div class="bootstrap-admin-no-table-panel-content bootstrap-admin-panel-content collapse in">
                 <form class="form-horizontal" method="post" action="form_bakademiktkalenderact.php?page=baakademikkalender&halaman=simpan">
                <input name="ID" type=hidden value="<?php echo $data->Identitas_ID ?>">
                <input name="prodi" type=hidden value="<?php echo $data->Jurusan_ID ?>">
                   <fieldset>
                      <legend>Set Kaldender</legend>
                      <div class="form-group">
                          <label class="col-lg-2 control-label" for="typeahead" style="font-size:13px;">Tahun</label>
                          <div class="col-lg-10">
                              <input name="Tahun_ID" style="width:80px; height:25px;" type="text" class="form-control col-md-6" id="typeahead" autocomplete="off" data-provide="typeahead" data-items="4">
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-lg-2 control-label" for="typeahead" style="font-size:13px;">Nama Kalender</label>
                          <div class="col-lg-10">
                              <input name="Nama" style="width:450px; height:25px;" type="text" class="form-control col-md-6" id="typeahead" autocomplete="off" data-provide="typeahead" data-items="4">
                          </div>
                      </div> 
                      <?php
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
                          ?>
                      <div class="form-group">
                          <label class="col-lg-2 control-label" for="date01" style="font-size:13px;">KRS Mulai</label>
                          <div class="col-lg-10">
                              <input style="width:150px; height:25px;" type="text" class="form-control datepicker" id="date01" name="TglKRSMulai">
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-lg-2 control-label" for="date01" style="font-size:13px;">KRS Selesai</label>
                          <div class="col-lg-10">
                              <input style="width:150px; height:25px;" type="text" class="form-control datepicker" id="date02" name="TglKRSSelesai">
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-lg-2 control-label" for="date01" style="font-size:13px;">UTS Mulai</label>
                          <div class="col-lg-10">
                              <input style="width:150px; height:25px;" type="text" class="form-control datepicker" id="date03" name="TglUTSMulai">
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-lg-2 control-label" for="date01" style="font-size:13px;">UTS Selesai</label>
                          <div class="col-lg-10">
                              <input style="width:150px; height:25px;" type="text" class="form-control datepicker" id="date04" name="TglUTSSelesai">
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-lg-2 control-label" for="date01" style="font-size:13px;">UAS Mulai</label>
                          <div class="col-lg-10">
                              <input style="width:150px; height:25px;" type="text" class="form-control datepicker" id="date05" name="TglUASMulai">
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-lg-2 control-label" for="date01" style="font-size:13px;">UAS Selesai</label>
                          <div class="col-lg-10">
                              <input style="width:150px; height:25px;" type="text" class="form-control datepicker" id="date06" name="TglUASSelesai">
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-lg-2 control-label" for="date01" style="font-size:13px;">Input Nilai Mulai</label>
                          <div class="col-lg-10">
                              <input style="width:150px; height:25px;" type="text" class="form-control datepicker" id="date07" name="TglNilaiMulai">
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-lg-2 control-label" for="date01" style="font-size:13px;">Input Nilai Selesai</label>
                          <div class="col-lg-10">
                              <input style="width:150px; height:25px;" type="text" class="form-control datepicker" id="date08" name="TglNilaiSelesai">
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-lg-2 control-label" for="date01" style="font-size:13px;">Cetak KHS</label>
                          <div class="col-lg-10">
                              <input style="width:150px; height:25px;" type="text" class="form-control datepicker" id="date09" name="TglCetakKHS">
                          </div>
                      </div>
                      <button type="submit" class="btn btn-sm btn-primary">Simpan Data</button>
                      <button type="reset" class="btn btn-sm btn-default">Batal</button>
                   </fieldset>
                 </form>
                 </form>
               </div>
            </div>
          </div>
    </div>    
  
  <?php
  break;
  

  case "edit":
  $sql = $pdo->prepare('SELECT * FROM tahun WHERE ID= :id');
  $sql->bindParam(':id', $_GET['ID'], PDO::PARAM_INT);
  $sql->execute();
  $r=$sql->fetch();


  $krsm=sprintf("%02d/%02d/%02d",substr($r['TglKRSMulai'], 5,2),substr($r['TglKRSMulai'], 8,2),substr($r['TglKRSMulai'], 0,4));
  $krss=sprintf("%02d/%02d/%02d",substr($r['TglKRSSelesai'], 5,2),substr($r['TglKRSSelesai'], 8,2),substr($r['TglKRSSelesai'], 0,4));
  $khsc=sprintf("%02d/%02d/%02d",substr($r['TglCetakKHS'], 5,2),substr($r['TglCetakKHS'], 8,2),substr($r['TglCetakKHS'], 0,4));
  $utsm=sprintf("%02d/%02d/%02d",substr($r['TglUTSMulai'], 5,2),substr($r['TglUTSMulai'], 8,2),substr($r['TglUTSMulai'], 0,4));
  $utss=sprintf("%02d/%02d/%02d",substr($r['TglUTSSelesai'], 5,2),substr($r['TglUTSSelesai'], 8,2),substr($r['TglUTSSelesai'], 0,4));
  $uasm=sprintf("%02d/%02d/%02d",substr($r['TglUASMulai'], 5,2),substr($r['TglUASMulai'], 8,2),substr($r['TglUASMulai'], 0,4));
  $uass=sprintf("%02d/%02d/%02d",substr($r['TglUASSelesai'], 5,2),substr($r['TglUASSelesai'], 8,2),substr($r['TglUASSelesai'], 0,4));
  $nilaim=sprintf("%02d/%02d/%02d",substr($r['TglNilaiMulai'], 5,2),substr($r['TglNilaiMulai'], 8,2),substr($r['TglNilaiMulai'], 0,4));
  $nilais=sprintf("%02d/%02d/%02d",substr($r['TglNilaiSelesai'], 5,2),substr($r['TglNilaiSelesai'], 8,2),substr($r['TglNilaiSelesai'], 0,4));
  echo"
  <div class='col-md-10'>
    <div class='col-lg-12'>                                                                              
        <div class='panel panel-primary bootstrap-admin-no-table-panel'>                                                    
            <div class='panel-heading'>
                <div class='text-muted bootstrap-admin-box-title' style='color:white;'>Konfigurasi Kalender Akademik</div>
            </div>
            <div class='bootstrap-admin-no-table-panel-content bootstrap-admin-panel-content collapse in'>
                 <form class='form-horizontal' method='post' action='form_bakademiktkalenderact.php?page=baakademikkalender&halaman=perbaharui'>
                 <input type=hidden value='$r[ID]' name=key>
                 <input name='ID' type=hidden value='$data->Identitas_ID'>
                 <input name='prodi' type=hidden value='$data->Jurusan_ID'>
                   <fieldset>
                      <legend>Set Kaldender</legend>
                 <div class='form-group'>
                          <label class='col-lg-2 control-label' for='typeahead' style='font-size:13px;'>Tahun</label>
                          <div class='col-lg-10'>
                              <input name='Tahun_ID' value='$r[Tahun_ID]' style='width:80px; height:25px;' type='text' class='form-control col-md-6' id='typeahead' autocomplete='off' data-provide='typeahead' data-items='4'>
                          </div>
                      </div>
                      <div class='form-group'>
                          <label class='col-lg-2 control-label' for='typeahead' style='font-size:13px;'>Nama Kalender</label>
                          <div class='col-lg-10'>
                              <input name='Nama' value='$r[Nama]' style='width:450px; height:25px;' type='text' class='form-control col-md-6' id='typeahead' autocomplete='off' data-provide='typeahead' data-items='4'>
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
                    echo"
                      <div class='form-group'>
                          <label class='col-lg-2 control-label' for='date01' style='font-size:13px;'>KRS Mulai</label>
                          <div class='col-lg-10'>
                              <input style='width:150px; height:25px;' type='text' class='form-control datepicker' id='date01' name='TglKRSMulai' value='$krsm'>
                          </div>
                      </div>
                      <div class='form-group'>
                          <label class='col-lg-2 control-label' for='date01' style='font-size:13px;'>KRS Selesai</label>
                          <div class='col-lg-10'>
                              <input style='width:150px; height:25px;' type='text' class='form-control datepicker' id='date02' name='TglKRSSelesai' value='$krss'>
                          </div>
                      </div>
                      <div class='form-group'>
                          <label class='col-lg-2 control-label' for='date01' style='font-size:13px;'>UTS Mulai</label>
                          <div class='col-lg-10'>
                              <input style='width:150px; height:25px;' type='text' class='form-control datepicker' id='date03' name='TglUTSMulai' value='$utsm'>
                          </div>
                      </div>
                      <div class='form-group'>
                          <label class='col-lg-2 control-label' for='date01' style='font-size:13px;'>UTS Selesai</label>
                          <div class='col-lg-10'>
                              <input style='width:150px; height:25px;' type='text' class='form-control datepicker' id='date04' name='TglUTSSelesai' value='$utss'>
                          </div>
                      </div>
                      <div class='form-group'>
                          <label class='col-lg-2 control-label' for='date01' style='font-size:13px;'>UAS Mulai</label>
                          <div class='col-lg-10'>
                              <input style='width:150px; height:25px;' type='text' class='form-control datepicker' id='date05' name='TglUASMulai' value='$uasm'>
                          </div>
                      </div>
                      <div class='form-group'>
                          <label class='col-lg-2 control-label' for='date01' style='font-size:13px;'>UAS Selesai</label>
                          <div class='col-lg-10'>
                              <input style='width:150px; height:25px;' type='text' class='form-control datepicker' id='date06' name='TglUASSelesai' value='$uass'>
                          </div>
                      </div>
                      <div class='form-group'>
                          <label class='col-lg-2 control-label' for='date01' style='font-size:13px;'>Input Nilai Mulai</label>
                          <div class='col-lg-10'>
                              <input style='width:150px; height:25px;' type='text' class='form-control datepicker' id='date07' name='TglNilaiMulai' value='$nilaim'>
                          </div>
                      </div>
                      <div class='form-group'>
                          <label class='col-lg-2 control-label' for='date01' style='font-size:13px;'>Input Nilai Selesai</label>
                          <div class='col-lg-10'>
                              <input style='width:150px; height:25px;' type='text' class='form-control datepicker' id='date08' name='TglNilaiSelesai' value='$nilais'>
                          </div>
                      </div>
                      <div class='form-group'>
                          <label class='col-lg-2 control-label' for='date01' style='font-size:13px;'>Cetak KHS</label>
                          <div class='col-lg-10'>
                              <input style='width:150px; height:25px;' type='text' class='form-control datepicker' id='date09' name='TglCetakKHS' value='$khsc'>
                          </div>
                      </div>
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
