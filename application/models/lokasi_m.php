<?PHP
	class Lokasi_M extends CI_Model
	{
		//Property
		
		private $id_lokasi;
		private $lokasi;
		private $alamat;
		private $kode_pos;
		private $no_fax;
		private $no_telp;
		
		//Method Mutator - Setter
		
		public function set_id_lokasi($value)
		{
			$this->id_lokasi = $value;
		}
		
		public function set_lokasi($value)
		{
			$this->lokasi = $value;
		}
		
		public function set_alamat($value)
		{
			$this->alamat = $value;
		}
		
		public function set_kode_pos($value)
		{
			$this->kode_pos = $value;
		}
		
		public function set_no_fax($value)
		{
			$this->no_fax = $value;
		}
		
		public function set_no_telp($value)
		{
			$this->no_telp = $value;
		}
		
		//Method Aksesor - Getter
		
		public function get_id_lokasi()
		{
			return $this->id_lokasi;
		}
		
		public function get_lokasi()
		{
			return $this->lokasi;
		}
		
		public function get_alamat()
		{
			return $this->alamat;
		}
		
		public function get_kode_pos()
		{
			return $this->kode_pos;
		}
		
		public function get_no_fax()
		{
			return $this->no_fax;
		}
		
		public function get_no_telp()
		{
			return $this->no_telp;
		}
				
		//Method
		
		public function view()
		{
			$sql = "SELECT * 
					FROM tbl_lokasi";
			
			return $this->db->query($sql);
		}
		
	}