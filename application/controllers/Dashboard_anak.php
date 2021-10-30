<?php 

class Dashboard_anak extends CI_Controller{

	function __construct(){
		parent::__construct();	
$this->load->model('m_login');
$this->load->model('model_berita');
$this->load->library('pagination');
$this->load->helper(array('url','html','file','form','download'));

 if( ! $this->session->userdata('id_anak')) 
            redirect('login'); 

	}

				


    public function index()
    {

            $data['sm_berita'] = $this->model_berita->jadwal_saya();
            $data['izin_saya'] = $this->model_berita->jadwal_izin_saya();
        $this->load->view('dashboard_anak',$data);
    }


    }

