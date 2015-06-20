<?PHP
	class Tentang extends CI_Controller
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
				$this->load->view('tentang_v');
		}
	}