<?php
class Catering extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        belumlogin();
        $this->load->model('admin/Catering_Model');
    }
    
    public function index()
    {
        $data['admin'] = $this->db->get_where('karyawan', ['email' => $this->session->userdata('email')])->row_array();
        $data['catering'] = $this->Catering_Model->getCatering();

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/catering/catering', $data);
        $this->load->view('admin/templates/footer');
    }

    public function konfirmasi($id = null)
    {                
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('pelunasan', 'Pelunasan Catering', 'trim|max_length[13]|numeric');
        $this->form_validation->set_rules('catatan', 'Catatan', 'required|trim');
        $this->form_validation->set_rules('foto', 'Foto', 'trim');

        if ($this->form_validation->run() == false) {
            $data["data"] = $this->Catering_Model->detail($id);
            $data['admin'] = $this->db->get_where('karyawan', ['email' => $this->session->userdata('email')])->row_array();
            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/templates/sidebar');
            $this->load->view("admin/catering/konfirmasi", $data);
            $this->load->view('admin/templates/footer');
        } else {
            $update = $this->Catering_Model->konfirmasi(array(
                'id_catering'           => $this->input->post("id_cat"),
                'id_karyawan'           => $this->session->userdata('id_karyawan'),
                'id_pembeli'            => $this->input->post("id_pem"),
                'id_status_transaksi'   => $this->input->post("status"),
                'tgl_catering'          => $this->input->post("tgl_catering"),
                'tgl_diperlukan'        => $this->input->post("tgl_diperlukan"),
                'total_catering'        => $this->input->post("total"),
                'dp_catering'           => $this->input->post("foto"),
                'pelunasan_catering'    => $this->input->post("pelunasan"),
                'catatan'               => $this->input->post("catatan")
            ), $id);

            if ($update) {
                $ubahfoto = $_FILES['dp_catering']['name'];

                if ($ubahfoto) {
                    $config['allowed_types'] = 'jpg|png|gif|jpeg|pdf';
                    $config['max_size'] = '2048';
                    $config['upload_path'] = './uploads/foto/';
                    $config['file_name'] = $ubahfoto;

                    $this->upload->initialize($config);

                    if ($this->upload->do_upload('dp_catering')) {
                        $catering = $this->db->get_where('catering', ['id_catering' => $id])->row_array();
                        $fotolama = $catering['dp_catering'];
                        if ($fotolama) {
                            unlink(FCPATH . '.uploads/foto/' . $fotolama);
                        }
                        $fotobaru = $this->upload->data('file_name');
                        $this->db->set('dp_catering', $fotobaru);
                        $this->db->where('id_catering', $id);
                        $this->db->update('catering');
                    } else {
                        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">'
                            . $this->upload->display_errors() .
                            '</div>');
                        redirect('admin/catering');
                    }
                }
                $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
				Konfirmasi Berhasil!
				</div>');
                redirect('admin/catering');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                Konfirmasi Gagal!
                </div>');
                redirect('admin/catering');
            }
        }
    }
}