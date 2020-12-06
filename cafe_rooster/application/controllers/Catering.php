<?php

class Catering extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // Ubelumlogin();
    }

    public function Catering()
    {


        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required|trim');
        if ($this->form_validation->run() === false) {
            $this->load->view('user/home/home');
        } else {

            $cek = $this->db->get_where('catering', [
                'id_pembeli' => $this->session->userdata('id_pembeli'),
                'id_status_transaksi' => 1
            ])->row_array();

            if ($cek) {
                $detail_catering = [
                    'id_menu' => $this->input->post('id_menu'),
                    'id_catering' => $cek['id_catering'],
                    'jumlah_catering' => $this->input->post('jumlah'),
                    'total_harga_catering' => $this->input->post('total')
                ];

                $this->db->insert('detail_catering', $detail_catering);
                
            } else {
                $catering = [
                    'id_pembeli' => $this->session->userdata('id_pembeli'),
                    'id_status_transaksi' => 1
                ];
                $this->db->insert('catering', $catering);




                $cek = $this->db->get_where('catering', [
                    'id_pembeli' => $this->session->userdata('id_pembeli'),
                    'id_status_transaksi' => 1
                ])->row_array();
                $detail_catering = [
                    'id_menu' => $this->input->post('id_menu'),
                    'id_catering' => $cek['id_catering'],
                    'jumlah_catering' => $this->input->post('jumlah'),
                    'total_harga_catering' => $this->input->post('total')
                ];

                $this->db->insert('detail_catering', $detail_catering);
            }
        }
    }
}
