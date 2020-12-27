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
        $user = $this->db->get_where('karyawan', ['email' => $email])->row_array();
        if ($user) {
            if ($user['status'] == 1) {
                if (password_verify($password, $user['password'])) {
                    $data  = [
                        'nama_karyawan' => $user['nama_karyawan'],
                        'email' => $user['email'],
                        'id_bagian' => $user['id_bagian'],
                        'id_karyawan' => $user['id_karyawan']

                    ];
                    $this->session->set_userdata($data);
                    redirect('admin/Dashboard');
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Password salah!</div>');
                    redirect('admin/Auth');
                }
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Akun telah di no-Aktifkan! Apabila anda merasa ini sebuah kesalahan, silahkan hubungi pihak Admin.</div>');
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
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('id_bagian');
        $this->session->unset_userdata('id_karyawan');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Anda berhasil logout! Silahkan login untuk melanjutkan.</div>');
        redirect('admin/Auth');
    }
}
