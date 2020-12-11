<?php

class Booking_model extends CI_Model{

    public function tambahDataBooking(){
        $data = [
            "id_karyawan"       => $this->input->post('id_booking'),
            "id_pembeli"        => $this->session->userdata('id_pembeli'),
            "status_transaksi"  => 1,
            'tgl_booking'       => date('Y-m-d'),
            "tgl_acara"         => $this->input->post('tglAcara'),
            "jumlah_meja"       => $this->input->post('jmlMeja'),
            "total_booking"     => ($this->input->post('jmlMeja') * 50000),
            "dp_booking"        => (($this->input->post('jmlMeja') * 50000) / 2),
            "pelunasan_booking" => (($this->input->post('jmlMeja') * 50000) / 2)
        ];

        $this->db->insert('booking', $data);
    }
}