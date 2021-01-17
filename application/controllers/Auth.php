<?php
    class Auth extends CI_CONTROLLER{
        public function __construct(){
            parent::__construct();
            $this->load->model('Admin_model');
            $this->load->helper(array('Form', 'Cookie', 'String'));
        }

        public function index(){
            // ambil cookie
            $cookie = get_cookie('guru');
            // cek session
            if ($this->session->userdata('id_civitas')) {
                redirect("kelas");
            } else if($cookie <> '') {
                // cek cookie
                $row = $this->Admin_model->get_one("civitas", ["cookie" => $cookie]);

                if ($row) {
                    $this->_daftarkan_session($row);
                } else {
                    $data['header'] = 'Login';
                    $data['title'] = 'Login';
                    $this->load->view("templates/header-login", $data);
                    $this->load->view("login/login");
                    $this->load->view("templates/footer");
                }
            } else {
                $data['header'] = 'Login';
                $data['title'] = 'Login';
                $this->load->view("templates/header-login", $data);
                $this->load->view("login/login");
                $this->load->view("templates/footer");
            }
        }

        public function login(){
            $username = $this->input->post('username');
            $password = $this->input->post("password", TRUE);
            $remember = $this->input->post('remember');
            $row = $this->Admin_model->get_one("civitas", ["username" => $username, "password" => md5($password)]);
            
            if(!$row){
                $password = substr($password, 4, 4)."-".substr($password, 2, 2)."-".substr($password, 0, 2);
                $row = $this->Admin_model->get_one("civitas", ["username" => $username, "tgl_lahir" => $password]);
            }

            if ($row) {
                // login berhasil
                // 1. Buat Cookies jika remember di check
                if ($remember) {
                    $key = random_string('alnum', 64);
                    set_cookie('guru', $key, 3600*24*30); // set expired 30 hari kedepan
                    // simpan key di database
                    
                    $this->Admin_model->edit_data("civitas", ["id_civitas" => $row['id_civitas']], ["cookie" => $key]);
                }
                $this->_daftarkan_session($row);
            } else {
                // login gagal
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><i class="fa fa-times-circle text-danger mr-1"></i>Maaf, kombinasi username dan password salah<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('auth');
            }
        }

        public function _daftarkan_session($row) {
            // 1. Daftarkan Session
            $sess = array(
                'logged' => TRUE,
                'id_civitas' => $row['id_civitas'],
            );
            $this->session->set_userdata($sess);
            // 2. Redirect ke home
            redirect("kelas");
        }

        public function logout(){
            // delete cookie dan session
            delete_cookie('guru');
            $this->session->sess_destroy();
            redirect('auth');
        }
    }