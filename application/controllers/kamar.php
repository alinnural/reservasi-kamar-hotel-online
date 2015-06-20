<?PHP
	class Kamar extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			
			//Model
			
			$this->load->model('kamar_m');
			$this->load->model('lokasi_m');
		}
		
		public function index()
		{
			if($this->session->userdata('username') == '')
			{
				$this->load->view('kamar_v');
			}
			else
			{
				$this->load->view('kamar_admin_v');
			}
		}
		
		public function type_kamar()
		{
			if($this->session->userdata('username') == '')
			{
				$this->load->view('kamar_v');
			}
			else
			{
				$this->load->view('type_kamar_v');
			}
		}
		
		public function lokasi()
		{
			if($this->session->userdata('username') == '')
			{
				$this->load->view('kamar_v');
			}
			else
			{
				$this->load->view('lokasi_v');
			}
		}
		
		public function booking()
		{				
			$this->load->view('booking_v');
		}
		
		public function insert_booking()
		{	
			
			$this->kamar_m->set_nama($this->input->post('nama'));
			$this->kamar_m->set_alamat($this->input->post('alamat'));
			$this->kamar_m->set_email($this->input->post('nama_email'));
			$this->kamar_m->set_no_hp($this->input->post('no_hp'));
			$this->kamar_m->set_harga_total($this->input->post('totalharga'));
			
			$this->kamar_m->set_tgl_check_in($this->input->post('tgl_checkin'));
			$this->kamar_m->set_tgl_check_out($this->input->post('tgl_checkout'));
			
			$this->kamar_m->insert_book();
			
			//$query = $this->kamar_m->view_tersedia($this->input->post('tgl_checkin'),$this->input->post('tgl_checkout'));
//			$querymax = $this->kamar_m->view_by_max_book();
//			$max_id_book = $querymax->row();
////			echo "<script>alert('".$max_id_book->max."')</script
//			foreach($query->result() as $row) :
//				if($this->input->post('chk_'.$row->id_kamar) == 'on')
//				{
//					$this->kamar_m->set_id_kamar($this->input->post('id_'. $row->id_kamar));
//					$this->kamar_m->set_harga($this->input->post('harga_'.$row->id_typekamar));
//					$this->kamar_m->insert_detail_book($max_id_book->max);
//					
//					echo $this->input->post('harga_'. $row->id_kamar);
//				}
//			endforeach;
			
			
			redirect(site_url().'kamar');
			echo "<script> alert('Data Berhasil Disimpan') </script>";
		}

		public function insert_typekamar()
		{
			$this->kamar_m->set_id_typekamar($this->input->post('id_typekamar'));
			
			$query = $this->kamar_m->view_by_id_typekamar();
			
			if(! $query->num_rows())
			{
				$this->kamar_m->set_type($this->input->post('type'));
				$this->kamar_m->set_harga($this->input->post('harga'));
				$this->kamar_m->insert_typekamar();
				
				redirect(site_url().'kamar/type_kamar');
			}
			else
				redirect(site_url().'kamar/index/error_save');
		}
		
		public function update_typekamar()
		{
			$this->kamar_m->set_id_typekamar($this->input->post('id_typekamar_tmp'));
			$this->kamar_m->set_type($this->input->post('type'));
			$this->kamar_m->set_harga($this->input->post('harga'));
			$this->kamar_m->update_typekamar();
			
			redirect(site_url().'kamar/type_kamar');
		}
		
		public function delete_typekamar()
		{
			$this->kamar_m->set_id_typekamar($this->uri->segment(3));
			
			$this->kamar_m->delete_typekamar();
			
			redirect(site_url().'kamar/type_kamar');
		}
		
		public function delete_all()
		{
			$this->kamar_m->delete_all();
			
			redirect(site_url().'kamar/type_kamar');
		}
		
		public function delete_all_typekamar()
		{
			$this->kamar_m->delete_all();
			
			redirect(site_url().'kamar/type_kamar');
		}
		
		public function excel()
		{
			header('Content-Type: application/ynd.ms-excel');
			header('Content-Disposition: attachment; filename="Daftar Kamar.xls"');
			$this->load->view('kamar_report_v');
		}
		
		public function pdf()
		{
			$this->load->library('tcpdf');
			$this->load->library('parser');
			
			$pdf = new tcpdf();
			
			$orientation = 'L';
			$format = 'A4';
			$keepmargins = false;
			$tocpage = false;
			
			$pdf->AddPage($orientation, $format, $keepmargins, $tocpage);
			
			$family = 'dejavusans';
			$style = '';
			$size = '12';
			
			$pdf->SetFont($family, $style, $size);
						
			$html = $this->parser->parse('kamar_report_v',array());
			$ln = true;
			$fill = false;
			$reseth = false;
			$cell = false;
			$align = '';
			
			$pdf->writeHTML($html, $ln, $fill, $reseth, $cell, $align);
			
			$pdf->Output();	
			
			$name = "./assets/pdf/Kamar.pdf";
			$dest = "F";
			
			$pdf->Output($name, $dest);
		}
	}
