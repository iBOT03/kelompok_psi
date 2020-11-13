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
      $data['karyawan'] = $this->Profile_Model->get_bagian($email);
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
      $data['karyawan'] = $this->Profile_Model->get_bagian($email);
  
      $this->form_validation->set_rules('passwordlama', 'Password Lama', 'required|trim|min_length[5]', [
          'required' => 'kolom ini harus diisi',
          'min_length' => 'password terlalu pendek'
      ]);
      
      $this->form_validation->set_rules('passwordbaru', 'Password Baru', 'required|trim|matches[konfirmasipassword]|min_length[5]', [
          'required' => 'kolom ini harus diisi',
          'min_length' => 'password terlalu pendek',
          'matches' => ''
      ]);
  
      $this->form_validation->set_rules('konfirmasipassword', 'Konfirmasi Password', 'required|trim|matches[passwordbaru]|min_length[5]', [
          'required' => 'kolom ini harus diisi',
          'min_length' => 'password terlalu pendek',
          'matches' => 'konfirmasi password salah'
      ]);
  
      if ($this->form_validation->run() == false) {
          $this->load->view('admin/templates/header', $data);
          $this->load->view('admin/templates/sidebar', $data);
          $this->load->view('admin/profile', $data);
          $this->load->view('admin/templates/footer');
      }else {
        $passwordlama = $this->input->post(htmlspecialchars('passwordlama'));
        $konfirmasipassword = $this->input->post(htmlspecialchars('konfirmasipassword'));
  
        if (!password_verify($passwordlama, $data['karyawan']['password'])) {
          $this->session->set_flashdata('pesan', '<div class="alert alert-danger text-center alert-dismissible fade show" role="alert">
          Password Salah
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
          </div>');
          redirect('admin/Profile');
        }else {
          if ($passwordlama == $konfirmasipassword) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger text-center alert-dismissible fade show" role="alert">
            password tidak boleh sama
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('admin/Profile');
        }else {
          $cekpass = password_hash($konfirmasipassword, PASSWORD_DEFAULT);
          $this->Profile_Model->edit_pass($cekpass, $email);
          $this->session->set_flashdata('pesan', '<div class="alert alert-success text-center alert-dismissible fade show" role="alert">
          password berhasil Dirubah
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
          </div>');
          redirect('admin/Profile');
        }
      }
    }
  }
}
?>