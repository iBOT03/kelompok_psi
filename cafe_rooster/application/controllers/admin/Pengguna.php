<?php
class Pengguna extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("admin/Pengguna_Model");
        belumlogin();
    }

    public function index()
    {
        $data["pengguna"] = $this->Pengguna_Model->getPengguna();
        $data['admin'] = $this->db->get_where('karyawan', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('admin/templates/sidebar', $data);
        $this->load->view("admin/pengguna/pengguna", $data);
    }

    public function tambah()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim|max_length[100]');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[karyawan.email]');
        $this->form_validation->set_rules('no_telpon', 'No Telepon ', 'required|trim|max_length[13]|numeric');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('foto', 'Foto', 'trim');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|max_length[100]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Kofirmasi Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['admin'] = $this->db->get_where('karyawan', ['email' => $this->session->userdata('email')])->row_array();
            $this->load->view('admin/templates/sidebar', $data);
            $this->load->view("admin/pengguna/tambahpengguna");
        } else {
            $temp = explode(".", $_FILES['foto']['name']);
            $foto = round(microtime(true)) . '.' . end($temp);
            move_uploaded_file($_FILES['foto']['profil'], "./uploads/foto/" . $foto);
            $config['allowed_types'] = 'jpg|png|gif|jpeg|svg|pdf';
            $config['max_size'] = '2048';
            $config['upload_path'] = './uploads/foto/';
            $config['file_name'] = $foto;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto')) {
                $dataPost = array(
                    'id_pembeli'           => '',
                    'email'                 => $this->input->post("email"),
                    'password'              => md5($this->input->post("password1")),
                    'nama_pembeli'         => $this->input->post("nama"),
                    'alamat_pembeli'       => $this->input->post("alamat"),
                    'no_telepon_pembeli'   => $this->input->post("no_telpon"),
                    'foto'                  => trim($foto)
                );
                if ($this->Pengguna_Model->addPengguna($dataPost)) {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
					Berhasil Menambahkan Akun!
				    </div>');
                    redirect('admin/pengguna');
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
					Gagal Menambahkan Akun!
					</div>');
                    redirect('admin/pengguna');
                }
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">'
                    . $this->upload->display_errors() .
                    '</div>');
                redirect('admin/pengguna');
            }
        }
    }
}
