<?php
switch($_GET['halaman']){
  default:
  ?>
    <div class="col-md-10"> 
        <div class="col-lg-12">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <div class="text-muted bootstrap-admin-box-title" style="color:white;">Administrator | EPSBED MSMHS</div>
            </div>
              <div class="bootstrap-admin-panel-content">                   
                  <table class="table table-striped" style="font-size:13px;">
                  <tr>
                    <td>Tahun Akademik</td>   <td width=950> : <select name="ID" onChange="MM_jumpMenu('parent',this,0)">
                  <?php echo"
                      <option value='media.php?page=epsbedmsmhs'></option>";
              
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
                    echo "<option value='?page=epsbedmsmhs&Tahun_ID=$d1[Tahun_ID]' $cek> $n - $d1[Tahun_ID]</option>";
              		}
              		?>
                    </select>
                    <input name="Tahun_ID" type="hidden" value="<?= $_REQUEST[Tahun_ID]; ?>"></td>
                  </tr> 
   
                  </table> <br />
                <?php
                echo"<a href=media.php?page=epsbedmsmhs&halaman=ekspor&Tahun_ID=$_REQUEST[Tahun_ID] class=link onClick=\"return confirm('Apakah Anda benar-benar akan mengekspor di tahun $_REQUEST[Tahun_ID] ?')\"><img src=../images/button_search.png> Ekspor DBF</img></a><br /><br /><br />";
                echo"<table width=200>";
                $sql="SELECT * FROM epsbed WHERE Ket='msmhs' ORDER BY Nama";
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
                        <td><a href=media.php?page=epsbedmsmhs&halaman=deletefile&id=$d[ID]&nama=$d[Nama]><img src=../images/del.png></img></a></td>";
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
		array("KDPTIMSMHS" , DBFFIELD_TYPE_CHAR, 6),
		array("KDJENMSMHS" , DBFFIELD_TYPE_CHAR, 1),
		array("KDPSTMSMHS" , DBFFIELD_TYPE_CHAR, 5),
		array("NIMHSMSMHS" , DBFFIELD_TYPE_CHAR, 15),
		array("NMMHSMSMHS" , DBFFIELD_TYPE_CHAR, 30),
    array("SHIFTMSMHS" , DBFFIELD_TYPE_CHAR, 1),
		array("TPLHRMSMHS" , DBFFIELD_TYPE_CHAR, 20),
		array("TGLHRMSMHS" , DBFFIELD_TYPE_CHAR, 8),
		array("KDJEKMSMHS" , DBFFIELD_TYPE_CHAR, 1),
		array("TAHUNMSMHS" , DBFFIELD_TYPE_CHAR, 4),
		array("SMAWLMSMHS" , DBFFIELD_TYPE_CHAR, 5),
		array("BTSTUMSMHS" , DBFFIELD_TYPE_CHAR, 5),
		array("ASSMAMSMHS" , DBFFIELD_TYPE_CHAR, 2),
		array("TGMSKMSMHS" , DBFFIELD_TYPE_CHAR, 8),
		array("TGLLSMSMHS" , DBFFIELD_TYPE_DATE),
		array("STMHSMSMHS" , DBFFIELD_TYPE_CHAR, 1),
		array("STPIDMSMHS" , DBFFIELD_TYPE_CHAR, 1),
		array("SKSDIMSMHS" , DBFFIELD_TYPE_NUMERIC, 3),
		array("ASNIMMSMHS" , DBFFIELD_TYPE_CHAR, 15),
		array("ASPTIMSMHS" , DBFFIELD_TYPE_CHAR, 6),
		array("ASJENMSMHS" , DBFFIELD_TYPE_CHAR, 1),
		array("ASPSTMSMHS" , DBFFIELD_TYPE_CHAR, 5),    
		array("BISTUMSMHS" , DBFFIELD_TYPE_CHAR, 1),    
 		array("PEKSBMSMHS" , DBFFIELD_TYPE_CHAR, 1),     
		array("NMPEKMSMHS" , DBFFIELD_TYPE_CHAR, 40),
		array("PTPEKMSMHS" , DBFFIELD_TYPE_CHAR, 6),
		array("PSPEKMSMHS" , DBFFIELD_TYPE_CHAR, 5),		
		array("NOPRMMSMHS" , DBFFIELD_TYPE_CHAR, 10),    
		array("NOKP1MSMHS" , DBFFIELD_TYPE_CHAR, 10),    
 		array("NOKP2MSMHS" , DBFFIELD_TYPE_CHAR, 10),   
		array("NOKP3MSMHS" , DBFFIELD_TYPE_CHAR, 10),    
		array("NOKP4MSMHS" , DBFFIELD_TYPE_CHAR, 10)    
    
    
    		
	);
	
	/* buat tabel baru */
	$tableNew = XBaseWritableTable::create("../download/MSMHS_$_REQUEST[Tahun_ID].DBF",$fields,false);
	
	 $sql="select 
            a.Identitas_ID,
            a.Jurusan_ID,
            a.NIM,
            a.Nama,
            b.Program_ID,
            a.TempatLahir,
            a.TanggalLahir,
            a.Kelamin,
            a.Angkatan,
            a.Tahun_ID,
            a.StatusAwal_ID,
            a.StatusMhsw_ID,
            a.PropinsiAsal,
            a.TglSKMasuk
            from 
            mahasiswa a 
            left join program b on a.Program_ID = b.Program_ID
            left join jurusan c on a.Jurusan_ID = c.Jurusan_ID 
            WHERE
            a.Tahun_ID=$_REQUEST[Tahun_ID]"; 
	  $no=0;
	  $qry=mysql_query($sql)
	  or die ();
	  while($d=mysql_fetch_array($qry)){
    $tgllhr = str_replace("-","", $d[TanggalLahir]);
    $tglsk = str_replace("-","", $d[TglSKMasuk]);
 
	$r =& $tableNew->appendRecord();
		$r->setObjectByName("KDPTIMSMHS", $d[Identitas_ID]);
		$r->setObjectByName("KDPSTMSMHS", $d[Jurusan_ID]);
		$r->setObjectByName("NIMHSMSMHS", $d[NIM]);
		$r->setObjectByName("NMMHSMSMHS", $d[Nama]);
    $r->setObjectByName("SHIFTMSMHS", $d[Program_ID ]);
		$r->setObjectByName("TPLHRMSMHS", $d[TempatLahir]);
		$r->setObjectByName("TGLHRMSMHS", $tgllhr);
		$r->setObjectByName("KDJEKMSMHS", $d[Kelamin]);
		$r->setObjectByName("TAHUNMSMHS", $d[Angkatan]);
		$r->setObjectByName("SMAWLMSMHS", $d[Tahun_ID]);
		$r->setObjectByName("BTSTUMSMHS", NULL);
		$r->setObjectByName("ASSMAMSMHS", $d[PropinsiAsal]);
		$r->setObjectByName("TGMSKMSMHS", $tglsk);
		$r->setObjectByName("TGLLSMSMHS", NULL);
		$r->setObjectByName("STMHSMSMHS", $d[StatusAwal_ID]);
		$r->setObjectByName("STPIDMSMHS", $d[StatusMhsw_ID]);
		$r->setObjectByName("SKSDIMSMHS", NULL);
		$r->setObjectByName("ASNIMMSMHS", NULL);
		$r->setObjectByName("ASPTIMSMHS", NULL);
		$r->setObjectByName("ASJENMSMHS", NULL);
		$r->setObjectByName("ASPSTMSMHS", NULL);    
		$r->setObjectByName("BISTUMSMHS", NULL);    
 		$r->setObjectByName("PEKSBMSMHS", NULL);     
		$r->setObjectByName("NMPEKMSMHS", NULL);
		$r->setObjectByName("PTPEKMSMHS", NULL);
		$r->setObjectByName("PSPEKMSMHS", NULL);		
		$r->setObjectByName("NOPRMMSMHS", NULL);    
		$r->setObjectByName("NOKP1MSMHS", NULL);    
 		$r->setObjectByName("NOKP2MSMHS", NULL);   
		$r->setObjectByName("NOKP3MSMHS", NULL);    
		$r->setObjectByName("NOKP4MSMHS", NULL);
	 $tableNew->writeRecord();
  }

  mysql_query("INSERT INTO epsbed (Nama,Ket) values ('MSMHS_$_REQUEST[Tahun_ID].DBF','msmhs')");
	/* tutup tabel */
	$tableNew->close();
  echo "<script> window.location ='media.php?page=epsbedmsmhs&Tahun_ID=$_REQUEST[Tahun_ID]'</script></span>";
break;

case "deletefile":
mysql_query("DELETE FROM epsbed WHERE ID='$_GET[id]'");
unlink("../download/$_REQUEST[nama]");
  echo "<script> window.location ='media.php?page=epsbedmsmhs&Tahun_ID=$_REQUEST[Tahun_ID]'</script></span>";
break;

}
?>
</body>
</html>
