<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->database();
    }

    public function add_nilai_sertifikat(){
        $id = $this->input->post("id");
        $nilai = $this->input->post("nilai");

        if($nilai != ""){
            $this->Admin_model->edit_data("kelas_user", ["id" => $id], ["nilai" => $nilai, "sertifikat" => 1]);
            return 1;
        } else {
            $this->Admin_model->edit_data("kelas_user", ["id" => $id], ["nilai" => $nilai, "sertifikat" => 0]);
            return 0;
        }
    }

}

/* End of file Kelas_model.php */
