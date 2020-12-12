<?php
class Transaksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        belumlogin();
        $this->load->model('admin/Transaksi_Model');
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
        $data['detail_beli'] = $this->Transaksi_Model->tampil_join
                                ('menu', 'detail_pesan', 'menu.id_menu=detail_pesan.id_menu', $kode)->result();
        $data['produk'] = $this->Transaksi_Model->tampil('menu')->result();


        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/transaksi/transaksi', $data);
        $this->load->view('admin/templates/footer');
    }

    public function beli($id)
    {
        //menampilkan data harga satuan produk
        $where['id_menu'] = $id;
        $produk = $this->Transaksi_Model->tampil_id('menu', $where)->row();
        //mengambil id penjualan terakhir
        $id_pesan = $id_pesan = $this->Transaksi_Model->tampil_order('id_pesan', 'pesan', 'DESC')->row_array();
        if (empty($id_pesan)) {
            $kode_jual = 1;
        } else {
            $kode_jual = $id_pesan->id_pesan + 1;
        }
        //mengecek produk di keranjang
        $wherecek['id_menu'] = $id;
        $wherecek['id_pesan'] = $kode_jual;
        $cektransaksi = $this->Transaksi_Model->tampil_id('detail_pesan', $wherecek)->row();
        if (empty($cektransaksi)) {
            $field['id_menu']     = $id;
            $field['id_pesan']  = $kode_jual;
            $field['jumlah_pesan']   = 1;
            $field['total_harga_pesan']  = $produk->harga_menu;
            $this->Transaksi_Model->tambah('detail_pesan', $field);
        } else {
            $field['jumlah_pesan'] = $cektransaksi->jumlah_pesan+1;
            $field['total_harga_pesan'] = $field['jumlah_pesan'] * $produk->harga_menu;
            $this->Transaksi_Model->ubah('detail_pesan', $field, $wherecek);
        }

        redirect(base_url() . 'admin/Transaksi');
    }

    public function hapus($id) {
        $pecah = explode('-', $id);
        $where['id_pesan'] = $pecah[0];
        $where['id_menu'] = $pecah[1];
        $this->Transaksi_Model->hapus('detail_pesan', $where);
        redirect(base_url(). 'admin/Transaksi');
    }

}
