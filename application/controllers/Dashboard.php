<?php 

class Dashboard extends CI_Controller{


    var $gallerypath;

	function __construct(){
		parent::__construct();	

$this->load->helper('cleanurl_helper');
$this->load->model('m_login');
$this->load->model('model_berita');
$this->load->library('pagination');
$this->load->helper(array('url','html','file','form','download'));

 if( ! $this->session->userdata('id_user')) 
            redirect('login'); 

	}

public function index(){

$data['sm_berita'] = $this->model_berita->admin_sm_berita();
$data['jumlah'] = $this->db->count_all_results('t_terapis');

$data['jumlahanakizin'] = $this->db->count_all_results('tabel_izin');
$data['jumlahankterapis'] = $this->db->count_all_results('t_ankterapi');
$this->load->view('dashboard', $data);
        }
public function jadwal_terapis(){

$data['jumlahjadwal'] = $this->db->count_all_results('jw_terapis');

$data['jumlahanakizin'] = $this->db->count_all_results('tabel_izin');
$data['pilianak'] = $this->model_berita->admin_sm_anak();
$data['sm_user'] = $this->model_berita->jadwal_terapis_senin();

$data['selasa'] = $this->model_berita->jadwal_terapis_selasa();

$data['rabu'] = $this->model_berita->jadwal_terapis_rabu();


$data['kamis'] = $this->model_berita->jadwal_terapis_kamis();

$data['jumat'] = $this->model_berita->jadwal_terapis_jumat();

$data['sabtu'] = $this->model_berita->jadwal_terapis_sabtu();

$data['minggu'] = $this->model_berita->jadwal_terapis_minggu();

$this->load->view('config/jadwal_terapis', $data);

    }
 function tambah_terapi(){

              $nama_lengkap          = htmlentities(strip_tags($_POST['nama_lengkap']));
              $tanggal_lahir          = htmlentities(strip_tags($_POST['tanggal_lahir']));
              $jenis_kelamin            = htmlentities(strip_tags($_POST['jenis_kelamin']));
             $agama            = htmlentities(strip_tags($_POST['agama']));
             $no_telp            = htmlentities(strip_tags($_POST['no_telp']));
             

              

    

                    date_default_timezone_set('Asia/Jakarta');
                    $tgl = date('Y-m-d');

                    $data = array('nama_lengkap' => $nama_lengkap,
          'tanggal_lahir' => $tanggal_lahir,
          'jenis_kelamin' => $jenis_kelamin,
                    'agama' => $agama,'no_telp'=>$no_telp);

                    

                    $this->db->insert('t_terapis', $data);
                    $this->session->set_flashdata('msg',
                       '
                       <div class="alert alert-success alert-dismissible" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times; &nbsp;</span>
                          </button>
                          <strong>Sukses!</strong> Terapis berhasil ditambahkan.
                       </div>'
                     );
              
redirect('dashboard');
          
        }


        public function tambah_izin(){

           $id_anak          = htmlentities(strip_tags($_POST['id_anak']));
             $tanggal_pengajuan =  htmlentities(strip_tags($_POST['tanggal_pengajuan']));

             $keterangan =  htmlentities(strip_tags($_POST['keterangan']));

             $status =  htmlentities(strip_tags($_POST['status']));
 $data = array('id_anak' => $id_anak,'tanggal_pengajuan' => $tanggal_pengajuan,'keterangan' => $keterangan,'status' => $status);
$this->db->insert('tabel_izin', $data);
                    $this->session->set_flashdata('msg',
                       '
                       <div class="alert alert-success alert-dismissible" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times; &nbsp;</span>
                          </button>
                          <strong>Sukses!</strong>Izin berhasil ditambahkan.
                       </div>'
                     );
              
redirect('dashboard/orangtua');
        }

public function anak_terapis(){

$this->load->database();
$data['sm_komentar'] = $this->model_berita->admin_sm_anak();

$data['data_orang_tua'] = $this->model_berita->data_orang_tua();
$this->load->view('template_a');
$this->load->view('config/anak_terapis', $data);
		}



public function orangtua(){ 

$data['tb_pengganti'] = $this->model_berita->jadwal_pengganti();
$data['getidentitas'] = $this->model_berita->jadwal_anak()->row();
$data['sm_user'] = $this->model_berita->jadwal_anak();
$this->load->view('config/jadwal_anak', $data);

}


function proses_hapus_user($id_jadwal=null){

if( ! $this->session->userdata('id_user')){ 
            redirect('login'); 

  }

$this->model_berita->hapus_user($id_jadwal);

$this->session->set_flashdata('msg',
             '
             <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times; &nbsp;</span>
                </button>
                <strong>Sukses!</strong> jadwal berhasil Di Hapus.
             </div>'
           );
  redirect('dashboard/jadwal_terapis');
        }


        function hapus_izin($id_izn=null){

            $this->db->where('id_izn', $_POST['id_izn']);
            $this->db->delete('tabel_izin');
          
$this->session->set_flashdata('msg',
             '
             <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times; &nbsp;</span>
                </button>
                <strong>Sukses!</strong> Izin berhasil Di Hapus
             </div>'
           );

  redirect('dashboard/orangtua');

        }

 function hapus_orang_tua($id=null){

            $this->db->where('id', $_POST['id']);
            $this->db->delete('t_admin');
          
$this->session->set_flashdata('msg',
             '
             <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times; &nbsp;</span>
                </button>
                <strong>Sukses!</strong>Data Orang Tua berhasil Di Hapus
             </div>'
           );

  redirect('dashboard/user');

        }

function proses_hapus_terapi($id=''){


if($this->session->userdata('level') == 'User'){ 
            redirect('login'); 

  }else{

$this->model_berita->delete_data_by_pk('t_terapis', 'id_terapis', $id);

$this->session->set_flashdata('msg',
             '
             <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times; &nbsp;</span>
                </button>
                <strong>Sukses!</strong> Kegiatan berhasil dihapus.
             </div>'
           );
  redirect('index.php/dashboard');
        }
      }

function proses_hapus_kgiatanuser($id=''){


if($this->session->userdata('level') == 'User'){ 
            redirect('login'); 

  }else{

$cek_data = $this->model_berita->get_data_by_pk('kegiatan_user', 'id_berita', $id)->row();

$this->load->helper('file');
delete_files($cek_data);
          unlink("./uploads/$cek_data->image");
                
$this->model_berita->delete_data_by_pk('kegiatan_user', 'id_berita', $id);

$this->session->set_flashdata('msg',
             '
             <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times; &nbsp;</span>
                </button>
                <strong>Sukses!</strong> Kegiatan berhasil dihapus.
             </div>'
           );
  redirect('index.php/dashboard/laporan');
        }
      }
				




public function edit_terapis()
    {
       $nama_lengkap          = htmlentities(strip_tags($_POST['nama_lengkap']));
              $tanggal_lahir          = htmlentities(strip_tags($_POST['tanggal_lahir']));
              $jenis_kelamin            = htmlentities(strip_tags($_POST['jenis_kelamin']));
             $agama            = htmlentities(strip_tags($_POST['agama']));
             $no_telp            = htmlentities(strip_tags($_POST['no_telp']));
             
             $data = array('nama_lengkap' => $nama_lengkap,
          'tanggal_lahir' => $tanggal_lahir,
          'jenis_kelamin' => $jenis_kelamin,
                    'agama' => $agama,'no_telp'=>$no_telp);

            $this->db->where('id_terapis', $_POST['id_terapis']);
            $this->db->update('t_terapis',$data);
             $this->session->set_flashdata('msg',
             '
             <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times; &nbsp;</span>
                </button>
                <strong>Sukses!</strong> Data Terapis berhasil diedit.
             </div>'
           );
            redirect('dashboard');
        
    }

    public function edit_anakterapis()
    {
          $nama_lengkap          = htmlentities(strip_tags($_POST['nama_lengkap']));
              $nama_panggilan          = htmlentities(strip_tags($_POST['nama_panggilan']));
              $tempat_lahir            = htmlentities(strip_tags($_POST['tempat_lahir']));
            $jenis_kelamin            = htmlentities(strip_tags($_POST['jenis_kelamin']));
           $id_anak  = htmlentities(strip_tags($_POST['id_anak']));
             $data = array('nama_lengkap' => $nama_lengkap,
          'nama_panggilan' => $nama_panggilan,
          'tempat_lahir' => $tempat_lahir,'jenis_kelamin' => $jenis_kelamin,'id_anak' => $id_anak);

            $this->db->where('id', $_POST['id']);
            $this->db->update('t_ankterapi',$data);
             $this->session->set_flashdata('msg',
             '
             <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times; &nbsp;</span>
                </button>
                <strong>Sukses!</strong> Data Anak Terapis berhasil diedit.
             </div>'
           );
            redirect('dashboard/anak_terapis');
        
    }


public function profile(){
$data['profile'] = $this->model_berita->profile();
$this->load->view('config/profil', $data);
}


public function edit_user()
    {
        $this->form_validation->set_rules('id_jadwal', 'id_jadwal', 'required');
         $this->form_validation->set_rules('id_anak', 'id_anak', 'required');

         $this->form_validation->set_rules('jam_mulai', 'jam_mulai', 'required');
      
         $this->form_validation->set_rules('jam_selesai', 'jam_selesai', 'required');
      
     
         $this->form_validation->set_rules('hari', 'hari', 'required');
      
        if($this->form_validation->run()==FALSE){
           $this->session->set_flashdata('msg',
             '
             <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times; &nbsp;</span>
                </button>
                <strong>Sukses!</strong> Data Gagal Di Edit.
             </div>'
           );  redirect('dashboard/jadwal_terapis');
        }else{
            $data=array(
                "id_anak"=>$_POST['id_anak'],
                "jam_mulai"=>$_POST['jam_mulai'],

                "jam_selesai"=>$_POST['jam_selesai'],

                "hari"=>$_POST['hari'],
            );
            $this->db->where('id_jadwal', $_POST['id_jadwal']);
            $this->db->update('jw_terapis',$data);
            $this->session->set_flashdata('msg',
             '
             <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times; &nbsp;</span>
                </button>
                <strong>Sukses!</strong> Data berhasil Di Edit.
             </div>'
           );
            redirect('dashboard/jadwal_terapis');
        }
    }


public function edit_pengguna()
    { 

         $id_user = $this->input->post('id_user');

  $nama_user = $this->input->post('nama_user');

  $password = md5($this->input->post('password'));
  $data = array('id_user'=> $id_user,'nama_user'=>$nama_user,'password'=>$password);

          $this->db->where('id', $_POST['id']);
            $this->db->update('t_admin',$data);
            $this->session->set_flashdata('msg',
             '
             <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times; &nbsp;</span>
                </button>
                <strong>Sukses!</strong>Data Orang Tua berhasil Di Ubah.
             </div>'
           );
            redirect('dashboard/user');
    }



public function edit_jadwal()
    { 
         $tanggal_pengajuan = $this->input->post('tanggal_pengajuan');

  $data = array('tanggal_pengajuan'=> $tanggal_pengajuan);

          $this->db->where('id_izn', $_POST['id_izn']);
            $this->db->update('tabel_izin',$data);
            $this->session->set_flashdata('msg',
             '
             <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times; &nbsp;</span>
                </button>
                <strong>Sukses!</strong>Data Izin berhasil Di Ubah.
             </div>'
           );
            redirect('dashboard/orangtua');
    }
function post_pengguna(){
    $nama_user = $this->input->post('nama_user');
$id_user = $this->input->post('id_user');

  $password = md5($this->input->post('password')); 
  $hak_akses = $this->input->post('hak_akses'); 

  $data = array('id_user'=>$id_user,'nama_user'=>$nama_user,'password'=>$password,'hak_akses'=>$hak_akses);
$this->db->insert('t_admin', $data);
                    $this->session->set_flashdata('msg',
                       '
                       <div class="alert alert-success alert-dismissible" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times; &nbsp;</span>
                          </button>
                          <strong>Sukses!</strong>Terapis berhasil ditambahkan.
                       </div>'
                     );
              
redirect('dashboard/user');
}
function update_profile(){
  $id_user = $this->input->post('id_user');

  $nama_user = $this->input->post('nama_user');

  $password = md5($this->input->post('password'));
  $data = array('id_user'=> $id_user,'nama_user'=>$nama_user,'password'=>$password);

$this->db->where('id_user', $_POST['id_user']);
            $this->db->update('t_admin',$data);
            $this->session->set_flashdata('msg',
             '
             <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times; &nbsp;</span>
                </button>
                <strong>Sukses!</strong> Profile berhasil Di Ubah.
             </div>'
           );
            redirect('dashboard/profile');
}
function user(){

$data['sm_user'] = $this->model_berita->data_user();
$data['data_anak'] = $this->model_berita->data_anak();
 $this->load->view('template_a');
   $this->load->view('config/laporanpengguna', $data);
}


function tambah_jadwal(){

        $id_anak = $this->input->post('id_anak');
        $jam_mulai = $this->input->post('jam_mulai');
        $jam_selesai = $this->input->post('jam_selesai');
        $hari = $this->input->post('hari');
        $jenis_terapi = $this->input->post('jenis_terapi');
         
        
        $data = array(

            'id_anak' => $id_anak,
            'jam_mulai' => $jam_mulai,
            'jam_selesai' => $jam_selesai,
            'hari' => $hari,
            'jenis_terapi' => $jenis_terapi,
        
            );
        $this->model_berita->post_user($data,'jw_terapis');
        $this->session->set_flashdata('msg',
             '
             <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times; &nbsp;</span>
                </button>
                <strong>Sukses!</strong> Jadwal berhasil Di Tambah.
             </div>'
           );
        redirect('dashboard/jadwal_terapis');
    }

function post_bidang(){

        $nama_lengkap = $this->input->post('nama_lengkap');
        
           $nama_panggilan          = htmlentities(strip_tags($_POST['nama_panggilan']));
              $tempat_lahir            = htmlentities(strip_tags($_POST['tempat_lahir']));
            $jenis_kelamin            = htmlentities(strip_tags($_POST['jenis_kelamin']));

             $data = array('nama_lengkap' => $nama_lengkap,
          'nama_panggilan' => $nama_panggilan,
          'tempat_lahir' => $tempat_lahir,'jenis_kelamin' => $jenis_kelamin);

        $this->session->set_flashdata('msg',
             '
             <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times; &nbsp;</span>
                </button>
                <strong>Sukses!</strong>Data Anak berhasil Di Tambah.
             </div>'
           );
        $this->model_berita->post_user($data,'t_ankterapi');

        redirect('dashboard/anak_terapis');
    }


    }

