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
              <div class="text-muted bootstrap-admin-box-title" style="color:white;">Akademik | Registrasi Ulang Mahasiswa</div>
            </div>
              <div class="bootstrap-admin-panel-content">                   
                <form method="post" action="?page=baakademikregulang&halaman=cari">
                  <table class="table table-striped" style="font-size:13px;">
  
                    <?php
                   echo"  <tr><td>Program</td><td> 
                            <select name='prog'>
                              <option value=0 selected>- Pilih Program -</option>";
                               $sql=$pdo->query("SELECT * FROM program");
                               while($r=$sql->fetch(PDO::FETCH_OBJ)){ 
                                  echo "<option value=".$r->ID.">".$r->Program_ID." -- ".$r->nama_program."</option>";
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
                      <th>No</th><th>NIM</th><th>Nama Mahasiswa</th><th>Status</th><th>Konfirmasi</th><th>Hapus</th>                    
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
              <div class="text-muted bootstrap-admin-box-title" style="color:white;">Akademik | Registrasi Ulang Mahasiswa</div>
            </div>
              <div class="bootstrap-admin-panel-content">                   
                <form method="post" action="?page=baakademikregulang&halaman=cari">
                  <table class="table table-striped" style="font-size:13px;">
                  <?php  
                 echo"  <tr><td>Program</td><td> 
                          <select name='prog'>
                            <option value=0 selected>- Pilih Program -</option>";
                            $sql=$pdo->query("SELECT * FROM program");
                            while($r=$sql->fetch(PDO::FETCH_OBJ)){ 
                               if (("".$r->ID."")==($_REQUEST[prog])){
                                  echo "<option value=".$r->ID." selected>".$r->Program_ID." -- ".$r->nama_program."</option>";
                              }else{
                                  echo "<option value=".$r->ID.">".$r->Program_ID." -- ".$r->nama_program."</option>";                           
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

          <body class="bootstrap-admin-with-small-navbar">
              <table  class="table table-hover" id="example" style="font-size:12px;">
                  <thead>
                    <tr style="background-color:#3e8bda; color:white;">
                      <th>No</th><th>NIM</th><th>Nama Mahasiswa</th><th>Status</th><th>Konfirmasi</th><th>Hapus</th>                    
                    </tr>
                  </thead>
                <tbody>
            <?php
            $sql = $pdo->prepare("SELECT b.ID_Reg,b.Tahun,a.NIM,a.Nama,b.Aktif  
                                 FROM mahasiswa a LEFT JOIN regmhs b ON a.NIM=b.NIM AND b.Tahun='$_REQUEST[Tahun_ID]'
                                 WHERE a.Angkatan='$_REQUEST[Angkatan]' AND a.identitas_ID= :ID AND a.Jurusan_ID= :Jurusan_ID AND 
                                       a.Program_ID='$_REQUEST[prog]' ORDER BY a.NIM");
            $sql->bindParam(':ID', $data->Identitas_ID, PDO::PARAM_INT); 
            $sql->bindParam(':Jurusan_ID', $data->Jurusan_ID, PDO::PARAM_INT);
            $sql->execute();
            while($r=$sql->fetch(PDO::FETCH_OBJ)){

            if ($r->Aktif=='Y')
              $label="<span class='label label-success' style='font-size:12px;'>Aktif</span>";
            else
              $label="";
            $no++;
            echo"  <tr class='odd gradeX'>
                     <td width=10>$no</td>
                     <td>$r->NIM</td>
                     <td>$r->Nama</td>
                     <td>$label</td>                     
                     <td width=90><form method='post' action='form_bakademikregmhswact.php?page=baakademikregulang&halaman=konfirmasi'>
                                    <input name='Tahun_ID' type=hidden value='$_REQUEST[Tahun_ID]'>
                                    <input name='Angkatan' type=hidden value='$_REQUEST[Angkatan]'>
                                    <input name='NIM' type=hidden value='$r->NIM'>
                                    <input name='ID' type=hidden value='$data->Identitas_ID'>
                                    <input name='prodi' type=hidden value='$data->Jurusan_ID'>
                                    <input name='prog' type=hidden value='$_REQUEST[prog]'>
                      <button class='btn btn-sm btn-success' style='height:27px;'>
                         <i class='glyphicon glyphicon-ok-sign'></i> Confirm
                      </button>
                     </a></td></form> 
                     <td width=90><a href=\"form_bakademikregmhswact.php?page=baakademikregulang&halaman=hapus&key=$r->ID_Reg&Tahun_ID=$_REQUEST[Tahun_ID]&prog=$_REQUEST[prog]&Angkatan=$_REQUEST[Angkatan]\"
                      onClick=\"return confirm('Apakah Anda benar-benar akan menghapus Registrasi ini ?')\">
                      <button class='btn btn-sm btn-danger' style='height:27px;'>
                         <i class='glyphicon glyphicon-trash'></i> Delete
                      </button>
                     </a></td> 
                    </tr>";
            }
            ?>
              </table>
          </div>
        </div>
      </div>
  <?php                                                                                
  break;
}
?>
