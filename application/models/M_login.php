<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {

	public function get($nama_user){
        $this->db->where('nama_user', $nama_user); 
        $result = $this->db->get('t_admin')->row(); 
        return $result;
    }

    public function get_anak($nama_lengkap){
        $this->db->where('nama_lengkap', $nama_lengkap); 
        $result = $this->db->get('t_ankterapi')->row(); 
        return $result;
    }
	

}