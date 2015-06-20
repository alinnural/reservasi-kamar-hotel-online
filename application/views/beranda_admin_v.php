<?PHP $this->load->view("header_admin_v.php") ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Beranda</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Grafik Peminjaman Kamar
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        	<div id="chartContainer"></div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-8 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

<?PHP $this->load->view("footer_admin_v.php") ?>

<script src="<?PHP echo base_url(); ?>assets/js/plugins/fusioncharts/fusioncharts.js"></script>

<script src="<?PHP echo base_url(); ?>assets/js/plugins/fusioncharts/themes/fusioncharts.theme.zune.js"></script>

<script type="text/javascript">
	FusionCharts.ready(function(){
		var chart = new FusionCharts({
			//type: 'column2d', 
			type: 'column3d',
			//type: 'bar2d',
			//type: 'bar3d',
			//type: 'pie2d',
			//type: 'pie3d',
			//type: 'doughnut2d',
			//type: 'doughnut3d',
			//type: 'line',
			renderAt: 'chartContainer',
			width: '100%',
			height: '400',
			//dataFormat: 'xml',
			dataFormat:'json',
			dataSource: {
				'chart':{
					'caption': 'Grafik Tipe Kamar',
					'subCaption': 'Berdasarkan Banyaknya dipinjam',
					'xAxisName': 'Tipe Kamar', //koordinat x
					'yAxisName': 'Pengunjung', //koordinat y
					'theme':'zune'
				},
				'data':[
					
					{ 'label':'Deluxe', 'value':'1' },
					{ 'label':'Suite', 'value':'1' },
					{ 'label':'Superior', 'value':'0' },
					{ 'label':'Super Deluxe', 'value':'0' }
					
				]
			}
		});
		
		chart.render('chartContainer');
	});
</script>