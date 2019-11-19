<?php
class M_mouse extends CI_Model
{
    public function tampil_mouse()
    {
        return $this->db->get('m_mouse');
    }

    public function ubah_mouse($where)
    {
        return $this->db->get_where('m_mouse', $where);
    }

    public function get_keyword_mouse($keyword)
    {
        $this->db->select('*');
        $this->db->from('m_mouse');
        $this->db->like('nama_mouse', $keyword);
        return $this->db->get()->result();
    }
}
