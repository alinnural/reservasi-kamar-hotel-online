<?PHP
	class Konfirmasi extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			
			//Model
			
		}
		
		public function index()
		{
				$this->load->view('konfirmasi_v');
		}
		
	}
