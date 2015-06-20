<?PHP $this->load->view("header_admin_v.php") ?>

        <div id="page-wrapper">
        
        <?PHP
			if($this->uri->segment(3) == 'error_save')
			{
		?>
		
		<div class="alert alert-danger alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			Data gagal disimpan
		</div>
		
		<?PHP
			}
		?> 
       
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Hotel</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        	<div class="row">
            	<div class="col-lg-12">
                    <div class="panel panel-default">
                    
                    	<?PHP
							if($this->session->userdata('jabatan') == "Admin")
							{
						?>
                    
                        <div class="panel-heading">
                            <div class="pull-left">
                                <h3 class="panel-title">Hotel</h3>
                            </div>
                            <div class="pull-right">
                                <button class="btn btn-primary btn-sm add" title="Tambah" data-toggle="modal" data-target="#modal_lokasi">
                                    <i class="glyphicon glyphicon-plus"></i> Tambah
                                </button>
                                <button class="btn btn-danger btn-sm delete_all" title="Hapus Semua" data-toggle="modal" data-target="#modal_konfirmasi">
                                    <i class="glyphicon glyphicon-trash"></i> Hapus Semua
                                </button>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <!-- /.panel-heading -->
                        <?PHP
							}
						?>
                        <div class="panel-body">
                        	<table class="table table-responsive">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Lokasi</th>
                                        <th>Alamat</th>
                                        <th>Kode POS</th>
                                        <th>No Fax</th>
                                        <th>No Telepon</th>
                                        
                                        <?PHP
                                            if($this->session->userdata('jabatan') == "Admin")
                                            {
                                        ?>
                                        
                                        <th>Modifikasi</th>
                                        
                                        <?PHP
                                            }
                                        ?>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    <?PHP
                                        $query = $this->kamar_m->view_lokasi();
                                        
                                        foreach($query->result() as $row) :
                                    ?>
                                    
                                    <tr>
                                        <td>
                                            <?PHP echo $row->id_lokasi; ?>
                                            <input type="hidden" id="kamar<?PHP echo $row->id_lokasi; ?>" value="<?PHP echo $row->id_lokasi; ?>">
                                        </td>
                                        <td><?PHP echo $row->lokasi; ?></td>
                                        <td><?PHP echo $row->alamat; ?></td>
                                        <td><?PHP echo $row->kode_pos; ?></td>
                                        <td><?PHP echo $row->no_fax; ?></td>
                                        <td><?PHP echo $row->no_telp; ?></td>
                                        
                                        <?PHP
                                            if($this->session->userdata('jabatan') == "Admin")
                                            {
                                        ?>
                                        
                                        <td>
                                            <button class="btn btn-warning btn-sm edit" title="Ubah" data-toggle="modal" data-target="#modal_lokasi" id="edit_<?PHP echo $row->id_lokasi; ?>">
                                                <i class="glyphicon glyphicon-edit"></i> Ubah
                                            </button>
                                            <button class="btn btn-danger btn-sm delete" title="Hapus" data-toggle="modal" data-target="#modal_konfirmasi" id="delete_<?PHP echo $row->id_lokasi; ?>">
                                                <i class="glyphicon glyphicon-trash"></i> Hapus
                                            </button>
                                        </td>
                                        
                                        <?PHP
                                            }
                                        ?>
                                        
                                    </tr>
                                    
                                    <?PHP
                                        endforeach;
                                    ?>
                                    
                                </tbody>
                            </table>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-8 -->
            </div>
        </div>
        <!-- /#page-wrapper -->

<?PHP $this->load->view("footer_admin_v.php") ?>

<script type="text/javascript">
	$(document).ready(function() {
		$('.add').click(function() {
			$('#id_program_keahlian').val('');
			$('#program_keahlian').val('');
			
			$('#id_program_keahlian').attr('disabled', false);
			
			$('#save').show();
			$('#update').hide();
			
			$('#form_program_keahlian').attr('action', '<?PHP echo site_url(); ?>program_keahlian/insert');
		});
		
		$('.edit').click(function() {
			var id = this.id.substr(5);
			
			$('#id_program_keahlian').val(id);
			$('#id_program_keahlian_tmp').val(id);
			$('#program_keahlian').val($('#program_keahlian_' + id).val());
			
			$('#id_program_keahlian').attr('disabled', true);
			
			$('#save').hide();
			$('#update').show();
			
			$('#form_program_keahlian').attr('action', '<?PHP echo site_url(); ?>program_keahlian/update');
		});
		
		$('.delete').click(function() {
			$('#confirm_str').html('Apakah Anda yakin akan menghapus data ?');
			
			$('#delete').show();
			$('#delete_all').hide();
			
			var id = this.id.substr(7);
			
			$('#id_program_keahlian').val(id);
		});
		
		$('.delete_all').click(function() {
			$('#confirm_str').html('Apakah Anda yakin akan menghapus semua data ?');
			
			$('#delete').hide();
			$('#delete_all').show();
		});
		
		$('#delete').click(function() {
			window.location = '<?PHP echo site_url(); ?>program_keahlian/delete/' + $('#id_program_keahlian').val();
		});
		
		$('#delete_all').click(function() {
			window.location = '<?PHP echo site_url(); ?>program_keahlian/delete_all';
		});
		
		$('.excel').click(function() {
            window.location = '<?PHP echo site_url();?>program_keahlian/excel';
        });
		
		$('.pdf').click(function() {
            window.location = '<?PHP echo site_url();?>program_keahlian/pdf';
        });
		
		$('.chart').click(function() {
            window.location = '<?PHP echo site_url();?>program_keahlian/chart';
        });
		
		$('.table').dataTable();
	});
</script>