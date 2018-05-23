<?php 
switch($_GET['halaman']){
     
  default:       
  ?>
    <div class="col-md-10"> 
        <div class="col-lg-12">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <div class="text-muted bootstrap-admin-box-title" style="color:white;">Administrator | Admin Administrator</div>
            </div>
              <div class="bootstrap-admin-panel-content">                   
           <?php
          echo"
                <table class='table table-striped' style='font-size:13px;''>
                  <form method='post' action='?page=adminadministrator&halaman=tambahadmin'> 
                       &nbsp; <button class='btn btn-xs btn-success' type='submit'><i class='glyphicon glyphicon-plus'></i> Tambah Administrator</button>                    
                  </form>                                          
                </table> <br />"; 
                ?>
          <body class="bootstrap-admin-with-small-navbar">
              <table  class="table table-hover" id="example" style="font-size:12px;">
                  <thead>
                    <tr style="background-color:#3e8bda; color:white;">
                      <th>No</th><th>Del</th><th>Edi</th><th>Username<th>Nama Lengkap</th><th>Keterangan</th><th>Email</th><th>Telepon</th>                    
                    </tr>
                  </thead>
                <tbody>
            <?php
          	$query= mysql_query("SELECT *
                                 FROM admin");
          	while ($r=mysql_fetch_array($query)){

            $no++;
            echo"  <tr class='odd gradeX'><td>$no</td>
                     <td width=10 align=center><a class=t href=\"form_adminadministratoract.php?page=adminadministrator&halaman=hapus&key=$r[ID]\"
                      onClick=\"return confirm('Apakah Anda benar-benar akan menghapus admin ini ?')\"><img src=../images/del.png></a></td>
                     <td width=10><a class=t href=?page=adminadministrator&halaman=edit&key=$r[ID]><img src=../images/edit.png></a></td>
                     <td>$r[username] </td>
                     <td>$r[nama_lengkap]</td>
                     <td>$r[keterangan]</td>
                     <td>$r[email]</td>
                     <td>$r[telepon]</td>
                    </tr>";
            }
            ?>
              </table>
          </div>
        </div>
      </div>
  <?php                                                                                
  break;  

  
  case "tambahadmin":
  ?>
  <div class="col-md-10">
    <div class="col-lg-12">                                                                              
        <div class="panel panel-primary bootstrap-admin-no-table-panel">                                                    
            <div class="panel-heading">
                <div class="text-muted bootstrap-admin-box-title" style="color:white;">Administrator | Tambah Administrator</div>
            </div>
      <?php
      echo"  <div class='bootstrap-admin-no-table-panel-content bootstrap-admin-panel-content collapse in'>
                 <form class='form-horizontal' method='post' action='form_adminadministratoract.php?page=adminadministrator&halaman=simpan' enctype='multipart/form-data'>
                   <input type='hidden' name='ukuran_maks_file' value='50000'>
                   <fieldset>
                      <legend>Set Administrator</legend>";
                 echo"<div class='form-group'>
                          <label class='col-lg-2 control-label' for='typeahead' style='font-size:13px;'>Username</label>
                          <div class='col-lg-10'>
                              <input name='username' style='width:190px; height:25px;' type='text' class='form-control col-md-6' id='typeahead' data-provide='typeahead' data-items='4'>
                          </div>
                      </div>
                      <div class='form-group'>
                          <label class='col-lg-2 control-label' for='typeahead' style='font-size:13px;'>Password</label>
                          <div class='col-lg-10'>
                              <input name='password' style='width:190px; height:25px;' type='text' class='form-control col-md-6' id='typeahead' data-provide='typeahead' data-items='4'>
                          </div>
                      </div>
                      <div class='form-group'>
                          <label class='col-lg-2 control-label' for='typeahead' style='font-size:13px;'>Nama Lengkap</label>
                          <div class='col-lg-10'>
                              <input name='nama_lengkap' style='width:190px; height:25px;' type='text' class='form-control col-md-6' id='typeahead' data-provide='typeahead' data-items='4'>
                          </div>
                      </div>
                      <div class='form-group'>
                          <label class='col-lg-2 control-label' for='typeahead' style='font-size:13px;'>Keterangan</label>
                          <div class='col-lg-10'>
                              <input name='keterangan' style='width:190px; height:25px;' type='text' class='form-control col-md-6' id='typeahead' data-provide='typeahead' data-items='4'>
                          </div>
                      </div>
                      <div class='form-group'>
                          <label class='col-lg-2 control-label' for='typeahead' style='font-size:13px;'>Email</label>
                          <div class='col-lg-10'>
                              <input name='email' style='width:190px; height:25px;' type='text' class='form-control col-md-6' id='typeahead' data-provide='typeahead' data-items='4'>                          
                          </div>
                      </div>
                      <div class='form-group'>
                          <label class='col-lg-2 control-label' for='typeahead' style='font-size:13px;'>Telepon</label>
                          <div class='col-lg-10'>
                              <input name='telepon' style='width:190px; height:25px;' type='text' class='form-control col-md-6' id='typeahead' data-provide='typeahead' data-items='4'>                          
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


  case "edit":
  $e=mysql_query("SELECT * FROM admin WHERE ID='$_GET[key]'");
  $r=mysql_fetch_array($e);
  
  echo"
  <div class='col-md-10'>
    <div class='col-lg-12'>                                                                              
        <div class='panel panel-primary bootstrap-admin-no-table-panel'>                                                    
            <div class='panel-heading'>
                <div class='text-muted bootstrap-admin-box-title' style='color:white;'>Administrator | Perbaharui Data Administrator</div>
            </div><br />
            <form method='post' action='?page=adminadministrator'> 
              <table class='table table-striped' style='font-size:13px;''>
                &nbsp;<button class='btn btn-xs btn-success' type='submit'><i class='glyphicon glyphicon-share-alt'></i> Kembali ke menu awal</button>                    
              </form></table>
            <div class='bootstrap-admin-no-table-panel-content bootstrap-admin-panel-content collapse in'>
                 <form class='form-horizontal' method='post' action='form_adminadministratoract.php?page=adminadministrator&halaman=perbaharui' enctype='multipart/form-data'>
                   <input type='hidden' name='ukuran_maks_file' value='50000'>
                 <input type=hidden value='$r[ID]' name=key>
                   <fieldset>
                      <legend>Set Administrator</legend>";
                 echo"<div class='form-group'>
                          <label class='col-lg-2 control-label' for='typeahead' style='font-size:13px;'>Username</label>
                          <div class='col-lg-10'>
                              <input name='username' value='$r[username]' style='width:190px; height:25px;' type='text' class='form-control col-md-6' id='typeahead' data-provide='typeahead' data-items='4'>
                          </div>
                      </div>
                      <div class='form-group'>
                          <label class='col-lg-2 control-label' for='typeahead' style='font-size:13px;'>Password</label>
                          <div class='col-lg-10'>
                              <input name='password' style='width:190px; height:25px;' type='text' class='form-control col-md-6' id='typeahead' data-provide='typeahead' data-items='4'> * Kosongkan jika tidak diubah
                          </div>
                      </div>
                      <div class='form-group'>
                          <label class='col-lg-2 control-label' for='typeahead' style='font-size:13px;'>Nama Lengkap</label>
                          <div class='col-lg-10'>
                              <input name='nama_lengkap' value='$r[nama_lengkap]' style='width:190px; height:25px;' type='text' class='form-control col-md-6' id='typeahead' data-provide='typeahead' data-items='4'>
                          </div>
                      </div>
                      <div class='form-group'>
                          <label class='col-lg-2 control-label' for='typeahead' style='font-size:13px;'>Keterangan</label>
                          <div class='col-lg-10'>
                              <input name='keterangan' value='$r[keterangan]' style='width:190px; height:25px;' type='text' class='form-control col-md-6' id='typeahead' data-provide='typeahead' data-items='4'>
                          </div>
                      </div>
                      <div class='form-group'>
                          <label class='col-lg-2 control-label' for='typeahead' style='font-size:13px;'>Email</label>
                          <div class='col-lg-10'>
                              <input name='email' value='$r[email]' style='width:290px; height:25px;' type='text' class='form-control col-md-6' id='typeahead' data-provide='typeahead' data-items='4'>                          
                          </div>
                      </div>
                      <div class='form-group'>
                          <label class='col-lg-2 control-label' for='typeahead' style='font-size:13px;'>Telepon</label>
                          <div class='col-lg-10'>
                              <input name='telepon' value='$r[telepon]' style='width:190px; height:25px;' type='text' class='form-control col-md-6' id='typeahead' data-provide='typeahead' data-items='4'>                          
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
                 </form>
               </div>
            </div>
          </div>
    </div>";
  break;

}
?>
