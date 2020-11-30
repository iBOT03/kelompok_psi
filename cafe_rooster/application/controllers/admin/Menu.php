<?php
class Menu extends CI_Controller
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
    $data['menu'] = $this->Menu_Model->data_menu();

    $this->load->view('admin/templates/header', $data);
    $this->load->view('admin/templates/sidebar');
    $this->load->view('admin/menu/menu', $data);
    $this->load->view('admin/templates/footer');
  }

  public function edit()
  {
    $this->form_validation->set_rules('nama_menu', 'Nama Menu', 'trim|required');
    $this->form_validation->set_rules('kategori', 'Kategori Menu', 'trim|required');
    $this->form_validation->set_rules('harga_menu', 'Harga Menu', 'trim|required|numeric');
    $this->form_validation->set_rules('gambar_menu', 'Gambar Menu', 'trim|required|numeric');
    $this->form_validation->set_rules('deskripsi_menu', 'Deskripsi Menu', 'trim');

    if ($this->form_validation->run() == false) {
        $judul['judul'] = 'Edit Menu';
        $data['dMenu'] = $this->Menu_Model->editmenu();
        $data['kategori'] = $this->db->get('kategori')->result_array();
        $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('admin/tamplates/header', $data);
        $this->load->view('admin/tamplates/sidebar', $judul);
        $this->load->view('admin/menu/index', $data);
        $this->load->view('admin/tamplates/footer');
    }else {
      $temp = explode(".", $_FILES['foto']['name']);
      $foto = round(microtime(true)) . '.' . end($temp);
      move_uploaded_file($_FILES['foto']['menu'], "./uploads/foto/" . $foto);
      $config['allowed_types'] = 'jpg|png|gif|jpeg|svg|pdf';
      $config['max_size'] = '2048';
      $config['upload_path'] = './uploads/foto/';
      $config['file_name'] = $foto;;

        $this->load->library('upload', $config);
        if ($this->upload->do_upload('gambar_menu')) {
            $id_menu = $this->input->post('id_menu');
            $nama_menu = $this->input->post('nama_menu');
            $kategori = $this->input->post('nama_kategori');
            $harga_menu = $this->input->post('harga_menu');
            $gambar_menu = $temp;
            $deskripsi_menu = $this->input->post('cara_perawatan');

            $this->Menu_Model->editmenu($id_menu, $nama_menu, $kategori, $harga_menu, $gambar_menu, $deskripsi_menu);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"> Bunga Berhasil Diedit
             </div>');
            redirect('admin/Menu');
        }else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                    '. $this->upload->display_errors() .'
                    </div>');
            redirect('admin/Menu');  
        }
    }
  }

  public function delete($idMenu)
  {
    // $idMenu = $this->input->post('id');
    $delete = $this->Menu_Model->deletemenu($idMenu);
    if ($delete) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
			Data Berhasi di Hapus!
            </div>');
            redirect('admin/Menu');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
			Data gagal di Hapus!
            </div>');
            redirect('admin/Menu');
        }
  }

  public function tambah()
  {
    $this->form_validation->set_rules('namamenu', 'Nama menu', 'required|trim|max_length[30]');
    $this->form_validation->set_rules('foto', 'Foto menu', 'trim');
    $this->form_validation->set_rules('deskripsi', 'Deskripsi menu', 'required|trim');
    $this->form_validation->set_rules('kategori', 'Kategori menu', 'required');
    $this->form_validation->set_rules('harga', 'Harga menu', 'required|trim|numeric|required');

    if ($this->form_validation->run() == false) {
      $data["menu"] = $this->Menu_Model->getKategori();
      $data['admin'] = $this->db->get_where('karyawan', ['email' => $this->session->userdata('email')])->row_array();
      $this->load->view('admin/templates/header', $data);
      $this->load->view('admin/templates/sidebar');
      $this->load->view('admin/menu/tambahmenu', $data);
      $this->load->view('admin/templates/footer');
    } else {
      $temp = explode(".", $_FILES['foto']['name']);
      $foto = round(microtime(true)) . '.' . end($temp);
      move_uploaded_file($_FILES['foto']['menu'], "./uploads/foto/" . $foto);
      $config['allowed_types'] = 'jpg|png|gif|jpeg|svg|pdf';
      $config['max_size'] = '2048';
      $config['upload_path'] = './uploads/foto/';
      $config['file_name'] = $foto;

      $this->upload->initialize($config);

      if ($this->upload->do_upload('foto')) {
        $dataPost = array(
          'id_menu'         => '',
          'id_kategori'     => $this->input->post('kategori'),
          'nama_menu'       => $this->input->post('namamenu'),
          'gambar_menu'     => trim($foto),
          'harga_menu'      => $this->input->post('harga'),
          'deskripsi_menu'  => $this->input->post('deskripsi')
        );
        if ($this->Menu_Model->addMenu($dataPost)) {
          $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
					Berhasil menambahkan menu baru!
				    </div>');
          redirect('admin/menu');
        } else {
          $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
					Gagal menambahkan menu baru!
				    </div>');
          redirect('admin/menu');
        }
      } else {
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">'
          . $this->upload->display_errors() .
          '</div>');
        redirect('admin/menu');
      }
    }
  }

}
