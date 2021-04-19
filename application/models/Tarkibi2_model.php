<?php
class Tarkibi2_model extends CI_MODEL{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
    }
    
    public function get_list_koreksi_latihan($id_kelas){
        // $id_kelas = $this->input->post("id_kelas");
        $list = $this->Admin_model->get_all("latihan_isian_peserta", ["md5(id_kelas)" => $id_kelas, "periksa" => 0]);
        $data = [];
        foreach ($list as $i => $list) {
            $data['list'][$i] = $list;
            $data['list'][$i]['peserta'] = $this->Admin_model->get_one("user", ["id_user" => $list['id_user']]);
            $data['list'][$i]['link'] = md5($list['id']);
        }

        return $data;
    }

    // public function get_koreksi($id){

    //     $data['latihan'] = $this->Admin_model->get_one("latihan_isian_peserta", ["md5(id)" => $id]);
    //     $data['data_latihan']['jawaban'] = explode("###", $data['latihan']['jawaban']);
    //     $data['data_latihan']['pembahasan'] = explode("###", $data['latihan']['pembahasan']);
    //     $data['page'] = "tarkibi_2/tugas/".strtolower(str_replace(" ", "",$data['latihan']['pertemuan']));

    //     return $data;
    // }

    public function add_latihan_pembahasan(){
        $id_kelas = $this->input->post("id_kelas");
        $pertemuan = $this->input->post("pertemuan");
        $text = $this->input->post("text");
        $id_latihan = $this->input->post("id_latihan");
        // $id_user = $this->session->userdata('id_user');

        // $cek = $this->Admin_model->get_one("latihan_isian_peserta", ["id_kelas" => $id_kelas, "id_user" => $id_user, "pertemuan" => $pertemuan]);
        // if(!$cek){
        //     $data = [
        //         "id_kelas" => $id_kelas,
        //         "pertemuan" => $pertemuan,
        //         "pembahasan" => $text,
        //         "id_user" => $id_user,
        //     ];
            
        //     $this->Admin_model->add_data("latihan_isian_peserta", $data);
        // } else {
            $data = [
                "id_kelas" => $id_kelas,
                "pertemuan" => $pertemuan,
                "pembahasan" => $text,
                // "id_user" => $id_user,
            ];
            
            $this->Admin_model->edit_data("latihan_isian_peserta", ["id" => $id_latihan, "pertemuan" => $pertemuan], $data);
        // }

        return 1;
    }
}