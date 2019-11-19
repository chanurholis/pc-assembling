<?php
class M_vga extends CI_Model
{
    public function tampil_vga()
    {
        return $this->db->get('m_vga');
    }

    public function ubah_vga($where)
    {
        return $this->db->get_where('m_vga', $where);
    }

    public function get_keyword_vga($kerword)
    {
        $this->db->select('*');
        $this->db->from('m_vga');
        $this->db->like('nama_vga', $kerword);
        $this->db->or_like('type', $kerword);
        return $this->db->get()->result();
    }
}
