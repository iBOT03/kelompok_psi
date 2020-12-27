<?php

class Booking extends CI_Controller {

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

}