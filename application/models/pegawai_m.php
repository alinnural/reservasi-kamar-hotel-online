<?PHP
	class Pegawai_M extends CI_Model
	{
		//Property
		
		private $id_peg;
		private $nama;
		private $alamat;
		private $no_hp;
		private $email;
		private $jabatan;
		private $username;
		private $password;
		
		//Method Setter - Mutator
		
		public function set_id_peg($value)
		{
			$this->id_peg = $value;
		}
		
		public function set_nama($value)
		{
			$this->nama = $value;
		}
		
		public function set_alamat($value)
		{
			$this->alamat = $value;
		}
		
		public function set_no_hp($value)
		{
			$this->no_hp = $value;
		}
		
		public function set_email($value)
		{
			$this->email = $value;
		}
		
		public function set_jabatan($value)
		{
			$this->jabatan = $value;
		}
		
		public function set_username($value)
		{
			$this->username = $value;
		}
		
		public function set_password($value)
		{
			$this->password = $value;
		}

		//Method Getter - Aksesor
		public function get_id_peg()
		{
			return $this->id_peg;
		}
		
		public function get_nama()
		{
			return $this->nama;
		}
		
		public function get_alamat()
		{
			return $this->alamat;
		}
		
		public function get_no_hp()
		{
			return $this->no_hp;
		}
		
		public function get_email()
		{
			return $this->email;
		}
		
		public function get_jabatan()
		{
			return $this->jabatan;
		}
		
		public function get_username()
		{
			return $this->username;
		}
		
		public function get_password()
		{
			return $this->password;
		}
		
		//Method
		
		public function view_by_username_password()
		{
			$sql = "SELECT * FROM tbl_peg 
					WHERE username='".$this->get_username()."' AND 
					password='".md5($this->get_password())."'";
			
			return $this->db->query($sql);
		}
		
		public function view_by_username()
		{
			$sql = "SELECT * FROM tbl_peg 
					WHERE username='".$this->get_username()."'";
			
			return $this->db->query($sql);
		}
		
		public function view_by_id_peg()
		{
			$sql = "SELECT * FROM tbl_peg";
			
			return $this->db->query($sql);
		}
		
		public function insert()
		{
			$sql = "INSERT INTO tbl_peg 
					(nama, 
					alamat, 
					no_hp, 
					email, 
					jabatan, username, password) 
					VALUES('".$this->get_nama()."', 
					'".$this->get_alamat()."', 
					'".$this->get_no_hp()."', 
					'".$this->get_email()."', 
					'".$this->get_jabatan()."', 
					'".$this->get_username()."','".md5(234)."')";
			
			$this->db->query($sql);
		}
		
		public function update()
		{
			$sql = "UPDATE tbl_peg 
					SET nama='".$this->get_nama()."', 
					alamat='".$this->get_alamat()."', 
					no_hp='".$this->get_no_hp()."', 
					email='".$this->get_email()."', 
					jabatan='".$this->get_jabatan()."', 
					username='".$this->get_username()."'
					WHERE id_peg=".$this->get_id_peg();
			
			$this->db->query($sql);
		}
		
		public function delete()
		{
			$sql = "DELETE FROM tbl_peg 
					WHERE id_peg=".$this->get_id_peg();
			
			$this->db->query($sql);
		}
		
		public function delete_all()
		{
			$sql = "TRUNCATE TABLE tbl_id_peg";
			
			$this->db->query($sql);
		}
	}