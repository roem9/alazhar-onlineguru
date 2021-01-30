<?php
class Kelas extends CI_CONTROLLER{
    public function __construct(){
        parent::__construct();
        $this->load->model('Arab_model');
        $this->load->model('Admin_model');
        $this->load->model('Kelas_model');
        if(!$this->session->userdata('id_civitas')){
            $this->session->set_flashdata('login', 'Maaf, Anda harus login terlebih dahulu');
			redirect(base_url("auth"));
		}
    }

    public function input(){
        $peserta = $this->Admin_model->get_all("kelas_user", ["id_kelas" => "1"]);
        foreach ($peserta as $peserta) {
            for ($i=1; $i < 25; $i++) { 
                $pertemuan = "Pertemuan ".$i;
                $data = [
                    "id_kelas" => 1,
                    "id_user" => $peserta['id_user'],
                    "pertemuan" => $pertemuan,
                    "latihan" => "Harian",
                    "nilai" => rand(50,100),
                ];

                $this->Admin_model->add_data("latihan_peserta", $data);
            }
            
            for ($i=1; $i < 25; $i++) { 
                $pertemuan = "Pertemuan ".$i;
                $data = [
                    "id_kelas" => 1,
                    "id_user" => $peserta['id_user'],
                    "pertemuan" => $pertemuan,
                    "latihan" => "Hafalan",
                    "nilai" => rand(50,100),
                ];

                $this->Admin_model->add_data("latihan_peserta", $data);
            }
            
            for ($i=1; $i < 25; $i++) { 
                $pertemuan = "Pertemuan ".$i;
                $data = [
                    "id_kelas" => 1,
                    "id_user" => $peserta['id_user'],
                    "pertemuan" => $pertemuan,
                    "latihan" => "Tambahan",
                    "nilai" => rand(50,100),
                ];

                $this->Admin_model->add_data("latihan_peserta", $data);
            }
            
            for ($i=1; $i < 5; $i++) { 
                $pertemuan = "Ujian Pekan ".$i;
                $data = [
                    "id_kelas" => 1,
                    "id_user" => $peserta['id_user'],
                    "pertemuan" => $pertemuan,
                    "latihan" => "Form",
                    "nilai" => rand(50,100),
                ];

                $this->Admin_model->add_data("latihan_peserta", $data);
            }
            
            for ($i=1; $i < 5; $i++) { 
                $pertemuan = "Ujian Pekan ".$i;
                $data = [
                    "id_kelas" => 1,
                    "id_user" => $peserta['id_user'],
                    "pertemuan" => $pertemuan,
                    "latihan" => "Input",
                    "nilai" => rand(50,100),
                ];

                $this->Admin_model->add_data("latihan_peserta", $data);
            }

            
            $data = [
                "id_kelas" => 1,
                "id_user" => $peserta['id_user'],
                "pertemuan" => "Ujian Pertengahan",
                "latihan" => "Input",
                "nilai" => rand(50,100),
            ];

            $this->Admin_model->add_data("latihan_peserta", $data);
            
            $data = [
                "id_kelas" => 1,
                "id_user" => $peserta['id_user'],
                "pertemuan" => "Ujian Akhir",
                "latihan" => "Form",
                "nilai" => rand(50,100),
            ];

            $this->Admin_model->add_data("latihan_peserta", $data);
            
            $data = [
                "id_kelas" => 1,
                "id_user" => $peserta['id_user'],
                "pertemuan" => "Ujian Akhir",
                "latihan" => "Input",
                "nilai" => rand(50,100),
            ];

            $this->Admin_model->add_data("latihan_peserta", $data);
        }

        echo "sukses";
    }

    public function index(){
        $id = $this->session->userdata("id_civitas");
        $data['title'] = "List Kelas";
        
        // kelas & program
            $data['kelas'] = [];
            $kelas = $this->Admin_model->get_all("kelas", ["id_civitas" => $id]);
            foreach ($kelas as $i => $kelas) {
                $data['kelas'][$i] = $kelas;
                $data['kelas'][$i]['peserta'] = COUNT($this->Admin_model->get_all("kelas_user", ["id_kelas" => $kelas['id_kelas'], "hapus" => 0]));
            }
        // kelas & program

        $this->load->view("templates/header-user", $data);
        $this->load->view("kelas/index", $data);
        $this->load->view("templates/footer-user", $data);
    }

    public function ajax_list(){
        $id = $this->session->userdata("id_civitas");
        $data = [];
        $kelas = $this->Admin_model->get_all("kelas", ["id_civitas" => $id]);
        foreach ($kelas as $i => $kelas) {
            $data['kelas'][$i] = $kelas;
            $data['kelas'][$i]['peserta'] = COUNT($this->Admin_model->get_all("kelas_user", ["id_kelas" => $kelas['id_kelas'], "hapus" => 0]));
            $data['kelas'][$i]['pertemuan'] = COUNT($this->Admin_model->get_all("materi_kelas", ["id_kelas" => $kelas['id_kelas']]));
            $link = strtolower(str_replace(" ", "", $data['kelas'][$i]['program']));
            $data['kelas'][$i]['link'] = $link."/kelas/".md5($kelas['id_kelas']);
        }

        echo json_encode($data);
    }
    
    public function ajax_one(){
        $id_kelas = $this->input->post("id_kelas");
        $data = [];
        // $kelas = $this->Admin_model->get_one("kelas", ["MD5(id_kelas)" => $id_kelas]);
        // foreach ($kelas as $i => $kelas) {
            $data['kelas'] = $this->Admin_model->get_one("kelas", ["MD5(id_kelas)" => $id_kelas]);
            $data['kelas']['peserta'] = COUNT($this->Admin_model->get_all("kelas_user", ["MD5(id_kelas)" => $id_kelas, "hapus" => 0]));
            $data['kelas']['pertemuan'] = $this->Admin_model->get_all("materi_kelas", ["MD5(id_kelas)" => $id_kelas], "id");
            $data['kelas']['link'] = $id_kelas;
            $data['faq'] = $this->Admin_model->get_all("faq", ["program" => $data['kelas']['program']]);

            $data['peserta'] = [];
            $peserta = $this->Admin_model->get_all("kelas_user", ["md5(id_kelas)" => $id_kelas, "hapus" => 0]);
            foreach ($peserta as $i => $peserta) {
                $detail = $this->Admin_model->get_one("user", ["id_user" => $peserta['id_user']]);
                $data['peserta'][$i] = $detail;
            }
            
            usort($data['peserta'], function($a, $b) {
                return $a['nama'] <=> $b['nama'];
            });
        // }

        echo json_encode($data);
    }

    public function detail($id_kelas){
        $data['kelas'] = $this->Admin_model->get_one("kelas", ["MD5(id_kelas)" => $id_kelas]);
        $data['title'] = $data['kelas']['nama_kelas'];
        $data['link'] = $id_kelas;

        $this->load->view("templates/header-user", $data);
        $this->load->view("kelas/detail", $data);
        $this->load->view("templates/footer-user", $data);
    }

    public function ajax_detail(){
        $id_kelas = $this->input->post('id_kelas');
        $peserta = $this->Admin_model->get_all("kelas_user", ["md5(id_kelas)" => $id_kelas, "hapus" => 0]);
        foreach ($peserta as $i => $peserta) {
            $data['peserta'][$i] = $this->Admin_model->get_one("user", ["id_user" => $peserta['id_user']]);
        }

        echo json_encode($data);
    }

    // edit 
        public function list_pertemuan(){
            $id = $this->input->post("id_kelas");
            $pert = $this->input->post("pertemuan");
            
            // delete list
                $this->Admin_model->delete_data("materi_kelas", ["id_kelas" => $id]);
            // delete list

            if($pert){
                foreach ($pert as $pert) {
                    $data = [
                        "materi" => $pert,
                        "id_kelas" => $id
                    ];

                    $this->Admin_model->add_data("materi_kelas", $data);
                }
            }

            echo json_encode("1");
        }
        
        public function on_absen(){
            $data = [
                "id_kelas" => $this->input->post("id_kelas"),
                "materi" => $this->input->post("pertemuan"),
            ];
            $this->Admin_model->edit_data("materi_kelas", $data, ["absen" => 1]);
            echo json_encode($data['id_kelas']);
        }
        
        public function off_absen(){
            $data = [
                "id_kelas" => $this->input->post("id_kelas"),
                "materi" => $this->input->post("pertemuan"),
            ];
            $this->Admin_model->edit_data("materi_kelas", $data, ["absen" => 0]);
            echo json_encode($data['id_kelas']);
        }
    // edit 

    // get 
        public function get_sertifikat(){
            $id_kelas = $this->input->post("id_kelas");

            $data['kelas'] = $this->Admin_model->get_one("kelas", ["id_kelas" => $id_kelas]);
            $data['peserta'] = [];
            $peserta = $this->Admin_model->get_all("kelas_user", ["id_kelas" => $id_kelas, "hapus" => 0]);
            foreach ($peserta as $i => $peserta) {
                $data['peserta'][$i] = $this->Admin_model->get_one("user", ["id_user" => $peserta['id_user']]);
                $data['peserta'][$i]['sertifikat'] = $peserta['sertifikat'];
                $data['peserta'][$i]['id_sertifikat'] = $peserta['id'];
                // $data['peserta'][$i]['nilai'] = $this->nilai_sertifikat($id_kelas, $peserta['id_user']);
                $data['peserta'][$i]['nilai'] = $peserta['nilai'];
            }

            usort($data['peserta'], function($a, $b) {
                return $a['nama'] <=> $b['nama'];
            });

            echo json_encode($data);
        }
    // get 

    // nilai syahadah 
        public function nilai_sertifikat($id_kelas, $id_user){
            // nilai form harian
                $nilai_harian_form = 0;
                $nilai = $this->Admin_model->get_all("latihan_peserta", ["id_kelas" => $id_kelas, "id_user" => $id_user, "latihan" => "Harian"]);
                foreach ($nilai as $nilai) {
                    $nilai_harian_form += $nilai['nilai'];
                }

                $data['nilai_harian_form'] = ($nilai_harian_form / 24) * 0.1;
            // nilai form harian
            
            // nilai hafalan harian
                $nilai_harian_hafalan = 0;
                $nilai = $this->Admin_model->get_all("latihan_peserta", ["id_kelas" => $id_kelas, "id_user" => $id_user, "latihan" => "Hafalan"]);
                foreach ($nilai as $nilai) {
                    $nilai_harian_hafalan += $nilai['nilai'];
                }

                $data['nilai_harian_hafalan'] = ($nilai_harian_hafalan / 24) * 0.3;
            // nilai hafalan harian
            
            // nilai tambahan harian
                $nilai_harian_tambahan = 0;
                $nilai = $this->Admin_model->get_all("latihan_peserta", ["id_kelas" => $id_kelas, "id_user" => $id_user, "latihan" => "Tambahan"]);
                foreach ($nilai as $nilai) {
                    $nilai_harian_tambahan += $nilai['nilai'];
                }

                $data['nilai_harian_tambahan'] = ($nilai_harian_tambahan / 24) * 0.1;
            // nilai tambahan harian

            // nilai ujian pekanan
                $nilai_ujian_pekanan = 0;
                $nilai = $this->Admin_model->get_one("latihan_peserta", ["id_kelas" => $id_kelas, "id_user" => $id_user, "pertemuan" => "Ujian Pekan 1", "latihan" => "Form"]);
                if($nilai) $nilai_ujian_pekanan += $nilai['nilai'];
                $nilai = $this->Admin_model->get_one("latihan_peserta", ["id_kelas" => $id_kelas, "id_user" => $id_user, "pertemuan" => "Ujian Pekan 2", "latihan" => "Form"]);
                if($nilai) $nilai_ujian_pekanan += $nilai['nilai'];
                $nilai = $this->Admin_model->get_one("latihan_peserta", ["id_kelas" => $id_kelas, "id_user" => $id_user, "pertemuan" => "Ujian Pekan 3", "latihan" => "Form"]);
                if($nilai) $nilai_ujian_pekanan += $nilai['nilai'];
                $nilai = $this->Admin_model->get_one("latihan_peserta", ["id_kelas" => $id_kelas, "id_user" => $id_user, "pertemuan" => "Ujian Pekan 4", "latihan" => "Form"]);
                if($nilai) $nilai_ujian_pekanan += $nilai['nilai'];
                $nilai = $this->Admin_model->get_one("latihan_peserta", ["id_kelas" => $id_kelas, "id_user" => $id_user, "pertemuan" => "Ujian Pekan 1", "latihan" => "Input"]);
                if($nilai) $nilai_ujian_pekanan += $nilai['nilai'];
                $nilai = $this->Admin_model->get_one("latihan_peserta", ["id_kelas" => $id_kelas, "id_user" => $id_user, "pertemuan" => "Ujian Pekan 2", "latihan" => "Input"]);
                if($nilai) $nilai_ujian_pekanan += $nilai['nilai'];
                $nilai = $this->Admin_model->get_one("latihan_peserta", ["id_kelas" => $id_kelas, "id_user" => $id_user, "pertemuan" => "Ujian Pekan 3", "latihan" => "Input"]);
                if($nilai) $nilai_ujian_pekanan += $nilai['nilai'];
                $nilai = $this->Admin_model->get_one("latihan_peserta", ["id_kelas" => $id_kelas, "id_user" => $id_user, "pertemuan" => "Ujian Pekan 4", "latihan" => "Input"]);
                if($nilai) $nilai_ujian_pekanan += $nilai['nilai'];

                $data['nilai_ujian_pekanan'] = ($nilai_ujian_pekanan / 8) * 0.2;
            // nilai ujian pekanan

            // nilai ujian pertengahan
                $nilai_ujian_pertengahan = 0;
                $nilai = $this->Admin_model->get_one("latihan_peserta", ["id_kelas" => $id_kelas, "id_user" => $id_user, "pertemuan" => "Ujian Pertengahan", "latihan" => "Input"]);
                if($nilai) $nilai_ujian_pertengahan += $nilai['nilai']; 

                $data['nilai_ujian_pertengahan'] = ($nilai_ujian_pertengahan / 1) * 0.15;
            // nilai ujian pertengahan
            
            // nilai ujian akhir
                $nilai_ujian_akhir = 0;
                $nilai = $this->Admin_model->get_one("latihan_peserta", ["id_kelas" => $id_kelas, "id_user" => $id_user, "pertemuan" => "Ujian Akhir", "latihan" => "Form"]);
                if($nilai) $nilai_ujian_akhir += $nilai['nilai'];
                $nilai = $this->Admin_model->get_one("latihan_peserta", ["id_kelas" => $id_kelas, "id_user" => $id_user, "pertemuan" => "Ujian Akhir", "latihan" => "Input"]);
                if($nilai) $nilai_ujian_akhir += $nilai['nilai'];

                $data['nilai_ujian_akhir'] = ($nilai_ujian_akhir / 2) * 0.15;
            // nilai ujian akhir
            $data['nilai'] = $data['nilai_harian_form'] + $data['nilai_harian_hafalan'] + $data['nilai_harian_tambahan'] + $data['nilai_ujian_pekanan'] + $data['nilai_ujian_pertengahan'] + $data['nilai_ujian_akhir'];

            if($data['nilai'] >= 80 && $data['nilai'] <= 100) $data['nilai'] = "ممتاز";
            else if($data['nilai'] >= 60 && $data['nilai'] < 80) $data['nilai'] = "جيد جدا";
            else if($data['nilai'] >= 40 && $data['nilai'] < 60) $data['nilai'] = "جيد";
            else if($data['nilai'] >= 20 && $data['nilai'] < 40) $data['nilai'] = "ناقص";
            else if($data['nilai'] >= 0 && $data['nilai'] < 20) $data['nilai'] = "فاشل";

            return $data['nilai'];
        }

    // sertifikat 
        public function add_sertifikat(){
            $id_sertifikat = $this->input->post("id_sertifikat");
            $data_sertifikat = $this->Admin_model->get_one("kelas_user", ["id" => $id_sertifikat]);
            $nilai = $this->nilai_sertifikat($data_sertifikat['id_kelas'], $data_sertifikat['id_user']);
            $data = $this->Admin_model->get_one("kelas_user", ["id" => $id_sertifikat]);
            $this->Admin_model->edit_data("kelas_user", ["id" => $id_sertifikat], ["sertifikat" => "1", "nilai" => $nilai]);
            echo json_encode($data['id_kelas']);
        }
        
        public function delete_sertifikat(){
            $id_sertifikat = $this->input->post("id_sertifikat");
            $data = $this->Admin_model->get_one("kelas_user", ["id" => $id_sertifikat]);
            $this->Admin_model->edit_data("kelas_user", ["id" => $id_sertifikat], ["sertifikat" => "0", "nilai" => ""]);
            echo json_encode($data['id_kelas']);
        }
    // sertifikat 

    // faq 
        public function get_faq(){
            $id = $this->input->post("id");
            $data = $this->Admin_model->get_one("faq", ["id" => $id]);

            echo json_encode($data);
        }

        public function delete_faq(){
            $id = $this->input->post("id");
            $data['kelas'] = $this->Admin_model->get_one("faq", ["id" => $id]);
            $this->Admin_model->delete_data("faq", ["id" => $id]);

            echo json_encode($data);
        }

        public function edit_faq(){
            $id = $this->input->post("id");
            $soal = $this->input->post("soal");
            $jawaban = $this->input->post("jawaban");

            $data = [
                "soal" => $soal,
                "jawaban" => $jawaban
            ];

            $this->Admin_model->edit_data("faq", ["id" => $id], $data);
            echo json_encode("1");
        }

        public function add_faq(){
            $id_kelas = $this->input->post("id_kelas");
            $soal = $this->input->post("soal");
            $jawaban = $this->input->post("jawaban");
            $kelas = $this->Admin_model->get_one("kelas", ["id_kelas" => $id_kelas]);

            $data = [
                "id_kelas" => $id_kelas,
                "soal" => $soal,
                "jawaban" => $jawaban,
                "program" => $kelas['program']
            ];

            $cek = $this->Admin_model->get_one("faq", $data);
            $this->Admin_model->add_data("faq", $data);
            echo json_encode("1");
        }

        public function search_faq(){
            $search = $this->input->post("search");
            $program = $this->input->post("program");
            $data['faq'] = [];
            if($search != ""){
                $data['faq'] = $this->Admin_model->get_all_like("faq", "soal", $search, ["program" => $program]);
            } else {
                $data['faq'] = $this->Admin_model->get_all("faq", ["program" => $program]);
            }
            echo json_encode($data);
        }
    // faq 

    // add 
        public function add_pertemuan(){
            $data = [
                "id_kelas" => $this->input->post("id_kelas"),
                "materi" => $this->input->post("pertemuan"),
            ];
            $cek = $this->Admin_model->get_one("materi_kelas", $data);
            if(!$cek) $this->Admin_model->add_data("materi_kelas", $data);
            echo json_encode($data['id_kelas']);
        }
         

        public function add_ujian(){
            $data = [
                "id_kelas" => $this->input->post("id_kelas"),
                "materi" => $this->input->post("pertemuan"),
            ];
            $cek = $this->Admin_model->get_one("ujian_kelas", $data);
            if(!$cek) $this->Admin_model->add_data("ujian_kelas", $data);
            echo json_encode($data['id_kelas']);
        }

        public function add_nilai_sertifikat(){
            $data = $this->Kelas_model->add_nilai_sertifikat();
            echo json_encode($data);
        }
    // add 

    // delete 
        public function delete_pertemuan(){
            $data = [
                "id_kelas" => $this->input->post("id_kelas"),
                "materi" => $this->input->post("pertemuan"),
            ];
            $this->Admin_model->delete_data("materi_kelas", $data);
            
            $data = [
                "id_kelas" => $this->input->post("id_kelas"),
                "pertemuan" => $this->input->post("pertemuan"),
            ];
            $this->Admin_model->delete_data("presensi_peserta", $data);
            echo json_encode($data['id_kelas']);
        }
         
        public function delete_ujian(){
            $data = [
                "id_kelas" => $this->input->post("id_kelas"),
                "materi" => $this->input->post("pertemuan"),
            ];
            $this->Admin_model->delete_data("ujian_kelas", $data);
            echo json_encode($data['id_kelas']);
        }
    // delete 
}