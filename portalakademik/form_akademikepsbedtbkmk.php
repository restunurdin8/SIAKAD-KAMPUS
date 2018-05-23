<?php
switch($_GET['halaman']){
  default:
  ?>
    <div class="col-md-10"> 
        <div class="col-lg-12">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <div class="text-muted bootstrap-admin-box-title" style="color:white;">Administrator | EPSBED TBKMK</div>
            </div>
              <div class="bootstrap-admin-panel-content">                   
                  <table class="table table-striped" style="font-size:13px;">
                  <tr>
                    <td>Tahun Akademik</td>   <td width=950> : <select name="ID" onChange="MM_jumpMenu('parent',this,0)">
                  <?php echo"
                      <option value='media.php?page=epsbedttbkmk'></option>";
              
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
                    echo "<option value='?page=epsbedttbkmk&Tahun_ID=$d1[Tahun_ID]' $cek> $n - $d1[Tahun_ID]</option>";
              		}
              		?>
                    </select>
                    <input name="Tahun_ID" type="hidden" value="<?= $_REQUEST[Tahun_ID]; ?>"></td>
                  </tr> 
   
                  </table> <br />
                <?php
                echo"<a href=media.php?page=epsbedttbkmk&halaman=ekspor&Tahun_ID=$_REQUEST[Tahun_ID] class=link onClick=\"return confirm('Apakah Anda benar-benar akan mengekspor di tahun $_REQUEST[Tahun_ID] ?')\"><img src=../images/button_search.png> Ekspor DBF</img></a><br /><br /><br />";
                echo"<table width=200>";
                $sql="SELECT * FROM epsbed WHERE Ket='tbkmk' ORDER BY Nama";
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
                      <td><a href=media.php?page=epsbedttbkmk&halaman=deletefile&id=$d[ID]&nama=$d[Nama]><img src=../images/del.png></img></a></td>";
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
    array("THSMSTBKMK" , DBFFIELD_TYPE_CHAR, 5),
    array("KDPTITBKMK" , DBFFIELD_TYPE_CHAR, 6),
    array("KDJENTBKMK" , DBFFIELD_TYPE_CHAR, 1),
    array("KDPSTTBKMK" , DBFFIELD_TYPE_CHAR, 5),
    array("KDKMKTBKMK" , DBFFIELD_TYPE_CHAR, 10),
    array("NAKMKTBKMK" , DBFFIELD_TYPE_CHAR, 40),
    array("SKSMKTBKMK" , DBFFIELD_TYPE_NUMERIC, 1),
    array("SKSTMTBKMK" , DBFFIELD_TYPE_NUMERIC, 1),
    array("SKSPRTBKMK" , DBFFIELD_TYPE_NUMERIC, 1),
    array("SKSLPTBKMK" , DBFFIELD_TYPE_NUMERIC, 1),
    array("SEMESTBKMK" , DBFFIELD_TYPE_CHAR, 2),
    array("KDWPLTBKMK" , DBFFIELD_TYPE_CHAR, 1),
    array("KDKURTBKMK" , DBFFIELD_TYPE_CHAR, 1),
    array("KDKELTBKMK" , DBFFIELD_TYPE_CHAR, 1),
    array("NODOSTBKMK" , DBFFIELD_TYPE_CHAR, 10),
    array("JENJATBKMK" , DBFFIELD_TYPE_CHAR, 1),
    array("PRODITBKMK" , DBFFIELD_TYPE_CHAR, 5),
    array("STKMKTBKMK" , DBFFIELD_TYPE_CHAR, 1),
    array("SLBUSTBKMK" , DBFFIELD_TYPE_CHAR, 1),
    array("SAPPPTBKMK" , DBFFIELD_TYPE_CHAR, 1),
    array("BHNAJTBKMK" , DBFFIELD_TYPE_CHAR, 1),
    array("DIKTTTBKMK" , DBFFIELD_TYPE_CHAR, 1)   
        		
	);
	
	/* buat tabel baru */
	$tableNew = XBaseWritableTable::create("../download/TBKMK_$_REQUEST[Tahun_ID].DBF",$fields,false);
	
	 $sql="select 
        a.Matakuliah_ID,
        a.Identitas_ID,
        a.Kode_mtk,
        a.Nama_matakuliah,
        a.Nama_english,
        a.Semester,
        a.SKS,
        a.Jurusan_ID,
        a.KelompokMtk_ID,
        a.JenisMTK_ID,
        a.JenisKurikulum_ID,
        a.StatusMtk_ID,
        c.NIDN,
        e.Jenjang_ID 
        from 
        matakuliah a 
        join dosen c
        join jurusan d
        join jenjang e 
        WHERE
        a.Penanggungjawab = c.ID AND 
        a.Jurusan_ID = d.Jurusan_ID AND
        d.jenjang = e.Nama and a.StatusMtk_ID='A'
        GROUP BY
        a.Matakuliah_ID
        ORDER BY
        a.Jurusan_ID,a.Kode_mtk"; 
	  $no=0;
	  $qry=mysql_query($sql)
	  or die ();
	  while($d=mysql_fetch_array($qry)){
 
	$r =& $tableNew->appendRecord();
    $r->setObjectByName("THSMSTBKMK" ,$_REQUEST[Tahun_ID]);
    $r->setObjectByName("KDPTITBKMK" ,$d[Identitas_ID]);
    $r->setObjectByName("KDJENTBKMK" ,$d[Jenjang_ID]);
    $r->setObjectByName("KDPSTTBKMK" ,$d[Jurusan_ID]);
    $r->setObjectByName("KDKMKTBKMK" ,$d[Kode_mtk]);
    $r->setObjectByName("NAKMKTBKMK" ,$d[Nama_matakuliah]);
    $r->setObjectByName("SKSMKTBKMK" ,$d[SKS]);
    $r->setObjectByName("SKSTMTBKMK" ,NULL);
    $r->setObjectByName("SKSPRTBKMK" ,NULL);
    $r->setObjectByName("SKSLPTBKMK" ,NULL);
    $r->setObjectByName("SEMESTBKMK" ,$d[Semester]);
    $r->setObjectByName("KDWPLTBKMK" ,$d[JenisMTK_ID]);
    $r->setObjectByName("KDKURTBKMK" ,$d[JenisKurikulum_ID]);
    $r->setObjectByName("KDKELTBKMK" ,$d[KelompokMtk_ID]);
    $r->setObjectByName("NODOSTBKMK" ,$d[NIDN]);
    $r->setObjectByName("JENJATBKMK" ,NULL);
    $r->setObjectByName("PRODITBKMK" ,NULL);
    $r->setObjectByName("STKMKTBKMK" ,$d[StatusMtk_ID]);
    $r->setObjectByName("SLBUSTBKMK" ,NULL);
    $r->setObjectByName("SAPPPTBKMK" ,NULL);
    $r->setObjectByName("BHNAJTBKMK" ,NULL);
    $r->setObjectByName("DIKTTTBKMK" ,NULL);
	 $tableNew->writeRecord();
  }

  mysql_query("INSERT INTO epsbed (Nama,Ket) values ('TBKMK_$_REQUEST[Tahun_ID].DBF','tbkmk')");
	/* tutup tabel */
	$tableNew->close();
  echo "<script> window.location ='media.php?page=epsbedttbkmk&Tahun_ID=$_REQUEST[Tahun_ID]'</script></span>";
break;

case "deletefile":
mysql_query("DELETE FROM epsbed WHERE ID='$_GET[id]'");
unlink("../download/$_REQUEST[nama]");
  echo "<script> window.location ='media.php?page=epsbedttbkmk&Tahun_ID=$_REQUEST[Tahun_ID]'</script></span>";
break;

}
?>
</body>
</html>
