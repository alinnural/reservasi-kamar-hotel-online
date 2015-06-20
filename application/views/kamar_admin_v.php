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
                    <h1 class="page-header">Kamar</h1>
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
                                <h3 class="panel-title">Kamar</h3>
                            </div>
                            <div class="pull-right">
                                <button class="btn btn-primary btn-sm add" title="Tambah" data-toggle="modal" data-target="#modal_kamar">
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
                                        <th>Nomor</th>
                                        <th>Tipe</th>
                                        <th>Nama Hotel</th>
                                        
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
                                        $query = $this->kamar_m->view_kamar();
                                        
                                        foreach($query->result() as $row) :
                                    ?>
                                    
                                    <tr>
                                        <td>
                                            <?PHP echo $row->id_kamar; ?>
                                            <input type="hidden" id="kamar<?PHP echo $row->id_kamar; ?>" value="<?PHP echo $row->id_kamar; ?>">
                                        </td>
                                        <td><?PHP echo $row->type; ?></td>
                                        <td><?PHP echo $row->lokasi; ?></td>
                                        
                                        <?PHP
                                            if($this->session->userdata('jabatan') == "Admin")
                                            {
                                        ?>
                                        
                                        <td>
                                            <button class="btn btn-warning btn-sm edit" title="Ubah" data-toggle="modal" data-target="#modal_kamar" id="edit_<?PHP echo $row->id_kamar; ?>">
                                                <i class="glyphicon glyphicon-edit"></i> Ubah
                                            </button>
                                            <button class="btn btn-danger btn-sm delete" title="Hapus" data-toggle="modal" data-target="#modal_konfirmasi" id="delete_<?PHP echo $row->id_kamar; ?>">
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
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
        
<div class="modal fade" id="modal_kamar">
	<div class="modal-dialog">
    	<div class="modal-content">
        	<div class="modal-header">
            	<button class="close" data-dismiss="modal">
                	&times;
                </button>
            	<h4 class="modal-title">Form Kamar</h4>
            </div>
            <div class="modal-body">
            	<form method="post" id="form_kamar">
                	<div class="form-group">
                    	<label>Nomor Kamar</label>
                        <input type="text" class="form-control" name="id_kamar" id="id_kamar" placeholder="Nomor Kamar" required>
						<input type="hidden" name="id_kamar_tmp" id="id_kamar_tmp">
                    </div>
                    <div class="form-group">
                    	<label>Tipe</label>
                        <input type="text" class="form-control" name="type" id="type" placeholder="Tipe Kamar" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
            	<button class="btn btn-primary btn-sm" type="submit" form="form_kamar" id="save">
                	Simpan
                </button>
				<button class="btn btn-primary btn-sm" type="submit" form="form_kamar" id="update">
                	Perbaharui
                </button>
            	<button class="btn btn-default btn-sm" data-dismiss="modal">
                	Batal
                </button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal_konfirmasi">
	<div class="modal-dialog">
    	<div class="modal-content">
        	<div class="modal-header">
            	<button class="close" data-dismiss="modal">
                	&times;
                </button>
            	<h4 class="modal-title">Konfirmasi</h4>
            </div>
            <div class="modal-body">
            	<p id="confirm_str">Apakah Anda yakin akan menghapus data ?</p>
            </div>
            <div class="modal-footer">
            	<button class="btn btn-primary btn-sm" id="delete_all">
                	Ok
                </button>
				<button class="btn btn-primary btn-sm" id="delete">
                	Ok
                </button>
            	<button class="btn btn-default btn-sm" data-dismiss="modal">
                	Batal
                </button>
            </div>
        </div>
    </div>
</div>

<?PHP $this->load->view("footer_admin_v.php") ?>

<script type="text/javascript">
	$(document).ready(function() {
		$('.add').click(function() {
			$('#id_kamar').val('');
			$('#type').val('');
			$('#harga').val('');
			
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