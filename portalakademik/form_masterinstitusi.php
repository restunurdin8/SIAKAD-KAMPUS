<?php
switch($_GET['halaman']){
     
  default:    
  ?>             
    <div class="col-md-10"> 
        <div class="col-lg-12">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <div class="text-muted bootstrap-admin-box-title" style="color:white;">Administrator | Master Identitas Institusi</div>
            </div>
              <div class="bootstrap-admin-panel-content">                   
                <form method="post" action="?page=masterinstitusi&halaman=tambah">
                  <table class="table table-striped" style="font-size:13px;">
                  <?php
                  echo"   <tr><td> <button class='btn btn-xs btn-success' type='submit'><i class='glyphicon glyphicon-plus'></i> Tambah Institusi</button></tr></td>";
                  ?>
                </table> <br />
                </form>
  
        <body class="bootstrap-admin-with-small-navbar">
            <table class="table table-striped table-bordered" style="font-size:12px;">
                <thead>
                  <tr style="background-color:#3e8bda; color:white;">
                      <th>No</th><th>Kode Institusi</th><th>Nama Institusi</th><th>Kode Hukum</th><th>Tgl Berdiri</th>
                      <th>Alamat</th><th>#</th><th>#</th>                    
                  </tr>
                </thead>
            <?php
          	$query= mysql_query("SELECT * FROM identitas");
          	while ($r=mysql_fetch_array($query)){
          	$TglMulai = tgl_indo($r[TglMulai]);
            $no++;
            echo"  <tr class='odd gradeX'><td>$no</td>
                     <td>$r[Identitas_ID]</td>
                     <td>$r[Nama_Identitas]</td>
                     <td>$r[KodeHukum]</td>
                     <td>$TglMulai</td>
                     <td>$r[Alamat1]</td>
                     <td width=90><form method='post' action='?page=masterinstitusi&halaman=edit'>
                                    <input name='ID' type=hidden value='$r[ID]'>
                      <button class='btn btn-xs btn-primary' style='height:27px;'>
                         <i class='glyphicon glyphicon-pencil'></i> Edit
                      </button>
                     </a></td></form>
                     <td width=90><form method='post' action='form_masterinstitusiact.php?page=masterinstitusi&halaman=hapus'>
                                    <input name='key' type=hidden value='$r[ID]'>
                      <button class='btn btn-xs btn-danger' style='height:27px;'>
                         <i class='glyphicon glyphicon-remove'></i> Hapus
                      </button>
                     </a></td></form>
                    </tr>";
            }
            ?>                
             </table>
            </div>
          </div>
        </div>
      </div>
  </body>
  </html>

  <?php
  break;
  
  case "tambah":
  ?>
  <div class="col-md-10">
    <div class="col-lg-12">                                                                              
        <div class="panel panel-primary bootstrap-admin-no-table-panel">                                                    
            <div class="panel-heading">
                <div class="text-muted bootstrap-admin-box-title" style="color:white;">Administrator | Master Identitas Institusi</div>
            </div>
            <div class="bootstrap-admin-no-table-panel-content bootstrap-admin-panel-content collapse in">
            <?php
            echo"<form class='form-horizontal' method='post' action='form_masterinstitusiact.php?page=masterinstitusi&halaman=simpan'>
                   <fieldset>
                      <legend>Set Identitas Institusi</legend>
                      <div class='form-group'>
                          <label class='col-lg-2 control-label' for='typeahead' style='font-size:13px;'>Kode Institusi</label>
                          <div class='col-lg-10'>
                              <input name='Identitas_ID' style='width:80px; height:25px;' type='text' class='form-control col-md-6' id='typeahead' autocomplete='off' data-provide='typeahead' data-items='4'>
                          </div>
                      </div>
                      <div class='form-group'>
                          <label class='col-lg-2 control-label' for='typeahead' style='font-size:13px;'>Kode Hukum</label>
                          <div class='col-lg-10'>
                              <input name='KodeHukum' style='width:450px; height:25px;' type='text' class='form-control col-md-6' id='typeahead' autocomplete='off' data-provide='typeahead' data-items='4'>
                          </div>
                      </div> 
                      <div class='form-group'>
                          <label class='col-lg-2 control-label' for='typeahead' style='font-size:13px;'>Nama Institusi</label>
                          <div class='col-lg-10'>
                              <input name='Nama_Identitas' style='width:450px; height:25px;' type='text' class='form-control col-md-6' id='typeahead' autocomplete='off' data-provide='typeahead' data-items='4'>
                          </div>
                      </div> 
                      <div class='form-group'>
                          <label class='col-lg-2 control-label' for='date01' style='font-size:13px;'>Tgl Berdiri</label>
                          <div class='col-lg-10'>
                              <input style='width:150px; height:25px;' type='text' class='form-control datepicker' id='date01' name='TglMulai'>
                          </div>
                      </div>
                      <div class='form-group'>
                          <label class='col-lg-2 control-label' for='typeahead' style='font-size:13px;'>Alamat Institusi</label>
                          <div class='col-lg-10'>
                              <input name='Alamat1' style='width:450px; height:25px;' type='text' class='form-control col-md-6' id='typeahead' autocomplete='off' data-provide='typeahead' data-items='4'>
                          </div>
                      </div>";
                      ?>
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
  $e=mysql_query("SELECT * FROM identitas WHERE ID='$_POST[ID]'");
  $r=mysql_fetch_array($e);

  $TglMulai=sprintf("%02d/%02d/%02d",substr($r['TglMulai'], 5,2),substr($r['TglMulai'], 8,2),substr($r['TglMulai'], 0,4));

  echo"
  <div class='col-md-10'>
    <div class='col-lg-12'>                                                                              
        <div class='panel panel-primary bootstrap-admin-no-table-panel'>                                                    
            <div class='panel-heading'>
                <div class='text-muted bootstrap-admin-box-title' style='color:white;'>Administrator | Master Identitas Institusi</div>
            </div>
            <div class='bootstrap-admin-no-table-panel-content bootstrap-admin-panel-content collapse in'>
                 <form class='form-horizontal' method='post' action='form_masterinstitusiact.php?page=masterinstitusi&halaman=perbaharui'>
                 <input type=hidden value='$r[ID]' name=key>
                   <fieldset>
                      <legend>Set Identitas Institusi</legend>
                      <div class='form-group'>
                          <label class='col-lg-2 control-label' for='typeahead' style='font-size:13px;'>Kode Institusi</label>
                          <div class='col-lg-10'>
                              <input name='Identitas_ID' value='$r[Identitas_ID]' style='width:80px; height:25px;' type='text' class='form-control col-md-6' id='typeahead' autocomplete='off' data-provide='typeahead' data-items='4'>
                          </div>
                      </div>
                      <div class='form-group'>
                          <label class='col-lg-2 control-label' for='typeahead' style='font-size:13px;'>Kode Hukum</label>
                          <div class='col-lg-10'>
                              <input name='KodeHukum' value='$r[KodeHukum]' style='width:450px; height:25px;' type='text' class='form-control col-md-6' id='typeahead' autocomplete='off' data-provide='typeahead' data-items='4'>
                          </div>
                      </div> 
                      <div class='form-group'>
                          <label class='col-lg-2 control-label' for='typeahead' style='font-size:13px;'>Nama Institusi</label>
                          <div class='col-lg-10'>
                              <input name='Nama_Identitas' value='$r[Nama_Identitas]' style='width:450px; height:25px;' type='text' class='form-control col-md-6' id='typeahead' autocomplete='off' data-provide='typeahead' data-items='4'>
                          </div>
                      </div> 
                      <div class='form-group'>
                          <label class='col-lg-2 control-label' for='date01' style='font-size:13px;'>Tgl Berdiri</label>
                          <div class='col-lg-10'>
                              <input style='width:150px; value='$TglMulai' height:25px;' type='text' class='form-control datepicker' id='date01' name='TglMulai'>
                          </div>
                      </div>
                      <div class='form-group'>
                          <label class='col-lg-2 control-label' for='typeahead' style='font-size:13px;'>Alamat Institusi</label>
                          <div class='col-lg-10'>
                              <input name='Alamat1' value='$r[Alamat1]' style='width:450px; height:25px;' type='text' class='form-control col-md-6' id='typeahead' autocomplete='off' data-provide='typeahead' data-items='4'>
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
