  <?php 
  error_reporting(0);
    include "printer.css"; ?>
<title>Cetak KHS</title>  
<BODY onLoad="javascript:window.print()">
<?php
include "../config/koneksi.php";

?>
<style type="text/css">
.style4 {font-size: 12; }
.style7 {	font-size: 12;
	color: #265180;
	font-family: Georgia, "Times New Roman", Times, serif;
}
</style>
<table class="basic"  border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
  	<td width="118" rowspan="6"><img src="../images/stai.png" width="106"></td>
    <td width="550" align="center">&nbsp;</td>
  </tr>

  <tr>
    <td align="center" style="font-size:26px;"><strong>SEKOLAH TINGGI AGAMA ISLAM (STAI)</strong></td>
  </tr>
  <tr>
    <td align="center"><p><span style="font-size:26px;"><strong>SEBELAS APRIL SUMEDANG</strong></span><br />Jl. Angkrek No. 19 Tlp (0261) 2201994 Fax 2201994 Sumedang - Jawa Barat<br /> 
    website : www.staisebelasapril-sumedang.com - email : staiunsap11april@gmail.com</p></td>
  </tr>
</table>
<hr>
<table class="basic" width="750" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center">
    <h2>Kartu Hasil Studi (KHS)</h2></td>
  </tr>
</table>
<table class="table_1">
  <?php  
  $query = $pdo->prepare("SELECT a.NIM,a.Nama,a.PenasehatAkademik,b.Jurusan_ID,b.nama_jurusan,c.Program_ID,c.nama_program,a.Foto 
                    FROM mahasiswa a JOIN jurusan b JOIN program c
                    WHERE a.Jurusan_ID=b.Jurusan_ID AND a.Program_ID=c.ID AND a.NIM='$_POST[NIM]'");
  $query->execute();
  $data=$query->fetch(PDO::FETCH_OBJ);

  ?>
    <tr>
      <td><strong>Tahun/ Angkatan</strong></td>
      <td><strong>: <?php echo $_POST['Tahun_ID']; ?></td>
      <td rowspan=6 valign=top>
           <?php  
               echo "<img alt='galeri' src='foto_mahasiswa/$data->Foto' height=130/>";

           ?>              
      </td></tr>
    <tr>
      <td><strong>NIM</strong></td>
      <td><strong>: <?php echo $data->NIM; ?></td>
    </tr>
    <tr>
      <td><strong>NAMA</strong></td>
      <td><strong>: <?php echo $data->Nama; ?></td>
    </tr>
    <tr>
      <td><strong>Program Studi</strong></td>
      <td><strong>: <?php echo $data->Jurusan_ID; ?> - <?php echo $data->nama_jurusan; ?></strong></td>
    </tr>
    <tr>
      <td><strong>Program</strong></td>
      <td><strong>: <?php echo $data->Program_ID; ?> - <?php echo $data->nama_program; ?></strong></td>
    </tr>
    <tr>
      <td><strong>Penasehat Akademik</strong></td>
      <td><strong>: <?php echo $data->PenasehatAkademik; ?></strong></td>
    </tr>
  </table>
<table class="table_2">
<tr>
    <th>No</th>
    <th>Kode MK</th>
    <th>Nama MK</th>
    <th>SKS</th>
    <th>Smt</th>
    <th>Ruang</th>
    <th>Hari</th>
    <th>Jam Kuliah</th>
    <th>Dosen</th>
    <th>G</th>
    <th>B</th>
    <th>M</th>
</tr>

        <?php  
        $sql = $pdo->prepare("SELECT a.*,b.Nama_matakuliah,b.SKS,b.Semester,c.nama_lengkap,c.Gelar,d.Nama AS Ruang
                                 FROM
                                  (SELECT a.KRS_ID,a.GradeNilai,a.BobotNilai,c.NIM,c.identitas_ID,c.Jurusan_ID,c.Kurikulum_ID,a.Kode_mtk,b.Hari,b.Jam_Mulai,b.Jam_Selesai,b.Ruang_ID,b.Dosen_ID
                                   FROM krs a LEFT JOIN jadwal b ON a.Jadwal_ID=b.Jadwal_ID JOIN mahasiswa c
                                   WHERE a.NIM=c.NIM AND a.NIM=$_POST[NIM] AND a.Tahun_ID='$_POST[Tahun_ID]') AS a LEFT JOIN matakuliah b
                                         ON a.identitas_ID=b.Identitas_ID AND a.Jurusan_ID=b.Jurusan_ID AND a.Kurikulum_ID=b.Kurikulum_ID AND a.Kode_mtk=b.Kode_mtk 
                                         LEFT JOIN dosen c ON a.Dosen_ID=c.ID LEFT JOIN ruang d ON a.Ruang_ID=d.ID
                                   ORDER BY b.Semester");
        $sql->execute();
        while($r=$sql->fetch(PDO::FETCH_OBJ)){
        $no++;
        ?>      
      <tr valign="top">
        <td><?php echo $no; ?>
          </td>
        <td align=center><?php echo $r->Kode_mtk; ?>
          </td>
        <td>
          <?php echo $r->Nama_matakuliah; ?>
        </td>
        <td align=center>
          <?php echo $r->SKS; ?>
        </td>
        <td align=center>
          <?php echo $r->Semester; ?>
        </td>
        <td align=center>
          <?php echo $r->Hari; ?>
        </td>
        <td>
          <?php echo $r->Ruang; ?>
        </td>
        <td align=center>
          <?php echo $r->Jam_Mulai; ?> - <?php echo $r->Jam_Selesai; ?>
        </td>
        <td>
            <?php echo $r->nama_lengkap; ?>, <?php echo $r->Gelar; ?>
        </td>
        <td>
            <?php echo $r->GradeNilai; ?>
        </td>
        <td>
            <?php echo $r->BobotNilai; ?>
        </td>
        <?php $mutu=$r->SKS*$r->BobotNilai; ?>
        <?php $tsks=$tsks+$r->SKS; ?>
        <?php $tmutu=$tmutu+$mutu; ?>
        <?php $ips=$tmutu/$tsks; ?>
        <td>
            <?php echo $mutu; ?>
        </td>
      </tr>
      
	    <?php
      }
  ?>
  </table>
    <table class="table_1">
<?php

  $query1 = $pdo->prepare("SELECT NamaKetua FROM jurusan WHERE Jurusan_ID='$data->Jurusan_ID'");
  $query1->execute();
  $data1=$query1->fetch(PDO::FETCH_OBJ);
?>         
      <tr>
        <td valign="top">Total Keseluruhan SKS Ambil</td>
        <td valign="top"><?php echo number_format($tsks,0,',','.');  ?></td>
      </tr>
      <tr>
        <td valign="top">Total Mutu SKS</td>
        <td valign="top"><?php echo number_format($tmutu,0,',','.');  ?></td>
      </tr>
      <tr>
        <td valign="top">Indeks Prestasi Semester</td>
        <td valign="top"><?php echo number_format($ips,2,',','.');  ?></td>
      </tr>
 <table class=hk>
 <tr>
 <td colspan="2"></td>
    <td width="286"></td>
  </tr>
  <tr>
    <td width="230" align="center">Mengetahui,</td>
    <td width="530"></td>
    <td align="center">Sumedang, <?php echo date("d-M-Y"); ?></td>
  </tr>
  <tr>
    <td align="center">Ketua Program Studi,<br /><br /><br /><br /><br />
        <?php echo $data1->NamaKetua; ?><br />
    <br/><br/></td>
    <td>&nbsp;</td>
    <td align="center" valign="top">Mahasiswa Bersangkutan<br /><br /><br /><br />
      ( ............................... )</td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table> 
<dl><dd><div align="center"></div>
    </dd>
  </dl>
</form>
</body>
</html>
