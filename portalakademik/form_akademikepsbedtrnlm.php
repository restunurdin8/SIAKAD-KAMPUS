<?php
switch($_GET['halaman']){
  default:
  ?>
    <div class="col-md-10"> 
        <div class="col-lg-12">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <div class="text-muted bootstrap-admin-box-title" style="color:white;">Administrator | EPSBED TRNLM</div>
            </div>
              <div class="bootstrap-admin-panel-content">                   
                  <table class="table table-striped" style="font-size:13px;">
                  <tr>
                    <td>Tahun Akademik</td>   <td width=950> : <select name="ID" onChange="MM_jumpMenu('parent',this,0)">
                  <?php echo"
                      <option value='media.php?page=epsbedtrnlm'></option>";
              
              	  $sqlp="SELECT * FROM tahun GROUP BY Tahun_ID";
              	  $qryp=mysql_query($sqlp)
              	  or die();
              	  while ($d1=mysql_fetch_array($qryp)){
              	  $n++;
                  if ($d1['Tahun_ID']==$_REQUEST[Tahun_ID]){
                    $cek="selected";
                    }
                    else{
                      $cek="";
                    }
                    echo "<option value='?page=epsbedtrnlm&Tahun_ID=$d1[Tahun_ID]' $cek> $n - $d1[Tahun_ID]</option>";
              		}
              		?>
                    </select>
                    <input name="Tahun_ID" type="hidden" value="<?= $_REQUEST[Tahun_ID]; ?>"></td>
                  </tr> 
   
                  </table> <br />
                <?php
                echo"<a href=media.php?page=epsbedtrnlm&halaman=ekspor&Tahun_ID=$_REQUEST[Tahun_ID] class=link onClick=\"return confirm('Apakah Anda benar-benar akan mengekspor di tahun $_REQUEST[Tahun_ID] ?')\"><img src=../images/button_search.png> Ekspor DBF</img></a><br /><br /><br />";
                echo"<table width=200>";
                $sql="SELECT * FROM epsbed WHERE Ket='trnlm' ORDER BY Nama";
                $qry= mysql_query($sql)
                or die ();
                while ($d=mysql_fetch_array($qry)){
                if(($no % 2)==0){
                    $warna="#ebf0f5";
                }
                else{
                    $warna="#FFF";
                }
                $no++;                    
              echo "<tr bgcolor=$warna>
                      <td width=10>$no</td>
                      <td width=10>&nbsp;</td>
                      <td><a title='Download file' href='downlodepsbed.php?file=$d[Nama]'><span style='color:red'>$d[Nama]</span></td>
                      <td><a href=media.php?page=epsbedtrnlm&halaman=deletefile&id=$d[ID]&nama=$d[Nama]><img src=../images/del.png></img></a></td>";
                    }
                  echo"</tr></table></div>";
        ?>    
        <body class="bootstrap-admin-with-small-navbar">

            </div>
          </div>
        </div>
      </div>
  </body>
  </html> 
  <?php
break;

case"ekspor":
	/* definisikan field */	
	$fields = array(
		array("THSMSTRNLM" , DBFFIELD_TYPE_CHAR, 5),
		array("KDPTITRNLM" , DBFFIELD_TYPE_CHAR, 6),
		array("KDJENTRNLM" , DBFFIELD_TYPE_CHAR, 1),
		array("KDPSTTRNLM" , DBFFIELD_TYPE_CHAR, 5),
		array("NIMHSTRNLM" , DBFFIELD_TYPE_CHAR, 15),
		array("KDKMKTRNLM" , DBFFIELD_TYPE_CHAR, 10),
		array("NLAKHTRNLM" , DBFFIELD_TYPE_CHAR, 2),
		array("BOBOTTRNLM" , DBFFIELD_TYPE_NUMERIC, 4, 2),
		array("KELASTRNLM" , DBFFIELD_TYPE_CHAR, 2)
	);
	
	/* buat tabel baru */
	$tableNew = XBaseWritableTable::create("../download/TRNLM_$_REQUEST[Tahun_ID].DBF",$fields,false);
	
	 $sql="select 
          a.Tahun_ID,
          c.Identitas_ID,
          g.Jenjang_ID,
          c.Jurusan_ID,
          c.NIM,
          a.Kode_mtk,
          a.GradeNilai,
          a.BobotNilai
          from 
          krs a   
          join mahasiswa c 
          join matakuliah d 
          left join jadwal e on a.Jadwal_ID = e.Jadwal_ID  
          join jurusan f     
          join jenjang g 
          where 
          a.NIM = c.NIM and
          c.Jurusan_ID = f.Jurusan_ID and
          f.jenjang = g.Nama and
          d.Kode_mtk = a.Kode_mtk AND 
          d.Jurusan_ID=c.Jurusan_ID and
          a.Tahun_ID=$_REQUEST[Tahun_ID]
          group by 
          a.KRS_ID 
          order by 
          c.NIM"; 
	  $no=0;
	  $qry=mysql_query($sql)
	  or die ();
	  while($d=mysql_fetch_array($qry)){
 
	$r =& $tableNew->appendRecord();
	$r->setObjectByName("THSMSTRNLM",$d[Tahun_ID]);
	$r->setObjectByName("KDPTITRNLM",$d[Identitas_ID]);
	$r->setObjectByName("KDJENTRNLM",$d[Jenjang_ID]);
	$r->setObjectByName("KDPSTTRNLM",$d[Jurusan_ID]);
	$r->setObjectByName("NIMHSTRNLM",$d[NIM]);
	$r->setObjectByName("KDKMKTRNLM",$d[Kode_mtk]);
	$r->setObjectByName("NLAKHTRNLM",$d[GradeNilai]);
	$r->setObjectByName("BOBOTTRNLM",$d[BobotNilai]);
	$r->setObjectByName("KELASTRNLM",NULL);
	 $tableNew->writeRecord();
  }

  mysql_query("INSERT INTO epsbed (Nama,Ket) values ('TRNLM_$_REQUEST[Tahun_ID].DBF','trnlm')");
	/* tutup tabel */
	$tableNew->close();
  echo "<script> window.location ='media.php?page=epsbedtrnlm&Tahun_ID=$_REQUEST[Tahun_ID]'</script></span>";
break;

case "deletefile":
mysql_query("DELETE FROM epsbed WHERE ID='$_GET[id]'");
unlink("../download/$_REQUEST[nama]");
  echo "<script> window.location ='media.php?page=epsbedtrnlm&Tahun_ID=$_REQUEST[Tahun_ID]'</script></span>";
break;

}
?>
</body>
</html>
