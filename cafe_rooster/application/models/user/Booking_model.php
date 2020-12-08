<?php

class Booking_model extends CI_Model{

    public function tambahDataBooking(){
        $data = [

            "tgl_acara" => $this->input->post("tglAcara"),
        ];
    }
}