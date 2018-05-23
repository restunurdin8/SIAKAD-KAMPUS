<?php
switch($_GET['halaman']){
     
  default:    
  ?>             
    <div class="col-md-10"> 
        <div class="col-lg-12">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <div class="text-muted bootstrap-admin-box-title" style="color:white;">Administrator | Master Matakuliah</div>
            </div>
              <div class="bootstrap-admin-panel-content">                   
                <?php 
            echo"<form method='post' action='?page=mastermatakuliah&halaman=cari'>
                  <table class='table table-striped' style='font-size:13px;'>
                      <tr><td>Institusi</td><td> :
                          <select name='ID'>
                            <option value=0 selected>- Pilih Institusi -</option>";
                            $tampil=mysql_query("SELECT * FROM identitas");
                            while($r=mysql_fetch_array($tampil)){
                              if ($r['Identitas_ID']==$_GET['ID']){
                                echo "<option value=$r[Identitas_ID] selected>$r[Identitas_ID] -- $r[Nama_Identitas]</option>";
                              }else{
                                 echo "<option value=$r[Identitas_ID]>$r[Identitas_ID] -- $r[Nama_Identitas]</option>";                           
                              }
                            }
                                echo "</select></td></tr>";
                          ?>                
                          <tr>
                            <td>Program Studi</td><td> : <select name="prodi" onChange="MM_jumpMenu('parent',this,0)">
                              <option value="media.php?page=mastermatakuliah">- Pilih Prodi -</option>
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
                            echo "<option value='?page=mastermatakuliah&ID=$r[Identitas_ID]&prodi=$r[Jurusan_ID]' $cek> $r[Jurusan_ID] - $r[nama_jurusan]</option>";
                      		}
                      		?>
                            </select>
                            <input name="prodi" type="hidden" value="<?php echo $_GET['prodi']; ?>"></td>
                          </tr>
                          <?php
                   echo"  <tr><td>Kurikulum</td><td> :
                            <select name='Kurikulum_ID'>
                              <option value=0 selected>- Pilih Kurikulum -</option>";
                              $tampil=mysql_query("SELECT * FROM kurikulum WHERE Identitas_ID='$_GET[ID]' AND Jurusan_ID='$_GET[prodi]' order by Kode");
                              while($r=mysql_fetch_array($tampil)){
                                echo "<option value=$r[Kurikulum_ID]>$r[Kode] -- $r[Nama]</option>";
                              }
                      echo "</select>&nbsp;<button class='btn btn-xs btn-primary' type='submit'><i class='glyphicon glyphicon-search'></i> Cari Matakuliah</button></td></tr>"; 

                  echo"   </table></form>
                        <table class='table table-striped' style='font-size:13px;''>
                        <form method='post' action='?page=mastermatakuliah&halaman=tambahmatakuliah'> 
                             &nbsp; <button class='btn btn-xs btn-success' type='submit'><i class='glyphicon glyphicon-plus'></i> Tambah Matakuliah</button>                    
                          </form>
                        <form method='post' action='?page=mastermatakuliah&halaman=kurikulum'> 
                             &nbsp; <button class='btn btn-xs btn-success' type='submit'><i class='glyphicon glyphicon-folder-open'></i> Daftar Kurikulum</button>                    
                          </form>                          
                  </table> <br />";
                   ?>
        <body class="bootstrap-admin-with-small-navbar">
            <table class="table table-striped table-bordered" id="example" style="font-size:12px;">
                <thead>
                  <tr style="background-color:#3e8bda; color:white;">
                      <th>No</th><th>Del</th><th>Edi</th><th>Kode & Nama Matakuliah</th>
                      <th>SKS</th><th>Smt</th><th>Stts MK</th><th>PJ</th>                    
                  </tr>
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
              <div class="text-muted bootstrap-admin-box-title" style="color:white;">Administrator | Master Matakuliah</div>
            </div>
              <div class="bootstrap-admin-panel-content">                   
           <?php
          echo" <form method='post' action='?page=mastermatakuliah&halaman=cari'>
                  <table class='table table-striped' style='font-size:13px;'>
                      <tr><td>Institusi</td><td> :
                          <select name='ID'>
                            <option value=0 selected>- Pilih Institusi -</option>";
                            $tampil=mysql_query("SELECT * FROM identitas");
                            while($r=mysql_fetch_array($tampil)){
                              if ($r['Identitas_ID']==$_REQUEST['ID']){
                                echo "<option value=$r[Identitas_ID] selected>$r[Identitas_ID] -- $r[Nama_Identitas]</option>";
                              }else{
                                 echo "<option value=$r[Identitas_ID]>$r[Identitas_ID] -- $r[Nama_Identitas]</option>";                           
                              }
                            }
                                echo "</select></td></tr>";
                          ?>                
                          <tr>
                            <td>Program Studi</td><td> : <select name="prodi" onChange="MM_jumpMenu('parent',this,0)">
                              <option value="media.php?page=mastermatakuliah">- Pilih Prodi -</option>
                          <?php
                      	  $sqlp="SELECT * FROM jurusan";
                      	  $qryp=mysql_query($sqlp)
                      	  or die();
                      	  while ($r=mysql_fetch_array($qryp)){
                          if ($r['Jurusan_ID']==$_REQUEST['prodi']){
                            $cek="selected";
                            }
                            else{
                              $cek="";
                            }
                            echo "<option value='?page=mastermatakuliah&ID=$r[Identitas_ID]&prodi=$r[Jurusan_ID]' $cek> $r[Jurusan_ID] - $r[nama_jurusan]</option>";
                      		}
                      		?>
                            </select>
                            <input name="prodi" type="hidden" value="<?php echo $_REQUEST['prodi']; ?>"></td>
                          </tr>
                          <?php
                 echo"  <tr><td>Kurikulum</td><td> :
                          <select name='Kurikulum_ID'>
                            <option value=0 selected>- Pilih Kurikulum -</option>";
                            $tampil=mysql_query("SELECT * FROM kurikulum WHERE Identitas_ID='$_REQUEST[ID]' AND Jurusan_ID='$_REQUEST[prodi]'");
                            while($r=mysql_fetch_array($tampil)){
                              if ($r['Kurikulum_ID']==$_REQUEST['Kurikulum_ID']){
                                echo "<option value=$r[Kurikulum_ID] selected>$r[Kode] -- $r[Nama]</option>";
                              }else{
                                 echo "<option value=$r[Kurikulum_ID]>$r[Kode] -- $r[Nama]</option>";                             
                              }
                            }
                      echo "</select>&nbsp;<button class='btn btn-xs btn-primary' type='submit'><i class='glyphicon glyphicon-search'></i> Cari Matakuliah</button></td></tr>"; 
                  echo"   </table></form>
                        <table class='table table-striped' style='font-size:13px;''>
                        <form method='post' action='?page=mastermatakuliah&halaman=tambahmatakuliah'> 
                             &nbsp; <button class='btn btn-xs btn-success' type='submit'><i class='glyphicon glyphicon-plus'></i> Tambah Matakuliah</button>                    
                          </form>
                        <form method='post' action='?page=mastermatakuliah&halaman=kurikulum'> 
                             <input name='Kurikulum_ID' type=hidden value='$_REQUEST[Kurikulum_ID]'>
                             <input name='ID' type=hidden value='$_REQUEST[ID]'>
                             <input name='prodi' type=hidden value='$_REQUEST[prodi]'>
                             &nbsp; <button class='btn btn-xs btn-success' type='submit'><i class='glyphicon glyphicon-folder-open'></i> Daftar Kurikulum</button>                    
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
          	$query= mysql_query("SELECT *
                                 FROM matakuliah 
                                 WHERE Identitas_ID='$_REQUEST[ID]' AND Jurusan_ID='$_REQUEST[prodi]' AND Kurikulum_ID='$_REQUEST[Kurikulum_ID]'
                                 ORDER BY Semester");
          	while ($r=mysql_fetch_array($query)){

            $no++;
            echo"  <tr class='odd gradeX'><td>$no</td>
                     <td width=10 align=center><a class=t href=\"form_mastermatakuliahact.php?page=mastermatakuliah&halaman=hapus&key=$r[Matakuliah_ID]&ID=$_REQUEST[ID]&prodi=$_REQUEST[prodi]&Kurikulum_ID=$_REQUEST[Kurikulum_ID]\"
                      onClick=\"return confirm('Apakah Anda benar-benar akan menghapus matakuliah ini ?')\"><img src=../images/del.png></a></td>
                     <td width=10><a class=t href=?page=mastermatakuliah&halaman=edit&key=$r[Matakuliah_ID]><img src=../images/edit.png></a></td>
                     <td>$r[Kode_mtk] - $r[Nama_matakuliah]</td>
                     <td>$r[SKS]</td>
                     <td>$r[Semester]</td>
                     <td>$r[StatusMtk_ID]</td>
                     <td>$r[Penanggungjawab]</td>
                    </tr>";
            }
            ?>
              </table>
          </div>
        </div>
      </div>
  <?php                                                                                
  break;  

  case"kurikulum":   
  ?>
    <div class="col-md-10"> 
        <div class="col-lg-12">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <div class="text-muted bootstrap-admin-box-title" style="color:white;">Administrator | Master Kurikulum</div>
            </div>
              <div class="bootstrap-admin-panel-content">                   
           <?php
          echo" <form method='post' action='?page=mastermatakuliah&halaman=kurikulum'>
                  <table class='table table-striped' style='font-size:13px;'>
                      <tr><td>Institusi</td><td> :
                          <select name='ID'>
                            <option value=0 selected>- Pilih Institusi -</option>";
                            $tampil=mysql_query("SELECT * FROM identitas");
                            while($r=mysql_fetch_array($tampil)){
                              if ($r['Identitas_ID']==$_REQUEST['ID']){
                                echo "<option value=$r[Identitas_ID] selected>$r[Identitas_ID] -- $r[Nama_Identitas]</option>";
                              }else{
                                 echo "<option value=$r[Identitas_ID]>$r[Identitas_ID] -- $r[Nama_Identitas]</option>";                           
                              }
                            }
                                echo "</select></td></tr>";
                 echo"  <tr><td>Program Studi</td><td> :
                          <select name='prodi'>
                            <option value=0 selected>- Pilih Prodi -</option>";
                            $tampil=mysql_query("SELECT * FROM jurusan");
                            while($r=mysql_fetch_array($tampil)){
                              if ($r['Jurusan_ID']==$_REQUEST['prodi']){ 
                                echo "<option value=$r[Jurusan_ID] selected>$r[Jurusan_ID] -- $r[nama_jurusan]</option>";
                              }else{
                                 echo "<option value=$r[Jurusan_ID]>$r[Jurusan_ID] -- $r[nama_jurusan]</option>";                             
                              }
                            }
                    echo "</select>&nbsp;<button class='btn btn-xs btn-primary' type='submit'><i class='glyphicon glyphicon-search'></i> Cari Kurikulum</button></td></tr>";
                  echo"   </table></form>
                        <table class='table table-striped' style='font-size:13px;''>
                        <form method='post' action='?page=mastermatakuliah&halaman=cari'> 
                             <input name='ID' type=hidden value='$_REQUEST[ID]'>
                             <input name='prodi' type=hidden value='$_REQUEST[prodi]'>
                             &nbsp; <button class='btn btn-xs btn-success' type='submit'><i class='glyphicon glyphicon-folder-open'></i> Daftar Matakuliah</button>                    
                          </form> 
                        <form method='post' action='?page=mastermatakuliah&halaman=tambahmakurikulum'> 
                             <input name='Kurikulum_ID' type=hidden value='$_REQUEST[Kurikulum_ID]'>
                             &nbsp; <button class='btn btn-xs btn-success' type='submit'><i class='glyphicon glyphicon-plus'></i> Tambah Kurikulum</button>                    
                          </form>                                          
                </table> <br />"; 
                ?>
          <body class="bootstrap-admin-with-small-navbar">
              <table  class="table table-hover" id="example" style="font-size:12px;">
                  <thead>
                    <tr style="background-color:#3e8bda; color:white;">
                      <th>No</th><th>Del</th><th>Edit</th><th>Kode & Nama Kurikulum</th><th>Status</th>                    
                    </tr>
                  </thead>
                <tbody>
            <?php
          	$query= mysql_query("SELECT *
                                 FROM kurikulum 
                                 WHERE Identitas_ID='$_REQUEST[ID]' AND Jurusan_ID='$_REQUEST[prodi]'
                                 ORDER BY Kode");
          	while ($r=mysql_fetch_array($query)){

            $no++;
            echo"  <tr class='odd gradeX'><td>$no</td>
                     <td width=10 align=center><a class=t href=\"form_mastermatakuliahact.php?page=mastermatakuliah&halaman=hapuskurikulum&key=$r[Kurikulum_ID]&ID=$_REQUEST[ID]&prodi=$_REQUEST[prodi]&Kurikulum_ID=$_REQUEST[Kurikulum_ID]\"
                      onClick=\"return confirm('Apakah Anda benar-benar akan menghapus kurikulum ini ?')\"><img src=../images/del.png></a></td>
                     <td width=10><a class=t href=?page=mastermatakuliah&halaman=editkurikulum&key=$r[Kurikulum_ID]&Kurikulum_ID=$_REQUEST[Kurikulum_ID]><img src=../images/edit.png></a></td>
                     <td>$r[Kode] - $r[Nama]</td>
                     <td>$r[Aktif]</td>
                    </tr>";
            }
            ?>
              </table>
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
                <div class="text-muted bootstrap-admin-box-title" style="color:white;">Administrator | Tambah Matakuliah</div>
            </div>
      <?php
      echo"  <div class='bootstrap-admin-no-table-panel-content bootstrap-admin-panel-content collapse in'>
                 <form class='form-horizontal' method='post' action='form_mastermatakuliahact.php?page=mastermatakuliah&halaman=simpan'>
                   <fieldset>
                      <legend>Set Matakuliah</legend>";
              echo"  <div class='form-group'>                     
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
                            echo "<option value='?page=mastermatakuliah&halaman=tambahmatakuliah&ID=$r[Identitas_ID]&prodi=$r[Jurusan_ID]' $cek> $r[Jurusan_ID] - $r[nama_jurusan]</option>";
                      		}
                      		?>
                            </select>
                            <input name="prodi" type="hidden" value="<?php echo $_GET['prodi']; ?>"></td>
                          </div></div>
                          <?php
                 echo"<div class='form-group'>                     
                       <label class='col-lg-2 control-label' for='select02' style='font-size:13px;'>Kurikulum</label>
                         <div class='col-lg-10'>
                          <select id='select03' class='selectize-select' style='width: 350px' name='Kurikulum_ID'>
                            <option value=0 selected>- Pilih Kurikulum -</option>";
                            $tampil=mysql_query("SELECT * FROM kurikulum where Jurusan_ID='$_GET[prodi]'");
                            while($r=mysql_fetch_array($tampil)){
                                echo "<option value=$r[Kurikulum_ID]>$r[Kode] -- $r[Nama]</option>";
                            }
                            echo "</select></div></div>";
                 echo"<div class='form-group'>                     
                       <label class='col-lg-2 control-label' for='select02' style='font-size:13px;'>Kelompok Matakuliah</label>
                         <div class='col-lg-10'>
                          <select id='select01' class='selectize-select' style='width: 350px;' name='KelompokMtk_ID'>
                            <option value=0 selected>- Pilih Kelompok MK -</option>";
                            $tampil=mysql_query("SELECT * FROM kelompokmtk");
                            while($r=mysql_fetch_array($tampil)){
                                echo "<option value=$r[KelompokMtk_ID]>$r[KelompokMtk_ID] -- $r[Nama]</option>";
                            }
                            echo "</select></div></div>";
                 echo"<div class='form-group'>                     
                       <label class='col-lg-2 control-label' for='select02' style='font-size:13px;'>Jenis Matakuliah</label>
                         <div class='col-lg-10'>
                          <select id='select01' class='selectize-select' style='width: 350px;' name='JenisMTK_ID'>
                            <option value=0 selected>- Pilih Jenis MK -</option>";
                            $tampil=mysql_query("SELECT * FROM jenismk");
                            while($r=mysql_fetch_array($tampil)){
                                echo "<option value=$r[JenisMTK_ID]>$r[JenisMTK_ID] -- $r[Nama]</option>";
                            }
                            echo "</select></div></div>";
                 echo"<div class='form-group'>                     
                       <label class='col-lg-2 control-label' for='select02' style='font-size:13px;'>Jenis Kurikulum MK</label>
                         <div class='col-lg-10'>
                          <select id='select01' class='selectize-select' style='width: 350px;' name='JenisKurikulum_ID'>
                            <option value=0 selected>- Pilih Jenis Kurikulum MK -</option>";
                            $tampil=mysql_query("SELECT * FROM jeniskurikulum");
                            while($r=mysql_fetch_array($tampil)){
                                echo "<option value=$r[JenisKurikulum_ID]>$r[JenisKurikulum_ID] -- $r[Nama]</option>";
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
  
  case "tambahmakurikulum":
  ?>
  <div class="col-md-10">
    <div class="col-lg-12">                                                                              
        <div class="panel panel-primary bootstrap-admin-no-table-panel">                                                    
            <div class="panel-heading">
                <div class="text-muted bootstrap-admin-box-title" style="color:white;">Administrator | Tambah Kurikulum</div>
            </div>
      <?php
      echo"  <div class='bootstrap-admin-no-table-panel-content bootstrap-admin-panel-content collapse in'>
                 <form class='form-horizontal' method='post' action='form_mastermatakuliahact.php?page=mastermatakuliah&halaman=simpankurikulum'>
                 <input type=hidden value='$_POST[Kurikulum_ID]' name=Kurikulum_ID>
                   <fieldset>
                      <legend>Set Kurikulum</legend>";
                 echo"<div class='form-group'>                     
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
                         <div class='col-lg-10'>
                          <select id='select02' class='selectize-select' style='width: 350px' name='prodi'>
                            <option value=0 selected>- Pilih Prodi -</option>";
                            $tampil=mysql_query("SELECT * FROM jurusan");
                            while($r=mysql_fetch_array($tampil)){
                                echo "<option value=$r[Jurusan_ID]>$r[Jurusan_ID] -- $r[nama_jurusan]</option>";
                            }
                            echo "</select></div></div>";

                 echo"<div class='form-group'>
                          <label class='col-lg-2 control-label' for='typeahead' style='font-size:13px;'>Kode Kurikulum</label>
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
  $e=mysql_query("SELECT * FROM matakuliah WHERE 	Matakuliah_ID='$_GET[key]'");
  $r=mysql_fetch_array($e);

  echo"
  <div class='col-md-10'>
    <div class='col-lg-12'>                                                                              
        <div class='panel panel-primary bootstrap-admin-no-table-panel'>                                                    
            <div class='panel-heading'>
                <div class='text-muted bootstrap-admin-box-title' style='color:white;'>Administrator | Perbaharui Matakuliah</div>
            </div>
            <div class='bootstrap-admin-no-table-panel-content bootstrap-admin-panel-content collapse in'>
                 <form class='form-horizontal' method='post' action='form_mastermatakuliahact.php?page=mastermatakuliah&halaman=perbaharui'>
                 <input type=hidden value='$r[Matakuliah_ID]' name=key>
                   <fieldset>
                      <legend>Set Matakuliah</legend>";
                 echo"<div class='form-group'>                     
                       <label class='col-lg-2 control-label' for='select02' style='font-size:13px;'>Institusi</label>
                         <div class='col-lg-10'>
                          <select id='select01' class='selectize-select' style='width: 350px;' name='ID'>
                            <option value=0 selected>- Pilih Institusi -</option>";
                            $tampil=mysql_query("SELECT * FROM identitas");
                            while($w=mysql_fetch_array($tampil)){
                              if ($w['Identitas_ID']==$r['Identitas_ID']){
                                echo "<option value=$w[Identitas_ID] selected>$w[Identitas_ID] -- $w[Nama_Identitas]</option>";
                              }else{
                                 echo "<option value=$w[Identitas_ID]>$w[Identitas_ID] -- $w[Nama_Identitas]</option>";                           
                              }
                            }
                     echo "</select></div></div>";
                 echo"<div class='form-group'>                     
                       <label class='col-lg-2 control-label' for='select02' style='font-size:13px;'>Program Studi</label>
                         <div class='col-lg-10'>
                          <select id='select02' class='selectize-select' style='width: 350px' name='prodi'>
                            <option value=0 selected>- Pilih Prodi -</option>";
                            $tampil=mysql_query("SELECT * FROM jurusan");
                            while($w=mysql_fetch_array($tampil)){
                              if ($w['Jurusan_ID']==$r['Jurusan_ID']){ 
                                echo "<option value=$w[Jurusan_ID] selected>$w[Jurusan_ID] -- $w[nama_jurusan]</option>";
                              }else{
                                 echo "<option value=$w[Jurusan_ID]>$w[Jurusan_ID] -- $w[nama_jurusan]</option>";                             
                              }
                            }
                    echo "</select></div></div>";
                 echo"<div class='form-group'>                     
                       <label class='col-lg-2 control-label' for='select02' style='font-size:13px;'>Kurikulum</label>
                         <div class='col-lg-10'>
                          <select id='select03' class='selectize-select' style='width: 350px' name='Kurikulum_ID'>
                            <option value=0 selected>- Pilih Kurikulum -</option>";
                            $tampil=mysql_query("SELECT * FROM kurikulum");
                            while($w=mysql_fetch_array($tampil)){
                              if ($w['Kurikulum_ID']==$r['Kurikulum_ID']){
                                echo "<option value=$w[Kurikulum_ID] selected>$w[Kode] -- $w[Nama]</option>";
                              }else{
                                 echo "<option value=$w[Kurikulum_ID]>$w[Kode] -- $w[Nama]</option>";                             
                              }
                            }
                            echo "</select></div></div>";
                 echo"<div class='form-group'>                     
                       <label class='col-lg-2 control-label' for='select02' style='font-size:13px;'>Kelompok Matakuliah</label>
                         <div class='col-lg-10'>
                          <select id='select01' class='selectize-select' style='width: 350px;' name='KelompokMtk_ID'>
                            <option value=0 selected>- Pilih Kelompok MK -</option>";
                            $tampil=mysql_query("SELECT * FROM kelompokmtk");
                            while($w=mysql_fetch_array($tampil)){
                              if ($w['KelompokMtk_ID']==$r['KelompokMtk_ID']){
                                echo "<option value=$w[KelompokMtk_ID] selected>$w[KelompokMtk_ID] -- $w[Nama]</option>";
                              }else{
                                 echo "<option value=$w[KelompokMtk_ID]>$w[KelompokMtk_ID] -- $w[Nama]</option>";                             
                              }
                            }
                            echo "</select></div></div>";
                 echo"<div class='form-group'>                     
                       <label class='col-lg-2 control-label' for='select02' style='font-size:13px;'>Jenis Matakuliah</label>
                         <div class='col-lg-10'>
                          <select id='select01' class='selectize-select' style='width: 350px;' name='JenisMTK_ID'>
                            <option value=0 selected>- Pilih Jenis MK -</option>";
                            $tampil=mysql_query("SELECT * FROM jenismk");
                            while($w=mysql_fetch_array($tampil)){
                              if ($w['JenisMTK_ID']==$r['JenisMTK_ID']){
                                echo "<option value=$w[JenisMTK_ID] selected>$w[JenisMTK_ID] -- $w[Nama]</option>";
                              }else{
                                 echo "<option value=$w[JenisMTK_ID]>$w[JenisMTK_ID] -- $w[Nama]</option>";                             
                              }
                            }
                            echo "</select></div></div>";
                 echo"<div class='form-group'>                     
                       <label class='col-lg-2 control-label' for='select02' style='font-size:13px;'>Jenis Kurikulum MK</label>
                         <div class='col-lg-10'>
                          <select id='select01' class='selectize-select' style='width: 350px;' name='JenisKurikulum_ID'>
                            <option value=0 selected>- Pilih Jenis Kurikulum MK -</option>";
                            $tampil=mysql_query("SELECT * FROM jeniskurikulum");
                            while($w=mysql_fetch_array($tampil)){
                              if ($w['JenisKurikulum_ID']==$r['JenisKurikulum_ID']){
                                echo "<option value=$w[JenisKurikulum_ID] selected>$w[JenisKurikulum_ID] -- $w[Nama]</option>";
                              }else{
                                 echo "<option value=$w[JenisKurikulum_ID]>$w[JenisKurikulum_ID] -- $w[Nama]</option>";                             
                              }
                            }
                            echo "</select></div></div>";
                 echo"<div class='form-group'>                     
                       <label class='col-lg-2 control-label' for='select02' style='font-size:13px;'>Status MK</label>
                         <div class='col-lg-10'>
                          <select id='select01' class='selectize-select' style='width: 350px;' name='StatusMtk_ID'>
                            <option value=0 selected>- Pilih Status MK -</option>";
                            $tampil=mysql_query("SELECT * FROM statusmtk");
                            while($w=mysql_fetch_array($tampil)){
                              if ($w['StatusMtk_ID']==$r['StatusMtk_ID']){
                                echo "<option value=$w[StatusMtk_ID] selected>$w[StatusMtk_ID] -- $w[Nama]</option>";
                              }else{
                                 echo "<option value=$w[StatusMtk_ID]>$w[StatusMtk_ID] -- $w[Nama]</option>";                             
                              }
                            }
                            echo "</select></div></div>";
                 echo"<div class='form-group'>
                          <label class='col-lg-2 control-label' for='typeahead' style='font-size:13px;'>Kode Matakuliah</label>
                          <div class='col-lg-10'>
                              <input name='Kode_mtk' value='$r[Kode_mtk]' style='width:120px; height:25px;' type='text' class='form-control col-md-6' id='typeahead' data-provide='typeahead' data-items='4'>
                          </div>
                      </div>
                     <div class='form-group'>
                          <label class='col-lg-2 control-label' for='typeahead' style='font-size:13px;'>Nama Matakuliah</label>
                          <div class='col-lg-10'>
                              <input name='Nama_matakuliah' value='$r[Nama_matakuliah]' style='width:300px; height:25px;' type='text' class='form-control col-md-6' id='typeahead' data-provide='typeahead' data-items='4'>
                          </div>
                      </div> 
                     <div class='form-group'>
                          <label class='col-lg-2 control-label' for='typeahead' style='font-size:13px;'>Nama English</label>
                          <div class='col-lg-10'>
                              <input name='Nama_english' value='$r[Nama_english]' style='width:300px; height:25px;' type='text' class='form-control col-md-6' id='typeahead' data-provide='typeahead' data-items='4'>
                          </div>
                      </div>  
                     <div class='form-group'>
                          <label class='col-lg-2 control-label' for='typeahead' style='font-size:13px;'>Semester</label>
                          <div class='col-lg-10'>
                              <input name='Semester' value='$r[Semester]' style='width:80px; height:25px;' type='text' class='form-control col-md-6' id='typeahead' data-provide='typeahead' data-items='4'>
                          </div>
                      </div>
                     <div class='form-group'>
                          <label class='col-lg-2 control-label' for='typeahead' style='font-size:13px;'>SKS</label>
                          <div class='col-lg-10'>
                              <input name='SKS' value='$r[SKS]' style='width:80px; height:25px;' type='text' class='form-control col-md-6' id='typeahead' data-provide='typeahead' data-items='4'>
                          </div>
                      </div>
                     <div class='form-group'>
                          <label class='col-lg-2 control-label' for='typeahead' style='font-size:13px;'>Penanggung Jawab</label>
                          <div class='col-lg-10'>
                              <input name='Penanggungjawab' value='$r[Penanggungjawab]' style='width:300px; height:25px;' type='text' class='form-control col-md-6' id='typeahead' data-provide='typeahead' data-items='4'>
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


  case "editkurikulum":
  $e=mysql_query("SELECT * FROM kurikulum WHERE Kurikulum_ID='$_GET[key]'");
  $r=mysql_fetch_array($e);

  echo"
  <div class='col-md-10'>
    <div class='col-lg-12'>                                                                              
        <div class='panel panel-primary bootstrap-admin-no-table-panel'>                                                    
            <div class='panel-heading'>
                <div class='text-muted bootstrap-admin-box-title' style='color:white;'>Administrator | Perbaharui Kurikulum</div>
            </div>
            <div class='bootstrap-admin-no-table-panel-content bootstrap-admin-panel-content collapse in'>
                 <form class='form-horizontal' method='post' action='form_mastermatakuliahact.php?page=mastermatakuliah&halaman=perbaharuikurikulum'>
                 <input type=hidden value='$r[Kurikulum_ID]' name=key>
                 <input type=hidden value='$_GET[Kurikulum_ID]' name=Kurikulum_ID>
                   <fieldset>
                      <legend>Set Kurikulum</legend>";
                 echo"<div class='form-group'>                     
                       <label class='col-lg-2 control-label' for='select02' style='font-size:13px;'>Institusi</label>
                         <div class='col-lg-10'>
                          <select id='select01' class='selectize-select' style='width: 350px;' name='ID'>
                            <option value=0 selected>- Pilih Institusi -</option>";
                            $tampil=mysql_query("SELECT * FROM identitas");
                            while($w=mysql_fetch_array($tampil)){
                              if ($w['Identitas_ID']==$r['Identitas_ID']){
                                echo "<option value=$w[Identitas_ID] selected>$w[Identitas_ID] -- $w[Nama_Identitas]</option>";
                              }else{
                                 echo "<option value=$w[Identitas_ID]>$w[Identitas_ID] -- $w[Nama_Identitas]</option>";                           
                              }
                            }
                     echo "</select></div></div>";
                 echo"<div class='form-group'>                     
                       <label class='col-lg-2 control-label' for='select02' style='font-size:13px;'>Program Studi</label>
                         <div class='col-lg-10'>
                          <select id='select02' class='selectize-select' style='width: 350px' name='prodi'>
                            <option value=0 selected>- Pilih Prodi -</option>";
                            $tampil=mysql_query("SELECT * FROM jurusan");
                            while($w=mysql_fetch_array($tampil)){
                              if ($w['Jurusan_ID']==$r['Jurusan_ID']){ 
                                echo "<option value=$w[Jurusan_ID] selected>$w[Jurusan_ID] -- $w[nama_jurusan]</option>";
                              }else{
                                 echo "<option value=$w[Jurusan_ID]>$w[Jurusan_ID] -- $w[nama_jurusan]</option>";                             
                              }
                            }
                    echo "</select></div></div>";
                 echo"<div class='form-group'>
                          <label class='col-lg-2 control-label' for='typeahead' style='font-size:13px;'>Kode Kurikulum</label>
                          <div class='col-lg-10'>
                              <input name='Kode' value='$r[Kode]' style='width:80px; height:25px;' type='text' class='form-control col-md-6' id='typeahead' data-provide='typeahead' data-items='4'>
                          </div>
                      </div>
                     <div class='form-group'>
                          <label class='col-lg-2 control-label' for='typeahead' style='font-size:13px;'>Nama Kurikulum</label>
                          <div class='col-lg-10'>
                              <input name='Nama' value='$r[Nama]' style='width:300px; height:25px;' type='text' class='form-control col-md-6' id='typeahead' data-provide='typeahead' data-items='4'>
                          </div>
                      </div>";       
                 echo"<div class='form-group'>"; 
                      if ($r[Aktif]=='Y'){
                          echo "<label class='col-lg-2 control-label' for='typeahead' style='font-size:13px;'>Aktif</label>    
                                <div class='col-lg-10'>
                                  <input type=radio name=Aktif value=Y checked>Y
                                  <input type=radio name=Aktif value=N>N</div>";
                      }
                      else{
                          echo "<label class='col-lg-2 control-label' for='typeahead' style='font-size:13px;'>Aktif</label>    
                                <div class='col-lg-10'>
                                  <input type=radio name=Aktif value=Y>Y
                                  <input type=radio name=Aktif value=N checked>N</div>";
                      }
                  echo"</div>    
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
