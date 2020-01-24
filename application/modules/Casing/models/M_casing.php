<?php
class M_casing extends CI_Model
{
    public function tampil_casing()
    {
        $this->db->select('*');
        $this->db->from('m_casing');
        $this->db->order_by('nama_casing', 'ASC');
        return $this->db->get();
    }

    public function ubah_casing($where)
    {
        return $this->db->get_where('m_casing', $where);
    }

    public function get_keyword_casing($keyword)
    {
        $this->db->select('*');
        $this->db->from('m_casing');
        $this->db->like('nama_casing', $keyword);
        $this->db->or_like('casing_id', $keyword);
        $this->db->order_by('nama_casing', 'ASC');
        return $this->db->get()->result();
    }

    public function hapus($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}
