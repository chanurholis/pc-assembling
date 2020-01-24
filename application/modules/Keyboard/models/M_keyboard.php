<?php
class M_keyboard extends CI_Model
{
    public function tampil_keyboard()
    {
        $this->db->select('*');
        $this->db->from('m_keyboard');
        $this->db->order_by('nama_keyboard', 'ASC');
        return $this->db->get();
    }

    public function ubah_keyboard($where)
    {
        return $this->db->get_where('m_keyboard', $where);
    }

    public function get_keyword_keyboard($keyword)
    {
        $this->db->select('*');
        $this->db->from('m_keyboard');
        $this->db->like('nama_keyboard', $keyword);
        $this->db->or_like('keyboard_id', $keyword);
        $this->db->order_by('nama_keyboard', 'ASC');
        return $this->db->get()->result();
    }
}
