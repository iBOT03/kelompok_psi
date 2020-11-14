<?php
class Administrator extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("admin/Karyawan_Model");
        belumlogin();
    }

    public function index()
    {
        $data["karyawan"] = $this->Karyawan_Model->getKaryawan();
        $data["karyawan"] = $this->Karyawan_Model->index();
        $data['admin'] = $this->db->get_where('karyawan', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('admin/templates/sidebar', $data);
        $this->load->view("admin/administrator/administrator", $data);
    }

    public function tambah()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim|max_length[100]');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[karyawan.email]');
        $this->form_validation->set_rules('posisi', 'Posisi', 'required');
        $this->form_validation->set_rules('no_telpon', 'No Telepon ', 'required|trim|max_length[13]|numeric');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('foto', 'Foto', 'trim');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|max_length[100]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Kofirmasi Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data["karyawan"] = $this->Karyawan_Model->getBagian();
            $data['admin'] = $this->db->get_where('karyawan', ['email' => $this->session->userdata('email')])->row_array();
            $this->load->view('admin/templates/sidebar', $data);
            $this->load->view("admin/administrator/tambahadministrator", $data);
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
                    'id_karyawan'           => '',
                    'id_bagian'             => $this->input->post("posisi"),
                    'email'                 => $this->input->post("email"),
                    'password'              => password_hash('karyawan', PASSWORD_DEFAULT),
                    'nama_karyawan'         => $this->input->post("nama"),
                    'alamat_karyawan'       => $this->input->post("alamat"),
                    'no_telepon_karyawan'   => $this->input->post("no_telpon"),
                    'foto'                  => trim($foto)
                );
                if ($this->Karyawan_Model->addKaryawan($dataPost)) {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
					Berhasil Menambahkan Akun!
				    </div>');
                    redirect('admin/administrator');
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
					Gagal Menambahkan Akun!
					</div>');
                    redirect('admin/administrator');
                }
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">'
                    . $this->upload->display_errors() .
                    '</div>');
                redirect('admin/administrator');
            }
        }
    }

    public function edit($id = null)
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim|max_length[100]');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('posisi', 'Posisi', 'required');
        $this->form_validation->set_rules('no_telpon', 'No Telepon ', 'required|trim|max_length[13]|numeric');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('foto', 'Foto', 'trim');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[5]|max_length[100]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Kofirmasi Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data["bagian"] = $this->Karyawan_Model->detail($id);
            $data["row"] = $this->Karyawan_Model->getBagKar($id);
            $data["data"] = $this->Karyawan_Model->getDetail($id);
            $data['admin'] = $this->db->get_where('karyawan', ['email' => $this->session->userdata('email')])->row_array();
            $this->load->view('admin/templates/sidebar', $data);
            $this->load->view("admin/administrator/editadministrator", $data);
        } else {
            $update = $this->Karyawan_Model->upKaryawan(array(
                'id_karyawan'           => $this->input->post("id"),
                'id_bagian'             => $this->input->post("posisi"),
                'email'                 => $this->input->post("email"),
                'password'              => password_hash('karyawan', PASSWORD_DEFAULT),
                'nama_karyawan'         => $this->input->post("nama"),
                'alamat_karyawan'       => $this->input->post("alamat"),
                'no_telepon_karyawan'   => $this->input->post("no_telpon")
            ), $id);

            if ($update) {
                $ubahfoto = $_FILES['foto']['name'];

                if ($ubahfoto) {
                    $config['allowed_types'] = 'jpg|png|gif|jpeg|pdf';
                    $config['max_size'] = '2048';
                    $config['upload_path'] = './uploads/foto/';
                    $config['file_name'] = $ubahfoto;

                    $this->load->library('upload', $config);

                    if ($this->upload->do_upload('foto')) {
                        $user = $this->db->get_where('karyawan', ['id_karyawan' => $id])->row_array();
                        $fotolama = $user['foto'];
                        if ($fotolama) {
                            unlink(FCPATH . '.uploads/foto/' . $fotolama);
                        }
                        $fotobaru = $this->upload->data('file_name');
                        $this->db->set('foto', $fotobaru);
                        $this->db->where('id_karyawan', $id);
                        $this->db->update('karyawan');
                    } else {
                        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">'
                            . $this->upload->display_errors() .
                            '</div>');
                        redirect('admin/administrator');
                    }
                }
                $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
				Data Berhasil Diubah
				</div>');
                redirect('admin/administrator');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                Data Gagal Di Ubah
                </div>');
                redirect('admin/administrator');
            }
        }
    }

    public function hapus($id = null)
    {
        $hapus = $this->Karyawan_Model->delKaryawan($id);
        if ($hapus) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
				Berhasil Menghapus Akun!
			  </div>');
            redirect('admin/administrator');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
			Gagal Menghapus Akun!
		  </div>');
            redirect('admin/administrator');
        }
    }
}
