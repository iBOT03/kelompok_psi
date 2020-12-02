<?php

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // Ubelumlogin();
    }

    public function index(){
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        if($this->form_validation->run() === false){
            $this->load->view('user/auth/login_page');
        }else{
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
						'email' => $user['email'],
						'nama' => $user['nama_pembeli']
					];
					$this->session->set_userdata($data);
					redirect('Home');
				} else {
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
					password salah!
		  			</div>');
					redirect('auth');
				}
			
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
			Email belum terdaftar!
		  	</div>');
			redirect('auth');
		}
	}

    public function ForgotPassword(){
        $this->form_validation->set_rules('email', 'Email', 'required|trim|is_unique[pembeli.email]|valid_email');
        if($this->form_validation->run() === false){
            $this->load->view('user/auth/forgotpw');
        }else{
        $email = $this->input->post('email');
		//cek apakah email terdaftar
        $userMail = $this->db->get_where('pembeli', ['email' => $email])->row_array();
        if ($userMail) {
            //cek apakah email ada
            $data = [
                'email' => $userMail['email']
            ];
            $this->session->set_flashdata('pesan', '<div class="alert alert-info" role="alert">
            Ini passwordnya
            </div>');
            redirect('auth/ForgotPassword');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
            Email Tidak Terdaftar
            </div>');
            redirect('auth/ForgotPassword');
        }
    }
    }
    public function Register(){
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
        if($this->form_validation->run() === false){
            $this->load->view('user/auth/register');
        }else{
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
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('nama_pembeli');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Anda berhasil logout! Silahkan login untuk melanjutkan.</div>');
        redirect('/Auth');
    }
}