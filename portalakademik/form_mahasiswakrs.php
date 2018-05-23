<?php
$sql = $pdo->prepare('SELECT * FROM mahasiswa WHERE username = :id');
$sql->bindParam(':id', $_SESSION['username']);
$sql->execute();
$data=$sql->fetch(PDO::FETCH_OBJ);

  $sqltgl = $pdo->prepare("SELECT MAX(Tahun_ID) AS Tahun_ID,TglKRSMulai,TglKRSSelesai 
                                      FROM tahun
                                      WHERE Identitas_ID=:ID AND Jurusan_ID=:Jurusan_ID AND Program_ID=:Program_ID AND Aktif='Y' group by Tahun_ID DESC");
  $sqltgl->bindParam(':ID', $data->Identitas_ID, PDO::PARAM_INT); 
  $sqltgl->bindParam(':Jurusan_ID', $data->Jurusan_ID, PDO::PARAM_INT);
  $sqltgl->bindParam(':Program_ID', $data->Program_ID, PDO::PARAM_INT);
  $sqltgl->execute();
  $tgl=$sqltgl->fetch(PDO::FETCH_OBJ);
      $t1 = tgl_indo($tgl->TglKRSMulai);
      $t2 = tgl_indo($tgl->TglKRSSelesai);
switch($_GET['halaman']){
     
  default:    
  ?>               
    <div class="col-md-10"> 
        <div class="col-lg-12">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <div class="text-muted bootstrap-admin-box-title" style="color:white;">Mahasiswa | KRS Mahasiswa</div>
            </div>
              <div class="bootstrap-admin-panel-content">                   
                <div class="alert alert-warning">
                  <h4>Perhatian !</h4>
                  <?php  
                   echo"1. Batas Akhir pengisian Kartu Rencana Studi (KRS) dimulai pada Tanggal <strong style='color:red'>$t1</strong> s/d <strong style='color:red'>$t2</strong>.<br />
                        2. Perubahan Kartu Rencana Studi (KRS) tidak akan dilayani jika batas penginputan KRS telah berakhir.";
                  ?>
                </div>
          <body class="bootstrap-admin-with-small-navbar">
              <table  class="table table-hover" id="example" style="font-size:12px;">
                  <thead>
                    <tr style="background-color:#3e8bda; color:white;">
                      <th>No</th><th>NIM</th><th>Nama Mahasiswa</th><th>Tahun Akademik</th><th>Status KRS</th><th>Aksi</th>                    
                    </tr>
                  </thead>
                <tbody>
            <?php
            $sql = $pdo->prepare("SELECT b.*,a.Tahun_ID AS Tahun,c.NIM,c.Nama
                                  FROM tahun a LEFT JOIN
                                (SELECT b.KRS_ID,b.Tahun_ID,a.NIM,a.Nama,a.Jurusan_ID,a.Program_ID  
                                 FROM mahasiswa a LEFT JOIN krs b ON a.NIM=b.NIM
                                 WHERE a.NIM=:NIM
                                 GROUP BY b.Tahun_ID ORDER BY b.Tahun_ID DESC) as b ON a.Tahun_ID=b.Tahun_ID JOIN mahasiswa c
                                 WHERE a.Jurusan_ID=$data->Jurusan_ID AND a.Program_ID=$data->Program_ID AND c.NIM=$data->NIM and a.Tahun_ID >=c.Tahun_ID");
            $sql->bindParam(':NIM', $data->NIM, PDO::PARAM_INT); 
            $sql->execute();
            while($r=$sql->fetch(PDO::FETCH_OBJ)){

            if ($r->KRS_ID > 0)
              $label="<span class='label label-success' style='font-size:12px;'>Tersimpan . . .</span>";
            else
              $label="<span class='label label-danger' style='font-size:12px;'>Kosong . . .</span>";
              
            if ($tgl->Tahun_ID==$r->Tahun){
              $disabled="";
              $button="class='btn btn-sm btn-primary'";
              $text="<i class='glyphicon glyphicon-edit'></i> Edit";
            }else{
              $disabled="disabled";            
              $button="class='btn btn-sm btn-danger'";
              $text="<i class='glyphicon glyphicon-edit'></i> Lihat";
            }
            $no++;
            echo"  <tr class='odd gradeX'>
                     <td width=10>$no</td>
                     <td>$r->NIM</td>
                     <td>$r->Nama</td>
                     <td>$r->Tahun</td>
                     <td>$label</td>                     
                     <td width=90><form method='post' action='?page=mahasiswakrs&halaman=lihatkrs'>
                                    <input name='Tahun_ID' type=hidden value=$r->Tahun>
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
  
  case"lihatkrs":   
  ?>
    <div class="col-md-10"> 
        <div class="col-lg-12">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <div class="text-muted bootstrap-admin-box-title" style="color:white;">Mahasiswa | KRS Mahasiswa</div>
            </div>
              <div class="bootstrap-admin-panel-content">                   
                <div class="alert alert-warning">
                  <h4>Perhatian !</h4>
                  <?php
                   echo"1. Batas Akhir pengisian Kartu Rencana Studi (KRS) dimulai pada Tanggal <strong style='color:red'>$t1</strong> s/d <strong style='color:red'>$t2</strong>.<br />
                        2. Perubahan Kartu Rencana Studi (KRS) tidak akan dilayani jika batas penginputan KRS telah berakhir.";
                  ?>
                </div>
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
     echo"<form method='post' action='?page=mahasiswakrs&halaman=tambahkrs'> 
          <table class='table table-striped' style='font-size:13px;''>
             <input name='Tahun_ID' type=hidden value='$_REQUEST[Tahun_ID]'>
             <input name='Angkatan' type=hidden value='$_REQUEST[Angkatan]'>
             <input name='NIM' type=hidden value='$r->NIM'>
             <input name='ID' type=hidden value='$data->Identitas_ID'>
             <input name='prodi' type=hidden value='$data->Jurusan_ID'>
             <input name='prog' type=hidden value='$r->Program_ID'>
            <button class='btn btn-xs btn-success' type='submit'><i class='glyphicon glyphicon-plus'></i> Tambah Jadwal</button>                    
          </form>
        <form method='post' target=_new action='cetakkrs.php'> 

             <input name='Tahun_ID' type=hidden value='$_REQUEST[Tahun_ID]'>
             <input name='Angkatan' type=hidden value='$_REQUEST[Angkatan]'>
             <input name='NIM' type=hidden value='$r->NIM'>
             <input name='ID' type=hidden value='$data->Identitas_ID'>
             <input name='prodi' type=hidden value='$data->Jurusan_ID'>
             <input name='prog' type=hidden value='$_REQUEST[prog]'>
             &nbsp; <button class='btn btn-xs btn-success' type='submit'><i class='glyphicon glyphicon-print'></i> Cetak KRS</button>                    
          </form>          
          </table>";
          ?>
          <body class="bootstrap-admin-with-small-navbar">
              <table  class="table table-hover" id="example" style="font-size:12px;">
                  <thead>
                    <tr style="background-color:#3e8bda; color:white;">
                      <th>No</th><th>Kode MK</th><th>Nama MK</th><th>SKS</th><th>Smt</th><th>Ruang</th><th>Hari</th><th>Jam Kuliah</th><th>Dosen</th><th>Aksi</th>                    
                    </tr>
                  </thead>
                <tbody>
            <?php
            $sql = $pdo->prepare("SELECT a.*,b.Nama_matakuliah,b.SKS,b.Semester,c.nama_lengkap,c.Gelar,d.Nama AS Ruang
                                 FROM
                                  (SELECT a.KRS_ID,c.NIM,c.Identitas_ID,c.Jurusan_ID,c.Kurikulum_ID,a.Kode_mtk,b.Hari,b.Jam_Mulai,b.Jam_Selesai,b.Ruang_ID,b.Dosen_ID
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
                     <td width=90><form method='post' action='form_mahasiswakrsact.php?page=mahasiswakrs&halaman=hapuskrs'>
                                    <input name='KRS_ID' type=hidden value='$r->KRS_ID'>
                                    <input name='Tahun_ID' type=hidden value='$_REQUEST[Tahun_ID]'>
                                    <input name='Angkatan' type=hidden value='$_REQUEST[Angkatan]'>
                                    <input name='NIM' type=hidden value='$r->NIM'>
                                    <input name='ID' type=hidden value='$data->Identitas_ID'>
                                    <input name='prodi' type=hidden value='$data->Jurusan_ID'>
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
        $tgl_sekarang = date("Ymd");
      $query = $pdo->prepare("SELECT DATEDIFF(t1.TglKRSSelesai,$tgl_sekarang) AS s,
        DATEDIFF(t1.TglKRSMulai,$tgl_sekarang) AS d 
        FROM tahun t1 
        WHERE t1.Tahun_ID='$_POST[Tahun_ID]' AND t1.Program_ID='$_POST[prog]' AND t1.Jurusan_ID='$_POST[prodi]'");
     $query->execute();
     $d=$query->fetch(PDO::FETCH_OBJ);

        if (($d->s < 0)or($d->d > 0)){
  echo "<script>alert('Maaf..!!!, Tanggal pengisian KRS tidak valid'); window.location ='media.php?page=mahasiswakrs&halaman=lihatkrs&Tahun_ID=$_POST[Tahun_ID]&NIM=$_POST[NIM]'</script>";
       
        }
        else{    
  ?>
    <div class="col-md-10"> 
        <div class="col-lg-12">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <div class="text-muted bootstrap-admin-box-title" style="color:white;">Akademik | KRS Mahasiswa</div>
            </div>
              <div class="bootstrap-admin-panel-content">                   
                <div class="alert alert-warning">
                  <h4>Perhatian !</h4>
                  <?php
                   echo"1. Batas Akhir pengisian Kartu Rencana Studi (KRS) dimulai pada Tanggal <strong style='color:red'>$t1</strong> s/d <strong style='color:red'>$t2</strong>.<br />
                        2. Perubahan Kartu Rencana Studi (KRS) tidak akan dilayani jika batas penginputan KRS telah berakhir.";
                  ?>
                </div>

            <?php 
     $query = $pdo->prepare("SELECT b.NIM,b.Nama,b.Identitas_ID,b.Jurusan_ID,b.Program_ID,b.Angkatan,b.StatusMhsw_ID,b.Kurikulum_ID,b.PenasehatAkademik,c.Nama AS status 
                         FROM regmhs a JOIN mahasiswa b LEFT JOIN statusmhsw c ON b.StatusMhsw_ID=c.StatusMhsw_ID
                         WHERE a.NIM=b.NIM AND a.Tahun=$_POST[Tahun_ID] AND a.NIM=$_REQUEST[NIM]");
     $query->execute();
     $r=$query->fetch(PDO::FETCH_OBJ);

     echo" <table class='table table-striped' style='font-size:13px;''>
            <tr><td><strong>NIM</strong></td><td><strong>: $r->NIM </strong></td><td><strong>Dosen Pembimbing</strong></td> <td><strong>: $r->PenasehatAkademik</strong></td></tr>         
            <tr><td><strong>Nama</strong></td><td><strong>: $r->Nama </strong></td><td><strong> Status Mahasiswa</strong></td> <td><strong>: $r->StatusMhsw_ID - $r->status</strong></td></tr>          
          </table>";
          echo"<form method='post' action='form_mahasiswakrsact.php?page=mahasiswakrs&halaman=simpankrs'>

          <body class='bootstrap-admin-with-small-navbar'>
              <table  class='table table-hover' style='font-size:12px;'>
                  <thead>
                    <tr style='background-color:#3e8bda; color:white;'>
                      <th>No</th><th>Kode MK</th><th>Nama MK</th><th>SKS</th><th>Smt</th><th>Hari</th><th>Jam Kuliah</th><th>Dosen</th><th>#</th>                    
                    </tr>
                  </thead>
                <tbody>";
            $query = $pdo->prepare("SELECT a.Jadwal_ID,a.Kode_Mtk,b.Nama_matakuliah,b.SKS,b.Semester,a.Ruang_ID,a.Dosen_ID,a.Hari,a.Jam_Mulai,a.Jam_Selesai,c.nama_lengkap,c.Gelar
                                 FROM jadwal a JOIN matakuliah b LEFT JOIN dosen c ON a.Dosen_ID=c.ID
                                 WHERE a.Kode_Mtk=b.Kode_mtk AND a.Identitas_ID=b.Identitas_ID AND a.Jurusan_ID=b.Jurusan_ID AND b.Kurikulum_ID='$r->Kurikulum_ID'
                                       AND a.Jurusan_ID='$r->Jurusan_ID' AND a.Tahun_ID='$_REQUEST[Tahun_ID]' ORDER BY b.Semester");
            $query->execute();
            while($r1=$query->fetch(PDO::FETCH_OBJ)){
            
            if ($r1->Aktif=='Y')
              $label="<span class='label label-success' style='font-size:12px;'>Aktif</span>";
            else
              $label="";
            $no++;
          echo"
                 <input type=hidden name='NIM' value=$r->NIM>
                 <input type=hidden name='Tahun_ID' value=$_REQUEST[Tahun_ID]>
                 <input type=hidden name='Angkatan' value='$r->Angkatan'>
                 <input type=hidden name='ID' value='$r->Identitas_ID'> 
                 <input type=hidden name='prodi' value=$r->Jurusan_ID>
                 <input type=hidden name='prog' value=$r->Program_ID>                
                   <tr class='odd gradeX'>
                     <td width=10>$no</td>
                     <td>$r1->Kode_Mtk</td>
                     <td>$r1->Nama_matakuliah</td>
                     <td>$r1->SKS</td>                     
                     <td>$r1->Semester</td>
                     <td>$r1->Hari</td>  
                     <td>$r1->Jam_Mulai - $r1->Jam_Selesai</td>
                     <td>$r1->nama_lengkap, $r1->Gelar</td>
                     <td><input type='checkbox' value='".$r1->Jadwal_ID."' name='Jadwal_ID".$no."'></td>
                         <input type=hidden name='Kode_Mtk".$no."' value='".$r1->Kode_Mtk."'>
                         <input type=hidden name='SKS".$no."' value='".$r1->SKS."'></div> 
                    </tr>";
            }
                    ?><input type="hidden" name="jumMK" value="<?php echo $no+1; ?>" /><?php
           echo"<tr><td colspan=9><button class='btn btn-xs btn-primary' type='submit'>Simpan Jadwal</button></table></form>";
            ?>
          </div>
        </div>
      </div>
  <?php 
  }                                                                               
  break;
  
}
?>
