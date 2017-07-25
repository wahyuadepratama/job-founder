<?php 


class pekerja
 {

 	public $id_pekerja;
 	public $username;
 	public $email;
 	public $no_hp;
 	public $password;
 	public $foto_profile;
 	public $nama;
 	public $sosmed;
 	public $provinsi;
 	public $kota;
 	public $kecamatan;
 	public $alamat;
 	public $keahlian;
 	public $foto_pengenal;
 	public $tanggal;

 	function __construct(){}

 	function get_data($query, $param){
			try{
				global $pdo;
				$req = $pdo->prepare($query);
				if($param == ''){
					$req->execute();
				}else{
					$req->execute($param);
				}

				$rows = $req->rowCount();
				$status = false;

				if($rows > 0){
					$status = true;
				}

				$data = $req->fetch(PDO::FETCH_NAMED);

				return array('status' => $status, 'rows' => $rows, 'data' => $data);
			}catch(PDOException $e){
				echo "Error! gagal mengambil data: ".$e->getMessage();
			}
	}

 	function insert_data_signup(){
 		global $pdo;
 		$query = $pdo->prepare("
 			INSERT INTO `pekerja` (`id_pekerja`, `username`, `email`, `no_hp`, `password`, `tanggal`) 
 			VALUES (NULL, ?, ?, ?, ?, CURRENT_TIMESTAMP)");
		$query->execute(array($_POST['username'],$_POST['email'],$_POST['no_handphone'],md5($_POST['password'])));
 	}

 	function cek_login($data_post){
			$query = "SELECT * FROM pekerja WHERE username=:lusername AND password=:lpassword";
			$param = array(
					':lusername' => strtoupper($data_post['lusername']),
					':lpassword' => md5($data_post['lpassword'])
				);

			return $this->get_data($query, $param);
	}

 	function update_profile_set(){
 		global $pdo;
 		$query = $pdo->prepare("UPDATE `pekerja` SET 
 			`username` 		= ?, 
 			`email` 		= ?,
 			`no_hp` 		= ?,
 			`password` 		= ?,
 			`foto_profile` 	= ?,
 			`nama` 			= ?,
 			`sosmed` 		= ?,
 			`provinsi` 		= ?,
 			`kota` 			= ?,
 			`kecamatan` 	= ?,
 			`alamat` 		= ?,
 			`keahlian` 		= ?,
 			`foto_pengenal` = ?
 			WHERE `pekerja`.`id_pekerja` = ?");
		$query->execute(array(
			$this->username,
			$this->email,
			$this->no_hp,
			$this->password,
			$this->foto_profile,
			$this->nama,
			$this->sosmed,
			$this->provinsi,
			$this->kota,
			$this->kecamatan,
			$this->alamat,
			$this->keahlian,
			$this->foto_pengenal,
			$this->id_pekerja
			));
 	}

 	function delete_by_id($id){
 		global $pdo;
 		$query = $pdo->prepare("DELETE FROM `pekerja` WHERE `pekerja`.`id_pekerja` = ?");
		$query->execute(array($id));
 		}

 	function set_all_property($data_array){
 		$this->id_pekerja = $data_array['id_pekerja'];
 		$this->username = $data_array['username'];
 		$this->email = $data_array['email'];
 		$this->no_hp = $data_array['no_hp'];
 		$this->password = $data_array['password'];
 		$this->foto_profile = $data_array['foto_profile'];
 		$this->nama = $data_array['nama'];
 		$this->sosmed = $data_array['sosmed'];
 		$this->provinsi = $data_array['provinsi'];
 		$this->kota = $data_array['kota'];
 		$this->kecamatan = $data_array['kecamatan'];
 		$this->alamat = $data_array['alamat'];
 		$this->keahlian = $data_array['keahlian'];
 		$this->foto_pengenal = $data_array['foto_pengenal'];
 		$this->tanggal = $data_array['tanggal'];
 	}

 	function set_profile_post(){
 		$this->foto_profile = $_POST['foto_profile'];
		$this->nama = $_POST['nama'];
		$this->email = $_POST['email'];
		$this->no_hp = $_POST['no_hp'];
		$this->sosmed = $_POST['sosmed'];
		$this->provinsi = $_POST['provinsi'];
		$this->kota = $_POST['kota'];
		$this->kecamatan = $_POST['kecamatan'];
		$this->alamat = $_POST['alamat'];
		$this->keahlian = $_POST['keahlian'];

		$this->update_profile_set();
 	}

 	function get_profile_id($id){
			$query = "SELECT * FROM `pekerja` WHERE `pekerja`.`id_pekerja` = ?";
			$param = array($id);
			return $this->get_data($query, $param);
	}

	function get_all_rows($query, $param){
			try{
				global $pdo;
				$req = $pdo->prepare($query);
				if($param == ''){
					$req->execute();
				}else{
					$req->execute($param);
				}

				if($req->rowCount() > 0){
					$result = $req->fetchAll();
					return $result;
				}

				
			}catch(PDOException $e){
				echo "Error! gagal mengambil data: ".$e->getMessage();
			}
	}

	function get_daerah(){
			$a = $this->provinsi.'.00.00.0000';
			$b = $this->provinsi.'.'.$this->kota.'.00.0000';
			$c = $this->provinsi.'.'.$this->kota.'.'.$this->kecamatan.'.0000';

			$query = "select lokasi_nama from inf_lokasi where lokasi_kode='".$a."' or lokasi_kode= '".$b."' or lokasi_kode= '".$c."'";
			$result = $this->get_all_rows($query,'');

			return $result;
	}

	function get_all_profile(){
			$query = "SELECT * FROM `pekerja`";
			return $this->get_all_rows($query, '');
	}

	function get_by_pengiklan_submit($id_pengiklan){
			$query = "select * from pekerja where id_pekerja in(select distinct id_pekerja from lowongan where id_postingan in (select id_postingan from postingan where id_pengiklan=1))";
			$param = array($id_pengiklan);
			return $this->get_all_rows($query, $param);
	}

 } 


 ?>