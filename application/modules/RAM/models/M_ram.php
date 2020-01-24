<?php
class M_ram extends CI_Model
{
    public function tampil_ddr()
    {
        $this->db->select('*');
        $this->db->from('m_ddr_ram');
        $this->db->order_by('ddr', 'ASC');
        return $this->db->get();
    }

    public function tampil_ram()
    {
        $this->db->select('*');
        $this->db->from('m_ram');
        $this->db->join('m_ddr_ram', 'm_ram.ddr_id=m_ddr_ram.ddr_id', 'inner');
        $this->db->join('m_brand_ram', 'm_ram.brand_ram_id=m_brand_ram.brand_ram_id', 'inner');
        $this->db->join('m_kapasitas_ram', 'm_ram.kapasitas_id=m_kapasitas_ram.kapasitas_id', 'inner');
        return $this->db->get();
    }

    public function ram($id)
    {
        return $this->db->get_where('m_ram', array('ram_id' => $id));
    }

    public function tampil_brand_ram()
    {
        $this->db->select('*');
        $this->db->from('m_brand_ram');
        $this->db->order_by('brand_ram', 'ASC');
        return $this->db->get();
    }

    public function tampil_kapasitas_ram()
    {
        $this->db->select('*');
        $this->db->from('m_kapasitas_ram');
        $this->db->order_by('kapasitas_id', 'DESC');
        return $this->db->get();
    }

    public function ubah_kapasitas_ram($where)
    {
        return $this->db->get_where('m_kapasitas_ram', $where);
    }

    public function ubah_ram($id)
    {
        return $this->db->get_where('m_ram', ['ram_id' => $id])->row_array();
    }

    public function ubah_ddr_ram($where)
    {
        return $this->db->get_where('m_ddr_ram', $where);
    }

    public function ubah_brand_ram($where)
    {
        return $this->db->get_where('m_brand_ram', $where);
    }

    public function get_keyword_ram($keyword)
    {
        $this->db->select('*');
        $this->db->from('m_ram');
        $this->db->join('m_ddr_ram', 'm_ram.ddr_id=m_ddr_ram.ddr_id', 'inner');
        $this->db->join('m_brand_ram', 'm_ram.brand_ram_id=m_brand_ram.brand_ram_id', 'inner');
        $this->db->join('m_kapasitas_ram', 'm_ram.kapasitas_id=m_kapasitas_ram.kapasitas_id', 'inner');
        $this->db->like('m_ddr_ram.ddr', $keyword);
        $this->db->or_like('m_brand_ram.brand_ram', $keyword);
        $this->db->or_like('m_kapasitas_ram.kapasitas_ram', $keyword);
        $this->db->or_like('nama_ram', $keyword);
        $this->db->or_like('satuan', $keyword);
        return $this->db->get()->result();
    }

    public function get_keyword_ddr_ram($keyword)
    {
        $this->db->select('*');
        $this->db->from('m_ddr_ram');
        $this->db->like('ddr', $keyword);
        return $this->db->get()->result();
    }

    public function get_keyword_brand_ram($keyword)
    {
        $this->db->select('*');
        $this->db->from('m_brand_ram');
        $this->db->like('brand_ram_id', $keyword);
        $this->db->or_like('brand_ram', $keyword);
        $this->db->order_by('brand_ram', 'ASC');
        return $this->db->get()->result();
    }

    public function get_keyword_kapasitas_ram($keyword)
    {
        $this->db->select('*');
        $this->db->from('m_kapasitas_ram');
        $this->db->like('kapasitas_ram', $keyword);
        $this->db->or_like('satuan', $keyword);
        return $this->db->get()->result();
    }

    public function hapus($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}
