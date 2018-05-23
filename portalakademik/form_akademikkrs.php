<?php
switch($_GET['halaman']){
     
  default:    
  ?>             
    <div class="col-md-10"> 
        <div class="col-lg-12">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <div class="text-muted bootstrap-admin-box-title" style="color:white;">Administrator | KRS Mahasiswa</div>
            </div>
              <div class="bootstrap-admin-panel-content">                   
                <form method="post" action="?page=akademikkrs&halaman=cari">
                  <table class="table table-striped" style="font-size:13px;">
  
                    <?php
                    echo" <tr><td>Institusi</td><td> 
                            <select name='ID'>
                              <option value=0 selected>- Pilih Institusi -</option>";
                              $tampil=mysql_query("SELECT * FROM identitas");
                              while($r=mysql_fetch_array($tampil)){
                                  echo "<option value=$r[Identitas_ID]>$r[Identitas_ID] -- $r[Nama_Identitas]</option>";
                              }
                                  echo "</select></td></tr>";
                   echo"  <tr><td>Program Studi</td><td> 
                            <select name='prodi'>
                              <option value=0 selected>- Pilih Prodi -</option>";
                              $tampil=mysql_query("SELECT * FROM jurusan");
                              while($r=mysql_fetch_array($tampil)){
                                echo "<option value=$r[Jurusan_ID]>$r[Jurusan_ID] -- $r[nama_jurusan]</option>";
                              }
                      echo "</select></td></tr>";
                   echo"  <tr><td>Program</td><td> 
                            <select name='prog'>
                              <option value=0 selected>- Pilih Program -</option>";
                              $tampil=mysql_query("SELECT * FROM program");
                              while($r=mysql_fetch_array($tampil)){
                                echo "<option value=$r[ID]>$r[Program_ID] -- $r[nama_program]</option>";
                              }
                      echo "</select></td></tr>"; 
                   echo"  <tr><td>Angkatan</td><td> &nbsp; <input name='Angkatan' style='width:80px; height:25px;' type='text' class='form-control col-md-6' id='typeahead' autocomplete='off' data-provide='typeahead' data-items='4'> 
                          <tr><td>Tahun</td><td> &nbsp; <input name='Tahun_ID' style='width:80px; height:25px;' type='text' class='form-control col-md-6' id='typeahead' autocomplete='off' data-provide='typeahead' data-items='4'>
                      <button class='btn btn-xs btn-primary' type='submit'><i class='glyphicon glyphicon-search'></i> Cari Data</button></td></tr>";
                   ?>
  
  
                  </table> <br />
                </form>
  
          <body class="bootstrap-admin-with-small-navbar">
              <table  class="table table-hover" id="example" style="font-size:12px;">
                  <thead>
                    <tr style="background-color:#3e8bda; color:white;">
                      <th>No</th><th>NIM</th><th>Nama Mahasiswa</th><th>Status KRS</th><th>Edit</th>                    
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
              <div class="text-muted bootstrap-admin-box-title" style="color:white;">Administrator | KRS Mahasiswa</div>
            </div>
              <div class="bootstrap-admin-panel-content">                   
                <form method="post" action="?page=akademikkrs&halaman=cari">
                  <table class="table table-striped" style="font-size:13px;">
                  <?php  
                  echo" <tr><td>Institusi</td><td> 
                          <select name='ID'>
                            <option value=0 selected>- Pilih Institusi -</option>";
                            $tampil=mysql_query("SELECT * FROM identitas");
                            while($r=mysql_fetch_array($tampil)){
                              if ($r[Identitas_ID]==$_REQUEST[ID]){
                                echo "<option value=$r[Identitas_ID] selected>$r[Identitas_ID] -- $r[Nama_Identitas]</option>";
                              }else{
                                 echo "<option value=$r[Identitas_ID]>$r[Identitas_ID] -- $r[Nama_Identitas]</option>";                           
                              }
                            }
                                echo "</select></td></tr>";
                 echo"  <tr><td>Program Studi</td><td> 
                          <select name='prodi'>
                            <option value=0 selected>- Pilih Prodi -</option>";
                            $tampil=mysql_query("SELECT * FROM jurusan");
                            while($r=mysql_fetch_array($tampil)){
                              if ($r[Jurusan_ID]==$_REQUEST[prodi]){ 
                                echo "<option value=$r[Jurusan_ID] selected>$r[Jurusan_ID] -- $r[nama_jurusan]</option>";
                              }else{
                                 echo "<option value=$r[Jurusan_ID]>$r[Jurusan_ID] -- $r[nama_jurusan]</option>";                             
                              }
                            }
                    echo "</select></td></tr>";
                 echo"  <tr><td>Program</td><td> 
                          <select name='prog'>
                            <option value=0 selected>- Pilih Program -</option>";
                            $tampil=mysql_query("SELECT * FROM program");
                            while($r=mysql_fetch_array($tampil)){
                              if ($r[ID]==$_REQUEST[prog]){
                                echo "<option value=$r[ID] selected>$r[Program_ID] -- $r[nama_program]</option>";
                              }else{
                                 echo "<option value=$r[ID]>$r[Program_ID] -- $r[nama_program]</option>";                             
                              }
                            }
                    echo "</select> </td></tr>";
                   echo"  <tr><td>Angkatan</td><td> &nbsp; <input name='Angkatan' value='$_REQUEST[Angkatan]' style='width:80px; height:25px;' type='text' class='form-control col-md-6' id='typeahead' autocomplete='off' data-provide='typeahead' data-items='4'> 
                          <tr><td>Tahun</td><td> &nbsp; <input name='Tahun_ID' value='$_REQUEST[Tahun_ID]' style='width:80px; height:25px;' type='text' class='form-control col-md-6' id='typeahead' autocomplete='off' data-provide='typeahead' data-items='4'>
                          <button class='btn btn-xs btn-primary' type='submit'> <i class='glyphicon glyphicon-search'></i> Cari Data</button></td></tr>";
                 ?>

                 </tbody>
                </table> <br />
              </form>

          <body class="bootstrap-admin-with-small-navbar">
              <table  class="table table-hover" id="example" style="font-size:12px;">
                  <thead>
                    <tr style="background-color:#3e8bda; color:white;">
                      <th>No</th><th>NIM</th><th>Nama Mahasiswa</th><th>Status KRS</th><th>Edit</th>                    
                    </tr>
                  </thead>
                <tbody>
            <?php
          	$query= mysql_query("SELECT b.KRS_ID,b.Tahun_ID,a.NIM,a.Nama  
                                 FROM mahasiswa a LEFT JOIN krs b ON a.NIM=b.NIM AND b.Tahun_ID='$_REQUEST[Tahun_ID]'
                                 WHERE a.Angkatan='$_REQUEST[Angkatan]' AND a.Identitas_ID='$_REQUEST[ID]' AND a.Jurusan_ID='$_REQUEST[prodi]' AND 
                                       a.Program_ID='$_REQUEST[prog]' AND a.Tahun_ID <='$_REQUEST[Tahun_ID]'
                                 GROUP BY a.NIM ORDER BY a.NIM");
          	while ($r=mysql_fetch_array($query)){
            if ($r['KRS_ID'] > 0)
              $label="<span class='label label-success' style='font-size:12px;'>Tersimpan . . .</span>";
            else
              $label="";
            $no++;
            echo"  <tr class='odd gradeX'>
                     <td width=10>$no</td>
                     <td>$r[NIM]</td>
                     <td>$r[Nama]</td>
                     <td>$label</td>                     
                     <td width=90><form method='post' action='?page=akademikkrs&halaman=lihatkrs'>
                                    <input name='Tahun_ID' type=hidden value='$_REQUEST[Tahun_ID]'>
                                    <input name='Angkatan' type=hidden value='$_REQUEST[Angkatan]'>
                                    <input name='NIM' type=hidden value='$r[NIM]'>
                                    <input name='ID' type=hidden value='$_REQUEST[ID]'>
                                    <input name='prodi' type=hidden value='$_REQUEST[prodi]'>
                                    <input name='prog' type=hidden value='$_REQUEST[prog]'>
                      <button class='btn btn-sm btn-primary' style='height:27px;'>
                         <i class='glyphicon glyphicon-pencil'></i> Edit
                      </button>
                     </a></td></form>  
                    </tr>";
            }
            ?>
              </table>
          </div>
        </div>
      </div>
  <?php                                                                                
  break;  
  
  case"lihatkrs":   
  ?>
    <div class="col-md-10"> 
        <div class="col-lg-12">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <div class="text-muted bootstrap-admin-box-title" style="color:white;">Administrator | KRS Mahasiswa</div>
            </div>
              <div class="bootstrap-admin-panel-content">                   
                <form method="post" action="?page=akademikkrs&halaman=cari">
                  <table class="table table-striped" style="font-size:13px;">
                  <?php  
                  echo" <tr><td>Institusi</td><td> 
                          <select name='ID'>
                            <option value=0 selected>- Pilih Institusi -</option>";
                            $tampil=mysql_query("SELECT * FROM identitas");
                            while($r=mysql_fetch_array($tampil)){
                              if ($r[Identitas_ID]==$_REQUEST[ID]){
                                echo "<option value=$r[Identitas_ID] selected>$r[Identitas_ID] -- $r[Nama_Identitas]</option>";
                              }else{
                                 echo "<option value=$r[Identitas_ID]>$r[Identitas_ID] -- $r[Nama_Identitas]</option>";                           
                              }
                            }
                                echo "</select></td></tr>";
                 echo"  <tr><td>Program Studi</td><td> 
                          <select name='prodi'>
                            <option value=0 selected>- Pilih Prodi -</option>";
                            $tampil=mysql_query("SELECT * FROM jurusan");
                            while($r=mysql_fetch_array($tampil)){
                              if ($r[Jurusan_ID]==$_REQUEST[prodi]){ 
                                echo "<option value=$r[Jurusan_ID] selected>$r[Jurusan_ID] -- $r[nama_jurusan]</option>";
                              }else{
                                 echo "<option value=$r[Jurusan_ID]>$r[Jurusan_ID] -- $r[nama_jurusan]</option>";                             
                              }
                            }
                    echo "</select></td></tr>";
                 echo"  <tr><td>Program</td><td> 
                          <select name='prog'>
                            <option value=0 selected>- Pilih Program -</option>";
                            $tampil=mysql_query("SELECT * FROM program");
                            while($r=mysql_fetch_array($tampil)){
                              if ($r[ID]==$_REQUEST[prog]){
                                echo "<option value=$r[ID] selected>$r[Program_ID] -- $r[nama_program]</option>";
                              }else{
                                 echo "<option value=$r[ID]>$r[Program_ID] -- $r[nama_program]</option>";                             
                              }
                            }
                    echo "</select> </td></tr>";
                   echo"  <tr><td>Angkatan</td><td> &nbsp; <input name='Angkatan' value='$_REQUEST[Angkatan]' style='width:80px; height:25px;' type='text' class='form-control col-md-6' id='typeahead' autocomplete='off' data-provide='typeahead' data-items='4'> 
                          <tr><td>Tahun</td><td> &nbsp; <input name='Tahun_ID' value='$_REQUEST[Tahun_ID]' style='width:80px; height:25px;' type='text' class='form-control col-md-6' id='typeahead' autocomplete='off' data-provide='typeahead' data-items='4'>
                          <button class='btn btn-xs btn-primary' type='submit'><i class='glyphicon glyphicon-search'></i> Cari Data</button></td></tr>";
                 ?>

                 </tbody>
                </table> <br />
              </form>
            <?php 
     $query=mysql_query("SELECT a.NIM,a.Nama,a.StatusMhsw_ID,c.Nama AS status
                         FROM mahasiswa a LEFT JOIN statusmhsw c ON a.StatusMhsw_ID=c.StatusMhsw_ID
                         WHERE  a.NIM='$_REQUEST[NIM]'");
     $r=mysql_fetch_array($query);
     echo" <table class='table table-striped' style='font-size:13px;''>
            <tr><td><strong>NIM</strong></td><td><strong>: $_REQUEST[NIM] </strong></td><td><strong>Penasehat Akademik</strong></td> <td><strong>: $r[PenasehatAkademik]</strong></td></tr>         
            <tr><td><strong>Nama</strong></td><td><strong>: $r[Nama] </strong></td><td><strong> Status Mahasiswa</strong></td> <td><strong>: $r[StatusMhsw_ID] - $r[status]</strong></td></tr>          
          </table>";
     echo"<form method='post' action='?page=akademikkrs&halaman=tambahkrs'> 
          <table class='table table-striped' style='font-size:13px;''>
             <input name='Tahun_ID' type=hidden value='$_REQUEST[Tahun_ID]'>
             <input name='Angkatan' type=hidden value='$_REQUEST[Angkatan]'>
             <input name='NIM' type=hidden value='$r[NIM]'>
             <input name='ID' type=hidden value='$_REQUEST[ID]'>
             <input name='prodi' type=hidden value='$_REQUEST[prodi]'>
             <input name='prog' type=hidden value='$_REQUEST[prog]'>
            <button class='btn btn-xs btn-success' type='submit'><i class='glyphicon glyphicon-plus'></i> Tambah Jadwal</button>                    
          </form>
        <form method='post' target=_new action='cetakkrs.php'> 

             <input name='Tahun_ID' type=hidden value='$_REQUEST[Tahun_ID]'>
             <input name='Angkatan' type=hidden value='$_REQUEST[Angkatan]'>
             <input name='NIM' type=hidden value='$r[NIM]'>
             <input name='ID' type=hidden value='$_REQUEST[ID]'>
             <input name='prodi' type=hidden value='$_REQUEST[prodi]'>
             <input name='prog' type=hidden value='$_REQUEST[prog]'>
             &nbsp; <button class='btn btn-xs btn-success' type='submit'><i class='glyphicon glyphicon-print'></i> Cetak KRS</button>                    
          </form>          
          </table>";
          ?>
          <body class="bootstrap-admin-with-small-navbar">
              <table  class="table table-hover" id="example" style="font-size:12px;">
                  <thead>
                    <tr style="background-color:#3e8bda; color:white;">
                      <th>No</th><th>Kode MK</th><th>Nama MK</th><th>SKS</th><th>Smt</th><th>Ruang</th><th>Hari</th><th>Jam Kuliah</th><th>Dosen</th><th>#</th>                    
                    </tr>
                  </thead>
                <tbody>
            <?php
          	$query= mysql_query("SELECT a.*,b.Nama_matakuliah,b.SKS,b.Semester,c.nama_lengkap,c.Gelar,d.Nama AS Ruang
                                 FROM
                                  (SELECT a.KRS_ID,c.NIM,c.Identitas_ID,c.Jurusan_ID,c.Kurikulum_ID,a.Kode_mtk,b.Hari,b.Jam_Mulai,b.Jam_Selesai,b.Ruang_ID,b.Dosen_ID
                                   FROM krs a LEFT JOIN jadwal b ON a.Jadwal_ID=b.Jadwal_ID JOIN mahasiswa c
                                   WHERE a.NIM=c.NIM AND a.NIM=$_REQUEST[NIM] AND a.Tahun_ID='$_REQUEST[Tahun_ID]') AS a LEFT JOIN matakuliah b
                                         ON a.Identitas_ID=b.Identitas_ID AND a.Jurusan_ID=b.Jurusan_ID AND a.Kurikulum_ID=b.Kurikulum_ID AND a.Kode_mtk=b.Kode_mtk 
                                         LEFT JOIN dosen c ON a.Dosen_ID=c.ID LEFT JOIN ruang d ON a.Ruang_ID=d.ID
                                   ORDER BY b.Semester");
          	while ($r=mysql_fetch_array($query)){
            if ($r['Aktif']=='Y')
              $label="<span class='label label-success' style='font-size:12px;'>Aktif</span>";
            else
              $label="";
            $no++;
            echo"  <tr class='odd gradeX'>
                     <td width=10>$no</td>
                     <td>$r[Kode_mtk]</td>
                     <td>$r[Nama_matakuliah]</td>
                     <td>$r[SKS]</td>                     
                     <td>$r[Semester]</td>
                     <td>$r[Ruang]</td>
                     <td>$r[Hari]</td>
                     <td>$r[Jam_Mulai] - $r[Jam_Selesai]</td>
                     <td>$r[nama_lengkap], $r[Gelar]</td>
                     <td width=90><form method='post' action='form_akademikkrsact.php?page=akademikkrs&halaman=hapuskrs'>
                                    <input name='KRS_ID' type=hidden value='$r[KRS_ID]'>
                                    <input name='Tahun_ID' type=hidden value='$_REQUEST[Tahun_ID]'>
                                    <input name='Angkatan' type=hidden value='$_REQUEST[Angkatan]'>
                                    <input name='NIM' type=hidden value='$r[NIM]'>
                                    <input name='ID' type=hidden value='$_REQUEST[ID]'>
                                    <input name='prodi' type=hidden value='$_REQUEST[prodi]'>
                                    <input name='prog' type=hidden value='$_REQUEST[prog]'>
                      <button class='btn btn-sm btn-danger' style='height:27px;'>
                         <i class='glyphicon glyphicon-remove glyphicon-white'></i> Hapus
                      </button>
                     </a></td></form>  
                    </tr>";
            }
            ?>
              </table>
          </div>
        </div>
      </div>
  <?php                                                                                
  break;
  
  case"tambahkrs":   
  ?>
    <div class="col-md-10"> 
        <div class="col-lg-12">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <div class="text-muted bootstrap-admin-box-title" style="color:white;">Administrator | KRS Mahasiswa</div>
            </div>
              <div class="bootstrap-admin-panel-content">                   
                <form method="post" action="?page=akademikkrs&halaman=cari">
                  <table class="table table-striped" style="font-size:13px;">
                  <?php  
                  echo" <tr><td>Institusi</td><td> 
                          <select name='ID'>
                            <option value=0 selected>- Pilih Institusi -</option>";
                            $tampil=mysql_query("SELECT * FROM identitas");
                            while($r=mysql_fetch_array($tampil)){
                              if ($r[Identitas_ID]==$_REQUEST[ID]){
                                echo "<option value=$r[Identitas_ID] selected>$r[Identitas_ID] -- $r[Nama_Identitas]</option>";
                              }else{
                                 echo "<option value=$r[Identitas_ID]>$r[Identitas_ID] -- $r[Nama_Identitas]</option>";                           
                              }
                            }
                                echo "</select></td></tr>";
                 echo"  <tr><td>Program Studi</td><td> 
                          <select name='prodi'>
                            <option value=0 selected>- Pilih Prodi -</option>";
                            $tampil=mysql_query("SELECT * FROM jurusan");
                            while($r=mysql_fetch_array($tampil)){
                              if ($r[Jurusan_ID]==$_REQUEST[prodi]){ 
                                echo "<option value=$r[Jurusan_ID] selected>$r[Jurusan_ID] -- $r[nama_jurusan]</option>";
                              }else{
                                 echo "<option value=$r[Jurusan_ID]>$r[Jurusan_ID] -- $r[nama_jurusan]</option>";                             
                              }
                            }
                    echo "</select></td></tr>";
                 echo"  <tr><td>Program</td><td> 
                          <select name='prog'>
                            <option value=0 selected>- Pilih Program -</option>";
                            $tampil=mysql_query("SELECT * FROM program");
                            while($r=mysql_fetch_array($tampil)){
                              if ($r[ID]==$_REQUEST[prog]){
                                echo "<option value=$r[ID] selected>$r[Program_ID] -- $r[nama_program]</option>";
                              }else{
                                 echo "<option value=$r[ID]>$r[Program_ID] -- $r[nama_program]</option>";                             
                              }
                            }
                    echo "</select> </td></tr>";
                   echo"  <tr><td>Angkatan</td><td> &nbsp; <input name='Angkatan' value='$_REQUEST[Angkatan]' style='width:80px; height:25px;' type='text' class='form-control col-md-6' id='typeahead' autocomplete='off' data-provide='typeahead' data-items='4'> 
                          <tr><td>Tahun</td><td> &nbsp; <input name='Tahun_ID' value='$_REQUEST[Tahun_ID]' style='width:80px; height:25px;' type='text' class='form-control col-md-6' id='typeahead' autocomplete='off' data-provide='typeahead' data-items='4'>
                          <button class='btn btn-xs btn-primary' type='submit'><i class='glyphicon glyphicon-search'></i> Cari Data</button></td></tr>";
                 ?>

                 </tbody>
                </table> <br />
              </form>
            <?php 
     $query=mysql_query("SELECT a.NIM,a.Nama,a.Identitas_ID,a.Jurusan_ID,a.Program_ID,a.Angkatan,a.StatusMhsw_ID,a.Kurikulum_ID,c.Nama AS status 
                         FROM mahasiswa a LEFT JOIN statusmhsw c ON a.StatusMhsw_ID=c.StatusMhsw_ID
                         WHERE  a.NIM='$_REQUEST[NIM]'");
     $r=mysql_fetch_array($query);
     echo" <table class='table table-striped' style='font-size:13px;'>
            <tr><td><strong>NIM</strong></td><td><strong>: $_REQUEST[NIM] </strong></td><td><strong>Dosen Pembimbing</strong></td> <td><strong>: $r[nama_lengkap], $r[Gelar]</strong></td></tr>         
            <tr><td><strong>Nama</strong></td><td><strong>: $r[Nama] </strong></td><td><strong> Status Mahasiswa</strong></td> <td><strong>: $r[StatusMhsw_ID] - $r[status]</strong></td></tr>          
          </table>";
          echo"<form method='post' action='form_akademikkrsact.php?page=akademikkrs&halaman=simpankrs'>

          <body class='bootstrap-admin-with-small-navbar'>
              <table  class='table table-hover'  style='font-size:12px;'>
                  <thead>
                    <tr style='background-color:#3e8bda; color:white;'>
                      <th>No</th><th>Kode MK</th><th>Nama MK</th><th>SKS</th><th>Smt</th><th>Hari</th><th>Jam Kuliah</th><th>Dosen</th><th>#</th>                    
                    </tr>
                  </thead>
                <tbody>";
          	$query= mysql_query("SELECT a.Jadwal_ID,a.Kode_Mtk,b.Nama_matakuliah,b.SKS,b.Semester,a.Ruang_ID,a.Dosen_ID,a.Hari,a.Jam_Mulai,a.Jam_Selesai,c.nama_lengkap,c.Gelar
                                 FROM jadwal a JOIN matakuliah b LEFT JOIN dosen c ON a.Dosen_ID=c.ID
                                 WHERE a.Kode_Mtk=b.Kode_mtk AND a.Identitas_ID=b.Identitas_ID AND a.Jurusan_ID=b.Jurusan_ID AND b.Kurikulum_ID='$r[Kurikulum_ID]'
                                       AND a.Jurusan_ID='$r[Jurusan_ID]' AND a.Tahun_ID='$_REQUEST[Tahun_ID]' ORDER BY b.Semester");
          	while ($r1=mysql_fetch_array($query)){
            if ($r1['Aktif']=='Y')
              $label="<span class='label label-success' style='font-size:12px;'>Aktif</span>";
            else
              $label="";
            $no++;
          echo"
                 <input type=hidden name='NIM' value=$r[NIM]>
                 <input type=hidden name='Tahun_ID' value=$_REQUEST[Tahun_ID]>
                 <input type=hidden name='Angkatan' value='$r[Angkatan]'>
                 <input type=hidden name='ID' value='$r[Identitas_ID]'> 
                 <input type=hidden name='prodi' value=$r[Jurusan_ID]>
                 <input type=hidden name='prog' value=$r[Program_ID]>                
                   <tr class='odd gradeX'>
                     <td width=10>$no</td>
                     <td>$r1[Kode_Mtk]</td>
                     <td>$r1[Nama_matakuliah]</td>
                     <td>$r1[SKS]</td>                     
                     <td>$r1[Semester]</td>
                     <td>$r1[Hari]</td>  
                     <td>$r1[Jam_Mulai] - $r1[Jam_Selesai]</td>
                     <td>$r1[nama_lengkap], $r1[Gelar]</td>
                     <td><input type='checkbox' value='".$r1['Jadwal_ID']."' name='Jadwal_ID".$no."'></td>
                         <input type=hidden name='Kode_Mtk".$no."' value='".$r1['Kode_Mtk']."'>
                         <input type=hidden name='SKS".$no."' value='".$r1['SKS']."'></div> 
                    </tr>";
            }
                    ?><input type="hidden" name="jumMK" value="<?php echo $no+1; ?>" /><?php
           echo"<tr><td colspan=9><button class='btn btn-xs btn-primary' type='submit'>Simpan Jadwal</button></table></form>";
            ?>
          </div>
        </div>
      </div>
  <?php                                                                                
  break;
  
}
?>
