<?php
class M_keyboard extends CI_Model
{
    public function tampil_keyboard()
    {
        return $this->db->get('m_keyboard');
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
        return $this->db->get()->result();
    }
}
