<?php 
switch($_GET['halaman']){
     
  default:       
  ?>
    <div class="col-md-10"> 
        <div class="col-lg-12">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <div class="text-muted bootstrap-admin-box-title" style="color:white;">Administrator | Master Mahasiswa</div>
            </div>
              <div class="bootstrap-admin-panel-content">                   
           <?php
          echo"
                <table class='table table-striped' style='font-size:13px;''>
                  <form method='post' action='?page=mastermahasiswa&halaman=tambahmahasiswa'> 
                       &nbsp; <button class='btn btn-xs btn-success' type='submit'><i class='glyphicon glyphicon-plus'></i> Tambah Mahasiswa</button>                    
                  </form>                                          
                </table> <br />"; 
                ?>
          <body class="bootstrap-admin-with-small-navbar">
              <table  class="table table-hover" id="example" style="font-size:12px;">
                  <thead>
                    <tr style="background-color:#3e8bda; color:white;">
                      <th>No</th><th>Del</th><th>Edi</th><th>NIM<th>Nama Mahasiswa</th><th>Institusi</th><th>Prodi</th><th>Prog</th>
                      <th>Angkatan</th><th>Kurikulum</th><th>Penasehat Akd</th>                    
                    </tr>
                  </thead>
                <tbody>
            <?php
          	$query= mysql_query("SELECT a.*,b.Program_ID,c.Kode,d.nama_jurusan
                                 FROM mahasiswa a LEFT JOIN program b ON a.Program_ID=b.ID LEFT JOIN kurikulum c ON a.Kurikulum_ID=c.Kurikulum_ID LEFT JOIN jurusan d
                                 ON a.Jurusan_ID=d.Jurusan_ID");
          	while ($r=mysql_fetch_array($query)){

            $no++;
            echo"  <tr class='odd gradeX'><td>$no</td>
                     <td width=10 align=center><a class=t href=\"form_mastermahasiswaact.php?page=mastermahasiswa&halaman=hapus&key=$r[ID]\"
                      onClick=\"return confirm('Apakah Anda benar-benar akan menghapus mahasiswa ini ?')\"><img src=../images/del.png></a></td>
                     <td width=10><a class=t href=?page=mastermahasiswa&halaman=edit&key=$r[ID]><img src=../images/edit.png></a></td>
                     <td>$r[NIM] </td>
                     <td>$r[Nama]</td>
                     <td>$r[Identitas_ID]</td>
                     <td>$r[nama_jurusan]</td>
                     <td>$r[Program_ID]</td>
                     <td>$r[Angkatan]</td>
                     <td>$r[Kode]</td>
                     <td>$r[PenasehatAkademik]</td>
                    </tr>";
            }
            ?>
              </table>
          </div>
        </div>
      </div>
  <?php                                                                                
  break;  

  
  case "tambahmahasiswa":
  ?>
  <div class="col-md-10">
    <div class="col-lg-12">                                                                              
        <div class="panel panel-primary bootstrap-admin-no-table-panel">                                                    
            <div class="panel-heading">
                <div class="text-muted bootstrap-admin-box-title" style="color:white;">Administrator | Tambah Mahasiswa</div>
            </div>
      <?php
      echo"  <div class='bootstrap-admin-no-table-panel-content bootstrap-admin-panel-content collapse in'>
                 <form class='form-horizontal' method='post' action='form_mastermahasiswaact.php?page=mastermahasiswa&halaman=simpan'>
                   <fieldset>
                      <legend>Set Mahasiswa</legend>";
                 echo"<div class='form-group'>                     
                       <label class='col-lg-2 control-label' for='select02' style='font-size:13px;'>Institusi</label>
                         <div class='col-lg-10'>
                          <select id='select01' class='selectize-select' style='width: 350px;' name='ID'>
                            <option value=0 selected>- Pilih Institusi -</option>";
                            $tampil=mysql_query("SELECT * FROM identitas");
                            while($r=mysql_fetch_array($tampil)){
                              if ($r['Identitas_ID']==$_GET['ID']){
                                echo "<option value=$r[Identitas_ID] selected>$r[Identitas_ID] -- $r[Nama_Identitas]</option>";
                              }else{
                                 echo "<option value=$r[Identitas_ID]>$r[Identitas_ID] -- $r[Nama_Identitas]</option>";                           
                              }
                            }
                            echo "</select></div></div>";
                          ?>                
                      <div class="form-group">                     
                       <label class="col-lg-2 control-label" for="select02" style="font-size:13px;">Program Studi</label>
                         <div class="col-lg-10">
                          <select class="selectize-select" style="width: 350px" name="prodi" onChange="MM_jumpMenu('parent',this,0)">
                            <option value=0 selected>- Pilih Prodi -</option>
                          <?php
                      	  $sqlp="SELECT * FROM jurusan";
                      	  $qryp=mysql_query($sqlp)
                      	  or die();
                      	  while ($r=mysql_fetch_array($qryp)){
                          if ($r['Jurusan_ID']==$_GET['prodi']){
                            $cek="selected";
                            }
                            else{
                              $cek="";
                            }
                            echo "<option value='?page=mastermahasiswa&halaman=tambahmahasiswa&ID=$r[Identitas_ID]&prodi=$r[Jurusan_ID]' $cek> $r[Jurusan_ID] - $r[nama_jurusan]</option>";
                      		}
                      		?>
                            </select>
                            <input name="prodi" type="hidden" value="<?php echo $_GET['prodi']; ?>"></td>
                          </div></div>
                          <?php
                 echo"<div class='form-group'>                     
                       <label class='col-lg-2 control-label' for='select02' style='font-size:13px;'>Program</label>
                         <div class='col-lg-10'>
                          <select id='select03' class='selectize-select' style='width: 350px' name='prog'>
                            <option value=0 selected>- Pilih Program -</option>";
                            $tampil=mysql_query("SELECT * FROM program");
                            while($r=mysql_fetch_array($tampil)){
                                echo "<option value=$r[ID]>$r[Program_ID] -- $r[nama_program]</option>";
                            }
                            echo "</select></div></div>";
   
                 echo"<div class='form-group'>                     
                       <label class='col-lg-2 control-label' for='select02' style='font-size:13px;'>Kurikulum</label>
                         <div class='col-lg-10'>
                          <select id='select03' class='selectize-select' style='width: 350px' name='Kurikulum_ID'>
                            <option value=0 selected>- Pilih Kurikulum -</option>";
                            $tampil=mysql_query("SELECT * FROM kurikulum WHERE Identitas_ID='$_GET[ID]' AND Jurusan_ID='$_GET[prodi]' order by Kode");
                            while($r=mysql_fetch_array($tampil)){
                                echo "<option value=$r[Kurikulum_ID]>$r[Kode] -- $r[Nama]</option>";
                            }
                            echo "</select></div></div>";
                 echo"<div class='form-group'>
                          <label class='col-lg-2 control-label' for='typeahead' style='font-size:13px;'>Nama Lengkap</label>
                          <div class='col-lg-10'>
                              <input name='Nama' style='width:390px; height:25px;' type='text' class='form-control col-md-6' id='typeahead' data-provide='typeahead' data-items='4'>
                          </div>
                      </div>
                      <div class='form-group'>
                          <label class='col-lg-2 control-label' for='typeahead' style='font-size:13px;'>NIM</label>
                          <div class='col-lg-10'>
                              <input name='NIM' style='width:190px; height:25px;' type='text' class='form-control col-md-6' id='typeahead' data-provide='typeahead' data-items='4'>
                          </div>
                      </div>
                      <div class='form-group'>
                          <label class='col-lg-2 control-label' for='typeahead' style='font-size:13px;'>Angkatan</label>
                          <div class='col-lg-10'>
                              <input name='Angkatan' style='width:190px; height:25px;' type='text' class='form-control col-md-6' id='typeahead' data-provide='typeahead' data-items='4'>
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
                          <label class='col-lg-2 control-label' for='typeahead' style='font-size:13px;'>Kelamin</label>    
                                <div class='col-lg-10'>
                                  <input type=radio name=Kelamin value=L > Laki-Laki
                                  <input type=radio name=Kelamin value=P> Perempuan
                          </div>
                      </div>";                     
                 echo"<div class='form-group'>                     
                       <label class='col-lg-2 control-label' for='select02' style='font-size:13px;'>Agama</label>
                         <div class='col-lg-10'>
                          <select id='select03' class='selectize-select' style='width: 350px' name='Agama'>
                            <option value=0 selected>- Pilih Agama -</option>";
                            $tampil=mysql_query("SELECT * FROM agama");
                            while($r=mysql_fetch_array($tampil)){
                                echo "<option value=$r[nama]>$r[ID] -- $r[nama]</option>";
                            }
                            echo "</select></div></div>";
                 echo"<div class='form-group'>                     
                       <label class='col-lg-2 control-label' for='select02' style='font-size:13px;'>Status Sipil</label>
                         <div class='col-lg-10'>
                          <select id='select03' class='selectize-select' style='width: 350px' name='StatusSipil'>
                            <option value=0 selected>- Pilih Status -</option>";
                            $tampil=mysql_query("SELECT * FROM statussipil");
                            while($r=mysql_fetch_array($tampil)){
                                echo "<option value='$r[Nama]'>$r[ID] -- $r[Nama]</option>";
                            }
                            echo "</select></div></div>"; 
                 echo"<div class='form-group'>
                          <label class='col-lg-2 control-label' for='typeahead' style='font-size:13px;'>Alamat</label>
                          <div class='col-lg-10'>
                              <input name='Alamat' style='width:400px; height:25px;' type='text' class='form-control col-md-6' id='typeahead' data-provide='typeahead' data-items='4'>
                          </div>
                      </div>"; 
                 echo"<div class='form-group'>                     
                       <label class='col-lg-2 control-label' for='select02' style='font-size:13px;'>Status Awal</label>
                         <div class='col-lg-10'>
                          <select id='select03' class='selectize-select' style='width: 350px' name='StatusAwal_ID'>
                            <option value=0 selected>- Pilih Status Awal -</option>";
                            $tampil=mysql_query("SELECT * FROM statusawal");
                            while($r=mysql_fetch_array($tampil)){
                                echo "<option value=$r[StatusAwal_ID]>$r[StatusAwal_ID] -- $r[Nama]</option>";
                            }
                            echo "</select></div></div>";  
                 echo"<div class='form-group'>
                          <label class='col-lg-2 control-label' for='typeahead' style='font-size:13px;'>Penasehat Akademik</label>
                          <div class='col-lg-10'>
                              <input name='PenasehatAkademik' style='width:390px; height:25px;' type='text' class='form-control col-md-6' id='typeahead' data-provide='typeahead' data-items='4'>
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
  $e=mysql_query("SELECT * FROM mahasiswa WHERE ID='$_GET[key]'");
  $r=mysql_fetch_array($e);
  $TanggalLahir=sprintf("%02d/%02d/%02d",substr($r['TanggalLahir'], 5,2),substr($r['TanggalLahir'], 8,2),substr($r['TanggalLahir'], 0,4));
  
  echo"
  <div class='col-md-10'>
    <div class='col-lg-12'>                                                                              
        <div class='panel panel-primary bootstrap-admin-no-table-panel'>                                                    
            <div class='panel-heading'>
                <div class='text-muted bootstrap-admin-box-title' style='color:white;'>Administrator | Perbaharui Data Mahasiswa</div>
            </div><br />
            <form method='post' action='?page=mastermahasiswa'> 
              <table class='table table-striped' style='font-size:13px;''>
                &nbsp;<button class='btn btn-xs btn-success' type='submit'><i class='glyphicon glyphicon-share-alt'></i> Kembali ke menu awal</button>                    
              </form></table>
            <div class='bootstrap-admin-no-table-panel-content bootstrap-admin-panel-content collapse in'>
                 <form class='form-horizontal' method='post' action='form_mastermahasiswaact.php?page=mastermahasiswa&halaman=perbaharui'>
                 <input type=hidden value='$r[ID]' name=key>
                   <fieldset>
                      <legend>Set Mahasiswa</legend>";
                      ?>
                      <div id="tabsview">
          		          <div id="tab1" class="tab_sel" onclick="javascript: displayPanel('1');" align="center">&nbsp; Akademik &nbsp;</div>
           		          <div id="tab2" class="tab" style="margin-left: 1px;" onclick="javascript: displayPanel('2');" align="center">&nbsp; Data Pribadi &nbsp;</div>
           		          <div id="tab3" class="tab" style="margin-left: 1px;" onclick="javascript: displayPanel('3');" align="center">&nbsp; Orang Tua &nbsp;</div>
           		          <div id="tab4" class="tab" style="margin-left: 1px;" onclick="javascript: displayPanel('4');" align="center">&nbsp; Asal Sekolah &nbsp;</div>
                      </div>
          	          <div class="tab_bdr"></div>
                      <div class="panel" id="panel1" style="display: block;">
                        <span>
                        <ul>
                        <?php echo"            
                            <div class='form-group'>
                                <label class='col-lg-2 control-label' for='typeahead' style='font-size:13px;'>NIM</label>
                                <div class='col-lg-10'>
                                    <input name='NIM' value='$r[NIM]' style='width:190px; height:27px;' type='text' class='form-control col-md-6' id='typeahead' data-provide='typeahead' data-items='4'>
                                </div>
                            </div> 
                            <div class='form-group'>
                                <label class='col-lg-2 control-label' for='typeahead' style='font-size:13px;'>Nama</label>
                                <div class='col-lg-10'>
                                    <input name='Nama' value='$r[Nama]' style='width:290px; height:27px;' type='text' class='form-control col-md-6' id='typeahead' data-provide='typeahead' data-items='4'>
                                </div>
                            </div> 
                            <div class='form-group'>
                                <label class='col-lg-2 control-label' for='typeahead' style='font-size:13px;'>Username</label>
                                <div class='col-lg-10'>
                                    <input name='username' value='$r[username]' style='width:190px; height:27px;' type='text' class='form-control col-md-6' id='typeahead' data-provide='typeahead' data-items='4'>
                                </div>
                            </div> 
                            <div class='form-group'>
                                <label class='col-lg-2 control-label' for='typeahead' style='font-size:13px;'>Password</label>
                                <div class='col-lg-10'>
                                    <input name='password' style='width:190px; height:27px;' type='text' class='form-control col-md-6' id='typeahead' data-provide='typeahead' data-items='4'> * Kosongkan Jika Tidak diubah
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
                echo"<div class='form-group'>                     
                       <label class='col-lg-2 control-label' for='select02' style='font-size:13px;'>Program Studi</label>
                         <div class='col-lg-10'>
                          <select id='select01' class='selectize-select' style='width: 350px;' name='prodi'>
                            <option value=0 selected>- Pilih Program Studi -</option>";
                            $tampil=mysql_query("SELECT * FROM jurusan");
                            while($w=mysql_fetch_array($tampil)){
                              if ($w[Jurusan_ID]==$r[Jurusan_ID]){
                                echo "<option value=$w[Jurusan_ID] selected>$w[Jurusan_ID] -- $w[nama_jurusan]</option>";
                              }else{
                                 echo "<option value=$w[Jurusan_ID]>$w[Jurusan_ID] -- $w[nama_jurusan]</option>";                           
                              }
                            }
                                echo "</select></div></div>";
                 echo"<div class='form-group'>                     
                       <label class='col-lg-2 control-label' for='select02' style='font-size:13px;'>Program</label>
                         <div class='col-lg-10'>
                          <select id='select03' class='selectize-select' style='width: 350px' name='prog'>
                            <option value=0 selected>- Pilih Program -</option>";
                            $tampil=mysql_query("SELECT * FROM program");
                            while($w=mysql_fetch_array($tampil)){
                              if ($w[ID]==$r[Program_ID]){ 
                                echo "<option value=$w[ID] selected>$w[Program_ID] -- $w[nama_program]</option>";
                              }else{
                                 echo "<option value=$w[ID]>$w[Program_ID] -- $w[nama_program]</option>";                             
                              }
                            }
                    echo "</select></div></div>";
                 echo"<div class='form-group'>                     
                       <label class='col-lg-2 control-label' for='select02' style='font-size:13px;'>Kurikulum</label>
                         <div class='col-lg-10'>
                          <select id='select03' class='selectize-select' style='width: 350px' name='Kurikulum_ID'>
                            <option value=0 selected>- Pilih Kurikulum -</option>";
                            $tampil=mysql_query("SELECT * FROM kurikulum WHERE Identitas_ID='$r[Identitas_ID]' AND Jurusan_ID='$r[Jurusan_ID]' order by Kode");
                            while($w=mysql_fetch_array($tampil)){
                              if ($w[Kurikulum_ID]==$r[Kurikulum_ID]){ 
                                echo "<option value=$w[Kurikulum_ID] selected>$w[Kode] -- $w[Nama]</option>";
                              }else{
                                 echo "<option value=$w[Kurikulum_ID]>$w[Kode] -- $w[Nama]</option>";                             
                              }
                            }
                    echo "</select></div></div>";
                 echo "   <div class='form-group'>
                                <label class='col-lg-2 control-label' for='typeahead' style='font-size:13px;'>Angkatan</label>
                                <div class='col-lg-10'>
                                    <input name='Angkatan' value='$r[Angkatan]' style='width:190px; height:27px;' type='text' class='form-control col-md-6' id='typeahead' data-provide='typeahead' data-items='4'>
                                </div>
                            </div>";
                 echo "   <div class='form-group'>
                                <label class='col-lg-2 control-label' for='typeahead' style='font-size:13px;'>Penasehat Akademik</label>
                                <div class='col-lg-10'>
                                    <input name='PenasehatAkademik' value='$r[PenasehatAkademik]' style='width:190px; height:27px;' type='text' class='form-control col-md-6' id='typeahead' data-provide='typeahead' data-items='4'>
                                </div>
                            </div>";
                 echo"<div class='form-group'>                     
                       <label class='col-lg-2 control-label' for='select02' style='font-size:13px;'>Status Awal Mahasiswa</label>
                         <div class='col-lg-10'>
                          <select id='select03' class='selectize-select' style='width: 350px' name='StatusAwal_ID'>
                              <option value=0 selected>- Pilih Status Awal Mahasiswa -</option>";
                              $tampil=mysql_query("SELECT * FROM statusawal ORDER BY StatusAwal_ID");
                              while($w=mysql_fetch_array($tampil)){
                                if ($r[StatusAwal_ID]==$w[StatusAwal_ID]){
                                    echo "<option value=$w[StatusAwal_ID] selected>$w[StatusAwal_ID] - $w[Nama]</option>";
                                }else{
                                    echo "<option value=$w[StatusAwal_ID]>$w[StatusAwal_ID] - $w[Nama]</option>";
                                }
                              }  
                    echo "</select></div></div>"; 
                 echo"<div class='form-group'>                     
                       <label class='col-lg-2 control-label' for='select02' style='font-size:13px;'>Status Mahasiswa</label>
                         <div class='col-lg-10'>
                          <select id='select03' class='selectize-select' style='width: 350px' name='StatusMhsw_ID'>
                              <option value=0 selected>- Pilih Status Mahasiswa -</option>";
                              $tampil=mysql_query("SELECT * FROM statusmhsw ORDER BY StatusMhsw_ID");
                              while($w=mysql_fetch_array($tampil)){
                                if ($r[StatusMhsw_ID]==$w[StatusMhsw_ID]){
                                    echo "<option value=$w[StatusMhsw_ID] selected>$w[StatusMhsw_ID] - $w[Nama]</option>";
                                }else{
                                   echo "<option value=$w[StatusMhsw_ID]>$w[StatusMhsw_ID] - $w[Nama]</option>";
                                }
                              }  
                    echo "</select></div></div>";          
                        ?>  
                        </ul>
                        </span><?php echo"<button class='btn btn-xs btn-primary' type='submit'><i class='glyphicon glyphicon-arrow-down'></i> Simpan</button>"; ?>
                      </div>
                      <div class="panel" id="panel2" style="display: none;">
                        <span>
                        <ul>            
                        <?php echo"            

                            <div class='form-group'>
                                <label class='col-lg-2 control-label' for='typeahead' style='font-size:13px;'>Alamat</label>
                                <div class='col-lg-10'>
                                    <input name='Alamat' value='$r[Alamat]' style='width:400px; height:27px;' type='text' class='form-control col-md-6' id='typeahead' data-provide='typeahead' data-items='4'>
                                </div>
                            </div>
  
                            <div class='form-group'>
                                <label class='col-lg-2 control-label' for='typeahead' style='font-size:13px;'>RT</label>
                                <div class='col-lg-10'>
                                    <input name='RT' value='$r[RT]' style='width:100px; height:27px;' type='text' class='form-control col-md-6' id='typeahead' data-provide='typeahead' data-items='4'>
                                    RW <input name='RW' value='$r[RW]' style='width:100px; height:27px;' type='text' class='form-control col-md-6' id='typeahead' data-provide='typeahead' data-items='4'>
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
                            </div>
                            <div class='form-group'>
                                <label class='col-lg-2 control-label' for='typeahead' style='font-size:13px;'>Telepon</label>
                                <div class='col-lg-10'>
                                    <input name='Telepon' value='$r[Telepon]' style='width:190px; height:27px;' type='text' class='form-control col-md-6' id='typeahead' data-provide='typeahead' data-items='4'>
                                </div>
                            </div>
                            <div class='form-group'>
                                <label class='col-lg-2 control-label' for='typeahead' style='font-size:13px;'>Tempat/ Tgl Lahir</label>
                                <div class='col-lg-10'>
                                    <input name='TempatLahir'  value='$r[TempatLahir]' style='width:290px; height:27px;' type='text' class='form-control col-md-6' id='typeahead' data-provide='typeahead' data-items='4'> 
                                    <input style='width:150px; height:27px;' type='text' class='form-control datepicker' id='date01' name='TanggalLahir' value='$TanggalLahir'>
                                </div>
                            </div>";
                 echo"<div class='form-group'>"; 
                      if ($r['Kelamin']=='L'){
                          echo "<label class='col-lg-2 control-label' for='typeahead' style='font-size:13px;'>Kelamin</label>    
                                <div class='col-lg-10'>
                                  <input type=radio name=Kelamin value=L checked>Laki-laki
                                  <input type=radio name=Kelamin value=P>Perempuan</div>";
                      }
                      else{
                          echo "<label class='col-lg-2 control-label' for='typeahead' style='font-size:13px;'>Kelamin</label>    
                                <div class='col-lg-10'>
                                  <input type=radio name=Kelamin value=L>Laki-laki
                                  <input type=radio name=Kelamin value=P checked>Perempuan</div>";
                      }
                  echo"</div>    
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
                                echo "</select></div></div>"; 
                         ?>

                        </ul>
                        </span><?php echo"<button class='btn btn-xs btn-primary' type='submit'><i class='glyphicon glyphicon-arrow-down'></i> Simpan</button>"; ?>
                      </div>
                      <div class="panel" id="panel3" style="display: none;">
                        <span>
                        <ul>        
                        <?php 
                 echo"   <div class='form-group'>
                                <label class='col-lg-2 control-label' for='typeahead' style='font-size:13px;'>Nama Ayah</label>
                                <div class='col-lg-10'>
                                    <input name='NamaAyah' value='$r[NamaAyah]' style='width:190px; height:27px;' type='text' class='form-control col-md-6' id='typeahead' data-provide='typeahead' data-items='4'>
                                </div>
                            </div>";

                 echo"<div class='form-group'>                     
                       <label class='col-lg-2 control-label' for='select02' style='font-size:13px;'>Pendidikan Ayah</label>
                         <div class='col-lg-10'>
                          <select id='select03' class='selectize-select' style='width: 350px' name='PendidikanAyah'>
                            <option value=0 selected>- Pilih Kategori -</option>";
                              $tampil=mysql_query("SELECT * FROM Pendidikanortu");
                                while($w=mysql_fetch_array($tampil)){
                                  if ($r[PendidikanAyah]==$w[Nama]){
                                      echo "<option value='$w[Nama]' selected>$w[ID] - $w[Nama]</option>";
                                  }else{
                                      echo "<option value='$w[Nama]'>$w[ID] - $w[Nama]</option>";
                                  }
                                }   
                    echo "</select></div></div>";
                 echo"<div class='form-group'>                     
                       <label class='col-lg-2 control-label' for='select02' style='font-size:13px;'>Pekerjaan Ayah</label>
                         <div class='col-lg-10'>
                          <select id='select03' class='selectize-select' style='width: 350px' name='PekerjaanAyah'>
                            <option value=0 selected>- Pilih Kategori -</option>";
                              $tampil=mysql_query("SELECT * FROM pekerjaanortu ORDER BY Pekerjaan");
                                while($w=mysql_fetch_array($tampil)){
                                  if ($r[PekerjaanAyah]==$w[Pekerjaan]){
                                    echo "<option value='$w[Pekerjaan]' selected>$w[Pekerjaan] - $w[Nama]</option>";
                                  }else{
                                    echo "<option value='$w[Pekerjaan]'>$w[Pekerjaan] - $w[Nama]</option>";
                                  }
                                }  
                    echo "</select></div></div>";
                 echo"<div class='form-group'>                     
                       <label class='col-lg-2 control-label' for='select02' style='font-size:13px;'>Agama Ayah</label>
                         <div class='col-lg-10'>
                          <select id='select03' class='selectize-select' style='width: 350px' name='AgamaAyah'>
                                    <option value=0 selected>- Pilih Kategori -</option>";
                                    $tampil=mysql_query("SELECT * FROM agama");
                                      while($w=mysql_fetch_array($tampil)){
                                      if ($r[AgamaAyah]==$w[nama]){
                                          echo "<option value='$w[nama]' selected>$w[ID] - $w[nama]</option>";
                                      }
                                      else{
                                          echo "<option value='$w[nama]'>$w[ID] - $w[nama]</option>";
                                      }
                                 }    
                    echo "</select></div></div>";
                 echo"   <div class='form-group'>
                                <label class='col-lg-2 control-label' for='typeahead' style='font-size:13px;'>Nama Ibu</label>
                                <div class='col-lg-10'>
                                    <input name='NamaIbu' value='$r[NamaIbu]' style='width:190px; height:27px;' type='text' class='form-control col-md-6' id='typeahead' data-provide='typeahead' data-items='4'>
                                </div>
                            </div>";                            
                 echo"<div class='form-group'>                     
                       <label class='col-lg-2 control-label' for='select02' style='font-size:13px;'>Pendidikan Ibu</label>
                         <div class='col-lg-10'>
                          <select id='select03' class='selectize-select' style='width: 350px' name='PendidikanIbu'>
                            <option value=0 selected>- Pilih Kategori -</option>";
                              $tampil=mysql_query("SELECT * FROM Pendidikanortu");
                                while($w=mysql_fetch_array($tampil)){
                                  if ($r[PendidikanIbu]==$w[Nama]){
                                      echo "<option value='$w[Nama]' selected>$w[ID] - $w[Nama]</option>";
                                  }else{
                                      echo "<option value='$w[Nama]'>$w[ID] - $w[Nama]</option>";
                                  }
                                }   
                    echo "</select></div></div>";
                 echo"<div class='form-group'>                     
                       <label class='col-lg-2 control-label' for='select02' style='font-size:13px;'>Pekerjaan Ibu</label>
                         <div class='col-lg-10'>
                          <select id='select03' class='selectize-select' style='width: 350px' name='PekerjaanIbu'>
                            <option value=0 selected>- Pilih Kategori -</option>";
                              $tampil=mysql_query("SELECT * FROM pekerjaanortu");
                                while($w=mysql_fetch_array($tampil)){
                                  if ($r[PekerjaanIbu]==$w[Nama]){
                                    echo "<option value='$w[Nama]' selected>$w[Pekerjaan] - $w[Nama]</option>";
                                  }else{
                                    echo "<option value='$w[Nama]'>$w[Pekerjaan] - $w[Nama]</option>";
                                  }
                                }  
                    echo "</select></div></div>";
                 echo"<div class='form-group'>                     
                       <label class='col-lg-2 control-label' for='select02' style='font-size:13px;'>Agama Ibu</label>
                         <div class='col-lg-10'>
                          <select id='select03' class='selectize-select' style='width: 350px' name='AgamaIbu'>
                                    <option value=0 selected>- Pilih Kategori -</option>";
                                    $tampil=mysql_query("SELECT * FROM agama");
                                      while($w=mysql_fetch_array($tampil)){
                                      if ($r[AgamaIbu]==$w[nama]){
                                          echo "<option value='$w[nama]' selected>$w[ID] - $w[nama]</option>";
                                      }
                                      else{
                                          echo "<option value='$w[nama]'>$w[ID] - $w[nama]</option>";
                                      }
                                 }    
                    echo "</select></div></div>";
                    echo " <div class='form-group'>
                                <label class='col-lg-2 control-label' for='typeahead' style='font-size:13px;'>Alamat</label>
                                <div class='col-lg-10'>
                                    <input name='AlamatOrtu' value='$r[AlamatOrtu]' style='width:400px; height:27px;' type='text' class='form-control col-md-6' id='typeahead' data-provide='typeahead' data-items='4'>
                                </div>
                            </div>
  
                            <div class='form-group'>
                                <label class='col-lg-2 control-label' for='typeahead' style='font-size:13px;'>Kota</label>
                                <div class='col-lg-10'>
                                    <input name='KotaOrtu' value='$r[KotaOrtu]' style='width:190px; height:27px;' type='text' class='form-control col-md-6' id='typeahead' data-provide='typeahead' data-items='4'>
                                </div>
                            </div>
                            <div class='form-group'>
                                <label class='col-lg-2 control-label' for='typeahead' style='font-size:13px;'>Propinsi</label>
                                <div class='col-lg-10'>
                                    <input name='PropinsiOrtu' value='$r[PropinsiOrtu]' style='width:190px; height:27px;' type='text' class='form-control col-md-6' id='typeahead' data-provide='typeahead' data-items='4'>
                                </div>
                            </div>
                            <div class='form-group'>
                                <label class='col-lg-2 control-label' for='typeahead' style='font-size:13px;'>Negara</label>
                                <div class='col-lg-10'>
                                    <input name='NegaraOrtu' value='$r[NegaraOrtu]' style='width:190px; height:27px;' type='text' class='form-control col-md-6' id='typeahead' data-provide='typeahead' data-items='4'>
                                </div>
                            </div>
                            <div class='form-group'>
                                <label class='col-lg-2 control-label' for='typeahead' style='font-size:13px;'>Telepon</label>
                                <div class='col-lg-10'>
                                    <input name='TeleponOrtu' value='$r[TeleponOrtu]' style='width:190px; height:27px;' type='text' class='form-control col-md-6' id='typeahead' data-provide='typeahead' data-items='4'>
                                </div>
                            </div>";
                         ?>
             
                        </ul>
                        </span><?php echo"<button class='btn btn-xs btn-primary' type='submit'><i class='glyphicon glyphicon-arrow-down'></i> Simpan</button>"; ?>
                      </div>
                      <div class="panel" id="panel4" style="display: none;">
                        <span>
                        <ul>            
                        <?php 
                 echo"<div class='form-group'>                     
                       <label class='col-lg-2 control-label' for='select02' style='font-size:13px;'>Jenis Sekolah</label>
                         <div class='col-lg-10'>
                          <select id='select03' class='selectize-select' style='width: 350px' name='JenisSekolah'>
                            <option value=0 selected>- Pilih Kategori -</option>";
                              $tampil=mysql_query("SELECT * FROM jenisSekolah ORDER BY JenisSekolah_ID");
                                while($w=mysql_fetch_array($tampil)){
                                  if ($r[JenisSekolah]==$w[Nama]){
                                    echo "<option value='$w[Nama]' selected>$w[JenisSekolah_ID] - $w[Nama]</option>";
                                  }else{
                                    echo "<option value='$w[Nama]'>$w[JenisSekolah_ID] - $w[Nama]</option>";
                                  }
                                }  
                    echo "</select></div></div>";
                 echo"<div class='form-group'>                     
                       <label class='col-lg-2 control-label' for='select02' style='font-size:13px;'>Jurusan Sekolah</label>
                         <div class='col-lg-10'>
                          <select id='select03' class='selectize-select' style='width: 350px' name='JurusanSekolah_ID'>
                                    <option value=0 selected>- Pilih Kategori -</option>";
                                    $tampil=mysql_query("SELECT * FROM jurusanSekolah");
                                      while($w=mysql_fetch_array($tampil)){
                                      if ($r[JurusanSekolah_ID]==$w[JurusanSekolah_ID]){
                                          echo "<option value=$w[JurusanSekolah_ID] selected>$w[Nama] - $w[NamaJurusan]</option>";
                                      }
                                      else{
                                          echo "<option value=$w[JurusanSekolah_ID]>$w[Nama] - $w[NamaJurusan]</option>";
                                      }
                                 }    
                    echo "</select></div></div>";                          
                    echo " <div class='form-group'>
                                <label class='col-lg-2 control-label' for='typeahead' style='font-size:13px;'>Tahun Lulus</label>
                                <div class='col-lg-10'>
                                    <input name='TahunLulus' value='$r[TahunLulus]' style='width:190px; height:27px;' type='text' class='form-control col-md-6' id='typeahead' data-provide='typeahead' data-items='4'>
                                </div>
                            </div>
                           <div class='form-group'>
                                <label class='col-lg-2 control-label' for='typeahead' style='font-size:13px;'>Nilai</label>
                                <div class='col-lg-10'>
                                    <input name='NilaiSekolah' value='$r[NilaiSekolah]' style='width:190px; height:27px;' type='text' class='form-control col-md-6' id='typeahead' data-provide='typeahead' data-items='4'>
                                </div>
                            </div>";                        
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
