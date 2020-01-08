<?php
class M_storage extends CI_Model
{
    // STORAGE

    public function tampil_storage()
    {
        $this->db->select('*');
        $this->db->from('m_storage');
        $this->db->join('m_brand_storage', 'm_storage.brand_storage_id=m_brand_storage.brand_storage_id', 'inner');
        $this->db->join('m_kapasitas_storage', 'm_storage.kapasitas_id=m_kapasitas_storage.kapasitas_id', 'inner');
        $this->db->order_by('m_storage.type_storage', 'ASC');
        return $this->db->get();
    }

    public function ubah_storage($where)
    {
        $this->db->select('*');
        $this->db->from('m_storage');
        $this->db->where($where);
        $this->db->join('m_brand_storage', 'm_storage.brand_storage_id=m_brand_storage.brand_storage_id', 'inner');
        $this->db->join('m_kapasitas_storage', 'm_storage.kapasitas_id=m_kapasitas_storage.kapasitas_id', 'inner');
        return $this->db->get();
    }

    public function get_keyword_storage($keyword)
    {
        $this->db->select('*');
        $this->db->from('m_storage');
        $this->db->join('m_brand_storage', 'm_storage.brand_storage_id=m_brand_storage.brand_storage_id', 'inner');
        $this->db->join('m_kapasitas_storage', 'm_storage.kapasitas_id=m_kapasitas_storage.kapasitas_id', 'inner');
        $this->db->like('m_brand_storage.brand_storage', $keyword);
        $this->db->or_like('nama_storage', $keyword);
        $this->db->or_like('m_kapasitas_storage.kapasitas_storage', $keyword);
        $this->db->or_like('m_storage.type_storage', $keyword);
        $this->db->order_by('m_storage.type_storage', 'ASC');
        return $this->db->get()->result();
    }

    // BRAND STORAGE

    public function tampil_brand_storage()
    {
        $this->db->select('*');
        $this->db->from('m_brand_storage');
        $this->db->order_by('type_storage', 'ASC');
        return $this->db->get();
    }

    public function ubah_brand_storage($where)
    {
        return $this->db->get_where('m_brand_storage', $where);
    }

    public function get_keyword_brand_storage($keyword)
    {
        $this->db->select('*');
        $this->db->from('m_brand_storage');
        $this->db->like('brand_storage', $keyword);
        $this->db->or_like('type_storage', $keyword);
        $this->db->order_by('type_storage', 'ASC');
        return $this->db->get()->result();
    }

    // KAPASITAS STORAGE

    public function tampil_kapasitas()
    {
        $this->db->select('*');
        $this->db->from('m_kapasitas_storage');
        $this->db->order_by('satuan', 'ASC');
        return $this->db->get();
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
        $this->db->order_by('satuan', 'ASC');
        return $this->db->get()->result();
    }

    // HAPUS

    public function hapus($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}
