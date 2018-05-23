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
              <div class="text-muted bootstrap-admin-box-title" style="color:white;">Akademik | Master Matakuliah</div>
            </div>
              <div class="bootstrap-admin-panel-content">                   
                <?php 
            echo"<form method='post' action='?page=baakademikmastermatakuliah&halaman=cari'>
                  <table class='table table-striped' style='font-size:13px;'>
                          <tr><td>Kurikulum</td><td> :
                            <select name='Kurikulum_ID'>
                              <option value=0 selected>- Pilih Kurikulum -</option>";
                               $sql=$pdo->query("SELECT * FROM kurikulum WHERE Identitas_ID='$data->Identitas_ID' AND Jurusan_ID='$data->Jurusan_ID' order by Kode");
                               while($r=$sql->fetch(PDO::FETCH_OBJ)){ 
                                  echo "<option value=".$r->Kurikulum_ID.">".$r->Kode." -- ".$r->Nama."</option>";
                              } 

                      echo "</select>&nbsp;<button class='btn btn-xs btn-primary' type='submit'><i class='glyphicon glyphicon-search'></i> Cari Matakuliah</button></td></tr>"; 

                  echo"   </table></form>
                        <table class='table table-striped' style='font-size:13px;''>
                        <form method='post' action='?page=baakademikmastermatakuliah&halaman=tambahmatakuliah'> 
                             &nbsp; <button class='btn btn-xs btn-success' type='submit'><i class='glyphicon glyphicon-plus'></i> Tambah Matakuliah</button>                    
                          </form>                         
                        <form method='post' action='?page=baakademikmastermatakuliah&halaman=daftarkurikulum'> 
                             &nbsp; <button class='btn btn-xs btn-success' type='submit'><i class='glyphicon glyphicon-list-alt'></i> Daftar Kurikulum</button>                    
                          </form>    
                  </table> <br />";
                   ?>
          <body class="bootstrap-admin-with-small-navbar">
              <table  class="table table-hover" id="example" style="font-size:12px;">
                  <thead>
                    <tr style="background-color:#3e8bda; color:white;">
                      <th>No</th><th>Del</th><th>Edi</th><th>Kode & Nama Matakuliah</th>
                      <th>SKS</th><th>Smt</th><th>Stts MK</th><th>PJ</th>                    
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
              <div class="text-muted bootstrap-admin-box-title" style="color:white;">Akademik | Master Matakuliah</div>
            </div>
              <div class="bootstrap-admin-panel-content">                   
           <?php
          echo" <form method='post' action='?page=baakademikmastermatakuliah&halaman=cari'>
                  <table class='table table-striped' style='font-size:13px;'>
                      <tr><td>Kurikulum</td><td> :
                          <select name='Kurikulum_ID'>
                            <option value=0 selected>- Pilih Kurikulum -</option>";
                            $sql=$pdo->query("SELECT * FROM kurikulum WHERE Identitas_ID='$data->Identitas_ID' AND Jurusan_ID='$data->Jurusan_ID'");
                            while($r=$sql->fetch(PDO::FETCH_OBJ)){ 
                               if (("".$r->Kurikulum_ID."")==($_REQUEST[Kurikulum_ID])){
                                  echo "<option value=".$r->Kurikulum_ID." selected>".$r->Kode." -- ".$r->Nama."</option>";
                              }else{
                                  echo "<option value=".$r->Kurikulum_ID.">".$r->Kode." -- ".$r->Nama."</option>";                           
                              }
                            }
                      echo "</select>&nbsp;<button class='btn btn-xs btn-primary' type='submit'><i class='glyphicon glyphicon-search'></i> Cari Matakuliah</button></td></tr>"; 
                  echo"   </table></form>
                        <table class='table table-striped' style='font-size:13px;''>
                        <form method='post' action='?page=baakademikmastermatakuliah&halaman=tambahmatakuliah'> 
                             &nbsp; <button class='btn btn-xs btn-success' type='submit'><i class='glyphicon glyphicon-plus'></i> Tambah Matakuliah</button>                    
                          </form>                                         
                        <form method='post' action='?page=baakademikmastermatakuliah&halaman=daftarkurikulum'> 
                          <input name='Kurikulum_ID' type=hidden value='$_REQUEST[Kurikulum_ID]'>
                             &nbsp; <button class='btn btn-xs btn-success' type='submit'><i class='glyphicon glyphicon-list-alt'></i> Daftar Kurikulum</button>                    
                          </form> 
                </table> <br />"; 
                ?>
          <body class="bootstrap-admin-with-small-navbar">
              <table  class="table table-hover" id="example" style="font-size:12px;">
                  <thead>
                    <tr style="background-color:#3e8bda; color:white;">
                      <th>No</th><th>Del</th><th>Edi</th><th>Kode & Nama Matakuliah</th>
                      <th>SKS</th><th>Smt</th><th>Stts MK</th><th>PJ</th>                    
                    </tr>
                  </thead>
                <tbody>
            <?php
            $query = $pdo->prepare("SELECT *
                                 FROM matakuliah 
                                 WHERE Identitas_ID=:ID AND Jurusan_ID=:Jurusan_ID AND Kurikulum_ID=$_REQUEST[Kurikulum_ID]
                                 ORDER BY Semester");
            $query->bindParam(':ID', $data->Identitas_ID, PDO::PARAM_INT); 
            $query->bindParam(':Jurusan_ID', $data->Jurusan_ID, PDO::PARAM_INT);
            $query->execute();
            while($r=$query->fetch(PDO::FETCH_OBJ)){

            $no++;
            echo"  <tr class='odd gradeX'><td>$no</td>
                     <td width=10 align=center><a class=t href=\"form_baakademikmastermatakuliahact.php?page=baakademikmastermatakuliah&halaman=hapus&key=$r->Matakuliah_ID&Kurikulum_ID=$_REQUEST[Kurikulum_ID]\"
                      onClick=\"return confirm('Apakah Anda benar-benar akan menghapus matakuliah ini ?')\"><img src=../images/del.png></a></td>
                     <td width=10><a class=t href=?page=baakademikmastermatakuliah&halaman=edit&key=$r->Matakuliah_ID><img src=../images/edit.png></a></td>
                     <td>$r->Kode_mtk - $r->Nama_matakuliah</td>
                     <td>$r->SKS</td>
                     <td>$r->Semester</td>
                     <td>$r->StatusMtk_ID</td>
                     <td>$r->Penanggungjawab</td>
                    </tr>";
            }
            ?>
              </table>
          </div>
        </div>
      </div>
  <?php                                                                                
  break;  

  case"daftarkurikulum":   
  ?>
    <div class="col-md-10"> 
        <div class="col-lg-12">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <div class="text-muted bootstrap-admin-box-title" style="color:white;">Akademik | Master Kurikulum</div>
            </div>
              <div class="bootstrap-admin-panel-content">                   
           <?php
          echo" 
                        <table class='table table-striped' style='font-size:13px;''>
                        <form method='post' action='?page=baakademikmastermatakuliah&halaman=cari'> 
                           <input name='Kurikulum_ID' type=hidden value='$_REQUEST[Kurikulum_ID]'>
                             &nbsp; <button class='btn btn-xs btn-success' type='submit'><i class='glyphicon glyphicon-arrow-left'></i> Kembali ke daftar Matakuliah</button>                    
                          </form>
                        <form method='post' action='?page=baakademikmastermatakuliah&halaman=tambahkurikulum'> 
                          <input name='Kurikulum_ID' type=hidden value='$_REQUEST[Kurikulum_ID]'>
                             &nbsp; <button class='btn btn-xs btn-success' type='submit'><i class='glyphicon glyphicon-plus'></i> Tambah Kurikulum</button>                    
                          </form>                                          
                </table> <br />"; 
                ?>

          <body class="bootstrap-admin-with-small-navbar">
              <table  class="table table-hover" id="example" style="font-size:12px;">
                  <thead>
                    <tr style="background-color:#3e8bda; color:white;">
                      <th>No</th><th>#</th><th>#</th><th>Kode & Nama Kurikulum</th>                    
                    </tr>
                  </thead>
                <tbody>
            <?php
            $query = $pdo->prepare("SELECT *
                                 FROM kurikulum 
                                 WHERE Identitas_ID=:ID AND Jurusan_ID=:Jurusan_ID
                                 ORDER BY Kode");
            $query->bindParam(':ID', $data->Identitas_ID, PDO::PARAM_INT); 
            $query->bindParam(':Jurusan_ID', $data->Jurusan_ID, PDO::PARAM_INT);
            $query->execute();
            while($r=$query->fetch(PDO::FETCH_OBJ)){

            $no++;
            echo"  <tr class='odd gradeX'>
                     <td width=10>$no</td>
                     <td width=10 align=center><a class=t href=\"form_baakademikmastermatakuliahact.php?page=baakademikmastermatakuliah&halaman=hapuskurikulum&key=$r->Kurikulum_ID\"
                      onClick=\"return confirm('Apakah Anda benar-benar akan menghapus matakuliah ini ?')\"><img src=../images/del.png></a></td>
                     <td width=10><a class=t href=?page=baakademikmastermatakuliah&halaman=editkurikulum&key=$r->Kurikulum_ID><img src=../images/edit.png></a></td>
                     <td>$r->Kode - $r->Nama</td>

                    </tr>";
            }
            ?>
              </table>
          </div>
        </div>
      </div>
  <?php                                                                                
  break;

  case "tambahkurikulum":
  ?>
  <div class="col-md-10">
    <div class="col-lg-12">                                                                              
        <div class="panel panel-primary bootstrap-admin-no-table-panel">                                                    
            <div class="panel-heading">
                <div class="text-muted bootstrap-admin-box-title" style="color:white;">Akademik | Tambah Kurikulum</div>
            </div>
      <?php
      echo"  <div class='bootstrap-admin-no-table-panel-content bootstrap-admin-panel-content collapse in'>

                   <fieldset>
                      <legend>Set Kurikulum</legend>";
      echo"  <form method='post' action='?page=baakademikmastermatakuliah&halaman=cari'>
             <input name='Kurikulum_ID' type=hidden value='$_POST[Kurikulum_ID]'>
             &nbsp; <button class='btn btn-xs btn-success'><i class='glyphicon glyphicon-arrow-left'></i> Kembali ke menu sebelumnya</button>
           </form>";  
                 echo" <div class='bootstrap-admin-no-table-panel-content bootstrap-admin-panel-content collapse in'>
                 <form class='form-horizontal' method='post' action='form_baakademikmastermatakuliahact.php?page=baakademikmastermatakuliah&halaman=simpankurikulum'>
                  <input name='ID' type=hidden value='$data->Identitas_ID'>
                  <input name='prodi' type=hidden value='$data->Jurusan_ID'>";
                 echo"<div class='form-group'>
                          <label class='col-lg-2 control-label' for='typeahead' style='font-size:13px;'>Tahun Kurikulum</label>
                          <div class='col-lg-10'>
                              <input name='Kode' style='width:120px; height:25px;' type='text' class='form-control col-md-6' id='typeahead' data-provide='typeahead' data-items='4'>
                          </div>
                      </div>
                     <div class='form-group'>
                          <label class='col-lg-2 control-label' for='typeahead' style='font-size:13px;'>Nama Kurikulum</label>
                          <div class='col-lg-10'>
                              <input name='Nama' style='width:300px; height:25px;' type='text' class='form-control col-md-6' id='typeahead' data-provide='typeahead' data-items='4'>
                          </div>
                      </div> 
                      <button type='submit' class='btn btn-sm btn-success'><i class='glyphicon glyphicon-ok'></i> Simpan Data</button>
                      <button type='reset' class='btn btn-sm btn-default'><i class='glyphicon glyphicon-repeat'></i> Batal</button>
                   </fieldset>
                 </form>
               </div>";
               ?>
            </div>
          </div>
    </div>    
  <?php
  break;
  
  case "tambahmatakuliah":
  ?>
  <div class="col-md-10">
    <div class="col-lg-12">                                                                              
        <div class="panel panel-primary bootstrap-admin-no-table-panel">                                                    
            <div class="panel-heading">
                <div class="text-muted bootstrap-admin-box-title" style="color:white;">Akademik | Tambah Matakuliah</div>
            </div>
      <?php
      echo"  <div class='bootstrap-admin-no-table-panel-content bootstrap-admin-panel-content collapse in'>
                 <form class='form-horizontal' method='post' action='form_baakademikmastermatakuliahact.php?page=baakademikmastermatakuliah&halaman=simpan'>
                  <input name='ID' type=hidden value='$data->Identitas_ID'>
                  <input name='prodi' type=hidden value='$data->Jurusan_ID'>
                   <fieldset>
                      <legend>Set Matakuliah</legend>";
                 echo"<div class='form-group'>                     
                       <label class='col-lg-2 control-label' for='select02' style='font-size:13px;'>Kurikulum</label>
                         <div class='col-lg-10'>
                          <select id='select03' class='selectize-select' style='width: 350px' name='Kurikulum_ID'>
                            <option value=0 selected>- Pilih Kurikulum -</option>";
                            $sql=$pdo->query("SELECT * FROM kurikulum WHERE Identitas_ID='$data->Identitas_ID' AND Jurusan_ID='$data->Jurusan_ID' order by Kode");
                            while($r=$sql->fetch(PDO::FETCH_OBJ)){ 
                                echo "<option value=".$r->Kurikulum_ID.">".$r->Kode." -- ".$r->Nama."</option>";
                            } 
                            echo "</select></div></div>";
                 echo"<div class='form-group'>                     
                       <label class='col-lg-2 control-label' for='select02' style='font-size:13px;'>Kelompok Matakuliah</label>
                         <div class='col-lg-10'>
                          <select id='select01' class='selectize-select' style='width: 350px;' name='KelompokMtk_ID'>
                            <option value=0 selected>- Pilih Kelompok MK -</option>";
                            $sql=$pdo->query("SELECT * FROM kelompokmtk");
                            while($r=$sql->fetch(PDO::FETCH_OBJ)){ 
                                echo "<option value=".$r->KelompokMtk_ID.">".$r->KelompokMtk_ID." -- ".$r->Nama."</option>";
                            }
                            echo "</select></div></div>";
                 echo"<div class='form-group'>                     
                       <label class='col-lg-2 control-label' for='select02' style='font-size:13px;'>Jenis Matakuliah</label>
                         <div class='col-lg-10'>
                          <select id='select01' class='selectize-select' style='width: 350px;' name='JenisMTK_ID'>
                            <option value=0 selected>- Pilih Jenis MK -</option>";
                            $sql=$pdo->query("SELECT * FROM jenismk");
                            while($r=$sql->fetch(PDO::FETCH_OBJ)){ 
                                echo "<option value=".$r->JenisMTK_ID.">".$r->JenisMTK_ID." -- ".$r->Nama."</option>";
                            }
                            echo "</select></div></div>";
                 echo"<div class='form-group'>                     
                       <label class='col-lg-2 control-label' for='select02' style='font-size:13px;'>Jenis Kurikulum MK</label>
                         <div class='col-lg-10'>
                          <select id='select01' class='selectize-select' style='width: 350px;' name='JenisKurikulum_ID'>
                            <option value=0 selected>- Pilih Jenis Kurikulum MK -</option>";
                            $sql=$pdo->query("SELECT * FROM jeniskurikulum");
                            while($r=$sql->fetch(PDO::FETCH_OBJ)){ 
                                echo "<option value=".$r->JenisKurikulum_ID.">".$r->JenisKurikulum_ID." -- ".$r->Nama."</option>";
                            }
                            echo "</select></div></div>";
                 echo"<div class='form-group'>
                          <label class='col-lg-2 control-label' for='typeahead' style='font-size:13px;'>Kode Matakuliah</label>
                          <div class='col-lg-10'>
                              <input name='Kode_mtk' style='width:120px; height:25px;' type='text' class='form-control col-md-6' id='typeahead' data-provide='typeahead' data-items='4'>
                          </div>
                      </div>
                     <div class='form-group'>
                          <label class='col-lg-2 control-label' for='typeahead' style='font-size:13px;'>Nama Matakuliah</label>
                          <div class='col-lg-10'>
                              <input name='Nama_matakuliah' style='width:300px; height:25px;' type='text' class='form-control col-md-6' id='typeahead' data-provide='typeahead' data-items='4'>
                          </div>
                      </div> 
                     <div class='form-group'>
                          <label class='col-lg-2 control-label' for='typeahead' style='font-size:13px;'>Nama English</label>
                          <div class='col-lg-10'>
                              <input name='Nama_english' style='width:300px; height:25px;' type='text' class='form-control col-md-6' id='typeahead' data-provide='typeahead' data-items='4'>
                          </div>
                      </div>  
                     <div class='form-group'>
                          <label class='col-lg-2 control-label' for='typeahead' style='font-size:13px;'>Semester</label>
                          <div class='col-lg-10'>
                              <input name='Semester' style='width:80px; height:25px;' type='text' class='form-control col-md-6' id='typeahead' data-provide='typeahead' data-items='4'>
                          </div>
                      </div>
                     <div class='form-group'>
                          <label class='col-lg-2 control-label' for='typeahead' style='font-size:13px;'>SKS</label>
                          <div class='col-lg-10'>
                              <input name='SKS' style='width:80px; height:25px;' type='text' class='form-control col-md-6' id='typeahead' data-provide='typeahead' data-items='4'>
                          </div>
                      </div>
                     <div class='form-group'>
                          <label class='col-lg-2 control-label' for='typeahead' style='font-size:13px;'>Penanggung Jawab</label>
                          <div class='col-lg-10'>
                              <input name='Penanggungjawab' style='width:300px; height:25px;' type='text' class='form-control col-md-6' id='typeahead' data-provide='typeahead' data-items='4'>
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
  
  case "editkurikulum":
  $query = $pdo->prepare("SELECT * FROM kurikulum WHERE	Kurikulum_ID='$_GET[key]'");
  $query->execute();
  $r=$query->fetch(PDO::FETCH_OBJ);

  echo"
  <div class='col-md-10'>
    <div class='col-lg-12'>                                                                              
        <div class='panel panel-primary bootstrap-admin-no-table-panel'>                                                    
            <div class='panel-heading'>
                <div class='text-muted bootstrap-admin-box-title' style='color:white;'>Akademik | Perbaharui Kurikulum</div>
            </div>
            <div class='bootstrap-admin-no-table-panel-content bootstrap-admin-panel-content collapse in'>

                   <fieldset>
                      <legend>Set Kurikulum</legend>";
      echo"  <form method='post' action='?page=baakademikmastermatakuliah&halaman=daftarkurikulum'>

             &nbsp; <button class='btn btn-xs btn-success'><i class='glyphicon glyphicon-arrow-left'></i> Kembali ke menu sebelumnya</button>
           </form>";  
                 echo"
<div class='bootstrap-admin-no-table-panel-content bootstrap-admin-panel-content collapse in'>
                 <form class='form-horizontal' method='post' action='form_baakademikmastermatakuliahact.php?page=baakademikmastermatakuliah&halaman=perbaharuikurikulum'>
                 <input type=hidden value='$r->Kurikulum_ID' name=key>";
                 echo"<div class='form-group'>
                          <label class='col-lg-2 control-label' for='typeahead' style='font-size:13px;'>Tahun Kurikulum</label>
                          <div class='col-lg-10'>
                              <input name='Kode' value='$r->Kode' style='width:120px; height:25px;' type='text' class='form-control col-md-6' id='typeahead' data-provide='typeahead' data-items='4'>
                          </div>
                      </div>
                     <div class='form-group'>
                          <label class='col-lg-2 control-label' for='typeahead' style='font-size:13px;'>Nama Kurikulum</label>
                          <div class='col-lg-10'>
                              <input name='Nama' value='$r->Nama' style='width:300px; height:25px;' type='text' class='form-control col-md-6' id='typeahead' data-provide='typeahead' data-items='4'>
                          </div>
                      </div>         
                      <button type='submit' class='btn btn-sm btn-success'><i class='glyphicon glyphicon-ok'></i> Perbaharui Data</button>
                      <button type='reset' class='btn btn-sm btn-default'><i class='glyphicon glyphicon-repeat'></i> Batal</button>";
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

  case "edit":
  $query = $pdo->prepare("SELECT * FROM matakuliah WHERE 	Matakuliah_ID='$_GET[key]'");
  $query->execute();
  $r=$query->fetch(PDO::FETCH_OBJ);

  echo"
  <div class='col-md-10'>
    <div class='col-lg-12'>                                                                              
        <div class='panel panel-primary bootstrap-admin-no-table-panel'>                                                    
            <div class='panel-heading'>
                <div class='text-muted bootstrap-admin-box-title' style='color:white;'>Akademik | Perbaharui Matakuliah</div>
            </div>
            <div class='bootstrap-admin-no-table-panel-content bootstrap-admin-panel-content collapse in'>
                 <form class='form-horizontal' method='post' action='form_baakademikmastermatakuliahact.php?page=baakademikmastermatakuliah&halaman=perbaharui'>
                 <input type=hidden value='$r->Matakuliah_ID' name=key>
                   <fieldset>
                      <legend>Set Matakuliah</legend>";
                 echo"<div class='form-group'>                     
                       <label class='col-lg-2 control-label' for='select02' style='font-size:13px;'>Kurikulum</label>
                         <div class='col-lg-10'>
                          <select id='select03' class='selectize-select' style='width: 350px' name='Kurikulum_ID'>
                            <option value=0 selected>- Pilih Kurikulum -</option>";
                            $sql=$pdo->query("SELECT * FROM kurikulum WHERE Identitas_ID='$data->Identitas_ID' AND Jurusan_ID='$data->Jurusan_ID'");
                            while($w=$sql->fetch(PDO::FETCH_OBJ)){ 
                               if (("".$w->Kurikulum_ID."")==("".$r->Kurikulum_ID."")){
                                  echo "<option value=".$w->Kurikulum_ID." selected>".$w->Kode." -- ".$w->Nama."</option>";
                              }else{
                                  echo "<option value=".$w->Kurikulum_ID.">".$w->Kode." -- ".$w->Nama."</option>";                           
                              }
                            }
                            echo "</select></div></div>";
                 echo"<div class='form-group'>                     
                       <label class='col-lg-2 control-label' for='select02' style='font-size:13px;'>Kelompok Matakuliah</label>
                         <div class='col-lg-10'>
                          <select id='select01' class='selectize-select' style='width: 350px;' name='KelompokMtk_ID'>
                            <option value=0 selected>- Pilih Kelompok MK -</option>";
                            $sql=$pdo->query("SELECT * FROM kelompokmtk");
                            while($w=$sql->fetch(PDO::FETCH_OBJ)){ 
                               if (("".$w->KelompokMtk_ID."")==("".$r->KelompokMtk_ID."")){
                                echo "<option value=".$w->KelompokMtk_ID." selected>".$w->KelompokMtk_ID." -- ".$w->Nama."</option>";
                            }else{
                                echo "<option value=".$w->KelompokMtk_ID.">".$w->KelompokMtk_ID." -- ".$w->Nama."</option>";
                            }}

                            echo "</select></div></div>";
                 echo"<div class='form-group'>                     
                       <label class='col-lg-2 control-label' for='select02' style='font-size:13px;'>Jenis Matakuliah</label>
                         <div class='col-lg-10'>
                          <select id='select01' class='selectize-select' style='width: 350px;' name='JenisMTK_ID'>
                            <option value=0 selected>- Pilih Jenis MK -</option>";
                            $sql=$pdo->query("SELECT * FROM jenismk");
                            while($w=$sql->fetch(PDO::FETCH_OBJ)){ 
                                if (("".$w->JenisMTK_ID."")==("".$r->JenisMTK_ID."")){
                                echo "<option value=".$w->JenisMTK_ID." selected>".$w->JenisMTK_ID." -- ".$w->Nama."</option>";
                              }else{
                                echo "<option value=".$w->JenisMTK_ID.">".$w->JenisMTK_ID." -- ".$w->Nama."</option>";                             
                              }
                            }
                            echo "</select></div></div>";
                 echo"<div class='form-group'>                     
                       <label class='col-lg-2 control-label' for='select02' style='font-size:13px;'>Jenis Kurikulum MK</label>
                         <div class='col-lg-10'>
                          <select id='select01' class='selectize-select' style='width: 350px;' name='JenisKurikulum_ID'>
                            <option value=0 selected>- Pilih Jenis Kurikulum MK -</option>";
                            $sql=$pdo->query("SELECT * FROM jeniskurikulum");
                            while($w=$sql->fetch(PDO::FETCH_OBJ)){ 
                              if (("".$w->JenisKurikulum_ID."")==("".$r->JenisKurikulum_ID."")){ 
                                echo "<option value=".$w->JenisKurikulum_ID." selected>".$w->JenisKurikulum_ID." -- ".$w->Nama."</option>";
                              }else{
                                echo "<option value=".$w->JenisKurikulum_ID.">".$w->JenisKurikulum_ID." -- ".$w->Nama."</option>";                             
                              }
                            }
 
                            echo "</select></div></div>";
                 echo"<div class='form-group'>                     
                       <label class='col-lg-2 control-label' for='select02' style='font-size:13px;'>Status MK</label>
                         <div class='col-lg-10'>
                          <select id='select01' class='selectize-select' style='width: 350px;' name='StatusMtk_ID'>
                            <option value=0 selected>- Pilih Status MK -</option>";
                            $sql=$pdo->query("SELECT * FROM statusmtk");
                            while($w=$sql->fetch(PDO::FETCH_OBJ)){ 
                              if (("".$w->StatusMtk_ID."")==("".$r->StatusMtk_ID."")){ 
                                echo "<option value=".$w->StatusMtk_ID." selected>".$w->StatusMtk_ID." -- ".$w->Nama."</option>";
                              }else{
                                echo "<option value=".$w->StatusMtk_ID.">".$w->StatusMtk_ID." -- ".$w->Nama."</option>";                             
                              }
                            }
                            echo "</select></div></div>";
                 echo"<div class='form-group'>
                          <label class='col-lg-2 control-label' for='typeahead' style='font-size:13px;'>Kode Matakuliah</label>
                          <div class='col-lg-10'>
                              <input name='Kode_mtk' value='$r->Kode_mtk' style='width:120px; height:25px;' type='text' class='form-control col-md-6' id='typeahead' data-provide='typeahead' data-items='4'>
                          </div>
                      </div>
                     <div class='form-group'>
                          <label class='col-lg-2 control-label' for='typeahead' style='font-size:13px;'>Nama Matakuliah</label>
                          <div class='col-lg-10'>
                              <input name='Nama_matakuliah' value='$r->Nama_matakuliah' style='width:300px; height:25px;' type='text' class='form-control col-md-6' id='typeahead' data-provide='typeahead' data-items='4'>
                          </div>
                      </div> 
                     <div class='form-group'>
                          <label class='col-lg-2 control-label' for='typeahead' style='font-size:13px;'>Nama English</label>
                          <div class='col-lg-10'>
                              <input name='Nama_english' value='$r->Nama_english' style='width:300px; height:25px;' type='text' class='form-control col-md-6' id='typeahead' data-provide='typeahead' data-items='4'>
                          </div>
                      </div>  
                     <div class='form-group'>
                          <label class='col-lg-2 control-label' for='typeahead' style='font-size:13px;'>Semester</label>
                          <div class='col-lg-10'>
                              <input name='Semester' value='$r->Semester' style='width:80px; height:25px;' type='text' class='form-control col-md-6' id='typeahead' data-provide='typeahead' data-items='4'>
                          </div>
                      </div>
                     <div class='form-group'>
                          <label class='col-lg-2 control-label' for='typeahead' style='font-size:13px;'>SKS</label>
                          <div class='col-lg-10'>
                              <input name='SKS' value='$r->SKS' style='width:80px; height:25px;' type='text' class='form-control col-md-6' id='typeahead' data-provide='typeahead' data-items='4'>
                          </div>
                      </div>
                     <div class='form-group'>
                          <label class='col-lg-2 control-label' for='typeahead' style='font-size:13px;'>Penanggung Jawab</label>
                          <div class='col-lg-10'>
                              <input name='Penanggungjawab' value='$r->Penanggungjawab' style='width:300px; height:25px;' type='text' class='form-control col-md-6' id='typeahead' data-provide='typeahead' data-items='4'>
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
