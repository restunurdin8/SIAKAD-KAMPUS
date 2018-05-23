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
              <div class="text-muted bootstrap-admin-box-title" style="color:white;">Mahasiswa | KHS Mahasiswa</div>
            </div>
              <div class="bootstrap-admin-panel-content">                   

          <body class="bootstrap-admin-with-small-navbar">
              <table  class="table table-hover" id="example" style="font-size:12px;">
                  <thead>
                    <tr style="background-color:#3e8bda; color:white;">
                      <th>No</th><th>NIM</th><th>Nama Mahasiswa</th><th>Tahun Akademik</th><th>Status KHS</th><th>Aksi</th>                    
                    </tr>
                  </thead>
                <tbody>
            <?php
            $sql = $pdo->prepare("SELECT a.*,b.KRS_ID 
                                FROM(SELECT a.*,b.Tahun_ID
                                FROM(SELECT a.NIM,a.Nama,a.Jurusan_ID,a.Program_ID,a.Tahun_ID AS TahunMasuk  
                                 FROM mahasiswa a JOIN krs b  
                                 WHERE a.NIM=b.NIM AND b.NIM=:NIM
                                 GROUP BY b.Tahun_ID ORDER BY b.Tahun_ID DESC) as a LEFT JOIN tahun b ON a.TahunMasuk <=b.Tahun_ID
                                 WHERE b.Jurusan_ID=:Jurusan_ID AND b.Program_ID=:Program_ID AND a.TahunMasuk <=b.Tahun_ID)as a left join krs b on a.Tahun_ID=b.Tahun_ID and a.NIM=b.NIM
                                 GROUP BY a.Tahun_ID");
            $sql->bindParam(':NIM', $data->NIM, PDO::PARAM_INT); 
            $sql->bindParam(':Jurusan_ID', $data->Jurusan_ID, PDO::PARAM_INT);
            $sql->bindParam(':Program_ID', $data->Program_ID, PDO::PARAM_INT);
            $sql->execute();
            while($r=$sql->fetch(PDO::FETCH_OBJ)){

            if ($r->KRS_ID > 0)
              $label="<span class='label label-success' style='font-size:12px;'>Tersimpan . . .</span>";
            else
              $label="<span class='label label-danger' style='font-size:12px;'>Kosong . . .</span>";
              

              $button="class='btn btn-sm btn-primary'";
              $text="<i class='glyphicon glyphicon-edit'></i> Lihat";

            $no++;
            echo"  <tr class='odd gradeX'>
                     <td width=10>$no</td>
                     <td>$r->NIM</td>
                     <td>$r->Nama</td>
                     <td>$r->Tahun_ID</td>
                     <td>$label</td>                     
                     <td width=90><form method='post' action='?page=mahasiswakhs&halaman=lihatkhs'>
                                    <input name='Tahun_ID' type=hidden value=$r->Tahun_ID>
                                    <input name='NIM' type=hidden value='$r->NIM'>
                      <button $button style='height:27px;' $disabled>
                         $text
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
  
  case"lihatkhs":   
  ?>
    <div class="col-md-10"> 
        <div class="col-lg-12">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <div class="text-muted bootstrap-admin-box-title" style="color:white;">Mahasiswa | KHS Mahasiswa</div>
            </div>
              <div class="bootstrap-admin-panel-content">                   
            <?php 
     $query = $pdo->prepare("SELECT a.NIM,a.Nama,a.StatusMhsw_ID,a.PenasehatAkademik,a.Program_ID,c.Nama AS status 
                         FROM mahasiswa a LEFT JOIN statusmhsw c ON a.StatusMhsw_ID=c.StatusMhsw_ID
                         WHERE  a.NIM='$_REQUEST[NIM]'");
     $query->execute();
     $r=$query->fetch(PDO::FETCH_OBJ); 

     echo" <table class='table table-striped' style='font-size:13px;''>
            <tr><td><strong>NIM</strong></td><td><strong>: $_REQUEST[NIM] </strong></td><td><strong>Penasehat Akademik</strong></td> <td><strong>: $r->PenasehatAkademik</strong></td></tr>         
            <tr><td><strong>Nama</strong></td><td><strong>: $r->Nama </strong></td><td><strong> Status Mahasiswa</strong></td> <td><strong>: $r->StatusMhsw_ID - $r->status</strong></td></tr>          
          </table>";
     echo"<form method='post' target=_new action='cetakkhs.php'> 

             <input name='Tahun_ID' type=hidden value='$_REQUEST[Tahun_ID]'>
             <input name='Angkatan' type=hidden value='$_REQUEST[Angkatan]'>
             <input name='NIM' type=hidden value='$r->NIM'>
             <input name='ID' type=hidden value='$data->Identitas_ID'>
             <input name='prodi' type=hidden value='$data->Jurusan_ID'>
             <input name='prog' type=hidden value='$_REQUEST[prog]'>
             &nbsp; <button class='btn btn-xs btn-success' type='submit'><i class='glyphicon glyphicon-print'></i> Cetak KHS</button>                    
          </form>          
          </table><br />";
          ?>
          <body class="bootstrap-admin-with-small-navbar">
              <table  class="table table-hover" id="example" style="font-size:12px;">
                  <thead>
                    <tr style="background-color:#3e8bda; color:white;">
                      <th>No</th><th>Kode MK</th><th>Nama MK</th><th>SKS</th><th>Smt</th><th>Ruang</th><th>Hari</th><th>Jam Kuliah</th><th>Dosen</th><th>G</th><th>B</th><th>M</th>                    
                    </tr>
                  </thead>
                <tbody>
            <?php
            $sql = $pdo->prepare("SELECT a.*,b.Nama_matakuliah,b.SKS,b.Semester,c.nama_lengkap,c.Gelar,d.Nama AS Ruang
                                 FROM
                                  (SELECT a.KRS_ID,a.GradeNilai,a.BobotNilai,c.NIM,c.Identitas_ID,c.Jurusan_ID,c.Kurikulum_ID,a.Kode_mtk,b.Hari,b.Jam_Mulai,b.Jam_Selesai,b.Ruang_ID,b.Dosen_ID
                                   FROM krs a LEFT JOIN jadwal b ON a.Jadwal_ID=b.Jadwal_ID JOIN mahasiswa c
                                   WHERE a.NIM=c.NIM AND a.NIM=$_REQUEST[NIM] AND a.Tahun_ID='$_REQUEST[Tahun_ID]') AS a LEFT JOIN matakuliah b
                                         ON a.Identitas_ID=b.Identitas_ID AND a.Jurusan_ID=b.Jurusan_ID AND a.Kurikulum_ID=b.Kurikulum_ID AND a.Kode_mtk=b.Kode_mtk 
                                         LEFT JOIN dosen c ON a.Dosen_ID=c.ID LEFT JOIN ruang d ON a.Ruang_ID=d.ID
                                   ORDER BY b.Semester");
            $sql->execute();
            while($r=$sql->fetch(PDO::FETCH_OBJ)){
            
            if ($r->Aktif=='Y')
              $label="<span class='label label-success' style='font-size:12px;'>Aktif</span>";
            else
              $label="";
            $no++;
            $mutu=$r->SKS * $r->BobotNilai;
            echo"  <tr class='odd gradeX'>
                     <td width=10>$no</td>
                     <td>$r->Kode_mtk</td>
                     <td>$r->Nama_matakuliah</td>
                     <td>$r->SKS</td>                     
                     <td>$r->Semester</td>
                     <td>$r->Ruang</td>
                     <td>$r->Hari</td>
                     <td>$r->Jam_Mulai - $r->Jam_Selesai</td>
                     <td>$r->nama_lengkap, $r->Gelar</td>
                     <td>$r->GradeNilai</td>
                     <td>$r->BobotNilai</td>
                     <td>$mutu</td>
                    </tr>";
                    $tsks=$tsks+$r->SKS;
                    $tmutu=$tmutu+$mutu;
                    $ips=$tmutu/$tsks;
            }
            echo" <td colspan=3 align=right><strong>Total SKS</strong> =</td><td align=right><strong> $tsks</strong></td><td colspan=7 align=right><strong>Total Mutu</strong><td><strong>= $tmutu</strong></td></td>
                  <tr><td colspan=3 align=right><strong>Indeks Prestasi Semester</strong> =</td><td align=right><strong>";echo number_format($ips,2,',','.');echo"</strong></td></tr>";

            ?>
              </table>
          </div>
        </div>
      </div>
  <?php                                                                                
  break;
}
?>
