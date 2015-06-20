<?PHP
	class Kamar_M extends CI_Model
	{
		//Property
		
		private $id_kamar;
		private $id_typekamar;
		private $id_lokasi;
		private $status;
		private $tgl_check_in;
		private $tgl_check_out;
		private $type;
		private $harga;
		private $harga_total;
		private $nama;
		private $alamat;
		private $email;
		private $no_hp;
		
		//Method Mutator - Setter
		
		public function set_id_kamar($value)
		{
			$this->id_kamar = $value;
		}
		
		public function set_id_typekamar($value)
		{
			$this->id_typekamar = $value;
		}
		
		public function set_id_lokasi($value)
		{
			$this->id_lokasi = $value;
		}
		
		public function set_status($value)
		{
			$this->status = $value;
		}
		
		public function set_tgl_check_in($value)
		{
			$this->tgl_check_in = $value;
		}
		
		public function set_type($value)
		{
			$this->type = $value;
		}
		
		public function set_harga($value)
		{
			$this->harga = $value;
		}
		
		public function set_tgl_check_out($value)
		{
			$this->tgl_check_out = $value;
		}
		
		public function set_harga_total($value)
		{
			$this->harga_total = $value;
		}
		
		public function set_nama($value)
		{
			$this->nama = $value;
		}
		
		public function set_alamat($value)
		{
			$this->alamat = $value;
		}
		
		public function set_email($value)
		{
			$this->email = $value;
		}
		
		public function set_no_hp($value)
		{
			$this->no_hp = $value;
		}

		//Method Aksesor - Getter
		
		public function get_id_kamar()
		{
			return $this->id_kamar;
		}
		
		public function get_id_typekamar()
		{
			return $this->id_typekamar;
		}
		
		public function get_id_lokasi()
		{
			return $this->id_lokasi;
		}
		
		public function get_status()
		{
			return $this->status;
		}
		
		public function get_tgl_check_in()
		{
			return $this->tgl_check_in;
		}
		
		public function get_type()
		{
			return $this->type;
		}
		
		public function get_harga()
		{
			return $this->harga;
		}
		
		public function get_tgl_check_out()
		{
			return $this->tgl_check_out;
		}
		
		public function get_harga_total()
		{
			return $this->harga_total;
		}
		
		public function get_nama()
		{
			return $this->nama;
		}
		
		public function get_alamat()
		{
			return $this->alamat;
		}
		
		public function get_email()
		{
			return $this->email;
		}
		
		public function get_no_hp()
		{
			return $this->no_hp;
		}
		
		//Method
		
		public function view_kamar()
		{
			$sql = "SELECT k.id_kamar, t.type, t.harga, l.lokasi
					FROM tbl_kamar as k, tbl_typekamar as t, tbl_lokasi as l
					WHERE k.id_typekamar = t.id_typekamar and k.id_lokasi = l.id_lokasi";
			
			return $this->db->query($sql);
		}
		
		public function view_book()
		{
			$sql = "SELECT DISTINCT b.id_book, b.nama, k.id_kamar, t.type, t.harga, l.lokasi, t.id_typekamar
					FROM tbl_kamar AS k, tbl_typekamar AS t, tbl_lokasi as l, tbl_book as b
					WHERE k.id_typekamar = t.id_typekamar and k.id_lokasi = l.id_lokasi and b.status = 0";
			
			return $this->db->query($sql);
		}
		
		public function view_typekamar()
		{
			$sql = "SELECT id_typekamar, type, harga
					FROM tbl_typekamar";
			
			return $this->db->query($sql);
		}
		
		public function view_lokasi()
		{
			$sql = "SELECT *
					FROM tbl_lokasi";
			
			return $this->db->query($sql);
		}
		
		public function view_tersedia($tgl_ci,$tgl_co)
		{
			$sql = "SELECT DISTINCT k.id_kamar, t.type, t.harga, l.lokasi, t.id_typekamar
					FROM tbl_kamar AS k, tbl_typekamar AS t, tbl_lokasi as l, tbl_book as b
					WHERE k.id_typekamar = t.id_typekamar and k.id_lokasi = l.id_lokasi and k.id_kamar 
					NOT IN (SELECT d.id_kamar FROM tbl_detailbook AS d WHERE d.tgl_check_in >=  '".$tgl_ci."' and d.tgl_check_out <=  '".$tgl_co."')";
			
			//$this->session->set_userdata('tgl_check_in', $this->get_tgl_check_in());
			
			return $this->db->query($sql);
		}
		
		public function view_tipe_kamar_by_transaksi()
		{
			$sql = "SELECT id_typekamar,
					(SELECT COUNT(*) FROM tbl_detailbook
					WHERE tbl_detailbook.id_kamar=tbl_kamar.id_kamar and tbl_kamar.id_typekamar = tbl_typekamar.id_typekamar) AS 
					jumlah_transaksi
					FROM tbl_typekamar";
			
			return $this->db->query($sql);
		}
		
		public function view_by_id_typekamar()
		{
			$sql = "SELECT * 
					FROM tbl_typekamar 
					WHERE id_typekamar='".$this->get_id_typekamar()."'";
			
			return $this->db->query($sql);
		}
		
		public function view_by_max_book()
		{
			$sql = "SELECT MAX(id_book) as max FROM tbl_book";
			
			return $this->db->query($sql);
		}
		
		public function insert_detail_book($max)
		{
			$sql = "INSERT INTO tbl_detailbook 
					(id_book, id_kamar, harga, tgl_check_in, tgl_check_out) 
					VALUES(".$max.",".$this->get_id_kamar().",".$this->get_harga().",'".$this->get_tgl_check_in()."','".$this->get_tgl_check_out()."')";
			
			$this->db->query($sql);
		}
		
		public function insert_book()
		{
			$sql = "INSERT INTO tbl_book 
					(tgl_book, total_harga, nama, alamat, email, no_hp) 
					VALUES(NOW(),".$_GET['totalharga'].",'".$_GET['nama']."','".$_GET['alamat']."','".$_GET['nama_email']."','".$_GET['no_hp']."')";
			
			$this->db->query($sql);
		}
		
		public function insert_typekamar()
		{
			$sql = "INSERT INTO tbl_typekamar 
					(type, harga) 
					VALUES('".$this->get_type()."', 
					'".$this->get_harga()."')";
			
			$this->db->query($sql);
		}
		
		public function update_typekamar()
		{
			$sql = "UPDATE tbl_typekamar 
					SET type='".$this->get_type()."', harga='".$this->get_harga()."'
					WHERE id_typekamar='".$this->get_id_typekamar()."'";
			
			$this->db->query($sql);
		}
		
		public function delete_typekamar()
		{
			$sql = "DELETE FROM tbl_typekamar 
					WHERE id_typekamar='".$this->get_id_typekamar()."'";
			
			$this->db->query($sql);
		}
		
		public function delete_all()
		{
			$sql = "TRUNCATE TABLE tbl_typekamar";
			
			$this->db->query($sql);
		}
		
	}