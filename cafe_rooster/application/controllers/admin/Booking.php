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
    public function konfirmasi($id)
    {
        $konfirmasi = $this->booking_Model->konfirmasi($id);
        if ($konfirmasi) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
			Konfirmasi Berhasil!
            </div>');
            redirect('admin/Booking');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
			Konfirmasi Gagal!
            </div>');
            redirect('admin/Booking');
        }
    }
}
