  <?php 
  error_reporting(0);
    include "printer.css"; ?>
<title>Transkrip Nilai</title>  
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
    <h2>Transkrip Nilai Mahasiswa</h2></td>
  </tr>
</table>
<table class="table_1">
  <?php  
  $query = $pdo->prepare("SELECT a.NIM,a.Nama,b.Jurusan_ID,b.nama_jurusan,c.Program_ID,c.nama_program,a.Foto 
                    FROM mahasiswa a JOIN jurusan b JOIN program c
                    WHERE a.Jurusan_ID=b.Jurusan_ID AND a.Program_ID=c.ID AND a.NIM='$_POST[NIM]'");
  $query->execute();
  $data=$query->fetch(PDO::FETCH_OBJ);
  $query1 = $pdo->prepare("SELECT NamaKetua FROM jurusan WHERE Jurusan_ID='$data->Jurusan_ID'");
  $query1->execute();
  $data1=$query1->fetch(PDO::FETCH_OBJ);

  ?>

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

  </table>
<table class="table_2">
<tr>
        <th><center>No</center></th>
        <th><center>Kode <br>Matakuliah</center></th>
        <th><center>Nama Matakuliah</center></th>
        <th><center>SKS</center></th>
        <th><center>Grade</center></th>
        <th><center>Bobot</center></th>
        <th><center>Mutu</center></th>

      </tr>

        <?php  
        $sql = $pdo->prepare("SELECT a.GradeNilai,a.BobotNilai,b.NIM,b.identitas_ID,b.Jurusan_ID,b.Kurikulum_ID,a.Kode_mtk,c.Nama_matakuliah,c.Semester,c.SKS
                                   FROM krs a JOIN mahasiswa b LEFT JOIN matakuliah c ON b.identitas_ID=c.Identitas_ID AND b.Jurusan_ID=c.Jurusan_ID AND b.Kurikulum_ID=c.Kurikulum_ID AND a.Kode_mtk=c.Kode_mtk
                                   WHERE a.NIM=b.NIM AND a.NIM=$_POST[NIM] 
                                   ORDER BY c.Semester");
        $sql->execute();
        while($r=$sql->fetch(PDO::FETCH_OBJ)){

        $no++;
        ?>      
      <?php $mutu=$r->SKS*$r->BobotNilai; ?>
      <?php $tsks=$tsks+$r->SKS; ?>
      <?php $tmutu=$tmutu+$mutu; ?>
      <?php $ip=$tmutu/$tsks; ?>
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
          <?php echo $r->GradeNilai; ?>
        </td>
        <td align=center>
          <?php echo $r->BobotNilai; ?>
        </td>
        <td>
          <?php echo $mutu; ?>
        </td>

      
	    <?php
      }
  ?>
  </table>
    <table class="table_1">
      <tr>
        <td valign="top">Total Keseluruhan SKS</td>
        <td valign="top"><?php echo number_format($tsks,0,',','.');  ?></td>
      </tr>        
      <tr>
        <td valign="top">Indeks Prestasi Kumulatif (IPK)</td>
        <td valign="top"><?php echo number_format($ip,2,',','.');  ?></td>
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
