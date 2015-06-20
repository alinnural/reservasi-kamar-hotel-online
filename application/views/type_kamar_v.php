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
                    <h1 class="page-header">Tipe Kamar</h1>
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
                                <h3 class="panel-title">Tipe Kamar</h3>
                            </div>
                            <div class="pull-right">
                                <button class="btn btn-primary btn-sm add" title="Tambah" data-toggle="modal" data-target="#modal_typekamar">
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
                                        <th>Tipe</th>
                                        <th>Harga</th>
                                        
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
                                        $query = $this->kamar_m->view_typekamar();
                                        
                                        foreach($query->result() as $row) :
                                    ?>
                                    
                                    <tr>
                                        <td>
                                            <?PHP echo $row->id_typekamar; ?>
                                            <input type="hidden" name="id_typekamar_<?PHP echo $row->id_typekamar; ?>" id="id_typekamar_<?PHP echo $row->id_typekamar; ?>" value="<?PHP echo $row->id_typekamar; ?>">
                                        </td>
                                        <td>
											<?PHP echo $row->type; ?>
                                        	<input type="hidden" name="type_<?PHP echo $row->id_typekamar; ?>" id="type_<?PHP echo $row->id_typekamar; ?>" value="<?PHP echo $row->type; ?>">
                                        </td>
                                        <td>
											<?PHP echo $row->harga; ?>
                                            <input type="hidden" name="harga_<?PHP echo $row->id_typekamar; ?>" id="harga_<?PHP echo $row->id_typekamar; ?>" value="<?PHP echo $row->harga; ?>">
                                        </td>
                                        
                                        <?PHP
                                            if($this->session->userdata('jabatan') == "Admin")
                                            {
                                        ?>
                                        
                                        <td>
                                            <button class="btn btn-warning btn-sm edit" title="Ubah" data-toggle="modal" data-target="#modal_typekamar" id="edit_<?PHP echo $row->id_typekamar; ?>">
                                                <i class="glyphicon glyphicon-edit"></i> Ubah
                                            </button>
                                            <button class="btn btn-danger btn-sm delete" title="Hapus" data-toggle="modal" data-target="#modal_konfirmasi" id="delete_<?PHP echo $row->id_typekamar; ?>">
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

<div class="modal fade" id="modal_typekamar">
	<div class="modal-dialog">
    	<div class="modal-content">
        	<div class="modal-header">
            	<button class="close" data-dismiss="modal">
                	&times;
                </button>
            	<h4 class="modal-title">Form Type Kamar</h4>
            </div>
            <div class="modal-body">
            	<form method="post" id="form_typekamar">
                	<div class="form-group">
                        <input type="hidden" class="form-control" name="id_typekamar" id="id_typekamar" placeholder="Id Type Kamar" required>
						<input type="hidden" name="id_typekamar_tmp" id="id_typekamar_tmp">
                    </div>
                    <div class="form-group">
                    	<label>Tipe</label>
                        <input type="text" class="form-control" name="type" id="type" placeholder="Tipe Kamar" required>
                    </div>
                    <div class="form-group">
                    	<label>Harga</label>
                        <input type="text" class="form-control" name="harga" id="harga" placeholder="Harga Kamar" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
            	<button class="btn btn-primary btn-sm" type="submit" form="form_typekamar" id="save">
                	Simpan
                </button>
				<button class="btn btn-primary btn-sm" type="submit" form="form_typekamar" id="update">
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
			$('#id_typekamar').val('');
			$('#type').val('');
			$('#harga').val('');
			
			$('#id_typekamar').attr('disabled', false);
			
			$('#save').show();
			$('#update').hide();
			
			$('#form_typekamar').attr('action', '<?PHP echo site_url(); ?>kamar/insert_typekamar');
		});
		
		$('.edit').click(function() {
			var id = this.id.substr(5);
			
			$('#id_typekamar').val(id);
			$('#id_typekamar_tmp').val(id);
			$('#type').val($('#type_' + id).val());
			$('#harga').val($('#harga_' + id).val());
			
			$('#id_typekamar').attr('disabled', true);
			
			$('#save').hide();
			$('#update').show();
			
			$('#form_typekamar').attr('action', '<?PHP echo site_url(); ?>kamar/update_typekamar');
		});
		
		$('.delete').click(function() {
			$('#confirm_str').html('Apakah Anda yakin akan menghapus data ?');
			
			$('#delete').show();
			$('#delete_all').hide();
			
			var id = this.id.substr(7);
			
			$('#id_typekamar').val(id);
		});
		
		$('.delete_all').click(function() {
			$('#confirm_str').html('Apakah Anda yakin akan menghapus semua data ?');
			
			$('#delete').hide();
			$('#delete_all').show();
		});
		
		$('#delete').click(function() {
			window.location = '<?PHP echo site_url(); ?>kamar/delete_typekamar/' + $('#id_typekamar').val();
		});
		
		$('#delete_all').click(function() {
			window.location = '<?PHP echo site_url(); ?>kamar/delete_all_typekamar';
		});
		
		$('.excel').click(function() {
            window.location = '<?PHP echo site_url();?>kamar/excel';
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