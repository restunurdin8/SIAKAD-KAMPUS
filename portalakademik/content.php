<script language="javascript" type="text/javascript">
    <!--
    function MM_jumpMenu(targ,selObj,restore){// v3.0
     eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
    if (restore) selObj.selectedIndex=0;
    }
    //-->
</script> 
<?php
include_once '../config/koneksi.php';
include_once '../library/fungsi_indotgl.php';
include_once 'phpxbase/Column.class.php';
include_once 'phpxbase/Record.class.php';
include_once 'phpxbase/Table.class.php';
include_once 'phpxbase/WritableTable.class.php';

function GetCheckboxes($table, $key, $Label, $Label1, $Nilai='') {
  $s = "select * from $table";
  $r = mysql_query($s);
  $_arrNilai = explode(',', $Nilai);
  $str = '';
  while ($w = mysql_fetch_array($r)) {
    $_ck = (array_search($w[$key], $_arrNilai) === false)? '' : 'checked';
    $str .= "<input type=checkbox name='".$key."[]' value='$w[$key]' $_ck> $w[$Label] - $w[$Label1] </br>";
  }
  return $str;
}

if ($_GET['page']=='home'){
?>
                <div class="col-md-10"> 
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-primary bootstrap-admin-no-table-panel">
                                <div class="panel-heading">
                                    <div class="text-muted bootstrap-admin-box-title" style="color:white;">Statistics</div>
                                    <div class="pull-right"><span class="badge">View More</span></div>
                                </div>
                                <div class="bootstrap-admin-panel-content bootstrap-admin-no-table-panel-content collapse in">
                                    <div class="col-md-3">
                                        <div class="easyPieChart" data-percent="73" style="width: 110px; height: 110px; line-height: 110px;">73%<canvas width="110" height="110"></canvas></div>
                                        <div class="chart-bottom-heading"><span class="label label-info">Visitors</span></div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="easyPieChart" data-percent="53" style="width: 110px; height: 110px; line-height: 110px;">53%<canvas width="110" height="110"></canvas></div>
                                        <div class="chart-bottom-heading"><span class="label label-info">Page Views</span></div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="easyPieChart" data-percent="83" style="width: 110px; height: 110px; line-height: 110px;">83%<canvas width="110" height="110"></canvas></div>
                                        <div class="chart-bottom-heading"><span class="label label-info">Users</span></div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="easyPieChart" data-percent="13" style="width: 110px; height: 110px; line-height: 110px;">13%<canvas width="110" height="110"></canvas></div>
                                        <div class="chart-bottom-heading"><span class="label label-info">Orders</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>  
<?php
}
//Level Administrator Modul Akademik
elseif ($_GET['page']=='kalenderakademik'){  
    include "form_akademiktkalender.php";
}
elseif ($_GET['page']=='jadwalkuliah'){  
    include "form_akademiktjadwal.php";
}
elseif ($_GET['page']=='registrasiulangmhsw'){  
    include "form_akademikregmhsw.php";
}
elseif ($_GET['page']=='registrasiulangmhsw'){  
    include "form_akademikregmhsw.php";
}
elseif ($_GET['page']=='akademikkrs'){  
    include "form_akademikkrs.php";
}
elseif ($_GET['page']=='akademikinputnilaimhs'){  
    include "form_akademikinputnilaimahasiswa.php";
}
elseif ($_GET['page']=='akademikkhsmhs'){  
    include "form_akademikkhs.php";
}
elseif ($_GET['page']=='akademiktranskripnilai'){  
    include "form_akademiktranskripnilaimhs.php";
}
elseif ($_GET['page']=='50f9e899-0d4d-4b7b-a518-fb18bc430926'){  
    include "form_akademikuploadfile.php";
}

//Level Administrator Modul Master
elseif ($_GET['page']=='masterinstitusi'){  
    include "form_masterinstitusi.php";
}
elseif ($_GET['page']=='masterprodi'){  
    include "form_masterprodi.php";
}
elseif ($_GET['page']=='masterprogram'){  
    include "form_masterprogram.php";
}
elseif ($_GET['page']=='masterkampus'){  
    include "form_masterkampus.php";
}
elseif ($_GET['page']=='masterruangan'){  
    include "form_masterruangan.php";
}
elseif ($_GET['page']=='mastermatakuliah'){  
    include "form_mastermatakuliah.php";
}
elseif ($_GET['page']=='masterdosen'){  
    include "form_masterdosen.php";
}
elseif ($_GET['page']=='mastermahasiswa'){  
    include "form_mastermahasiswa.php";
}

//Level Administrator Modul Admin
elseif ($_GET['page']=='adminadministrator'){  
    include "form_adminadministrator.php";
} 
elseif ($_GET['page']=='adminakademik'){  
    include "form_adminakademik.php";
} 

//Level Administrator EPSBES
elseif ($_GET['page']=='epsbedmsmhs'){  
    include "form_akademikepsbedmsmhs.php";
} 
elseif ($_GET['page']=='epsbedttbkmk'){  
    include "form_akademikepsbedtbkmk.php";
}
elseif ($_GET['page']=='epsbedtbbnl'){  
    include "form_akademikepsbedtbbnl.php";
}
elseif ($_GET['page']=='epsbedtrakd'){  
    include "form_akademikepsbedtrakd.php";
}
elseif ($_GET['page']=='epsbedtrnlm'){  
    include "form_akademikepsbedtrnlm.php";
}

//Level Akademik Modul Ba Akademik
elseif ($_GET['page']=='baakademikkalender'){  
    include "form_bakademiktkalender.php";
} 
elseif ($_GET['page']=='baakademikjadwal'){  
    include "form_bakademiktjadwal.php";
}
elseif ($_GET['page']=='baakademikregulang'){  
    include "form_bakademikregmhsw.php";
}
elseif ($_GET['page']=='baakademikregulang'){  
    include "form_bakademikregmhsw.php";
}
elseif ($_GET['page']=='baakademikjadwalkrs'){  
    include "form_bakademikkrs.php";
}
elseif ($_GET['page']=='bakademikinputnilaimhs'){  
    include "form_bakademikinputnilaimahasiswa.php";
}
elseif ($_GET['page']=='bakademikkhsmhs'){  
    include "form_bakademikkhs.php";
}
elseif ($_GET['page']=='bakademiktranskripnilai'){  
    include "form_bakademiktranskripnilaimhs.php";
}

//Level Akademik Modul Master
elseif ($_GET['page']=='baakademikmastermatakuliah'){  
    include "form_baakademikmastermatakuliah.php";
}
elseif ($_GET['page']=='baakademikmastermahasiswa'){  
    include "form_baakademikmastermahasiswa.php";
}

//Level Dosen Modul Dosen
elseif ($_GET['page']=='dosendata'){  
    include "form_dosendata.php";
}
elseif ($_GET['page']=='doseninputnilaimhsw'){  
    include "form_doseninputnilaimahasiswa.php";
}
elseif ($_GET['page']=='1f56234e-4361-4706-bb5a-91d3101bbdb6'){  
    include "form_dosenuploadmateri.php";
}

//Level Mahasiswa Modul Mahasiswa
elseif ($_GET['page']=='mahasiswadata'){  
    include "form_mahasiswadata.php";
}
elseif ($_GET['page']=='mahasiswakrs'){  
    include "form_mahasiswakrs.php";
}
elseif ($_GET['page']=='mahasiswakhs'){  
    include "form_mahasiswakhs.php";
}
elseif ($_GET['page']=='mahasiswatranskrip'){  
    include "form_mahasiswatranskripnilaimhs.php";
}
elseif ($_GET['page']=='24fd7148-9843-46d6-bb33-5b1d86b5a172'){  
    include "form_mahasiswadownloadmateri.php";
}
else{
  echo"Modul Belum Ada";
}
?>
