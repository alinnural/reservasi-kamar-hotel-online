<?PHP
	class Pegawai extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			
			//Model
			
			$this->load->model('pegawai_m');
		}
		
		public function index()
		{
			if($this->session->userdata('username') == '')
			{
				$this->load->view('beranda_v');
			}
			else
			{
				$this->load->view('pegawai_v');
			}
		}
		
		public function insert()
		{
			$this->pegawai_m->set_id_peg($this->input->post('id_peg'));
			
			$query = $this->pegawai_m->view_by_id_peg();
			
			if(! $query->num_rows())
			{
				$this->pegawai_m->set_nama($this->input->post('nama'));
				$this->pegawai_m->set_alamat($this->input->post('alamat'));
				$this->pegawai_m->set_no_hp($this->input->post('no_hp'));
				$this->pegawai_m->set_email($this->input->post('email'));
				$this->pegawai_m->set_jabatan($this->input->post('jabatan'));
				$this->pegawai_m->set_username($this->input->post('username'));
				
				$this->pegawai_m->insert();
				
				redirect(site_url().'pegawai');
			}
			else
				redirect(site_url().'pegawai/index/error_save');
		}
		
		public function update()
		{
			$this->pegawai_m->set_id_peg($this->input->post('id_peg_tmp'));
			$this->pegawai_m->set_nama($this->input->post('nama'));
			$this->pegawai_m->set_alamat($this->input->post('alamat'));
			$this->pegawai_m->set_no_hp($this->input->post('no_hp'));
			$this->pegawai_m->set_email($this->input->post('email'));
			$this->pegawai_m->set_jabatan($this->input->post('jabatan'));
			$this->pegawai_m->set_username($this->input->post('username'));
			
			$this->pegawai_m->update();
			
			redirect(site_url().'pegawai');
		}
		
		public function delete()
		{
			$this->pegawai_m->set_id_pegawai($this->uri->segment(3));
			
			$this->pegawai_m->delete();
			
			redirect(site_url().'program_keahlian');
		}
		
		public function delete_all()
		{
			$this->pegawai_m->delete_all();
			
			redirect(site_url().'pegawai');
		}
		
	}
