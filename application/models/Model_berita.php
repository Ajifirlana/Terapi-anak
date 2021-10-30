<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_berita extends CI_Model {
var $gallerypath;
var $gallery_path_url;

	public function __construct() {
 $this->load->database();
 $this->load->helper('tglindo_helper');

 $this->gallerypath = realpath(APPPATH . '../uploads/');
 $this->gallery_path_url = base_url().'uploads/';
 }

 public function get_data_by_pk($tbl, $where, $id)
	{
				$this->db->from($tbl);
				$this->db->where($where,$id);
				$query = $this->db->get();

				return $query;
	}

	public function delete_data_by_pk($tbl, $where, $id)
	{
		$this->db->where($where, $id);
		$this->db->delete($tbl);
	}

 
 public function hitungdata()
{   
    
    $query = $this->db->query('SELECT databidang.nama_lengkap, kategori, COUNT( * ) as total FROM databidang
                JOIN kegiatan_user ON databidang.nama_lengkap = kegiatan_user.kategori
                 GROUP BY kategori
                ');
 
    
            return $query->result();
}

	function kirimkomentar($data,$table){
		$this->db->insert($table,$data);
	}

	function post_berita($data,$table){
		$this->db->insert($table,$data);
	}

	function simpan_berita(){
	    $config = array('allowed_types' =>'png|jpg|pdf|doc|docx','encrypt_name' =>'TRUE','upload_path' => './uploads');

		$this->load->library('upload', $config);
		$this->upload->do_upload('image');
		$datafile = $this->upload->data();
		
		$config = array('source_image' => $datafile['full_path'],
	                         'new_image' => $this->gallerypath . '/uploads',
				             'maintain_ration' => false,
				             'width' => 130,
			                 'height' =>100);

	    $this->load->library('image_lib', $config);
	    $this->upload->initialize($config);
		$this->image_lib->resize();
		
		$create_by = $this->input->post('create_by');

		$username = $this->input->post('username');
		$kategori = $this->input->post('kategori');
		$capaian = $this->input->post('capaian');

		$keterangan = $this->input->post('keterangan');
		$tgl = date('Y-m-d');
		
		date_default_timezone_set('Asia/Jakarta');
		$create_by = $this->input->post('create_by');
		$image = $_FILES['image']['name'];
		
		$data = array('kategori' => $kategori,
					'capaian' => $capaian,
					'keterangan' => $keterangan,
	                  'created_at' => $tgl,
	                  'create_by' => $create_by,

	                  'username' => $username,
				      'image' => $image);
		$this->db->insert('kegiatan', $data);
	}


	function hapus_user($id_jadwal){
	    $this->db->where('id_jadwal', $id_jadwal);
	    $this->db->delete('jw_terapis');
	}

	function hapus_berita($id_berita){
	    $this->db->where('id_berita', $id_berita);
	    $this->db->delete('kegiatan');
	}

	function post_user($data,$table){
		$this->db->insert($table,$data);
	}


	function data($limit, $start){
		return $query = $this->db->get('berita', $limit, $start);
		return $query;		
	}

	public function all(){
 $query = $this->db->query("SELECT * FROM kegiatan ORDER BY id_berita DESC LIMIT 5 ");
		return $query;
	}

	public function internasional1(){
 $query = $this->db->get('berita');
 $query = $this->db->query("SELECT * FROM berita WHERE kategori = 'internasional' ORDER BY id_berita DESC LIMIT 1 ");
 return $query->result();
    
	}

public function teknologi1(){
 $query = $this->db->get('berita');
 $query = $this->db->query("SELECT * FROM berita WHERE kategori = 'teknologi' ORDER BY id_berita DESC LIMIT 1 ");
 return $query->result();
    
	}
	public function nasional1(){
 $query = $this->db->get('berita');
 $query = $this->db->query("SELECT * FROM berita WHERE kategori = 'nasional' ORDER BY id_berita DESC LIMIT 1 ");
 return $query->result();


    
	}

	public function beritaterbaruinter(){

 $query = $this->db->query("SELECT * FROM berita  ORDER BY id_berita DESC LIMIT 5 ");
 return $query->result();


    
	}




	public function profile(){

	$sesi =$this->session->userdata('id_user');
 $query = $this->db->query("SELECT * FROM t_admin WHERE id_user = $sesi");
 return $query->result();


    
	}
public function data_user(){ 
$query = $this->db->query("SELECT pk.id,pk.id_user,pk.password,pk.nama_user,pk.hak_akses,ta.id_anak,ta.nama_lengkap FROM t_admin AS pk JOIN t_ankterapi AS ta WHERE pk.id_user=ta.id_anak AND hak_akses='orang_tua' ORDER BY id_user DESC");
 return $query;

}

	function data_orang_tua(){
		$query = $this->db->query("SELECT * FROM t_admin WHERE hak_akses='orang_tua'");
 return $query;

	}

public function data_anak(){ 
$query = $this->db->query("SELECT * FROM t_ankterapi ORDER BY id_anak DESC");
 return $query;

}
public function jadwal_anak(){
	$sesi =$this->session->userdata('id_user');
 $query = $this->db->query("SELECT pk.id_anak,pk.tanggal_pengajuan,pk.keterangan,pk.status,pk.id_izn,ta.id_anak,ta.nama_lengkap FROM tabel_izin AS pk JOIN t_ankterapi AS ta WHERE pk.id_anak=ta.id_anak AND pk.id_anak=$sesi  GROUP BY id_izn DESC");
 return $query;


    
	}



public function admin_sm_berita(){
	if ($this->session->userdata('level') == 'Admin') {
	
   		return $query = $this->db->query("SELECT * FROM kegiatan");
	}else
	
    return $query = $this->db->query("SELECT * FROM t_terapis");
    
	}


public function jadwal_pengganti(){
	$sesi =$this->session->userdata('id_user');
 $query = $this->db->query("SELECT pk.id_izin,pk.jam_mulai,pk.jam_selesai,pk.tanggal_pengganti,ta.id_anak,ta.nama_lengkap,jt.jenis_terapi,ti.keterangan FROM tabel_pengganti AS pk JOIN t_ankterapi AS ta JOIN jw_terapis AS jt JOIN tabel_izin AS ti WHERE pk.id_izin=ta.id_anak AND pk.id_izin=$sesi  GROUP BY id_pengganti DESC LIMIT 1");
 return $query;


    
	}
public function jadwal_saya(){ 

	$sesi_anak = $this->session->userdata('id_anak');
 $query = $this->db->query("SELECT * FROM jw_terapis AS jt WHERE jt.id_anak =$sesi_anak ORDER BY id_jadwal DESC");
 return $query ;

}

public function jadwal_izin_saya(){ 

	$sesi_anak = $this->session->userdata('id_anak');
 $query = $this->db->query("SELECT * FROM tabel_izin AS jt WHERE jt.id_anak =$sesi_anak ORDER BY id_izn DESC");
 return $query ;

}

public function jadwal_terapis_senin(){
    return $query = $this->db->query("SELECT t1.id_jadwal,t1.hari,t1.jam_mulai,t1.jam_selesai,t2.nama_lengkap,t2.id_anak,t1.jenis_terapi FROM jw_terapis AS t1 JOIN t_ankterapi AS t2 WHERE t1.id_anak=t2.id_anak AND hari='senin'");
    
	}



public function jadwal_terapis_selasa(){
    return $query = $this->db->query("SELECT t1.id_jadwal,t1.hari,t1.jam_mulai,t1.jam_selesai,t2.nama_lengkap,t2.id_anak,t1.jenis_terapi,t1.hari FROM jw_terapis AS t1 JOIN t_ankterapi AS t2 WHERE t1.id_anak=t2.id_anak AND hari='selasa'");
    
	}


public function jadwal_terapis_rabu(){
    return $query = $this->db->query("SELECT t1.id_jadwal,t1.hari,t1.jam_mulai,t1.jam_selesai,t2.nama_lengkap,t2.id_anak,t1.jenis_terapi FROM jw_terapis AS t1 JOIN t_ankterapi AS t2 WHERE t1.id_anak=t2.id_anak AND hari='rabu'");
    
	}

public function jadwal_terapis_kamis(){
    return $query = $this->db->query("SELECT t1.id_jadwal,t1.hari,t1.jam_mulai,t1.jam_selesai,t2.nama_lengkap,t2.id_anak,t1.jenis_terapi FROM jw_terapis AS t1 JOIN t_ankterapi AS t2 WHERE t1.id_anak=t2.id_anak AND hari='kamis'");
    
	}

public function jadwal_terapis_jumat(){
    return $query = $this->db->query("SELECT t1.id_jadwal,t1.hari,t1.jam_mulai,t1.jam_selesai,t2.nama_lengkap,t2.id_anak,t1.jenis_terapi FROM jw_terapis AS t1 JOIN t_ankterapi AS t2 WHERE t1.id_anak=t2.id_anak AND hari='jumat'");
    
	}

	
public function jadwal_terapis_sabtu(){
    return $query = $this->db->query("SELECT t1.id_jadwal,t1.hari,t1.jam_mulai,t1.jam_selesai,t2.nama_lengkap,t2.id_anak,t1.jenis_terapi FROM jw_terapis AS t1 JOIN t_ankterapi AS t2 WHERE t1.id_anak=t2.id_anak AND hari='sabtu'");
    
	}


public function jadwal_terapis_minggu(){
    return $query = $this->db->query("SELECT t1.id_jadwal,t1.hari,t1.jam_mulai,t1.jam_selesai,t2.nama_lengkap,t2.id_anak,t1.jenis_terapi FROM jw_terapis AS t1 JOIN t_ankterapi AS t2 WHERE t1.id_anak=t2.id_anak AND hari='minggu'");
    
	}
public function admin_sm_anak(){
 
 return $query = $this->db->query("SELECT * FROM t_ankterapi");
    	}


}