<?php
class M_psu extends CI_Model
{
    public function tampil_psu()
    {
        return $this->db->get('m_psu');
    }

    public function ubah_psu($where)
    {
        return $this->db->get_where('m_psu', $where);
    }

    public function get_keyword_psu($keyword)
    {
        $this->db->select('*');
        $this->db->from('m_psu');
        $this->db->like('nama_psu', $keyword);
        return $this->db->get()->result();
    }
}