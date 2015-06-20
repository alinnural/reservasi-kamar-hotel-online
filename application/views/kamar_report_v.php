<?PHP
	
?>
<h1>Daftar Kamar</h1>
<table class="table table-responsive">
                    <thead>
                        <tr class="success">
                            <th>Nomor Kamar</th>
                            <th>Tipe Kamar</th>
                            <th>Harga</th>
                            <th>Lokasi</th>
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
                            </td>	
                            <td><?PHP echo $row->lokasi; ?></td>
                        </tr>
                        
                        <?PHP
                            endforeach;
                        ?>
                    </tbody>
                </table>