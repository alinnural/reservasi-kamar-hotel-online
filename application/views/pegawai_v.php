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
                    <h1 class="page-header">Karyawan</h1>
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
                                <h3 class="panel-title">Pegawai</h3>
                            </div>
                            <div class="pull-right">
                                <button class="btn btn-primary btn-sm add" title="Tambah" data-toggle="modal" data-target="#modal_peg">
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
                                        <th>ID Peg</th>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>No HP</th>
                                        <th>Email</th>
                                        <th>Jabatan</th>
                                        <th>Username</th>
                                        
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
                                        $query = $this->pegawai_m->view_by_id_peg();
                                        
                                        foreach($query->result() as $row) :
                                    ?>
                                    
                                    <tr>
                                        <td>
                                            <?PHP echo $row->id_peg; ?>
                                            <input type="hidden" id="peg<?PHP echo $row->id_peg; ?>" value="<?PHP echo $row->id_peg; ?>">
                                        </td>
                                        <td><?PHP echo $row->nama; ?></td>
                                        <input type="hidden" name="nama_<?PHP echo $row->id_peg; ?>" id="nama_<?PHP echo $row->id_peg; ?>" value="<?PHP echo $row->nama; ?>">
                                        <td><?PHP echo $row->alamat; ?></td>
                                        <input type="hidden" name="alamat_<?PHP echo $row->id_peg; ?>" id="alamat_<?PHP echo $row->id_peg; ?>" value="<?PHP echo $row->alamat; ?>">
                                        <td><?PHP echo $row->no_hp; ?></td>
                                        <input type="hidden" name="no_hp_<?PHP echo $row->id_peg; ?>" id="no_hp_<?PHP echo $row->id_peg; ?>" value="<?PHP echo $row->no_hp; ?>">
                                        <td><?PHP echo $row->email; ?></td>
                                        <input type="hidden" name="email_<?PHP echo $row->id_peg; ?>" id="email_<?PHP echo $row->id_peg; ?>" value="<?PHP echo $row->email; ?>">
                                        <td><?PHP echo $row->jabatan; ?></td>
                                        <input type="hidden" name="jabatan_<?PHP echo $row->id_peg; ?>" id="jabatan_<?PHP echo $row->id_peg; ?>" value="<?PHP echo $row->jabatan; ?>">
                                        <td><?PHP echo $row->username; ?></td>
                                        <input type="hidden" name="username_<?PHP echo $row->id_peg; ?>" id="username_<?PHP echo $row->id_peg; ?>" value="<?PHP echo $row->username; ?>">
                                        
                                        <?PHP
                                            if($this->session->userdata('jabatan') == "Admin")
                                            {
                                        ?>
                                        
                                        <td>
                                            <button class="btn btn-warning btn-sm edit" title="Ubah" data-toggle="modal" data-target="#modal_peg" id="edit_<?PHP echo $row->id_peg; ?>">
                                                <i class="glyphicon glyphicon-edit"></i> Ubah
                                            </button>
                                            <button class="btn btn-danger btn-sm delete" title="Hapus" data-toggle="modal" data-target="#modal_konfirmasi" id="delete_<?PHP echo $row->id_peg; ?>">
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
        
<div class="modal fade" id="modal_peg">
	<div class="modal-dialog">
    	<div class="modal-content">
        	<div class="modal-header">
            	<button class="close" data-dismiss="modal">
                	&times;
                </button>
            	<h4 class="modal-title">Form Karyawan</h4>
            </div>
            <div class="modal-body">
            	<form method="post" id="form_peg">
                	<div class="form-group">
                        <input type="hidden" class="form-control" name="id_peg" id="id_peg" placeholder="ID Karyawan" required>
						<input type="hidden" name="id_peg_tmp" id="id_peg_tmp">
                    </div>
                    <div class="form-group">
                    	<label>Nama</label>
                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" required>
                    </div>
                    <div class="form-group">
                    	<label>Alamat</label>
                        <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" required>
                    </div>
                    <div class="form-group">
                    	<label>No HP</label>
                        <input type="text" class="form-control" name="no_hp" id="no_hp" placeholder="No HP" required>
                    </div>
                    <div class="form-group">
                    	<label>Email</label>
                        <input type="text" class="form-control" name="email" id="email" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                    	<label>Jabatan</label>
                        <input type="text" class="form-control" name="jabatan" id="jabatan" placeholder="Jabatan" required>
                    </div>
                    <div class="form-group">
                    	<label>Username</label>
                        <input type="text" class="form-control" name="username" id="username" placeholder="Username" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
            	<button class="btn btn-primary btn-sm" type="submit" form="form_peg" id="save">
                	Simpan
                </button>
				<button class="btn btn-primary btn-sm" type="submit" form="form_peg" id="update">
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
			$('#id_peg').val('');
			$('#nama').val('');
			$('#alamat').val('');
			$('#no_hp').val('');
			$('#email').val('');
			$('#jabatan').val('');
			$('#username').val('');
			
			$('#id_peg').attr('disabled', false);
			
			$('#save').show();
			$('#update').hide();
			
			$('#form_peg').attr('action', '<?PHP echo site_url(); ?>pegawai/insert');
		});
		
		$('.edit').click(function() {
			var id = this.id.substr(5);
			
			$('#id_peg').val(id);
			$('#id_peg_tmp').val(id);
			$('#nama').val($('#nama_' + id).val());
			$('#alamat').val($('#alamat_' + id).val());
			$('#no_hp').val($('#no_hp_' + id).val());
			$('#email').val($('#email_' + id).val());
			$('#jabatan').val($('#jabatan_' + id).val());
			$('#username').val($('#username_' + id).val());
			
			$('#id_peg').attr('disabled', true);
			
			$('#save').hide();
			$('#update').show();
			
			$('#form_peg').attr('action', '<?PHP echo site_url(); ?>pegawai/update');
		});
		
		$('.delete').click(function() {
			$('#confirm_str').html('Apakah Anda yakin akan menghapus data ?');
			
			$('#delete').show();
			$('#delete_all').hide();
			
			var id = this.id.substr(7);
			
			$('#id_peg').val(id);
		});
		
		$('.delete_all').click(function() {
			$('#confirm_str').html('Apakah Anda yakin akan menghapus semua data ?');
			
			$('#delete').hide();
			$('#delete_all').show();
		});
		
		$('#delete').click(function() {
			window.location = '<?PHP echo site_url(); ?>pegawai/delete/' + $('#id_peg').val();
		});
		
		$('#delete_all').click(function() {
			window.location = '<?PHP echo site_url(); ?>pegawai/delete_all';
		});
		
		$('.excel').click(function() {
            window.location = '<?PHP echo site_url();?>pegawai/excel';
        });
		
		$('.pdf').click(function() {
            window.location = '<?PHP echo site_url();?>pegawai/pdf';
        });
		
		$('.chart').click(function() {
            window.location = '<?PHP echo site_url();?>pegawai/chart';
        });
		
		$('.table').dataTable();
	});
</script>