<?php
class M_vga extends CI_Model
{
    public function tampil_vga()
    {
        $this->db->select('*');
        $this->db->from('m_vga');
        $this->db->order_by('type_vga', 'ASC');
        return $this->db->get();
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
        $this->db->or_like('vga_id', $kerword);
        $this->db->or_like('type_vga', $kerword);
        $this->db->order_by('type_vga', 'ASC');
        return $this->db->get()->result();
    }
}
