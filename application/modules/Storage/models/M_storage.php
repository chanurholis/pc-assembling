<?php
class M_storage extends CI_Model
{
    // STORAGE

    public function tampil_storage()
    {
        return $this->db->get_where('m_storage', array('id'));
    }

    public function ubah_storage($where)
    {
        return $this->db->get_where('m_storage', $where);
    }

    public function get_keyword_storage($keyword)
    {
        $this->db->select('*');
        $this->db->from('m_storage');
        $this->db->like('brand_storage', $keyword);
        $this->db->or_like('nama_storage', $keyword);
        $this->db->or_like('type', $keyword);
        $this->db->or_like('kapasitas', $keyword);
        return $this->db->get()->result();
    }

    // BRAND STORAGE

    public function tampil_brand_storage()
    {
        return $this->db->get_where('m_brand_storage', array('id'));
    }

    public function ubah_brand_storage($where)
    {
        return $this->db->get_where('m_brand_storage', $where);
    }

    public function get_keyword_brand_storage($keyword)
    {
        $this->db->select('*');
        $this->db->from('m_brand_storage');
        $this->db->like('type', $keyword);
        return $this->db->get()->result();
    }

    // KAPASITAS STORAGE

    public function tampil_kapasitas()
    {
        return $this->db->get_where('m_kapasitas_storage');
    }

    public function ubah_kapasitas($where)
    {
        return $this->db->get_where('m_kapasitas_storage', $where);
    }

    public function get_keyword_kapasitas_storage($keyword)
    {
        $this->db->select('*');
        $this->db->from('m_kapasitas_storage');
        $this->db->like('kapasitas_storage', $keyword);
        $this->db->or_like('satuan', $keyword);
        return $this->db->get()->result();
    }

    // HAPUS

    public function hapus($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}
