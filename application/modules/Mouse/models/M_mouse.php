<?php
class M_mouse extends CI_Model
{
    public function tampil_mouse()
    {
        $this->db->select('*');
        $this->db->from('m_mouse');
        $this->db->order_by('nama_mouse', 'ASC');
        return $this->db->get();
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
        $this->db->or_like('mouse_id', $keyword);
        $this->db->order_by('nama_mouse', 'ASC');
        return $this->db->get()->result();
    }
}
