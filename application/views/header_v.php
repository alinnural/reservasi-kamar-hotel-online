<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
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
    
    <!-- Table Responsive -->
    <link href="<?PHP echo base_url(); ?>assets/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">

    <!-- Custom CSS -->
    <link href="<?PHP echo base_url(); ?>assets/css/ulin.css" rel="stylesheet">
    
     <!-- Morris Charts CSS -->
    <link href="<?PHP echo base_url(); ?>assets/css/plugins/morris.css" rel="stylesheet">
    
     <!-- Timeline CSS -->
    <link href="<?PHP echo base_url(); ?>assets/css/plugins/timeline.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?PHP echo base_url(); ?>assets/font-awesome-4.2.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!--<link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>-->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" class="index">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top navbar-shrink">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll " href="<?PHP echo site_url(); ?>beranda"><img src="<?PHP echo base_url(); ?>assets/img/logos/ulinhotel-small.png" alt=""></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <!--<li>
                        <a class="" href="#lokasi">Lokasi</a>
                    </li>
                    <li>
                        <a class="" href="<?PHP echo site_url(); ?>type">Tipe Kamar</a>
                    </li>-->
                    <li<?PHP if($this->uri->segment(1) == 'tentang') echo ' class="active"'; ?>>
                        <a href="<?PHP echo site_url(); ?>tentang">
                            Tentang
                       	</a>
                    </li>
                    <li<?PHP if($this->uri->segment(1) == 'kamar') echo ' class="active"'; ?>>
                        <a href="<?PHP echo site_url(); ?>kamar">
                            Reservasi
                       	</a>
                    </li>
                    <li>
                        <a class="login" href="#" data-toggle="modal" data-target="#modal_login">Login</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

<!-- modal -->
<div class="modal fade" id="modal_reservasi">
	<div class="modal-dialog">
    	<div class="modal-content">
        	<div class="modal-header">
            	<button class="close" data-dismiss="modal">
                	&times;
                </button>
            	<h4 class="modal-title">Reservasi</h4>
            </div>
            <div class="modal-body">
            	<form method="post" id="form_reservasi">
                	<div class="form-group">
                    	<label>Lokasi</label>
                        <select class="form-control" name="daftar_lokasi" id="daftar_lokasi">
							
							<?PHP
								$query = $this->lokasi_m->view();
								
								foreach($query->result() as $row) :
							?>
							
							<option value="<?PHP echo $row->id_lokasi ?>"><?PHP echo $row->lokasi; ?></option>
							
							<?PHP
								endforeach;
							?>
							
						</select>
                    </div>
                	<div class="form-group">
                    	<label>Check In</label>
                        <input type="date" class="form-control" name="tgl_check_in" id="tgl_check_in" placeholder="Tanggal Check In" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
            	<button class="btn btn-primary btn-sm" type="submit" form="form_reservasi">
                	Cek Ketersediaan
                </button>
            	<button class="btn btn-default btn-sm" data-dismiss="modal">
                	Batal
                </button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_login">
	<div class="modal-dialog">
    	<div class="modal-content">
        	<div class="modal-header">
            	<button class="close" data-dismiss="modal">
                	&times;
                </button>
            	<h4 class="modal-title">Login</h4>
            </div>
            <div class="modal-body">
                <form method="post" id="form_login" action="<?PHP echo site_url(); ?>beranda/login">
                    <div class="form-group">
                        <label for="username" class="visible-lg visible-md">Username</label>
                        <input type="text" class="form-control" name="username" id="username" placeholder="Username" required>
                    </div>
                    <div class="form-group">
                        <label for="password" class="visible-lg visible-md">Password</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
            	<button type="submit" form="form_login" class="btn btn-primary btn-block">
            		<i class="glyphicon glyphicon-log-in"></i> Login
           		</button>
            </div>
        </div>
    </div>
</div>
<!-- /modal-->

<script type="text/javascript">
	$(document).ready(function(e) {
		$('.carousel').carousel();
	
		$('.login').click(function() {
			$('#username').val('');
			$('#password').val('');	
		});
	});
</script>
