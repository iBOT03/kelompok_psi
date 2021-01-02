<?php
class Transaksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        belumlogin();
        $this->load->model('admin/Transaksi_Model');
        $this->load->model('admin/Report_Model');
    }
    public function index()
    {

        $data['admin'] = $this->db->get_where('karyawan', ['email' => $this->session->userdata('email')])->row_array();

        //load library
        // $this->load->library('pagination');
        $data['cari'] = $this->input->post('cari');

        //Cari
        if (isset($_POST['submit'])) {
            $data['cari'] = $this->input->post('cari');
            $this->session->set_userdata('cari', $data['cari']);
        } else {
            $data['cari '] = $this->session->userdata('cari');
        }

        //mencari semua data
        // $config['total_rows'] = $this->Transaksi_Model->hitung();

        //mencari berdasarkan query

        $this->db->like('nama_menu', $data['cari']);
        $this->db->or_like('harga_menu', $data['cari']);
        $this->db->from('menu');

        $config['total_rows'] = $this->db->count_all_results();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 6;

        //inisialisasi
        $this->pagination->initialize($config);
        $data['start'] = $this->uri->segment(4);
        $data['menu'] = $this->Transaksi_Model->sebagian_produk($config['per_page'], $data['start'], $data['cari']);

        //transaksi
        $id_pesan = $id_pesan = $this->Transaksi_Model->tampil_order('id_pesan', 'pesan', 'DESC')->row();
        if (empty($id_pesan)) {
            $data['kode_jual'] = 1;
            $kode['id_pesan'] = 1;
        } else {
            $data['kode_jual'] = $id_pesan->id_pesan + 1;
            $kode['id_pesan'] = $id_pesan->id_pesan + 1;
        }
        //get sub total
        $data['sub_total'] = $this->Transaksi_Model->total('detail_pesan', 'total_harga_pesan', $kode)->row();
        //menampilkan detail beli
        $data['detail_beli'] = $this->Transaksi_Model->tampil_join('menu', 'detail_pesan', 'menu.id_menu=detail_pesan.id_menu', $kode)->result();

        // $data['detail_harga'] = $this->Transaksi_Model->tampil_join('menu', 'detail_pesan', 'menu.id_menu=detail_pesan.id_menu', $kode)->row();

        // var_dump($kode);die;
        $cek = $this->db->get_where('pesan', ['id_pesan' => $kode['id_pesan'] - 1, 'id_status_transaksi' => 1])->row_array();

        $data['total_harga'] = $cek['total_pesanan'];

        $dataIdPesan = $this->db->get_where('pesan', ['id_status_transaksi' => 1,])->row_array();
        // var_dump($dataIdPesan['id_pesan']);die;
        $data['huhu'] = $dataIdPesan['id_pesan'];
        $data['produk'] = $this->Transaksi_Model->tampil('menu')->result();


        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/transaksi/transaksi', $data);
        $this->load->view('admin/templates/footer');
    }

    public function beli($id)
    {
        $pesan = [
            'id_karyawan' => $this->session->userdata('id_karyawan'),
            'id_status_transaksi' => 1,
            'tgl_pesan' => date('Y-m-d H:i:s')
        ];

        $dataProduk = $this->Transaksi_Model->tampil_id('menu', ['id_menu' => $id])->row_array();


        if ($id) {
            // echo $this->session->userdata('cari');die;
            $cekIdPesan = $this->db->get_where('pesan', ['id_status_transaksi' => 1])->row_array();
            $dataMenu = $this->db->get_where('menu',  ['id_menu' => $id])->row_array();
            if ($cekIdPesan) {
                $cekDetailPesan = $this->db->get_where(
                    'detail_pesan',
                    [
                        'id_menu' => $id,
                        'id_pesan' => $cekIdPesan['id_pesan']
                    ]
                )->row_array();

                if ($cekDetailPesan) {
                    $jumlahPesan = $cekDetailPesan['jumlah_pesan'] + 1;

                    $this->db->where('id_detail_pesan', $cekDetailPesan['id_detail_pesan']);
                    $this->db->update('detail_pesan', [
                        'jumlah_pesan' => $jumlahPesan,
                        'total_harga_pesan' => $jumlahPesan * $dataMenu['harga_menu']
                    ]);
                    redirect('admin/Transaksi');
                } else {
                    $detailPesan = [
                        'id_pesan' => $cekIdPesan['id_pesan'],
                        'id_menu' => $id,
                        'jumlah_pesan' => 1,
                        'total_harga_pesan' => $dataProduk['harga_menu']
                    ];
                    $this->db->insert('detail_pesan', $detailPesan);
                    redirect('admin/Transaksi');
                }
            } else {
                $this->db->insert('pesan', $pesan);
                $cekPesan = $this->db->get_where('pesan', ['id_status_transaksi' => 1])->row_array();
                $detailPesan = [
                    'id_pesan' => $cekPesan['id_pesan'],
                    'id_menu' => $id,
                    'jumlah_pesan' => 1,
                    'total_harga_pesan' => $dataProduk['harga_menu']
                ];
                $this->db->insert('detail_pesan', $detailPesan);
                redirect('admin/Transaksi');
            }
        }


        // //menampilkan data harga satuan produk
        // $where['id_menu'] = $id;
        // $produk = $this->Transaksi_Model->tampil_id('menu', $where)->row();
        // //mengambil id penjualan terakhir
        // $id_pesan = $id_pesan = $this->Transaksi_Model->tampil_order('id_pesan', 'pesan', 'DESC')->row_array();
        // if (empty($id_pesan)) {
        //     $kode_jual = 1;
        // } else {
        //     $kode_jual = $id_pesan->id_pesan + 1;
        // }
        // //mengecek produk di keranjang
        // $wherecek['id_menu'] = $id;
        // $wherecek['id_pesan'] = $kode_jual;
        // $cektransaksi = $this->Transaksi_Model->tampil_id('detail_pesan', $wherecek)->row();
        // if (empty($cektransaksi)) {
        //     $field['id_menu']     = $id;
        //     $field['id_pesan']  = $kode_jual;
        //     $field['jumlah_pesan']   = 1;
        //     $field['total_harga_pesan']  = $produk->harga_menu;
        //     $this->Transaksi_Model->tambah('detail_pesan', $field);
        // } else {
        //     $field['jumlah_pesan'] = $cektransaksi->jumlah_pesan+1;
        //     $field['total_harga_pesan'] = $field['jumlah_pesan'] * $produk->harga_menu;
        //     $this->Transaksi_Model->ubah('detail_pesan', $field, $wherecek);
        // }

        // redirect(base_url() . 'admin/Transaksi');
    }

    public function hapus($id)
    {
        if ($id) {
            $this->Transaksi_Model->hapus($id);
            redirect('admin/transaksi');
        }
        // $pecah = explode('-', $id);
        // $where['id_pesan'] = $pecah[0];
        // $where['id_menu'] = $pecah[1];
        // $this->Transaksi_Model->hapus('detail_pesan', $where);
        // redirect(base_url() . 'admin/Transaksi');
    }

    public function CheckOut($id = '')
    {
        if ($id) {
            $this->form_validation->set_rules('namaPemesan', 'Nama Pemesan', 'required|trim');
            $this->form_validation->set_rules('nomorMeja', 'Nomor Meja', 'required|trim|greater_than[0]');
            $this->form_validation->set_rules('uangPelanggan', 'Uang Pelanggan', 'required|trim|greater_than[5000]');
            $this->form_validation->set_rules('uangKembalian', 'Uang Kembalian', 'required|trim|greater_than[1]');

            if ($this->form_validation->run() === false) {
                //transaksi
                $id_pesan = $id_pesan = $this->Transaksi_Model->tampil_order('id_pesan', 'pesan', 'DESC')->row();
                if (empty($id_pesan)) {
                    $data['kode_jual'] = 1;
                    $kode['id_pesan'] = 1;
                } else {
                    $data['kode_jual'] = $id_pesan->id_pesan + 1;
                    $kode['id_pesan'] = $id_pesan->id_pesan + 1;
                }
                //get sub total
                $data['sub_total'] = $this->Transaksi_Model->total('detail_pesan', 'total_harga_pesan', $kode)->row();
                //menampilkan detail beli                
                $data['detail_harga'] = $this->Transaksi_Model->tampil_join('menu', 'detail_pesan', 'menu.id_menu=detail_pesan.id_menu', $kode)->row();
                $this->load->view('admin/templates/header');
                $this->load->view('admin/templates/sidebar');
                $this->load->view('admin/transaksi/CheckOut', $data);
                $this->load->view('admin/templates/footer');
            } else {
                $data = [
                    'id_status_transaksi' => 2,
                    'nama_pemesan' => $this->input->post('namaPemesan'),
                    'no_meja' => $this->input->post('nomorMeja'),
                    'total_bayar' => $this->input->post('uangPelanggan'),
                    'kembalian' => $this->input->post('uangKembalian')
                ];
                $this->db->where('id_pesan', $id);
                $this->db->update('pesan', $data);
                redirect('admin/transaksi');
            }
        } else {
            redirect('admin/transaksi');
        }
    }

    public function Nota($id)
    {
        $data['admin'] = $this->db->get_where('karyawan', ['email' => $this->session->userdata('email')])->row_array();
        $cek = $this->Report_Model->nota($this->uri->segment(4));
        $data = array(
            'tanggal' => $cek[0]->tgl_pesan,
            'nota' => $cek[0]->id_pesan,
            'operator' => $cek[0]->nama_karyawan,
            'meja' => $cek[0]->no_meja,
            'pelanggan' => $cek[0]->nama_pemesan,
            'total' => $cek[0]->total_pesanan,
            'result' => $cek,
            'bayar' => $cek[0]->total_bayar,
            'kembalian' => $cek[0]->kembalian,
        );

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/transaksi/nota', $data);
        $this->load->view('admin/templates/footer');
    }
}
