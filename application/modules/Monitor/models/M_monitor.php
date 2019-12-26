<?php
class M_monitor extends CI_Model
{
    public function tampil_monitor()
    {
        $this->db->select('*');
        $this->db->from('m_monitor');
        $this->db->order_by('nama_monitor', 'ASC');
        return $this->db->get();
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
        $this->db->or_like('monitor_id', $keyword);
        $this->db->order_by('nama_monitor', 'ASC');
        return $this->db->get()->result();
    }
}
