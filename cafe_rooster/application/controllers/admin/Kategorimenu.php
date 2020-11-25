<?php
class Kategorimenu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        belumlogin();
        $this->load->model('admin/Menu_Model');
    }
    public function index()
    {
        $data['admin'] = $this->db->get_where('karyawan', ['email' => $this->session->userdata('email')])->row_array();
        $data['kategori'] = $this->Menu_Model->getKategori();

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/menu/kategorimenu', $data);
        $this->load->view('admin/templates/footer');
    }

    public function tambah()
    {
        $this->form_validation->set_rules('namakategori', 'Nama kategori', 'required|trim|max_length[30]');
        $this->form_validation->set_rules('foto', 'Foto kategori', 'trim');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi kategori', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data["kategori"] = $this->Menu_Model->getKategori();
            $data['admin'] = $this->db->get_where('karyawan', ['email' => $this->session->userdata('email')])->row_array();
            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/templates/sidebar');
            $this->load->view('admin/menu/tambahkategori', $data);
            $this->load->view('admin/templates/footer');
        } else {
            $temp = explode(".", $_FILES['foto']['name']);
            $foto = round(microtime(true)) . '.' . end($temp);
            move_uploaded_file($_FILES['foto']['kategori'], "./uploads/foto/" . $foto);
            $config['allowed_types'] = 'jpg|png|gif|jpeg|svg|pdf';
            $config['max_size'] = '2048';
            $config['upload_path'] = './uploads/foto/';
            $config['file_name'] = $foto;

            $this->upload->initialize($config);

            if ($this->upload->do_upload('foto')) {
                $dataPost = array(
                    'id_kategori'     => '',
                    'nama_kategori'       => $this->input->post('namakategori'),
                    'gambar_kategori'     => trim($foto),
                    'deskripsi_kategori'  => $this->input->post('deskripsi')
                );
                if ($this->Menu_Model->addKategori($dataPost)) {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
					Berhasil menambahkan kategori menu baru!
				    </div>');
                    redirect('admin/kategorimenu');
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
					Gagal menambahkan kategori menu baru!
				    </div>');
                    redirect('admin/kategorimenu');
                }
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">'
                    . $this->upload->display_errors() .
                    '</div>');
                redirect('admin/kategorimenu');
            }
        }
    }

    public function hapus($id)
    {
        $hapus = $this->Menu_Model->delKategori($id);
        var_dump($hapus);
        if ($hapus) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
				Berhasil Menghapus Data!
			  </div>');
            redirect('admin/kategorimenu');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
			Gagal Menghapus Data!
		  </div>');
            redirect('admin/kategorimenu');
        }
    }
}
