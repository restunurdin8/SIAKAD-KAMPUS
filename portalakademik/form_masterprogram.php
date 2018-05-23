<?php
switch($_GET['halaman']){
     
  default:    
  ?>             
    <div class="col-md-10"> 
        <div class="col-lg-12">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <div class="text-muted bootstrap-admin-box-title" style="color:white;">Administrator | Master Program</div>
            </div>
              <div class="bootstrap-admin-panel-content">                   
                <form method="post" action="?page=masterprogram&halaman=tambah">
                  <table class="table table-striped" style="font-size:13px;">
                  <?php
                  echo"   <tr><td> <button class='btn btn-xs btn-success' type='submit'><i class='glyphicon glyphicon-plus'></i> Tambah Program</button></tr></td>";
                  ?>
                </table> <br />
                </form>
  
        <body class="bootstrap-admin-with-small-navbar">
            <table class="table table-striped table-bordered" style="font-size:12px;">
                <thead>
                  <tr style="background-color:#3e8bda; color:white;">
                      <th>No</th><th>Kode Institusi</th><th>Kode Program</th><th>Nama Program</th>
                      <th>#</th><th>#</th>                    
                  </tr>
                </thead>
            <?php
          	$query= mysql_query("SELECT * FROM program");
          	while ($r=mysql_fetch_array($query)){
            $no++;
            echo"  <tr class='odd gradeX'><td>$no</td>
                     <td>$r[Identitas_ID]</td>
                     <td>$r[Program_ID]</td>
                     <td>$r[nama_program]</td>
                     <td width=50><form method='post' action='?page=masterprogram&halaman=edit'>
                                    <input name='ID' type=hidden value='$r[ID]'>
                      <button class='btn btn-xs btn-primary' style='height:27px;'>
                         <i class='glyphicon glyphicon-pencil'></i> Edit
                      </button>
                     </a></td></form>
                     <td width=90><form method='post' action='form_masterprogramact.php?page=masterprogram&halaman=hapus'>
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
                <div class="text-muted bootstrap-admin-box-title" style="color:white;">Administrator | Master Program</div>
            </div>
            <div class="bootstrap-admin-no-table-panel-content bootstrap-admin-panel-content collapse in">
            <?php
            echo"<form class='form-horizontal' method='post' action='form_masterprogramact.php?page=masterprogram&halaman=simpan'>
                   <fieldset>
                      <legend>Set Program</legend>";
                 echo"<div class='form-group'>                     
                       <label class='col-lg-2 control-label' for='select02' style='font-size:13px;'>Institusi</label>
                         <div class='col-lg-10'>
                          <select id='select01' class='selectize-select' style='width: 350px;' name='Identitas_ID'>
                            <option value=0 selected>- Pilih Institusi -</option>";
                            $tampil=mysql_query("SELECT * FROM identitas");
                            while($r=mysql_fetch_array($tampil)){
                                echo "<option value=$r[Identitas_ID]>$r[Identitas_ID] -- $r[Nama_Identitas]</option>";
                            }
                            echo "</select></div></div>";
                  echo"<div class='form-group'>
                          <label class='col-lg-2 control-label' for='typeahead' style='font-size:13px;'>Kode Program</label>
                          <div class='col-lg-10'>
                              <input name='Program_ID' style='width:450px; height:25px;' type='text' class='form-control col-md-6' id='typeahead' autocomplete='off' data-provide='typeahead' data-items='4'>
                          </div>
                      </div> 
                      <div class='form-group'>
                          <label class='col-lg-2 control-label' for='typeahead' style='font-size:13px;'>Nama Program</label>
                          <div class='col-lg-10'>
                              <input name='nama_program' style='width:450px; height:25px;' type='text' class='form-control col-md-6' id='typeahead' autocomplete='off' data-provide='typeahead' data-items='4'>
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
  $e=mysql_query("SELECT * FROM program WHERE ID='$_POST[ID]'");
  $r=mysql_fetch_array($e);


  echo"
  <div class='col-md-10'>
    <div class='col-lg-12'>                                                                              
        <div class='panel panel-primary bootstrap-admin-no-table-panel'>                                                    
            <div class='panel-heading'>
                <div class='text-muted bootstrap-admin-box-title' style='color:white;'>Administrator | Master Program</div>
            </div>
            <div class='bootstrap-admin-no-table-panel-content bootstrap-admin-panel-content collapse in'>
                 <form class='form-horizontal' method='post' action='form_masterprogramact.php?page=masterprogram&halaman=ubah'>
                 <input type=hidden value='$r[ID]' name=key>
                   <fieldset>
                      <legend>Set Program</legend>";
                 echo"<div class='form-group'>                     
                       <label class='col-lg-2 control-label' for='select02' style='font-size:13px;'>Institusi</label>
                         <div class='col-lg-10'>
                          <select id='select01' class='selectize-select' style='width: 350px;' name='Identitas_ID'>
                            <option value=0 selected>- Pilih Institusi -</option>";
                            $tampil=mysql_query("SELECT * FROM identitas");
                            while($w=mysql_fetch_array($tampil)){
                                if ($w[Identitas_ID]==$r[Identitas_ID]){
                                echo "<option value=$w[Identitas_ID] selected>$w[Identitas_ID] -- $w[Nama_Identitas]</option>";
                              }else{
                                 echo "<option value=$w[Identitas_ID]>$w[Identitas_ID] -- $w[Nama_Identitas]</option>";                           
                              }
                            }
                            echo "</select></div></div>";
                  echo"<div class='form-group'>
                          <label class='col-lg-2 control-label' for='typeahead' style='font-size:13px;'>Kode Program</label>
                          <div class='col-lg-10'>
                              <input name='Program_ID' value='$r[Program_ID]' style='width:450px; height:25px;' type='text' class='form-control col-md-6' id='typeahead' autocomplete='off' data-provide='typeahead' data-items='4'>
                          </div>
                      </div> 
                      <div class='form-group'>
                          <label class='col-lg-2 control-label' for='typeahead' style='font-size:13px;'>Nama Program</label>
                          <div class='col-lg-10'>
                              <input name='nama_program' value='$r[nama_program]' style='width:450px; height:25px;' type='text' class='form-control col-md-6' id='typeahead' autocomplete='off' data-provide='typeahead' data-items='4'>
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
