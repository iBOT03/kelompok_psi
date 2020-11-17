<?php
class Profile extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    belumlogin();
    $this->load->library('form_validation');
    $this->load->model("admin/Profile_Model");
    $this->load->library('upload');
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

  public function edit_profile()
  {
    echo "TEST";
    $data['judul'] = 'Edit Profile';
    $data['admin'] = $this->db->get_where('karyawan', ['email' => $this->session->userdata('email')])->row_array();
    $email = $this->session->userdata('email');
    $data['karyawan'] = $this->Profile_Model->get_bagian($email);

    $this->form_validation->set_rules('namakaryawan', 'Nama Lengkap', 'required|trim');
    $this->form_validation->set_rules('nohpkaryawan', 'no HP', 'required|trim');
    $this->form_validation->set_rules('alamatkaryawan', 'Alamat Karyawan', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->load->view('admin/templates/header', $data);
      $this->load->view('admin/templates/sidebar', $data);
      $this->load->view('admin/profile', $data);
      $this->load->view('admin/templates/footer');
    } else {
      $nama = $this->input->post('namakaryawan');
      $nohp = $this->input->post('nohpkaryawan');
      $alamat = $this->input->post('alamatkaryawan');
      $array = [
        'nama_karyawan' => $nama,
        'no_telepon_karyawan' => $nohp,
        'alamat_karyawan' => $alamat
      ];

      $ubahfoto = $_FILES['foto']['name'];
      if ($ubahfoto) {
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '2048';
        $config['upload_path'] = './uploads/foto/';
        $config['file_name'] = $ubahfoto;

        $this->upload->initialize($config);

        if ($this->upload->do_upload('foto')) {
          $fotolama = $data['admin']['foto'];
          if ($fotolama != 'default.jpg') {
            unlink(FCPATH . 'uploads/foto/' . $fotolama);
          }
          $fotobaru = $this->upload->data('file_name');
          $this->db->set('foto', $fotobaru);
          $this->db->where('email', $email);
          $this->db->update('karyawan');

          $this->session->set_flashdata('pesan', '<div class="alert alert-success text-center alert-dismissible fade show" role="alert">Profile Berhasil Diubah.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
          </div>');
          redirect('admin/profile');
        } else {
          $this->session->set_flashdata('pesan', '<div class="alert text-center alert-danger alert-dismissible fade show" role="alert">' . $this->upload->display_errors() . '
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
          redirect('admin/profile');
        }
      } else {
        $this->db->set($array);
        $this->db->where('email', $email);
        $this->db->update('karyawan');

        $this->session->set_flashdata('pesan', '<div class="alert alert-success text-center alert-dismissible fade show" role="alert">Profile Berhasil Diubah.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
          </div>');
        redirect('admin/profile');
      }
    }
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
    } else {
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
      } else {
        if ($passwordlama == $konfirmasipassword) {
          $this->session->set_flashdata('pesan', '<div class="alert alert-danger text-center alert-dismissible fade show" role="alert">
            password tidak boleh sama
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
          redirect('admin/Profile');
        } else {
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
