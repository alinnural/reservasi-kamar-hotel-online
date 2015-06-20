<?PHP
	class Beranda extends CI_Controller
	{
		//Constructor
		
		public function __construct()
		{
			parent::__construct();
			
			//model
			$this->load->model('lokasi_m');
			$this->load->model('pegawai_m');
			$this->session->set_userdata('tgl_check_in', '');
		}
		
		//Index
		
		public function index()
		{
			if($this->session->userdata('username') == '')
			{
				$this->load->view('beranda_v');
			}
			else
			{
				$this->load->view('beranda_admin_v');
			}
		}
		
		public function login()
		{			
			$this->pegawai_m->set_username($this->input->post('username'));
			$this->pegawai_m->set_password($this->input->post('password'));
			
			$query = $this->pegawai_m->view_by_username_password();
			
			if($query->num_rows())
			{
				$row = $query->row();
				
				$this->session->set_userdata('username', $row->username);
				$this->session->set_userdata('jabatan', $row->jabatan);
				
				redirect(site_url());
			}
			else
				redirect(site_url().'beranda');
		}
		
		public function logout()
		{
			$this->session->unset_userdata('username');
			
			$this->session->sess_destroy();
			
			redirect(site_url());
		}
		
		/*public function update()
		{
			$this->konten_m->set_konten($this->input->post('konten'));
			
			$this->konten_m->update();
			
			redirect(site_url());	
		}*/
	}
?>