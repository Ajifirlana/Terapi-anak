<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_anak extends CI_Controller {

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
    $this->load->view('v_login_anak');
  }

  function aksi_login(){
    $nama_lengkap = $this->input->post('username'); 
    $password = md5($this->input->post('password')); 

    $user = $this->m_login->get_anak($nama_lengkap); 

    if(empty($user)){ 
      $this->session->set_flashdata('msg',
                     '
                     <div class="alert alert-success alert-dismissible" role="alert">
                      
                        <strong>Username Tidak Ditemukan!</strong>
                     </div>'
                   );
     redirect('login_anak'); 
    }else{
      if($password == $user->password){

        $session = array(
          'authenticated'=>true,
          'nama_lengkap'=>$user->nama_lengkap,
          'id_anak'=>$user->id_anak, 
          'id_user'=>$user->id_user
        );

          $this->session->set_userdata($session); 
          $this->session->set_flashdata('msg',
                     '
                     <div class="alert alert-success alert-dismissible" role="alert">
                      
                        <strong>Selamat Datang</strong>
                     </div>');

        redirect('dashboard_anak');
        
      }else{
       
         $this->session->set_flashdata('msg',
                     '
                     <div class="alert alert-success alert-dismissible" role="alert">
                      
                        <strong> Password Yang Anda Masukkan Salah!</strong>
                     </div>'
                   );
   redirect('login_anak'); 
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