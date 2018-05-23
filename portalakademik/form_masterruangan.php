<?php
switch($_GET['halaman']){
     
  default:    
  ?>             
    <div class="col-md-10"> 
        <div class="col-lg-12">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <div class="text-muted bootstrap-admin-box-title" style="color:white;">Administrator | Master Ruangan</div>
            </div>
              <div class="bootstrap-admin-panel-content">                   
                <form method="post" action="?page=masterruangan&halaman=tambah">
                  <table class="table table-striped" style="font-size:13px;">
                  <?php
                  echo"   <tr><td> <button class='btn btn-xs btn-success' type='submit'><i class='glyphicon glyphicon-plus'></i> Tambah Ruangan</button></tr></td>";
                  ?>
                </table> <br />
                </form>
  
        <body class="bootstrap-admin-with-small-navbar">
            <table class="table table-striped table-bordered" style="font-size:12px;">
                <thead>
                  <tr style="background-color:#3e8bda; color:white;">
                      <th>No</th><th>Kode Kampus</th><th>Kode Ruangan</th><th>Nama Ruangan</th><th>Lantai</th>
                      <th>Kapasitas</th><th>#</th><th>#</th>                    
                  </tr>
                </thead>
            <?php
          	$query= mysql_query("SELECT * FROM ruang");
          	while ($r=mysql_fetch_array($query)){
            $no++;
            echo"  <tr class='odd gradeX'><td>$no</td>
                     <td>$r[Kampus_ID]</td>
                     <td>$r[Ruang_ID]</td>
                     <td>$r[Nama]</td>
                     <td>$r[Lantai]</td>
                     <td>$r[Kapasitas]</td> 
                     <td width=50><form method='post' action='?page=masterruangan&halaman=edit'>
                                    <input name='ID' type=hidden value='$r[ID]'>
                      <button class='btn btn-xs btn-primary' style='height:27px;'>
                         <i class='glyphicon glyphicon-pencil'></i> Edit
                      </button>
                     </a></td></form>
                     <td width=90><form method='post' action='form_masterruanganact.php?page=masterruangan&halaman=hapus'>
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
                <div class="text-muted bootstrap-admin-box-title" style="color:white;">Administrator | Master Ruangan</div>
            </div>
            <div class="bootstrap-admin-no-table-panel-content bootstrap-admin-panel-content collapse in">
            <?php
            echo"<form class='form-horizontal' method='post' action='form_masterruanganact.php?page=masterruangan&halaman=simpan'>
                   <fieldset>
                      <legend>Set Ruangan</legend>";
                 echo"<div class='form-group'>                     
                       <label class='col-lg-2 control-label' for='select02' style='font-size:13px;'>Kampus</label>
                         <div class='col-lg-10'>
                          <select id='select01' class='selectize-select' style='width: 350px;' name='Kampus_ID'>
                            <option value=0 selected>- Pilih Kampus -</option>";
                            $tampil=mysql_query("SELECT * FROM kampus");
                            while($r=mysql_fetch_array($tampil)){
                                echo "<option value=$r[ID]>$r[Kampus_ID] -- $r[Nama]</option>";
                            }
                            echo "</select></div></div>";
                  echo"<div class='form-group'>
                          <label class='col-lg-2 control-label' for='typeahead' style='font-size:13px;'>Kode Ruangan</label>
                          <div class='col-lg-10'>
                              <input name='Ruang_ID' style='width:450px; height:25px;' type='text' class='form-control col-md-6' id='typeahead' autocomplete='off' data-provide='typeahead' data-items='4'>
                          </div>
                      </div> 
                      <div class='form-group'>
                          <label class='col-lg-2 control-label' for='typeahead' style='font-size:13px;'>Nama Ruangan</label>
                          <div class='col-lg-10'>
                              <input name='Nama' style='width:450px; height:25px;' type='text' class='form-control col-md-6' id='typeahead' autocomplete='off' data-provide='typeahead' data-items='4'>
                          </div>
                      </div>
                      <div class='form-group'>
                          <label class='col-lg-2 control-label' for='typeahead' style='font-size:13px;'>Lantai</label>
                          <div class='col-lg-10'>
                              <input name='Lantai' style='width:450px; height:25px;' type='text' class='form-control col-md-6' id='typeahead' autocomplete='off' data-provide='typeahead' data-items='4'>
                          </div>
                      </div>
                      <div class='form-group'>
                          <label class='col-lg-2 control-label' for='typeahead' style='font-size:13px;'>Kapasitas</label>
                          <div class='col-lg-10'>
                              <input name='Kapasitas' style='width:450px; height:25px;' type='text' class='form-control col-md-6' id='typeahead' autocomplete='off' data-provide='typeahead' data-items='4'>
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
  $e=mysql_query("SELECT * FROM ruang WHERE ID='$_POST[ID]'");
  $r=mysql_fetch_array($e);


  echo"
  <div class='col-md-10'>
    <div class='col-lg-12'>                                                                              
        <div class='panel panel-primary bootstrap-admin-no-table-panel'>                                                    
            <div class='panel-heading'>
                <div class='text-muted bootstrap-admin-box-title' style='color:white;'>Administrator | Master Ruangan</div>
            </div>
            <div class='bootstrap-admin-no-table-panel-content bootstrap-admin-panel-content collapse in'>
                 <form class='form-horizontal' method='post' action='form_masterruanganact.php?page=masterruangan&halaman=ubah'>
                 <input type=hidden value='$r[ID]' name=key>
                   <fieldset>
                      <legend>Set Ruangan</legend>";
                 echo"<div class='form-group'>                     
                       <label class='col-lg-2 control-label' for='select02' style='font-size:13px;'>Kampus</label>
                         <div class='col-lg-10'>
                          <select id='select01' class='selectize-select' style='width: 350px;' name='Kampus_ID'>
                            <option value=0 selected>- Pilih Kampus -</option>";
                            $tampil=mysql_query("SELECT * FROM kampus");
                            while($w=mysql_fetch_array($tampil)){
                                if ($w[ID]==$r[ID]){
                                echo "<option value=$w[Kampus_ID] selected>$w[Kampus_ID] -- $w[Nama]</option>";
                              }else{
                                 echo "<option value=$w[Kampus_ID]>$w[Kampus_ID] -- $w[Nama]</option>";                           
                              }
                            }
                            echo "</select></div></div>";
                  echo"<div class='form-group'>
                          <label class='col-lg-2 control-label' for='typeahead' style='font-size:13px;'>Kode Ruangan</label>
                          <div class='col-lg-10'>
                              <input name='Ruang_ID' value='$r[Ruang_ID]' style='width:450px; height:25px;' type='text' class='form-control col-md-6' id='typeahead' autocomplete='off' data-provide='typeahead' data-items='4'>
                          </div>
                      </div> 
                      <div class='form-group'>
                          <label class='col-lg-2 control-label' for='typeahead' style='font-size:13px;'>Nama Ruangan</label>
                          <div class='col-lg-10'>
                              <input name='Nama' value='$r[Nama]' style='width:450px; height:25px;' type='text' class='form-control col-md-6' id='typeahead' autocomplete='off' data-provide='typeahead' data-items='4'>
                          </div>
                      </div>
                      <div class='form-group'>
                          <label class='col-lg-2 control-label' for='typeahead' style='font-size:13px;'>Lantai</label>
                          <div class='col-lg-10'>
                              <input name='Lantai' value='$r[Lantai]' style='width:450px; height:25px;' type='text' class='form-control col-md-6' id='typeahead' autocomplete='off' data-provide='typeahead' data-items='4'>
                          </div>
                      </div>
                      <div class='form-group'>
                          <label class='col-lg-2 control-label' for='typeahead' style='font-size:13px;'>Kapasitas</label>
                          <div class='col-lg-10'>
                              <input name='Kapasitas' value='$r[Kapasitas]' style='width:450px; height:25px;' type='text' class='form-control col-md-6' id='typeahead' autocomplete='off' data-provide='typeahead' data-items='4'>
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
