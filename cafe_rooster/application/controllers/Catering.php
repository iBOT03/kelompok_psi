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
                $id_catering = $cek['id_catering'];
                $idmenu = $this->input->post('id_menu');
                $cek2 = $this->db->get_where('detail_catering', [
                    'id_catering' => $id_catering,
                    'id_menu' => $idmenu
                ])->row_array();

                if ($cek2) {
                    $jumlahbeli = $this->input->post('jumlah');
                    $jumlahbelisebelumnya = $cek2['jumlah_catering'];
                    $tambahjumlah = $jumlahbeli + $jumlahbelisebelumnya;
                    $totalhargacatering = $tambahjumlah * $this->input->post('harga');

                    $datadetailcatering = [
                        'jumlah_catering' => $tambahjumlah,
                        'total_harga_catering' => $totalhargacatering
                    ];
                    $this->db->where([
                        'id_catering' => $id_catering,
                        'id_menu' => $idmenu
                    ]);
                    $this->db->update('detail_catering', $datadetailcatering);
                    redirect('Catering/Keranjang');
                } else {
                    $detail_catering = [
                        'id_menu' => $this->input->post('id_menu'),
                        'id_catering' => $cek['id_catering'],
                        'jumlah_catering' => $this->input->post('jumlah'),
                        'total_harga_catering' => $this->input->post('total')
                    ];

                    $this->db->insert('detail_catering', $detail_catering);
                    redirect('Catering/Keranjang');
                }
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
                redirect('Catering/Keranjang');
            }
        }
    }
    public function Keranjang()
    {
        $data['judul'] = 'Keranjang';

        $id_pembeli = $this->session->userdata('id_pembeli');
        $data['keranjang'] = $this->db->join('detail_catering', 'detail_catering.id_catering = catering.id_catering')->join('menu', 'menu.id_menu = detail_catering.id_menu')->get_where('catering', [
            'id_pembeli' => $id_pembeli,
            'id_status_transaksi' => 1
            ])->result_array();

        $this->load->view('user/templates/headerother', $data);
        $this->load->view('user/Catering/Keranjang', $data);
        $this->load->view('user/templates/footer');
    }

    public function HapusKeranjang($id)
    {
        if ($id) {
            $this->db->delete('detail_catering', ['id_detail_catering' => $id]);
            redirect('Catering/Keranjang');
        }else{
            redirect(base_url());
        }
    }

    public function Pembayaran()
    {
        $data['judul'] = 'Pembayaran';

        $id_pembeli = $this->session->userdata('id_pembeli');
        $data['pembayaran'] = $this->db->join('detail_catering', 'detail_catering.id_catering = catering.id_catering')->join('menu', 'menu.id_menu = detail_catering.id_menu')->get_where('catering', [
            'id_pembeli' => $id_pembeli, 
            'id_status_transaksi' => 2
            ])->result_array();

        $this->load->view('user/templates/headerother', $data);
        $this->load->view('user/Catering/Pembayaran', $data);
        $this->load->view('user/templates/footer');
    }

    public function UploadPembayaran(){
        
    }
}
