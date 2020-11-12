<?php
class Profile extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    belumlogin();
    $this->load->library('form_validation');
    $this->load->model("admin/Profile_Model");
  }

  public function index()
  {
    $data['judul'] = 'My Profile';
    $data['admin'] = $this->db->get_where('karyawan', ['email' => $this->session->userdata('email')])->row_array();
    $email = $this->session->userdata('email');
    $data['kategori'] = $this->Profile_Model->get_bagian($email);
    // var_dump($data['kategori']);
    $this->load->view('admin/templates/header', $data);
    $this->load->view('admin/templates/sidebar', $data);
    $this->load->view('admin/Profile', $data);
    $this->load->view('admin/templates/footer');
  }

  public function edit_password()
  {
    $data['judul'] = "Edit Password";
    $data['admin'] = $this->db->get_where('karyawan', ['email' => $this->session->userdata('email')])->row_array();
    $email = $this->session->userdata('email');
    $data['kategori'] = $this->Profile_Model->get_bagian($email);
    

    $this->form_validation->set_rules('passwordlama', 'Password Lama', 'required|trim');
    $this->form_validation->set_rules('passwordbaru', 'Password Baru', 'required|trim');
    $this->form_validation->set_rules('konfirmasipassword', 'Konfirmasi Password', 'required|trim');

      if ($this->form_validation->run() == FALSE) {
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger text-center alert-dismissible fade show" role="alert">
              Gagal Merubah Password
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              </div>');
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar', $data);
        $this->load->view('admin/Profile', $data);
        $this->load->view('admin/templates/footer');
      } else {
        $cekpassword = $this->db->get_where('karyawan', ['email' => $this->session->userdata('email')])->row_array();
        $password = $this->input->POST('passwordlama');
        $passwordbaru = $this->input->POST('passwordbaru');
        $konfirmasipassword = $this->input->POST('konfirmasipassword');
        if (password_verify($password, $cekpassword['password'])) {
          if ($password !== $passwordbaru) {
            if ($passwordbaru == $konfirmasipassword) {
              $ubahpassword = password_hash($konfirmasipassword, PASSWORD_DEFAULT);
              $this->db->set('password', $ubahpassword);
              $this->db->where('email', $cekpassword['email']);
              $this->db->update('karyawan');
              $this->session->set_flashdata('pesan', '<div class="alert alert-danger text-center alert-dismissible fade show" role="alert">
                      Gagal Berhasil Diubah
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                      </button>
                      </div>');
              redirect('admin/Profile');
            } else {
              $this->session->set_flashdata('pesan', '<div class="alert alert-danger text-center alert-dismissible fade show" role="alert">
                      Konfirmasi Password Salah
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                      </button>
                      </div>');
              redirect('admin/Profile');
            }
          } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger text-center alert-dismissible fade show" role="alert">
            Password Sudah Digunakan
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
             redirect('admin/Profile');
          }
        } else {
          $this->session->set_flassdata('pesan', '<div class="alert alert-danger text-center alert-dismissible fade show" role="alert">
          Password salah
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
          </div>');
          redirect('admin/Profile');
        }
      }
  }
}
