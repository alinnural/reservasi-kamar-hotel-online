<?PHP
	$this->load->view('header_v');
?>

<div class="container wadah">
	<div class="panel panel-default">
    	<div class="panel-heading">
        	<div class="pull-left">
            	<h3 class="panel-title">Kamar Tersedia</h3>
            </div>
            <div class="pull-right">
                <div class="row-fluid">
                  <div class="span4 offset2">
                    <form class="form-search"  method="post" role="form" action="<?PHP echo site_url(); ?>kamar" id="form_cari">
                      <div class="input-append">
                        <input type="date" class="span2 search-query" name="tgl_check_in" placeholder="Cari" id="tgl_check_in" required>
                        -
                        <input type="date" class="span2 search-query" name="tgl_check_out" placeholder="Cari" id="tgl_check_out" required>
                        <button type="submit" class="btn btn-primary btn-sm" form="form_cari">
                        	<i class="glyphicon glyphicon-search"></i>Search
                        </button>
                      </div>
                    </form>
                  </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <?PHP
			if($this->input->post('tgl_check_in') != '' and $this->input->post('tgl_check_out') != '')
			{
		?>
                <div class="panel-body">
                <form method="post" action="<?PHP echo site_url(); ?>kamar/booking">
                <table class="table table-responsive">
                    <thead>
                        <tr class="success">
                            <th>Nomor Kamar</th>
                            <th>Tipe Kamar</th>
                            <th>Harga</th>
                            <th>Lokasi</th>
                            <th><center>Pilih Kamar</center></th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <?PHP
//							$this->kamar_m->set_tgl_check_in('2014-12-17');
                            $query = $this->kamar_m->view_tersedia($this->input->post('tgl_check_in'),$this->input->post('tgl_check_out'));
                            $i = 0;
                            foreach($query->result() as $row) :
                            $i++;
                        ?>
                        
                        <tr>
                            <td><?PHP echo $row->id_kamar; ?></td>
                            <td><?PHP echo $row->type; ?></td>
                            <td>
								<?PHP echo $row->harga; ?>
                                <input type="hidden" name="harga_<?PHP echo $row->id_typekamar; ?>" id="harga_<?PHP echo $row->id_typekamar; ?>" value="<?PHP echo $row->harga; ?>">
                            </td>	
                            <td><?PHP echo $row->lokasi; ?></td>
                            <td><center><input type="checkbox" name="chk_<?PHP echo $row->id_kamar; ?>" /><?PHP echo "type".$i; ?></center></td>
                        </tr>
                        
                        <?PHP
                            endforeach;
                        ?>
                    </tbody>
                </table>
                <button class="btn btn-danger btn-sm book" title="Pesan" type="submit" >
                    <i class="glyphicon glyphicon-plus"></i> Submit
                </button>
                <input type="hidden" name="tgl_checkin" value="<?PHP echo $this->input->post('tgl_check_in'); ?>" />
                <input type="hidden" name="tgl_checkout" value="<?PHP echo $this->input->post('tgl_check_out'); ?>" />
                </form>
                </div>
    	
    </div>
    <div class="col-md-9"></div>
    <div class="col-md-2"></div>
		<?PHP
			}
		elseif($this->input->post('tgl_check_in') == '' and $this->input->post('tgl_check_out') == '')
			{
		?>
        <br /><br /><h4><strong><p class="text-info text-center">Pilih Tanggal Check In</p></strong></h4><br /><br />
        <?PHP
			}
		?>
</div>

<?PHP
	$this->load->view('footer_v');
?>

<script type="text/javascript">
	$(document).ready(function() {
		
		
		$(document).ready(function() {
			$('.table').dataTable();
		});
	});
</script>