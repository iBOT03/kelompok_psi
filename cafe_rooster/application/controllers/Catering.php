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


        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required|trim|greater_than_equal_to[1]');
        if ($this->form_validation->run() === false) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
			Jumlah Menu yang ingin di beli tidak boleh kurang dari 1!
		  	</div>');
            redirect(base_url());

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
