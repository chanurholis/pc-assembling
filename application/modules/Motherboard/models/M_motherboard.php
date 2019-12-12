<?php
class M_motherboard extends CI_Model
{
    public function tampil_motherboard()
    {
        $this->db->select('*');
        $this->db->from('m_motherboard');
        $this->db->join('m_brand_motherboard', 'm_brand_motherboard.brand_motherboard_id=m_motherboard.brand_motherboard_id', 'inner');
        return $this->db->get();
    }

    public function tampil_brand_motherboard()
    {
        return $this->db->get_where('m_brand_motherboard');
    }

    public function ubah_motherboard($where)
    {
        return $this->db->get_where('m_motherboard', $where);
    }

    public function ubah_brand_motherboard($where)
    {
        return $this->db->get_where('m_brand_motherboard', $where);
    }

    public function get_keyword_brand_motherboard($keyword)
    {
        $this->db->select('*');
        $this->db->from('m_brand_motherboard');
        $this->db->like('brand_motherboard', $keyword);
        return $this->db->get()->result();
    }

    public function get_keyword_motherboard($keyword)
    {
        $this->db->select('*');
        $this->db->from('m_motherboard');
        $this->db->like('brand_motherboard', $keyword);
        $this->db->or_like('motherboard', $keyword);
        return $this->db->get()->result();
    }

    public function hapus($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}
