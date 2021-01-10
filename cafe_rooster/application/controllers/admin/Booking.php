<?php
class Booking extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        belumlogin();
        $this->load->model('admin/booking_Model');
    }

    public function index()
    {
        $data['admin'] = $this->db->get_where('karyawan', ['email' => $this->session->userdata('email')])->row_array();
        $data['booking'] = $this->booking_Model->getBooking();

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/booking/booking', $data);
        $this->load->view('admin/templates/footer');
    }

    public function konfirmasi($id = null)
    {                
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('pelunasan', 'Pelunasan booking', 'required|trim|max_length[13]|numeric');
        $this->form_validation->set_rules('catatan', 'Catatan', 'required|trim');
        $this->form_validation->set_rules('foto', 'Foto', 'trim');

        if ($this->form_validation->run() == false) {
            $data["data"] = $this->booking_Model->detail($id);
            $data['admin'] = $this->db->get_where('karyawan', ['email' => $this->session->userdata('email')])->row_array();
            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/templates/sidebar');
            $this->load->view("admin/booking/konfirmasi", $data);
            $this->load->view('admin/templates/footer');
        } else {
            $update = $this->booking_Model->konfirmasi(array(
                'id_booking'           => $this->input->post("id_cat"),
                'id_karyawan'           => $this->session->userdata('id_karyawan'),
                'id_pembeli'            => $this->input->post("id_pem"),
                'id_status_transaksi'   => $this->input->post("status"),
                'tgl_booking'          => $this->input->post("tgl_booking"),
                'tgl_acara'        => $this->input->post("tgl_acara"),
                'total_booking'        => $this->input->post("total"),
                'dp_booking'           => $this->input->post("foto"),
                'pelunasan_booking'    => $this->input->post("pelunasan")
            ), $id);

            if ($update) {
                $ubahfoto = $_FILES['dp_booking']['name'];

                if ($ubahfoto) {
                    $config['allowed_types'] = 'jpg|png|gif|jpeg|pdf';
                    $config['max_size'] = '2048';
                    $config['upload_path'] = './uploads/foto/';
                    $config['file_name'] = $ubahfoto;

                    $this->upload->initialize($config);

                    if ($this->upload->do_upload('dp_booking')) {
                        $booking = $this->db->get_where('booking', ['id_booking' => $id])->row_array();
                        $fotolama = $booking['dp_booking'];
                        if ($fotolama) {
                            unlink(FCPATH . '.uploads/foto/' . $fotolama);
                        }
                        $fotobaru = $this->upload->data('file_name');
                        $this->db->set('dp_booking', $fotobaru);
                        $this->db->where('id_booking', $id);
                        $this->db->update('booking');
                    } else {
                        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">'
                            . $this->upload->display_errors() .
                            '</div>');
                        redirect('admin/booking');
                    }
                }
                $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
				Konfirmasi Berhasil!
				</div>');
                redirect('admin/booking');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                Konfirmasi Gagal!
                </div>');
                redirect('admin/booking');
            }
        }
    }
}
