<?php
class M_master extends CI_Model
{


    // PROCESSOR

    public function tampil_processor()
    {
        return $this->db->get_where('m_processor', array('nama_processor'));
    }

    public function tampil_brand_processor()
    {
        return $this->db->get('m_brand_processor');
    }

    public function brand_processor()
    {
        return $this->db->get_where('m_brand_processor', array('brand_processor'));
    }

    public function ubah_processor($where)
    {
        return $this->db->get_where('m_processor', $where);
    }

    public function ubah_brand_processor($where)
    {
        return $this->db->get_where('m_brand_processor', $where);
    }

    public function get_keyword_brand_processor($keyword)
    {
        $this->db->select('*');
        $this->db->from('m_brand_processor');
        $this->db->like('brand_processor', $keyword);
        return $this->db->get()->result();
    }

    public function get_keyword_processor($keyword)
    {
        $this->db->select('*');
        $this->db->from('m_processor');
        $this->db->like('nama_processor', $keyword);
        $this->db->or_like('brand_processor', $keyword);
        return $this->db->get()->result();
    }


    // MOTHERBOARD

    public function tampil_motherboard()
    {
        return $this->db->get_where('m_motherboard');
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


    // RAM

    public function tampil_ddr()
    {
        return $this->db->get('m_ddr_ram');
    }

    public function tampil_ram()
    {
        return $this->db->get_where('m_ram', array('id'));
    }

    public function ram($id)
    {
        return $this->db->get_where('m_ram', array('id' => $id));
    }

    public function tampil_brand_ram()
    {
        return $this->db->get_where('m_brand_ram', array('id'));
    }

    public function tampil_kapasitas_ram()
    {
        return $this->db->get_where('m_kapasitas_ram', array('id'));
    }

    public function ubah_kapasitas_ram($where)
    {
        return $this->db->get_where('m_kapasitas_ram', $where);
    }

    public function ubah_ram($id)
    {
        return $this->db->get_where('m_ram', ['id' => $id])->row_array();
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
        $this->db->like('ddr', $keyword);
        $this->db->or_like('brand_ram', $keyword);
        $this->db->or_like('nama_ram', $keyword);
        $this->db->or_like('kapasitas', $keyword);
        $this->db->or_like('satuan_kapasitas', $keyword);
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
        $this->db->like('brand_ram', $keyword);
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


    // HARDISK

    public function tampil_hardisk()
    {
        return $this->db->get_where('m_hardisk', array('id'));
    }

    public function tampil_brand_hardisk()
    {
        return $this->db->get_where('m_brand_hardisk', array('id'));
    }

    public function hapus($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}
