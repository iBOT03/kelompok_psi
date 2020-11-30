<?php

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // Ubelumlogin();
    }

    public function index(){
        $this->load->view('user/auth/login_page');
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
                'email' => $this->input->post('nama'), 
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
}