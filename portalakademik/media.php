<?php 
	error_reporting(0);
  session_start();
  include_once '../config/koneksi.php';

if (empty($_SESSION['username']) AND empty($_SESSION['password'])){
  echo "<script>alert('Anda telah keluar dari halaman administrator'); window.location = '../'</script>";
}else{
?> 
<!DOCTYPE html>   
<html>
    <head>
        <title>Sistem Infromasi Akademik</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Bootstrap -->
        <link rel="stylesheet" media="screen" href="../css/bootstrap.min.css">
        <link rel="stylesheet" media="screen" href="../css/bootstrap-theme.min.css">

        <!-- Bootstrap Admin Theme -->
        <link rel="stylesheet" media="screen" href="../css/bootstrap-admin-theme.css">
        <link rel="stylesheet" media="screen" href="../css/bootstrap-admin-theme-change-size.css">

        <script type="text/javascript" src="../js/twitter-bootstrap-hover-dropdown.min.js"></script>
        <script type="text/javascript" src="../js/bootstrap-admin-theme-change-size.js"></script>
        <script type="text/javascript" src="../vendors/datatables/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="../js/DT_bootstrap.js"></script>

        <!-- Vendors -->
        <link rel="stylesheet" media="screen" href="../vendors/bootstrap-datepicker/css/datepicker.css">
        <link rel="stylesheet" media="screen" href="../css/datepicker.fixes.css">
        <link rel="stylesheet" media="screen" href="../vendors/uniform/themes/default/css/uniform.default.min.css">
        <link rel="stylesheet" media="screen" href="../css/uniform.default.fixes.css">
        <link rel="stylesheet" media="screen" href="../vendors/chosen.min.css">
        <link rel="stylesheet" media="screen" href="../vendors/selectize/dist/css/selectize.bootstrap3.css">
        <link rel="stylesheet" media="screen" href="../vendors/bootstrap-wysihtml5-rails-b3/vendor/assets/stylesheets/bootstrap-wysihtml5/core-b3.css">
        <link rel="stylesheet" media="screen" href="../vendors/easypiechart/jquery.easy-pie-chart.css">
        <link rel="stylesheet" media="screen" href="../vendors/easypiechart/jquery.easy-pie-chart_custom.css">
        <!-- Datatables -->
        <link rel="stylesheet" media="screen" href="../css/DT_bootstrap.css">
        
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
           <script type="text/javascript" src="../js/html5shiv.js"></script>
           <script type="text/javascript" src="../js/respond.min.js"></script>
        <![endif]-->

        <!-- Tabs -->
        <link rel="stylesheet" media="screen" href="../css/tabs.css">
        <script type="text/javascript" src="../js/tabs.js"></script>
        <!-- Custom styles -->


        <style type="text/css">
            @font-face {
                font-family: Ubuntu;
                src: url('../fonts/Ubuntu-Regular.ttf');
            }
            .bs-docs-masthead{
                background-color: #6f5499;
                background-image: linear-gradient(to bottom, #563d7c 0px, #6f5499 100%);
                background-repeat: repeat-x;
            }
            .bs-docs-masthead{
                padding: 0;
            }
            .bs-docs-masthead h1{
                color: #fff;
                font-size: 40px;
                margin: 0;
                padding: 34px 0;
                text-align: center;
            }
            .bs-docs-masthead a:hover{
                text-decoration: none;
            }
            .meritoo-logo a{
                background-color: #fff;
                border: 1px solid rgba(66, 139, 202, 0.4);
                display: block;
                font-family: Ubuntu;
                padding: 22px 0;
                text-align: center;
            }
            .meritoo-logo a,
            .meritoo-logo a:hover,
            .meritoo-logo a:focus{
                text-decoration: none;
            }
            .meritoo-logo a img{
                display: block;
                margin: 0 auto;
            }
            .meritoo-logo a span{
                color: #4e4b4b;
                font-size: 18px;
            }
            .row-urls{
                margin-top: 4px;
            }
            .row-urls .col-md-6{
                text-align: center;
            }
            .row-urls .col-md-6 a{
                font-size: 14px;
            }
        </style>

    </head>
<?php    
    $query=mysql_query("SELECT * FROM $_SESSION[tabel] WHERE username='$_SESSION[username]'");
    $r=mysql_fetch_array($query);
    if ($_SESSION['tabel']=='mahasiswa'){
       $Nama=$r['Nama'];
       $Ket=$r['Jurusan_ID'];
       $PA=$r['PenasehatAkademik'];
        $foto=$r['foto'];
    }else{
       $Nama=$r['nama_lengkap'];
       $Ket=$r['keterangan'];
       $PA=$r['telepon'];
      $foto=$r['foto'];
    }
    include_once 'atas.php'; 
?>  
 
        <div class="container">
            <!-- left, vertical navbar & content -->
            <div class="row">
                <!-- left, vertical navbar -->
                <div class="col-md-2 bootstrap-admin-col-left">
                    <ul class="nav navbar-collapse collapse bootstrap-admin-navbar-side">
                        <li class="active">
                            <a href=""> About</a>
                        </li>
                        <li>
                            <a ><?php echo"$Nama"; ?></a>
                        </li>

                        <li>
                            <a href=""><?php echo"<img alt='empty' src='foto_$_SESSION[tabel]/$foto' width=165 height=155/>"; ?></a>
                        </li>
                        <li>
                            <a h""><?php echo"$Ket"; ?></a>
                        </li>
                        <li>
                            <a h""><?php echo"$PA"; ?></a>
                        </li>
                        <li>
                            <a h""><?php echo"$r[email]"; ?></a>
                        </li>
                    </ul>
                </div>

<?php include_once 'content.php'; ?>

            </div>
 
        </div>

        <!-- footer -->
        <div class="navbar navbar-footer" style="background-color:black; width:100%;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <footer role="contentinfo">
                           <p class="left" style="color:white;"><a href="https://www.facebook.com/sofiyanyanyan" target ="_blank">Developed By Yanyan Sofiyan,M.Kom.</p>
                        </footer>
                    </div>
                </div>
            </div>
        </div>


    </body>
</html> 
        <script type="text/javascript" src="../js/jquery-2.0.3.min.js"></script>
        <script type="text/javascript" src="../js/twitter-bootstrap-hover-dropdown.min.js"></script>
        <script type="text/javascript" src="../js/bootstrap-admin-theme-change-size.js"></script>
        <script type="text/javascript" src="../vendors/uniform/jquery.uniform.min.js"></script>
        <script type="text/javascript" src="../vendors/chosen.jquery.min.js"></script>
        <script type="text/javascript" src="../vendors/selectize/dist/js/standalone/selectize.min.js"></script>
        <script type="text/javascript" src="../vendors/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
        <script type="text/javascript" src="../vendors/bootstrap-wysihtml5-rails-b3/vendor/assets/javascripts/bootstrap-wysihtml5/wysihtml5.js"></script>
        <script type="text/javascript" src="../vendors/bootstrap-wysihtml5-rails-b3/vendor/assets/javascripts/bootstrap-wysihtml5/core-b3.js"></script>
        <script type="text/javascript" src="../vendors/twitter-bootstrap-wizard/jquery.bootstrap.wizard-for.bootstrap3.js"></script>
        <script type="text/javascript" src="../vendors/boostrap3-typeahead/bootstrap3-typeahead.min.js"></script>




        <script type="text/javascript" src="../vendors/datatables/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="../js/DT_bootstrap.js"></script>

        <script type="text/javascript" src="../vendors/easypiechart/jquery.easy-pie-chart.js"></script>

        <script type="text/javascript">
            $(function() {
                // Easy pie charts
                $('.easyPieChart').easyPieChart({animate: 1000});
            });
        </script>
        <script type="text/javascript">
            $(function() {
                $('.datepicker').datepicker();
                $('.uniform_on').uniform();
                $('.chzn-select').chosen();
                $('.selectize-select').selectize();
                $('.textarea-wysihtml5').wysihtml5({
                    stylesheets: [
                        'vendors/bootstrap-wysihtml5-rails-b3/vendor/assets/stylesheets/bootstrap-wysihtml5/wysiwyg-color.css'
                    ]
                });

                $('#rootwizard').bootstrapWizard({
                    'nextSelector': '.next',
                    'previousSelector': '.previous',
                    onNext: function(tab, navigation, index) {
                        var $total = navigation.find('li').length;
                        var $current = index + 1;
                        var $percent = ($current / $total) * 100;
                        $('#rootwizard').find('.progress-bar').css('width', $percent + '%');
                        // If it's the last tab then hide the last button and show the finish instead
                        if ($current >= $total) {
                            $('#rootwizard').find('.pager .next').hide();
                            $('#rootwizard').find('.pager .finish').show();
                            $('#rootwizard').find('.pager .finish').removeClass('disabled');
                        } else {
                            $('#rootwizard').find('.pager .next').show();
                            $('#rootwizard').find('.pager .finish').hide();
                        }
                    },
                    onPrevious: function(tab, navigation, index) {
                        var $total = navigation.find('li').length;
                        var $current = index + 1;
                        var $percent = ($current / $total) * 100;
                        $('#rootwizard').find('.progress-bar').css('width', $percent + '%');
                        // If it's the last tab then hide the last button and show the finish instead
                        if ($current >= $total) {
                            $('#rootwizard').find('.pager .next').hide();
                            $('#rootwizard').find('.pager .finish').show();
                            $('#rootwizard').find('.pager .finish').removeClass('disabled');
                        } else {
                            $('#rootwizard').find('.pager .next').show();
                            $('#rootwizard').find('.pager .finish').hide();
                        }
                    },
                    onTabShow: function(tab, navigation, index) {
                        var $total = navigation.find('li').length;
                        var $current = index + 1;
                        var $percent = ($current / $total) * 100;
                        $('#rootwizard').find('.bar').css({width: $percent + '%'});
                    }
                });
                $('#rootwizard .finish').click(function() {
                    alert('Finished!, Starting over!');
                    $('#rootwizard').find('a[href*=\'tab1\']').trigger('click');
                });
            });
        </script>  
<?php } ?>
