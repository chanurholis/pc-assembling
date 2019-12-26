<?php
class M_processor extends CI_Model
{
    // BRAND PROCESSOR

    public function tampil_brand_processor()
    {
        $this->db->select('*');
        $this->db->from('m_brand_processor');
        $this->db->order_by('brand_processor', 'ASC');
        return $this->db->get();
    }

    public function brand_processor()
    {
        $this->db->select('*');
        $this->db->from('m_brand_processor');
        $this->db->order_by('brand_processor', 'ASC');
        return $this->db->get();
    }

    public function ubah_brand_processor($where)
    {
        return $this->db->get_where('m_brand_processor', $where);
    }

    public function get_keyword_brand_processor($keyword)
    {
        $this->db->select('*');
        $this->db->from('m_brand_processor');
        $this->db->like('brand_processor_id', $keyword);
        $this->db->or_like('brand_processor', $keyword);
        return $this->db->get()->result();
    }

    // PROCESSOR

    public function tampil_processor()
    {
        $this->db->select('*');
        $this->db->from('m_processor as MP');
        $this->db->join('m_brand_processor as MBP', 'MBP.brand_processor_id=MP.brand_processor_id', 'inner');
        $this->db->order_by('brand_processor', 'ASC');
        return $this->db->get();
    }

    public function ubah_processor($where)
    {
        $this->db->select('*');
        $this->db->from('m_processor');
        $this->db->where($where);
        $this->db->join('m_brand_processor', 'm_processor.brand_processor_id=m_brand_processor.brand_processor_id', 'inner');
        return $this->db->get();
    }

    public function get_keyword_processor($keyword)
    {
        $this->db->select('*');
        $this->db->from('m_processor');
        $this->db->join('m_brand_processor', 'm_processor.brand_processor_id=m_brand_processor.brand_processor_id', 'inner');
        $this->db->like('m_brand_processor.brand_processor', $keyword);
        $this->db->or_like('m_processor.nama_processor', $keyword);
        $this->db->order_by('brand_processor', 'ASC');
        return $this->db->get()->result();
    }

    // HAPUS

    public function hapus($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}
