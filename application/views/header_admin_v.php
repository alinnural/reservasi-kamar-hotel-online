<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Ulin Hotel</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?PHP echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?PHP echo base_url(); ?>assets/css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">

	<!-- Table Responsive -->
    <link href="<?PHP echo base_url(); ?>assets/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">

    <!-- Custom CSS -->
    <link href="<?PHP echo base_url(); ?>assets/css/sipkh.css" rel="stylesheet">
    
    <!-- Morris Charts CSS -->
    <link href="<?PHP echo base_url(); ?>assets/css/plugins/morris.css" rel="stylesheet">
    
     <!-- Timeline CSS -->
    <link href="<?PHP echo base_url(); ?>assets/css/plugins/timeline.css" rel="stylesheet">


    <!-- Custom Fonts -->
    <link href="<?PHP echo base_url(); ?>assets/font-awesome-4.2.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?PHP echo site_url(); ?>"><img src="<?PHP echo base_url(); ?>assets/img/logos/ulinhotel-small.png"></a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        
                        <li class="divider"></li>
                        <li><a href="<?PHP echo site_url(); ?>beranda/logout"><i class="fa fa-sign-out fa-fw"></i> Keluar</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Cari...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a <?PHP if($this->uri->segment(1)=='') echo ' class="active"';?> href="<?PHP echo site_url(); ?>"><i class="fa fa-dashboard fa-fw"></i> Beranda</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-calculator fa-fw"></i> Transaksi<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a <?PHP if($this->uri->segment(1)=='konfirmasi') echo ' class="active"';?> href="<?PHP echo site_url(); ?>konfirmasi">Konfirmasi</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a <?PHP if($this->uri->segment(1)=='kamar') echo ' class="active"';?> href="#"><i class="fa fa-key fa-fw"></i> Kamar<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?PHP echo site_url(); ?>kamar">Kamar</a>
                                </li>
                                <li>
                                    <a href="<?PHP echo site_url(); ?>kamar/type_kamar">Tipe Kamar</a>
                                </li>
                                <li>
                                    <a href="<?PHP echo site_url(); ?>kamar/lokasi">Lokasi</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a <?PHP if($this->uri->segment(1)=='pegawai') echo ' class="active"';?> href="<?PHP echo site_url(); ?>pegawai"><i class="fa fa-users fa-fw"></i> Pegawai</a>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-book fa-fw"></i> Laporan<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a <?PHP if($this->uri->segment(1)=='laporan_harian') echo ' class="active"';?> href="<?PHP echo site_url();?>kamar/excel">Excel</a>
                                </li>
                                <li>
                                    <a <?PHP if($this->uri->segment(1)=='laporan_mingguan') echo ' class="active"';?> href="<?PHP echo site_url();?>kamar/pdf">PDF</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
