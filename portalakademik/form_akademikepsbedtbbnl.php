<?php
switch($_GET['halaman']){
  default:
  ?>
    <div class="col-md-10"> 
        <div class="col-lg-12">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <div class="text-muted bootstrap-admin-box-title" style="color:white;">Administrator | EPSBED TBBNL</div>
            </div>
              <div class="bootstrap-admin-panel-content">                   
                  <table class="table table-striped" style="font-size:13px;">
                  <tr>
                    <td>Tahun Akademik</td>   <td width=950> : <select name="ID" onChange="MM_jumpMenu('parent',this,0)">
                  <?php echo"
                      <option value='media.php?page=epsbedtbbnl'></option>";
              
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
                    echo "<option value='?page=epsbedtbbnl&Tahun_ID=$d1[Tahun_ID]' $cek> $n - $d1[Tahun_ID]</option>";
              		}
              		?>
                    </select>
                    <input name="Tahun_ID" type="hidden" value="<?= $_REQUEST[Tahun_ID]; ?>"></td>
                  </tr> 
   
                  </table> <br />
                <?php
                echo"<a href=media.php?page=epsbedtbbnl&halaman=ekspor&Tahun_ID=$_REQUEST[Tahun_ID] class=link onClick=\"return confirm('Apakah Anda benar-benar akan mengekspor di tahun $_REQUEST[Tahun_ID] ?')\"><img src=../images/button_search.png> Ekspor DBF</img></a><br /><br /><br />";
                echo"<table width=200>";
                $sql="SELECT * FROM epsbed WHERE Ket='tbbnl' ORDER BY Nama";
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
                      <td><a href=media.php?page=epsbedtbbnl&halaman=deletefile&id=$d[ID]&nama=$d[Nama]><img src=../images/del.png></img></a></td>";
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
		array("THSMSTBBNL" , DBFFIELD_TYPE_CHAR, 5),
		array("KDPTITBBNL" , DBFFIELD_TYPE_CHAR, 6),
		array("KDJENTBBNL" , DBFFIELD_TYPE_CHAR, 1),
		array("KDPSTTBBNL" , DBFFIELD_TYPE_CHAR, 5),
		array("NLAKHTBBNL" , DBFFIELD_TYPE_CHAR, 2),
		array("BOBOTTBBNL" , DBFFIELD_TYPE_NUMERIC, 4, 2)  
        		
	);
	
	/* buat tabel baru */
	$tableNew = XBaseWritableTable::create("../download/TBBNL_$_REQUEST[Tahun_ID].DBF",$fields,false);
	
	 $sql="select a.Identitas_ID,a.Jurusan_ID,d.Jenjang_ID,a.grade,a.bobot 
         from  nilai a join jurusan c join jenjang d                   
         where a.Jurusan_ID=c.Jurusan_ID and c.jenjang=d.Nama
         order by a.Jurusan_ID,a.grade asc"; 
	  $no=0;
	  $qry=mysql_query($sql)
	  or die ();
	  while($d=mysql_fetch_array($qry)){
 
	$r =& $tableNew->appendRecord();
	$r->setObjectByName("THSMSTBBNL",$_REQUEST[Tahun_ID]);
	$r->setObjectByName("KDPTITBBNL",$d[Identitas_ID]);
	$r->setObjectByName("KDJENTBBNL",$d[Jenjang_ID]);
	$r->setObjectByName("KDPSTTBBNL",$d[Jurusan_ID]);
	$r->setObjectByName("NLAKHTBBNL",$d[grade]);
	$r->setObjectByName("BOBOTTBBNL",$d[bobot]);
	 $tableNew->writeRecord();
  }

  mysql_query("INSERT INTO epsbed (Nama,Ket) values ('TBBNL_$_REQUEST[Tahun_ID].DBF','tbbnl')");
	/* tutup tabel */
	$tableNew->close();
  echo "<script> window.location ='media.php?page=epsbedtbbnl&Tahun_ID=$_REQUEST[Tahun_ID]'</script></span>";
break;

case "deletefile":
mysql_query("DELETE FROM epsbed WHERE ID='$_GET[id]'");
unlink("../download/$_REQUEST[nama]");
  echo "<script> window.location ='media.php?page=epsbedtbbnl&Tahun_ID=$_REQUEST[Tahun_ID]'</script></span>";
break;

}
?>
</body>
</html>
