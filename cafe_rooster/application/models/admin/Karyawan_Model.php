<?php
class Karyawan_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function getKaryawan()
    {
        return $this->db->get("karyawan")->result();
    }
}

?>