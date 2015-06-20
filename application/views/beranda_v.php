<?PHP
	$this->load->view('header_v');
?>
    <!-- Header -->
    <header>
            <!-- header asli
            	<div class="intro-text">
                <div class="intro-lead-in">Aplikasi Manajemen Human Resource?</div>
                <div class="intro-heading">Carina</div>
                <a href="#services" class="page-scroll btn btn-xl">Coba</a>
                <a href="#services" class="page-scroll btn btn-xl">Unduh</a>
            </div>
            -->
            <!-- header slider -->
            <div class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="item active">
                        <img src="<?PHP echo base_url(); ?>assets/img/slider/banner1.jpg">
                        <div class="carousel-caption">
                            <h3>Tipe Kamar Deluxe</h3>
                            <h5>Ulin Bekasi</h5>
                        </div>
                    </div>
                    <div class="item">
                        <img src="<?PHP echo base_url(); ?>assets/img/slider/banner2.jpg">
                        <div class="carousel-caption">
                            <h3>Pemandangan dari Kolam Renang</h3>
                            <h5>Ulin Ciloto</h5>
                        </div>
                    </div>
                    <div class="item">
                        <img src="<?PHP echo base_url(); ?>assets/img/slider/banner3.jpg">
                        <div class="carousel-caption">
                            <h3>Ruang Tunggu Tamu</h3>
                            <h5>Ulin Depok</h5>
                        </div>
                    </div>
                </div>
                <ol class="carousel-indicators">
                    <li data-target=".carousel" data-slide-to="0" 
                        class="active"></li>
                    <li data-target=".carousel" data-slide-to="1"></li>
                    <li data-target=".carousel" data-slide-to="2"></li>
                </ol>
                
                <a class="left carousel-control" href=".carousel" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                </a>
                <a class="right carousel-control" href=".carousel" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                </a>
            </div>
        <!-- /header slider --> 
    </header>
    
 <?PHP
	$this->load->view('footer_v');
?>