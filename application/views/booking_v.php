<?PHP
	$this->load->view('header_v');
?>
	<div class="container wadah">
    	<div class="row">
        	<div class="col-lg-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Data Kamar
                    </div>
                    <div class="panel-body">
                    <form class="" role="form" action="<?PHP echo site_url(); ?>kamar/insert_booking">
                    	<table class="table table-responsive">
                    		<thead>
                                <tr class="success">
                                    <th>Nomor Kamar</th>
                                    <th>Tanggal Check-In</th>
                                    <th>Tanggal Check-Out</th>
                                    <th>Harga</th>
                                </tr>
                    		</thead>
                    		<tbody>
								<?PHP
        //							$this->kamar_m->set_tgl_check_in('2014-12-17');
                                    $query = $this->kamar_m->view_tersedia($this->input->post('tgl_check_in'),$this->input->post('tgl_check_out'));									$total_harga = 0;
                                    foreach($query->result() as $row) :
                                ?>
                                
                                <tr>
                                	<?PHP 
											if($this->input->post('chk_'.$row->id_kamar) == 'on')
											{
									?>
                                    <td>
										<?PHP 
                                            	echo $row->id_kamar."<br>";
											}
											if($this->input->post('chk_'.$row->id_kamar) == 'on')
											{
										?>
                                    </td>
                                    <td>
										<?PHP 
												echo $this->input->post('tgl_checkin'); 
											}
											if($this->input->post('chk_'.$row->id_kamar) == 'on')
											{
										?> 
                                    </td>
                                    <td>
										<?PHP 
												echo $this->input->post('tgl_checkout'); 
											}
											if($this->input->post('chk_'.$row->id_kamar) == 'on')
											{
										?> 
                                        <input type="hidden" name="id_<?PHP echo $row->id_kamar; ?>" id="id_<?PHP echo $row->id_kamar; ?>" value="<?PHP echo $row->id_kamar; ?>">
                                    </td>
                                    <td>
										<?PHP 
												echo $this->input->post('harga_'.$row->id_typekamar); 
												$total_harga = $total_harga + $this->input->post('harga_'.$row->id_typekamar);
											}
										?> 
                                        	<input type="hidden" name="totalharga" id="totalharga" value="<?PHP echo $total_harga; ?>">
                                    </td>
                                </tr>
                                <?PHP
                                    endforeach;
                                ?>
                                <tr>
                                	<th colspan=3>Jumlah</th>
                                    <td>
                                    	<?PHP
                                    		echo $total_harga;
										?>
                                    </td>
                                </tr>                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
        	<div class="col-lg-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Data Pelanggan
                    </div>
                    <div class="panel-body">
                          <div class="form-group">
                        	<label>Nama </label>
                            <div class="input-group col-lg-6">
                              <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama">
                            </div>
                          </div>
                          <div class="form-group">
                        	<label>Alamat </label>
                            <div class="input-group col-lg-6">
                              <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat">
                            </div>
                          </div>
                          <div class="form-group">
                        	<label> Email </label>
                            <div class="input-group form-inline col-lg-6">
                              <input type="email" class="form-control" name="nama_email" id="nama_email" placeholder="Email">
                            </div>
                          </div>
                          <div class="form-group">
                        	<label>Nomor Handphone </label>
                            <div class="input-group col-lg-6">
                              <input type="text" class="form-control" name="no_hp" id="no_hp" placeholder="Nomor Handphone">
                            </div>
                          </div>
                          <button class="btn btn-danger btn-sm book" title="Pesan" type="submit" >
                            <i class="glyphicon glyphicon-plus"></i> Submit
	                      </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
    </div>

<?PHP
	$this->load->view('footer_v');
?>