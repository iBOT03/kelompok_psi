<?php

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
         //Ubelumlogin();
    }

    public function index()
    {
        //Usudahlogin();
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        if ($this->form_validation->run() === false) {
            $data['menu'] = $this->db->get('menu')->result_array();
            $data['judul'] = "Welcome to Cafe Rooster Probolinggo";
            $data['user'] = $this->db->get_where('pembeli', ['email' => $this->session->userdata('email')])->row_array();
            $this->load->view('user/templates/header.php', $data);
            $this->load->view('user/home/home.php', $data);
            $this->load->view('user/templates/footer.php');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        //cek apakah user terdaftar
        $user = $this->db->get_where('pembeli', ['email' => $email])->row_array();
        if ($user) {
            //cek apakah password yang dimasukan benar
            if (password_verify($password, $user['password'])) {
                $data = [
                    'id_pembeli' => $user['id_pembeli'],
                    'nama' => $user['nama_pembeli'],
                    'alamat' => $user['alamat_pembeli'],
                    'nohp' => $user['no_telepon_pembeli'],
                    'foto' => $user['foto'],
                    'email' => $user['email']
                ];
                $this->session->set_userdata($data);
                $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
					Hi, '.$user['nama_pembeli'].'. Selamat datang di cafe rooster!
		  			</div>');
                redirect('Home');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
					Password email yang anda masukan salah!
		  			</div>');
                redirect('home');
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
			Email belum terdaftar!
		  	</div>');
            redirect('home');
        }
    }

    public function ForgotPassword()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|trim|is_unique[pembeli.email]|valid_email');
        if ($this->form_validation->run() === false) {
            $this->load->view('user/auth/forgotpw');
        } else {
            $email = $this->input->post('email');
            //cek email di db
            $data = $this->db->get('pembeli')->result_array();
            if ($email == $data['email']) {
                $dt = rand(10);
                $this->db->query("update pembeli SET password ='$dt' where email='" . $email . "'");
                $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            Password baru anda <b>'.$dt.' </b>
            </div>');
                redirect('auth/ForgotPassword');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
            Email Tidak Terdaftar <b> Okedah bos</b>
            </div>');
                redirect('auth/ForgotPassword');
            }
        }
    }
    public function Register()
    {
        // $nama = $this->input->post('nama');
        // $alamat = $this->input->post('alamat');
        // $nohp = $this->input->post('nohp');
        // $email = $this->input->post('email');
        // $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('nohp', 'No Telepon', 'required|trim|integer');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|is_unique[pembeli.email]|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]');
        $this->form_validation->set_rules('passwordk', 'Konfirmasi Password', 'required|trim|matches[password]');
        if ($this->form_validation->run() === false) {
            // $this->load->view('user/home/home');
            // redirect(base_url());



            $data['menu'] = $this->db->get('menu')->result_array();
            $data['judul'] = "Welcome to Cafe Rooster Probolinggo";
            // $this->load->view('user/templates/header', $data);
            $data['user'] = $this->db->get_where('pembeli', ['email' => $this->session->userdata('email')])->row_array();
            $this->load->view('user/templates/header.php', $data);
            $this->load->view('user/home/home', $data);
            $this->load->view('user/templates/footer');
        } else {
            $data = [
                'email' => $this->input->post('email'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'nama_pembeli' => $this->input->post('nama'),
                'alamat_pembeli' => $this->input->post('alamat'),
                'no_telepon_pembeli' => $this->input->post('nohp'),
                'foto' => 'default.jpg'
            ];

            $this->db->insert('pembeli', $data);

            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
			Register Success, Please Login!
		  	</div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('id_pembeli');
        $this->session->unset_userdata('nama_pembeli');
        $this->session->unset_userdata('email');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Anda berhasil logout! Silahkan login untuk melanjutkan.</div>');
        redirect('/Auth');
    }
}
