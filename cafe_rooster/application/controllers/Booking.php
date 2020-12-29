<?php

class Booking extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // Ubelumlogin();
    }
    public function index()
    {

        $id_pembeli = $this->session->userdata('id_pembeli');
        $data['booking'] = $this->db->get_where('booking', ['id_pembeli' => $id_pembeli])->result_array();


        $data['judul'] = "Booking";
        $data['user'] = $this->db->get_where('pembeli', ['email' => $this->session->userdata('email')])->row_array();


        $this->load->view('user/templates/headerother', $data);
        $this->load->view('user/Booking/booking', $data);
        $this->load->view('user/templates/footer');
    }

    public function UploadBukti()
    {
        //jika ada foto yang mau diubah
        $idBooking = $this->input->post('id');
        $bukti = str_replace(' ', '', $_FILES['bukti']['name']);
        // var_dump($bukti); die;
        if ($bukti) {
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size'] = '2048';
            $config['upload_path'] = './assets/buktiPembayaran/';

            $this->upload->initialize($config);

            if ($this->upload->do_upload('bukti')) {
                $fotoBukti = $this->upload->data('file_name');
                $this->db->where('id_booking', $idBooking);
                $this->db->update('booking', ['bukti_tf' => $fotoBukti], ['status_transaksi' => 3]);

                $this->session->set_flashdata('pesan', '<div class="alert text-center alert-success alert-dismissible fade show" role="alert">Bukti Pembayaran berhasil di upload! Harap menunggu konfirmasi dari admin.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('Booking');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert text-center alert-danger alert-dismissible fade show" role="alert">' . $this->upload->display_errors() . '
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('Booking');
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert text-center alert-danger alert-dismissible fade show" role="alert">Silahkan masukan foto bukti pembayaran terlebih dahulu!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            redirect('Booking');
        }
    }

    public function UpdateBukti()
    {
        //jika ada foto yang mau diubah
        $idBooking = $this->input->post('idBooking');
        $bukti = str_replace(' ', '', $_FILES['bukti']['name']);
        // var_dump($bukti); die;
        if ($bukti) {
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size'] = '2048';
            $config['upload_path'] = './assets/buktiPembayaran/';

            $this->upload->initialize($config);

            if ($this->upload->do_upload('bukti')) {
                $fotoBukti = $this->upload->data('file_name');
                $this->db->where('id_booking', $idBooking);
                $this->db->update('booking', ['bukti_tf' => $fotoBukti]);

                $this->session->set_flashdata('pesan', '<div class="alert text-center alert-success alert-dismissible fade show" role="alert">Bukti Pembayaran berhasil di upload! Harap menunggu konfirmasi dari admin.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('Booking');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert text-center alert-danger alert-dismissible fade show" role="alert">' . $this->upload->display_errors() . '
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('Booking');
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert text-center alert-danger alert-dismissible fade show" role="alert">Silahkan masukan foto bukti pembayaran terlebih dahulu!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            redirect('Booking');
        }
    }

}