<?php
$sql = $pdo->prepare('SELECT * FROM mahasiswa WHERE username = :id');
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
              <div class="text-muted bootstrap-admin-box-title" style="color:white;">Mahasiswa | Transkrip Nilai Mahasiswa</div>
            </div>
              <div class="bootstrap-admin-panel-content">                   


          <body class="bootstrap-admin-with-small-navbar">
              <table  class="table table-hover"  style="font-size:12px;">
                  <thead>
                    <tr style="background-color:#3e8bda; color:white;">
                      <th>No</th><th>NIM</th><th>Nama Mahasiswa</th><th>Aksi</th>                    
                    </tr>
                  </thead>
                <tbody>
            <?php
          	$query= mysql_query("SELECT a.NIM,a.Nama  
                                 FROM mahasiswa a 
                                 WHERE a.NIM=$data->NIM 
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
                     <td width=90><form method='post' target=_new action='cetaktranskrip.php'>
                                    <input name='NIM' type=hidden value='$r[NIM]'>
                      <button class='btn btn-xs btn-success' style='height:27px;'>
                         <i class='glyphicon glyphicon-print'></i> Cetak Transkrip
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
}
?>
