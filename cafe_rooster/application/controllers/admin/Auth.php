<?php
class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        sudahlogin();
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view("admin/login");
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $email    = $this->input->post('email');
        $password = $this->input->post('password');
        $user = $this->db->get_where('karyawan', ['email' => $email]) -> row_array();
        if ($user) {
            if ($user['password'] == md5($password)) {
                $data  = [
                    'nama_karyawan' => $user['nama_karyawan'],
                    'email' => $user['email']

                ];
                $this->session->set_userdata($data);
                redirect('admin/Dashboard');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Email atau Password salah!</div>');
                redirect('admin/Auth');
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Akun belum terdaftar! Silahkan hubungi pihak Admin.</div>');
            redirect('admin/Auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('nama_karyawan');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Anda berhasil logout! Silahkan login untuk melanjutkan.</div>');
        redirect('admin/Auth');
    }
}
