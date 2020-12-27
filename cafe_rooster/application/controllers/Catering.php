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

        $cek = $this->db->get_where('catering', [
            'id_pembeli' => $id_pembeli,
            'id_status_transaksi' => 1
        ])->row_array();

        $data['checkout'] = $cek['id_catering'];
        // var_dump($id_catering); die;

        $this->load->view('user/templates/headerother', $data);
        $this->load->view('user/Catering/Keranjang', $data);
        $this->load->view('user/templates/footer');
    }

    public function checkout()
    {
        $id = $this->input->post('id');
        $tgl = $this->input->post('tgl');
        // echo $tgl;die;
        if ($id) {
            $cek = $this->db->get_where('catering', [
                'id_catering' => $id,
                'id_pembeli' => $this->session->userdata('id_pembeli'),
                'id_status_transaksi' => 1
            ])->row_array();

            if ($cek) {
                $this->db->where('id_catering', $id);
                $this->db->update('catering', [
                    'id_status_transaksi' => 2,
                    'tgl_catering' => date('Y-m-d H:i:s'),
                    'tgl_diperlukan' => $tgl
                ]);
                redirect('catering/pembayaran');
            } else {
                redirect('catering/keranjang');
            }
        } else {
            redirect('catering/keranjang');
        }
    }

    public function HapusKeranjang($id)
    {
        if ($id) {
            $this->db->delete('detail_catering', ['id_detail_catering' => $id]);
            redirect('Catering/Keranjang');
        } else {
            redirect(base_url());
        }
    }

    public function Pembayaran()
    {
        $data['judul'] = 'Pembayaran';

        $id_pembeli = $this->session->userdata('id_pembeli');
        $data['pembayaran'] = $this->db->get_where('catering', [
            'id_pembeli' => $id_pembeli,
            'id_status_transaksi' => 2
        ])->result_array();

        $this->load->view('user/templates/headerother', $data);
        $this->load->view('user/Catering/Pembayaran', $data);
        $this->load->view('user/templates/footer');
    }


    public function HalamanUploadPembayaran($id = '')
    {
        $data['judul'] = 'Upload Pembayaran';

        $id_pembeli = $this->session->userdata('id_pembeli');
        $data['Pembayaran'] = $this->db->join('detail_catering', 'detail_catering.id_catering = catering.id_catering')->join('menu', 'menu.id_menu = detail_catering.id_menu')->get_where('catering', [
            'id_pembeli' => $id_pembeli,
            'id_status_transaksi' => 2
        ])->result_array();
        
        $cek = $this->db->get_where('catering', [
            'id_pembeli' => $id_pembeli,
            'id_status_transaksi' => 2  
        ])->row_array();

        $data['BuktiPembayaran'] = $cek['dp_catering'];
        $data['catatan'] = $cek['catatan']; 
        $data['total'] = $cek['total_catering'];

        // echo $data['catatan'];die;  

        if($id){
            $this->load->view('user/templates/headerother', $data);
            $this->load->view('user/Catering/HalamanUploadPembayaran', $data);
            $this->load->view('user/templates/footer');
        }else{
            redirect('catering/pembayaran');
        }
    }


    public function UploadPembayaran()
    {
        //jika ada foto yang mau diubah
        $idCatering = $this->input->post('id');
        $bukti = str_replace(' ', '', $_FILES['bukti']['name']);
        // var_dump($bukti); die;
        if ($bukti) {
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size'] = '2048';
            $config['upload_path'] = './assets/buktiPembayaran/';

            $this->upload->initialize($config);

            if ($this->upload->do_upload('bukti')) {
                $fotoBukti = $this->upload->data('file_name');
                $this->db->where('id_catering', $idCatering);
                $this->db->update('catering', ['dp_catering' => $fotoBukti]);

                $this->session->set_flashdata('pesan', '<div class="alert text-center alert-success alert-dismissible fade show" role="alert">Bukti Pembayaran berhasil di upload! Harap menunggu konfirmasi dari admin.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('Catering/Pembayaran');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert text-center alert-danger alert-dismissible fade show" role="alert">' . $this->upload->display_errors() . '
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('Catering/Pembayaran');
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert text-center alert-danger alert-dismissible fade show" role="alert">Silahkan masukan foto bukti pembayaran terlebih dahulu!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            redirect('Catering/Pembayaran');
        }
    }

    public function updateBukti()
    {
        //jika ada foto yang mau diubah
        $idCatering = $this->input->post('id');
        $bukti = str_replace(' ', '', $_FILES['bukti']['name']);
        // var_dump($bukti); die;
        if ($bukti) {
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size'] = '2048';
            $config['upload_path'] = './assets/buktiPembayaran/';

            $this->upload->initialize($config);

            if ($this->upload->do_upload('bukti')) {
                $fotoBukti = $this->upload->data('file_name');
                $this->db->where('id_catering', $idCatering);
                $this->db->update('catering', ['dp_catering' => $fotoBukti]);

                $this->session->set_flashdata('pesan', '<div class="alert text-center alert-success alert-dismissible fade show" role="alert">Bukti Pembayaran berhasil di upload! Harap menunggu konfirmasi dari admin.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('Catering/Pembayaran');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert text-center alert-danger alert-dismissible fade show" role="alert">' . $this->upload->display_errors() . '
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('Catering/Pembayaran');
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert text-center alert-danger alert-dismissible fade show" role="alert">Silahkan masukan foto bukti pembayaran terlebih dahulu!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            redirect('Catering/Pembayaran');
        }
    }

}
