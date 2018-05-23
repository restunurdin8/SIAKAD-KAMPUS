<!DOCTYPE html>   
<html>
    <head>
        <!-- Bootstrap -->
        <link rel="stylesheet" media="screen" href="../css/bootstrap.min.css">
        <link rel="stylesheet" media="screen" href="../css/bootstrap-theme.min.css">

        <!-- Bootstrap Admin Theme -->
        <link rel="stylesheet" media="screen" href="../css/bootstrap-admin-theme.css">
        <link rel="stylesheet" media="screen" href="../css/bootstrap-admin-theme-change-size.css">

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

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
           <script type="text/javascript" src="../js/html5shiv.js"></script>
           <script type="text/javascript" src="../js/respond.min.js"></script>
        <![endif]-->

        <script type="text/javascript" src="../js/jquery-2.0.3.min.js"></script>
        <script type="text/javascript" src="../js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../js/twitter-bootstrap-hover-dropdown.min.js"></script>
        <script type="text/javascript" src="../js/bootstrap-admin-theme-change-size.js"></script>

    <?php 
    $query=mysql_query("SELECT * FROM mahasiswa WHERE username='$_SESSION[username]'");
    $r=mysql_fetch_array($query);
    if ($_SESSION['tabel']=='mahasiswa')
       $Nama=$r['Nama'];
    else    
       $Nama=$_SESSION['nama'];
    
    ?>
    </head>
    <body class="bootstrap-admin-with-small-navbar">
        <!-- small navbar -->
        <nav class="navbar navbar-default navbar-fixed-top bootstrap-admin-navbar-sm" role="navigation">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="collapse navbar-collapse">
                            <ul class="nav navbar-nav navbar-left bootstrap-admin-theme-change-size">
                                <li class="text" style="color:white;">Sistem Informasi Akademik</li>

                            </ul>
                            <ul class="nav navbar-nav navbar-right">
                                <li>
                                    <a href="#" style="color:#edeeee;">Reminders <i class="glyphicon glyphicon-bell" style="color:#edeeee;"></i></a>
                                </li>
                                <li>
                                    <a href="#" style="color:#edeeee;">Settings <i class="glyphicon glyphicon-cog" style="color:#edeeee;"></i></a>
                                </li>
                                <li>
                                    <a href="#" style="color:#edeeee;">Go to frontend <i class="glyphicon glyphicon-share-alt" style="color:#edeeee;"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" role="button" class="dropdown-toggle" data-hover="dropdown" style="color:#edeeee;"> <i class="glyphicon glyphicon-user" style="color:#edeeee;"></i> <?php echo"$Nama"; ?> <i class="caret"></i></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Action</a></li>
                                        <li><a href="#">Another action</a></li>
                                        <li><a href="#">Something else here</a></li>
                                        <li role="presentation" class="divider"></li>
                                        <li><a href="logout.php">Logout</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <!-- main / large navbar -->
        <nav class="navbar navbar-default navbar-fixed-top bootstrap-admin-navbar bootstrap-admin-navbar-under-small" role="navigation">
		<div class="container-fluid" >
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="https://www.facebook.com/sofiyanyanyan">Stai Sebelaspril Sumedang</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<?php
          $level= $_SESSION['id_level'];

					$menuid = mysql_query("SELECT a.ID_ds,b.id_group,d.modul
                                  FROM hakmodul a JOIN dropdownsystem b JOIN groupmodul c LEFT JOIN
                                  (SELECT b.ID_ds,b.url,b.nama AS submodul,c.id_group,c.nama AS modul 
                                  FROM hakmodul a , dropdownsystem b , groupmodul c 
                                  WHERE a.ID_ds=b.ID_ds AND a.id_level='$level' AND b.id_group=c.id_group 
                                  GROUP BY c.id_group
                                  ORDER BY b.menu_order) AS d on d.ID_ds=a.ID_ds
                                  WHERE a.ID_ds=b.ID_ds AND a.id_level='$level' AND b.id_group=c.id_group order by c.relasi_modul");
					while($dataMenu = mysql_fetch_assoc($menuid)){
						$id_group = $dataMenu['id_group'];
						$ID_ds = $dataMenu['ID_ds'];

						$submenu = mysql_query("SELECT b.ID_ds,b.id_group,b.url,b.nama AS submodul 
                                    FROM hakmodul a JOIN dropdownsystem b JOIN groupmodul c
                                    WHERE a.ID_ds=b.ID_ds AND a.id_level='$level' AND b.id_group=c.id_group AND b.id_group='$id_group'                                    
                                    ORDER BY b.menu_order");
             if ($dataMenu['modul']!=NULL){
							echo '
							<li class="dropdown">
								<a href="" class="dropdown-toggle" data-toggle="dropdown">'.$dataMenu['modul'].' <b class="caret"></b></a>
								<ul class="dropdown-menu">';
								while($dataSubmenu = mysql_fetch_assoc($submenu)){
									echo '<li><a href="'.$dataSubmenu['url'].'">'.$dataSubmenu['submodul'].'</a></li>';
								}
							echo '
								</ul>
							</li>
							';				
            }
          } 
					?>

				</ul>
			</div>
		</div>       
        </nav>  