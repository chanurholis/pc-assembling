<?php
class M_monitor extends CI_Model
{
    public function tampil_monitor()
    {
        return $this->db->get('m_monitor');
    }

    public function ubah_monitor($where)
    {
        return $this->db->get_where('m_monitor', $where);
    }

    public function get_keyword_monitor($keyword)
    {
        $this->db->select('*');
        $this->db->from('m_monitor');
        $this->db->like('nama_monitor', $keyword);
        return $this->db->get()->result();
    }
}
