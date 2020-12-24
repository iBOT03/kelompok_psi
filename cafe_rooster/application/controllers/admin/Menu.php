<?php
class Menu extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    belumlogin();
    // cek();
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

  public function edit($id = null)
  {
    $this->form_validation->set_rules('namamenu', 'Nama Menu', 'required|trim');
    $this->form_validation->set_rules('kategorimenu', 'Kategori Menu', 'required|trim');
    $this->form_validation->set_rules('hargamenu', 'Harga Menu', 'required|trim');
    $this->form_validation->set_rules('gambarmenu', 'Gambar Menu', 'trim');
    $this->form_validation->set_rules('deskripsimenu', 'Deskripsi Menu', 'required|trim');

    if ($this->form_validation->run() == false) {
      $data['admin'] = $this->db->get_where('karyawan', ['email' => $this->session->userdata('email')])->row_array();
      $data['food'] = $this->Menu_Model->dMenu($id);
      $data['sub'] = $this->Menu_Model->getDetail($id);
      $data['kategori'] = $this->Menu_Model->kategori($id);

      $this->load->view('admin/templates/header', $data);
      $this->load->view('admin/templates/sidebar');
      $this->load->view('admin/menu/editmenu', $data);
      $this->load->view('admin/templates/footer');
    } else {
      $update = $this->Menu_Model->upMenu(array(
        'id_menu'          => $this->input->post('idmenu'),
        'id_kategori'     => $this->input->post('kategorimenu'),
        'nama_menu'        => $this->input->post("namamenu"),
        'harga_menu'      => $this->input->post("hargamenu"),
        // 'gambar_menu'   => $this->input->post("gambarmenu"),
        'deskripsi_menu'   => $this->input->post("deskripsimenu")
      ), $id);

      if ($update) {
        $ubahfoto = $_FILES['gambarmenu']['name'];
        if ($ubahfoto) {
          $config['allowed_types'] = 'jpg|png|jpeg';
          $config['max_size'] = '2048';
          $config['upload_path'] = './assets/menu/';
          $config['file_name'] = $ubahfoto;

          $this->upload->initialize($config);

          if ($this->upload->do_upload('gambarmenu')) {

            $menu = $this->db->get_where('menu', ['id_menu' => $id])->row_array();
            $fotolama = $menu['gambar_menu'];
            if ($fotolama) {
              unlink(FCPATH . './assets/menu/' . $fotolama);
            }
            $fotobaru = $this->upload->data('file_name');
            $this->db->set('gambar_menu', $fotobaru);
            $this->db->where('id_menu', $id);
            $this->db->update('menu');


            $cek = $this->db->get_where('menu', ['id_menu' => $id])->row_array();
            $config['image_library'] = 'gd2';
            $config['source_image'] = './assets/menu/'.$cek['gambar_menu'].'';
            $config['create_thumb'] = FALSE;
            $config['maintain_ratio'] = FALSE;
            $config['width'] = 640;
            $config['height'] = 640;

            $this->load->library('image_lib', $config);

            // echo $config['source_image'];die;

            $this->image_lib->crop();
            if (!$this->image_lib->resize()) {
              echo $this->image_lib->display_errors();
              die;
            }
          } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">'
              . $this->upload->display_errors() .
              '</div>');
            redirect('admin/menu');
          }
        }
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
				Data Berhasil Diubah
				</div>');
        redirect('admin/menu');
      } else {
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                Data Gagal Di Ubah
                </div>');
        redirect('admin/menu');
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
      $data['menu'] = $this->Menu_Model->getKategori();
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
