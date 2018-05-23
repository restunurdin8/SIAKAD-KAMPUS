<style>
#aa
{
-webkit-animation:blink 1s infinite; /* Safari and Chrome */
animation:blink 1s infinite;
}

@keyframes blink
{
0% {color:black;}
50% {color:red;}
}

@-webkit-keyframes blink /* Safari and Chrome */
{
0% {color:black;}
50% {color:red;}
}
</style>
<?php     
switch($_GET['halaman']){
     
  default:    
  ?>               
   
    <div class="col-md-10"> 
        <div class="col-lg-12">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <div class="text-muted bootstrap-admin-box-title" style="color:white;">Administrator | Upload File</div>
            </div>
              <div class="bootstrap-admin-panel-content">                   




              <?php
            if ($_REQUEST['error']=='8d8c819259748eea5e9a0e003bfa6b40'){ 
              ?>
                <div class="alert alert-success"><a class="close" data-dismiss="alert" href="#">&times;</a>
                    <strong>Success!</strong> Data berhasil disimpan.
                </div>
             <?php
             }
     echo"<form method='post' action='?page=50f9e899-0d4d-4b7b-a518-fb18bc430926&halaman=share'> 
          <table class='table table-striped' style='font-size:13px;''>
             <input name='Tahun_ID' type=hidden value='$_REQUEST[Tahun_ID]'>
             <input name='Angkatan' type=hidden value='$_REQUEST[Angkatan]'>
             <input name='jj' type=hidden value='$_REQUEST[jj]'>
             <input name='prodi' type=hidden value='$_REQUEST[prodi]'>
             <input name='prog' type=hidden value='$_REQUEST[prog]'>
            <button class='btn btn-xs btn-success' type='submit'><i class='glyphicon glyphicon-share'></i> Upload File</button>                    
          </form>"; 
            ?>
          <body class="bootstrap-admin-with-small-navbar">
              <table  class="table table-hover" id="example" style="font-size:12px;">
                  <thead>
                    <tr style="background-color:#3e8bda; color:white;">
                      <th>No</th><th>#</th><th>Download</th><th>Judul File</th><th>File</th><th>Tgl Posting</th>                    
                    </tr>
                  </thead>
                <tbody>
            <?php

            $sql = $pdo->prepare("select * from fileupload where Level_ID='1'");
            $sql->execute();
            while($r=$sql->fetch(PDO::FETCH_OBJ)){
          	$tgl1 = tgl_indo($r->TglInput);
            $no++;

            echo"  <tr class='odd gradeX'>
                     <td width=10>$no</td>
                      <td width=90><form method='post' action='form_akademikuploadfileact.php?page=50f9e899-0d4d-4b7b-a518-fb18bc430926&halaman=hapus'>
                                    <input name='FileN' type=hidden value='$r->Nama_File'> 
                                    <input name='File_ID' type=hidden value='$r->File_ID'>
                      <button class='btn btn-xs btn-danger' >
                         <i class='glyphicon glyphicon-remove glyphicon-edit'></i> Hapus File
                      </button>
                     </a></td></form>  
                     <td><a style='color:red' href='download.php?file=$r->File'>
                     <input class='btn btn-xs btn-success'  type='button' value='Download Bahan'></a></td>
                     <td>$r->Nama_File</td>
                     <td>$r->File</td>  
                     <td>$tgl1</td>

                    </tr>";
            }
            ?>
              </table>
          </div>
        </div>
      </div>      
  <?php                                                                                
  break;
  
  case "share":
  ?>
    <div class="col-md-10"> 
        <div class="col-lg-12">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <div class="text-muted bootstrap-admin-box-title" style="color:white;">Dosen | Upload Bahan & Tugas</div>
            </div>
              <div class="bootstrap-admin-panel-content">                   

                <form method="post" id="selecttest" action="form_akademikuploadfileact.php?page=50f9e899-0d4d-4b7b-a518-fb18bc430926&halaman=simpan" enctype="multipart/form-data">
                  <table class="table table-striped" style="font-size:13px;">
                  <?php  
                echo"  <tr><td width=200>Judul File</td><td> <input name='Judul' id='Judul' data-rule-required='true' data-msg-required='Judul tidak boleh kosong' style='width:380px; height:25px;' type='text' class='form-control col-md-6' id='typeahead' autocomplete='off' data-provide='typeahead' data-items='4'></td></tr>"; 

                   echo"  <tr><td>Upload File</td><td>  <input type=file name='fupload' id='fupload' data-rule-required='true' data-msg-required='File tidak boleh kosong' size=40>

                        <tr><td colspan=2><button class='btn btn-sm btn-success' type='submit'><i class='glyphicon glyphicon-ok'></i> Simpan Data</button></td></tr>";
                 ?>                                                                        

                 </tbody>
                </table> <br />
              </form>
          </div>
        </div>
      </div>      
  <?php 
  break;
}
?>
