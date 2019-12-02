<?php
class M_ajax_search extends CI_Model
{
    public function fetch_data($query)
    {
        $this->db->select('*');
        $this->db->from('rakit');
        if ($query != '') {
            $this->db->like('nama_pc', $query);
            $this->db->or_like('institusi', $query);
            $this->db->or_like('pengguna', $query);
            $this->db->or_like('processor', $query);
            $this->db->or_like('ram', $query);
            $this->db->or_like('storage', $query);
            $this->db->or_like('motherboard', $query);
        }
        $this->db->order_by('id', 'DESC');
        return $this->db->get();
    }
}
