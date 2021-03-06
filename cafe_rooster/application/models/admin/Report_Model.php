<?php
class Report_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    //////////////////////////////////////// DATA REPORT TRANSAKSI //////////////////////////////////////////
    public function index()
    {
        $query = $this->db->get('pesan');
        return $query->result();
    }

    public function getDataTrans()
    {
        $this->db->select('*');
        $this->db->from('menu');
        $this->db->join('detail_pesan', 'detail_pesan.id_menu = menu.id_menu');
        $this->db->join('pesan', 'pesan.id_pesan = detail_pesan.id_pesan');

        $query = $this->db->get();
        return $query->result();
    }

    public function getDetail()
    {
        $query = $this->db->query("SELECT * FROM detail_pesan, pesan WHERE detail_pesan.id_pesan = pesan.id_pesan")->result();
        return $query;
    }

    public function total()
    {
        $this->db->select_sum('total_harga_pesan');
        $query = $this->db->get('detail_pesan');
        if ($query->num_rows() > 0) {
            return $query->row()->total_harga_pesan;
        } else {
            return 0;
        }
    }

    //////////////////////////////////////// END OF DATA REPORT TRANSAKSI //////////////////////////////////////////

    /////////////////////////////////////////////// NOTA TRANSAKSI /////////////////////////////////////////////////

    public function nota($id)
    {
        return $this->db->join('pesan', 'pesan.id_pesan = detail_pesan.id_pesan', 'left')
            ->join('menu', 'menu.id_menu = detail_pesan.id_menu', 'left')
            ->join('karyawan', 'karyawan.id_karyawan = pesan.id_karyawan', 'inner')
            ->where('detail_pesan.id_pesan', $id)->get('detail_pesan')->result();
    }

    //////////////////////////////////////////// END OF NOTA TRANSAKSI //////////////////////////////////////////////

    ///////////////////////////////////////////// DATA REPORT BOOKING ///////////////////////////////////////////////
    public function getDataBook()
    {
        $this->db->select('*');
        $this->db->from('menu');
        $this->db->join('detail_booking', 'detail_booking.id_menu = menu.id_menu');
        $this->db->join('booking', 'booking.id_booking = detail_booking.id_booking');
        //$this->db->select('*')->where('status_transaksi', 4);
        //$this->db->join('detail_pesan', 'detail_pesan.id_menu = menu.id_menu');
        //$this->db->join('detail_pesan', 'detail_pesan.id_pesan = pesan.id_pesan');

        //return $this->db->get_where('booking', ['status_transaksi' => 4])->result();
        //$this->db->join('karyawan', 'karyawan.id_karyawan = pesan.id_karyawan');
        $query = $this->db->get();
        return $query->result();
    }

    public function totalBook()
    {
        $this->db->select_sum('total_booking')->where('status_transaksi', 4);
        $query = $this->db->get('booking');

        if ($query->num_rows() > 0) {
            return $query->row()->total_booking;
        } else {
            return 0;
        }
    }

    //////////////////////////////////////// END OF DATA REPORT BOOKING //////////////////////////////////////////

    //////////////////////////////////////// DATA REPORT CATERING //////////////////////////////////////////

    public function getDataCat()
    {
        $this->db->select('*');
        $this->db->from('menu');
        $this->db->join('detail_catering', 'detail_catering.id_menu = menu.id_menu');
        $this->db->join('catering', 'catering.id_catering = detail_catering.id_catering');

        $query = $this->db->get();
        return $query->result();
    }

    public function totalCat()
    {
        $this->db->select_sum('total_catering');
        $query = $this->db->get('catering');
        if ($query->num_rows() > 0) {
            return $query->row()->total_catering;
        } else {
            return 0;
        }
    }
}
