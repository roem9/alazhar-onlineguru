<?php
class Tarkibi2 extends CI_CONTROLLER{
    public function __construct(){
        parent::__construct();
        $this->load->model('Arab_model');
        $this->load->model('Admin_model');
        $this->load->model('Tarkibi2_model');
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
                $data['kelas'][$i]['peserta'] = COUNT($this->Admin_model->get_all("kelas_user", ["id_kelas" => $kelas['id_kelas']]));
            }
        // kelas & program

        $this->load->view("templates/header-user", $data);
        $this->load->view("kelas/index", $data);
        $this->load->view("templates/footer-user", $data);
    }

    public function koreksi($id){
        $data_latihan = $this->Admin_model->get_one("latihan_isian_peserta", ["md5(id)" => $id]);
        $data['peserta'] = $this->Admin_model->get_one("user", ["id_user" => $data_latihan['id_user']]);
        $data['data_latihan'] = $data_latihan;
        $data['data_latihan']['jawaban'] = explode("###", $data_latihan['jawaban']);
        $data['data_latihan']['pembahasan'] = explode("###", $data_latihan['pembahasan']);

        // if($data_latihan['pertemuan'] == "Pertemuan 1"){
        $page = "tarkibi_2/tugas/".str_replace(" ", "", strtolower($data_latihan['pertemuan']));
        // } 

        $data['title'] = "Koreksi Tugas ".$data_latihan['pertemuan'];

        $this->load->view("templates/header-user", $data);
        $this->load->view($page, $data);
        $this->load->view("templates/footer-user", $data);
    }

    public function tugas($id){
        $data['kelas'] = $this->Admin_model->get_one("kelas", ["md5(id_kelas)" => $id]);
        $data['peserta'] = COUNT($this->Admin_model->get_all("kelas_user", ["md5(id_kelas)" => $id, "hapus" => 0]));
        $data['materi'] = COUNT($this->Admin_model->get_all("materi_kelas", ["md5(id_kelas)" => $id]));
        $data['title'] = "List Tugas Peserta";

        $list = $this->Admin_model->get_all("latihan_isian_peserta", ["md5(id_kelas)" => $id, "periksa" => 2]);
        $data['list'] = [];
        foreach ($list as $i => $list) {
            $data['list'][$i] = $list;
            $peserta = $this->Admin_model->get_one("user", ["id_user" => $list['id_user']]);
            $data['list'][$i]['peserta'] = $peserta;
        }

        $this->load->view("templates/header-user", $data);
        $this->load->view("tarkibi_2/koreksi-latihan", $data);
        $this->load->view("templates/footer-user", $data);
    }

    public function ajax_tugas(){
        $id = $this->session->userdata("id_civitas");
        $id_kelas = $this->input->post("id_kelas");

        $data = [];
        $data['list'] = [];
        
        $list = $this->Admin_model->get_all("latihan_isian_peserta", ["id_kelas" => $id_kelas, "periksa" => 2]);
        foreach ($list as $i => $list) {
            $data['list'][$i] = $list;
            $data['list'][$i]['id_md5'] = md5($list['id']);
            $peserta = $this->Admin_model->get_one("user", ["id_user" => $list['id_user']]);
            $data['list'][$i]['peserta'] = $peserta;
        }

        echo json_encode($data);
    }

    public function ajax_list(){
        $id = $this->session->userdata("id_civitas");
        $data = [];
        $kelas = $this->Admin_model->get_all("kelas", ["id_civitas" => $id, "status" => "aktif"]);
        foreach ($kelas as $i => $kelas) {
            $data['kelas'][$i] = $kelas;
            $data['kelas'][$i]['peserta'] = COUNT($this->Admin_model->get_all("kelas_user", ["id_kelas" => $kelas['id_kelas']]));
            $data['kelas'][$i]['pertemuan'] = COUNT($this->Admin_model->get_all("materi_kelas", ["id_kelas" => $kelas['id_kelas']]));
            $data['kelas'][$i]['link'] = md5($kelas['id_kelas']);
        }

        echo json_encode($data);
    }
    
    public function ajax_one(){
        $id_kelas = $this->input->post("id_kelas");
        $data = [];
        // $kelas = $this->Admin_model->get_one("kelas", ["MD5(id_kelas)" => $id_kelas]);
        // foreach ($kelas as $i => $kelas) {
            $data['kelas'] = $this->Admin_model->get_one("kelas", ["MD5(id_kelas)" => $id_kelas]);
            $data['kelas']['peserta'] = COUNT($this->Admin_model->get_all("kelas_user", ["MD5(id_kelas)" => $id_kelas]));
            $data['kelas']['pertemuan'] = $this->Admin_model->get_all("materi_kelas", ["MD5(id_kelas)" => $id_kelas], "id");
            $data['kelas']['link'] = $id_kelas;
            $data['faq'] = $this->Admin_model->get_all("faq", ["program" => $data['kelas']['program']]);

            $data['peserta'] = [];
            $peserta = $this->Admin_model->get_all("kelas_user", ["md5(id_kelas)" => $id_kelas]);
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

    public function kelas($id_kelas){
        $data['kelas'] = $this->Admin_model->get_one("kelas", ["MD5(id_kelas)" => $id_kelas]);
        $data['title'] = $data['kelas']['nama_kelas'];
        $data['link'] = $id_kelas;

        $this->load->view("templates/header-user", $data);
        $this->load->view("kelas/detail-tarkibi2", $data);
        $this->load->view("templates/footer-user", $data);
    }

    public function ajax_detail(){
        $id_kelas = $this->input->post('id_kelas');
        $peserta = $this->Admin_model->get_all("kelas_user", ["md5(id_kelas)" => $id_kelas]);
        foreach ($peserta as $i => $peserta) {
            $data['peserta'][$i] = $this->Admin_model->get_one("user", ["id_user" => $peserta['id_user']]);
        }

        echo json_encode($data);
    }

    public function ajax_pertemuan(){
        $link_member = $this->Admin_model->get_one("option", ["field" => "link_member"]);
        $id_kelas = $this->input->post("id_kelas");
        $pertemuan = $this->input->post("pertemuan");

        $data['absen'] = [];

        $kelas = $this->Admin_model->get_one("kelas", ["md5(id_kelas)" => $id_kelas]);
        $listpeserta = $this->Admin_model->get_all("kelas_user", ["md5(id_kelas)" => $id_kelas]);
        foreach ($listpeserta as $i => $peserta) {
            $hadir = $this->Admin_model->get_one("presensi_peserta", ["md5(id_kelas)" => $id_kelas, "id_user" => $peserta['id_user'], "pertemuan" => $pertemuan]);
            if(!isset($hadir)){
                $detail = $this->Admin_model->get_one("user", ["id_user" => $peserta['id_user']]);
                $data['absen'][$i] = $detail;
                $data['absen'][$i]['pesan'] = "https://wa.me/62".substr($detail['no_hp'], 1)."?text=*ABSEN*%F0%9F%91%87%0A%0A*tanbih*%0Akak%20".str_replace(" ", "%20", $detail['nama'])."%20belum%20mengisi%20kehadiran%20di%20kelas%20".str_replace("#", "%23", str_replace(" ", "%20", $kelas['nama_kelas']))."%20".str_replace(" ", "%20", $pertemuan)."%2C%20silahkan%20segera%20mengisi%20kehadiran%20kakak%20melalui%20member%20area%20pada%20link%20".$link_member['value'];
            }
        }

        usort($data['absen'], function($a, $b) {
            return $a['nama'] <=> $b['nama'];
        });

        $data['latihan'] = [];
        $i = 0;
        foreach ($listpeserta as $peserta) {
            unset($nilai);
            if($pertemuan == "Pertemuan 7"){
                $nilai = 0;
            } else {
                $harian = $this->Admin_model->get_one("latihan_peserta", ["md5(id_kelas)" => $id_kelas, "id_user" => $peserta['id_user'], "pertemuan" => $pertemuan, "nilai !=" => 0]);
                if($harian) {
                    $nilai = $harian['nilai'];
                } else {
                    $harian = $this->Admin_model->get_one("latihan_isian_peserta", ["md5(id_kelas)" => $id_kelas, "id_user" => $peserta['id_user'], "pertemuan" => $pertemuan, "nilai !=" => 0]);
                    if($harian) {
                        $nilai = $harian['nilai'];
                    }
                }
            }

            if(!isset($nilai)){
                $detail = $this->Admin_model->get_one("user", ["id_user" => $peserta['id_user']]);
                $data['latihan'][$i] = $detail;

                $data['latihan'][$i]['pesan'] = "https://wa.me/62".substr($detail['no_hp'], 1)."?text=*Tugas%2Flatihan*%0A%0A*Tanbih*%0Akk%20".str_replace(" ", "%20", $detail['nama'])."%20belum%20mengerjakan%20latihan%20di%20kelas%20".str_replace("#", "%23", str_replace(" ", "%20", $kelas['nama_kelas']))."%20".str_replace(" ", "%20", $pertemuan).". silahkan%20untuk%20segera%20dikerjakan%20ya%20kak%F0%9F%98%8A";

                $i++;
            }
        }
        
        usort($data['latihan'], function($a, $b) {
            return $a['nama'] <=> $b['nama'];
        });

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
        public function get_detail_kelas(){
            $id = $this->input->post("id");
            $data = $this->Admin_model->get_one("kelas", ["id_kelas" => $id]);
            
            // $data['pertemuan'] = $this->Admin_model->get_all("materi_kelas", ["id_kelas" => $id]);
            $data['jumpeserta'] = COUNT($this->Admin_model->get_all("kelas_user", ["id_kelas" => $id]));
            $per = $this->Admin_model->get_all("materi_kelas", ["id_kelas" => $id]);
            foreach ($per as $i => $per) {
                $data['pertemuan'][$i] = $per;
                $data['pertemuan'][$i]['hadir'] = $this->Admin_model->get_all("presensi_peserta", ["id_kelas" => $id, "pertemuan" => $per['materi']]);
            }

            $data['absen'] = $this->Admin_model->get_all("materi_kelas", ["id_kelas" => $id, "absen" => 0]);
            $peserta = $this->Admin_model->get_all("kelas_user", ["id_kelas" => $id]);
            foreach ($peserta as $i => $peserta) {
                $data['peserta'][$i] = $this->Admin_model->get_one("user", ["id_user" => $peserta['id_user']]);
            }

            $data['ujian'] = $this->Admin_model->get_all("ujian_kelas", ["id_kelas" => $id]);

            echo json_encode($data);
        }

        
        public function get_detail_peserta(){
            $id_user = $this->input->post("id");
            $id = $this->input->post("id_kelas");
            $kelas = $this->Admin_model->get_one("kelas", ["id_kelas" => $id]);
            $data['peserta'] = $this->Admin_model->get_one("user", ["id_user" => $id_user]);
            
            $data['pertemuan'] = $this->Admin_model->get_all("materi_kelas", ["id_kelas" => $id], "id");

            // nilai tugas harian 
                foreach ($data['pertemuan'] as $i => $pertemuan) {
                    $data['nilai'][$i]['pertemuan'] = $pertemuan['materi'];
                    $nilai = $this->Admin_model->get_one("latihan_peserta", ["id_kelas" => $id, "id_user" => $id_user, "pertemuan" => $pertemuan['materi'], "latihan" => "Form"]);
                    if($nilai) {
                        $data['nilai'][$i]['nilai'] = $nilai['nilai'];
                    } else {
                        $nilai = $this->Admin_model->get_one("latihan_isian_peserta", ["id_kelas" => $id, "id_user" => $id_user, "pertemuan" => $pertemuan['materi']]);
                        if($nilai) {
                            $data['nilai'][$i]['nilai'] = $nilai['nilai'];
                        } else {
                            $data['nilai'][$i]['nilai'] = 0;
                        }
                    }
                }
            // nilai tugas harian 

            // nilai review
                $nilai = $this->Admin_model->get_one("latihan_peserta", ["id_kelas" => $id, "id_user" => $id_user, "pertemuan" => "Review 1", "latihan" => "Review"]);
                if($nilai){$data['review'][0] = $nilai['nilai'];} else {$data['review'][0] = 0;};
                $nilai = $this->Admin_model->get_one("latihan_peserta", ["id_kelas" => $id, "id_user" => $id_user, "pertemuan" => "Review 2", "latihan" => "Review"]);
                if($nilai){$data['review'][1] = $nilai['nilai'];} else {$data['review'][1] = 0;};
                $nilai = $this->Admin_model->get_one("latihan_peserta", ["id_kelas" => $id, "id_user" => $id_user, "pertemuan" => "Review 3", "latihan" => "Review"]);
                if($nilai){$data['review'][2] = $nilai['nilai'];} else {$data['review'][2] = 0;};
                $nilai = $this->Admin_model->get_one("latihan_peserta", ["id_kelas" => $id, "id_user" => $id_user, "pertemuan" => "Review 4", "latihan" => "Review"]);
                if($nilai){$data['review'][3] = $nilai['nilai'];} else {$data['review'][3] = 0;};
            // nilai review

            $data['absen'] = $this->Admin_model->get_all("presensi_peserta", ["id_kelas" => $id, "id_user" => $id_user]);
            echo json_encode($data);
        }

        public function get_nilai(){
            $id_kelas = $this->input->post("id_kelas");
            $data_pertemuan = $this->input->post("pertemuan");
            $data_pertemuan = explode("|", $data_pertemuan);

            $pertemuan = $data_pertemuan[1];

            $peserta = $this->Admin_model->get_all("kelas_user", ["md5(id_kelas)" => $id_kelas]);
            foreach ($peserta as $i => $peserta) {
                $data['peserta'][$i] = $this->Admin_model->get_one("user", ["id_user" => $peserta['id_user']]);
                
                $nilai = $this->Admin_model->get_one("latihan_peserta", ["md5(id_kelas)" => $id_kelas, "id_user" => $peserta['id_user'], "pertemuan" => $pertemuan, "latihan" => "Review"]);
                if(!$nilai) {
                    $nilai = $this->Admin_model->get_one("latihan_isian_peserta", ["md5(id_kelas)" => $id_kelas, "id_user" => $peserta['id_user'], "pertemuan" => $pertemuan]);
                }

                if($nilai){
                    $data['peserta'][$i]['id_nilai'] = $nilai['id'];
                    $data['peserta'][$i]['nilai'] = $nilai['nilai'];
                } else {
                    $data['peserta'][$i]['id_nilai'] = "-";
                    $data['peserta'][$i]['nilai'] = 0;
                }
            }

            usort($data['peserta'], function($a, $b) {
                return $a['nama'] <=> $b['nama'];
            });

            echo json_encode($data);
        }

        public function get_sertifikat(){
            $id_kelas = $this->input->post("id_kelas");

            $data['kelas'] = $this->Admin_model->get_one("kelas", ["id_kelas" => $id_kelas]);
            $data['peserta'] = [];
            $peserta = $this->Admin_model->get_all("kelas_user", ["id_kelas" => $id_kelas]);
            foreach ($peserta as $i => $peserta) {
                $data['peserta'][$i] = $this->Admin_model->get_one("user", ["id_user" => $peserta['id_user']]);
                $data['peserta'][$i]['sertifikat'] = $peserta['sertifikat'];
                $data['peserta'][$i]['id_sertifikat'] = $peserta['id'];
                $data['peserta'][$i]['nilai'] = $this->nilai_sertifikat($id_kelas, $peserta['id_user']);
            }

            usort($data['peserta'], function($a, $b) {
                return $a['nama'] <=> $b['nama'];
            });

            echo json_encode($data);
        }

        public function get_list_koreksi_latihan(){
            $data = $this->Tarkibi2_model->get_list_koreksi_latihan();
            echo json_encode($data);
        }

        public function get_tugas_by_name(){
            $nama = $this->input->post("nama");
            $id_kelas = $this->input->post("id_kelas");

            $where = "id_user in (select id_user from latihan_isian_peserta WHERE id_kelas = $id_kelas)";
            $peserta = $this->Admin_model->get_all_like("user", "nama", $nama, $where);

            $id = [];
            foreach ($peserta as $j => $peserta) {
                $id[] = $peserta['id_user'];
            }
            
            $data['list'] = [];
            
            $list = $this->Admin_model->get_all_where_in("latihan_isian_peserta", ["id_kelas" => $id_kelas, "periksa" => 1], ["id_user" => $id], "pertemuan");
            foreach ($list as $i => $list) {
                $data['list'][$i] = $list;
                $data['list'][$i]['id_md5'] = md5($list['id']);
                $peserta = $this->Admin_model->get_one("user", ["id_user" => $list['id_user']]);
                $data['list'][$i]['peserta'] = $peserta;
            }

            echo json_encode($data);

            // echo json_encode($id);
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
            $data = $this->Admin_model->get_one("kelas_user", ["id" => $id_sertifikat]);
            $this->Admin_model->edit_data("kelas_user", ["id" => $id_sertifikat], ["sertifikat" => "1"]);
            echo json_encode($data['id_kelas']);
        }
        
        public function delete_sertifikat(){
            $id_sertifikat = $this->input->post("id_sertifikat");
            $data = $this->Admin_model->get_one("kelas_user", ["id" => $id_sertifikat]);
            $this->Admin_model->edit_data("kelas_user", ["id" => $id_sertifikat], ["sertifikat" => "0"]);
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
        
        public function add_nilai_isian(){
            $id = $this->input->post("id");
            $nilai = $this->input->post("nilai");
            $this->Admin_model->edit_data("latihan_isian_peserta", ["id" => $id], ["nilai" => $nilai, "periksa" => 1]);

            $data = $this->Admin_model->get_one("latihan_isian_peserta", ["id" => $id]);
            redirect(base_url().'tarkibi2/tugas/'.md5($data['id_kelas']), 'refresh');
        }

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

        public function input_nilai(){
            $id_kelas =  $this->input->post("id_kelas");

            $data_pertemuan = $this->input->post("pertemuan");
            $data_pertemuan = explode("|", $data_pertemuan);

            $tipe =  $data_pertemuan[0];
            $pertemuan =  $data_pertemuan[1];

            $data =  $this->input->post("data");

            $kelas = $this->Admin_model->get_one("kelas", ["md5(id_kelas)" => $id_kelas]);

            if($tipe == 2){
                foreach ($data as $i => $peserta) {
                    $split = explode("|", $peserta[0]);
                    if($split[1] == "-"){
                        $data = [
                            "id_kelas" => $kelas['id_kelas'],
                            "id_user" => $split[0],
                            "pertemuan" => $pertemuan,
                            "latihan" => "Review",
                            "nilai" => $peserta[1]
                        ];
    
                        $this->Admin_model->add_data("latihan_peserta", $data);
                    } else {
                        $data = [
                            "nilai" => $peserta[1]
                        ];
    
                        $this->Admin_model->edit_data("latihan_peserta", ["id" => $split[1]], $data);
                    }
                }
            } else {
                foreach ($data as $i => $peserta) {
                    $split = explode("|", $peserta[0]);

                    $index_pertemuan = str_replace("Pertemuan ", "", $pertemuan);
                    switch ($index_pertemuan) {
                        case 1:
                            $text = "###############";
                            break;
                        case 2:
                            $text = "######################################################################################################################################################";
                            break;
                        case 4:
                            $text = "#################################################################################";
                            break;
                        case 5:
                            $text = "############################################################################################################################################################################################################################################################";
                            break;
                        case 8:
                            $text = "#################################";
                            break;
                        case 9:
                            $text = "##############################";
                            break;
                        case 10:
                            $text = "###############";
                            break;
                        case 11:
                            $text = "##############################";
                            break;
                        case 12:
                            $text = "##############################";
                            break;
                        case 13:
                            $text = "###########################################################################";
                            break;
                        case 14:
                            $text = "##############################";
                            break;
                        case 15:
                            $text = "###############";
                            break;
                        case 16:
                            $text = "###############";
                            break;
                        case 17:
                            $text = "###############";
                            break;
                        case 18:
                            $text = "###############";
                            break;
                        case 19:
                            $text = "###############";
                            break;
                        case 20:
                            $text = "##############################";
                            break;
                            
                        // default:
                        //     $text = "-";
                    }

                    if($split[1] == "-"){
                        $data = [
                            "id_kelas" => $kelas['id_kelas'],
                            "id_user" => $split[0],
                            "pertemuan" => $pertemuan,
                            "nilai" => $peserta[1],
                            "jawaban" => $text,
                            "pembahasan" => $text,
                            "periksa" => 1
                        ];
    
                        $this->Admin_model->add_data("latihan_isian_peserta", $data);
                    } else {
                        $data = [
                            "nilai" => $peserta[1],
                            "periksa" => 1
                        ];
    
                        $this->Admin_model->edit_data("latihan_isian_peserta", ["id" => $split[1]], $data);
                    }
                }
            }

            echo json_encode("1");
        }

        public function add_latihan_pembahasan(){
            $data = $this->Tarkibi2_model->add_latihan_pembahasan();
            echo json_encode("1");
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

    public function rekap_nilai($id_kelas){
        $kelas = $this->Admin_model->get_one("kelas", ["md5(id_kelas)" => $id_kelas]);
        $data['kelas'] = $kelas;

        
        // $filename = "Rekap Nilai Kelas " . $kelas['nama_kelas'];

        // header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
        // header('Content-Disposition: attachment;filename="'.$filename.'.xls"');

        $peserta = $this->Admin_model->get_all("kelas_user", ["id_kelas" => $kelas['id_kelas'], "hapus" => 0]);
        $data['peserta'] = [];
        foreach ($peserta as $i => $peserta) {
            $data_peserta = $this->Admin_model->get_one("user", ["id_user" => $peserta['id_user']]);
            $data['peserta'][$i]['data'] = $data_peserta;
            
            $data_absen = $this->Admin_model->get_all("presensi_peserta", ["id_user" => $peserta['id_user'], "id_kelas" => $peserta['id_kelas']]);
            $data['peserta'][$i]['absen'] = $data_absen;

            $data_nilai_harian = $this->Admin_model->get_all("latihan_peserta", ["id_kelas" => $peserta['id_kelas'], "id_user" => $peserta['id_user'], "latihan" => "Form"]);
            $data['peserta'][$i]['nilai_harian'] = [];
            $index = 0;
            foreach ($data_nilai_harian as $harian) {
                $data['peserta'][$i]['nilai_harian'][$index] = $harian;
                $data['peserta'][$i]['nilai_harian'][$index]['index'] = str_replace("Pertemuan ", "", $harian['pertemuan']);
                $index++;
            }

            $data_nilai_harian = $this->Admin_model->get_all("latihan_isian_peserta", ["id_kelas" => $peserta['id_kelas'], "id_user" => $peserta['id_user']]);
            foreach ($data_nilai_harian as $harian) {
                $data['peserta'][$i]['nilai_harian'][$index] = $harian;
                $data['peserta'][$i]['nilai_harian'][$index]['index'] = str_replace("Pertemuan ", "", $harian['pertemuan']);
                $index++;
            }

            usort($data['peserta'][$i]['nilai_harian'], function($a, $b) {
                return $a['index'] <=> $b['index'];
            });

            // nilai review
                $nilai = $this->Admin_model->get_one("latihan_peserta", ["id_kelas" => $kelas['id_kelas'], "id_user" => $peserta['id_user'], "pertemuan" => "Review 1", "latihan" => "Review"]);
                if($nilai){$data['peserta'][$i]['review'][0] = $nilai['nilai'];} else {$data['peserta'][$i]['review'][0] = 0;};
                $nilai = $this->Admin_model->get_one("latihan_peserta", ["id_kelas" => $kelas['id_kelas'], "id_user" => $peserta['id_user'], "pertemuan" => "Review 2", "latihan" => "Review"]);
                if($nilai){$data['peserta'][$i]['review'][1] = $nilai['nilai'];} else {$data['peserta'][$i]['review'][1] = 0;};
                $nilai = $this->Admin_model->get_one("latihan_peserta", ["id_kelas" => $kelas['id_kelas'], "id_user" => $peserta['id_user'], "pertemuan" => "Review 3", "latihan" => "Review"]);
                if($nilai){$data['peserta'][$i]['review'][2] = $nilai['nilai'];} else {$data['peserta'][$i]['review'][2] = 0;};
                $nilai = $this->Admin_model->get_one("latihan_peserta", ["id_kelas" => $kelas['id_kelas'], "id_user" => $peserta['id_user'], "pertemuan" => "Review 4", "latihan" => "Review"]);
                if($nilai){$data['peserta'][$i]['review'][3] = $nilai['nilai'];} else {$data['peserta'][$i]['review'][3] = 0;};
            // nilai review
        }

        usort($data['peserta'], function($a, $b) {
            return $a['data']['nama'] <=> $b['data']['nama'];
        });

        // var_dump($data);
        $this->load->view("tarkibi_2/rekap-nilai", $data);
    }
}