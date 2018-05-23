<?php
switch($_GET['halaman']){
     
  default:    
  ?>             
    <div class="col-md-10"> 
        <div class="col-lg-12">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <div class="text-muted bootstrap-admin-box-title" style="color:white;">Administrator | Input Nilai Mahasiswa</div>
            </div>
              <div class="bootstrap-admin-panel-content">                   
                <form method="post" action="?page=akademikinputnilaimhs&halaman=cari">
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
                   echo"  <tr><td>Tahun</td><td> &nbsp; <input name='Tahun_ID' style='width:80px; height:25px;' type='text' class='form-control col-md-6' id='typeahead' autocomplete='off' data-provide='typeahead' data-items='4'>
                      <button class='btn btn-xs btn-primary' type='submit'><i class='glyphicon glyphicon-search'></i> Cari Data</button></td></tr>";
                   ?>
  
  
                  </table> <br />
                </form>
  
          <body class="bootstrap-admin-with-small-navbar">
              <table  class="table table-hover" id="example" style="font-size:12px;">
                  <thead>
                    <tr style="background-color:#3e8bda; color:white;">
                      <th>No</th><th>#</th><th>Kode MK</th><th>Nama Matakuliah</th><th>Dosen</th>                    
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
              <div class="text-muted bootstrap-admin-box-title" style="color:white;">Administrator | Input Nilai Mahasiswa</div>
            </div>
              <div class="bootstrap-admin-panel-content">                   
                <form method="post" action="?page=akademikinputnilaimhs&halaman=cari">
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
                   echo"  <tr><td>Tahun</td><td> &nbsp; <input name='Tahun_ID' value='$_REQUEST[Tahun_ID]' style='width:80px; height:25px;' type='text' class='form-control col-md-6' id='typeahead' autocomplete='off' data-provide='typeahead' data-items='4'>
                          <button class='btn btn-xs btn-primary' type='submit'><i class='glyphicon glyphicon-search'></i> Cari Data</button></td></tr>";
                 ?>

                 </tbody>
                </table> <br />
              </form>

          <body class="bootstrap-admin-with-small-navbar">
              <table  class="table table-hover" id="example" style="font-size:12px;">
                  <thead>
                    <tr style="background-color:#3e8bda; color:white;">
                      <th>No</th><th>#</th><th>Kode MK</th><th>Nama Matakuliah</th><th>Dosen</th>                    
                    </tr>
                  </thead>
                <tbody>
            <?php
          	$query= mysql_query("SELECT a.Jadwal_ID,a.Kode_Mtk,b.Nama_matakuliah,c.nama_lengkap,c.Gelar  
                                 FROM jadwal a JOIN matakuliah b LEFT JOIN dosen c ON a.Dosen_ID=c.ID
                                 WHERE a.Kode_Mtk=b.Kode_mtk AND a.Identitas_ID=b.Identitas_ID AND a.Jurusan_ID=b.Jurusan_ID AND
                                       a.Tahun_ID='$_REQUEST[Tahun_ID]' AND a.Identitas_ID='$_REQUEST[ID]' AND a.Jurusan_ID='$_REQUEST[prodi]' AND 
                                       a.Program_ID='$_REQUEST[prog]'
                                 ORDER BY b.Nama_matakuliah");
          	while ($r=mysql_fetch_array($query)){
            $no++;
            echo"  <tr class='odd gradeX'>
                     <td width=10>$no</td>
                     <td width=90><form method='post' action='?page=akademikinputnilaimhs&halaman=lihat'>
                                    <input name='Tahun_ID' type=hidden value='$_REQUEST[Tahun_ID]'>
                                    <input name='Jadwal_ID' type=hidden value='$r[Jadwal_ID]'>
                                    <input name='ID' type=hidden value='$_REQUEST[ID]'>
                                    <input name='prodi' type=hidden value='$_REQUEST[prodi]'>
                                    <input name='prog' type=hidden value='$_REQUEST[prog]'>
                      <button class='btn btn-sm btn-success' style='height:27px;'>
                         <i class='glyphicon glyphicon-pencil'></i> Edit
                      </button>
                     </td></form> 
                     <td>$r[Kode_Mtk]</td>
                     <td>$r[Nama_matakuliah]</td>  
                     <td>$r[nama_lengkap], $r[Gelar]</td>
                    </tr>";
            }
            ?>
              </table>
          </div>
        </div>
      </div>
  <?php                                                                                
  break;  
  
  case"lihat":   
  ?>
    <div class="col-md-10"> 
        <div class="col-lg-12">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <div class="text-muted bootstrap-admin-box-title" style="color:white;">Administrator | Input Nilai Mahasiswa</div>
            </div>
              <div class="bootstrap-admin-panel-content">                   
                <form method="post" action="?page=akademikinputnilaimhs&halaman=cari">
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
                   echo"  <tr><td>Tahun</td><td> &nbsp; <input name='Tahun_ID' value='$_REQUEST[Tahun_ID]' style='width:80px; height:25px;' type='text' class='form-control col-md-6' id='typeahead' autocomplete='off' data-provide='typeahead' data-items='4'>
                          <button class='btn btn-xs btn-primary' type='submit'><i class='glyphicon glyphicon-search'></i> Cari Data</button></td></tr>";
                 ?>

                 </tbody>
                </table> <br />
              </form>
      <?php
    echo"<form method='post' action='form_akademikinputnilaimahasiswaact.php?page=akademikinputnilaimhs&halaman=simpan'>
          <body class='bootstrap-admin-with-small-navbar'>
              <table  class='table table-hover' style='font-size:12px;'>
                  <thead>
                    <tr style='background-color:#3e8bda; color:white;'>
                      <th>No</th><th>NIM</th><th>Nama Mahasiswa</th><th>Grade</th>                    
                    </tr>
                  </thead>
                <tbody>";
          	$query= mysql_query("SELECT a.KRS_ID,b.NIM,b.Nama,a.GradeNilai
                                 FROM krs a JOIN mahasiswa b
                                 WHERE a.NIM=b.NIM AND a.Jadwal_ID='$_REQUEST[Jadwal_ID]' AND a.Tahun_ID='$_REQUEST[Tahun_ID]'
                                 GROUP BY b.NIM");
          	while ($r=mysql_fetch_array($query)){
            $no++;
            echo"  
                 <input type=hidden name='KRS_ID[$i]' value={$r[KRS_ID]}>
                 <input type=hidden name='Jadwal_ID' value=$_POST[Jadwal_ID]>
                 <input type=hidden name='Tahun_ID' value=$_REQUEST[Tahun_ID]>
                 <input type=hidden name='ID' value='$_REQUEST[ID]'> 
                 <input type=hidden name='prodi' value=$_REQUEST[prodi]>
                 <input type=hidden name='prog' value=$_REQUEST[prog]> 
                    <tr class='odd gradeX'>
                     <td width=10>$no</td>
                     <td>$r[NIM]</td>
                     <td>$r[Nama]</td>
                     <td>
                      <select name='grade[$i]'>
                        <option value=0 selected>- NILAI -</option>";
                        $que=mysql_query("SELECT * FROM nilai WHERE Identitas_ID='$_REQUEST[ID]' AND Jurusan_ID='$_REQUEST[prodi]' ORDER BY grade");
                        while ($d2=mysql_fetch_array($que)){
                          if ($d2['grade']==$r['GradeNilai']){
                            echo "<option value=$d2[grade] selected>$d2[grade] ($d2[NilaiMin] - $d2[NilaiMax])</option>";                     
                          }else{
                            echo "<option value=$d2[grade]>$d2[grade] ($d2[NilaiMin] - $d2[NilaiMax])</option>";
                        }} 
            echo"    </select></td></tr>";
            ++$i;
            }
           echo" <tr><td colspan=4><button class='btn btn-xs btn-success' type='submit'><i class='glyphicon glyphicon-ok'></i> Simpan</button>
              </table>
          </form>
        </div>
      </div>
    </div>";                                                                                
  break;
}
?>
