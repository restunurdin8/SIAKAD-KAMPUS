<?php
switch($_GET['halaman']){
  default:
  ?>
    <div class="col-md-10"> 
        <div class="col-lg-12">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <div class="text-muted bootstrap-admin-box-title" style="color:white;">Administrator | EPSBED TRAKD</div>
            </div>
              <div class="bootstrap-admin-panel-content">                   
                  <table class="table table-striped" style="font-size:13px;">
                  <tr>
                    <td>Tahun Akademik</td>   <td width=950> : <select name="ID" onChange="MM_jumpMenu('parent',this,0)">
                  <?php echo"
                      <option value='media.php?page=epsbedtrakd'></option>";
              
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
                    echo "<option value='?page=epsbedtrakd&Tahun_ID=$d1[Tahun_ID]' $cek> $n - $d1[Tahun_ID]</option>";
              		}
              		?>
                    </select>
                    <input name="Tahun_ID" type="hidden" value="<?= $_REQUEST[Tahun_ID]; ?>"></td>
                  </tr> 
   
                  </table> <br />
                <?php
                echo"<a href=media.php?page=epsbedtrakd&halaman=ekspor&Tahun_ID=$_REQUEST[Tahun_ID] class=link onClick=\"return confirm('Apakah Anda benar-benar akan mengekspor di tahun $_REQUEST[Tahun_ID] ?')\"><img src=../images/button_search.png> Ekspor DBF</img></a><br /><br /><br />";
                echo"<table width=200>";
                $sql="SELECT * FROM epsbed WHERE Ket='trakd' ORDER BY Nama";
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
                      <td><a href=media.php?page=epsbedtrakd&halaman=deletefile&id=$d[ID]&nama=$d[Nama]><img src=../images/del.png></img></a></td>";
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
		array("THSMSTRAKD" , DBFFIELD_TYPE_CHAR, 5),
		array("KDPTITRAKD" , DBFFIELD_TYPE_CHAR, 6),
		array("KDJENTRAKD" , DBFFIELD_TYPE_CHAR, 1),
		array("KDPSTTRAKD" , DBFFIELD_TYPE_CHAR, 5),
		array("NODOSTRAKD" , DBFFIELD_TYPE_CHAR, 10),
		array("KDKMKTRAKD" , DBFFIELD_TYPE_CHAR, 10),
		array("KELASTRAKD" , DBFFIELD_TYPE_CHAR, 2),
		array("TMRENTRAKD" , DBFFIELD_TYPE_NUMERIC, 2),
		array("TMRELTRAKD" , DBFFIELD_TYPE_NUMERIC, 2) 
        		
	);
	
	/* buat tabel baru */
	$tableNew = XBaseWritableTable::create("../download/TRAKD_$_REQUEST[Tahun_ID].DBF",$fields,false);
	
	 $sql="select a.Identitas_ID,c.Jenjang_ID,a.Jurusan_ID,d.NIDN,a.Kode_Mtk
         from jadwal a join jurusan b join jenjang c join dosen d
         where a.Jurusan_ID=b.Jurusan_ID and b.jenjang=c.Nama and a.Dosen_ID=d.ID and a.Tahun_ID=$_REQUEST[Tahun_ID]"; 
	  $no=0;
	  $qry=mysql_query($sql)
	  or die ();
	  while($d=mysql_fetch_array($qry)){
 
	$r =& $tableNew->appendRecord();
	$r->setObjectByName("THSMSTRAKD",$_REQUEST[Tahun_ID]);
	$r->setObjectByName("KDPTITRAKD",$d[Identitas_ID]);
	$r->setObjectByName("KDJENTRAKD",$d[Jenjang_ID]);
	$r->setObjectByName("KDPSTTRAKD",$d[Jurusan_ID]);
	$r->setObjectByName("NODOSTRAKD",$d[NIDN]);
	$r->setObjectByName("KDKMKTRAKD",$d[Kode_Mtk]);
	$r->setObjectByName("KELASTRAKD",NULL);
	$r->setObjectByName("TMRENTRAKD",NULL);
	$r->setObjectByName("TMRELTRAKD",NULL);
	 $tableNew->writeRecord();
  }

  mysql_query("INSERT INTO epsbed (Nama,Ket) values ('TRAKD_$_REQUEST[Tahun_ID].DBF','trakd')");
	/* tutup tabel */
	$tableNew->close();
  echo "<script> window.location ='media.php?page=epsbedtrakd&Tahun_ID=$_REQUEST[Tahun_ID]'</script></span>";
break;

case "deletefile":
mysql_query("DELETE FROM epsbed WHERE ID='$_GET[id]'");
unlink("../download/$_REQUEST[nama]");
  echo "<script> window.location ='media.php?page=epsbedtrakd&Tahun_ID=$_REQUEST[Tahun_ID]'</script></span>";
break;

}
?>
</body>
</html>
