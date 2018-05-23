<?php 
switch($_GET['halaman']){
     
  default:       
  ?>
    <div class="col-md-10"> 
        <div class="col-lg-12">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <div class="text-muted bootstrap-admin-box-title" style="color:white;">Administrator | Master Dosen</div>
            </div>
              <div class="bootstrap-admin-panel-content">                   
           <?php
          echo"
                <table class='table table-striped' style='font-size:13px;''>
                  <form method='post' action='?page=masterdosen&halaman=tambahmdosen'> 
                       &nbsp; <button class='btn btn-xs btn-success' type='submit'><i class='glyphicon glyphicon-plus'></i> Tambah Dosen</button>                    
                  </form>                                          
                </table> <br />"; 
                ?>
          <body class="bootstrap-admin-with-small-navbar">
              <table  class="table table-hover" id="example" style="font-size:12px;">
                  <thead>
                    <tr style="background-color:#3e8bda; color:white;">
                      <th>No</th><th>Del</th><th>Edi</th><th>NIDN<th>Nama Dosen</th><th>Institusi</th><th>Prodi</th><th>Homebase</th>
                      <th>Institusi Induk</th>                    
                    </tr>
                  </thead>
                <tbody>
            <?php
          	$query= mysql_query("SELECT *
                                 FROM dosen");
          	while ($r=mysql_fetch_array($query)){

            $no++;
            echo"  <tr class='odd gradeX'><td>$no</td>
                     <td width=10 align=center><a class=t href=\"form_masterdosenact.php?page=masterdosen&halaman=hapus&key=$r[ID]\"
                      onClick=\"return confirm('Apakah Anda benar-benar akan menghapus dosen ini ?')\"><img src=../images/del.png></a></td>
                     <td width=10><a class=t href=?page=masterdosen&halaman=edit&key=$r[ID]><img src=../images/edit.png></a></td>
                     <td>$r[NIDN] </td>
                     <td>$r[nama_lengkap] - $r[Gelar]</td>
                     <td>$r[Identitas_ID]</td>
                     <td>$r[Jurusan_ID]</td>
                     <td>$r[Homebase]</td>
                     <td>$r[InstitusiInduk]</td>
                    </tr>";
            }
            ?>
              </table>
          </div>
        </div>
      </div>
  <?php                                                                                
  break;  

  
  case "tambahmdosen":
  ?>
  <div class="col-md-10">
    <div class="col-lg-12">                                                                              
        <div class="panel panel-primary bootstrap-admin-no-table-panel">                                                    
            <div class="panel-heading">
                <div class="text-muted bootstrap-admin-box-title" style="color:white;">Administrator | Tambah Dosen</div>
            </div>
      <?php
      echo"  <div class='bootstrap-admin-no-table-panel-content bootstrap-admin-panel-content collapse in'>
                 <form class='form-horizontal' method='post' action='form_masterdosenact.php?page=masterdosen&halaman=simpan'>
                   <fieldset>
                      <legend>Set Dosen</legend>";
                 echo"<div class='form-group'>
                          <label class='col-lg-2 control-label' for='typeahead' style='font-size:13px;'>NIDN</label>
                          <div class='col-lg-10'>
                              <input name='NIDN' style='width:190px; height:25px;' type='text' class='form-control col-md-6' id='typeahead' data-provide='typeahead' data-items='4'>
                          </div>
                      </div>
                      <div class='form-group'>
                          <label class='col-lg-2 control-label' for='typeahead' style='font-size:13px;'>Nama</label>
                          <div class='col-lg-10'>
                              <input name='nama_lengkap' style='width:190px; height:25px;' type='text' class='form-control col-md-6' id='typeahead' data-provide='typeahead' data-items='4'>
                          </div>
                      </div>
                      <div class='form-group'>
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
                          <label class='col-lg-2 control-label' for='typeahead' style='font-size:13px;'>Tempat/ Tgl Lahir</label>
                          <div class='col-lg-10'>
                              <input name='TempatLahir' style='width:190px; height:25px;' type='text' class='form-control col-md-6' id='typeahead' data-provide='typeahead' data-items='4'>
                               <input style='width:150px; height:25px;' type='text' class='form-control datepicker' id='date01' name='TanggalLahir'>                          
                          </div>
                      </div>
                      <div class='form-group'>                     
                       <label class='col-lg-2 control-label' for='select02' style='font-size:13px;'>Institusi</label>
                         <div class='col-lg-10'>
                          <select id='select01' class='selectize-select' style='width: 350px;' name='ID'>
                            <option value=0 selected>- Pilih Institusi -</option>";
                            $tampil=mysql_query("SELECT * FROM identitas");
                            while($r=mysql_fetch_array($tampil)){
                                echo "<option value=$r[Identitas_ID]>$r[Identitas_ID] -- $r[Nama_Identitas]</option>";
                            }
                            echo "</select></div></div>";

                 echo"<div class='form-group'>                     
                       <label class='col-lg-2 control-label' for='select02' style='font-size:13px;'>Program Studi</label>
                         <div class='col-lg-10'>";
                          $tampil=mysql_query("SELECT * FROM jurusan");
                          while($r=mysql_fetch_array($tampil)){
                          $no++;                         
                            echo" <input type='checkbox' name='Jurusan_ID[]' value='".$r['Jurusan_ID']."'>$r[Jurusan_ID] - $r[nama_jurusan]<br />";
                          }          
                echo"  </div></div>
 
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
  $e=mysql_query("SELECT * FROM dosen WHERE ID='$_GET[key]'");
  $r=mysql_fetch_array($e);
  $TanggalLahir=sprintf("%02d/%02d/%02d",substr($r['TanggalLahir'], 5,2),substr($r['TanggalLahir'], 8,2),substr($r['TanggalLahir'], 0,4));
  $TglBekerja=sprintf("%02d/%02d/%02d",substr($r['TglBekerja'], 5,2),substr($r['TglBekerja'], 8,2),substr($r['TglBekerja'], 0,4));
  
  echo"
  <div class='col-md-10'>
    <div class='col-lg-12'>                                                                              
        <div class='panel panel-primary bootstrap-admin-no-table-panel'>                                                    
            <div class='panel-heading'>
                <div class='text-muted bootstrap-admin-box-title' style='color:white;'>Administrator | Perbaharui Data Dosen</div>
            </div><br />
            <form method='post' action='?page=masterdosen'> 
              <table class='table table-striped' style='font-size:13px;''>
                &nbsp;<button class='btn btn-xs btn-success' type='submit'><i class='glyphicon glyphicon-share-alt'></i> Kembali ke menu awal</button>                    
              </form></table>
            <div class='bootstrap-admin-no-table-panel-content bootstrap-admin-panel-content collapse in'>
                 <form class='form-horizontal' method='post' action='form_masterdosenact.php?page=masterdosen&halaman=perbaharui'>
                 <input type=hidden value='$r[ID]' name=key>
                   <fieldset>
                      <legend>Set Dosen</legend>";
                      ?>
                      <div id="tabsview">
          		          <div id="tab1" class="tab_sel" onclick="javascript: displayPanel('1');" align="center">&nbsp; Data Pribadi &nbsp;</div>
           		          <div id="tab2" class="tab" style="margin-left: 1px;" onclick="javascript: displayPanel('2');" align="center">&nbsp; Alamat &nbsp;</div>
           		          <div id="tab3" class="tab" style="margin-left: 1px;" onclick="javascript: displayPanel('3');" align="center">&nbsp; Akademik &nbsp;</div>
           		          <div id="tab4" class="tab" style="margin-left: 1px;" onclick="javascript: displayPanel('4');" align="center">&nbsp; Jabatan &nbsp;</div>
                      </div>
          	          <div class="tab_bdr"></div>
                      <div class="panel" id="panel1" style="display: block;">
                        <span>
                        <ul><br />
                        <?php echo"            
                            <div class='form-group'>
                                <label class='col-lg-2 control-label' for='typeahead' style='font-size:13px;'>Username</label>
                                <div class='col-lg-10'>
                                    <input name='username' value='$r[username]' style='width:190px; height:27px;' type='text' class='form-control col-md-6' id='typeahead' data-provide='typeahead' data-items='4'>
                                </div>
                            </div>
                            <div class='form-group'>
                                <label class='col-lg-2 control-label' for='typeahead' style='font-size:13px;'>Password</label>
                                <div class='col-lg-10'>
                                    <input name='password'  style='width:190px; height:27px;' type='text' class='form-control col-md-6' id='typeahead' data-provide='typeahead' data-items='4'> *) Kosongkan jika tidak diubah
                                </div>
                            </div>
                            <div class='form-group'>
                                <label class='col-lg-2 control-label' for='typeahead' style='font-size:13px;'>NIDN</label>
                                <div class='col-lg-10'>
                                    <input name='NIDN'  value='$r[NIDN]' style='width:190px; height:27px;' type='text' class='form-control col-md-6' id='typeahead' data-provide='typeahead' data-items='4'> 
                                </div>
                            </div>
                            <div class='form-group'>
                                <label class='col-lg-2 control-label' for='typeahead' style='font-size:13px;'>Nama Dosen</label>
                                <div class='col-lg-10'>
                                    <input name='nama_lengkap'  value='$r[nama_lengkap]' style='width:290px; height:27px;' type='text' class='form-control col-md-6' id='typeahead' data-provide='typeahead' data-items='4'> 
                                </div>
                            </div>

                            <div class='form-group'>
                                <label class='col-lg-2 control-label' for='typeahead' style='font-size:13px;'>Tempat/ Tgl Lahir</label>
                                <div class='col-lg-10'>
                                    <input name='TempatLahir'  value='$r[TempatLahir]' style='width:290px; height:27px;' type='text' class='form-control col-md-6' id='typeahead' data-provide='typeahead' data-items='4'> 
                                    <input style='width:150px; height:27px;' type='text' class='form-control datepicker' id='date01' name='TanggalLahir' value='$TanggalLahir'>
                                </div>
                            </div>
                      <div class='form-group'>                     
                       <label class='col-lg-2 control-label' for='select02' style='font-size:13px;'>Agama</label>
                         <div class='col-lg-10'>
                          <select id='select01' class='selectize-select' style='width: 350px;' name='Agama'>
                            <option value=0 selected>- Pilih Agama -</option>";
                            $tampil=mysql_query("SELECT * FROM agama");
                            while($w=mysql_fetch_array($tampil)){
                              if ($r[Agama]==$w[nama]){
                                echo "<option value=$w[nama] selected>$w[ID] - $w[nama]</option>";
                              }else{
                                echo "<option value=$w[nama]>$w[ID] - $w[nama]</option>";                           
                              }
                            }
                                echo "</select></div></div>
                            <div class='form-group'>
                                <label class='col-lg-2 control-label' for='typeahead' style='font-size:13px;'>Gelar</label>
                                <div class='col-lg-10'>
                                    <input name='Gelar'  value='$r[Gelar]' style='width:190px; height:27px;' type='text' class='form-control col-md-6' id='typeahead' data-provide='typeahead' data-items='4'> 
                                </div>
                            </div>
                            <div class='form-group'>
                                <label class='col-lg-2 control-label' for='typeahead' style='font-size:13px;'>Telepon</label>
                                <div class='col-lg-10'>
                                    <input name='Telepon'  value='$r[Telepon]' style='width:190px; height:27px;' type='text' class='form-control col-md-6' id='typeahead' data-provide='typeahead' data-items='4'> 
                                </div>
                            </div>
                            <div class='form-group'>
                                <label class='col-lg-2 control-label' for='typeahead' style='font-size:13px;'>Handphone</label>
                                <div class='col-lg-10'>
                                    <input name='Handphone'  value='$r[Handphone]' style='width:190px; height:27px;' type='text' class='form-control col-md-6' id='typeahead' data-provide='typeahead' data-items='4'> 
                                </div>
                            </div>
                            <div class='form-group'>
                                <label class='col-lg-2 control-label' for='typeahead' style='font-size:13px;'>E-Mail</label>
                                <div class='col-lg-10'>
                                    <input name='Email'  value='$r[Email]' style='width:190px; height:27px;' type='text' class='form-control col-md-6' id='typeahead' data-provide='typeahead' data-items='4'> 
                                </div>
                            </div>
                      <div class='form-group'>                     
                       <label class='col-lg-2 control-label' for='select02' style='font-size:13px;'>Institusi</label>
                         <div class='col-lg-10'>
                          <select id='select01' class='selectize-select' style='width: 350px;' name='ID'>
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

                             $d = GetCheckboxes('jurusan', 'Jurusan_ID', 'Jurusan_ID', 'nama_jurusan', $r['Jurusan_ID']);
                      echo" <div class='form-group'>
                                <label class='col-lg-2 control-label' for='typeahead' style='font-size:13px;'>Program Studi</label>
                                <div class='col-lg-10'>
                                    $d
                                </div>
                            </div>";          
                        ?>  
                        </ul>
                        </span><?php echo"<button class='btn btn-xs btn-primary' type='submit'><i class='glyphicon glyphicon-arrow-down'></i> Simpan</button>"; ?>
                      </div>
                      <div class="panel" id="panel2" style="display: none;">
                        <span>
                        <ul>            
                        <?php echo"            
                            <div class='form-group'>
                                <label class='col-lg-2 control-label' for='typeahead' style='font-size:13px;'>No KTP</label>
                                <div class='col-lg-10'>
                                    <input name='KTP' value='$r[KTP]' style='width:190px; height:27px;' type='text' class='form-control col-md-6' id='typeahead' data-provide='typeahead' data-items='4'>
                                </div>
                            </div>
  
                            <div class='form-group'>
                                <label class='col-lg-2 control-label' for='typeahead' style='font-size:13px;'>Alamat</label>
                                <div class='col-lg-10'>
                                    <input name='Alamat' value='$r[Alamat]' style='width:390px; height:27px;' type='text' class='form-control col-md-6' id='typeahead' data-provide='typeahead' data-items='4'>
                                </div>
                            </div>
                            <div class='form-group'>
                                <label class='col-lg-2 control-label' for='typeahead' style='font-size:13px;'>Kota</label>
                                <div class='col-lg-10'>
                                    <input name='Kota' value='$r[Kota]' style='width:190px; height:27px;' type='text' class='form-control col-md-6' id='typeahead' data-provide='typeahead' data-items='4'>
                                </div>
                            </div>
                            <div class='form-group'>
                                <label class='col-lg-2 control-label' for='typeahead' style='font-size:13px;'>Propinsi</label>
                                <div class='col-lg-10'>
                                    <input name='Propinsi' value='$r[Propinsi]' style='width:190px; height:27px;' type='text' class='form-control col-md-6' id='typeahead' data-provide='typeahead' data-items='4'>
                                </div>
                            </div>
                            <div class='form-group'>
                                <label class='col-lg-2 control-label' for='typeahead' style='font-size:13px;'>Negara</label>
                                <div class='col-lg-10'>
                                    <input name='Negara' value='$r[Negara]' style='width:190px; height:27px;' type='text' class='form-control col-md-6' id='typeahead' data-provide='typeahead' data-items='4'>
                                </div>
                            </div>";
                         ?>

                        </ul>
                        </span><?php echo"<button class='btn btn-xs btn-primary' type='submit'><i class='glyphicon glyphicon-arrow-down'></i> Simpan</button>"; ?>
                      </div>
                      <div class="panel" id="panel3" style="display: none;">
                        <span>
                        <ul>        
                        <?php echo"
                            <div class='form-group'>
                                <label class='col-lg-2 control-label' for='typeahead' style='font-size:13px;'>Mulai Bekerja</label>
                                <div class='col-lg-10'>
                                  <input style='width:150px; height:27px;' type='text' class='form-control datepicker' id='date01' name='TglBekerja' value='$TglBekerja'>
                                </div>
                            </div>
                      <div class='form-group'>                     
                       <label class='col-lg-2 control-label' for='select02' style='font-size:13px;'>Status Dosen</label>
                         <div class='col-lg-10'>
                          <select id='select01' class='selectize-select' style='width: 350px;' name='StatusDosen_ID'>
                            <option value=0 selected>- Pilih Status Dosen -</option>";
                            $tampil=mysql_query("SELECT * FROM statusaktivitasdsn");
                            while($w=mysql_fetch_array($tampil)){
                              if ($w[StatusDosen_ID]==$r[StatusDosen_ID]){
                                echo "<option value=$w[StatusDosen_ID] selected>$w[StatusDosen_ID] -- $w[Nama]</option>";
                              }else{
                                 echo "<option value=$w[StatusDosen_ID]>$w[StatusDosen_ID] -- $w[Nama]</option>";                           
                              }
                            }
                                echo "</select></div></div>";
                 echo"<div class='form-group'>                     
                       <label class='col-lg-2 control-label' for='select02' style='font-size:13px;'>Status Kerja Dosen</label>
                         <div class='col-lg-10'>
                          <select id='select01' class='selectize-select' style='width: 350px;' name='StatusKerja_ID'>
                            <option value=0 selected>- Pilih Status Kerja -</option>";
                            $tampil=mysql_query("SELECT * FROM statuskerja");
                            while($w=mysql_fetch_array($tampil)){
                              if ($w[StatusKerja_ID]==$r[StatusKerja_ID]){
                                echo "<option value=$w[StatusKerja_ID] selected>$w[StatusKerja_ID] -- $w[Nama]</option>";
                              }else{
                                 echo "<option value=$w[StatusKerja_ID]>$w[StatusKerja_ID] -- $w[Nama]</option>";                           
                              }
                            }
                                echo "</select></div></div>";                                                            

                  echo"
                            <div class='form-group'>
                                <label class='col-lg-2 control-label' for='typeahead' style='font-size:13px;'>Kode Instansi Induk</label>
                                <div class='col-lg-10'>
                                    <input name='InstitusiInduk' value='$r[InstitusiInduk]' style='width:190px; height:27px;' type='text' class='form-control col-md-6' id='typeahead' data-provide='typeahead' data-items='4'>
                                </div>
                            </div>
                            <div class='form-group'>
                                <label class='col-lg-2 control-label' for='typeahead' style='font-size:13px;'>Prodi Homebase</label>
                                <div class='col-lg-10'>
                                    <input name='Homebase' value='$r[Homebase]' style='width:190px; height:27px;' type='text' class='form-control col-md-6' id='typeahead' data-provide='typeahead' data-items='4'>
                                </div>
                            </div>";
                 echo"<div class='form-group'>                     
                       <label class='col-lg-2 control-label' for='select02' style='font-size:13px;'>Jenjang Penddk</label>
                         <div class='col-lg-10'>
                          <select id='select01' class='selectize-select' style='width: 350px;' name='Jenjang_ID'>
                            <option value=0 selected>- Pilih Jenjang -</option>";
                            $tampil=mysql_query("SELECT * FROM jenjang");
                            while($w=mysql_fetch_array($tampil)){
                              if ($w[Jenjang_ID]==$r[Jenjang_ID]){
                                echo "<option value=$w[Jenjang_ID] selected>$w[Jenjang_ID] -- $w[Nama]</option>";
                              }else{
                                 echo "<option value=$w[Jenjang_ID]>$w[Jenjang_ID] -- $w[Nama]</option>";                           
                              }
                            }
                                echo "</select></div></div>";
                              
                        echo "
                            <div class='form-group'>
                                <label class='col-lg-2 control-label' for='typeahead' style='font-size:13px;'>Keilmuan</label>
                                <div class='col-lg-10'>
                                    <input name='Keilmuan' value='$r[Keilmuan]' style='width:290px; height:27px;' type='text' class='form-control col-md-6' id='typeahead' data-provide='typeahead' data-items='4'>
                                </div>
                            </div>";          
                         ?>
             
                        </ul>
                        </span><?php echo"<button class='btn btn-xs btn-primary' type='submit'><i class='glyphicon glyphicon-arrow-down'></i> Simpan</button>"; ?>
                      </div>
                      <div class="panel" id="panel4" style="display: none;">
                        <span>
                        <ul>            
                        <?php echo"
                      <div class='form-group'>                     
                       <label class='col-lg-2 control-label' for='select02' style='font-size:13px;'>Jabatan Akademik</label>
                         <div class='col-lg-10'>
                          <select id='select01' class='selectize-select' style='width: 350px;' name='Jabatan_ID'>
                            <option value=0 selected>- Pilih Jabatan -</option>";
                            $tampil=mysql_query("SELECT * FROM jabatan");
                            while($w=mysql_fetch_array($tampil)){
                              if ($w[Jabatan_ID]==$r[Jabatan_ID]){
                                echo "<option value=$w[Jabatan_ID] selected>$w[Jabatan_ID] -- $w[Nama]</option>";
                              }else{
                                 echo "<option value=$w[Jabatan_ID]>$w[Jabatan_ID] -- $w[Nama]</option>";                           
                              }
                            }
                                echo "</select></div></div>";                        
                  echo"<div class='form-group'>                     
                       <label class='col-lg-2 control-label' for='select02' style='font-size:13px;'>Jabatan Dikiti</label>
                         <div class='col-lg-10'>
                          <select id='select01' class='selectize-select' style='width: 350px;' name='JabatanDikti_ID'>
                            <option value=0 selected>- Pilih Jabatan -</option>";
                            $tampil=mysql_query("SELECT * FROM jabatandikti");
                            while($w=mysql_fetch_array($tampil)){
                              if ($w[JabatanDikti_ID]==$r[JabatanDikti_ID]){
                                echo "<option value=$w[JabatanDikti_ID] selected>$w[JabatanDikti_ID] -- $w[Nama]</option>";
                              }else{
                                 echo "<option value=$w[JabatanDikti_ID]>$w[JabatanDikti_ID] -- $w[Nama]</option>";                           
                              }
                            }
                                echo "</select></div></div>";
                          ?>
          
                        </ul>
                        </span><?php echo"<button class='btn btn-xs btn-primary' type='submit'><i class='glyphicon glyphicon-arrow-down'></i> Simpan</button></form>"; ?>
                      </div>            
                    </div> 
                   <?php echo"
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
