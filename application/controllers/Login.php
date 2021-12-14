<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->helper('tglindo_helper');
       $this->load->helper('cleanurl_helper');
    $this->load->model('m_login');
    $this->load->model('model_berita');
    $this->load->library('pagination','form_validation');
    $this->load->helper(array('url','html','text'));
  }

  public function index()
  {
    $this->load->view('template_a'); 
    $this->load->view('v_login');
  }

  function aksi_login(){
    $nama_user = $this->input->post('username'); 
    $password = md5($this->input->post('password')); 

    $user = $this->m_login->get($nama_user); 

    if(empty($user)){ 
      $this->session->set_flashdata('msg',
                     '
                     <div class="alert alert-success alert-dismissible" role="alert">
                      
                        <strong>Username Tidak Ditemukan!</strong>
                     </div>'
                   );
     redirect('login'); 
    }else{
      if($password == $user->password){

        $session = array(
          'authenticated'=>true,
          'username'=>$user->nama_user,
          'id_user'=>$user->id_user,
            'id'=>$user->id,
          'hak_akses'=>$user->hak_akses
        );

        if($user->hak_akses == 'admin' ){
          $this->session->set_userdata($session); $this->session->set_flashdata('msg',
                     '
                     <div class="alert alert-success alert-dismissible" role="alert">
                      
                        <strong>Selamat Datang Admin!</strong>
                     </div>'
                   );
        redirect('dashboard');
        }elseif($user->hak_akses == 'orang_tua'){
          $this->session->set_userdata($session); 
          $this->session->set_flashdata('msg',
                     '
                     <div class="alert alert-success alert-dismissible" role="alert">
                      
                        <strong>Selamat Datang</strong>
                     </div>');
        redirect('dashboard/orangtua');
        }elseif($user->hak_akses == 'guru'){
          //$this->session->set_userdata($session); 
          $this->session->set_flashdata('msg',
                     '
                     <div class="alert alert-success alert-dismissible" role="alert">
                      
                        <strong>SEDANG MAINTENANCE</strong>
                     </div>');
        redirect('login');
        }
      }else{
       
         $this->session->set_flashdata('msg',
                     '
                     <div class="alert alert-success alert-dismissible" role="alert">
                      
                        <strong> Password Yang Anda Masukkan Salah!</strong>
                     </div>'
                   );
   redirect('login'); 
      }
    }
}

function logout(){
    $this->session->sess_destroy(); 
         redirect('login'); 
   }

}

/* AJ3 */
/* ColorlIb*/