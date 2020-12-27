<?php
class Dashboard_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function TotTransaksi() {
        $query = $this->db->get('pesan');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
    public function TotCatering() {
        $query = $this->db->get('catering');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
    public function TotBooking() {
        $query = $this->db->get('booking');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
    public function TotPembeli() {
        $query = $this->db->get('pembeli');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
}